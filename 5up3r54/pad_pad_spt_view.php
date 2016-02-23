<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_spt_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_spt_view"] = $layout;




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
	header("Location: pad_pad_spt_list.php?a=return");
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
$arr['fName'] = "tahun";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tahun");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "sptno";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("sptno");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "customer_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("customer_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "customer_usaha_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("customer_usaha_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "rekening_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("rekening_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pajak_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pajak_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "type_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("type_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "so";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("so");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "masadari";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("masadari");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "masasd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("masasd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jatuhtempotgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jatuhtempotgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_bayarid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_bayarid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "minimal_omset";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("minimal_omset");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "dasar";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("dasar");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tarif";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tarif");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "denda";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("denda");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bunga";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bunga");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "setoran";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("setoran");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kenaikan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kenaikan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kompensasi";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kompensasi");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "lain2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("lain2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pajak_terhutang";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pajak_terhutang");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "air_manfaat_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("air_manfaat_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "air_zona_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("air_zona_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "meteran_awal";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("meteran_awal");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "meteran_akhir";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("meteran_akhir");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "volume";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("volume");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "satuan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("satuan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_panjang";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_panjang");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_lebar";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_lebar");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_muka";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_muka");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_banyak";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_banyak");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_luas";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_luas");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_tarifid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_tarifid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_kontrak";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_kontrak");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_lama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_lama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_jalan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_jalan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_jalanklas_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_jalanklas_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_lokasi";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_lokasi");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_judul";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_judul");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_kelurahan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_kelurahan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_lokasi_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_lokasi_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_calculated";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_calculated");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_nsr";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_nsr");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_nsrno";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_nsrno");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_nsrtgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_nsrtgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_nsl_kecamatan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_nsl_kecamatan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_nsl_type_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_nsl_type_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_nsl_nilai";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_nsl_nilai");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "notes";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("notes");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "unit_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("unit_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "enabled";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("enabled");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "created";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("created");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "create_uid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("create_uid");
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
$arr['fName'] = "terimanip";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("terimanip");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "terimatgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("terimatgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kirimtgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kirimtgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "isprint_dc";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("isprint_dc");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_nsr_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_nsr_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_lokasi_pasang_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_lokasi_pasang_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_lokasi_pasang_val";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_lokasi_pasang_val");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_jalanklas_val";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_jalanklas_val");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_sudut_pandang_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_sudut_pandang_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_sudut_pandang_val";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_sudut_pandang_val");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_tinggi";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_tinggi");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_njop";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_njop");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_status";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_status");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_njop_ketinggian";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_njop_ketinggian");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "status_pembayaran";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("status_pembayaran");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "rek_no_paneng";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("rek_no_paneng");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "sptno_lengkap";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("sptno_lengkap");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "sptno_lama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("sptno_lama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_nama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "r_alamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("r_alamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset6");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset7";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset7");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset8";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset8");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset9";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset9");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset10";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset10");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset11";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset11");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset12";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset12");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset13";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset13");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset14";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset14");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset15";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset15");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset16";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset16");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset17";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset17");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset18";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset18");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset19";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset19");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset20";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset20");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset21";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset21");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset22";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset22");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset23";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset23");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset24";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset24");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset25";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset25");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset26";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset26");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset27";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset27");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset28";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset28");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset29";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset29");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset30";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset30");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset31";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset31");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan6");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan7";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan7");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan8";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan8");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan9";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan9");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan10";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan10");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan11";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan11");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan12";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan12");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan13";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan13");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan14";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan14");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan15";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan15");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan16";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan16");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan17";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan17");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan18";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan18");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan19";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan19");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan20";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan20");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan21";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan21");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan22";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan22");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan23";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan23");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan24";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan24");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan25";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan25");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan26";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan26");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan27";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan27");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan28";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan28");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan29";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan29");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan30";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan30");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan31";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan31");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "doc_no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("doc_no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "cara_bayar";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("cara_bayar");
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
$arr['fName'] = "golongan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("golongan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "omset_lain";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("omset_lain");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan_lain";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan_lain");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin_no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin_no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jenis_masa";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jenis_masa");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "skpd_lama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("skpd_lama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "proses";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("proses");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tanggal_validasi";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tanggal_validasi");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "no_telp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("no_telp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "usaha_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("usaha_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "multiple";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("multiple");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan_telat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan_telat");
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
//tahun - 
	
	$value = $pageObject->showDBValue("tahun", $data, $keylink);
	if($mainTableOwnerID=="tahun")
		$ownerIdValue=$value;
	$xt->assign("tahun_value",$value);
	if(!$pageObject->isAppearOnTabs("tahun"))
		$xt->assign("tahun_fieldblock",true);
	else
		$xt->assign("tahun_tabfieldblock",true);
////////////////////////////////////////////
//sptno - 
	
	$value = $pageObject->showDBValue("sptno", $data, $keylink);
	if($mainTableOwnerID=="sptno")
		$ownerIdValue=$value;
	$xt->assign("sptno_value",$value);
	if(!$pageObject->isAppearOnTabs("sptno"))
		$xt->assign("sptno_fieldblock",true);
	else
		$xt->assign("sptno_tabfieldblock",true);
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
//customer_usaha_id - 
	
	$value = $pageObject->showDBValue("customer_usaha_id", $data, $keylink);
	if($mainTableOwnerID=="customer_usaha_id")
		$ownerIdValue=$value;
	$xt->assign("customer_usaha_id_value",$value);
	if(!$pageObject->isAppearOnTabs("customer_usaha_id"))
		$xt->assign("customer_usaha_id_fieldblock",true);
	else
		$xt->assign("customer_usaha_id_tabfieldblock",true);
////////////////////////////////////////////
//rekening_id - 
	
	$value = $pageObject->showDBValue("rekening_id", $data, $keylink);
	if($mainTableOwnerID=="rekening_id")
		$ownerIdValue=$value;
	$xt->assign("rekening_id_value",$value);
	if(!$pageObject->isAppearOnTabs("rekening_id"))
		$xt->assign("rekening_id_fieldblock",true);
	else
		$xt->assign("rekening_id_tabfieldblock",true);
////////////////////////////////////////////
//pajak_id - 
	
	$value = $pageObject->showDBValue("pajak_id", $data, $keylink);
	if($mainTableOwnerID=="pajak_id")
		$ownerIdValue=$value;
	$xt->assign("pajak_id_value",$value);
	if(!$pageObject->isAppearOnTabs("pajak_id"))
		$xt->assign("pajak_id_fieldblock",true);
	else
		$xt->assign("pajak_id_tabfieldblock",true);
////////////////////////////////////////////
//type_id - 
	
	$value = $pageObject->showDBValue("type_id", $data, $keylink);
	if($mainTableOwnerID=="type_id")
		$ownerIdValue=$value;
	$xt->assign("type_id_value",$value);
	if(!$pageObject->isAppearOnTabs("type_id"))
		$xt->assign("type_id_fieldblock",true);
	else
		$xt->assign("type_id_tabfieldblock",true);
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
//masadari - Short Date
	
	$value = $pageObject->showDBValue("masadari", $data, $keylink);
	if($mainTableOwnerID=="masadari")
		$ownerIdValue=$value;
	$xt->assign("masadari_value",$value);
	if(!$pageObject->isAppearOnTabs("masadari"))
		$xt->assign("masadari_fieldblock",true);
	else
		$xt->assign("masadari_tabfieldblock",true);
////////////////////////////////////////////
//masasd - Short Date
	
	$value = $pageObject->showDBValue("masasd", $data, $keylink);
	if($mainTableOwnerID=="masasd")
		$ownerIdValue=$value;
	$xt->assign("masasd_value",$value);
	if(!$pageObject->isAppearOnTabs("masasd"))
		$xt->assign("masasd_fieldblock",true);
	else
		$xt->assign("masasd_tabfieldblock",true);
////////////////////////////////////////////
//jatuhtempotgl - Short Date
	
	$value = $pageObject->showDBValue("jatuhtempotgl", $data, $keylink);
	if($mainTableOwnerID=="jatuhtempotgl")
		$ownerIdValue=$value;
	$xt->assign("jatuhtempotgl_value",$value);
	if(!$pageObject->isAppearOnTabs("jatuhtempotgl"))
		$xt->assign("jatuhtempotgl_fieldblock",true);
	else
		$xt->assign("jatuhtempotgl_tabfieldblock",true);
