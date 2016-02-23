<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_customer_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_customer_view"] = $layout;




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
	header("Location: pad_pad_customer_list.php?a=return");
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
$arr['fName'] = "parent";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parent");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "npwpd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("npwpd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "rp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("rp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pb";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pb");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "formno";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("formno");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "reg_date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("reg_date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("nama");
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
$arr['fName'] = "kabupaten";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kabupaten");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "alamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("alamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kodepos";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kodepos");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "telphone";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("telphone");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpnama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpnama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpalamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpalamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpkelurahan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpkelurahan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpkecamatan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpkecamatan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpkabupaten";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpkabupaten");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wptelp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wptelp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpkodepos";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpkodepos");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pnama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pnama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "palamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("palamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pkelurahan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pkelurahan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pkecamatan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pkecamatan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pkabupaten";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pkabupaten");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ptelp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ptelp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pkodepos";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pkodepos");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin1no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin1no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin1tgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin1tgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin1tglakhir";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin1tglakhir");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin2no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin2no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin2tgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin2tgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin2tglakhir";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin2tglakhir");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin3no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin3no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin3tgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin3tgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin3tglakhir";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin3tglakhir");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin4no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin4no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin4tgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin4tgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin4tglakhir";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin4tglakhir");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kukuhno";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kukuhno");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kukuhnip";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kukuhnip");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kukuhtgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kukuhtgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kukuh_jabat_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kukuh_jabat_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kukuhprinted";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kukuhprinted");
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
$arr['fName'] = "tmt";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tmt");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "customer_status_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("customer_status_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kembalitgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kembalitgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kembalioleh";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kembalioleh");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kartuprinted";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kartuprinted");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kembalinip";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kembalinip");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "penerimanm";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("penerimanm");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "penerimaalamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("penerimaalamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "penerimatgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("penerimatgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "catatnip";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("catatnip");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kirimtgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kirimtgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "batastgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("batastgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "petugas_jabat_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("petugas_jabat_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pencatat_jabat_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pencatat_jabat_id");
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
$arr['fName'] = "npwpd_old";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("npwpd_old");
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
//parent - 
	
	$value = $pageObject->showDBValue("parent", $data, $keylink);
	if($mainTableOwnerID=="parent")
		$ownerIdValue=$value;
	$xt->assign("parent_value",$value);
	if(!$pageObject->isAppearOnTabs("parent"))
		$xt->assign("parent_fieldblock",true);
	else
		$xt->assign("parent_tabfieldblock",true);
////////////////////////////////////////////
//npwpd - 
	
	$value = $pageObject->showDBValue("npwpd", $data, $keylink);
	if($mainTableOwnerID=="npwpd")
		$ownerIdValue=$value;
	$xt->assign("npwpd_value",$value);
	if(!$pageObject->isAppearOnTabs("npwpd"))
		$xt->assign("npwpd_fieldblock",true);
	else
		$xt->assign("npwpd_tabfieldblock",true);
////////////////////////////////////////////
//rp - 
	
	$value = $pageObject->showDBValue("rp", $data, $keylink);
	if($mainTableOwnerID=="rp")
		$ownerIdValue=$value;
	$xt->assign("rp_value",$value);
	if(!$pageObject->isAppearOnTabs("rp"))
		$xt->assign("rp_fieldblock",true);
	else
		$xt->assign("rp_tabfieldblock",true);
////////////////////////////////////////////
//pb - 
	
	$value = $pageObject->showDBValue("pb", $data, $keylink);
	if($mainTableOwnerID=="pb")
		$ownerIdValue=$value;
	$xt->assign("pb_value",$value);
	if(!$pageObject->isAppearOnTabs("pb"))
		$xt->assign("pb_fieldblock",true);
	else
		$xt->assign("pb_tabfieldblock",true);
////////////////////////////////////////////
//formno - 
	
	$value = $pageObject->showDBValue("formno", $data, $keylink);
	if($mainTableOwnerID=="formno")
		$ownerIdValue=$value;
	$xt->assign("formno_value",$value);
	if(!$pageObject->isAppearOnTabs("formno"))
		$xt->assign("formno_fieldblock",true);
	else
		$xt->assign("formno_tabfieldblock",true);
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
//nama - 
	
	$value = $pageObject->showDBValue("nama", $data, $keylink);
	if($mainTableOwnerID=="nama")
		$ownerIdValue=$value;
	$xt->assign("nama_value",$value);
	if(!$pageObject->isAppearOnTabs("nama"))
		$xt->assign("nama_fieldblock",true);
	else
		$xt->assign("nama_tabfieldblock",true);
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
//kabupaten - 
	
	$value = $pageObject->showDBValue("kabupaten", $data, $keylink);
	if($mainTableOwnerID=="kabupaten")
		$ownerIdValue=$value;
	$xt->assign("kabupaten_value",$value);
	if(!$pageObject->isAppearOnTabs("kabupaten"))
		$xt->assign("kabupaten_fieldblock",true);
	else
		$xt->assign("kabupaten_tabfieldblock",true);
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
//kodepos - 
	
	$value = $pageObject->showDBValue("kodepos", $data, $keylink);
	if($mainTableOwnerID=="kodepos")
		$ownerIdValue=$value;
	$xt->assign("kodepos_value",$value);
	if(!$pageObject->isAppearOnTabs("kodepos"))
		$xt->assign("kodepos_fieldblock",true);
	else
		$xt->assign("kodepos_tabfieldblock",true);
////////////////////////////////////////////
//telphone - 
	
	$value = $pageObject->showDBValue("telphone", $data, $keylink);
	if($mainTableOwnerID=="telphone")
		$ownerIdValue=$value;
	$xt->assign("telphone_value",$value);
	if(!$pageObject->isAppearOnTabs("telphone"))
		$xt->assign("telphone_fieldblock",true);
	else
		$xt->assign("telphone_tabfieldblock",true);
////////////////////////////////////////////
//wpnama - 
	
	$value = $pageObject->showDBValue("wpnama", $data, $keylink);
	if($mainTableOwnerID=="wpnama")
		$ownerIdValue=$value;
	$xt->assign("wpnama_value",$value);
	if(!$pageObject->isAppearOnTabs("wpnama"))
		$xt->assign("wpnama_fieldblock",true);
	else
		$xt->assign("wpnama_tabfieldblock",true);
////////////////////////////////////////////
//wpalamat - 
	
	$value = $pageObject->showDBValue("wpalamat", $data, $keylink);
	if($mainTableOwnerID=="wpalamat")
		$ownerIdValue=$value;
	$xt->assign("wpalamat_value",$value);
	if(!$pageObject->isAppearOnTabs("wpalamat"))
		$xt->assign("wpalamat_fieldblock",true);
	else
		$xt->assign("wpalamat_tabfieldblock",true);
////////////////////////////////////////////
//wpkelurahan - 
	
	$value = $pageObject->showDBValue("wpkelurahan", $data, $keylink);
	if($mainTableOwnerID=="wpkelurahan")
		$ownerIdValue=$value;
	$xt->assign("wpkelurahan_value",$value);
	if(!$pageObject->isAppearOnTabs("wpkelurahan"))
		$xt->assign("wpkelurahan_fieldblock",true);
	else
		$xt->assign("wpkelurahan_tabfieldblock",true);
////////////////////////////////////////////
//wpkecamatan - 
	
	$value = $pageObject->showDBValue("wpkecamatan", $data, $keylink);
	if($mainTableOwnerID=="wpkecamatan")
		$ownerIdValue=$value;
	$xt->assign("wpkecamatan_value",$value);
	if(!$pageObject->isAppearOnTabs("wpkecamatan"))
		$xt->assign("wpkecamatan_fieldblock",true);
	else
		$xt->assign("wpkecamatan_tabfieldblock",true);
////////////////////////////////////////////
//wpkabupaten - 
	
	$value = $pageObject->showDBValue("wpkabupaten", $data, $keylink);
	if($mainTableOwnerID=="wpkabupaten")
		$ownerIdValue=$value;
	$xt->assign("wpkabupaten_value",$value);
	if(!$pageObject->isAppearOnTabs("wpkabupaten"))
		$xt->assign("wpkabupaten_fieldblock",true);
	else
		$xt->assign("wpkabupaten_tabfieldblock",true);
////////////////////////////////////////////
//wptelp - 
	
	$value = $pageObject->showDBValue("wptelp", $data, $keylink);
	if($mainTableOwnerID=="wptelp")
		$ownerIdValue=$value;
	$xt->assign("wptelp_value",$value);
	if(!$pageObject->isAppearOnTabs("wptelp"))
		$xt->assign("wptelp_fieldblock",true);
	else
		$xt->assign("wptelp_tabfieldblock",true);
////////////////////////////////////////////
//wpkodepos - 
	
	$value = $pageObject->showDBValue("wpkodepos", $data, $keylink);
	if($mainTableOwnerID=="wpkodepos")
		$ownerIdValue=$value;
	$xt->assign("wpkodepos_value",$value);
	if(!$pageObject->isAppearOnTabs("wpkodepos"))
		$xt->assign("wpkodepos_fieldblock",true);
	else
		$xt->assign("wpkodepos_tabfieldblock",true);
////////////////////////////////////////////
//pnama - 
	
	$value = $pageObject->showDBValue("pnama", $data, $keylink);
	if($mainTableOwnerID=="pnama")
		$ownerIdValue=$value;
	$xt->assign("pnama_value",$value);
	if(!$pageObject->isAppearOnTabs("pnama"))
		$xt->assign("pnama_fieldblock",true);
	else
		$xt->assign("pnama_tabfieldblock",true);
////////////////////////////////////////////
//palamat - 
	
	$value = $pageObject->showDBValue("palamat", $data, $keylink);
	if($mainTableOwnerID=="palamat")
		$ownerIdValue=$value;
	$xt->assign("palamat_value",$value);
	if(!$pageObject->isAppearOnTabs("palamat"))
		$xt->assign("palamat_fieldblock",true);
	else
		$xt->assign("palamat_tabfieldblock",true);
////////////////////////////////////////////
//pkelurahan - 
	
	$value = $pageObject->showDBValue("pkelurahan", $data, $keylink);
	if($mainTableOwnerID=="pkelurahan")
		$ownerIdValue=$value;
	$xt->assign("pkelurahan_value",$value);
	if(!$pageObject->isAppearOnTabs("pkelurahan"))
		$xt->assign("pkelurahan_fieldblock",true);
	else
		$xt->assign("pkelurahan_tabfieldblock",true);
////////////////////////////////////////////
//pkecamatan - 
	
	$value = $pageObject->showDBValue("pkecamatan", $data, $keylink);
	if($mainTableOwnerID=="pkecamatan")
		$ownerIdValue=$value;
	$xt->assign("pkecamatan_value",$value);
	if(!$pageObject->isAppearOnTabs("pkecamatan"))
		$xt->assign("pkecamatan_fieldblock",true);
	else
		$xt->assign("pkecamatan_tabfieldblock",true);
////////////////////////////////////////////
//pkabupaten - 
	
	$value = $pageObject->showDBValue("pkabupaten", $data, $keylink);
	if($mainTableOwnerID=="pkabupaten")
		$ownerIdValue=$value;
	$xt->assign("pkabupaten_value",$value);
	if(!$pageObject->isAppearOnTabs("pkabupaten"))
		$xt->assign("pkabupaten_fieldblock",true);
	else
		$xt->assign("pkabupaten_tabfieldblock",true);
////////////////////////////////////////////
//ptelp - 
	
	$value = $pageObject->showDBValue("ptelp", $data, $keylink);
	if($mainTableOwnerID=="ptelp")
		$ownerIdValue=$value;
	$xt->assign("ptelp_value",$value);
	if(!$pageObject->isAppearOnTabs("ptelp"))
		$xt->assign("ptelp_fieldblock",true);
	else
		$xt->assign("ptelp_tabfieldblock",true);
////////////////////////////////////////////
//pkodepos - 
	
	$value = $pageObject->showDBValue("pkodepos", $data, $keylink);
	if($mainTableOwnerID=="pkodepos")
		$ownerIdValue=$value;
	$xt->assign("pkodepos_value",$value);
	if(!$pageObject->isAppearOnTabs("pkodepos"))
		$xt->assign("pkodepos_fieldblock",true);
	else
		$xt->assign("pkodepos_tabfieldblock",true);
////////////////////////////////////////////
//ijin1 - 
	
	$value = $pageObject->showDBValue("ijin1", $data, $keylink);
	if($mainTableOwnerID=="ijin1")
		$ownerIdValue=$value;
	$xt->assign("ijin1_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin1"))
		$xt->assign("ijin1_fieldblock",true);
	else
		$xt->assign("ijin1_tabfieldblock",true);
////////////////////////////////////////////
//ijin1no - 
	
	$value = $pageObject->showDBValue("ijin1no", $data, $keylink);
	if($mainTableOwnerID=="ijin1no")
		$ownerIdValue=$value;
	$xt->assign("ijin1no_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin1no"))
		$xt->assign("ijin1no_fieldblock",true);
	else
		$xt->assign("ijin1no_tabfieldblock",true);
////////////////////////////////////////////
//ijin1tgl - Short Date
	
	$value = $pageObject->showDBValue("ijin1tgl", $data, $keylink);
	if($mainTableOwnerID=="ijin1tgl")
		$ownerIdValue=$value;
	$xt->assign("ijin1tgl_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin1tgl"))
		$xt->assign("ijin1tgl_fieldblock",true);
	else
		$xt->assign("ijin1tgl_tabfieldblock",true);
////////////////////////////////////////////
//ijin1tglakhir - Short Date
	
	$value = $pageObject->showDBValue("ijin1tglakhir", $data, $keylink);
	if($mainTableOwnerID=="ijin1tglakhir")
		$ownerIdValue=$value;
	$xt->assign("ijin1tglakhir_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin1tglakhir"))
		$xt->assign("ijin1tglakhir_fieldblock",true);
	else
		$xt->assign("ijin1tglakhir_tabfieldblock",true);
////////////////////////////////////////////
//ijin2 - 
	
	$value = $pageObject->showDBValue("ijin2", $data, $keylink);
	if($mainTableOwnerID=="ijin2")
		$ownerIdValue=$value;
	$xt->assign("ijin2_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin2"))
		$xt->assign("ijin2_fieldblock",true);
	else
		$xt->assign("ijin2_tabfieldblock",true);
////////////////////////////////////////////
//ijin2no - 
	
	$value = $pageObject->showDBValue("ijin2no", $data, $keylink);
	if($mainTableOwnerID=="ijin2no")
		$ownerIdValue=$value;
	$xt->assign("ijin2no_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin2no"))
		$xt->assign("ijin2no_fieldblock",true);
	else
		$xt->assign("ijin2no_tabfieldblock",true);
////////////////////////////////////////////
//ijin2tgl - Short Date
	
	$value = $pageObject->showDBValue("ijin2tgl", $data, $keylink);
	if($mainTableOwnerID=="ijin2tgl")
		$ownerIdValue=$value;
	$xt->assign("ijin2tgl_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin2tgl"))
		$xt->assign("ijin2tgl_fieldblock",true);
	else
		$xt->assign("ijin2tgl_tabfieldblock",true);
////////////////////////////////////////////
//ijin2tglakhir - Short Date
	
	$value = $pageObject->showDBValue("ijin2tglakhir", $data, $keylink);
	if($mainTableOwnerID=="ijin2tglakhir")
		$ownerIdValue=$value;
	$xt->assign("ijin2tglakhir_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin2tglakhir"))
		$xt->assign("ijin2tglakhir_fieldblock",true);
	else
		$xt->assign("ijin2tglakhir_tabfieldblock",true);
////////////////////////////////////////////
//ijin3 - 
	
	$value = $pageObject->showDBValue("ijin3", $data, $keylink);
	if($mainTableOwnerID=="ijin3")
		$ownerIdValue=$value;
	$xt->assign("ijin3_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin3"))
		$xt->assign("ijin3_fieldblock",true);
	else
		$xt->assign("ijin3_tabfieldblock",true);
