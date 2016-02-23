<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

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

$layout = new TLayout("print","RoundedGreen","MobileGreen");
$layout->blocks["center"] = array();
$layout->containers["grid"] = array();

$layout->containers["grid"][] = array("name"=>"printgrid","block"=>"grid_block","substyle"=>1);


$layout->skins["grid"] = "empty";
$layout->blocks["center"][] = "grid";$layout->blocks["top"] = array();
$layout->containers["master"] = array();

$layout->containers["master"][] = array("name"=>"masterinfoprint","block"=>"mastertable_block","substyle"=>1);


$layout->skins["master"] = "empty";
$layout->blocks["top"][] = "master";
$layout->skins["pdf"] = "empty";
$layout->blocks["top"][] = "pdf";$page_layouts["pad_pad_customer_usaha_print"] = $layout;


include('include/xtempl.php');
include('classes/runnerpage.php');

$cipherer = new RunnerCipherer($strTableName);

$xt = new Xtempl();
$id = postvalue("id") != "" ? postvalue("id") : 1;
$all = postvalue("all");
$pageName = "print.php";

//array of params for classes
$params = array("id" => $id,
				"tName" => $strTableName,
				"pageType" => PAGE_PRINT);
$params["xt"] = &$xt;
			
$pageObject = new RunnerPage($params);

// add button events if exist
$pageObject->addButtonHandlers();

// Modify query: remove blob fields from fieldlist.
// Blob fields on a print page are shown using imager.php (for example).
// They don't need to be selected from DB in print.php itself.
$noBlobReplace = false;
if(!postvalue("pdf") && !$noBlobReplace)
	$gQuery->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());

//	Before Process event
if($eventObj->exists("BeforeProcessPrint"))
	$eventObj->BeforeProcessPrint($conn, $pageObject);

$strWhereClause="";
$strHavingClause="";
$strSearchCriteria="and";

$selected_recs=array();
if (@$_REQUEST["a"]!="") 
{
	$sWhere = "1=0";	
	
//	process selection
	if (@$_REQUEST["mdelete"])
	{
		foreach(@$_REQUEST["mdelete"] as $ind)
		{
			$keys=array();
			$keys["id"]=refine($_REQUEST["mdelete1"][mdeleteIndex($ind)]);
			$selected_recs[]=$keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<1)
				continue;
			$keys=array();
			$keys["id"]=urldecode($arr[0]);
			$selected_recs[]=$keys;
		}
	}

	foreach($selected_recs as $keys)
	{
		$sWhere = $sWhere . " or ";
		$sWhere.=KeyWhere($keys);
	}
	$strSQL = $gQuery->gSQLWhere($sWhere);
	$strWhereClause=$sWhere;
}
else
{
	$strWhereClause=@$_SESSION[$strTableName."_where"];
	$strHavingClause=@$_SESSION[$strTableName."_having"];
	$strSearchCriteria=@$_SESSION[$strTableName."_criteria"];
	$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
}
if(postvalue("pdf"))
	$strWhereClause = @$_SESSION[$strTableName."_pdfwhere"];

$_SESSION[$strTableName."_pdfwhere"] = $strWhereClause;


$strOrderBy = $_SESSION[$strTableName."_order"];
if(!$strOrderBy)
	$strOrderBy=$gstrOrderBy;
$strSQL.=" ".trim($strOrderBy);

$strSQLbak = $strSQL;
if($eventObj->exists("BeforeQueryPrint"))
	$eventObj->BeforeQueryPrint($strSQL,$strWhereClause,$strOrderBy, $pageObject);

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
			$masterKeysReq[]=$_SESSION[$strTableName."_masterkey".($i + 1)];
			$rowcount=$eventObj->ListGetRowCount($pageObject->searchClauseObj,$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs, $pageObject);
	}
	if($rowcount!==false)
		$numrows=$rowcount;
	else
	{
		$numrows = $gQuery->gSQLRowCount($strWhereClause, $strHavingClause, $strSearchCriteria);
	}
}

LogInfo($strSQL);

$mypage=(integer)$_SESSION[$strTableName."_pagenumber"];
if(!$mypage)
	$mypage=1;

//	page size
$PageSize=(integer)$_SESSION[$strTableName."_pagesize"];
if(!$PageSize)
	$PageSize = $pageObject->pSet->getInitialPageSize();

if($PageSize<0)
	$all = 1;	
	
$recno = 1;
$records = 0;	
$maxpages = 1;
$pageindex = 1;
$pageno=1;

// build arrays for sort (to support old code in user-defined events)
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
}

if(!$all)
{	
	if($numrows)
	{
		$maxRecords = $numrows;
		$maxpages = ceil($maxRecords/$PageSize);
					
		if($mypage > $maxpages)
			$mypage = $maxpages;
		
		if($mypage < 1) 
			$mypage = 1;
		
		$maxrecs = $PageSize;
	}
	$listarray = false;
	if($eventObj->exists("ListQuery"))
		$listarray = $eventObj->ListQuery($pageObject->searchClauseObj, $arrFieldForSort, $arrHowFieldSort, 
			$_SESSION[$strTableName."_mastertable"], $masterKeysReq, $selected_recs, $PageSize, $mypage, $pageObject);
	if($listarray!==false)
		$rs = $listarray;
	else
	{
			if($numrows)
		{
			$maxrecs=$PageSize;
			$strSQL.=" limit ".$PageSize." offset ".(($mypage-1)*$PageSize);
		}
		$rs = db_query($strSQL,$conn);
	}
	
	//	hide colunm headers if needed
	$recordsonpage = $numrows-($mypage-1)*$PageSize;
	if($recordsonpage>$PageSize)
		$recordsonpage = $PageSize;
		
	$xt->assign("page_number",true);
	$xt->assign("maxpages",$maxpages);
	$xt->assign("pageno",$mypage);
}
else
{
	$listarray = false;
	if($eventObj->exists("ListQuery"))
		$listarray=$eventObj->ListQuery($pageObject->searchClauseObj, $arrFieldForSort, $arrHowFieldSort,
			$_SESSION[$strTableName."_mastertable"], $masterKeysReq, $selected_recs, $PageSize, $mypage, $pageObject);
	if($listarray!==false)
		$rs = $listarray;
	else
		$rs = db_query($strSQL,$conn);
	$recordsonpage = $numrows;
	$maxpages = ceil($recordsonpage/30);
	$xt->assign("page_number",true);
	$xt->assign("maxpages",$maxpages);
}


