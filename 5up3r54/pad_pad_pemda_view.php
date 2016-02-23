<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_pemda_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_pemda_view"] = $layout;




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
	header("Location: pad_pad_pemda_list.php?a=return");
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
$arr['fName'] = "type";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("type");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kepala_nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kepala_nama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "alamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("alamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "telp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("telp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pemda_nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pemda_nama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ibukota";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ibukota");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tmt";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tmt");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jabatan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jabatan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ppkd_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ppkd_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "reklame_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("reklame_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pendapatan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pendapatan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pemda_nama_singkat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pemda_nama_singkat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "airtanah_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("airtanah_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "self_dok_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("self_dok_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "office_dok_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("office_dok_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tgl_jatuhtempo_self";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tgl_jatuhtempo_self");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "spt_denda";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("spt_denda");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tgl_spt";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tgl_spt");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pad_bunga";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pad_bunga");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "fax";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("fax");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "website";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("website");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "email";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("email");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "daerah";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("daerah");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "alamat_lengkap";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("alamat_lengkap");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ppj_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ppj_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hotel_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hotel_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "walet_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("walet_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "restauran_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("restauran_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hiburan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hiburan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "enabled";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("enabled");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "surat_no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("surat_no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hotel_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hotel_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "restoran_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("restoran_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hiburan_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hiburan_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ppj_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ppj_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "airtanah_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("airtanah_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "reklame_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("reklame_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "restauran_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("restauran_kd");
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
//type - 
	
	$value = $pageObject->showDBValue("type", $data, $keylink);
	if($mainTableOwnerID=="type")
		$ownerIdValue=$value;
	$xt->assign("type_value",$value);
	if(!$pageObject->isAppearOnTabs("type"))
		$xt->assign("type_fieldblock",true);
	else
		$xt->assign("type_tabfieldblock",true);
////////////////////////////////////////////
//kepala_nama - 
	
	$value = $pageObject->showDBValue("kepala_nama", $data, $keylink);
	if($mainTableOwnerID=="kepala_nama")
		$ownerIdValue=$value;
	$xt->assign("kepala_nama_value",$value);
	if(!$pageObject->isAppearOnTabs("kepala_nama"))
		$xt->assign("kepala_nama_fieldblock",true);
	else
		$xt->assign("kepala_nama_tabfieldblock",true);
////////////////////////////////////////////
//alamat - 
	
	$value = $pageObject->showDBValue("alamat", $data, $keylink);
	if($mainTableOwnerID=="alamat")
		$ownerIdValue=$value;
	$xt->assign("alamat_value",$value);
	if(!$pageObject->isAppearOnTabs("alamat"))
		$xt->assign("alamat_fieldblock",true);
	else
		$xt->assign("alamat_tabfieldblock",true);
////////////////////////////////////////////
//telp - 
	
	$value = $pageObject->showDBValue("telp", $data, $keylink);
	if($mainTableOwnerID=="telp")
		$ownerIdValue=$value;
	$xt->assign("telp_value",$value);
	if(!$pageObject->isAppearOnTabs("telp"))
		$xt->assign("telp_fieldblock",true);
	else
		$xt->assign("telp_tabfieldblock",true);
////////////////////////////////////////////
//pemda_nama - 
	
	$value = $pageObject->showDBValue("pemda_nama", $data, $keylink);
	if($mainTableOwnerID=="pemda_nama")
		$ownerIdValue=$value;
	$xt->assign("pemda_nama_value",$value);
	if(!$pageObject->isAppearOnTabs("pemda_nama"))
		$xt->assign("pemda_nama_fieldblock",true);
	else
		$xt->assign("pemda_nama_tabfieldblock",true);