////////////////////////////////////////////
//ijin3no - 
	
	$value = $pageObject->showDBValue("ijin3no", $data, $keylink);
	if($mainTableOwnerID=="ijin3no")
		$ownerIdValue=$value;
	$xt->assign("ijin3no_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin3no"))
		$xt->assign("ijin3no_fieldblock",true);
	else
		$xt->assign("ijin3no_tabfieldblock",true);
////////////////////////////////////////////
//ijin3tgl - Short Date
	
	$value = $pageObject->showDBValue("ijin3tgl", $data, $keylink);
	if($mainTableOwnerID=="ijin3tgl")
		$ownerIdValue=$value;
	$xt->assign("ijin3tgl_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin3tgl"))
		$xt->assign("ijin3tgl_fieldblock",true);
	else
		$xt->assign("ijin3tgl_tabfieldblock",true);
////////////////////////////////////////////
//ijin3tglakhir - Short Date
	
	$value = $pageObject->showDBValue("ijin3tglakhir", $data, $keylink);
	if($mainTableOwnerID=="ijin3tglakhir")
		$ownerIdValue=$value;
	$xt->assign("ijin3tglakhir_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin3tglakhir"))
		$xt->assign("ijin3tglakhir_fieldblock",true);
	else
		$xt->assign("ijin3tglakhir_tabfieldblock",true);
