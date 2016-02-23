<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/pad_pad_pemda_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["pad_pad_pemda_export"] = $layout;


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

$xt->display("pad_pad_pemda_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=pad_pad_pemda.xls");

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
	header("Content-Disposition: attachment;Filename=pad_pad_pemda.doc");

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
	header("Content-Disposition: attachment;Filename=pad_pad_pemda.xml");
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
			$values["type"] = $pageObject->showDBValue("type", $row);
			$values["kepala_nama"] = $pageObject->showDBValue("kepala_nama", $row);
			$values["alamat"] = $pageObject->showDBValue("alamat", $row);
			$values["telp"] = $pageObject->showDBValue("telp", $row);
			$values["pemda_nama"] = $pageObject->showDBValue("pemda_nama", $row);
			$values["ibukota"] = $pageObject->showDBValue("ibukota", $row);
			$values["tmt"] = $pageObject->showDBValue("tmt", $row);
			$values["jabatan"] = $pageObject->showDBValue("jabatan", $row);
			$values["ppkd_id"] = $pageObject->showDBValue("ppkd_id", $row);
			$values["reklame_id"] = $pageObject->showDBValue("reklame_id", $row);
			$values["pendapatan_id"] = $pageObject->showDBValue("pendapatan_id", $row);
			$values["pemda_nama_singkat"] = $pageObject->showDBValue("pemda_nama_singkat", $row);
			$values["airtanah_id"] = $pageObject->showDBValue("airtanah_id", $row);
			$values["self_dok_id"] = $pageObject->showDBValue("self_dok_id", $row);
			$values["office_dok_id"] = $pageObject->showDBValue("office_dok_id", $row);
			$values["tgl_jatuhtempo_self"] = $pageObject->showDBValue("tgl_jatuhtempo_self", $row);
			$values["spt_denda"] = $pageObject->showDBValue("spt_denda", $row);
			$values["tgl_spt"] = $pageObject->showDBValue("tgl_spt", $row);
			$values["pad_bunga"] = $pageObject->showDBValue("pad_bunga", $row);
			$values["fax"] = $pageObject->showDBValue("fax", $row);
			$values["website"] = $pageObject->showDBValue("website", $row);
			$values["email"] = $pageObject->showDBValue("email", $row);
			$values["daerah"] = $pageObject->showDBValue("daerah", $row);
			$values["alamat_lengkap"] = $pageObject->showDBValue("alamat_lengkap", $row);
			$values["ppj_id"] = $pageObject->showDBValue("ppj_id", $row);
			$values["hotel_id"] = $pageObject->showDBValue("hotel_id", $row);
			$values["walet_id"] = $pageObject->showDBValue("walet_id", $row);
			$values["restauran_id"] = $pageObject->showDBValue("restauran_id", $row);
			$values["hiburan_id"] = $pageObject->showDBValue("hiburan_id", $row);
			$values["parkir_id"] = $pageObject->showDBValue("parkir_id", $row);
			$values["enabled"] = $pageObject->showDBValue("enabled", $row);
			$values["surat_no"] = $pageObject->showDBValue("surat_no", $row);
			$values["ijin_kd"] = $pageObject->showDBValue("ijin_kd", $row);
			$values["hotel_kd"] = $pageObject->showDBValue("hotel_kd", $row);
			$values["restoran_kd"] = $pageObject->showDBValue("restoran_kd", $row);
			$values["hiburan_kd"] = $pageObject->showDBValue("hiburan_kd", $row);
			$values["ppj_kd"] = $pageObject->showDBValue("ppj_kd", $row);
			$values["parkir_kd"] = $pageObject->showDBValue("parkir_kd", $row);
			$values["airtanah_kd"] = $pageObject->showDBValue("airtanah_kd", $row);
			$values["reklame_kd"] = $pageObject->showDBValue("reklame_kd", $row);
			$values["restauran_kd"] = $pageObject->showDBValue("restauran_kd", $row);
		
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
	header("Content-Disposition: attachment;Filename=pad_pad_pemda.csv");
	
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
	$outstr.= "\"type\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kepala_nama\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"alamat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"telp\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pemda_nama\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ibukota\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tmt\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"jabatan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ppkd_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"reklame_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pendapatan_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pemda_nama_singkat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"airtanah_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"self_dok_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"office_dok_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tgl_jatuhtempo_self\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"spt_denda\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tgl_spt\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pad_bunga\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"fax\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"website\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"email\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"daerah\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"alamat_lengkap\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ppj_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"hotel_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"walet_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"restauran_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"hiburan_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"enabled\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"surat_no\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ijin_kd\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"hotel_kd\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"restoran_kd\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"hiburan_kd\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ppj_kd\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_kd\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"airtanah_kd\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"reklame_kd\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"restauran_kd\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["id"] = $pageObject->getViewControl("id")->showDBValue($row, "");
			$values["type"] = $pageObject->getViewControl("type")->showDBValue($row, "");
			$values["kepala_nama"] = $pageObject->getViewControl("kepala_nama")->showDBValue($row, "");
			$values["alamat"] = $pageObject->getViewControl("alamat")->showDBValue($row, "");
			$values["telp"] = $pageObject->getViewControl("telp")->showDBValue($row, "");
			$values["pemda_nama"] = $pageObject->getViewControl("pemda_nama")->showDBValue($row, "");
			$values["ibukota"] = $pageObject->getViewControl("ibukota")->showDBValue($row, "");
			$values["tmt"] = $pageObject->getViewControl("tmt")->showDBValue($row, "");
			$values["jabatan"] = $pageObject->getViewControl("jabatan")->showDBValue($row, "");
			$values["ppkd_id"] = $pageObject->getViewControl("ppkd_id")->showDBValue($row, "");
			$values["reklame_id"] = $pageObject->getViewControl("reklame_id")->showDBValue($row, "");
			$values["pendapatan_id"] = $pageObject->getViewControl("pendapatan_id")->showDBValue($row, "");
			$values["pemda_nama_singkat"] = $pageObject->getViewControl("pemda_nama_singkat")->showDBValue($row, "");
			$values["airtanah_id"] = $pageObject->getViewControl("airtanah_id")->showDBValue($row, "");
			$values["self_dok_id"] = $pageObject->getViewControl("self_dok_id")->showDBValue($row, "");
			$values["office_dok_id"] = $pageObject->getViewControl("office_dok_id")->showDBValue($row, "");
			$values["tgl_jatuhtempo_self"] = $pageObject->getViewControl("tgl_jatuhtempo_self")->showDBValue($row, "");
			$values["spt_denda"] = $row["spt_denda"];
			$values["tgl_spt"] = $pageObject->getViewControl("tgl_spt")->showDBValue($row, "");
			$values["pad_bunga"] = $row["pad_bunga"];
			$values["fax"] = $pageObject->getViewControl("fax")->showDBValue($row, "");
			$values["website"] = $pageObject->getViewControl("website")->showDBValue($row, "");
			$values["email"] = $pageObject->getViewControl("email")->showDBValue($row, "");
			$values["daerah"] = $pageObject->getViewControl("daerah")->showDBValue($row, "");
			$values["alamat_lengkap"] = $pageObject->getViewControl("alamat_lengkap")->showDBValue($row, "");
			$values["ppj_id"] = $pageObject->getViewControl("ppj_id")->showDBValue($row, "");
			$values["hotel_id"] = $pageObject->getViewControl("hotel_id")->showDBValue($row, "");
			$values["walet_id"] = $pageObject->getViewControl("walet_id")->showDBValue($row, "");
			$values["restauran_id"] = $pageObject->getViewControl("restauran_id")->showDBValue($row, "");
			$values["hiburan_id"] = $pageObject->getViewControl("hiburan_id")->showDBValue($row, "");
			$values["parkir_id"] = $pageObject->getViewControl("parkir_id")->showDBValue($row, "");
			$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
			$values["surat_no"] = $pageObject->getViewControl("surat_no")->showDBValue($row, "");
			$values["ijin_kd"] = $pageObject->getViewControl("ijin_kd")->showDBValue($row, "");
			$values["hotel_kd"] = $pageObject->getViewControl("hotel_kd")->showDBValue($row, "");
			$values["restoran_kd"] = $pageObject->getViewControl("restoran_kd")->showDBValue($row, "");
			$values["hiburan_kd"] = $pageObject->getViewControl("hiburan_kd")->showDBValue($row, "");
			$values["ppj_kd"] = $pageObject->getViewControl("ppj_kd")->showDBValue($row, "");
			$values["parkir_kd"] = $pageObject->getViewControl("parkir_kd")->showDBValue($row, "");
			$values["airtanah_kd"] = $pageObject->getViewControl("airtanah_kd")->showDBValue($row, "");
			$values["reklame_kd"] = $pageObject->getViewControl("reklame_kd")->showDBValue($row, "");
			$values["restauran_kd"] = $pageObject->getViewControl("restauran_kd")->showDBValue($row, "");

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
			$outstr.='"'.str_replace('"', '""', $values["type"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kepala_nama"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["alamat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["telp"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pemda_nama"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ibukota"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["tmt"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["jabatan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ppkd_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["reklame_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pendapatan_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pemda_nama_singkat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["airtanah_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["self_dok_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["office_dok_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["tgl_jatuhtempo_self"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["spt_denda"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["tgl_spt"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pad_bunga"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["fax"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["website"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["email"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["daerah"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["alamat_lengkap"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ppj_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["hotel_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["walet_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["restauran_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["hiburan_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["enabled"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["surat_no"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ijin_kd"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["hotel_kd"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["restoran_kd"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["hiburan_kd"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["ppj_kd"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_kd"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["airtanah_kd"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["reklame_kd"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["restauran_kd"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Type").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kepala Nama").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Alamat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Telp").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pemda Nama").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ibukota").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tmt").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Jabatan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ppkd Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Reklame Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pendapatan Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pemda Nama Singkat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Airtanah Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Self Dok Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Office Dok Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tgl Jatuhtempo Self").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Spt Denda").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tgl Spt").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pad Bunga").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fax").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Website").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Email").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Daerah").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Alamat Lengkap").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ppj Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hotel Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Walet Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Restauran Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hiburan Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Enabled").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Surat No").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ijin Kd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hotel Kd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Restoran Kd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hiburan Kd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ppj Kd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Kd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Airtanah Kd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Reklame Kd").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Restauran Kd").'</td>';	
	}
	else
	{
		echo "<td>"."Id"."</td>";
		echo "<td>"."Type"."</td>";
		echo "<td>"."Kepala Nama"."</td>";
		echo "<td>"."Alamat"."</td>";
		echo "<td>"."Telp"."</td>";
		echo "<td>"."Pemda Nama"."</td>";
		echo "<td>"."Ibukota"."</td>";
		echo "<td>"."Tmt"."</td>";
		echo "<td>"."Jabatan"."</td>";
		echo "<td>"."Ppkd Id"."</td>";
		echo "<td>"."Reklame Id"."</td>";
		echo "<td>"."Pendapatan Id"."</td>";
		echo "<td>"."Pemda Nama Singkat"."</td>";
		echo "<td>"."Airtanah Id"."</td>";
		echo "<td>"."Self Dok Id"."</td>";
		echo "<td>"."Office Dok Id"."</td>";
		echo "<td>"."Tgl Jatuhtempo Self"."</td>";
		echo "<td>"."Spt Denda"."</td>";
		echo "<td>"."Tgl Spt"."</td>";
		echo "<td>"."Pad Bunga"."</td>";
		echo "<td>"."Fax"."</td>";
		echo "<td>"."Website"."</td>";
		echo "<td>"."Email"."</td>";
		echo "<td>"."Daerah"."</td>";
		echo "<td>"."Alamat Lengkap"."</td>";
		echo "<td>"."Ppj Id"."</td>";
		echo "<td>"."Hotel Id"."</td>";
		echo "<td>"."Walet Id"."</td>";
		echo "<td>"."Restauran Id"."</td>";
		echo "<td>"."Hiburan Id"."</td>";
		echo "<td>"."Parkir Id"."</td>";
		echo "<td>"."Enabled"."</td>";
		echo "<td>"."Surat No"."</td>";
		echo "<td>"."Ijin Kd"."</td>";
		echo "<td>"."Hotel Kd"."</td>";
		echo "<td>"."Restoran Kd"."</td>";
		echo "<td>"."Hiburan Kd"."</td>";
		echo "<td>"."Ppj Kd"."</td>";
		echo "<td>"."Parkir Kd"."</td>";
		echo "<td>"."Airtanah Kd"."</td>";
		echo "<td>"."Reklame Kd"."</td>";
		echo "<td>"."Restauran Kd"."</td>";
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
					$values["type"] = $pageObject->getViewControl("type")->showDBValue($row, "");
					$values["kepala_nama"] = $pageObject->getViewControl("kepala_nama")->showDBValue($row, "");
					$values["alamat"] = $pageObject->getViewControl("alamat")->showDBValue($row, "");
					$values["telp"] = $pageObject->getViewControl("telp")->showDBValue($row, "");
					$values["pemda_nama"] = $pageObject->getViewControl("pemda_nama")->showDBValue($row, "");
					$values["ibukota"] = $pageObject->getViewControl("ibukota")->showDBValue($row, "");
					$values["tmt"] = $pageObject->getViewControl("tmt")->showDBValue($row, "");
					$values["jabatan"] = $pageObject->getViewControl("jabatan")->showDBValue($row, "");
					$values["ppkd_id"] = $pageObject->getViewControl("ppkd_id")->showDBValue($row, "");
					$values["reklame_id"] = $pageObject->getViewControl("reklame_id")->showDBValue($row, "");
					$values["pendapatan_id"] = $pageObject->getViewControl("pendapatan_id")->showDBValue($row, "");
					$values["pemda_nama_singkat"] = $pageObject->getViewControl("pemda_nama_singkat")->showDBValue($row, "");
					$values["airtanah_id"] = $pageObject->getViewControl("airtanah_id")->showDBValue($row, "");
					$values["self_dok_id"] = $pageObject->getViewControl("self_dok_id")->showDBValue($row, "");
					$values["office_dok_id"] = $pageObject->getViewControl("office_dok_id")->showDBValue($row, "");
					$values["tgl_jatuhtempo_self"] = $pageObject->getViewControl("tgl_jatuhtempo_self")->showDBValue($row, "");
					$values["spt_denda"] = $pageObject->getViewControl("spt_denda")->showDBValue($row, "");
					$values["tgl_spt"] = $pageObject->getViewControl("tgl_spt")->showDBValue($row, "");
					$values["pad_bunga"] = $pageObject->getViewControl("pad_bunga")->showDBValue($row, "");
					$values["fax"] = $pageObject->getViewControl("fax")->showDBValue($row, "");
					$values["website"] = $pageObject->getViewControl("website")->showDBValue($row, "");
					$values["email"] = $pageObject->getViewControl("email")->showDBValue($row, "");
					$values["daerah"] = $pageObject->getViewControl("daerah")->showDBValue($row, "");
					$values["alamat_lengkap"] = $pageObject->getViewControl("alamat_lengkap")->showDBValue($row, "");
					$values["ppj_id"] = $pageObject->getViewControl("ppj_id")->showDBValue($row, "");
					$values["hotel_id"] = $pageObject->getViewControl("hotel_id")->showDBValue($row, "");
					$values["walet_id"] = $pageObject->getViewControl("walet_id")->showDBValue($row, "");
					$values["restauran_id"] = $pageObject->getViewControl("restauran_id")->showDBValue($row, "");
					$values["hiburan_id"] = $pageObject->getViewControl("hiburan_id")->showDBValue($row, "");
					$values["parkir_id"] = $pageObject->getViewControl("parkir_id")->showDBValue($row, "");
					$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
					$values["surat_no"] = $pageObject->getViewControl("surat_no")->showDBValue($row, "");
					$values["ijin_kd"] = $pageObject->getViewControl("ijin_kd")->showDBValue($row, "");
					$values["hotel_kd"] = $pageObject->getViewControl("hotel_kd")->showDBValue($row, "");
					$values["restoran_kd"] = $pageObject->getViewControl("restoran_kd")->showDBValue($row, "");
					$values["hiburan_kd"] = $pageObject->getViewControl("hiburan_kd")->showDBValue($row, "");
					$values["ppj_kd"] = $pageObject->getViewControl("ppj_kd")->showDBValue($row, "");
					$values["parkir_kd"] = $pageObject->getViewControl("parkir_kd")->showDBValue($row, "");
					$values["airtanah_kd"] = $pageObject->getViewControl("airtanah_kd")->showDBValue($row, "");
					$values["reklame_kd"] = $pageObject->getViewControl("reklame_kd")->showDBValue($row, "");
					$values["restauran_kd"] = $pageObject->getViewControl("restauran_kd")->showDBValue($row, "");
		
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
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["type"]);
					else
						echo $values["type"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["kepala_nama"]);
					else
						echo $values["kepala_nama"];
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
						echo PrepareForExcel($values["telp"]);
					else
						echo $values["telp"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["pemda_nama"]);
					else
						echo $values["pemda_nama"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ibukota"]);
					else
						echo $values["ibukota"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["tmt"]);
					else
						echo $values["tmt"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["jabatan"]);
					else
						echo $values["jabatan"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ppkd_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["reklame_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["pendapatan_id"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["pemda_nama_singkat"]);
					else
						echo $values["pemda_nama_singkat"];
			echo '</td>';
							echo '<td>';
			
									echo $values["airtanah_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["self_dok_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["office_dok_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["tgl_jatuhtempo_self"];
			echo '</td>';
							echo '<td>';
			
									echo $values["spt_denda"];
			echo '</td>';
							echo '<td>';
			
									echo $values["tgl_spt"];
			echo '</td>';
							echo '<td>';
			
									echo $values["pad_bunga"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["fax"]);
					else
						echo $values["fax"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["website"]);
					else
						echo $values["website"];
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
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["daerah"]);
					else
						echo $values["daerah"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["alamat_lengkap"]);
					else
						echo $values["alamat_lengkap"];
			echo '</td>';
							echo '<td>';
			
									echo $values["ppj_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["hotel_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["walet_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["restauran_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["hiburan_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["enabled"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["surat_no"]);
					else
						echo $values["surat_no"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ijin_kd"]);
					else
						echo $values["ijin_kd"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["hotel_kd"]);
					else
						echo $values["hotel_kd"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["restoran_kd"]);
					else
						echo $values["restoran_kd"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["hiburan_kd"]);
					else
						echo $values["hiburan_kd"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ppj_kd"]);
					else
						echo $values["ppj_kd"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["parkir_kd"]);
					else
						echo $values["parkir_kd"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["airtanah_kd"]);
					else
						echo $values["airtanah_kd"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["reklame_kd"]);
					else
						echo $values["reklame_kd"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["restauran_kd"]);
					else
						echo $values["restauran_kd"];
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
