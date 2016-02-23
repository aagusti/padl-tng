<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_customer_usaha_variables.php");
include('include/xtempl.php');
include('classes/editpage.php');
include("classes/searchclause.php");

add_nocache_headers();

global $globalEvents;

//	check if logged in
if(!isLogged() || CheckPermissionsEvent($strTableName, 'E') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Edit"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired");
	return;
}

$layout = new TLayout("edit2","RoundedGreen","MobileGreen");
$layout->blocks["top"] = array();
$layout->containers["edit"] = array();

$layout->containers["edit"][] = array("name"=>"editheader","block"=>"","substyle"=>2);


$layout->containers["edit"][] = array("name"=>"message","block"=>"message_block","substyle"=>1);


$layout->containers["edit"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"editfields","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"legend","block"=>"legend","substyle"=>3);


$layout->containers["fields"][] = array("name"=>"editbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";

$layout->skins["edit"] = "1";
$layout->blocks["top"][] = "edit";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_customer_usaha_edit"] = $layout;




if ((sizeof($_POST)==0) && (postvalue('ferror')) && (!postvalue("editid1"))){
	$returnJSON['success'] = false;
	$returnJSON['message'] = "Error occurred";
	$returnJSON['fatalError'] = true;
	echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
	exit();
}
else if ((sizeof($_POST)==0) && (postvalue('ferror')) && (postvalue("editid1"))){
	if (postvalue('fly')){
		echo -1;
		exit();
	}
	else {
		$_SESSION["message_edit"] = "<< "."Error occurred"." >>";
	}
}
/////////////////////////////////////////////////////////////
//init variables
/////////////////////////////////////////////////////////////
if(postvalue("editType")=="inline")
	$inlineedit = EDIT_INLINE;
elseif(postvalue("editType")==EDIT_POPUP)
	$inlineedit = EDIT_POPUP;
else
	$inlineedit = EDIT_SIMPLE;

$id = postvalue("id");
if(intval($id)==0)
	$id = 1;

$flyId = $id+1;
$xt = new Xtempl();

// assign an id
$xt->assign("id",$id);

$templatefile = ($inlineedit == EDIT_INLINE) ? "pad_pad_customer_usaha_inline_edit.htm" : "pad_pad_customer_usaha_edit.htm";

//array of params for classes
$params = array("pageType" => PAGE_EDIT,"id" => $id);


$params['tName'] = $strTableName;
$params['xt'] = &$xt;
$params['mode'] = $inlineedit;
$params['includes_js'] = $includes_js;
$params['includes_jsreq'] = $includes_jsreq;
$params['includes_css'] = $includes_css;
$params['locale_info'] = $locale_info;
$params['templatefile'] = $templatefile;
$params['pageEditLikeInline'] = ($inlineedit == EDIT_INLINE);
//Get array of tabs for edit page
$params['useTabsOnEdit'] = $gSettings->useTabsOnEdit();
if($params['useTabsOnEdit'])
	$params['arrEditTabs'] = $gSettings->getEditTabs();

$pageObject = new EditPage($params);

//	For ajax request 
if($_REQUEST["action"]!="")
{
	if($pageObject->lockingObj)
	{
		$arrkeys = explode("&",refine($_REQUEST["keys"]));
		foreach($arrkeys as $ind=>$val)
			$arrkeys[$ind]=urldecode($val);
		
		if($_REQUEST["action"]=="unlock")
		{
			$pageObject->lockingObj->UnlockRecord($strTableName,$arrkeys,$_REQUEST["sid"]);
			exit();	
		}
		else if($_REQUEST["action"]=="lockadmin" && (IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP))
		{
			$pageObject->lockingObj->UnlockAdmin($strTableName,$arrkeys,$_REQUEST["startEdit"]=="yes");
			if($_REQUEST["startEdit"]=="no")
				echo "unlock";
			else if($_REQUEST["startEdit"]=="yes")
				echo "lock";
			exit();	
		}
		else if($_REQUEST["action"]=="confirm")
		{
			if(!$pageObject->lockingObj->ConfirmLock($strTableName,$arrkeys,$message));
				echo $message;
			exit();	
		}
	}
	else
		exit();
}

$filename = $status = $message = $mesClass = $usermessage = $strWhereClause = $bodyonload = "";
$showValues = $showRawValues = $showFields = $showDetailKeys = $key = $next = $prev = array();
$HaveData = $enableCtrlsForEditing = true;
$error_happened = $readevalues = $IsSaved = false;

$auditObj = GetAuditObject($strTableName);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($pageObject->searchClauseObj);

//Get detail table keys	
$detailKeys = $pageObject->detailKeysByM;


if($pageObject->lockingObj)
{
	$system_attrs = "style='display:none;'";
	$system_message = "";
}

if ($inlineedit!=EDIT_INLINE)
{
	// add button events if exist
	$pageObject->addButtonHandlers();
}

$url_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

//	Before Process event
if($eventObj->exists("BeforeProcessEdit"))
	$eventObj->BeforeProcessEdit($conn, $pageObject);

$keys = array();
$skeys = "";
$savedKeys = array();
$keys["id"] = urldecode(postvalue("editid1"));
$savedKeys["id"] = urldecode(postvalue("editid1"));
$skeys.= rawurlencode(postvalue("editid1"))."&";

$pageObject->setKeys($keys);

if($skeys!="")
	$skeys = substr($skeys,0,-1);

//For show detail tables on master page edit
if($inlineedit!=EDIT_INLINE)
{
	$dpParams = array();
	if($pageObject->isShowDetailTables && !isMobile())
	{
		$ids = $id;
			$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array('tableNames'=>$dpParams['strTableNames'], 'ids'=>$dpParams['ids']);
	}
}
/////////////////////////////////////////////////////////////
//	process entered data, read and save
/////////////////////////////////////////////////////////////

// proccess captcha
if ($inlineedit!=EDIT_INLINE)
	if($pageObject->captchaExists())
		$pageObject->doCaptchaCode();

if(@$_POST["a"] == "edited")
{
	$strWhereClause = whereAdd($strWhereClause,KeyWhere($keys));
		$oldValuesRead = false;	
	if($eventObj->exists("AfterEdit") || $eventObj->exists("BeforeEdit") || $auditObj || isTableGeoUpdatable($pageObject->cipherer->pSet)
		|| $globalEvents->exists("IsRecordEditable", $strTableName))
	{
		//	read old values
		$rsold = db_query($gQuery->gSQLWhere($strWhereClause), $conn);
		$dataold = $pageObject->cipherer->DecryptFetchedArray($rsold);
		$oldValuesRead = true;
	}
	if($globalEvents->exists("IsRecordEditable", $strTableName))
	{
		if(!$globalEvents->IsRecordEditable($dataold, true, $strTableName))
			return SecurityRedirect($inlineedit);
	}
	$evalues = $efilename_values = $blobfields = array();
	

//	processing konterid - begin
	$condition = 1;

	if($condition)
	{
		$control_konterid = $pageObject->getControl("konterid", $id);
		$control_konterid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing konterid - end
//	processing reg_date - begin
	$condition = 1;

	if($condition)
	{
		$control_reg_date = $pageObject->getControl("reg_date", $id);
		$control_reg_date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing reg_date - end
//	processing customer_id - begin
	$condition = 1;

	if($condition)
	{
		$control_customer_id = $pageObject->getControl("customer_id", $id);
		$control_customer_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing customer_id - end
//	processing usaha_id - begin
	$condition = 1;

	if($condition)
	{
		$control_usaha_id = $pageObject->getControl("usaha_id", $id);
		$control_usaha_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing usaha_id - end
//	processing so - begin
	$condition = 1;

	if($condition)
	{
		$control_so = $pageObject->getControl("so", $id);
		$control_so->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing so - end
//	processing kecamatan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_kecamatan_id = $pageObject->getControl("kecamatan_id", $id);
		$control_kecamatan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kecamatan_id - end
//	processing kelurahan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_kelurahan_id = $pageObject->getControl("kelurahan_id", $id);
		$control_kelurahan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kelurahan_id - end
//	processing notes - begin
	$condition = 1;

	if($condition)
	{
		$control_notes = $pageObject->getControl("notes", $id);
		$control_notes->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing notes - end
//	processing enabled - begin
	$condition = 1;

	if($condition)
	{
		$control_enabled = $pageObject->getControl("enabled", $id);
		$control_enabled->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing enabled - end
//	processing create_uid - begin
	$condition = 1;

	if($condition)
	{
		$control_create_uid = $pageObject->getControl("create_uid", $id);
		$control_create_uid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing create_uid - end
//	processing customer_status_id - begin
	$condition = 1;

	if($condition)
	{
		$control_customer_status_id = $pageObject->getControl("customer_status_id", $id);
		$control_customer_status_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing customer_status_id - end
//	processing aktifnotes - begin
	$condition = 1;

	if($condition)
	{
		$control_aktifnotes = $pageObject->getControl("aktifnotes", $id);
		$control_aktifnotes->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing aktifnotes - end
//	processing tmt - begin
	$condition = 1;

	if($condition)
	{
		$control_tmt = $pageObject->getControl("tmt", $id);
		$control_tmt->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tmt - end
//	processing air_zona_id - begin
	$condition = 1;

	if($condition)
	{
		$control_air_zona_id = $pageObject->getControl("air_zona_id", $id);
		$control_air_zona_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing air_zona_id - end
//	processing air_manfaat_id - begin
	$condition = 1;

	if($condition)
	{
		$control_air_manfaat_id = $pageObject->getControl("air_manfaat_id", $id);
		$control_air_manfaat_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing air_manfaat_id - end
//	processing def_pajak_id - begin
	$condition = 1;

	if($condition)
	{
		$control_def_pajak_id = $pageObject->getControl("def_pajak_id", $id);
		$control_def_pajak_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing def_pajak_id - end
//	processing opnm - begin
	$condition = 1;

	if($condition)
	{
		$control_opnm = $pageObject->getControl("opnm", $id);
		$control_opnm->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing opnm - end
//	processing opalamat - begin
	$condition = 1;

	if($condition)
	{
		$control_opalamat = $pageObject->getControl("opalamat", $id);
		$control_opalamat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing opalamat - end
//	processing latitude - begin
	$condition = 1;

	if($condition)
	{
		$control_latitude = $pageObject->getControl("latitude", $id);
		$control_latitude->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing latitude - end
//	processing longitude - begin
	$condition = 1;

	if($condition)
	{
		$control_longitude = $pageObject->getControl("longitude", $id);
		$control_longitude->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing longitude - end
//	processing created - begin
	$condition = 1;

	if($condition)
	{
		$control_created = $pageObject->getControl("created", $id);
		$control_created->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing created - end
//	processing updated - begin
	$condition = 1;

	if($condition)
	{
		$control_updated = $pageObject->getControl("updated", $id);
		$control_updated->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing updated - end
//	processing update_uid - begin
	$condition = 1;

	if($condition)
	{
		$control_update_uid = $pageObject->getControl("update_uid", $id);
		$control_update_uid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing update_uid - end
//	processing kd_restojmlmeja - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_restojmlmeja = $pageObject->getControl("kd_restojmlmeja", $id);
		$control_kd_restojmlmeja->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_restojmlmeja - end
//	processing kd_restojmlkursi - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_restojmlkursi = $pageObject->getControl("kd_restojmlkursi", $id);
		$control_kd_restojmlkursi->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_restojmlkursi - end
//	processing kd_restojmltamu - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_restojmltamu = $pageObject->getControl("kd_restojmltamu", $id);
		$control_kd_restojmltamu->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_restojmltamu - end
//	processing kd_filmkursi - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_filmkursi = $pageObject->getControl("kd_filmkursi", $id);
		$control_kd_filmkursi->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_filmkursi - end
//	processing kd_filmpertunjukan - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_filmpertunjukan = $pageObject->getControl("kd_filmpertunjukan", $id);
		$control_kd_filmpertunjukan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_filmpertunjukan - end
//	processing kd_filmtarif - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_filmtarif = $pageObject->getControl("kd_filmtarif", $id);
		$control_kd_filmtarif->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_filmtarif - end
//	processing kd_bilyarmeja - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_bilyarmeja = $pageObject->getControl("kd_bilyarmeja", $id);
		$control_kd_bilyarmeja->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_bilyarmeja - end
//	processing kd_bilyartarif - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_bilyartarif = $pageObject->getControl("kd_bilyartarif", $id);
		$control_kd_bilyartarif->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_bilyartarif - end
//	processing kd_bilyarkegiatan - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_bilyarkegiatan = $pageObject->getControl("kd_bilyarkegiatan", $id);
		$control_kd_bilyarkegiatan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_bilyarkegiatan - end
//	processing kd_diskopengunjung - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_diskopengunjung = $pageObject->getControl("kd_diskopengunjung", $id);
		$control_kd_diskopengunjung->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_diskopengunjung - end
//	processing kd_diskotarif - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_diskotarif = $pageObject->getControl("kd_diskotarif", $id);
		$control_kd_diskotarif->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_diskotarif - end
//	processing mall_id - begin
	$condition = 1;

	if($condition)
	{
		$control_mall_id = $pageObject->getControl("mall_id", $id);
		$control_mall_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing mall_id - end
//	processing cash_register - begin
	$condition = 1;

	if($condition)
	{
		$control_cash_register = $pageObject->getControl("cash_register", $id);
		$control_cash_register->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing cash_register - end
//	processing pelaporan - begin
	$condition = 1;

	if($condition)
	{
		$control_pelaporan = $pageObject->getControl("pelaporan", $id);
		$control_pelaporan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pelaporan - end
//	processing pembukuan - begin
	$condition = 1;

	if($condition)
	{
		$control_pembukuan = $pageObject->getControl("pembukuan", $id);
		$control_pembukuan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pembukuan - end
//	processing bandara - begin
	$condition = 1;

	if($condition)
	{
		$control_bandara = $pageObject->getControl("bandara", $id);
		$control_bandara->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing bandara - end
//	processing wajib_pajak - begin
	$condition = 1;

	if($condition)
	{
		$control_wajib_pajak = $pageObject->getControl("wajib_pajak", $id);
		$control_wajib_pajak->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing wajib_pajak - end
//	processing jumlah_karyawan - begin
	$condition = 1;

	if($condition)
	{
		$control_jumlah_karyawan = $pageObject->getControl("jumlah_karyawan", $id);
		$control_jumlah_karyawan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jumlah_karyawan - end
//	processing tanggal_tutup - begin
	$condition = 1;

	if($condition)
	{
		$control_tanggal_tutup = $pageObject->getControl("tanggal_tutup", $id);
		$control_tanggal_tutup->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tanggal_tutup - end
//	processing parkir_luas - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_luas = $pageObject->getControl("parkir_luas", $id);
		$control_parkir_luas->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_luas - end
//	processing parkir_masuk - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_masuk = $pageObject->getControl("parkir_masuk", $id);
		$control_parkir_masuk->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_masuk - end
//	processing parkir_tarif_mobil - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_tarif_mobil = $pageObject->getControl("parkir_tarif_mobil", $id);
		$control_parkir_tarif_mobil->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_tarif_mobil - end
//	processing parkir_tambahan - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_tambahan = $pageObject->getControl("parkir_tambahan", $id);
		$control_parkir_tambahan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_tambahan - end
//	processing parkir_kapasitas_mobil - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_kapasitas_mobil = $pageObject->getControl("parkir_kapasitas_mobil", $id);
		$control_parkir_kapasitas_mobil->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_kapasitas_mobil - end
//	processing parkir_mobil_hari - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_mobil_hari = $pageObject->getControl("parkir_mobil_hari", $id);
		$control_parkir_mobil_hari->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_mobil_hari - end
//	processing parkir_keluar - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_keluar = $pageObject->getControl("parkir_keluar", $id);
		$control_parkir_keluar->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_keluar - end
//	processing parkir_motor_luas - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_motor_luas = $pageObject->getControl("parkir_motor_luas", $id);
		$control_parkir_motor_luas->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_motor_luas - end
//	processing parkir_motor_masuk - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_motor_masuk = $pageObject->getControl("parkir_motor_masuk", $id);
		$control_parkir_motor_masuk->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_motor_masuk - end
//	processing parkir_motor_keluar - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_motor_keluar = $pageObject->getControl("parkir_motor_keluar", $id);
		$control_parkir_motor_keluar->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_motor_keluar - end
//	processing parkir_tarif_motor - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_tarif_motor = $pageObject->getControl("parkir_tarif_motor", $id);
		$control_parkir_tarif_motor->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_tarif_motor - end
//	processing parkir_motor_tambahan - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_motor_tambahan = $pageObject->getControl("parkir_motor_tambahan", $id);
		$control_parkir_motor_tambahan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_motor_tambahan - end
//	processing parkir_kapasitas_motor - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_kapasitas_motor = $pageObject->getControl("parkir_kapasitas_motor", $id);
		$control_parkir_kapasitas_motor->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_kapasitas_motor - end
//	processing parkir_motor_hari - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_motor_hari = $pageObject->getControl("parkir_motor_hari", $id);
		$control_parkir_motor_hari->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_motor_hari - end
//	processing kelompok_usaha_id - begin
	$condition = 1;

	if($condition)
	{
		$control_kelompok_usaha_id = $pageObject->getControl("kelompok_usaha_id", $id);
		$control_kelompok_usaha_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kelompok_usaha_id - end
//	processing zona_id - begin
	$condition = 1;

	if($condition)
	{
		$control_zona_id = $pageObject->getControl("zona_id", $id);
		$control_zona_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing zona_id - end
//	processing manfaat_id - begin
	$condition = 1;

	if($condition)
	{
		$control_manfaat_id = $pageObject->getControl("manfaat_id", $id);
		$control_manfaat_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing manfaat_id - end
//	processing golongan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_golongan_id = $pageObject->getControl("golongan_id", $id);
		$control_golongan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing golongan_id - end
//	processing id_old - begin
	$condition = 1;

	if($condition)
	{
		$control_id_old = $pageObject->getControl("id_old", $id);
		$control_id_old->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing id_old - end

	foreach($efilename_values as $ekey=>$value)
		$evalues[$ekey] = $value;
		
	if($pageObject->lockingObj)
	{
		$lockmessage = "";
		if(!$pageObject->lockingObj->ConfirmLock($strTableName,$savedKeys,$lockmessage))
		{
			$enableCtrlsForEditing = false;
			$system_attrs = "style='display:block;'";
			if($inlineedit == EDIT_INLINE)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$lockmessage = $pageObject->lockingObj->GetLockInfo($strTableName,$savedKeys,false,$id);
				
				$returnJSON['success'] = false;
				$returnJSON['message'] = $lockmessage;
				$returnJSON['enableCtrls'] = $enableCtrlsForEditing;
				$returnJSON['confirmTime'] = $pageObject->lockingObj->ConfirmTime;
				echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
				exit();
			}
			else
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$system_message = $pageObject->lockingObj->GetLockInfo($strTableName,$savedKeys,true,$id);
				else
					$system_message = $lockmessage;
			}
			$status = "DECLINED";
			$readevalues = true;
		}
	}
	
	if($readevalues==false)
	{
	//	do event
		$retval = true;
		if($eventObj->exists("BeforeEdit"))
			$retval=$eventObj->BeforeEdit($evalues,$strWhereClause,$dataold,$keys,$usermessage,(bool)$inlineedit, $pageObject);
	
		if($retval && $pageObject->isCaptchaOk)
		{		
			if($inlineedit!=EDIT_INLINE)
				$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
		
			//set updated lat-lng values for all map fileds with 'UpdateLatLng' ticked	
            if(isTableGeoUpdatable($pageObject->cipherer->pSet)) {			
				setUpdatedLatLng($evalues, $pageObject->cipherer->pSet, $dataold);
			}	
			
			if(DoUpdateRecord($strOriginalTableName,$evalues,$blobfields,$strWhereClause,$id,$pageObject, $pageObject->cipherer))
			{
				$IsSaved = true;

			// Give possibility to all edit controls to clean their data				
			//	processing konterid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_konterid->afterSuccessfulSave();
				}
	//	processing konterid - end
			//	processing reg_date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_reg_date->afterSuccessfulSave();
				}
	//	processing reg_date - end
			//	processing customer_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_customer_id->afterSuccessfulSave();
				}
	//	processing customer_id - end
			//	processing usaha_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_usaha_id->afterSuccessfulSave();
				}
	//	processing usaha_id - end
			//	processing so - begin
							$condition = 1;
			
				if($condition)
				{
					$control_so->afterSuccessfulSave();
				}
	//	processing so - end
			//	processing kecamatan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kecamatan_id->afterSuccessfulSave();
				}
	//	processing kecamatan_id - end
			//	processing kelurahan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kelurahan_id->afterSuccessfulSave();
				}
	//	processing kelurahan_id - end
			//	processing notes - begin
							$condition = 1;
			
				if($condition)
				{
					$control_notes->afterSuccessfulSave();
				}
	//	processing notes - end
			//	processing enabled - begin
							$condition = 1;
			
				if($condition)
				{
					$control_enabled->afterSuccessfulSave();
				}
	//	processing enabled - end
			//	processing create_uid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_create_uid->afterSuccessfulSave();
				}
	//	processing create_uid - end
			//	processing customer_status_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_customer_status_id->afterSuccessfulSave();
				}
	//	processing customer_status_id - end
			//	processing aktifnotes - begin
							$condition = 1;
			
				if($condition)
				{
					$control_aktifnotes->afterSuccessfulSave();
				}
	//	processing aktifnotes - end
			//	processing tmt - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tmt->afterSuccessfulSave();
				}
	//	processing tmt - end
			//	processing air_zona_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_air_zona_id->afterSuccessfulSave();
				}
	//	processing air_zona_id - end
			//	processing air_manfaat_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_air_manfaat_id->afterSuccessfulSave();
				}
	//	processing air_manfaat_id - end
			//	processing def_pajak_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_def_pajak_id->afterSuccessfulSave();
				}
	//	processing def_pajak_id - end
			//	processing opnm - begin
							$condition = 1;
			
				if($condition)
				{
					$control_opnm->afterSuccessfulSave();
				}
	//	processing opnm - end
			//	processing opalamat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_opalamat->afterSuccessfulSave();
				}
	//	processing opalamat - end
			//	processing latitude - begin
							$condition = 1;
			
				if($condition)
				{
					$control_latitude->afterSuccessfulSave();
				}
	//	processing latitude - end
			//	processing longitude - begin
							$condition = 1;
			
				if($condition)
				{
					$control_longitude->afterSuccessfulSave();
				}
	//	processing longitude - end
			//	processing created - begin
							$condition = 1;
			
				if($condition)
				{
					$control_created->afterSuccessfulSave();
				}
	//	processing created - end
			//	processing updated - begin
							$condition = 1;
			
				if($condition)
				{
					$control_updated->afterSuccessfulSave();
				}
	//	processing updated - end
			//	processing update_uid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_update_uid->afterSuccessfulSave();
				}
	//	processing update_uid - end
			//	processing kd_restojmlmeja - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_restojmlmeja->afterSuccessfulSave();
				}
	//	processing kd_restojmlmeja - end
			//	processing kd_restojmlkursi - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_restojmlkursi->afterSuccessfulSave();
				}
	//	processing kd_restojmlkursi - end
			//	processing kd_restojmltamu - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_restojmltamu->afterSuccessfulSave();
				}
	//	processing kd_restojmltamu - end
			//	processing kd_filmkursi - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_filmkursi->afterSuccessfulSave();
				}
	//	processing kd_filmkursi - end
			//	processing kd_filmpertunjukan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_filmpertunjukan->afterSuccessfulSave();
				}
	//	processing kd_filmpertunjukan - end
			//	processing kd_filmtarif - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_filmtarif->afterSuccessfulSave();
				}
	//	processing kd_filmtarif - end
			//	processing kd_bilyarmeja - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_bilyarmeja->afterSuccessfulSave();
				}
	//	processing kd_bilyarmeja - end
			//	processing kd_bilyartarif - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_bilyartarif->afterSuccessfulSave();
				}
	//	processing kd_bilyartarif - end
			//	processing kd_bilyarkegiatan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_bilyarkegiatan->afterSuccessfulSave();
				}
	//	processing kd_bilyarkegiatan - end
			//	processing kd_diskopengunjung - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_diskopengunjung->afterSuccessfulSave();
				}
	//	processing kd_diskopengunjung - end
			//	processing kd_diskotarif - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_diskotarif->afterSuccessfulSave();
				}
	//	processing kd_diskotarif - end
			//	processing mall_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_mall_id->afterSuccessfulSave();
				}
	//	processing mall_id - end
			//	processing cash_register - begin
							$condition = 1;
			
				if($condition)
				{
					$control_cash_register->afterSuccessfulSave();
				}
	//	processing cash_register - end
			//	processing pelaporan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pelaporan->afterSuccessfulSave();
				}
	//	processing pelaporan - end
			//	processing pembukuan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pembukuan->afterSuccessfulSave();
				}
	//	processing pembukuan - end
			//	processing bandara - begin
							$condition = 1;
			
				if($condition)
				{
					$control_bandara->afterSuccessfulSave();
				}
	//	processing bandara - end
			//	processing wajib_pajak - begin
							$condition = 1;
			
				if($condition)
				{
					$control_wajib_pajak->afterSuccessfulSave();
				}
	//	processing wajib_pajak - end
			//	processing jumlah_karyawan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jumlah_karyawan->afterSuccessfulSave();
				}
	//	processing jumlah_karyawan - end
			//	processing tanggal_tutup - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tanggal_tutup->afterSuccessfulSave();
				}
	//	processing tanggal_tutup - end
			//	processing parkir_luas - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_luas->afterSuccessfulSave();
				}
	//	processing parkir_luas - end
			//	processing parkir_masuk - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_masuk->afterSuccessfulSave();
				}
	//	processing parkir_masuk - end
			//	processing parkir_tarif_mobil - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_tarif_mobil->afterSuccessfulSave();
				}
	//	processing parkir_tarif_mobil - end
			//	processing parkir_tambahan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_tambahan->afterSuccessfulSave();
				}
	//	processing parkir_tambahan - end
			//	processing parkir_kapasitas_mobil - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_kapasitas_mobil->afterSuccessfulSave();
				}
	//	processing parkir_kapasitas_mobil - end
			//	processing parkir_mobil_hari - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_mobil_hari->afterSuccessfulSave();
				}
	//	processing parkir_mobil_hari - end
			//	processing parkir_keluar - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_keluar->afterSuccessfulSave();
				}
	//	processing parkir_keluar - end
			//	processing parkir_motor_luas - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_motor_luas->afterSuccessfulSave();
				}
	//	processing parkir_motor_luas - end
			//	processing parkir_motor_masuk - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_motor_masuk->afterSuccessfulSave();
				}
	//	processing parkir_motor_masuk - end
			//	processing parkir_motor_keluar - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_motor_keluar->afterSuccessfulSave();
				}
	//	processing parkir_motor_keluar - end
			//	processing parkir_tarif_motor - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_tarif_motor->afterSuccessfulSave();
				}
	//	processing parkir_tarif_motor - end
			//	processing parkir_motor_tambahan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_motor_tambahan->afterSuccessfulSave();
				}
	//	processing parkir_motor_tambahan - end
			//	processing parkir_kapasitas_motor - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_kapasitas_motor->afterSuccessfulSave();
				}
	//	processing parkir_kapasitas_motor - end
			//	processing parkir_motor_hari - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_motor_hari->afterSuccessfulSave();
				}
	//	processing parkir_motor_hari - end
			//	processing kelompok_usaha_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kelompok_usaha_id->afterSuccessfulSave();
				}
	//	processing kelompok_usaha_id - end
			//	processing zona_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_zona_id->afterSuccessfulSave();
				}
	//	processing zona_id - end
			//	processing manfaat_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_manfaat_id->afterSuccessfulSave();
				}
	//	processing manfaat_id - end
			//	processing golongan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_golongan_id->afterSuccessfulSave();
				}
	//	processing golongan_id - end
			//	processing id_old - begin
							$condition = 1;
			
				if($condition)
				{
					$control_id_old->afterSuccessfulSave();
				}
	//	processing id_old - end
				
				//	after edit event
				if($pageObject->lockingObj && $inlineedit == EDIT_INLINE)
					$pageObject->lockingObj->UnlockRecord($strTableName,$savedKeys,"");
				if($auditObj || $eventObj->exists("AfterEdit"))
				{
					foreach($dataold as $idx=>$val)
					{
						if(!array_key_exists($idx,$evalues))
							$evalues[$idx] = $val;
					}
				}

				if($auditObj)
					$auditObj->LogEdit($strTableName,$evalues,$dataold,$keys);
				if($eventObj->exists("AfterEdit"))
					$eventObj->AfterEdit($evalues,KeyWhere($keys),$dataold,$keys,(bool)$inlineedit, $pageObject);
							
				$mesClass = "mes_ok";
			}
			elseif($inlineedit!=EDIT_INLINE)
				$mesClass = "mes_not";	
		}
		else
		{
			$message = $usermessage;
			$readevalues = true;
			$status = "DECLINED";
		}
	}
	if($readevalues)
		$keys = $savedKeys;
}
//else
{
	/////////////////////////
	//Locking recors
	/////////////////////////

	if($pageObject->lockingObj)
	{
		$enableCtrlsForEditing = $pageObject->lockingObj->LockRecord($strTableName,$keys);
		if(!$enableCtrlsForEditing)
		{
			if($inlineedit == EDIT_INLINE)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$lockmessage = $pageObject->lockingObj->GetLockInfo($strTableName,$keys,false,$id);
				else
					$lockmessage = $pageObject->lockingObj->LockUser;
				$returnJSON['success'] = false;
				$returnJSON['message'] = $lockmessage;
				$returnJSON['enableCtrls'] = $enableCtrlsForEditing;
				$returnJSON['confirmTime'] = $pageObject->lockingObj->ConfirmTime;
				echo my_json_encode($returnJSON);
				exit();
			}
			
			$system_attrs = "style='display:block;'";
			$system_message = $pageObject->lockingObj->LockUser;
			
			if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
			{
				$rb = $pageObject->lockingObj->GetLockInfo($strTableName,$keys,true,$id);
				if($rb!="")
					$system_message = $rb;
			}
		}
	}
}

