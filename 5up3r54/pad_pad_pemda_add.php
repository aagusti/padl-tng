<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/pad_pad_pemda_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_pemda_add"] = $layout;



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
	$templatefile = "pad_pad_pemda_inline_add.htm";
else
	$templatefile = "pad_pad_pemda_add.htm";

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
		header('Location: pad_pad_pemda_add.php');
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
//	processing type - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_type = $pageObject->getControl("type", $id);
		$control_type->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing type - end
//	processing kepala_nama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kepala_nama = $pageObject->getControl("kepala_nama", $id);
		$control_kepala_nama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kepala_nama - end
//	processing alamat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_alamat = $pageObject->getControl("alamat", $id);
		$control_alamat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing alamat - end
//	processing telp - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_telp = $pageObject->getControl("telp", $id);
		$control_telp->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing telp - end
//	processing pemda_nama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pemda_nama = $pageObject->getControl("pemda_nama", $id);
		$control_pemda_nama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pemda_nama - end
//	processing ibukota - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ibukota = $pageObject->getControl("ibukota", $id);
		$control_ibukota->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ibukota - end
//	processing tmt - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tmt = $pageObject->getControl("tmt", $id);
		$control_tmt->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tmt - end
//	processing jabatan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jabatan = $pageObject->getControl("jabatan", $id);
		$control_jabatan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jabatan - end
//	processing ppkd_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ppkd_id = $pageObject->getControl("ppkd_id", $id);
		$control_ppkd_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ppkd_id - end
//	processing reklame_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_reklame_id = $pageObject->getControl("reklame_id", $id);
		$control_reklame_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing reklame_id - end
//	processing pendapatan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pendapatan_id = $pageObject->getControl("pendapatan_id", $id);
		$control_pendapatan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pendapatan_id - end
//	processing pemda_nama_singkat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pemda_nama_singkat = $pageObject->getControl("pemda_nama_singkat", $id);
		$control_pemda_nama_singkat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pemda_nama_singkat - end
//	processing airtanah_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_airtanah_id = $pageObject->getControl("airtanah_id", $id);
		$control_airtanah_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing airtanah_id - end
//	processing self_dok_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_self_dok_id = $pageObject->getControl("self_dok_id", $id);
		$control_self_dok_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing self_dok_id - end
//	processing office_dok_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_office_dok_id = $pageObject->getControl("office_dok_id", $id);
		$control_office_dok_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing office_dok_id - end
//	processing tgl_jatuhtempo_self - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tgl_jatuhtempo_self = $pageObject->getControl("tgl_jatuhtempo_self", $id);
		$control_tgl_jatuhtempo_self->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tgl_jatuhtempo_self - end
//	processing spt_denda - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_spt_denda = $pageObject->getControl("spt_denda", $id);
		$control_spt_denda->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing spt_denda - end
//	processing tgl_spt - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tgl_spt = $pageObject->getControl("tgl_spt", $id);
		$control_tgl_spt->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tgl_spt - end
//	processing pad_bunga - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pad_bunga = $pageObject->getControl("pad_bunga", $id);
		$control_pad_bunga->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pad_bunga - end
//	processing fax - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_fax = $pageObject->getControl("fax", $id);
		$control_fax->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing fax - end
//	processing website - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_website = $pageObject->getControl("website", $id);
		$control_website->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing website - end
//	processing email - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_email = $pageObject->getControl("email", $id);
		$control_email->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing email - end
//	processing daerah - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_daerah = $pageObject->getControl("daerah", $id);
		$control_daerah->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing daerah - end
//	processing alamat_lengkap - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_alamat_lengkap = $pageObject->getControl("alamat_lengkap", $id);
		$control_alamat_lengkap->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing alamat_lengkap - end
//	processing ppj_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ppj_id = $pageObject->getControl("ppj_id", $id);
		$control_ppj_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ppj_id - end
//	processing hotel_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_hotel_id = $pageObject->getControl("hotel_id", $id);
		$control_hotel_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing hotel_id - end
//	processing walet_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_walet_id = $pageObject->getControl("walet_id", $id);
		$control_walet_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing walet_id - end
//	processing restauran_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_restauran_id = $pageObject->getControl("restauran_id", $id);
		$control_restauran_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing restauran_id - end
//	processing hiburan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_hiburan_id = $pageObject->getControl("hiburan_id", $id);
		$control_hiburan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing hiburan_id - end
