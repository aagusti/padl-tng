<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/public_pad_payment_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["public_pad_payment_add"] = $layout;



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
	$templatefile = "public_pad_payment_inline_add.htm";
else
	$templatefile = "public_pad_payment_add.htm";

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
		header('Location: public_pad_payment_add.php');
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
//	processing id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_id = $pageObject->getControl("id", $id);
		$control_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing id - end
//	processing invoice_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_invoice_id = $pageObject->getControl("invoice_id", $id);
		$control_invoice_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing invoice_id - end
//	processing tgl - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tgl = $pageObject->getControl("tgl", $id);
		$control_tgl->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tgl - end
//	processing tagihan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tagihan = $pageObject->getControl("tagihan", $id);
		$control_tagihan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tagihan - end
//	processing denda - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_denda = $pageObject->getControl("denda", $id);
		$control_denda->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing denda - end
//	processing total_bayar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_total_bayar = $pageObject->getControl("total_bayar", $id);
		$control_total_bayar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing total_bayar - end
//	processing iso_request - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_iso_request = $pageObject->getControl("iso_request", $id);
		$control_iso_request->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing iso_request - end
//	processing transmission - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_transmission = $pageObject->getControl("transmission", $id);
		$control_transmission->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing transmission - end
//	processing settlement - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_settlement = $pageObject->getControl("settlement", $id);
		$control_settlement->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing settlement - end
//	processing stan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_stan = $pageObject->getControl("stan", $id);
		$control_stan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing stan - end
//	processing ntb - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ntb = $pageObject->getControl("ntb", $id);
		$control_ntb->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ntb - end
//	processing ntp - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_ntp = $pageObject->getControl("ntp", $id);
		$control_ntp->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing ntp - end
//	processing bank_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_bank_id = $pageObject->getControl("bank_id", $id);
		$control_bank_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing bank_id - end
//	processing channel_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_channel_id = $pageObject->getControl("channel_id", $id);
		$control_channel_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing channel_id - end
//	processing bank_ip - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_bank_ip = $pageObject->getControl("bank_ip", $id);
		$control_bank_ip->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing bank_ip - end


//	insert masterkey value if exists and if not specified
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_sspd")
	{
		if(postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		
		if($avalues["id"]==""){
			$avalues["id"] = prepare_for_db("id",$_SESSION[$sessionPrefix."_masterkey1"]);
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
//	processing id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_id->afterSuccessfulSave();
			}
//	processing id - end
//	processing invoice_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_invoice_id->afterSuccessfulSave();
			}
//	processing invoice_id - end
//	processing tgl - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tgl->afterSuccessfulSave();
			}
//	processing tgl - end
//	processing tagihan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tagihan->afterSuccessfulSave();
			}
//	processing tagihan - end
//	processing denda - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_denda->afterSuccessfulSave();
			}
//	processing denda - end
//	processing total_bayar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_total_bayar->afterSuccessfulSave();
			}
//	processing total_bayar - end
//	processing iso_request - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_iso_request->afterSuccessfulSave();
			}
//	processing iso_request - end
//	processing transmission - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_transmission->afterSuccessfulSave();
			}
//	processing transmission - end
//	processing settlement - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_settlement->afterSuccessfulSave();
			}
//	processing settlement - end
//	processing stan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_stan->afterSuccessfulSave();
			}
//	processing stan - end
//	processing ntb - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ntb->afterSuccessfulSave();
			}
//	processing ntb - end
//	processing ntp - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_ntp->afterSuccessfulSave();
			}
//	processing ntp - end
//	processing bank_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_bank_id->afterSuccessfulSave();
			}
//	processing bank_id - end
//	processing channel_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_channel_id->afterSuccessfulSave();
			}
//	processing channel_id - end
//	processing bank_ip - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_bank_ip->afterSuccessfulSave();
			}
//	processing bank_ip - end

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
						$message .='&nbsp;<a href=\'public_pad_payment_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'public_pad_payment_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: public_pad_payment_".$pageObject->getPageType().".php");
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

if(@$_SESSION[$sessionPrefix."_mastertable"]=="pad.pad_sspd")
{
	if(postvalue("masterkey1"))
		$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");

	if(postvalue("mainMPageType")<>"add")
		$defvalues["id"] = @$_SESSION[$sessionPrefix."_masterkey1"];	
	
}

