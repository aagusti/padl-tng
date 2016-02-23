<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_customer_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_customer_edit"] = $layout;




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

$templatefile = ($inlineedit == EDIT_INLINE) ? "pad_pad_customer_inline_edit.htm" : "pad_pad_customer_edit.htm";

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
	

//	processing parent - begin
	$condition = 1;

	if($condition)
	{
		$control_parent = $pageObject->getControl("parent", $id);
		$control_parent->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing parent - end
//	processing npwpd - begin
	$condition = 1;

	if($condition)
	{
		$control_npwpd = $pageObject->getControl("npwpd", $id);
		$control_npwpd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing npwpd - end
//	processing rp - begin
	$condition = 1;

	if($condition)
	{
		$control_rp = $pageObject->getControl("rp", $id);
		$control_rp->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing rp - end
//	processing pb - begin
	$condition = 1;

	if($condition)
	{
		$control_pb = $pageObject->getControl("pb", $id);
		$control_pb->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pb - end
//	processing formno - begin
	$condition = 1;

	if($condition)
	{
		$control_formno = $pageObject->getControl("formno", $id);
		$control_formno->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing formno - end
//	processing reg_date - begin
	$condition = 1;

	if($condition)
	{
		$control_reg_date = $pageObject->getControl("reg_date", $id);
		$control_reg_date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing reg_date - end
//	processing nama - begin
	$condition = 1;

	if($condition)
	{
		$control_nama = $pageObject->getControl("nama", $id);
		$control_nama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing nama - end
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
//	processing kabupaten - begin
	$condition = 1;

	if($condition)
	{
		$control_kabupaten = $pageObject->getControl("kabupaten", $id);
		$control_kabupaten->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kabupaten - end
//	processing alamat - begin
	$condition = 1;

	if($condition)
	{
		$control_alamat = $pageObject->getControl("alamat", $id);
		$control_alamat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing alamat - end
//	processing kodepos - begin
	$condition = 1;

	if($condition)
	{
		$control_kodepos = $pageObject->getControl("kodepos", $id);
		$control_kodepos->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kodepos - end
//	processing telphone - begin
	$condition = 1;

	if($condition)
	{
		$control_telphone = $pageObject->getControl("telphone", $id);
		$control_telphone->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing telphone - end
//	processing wpnama - begin
	$condition = 1;

	if($condition)
	{
		$control_wpnama = $pageObject->getControl("wpnama", $id);
		$control_wpnama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing wpnama - end
//	processing wpalamat - begin
	$condition = 1;

	if($condition)
	{
		$control_wpalamat = $pageObject->getControl("wpalamat", $id);
		$control_wpalamat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing wpalamat - end
//	processing wpkelurahan - begin
	$condition = 1;

	if($condition)
	{
		$control_wpkelurahan = $pageObject->getControl("wpkelurahan", $id);
		$control_wpkelurahan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing wpkelurahan - end
//	processing wpkecamatan - begin
	$condition = 1;

	if($condition)
	{
		$control_wpkecamatan = $pageObject->getControl("wpkecamatan", $id);
		$control_wpkecamatan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing wpkecamatan - end
//	processing wpkabupaten - begin
	$condition = 1;

	if($condition)
	{
		$control_wpkabupaten = $pageObject->getControl("wpkabupaten", $id);
		$control_wpkabupaten->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing wpkabupaten - end
//	processing wptelp - begin
	$condition = 1;

	if($condition)
	{
		$control_wptelp = $pageObject->getControl("wptelp", $id);
		$control_wptelp->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing wptelp - end
//	processing wpkodepos - begin
	$condition = 1;

	if($condition)
	{
		$control_wpkodepos = $pageObject->getControl("wpkodepos", $id);
		$control_wpkodepos->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing wpkodepos - end
//	processing pnama - begin
	$condition = 1;

	if($condition)
	{
		$control_pnama = $pageObject->getControl("pnama", $id);
		$control_pnama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pnama - end
//	processing palamat - begin
	$condition = 1;

	if($condition)
	{
		$control_palamat = $pageObject->getControl("palamat", $id);
		$control_palamat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing palamat - end
//	processing pkelurahan - begin
	$condition = 1;

	if($condition)
	{
		$control_pkelurahan = $pageObject->getControl("pkelurahan", $id);
		$control_pkelurahan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pkelurahan - end
//	processing pkecamatan - begin
	$condition = 1;

	if($condition)
	{
		$control_pkecamatan = $pageObject->getControl("pkecamatan", $id);
		$control_pkecamatan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pkecamatan - end
//	processing pkabupaten - begin
	$condition = 1;

	if($condition)
	{
		$control_pkabupaten = $pageObject->getControl("pkabupaten", $id);
		$control_pkabupaten->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pkabupaten - end
//	processing ptelp - begin
	$condition = 1;

	if($condition)
	{
		$control_ptelp = $pageObject->getControl("ptelp", $id);
		$control_ptelp->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ptelp - end
//	processing pkodepos - begin
	$condition = 1;

	if($condition)
	{
		$control_pkodepos = $pageObject->getControl("pkodepos", $id);
		$control_pkodepos->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pkodepos - end
//	processing ijin1 - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin1 = $pageObject->getControl("ijin1", $id);
		$control_ijin1->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin1 - end
//	processing ijin1no - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin1no = $pageObject->getControl("ijin1no", $id);
		$control_ijin1no->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin1no - end
//	processing ijin1tgl - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin1tgl = $pageObject->getControl("ijin1tgl", $id);
		$control_ijin1tgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin1tgl - end
//	processing ijin1tglakhir - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin1tglakhir = $pageObject->getControl("ijin1tglakhir", $id);
		$control_ijin1tglakhir->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin1tglakhir - end
//	processing ijin2 - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin2 = $pageObject->getControl("ijin2", $id);
		$control_ijin2->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin2 - end
//	processing ijin2no - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin2no = $pageObject->getControl("ijin2no", $id);
		$control_ijin2no->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin2no - end
//	processing ijin2tgl - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin2tgl = $pageObject->getControl("ijin2tgl", $id);
		$control_ijin2tgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin2tgl - end
//	processing ijin2tglakhir - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin2tglakhir = $pageObject->getControl("ijin2tglakhir", $id);
		$control_ijin2tglakhir->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin2tglakhir - end
//	processing ijin3 - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin3 = $pageObject->getControl("ijin3", $id);
		$control_ijin3->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin3 - end
//	processing ijin3no - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin3no = $pageObject->getControl("ijin3no", $id);
		$control_ijin3no->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin3no - end
//	processing ijin3tgl - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin3tgl = $pageObject->getControl("ijin3tgl", $id);
		$control_ijin3tgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin3tgl - end
//	processing ijin3tglakhir - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin3tglakhir = $pageObject->getControl("ijin3tglakhir", $id);
		$control_ijin3tglakhir->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin3tglakhir - end
//	processing ijin4 - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin4 = $pageObject->getControl("ijin4", $id);
		$control_ijin4->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin4 - end
//	processing ijin4no - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin4no = $pageObject->getControl("ijin4no", $id);
		$control_ijin4no->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin4no - end
//	processing ijin4tgl - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin4tgl = $pageObject->getControl("ijin4tgl", $id);
		$control_ijin4tgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin4tgl - end
//	processing ijin4tglakhir - begin
	$condition = 1;

	if($condition)
	{
		$control_ijin4tglakhir = $pageObject->getControl("ijin4tglakhir", $id);
		$control_ijin4tglakhir->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing ijin4tglakhir - end
//	processing kukuhno - begin
	$condition = 1;

	if($condition)
	{
		$control_kukuhno = $pageObject->getControl("kukuhno", $id);
		$control_kukuhno->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kukuhno - end
//	processing kukuhnip - begin
	$condition = 1;

	if($condition)
	{
		$control_kukuhnip = $pageObject->getControl("kukuhnip", $id);
		$control_kukuhnip->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kukuhnip - end
//	processing kukuhtgl - begin
	$condition = 1;

	if($condition)
	{
		$control_kukuhtgl = $pageObject->getControl("kukuhtgl", $id);
		$control_kukuhtgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kukuhtgl - end
//	processing kukuh_jabat_id - begin
	$condition = 1;

	if($condition)
	{
		$control_kukuh_jabat_id = $pageObject->getControl("kukuh_jabat_id", $id);
		$control_kukuh_jabat_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kukuh_jabat_id - end
//	processing kukuhprinted - begin
	$condition = 1;

	if($condition)
	{
		$control_kukuhprinted = $pageObject->getControl("kukuhprinted", $id);
		$control_kukuhprinted->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kukuhprinted - end
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
//	processing tmt - begin
	$condition = 1;

	if($condition)
	{
		$control_tmt = $pageObject->getControl("tmt", $id);
		$control_tmt->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tmt - end
//	processing customer_status_id - begin
	$condition = 1;

	if($condition)
	{
		$control_customer_status_id = $pageObject->getControl("customer_status_id", $id);
		$control_customer_status_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing customer_status_id - end
//	processing kembalitgl - begin
	$condition = 1;

	if($condition)
	{
		$control_kembalitgl = $pageObject->getControl("kembalitgl", $id);
		$control_kembalitgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kembalitgl - end
//	processing kembalioleh - begin
	$condition = 1;

	if($condition)
	{
		$control_kembalioleh = $pageObject->getControl("kembalioleh", $id);
		$control_kembalioleh->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kembalioleh - end
//	processing kartuprinted - begin
	$condition = 1;

	if($condition)
	{
		$control_kartuprinted = $pageObject->getControl("kartuprinted", $id);
		$control_kartuprinted->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kartuprinted - end
//	processing kembalinip - begin
	$condition = 1;

	if($condition)
	{
		$control_kembalinip = $pageObject->getControl("kembalinip", $id);
		$control_kembalinip->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kembalinip - end
//	processing penerimanm - begin
	$condition = 1;

	if($condition)
	{
		$control_penerimanm = $pageObject->getControl("penerimanm", $id);
		$control_penerimanm->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing penerimanm - end
//	processing penerimaalamat - begin
	$condition = 1;

	if($condition)
	{
		$control_penerimaalamat = $pageObject->getControl("penerimaalamat", $id);
		$control_penerimaalamat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing penerimaalamat - end
//	processing penerimatgl - begin
	$condition = 1;

	if($condition)
	{
		$control_penerimatgl = $pageObject->getControl("penerimatgl", $id);
		$control_penerimatgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing penerimatgl - end
//	processing catatnip - begin
	$condition = 1;

	if($condition)
	{
		$control_catatnip = $pageObject->getControl("catatnip", $id);
		$control_catatnip->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing catatnip - end
//	processing kirimtgl - begin
	$condition = 1;

	if($condition)
	{
		$control_kirimtgl = $pageObject->getControl("kirimtgl", $id);
		$control_kirimtgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kirimtgl - end
//	processing batastgl - begin
	$condition = 1;

	if($condition)
	{
		$control_batastgl = $pageObject->getControl("batastgl", $id);
		$control_batastgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing batastgl - end
//	processing petugas_jabat_id - begin
	$condition = 1;

	if($condition)
	{
		$control_petugas_jabat_id = $pageObject->getControl("petugas_jabat_id", $id);
		$control_petugas_jabat_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing petugas_jabat_id - end
//	processing pencatat_jabat_id - begin
	$condition = 1;

	if($condition)
	{
		$control_pencatat_jabat_id = $pageObject->getControl("pencatat_jabat_id", $id);
		$control_pencatat_jabat_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pencatat_jabat_id - end
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
//	processing npwpd_old - begin
	$condition = 1;

	if($condition)
	{
		$control_npwpd_old = $pageObject->getControl("npwpd_old", $id);
		$control_npwpd_old->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing npwpd_old - end
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
			//	processing parent - begin
							$condition = 1;
			
				if($condition)
				{
					$control_parent->afterSuccessfulSave();
				}
	//	processing parent - end
			//	processing npwpd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_npwpd->afterSuccessfulSave();
				}
	//	processing npwpd - end
			//	processing rp - begin
							$condition = 1;
			
				if($condition)
				{
					$control_rp->afterSuccessfulSave();
				}
	//	processing rp - end
			//	processing pb - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pb->afterSuccessfulSave();
				}
	//	processing pb - end
			//	processing formno - begin
							$condition = 1;
			
				if($condition)
				{
					$control_formno->afterSuccessfulSave();
				}
	//	processing formno - end
			//	processing reg_date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_reg_date->afterSuccessfulSave();
				}
	//	processing reg_date - end
			//	processing nama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_nama->afterSuccessfulSave();
				}
	//	processing nama - end
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
			//	processing kabupaten - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kabupaten->afterSuccessfulSave();
				}
	//	processing kabupaten - end
			//	processing alamat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_alamat->afterSuccessfulSave();
				}
	//	processing alamat - end
			//	processing kodepos - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kodepos->afterSuccessfulSave();
				}
	//	processing kodepos - end
			//	processing telphone - begin
							$condition = 1;
			
				if($condition)
				{
					$control_telphone->afterSuccessfulSave();
				}
	//	processing telphone - end
			//	processing wpnama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_wpnama->afterSuccessfulSave();
				}
	//	processing wpnama - end
			//	processing wpalamat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_wpalamat->afterSuccessfulSave();
				}
	//	processing wpalamat - end
			//	processing wpkelurahan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_wpkelurahan->afterSuccessfulSave();
				}
	//	processing wpkelurahan - end
			//	processing wpkecamatan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_wpkecamatan->afterSuccessfulSave();
				}
	//	processing wpkecamatan - end
			//	processing wpkabupaten - begin
							$condition = 1;
			
				if($condition)
				{
					$control_wpkabupaten->afterSuccessfulSave();
				}
	//	processing wpkabupaten - end
			//	processing wptelp - begin
							$condition = 1;
			
				if($condition)
				{
					$control_wptelp->afterSuccessfulSave();
				}
	//	processing wptelp - end
			//	processing wpkodepos - begin
							$condition = 1;
			
				if($condition)
				{
					$control_wpkodepos->afterSuccessfulSave();
				}
	//	processing wpkodepos - end
			//	processing pnama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pnama->afterSuccessfulSave();
				}
	//	processing pnama - end
			//	processing palamat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_palamat->afterSuccessfulSave();
				}
	//	processing palamat - end
			//	processing pkelurahan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pkelurahan->afterSuccessfulSave();
				}
	//	processing pkelurahan - end
			//	processing pkecamatan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pkecamatan->afterSuccessfulSave();
				}
	//	processing pkecamatan - end
			//	processing pkabupaten - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pkabupaten->afterSuccessfulSave();
				}
	//	processing pkabupaten - end
			//	processing ptelp - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ptelp->afterSuccessfulSave();
				}
	//	processing ptelp - end
			//	processing pkodepos - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pkodepos->afterSuccessfulSave();
				}
	//	processing pkodepos - end
			//	processing ijin1 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin1->afterSuccessfulSave();
				}
	//	processing ijin1 - end
			//	processing ijin1no - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin1no->afterSuccessfulSave();
				}
	//	processing ijin1no - end
			//	processing ijin1tgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin1tgl->afterSuccessfulSave();
				}
	//	processing ijin1tgl - end
			//	processing ijin1tglakhir - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin1tglakhir->afterSuccessfulSave();
				}
	//	processing ijin1tglakhir - end
			//	processing ijin2 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin2->afterSuccessfulSave();
				}
	//	processing ijin2 - end
			//	processing ijin2no - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin2no->afterSuccessfulSave();
				}
	//	processing ijin2no - end
			//	processing ijin2tgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin2tgl->afterSuccessfulSave();
				}
	//	processing ijin2tgl - end
			//	processing ijin2tglakhir - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin2tglakhir->afterSuccessfulSave();
				}
	//	processing ijin2tglakhir - end
			//	processing ijin3 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin3->afterSuccessfulSave();
				}
	//	processing ijin3 - end
			//	processing ijin3no - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin3no->afterSuccessfulSave();
				}
	//	processing ijin3no - end
			//	processing ijin3tgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin3tgl->afterSuccessfulSave();
				}
	//	processing ijin3tgl - end
			//	processing ijin3tglakhir - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin3tglakhir->afterSuccessfulSave();
				}
	//	processing ijin3tglakhir - end
			//	processing ijin4 - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin4->afterSuccessfulSave();
				}
	//	processing ijin4 - end
			//	processing ijin4no - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin4no->afterSuccessfulSave();
				}
	//	processing ijin4no - end
			//	processing ijin4tgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin4tgl->afterSuccessfulSave();
				}
	//	processing ijin4tgl - end
			//	processing ijin4tglakhir - begin
							$condition = 1;
			
				if($condition)
				{
					$control_ijin4tglakhir->afterSuccessfulSave();
				}
	//	processing ijin4tglakhir - end
			//	processing kukuhno - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kukuhno->afterSuccessfulSave();
				}
	//	processing kukuhno - end
			//	processing kukuhnip - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kukuhnip->afterSuccessfulSave();
				}
	//	processing kukuhnip - end
			//	processing kukuhtgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kukuhtgl->afterSuccessfulSave();
				}
	//	processing kukuhtgl - end
			//	processing kukuh_jabat_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kukuh_jabat_id->afterSuccessfulSave();
				}
	//	processing kukuh_jabat_id - end
			//	processing kukuhprinted - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kukuhprinted->afterSuccessfulSave();
				}
	//	processing kukuhprinted - end
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
			//	processing tmt - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tmt->afterSuccessfulSave();
				}
	//	processing tmt - end
			//	processing customer_status_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_customer_status_id->afterSuccessfulSave();
				}
	//	processing customer_status_id - end
			//	processing kembalitgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kembalitgl->afterSuccessfulSave();
				}
	//	processing kembalitgl - end
			//	processing kembalioleh - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kembalioleh->afterSuccessfulSave();
				}
	//	processing kembalioleh - end
			//	processing kartuprinted - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kartuprinted->afterSuccessfulSave();
				}
	//	processing kartuprinted - end
			//	processing kembalinip - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kembalinip->afterSuccessfulSave();
				}
	//	processing kembalinip - end
			//	processing penerimanm - begin
							$condition = 1;
			
				if($condition)
				{
					$control_penerimanm->afterSuccessfulSave();
				}
	//	processing penerimanm - end
			//	processing penerimaalamat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_penerimaalamat->afterSuccessfulSave();
				}
	//	processing penerimaalamat - end
			//	processing penerimatgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_penerimatgl->afterSuccessfulSave();
				}
	//	processing penerimatgl - end
			//	processing catatnip - begin
							$condition = 1;
			
				if($condition)
				{
					$control_catatnip->afterSuccessfulSave();
				}
	//	processing catatnip - end
			//	processing kirimtgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kirimtgl->afterSuccessfulSave();
				}
	//	processing kirimtgl - end
			//	processing batastgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_batastgl->afterSuccessfulSave();
				}
	//	processing batastgl - end
			//	processing petugas_jabat_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_petugas_jabat_id->afterSuccessfulSave();
				}
	//	processing petugas_jabat_id - end
			//	processing pencatat_jabat_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pencatat_jabat_id->afterSuccessfulSave();
				}
	//	processing pencatat_jabat_id - end
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
			//	processing npwpd_old - begin
							$condition = 1;
			
				if($condition)
				{
					$control_npwpd_old->afterSuccessfulSave();
				}
	//	processing npwpd_old - end
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
	header("Location: pad_pad_customer_".$pageObject->getPageType().".php?".$keyGetQ);
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
		header("Location: pad_pad_customer_list.php?a=return");
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
	$data["parent"] = $evalues["parent"];
	$data["npwpd"] = $evalues["npwpd"];
	$data["rp"] = $evalues["rp"];
	$data["pb"] = $evalues["pb"];
	$data["formno"] = $evalues["formno"];
	$data["reg_date"] = $evalues["reg_date"];
	$data["nama"] = $evalues["nama"];
	$data["kecamatan_id"] = $evalues["kecamatan_id"];
	$data["kelurahan_id"] = $evalues["kelurahan_id"];
	$data["kabupaten"] = $evalues["kabupaten"];
	$data["alamat"] = $evalues["alamat"];
	$data["kodepos"] = $evalues["kodepos"];
	$data["telphone"] = $evalues["telphone"];
	$data["wpnama"] = $evalues["wpnama"];
	$data["wpalamat"] = $evalues["wpalamat"];
	$data["wpkelurahan"] = $evalues["wpkelurahan"];
	$data["wpkecamatan"] = $evalues["wpkecamatan"];
	$data["wpkabupaten"] = $evalues["wpkabupaten"];
	$data["wptelp"] = $evalues["wptelp"];
	$data["wpkodepos"] = $evalues["wpkodepos"];
	$data["pnama"] = $evalues["pnama"];
	$data["palamat"] = $evalues["palamat"];
	$data["pkelurahan"] = $evalues["pkelurahan"];
	$data["pkecamatan"] = $evalues["pkecamatan"];
	$data["pkabupaten"] = $evalues["pkabupaten"];
	$data["ptelp"] = $evalues["ptelp"];
	$data["pkodepos"] = $evalues["pkodepos"];
	$data["ijin1"] = $evalues["ijin1"];
	$data["ijin1no"] = $evalues["ijin1no"];
	$data["ijin1tgl"] = $evalues["ijin1tgl"];
	$data["ijin1tglakhir"] = $evalues["ijin1tglakhir"];
	$data["ijin2"] = $evalues["ijin2"];
	$data["ijin2no"] = $evalues["ijin2no"];
	$data["ijin2tgl"] = $evalues["ijin2tgl"];
	$data["ijin2tglakhir"] = $evalues["ijin2tglakhir"];
	$data["ijin3"] = $evalues["ijin3"];
	$data["ijin3no"] = $evalues["ijin3no"];
	$data["ijin3tgl"] = $evalues["ijin3tgl"];
	$data["ijin3tglakhir"] = $evalues["ijin3tglakhir"];
	$data["ijin4"] = $evalues["ijin4"];
	$data["ijin4no"] = $evalues["ijin4no"];
	$data["ijin4tgl"] = $evalues["ijin4tgl"];
	$data["ijin4tglakhir"] = $evalues["ijin4tglakhir"];
	$data["kukuhno"] = $evalues["kukuhno"];
	$data["kukuhnip"] = $evalues["kukuhnip"];
	$data["kukuhtgl"] = $evalues["kukuhtgl"];
	$data["kukuh_jabat_id"] = $evalues["kukuh_jabat_id"];
	$data["kukuhprinted"] = $evalues["kukuhprinted"];
	$data["enabled"] = $evalues["enabled"];
	$data["create_uid"] = $evalues["create_uid"];
	$data["tmt"] = $evalues["tmt"];
	$data["customer_status_id"] = $evalues["customer_status_id"];
	$data["kembalitgl"] = $evalues["kembalitgl"];
	$data["kembalioleh"] = $evalues["kembalioleh"];
	$data["kartuprinted"] = $evalues["kartuprinted"];
	$data["kembalinip"] = $evalues["kembalinip"];
	$data["penerimanm"] = $evalues["penerimanm"];
	$data["penerimaalamat"] = $evalues["penerimaalamat"];
	$data["penerimatgl"] = $evalues["penerimatgl"];
	$data["catatnip"] = $evalues["catatnip"];
	$data["kirimtgl"] = $evalues["kirimtgl"];
	$data["batastgl"] = $evalues["batastgl"];
	$data["petugas_jabat_id"] = $evalues["petugas_jabat_id"];
	$data["pencatat_jabat_id"] = $evalues["pencatat_jabat_id"];
	$data["created"] = $evalues["created"];
	$data["updated"] = $evalues["updated"];
	$data["update_uid"] = $evalues["update_uid"];
	$data["npwpd_old"] = $evalues["npwpd_old"];
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

	if(!$pageObject->isAppearOnTabs("parent"))
		$xt->assign("parent_fieldblock",true);
	else
		$xt->assign("parent_tabfieldblock",true);
	$xt->assign("parent_label",true);
	if(isEnableSection508())
		$xt->assign_section("parent_label","<label for=\"".GetInputElementId("parent", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("npwpd"))
		$xt->assign("npwpd_fieldblock",true);
	else
		$xt->assign("npwpd_tabfieldblock",true);
	$xt->assign("npwpd_label",true);
	if(isEnableSection508())
		$xt->assign_section("npwpd_label","<label for=\"".GetInputElementId("npwpd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("rp"))
		$xt->assign("rp_fieldblock",true);
	else
		$xt->assign("rp_tabfieldblock",true);
	$xt->assign("rp_label",true);
	if(isEnableSection508())
		$xt->assign_section("rp_label","<label for=\"".GetInputElementId("rp", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pb"))
		$xt->assign("pb_fieldblock",true);
	else
		$xt->assign("pb_tabfieldblock",true);
	$xt->assign("pb_label",true);
	if(isEnableSection508())
		$xt->assign_section("pb_label","<label for=\"".GetInputElementId("pb", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("formno"))
		$xt->assign("formno_fieldblock",true);
	else
		$xt->assign("formno_tabfieldblock",true);
	$xt->assign("formno_label",true);
	if(isEnableSection508())
		$xt->assign_section("formno_label","<label for=\"".GetInputElementId("formno", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("reg_date"))
		$xt->assign("reg_date_fieldblock",true);
	else
		$xt->assign("reg_date_tabfieldblock",true);
	$xt->assign("reg_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("reg_date_label","<label for=\"".GetInputElementId("reg_date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("nama"))
		$xt->assign("nama_fieldblock",true);
	else
		$xt->assign("nama_tabfieldblock",true);
	$xt->assign("nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_label","<label for=\"".GetInputElementId("nama", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("kabupaten"))
		$xt->assign("kabupaten_fieldblock",true);
	else
		$xt->assign("kabupaten_tabfieldblock",true);
	$xt->assign("kabupaten_label",true);
	if(isEnableSection508())
		$xt->assign_section("kabupaten_label","<label for=\"".GetInputElementId("kabupaten", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("alamat"))
		$xt->assign("alamat_fieldblock",true);
	else
		$xt->assign("alamat_tabfieldblock",true);
	$xt->assign("alamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_label","<label for=\"".GetInputElementId("alamat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kodepos"))
		$xt->assign("kodepos_fieldblock",true);
	else
		$xt->assign("kodepos_tabfieldblock",true);
	$xt->assign("kodepos_label",true);
	if(isEnableSection508())
		$xt->assign_section("kodepos_label","<label for=\"".GetInputElementId("kodepos", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("telphone"))
		$xt->assign("telphone_fieldblock",true);
	else
		$xt->assign("telphone_tabfieldblock",true);
	$xt->assign("telphone_label",true);
	if(isEnableSection508())
		$xt->assign_section("telphone_label","<label for=\"".GetInputElementId("telphone", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("wpnama"))
		$xt->assign("wpnama_fieldblock",true);
	else
		$xt->assign("wpnama_tabfieldblock",true);
	$xt->assign("wpnama_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpnama_label","<label for=\"".GetInputElementId("wpnama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("wpalamat"))
		$xt->assign("wpalamat_fieldblock",true);
	else
		$xt->assign("wpalamat_tabfieldblock",true);
	$xt->assign("wpalamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpalamat_label","<label for=\"".GetInputElementId("wpalamat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("wpkelurahan"))
		$xt->assign("wpkelurahan_fieldblock",true);
	else
		$xt->assign("wpkelurahan_tabfieldblock",true);
	$xt->assign("wpkelurahan_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpkelurahan_label","<label for=\"".GetInputElementId("wpkelurahan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("wpkecamatan"))
		$xt->assign("wpkecamatan_fieldblock",true);
	else
		$xt->assign("wpkecamatan_tabfieldblock",true);
	$xt->assign("wpkecamatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpkecamatan_label","<label for=\"".GetInputElementId("wpkecamatan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("wpkabupaten"))
		$xt->assign("wpkabupaten_fieldblock",true);
	else
		$xt->assign("wpkabupaten_tabfieldblock",true);
	$xt->assign("wpkabupaten_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpkabupaten_label","<label for=\"".GetInputElementId("wpkabupaten", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("wptelp"))
		$xt->assign("wptelp_fieldblock",true);
	else
		$xt->assign("wptelp_tabfieldblock",true);
	$xt->assign("wptelp_label",true);
	if(isEnableSection508())
		$xt->assign_section("wptelp_label","<label for=\"".GetInputElementId("wptelp", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("wpkodepos"))
		$xt->assign("wpkodepos_fieldblock",true);
	else
		$xt->assign("wpkodepos_tabfieldblock",true);
	$xt->assign("wpkodepos_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpkodepos_label","<label for=\"".GetInputElementId("wpkodepos", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pnama"))
		$xt->assign("pnama_fieldblock",true);
	else
		$xt->assign("pnama_tabfieldblock",true);
	$xt->assign("pnama_label",true);
	if(isEnableSection508())
		$xt->assign_section("pnama_label","<label for=\"".GetInputElementId("pnama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("palamat"))
		$xt->assign("palamat_fieldblock",true);
	else
		$xt->assign("palamat_tabfieldblock",true);
	$xt->assign("palamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("palamat_label","<label for=\"".GetInputElementId("palamat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pkelurahan"))
		$xt->assign("pkelurahan_fieldblock",true);
	else
		$xt->assign("pkelurahan_tabfieldblock",true);
	$xt->assign("pkelurahan_label",true);
	if(isEnableSection508())
		$xt->assign_section("pkelurahan_label","<label for=\"".GetInputElementId("pkelurahan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pkecamatan"))
		$xt->assign("pkecamatan_fieldblock",true);
	else
		$xt->assign("pkecamatan_tabfieldblock",true);
	$xt->assign("pkecamatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("pkecamatan_label","<label for=\"".GetInputElementId("pkecamatan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pkabupaten"))
		$xt->assign("pkabupaten_fieldblock",true);
	else
		$xt->assign("pkabupaten_tabfieldblock",true);
	$xt->assign("pkabupaten_label",true);
	if(isEnableSection508())
		$xt->assign_section("pkabupaten_label","<label for=\"".GetInputElementId("pkabupaten", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ptelp"))
		$xt->assign("ptelp_fieldblock",true);
	else
		$xt->assign("ptelp_tabfieldblock",true);
	$xt->assign("ptelp_label",true);
	if(isEnableSection508())
		$xt->assign_section("ptelp_label","<label for=\"".GetInputElementId("ptelp", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pkodepos"))
		$xt->assign("pkodepos_fieldblock",true);
	else
		$xt->assign("pkodepos_tabfieldblock",true);
	$xt->assign("pkodepos_label",true);
	if(isEnableSection508())
		$xt->assign_section("pkodepos_label","<label for=\"".GetInputElementId("pkodepos", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin1"))
		$xt->assign("ijin1_fieldblock",true);
	else
		$xt->assign("ijin1_tabfieldblock",true);
	$xt->assign("ijin1_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin1_label","<label for=\"".GetInputElementId("ijin1", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin1no"))
		$xt->assign("ijin1no_fieldblock",true);
	else
		$xt->assign("ijin1no_tabfieldblock",true);
	$xt->assign("ijin1no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin1no_label","<label for=\"".GetInputElementId("ijin1no", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin1tgl"))
		$xt->assign("ijin1tgl_fieldblock",true);
	else
		$xt->assign("ijin1tgl_tabfieldblock",true);
	$xt->assign("ijin1tgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin1tgl_label","<label for=\"".GetInputElementId("ijin1tgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin1tglakhir"))
		$xt->assign("ijin1tglakhir_fieldblock",true);
	else
		$xt->assign("ijin1tglakhir_tabfieldblock",true);
	$xt->assign("ijin1tglakhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin1tglakhir_label","<label for=\"".GetInputElementId("ijin1tglakhir", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin2"))
		$xt->assign("ijin2_fieldblock",true);
	else
		$xt->assign("ijin2_tabfieldblock",true);
	$xt->assign("ijin2_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin2_label","<label for=\"".GetInputElementId("ijin2", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin2no"))
		$xt->assign("ijin2no_fieldblock",true);
	else
		$xt->assign("ijin2no_tabfieldblock",true);
	$xt->assign("ijin2no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin2no_label","<label for=\"".GetInputElementId("ijin2no", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin2tgl"))
		$xt->assign("ijin2tgl_fieldblock",true);
	else
		$xt->assign("ijin2tgl_tabfieldblock",true);
	$xt->assign("ijin2tgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin2tgl_label","<label for=\"".GetInputElementId("ijin2tgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin2tglakhir"))
		$xt->assign("ijin2tglakhir_fieldblock",true);
	else
		$xt->assign("ijin2tglakhir_tabfieldblock",true);
	$xt->assign("ijin2tglakhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin2tglakhir_label","<label for=\"".GetInputElementId("ijin2tglakhir", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin3"))
		$xt->assign("ijin3_fieldblock",true);
	else
		$xt->assign("ijin3_tabfieldblock",true);
	$xt->assign("ijin3_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin3_label","<label for=\"".GetInputElementId("ijin3", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin3no"))
		$xt->assign("ijin3no_fieldblock",true);
	else
		$xt->assign("ijin3no_tabfieldblock",true);
	$xt->assign("ijin3no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin3no_label","<label for=\"".GetInputElementId("ijin3no", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin3tgl"))
		$xt->assign("ijin3tgl_fieldblock",true);
	else
		$xt->assign("ijin3tgl_tabfieldblock",true);
	$xt->assign("ijin3tgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin3tgl_label","<label for=\"".GetInputElementId("ijin3tgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin3tglakhir"))
		$xt->assign("ijin3tglakhir_fieldblock",true);
	else
		$xt->assign("ijin3tglakhir_tabfieldblock",true);
	$xt->assign("ijin3tglakhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin3tglakhir_label","<label for=\"".GetInputElementId("ijin3tglakhir", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin4"))
		$xt->assign("ijin4_fieldblock",true);
	else
		$xt->assign("ijin4_tabfieldblock",true);
	$xt->assign("ijin4_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin4_label","<label for=\"".GetInputElementId("ijin4", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin4no"))
		$xt->assign("ijin4no_fieldblock",true);
	else
		$xt->assign("ijin4no_tabfieldblock",true);
	$xt->assign("ijin4no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin4no_label","<label for=\"".GetInputElementId("ijin4no", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin4tgl"))
		$xt->assign("ijin4tgl_fieldblock",true);
	else
		$xt->assign("ijin4tgl_tabfieldblock",true);
	$xt->assign("ijin4tgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin4tgl_label","<label for=\"".GetInputElementId("ijin4tgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ijin4tglakhir"))
		$xt->assign("ijin4tglakhir_fieldblock",true);
	else
		$xt->assign("ijin4tglakhir_tabfieldblock",true);
	$xt->assign("ijin4tglakhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin4tglakhir_label","<label for=\"".GetInputElementId("ijin4tglakhir", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kukuhno"))
		$xt->assign("kukuhno_fieldblock",true);
	else
		$xt->assign("kukuhno_tabfieldblock",true);
	$xt->assign("kukuhno_label",true);
	if(isEnableSection508())
		$xt->assign_section("kukuhno_label","<label for=\"".GetInputElementId("kukuhno", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kukuhnip"))
		$xt->assign("kukuhnip_fieldblock",true);
	else
		$xt->assign("kukuhnip_tabfieldblock",true);
	$xt->assign("kukuhnip_label",true);
	if(isEnableSection508())
		$xt->assign_section("kukuhnip_label","<label for=\"".GetInputElementId("kukuhnip", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kukuhtgl"))
		$xt->assign("kukuhtgl_fieldblock",true);
	else
		$xt->assign("kukuhtgl_tabfieldblock",true);
	$xt->assign("kukuhtgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("kukuhtgl_label","<label for=\"".GetInputElementId("kukuhtgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kukuh_jabat_id"))
		$xt->assign("kukuh_jabat_id_fieldblock",true);
	else
		$xt->assign("kukuh_jabat_id_tabfieldblock",true);
	$xt->assign("kukuh_jabat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("kukuh_jabat_id_label","<label for=\"".GetInputElementId("kukuh_jabat_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kukuhprinted"))
		$xt->assign("kukuhprinted_fieldblock",true);
	else
		$xt->assign("kukuhprinted_tabfieldblock",true);
	$xt->assign("kukuhprinted_label",true);
	if(isEnableSection508())
		$xt->assign_section("kukuhprinted_label","<label for=\"".GetInputElementId("kukuhprinted", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("tmt"))
		$xt->assign("tmt_fieldblock",true);
	else
		$xt->assign("tmt_tabfieldblock",true);
	$xt->assign("tmt_label",true);
	if(isEnableSection508())
		$xt->assign_section("tmt_label","<label for=\"".GetInputElementId("tmt", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("customer_status_id"))
		$xt->assign("customer_status_id_fieldblock",true);
	else
		$xt->assign("customer_status_id_tabfieldblock",true);
	$xt->assign("customer_status_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("customer_status_id_label","<label for=\"".GetInputElementId("customer_status_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kembalitgl"))
		$xt->assign("kembalitgl_fieldblock",true);
	else
		$xt->assign("kembalitgl_tabfieldblock",true);
	$xt->assign("kembalitgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("kembalitgl_label","<label for=\"".GetInputElementId("kembalitgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kembalioleh"))
		$xt->assign("kembalioleh_fieldblock",true);
	else
		$xt->assign("kembalioleh_tabfieldblock",true);
	$xt->assign("kembalioleh_label",true);
	if(isEnableSection508())
		$xt->assign_section("kembalioleh_label","<label for=\"".GetInputElementId("kembalioleh", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kartuprinted"))
		$xt->assign("kartuprinted_fieldblock",true);
	else
		$xt->assign("kartuprinted_tabfieldblock",true);
	$xt->assign("kartuprinted_label",true);
	if(isEnableSection508())
		$xt->assign_section("kartuprinted_label","<label for=\"".GetInputElementId("kartuprinted", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kembalinip"))
		$xt->assign("kembalinip_fieldblock",true);
	else
		$xt->assign("kembalinip_tabfieldblock",true);
	$xt->assign("kembalinip_label",true);
	if(isEnableSection508())
		$xt->assign_section("kembalinip_label","<label for=\"".GetInputElementId("kembalinip", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("penerimanm"))
		$xt->assign("penerimanm_fieldblock",true);
	else
		$xt->assign("penerimanm_tabfieldblock",true);
	$xt->assign("penerimanm_label",true);
	if(isEnableSection508())
		$xt->assign_section("penerimanm_label","<label for=\"".GetInputElementId("penerimanm", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("penerimaalamat"))
		$xt->assign("penerimaalamat_fieldblock",true);
	else
		$xt->assign("penerimaalamat_tabfieldblock",true);
	$xt->assign("penerimaalamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("penerimaalamat_label","<label for=\"".GetInputElementId("penerimaalamat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("penerimatgl"))
		$xt->assign("penerimatgl_fieldblock",true);
	else
		$xt->assign("penerimatgl_tabfieldblock",true);
	$xt->assign("penerimatgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("penerimatgl_label","<label for=\"".GetInputElementId("penerimatgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("catatnip"))
		$xt->assign("catatnip_fieldblock",true);
	else
		$xt->assign("catatnip_tabfieldblock",true);
	$xt->assign("catatnip_label",true);
	if(isEnableSection508())
		$xt->assign_section("catatnip_label","<label for=\"".GetInputElementId("catatnip", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kirimtgl"))
		$xt->assign("kirimtgl_fieldblock",true);
	else
		$xt->assign("kirimtgl_tabfieldblock",true);
	$xt->assign("kirimtgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("kirimtgl_label","<label for=\"".GetInputElementId("kirimtgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("batastgl"))
		$xt->assign("batastgl_fieldblock",true);
	else
		$xt->assign("batastgl_tabfieldblock",true);
	$xt->assign("batastgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("batastgl_label","<label for=\"".GetInputElementId("batastgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("petugas_jabat_id"))
		$xt->assign("petugas_jabat_id_fieldblock",true);
	else
		$xt->assign("petugas_jabat_id_tabfieldblock",true);
	$xt->assign("petugas_jabat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("petugas_jabat_id_label","<label for=\"".GetInputElementId("petugas_jabat_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pencatat_jabat_id"))
		$xt->assign("pencatat_jabat_id_fieldblock",true);
	else
		$xt->assign("pencatat_jabat_id_tabfieldblock",true);
	$xt->assign("pencatat_jabat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("pencatat_jabat_id_label","<label for=\"".GetInputElementId("pencatat_jabat_id", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("npwpd_old"))
		$xt->assign("npwpd_old_fieldblock",true);
	else
		$xt->assign("npwpd_old_tabfieldblock",true);
	$xt->assign("npwpd_old_label",true);
	if(isEnableSection508())
		$xt->assign_section("npwpd_old_label","<label for=\"".GetInputElementId("npwpd_old", $id, PAGE_EDIT)."\">","</label>");
		
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
	$showDetailKeys["pad.pad_customer_usaha"]["masterkey1"] = $data["id"];		
	$showDetailKeys["pad.pad_customer_detail"]["masterkey1"] = $data["id"];		
	$showDetailKeys["pad.pad_terima"]["masterkey1"] = $data["id"];		

	$keylink = "";
	$keylink.= "&key1=".htmlspecialchars(rawurlencode(@$data["id"]));


//	id - 
	$value = $pageObject->showDBValue("id", $data, $keylink);
	$showValues["id"] = $value;
	$showFields[] = "id";
		$showRawValues["id"] = substr($data["id"],0,100);

//	parent - 
	$value = $pageObject->showDBValue("parent", $data, $keylink);
	$showValues["parent"] = $value;
	$showFields[] = "parent";
		$showRawValues["parent"] = substr($data["parent"],0,100);

//	npwpd - 
	$value = $pageObject->showDBValue("npwpd", $data, $keylink);
	$showValues["npwpd"] = $value;
	$showFields[] = "npwpd";
		$showRawValues["npwpd"] = substr($data["npwpd"],0,100);

//	rp - 
	$value = $pageObject->showDBValue("rp", $data, $keylink);
	$showValues["rp"] = $value;
	$showFields[] = "rp";
		$showRawValues["rp"] = substr($data["rp"],0,100);

//	pb - 
	$value = $pageObject->showDBValue("pb", $data, $keylink);
	$showValues["pb"] = $value;
	$showFields[] = "pb";
		$showRawValues["pb"] = substr($data["pb"],0,100);

//	formno - 
	$value = $pageObject->showDBValue("formno", $data, $keylink);
	$showValues["formno"] = $value;
	$showFields[] = "formno";
		$showRawValues["formno"] = substr($data["formno"],0,100);

//	reg_date - Short Date
	$value = $pageObject->showDBValue("reg_date", $data, $keylink);
	$showValues["reg_date"] = $value;
	$showFields[] = "reg_date";
		$showRawValues["reg_date"] = substr($data["reg_date"],0,100);

//	nama - 
	$value = $pageObject->showDBValue("nama", $data, $keylink);
	$showValues["nama"] = $value;
	$showFields[] = "nama";
		$showRawValues["nama"] = substr($data["nama"],0,100);

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

//	kabupaten - 
	$value = $pageObject->showDBValue("kabupaten", $data, $keylink);
	$showValues["kabupaten"] = $value;
	$showFields[] = "kabupaten";
		$showRawValues["kabupaten"] = substr($data["kabupaten"],0,100);

//	alamat - 
	$value = $pageObject->showDBValue("alamat", $data, $keylink);
	$showValues["alamat"] = $value;
	$showFields[] = "alamat";
		$showRawValues["alamat"] = substr($data["alamat"],0,100);

//	kodepos - 
	$value = $pageObject->showDBValue("kodepos", $data, $keylink);
	$showValues["kodepos"] = $value;
	$showFields[] = "kodepos";
		$showRawValues["kodepos"] = substr($data["kodepos"],0,100);

//	telphone - 
	$value = $pageObject->showDBValue("telphone", $data, $keylink);
	$showValues["telphone"] = $value;
	$showFields[] = "telphone";
		$showRawValues["telphone"] = substr($data["telphone"],0,100);

//	wpnama - 
	$value = $pageObject->showDBValue("wpnama", $data, $keylink);
	$showValues["wpnama"] = $value;
	$showFields[] = "wpnama";
		$showRawValues["wpnama"] = substr($data["wpnama"],0,100);

//	wpalamat - 
	$value = $pageObject->showDBValue("wpalamat", $data, $keylink);
	$showValues["wpalamat"] = $value;
	$showFields[] = "wpalamat";
		$showRawValues["wpalamat"] = substr($data["wpalamat"],0,100);

//	wpkelurahan - 
	$value = $pageObject->showDBValue("wpkelurahan", $data, $keylink);
	$showValues["wpkelurahan"] = $value;
	$showFields[] = "wpkelurahan";
		$showRawValues["wpkelurahan"] = substr($data["wpkelurahan"],0,100);

//	wpkecamatan - 
	$value = $pageObject->showDBValue("wpkecamatan", $data, $keylink);
	$showValues["wpkecamatan"] = $value;
	$showFields[] = "wpkecamatan";
		$showRawValues["wpkecamatan"] = substr($data["wpkecamatan"],0,100);

//	wpkabupaten - 
	$value = $pageObject->showDBValue("wpkabupaten", $data, $keylink);
	$showValues["wpkabupaten"] = $value;
	$showFields[] = "wpkabupaten";
		$showRawValues["wpkabupaten"] = substr($data["wpkabupaten"],0,100);

//	wptelp - 
	$value = $pageObject->showDBValue("wptelp", $data, $keylink);
	$showValues["wptelp"] = $value;
	$showFields[] = "wptelp";
		$showRawValues["wptelp"] = substr($data["wptelp"],0,100);

//	wpkodepos - 
	$value = $pageObject->showDBValue("wpkodepos", $data, $keylink);
	$showValues["wpkodepos"] = $value;
	$showFields[] = "wpkodepos";
		$showRawValues["wpkodepos"] = substr($data["wpkodepos"],0,100);

//	pnama - 
	$value = $pageObject->showDBValue("pnama", $data, $keylink);
	$showValues["pnama"] = $value;
	$showFields[] = "pnama";
		$showRawValues["pnama"] = substr($data["pnama"],0,100);

//	palamat - 
	$value = $pageObject->showDBValue("palamat", $data, $keylink);
	$showValues["palamat"] = $value;
	$showFields[] = "palamat";
		$showRawValues["palamat"] = substr($data["palamat"],0,100);

//	pkelurahan - 
	$value = $pageObject->showDBValue("pkelurahan", $data, $keylink);
	$showValues["pkelurahan"] = $value;
	$showFields[] = "pkelurahan";
		$showRawValues["pkelurahan"] = substr($data["pkelurahan"],0,100);

//	pkecamatan - 
	$value = $pageObject->showDBValue("pkecamatan", $data, $keylink);
	$showValues["pkecamatan"] = $value;
	$showFields[] = "pkecamatan";
		$showRawValues["pkecamatan"] = substr($data["pkecamatan"],0,100);

//	pkabupaten - 
	$value = $pageObject->showDBValue("pkabupaten", $data, $keylink);
	$showValues["pkabupaten"] = $value;
	$showFields[] = "pkabupaten";
		$showRawValues["pkabupaten"] = substr($data["pkabupaten"],0,100);

//	ptelp - 
	$value = $pageObject->showDBValue("ptelp", $data, $keylink);
	$showValues["ptelp"] = $value;
	$showFields[] = "ptelp";
		$showRawValues["ptelp"] = substr($data["ptelp"],0,100);

//	pkodepos - 
	$value = $pageObject->showDBValue("pkodepos", $data, $keylink);
	$showValues["pkodepos"] = $value;
	$showFields[] = "pkodepos";
		$showRawValues["pkodepos"] = substr($data["pkodepos"],0,100);

//	ijin1 - 
	$value = $pageObject->showDBValue("ijin1", $data, $keylink);
	$showValues["ijin1"] = $value;
	$showFields[] = "ijin1";
		$showRawValues["ijin1"] = substr($data["ijin1"],0,100);

//	ijin1no - 
	$value = $pageObject->showDBValue("ijin1no", $data, $keylink);
	$showValues["ijin1no"] = $value;
	$showFields[] = "ijin1no";
		$showRawValues["ijin1no"] = substr($data["ijin1no"],0,100);

//	ijin1tgl - Short Date
	$value = $pageObject->showDBValue("ijin1tgl", $data, $keylink);
	$showValues["ijin1tgl"] = $value;
	$showFields[] = "ijin1tgl";
		$showRawValues["ijin1tgl"] = substr($data["ijin1tgl"],0,100);

//	ijin1tglakhir - Short Date
	$value = $pageObject->showDBValue("ijin1tglakhir", $data, $keylink);
	$showValues["ijin1tglakhir"] = $value;
	$showFields[] = "ijin1tglakhir";
		$showRawValues["ijin1tglakhir"] = substr($data["ijin1tglakhir"],0,100);

//	ijin2 - 
	$value = $pageObject->showDBValue("ijin2", $data, $keylink);
	$showValues["ijin2"] = $value;
	$showFields[] = "ijin2";
		$showRawValues["ijin2"] = substr($data["ijin2"],0,100);

//	ijin2no - 
	$value = $pageObject->showDBValue("ijin2no", $data, $keylink);
	$showValues["ijin2no"] = $value;
	$showFields[] = "ijin2no";
		$showRawValues["ijin2no"] = substr($data["ijin2no"],0,100);

//	ijin2tgl - Short Date
	$value = $pageObject->showDBValue("ijin2tgl", $data, $keylink);
	$showValues["ijin2tgl"] = $value;
	$showFields[] = "ijin2tgl";
		$showRawValues["ijin2tgl"] = substr($data["ijin2tgl"],0,100);

//	ijin2tglakhir - Short Date
	$value = $pageObject->showDBValue("ijin2tglakhir", $data, $keylink);
	$showValues["ijin2tglakhir"] = $value;
	$showFields[] = "ijin2tglakhir";
		$showRawValues["ijin2tglakhir"] = substr($data["ijin2tglakhir"],0,100);

//	ijin3 - 
	$value = $pageObject->showDBValue("ijin3", $data, $keylink);
	$showValues["ijin3"] = $value;
	$showFields[] = "ijin3";
		$showRawValues["ijin3"] = substr($data["ijin3"],0,100);

//	ijin3no - 
	$value = $pageObject->showDBValue("ijin3no", $data, $keylink);
	$showValues["ijin3no"] = $value;
	$showFields[] = "ijin3no";
		$showRawValues["ijin3no"] = substr($data["ijin3no"],0,100);

//	ijin3tgl - Short Date
	$value = $pageObject->showDBValue("ijin3tgl", $data, $keylink);
	$showValues["ijin3tgl"] = $value;
	$showFields[] = "ijin3tgl";
		$showRawValues["ijin3tgl"] = substr($data["ijin3tgl"],0,100);

//	ijin3tglakhir - Short Date
	$value = $pageObject->showDBValue("ijin3tglakhir", $data, $keylink);
	$showValues["ijin3tglakhir"] = $value;
	$showFields[] = "ijin3tglakhir";
		$showRawValues["ijin3tglakhir"] = substr($data["ijin3tglakhir"],0,100);

//	ijin4 - 
	$value = $pageObject->showDBValue("ijin4", $data, $keylink);
	$showValues["ijin4"] = $value;
	$showFields[] = "ijin4";
		$showRawValues["ijin4"] = substr($data["ijin4"],0,100);

//	ijin4no - 
	$value = $pageObject->showDBValue("ijin4no", $data, $keylink);
	$showValues["ijin4no"] = $value;
	$showFields[] = "ijin4no";
		$showRawValues["ijin4no"] = substr($data["ijin4no"],0,100);

//	ijin4tgl - Short Date
	$value = $pageObject->showDBValue("ijin4tgl", $data, $keylink);
	$showValues["ijin4tgl"] = $value;
	$showFields[] = "ijin4tgl";
		$showRawValues["ijin4tgl"] = substr($data["ijin4tgl"],0,100);

//	ijin4tglakhir - Short Date
	$value = $pageObject->showDBValue("ijin4tglakhir", $data, $keylink);
	$showValues["ijin4tglakhir"] = $value;
	$showFields[] = "ijin4tglakhir";
		$showRawValues["ijin4tglakhir"] = substr($data["ijin4tglakhir"],0,100);

//	kukuhno - 
	$value = $pageObject->showDBValue("kukuhno", $data, $keylink);
	$showValues["kukuhno"] = $value;
	$showFields[] = "kukuhno";
		$showRawValues["kukuhno"] = substr($data["kukuhno"],0,100);

//	kukuhnip - 
	$value = $pageObject->showDBValue("kukuhnip", $data, $keylink);
	$showValues["kukuhnip"] = $value;
	$showFields[] = "kukuhnip";
		$showRawValues["kukuhnip"] = substr($data["kukuhnip"],0,100);

//	kukuhtgl - Short Date
	$value = $pageObject->showDBValue("kukuhtgl", $data, $keylink);
	$showValues["kukuhtgl"] = $value;
	$showFields[] = "kukuhtgl";
		$showRawValues["kukuhtgl"] = substr($data["kukuhtgl"],0,100);

//	kukuh_jabat_id - 
	$value = $pageObject->showDBValue("kukuh_jabat_id", $data, $keylink);
	$showValues["kukuh_jabat_id"] = $value;
	$showFields[] = "kukuh_jabat_id";
		$showRawValues["kukuh_jabat_id"] = substr($data["kukuh_jabat_id"],0,100);

//	kukuhprinted - 
	$value = $pageObject->showDBValue("kukuhprinted", $data, $keylink);
	$showValues["kukuhprinted"] = $value;
	$showFields[] = "kukuhprinted";
		$showRawValues["kukuhprinted"] = substr($data["kukuhprinted"],0,100);

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

//	tmt - Short Date
	$value = $pageObject->showDBValue("tmt", $data, $keylink);
	$showValues["tmt"] = $value;
	$showFields[] = "tmt";
		$showRawValues["tmt"] = substr($data["tmt"],0,100);

//	customer_status_id - 
	$value = $pageObject->showDBValue("customer_status_id", $data, $keylink);
	$showValues["customer_status_id"] = $value;
	$showFields[] = "customer_status_id";
		$showRawValues["customer_status_id"] = substr($data["customer_status_id"],0,100);

//	kembalitgl - Short Date
	$value = $pageObject->showDBValue("kembalitgl", $data, $keylink);
	$showValues["kembalitgl"] = $value;
	$showFields[] = "kembalitgl";
		$showRawValues["kembalitgl"] = substr($data["kembalitgl"],0,100);

//	kembalioleh - 
	$value = $pageObject->showDBValue("kembalioleh", $data, $keylink);
	$showValues["kembalioleh"] = $value;
	$showFields[] = "kembalioleh";
		$showRawValues["kembalioleh"] = substr($data["kembalioleh"],0,100);

//	kartuprinted - 
	$value = $pageObject->showDBValue("kartuprinted", $data, $keylink);
	$showValues["kartuprinted"] = $value;
	$showFields[] = "kartuprinted";
		$showRawValues["kartuprinted"] = substr($data["kartuprinted"],0,100);

//	kembalinip - 
	$value = $pageObject->showDBValue("kembalinip", $data, $keylink);
	$showValues["kembalinip"] = $value;
	$showFields[] = "kembalinip";
		$showRawValues["kembalinip"] = substr($data["kembalinip"],0,100);

//	penerimanm - 
	$value = $pageObject->showDBValue("penerimanm", $data, $keylink);
	$showValues["penerimanm"] = $value;
	$showFields[] = "penerimanm";
		$showRawValues["penerimanm"] = substr($data["penerimanm"],0,100);

//	penerimaalamat - 
	$value = $pageObject->showDBValue("penerimaalamat", $data, $keylink);
	$showValues["penerimaalamat"] = $value;
	$showFields[] = "penerimaalamat";
		$showRawValues["penerimaalamat"] = substr($data["penerimaalamat"],0,100);

//	penerimatgl - Short Date
	$value = $pageObject->showDBValue("penerimatgl", $data, $keylink);
	$showValues["penerimatgl"] = $value;
	$showFields[] = "penerimatgl";
		$showRawValues["penerimatgl"] = substr($data["penerimatgl"],0,100);

//	catatnip - 
	$value = $pageObject->showDBValue("catatnip", $data, $keylink);
	$showValues["catatnip"] = $value;
	$showFields[] = "catatnip";
		$showRawValues["catatnip"] = substr($data["catatnip"],0,100);

//	kirimtgl - Short Date
	$value = $pageObject->showDBValue("kirimtgl", $data, $keylink);
	$showValues["kirimtgl"] = $value;
	$showFields[] = "kirimtgl";
		$showRawValues["kirimtgl"] = substr($data["kirimtgl"],0,100);

//	batastgl - Short Date
	$value = $pageObject->showDBValue("batastgl", $data, $keylink);
	$showValues["batastgl"] = $value;
	$showFields[] = "batastgl";
		$showRawValues["batastgl"] = substr($data["batastgl"],0,100);

//	petugas_jabat_id - 
	$value = $pageObject->showDBValue("petugas_jabat_id", $data, $keylink);
	$showValues["petugas_jabat_id"] = $value;
	$showFields[] = "petugas_jabat_id";
		$showRawValues["petugas_jabat_id"] = substr($data["petugas_jabat_id"],0,100);

//	pencatat_jabat_id - 
	$value = $pageObject->showDBValue("pencatat_jabat_id", $data, $keylink);
	$showValues["pencatat_jabat_id"] = $value;
	$showFields[] = "pencatat_jabat_id";
		$showRawValues["pencatat_jabat_id"] = substr($data["pencatat_jabat_id"],0,100);

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

//	npwpd_old - 
	$value = $pageObject->showDBValue("npwpd_old", $data, $keylink);
	$showValues["npwpd_old"] = $value;
	$showFields[] = "npwpd_old";
		$showRawValues["npwpd_old"] = substr($data["npwpd_old"],0,100);

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
		$options['masterTable'] = "pad.pad_customer";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "pad.pad_customer";
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
	$strTableName = "pad.pad_customer";
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
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='pad_pad_customer_view.php?".$viewlink."'\"");
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