////////////////////////////////////////////
//ijin4 - 
	
	$value = $pageObject->showDBValue("ijin4", $data, $keylink);
	if($mainTableOwnerID=="ijin4")
		$ownerIdValue=$value;
	$xt->assign("ijin4_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin4"))
		$xt->assign("ijin4_fieldblock",true);
	else
		$xt->assign("ijin4_tabfieldblock",true);
////////////////////////////////////////////
//ijin4no - 
	
	$value = $pageObject->showDBValue("ijin4no", $data, $keylink);
	if($mainTableOwnerID=="ijin4no")
		$ownerIdValue=$value;
	$xt->assign("ijin4no_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin4no"))
		$xt->assign("ijin4no_fieldblock",true);
	else
		$xt->assign("ijin4no_tabfieldblock",true);
////////////////////////////////////////////
//ijin4tgl - Short Date
	
	$value = $pageObject->showDBValue("ijin4tgl", $data, $keylink);
	if($mainTableOwnerID=="ijin4tgl")
		$ownerIdValue=$value;
	$xt->assign("ijin4tgl_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin4tgl"))
		$xt->assign("ijin4tgl_fieldblock",true);
	else
		$xt->assign("ijin4tgl_tabfieldblock",true);
////////////////////////////////////////////
//ijin4tglakhir - Short Date
	
	$value = $pageObject->showDBValue("ijin4tglakhir", $data, $keylink);
	if($mainTableOwnerID=="ijin4tglakhir")
		$ownerIdValue=$value;
	$xt->assign("ijin4tglakhir_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin4tglakhir"))
		$xt->assign("ijin4tglakhir_fieldblock",true);
	else
		$xt->assign("ijin4tglakhir_tabfieldblock",true);