if($readavalues)
{
	$defvalues["id"]=@$avalues["id"];
	$defvalues["invoice_id"]=@$avalues["invoice_id"];
	$defvalues["tgl"]=@$avalues["tgl"];
	$defvalues["tagihan"]=@$avalues["tagihan"];
	$defvalues["denda"]=@$avalues["denda"];
	$defvalues["total_bayar"]=@$avalues["total_bayar"];
	$defvalues["iso_request"]=@$avalues["iso_request"];
	$defvalues["transmission"]=@$avalues["transmission"];
	$defvalues["settlement"]=@$avalues["settlement"];
	$defvalues["stan"]=@$avalues["stan"];
	$defvalues["ntb"]=@$avalues["ntb"];
	$defvalues["ntp"]=@$avalues["ntp"];
	$defvalues["bank_id"]=@$avalues["bank_id"];
	$defvalues["channel_id"]=@$avalues["channel_id"];
	$defvalues["bank_ip"]=@$avalues["bank_ip"];
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
	
	if(!$pageObject->isAppearOnTabs("id"))
		$xt->assign("id_fieldblock",true);
	else
		$xt->assign("id_tabfieldblock",true);
	$xt->assign("id_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_label","<label for=\"".GetInputElementId("id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("invoice_id"))
		$xt->assign("invoice_id_fieldblock",true);
	else
		$xt->assign("invoice_id_tabfieldblock",true);
	$xt->assign("invoice_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("invoice_id_label","<label for=\"".GetInputElementId("invoice_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tgl"))
		$xt->assign("tgl_fieldblock",true);
	else
		$xt->assign("tgl_tabfieldblock",true);
	$xt->assign("tgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("tgl_label","<label for=\"".GetInputElementId("tgl", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tagihan"))
		$xt->assign("tagihan_fieldblock",true);
	else
		$xt->assign("tagihan_tabfieldblock",true);
	$xt->assign("tagihan_label",true);
	if(isEnableSection508())
		$xt->assign_section("tagihan_label","<label for=\"".GetInputElementId("tagihan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("denda"))
		$xt->assign("denda_fieldblock",true);
	else
		$xt->assign("denda_tabfieldblock",true);
	$xt->assign("denda_label",true);
	if(isEnableSection508())
		$xt->assign_section("denda_label","<label for=\"".GetInputElementId("denda", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("total_bayar"))
		$xt->assign("total_bayar_fieldblock",true);
	else
		$xt->assign("total_bayar_tabfieldblock",true);
	$xt->assign("total_bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("total_bayar_label","<label for=\"".GetInputElementId("total_bayar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("iso_request"))
		$xt->assign("iso_request_fieldblock",true);
	else
		$xt->assign("iso_request_tabfieldblock",true);
	$xt->assign("iso_request_label",true);
	if(isEnableSection508())
		$xt->assign_section("iso_request_label","<label for=\"".GetInputElementId("iso_request", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("transmission"))
		$xt->assign("transmission_fieldblock",true);
	else
		$xt->assign("transmission_tabfieldblock",true);
	$xt->assign("transmission_label",true);
	if(isEnableSection508())
		$xt->assign_section("transmission_label","<label for=\"".GetInputElementId("transmission", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("settlement"))
		$xt->assign("settlement_fieldblock",true);
	else
		$xt->assign("settlement_tabfieldblock",true);
	$xt->assign("settlement_label",true);
	if(isEnableSection508())
		$xt->assign_section("settlement_label","<label for=\"".GetInputElementId("settlement", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("stan"))
		$xt->assign("stan_fieldblock",true);
	else
		$xt->assign("stan_tabfieldblock",true);
	$xt->assign("stan_label",true);
	if(isEnableSection508())
		$xt->assign_section("stan_label","<label for=\"".GetInputElementId("stan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ntb"))
		$xt->assign("ntb_fieldblock",true);
	else
		$xt->assign("ntb_tabfieldblock",true);
	$xt->assign("ntb_label",true);
	if(isEnableSection508())
		$xt->assign_section("ntb_label","<label for=\"".GetInputElementId("ntb", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ntp"))
		$xt->assign("ntp_fieldblock",true);
	else
		$xt->assign("ntp_tabfieldblock",true);
	$xt->assign("ntp_label",true);
	if(isEnableSection508())
		$xt->assign_section("ntp_label","<label for=\"".GetInputElementId("ntp", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("bank_id"))
		$xt->assign("bank_id_fieldblock",true);
	else
		$xt->assign("bank_id_tabfieldblock",true);
	$xt->assign("bank_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("bank_id_label","<label for=\"".GetInputElementId("bank_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("channel_id"))
		$xt->assign("channel_id_fieldblock",true);
	else
		$xt->assign("channel_id_tabfieldblock",true);
	$xt->assign("channel_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("channel_id_label","<label for=\"".GetInputElementId("channel_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("bank_ip"))
		$xt->assign("bank_ip_fieldblock",true);
	else
		$xt->assign("bank_ip_tabfieldblock",true);
	$xt->assign("bank_ip_label",true);
	if(isEnableSection508())
		$xt->assign_section("bank_ip_label","<label for=\"".GetInputElementId("bank_ip", $id, PAGE_ADD)."\">","</label>");
	
	
	
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
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("id", $data, $keylink);
		$showValues["id"] = $value;
		$showFields[] = "id";
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
//	tgl
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tgl", $data, $keylink);
		$showValues["tgl"] = $value;
		$showFields[] = "tgl";
	}	
//	tagihan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tagihan", $data, $keylink);
		$showValues["tagihan"] = $value;
		$showFields[] = "tagihan";
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
//	total_bayar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("total_bayar", $data, $keylink);
		$showValues["total_bayar"] = $value;
		$showFields[] = "total_bayar";
	}	
//	iso_request
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("iso_request", $data, $keylink);
		$showValues["iso_request"] = $value;
		$showFields[] = "iso_request";
	}	
//	transmission
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("transmission", $data, $keylink);
		$showValues["transmission"] = $value;
		$showFields[] = "transmission";
	}	
//	settlement
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("settlement", $data, $keylink);
		$showValues["settlement"] = $value;
		$showFields[] = "settlement";
	}	
//	stan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("stan", $data, $keylink);
		$showValues["stan"] = $value;
		$showFields[] = "stan";
	}	
//	ntb
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ntb", $data, $keylink);
		$showValues["ntb"] = $value;
		$showFields[] = "ntb";
	}	
//	ntp
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("ntp", $data, $keylink);
		$showValues["ntp"] = $value;
		$showFields[] = "ntp";
	}	
//	bank_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("bank_id", $data, $keylink);
		$showValues["bank_id"] = $value;
		$showFields[] = "bank_id";
	}	
//	channel_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("channel_id", $data, $keylink);
		$showValues["channel_id"] = $value;
		$showFields[] = "channel_id";
	}	
//	bank_ip
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("bank_ip", $data, $keylink);
		$showValues["bank_ip"] = $value;
		$showFields[] = "bank_ip";
	}	
		$showRawValues["id"] = substr($data["id"],0,100);
		$showRawValues["invoice_id"] = substr($data["invoice_id"],0,100);
		$showRawValues["tgl"] = substr($data["tgl"],0,100);
		$showRawValues["tagihan"] = substr($data["tagihan"],0,100);
		$showRawValues["denda"] = substr($data["denda"],0,100);
		$showRawValues["total_bayar"] = substr($data["total_bayar"],0,100);
		$showRawValues["iso_request"] = substr($data["iso_request"],0,100);
		$showRawValues["transmission"] = substr($data["transmission"],0,100);
		$showRawValues["settlement"] = substr($data["settlement"],0,100);
		$showRawValues["stan"] = substr($data["stan"],0,100);
		$showRawValues["ntb"] = substr($data["ntb"],0,100);
		$showRawValues["ntp"] = substr($data["ntp"],0,100);
		$showRawValues["bank_id"] = substr($data["bank_id"],0,100);
		$showRawValues["channel_id"] = substr($data["channel_id"],0,100);
		$showRawValues["bank_ip"] = substr($data["bank_ip"],0,100);
	
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
		$options['masterTable'] = "public.pad_payment";
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
	$strTableName = "public.pad_payment";
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
