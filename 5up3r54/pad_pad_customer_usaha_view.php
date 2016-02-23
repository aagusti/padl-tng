<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_customer_usaha_variables.php");
include('include/xtempl.php');
include('classes/viewpage.php');
include("classes/searchclause.php");

add_nocache_headers();

//	check if logged in
if(!isLogged() || CheckPermissionsEvent($strTableName, 'S') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

$layout = new TLayout("view2","RoundedGreen","MobileGreen");
$layout->blocks["top"] = array();
$layout->skins["pdf"] = "empty";
$layout->blocks["top"][] = "pdf";
$layout->containers["view"] = array();

$layout->containers["view"][] = array("name"=>"viewheader","block"=>"","substyle"=>2);


$layout->containers["view"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"viewfields","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"viewbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";

$layout->skins["view"] = "1";
$layout->blocks["top"][] = "view";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_customer_usaha_view"] = $layout;




//$cipherer = new RunnerCipherer($strTableName);
	
$xt = new Xtempl();

$query = $gQuery->Copy();

$filename = "";	
$message = "";
$key = array();
$next = array();
$prev = array();
$all = postvalue("all");
$pdf = postvalue("pdf");
$mypage = 1;

//Show view page as popUp or not
$inlineview = (postvalue("onFly") ? true : false);

//If show view as popUp, get parent Id
if($inlineview)
	$parId = postvalue("parId");
else
	$parId = 0;

//Set page id	
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;

//$isNeedSettings = true;//($inlineview && postvalue("isNeedSettings") == 'true') || (!$inlineview);	
	
// assign an id
$xt->assign("id",$id);

//array of params for classes
$params = array("pageType" => PAGE_VIEW, "id" => $id, "tName" => $strTableName);
$params["xt"] = &$xt;
$params["all"] = $all;

//Get array of tabs for edit page
$params['useTabsOnView'] = $gSettings->useTabsOnView();
if($params['useTabsOnView'])
	$params['arrViewTabs'] = $gSettings->getViewTabs();
$pageObject = new ViewPage($params);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($pageObject->searchClauseObj);

// proccess big google maps

// add button events if exist
$pageObject->addButtonHandlers();

//For show detail tables on master page view
$dpParams = array();
if($pageObject->isShowDetailTables && !isMobile())
{
	$ids = $id;
	$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array();
}

//	Before Process event
if($eventObj->exists("BeforeProcessView"))
	$eventObj->BeforeProcessView($conn, $pageObject);
	
//	read current values from the database
$data = $pageObject->getCurrentRecordInternal();

if (!sizeof($data)) {
	header("Location: pad_pad_customer_usaha_list.php?a=return");
	exit();
}

$out = "";
$first = true;
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

$mainTableOwnerID = $pageObject->pSet->getTableOwnerIdField();
$ownerIdValue="";

$pageObject->setGoogleMapsParams($fieldsArr);

while($data)
{
	$xt->assign("show_key1", htmlspecialchars($pageObject->showDBValue("id", $data)));

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

////////////////////////////////////////////
//id - 
	
	$value = $pageObject->showDBValue("id", $data, $keylink);
	if($mainTableOwnerID=="id")
		$ownerIdValue=$value;
	$xt->assign("id_value",$value);
	if(!$pageObject->isAppearOnTabs("id"))
		$xt->assign("id_fieldblock",true);
	else
		$xt->assign("id_tabfieldblock",true);
////////////////////////////////////////////
//konterid - 
	
	$value = $pageObject->showDBValue("konterid", $data, $keylink);
	if($mainTableOwnerID=="konterid")
		$ownerIdValue=$value;
	$xt->assign("konterid_value",$value);
	if(!$pageObject->isAppearOnTabs("konterid"))
		$xt->assign("konterid_fieldblock",true);
	else
		$xt->assign("konterid_tabfieldblock",true);
////////////////////////////////////////////
//reg_date - Short Date
	
	$value = $pageObject->showDBValue("reg_date", $data, $keylink);
	if($mainTableOwnerID=="reg_date")
		$ownerIdValue=$value;
	$xt->assign("reg_date_value",$value);
	if(!$pageObject->isAppearOnTabs("reg_date"))
		$xt->assign("reg_date_fieldblock",true);
	else
		$xt->assign("reg_date_tabfieldblock",true);
////////////////////////////////////////////
//customer_id - 
	
	$value = $pageObject->showDBValue("customer_id", $data, $keylink);
	if($mainTableOwnerID=="customer_id")
		$ownerIdValue=$value;
	$xt->assign("customer_id_value",$value);
	if(!$pageObject->isAppearOnTabs("customer_id"))
		$xt->assign("customer_id_fieldblock",true);
	else
		$xt->assign("customer_id_tabfieldblock",true);
////////////////////////////////////////////
//usaha_id - 
	
	$value = $pageObject->showDBValue("usaha_id", $data, $keylink);
	if($mainTableOwnerID=="usaha_id")
		$ownerIdValue=$value;
	$xt->assign("usaha_id_value",$value);
	if(!$pageObject->isAppearOnTabs("usaha_id"))
		$xt->assign("usaha_id_fieldblock",true);
	else
		$xt->assign("usaha_id_tabfieldblock",true);
////////////////////////////////////////////
//so - 
	
	$value = $pageObject->showDBValue("so", $data, $keylink);
	if($mainTableOwnerID=="so")
		$ownerIdValue=$value;
	$xt->assign("so_value",$value);
	if(!$pageObject->isAppearOnTabs("so"))
		$xt->assign("so_fieldblock",true);
	else
		$xt->assign("so_tabfieldblock",true);
////////////////////////////////////////////
//kecamatan_id - 
	
	$value = $pageObject->showDBValue("kecamatan_id", $data, $keylink);
	if($mainTableOwnerID=="kecamatan_id")
		$ownerIdValue=$value;
	$xt->assign("kecamatan_id_value",$value);
	if(!$pageObject->isAppearOnTabs("kecamatan_id"))
		$xt->assign("kecamatan_id_fieldblock",true);
	else
		$xt->assign("kecamatan_id_tabfieldblock",true);
////////////////////////////////////////////
//kelurahan_id - 
	
	$value = $pageObject->showDBValue("kelurahan_id", $data, $keylink);
	if($mainTableOwnerID=="kelurahan_id")
		$ownerIdValue=$value;
	$xt->assign("kelurahan_id_value",$value);
	if(!$pageObject->isAppearOnTabs("kelurahan_id"))
		$xt->assign("kelurahan_id_fieldblock",true);
	else
		$xt->assign("kelurahan_id_tabfieldblock",true);
////////////////////////////////////////////
//notes - 
	
	$value = $pageObject->showDBValue("notes", $data, $keylink);
	if($mainTableOwnerID=="notes")
		$ownerIdValue=$value;
	$xt->assign("notes_value",$value);
	if(!$pageObject->isAppearOnTabs("notes"))
		$xt->assign("notes_fieldblock",true);
	else
		$xt->assign("notes_tabfieldblock",true);
////////////////////////////////////////////
//enabled - 
	
	$value = $pageObject->showDBValue("enabled", $data, $keylink);
	if($mainTableOwnerID=="enabled")
		$ownerIdValue=$value;
	$xt->assign("enabled_value",$value);
	if(!$pageObject->isAppearOnTabs("enabled"))
		$xt->assign("enabled_fieldblock",true);
	else
		$xt->assign("enabled_tabfieldblock",true);
////////////////////////////////////////////
//create_uid - 
	
	$value = $pageObject->showDBValue("create_uid", $data, $keylink);
	if($mainTableOwnerID=="create_uid")
		$ownerIdValue=$value;
	$xt->assign("create_uid_value",$value);
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
////////////////////////////////////////////
//customer_status_id - 
	
	$value = $pageObject->showDBValue("customer_status_id", $data, $keylink);
	if($mainTableOwnerID=="customer_status_id")
		$ownerIdValue=$value;
	$xt->assign("customer_status_id_value",$value);
	if(!$pageObject->isAppearOnTabs("customer_status_id"))
		$xt->assign("customer_status_id_fieldblock",true);
	else
		$xt->assign("customer_status_id_tabfieldblock",true);
////////////////////////////////////////////
//aktifnotes - 
	
	$value = $pageObject->showDBValue("aktifnotes", $data, $keylink);
	if($mainTableOwnerID=="aktifnotes")
		$ownerIdValue=$value;
	$xt->assign("aktifnotes_value",$value);
	if(!$pageObject->isAppearOnTabs("aktifnotes"))
		$xt->assign("aktifnotes_fieldblock",true);
	else
		$xt->assign("aktifnotes_tabfieldblock",true);
////////////////////////////////////////////
//tmt - Short Date
	
	$value = $pageObject->showDBValue("tmt", $data, $keylink);
	if($mainTableOwnerID=="tmt")
		$ownerIdValue=$value;
	$xt->assign("tmt_value",$value);
	if(!$pageObject->isAppearOnTabs("tmt"))
		$xt->assign("tmt_fieldblock",true);
	else
		$xt->assign("tmt_tabfieldblock",true);
////////////////////////////////////////////
//air_zona_id - 
	
	$value = $pageObject->showDBValue("air_zona_id", $data, $keylink);
	if($mainTableOwnerID=="air_zona_id")
		$ownerIdValue=$value;
	$xt->assign("air_zona_id_value",$value);
	if(!$pageObject->isAppearOnTabs("air_zona_id"))
		$xt->assign("air_zona_id_fieldblock",true);
	else
		$xt->assign("air_zona_id_tabfieldblock",true);
////////////////////////////////////////////
//air_manfaat_id - 
	
	$value = $pageObject->showDBValue("air_manfaat_id", $data, $keylink);
	if($mainTableOwnerID=="air_manfaat_id")
		$ownerIdValue=$value;
	$xt->assign("air_manfaat_id_value",$value);
	if(!$pageObject->isAppearOnTabs("air_manfaat_id"))
		$xt->assign("air_manfaat_id_fieldblock",true);
	else
		$xt->assign("air_manfaat_id_tabfieldblock",true);
////////////////////////////////////////////
//def_pajak_id - 
	
	$value = $pageObject->showDBValue("def_pajak_id", $data, $keylink);
	if($mainTableOwnerID=="def_pajak_id")
		$ownerIdValue=$value;
	$xt->assign("def_pajak_id_value",$value);
	if(!$pageObject->isAppearOnTabs("def_pajak_id"))
		$xt->assign("def_pajak_id_fieldblock",true);
	else
		$xt->assign("def_pajak_id_tabfieldblock",true);
////////////////////////////////////////////
//opnm - 
	
	$value = $pageObject->showDBValue("opnm", $data, $keylink);
	if($mainTableOwnerID=="opnm")
		$ownerIdValue=$value;
	$xt->assign("opnm_value",$value);
	if(!$pageObject->isAppearOnTabs("opnm"))
		$xt->assign("opnm_fieldblock",true);
	else
		$xt->assign("opnm_tabfieldblock",true);
////////////////////////////////////////////
//opalamat - 
	
	$value = $pageObject->showDBValue("opalamat", $data, $keylink);
	if($mainTableOwnerID=="opalamat")
		$ownerIdValue=$value;
	$xt->assign("opalamat_value",$value);
	if(!$pageObject->isAppearOnTabs("opalamat"))
		$xt->assign("opalamat_fieldblock",true);
	else
		$xt->assign("opalamat_tabfieldblock",true);
////////////////////////////////////////////
//latitude - Number
	
	$value = $pageObject->showDBValue("latitude", $data, $keylink);
	if($mainTableOwnerID=="latitude")
		$ownerIdValue=$value;
	$xt->assign("latitude_value",$value);
	if(!$pageObject->isAppearOnTabs("latitude"))
		$xt->assign("latitude_fieldblock",true);
	else
		$xt->assign("latitude_tabfieldblock",true);
////////////////////////////////////////////
//longitude - Number
	
	$value = $pageObject->showDBValue("longitude", $data, $keylink);
	if($mainTableOwnerID=="longitude")
		$ownerIdValue=$value;
	$xt->assign("longitude_value",$value);
	if(!$pageObject->isAppearOnTabs("longitude"))
		$xt->assign("longitude_fieldblock",true);
	else
		$xt->assign("longitude_tabfieldblock",true);
////////////////////////////////////////////
//created - Short Date
	
	$value = $pageObject->showDBValue("created", $data, $keylink);
	if($mainTableOwnerID=="created")
		$ownerIdValue=$value;
	$xt->assign("created_value",$value);
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
////////////////////////////////////////////
//updated - Short Date
	
	$value = $pageObject->showDBValue("updated", $data, $keylink);
	if($mainTableOwnerID=="updated")
		$ownerIdValue=$value;
	$xt->assign("updated_value",$value);
	if(!$pageObject->isAppearOnTabs("updated"))
		$xt->assign("updated_fieldblock",true);
	else
		$xt->assign("updated_tabfieldblock",true);
////////////////////////////////////////////
//update_uid - 
	
	$value = $pageObject->showDBValue("update_uid", $data, $keylink);
	if($mainTableOwnerID=="update_uid")
		$ownerIdValue=$value;
	$xt->assign("update_uid_value",$value);
	if(!$pageObject->isAppearOnTabs("update_uid"))
		$xt->assign("update_uid_fieldblock",true);
	else
		$xt->assign("update_uid_tabfieldblock",true);
////////////////////////////////////////////
//kd_restojmlmeja - 
	
	$value = $pageObject->showDBValue("kd_restojmlmeja", $data, $keylink);
	if($mainTableOwnerID=="kd_restojmlmeja")
		$ownerIdValue=$value;
	$xt->assign("kd_restojmlmeja_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_restojmlmeja"))
		$xt->assign("kd_restojmlmeja_fieldblock",true);
	else
		$xt->assign("kd_restojmlmeja_tabfieldblock",true);
////////////////////////////////////////////
//kd_restojmlkursi - 
	
	$value = $pageObject->showDBValue("kd_restojmlkursi", $data, $keylink);
	if($mainTableOwnerID=="kd_restojmlkursi")
		$ownerIdValue=$value;
	$xt->assign("kd_restojmlkursi_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_restojmlkursi"))
		$xt->assign("kd_restojmlkursi_fieldblock",true);
	else
		$xt->assign("kd_restojmlkursi_tabfieldblock",true);
////////////////////////////////////////////
//kd_restojmltamu - 
	
	$value = $pageObject->showDBValue("kd_restojmltamu", $data, $keylink);
	if($mainTableOwnerID=="kd_restojmltamu")
		$ownerIdValue=$value;
	$xt->assign("kd_restojmltamu_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_restojmltamu"))
		$xt->assign("kd_restojmltamu_fieldblock",true);
	else
		$xt->assign("kd_restojmltamu_tabfieldblock",true);