////////////////////////////////////////////
//kukuhno - 
	
	$value = $pageObject->showDBValue("kukuhno", $data, $keylink);
	if($mainTableOwnerID=="kukuhno")
		$ownerIdValue=$value;
	$xt->assign("kukuhno_value",$value);
	if(!$pageObject->isAppearOnTabs("kukuhno"))
		$xt->assign("kukuhno_fieldblock",true);
	else
		$xt->assign("kukuhno_tabfieldblock",true);
////////////////////////////////////////////
//kukuhnip - 
	
	$value = $pageObject->showDBValue("kukuhnip", $data, $keylink);
	if($mainTableOwnerID=="kukuhnip")
		$ownerIdValue=$value;
	$xt->assign("kukuhnip_value",$value);
	if(!$pageObject->isAppearOnTabs("kukuhnip"))
		$xt->assign("kukuhnip_fieldblock",true);
	else
		$xt->assign("kukuhnip_tabfieldblock",true);
////////////////////////////////////////////
//kukuhtgl - Short Date
	
	$value = $pageObject->showDBValue("kukuhtgl", $data, $keylink);
	if($mainTableOwnerID=="kukuhtgl")
		$ownerIdValue=$value;
	$xt->assign("kukuhtgl_value",$value);
	if(!$pageObject->isAppearOnTabs("kukuhtgl"))
		$xt->assign("kukuhtgl_fieldblock",true);
	else
		$xt->assign("kukuhtgl_tabfieldblock",true);
