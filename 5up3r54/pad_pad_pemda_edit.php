<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_pemda_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_pemda_edit"] = $layout;




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

$templatefile = ($inlineedit == EDIT_INLINE) ? "pad_pad_pemda_inline_edit.htm" : "pad_pad_pemda_edit.htm";

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
	

//	processing type - begin
	$condition = 1;

	if($condition)
	{
		$control_type = $pageObject->getControl("type", $id);
		$control_type->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing type - end
//	processing kepala_nama - begin
	$condition = 1;

	if($condition)
	{
		$control_kepala_nama = $pageObject->getControl("kepala_nama", $id);
		$control_kepala_nama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kepala_nama - end
//	processing alamat - begin
	$condition = 1;

	if($condition)
	{
		$control_alamat = $pageObject->getControl("alamat", $id);
		$control_alamat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing alamat - end
//	processing telp - begin
	$condition = 1;

	if($condition)
	{
		$control_telp = $pageObject->getControl("telp", $id);
		$control_telp->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing telp - end
//	processing pemda_nama - begin
	$condition = 1;

	if($condition)
	{
		$control_pemda_nama = $pageObject->getControl("pemda_nama", $id);
		$control_pemda_nama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pemda_nama - end
//	processing ibukota - begin
	$condition = 1;

	if($condition)
	{
		$control_ibukota = $pageObject->getControl("ibukota", $id);
		$control_ibukota->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ibukota - end
//	processing tmt - begin
	$condition = 1;

	if($condition)
	{
		$control_tmt = $pageObject->getControl("tmt", $id);
		$control_tmt->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tmt - end
//	processing jabatan - begin
	$condition = 1;

	if($condition)
	{
		$control_jabatan = $pageObject->getControl("jabatan", $id);
		$control_jabatan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jabatan - end
//	processing ppkd_id - begin
	$condition = 1;

	if($condition)
	{
		$control_ppkd_id = $pageObject->getControl("ppkd_id", $id);
		$control_ppkd_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ppkd_id - end
//	processing reklame_id - begin
	$condition = 1;

	if($condition)
	{
		$control_reklame_id = $pageObject->getControl("reklame_id", $id);
		$control_reklame_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing reklame_id - end
//	processing pendapatan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_pendapatan_id = $pageObject->getControl("pendapatan_id", $id);
		$control_pendapatan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pendapatan_id - end
//	processing pemda_nama_singkat - begin
	$condition = 1;

	if($condition)
	{
		$control_pemda_nama_singkat = $pageObject->getControl("pemda_nama_singkat", $id);
		$control_pemda_nama_singkat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pemda_nama_singkat - end
//	processing airtanah_id - begin
	$condition = 1;

	if($condition)
	{
		$control_airtanah_id = $pageObject->getControl("airtanah_id", $id);
		$control_airtanah_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing airtanah_id - end
//	processing self_dok_id - begin
	$condition = 1;

	if($condition)
	{
		$control_self_dok_id = $pageObject->getControl("self_dok_id", $id);
		$control_self_dok_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing self_dok_id - end
//	processing office_dok_id - begin
	$condition = 1;

	if($condition)
	{
		$control_office_dok_id = $pageObject->getControl("office_dok_id", $id);
		$control_office_dok_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing office_dok_id - end
//	processing tgl_jatuhtempo_self - begin
	$condition = 1;

	if($condition)
	{
		$control_tgl_jatuhtempo_self = $pageObject->getControl("tgl_jatuhtempo_self", $id);
		$control_tgl_jatuhtempo_self->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tgl_jatuhtempo_self - end
//	processing spt_denda - begin
	$condition = 1;

	if($condition)
	{
		$control_spt_denda = $pageObject->getControl("spt_denda", $id);
		$control_spt_denda->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing spt_denda - end
//	processing tgl_spt - begin
	$condition = 1;

	if($condition)
	{
		$control_tgl_spt = $pageObject->getControl("tgl_spt", $id);
		$control_tgl_spt->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tgl_spt - end
//	processing pad_bunga - begin
	$condition = 1;

	if($condition)
	{
		$control_pad_bunga = $pageObject->getControl("pad_bunga", $id);
		$control_pad_bunga->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pad_bunga - end
//	processing fax - begin
	$condition = 1;

	if($condition)
	{
		$control_fax = $pageObject->getControl("fax", $id);
		$control_fax->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing fax - end
//	processing website - begin
	$condition = 1;

	if($condition)
	{
		$control_website = $pageObject->getControl("website", $id);
		$control_website->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing website - end
//	processing email - begin
	$condition = 1;

	if($condition)
	{
		$control_email = $pageObject->getControl("email", $id);
		$control_email->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing email - end
//	processing daerah - begin
	$condition = 1;

	if($condition)
	{
		$control_daerah = $pageObject->getControl("daerah", $id);
		$control_daerah->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing daerah - end
//	processing alamat_lengkap - begin
	$condition = 1;

	if($condition)
	{
		$control_alamat_lengkap = $pageObject->getControl("alamat_lengkap", $id);
		$control_alamat_lengkap->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing alamat_lengkap - end
//	processing ppj_id - begin
	$condition = 1;

	if($condition)
	{
		$control_ppj_id = $pageObject->getControl("ppj_id", $id);
		$control_ppj_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ppj_id - end
//	processing hotel_id - begin
	$condition = 1;

	if($condition)
	{
		$control_hotel_id = $pageObject->getControl("hotel_id", $id);
		$control_hotel_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing hotel_id - end
//	processing walet_id - begin
	$condition = 1;

	if($condition)
	{
		$control_walet_id = $pageObject->getControl("walet_id", $id);
		$control_walet_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing walet_id - end
//	processing restauran_id - begin
	$condition = 1;

	if($condition)
	{
		$control_restauran_id = $pageObject->getControl("restauran_id", $id);
		$control_restauran_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing restauran_id - end
//	processing hiburan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_hiburan_id = $pageObject->getControl("hiburan_id", $id);
		$control_hiburan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing hiburan_id - end
//	processing parkir_id - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_id = $pageObject->getControl("parkir_id", $id);
		$control_parkir_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_id - end
//	processing enabled - begin
	$condition = 1;

	if($condition)
	{
		$control_enabled = $pageObject->getControl("enabled", $id);
		$control_enabled->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing enabled - end
//	processing surat_no - begin
	$condition = 1;

	if($condition)
	{
		$control_surat_no = $pageObject->getControl("surat_no", $id);
		$control_surat_no->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing surat_no - end
//	processing ijin_kd - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin_kd = $pageObject->getControl("ijin_kd", $id);
		$control_ijin_kd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin_kd - end
//	processing hotel_kd - begin
	$condition = 1;

	if($condition)
	{
		$control_hotel_kd = $pageObject->getControl("hotel_kd", $id);
		$control_hotel_kd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing hotel_kd - end
//	processing restoran_kd - begin
	$condition = 1;

	if($condition)
	{
		$control_restoran_kd = $pageObject->getControl("restoran_kd", $id);
		$control_restoran_kd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing restoran_kd - end
//	processing hiburan_kd - begin
	$condition = 1;

	if($condition)
	{
		$control_hiburan_kd = $pageObject->getControl("hiburan_kd", $id);
		$control_hiburan_kd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing hiburan_kd - end
//	processing ppj_kd - begin
	$condition = 1;

	if($condition)
	{
		$control_ppj_kd = $pageObject->getControl("ppj_kd", $id);
		$control_ppj_kd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ppj_kd - end
//	processing parkir_kd - begin
	$condition = 1;

	if($condition)
	{
		$control_parkir_kd = $pageObject->getControl("parkir_kd", $id);
		$control_parkir_kd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parkir_kd - end
//	processing airtanah_kd - begin
	$condition = 1;

	if($condition)
	{
		$control_airtanah_kd = $pageObject->getControl("airtanah_kd", $id);
		$control_airtanah_kd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing airtanah_kd - end
//	processing reklame_kd - begin
	$condition = 1;

	if($condition)
	{
		$control_reklame_kd = $pageObject->getControl("reklame_kd", $id);
		$control_reklame_kd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing reklame_kd - end
//	processing restauran_kd - begin
	$condition = 1;

	if($condition)
	{
		$control_restauran_kd = $pageObject->getControl("restauran_kd", $id);
		$control_restauran_kd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing restauran_kd - end

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
			//	processing type - begin
							$condition = 1;
			
				if($condition)
				{
					$control_type->afterSuccessfulSave();
				}
	//	processing type - end
			//	processing kepala_nama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kepala_nama->afterSuccessfulSave();
				}
	//	processing kepala_nama - end
			//	processing alamat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_alamat->afterSuccessfulSave();
				}
	//	processing alamat - end
			//	processing telp - begin
							$condition = 1;
			
				if($condition)
				{
					$control_telp->afterSuccessfulSave();
				}
	//	processing telp - end
			//	processing pemda_nama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pemda_nama->afterSuccessfulSave();
				}
	//	processing pemda_nama - end
			//	processing ibukota - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ibukota->afterSuccessfulSave();
				}
	//	processing ibukota - end
			//	processing tmt - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tmt->afterSuccessfulSave();
				}
	//	processing tmt - end
			//	processing jabatan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jabatan->afterSuccessfulSave();
				}
	//	processing jabatan - end
			//	processing ppkd_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ppkd_id->afterSuccessfulSave();
				}
	//	processing ppkd_id - end
			//	processing reklame_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_reklame_id->afterSuccessfulSave();
				}
	//	processing reklame_id - end
			//	processing pendapatan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pendapatan_id->afterSuccessfulSave();
				}
	//	processing pendapatan_id - end
			//	processing pemda_nama_singkat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pemda_nama_singkat->afterSuccessfulSave();
				}
	//	processing pemda_nama_singkat - end
			//	processing airtanah_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_airtanah_id->afterSuccessfulSave();
				}
	//	processing airtanah_id - end
			//	processing self_dok_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_self_dok_id->afterSuccessfulSave();
				}
	//	processing self_dok_id - end
			//	processing office_dok_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_office_dok_id->afterSuccessfulSave();
				}
	//	processing office_dok_id - end
			//	processing tgl_jatuhtempo_self - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tgl_jatuhtempo_self->afterSuccessfulSave();
				}
	//	processing tgl_jatuhtempo_self - end
			//	processing spt_denda - begin
							$condition = 1;
			
				if($condition)
				{
					$control_spt_denda->afterSuccessfulSave();
				}
	//	processing spt_denda - end
			//	processing tgl_spt - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tgl_spt->afterSuccessfulSave();
				}
	//	processing tgl_spt - end
			//	processing pad_bunga - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pad_bunga->afterSuccessfulSave();
				}
	//	processing pad_bunga - end
			//	processing fax - begin
							$condition = 1;
			
				if($condition)
				{
					$control_fax->afterSuccessfulSave();
				}
	//	processing fax - end
			//	processing website - begin
							$condition = 1;
			
				if($condition)
				{
					$control_website->afterSuccessfulSave();
				}
	//	processing website - end
			//	processing email - begin
							$condition = 1;
			
				if($condition)
				{
					$control_email->afterSuccessfulSave();
				}
	//	processing email - end
			//	processing daerah - begin
							$condition = 1;
			
				if($condition)
				{
					$control_daerah->afterSuccessfulSave();
				}
	//	processing daerah - end
			//	processing alamat_lengkap - begin
							$condition = 1;
			
				if($condition)
				{
					$control_alamat_lengkap->afterSuccessfulSave();
				}
	//	processing alamat_lengkap - end
			//	processing ppj_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ppj_id->afterSuccessfulSave();
				}
	//	processing ppj_id - end
			//	processing hotel_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_hotel_id->afterSuccessfulSave();
				}
	//	processing hotel_id - end
			//	processing walet_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_walet_id->afterSuccessfulSave();
				}
	//	processing walet_id - end
			//	processing restauran_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_restauran_id->afterSuccessfulSave();
				}
	//	processing restauran_id - end
			//	processing hiburan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_hiburan_id->afterSuccessfulSave();
				}
	//	processing hiburan_id - end
			//	processing parkir_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_id->afterSuccessfulSave();
				}
	//	processing parkir_id - end
			//	processing enabled - begin
							$condition = 1;
			
				if($condition)
				{
					$control_enabled->afterSuccessfulSave();
				}
	//	processing enabled - end
			//	processing surat_no - begin
							$condition = 1;
			
				if($condition)
				{
					$control_surat_no->afterSuccessfulSave();
				}
	//	processing surat_no - end
			//	processing ijin_kd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin_kd->afterSuccessfulSave();
				}
	//	processing ijin_kd - end
			//	processing hotel_kd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_hotel_kd->afterSuccessfulSave();
				}
	//	processing hotel_kd - end
			//	processing restoran_kd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_restoran_kd->afterSuccessfulSave();
				}
	//	processing restoran_kd - end
			//	processing hiburan_kd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_hiburan_kd->afterSuccessfulSave();
				}
	//	processing hiburan_kd - end
			//	processing ppj_kd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ppj_kd->afterSuccessfulSave();
				}
	//	processing ppj_kd - end
			//	processing parkir_kd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parkir_kd->afterSuccessfulSave();
				}
	//	processing parkir_kd - end
			//	processing airtanah_kd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_airtanah_kd->afterSuccessfulSave();
				}
	//	processing airtanah_kd - end
			//	processing reklame_kd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_reklame_kd->afterSuccessfulSave();
				}
	//	processing reklame_kd - end
			//	processing restauran_kd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_restauran_kd->afterSuccessfulSave();
				}
	//	processing restauran_kd - end
				
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
	header("Location: pad_pad_pemda_".$pageObject->getPageType().".php?".$keyGetQ);
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
		header("Location: pad_pad_pemda_list.php?a=return");
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
	$data["type"] = $evalues["type"];
	$data["kepala_nama"] = $evalues["kepala_nama"];
	$data["alamat"] = $evalues["alamat"];
	$data["telp"] = $evalues["telp"];
	$data["pemda_nama"] = $evalues["pemda_nama"];
	$data["ibukota"] = $evalues["ibukota"];
	$data["tmt"] = $evalues["tmt"];
	$data["jabatan"] = $evalues["jabatan"];
	$data["ppkd_id"] = $evalues["ppkd_id"];
	$data["reklame_id"] = $evalues["reklame_id"];
	$data["pendapatan_id"] = $evalues["pendapatan_id"];
	$data["pemda_nama_singkat"] = $evalues["pemda_nama_singkat"];
	$data["airtanah_id"] = $evalues["airtanah_id"];
	$data["self_dok_id"] = $evalues["self_dok_id"];
	$data["office_dok_id"] = $evalues["office_dok_id"];
	$data["tgl_jatuhtempo_self"] = $evalues["tgl_jatuhtempo_self"];
	$data["spt_denda"] = $evalues["spt_denda"];
	$data["tgl_spt"] = $evalues["tgl_spt"];
	$data["pad_bunga"] = $evalues["pad_bunga"];
	$data["fax"] = $evalues["fax"];
	$data["website"] = $evalues["website"];
	$data["email"] = $evalues["email"];
	$data["daerah"] = $evalues["daerah"];
	$data["alamat_lengkap"] = $evalues["alamat_lengkap"];
	$data["ppj_id"] = $evalues["ppj_id"];
	$data["hotel_id"] = $evalues["hotel_id"];
	$data["walet_id"] = $evalues["walet_id"];
	$data["restauran_id"] = $evalues["restauran_id"];
	$data["hiburan_id"] = $evalues["hiburan_id"];
	$data["parkir_id"] = $evalues["parkir_id"];
	$data["enabled"] = $evalues["enabled"];
	$data["surat_no"] = $evalues["surat_no"];
	$data["ijin_kd"] = $evalues["ijin_kd"];
	$data["hotel_kd"] = $evalues["hotel_kd"];
	$data["restoran_kd"] = $evalues["restoran_kd"];
	$data["hiburan_kd"] = $evalues["hiburan_kd"];
	$data["ppj_kd"] = $evalues["ppj_kd"];
	$data["parkir_kd"] = $evalues["parkir_kd"];
	$data["airtanah_kd"] = $evalues["airtanah_kd"];
	$data["reklame_kd"] = $evalues["reklame_kd"];
	$data["restauran_kd"] = $evalues["restauran_kd"];
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

	if(!$pageObject->isAppearOnTabs("type"))
		$xt->assign("type_fieldblock",true);
	else
		$xt->assign("type_tabfieldblock",true);
	$xt->assign("type_label",true);
	if(isEnableSection508())
		$xt->assign_section("type_label","<label for=\"".GetInputElementId("type", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kepala_nama"))
		$xt->assign("kepala_nama_fieldblock",true);
	else
		$xt->assign("kepala_nama_tabfieldblock",true);
	$xt->assign("kepala_nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("kepala_nama_label","<label for=\"".GetInputElementId("kepala_nama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("alamat"))
		$xt->assign("alamat_fieldblock",true);
	else
		$xt->assign("alamat_tabfieldblock",true);
	$xt->assign("alamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_label","<label for=\"".GetInputElementId("alamat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("telp"))
		$xt->assign("telp_fieldblock",true);
	else
		$xt->assign("telp_tabfieldblock",true);
	$xt->assign("telp_label",true);
	if(isEnableSection508())
		$xt->assign_section("telp_label","<label for=\"".GetInputElementId("telp", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pemda_nama"))
		$xt->assign("pemda_nama_fieldblock",true);
	else
		$xt->assign("pemda_nama_tabfieldblock",true);
	$xt->assign("pemda_nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("pemda_nama_label","<label for=\"".GetInputElementId("pemda_nama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ibukota"))
		$xt->assign("ibukota_fieldblock",true);
	else
		$xt->assign("ibukota_tabfieldblock",true);
	$xt->assign("ibukota_label",true);
	if(isEnableSection508())
		$xt->assign_section("ibukota_label","<label for=\"".GetInputElementId("ibukota", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tmt"))
		$xt->assign("tmt_fieldblock",true);
	else
		$xt->assign("tmt_tabfieldblock",true);
	$xt->assign("tmt_label",true);
	if(isEnableSection508())
		$xt->assign_section("tmt_label","<label for=\"".GetInputElementId("tmt", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jabatan"))
		$xt->assign("jabatan_fieldblock",true);
	else
		$xt->assign("jabatan_tabfieldblock",true);
	$xt->assign("jabatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("jabatan_label","<label for=\"".GetInputElementId("jabatan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ppkd_id"))
		$xt->assign("ppkd_id_fieldblock",true);
	else
		$xt->assign("ppkd_id_tabfieldblock",true);
	$xt->assign("ppkd_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("ppkd_id_label","<label for=\"".GetInputElementId("ppkd_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("reklame_id"))
		$xt->assign("reklame_id_fieldblock",true);
	else
		$xt->assign("reklame_id_tabfieldblock",true);
	$xt->assign("reklame_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("reklame_id_label","<label for=\"".GetInputElementId("reklame_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pendapatan_id"))
		$xt->assign("pendapatan_id_fieldblock",true);
	else
		$xt->assign("pendapatan_id_tabfieldblock",true);
	$xt->assign("pendapatan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("pendapatan_id_label","<label for=\"".GetInputElementId("pendapatan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pemda_nama_singkat"))
		$xt->assign("pemda_nama_singkat_fieldblock",true);
	else
		$xt->assign("pemda_nama_singkat_tabfieldblock",true);
	$xt->assign("pemda_nama_singkat_label",true);
	if(isEnableSection508())
		$xt->assign_section("pemda_nama_singkat_label","<label for=\"".GetInputElementId("pemda_nama_singkat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("airtanah_id"))
		$xt->assign("airtanah_id_fieldblock",true);
	else
		$xt->assign("airtanah_id_tabfieldblock",true);
	$xt->assign("airtanah_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("airtanah_id_label","<label for=\"".GetInputElementId("airtanah_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("self_dok_id"))
		$xt->assign("self_dok_id_fieldblock",true);
	else
		$xt->assign("self_dok_id_tabfieldblock",true);
	$xt->assign("self_dok_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("self_dok_id_label","<label for=\"".GetInputElementId("self_dok_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("office_dok_id"))
		$xt->assign("office_dok_id_fieldblock",true);
	else
		$xt->assign("office_dok_id_tabfieldblock",true);
	$xt->assign("office_dok_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("office_dok_id_label","<label for=\"".GetInputElementId("office_dok_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tgl_jatuhtempo_self"))
		$xt->assign("tgl_jatuhtempo_self_fieldblock",true);
	else
		$xt->assign("tgl_jatuhtempo_self_tabfieldblock",true);
	$xt->assign("tgl_jatuhtempo_self_label",true);
	if(isEnableSection508())
		$xt->assign_section("tgl_jatuhtempo_self_label","<label for=\"".GetInputElementId("tgl_jatuhtempo_self", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("spt_denda"))
		$xt->assign("spt_denda_fieldblock",true);
	else
		$xt->assign("spt_denda_tabfieldblock",true);
	$xt->assign("spt_denda_label",true);
	if(isEnableSection508())
		$xt->assign_section("spt_denda_label","<label for=\"".GetInputElementId("spt_denda", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tgl_spt"))
		$xt->assign("tgl_spt_fieldblock",true);
	else
		$xt->assign("tgl_spt_tabfieldblock",true);
	$xt->assign("tgl_spt_label",true);
	if(isEnableSection508())
		$xt->assign_section("tgl_spt_label","<label for=\"".GetInputElementId("tgl_spt", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pad_bunga"))
		$xt->assign("pad_bunga_fieldblock",true);
	else
		$xt->assign("pad_bunga_tabfieldblock",true);
	$xt->assign("pad_bunga_label",true);
	if(isEnableSection508())
		$xt->assign_section("pad_bunga_label","<label for=\"".GetInputElementId("pad_bunga", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("fax"))
		$xt->assign("fax_fieldblock",true);
	else
		$xt->assign("fax_tabfieldblock",true);
	$xt->assign("fax_label",true);
	if(isEnableSection508())
		$xt->assign_section("fax_label","<label for=\"".GetInputElementId("fax", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("website"))
		$xt->assign("website_fieldblock",true);
	else
		$xt->assign("website_tabfieldblock",true);
	$xt->assign("website_label",true);
	if(isEnableSection508())
		$xt->assign_section("website_label","<label for=\"".GetInputElementId("website", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("email"))
		$xt->assign("email_fieldblock",true);
	else
		$xt->assign("email_tabfieldblock",true);
	$xt->assign("email_label",true);
	if(isEnableSection508())
		$xt->assign_section("email_label","<label for=\"".GetInputElementId("email", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("daerah"))
		$xt->assign("daerah_fieldblock",true);
	else
		$xt->assign("daerah_tabfieldblock",true);
	$xt->assign("daerah_label",true);
	if(isEnableSection508())
		$xt->assign_section("daerah_label","<label for=\"".GetInputElementId("daerah", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("alamat_lengkap"))
		$xt->assign("alamat_lengkap_fieldblock",true);
	else
		$xt->assign("alamat_lengkap_tabfieldblock",true);
	$xt->assign("alamat_lengkap_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_lengkap_label","<label for=\"".GetInputElementId("alamat_lengkap", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ppj_id"))
		$xt->assign("ppj_id_fieldblock",true);
	else
		$xt->assign("ppj_id_tabfieldblock",true);
	$xt->assign("ppj_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("ppj_id_label","<label for=\"".GetInputElementId("ppj_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("hotel_id"))
		$xt->assign("hotel_id_fieldblock",true);
	else
		$xt->assign("hotel_id_tabfieldblock",true);
	$xt->assign("hotel_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("hotel_id_label","<label for=\"".GetInputElementId("hotel_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("walet_id"))
		$xt->assign("walet_id_fieldblock",true);
	else
		$xt->assign("walet_id_tabfieldblock",true);
	$xt->assign("walet_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("walet_id_label","<label for=\"".GetInputElementId("walet_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("restauran_id"))
		$xt->assign("restauran_id_fieldblock",true);
	else
		$xt->assign("restauran_id_tabfieldblock",true);
	$xt->assign("restauran_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("restauran_id_label","<label for=\"".GetInputElementId("restauran_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("hiburan_id"))
		$xt->assign("hiburan_id_fieldblock",true);
	else
		$xt->assign("hiburan_id_tabfieldblock",true);
	$xt->assign("hiburan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("hiburan_id_label","<label for=\"".GetInputElementId("hiburan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_id"))
		$xt->assign("parkir_id_fieldblock",true);
	else
		$xt->assign("parkir_id_tabfieldblock",true);
	$xt->assign("parkir_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_id_label","<label for=\"".GetInputElementId("parkir_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("enabled"))
		$xt->assign("enabled_fieldblock",true);
	else
		$xt->assign("enabled_tabfieldblock",true);
	$xt->assign("enabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("enabled_label","<label for=\"".GetInputElementId("enabled", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("surat_no"))
		$xt->assign("surat_no_fieldblock",true);
	else
		$xt->assign("surat_no_tabfieldblock",true);
	$xt->assign("surat_no_label",true);
	if(isEnableSection508())
		$xt->assign_section("surat_no_label","<label for=\"".GetInputElementId("surat_no", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin_kd"))
		$xt->assign("ijin_kd_fieldblock",true);
	else
		$xt->assign("ijin_kd_tabfieldblock",true);
	$xt->assign("ijin_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin_kd_label","<label for=\"".GetInputElementId("ijin_kd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("hotel_kd"))
		$xt->assign("hotel_kd_fieldblock",true);
	else
		$xt->assign("hotel_kd_tabfieldblock",true);
	$xt->assign("hotel_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("hotel_kd_label","<label for=\"".GetInputElementId("hotel_kd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("restoran_kd"))
		$xt->assign("restoran_kd_fieldblock",true);
	else
		$xt->assign("restoran_kd_tabfieldblock",true);
	$xt->assign("restoran_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("restoran_kd_label","<label for=\"".GetInputElementId("restoran_kd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("hiburan_kd"))
		$xt->assign("hiburan_kd_fieldblock",true);
	else
		$xt->assign("hiburan_kd_tabfieldblock",true);
	$xt->assign("hiburan_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("hiburan_kd_label","<label for=\"".GetInputElementId("hiburan_kd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ppj_kd"))
		$xt->assign("ppj_kd_fieldblock",true);
	else
		$xt->assign("ppj_kd_tabfieldblock",true);
	$xt->assign("ppj_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("ppj_kd_label","<label for=\"".GetInputElementId("ppj_kd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("parkir_kd"))
		$xt->assign("parkir_kd_fieldblock",true);
	else
		$xt->assign("parkir_kd_tabfieldblock",true);
	$xt->assign("parkir_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("parkir_kd_label","<label for=\"".GetInputElementId("parkir_kd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("airtanah_kd"))
		$xt->assign("airtanah_kd_fieldblock",true);
	else
		$xt->assign("airtanah_kd_tabfieldblock",true);
	$xt->assign("airtanah_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("airtanah_kd_label","<label for=\"".GetInputElementId("airtanah_kd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("reklame_kd"))
		$xt->assign("reklame_kd_fieldblock",true);
	else
		$xt->assign("reklame_kd_tabfieldblock",true);
	$xt->assign("reklame_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("reklame_kd_label","<label for=\"".GetInputElementId("reklame_kd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("restauran_kd"))
		$xt->assign("restauran_kd_fieldblock",true);
	else
		$xt->assign("restauran_kd_tabfieldblock",true);
	$xt->assign("restauran_kd_label",true);
	if(isEnableSection508())
		$xt->assign_section("restauran_kd_label","<label for=\"".GetInputElementId("restauran_kd", $id, PAGE_EDIT)."\">","</label>");
		

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

	$keylink = "";
	$keylink.= "&key1=".htmlspecialchars(rawurlencode(@$data["id"]));


//	id - 
	$value = $pageObject->showDBValue("id", $data, $keylink);
	$showValues["id"] = $value;
	$showFields[] = "id";
		$showRawValues["id"] = substr($data["id"],0,100);

//	type - 
	$value = $pageObject->showDBValue("type", $data, $keylink);
	$showValues["type"] = $value;
	$showFields[] = "type";
		$showRawValues["type"] = substr($data["type"],0,100);

//	kepala_nama - 
	$value = $pageObject->showDBValue("kepala_nama", $data, $keylink);
	$showValues["kepala_nama"] = $value;
	$showFields[] = "kepala_nama";
		$showRawValues["kepala_nama"] = substr($data["kepala_nama"],0,100);

//	alamat - 
	$value = $pageObject->showDBValue("alamat", $data, $keylink);
	$showValues["alamat"] = $value;
	$showFields[] = "alamat";
		$showRawValues["alamat"] = substr($data["alamat"],0,100);

//	telp - 
	$value = $pageObject->showDBValue("telp", $data, $keylink);
	$showValues["telp"] = $value;
	$showFields[] = "telp";
		$showRawValues["telp"] = substr($data["telp"],0,100);

//	pemda_nama - 
	$value = $pageObject->showDBValue("pemda_nama", $data, $keylink);
	$showValues["pemda_nama"] = $value;
	$showFields[] = "pemda_nama";
		$showRawValues["pemda_nama"] = substr($data["pemda_nama"],0,100);

//	ibukota - 
	$value = $pageObject->showDBValue("ibukota", $data, $keylink);
	$showValues["ibukota"] = $value;
	$showFields[] = "ibukota";
		$showRawValues["ibukota"] = substr($data["ibukota"],0,100);

//	tmt - Short Date
	$value = $pageObject->showDBValue("tmt", $data, $keylink);
	$showValues["tmt"] = $value;
	$showFields[] = "tmt";
		$showRawValues["tmt"] = substr($data["tmt"],0,100);

//	jabatan - 
	$value = $pageObject->showDBValue("jabatan", $data, $keylink);
	$showValues["jabatan"] = $value;
	$showFields[] = "jabatan";
		$showRawValues["jabatan"] = substr($data["jabatan"],0,100);

//	ppkd_id - 
	$value = $pageObject->showDBValue("ppkd_id", $data, $keylink);
	$showValues["ppkd_id"] = $value;
	$showFields[] = "ppkd_id";
		$showRawValues["ppkd_id"] = substr($data["ppkd_id"],0,100);

//	reklame_id - 
	$value = $pageObject->showDBValue("reklame_id", $data, $keylink);
	$showValues["reklame_id"] = $value;
	$showFields[] = "reklame_id";
		$showRawValues["reklame_id"] = substr($data["reklame_id"],0,100);

//	pendapatan_id - 
	$value = $pageObject->showDBValue("pendapatan_id", $data, $keylink);
	$showValues["pendapatan_id"] = $value;
	$showFields[] = "pendapatan_id";
		$showRawValues["pendapatan_id"] = substr($data["pendapatan_id"],0,100);

//	pemda_nama_singkat - 
	$value = $pageObject->showDBValue("pemda_nama_singkat", $data, $keylink);
	$showValues["pemda_nama_singkat"] = $value;
	$showFields[] = "pemda_nama_singkat";
		$showRawValues["pemda_nama_singkat"] = substr($data["pemda_nama_singkat"],0,100);

//	airtanah_id - 
	$value = $pageObject->showDBValue("airtanah_id", $data, $keylink);
	$showValues["airtanah_id"] = $value;
	$showFields[] = "airtanah_id";
		$showRawValues["airtanah_id"] = substr($data["airtanah_id"],0,100);

//	self_dok_id - 
	$value = $pageObject->showDBValue("self_dok_id", $data, $keylink);
	$showValues["self_dok_id"] = $value;
	$showFields[] = "self_dok_id";
		$showRawValues["self_dok_id"] = substr($data["self_dok_id"],0,100);

//	office_dok_id - 
	$value = $pageObject->showDBValue("office_dok_id", $data, $keylink);
	$showValues["office_dok_id"] = $value;
	$showFields[] = "office_dok_id";
		$showRawValues["office_dok_id"] = substr($data["office_dok_id"],0,100);

//	tgl_jatuhtempo_self - 
	$value = $pageObject->showDBValue("tgl_jatuhtempo_self", $data, $keylink);
	$showValues["tgl_jatuhtempo_self"] = $value;
	$showFields[] = "tgl_jatuhtempo_self";
		$showRawValues["tgl_jatuhtempo_self"] = substr($data["tgl_jatuhtempo_self"],0,100);

//	spt_denda - Number
	$value = $pageObject->showDBValue("spt_denda", $data, $keylink);
	$showValues["spt_denda"] = $value;
	$showFields[] = "spt_denda";
		$showRawValues["spt_denda"] = substr($data["spt_denda"],0,100);

//	tgl_spt - 
	$value = $pageObject->showDBValue("tgl_spt", $data, $keylink);
	$showValues["tgl_spt"] = $value;
	$showFields[] = "tgl_spt";
		$showRawValues["tgl_spt"] = substr($data["tgl_spt"],0,100);

//	pad_bunga - Number
	$value = $pageObject->showDBValue("pad_bunga", $data, $keylink);
	$showValues["pad_bunga"] = $value;
	$showFields[] = "pad_bunga";
		$showRawValues["pad_bunga"] = substr($data["pad_bunga"],0,100);

//	fax - 
	$value = $pageObject->showDBValue("fax", $data, $keylink);
	$showValues["fax"] = $value;
	$showFields[] = "fax";
		$showRawValues["fax"] = substr($data["fax"],0,100);

//	website - 
	$value = $pageObject->showDBValue("website", $data, $keylink);
	$showValues["website"] = $value;
	$showFields[] = "website";
		$showRawValues["website"] = substr($data["website"],0,100);

//	email - 
	$value = $pageObject->showDBValue("email", $data, $keylink);
	$showValues["email"] = $value;
	$showFields[] = "email";
		$showRawValues["email"] = substr($data["email"],0,100);

//	daerah - 
	$value = $pageObject->showDBValue("daerah", $data, $keylink);
	$showValues["daerah"] = $value;
	$showFields[] = "daerah";
		$showRawValues["daerah"] = substr($data["daerah"],0,100);

//	alamat_lengkap - 
	$value = $pageObject->showDBValue("alamat_lengkap", $data, $keylink);
	$showValues["alamat_lengkap"] = $value;
	$showFields[] = "alamat_lengkap";
		$showRawValues["alamat_lengkap"] = substr($data["alamat_lengkap"],0,100);

//	ppj_id - 
	$value = $pageObject->showDBValue("ppj_id", $data, $keylink);
	$showValues["ppj_id"] = $value;
	$showFields[] = "ppj_id";
		$showRawValues["ppj_id"] = substr($data["ppj_id"],0,100);

//	hotel_id - 
	$value = $pageObject->showDBValue("hotel_id", $data, $keylink);
	$showValues["hotel_id"] = $value;
	$showFields[] = "hotel_id";
		$showRawValues["hotel_id"] = substr($data["hotel_id"],0,100);

//	walet_id - 
	$value = $pageObject->showDBValue("walet_id", $data, $keylink);
	$showValues["walet_id"] = $value;
	$showFields[] = "walet_id";
		$showRawValues["walet_id"] = substr($data["walet_id"],0,100);

//	restauran_id - 
	$value = $pageObject->showDBValue("restauran_id", $data, $keylink);
	$showValues["restauran_id"] = $value;
	$showFields[] = "restauran_id";
		$showRawValues["restauran_id"] = substr($data["restauran_id"],0,100);

//	hiburan_id - 
	$value = $pageObject->showDBValue("hiburan_id", $data, $keylink);
	$showValues["hiburan_id"] = $value;
	$showFields[] = "hiburan_id";
		$showRawValues["hiburan_id"] = substr($data["hiburan_id"],0,100);

//	parkir_id - 
	$value = $pageObject->showDBValue("parkir_id", $data, $keylink);
	$showValues["parkir_id"] = $value;
	$showFields[] = "parkir_id";
		$showRawValues["parkir_id"] = substr($data["parkir_id"],0,100);

//	enabled - 
	$value = $pageObject->showDBValue("enabled", $data, $keylink);
	$showValues["enabled"] = $value;
	$showFields[] = "enabled";
		$showRawValues["enabled"] = substr($data["enabled"],0,100);

//	surat_no - 
	$value = $pageObject->showDBValue("surat_no", $data, $keylink);
	$showValues["surat_no"] = $value;
	$showFields[] = "surat_no";
		$showRawValues["surat_no"] = substr($data["surat_no"],0,100);

//	ijin_kd - 
	$value = $pageObject->showDBValue("ijin_kd", $data, $keylink);
	$showValues["ijin_kd"] = $value;
	$showFields[] = "ijin_kd";
		$showRawValues["ijin_kd"] = substr($data["ijin_kd"],0,100);

//	hotel_kd - 
	$value = $pageObject->showDBValue("hotel_kd", $data, $keylink);
	$showValues["hotel_kd"] = $value;
	$showFields[] = "hotel_kd";
		$showRawValues["hotel_kd"] = substr($data["hotel_kd"],0,100);

//	restoran_kd - 
	$value = $pageObject->showDBValue("restoran_kd", $data, $keylink);
	$showValues["restoran_kd"] = $value;
	$showFields[] = "restoran_kd";
		$showRawValues["restoran_kd"] = substr($data["restoran_kd"],0,100);

//	hiburan_kd - 
	$value = $pageObject->showDBValue("hiburan_kd", $data, $keylink);
	$showValues["hiburan_kd"] = $value;
	$showFields[] = "hiburan_kd";
		$showRawValues["hiburan_kd"] = substr($data["hiburan_kd"],0,100);

//	ppj_kd - 
	$value = $pageObject->showDBValue("ppj_kd", $data, $keylink);
	$showValues["ppj_kd"] = $value;
	$showFields[] = "ppj_kd";
		$showRawValues["ppj_kd"] = substr($data["ppj_kd"],0,100);

//	parkir_kd - 
	$value = $pageObject->showDBValue("parkir_kd", $data, $keylink);
	$showValues["parkir_kd"] = $value;
	$showFields[] = "parkir_kd";
		$showRawValues["parkir_kd"] = substr($data["parkir_kd"],0,100);

//	airtanah_kd - 
	$value = $pageObject->showDBValue("airtanah_kd", $data, $keylink);
	$showValues["airtanah_kd"] = $value;
	$showFields[] = "airtanah_kd";
		$showRawValues["airtanah_kd"] = substr($data["airtanah_kd"],0,100);

//	reklame_kd - 
	$value = $pageObject->showDBValue("reklame_kd", $data, $keylink);
	$showValues["reklame_kd"] = $value;
	$showFields[] = "reklame_kd";
		$showRawValues["reklame_kd"] = substr($data["reklame_kd"],0,100);

//	restauran_kd - 
	$value = $pageObject->showDBValue("restauran_kd", $data, $keylink);
	$showValues["restauran_kd"] = $value;
	$showFields[] = "restauran_kd";
		$showRawValues["restauran_kd"] = substr($data["restauran_kd"],0,100);
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
		$options['masterTable'] = "pad.pad_pemda";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "pad.pad_pemda";
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
	$strTableName = "pad.pad_pemda";
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
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='pad_pad_pemda_view.php?".$viewlink."'\"");
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
