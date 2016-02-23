<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/pad_pad_spt_variables.php");
include('include/xtempl.php');
include('classes/addpage.php');

global $globalEvents;

//	check if logged in
if(!isLogged() || CheckPermissionsEvent($strTableName, 'A') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	
	header("Location: login.php?message=expired"); 
	return;
}

if ((sizeof($_POST)==0) && (postvalue('ferror'))){
	if (postvalue("inline")){
		$returnJSON['success'] = false;
		$returnJSON['message'] = "Error occurred";
		$returnJSON['fatalError'] = true;
		echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
		exit();
	}
	else if (postvalue("fly")){
		echo -1;
		exit();
	}
	else {
		$_SESSION["message_add"] = "<< "."Error occurred"." >>";
	}
}

$layout = new TLayout("add2","RoundedGreen","MobileGreen");
$layout->blocks["top"] = array();
$layout->containers["add"] = array();

$layout->containers["add"][] = array("name"=>"addheader","block"=>"","substyle"=>2);


$layout->containers["add"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->containers["add"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"addfields","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"legend","block"=>"legend","substyle"=>3);


$layout->containers["fields"][] = array("name"=>"addbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";

$layout->skins["add"] = "1";
$layout->blocks["top"][] = "add";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_spt_add"] = $layout;



$filename = "";
$status = "";
$message = "";
$mesClass = "";
$usermessage = "";
$error_happened = false;
$readavalues = false;

$keys = array();
$showValues = array();
$showRawValues = array();
$showFields = array();
$showDetailKeys = array();
$IsSaved = false;
$HaveData = true;
$popUpSave = false;

$sessionPrefix = $strTableName;

$onFly = false;
if(postvalue("onFly"))
	$onFly = true;

if(@$_REQUEST["editType"]=="inline")
	$inlineadd = ADD_INLINE;
elseif(@$_REQUEST["editType"]==ADD_POPUP)
{
	$inlineadd = ADD_POPUP;
	if(@$_POST["a"]=="added" && postvalue("field")=="" && postvalue("category")=="")
		$popUpSave = true;	
}
elseif(@$_REQUEST["editType"]==ADD_MASTER)
	$inlineadd = ADD_MASTER;
elseif($onFly)
{
	$inlineadd = ADD_ONTHEFLY;
	$sessionPrefix = $strTableName."_add";
}
else
	$inlineadd = ADD_SIMPLE;

if($inlineadd == ADD_INLINE)
	$templatefile = "pad_pad_spt_inline_add.htm";
else
	$templatefile = "pad_pad_spt_add.htm";

$id = postvalue("id");
if(intval($id)==0)
	$id = 1;

//If undefined session value for mastet table, but exist post value master table, than take second
//It may be happen only when use dpInline mode on page add
if(!@$_SESSION[$sessionPrefix."_mastertable"] && postvalue("mastertable"))
	$_SESSION[$sessionPrefix."_mastertable"] = postvalue("mastertable");
	
$xt = new Xtempl();
	
// assign an id
$xt->assign("id",$id);
	
$auditObj = GetAuditObject($strTableName);

//array of params for classes
$params = array("pageType" => PAGE_ADD,"id" => $id,"mode" => $inlineadd);


$params['xt'] = &$xt;
$params['tName'] = $strTableName;
$params['includes_js'] = $includes_js;
$params['locale_info'] = $locale_info;
$params['includes_css'] = $includes_css;
$params['useTabsOnAdd'] = $gSettings->useTabsOnAdd();
$params['templatefile'] = $templatefile;
$params['includes_jsreq'] = $includes_jsreq;
$params['pageAddLikeInline'] = ($inlineadd==ADD_INLINE);
$params['needSearchClauseObj'] = false;
$params['strOriginalTableName'] = $strOriginalTableName;

if($params['useTabsOnAdd'])
	$params['arrAddTabs'] = $gSettings->getAddTabs();
	
$pageObject = new AddPage($params);

if(isset($_REQUEST['afteradd'])){
		header('Location: pad_pad_spt_add.php');
	if($eventObj->exists("AfterAdd") && isset($_SESSION['after_add_data'][$_REQUEST['afteradd']])){
	
		$data = $_SESSION['after_add_data'][$_REQUEST['afteradd']];
		$eventObj->AfterAdd($data['avalues'], $data['keys'],$data['inlineadd'], $pageObject);
	
	}
	unset($_SESSION['after_add_data'][$_REQUEST['afteradd']]);
	
	foreach (is_array($_SESSION['after_add_data']) ? $_SESSION['after_add_data'] : array() as $k=>$v){
		if (!is_array($v) or !array_key_exists('time',$v)) {
			unset($_SESSION['after_add_data'][$k]);
			continue;
		}
		if ($v['time'] < time() - 3600){
			unset($_SESSION['after_add_data'][$k]);
		}
	}
		exit;
}

//Get detail table keys	
$detailKeys = $pageObject->detailKeysByM;

//Array of fields, which appear on add page
$addFields = $pageObject->getFieldsByPageType();

// add button events if exist
if ($inlineadd==ADD_SIMPLE)
	$pageObject->addButtonHandlers();

$url_page=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

//For show detail tables on master page add
if($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER || $inlineadd==ADD_POPUP)
{
	$dpParams = array();
	if($pageObject->isShowDetailTables  && !isMobile())
	{
		$ids = $id;
		$countDetailsIsShow = 0;
				$pageObject->jsSettings['tableSettings'][$strTableName]['isShowDetails'] = $countDetailsIsShow > 0 ? true : false;
		$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array('tableNames'=>$dpParams['strTableNames'], 'ids'=>$dpParams['ids']);
	}
}

//	Before Process event
if($eventObj->exists("BeforeProcessAdd"))
	$eventObj->BeforeProcessAdd($conn, $pageObject);

// proccess captcha
if ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER || $inlineadd==ADD_POPUP)
	if($pageObject->captchaExists())
		$pageObject->doCaptchaCode();
	
// insert new record if we have to
if(@$_POST["a"]=="added")
{
	$afilename_values=array();
	$avalues=array();
	$blobfields=array();
//	processing tahun - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tahun = $pageObject->getControl("tahun", $id);
		$control_tahun->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tahun - end
//	processing sptno - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_sptno = $pageObject->getControl("sptno", $id);
		$control_sptno->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing sptno - end
//	processing customer_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_customer_id = $pageObject->getControl("customer_id", $id);
		$control_customer_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing customer_id - end
//	processing customer_usaha_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_customer_usaha_id = $pageObject->getControl("customer_usaha_id", $id);
		$control_customer_usaha_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing customer_usaha_id - end
//	processing rekening_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_rekening_id = $pageObject->getControl("rekening_id", $id);
		$control_rekening_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing rekening_id - end
//	processing pajak_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pajak_id = $pageObject->getControl("pajak_id", $id);
		$control_pajak_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pajak_id - end
//	processing type_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_type_id = $pageObject->getControl("type_id", $id);
		$control_type_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing type_id - end
//	processing so - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_so = $pageObject->getControl("so", $id);
		$control_so->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing so - end
//	processing masadari - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_masadari = $pageObject->getControl("masadari", $id);
		$control_masadari->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing masadari - end
//	processing masasd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_masasd = $pageObject->getControl("masasd", $id);
		$control_masasd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing masasd - end
//	processing jatuhtempotgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jatuhtempotgl = $pageObject->getControl("jatuhtempotgl", $id);
		$control_jatuhtempotgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jatuhtempotgl - end
//	processing r_bayarid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_bayarid = $pageObject->getControl("r_bayarid", $id);
		$control_r_bayarid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_bayarid - end
//	processing minimal_omset - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_minimal_omset = $pageObject->getControl("minimal_omset", $id);
		$control_minimal_omset->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing minimal_omset - end
//	processing dasar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_dasar = $pageObject->getControl("dasar", $id);
		$control_dasar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing dasar - end
//	processing tarif - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tarif = $pageObject->getControl("tarif", $id);
		$control_tarif->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tarif - end
//	processing denda - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_denda = $pageObject->getControl("denda", $id);
		$control_denda->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing denda - end
//	processing bunga - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_bunga = $pageObject->getControl("bunga", $id);
		$control_bunga->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing bunga - end
//	processing setoran - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_setoran = $pageObject->getControl("setoran", $id);
		$control_setoran->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing setoran - end
//	processing kenaikan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kenaikan = $pageObject->getControl("kenaikan", $id);
		$control_kenaikan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kenaikan - end
//	processing kompensasi - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kompensasi = $pageObject->getControl("kompensasi", $id);
		$control_kompensasi->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kompensasi - end
//	processing lain2 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_lain2 = $pageObject->getControl("lain2", $id);
		$control_lain2->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing lain2 - end
//	processing pajak_terhutang - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pajak_terhutang = $pageObject->getControl("pajak_terhutang", $id);
		$control_pajak_terhutang->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pajak_terhutang - end
//	processing air_manfaat_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_air_manfaat_id = $pageObject->getControl("air_manfaat_id", $id);
		$control_air_manfaat_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing air_manfaat_id - end
//	processing air_zona_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_air_zona_id = $pageObject->getControl("air_zona_id", $id);
		$control_air_zona_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing air_zona_id - end
//	processing meteran_awal - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_meteran_awal = $pageObject->getControl("meteran_awal", $id);
		$control_meteran_awal->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing meteran_awal - end
//	processing meteran_akhir - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_meteran_akhir = $pageObject->getControl("meteran_akhir", $id);
		$control_meteran_akhir->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing meteran_akhir - end
//	processing volume - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_volume = $pageObject->getControl("volume", $id);
		$control_volume->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing volume - end
//	processing satuan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_satuan = $pageObject->getControl("satuan", $id);
		$control_satuan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing satuan - end
//	processing r_panjang - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_panjang = $pageObject->getControl("r_panjang", $id);
		$control_r_panjang->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_panjang - end
//	processing r_lebar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_lebar = $pageObject->getControl("r_lebar", $id);
		$control_r_lebar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_lebar - end
//	processing r_muka - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_muka = $pageObject->getControl("r_muka", $id);
		$control_r_muka->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_muka - end
//	processing r_banyak - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_banyak = $pageObject->getControl("r_banyak", $id);
		$control_r_banyak->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_banyak - end
//	processing r_luas - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_luas = $pageObject->getControl("r_luas", $id);
		$control_r_luas->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_luas - end
//	processing r_tarifid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_tarifid = $pageObject->getControl("r_tarifid", $id);
		$control_r_tarifid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_tarifid - end
//	processing r_kontrak - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_kontrak = $pageObject->getControl("r_kontrak", $id);
		$control_r_kontrak->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_kontrak - end
//	processing r_lama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_lama = $pageObject->getControl("r_lama", $id);
		$control_r_lama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_lama - end
//	processing r_jalan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_jalan_id = $pageObject->getControl("r_jalan_id", $id);
		$control_r_jalan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_jalan_id - end
//	processing r_jalanklas_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_jalanklas_id = $pageObject->getControl("r_jalanklas_id", $id);
		$control_r_jalanklas_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_jalanklas_id - end
//	processing r_lokasi - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_lokasi = $pageObject->getControl("r_lokasi", $id);
		$control_r_lokasi->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_lokasi - end
//	processing r_judul - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_judul = $pageObject->getControl("r_judul", $id);
		$control_r_judul->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_judul - end
//	processing r_kelurahan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_kelurahan_id = $pageObject->getControl("r_kelurahan_id", $id);
		$control_r_kelurahan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_kelurahan_id - end
//	processing r_lokasi_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_lokasi_id = $pageObject->getControl("r_lokasi_id", $id);
		$control_r_lokasi_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_lokasi_id - end
//	processing r_calculated - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_calculated = $pageObject->getControl("r_calculated", $id);
		$control_r_calculated->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_calculated - end
//	processing r_nsr - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_nsr = $pageObject->getControl("r_nsr", $id);
		$control_r_nsr->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_nsr - end
//	processing r_nsrno - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_nsrno = $pageObject->getControl("r_nsrno", $id);
		$control_r_nsrno->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_nsrno - end
//	processing r_nsrtgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_nsrtgl = $pageObject->getControl("r_nsrtgl", $id);
		$control_r_nsrtgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_nsrtgl - end
//	processing r_nsl_kecamatan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_nsl_kecamatan_id = $pageObject->getControl("r_nsl_kecamatan_id", $id);
		$control_r_nsl_kecamatan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_nsl_kecamatan_id - end
//	processing r_nsl_type_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_nsl_type_id = $pageObject->getControl("r_nsl_type_id", $id);
		$control_r_nsl_type_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_nsl_type_id - end
//	processing r_nsl_nilai - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_nsl_nilai = $pageObject->getControl("r_nsl_nilai", $id);
		$control_r_nsl_nilai->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_nsl_nilai - end
//	processing notes - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_notes = $pageObject->getControl("notes", $id);
		$control_notes->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing notes - end
//	processing unit_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_unit_id = $pageObject->getControl("unit_id", $id);
		$control_unit_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing unit_id - end
//	processing enabled - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_enabled = $pageObject->getControl("enabled", $id);
		$control_enabled->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing enabled - end
//	processing created - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_created = $pageObject->getControl("created", $id);
		$control_created->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing created - end
//	processing create_uid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_create_uid = $pageObject->getControl("create_uid", $id);
		$control_create_uid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing create_uid - end
//	processing updated - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_updated = $pageObject->getControl("updated", $id);
		$control_updated->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing updated - end
//	processing update_uid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_update_uid = $pageObject->getControl("update_uid", $id);
		$control_update_uid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing update_uid - end
//	processing terimanip - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_terimanip = $pageObject->getControl("terimanip", $id);
		$control_terimanip->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing terimanip - end
//	processing terimatgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_terimatgl = $pageObject->getControl("terimatgl", $id);
		$control_terimatgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing terimatgl - end
//	processing kirimtgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kirimtgl = $pageObject->getControl("kirimtgl", $id);
		$control_kirimtgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kirimtgl - end
//	processing isprint_dc - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_isprint_dc = $pageObject->getControl("isprint_dc", $id);
		$control_isprint_dc->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing isprint_dc - end
//	processing r_nsr_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_nsr_id = $pageObject->getControl("r_nsr_id", $id);
		$control_r_nsr_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_nsr_id - end
//	processing r_lokasi_pasang_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_lokasi_pasang_id = $pageObject->getControl("r_lokasi_pasang_id", $id);
		$control_r_lokasi_pasang_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_lokasi_pasang_id - end
//	processing r_lokasi_pasang_val - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_lokasi_pasang_val = $pageObject->getControl("r_lokasi_pasang_val", $id);
		$control_r_lokasi_pasang_val->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_lokasi_pasang_val - end
//	processing r_jalanklas_val - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_jalanklas_val = $pageObject->getControl("r_jalanklas_val", $id);
		$control_r_jalanklas_val->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_jalanklas_val - end
//	processing r_sudut_pandang_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_sudut_pandang_id = $pageObject->getControl("r_sudut_pandang_id", $id);
		$control_r_sudut_pandang_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_sudut_pandang_id - end
//	processing r_sudut_pandang_val - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_sudut_pandang_val = $pageObject->getControl("r_sudut_pandang_val", $id);
		$control_r_sudut_pandang_val->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_sudut_pandang_val - end
//	processing r_tinggi - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_tinggi = $pageObject->getControl("r_tinggi", $id);
		$control_r_tinggi->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_tinggi - end
//	processing r_njop - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_njop = $pageObject->getControl("r_njop", $id);
		$control_r_njop->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_njop - end
//	processing r_status - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_status = $pageObject->getControl("r_status", $id);
		$control_r_status->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_status - end
//	processing r_njop_ketinggian - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_njop_ketinggian = $pageObject->getControl("r_njop_ketinggian", $id);
		$control_r_njop_ketinggian->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_njop_ketinggian - end
//	processing status_pembayaran - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_status_pembayaran = $pageObject->getControl("status_pembayaran", $id);
		$control_status_pembayaran->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing status_pembayaran - end
//	processing rek_no_paneng - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_rek_no_paneng = $pageObject->getControl("rek_no_paneng", $id);
		$control_rek_no_paneng->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing rek_no_paneng - end
//	processing sptno_lengkap - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_sptno_lengkap = $pageObject->getControl("sptno_lengkap", $id);
		$control_sptno_lengkap->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing sptno_lengkap - end
//	processing sptno_lama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_sptno_lama = $pageObject->getControl("sptno_lama", $id);
		$control_sptno_lama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing sptno_lama - end
//	processing r_nama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_nama = $pageObject->getControl("r_nama", $id);
		$control_r_nama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_nama - end
//	processing r_alamat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_r_alamat = $pageObject->getControl("r_alamat", $id);
		$control_r_alamat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing r_alamat - end
//	processing omset1 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset1 = $pageObject->getControl("omset1", $id);
		$control_omset1->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset1 - end
//	processing omset2 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset2 = $pageObject->getControl("omset2", $id);
		$control_omset2->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset2 - end
//	processing omset3 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset3 = $pageObject->getControl("omset3", $id);
		$control_omset3->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset3 - end
//	processing omset4 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset4 = $pageObject->getControl("omset4", $id);
		$control_omset4->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset4 - end
//	processing omset5 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset5 = $pageObject->getControl("omset5", $id);
		$control_omset5->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset5 - end
//	processing omset6 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset6 = $pageObject->getControl("omset6", $id);
		$control_omset6->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset6 - end
//	processing omset7 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset7 = $pageObject->getControl("omset7", $id);
		$control_omset7->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset7 - end
//	processing omset8 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset8 = $pageObject->getControl("omset8", $id);
		$control_omset8->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset8 - end
//	processing omset9 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset9 = $pageObject->getControl("omset9", $id);
		$control_omset9->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset9 - end
//	processing omset10 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset10 = $pageObject->getControl("omset10", $id);
		$control_omset10->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset10 - end
//	processing omset11 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset11 = $pageObject->getControl("omset11", $id);
		$control_omset11->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset11 - end
//	processing omset12 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset12 = $pageObject->getControl("omset12", $id);
		$control_omset12->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset12 - end
//	processing omset13 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset13 = $pageObject->getControl("omset13", $id);
		$control_omset13->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset13 - end
//	processing omset14 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset14 = $pageObject->getControl("omset14", $id);
		$control_omset14->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset14 - end
//	processing omset15 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset15 = $pageObject->getControl("omset15", $id);
		$control_omset15->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset15 - end
//	processing omset16 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset16 = $pageObject->getControl("omset16", $id);
		$control_omset16->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset16 - end
//	processing omset17 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset17 = $pageObject->getControl("omset17", $id);
		$control_omset17->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset17 - end
//	processing omset18 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset18 = $pageObject->getControl("omset18", $id);
		$control_omset18->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset18 - end
//	processing omset19 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset19 = $pageObject->getControl("omset19", $id);
		$control_omset19->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset19 - end
//	processing omset20 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset20 = $pageObject->getControl("omset20", $id);
		$control_omset20->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset20 - end
//	processing omset21 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset21 = $pageObject->getControl("omset21", $id);
		$control_omset21->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset21 - end
//	processing omset22 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset22 = $pageObject->getControl("omset22", $id);
		$control_omset22->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset22 - end
//	processing omset23 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset23 = $pageObject->getControl("omset23", $id);
		$control_omset23->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset23 - end
//	processing omset24 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset24 = $pageObject->getControl("omset24", $id);
		$control_omset24->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset24 - end
//	processing omset25 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset25 = $pageObject->getControl("omset25", $id);
		$control_omset25->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset25 - end
//	processing omset26 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset26 = $pageObject->getControl("omset26", $id);
		$control_omset26->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset26 - end
//	processing omset27 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset27 = $pageObject->getControl("omset27", $id);
		$control_omset27->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset27 - end
//	processing omset28 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset28 = $pageObject->getControl("omset28", $id);
		$control_omset28->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset28 - end
//	processing omset29 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset29 = $pageObject->getControl("omset29", $id);
		$control_omset29->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset29 - end
//	processing omset30 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset30 = $pageObject->getControl("omset30", $id);
		$control_omset30->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset30 - end
//	processing omset31 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset31 = $pageObject->getControl("omset31", $id);
		$control_omset31->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset31 - end
//	processing keterangan1 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan1 = $pageObject->getControl("keterangan1", $id);
		$control_keterangan1->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan1 - end
//	processing keterangan2 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan2 = $pageObject->getControl("keterangan2", $id);
		$control_keterangan2->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan2 - end
//	processing keterangan3 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan3 = $pageObject->getControl("keterangan3", $id);
		$control_keterangan3->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan3 - end
//	processing keterangan4 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan4 = $pageObject->getControl("keterangan4", $id);
		$control_keterangan4->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan4 - end
//	processing keterangan5 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan5 = $pageObject->getControl("keterangan5", $id);
		$control_keterangan5->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan5 - end
//	processing keterangan6 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan6 = $pageObject->getControl("keterangan6", $id);
		$control_keterangan6->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan6 - end
//	processing keterangan7 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan7 = $pageObject->getControl("keterangan7", $id);
		$control_keterangan7->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan7 - end
//	processing keterangan8 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan8 = $pageObject->getControl("keterangan8", $id);
		$control_keterangan8->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan8 - end
//	processing keterangan9 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan9 = $pageObject->getControl("keterangan9", $id);
		$control_keterangan9->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan9 - end
//	processing keterangan10 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan10 = $pageObject->getControl("keterangan10", $id);
		$control_keterangan10->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan10 - end
//	processing keterangan11 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan11 = $pageObject->getControl("keterangan11", $id);
		$control_keterangan11->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan11 - end
//	processing keterangan12 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan12 = $pageObject->getControl("keterangan12", $id);
		$control_keterangan12->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan12 - end
//	processing keterangan13 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan13 = $pageObject->getControl("keterangan13", $id);
		$control_keterangan13->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan13 - end
//	processing keterangan14 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan14 = $pageObject->getControl("keterangan14", $id);
		$control_keterangan14->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan14 - end
//	processing keterangan15 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan15 = $pageObject->getControl("keterangan15", $id);
		$control_keterangan15->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan15 - end
//	processing keterangan16 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan16 = $pageObject->getControl("keterangan16", $id);
		$control_keterangan16->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan16 - end
//	processing keterangan17 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan17 = $pageObject->getControl("keterangan17", $id);
		$control_keterangan17->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan17 - end
//	processing keterangan18 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan18 = $pageObject->getControl("keterangan18", $id);
		$control_keterangan18->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan18 - end
//	processing keterangan19 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan19 = $pageObject->getControl("keterangan19", $id);
		$control_keterangan19->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan19 - end
//	processing keterangan20 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan20 = $pageObject->getControl("keterangan20", $id);
		$control_keterangan20->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan20 - end
//	processing keterangan21 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan21 = $pageObject->getControl("keterangan21", $id);
		$control_keterangan21->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan21 - end
//	processing keterangan22 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan22 = $pageObject->getControl("keterangan22", $id);
		$control_keterangan22->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan22 - end
//	processing keterangan23 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan23 = $pageObject->getControl("keterangan23", $id);
		$control_keterangan23->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan23 - end
//	processing keterangan24 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan24 = $pageObject->getControl("keterangan24", $id);
		$control_keterangan24->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan24 - end
//	processing keterangan25 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan25 = $pageObject->getControl("keterangan25", $id);
		$control_keterangan25->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan25 - end
//	processing keterangan26 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan26 = $pageObject->getControl("keterangan26", $id);
		$control_keterangan26->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan26 - end
//	processing keterangan27 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan27 = $pageObject->getControl("keterangan27", $id);
		$control_keterangan27->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan27 - end
//	processing keterangan28 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan28 = $pageObject->getControl("keterangan28", $id);
		$control_keterangan28->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan28 - end
//	processing keterangan29 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan29 = $pageObject->getControl("keterangan29", $id);
		$control_keterangan29->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan29 - end
//	processing keterangan30 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan30 = $pageObject->getControl("keterangan30", $id);
		$control_keterangan30->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan30 - end
//	processing keterangan31 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan31 = $pageObject->getControl("keterangan31", $id);
		$control_keterangan31->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan31 - end
//	processing doc_no - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_doc_no = $pageObject->getControl("doc_no", $id);
		$control_doc_no->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing doc_no - end
//	processing cara_bayar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_cara_bayar = $pageObject->getControl("cara_bayar", $id);
		$control_cara_bayar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing cara_bayar - end
//	processing kelompok_usaha_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kelompok_usaha_id = $pageObject->getControl("kelompok_usaha_id", $id);
		$control_kelompok_usaha_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kelompok_usaha_id - end
//	processing zona_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_zona_id = $pageObject->getControl("zona_id", $id);
		$control_zona_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing zona_id - end
//	processing manfaat_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_manfaat_id = $pageObject->getControl("manfaat_id", $id);
		$control_manfaat_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing manfaat_id - end
//	processing golongan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_golongan = $pageObject->getControl("golongan", $id);
		$control_golongan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing golongan - end
//	processing omset_lain - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_omset_lain = $pageObject->getControl("omset_lain", $id);
		$control_omset_lain->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing omset_lain - end
//	processing keterangan_lain - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan_lain = $pageObject->getControl("keterangan_lain", $id);
		$control_keterangan_lain->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan_lain - end
//	processing ijin_no - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin_no = $pageObject->getControl("ijin_no", $id);
		$control_ijin_no->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin_no - end
//	processing jenis_masa - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jenis_masa = $pageObject->getControl("jenis_masa", $id);
		$control_jenis_masa->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jenis_masa - end
//	processing skpd_lama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_skpd_lama = $pageObject->getControl("skpd_lama", $id);
		$control_skpd_lama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing skpd_lama - end
//	processing proses - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_proses = $pageObject->getControl("proses", $id);
		$control_proses->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing proses - end
//	processing tanggal_validasi - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tanggal_validasi = $pageObject->getControl("tanggal_validasi", $id);
		$control_tanggal_validasi->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tanggal_validasi - end
//	processing bulan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_bulan = $pageObject->getControl("bulan", $id);
		$control_bulan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing bulan - end
//	processing no_telp - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_no_telp = $pageObject->getControl("no_telp", $id);
		$control_no_telp->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing no_telp - end
//	processing usaha_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_usaha_id = $pageObject->getControl("usaha_id", $id);
		$control_usaha_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing usaha_id - end
//	processing multiple - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_multiple = $pageObject->getControl("multiple", $id);
		$control_multiple->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing multiple - end
//	processing bulan_telat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_bulan_telat = $pageObject->getControl("bulan_telat", $id);
		$control_bulan_telat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing bulan_telat - end


//	insert masterkey value if exists and if not specified
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_customer_usaha")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["customer_usaha_id"]==""){
			$avalues["customer_usaha_id"] = prepare_for_db("customer_usaha_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
	}
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_customer")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["customer_id"]==""){
			$avalues["customer_id"] = prepare_for_db("customer_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
	}
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_jenis_pajak")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["pajak_id"]==""){
			$avalues["pajak_id"] = prepare_for_db("pajak_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
	}
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_rekening")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["rekening_id"]==""){
			$avalues["rekening_id"] = prepare_for_db("rekening_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
	}
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_spt_type")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["type_id"]==""){
			$avalues["type_id"] = prepare_for_db("type_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
	}


	$failed_inline_add=false;
//	add filenames to values
	foreach($afilename_values as $akey=>$value)
		$avalues[$akey]=$value;
	
//	before Add event
	$retval = true;
	if($eventObj->exists("BeforeAdd"))
		$retval = $eventObj->BeforeAdd($avalues,$usermessage,(bool)$inlineadd, $pageObject);
	if($retval && $pageObject->isCaptchaOk)
	{
		//add or set updated lat-lng values for all map fileds with 'UpdateLatLng' ticked
		setUpdatedLatLng($avalues, $pageObject->cipherer->pSet);
		
		$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
		if(DoInsertRecord($strOriginalTableName,$avalues,$blobfields,$id,$pageObject, $pageObject->cipherer))
		{
			$IsSaved=true;
//	after edit event
			if($auditObj || $eventObj->exists("AfterAdd"))
			{
				foreach($keys as $idx=>$val)
					$avalues[$idx]=$val;
			}
			
			if($auditObj)
				$auditObj->LogAdd($strTableName,$avalues,$keys);
				
// Give possibility to all edit controls to clean their data				
//	processing tahun - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tahun->afterSuccessfulSave();
			}
//	processing tahun - end
//	processing sptno - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_sptno->afterSuccessfulSave();
			}
//	processing sptno - end
//	processing customer_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_customer_id->afterSuccessfulSave();
			}
//	processing customer_id - end
//	processing customer_usaha_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_customer_usaha_id->afterSuccessfulSave();
			}
//	processing customer_usaha_id - end
//	processing rekening_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_rekening_id->afterSuccessfulSave();
			}
