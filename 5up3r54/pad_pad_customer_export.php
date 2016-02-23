<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/pad_pad_customer_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["pad_pad_customer_export"] = $layout;


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

$xt->display("pad_pad_customer_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=pad_pad_customer.xls");

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
	header("Content-Disposition: attachment;Filename=pad_pad_customer.doc");

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
	header("Content-Disposition: attachment;Filename=pad_pad_customer.xml");
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
			$values["parent"] = $pageObject->showDBValue("parent", $row);
			$values["npwpd"] = $pageObject->showDBValue("npwpd", $row);
			$values["rp"] = $pageObject->showDBValue("rp", $row);
			$values["pb"] = $pageObject->showDBValue("pb", $row);
			$values["formno"] = $pageObject->showDBValue("formno", $row);
			$values["reg_date"] = $pageObject->showDBValue("reg_date", $row);
			$values["nama"] = $pageObject->showDBValue("nama", $row);
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
			$values["kukuhno"] = $pageObject->showDBValue("kukuhno", $row);
			$values["kukuhnip"] = $pageObject->showDBValue("kukuhnip", $row);
			$values["kukuhtgl"] = $pageObject->showDBValue("kukuhtgl", $row);
			$values["kukuh_jabat_id"] = $pageObject->showDBValue("kukuh_jabat_id", $row);
			$values["kukuhprinted"] = $pageObject->showDBValue("kukuhprinted", $row);
			$values["enabled"] = $pageObject->showDBValue("enabled", $row);
			$values["create_uid"] = $pageObject->showDBValue("create_uid", $row);
			$values["tmt"] = $pageObject->showDBValue("tmt", $row);
			$values["customer_status_id"] = $pageObject->showDBValue("customer_status_id", $row);
			$values["kembalitgl"] = $pageObject->showDBValue("kembalitgl", $row);
			$values["kembalioleh"] = $pageObject->showDBValue("kembalioleh", $row);
			$values["kartuprinted"] = $pageObject->showDBValue("kartuprinted", $row);
			$values["kembalinip"] = $pageObject->showDBValue("kembalinip", $row);
			$values["penerimanm"] = $pageObject->showDBValue("penerimanm", $row);
			$values["penerimaalamat"] = $pageObject->showDBValue("penerimaalamat", $row);
			$values["penerimatgl"] = $pageObject->showDBValue("penerimatgl", $row);
			$values["catatnip"] = $pageObject->showDBValue("catatnip", $row);
			$values["kirimtgl"] = $pageObject->showDBValue("kirimtgl", $row);
			$values["batastgl"] = $pageObject->showDBValue("batastgl", $row);
			$values["petugas_jabat_id"] = $pageObject->showDBValue("petugas_jabat_id", $row);
			$values["pencatat_jabat_id"] = $pageObject->showDBValue("pencatat_jabat_id", $row);
			$values["created"] = $pageObject->showDBValue("created", $row);
			$values["updated"] = $pageObject->showDBValue("updated", $row);
			$values["update_uid"] = $pageObject->showDBValue("update_uid", $row);
			$values["npwpd_old"] = $pageObject->showDBValue("npwpd_old", $row);
			$values["id_old"] = $pageObject->showDBValue("id_old", $row);
		
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
	header("Content-Disposition: attachment;Filename=pad_pad_customer.csv");
	
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
	$outstr.= "\"parent\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"npwpd\"";
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
	$outstr.= "\"nama\"";
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
	$outstr.= "\"kukuhno\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kukuhnip\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kukuhtgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kukuh_jabat_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kukuhprinted\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"enabled\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"create_uid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tmt\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"customer_status_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kembalitgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kembalioleh\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kartuprinted\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kembalinip\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"penerimanm\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"penerimaalamat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"penerimatgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"catatnip\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kirimtgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"batastgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"petugas_jabat_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pencatat_jabat_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"created\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"updated\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"update_uid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"npwpd_old\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_old\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["id"] = $pageObject->getViewControl("id")->showDBValue($row, "");
			$values["parent"] = $pageObject->getViewControl("parent")->showDBValue($row, "");
			$values["npwpd"] = $pageObject->getViewControl("npwpd")->showDBValue($row, "");
			$values["rp"] = $pageObject->getViewControl("rp")->showDBValue($row, "");
			$values["pb"] = $pageObject->getViewControl("pb")->showDBValue($row, "");
			$values["formno"] = $pageObject->getViewControl("formno")->showDBValue($row, "");
			$values["reg_date"] = $pageObject->getViewControl("reg_date")->showDBValue($row, "");
			$values["nama"] = $pageObject->getViewControl("nama")->showDBValue($row, "");
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
			$values["kukuhno"] = $pageObject->getViewControl("kukuhno")->showDBValue($row, "");
			$values["kukuhnip"] = $pageObject->getViewControl("kukuhnip")->showDBValue($row, "");
			$values["kukuhtgl"] = $pageObject->getViewControl("kukuhtgl")->showDBValue($row, "");
			$values["kukuh_jabat_id"] = $pageObject->getViewControl("kukuh_jabat_id")->showDBValue($row, "");
			$values["kukuhprinted"] = $pageObject->getViewControl("kukuhprinted")->showDBValue($row, "");
			$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
			$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
			$values["tmt"] = $pageObject->getViewControl("tmt")->showDBValue($row, "");
			$values["customer_status_id"] = $pageObject->getViewControl("customer_status_id")->showDBValue($row, "");
			$values["kembalitgl"] = $pageObject->getViewControl("kembalitgl")->showDBValue($row, "");
			$values["kembalioleh"] = $pageObject->getViewControl("kembalioleh")->showDBValue($row, "");
			$values["kartuprinted"] = $pageObject->getViewControl("kartuprinted")->showDBValue($row, "");
			$values["kembalinip"] = $pageObject->getViewControl("kembalinip")->showDBValue($row, "");
			$values["penerimanm"] = $pageObject->getViewControl("penerimanm")->showDBValue($row, "");
			$values["penerimaalamat"] = $pageObject->getViewControl("penerimaalamat")->showDBValue($row, "");
			$values["penerimatgl"] = $pageObject->getViewControl("penerimatgl")->showDBValue($row, "");
			$values["catatnip"] = $pageObject->getViewControl("catatnip")->showDBValue($row, "");
			$values["kirimtgl"] = $pageObject->getViewControl("kirimtgl")->showDBValue($row, "");
			$values["batastgl"] = $pageObject->getViewControl("batastgl")->showDBValue($row, "");
			$values["petugas_jabat_id"] = $pageObject->getViewControl("petugas_jabat_id")->showDBValue($row, "");
			$values["pencatat_jabat_id"] = $pageObject->getViewControl("pencatat_jabat_id")->showDBValue($row, "");
			$values["created"] = $pageObject->getViewControl("created")->showDBValue($row, "");
			$values["updated"] = $pageObject->getViewControl("updated")->showDBValue($row, "");
			$values["update_uid"] = $pageObject->getViewControl("update_uid")->showDBValue($row, "");
			$values["npwpd_old"] = $pageObject->getViewControl("npwpd_old")->showDBValue($row, "");
			$values["id_old"] = $pageObject->getViewControl("id_old")->showDBValue($row, "");

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
			$outstr.='"'.str_replace('"', '""', $values["parent"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["npwpd"]).'"';
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
			$outstr.='"'.str_replace('"', '""', $values["nama"]).'"';
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
			$outstr.='"'.str_replace('"', '""', $values["kukuhno"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kukuhnip"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kukuhtgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kukuh_jabat_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kukuhprinted"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["enabled"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["create_uid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["tmt"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["customer_status_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kembalitgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kembalioleh"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kartuprinted"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kembalinip"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["penerimanm"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["penerimaalamat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["penerimatgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["catatnip"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kirimtgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["batastgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["petugas_jabat_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pencatat_jabat_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["created"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["updated"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["update_uid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["npwpd_old"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["id_old"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parent").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Npwpd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Rp").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pb").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Formno").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Reg Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nama").'</td>';	
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kukuhno").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kukuhnip").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kukuhtgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kukuh Jabat Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kukuhprinted").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Enabled").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Create Uid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tmt").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Customer Status Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kembalitgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kembalioleh").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kartuprinted").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kembalinip").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Penerimanm").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Penerimaalamat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Penerimatgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Catatnip").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kirimtgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Batastgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Petugas Jabat Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pencatat Jabat Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Created").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Updated").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Update Uid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Npwpd Old").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Old").'</td>';	
	}
	else
	{
		echo "<td>"."Id"."</td>";
		echo "<td>"."Parent"."</td>";
		echo "<td>"."Npwpd"."</td>";
		echo "<td>"."Rp"."</td>";
		echo "<td>"."Pb"."</td>";
		echo "<td>"."Formno"."</td>";
		echo "<td>"."Reg Date"."</td>";
		echo "<td>"."Nama"."</td>";
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
		echo "<td>"."Kukuhno"."</td>";
		echo "<td>"."Kukuhnip"."</td>";
		echo "<td>"."Kukuhtgl"."</td>";
		echo "<td>"."Kukuh Jabat Id"."</td>";
		echo "<td>"."Kukuhprinted"."</td>";
		echo "<td>"."Enabled"."</td>";
		echo "<td>"."Create Uid"."</td>";
		echo "<td>"."Tmt"."</td>";
		echo "<td>"."Customer Status Id"."</td>";
		echo "<td>"."Kembalitgl"."</td>";
		echo "<td>"."Kembalioleh"."</td>";
		echo "<td>"."Kartuprinted"."</td>";
		echo "<td>"."Kembalinip"."</td>";
		echo "<td>"."Penerimanm"."</td>";
		echo "<td>"."Penerimaalamat"."</td>";
		echo "<td>"."Penerimatgl"."</td>";
		echo "<td>"."Catatnip"."</td>";
		echo "<td>"."Kirimtgl"."</td>";
		echo "<td>"."Batastgl"."</td>";
		echo "<td>"."Petugas Jabat Id"."</td>";
		echo "<td>"."Pencatat Jabat Id"."</td>";
		echo "<td>"."Created"."</td>";
		echo "<td>"."Updated"."</td>";
		echo "<td>"."Update Uid"."</td>";
		echo "<td>"."Npwpd Old"."</td>";
		echo "<td>"."Id Old"."</td>";
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
					$values["parent"] = $pageObject->getViewControl("parent")->showDBValue($row, "");
					$values["npwpd"] = $pageObject->getViewControl("npwpd")->showDBValue($row, "");
					$values["rp"] = $pageObject->getViewControl("rp")->showDBValue($row, "");
					$values["pb"] = $pageObject->getViewControl("pb")->showDBValue($row, "");
					$values["formno"] = $pageObject->getViewControl("formno")->showDBValue($row, "");
					$values["reg_date"] = $pageObject->getViewControl("reg_date")->showDBValue($row, "");
					$values["nama"] = $pageObject->getViewControl("nama")->showDBValue($row, "");
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
					$values["kukuhno"] = $pageObject->getViewControl("kukuhno")->showDBValue($row, "");
					$values["kukuhnip"] = $pageObject->getViewControl("kukuhnip")->showDBValue($row, "");
					$values["kukuhtgl"] = $pageObject->getViewControl("kukuhtgl")->showDBValue($row, "");
					$values["kukuh_jabat_id"] = $pageObject->getViewControl("kukuh_jabat_id")->showDBValue($row, "");
					$values["kukuhprinted"] = $pageObject->getViewControl("kukuhprinted")->showDBValue($row, "");
					$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
					$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
					$values["tmt"] = $pageObject->getViewControl("tmt")->showDBValue($row, "");
					$values["customer_status_id"] = $pageObject->getViewControl("customer_status_id")->showDBValue($row, "");
					$values["kembalitgl"] = $pageObject->getViewControl("kembalitgl")->showDBValue($row, "");
					$values["kembalioleh"] = $pageObject->getViewControl("kembalioleh")->showDBValue($row, "");
					$values["kartuprinted"] = $pageObject->getViewControl("kartuprinted")->showDBValue($row, "");
					$values["kembalinip"] = $pageObject->getViewControl("kembalinip")->showDBValue($row, "");
					$values["penerimanm"] = $pageObject->getViewControl("penerimanm")->showDBValue($row, "");
					$values["penerimaalamat"] = $pageObject->getViewControl("penerimaalamat")->showDBValue($row, "");
					$values["penerimatgl"] = $pageObject->getViewControl("penerimatgl")->showDBValue($row, "");
					$values["catatnip"] = $pageObject->getViewControl("catatnip")->showDBValue($row, "");
					$values["kirimtgl"] = $pageObject->getViewControl("kirimtgl")->showDBValue($row, "");
					$values["batastgl"] = $pageObject->getViewControl("batastgl")->showDBValue($row, "");
					$values["petugas_jabat_id"] = $pageObject->getViewControl("petugas_jabat_id")->showDBValue($row, "");
					$values["pencatat_jabat_id"] = $pageObject->getViewControl("pencatat_jabat_id")->showDBValue($row, "");
					$values["created"] = $pageObject->getViewControl("created")->showDBValue($row, "");
					$values["updated"] = $pageObject->getViewControl("updated")->showDBValue($row, "");
					$values["update_uid"] = $pageObject->getViewControl("update_uid")->showDBValue($row, "");
					$values["npwpd_old"] = $pageObject->getViewControl("npwpd_old")->showDBValue($row, "");
					$values["id_old"] = $pageObject->getViewControl("id_old")->showDBValue($row, "");
		
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
			
									echo $values["parent"];
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
						echo PrepareForExcel($values["nama"]);
					else
						echo $values["nama"];
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
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["telphone"]);
					else
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
			
									echo $values["kukuhno"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kukuhnip"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["kukuhtgl"]);
					else
						echo $values["kukuhtgl"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kukuh_jabat_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kukuhprinted"];
			echo '</td>';
							echo '<td>';
			
									echo $values["enabled"];
			echo '</td>';
							echo '<td>';
			
									echo $values["create_uid"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["tmt"]);
					else
						echo $values["tmt"];
			echo '</td>';
							echo '<td>';
			
									echo $values["customer_status_id"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["kembalitgl"]);
					else
						echo $values["kembalitgl"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kembalioleh"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kartuprinted"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kembalinip"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["penerimanm"]);
					else
						echo $values["penerimanm"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["penerimaalamat"]);
					else
						echo $values["penerimaalamat"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["penerimatgl"]);
					else
						echo $values["penerimatgl"];
			echo '</td>';
							echo '<td>';
			
									echo $values["catatnip"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["kirimtgl"]);
					else
						echo $values["kirimtgl"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["batastgl"]);
					else
						echo $values["batastgl"];
			echo '</td>';
							echo '<td>';
			
									echo $values["petugas_jabat_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["pencatat_jabat_id"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["created"]);
					else
						echo $values["created"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["updated"]);
					else
						echo $values["updated"];
			echo '</td>';
							echo '<td>';
			
									echo $values["update_uid"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["npwpd_old"]);
					else
						echo $values["npwpd_old"];
			echo '</td>';
							echo '<td>';
			
									echo $values["id_old"];
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