//	processing parkir_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_id = $pageObject->getControl("parkir_id", $id);
		$control_parkir_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_id - end
//	processing enabled - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_enabled = $pageObject->getControl("enabled", $id);
		$control_enabled->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing enabled - end
//	processing surat_no - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_surat_no = $pageObject->getControl("surat_no", $id);
		$control_surat_no->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing surat_no - end
//	processing ijin_kd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin_kd = $pageObject->getControl("ijin_kd", $id);
		$control_ijin_kd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin_kd - end
//	processing hotel_kd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_hotel_kd = $pageObject->getControl("hotel_kd", $id);
		$control_hotel_kd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing hotel_kd - end
//	processing restoran_kd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_restoran_kd = $pageObject->getControl("restoran_kd", $id);
		$control_restoran_kd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing restoran_kd - end
//	processing hiburan_kd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_hiburan_kd = $pageObject->getControl("hiburan_kd", $id);
		$control_hiburan_kd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing hiburan_kd - end
//	processing ppj_kd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ppj_kd = $pageObject->getControl("ppj_kd", $id);
		$control_ppj_kd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ppj_kd - end
//	processing parkir_kd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_parkir_kd = $pageObject->getControl("parkir_kd", $id);
		$control_parkir_kd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing parkir_kd - end
//	processing airtanah_kd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_airtanah_kd = $pageObject->getControl("airtanah_kd", $id);
		$control_airtanah_kd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing airtanah_kd - end
//	processing reklame_kd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_reklame_kd = $pageObject->getControl("reklame_kd", $id);
		$control_reklame_kd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing reklame_kd - end
//	processing restauran_kd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_restauran_kd = $pageObject->getControl("restauran_kd", $id);
		$control_restauran_kd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing restauran_kd - end




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
//	processing type - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_type->afterSuccessfulSave();
			}
//	processing type - end
//	processing kepala_nama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kepala_nama->afterSuccessfulSave();
			}
//	processing kepala_nama - end
//	processing alamat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_alamat->afterSuccessfulSave();
			}
//	processing alamat - end
//	processing telp - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_telp->afterSuccessfulSave();
			}
//	processing telp - end
//	processing pemda_nama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pemda_nama->afterSuccessfulSave();
			}
//	processing pemda_nama - end
//	processing ibukota - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ibukota->afterSuccessfulSave();
			}
//	processing ibukota - end
//	processing tmt - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tmt->afterSuccessfulSave();
			}
//	processing tmt - end
//	processing jabatan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jabatan->afterSuccessfulSave();
			}
//	processing jabatan - end
//	processing ppkd_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ppkd_id->afterSuccessfulSave();
			}
//	processing ppkd_id - end
//	processing reklame_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_reklame_id->afterSuccessfulSave();
			}
//	processing reklame_id - end
//	processing pendapatan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pendapatan_id->afterSuccessfulSave();
			}
//	processing pendapatan_id - end
//	processing pemda_nama_singkat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pemda_nama_singkat->afterSuccessfulSave();
			}
//	processing pemda_nama_singkat - end
//	processing airtanah_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_airtanah_id->afterSuccessfulSave();
			}
//	processing airtanah_id - end
//	processing self_dok_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_self_dok_id->afterSuccessfulSave();
			}
//	processing self_dok_id - end
//	processing office_dok_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_office_dok_id->afterSuccessfulSave();
			}
//	processing office_dok_id - end
//	processing tgl_jatuhtempo_self - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tgl_jatuhtempo_self->afterSuccessfulSave();
			}
//	processing tgl_jatuhtempo_self - end
//	processing spt_denda - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_spt_denda->afterSuccessfulSave();
			}
//	processing spt_denda - end
//	processing tgl_spt - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tgl_spt->afterSuccessfulSave();
			}
//	processing tgl_spt - end
//	processing pad_bunga - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pad_bunga->afterSuccessfulSave();
			}
//	processing pad_bunga - end
//	processing fax - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_fax->afterSuccessfulSave();
			}
//	processing fax - end
//	processing website - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_website->afterSuccessfulSave();
			}
//	processing website - end
//	processing email - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_email->afterSuccessfulSave();
			}
//	processing email - end
//	processing daerah - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_daerah->afterSuccessfulSave();
			}
//	processing daerah - end
//	processing alamat_lengkap - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_alamat_lengkap->afterSuccessfulSave();
			}
