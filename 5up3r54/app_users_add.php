<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/app_users_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["app_users_add"] = $layout;



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
	$templatefile = "app_users_inline_add.htm";
else
	$templatefile = "app_users_add.htm";

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
		header('Location: app_users_add.php');
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
//	processing userid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_userid = $pageObject->getControl("userid", $id);
		$control_userid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing userid - end
//	processing nama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_nama = $pageObject->getControl("nama", $id);
		$control_nama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing nama - end
//	processing created - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_created = $pageObject->getControl("created", $id);
		$control_created->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing created - end
//	processing disabled - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_disabled = $pageObject->getControl("disabled", $id);
		$control_disabled->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing disabled - end
//	processing passwd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_passwd = $pageObject->getControl("passwd", $id);
		$control_passwd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing passwd - end
//	processing kd_kantor - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_kantor = $pageObject->getControl("kd_kantor", $id);
		$control_kd_kantor->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_kantor - end
//	processing kd_kanwil - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_kanwil = $pageObject->getControl("kd_kanwil", $id);
		$control_kd_kanwil->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_kanwil - end
//	processing kd_tp - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_tp = $pageObject->getControl("kd_tp", $id);
		$control_kd_tp->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_tp - end
//	processing kd_kanwil_bank - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_kanwil_bank = $pageObject->getControl("kd_kanwil_bank", $id);
		$control_kd_kanwil_bank->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_kanwil_bank - end
//	processing kd_kppbb_bank - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_kppbb_bank = $pageObject->getControl("kd_kppbb_bank", $id);
		$control_kd_kppbb_bank->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_kppbb_bank - end
//	processing kd_bank_tunggal - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_bank_tunggal = $pageObject->getControl("kd_bank_tunggal", $id);
		$control_kd_bank_tunggal->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_bank_tunggal - end
//	processing kd_bank_persepsi - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_kd_bank_persepsi = $pageObject->getControl("kd_bank_persepsi", $id);
		$control_kd_bank_persepsi->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing kd_bank_persepsi - end
//	processing nip - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_nip = $pageObject->getControl("nip", $id);
		$control_nip->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing nip - end
//	processing jabatan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jabatan = $pageObject->getControl("jabatan", $id);
		$control_jabatan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jabatan - end
//	processing handphone - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_handphone = $pageObject->getControl("handphone", $id);
		$control_handphone->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing handphone - end
//	processing create_uid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_create_uid = $pageObject->getControl("create_uid", $id);
		$control_create_uid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing create_uid - end
//	processing update_uid - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_update_uid = $pageObject->getControl("update_uid", $id);
		$control_update_uid->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing update_uid - end
//	processing updated - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_updated = $pageObject->getControl("updated", $id);
		$control_updated->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing updated - end
//	processing last_login - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_last_login = $pageObject->getControl("last_login", $id);
		$control_last_login->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing last_login - end
//	processing is_login - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_is_login = $pageObject->getControl("is_login", $id);
		$control_is_login->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing is_login - end
//	processing is_logout - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_is_logout = $pageObject->getControl("is_logout", $id);
		$control_is_logout->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing is_logout - end
//	processing last_ip - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_last_ip = $pageObject->getControl("last_ip", $id);
		$control_last_ip->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing last_ip - end




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
//	processing userid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_userid->afterSuccessfulSave();
			}
//	processing userid - end
//	processing nama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_nama->afterSuccessfulSave();
			}
//	processing nama - end
//	processing created - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_created->afterSuccessfulSave();
			}
//	processing created - end
//	processing disabled - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_disabled->afterSuccessfulSave();
			}
//	processing disabled - end
//	processing passwd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_passwd->afterSuccessfulSave();
			}
//	processing passwd - end
//	processing kd_kantor - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_kantor->afterSuccessfulSave();
			}
//	processing kd_kantor - end
//	processing kd_kanwil - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_kanwil->afterSuccessfulSave();
			}
//	processing kd_kanwil - end
//	processing kd_tp - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_tp->afterSuccessfulSave();
			}
//	processing kd_tp - end
//	processing kd_kanwil_bank - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_kanwil_bank->afterSuccessfulSave();
			}
//	processing kd_kanwil_bank - end
//	processing kd_kppbb_bank - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_kppbb_bank->afterSuccessfulSave();
			}
//	processing kd_kppbb_bank - end
//	processing kd_bank_tunggal - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_bank_tunggal->afterSuccessfulSave();
			}