////////////////////////////////////////////
//r_bayarid - 
	
	$value = $pageObject->showDBValue("r_bayarid", $data, $keylink);
	if($mainTableOwnerID=="r_bayarid")
		$ownerIdValue=$value;
	$xt->assign("r_bayarid_value",$value);
	if(!$pageObject->isAppearOnTabs("r_bayarid"))
		$xt->assign("r_bayarid_fieldblock",true);
	else
		$xt->assign("r_bayarid_tabfieldblock",true);
////////////////////////////////////////////
//minimal_omset - Number
	
	$value = $pageObject->showDBValue("minimal_omset", $data, $keylink);
	if($mainTableOwnerID=="minimal_omset")
		$ownerIdValue=$value;
	$xt->assign("minimal_omset_value",$value);
	if(!$pageObject->isAppearOnTabs("minimal_omset"))
		$xt->assign("minimal_omset_fieldblock",true);
	else
		$xt->assign("minimal_omset_tabfieldblock",true);
////////////////////////////////////////////
//dasar - Number
	
	$value = $pageObject->showDBValue("dasar", $data, $keylink);
	if($mainTableOwnerID=="dasar")
		$ownerIdValue=$value;
	$xt->assign("dasar_value",$value);
	if(!$pageObject->isAppearOnTabs("dasar"))
		$xt->assign("dasar_fieldblock",true);
	else
		$xt->assign("dasar_tabfieldblock",true);
////////////////////////////////////////////
//tarif - Number
	
	$value = $pageObject->showDBValue("tarif", $data, $keylink);
	if($mainTableOwnerID=="tarif")
		$ownerIdValue=$value;
	$xt->assign("tarif_value",$value);
	if(!$pageObject->isAppearOnTabs("tarif"))
		$xt->assign("tarif_fieldblock",true);
	else
		$xt->assign("tarif_tabfieldblock",true);
////////////////////////////////////////////
//denda - Number
	
	$value = $pageObject->showDBValue("denda", $data, $keylink);
	if($mainTableOwnerID=="denda")
		$ownerIdValue=$value;
	$xt->assign("denda_value",$value);
	if(!$pageObject->isAppearOnTabs("denda"))
		$xt->assign("denda_fieldblock",true);
	else
		$xt->assign("denda_tabfieldblock",true);
////////////////////////////////////////////
//bunga - Number
	
	$value = $pageObject->showDBValue("bunga", $data, $keylink);
	if($mainTableOwnerID=="bunga")
		$ownerIdValue=$value;
	$xt->assign("bunga_value",$value);
	if(!$pageObject->isAppearOnTabs("bunga"))
		$xt->assign("bunga_fieldblock",true);
	else
		$xt->assign("bunga_tabfieldblock",true);
////////////////////////////////////////////
//setoran - Number
	
	$value = $pageObject->showDBValue("setoran", $data, $keylink);
	if($mainTableOwnerID=="setoran")
		$ownerIdValue=$value;
	$xt->assign("setoran_value",$value);
	if(!$pageObject->isAppearOnTabs("setoran"))
		$xt->assign("setoran_fieldblock",true);
	else
		$xt->assign("setoran_tabfieldblock",true);
////////////////////////////////////////////
//kenaikan - Number
	
	$value = $pageObject->showDBValue("kenaikan", $data, $keylink);
	if($mainTableOwnerID=="kenaikan")
		$ownerIdValue=$value;
	$xt->assign("kenaikan_value",$value);
	if(!$pageObject->isAppearOnTabs("kenaikan"))
		$xt->assign("kenaikan_fieldblock",true);
	else
		$xt->assign("kenaikan_tabfieldblock",true);
////////////////////////////////////////////
//kompensasi - Number
	
	$value = $pageObject->showDBValue("kompensasi", $data, $keylink);
	if($mainTableOwnerID=="kompensasi")
		$ownerIdValue=$value;
	$xt->assign("kompensasi_value",$value);
	if(!$pageObject->isAppearOnTabs("kompensasi"))
		$xt->assign("kompensasi_fieldblock",true);
	else
		$xt->assign("kompensasi_tabfieldblock",true);
////////////////////////////////////////////
//lain2 - Number
	
	$value = $pageObject->showDBValue("lain2", $data, $keylink);
	if($mainTableOwnerID=="lain2")
		$ownerIdValue=$value;
	$xt->assign("lain2_value",$value);
	if(!$pageObject->isAppearOnTabs("lain2"))
		$xt->assign("lain2_fieldblock",true);
	else
		$xt->assign("lain2_tabfieldblock",true);
////////////////////////////////////////////
//pajak_terhutang - 
	
	$value = $pageObject->showDBValue("pajak_terhutang", $data, $keylink);
	if($mainTableOwnerID=="pajak_terhutang")
		$ownerIdValue=$value;
	$xt->assign("pajak_terhutang_value",$value);
	if(!$pageObject->isAppearOnTabs("pajak_terhutang"))
		$xt->assign("pajak_terhutang_fieldblock",true);
	else
		$xt->assign("pajak_terhutang_tabfieldblock",true);
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
//meteran_awal - 
	
	$value = $pageObject->showDBValue("meteran_awal", $data, $keylink);
	if($mainTableOwnerID=="meteran_awal")
		$ownerIdValue=$value;
	$xt->assign("meteran_awal_value",$value);
	if(!$pageObject->isAppearOnTabs("meteran_awal"))
		$xt->assign("meteran_awal_fieldblock",true);
	else
		$xt->assign("meteran_awal_tabfieldblock",true);
////////////////////////////////////////////
//meteran_akhir - 
	
	$value = $pageObject->showDBValue("meteran_akhir", $data, $keylink);
	if($mainTableOwnerID=="meteran_akhir")
		$ownerIdValue=$value;
	$xt->assign("meteran_akhir_value",$value);
	if(!$pageObject->isAppearOnTabs("meteran_akhir"))
		$xt->assign("meteran_akhir_fieldblock",true);
	else
		$xt->assign("meteran_akhir_tabfieldblock",true);
////////////////////////////////////////////
//volume - Number
	
	$value = $pageObject->showDBValue("volume", $data, $keylink);
	if($mainTableOwnerID=="volume")
		$ownerIdValue=$value;
	$xt->assign("volume_value",$value);
	if(!$pageObject->isAppearOnTabs("volume"))
		$xt->assign("volume_fieldblock",true);
	else
		$xt->assign("volume_tabfieldblock",true);
////////////////////////////////////////////
//satuan - 
	
	$value = $pageObject->showDBValue("satuan", $data, $keylink);
	if($mainTableOwnerID=="satuan")
		$ownerIdValue=$value;
	$xt->assign("satuan_value",$value);
	if(!$pageObject->isAppearOnTabs("satuan"))
		$xt->assign("satuan_fieldblock",true);
	else
		$xt->assign("satuan_tabfieldblock",true);
////////////////////////////////////////////
//r_panjang - Number
	
	$value = $pageObject->showDBValue("r_panjang", $data, $keylink);
	if($mainTableOwnerID=="r_panjang")
		$ownerIdValue=$value;
	$xt->assign("r_panjang_value",$value);
	if(!$pageObject->isAppearOnTabs("r_panjang"))
		$xt->assign("r_panjang_fieldblock",true);
	else
		$xt->assign("r_panjang_tabfieldblock",true);
////////////////////////////////////////////
//r_lebar - Number
	
	$value = $pageObject->showDBValue("r_lebar", $data, $keylink);
	if($mainTableOwnerID=="r_lebar")
		$ownerIdValue=$value;
	$xt->assign("r_lebar_value",$value);
	if(!$pageObject->isAppearOnTabs("r_lebar"))
		$xt->assign("r_lebar_fieldblock",true);
	else
		$xt->assign("r_lebar_tabfieldblock",true);
////////////////////////////////////////////
//r_muka - Number
	
	$value = $pageObject->showDBValue("r_muka", $data, $keylink);
	if($mainTableOwnerID=="r_muka")
		$ownerIdValue=$value;
	$xt->assign("r_muka_value",$value);
	if(!$pageObject->isAppearOnTabs("r_muka"))
		$xt->assign("r_muka_fieldblock",true);
	else
		$xt->assign("r_muka_tabfieldblock",true);
////////////////////////////////////////////
//r_banyak - Number
	
	$value = $pageObject->showDBValue("r_banyak", $data, $keylink);
	if($mainTableOwnerID=="r_banyak")
		$ownerIdValue=$value;
	$xt->assign("r_banyak_value",$value);
	if(!$pageObject->isAppearOnTabs("r_banyak"))
		$xt->assign("r_banyak_fieldblock",true);
	else
		$xt->assign("r_banyak_tabfieldblock",true);