////////////////////////////////////////////
//kukuh_jabat_id - 
	
	$value = $pageObject->showDBValue("kukuh_jabat_id", $data, $keylink);
	if($mainTableOwnerID=="kukuh_jabat_id")
		$ownerIdValue=$value;
	$xt->assign("kukuh_jabat_id_value",$value);
	if(!$pageObject->isAppearOnTabs("kukuh_jabat_id"))
		$xt->assign("kukuh_jabat_id_fieldblock",true);
	else
		$xt->assign("kukuh_jabat_id_tabfieldblock",true);
////////////////////////////////////////////
//kukuhprinted - 
	
	$value = $pageObject->showDBValue("kukuhprinted", $data, $keylink);
	if($mainTableOwnerID=="kukuhprinted")
		$ownerIdValue=$value;
	$xt->assign("kukuhprinted_value",$value);
	if(!$pageObject->isAppearOnTabs("kukuhprinted"))
		$xt->assign("kukuhprinted_fieldblock",true);
	else
		$xt->assign("kukuhprinted_tabfieldblock",true);
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
//kembalitgl - Short Date
	
	$value = $pageObject->showDBValue("kembalitgl", $data, $keylink);
	if($mainTableOwnerID=="kembalitgl")
		$ownerIdValue=$value;
	$xt->assign("kembalitgl_value",$value);
	if(!$pageObject->isAppearOnTabs("kembalitgl"))
		$xt->assign("kembalitgl_fieldblock",true);
	else
		$xt->assign("kembalitgl_tabfieldblock",true);
