<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/pad_pad_daftar_variables.php");

if(!isLogged())
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(CheckPermissionsEvent($strTableName, 'P') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Export"))
{
	echo "<p>"."You don't have permissions to access this table"."<a href=\"login.php\">"."Back to login page"."</a></p>";
	return;
}

$layout = new TLayout("export","RoundedGreen","MobileGreen");
$layout->blocks["top"] = array();
$layout->containers["export"] = array();

$layout->containers["export"][] = array("name"=>"exportheader","block"=>"","substyle"=>2);


$layout->containers["export"][] = array("name"=>"exprange_header","block"=>"rangeheader_block","substyle"=>3);


$layout->containers["export"][] = array("name"=>"exprange","block"=>"range_block","substyle"=>1);


$layout->containers["export"][] = array("name"=>"expoutput_header","block"=>"","substyle"=>3);


$layout->containers["export"][] = array("name"=>"expoutput","block"=>"","substyle"=>1);


$layout->containers["export"][] = array("name"=>"expbuttons","block"=>"","substyle"=>2);


$layout->skins["export"] = "fields";
$layout->blocks["top"][] = "export";$page_layouts["pad_pad_daftar_export"] = $layout;


// Modify query: remove blob fields from fieldlist.
// Blob fields on an export page are shown using imager.php (for example).
// They don't need to be selected from DB in export.php itself.
//$gQuery->ReplaceFieldsWithDummies(GetBinaryFieldsIndices());

$cipherer = new RunnerCipherer($strTableName);

$strWhereClause = "";
$strHavingClause = "";
$strSearchCriteria = "and";
$selected_recs = array();
$options = "1";

header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 
include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();
$id = postvalue("id") != "" ? postvalue("id") : 1;

$phpVersion = (int)substr(phpversion(), 0, 1); 
if($phpVersion > 4)
{
	include("include/export_functions.php");
	$xt->assign("groupExcel", true);
}
else
	$xt->assign("excel", true);

//array of params for classes
$params = array("pageType" => PAGE_EXPORT, "id" => $id, "tName" => $strTableName);
$params["xt"] = &$xt;
if(!$eventObj->exists("ListGetRowCount") && !$eventObj->exists("ListQuery"))
	$params["needSearchClauseObj"] = false;
$pageObject = new RunnerPage($params);

//	Before Process event
if($eventObj->exists("BeforeProcessExport"))
	$eventObj->BeforeProcessExport($conn, $pageObject);

if (@$_REQUEST["a"]!="")
{
	$options = "";
	$sWhere = "1=0";	

//	process selection
	$selected_recs = array();
	if (@$_REQUEST["mdelete"])
	{
		foreach(@$_REQUEST["mdelete"] as $ind)
		{
			$keys=array();
			$keys["id"] = refine($_REQUEST["mdelete1"][mdeleteIndex($ind)]);
			$selected_recs[] = $keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<1)
				continue;
			$keys = array();
			$keys["id"] = urldecode($arr[0]);
			$selected_recs[] = $keys;
		}
	}

	foreach($selected_recs as $keys)
	{
		$sWhere = $sWhere . " or ";
		$sWhere.=KeyWhere($keys);
	}


	$strSQL = $gQuery->gSQLWhere($sWhere);
	$strWhereClause=$sWhere;
	
	$_SESSION[$strTableName."_SelectedSQL"] = $strSQL;
	$_SESSION[$strTableName."_SelectedWhere"] = $sWhere;
	$_SESSION[$strTableName."_SelectedRecords"] = $selected_recs;
}

if ($_SESSION[$strTableName."_SelectedSQL"]!="" && @$_REQUEST["records"]=="") 
{
	$strSQL = $_SESSION[$strTableName."_SelectedSQL"];
	$strWhereClause = @$_SESSION[$strTableName."_SelectedWhere"];
	$selected_recs = $_SESSION[$strTableName."_SelectedRecords"];
}
else
{
	$strWhereClause = @$_SESSION[$strTableName."_where"];
	$strHavingClause = @$_SESSION[$strTableName."_having"];
	$strSearchCriteria = @$_SESSION[$strTableName."_criteria"];
	$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
}