////////////////////////////////////////////
//ibukota - 
	
	$value = $pageObject->showDBValue("ibukota", $data, $keylink);
	if($mainTableOwnerID=="ibukota")
		$ownerIdValue=$value;
	$xt->assign("ibukota_value",$value);
	if(!$pageObject->isAppearOnTabs("ibukota"))
		$xt->assign("ibukota_fieldblock",true);
	else
		$xt->assign("ibukota_tabfieldblock",true);
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
//jabatan - 
	
	$value = $pageObject->showDBValue("jabatan", $data, $keylink);
	if($mainTableOwnerID=="jabatan")
		$ownerIdValue=$value;
	$xt->assign("jabatan_value",$value);
	if(!$pageObject->isAppearOnTabs("jabatan"))
		$xt->assign("jabatan_fieldblock",true);
	else
		$xt->assign("jabatan_tabfieldblock",true);
////////////////////////////////////////////
//ppkd_id - 
	
	$value = $pageObject->showDBValue("ppkd_id", $data, $keylink);
	if($mainTableOwnerID=="ppkd_id")
		$ownerIdValue=$value;
	$xt->assign("ppkd_id_value",$value);
	if(!$pageObject->isAppearOnTabs("ppkd_id"))
		$xt->assign("ppkd_id_fieldblock",true);
	else
		$xt->assign("ppkd_id_tabfieldblock",true);
////////////////////////////////////////////
//reklame_id - 
	
	$value = $pageObject->showDBValue("reklame_id", $data, $keylink);
	if($mainTableOwnerID=="reklame_id")
		$ownerIdValue=$value;
	$xt->assign("reklame_id_value",$value);
	if(!$pageObject->isAppearOnTabs("reklame_id"))
		$xt->assign("reklame_id_fieldblock",true);
	else
		$xt->assign("reklame_id_tabfieldblock",true);
////////////////////////////////////////////
//pendapatan_id - 
	
	$value = $pageObject->showDBValue("pendapatan_id", $data, $keylink);
	if($mainTableOwnerID=="pendapatan_id")
		$ownerIdValue=$value;
	$xt->assign("pendapatan_id_value",$value);
	if(!$pageObject->isAppearOnTabs("pendapatan_id"))
		$xt->assign("pendapatan_id_fieldblock",true);
	else
		$xt->assign("pendapatan_id_tabfieldblock",true);
////////////////////////////////////////////
//pemda_nama_singkat - 
	
	$value = $pageObject->showDBValue("pemda_nama_singkat", $data, $keylink);
	if($mainTableOwnerID=="pemda_nama_singkat")
		$ownerIdValue=$value;
	$xt->assign("pemda_nama_singkat_value",$value);
	if(!$pageObject->isAppearOnTabs("pemda_nama_singkat"))
		$xt->assign("pemda_nama_singkat_fieldblock",true);
	else
		$xt->assign("pemda_nama_singkat_tabfieldblock",true);
////////////////////////////////////////////
//airtanah_id - 
	
	$value = $pageObject->showDBValue("airtanah_id", $data, $keylink);
	if($mainTableOwnerID=="airtanah_id")
		$ownerIdValue=$value;
	$xt->assign("airtanah_id_value",$value);
	if(!$pageObject->isAppearOnTabs("airtanah_id"))
		$xt->assign("airtanah_id_fieldblock",true);
	else
		$xt->assign("airtanah_id_tabfieldblock",true);
////////////////////////////////////////////
//self_dok_id - 
	
	$value = $pageObject->showDBValue("self_dok_id", $data, $keylink);
	if($mainTableOwnerID=="self_dok_id")
		$ownerIdValue=$value;
	$xt->assign("self_dok_id_value",$value);
	if(!$pageObject->isAppearOnTabs("self_dok_id"))
		$xt->assign("self_dok_id_fieldblock",true);
	else
		$xt->assign("self_dok_id_tabfieldblock",true);
////////////////////////////////////////////
//office_dok_id - 
	
	$value = $pageObject->showDBValue("office_dok_id", $data, $keylink);
	if($mainTableOwnerID=="office_dok_id")
		$ownerIdValue=$value;
	$xt->assign("office_dok_id_value",$value);
	if(!$pageObject->isAppearOnTabs("office_dok_id"))
		$xt->assign("office_dok_id_fieldblock",true);
	else
		$xt->assign("office_dok_id_tabfieldblock",true);