////////////////////////////////////////////
//kembalioleh - 
	
	$value = $pageObject->showDBValue("kembalioleh", $data, $keylink);
	if($mainTableOwnerID=="kembalioleh")
		$ownerIdValue=$value;
	$xt->assign("kembalioleh_value",$value);
	if(!$pageObject->isAppearOnTabs("kembalioleh"))
		$xt->assign("kembalioleh_fieldblock",true);
	else
		$xt->assign("kembalioleh_tabfieldblock",true);
////////////////////////////////////////////
//kartuprinted - 
	
	$value = $pageObject->showDBValue("kartuprinted", $data, $keylink);
	if($mainTableOwnerID=="kartuprinted")
		$ownerIdValue=$value;
	$xt->assign("kartuprinted_value",$value);
	if(!$pageObject->isAppearOnTabs("kartuprinted"))
		$xt->assign("kartuprinted_fieldblock",true);
	else
		$xt->assign("kartuprinted_tabfieldblock",true);
////////////////////////////////////////////
//kembalinip - 
	
	$value = $pageObject->showDBValue("kembalinip", $data, $keylink);
	if($mainTableOwnerID=="kembalinip")
		$ownerIdValue=$value;
	$xt->assign("kembalinip_value",$value);
	if(!$pageObject->isAppearOnTabs("kembalinip"))
		$xt->assign("kembalinip_fieldblock",true);
	else
		$xt->assign("kembalinip_tabfieldblock",true);
////////////////////////////////////////////
//penerimanm - 
	
	$value = $pageObject->showDBValue("penerimanm", $data, $keylink);
	if($mainTableOwnerID=="penerimanm")
		$ownerIdValue=$value;
	$xt->assign("penerimanm_value",$value);
	if(!$pageObject->isAppearOnTabs("penerimanm"))
		$xt->assign("penerimanm_fieldblock",true);
	else
		$xt->assign("penerimanm_tabfieldblock",true);