$mypage = 1;
if(@$_REQUEST["type"])
{
//	order by
	$strOrderBy = $_SESSION[$strTableName."_order"];
	if(!$strOrderBy)
		$strOrderBy = $gstrOrderBy;
	$strSQL.=" ".trim($strOrderBy);

	$strSQLbak = $strSQL;
	if($eventObj->exists("BeforeQueryExport"))
		$eventObj->BeforeQueryExport($strSQL,$strWhereClause,$strOrderBy, $pageObject);
//	Rebuild SQL if needed
	if($strSQL!=$strSQLbak)
	{
//	changed $strSQL - old style	
		$numrows=GetRowCount($strSQL);
	}
	else
	{
		$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
		$strSQL.=" ".trim($strOrderBy);
		$rowcount=false;
		if($eventObj->exists("ListGetRowCount"))
		{
			$masterKeysReq=array();
			for($i = 0; $i < count($pageObject->detailKeysByM); $i ++)
				$masterKeysReq[] = $_SESSION[$strTableName."_masterkey".($i + 1)];
			$rowcount = $eventObj->ListGetRowCount($pageObject->searchClauseObj,$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs, $pageObject);
		}
		if($rowcount !== false)
			$numrows = $rowcount;
		else
			$numrows = $gQuery->gSQLRowCount($strWhereClause,$strHavingClause,$strSearchCriteria);
	}
	LogInfo($strSQL);

//	 Pagination:

	$nPageSize = 0;
	if(@$_REQUEST["records"]=="page" && $numrows)
	{
		$mypage = (integer)@$_SESSION[$strTableName."_pagenumber"];
		$nPageSize = (integer)@$_SESSION[$strTableName."_pagesize"];
		
		if(!$nPageSize)
			$nPageSize = $gSettings->getInitialPageSize();
				
		if($nPageSize<0)
			$nPageSize = 0;
			
		if($nPageSize>0)
		{
			if($numrows<=($mypage-1)*$nPageSize)
				$mypage = ceil($numrows/$nPageSize);
		
			if(!$mypage)
				$mypage = 1;
			
					$maxrecs = $nPageSize;
			$strSQL.=" limit ".$nPageSize." offset ".(($mypage-1)*$nPageSize);
		}
	}
	$listarray = false;
	if($eventObj->exists("ListQuery"))
	{
		$arrFieldForSort = array();
		$arrHowFieldSort = array();
		require_once getabspath('classes/orderclause.php');
		$fieldList = unserialize($_SESSION[$strTableName."_orderFieldsList"]);
		for($i = 0; $i < count($fieldList); $i++)
		{
			$arrFieldForSort[] = $fieldList[$i]->fieldIndex; 
			$arrHowFieldSort[] = $fieldList[$i]->orderDirection; 
		}
		$listarray = $eventObj->ListQuery($pageObject->searchClauseObj, $arrFieldForSort, $arrHowFieldSort,
			$_SESSION[$strTableName."_mastertable"], $masterKeysReq, $selected_recs, $nPageSize, $mypage, $pageObject);
	}
	if($listarray!==false)
		$rs = $listarray;
	elseif($nPageSize>0)
	{
					$rs = db_query($strSQL,$conn);
	}
	else
		$rs = db_query($strSQL,$conn);

	if(!ini_get("safe_mode"))
		set_time_limit(300);
	
	if(substr(@$_REQUEST["type"],0,5)=="excel")
	{
//	remove grouping
		$locale_info["LOCALE_SGROUPING"]="0";
		$locale_info["LOCALE_SMONGROUPING"]="0";
				if($phpVersion > 4)
			ExportToExcel($cipherer, $pageObject);
		else
			ExportToExcel_old($cipherer);
	}
	else if(@$_REQUEST["type"]=="word")
	{
		ExportToWord($cipherer);
	}
	else if(@$_REQUEST["type"]=="xml")
	{
		ExportToXML($cipherer);
	}
	else if(@$_REQUEST["type"]=="csv")
	{
		$locale_info["LOCALE_SGROUPING"]="0";
		$locale_info["LOCALE_SDECIMAL"]=".";
		$locale_info["LOCALE_SMONGROUPING"]="0";
		$locale_info["LOCALE_SMONDECIMALSEP"]=".";
		ExportToCSV($cipherer);
	}
	db_close($conn);
	return;
}

// add button events if exist
$pageObject->addButtonHandlers();

if($options)
{
	$xt->assign("rangeheader_block",true);
	$xt->assign("range_block",true);
}

$xt->assign("exportlink_attrs", 'id="saveButton'.$pageObject->id.'"');

$pageObject->body["begin"] .="<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>\r\n";
$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";

$pageObject->fillSetCntrlMaps();
$pageObject->body['end'] .= '<script>';
$pageObject->body['end'] .= "window.controlsMap = ".my_json_encode($pageObject->controlsHTMLMap).";";
$pageObject->body['end'] .= "window.viewControlsMap = ".my_json_encode($pageObject->viewControlsHTMLMap).";";
$pageObject->body['end'] .= "window.settings = ".my_json_encode($pageObject->jsSettings).";";
$pageObject->body['end'] .= '</script>';
$pageObject->body["end"] .= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerAll.js\"></script>\r\n";
$pageObject->addCommonJs();

$pageObject->body["end"] .= "<script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("pad_pad_daftar_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=pad_pad_daftar.xls");

	echo "<html>";
	echo "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">";
	
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	echo "<body>";
	echo "<table border=1>";

	WriteTableData($cipherer);

	echo "</table>";
	echo "</body>";
	echo "</html>";
}

function ExportToWord($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=pad_pad_daftar.doc");

	echo "<html>";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	echo "<body>";
	echo "<table border=1>";

	WriteTableData($cipherer);

	echo "</table>";
	echo "</body>";
	echo "</html>";
}

