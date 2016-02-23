<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");

include("include/pad_pad_customer_usaha_variables.php");

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
$layout->blocks["top"][] = "export";$page_layouts["pad_pad_customer_usaha_export"] = $layout;


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

$xt->display("pad_pad_customer_usaha_export.htm");

function ExportToExcel_old($cipherer)
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=pad_pad_customer_usaha.xls");

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
	header("Content-Disposition: attachment;Filename=pad_pad_customer_usaha.doc");

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
	header("Content-Disposition: attachment;Filename=pad_pad_customer_usaha.xml");
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
			$values["konterid"] = $pageObject->showDBValue("konterid", $row);
			$values["reg_date"] = $pageObject->showDBValue("reg_date", $row);
			$values["customer_id"] = $pageObject->showDBValue("customer_id", $row);
			$values["usaha_id"] = $pageObject->showDBValue("usaha_id", $row);
			$values["so"] = $pageObject->showDBValue("so", $row);
			$values["kecamatan_id"] = $pageObject->showDBValue("kecamatan_id", $row);
			$values["kelurahan_id"] = $pageObject->showDBValue("kelurahan_id", $row);
			$values["notes"] = $pageObject->showDBValue("notes", $row);
			$values["enabled"] = $pageObject->showDBValue("enabled", $row);
			$values["create_uid"] = $pageObject->showDBValue("create_uid", $row);
			$values["customer_status_id"] = $pageObject->showDBValue("customer_status_id", $row);
			$values["aktifnotes"] = $pageObject->showDBValue("aktifnotes", $row);
			$values["tmt"] = $pageObject->showDBValue("tmt", $row);
			$values["air_zona_id"] = $pageObject->showDBValue("air_zona_id", $row);
			$values["air_manfaat_id"] = $pageObject->showDBValue("air_manfaat_id", $row);
			$values["def_pajak_id"] = $pageObject->showDBValue("def_pajak_id", $row);
			$values["opnm"] = $pageObject->showDBValue("opnm", $row);
			$values["opalamat"] = $pageObject->showDBValue("opalamat", $row);
			$values["latitude"] = $pageObject->showDBValue("latitude", $row);
			$values["longitude"] = $pageObject->showDBValue("longitude", $row);
			$values["created"] = $pageObject->showDBValue("created", $row);
			$values["updated"] = $pageObject->showDBValue("updated", $row);
			$values["update_uid"] = $pageObject->showDBValue("update_uid", $row);
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
			$values["mall_id"] = $pageObject->showDBValue("mall_id", $row);
			$values["cash_register"] = $pageObject->showDBValue("cash_register", $row);
			$values["pelaporan"] = $pageObject->showDBValue("pelaporan", $row);
			$values["pembukuan"] = $pageObject->showDBValue("pembukuan", $row);
			$values["bandara"] = $pageObject->showDBValue("bandara", $row);
			$values["wajib_pajak"] = $pageObject->showDBValue("wajib_pajak", $row);
			$values["jumlah_karyawan"] = $pageObject->showDBValue("jumlah_karyawan", $row);
			$values["tanggal_tutup"] = $pageObject->showDBValue("tanggal_tutup", $row);
			$values["parkir_luas"] = $pageObject->showDBValue("parkir_luas", $row);
			$values["parkir_masuk"] = $pageObject->showDBValue("parkir_masuk", $row);
			$values["parkir_tarif_mobil"] = $pageObject->showDBValue("parkir_tarif_mobil", $row);
			$values["parkir_tambahan"] = $pageObject->showDBValue("parkir_tambahan", $row);
			$values["parkir_kapasitas_mobil"] = $pageObject->showDBValue("parkir_kapasitas_mobil", $row);
			$values["parkir_mobil_hari"] = $pageObject->showDBValue("parkir_mobil_hari", $row);
			$values["parkir_keluar"] = $pageObject->showDBValue("parkir_keluar", $row);
			$values["parkir_motor_luas"] = $pageObject->showDBValue("parkir_motor_luas", $row);
			$values["parkir_motor_masuk"] = $pageObject->showDBValue("parkir_motor_masuk", $row);
			$values["parkir_motor_keluar"] = $pageObject->showDBValue("parkir_motor_keluar", $row);
			$values["parkir_tarif_motor"] = $pageObject->showDBValue("parkir_tarif_motor", $row);
			$values["parkir_motor_tambahan"] = $pageObject->showDBValue("parkir_motor_tambahan", $row);
			$values["parkir_kapasitas_motor"] = $pageObject->showDBValue("parkir_kapasitas_motor", $row);
			$values["parkir_motor_hari"] = $pageObject->showDBValue("parkir_motor_hari", $row);
			$values["kelompok_usaha_id"] = $pageObject->showDBValue("kelompok_usaha_id", $row);
			$values["zona_id"] = $pageObject->showDBValue("zona_id", $row);
			$values["manfaat_id"] = $pageObject->showDBValue("manfaat_id", $row);
			$values["golongan_id"] = $pageObject->showDBValue("golongan_id", $row);
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
	header("Content-Disposition: attachment;Filename=pad_pad_customer_usaha.csv");
	
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
	$outstr.= "\"konterid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"reg_date\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"customer_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"usaha_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"so\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kecamatan_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kelurahan_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"notes\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"enabled\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"create_uid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"customer_status_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"aktifnotes\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tmt\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"air_zona_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"air_manfaat_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"def_pajak_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"opnm\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"opalamat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"latitude\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"longitude\"";
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
	$outstr.= "\"mall_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"cash_register\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pelaporan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pembukuan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"bandara\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"wajib_pajak\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"jumlah_karyawan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tanggal_tutup\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_luas\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_masuk\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_tarif_mobil\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_tambahan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_kapasitas_mobil\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_mobil_hari\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_keluar\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_motor_luas\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_motor_masuk\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_motor_keluar\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_tarif_motor\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_motor_tambahan\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_kapasitas_motor\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"parkir_motor_hari\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"kelompok_usaha_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"zona_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"manfaat_id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"golongan_id\"";
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
			$values["konterid"] = $pageObject->getViewControl("konterid")->showDBValue($row, "");
			$values["reg_date"] = $pageObject->getViewControl("reg_date")->showDBValue($row, "");
			$values["customer_id"] = $pageObject->getViewControl("customer_id")->showDBValue($row, "");
			$values["usaha_id"] = $pageObject->getViewControl("usaha_id")->showDBValue($row, "");
			$values["so"] = $pageObject->getViewControl("so")->showDBValue($row, "");
			$values["kecamatan_id"] = $pageObject->getViewControl("kecamatan_id")->showDBValue($row, "");
			$values["kelurahan_id"] = $pageObject->getViewControl("kelurahan_id")->showDBValue($row, "");
			$values["notes"] = $pageObject->getViewControl("notes")->showDBValue($row, "");
			$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
			$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
			$values["customer_status_id"] = $pageObject->getViewControl("customer_status_id")->showDBValue($row, "");
			$values["aktifnotes"] = $pageObject->getViewControl("aktifnotes")->showDBValue($row, "");
			$values["tmt"] = $pageObject->getViewControl("tmt")->showDBValue($row, "");
			$values["air_zona_id"] = $pageObject->getViewControl("air_zona_id")->showDBValue($row, "");
			$values["air_manfaat_id"] = $pageObject->getViewControl("air_manfaat_id")->showDBValue($row, "");
			$values["def_pajak_id"] = $pageObject->getViewControl("def_pajak_id")->showDBValue($row, "");
			$values["opnm"] = $pageObject->getViewControl("opnm")->showDBValue($row, "");
			$values["opalamat"] = $pageObject->getViewControl("opalamat")->showDBValue($row, "");
			$values["latitude"] = $row["latitude"];
			$values["longitude"] = $row["longitude"];
			$values["created"] = $pageObject->getViewControl("created")->showDBValue($row, "");
			$values["updated"] = $pageObject->getViewControl("updated")->showDBValue($row, "");
			$values["update_uid"] = $pageObject->getViewControl("update_uid")->showDBValue($row, "");
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
			$values["mall_id"] = $pageObject->getViewControl("mall_id")->showDBValue($row, "");
			$values["cash_register"] = $pageObject->getViewControl("cash_register")->showDBValue($row, "");
			$values["pelaporan"] = $pageObject->getViewControl("pelaporan")->showDBValue($row, "");
			$values["pembukuan"] = $pageObject->getViewControl("pembukuan")->showDBValue($row, "");
			$values["bandara"] = $pageObject->getViewControl("bandara")->showDBValue($row, "");
			$values["wajib_pajak"] = $pageObject->getViewControl("wajib_pajak")->showDBValue($row, "");
			$values["jumlah_karyawan"] = $pageObject->getViewControl("jumlah_karyawan")->showDBValue($row, "");
			$values["tanggal_tutup"] = $pageObject->getViewControl("tanggal_tutup")->showDBValue($row, "");
			$values["parkir_luas"] = $pageObject->getViewControl("parkir_luas")->showDBValue($row, "");
			$values["parkir_masuk"] = $pageObject->getViewControl("parkir_masuk")->showDBValue($row, "");
			$values["parkir_tarif_mobil"] = $row["parkir_tarif_mobil"];
			$values["parkir_tambahan"] = $row["parkir_tambahan"];
			$values["parkir_kapasitas_mobil"] = $pageObject->getViewControl("parkir_kapasitas_mobil")->showDBValue($row, "");
			$values["parkir_mobil_hari"] = $pageObject->getViewControl("parkir_mobil_hari")->showDBValue($row, "");
			$values["parkir_keluar"] = $pageObject->getViewControl("parkir_keluar")->showDBValue($row, "");
			$values["parkir_motor_luas"] = $pageObject->getViewControl("parkir_motor_luas")->showDBValue($row, "");
			$values["parkir_motor_masuk"] = $pageObject->getViewControl("parkir_motor_masuk")->showDBValue($row, "");
			$values["parkir_motor_keluar"] = $pageObject->getViewControl("parkir_motor_keluar")->showDBValue($row, "");
			$values["parkir_tarif_motor"] = $row["parkir_tarif_motor"];
			$values["parkir_motor_tambahan"] = $row["parkir_motor_tambahan"];
			$values["parkir_kapasitas_motor"] = $pageObject->getViewControl("parkir_kapasitas_motor")->showDBValue($row, "");
			$values["parkir_motor_hari"] = $pageObject->getViewControl("parkir_motor_hari")->showDBValue($row, "");
			$values["kelompok_usaha_id"] = $pageObject->getViewControl("kelompok_usaha_id")->showDBValue($row, "");
			$values["zona_id"] = $pageObject->getViewControl("zona_id")->showDBValue($row, "");
			$values["manfaat_id"] = $pageObject->getViewControl("manfaat_id")->showDBValue($row, "");
			$values["golongan_id"] = $pageObject->getViewControl("golongan_id")->showDBValue($row, "");
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
			$outstr.='"'.str_replace('"', '""', $values["konterid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["reg_date"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["customer_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["usaha_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["so"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kecamatan_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kelurahan_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["notes"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["enabled"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["create_uid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["customer_status_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["aktifnotes"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["tmt"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["air_zona_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["air_manfaat_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["def_pajak_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["opnm"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["opalamat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["latitude"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["longitude"]).'"';
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
			$outstr.='"'.str_replace('"', '""', $values["mall_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["cash_register"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pelaporan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["pembukuan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["bandara"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["wajib_pajak"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["jumlah_karyawan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["tanggal_tutup"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_luas"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_masuk"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_tarif_mobil"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_tambahan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_kapasitas_mobil"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_mobil_hari"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_keluar"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_motor_luas"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_motor_masuk"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_motor_keluar"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_tarif_motor"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_motor_tambahan"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_kapasitas_motor"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["parkir_motor_hari"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["kelompok_usaha_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["zona_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["manfaat_id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.str_replace('"', '""', $values["golongan_id"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Konterid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Reg Date").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Customer Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Usaha Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("So").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kecamatan Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kelurahan Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Notes").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Enabled").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Create Uid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Customer Status Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Aktifnotes").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tmt").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Air Zona Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Air Manfaat Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Def Pajak Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Opnm").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Opalamat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Latitude").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Longitude").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Created").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Updated").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Update Uid").'</td>';	
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Mall Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Cash Register").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pelaporan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pembukuan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Bandara").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Wajib Pajak").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Jumlah Karyawan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tanggal Tutup").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Luas").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Masuk").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Tarif Mobil").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Tambahan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Kapasitas Mobil").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Mobil Hari").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Keluar").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Motor Luas").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Motor Masuk").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Motor Keluar").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Tarif Motor").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Motor Tambahan").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Kapasitas Motor").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Parkir Motor Hari").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Kelompok Usaha Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Zona Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Manfaat Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Golongan Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Old").'</td>';	
	}
	else
	{
		echo "<td>"."Id"."</td>";
		echo "<td>"."Konterid"."</td>";
		echo "<td>"."Reg Date"."</td>";
		echo "<td>"."Customer Id"."</td>";
		echo "<td>"."Usaha Id"."</td>";
		echo "<td>"."So"."</td>";
		echo "<td>"."Kecamatan Id"."</td>";
		echo "<td>"."Kelurahan Id"."</td>";
		echo "<td>"."Notes"."</td>";
		echo "<td>"."Enabled"."</td>";
		echo "<td>"."Create Uid"."</td>";
		echo "<td>"."Customer Status Id"."</td>";
		echo "<td>"."Aktifnotes"."</td>";
		echo "<td>"."Tmt"."</td>";
		echo "<td>"."Air Zona Id"."</td>";
		echo "<td>"."Air Manfaat Id"."</td>";
		echo "<td>"."Def Pajak Id"."</td>";
		echo "<td>"."Opnm"."</td>";
		echo "<td>"."Opalamat"."</td>";
		echo "<td>"."Latitude"."</td>";
		echo "<td>"."Longitude"."</td>";
		echo "<td>"."Created"."</td>";
		echo "<td>"."Updated"."</td>";
		echo "<td>"."Update Uid"."</td>";
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
		echo "<td>"."Mall Id"."</td>";
		echo "<td>"."Cash Register"."</td>";
		echo "<td>"."Pelaporan"."</td>";
		echo "<td>"."Pembukuan"."</td>";
		echo "<td>"."Bandara"."</td>";
		echo "<td>"."Wajib Pajak"."</td>";
		echo "<td>"."Jumlah Karyawan"."</td>";
		echo "<td>"."Tanggal Tutup"."</td>";
		echo "<td>"."Parkir Luas"."</td>";
		echo "<td>"."Parkir Masuk"."</td>";
		echo "<td>"."Parkir Tarif Mobil"."</td>";
		echo "<td>"."Parkir Tambahan"."</td>";
		echo "<td>"."Parkir Kapasitas Mobil"."</td>";
		echo "<td>"."Parkir Mobil Hari"."</td>";
		echo "<td>"."Parkir Keluar"."</td>";
		echo "<td>"."Parkir Motor Luas"."</td>";
		echo "<td>"."Parkir Motor Masuk"."</td>";
		echo "<td>"."Parkir Motor Keluar"."</td>";
		echo "<td>"."Parkir Tarif Motor"."</td>";
		echo "<td>"."Parkir Motor Tambahan"."</td>";
		echo "<td>"."Parkir Kapasitas Motor"."</td>";
		echo "<td>"."Parkir Motor Hari"."</td>";
		echo "<td>"."Kelompok Usaha Id"."</td>";
		echo "<td>"."Zona Id"."</td>";
		echo "<td>"."Manfaat Id"."</td>";
		echo "<td>"."Golongan Id"."</td>";
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
					$values["konterid"] = $pageObject->getViewControl("konterid")->showDBValue($row, "");
					$values["reg_date"] = $pageObject->getViewControl("reg_date")->showDBValue($row, "");
					$values["customer_id"] = $pageObject->getViewControl("customer_id")->showDBValue($row, "");
					$values["usaha_id"] = $pageObject->getViewControl("usaha_id")->showDBValue($row, "");
					$values["so"] = $pageObject->getViewControl("so")->showDBValue($row, "");
					$values["kecamatan_id"] = $pageObject->getViewControl("kecamatan_id")->showDBValue($row, "");
					$values["kelurahan_id"] = $pageObject->getViewControl("kelurahan_id")->showDBValue($row, "");
					$values["notes"] = $pageObject->getViewControl("notes")->showDBValue($row, "");
					$values["enabled"] = $pageObject->getViewControl("enabled")->showDBValue($row, "");
					$values["create_uid"] = $pageObject->getViewControl("create_uid")->showDBValue($row, "");
					$values["customer_status_id"] = $pageObject->getViewControl("customer_status_id")->showDBValue($row, "");
					$values["aktifnotes"] = $pageObject->getViewControl("aktifnotes")->showDBValue($row, "");
					$values["tmt"] = $pageObject->getViewControl("tmt")->showDBValue($row, "");
					$values["air_zona_id"] = $pageObject->getViewControl("air_zona_id")->showDBValue($row, "");
					$values["air_manfaat_id"] = $pageObject->getViewControl("air_manfaat_id")->showDBValue($row, "");
					$values["def_pajak_id"] = $pageObject->getViewControl("def_pajak_id")->showDBValue($row, "");
					$values["opnm"] = $pageObject->getViewControl("opnm")->showDBValue($row, "");
					$values["opalamat"] = $pageObject->getViewControl("opalamat")->showDBValue($row, "");
					$values["latitude"] = $pageObject->getViewControl("latitude")->showDBValue($row, "");
					$values["longitude"] = $pageObject->getViewControl("longitude")->showDBValue($row, "");
					$values["created"] = $pageObject->getViewControl("created")->showDBValue($row, "");
					$values["updated"] = $pageObject->getViewControl("updated")->showDBValue($row, "");
					$values["update_uid"] = $pageObject->getViewControl("update_uid")->showDBValue($row, "");
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
					$values["mall_id"] = $pageObject->getViewControl("mall_id")->showDBValue($row, "");
					$values["cash_register"] = $pageObject->getViewControl("cash_register")->showDBValue($row, "");
					$values["pelaporan"] = $pageObject->getViewControl("pelaporan")->showDBValue($row, "");
					$values["pembukuan"] = $pageObject->getViewControl("pembukuan")->showDBValue($row, "");
					$values["bandara"] = $pageObject->getViewControl("bandara")->showDBValue($row, "");
					$values["wajib_pajak"] = $pageObject->getViewControl("wajib_pajak")->showDBValue($row, "");
					$values["jumlah_karyawan"] = $pageObject->getViewControl("jumlah_karyawan")->showDBValue($row, "");
					$values["tanggal_tutup"] = $pageObject->getViewControl("tanggal_tutup")->showDBValue($row, "");
					$values["parkir_luas"] = $pageObject->getViewControl("parkir_luas")->showDBValue($row, "");
					$values["parkir_masuk"] = $pageObject->getViewControl("parkir_masuk")->showDBValue($row, "");
					$values["parkir_tarif_mobil"] = $pageObject->getViewControl("parkir_tarif_mobil")->showDBValue($row, "");
					$values["parkir_tambahan"] = $pageObject->getViewControl("parkir_tambahan")->showDBValue($row, "");
					$values["parkir_kapasitas_mobil"] = $pageObject->getViewControl("parkir_kapasitas_mobil")->showDBValue($row, "");
					$values["parkir_mobil_hari"] = $pageObject->getViewControl("parkir_mobil_hari")->showDBValue($row, "");
					$values["parkir_keluar"] = $pageObject->getViewControl("parkir_keluar")->showDBValue($row, "");
					$values["parkir_motor_luas"] = $pageObject->getViewControl("parkir_motor_luas")->showDBValue($row, "");
					$values["parkir_motor_masuk"] = $pageObject->getViewControl("parkir_motor_masuk")->showDBValue($row, "");
					$values["parkir_motor_keluar"] = $pageObject->getViewControl("parkir_motor_keluar")->showDBValue($row, "");
					$values["parkir_tarif_motor"] = $pageObject->getViewControl("parkir_tarif_motor")->showDBValue($row, "");
					$values["parkir_motor_tambahan"] = $pageObject->getViewControl("parkir_motor_tambahan")->showDBValue($row, "");
					$values["parkir_kapasitas_motor"] = $pageObject->getViewControl("parkir_kapasitas_motor")->showDBValue($row, "");
					$values["parkir_motor_hari"] = $pageObject->getViewControl("parkir_motor_hari")->showDBValue($row, "");
					$values["kelompok_usaha_id"] = $pageObject->getViewControl("kelompok_usaha_id")->showDBValue($row, "");
					$values["zona_id"] = $pageObject->getViewControl("zona_id")->showDBValue($row, "");
					$values["manfaat_id"] = $pageObject->getViewControl("manfaat_id")->showDBValue($row, "");
					$values["golongan_id"] = $pageObject->getViewControl("golongan_id")->showDBValue($row, "");
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
			
									echo $values["konterid"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["reg_date"]);
					else
						echo $values["reg_date"];
			echo '</td>';
							echo '<td>';
			
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["customer_id"]);
				else
					echo $values["customer_id"];//echo htmlspecialchars($values["customer_id"]); commented for bug #6823
					
			echo '</td>';
							echo '<td>';
			
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["usaha_id"]);
				else
					echo $values["usaha_id"];//echo htmlspecialchars($values["usaha_id"]); commented for bug #6823
					
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["so"]);
					else
						echo $values["so"];
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
						echo PrepareForExcel($values["notes"]);
					else
						echo $values["notes"];
			echo '</td>';
							echo '<td>';
			
									echo $values["enabled"];
			echo '</td>';
							echo '<td>';
			
									echo $values["create_uid"];
			echo '</td>';
							echo '<td>';
			
									echo $values["customer_status_id"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["aktifnotes"]);
					else
						echo $values["aktifnotes"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["tmt"]);
					else
						echo $values["tmt"];
			echo '</td>';
							echo '<td>';
			
									echo $values["air_zona_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["air_manfaat_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["def_pajak_id"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["opnm"]);
					else
						echo $values["opnm"];
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["opalamat"]);
					else
						echo $values["opalamat"];
			echo '</td>';
							echo '<td>';
			
									echo $values["latitude"];
			echo '</td>';
							echo '<td>';
			
									echo $values["longitude"];
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
			
									echo $values["mall_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["cash_register"];
			echo '</td>';
							echo '<td>';
			
									echo $values["pelaporan"];
			echo '</td>';
							echo '<td>';
			
									echo $values["pembukuan"];
			echo '</td>';
							echo '<td>';
			
									echo $values["bandara"];
			echo '</td>';
							echo '<td>';
			
									echo $values["wajib_pajak"];
			echo '</td>';
							echo '<td>';
			
									echo $values["jumlah_karyawan"];
			echo '</td>';
							echo '<td>';
			
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["tanggal_tutup"]);
					else
						echo $values["tanggal_tutup"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_luas"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_masuk"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_tarif_mobil"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_tambahan"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_kapasitas_mobil"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_mobil_hari"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_keluar"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_motor_luas"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_motor_masuk"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_motor_keluar"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_tarif_motor"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_motor_tambahan"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_kapasitas_motor"];
			echo '</td>';
							echo '<td>';
			
									echo $values["parkir_motor_hari"];
			echo '</td>';
							echo '<td>';
			
									echo $values["kelompok_usaha_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["zona_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["manfaat_id"];
			echo '</td>';
							echo '<td>';
			
									echo $values["golongan_id"];
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