////////////////////////////////////////////
//kd_filmkursi - 
	
	$value = $pageObject->showDBValue("kd_filmkursi", $data, $keylink);
	if($mainTableOwnerID=="kd_filmkursi")
		$ownerIdValue=$value;
	$xt->assign("kd_filmkursi_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_filmkursi"))
		$xt->assign("kd_filmkursi_fieldblock",true);
	else
		$xt->assign("kd_filmkursi_tabfieldblock",true);
////////////////////////////////////////////
//kd_filmpertunjukan - 
	
	$value = $pageObject->showDBValue("kd_filmpertunjukan", $data, $keylink);
	if($mainTableOwnerID=="kd_filmpertunjukan")
		$ownerIdValue=$value;
	$xt->assign("kd_filmpertunjukan_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_filmpertunjukan"))
		$xt->assign("kd_filmpertunjukan_fieldblock",true);
	else
		$xt->assign("kd_filmpertunjukan_tabfieldblock",true);
////////////////////////////////////////////
//kd_filmtarif - Number
	
	$value = $pageObject->showDBValue("kd_filmtarif", $data, $keylink);
	if($mainTableOwnerID=="kd_filmtarif")
		$ownerIdValue=$value;
	$xt->assign("kd_filmtarif_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_filmtarif"))
		$xt->assign("kd_filmtarif_fieldblock",true);
	else
		$xt->assign("kd_filmtarif_tabfieldblock",true);