////////////////////////////////////////////
//r_luas - Number
	
	$value = $pageObject->showDBValue("r_luas", $data, $keylink);
	if($mainTableOwnerID=="r_luas")
		$ownerIdValue=$value;
	$xt->assign("r_luas_value",$value);
	if(!$pageObject->isAppearOnTabs("r_luas"))
		$xt->assign("r_luas_fieldblock",true);
	else
		$xt->assign("r_luas_tabfieldblock",true);
////////////////////////////////////////////
//r_tarifid - 
	
	$value = $pageObject->showDBValue("r_tarifid", $data, $keylink);
	if($mainTableOwnerID=="r_tarifid")
		$ownerIdValue=$value;
	$xt->assign("r_tarifid_value",$value);
	if(!$pageObject->isAppearOnTabs("r_tarifid"))
		$xt->assign("r_tarifid_fieldblock",true);
	else
		$xt->assign("r_tarifid_tabfieldblock",true);
////////////////////////////////////////////
//r_kontrak - Number
	
	$value = $pageObject->showDBValue("r_kontrak", $data, $keylink);
	if($mainTableOwnerID=="r_kontrak")
		$ownerIdValue=$value;
	$xt->assign("r_kontrak_value",$value);
	if(!$pageObject->isAppearOnTabs("r_kontrak"))
		$xt->assign("r_kontrak_fieldblock",true);
	else
		$xt->assign("r_kontrak_tabfieldblock",true);
////////////////////////////////////////////
//r_lama - 
	
	$value = $pageObject->showDBValue("r_lama", $data, $keylink);
	if($mainTableOwnerID=="r_lama")
		$ownerIdValue=$value;
	$xt->assign("r_lama_value",$value);
	if(!$pageObject->isAppearOnTabs("r_lama"))
		$xt->assign("r_lama_fieldblock",true);
	else
		$xt->assign("r_lama_tabfieldblock",true);
////////////////////////////////////////////
//r_jalan_id - 
	
	$value = $pageObject->showDBValue("r_jalan_id", $data, $keylink);
	if($mainTableOwnerID=="r_jalan_id")
		$ownerIdValue=$value;
	$xt->assign("r_jalan_id_value",$value);
	if(!$pageObject->isAppearOnTabs("r_jalan_id"))
		$xt->assign("r_jalan_id_fieldblock",true);
	else
		$xt->assign("r_jalan_id_tabfieldblock",true);
////////////////////////////////////////////
//r_jalanklas_id - 
	
	$value = $pageObject->showDBValue("r_jalanklas_id", $data, $keylink);
	if($mainTableOwnerID=="r_jalanklas_id")
		$ownerIdValue=$value;
	$xt->assign("r_jalanklas_id_value",$value);
	if(!$pageObject->isAppearOnTabs("r_jalanklas_id"))
		$xt->assign("r_jalanklas_id_fieldblock",true);
	else
		$xt->assign("r_jalanklas_id_tabfieldblock",true);
////////////////////////////////////////////
//r_lokasi - 
	
	$value = $pageObject->showDBValue("r_lokasi", $data, $keylink);
	if($mainTableOwnerID=="r_lokasi")
		$ownerIdValue=$value;
	$xt->assign("r_lokasi_value",$value);
	if(!$pageObject->isAppearOnTabs("r_lokasi"))
		$xt->assign("r_lokasi_fieldblock",true);
	else
		$xt->assign("r_lokasi_tabfieldblock",true);
////////////////////////////////////////////
//r_judul - 
	
	$value = $pageObject->showDBValue("r_judul", $data, $keylink);
	if($mainTableOwnerID=="r_judul")
		$ownerIdValue=$value;
	$xt->assign("r_judul_value",$value);
	if(!$pageObject->isAppearOnTabs("r_judul"))
		$xt->assign("r_judul_fieldblock",true);
	else
		$xt->assign("r_judul_tabfieldblock",true);
////////////////////////////////////////////
//r_kelurahan_id - 
	
	$value = $pageObject->showDBValue("r_kelurahan_id", $data, $keylink);
	if($mainTableOwnerID=="r_kelurahan_id")
		$ownerIdValue=$value;
	$xt->assign("r_kelurahan_id_value",$value);
	if(!$pageObject->isAppearOnTabs("r_kelurahan_id"))
		$xt->assign("r_kelurahan_id_fieldblock",true);
	else
		$xt->assign("r_kelurahan_id_tabfieldblock",true);
////////////////////////////////////////////
//r_lokasi_id - 
	
	$value = $pageObject->showDBValue("r_lokasi_id", $data, $keylink);
	if($mainTableOwnerID=="r_lokasi_id")
		$ownerIdValue=$value;
	$xt->assign("r_lokasi_id_value",$value);
	if(!$pageObject->isAppearOnTabs("r_lokasi_id"))
		$xt->assign("r_lokasi_id_fieldblock",true);
	else
		$xt->assign("r_lokasi_id_tabfieldblock",true);
////////////////////////////////////////////
//r_calculated - Number
	
	$value = $pageObject->showDBValue("r_calculated", $data, $keylink);
	if($mainTableOwnerID=="r_calculated")
		$ownerIdValue=$value;
	$xt->assign("r_calculated_value",$value);
	if(!$pageObject->isAppearOnTabs("r_calculated"))
		$xt->assign("r_calculated_fieldblock",true);
	else
		$xt->assign("r_calculated_tabfieldblock",true);
////////////////////////////////////////////
//r_nsr - Number
	
	$value = $pageObject->showDBValue("r_nsr", $data, $keylink);
	if($mainTableOwnerID=="r_nsr")
		$ownerIdValue=$value;
	$xt->assign("r_nsr_value",$value);
	if(!$pageObject->isAppearOnTabs("r_nsr"))
		$xt->assign("r_nsr_fieldblock",true);
	else
		$xt->assign("r_nsr_tabfieldblock",true);
////////////////////////////////////////////
//r_nsrno - 
	
	$value = $pageObject->showDBValue("r_nsrno", $data, $keylink);
	if($mainTableOwnerID=="r_nsrno")
		$ownerIdValue=$value;
	$xt->assign("r_nsrno_value",$value);
	if(!$pageObject->isAppearOnTabs("r_nsrno"))
		$xt->assign("r_nsrno_fieldblock",true);
	else
		$xt->assign("r_nsrno_tabfieldblock",true);
////////////////////////////////////////////
//r_nsrtgl - Short Date
	
	$value = $pageObject->showDBValue("r_nsrtgl", $data, $keylink);
	if($mainTableOwnerID=="r_nsrtgl")
		$ownerIdValue=$value;
	$xt->assign("r_nsrtgl_value",$value);
	if(!$pageObject->isAppearOnTabs("r_nsrtgl"))
		$xt->assign("r_nsrtgl_fieldblock",true);
	else
		$xt->assign("r_nsrtgl_tabfieldblock",true);
////////////////////////////////////////////
//r_nsl_kecamatan_id - 
	
	$value = $pageObject->showDBValue("r_nsl_kecamatan_id", $data, $keylink);
	if($mainTableOwnerID=="r_nsl_kecamatan_id")
		$ownerIdValue=$value;
	$xt->assign("r_nsl_kecamatan_id_value",$value);
	if(!$pageObject->isAppearOnTabs("r_nsl_kecamatan_id"))
		$xt->assign("r_nsl_kecamatan_id_fieldblock",true);
	else
		$xt->assign("r_nsl_kecamatan_id_tabfieldblock",true);
////////////////////////////////////////////
//r_nsl_type_id - 
	
	$value = $pageObject->showDBValue("r_nsl_type_id", $data, $keylink);
	if($mainTableOwnerID=="r_nsl_type_id")
		$ownerIdValue=$value;
	$xt->assign("r_nsl_type_id_value",$value);
	if(!$pageObject->isAppearOnTabs("r_nsl_type_id"))
		$xt->assign("r_nsl_type_id_fieldblock",true);
	else
		$xt->assign("r_nsl_type_id_tabfieldblock",true);