$fieldsArr = array();
$arr = array();
$arr['fName'] = "id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "konterid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("konterid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "reg_date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("reg_date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "customer_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("customer_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "usaha_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("usaha_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "so";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("so");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kecamatan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kecamatan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kelurahan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kelurahan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "notes";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("notes");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "enabled";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("enabled");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "create_uid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("create_uid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "customer_status_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("customer_status_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "aktifnotes";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("aktifnotes");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tmt";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tmt");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "air_zona_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("air_zona_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "air_manfaat_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("air_manfaat_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "def_pajak_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("def_pajak_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "opnm";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("opnm");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "opalamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("opalamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "latitude";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("latitude");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "longitude";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("longitude");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "created";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("created");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "updated";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("updated");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "update_uid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("update_uid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_restojmlmeja";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_restojmlmeja");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_restojmlkursi";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_restojmlkursi");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_restojmltamu";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_restojmltamu");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_filmkursi";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_filmkursi");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_filmpertunjukan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_filmpertunjukan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_filmtarif";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_filmtarif");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_bilyarmeja";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_bilyarmeja");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_bilyartarif";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_bilyartarif");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_bilyarkegiatan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_bilyarkegiatan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_diskopengunjung";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_diskopengunjung");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_diskotarif";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_diskotarif");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "mall_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("mall_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "cash_register";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("cash_register");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pelaporan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pelaporan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pembukuan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pembukuan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bandara";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bandara");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wajib_pajak";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wajib_pajak");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jumlah_karyawan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jumlah_karyawan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tanggal_tutup";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tanggal_tutup");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_luas";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_luas");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_masuk";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_masuk");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_tarif_mobil";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_tarif_mobil");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_tambahan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_tambahan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_kapasitas_mobil";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_kapasitas_mobil");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_mobil_hari";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_mobil_hari");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_keluar";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_keluar");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_motor_luas";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_motor_luas");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_motor_masuk";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_motor_masuk");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_motor_keluar";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_motor_keluar");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_tarif_motor";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_tarif_motor");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_motor_tambahan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_motor_tambahan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_kapasitas_motor";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_kapasitas_motor");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_motor_hari";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_motor_hari");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kelompok_usaha_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kelompok_usaha_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "zona_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("zona_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "manfaat_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("manfaat_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "golongan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("golongan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "id_old";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("id_old");
$fieldsArr[] = $arr;
$pageObject->setGoogleMapsParams($fieldsArr);

$colsonpage=1;
if($colsonpage>$recordsonpage)
	$colsonpage=$recordsonpage;
if($colsonpage<1)
	$colsonpage=1;


//	fill $rowinfo array
	$pages = array();
	$rowinfo = array();
	$rowinfo["data"] = array();
	if($eventObj->exists("ListFetchArray"))
		$data = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$data = $cipherer->DecryptFetchedArray($rs);

	while($data)
	{
		if($eventObj->exists("BeforeProcessRowPrint"))
		{
			if(!$eventObj->BeforeProcessRowPrint($data, $pageObject))
			{
				if($eventObj->exists("ListFetchArray"))
					$data = $eventObj->ListFetchArray($rs, $pageObject);
				else
					$data = $cipherer->DecryptFetchedArray($rs);
				continue;
			}
		}
		break;
	}
	
	while($data && ($all || $recno<=$PageSize))
	{
		$row = array();
		$row["grid_record"] = array();
		$row["grid_record"]["data"] = array();
		for($col=1;$data && ($all || $recno<=$PageSize) && $col<=1;$col++)
		{
			$record = array();
			$recno++;
			$records++;
			$keylink="";
			$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

//	id - 
			$record["id_value"] = $pageObject->showDBValue("id", $data, $keylink);
			$record["id_class"] = $pageObject->fieldClass("id");
//	konterid - 
			$record["konterid_value"] = $pageObject->showDBValue("konterid", $data, $keylink);
			$record["konterid_class"] = $pageObject->fieldClass("konterid");
//	reg_date - Short Date
			$record["reg_date_value"] = $pageObject->showDBValue("reg_date", $data, $keylink);
			$record["reg_date_class"] = $pageObject->fieldClass("reg_date");
//	customer_id - 
			$record["customer_id_value"] = $pageObject->showDBValue("customer_id", $data, $keylink);
			$record["customer_id_class"] = $pageObject->fieldClass("customer_id");
//	usaha_id - 
			$record["usaha_id_value"] = $pageObject->showDBValue("usaha_id", $data, $keylink);
			$record["usaha_id_class"] = $pageObject->fieldClass("usaha_id");
//	so - 
			$record["so_value"] = $pageObject->showDBValue("so", $data, $keylink);
			$record["so_class"] = $pageObject->fieldClass("so");
//	kecamatan_id - 
			$record["kecamatan_id_value"] = $pageObject->showDBValue("kecamatan_id", $data, $keylink);
			$record["kecamatan_id_class"] = $pageObject->fieldClass("kecamatan_id");
//	kelurahan_id - 
			$record["kelurahan_id_value"] = $pageObject->showDBValue("kelurahan_id", $data, $keylink);
			$record["kelurahan_id_class"] = $pageObject->fieldClass("kelurahan_id");
//	notes - 
			$record["notes_value"] = $pageObject->showDBValue("notes", $data, $keylink);
			$record["notes_class"] = $pageObject->fieldClass("notes");
//	enabled - 
			$record["enabled_value"] = $pageObject->showDBValue("enabled", $data, $keylink);
			$record["enabled_class"] = $pageObject->fieldClass("enabled");
//	create_uid - 
			$record["create_uid_value"] = $pageObject->showDBValue("create_uid", $data, $keylink);
			$record["create_uid_class"] = $pageObject->fieldClass("create_uid");
//	customer_status_id - 
			$record["customer_status_id_value"] = $pageObject->showDBValue("customer_status_id", $data, $keylink);
			$record["customer_status_id_class"] = $pageObject->fieldClass("customer_status_id");
//	aktifnotes - 
			$record["aktifnotes_value"] = $pageObject->showDBValue("aktifnotes", $data, $keylink);
			$record["aktifnotes_class"] = $pageObject->fieldClass("aktifnotes");
//	tmt - Short Date
			$record["tmt_value"] = $pageObject->showDBValue("tmt", $data, $keylink);
			$record["tmt_class"] = $pageObject->fieldClass("tmt");
//	air_zona_id - 
			$record["air_zona_id_value"] = $pageObject->showDBValue("air_zona_id", $data, $keylink);
			$record["air_zona_id_class"] = $pageObject->fieldClass("air_zona_id");
//	air_manfaat_id - 
			$record["air_manfaat_id_value"] = $pageObject->showDBValue("air_manfaat_id", $data, $keylink);
			$record["air_manfaat_id_class"] = $pageObject->fieldClass("air_manfaat_id");
//	def_pajak_id - 
			$record["def_pajak_id_value"] = $pageObject->showDBValue("def_pajak_id", $data, $keylink);
			$record["def_pajak_id_class"] = $pageObject->fieldClass("def_pajak_id");
//	opnm - 
			$record["opnm_value"] = $pageObject->showDBValue("opnm", $data, $keylink);
			$record["opnm_class"] = $pageObject->fieldClass("opnm");
//	opalamat - 
			$record["opalamat_value"] = $pageObject->showDBValue("opalamat", $data, $keylink);
			$record["opalamat_class"] = $pageObject->fieldClass("opalamat");
//	latitude - Number
			$record["latitude_value"] = $pageObject->showDBValue("latitude", $data, $keylink);
			$record["latitude_class"] = $pageObject->fieldClass("latitude");
//	longitude - Number
			$record["longitude_value"] = $pageObject->showDBValue("longitude", $data, $keylink);
			$record["longitude_class"] = $pageObject->fieldClass("longitude");
//	created - Short Date
			$record["created_value"] = $pageObject->showDBValue("created", $data, $keylink);
			$record["created_class"] = $pageObject->fieldClass("created");
//	updated - Short Date
			$record["updated_value"] = $pageObject->showDBValue("updated", $data, $keylink);
			$record["updated_class"] = $pageObject->fieldClass("updated");
//	update_uid - 
			$record["update_uid_value"] = $pageObject->showDBValue("update_uid", $data, $keylink);
			$record["update_uid_class"] = $pageObject->fieldClass("update_uid");
//	kd_restojmlmeja - 
			$record["kd_restojmlmeja_value"] = $pageObject->showDBValue("kd_restojmlmeja", $data, $keylink);
			$record["kd_restojmlmeja_class"] = $pageObject->fieldClass("kd_restojmlmeja");
//	kd_restojmlkursi - 
			$record["kd_restojmlkursi_value"] = $pageObject->showDBValue("kd_restojmlkursi", $data, $keylink);
			$record["kd_restojmlkursi_class"] = $pageObject->fieldClass("kd_restojmlkursi");
//	kd_restojmltamu - 
			$record["kd_restojmltamu_value"] = $pageObject->showDBValue("kd_restojmltamu", $data, $keylink);
			$record["kd_restojmltamu_class"] = $pageObject->fieldClass("kd_restojmltamu");
//	kd_filmkursi - 
			$record["kd_filmkursi_value"] = $pageObject->showDBValue("kd_filmkursi", $data, $keylink);
			$record["kd_filmkursi_class"] = $pageObject->fieldClass("kd_filmkursi");
//	kd_filmpertunjukan - 
			$record["kd_filmpertunjukan_value"] = $pageObject->showDBValue("kd_filmpertunjukan", $data, $keylink);
			$record["kd_filmpertunjukan_class"] = $pageObject->fieldClass("kd_filmpertunjukan");
//	kd_filmtarif - Number
			$record["kd_filmtarif_value"] = $pageObject->showDBValue("kd_filmtarif", $data, $keylink);
			$record["kd_filmtarif_class"] = $pageObject->fieldClass("kd_filmtarif");
//	kd_bilyarmeja - 
			$record["kd_bilyarmeja_value"] = $pageObject->showDBValue("kd_bilyarmeja", $data, $keylink);
			$record["kd_bilyarmeja_class"] = $pageObject->fieldClass("kd_bilyarmeja");
//	kd_bilyartarif - Number
			$record["kd_bilyartarif_value"] = $pageObject->showDBValue("kd_bilyartarif", $data, $keylink);
			$record["kd_bilyartarif_class"] = $pageObject->fieldClass("kd_bilyartarif");
//	kd_bilyarkegiatan - 
			$record["kd_bilyarkegiatan_value"] = $pageObject->showDBValue("kd_bilyarkegiatan", $data, $keylink);
			$record["kd_bilyarkegiatan_class"] = $pageObject->fieldClass("kd_bilyarkegiatan");
//	kd_diskopengunjung - 
			$record["kd_diskopengunjung_value"] = $pageObject->showDBValue("kd_diskopengunjung", $data, $keylink);
			$record["kd_diskopengunjung_class"] = $pageObject->fieldClass("kd_diskopengunjung");
//	kd_diskotarif - Number
			$record["kd_diskotarif_value"] = $pageObject->showDBValue("kd_diskotarif", $data, $keylink);
			$record["kd_diskotarif_class"] = $pageObject->fieldClass("kd_diskotarif");
//	mall_id - 
			$record["mall_id_value"] = $pageObject->showDBValue("mall_id", $data, $keylink);
			$record["mall_id_class"] = $pageObject->fieldClass("mall_id");
//	cash_register - 
			$record["cash_register_value"] = $pageObject->showDBValue("cash_register", $data, $keylink);
			$record["cash_register_class"] = $pageObject->fieldClass("cash_register");
//	pelaporan - 
			$record["pelaporan_value"] = $pageObject->showDBValue("pelaporan", $data, $keylink);
			$record["pelaporan_class"] = $pageObject->fieldClass("pelaporan");
//	pembukuan - 
			$record["pembukuan_value"] = $pageObject->showDBValue("pembukuan", $data, $keylink);
			$record["pembukuan_class"] = $pageObject->fieldClass("pembukuan");
//	bandara - 
			$record["bandara_value"] = $pageObject->showDBValue("bandara", $data, $keylink);
			$record["bandara_class"] = $pageObject->fieldClass("bandara");
//	wajib_pajak - 
			$record["wajib_pajak_value"] = $pageObject->showDBValue("wajib_pajak", $data, $keylink);
			$record["wajib_pajak_class"] = $pageObject->fieldClass("wajib_pajak");
//	jumlah_karyawan - 
			$record["jumlah_karyawan_value"] = $pageObject->showDBValue("jumlah_karyawan", $data, $keylink);
			$record["jumlah_karyawan_class"] = $pageObject->fieldClass("jumlah_karyawan");
//	tanggal_tutup - Short Date
			$record["tanggal_tutup_value"] = $pageObject->showDBValue("tanggal_tutup", $data, $keylink);
			$record["tanggal_tutup_class"] = $pageObject->fieldClass("tanggal_tutup");
//	parkir_luas - 
			$record["parkir_luas_value"] = $pageObject->showDBValue("parkir_luas", $data, $keylink);
			$record["parkir_luas_class"] = $pageObject->fieldClass("parkir_luas");
//	parkir_masuk - 
			$record["parkir_masuk_value"] = $pageObject->showDBValue("parkir_masuk", $data, $keylink);
			$record["parkir_masuk_class"] = $pageObject->fieldClass("parkir_masuk");
//	parkir_tarif_mobil - Number
			$record["parkir_tarif_mobil_value"] = $pageObject->showDBValue("parkir_tarif_mobil", $data, $keylink);
			$record["parkir_tarif_mobil_class"] = $pageObject->fieldClass("parkir_tarif_mobil");
//	parkir_tambahan - Number
			$record["parkir_tambahan_value"] = $pageObject->showDBValue("parkir_tambahan", $data, $keylink);
			$record["parkir_tambahan_class"] = $pageObject->fieldClass("parkir_tambahan");
//	parkir_kapasitas_mobil - 
			$record["parkir_kapasitas_mobil_value"] = $pageObject->showDBValue("parkir_kapasitas_mobil", $data, $keylink);
			$record["parkir_kapasitas_mobil_class"] = $pageObject->fieldClass("parkir_kapasitas_mobil");
//	parkir_mobil_hari - 
			$record["parkir_mobil_hari_value"] = $pageObject->showDBValue("parkir_mobil_hari", $data, $keylink);
			$record["parkir_mobil_hari_class"] = $pageObject->fieldClass("parkir_mobil_hari");
//	parkir_keluar - 
			$record["parkir_keluar_value"] = $pageObject->showDBValue("parkir_keluar", $data, $keylink);
			$record["parkir_keluar_class"] = $pageObject->fieldClass("parkir_keluar");
//	parkir_motor_luas - 
			$record["parkir_motor_luas_value"] = $pageObject->showDBValue("parkir_motor_luas", $data, $keylink);
			$record["parkir_motor_luas_class"] = $pageObject->fieldClass("parkir_motor_luas");
//	parkir_motor_masuk - 
			$record["parkir_motor_masuk_value"] = $pageObject->showDBValue("parkir_motor_masuk", $data, $keylink);
			$record["parkir_motor_masuk_class"] = $pageObject->fieldClass("parkir_motor_masuk");
//	parkir_motor_keluar - 
			$record["parkir_motor_keluar_value"] = $pageObject->showDBValue("parkir_motor_keluar", $data, $keylink);
			$record["parkir_motor_keluar_class"] = $pageObject->fieldClass("parkir_motor_keluar");
//	parkir_tarif_motor - Number
			$record["parkir_tarif_motor_value"] = $pageObject->showDBValue("parkir_tarif_motor", $data, $keylink);
			$record["parkir_tarif_motor_class"] = $pageObject->fieldClass("parkir_tarif_motor");
//	parkir_motor_tambahan - Number
			$record["parkir_motor_tambahan_value"] = $pageObject->showDBValue("parkir_motor_tambahan", $data, $keylink);
			$record["parkir_motor_tambahan_class"] = $pageObject->fieldClass("parkir_motor_tambahan");
//	parkir_kapasitas_motor - 
			$record["parkir_kapasitas_motor_value"] = $pageObject->showDBValue("parkir_kapasitas_motor", $data, $keylink);
			$record["parkir_kapasitas_motor_class"] = $pageObject->fieldClass("parkir_kapasitas_motor");
//	parkir_motor_hari - 
			$record["parkir_motor_hari_value"] = $pageObject->showDBValue("parkir_motor_hari", $data, $keylink);
			$record["parkir_motor_hari_class"] = $pageObject->fieldClass("parkir_motor_hari");
//	kelompok_usaha_id - 
			$record["kelompok_usaha_id_value"] = $pageObject->showDBValue("kelompok_usaha_id", $data, $keylink);
			$record["kelompok_usaha_id_class"] = $pageObject->fieldClass("kelompok_usaha_id");
//	zona_id - 
			$record["zona_id_value"] = $pageObject->showDBValue("zona_id", $data, $keylink);
			$record["zona_id_class"] = $pageObject->fieldClass("zona_id");
//	manfaat_id - 
			$record["manfaat_id_value"] = $pageObject->showDBValue("manfaat_id", $data, $keylink);
			$record["manfaat_id_class"] = $pageObject->fieldClass("manfaat_id");
//	golongan_id - 
			$record["golongan_id_value"] = $pageObject->showDBValue("golongan_id", $data, $keylink);
			$record["golongan_id_class"] = $pageObject->fieldClass("golongan_id");
//	id_old - 
			$record["id_old_value"] = $pageObject->showDBValue("id_old", $data, $keylink);
			$record["id_old_class"] = $pageObject->fieldClass("id_old");
			if($col<$colsonpage)
				$record["endrecord_block"] = true;
			$record["grid_recordheader"] = true;
			$record["grid_vrecord"] = true;
			
			if($eventObj->exists("BeforeMoveNextPrint"))
				$eventObj->BeforeMoveNextPrint($data,$row,$record, $pageObject);
				
			$row["grid_record"]["data"][] = $record;
			
			if($eventObj->exists("ListFetchArray"))
				$data = $eventObj->ListFetchArray($rs, $pageObject);
			else
				$data = $cipherer->DecryptFetchedArray($rs);
				
			while($data)
			{
				if($eventObj->exists("BeforeProcessRowPrint"))
				{
					if(!$eventObj->BeforeProcessRowPrint($data, $pageObject))
					{
						if($eventObj->exists("ListFetchArray"))
							$data = $eventObj->ListFetchArray($rs, $pageObject);
						else
							$data = $cipherer->DecryptFetchedArray($rs);
						continue;
					}
				}
				break;
			}
		}
		if($col <= $colsonpage)
		{
			$row["grid_record"]["data"][count($row["grid_record"]["data"])-1]["endrecord_block"] = false;
		}
		$row["grid_rowspace"]=true;
		$row["grid_recordspace"] = array("data"=>array());
		for($i=0;$i<$colsonpage*2-1;$i++)
			$row["grid_recordspace"]["data"][]=true;
		
		$rowinfo["data"][]=$row;
		
		if($all && $records>=30)
		{
			$page=array("grid_row" =>$rowinfo);
			$page["pageno"]=$pageindex;
			$pageindex++;
			$pages[] = $page;
			$records=0;
			$rowinfo=array();
		}
		
	}
	if(count($rowinfo))
	{
		$page=array("grid_row" =>$rowinfo);
		if($all)
			$page["pageno"]=$pageindex;
		$pages[] = $page;
	}
	
	for($i=0;$i<count($pages);$i++)
	{
	 	if($i<count($pages)-1)
			$pages[$i]["begin"]="<div name=page class=printpage>";
		else
		    $pages[$i]["begin"]="<div name=page>";
			
		$pages[$i]["end"]="</div>";
	}

	$page = array();
	$page["data"] = &$pages;
	$xt->assignbyref("page",$page);

	
//	display master table info
$mastertable = $_SESSION[$strTableName."_mastertable"];
$masterkeys = array();

if($mastertable == "pad.pad_customer")
{
//	include proper masterprint.php code
	include("include/pad_pad_customer_masterprint.php");
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey1"];
	$params = array("detailtable"=>"pad.pad_customer_usaha","keys"=>$masterkeys);
	$master = array();
	$master["func"] = "DisplayMasterTableInfo_pad_pad_customer";
	$master["params"] = $params;
	$xt->assignbyref("showmasterfile",$master);
	$xt->assign("mastertable_block",true);
	$layout = new TLayout("masterprint","RoundedGreen","MobileGreen");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterprintheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterprintfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_customer_masterprint"] = $layout;

	$layout = GetPageLayout("pad_pad_customer", 'masterprint');
	if($layout)
	{
		$rtl = $pageObject->xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl.".css"
			, "pagestylepath" => "pagestyles/".$layout->name.$rtl.".css");
		$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE'.".css");
	}	
}

if($mastertable == "pad.pad_kecamatan")
{
//	include proper masterprint.php code
	include("include/pad_pad_kecamatan_masterprint.php");
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey1"];
	$params = array("detailtable"=>"pad.pad_customer_usaha","keys"=>$masterkeys);
	$master = array();
	$master["func"] = "DisplayMasterTableInfo_pad_pad_kecamatan";
	$master["params"] = $params;
	$xt->assignbyref("showmasterfile",$master);
	$xt->assign("mastertable_block",true);
	$layout = new TLayout("masterprint","RoundedGreen","MobileGreen");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterprintheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterprintfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_kecamatan_masterprint"] = $layout;

	$layout = GetPageLayout("pad_pad_kecamatan", 'masterprint');
	if($layout)
	{
		$rtl = $pageObject->xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl.".css"
			, "pagestylepath" => "pagestyles/".$layout->name.$rtl.".css");
		$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE'.".css");
	}	
}

if($mastertable == "pad.pad_kelurahan")
{
//	include proper masterprint.php code
	include("include/pad_pad_kelurahan_masterprint.php");
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey1"];
	$params = array("detailtable"=>"pad.pad_customer_usaha","keys"=>$masterkeys);
	$master = array();
	$master["func"] = "DisplayMasterTableInfo_pad_pad_kelurahan";
	$master["params"] = $params;
	$xt->assignbyref("showmasterfile",$master);
	$xt->assign("mastertable_block",true);
	$layout = new TLayout("masterprint","RoundedGreen","MobileGreen");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterprintheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterprintfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_kelurahan_masterprint"] = $layout;

	$layout = GetPageLayout("pad_pad_kelurahan", 'masterprint');
	if($layout)
	{
		$rtl = $pageObject->xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl.".css"
			, "pagestylepath" => "pagestyles/".$layout->name.$rtl.".css");
		$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE'.".css");
	}	
}

if($mastertable == "pad.pad_usaha")
{
//	include proper masterprint.php code
	include("include/pad_pad_usaha_masterprint.php");
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey1"];
	$params = array("detailtable"=>"pad.pad_customer_usaha","keys"=>$masterkeys);
	$master = array();
	$master["func"] = "DisplayMasterTableInfo_pad_pad_usaha";
	$master["params"] = $params;
	$xt->assignbyref("showmasterfile",$master);
	$xt->assign("mastertable_block",true);
	$layout = new TLayout("masterprint","RoundedGreen","MobileGreen");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterprintheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterprintfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_usaha_masterprint"] = $layout;

	$layout = GetPageLayout("pad_pad_usaha", 'masterprint');
	if($layout)
	{
		$rtl = $pageObject->xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl.".css"
			, "pagestylepath" => "pagestyles/".$layout->name.$rtl.".css");
		$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE'.".css");
	}	
}

$strSQL = $_SESSION[$strTableName."_sql"];

$isPdfView = false;
$hasEvents = false;
if ($pageObject->pSet->isUsebuttonHandlers() || $isPdfView || $hasEvents)
{
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
}


if ($pageObject->pSet->isUsebuttonHandlers() || $isPdfView || $hasEvents)
	$pageObject->body["end"] .= "<script>".$pageObject->PrepareJS()."</script>";

$xt->assignbyref("body",$pageObject->body);
$xt->assign("grid_block",true);

$xt->assign("id_fieldheadercolumn",true);
$xt->assign("id_fieldheader",true);
$xt->assign("id_fieldcolumn",true);
$xt->assign("id_fieldfootercolumn",true);
$xt->assign("konterid_fieldheadercolumn",true);
$xt->assign("konterid_fieldheader",true);
$xt->assign("konterid_fieldcolumn",true);
$xt->assign("konterid_fieldfootercolumn",true);
$xt->assign("reg_date_fieldheadercolumn",true);
$xt->assign("reg_date_fieldheader",true);
$xt->assign("reg_date_fieldcolumn",true);
$xt->assign("reg_date_fieldfootercolumn",true);
$xt->assign("customer_id_fieldheadercolumn",true);
$xt->assign("customer_id_fieldheader",true);
$xt->assign("customer_id_fieldcolumn",true);
$xt->assign("customer_id_fieldfootercolumn",true);
$xt->assign("usaha_id_fieldheadercolumn",true);
$xt->assign("usaha_id_fieldheader",true);
$xt->assign("usaha_id_fieldcolumn",true);
$xt->assign("usaha_id_fieldfootercolumn",true);
$xt->assign("so_fieldheadercolumn",true);
$xt->assign("so_fieldheader",true);
$xt->assign("so_fieldcolumn",true);
$xt->assign("so_fieldfootercolumn",true);
$xt->assign("kecamatan_id_fieldheadercolumn",true);
$xt->assign("kecamatan_id_fieldheader",true);
$xt->assign("kecamatan_id_fieldcolumn",true);
$xt->assign("kecamatan_id_fieldfootercolumn",true);
$xt->assign("kelurahan_id_fieldheadercolumn",true);
$xt->assign("kelurahan_id_fieldheader",true);
$xt->assign("kelurahan_id_fieldcolumn",true);
$xt->assign("kelurahan_id_fieldfootercolumn",true);
$xt->assign("notes_fieldheadercolumn",true);
$xt->assign("notes_fieldheader",true);
$xt->assign("notes_fieldcolumn",true);
$xt->assign("notes_fieldfootercolumn",true);
$xt->assign("enabled_fieldheadercolumn",true);
$xt->assign("enabled_fieldheader",true);
$xt->assign("enabled_fieldcolumn",true);
$xt->assign("enabled_fieldfootercolumn",true);
$xt->assign("create_uid_fieldheadercolumn",true);
$xt->assign("create_uid_fieldheader",true);
$xt->assign("create_uid_fieldcolumn",true);
$xt->assign("create_uid_fieldfootercolumn",true);
$xt->assign("customer_status_id_fieldheadercolumn",true);
$xt->assign("customer_status_id_fieldheader",true);
$xt->assign("customer_status_id_fieldcolumn",true);
$xt->assign("customer_status_id_fieldfootercolumn",true);
$xt->assign("aktifnotes_fieldheadercolumn",true);
$xt->assign("aktifnotes_fieldheader",true);
$xt->assign("aktifnotes_fieldcolumn",true);
$xt->assign("aktifnotes_fieldfootercolumn",true);
$xt->assign("tmt_fieldheadercolumn",true);
$xt->assign("tmt_fieldheader",true);
$xt->assign("tmt_fieldcolumn",true);
$xt->assign("tmt_fieldfootercolumn",true);
$xt->assign("air_zona_id_fieldheadercolumn",true);
$xt->assign("air_zona_id_fieldheader",true);
$xt->assign("air_zona_id_fieldcolumn",true);
$xt->assign("air_zona_id_fieldfootercolumn",true);
$xt->assign("air_manfaat_id_fieldheadercolumn",true);
$xt->assign("air_manfaat_id_fieldheader",true);
$xt->assign("air_manfaat_id_fieldcolumn",true);
$xt->assign("air_manfaat_id_fieldfootercolumn",true);
$xt->assign("def_pajak_id_fieldheadercolumn",true);
$xt->assign("def_pajak_id_fieldheader",true);
$xt->assign("def_pajak_id_fieldcolumn",true);
$xt->assign("def_pajak_id_fieldfootercolumn",true);
$xt->assign("opnm_fieldheadercolumn",true);
$xt->assign("opnm_fieldheader",true);
$xt->assign("opnm_fieldcolumn",true);
$xt->assign("opnm_fieldfootercolumn",true);
$xt->assign("opalamat_fieldheadercolumn",true);
$xt->assign("opalamat_fieldheader",true);
$xt->assign("opalamat_fieldcolumn",true);
$xt->assign("opalamat_fieldfootercolumn",true);
$xt->assign("latitude_fieldheadercolumn",true);
$xt->assign("latitude_fieldheader",true);
$xt->assign("latitude_fieldcolumn",true);
$xt->assign("latitude_fieldfootercolumn",true);
$xt->assign("longitude_fieldheadercolumn",true);
$xt->assign("longitude_fieldheader",true);
$xt->assign("longitude_fieldcolumn",true);
$xt->assign("longitude_fieldfootercolumn",true);
$xt->assign("created_fieldheadercolumn",true);
$xt->assign("created_fieldheader",true);
$xt->assign("created_fieldcolumn",true);
$xt->assign("created_fieldfootercolumn",true);
$xt->assign("updated_fieldheadercolumn",true);
$xt->assign("updated_fieldheader",true);
$xt->assign("updated_fieldcolumn",true);
$xt->assign("updated_fieldfootercolumn",true);
$xt->assign("update_uid_fieldheadercolumn",true);
$xt->assign("update_uid_fieldheader",true);
$xt->assign("update_uid_fieldcolumn",true);
$xt->assign("update_uid_fieldfootercolumn",true);
$xt->assign("kd_restojmlmeja_fieldheadercolumn",true);
$xt->assign("kd_restojmlmeja_fieldheader",true);
$xt->assign("kd_restojmlmeja_fieldcolumn",true);
$xt->assign("kd_restojmlmeja_fieldfootercolumn",true);
$xt->assign("kd_restojmlkursi_fieldheadercolumn",true);
$xt->assign("kd_restojmlkursi_fieldheader",true);
$xt->assign("kd_restojmlkursi_fieldcolumn",true);
$xt->assign("kd_restojmlkursi_fieldfootercolumn",true);
$xt->assign("kd_restojmltamu_fieldheadercolumn",true);
$xt->assign("kd_restojmltamu_fieldheader",true);
$xt->assign("kd_restojmltamu_fieldcolumn",true);
$xt->assign("kd_restojmltamu_fieldfootercolumn",true);
$xt->assign("kd_filmkursi_fieldheadercolumn",true);
$xt->assign("kd_filmkursi_fieldheader",true);
$xt->assign("kd_filmkursi_fieldcolumn",true);
$xt->assign("kd_filmkursi_fieldfootercolumn",true);
$xt->assign("kd_filmpertunjukan_fieldheadercolumn",true);
$xt->assign("kd_filmpertunjukan_fieldheader",true);
$xt->assign("kd_filmpertunjukan_fieldcolumn",true);
$xt->assign("kd_filmpertunjukan_fieldfootercolumn",true);
$xt->assign("kd_filmtarif_fieldheadercolumn",true);
$xt->assign("kd_filmtarif_fieldheader",true);
$xt->assign("kd_filmtarif_fieldcolumn",true);
$xt->assign("kd_filmtarif_fieldfootercolumn",true);
$xt->assign("kd_bilyarmeja_fieldheadercolumn",true);
$xt->assign("kd_bilyarmeja_fieldheader",true);
$xt->assign("kd_bilyarmeja_fieldcolumn",true);
$xt->assign("kd_bilyarmeja_fieldfootercolumn",true);
$xt->assign("kd_bilyartarif_fieldheadercolumn",true);
$xt->assign("kd_bilyartarif_fieldheader",true);
$xt->assign("kd_bilyartarif_fieldcolumn",true);
$xt->assign("kd_bilyartarif_fieldfootercolumn",true);
$xt->assign("kd_bilyarkegiatan_fieldheadercolumn",true);
$xt->assign("kd_bilyarkegiatan_fieldheader",true);
$xt->assign("kd_bilyarkegiatan_fieldcolumn",true);
$xt->assign("kd_bilyarkegiatan_fieldfootercolumn",true);
$xt->assign("kd_diskopengunjung_fieldheadercolumn",true);
$xt->assign("kd_diskopengunjung_fieldheader",true);
$xt->assign("kd_diskopengunjung_fieldcolumn",true);
$xt->assign("kd_diskopengunjung_fieldfootercolumn",true);
$xt->assign("kd_diskotarif_fieldheadercolumn",true);
$xt->assign("kd_diskotarif_fieldheader",true);
$xt->assign("kd_diskotarif_fieldcolumn",true);
$xt->assign("kd_diskotarif_fieldfootercolumn",true);
$xt->assign("mall_id_fieldheadercolumn",true);
$xt->assign("mall_id_fieldheader",true);
$xt->assign("mall_id_fieldcolumn",true);
$xt->assign("mall_id_fieldfootercolumn",true);
$xt->assign("cash_register_fieldheadercolumn",true);
$xt->assign("cash_register_fieldheader",true);
$xt->assign("cash_register_fieldcolumn",true);
$xt->assign("cash_register_fieldfootercolumn",true);
$xt->assign("pelaporan_fieldheadercolumn",true);
$xt->assign("pelaporan_fieldheader",true);
$xt->assign("pelaporan_fieldcolumn",true);
$xt->assign("pelaporan_fieldfootercolumn",true);
$xt->assign("pembukuan_fieldheadercolumn",true);
$xt->assign("pembukuan_fieldheader",true);
$xt->assign("pembukuan_fieldcolumn",true);
$xt->assign("pembukuan_fieldfootercolumn",true);
$xt->assign("bandara_fieldheadercolumn",true);
$xt->assign("bandara_fieldheader",true);
$xt->assign("bandara_fieldcolumn",true);
$xt->assign("bandara_fieldfootercolumn",true);
$xt->assign("wajib_pajak_fieldheadercolumn",true);
$xt->assign("wajib_pajak_fieldheader",true);
$xt->assign("wajib_pajak_fieldcolumn",true);
$xt->assign("wajib_pajak_fieldfootercolumn",true);
$xt->assign("jumlah_karyawan_fieldheadercolumn",true);
$xt->assign("jumlah_karyawan_fieldheader",true);
$xt->assign("jumlah_karyawan_fieldcolumn",true);
$xt->assign("jumlah_karyawan_fieldfootercolumn",true);
$xt->assign("tanggal_tutup_fieldheadercolumn",true);
$xt->assign("tanggal_tutup_fieldheader",true);
$xt->assign("tanggal_tutup_fieldcolumn",true);
$xt->assign("tanggal_tutup_fieldfootercolumn",true);
$xt->assign("parkir_luas_fieldheadercolumn",true);
$xt->assign("parkir_luas_fieldheader",true);
$xt->assign("parkir_luas_fieldcolumn",true);
$xt->assign("parkir_luas_fieldfootercolumn",true);
$xt->assign("parkir_masuk_fieldheadercolumn",true);
$xt->assign("parkir_masuk_fieldheader",true);
$xt->assign("parkir_masuk_fieldcolumn",true);
$xt->assign("parkir_masuk_fieldfootercolumn",true);
$xt->assign("parkir_tarif_mobil_fieldheadercolumn",true);
$xt->assign("parkir_tarif_mobil_fieldheader",true);
$xt->assign("parkir_tarif_mobil_fieldcolumn",true);
$xt->assign("parkir_tarif_mobil_fieldfootercolumn",true);
$xt->assign("parkir_tambahan_fieldheadercolumn",true);
$xt->assign("parkir_tambahan_fieldheader",true);
$xt->assign("parkir_tambahan_fieldcolumn",true);
$xt->assign("parkir_tambahan_fieldfootercolumn",true);
$xt->assign("parkir_kapasitas_mobil_fieldheadercolumn",true);
$xt->assign("parkir_kapasitas_mobil_fieldheader",true);
$xt->assign("parkir_kapasitas_mobil_fieldcolumn",true);
$xt->assign("parkir_kapasitas_mobil_fieldfootercolumn",true);
$xt->assign("parkir_mobil_hari_fieldheadercolumn",true);
$xt->assign("parkir_mobil_hari_fieldheader",true);
$xt->assign("parkir_mobil_hari_fieldcolumn",true);
$xt->assign("parkir_mobil_hari_fieldfootercolumn",true);
$xt->assign("parkir_keluar_fieldheadercolumn",true);
$xt->assign("parkir_keluar_fieldheader",true);
$xt->assign("parkir_keluar_fieldcolumn",true);
$xt->assign("parkir_keluar_fieldfootercolumn",true);
$xt->assign("parkir_motor_luas_fieldheadercolumn",true);
$xt->assign("parkir_motor_luas_fieldheader",true);
$xt->assign("parkir_motor_luas_fieldcolumn",true);
$xt->assign("parkir_motor_luas_fieldfootercolumn",true);
$xt->assign("parkir_motor_masuk_fieldheadercolumn",true);
$xt->assign("parkir_motor_masuk_fieldheader",true);
$xt->assign("parkir_motor_masuk_fieldcolumn",true);
$xt->assign("parkir_motor_masuk_fieldfootercolumn",true);
$xt->assign("parkir_motor_keluar_fieldheadercolumn",true);
$xt->assign("parkir_motor_keluar_fieldheader",true);
$xt->assign("parkir_motor_keluar_fieldcolumn",true);
$xt->assign("parkir_motor_keluar_fieldfootercolumn",true);
$xt->assign("parkir_tarif_motor_fieldheadercolumn",true);
$xt->assign("parkir_tarif_motor_fieldheader",true);
$xt->assign("parkir_tarif_motor_fieldcolumn",true);
$xt->assign("parkir_tarif_motor_fieldfootercolumn",true);
$xt->assign("parkir_motor_tambahan_fieldheadercolumn",true);
$xt->assign("parkir_motor_tambahan_fieldheader",true);
$xt->assign("parkir_motor_tambahan_fieldcolumn",true);
$xt->assign("parkir_motor_tambahan_fieldfootercolumn",true);
$xt->assign("parkir_kapasitas_motor_fieldheadercolumn",true);
$xt->assign("parkir_kapasitas_motor_fieldheader",true);
$xt->assign("parkir_kapasitas_motor_fieldcolumn",true);
$xt->assign("parkir_kapasitas_motor_fieldfootercolumn",true);
$xt->assign("parkir_motor_hari_fieldheadercolumn",true);
$xt->assign("parkir_motor_hari_fieldheader",true);
$xt->assign("parkir_motor_hari_fieldcolumn",true);
$xt->assign("parkir_motor_hari_fieldfootercolumn",true);
$xt->assign("kelompok_usaha_id_fieldheadercolumn",true);
$xt->assign("kelompok_usaha_id_fieldheader",true);
$xt->assign("kelompok_usaha_id_fieldcolumn",true);
$xt->assign("kelompok_usaha_id_fieldfootercolumn",true);
$xt->assign("zona_id_fieldheadercolumn",true);
$xt->assign("zona_id_fieldheader",true);
$xt->assign("zona_id_fieldcolumn",true);
$xt->assign("zona_id_fieldfootercolumn",true);
$xt->assign("manfaat_id_fieldheadercolumn",true);
$xt->assign("manfaat_id_fieldheader",true);
$xt->assign("manfaat_id_fieldcolumn",true);
$xt->assign("manfaat_id_fieldfootercolumn",true);
$xt->assign("golongan_id_fieldheadercolumn",true);
$xt->assign("golongan_id_fieldheader",true);
$xt->assign("golongan_id_fieldcolumn",true);
$xt->assign("golongan_id_fieldfootercolumn",true);
$xt->assign("id_old_fieldheadercolumn",true);
$xt->assign("id_old_fieldheader",true);
$xt->assign("id_old_fieldcolumn",true);
$xt->assign("id_old_fieldfootercolumn",true);

	$record_header=array("data"=>array());
	$record_footer=array("data"=>array());
	for($i=0;$i<$colsonpage;$i++)
	{
		$rheader=array();
		$rfooter=array();
		if($i<$colsonpage-1)
		{
			$rheader["endrecordheader_block"]=true;
			$rfooter["endrecordheader_block"]=true;
		}
		$record_header["data"][]=$rheader;
		$record_footer["data"][]=$rfooter;
	}
	$xt->assignbyref("record_header",$record_header);
	$xt->assignbyref("record_footer",$record_footer);
	$xt->assign("grid_header",true);
	$xt->assign("grid_footer",true);

if($eventObj->exists("BeforeShowPrint"))
	$eventObj->BeforeShowPrint($xt,$pageObject->templatefile, $pageObject);

if(!postvalue("pdf"))
	$xt->display($pageObject->templatefile);
else
{
	$xt->load_template($pageObject->templatefile);
	$page = $xt->fetch_loaded();
	$pagewidth=postvalue("width")*1.05;
	$pageheight=postvalue("height")*1.05;
	$landscape=false;
		if($pagewidth>$pageheight)
		{
			$landscape=true;
			if($pagewidth/$pageheight<297/210)
				$pagewidth = 297/210*$pageheight;
		}
		else
		{
			if($pagewidth/$pageheight<210/297)
				$pagewidth = 210/297*$pageheight;
		}
}
?>