////////////////////////////////////////////
//tgl_jatuhtempo_self - 
	
	$value = $pageObject->showDBValue("tgl_jatuhtempo_self", $data, $keylink);
	if($mainTableOwnerID=="tgl_jatuhtempo_self")
		$ownerIdValue=$value;
	$xt->assign("tgl_jatuhtempo_self_value",$value);
	if(!$pageObject->isAppearOnTabs("tgl_jatuhtempo_self"))
		$xt->assign("tgl_jatuhtempo_self_fieldblock",true);
	else
		$xt->assign("tgl_jatuhtempo_self_tabfieldblock",true);
////////////////////////////////////////////
//spt_denda - Number
	
	$value = $pageObject->showDBValue("spt_denda", $data, $keylink);
	if($mainTableOwnerID=="spt_denda")
		$ownerIdValue=$value;
	$xt->assign("spt_denda_value",$value);
	if(!$pageObject->isAppearOnTabs("spt_denda"))
		$xt->assign("spt_denda_fieldblock",true);
	else
		$xt->assign("spt_denda_tabfieldblock",true);
////////////////////////////////////////////
//tgl_spt - 
	
	$value = $pageObject->showDBValue("tgl_spt", $data, $keylink);
	if($mainTableOwnerID=="tgl_spt")
		$ownerIdValue=$value;
	$xt->assign("tgl_spt_value",$value);
	if(!$pageObject->isAppearOnTabs("tgl_spt"))
		$xt->assign("tgl_spt_fieldblock",true);
	else
		$xt->assign("tgl_spt_tabfieldblock",true);
////////////////////////////////////////////
//pad_bunga - Number
	
	$value = $pageObject->showDBValue("pad_bunga", $data, $keylink);
	if($mainTableOwnerID=="pad_bunga")
		$ownerIdValue=$value;
	$xt->assign("pad_bunga_value",$value);
	if(!$pageObject->isAppearOnTabs("pad_bunga"))
		$xt->assign("pad_bunga_fieldblock",true);
	else
		$xt->assign("pad_bunga_tabfieldblock",true);
////////////////////////////////////////////
//fax - 
	
	$value = $pageObject->showDBValue("fax", $data, $keylink);
	if($mainTableOwnerID=="fax")
		$ownerIdValue=$value;
	$xt->assign("fax_value",$value);
	if(!$pageObject->isAppearOnTabs("fax"))
		$xt->assign("fax_fieldblock",true);
	else
		$xt->assign("fax_tabfieldblock",true);
////////////////////////////////////////////
//website - 
	
	$value = $pageObject->showDBValue("website", $data, $keylink);
	if($mainTableOwnerID=="website")
		$ownerIdValue=$value;
	$xt->assign("website_value",$value);
	if(!$pageObject->isAppearOnTabs("website"))
		$xt->assign("website_fieldblock",true);
	else
		$xt->assign("website_tabfieldblock",true);
////////////////////////////////////////////
//email - 
	
	$value = $pageObject->showDBValue("email", $data, $keylink);
	if($mainTableOwnerID=="email")
		$ownerIdValue=$value;
	$xt->assign("email_value",$value);
	if(!$pageObject->isAppearOnTabs("email"))
		$xt->assign("email_fieldblock",true);
	else
		$xt->assign("email_tabfieldblock",true);
////////////////////////////////////////////
//daerah - 
	
	$value = $pageObject->showDBValue("daerah", $data, $keylink);
	if($mainTableOwnerID=="daerah")
		$ownerIdValue=$value;
	$xt->assign("daerah_value",$value);
	if(!$pageObject->isAppearOnTabs("daerah"))
		$xt->assign("daerah_fieldblock",true);
	else
		$xt->assign("daerah_tabfieldblock",true);