////////////////////////////////////////////
//r_nsl_nilai - Number
	
	$value = $pageObject->showDBValue("r_nsl_nilai", $data, $keylink);
	if($mainTableOwnerID=="r_nsl_nilai")
		$ownerIdValue=$value;
	$xt->assign("r_nsl_nilai_value",$value);
	if(!$pageObject->isAppearOnTabs("r_nsl_nilai"))
		$xt->assign("r_nsl_nilai_fieldblock",true);
	else
		$xt->assign("r_nsl_nilai_tabfieldblock",true);
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
//unit_id - 
	
	$value = $pageObject->showDBValue("unit_id", $data, $keylink);
	if($mainTableOwnerID=="unit_id")
		$ownerIdValue=$value;
	$xt->assign("unit_id_value",$value);
	if(!$pageObject->isAppearOnTabs("unit_id"))
		$xt->assign("unit_id_fieldblock",true);
	else
		$xt->assign("unit_id_tabfieldblock",true);
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
//terimanip - 
	
	$value = $pageObject->showDBValue("terimanip", $data, $keylink);
	if($mainTableOwnerID=="terimanip")
		$ownerIdValue=$value;
	$xt->assign("terimanip_value",$value);
	if(!$pageObject->isAppearOnTabs("terimanip"))
		$xt->assign("terimanip_fieldblock",true);
	else
		$xt->assign("terimanip_tabfieldblock",true);
////////////////////////////////////////////
//terimatgl - Short Date
	
	$value = $pageObject->showDBValue("terimatgl", $data, $keylink);
	if($mainTableOwnerID=="terimatgl")
		$ownerIdValue=$value;
	$xt->assign("terimatgl_value",$value);
	if(!$pageObject->isAppearOnTabs("terimatgl"))
		$xt->assign("terimatgl_fieldblock",true);
	else
		$xt->assign("terimatgl_tabfieldblock",true);
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
//isprint_dc - 
	
	$value = $pageObject->showDBValue("isprint_dc", $data, $keylink);
	if($mainTableOwnerID=="isprint_dc")
		$ownerIdValue=$value;
	$xt->assign("isprint_dc_value",$value);
	if(!$pageObject->isAppearOnTabs("isprint_dc"))
		$xt->assign("isprint_dc_fieldblock",true);
	else
		$xt->assign("isprint_dc_tabfieldblock",true);
////////////////////////////////////////////
//r_nsr_id - 
	
	$value = $pageObject->showDBValue("r_nsr_id", $data, $keylink);
	if($mainTableOwnerID=="r_nsr_id")
		$ownerIdValue=$value;
	$xt->assign("r_nsr_id_value",$value);
	if(!$pageObject->isAppearOnTabs("r_nsr_id"))
		$xt->assign("r_nsr_id_fieldblock",true);
	else
		$xt->assign("r_nsr_id_tabfieldblock",true);
////////////////////////////////////////////
//r_lokasi_pasang_id - 
	
	$value = $pageObject->showDBValue("r_lokasi_pasang_id", $data, $keylink);
	if($mainTableOwnerID=="r_lokasi_pasang_id")
		$ownerIdValue=$value;
	$xt->assign("r_lokasi_pasang_id_value",$value);
	if(!$pageObject->isAppearOnTabs("r_lokasi_pasang_id"))
		$xt->assign("r_lokasi_pasang_id_fieldblock",true);
	else
		$xt->assign("r_lokasi_pasang_id_tabfieldblock",true);
////////////////////////////////////////////
//r_lokasi_pasang_val - Number
	
	$value = $pageObject->showDBValue("r_lokasi_pasang_val", $data, $keylink);
	if($mainTableOwnerID=="r_lokasi_pasang_val")
		$ownerIdValue=$value;
	$xt->assign("r_lokasi_pasang_val_value",$value);
	if(!$pageObject->isAppearOnTabs("r_lokasi_pasang_val"))
		$xt->assign("r_lokasi_pasang_val_fieldblock",true);
	else
		$xt->assign("r_lokasi_pasang_val_tabfieldblock",true);
////////////////////////////////////////////
//r_jalanklas_val - Number
	
	$value = $pageObject->showDBValue("r_jalanklas_val", $data, $keylink);
	if($mainTableOwnerID=="r_jalanklas_val")
		$ownerIdValue=$value;
	$xt->assign("r_jalanklas_val_value",$value);
	if(!$pageObject->isAppearOnTabs("r_jalanklas_val"))
		$xt->assign("r_jalanklas_val_fieldblock",true);
	else
		$xt->assign("r_jalanklas_val_tabfieldblock",true);
////////////////////////////////////////////
//r_sudut_pandang_id - 
	
	$value = $pageObject->showDBValue("r_sudut_pandang_id", $data, $keylink);
	if($mainTableOwnerID=="r_sudut_pandang_id")
		$ownerIdValue=$value;
	$xt->assign("r_sudut_pandang_id_value",$value);
	if(!$pageObject->isAppearOnTabs("r_sudut_pandang_id"))
		$xt->assign("r_sudut_pandang_id_fieldblock",true);
	else
		$xt->assign("r_sudut_pandang_id_tabfieldblock",true);
////////////////////////////////////////////
//r_sudut_pandang_val - Number
	
	$value = $pageObject->showDBValue("r_sudut_pandang_val", $data, $keylink);
	if($mainTableOwnerID=="r_sudut_pandang_val")
		$ownerIdValue=$value;
	$xt->assign("r_sudut_pandang_val_value",$value);
	if(!$pageObject->isAppearOnTabs("r_sudut_pandang_val"))
		$xt->assign("r_sudut_pandang_val_fieldblock",true);
	else
		$xt->assign("r_sudut_pandang_val_tabfieldblock",true);
////////////////////////////////////////////
//r_tinggi - Number
	
	$value = $pageObject->showDBValue("r_tinggi", $data, $keylink);
	if($mainTableOwnerID=="r_tinggi")
		$ownerIdValue=$value;
	$xt->assign("r_tinggi_value",$value);
	if(!$pageObject->isAppearOnTabs("r_tinggi"))
		$xt->assign("r_tinggi_fieldblock",true);
	else
		$xt->assign("r_tinggi_tabfieldblock",true);
////////////////////////////////////////////
//r_njop - Number
	
	$value = $pageObject->showDBValue("r_njop", $data, $keylink);
	if($mainTableOwnerID=="r_njop")
		$ownerIdValue=$value;
	$xt->assign("r_njop_value",$value);
	if(!$pageObject->isAppearOnTabs("r_njop"))
		$xt->assign("r_njop_fieldblock",true);
	else
		$xt->assign("r_njop_tabfieldblock",true);
////////////////////////////////////////////
//r_status - 
	
	$value = $pageObject->showDBValue("r_status", $data, $keylink);
	if($mainTableOwnerID=="r_status")
		$ownerIdValue=$value;
	$xt->assign("r_status_value",$value);
	if(!$pageObject->isAppearOnTabs("r_status"))
		$xt->assign("r_status_fieldblock",true);
	else
		$xt->assign("r_status_tabfieldblock",true);
////////////////////////////////////////////
//r_njop_ketinggian - Number
	
	$value = $pageObject->showDBValue("r_njop_ketinggian", $data, $keylink);
	if($mainTableOwnerID=="r_njop_ketinggian")
		$ownerIdValue=$value;
	$xt->assign("r_njop_ketinggian_value",$value);
	if(!$pageObject->isAppearOnTabs("r_njop_ketinggian"))
		$xt->assign("r_njop_ketinggian_fieldblock",true);
	else
		$xt->assign("r_njop_ketinggian_tabfieldblock",true);
////////////////////////////////////////////
//status_pembayaran - 
	
	$value = $pageObject->showDBValue("status_pembayaran", $data, $keylink);
	if($mainTableOwnerID=="status_pembayaran")
		$ownerIdValue=$value;
	$xt->assign("status_pembayaran_value",$value);
	if(!$pageObject->isAppearOnTabs("status_pembayaran"))
		$xt->assign("status_pembayaran_fieldblock",true);
	else
		$xt->assign("status_pembayaran_tabfieldblock",true);
////////////////////////////////////////////
//rek_no_paneng - 
	
	$value = $pageObject->showDBValue("rek_no_paneng", $data, $keylink);
	if($mainTableOwnerID=="rek_no_paneng")
		$ownerIdValue=$value;
	$xt->assign("rek_no_paneng_value",$value);
	if(!$pageObject->isAppearOnTabs("rek_no_paneng"))
		$xt->assign("rek_no_paneng_fieldblock",true);
	else
		$xt->assign("rek_no_paneng_tabfieldblock",true);
////////////////////////////////////////////
//sptno_lengkap - 
	
	$value = $pageObject->showDBValue("sptno_lengkap", $data, $keylink);
	if($mainTableOwnerID=="sptno_lengkap")
		$ownerIdValue=$value;
	$xt->assign("sptno_lengkap_value",$value);
	if(!$pageObject->isAppearOnTabs("sptno_lengkap"))
		$xt->assign("sptno_lengkap_fieldblock",true);
	else
		$xt->assign("sptno_lengkap_tabfieldblock",true);