////////////////////////////////////////////
//kd_bilyarmeja - 
	
	$value = $pageObject->showDBValue("kd_bilyarmeja", $data, $keylink);
	if($mainTableOwnerID=="kd_bilyarmeja")
		$ownerIdValue=$value;
	$xt->assign("kd_bilyarmeja_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_bilyarmeja"))
		$xt->assign("kd_bilyarmeja_fieldblock",true);
	else
		$xt->assign("kd_bilyarmeja_tabfieldblock",true);
////////////////////////////////////////////
//kd_bilyartarif - Number
	
	$value = $pageObject->showDBValue("kd_bilyartarif", $data, $keylink);
	if($mainTableOwnerID=="kd_bilyartarif")
		$ownerIdValue=$value;
	$xt->assign("kd_bilyartarif_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_bilyartarif"))
		$xt->assign("kd_bilyartarif_fieldblock",true);
	else
		$xt->assign("kd_bilyartarif_tabfieldblock",true);
////////////////////////////////////////////
//kd_bilyarkegiatan - 
	
	$value = $pageObject->showDBValue("kd_bilyarkegiatan", $data, $keylink);
	if($mainTableOwnerID=="kd_bilyarkegiatan")
		$ownerIdValue=$value;
	$xt->assign("kd_bilyarkegiatan_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_bilyarkegiatan"))
		$xt->assign("kd_bilyarkegiatan_fieldblock",true);
	else
		$xt->assign("kd_bilyarkegiatan_tabfieldblock",true);