//	processing rekening_id - end
//	processing pajak_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pajak_id->afterSuccessfulSave();
			}
//	processing pajak_id - end
//	processing type_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_type_id->afterSuccessfulSave();
			}
//	processing type_id - end
//	processing so - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_so->afterSuccessfulSave();
			}
//	processing so - end
//	processing masadari - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_masadari->afterSuccessfulSave();
			}
//	processing masadari - end
//	processing masasd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_masasd->afterSuccessfulSave();
			}
//	processing masasd - end
//	processing jatuhtempotgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jatuhtempotgl->afterSuccessfulSave();
			}
//	processing jatuhtempotgl - end
//	processing r_bayarid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_bayarid->afterSuccessfulSave();
			}
//	processing r_bayarid - end
//	processing minimal_omset - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_minimal_omset->afterSuccessfulSave();
			}
//	processing minimal_omset - end
//	processing dasar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_dasar->afterSuccessfulSave();
			}
//	processing dasar - end
//	processing tarif - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tarif->afterSuccessfulSave();
			}
//	processing tarif - end
//	processing denda - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_denda->afterSuccessfulSave();
			}
//	processing denda - end
//	processing bunga - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_bunga->afterSuccessfulSave();
			}
//	processing bunga - end
//	processing setoran - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_setoran->afterSuccessfulSave();
			}
//	processing setoran - end
//	processing kenaikan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kenaikan->afterSuccessfulSave();
			}
//	processing kenaikan - end
//	processing kompensasi - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kompensasi->afterSuccessfulSave();
			}
//	processing kompensasi - end
//	processing lain2 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_lain2->afterSuccessfulSave();
			}
//	processing lain2 - end
//	processing pajak_terhutang - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pajak_terhutang->afterSuccessfulSave();
			}
//	processing pajak_terhutang - end
//	processing air_manfaat_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_air_manfaat_id->afterSuccessfulSave();
			}
//	processing air_manfaat_id - end
//	processing air_zona_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_air_zona_id->afterSuccessfulSave();
			}
//	processing air_zona_id - end
//	processing meteran_awal - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_meteran_awal->afterSuccessfulSave();
			}
//	processing meteran_awal - end
//	processing meteran_akhir - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_meteran_akhir->afterSuccessfulSave();
			}
//	processing meteran_akhir - end
//	processing volume - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_volume->afterSuccessfulSave();
			}
//	processing volume - end
//	processing satuan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_satuan->afterSuccessfulSave();
			}
//	processing satuan - end
//	processing r_panjang - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_panjang->afterSuccessfulSave();
			}
//	processing r_panjang - end
//	processing r_lebar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_lebar->afterSuccessfulSave();
			}
//	processing r_lebar - end
//	processing r_muka - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_muka->afterSuccessfulSave();
			}
//	processing r_muka - end
//	processing r_banyak - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_banyak->afterSuccessfulSave();
			}
//	processing r_banyak - end
//	processing r_luas - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_luas->afterSuccessfulSave();
			}
//	processing r_luas - end
//	processing r_tarifid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_tarifid->afterSuccessfulSave();
			}
//	processing r_tarifid - end
//	processing r_kontrak - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_kontrak->afterSuccessfulSave();
			}
//	processing r_kontrak - end
//	processing r_lama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_lama->afterSuccessfulSave();
			}
//	processing r_lama - end
//	processing r_jalan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_jalan_id->afterSuccessfulSave();
			}
//	processing r_jalan_id - end
//	processing r_jalanklas_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_jalanklas_id->afterSuccessfulSave();
			}
//	processing r_jalanklas_id - end
//	processing r_lokasi - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_lokasi->afterSuccessfulSave();
			}
//	processing r_lokasi - end
//	processing r_judul - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_judul->afterSuccessfulSave();
			}
//	processing r_judul - end
//	processing r_kelurahan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_kelurahan_id->afterSuccessfulSave();
			}
//	processing r_kelurahan_id - end
//	processing r_lokasi_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_lokasi_id->afterSuccessfulSave();
			}
//	processing r_lokasi_id - end
//	processing r_calculated - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_calculated->afterSuccessfulSave();
			}
//	processing r_calculated - end
//	processing r_nsr - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_nsr->afterSuccessfulSave();
			}
//	processing r_nsr - end
//	processing r_nsrno - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_nsrno->afterSuccessfulSave();
			}
//	processing r_nsrno - end
//	processing r_nsrtgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_nsrtgl->afterSuccessfulSave();
			}
//	processing r_nsrtgl - end
//	processing r_nsl_kecamatan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_nsl_kecamatan_id->afterSuccessfulSave();
			}
//	processing r_nsl_kecamatan_id - end
//	processing r_nsl_type_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_nsl_type_id->afterSuccessfulSave();
			}
//	processing r_nsl_type_id - end
//	processing r_nsl_nilai - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_nsl_nilai->afterSuccessfulSave();
			}
//	processing r_nsl_nilai - end
//	processing notes - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_notes->afterSuccessfulSave();
			}
//	processing notes - end
//	processing unit_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_unit_id->afterSuccessfulSave();
			}
//	processing unit_id - end
//	processing enabled - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_enabled->afterSuccessfulSave();
			}
//	processing enabled - end
//	processing created - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_created->afterSuccessfulSave();
			}
//	processing created - end
//	processing create_uid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_create_uid->afterSuccessfulSave();
			}
//	processing create_uid - end
//	processing updated - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_updated->afterSuccessfulSave();
			}
//	processing updated - end
//	processing update_uid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_update_uid->afterSuccessfulSave();
			}
//	processing update_uid - end
//	processing terimanip - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_terimanip->afterSuccessfulSave();
			}
//	processing terimanip - end
//	processing terimatgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_terimatgl->afterSuccessfulSave();
			}
//	processing terimatgl - end
//	processing kirimtgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kirimtgl->afterSuccessfulSave();
			}
//	processing kirimtgl - end
//	processing isprint_dc - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_isprint_dc->afterSuccessfulSave();
			}
//	processing isprint_dc - end
//	processing r_nsr_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_nsr_id->afterSuccessfulSave();
			}
//	processing r_nsr_id - end
//	processing r_lokasi_pasang_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_lokasi_pasang_id->afterSuccessfulSave();
			}
//	processing r_lokasi_pasang_id - end
//	processing r_lokasi_pasang_val - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_lokasi_pasang_val->afterSuccessfulSave();
			}
//	processing r_lokasi_pasang_val - end
//	processing r_jalanklas_val - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_jalanklas_val->afterSuccessfulSave();
			}
//	processing r_jalanklas_val - end
//	processing r_sudut_pandang_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_sudut_pandang_id->afterSuccessfulSave();
			}
//	processing r_sudut_pandang_id - end
//	processing r_sudut_pandang_val - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_sudut_pandang_val->afterSuccessfulSave();
			}
//	processing r_sudut_pandang_val - end
//	processing r_tinggi - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_tinggi->afterSuccessfulSave();
			}
//	processing r_tinggi - end
//	processing r_njop - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_njop->afterSuccessfulSave();
			}
//	processing r_njop - end
//	processing r_status - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_status->afterSuccessfulSave();
			}
//	processing r_status - end
//	processing r_njop_ketinggian - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_njop_ketinggian->afterSuccessfulSave();
			}
//	processing r_njop_ketinggian - end
//	processing status_pembayaran - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_status_pembayaran->afterSuccessfulSave();
			}
//	processing status_pembayaran - end
//	processing rek_no_paneng - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_rek_no_paneng->afterSuccessfulSave();
			}
//	processing rek_no_paneng - end
//	processing sptno_lengkap - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_sptno_lengkap->afterSuccessfulSave();
			}
//	processing sptno_lengkap - end
//	processing sptno_lama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_sptno_lama->afterSuccessfulSave();
			}
//	processing sptno_lama - end
//	processing r_nama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_nama->afterSuccessfulSave();
			}
//	processing r_nama - end
//	processing r_alamat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_r_alamat->afterSuccessfulSave();
			}
//	processing r_alamat - end
//	processing omset1 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset1->afterSuccessfulSave();
			}
//	processing omset1 - end
//	processing omset2 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset2->afterSuccessfulSave();
			}
//	processing omset2 - end
//	processing omset3 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset3->afterSuccessfulSave();
			}
//	processing omset3 - end
//	processing omset4 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset4->afterSuccessfulSave();
			}
//	processing omset4 - end
//	processing omset5 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset5->afterSuccessfulSave();
			}
//	processing omset5 - end
//	processing omset6 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset6->afterSuccessfulSave();
			}
//	processing omset6 - end
//	processing omset7 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset7->afterSuccessfulSave();
			}
//	processing omset7 - end
//	processing omset8 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset8->afterSuccessfulSave();
			}
//	processing omset8 - end
//	processing omset9 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset9->afterSuccessfulSave();
			}
//	processing omset9 - end
//	processing omset10 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset10->afterSuccessfulSave();
			}
//	processing omset10 - end
//	processing omset11 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset11->afterSuccessfulSave();
			}
//	processing omset11 - end
//	processing omset12 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset12->afterSuccessfulSave();
			}
//	processing omset12 - end
//	processing omset13 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset13->afterSuccessfulSave();
			}
//	processing omset13 - end
//	processing omset14 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset14->afterSuccessfulSave();
			}
//	processing omset14 - end
//	processing omset15 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset15->afterSuccessfulSave();
			}
