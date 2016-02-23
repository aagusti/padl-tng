<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/pad_pad_customer_usaha_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_customer_usaha_add"] = $layout;



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
	$templatefile = "pad_pad_customer_usaha_inline_add.htm";
else
	$templatefile = "pad_pad_customer_usaha_add.htm";

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
		header('Location: pad_pad_customer_usaha_add.php');
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
//	processing konterid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_konterid = $pageObject->getControl("konterid", $id);
		$control_konterid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing konterid - end
//	processing reg_date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_reg_date = $pageObject->getControl("reg_date", $id);
		$control_reg_date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing reg_date - end
//	processing customer_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_customer_id = $pageObject->getControl("customer_id", $id);
		$control_customer_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing customer_id - end
//	processing usaha_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_usaha_id = $pageObject->getControl("usaha_id", $id);
		$control_usaha_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing usaha_id - end
//	processing so - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_so = $pageObject->getControl("so", $id);
		$control_so->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing so - end
//	processing kecamatan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kecamatan_id = $pageObject->getControl("kecamatan_id", $id);
		$control_kecamatan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kecamatan_id - end
//	processing kelurahan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kelurahan_id = $pageObject->getControl("kelurahan_id", $id);
		$control_kelurahan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kelurahan_id - end
//	processing notes - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_notes = $pageObject->getControl("notes", $id);
		$control_notes->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing notes - end
//	processing enabled - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_enabled = $pageObject->getControl("enabled", $id);
		$control_enabled->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing enabled - end
//	processing create_uid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_create_uid = $pageObject->getControl("create_uid", $id);
		$control_create_uid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing create_uid - end
//	processing customer_status_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_customer_status_id = $pageObject->getControl("customer_status_id", $id);
		$control_customer_status_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing customer_status_id - end
//	processing aktifnotes - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_aktifnotes = $pageObject->getControl("aktifnotes", $id);
		$control_aktifnotes->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing aktifnotes - end
//	processing tmt - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tmt = $pageObject->getControl("tmt", $id);
		$control_tmt->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tmt - end
//	processing air_zona_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_air_zona_id = $pageObject->getControl("air_zona_id", $id);
		$control_air_zona_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing air_zona_id - end
//	processing air_manfaat_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_air_manfaat_id = $pageObject->getControl("air_manfaat_id", $id);
		$control_air_manfaat_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing air_manfaat_id - end
//	processing def_pajak_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_def_pajak_id = $pageObject->getControl("def_pajak_id", $id);
		$control_def_pajak_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing def_pajak_id - end
//	processing opnm - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_opnm = $pageObject->getControl("opnm", $id);
		$control_opnm->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing opnm - end
//	processing opalamat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_opalamat = $pageObject->getControl("opalamat", $id);
		$control_opalamat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing opalamat - end
//	processing latitude - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_latitude = $pageObject->getControl("latitude", $id);
		$control_latitude->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing latitude - end
//	processing longitude - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_longitude = $pageObject->getControl("longitude", $id);
		$control_longitude->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing longitude - end
//	processing created - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_created = $pageObject->getControl("created", $id);
		$control_created->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing created - end
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
//	processing kd_restojmlmeja - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_restojmlmeja = $pageObject->getControl("kd_restojmlmeja", $id);
		$control_kd_restojmlmeja->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_restojmlmeja - end
//	processing kd_restojmlkursi - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_restojmlkursi = $pageObject->getControl("kd_restojmlkursi", $id);
		$control_kd_restojmlkursi->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_restojmlkursi - end
//	processing kd_restojmltamu - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_restojmltamu = $pageObject->getControl("kd_restojmltamu", $id);
		$control_kd_restojmltamu->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_restojmltamu - end
//	processing kd_filmkursi - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_filmkursi = $pageObject->getControl("kd_filmkursi", $id);
		$control_kd_filmkursi->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_filmkursi - end
//	processing kd_filmpertunjukan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_filmpertunjukan = $pageObject->getControl("kd_filmpertunjukan", $id);
		$control_kd_filmpertunjukan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_filmpertunjukan - end
//	processing kd_filmtarif - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_filmtarif = $pageObject->getControl("kd_filmtarif", $id);
		$control_kd_filmtarif->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_filmtarif - end
//	processing kd_bilyarmeja - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_bilyarmeja = $pageObject->getControl("kd_bilyarmeja", $id);
		$control_kd_bilyarmeja->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_bilyarmeja - end
//	processing kd_bilyartarif - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_bilyartarif = $pageObject->getControl("kd_bilyartarif", $id);
		$control_kd_bilyartarif->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_bilyartarif - end
//	processing kd_bilyarkegiatan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_bilyarkegiatan = $pageObject->getControl("kd_bilyarkegiatan", $id);
		$control_kd_bilyarkegiatan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_bilyarkegiatan - end
//	processing kd_diskopengunjung - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_diskopengunjung = $pageObject->getControl("kd_diskopengunjung", $id);
		$control_kd_diskopengunjung->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_diskopengunjung - end
//	processing kd_diskotarif - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_diskotarif = $pageObject->getControl("kd_diskotarif", $id);
		$control_kd_diskotarif->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_diskotarif - end
//	processing mall_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_mall_id = $pageObject->getControl("mall_id", $id);
		$control_mall_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing mall_id - end
//	processing cash_register - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_cash_register = $pageObject->getControl("cash_register", $id);
		$control_cash_register->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing cash_register - end
//	processing pelaporan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pelaporan = $pageObject->getControl("pelaporan", $id);
		$control_pelaporan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pelaporan - end
//	processing pembukuan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pembukuan = $pageObject->getControl("pembukuan", $id);
		$control_pembukuan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pembukuan - end
//	processing bandara - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_bandara = $pageObject->getControl("bandara", $id);
		$control_bandara->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing bandara - end
//	processing wajib_pajak - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_wajib_pajak = $pageObject->getControl("wajib_pajak", $id);
		$control_wajib_pajak->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing wajib_pajak - end
//	processing jumlah_karyawan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jumlah_karyawan = $pageObject->getControl("jumlah_karyawan", $id);
		$control_jumlah_karyawan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jumlah_karyawan - end
//	processing tanggal_tutup - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tanggal_tutup = $pageObject->getControl("tanggal_tutup", $id);
		$control_tanggal_tutup->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tanggal_tutup - end
//	processing parkir_luas - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_luas = $pageObject->getControl("parkir_luas", $id);
		$control_parkir_luas->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_luas - end