////////////////////////////////////////////
//alamat_lengkap - 
	
	$value = $pageObject->showDBValue("alamat_lengkap", $data, $keylink);
	if($mainTableOwnerID=="alamat_lengkap")
		$ownerIdValue=$value;
	$xt->assign("alamat_lengkap_value",$value);
	if(!$pageObject->isAppearOnTabs("alamat_lengkap"))
		$xt->assign("alamat_lengkap_fieldblock",true);
	else
		$xt->assign("alamat_lengkap_tabfieldblock",true);
////////////////////////////////////////////
//ppj_id - 
	
	$value = $pageObject->showDBValue("ppj_id", $data, $keylink);
	if($mainTableOwnerID=="ppj_id")
		$ownerIdValue=$value;
	$xt->assign("ppj_id_value",$value);
	if(!$pageObject->isAppearOnTabs("ppj_id"))
		$xt->assign("ppj_id_fieldblock",true);
	else
		$xt->assign("ppj_id_tabfieldblock",true);
////////////////////////////////////////////
//hotel_id - 
	
	$value = $pageObject->showDBValue("hotel_id", $data, $keylink);
	if($mainTableOwnerID=="hotel_id")
		$ownerIdValue=$value;
	$xt->assign("hotel_id_value",$value);
	if(!$pageObject->isAppearOnTabs("hotel_id"))
		$xt->assign("hotel_id_fieldblock",true);
	else
		$xt->assign("hotel_id_tabfieldblock",true);
////////////////////////////////////////////
//walet_id - 
	
	$value = $pageObject->showDBValue("walet_id", $data, $keylink);
	if($mainTableOwnerID=="walet_id")
		$ownerIdValue=$value;
	$xt->assign("walet_id_value",$value);
	if(!$pageObject->isAppearOnTabs("walet_id"))
		$xt->assign("walet_id_fieldblock",true);
	else
		$xt->assign("walet_id_tabfieldblock",true);
////////////////////////////////////////////
//restauran_id - 
	
	$value = $pageObject->showDBValue("restauran_id", $data, $keylink);
	if($mainTableOwnerID=="restauran_id")
		$ownerIdValue=$value;
	$xt->assign("restauran_id_value",$value);
	if(!$pageObject->isAppearOnTabs("restauran_id"))
		$xt->assign("restauran_id_fieldblock",true);
	else
		$xt->assign("restauran_id_tabfieldblock",true);
////////////////////////////////////////////
//hiburan_id - 
	
	$value = $pageObject->showDBValue("hiburan_id", $data, $keylink);
	if($mainTableOwnerID=="hiburan_id")
		$ownerIdValue=$value;
	$xt->assign("hiburan_id_value",$value);
	if(!$pageObject->isAppearOnTabs("hiburan_id"))
		$xt->assign("hiburan_id_fieldblock",true);
	else
		$xt->assign("hiburan_id_tabfieldblock",true);
////////////////////////////////////////////
//parkir_id - 
	
	$value = $pageObject->showDBValue("parkir_id", $data, $keylink);
	if($mainTableOwnerID=="parkir_id")
		$ownerIdValue=$value;
	$xt->assign("parkir_id_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_id"))
		$xt->assign("parkir_id_fieldblock",true);
	else
		$xt->assign("parkir_id_tabfieldblock",true);
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
//surat_no - 
	
	$value = $pageObject->showDBValue("surat_no", $data, $keylink);
	if($mainTableOwnerID=="surat_no")
		$ownerIdValue=$value;
	$xt->assign("surat_no_value",$value);
	if(!$pageObject->isAppearOnTabs("surat_no"))
		$xt->assign("surat_no_fieldblock",true);
	else
		$xt->assign("surat_no_tabfieldblock",true);
