<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/pad_pad_sspd_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_sspd_add"] = $layout;



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
	$templatefile = "pad_pad_sspd_inline_add.htm";
else
	$templatefile = "pad_pad_sspd_add.htm";

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
		header('Location: pad_pad_sspd_add.php');
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
//	processing sspdno - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_sspdno = $pageObject->getControl("sspdno", $id);
		$control_sspdno->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing sspdno - end
//	processing sspdtgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_sspdtgl = $pageObject->getControl("sspdtgl", $id);
		$control_sspdtgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing sspdtgl - end
//	processing sspdjam - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_sspdjam = $pageObject->getControl("sspdjam", $id);
		$control_sspdjam->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing sspdjam - end
//	processing invoice_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_invoice_id = $pageObject->getControl("invoice_id", $id);
		$control_invoice_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing invoice_id - end
//	processing keterangan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan = $pageObject->getControl("keterangan", $id);
		$control_keterangan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan - end
//	processing bulan_telat - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_bulan_telat = $pageObject->getControl("bulan_telat", $id);
		$control_bulan_telat->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing bulan_telat - end
//	processing hitung_bunga - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_hitung_bunga = $pageObject->getControl("hitung_bunga", $id);
		$control_hitung_bunga->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing hitung_bunga - end
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
//	processing jml_bayar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jml_bayar = $pageObject->getControl("jml_bayar", $id);
		$control_jml_bayar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jml_bayar - end
//	processing sisa - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_sisa = $pageObject->getControl("sisa", $id);
		$control_sisa->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing sisa - end
//	processing jenis_bayar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jenis_bayar = $pageObject->getControl("jenis_bayar", $id);
		$control_jenis_bayar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jenis_bayar - end
//	processing printed - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_printed = $pageObject->getControl("printed", $id);
		$control_printed->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing printed - end
//	processing tp_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tp_id = $pageObject->getControl("tp_id", $id);
		$control_tp_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tp_id - end
//	processing is_validated - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_is_validated = $pageObject->getControl("is_validated", $id);
		$control_is_validated->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing is_validated - end
//	processing is_valid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_is_valid = $pageObject->getControl("is_valid", $id);
		$control_is_valid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing is_valid - end
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
//	processing petugas_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_petugas_id = $pageObject->getControl("petugas_id", $id);
		$control_petugas_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing petugas_id - end
//	processing pejabat_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pejabat_id = $pageObject->getControl("pejabat_id", $id);
		$control_pejabat_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pejabat_id - end




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
//	processing sspdno - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_sspdno->afterSuccessfulSave();
			}
//	processing sspdno - end
//	processing sspdtgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_sspdtgl->afterSuccessfulSave();
			}
//	processing sspdtgl - end
//	processing sspdjam - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_sspdjam->afterSuccessfulSave();
			}
//	processing sspdjam - end
//	processing invoice_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_invoice_id->afterSuccessfulSave();
			}
//	processing invoice_id - end
//	processing keterangan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan->afterSuccessfulSave();
			}
//	processing keterangan - end
//	processing bulan_telat - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_bulan_telat->afterSuccessfulSave();
			}
//	processing bulan_telat - end
//	processing hitung_bunga - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_hitung_bunga->afterSuccessfulSave();
			}
//	processing hitung_bunga - end
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
//	processing jml_bayar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jml_bayar->afterSuccessfulSave();
			}
//	processing jml_bayar - end
//	processing sisa - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_sisa->afterSuccessfulSave();
			}
//	processing sisa - end
//	processing jenis_bayar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jenis_bayar->afterSuccessfulSave();
			}
//	processing jenis_bayar - end
//	processing printed - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_printed->afterSuccessfulSave();
			}
//	processing printed - end
//	processing tp_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tp_id->afterSuccessfulSave();
			}
//	processing tp_id - end
//	processing is_validated - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_is_validated->afterSuccessfulSave();
			}