////////////////////////////////////////////
//kd_diskopengunjung - 
	
	$value = $pageObject->showDBValue("kd_diskopengunjung", $data, $keylink);
	if($mainTableOwnerID=="kd_diskopengunjung")
		$ownerIdValue=$value;
	$xt->assign("kd_diskopengunjung_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_diskopengunjung"))
		$xt->assign("kd_diskopengunjung_fieldblock",true);
	else
		$xt->assign("kd_diskopengunjung_tabfieldblock",true);
////////////////////////////////////////////
//kd_diskotarif - Number
	
	$value = $pageObject->showDBValue("kd_diskotarif", $data, $keylink);
	if($mainTableOwnerID=="kd_diskotarif")
		$ownerIdValue=$value;
	$xt->assign("kd_diskotarif_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_diskotarif"))
		$xt->assign("kd_diskotarif_fieldblock",true);
	else
		$xt->assign("kd_diskotarif_tabfieldblock",true);
////////////////////////////////////////////
//mall_id - 
	
	$value = $pageObject->showDBValue("mall_id", $data, $keylink);
	if($mainTableOwnerID=="mall_id")
		$ownerIdValue=$value;
	$xt->assign("mall_id_value",$value);
	if(!$pageObject->isAppearOnTabs("mall_id"))
		$xt->assign("mall_id_fieldblock",true);
	else
		$xt->assign("mall_id_tabfieldblock",true);