//	processing parkir_masuk - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_masuk = $pageObject->getControl("parkir_masuk", $id);
		$control_parkir_masuk->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_masuk - end
//	processing parkir_tarif_mobil - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_tarif_mobil = $pageObject->getControl("parkir_tarif_mobil", $id);
		$control_parkir_tarif_mobil->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_tarif_mobil - end
//	processing parkir_tambahan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_tambahan = $pageObject->getControl("parkir_tambahan", $id);
		$control_parkir_tambahan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_tambahan - end
//	processing parkir_kapasitas_mobil - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_kapasitas_mobil = $pageObject->getControl("parkir_kapasitas_mobil", $id);
		$control_parkir_kapasitas_mobil->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_kapasitas_mobil - end
//	processing parkir_mobil_hari - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_mobil_hari = $pageObject->getControl("parkir_mobil_hari", $id);
		$control_parkir_mobil_hari->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_mobil_hari - end
//	processing parkir_keluar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_keluar = $pageObject->getControl("parkir_keluar", $id);
		$control_parkir_keluar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_keluar - end
//	processing parkir_motor_luas - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_motor_luas = $pageObject->getControl("parkir_motor_luas", $id);
		$control_parkir_motor_luas->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_motor_luas - end
//	processing parkir_motor_masuk - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_motor_masuk = $pageObject->getControl("parkir_motor_masuk", $id);
		$control_parkir_motor_masuk->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_motor_masuk - end
//	processing parkir_motor_keluar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_motor_keluar = $pageObject->getControl("parkir_motor_keluar", $id);
		$control_parkir_motor_keluar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_motor_keluar - end
//	processing parkir_tarif_motor - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_tarif_motor = $pageObject->getControl("parkir_tarif_motor", $id);
		$control_parkir_tarif_motor->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_tarif_motor - end
//	processing parkir_motor_tambahan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_motor_tambahan = $pageObject->getControl("parkir_motor_tambahan", $id);
		$control_parkir_motor_tambahan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_motor_tambahan - end
//	processing parkir_kapasitas_motor - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_kapasitas_motor = $pageObject->getControl("parkir_kapasitas_motor", $id);
		$control_parkir_kapasitas_motor->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_kapasitas_motor - end
//	processing parkir_motor_hari - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_motor_hari = $pageObject->getControl("parkir_motor_hari", $id);
		$control_parkir_motor_hari->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_motor_hari - end
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
//	processing golongan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_golongan_id = $pageObject->getControl("golongan_id", $id);
		$control_golongan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing golongan_id - end
//	processing id_old - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_id_old = $pageObject->getControl("id_old", $id);
		$control_id_old->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing id_old - end


//	insert masterkey value if exists and if not specified
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_customer")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["customer_id"]==""){
			$avalues["customer_id"] = prepare_for_db("customer_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
	}
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_kecamatan")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["kecamatan_id"]==""){
			$avalues["kecamatan_id"] = prepare_for_db("kecamatan_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
	}
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_kelurahan")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["kelurahan_id"]==""){
			$avalues["kelurahan_id"] = prepare_for_db("kelurahan_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
	}
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_usaha")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["usaha_id"]==""){
			$avalues["usaha_id"] = prepare_for_db("usaha_id",$_SESSION[$sessionPrefix."_masterkey1"]);
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
//	processing konterid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_konterid->afterSuccessfulSave();
			}
//	processing konterid - end
//	processing reg_date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_reg_date->afterSuccessfulSave();
			}
//	processing reg_date - end
//	processing customer_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_customer_id->afterSuccessfulSave();
			}
//	processing customer_id - end
//	processing usaha_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_usaha_id->afterSuccessfulSave();
			}
//	processing usaha_id - end
//	processing so - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_so->afterSuccessfulSave();
			}
//	processing so - end
//	processing kecamatan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kecamatan_id->afterSuccessfulSave();
			}
//	processing kecamatan_id - end
//	processing kelurahan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kelurahan_id->afterSuccessfulSave();
			}
//	processing kelurahan_id - end
//	processing notes - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_notes->afterSuccessfulSave();
			}
//	processing notes - end
//	processing enabled - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_enabled->afterSuccessfulSave();
			}
//	processing enabled - end
//	processing create_uid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_create_uid->afterSuccessfulSave();
			}
//	processing create_uid - end
//	processing customer_status_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_customer_status_id->afterSuccessfulSave();
			}
//	processing customer_status_id - end
//	processing aktifnotes - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_aktifnotes->afterSuccessfulSave();
			}
//	processing aktifnotes - end
//	processing tmt - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tmt->afterSuccessfulSave();
			}
//	processing tmt - end
//	processing air_zona_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_air_zona_id->afterSuccessfulSave();
			}
//	processing air_zona_id - end
//	processing air_manfaat_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_air_manfaat_id->afterSuccessfulSave();
			}
//	processing air_manfaat_id - end
//	processing def_pajak_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_def_pajak_id->afterSuccessfulSave();
			}
//	processing def_pajak_id - end
//	processing opnm - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_opnm->afterSuccessfulSave();
			}
//	processing opnm - end
//	processing opalamat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_opalamat->afterSuccessfulSave();
			}
//	processing opalamat - end
//	processing latitude - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_latitude->afterSuccessfulSave();
			}
//	processing latitude - end
//	processing longitude - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_longitude->afterSuccessfulSave();
			}
//	processing longitude - end
//	processing created - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_created->afterSuccessfulSave();
			}
//	processing created - end
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
//	processing kd_restojmlmeja - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_restojmlmeja->afterSuccessfulSave();
			}
//	processing kd_restojmlmeja - end
//	processing kd_restojmlkursi - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_restojmlkursi->afterSuccessfulSave();
			}
//	processing kd_restojmlkursi - end
//	processing kd_restojmltamu - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_restojmltamu->afterSuccessfulSave();
			}
//	processing kd_restojmltamu - end
//	processing kd_filmkursi - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_filmkursi->afterSuccessfulSave();
			}
//	processing kd_filmkursi - end
//	processing kd_filmpertunjukan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_filmpertunjukan->afterSuccessfulSave();
			}
//	processing kd_filmpertunjukan - end
//	processing kd_filmtarif - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_filmtarif->afterSuccessfulSave();
			}
//	processing kd_filmtarif - end
//	processing kd_bilyarmeja - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_bilyarmeja->afterSuccessfulSave();
			}
//	processing kd_bilyarmeja - end
//	processing kd_bilyartarif - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_bilyartarif->afterSuccessfulSave();
			}
//	processing kd_bilyartarif - end
//	processing kd_bilyarkegiatan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_bilyarkegiatan->afterSuccessfulSave();
			}
