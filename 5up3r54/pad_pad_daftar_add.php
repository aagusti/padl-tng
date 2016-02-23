<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/pad_pad_daftar_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_daftar_add"] = $layout;



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
	$templatefile = "pad_pad_daftar_inline_add.htm";
else
	$templatefile = "pad_pad_daftar_add.htm";

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
		header('Location: pad_pad_daftar_add.php');
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
//	processing rp - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_rp = $pageObject->getControl("rp", $id);
		$control_rp->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing rp - end
//	processing pb - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pb = $pageObject->getControl("pb", $id);
		$control_pb->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pb - end
//	processing formno - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_formno = $pageObject->getControl("formno", $id);
		$control_formno->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing formno - end
//	processing reg_date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_reg_date = $pageObject->getControl("reg_date", $id);
		$control_reg_date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing reg_date - end
//	processing customernm - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_customernm = $pageObject->getControl("customernm", $id);
		$control_customernm->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing customernm - end
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
//	processing kabupaten - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kabupaten = $pageObject->getControl("kabupaten", $id);
		$control_kabupaten->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kabupaten - end
//	processing alamat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_alamat = $pageObject->getControl("alamat", $id);
		$control_alamat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing alamat - end
//	processing kodepos - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kodepos = $pageObject->getControl("kodepos", $id);
		$control_kodepos->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kodepos - end
//	processing telphone - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_telphone = $pageObject->getControl("telphone", $id);
		$control_telphone->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing telphone - end
//	processing wpnama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_wpnama = $pageObject->getControl("wpnama", $id);
		$control_wpnama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing wpnama - end
//	processing wpalamat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_wpalamat = $pageObject->getControl("wpalamat", $id);
		$control_wpalamat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing wpalamat - end
//	processing wpkelurahan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_wpkelurahan = $pageObject->getControl("wpkelurahan", $id);
		$control_wpkelurahan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing wpkelurahan - end
//	processing wpkecamatan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_wpkecamatan = $pageObject->getControl("wpkecamatan", $id);
		$control_wpkecamatan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing wpkecamatan - end
//	processing wpkabupaten - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_wpkabupaten = $pageObject->getControl("wpkabupaten", $id);
		$control_wpkabupaten->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing wpkabupaten - end
//	processing wptelp - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_wptelp = $pageObject->getControl("wptelp", $id);
		$control_wptelp->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing wptelp - end
//	processing wpkodepos - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_wpkodepos = $pageObject->getControl("wpkodepos", $id);
		$control_wpkodepos->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing wpkodepos - end
//	processing pnama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pnama = $pageObject->getControl("pnama", $id);
		$control_pnama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pnama - end
//	processing palamat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_palamat = $pageObject->getControl("palamat", $id);
		$control_palamat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing palamat - end
//	processing pkelurahan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pkelurahan = $pageObject->getControl("pkelurahan", $id);
		$control_pkelurahan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pkelurahan - end
//	processing pkecamatan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pkecamatan = $pageObject->getControl("pkecamatan", $id);
		$control_pkecamatan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pkecamatan - end
//	processing pkabupaten - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pkabupaten = $pageObject->getControl("pkabupaten", $id);
		$control_pkabupaten->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pkabupaten - end
//	processing ptelp - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ptelp = $pageObject->getControl("ptelp", $id);
		$control_ptelp->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ptelp - end
//	processing pkodepos - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pkodepos = $pageObject->getControl("pkodepos", $id);
		$control_pkodepos->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pkodepos - end
//	processing ijin1 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin1 = $pageObject->getControl("ijin1", $id);
		$control_ijin1->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin1 - end
//	processing ijin1no - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin1no = $pageObject->getControl("ijin1no", $id);
		$control_ijin1no->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin1no - end
//	processing ijin1tgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin1tgl = $pageObject->getControl("ijin1tgl", $id);
		$control_ijin1tgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin1tgl - end
//	processing ijin1tglakhir - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin1tglakhir = $pageObject->getControl("ijin1tglakhir", $id);
		$control_ijin1tglakhir->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin1tglakhir - end
//	processing ijin2 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin2 = $pageObject->getControl("ijin2", $id);
		$control_ijin2->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin2 - end
//	processing ijin2no - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin2no = $pageObject->getControl("ijin2no", $id);
		$control_ijin2no->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin2no - end
//	processing ijin2tgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin2tgl = $pageObject->getControl("ijin2tgl", $id);
		$control_ijin2tgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin2tgl - end
//	processing ijin2tglakhir - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin2tglakhir = $pageObject->getControl("ijin2tglakhir", $id);
		$control_ijin2tglakhir->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin2tglakhir - end
//	processing ijin3 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin3 = $pageObject->getControl("ijin3", $id);
		$control_ijin3->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin3 - end
//	processing ijin3no - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin3no = $pageObject->getControl("ijin3no", $id);
		$control_ijin3no->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin3no - end
//	processing ijin3tgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin3tgl = $pageObject->getControl("ijin3tgl", $id);
		$control_ijin3tgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin3tgl - end
//	processing ijin3tglakhir - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin3tglakhir = $pageObject->getControl("ijin3tglakhir", $id);
		$control_ijin3tglakhir->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin3tglakhir - end
//	processing ijin4 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin4 = $pageObject->getControl("ijin4", $id);
		$control_ijin4->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin4 - end
//	processing ijin4no - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin4no = $pageObject->getControl("ijin4no", $id);
		$control_ijin4no->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin4no - end
//	processing ijin4tgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin4tgl = $pageObject->getControl("ijin4tgl", $id);
		$control_ijin4tgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin4tgl - end
//	processing ijin4tglakhir - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ijin4tglakhir = $pageObject->getControl("ijin4tglakhir", $id);
		$control_ijin4tglakhir->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ijin4tglakhir - end
//	processing enabled - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_enabled = $pageObject->getControl("enabled", $id);
		$control_enabled->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing enabled - end
//	processing create_date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_create_date = $pageObject->getControl("create_date", $id);
		$control_create_date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing create_date - end
//	processing create_uid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_create_uid = $pageObject->getControl("create_uid", $id);
		$control_create_uid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing create_uid - end
//	processing write_date - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_write_date = $pageObject->getControl("write_date", $id);
		$control_write_date->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing write_date - end
