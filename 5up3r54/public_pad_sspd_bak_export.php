<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/public_pad_sspd_bak_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["public_pad_sspd_bak_export"] = $layout;


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
			$selected_recs[] = $keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<0)
				continue;
			$keys = array();
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

$xt->display("public_pad_sspd_bak_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=public_pad_sspd_bak.xls");

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
	header("Content-Disposition: attachment;Filename=public_pad_sspd_bak.doc");

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
	header("Content-Disposition: attachment;Filename=public_pad_sspd_bak.xml");
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
			$values["tahun"] = $pageObject->showDBValue("tahun", $row);
			$values["sspdno"] = $pageObject->showDBValue("sspdno", $row);
			$values["sspdtgl"] = $pageObject->showDBValue("sspdtgl", $row);
			$values["spt_id"] = $pageObject->showDBValue("spt_id", $row);
			$values["bunga"] = $pageObject->showDBValue("bunga", $row);
			$values["bulan_telat"] = $pageObject->showDBValue("bulan_telat", $row);
			$values["hitung_bunga"] = $pageObject->showDBValue("hitung_bunga", $row);
			$values["printed"] = $pageObject->showDBValue("printed", $row);
			$values["enabled"] = $pageObject->showDBValue("enabled", $row);
			$values["create_date"] = $pageObject->showDBValue("create_date", $row);
			$values["create_uid"] = $pageObject->showDBValue("create_uid", $row);
			$values["write_date"] = $pageObject->showDBValue("write_date", $row);
			$values["write_uid"] = $pageObject->showDBValue("write_uid", $row);
			$values["sspdjam"] = $pageObject->showDBValue("sspdjam", $row);
			$values["tp_id"] = $pageObject->showDBValue("tp_id", $row);
			$values["is_validated"] = $pageObject->showDBValue("is_validated", $row);
			$values["keterangan"] = $pageObject->showDBValue("keterangan", $row);
			$values["denda"] = $pageObject->showDBValue("denda", $row);
			$values["jml_bayar"] = $pageObject->showDBValue("jml_bayar", $row);
			$values["is_valid"] = $pageObject->showDBValue("is_valid", $row);
		
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
	header("Content-Disposition: attachment;Filename=public_pad_sspd_bak.csv");
	
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
	$outstr.= "\"tahun\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"sspdno\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"sspdtgl\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"spt_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bunga\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan_telat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"hitung_bunga\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"printed\"";
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
	$outstr.= "\"sspdjam\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tp_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"is_validated\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"keterangan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"denda\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"jml_bayar\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"is_valid\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["id"] = $pageObject->getViewControl("id")->showDBValue($row, "");
			$values["tahun"] = $pageObject->getViewControl("tahun")->showDBValue($row, "");
			$values["sspdno"] = $pageObject->getViewControl("sspdno")->showDBValue($row, "");
			$values["sspdtgl"] = $pageObject->getViewControl("sspdtgl")->showDBValue($row, "");
			$values["spt_id"] = $pageObject->getViewControl("spt_id")->showDBValue($row, "");
			$values["bunga"] = $row["bunga"];
			$values["bulan_telat"] = $pageObject->getViewControl("bulan_telat")->showDBValue($row, "");
			$values["hitung_bunga"] = $pageObject->getViewControl("hitung_bunga")->showDBValue($row, "");
			$values["printed"] = $pageObject->getViewControl("printed")->showDBValue($row, "");
			$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
			$values["create_date"] = $pageObject->getViewControl("create_date")->showDBValue($row, "");
			$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
			$values["write_date"] = $pageObject->getViewControl("write_date")->showDBValue($row, "");
			$values["write_uid"] = $pageObject->getViewControl("write_uid")->showDBValue($row, "");
			$values["sspdjam"] = $pageObject->getViewControl("sspdjam")->showDBValue($row, "");
			$values["tp_id"] = $pageObject->getViewControl("tp_id")->showDBValue($row, "");
			$values["is_validated"] = $pageObject->getViewControl("is_validated")->showDBValue($row, "");
			$values["keterangan"] = $pageObject->getViewControl("keterangan")->showDBValue($row, "");
			$values["denda"] = $pageObject->getViewControl("denda")->showDBValue($row, "");
			$values["jml_bayar"] = $pageObject->getViewControl("jml_bayar")->showDBValue($row, "");
			$values["is_valid"] = $pageObject->getViewControl("is_valid")->showDBValue($row, "");

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
			$outstr.='"'.str_replace('"', '""', $values["tahun"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["sspdno"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["sspdtgl"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["spt_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bunga"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan_telat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["hitung_bunga"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["printed"]).'"';
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
			$outstr.='"'.str_replace('"', '""', $values["sspdjam"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["tp_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["is_validated"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["keterangan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["denda"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["jml_bayar"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["is_valid"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tahun").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Sspdno").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Sspdtgl").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Spt Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bunga").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan Telat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hitung Bunga").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Printed").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Enabled").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Create Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Create Uid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Write Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Write Uid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Sspdjam").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tp Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Is Validated").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Keterangan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Denda").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Jml Bayar").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Is Valid").'</td>';	
	}
	else
	{
		echo "<td>"."Id"."</td>";
		echo "<td>"."Tahun"."</td>";
		echo "<td>"."Sspdno"."</td>";
		echo "<td>"."Sspdtgl"."</td>";
		echo "<td>"."Spt Id"."</td>";
		echo "<td>"."Bunga"."</td>";
		echo "<td>"."Bulan Telat"."</td>";
		echo "<td>"."Hitung Bunga"."</td>";
		echo "<td>"."Printed"."</td>";
		echo "<td>"."Enabled"."</td>";
		echo "<td>"."Create Date"."</td>";
		echo "<td>"."Create Uid"."</td>";
		echo "<td>"."Write Date"."</td>";
		echo "<td>"."Write Uid"."</td>";
		echo "<td>"."Sspdjam"."</td>";
		echo "<td>"."Tp Id"."</td>";
		echo "<td>"."Is Validated"."</td>";
		echo "<td>"."Keterangan"."</td>";
		echo "<td>"."Denda"."</td>";
		echo "<td>"."Jml Bayar"."</td>";
		echo "<td>"."Is Valid"."</td>";
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
					$values["tahun"] = $pageObject->getViewControl("tahun")->showDBValue($row, "");
					$values["sspdno"] = $pageObject->getViewControl("sspdno")->showDBValue($row, "");
					$values["sspdtgl"] = $pageObject->getViewControl("sspdtgl")->showDBValue($row, "");
					$values["spt_id"] = $pageObject->getViewControl("spt_id")->showDBValue($row, "");
					$values["bunga"] = $pageObject->getViewControl("bunga")->showDBValue($row, "");
					$values["bulan_telat"] = $pageObject->getViewControl("bulan_telat")->showDBValue($row, "");
					$values["hitung_bunga"] = $pageObject->getViewControl("hitung_bunga")->showDBValue($row, "");
					$values["printed"] = $pageObject->getViewControl("printed")->showDBValue($row, "");
					$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
					$values["create_date"] = $pageObject->getViewControl("create_date")->showDBValue($row, "");
					$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
					$values["write_date"] = $pageObject->getViewControl("write_date")->showDBValue($row, "");
					$values["write_uid"] = $pageObject->getViewControl("write_uid")->showDBValue($row, "");
					$values["sspdjam"] = $pageObject->getViewControl("sspdjam")->showDBValue($row, "");
					$values["tp_id"] = $pageObject->getViewControl("tp_id")->showDBValue($row, "");
					$values["is_validated"] = $pageObject->getViewControl("is_validated")->showDBValue($row, "");
					$values["keterangan"] = $pageObject->getViewControl("keterangan")->showDBValue($row, "");
					$values["denda"] = $pageObject->getViewControl("denda")->showDBValue($row, "");
					$values["jml_bayar"] = $pageObject->getViewControl("jml_bayar")->showDBValue($row, "");
					$values["is_valid"] = $pageObject->getViewControl("is_valid")->showDBValue($row, "");
		
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
			
									echo $values["tahun"];
			echo '</td>';
							echo '<td>';
			
									echo $values["sspdno"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["sspdtgl"]);
					else
						echo $values["sspdtgl"];
			echo '</td>';
							echo '<td>';
			
									echo $values["spt_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bunga"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan_telat"];
			echo '</td>';
							echo '<td>';
			
									echo $values["hitung_bunga"];
			echo '</td>';
							echo '<td>';
			
									echo $values["printed"];
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
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["sspdjam"]);
					else
						echo $values["sspdjam"];
			echo '</td>';
							echo '<td>';
			
									echo $values["tp_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["is_validated"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["keterangan"]);
					else
						echo $values["keterangan"];
			echo '</td>';
							echo '<td>';
			
									echo $values["denda"];
			echo '</td>';
							echo '<td>';
			
									echo $values["jml_bayar"];
			echo '</td>';
							echo '<td>';
			
									echo $values["is_valid"];
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