////////////////////////////////////////////
//sptno_lama - 
	
	$value = $pageObject->showDBValue("sptno_lama", $data, $keylink);
	if($mainTableOwnerID=="sptno_lama")
		$ownerIdValue=$value;
	$xt->assign("sptno_lama_value",$value);
	if(!$pageObject->isAppearOnTabs("sptno_lama"))
		$xt->assign("sptno_lama_fieldblock",true);
	else
		$xt->assign("sptno_lama_tabfieldblock",true);
////////////////////////////////////////////
//r_nama - 
	
	$value = $pageObject->showDBValue("r_nama", $data, $keylink);
	if($mainTableOwnerID=="r_nama")
		$ownerIdValue=$value;
	$xt->assign("r_nama_value",$value);
	if(!$pageObject->isAppearOnTabs("r_nama"))
		$xt->assign("r_nama_fieldblock",true);
	else
		$xt->assign("r_nama_tabfieldblock",true);
////////////////////////////////////////////
//r_alamat - 
	
	$value = $pageObject->showDBValue("r_alamat", $data, $keylink);
	if($mainTableOwnerID=="r_alamat")
		$ownerIdValue=$value;
	$xt->assign("r_alamat_value",$value);
	if(!$pageObject->isAppearOnTabs("r_alamat"))
		$xt->assign("r_alamat_fieldblock",true);
	else
		$xt->assign("r_alamat_tabfieldblock",true);
////////////////////////////////////////////
//omset1 - Number
	
	$value = $pageObject->showDBValue("omset1", $data, $keylink);
	if($mainTableOwnerID=="omset1")
		$ownerIdValue=$value;
	$xt->assign("omset1_value",$value);
	if(!$pageObject->isAppearOnTabs("omset1"))
		$xt->assign("omset1_fieldblock",true);
	else
		$xt->assign("omset1_tabfieldblock",true);
////////////////////////////////////////////
//omset2 - Number
	
	$value = $pageObject->showDBValue("omset2", $data, $keylink);
	if($mainTableOwnerID=="omset2")
		$ownerIdValue=$value;
	$xt->assign("omset2_value",$value);
	if(!$pageObject->isAppearOnTabs("omset2"))
		$xt->assign("omset2_fieldblock",true);
	else
		$xt->assign("omset2_tabfieldblock",true);
////////////////////////////////////////////
//omset3 - Number
	
	$value = $pageObject->showDBValue("omset3", $data, $keylink);
	if($mainTableOwnerID=="omset3")
		$ownerIdValue=$value;
	$xt->assign("omset3_value",$value);
	if(!$pageObject->isAppearOnTabs("omset3"))
		$xt->assign("omset3_fieldblock",true);
	else
		$xt->assign("omset3_tabfieldblock",true);
////////////////////////////////////////////
//omset4 - Number
	
	$value = $pageObject->showDBValue("omset4", $data, $keylink);
	if($mainTableOwnerID=="omset4")
		$ownerIdValue=$value;
	$xt->assign("omset4_value",$value);
	if(!$pageObject->isAppearOnTabs("omset4"))
		$xt->assign("omset4_fieldblock",true);
	else
		$xt->assign("omset4_tabfieldblock",true);
////////////////////////////////////////////
//omset5 - Number
	
	$value = $pageObject->showDBValue("omset5", $data, $keylink);
	if($mainTableOwnerID=="omset5")
		$ownerIdValue=$value;
	$xt->assign("omset5_value",$value);
	if(!$pageObject->isAppearOnTabs("omset5"))
		$xt->assign("omset5_fieldblock",true);
	else
		$xt->assign("omset5_tabfieldblock",true);
////////////////////////////////////////////
//omset6 - Number
	
	$value = $pageObject->showDBValue("omset6", $data, $keylink);
	if($mainTableOwnerID=="omset6")
		$ownerIdValue=$value;
	$xt->assign("omset6_value",$value);
	if(!$pageObject->isAppearOnTabs("omset6"))
		$xt->assign("omset6_fieldblock",true);
	else
		$xt->assign("omset6_tabfieldblock",true);
////////////////////////////////////////////
//omset7 - Number
	
	$value = $pageObject->showDBValue("omset7", $data, $keylink);
	if($mainTableOwnerID=="omset7")
		$ownerIdValue=$value;
	$xt->assign("omset7_value",$value);
	if(!$pageObject->isAppearOnTabs("omset7"))
		$xt->assign("omset7_fieldblock",true);
	else
		$xt->assign("omset7_tabfieldblock",true);
////////////////////////////////////////////
//omset8 - Number
	
	$value = $pageObject->showDBValue("omset8", $data, $keylink);
	if($mainTableOwnerID=="omset8")
		$ownerIdValue=$value;
	$xt->assign("omset8_value",$value);
	if(!$pageObject->isAppearOnTabs("omset8"))
		$xt->assign("omset8_fieldblock",true);
	else
		$xt->assign("omset8_tabfieldblock",true);
////////////////////////////////////////////
//omset9 - Number
	
	$value = $pageObject->showDBValue("omset9", $data, $keylink);
	if($mainTableOwnerID=="omset9")
		$ownerIdValue=$value;
	$xt->assign("omset9_value",$value);
	if(!$pageObject->isAppearOnTabs("omset9"))
		$xt->assign("omset9_fieldblock",true);
	else
		$xt->assign("omset9_tabfieldblock",true);
////////////////////////////////////////////
//omset10 - Number
	
	$value = $pageObject->showDBValue("omset10", $data, $keylink);
	if($mainTableOwnerID=="omset10")
		$ownerIdValue=$value;
	$xt->assign("omset10_value",$value);
	if(!$pageObject->isAppearOnTabs("omset10"))
		$xt->assign("omset10_fieldblock",true);
	else
		$xt->assign("omset10_tabfieldblock",true);
////////////////////////////////////////////
//omset11 - Number
	
	$value = $pageObject->showDBValue("omset11", $data, $keylink);
	if($mainTableOwnerID=="omset11")
		$ownerIdValue=$value;
	$xt->assign("omset11_value",$value);
	if(!$pageObject->isAppearOnTabs("omset11"))
		$xt->assign("omset11_fieldblock",true);
	else
		$xt->assign("omset11_tabfieldblock",true);
////////////////////////////////////////////
//omset12 - Number
	
	$value = $pageObject->showDBValue("omset12", $data, $keylink);
	if($mainTableOwnerID=="omset12")
		$ownerIdValue=$value;
	$xt->assign("omset12_value",$value);
	if(!$pageObject->isAppearOnTabs("omset12"))
		$xt->assign("omset12_fieldblock",true);
	else
		$xt->assign("omset12_tabfieldblock",true);
////////////////////////////////////////////
//omset13 - Number
	
	$value = $pageObject->showDBValue("omset13", $data, $keylink);
	if($mainTableOwnerID=="omset13")
		$ownerIdValue=$value;
	$xt->assign("omset13_value",$value);
	if(!$pageObject->isAppearOnTabs("omset13"))
		$xt->assign("omset13_fieldblock",true);
	else
		$xt->assign("omset13_tabfieldblock",true);
////////////////////////////////////////////
//omset14 - Number
	
	$value = $pageObject->showDBValue("omset14", $data, $keylink);
	if($mainTableOwnerID=="omset14")
		$ownerIdValue=$value;
	$xt->assign("omset14_value",$value);
	if(!$pageObject->isAppearOnTabs("omset14"))
		$xt->assign("omset14_fieldblock",true);
	else
		$xt->assign("omset14_tabfieldblock",true);
////////////////////////////////////////////
//omset15 - Number
	
	$value = $pageObject->showDBValue("omset15", $data, $keylink);
	if($mainTableOwnerID=="omset15")
		$ownerIdValue=$value;
	$xt->assign("omset15_value",$value);
	if(!$pageObject->isAppearOnTabs("omset15"))
		$xt->assign("omset15_fieldblock",true);
	else
		$xt->assign("omset15_tabfieldblock",true);
////////////////////////////////////////////
//omset16 - Number
	
	$value = $pageObject->showDBValue("omset16", $data, $keylink);
	if($mainTableOwnerID=="omset16")
		$ownerIdValue=$value;
	$xt->assign("omset16_value",$value);
	if(!$pageObject->isAppearOnTabs("omset16"))
		$xt->assign("omset16_fieldblock",true);
	else
		$xt->assign("omset16_tabfieldblock",true);