//	processing write_uid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_write_uid = $pageObject->getControl("write_uid", $id);
		$control_write_uid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing write_uid - end
//	processing op_nm - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_op_nm = $pageObject->getControl("op_nm", $id);
		$control_op_nm->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing op_nm - end
//	processing op_alamat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_op_alamat = $pageObject->getControl("op_alamat", $id);
		$control_op_alamat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing op_alamat - end
//	processing op_usaha_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_op_usaha_id = $pageObject->getControl("op_usaha_id", $id);
		$control_op_usaha_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing op_usaha_id - end
//	processing op_so - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_op_so = $pageObject->getControl("op_so", $id);
		$control_op_so->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing op_so - end
//	processing op_kecamatan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_op_kecamatan_id = $pageObject->getControl("op_kecamatan_id", $id);
		$control_op_kecamatan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing op_kecamatan_id - end
//	processing op_kelurahan_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_op_kelurahan_id = $pageObject->getControl("op_kelurahan_id", $id);
		$control_op_kelurahan_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing op_kelurahan_id - end
//	processing op_latitude - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_op_latitude = $pageObject->getControl("op_latitude", $id);
		$control_op_latitude->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing op_latitude - end
//	processing op_longitude - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_op_longitude = $pageObject->getControl("op_longitude", $id);
		$control_op_longitude->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing op_longitude - end
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
//	processing kd_waletvolume - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_waletvolume = $pageObject->getControl("kd_waletvolume", $id);
		$control_kd_waletvolume->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_waletvolume - end
//	processing email - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_email = $pageObject->getControl("email", $id);
		$control_email->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing email - end
//	processing op_pajak_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_op_pajak_id = $pageObject->getControl("op_pajak_id", $id);
		$control_op_pajak_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing op_pajak_id - end
//	processing npwpd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_npwpd = $pageObject->getControl("npwpd", $id);
		$control_npwpd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing npwpd - end
//	processing passwd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_passwd = $pageObject->getControl("passwd", $id);
		$control_passwd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing passwd - end


//	insert masterkey value if exists and if not specified
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_kecamatan")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["kecamatan_id"]==""){
			$avalues["kecamatan_id"] = prepare_for_db("kecamatan_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
		if(postvalue("masterkey2"))
			$_SESSION[$sessionPrefix."_masterkey2"] = postvalue("masterkey2");
		
		if($avalues["op_kecamatan_id"]==""){
			$avalues["op_kecamatan_id"] = prepare_for_db("op_kecamatan_id",$_SESSION[$sessionPrefix."_masterkey2"]);
		}
			
	}
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_kelurahan")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["kelurahan_id"]==""){
			$avalues["kelurahan_id"] = prepare_for_db("kelurahan_id",$_SESSION[$sessionPrefix."_masterkey1"]);
		}
			
		if(postvalue("masterkey2"))
			$_SESSION[$sessionPrefix."_masterkey2"] = postvalue("masterkey2");
		
		if($avalues["op_kelurahan_id"]==""){
			$avalues["op_kelurahan_id"] = prepare_for_db("op_kelurahan_id",$_SESSION[$sessionPrefix."_masterkey2"]);
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
//	processing rp - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_rp->afterSuccessfulSave();
			}
//	processing rp - end
//	processing pb - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pb->afterSuccessfulSave();
			}
//	processing pb - end
//	processing formno - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_formno->afterSuccessfulSave();
			}
//	processing formno - end
//	processing reg_date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_reg_date->afterSuccessfulSave();
			}
//	processing reg_date - end
//	processing customernm - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_customernm->afterSuccessfulSave();
			}
//	processing customernm - end
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
//	processing kabupaten - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kabupaten->afterSuccessfulSave();
			}
//	processing kabupaten - end
//	processing alamat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_alamat->afterSuccessfulSave();
			}
//	processing alamat - end
//	processing kodepos - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kodepos->afterSuccessfulSave();
			}
//	processing kodepos - end
//	processing telphone - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_telphone->afterSuccessfulSave();
			}
//	processing telphone - end
//	processing wpnama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_wpnama->afterSuccessfulSave();
			}
//	processing wpnama - end
//	processing wpalamat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_wpalamat->afterSuccessfulSave();
			}
//	processing wpalamat - end
//	processing wpkelurahan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_wpkelurahan->afterSuccessfulSave();
			}
//	processing wpkelurahan - end
//	processing wpkecamatan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_wpkecamatan->afterSuccessfulSave();
			}
//	processing wpkecamatan - end
//	processing wpkabupaten - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_wpkabupaten->afterSuccessfulSave();
			}
//	processing wpkabupaten - end
//	processing wptelp - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_wptelp->afterSuccessfulSave();
			}
//	processing wptelp - end
//	processing wpkodepos - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_wpkodepos->afterSuccessfulSave();
			}
//	processing wpkodepos - end
//	processing pnama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pnama->afterSuccessfulSave();
			}
//	processing pnama - end
//	processing palamat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_palamat->afterSuccessfulSave();
			}
//	processing palamat - end
//	processing pkelurahan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pkelurahan->afterSuccessfulSave();
			}
//	processing pkelurahan - end
//	processing pkecamatan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pkecamatan->afterSuccessfulSave();
			}
//	processing pkecamatan - end
//	processing pkabupaten - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pkabupaten->afterSuccessfulSave();
			}
//	processing pkabupaten - end
//	processing ptelp - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ptelp->afterSuccessfulSave();
			}
//	processing ptelp - end
//	processing pkodepos - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pkodepos->afterSuccessfulSave();
			}
//	processing pkodepos - end
//	processing ijin1 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin1->afterSuccessfulSave();
			}
//	processing ijin1 - end
//	processing ijin1no - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin1no->afterSuccessfulSave();
			}
//	processing ijin1no - end
//	processing ijin1tgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin1tgl->afterSuccessfulSave();
			}
//	processing ijin1tgl - end
//	processing ijin1tglakhir - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin1tglakhir->afterSuccessfulSave();
			}
//	processing ijin1tglakhir - end
//	processing ijin2 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin2->afterSuccessfulSave();
			}
//	processing ijin2 - end
//	processing ijin2no - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin2no->afterSuccessfulSave();
			}