////////////////////////////////////////////
//cash_register - 
	
	$value = $pageObject->showDBValue("cash_register", $data, $keylink);
	if($mainTableOwnerID=="cash_register")
		$ownerIdValue=$value;
	$xt->assign("cash_register_value",$value);
	if(!$pageObject->isAppearOnTabs("cash_register"))
		$xt->assign("cash_register_fieldblock",true);
	else
		$xt->assign("cash_register_tabfieldblock",true);
////////////////////////////////////////////
//pelaporan - 
	
	$value = $pageObject->showDBValue("pelaporan", $data, $keylink);
	if($mainTableOwnerID=="pelaporan")
		$ownerIdValue=$value;
	$xt->assign("pelaporan_value",$value);
	if(!$pageObject->isAppearOnTabs("pelaporan"))
		$xt->assign("pelaporan_fieldblock",true);
	else
		$xt->assign("pelaporan_tabfieldblock",true);
////////////////////////////////////////////
//pembukuan - 
	
	$value = $pageObject->showDBValue("pembukuan", $data, $keylink);
	if($mainTableOwnerID=="pembukuan")
		$ownerIdValue=$value;
	$xt->assign("pembukuan_value",$value);
	if(!$pageObject->isAppearOnTabs("pembukuan"))
		$xt->assign("pembukuan_fieldblock",true);
	else
		$xt->assign("pembukuan_tabfieldblock",true);
////////////////////////////////////////////
//bandara - 
	
	$value = $pageObject->showDBValue("bandara", $data, $keylink);
	if($mainTableOwnerID=="bandara")
		$ownerIdValue=$value;
	$xt->assign("bandara_value",$value);
	if(!$pageObject->isAppearOnTabs("bandara"))
		$xt->assign("bandara_fieldblock",true);
	else
		$xt->assign("bandara_tabfieldblock",true);
////////////////////////////////////////////
//wajib_pajak - 
	
	$value = $pageObject->showDBValue("wajib_pajak", $data, $keylink);
	if($mainTableOwnerID=="wajib_pajak")
		$ownerIdValue=$value;
	$xt->assign("wajib_pajak_value",$value);
	if(!$pageObject->isAppearOnTabs("wajib_pajak"))
		$xt->assign("wajib_pajak_fieldblock",true);
	else
		$xt->assign("wajib_pajak_tabfieldblock",true);
////////////////////////////////////////////
//jumlah_karyawan - 
	
	$value = $pageObject->showDBValue("jumlah_karyawan", $data, $keylink);
	if($mainTableOwnerID=="jumlah_karyawan")
		$ownerIdValue=$value;
	$xt->assign("jumlah_karyawan_value",$value);
	if(!$pageObject->isAppearOnTabs("jumlah_karyawan"))
		$xt->assign("jumlah_karyawan_fieldblock",true);
	else
		$xt->assign("jumlah_karyawan_tabfieldblock",true);
////////////////////////////////////////////
//tanggal_tutup - Short Date
	
	$value = $pageObject->showDBValue("tanggal_tutup", $data, $keylink);
	if($mainTableOwnerID=="tanggal_tutup")
		$ownerIdValue=$value;
	$xt->assign("tanggal_tutup_value",$value);
	if(!$pageObject->isAppearOnTabs("tanggal_tutup"))
		$xt->assign("tanggal_tutup_fieldblock",true);
	else
		$xt->assign("tanggal_tutup_tabfieldblock",true);
////////////////////////////////////////////
//parkir_luas - 
	
	$value = $pageObject->showDBValue("parkir_luas", $data, $keylink);
	if($mainTableOwnerID=="parkir_luas")
		$ownerIdValue=$value;
	$xt->assign("parkir_luas_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_luas"))
		$xt->assign("parkir_luas_fieldblock",true);
	else
		$xt->assign("parkir_luas_tabfieldblock",true);
////////////////////////////////////////////
//parkir_masuk - 
	
	$value = $pageObject->showDBValue("parkir_masuk", $data, $keylink);
	if($mainTableOwnerID=="parkir_masuk")
		$ownerIdValue=$value;
	$xt->assign("parkir_masuk_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_masuk"))
		$xt->assign("parkir_masuk_fieldblock",true);
	else
		$xt->assign("parkir_masuk_tabfieldblock",true);
////////////////////////////////////////////
//parkir_tarif_mobil - Number
	
	$value = $pageObject->showDBValue("parkir_tarif_mobil", $data, $keylink);
	if($mainTableOwnerID=="parkir_tarif_mobil")
		$ownerIdValue=$value;
	$xt->assign("parkir_tarif_mobil_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_tarif_mobil"))
		$xt->assign("parkir_tarif_mobil_fieldblock",true);
	else
		$xt->assign("parkir_tarif_mobil_tabfieldblock",true);