//	processing kd_bank_tunggal - end
//	processing kd_bank_persepsi - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_kd_bank_persepsi->afterSuccessfulSave();
			}
//	processing kd_bank_persepsi - end
//	processing nip - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_nip->afterSuccessfulSave();
			}
//	processing nip - end
//	processing jabatan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jabatan->afterSuccessfulSave();
			}
//	processing jabatan - end
//	processing handphone - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_handphone->afterSuccessfulSave();
			}
//	processing handphone - end
//	processing create_uid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_create_uid->afterSuccessfulSave();
			}
//	processing create_uid - end
//	processing update_uid - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_update_uid->afterSuccessfulSave();
			}
//	processing update_uid - end
//	processing updated - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_updated->afterSuccessfulSave();
			}
//	processing updated - end
//	processing last_login - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_last_login->afterSuccessfulSave();
			}
//	processing last_login - end
//	processing is_login - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_is_login->afterSuccessfulSave();
			}
//	processing is_login - end
//	processing is_logout - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_is_logout->afterSuccessfulSave();
			}
//	processing is_logout - end
//	processing last_ip - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_last_ip->afterSuccessfulSave();
			}
//	processing last_ip - end

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
						$message .='&nbsp;<a href=\'app_users_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'app_users_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: app_users_".$pageObject->getPageType().".php");
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
	$defvalues["userid"]=@$avalues["userid"];
	$defvalues["nama"]=@$avalues["nama"];
	$defvalues["created"]=@$avalues["created"];
	$defvalues["disabled"]=@$avalues["disabled"];
	$defvalues["passwd"]=@$avalues["passwd"];
	$defvalues["kd_kantor"]=@$avalues["kd_kantor"];
	$defvalues["kd_kanwil"]=@$avalues["kd_kanwil"];
	$defvalues["kd_tp"]=@$avalues["kd_tp"];
	$defvalues["kd_kanwil_bank"]=@$avalues["kd_kanwil_bank"];
	$defvalues["kd_kppbb_bank"]=@$avalues["kd_kppbb_bank"];
	$defvalues["kd_bank_tunggal"]=@$avalues["kd_bank_tunggal"];
	$defvalues["kd_bank_persepsi"]=@$avalues["kd_bank_persepsi"];
	$defvalues["nip"]=@$avalues["nip"];
	$defvalues["jabatan"]=@$avalues["jabatan"];
	$defvalues["handphone"]=@$avalues["handphone"];
	$defvalues["create_uid"]=@$avalues["create_uid"];
	$defvalues["update_uid"]=@$avalues["update_uid"];
	$defvalues["updated"]=@$avalues["updated"];
	$defvalues["last_login"]=@$avalues["last_login"];
	$defvalues["is_login"]=@$avalues["is_login"];
	$defvalues["is_logout"]=@$avalues["is_logout"];
	$defvalues["last_ip"]=@$avalues["last_ip"];
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
	
	if(!$pageObject->isAppearOnTabs("userid"))
		$xt->assign("userid_fieldblock",true);
	else
		$xt->assign("userid_tabfieldblock",true);
	$xt->assign("userid_label",true);
	if(isEnableSection508())
		$xt->assign_section("userid_label","<label for=\"".GetInputElementId("userid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("nama"))
		$xt->assign("nama_fieldblock",true);
	else
		$xt->assign("nama_tabfieldblock",true);
	$xt->assign("nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_label","<label for=\"".GetInputElementId("nama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
	$xt->assign("created_label",true);
	if(isEnableSection508())
		$xt->assign_section("created_label","<label for=\"".GetInputElementId("created", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("disabled"))
		$xt->assign("disabled_fieldblock",true);
	else
		$xt->assign("disabled_tabfieldblock",true);
	$xt->assign("disabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("disabled_label","<label for=\"".GetInputElementId("disabled", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("passwd"))
		$xt->assign("passwd_fieldblock",true);
	else
		$xt->assign("passwd_tabfieldblock",true);
	$xt->assign("passwd_label",true);
	if(isEnableSection508())
		$xt->assign_section("passwd_label","<label for=\"".GetInputElementId("passwd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_kantor"))
		$xt->assign("kd_kantor_fieldblock",true);
	else
		$xt->assign("kd_kantor_tabfieldblock",true);
	$xt->assign("kd_kantor_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_kantor_label","<label for=\"".GetInputElementId("kd_kantor", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_kanwil"))
		$xt->assign("kd_kanwil_fieldblock",true);
	else
		$xt->assign("kd_kanwil_tabfieldblock",true);
	$xt->assign("kd_kanwil_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_kanwil_label","<label for=\"".GetInputElementId("kd_kanwil", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_tp"))
		$xt->assign("kd_tp_fieldblock",true);
	else
		$xt->assign("kd_tp_tabfieldblock",true);
	$xt->assign("kd_tp_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_tp_label","<label for=\"".GetInputElementId("kd_tp", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_kanwil_bank"))
		$xt->assign("kd_kanwil_bank_fieldblock",true);
	else
		$xt->assign("kd_kanwil_bank_tabfieldblock",true);
	$xt->assign("kd_kanwil_bank_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_kanwil_bank_label","<label for=\"".GetInputElementId("kd_kanwil_bank", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_kppbb_bank"))
		$xt->assign("kd_kppbb_bank_fieldblock",true);
	else
		$xt->assign("kd_kppbb_bank_tabfieldblock",true);
	$xt->assign("kd_kppbb_bank_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_kppbb_bank_label","<label for=\"".GetInputElementId("kd_kppbb_bank", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_bank_tunggal"))
		$xt->assign("kd_bank_tunggal_fieldblock",true);
	else
		$xt->assign("kd_bank_tunggal_tabfieldblock",true);
	$xt->assign("kd_bank_tunggal_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bank_tunggal_label","<label for=\"".GetInputElementId("kd_bank_tunggal", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("kd_bank_persepsi"))
		$xt->assign("kd_bank_persepsi_fieldblock",true);
	else
		$xt->assign("kd_bank_persepsi_tabfieldblock",true);
	$xt->assign("kd_bank_persepsi_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bank_persepsi_label","<label for=\"".GetInputElementId("kd_bank_persepsi", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("nip"))
		$xt->assign("nip_fieldblock",true);
	else
		$xt->assign("nip_tabfieldblock",true);
	$xt->assign("nip_label",true);
	if(isEnableSection508())
		$xt->assign_section("nip_label","<label for=\"".GetInputElementId("nip", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("jabatan"))
		$xt->assign("jabatan_fieldblock",true);
	else
		$xt->assign("jabatan_tabfieldblock",true);
	$xt->assign("jabatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("jabatan_label","<label for=\"".GetInputElementId("jabatan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("handphone"))
		$xt->assign("handphone_fieldblock",true);
	else
		$xt->assign("handphone_tabfieldblock",true);
	$xt->assign("handphone_label",true);
	if(isEnableSection508())
		$xt->assign_section("handphone_label","<label for=\"".GetInputElementId("handphone", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
	$xt->assign("create_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_uid_label","<label for=\"".GetInputElementId("create_uid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("update_uid"))
		$xt->assign("update_uid_fieldblock",true);
	else
		$xt->assign("update_uid_tabfieldblock",true);
	$xt->assign("update_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("update_uid_label","<label for=\"".GetInputElementId("update_uid", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("updated"))
		$xt->assign("updated_fieldblock",true);
	else
		$xt->assign("updated_tabfieldblock",true);
	$xt->assign("updated_label",true);
	if(isEnableSection508())
		$xt->assign_section("updated_label","<label for=\"".GetInputElementId("updated", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("last_login"))
		$xt->assign("last_login_fieldblock",true);
	else
		$xt->assign("last_login_tabfieldblock",true);
	$xt->assign("last_login_label",true);
	if(isEnableSection508())
		$xt->assign_section("last_login_label","<label for=\"".GetInputElementId("last_login", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("is_login"))
		$xt->assign("is_login_fieldblock",true);
	else
		$xt->assign("is_login_tabfieldblock",true);
	$xt->assign("is_login_label",true);
	if(isEnableSection508())
		$xt->assign_section("is_login_label","<label for=\"".GetInputElementId("is_login", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("is_logout"))
		$xt->assign("is_logout_fieldblock",true);
	else
		$xt->assign("is_logout_tabfieldblock",true);
	$xt->assign("is_logout_label",true);
	if(isEnableSection508())
		$xt->assign_section("is_logout_label","<label for=\"".GetInputElementId("is_logout", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("last_ip"))
		$xt->assign("last_ip_fieldblock",true);
	else
		$xt->assign("last_ip_tabfieldblock",true);
	$xt->assign("last_ip_label",true);
	if(isEnableSection508())
		$xt->assign_section("last_ip_label","<label for=\"".GetInputElementId("last_ip", $id, PAGE_ADD)."\">","</label>");
	
	
	
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
	$showDetailKeys["app.user_groups"]["masterkey1"] = $data["id"];	

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));
	
////////////////////////////////////////////
//	userid
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("userid", $data, $keylink);
		$showValues["userid"] = $value;
		$showFields[] = "userid";
	}	
//	nama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("nama", $data, $keylink);
		$showValues["nama"] = $value;
		$showFields[] = "nama";
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
//	disabled
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("disabled", $data, $keylink);
		$showValues["disabled"] = $value;
		$showFields[] = "disabled";
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
//	kd_kantor
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_kantor", $data, $keylink);
		$showValues["kd_kantor"] = $value;
		$showFields[] = "kd_kantor";
	}	
//	kd_kanwil
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_kanwil", $data, $keylink);
		$showValues["kd_kanwil"] = $value;
		$showFields[] = "kd_kanwil";
	}	
//	kd_tp
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_tp", $data, $keylink);
		$showValues["kd_tp"] = $value;
		$showFields[] = "kd_tp";
	}	
//	kd_kanwil_bank
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_kanwil_bank", $data, $keylink);
		$showValues["kd_kanwil_bank"] = $value;
		$showFields[] = "kd_kanwil_bank";
	}	
//	kd_kppbb_bank
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_kppbb_bank", $data, $keylink);
		$showValues["kd_kppbb_bank"] = $value;
		$showFields[] = "kd_kppbb_bank";
	}	
//	kd_bank_tunggal
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_bank_tunggal", $data, $keylink);
		$showValues["kd_bank_tunggal"] = $value;
		$showFields[] = "kd_bank_tunggal";
	}	
//	kd_bank_persepsi
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("kd_bank_persepsi", $data, $keylink);
		$showValues["kd_bank_persepsi"] = $value;
		$showFields[] = "kd_bank_persepsi";
	}	
//	nip
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("nip", $data, $keylink);
		$showValues["nip"] = $value;
		$showFields[] = "nip";
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
//	handphone
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("handphone", $data, $keylink);
		$showValues["handphone"] = $value;
		$showFields[] = "handphone";
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
//	last_login
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("last_login", $data, $keylink);
		$showValues["last_login"] = $value;
		$showFields[] = "last_login";
	}	
//	is_login
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("is_login", $data, $keylink);
		$showValues["is_login"] = $value;
		$showFields[] = "is_login";
	}	
//	is_logout
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("is_logout", $data, $keylink);
		$showValues["is_logout"] = $value;
		$showFields[] = "is_logout";
	}	
//	last_ip
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("last_ip", $data, $keylink);
		$showValues["last_ip"] = $value;
		$showFields[] = "last_ip";
	}	
		$showRawValues["userid"] = substr($data["userid"],0,100);
		$showRawValues["nama"] = substr($data["nama"],0,100);
		$showRawValues["created"] = substr($data["created"],0,100);
		$showRawValues["disabled"] = substr($data["disabled"],0,100);
		$showRawValues["passwd"] = substr($data["passwd"],0,100);
		$showRawValues["id"] = substr($data["id"],0,100);
		$showRawValues["kd_kantor"] = substr($data["kd_kantor"],0,100);
		$showRawValues["kd_kanwil"] = substr($data["kd_kanwil"],0,100);
		$showRawValues["kd_tp"] = substr($data["kd_tp"],0,100);
		$showRawValues["kd_kanwil_bank"] = substr($data["kd_kanwil_bank"],0,100);
		$showRawValues["kd_kppbb_bank"] = substr($data["kd_kppbb_bank"],0,100);
		$showRawValues["kd_bank_tunggal"] = substr($data["kd_bank_tunggal"],0,100);
		$showRawValues["kd_bank_persepsi"] = substr($data["kd_bank_persepsi"],0,100);
		$showRawValues["nip"] = substr($data["nip"],0,100);
		$showRawValues["jabatan"] = substr($data["jabatan"],0,100);
		$showRawValues["handphone"] = substr($data["handphone"],0,100);
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);
		$showRawValues["update_uid"] = substr($data["update_uid"],0,100);
		$showRawValues["updated"] = substr($data["updated"],0,100);
		$showRawValues["last_login"] = substr($data["last_login"],0,100);
		$showRawValues["is_login"] = substr($data["is_login"],0,100);
		$showRawValues["is_logout"] = substr($data["is_logout"],0,100);
		$showRawValues["last_ip"] = substr($data["last_ip"],0,100);
	
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
		$options['masterTable'] = "app.users";
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
	$strTableName = "app.users";
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