////////////////////////////////////////////
//omset17 - Number
	
	$value = $pageObject->showDBValue("omset17", $data, $keylink);
	if($mainTableOwnerID=="omset17")
		$ownerIdValue=$value;
	$xt->assign("omset17_value",$value);
	if(!$pageObject->isAppearOnTabs("omset17"))
		$xt->assign("omset17_fieldblock",true);
	else
		$xt->assign("omset17_tabfieldblock",true);
////////////////////////////////////////////
//omset18 - Number
	
	$value = $pageObject->showDBValue("omset18", $data, $keylink);
	if($mainTableOwnerID=="omset18")
		$ownerIdValue=$value;
	$xt->assign("omset18_value",$value);
	if(!$pageObject->isAppearOnTabs("omset18"))
		$xt->assign("omset18_fieldblock",true);
	else
		$xt->assign("omset18_tabfieldblock",true);
////////////////////////////////////////////
//omset19 - Number
	
	$value = $pageObject->showDBValue("omset19", $data, $keylink);
	if($mainTableOwnerID=="omset19")
		$ownerIdValue=$value;
	$xt->assign("omset19_value",$value);
	if(!$pageObject->isAppearOnTabs("omset19"))
		$xt->assign("omset19_fieldblock",true);
	else
		$xt->assign("omset19_tabfieldblock",true);
////////////////////////////////////////////
//omset20 - Number
	
	$value = $pageObject->showDBValue("omset20", $data, $keylink);
	if($mainTableOwnerID=="omset20")
		$ownerIdValue=$value;
	$xt->assign("omset20_value",$value);
	if(!$pageObject->isAppearOnTabs("omset20"))
		$xt->assign("omset20_fieldblock",true);
	else
		$xt->assign("omset20_tabfieldblock",true);
////////////////////////////////////////////
//omset21 - Number
	
	$value = $pageObject->showDBValue("omset21", $data, $keylink);
	if($mainTableOwnerID=="omset21")
		$ownerIdValue=$value;
	$xt->assign("omset21_value",$value);
	if(!$pageObject->isAppearOnTabs("omset21"))
		$xt->assign("omset21_fieldblock",true);
	else
		$xt->assign("omset21_tabfieldblock",true);
////////////////////////////////////////////
//omset22 - Number
	
	$value = $pageObject->showDBValue("omset22", $data, $keylink);
	if($mainTableOwnerID=="omset22")
		$ownerIdValue=$value;
	$xt->assign("omset22_value",$value);
	if(!$pageObject->isAppearOnTabs("omset22"))
		$xt->assign("omset22_fieldblock",true);
	else
		$xt->assign("omset22_tabfieldblock",true);
////////////////////////////////////////////
//omset23 - Number
	
	$value = $pageObject->showDBValue("omset23", $data, $keylink);
	if($mainTableOwnerID=="omset23")
		$ownerIdValue=$value;
	$xt->assign("omset23_value",$value);
	if(!$pageObject->isAppearOnTabs("omset23"))
		$xt->assign("omset23_fieldblock",true);
	else
		$xt->assign("omset23_tabfieldblock",true);
////////////////////////////////////////////
//omset24 - Number
	
	$value = $pageObject->showDBValue("omset24", $data, $keylink);
	if($mainTableOwnerID=="omset24")
		$ownerIdValue=$value;
	$xt->assign("omset24_value",$value);
	if(!$pageObject->isAppearOnTabs("omset24"))
		$xt->assign("omset24_fieldblock",true);
	else
		$xt->assign("omset24_tabfieldblock",true);
////////////////////////////////////////////
//omset25 - Number
	
	$value = $pageObject->showDBValue("omset25", $data, $keylink);
	if($mainTableOwnerID=="omset25")
		$ownerIdValue=$value;
	$xt->assign("omset25_value",$value);
	if(!$pageObject->isAppearOnTabs("omset25"))
		$xt->assign("omset25_fieldblock",true);
	else
		$xt->assign("omset25_tabfieldblock",true);
////////////////////////////////////////////
//omset26 - Number
	
	$value = $pageObject->showDBValue("omset26", $data, $keylink);
	if($mainTableOwnerID=="omset26")
		$ownerIdValue=$value;
	$xt->assign("omset26_value",$value);
	if(!$pageObject->isAppearOnTabs("omset26"))
		$xt->assign("omset26_fieldblock",true);
	else
		$xt->assign("omset26_tabfieldblock",true);
////////////////////////////////////////////
//omset27 - Number
	
	$value = $pageObject->showDBValue("omset27", $data, $keylink);
	if($mainTableOwnerID=="omset27")
		$ownerIdValue=$value;
	$xt->assign("omset27_value",$value);
	if(!$pageObject->isAppearOnTabs("omset27"))
		$xt->assign("omset27_fieldblock",true);
	else
		$xt->assign("omset27_tabfieldblock",true);
////////////////////////////////////////////
//omset28 - Number
	
	$value = $pageObject->showDBValue("omset28", $data, $keylink);
	if($mainTableOwnerID=="omset28")
		$ownerIdValue=$value;
	$xt->assign("omset28_value",$value);
	if(!$pageObject->isAppearOnTabs("omset28"))
		$xt->assign("omset28_fieldblock",true);
	else
		$xt->assign("omset28_tabfieldblock",true);
////////////////////////////////////////////
//omset29 - Number
	
	$value = $pageObject->showDBValue("omset29", $data, $keylink);
	if($mainTableOwnerID=="omset29")
		$ownerIdValue=$value;
	$xt->assign("omset29_value",$value);
	if(!$pageObject->isAppearOnTabs("omset29"))
		$xt->assign("omset29_fieldblock",true);
	else
		$xt->assign("omset29_tabfieldblock",true);
////////////////////////////////////////////
//omset30 - Number
	
	$value = $pageObject->showDBValue("omset30", $data, $keylink);
	if($mainTableOwnerID=="omset30")
		$ownerIdValue=$value;
	$xt->assign("omset30_value",$value);
	if(!$pageObject->isAppearOnTabs("omset30"))
		$xt->assign("omset30_fieldblock",true);
	else
		$xt->assign("omset30_tabfieldblock",true);
////////////////////////////////////////////
//omset31 - Number
	
	$value = $pageObject->showDBValue("omset31", $data, $keylink);
	if($mainTableOwnerID=="omset31")
		$ownerIdValue=$value;
	$xt->assign("omset31_value",$value);
	if(!$pageObject->isAppearOnTabs("omset31"))
		$xt->assign("omset31_fieldblock",true);
	else
		$xt->assign("omset31_tabfieldblock",true);
////////////////////////////////////////////
//keterangan1 - 
	
	$value = $pageObject->showDBValue("keterangan1", $data, $keylink);
	if($mainTableOwnerID=="keterangan1")
		$ownerIdValue=$value;
	$xt->assign("keterangan1_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan1"))
		$xt->assign("keterangan1_fieldblock",true);
	else
		$xt->assign("keterangan1_tabfieldblock",true);
////////////////////////////////////////////
//keterangan2 - 
	
	$value = $pageObject->showDBValue("keterangan2", $data, $keylink);
	if($mainTableOwnerID=="keterangan2")
		$ownerIdValue=$value;
	$xt->assign("keterangan2_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan2"))
		$xt->assign("keterangan2_fieldblock",true);
	else
		$xt->assign("keterangan2_tabfieldblock",true);
////////////////////////////////////////////
//keterangan3 - 
	
	$value = $pageObject->showDBValue("keterangan3", $data, $keylink);
	if($mainTableOwnerID=="keterangan3")
		$ownerIdValue=$value;
	$xt->assign("keterangan3_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan3"))
		$xt->assign("keterangan3_fieldblock",true);
	else
		$xt->assign("keterangan3_tabfieldblock",true);
////////////////////////////////////////////
//keterangan4 - 
	
	$value = $pageObject->showDBValue("keterangan4", $data, $keylink);
	if($mainTableOwnerID=="keterangan4")
		$ownerIdValue=$value;
	$xt->assign("keterangan4_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan4"))
		$xt->assign("keterangan4_fieldblock",true);
	else
		$xt->assign("keterangan4_tabfieldblock",true);
////////////////////////////////////////////
//keterangan5 - 
	
	$value = $pageObject->showDBValue("keterangan5", $data, $keylink);
	if($mainTableOwnerID=="keterangan5")
		$ownerIdValue=$value;
	$xt->assign("keterangan5_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan5"))
		$xt->assign("keterangan5_fieldblock",true);
	else
		$xt->assign("keterangan5_tabfieldblock",true);