////////////////////////////////////////////
//parkir_tambahan - Number
	
	$value = $pageObject->showDBValue("parkir_tambahan", $data, $keylink);
	if($mainTableOwnerID=="parkir_tambahan")
		$ownerIdValue=$value;
	$xt->assign("parkir_tambahan_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_tambahan"))
		$xt->assign("parkir_tambahan_fieldblock",true);
	else
		$xt->assign("parkir_tambahan_tabfieldblock",true);
////////////////////////////////////////////
//parkir_kapasitas_mobil - 
	
	$value = $pageObject->showDBValue("parkir_kapasitas_mobil", $data, $keylink);
	if($mainTableOwnerID=="parkir_kapasitas_mobil")
		$ownerIdValue=$value;
	$xt->assign("parkir_kapasitas_mobil_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_kapasitas_mobil"))
		$xt->assign("parkir_kapasitas_mobil_fieldblock",true);
	else
		$xt->assign("parkir_kapasitas_mobil_tabfieldblock",true);
////////////////////////////////////////////
//parkir_mobil_hari - 
	
	$value = $pageObject->showDBValue("parkir_mobil_hari", $data, $keylink);
	if($mainTableOwnerID=="parkir_mobil_hari")
		$ownerIdValue=$value;
	$xt->assign("parkir_mobil_hari_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_mobil_hari"))
		$xt->assign("parkir_mobil_hari_fieldblock",true);
	else
		$xt->assign("parkir_mobil_hari_tabfieldblock",true);
////////////////////////////////////////////
//parkir_keluar - 
	
	$value = $pageObject->showDBValue("parkir_keluar", $data, $keylink);
	if($mainTableOwnerID=="parkir_keluar")
		$ownerIdValue=$value;
	$xt->assign("parkir_keluar_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_keluar"))
		$xt->assign("parkir_keluar_fieldblock",true);
	else
		$xt->assign("parkir_keluar_tabfieldblock",true);
////////////////////////////////////////////
//parkir_motor_luas - 
	
	$value = $pageObject->showDBValue("parkir_motor_luas", $data, $keylink);
	if($mainTableOwnerID=="parkir_motor_luas")
		$ownerIdValue=$value;
	$xt->assign("parkir_motor_luas_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_motor_luas"))
		$xt->assign("parkir_motor_luas_fieldblock",true);
	else
		$xt->assign("parkir_motor_luas_tabfieldblock",true);
////////////////////////////////////////////
//parkir_motor_masuk - 
	
	$value = $pageObject->showDBValue("parkir_motor_masuk", $data, $keylink);
	if($mainTableOwnerID=="parkir_motor_masuk")
		$ownerIdValue=$value;
	$xt->assign("parkir_motor_masuk_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_motor_masuk"))
		$xt->assign("parkir_motor_masuk_fieldblock",true);
	else
		$xt->assign("parkir_motor_masuk_tabfieldblock",true);
////////////////////////////////////////////
//parkir_motor_keluar - 
	
	$value = $pageObject->showDBValue("parkir_motor_keluar", $data, $keylink);
	if($mainTableOwnerID=="parkir_motor_keluar")
		$ownerIdValue=$value;
	$xt->assign("parkir_motor_keluar_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_motor_keluar"))
		$xt->assign("parkir_motor_keluar_fieldblock",true);
	else
		$xt->assign("parkir_motor_keluar_tabfieldblock",true);
////////////////////////////////////////////
//parkir_tarif_motor - Number
	
	$value = $pageObject->showDBValue("parkir_tarif_motor", $data, $keylink);
	if($mainTableOwnerID=="parkir_tarif_motor")
		$ownerIdValue=$value;
	$xt->assign("parkir_tarif_motor_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_tarif_motor"))
		$xt->assign("parkir_tarif_motor_fieldblock",true);
	else
		$xt->assign("parkir_tarif_motor_tabfieldblock",true);
////////////////////////////////////////////
//parkir_motor_tambahan - Number
	
	$value = $pageObject->showDBValue("parkir_motor_tambahan", $data, $keylink);
	if($mainTableOwnerID=="parkir_motor_tambahan")
		$ownerIdValue=$value;
	$xt->assign("parkir_motor_tambahan_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_motor_tambahan"))
		$xt->assign("parkir_motor_tambahan_fieldblock",true);
	else
		$xt->assign("parkir_motor_tambahan_tabfieldblock",true);
////////////////////////////////////////////
//parkir_kapasitas_motor - 
	
	$value = $pageObject->showDBValue("parkir_kapasitas_motor", $data, $keylink);
	if($mainTableOwnerID=="parkir_kapasitas_motor")
		$ownerIdValue=$value;
	$xt->assign("parkir_kapasitas_motor_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_kapasitas_motor"))
		$xt->assign("parkir_kapasitas_motor_fieldblock",true);
	else
		$xt->assign("parkir_kapasitas_motor_tabfieldblock",true);