//	processing omset15 - end
//	processing omset16 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset16->afterSuccessfulSave();
			}
//	processing omset16 - end
//	processing omset17 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset17->afterSuccessfulSave();
			}
//	processing omset17 - end
//	processing omset18 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset18->afterSuccessfulSave();
			}
//	processing omset18 - end
//	processing omset19 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset19->afterSuccessfulSave();
			}
//	processing omset19 - end
//	processing omset20 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset20->afterSuccessfulSave();
			}
//	processing omset20 - end
//	processing omset21 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset21->afterSuccessfulSave();
			}
//	processing omset21 - end
//	processing omset22 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset22->afterSuccessfulSave();
			}
//	processing omset22 - end
//	processing omset23 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset23->afterSuccessfulSave();
			}
//	processing omset23 - end
//	processing omset24 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset24->afterSuccessfulSave();
			}
//	processing omset24 - end
//	processing omset25 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset25->afterSuccessfulSave();
			}
//	processing omset25 - end
//	processing omset26 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset26->afterSuccessfulSave();
			}
//	processing omset26 - end
//	processing omset27 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset27->afterSuccessfulSave();
			}
//	processing omset27 - end
//	processing omset28 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset28->afterSuccessfulSave();
			}
//	processing omset28 - end
//	processing omset29 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset29->afterSuccessfulSave();
			}
//	processing omset29 - end
//	processing omset30 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset30->afterSuccessfulSave();
			}
//	processing omset30 - end
//	processing omset31 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset31->afterSuccessfulSave();
			}
//	processing omset31 - end
//	processing keterangan1 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan1->afterSuccessfulSave();
			}
//	processing keterangan1 - end
//	processing keterangan2 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan2->afterSuccessfulSave();
			}
//	processing keterangan2 - end
//	processing keterangan3 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan3->afterSuccessfulSave();
			}
//	processing keterangan3 - end
//	processing keterangan4 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan4->afterSuccessfulSave();
			}
//	processing keterangan4 - end
//	processing keterangan5 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan5->afterSuccessfulSave();
			}
//	processing keterangan5 - end
//	processing keterangan6 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan6->afterSuccessfulSave();
			}
//	processing keterangan6 - end
//	processing keterangan7 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan7->afterSuccessfulSave();
			}
//	processing keterangan7 - end
//	processing keterangan8 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan8->afterSuccessfulSave();
			}
//	processing keterangan8 - end
//	processing keterangan9 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan9->afterSuccessfulSave();
			}
//	processing keterangan9 - end
//	processing keterangan10 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan10->afterSuccessfulSave();
			}
//	processing keterangan10 - end
//	processing keterangan11 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan11->afterSuccessfulSave();
			}
//	processing keterangan11 - end
//	processing keterangan12 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan12->afterSuccessfulSave();
			}
//	processing keterangan12 - end
//	processing keterangan13 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan13->afterSuccessfulSave();
			}
//	processing keterangan13 - end
//	processing keterangan14 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan14->afterSuccessfulSave();
			}
//	processing keterangan14 - end
//	processing keterangan15 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan15->afterSuccessfulSave();
			}
//	processing keterangan15 - end
//	processing keterangan16 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan16->afterSuccessfulSave();
			}
//	processing keterangan16 - end
//	processing keterangan17 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan17->afterSuccessfulSave();
			}
//	processing keterangan17 - end
//	processing keterangan18 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan18->afterSuccessfulSave();
			}
//	processing keterangan18 - end
//	processing keterangan19 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan19->afterSuccessfulSave();
			}
//	processing keterangan19 - end
//	processing keterangan20 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan20->afterSuccessfulSave();
			}
//	processing keterangan20 - end
//	processing keterangan21 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan21->afterSuccessfulSave();
			}
//	processing keterangan21 - end
//	processing keterangan22 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan22->afterSuccessfulSave();
			}
//	processing keterangan22 - end
//	processing keterangan23 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan23->afterSuccessfulSave();
			}
//	processing keterangan23 - end
//	processing keterangan24 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan24->afterSuccessfulSave();
			}
//	processing keterangan24 - end
//	processing keterangan25 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan25->afterSuccessfulSave();
			}
//	processing keterangan25 - end
//	processing keterangan26 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan26->afterSuccessfulSave();
			}
//	processing keterangan26 - end
//	processing keterangan27 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan27->afterSuccessfulSave();
			}
//	processing keterangan27 - end
//	processing keterangan28 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan28->afterSuccessfulSave();
			}
//	processing keterangan28 - end
//	processing keterangan29 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan29->afterSuccessfulSave();
			}
//	processing keterangan29 - end
//	processing keterangan30 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan30->afterSuccessfulSave();
			}
//	processing keterangan30 - end
//	processing keterangan31 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan31->afterSuccessfulSave();
			}
//	processing keterangan31 - end
//	processing doc_no - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_doc_no->afterSuccessfulSave();
			}
//	processing doc_no - end
//	processing cara_bayar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_cara_bayar->afterSuccessfulSave();
			}
//	processing cara_bayar - end
//	processing kelompok_usaha_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kelompok_usaha_id->afterSuccessfulSave();
			}
//	processing kelompok_usaha_id - end
//	processing zona_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_zona_id->afterSuccessfulSave();
			}
//	processing zona_id - end
//	processing manfaat_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_manfaat_id->afterSuccessfulSave();
			}
//	processing manfaat_id - end
//	processing golongan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_golongan->afterSuccessfulSave();
			}
//	processing golongan - end
//	processing omset_lain - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_omset_lain->afterSuccessfulSave();
			}
//	processing omset_lain - end
//	processing keterangan_lain - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan_lain->afterSuccessfulSave();
			}
//	processing keterangan_lain - end
//	processing ijin_no - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin_no->afterSuccessfulSave();
			}
//	processing ijin_no - end
//	processing jenis_masa - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jenis_masa->afterSuccessfulSave();
			}
//	processing jenis_masa - end
//	processing skpd_lama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_skpd_lama->afterSuccessfulSave();
			}
//	processing skpd_lama - end
//	processing proses - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_proses->afterSuccessfulSave();
			}
//	processing proses - end
//	processing tanggal_validasi - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tanggal_validasi->afterSuccessfulSave();
			}
//	processing tanggal_validasi - end
//	processing bulan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_bulan->afterSuccessfulSave();
			}
//	processing bulan - end
//	processing no_telp - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_no_telp->afterSuccessfulSave();
			}
//	processing no_telp - end
//	processing usaha_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_usaha_id->afterSuccessfulSave();
			}
//	processing usaha_id - end
//	processing multiple - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_multiple->afterSuccessfulSave();
			}
//	processing multiple - end
//	processing bulan_telat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_bulan_telat->afterSuccessfulSave();
			}
//	processing bulan_telat - end

			$afterAdd_id = '';	
			if($eventObj->exists("AfterAdd") && $inlineadd!=ADD_MASTER){
				$eventObj->AfterAdd($avalues,$keys,(bool)$inlineadd, $pageObject);
			} else if ($eventObj->exists("AfterAdd") && $inlineadd==ADD_MASTER){
				if($onFly)
					$eventObj->AfterAdd($avalues,$keys,(bool)$inlineadd, $pageObject);
				else{
					$afterAdd_id = generatePassword(20);	
				
					$_SESSION['after_add_data'][$afterAdd_id] = array(
						'avalues'=>$avalues,
						'keys'=>$keys,
						'inlineadd'=>(bool)$inlineadd,
						'time' => time()
					);	
				}
			}
				
			if($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER)
			{
				$permis = array();
				$keylink = "";$k = 0;
				foreach($keys as $idx=>$val)
				{
					if($k!=0)
						$keylink .="&";
					$keylink .="editid".(++$k)."=".htmlspecialchars(rawurlencode(@$val));
				}
				$permis = $pageObject->getPermissions();				
				if (count($keys))
				{
					$message .="</br>";
					if($pageObject->pSet->hasEditPage() && $permis['edit'])
						$message .='&nbsp;<a href=\'pad_pad_spt_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'pad_pad_spt_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
				}
				$mesClass = "mes_ok";	
			}
		}
		elseif($inlineadd!=ADD_INLINE)
			$mesClass = "mes_not";	
	}
	else
	{
		$message = $usermessage;
		$status = "DECLINED";
		$readavalues = true;
	}
}
if($message)
	$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if (no_output_done() && $inlineadd==ADD_SIMPLE && $IsSaved)
{
	// saving message
	$_SESSION["message_add"] = ($message ? $message : "");
	// redirect
	header("Location: pad_pad_spt_".$pageObject->getPageType().".php");
	// turned on output buffering, so we need to stop script
	exit();
}

if($inlineadd==ADD_MASTER && $IsSaved)
	$_SESSION["message_add"] = ($message ? $message : "");
	
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if($inlineadd==ADD_SIMPLE && isset($_SESSION["message_add"]))
{
	$message = $_SESSION["message_add"];
	unset($_SESSION["message_add"]);
}

$defvalues=array();