//	processing is_validated - end
//	processing is_valid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_is_valid->afterSuccessfulSave();
			}
//	processing is_valid - end
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
//	processing petugas_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_petugas_id->afterSuccessfulSave();
			}
//	processing petugas_id - end
//	processing pejabat_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pejabat_id->afterSuccessfulSave();
			}
//	processing pejabat_id - end

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
						$message .='&nbsp;<a href=\'pad_pad_sspd_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'pad_pad_sspd_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: pad_pad_sspd_".$pageObject->getPageType().".php");
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
	$defvalues["tahun"]=@$avalues["tahun"];
	$defvalues["sspdno"]=@$avalues["sspdno"];
	$defvalues["sspdtgl"]=@$avalues["sspdtgl"];
	$defvalues["sspdjam"]=@$avalues["sspdjam"];
	$defvalues["invoice_id"]=@$avalues["invoice_id"];
	$defvalues["keterangan"]=@$avalues["keterangan"];
	$defvalues["bulan_telat"]=@$avalues["bulan_telat"];
	$defvalues["hitung_bunga"]=@$avalues["hitung_bunga"];
	$defvalues["denda"]=@$avalues["denda"];
	$defvalues["bunga"]=@$avalues["bunga"];
	$defvalues["jml_bayar"]=@$avalues["jml_bayar"];
	$defvalues["sisa"]=@$avalues["sisa"];
	$defvalues["jenis_bayar"]=@$avalues["jenis_bayar"];
	$defvalues["printed"]=@$avalues["printed"];
	$defvalues["tp_id"]=@$avalues["tp_id"];
	$defvalues["is_validated"]=@$avalues["is_validated"];
	$defvalues["is_valid"]=@$avalues["is_valid"];
	$defvalues["enabled"]=@$avalues["enabled"];
	$defvalues["created"]=@$avalues["created"];
	$defvalues["create_uid"]=@$avalues["create_uid"];
	$defvalues["updated"]=@$avalues["updated"];
	$defvalues["update_uid"]=@$avalues["update_uid"];
	$defvalues["petugas_id"]=@$avalues["petugas_id"];
	$defvalues["pejabat_id"]=@$avalues["pejabat_id"];
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
	
	if(!$pageObject->isAppearOnTabs("sspdno"))
		$xt->assign("sspdno_fieldblock",true);
	else
		$xt->assign("sspdno_tabfieldblock",true);
	$xt->assign("sspdno_label",true);
	if(isEnableSection508())
		$xt->assign_section("sspdno_label","<label for=\"".GetInputElementId("sspdno", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("sspdtgl"))
		$xt->assign("sspdtgl_fieldblock",true);
	else
		$xt->assign("sspdtgl_tabfieldblock",true);
	$xt->assign("sspdtgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("sspdtgl_label","<label for=\"".GetInputElementId("sspdtgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("sspdjam"))
		$xt->assign("sspdjam_fieldblock",true);
	else
		$xt->assign("sspdjam_tabfieldblock",true);
	$xt->assign("sspdjam_label",true);
	if(isEnableSection508())
		$xt->assign_section("sspdjam_label","<label for=\"".GetInputElementId("sspdjam", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("invoice_id"))
		$xt->assign("invoice_id_fieldblock",true);
	else
		$xt->assign("invoice_id_tabfieldblock",true);
	$xt->assign("invoice_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("invoice_id_label","<label for=\"".GetInputElementId("invoice_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan"))
		$xt->assign("keterangan_fieldblock",true);
	else
		$xt->assign("keterangan_tabfieldblock",true);
	$xt->assign("keterangan_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan_label","<label for=\"".GetInputElementId("keterangan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("bulan_telat"))
		$xt->assign("bulan_telat_fieldblock",true);
	else
		$xt->assign("bulan_telat_tabfieldblock",true);
	$xt->assign("bulan_telat_label",true);
	if(isEnableSection508())
		$xt->assign_section("bulan_telat_label","<label for=\"".GetInputElementId("bulan_telat", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("hitung_bunga"))
		$xt->assign("hitung_bunga_fieldblock",true);
	else
		$xt->assign("hitung_bunga_tabfieldblock",true);
	$xt->assign("hitung_bunga_label",true);
	if(isEnableSection508())
		$xt->assign_section("hitung_bunga_label","<label for=\"".GetInputElementId("hitung_bunga", $id, PAGE_ADD)."\">","</label>");
	
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
	
	if(!$pageObject->isAppearOnTabs("jml_bayar"))
		$xt->assign("jml_bayar_fieldblock",true);
	else
		$xt->assign("jml_bayar_tabfieldblock",true);
	$xt->assign("jml_bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("jml_bayar_label","<label for=\"".GetInputElementId("jml_bayar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("sisa"))
		$xt->assign("sisa_fieldblock",true);
	else
		$xt->assign("sisa_tabfieldblock",true);
	$xt->assign("sisa_label",true);
	if(isEnableSection508())
		$xt->assign_section("sisa_label","<label for=\"".GetInputElementId("sisa", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("jenis_bayar"))
		$xt->assign("jenis_bayar_fieldblock",true);
	else
		$xt->assign("jenis_bayar_tabfieldblock",true);
	$xt->assign("jenis_bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("jenis_bayar_label","<label for=\"".GetInputElementId("jenis_bayar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("printed"))
		$xt->assign("printed_fieldblock",true);
	else
		$xt->assign("printed_tabfieldblock",true);
	$xt->assign("printed_label",true);
	if(isEnableSection508())
		$xt->assign_section("printed_label","<label for=\"".GetInputElementId("printed", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tp_id"))
		$xt->assign("tp_id_fieldblock",true);
	else
		$xt->assign("tp_id_tabfieldblock",true);
	$xt->assign("tp_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_id_label","<label for=\"".GetInputElementId("tp_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("is_validated"))
		$xt->assign("is_validated_fieldblock",true);
	else
		$xt->assign("is_validated_tabfieldblock",true);
	$xt->assign("is_validated_label",true);
	if(isEnableSection508())
		$xt->assign_section("is_validated_label","<label for=\"".GetInputElementId("is_validated", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("is_valid"))
		$xt->assign("is_valid_fieldblock",true);
	else
		$xt->assign("is_valid_tabfieldblock",true);
	$xt->assign("is_valid_label",true);
	if(isEnableSection508())
		$xt->assign_section("is_valid_label","<label for=\"".GetInputElementId("is_valid", $id, PAGE_ADD)."\">","</label>");
	
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
	
	if(!$pageObject->isAppearOnTabs("petugas_id"))
		$xt->assign("petugas_id_fieldblock",true);
	else
		$xt->assign("petugas_id_tabfieldblock",true);
	$xt->assign("petugas_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("petugas_id_label","<label for=\"".GetInputElementId("petugas_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pejabat_id"))
		$xt->assign("pejabat_id_fieldblock",true);
	else
		$xt->assign("pejabat_id_tabfieldblock",true);
	$xt->assign("pejabat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("pejabat_id_label","<label for=\"".GetInputElementId("pejabat_id", $id, PAGE_ADD)."\">","</label>");
	
	
	
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
	$showDetailKeys["public.pad_payment"]["masterkey1"] = $data["id"];	

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
//	sspdno
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("sspdno", $data, $keylink);
		$showValues["sspdno"] = $value;
		$showFields[] = "sspdno";
	}	
//	sspdtgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("sspdtgl", $data, $keylink);
		$showValues["sspdtgl"] = $value;
		$showFields[] = "sspdtgl";
	}	
//	sspdjam
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("sspdjam", $data, $keylink);
		$showValues["sspdjam"] = $value;
		$showFields[] = "sspdjam";
	}	
//	invoice_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("invoice_id", $data, $keylink);
		$showValues["invoice_id"] = $value;
		$showFields[] = "invoice_id";
	}	
//	keterangan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("keterangan", $data, $keylink);
		$showValues["keterangan"] = $value;
		$showFields[] = "keterangan";
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
//	hitung_bunga
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("hitung_bunga", $data, $keylink);
		$showValues["hitung_bunga"] = $value;
		$showFields[] = "hitung_bunga";
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
//	jml_bayar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("jml_bayar", $data, $keylink);
		$showValues["jml_bayar"] = $value;
		$showFields[] = "jml_bayar";
	}	
//	sisa
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("sisa", $data, $keylink);
		$showValues["sisa"] = $value;
		$showFields[] = "sisa";
	}	
//	jenis_bayar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("jenis_bayar", $data, $keylink);
		$showValues["jenis_bayar"] = $value;
		$showFields[] = "jenis_bayar";
	}	
//	printed
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("printed", $data, $keylink);
		$showValues["printed"] = $value;
		$showFields[] = "printed";
	}	
//	tp_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tp_id", $data, $keylink);
		$showValues["tp_id"] = $value;
		$showFields[] = "tp_id";
	}	
//	is_validated
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("is_validated", $data, $keylink);
		$showValues["is_validated"] = $value;
		$showFields[] = "is_validated";
	}	
//	is_valid
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("is_valid", $data, $keylink);
		$showValues["is_valid"] = $value;
		$showFields[] = "is_valid";
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
//	petugas_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("petugas_id", $data, $keylink);
		$showValues["petugas_id"] = $value;
		$showFields[] = "petugas_id";
	}	
//	pejabat_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pejabat_id", $data, $keylink);
		$showValues["pejabat_id"] = $value;
		$showFields[] = "pejabat_id";
	}	
		$showRawValues["id"] = substr($data["id"],0,100);
		$showRawValues["tahun"] = substr($data["tahun"],0,100);
		$showRawValues["sspdno"] = substr($data["sspdno"],0,100);
		$showRawValues["sspdtgl"] = substr($data["sspdtgl"],0,100);
		$showRawValues["sspdjam"] = substr($data["sspdjam"],0,100);
		$showRawValues["invoice_id"] = substr($data["invoice_id"],0,100);
		$showRawValues["keterangan"] = substr($data["keterangan"],0,100);
		$showRawValues["bulan_telat"] = substr($data["bulan_telat"],0,100);
		$showRawValues["hitung_bunga"] = substr($data["hitung_bunga"],0,100);
		$showRawValues["denda"] = substr($data["denda"],0,100);
		$showRawValues["bunga"] = substr($data["bunga"],0,100);
		$showRawValues["jml_bayar"] = substr($data["jml_bayar"],0,100);
		$showRawValues["sisa"] = substr($data["sisa"],0,100);
		$showRawValues["jenis_bayar"] = substr($data["jenis_bayar"],0,100);
		$showRawValues["printed"] = substr($data["printed"],0,100);
		$showRawValues["tp_id"] = substr($data["tp_id"],0,100);
		$showRawValues["is_validated"] = substr($data["is_validated"],0,100);
		$showRawValues["is_valid"] = substr($data["is_valid"],0,100);
		$showRawValues["enabled"] = substr($data["enabled"],0,100);
		$showRawValues["created"] = substr($data["created"],0,100);
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);
		$showRawValues["updated"] = substr($data["updated"],0,100);
		$showRawValues["update_uid"] = substr($data["update_uid"],0,100);
		$showRawValues["petugas_id"] = substr($data["petugas_id"],0,100);
		$showRawValues["pejabat_id"] = substr($data["pejabat_id"],0,100);
	
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
		$options['masterTable'] = "pad.pad_sspd";
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
	$strTableName = "pad.pad_sspd";
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