////////////////////////////////////////////
//parkir_motor_hari - 
	
	$value = $pageObject->showDBValue("parkir_motor_hari", $data, $keylink);
	if($mainTableOwnerID=="parkir_motor_hari")
		$ownerIdValue=$value;
	$xt->assign("parkir_motor_hari_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_motor_hari"))
		$xt->assign("parkir_motor_hari_fieldblock",true);
	else
		$xt->assign("parkir_motor_hari_tabfieldblock",true);
////////////////////////////////////////////
//kelompok_usaha_id - 
	
	$value = $pageObject->showDBValue("kelompok_usaha_id", $data, $keylink);
	if($mainTableOwnerID=="kelompok_usaha_id")
		$ownerIdValue=$value;
	$xt->assign("kelompok_usaha_id_value",$value);
	if(!$pageObject->isAppearOnTabs("kelompok_usaha_id"))
		$xt->assign("kelompok_usaha_id_fieldblock",true);
	else
		$xt->assign("kelompok_usaha_id_tabfieldblock",true);
////////////////////////////////////////////
//zona_id - 
	
	$value = $pageObject->showDBValue("zona_id", $data, $keylink);
	if($mainTableOwnerID=="zona_id")
		$ownerIdValue=$value;
	$xt->assign("zona_id_value",$value);
	if(!$pageObject->isAppearOnTabs("zona_id"))
		$xt->assign("zona_id_fieldblock",true);
	else
		$xt->assign("zona_id_tabfieldblock",true);
////////////////////////////////////////////
//manfaat_id - 
	
	$value = $pageObject->showDBValue("manfaat_id", $data, $keylink);
	if($mainTableOwnerID=="manfaat_id")
		$ownerIdValue=$value;
	$xt->assign("manfaat_id_value",$value);
	if(!$pageObject->isAppearOnTabs("manfaat_id"))
		$xt->assign("manfaat_id_fieldblock",true);
	else
		$xt->assign("manfaat_id_tabfieldblock",true);
////////////////////////////////////////////
//golongan_id - 
	
	$value = $pageObject->showDBValue("golongan_id", $data, $keylink);
	if($mainTableOwnerID=="golongan_id")
		$ownerIdValue=$value;
	$xt->assign("golongan_id_value",$value);
	if(!$pageObject->isAppearOnTabs("golongan_id"))
		$xt->assign("golongan_id_fieldblock",true);
	else
		$xt->assign("golongan_id_tabfieldblock",true);
////////////////////////////////////////////
//id_old - 
	
	$value = $pageObject->showDBValue("id_old", $data, $keylink);
	if($mainTableOwnerID=="id_old")
		$ownerIdValue=$value;
	$xt->assign("id_old_value",$value);
	if(!$pageObject->isAppearOnTabs("id_old"))
		$xt->assign("id_old_fieldblock",true);
	else
		$xt->assign("id_old_tabfieldblock",true);

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && !isMobile())
{
	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
	}
	
	$dControlsMap = array();
	$dViewControlsMap = array();
	
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$options = array();
		//array of params for classes
		$options["mode"] = LIST_DETAILS;
		$options["pageType"] = PAGE_LIST;
		$options["masterPageType"] = PAGE_VIEW;
		$options["mainMasterPageType"] = PAGE_VIEW;
		$options['masterTable'] = "pad.pad_customer_usaha";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "pad.pad_customer_usaha";
			continue;
		}
		
		$layout = GetPageLayout(GoodFieldName($strTableName), PAGE_LIST);
		if($layout)
		{
			$rtl = $xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
			$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl.".css"
				, "pagestylepath" => "pagestyles/".$layout->name.$rtl.".css");
			$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE'.".css");
		}
		
		$options['xt'] = new Xtempl();
		$options['id'] = $dpParams['ids'][$d];
		$options['flyId'] = $pageObject->genId()+1;
		$mkr = 1;
		foreach($mKeys[$strTableName] as $mk)
			$options['masterKeysReq'][$mkr++] = $data[$mk];

		$listPageObject = ListPage::createListPage($strTableName, $options);
		
		// prepare code
		$listPageObject->prepareForBuildPage();
		
		// show page
		if($listPageObject->permis[$strTableName]['search'] && $listPageObject->rowsFound)
		{
			//set page events
			foreach($listPageObject->eventsObject->events as $event => $name)
				$listPageObject->xt->assign_event($event, $listPageObject->eventsObject, $event, array());
			
			//add detail settings to master settings
			$listPageObject->addControlsJSAndCSS();
			$listPageObject->fillSetCntrlMaps();
			$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];
			$dControlsMap[$strTableName] = $listPageObject->controlsMap;
			$dViewControlsMap[$strTableName] = $listPageObject->viewControlsMap;
			foreach($listPageObject->jsSettings['global']['shortTNames'] as $keySet=>$val)
			{
				if(!array_key_exists($keySet,$pageObject->settingsMap["globalSettings"]['shortTNames']))
					$pageObject->settingsMap["globalSettings"]['shortTNames'][$keySet] = $val;
			}
			
			//Add detail's js files to master's files
			$pageObject->copyAllJSFiles($listPageObject->grabAllJSFiles());
			
			//Add detail's css files to master's files
			$pageObject->copyAllCSSFiles($listPageObject->grabAllCSSFiles());
		
			$xtParams = array("method"=>'showPage', "params"=> false);
			$xtParams['object'] = $listPageObject;
			$xt->assign("displayDetailTable_".GoodFieldName($listPageObject->tName), $xtParams);
		
			$pageObject->controlsMap['dpTablesParams'][] = array('tName'=>$strTableName, 'id'=>$options['id']);
		}
	}
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
	$pageObject->viewControlsMap['dViewControlsMap'] = $dViewControlsMap; 
	$strTableName = "pad.pad_customer_usaha";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin prepare for Next Prev button