//	processing kd_bilyarkegiatan - end
//	processing kd_diskopengunjung - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_diskopengunjung->afterSuccessfulSave();
			}
//	processing kd_diskopengunjung - end
//	processing kd_diskotarif - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_diskotarif->afterSuccessfulSave();
			}
//	processing kd_diskotarif - end
//	processing mall_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_mall_id->afterSuccessfulSave();
			}
//	processing mall_id - end
//	processing cash_register - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_cash_register->afterSuccessfulSave();
			}
//	processing cash_register - end
//	processing pelaporan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pelaporan->afterSuccessfulSave();
			}
//	processing pelaporan - end
//	processing pembukuan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pembukuan->afterSuccessfulSave();
			}
//	processing pembukuan - end
//	processing bandara - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_bandara->afterSuccessfulSave();
			}
//	processing bandara - end
//	processing wajib_pajak - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_wajib_pajak->afterSuccessfulSave();
			}
//	processing wajib_pajak - end
//	processing jumlah_karyawan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jumlah_karyawan->afterSuccessfulSave();
			}
//	processing jumlah_karyawan - end
//	processing tanggal_tutup - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tanggal_tutup->afterSuccessfulSave();
			}
//	processing tanggal_tutup - end
//	processing parkir_luas - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_luas->afterSuccessfulSave();
			}
//	processing parkir_luas - end
//	processing parkir_masuk - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_masuk->afterSuccessfulSave();
			}
//	processing parkir_masuk - end
//	processing parkir_tarif_mobil - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_tarif_mobil->afterSuccessfulSave();
			}
//	processing parkir_tarif_mobil - end
//	processing parkir_tambahan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_tambahan->afterSuccessfulSave();
			}
//	processing parkir_tambahan - end
//	processing parkir_kapasitas_mobil - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_kapasitas_mobil->afterSuccessfulSave();
			}
//	processing parkir_kapasitas_mobil - end
//	processing parkir_mobil_hari - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_mobil_hari->afterSuccessfulSave();
			}
//	processing parkir_mobil_hari - end
//	processing parkir_keluar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_keluar->afterSuccessfulSave();
			}
//	processing parkir_keluar - end
//	processing parkir_motor_luas - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_motor_luas->afterSuccessfulSave();
			}
//	processing parkir_motor_luas - end
//	processing parkir_motor_masuk - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_motor_masuk->afterSuccessfulSave();
			}
//	processing parkir_motor_masuk - end
//	processing parkir_motor_keluar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_motor_keluar->afterSuccessfulSave();
			}
//	processing parkir_motor_keluar - end
//	processing parkir_tarif_motor - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_tarif_motor->afterSuccessfulSave();
			}
//	processing parkir_tarif_motor - end
//	processing parkir_motor_tambahan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_motor_tambahan->afterSuccessfulSave();
			}
//	processing parkir_motor_tambahan - end
//	processing parkir_kapasitas_motor - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_kapasitas_motor->afterSuccessfulSave();
			}
//	processing parkir_kapasitas_motor - end
//	processing parkir_motor_hari - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_motor_hari->afterSuccessfulSave();
			}
//	processing parkir_motor_hari - end
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
//	processing golongan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_golongan_id->afterSuccessfulSave();
			}
//	processing golongan_id - end
//	processing id_old - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_id_old->afterSuccessfulSave();
			}
