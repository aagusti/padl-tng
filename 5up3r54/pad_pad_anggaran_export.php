<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/pad_pad_anggaran_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["pad_pad_anggaran_export"] = $layout;


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

$xt->display("pad_pad_anggaran_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=pad_pad_anggaran.xls");

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
	header("Content-Disposition: attachment;Filename=pad_pad_anggaran.doc");

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
	header("Content-Disposition: attachment;Filename=pad_pad_anggaran.xml");
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
			$values["rekening_id"] = $pageObject->showDBValue("rekening_id", $row);
			$values["status_anggaran"] = $pageObject->showDBValue("status_anggaran", $row);
			$values["target"] = $pageObject->showDBValue("target", $row);
			$values["bulan1"] = $pageObject->showDBValue("bulan1", $row);
			$values["bulan2"] = $pageObject->showDBValue("bulan2", $row);
			$values["bulan3"] = $pageObject->showDBValue("bulan3", $row);
			$values["bulan4"] = $pageObject->showDBValue("bulan4", $row);
			$values["bulan5"] = $pageObject->showDBValue("bulan5", $row);
			$values["bulan6"] = $pageObject->showDBValue("bulan6", $row);
			$values["bulan7"] = $pageObject->showDBValue("bulan7", $row);
			$values["bulan8"] = $pageObject->showDBValue("bulan8", $row);
			$values["bulan9"] = $pageObject->showDBValue("bulan9", $row);
			$values["bulan10"] = $pageObject->showDBValue("bulan10", $row);
			$values["bulan11"] = $pageObject->showDBValue("bulan11", $row);
			$values["bulan12"] = $pageObject->showDBValue("bulan12", $row);
			$values["jumlah"] = $pageObject->showDBValue("jumlah", $row);
			$values["created"] = $pageObject->showDBValue("created", $row);
			$values["updated"] = $pageObject->showDBValue("updated", $row);
			$values["create_uid"] = $pageObject->showDBValue("create_uid", $row);
			$values["update_uid"] = $pageObject->showDBValue("update_uid", $row);
			$values["tahun"] = $pageObject->showDBValue("tahun", $row);
		
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
	header("Content-Disposition: attachment;Filename=pad_pad_anggaran.csv");
	
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
	$outstr.= "\"rekening_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"status_anggaran\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"target\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan1\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan2\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan3\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan4\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan5\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan6\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan7\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan8\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan9\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan10\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan11\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bulan12\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"jumlah\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"created\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"updated\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"create_uid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"update_uid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tahun\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	$pageObject->viewControls->forExport = "csv";
	while((!$nPageSize || $iNumberOfRows < $nPageSize) && $row)
	{
		$values = array();
			$values["id"] = $pageObject->getViewControl("id")->showDBValue($row, "");
			$values["rekening_id"] = $pageObject->getViewControl("rekening_id")->showDBValue($row, "");
			$values["status_anggaran"] = $row["status_anggaran"];
			$values["target"] = $row["target"];
			$values["bulan1"] = $row["bulan1"];
			$values["bulan2"] = $row["bulan2"];
			$values["bulan3"] = $row["bulan3"];
			$values["bulan4"] = $row["bulan4"];
			$values["bulan5"] = $row["bulan5"];
			$values["bulan6"] = $row["bulan6"];
			$values["bulan7"] = $row["bulan7"];
			$values["bulan8"] = $row["bulan8"];
			$values["bulan9"] = $row["bulan9"];
			$values["bulan10"] = $row["bulan10"];
			$values["bulan11"] = $row["bulan11"];
			$values["bulan12"] = $row["bulan12"];
			$values["jumlah"] = $row["jumlah"];
			$values["created"] = $pageObject->getViewControl("created")->showDBValue($row, "");
			$values["updated"] = $pageObject->getViewControl("updated")->showDBValue($row, "");
			$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
			$values["update_uid"] = $pageObject->getViewControl("update_uid")->showDBValue($row, "");
			$values["tahun"] = $pageObject->getViewControl("tahun")->showDBValue($row, "");

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
			$outstr.='"'.str_replace('"', '""', $values["rekening_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["status_anggaran"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["target"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan1"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan2"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan3"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan4"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan5"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan6"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan7"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan8"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan9"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan10"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan11"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bulan12"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["jumlah"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["created"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["updated"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["create_uid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["update_uid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["tahun"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Rekening Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Status Anggaran").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Target").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan1").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan2").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan3").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan4").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan5").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan6").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan7").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan8").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan9").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan10").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan11").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bulan12").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Jumlah").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Created").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Updated").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Create Uid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Update Uid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tahun").'</td>';	
	}
	else
	{
		echo "<td>"."Id"."</td>";
		echo "<td>"."Rekening Id"."</td>";
		echo "<td>"."Status Anggaran"."</td>";
		echo "<td>"."Target"."</td>";
		echo "<td>"."Bulan1"."</td>";
		echo "<td>"."Bulan2"."</td>";
		echo "<td>"."Bulan3"."</td>";
		echo "<td>"."Bulan4"."</td>";
		echo "<td>"."Bulan5"."</td>";
		echo "<td>"."Bulan6"."</td>";
		echo "<td>"."Bulan7"."</td>";
		echo "<td>"."Bulan8"."</td>";
		echo "<td>"."Bulan9"."</td>";
		echo "<td>"."Bulan10"."</td>";
		echo "<td>"."Bulan11"."</td>";
		echo "<td>"."Bulan12"."</td>";
		echo "<td>"."Jumlah"."</td>";
		echo "<td>"."Created"."</td>";
		echo "<td>"."Updated"."</td>";
		echo "<td>"."Create Uid"."</td>";
		echo "<td>"."Update Uid"."</td>";
		echo "<td>"."Tahun"."</td>";
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
					$values["rekening_id"] = $pageObject->getViewControl("rekening_id")->showDBValue($row, "");
					$values["status_anggaran"] = $pageObject->getViewControl("status_anggaran")->showDBValue($row, "");
					$values["target"] = $pageObject->getViewControl("target")->showDBValue($row, "");
					$values["bulan1"] = $pageObject->getViewControl("bulan1")->showDBValue($row, "");
					$values["bulan2"] = $pageObject->getViewControl("bulan2")->showDBValue($row, "");
					$values["bulan3"] = $pageObject->getViewControl("bulan3")->showDBValue($row, "");
					$values["bulan4"] = $pageObject->getViewControl("bulan4")->showDBValue($row, "");
					$values["bulan5"] = $pageObject->getViewControl("bulan5")->showDBValue($row, "");
					$values["bulan6"] = $pageObject->getViewControl("bulan6")->showDBValue($row, "");
					$values["bulan7"] = $pageObject->getViewControl("bulan7")->showDBValue($row, "");
					$values["bulan8"] = $pageObject->getViewControl("bulan8")->showDBValue($row, "");
					$values["bulan9"] = $pageObject->getViewControl("bulan9")->showDBValue($row, "");
					$values["bulan10"] = $pageObject->getViewControl("bulan10")->showDBValue($row, "");
					$values["bulan11"] = $pageObject->getViewControl("bulan11")->showDBValue($row, "");
					$values["bulan12"] = $pageObject->getViewControl("bulan12")->showDBValue($row, "");
					$values["jumlah"] = $pageObject->getViewControl("jumlah")->showDBValue($row, "");
					$values["created"] = $pageObject->getViewControl("created")->showDBValue($row, "");
					$values["updated"] = $pageObject->getViewControl("updated")->showDBValue($row, "");
					$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
					$values["update_uid"] = $pageObject->getViewControl("update_uid")->showDBValue($row, "");
					$values["tahun"] = $pageObject->getViewControl("tahun")->showDBValue($row, "");
		
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
			
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["rekening_id"]);
				else
					echo $values["rekening_id"];//echo htmlspecialchars($values["rekening_id"]); commented for bug #6823
					
			echo '</td>';
							echo '<td>';
			
									echo $values["status_anggaran"];
			echo '</td>';
							echo '<td>';
			
									echo $values["target"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan1"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan2"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan3"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan4"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan5"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan6"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan7"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan8"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan9"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan10"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan11"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bulan12"];
			echo '</td>';
							echo '<td>';
			
									echo $values["jumlah"];
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
			
									echo $values["create_uid"];
			echo '</td>';
							echo '<td>';
			
									echo $values["update_uid"];
			echo '</td>';
							echo '<td>';
			
									echo $values["tahun"];
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