//	copy record
if(array_key_exists("copyid1",$_REQUEST) || array_key_exists("editid1",$_REQUEST))
{
	$copykeys=array();
	if(array_key_exists("copyid1",$_REQUEST))
	{
		$copykeys["id"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = $gQuery->gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs = db_query($strSQL,$conn);
	$defvalues = $pageObject->cipherer->DecryptFetchedArray($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id"]="";
//call CopyOnLoad event
	if($eventObj->exists("CopyOnLoad"))
		$eventObj->CopyOnLoad($defvalues,$strWhere, $pageObject);
}
else
{
}


//	set default values for the foreign keys

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_customer_usaha")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["customer_usaha_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_customer")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["customer_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_jenis_pajak")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["pajak_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_rekening")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["rekening_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_spt_type")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["type_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if($readavalues)
{
	$defvalues["tahun"]=@$avalues["tahun"];
	$defvalues["sptno"]=@$avalues["sptno"];
	$defvalues["customer_id"]=@$avalues["customer_id"];
	$defvalues["customer_usaha_id"]=@$avalues["customer_usaha_id"];
	$defvalues["rekening_id"]=@$avalues["rekening_id"];
	$defvalues["pajak_id"]=@$avalues["pajak_id"];
	$defvalues["type_id"]=@$avalues["type_id"];
	$defvalues["so"]=@$avalues["so"];
	$defvalues["masadari"]=@$avalues["masadari"];
	$defvalues["masasd"]=@$avalues["masasd"];
	$defvalues["jatuhtempotgl"]=@$avalues["jatuhtempotgl"];
	$defvalues["r_bayarid"]=@$avalues["r_bayarid"];
	$defvalues["minimal_omset"]=@$avalues["minimal_omset"];
	$defvalues["dasar"]=@$avalues["dasar"];
	$defvalues["tarif"]=@$avalues["tarif"];
	$defvalues["denda"]=@$avalues["denda"];
	$defvalues["bunga"]=@$avalues["bunga"];
	$defvalues["setoran"]=@$avalues["setoran"];
	$defvalues["kenaikan"]=@$avalues["kenaikan"];
	$defvalues["kompensasi"]=@$avalues["kompensasi"];
	$defvalues["lain2"]=@$avalues["lain2"];
	$defvalues["pajak_terhutang"]=@$avalues["pajak_terhutang"];
	$defvalues["air_manfaat_id"]=@$avalues["air_manfaat_id"];
	$defvalues["air_zona_id"]=@$avalues["air_zona_id"];
	$defvalues["meteran_awal"]=@$avalues["meteran_awal"];
	$defvalues["meteran_akhir"]=@$avalues["meteran_akhir"];
	$defvalues["volume"]=@$avalues["volume"];
	$defvalues["satuan"]=@$avalues["satuan"];
	$defvalues["r_panjang"]=@$avalues["r_panjang"];
	$defvalues["r_lebar"]=@$avalues["r_lebar"];
	$defvalues["r_muka"]=@$avalues["r_muka"];
	$defvalues["r_banyak"]=@$avalues["r_banyak"];
	$defvalues["r_luas"]=@$avalues["r_luas"];
	$defvalues["r_tarifid"]=@$avalues["r_tarifid"];
	$defvalues["r_kontrak"]=@$avalues["r_kontrak"];
	$defvalues["r_lama"]=@$avalues["r_lama"];
	$defvalues["r_jalan_id"]=@$avalues["r_jalan_id"];
	$defvalues["r_jalanklas_id"]=@$avalues["r_jalanklas_id"];
	$defvalues["r_lokasi"]=@$avalues["r_lokasi"];
	$defvalues["r_judul"]=@$avalues["r_judul"];
	$defvalues["r_kelurahan_id"]=@$avalues["r_kelurahan_id"];
	$defvalues["r_lokasi_id"]=@$avalues["r_lokasi_id"];
	$defvalues["r_calculated"]=@$avalues["r_calculated"];
	$defvalues["r_nsr"]=@$avalues["r_nsr"];
	$defvalues["r_nsrno"]=@$avalues["r_nsrno"];
	$defvalues["r_nsrtgl"]=@$avalues["r_nsrtgl"];
	$defvalues["r_nsl_kecamatan_id"]=@$avalues["r_nsl_kecamatan_id"];
	$defvalues["r_nsl_type_id"]=@$avalues["r_nsl_type_id"];
	$defvalues["r_nsl_nilai"]=@$avalues["r_nsl_nilai"];
	$defvalues["notes"]=@$avalues["notes"];
	$defvalues["unit_id"]=@$avalues["unit_id"];
	$defvalues["enabled"]=@$avalues["enabled"];
	$defvalues["created"]=@$avalues["created"];
	$defvalues["create_uid"]=@$avalues["create_uid"];
	$defvalues["updated"]=@$avalues["updated"];
	$defvalues["update_uid"]=@$avalues["update_uid"];
	$defvalues["terimanip"]=@$avalues["terimanip"];
	$defvalues["terimatgl"]=@$avalues["terimatgl"];
	$defvalues["kirimtgl"]=@$avalues["kirimtgl"];
	$defvalues["isprint_dc"]=@$avalues["isprint_dc"];
	$defvalues["r_nsr_id"]=@$avalues["r_nsr_id"];
	$defvalues["r_lokasi_pasang_id"]=@$avalues["r_lokasi_pasang_id"];
	$defvalues["r_lokasi_pasang_val"]=@$avalues["r_lokasi_pasang_val"];
	$defvalues["r_jalanklas_val"]=@$avalues["r_jalanklas_val"];
	$defvalues["r_sudut_pandang_id"]=@$avalues["r_sudut_pandang_id"];
	$defvalues["r_sudut_pandang_val"]=@$avalues["r_sudut_pandang_val"];
	$defvalues["r_tinggi"]=@$avalues["r_tinggi"];
	$defvalues["r_njop"]=@$avalues["r_njop"];
	$defvalues["r_status"]=@$avalues["r_status"];
	$defvalues["r_njop_ketinggian"]=@$avalues["r_njop_ketinggian"];
	$defvalues["status_pembayaran"]=@$avalues["status_pembayaran"];
	$defvalues["rek_no_paneng"]=@$avalues["rek_no_paneng"];
	$defvalues["sptno_lengkap"]=@$avalues["sptno_lengkap"];
	$defvalues["sptno_lama"]=@$avalues["sptno_lama"];
	$defvalues["r_nama"]=@$avalues["r_nama"];
	$defvalues["r_alamat"]=@$avalues["r_alamat"];
	$defvalues["omset1"]=@$avalues["omset1"];
	$defvalues["omset2"]=@$avalues["omset2"];
	$defvalues["omset3"]=@$avalues["omset3"];
	$defvalues["omset4"]=@$avalues["omset4"];
	$defvalues["omset5"]=@$avalues["omset5"];
	$defvalues["omset6"]=@$avalues["omset6"];
	$defvalues["omset7"]=@$avalues["omset7"];
	$defvalues["omset8"]=@$avalues["omset8"];
	$defvalues["omset9"]=@$avalues["omset9"];
	$defvalues["omset10"]=@$avalues["omset10"];
	$defvalues["omset11"]=@$avalues["omset11"];
	$defvalues["omset12"]=@$avalues["omset12"];
	$defvalues["omset13"]=@$avalues["omset13"];
	$defvalues["omset14"]=@$avalues["omset14"];
	$defvalues["omset15"]=@$avalues["omset15"];
	$defvalues["omset16"]=@$avalues["omset16"];
	$defvalues["omset17"]=@$avalues["omset17"];
	$defvalues["omset18"]=@$avalues["omset18"];
	$defvalues["omset19"]=@$avalues["omset19"];
	$defvalues["omset20"]=@$avalues["omset20"];
	$defvalues["omset21"]=@$avalues["omset21"];
	$defvalues["omset22"]=@$avalues["omset22"];
	$defvalues["omset23"]=@$avalues["omset23"];
	$defvalues["omset24"]=@$avalues["omset24"];
	$defvalues["omset25"]=@$avalues["omset25"];
	$defvalues["omset26"]=@$avalues["omset26"];
	$defvalues["omset27"]=@$avalues["omset27"];
	$defvalues["omset28"]=@$avalues["omset28"];
	$defvalues["omset29"]=@$avalues["omset29"];
	$defvalues["omset30"]=@$avalues["omset30"];
	$defvalues["omset31"]=@$avalues["omset31"];
	$defvalues["keterangan1"]=@$avalues["keterangan1"];
	$defvalues["keterangan2"]=@$avalues["keterangan2"];
	$defvalues["keterangan3"]=@$avalues["keterangan3"];
	$defvalues["keterangan4"]=@$avalues["keterangan4"];
	$defvalues["keterangan5"]=@$avalues["keterangan5"];
	$defvalues["keterangan6"]=@$avalues["keterangan6"];
	$defvalues["keterangan7"]=@$avalues["keterangan7"];
	$defvalues["keterangan8"]=@$avalues["keterangan8"];
	$defvalues["keterangan9"]=@$avalues["keterangan9"];
	$defvalues["keterangan10"]=@$avalues["keterangan10"];
	$defvalues["keterangan11"]=@$avalues["keterangan11"];
	$defvalues["keterangan12"]=@$avalues["keterangan12"];
	$defvalues["keterangan13"]=@$avalues["keterangan13"];
	$defvalues["keterangan14"]=@$avalues["keterangan14"];
	$defvalues["keterangan15"]=@$avalues["keterangan15"];
	$defvalues["keterangan16"]=@$avalues["keterangan16"];
	$defvalues["keterangan17"]=@$avalues["keterangan17"];
	$defvalues["keterangan18"]=@$avalues["keterangan18"];
	$defvalues["keterangan19"]=@$avalues["keterangan19"];
	$defvalues["keterangan20"]=@$avalues["keterangan20"];
	$defvalues["keterangan21"]=@$avalues["keterangan21"];
	$defvalues["keterangan22"]=@$avalues["keterangan22"];
	$defvalues["keterangan23"]=@$avalues["keterangan23"];
	$defvalues["keterangan24"]=@$avalues["keterangan24"];
	$defvalues["keterangan25"]=@$avalues["keterangan25"];
	$defvalues["keterangan26"]=@$avalues["keterangan26"];
	$defvalues["keterangan27"]=@$avalues["keterangan27"];
	$defvalues["keterangan28"]=@$avalues["keterangan28"];
	$defvalues["keterangan29"]=@$avalues["keterangan29"];
	$defvalues["keterangan30"]=@$avalues["keterangan30"];
	$defvalues["keterangan31"]=@$avalues["keterangan31"];
	$defvalues["doc_no"]=@$avalues["doc_no"];
	$defvalues["cara_bayar"]=@$avalues["cara_bayar"];
	$defvalues["kelompok_usaha_id"]=@$avalues["kelompok_usaha_id"];
	$defvalues["zona_id"]=@$avalues["zona_id"];
	$defvalues["manfaat_id"]=@$avalues["manfaat_id"];
	$defvalues["golongan"]=@$avalues["golongan"];
	$defvalues["omset_lain"]=@$avalues["omset_lain"];
	$defvalues["keterangan_lain"]=@$avalues["keterangan_lain"];
	$defvalues["ijin_no"]=@$avalues["ijin_no"];
	$defvalues["jenis_masa"]=@$avalues["jenis_masa"];
	$defvalues["skpd_lama"]=@$avalues["skpd_lama"];
	$defvalues["proses"]=@$avalues["proses"];
	$defvalues["tanggal_validasi"]=@$avalues["tanggal_validasi"];
	$defvalues["bulan"]=@$avalues["bulan"];
	$defvalues["no_telp"]=@$avalues["no_telp"];
	$defvalues["usaha_id"]=@$avalues["usaha_id"];
	$defvalues["multiple"]=@$avalues["multiple"];
	$defvalues["bulan_telat"]=@$avalues["bulan_telat"];
}

if($eventObj->exists("ProcessValuesAdd"))
	$eventObj->ProcessValuesAdd($defvalues, $pageObject);


//for basic files
$includes="";

if($inlineadd!=ADD_INLINE)
{
	if($inlineadd!=ADD_ONTHEFLY && $inlineadd!=ADD_POPUP)
	{
		$includes .="<script language=\"JavaScript\" src=\"include/loadfirst.js\"></script>\r\n";
				$includes.="<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";
		if (!isMobile())
			$includes.="<div id=\"search_suggest\"></div>\r\n";
	}
	
	if(!$pageObject->isAppearOnTabs("tahun"))
		$xt->assign("tahun_fieldblock",true);
	else
		$xt->assign("tahun_tabfieldblock",true);
	$xt->assign("tahun_label",true);
	if(isEnableSection508())
		$xt->assign_section("tahun_label","<label for=\"".GetInputElementId("tahun", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("sptno"))
		$xt->assign("sptno_fieldblock",true);
	else
		$xt->assign("sptno_tabfieldblock",true);
	$xt->assign("sptno_label",true);
	if(isEnableSection508())
		$xt->assign_section("sptno_label","<label for=\"".GetInputElementId("sptno", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("customer_id"))
		$xt->assign("customer_id_fieldblock",true);
	else
		$xt->assign("customer_id_tabfieldblock",true);
	$xt->assign("customer_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("customer_id_label","<label for=\"".GetInputElementId("customer_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("customer_usaha_id"))
		$xt->assign("customer_usaha_id_fieldblock",true);
	else
		$xt->assign("customer_usaha_id_tabfieldblock",true);
	$xt->assign("customer_usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("customer_usaha_id_label","<label for=\"".GetInputElementId("customer_usaha_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("rekening_id"))
		$xt->assign("rekening_id_fieldblock",true);
	else
		$xt->assign("rekening_id_tabfieldblock",true);
	$xt->assign("rekening_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("rekening_id_label","<label for=\"".GetInputElementId("rekening_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pajak_id"))
		$xt->assign("pajak_id_fieldblock",true);
	else
		$xt->assign("pajak_id_tabfieldblock",true);
	$xt->assign("pajak_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("pajak_id_label","<label for=\"".GetInputElementId("pajak_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("type_id"))
		$xt->assign("type_id_fieldblock",true);
	else
		$xt->assign("type_id_tabfieldblock",true);
	$xt->assign("type_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("type_id_label","<label for=\"".GetInputElementId("type_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("so"))
		$xt->assign("so_fieldblock",true);
	else
		$xt->assign("so_tabfieldblock",true);
	$xt->assign("so_label",true);
	if(isEnableSection508())
		$xt->assign_section("so_label","<label for=\"".GetInputElementId("so", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("masadari"))
		$xt->assign("masadari_fieldblock",true);
	else
		$xt->assign("masadari_tabfieldblock",true);
	$xt->assign("masadari_label",true);
	if(isEnableSection508())
		$xt->assign_section("masadari_label","<label for=\"".GetInputElementId("masadari", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("masasd"))
		$xt->assign("masasd_fieldblock",true);
	else
		$xt->assign("masasd_tabfieldblock",true);
	$xt->assign("masasd_label",true);
	if(isEnableSection508())
		$xt->assign_section("masasd_label","<label for=\"".GetInputElementId("masasd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("jatuhtempotgl"))
		$xt->assign("jatuhtempotgl_fieldblock",true);
	else
		$xt->assign("jatuhtempotgl_tabfieldblock",true);
	$xt->assign("jatuhtempotgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("jatuhtempotgl_label","<label for=\"".GetInputElementId("jatuhtempotgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_bayarid"))
		$xt->assign("r_bayarid_fieldblock",true);
	else
		$xt->assign("r_bayarid_tabfieldblock",true);
	$xt->assign("r_bayarid_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_bayarid_label","<label for=\"".GetInputElementId("r_bayarid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("minimal_omset"))
		$xt->assign("minimal_omset_fieldblock",true);
	else
		$xt->assign("minimal_omset_tabfieldblock",true);
	$xt->assign("minimal_omset_label",true);
	if(isEnableSection508())
		$xt->assign_section("minimal_omset_label","<label for=\"".GetInputElementId("minimal_omset", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("dasar"))
		$xt->assign("dasar_fieldblock",true);
	else
		$xt->assign("dasar_tabfieldblock",true);
	$xt->assign("dasar_label",true);
	if(isEnableSection508())
		$xt->assign_section("dasar_label","<label for=\"".GetInputElementId("dasar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tarif"))
		$xt->assign("tarif_fieldblock",true);
	else
		$xt->assign("tarif_tabfieldblock",true);
	$xt->assign("tarif_label",true);
	if(isEnableSection508())
		$xt->assign_section("tarif_label","<label for=\"".GetInputElementId("tarif", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("denda"))
		$xt->assign("denda_fieldblock",true);
	else
		$xt->assign("denda_tabfieldblock",true);
	$xt->assign("denda_label",true);
	if(isEnableSection508())
		$xt->assign_section("denda_label","<label for=\"".GetInputElementId("denda", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("bunga"))
		$xt->assign("bunga_fieldblock",true);
	else
		$xt->assign("bunga_tabfieldblock",true);
	$xt->assign("bunga_label",true);
	if(isEnableSection508())
		$xt->assign_section("bunga_label","<label for=\"".GetInputElementId("bunga", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("setoran"))
		$xt->assign("setoran_fieldblock",true);
	else
		$xt->assign("setoran_tabfieldblock",true);
	$xt->assign("setoran_label",true);
	if(isEnableSection508())
		$xt->assign_section("setoran_label","<label for=\"".GetInputElementId("setoran", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kenaikan"))
		$xt->assign("kenaikan_fieldblock",true);
	else
		$xt->assign("kenaikan_tabfieldblock",true);
	$xt->assign("kenaikan_label",true);
	if(isEnableSection508())
		$xt->assign_section("kenaikan_label","<label for=\"".GetInputElementId("kenaikan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kompensasi"))
		$xt->assign("kompensasi_fieldblock",true);
	else
		$xt->assign("kompensasi_tabfieldblock",true);
	$xt->assign("kompensasi_label",true);
	if(isEnableSection508())
		$xt->assign_section("kompensasi_label","<label for=\"".GetInputElementId("kompensasi", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("lain2"))
		$xt->assign("lain2_fieldblock",true);
	else
		$xt->assign("lain2_tabfieldblock",true);
	$xt->assign("lain2_label",true);
	if(isEnableSection508())
		$xt->assign_section("lain2_label","<label for=\"".GetInputElementId("lain2", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pajak_terhutang"))
		$xt->assign("pajak_terhutang_fieldblock",true);
	else
		$xt->assign("pajak_terhutang_tabfieldblock",true);
	$xt->assign("pajak_terhutang_label",true);
	if(isEnableSection508())
		$xt->assign_section("pajak_terhutang_label","<label for=\"".GetInputElementId("pajak_terhutang", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("air_manfaat_id"))
		$xt->assign("air_manfaat_id_fieldblock",true);
	else
		$xt->assign("air_manfaat_id_tabfieldblock",true);
	$xt->assign("air_manfaat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("air_manfaat_id_label","<label for=\"".GetInputElementId("air_manfaat_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("air_zona_id"))
		$xt->assign("air_zona_id_fieldblock",true);
	else
		$xt->assign("air_zona_id_tabfieldblock",true);
	$xt->assign("air_zona_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("air_zona_id_label","<label for=\"".GetInputElementId("air_zona_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("meteran_awal"))
		$xt->assign("meteran_awal_fieldblock",true);
	else
		$xt->assign("meteran_awal_tabfieldblock",true);
	$xt->assign("meteran_awal_label",true);
	if(isEnableSection508())
		$xt->assign_section("meteran_awal_label","<label for=\"".GetInputElementId("meteran_awal", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("meteran_akhir"))
		$xt->assign("meteran_akhir_fieldblock",true);
	else
		$xt->assign("meteran_akhir_tabfieldblock",true);
	$xt->assign("meteran_akhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("meteran_akhir_label","<label for=\"".GetInputElementId("meteran_akhir", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("volume"))
		$xt->assign("volume_fieldblock",true);
	else
		$xt->assign("volume_tabfieldblock",true);
	$xt->assign("volume_label",true);
	if(isEnableSection508())
		$xt->assign_section("volume_label","<label for=\"".GetInputElementId("volume", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("satuan"))
		$xt->assign("satuan_fieldblock",true);
	else
		$xt->assign("satuan_tabfieldblock",true);
	$xt->assign("satuan_label",true);
	if(isEnableSection508())
		$xt->assign_section("satuan_label","<label for=\"".GetInputElementId("satuan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_panjang"))
		$xt->assign("r_panjang_fieldblock",true);
	else
		$xt->assign("r_panjang_tabfieldblock",true);
	$xt->assign("r_panjang_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_panjang_label","<label for=\"".GetInputElementId("r_panjang", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_lebar"))
		$xt->assign("r_lebar_fieldblock",true);
	else
		$xt->assign("r_lebar_tabfieldblock",true);
	$xt->assign("r_lebar_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lebar_label","<label for=\"".GetInputElementId("r_lebar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_muka"))
		$xt->assign("r_muka_fieldblock",true);
	else
		$xt->assign("r_muka_tabfieldblock",true);
	$xt->assign("r_muka_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_muka_label","<label for=\"".GetInputElementId("r_muka", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_banyak"))
		$xt->assign("r_banyak_fieldblock",true);
	else
		$xt->assign("r_banyak_tabfieldblock",true);
	$xt->assign("r_banyak_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_banyak_label","<label for=\"".GetInputElementId("r_banyak", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_luas"))
		$xt->assign("r_luas_fieldblock",true);
	else
		$xt->assign("r_luas_tabfieldblock",true);
	$xt->assign("r_luas_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_luas_label","<label for=\"".GetInputElementId("r_luas", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_tarifid"))
		$xt->assign("r_tarifid_fieldblock",true);
	else
		$xt->assign("r_tarifid_tabfieldblock",true);
	$xt->assign("r_tarifid_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_tarifid_label","<label for=\"".GetInputElementId("r_tarifid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_kontrak"))
		$xt->assign("r_kontrak_fieldblock",true);
	else
		$xt->assign("r_kontrak_tabfieldblock",true);
	$xt->assign("r_kontrak_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_kontrak_label","<label for=\"".GetInputElementId("r_kontrak", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_lama"))
		$xt->assign("r_lama_fieldblock",true);
	else
		$xt->assign("r_lama_tabfieldblock",true);
	$xt->assign("r_lama_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lama_label","<label for=\"".GetInputElementId("r_lama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_jalan_id"))
		$xt->assign("r_jalan_id_fieldblock",true);
	else
		$xt->assign("r_jalan_id_tabfieldblock",true);
	$xt->assign("r_jalan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_jalan_id_label","<label for=\"".GetInputElementId("r_jalan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_jalanklas_id"))
		$xt->assign("r_jalanklas_id_fieldblock",true);
	else
		$xt->assign("r_jalanklas_id_tabfieldblock",true);
	$xt->assign("r_jalanklas_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_jalanklas_id_label","<label for=\"".GetInputElementId("r_jalanklas_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_lokasi"))
		$xt->assign("r_lokasi_fieldblock",true);
	else
		$xt->assign("r_lokasi_tabfieldblock",true);
	$xt->assign("r_lokasi_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_label","<label for=\"".GetInputElementId("r_lokasi", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_judul"))
		$xt->assign("r_judul_fieldblock",true);
	else
		$xt->assign("r_judul_tabfieldblock",true);
	$xt->assign("r_judul_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_judul_label","<label for=\"".GetInputElementId("r_judul", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_kelurahan_id"))
		$xt->assign("r_kelurahan_id_fieldblock",true);
	else
		$xt->assign("r_kelurahan_id_tabfieldblock",true);
	$xt->assign("r_kelurahan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_kelurahan_id_label","<label for=\"".GetInputElementId("r_kelurahan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_lokasi_id"))
		$xt->assign("r_lokasi_id_fieldblock",true);
	else
		$xt->assign("r_lokasi_id_tabfieldblock",true);
	$xt->assign("r_lokasi_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_id_label","<label for=\"".GetInputElementId("r_lokasi_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_calculated"))
		$xt->assign("r_calculated_fieldblock",true);
	else
		$xt->assign("r_calculated_tabfieldblock",true);
	$xt->assign("r_calculated_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_calculated_label","<label for=\"".GetInputElementId("r_calculated", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_nsr"))
		$xt->assign("r_nsr_fieldblock",true);
	else
		$xt->assign("r_nsr_tabfieldblock",true);
	$xt->assign("r_nsr_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsr_label","<label for=\"".GetInputElementId("r_nsr", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_nsrno"))
		$xt->assign("r_nsrno_fieldblock",true);
	else
		$xt->assign("r_nsrno_tabfieldblock",true);
	$xt->assign("r_nsrno_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsrno_label","<label for=\"".GetInputElementId("r_nsrno", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_nsrtgl"))
		$xt->assign("r_nsrtgl_fieldblock",true);
	else
		$xt->assign("r_nsrtgl_tabfieldblock",true);
	$xt->assign("r_nsrtgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsrtgl_label","<label for=\"".GetInputElementId("r_nsrtgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_nsl_kecamatan_id"))
		$xt->assign("r_nsl_kecamatan_id_fieldblock",true);
	else
		$xt->assign("r_nsl_kecamatan_id_tabfieldblock",true);
	$xt->assign("r_nsl_kecamatan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsl_kecamatan_id_label","<label for=\"".GetInputElementId("r_nsl_kecamatan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_nsl_type_id"))
		$xt->assign("r_nsl_type_id_fieldblock",true);
	else
		$xt->assign("r_nsl_type_id_tabfieldblock",true);
	$xt->assign("r_nsl_type_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsl_type_id_label","<label for=\"".GetInputElementId("r_nsl_type_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_nsl_nilai"))
		$xt->assign("r_nsl_nilai_fieldblock",true);
	else
		$xt->assign("r_nsl_nilai_tabfieldblock",true);
	$xt->assign("r_nsl_nilai_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsl_nilai_label","<label for=\"".GetInputElementId("r_nsl_nilai", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("notes"))
		$xt->assign("notes_fieldblock",true);
	else
		$xt->assign("notes_tabfieldblock",true);
	$xt->assign("notes_label",true);
	if(isEnableSection508())
		$xt->assign_section("notes_label","<label for=\"".GetInputElementId("notes", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("unit_id"))
		$xt->assign("unit_id_fieldblock",true);
	else
		$xt->assign("unit_id_tabfieldblock",true);
	$xt->assign("unit_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("unit_id_label","<label for=\"".GetInputElementId("unit_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("enabled"))
		$xt->assign("enabled_fieldblock",true);
	else
		$xt->assign("enabled_tabfieldblock",true);
	$xt->assign("enabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("enabled_label","<label for=\"".GetInputElementId("enabled", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
	$xt->assign("created_label",true);
	if(isEnableSection508())
		$xt->assign_section("created_label","<label for=\"".GetInputElementId("created", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
	$xt->assign("create_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_uid_label","<label for=\"".GetInputElementId("create_uid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("updated"))
		$xt->assign("updated_fieldblock",true);
	else
		$xt->assign("updated_tabfieldblock",true);
	$xt->assign("updated_label",true);
	if(isEnableSection508())
		$xt->assign_section("updated_label","<label for=\"".GetInputElementId("updated", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("update_uid"))
		$xt->assign("update_uid_fieldblock",true);
	else
		$xt->assign("update_uid_tabfieldblock",true);
	$xt->assign("update_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("update_uid_label","<label for=\"".GetInputElementId("update_uid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("terimanip"))
		$xt->assign("terimanip_fieldblock",true);
	else
		$xt->assign("terimanip_tabfieldblock",true);
	$xt->assign("terimanip_label",true);
	if(isEnableSection508())
		$xt->assign_section("terimanip_label","<label for=\"".GetInputElementId("terimanip", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("terimatgl"))
		$xt->assign("terimatgl_fieldblock",true);
	else
		$xt->assign("terimatgl_tabfieldblock",true);
	$xt->assign("terimatgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("terimatgl_label","<label for=\"".GetInputElementId("terimatgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kirimtgl"))
		$xt->assign("kirimtgl_fieldblock",true);
	else
		$xt->assign("kirimtgl_tabfieldblock",true);
	$xt->assign("kirimtgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("kirimtgl_label","<label for=\"".GetInputElementId("kirimtgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("isprint_dc"))
		$xt->assign("isprint_dc_fieldblock",true);
	else
		$xt->assign("isprint_dc_tabfieldblock",true);
	$xt->assign("isprint_dc_label",true);
	if(isEnableSection508())
		$xt->assign_section("isprint_dc_label","<label for=\"".GetInputElementId("isprint_dc", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_nsr_id"))
		$xt->assign("r_nsr_id_fieldblock",true);
	else
		$xt->assign("r_nsr_id_tabfieldblock",true);
	$xt->assign("r_nsr_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsr_id_label","<label for=\"".GetInputElementId("r_nsr_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_lokasi_pasang_id"))
		$xt->assign("r_lokasi_pasang_id_fieldblock",true);
	else
		$xt->assign("r_lokasi_pasang_id_tabfieldblock",true);
	$xt->assign("r_lokasi_pasang_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_pasang_id_label","<label for=\"".GetInputElementId("r_lokasi_pasang_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_lokasi_pasang_val"))
		$xt->assign("r_lokasi_pasang_val_fieldblock",true);
	else
		$xt->assign("r_lokasi_pasang_val_tabfieldblock",true);
	$xt->assign("r_lokasi_pasang_val_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_pasang_val_label","<label for=\"".GetInputElementId("r_lokasi_pasang_val", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_jalanklas_val"))
		$xt->assign("r_jalanklas_val_fieldblock",true);
	else
		$xt->assign("r_jalanklas_val_tabfieldblock",true);
	$xt->assign("r_jalanklas_val_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_jalanklas_val_label","<label for=\"".GetInputElementId("r_jalanklas_val", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_sudut_pandang_id"))
		$xt->assign("r_sudut_pandang_id_fieldblock",true);
	else
		$xt->assign("r_sudut_pandang_id_tabfieldblock",true);
	$xt->assign("r_sudut_pandang_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_sudut_pandang_id_label","<label for=\"".GetInputElementId("r_sudut_pandang_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_sudut_pandang_val"))
		$xt->assign("r_sudut_pandang_val_fieldblock",true);
	else
		$xt->assign("r_sudut_pandang_val_tabfieldblock",true);
	$xt->assign("r_sudut_pandang_val_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_sudut_pandang_val_label","<label for=\"".GetInputElementId("r_sudut_pandang_val", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_tinggi"))
		$xt->assign("r_tinggi_fieldblock",true);
	else
		$xt->assign("r_tinggi_tabfieldblock",true);
	$xt->assign("r_tinggi_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_tinggi_label","<label for=\"".GetInputElementId("r_tinggi", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_njop"))
		$xt->assign("r_njop_fieldblock",true);
	else
		$xt->assign("r_njop_tabfieldblock",true);
	$xt->assign("r_njop_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_njop_label","<label for=\"".GetInputElementId("r_njop", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_status"))
		$xt->assign("r_status_fieldblock",true);
	else
		$xt->assign("r_status_tabfieldblock",true);
	$xt->assign("r_status_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_status_label","<label for=\"".GetInputElementId("r_status", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_njop_ketinggian"))
		$xt->assign("r_njop_ketinggian_fieldblock",true);
	else
		$xt->assign("r_njop_ketinggian_tabfieldblock",true);
	$xt->assign("r_njop_ketinggian_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_njop_ketinggian_label","<label for=\"".GetInputElementId("r_njop_ketinggian", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("status_pembayaran"))
		$xt->assign("status_pembayaran_fieldblock",true);
	else
		$xt->assign("status_pembayaran_tabfieldblock",true);
	$xt->assign("status_pembayaran_label",true);
	if(isEnableSection508())
		$xt->assign_section("status_pembayaran_label","<label for=\"".GetInputElementId("status_pembayaran", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("rek_no_paneng"))
		$xt->assign("rek_no_paneng_fieldblock",true);
	else
		$xt->assign("rek_no_paneng_tabfieldblock",true);
	$xt->assign("rek_no_paneng_label",true);
	if(isEnableSection508())
		$xt->assign_section("rek_no_paneng_label","<label for=\"".GetInputElementId("rek_no_paneng", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("sptno_lengkap"))
		$xt->assign("sptno_lengkap_fieldblock",true);
	else
		$xt->assign("sptno_lengkap_tabfieldblock",true);
	$xt->assign("sptno_lengkap_label",true);
	if(isEnableSection508())
		$xt->assign_section("sptno_lengkap_label","<label for=\"".GetInputElementId("sptno_lengkap", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("sptno_lama"))
		$xt->assign("sptno_lama_fieldblock",true);
	else
		$xt->assign("sptno_lama_tabfieldblock",true);
	$xt->assign("sptno_lama_label",true);
	if(isEnableSection508())
		$xt->assign_section("sptno_lama_label","<label for=\"".GetInputElementId("sptno_lama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_nama"))
		$xt->assign("r_nama_fieldblock",true);
	else
		$xt->assign("r_nama_tabfieldblock",true);
	$xt->assign("r_nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nama_label","<label for=\"".GetInputElementId("r_nama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("r_alamat"))
		$xt->assign("r_alamat_fieldblock",true);
	else
		$xt->assign("r_alamat_tabfieldblock",true);
	$xt->assign("r_alamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_alamat_label","<label for=\"".GetInputElementId("r_alamat", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset1"))
		$xt->assign("omset1_fieldblock",true);
	else
		$xt->assign("omset1_tabfieldblock",true);
	$xt->assign("omset1_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset1_label","<label for=\"".GetInputElementId("omset1", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset2"))
		$xt->assign("omset2_fieldblock",true);
	else
		$xt->assign("omset2_tabfieldblock",true);
	$xt->assign("omset2_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset2_label","<label for=\"".GetInputElementId("omset2", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset3"))
		$xt->assign("omset3_fieldblock",true);
	else
		$xt->assign("omset3_tabfieldblock",true);
	$xt->assign("omset3_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset3_label","<label for=\"".GetInputElementId("omset3", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset4"))
		$xt->assign("omset4_fieldblock",true);
	else
		$xt->assign("omset4_tabfieldblock",true);
	$xt->assign("omset4_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset4_label","<label for=\"".GetInputElementId("omset4", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset5"))
		$xt->assign("omset5_fieldblock",true);
	else
		$xt->assign("omset5_tabfieldblock",true);
	$xt->assign("omset5_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset5_label","<label for=\"".GetInputElementId("omset5", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset6"))
		$xt->assign("omset6_fieldblock",true);
	else
		$xt->assign("omset6_tabfieldblock",true);
	$xt->assign("omset6_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset6_label","<label for=\"".GetInputElementId("omset6", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset7"))
		$xt->assign("omset7_fieldblock",true);
	else
		$xt->assign("omset7_tabfieldblock",true);
	$xt->assign("omset7_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset7_label","<label for=\"".GetInputElementId("omset7", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset8"))
		$xt->assign("omset8_fieldblock",true);
	else
		$xt->assign("omset8_tabfieldblock",true);
	$xt->assign("omset8_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset8_label","<label for=\"".GetInputElementId("omset8", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset9"))
		$xt->assign("omset9_fieldblock",true);
	else
		$xt->assign("omset9_tabfieldblock",true);
	$xt->assign("omset9_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset9_label","<label for=\"".GetInputElementId("omset9", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset10"))
		$xt->assign("omset10_fieldblock",true);
	else
		$xt->assign("omset10_tabfieldblock",true);
	$xt->assign("omset10_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset10_label","<label for=\"".GetInputElementId("omset10", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset11"))
		$xt->assign("omset11_fieldblock",true);
	else
		$xt->assign("omset11_tabfieldblock",true);
	$xt->assign("omset11_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset11_label","<label for=\"".GetInputElementId("omset11", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset12"))
		$xt->assign("omset12_fieldblock",true);
	else
		$xt->assign("omset12_tabfieldblock",true);
	$xt->assign("omset12_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset12_label","<label for=\"".GetInputElementId("omset12", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset13"))
		$xt->assign("omset13_fieldblock",true);
	else
		$xt->assign("omset13_tabfieldblock",true);
	$xt->assign("omset13_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset13_label","<label for=\"".GetInputElementId("omset13", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset14"))
		$xt->assign("omset14_fieldblock",true);
	else
		$xt->assign("omset14_tabfieldblock",true);
	$xt->assign("omset14_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset14_label","<label for=\"".GetInputElementId("omset14", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset15"))
		$xt->assign("omset15_fieldblock",true);
	else
		$xt->assign("omset15_tabfieldblock",true);
	$xt->assign("omset15_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset15_label","<label for=\"".GetInputElementId("omset15", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset16"))
		$xt->assign("omset16_fieldblock",true);
	else
		$xt->assign("omset16_tabfieldblock",true);
	$xt->assign("omset16_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset16_label","<label for=\"".GetInputElementId("omset16", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset17"))
		$xt->assign("omset17_fieldblock",true);
	else
		$xt->assign("omset17_tabfieldblock",true);
	$xt->assign("omset17_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset17_label","<label for=\"".GetInputElementId("omset17", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset18"))
		$xt->assign("omset18_fieldblock",true);
	else
		$xt->assign("omset18_tabfieldblock",true);
	$xt->assign("omset18_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset18_label","<label for=\"".GetInputElementId("omset18", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset19"))
		$xt->assign("omset19_fieldblock",true);
	else
		$xt->assign("omset19_tabfieldblock",true);
	$xt->assign("omset19_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset19_label","<label for=\"".GetInputElementId("omset19", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset20"))
		$xt->assign("omset20_fieldblock",true);
	else
		$xt->assign("omset20_tabfieldblock",true);
	$xt->assign("omset20_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset20_label","<label for=\"".GetInputElementId("omset20", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset21"))
		$xt->assign("omset21_fieldblock",true);
	else
		$xt->assign("omset21_tabfieldblock",true);
	$xt->assign("omset21_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset21_label","<label for=\"".GetInputElementId("omset21", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset22"))
		$xt->assign("omset22_fieldblock",true);
	else
		$xt->assign("omset22_tabfieldblock",true);
	$xt->assign("omset22_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset22_label","<label for=\"".GetInputElementId("omset22", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset23"))
		$xt->assign("omset23_fieldblock",true);
	else
		$xt->assign("omset23_tabfieldblock",true);
	$xt->assign("omset23_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset23_label","<label for=\"".GetInputElementId("omset23", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset24"))
		$xt->assign("omset24_fieldblock",true);
	else
		$xt->assign("omset24_tabfieldblock",true);
	$xt->assign("omset24_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset24_label","<label for=\"".GetInputElementId("omset24", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset25"))
		$xt->assign("omset25_fieldblock",true);
	else
		$xt->assign("omset25_tabfieldblock",true);
	$xt->assign("omset25_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset25_label","<label for=\"".GetInputElementId("omset25", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset26"))
		$xt->assign("omset26_fieldblock",true);
	else
		$xt->assign("omset26_tabfieldblock",true);
	$xt->assign("omset26_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset26_label","<label for=\"".GetInputElementId("omset26", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset27"))
		$xt->assign("omset27_fieldblock",true);
	else
		$xt->assign("omset27_tabfieldblock",true);
	$xt->assign("omset27_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset27_label","<label for=\"".GetInputElementId("omset27", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset28"))
		$xt->assign("omset28_fieldblock",true);
	else
		$xt->assign("omset28_tabfieldblock",true);
	$xt->assign("omset28_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset28_label","<label for=\"".GetInputElementId("omset28", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset29"))
		$xt->assign("omset29_fieldblock",true);
	else
		$xt->assign("omset29_tabfieldblock",true);
	$xt->assign("omset29_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset29_label","<label for=\"".GetInputElementId("omset29", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset30"))
		$xt->assign("omset30_fieldblock",true);
	else
		$xt->assign("omset30_tabfieldblock",true);
	$xt->assign("omset30_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset30_label","<label for=\"".GetInputElementId("omset30", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset31"))
		$xt->assign("omset31_fieldblock",true);
	else
		$xt->assign("omset31_tabfieldblock",true);
	$xt->assign("omset31_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset31_label","<label for=\"".GetInputElementId("omset31", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan1"))
		$xt->assign("keterangan1_fieldblock",true);
	else
		$xt->assign("keterangan1_tabfieldblock",true);
	$xt->assign("keterangan1_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan1_label","<label for=\"".GetInputElementId("keterangan1", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan2"))
		$xt->assign("keterangan2_fieldblock",true);
	else
		$xt->assign("keterangan2_tabfieldblock",true);
	$xt->assign("keterangan2_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan2_label","<label for=\"".GetInputElementId("keterangan2", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan3"))
		$xt->assign("keterangan3_fieldblock",true);
	else
		$xt->assign("keterangan3_tabfieldblock",true);
	$xt->assign("keterangan3_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan3_label","<label for=\"".GetInputElementId("keterangan3", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan4"))
		$xt->assign("keterangan4_fieldblock",true);
	else
		$xt->assign("keterangan4_tabfieldblock",true);
	$xt->assign("keterangan4_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan4_label","<label for=\"".GetInputElementId("keterangan4", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan5"))
		$xt->assign("keterangan5_fieldblock",true);
	else
		$xt->assign("keterangan5_tabfieldblock",true);
	$xt->assign("keterangan5_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan5_label","<label for=\"".GetInputElementId("keterangan5", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan6"))
		$xt->assign("keterangan6_fieldblock",true);
	else
		$xt->assign("keterangan6_tabfieldblock",true);
	$xt->assign("keterangan6_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan6_label","<label for=\"".GetInputElementId("keterangan6", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan7"))
		$xt->assign("keterangan7_fieldblock",true);
	else
		$xt->assign("keterangan7_tabfieldblock",true);
	$xt->assign("keterangan7_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan7_label","<label for=\"".GetInputElementId("keterangan7", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan8"))
		$xt->assign("keterangan8_fieldblock",true);
	else
		$xt->assign("keterangan8_tabfieldblock",true);
	$xt->assign("keterangan8_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan8_label","<label for=\"".GetInputElementId("keterangan8", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan9"))
		$xt->assign("keterangan9_fieldblock",true);
	else
		$xt->assign("keterangan9_tabfieldblock",true);
	$xt->assign("keterangan9_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan9_label","<label for=\"".GetInputElementId("keterangan9", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan10"))
		$xt->assign("keterangan10_fieldblock",true);
	else
		$xt->assign("keterangan10_tabfieldblock",true);
	$xt->assign("keterangan10_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan10_label","<label for=\"".GetInputElementId("keterangan10", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan11"))
		$xt->assign("keterangan11_fieldblock",true);
	else
		$xt->assign("keterangan11_tabfieldblock",true);
	$xt->assign("keterangan11_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan11_label","<label for=\"".GetInputElementId("keterangan11", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan12"))
		$xt->assign("keterangan12_fieldblock",true);
	else
		$xt->assign("keterangan12_tabfieldblock",true);
	$xt->assign("keterangan12_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan12_label","<label for=\"".GetInputElementId("keterangan12", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan13"))
		$xt->assign("keterangan13_fieldblock",true);
	else
		$xt->assign("keterangan13_tabfieldblock",true);
	$xt->assign("keterangan13_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan13_label","<label for=\"".GetInputElementId("keterangan13", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan14"))
		$xt->assign("keterangan14_fieldblock",true);
	else
		$xt->assign("keterangan14_tabfieldblock",true);
	$xt->assign("keterangan14_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan14_label","<label for=\"".GetInputElementId("keterangan14", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan15"))
		$xt->assign("keterangan15_fieldblock",true);
	else
		$xt->assign("keterangan15_tabfieldblock",true);
	$xt->assign("keterangan15_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan15_label","<label for=\"".GetInputElementId("keterangan15", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan16"))
		$xt->assign("keterangan16_fieldblock",true);
	else
		$xt->assign("keterangan16_tabfieldblock",true);
	$xt->assign("keterangan16_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan16_label","<label for=\"".GetInputElementId("keterangan16", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan17"))
		$xt->assign("keterangan17_fieldblock",true);
	else
		$xt->assign("keterangan17_tabfieldblock",true);
	$xt->assign("keterangan17_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan17_label","<label for=\"".GetInputElementId("keterangan17", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan18"))
		$xt->assign("keterangan18_fieldblock",true);
	else
		$xt->assign("keterangan18_tabfieldblock",true);
	$xt->assign("keterangan18_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan18_label","<label for=\"".GetInputElementId("keterangan18", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan19"))
		$xt->assign("keterangan19_fieldblock",true);
	else
		$xt->assign("keterangan19_tabfieldblock",true);
	$xt->assign("keterangan19_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan19_label","<label for=\"".GetInputElementId("keterangan19", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan20"))
		$xt->assign("keterangan20_fieldblock",true);
	else
		$xt->assign("keterangan20_tabfieldblock",true);
	$xt->assign("keterangan20_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan20_label","<label for=\"".GetInputElementId("keterangan20", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan21"))
		$xt->assign("keterangan21_fieldblock",true);
	else
		$xt->assign("keterangan21_tabfieldblock",true);
	$xt->assign("keterangan21_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan21_label","<label for=\"".GetInputElementId("keterangan21", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan22"))
		$xt->assign("keterangan22_fieldblock",true);
	else
		$xt->assign("keterangan22_tabfieldblock",true);
	$xt->assign("keterangan22_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan22_label","<label for=\"".GetInputElementId("keterangan22", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan23"))
		$xt->assign("keterangan23_fieldblock",true);
	else
		$xt->assign("keterangan23_tabfieldblock",true);
	$xt->assign("keterangan23_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan23_label","<label for=\"".GetInputElementId("keterangan23", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan24"))
		$xt->assign("keterangan24_fieldblock",true);
	else
		$xt->assign("keterangan24_tabfieldblock",true);
	$xt->assign("keterangan24_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan24_label","<label for=\"".GetInputElementId("keterangan24", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan25"))
		$xt->assign("keterangan25_fieldblock",true);
	else
		$xt->assign("keterangan25_tabfieldblock",true);
	$xt->assign("keterangan25_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan25_label","<label for=\"".GetInputElementId("keterangan25", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan26"))
		$xt->assign("keterangan26_fieldblock",true);
	else
		$xt->assign("keterangan26_tabfieldblock",true);
	$xt->assign("keterangan26_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan26_label","<label for=\"".GetInputElementId("keterangan26", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan27"))
		$xt->assign("keterangan27_fieldblock",true);
	else
		$xt->assign("keterangan27_tabfieldblock",true);
	$xt->assign("keterangan27_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan27_label","<label for=\"".GetInputElementId("keterangan27", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan28"))
		$xt->assign("keterangan28_fieldblock",true);
	else
		$xt->assign("keterangan28_tabfieldblock",true);
	$xt->assign("keterangan28_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan28_label","<label for=\"".GetInputElementId("keterangan28", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan29"))
		$xt->assign("keterangan29_fieldblock",true);
	else
		$xt->assign("keterangan29_tabfieldblock",true);
	$xt->assign("keterangan29_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan29_label","<label for=\"".GetInputElementId("keterangan29", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan30"))
		$xt->assign("keterangan30_fieldblock",true);
	else
		$xt->assign("keterangan30_tabfieldblock",true);
	$xt->assign("keterangan30_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan30_label","<label for=\"".GetInputElementId("keterangan30", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan31"))
		$xt->assign("keterangan31_fieldblock",true);
	else
		$xt->assign("keterangan31_tabfieldblock",true);
	$xt->assign("keterangan31_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan31_label","<label for=\"".GetInputElementId("keterangan31", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("doc_no"))
		$xt->assign("doc_no_fieldblock",true);
	else
		$xt->assign("doc_no_tabfieldblock",true);
	$xt->assign("doc_no_label",true);
	if(isEnableSection508())
		$xt->assign_section("doc_no_label","<label for=\"".GetInputElementId("doc_no", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("cara_bayar"))
		$xt->assign("cara_bayar_fieldblock",true);
	else
		$xt->assign("cara_bayar_tabfieldblock",true);
	$xt->assign("cara_bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("cara_bayar_label","<label for=\"".GetInputElementId("cara_bayar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kelompok_usaha_id"))
		$xt->assign("kelompok_usaha_id_fieldblock",true);
	else
		$xt->assign("kelompok_usaha_id_tabfieldblock",true);
	$xt->assign("kelompok_usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("kelompok_usaha_id_label","<label for=\"".GetInputElementId("kelompok_usaha_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("zona_id"))
		$xt->assign("zona_id_fieldblock",true);
	else
		$xt->assign("zona_id_tabfieldblock",true);
	$xt->assign("zona_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("zona_id_label","<label for=\"".GetInputElementId("zona_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("manfaat_id"))
		$xt->assign("manfaat_id_fieldblock",true);
	else
		$xt->assign("manfaat_id_tabfieldblock",true);
	$xt->assign("manfaat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("manfaat_id_label","<label for=\"".GetInputElementId("manfaat_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("golongan"))
		$xt->assign("golongan_fieldblock",true);
	else
		$xt->assign("golongan_tabfieldblock",true);
	$xt->assign("golongan_label",true);
	if(isEnableSection508())
		$xt->assign_section("golongan_label","<label for=\"".GetInputElementId("golongan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("omset_lain"))
		$xt->assign("omset_lain_fieldblock",true);
	else
		$xt->assign("omset_lain_tabfieldblock",true);
	$xt->assign("omset_lain_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset_lain_label","<label for=\"".GetInputElementId("omset_lain", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan_lain"))
		$xt->assign("keterangan_lain_fieldblock",true);
	else
		$xt->assign("keterangan_lain_tabfieldblock",true);
	$xt->assign("keterangan_lain_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan_lain_label","<label for=\"".GetInputElementId("keterangan_lain", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin_no"))
		$xt->assign("ijin_no_fieldblock",true);
	else
		$xt->assign("ijin_no_tabfieldblock",true);
	$xt->assign("ijin_no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin_no_label","<label for=\"".GetInputElementId("ijin_no", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("jenis_masa"))
		$xt->assign("jenis_masa_fieldblock",true);
	else
		$xt->assign("jenis_masa_tabfieldblock",true);
	$xt->assign("jenis_masa_label",true);
	if(isEnableSection508())
		$xt->assign_section("jenis_masa_label","<label for=\"".GetInputElementId("jenis_masa", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("skpd_lama"))
		$xt->assign("skpd_lama_fieldblock",true);
	else
		$xt->assign("skpd_lama_tabfieldblock",true);
	$xt->assign("skpd_lama_label",true);
	if(isEnableSection508())
		$xt->assign_section("skpd_lama_label","<label for=\"".GetInputElementId("skpd_lama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("proses"))
		$xt->assign("proses_fieldblock",true);
	else
		$xt->assign("proses_tabfieldblock",true);
	$xt->assign("proses_label",true);
	if(isEnableSection508())
		$xt->assign_section("proses_label","<label for=\"".GetInputElementId("proses", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tanggal_validasi"))
		$xt->assign("tanggal_validasi_fieldblock",true);
	else
		$xt->assign("tanggal_validasi_tabfieldblock",true);
	$xt->assign("tanggal_validasi_label",true);
	if(isEnableSection508())
		$xt->assign_section("tanggal_validasi_label","<label for=\"".GetInputElementId("tanggal_validasi", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("bulan"))
		$xt->assign("bulan_fieldblock",true);
	else
		$xt->assign("bulan_tabfieldblock",true);
	$xt->assign("bulan_label",true);
	if(isEnableSection508())
		$xt->assign_section("bulan_label","<label for=\"".GetInputElementId("bulan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("no_telp"))
		$xt->assign("no_telp_fieldblock",true);
	else
		$xt->assign("no_telp_tabfieldblock",true);
	$xt->assign("no_telp_label",true);
	if(isEnableSection508())
		$xt->assign_section("no_telp_label","<label for=\"".GetInputElementId("no_telp", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("usaha_id"))
		$xt->assign("usaha_id_fieldblock",true);
	else
		$xt->assign("usaha_id_tabfieldblock",true);
	$xt->assign("usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("usaha_id_label","<label for=\"".GetInputElementId("usaha_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("multiple"))
		$xt->assign("multiple_fieldblock",true);
	else
		$xt->assign("multiple_tabfieldblock",true);
	$xt->assign("multiple_label",true);
	if(isEnableSection508())
		$xt->assign_section("multiple_label","<label for=\"".GetInputElementId("multiple", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("bulan_telat"))
		$xt->assign("bulan_telat_fieldblock",true);
	else
		$xt->assign("bulan_telat_tabfieldblock",true);
	$xt->assign("bulan_telat_label",true);
	if(isEnableSection508())
		$xt->assign_section("bulan_telat_label","<label for=\"".GetInputElementId("bulan_telat", $id, PAGE_ADD)."\">","</label>");
	
	
	
	if($inlineadd!=ADD_ONTHEFLY && $inlineadd!=ADD_POPUP)
	{
		$pageObject->body["begin"] .= $includes;
				$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
		$xt->assign("back_button",true);
	}
	else
	{		
		$xt->assign("cancelbutton_attrs", "id=\"cancelButton".$id."\"");
		$xt->assign("cancel_button",true);
		$xt->assign("header","");
	}
	$xt->assign("save_button",true);
}
$xt->assign("savebutton_attrs","id=\"saveButton".$id."\"");
$xt->assign("message_block",true);
$xt->assign("message",$message);
if(!strlen($message))
{
	$xt->displayBrickHidden("message");
}

//	show readonly fields
$linkdata="";

$i = 0;
$jsKeys = array();
$keyFields = array();
foreach($keys as $field=>$value)
{
	$keyFields[$i] = $field;
	$jsKeys[$i++] = $value;
}

if(@$_POST["a"]=="added" && $inlineadd==ADD_ONTHEFLY)
{
	if( !$error_happened && $status!="DECLINED")
	{
		$addedData = GetAddedDataLookupQuery($pageObject, $keys, false);
		$data =& $addedData[0];	
		
		if($data)
		{
			$respData = array($addedData[1]["linkField"] => @$data[$addedData[1]["linkFieldIndex"]], $addedData[1]["displayField"] => @$data[$addedData[1]["displayFieldIndex"]]);
		}
		else
		{
			$respData = array($addedData[1]["linkField"] => @$avalues[$addedData[1]["linkField"]], $addedData[1]["displayField"] => @$avalues[$addedData[1]["displayField"]]);
		}		
		$returnJSON['success'] = true;
		$returnJSON['keys'] = $jsKeys;
		$returnJSON['keyFields'] = $keyFields;
		$returnJSON['vals'] = $respData;
		$returnJSON['fields'] = $showFields;
	}
	else
	{
		$returnJSON['success'] = false;
		$returnJSON['message'] = $message;
	}
	echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
	exit();
}

if(@$_POST["a"]=="added" && ($inlineadd == ADD_INLINE || $inlineadd == ADD_MASTER || $inlineadd==ADD_POPUP)) 
{
	//Preparation   view values
	//	get current values and show edit controls
	$dispFieldAlias = "";
	$data=0;
	$linkAndDispVals = array();
	if(count($keys))
	{
		$where=KeyWhere($keys);
			
		$forLookup = postvalue('forLookup');
		if ($forLookup)
		{
			$addedData = GetAddedDataLookupQuery($pageObject, $keys, true);
			$data =& $addedData[0];
			$linkAndDispVals = array('linkField' => $addedData[0][$addedData[1]["linkField"]], 'displayField' => $addedData[0][$addedData[1]["displayField"]]);
		}
		else
		{
			$strSQL = $gQuery->gSQLWhere_having_fromQuery('', $where, '');		
		
			LogInfo($strSQL);
			$rs=db_query($strSQL,$conn);
			$data = $pageObject->cipherer->DecryptFetchedArray($rs);
		}
	}
	if(!$data)
	{
		$data=$avalues;
		$HaveData=false;
	}
	//check if correct values added
	$showDetailKeys["pad.pad_air_tanah_hit"]["masterkey1"] = $data["id"];	
	$showDetailKeys["pad.pad_stpd"]["masterkey1"] = $data["id"];	

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));
	
////////////////////////////////////////////
//	id
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("id", $data, $keylink);
		$showValues["id"] = $value;
		$showFields[] = "id";
	}	
//	tahun
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tahun", $data, $keylink);
		$showValues["tahun"] = $value;
		$showFields[] = "tahun";
	}	
//	sptno
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("sptno", $data, $keylink);
		$showValues["sptno"] = $value;
		$showFields[] = "sptno";
	}	
//	customer_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("customer_id", $data, $keylink);
		$showValues["customer_id"] = $value;
		$showFields[] = "customer_id";
	}	
//	customer_usaha_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("customer_usaha_id", $data, $keylink);
		$showValues["customer_usaha_id"] = $value;
		$showFields[] = "customer_usaha_id";
	}	
//	rekening_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("rekening_id", $data, $keylink);
		$showValues["rekening_id"] = $value;
		$showFields[] = "rekening_id";
	}	
//	pajak_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pajak_id", $data, $keylink);
		$showValues["pajak_id"] = $value;
		$showFields[] = "pajak_id";
	}	
//	type_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("type_id", $data, $keylink);
		$showValues["type_id"] = $value;
		$showFields[] = "type_id";
	}	
//	so
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("so", $data, $keylink);
		$showValues["so"] = $value;
		$showFields[] = "so";
	}	
//	masadari
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("masadari", $data, $keylink);
		$showValues["masadari"] = $value;
		$showFields[] = "masadari";
	}	
//	masasd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("masasd", $data, $keylink);
		$showValues["masasd"] = $value;
		$showFields[] = "masasd";
	}	
//	jatuhtempotgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("jatuhtempotgl", $data, $keylink);
		$showValues["jatuhtempotgl"] = $value;
		$showFields[] = "jatuhtempotgl";
	}	
//	r_bayarid
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_bayarid", $data, $keylink);
		$showValues["r_bayarid"] = $value;
		$showFields[] = "r_bayarid";
	}	
//	minimal_omset
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("minimal_omset", $data, $keylink);
		$showValues["minimal_omset"] = $value;
		$showFields[] = "minimal_omset";
	}	
//	dasar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("dasar", $data, $keylink);
		$showValues["dasar"] = $value;
		$showFields[] = "dasar";
	}	
//	tarif
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tarif", $data, $keylink);
		$showValues["tarif"] = $value;
		$showFields[] = "tarif";
	}	
//	denda
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("denda", $data, $keylink);
		$showValues["denda"] = $value;
		$showFields[] = "denda";
	}	
//	bunga
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("bunga", $data, $keylink);
		$showValues["bunga"] = $value;
		$showFields[] = "bunga";
	}	
//	setoran
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("setoran", $data, $keylink);
		$showValues["setoran"] = $value;
		$showFields[] = "setoran";
	}	
//	kenaikan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kenaikan", $data, $keylink);
		$showValues["kenaikan"] = $value;
		$showFields[] = "kenaikan";
	}	
//	kompensasi
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kompensasi", $data, $keylink);
		$showValues["kompensasi"] = $value;
		$showFields[] = "kompensasi";
	}	
//	lain2
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("lain2", $data, $keylink);
		$showValues["lain2"] = $value;
		$showFields[] = "lain2";
	}	
//	pajak_terhutang
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pajak_terhutang", $data, $keylink);
		$showValues["pajak_terhutang"] = $value;
		$showFields[] = "pajak_terhutang";
	}	
//	air_manfaat_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("air_manfaat_id", $data, $keylink);
		$showValues["air_manfaat_id"] = $value;
		$showFields[] = "air_manfaat_id";
	}	
//	air_zona_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("air_zona_id", $data, $keylink);
		$showValues["air_zona_id"] = $value;
		$showFields[] = "air_zona_id";
	}	
//	meteran_awal
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("meteran_awal", $data, $keylink);
		$showValues["meteran_awal"] = $value;
		$showFields[] = "meteran_awal";
	}	
//	meteran_akhir
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("meteran_akhir", $data, $keylink);
		$showValues["meteran_akhir"] = $value;
		$showFields[] = "meteran_akhir";
	}	
//	volume
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("volume", $data, $keylink);
		$showValues["volume"] = $value;
		$showFields[] = "volume";
	}	
//	satuan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("satuan", $data, $keylink);
		$showValues["satuan"] = $value;
		$showFields[] = "satuan";
	}	
//	r_panjang
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_panjang", $data, $keylink);
		$showValues["r_panjang"] = $value;
		$showFields[] = "r_panjang";
	}	
//	r_lebar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_lebar", $data, $keylink);
		$showValues["r_lebar"] = $value;
		$showFields[] = "r_lebar";
	}	
//	r_muka
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_muka", $data, $keylink);
		$showValues["r_muka"] = $value;
		$showFields[] = "r_muka";
	}	
//	r_banyak
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_banyak", $data, $keylink);
		$showValues["r_banyak"] = $value;
		$showFields[] = "r_banyak";
	}	
//	r_luas
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_luas", $data, $keylink);
		$showValues["r_luas"] = $value;
		$showFields[] = "r_luas";
	}	
//	r_tarifid
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_tarifid", $data, $keylink);
		$showValues["r_tarifid"] = $value;
		$showFields[] = "r_tarifid";
	}	
//	r_kontrak
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_kontrak", $data, $keylink);
		$showValues["r_kontrak"] = $value;
		$showFields[] = "r_kontrak";
	}	
//	r_lama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_lama", $data, $keylink);
		$showValues["r_lama"] = $value;
		$showFields[] = "r_lama";
	}	
//	r_jalan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_jalan_id", $data, $keylink);
		$showValues["r_jalan_id"] = $value;
		$showFields[] = "r_jalan_id";
	}	
//	r_jalanklas_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_jalanklas_id", $data, $keylink);
		$showValues["r_jalanklas_id"] = $value;
		$showFields[] = "r_jalanklas_id";
	}	
//	r_lokasi
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_lokasi", $data, $keylink);
		$showValues["r_lokasi"] = $value;
		$showFields[] = "r_lokasi";
	}	
//	r_judul
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_judul", $data, $keylink);
		$showValues["r_judul"] = $value;
		$showFields[] = "r_judul";
	}	
//	r_kelurahan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_kelurahan_id", $data, $keylink);
		$showValues["r_kelurahan_id"] = $value;
		$showFields[] = "r_kelurahan_id";
	}	
//	r_lokasi_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_lokasi_id", $data, $keylink);
		$showValues["r_lokasi_id"] = $value;
		$showFields[] = "r_lokasi_id";
	}	
//	r_calculated
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_calculated", $data, $keylink);
		$showValues["r_calculated"] = $value;
		$showFields[] = "r_calculated";
	}	
//	r_nsr
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_nsr", $data, $keylink);
		$showValues["r_nsr"] = $value;
		$showFields[] = "r_nsr";
	}	
//	r_nsrno
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_nsrno", $data, $keylink);
		$showValues["r_nsrno"] = $value;
		$showFields[] = "r_nsrno";
	}	
//	r_nsrtgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_nsrtgl", $data, $keylink);
		$showValues["r_nsrtgl"] = $value;
		$showFields[] = "r_nsrtgl";
	}	
//	r_nsl_kecamatan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_nsl_kecamatan_id", $data, $keylink);
		$showValues["r_nsl_kecamatan_id"] = $value;
		$showFields[] = "r_nsl_kecamatan_id";
	}	
//	r_nsl_type_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_nsl_type_id", $data, $keylink);
		$showValues["r_nsl_type_id"] = $value;
		$showFields[] = "r_nsl_type_id";
	}	
//	r_nsl_nilai
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_nsl_nilai", $data, $keylink);
		$showValues["r_nsl_nilai"] = $value;
		$showFields[] = "r_nsl_nilai";
	}	
//	notes
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("notes", $data, $keylink);
		$showValues["notes"] = $value;
		$showFields[] = "notes";
	}	
//	unit_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("unit_id", $data, $keylink);
		$showValues["unit_id"] = $value;
		$showFields[] = "unit_id";
	}	
//	enabled
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("enabled", $data, $keylink);
		$showValues["enabled"] = $value;
		$showFields[] = "enabled";
	}	
//	created
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("created", $data, $keylink);
		$showValues["created"] = $value;
		$showFields[] = "created";
	}	
//	create_uid
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("create_uid", $data, $keylink);
		$showValues["create_uid"] = $value;
		$showFields[] = "create_uid";
	}	
//	updated
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("updated", $data, $keylink);
		$showValues["updated"] = $value;
		$showFields[] = "updated";
	}	
//	update_uid
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("update_uid", $data, $keylink);
		$showValues["update_uid"] = $value;
		$showFields[] = "update_uid";
	}	
//	terimanip
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("terimanip", $data, $keylink);
		$showValues["terimanip"] = $value;
		$showFields[] = "terimanip";
	}	
//	terimatgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("terimatgl", $data, $keylink);
		$showValues["terimatgl"] = $value;
		$showFields[] = "terimatgl";
	}	
//	kirimtgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kirimtgl", $data, $keylink);
		$showValues["kirimtgl"] = $value;
		$showFields[] = "kirimtgl";
	}	
//	isprint_dc
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("isprint_dc", $data, $keylink);
		$showValues["isprint_dc"] = $value;
		$showFields[] = "isprint_dc";
	}	
//	r_nsr_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_nsr_id", $data, $keylink);
		$showValues["r_nsr_id"] = $value;
		$showFields[] = "r_nsr_id";
	}	
//	r_lokasi_pasang_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_lokasi_pasang_id", $data, $keylink);
		$showValues["r_lokasi_pasang_id"] = $value;
		$showFields[] = "r_lokasi_pasang_id";
	}	
//	r_lokasi_pasang_val
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_lokasi_pasang_val", $data, $keylink);
		$showValues["r_lokasi_pasang_val"] = $value;
		$showFields[] = "r_lokasi_pasang_val";
	}	
//	r_jalanklas_val
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_jalanklas_val", $data, $keylink);
		$showValues["r_jalanklas_val"] = $value;
		$showFields[] = "r_jalanklas_val";
	}	
//	r_sudut_pandang_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_sudut_pandang_id", $data, $keylink);
		$showValues["r_sudut_pandang_id"] = $value;
		$showFields[] = "r_sudut_pandang_id";
	}	
//	r_sudut_pandang_val
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_sudut_pandang_val", $data, $keylink);
		$showValues["r_sudut_pandang_val"] = $value;
		$showFields[] = "r_sudut_pandang_val";
	}	
//	r_tinggi
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_tinggi", $data, $keylink);
		$showValues["r_tinggi"] = $value;
		$showFields[] = "r_tinggi";
	}	
//	r_njop
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_njop", $data, $keylink);
		$showValues["r_njop"] = $value;
		$showFields[] = "r_njop";
	}	
//	r_status
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_status", $data, $keylink);
		$showValues["r_status"] = $value;
		$showFields[] = "r_status";
	}	
//	r_njop_ketinggian
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_njop_ketinggian", $data, $keylink);
		$showValues["r_njop_ketinggian"] = $value;
		$showFields[] = "r_njop_ketinggian";
	}	
//	status_pembayaran
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("status_pembayaran", $data, $keylink);
		$showValues["status_pembayaran"] = $value;
		$showFields[] = "status_pembayaran";
	}	
//	rek_no_paneng
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("rek_no_paneng", $data, $keylink);
		$showValues["rek_no_paneng"] = $value;
		$showFields[] = "rek_no_paneng";
	}	
//	sptno_lengkap
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("sptno_lengkap", $data, $keylink);
		$showValues["sptno_lengkap"] = $value;
		$showFields[] = "sptno_lengkap";
	}	
//	sptno_lama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("sptno_lama", $data, $keylink);
		$showValues["sptno_lama"] = $value;
		$showFields[] = "sptno_lama";
	}	
//	r_nama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_nama", $data, $keylink);
		$showValues["r_nama"] = $value;
		$showFields[] = "r_nama";
	}	
//	r_alamat
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("r_alamat", $data, $keylink);
		$showValues["r_alamat"] = $value;
		$showFields[] = "r_alamat";
	}	
//	omset1
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset1", $data, $keylink);
		$showValues["omset1"] = $value;
		$showFields[] = "omset1";
	}	
//	omset2
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset2", $data, $keylink);
		$showValues["omset2"] = $value;
		$showFields[] = "omset2";
	}	
//	omset3
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset3", $data, $keylink);
		$showValues["omset3"] = $value;
		$showFields[] = "omset3";
	}	
//	omset4
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset4", $data, $keylink);
		$showValues["omset4"] = $value;
		$showFields[] = "omset4";
	}	
//	omset5
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset5", $data, $keylink);
		$showValues["omset5"] = $value;
		$showFields[] = "omset5";
	}	
//	omset6
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset6", $data, $keylink);
		$showValues["omset6"] = $value;
		$showFields[] = "omset6";
	}	
//	omset7
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset7", $data, $keylink);
		$showValues["omset7"] = $value;
		$showFields[] = "omset7";
	}	
//	omset8
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset8", $data, $keylink);
		$showValues["omset8"] = $value;
		$showFields[] = "omset8";
	}	
//	omset9
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset9", $data, $keylink);
		$showValues["omset9"] = $value;
		$showFields[] = "omset9";
	}	
//	omset10
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset10", $data, $keylink);
		$showValues["omset10"] = $value;
		$showFields[] = "omset10";
	}	
//	omset11
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset11", $data, $keylink);
		$showValues["omset11"] = $value;
		$showFields[] = "omset11";
	}	
//	omset12
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset12", $data, $keylink);
		$showValues["omset12"] = $value;
		$showFields[] = "omset12";
	}	
//	omset13
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset13", $data, $keylink);
		$showValues["omset13"] = $value;
		$showFields[] = "omset13";
	}	
//	omset14
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset14", $data, $keylink);
		$showValues["omset14"] = $value;
		$showFields[] = "omset14";
	}	
//	omset15
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset15", $data, $keylink);
		$showValues["omset15"] = $value;
		$showFields[] = "omset15";
	}	
//	omset16
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset16", $data, $keylink);
		$showValues["omset16"] = $value;
		$showFields[] = "omset16";
	}	
//	omset17
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset17", $data, $keylink);
		$showValues["omset17"] = $value;
		$showFields[] = "omset17";
	}	
//	omset18
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset18", $data, $keylink);
		$showValues["omset18"] = $value;
		$showFields[] = "omset18";
	}	
//	omset19
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset19", $data, $keylink);
		$showValues["omset19"] = $value;
		$showFields[] = "omset19";
	}	
//	omset20
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset20", $data, $keylink);
		$showValues["omset20"] = $value;
		$showFields[] = "omset20";
	}	
//	omset21
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset21", $data, $keylink);
		$showValues["omset21"] = $value;
		$showFields[] = "omset21";
	}	
//	omset22
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset22", $data, $keylink);
		$showValues["omset22"] = $value;
		$showFields[] = "omset22";
	}	
//	omset23
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset23", $data, $keylink);
		$showValues["omset23"] = $value;
		$showFields[] = "omset23";
	}	
//	omset24
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset24", $data, $keylink);
		$showValues["omset24"] = $value;
		$showFields[] = "omset24";
	}	
//	omset25
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset25", $data, $keylink);
		$showValues["omset25"] = $value;
		$showFields[] = "omset25";
	}	
//	omset26
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset26", $data, $keylink);
		$showValues["omset26"] = $value;
		$showFields[] = "omset26";
	}	
//	omset27
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset27", $data, $keylink);
		$showValues["omset27"] = $value;
		$showFields[] = "omset27";
	}	
//	omset28
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset28", $data, $keylink);
		$showValues["omset28"] = $value;
		$showFields[] = "omset28";
	}	
//	omset29
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset29", $data, $keylink);
		$showValues["omset29"] = $value;
		$showFields[] = "omset29";
	}	
//	omset30
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset30", $data, $keylink);
		$showValues["omset30"] = $value;
		$showFields[] = "omset30";
	}	
//	omset31
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset31", $data, $keylink);
		$showValues["omset31"] = $value;
		$showFields[] = "omset31";
	}	
//	keterangan1
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan1", $data, $keylink);
		$showValues["keterangan1"] = $value;
		$showFields[] = "keterangan1";
	}	
//	keterangan2
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan2", $data, $keylink);
		$showValues["keterangan2"] = $value;
		$showFields[] = "keterangan2";
	}	
//	keterangan3
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan3", $data, $keylink);
		$showValues["keterangan3"] = $value;
		$showFields[] = "keterangan3";
	}	
//	keterangan4
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan4", $data, $keylink);
		$showValues["keterangan4"] = $value;
		$showFields[] = "keterangan4";
	}	
//	keterangan5
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan5", $data, $keylink);
		$showValues["keterangan5"] = $value;
		$showFields[] = "keterangan5";
	}	
//	keterangan6
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan6", $data, $keylink);
		$showValues["keterangan6"] = $value;
		$showFields[] = "keterangan6";
	}	
//	keterangan7
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan7", $data, $keylink);
		$showValues["keterangan7"] = $value;
		$showFields[] = "keterangan7";
	}	
//	keterangan8
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan8", $data, $keylink);
		$showValues["keterangan8"] = $value;
		$showFields[] = "keterangan8";
	}	
//	keterangan9
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan9", $data, $keylink);
		$showValues["keterangan9"] = $value;
		$showFields[] = "keterangan9";
	}	
//	keterangan10
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan10", $data, $keylink);
		$showValues["keterangan10"] = $value;
		$showFields[] = "keterangan10";
	}	
//	keterangan11
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan11", $data, $keylink);
		$showValues["keterangan11"] = $value;
		$showFields[] = "keterangan11";
	}	
//	keterangan12
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan12", $data, $keylink);
		$showValues["keterangan12"] = $value;
		$showFields[] = "keterangan12";
	}	
//	keterangan13
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan13", $data, $keylink);
		$showValues["keterangan13"] = $value;
		$showFields[] = "keterangan13";
	}	
//	keterangan14
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan14", $data, $keylink);
		$showValues["keterangan14"] = $value;
		$showFields[] = "keterangan14";
	}	
//	keterangan15
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan15", $data, $keylink);
		$showValues["keterangan15"] = $value;
		$showFields[] = "keterangan15";
	}	
//	keterangan16
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan16", $data, $keylink);
		$showValues["keterangan16"] = $value;
		$showFields[] = "keterangan16";
	}	
//	keterangan17
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan17", $data, $keylink);
		$showValues["keterangan17"] = $value;
		$showFields[] = "keterangan17";
	}	
//	keterangan18
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan18", $data, $keylink);
		$showValues["keterangan18"] = $value;
		$showFields[] = "keterangan18";
	}	
//	keterangan19
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan19", $data, $keylink);
		$showValues["keterangan19"] = $value;
		$showFields[] = "keterangan19";
	}	
//	keterangan20
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan20", $data, $keylink);
		$showValues["keterangan20"] = $value;
		$showFields[] = "keterangan20";
	}	
//	keterangan21
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan21", $data, $keylink);
		$showValues["keterangan21"] = $value;
		$showFields[] = "keterangan21";
	}	
//	keterangan22
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan22", $data, $keylink);
		$showValues["keterangan22"] = $value;
		$showFields[] = "keterangan22";
	}	
//	keterangan23
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan23", $data, $keylink);
		$showValues["keterangan23"] = $value;
		$showFields[] = "keterangan23";
	}	
//	keterangan24
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan24", $data, $keylink);
		$showValues["keterangan24"] = $value;
		$showFields[] = "keterangan24";
	}	
//	keterangan25
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan25", $data, $keylink);
		$showValues["keterangan25"] = $value;
		$showFields[] = "keterangan25";
	}	
//	keterangan26
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan26", $data, $keylink);
		$showValues["keterangan26"] = $value;
		$showFields[] = "keterangan26";
	}	
//	keterangan27
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan27", $data, $keylink);
		$showValues["keterangan27"] = $value;
		$showFields[] = "keterangan27";
	}	
//	keterangan28
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan28", $data, $keylink);
		$showValues["keterangan28"] = $value;
		$showFields[] = "keterangan28";
	}	
//	keterangan29
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan29", $data, $keylink);
		$showValues["keterangan29"] = $value;
		$showFields[] = "keterangan29";
	}	
//	keterangan30
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan30", $data, $keylink);
		$showValues["keterangan30"] = $value;
		$showFields[] = "keterangan30";
	}	
//	keterangan31
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan31", $data, $keylink);
		$showValues["keterangan31"] = $value;
		$showFields[] = "keterangan31";
	}	
//	doc_no
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("doc_no", $data, $keylink);
		$showValues["doc_no"] = $value;
		$showFields[] = "doc_no";
	}	
//	cara_bayar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("cara_bayar", $data, $keylink);
		$showValues["cara_bayar"] = $value;
		$showFields[] = "cara_bayar";
	}	
//	kelompok_usaha_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kelompok_usaha_id", $data, $keylink);
		$showValues["kelompok_usaha_id"] = $value;
		$showFields[] = "kelompok_usaha_id";
	}	
//	zona_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("zona_id", $data, $keylink);
		$showValues["zona_id"] = $value;
		$showFields[] = "zona_id";
	}	
//	manfaat_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("manfaat_id", $data, $keylink);
		$showValues["manfaat_id"] = $value;
		$showFields[] = "manfaat_id";
	}	
//	golongan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("golongan", $data, $keylink);
		$showValues["golongan"] = $value;
		$showFields[] = "golongan";
	}	
//	omset_lain
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("omset_lain", $data, $keylink);
		$showValues["omset_lain"] = $value;
		$showFields[] = "omset_lain";
	}	
//	keterangan_lain
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan_lain", $data, $keylink);
		$showValues["keterangan_lain"] = $value;
		$showFields[] = "keterangan_lain";
	}	
//	ijin_no
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin_no", $data, $keylink);
		$showValues["ijin_no"] = $value;
		$showFields[] = "ijin_no";
	}	
//	jenis_masa
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("jenis_masa", $data, $keylink);
		$showValues["jenis_masa"] = $value;
		$showFields[] = "jenis_masa";
	}	
//	skpd_lama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("skpd_lama", $data, $keylink);
		$showValues["skpd_lama"] = $value;
		$showFields[] = "skpd_lama";
	}	
//	proses
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("proses", $data, $keylink);
		$showValues["proses"] = $value;
		$showFields[] = "proses";
	}	
//	tanggal_validasi
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tanggal_validasi", $data, $keylink);
		$showValues["tanggal_validasi"] = $value;
		$showFields[] = "tanggal_validasi";
	}	
//	bulan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("bulan", $data, $keylink);
		$showValues["bulan"] = $value;
		$showFields[] = "bulan";
	}	
//	no_telp
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("no_telp", $data, $keylink);
		$showValues["no_telp"] = $value;
		$showFields[] = "no_telp";
	}	
//	usaha_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("usaha_id", $data, $keylink);
		$showValues["usaha_id"] = $value;
		$showFields[] = "usaha_id";
	}	
//	multiple
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("multiple", $data, $keylink);
		$showValues["multiple"] = $value;
		$showFields[] = "multiple";
	}	
//	bulan_telat
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("bulan_telat", $data, $keylink);
		$showValues["bulan_telat"] = $value;
		$showFields[] = "bulan_telat";
	}	
		$showRawValues["id"] = substr($data["id"],0,100);
		$showRawValues["tahun"] = substr($data["tahun"],0,100);
		$showRawValues["sptno"] = substr($data["sptno"],0,100);
		$showRawValues["customer_id"] = substr($data["customer_id"],0,100);
		$showRawValues["customer_usaha_id"] = substr($data["customer_usaha_id"],0,100);
		$showRawValues["rekening_id"] = substr($data["rekening_id"],0,100);
		$showRawValues["pajak_id"] = substr($data["pajak_id"],0,100);
		$showRawValues["type_id"] = substr($data["type_id"],0,100);
		$showRawValues["so"] = substr($data["so"],0,100);
		$showRawValues["masadari"] = substr($data["masadari"],0,100);
		$showRawValues["masasd"] = substr($data["masasd"],0,100);
		$showRawValues["jatuhtempotgl"] = substr($data["jatuhtempotgl"],0,100);
		$showRawValues["r_bayarid"] = substr($data["r_bayarid"],0,100);
		$showRawValues["minimal_omset"] = substr($data["minimal_omset"],0,100);
		$showRawValues["dasar"] = substr($data["dasar"],0,100);
		$showRawValues["tarif"] = substr($data["tarif"],0,100);
		$showRawValues["denda"] = substr($data["denda"],0,100);
		$showRawValues["bunga"] = substr($data["bunga"],0,100);
		$showRawValues["setoran"] = substr($data["setoran"],0,100);
		$showRawValues["kenaikan"] = substr($data["kenaikan"],0,100);
		$showRawValues["kompensasi"] = substr($data["kompensasi"],0,100);
		$showRawValues["lain2"] = substr($data["lain2"],0,100);
		$showRawValues["pajak_terhutang"] = substr($data["pajak_terhutang"],0,100);
		$showRawValues["air_manfaat_id"] = substr($data["air_manfaat_id"],0,100);
		$showRawValues["air_zona_id"] = substr($data["air_zona_id"],0,100);
		$showRawValues["meteran_awal"] = substr($data["meteran_awal"],0,100);
		$showRawValues["meteran_akhir"] = substr($data["meteran_akhir"],0,100);
		$showRawValues["volume"] = substr($data["volume"],0,100);
		$showRawValues["satuan"] = substr($data["satuan"],0,100);
		$showRawValues["r_panjang"] = substr($data["r_panjang"],0,100);
		$showRawValues["r_lebar"] = substr($data["r_lebar"],0,100);
		$showRawValues["r_muka"] = substr($data["r_muka"],0,100);
		$showRawValues["r_banyak"] = substr($data["r_banyak"],0,100);
		$showRawValues["r_luas"] = substr($data["r_luas"],0,100);
		$showRawValues["r_tarifid"] = substr($data["r_tarifid"],0,100);
		$showRawValues["r_kontrak"] = substr($data["r_kontrak"],0,100);
		$showRawValues["r_lama"] = substr($data["r_lama"],0,100);
		$showRawValues["r_jalan_id"] = substr($data["r_jalan_id"],0,100);
		$showRawValues["r_jalanklas_id"] = substr($data["r_jalanklas_id"],0,100);
		$showRawValues["r_lokasi"] = substr($data["r_lokasi"],0,100);
		$showRawValues["r_judul"] = substr($data["r_judul"],0,100);
		$showRawValues["r_kelurahan_id"] = substr($data["r_kelurahan_id"],0,100);
		$showRawValues["r_lokasi_id"] = substr($data["r_lokasi_id"],0,100);
		$showRawValues["r_calculated"] = substr($data["r_calculated"],0,100);
		$showRawValues["r_nsr"] = substr($data["r_nsr"],0,100);
		$showRawValues["r_nsrno"] = substr($data["r_nsrno"],0,100);
		$showRawValues["r_nsrtgl"] = substr($data["r_nsrtgl"],0,100);
		$showRawValues["r_nsl_kecamatan_id"] = substr($data["r_nsl_kecamatan_id"],0,100);
		$showRawValues["r_nsl_type_id"] = substr($data["r_nsl_type_id"],0,100);
		$showRawValues["r_nsl_nilai"] = substr($data["r_nsl_nilai"],0,100);
		$showRawValues["notes"] = substr($data["notes"],0,100);
		$showRawValues["unit_id"] = substr($data["unit_id"],0,100);
		$showRawValues["enabled"] = substr($data["enabled"],0,100);
		$showRawValues["created"] = substr($data["created"],0,100);
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);
		$showRawValues["updated"] = substr($data["updated"],0,100);
		$showRawValues["update_uid"] = substr($data["update_uid"],0,100);
		$showRawValues["terimanip"] = substr($data["terimanip"],0,100);
		$showRawValues["terimatgl"] = substr($data["terimatgl"],0,100);
		$showRawValues["kirimtgl"] = substr($data["kirimtgl"],0,100);
		$showRawValues["isprint_dc"] = substr($data["isprint_dc"],0,100);
		$showRawValues["r_nsr_id"] = substr($data["r_nsr_id"],0,100);
		$showRawValues["r_lokasi_pasang_id"] = substr($data["r_lokasi_pasang_id"],0,100);
		$showRawValues["r_lokasi_pasang_val"] = substr($data["r_lokasi_pasang_val"],0,100);
		$showRawValues["r_jalanklas_val"] = substr($data["r_jalanklas_val"],0,100);
		$showRawValues["r_sudut_pandang_id"] = substr($data["r_sudut_pandang_id"],0,100);
		$showRawValues["r_sudut_pandang_val"] = substr($data["r_sudut_pandang_val"],0,100);
		$showRawValues["r_tinggi"] = substr($data["r_tinggi"],0,100);
		$showRawValues["r_njop"] = substr($data["r_njop"],0,100);
		$showRawValues["r_status"] = substr($data["r_status"],0,100);
		$showRawValues["r_njop_ketinggian"] = substr($data["r_njop_ketinggian"],0,100);
		$showRawValues["status_pembayaran"] = substr($data["status_pembayaran"],0,100);
		$showRawValues["rek_no_paneng"] = substr($data["rek_no_paneng"],0,100);
		$showRawValues["sptno_lengkap"] = substr($data["sptno_lengkap"],0,100);
		$showRawValues["sptno_lama"] = substr($data["sptno_lama"],0,100);
		$showRawValues["r_nama"] = substr($data["r_nama"],0,100);
		$showRawValues["r_alamat"] = substr($data["r_alamat"],0,100);
		$showRawValues["omset1"] = substr($data["omset1"],0,100);
		$showRawValues["omset2"] = substr($data["omset2"],0,100);
		$showRawValues["omset3"] = substr($data["omset3"],0,100);
		$showRawValues["omset4"] = substr($data["omset4"],0,100);
		$showRawValues["omset5"] = substr($data["omset5"],0,100);
		$showRawValues["omset6"] = substr($data["omset6"],0,100);
		$showRawValues["omset7"] = substr($data["omset7"],0,100);
		$showRawValues["omset8"] = substr($data["omset8"],0,100);
		$showRawValues["omset9"] = substr($data["omset9"],0,100);
		$showRawValues["omset10"] = substr($data["omset10"],0,100);
		$showRawValues["omset11"] = substr($data["omset11"],0,100);
		$showRawValues["omset12"] = substr($data["omset12"],0,100);
		$showRawValues["omset13"] = substr($data["omset13"],0,100);
		$showRawValues["omset14"] = substr($data["omset14"],0,100);
		$showRawValues["omset15"] = substr($data["omset15"],0,100);
		$showRawValues["omset16"] = substr($data["omset16"],0,100);
		$showRawValues["omset17"] = substr($data["omset17"],0,100);
		$showRawValues["omset18"] = substr($data["omset18"],0,100);
		$showRawValues["omset19"] = substr($data["omset19"],0,100);
		$showRawValues["omset20"] = substr($data["omset20"],0,100);
		$showRawValues["omset21"] = substr($data["omset21"],0,100);
		$showRawValues["omset22"] = substr($data["omset22"],0,100);
		$showRawValues["omset23"] = substr($data["omset23"],0,100);
		$showRawValues["omset24"] = substr($data["omset24"],0,100);
		$showRawValues["omset25"] = substr($data["omset25"],0,100);
		$showRawValues["omset26"] = substr($data["omset26"],0,100);
		$showRawValues["omset27"] = substr($data["omset27"],0,100);
		$showRawValues["omset28"] = substr($data["omset28"],0,100);
		$showRawValues["omset29"] = substr($data["omset29"],0,100);
		$showRawValues["omset30"] = substr($data["omset30"],0,100);
		$showRawValues["omset31"] = substr($data["omset31"],0,100);
		$showRawValues["keterangan1"] = substr($data["keterangan1"],0,100);
		$showRawValues["keterangan2"] = substr($data["keterangan2"],0,100);
		$showRawValues["keterangan3"] = substr($data["keterangan3"],0,100);
		$showRawValues["keterangan4"] = substr($data["keterangan4"],0,100);
		$showRawValues["keterangan5"] = substr($data["keterangan5"],0,100);
		$showRawValues["keterangan6"] = substr($data["keterangan6"],0,100);
		$showRawValues["keterangan7"] = substr($data["keterangan7"],0,100);
		$showRawValues["keterangan8"] = substr($data["keterangan8"],0,100);
		$showRawValues["keterangan9"] = substr($data["keterangan9"],0,100);
		$showRawValues["keterangan10"] = substr($data["keterangan10"],0,100);
		$showRawValues["keterangan11"] = substr($data["keterangan11"],0,100);
		$showRawValues["keterangan12"] = substr($data["keterangan12"],0,100);
		$showRawValues["keterangan13"] = substr($data["keterangan13"],0,100);
		$showRawValues["keterangan14"] = substr($data["keterangan14"],0,100);
		$showRawValues["keterangan15"] = substr($data["keterangan15"],0,100);
		$showRawValues["keterangan16"] = substr($data["keterangan16"],0,100);
		$showRawValues["keterangan17"] = substr($data["keterangan17"],0,100);
		$showRawValues["keterangan18"] = substr($data["keterangan18"],0,100);
		$showRawValues["keterangan19"] = substr($data["keterangan19"],0,100);
		$showRawValues["keterangan20"] = substr($data["keterangan20"],0,100);
		$showRawValues["keterangan21"] = substr($data["keterangan21"],0,100);
		$showRawValues["keterangan22"] = substr($data["keterangan22"],0,100);
		$showRawValues["keterangan23"] = substr($data["keterangan23"],0,100);
		$showRawValues["keterangan24"] = substr($data["keterangan24"],0,100);
		$showRawValues["keterangan25"] = substr($data["keterangan25"],0,100);
		$showRawValues["keterangan26"] = substr($data["keterangan26"],0,100);
		$showRawValues["keterangan27"] = substr($data["keterangan27"],0,100);
		$showRawValues["keterangan28"] = substr($data["keterangan28"],0,100);
		$showRawValues["keterangan29"] = substr($data["keterangan29"],0,100);
		$showRawValues["keterangan30"] = substr($data["keterangan30"],0,100);
		$showRawValues["keterangan31"] = substr($data["keterangan31"],0,100);
		$showRawValues["doc_no"] = substr($data["doc_no"],0,100);
		$showRawValues["cara_bayar"] = substr($data["cara_bayar"],0,100);
		$showRawValues["kelompok_usaha_id"] = substr($data["kelompok_usaha_id"],0,100);
		$showRawValues["zona_id"] = substr($data["zona_id"],0,100);
		$showRawValues["manfaat_id"] = substr($data["manfaat_id"],0,100);
		$showRawValues["golongan"] = substr($data["golongan"],0,100);
		$showRawValues["omset_lain"] = substr($data["omset_lain"],0,100);
		$showRawValues["keterangan_lain"] = substr($data["keterangan_lain"],0,100);
		$showRawValues["ijin_no"] = substr($data["ijin_no"],0,100);
		$showRawValues["jenis_masa"] = substr($data["jenis_masa"],0,100);
		$showRawValues["skpd_lama"] = substr($data["skpd_lama"],0,100);
		$showRawValues["proses"] = substr($data["proses"],0,100);
		$showRawValues["tanggal_validasi"] = substr($data["tanggal_validasi"],0,100);
		$showRawValues["bulan"] = substr($data["bulan"],0,100);
		$showRawValues["no_telp"] = substr($data["no_telp"],0,100);
		$showRawValues["usaha_id"] = substr($data["usaha_id"],0,100);
		$showRawValues["multiple"] = substr($data["multiple"],0,100);
		$showRawValues["bulan_telat"] = substr($data["bulan_telat"],0,100);
	
	// for custom expression for display field
	if ($dispFieldAlias)
	{
		$showValues[] = $data[$dispFieldAlias];	
		$showFields[] = $dispFieldAlias;
		$showRawValues[] = substr($data[$dispFieldAlias],0,100);
	}
	
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_POPUP)
	{	
		if($IsSaved && count($showValues))
		{
			$returnJSON['success'] = true;
			if($HaveData){
				$returnJSON['noKeys'] = false;
			}else{
				$returnJSON['noKeys'] = true;
			}
			
			$returnJSON['keys'] = $jsKeys;
			$returnJSON['keyFields'] = $keyFields;
			$returnJSON['vals'] = $showValues;
			$returnJSON['fields'] = $showFields;
			$returnJSON['rawVals'] = $showRawValues;
			$returnJSON['detKeys'] = $showDetailKeys;
			$returnJSON['userMess'] = $usermessage;
			$returnJSON['hrefs'] = $pageObject->buildDetailGridLinks($showDetailKeys);
			// add link and display value if list page is lookup with search
			if(array_key_exists('linkField', $linkAndDispVals))
			{
				$returnJSON['linkValue'] = $linkAndDispVals['linkField'];
				$returnJSON['displayValue'] = $linkAndDispVals['displayField'];
			}
			if($globalEvents->exists("IsRecordEditable", $strTableName))
			{ 
				if(!$globalEvents->IsRecordEditable($showRawValues, true, $strTableName))
					$returnJSON['nonEditable'] = true;
			}
			
			if($inlineadd==ADD_POPUP && isset($_SESSION[$strTableName."_count_captcha"]) || $_SESSION[$strTableName."_count_captcha"]>0 || $_SESSION[$strTableName."_count_captcha"]<5)
				$returnJSON['hideCaptcha'] = true;
		}
		else
		{
			$returnJSON['success'] = false;
			$returnJSON['message'] = $message;
			if(!$pageObject->isCaptchaOk)
				$returnJSON['captcha'] = false;
		}
		echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
		exit();
	}
} 

/////////////////////////////////////////////////////////////
if($inlineadd==ADD_MASTER)
{
	$respJSON = array();
	if(($_POST["a"]=="added" && $IsSaved))
	{
		$respJSON['afterAddId'] = $afterAdd_id;
		$respJSON['success'] = true;
		$respJSON['fields'] = $showFields;
		$respJSON['vals'] = $showValues;
		if($onFly){
			if($HaveData)
				$respJSON['noKeys'] = false;
			else
				$respJSON['noKeys'] = true;
			$respJSON['keys'] = $jsKeys;
			$respJSON['keyFields'] = $keyFields;
			$respJSON['rawVals'] = $showRawValues;
			$respJSON['detKeys'] = $showDetailKeys;
			$respJSON['userMess'] = $usermessage;
			$respJSON['hrefs'] = $pageObject->buildDetailGridLinks($showDetailKeys);
			if($globalEvents->exists("IsRecordEditable", $strTableName))
			{
				if(!$globalEvents->IsRecordEditable($showRawValues, true, $strTableName))
					$respJSON['nonEditable'] = true;
			}
		}
		$respJSON['mKeys'] = array();
		for($i=0;$i<count($dpParams['ids']);$i++)
		{
			$data=0;
			if(count($keys))
			{
				$where=KeyWhere($keys);
							$strSQL = $gQuery->gSQLWhere($where);
				LogInfo($strSQL);
				$rs = db_query($strSQL,$conn);
				$data = $pageObject->cipherer->DecryptFetchedArray($rs);
			}
			if(!$data)
				$data=$avalues;
			
			$mKeyId = 1;
			foreach($mKeys[$dpParams['strTableNames'][$i]] as $mk)
			{
				if($data[$mk])
					$respJSON['mKeys'][$dpParams['strTableNames'][$i]]['masterkey'.$mKeyId++] = $data[$mk];
				else
					$respJSON['mKeys'][$dpParams['strTableNames'][$i]]['masterkey'.$mKeyId++] = '';
			}
		}
		if(isset($_SESSION[$strTableName."_count_captcha"]) || $_SESSION[$strTableName."_count_captcha"]>0 || $_SESSION[$strTableName."_count_captcha"]<5)
			$respJSON['hidecaptcha'] = true;
	}
	else{
			$respJSON['success'] = false;
			if(!$pageObject->isCaptchaOk)
				$respJSON['captcha'] = false;
			else
				$respJSON['error'] = $message;
			if($onFly)
				$respJSON['message'] = $message;
		}
	echo "<textarea>".htmlspecialchars(my_json_encode($respJSON))."</textarea>";
	exit();
}

/////////////////////////////////////////////////////////////
//	prepare Edit Controls
/////////////////////////////////////////////////////////////

//	validation stuff
$regex='';
$regexmessage='';
$regextype = '';
$control = array();

foreach($addFields as $fName)
{
	$gfName = GoodFieldName($fName);
	$controls = array('controls'=>array());
	if(!$detailKeys || !in_array($fName, $detailKeys) || $fName == postvalue("category"))
	{
		$control[$gfName] = array();
		$control[$gfName]["func"] = "xt_buildeditcontrol";
		$control[$gfName]["params"] = array();
		$control[$gfName]["params"]["id"] = $id;
		$control[$gfName]["params"]["ptype"] = PAGE_ADD;
		$control[$gfName]["params"]["field"] = $fName;
		$control[$gfName]["params"]["value"] = @$defvalues[$fName];
		$control[$gfName]["params"]["pageObj"] = $pageObject;
		if($pageObject->pSet->isUseRTE($fName))
			$_SESSION[$strTableName."_".$fName."_rte"] = @$defvalues[$fName];
		
		//	Begin Add validation
		$arrValidate = $pageObject->pSet->getValidation($fName);
		$control[$gfName]["params"]["validate"] = $arrValidate;
		//	End Add validation
	}
	$controls["controls"]['ctrlInd'] = 0;
	$controls["controls"]['id'] = $id;
	$controls["controls"]['fieldName'] = $fName;
	//if richEditor for field
	if($pageObject->pSet->isUseRTE($fName))
	{
		if(!$detailKeys || !in_array($fName, $detailKeys))
			$control[$gfName]["params"]["mode"]="add";
		$controls["controls"]['mode'] = "add";
	}
	else
	{
		if($inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		{
			if(!$detailKeys || !in_array($fName, $detailKeys) || $fName == postvalue("category"))	
				$control[$gfName]["params"]["mode"]="inline_add";
			$controls["controls"]['mode'] = "inline_add";
		}
		else
		{
			if(!$detailKeys || !in_array($fName, $detailKeys) || $fName == postvalue("category"))	
				$control[$gfName]["params"]["mode"]="add";
			$controls["controls"]['mode'] = "add";
		}
	}
	
	if(!$detailKeys || !in_array($fName, $detailKeys))
		$xt->assignbyref($gfName."_editcontrol",$control[$gfName]);
	elseif($detailKeys && in_array($fName, $detailKeys))
		$controls["controls"]['value'] = @$defvalues[$fName];
	
	// category control field
	$strCategoryControl = $pageObject->isDependOnField($fName);
	
	if($strCategoryControl!==false && in_array($strCategoryControl, $addFields))
		$vals = array($fName => @$defvalues[$fName], $strCategoryControl => @$defvalues[$strCategoryControl]);
	else
		$vals = array($fName => @$defvalues[$fName]);
	
	$preload = $pageObject->fillPreload($fName, $vals);
	if($preload!==false)
	{
		$controls["controls"]['preloadData'] = $preload;
		if(!@$defvalues[$fName] && count($preload["vals"])>0)
			$defvalues[$fName] = $preload["vals"][0];
	}
	$pageObject->fillControlsMap($controls);
	
	//fill field tool tips
	$pageObject->fillFieldToolTips($fName);
	
	// fill special settings for timepicker
	if($pageObject->pSet->getEditFormat($fName) == 'Time')
		$pageObject->fillTimePickSettings($fName, @$defvalues[$fName]);
	
	if((($detailKeys && in_array($fName, $detailKeys)) || $fName == postvalue("category")) && array_key_exists($fName, $defvalues))
	{
		$value = $pageObject->showDBValue($fName, $defvalues);
		
		$xt->assign($gfName."_editcontrol", $value);
	}
}

//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_POPUP) && !isMobile())
{
	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		include("classes/searchclause.php");
	}
	
	$dControlsMap = array();
	$dViewControlsMap = array();
		
	$flyId = $ids+1;
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$options = array();
		//array of params for classes
		$options["mode"] = LIST_DETAILS;
		$options["pageType"] = PAGE_LIST;
		$options["masterPageType"] = PAGE_ADD;
		$options["mainMasterPageType"] = PAGE_ADD;
		$options['masterTable'] = "pad.pad_spt";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		
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
		$options['flyId'] = $flyId++;
		$mkr = 1;
		
		foreach($mKeys[$strTableName] as $mk)
		{
			if($defvalues[$mk])
				$options['masterKeysReq'][$mkr++] = $defvalues[$mk];
			else
				$options['masterKeysReq'][$mkr++] = '';
		}
		$listPageObject = ListPage::createListPage($strTableName,$options);
		
		// prepare code
		$listPageObject->prepareForBuildPage();
		$flyId = $listPageObject->recId+1;
		
		//set page events
		foreach($listPageObject->eventsObject->events as $event => $name)
			$listPageObject->xt->assign_event($event, $listPageObject->eventsObject, $event, array());
		
		//add detail settings to master settings
		$listPageObject->addControlsJSAndCSS();
		$listPageObject->fillSetCntrlMaps();
		$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];

		$dControlsMap[$strTableName] = $listPageObject->controlsMap;
		$dViewControlsMap[$strTableName] = $listPageObject->viewControlsMap;
		
		foreach($listPageObject->jsSettings["global"]["shortTNames"] as $tName => $shortTName){
			$pageObject->settingsMap["globalSettings"]["shortTNames"][$tName] = $shortTName;
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
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
	$pageObject->viewControlsMap['dViewControlsMap'] = $dViewControlsMap;
	$strTableName = "pad.pad_spt";
}
/////////////////////////////////////////////////////////////
//fill jsSettings and ControlsHTMLMap
$pageObject->fillSetCntrlMaps();

$pageObject->addCommonJs();

//For mobile version in apple device

if($inlineadd == ADD_SIMPLE)
{
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";
	$pageObject->body['end']["object"] = &$pageObject;
	$xt->assign("body", $pageObject->body);
	$xt->assign("flybody",true);
}

if($inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_MASTER || $inlineadd==ADD_POPUP)
{ 
	$xt->assign("footer",false);
	$xt->assign("header",false);
	$xt->assign("flybody", $pageObject->body);
	$xt->assign("body",true);
}	

$xt->assign("style_block",true);
$pageObject->xt->assign("legend", true);

if($eventObj->exists("BeforeShowAdd"))
	$eventObj->BeforeShowAdd($xt, $templatefile, $pageObject);
	
if($inlineadd != ADD_SIMPLE)
{
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['viewControlsMap'] = $pageObject->viewControlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;	
}

if($inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
{
	$xt->load_template($templatefile);
	$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('body');
	if(count($pageObject->includes_css))
		$returnJSON['CSSFiles'] = array_unique($pageObject->includes_css);
	if(count($pageObject->includes_cssIE))
		$returnJSON['CSSFilesIE'] = array_unique($pageObject->includes_cssIE);
	$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
	$returnJSON['idStartFrom'] = $id+1;	
	echo (my_json_encode($returnJSON)); 
}
elseif ($inlineadd == ADD_INLINE)
{
	$xt->load_template($templatefile);
	$returnJSON["html"] = array();
	foreach($addFields as $fName)
	{
		$returnJSON["html"][$fName] = $xt->fetchVar(GoodFieldName($fName)."_editcontrol");	
	}	
	$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
	$returnJSON["additionalCSS"] = $pageObject->grabAllCSSFiles();
	echo (my_json_encode($returnJSON)); 
}
else
	$xt->display($templatefile);

function GetAddedDataLookupQuery($pageObject, $keys, $forLookup)
{
	global $conn, $strTableName, $strOriginalTableName;
	
	$LookupSQL = "";
	$linkfield = "";
	$dispfield = "";
	$noBlobReplace = false;
	$lookupFieldName = "";
	
	if($LookupSQL && $nLookupType != LT_QUERY)
		$LookupSQL.=" from ".AddTableWrappers($strOriginalTableName);
		
	$data = 0;
	$lookupIndexes = array("linkFieldIndex" => 0, "displayFieldIndex" => 0);
	if(count($keys))
	{
		$where = KeyWhere($keys);
		if($nLookupType == LT_QUERY){
			$LookupSQL = $lookupQueryObj->toSql(whereAdd($lookupQueryObj->m_where->toSql($lookupQueryObj), $where));
		}else 
			$LookupSQL.=" where ".$where;
		$lookupIndexes = GetLookupFieldsIndexes($lookupPSet, $lookupFieldName);
		LogInfo($LookupSQL);
		if($forLookup){
			$rs=db_query($LookupSQL,$conn);
			$data = $pageObject->cipherer->DecryptFetchedArray($rs);
		}else if($LookupSQL)
		{
			$rs = db_query($LookupSQL,$conn);
			$data = db_fetch_numarray($rs);
			$data[$lookupIndexes["linkFieldIndex"]] = $pageObject->cipherer->DecryptField($linkFieldName, $data[$lookupIndexes["linkFieldIndex"]]);
			if($nLookupType == LT_QUERY)
				$data[$lookupIndexes["displayFieldIndex"]] = $pageObject->cipherer->DecryptField($dispfield, $data[$lookupIndexes["displayFieldIndex"]]);		
		}
	}

	return array($data, array("linkField" => $linkFieldName, "displayField" => $dispfield
		, "linkFieldIndex" => $lookupIndexes["linkFieldIndex"], "displayFieldIndex" => $lookupIndexes["displayFieldIndex"]));
}	
	
?>