//	processing id_old - end

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
						$message .='&nbsp;<a href=\'pad_pad_customer_usaha_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'pad_pad_customer_usaha_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: pad_pad_customer_usaha_".$pageObject->getPageType().".php");
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

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_customer")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["customer_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_kecamatan")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["kecamatan_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_kelurahan")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["kelurahan_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_usaha")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["usaha_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if($readavalues)
{
	$defvalues["konterid"]=@$avalues["konterid"];
	$defvalues["reg_date"]=@$avalues["reg_date"];
	$defvalues["customer_id"]=@$avalues["customer_id"];
	$defvalues["usaha_id"]=@$avalues["usaha_id"];
	$defvalues["so"]=@$avalues["so"];
	$defvalues["kecamatan_id"]=@$avalues["kecamatan_id"];
	$defvalues["kelurahan_id"]=@$avalues["kelurahan_id"];
	$defvalues["notes"]=@$avalues["notes"];
	$defvalues["enabled"]=@$avalues["enabled"];
	$defvalues["create_uid"]=@$avalues["create_uid"];
	$defvalues["customer_status_id"]=@$avalues["customer_status_id"];
	$defvalues["aktifnotes"]=@$avalues["aktifnotes"];
	$defvalues["tmt"]=@$avalues["tmt"];
	$defvalues["air_zona_id"]=@$avalues["air_zona_id"];
	$defvalues["air_manfaat_id"]=@$avalues["air_manfaat_id"];
	$defvalues["def_pajak_id"]=@$avalues["def_pajak_id"];
	$defvalues["opnm"]=@$avalues["opnm"];
	$defvalues["opalamat"]=@$avalues["opalamat"];
	$defvalues["latitude"]=@$avalues["latitude"];
	$defvalues["longitude"]=@$avalues["longitude"];
	$defvalues["created"]=@$avalues["created"];
	$defvalues["updated"]=@$avalues["updated"];
	$defvalues["update_uid"]=@$avalues["update_uid"];
	$defvalues["kd_restojmlmeja"]=@$avalues["kd_restojmlmeja"];
	$defvalues["kd_restojmlkursi"]=@$avalues["kd_restojmlkursi"];
	$defvalues["kd_restojmltamu"]=@$avalues["kd_restojmltamu"];
	$defvalues["kd_filmkursi"]=@$avalues["kd_filmkursi"];
	$defvalues["kd_filmpertunjukan"]=@$avalues["kd_filmpertunjukan"];
	$defvalues["kd_filmtarif"]=@$avalues["kd_filmtarif"];
	$defvalues["kd_bilyarmeja"]=@$avalues["kd_bilyarmeja"];
	$defvalues["kd_bilyartarif"]=@$avalues["kd_bilyartarif"];
	$defvalues["kd_bilyarkegiatan"]=@$avalues["kd_bilyarkegiatan"];
	$defvalues["kd_diskopengunjung"]=@$avalues["kd_diskopengunjung"];
	$defvalues["kd_diskotarif"]=@$avalues["kd_diskotarif"];
	$defvalues["mall_id"]=@$avalues["mall_id"];
	$defvalues["cash_register"]=@$avalues["cash_register"];
	$defvalues["pelaporan"]=@$avalues["pelaporan"];
	$defvalues["pembukuan"]=@$avalues["pembukuan"];
	$defvalues["bandara"]=@$avalues["bandara"];
	$defvalues["wajib_pajak"]=@$avalues["wajib_pajak"];
	$defvalues["jumlah_karyawan"]=@$avalues["jumlah_karyawan"];
	$defvalues["tanggal_tutup"]=@$avalues["tanggal_tutup"];
	$defvalues["parkir_luas"]=@$avalues["parkir_luas"];
	$defvalues["parkir_masuk"]=@$avalues["parkir_masuk"];
	$defvalues["parkir_tarif_mobil"]=@$avalues["parkir_tarif_mobil"];
	$defvalues["parkir_tambahan"]=@$avalues["parkir_tambahan"];
	$defvalues["parkir_kapasitas_mobil"]=@$avalues["parkir_kapasitas_mobil"];
	$defvalues["parkir_mobil_hari"]=@$avalues["parkir_mobil_hari"];
	$defvalues["parkir_keluar"]=@$avalues["parkir_keluar"];
	$defvalues["parkir_motor_luas"]=@$avalues["parkir_motor_luas"];
	$defvalues["parkir_motor_masuk"]=@$avalues["parkir_motor_masuk"];
	$defvalues["parkir_motor_keluar"]=@$avalues["parkir_motor_keluar"];
	$defvalues["parkir_tarif_motor"]=@$avalues["parkir_tarif_motor"];
	$defvalues["parkir_motor_tambahan"]=@$avalues["parkir_motor_tambahan"];
	$defvalues["parkir_kapasitas_motor"]=@$avalues["parkir_kapasitas_motor"];
	$defvalues["parkir_motor_hari"]=@$avalues["parkir_motor_hari"];
	$defvalues["kelompok_usaha_id"]=@$avalues["kelompok_usaha_id"];
	$defvalues["zona_id"]=@$avalues["zona_id"];
	$defvalues["manfaat_id"]=@$avalues["manfaat_id"];
	$defvalues["golongan_id"]=@$avalues["golongan_id"];
	$defvalues["id_old"]=@$avalues["id_old"];
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
	
	if(!$pageObject->isAppearOnTabs("konterid"))
		$xt->assign("konterid_fieldblock",true);
	else
		$xt->assign("konterid_tabfieldblock",true);
	$xt->assign("konterid_label",true);
	if(isEnableSection508())
		$xt->assign_section("konterid_label","<label for=\"".GetInputElementId("konterid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("reg_date"))
		$xt->assign("reg_date_fieldblock",true);
	else
		$xt->assign("reg_date_tabfieldblock",true);
	$xt->assign("reg_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("reg_date_label","<label for=\"".GetInputElementId("reg_date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("customer_id"))
		$xt->assign("customer_id_fieldblock",true);
	else
		$xt->assign("customer_id_tabfieldblock",true);
	$xt->assign("customer_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("customer_id_label","<label for=\"".GetInputElementId("customer_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("usaha_id"))
		$xt->assign("usaha_id_fieldblock",true);
	else
		$xt->assign("usaha_id_tabfieldblock",true);
	$xt->assign("usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("usaha_id_label","<label for=\"".GetInputElementId("usaha_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("so"))
		$xt->assign("so_fieldblock",true);
	else
		$xt->assign("so_tabfieldblock",true);
	$xt->assign("so_label",true);
	if(isEnableSection508())
		$xt->assign_section("so_label","<label for=\"".GetInputElementId("so", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kecamatan_id"))
		$xt->assign("kecamatan_id_fieldblock",true);
	else
		$xt->assign("kecamatan_id_tabfieldblock",true);
	$xt->assign("kecamatan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("kecamatan_id_label","<label for=\"".GetInputElementId("kecamatan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kelurahan_id"))
		$xt->assign("kelurahan_id_fieldblock",true);
	else
		$xt->assign("kelurahan_id_tabfieldblock",true);
	$xt->assign("kelurahan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("kelurahan_id_label","<label for=\"".GetInputElementId("kelurahan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("notes"))
		$xt->assign("notes_fieldblock",true);
	else
		$xt->assign("notes_tabfieldblock",true);
	$xt->assign("notes_label",true);
	if(isEnableSection508())
		$xt->assign_section("notes_label","<label for=\"".GetInputElementId("notes", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("enabled"))
		$xt->assign("enabled_fieldblock",true);
	else
		$xt->assign("enabled_tabfieldblock",true);
	$xt->assign("enabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("enabled_label","<label for=\"".GetInputElementId("enabled", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
	$xt->assign("create_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_uid_label","<label for=\"".GetInputElementId("create_uid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("customer_status_id"))
		$xt->assign("customer_status_id_fieldblock",true);
	else
		$xt->assign("customer_status_id_tabfieldblock",true);
	$xt->assign("customer_status_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("customer_status_id_label","<label for=\"".GetInputElementId("customer_status_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("aktifnotes"))
		$xt->assign("aktifnotes_fieldblock",true);
	else
		$xt->assign("aktifnotes_tabfieldblock",true);
	$xt->assign("aktifnotes_label",true);
	if(isEnableSection508())
		$xt->assign_section("aktifnotes_label","<label for=\"".GetInputElementId("aktifnotes", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tmt"))
		$xt->assign("tmt_fieldblock",true);
	else
		$xt->assign("tmt_tabfieldblock",true);
	$xt->assign("tmt_label",true);
	if(isEnableSection508())
		$xt->assign_section("tmt_label","<label for=\"".GetInputElementId("tmt", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("air_zona_id"))
		$xt->assign("air_zona_id_fieldblock",true);
	else
		$xt->assign("air_zona_id_tabfieldblock",true);
	$xt->assign("air_zona_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("air_zona_id_label","<label for=\"".GetInputElementId("air_zona_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("air_manfaat_id"))
		$xt->assign("air_manfaat_id_fieldblock",true);
	else
		$xt->assign("air_manfaat_id_tabfieldblock",true);
	$xt->assign("air_manfaat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("air_manfaat_id_label","<label for=\"".GetInputElementId("air_manfaat_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("def_pajak_id"))
		$xt->assign("def_pajak_id_fieldblock",true);
	else
		$xt->assign("def_pajak_id_tabfieldblock",true);
	$xt->assign("def_pajak_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("def_pajak_id_label","<label for=\"".GetInputElementId("def_pajak_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("opnm"))
		$xt->assign("opnm_fieldblock",true);
	else
		$xt->assign("opnm_tabfieldblock",true);
	$xt->assign("opnm_label",true);
	if(isEnableSection508())
		$xt->assign_section("opnm_label","<label for=\"".GetInputElementId("opnm", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("opalamat"))
		$xt->assign("opalamat_fieldblock",true);
	else
		$xt->assign("opalamat_tabfieldblock",true);
	$xt->assign("opalamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("opalamat_label","<label for=\"".GetInputElementId("opalamat", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("latitude"))
		$xt->assign("latitude_fieldblock",true);
	else
		$xt->assign("latitude_tabfieldblock",true);
	$xt->assign("latitude_label",true);
	if(isEnableSection508())
		$xt->assign_section("latitude_label","<label for=\"".GetInputElementId("latitude", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("longitude"))
		$xt->assign("longitude_fieldblock",true);
	else
		$xt->assign("longitude_tabfieldblock",true);
	$xt->assign("longitude_label",true);
	if(isEnableSection508())
		$xt->assign_section("longitude_label","<label for=\"".GetInputElementId("longitude", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
	$xt->assign("created_label",true);
	if(isEnableSection508())
		$xt->assign_section("created_label","<label for=\"".GetInputElementId("created", $id, PAGE_ADD)."\">","</label>");
	
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
	
	if(!$pageObject->isAppearOnTabs("kd_restojmlmeja"))
		$xt->assign("kd_restojmlmeja_fieldblock",true);
	else
		$xt->assign("kd_restojmlmeja_tabfieldblock",true);
	$xt->assign("kd_restojmlmeja_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_restojmlmeja_label","<label for=\"".GetInputElementId("kd_restojmlmeja", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_restojmlkursi"))
		$xt->assign("kd_restojmlkursi_fieldblock",true);
	else
		$xt->assign("kd_restojmlkursi_tabfieldblock",true);
	$xt->assign("kd_restojmlkursi_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_restojmlkursi_label","<label for=\"".GetInputElementId("kd_restojmlkursi", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_restojmltamu"))
		$xt->assign("kd_restojmltamu_fieldblock",true);
	else
		$xt->assign("kd_restojmltamu_tabfieldblock",true);
	$xt->assign("kd_restojmltamu_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_restojmltamu_label","<label for=\"".GetInputElementId("kd_restojmltamu", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_filmkursi"))
		$xt->assign("kd_filmkursi_fieldblock",true);
	else
		$xt->assign("kd_filmkursi_tabfieldblock",true);
	$xt->assign("kd_filmkursi_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_filmkursi_label","<label for=\"".GetInputElementId("kd_filmkursi", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_filmpertunjukan"))
		$xt->assign("kd_filmpertunjukan_fieldblock",true);
	else
		$xt->assign("kd_filmpertunjukan_tabfieldblock",true);
	$xt->assign("kd_filmpertunjukan_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_filmpertunjukan_label","<label for=\"".GetInputElementId("kd_filmpertunjukan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_filmtarif"))
		$xt->assign("kd_filmtarif_fieldblock",true);
	else
		$xt->assign("kd_filmtarif_tabfieldblock",true);
	$xt->assign("kd_filmtarif_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_filmtarif_label","<label for=\"".GetInputElementId("kd_filmtarif", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_bilyarmeja"))
		$xt->assign("kd_bilyarmeja_fieldblock",true);
	else
		$xt->assign("kd_bilyarmeja_tabfieldblock",true);
	$xt->assign("kd_bilyarmeja_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bilyarmeja_label","<label for=\"".GetInputElementId("kd_bilyarmeja", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_bilyartarif"))
		$xt->assign("kd_bilyartarif_fieldblock",true);
	else
		$xt->assign("kd_bilyartarif_tabfieldblock",true);
	$xt->assign("kd_bilyartarif_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bilyartarif_label","<label for=\"".GetInputElementId("kd_bilyartarif", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_bilyarkegiatan"))
		$xt->assign("kd_bilyarkegiatan_fieldblock",true);
	else
		$xt->assign("kd_bilyarkegiatan_tabfieldblock",true);
	$xt->assign("kd_bilyarkegiatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bilyarkegiatan_label","<label for=\"".GetInputElementId("kd_bilyarkegiatan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_diskopengunjung"))
		$xt->assign("kd_diskopengunjung_fieldblock",true);
	else
		$xt->assign("kd_diskopengunjung_tabfieldblock",true);
	$xt->assign("kd_diskopengunjung_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_diskopengunjung_label","<label for=\"".GetInputElementId("kd_diskopengunjung", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_diskotarif"))
		$xt->assign("kd_diskotarif_fieldblock",true);
	else
		$xt->assign("kd_diskotarif_tabfieldblock",true);
	$xt->assign("kd_diskotarif_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_diskotarif_label","<label for=\"".GetInputElementId("kd_diskotarif", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("mall_id"))
		$xt->assign("mall_id_fieldblock",true);
	else
		$xt->assign("mall_id_tabfieldblock",true);
	$xt->assign("mall_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("mall_id_label","<label for=\"".GetInputElementId("mall_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("cash_register"))
		$xt->assign("cash_register_fieldblock",true);
	else
		$xt->assign("cash_register_tabfieldblock",true);
	$xt->assign("cash_register_label",true);
	if(isEnableSection508())
		$xt->assign_section("cash_register_label","<label for=\"".GetInputElementId("cash_register", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pelaporan"))
		$xt->assign("pelaporan_fieldblock",true);
	else
		$xt->assign("pelaporan_tabfieldblock",true);
	$xt->assign("pelaporan_label",true);
	if(isEnableSection508())
		$xt->assign_section("pelaporan_label","<label for=\"".GetInputElementId("pelaporan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pembukuan"))
		$xt->assign("pembukuan_fieldblock",true);
	else
		$xt->assign("pembukuan_tabfieldblock",true);
	$xt->assign("pembukuan_label",true);
	if(isEnableSection508())
		$xt->assign_section("pembukuan_label","<label for=\"".GetInputElementId("pembukuan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("bandara"))
		$xt->assign("bandara_fieldblock",true);
	else
		$xt->assign("bandara_tabfieldblock",true);
	$xt->assign("bandara_label",true);
	if(isEnableSection508())
		$xt->assign_section("bandara_label","<label for=\"".GetInputElementId("bandara", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("wajib_pajak"))
		$xt->assign("wajib_pajak_fieldblock",true);
	else
		$xt->assign("wajib_pajak_tabfieldblock",true);
	$xt->assign("wajib_pajak_label",true);
	if(isEnableSection508())
		$xt->assign_section("wajib_pajak_label","<label for=\"".GetInputElementId("wajib_pajak", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("jumlah_karyawan"))
		$xt->assign("jumlah_karyawan_fieldblock",true);
	else
		$xt->assign("jumlah_karyawan_tabfieldblock",true);
	$xt->assign("jumlah_karyawan_label",true);
	if(isEnableSection508())
		$xt->assign_section("jumlah_karyawan_label","<label for=\"".GetInputElementId("jumlah_karyawan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tanggal_tutup"))
		$xt->assign("tanggal_tutup_fieldblock",true);
	else
		$xt->assign("tanggal_tutup_tabfieldblock",true);
	$xt->assign("tanggal_tutup_label",true);
	if(isEnableSection508())
		$xt->assign_section("tanggal_tutup_label","<label for=\"".GetInputElementId("tanggal_tutup", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_luas"))
		$xt->assign("parkir_luas_fieldblock",true);
	else
		$xt->assign("parkir_luas_tabfieldblock",true);
	$xt->assign("parkir_luas_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_luas_label","<label for=\"".GetInputElementId("parkir_luas", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_masuk"))
		$xt->assign("parkir_masuk_fieldblock",true);
	else
		$xt->assign("parkir_masuk_tabfieldblock",true);
	$xt->assign("parkir_masuk_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_masuk_label","<label for=\"".GetInputElementId("parkir_masuk", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_tarif_mobil"))
		$xt->assign("parkir_tarif_mobil_fieldblock",true);
	else
		$xt->assign("parkir_tarif_mobil_tabfieldblock",true);
	$xt->assign("parkir_tarif_mobil_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_tarif_mobil_label","<label for=\"".GetInputElementId("parkir_tarif_mobil", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_tambahan"))
		$xt->assign("parkir_tambahan_fieldblock",true);
	else
		$xt->assign("parkir_tambahan_tabfieldblock",true);
	$xt->assign("parkir_tambahan_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_tambahan_label","<label for=\"".GetInputElementId("parkir_tambahan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_kapasitas_mobil"))
		$xt->assign("parkir_kapasitas_mobil_fieldblock",true);
	else
		$xt->assign("parkir_kapasitas_mobil_tabfieldblock",true);
	$xt->assign("parkir_kapasitas_mobil_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_kapasitas_mobil_label","<label for=\"".GetInputElementId("parkir_kapasitas_mobil", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_mobil_hari"))
		$xt->assign("parkir_mobil_hari_fieldblock",true);
	else
		$xt->assign("parkir_mobil_hari_tabfieldblock",true);
	$xt->assign("parkir_mobil_hari_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_mobil_hari_label","<label for=\"".GetInputElementId("parkir_mobil_hari", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_keluar"))
		$xt->assign("parkir_keluar_fieldblock",true);
	else
		$xt->assign("parkir_keluar_tabfieldblock",true);
	$xt->assign("parkir_keluar_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_keluar_label","<label for=\"".GetInputElementId("parkir_keluar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_motor_luas"))
		$xt->assign("parkir_motor_luas_fieldblock",true);
	else
		$xt->assign("parkir_motor_luas_tabfieldblock",true);
	$xt->assign("parkir_motor_luas_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_luas_label","<label for=\"".GetInputElementId("parkir_motor_luas", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_motor_masuk"))
		$xt->assign("parkir_motor_masuk_fieldblock",true);
	else
		$xt->assign("parkir_motor_masuk_tabfieldblock",true);
	$xt->assign("parkir_motor_masuk_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_masuk_label","<label for=\"".GetInputElementId("parkir_motor_masuk", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_motor_keluar"))
		$xt->assign("parkir_motor_keluar_fieldblock",true);
	else
		$xt->assign("parkir_motor_keluar_tabfieldblock",true);
	$xt->assign("parkir_motor_keluar_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_keluar_label","<label for=\"".GetInputElementId("parkir_motor_keluar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_tarif_motor"))
		$xt->assign("parkir_tarif_motor_fieldblock",true);
	else
		$xt->assign("parkir_tarif_motor_tabfieldblock",true);
	$xt->assign("parkir_tarif_motor_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_tarif_motor_label","<label for=\"".GetInputElementId("parkir_tarif_motor", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_motor_tambahan"))
		$xt->assign("parkir_motor_tambahan_fieldblock",true);
	else
		$xt->assign("parkir_motor_tambahan_tabfieldblock",true);
	$xt->assign("parkir_motor_tambahan_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_tambahan_label","<label for=\"".GetInputElementId("parkir_motor_tambahan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_kapasitas_motor"))
		$xt->assign("parkir_kapasitas_motor_fieldblock",true);
	else
		$xt->assign("parkir_kapasitas_motor_tabfieldblock",true);
	$xt->assign("parkir_kapasitas_motor_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_kapasitas_motor_label","<label for=\"".GetInputElementId("parkir_kapasitas_motor", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_motor_hari"))
		$xt->assign("parkir_motor_hari_fieldblock",true);
	else
		$xt->assign("parkir_motor_hari_tabfieldblock",true);
	$xt->assign("parkir_motor_hari_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_hari_label","<label for=\"".GetInputElementId("parkir_motor_hari", $id, PAGE_ADD)."\">","</label>");
	
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
	
	if(!$pageObject->isAppearOnTabs("golongan_id"))
		$xt->assign("golongan_id_fieldblock",true);
	else
		$xt->assign("golongan_id_tabfieldblock",true);
	$xt->assign("golongan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("golongan_id_label","<label for=\"".GetInputElementId("golongan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("id_old"))
		$xt->assign("id_old_fieldblock",true);
	else
		$xt->assign("id_old_tabfieldblock",true);
	$xt->assign("id_old_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_old_label","<label for=\"".GetInputElementId("id_old", $id, PAGE_ADD)."\">","</label>");
	
	
	
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
	$showDetailKeys["pad.pad_spt"]["masterkey1"] = $data["id"];	

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
//	konterid
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("konterid", $data, $keylink);
		$showValues["konterid"] = $value;
		$showFields[] = "konterid";
	}	
//	reg_date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("reg_date", $data, $keylink);
		$showValues["reg_date"] = $value;
		$showFields[] = "reg_date";
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
//	kecamatan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kecamatan_id", $data, $keylink);
		$showValues["kecamatan_id"] = $value;
		$showFields[] = "kecamatan_id";
	}	
//	kelurahan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kelurahan_id", $data, $keylink);
		$showValues["kelurahan_id"] = $value;
		$showFields[] = "kelurahan_id";
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
//	customer_status_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("customer_status_id", $data, $keylink);
		$showValues["customer_status_id"] = $value;
		$showFields[] = "customer_status_id";
	}	
//	aktifnotes
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("aktifnotes", $data, $keylink);
		$showValues["aktifnotes"] = $value;
		$showFields[] = "aktifnotes";
	}	
//	tmt
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tmt", $data, $keylink);
		$showValues["tmt"] = $value;
		$showFields[] = "tmt";
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
//	def_pajak_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("def_pajak_id", $data, $keylink);
		$showValues["def_pajak_id"] = $value;
		$showFields[] = "def_pajak_id";
	}	
//	opnm
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("opnm", $data, $keylink);
		$showValues["opnm"] = $value;
		$showFields[] = "opnm";
	}	
//	opalamat
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("opalamat", $data, $keylink);
		$showValues["opalamat"] = $value;
		$showFields[] = "opalamat";
	}	
//	latitude
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("latitude", $data, $keylink);
		$showValues["latitude"] = $value;
		$showFields[] = "latitude";
	}	
//	longitude
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("longitude", $data, $keylink);
		$showValues["longitude"] = $value;
		$showFields[] = "longitude";
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
//	kd_restojmlmeja
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_restojmlmeja", $data, $keylink);
		$showValues["kd_restojmlmeja"] = $value;
		$showFields[] = "kd_restojmlmeja";
	}	
//	kd_restojmlkursi
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_restojmlkursi", $data, $keylink);
		$showValues["kd_restojmlkursi"] = $value;
		$showFields[] = "kd_restojmlkursi";
	}	
//	kd_restojmltamu
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_restojmltamu", $data, $keylink);
		$showValues["kd_restojmltamu"] = $value;
		$showFields[] = "kd_restojmltamu";
	}	
//	kd_filmkursi
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_filmkursi", $data, $keylink);
		$showValues["kd_filmkursi"] = $value;
		$showFields[] = "kd_filmkursi";
	}	
//	kd_filmpertunjukan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_filmpertunjukan", $data, $keylink);
		$showValues["kd_filmpertunjukan"] = $value;
		$showFields[] = "kd_filmpertunjukan";
	}	
//	kd_filmtarif
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_filmtarif", $data, $keylink);
		$showValues["kd_filmtarif"] = $value;
		$showFields[] = "kd_filmtarif";
	}	
//	kd_bilyarmeja
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_bilyarmeja", $data, $keylink);
		$showValues["kd_bilyarmeja"] = $value;
		$showFields[] = "kd_bilyarmeja";
	}	
//	kd_bilyartarif
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_bilyartarif", $data, $keylink);
		$showValues["kd_bilyartarif"] = $value;
		$showFields[] = "kd_bilyartarif";
	}	
//	kd_bilyarkegiatan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_bilyarkegiatan", $data, $keylink);
		$showValues["kd_bilyarkegiatan"] = $value;
		$showFields[] = "kd_bilyarkegiatan";
	}	
//	kd_diskopengunjung
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_diskopengunjung", $data, $keylink);
		$showValues["kd_diskopengunjung"] = $value;
		$showFields[] = "kd_diskopengunjung";
	}	
//	kd_diskotarif
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_diskotarif", $data, $keylink);
		$showValues["kd_diskotarif"] = $value;
		$showFields[] = "kd_diskotarif";
	}	
//	mall_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("mall_id", $data, $keylink);
		$showValues["mall_id"] = $value;
		$showFields[] = "mall_id";
	}	
//	cash_register
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("cash_register", $data, $keylink);
		$showValues["cash_register"] = $value;
		$showFields[] = "cash_register";
	}	
//	pelaporan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pelaporan", $data, $keylink);
		$showValues["pelaporan"] = $value;
		$showFields[] = "pelaporan";
	}	
//	pembukuan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pembukuan", $data, $keylink);
		$showValues["pembukuan"] = $value;
		$showFields[] = "pembukuan";
	}	
//	bandara
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("bandara", $data, $keylink);
		$showValues["bandara"] = $value;
		$showFields[] = "bandara";
	}	
//	wajib_pajak
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("wajib_pajak", $data, $keylink);
		$showValues["wajib_pajak"] = $value;
		$showFields[] = "wajib_pajak";
	}	
//	jumlah_karyawan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("jumlah_karyawan", $data, $keylink);
		$showValues["jumlah_karyawan"] = $value;
		$showFields[] = "jumlah_karyawan";
	}	
//	tanggal_tutup
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tanggal_tutup", $data, $keylink);
		$showValues["tanggal_tutup"] = $value;
		$showFields[] = "tanggal_tutup";
	}	
//	parkir_luas
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_luas", $data, $keylink);
		$showValues["parkir_luas"] = $value;
		$showFields[] = "parkir_luas";
	}	
//	parkir_masuk
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_masuk", $data, $keylink);
		$showValues["parkir_masuk"] = $value;
		$showFields[] = "parkir_masuk";
	}	
//	parkir_tarif_mobil
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_tarif_mobil", $data, $keylink);
		$showValues["parkir_tarif_mobil"] = $value;
		$showFields[] = "parkir_tarif_mobil";
	}	
//	parkir_tambahan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_tambahan", $data, $keylink);
		$showValues["parkir_tambahan"] = $value;
		$showFields[] = "parkir_tambahan";
	}	
//	parkir_kapasitas_mobil
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_kapasitas_mobil", $data, $keylink);
		$showValues["parkir_kapasitas_mobil"] = $value;
		$showFields[] = "parkir_kapasitas_mobil";
	}	
//	parkir_mobil_hari
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_mobil_hari", $data, $keylink);
		$showValues["parkir_mobil_hari"] = $value;
		$showFields[] = "parkir_mobil_hari";
	}	
//	parkir_keluar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_keluar", $data, $keylink);
		$showValues["parkir_keluar"] = $value;
		$showFields[] = "parkir_keluar";
	}	
//	parkir_motor_luas
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_motor_luas", $data, $keylink);
		$showValues["parkir_motor_luas"] = $value;
		$showFields[] = "parkir_motor_luas";
	}	
//	parkir_motor_masuk
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_motor_masuk", $data, $keylink);
		$showValues["parkir_motor_masuk"] = $value;
		$showFields[] = "parkir_motor_masuk";
	}	
//	parkir_motor_keluar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_motor_keluar", $data, $keylink);
		$showValues["parkir_motor_keluar"] = $value;
		$showFields[] = "parkir_motor_keluar";
	}	
//	parkir_tarif_motor
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_tarif_motor", $data, $keylink);
		$showValues["parkir_tarif_motor"] = $value;
		$showFields[] = "parkir_tarif_motor";
	}	
//	parkir_motor_tambahan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_motor_tambahan", $data, $keylink);
		$showValues["parkir_motor_tambahan"] = $value;
		$showFields[] = "parkir_motor_tambahan";
	}	
//	parkir_kapasitas_motor
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_kapasitas_motor", $data, $keylink);
		$showValues["parkir_kapasitas_motor"] = $value;
		$showFields[] = "parkir_kapasitas_motor";
	}	
//	parkir_motor_hari
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_motor_hari", $data, $keylink);
		$showValues["parkir_motor_hari"] = $value;
		$showFields[] = "parkir_motor_hari";
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
//	golongan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("golongan_id", $data, $keylink);
		$showValues["golongan_id"] = $value;
		$showFields[] = "golongan_id";
	}	
//	id_old
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("id_old", $data, $keylink);
		$showValues["id_old"] = $value;
		$showFields[] = "id_old";
	}	
		$showRawValues["id"] = substr($data["id"],0,100);
		$showRawValues["konterid"] = substr($data["konterid"],0,100);
		$showRawValues["reg_date"] = substr($data["reg_date"],0,100);
		$showRawValues["customer_id"] = substr($data["customer_id"],0,100);
		$showRawValues["usaha_id"] = substr($data["usaha_id"],0,100);
		$showRawValues["so"] = substr($data["so"],0,100);
		$showRawValues["kecamatan_id"] = substr($data["kecamatan_id"],0,100);
		$showRawValues["kelurahan_id"] = substr($data["kelurahan_id"],0,100);
		$showRawValues["notes"] = substr($data["notes"],0,100);
		$showRawValues["enabled"] = substr($data["enabled"],0,100);
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);
		$showRawValues["customer_status_id"] = substr($data["customer_status_id"],0,100);
		$showRawValues["aktifnotes"] = substr($data["aktifnotes"],0,100);
		$showRawValues["tmt"] = substr($data["tmt"],0,100);
		$showRawValues["air_zona_id"] = substr($data["air_zona_id"],0,100);
		$showRawValues["air_manfaat_id"] = substr($data["air_manfaat_id"],0,100);
		$showRawValues["def_pajak_id"] = substr($data["def_pajak_id"],0,100);
		$showRawValues["opnm"] = substr($data["opnm"],0,100);
		$showRawValues["opalamat"] = substr($data["opalamat"],0,100);
		$showRawValues["latitude"] = substr($data["latitude"],0,100);
		$showRawValues["longitude"] = substr($data["longitude"],0,100);
		$showRawValues["created"] = substr($data["created"],0,100);
		$showRawValues["updated"] = substr($data["updated"],0,100);
		$showRawValues["update_uid"] = substr($data["update_uid"],0,100);
		$showRawValues["kd_restojmlmeja"] = substr($data["kd_restojmlmeja"],0,100);
		$showRawValues["kd_restojmlkursi"] = substr($data["kd_restojmlkursi"],0,100);
		$showRawValues["kd_restojmltamu"] = substr($data["kd_restojmltamu"],0,100);
		$showRawValues["kd_filmkursi"] = substr($data["kd_filmkursi"],0,100);
		$showRawValues["kd_filmpertunjukan"] = substr($data["kd_filmpertunjukan"],0,100);
		$showRawValues["kd_filmtarif"] = substr($data["kd_filmtarif"],0,100);
		$showRawValues["kd_bilyarmeja"] = substr($data["kd_bilyarmeja"],0,100);
		$showRawValues["kd_bilyartarif"] = substr($data["kd_bilyartarif"],0,100);
		$showRawValues["kd_bilyarkegiatan"] = substr($data["kd_bilyarkegiatan"],0,100);
		$showRawValues["kd_diskopengunjung"] = substr($data["kd_diskopengunjung"],0,100);
		$showRawValues["kd_diskotarif"] = substr($data["kd_diskotarif"],0,100);
		$showRawValues["mall_id"] = substr($data["mall_id"],0,100);
		$showRawValues["cash_register"] = substr($data["cash_register"],0,100);
		$showRawValues["pelaporan"] = substr($data["pelaporan"],0,100);
		$showRawValues["pembukuan"] = substr($data["pembukuan"],0,100);
		$showRawValues["bandara"] = substr($data["bandara"],0,100);
		$showRawValues["wajib_pajak"] = substr($data["wajib_pajak"],0,100);
		$showRawValues["jumlah_karyawan"] = substr($data["jumlah_karyawan"],0,100);
		$showRawValues["tanggal_tutup"] = substr($data["tanggal_tutup"],0,100);
		$showRawValues["parkir_luas"] = substr($data["parkir_luas"],0,100);
		$showRawValues["parkir_masuk"] = substr($data["parkir_masuk"],0,100);
		$showRawValues["parkir_tarif_mobil"] = substr($data["parkir_tarif_mobil"],0,100);
		$showRawValues["parkir_tambahan"] = substr($data["parkir_tambahan"],0,100);
		$showRawValues["parkir_kapasitas_mobil"] = substr($data["parkir_kapasitas_mobil"],0,100);
		$showRawValues["parkir_mobil_hari"] = substr($data["parkir_mobil_hari"],0,100);
		$showRawValues["parkir_keluar"] = substr($data["parkir_keluar"],0,100);
		$showRawValues["parkir_motor_luas"] = substr($data["parkir_motor_luas"],0,100);
		$showRawValues["parkir_motor_masuk"] = substr($data["parkir_motor_masuk"],0,100);
		$showRawValues["parkir_motor_keluar"] = substr($data["parkir_motor_keluar"],0,100);
		$showRawValues["parkir_tarif_motor"] = substr($data["parkir_tarif_motor"],0,100);
		$showRawValues["parkir_motor_tambahan"] = substr($data["parkir_motor_tambahan"],0,100);
		$showRawValues["parkir_kapasitas_motor"] = substr($data["parkir_kapasitas_motor"],0,100);
		$showRawValues["parkir_motor_hari"] = substr($data["parkir_motor_hari"],0,100);
		$showRawValues["kelompok_usaha_id"] = substr($data["kelompok_usaha_id"],0,100);
		$showRawValues["zona_id"] = substr($data["zona_id"],0,100);
		$showRawValues["manfaat_id"] = substr($data["manfaat_id"],0,100);
		$showRawValues["golongan_id"] = substr($data["golongan_id"],0,100);
		$showRawValues["id_old"] = substr($data["id_old"],0,100);
	
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
		$options['masterTable'] = "pad.pad_customer_usaha";
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
	$strTableName = "pad.pad_customer_usaha";
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