////////////////////////////////////////////
//keterangan6 - 
	
	$value = $pageObject->showDBValue("keterangan6", $data, $keylink);
	if($mainTableOwnerID=="keterangan6")
		$ownerIdValue=$value;
	$xt->assign("keterangan6_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan6"))
		$xt->assign("keterangan6_fieldblock",true);
	else
		$xt->assign("keterangan6_tabfieldblock",true);
////////////////////////////////////////////
//keterangan7 - 
	
	$value = $pageObject->showDBValue("keterangan7", $data, $keylink);
	if($mainTableOwnerID=="keterangan7")
		$ownerIdValue=$value;
	$xt->assign("keterangan7_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan7"))
		$xt->assign("keterangan7_fieldblock",true);
	else
		$xt->assign("keterangan7_tabfieldblock",true);
////////////////////////////////////////////
//keterangan8 - 
	
	$value = $pageObject->showDBValue("keterangan8", $data, $keylink);
	if($mainTableOwnerID=="keterangan8")
		$ownerIdValue=$value;
	$xt->assign("keterangan8_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan8"))
		$xt->assign("keterangan8_fieldblock",true);
	else
		$xt->assign("keterangan8_tabfieldblock",true);
////////////////////////////////////////////
//keterangan9 - 
	
	$value = $pageObject->showDBValue("keterangan9", $data, $keylink);
	if($mainTableOwnerID=="keterangan9")
		$ownerIdValue=$value;
	$xt->assign("keterangan9_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan9"))
		$xt->assign("keterangan9_fieldblock",true);
	else
		$xt->assign("keterangan9_tabfieldblock",true);
////////////////////////////////////////////
//keterangan10 - 
	
	$value = $pageObject->showDBValue("keterangan10", $data, $keylink);
	if($mainTableOwnerID=="keterangan10")
		$ownerIdValue=$value;
	$xt->assign("keterangan10_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan10"))
		$xt->assign("keterangan10_fieldblock",true);
	else
		$xt->assign("keterangan10_tabfieldblock",true);
////////////////////////////////////////////
//keterangan11 - 
	
	$value = $pageObject->showDBValue("keterangan11", $data, $keylink);
	if($mainTableOwnerID=="keterangan11")
		$ownerIdValue=$value;
	$xt->assign("keterangan11_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan11"))
		$xt->assign("keterangan11_fieldblock",true);
	else
		$xt->assign("keterangan11_tabfieldblock",true);
////////////////////////////////////////////
//keterangan12 - 
	
	$value = $pageObject->showDBValue("keterangan12", $data, $keylink);
	if($mainTableOwnerID=="keterangan12")
		$ownerIdValue=$value;
	$xt->assign("keterangan12_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan12"))
		$xt->assign("keterangan12_fieldblock",true);
	else
		$xt->assign("keterangan12_tabfieldblock",true);
////////////////////////////////////////////
//keterangan13 - 
	
	$value = $pageObject->showDBValue("keterangan13", $data, $keylink);
	if($mainTableOwnerID=="keterangan13")
		$ownerIdValue=$value;
	$xt->assign("keterangan13_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan13"))
		$xt->assign("keterangan13_fieldblock",true);
	else
		$xt->assign("keterangan13_tabfieldblock",true);
////////////////////////////////////////////
//keterangan14 - 
	
	$value = $pageObject->showDBValue("keterangan14", $data, $keylink);
	if($mainTableOwnerID=="keterangan14")
		$ownerIdValue=$value;
	$xt->assign("keterangan14_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan14"))
		$xt->assign("keterangan14_fieldblock",true);
	else
		$xt->assign("keterangan14_tabfieldblock",true);
////////////////////////////////////////////
//keterangan15 - 
	
	$value = $pageObject->showDBValue("keterangan15", $data, $keylink);
	if($mainTableOwnerID=="keterangan15")
		$ownerIdValue=$value;
	$xt->assign("keterangan15_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan15"))
		$xt->assign("keterangan15_fieldblock",true);
	else
		$xt->assign("keterangan15_tabfieldblock",true);
////////////////////////////////////////////
//keterangan16 - 
	
	$value = $pageObject->showDBValue("keterangan16", $data, $keylink);
	if($mainTableOwnerID=="keterangan16")
		$ownerIdValue=$value;
	$xt->assign("keterangan16_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan16"))
		$xt->assign("keterangan16_fieldblock",true);
	else
		$xt->assign("keterangan16_tabfieldblock",true);
////////////////////////////////////////////
//keterangan17 - 
	
	$value = $pageObject->showDBValue("keterangan17", $data, $keylink);
	if($mainTableOwnerID=="keterangan17")
		$ownerIdValue=$value;
	$xt->assign("keterangan17_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan17"))
		$xt->assign("keterangan17_fieldblock",true);
	else
		$xt->assign("keterangan17_tabfieldblock",true);
////////////////////////////////////////////
//keterangan18 - 
	
	$value = $pageObject->showDBValue("keterangan18", $data, $keylink);
	if($mainTableOwnerID=="keterangan18")
		$ownerIdValue=$value;
	$xt->assign("keterangan18_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan18"))
		$xt->assign("keterangan18_fieldblock",true);
	else
		$xt->assign("keterangan18_tabfieldblock",true);
////////////////////////////////////////////
//keterangan19 - 
	
	$value = $pageObject->showDBValue("keterangan19", $data, $keylink);
	if($mainTableOwnerID=="keterangan19")
		$ownerIdValue=$value;
	$xt->assign("keterangan19_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan19"))
		$xt->assign("keterangan19_fieldblock",true);
	else
		$xt->assign("keterangan19_tabfieldblock",true);
////////////////////////////////////////////
//keterangan20 - 
	
	$value = $pageObject->showDBValue("keterangan20", $data, $keylink);
	if($mainTableOwnerID=="keterangan20")
		$ownerIdValue=$value;
	$xt->assign("keterangan20_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan20"))
		$xt->assign("keterangan20_fieldblock",true);
	else
		$xt->assign("keterangan20_tabfieldblock",true);
////////////////////////////////////////////
//keterangan21 - 
	
	$value = $pageObject->showDBValue("keterangan21", $data, $keylink);
	if($mainTableOwnerID=="keterangan21")
		$ownerIdValue=$value;
	$xt->assign("keterangan21_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan21"))
		$xt->assign("keterangan21_fieldblock",true);
	else
		$xt->assign("keterangan21_tabfieldblock",true);
////////////////////////////////////////////
//keterangan22 - 
	
	$value = $pageObject->showDBValue("keterangan22", $data, $keylink);
	if($mainTableOwnerID=="keterangan22")
		$ownerIdValue=$value;
	$xt->assign("keterangan22_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan22"))
		$xt->assign("keterangan22_fieldblock",true);
	else
		$xt->assign("keterangan22_tabfieldblock",true);
////////////////////////////////////////////
//keterangan23 - 
	
	$value = $pageObject->showDBValue("keterangan23", $data, $keylink);
	if($mainTableOwnerID=="keterangan23")
		$ownerIdValue=$value;
	$xt->assign("keterangan23_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan23"))
		$xt->assign("keterangan23_fieldblock",true);
	else
		$xt->assign("keterangan23_tabfieldblock",true);
////////////////////////////////////////////
//keterangan24 - 
	
	$value = $pageObject->showDBValue("keterangan24", $data, $keylink);
	if($mainTableOwnerID=="keterangan24")
		$ownerIdValue=$value;
	$xt->assign("keterangan24_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan24"))
		$xt->assign("keterangan24_fieldblock",true);
	else
		$xt->assign("keterangan24_tabfieldblock",true);
////////////////////////////////////////////
//keterangan25 - 
	
	$value = $pageObject->showDBValue("keterangan25", $data, $keylink);
	if($mainTableOwnerID=="keterangan25")
		$ownerIdValue=$value;
	$xt->assign("keterangan25_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan25"))
		$xt->assign("keterangan25_fieldblock",true);
	else
		$xt->assign("keterangan25_tabfieldblock",true);
////////////////////////////////////////////
//keterangan26 - 
	
	$value = $pageObject->showDBValue("keterangan26", $data, $keylink);
	if($mainTableOwnerID=="keterangan26")
		$ownerIdValue=$value;
	$xt->assign("keterangan26_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan26"))
		$xt->assign("keterangan26_fieldblock",true);
	else
		$xt->assign("keterangan26_tabfieldblock",true);