//	processing alamat_lengkap - end
//	processing ppj_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ppj_id->afterSuccessfulSave();
			}
//	processing ppj_id - end
//	processing hotel_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_hotel_id->afterSuccessfulSave();
			}
//	processing hotel_id - end
//	processing walet_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_walet_id->afterSuccessfulSave();
			}
//	processing walet_id - end
//	processing restauran_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_restauran_id->afterSuccessfulSave();
			}
//	processing restauran_id - end
//	processing hiburan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_hiburan_id->afterSuccessfulSave();
			}
//	processing hiburan_id - end
//	processing parkir_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_id->afterSuccessfulSave();
			}
//	processing parkir_id - end
//	processing enabled - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_enabled->afterSuccessfulSave();
			}
//	processing enabled - end
//	processing surat_no - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_surat_no->afterSuccessfulSave();
			}
//	processing surat_no - end
//	processing ijin_kd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin_kd->afterSuccessfulSave();
			}
//	processing ijin_kd - end
//	processing hotel_kd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_hotel_kd->afterSuccessfulSave();
			}
//	processing hotel_kd - end
//	processing restoran_kd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_restoran_kd->afterSuccessfulSave();
			}
//	processing restoran_kd - end
//	processing hiburan_kd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_hiburan_kd->afterSuccessfulSave();
			}
//	processing hiburan_kd - end
//	processing ppj_kd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ppj_kd->afterSuccessfulSave();
			}
//	processing ppj_kd - end
//	processing parkir_kd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_parkir_kd->afterSuccessfulSave();
			}
//	processing parkir_kd - end
//	processing airtanah_kd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_airtanah_kd->afterSuccessfulSave();
			}
//	processing airtanah_kd - end
//	processing reklame_kd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_reklame_kd->afterSuccessfulSave();
			}
//	processing reklame_kd - end
//	processing restauran_kd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_restauran_kd->afterSuccessfulSave();
			}
//	processing restauran_kd - end

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
						$message .='&nbsp;<a href=\'pad_pad_pemda_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'pad_pad_pemda_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: pad_pad_pemda_".$pageObject->getPageType().".php");
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