function ExportToXML($cipherer)
{
	global $nPageSize,$rs,$strTableName,$conn,$eventObj, $pageObject;
	header("Content-Type: text/xml");
	header("Content-Disposition: attachment;Filename=pad_pad_daftar.xml");
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);	
	//if(!$row)
	//	return;
		
	global $cCharset;
	
	echo "<?xml version=\"1.0\" encoding=\"".$cCharset."\" standalone=\"yes\"?>\r\n";
	echo "<table>\r\n";
	$i = 0;
	$pageObject->viewControls->forExport = "xml";
	while((!$nPageSize || $i<$nPageSize) && $row)
	{
		$values = array();
			$values["id"] = $pageObject->showDBValue("id", $row);
			$values["rp"] = $pageObject->showDBValue("rp", $row);
			$values["pb"] = $pageObject->showDBValue("pb", $row);
			$values["formno"] = $pageObject->showDBValue("formno", $row);
			$values["reg_date"] = $pageObject->showDBValue("reg_date", $row);
			$values["customernm"] = $pageObject->showDBValue("customernm", $row);
			$values["kecamatan_id"] = $pageObject->showDBValue("kecamatan_id", $row);
			$values["kelurahan_id"] = $pageObject->showDBValue("kelurahan_id", $row);
			$values["kabupaten"] = $pageObject->showDBValue("kabupaten", $row);
			$values["alamat"] = $pageObject->showDBValue("alamat", $row);
			$values["kodepos"] = $pageObject->showDBValue("kodepos", $row);
			$values["telphone"] = $pageObject->showDBValue("telphone", $row);
			$values["wpnama"] = $pageObject->showDBValue("wpnama", $row);
			$values["wpalamat"] = $pageObject->showDBValue("wpalamat", $row);
			$values["wpkelurahan"] = $pageObject->showDBValue("wpkelurahan", $row);
			$values["wpkecamatan"] = $pageObject->showDBValue("wpkecamatan", $row);
			$values["wpkabupaten"] = $pageObject->showDBValue("wpkabupaten", $row);
			$values["wptelp"] = $pageObject->showDBValue("wptelp", $row);
			$values["wpkodepos"] = $pageObject->showDBValue("wpkodepos", $row);
			$values["pnama"] = $pageObject->showDBValue("pnama", $row);
			$values["palamat"] = $pageObject->showDBValue("palamat", $row);
			$values["pkelurahan"] = $pageObject->showDBValue("pkelurahan", $row);
			$values["pkecamatan"] = $pageObject->showDBValue("pkecamatan", $row);
			$values["pkabupaten"] = $pageObject->showDBValue("pkabupaten", $row);
			$values["ptelp"] = $pageObject->showDBValue("ptelp", $row);
			$values["pkodepos"] = $pageObject->showDBValue("pkodepos", $row);
			$values["ijin1"] = $pageObject->showDBValue("ijin1", $row);
			$values["ijin1no"] = $pageObject->showDBValue("ijin1no", $row);
			$values["ijin1tgl"] = $pageObject->showDBValue("ijin1tgl", $row);
			$values["ijin1tglakhir"] = $pageObject->showDBValue("ijin1tglakhir", $row);
			$values["ijin2"] = $pageObject->showDBValue("ijin2", $row);
			$values["ijin2no"] = $pageObject->showDBValue("ijin2no", $row);
			$values["ijin2tgl"] = $pageObject->showDBValue("ijin2tgl", $row);
			$values["ijin2tglakhir"] = $pageObject->showDBValue("ijin2tglakhir", $row);
			$values["ijin3"] = $pageObject->showDBValue("ijin3", $row);
			$values["ijin3no"] = $pageObject->showDBValue("ijin3no", $row);
			$values["ijin3tgl"] = $pageObject->showDBValue("ijin3tgl", $row);
			$values["ijin3tglakhir"] = $pageObject->showDBValue("ijin3tglakhir", $row);
			$values["ijin4"] = $pageObject->showDBValue("ijin4", $row);
			$values["ijin4no"] = $pageObject->showDBValue("ijin4no", $row);
			$values["ijin4tgl"] = $pageObject->showDBValue("ijin4tgl", $row);
			$values["ijin4tglakhir"] = $pageObject->showDBValue("ijin4tglakhir", $row);
			$values["enabled"] = $pageObject->showDBValue("enabled", $row);
			$values["create_date"] = $pageObject->showDBValue("create_date", $row);
			$values["create_uid"] = $pageObject->showDBValue("create_uid", $row);
			$values["write_date"] = $pageObject->showDBValue("write_date", $row);
			$values["write_uid"] = $pageObject->showDBValue("write_uid", $row);
			$values["op_nm"] = $pageObject->showDBValue("op_nm", $row);
			$values["op_alamat"] = $pageObject->showDBValue("op_alamat", $row);
			$values["op_usaha_id"] = $pageObject->showDBValue("op_usaha_id", $row);
			$values["op_so"] = $pageObject->showDBValue("op_so", $row);
			$values["op_kecamatan_id"] = $pageObject->showDBValue("op_kecamatan_id", $row);
			$values["op_kelurahan_id"] = $pageObject->showDBValue("op_kelurahan_id", $row);
			$values["op_latitude"] = $pageObject->showDBValue("op_latitude", $row);
			$values["op_longitude"] = $pageObject->showDBValue("op_longitude", $row);
			$values["kd_restojmlmeja"] = $pageObject->showDBValue("kd_restojmlmeja", $row);
			$values["kd_restojmlkursi"] = $pageObject->showDBValue("kd_restojmlkursi", $row);
			$values["kd_restojmltamu"] = $pageObject->showDBValue("kd_restojmltamu", $row);
			$values["kd_filmkursi"] = $pageObject->showDBValue("kd_filmkursi", $row);
			$values["kd_filmpertunjukan"] = $pageObject->showDBValue("kd_filmpertunjukan", $row);
			$values["kd_filmtarif"] = $pageObject->showDBValue("kd_filmtarif", $row);
			$values["kd_bilyarmeja"] = $pageObject->showDBValue("kd_bilyarmeja", $row);
			$values["kd_bilyartarif"] = $pageObject->showDBValue("kd_bilyartarif", $row);
			$values["kd_bilyarkegiatan"] = $pageObject->showDBValue("kd_bilyarkegiatan", $row);
			$values["kd_diskopengunjung"] = $pageObject->showDBValue("kd_diskopengunjung", $row);
			$values["kd_diskotarif"] = $pageObject->showDBValue("kd_diskotarif", $row);
			$values["kd_waletvolume"] = $pageObject->showDBValue("kd_waletvolume", $row);
			$values["email"] = $pageObject->showDBValue("email", $row);
			$values["op_pajak_id"] = $pageObject->showDBValue("op_pajak_id", $row);
			$values["npwpd"] = $pageObject->showDBValue("npwpd", $row);
			$values["passwd"] = $pageObject->showDBValue("passwd", $row);
		
		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
			$eventRes = $eventObj->BeforeOut($row, $values, $pageObject);
		
		if ($eventRes)
		{
			$i++;
			echo "<row>\r\n";
			foreach ($values as $fName => $val)
			{
				$field = htmlspecialchars(XMLNameEncode($fName));
				echo "<".$field.">";
				echo $values[$fName];
				echo "</".$field.">\r\n";
			}
			echo "</row>\r\n";
		}
		
		
		if($eventObj->exists("ListFetchArray"))
			$row = $eventObj->ListFetchArray($rs, $pageObject);
		else
			$row = $cipherer->DecryptFetchedArray($rs);
	}
	echo "</table>\r\n";
}

function ExportToCSV($cipherer)
{
	global $rs,$nPageSize,$strTableName,$conn,$eventObj, $pageObject;
	header("Content-Type: application/csv");
	header("Content-Disposition: attachment;Filename=pad_pad_daftar.csv");
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);