////////////////////////////////////////////
//keterangan27 - 
	
	$value = $pageObject->showDBValue("keterangan27", $data, $keylink);
	if($mainTableOwnerID=="keterangan27")
		$ownerIdValue=$value;
	$xt->assign("keterangan27_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan27"))
		$xt->assign("keterangan27_fieldblock",true);
	else
		$xt->assign("keterangan27_tabfieldblock",true);
////////////////////////////////////////////
//keterangan28 - 
	
	$value = $pageObject->showDBValue("keterangan28", $data, $keylink);
	if($mainTableOwnerID=="keterangan28")
		$ownerIdValue=$value;
	$xt->assign("keterangan28_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan28"))
		$xt->assign("keterangan28_fieldblock",true);
	else
		$xt->assign("keterangan28_tabfieldblock",true);
////////////////////////////////////////////
//keterangan29 - 
	
	$value = $pageObject->showDBValue("keterangan29", $data, $keylink);
	if($mainTableOwnerID=="keterangan29")
		$ownerIdValue=$value;
	$xt->assign("keterangan29_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan29"))
		$xt->assign("keterangan29_fieldblock",true);
	else
		$xt->assign("keterangan29_tabfieldblock",true);
////////////////////////////////////////////
//keterangan30 - 
	
	$value = $pageObject->showDBValue("keterangan30", $data, $keylink);
	if($mainTableOwnerID=="keterangan30")
		$ownerIdValue=$value;
	$xt->assign("keterangan30_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan30"))
		$xt->assign("keterangan30_fieldblock",true);
	else
		$xt->assign("keterangan30_tabfieldblock",true);
////////////////////////////////////////////
//keterangan31 - 
	
	$value = $pageObject->showDBValue("keterangan31", $data, $keylink);
	if($mainTableOwnerID=="keterangan31")
		$ownerIdValue=$value;
	$xt->assign("keterangan31_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan31"))
		$xt->assign("keterangan31_fieldblock",true);
	else
		$xt->assign("keterangan31_tabfieldblock",true);
////////////////////////////////////////////
//doc_no - 
	
	$value = $pageObject->showDBValue("doc_no", $data, $keylink);
	if($mainTableOwnerID=="doc_no")
		$ownerIdValue=$value;
	$xt->assign("doc_no_value",$value);
	if(!$pageObject->isAppearOnTabs("doc_no"))
		$xt->assign("doc_no_fieldblock",true);
	else
		$xt->assign("doc_no_tabfieldblock",true);
////////////////////////////////////////////
//cara_bayar - 
	
	$value = $pageObject->showDBValue("cara_bayar", $data, $keylink);
	if($mainTableOwnerID=="cara_bayar")
		$ownerIdValue=$value;
	$xt->assign("cara_bayar_value",$value);
	if(!$pageObject->isAppearOnTabs("cara_bayar"))
		$xt->assign("cara_bayar_fieldblock",true);
	else
		$xt->assign("cara_bayar_tabfieldblock",true);
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
//golongan - 
	
	$value = $pageObject->showDBValue("golongan", $data, $keylink);
	if($mainTableOwnerID=="golongan")
		$ownerIdValue=$value;
	$xt->assign("golongan_value",$value);
	if(!$pageObject->isAppearOnTabs("golongan"))
		$xt->assign("golongan_fieldblock",true);
	else
		$xt->assign("golongan_tabfieldblock",true);
////////////////////////////////////////////
//omset_lain - Number
	
	$value = $pageObject->showDBValue("omset_lain", $data, $keylink);
	if($mainTableOwnerID=="omset_lain")
		$ownerIdValue=$value;
	$xt->assign("omset_lain_value",$value);
	if(!$pageObject->isAppearOnTabs("omset_lain"))
		$xt->assign("omset_lain_fieldblock",true);
	else
		$xt->assign("omset_lain_tabfieldblock",true);
////////////////////////////////////////////
//keterangan_lain - 
	
	$value = $pageObject->showDBValue("keterangan_lain", $data, $keylink);
	if($mainTableOwnerID=="keterangan_lain")
		$ownerIdValue=$value;
	$xt->assign("keterangan_lain_value",$value);
	if(!$pageObject->isAppearOnTabs("keterangan_lain"))
		$xt->assign("keterangan_lain_fieldblock",true);
	else
		$xt->assign("keterangan_lain_tabfieldblock",true);
////////////////////////////////////////////
//ijin_no - 
	
	$value = $pageObject->showDBValue("ijin_no", $data, $keylink);
	if($mainTableOwnerID=="ijin_no")
		$ownerIdValue=$value;
	$xt->assign("ijin_no_value",$value);
	if(!$pageObject->isAppearOnTabs("ijin_no"))
		$xt->assign("ijin_no_fieldblock",true);
	else
		$xt->assign("ijin_no_tabfieldblock",true);
////////////////////////////////////////////
//jenis_masa - 
	
	$value = $pageObject->showDBValue("jenis_masa", $data, $keylink);
	if($mainTableOwnerID=="jenis_masa")
		$ownerIdValue=$value;
	$xt->assign("jenis_masa_value",$value);
	if(!$pageObject->isAppearOnTabs("jenis_masa"))
		$xt->assign("jenis_masa_fieldblock",true);
	else
		$xt->assign("jenis_masa_tabfieldblock",true);
////////////////////////////////////////////
//skpd_lama - 
	
	$value = $pageObject->showDBValue("skpd_lama", $data, $keylink);
	if($mainTableOwnerID=="skpd_lama")
		$ownerIdValue=$value;
	$xt->assign("skpd_lama_value",$value);
	if(!$pageObject->isAppearOnTabs("skpd_lama"))
		$xt->assign("skpd_lama_fieldblock",true);
	else
		$xt->assign("skpd_lama_tabfieldblock",true);
////////////////////////////////////////////
//proses - 
	
	$value = $pageObject->showDBValue("proses", $data, $keylink);
	if($mainTableOwnerID=="proses")
		$ownerIdValue=$value;
	$xt->assign("proses_value",$value);
	if(!$pageObject->isAppearOnTabs("proses"))
		$xt->assign("proses_fieldblock",true);
	else
		$xt->assign("proses_tabfieldblock",true);
////////////////////////////////////////////
//tanggal_validasi - Short Date
	
	$value = $pageObject->showDBValue("tanggal_validasi", $data, $keylink);
	if($mainTableOwnerID=="tanggal_validasi")
		$ownerIdValue=$value;
	$xt->assign("tanggal_validasi_value",$value);
	if(!$pageObject->isAppearOnTabs("tanggal_validasi"))
		$xt->assign("tanggal_validasi_fieldblock",true);
	else
		$xt->assign("tanggal_validasi_tabfieldblock",true);
////////////////////////////////////////////
//bulan - 
	
	$value = $pageObject->showDBValue("bulan", $data, $keylink);
	if($mainTableOwnerID=="bulan")
		$ownerIdValue=$value;
	$xt->assign("bulan_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan"))
		$xt->assign("bulan_fieldblock",true);
	else
		$xt->assign("bulan_tabfieldblock",true);
////////////////////////////////////////////
//no_telp - 
	
	$value = $pageObject->showDBValue("no_telp", $data, $keylink);
	if($mainTableOwnerID=="no_telp")
		$ownerIdValue=$value;
	$xt->assign("no_telp_value",$value);
	if(!$pageObject->isAppearOnTabs("no_telp"))
		$xt->assign("no_telp_fieldblock",true);
	else
		$xt->assign("no_telp_tabfieldblock",true);
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
//multiple - 
	
	$value = $pageObject->showDBValue("multiple", $data, $keylink);
	if($mainTableOwnerID=="multiple")
		$ownerIdValue=$value;
	$xt->assign("multiple_value",$value);
	if(!$pageObject->isAppearOnTabs("multiple"))
		$xt->assign("multiple_fieldblock",true);
	else
		$xt->assign("multiple_tabfieldblock",true);
////////////////////////////////////////////
//bulan_telat - 
	
	$value = $pageObject->showDBValue("bulan_telat", $data, $keylink);
	if($mainTableOwnerID=="bulan_telat")
		$ownerIdValue=$value;
	$xt->assign("bulan_telat_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan_telat"))
		$xt->assign("bulan_telat_fieldblock",true);
	else
		$xt->assign("bulan_telat_tabfieldblock",true);

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
		$options['masterTable'] = "pad.pad_spt";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "pad.pad_spt";
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
	$strTableName = "pad.pad_spt";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='pad_pad_spt_edit.php?".$editlink."'\"");

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