if($pageObject->lockingObj && $inlineedit!=EDIT_INLINE)
	$pageObject->body["begin"] .='<div class="runner-locking" '.$system_attrs.'>'.$system_message.'</div>';

if($message)
	$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if ($IsSaved && no_output_done() && $inlineedit == EDIT_SIMPLE)
{
	// saving message
	$_SESSION["message_edit"] = ($message ? $message : "");
	// key get query
	$keyGetQ = "";
		$keyGetQ.="editid1=".rawurldecode($keys["id"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: pad_pad_customer_usaha_".$pageObject->getPageType().".php?".$keyGetQ);
	// turned on output buffering, so we need to stop script
	exit();
}
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if ($inlineedit == EDIT_SIMPLE && isset($_SESSION["message_edit"]))
{
	$message = $_SESSION["message_edit"];
	unset($_SESSION["message_edit"]);
}


$pageObject->setKeys($keys);
$pageObject->readEditValues = $readevalues;
if($readevalues)
	$pageObject->editValues = $evalues;

//	read current values from the database
$data = $pageObject->getCurrentRecordInternal();
if(!$data)
{
	if($inlineedit == EDIT_SIMPLE)
	{
		header("Location: pad_pad_customer_usaha_list.php?a=return");
		exit();
	}
	else
		$data = array();
}

if($globalEvents->exists("IsRecordEditable", $strTableName))
{
	if(!$globalEvents->IsRecordEditable($data, true, $strTableName) && $inlineedit != EDIT_INLINE)
	{
		return SecurityRedirect($inlineedit);
	}
}


//global variable use in BuildEditControl function
//	show readonly fields

if($readevalues)
{
	$data["konterid"] = $evalues["konterid"];
	$data["reg_date"] = $evalues["reg_date"];
	$data["customer_id"] = $evalues["customer_id"];
	$data["usaha_id"] = $evalues["usaha_id"];
	$data["so"] = $evalues["so"];
	$data["kecamatan_id"] = $evalues["kecamatan_id"];
	$data["kelurahan_id"] = $evalues["kelurahan_id"];
	$data["notes"] = $evalues["notes"];
	$data["enabled"] = $evalues["enabled"];
	$data["create_uid"] = $evalues["create_uid"];
	$data["customer_status_id"] = $evalues["customer_status_id"];
	$data["aktifnotes"] = $evalues["aktifnotes"];
	$data["tmt"] = $evalues["tmt"];
	$data["air_zona_id"] = $evalues["air_zona_id"];
	$data["air_manfaat_id"] = $evalues["air_manfaat_id"];
	$data["def_pajak_id"] = $evalues["def_pajak_id"];
	$data["opnm"] = $evalues["opnm"];
	$data["opalamat"] = $evalues["opalamat"];
	$data["latitude"] = $evalues["latitude"];
	$data["longitude"] = $evalues["longitude"];
	$data["created"] = $evalues["created"];
	$data["updated"] = $evalues["updated"];
	$data["update_uid"] = $evalues["update_uid"];
	$data["kd_restojmlmeja"] = $evalues["kd_restojmlmeja"];
	$data["kd_restojmlkursi"] = $evalues["kd_restojmlkursi"];
	$data["kd_restojmltamu"] = $evalues["kd_restojmltamu"];
	$data["kd_filmkursi"] = $evalues["kd_filmkursi"];
	$data["kd_filmpertunjukan"] = $evalues["kd_filmpertunjukan"];
	$data["kd_filmtarif"] = $evalues["kd_filmtarif"];
	$data["kd_bilyarmeja"] = $evalues["kd_bilyarmeja"];
	$data["kd_bilyartarif"] = $evalues["kd_bilyartarif"];
	$data["kd_bilyarkegiatan"] = $evalues["kd_bilyarkegiatan"];
	$data["kd_diskopengunjung"] = $evalues["kd_diskopengunjung"];
	$data["kd_diskotarif"] = $evalues["kd_diskotarif"];
	$data["mall_id"] = $evalues["mall_id"];
	$data["cash_register"] = $evalues["cash_register"];
	$data["pelaporan"] = $evalues["pelaporan"];
	$data["pembukuan"] = $evalues["pembukuan"];
	$data["bandara"] = $evalues["bandara"];
	$data["wajib_pajak"] = $evalues["wajib_pajak"];
	$data["jumlah_karyawan"] = $evalues["jumlah_karyawan"];
	$data["tanggal_tutup"] = $evalues["tanggal_tutup"];
	$data["parkir_luas"] = $evalues["parkir_luas"];
	$data["parkir_masuk"] = $evalues["parkir_masuk"];
	$data["parkir_tarif_mobil"] = $evalues["parkir_tarif_mobil"];
	$data["parkir_tambahan"] = $evalues["parkir_tambahan"];
	$data["parkir_kapasitas_mobil"] = $evalues["parkir_kapasitas_mobil"];
	$data["parkir_mobil_hari"] = $evalues["parkir_mobil_hari"];
	$data["parkir_keluar"] = $evalues["parkir_keluar"];
	$data["parkir_motor_luas"] = $evalues["parkir_motor_luas"];
	$data["parkir_motor_masuk"] = $evalues["parkir_motor_masuk"];
	$data["parkir_motor_keluar"] = $evalues["parkir_motor_keluar"];
	$data["parkir_tarif_motor"] = $evalues["parkir_tarif_motor"];
	$data["parkir_motor_tambahan"] = $evalues["parkir_motor_tambahan"];
	$data["parkir_kapasitas_motor"] = $evalues["parkir_kapasitas_motor"];
	$data["parkir_motor_hari"] = $evalues["parkir_motor_hari"];
	$data["kelompok_usaha_id"] = $evalues["kelompok_usaha_id"];
	$data["zona_id"] = $evalues["zona_id"];
	$data["manfaat_id"] = $evalues["manfaat_id"];
	$data["golongan_id"] = $evalues["golongan_id"];
	$data["id_old"] = $evalues["id_old"];
}

/////////////////////////////////////////////////////////////
//	assign values to $xt class, prepare page for displaying
/////////////////////////////////////////////////////////////
//Basic includes js files
$includes = "";
//javascript code
	
if($inlineedit != EDIT_INLINE)
{
	if($inlineedit == EDIT_SIMPLE)
	{
		$includes.= "<script language=\"JavaScript\" src=\"include/loadfirst.js\"></script>\r\n";
				$includes.="<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";
		
		if (!isMobile())
			$includes.= "<div id=\"search_suggest".$id."\"></div>\r\n";
			
		$pageObject->body["begin"].= $includes;
	}	

	if(!$pageObject->isAppearOnTabs("konterid"))
		$xt->assign("konterid_fieldblock",true);
	else
		$xt->assign("konterid_tabfieldblock",true);
	$xt->assign("konterid_label",true);
	if(isEnableSection508())
		$xt->assign_section("konterid_label","<label for=\"".GetInputElementId("konterid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("reg_date"))
		$xt->assign("reg_date_fieldblock",true);
	else
		$xt->assign("reg_date_tabfieldblock",true);
	$xt->assign("reg_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("reg_date_label","<label for=\"".GetInputElementId("reg_date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("customer_id"))
		$xt->assign("customer_id_fieldblock",true);
	else
		$xt->assign("customer_id_tabfieldblock",true);
	$xt->assign("customer_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("customer_id_label","<label for=\"".GetInputElementId("customer_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("usaha_id"))
		$xt->assign("usaha_id_fieldblock",true);
	else
		$xt->assign("usaha_id_tabfieldblock",true);
	$xt->assign("usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("usaha_id_label","<label for=\"".GetInputElementId("usaha_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("so"))
		$xt->assign("so_fieldblock",true);
	else
		$xt->assign("so_tabfieldblock",true);
	$xt->assign("so_label",true);
	if(isEnableSection508())
		$xt->assign_section("so_label","<label for=\"".GetInputElementId("so", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kecamatan_id"))
		$xt->assign("kecamatan_id_fieldblock",true);
	else
		$xt->assign("kecamatan_id_tabfieldblock",true);
	$xt->assign("kecamatan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("kecamatan_id_label","<label for=\"".GetInputElementId("kecamatan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kelurahan_id"))
		$xt->assign("kelurahan_id_fieldblock",true);
	else
		$xt->assign("kelurahan_id_tabfieldblock",true);
	$xt->assign("kelurahan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("kelurahan_id_label","<label for=\"".GetInputElementId("kelurahan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("notes"))
		$xt->assign("notes_fieldblock",true);
	else
		$xt->assign("notes_tabfieldblock",true);
	$xt->assign("notes_label",true);
	if(isEnableSection508())
		$xt->assign_section("notes_label","<label for=\"".GetInputElementId("notes", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("enabled"))
		$xt->assign("enabled_fieldblock",true);
	else
		$xt->assign("enabled_tabfieldblock",true);
	$xt->assign("enabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("enabled_label","<label for=\"".GetInputElementId("enabled", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
	$xt->assign("create_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_uid_label","<label for=\"".GetInputElementId("create_uid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("customer_status_id"))
		$xt->assign("customer_status_id_fieldblock",true);
	else
		$xt->assign("customer_status_id_tabfieldblock",true);
	$xt->assign("customer_status_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("customer_status_id_label","<label for=\"".GetInputElementId("customer_status_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("aktifnotes"))
		$xt->assign("aktifnotes_fieldblock",true);
	else
		$xt->assign("aktifnotes_tabfieldblock",true);
	$xt->assign("aktifnotes_label",true);
	if(isEnableSection508())
		$xt->assign_section("aktifnotes_label","<label for=\"".GetInputElementId("aktifnotes", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tmt"))
		$xt->assign("tmt_fieldblock",true);
	else
		$xt->assign("tmt_tabfieldblock",true);
	$xt->assign("tmt_label",true);
	if(isEnableSection508())
		$xt->assign_section("tmt_label","<label for=\"".GetInputElementId("tmt", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("air_zona_id"))
		$xt->assign("air_zona_id_fieldblock",true);
	else
		$xt->assign("air_zona_id_tabfieldblock",true);
	$xt->assign("air_zona_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("air_zona_id_label","<label for=\"".GetInputElementId("air_zona_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("air_manfaat_id"))
		$xt->assign("air_manfaat_id_fieldblock",true);
	else
		$xt->assign("air_manfaat_id_tabfieldblock",true);
	$xt->assign("air_manfaat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("air_manfaat_id_label","<label for=\"".GetInputElementId("air_manfaat_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("def_pajak_id"))
		$xt->assign("def_pajak_id_fieldblock",true);
	else
		$xt->assign("def_pajak_id_tabfieldblock",true);
	$xt->assign("def_pajak_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("def_pajak_id_label","<label for=\"".GetInputElementId("def_pajak_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("opnm"))
		$xt->assign("opnm_fieldblock",true);
	else
		$xt->assign("opnm_tabfieldblock",true);
	$xt->assign("opnm_label",true);
	if(isEnableSection508())
		$xt->assign_section("opnm_label","<label for=\"".GetInputElementId("opnm", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("opalamat"))
		$xt->assign("opalamat_fieldblock",true);
	else
		$xt->assign("opalamat_tabfieldblock",true);
	$xt->assign("opalamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("opalamat_label","<label for=\"".GetInputElementId("opalamat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("latitude"))
		$xt->assign("latitude_fieldblock",true);
	else
		$xt->assign("latitude_tabfieldblock",true);
	$xt->assign("latitude_label",true);
	if(isEnableSection508())
		$xt->assign_section("latitude_label","<label for=\"".GetInputElementId("latitude", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("longitude"))
		$xt->assign("longitude_fieldblock",true);
	else
		$xt->assign("longitude_tabfieldblock",true);
	$xt->assign("longitude_label",true);
	if(isEnableSection508())
		$xt->assign_section("longitude_label","<label for=\"".GetInputElementId("longitude", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
	$xt->assign("created_label",true);
	if(isEnableSection508())
		$xt->assign_section("created_label","<label for=\"".GetInputElementId("created", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("updated"))
		$xt->assign("updated_fieldblock",true);
	else
		$xt->assign("updated_tabfieldblock",true);
	$xt->assign("updated_label",true);
	if(isEnableSection508())
		$xt->assign_section("updated_label","<label for=\"".GetInputElementId("updated", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("update_uid"))
		$xt->assign("update_uid_fieldblock",true);
	else
		$xt->assign("update_uid_tabfieldblock",true);
	$xt->assign("update_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("update_uid_label","<label for=\"".GetInputElementId("update_uid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_restojmlmeja"))
		$xt->assign("kd_restojmlmeja_fieldblock",true);
	else
		$xt->assign("kd_restojmlmeja_tabfieldblock",true);
	$xt->assign("kd_restojmlmeja_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_restojmlmeja_label","<label for=\"".GetInputElementId("kd_restojmlmeja", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_restojmlkursi"))
		$xt->assign("kd_restojmlkursi_fieldblock",true);
	else
		$xt->assign("kd_restojmlkursi_tabfieldblock",true);
	$xt->assign("kd_restojmlkursi_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_restojmlkursi_label","<label for=\"".GetInputElementId("kd_restojmlkursi", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_restojmltamu"))
		$xt->assign("kd_restojmltamu_fieldblock",true);
	else
		$xt->assign("kd_restojmltamu_tabfieldblock",true);
	$xt->assign("kd_restojmltamu_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_restojmltamu_label","<label for=\"".GetInputElementId("kd_restojmltamu", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_filmkursi"))
		$xt->assign("kd_filmkursi_fieldblock",true);
	else
		$xt->assign("kd_filmkursi_tabfieldblock",true);
	$xt->assign("kd_filmkursi_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_filmkursi_label","<label for=\"".GetInputElementId("kd_filmkursi", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_filmpertunjukan"))
		$xt->assign("kd_filmpertunjukan_fieldblock",true);
	else
		$xt->assign("kd_filmpertunjukan_tabfieldblock",true);
	$xt->assign("kd_filmpertunjukan_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_filmpertunjukan_label","<label for=\"".GetInputElementId("kd_filmpertunjukan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_filmtarif"))
		$xt->assign("kd_filmtarif_fieldblock",true);
	else
		$xt->assign("kd_filmtarif_tabfieldblock",true);
	$xt->assign("kd_filmtarif_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_filmtarif_label","<label for=\"".GetInputElementId("kd_filmtarif", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_bilyarmeja"))
		$xt->assign("kd_bilyarmeja_fieldblock",true);
	else
		$xt->assign("kd_bilyarmeja_tabfieldblock",true);
	$xt->assign("kd_bilyarmeja_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bilyarmeja_label","<label for=\"".GetInputElementId("kd_bilyarmeja", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_bilyartarif"))
		$xt->assign("kd_bilyartarif_fieldblock",true);
	else
		$xt->assign("kd_bilyartarif_tabfieldblock",true);
	$xt->assign("kd_bilyartarif_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bilyartarif_label","<label for=\"".GetInputElementId("kd_bilyartarif", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_bilyarkegiatan"))
		$xt->assign("kd_bilyarkegiatan_fieldblock",true);
	else
		$xt->assign("kd_bilyarkegiatan_tabfieldblock",true);
	$xt->assign("kd_bilyarkegiatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bilyarkegiatan_label","<label for=\"".GetInputElementId("kd_bilyarkegiatan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_diskopengunjung"))
		$xt->assign("kd_diskopengunjung_fieldblock",true);
	else
		$xt->assign("kd_diskopengunjung_tabfieldblock",true);
	$xt->assign("kd_diskopengunjung_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_diskopengunjung_label","<label for=\"".GetInputElementId("kd_diskopengunjung", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_diskotarif"))
		$xt->assign("kd_diskotarif_fieldblock",true);
	else
		$xt->assign("kd_diskotarif_tabfieldblock",true);
	$xt->assign("kd_diskotarif_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_diskotarif_label","<label for=\"".GetInputElementId("kd_diskotarif", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("mall_id"))
		$xt->assign("mall_id_fieldblock",true);
	else
		$xt->assign("mall_id_tabfieldblock",true);
	$xt->assign("mall_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("mall_id_label","<label for=\"".GetInputElementId("mall_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("cash_register"))
		$xt->assign("cash_register_fieldblock",true);
	else
		$xt->assign("cash_register_tabfieldblock",true);
	$xt->assign("cash_register_label",true);
	if(isEnableSection508())
		$xt->assign_section("cash_register_label","<label for=\"".GetInputElementId("cash_register", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pelaporan"))
		$xt->assign("pelaporan_fieldblock",true);
	else
		$xt->assign("pelaporan_tabfieldblock",true);
	$xt->assign("pelaporan_label",true);
	if(isEnableSection508())
		$xt->assign_section("pelaporan_label","<label for=\"".GetInputElementId("pelaporan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pembukuan"))
		$xt->assign("pembukuan_fieldblock",true);
	else
		$xt->assign("pembukuan_tabfieldblock",true);
	$xt->assign("pembukuan_label",true);
	if(isEnableSection508())
		$xt->assign_section("pembukuan_label","<label for=\"".GetInputElementId("pembukuan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("bandara"))
		$xt->assign("bandara_fieldblock",true);
	else
		$xt->assign("bandara_tabfieldblock",true);
	$xt->assign("bandara_label",true);
	if(isEnableSection508())
		$xt->assign_section("bandara_label","<label for=\"".GetInputElementId("bandara", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("wajib_pajak"))
		$xt->assign("wajib_pajak_fieldblock",true);
	else
		$xt->assign("wajib_pajak_tabfieldblock",true);
	$xt->assign("wajib_pajak_label",true);
	if(isEnableSection508())
		$xt->assign_section("wajib_pajak_label","<label for=\"".GetInputElementId("wajib_pajak", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jumlah_karyawan"))
		$xt->assign("jumlah_karyawan_fieldblock",true);
	else
		$xt->assign("jumlah_karyawan_tabfieldblock",true);
	$xt->assign("jumlah_karyawan_label",true);
	if(isEnableSection508())
		$xt->assign_section("jumlah_karyawan_label","<label for=\"".GetInputElementId("jumlah_karyawan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tanggal_tutup"))
		$xt->assign("tanggal_tutup_fieldblock",true);
	else
		$xt->assign("tanggal_tutup_tabfieldblock",true);
	$xt->assign("tanggal_tutup_label",true);
	if(isEnableSection508())
		$xt->assign_section("tanggal_tutup_label","<label for=\"".GetInputElementId("tanggal_tutup", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_luas"))
		$xt->assign("parkir_luas_fieldblock",true);
	else
		$xt->assign("parkir_luas_tabfieldblock",true);
	$xt->assign("parkir_luas_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_luas_label","<label for=\"".GetInputElementId("parkir_luas", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_masuk"))
		$xt->assign("parkir_masuk_fieldblock",true);
	else
		$xt->assign("parkir_masuk_tabfieldblock",true);
	$xt->assign("parkir_masuk_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_masuk_label","<label for=\"".GetInputElementId("parkir_masuk", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_tarif_mobil"))
		$xt->assign("parkir_tarif_mobil_fieldblock",true);
	else
		$xt->assign("parkir_tarif_mobil_tabfieldblock",true);
	$xt->assign("parkir_tarif_mobil_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_tarif_mobil_label","<label for=\"".GetInputElementId("parkir_tarif_mobil", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_tambahan"))
		$xt->assign("parkir_tambahan_fieldblock",true);
	else
		$xt->assign("parkir_tambahan_tabfieldblock",true);
	$xt->assign("parkir_tambahan_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_tambahan_label","<label for=\"".GetInputElementId("parkir_tambahan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_kapasitas_mobil"))
		$xt->assign("parkir_kapasitas_mobil_fieldblock",true);
	else
		$xt->assign("parkir_kapasitas_mobil_tabfieldblock",true);
	$xt->assign("parkir_kapasitas_mobil_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_kapasitas_mobil_label","<label for=\"".GetInputElementId("parkir_kapasitas_mobil", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_mobil_hari"))
		$xt->assign("parkir_mobil_hari_fieldblock",true);
	else
		$xt->assign("parkir_mobil_hari_tabfieldblock",true);
	$xt->assign("parkir_mobil_hari_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_mobil_hari_label","<label for=\"".GetInputElementId("parkir_mobil_hari", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_keluar"))
		$xt->assign("parkir_keluar_fieldblock",true);
	else
		$xt->assign("parkir_keluar_tabfieldblock",true);
	$xt->assign("parkir_keluar_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_keluar_label","<label for=\"".GetInputElementId("parkir_keluar", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_motor_luas"))
		$xt->assign("parkir_motor_luas_fieldblock",true);
	else
		$xt->assign("parkir_motor_luas_tabfieldblock",true);
	$xt->assign("parkir_motor_luas_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_luas_label","<label for=\"".GetInputElementId("parkir_motor_luas", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_motor_masuk"))
		$xt->assign("parkir_motor_masuk_fieldblock",true);
	else
		$xt->assign("parkir_motor_masuk_tabfieldblock",true);
	$xt->assign("parkir_motor_masuk_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_masuk_label","<label for=\"".GetInputElementId("parkir_motor_masuk", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_motor_keluar"))
		$xt->assign("parkir_motor_keluar_fieldblock",true);
	else
		$xt->assign("parkir_motor_keluar_tabfieldblock",true);
	$xt->assign("parkir_motor_keluar_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_keluar_label","<label for=\"".GetInputElementId("parkir_motor_keluar", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_tarif_motor"))
		$xt->assign("parkir_tarif_motor_fieldblock",true);
	else
		$xt->assign("parkir_tarif_motor_tabfieldblock",true);
	$xt->assign("parkir_tarif_motor_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_tarif_motor_label","<label for=\"".GetInputElementId("parkir_tarif_motor", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_motor_tambahan"))
		$xt->assign("parkir_motor_tambahan_fieldblock",true);
	else
		$xt->assign("parkir_motor_tambahan_tabfieldblock",true);
	$xt->assign("parkir_motor_tambahan_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_tambahan_label","<label for=\"".GetInputElementId("parkir_motor_tambahan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_kapasitas_motor"))
		$xt->assign("parkir_kapasitas_motor_fieldblock",true);
	else
		$xt->assign("parkir_kapasitas_motor_tabfieldblock",true);
	$xt->assign("parkir_kapasitas_motor_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_kapasitas_motor_label","<label for=\"".GetInputElementId("parkir_kapasitas_motor", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_motor_hari"))
		$xt->assign("parkir_motor_hari_fieldblock",true);
	else
		$xt->assign("parkir_motor_hari_tabfieldblock",true);
	$xt->assign("parkir_motor_hari_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_motor_hari_label","<label for=\"".GetInputElementId("parkir_motor_hari", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kelompok_usaha_id"))
		$xt->assign("kelompok_usaha_id_fieldblock",true);
	else
		$xt->assign("kelompok_usaha_id_tabfieldblock",true);
	$xt->assign("kelompok_usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("kelompok_usaha_id_label","<label for=\"".GetInputElementId("kelompok_usaha_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("zona_id"))
		$xt->assign("zona_id_fieldblock",true);
	else
		$xt->assign("zona_id_tabfieldblock",true);
	$xt->assign("zona_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("zona_id_label","<label for=\"".GetInputElementId("zona_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("manfaat_id"))
		$xt->assign("manfaat_id_fieldblock",true);
	else
		$xt->assign("manfaat_id_tabfieldblock",true);
	$xt->assign("manfaat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("manfaat_id_label","<label for=\"".GetInputElementId("manfaat_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("golongan_id"))
		$xt->assign("golongan_id_fieldblock",true);
	else
		$xt->assign("golongan_id_tabfieldblock",true);
	$xt->assign("golongan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("golongan_id_label","<label for=\"".GetInputElementId("golongan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("id_old"))
		$xt->assign("id_old_fieldblock",true);
	else
		$xt->assign("id_old_tabfieldblock",true);
	$xt->assign("id_old_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_old_label","<label for=\"".GetInputElementId("id_old", $id, PAGE_EDIT)."\">","</label>");
		

	$xt->assign("show_key1", htmlspecialchars($pageObject->showDBValue("id", $data)));
	//$xt->assign('editForm',true);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
	if(!@$_SESSION[$strTableName."_noNextPrev"] && $inlineedit == EDIT_SIMPLE)
	{
		$next = array();
		$prev = array();
		$pageObject->getNextPrevRecordKeys($data,"Edit",$next,$prev);
	}
	$nextlink = $prevlink = "";
	if(count($next))
	{
		$xt->assign("next_button",true);
				$nextlink.= "editid1=".htmlspecialchars(rawurlencode($next[1-1]));
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\" align=\"absmiddle\"");
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
				$prevlink.= "editid1=".htmlspecialchars(rawurlencode($prev[1-1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\" align=\"absmiddle\"");
	}
	else 
		$xt->assign("prev_button",false);
	$xt->assign("resetbutton_attrs",'id="resetButton'.$id.'"');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//End Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
	if($inlineedit == EDIT_SIMPLE)
	{
		$xt->assign("back_button",true);
		$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
	}
	// onmouseover event, for changing focus. Needed to proper submit form
	//$onmouseover = "this.focus();";
	//$onmouseover = 'onmouseover="'.$onmouseover.'"';
	
	$xt->assign("save_button",true);
	if(!$enableCtrlsForEditing)
		$xt->assign("savebutton_attrs", "id=\"saveButton".$id."\" type=\"disabled\" ");
	else
		$xt->assign("savebutton_attrs", "id=\"saveButton".$id."\"");
		
	$xt->assign("reset_button",true);

}

$xt->assign("message_block",true);
$xt->assign("message",$message);
if(!strlen($message))
{
	$xt->displayBrickHidden("message");
}
/////////////////////////////////////////////////////////////
//process readonly and auto-update fields
/////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	return new data to the List page or report an error
/////////////////////////////////////////////////////////////
if (postvalue("a")=="edited" && ($inlineedit == EDIT_INLINE || $inlineedit == EDIT_POPUP))
{
	if(!$data)
	{
		$data = $evalues;
		$HaveData = false;
	}
	//Preparation   view values

//	detail tables
	$showDetailKeys["pad.pad_spt"]["masterkey1"] = $data["id"];		

	$keylink = "";
	$keylink.= "&key1=".htmlspecialchars(rawurlencode(@$data["id"]));


//	id - 
	$value = $pageObject->showDBValue("id", $data, $keylink);
	$showValues["id"] = $value;
	$showFields[] = "id";
		$showRawValues["id"] = substr($data["id"],0,100);

//	konterid - 
	$value = $pageObject->showDBValue("konterid", $data, $keylink);
	$showValues["konterid"] = $value;
	$showFields[] = "konterid";
		$showRawValues["konterid"] = substr($data["konterid"],0,100);

//	reg_date - Short Date
	$value = $pageObject->showDBValue("reg_date", $data, $keylink);
	$showValues["reg_date"] = $value;
	$showFields[] = "reg_date";
		$showRawValues["reg_date"] = substr($data["reg_date"],0,100);

//	customer_id - 
	$value = $pageObject->showDBValue("customer_id", $data, $keylink);
	$showValues["customer_id"] = $value;
	$showFields[] = "customer_id";
		$showRawValues["customer_id"] = substr($data["customer_id"],0,100);

//	usaha_id - 
	$value = $pageObject->showDBValue("usaha_id", $data, $keylink);
	$showValues["usaha_id"] = $value;
	$showFields[] = "usaha_id";
		$showRawValues["usaha_id"] = substr($data["usaha_id"],0,100);

//	so - 
	$value = $pageObject->showDBValue("so", $data, $keylink);
	$showValues["so"] = $value;
	$showFields[] = "so";
		$showRawValues["so"] = substr($data["so"],0,100);

//	kecamatan_id - 
	$value = $pageObject->showDBValue("kecamatan_id", $data, $keylink);
	$showValues["kecamatan_id"] = $value;
	$showFields[] = "kecamatan_id";
		$showRawValues["kecamatan_id"] = substr($data["kecamatan_id"],0,100);

//	kelurahan_id - 
	$value = $pageObject->showDBValue("kelurahan_id", $data, $keylink);
	$showValues["kelurahan_id"] = $value;
	$showFields[] = "kelurahan_id";
		$showRawValues["kelurahan_id"] = substr($data["kelurahan_id"],0,100);

//	notes - 
	$value = $pageObject->showDBValue("notes", $data, $keylink);
	$showValues["notes"] = $value;
	$showFields[] = "notes";
		$showRawValues["notes"] = substr($data["notes"],0,100);

//	enabled - 
	$value = $pageObject->showDBValue("enabled", $data, $keylink);
	$showValues["enabled"] = $value;
	$showFields[] = "enabled";
		$showRawValues["enabled"] = substr($data["enabled"],0,100);

//	create_uid - 
	$value = $pageObject->showDBValue("create_uid", $data, $keylink);
	$showValues["create_uid"] = $value;
	$showFields[] = "create_uid";
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);

//	customer_status_id - 
	$value = $pageObject->showDBValue("customer_status_id", $data, $keylink);
	$showValues["customer_status_id"] = $value;
	$showFields[] = "customer_status_id";
		$showRawValues["customer_status_id"] = substr($data["customer_status_id"],0,100);

//	aktifnotes - 
	$value = $pageObject->showDBValue("aktifnotes", $data, $keylink);
	$showValues["aktifnotes"] = $value;
	$showFields[] = "aktifnotes";
		$showRawValues["aktifnotes"] = substr($data["aktifnotes"],0,100);

//	tmt - Short Date
	$value = $pageObject->showDBValue("tmt", $data, $keylink);
	$showValues["tmt"] = $value;
	$showFields[] = "tmt";
		$showRawValues["tmt"] = substr($data["tmt"],0,100);

//	air_zona_id - 
	$value = $pageObject->showDBValue("air_zona_id", $data, $keylink);
	$showValues["air_zona_id"] = $value;
	$showFields[] = "air_zona_id";
		$showRawValues["air_zona_id"] = substr($data["air_zona_id"],0,100);

//	air_manfaat_id - 
	$value = $pageObject->showDBValue("air_manfaat_id", $data, $keylink);
	$showValues["air_manfaat_id"] = $value;
	$showFields[] = "air_manfaat_id";
		$showRawValues["air_manfaat_id"] = substr($data["air_manfaat_id"],0,100);

//	def_pajak_id - 
	$value = $pageObject->showDBValue("def_pajak_id", $data, $keylink);
	$showValues["def_pajak_id"] = $value;
	$showFields[] = "def_pajak_id";
		$showRawValues["def_pajak_id"] = substr($data["def_pajak_id"],0,100);

//	opnm - 
	$value = $pageObject->showDBValue("opnm", $data, $keylink);
	$showValues["opnm"] = $value;
	$showFields[] = "opnm";
		$showRawValues["opnm"] = substr($data["opnm"],0,100);

//	opalamat - 
	$value = $pageObject->showDBValue("opalamat", $data, $keylink);
	$showValues["opalamat"] = $value;
	$showFields[] = "opalamat";
		$showRawValues["opalamat"] = substr($data["opalamat"],0,100);

//	latitude - Number
	$value = $pageObject->showDBValue("latitude", $data, $keylink);
	$showValues["latitude"] = $value;
	$showFields[] = "latitude";
		$showRawValues["latitude"] = substr($data["latitude"],0,100);

//	longitude - Number
	$value = $pageObject->showDBValue("longitude", $data, $keylink);
	$showValues["longitude"] = $value;
	$showFields[] = "longitude";
		$showRawValues["longitude"] = substr($data["longitude"],0,100);

//	created - Short Date
	$value = $pageObject->showDBValue("created", $data, $keylink);
	$showValues["created"] = $value;
	$showFields[] = "created";
		$showRawValues["created"] = substr($data["created"],0,100);

//	updated - Short Date
	$value = $pageObject->showDBValue("updated", $data, $keylink);
	$showValues["updated"] = $value;
	$showFields[] = "updated";
		$showRawValues["updated"] = substr($data["updated"],0,100);

//	update_uid - 
	$value = $pageObject->showDBValue("update_uid", $data, $keylink);
	$showValues["update_uid"] = $value;
	$showFields[] = "update_uid";
		$showRawValues["update_uid"] = substr($data["update_uid"],0,100);

//	kd_restojmlmeja - 
	$value = $pageObject->showDBValue("kd_restojmlmeja", $data, $keylink);
	$showValues["kd_restojmlmeja"] = $value;
	$showFields[] = "kd_restojmlmeja";
		$showRawValues["kd_restojmlmeja"] = substr($data["kd_restojmlmeja"],0,100);

//	kd_restojmlkursi - 
	$value = $pageObject->showDBValue("kd_restojmlkursi", $data, $keylink);
	$showValues["kd_restojmlkursi"] = $value;
	$showFields[] = "kd_restojmlkursi";
		$showRawValues["kd_restojmlkursi"] = substr($data["kd_restojmlkursi"],0,100);

//	kd_restojmltamu - 
	$value = $pageObject->showDBValue("kd_restojmltamu", $data, $keylink);
	$showValues["kd_restojmltamu"] = $value;
	$showFields[] = "kd_restojmltamu";
		$showRawValues["kd_restojmltamu"] = substr($data["kd_restojmltamu"],0,100);

//	kd_filmkursi - 
	$value = $pageObject->showDBValue("kd_filmkursi", $data, $keylink);
	$showValues["kd_filmkursi"] = $value;
	$showFields[] = "kd_filmkursi";
		$showRawValues["kd_filmkursi"] = substr($data["kd_filmkursi"],0,100);

//	kd_filmpertunjukan - 
	$value = $pageObject->showDBValue("kd_filmpertunjukan", $data, $keylink);
	$showValues["kd_filmpertunjukan"] = $value;
	$showFields[] = "kd_filmpertunjukan";
		$showRawValues["kd_filmpertunjukan"] = substr($data["kd_filmpertunjukan"],0,100);

//	kd_filmtarif - Number
	$value = $pageObject->showDBValue("kd_filmtarif", $data, $keylink);
	$showValues["kd_filmtarif"] = $value;
	$showFields[] = "kd_filmtarif";
		$showRawValues["kd_filmtarif"] = substr($data["kd_filmtarif"],0,100);

//	kd_bilyarmeja - 
	$value = $pageObject->showDBValue("kd_bilyarmeja", $data, $keylink);
	$showValues["kd_bilyarmeja"] = $value;
	$showFields[] = "kd_bilyarmeja";
		$showRawValues["kd_bilyarmeja"] = substr($data["kd_bilyarmeja"],0,100);

//	kd_bilyartarif - Number
	$value = $pageObject->showDBValue("kd_bilyartarif", $data, $keylink);
	$showValues["kd_bilyartarif"] = $value;
	$showFields[] = "kd_bilyartarif";
		$showRawValues["kd_bilyartarif"] = substr($data["kd_bilyartarif"],0,100);

//	kd_bilyarkegiatan - 
	$value = $pageObject->showDBValue("kd_bilyarkegiatan", $data, $keylink);
	$showValues["kd_bilyarkegiatan"] = $value;
	$showFields[] = "kd_bilyarkegiatan";
		$showRawValues["kd_bilyarkegiatan"] = substr($data["kd_bilyarkegiatan"],0,100);

//	kd_diskopengunjung - 
	$value = $pageObject->showDBValue("kd_diskopengunjung", $data, $keylink);
	$showValues["kd_diskopengunjung"] = $value;
	$showFields[] = "kd_diskopengunjung";
		$showRawValues["kd_diskopengunjung"] = substr($data["kd_diskopengunjung"],0,100);

//	kd_diskotarif - Number
	$value = $pageObject->showDBValue("kd_diskotarif", $data, $keylink);
	$showValues["kd_diskotarif"] = $value;
	$showFields[] = "kd_diskotarif";
		$showRawValues["kd_diskotarif"] = substr($data["kd_diskotarif"],0,100);

//	mall_id - 
	$value = $pageObject->showDBValue("mall_id", $data, $keylink);
	$showValues["mall_id"] = $value;
	$showFields[] = "mall_id";
		$showRawValues["mall_id"] = substr($data["mall_id"],0,100);

//	cash_register - 
	$value = $pageObject->showDBValue("cash_register", $data, $keylink);
	$showValues["cash_register"] = $value;
	$showFields[] = "cash_register";
		$showRawValues["cash_register"] = substr($data["cash_register"],0,100);

//	pelaporan - 
	$value = $pageObject->showDBValue("pelaporan", $data, $keylink);
	$showValues["pelaporan"] = $value;
	$showFields[] = "pelaporan";
		$showRawValues["pelaporan"] = substr($data["pelaporan"],0,100);

//	pembukuan - 
	$value = $pageObject->showDBValue("pembukuan", $data, $keylink);
	$showValues["pembukuan"] = $value;
	$showFields[] = "pembukuan";
		$showRawValues["pembukuan"] = substr($data["pembukuan"],0,100);

//	bandara - 
	$value = $pageObject->showDBValue("bandara", $data, $keylink);
	$showValues["bandara"] = $value;
	$showFields[] = "bandara";
		$showRawValues["bandara"] = substr($data["bandara"],0,100);

//	wajib_pajak - 
	$value = $pageObject->showDBValue("wajib_pajak", $data, $keylink);
	$showValues["wajib_pajak"] = $value;
	$showFields[] = "wajib_pajak";
		$showRawValues["wajib_pajak"] = substr($data["wajib_pajak"],0,100);

//	jumlah_karyawan - 
	$value = $pageObject->showDBValue("jumlah_karyawan", $data, $keylink);
	$showValues["jumlah_karyawan"] = $value;
	$showFields[] = "jumlah_karyawan";
		$showRawValues["jumlah_karyawan"] = substr($data["jumlah_karyawan"],0,100);

//	tanggal_tutup - Short Date
	$value = $pageObject->showDBValue("tanggal_tutup", $data, $keylink);
	$showValues["tanggal_tutup"] = $value;
	$showFields[] = "tanggal_tutup";
		$showRawValues["tanggal_tutup"] = substr($data["tanggal_tutup"],0,100);

//	parkir_luas - 
	$value = $pageObject->showDBValue("parkir_luas", $data, $keylink);
	$showValues["parkir_luas"] = $value;
	$showFields[] = "parkir_luas";
		$showRawValues["parkir_luas"] = substr($data["parkir_luas"],0,100);

//	parkir_masuk - 
	$value = $pageObject->showDBValue("parkir_masuk", $data, $keylink);
	$showValues["parkir_masuk"] = $value;
	$showFields[] = "parkir_masuk";
		$showRawValues["parkir_masuk"] = substr($data["parkir_masuk"],0,100);

//	parkir_tarif_mobil - Number
	$value = $pageObject->showDBValue("parkir_tarif_mobil", $data, $keylink);
	$showValues["parkir_tarif_mobil"] = $value;
	$showFields[] = "parkir_tarif_mobil";
		$showRawValues["parkir_tarif_mobil"] = substr($data["parkir_tarif_mobil"],0,100);

//	parkir_tambahan - Number
	$value = $pageObject->showDBValue("parkir_tambahan", $data, $keylink);
	$showValues["parkir_tambahan"] = $value;
	$showFields[] = "parkir_tambahan";
		$showRawValues["parkir_tambahan"] = substr($data["parkir_tambahan"],0,100);

//	parkir_kapasitas_mobil - 
	$value = $pageObject->showDBValue("parkir_kapasitas_mobil", $data, $keylink);
	$showValues["parkir_kapasitas_mobil"] = $value;
	$showFields[] = "parkir_kapasitas_mobil";
		$showRawValues["parkir_kapasitas_mobil"] = substr($data["parkir_kapasitas_mobil"],0,100);

//	parkir_mobil_hari - 
	$value = $pageObject->showDBValue("parkir_mobil_hari", $data, $keylink);
	$showValues["parkir_mobil_hari"] = $value;
	$showFields[] = "parkir_mobil_hari";
		$showRawValues["parkir_mobil_hari"] = substr($data["parkir_mobil_hari"],0,100);

//	parkir_keluar - 
	$value = $pageObject->showDBValue("parkir_keluar", $data, $keylink);
	$showValues["parkir_keluar"] = $value;
	$showFields[] = "parkir_keluar";
		$showRawValues["parkir_keluar"] = substr($data["parkir_keluar"],0,100);

//	parkir_motor_luas - 
	$value = $pageObject->showDBValue("parkir_motor_luas", $data, $keylink);
	$showValues["parkir_motor_luas"] = $value;
	$showFields[] = "parkir_motor_luas";
		$showRawValues["parkir_motor_luas"] = substr($data["parkir_motor_luas"],0,100);

//	parkir_motor_masuk - 
	$value = $pageObject->showDBValue("parkir_motor_masuk", $data, $keylink);
	$showValues["parkir_motor_masuk"] = $value;
	$showFields[] = "parkir_motor_masuk";
		$showRawValues["parkir_motor_masuk"] = substr($data["parkir_motor_masuk"],0,100);

//	parkir_motor_keluar - 
	$value = $pageObject->showDBValue("parkir_motor_keluar", $data, $keylink);
	$showValues["parkir_motor_keluar"] = $value;
	$showFields[] = "parkir_motor_keluar";
		$showRawValues["parkir_motor_keluar"] = substr($data["parkir_motor_keluar"],0,100);

//	parkir_tarif_motor - Number
	$value = $pageObject->showDBValue("parkir_tarif_motor", $data, $keylink);
	$showValues["parkir_tarif_motor"] = $value;
	$showFields[] = "parkir_tarif_motor";
		$showRawValues["parkir_tarif_motor"] = substr($data["parkir_tarif_motor"],0,100);

//	parkir_motor_tambahan - Number
	$value = $pageObject->showDBValue("parkir_motor_tambahan", $data, $keylink);
	$showValues["parkir_motor_tambahan"] = $value;
	$showFields[] = "parkir_motor_tambahan";
		$showRawValues["parkir_motor_tambahan"] = substr($data["parkir_motor_tambahan"],0,100);

//	parkir_kapasitas_motor - 
	$value = $pageObject->showDBValue("parkir_kapasitas_motor", $data, $keylink);
	$showValues["parkir_kapasitas_motor"] = $value;
	$showFields[] = "parkir_kapasitas_motor";
		$showRawValues["parkir_kapasitas_motor"] = substr($data["parkir_kapasitas_motor"],0,100);

//	parkir_motor_hari - 
	$value = $pageObject->showDBValue("parkir_motor_hari", $data, $keylink);
	$showValues["parkir_motor_hari"] = $value;
	$showFields[] = "parkir_motor_hari";
		$showRawValues["parkir_motor_hari"] = substr($data["parkir_motor_hari"],0,100);

//	kelompok_usaha_id - 
	$value = $pageObject->showDBValue("kelompok_usaha_id", $data, $keylink);
	$showValues["kelompok_usaha_id"] = $value;
	$showFields[] = "kelompok_usaha_id";
		$showRawValues["kelompok_usaha_id"] = substr($data["kelompok_usaha_id"],0,100);

//	zona_id - 
	$value = $pageObject->showDBValue("zona_id", $data, $keylink);
	$showValues["zona_id"] = $value;
	$showFields[] = "zona_id";
		$showRawValues["zona_id"] = substr($data["zona_id"],0,100);

//	manfaat_id - 
	$value = $pageObject->showDBValue("manfaat_id", $data, $keylink);
	$showValues["manfaat_id"] = $value;
	$showFields[] = "manfaat_id";
		$showRawValues["manfaat_id"] = substr($data["manfaat_id"],0,100);

//	golongan_id - 
	$value = $pageObject->showDBValue("golongan_id", $data, $keylink);
	$showValues["golongan_id"] = $value;
	$showFields[] = "golongan_id";
		$showRawValues["golongan_id"] = substr($data["golongan_id"],0,100);

//	id_old - 
	$value = $pageObject->showDBValue("id_old", $data, $keylink);
	$showValues["id_old"] = $value;
	$showFields[] = "id_old";
		$showRawValues["id_old"] = substr($data["id_old"],0,100);
/////////////////////////////////////////////////////////////
//	start inline output
/////////////////////////////////////////////////////////////
	
	if($IsSaved)
	{
		if($pageObject->lockingObj)
			$pageObject->lockingObj->UnlockRecord($strTableName,$keys,"");
		
		$returnJSON['success'] = true;
		$returnJSON['keys'] = $pageObject->jsKeys;
		$returnJSON['keyFields'] = $pageObject->keyFields;
		$returnJSON['vals'] = $showValues;
		$returnJSON['fields'] = $showFields;
		$returnJSON['rawVals'] = $showRawValues;
		$returnJSON['detKeys'] = $showDetailKeys;
		$returnJSON['userMess'] = $usermessage;
		$returnJSON['hrefs'] = $pageObject->buildDetailGridLinks($showDetailKeys);
		
		if($inlineedit==EDIT_POPUP && isset($_SESSION[$strTableName."_count_captcha"]) || $_SESSION[$strTableName."_count_captcha"]>0 || $_SESSION[$strTableName."_count_captcha"]<5)
			$returnJSON['hideCaptcha'] = true;
			
		if($globalEvents->exists("IsRecordEditable", $strTableName))
		{
			if(!$globalEvents->IsRecordEditable($showRawValues, true, $strTableName))
				$returnJSON['nonEditable'] = true;
		}
	}
	else
	{
		$returnJSON['success'] = false;
		$returnJSON['message'] = $message;
		
		if($pageObject->lockingObj)
			$returnJSON['lockMessage'] = $system_message;
		
		if($inlineedit == EDIT_POPUP && !$pageObject->isCaptchaOk)
			$returnJSON['captcha'] = false;
	}
	echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
	exit();
} 
/////////////////////////////////////////////////////////////
//	prepare Edit Controls
/////////////////////////////////////////////////////////////
//	validation stuff
$regex = '';
$regexmessage = '';
$regextype = '';
$control = array();

foreach($pageObject->editFields as $fName)
{
	$gfName = GoodFieldName($fName);
	$controls = array('controls'=>array());
	if (!$detailKeys || !in_array($fName, $detailKeys))
	{
		$control[$gfName] = array();
		$control[$gfName]["func"]="xt_buildeditcontrol";
		$control[$gfName]["params"] = array();
		$control[$gfName]["params"]["id"] = $id;
		$control[$gfName]["params"]["ptype"] = PAGE_EDIT;
		$control[$gfName]["params"]["field"] = $fName;
		if(!IsNumberType($pageObject->pSet->getFieldType($fName)) || is_null(@$data[$fName]))
			$control[$gfName]["params"]["value"] = @$data[$fName];
		else
		{
			$control[$gfName]["params"]["value"] = str_replace(".",$locale_info["LOCALE_SDECIMAL"],@$data[$fName]);
		}
		$control[$gfName]["params"]["pageObj"] = $pageObject;
		
		//	Begin Add validation
		$arrValidate = $pageObject->pSet->getValidation($fName);
		$control[$gfName]["params"]["validate"] = $arrValidate;
		//	End Add validation	
		$additionalCtrlParams = array();
		$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
		$control[$gfName]["params"]["additionalCtrlParams"] = $additionalCtrlParams;
	}
	$controls["controls"]['ctrlInd'] = 0;
	$controls["controls"]['id'] = $id;
	$controls["controls"]['fieldName'] = $fName;
	
	if($inlineedit == EDIT_INLINE)
	{
		if(!$detailKeys || !in_array($fName, $detailKeys))
			$control[$gfName]["params"]["mode"]="inline_edit";
		$controls["controls"]['mode'] = "inline_edit";
	}
	else{
			if (!$detailKeys || !in_array($fName, $detailKeys))
				$control[$gfName]["params"]["mode"] = "edit";
			$controls["controls"]['mode'] = "edit";
		}
																																																														
	if(!$detailKeys || !in_array($fName, $detailKeys))
		$xt->assignbyref($gfName."_editcontrol",$control[$gfName]);
	elseif($detailKeys && in_array($fName, $detailKeys))
		$controls["controls"]['value'] = @$data[$fName];
		
	// category control field
	$strCategoryControl = $pageObject->isDependOnField($fName);
	
	if($strCategoryControl!==false && in_array($strCategoryControl, $pageObject->editFields))
		$vals = array($fName => @$data[$fName],$strCategoryControl => @$data[$strCategoryControl]);
	else
		$vals = array($fName => @$data[$fName]);
		
	$preload = $pageObject->fillPreload($fName, $vals);
	if($preload!==false)
		$controls["controls"]['preloadData'] = $preload;
	
	$pageObject->fillControlsMap($controls);
	
	//fill field tool tips
	$pageObject->fillFieldToolTips($fName);
	
	// fill special settings for timepicker
	if($pageObject->pSet->getEditFormat($fName) == 'Time')	
		$pageObject->fillTimePickSettings($fName, $data[$fName]);
	
	if($pageObject->pSet->getViewFormat($fName) == FORMAT_MAP)	
		$pageObject->googleMapCfg['isUseGoogleMap'] = true;
		
	if($detailKeys && in_array($fName, $detailKeys) && array_key_exists($fName, $data))
	{
		$value = $pageObject->showDBValue($fName, $data);
		
		$xt->assign($gfName."_editcontrol",$value);
	}
}
//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

$pageObject->jsSettings['tableSettings'][$strTableName]["keys"] = $pageObject->jsKeys;
$pageObject->jsSettings['tableSettings'][$strTableName]['keyFields'] = $pageObject->keyFields;
$pageObject->jsSettings['tableSettings'][$strTableName]["prevKeys"] = $prev;
$pageObject->jsSettings['tableSettings'][$strTableName]["nextKeys"] = $next; 
if($pageObject->lockingObj)
{
	$pageObject->jsSettings['tableSettings'][$strTableName]["sKeys"] = $skeys;
	$pageObject->jsSettings['tableSettings'][$strTableName]["enableCtrls"] = $enableCtrlsForEditing;
	$pageObject->jsSettings['tableSettings'][$strTableName]["confirmTime"] = $pageObject->lockingObj->ConfirmTime;
}

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && $inlineedit!=EDIT_INLINE && !isMobile())
{
	if(count($dpParams['ids']))
	{
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		$xt->assign("detail_tables",true);	
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
		$options["masterPageType"] = PAGE_EDIT;
		$options["mainMasterPageType"] = PAGE_EDIT;
		$options['masterTable'] = "pad.pad_customer_usaha";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "pad.pad_customer_usaha";
			continue;
		}
		
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
		$masterKeys = array();
		$mkr = 1;
		
		foreach($mKeys[$strTableName] as $mk){
			$options['masterKeysReq'][$mkr] = $data[$mk];
			$masterKeys['masterKey'.$mkr] = $data[$mk];
			$mkr++;
		}
		
		$listPageObject = ListPage::createListPage($strTableName, $options);
		
		// prepare code
		$listPageObject->prepareForBuildPage();
		
		// show page
		if($listPageObject->isDispGrid())
		{
			//set page events
			foreach($listPageObject->eventsObject->events as $event => $name)
				$listPageObject->xt->assign_event($event, $listPageObject->eventsObject, $event, array());
			
			//add detail settings to master settings
			$listPageObject->addControlsJSAndCSS();
			$listPageObject->fillSetCntrlMaps();
			
			$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];
			
			foreach($listPageObject->jsSettings["global"]["shortTNames"] as $tName => $shortTName){
				$pageObject->settingsMap["globalSettings"]["shortTNames"][$tName] = $shortTName;
			}
			
			$dControlsMap[$strTableName] = $listPageObject->controlsMap;
			$dControlsMap[$strTableName]['masterKeys'] = $masterKeys;
			$dViewControlsMap[$strTableName] = $listPageObject->viewControlsMap;
			
			//Add detail's js files to master's files
			$pageObject->copyAllJSFiles($listPageObject->grabAllJSFiles());
			
			//Add detail's css files to master's files
			$pageObject->copyAllCSSFiles($listPageObject->grabAllCSSFiles());
			
			$xtParams = array("method"=>'showPage', "params"=> false);
			$xtParams['object'] = $listPageObject;
			$xt->assign("displayDetailTable_".GoodFieldName($listPageObject->tName), $xtParams);
			
			$pageObject->controlsMap['dpTablesParams'][] = array('tName'=>$strTableName, 'id'=>$options['id']);
		}
		$flyId = $listPageObject->recId+1;
	}
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
	$pageObject->viewControlsMap['dViewControlsMap'] = $dViewControlsMap; 
	$strTableName = "pad.pad_customer_usaha";
}
/////////////////////////////////////////////////////////////
//fill jsSettings and ControlsHTMLMap
$pageObject->flyId = $flyId;
$pageObject->fillSetCntrlMaps();

$pageObject->addCommonJs();

//For mobile version in apple device

if($inlineedit == EDIT_SIMPLE)
{
	// assign body end
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";
	$pageObject->body['end']["object"] = &$pageObject;
	$xt->assign("body", $pageObject->body);
	$xt->assign("flybody",true);
}

if($inlineedit == EDIT_POPUP){
	$xt->assign("footer",false);
	$xt->assign("header",false);
	$xt->assign("body",$pageObject->body);
}

$xt->assign("style_block",true);

$pageObject->xt->assign("legend", true);

$viewlink = "";
$viewkeys = array();
	$viewkeys["editid1"] = postvalue("editid1");
foreach($viewkeys as $key => $val)
{
	if($viewlink)
		$viewlink.="&";
	$viewlink.=$key."=".$val;
}
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='pad_pad_customer_usaha_view.php?".$viewlink."'\"");
if(CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search") && $inlineedit == EDIT_SIMPLE)
	$xt->assign("view_button",true);
else
	$xt->assign("view_button",false);

/////////////////////////////////////////////////////////////
//display the page
/////////////////////////////////////////////////////////////
if($eventObj->exists("BeforeShowEdit"))
	$eventObj->BeforeShowEdit($xt,$templatefile,$data, $pageObject);

if($inlineedit != EDIT_SIMPLE)
{
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['viewControlsMap'] = $pageObject->viewControlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;	
}
	
if($inlineedit == EDIT_POPUP || $inlineedit == EDIT_INLINE)
{
	if($globalEvents->exists("IsRecordEditable", $strTableName))
	{
		if(!$globalEvents->IsRecordEditable($data, true, $strTableName))
			return SecurityRedirect($inlineedit);
	}
}
if($inlineedit == EDIT_POPUP)
{
	$xt->load_template($templatefile);
	$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('body');
	if(count($pageObject->includes_css))
		$returnJSON['CSSFiles'] = array_unique($pageObject->includes_css);
	if(count($pageObject->includes_cssIE))
		$returnJSON['CSSFilesIE'] = array_unique($pageObject->includes_cssIE);
	$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
	$returnJSON['idStartFrom'] = $flyId + 1;
	echo (my_json_encode($returnJSON)); 
}
elseif($inlineedit == EDIT_INLINE)
{
	$xt->load_template($templatefile);
	$returnJSON["html"] = array();
	foreach($pageObject->editFields as $fName)
	{
		if($detailKeys && in_array($fName, $detailKeys))
			continue;
		$returnJSON["html"][$fName] = $xt->fetchVar(GoodFieldName($fName)."_editcontrol");
	}
	$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
	$returnJSON["additionalCSS"] = $pageObject->grabAllCSSFiles();
	echo (my_json_encode($returnJSON)); 
}
else
	$xt->display($templatefile);
	
function SecurityRedirect($inlineedit)
{
	if($inlineedit == EDIT_INLINE)
	{
		echo my_json_encode(array("success" => false, "message" => "The record is not editable"));
		return;
	}
	
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: menu.php?message=expired");	
}
?>