// write header
	$outstr = "";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"rp\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pb\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"formno\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"reg_date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"customernm\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kecamatan_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kelurahan_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kabupaten\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"alamat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kodepos\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"telphone\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"wpnama\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"wpalamat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"wpkelurahan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"wpkecamatan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"wpkabupaten\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"wptelp\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"wpkodepos\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pnama\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"palamat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pkelurahan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pkecamatan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pkabupaten\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ptelp\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pkodepos\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin1no\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin1tgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin1tglakhir\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin2no\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin2tgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin2tglakhir\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin3no\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin3tgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin3tglakhir\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin4no\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin4tgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin4tglakhir\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"enabled\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"create_date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"create_uid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"write_date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"write_uid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"op_nm\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"op_alamat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"op_usaha_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"op_so\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"op_kecamatan_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"op_kelurahan_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"op_latitude\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"op_longitude\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_restojmlmeja\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_restojmlkursi\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_restojmltamu\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_filmkursi\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_filmpertunjukan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_filmtarif\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_bilyarmeja\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_bilyartarif\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_bilyarkegiatan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_diskopengunjung\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_diskotarif\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kd_waletvolume\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"email\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"op_pajak_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"npwpd\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"passwd\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["id"] = $pageObject->getViewControl("id")->showDBValue($row, "");
			$values["rp"] = $pageObject->getViewControl("rp")->showDBValue($row, "");
			$values["pb"] = $pageObject->getViewControl("pb")->showDBValue($row, "");
			$values["formno"] = $pageObject->getViewControl("formno")->showDBValue($row, "");
			$values["reg_date"] = $pageObject->getViewControl("reg_date")->showDBValue($row, "");
			$values["customernm"] = $pageObject->getViewControl("customernm")->showDBValue($row, "");
			$values["kecamatan_id"] = $pageObject->getViewControl("kecamatan_id")->showDBValue($row, "");
			$values["kelurahan_id"] = $pageObject->getViewControl("kelurahan_id")->showDBValue($row, "");
			$values["kabupaten"] = $pageObject->getViewControl("kabupaten")->showDBValue($row, "");
			$values["alamat"] = $pageObject->getViewControl("alamat")->showDBValue($row, "");
			$values["kodepos"] = $pageObject->getViewControl("kodepos")->showDBValue($row, "");
			$values["telphone"] = $pageObject->getViewControl("telphone")->showDBValue($row, "");
			$values["wpnama"] = $pageObject->getViewControl("wpnama")->showDBValue($row, "");
			$values["wpalamat"] = $pageObject->getViewControl("wpalamat")->showDBValue($row, "");
			$values["wpkelurahan"] = $pageObject->getViewControl("wpkelurahan")->showDBValue($row, "");
			$values["wpkecamatan"] = $pageObject->getViewControl("wpkecamatan")->showDBValue($row, "");
			$values["wpkabupaten"] = $pageObject->getViewControl("wpkabupaten")->showDBValue($row, "");
			$values["wptelp"] = $pageObject->getViewControl("wptelp")->showDBValue($row, "");
			$values["wpkodepos"] = $pageObject->getViewControl("wpkodepos")->showDBValue($row, "");
			$values["pnama"] = $pageObject->getViewControl("pnama")->showDBValue($row, "");
			$values["palamat"] = $pageObject->getViewControl("palamat")->showDBValue($row, "");
			$values["pkelurahan"] = $pageObject->getViewControl("pkelurahan")->showDBValue($row, "");
			$values["pkecamatan"] = $pageObject->getViewControl("pkecamatan")->showDBValue($row, "");
			$values["pkabupaten"] = $pageObject->getViewControl("pkabupaten")->showDBValue($row, "");
			$values["ptelp"] = $pageObject->getViewControl("ptelp")->showDBValue($row, "");
			$values["pkodepos"] = $pageObject->getViewControl("pkodepos")->showDBValue($row, "");
			$values["ijin1"] = $pageObject->getViewControl("ijin1")->showDBValue($row, "");
			$values["ijin1no"] = $pageObject->getViewControl("ijin1no")->showDBValue($row, "");
			$values["ijin1tgl"] = $pageObject->getViewControl("ijin1tgl")->showDBValue($row, "");
			$values["ijin1tglakhir"] = $pageObject->getViewControl("ijin1tglakhir")->showDBValue($row, "");
			$values["ijin2"] = $pageObject->getViewControl("ijin2")->showDBValue($row, "");
			$values["ijin2no"] = $pageObject->getViewControl("ijin2no")->showDBValue($row, "");
			$values["ijin2tgl"] = $pageObject->getViewControl("ijin2tgl")->showDBValue($row, "");
			$values["ijin2tglakhir"] = $pageObject->getViewControl("ijin2tglakhir")->showDBValue($row, "");
			$values["ijin3"] = $pageObject->getViewControl("ijin3")->showDBValue($row, "");
			$values["ijin3no"] = $pageObject->getViewControl("ijin3no")->showDBValue($row, "");
			$values["ijin3tgl"] = $pageObject->getViewControl("ijin3tgl")->showDBValue($row, "");
			$values["ijin3tglakhir"] = $pageObject->getViewControl("ijin3tglakhir")->showDBValue($row, "");
			$values["ijin4"] = $pageObject->getViewControl("ijin4")->showDBValue($row, "");
			$values["ijin4no"] = $pageObject->getViewControl("ijin4no")->showDBValue($row, "");
			$values["ijin4tgl"] = $pageObject->getViewControl("ijin4tgl")->showDBValue($row, "");
			$values["ijin4tglakhir"] = $pageObject->getViewControl("ijin4tglakhir")->showDBValue($row, "");
			$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
			$values["create_date"] = $pageObject->getViewControl("create_date")->showDBValue($row, "");
			$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
			$values["write_date"] = $pageObject->getViewControl("write_date")->showDBValue($row, "");
			$values["write_uid"] = $pageObject->getViewControl("write_uid")->showDBValue($row, "");
			$values["op_nm"] = $pageObject->getViewControl("op_nm")->showDBValue($row, "");
			$values["op_alamat"] = $pageObject->getViewControl("op_alamat")->showDBValue($row, "");
			$values["op_usaha_id"] = $pageObject->getViewControl("op_usaha_id")->showDBValue($row, "");
			$values["op_so"] = $pageObject->getViewControl("op_so")->showDBValue($row, "");
			$values["op_kecamatan_id"] = $pageObject->getViewControl("op_kecamatan_id")->showDBValue($row, "");
			$values["op_kelurahan_id"] = $pageObject->getViewControl("op_kelurahan_id")->showDBValue($row, "");
			$values["op_latitude"] = $row["op_latitude"];
			$values["op_longitude"] = $row["op_longitude"];
			$values["kd_restojmlmeja"] = $pageObject->getViewControl("kd_restojmlmeja")->showDBValue($row, "");
			$values["kd_restojmlkursi"] = $pageObject->getViewControl("kd_restojmlkursi")->showDBValue($row, "");
			$values["kd_restojmltamu"] = $pageObject->getViewControl("kd_restojmltamu")->showDBValue($row, "");
			$values["kd_filmkursi"] = $pageObject->getViewControl("kd_filmkursi")->showDBValue($row, "");
			$values["kd_filmpertunjukan"] = $pageObject->getViewControl("kd_filmpertunjukan")->showDBValue($row, "");
			$values["kd_filmtarif"] = $row["kd_filmtarif"];
			$values["kd_bilyarmeja"] = $pageObject->getViewControl("kd_bilyarmeja")->showDBValue($row, "");
			$values["kd_bilyartarif"] = $row["kd_bilyartarif"];
			$values["kd_bilyarkegiatan"] = $pageObject->getViewControl("kd_bilyarkegiatan")->showDBValue($row, "");
			$values["kd_diskopengunjung"] = $pageObject->getViewControl("kd_diskopengunjung")->showDBValue($row, "");
			$values["kd_diskotarif"] = $row["kd_diskotarif"];
			$values["kd_waletvolume"] = $pageObject->getViewControl("kd_waletvolume")->showDBValue($row, "");
			$values["email"] = $pageObject->getViewControl("email")->showDBValue($row, "");
			$values["op_pajak_id"] = $pageObject->getViewControl("op_pajak_id")->showDBValue($row, "");
			$values["npwpd"] = $pageObject->getViewControl("npwpd")->showDBValue($row, "");
			$values["passwd"] = $pageObject->getViewControl("passwd")->showDBValue($row, "");

		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
		{
			$eventRes = $eventObj->BeforeOut($row,$values, $pageObject);
		}
		if ($eventRes)
		{
			$outstr="";
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["rp"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pb"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["formno"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["reg_date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["customernm"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kecamatan_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kelurahan_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kabupaten"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["alamat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kodepos"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["telphone"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["wpnama"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["wpalamat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["wpkelurahan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["wpkecamatan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["wpkabupaten"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["wptelp"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["wpkodepos"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pnama"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["palamat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pkelurahan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pkecamatan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pkabupaten"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ptelp"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pkodepos"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin1no"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin1tgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin1tglakhir"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin2no"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin2tgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin2tglakhir"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin3no"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin3tgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin3tglakhir"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin4no"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin4tgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin4tglakhir"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["enabled"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["create_date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["create_uid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["write_date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["write_uid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["op_nm"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["op_alamat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["op_usaha_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["op_so"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["op_kecamatan_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["op_kelurahan_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["op_latitude"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["op_longitude"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_restojmlmeja"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_restojmlkursi"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_restojmltamu"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_filmkursi"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_filmpertunjukan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_filmtarif"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_bilyarmeja"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_bilyartarif"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_bilyarkegiatan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_diskopengunjung"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_diskotarif"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kd_waletvolume"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["email"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["op_pajak_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["npwpd"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["passwd"]).'"';
			echo $outstr;
		}
		
		$iNumberOfRows++;
		if($eventObj->exists("ListFetchArray"))
			$row = $eventObj->ListFetchArray($rs, $pageObject);
		else
			$row = $cipherer->DecryptFetchedArray($rs);
			
		if(((!$nPageSize || $iNumberOfRows<$nPageSize) && $row) && $eventRes)
			echo "\r\n";
	}
}

function WriteTableData($cipherer)
{
	global $rs,$nPageSize,$strTableName,$conn,$eventObj, $pageObject;
	
	if($eventObj->exists("ListFetchArray"))
		$row = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$row = $cipherer->DecryptFetchedArray($rs);
//	if(!$row)
//		return;
// write header
	echo "<tr>";
	if($_REQUEST["type"]=="excel")
	{
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Rp").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pb").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Formno").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Reg Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Customernm").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kecamatan Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kelurahan Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kabupaten").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Alamat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kodepos").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Telphone").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wpnama").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wpalamat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wpkelurahan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wpkecamatan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wpkabupaten").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wptelp").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wpkodepos").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pnama").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Palamat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pkelurahan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pkecamatan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pkabupaten").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ptelp").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pkodepos").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin1no").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin1tgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin1tglakhir").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin2no").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin2tgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin2tglakhir").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin3no").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin3tgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin3tglakhir").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin4no").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin4tgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin4tglakhir").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Enabled").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Create Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Create Uid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Write Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Write Uid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Op Nm").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Op Alamat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Op Usaha Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Op So").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Op Kecamatan Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Op Kelurahan Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Op Latitude").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Op Longitude").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Restojmlmeja").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Restojmlkursi").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Restojmltamu").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Filmkursi").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Filmpertunjukan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Filmtarif").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Bilyarmeja").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Bilyartarif").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Bilyarkegiatan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Diskopengunjung").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Diskotarif").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kd Waletvolume").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Email").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Op Pajak Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Npwpd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Passwd").'</td>';	
	}
	else
	{
		echo "<td>"."Id"."</td>";
		echo "<td>"."Rp"."</td>";
		echo "<td>"."Pb"."</td>";
		echo "<td>"."Formno"."</td>";
		echo "<td>"."Reg Date"."</td>";
		echo "<td>"."Customernm"."</td>";
		echo "<td>"."Kecamatan Id"."</td>";
		echo "<td>"."Kelurahan Id"."</td>";
		echo "<td>"."Kabupaten"."</td>";
		echo "<td>"."Alamat"."</td>";
		echo "<td>"."Kodepos"."</td>";
		echo "<td>"."Telphone"."</td>";
		echo "<td>"."Wpnama"."</td>";
		echo "<td>"."Wpalamat"."</td>";
		echo "<td>"."Wpkelurahan"."</td>";
		echo "<td>"."Wpkecamatan"."</td>";
		echo "<td>"."Wpkabupaten"."</td>";
		echo "<td>"."Wptelp"."</td>";
		echo "<td>"."Wpkodepos"."</td>";
		echo "<td>"."Pnama"."</td>";
		echo "<td>"."Palamat"."</td>";
		echo "<td>"."Pkelurahan"."</td>";
		echo "<td>"."Pkecamatan"."</td>";
		echo "<td>"."Pkabupaten"."</td>";
		echo "<td>"."Ptelp"."</td>";
		echo "<td>"."Pkodepos"."</td>";
		echo "<td>"."Ijin1"."</td>";
		echo "<td>"."Ijin1no"."</td>";
		echo "<td>"."Ijin1tgl"."</td>";
		echo "<td>"."Ijin1tglakhir"."</td>";
		echo "<td>"."Ijin2"."</td>";
		echo "<td>"."Ijin2no"."</td>";
		echo "<td>"."Ijin2tgl"."</td>";
		echo "<td>"."Ijin2tglakhir"."</td>";
		echo "<td>"."Ijin3"."</td>";
		echo "<td>"."Ijin3no"."</td>";
		echo "<td>"."Ijin3tgl"."</td>";
		echo "<td>"."Ijin3tglakhir"."</td>";
		echo "<td>"."Ijin4"."</td>";
		echo "<td>"."Ijin4no"."</td>";
		echo "<td>"."Ijin4tgl"."</td>";
		echo "<td>"."Ijin4tglakhir"."</td>";
		echo "<td>"."Enabled"."</td>";
		echo "<td>"."Create Date"."</td>";
		echo "<td>"."Create Uid"."</td>";
		echo "<td>"."Write Date"."</td>";
		echo "<td>"."Write Uid"."</td>";
		echo "<td>"."Op Nm"."</td>";
		echo "<td>"."Op Alamat"."</td>";
		echo "<td>"."Op Usaha Id"."</td>";
		echo "<td>"."Op So"."</td>";
		echo "<td>"."Op Kecamatan Id"."</td>";
		echo "<td>"."Op Kelurahan Id"."</td>";
		echo "<td>"."Op Latitude"."</td>";
		echo "<td>"."Op Longitude"."</td>";
		echo "<td>"."Kd Restojmlmeja"."</td>";
		echo "<td>"."Kd Restojmlkursi"."</td>";
		echo "<td>"."Kd Restojmltamu"."</td>";
		echo "<td>"."Kd Filmkursi"."</td>";
		echo "<td>"."Kd Filmpertunjukan"."</td>";
		echo "<td>"."Kd Filmtarif"."</td>";
		echo "<td>"."Kd Bilyarmeja"."</td>";
		echo "<td>"."Kd Bilyartarif"."</td>";
		echo "<td>"."Kd Bilyarkegiatan"."</td>";
		echo "<td>"."Kd Diskopengunjung"."</td>";
		echo "<td>"."Kd Diskotarif"."</td>";
		echo "<td>"."Kd Waletvolume"."</td>";
		echo "<td>"."Email"."</td>";
		echo "<td>"."Op Pajak Id"."</td>";
		echo "<td>"."Npwpd"."</td>";
		echo "<td>"."Passwd"."</td>";
	}
	echo "</tr>";
	
// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "export";
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		countTotals($totals, $totalsFields, $row);
		
		$values = array();
	
					$values["id"] = $pageObject->getViewControl("id")->showDBValue($row, "");
					$values["rp"] = $pageObject->getViewControl("rp")->showDBValue($row, "");
					$values["pb"] = $pageObject->getViewControl("pb")->showDBValue($row, "");
					$values["formno"] = $pageObject->getViewControl("formno")->showDBValue($row, "");
					$values["reg_date"] = $pageObject->getViewControl("reg_date")->showDBValue($row, "");
					$values["customernm"] = $pageObject->getViewControl("customernm")->showDBValue($row, "");
					$values["kecamatan_id"] = $pageObject->getViewControl("kecamatan_id")->showDBValue($row, "");
					$values["kelurahan_id"] = $pageObject->getViewControl("kelurahan_id")->showDBValue($row, "");
					$values["kabupaten"] = $pageObject->getViewControl("kabupaten")->showDBValue($row, "");
					$values["alamat"] = $pageObject->getViewControl("alamat")->showDBValue($row, "");
					$values["kodepos"] = $pageObject->getViewControl("kodepos")->showDBValue($row, "");
					$values["telphone"] = $pageObject->getViewControl("telphone")->showDBValue($row, "");
					$values["wpnama"] = $pageObject->getViewControl("wpnama")->showDBValue($row, "");
					$values["wpalamat"] = $pageObject->getViewControl("wpalamat")->showDBValue($row, "");
					$values["wpkelurahan"] = $pageObject->getViewControl("wpkelurahan")->showDBValue($row, "");
					$values["wpkecamatan"] = $pageObject->getViewControl("wpkecamatan")->showDBValue($row, "");
					$values["wpkabupaten"] = $pageObject->getViewControl("wpkabupaten")->showDBValue($row, "");
					$values["wptelp"] = $pageObject->getViewControl("wptelp")->showDBValue($row, "");
					$values["wpkodepos"] = $pageObject->getViewControl("wpkodepos")->showDBValue($row, "");
					$values["pnama"] = $pageObject->getViewControl("pnama")->showDBValue($row, "");
					$values["palamat"] = $pageObject->getViewControl("palamat")->showDBValue($row, "");
					$values["pkelurahan"] = $pageObject->getViewControl("pkelurahan")->showDBValue($row, "");
					$values["pkecamatan"] = $pageObject->getViewControl("pkecamatan")->showDBValue($row, "");
					$values["pkabupaten"] = $pageObject->getViewControl("pkabupaten")->showDBValue($row, "");
					$values["ptelp"] = $pageObject->getViewControl("ptelp")->showDBValue($row, "");
					$values["pkodepos"] = $pageObject->getViewControl("pkodepos")->showDBValue($row, "");
					$values["ijin1"] = $pageObject->getViewControl("ijin1")->showDBValue($row, "");
					$values["ijin1no"] = $pageObject->getViewControl("ijin1no")->showDBValue($row, "");
					$values["ijin1tgl"] = $pageObject->getViewControl("ijin1tgl")->showDBValue($row, "");
					$values["ijin1tglakhir"] = $pageObject->getViewControl("ijin1tglakhir")->showDBValue($row, "");
					$values["ijin2"] = $pageObject->getViewControl("ijin2")->showDBValue($row, "");
					$values["ijin2no"] = $pageObject->getViewControl("ijin2no")->showDBValue($row, "");
					$values["ijin2tgl"] = $pageObject->getViewControl("ijin2tgl")->showDBValue($row, "");
					$values["ijin2tglakhir"] = $pageObject->getViewControl("ijin2tglakhir")->showDBValue($row, "");
					$values["ijin3"] = $pageObject->getViewControl("ijin3")->showDBValue($row, "");
					$values["ijin3no"] = $pageObject->getViewControl("ijin3no")->showDBValue($row, "");
					$values["ijin3tgl"] = $pageObject->getViewControl("ijin3tgl")->showDBValue($row, "");
					$values["ijin3tglakhir"] = $pageObject->getViewControl("ijin3tglakhir")->showDBValue($row, "");
					$values["ijin4"] = $pageObject->getViewControl("ijin4")->showDBValue($row, "");
					$values["ijin4no"] = $pageObject->getViewControl("ijin4no")->showDBValue($row, "");
					$values["ijin4tgl"] = $pageObject->getViewControl("ijin4tgl")->showDBValue($row, "");
					$values["ijin4tglakhir"] = $pageObject->getViewControl("ijin4tglakhir")->showDBValue($row, "");
					$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
					$values["create_date"] = $pageObject->getViewControl("create_date")->showDBValue($row, "");
					$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
					$values["write_date"] = $pageObject->getViewControl("write_date")->showDBValue($row, "");
					$values["write_uid"] = $pageObject->getViewControl("write_uid")->showDBValue($row, "");
					$values["op_nm"] = $pageObject->getViewControl("op_nm")->showDBValue($row, "");
					$values["op_alamat"] = $pageObject->getViewControl("op_alamat")->showDBValue($row, "");
					$values["op_usaha_id"] = $pageObject->getViewControl("op_usaha_id")->showDBValue($row, "");
					$values["op_so"] = $pageObject->getViewControl("op_so")->showDBValue($row, "");
					$values["op_kecamatan_id"] = $pageObject->getViewControl("op_kecamatan_id")->showDBValue($row, "");
					$values["op_kelurahan_id"] = $pageObject->getViewControl("op_kelurahan_id")->showDBValue($row, "");
					$values["op_latitude"] = $pageObject->getViewControl("op_latitude")->showDBValue($row, "");
					$values["op_longitude"] = $pageObject->getViewControl("op_longitude")->showDBValue($row, "");
					$values["kd_restojmlmeja"] = $pageObject->getViewControl("kd_restojmlmeja")->showDBValue($row, "");
					$values["kd_restojmlkursi"] = $pageObject->getViewControl("kd_restojmlkursi")->showDBValue($row, "");
					$values["kd_restojmltamu"] = $pageObject->getViewControl("kd_restojmltamu")->showDBValue($row, "");
					$values["kd_filmkursi"] = $pageObject->getViewControl("kd_filmkursi")->showDBValue($row, "");
					$values["kd_filmpertunjukan"] = $pageObject->getViewControl("kd_filmpertunjukan")->showDBValue($row, "");
					$values["kd_filmtarif"] = $pageObject->getViewControl("kd_filmtarif")->showDBValue($row, "");
					$values["kd_bilyarmeja"] = $pageObject->getViewControl("kd_bilyarmeja")->showDBValue($row, "");
					$values["kd_bilyartarif"] = $pageObject->getViewControl("kd_bilyartarif")->showDBValue($row, "");
					$values["kd_bilyarkegiatan"] = $pageObject->getViewControl("kd_bilyarkegiatan")->showDBValue($row, "");
					$values["kd_diskopengunjung"] = $pageObject->getViewControl("kd_diskopengunjung")->showDBValue($row, "");
					$values["kd_diskotarif"] = $pageObject->getViewControl("kd_diskotarif")->showDBValue($row, "");
					$values["kd_waletvolume"] = $pageObject->getViewControl("kd_waletvolume")->showDBValue($row, "");
					$values["email"] = $pageObject->getViewControl("email")->showDBValue($row, "");
					$values["op_pajak_id"] = $pageObject->getViewControl("op_pajak_id")->showDBValue($row, "");
					$values["npwpd"] = $pageObject->getViewControl("npwpd")->showDBValue($row, "");
					$values["passwd"] = $pageObject->getViewControl("passwd")->showDBValue($row, "");
		
		$eventRes = true;
		if ($eventObj->exists('BeforeOut'))
		{
			$eventRes = $eventObj->BeforeOut($row, $values, $pageObject);
		}
		if ($eventRes)
		{
			$iNumberOfRows++;
			echo "<tr>";
		
							echo '<td>';
			
									echo $values["id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["rp"];
			echo '</td>';
							echo '<td>';
			
									echo $values["pb"];
			echo '</td>';
							echo '<td>';
			
									echo $values["formno"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["reg_date"]);
					else
						echo $values["reg_date"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["customernm"]);
					else
						echo $values["customernm"];
			echo '</td>';
							echo '<td>';
			
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["kecamatan_id"]);
				else
					echo $values["kecamatan_id"];//echo htmlspecialchars($values["kecamatan_id"]); commented for bug #6823
					
			echo '</td>';
							echo '<td>';
			
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["kelurahan_id"]);
				else
					echo $values["kelurahan_id"];//echo htmlspecialchars($values["kelurahan_id"]); commented for bug #6823
					
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["kabupaten"]);
					else
						echo $values["kabupaten"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["alamat"]);
					else
						echo $values["alamat"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["kodepos"]);
					else
						echo $values["kodepos"];
			echo '</td>';
							echo '<td>';
			
									echo $values["telphone"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["wpnama"]);
					else
						echo $values["wpnama"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["wpalamat"]);
					else
						echo $values["wpalamat"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["wpkelurahan"]);
					else
						echo $values["wpkelurahan"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["wpkecamatan"]);
					else
						echo $values["wpkecamatan"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["wpkabupaten"]);
					else
						echo $values["wpkabupaten"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["wptelp"]);
					else
						echo $values["wptelp"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["wpkodepos"]);
					else
						echo $values["wpkodepos"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["pnama"]);
					else
						echo $values["pnama"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["palamat"]);
					else
						echo $values["palamat"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["pkelurahan"]);
					else
						echo $values["pkelurahan"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["pkecamatan"]);
					else
						echo $values["pkecamatan"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["pkabupaten"]);
					else
						echo $values["pkabupaten"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ptelp"]);
					else
						echo $values["ptelp"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["pkodepos"]);
					else
						echo $values["pkodepos"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin1"]);
					else
						echo $values["ijin1"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin1no"]);
					else
						echo $values["ijin1no"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin1tgl"]);
					else
						echo $values["ijin1tgl"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin1tglakhir"]);
					else
						echo $values["ijin1tglakhir"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin2"]);
					else
						echo $values["ijin2"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin2no"]);
					else
						echo $values["ijin2no"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin2tgl"]);
					else
						echo $values["ijin2tgl"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin2tglakhir"]);
					else
						echo $values["ijin2tglakhir"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin3"]);
					else
						echo $values["ijin3"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin3no"]);
					else
						echo $values["ijin3no"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin3tgl"]);
					else
						echo $values["ijin3tgl"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin3tglakhir"]);
					else
						echo $values["ijin3tglakhir"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin4"]);
					else
						echo $values["ijin4"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin4no"]);
					else
						echo $values["ijin4no"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin4tgl"]);
					else
						echo $values["ijin4tgl"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin4tglakhir"]);
					else
						echo $values["ijin4tglakhir"];
			echo '</td>';
							echo '<td>';
			
									echo $values["enabled"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["create_date"]);
					else
						echo $values["create_date"];
			echo '</td>';
							echo '<td>';
			
									echo $values["create_uid"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["write_date"]);
					else
						echo $values["write_date"];
			echo '</td>';
							echo '<td>';
			
									echo $values["write_uid"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["op_nm"]);
					else
						echo $values["op_nm"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["op_alamat"]);
					else
						echo $values["op_alamat"];
			echo '</td>';
							echo '<td>';
			
									echo $values["op_usaha_id"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["op_so"]);
					else
						echo $values["op_so"];
			echo '</td>';
							echo '<td>';
			
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["op_kecamatan_id"]);
				else
					echo $values["op_kecamatan_id"];//echo htmlspecialchars($values["op_kecamatan_id"]); commented for bug #6823
					
			echo '</td>';
							echo '<td>';
			
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["op_kelurahan_id"]);
				else
					echo $values["op_kelurahan_id"];//echo htmlspecialchars($values["op_kelurahan_id"]); commented for bug #6823
					
			echo '</td>';
							echo '<td>';
			
									echo $values["op_latitude"];
			echo '</td>';
							echo '<td>';
			
									echo $values["op_longitude"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_restojmlmeja"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_restojmlkursi"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_restojmltamu"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_filmkursi"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_filmpertunjukan"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_filmtarif"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_bilyarmeja"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_bilyartarif"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_bilyarkegiatan"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_diskopengunjung"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_diskotarif"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kd_waletvolume"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["email"]);
					else
						echo $values["email"];
			echo '</td>';
							echo '<td>';
			
									echo $values["op_pajak_id"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["npwpd"]);
					else
						echo $values["npwpd"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["passwd"]);
					else
						echo $values["passwd"];
			echo '</td>';
			echo "</tr>";
		}
		
		
		if($eventObj->exists("ListFetchArray"))
			$row = $eventObj->ListFetchArray($rs, $pageObject);
		else
			$row = $cipherer->DecryptFetchedArray($rs);
	}
	
}

function XMLNameEncode($strValue)
{
	$search = array(" ","#","'","/","\\","(",")",",","[");
	$ret = str_replace($search,"",$strValue);
	$search = array("]","+","\"","-","_","|","}","{","=");
	$ret = str_replace($search,"",$ret);
	return $ret;
}

function PrepareForExcel($ret)
{
	//$ret = htmlspecialchars($str); commented for bug #6823
	if (substr($ret,0,1)== "=") 
		$ret = "&#61;".substr($ret,1);
	return $ret;

}

function countTotals(&$totals, $totalsFields, $data)
{
	for($i = 0; $i < count($totalsFields); $i ++) 
	{
		if($totalsFields[$i]['totalsType'] == 'COUNT') 
			$totals[$totalsFields[$i]['fName']]["value"] += ($data[$totalsFields[$i]['fName']]!= "");
		else if($totalsFields[$i]['viewFormat'] == "Time") 
		{
			$time = GetTotalsForTime($data[$totalsFields[$i]['fName']]);
			$totals[$totalsFields[$i]['fName']]["value"] += $time[2]+$time[1]*60 + $time[0]*3600;
		} 
		else 
			$totals[$totalsFields[$i]['fName']]["value"] += ($data[$totalsFields[$i]['fName']]+ 0);
		
		if($totalsFields[$i]['totalsType'] == 'AVERAGE')
		{
			if(!is_null($data[$totalsFields[$i]['fName']]) && $data[$totalsFields[$i]['fName']]!=="")
				$totals[$totalsFields[$i]['fName']]['numRows']++;
		}
	}
}
?>