if($readavalues)
{
	$defvalues["type"]=@$avalues["type"];
	$defvalues["kepala_nama"]=@$avalues["kepala_nama"];
	$defvalues["alamat"]=@$avalues["alamat"];
	$defvalues["telp"]=@$avalues["telp"];
	$defvalues["pemda_nama"]=@$avalues["pemda_nama"];
	$defvalues["ibukota"]=@$avalues["ibukota"];
	$defvalues["tmt"]=@$avalues["tmt"];
	$defvalues["jabatan"]=@$avalues["jabatan"];
	$defvalues["ppkd_id"]=@$avalues["ppkd_id"];
	$defvalues["reklame_id"]=@$avalues["reklame_id"];
	$defvalues["pendapatan_id"]=@$avalues["pendapatan_id"];
	$defvalues["pemda_nama_singkat"]=@$avalues["pemda_nama_singkat"];
	$defvalues["airtanah_id"]=@$avalues["airtanah_id"];
	$defvalues["self_dok_id"]=@$avalues["self_dok_id"];
	$defvalues["office_dok_id"]=@$avalues["office_dok_id"];
	$defvalues["tgl_jatuhtempo_self"]=@$avalues["tgl_jatuhtempo_self"];
	$defvalues["spt_denda"]=@$avalues["spt_denda"];
	$defvalues["tgl_spt"]=@$avalues["tgl_spt"];
	$defvalues["pad_bunga"]=@$avalues["pad_bunga"];
	$defvalues["fax"]=@$avalues["fax"];
	$defvalues["website"]=@$avalues["website"];
	$defvalues["email"]=@$avalues["email"];
	$defvalues["daerah"]=@$avalues["daerah"];
	$defvalues["alamat_lengkap"]=@$avalues["alamat_lengkap"];
	$defvalues["ppj_id"]=@$avalues["ppj_id"];
	$defvalues["hotel_id"]=@$avalues["hotel_id"];
	$defvalues["walet_id"]=@$avalues["walet_id"];
	$defvalues["restauran_id"]=@$avalues["restauran_id"];
	$defvalues["hiburan_id"]=@$avalues["hiburan_id"];
	$defvalues["parkir_id"]=@$avalues["parkir_id"];
	$defvalues["enabled"]=@$avalues["enabled"];
	$defvalues["surat_no"]=@$avalues["surat_no"];
	$defvalues["ijin_kd"]=@$avalues["ijin_kd"];
	$defvalues["hotel_kd"]=@$avalues["hotel_kd"];
	$defvalues["restoran_kd"]=@$avalues["restoran_kd"];
	$defvalues["hiburan_kd"]=@$avalues["hiburan_kd"];
	$defvalues["ppj_kd"]=@$avalues["ppj_kd"];
	$defvalues["parkir_kd"]=@$avalues["parkir_kd"];
	$defvalues["airtanah_kd"]=@$avalues["airtanah_kd"];
	$defvalues["reklame_kd"]=@$avalues["reklame_kd"];
	$defvalues["restauran_kd"]=@$avalues["restauran_kd"];
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
	
	if(!$pageObject->isAppearOnTabs("type"))
		$xt->assign("type_fieldblock",true);
	else
		$xt->assign("type_tabfieldblock",true);
	$xt->assign("type_label",true);
	if(isEnableSection508())
		$xt->assign_section("type_label","<label for=\"".GetInputElementId("type", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kepala_nama"))
		$xt->assign("kepala_nama_fieldblock",true);
	else
		$xt->assign("kepala_nama_tabfieldblock",true);
	$xt->assign("kepala_nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("kepala_nama_label","<label for=\"".GetInputElementId("kepala_nama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("alamat"))
		$xt->assign("alamat_fieldblock",true);
	else
		$xt->assign("alamat_tabfieldblock",true);
	$xt->assign("alamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_label","<label for=\"".GetInputElementId("alamat", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("telp"))
		$xt->assign("telp_fieldblock",true);
	else
		$xt->assign("telp_tabfieldblock",true);
	$xt->assign("telp_label",true);
	if(isEnableSection508())
		$xt->assign_section("telp_label","<label for=\"".GetInputElementId("telp", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pemda_nama"))
		$xt->assign("pemda_nama_fieldblock",true);
	else
		$xt->assign("pemda_nama_tabfieldblock",true);
	$xt->assign("pemda_nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("pemda_nama_label","<label for=\"".GetInputElementId("pemda_nama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ibukota"))
		$xt->assign("ibukota_fieldblock",true);
	else
		$xt->assign("ibukota_tabfieldblock",true);
	$xt->assign("ibukota_label",true);
	if(isEnableSection508())
		$xt->assign_section("ibukota_label","<label for=\"".GetInputElementId("ibukota", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tmt"))
		$xt->assign("tmt_fieldblock",true);
	else
		$xt->assign("tmt_tabfieldblock",true);
	$xt->assign("tmt_label",true);
	if(isEnableSection508())
		$xt->assign_section("tmt_label","<label for=\"".GetInputElementId("tmt", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("jabatan"))
		$xt->assign("jabatan_fieldblock",true);
	else
		$xt->assign("jabatan_tabfieldblock",true);
	$xt->assign("jabatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("jabatan_label","<label for=\"".GetInputElementId("jabatan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ppkd_id"))
		$xt->assign("ppkd_id_fieldblock",true);
	else
		$xt->assign("ppkd_id_tabfieldblock",true);
	$xt->assign("ppkd_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("ppkd_id_label","<label for=\"".GetInputElementId("ppkd_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("reklame_id"))
		$xt->assign("reklame_id_fieldblock",true);
	else
		$xt->assign("reklame_id_tabfieldblock",true);
	$xt->assign("reklame_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("reklame_id_label","<label for=\"".GetInputElementId("reklame_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pendapatan_id"))
		$xt->assign("pendapatan_id_fieldblock",true);
	else
		$xt->assign("pendapatan_id_tabfieldblock",true);
	$xt->assign("pendapatan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("pendapatan_id_label","<label for=\"".GetInputElementId("pendapatan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pemda_nama_singkat"))
		$xt->assign("pemda_nama_singkat_fieldblock",true);
	else
		$xt->assign("pemda_nama_singkat_tabfieldblock",true);
	$xt->assign("pemda_nama_singkat_label",true);
	if(isEnableSection508())
		$xt->assign_section("pemda_nama_singkat_label","<label for=\"".GetInputElementId("pemda_nama_singkat", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("airtanah_id"))
		$xt->assign("airtanah_id_fieldblock",true);
	else
		$xt->assign("airtanah_id_tabfieldblock",true);
	$xt->assign("airtanah_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("airtanah_id_label","<label for=\"".GetInputElementId("airtanah_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("self_dok_id"))
		$xt->assign("self_dok_id_fieldblock",true);
	else
		$xt->assign("self_dok_id_tabfieldblock",true);
	$xt->assign("self_dok_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("self_dok_id_label","<label for=\"".GetInputElementId("self_dok_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("office_dok_id"))
		$xt->assign("office_dok_id_fieldblock",true);
	else
		$xt->assign("office_dok_id_tabfieldblock",true);
	$xt->assign("office_dok_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("office_dok_id_label","<label for=\"".GetInputElementId("office_dok_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tgl_jatuhtempo_self"))
		$xt->assign("tgl_jatuhtempo_self_fieldblock",true);
	else
		$xt->assign("tgl_jatuhtempo_self_tabfieldblock",true);
	$xt->assign("tgl_jatuhtempo_self_label",true);
	if(isEnableSection508())
		$xt->assign_section("tgl_jatuhtempo_self_label","<label for=\"".GetInputElementId("tgl_jatuhtempo_self", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("spt_denda"))
		$xt->assign("spt_denda_fieldblock",true);
	else
		$xt->assign("spt_denda_tabfieldblock",true);
	$xt->assign("spt_denda_label",true);
	if(isEnableSection508())
		$xt->assign_section("spt_denda_label","<label for=\"".GetInputElementId("spt_denda", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tgl_spt"))
		$xt->assign("tgl_spt_fieldblock",true);
	else
		$xt->assign("tgl_spt_tabfieldblock",true);
	$xt->assign("tgl_spt_label",true);
	if(isEnableSection508())
		$xt->assign_section("tgl_spt_label","<label for=\"".GetInputElementId("tgl_spt", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pad_bunga"))
		$xt->assign("pad_bunga_fieldblock",true);
	else
		$xt->assign("pad_bunga_tabfieldblock",true);
	$xt->assign("pad_bunga_label",true);
	if(isEnableSection508())
		$xt->assign_section("pad_bunga_label","<label for=\"".GetInputElementId("pad_bunga", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("fax"))
		$xt->assign("fax_fieldblock",true);
	else
		$xt->assign("fax_tabfieldblock",true);
	$xt->assign("fax_label",true);
	if(isEnableSection508())
		$xt->assign_section("fax_label","<label for=\"".GetInputElementId("fax", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("website"))
		$xt->assign("website_fieldblock",true);
	else
		$xt->assign("website_tabfieldblock",true);
	$xt->assign("website_label",true);
	if(isEnableSection508())
		$xt->assign_section("website_label","<label for=\"".GetInputElementId("website", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("email"))
		$xt->assign("email_fieldblock",true);
	else
		$xt->assign("email_tabfieldblock",true);
	$xt->assign("email_label",true);
	if(isEnableSection508())
		$xt->assign_section("email_label","<label for=\"".GetInputElementId("email", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("daerah"))
		$xt->assign("daerah_fieldblock",true);
	else
		$xt->assign("daerah_tabfieldblock",true);
	$xt->assign("daerah_label",true);
	if(isEnableSection508())
		$xt->assign_section("daerah_label","<label for=\"".GetInputElementId("daerah", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("alamat_lengkap"))
		$xt->assign("alamat_lengkap_fieldblock",true);
	else
		$xt->assign("alamat_lengkap_tabfieldblock",true);
	$xt->assign("alamat_lengkap_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_lengkap_label","<label for=\"".GetInputElementId("alamat_lengkap", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ppj_id"))
		$xt->assign("ppj_id_fieldblock",true);
	else
		$xt->assign("ppj_id_tabfieldblock",true);
	$xt->assign("ppj_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("ppj_id_label","<label for=\"".GetInputElementId("ppj_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("hotel_id"))
		$xt->assign("hotel_id_fieldblock",true);
	else
		$xt->assign("hotel_id_tabfieldblock",true);
	$xt->assign("hotel_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("hotel_id_label","<label for=\"".GetInputElementId("hotel_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("walet_id"))
		$xt->assign("walet_id_fieldblock",true);
	else
		$xt->assign("walet_id_tabfieldblock",true);
	$xt->assign("walet_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("walet_id_label","<label for=\"".GetInputElementId("walet_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("restauran_id"))
		$xt->assign("restauran_id_fieldblock",true);
	else
		$xt->assign("restauran_id_tabfieldblock",true);
	$xt->assign("restauran_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("restauran_id_label","<label for=\"".GetInputElementId("restauran_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("hiburan_id"))
		$xt->assign("hiburan_id_fieldblock",true);
	else
		$xt->assign("hiburan_id_tabfieldblock",true);
	$xt->assign("hiburan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("hiburan_id_label","<label for=\"".GetInputElementId("hiburan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_id"))
		$xt->assign("parkir_id_fieldblock",true);
	else
		$xt->assign("parkir_id_tabfieldblock",true);
	$xt->assign("parkir_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_id_label","<label for=\"".GetInputElementId("parkir_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("enabled"))
		$xt->assign("enabled_fieldblock",true);
	else
		$xt->assign("enabled_tabfieldblock",true);
	$xt->assign("enabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("enabled_label","<label for=\"".GetInputElementId("enabled", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("surat_no"))
		$xt->assign("surat_no_fieldblock",true);
	else
		$xt->assign("surat_no_tabfieldblock",true);
	$xt->assign("surat_no_label",true);
	if(isEnableSection508())
		$xt->assign_section("surat_no_label","<label for=\"".GetInputElementId("surat_no", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin_kd"))
		$xt->assign("ijin_kd_fieldblock",true);
	else
		$xt->assign("ijin_kd_tabfieldblock",true);
	$xt->assign("ijin_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin_kd_label","<label for=\"".GetInputElementId("ijin_kd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("hotel_kd"))
		$xt->assign("hotel_kd_fieldblock",true);
	else
		$xt->assign("hotel_kd_tabfieldblock",true);
	$xt->assign("hotel_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("hotel_kd_label","<label for=\"".GetInputElementId("hotel_kd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("restoran_kd"))
		$xt->assign("restoran_kd_fieldblock",true);
	else
		$xt->assign("restoran_kd_tabfieldblock",true);
	$xt->assign("restoran_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("restoran_kd_label","<label for=\"".GetInputElementId("restoran_kd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("hiburan_kd"))
		$xt->assign("hiburan_kd_fieldblock",true);
	else
		$xt->assign("hiburan_kd_tabfieldblock",true);
	$xt->assign("hiburan_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("hiburan_kd_label","<label for=\"".GetInputElementId("hiburan_kd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ppj_kd"))
		$xt->assign("ppj_kd_fieldblock",true);
	else
		$xt->assign("ppj_kd_tabfieldblock",true);
	$xt->assign("ppj_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("ppj_kd_label","<label for=\"".GetInputElementId("ppj_kd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("parkir_kd"))
		$xt->assign("parkir_kd_fieldblock",true);
	else
		$xt->assign("parkir_kd_tabfieldblock",true);
	$xt->assign("parkir_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_kd_label","<label for=\"".GetInputElementId("parkir_kd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("airtanah_kd"))
		$xt->assign("airtanah_kd_fieldblock",true);
	else
		$xt->assign("airtanah_kd_tabfieldblock",true);
	$xt->assign("airtanah_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("airtanah_kd_label","<label for=\"".GetInputElementId("airtanah_kd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("reklame_kd"))
		$xt->assign("reklame_kd_fieldblock",true);
	else
		$xt->assign("reklame_kd_tabfieldblock",true);
	$xt->assign("reklame_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("reklame_kd_label","<label for=\"".GetInputElementId("reklame_kd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("restauran_kd"))
		$xt->assign("restauran_kd_fieldblock",true);
	else
		$xt->assign("restauran_kd_tabfieldblock",true);
	$xt->assign("restauran_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("restauran_kd_label","<label for=\"".GetInputElementId("restauran_kd", $id, PAGE_ADD)."\">","</label>");
	
	
	
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
//	type
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("type", $data, $keylink);
		$showValues["type"] = $value;
		$showFields[] = "type";
	}	
//	kepala_nama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kepala_nama", $data, $keylink);
		$showValues["kepala_nama"] = $value;
		$showFields[] = "kepala_nama";
	}	
//	alamat
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("alamat", $data, $keylink);
		$showValues["alamat"] = $value;
		$showFields[] = "alamat";
	}	
//	telp
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("telp", $data, $keylink);
		$showValues["telp"] = $value;
		$showFields[] = "telp";
	}	
//	pemda_nama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pemda_nama", $data, $keylink);
		$showValues["pemda_nama"] = $value;
		$showFields[] = "pemda_nama";
	}	
//	ibukota
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ibukota", $data, $keylink);
		$showValues["ibukota"] = $value;
		$showFields[] = "ibukota";
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
//	jabatan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("jabatan", $data, $keylink);
		$showValues["jabatan"] = $value;
		$showFields[] = "jabatan";
	}	
//	ppkd_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ppkd_id", $data, $keylink);
		$showValues["ppkd_id"] = $value;
		$showFields[] = "ppkd_id";
	}	
//	reklame_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("reklame_id", $data, $keylink);
		$showValues["reklame_id"] = $value;
		$showFields[] = "reklame_id";
	}	
//	pendapatan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pendapatan_id", $data, $keylink);
		$showValues["pendapatan_id"] = $value;
		$showFields[] = "pendapatan_id";
	}	
//	pemda_nama_singkat
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pemda_nama_singkat", $data, $keylink);
		$showValues["pemda_nama_singkat"] = $value;
		$showFields[] = "pemda_nama_singkat";
	}	
//	airtanah_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("airtanah_id", $data, $keylink);
		$showValues["airtanah_id"] = $value;
		$showFields[] = "airtanah_id";
	}	
//	self_dok_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("self_dok_id", $data, $keylink);
		$showValues["self_dok_id"] = $value;
		$showFields[] = "self_dok_id";
	}	
//	office_dok_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("office_dok_id", $data, $keylink);
		$showValues["office_dok_id"] = $value;
		$showFields[] = "office_dok_id";
	}	
//	tgl_jatuhtempo_self
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tgl_jatuhtempo_self", $data, $keylink);
		$showValues["tgl_jatuhtempo_self"] = $value;
		$showFields[] = "tgl_jatuhtempo_self";
	}	
//	spt_denda
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("spt_denda", $data, $keylink);
		$showValues["spt_denda"] = $value;
		$showFields[] = "spt_denda";
	}	
//	tgl_spt
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tgl_spt", $data, $keylink);
		$showValues["tgl_spt"] = $value;
		$showFields[] = "tgl_spt";
	}	
//	pad_bunga
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pad_bunga", $data, $keylink);
		$showValues["pad_bunga"] = $value;
		$showFields[] = "pad_bunga";
	}	
//	fax
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("fax", $data, $keylink);
		$showValues["fax"] = $value;
		$showFields[] = "fax";
	}	
//	website
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("website", $data, $keylink);
		$showValues["website"] = $value;
		$showFields[] = "website";
	}	
//	email
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("email", $data, $keylink);
		$showValues["email"] = $value;
		$showFields[] = "email";
	}	
//	daerah
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("daerah", $data, $keylink);
		$showValues["daerah"] = $value;
		$showFields[] = "daerah";
	}	
//	alamat_lengkap
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("alamat_lengkap", $data, $keylink);
		$showValues["alamat_lengkap"] = $value;
		$showFields[] = "alamat_lengkap";
	}	
//	ppj_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ppj_id", $data, $keylink);
		$showValues["ppj_id"] = $value;
		$showFields[] = "ppj_id";
	}	
//	hotel_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("hotel_id", $data, $keylink);
		$showValues["hotel_id"] = $value;
		$showFields[] = "hotel_id";
	}	
//	walet_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("walet_id", $data, $keylink);
		$showValues["walet_id"] = $value;
		$showFields[] = "walet_id";
	}	
//	restauran_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("restauran_id", $data, $keylink);
		$showValues["restauran_id"] = $value;
		$showFields[] = "restauran_id";
	}	
//	hiburan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("hiburan_id", $data, $keylink);
		$showValues["hiburan_id"] = $value;
		$showFields[] = "hiburan_id";
	}	
//	parkir_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_id", $data, $keylink);
		$showValues["parkir_id"] = $value;
		$showFields[] = "parkir_id";
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
//	surat_no
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("surat_no", $data, $keylink);
		$showValues["surat_no"] = $value;
		$showFields[] = "surat_no";
	}	
//	ijin_kd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin_kd", $data, $keylink);
		$showValues["ijin_kd"] = $value;
		$showFields[] = "ijin_kd";
	}	
//	hotel_kd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("hotel_kd", $data, $keylink);
		$showValues["hotel_kd"] = $value;
		$showFields[] = "hotel_kd";
	}	
//	restoran_kd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("restoran_kd", $data, $keylink);
		$showValues["restoran_kd"] = $value;
		$showFields[] = "restoran_kd";
	}	
//	hiburan_kd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("hiburan_kd", $data, $keylink);
		$showValues["hiburan_kd"] = $value;
		$showFields[] = "hiburan_kd";
	}	
//	ppj_kd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ppj_kd", $data, $keylink);
		$showValues["ppj_kd"] = $value;
		$showFields[] = "ppj_kd";
	}	
//	parkir_kd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("parkir_kd", $data, $keylink);
		$showValues["parkir_kd"] = $value;
		$showFields[] = "parkir_kd";
	}	
//	airtanah_kd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("airtanah_kd", $data, $keylink);
		$showValues["airtanah_kd"] = $value;
		$showFields[] = "airtanah_kd";
	}	
//	reklame_kd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("reklame_kd", $data, $keylink);
		$showValues["reklame_kd"] = $value;
		$showFields[] = "reklame_kd";
	}	
//	restauran_kd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("restauran_kd", $data, $keylink);
		$showValues["restauran_kd"] = $value;
		$showFields[] = "restauran_kd";
	}	
		$showRawValues["id"] = substr($data["id"],0,100);
		$showRawValues["type"] = substr($data["type"],0,100);
		$showRawValues["kepala_nama"] = substr($data["kepala_nama"],0,100);
		$showRawValues["alamat"] = substr($data["alamat"],0,100);
		$showRawValues["telp"] = substr($data["telp"],0,100);
		$showRawValues["pemda_nama"] = substr($data["pemda_nama"],0,100);
		$showRawValues["ibukota"] = substr($data["ibukota"],0,100);
		$showRawValues["tmt"] = substr($data["tmt"],0,100);
		$showRawValues["jabatan"] = substr($data["jabatan"],0,100);
		$showRawValues["ppkd_id"] = substr($data["ppkd_id"],0,100);
		$showRawValues["reklame_id"] = substr($data["reklame_id"],0,100);
		$showRawValues["pendapatan_id"] = substr($data["pendapatan_id"],0,100);
		$showRawValues["pemda_nama_singkat"] = substr($data["pemda_nama_singkat"],0,100);
		$showRawValues["airtanah_id"] = substr($data["airtanah_id"],0,100);
		$showRawValues["self_dok_id"] = substr($data["self_dok_id"],0,100);
		$showRawValues["office_dok_id"] = substr($data["office_dok_id"],0,100);
		$showRawValues["tgl_jatuhtempo_self"] = substr($data["tgl_jatuhtempo_self"],0,100);
		$showRawValues["spt_denda"] = substr($data["spt_denda"],0,100);
		$showRawValues["tgl_spt"] = substr($data["tgl_spt"],0,100);
		$showRawValues["pad_bunga"] = substr($data["pad_bunga"],0,100);
		$showRawValues["fax"] = substr($data["fax"],0,100);
		$showRawValues["website"] = substr($data["website"],0,100);
		$showRawValues["email"] = substr($data["email"],0,100);
		$showRawValues["daerah"] = substr($data["daerah"],0,100);
		$showRawValues["alamat_lengkap"] = substr($data["alamat_lengkap"],0,100);
		$showRawValues["ppj_id"] = substr($data["ppj_id"],0,100);
		$showRawValues["hotel_id"] = substr($data["hotel_id"],0,100);
		$showRawValues["walet_id"] = substr($data["walet_id"],0,100);
		$showRawValues["restauran_id"] = substr($data["restauran_id"],0,100);
		$showRawValues["hiburan_id"] = substr($data["hiburan_id"],0,100);
		$showRawValues["parkir_id"] = substr($data["parkir_id"],0,100);
		$showRawValues["enabled"] = substr($data["enabled"],0,100);
		$showRawValues["surat_no"] = substr($data["surat_no"],0,100);
		$showRawValues["ijin_kd"] = substr($data["ijin_kd"],0,100);
		$showRawValues["hotel_kd"] = substr($data["hotel_kd"],0,100);
		$showRawValues["restoran_kd"] = substr($data["restoran_kd"],0,100);
		$showRawValues["hiburan_kd"] = substr($data["hiburan_kd"],0,100);
		$showRawValues["ppj_kd"] = substr($data["ppj_kd"],0,100);
		$showRawValues["parkir_kd"] = substr($data["parkir_kd"],0,100);
		$showRawValues["airtanah_kd"] = substr($data["airtanah_kd"],0,100);
		$showRawValues["reklame_kd"] = substr($data["reklame_kd"],0,100);
		$showRawValues["restauran_kd"] = substr($data["restauran_kd"],0,100);
	
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
		$options['masterTable'] = "pad.pad_pemda";
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
	$strTableName = "pad.pad_pemda";
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