//	processing ijin2no - end
//	processing ijin2tgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin2tgl->afterSuccessfulSave();
			}
//	processing ijin2tgl - end
//	processing ijin2tglakhir - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin2tglakhir->afterSuccessfulSave();
			}
//	processing ijin2tglakhir - end
//	processing ijin3 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin3->afterSuccessfulSave();
			}
//	processing ijin3 - end
//	processing ijin3no - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin3no->afterSuccessfulSave();
			}
//	processing ijin3no - end
//	processing ijin3tgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin3tgl->afterSuccessfulSave();
			}
//	processing ijin3tgl - end
//	processing ijin3tglakhir - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin3tglakhir->afterSuccessfulSave();
			}
//	processing ijin3tglakhir - end
//	processing ijin4 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin4->afterSuccessfulSave();
			}
//	processing ijin4 - end
//	processing ijin4no - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin4no->afterSuccessfulSave();
			}
//	processing ijin4no - end
//	processing ijin4tgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin4tgl->afterSuccessfulSave();
			}
//	processing ijin4tgl - end
//	processing ijin4tglakhir - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ijin4tglakhir->afterSuccessfulSave();
			}
//	processing ijin4tglakhir - end
//	processing enabled - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_enabled->afterSuccessfulSave();
			}
//	processing enabled - end
//	processing create_date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_create_date->afterSuccessfulSave();
			}
//	processing create_date - end
//	processing create_uid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_create_uid->afterSuccessfulSave();
			}
//	processing create_uid - end
//	processing write_date - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_write_date->afterSuccessfulSave();
			}
//	processing write_date - end
//	processing write_uid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_write_uid->afterSuccessfulSave();
			}
//	processing write_uid - end
//	processing op_nm - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_op_nm->afterSuccessfulSave();
			}
//	processing op_nm - end
//	processing op_alamat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_op_alamat->afterSuccessfulSave();
			}
//	processing op_alamat - end
//	processing op_usaha_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_op_usaha_id->afterSuccessfulSave();
			}
//	processing op_usaha_id - end
//	processing op_so - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_op_so->afterSuccessfulSave();
			}
//	processing op_so - end
//	processing op_kecamatan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_op_kecamatan_id->afterSuccessfulSave();
			}
//	processing op_kecamatan_id - end
//	processing op_kelurahan_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_op_kelurahan_id->afterSuccessfulSave();
			}
//	processing op_kelurahan_id - end
//	processing op_latitude - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_op_latitude->afterSuccessfulSave();
			}
//	processing op_latitude - end
//	processing op_longitude - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_op_longitude->afterSuccessfulSave();
			}
//	processing op_longitude - end
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
//	processing kd_waletvolume - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_waletvolume->afterSuccessfulSave();
			}
//	processing kd_waletvolume - end
//	processing email - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_email->afterSuccessfulSave();
			}
//	processing email - end
//	processing op_pajak_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_op_pajak_id->afterSuccessfulSave();
			}
//	processing op_pajak_id - end
//	processing npwpd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_npwpd->afterSuccessfulSave();
			}
//	processing npwpd - end
//	processing passwd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_passwd->afterSuccessfulSave();
			}
//	processing passwd - end

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
						$message .='&nbsp;<a href=\'pad_pad_daftar_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'pad_pad_daftar_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: pad_pad_daftar_".$pageObject->getPageType().".php");
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

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_kecamatan")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["kecamatan_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
	if(postvalue("masterkey2"))
		$_SESSION[$sessionPrefix."_masterkey2"] = postvalue("masterkey2");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["op_kecamatan_id"] = @$_SESSION[$sessionPrefix."_masterkey2"];	
	
}

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_kelurahan")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["kelurahan_id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
	if(postvalue("masterkey2"))
		$_SESSION[$sessionPrefix."_masterkey2"] = postvalue("masterkey2");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["op_kelurahan_id"] = @$_SESSION[$sessionPrefix."_masterkey2"];	
	
}