////////////////////////////////////////////
//ijin_kd - 
	
	$value = $pageObject->showDBValue("ijin_kd", $data, $keylink);
	if($mainTableOwnerID=="ijin_kd")
		$ownerIdValue=$value;
	$xt->assign("ijin_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin_kd"))
		$xt->assign("ijin_kd_fieldblock",true);
	else
		$xt->assign("ijin_kd_tabfieldblock",true);
////////////////////////////////////////////
//hotel_kd - 
	
	$value = $pageObject->showDBValue("hotel_kd", $data, $keylink);
	if($mainTableOwnerID=="hotel_kd")
		$ownerIdValue=$value;
	$xt->assign("hotel_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("hotel_kd"))
		$xt->assign("hotel_kd_fieldblock",true);
	else
		$xt->assign("hotel_kd_tabfieldblock",true);
////////////////////////////////////////////
//restoran_kd - 
	
	$value = $pageObject->showDBValue("restoran_kd", $data, $keylink);
	if($mainTableOwnerID=="restoran_kd")
		$ownerIdValue=$value;
	$xt->assign("restoran_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("restoran_kd"))
		$xt->assign("restoran_kd_fieldblock",true);
	else
		$xt->assign("restoran_kd_tabfieldblock",true);
////////////////////////////////////////////
//hiburan_kd - 
	
	$value = $pageObject->showDBValue("hiburan_kd", $data, $keylink);
	if($mainTableOwnerID=="hiburan_kd")
		$ownerIdValue=$value;
	$xt->assign("hiburan_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("hiburan_kd"))
		$xt->assign("hiburan_kd_fieldblock",true);
	else
		$xt->assign("hiburan_kd_tabfieldblock",true);
////////////////////////////////////////////
//ppj_kd - 
	
	$value = $pageObject->showDBValue("ppj_kd", $data, $keylink);
	if($mainTableOwnerID=="ppj_kd")
		$ownerIdValue=$value;
	$xt->assign("ppj_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("ppj_kd"))
		$xt->assign("ppj_kd_fieldblock",true);
	else
		$xt->assign("ppj_kd_tabfieldblock",true);
////////////////////////////////////////////
//parkir_kd - 
	
	$value = $pageObject->showDBValue("parkir_kd", $data, $keylink);
	if($mainTableOwnerID=="parkir_kd")
		$ownerIdValue=$value;
	$xt->assign("parkir_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("parkir_kd"))
		$xt->assign("parkir_kd_fieldblock",true);
	else
		$xt->assign("parkir_kd_tabfieldblock",true);
////////////////////////////////////////////
//airtanah_kd - 
	
	$value = $pageObject->showDBValue("airtanah_kd", $data, $keylink);
	if($mainTableOwnerID=="airtanah_kd")
		$ownerIdValue=$value;
	$xt->assign("airtanah_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("airtanah_kd"))
		$xt->assign("airtanah_kd_fieldblock",true);
	else
		$xt->assign("airtanah_kd_tabfieldblock",true);
////////////////////////////////////////////
//reklame_kd - 
	
	$value = $pageObject->showDBValue("reklame_kd", $data, $keylink);
	if($mainTableOwnerID=="reklame_kd")
		$ownerIdValue=$value;
	$xt->assign("reklame_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("reklame_kd"))
		$xt->assign("reklame_kd_fieldblock",true);
	else
		$xt->assign("reklame_kd_tabfieldblock",true);
////////////////////////////////////////////
//restauran_kd - 
	
	$value = $pageObject->showDBValue("restauran_kd", $data, $keylink);
	if($mainTableOwnerID=="restauran_kd")
		$ownerIdValue=$value;
	$xt->assign("restauran_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("restauran_kd"))
		$xt->assign("restauran_kd_fieldblock",true);
	else
		$xt->assign("restauran_kd_tabfieldblock",true);

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
		$options['masterTable'] = "pad.pad_pemda";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "pad.pad_pemda";
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
	$strTableName = "pad.pad_pemda";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='pad_pad_pemda_edit.php?".$editlink."'\"");

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