////////////////////////////////////////////
//penerimaalamat - 
	
	$value = $pageObject->showDBValue("penerimaalamat", $data, $keylink);
	if($mainTableOwnerID=="penerimaalamat")
		$ownerIdValue=$value;
	$xt->assign("penerimaalamat_value",$value);
	if(!$pageObject->isAppearOnTabs("penerimaalamat"))
		$xt->assign("penerimaalamat_fieldblock",true);
	else
		$xt->assign("penerimaalamat_tabfieldblock",true);
////////////////////////////////////////////
//penerimatgl - Short Date
	
	$value = $pageObject->showDBValue("penerimatgl", $data, $keylink);
	if($mainTableOwnerID=="penerimatgl")
		$ownerIdValue=$value;
	$xt->assign("penerimatgl_value",$value);
	if(!$pageObject->isAppearOnTabs("penerimatgl"))
		$xt->assign("penerimatgl_fieldblock",true);
	else
		$xt->assign("penerimatgl_tabfieldblock",true);
////////////////////////////////////////////
//catatnip - 
	
	$value = $pageObject->showDBValue("catatnip", $data, $keylink);
	if($mainTableOwnerID=="catatnip")
		$ownerIdValue=$value;
	$xt->assign("catatnip_value",$value);
	if(!$pageObject->isAppearOnTabs("catatnip"))
		$xt->assign("catatnip_fieldblock",true);
	else
		$xt->assign("catatnip_tabfieldblock",true);
////////////////////////////////////////////
//kirimtgl - Short Date
	
	$value = $pageObject->showDBValue("kirimtgl", $data, $keylink);
	if($mainTableOwnerID=="kirimtgl")
		$ownerIdValue=$value;
	$xt->assign("kirimtgl_value",$value);
	if(!$pageObject->isAppearOnTabs("kirimtgl"))
		$xt->assign("kirimtgl_fieldblock",true);
	else
		$xt->assign("kirimtgl_tabfieldblock",true);
////////////////////////////////////////////
//batastgl - Short Date
	
	$value = $pageObject->showDBValue("batastgl", $data, $keylink);
	if($mainTableOwnerID=="batastgl")
		$ownerIdValue=$value;
	$xt->assign("batastgl_value",$value);
	if(!$pageObject->isAppearOnTabs("batastgl"))
		$xt->assign("batastgl_fieldblock",true);
	else
		$xt->assign("batastgl_tabfieldblock",true);
////////////////////////////////////////////
//petugas_jabat_id - 
	
	$value = $pageObject->showDBValue("petugas_jabat_id", $data, $keylink);
	if($mainTableOwnerID=="petugas_jabat_id")
		$ownerIdValue=$value;
	$xt->assign("petugas_jabat_id_value",$value);
	if(!$pageObject->isAppearOnTabs("petugas_jabat_id"))
		$xt->assign("petugas_jabat_id_fieldblock",true);
	else
		$xt->assign("petugas_jabat_id_tabfieldblock",true);
////////////////////////////////////////////
//pencatat_jabat_id - 
	
	$value = $pageObject->showDBValue("pencatat_jabat_id", $data, $keylink);
	if($mainTableOwnerID=="pencatat_jabat_id")
		$ownerIdValue=$value;
	$xt->assign("pencatat_jabat_id_value",$value);
	if(!$pageObject->isAppearOnTabs("pencatat_jabat_id"))
		$xt->assign("pencatat_jabat_id_fieldblock",true);
	else
		$xt->assign("pencatat_jabat_id_tabfieldblock",true);
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
//npwpd_old - 
	
	$value = $pageObject->showDBValue("npwpd_old", $data, $keylink);
	if($mainTableOwnerID=="npwpd_old")
		$ownerIdValue=$value;
	$xt->assign("npwpd_old_value",$value);
	if(!$pageObject->isAppearOnTabs("npwpd_old"))
		$xt->assign("npwpd_old_fieldblock",true);
	else
		$xt->assign("npwpd_old_tabfieldblock",true);
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
		$options['masterTable'] = "pad.pad_customer";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "pad.pad_customer";
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
	$strTableName = "pad.pad_customer";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='pad_pad_customer_edit.php?".$editlink."'\"");

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