if($readavalues)
{
	$defvalues["rp"]=@$avalues["rp"];
	$defvalues["pb"]=@$avalues["pb"];
	$defvalues["formno"]=@$avalues["formno"];
	$defvalues["reg_date"]=@$avalues["reg_date"];
	$defvalues["customernm"]=@$avalues["customernm"];
	$defvalues["kecamatan_id"]=@$avalues["kecamatan_id"];
	$defvalues["kelurahan_id"]=@$avalues["kelurahan_id"];
	$defvalues["kabupaten"]=@$avalues["kabupaten"];
	$defvalues["alamat"]=@$avalues["alamat"];
	$defvalues["kodepos"]=@$avalues["kodepos"];
	$defvalues["telphone"]=@$avalues["telphone"];
	$defvalues["wpnama"]=@$avalues["wpnama"];
	$defvalues["wpalamat"]=@$avalues["wpalamat"];
	$defvalues["wpkelurahan"]=@$avalues["wpkelurahan"];
	$defvalues["wpkecamatan"]=@$avalues["wpkecamatan"];
	$defvalues["wpkabupaten"]=@$avalues["wpkabupaten"];
	$defvalues["wptelp"]=@$avalues["wptelp"];
	$defvalues["wpkodepos"]=@$avalues["wpkodepos"];
	$defvalues["pnama"]=@$avalues["pnama"];
	$defvalues["palamat"]=@$avalues["palamat"];
	$defvalues["pkelurahan"]=@$avalues["pkelurahan"];
	$defvalues["pkecamatan"]=@$avalues["pkecamatan"];
	$defvalues["pkabupaten"]=@$avalues["pkabupaten"];
	$defvalues["ptelp"]=@$avalues["ptelp"];
	$defvalues["pkodepos"]=@$avalues["pkodepos"];
	$defvalues["ijin1"]=@$avalues["ijin1"];
	$defvalues["ijin1no"]=@$avalues["ijin1no"];
	$defvalues["ijin1tgl"]=@$avalues["ijin1tgl"];
	$defvalues["ijin1tglakhir"]=@$avalues["ijin1tglakhir"];
	$defvalues["ijin2"]=@$avalues["ijin2"];
	$defvalues["ijin2no"]=@$avalues["ijin2no"];
	$defvalues["ijin2tgl"]=@$avalues["ijin2tgl"];
	$defvalues["ijin2tglakhir"]=@$avalues["ijin2tglakhir"];
	$defvalues["ijin3"]=@$avalues["ijin3"];
	$defvalues["ijin3no"]=@$avalues["ijin3no"];
	$defvalues["ijin3tgl"]=@$avalues["ijin3tgl"];
	$defvalues["ijin3tglakhir"]=@$avalues["ijin3tglakhir"];
	$defvalues["ijin4"]=@$avalues["ijin4"];
	$defvalues["ijin4no"]=@$avalues["ijin4no"];
	$defvalues["ijin4tgl"]=@$avalues["ijin4tgl"];
	$defvalues["ijin4tglakhir"]=@$avalues["ijin4tglakhir"];
	$defvalues["enabled"]=@$avalues["enabled"];
	$defvalues["create_date"]=@$avalues["create_date"];
	$defvalues["create_uid"]=@$avalues["create_uid"];
	$defvalues["write_date"]=@$avalues["write_date"];
	$defvalues["write_uid"]=@$avalues["write_uid"];
	$defvalues["op_nm"]=@$avalues["op_nm"];
	$defvalues["op_alamat"]=@$avalues["op_alamat"];
	$defvalues["op_usaha_id"]=@$avalues["op_usaha_id"];
	$defvalues["op_so"]=@$avalues["op_so"];
	$defvalues["op_kecamatan_id"]=@$avalues["op_kecamatan_id"];
	$defvalues["op_kelurahan_id"]=@$avalues["op_kelurahan_id"];
	$defvalues["op_latitude"]=@$avalues["op_latitude"];
	$defvalues["op_longitude"]=@$avalues["op_longitude"];
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
	$defvalues["kd_waletvolume"]=@$avalues["kd_waletvolume"];
	$defvalues["email"]=@$avalues["email"];
	$defvalues["op_pajak_id"]=@$avalues["op_pajak_id"];
	$defvalues["npwpd"]=@$avalues["npwpd"];
	$defvalues["passwd"]=@$avalues["passwd"];
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
	
	if(!$pageObject->isAppearOnTabs("rp"))
		$xt->assign("rp_fieldblock",true);
	else
		$xt->assign("rp_tabfieldblock",true);
	$xt->assign("rp_label",true);
	if(isEnableSection508())
		$xt->assign_section("rp_label","<label for=\"".GetInputElementId("rp", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pb"))
		$xt->assign("pb_fieldblock",true);
	else
		$xt->assign("pb_tabfieldblock",true);
	$xt->assign("pb_label",true);
	if(isEnableSection508())
		$xt->assign_section("pb_label","<label for=\"".GetInputElementId("pb", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("formno"))
		$xt->assign("formno_fieldblock",true);
	else
		$xt->assign("formno_tabfieldblock",true);
	$xt->assign("formno_label",true);
	if(isEnableSection508())
		$xt->assign_section("formno_label","<label for=\"".GetInputElementId("formno", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("reg_date"))
		$xt->assign("reg_date_fieldblock",true);
	else
		$xt->assign("reg_date_tabfieldblock",true);
	$xt->assign("reg_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("reg_date_label","<label for=\"".GetInputElementId("reg_date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("customernm"))
		$xt->assign("customernm_fieldblock",true);
	else
		$xt->assign("customernm_tabfieldblock",true);
	$xt->assign("customernm_label",true);
	if(isEnableSection508())
		$xt->assign_section("customernm_label","<label for=\"".GetInputElementId("customernm", $id, PAGE_ADD)."\">","</label>");
	
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
	
	if(!$pageObject->isAppearOnTabs("kabupaten"))
		$xt->assign("kabupaten_fieldblock",true);
	else
		$xt->assign("kabupaten_tabfieldblock",true);
	$xt->assign("kabupaten_label",true);
	if(isEnableSection508())
		$xt->assign_section("kabupaten_label","<label for=\"".GetInputElementId("kabupaten", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("alamat"))
		$xt->assign("alamat_fieldblock",true);
	else
		$xt->assign("alamat_tabfieldblock",true);
	$xt->assign("alamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_label","<label for=\"".GetInputElementId("alamat", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kodepos"))
		$xt->assign("kodepos_fieldblock",true);
	else
		$xt->assign("kodepos_tabfieldblock",true);
	$xt->assign("kodepos_label",true);
	if(isEnableSection508())
		$xt->assign_section("kodepos_label","<label for=\"".GetInputElementId("kodepos", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("telphone"))
		$xt->assign("telphone_fieldblock",true);
	else
		$xt->assign("telphone_tabfieldblock",true);
	$xt->assign("telphone_label",true);
	if(isEnableSection508())
		$xt->assign_section("telphone_label","<label for=\"".GetInputElementId("telphone", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("wpnama"))
		$xt->assign("wpnama_fieldblock",true);
	else
		$xt->assign("wpnama_tabfieldblock",true);
	$xt->assign("wpnama_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpnama_label","<label for=\"".GetInputElementId("wpnama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("wpalamat"))
		$xt->assign("wpalamat_fieldblock",true);
	else
		$xt->assign("wpalamat_tabfieldblock",true);
	$xt->assign("wpalamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpalamat_label","<label for=\"".GetInputElementId("wpalamat", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("wpkelurahan"))
		$xt->assign("wpkelurahan_fieldblock",true);
	else
		$xt->assign("wpkelurahan_tabfieldblock",true);
	$xt->assign("wpkelurahan_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpkelurahan_label","<label for=\"".GetInputElementId("wpkelurahan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("wpkecamatan"))
		$xt->assign("wpkecamatan_fieldblock",true);
	else
		$xt->assign("wpkecamatan_tabfieldblock",true);
	$xt->assign("wpkecamatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpkecamatan_label","<label for=\"".GetInputElementId("wpkecamatan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("wpkabupaten"))
		$xt->assign("wpkabupaten_fieldblock",true);
	else
		$xt->assign("wpkabupaten_tabfieldblock",true);
	$xt->assign("wpkabupaten_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpkabupaten_label","<label for=\"".GetInputElementId("wpkabupaten", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("wptelp"))
		$xt->assign("wptelp_fieldblock",true);
	else
		$xt->assign("wptelp_tabfieldblock",true);
	$xt->assign("wptelp_label",true);
	if(isEnableSection508())
		$xt->assign_section("wptelp_label","<label for=\"".GetInputElementId("wptelp", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("wpkodepos"))
		$xt->assign("wpkodepos_fieldblock",true);
	else
		$xt->assign("wpkodepos_tabfieldblock",true);
	$xt->assign("wpkodepos_label",true);
	if(isEnableSection508())
		$xt->assign_section("wpkodepos_label","<label for=\"".GetInputElementId("wpkodepos", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pnama"))
		$xt->assign("pnama_fieldblock",true);
	else
		$xt->assign("pnama_tabfieldblock",true);
	$xt->assign("pnama_label",true);
	if(isEnableSection508())
		$xt->assign_section("pnama_label","<label for=\"".GetInputElementId("pnama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("palamat"))
		$xt->assign("palamat_fieldblock",true);
	else
		$xt->assign("palamat_tabfieldblock",true);
	$xt->assign("palamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("palamat_label","<label for=\"".GetInputElementId("palamat", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pkelurahan"))
		$xt->assign("pkelurahan_fieldblock",true);
	else
		$xt->assign("pkelurahan_tabfieldblock",true);
	$xt->assign("pkelurahan_label",true);
	if(isEnableSection508())
		$xt->assign_section("pkelurahan_label","<label for=\"".GetInputElementId("pkelurahan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pkecamatan"))
		$xt->assign("pkecamatan_fieldblock",true);
	else
		$xt->assign("pkecamatan_tabfieldblock",true);
	$xt->assign("pkecamatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("pkecamatan_label","<label for=\"".GetInputElementId("pkecamatan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pkabupaten"))
		$xt->assign("pkabupaten_fieldblock",true);
	else
		$xt->assign("pkabupaten_tabfieldblock",true);
	$xt->assign("pkabupaten_label",true);
	if(isEnableSection508())
		$xt->assign_section("pkabupaten_label","<label for=\"".GetInputElementId("pkabupaten", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ptelp"))
		$xt->assign("ptelp_fieldblock",true);
	else
		$xt->assign("ptelp_tabfieldblock",true);
	$xt->assign("ptelp_label",true);
	if(isEnableSection508())
		$xt->assign_section("ptelp_label","<label for=\"".GetInputElementId("ptelp", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pkodepos"))
		$xt->assign("pkodepos_fieldblock",true);
	else
		$xt->assign("pkodepos_tabfieldblock",true);
	$xt->assign("pkodepos_label",true);
	if(isEnableSection508())
		$xt->assign_section("pkodepos_label","<label for=\"".GetInputElementId("pkodepos", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin1"))
		$xt->assign("ijin1_fieldblock",true);
	else
		$xt->assign("ijin1_tabfieldblock",true);
	$xt->assign("ijin1_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin1_label","<label for=\"".GetInputElementId("ijin1", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin1no"))
		$xt->assign("ijin1no_fieldblock",true);
	else
		$xt->assign("ijin1no_tabfieldblock",true);
	$xt->assign("ijin1no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin1no_label","<label for=\"".GetInputElementId("ijin1no", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin1tgl"))
		$xt->assign("ijin1tgl_fieldblock",true);
	else
		$xt->assign("ijin1tgl_tabfieldblock",true);
	$xt->assign("ijin1tgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin1tgl_label","<label for=\"".GetInputElementId("ijin1tgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin1tglakhir"))
		$xt->assign("ijin1tglakhir_fieldblock",true);
	else
		$xt->assign("ijin1tglakhir_tabfieldblock",true);
	$xt->assign("ijin1tglakhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin1tglakhir_label","<label for=\"".GetInputElementId("ijin1tglakhir", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin2"))
		$xt->assign("ijin2_fieldblock",true);
	else
		$xt->assign("ijin2_tabfieldblock",true);
	$xt->assign("ijin2_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin2_label","<label for=\"".GetInputElementId("ijin2", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin2no"))
		$xt->assign("ijin2no_fieldblock",true);
	else
		$xt->assign("ijin2no_tabfieldblock",true);
	$xt->assign("ijin2no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin2no_label","<label for=\"".GetInputElementId("ijin2no", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin2tgl"))
		$xt->assign("ijin2tgl_fieldblock",true);
	else
		$xt->assign("ijin2tgl_tabfieldblock",true);
	$xt->assign("ijin2tgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin2tgl_label","<label for=\"".GetInputElementId("ijin2tgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin2tglakhir"))
		$xt->assign("ijin2tglakhir_fieldblock",true);
	else
		$xt->assign("ijin2tglakhir_tabfieldblock",true);
	$xt->assign("ijin2tglakhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin2tglakhir_label","<label for=\"".GetInputElementId("ijin2tglakhir", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin3"))
		$xt->assign("ijin3_fieldblock",true);
	else
		$xt->assign("ijin3_tabfieldblock",true);
	$xt->assign("ijin3_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin3_label","<label for=\"".GetInputElementId("ijin3", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin3no"))
		$xt->assign("ijin3no_fieldblock",true);
	else
		$xt->assign("ijin3no_tabfieldblock",true);
	$xt->assign("ijin3no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin3no_label","<label for=\"".GetInputElementId("ijin3no", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin3tgl"))
		$xt->assign("ijin3tgl_fieldblock",true);
	else
		$xt->assign("ijin3tgl_tabfieldblock",true);
	$xt->assign("ijin3tgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin3tgl_label","<label for=\"".GetInputElementId("ijin3tgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin3tglakhir"))
		$xt->assign("ijin3tglakhir_fieldblock",true);
	else
		$xt->assign("ijin3tglakhir_tabfieldblock",true);
	$xt->assign("ijin3tglakhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin3tglakhir_label","<label for=\"".GetInputElementId("ijin3tglakhir", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin4"))
		$xt->assign("ijin4_fieldblock",true);
	else
		$xt->assign("ijin4_tabfieldblock",true);
	$xt->assign("ijin4_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin4_label","<label for=\"".GetInputElementId("ijin4", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin4no"))
		$xt->assign("ijin4no_fieldblock",true);
	else
		$xt->assign("ijin4no_tabfieldblock",true);
	$xt->assign("ijin4no_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin4no_label","<label for=\"".GetInputElementId("ijin4no", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin4tgl"))
		$xt->assign("ijin4tgl_fieldblock",true);
	else
		$xt->assign("ijin4tgl_tabfieldblock",true);
	$xt->assign("ijin4tgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin4tgl_label","<label for=\"".GetInputElementId("ijin4tgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ijin4tglakhir"))
		$xt->assign("ijin4tglakhir_fieldblock",true);
	else
		$xt->assign("ijin4tglakhir_tabfieldblock",true);
	$xt->assign("ijin4tglakhir_label",true);
	if(isEnableSection508())
		$xt->assign_section("ijin4tglakhir_label","<label for=\"".GetInputElementId("ijin4tglakhir", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("enabled"))
		$xt->assign("enabled_fieldblock",true);
	else
		$xt->assign("enabled_tabfieldblock",true);
	$xt->assign("enabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("enabled_label","<label for=\"".GetInputElementId("enabled", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("create_date"))
		$xt->assign("create_date_fieldblock",true);
	else
		$xt->assign("create_date_tabfieldblock",true);
	$xt->assign("create_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_date_label","<label for=\"".GetInputElementId("create_date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
	$xt->assign("create_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_uid_label","<label for=\"".GetInputElementId("create_uid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("write_date"))
		$xt->assign("write_date_fieldblock",true);
	else
		$xt->assign("write_date_tabfieldblock",true);
	$xt->assign("write_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("write_date_label","<label for=\"".GetInputElementId("write_date", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("write_uid"))
		$xt->assign("write_uid_fieldblock",true);
	else
		$xt->assign("write_uid_tabfieldblock",true);
	$xt->assign("write_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("write_uid_label","<label for=\"".GetInputElementId("write_uid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("op_nm"))
		$xt->assign("op_nm_fieldblock",true);
	else
		$xt->assign("op_nm_tabfieldblock",true);
	$xt->assign("op_nm_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_nm_label","<label for=\"".GetInputElementId("op_nm", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("op_alamat"))
		$xt->assign("op_alamat_fieldblock",true);
	else
		$xt->assign("op_alamat_tabfieldblock",true);
	$xt->assign("op_alamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_alamat_label","<label for=\"".GetInputElementId("op_alamat", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("op_usaha_id"))
		$xt->assign("op_usaha_id_fieldblock",true);
	else
		$xt->assign("op_usaha_id_tabfieldblock",true);
	$xt->assign("op_usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_usaha_id_label","<label for=\"".GetInputElementId("op_usaha_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("op_so"))
		$xt->assign("op_so_fieldblock",true);
	else
		$xt->assign("op_so_tabfieldblock",true);
	$xt->assign("op_so_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_so_label","<label for=\"".GetInputElementId("op_so", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("op_kecamatan_id"))
		$xt->assign("op_kecamatan_id_fieldblock",true);
	else
		$xt->assign("op_kecamatan_id_tabfieldblock",true);
	$xt->assign("op_kecamatan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_kecamatan_id_label","<label for=\"".GetInputElementId("op_kecamatan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("op_kelurahan_id"))
		$xt->assign("op_kelurahan_id_fieldblock",true);
	else
		$xt->assign("op_kelurahan_id_tabfieldblock",true);
	$xt->assign("op_kelurahan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_kelurahan_id_label","<label for=\"".GetInputElementId("op_kelurahan_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("op_latitude"))
		$xt->assign("op_latitude_fieldblock",true);
	else
		$xt->assign("op_latitude_tabfieldblock",true);
	$xt->assign("op_latitude_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_latitude_label","<label for=\"".GetInputElementId("op_latitude", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("op_longitude"))
		$xt->assign("op_longitude_fieldblock",true);
	else
		$xt->assign("op_longitude_tabfieldblock",true);
	$xt->assign("op_longitude_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_longitude_label","<label for=\"".GetInputElementId("op_longitude", $id, PAGE_ADD)."\">","</label>");
	
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
	
	if(!$pageObject->isAppearOnTabs("kd_waletvolume"))
		$xt->assign("kd_waletvolume_fieldblock",true);
	else
		$xt->assign("kd_waletvolume_tabfieldblock",true);
	$xt->assign("kd_waletvolume_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_waletvolume_label","<label for=\"".GetInputElementId("kd_waletvolume", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("email"))
		$xt->assign("email_fieldblock",true);
	else
		$xt->assign("email_tabfieldblock",true);
	$xt->assign("email_label",true);
	if(isEnableSection508())
		$xt->assign_section("email_label","<label for=\"".GetInputElementId("email", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("op_pajak_id"))
		$xt->assign("op_pajak_id_fieldblock",true);
	else
		$xt->assign("op_pajak_id_tabfieldblock",true);
	$xt->assign("op_pajak_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("op_pajak_id_label","<label for=\"".GetInputElementId("op_pajak_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("npwpd"))
		$xt->assign("npwpd_fieldblock",true);
	else
		$xt->assign("npwpd_tabfieldblock",true);
	$xt->assign("npwpd_label",true);
	if(isEnableSection508())
		$xt->assign_section("npwpd_label","<label for=\"".GetInputElementId("npwpd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("passwd"))
		$xt->assign("passwd_fieldblock",true);
	else
		$xt->assign("passwd_tabfieldblock",true);
	$xt->assign("passwd_label",true);
	if(isEnableSection508())
		$xt->assign_section("passwd_label","<label for=\"".GetInputElementId("passwd", $id, PAGE_ADD)."\">","</label>");
	
	
	
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
	$showDetailKeys["pad.pad_daftar_hist"]["masterkey1"] = $data["id"];	
	$showDetailKeys["pad.pad_daftar_kd_det"]["masterkey1"] = $data["id"];	

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
//	rp
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("rp", $data, $keylink);
		$showValues["rp"] = $value;
		$showFields[] = "rp";
	}	
//	pb
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pb", $data, $keylink);
		$showValues["pb"] = $value;
		$showFields[] = "pb";
	}	
//	formno
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("formno", $data, $keylink);
		$showValues["formno"] = $value;
		$showFields[] = "formno";
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
//	customernm
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("customernm", $data, $keylink);
		$showValues["customernm"] = $value;
		$showFields[] = "customernm";
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
//	kabupaten
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kabupaten", $data, $keylink);
		$showValues["kabupaten"] = $value;
		$showFields[] = "kabupaten";
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
//	kodepos
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kodepos", $data, $keylink);
		$showValues["kodepos"] = $value;
		$showFields[] = "kodepos";
	}	
//	telphone
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("telphone", $data, $keylink);
		$showValues["telphone"] = $value;
		$showFields[] = "telphone";
	}	
//	wpnama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("wpnama", $data, $keylink);
		$showValues["wpnama"] = $value;
		$showFields[] = "wpnama";
	}	
//	wpalamat
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("wpalamat", $data, $keylink);
		$showValues["wpalamat"] = $value;
		$showFields[] = "wpalamat";
	}	
//	wpkelurahan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("wpkelurahan", $data, $keylink);
		$showValues["wpkelurahan"] = $value;
		$showFields[] = "wpkelurahan";
	}	
//	wpkecamatan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("wpkecamatan", $data, $keylink);
		$showValues["wpkecamatan"] = $value;
		$showFields[] = "wpkecamatan";
	}	
//	wpkabupaten
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("wpkabupaten", $data, $keylink);
		$showValues["wpkabupaten"] = $value;
		$showFields[] = "wpkabupaten";
	}	
//	wptelp
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("wptelp", $data, $keylink);
		$showValues["wptelp"] = $value;
		$showFields[] = "wptelp";
	}	
//	wpkodepos
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("wpkodepos", $data, $keylink);
		$showValues["wpkodepos"] = $value;
		$showFields[] = "wpkodepos";
	}	
//	pnama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pnama", $data, $keylink);
		$showValues["pnama"] = $value;
		$showFields[] = "pnama";
	}	
//	palamat
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("palamat", $data, $keylink);
		$showValues["palamat"] = $value;
		$showFields[] = "palamat";
	}	
//	pkelurahan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pkelurahan", $data, $keylink);
		$showValues["pkelurahan"] = $value;
		$showFields[] = "pkelurahan";
	}	
//	pkecamatan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pkecamatan", $data, $keylink);
		$showValues["pkecamatan"] = $value;
		$showFields[] = "pkecamatan";
	}	
//	pkabupaten
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pkabupaten", $data, $keylink);
		$showValues["pkabupaten"] = $value;
		$showFields[] = "pkabupaten";
	}	
//	ptelp
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ptelp", $data, $keylink);
		$showValues["ptelp"] = $value;
		$showFields[] = "ptelp";
	}	
//	pkodepos
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pkodepos", $data, $keylink);
		$showValues["pkodepos"] = $value;
		$showFields[] = "pkodepos";
	}	
//	ijin1
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin1", $data, $keylink);
		$showValues["ijin1"] = $value;
		$showFields[] = "ijin1";
	}	
//	ijin1no
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin1no", $data, $keylink);
		$showValues["ijin1no"] = $value;
		$showFields[] = "ijin1no";
	}	
//	ijin1tgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin1tgl", $data, $keylink);
		$showValues["ijin1tgl"] = $value;
		$showFields[] = "ijin1tgl";
	}	
//	ijin1tglakhir
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin1tglakhir", $data, $keylink);
		$showValues["ijin1tglakhir"] = $value;
		$showFields[] = "ijin1tglakhir";
	}	
//	ijin2
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin2", $data, $keylink);
		$showValues["ijin2"] = $value;
		$showFields[] = "ijin2";
	}	
//	ijin2no
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin2no", $data, $keylink);
		$showValues["ijin2no"] = $value;
		$showFields[] = "ijin2no";
	}	
//	ijin2tgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin2tgl", $data, $keylink);
		$showValues["ijin2tgl"] = $value;
		$showFields[] = "ijin2tgl";
	}	
//	ijin2tglakhir
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin2tglakhir", $data, $keylink);
		$showValues["ijin2tglakhir"] = $value;
		$showFields[] = "ijin2tglakhir";
	}	
//	ijin3
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin3", $data, $keylink);
		$showValues["ijin3"] = $value;
		$showFields[] = "ijin3";
	}	
//	ijin3no
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin3no", $data, $keylink);
		$showValues["ijin3no"] = $value;
		$showFields[] = "ijin3no";
	}	
//	ijin3tgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin3tgl", $data, $keylink);
		$showValues["ijin3tgl"] = $value;
		$showFields[] = "ijin3tgl";
	}	
//	ijin3tglakhir
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin3tglakhir", $data, $keylink);
		$showValues["ijin3tglakhir"] = $value;
		$showFields[] = "ijin3tglakhir";
	}	
//	ijin4
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin4", $data, $keylink);
		$showValues["ijin4"] = $value;
		$showFields[] = "ijin4";
	}	
//	ijin4no
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin4no", $data, $keylink);
		$showValues["ijin4no"] = $value;
		$showFields[] = "ijin4no";
	}	
//	ijin4tgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin4tgl", $data, $keylink);
		$showValues["ijin4tgl"] = $value;
		$showFields[] = "ijin4tgl";
	}	
//	ijin4tglakhir
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ijin4tglakhir", $data, $keylink);
		$showValues["ijin4tglakhir"] = $value;
		$showFields[] = "ijin4tglakhir";
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
//	create_date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("create_date", $data, $keylink);
		$showValues["create_date"] = $value;
		$showFields[] = "create_date";
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
//	write_date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("write_date", $data, $keylink);
		$showValues["write_date"] = $value;
		$showFields[] = "write_date";
	}	
//	write_uid
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("write_uid", $data, $keylink);
		$showValues["write_uid"] = $value;
		$showFields[] = "write_uid";
	}	
//	op_nm
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("op_nm", $data, $keylink);
		$showValues["op_nm"] = $value;
		$showFields[] = "op_nm";
	}	
//	op_alamat
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("op_alamat", $data, $keylink);
		$showValues["op_alamat"] = $value;
		$showFields[] = "op_alamat";
	}	
//	op_usaha_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("op_usaha_id", $data, $keylink);
		$showValues["op_usaha_id"] = $value;
		$showFields[] = "op_usaha_id";
	}	
//	op_so
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("op_so", $data, $keylink);
		$showValues["op_so"] = $value;
		$showFields[] = "op_so";
	}	
//	op_kecamatan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("op_kecamatan_id", $data, $keylink);
		$showValues["op_kecamatan_id"] = $value;
		$showFields[] = "op_kecamatan_id";
	}	
//	op_kelurahan_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("op_kelurahan_id", $data, $keylink);
		$showValues["op_kelurahan_id"] = $value;
		$showFields[] = "op_kelurahan_id";
	}	
//	op_latitude
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("op_latitude", $data, $keylink);
		$showValues["op_latitude"] = $value;
		$showFields[] = "op_latitude";
	}	
//	op_longitude
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("op_longitude", $data, $keylink);
		$showValues["op_longitude"] = $value;
		$showFields[] = "op_longitude";
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
//	kd_waletvolume
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_waletvolume", $data, $keylink);
		$showValues["kd_waletvolume"] = $value;
		$showFields[] = "kd_waletvolume";
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
//	op_pajak_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("op_pajak_id", $data, $keylink);
		$showValues["op_pajak_id"] = $value;
		$showFields[] = "op_pajak_id";
	}	
//	npwpd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("npwpd", $data, $keylink);
		$showValues["npwpd"] = $value;
		$showFields[] = "npwpd";
	}	
//	passwd
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("passwd", $data, $keylink);
		$showValues["passwd"] = $value;
		$showFields[] = "passwd";
	}	
		$showRawValues["id"] = substr($data["id"],0,100);
		$showRawValues["rp"] = substr($data["rp"],0,100);
		$showRawValues["pb"] = substr($data["pb"],0,100);
		$showRawValues["formno"] = substr($data["formno"],0,100);
		$showRawValues["reg_date"] = substr($data["reg_date"],0,100);
		$showRawValues["customernm"] = substr($data["customernm"],0,100);
		$showRawValues["kecamatan_id"] = substr($data["kecamatan_id"],0,100);
		$showRawValues["kelurahan_id"] = substr($data["kelurahan_id"],0,100);
		$showRawValues["kabupaten"] = substr($data["kabupaten"],0,100);
		$showRawValues["alamat"] = substr($data["alamat"],0,100);
		$showRawValues["kodepos"] = substr($data["kodepos"],0,100);
		$showRawValues["telphone"] = substr($data["telphone"],0,100);
		$showRawValues["wpnama"] = substr($data["wpnama"],0,100);
		$showRawValues["wpalamat"] = substr($data["wpalamat"],0,100);
		$showRawValues["wpkelurahan"] = substr($data["wpkelurahan"],0,100);
		$showRawValues["wpkecamatan"] = substr($data["wpkecamatan"],0,100);
		$showRawValues["wpkabupaten"] = substr($data["wpkabupaten"],0,100);
		$showRawValues["wptelp"] = substr($data["wptelp"],0,100);
		$showRawValues["wpkodepos"] = substr($data["wpkodepos"],0,100);
		$showRawValues["pnama"] = substr($data["pnama"],0,100);
		$showRawValues["palamat"] = substr($data["palamat"],0,100);
		$showRawValues["pkelurahan"] = substr($data["pkelurahan"],0,100);
		$showRawValues["pkecamatan"] = substr($data["pkecamatan"],0,100);
		$showRawValues["pkabupaten"] = substr($data["pkabupaten"],0,100);
		$showRawValues["ptelp"] = substr($data["ptelp"],0,100);
		$showRawValues["pkodepos"] = substr($data["pkodepos"],0,100);
		$showRawValues["ijin1"] = substr($data["ijin1"],0,100);
		$showRawValues["ijin1no"] = substr($data["ijin1no"],0,100);
		$showRawValues["ijin1tgl"] = substr($data["ijin1tgl"],0,100);
		$showRawValues["ijin1tglakhir"] = substr($data["ijin1tglakhir"],0,100);
		$showRawValues["ijin2"] = substr($data["ijin2"],0,100);
		$showRawValues["ijin2no"] = substr($data["ijin2no"],0,100);
		$showRawValues["ijin2tgl"] = substr($data["ijin2tgl"],0,100);
		$showRawValues["ijin2tglakhir"] = substr($data["ijin2tglakhir"],0,100);
		$showRawValues["ijin3"] = substr($data["ijin3"],0,100);
		$showRawValues["ijin3no"] = substr($data["ijin3no"],0,100);
		$showRawValues["ijin3tgl"] = substr($data["ijin3tgl"],0,100);
		$showRawValues["ijin3tglakhir"] = substr($data["ijin3tglakhir"],0,100);
		$showRawValues["ijin4"] = substr($data["ijin4"],0,100);
		$showRawValues["ijin4no"] = substr($data["ijin4no"],0,100);
		$showRawValues["ijin4tgl"] = substr($data["ijin4tgl"],0,100);
		$showRawValues["ijin4tglakhir"] = substr($data["ijin4tglakhir"],0,100);
		$showRawValues["enabled"] = substr($data["enabled"],0,100);
		$showRawValues["create_date"] = substr($data["create_date"],0,100);
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);
		$showRawValues["write_date"] = substr($data["write_date"],0,100);
		$showRawValues["write_uid"] = substr($data["write_uid"],0,100);
		$showRawValues["op_nm"] = substr($data["op_nm"],0,100);
		$showRawValues["op_alamat"] = substr($data["op_alamat"],0,100);
		$showRawValues["op_usaha_id"] = substr($data["op_usaha_id"],0,100);
		$showRawValues["op_so"] = substr($data["op_so"],0,100);
		$showRawValues["op_kecamatan_id"] = substr($data["op_kecamatan_id"],0,100);
		$showRawValues["op_kelurahan_id"] = substr($data["op_kelurahan_id"],0,100);
		$showRawValues["op_latitude"] = substr($data["op_latitude"],0,100);
		$showRawValues["op_longitude"] = substr($data["op_longitude"],0,100);
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
		$showRawValues["kd_waletvolume"] = substr($data["kd_waletvolume"],0,100);
		$showRawValues["email"] = substr($data["email"],0,100);
		$showRawValues["op_pajak_id"] = substr($data["op_pajak_id"],0,100);
		$showRawValues["npwpd"] = substr($data["npwpd"],0,100);
		$showRawValues["passwd"] = substr($data["passwd"],0,100);
	
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
		$options['masterTable'] = "pad.pad_daftar";
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
	$strTableName = "pad.pad_daftar";
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
