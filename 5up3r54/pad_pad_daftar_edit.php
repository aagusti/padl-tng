<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_daftar_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_daftar_edit"] = $layout;




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

$templatefile = ($inlineedit == EDIT_INLINE) ? "pad_pad_daftar_inline_edit.htm" : "pad_pad_daftar_edit.htm";

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
//	processing customernm - begin
	$condition = 1;

	if($condition)
	{
		$control_customernm = $pageObject->getControl("customernm", $id);
		$control_customernm->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing customernm - end
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
//	processing enabled - begin
	$condition = 1;

	if($condition)
	{
		$control_enabled = $pageObject->getControl("enabled", $id);
		$control_enabled->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing enabled - end
//	processing create_date - begin
	$condition = 1;

	if($condition)
	{
		$control_create_date = $pageObject->getControl("create_date", $id);
		$control_create_date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing create_date - end
//	processing create_uid - begin
	$condition = 1;

	if($condition)
	{
		$control_create_uid = $pageObject->getControl("create_uid", $id);
		$control_create_uid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing create_uid - end
//	processing write_date - begin
	$condition = 1;

	if($condition)
	{
		$control_write_date = $pageObject->getControl("write_date", $id);
		$control_write_date->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing write_date - end
//	processing write_uid - begin
	$condition = 1;

	if($condition)
	{
		$control_write_uid = $pageObject->getControl("write_uid", $id);
		$control_write_uid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing write_uid - end
//	processing op_nm - begin
	$condition = 1;

	if($condition)
	{
		$control_op_nm = $pageObject->getControl("op_nm", $id);
		$control_op_nm->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing op_nm - end
//	processing op_alamat - begin
	$condition = 1;

	if($condition)
	{
		$control_op_alamat = $pageObject->getControl("op_alamat", $id);
		$control_op_alamat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing op_alamat - end
//	processing op_usaha_id - begin
	$condition = 1;

	if($condition)
	{
		$control_op_usaha_id = $pageObject->getControl("op_usaha_id", $id);
		$control_op_usaha_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing op_usaha_id - end
//	processing op_so - begin
	$condition = 1;

	if($condition)
	{
		$control_op_so = $pageObject->getControl("op_so", $id);
		$control_op_so->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing op_so - end
//	processing op_kecamatan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_op_kecamatan_id = $pageObject->getControl("op_kecamatan_id", $id);
		$control_op_kecamatan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing op_kecamatan_id - end
//	processing op_kelurahan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_op_kelurahan_id = $pageObject->getControl("op_kelurahan_id", $id);
		$control_op_kelurahan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing op_kelurahan_id - end
//	processing op_latitude - begin
	$condition = 1;

	if($condition)
	{
		$control_op_latitude = $pageObject->getControl("op_latitude", $id);
		$control_op_latitude->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing op_latitude - end
//	processing op_longitude - begin
	$condition = 1;

	if($condition)
	{
		$control_op_longitude = $pageObject->getControl("op_longitude", $id);
		$control_op_longitude->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing op_longitude - end
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
//	processing kd_waletvolume - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_waletvolume = $pageObject->getControl("kd_waletvolume", $id);
		$control_kd_waletvolume->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_waletvolume - end
//	processing email - begin
	$condition = 1;

	if($condition)
	{
		$control_email = $pageObject->getControl("email", $id);
		$control_email->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing email - end
//	processing op_pajak_id - begin
	$condition = 1;

	if($condition)
	{
		$control_op_pajak_id = $pageObject->getControl("op_pajak_id", $id);
		$control_op_pajak_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing op_pajak_id - end
//	processing npwpd - begin
	$condition = 1;

	if($condition)
	{
		$control_npwpd = $pageObject->getControl("npwpd", $id);
		$control_npwpd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing npwpd - end
//	processing passwd - begin
	$condition = 1;

	if($condition)
	{
		$control_passwd = $pageObject->getControl("passwd", $id);
		$control_passwd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing passwd - end

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
			//	processing customernm - begin
							$condition = 1;
			
				if($condition)
				{
					$control_customernm->afterSuccessfulSave();
				}
	//	processing customernm - end
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
			//	processing enabled - begin
							$condition = 1;
			
				if($condition)
				{
					$control_enabled->afterSuccessfulSave();
				}
	//	processing enabled - end
			//	processing create_date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_create_date->afterSuccessfulSave();
				}
	//	processing create_date - end
			//	processing create_uid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_create_uid->afterSuccessfulSave();
				}
	//	processing create_uid - end
			//	processing write_date - begin
							$condition = 1;
			
				if($condition)
				{
					$control_write_date->afterSuccessfulSave();
				}
	//	processing write_date - end
			//	processing write_uid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_write_uid->afterSuccessfulSave();
				}
	//	processing write_uid - end
			//	processing op_nm - begin
							$condition = 1;
			
				if($condition)
				{
					$control_op_nm->afterSuccessfulSave();
				}
	//	processing op_nm - end
			//	processing op_alamat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_op_alamat->afterSuccessfulSave();
				}
	//	processing op_alamat - end
			//	processing op_usaha_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_op_usaha_id->afterSuccessfulSave();
				}
	//	processing op_usaha_id - end
			//	processing op_so - begin
							$condition = 1;
			
				if($condition)
				{
					$control_op_so->afterSuccessfulSave();
				}
	//	processing op_so - end
			//	processing op_kecamatan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_op_kecamatan_id->afterSuccessfulSave();
				}
	//	processing op_kecamatan_id - end
			//	processing op_kelurahan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_op_kelurahan_id->afterSuccessfulSave();
				}
	//	processing op_kelurahan_id - end
			//	processing op_latitude - begin
							$condition = 1;
			
				if($condition)
				{
					$control_op_latitude->afterSuccessfulSave();
				}
	//	processing op_latitude - end
			//	processing op_longitude - begin
							$condition = 1;
			
				if($condition)
				{
					$control_op_longitude->afterSuccessfulSave();
				}
	//	processing op_longitude - end
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
			//	processing kd_waletvolume - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_waletvolume->afterSuccessfulSave();
				}
	//	processing kd_waletvolume - end
			//	processing email - begin
							$condition = 1;
			
				if($condition)
				{
					$control_email->afterSuccessfulSave();
				}
	//	processing email - end
			//	processing op_pajak_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_op_pajak_id->afterSuccessfulSave();
				}
	//	processing op_pajak_id - end
			//	processing npwpd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_npwpd->afterSuccessfulSave();
				}
	//	processing npwpd - end
			//	processing passwd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_passwd->afterSuccessfulSave();
				}
	//	processing passwd - end
				
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
	header("Location: pad_pad_daftar_".$pageObject->getPageType().".php?".$keyGetQ);
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
		header("Location: pad_pad_daftar_list.php?a=return");
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
	$data["rp"] = $evalues["rp"];
	$data["pb"] = $evalues["pb"];
	$data["formno"] = $evalues["formno"];
	$data["reg_date"] = $evalues["reg_date"];
	$data["customernm"] = $evalues["customernm"];
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
	$data["enabled"] = $evalues["enabled"];
	$data["create_date"] = $evalues["create_date"];
	$data["create_uid"] = $evalues["create_uid"];
	$data["write_date"] = $evalues["write_date"];
	$data["write_uid"] = $evalues["write_uid"];
	$data["op_nm"] = $evalues["op_nm"];
	$data["op_alamat"] = $evalues["op_alamat"];
	$data["op_usaha_id"] = $evalues["op_usaha_id"];
	$data["op_so"] = $evalues["op_so"];
	$data["op_kecamatan_id"] = $evalues["op_kecamatan_id"];
	$data["op_kelurahan_id"] = $evalues["op_kelurahan_id"];
	$data["op_latitude"] = $evalues["op_latitude"];
	$data["op_longitude"] = $evalues["op_longitude"];
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
	$data["kd_waletvolume"] = $evalues["kd_waletvolume"];
	$data["email"] = $evalues["email"];
	$data["op_pajak_id"] = $evalues["op_pajak_id"];
	$data["npwpd"] = $evalues["npwpd"];
	$data["passwd"] = $evalues["passwd"];
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
		
	if(!$pageObject->isAppearOnTabs("customernm"))
		$xt->assign("customernm_fieldblock",true);
	else
		$xt->assign("customernm_tabfieldblock",true);
	$xt->assign("customernm_label",true);
	if(isEnableSection508())
		$xt->assign_section("customernm_label","<label for=\"".GetInputElementId("customernm", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("enabled"))
		$xt->assign("enabled_fieldblock",true);
	else
		$xt->assign("enabled_tabfieldblock",true);
	$xt->assign("enabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("enabled_label","<label for=\"".GetInputElementId("enabled", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("create_date"))
		$xt->assign("create_date_fieldblock",true);
	else
		$xt->assign("create_date_tabfieldblock",true);
	$xt->assign("create_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_date_label","<label for=\"".GetInputElementId("create_date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
	$xt->assign("create_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_uid_label","<label for=\"".GetInputElementId("create_uid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("write_date"))
		$xt->assign("write_date_fieldblock",true);
	else
		$xt->assign("write_date_tabfieldblock",true);
	$xt->assign("write_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("write_date_label","<label for=\"".GetInputElementId("write_date", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("write_uid"))
		$xt->assign("write_uid_fieldblock",true);
	else
		$xt->assign("write_uid_tabfieldblock",true);
	$xt->assign("write_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("write_uid_label","<label for=\"".GetInputElementId("write_uid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("op_nm"))
		$xt->assign("op_nm_fieldblock",true);
	else
		$xt->assign("op_nm_tabfieldblock",true);
	$xt->assign("op_nm_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_nm_label","<label for=\"".GetInputElementId("op_nm", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("op_alamat"))
		$xt->assign("op_alamat_fieldblock",true);
	else
		$xt->assign("op_alamat_tabfieldblock",true);
	$xt->assign("op_alamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_alamat_label","<label for=\"".GetInputElementId("op_alamat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("op_usaha_id"))
		$xt->assign("op_usaha_id_fieldblock",true);
	else
		$xt->assign("op_usaha_id_tabfieldblock",true);
	$xt->assign("op_usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_usaha_id_label","<label for=\"".GetInputElementId("op_usaha_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("op_so"))
		$xt->assign("op_so_fieldblock",true);
	else
		$xt->assign("op_so_tabfieldblock",true);
	$xt->assign("op_so_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_so_label","<label for=\"".GetInputElementId("op_so", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("op_kecamatan_id"))
		$xt->assign("op_kecamatan_id_fieldblock",true);
	else
		$xt->assign("op_kecamatan_id_tabfieldblock",true);
	$xt->assign("op_kecamatan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_kecamatan_id_label","<label for=\"".GetInputElementId("op_kecamatan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("op_kelurahan_id"))
		$xt->assign("op_kelurahan_id_fieldblock",true);
	else
		$xt->assign("op_kelurahan_id_tabfieldblock",true);
	$xt->assign("op_kelurahan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_kelurahan_id_label","<label for=\"".GetInputElementId("op_kelurahan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("op_latitude"))
		$xt->assign("op_latitude_fieldblock",true);
	else
		$xt->assign("op_latitude_tabfieldblock",true);
	$xt->assign("op_latitude_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_latitude_label","<label for=\"".GetInputElementId("op_latitude", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("op_longitude"))
		$xt->assign("op_longitude_fieldblock",true);
	else
		$xt->assign("op_longitude_tabfieldblock",true);
	$xt->assign("op_longitude_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_longitude_label","<label for=\"".GetInputElementId("op_longitude", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("kd_waletvolume"))
		$xt->assign("kd_waletvolume_fieldblock",true);
	else
		$xt->assign("kd_waletvolume_tabfieldblock",true);
	$xt->assign("kd_waletvolume_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_waletvolume_label","<label for=\"".GetInputElementId("kd_waletvolume", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("email"))
		$xt->assign("email_fieldblock",true);
	else
		$xt->assign("email_tabfieldblock",true);
	$xt->assign("email_label",true);
	if(isEnableSection508())
		$xt->assign_section("email_label","<label for=\"".GetInputElementId("email", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("op_pajak_id"))
		$xt->assign("op_pajak_id_fieldblock",true);
	else
		$xt->assign("op_pajak_id_tabfieldblock",true);
	$xt->assign("op_pajak_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_pajak_id_label","<label for=\"".GetInputElementId("op_pajak_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("npwpd"))
		$xt->assign("npwpd_fieldblock",true);
	else
		$xt->assign("npwpd_tabfieldblock",true);
	$xt->assign("npwpd_label",true);
	if(isEnableSection508())
		$xt->assign_section("npwpd_label","<label for=\"".GetInputElementId("npwpd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("passwd"))
		$xt->assign("passwd_fieldblock",true);
	else
		$xt->assign("passwd_tabfieldblock",true);
	$xt->assign("passwd_label",true);
	if(isEnableSection508())
		$xt->assign_section("passwd_label","<label for=\"".GetInputElementId("passwd", $id, PAGE_EDIT)."\">","</label>");
		

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
	$showDetailKeys["pad.pad_daftar_hist"]["masterkey1"] = $data["id"];		
	$showDetailKeys["pad.pad_daftar_kd_det"]["masterkey1"] = $data["id"];		

	$keylink = "";
	$keylink.= "&key1=".htmlspecialchars(rawurlencode(@$data["id"]));


//	id - 
	$value = $pageObject->showDBValue("id", $data, $keylink);
	$showValues["id"] = $value;
	$showFields[] = "id";
		$showRawValues["id"] = substr($data["id"],0,100);

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

//	customernm - 
	$value = $pageObject->showDBValue("customernm", $data, $keylink);
	$showValues["customernm"] = $value;
	$showFields[] = "customernm";
		$showRawValues["customernm"] = substr($data["customernm"],0,100);

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

//	enabled - 
	$value = $pageObject->showDBValue("enabled", $data, $keylink);
	$showValues["enabled"] = $value;
	$showFields[] = "enabled";
		$showRawValues["enabled"] = substr($data["enabled"],0,100);

//	create_date - Short Date
	$value = $pageObject->showDBValue("create_date", $data, $keylink);
	$showValues["create_date"] = $value;
	$showFields[] = "create_date";
		$showRawValues["create_date"] = substr($data["create_date"],0,100);

//	create_uid - 
	$value = $pageObject->showDBValue("create_uid", $data, $keylink);
	$showValues["create_uid"] = $value;
	$showFields[] = "create_uid";
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);

//	write_date - Short Date
	$value = $pageObject->showDBValue("write_date", $data, $keylink);
	$showValues["write_date"] = $value;
	$showFields[] = "write_date";
		$showRawValues["write_date"] = substr($data["write_date"],0,100);

//	write_uid - 
	$value = $pageObject->showDBValue("write_uid", $data, $keylink);
	$showValues["write_uid"] = $value;
	$showFields[] = "write_uid";
		$showRawValues["write_uid"] = substr($data["write_uid"],0,100);

//	op_nm - 
	$value = $pageObject->showDBValue("op_nm", $data, $keylink);
	$showValues["op_nm"] = $value;
	$showFields[] = "op_nm";
		$showRawValues["op_nm"] = substr($data["op_nm"],0,100);

//	op_alamat - 
	$value = $pageObject->showDBValue("op_alamat", $data, $keylink);
	$showValues["op_alamat"] = $value;
	$showFields[] = "op_alamat";
		$showRawValues["op_alamat"] = substr($data["op_alamat"],0,100);

//	op_usaha_id - 
	$value = $pageObject->showDBValue("op_usaha_id", $data, $keylink);
	$showValues["op_usaha_id"] = $value;
	$showFields[] = "op_usaha_id";
		$showRawValues["op_usaha_id"] = substr($data["op_usaha_id"],0,100);

//	op_so - 
	$value = $pageObject->showDBValue("op_so", $data, $keylink);
	$showValues["op_so"] = $value;
	$showFields[] = "op_so";
		$showRawValues["op_so"] = substr($data["op_so"],0,100);

//	op_kecamatan_id - 
	$value = $pageObject->showDBValue("op_kecamatan_id", $data, $keylink);
	$showValues["op_kecamatan_id"] = $value;
	$showFields[] = "op_kecamatan_id";
		$showRawValues["op_kecamatan_id"] = substr($data["op_kecamatan_id"],0,100);

//	op_kelurahan_id - 
	$value = $pageObject->showDBValue("op_kelurahan_id", $data, $keylink);
	$showValues["op_kelurahan_id"] = $value;
	$showFields[] = "op_kelurahan_id";
		$showRawValues["op_kelurahan_id"] = substr($data["op_kelurahan_id"],0,100);

//	op_latitude - Number
	$value = $pageObject->showDBValue("op_latitude", $data, $keylink);
	$showValues["op_latitude"] = $value;
	$showFields[] = "op_latitude";
		$showRawValues["op_latitude"] = substr($data["op_latitude"],0,100);

//	op_longitude - Number
	$value = $pageObject->showDBValue("op_longitude", $data, $keylink);
	$showValues["op_longitude"] = $value;
	$showFields[] = "op_longitude";
		$showRawValues["op_longitude"] = substr($data["op_longitude"],0,100);

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

//	kd_waletvolume - 
	$value = $pageObject->showDBValue("kd_waletvolume", $data, $keylink);
	$showValues["kd_waletvolume"] = $value;
	$showFields[] = "kd_waletvolume";
		$showRawValues["kd_waletvolume"] = substr($data["kd_waletvolume"],0,100);

//	email - 
	$value = $pageObject->showDBValue("email", $data, $keylink);
	$showValues["email"] = $value;
	$showFields[] = "email";
		$showRawValues["email"] = substr($data["email"],0,100);

//	op_pajak_id - 
	$value = $pageObject->showDBValue("op_pajak_id", $data, $keylink);
	$showValues["op_pajak_id"] = $value;
	$showFields[] = "op_pajak_id";
		$showRawValues["op_pajak_id"] = substr($data["op_pajak_id"],0,100);

//	npwpd - 
	$value = $pageObject->showDBValue("npwpd", $data, $keylink);
	$showValues["npwpd"] = $value;
	$showFields[] = "npwpd";
		$showRawValues["npwpd"] = substr($data["npwpd"],0,100);

//	passwd - 
	$value = $pageObject->showDBValue("passwd", $data, $keylink);
	$showValues["passwd"] = $value;
	$showFields[] = "passwd";
		$showRawValues["passwd"] = substr($data["passwd"],0,100);
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
		$options['masterTable'] = "pad.pad_daftar";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "pad.pad_daftar";
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
	$strTableName = "pad.pad_daftar";
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
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='pad_pad_daftar_view.php?".$viewlink."'\"");
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
