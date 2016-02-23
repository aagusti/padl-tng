<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_spt_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_spt_edit"] = $layout;




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

$templatefile = ($inlineedit == EDIT_INLINE) ? "pad_pad_spt_inline_edit.htm" : "pad_pad_spt_edit.htm";

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
	

//	processing tahun - begin
	$condition = 1;

	if($condition)
	{
		$control_tahun = $pageObject->getControl("tahun", $id);
		$control_tahun->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tahun - end
//	processing sptno - begin
	$condition = 1;

	if($condition)
	{
		$control_sptno = $pageObject->getControl("sptno", $id);
		$control_sptno->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing sptno - end
//	processing customer_id - begin
	$condition = 1;

	if($condition)
	{
		$control_customer_id = $pageObject->getControl("customer_id", $id);
		$control_customer_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing customer_id - end
//	processing customer_usaha_id - begin
	$condition = 1;

	if($condition)
	{
		$control_customer_usaha_id = $pageObject->getControl("customer_usaha_id", $id);
		$control_customer_usaha_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing customer_usaha_id - end
//	processing rekening_id - begin
	$condition = 1;

	if($condition)
	{
		$control_rekening_id = $pageObject->getControl("rekening_id", $id);
		$control_rekening_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing rekening_id - end
//	processing pajak_id - begin
	$condition = 1;

	if($condition)
	{
		$control_pajak_id = $pageObject->getControl("pajak_id", $id);
		$control_pajak_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pajak_id - end
//	processing type_id - begin
	$condition = 1;

	if($condition)
	{
		$control_type_id = $pageObject->getControl("type_id", $id);
		$control_type_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing type_id - end
//	processing so - begin
	$condition = 1;

	if($condition)
	{
		$control_so = $pageObject->getControl("so", $id);
		$control_so->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing so - end
//	processing masadari - begin
	$condition = 1;

	if($condition)
	{
		$control_masadari = $pageObject->getControl("masadari", $id);
		$control_masadari->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing masadari - end
//	processing masasd - begin
	$condition = 1;

	if($condition)
	{
		$control_masasd = $pageObject->getControl("masasd", $id);
		$control_masasd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing masasd - end
//	processing jatuhtempotgl - begin
	$condition = 1;

	if($condition)
	{
		$control_jatuhtempotgl = $pageObject->getControl("jatuhtempotgl", $id);
		$control_jatuhtempotgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jatuhtempotgl - end
//	processing r_bayarid - begin
	$condition = 1;

	if($condition)
	{
		$control_r_bayarid = $pageObject->getControl("r_bayarid", $id);
		$control_r_bayarid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_bayarid - end
//	processing minimal_omset - begin
	$condition = 1;

	if($condition)
	{
		$control_minimal_omset = $pageObject->getControl("minimal_omset", $id);
		$control_minimal_omset->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing minimal_omset - end
//	processing dasar - begin
	$condition = 1;

	if($condition)
	{
		$control_dasar = $pageObject->getControl("dasar", $id);
		$control_dasar->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing dasar - end
//	processing tarif - begin
	$condition = 1;

	if($condition)
	{
		$control_tarif = $pageObject->getControl("tarif", $id);
		$control_tarif->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tarif - end
//	processing denda - begin
	$condition = 1;

	if($condition)
	{
		$control_denda = $pageObject->getControl("denda", $id);
		$control_denda->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing denda - end
//	processing bunga - begin
	$condition = 1;

	if($condition)
	{
		$control_bunga = $pageObject->getControl("bunga", $id);
		$control_bunga->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing bunga - end
//	processing setoran - begin
	$condition = 1;

	if($condition)
	{
		$control_setoran = $pageObject->getControl("setoran", $id);
		$control_setoran->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing setoran - end
//	processing kenaikan - begin
	$condition = 1;

	if($condition)
	{
		$control_kenaikan = $pageObject->getControl("kenaikan", $id);
		$control_kenaikan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kenaikan - end
//	processing kompensasi - begin
	$condition = 1;

	if($condition)
	{
		$control_kompensasi = $pageObject->getControl("kompensasi", $id);
		$control_kompensasi->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kompensasi - end
//	processing lain2 - begin
	$condition = 1;

	if($condition)
	{
		$control_lain2 = $pageObject->getControl("lain2", $id);
		$control_lain2->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing lain2 - end
//	processing pajak_terhutang - begin
	$condition = 1;

	if($condition)
	{
		$control_pajak_terhutang = $pageObject->getControl("pajak_terhutang", $id);
		$control_pajak_terhutang->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pajak_terhutang - end
//	processing air_manfaat_id - begin
	$condition = 1;

	if($condition)
	{
		$control_air_manfaat_id = $pageObject->getControl("air_manfaat_id", $id);
		$control_air_manfaat_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing air_manfaat_id - end
//	processing air_zona_id - begin
	$condition = 1;

	if($condition)
	{
		$control_air_zona_id = $pageObject->getControl("air_zona_id", $id);
		$control_air_zona_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing air_zona_id - end
//	processing meteran_awal - begin
	$condition = 1;

	if($condition)
	{
		$control_meteran_awal = $pageObject->getControl("meteran_awal", $id);
		$control_meteran_awal->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing meteran_awal - end
//	processing meteran_akhir - begin
	$condition = 1;

	if($condition)
	{
		$control_meteran_akhir = $pageObject->getControl("meteran_akhir", $id);
		$control_meteran_akhir->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing meteran_akhir - end
//	processing volume - begin
	$condition = 1;

	if($condition)
	{
		$control_volume = $pageObject->getControl("volume", $id);
		$control_volume->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing volume - end
//	processing satuan - begin
	$condition = 1;

	if($condition)
	{
		$control_satuan = $pageObject->getControl("satuan", $id);
		$control_satuan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing satuan - end
//	processing r_panjang - begin
	$condition = 1;

	if($condition)
	{
		$control_r_panjang = $pageObject->getControl("r_panjang", $id);
		$control_r_panjang->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_panjang - end
//	processing r_lebar - begin
	$condition = 1;

	if($condition)
	{
		$control_r_lebar = $pageObject->getControl("r_lebar", $id);
		$control_r_lebar->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_lebar - end
//	processing r_muka - begin
	$condition = 1;

	if($condition)
	{
		$control_r_muka = $pageObject->getControl("r_muka", $id);
		$control_r_muka->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_muka - end
//	processing r_banyak - begin
	$condition = 1;

	if($condition)
	{
		$control_r_banyak = $pageObject->getControl("r_banyak", $id);
		$control_r_banyak->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_banyak - end
//	processing r_luas - begin
	$condition = 1;

	if($condition)
	{
		$control_r_luas = $pageObject->getControl("r_luas", $id);
		$control_r_luas->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_luas - end
//	processing r_tarifid - begin
	$condition = 1;

	if($condition)
	{
		$control_r_tarifid = $pageObject->getControl("r_tarifid", $id);
		$control_r_tarifid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_tarifid - end
//	processing r_kontrak - begin
	$condition = 1;

	if($condition)
	{
		$control_r_kontrak = $pageObject->getControl("r_kontrak", $id);
		$control_r_kontrak->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_kontrak - end
//	processing r_lama - begin
	$condition = 1;

	if($condition)
	{
		$control_r_lama = $pageObject->getControl("r_lama", $id);
		$control_r_lama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_lama - end
//	processing r_jalan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_r_jalan_id = $pageObject->getControl("r_jalan_id", $id);
		$control_r_jalan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_jalan_id - end
//	processing r_jalanklas_id - begin
	$condition = 1;

	if($condition)
	{
		$control_r_jalanklas_id = $pageObject->getControl("r_jalanklas_id", $id);
		$control_r_jalanklas_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_jalanklas_id - end
//	processing r_lokasi - begin
	$condition = 1;

	if($condition)
	{
		$control_r_lokasi = $pageObject->getControl("r_lokasi", $id);
		$control_r_lokasi->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_lokasi - end
//	processing r_judul - begin
	$condition = 1;

	if($condition)
	{
		$control_r_judul = $pageObject->getControl("r_judul", $id);
		$control_r_judul->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_judul - end
//	processing r_kelurahan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_r_kelurahan_id = $pageObject->getControl("r_kelurahan_id", $id);
		$control_r_kelurahan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_kelurahan_id - end
//	processing r_lokasi_id - begin
	$condition = 1;

	if($condition)
	{
		$control_r_lokasi_id = $pageObject->getControl("r_lokasi_id", $id);
		$control_r_lokasi_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_lokasi_id - end
//	processing r_calculated - begin
	$condition = 1;

	if($condition)
	{
		$control_r_calculated = $pageObject->getControl("r_calculated", $id);
		$control_r_calculated->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_calculated - end
//	processing r_nsr - begin
	$condition = 1;

	if($condition)
	{
		$control_r_nsr = $pageObject->getControl("r_nsr", $id);
		$control_r_nsr->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_nsr - end
//	processing r_nsrno - begin
	$condition = 1;

	if($condition)
	{
		$control_r_nsrno = $pageObject->getControl("r_nsrno", $id);
		$control_r_nsrno->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_nsrno - end
//	processing r_nsrtgl - begin
	$condition = 1;

	if($condition)
	{
		$control_r_nsrtgl = $pageObject->getControl("r_nsrtgl", $id);
		$control_r_nsrtgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_nsrtgl - end
//	processing r_nsl_kecamatan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_r_nsl_kecamatan_id = $pageObject->getControl("r_nsl_kecamatan_id", $id);
		$control_r_nsl_kecamatan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_nsl_kecamatan_id - end
//	processing r_nsl_type_id - begin
	$condition = 1;

	if($condition)
	{
		$control_r_nsl_type_id = $pageObject->getControl("r_nsl_type_id", $id);
		$control_r_nsl_type_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_nsl_type_id - end
//	processing r_nsl_nilai - begin
	$condition = 1;

	if($condition)
	{
		$control_r_nsl_nilai = $pageObject->getControl("r_nsl_nilai", $id);
		$control_r_nsl_nilai->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_nsl_nilai - end
//	processing notes - begin
	$condition = 1;

	if($condition)
	{
		$control_notes = $pageObject->getControl("notes", $id);
		$control_notes->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing notes - end
//	processing unit_id - begin
	$condition = 1;

	if($condition)
	{
		$control_unit_id = $pageObject->getControl("unit_id", $id);
		$control_unit_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing unit_id - end
//	processing enabled - begin
	$condition = 1;

	if($condition)
	{
		$control_enabled = $pageObject->getControl("enabled", $id);
		$control_enabled->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing enabled - end
//	processing created - begin
	$condition = 1;

	if($condition)
	{
		$control_created = $pageObject->getControl("created", $id);
		$control_created->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing created - end
//	processing create_uid - begin
	$condition = 1;

	if($condition)
	{
		$control_create_uid = $pageObject->getControl("create_uid", $id);
		$control_create_uid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing create_uid - end
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
//	processing terimanip - begin
	$condition = 1;

	if($condition)
	{
		$control_terimanip = $pageObject->getControl("terimanip", $id);
		$control_terimanip->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing terimanip - end
//	processing terimatgl - begin
	$condition = 1;

	if($condition)
	{
		$control_terimatgl = $pageObject->getControl("terimatgl", $id);
		$control_terimatgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing terimatgl - end
//	processing kirimtgl - begin
	$condition = 1;

	if($condition)
	{
		$control_kirimtgl = $pageObject->getControl("kirimtgl", $id);
		$control_kirimtgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kirimtgl - end
//	processing isprint_dc - begin
	$condition = 1;

	if($condition)
	{
		$control_isprint_dc = $pageObject->getControl("isprint_dc", $id);
		$control_isprint_dc->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing isprint_dc - end
//	processing r_nsr_id - begin
	$condition = 1;

	if($condition)
	{
		$control_r_nsr_id = $pageObject->getControl("r_nsr_id", $id);
		$control_r_nsr_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_nsr_id - end
//	processing r_lokasi_pasang_id - begin
	$condition = 1;

	if($condition)
	{
		$control_r_lokasi_pasang_id = $pageObject->getControl("r_lokasi_pasang_id", $id);
		$control_r_lokasi_pasang_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_lokasi_pasang_id - end
//	processing r_lokasi_pasang_val - begin
	$condition = 1;

	if($condition)
	{
		$control_r_lokasi_pasang_val = $pageObject->getControl("r_lokasi_pasang_val", $id);
		$control_r_lokasi_pasang_val->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_lokasi_pasang_val - end
//	processing r_jalanklas_val - begin
	$condition = 1;

	if($condition)
	{
		$control_r_jalanklas_val = $pageObject->getControl("r_jalanklas_val", $id);
		$control_r_jalanklas_val->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_jalanklas_val - end
//	processing r_sudut_pandang_id - begin
	$condition = 1;

	if($condition)
	{
		$control_r_sudut_pandang_id = $pageObject->getControl("r_sudut_pandang_id", $id);
		$control_r_sudut_pandang_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_sudut_pandang_id - end
//	processing r_sudut_pandang_val - begin
	$condition = 1;

	if($condition)
	{
		$control_r_sudut_pandang_val = $pageObject->getControl("r_sudut_pandang_val", $id);
		$control_r_sudut_pandang_val->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_sudut_pandang_val - end
//	processing r_tinggi - begin
	$condition = 1;

	if($condition)
	{
		$control_r_tinggi = $pageObject->getControl("r_tinggi", $id);
		$control_r_tinggi->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_tinggi - end
//	processing r_njop - begin
	$condition = 1;

	if($condition)
	{
		$control_r_njop = $pageObject->getControl("r_njop", $id);
		$control_r_njop->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_njop - end
//	processing r_status - begin
	$condition = 1;

	if($condition)
	{
		$control_r_status = $pageObject->getControl("r_status", $id);
		$control_r_status->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_status - end
//	processing r_njop_ketinggian - begin
	$condition = 1;

	if($condition)
	{
		$control_r_njop_ketinggian = $pageObject->getControl("r_njop_ketinggian", $id);
		$control_r_njop_ketinggian->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_njop_ketinggian - end
//	processing status_pembayaran - begin
	$condition = 1;

	if($condition)
	{
		$control_status_pembayaran = $pageObject->getControl("status_pembayaran", $id);
		$control_status_pembayaran->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing status_pembayaran - end
//	processing rek_no_paneng - begin
	$condition = 1;

	if($condition)
	{
		$control_rek_no_paneng = $pageObject->getControl("rek_no_paneng", $id);
		$control_rek_no_paneng->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing rek_no_paneng - end
//	processing sptno_lengkap - begin
	$condition = 1;

	if($condition)
	{
		$control_sptno_lengkap = $pageObject->getControl("sptno_lengkap", $id);
		$control_sptno_lengkap->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing sptno_lengkap - end
//	processing sptno_lama - begin
	$condition = 1;

	if($condition)
	{
		$control_sptno_lama = $pageObject->getControl("sptno_lama", $id);
		$control_sptno_lama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing sptno_lama - end
//	processing r_nama - begin
	$condition = 1;

	if($condition)
	{
		$control_r_nama = $pageObject->getControl("r_nama", $id);
		$control_r_nama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_nama - end
//	processing r_alamat - begin
	$condition = 1;

	if($condition)
	{
		$control_r_alamat = $pageObject->getControl("r_alamat", $id);
		$control_r_alamat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing r_alamat - end
//	processing omset1 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset1 = $pageObject->getControl("omset1", $id);
		$control_omset1->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset1 - end
//	processing omset2 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset2 = $pageObject->getControl("omset2", $id);
		$control_omset2->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset2 - end
//	processing omset3 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset3 = $pageObject->getControl("omset3", $id);
		$control_omset3->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset3 - end
//	processing omset4 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset4 = $pageObject->getControl("omset4", $id);
		$control_omset4->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset4 - end
//	processing omset5 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset5 = $pageObject->getControl("omset5", $id);
		$control_omset5->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset5 - end
//	processing omset6 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset6 = $pageObject->getControl("omset6", $id);
		$control_omset6->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset6 - end
//	processing omset7 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset7 = $pageObject->getControl("omset7", $id);
		$control_omset7->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset7 - end
//	processing omset8 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset8 = $pageObject->getControl("omset8", $id);
		$control_omset8->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset8 - end
//	processing omset9 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset9 = $pageObject->getControl("omset9", $id);
		$control_omset9->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset9 - end
//	processing omset10 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset10 = $pageObject->getControl("omset10", $id);
		$control_omset10->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset10 - end
//	processing omset11 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset11 = $pageObject->getControl("omset11", $id);
		$control_omset11->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset11 - end
//	processing omset12 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset12 = $pageObject->getControl("omset12", $id);
		$control_omset12->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset12 - end
//	processing omset13 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset13 = $pageObject->getControl("omset13", $id);
		$control_omset13->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset13 - end
//	processing omset14 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset14 = $pageObject->getControl("omset14", $id);
		$control_omset14->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset14 - end
//	processing omset15 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset15 = $pageObject->getControl("omset15", $id);
		$control_omset15->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset15 - end
//	processing omset16 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset16 = $pageObject->getControl("omset16", $id);
		$control_omset16->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset16 - end
//	processing omset17 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset17 = $pageObject->getControl("omset17", $id);
		$control_omset17->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset17 - end
//	processing omset18 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset18 = $pageObject->getControl("omset18", $id);
		$control_omset18->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset18 - end
//	processing omset19 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset19 = $pageObject->getControl("omset19", $id);
		$control_omset19->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset19 - end
//	processing omset20 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset20 = $pageObject->getControl("omset20", $id);
		$control_omset20->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset20 - end
//	processing omset21 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset21 = $pageObject->getControl("omset21", $id);
		$control_omset21->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset21 - end
//	processing omset22 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset22 = $pageObject->getControl("omset22", $id);
		$control_omset22->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset22 - end
//	processing omset23 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset23 = $pageObject->getControl("omset23", $id);
		$control_omset23->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset23 - end
//	processing omset24 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset24 = $pageObject->getControl("omset24", $id);
		$control_omset24->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset24 - end
//	processing omset25 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset25 = $pageObject->getControl("omset25", $id);
		$control_omset25->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset25 - end
//	processing omset26 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset26 = $pageObject->getControl("omset26", $id);
		$control_omset26->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset26 - end
//	processing omset27 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset27 = $pageObject->getControl("omset27", $id);
		$control_omset27->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset27 - end
//	processing omset28 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset28 = $pageObject->getControl("omset28", $id);
		$control_omset28->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset28 - end
//	processing omset29 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset29 = $pageObject->getControl("omset29", $id);
		$control_omset29->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset29 - end
//	processing omset30 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset30 = $pageObject->getControl("omset30", $id);
		$control_omset30->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset30 - end
//	processing omset31 - begin
	$condition = 1;

	if($condition)
	{
		$control_omset31 = $pageObject->getControl("omset31", $id);
		$control_omset31->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset31 - end
//	processing keterangan1 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan1 = $pageObject->getControl("keterangan1", $id);
		$control_keterangan1->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan1 - end
//	processing keterangan2 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan2 = $pageObject->getControl("keterangan2", $id);
		$control_keterangan2->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan2 - end
//	processing keterangan3 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan3 = $pageObject->getControl("keterangan3", $id);
		$control_keterangan3->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan3 - end
//	processing keterangan4 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan4 = $pageObject->getControl("keterangan4", $id);
		$control_keterangan4->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan4 - end
//	processing keterangan5 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan5 = $pageObject->getControl("keterangan5", $id);
		$control_keterangan5->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan5 - end
//	processing keterangan6 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan6 = $pageObject->getControl("keterangan6", $id);
		$control_keterangan6->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan6 - end
//	processing keterangan7 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan7 = $pageObject->getControl("keterangan7", $id);
		$control_keterangan7->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan7 - end
//	processing keterangan8 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan8 = $pageObject->getControl("keterangan8", $id);
		$control_keterangan8->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan8 - end
//	processing keterangan9 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan9 = $pageObject->getControl("keterangan9", $id);
		$control_keterangan9->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan9 - end
//	processing keterangan10 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan10 = $pageObject->getControl("keterangan10", $id);
		$control_keterangan10->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan10 - end
//	processing keterangan11 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan11 = $pageObject->getControl("keterangan11", $id);
		$control_keterangan11->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan11 - end
//	processing keterangan12 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan12 = $pageObject->getControl("keterangan12", $id);
		$control_keterangan12->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan12 - end
//	processing keterangan13 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan13 = $pageObject->getControl("keterangan13", $id);
		$control_keterangan13->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan13 - end
//	processing keterangan14 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan14 = $pageObject->getControl("keterangan14", $id);
		$control_keterangan14->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan14 - end
//	processing keterangan15 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan15 = $pageObject->getControl("keterangan15", $id);
		$control_keterangan15->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan15 - end
//	processing keterangan16 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan16 = $pageObject->getControl("keterangan16", $id);
		$control_keterangan16->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan16 - end
//	processing keterangan17 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan17 = $pageObject->getControl("keterangan17", $id);
		$control_keterangan17->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan17 - end
//	processing keterangan18 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan18 = $pageObject->getControl("keterangan18", $id);
		$control_keterangan18->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan18 - end
//	processing keterangan19 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan19 = $pageObject->getControl("keterangan19", $id);
		$control_keterangan19->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan19 - end
//	processing keterangan20 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan20 = $pageObject->getControl("keterangan20", $id);
		$control_keterangan20->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan20 - end
//	processing keterangan21 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan21 = $pageObject->getControl("keterangan21", $id);
		$control_keterangan21->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan21 - end
//	processing keterangan22 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan22 = $pageObject->getControl("keterangan22", $id);
		$control_keterangan22->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan22 - end
//	processing keterangan23 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan23 = $pageObject->getControl("keterangan23", $id);
		$control_keterangan23->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan23 - end
//	processing keterangan24 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan24 = $pageObject->getControl("keterangan24", $id);
		$control_keterangan24->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan24 - end
//	processing keterangan25 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan25 = $pageObject->getControl("keterangan25", $id);
		$control_keterangan25->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan25 - end
//	processing keterangan26 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan26 = $pageObject->getControl("keterangan26", $id);
		$control_keterangan26->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan26 - end
//	processing keterangan27 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan27 = $pageObject->getControl("keterangan27", $id);
		$control_keterangan27->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan27 - end
//	processing keterangan28 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan28 = $pageObject->getControl("keterangan28", $id);
		$control_keterangan28->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan28 - end
//	processing keterangan29 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan29 = $pageObject->getControl("keterangan29", $id);
		$control_keterangan29->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan29 - end
//	processing keterangan30 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan30 = $pageObject->getControl("keterangan30", $id);
		$control_keterangan30->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan30 - end
//	processing keterangan31 - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan31 = $pageObject->getControl("keterangan31", $id);
		$control_keterangan31->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan31 - end
//	processing doc_no - begin
	$condition = 1;

	if($condition)
	{
		$control_doc_no = $pageObject->getControl("doc_no", $id);
		$control_doc_no->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing doc_no - end
//	processing cara_bayar - begin
	$condition = 1;

	if($condition)
	{
		$control_cara_bayar = $pageObject->getControl("cara_bayar", $id);
		$control_cara_bayar->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing cara_bayar - end
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
//	processing golongan - begin
	$condition = 1;

	if($condition)
	{
		$control_golongan = $pageObject->getControl("golongan", $id);
		$control_golongan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing golongan - end
//	processing omset_lain - begin
	$condition = 1;

	if($condition)
	{
		$control_omset_lain = $pageObject->getControl("omset_lain", $id);
		$control_omset_lain->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing omset_lain - end
//	processing keterangan_lain - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan_lain = $pageObject->getControl("keterangan_lain", $id);
		$control_keterangan_lain->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan_lain - end
//	processing ijin_no - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin_no = $pageObject->getControl("ijin_no", $id);
		$control_ijin_no->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin_no - end
//	processing jenis_masa - begin
	$condition = 1;

	if($condition)
	{
		$control_jenis_masa = $pageObject->getControl("jenis_masa", $id);
		$control_jenis_masa->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jenis_masa - end
//	processing skpd_lama - begin
	$condition = 1;

	if($condition)
	{
		$control_skpd_lama = $pageObject->getControl("skpd_lama", $id);
		$control_skpd_lama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing skpd_lama - end
//	processing proses - begin
	$condition = 1;

	if($condition)
	{
		$control_proses = $pageObject->getControl("proses", $id);
		$control_proses->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing proses - end
//	processing tanggal_validasi - begin
	$condition = 1;

	if($condition)
	{
		$control_tanggal_validasi = $pageObject->getControl("tanggal_validasi", $id);
		$control_tanggal_validasi->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tanggal_validasi - end
//	processing bulan - begin
	$condition = 1;

	if($condition)
	{
		$control_bulan = $pageObject->getControl("bulan", $id);
		$control_bulan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing bulan - end
//	processing no_telp - begin
	$condition = 1;

	if($condition)
	{
		$control_no_telp = $pageObject->getControl("no_telp", $id);
		$control_no_telp->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing no_telp - end
//	processing usaha_id - begin
	$condition = 1;

	if($condition)
	{
		$control_usaha_id = $pageObject->getControl("usaha_id", $id);
		$control_usaha_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing usaha_id - end
//	processing multiple - begin
	$condition = 1;

	if($condition)
	{
		$control_multiple = $pageObject->getControl("multiple", $id);
		$control_multiple->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing multiple - end
//	processing bulan_telat - begin
	$condition = 1;

	if($condition)
	{
		$control_bulan_telat = $pageObject->getControl("bulan_telat", $id);
		$control_bulan_telat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing bulan_telat - end

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
			//	processing tahun - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tahun->afterSuccessfulSave();
				}
	//	processing tahun - end
			//	processing sptno - begin
							$condition = 1;
			
				if($condition)
				{
					$control_sptno->afterSuccessfulSave();
				}
	//	processing sptno - end
			//	processing customer_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_customer_id->afterSuccessfulSave();
				}
	//	processing customer_id - end
			//	processing customer_usaha_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_customer_usaha_id->afterSuccessfulSave();
				}
	//	processing customer_usaha_id - end
			//	processing rekening_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_rekening_id->afterSuccessfulSave();
				}
	//	processing rekening_id - end
			//	processing pajak_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pajak_id->afterSuccessfulSave();
				}
	//	processing pajak_id - end
			//	processing type_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_type_id->afterSuccessfulSave();
				}
	//	processing type_id - end
			//	processing so - begin
							$condition = 1;
			
				if($condition)
				{
					$control_so->afterSuccessfulSave();
				}
	//	processing so - end
			//	processing masadari - begin
							$condition = 1;
			
				if($condition)
				{
					$control_masadari->afterSuccessfulSave();
				}
	//	processing masadari - end
			//	processing masasd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_masasd->afterSuccessfulSave();
				}
	//	processing masasd - end
			//	processing jatuhtempotgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jatuhtempotgl->afterSuccessfulSave();
				}
	//	processing jatuhtempotgl - end
			//	processing r_bayarid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_bayarid->afterSuccessfulSave();
				}
	//	processing r_bayarid - end
			//	processing minimal_omset - begin
							$condition = 1;
			
				if($condition)
				{
					$control_minimal_omset->afterSuccessfulSave();
				}
	//	processing minimal_omset - end
			//	processing dasar - begin
							$condition = 1;
			
				if($condition)
				{
					$control_dasar->afterSuccessfulSave();
				}
	//	processing dasar - end
			//	processing tarif - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tarif->afterSuccessfulSave();
				}
	//	processing tarif - end
			//	processing denda - begin
							$condition = 1;
			
				if($condition)
				{
					$control_denda->afterSuccessfulSave();
				}
	//	processing denda - end
			//	processing bunga - begin
							$condition = 1;
			
				if($condition)
				{
					$control_bunga->afterSuccessfulSave();
				}
	//	processing bunga - end
			//	processing setoran - begin
							$condition = 1;
			
				if($condition)
				{
					$control_setoran->afterSuccessfulSave();
				}
	//	processing setoran - end
			//	processing kenaikan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kenaikan->afterSuccessfulSave();
				}
	//	processing kenaikan - end
			//	processing kompensasi - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kompensasi->afterSuccessfulSave();
				}
	//	processing kompensasi - end
			//	processing lain2 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_lain2->afterSuccessfulSave();
				}
	//	processing lain2 - end
			//	processing pajak_terhutang - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pajak_terhutang->afterSuccessfulSave();
				}
	//	processing pajak_terhutang - end
			//	processing air_manfaat_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_air_manfaat_id->afterSuccessfulSave();
				}
	//	processing air_manfaat_id - end
			//	processing air_zona_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_air_zona_id->afterSuccessfulSave();
				}
	//	processing air_zona_id - end
			//	processing meteran_awal - begin
							$condition = 1;
			
				if($condition)
				{
					$control_meteran_awal->afterSuccessfulSave();
				}
	//	processing meteran_awal - end
			//	processing meteran_akhir - begin
							$condition = 1;
			
				if($condition)
				{
					$control_meteran_akhir->afterSuccessfulSave();
				}
	//	processing meteran_akhir - end
			//	processing volume - begin
							$condition = 1;
			
				if($condition)
				{
					$control_volume->afterSuccessfulSave();
				}
	//	processing volume - end
			//	processing satuan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_satuan->afterSuccessfulSave();
				}
	//	processing satuan - end
			//	processing r_panjang - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_panjang->afterSuccessfulSave();
				}
	//	processing r_panjang - end
			//	processing r_lebar - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_lebar->afterSuccessfulSave();
				}
	//	processing r_lebar - end
			//	processing r_muka - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_muka->afterSuccessfulSave();
				}
	//	processing r_muka - end
			//	processing r_banyak - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_banyak->afterSuccessfulSave();
				}
	//	processing r_banyak - end
			//	processing r_luas - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_luas->afterSuccessfulSave();
				}
	//	processing r_luas - end
			//	processing r_tarifid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_tarifid->afterSuccessfulSave();
				}
	//	processing r_tarifid - end
			//	processing r_kontrak - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_kontrak->afterSuccessfulSave();
				}
	//	processing r_kontrak - end
			//	processing r_lama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_lama->afterSuccessfulSave();
				}
	//	processing r_lama - end
			//	processing r_jalan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_jalan_id->afterSuccessfulSave();
				}
	//	processing r_jalan_id - end
			//	processing r_jalanklas_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_jalanklas_id->afterSuccessfulSave();
				}
	//	processing r_jalanklas_id - end
			//	processing r_lokasi - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_lokasi->afterSuccessfulSave();
				}
	//	processing r_lokasi - end
			//	processing r_judul - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_judul->afterSuccessfulSave();
				}
	//	processing r_judul - end
			//	processing r_kelurahan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_kelurahan_id->afterSuccessfulSave();
				}
	//	processing r_kelurahan_id - end
			//	processing r_lokasi_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_lokasi_id->afterSuccessfulSave();
				}
	//	processing r_lokasi_id - end
			//	processing r_calculated - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_calculated->afterSuccessfulSave();
				}
	//	processing r_calculated - end
			//	processing r_nsr - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_nsr->afterSuccessfulSave();
				}
	//	processing r_nsr - end
			//	processing r_nsrno - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_nsrno->afterSuccessfulSave();
				}
	//	processing r_nsrno - end
			//	processing r_nsrtgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_nsrtgl->afterSuccessfulSave();
				}
	//	processing r_nsrtgl - end
			//	processing r_nsl_kecamatan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_nsl_kecamatan_id->afterSuccessfulSave();
				}
	//	processing r_nsl_kecamatan_id - end
			//	processing r_nsl_type_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_nsl_type_id->afterSuccessfulSave();
				}
	//	processing r_nsl_type_id - end
			//	processing r_nsl_nilai - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_nsl_nilai->afterSuccessfulSave();
				}
	//	processing r_nsl_nilai - end
			//	processing notes - begin
							$condition = 1;
			
				if($condition)
				{
					$control_notes->afterSuccessfulSave();
				}
	//	processing notes - end
			//	processing unit_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_unit_id->afterSuccessfulSave();
				}
	//	processing unit_id - end
			//	processing enabled - begin
							$condition = 1;
			
				if($condition)
				{
					$control_enabled->afterSuccessfulSave();
				}
	//	processing enabled - end
			//	processing created - begin
							$condition = 1;
			
				if($condition)
				{
					$control_created->afterSuccessfulSave();
				}
	//	processing created - end
			//	processing create_uid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_create_uid->afterSuccessfulSave();
				}
	//	processing create_uid - end
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
			//	processing terimanip - begin
							$condition = 1;
			
				if($condition)
				{
					$control_terimanip->afterSuccessfulSave();
				}
	//	processing terimanip - end
			//	processing terimatgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_terimatgl->afterSuccessfulSave();
				}
	//	processing terimatgl - end
			//	processing kirimtgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kirimtgl->afterSuccessfulSave();
				}
	//	processing kirimtgl - end
			//	processing isprint_dc - begin
							$condition = 1;
			
				if($condition)
				{
					$control_isprint_dc->afterSuccessfulSave();
				}
	//	processing isprint_dc - end
			//	processing r_nsr_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_nsr_id->afterSuccessfulSave();
				}
	//	processing r_nsr_id - end
			//	processing r_lokasi_pasang_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_lokasi_pasang_id->afterSuccessfulSave();
				}
	//	processing r_lokasi_pasang_id - end
			//	processing r_lokasi_pasang_val - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_lokasi_pasang_val->afterSuccessfulSave();
				}
	//	processing r_lokasi_pasang_val - end
			//	processing r_jalanklas_val - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_jalanklas_val->afterSuccessfulSave();
				}
	//	processing r_jalanklas_val - end
			//	processing r_sudut_pandang_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_sudut_pandang_id->afterSuccessfulSave();
				}
	//	processing r_sudut_pandang_id - end
			//	processing r_sudut_pandang_val - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_sudut_pandang_val->afterSuccessfulSave();
				}
	//	processing r_sudut_pandang_val - end
			//	processing r_tinggi - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_tinggi->afterSuccessfulSave();
				}
	//	processing r_tinggi - end
			//	processing r_njop - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_njop->afterSuccessfulSave();
				}
	//	processing r_njop - end
			//	processing r_status - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_status->afterSuccessfulSave();
				}
	//	processing r_status - end
			//	processing r_njop_ketinggian - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_njop_ketinggian->afterSuccessfulSave();
				}
	//	processing r_njop_ketinggian - end
			//	processing status_pembayaran - begin
							$condition = 1;
			
				if($condition)
				{
					$control_status_pembayaran->afterSuccessfulSave();
				}
	//	processing status_pembayaran - end
			//	processing rek_no_paneng - begin
							$condition = 1;
			
				if($condition)
				{
					$control_rek_no_paneng->afterSuccessfulSave();
				}
	//	processing rek_no_paneng - end
			//	processing sptno_lengkap - begin
							$condition = 1;
			
				if($condition)
				{
					$control_sptno_lengkap->afterSuccessfulSave();
				}
	//	processing sptno_lengkap - end
			//	processing sptno_lama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_sptno_lama->afterSuccessfulSave();
				}
	//	processing sptno_lama - end
			//	processing r_nama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_nama->afterSuccessfulSave();
				}
	//	processing r_nama - end
			//	processing r_alamat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_r_alamat->afterSuccessfulSave();
				}
	//	processing r_alamat - end
			//	processing omset1 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset1->afterSuccessfulSave();
				}
	//	processing omset1 - end
			//	processing omset2 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset2->afterSuccessfulSave();
				}
	//	processing omset2 - end
			//	processing omset3 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset3->afterSuccessfulSave();
				}
	//	processing omset3 - end
			//	processing omset4 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset4->afterSuccessfulSave();
				}
	//	processing omset4 - end
			//	processing omset5 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset5->afterSuccessfulSave();
				}
	//	processing omset5 - end
			//	processing omset6 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset6->afterSuccessfulSave();
				}
	//	processing omset6 - end
			//	processing omset7 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset7->afterSuccessfulSave();
				}
	//	processing omset7 - end
			//	processing omset8 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset8->afterSuccessfulSave();
				}
	//	processing omset8 - end
			//	processing omset9 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset9->afterSuccessfulSave();
				}
	//	processing omset9 - end
			//	processing omset10 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset10->afterSuccessfulSave();
				}
	//	processing omset10 - end
			//	processing omset11 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset11->afterSuccessfulSave();
				}
	//	processing omset11 - end
			//	processing omset12 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset12->afterSuccessfulSave();
				}
	//	processing omset12 - end
			//	processing omset13 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset13->afterSuccessfulSave();
				}
	//	processing omset13 - end
			//	processing omset14 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset14->afterSuccessfulSave();
				}
	//	processing omset14 - end
			//	processing omset15 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset15->afterSuccessfulSave();
				}
	//	processing omset15 - end
			//	processing omset16 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset16->afterSuccessfulSave();
				}
	//	processing omset16 - end
			//	processing omset17 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset17->afterSuccessfulSave();
				}
	//	processing omset17 - end
			//	processing omset18 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset18->afterSuccessfulSave();
				}
	//	processing omset18 - end
			//	processing omset19 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset19->afterSuccessfulSave();
				}
	//	processing omset19 - end
			//	processing omset20 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset20->afterSuccessfulSave();
				}
	//	processing omset20 - end
			//	processing omset21 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset21->afterSuccessfulSave();
				}
	//	processing omset21 - end
			//	processing omset22 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset22->afterSuccessfulSave();
				}
	//	processing omset22 - end
			//	processing omset23 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset23->afterSuccessfulSave();
				}
	//	processing omset23 - end
			//	processing omset24 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset24->afterSuccessfulSave();
				}
	//	processing omset24 - end
			//	processing omset25 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset25->afterSuccessfulSave();
				}
	//	processing omset25 - end
			//	processing omset26 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset26->afterSuccessfulSave();
				}
	//	processing omset26 - end
			//	processing omset27 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset27->afterSuccessfulSave();
				}
	//	processing omset27 - end
			//	processing omset28 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset28->afterSuccessfulSave();
				}
	//	processing omset28 - end
			//	processing omset29 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset29->afterSuccessfulSave();
				}
	//	processing omset29 - end
			//	processing omset30 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset30->afterSuccessfulSave();
				}
	//	processing omset30 - end
			//	processing omset31 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset31->afterSuccessfulSave();
				}
	//	processing omset31 - end
			//	processing keterangan1 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan1->afterSuccessfulSave();
				}
	//	processing keterangan1 - end
			//	processing keterangan2 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan2->afterSuccessfulSave();
				}
	//	processing keterangan2 - end
			//	processing keterangan3 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan3->afterSuccessfulSave();
				}
	//	processing keterangan3 - end
			//	processing keterangan4 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan4->afterSuccessfulSave();
				}
	//	processing keterangan4 - end
			//	processing keterangan5 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan5->afterSuccessfulSave();
				}
	//	processing keterangan5 - end
			//	processing keterangan6 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan6->afterSuccessfulSave();
				}
	//	processing keterangan6 - end
			//	processing keterangan7 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan7->afterSuccessfulSave();
				}
	//	processing keterangan7 - end
			//	processing keterangan8 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan8->afterSuccessfulSave();
				}
	//	processing keterangan8 - end
			//	processing keterangan9 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan9->afterSuccessfulSave();
				}
	//	processing keterangan9 - end
			//	processing keterangan10 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan10->afterSuccessfulSave();
				}
	//	processing keterangan10 - end
			//	processing keterangan11 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan11->afterSuccessfulSave();
				}
	//	processing keterangan11 - end
			//	processing keterangan12 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan12->afterSuccessfulSave();
				}
	//	processing keterangan12 - end
			//	processing keterangan13 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan13->afterSuccessfulSave();
				}
	//	processing keterangan13 - end
			//	processing keterangan14 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan14->afterSuccessfulSave();
				}
	//	processing keterangan14 - end
			//	processing keterangan15 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan15->afterSuccessfulSave();
				}
	//	processing keterangan15 - end
			//	processing keterangan16 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan16->afterSuccessfulSave();
				}
	//	processing keterangan16 - end
			//	processing keterangan17 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan17->afterSuccessfulSave();
				}
	//	processing keterangan17 - end
			//	processing keterangan18 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan18->afterSuccessfulSave();
				}
	//	processing keterangan18 - end
			//	processing keterangan19 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan19->afterSuccessfulSave();
				}
	//	processing keterangan19 - end
			//	processing keterangan20 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan20->afterSuccessfulSave();
				}
	//	processing keterangan20 - end
			//	processing keterangan21 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan21->afterSuccessfulSave();
				}
	//	processing keterangan21 - end
			//	processing keterangan22 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan22->afterSuccessfulSave();
				}
	//	processing keterangan22 - end
			//	processing keterangan23 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan23->afterSuccessfulSave();
				}
	//	processing keterangan23 - end
			//	processing keterangan24 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan24->afterSuccessfulSave();
				}
	//	processing keterangan24 - end
			//	processing keterangan25 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan25->afterSuccessfulSave();
				}
	//	processing keterangan25 - end
			//	processing keterangan26 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan26->afterSuccessfulSave();
				}
	//	processing keterangan26 - end
			//	processing keterangan27 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan27->afterSuccessfulSave();
				}
	//	processing keterangan27 - end
			//	processing keterangan28 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan28->afterSuccessfulSave();
				}
	//	processing keterangan28 - end
			//	processing keterangan29 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan29->afterSuccessfulSave();
				}
	//	processing keterangan29 - end
			//	processing keterangan30 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan30->afterSuccessfulSave();
				}
	//	processing keterangan30 - end
			//	processing keterangan31 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan31->afterSuccessfulSave();
				}
	//	processing keterangan31 - end
			//	processing doc_no - begin
							$condition = 1;
			
				if($condition)
				{
					$control_doc_no->afterSuccessfulSave();
				}
	//	processing doc_no - end
			//	processing cara_bayar - begin
							$condition = 1;
			
				if($condition)
				{
					$control_cara_bayar->afterSuccessfulSave();
				}
	//	processing cara_bayar - end
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
			//	processing golongan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_golongan->afterSuccessfulSave();
				}
	//	processing golongan - end
			//	processing omset_lain - begin
							$condition = 1;
			
				if($condition)
				{
					$control_omset_lain->afterSuccessfulSave();
				}
	//	processing omset_lain - end
			//	processing keterangan_lain - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan_lain->afterSuccessfulSave();
				}
	//	processing keterangan_lain - end
			//	processing ijin_no - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin_no->afterSuccessfulSave();
				}
	//	processing ijin_no - end
			//	processing jenis_masa - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jenis_masa->afterSuccessfulSave();
				}
	//	processing jenis_masa - end
			//	processing skpd_lama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_skpd_lama->afterSuccessfulSave();
				}
	//	processing skpd_lama - end
			//	processing proses - begin
							$condition = 1;
			
				if($condition)
				{
					$control_proses->afterSuccessfulSave();
				}
	//	processing proses - end
			//	processing tanggal_validasi - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tanggal_validasi->afterSuccessfulSave();
				}
	//	processing tanggal_validasi - end
			//	processing bulan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_bulan->afterSuccessfulSave();
				}
	//	processing bulan - end
			//	processing no_telp - begin
							$condition = 1;
			
				if($condition)
				{
					$control_no_telp->afterSuccessfulSave();
				}
	//	processing no_telp - end
			//	processing usaha_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_usaha_id->afterSuccessfulSave();
				}
	//	processing usaha_id - end
			//	processing multiple - begin
							$condition = 1;
			
				if($condition)
				{
					$control_multiple->afterSuccessfulSave();
				}
	//	processing multiple - end
			//	processing bulan_telat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_bulan_telat->afterSuccessfulSave();
				}
	//	processing bulan_telat - end
				
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
	header("Location: pad_pad_spt_".$pageObject->getPageType().".php?".$keyGetQ);
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
		header("Location: pad_pad_spt_list.php?a=return");
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
	$data["tahun"] = $evalues["tahun"];
	$data["sptno"] = $evalues["sptno"];
	$data["customer_id"] = $evalues["customer_id"];
	$data["customer_usaha_id"] = $evalues["customer_usaha_id"];
	$data["rekening_id"] = $evalues["rekening_id"];
	$data["pajak_id"] = $evalues["pajak_id"];
	$data["type_id"] = $evalues["type_id"];
	$data["so"] = $evalues["so"];
	$data["masadari"] = $evalues["masadari"];
	$data["masasd"] = $evalues["masasd"];
	$data["jatuhtempotgl"] = $evalues["jatuhtempotgl"];
	$data["r_bayarid"] = $evalues["r_bayarid"];
	$data["minimal_omset"] = $evalues["minimal_omset"];
	$data["dasar"] = $evalues["dasar"];
	$data["tarif"] = $evalues["tarif"];
	$data["denda"] = $evalues["denda"];
	$data["bunga"] = $evalues["bunga"];
	$data["setoran"] = $evalues["setoran"];
	$data["kenaikan"] = $evalues["kenaikan"];
	$data["kompensasi"] = $evalues["kompensasi"];
	$data["lain2"] = $evalues["lain2"];
	$data["pajak_terhutang"] = $evalues["pajak_terhutang"];
	$data["air_manfaat_id"] = $evalues["air_manfaat_id"];
	$data["air_zona_id"] = $evalues["air_zona_id"];
	$data["meteran_awal"] = $evalues["meteran_awal"];
	$data["meteran_akhir"] = $evalues["meteran_akhir"];
	$data["volume"] = $evalues["volume"];
	$data["satuan"] = $evalues["satuan"];
	$data["r_panjang"] = $evalues["r_panjang"];
	$data["r_lebar"] = $evalues["r_lebar"];
	$data["r_muka"] = $evalues["r_muka"];
	$data["r_banyak"] = $evalues["r_banyak"];
	$data["r_luas"] = $evalues["r_luas"];
	$data["r_tarifid"] = $evalues["r_tarifid"];
	$data["r_kontrak"] = $evalues["r_kontrak"];
	$data["r_lama"] = $evalues["r_lama"];
	$data["r_jalan_id"] = $evalues["r_jalan_id"];
	$data["r_jalanklas_id"] = $evalues["r_jalanklas_id"];
	$data["r_lokasi"] = $evalues["r_lokasi"];
	$data["r_judul"] = $evalues["r_judul"];
	$data["r_kelurahan_id"] = $evalues["r_kelurahan_id"];
	$data["r_lokasi_id"] = $evalues["r_lokasi_id"];
	$data["r_calculated"] = $evalues["r_calculated"];
	$data["r_nsr"] = $evalues["r_nsr"];
	$data["r_nsrno"] = $evalues["r_nsrno"];
	$data["r_nsrtgl"] = $evalues["r_nsrtgl"];
	$data["r_nsl_kecamatan_id"] = $evalues["r_nsl_kecamatan_id"];
	$data["r_nsl_type_id"] = $evalues["r_nsl_type_id"];
	$data["r_nsl_nilai"] = $evalues["r_nsl_nilai"];
	$data["notes"] = $evalues["notes"];
	$data["unit_id"] = $evalues["unit_id"];
	$data["enabled"] = $evalues["enabled"];
	$data["created"] = $evalues["created"];
	$data["create_uid"] = $evalues["create_uid"];
	$data["updated"] = $evalues["updated"];
	$data["update_uid"] = $evalues["update_uid"];
	$data["terimanip"] = $evalues["terimanip"];
	$data["terimatgl"] = $evalues["terimatgl"];
	$data["kirimtgl"] = $evalues["kirimtgl"];
	$data["isprint_dc"] = $evalues["isprint_dc"];
	$data["r_nsr_id"] = $evalues["r_nsr_id"];
	$data["r_lokasi_pasang_id"] = $evalues["r_lokasi_pasang_id"];
	$data["r_lokasi_pasang_val"] = $evalues["r_lokasi_pasang_val"];
	$data["r_jalanklas_val"] = $evalues["r_jalanklas_val"];
	$data["r_sudut_pandang_id"] = $evalues["r_sudut_pandang_id"];
	$data["r_sudut_pandang_val"] = $evalues["r_sudut_pandang_val"];
	$data["r_tinggi"] = $evalues["r_tinggi"];
	$data["r_njop"] = $evalues["r_njop"];
	$data["r_status"] = $evalues["r_status"];
	$data["r_njop_ketinggian"] = $evalues["r_njop_ketinggian"];
	$data["status_pembayaran"] = $evalues["status_pembayaran"];
	$data["rek_no_paneng"] = $evalues["rek_no_paneng"];
	$data["sptno_lengkap"] = $evalues["sptno_lengkap"];
	$data["sptno_lama"] = $evalues["sptno_lama"];
	$data["r_nama"] = $evalues["r_nama"];
	$data["r_alamat"] = $evalues["r_alamat"];
	$data["omset1"] = $evalues["omset1"];
	$data["omset2"] = $evalues["omset2"];
	$data["omset3"] = $evalues["omset3"];
	$data["omset4"] = $evalues["omset4"];
	$data["omset5"] = $evalues["omset5"];
	$data["omset6"] = $evalues["omset6"];
	$data["omset7"] = $evalues["omset7"];
	$data["omset8"] = $evalues["omset8"];
	$data["omset9"] = $evalues["omset9"];
	$data["omset10"] = $evalues["omset10"];
	$data["omset11"] = $evalues["omset11"];
	$data["omset12"] = $evalues["omset12"];
	$data["omset13"] = $evalues["omset13"];
	$data["omset14"] = $evalues["omset14"];
	$data["omset15"] = $evalues["omset15"];
	$data["omset16"] = $evalues["omset16"];
	$data["omset17"] = $evalues["omset17"];
	$data["omset18"] = $evalues["omset18"];
	$data["omset19"] = $evalues["omset19"];
	$data["omset20"] = $evalues["omset20"];
	$data["omset21"] = $evalues["omset21"];
	$data["omset22"] = $evalues["omset22"];
	$data["omset23"] = $evalues["omset23"];
	$data["omset24"] = $evalues["omset24"];
	$data["omset25"] = $evalues["omset25"];
	$data["omset26"] = $evalues["omset26"];
	$data["omset27"] = $evalues["omset27"];
	$data["omset28"] = $evalues["omset28"];
	$data["omset29"] = $evalues["omset29"];
	$data["omset30"] = $evalues["omset30"];
	$data["omset31"] = $evalues["omset31"];
	$data["keterangan1"] = $evalues["keterangan1"];
	$data["keterangan2"] = $evalues["keterangan2"];
	$data["keterangan3"] = $evalues["keterangan3"];
	$data["keterangan4"] = $evalues["keterangan4"];
	$data["keterangan5"] = $evalues["keterangan5"];
	$data["keterangan6"] = $evalues["keterangan6"];
	$data["keterangan7"] = $evalues["keterangan7"];
	$data["keterangan8"] = $evalues["keterangan8"];
	$data["keterangan9"] = $evalues["keterangan9"];
	$data["keterangan10"] = $evalues["keterangan10"];
	$data["keterangan11"] = $evalues["keterangan11"];
	$data["keterangan12"] = $evalues["keterangan12"];
	$data["keterangan13"] = $evalues["keterangan13"];
	$data["keterangan14"] = $evalues["keterangan14"];
	$data["keterangan15"] = $evalues["keterangan15"];
	$data["keterangan16"] = $evalues["keterangan16"];
	$data["keterangan17"] = $evalues["keterangan17"];
	$data["keterangan18"] = $evalues["keterangan18"];
	$data["keterangan19"] = $evalues["keterangan19"];
	$data["keterangan20"] = $evalues["keterangan20"];
	$data["keterangan21"] = $evalues["keterangan21"];
	$data["keterangan22"] = $evalues["keterangan22"];
	$data["keterangan23"] = $evalues["keterangan23"];
	$data["keterangan24"] = $evalues["keterangan24"];
	$data["keterangan25"] = $evalues["keterangan25"];
	$data["keterangan26"] = $evalues["keterangan26"];
	$data["keterangan27"] = $evalues["keterangan27"];
	$data["keterangan28"] = $evalues["keterangan28"];
	$data["keterangan29"] = $evalues["keterangan29"];
	$data["keterangan30"] = $evalues["keterangan30"];
	$data["keterangan31"] = $evalues["keterangan31"];
	$data["doc_no"] = $evalues["doc_no"];
	$data["cara_bayar"] = $evalues["cara_bayar"];
	$data["kelompok_usaha_id"] = $evalues["kelompok_usaha_id"];
	$data["zona_id"] = $evalues["zona_id"];
	$data["manfaat_id"] = $evalues["manfaat_id"];
	$data["golongan"] = $evalues["golongan"];
	$data["omset_lain"] = $evalues["omset_lain"];
	$data["keterangan_lain"] = $evalues["keterangan_lain"];
	$data["ijin_no"] = $evalues["ijin_no"];
	$data["jenis_masa"] = $evalues["jenis_masa"];
	$data["skpd_lama"] = $evalues["skpd_lama"];
	$data["proses"] = $evalues["proses"];
	$data["tanggal_validasi"] = $evalues["tanggal_validasi"];
	$data["bulan"] = $evalues["bulan"];
	$data["no_telp"] = $evalues["no_telp"];
	$data["usaha_id"] = $evalues["usaha_id"];
	$data["multiple"] = $evalues["multiple"];
	$data["bulan_telat"] = $evalues["bulan_telat"];
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

	if(!$pageObject->isAppearOnTabs("tahun"))
		$xt->assign("tahun_fieldblock",true);
	else
		$xt->assign("tahun_tabfieldblock",true);
	$xt->assign("tahun_label",true);
	if(isEnableSection508())
		$xt->assign_section("tahun_label","<label for=\"".GetInputElementId("tahun", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("sptno"))
		$xt->assign("sptno_fieldblock",true);
	else
		$xt->assign("sptno_tabfieldblock",true);
	$xt->assign("sptno_label",true);
	if(isEnableSection508())
		$xt->assign_section("sptno_label","<label for=\"".GetInputElementId("sptno", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("customer_id"))
		$xt->assign("customer_id_fieldblock",true);
	else
		$xt->assign("customer_id_tabfieldblock",true);
	$xt->assign("customer_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("customer_id_label","<label for=\"".GetInputElementId("customer_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("customer_usaha_id"))
		$xt->assign("customer_usaha_id_fieldblock",true);
	else
		$xt->assign("customer_usaha_id_tabfieldblock",true);
	$xt->assign("customer_usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("customer_usaha_id_label","<label for=\"".GetInputElementId("customer_usaha_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("rekening_id"))
		$xt->assign("rekening_id_fieldblock",true);
	else
		$xt->assign("rekening_id_tabfieldblock",true);
	$xt->assign("rekening_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("rekening_id_label","<label for=\"".GetInputElementId("rekening_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pajak_id"))
		$xt->assign("pajak_id_fieldblock",true);
	else
		$xt->assign("pajak_id_tabfieldblock",true);
	$xt->assign("pajak_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("pajak_id_label","<label for=\"".GetInputElementId("pajak_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("type_id"))
		$xt->assign("type_id_fieldblock",true);
	else
		$xt->assign("type_id_tabfieldblock",true);
	$xt->assign("type_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("type_id_label","<label for=\"".GetInputElementId("type_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("so"))
		$xt->assign("so_fieldblock",true);
	else
		$xt->assign("so_tabfieldblock",true);
	$xt->assign("so_label",true);
	if(isEnableSection508())
		$xt->assign_section("so_label","<label for=\"".GetInputElementId("so", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("masadari"))
		$xt->assign("masadari_fieldblock",true);
	else
		$xt->assign("masadari_tabfieldblock",true);
	$xt->assign("masadari_label",true);
	if(isEnableSection508())
		$xt->assign_section("masadari_label","<label for=\"".GetInputElementId("masadari", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("masasd"))
		$xt->assign("masasd_fieldblock",true);
	else
		$xt->assign("masasd_tabfieldblock",true);
	$xt->assign("masasd_label",true);
	if(isEnableSection508())
		$xt->assign_section("masasd_label","<label for=\"".GetInputElementId("masasd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jatuhtempotgl"))
		$xt->assign("jatuhtempotgl_fieldblock",true);
	else
		$xt->assign("jatuhtempotgl_tabfieldblock",true);
	$xt->assign("jatuhtempotgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("jatuhtempotgl_label","<label for=\"".GetInputElementId("jatuhtempotgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_bayarid"))
		$xt->assign("r_bayarid_fieldblock",true);
	else
		$xt->assign("r_bayarid_tabfieldblock",true);
	$xt->assign("r_bayarid_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_bayarid_label","<label for=\"".GetInputElementId("r_bayarid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("minimal_omset"))
		$xt->assign("minimal_omset_fieldblock",true);
	else
		$xt->assign("minimal_omset_tabfieldblock",true);
	$xt->assign("minimal_omset_label",true);
	if(isEnableSection508())
		$xt->assign_section("minimal_omset_label","<label for=\"".GetInputElementId("minimal_omset", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("dasar"))
		$xt->assign("dasar_fieldblock",true);
	else
		$xt->assign("dasar_tabfieldblock",true);
	$xt->assign("dasar_label",true);
	if(isEnableSection508())
		$xt->assign_section("dasar_label","<label for=\"".GetInputElementId("dasar", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tarif"))
		$xt->assign("tarif_fieldblock",true);
	else
		$xt->assign("tarif_tabfieldblock",true);
	$xt->assign("tarif_label",true);
	if(isEnableSection508())
		$xt->assign_section("tarif_label","<label for=\"".GetInputElementId("tarif", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("denda"))
		$xt->assign("denda_fieldblock",true);
	else
		$xt->assign("denda_tabfieldblock",true);
	$xt->assign("denda_label",true);
	if(isEnableSection508())
		$xt->assign_section("denda_label","<label for=\"".GetInputElementId("denda", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("bunga"))
		$xt->assign("bunga_fieldblock",true);
	else
		$xt->assign("bunga_tabfieldblock",true);
	$xt->assign("bunga_label",true);
	if(isEnableSection508())
		$xt->assign_section("bunga_label","<label for=\"".GetInputElementId("bunga", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("setoran"))
		$xt->assign("setoran_fieldblock",true);
	else
		$xt->assign("setoran_tabfieldblock",true);
	$xt->assign("setoran_label",true);
	if(isEnableSection508())
		$xt->assign_section("setoran_label","<label for=\"".GetInputElementId("setoran", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kenaikan"))
		$xt->assign("kenaikan_fieldblock",true);
	else
		$xt->assign("kenaikan_tabfieldblock",true);
	$xt->assign("kenaikan_label",true);
	if(isEnableSection508())
		$xt->assign_section("kenaikan_label","<label for=\"".GetInputElementId("kenaikan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kompensasi"))
		$xt->assign("kompensasi_fieldblock",true);
	else
		$xt->assign("kompensasi_tabfieldblock",true);
	$xt->assign("kompensasi_label",true);
	if(isEnableSection508())
		$xt->assign_section("kompensasi_label","<label for=\"".GetInputElementId("kompensasi", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("lain2"))
		$xt->assign("lain2_fieldblock",true);
	else
		$xt->assign("lain2_tabfieldblock",true);
	$xt->assign("lain2_label",true);
	if(isEnableSection508())
		$xt->assign_section("lain2_label","<label for=\"".GetInputElementId("lain2", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pajak_terhutang"))
		$xt->assign("pajak_terhutang_fieldblock",true);
	else
		$xt->assign("pajak_terhutang_tabfieldblock",true);
	$xt->assign("pajak_terhutang_label",true);
	if(isEnableSection508())
		$xt->assign_section("pajak_terhutang_label","<label for=\"".GetInputElementId("pajak_terhutang", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("air_manfaat_id"))
		$xt->assign("air_manfaat_id_fieldblock",true);
	else
		$xt->assign("air_manfaat_id_tabfieldblock",true);
	$xt->assign("air_manfaat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("air_manfaat_id_label","<label for=\"".GetInputElementId("air_manfaat_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("air_zona_id"))
		$xt->assign("air_zona_id_fieldblock",true);
	else
		$xt->assign("air_zona_id_tabfieldblock",true);
	$xt->assign("air_zona_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("air_zona_id_label","<label for=\"".GetInputElementId("air_zona_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("meteran_awal"))
		$xt->assign("meteran_awal_fieldblock",true);
	else
		$xt->assign("meteran_awal_tabfieldblock",true);
	$xt->assign("meteran_awal_label",true);
	if(isEnableSection508())
		$xt->assign_section("meteran_awal_label","<label for=\"".GetInputElementId("meteran_awal", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("meteran_akhir"))
		$xt->assign("meteran_akhir_fieldblock",true);
	else
		$xt->assign("meteran_akhir_tabfieldblock",true);
	$xt->assign("meteran_akhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("meteran_akhir_label","<label for=\"".GetInputElementId("meteran_akhir", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("volume"))
		$xt->assign("volume_fieldblock",true);
	else
		$xt->assign("volume_tabfieldblock",true);
	$xt->assign("volume_label",true);
	if(isEnableSection508())
		$xt->assign_section("volume_label","<label for=\"".GetInputElementId("volume", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("satuan"))
		$xt->assign("satuan_fieldblock",true);
	else
		$xt->assign("satuan_tabfieldblock",true);
	$xt->assign("satuan_label",true);
	if(isEnableSection508())
		$xt->assign_section("satuan_label","<label for=\"".GetInputElementId("satuan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_panjang"))
		$xt->assign("r_panjang_fieldblock",true);
	else
		$xt->assign("r_panjang_tabfieldblock",true);
	$xt->assign("r_panjang_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_panjang_label","<label for=\"".GetInputElementId("r_panjang", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_lebar"))
		$xt->assign("r_lebar_fieldblock",true);
	else
		$xt->assign("r_lebar_tabfieldblock",true);
	$xt->assign("r_lebar_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lebar_label","<label for=\"".GetInputElementId("r_lebar", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_muka"))
		$xt->assign("r_muka_fieldblock",true);
	else
		$xt->assign("r_muka_tabfieldblock",true);
	$xt->assign("r_muka_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_muka_label","<label for=\"".GetInputElementId("r_muka", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_banyak"))
		$xt->assign("r_banyak_fieldblock",true);
	else
		$xt->assign("r_banyak_tabfieldblock",true);
	$xt->assign("r_banyak_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_banyak_label","<label for=\"".GetInputElementId("r_banyak", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_luas"))
		$xt->assign("r_luas_fieldblock",true);
	else
		$xt->assign("r_luas_tabfieldblock",true);
	$xt->assign("r_luas_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_luas_label","<label for=\"".GetInputElementId("r_luas", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_tarifid"))
		$xt->assign("r_tarifid_fieldblock",true);
	else
		$xt->assign("r_tarifid_tabfieldblock",true);
	$xt->assign("r_tarifid_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_tarifid_label","<label for=\"".GetInputElementId("r_tarifid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_kontrak"))
		$xt->assign("r_kontrak_fieldblock",true);
	else
		$xt->assign("r_kontrak_tabfieldblock",true);
	$xt->assign("r_kontrak_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_kontrak_label","<label for=\"".GetInputElementId("r_kontrak", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_lama"))
		$xt->assign("r_lama_fieldblock",true);
	else
		$xt->assign("r_lama_tabfieldblock",true);
	$xt->assign("r_lama_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lama_label","<label for=\"".GetInputElementId("r_lama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_jalan_id"))
		$xt->assign("r_jalan_id_fieldblock",true);
	else
		$xt->assign("r_jalan_id_tabfieldblock",true);
	$xt->assign("r_jalan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_jalan_id_label","<label for=\"".GetInputElementId("r_jalan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_jalanklas_id"))
		$xt->assign("r_jalanklas_id_fieldblock",true);
	else
		$xt->assign("r_jalanklas_id_tabfieldblock",true);
	$xt->assign("r_jalanklas_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_jalanklas_id_label","<label for=\"".GetInputElementId("r_jalanklas_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_lokasi"))
		$xt->assign("r_lokasi_fieldblock",true);
	else
		$xt->assign("r_lokasi_tabfieldblock",true);
	$xt->assign("r_lokasi_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_label","<label for=\"".GetInputElementId("r_lokasi", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_judul"))
		$xt->assign("r_judul_fieldblock",true);
	else
		$xt->assign("r_judul_tabfieldblock",true);
	$xt->assign("r_judul_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_judul_label","<label for=\"".GetInputElementId("r_judul", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_kelurahan_id"))
		$xt->assign("r_kelurahan_id_fieldblock",true);
	else
		$xt->assign("r_kelurahan_id_tabfieldblock",true);
	$xt->assign("r_kelurahan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_kelurahan_id_label","<label for=\"".GetInputElementId("r_kelurahan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_lokasi_id"))
		$xt->assign("r_lokasi_id_fieldblock",true);
	else
		$xt->assign("r_lokasi_id_tabfieldblock",true);
	$xt->assign("r_lokasi_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_id_label","<label for=\"".GetInputElementId("r_lokasi_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_calculated"))
		$xt->assign("r_calculated_fieldblock",true);
	else
		$xt->assign("r_calculated_tabfieldblock",true);
	$xt->assign("r_calculated_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_calculated_label","<label for=\"".GetInputElementId("r_calculated", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_nsr"))
		$xt->assign("r_nsr_fieldblock",true);
	else
		$xt->assign("r_nsr_tabfieldblock",true);
	$xt->assign("r_nsr_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsr_label","<label for=\"".GetInputElementId("r_nsr", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_nsrno"))
		$xt->assign("r_nsrno_fieldblock",true);
	else
		$xt->assign("r_nsrno_tabfieldblock",true);
	$xt->assign("r_nsrno_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsrno_label","<label for=\"".GetInputElementId("r_nsrno", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_nsrtgl"))
		$xt->assign("r_nsrtgl_fieldblock",true);
	else
		$xt->assign("r_nsrtgl_tabfieldblock",true);
	$xt->assign("r_nsrtgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsrtgl_label","<label for=\"".GetInputElementId("r_nsrtgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_nsl_kecamatan_id"))
		$xt->assign("r_nsl_kecamatan_id_fieldblock",true);
	else
		$xt->assign("r_nsl_kecamatan_id_tabfieldblock",true);
	$xt->assign("r_nsl_kecamatan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsl_kecamatan_id_label","<label for=\"".GetInputElementId("r_nsl_kecamatan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_nsl_type_id"))
		$xt->assign("r_nsl_type_id_fieldblock",true);
	else
		$xt->assign("r_nsl_type_id_tabfieldblock",true);
	$xt->assign("r_nsl_type_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsl_type_id_label","<label for=\"".GetInputElementId("r_nsl_type_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_nsl_nilai"))
		$xt->assign("r_nsl_nilai_fieldblock",true);
	else
		$xt->assign("r_nsl_nilai_tabfieldblock",true);
	$xt->assign("r_nsl_nilai_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsl_nilai_label","<label for=\"".GetInputElementId("r_nsl_nilai", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("notes"))
		$xt->assign("notes_fieldblock",true);
	else
		$xt->assign("notes_tabfieldblock",true);
	$xt->assign("notes_label",true);
	if(isEnableSection508())
		$xt->assign_section("notes_label","<label for=\"".GetInputElementId("notes", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("unit_id"))
		$xt->assign("unit_id_fieldblock",true);
	else
		$xt->assign("unit_id_tabfieldblock",true);
	$xt->assign("unit_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("unit_id_label","<label for=\"".GetInputElementId("unit_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("enabled"))
		$xt->assign("enabled_fieldblock",true);
	else
		$xt->assign("enabled_tabfieldblock",true);
	$xt->assign("enabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("enabled_label","<label for=\"".GetInputElementId("enabled", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
	$xt->assign("created_label",true);
	if(isEnableSection508())
		$xt->assign_section("created_label","<label for=\"".GetInputElementId("created", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
	$xt->assign("create_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_uid_label","<label for=\"".GetInputElementId("create_uid", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("terimanip"))
		$xt->assign("terimanip_fieldblock",true);
	else
		$xt->assign("terimanip_tabfieldblock",true);
	$xt->assign("terimanip_label",true);
	if(isEnableSection508())
		$xt->assign_section("terimanip_label","<label for=\"".GetInputElementId("terimanip", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("terimatgl"))
		$xt->assign("terimatgl_fieldblock",true);
	else
		$xt->assign("terimatgl_tabfieldblock",true);
	$xt->assign("terimatgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("terimatgl_label","<label for=\"".GetInputElementId("terimatgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kirimtgl"))
		$xt->assign("kirimtgl_fieldblock",true);
	else
		$xt->assign("kirimtgl_tabfieldblock",true);
	$xt->assign("kirimtgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("kirimtgl_label","<label for=\"".GetInputElementId("kirimtgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("isprint_dc"))
		$xt->assign("isprint_dc_fieldblock",true);
	else
		$xt->assign("isprint_dc_tabfieldblock",true);
	$xt->assign("isprint_dc_label",true);
	if(isEnableSection508())
		$xt->assign_section("isprint_dc_label","<label for=\"".GetInputElementId("isprint_dc", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_nsr_id"))
		$xt->assign("r_nsr_id_fieldblock",true);
	else
		$xt->assign("r_nsr_id_tabfieldblock",true);
	$xt->assign("r_nsr_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nsr_id_label","<label for=\"".GetInputElementId("r_nsr_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_lokasi_pasang_id"))
		$xt->assign("r_lokasi_pasang_id_fieldblock",true);
	else
		$xt->assign("r_lokasi_pasang_id_tabfieldblock",true);
	$xt->assign("r_lokasi_pasang_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_pasang_id_label","<label for=\"".GetInputElementId("r_lokasi_pasang_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_lokasi_pasang_val"))
		$xt->assign("r_lokasi_pasang_val_fieldblock",true);
	else
		$xt->assign("r_lokasi_pasang_val_tabfieldblock",true);
	$xt->assign("r_lokasi_pasang_val_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_pasang_val_label","<label for=\"".GetInputElementId("r_lokasi_pasang_val", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_jalanklas_val"))
		$xt->assign("r_jalanklas_val_fieldblock",true);
	else
		$xt->assign("r_jalanklas_val_tabfieldblock",true);
	$xt->assign("r_jalanklas_val_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_jalanklas_val_label","<label for=\"".GetInputElementId("r_jalanklas_val", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_sudut_pandang_id"))
		$xt->assign("r_sudut_pandang_id_fieldblock",true);
	else
		$xt->assign("r_sudut_pandang_id_tabfieldblock",true);
	$xt->assign("r_sudut_pandang_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_sudut_pandang_id_label","<label for=\"".GetInputElementId("r_sudut_pandang_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_sudut_pandang_val"))
		$xt->assign("r_sudut_pandang_val_fieldblock",true);
	else
		$xt->assign("r_sudut_pandang_val_tabfieldblock",true);
	$xt->assign("r_sudut_pandang_val_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_sudut_pandang_val_label","<label for=\"".GetInputElementId("r_sudut_pandang_val", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_tinggi"))
		$xt->assign("r_tinggi_fieldblock",true);
	else
		$xt->assign("r_tinggi_tabfieldblock",true);
	$xt->assign("r_tinggi_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_tinggi_label","<label for=\"".GetInputElementId("r_tinggi", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_njop"))
		$xt->assign("r_njop_fieldblock",true);
	else
		$xt->assign("r_njop_tabfieldblock",true);
	$xt->assign("r_njop_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_njop_label","<label for=\"".GetInputElementId("r_njop", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_status"))
		$xt->assign("r_status_fieldblock",true);
	else
		$xt->assign("r_status_tabfieldblock",true);
	$xt->assign("r_status_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_status_label","<label for=\"".GetInputElementId("r_status", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_njop_ketinggian"))
		$xt->assign("r_njop_ketinggian_fieldblock",true);
	else
		$xt->assign("r_njop_ketinggian_tabfieldblock",true);
	$xt->assign("r_njop_ketinggian_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_njop_ketinggian_label","<label for=\"".GetInputElementId("r_njop_ketinggian", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("status_pembayaran"))
		$xt->assign("status_pembayaran_fieldblock",true);
	else
		$xt->assign("status_pembayaran_tabfieldblock",true);
	$xt->assign("status_pembayaran_label",true);
	if(isEnableSection508())
		$xt->assign_section("status_pembayaran_label","<label for=\"".GetInputElementId("status_pembayaran", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("rek_no_paneng"))
		$xt->assign("rek_no_paneng_fieldblock",true);
	else
		$xt->assign("rek_no_paneng_tabfieldblock",true);
	$xt->assign("rek_no_paneng_label",true);
	if(isEnableSection508())
		$xt->assign_section("rek_no_paneng_label","<label for=\"".GetInputElementId("rek_no_paneng", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("sptno_lengkap"))
		$xt->assign("sptno_lengkap_fieldblock",true);
	else
		$xt->assign("sptno_lengkap_tabfieldblock",true);
	$xt->assign("sptno_lengkap_label",true);
	if(isEnableSection508())
		$xt->assign_section("sptno_lengkap_label","<label for=\"".GetInputElementId("sptno_lengkap", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("sptno_lama"))
		$xt->assign("sptno_lama_fieldblock",true);
	else
		$xt->assign("sptno_lama_tabfieldblock",true);
	$xt->assign("sptno_lama_label",true);
	if(isEnableSection508())
		$xt->assign_section("sptno_lama_label","<label for=\"".GetInputElementId("sptno_lama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_nama"))
		$xt->assign("r_nama_fieldblock",true);
	else
		$xt->assign("r_nama_tabfieldblock",true);
	$xt->assign("r_nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_nama_label","<label for=\"".GetInputElementId("r_nama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("r_alamat"))
		$xt->assign("r_alamat_fieldblock",true);
	else
		$xt->assign("r_alamat_tabfieldblock",true);
	$xt->assign("r_alamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("r_alamat_label","<label for=\"".GetInputElementId("r_alamat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset1"))
		$xt->assign("omset1_fieldblock",true);
	else
		$xt->assign("omset1_tabfieldblock",true);
	$xt->assign("omset1_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset1_label","<label for=\"".GetInputElementId("omset1", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset2"))
		$xt->assign("omset2_fieldblock",true);
	else
		$xt->assign("omset2_tabfieldblock",true);
	$xt->assign("omset2_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset2_label","<label for=\"".GetInputElementId("omset2", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset3"))
		$xt->assign("omset3_fieldblock",true);
	else
		$xt->assign("omset3_tabfieldblock",true);
	$xt->assign("omset3_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset3_label","<label for=\"".GetInputElementId("omset3", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset4"))
		$xt->assign("omset4_fieldblock",true);
	else
		$xt->assign("omset4_tabfieldblock",true);
	$xt->assign("omset4_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset4_label","<label for=\"".GetInputElementId("omset4", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset5"))
		$xt->assign("omset5_fieldblock",true);
	else
		$xt->assign("omset5_tabfieldblock",true);
	$xt->assign("omset5_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset5_label","<label for=\"".GetInputElementId("omset5", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset6"))
		$xt->assign("omset6_fieldblock",true);
	else
		$xt->assign("omset6_tabfieldblock",true);
	$xt->assign("omset6_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset6_label","<label for=\"".GetInputElementId("omset6", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset7"))
		$xt->assign("omset7_fieldblock",true);
	else
		$xt->assign("omset7_tabfieldblock",true);
	$xt->assign("omset7_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset7_label","<label for=\"".GetInputElementId("omset7", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset8"))
		$xt->assign("omset8_fieldblock",true);
	else
		$xt->assign("omset8_tabfieldblock",true);
	$xt->assign("omset8_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset8_label","<label for=\"".GetInputElementId("omset8", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset9"))
		$xt->assign("omset9_fieldblock",true);
	else
		$xt->assign("omset9_tabfieldblock",true);
	$xt->assign("omset9_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset9_label","<label for=\"".GetInputElementId("omset9", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset10"))
		$xt->assign("omset10_fieldblock",true);
	else
		$xt->assign("omset10_tabfieldblock",true);
	$xt->assign("omset10_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset10_label","<label for=\"".GetInputElementId("omset10", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset11"))
		$xt->assign("omset11_fieldblock",true);
	else
		$xt->assign("omset11_tabfieldblock",true);
	$xt->assign("omset11_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset11_label","<label for=\"".GetInputElementId("omset11", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset12"))
		$xt->assign("omset12_fieldblock",true);
	else
		$xt->assign("omset12_tabfieldblock",true);
	$xt->assign("omset12_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset12_label","<label for=\"".GetInputElementId("omset12", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset13"))
		$xt->assign("omset13_fieldblock",true);
	else
		$xt->assign("omset13_tabfieldblock",true);
	$xt->assign("omset13_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset13_label","<label for=\"".GetInputElementId("omset13", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset14"))
		$xt->assign("omset14_fieldblock",true);
	else
		$xt->assign("omset14_tabfieldblock",true);
	$xt->assign("omset14_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset14_label","<label for=\"".GetInputElementId("omset14", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset15"))
		$xt->assign("omset15_fieldblock",true);
	else
		$xt->assign("omset15_tabfieldblock",true);
	$xt->assign("omset15_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset15_label","<label for=\"".GetInputElementId("omset15", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset16"))
		$xt->assign("omset16_fieldblock",true);
	else
		$xt->assign("omset16_tabfieldblock",true);
	$xt->assign("omset16_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset16_label","<label for=\"".GetInputElementId("omset16", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset17"))
		$xt->assign("omset17_fieldblock",true);
	else
		$xt->assign("omset17_tabfieldblock",true);
	$xt->assign("omset17_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset17_label","<label for=\"".GetInputElementId("omset17", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset18"))
		$xt->assign("omset18_fieldblock",true);
	else
		$xt->assign("omset18_tabfieldblock",true);
	$xt->assign("omset18_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset18_label","<label for=\"".GetInputElementId("omset18", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset19"))
		$xt->assign("omset19_fieldblock",true);
	else
		$xt->assign("omset19_tabfieldblock",true);
	$xt->assign("omset19_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset19_label","<label for=\"".GetInputElementId("omset19", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset20"))
		$xt->assign("omset20_fieldblock",true);
	else
		$xt->assign("omset20_tabfieldblock",true);
	$xt->assign("omset20_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset20_label","<label for=\"".GetInputElementId("omset20", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset21"))
		$xt->assign("omset21_fieldblock",true);
	else
		$xt->assign("omset21_tabfieldblock",true);
	$xt->assign("omset21_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset21_label","<label for=\"".GetInputElementId("omset21", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset22"))
		$xt->assign("omset22_fieldblock",true);
	else
		$xt->assign("omset22_tabfieldblock",true);
	$xt->assign("omset22_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset22_label","<label for=\"".GetInputElementId("omset22", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset23"))
		$xt->assign("omset23_fieldblock",true);
	else
		$xt->assign("omset23_tabfieldblock",true);
	$xt->assign("omset23_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset23_label","<label for=\"".GetInputElementId("omset23", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset24"))
		$xt->assign("omset24_fieldblock",true);
	else
		$xt->assign("omset24_tabfieldblock",true);
	$xt->assign("omset24_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset24_label","<label for=\"".GetInputElementId("omset24", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset25"))
		$xt->assign("omset25_fieldblock",true);
	else
		$xt->assign("omset25_tabfieldblock",true);
	$xt->assign("omset25_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset25_label","<label for=\"".GetInputElementId("omset25", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset26"))
		$xt->assign("omset26_fieldblock",true);
	else
		$xt->assign("omset26_tabfieldblock",true);
	$xt->assign("omset26_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset26_label","<label for=\"".GetInputElementId("omset26", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset27"))
		$xt->assign("omset27_fieldblock",true);
	else
		$xt->assign("omset27_tabfieldblock",true);
	$xt->assign("omset27_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset27_label","<label for=\"".GetInputElementId("omset27", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset28"))
		$xt->assign("omset28_fieldblock",true);
	else
		$xt->assign("omset28_tabfieldblock",true);
	$xt->assign("omset28_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset28_label","<label for=\"".GetInputElementId("omset28", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset29"))
		$xt->assign("omset29_fieldblock",true);
	else
		$xt->assign("omset29_tabfieldblock",true);
	$xt->assign("omset29_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset29_label","<label for=\"".GetInputElementId("omset29", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset30"))
		$xt->assign("omset30_fieldblock",true);
	else
		$xt->assign("omset30_tabfieldblock",true);
	$xt->assign("omset30_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset30_label","<label for=\"".GetInputElementId("omset30", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset31"))
		$xt->assign("omset31_fieldblock",true);
	else
		$xt->assign("omset31_tabfieldblock",true);
	$xt->assign("omset31_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset31_label","<label for=\"".GetInputElementId("omset31", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan1"))
		$xt->assign("keterangan1_fieldblock",true);
	else
		$xt->assign("keterangan1_tabfieldblock",true);
	$xt->assign("keterangan1_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan1_label","<label for=\"".GetInputElementId("keterangan1", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan2"))
		$xt->assign("keterangan2_fieldblock",true);
	else
		$xt->assign("keterangan2_tabfieldblock",true);
	$xt->assign("keterangan2_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan2_label","<label for=\"".GetInputElementId("keterangan2", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan3"))
		$xt->assign("keterangan3_fieldblock",true);
	else
		$xt->assign("keterangan3_tabfieldblock",true);
	$xt->assign("keterangan3_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan3_label","<label for=\"".GetInputElementId("keterangan3", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan4"))
		$xt->assign("keterangan4_fieldblock",true);
	else
		$xt->assign("keterangan4_tabfieldblock",true);
	$xt->assign("keterangan4_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan4_label","<label for=\"".GetInputElementId("keterangan4", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan5"))
		$xt->assign("keterangan5_fieldblock",true);
	else
		$xt->assign("keterangan5_tabfieldblock",true);
	$xt->assign("keterangan5_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan5_label","<label for=\"".GetInputElementId("keterangan5", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan6"))
		$xt->assign("keterangan6_fieldblock",true);
	else
		$xt->assign("keterangan6_tabfieldblock",true);
	$xt->assign("keterangan6_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan6_label","<label for=\"".GetInputElementId("keterangan6", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan7"))
		$xt->assign("keterangan7_fieldblock",true);
	else
		$xt->assign("keterangan7_tabfieldblock",true);
	$xt->assign("keterangan7_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan7_label","<label for=\"".GetInputElementId("keterangan7", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan8"))
		$xt->assign("keterangan8_fieldblock",true);
	else
		$xt->assign("keterangan8_tabfieldblock",true);
	$xt->assign("keterangan8_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan8_label","<label for=\"".GetInputElementId("keterangan8", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan9"))
		$xt->assign("keterangan9_fieldblock",true);
	else
		$xt->assign("keterangan9_tabfieldblock",true);
	$xt->assign("keterangan9_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan9_label","<label for=\"".GetInputElementId("keterangan9", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan10"))
		$xt->assign("keterangan10_fieldblock",true);
	else
		$xt->assign("keterangan10_tabfieldblock",true);
	$xt->assign("keterangan10_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan10_label","<label for=\"".GetInputElementId("keterangan10", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan11"))
		$xt->assign("keterangan11_fieldblock",true);
	else
		$xt->assign("keterangan11_tabfieldblock",true);
	$xt->assign("keterangan11_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan11_label","<label for=\"".GetInputElementId("keterangan11", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan12"))
		$xt->assign("keterangan12_fieldblock",true);
	else
		$xt->assign("keterangan12_tabfieldblock",true);
	$xt->assign("keterangan12_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan12_label","<label for=\"".GetInputElementId("keterangan12", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan13"))
		$xt->assign("keterangan13_fieldblock",true);
	else
		$xt->assign("keterangan13_tabfieldblock",true);
	$xt->assign("keterangan13_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan13_label","<label for=\"".GetInputElementId("keterangan13", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan14"))
		$xt->assign("keterangan14_fieldblock",true);
	else
		$xt->assign("keterangan14_tabfieldblock",true);
	$xt->assign("keterangan14_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan14_label","<label for=\"".GetInputElementId("keterangan14", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan15"))
		$xt->assign("keterangan15_fieldblock",true);
	else
		$xt->assign("keterangan15_tabfieldblock",true);
	$xt->assign("keterangan15_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan15_label","<label for=\"".GetInputElementId("keterangan15", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan16"))
		$xt->assign("keterangan16_fieldblock",true);
	else
		$xt->assign("keterangan16_tabfieldblock",true);
	$xt->assign("keterangan16_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan16_label","<label for=\"".GetInputElementId("keterangan16", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan17"))
		$xt->assign("keterangan17_fieldblock",true);
	else
		$xt->assign("keterangan17_tabfieldblock",true);
	$xt->assign("keterangan17_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan17_label","<label for=\"".GetInputElementId("keterangan17", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan18"))
		$xt->assign("keterangan18_fieldblock",true);
	else
		$xt->assign("keterangan18_tabfieldblock",true);
	$xt->assign("keterangan18_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan18_label","<label for=\"".GetInputElementId("keterangan18", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan19"))
		$xt->assign("keterangan19_fieldblock",true);
	else
		$xt->assign("keterangan19_tabfieldblock",true);
	$xt->assign("keterangan19_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan19_label","<label for=\"".GetInputElementId("keterangan19", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan20"))
		$xt->assign("keterangan20_fieldblock",true);
	else
		$xt->assign("keterangan20_tabfieldblock",true);
	$xt->assign("keterangan20_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan20_label","<label for=\"".GetInputElementId("keterangan20", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan21"))
		$xt->assign("keterangan21_fieldblock",true);
	else
		$xt->assign("keterangan21_tabfieldblock",true);
	$xt->assign("keterangan21_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan21_label","<label for=\"".GetInputElementId("keterangan21", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan22"))
		$xt->assign("keterangan22_fieldblock",true);
	else
		$xt->assign("keterangan22_tabfieldblock",true);
	$xt->assign("keterangan22_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan22_label","<label for=\"".GetInputElementId("keterangan22", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan23"))
		$xt->assign("keterangan23_fieldblock",true);
	else
		$xt->assign("keterangan23_tabfieldblock",true);
	$xt->assign("keterangan23_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan23_label","<label for=\"".GetInputElementId("keterangan23", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan24"))
		$xt->assign("keterangan24_fieldblock",true);
	else
		$xt->assign("keterangan24_tabfieldblock",true);
	$xt->assign("keterangan24_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan24_label","<label for=\"".GetInputElementId("keterangan24", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan25"))
		$xt->assign("keterangan25_fieldblock",true);
	else
		$xt->assign("keterangan25_tabfieldblock",true);
	$xt->assign("keterangan25_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan25_label","<label for=\"".GetInputElementId("keterangan25", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan26"))
		$xt->assign("keterangan26_fieldblock",true);
	else
		$xt->assign("keterangan26_tabfieldblock",true);
	$xt->assign("keterangan26_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan26_label","<label for=\"".GetInputElementId("keterangan26", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan27"))
		$xt->assign("keterangan27_fieldblock",true);
	else
		$xt->assign("keterangan27_tabfieldblock",true);
	$xt->assign("keterangan27_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan27_label","<label for=\"".GetInputElementId("keterangan27", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan28"))
		$xt->assign("keterangan28_fieldblock",true);
	else
		$xt->assign("keterangan28_tabfieldblock",true);
	$xt->assign("keterangan28_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan28_label","<label for=\"".GetInputElementId("keterangan28", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan29"))
		$xt->assign("keterangan29_fieldblock",true);
	else
		$xt->assign("keterangan29_tabfieldblock",true);
	$xt->assign("keterangan29_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan29_label","<label for=\"".GetInputElementId("keterangan29", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan30"))
		$xt->assign("keterangan30_fieldblock",true);
	else
		$xt->assign("keterangan30_tabfieldblock",true);
	$xt->assign("keterangan30_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan30_label","<label for=\"".GetInputElementId("keterangan30", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan31"))
		$xt->assign("keterangan31_fieldblock",true);
	else
		$xt->assign("keterangan31_tabfieldblock",true);
	$xt->assign("keterangan31_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan31_label","<label for=\"".GetInputElementId("keterangan31", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("doc_no"))
		$xt->assign("doc_no_fieldblock",true);
	else
		$xt->assign("doc_no_tabfieldblock",true);
	$xt->assign("doc_no_label",true);
	if(isEnableSection508())
		$xt->assign_section("doc_no_label","<label for=\"".GetInputElementId("doc_no", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("cara_bayar"))
		$xt->assign("cara_bayar_fieldblock",true);
	else
		$xt->assign("cara_bayar_tabfieldblock",true);
	$xt->assign("cara_bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("cara_bayar_label","<label for=\"".GetInputElementId("cara_bayar", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("golongan"))
		$xt->assign("golongan_fieldblock",true);
	else
		$xt->assign("golongan_tabfieldblock",true);
	$xt->assign("golongan_label",true);
	if(isEnableSection508())
		$xt->assign_section("golongan_label","<label for=\"".GetInputElementId("golongan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("omset_lain"))
		$xt->assign("omset_lain_fieldblock",true);
	else
		$xt->assign("omset_lain_tabfieldblock",true);
	$xt->assign("omset_lain_label",true);
	if(isEnableSection508())
		$xt->assign_section("omset_lain_label","<label for=\"".GetInputElementId("omset_lain", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan_lain"))
		$xt->assign("keterangan_lain_fieldblock",true);
	else
		$xt->assign("keterangan_lain_tabfieldblock",true);
	$xt->assign("keterangan_lain_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan_lain_label","<label for=\"".GetInputElementId("keterangan_lain", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin_no"))
		$xt->assign("ijin_no_fieldblock",true);
	else
		$xt->assign("ijin_no_tabfieldblock",true);
	$xt->assign("ijin_no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin_no_label","<label for=\"".GetInputElementId("ijin_no", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jenis_masa"))
		$xt->assign("jenis_masa_fieldblock",true);
	else
		$xt->assign("jenis_masa_tabfieldblock",true);
	$xt->assign("jenis_masa_label",true);
	if(isEnableSection508())
		$xt->assign_section("jenis_masa_label","<label for=\"".GetInputElementId("jenis_masa", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("skpd_lama"))
		$xt->assign("skpd_lama_fieldblock",true);
	else
		$xt->assign("skpd_lama_tabfieldblock",true);
	$xt->assign("skpd_lama_label",true);
	if(isEnableSection508())
		$xt->assign_section("skpd_lama_label","<label for=\"".GetInputElementId("skpd_lama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("proses"))
		$xt->assign("proses_fieldblock",true);
	else
		$xt->assign("proses_tabfieldblock",true);
	$xt->assign("proses_label",true);
	if(isEnableSection508())
		$xt->assign_section("proses_label","<label for=\"".GetInputElementId("proses", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tanggal_validasi"))
		$xt->assign("tanggal_validasi_fieldblock",true);
	else
		$xt->assign("tanggal_validasi_tabfieldblock",true);
	$xt->assign("tanggal_validasi_label",true);
	if(isEnableSection508())
		$xt->assign_section("tanggal_validasi_label","<label for=\"".GetInputElementId("tanggal_validasi", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("bulan"))
		$xt->assign("bulan_fieldblock",true);
	else
		$xt->assign("bulan_tabfieldblock",true);
	$xt->assign("bulan_label",true);
	if(isEnableSection508())
		$xt->assign_section("bulan_label","<label for=\"".GetInputElementId("bulan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("no_telp"))
		$xt->assign("no_telp_fieldblock",true);
	else
		$xt->assign("no_telp_tabfieldblock",true);
	$xt->assign("no_telp_label",true);
	if(isEnableSection508())
		$xt->assign_section("no_telp_label","<label for=\"".GetInputElementId("no_telp", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("usaha_id"))
		$xt->assign("usaha_id_fieldblock",true);
	else
		$xt->assign("usaha_id_tabfieldblock",true);
	$xt->assign("usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("usaha_id_label","<label for=\"".GetInputElementId("usaha_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("multiple"))
		$xt->assign("multiple_fieldblock",true);
	else
		$xt->assign("multiple_tabfieldblock",true);
	$xt->assign("multiple_label",true);
	if(isEnableSection508())
		$xt->assign_section("multiple_label","<label for=\"".GetInputElementId("multiple", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("bulan_telat"))
		$xt->assign("bulan_telat_fieldblock",true);
	else
		$xt->assign("bulan_telat_tabfieldblock",true);
	$xt->assign("bulan_telat_label",true);
	if(isEnableSection508())
		$xt->assign_section("bulan_telat_label","<label for=\"".GetInputElementId("bulan_telat", $id, PAGE_EDIT)."\">","</label>");
		

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
	$showDetailKeys["pad.pad_air_tanah_hit"]["masterkey1"] = $data["id"];		
	$showDetailKeys["pad.pad_stpd"]["masterkey1"] = $data["id"];		

	$keylink = "";
	$keylink.= "&key1=".htmlspecialchars(rawurlencode(@$data["id"]));


//	id - 
	$value = $pageObject->showDBValue("id", $data, $keylink);
	$showValues["id"] = $value;
	$showFields[] = "id";
		$showRawValues["id"] = substr($data["id"],0,100);

//	tahun - 
	$value = $pageObject->showDBValue("tahun", $data, $keylink);
	$showValues["tahun"] = $value;
	$showFields[] = "tahun";
		$showRawValues["tahun"] = substr($data["tahun"],0,100);

//	sptno - 
	$value = $pageObject->showDBValue("sptno", $data, $keylink);
	$showValues["sptno"] = $value;
	$showFields[] = "sptno";
		$showRawValues["sptno"] = substr($data["sptno"],0,100);

//	customer_id - 
	$value = $pageObject->showDBValue("customer_id", $data, $keylink);
	$showValues["customer_id"] = $value;
	$showFields[] = "customer_id";
		$showRawValues["customer_id"] = substr($data["customer_id"],0,100);

//	customer_usaha_id - 
	$value = $pageObject->showDBValue("customer_usaha_id", $data, $keylink);
	$showValues["customer_usaha_id"] = $value;
	$showFields[] = "customer_usaha_id";
		$showRawValues["customer_usaha_id"] = substr($data["customer_usaha_id"],0,100);

//	rekening_id - 
	$value = $pageObject->showDBValue("rekening_id", $data, $keylink);
	$showValues["rekening_id"] = $value;
	$showFields[] = "rekening_id";
		$showRawValues["rekening_id"] = substr($data["rekening_id"],0,100);

//	pajak_id - 
	$value = $pageObject->showDBValue("pajak_id", $data, $keylink);
	$showValues["pajak_id"] = $value;
	$showFields[] = "pajak_id";
		$showRawValues["pajak_id"] = substr($data["pajak_id"],0,100);

//	type_id - 
	$value = $pageObject->showDBValue("type_id", $data, $keylink);
	$showValues["type_id"] = $value;
	$showFields[] = "type_id";
		$showRawValues["type_id"] = substr($data["type_id"],0,100);

//	so - 
	$value = $pageObject->showDBValue("so", $data, $keylink);
	$showValues["so"] = $value;
	$showFields[] = "so";
		$showRawValues["so"] = substr($data["so"],0,100);

//	masadari - Short Date
	$value = $pageObject->showDBValue("masadari", $data, $keylink);
	$showValues["masadari"] = $value;
	$showFields[] = "masadari";
		$showRawValues["masadari"] = substr($data["masadari"],0,100);

//	masasd - Short Date
	$value = $pageObject->showDBValue("masasd", $data, $keylink);
	$showValues["masasd"] = $value;
	$showFields[] = "masasd";
		$showRawValues["masasd"] = substr($data["masasd"],0,100);

//	jatuhtempotgl - Short Date
	$value = $pageObject->showDBValue("jatuhtempotgl", $data, $keylink);
	$showValues["jatuhtempotgl"] = $value;
	$showFields[] = "jatuhtempotgl";
		$showRawValues["jatuhtempotgl"] = substr($data["jatuhtempotgl"],0,100);

//	r_bayarid - 
	$value = $pageObject->showDBValue("r_bayarid", $data, $keylink);
	$showValues["r_bayarid"] = $value;
	$showFields[] = "r_bayarid";
		$showRawValues["r_bayarid"] = substr($data["r_bayarid"],0,100);

//	minimal_omset - Number
	$value = $pageObject->showDBValue("minimal_omset", $data, $keylink);
	$showValues["minimal_omset"] = $value;
	$showFields[] = "minimal_omset";
		$showRawValues["minimal_omset"] = substr($data["minimal_omset"],0,100);

//	dasar - Number
	$value = $pageObject->showDBValue("dasar", $data, $keylink);
	$showValues["dasar"] = $value;
	$showFields[] = "dasar";
		$showRawValues["dasar"] = substr($data["dasar"],0,100);

//	tarif - Number
	$value = $pageObject->showDBValue("tarif", $data, $keylink);
	$showValues["tarif"] = $value;
	$showFields[] = "tarif";
		$showRawValues["tarif"] = substr($data["tarif"],0,100);

//	denda - Number
	$value = $pageObject->showDBValue("denda", $data, $keylink);
	$showValues["denda"] = $value;
	$showFields[] = "denda";
		$showRawValues["denda"] = substr($data["denda"],0,100);

//	bunga - Number
	$value = $pageObject->showDBValue("bunga", $data, $keylink);
	$showValues["bunga"] = $value;
	$showFields[] = "bunga";
		$showRawValues["bunga"] = substr($data["bunga"],0,100);

//	setoran - Number
	$value = $pageObject->showDBValue("setoran", $data, $keylink);
	$showValues["setoran"] = $value;
	$showFields[] = "setoran";
		$showRawValues["setoran"] = substr($data["setoran"],0,100);

//	kenaikan - Number
	$value = $pageObject->showDBValue("kenaikan", $data, $keylink);
	$showValues["kenaikan"] = $value;
	$showFields[] = "kenaikan";
		$showRawValues["kenaikan"] = substr($data["kenaikan"],0,100);

//	kompensasi - Number
	$value = $pageObject->showDBValue("kompensasi", $data, $keylink);
	$showValues["kompensasi"] = $value;
	$showFields[] = "kompensasi";
		$showRawValues["kompensasi"] = substr($data["kompensasi"],0,100);

//	lain2 - Number
	$value = $pageObject->showDBValue("lain2", $data, $keylink);
	$showValues["lain2"] = $value;
	$showFields[] = "lain2";
		$showRawValues["lain2"] = substr($data["lain2"],0,100);

//	pajak_terhutang - 
	$value = $pageObject->showDBValue("pajak_terhutang", $data, $keylink);
	$showValues["pajak_terhutang"] = $value;
	$showFields[] = "pajak_terhutang";
		$showRawValues["pajak_terhutang"] = substr($data["pajak_terhutang"],0,100);

//	air_manfaat_id - 
	$value = $pageObject->showDBValue("air_manfaat_id", $data, $keylink);
	$showValues["air_manfaat_id"] = $value;
	$showFields[] = "air_manfaat_id";
		$showRawValues["air_manfaat_id"] = substr($data["air_manfaat_id"],0,100);

//	air_zona_id - 
	$value = $pageObject->showDBValue("air_zona_id", $data, $keylink);
	$showValues["air_zona_id"] = $value;
	$showFields[] = "air_zona_id";
		$showRawValues["air_zona_id"] = substr($data["air_zona_id"],0,100);

//	meteran_awal - 
	$value = $pageObject->showDBValue("meteran_awal", $data, $keylink);
	$showValues["meteran_awal"] = $value;
	$showFields[] = "meteran_awal";
		$showRawValues["meteran_awal"] = substr($data["meteran_awal"],0,100);

//	meteran_akhir - 
	$value = $pageObject->showDBValue("meteran_akhir", $data, $keylink);
	$showValues["meteran_akhir"] = $value;
	$showFields[] = "meteran_akhir";
		$showRawValues["meteran_akhir"] = substr($data["meteran_akhir"],0,100);

//	volume - Number
	$value = $pageObject->showDBValue("volume", $data, $keylink);
	$showValues["volume"] = $value;
	$showFields[] = "volume";
		$showRawValues["volume"] = substr($data["volume"],0,100);

//	satuan - 
	$value = $pageObject->showDBValue("satuan", $data, $keylink);
	$showValues["satuan"] = $value;
	$showFields[] = "satuan";
		$showRawValues["satuan"] = substr($data["satuan"],0,100);

//	r_panjang - Number
	$value = $pageObject->showDBValue("r_panjang", $data, $keylink);
	$showValues["r_panjang"] = $value;
	$showFields[] = "r_panjang";
		$showRawValues["r_panjang"] = substr($data["r_panjang"],0,100);

//	r_lebar - Number
	$value = $pageObject->showDBValue("r_lebar", $data, $keylink);
	$showValues["r_lebar"] = $value;
	$showFields[] = "r_lebar";
		$showRawValues["r_lebar"] = substr($data["r_lebar"],0,100);

//	r_muka - Number
	$value = $pageObject->showDBValue("r_muka", $data, $keylink);
	$showValues["r_muka"] = $value;
	$showFields[] = "r_muka";
		$showRawValues["r_muka"] = substr($data["r_muka"],0,100);

//	r_banyak - Number
	$value = $pageObject->showDBValue("r_banyak", $data, $keylink);
	$showValues["r_banyak"] = $value;
	$showFields[] = "r_banyak";
		$showRawValues["r_banyak"] = substr($data["r_banyak"],0,100);

//	r_luas - Number
	$value = $pageObject->showDBValue("r_luas", $data, $keylink);
	$showValues["r_luas"] = $value;
	$showFields[] = "r_luas";
		$showRawValues["r_luas"] = substr($data["r_luas"],0,100);

//	r_tarifid - 
	$value = $pageObject->showDBValue("r_tarifid", $data, $keylink);
	$showValues["r_tarifid"] = $value;
	$showFields[] = "r_tarifid";
		$showRawValues["r_tarifid"] = substr($data["r_tarifid"],0,100);

//	r_kontrak - Number
	$value = $pageObject->showDBValue("r_kontrak", $data, $keylink);
	$showValues["r_kontrak"] = $value;
	$showFields[] = "r_kontrak";
		$showRawValues["r_kontrak"] = substr($data["r_kontrak"],0,100);

//	r_lama - 
	$value = $pageObject->showDBValue("r_lama", $data, $keylink);
	$showValues["r_lama"] = $value;
	$showFields[] = "r_lama";
		$showRawValues["r_lama"] = substr($data["r_lama"],0,100);

//	r_jalan_id - 
	$value = $pageObject->showDBValue("r_jalan_id", $data, $keylink);
	$showValues["r_jalan_id"] = $value;
	$showFields[] = "r_jalan_id";
		$showRawValues["r_jalan_id"] = substr($data["r_jalan_id"],0,100);

//	r_jalanklas_id - 
	$value = $pageObject->showDBValue("r_jalanklas_id", $data, $keylink);
	$showValues["r_jalanklas_id"] = $value;
	$showFields[] = "r_jalanklas_id";
		$showRawValues["r_jalanklas_id"] = substr($data["r_jalanklas_id"],0,100);

//	r_lokasi - 
	$value = $pageObject->showDBValue("r_lokasi", $data, $keylink);
	$showValues["r_lokasi"] = $value;
	$showFields[] = "r_lokasi";
		$showRawValues["r_lokasi"] = substr($data["r_lokasi"],0,100);

//	r_judul - 
	$value = $pageObject->showDBValue("r_judul", $data, $keylink);
	$showValues["r_judul"] = $value;
	$showFields[] = "r_judul";
		$showRawValues["r_judul"] = substr($data["r_judul"],0,100);

//	r_kelurahan_id - 
	$value = $pageObject->showDBValue("r_kelurahan_id", $data, $keylink);
	$showValues["r_kelurahan_id"] = $value;
	$showFields[] = "r_kelurahan_id";
		$showRawValues["r_kelurahan_id"] = substr($data["r_kelurahan_id"],0,100);

//	r_lokasi_id - 
	$value = $pageObject->showDBValue("r_lokasi_id", $data, $keylink);
	$showValues["r_lokasi_id"] = $value;
	$showFields[] = "r_lokasi_id";
		$showRawValues["r_lokasi_id"] = substr($data["r_lokasi_id"],0,100);

//	r_calculated - Number
	$value = $pageObject->showDBValue("r_calculated", $data, $keylink);
	$showValues["r_calculated"] = $value;
	$showFields[] = "r_calculated";
		$showRawValues["r_calculated"] = substr($data["r_calculated"],0,100);

//	r_nsr - Number
	$value = $pageObject->showDBValue("r_nsr", $data, $keylink);
	$showValues["r_nsr"] = $value;
	$showFields[] = "r_nsr";
		$showRawValues["r_nsr"] = substr($data["r_nsr"],0,100);

//	r_nsrno - 
	$value = $pageObject->showDBValue("r_nsrno", $data, $keylink);
	$showValues["r_nsrno"] = $value;
	$showFields[] = "r_nsrno";
		$showRawValues["r_nsrno"] = substr($data["r_nsrno"],0,100);

//	r_nsrtgl - Short Date
	$value = $pageObject->showDBValue("r_nsrtgl", $data, $keylink);
	$showValues["r_nsrtgl"] = $value;
	$showFields[] = "r_nsrtgl";
		$showRawValues["r_nsrtgl"] = substr($data["r_nsrtgl"],0,100);

//	r_nsl_kecamatan_id - 
	$value = $pageObject->showDBValue("r_nsl_kecamatan_id", $data, $keylink);
	$showValues["r_nsl_kecamatan_id"] = $value;
	$showFields[] = "r_nsl_kecamatan_id";
		$showRawValues["r_nsl_kecamatan_id"] = substr($data["r_nsl_kecamatan_id"],0,100);

//	r_nsl_type_id - 
	$value = $pageObject->showDBValue("r_nsl_type_id", $data, $keylink);
	$showValues["r_nsl_type_id"] = $value;
	$showFields[] = "r_nsl_type_id";
		$showRawValues["r_nsl_type_id"] = substr($data["r_nsl_type_id"],0,100);

//	r_nsl_nilai - Number
	$value = $pageObject->showDBValue("r_nsl_nilai", $data, $keylink);
	$showValues["r_nsl_nilai"] = $value;
	$showFields[] = "r_nsl_nilai";
		$showRawValues["r_nsl_nilai"] = substr($data["r_nsl_nilai"],0,100);

//	notes - 
	$value = $pageObject->showDBValue("notes", $data, $keylink);
	$showValues["notes"] = $value;
	$showFields[] = "notes";
		$showRawValues["notes"] = substr($data["notes"],0,100);

//	unit_id - 
	$value = $pageObject->showDBValue("unit_id", $data, $keylink);
	$showValues["unit_id"] = $value;
	$showFields[] = "unit_id";
		$showRawValues["unit_id"] = substr($data["unit_id"],0,100);

//	enabled - 
	$value = $pageObject->showDBValue("enabled", $data, $keylink);
	$showValues["enabled"] = $value;
	$showFields[] = "enabled";
		$showRawValues["enabled"] = substr($data["enabled"],0,100);

//	created - Short Date
	$value = $pageObject->showDBValue("created", $data, $keylink);
	$showValues["created"] = $value;
	$showFields[] = "created";
		$showRawValues["created"] = substr($data["created"],0,100);

//	create_uid - 
	$value = $pageObject->showDBValue("create_uid", $data, $keylink);
	$showValues["create_uid"] = $value;
	$showFields[] = "create_uid";
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);

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

//	terimanip - 
	$value = $pageObject->showDBValue("terimanip", $data, $keylink);
	$showValues["terimanip"] = $value;
	$showFields[] = "terimanip";
		$showRawValues["terimanip"] = substr($data["terimanip"],0,100);

//	terimatgl - Short Date
	$value = $pageObject->showDBValue("terimatgl", $data, $keylink);
	$showValues["terimatgl"] = $value;
	$showFields[] = "terimatgl";
		$showRawValues["terimatgl"] = substr($data["terimatgl"],0,100);

//	kirimtgl - Short Date
	$value = $pageObject->showDBValue("kirimtgl", $data, $keylink);
	$showValues["kirimtgl"] = $value;
	$showFields[] = "kirimtgl";
		$showRawValues["kirimtgl"] = substr($data["kirimtgl"],0,100);

//	isprint_dc - 
	$value = $pageObject->showDBValue("isprint_dc", $data, $keylink);
	$showValues["isprint_dc"] = $value;
	$showFields[] = "isprint_dc";
		$showRawValues["isprint_dc"] = substr($data["isprint_dc"],0,100);

//	r_nsr_id - 
	$value = $pageObject->showDBValue("r_nsr_id", $data, $keylink);
	$showValues["r_nsr_id"] = $value;
	$showFields[] = "r_nsr_id";
		$showRawValues["r_nsr_id"] = substr($data["r_nsr_id"],0,100);

//	r_lokasi_pasang_id - 
	$value = $pageObject->showDBValue("r_lokasi_pasang_id", $data, $keylink);
	$showValues["r_lokasi_pasang_id"] = $value;
	$showFields[] = "r_lokasi_pasang_id";
		$showRawValues["r_lokasi_pasang_id"] = substr($data["r_lokasi_pasang_id"],0,100);

//	r_lokasi_pasang_val - Number
	$value = $pageObject->showDBValue("r_lokasi_pasang_val", $data, $keylink);
	$showValues["r_lokasi_pasang_val"] = $value;
	$showFields[] = "r_lokasi_pasang_val";
		$showRawValues["r_lokasi_pasang_val"] = substr($data["r_lokasi_pasang_val"],0,100);

//	r_jalanklas_val - Number
	$value = $pageObject->showDBValue("r_jalanklas_val", $data, $keylink);
	$showValues["r_jalanklas_val"] = $value;
	$showFields[] = "r_jalanklas_val";
		$showRawValues["r_jalanklas_val"] = substr($data["r_jalanklas_val"],0,100);

//	r_sudut_pandang_id - 
	$value = $pageObject->showDBValue("r_sudut_pandang_id", $data, $keylink);
	$showValues["r_sudut_pandang_id"] = $value;
	$showFields[] = "r_sudut_pandang_id";
		$showRawValues["r_sudut_pandang_id"] = substr($data["r_sudut_pandang_id"],0,100);

//	r_sudut_pandang_val - Number
	$value = $pageObject->showDBValue("r_sudut_pandang_val", $data, $keylink);
	$showValues["r_sudut_pandang_val"] = $value;
	$showFields[] = "r_sudut_pandang_val";
		$showRawValues["r_sudut_pandang_val"] = substr($data["r_sudut_pandang_val"],0,100);

//	r_tinggi - Number
	$value = $pageObject->showDBValue("r_tinggi", $data, $keylink);
	$showValues["r_tinggi"] = $value;
	$showFields[] = "r_tinggi";
		$showRawValues["r_tinggi"] = substr($data["r_tinggi"],0,100);

//	r_njop - Number
	$value = $pageObject->showDBValue("r_njop", $data, $keylink);
	$showValues["r_njop"] = $value;
	$showFields[] = "r_njop";
		$showRawValues["r_njop"] = substr($data["r_njop"],0,100);

//	r_status - 
	$value = $pageObject->showDBValue("r_status", $data, $keylink);
	$showValues["r_status"] = $value;
	$showFields[] = "r_status";
		$showRawValues["r_status"] = substr($data["r_status"],0,100);

//	r_njop_ketinggian - Number
	$value = $pageObject->showDBValue("r_njop_ketinggian", $data, $keylink);
	$showValues["r_njop_ketinggian"] = $value;
	$showFields[] = "r_njop_ketinggian";
		$showRawValues["r_njop_ketinggian"] = substr($data["r_njop_ketinggian"],0,100);

//	status_pembayaran - 
	$value = $pageObject->showDBValue("status_pembayaran", $data, $keylink);
	$showValues["status_pembayaran"] = $value;
	$showFields[] = "status_pembayaran";
		$showRawValues["status_pembayaran"] = substr($data["status_pembayaran"],0,100);

//	rek_no_paneng - 
	$value = $pageObject->showDBValue("rek_no_paneng", $data, $keylink);
	$showValues["rek_no_paneng"] = $value;
	$showFields[] = "rek_no_paneng";
		$showRawValues["rek_no_paneng"] = substr($data["rek_no_paneng"],0,100);

//	sptno_lengkap - 
	$value = $pageObject->showDBValue("sptno_lengkap", $data, $keylink);
	$showValues["sptno_lengkap"] = $value;
	$showFields[] = "sptno_lengkap";
		$showRawValues["sptno_lengkap"] = substr($data["sptno_lengkap"],0,100);

//	sptno_lama - 
	$value = $pageObject->showDBValue("sptno_lama", $data, $keylink);
	$showValues["sptno_lama"] = $value;
	$showFields[] = "sptno_lama";
		$showRawValues["sptno_lama"] = substr($data["sptno_lama"],0,100);

//	r_nama - 
	$value = $pageObject->showDBValue("r_nama", $data, $keylink);
	$showValues["r_nama"] = $value;
	$showFields[] = "r_nama";
		$showRawValues["r_nama"] = substr($data["r_nama"],0,100);

//	r_alamat - 
	$value = $pageObject->showDBValue("r_alamat", $data, $keylink);
	$showValues["r_alamat"] = $value;
	$showFields[] = "r_alamat";
		$showRawValues["r_alamat"] = substr($data["r_alamat"],0,100);

//	omset1 - Number
	$value = $pageObject->showDBValue("omset1", $data, $keylink);
	$showValues["omset1"] = $value;
	$showFields[] = "omset1";
		$showRawValues["omset1"] = substr($data["omset1"],0,100);

//	omset2 - Number
	$value = $pageObject->showDBValue("omset2", $data, $keylink);
	$showValues["omset2"] = $value;
	$showFields[] = "omset2";
		$showRawValues["omset2"] = substr($data["omset2"],0,100);

//	omset3 - Number
	$value = $pageObject->showDBValue("omset3", $data, $keylink);
	$showValues["omset3"] = $value;
	$showFields[] = "omset3";
		$showRawValues["omset3"] = substr($data["omset3"],0,100);

//	omset4 - Number
	$value = $pageObject->showDBValue("omset4", $data, $keylink);
	$showValues["omset4"] = $value;
	$showFields[] = "omset4";
		$showRawValues["omset4"] = substr($data["omset4"],0,100);

//	omset5 - Number
	$value = $pageObject->showDBValue("omset5", $data, $keylink);
	$showValues["omset5"] = $value;
	$showFields[] = "omset5";
		$showRawValues["omset5"] = substr($data["omset5"],0,100);

//	omset6 - Number
	$value = $pageObject->showDBValue("omset6", $data, $keylink);
	$showValues["omset6"] = $value;
	$showFields[] = "omset6";
		$showRawValues["omset6"] = substr($data["omset6"],0,100);

//	omset7 - Number
	$value = $pageObject->showDBValue("omset7", $data, $keylink);
	$showValues["omset7"] = $value;
	$showFields[] = "omset7";
		$showRawValues["omset7"] = substr($data["omset7"],0,100);

//	omset8 - Number
	$value = $pageObject->showDBValue("omset8", $data, $keylink);
	$showValues["omset8"] = $value;
	$showFields[] = "omset8";
		$showRawValues["omset8"] = substr($data["omset8"],0,100);

//	omset9 - Number
	$value = $pageObject->showDBValue("omset9", $data, $keylink);
	$showValues["omset9"] = $value;
	$showFields[] = "omset9";
		$showRawValues["omset9"] = substr($data["omset9"],0,100);

//	omset10 - Number
	$value = $pageObject->showDBValue("omset10", $data, $keylink);
	$showValues["omset10"] = $value;
	$showFields[] = "omset10";
		$showRawValues["omset10"] = substr($data["omset10"],0,100);

//	omset11 - Number
	$value = $pageObject->showDBValue("omset11", $data, $keylink);
	$showValues["omset11"] = $value;
	$showFields[] = "omset11";
		$showRawValues["omset11"] = substr($data["omset11"],0,100);

//	omset12 - Number
	$value = $pageObject->showDBValue("omset12", $data, $keylink);
	$showValues["omset12"] = $value;
	$showFields[] = "omset12";
		$showRawValues["omset12"] = substr($data["omset12"],0,100);

//	omset13 - Number
	$value = $pageObject->showDBValue("omset13", $data, $keylink);
	$showValues["omset13"] = $value;
	$showFields[] = "omset13";
		$showRawValues["omset13"] = substr($data["omset13"],0,100);

//	omset14 - Number
	$value = $pageObject->showDBValue("omset14", $data, $keylink);
	$showValues["omset14"] = $value;
	$showFields[] = "omset14";
		$showRawValues["omset14"] = substr($data["omset14"],0,100);

//	omset15 - Number
	$value = $pageObject->showDBValue("omset15", $data, $keylink);
	$showValues["omset15"] = $value;
	$showFields[] = "omset15";
		$showRawValues["omset15"] = substr($data["omset15"],0,100);

//	omset16 - Number
	$value = $pageObject->showDBValue("omset16", $data, $keylink);
	$showValues["omset16"] = $value;
	$showFields[] = "omset16";
		$showRawValues["omset16"] = substr($data["omset16"],0,100);

//	omset17 - Number
	$value = $pageObject->showDBValue("omset17", $data, $keylink);
	$showValues["omset17"] = $value;
	$showFields[] = "omset17";
		$showRawValues["omset17"] = substr($data["omset17"],0,100);

//	omset18 - Number
	$value = $pageObject->showDBValue("omset18", $data, $keylink);
	$showValues["omset18"] = $value;
	$showFields[] = "omset18";
		$showRawValues["omset18"] = substr($data["omset18"],0,100);

//	omset19 - Number
	$value = $pageObject->showDBValue("omset19", $data, $keylink);
	$showValues["omset19"] = $value;
	$showFields[] = "omset19";
		$showRawValues["omset19"] = substr($data["omset19"],0,100);

//	omset20 - Number
	$value = $pageObject->showDBValue("omset20", $data, $keylink);
	$showValues["omset20"] = $value;
	$showFields[] = "omset20";
		$showRawValues["omset20"] = substr($data["omset20"],0,100);

//	omset21 - Number
	$value = $pageObject->showDBValue("omset21", $data, $keylink);
	$showValues["omset21"] = $value;
	$showFields[] = "omset21";
		$showRawValues["omset21"] = substr($data["omset21"],0,100);

//	omset22 - Number
	$value = $pageObject->showDBValue("omset22", $data, $keylink);
	$showValues["omset22"] = $value;
	$showFields[] = "omset22";
		$showRawValues["omset22"] = substr($data["omset22"],0,100);

//	omset23 - Number
	$value = $pageObject->showDBValue("omset23", $data, $keylink);
	$showValues["omset23"] = $value;
	$showFields[] = "omset23";
		$showRawValues["omset23"] = substr($data["omset23"],0,100);

//	omset24 - Number
	$value = $pageObject->showDBValue("omset24", $data, $keylink);
	$showValues["omset24"] = $value;
	$showFields[] = "omset24";
		$showRawValues["omset24"] = substr($data["omset24"],0,100);

//	omset25 - Number
	$value = $pageObject->showDBValue("omset25", $data, $keylink);
	$showValues["omset25"] = $value;
	$showFields[] = "omset25";
		$showRawValues["omset25"] = substr($data["omset25"],0,100);

//	omset26 - Number
	$value = $pageObject->showDBValue("omset26", $data, $keylink);
	$showValues["omset26"] = $value;
	$showFields[] = "omset26";
		$showRawValues["omset26"] = substr($data["omset26"],0,100);

//	omset27 - Number
	$value = $pageObject->showDBValue("omset27", $data, $keylink);
	$showValues["omset27"] = $value;
	$showFields[] = "omset27";
		$showRawValues["omset27"] = substr($data["omset27"],0,100);

//	omset28 - Number
	$value = $pageObject->showDBValue("omset28", $data, $keylink);
	$showValues["omset28"] = $value;
	$showFields[] = "omset28";
		$showRawValues["omset28"] = substr($data["omset28"],0,100);

//	omset29 - Number
	$value = $pageObject->showDBValue("omset29", $data, $keylink);
	$showValues["omset29"] = $value;
	$showFields[] = "omset29";
		$showRawValues["omset29"] = substr($data["omset29"],0,100);

//	omset30 - Number
	$value = $pageObject->showDBValue("omset30", $data, $keylink);
	$showValues["omset30"] = $value;
	$showFields[] = "omset30";
		$showRawValues["omset30"] = substr($data["omset30"],0,100);

//	omset31 - Number
	$value = $pageObject->showDBValue("omset31", $data, $keylink);
	$showValues["omset31"] = $value;
	$showFields[] = "omset31";
		$showRawValues["omset31"] = substr($data["omset31"],0,100);

//	keterangan1 - 
	$value = $pageObject->showDBValue("keterangan1", $data, $keylink);
	$showValues["keterangan1"] = $value;
	$showFields[] = "keterangan1";
		$showRawValues["keterangan1"] = substr($data["keterangan1"],0,100);

//	keterangan2 - 
	$value = $pageObject->showDBValue("keterangan2", $data, $keylink);
	$showValues["keterangan2"] = $value;
	$showFields[] = "keterangan2";
		$showRawValues["keterangan2"] = substr($data["keterangan2"],0,100);

//	keterangan3 - 
	$value = $pageObject->showDBValue("keterangan3", $data, $keylink);
	$showValues["keterangan3"] = $value;
	$showFields[] = "keterangan3";
		$showRawValues["keterangan3"] = substr($data["keterangan3"],0,100);

//	keterangan4 - 
	$value = $pageObject->showDBValue("keterangan4", $data, $keylink);
	$showValues["keterangan4"] = $value;
	$showFields[] = "keterangan4";
		$showRawValues["keterangan4"] = substr($data["keterangan4"],0,100);

//	keterangan5 - 
	$value = $pageObject->showDBValue("keterangan5", $data, $keylink);
	$showValues["keterangan5"] = $value;
	$showFields[] = "keterangan5";
		$showRawValues["keterangan5"] = substr($data["keterangan5"],0,100);

//	keterangan6 - 
	$value = $pageObject->showDBValue("keterangan6", $data, $keylink);
	$showValues["keterangan6"] = $value;
	$showFields[] = "keterangan6";
		$showRawValues["keterangan6"] = substr($data["keterangan6"],0,100);

//	keterangan7 - 
	$value = $pageObject->showDBValue("keterangan7", $data, $keylink);
	$showValues["keterangan7"] = $value;
	$showFields[] = "keterangan7";
		$showRawValues["keterangan7"] = substr($data["keterangan7"],0,100);

//	keterangan8 - 
	$value = $pageObject->showDBValue("keterangan8", $data, $keylink);
	$showValues["keterangan8"] = $value;
	$showFields[] = "keterangan8";
		$showRawValues["keterangan8"] = substr($data["keterangan8"],0,100);

//	keterangan9 - 
	$value = $pageObject->showDBValue("keterangan9", $data, $keylink);
	$showValues["keterangan9"] = $value;
	$showFields[] = "keterangan9";
		$showRawValues["keterangan9"] = substr($data["keterangan9"],0,100);

//	keterangan10 - 
	$value = $pageObject->showDBValue("keterangan10", $data, $keylink);
	$showValues["keterangan10"] = $value;
	$showFields[] = "keterangan10";
		$showRawValues["keterangan10"] = substr($data["keterangan10"],0,100);

//	keterangan11 - 
	$value = $pageObject->showDBValue("keterangan11", $data, $keylink);
	$showValues["keterangan11"] = $value;
	$showFields[] = "keterangan11";
		$showRawValues["keterangan11"] = substr($data["keterangan11"],0,100);

//	keterangan12 - 
	$value = $pageObject->showDBValue("keterangan12", $data, $keylink);
	$showValues["keterangan12"] = $value;
	$showFields[] = "keterangan12";
		$showRawValues["keterangan12"] = substr($data["keterangan12"],0,100);

//	keterangan13 - 
	$value = $pageObject->showDBValue("keterangan13", $data, $keylink);
	$showValues["keterangan13"] = $value;
	$showFields[] = "keterangan13";
		$showRawValues["keterangan13"] = substr($data["keterangan13"],0,100);

//	keterangan14 - 
	$value = $pageObject->showDBValue("keterangan14", $data, $keylink);
	$showValues["keterangan14"] = $value;
	$showFields[] = "keterangan14";
		$showRawValues["keterangan14"] = substr($data["keterangan14"],0,100);

//	keterangan15 - 
	$value = $pageObject->showDBValue("keterangan15", $data, $keylink);
	$showValues["keterangan15"] = $value;
	$showFields[] = "keterangan15";
		$showRawValues["keterangan15"] = substr($data["keterangan15"],0,100);

//	keterangan16 - 
	$value = $pageObject->showDBValue("keterangan16", $data, $keylink);
	$showValues["keterangan16"] = $value;
	$showFields[] = "keterangan16";
		$showRawValues["keterangan16"] = substr($data["keterangan16"],0,100);

//	keterangan17 - 
	$value = $pageObject->showDBValue("keterangan17", $data, $keylink);
	$showValues["keterangan17"] = $value;
	$showFields[] = "keterangan17";
		$showRawValues["keterangan17"] = substr($data["keterangan17"],0,100);

//	keterangan18 - 
	$value = $pageObject->showDBValue("keterangan18", $data, $keylink);
	$showValues["keterangan18"] = $value;
	$showFields[] = "keterangan18";
		$showRawValues["keterangan18"] = substr($data["keterangan18"],0,100);

//	keterangan19 - 
	$value = $pageObject->showDBValue("keterangan19", $data, $keylink);
	$showValues["keterangan19"] = $value;
	$showFields[] = "keterangan19";
		$showRawValues["keterangan19"] = substr($data["keterangan19"],0,100);

//	keterangan20 - 
	$value = $pageObject->showDBValue("keterangan20", $data, $keylink);
	$showValues["keterangan20"] = $value;
	$showFields[] = "keterangan20";
		$showRawValues["keterangan20"] = substr($data["keterangan20"],0,100);

//	keterangan21 - 
	$value = $pageObject->showDBValue("keterangan21", $data, $keylink);
	$showValues["keterangan21"] = $value;
	$showFields[] = "keterangan21";
		$showRawValues["keterangan21"] = substr($data["keterangan21"],0,100);

//	keterangan22 - 
	$value = $pageObject->showDBValue("keterangan22", $data, $keylink);
	$showValues["keterangan22"] = $value;
	$showFields[] = "keterangan22";
		$showRawValues["keterangan22"] = substr($data["keterangan22"],0,100);

//	keterangan23 - 
	$value = $pageObject->showDBValue("keterangan23", $data, $keylink);
	$showValues["keterangan23"] = $value;
	$showFields[] = "keterangan23";
		$showRawValues["keterangan23"] = substr($data["keterangan23"],0,100);

//	keterangan24 - 
	$value = $pageObject->showDBValue("keterangan24", $data, $keylink);
	$showValues["keterangan24"] = $value;
	$showFields[] = "keterangan24";
		$showRawValues["keterangan24"] = substr($data["keterangan24"],0,100);

//	keterangan25 - 
	$value = $pageObject->showDBValue("keterangan25", $data, $keylink);
	$showValues["keterangan25"] = $value;
	$showFields[] = "keterangan25";
		$showRawValues["keterangan25"] = substr($data["keterangan25"],0,100);

//	keterangan26 - 
	$value = $pageObject->showDBValue("keterangan26", $data, $keylink);
	$showValues["keterangan26"] = $value;
	$showFields[] = "keterangan26";
		$showRawValues["keterangan26"] = substr($data["keterangan26"],0,100);

//	keterangan27 - 
	$value = $pageObject->showDBValue("keterangan27", $data, $keylink);
	$showValues["keterangan27"] = $value;
	$showFields[] = "keterangan27";
		$showRawValues["keterangan27"] = substr($data["keterangan27"],0,100);

//	keterangan28 - 
	$value = $pageObject->showDBValue("keterangan28", $data, $keylink);
	$showValues["keterangan28"] = $value;
	$showFields[] = "keterangan28";
		$showRawValues["keterangan28"] = substr($data["keterangan28"],0,100);

//	keterangan29 - 
	$value = $pageObject->showDBValue("keterangan29", $data, $keylink);
	$showValues["keterangan29"] = $value;
	$showFields[] = "keterangan29";
		$showRawValues["keterangan29"] = substr($data["keterangan29"],0,100);

//	keterangan30 - 
	$value = $pageObject->showDBValue("keterangan30", $data, $keylink);
	$showValues["keterangan30"] = $value;
	$showFields[] = "keterangan30";
		$showRawValues["keterangan30"] = substr($data["keterangan30"],0,100);

//	keterangan31 - 
	$value = $pageObject->showDBValue("keterangan31", $data, $keylink);
	$showValues["keterangan31"] = $value;
	$showFields[] = "keterangan31";
		$showRawValues["keterangan31"] = substr($data["keterangan31"],0,100);

//	doc_no - 
	$value = $pageObject->showDBValue("doc_no", $data, $keylink);
	$showValues["doc_no"] = $value;
	$showFields[] = "doc_no";
		$showRawValues["doc_no"] = substr($data["doc_no"],0,100);

//	cara_bayar - 
	$value = $pageObject->showDBValue("cara_bayar", $data, $keylink);
	$showValues["cara_bayar"] = $value;
	$showFields[] = "cara_bayar";
		$showRawValues["cara_bayar"] = substr($data["cara_bayar"],0,100);

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

//	golongan - 
	$value = $pageObject->showDBValue("golongan", $data, $keylink);
	$showValues["golongan"] = $value;
	$showFields[] = "golongan";
		$showRawValues["golongan"] = substr($data["golongan"],0,100);

//	omset_lain - Number
	$value = $pageObject->showDBValue("omset_lain", $data, $keylink);
	$showValues["omset_lain"] = $value;
	$showFields[] = "omset_lain";
		$showRawValues["omset_lain"] = substr($data["omset_lain"],0,100);

//	keterangan_lain - 
	$value = $pageObject->showDBValue("keterangan_lain", $data, $keylink);
	$showValues["keterangan_lain"] = $value;
	$showFields[] = "keterangan_lain";
		$showRawValues["keterangan_lain"] = substr($data["keterangan_lain"],0,100);

//	ijin_no - 
	$value = $pageObject->showDBValue("ijin_no", $data, $keylink);
	$showValues["ijin_no"] = $value;
	$showFields[] = "ijin_no";
		$showRawValues["ijin_no"] = substr($data["ijin_no"],0,100);

//	jenis_masa - 
	$value = $pageObject->showDBValue("jenis_masa", $data, $keylink);
	$showValues["jenis_masa"] = $value;
	$showFields[] = "jenis_masa";
		$showRawValues["jenis_masa"] = substr($data["jenis_masa"],0,100);

//	skpd_lama - 
	$value = $pageObject->showDBValue("skpd_lama", $data, $keylink);
	$showValues["skpd_lama"] = $value;
	$showFields[] = "skpd_lama";
		$showRawValues["skpd_lama"] = substr($data["skpd_lama"],0,100);

//	proses - 
	$value = $pageObject->showDBValue("proses", $data, $keylink);
	$showValues["proses"] = $value;
	$showFields[] = "proses";
		$showRawValues["proses"] = substr($data["proses"],0,100);

//	tanggal_validasi - Short Date
	$value = $pageObject->showDBValue("tanggal_validasi", $data, $keylink);
	$showValues["tanggal_validasi"] = $value;
	$showFields[] = "tanggal_validasi";
		$showRawValues["tanggal_validasi"] = substr($data["tanggal_validasi"],0,100);

//	bulan - 
	$value = $pageObject->showDBValue("bulan", $data, $keylink);
	$showValues["bulan"] = $value;
	$showFields[] = "bulan";
		$showRawValues["bulan"] = substr($data["bulan"],0,100);

//	no_telp - 
	$value = $pageObject->showDBValue("no_telp", $data, $keylink);
	$showValues["no_telp"] = $value;
	$showFields[] = "no_telp";
		$showRawValues["no_telp"] = substr($data["no_telp"],0,100);

//	usaha_id - 
	$value = $pageObject->showDBValue("usaha_id", $data, $keylink);
	$showValues["usaha_id"] = $value;
	$showFields[] = "usaha_id";
		$showRawValues["usaha_id"] = substr($data["usaha_id"],0,100);

//	multiple - 
	$value = $pageObject->showDBValue("multiple", $data, $keylink);
	$showValues["multiple"] = $value;
	$showFields[] = "multiple";
		$showRawValues["multiple"] = substr($data["multiple"],0,100);

//	bulan_telat - 
	$value = $pageObject->showDBValue("bulan_telat", $data, $keylink);
	$showValues["bulan_telat"] = $value;
	$showFields[] = "bulan_telat";
		$showRawValues["bulan_telat"] = substr($data["bulan_telat"],0,100);
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
		$options['masterTable'] = "pad.pad_spt";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "pad.pad_spt";
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
	$strTableName = "pad.pad_spt";
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
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='pad_pad_spt_view.php?".$viewlink."'\"");
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