if(!@$_SESSION[$strTableName."_noNextPrev"] && !$inlineview && !$pdf)
{
	$pageObject->getNextPrevRecordKeys($data,"Search",$next,$prev);
}
//End prepare for Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($pageObject->googleMapCfg['isUseGoogleMap'])
{
	$pageObject->initGmaps();
}

$pageObject->addCommonJs();

//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

if(!$inlineview)
{
	$pageObject->body["begin"].="<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>\r\n";
		$pageObject->body["begin"].= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";		
	
	$pageObject->jsSettings['tableSettings'][$strTableName]["keys"] = $pageObject->jsKeys;
	$pageObject->jsSettings['tableSettings'][$strTableName]['keyFields'] = $pageObject->keyFields;
	$pageObject->jsSettings['tableSettings'][$strTableName]["prevKeys"] = $prev;
	$pageObject->jsSettings['tableSettings'][$strTableName]["nextKeys"] = $next; 
	
	// assign body end
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";
	$pageObject->body['end']["object"] = &$pageObject;
	
	$xt->assign("body",$pageObject->body);
	$xt->assign("flybody",true);
}
else
{
	$xt->assign("footer",false);
	$xt->assign("header",false);
	$xt->assign("flybody",$pageObject->body);
	$xt->assign("body",true);
	$xt->assign("pdflink_block",false);
	
	$pageObject->fillSetCntrlMaps();
	
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['viewControlsMap'] = $pageObject->viewControlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;
}
$xt->assign("style_block",true);
$xt->assign("stylefiles_block",true);

$editlink="";
$editkeys=array();
	$editkeys["editid1"]=postvalue("editid1");
foreach($editkeys as $key=>$val)
{
	if($editlink)
		$editlink.="&";
	$editlink.=$key."=".$val;
}
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='pad_pad_customer_usaha_edit.php?".$editlink."'\"");

$strPerm = GetUserPermissions($strTableName);
if(CheckSecurity($ownerIdValue,"Edit") && !$inlineview && strpos($strPerm, "E")!==false)
	$xt->assign("edit_button",true);
else
	$xt->assign("edit_button",false);

if(!$pdf && !$all && !$inlineview)
{
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin show Next Prev button
	$nextlink=$prevlink="";
	if(count($next))
	{
		$xt->assign("next_button",true);
	 		$nextlink .="editid1=".htmlspecialchars(rawurlencode($next[1-1]));
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\"");
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
			$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1-1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\"");
	}
	else 
		$xt->assign("prev_button",false);
//End show Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$xt->assign("back_button",true);
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
}

$oldtemplatefile = $pageObject->templatefile;

if(!$all)
{
	if($eventObj->exists("BeforeShowView"))
	{
		$templatefile = $pageObject->templatefile;
		$eventObj->BeforeShowView($xt,$templatefile,$data, $pageObject);
		$pageObject->templatefile = $templatefile;
	}
	if(!$pdf)
	{
		if(!$inlineview)
			$xt->display($pageObject->templatefile);
		else{
				$xt->load_template($pageObject->templatefile);
				$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('body');
				if(count($pageObject->includes_css))
					$returnJSON['CSSFiles'] = array_unique($pageObject->includes_css);
				if(count($pageObject->includes_cssIE))
					$returnJSON['CSSFilesIE'] = array_unique($pageObject->includes_cssIE);				
				$returnJSON['idStartFrom'] = $id+1;
				$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
				echo (my_json_encode($returnJSON)); 
			}
	}
	break;
}
}


?>
