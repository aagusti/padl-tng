<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/app_users_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["app_users_edit"] = $layout;




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

$templatefile = ($inlineedit == EDIT_INLINE) ? "app_users_inline_edit.htm" : "app_users_edit.htm";

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
	

//	processing userid - begin
	$condition = 1;

	if($condition)
	{
		$control_userid = $pageObject->getControl("userid", $id);
		$control_userid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing userid - end
//	processing nama - begin
	$condition = 1;

	if($condition)
	{
		$control_nama = $pageObject->getControl("nama", $id);
		$control_nama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing nama - end
//	processing created - begin
	$condition = 1;

	if($condition)
	{
		$control_created = $pageObject->getControl("created", $id);
		$control_created->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing created - end
//	processing disabled - begin
	$condition = 1;

	if($condition)
	{
		$control_disabled = $pageObject->getControl("disabled", $id);
		$control_disabled->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing disabled - end
//	processing passwd - begin
	$condition = 1;

	if($condition)
	{
		$control_passwd = $pageObject->getControl("passwd", $id);
		$control_passwd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing passwd - end
//	processing kd_kantor - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_kantor = $pageObject->getControl("kd_kantor", $id);
		$control_kd_kantor->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_kantor - end
//	processing kd_kanwil - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_kanwil = $pageObject->getControl("kd_kanwil", $id);
		$control_kd_kanwil->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_kanwil - end
//	processing kd_tp - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_tp = $pageObject->getControl("kd_tp", $id);
		$control_kd_tp->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_tp - end
//	processing kd_kanwil_bank - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_kanwil_bank = $pageObject->getControl("kd_kanwil_bank", $id);
		$control_kd_kanwil_bank->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_kanwil_bank - end
//	processing kd_kppbb_bank - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_kppbb_bank = $pageObject->getControl("kd_kppbb_bank", $id);
		$control_kd_kppbb_bank->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_kppbb_bank - end
//	processing kd_bank_tunggal - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_bank_tunggal = $pageObject->getControl("kd_bank_tunggal", $id);
		$control_kd_bank_tunggal->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_bank_tunggal - end
//	processing kd_bank_persepsi - begin
	$condition = 1;

	if($condition)
	{
		$control_kd_bank_persepsi = $pageObject->getControl("kd_bank_persepsi", $id);
		$control_kd_bank_persepsi->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kd_bank_persepsi - end
//	processing nip - begin
	$condition = 1;

	if($condition)
	{
		$control_nip = $pageObject->getControl("nip", $id);
		$control_nip->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing nip - end
//	processing jabatan - begin
	$condition = 1;

	if($condition)
	{
		$control_jabatan = $pageObject->getControl("jabatan", $id);
		$control_jabatan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jabatan - end
//	processing handphone - begin
	$condition = 1;

	if($condition)
	{
		$control_handphone = $pageObject->getControl("handphone", $id);
		$control_handphone->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing handphone - end
//	processing create_uid - begin
	$condition = 1;

	if($condition)
	{
		$control_create_uid = $pageObject->getControl("create_uid", $id);
		$control_create_uid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing create_uid - end
//	processing update_uid - begin
	$condition = 1;

	if($condition)
	{
		$control_update_uid = $pageObject->getControl("update_uid", $id);
		$control_update_uid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing update_uid - end
//	processing updated - begin
	$condition = 1;

	if($condition)
	{
		$control_updated = $pageObject->getControl("updated", $id);
		$control_updated->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing updated - end
//	processing last_login - begin
	$condition = 1;

	if($condition)
	{
		$control_last_login = $pageObject->getControl("last_login", $id);
		$control_last_login->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing last_login - end
//	processing is_login - begin
	$condition = 1;

	if($condition)
	{
		$control_is_login = $pageObject->getControl("is_login", $id);
		$control_is_login->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing is_login - end
//	processing is_logout - begin
	$condition = 1;

	if($condition)
	{
		$control_is_logout = $pageObject->getControl("is_logout", $id);
		$control_is_logout->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing is_logout - end
//	processing last_ip - begin
	$condition = 1;

	if($condition)
	{
		$control_last_ip = $pageObject->getControl("last_ip", $id);
		$control_last_ip->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing last_ip - end

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
			//	processing userid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_userid->afterSuccessfulSave();
				}
	//	processing userid - end
			//	processing nama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_nama->afterSuccessfulSave();
				}
	//	processing nama - end
			//	processing created - begin
							$condition = 1;
			
				if($condition)
				{
					$control_created->afterSuccessfulSave();
				}
	//	processing created - end
			//	processing disabled - begin
							$condition = 1;
			
				if($condition)
				{
					$control_disabled->afterSuccessfulSave();
				}
	//	processing disabled - end
			//	processing passwd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_passwd->afterSuccessfulSave();
				}
	//	processing passwd - end
			//	processing kd_kantor - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_kantor->afterSuccessfulSave();
				}
	//	processing kd_kantor - end
			//	processing kd_kanwil - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_kanwil->afterSuccessfulSave();
				}
	//	processing kd_kanwil - end
			//	processing kd_tp - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_tp->afterSuccessfulSave();
				}
	//	processing kd_tp - end
			//	processing kd_kanwil_bank - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_kanwil_bank->afterSuccessfulSave();
				}
	//	processing kd_kanwil_bank - end
			//	processing kd_kppbb_bank - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_kppbb_bank->afterSuccessfulSave();
				}
	//	processing kd_kppbb_bank - end
			//	processing kd_bank_tunggal - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_bank_tunggal->afterSuccessfulSave();
				}
	//	processing kd_bank_tunggal - end
			//	processing kd_bank_persepsi - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kd_bank_persepsi->afterSuccessfulSave();
				}
	//	processing kd_bank_persepsi - end
			//	processing nip - begin
							$condition = 1;
			
				if($condition)
				{
					$control_nip->afterSuccessfulSave();
				}
	//	processing nip - end
			//	processing jabatan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jabatan->afterSuccessfulSave();
				}
	//	processing jabatan - end
			//	processing handphone - begin
							$condition = 1;
			
				if($condition)
				{
					$control_handphone->afterSuccessfulSave();
				}
	//	processing handphone - end
			//	processing create_uid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_create_uid->afterSuccessfulSave();
				}
	//	processing create_uid - end
			//	processing update_uid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_update_uid->afterSuccessfulSave();
				}
	//	processing update_uid - end
			//	processing updated - begin
							$condition = 1;
			
				if($condition)
				{
					$control_updated->afterSuccessfulSave();
				}
	//	processing updated - end
			//	processing last_login - begin
							$condition = 1;
			
				if($condition)
				{
					$control_last_login->afterSuccessfulSave();
				}
	//	processing last_login - end
			//	processing is_login - begin
							$condition = 1;
			
				if($condition)
				{
					$control_is_login->afterSuccessfulSave();
				}
	//	processing is_login - end
			//	processing is_logout - begin
							$condition = 1;
			
				if($condition)
				{
					$control_is_logout->afterSuccessfulSave();
				}
	//	processing is_logout - end
			//	processing last_ip - begin
							$condition = 1;
			
				if($condition)
				{
					$control_last_ip->afterSuccessfulSave();
				}
	//	processing last_ip - end
				
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
	header("Location: app_users_".$pageObject->getPageType().".php?".$keyGetQ);
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
		header("Location: app_users_list.php?a=return");
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
	$data["userid"] = $evalues["userid"];
	$data["nama"] = $evalues["nama"];
	$data["created"] = $evalues["created"];
	$data["disabled"] = $evalues["disabled"];
	$data["passwd"] = $evalues["passwd"];
	$data["kd_kantor"] = $evalues["kd_kantor"];
	$data["kd_kanwil"] = $evalues["kd_kanwil"];
	$data["kd_tp"] = $evalues["kd_tp"];
	$data["kd_kanwil_bank"] = $evalues["kd_kanwil_bank"];
	$data["kd_kppbb_bank"] = $evalues["kd_kppbb_bank"];
	$data["kd_bank_tunggal"] = $evalues["kd_bank_tunggal"];
	$data["kd_bank_persepsi"] = $evalues["kd_bank_persepsi"];
	$data["nip"] = $evalues["nip"];
	$data["jabatan"] = $evalues["jabatan"];
	$data["handphone"] = $evalues["handphone"];
	$data["create_uid"] = $evalues["create_uid"];
	$data["update_uid"] = $evalues["update_uid"];
	$data["updated"] = $evalues["updated"];
	$data["last_login"] = $evalues["last_login"];
	$data["is_login"] = $evalues["is_login"];
	$data["is_logout"] = $evalues["is_logout"];
	$data["last_ip"] = $evalues["last_ip"];
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

	if(!$pageObject->isAppearOnTabs("userid"))
		$xt->assign("userid_fieldblock",true);
	else
		$xt->assign("userid_tabfieldblock",true);
	$xt->assign("userid_label",true);
	if(isEnableSection508())
		$xt->assign_section("userid_label","<label for=\"".GetInputElementId("userid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("nama"))
		$xt->assign("nama_fieldblock",true);
	else
		$xt->assign("nama_tabfieldblock",true);
	$xt->assign("nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_label","<label for=\"".GetInputElementId("nama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
	$xt->assign("created_label",true);
	if(isEnableSection508())
		$xt->assign_section("created_label","<label for=\"".GetInputElementId("created", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("disabled"))
		$xt->assign("disabled_fieldblock",true);
	else
		$xt->assign("disabled_tabfieldblock",true);
	$xt->assign("disabled_label",true);
	if(isEnableSection508())
		$xt->assign_section("disabled_label","<label for=\"".GetInputElementId("disabled", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("passwd"))
		$xt->assign("passwd_fieldblock",true);
	else
		$xt->assign("passwd_tabfieldblock",true);
	$xt->assign("passwd_label",true);
	if(isEnableSection508())
		$xt->assign_section("passwd_label","<label for=\"".GetInputElementId("passwd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_kantor"))
		$xt->assign("kd_kantor_fieldblock",true);
	else
		$xt->assign("kd_kantor_tabfieldblock",true);
	$xt->assign("kd_kantor_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_kantor_label","<label for=\"".GetInputElementId("kd_kantor", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_kanwil"))
		$xt->assign("kd_kanwil_fieldblock",true);
	else
		$xt->assign("kd_kanwil_tabfieldblock",true);
	$xt->assign("kd_kanwil_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_kanwil_label","<label for=\"".GetInputElementId("kd_kanwil", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_tp"))
		$xt->assign("kd_tp_fieldblock",true);
	else
		$xt->assign("kd_tp_tabfieldblock",true);
	$xt->assign("kd_tp_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_tp_label","<label for=\"".GetInputElementId("kd_tp", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_kanwil_bank"))
		$xt->assign("kd_kanwil_bank_fieldblock",true);
	else
		$xt->assign("kd_kanwil_bank_tabfieldblock",true);
	$xt->assign("kd_kanwil_bank_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_kanwil_bank_label","<label for=\"".GetInputElementId("kd_kanwil_bank", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_kppbb_bank"))
		$xt->assign("kd_kppbb_bank_fieldblock",true);
	else
		$xt->assign("kd_kppbb_bank_tabfieldblock",true);
	$xt->assign("kd_kppbb_bank_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_kppbb_bank_label","<label for=\"".GetInputElementId("kd_kppbb_bank", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_bank_tunggal"))
		$xt->assign("kd_bank_tunggal_fieldblock",true);
	else
		$xt->assign("kd_bank_tunggal_tabfieldblock",true);
	$xt->assign("kd_bank_tunggal_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bank_tunggal_label","<label for=\"".GetInputElementId("kd_bank_tunggal", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kd_bank_persepsi"))
		$xt->assign("kd_bank_persepsi_fieldblock",true);
	else
		$xt->assign("kd_bank_persepsi_tabfieldblock",true);
	$xt->assign("kd_bank_persepsi_label",true);
	if(isEnableSection508())
		$xt->assign_section("kd_bank_persepsi_label","<label for=\"".GetInputElementId("kd_bank_persepsi", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("nip"))
		$xt->assign("nip_fieldblock",true);
	else
		$xt->assign("nip_tabfieldblock",true);
	$xt->assign("nip_label",true);
	if(isEnableSection508())
		$xt->assign_section("nip_label","<label for=\"".GetInputElementId("nip", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jabatan"))
		$xt->assign("jabatan_fieldblock",true);
	else
		$xt->assign("jabatan_tabfieldblock",true);
	$xt->assign("jabatan_label",true);
	if(isEnableSection508())
		$xt->assign_section("jabatan_label","<label for=\"".GetInputElementId("jabatan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("handphone"))
		$xt->assign("handphone_fieldblock",true);
	else
		$xt->assign("handphone_tabfieldblock",true);
	$xt->assign("handphone_label",true);
	if(isEnableSection508())
		$xt->assign_section("handphone_label","<label for=\"".GetInputElementId("handphone", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
	$xt->assign("create_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("create_uid_label","<label for=\"".GetInputElementId("create_uid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("update_uid"))
		$xt->assign("update_uid_fieldblock",true);
	else
		$xt->assign("update_uid_tabfieldblock",true);
	$xt->assign("update_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("update_uid_label","<label for=\"".GetInputElementId("update_uid", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("updated"))
		$xt->assign("updated_fieldblock",true);
	else
		$xt->assign("updated_tabfieldblock",true);
	$xt->assign("updated_label",true);
	if(isEnableSection508())
		$xt->assign_section("updated_label","<label for=\"".GetInputElementId("updated", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("last_login"))
		$xt->assign("last_login_fieldblock",true);
	else
		$xt->assign("last_login_tabfieldblock",true);
	$xt->assign("last_login_label",true);
	if(isEnableSection508())
		$xt->assign_section("last_login_label","<label for=\"".GetInputElementId("last_login", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("is_login"))
		$xt->assign("is_login_fieldblock",true);
	else
		$xt->assign("is_login_tabfieldblock",true);
	$xt->assign("is_login_label",true);
	if(isEnableSection508())
		$xt->assign_section("is_login_label","<label for=\"".GetInputElementId("is_login", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("is_logout"))
		$xt->assign("is_logout_fieldblock",true);
	else
		$xt->assign("is_logout_tabfieldblock",true);
	$xt->assign("is_logout_label",true);
	if(isEnableSection508())
		$xt->assign_section("is_logout_label","<label for=\"".GetInputElementId("is_logout", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("last_ip"))
		$xt->assign("last_ip_fieldblock",true);
	else
		$xt->assign("last_ip_tabfieldblock",true);
	$xt->assign("last_ip_label",true);
	if(isEnableSection508())
		$xt->assign_section("last_ip_label","<label for=\"".GetInputElementId("last_ip", $id, PAGE_EDIT)."\">","</label>");
		

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
	$showDetailKeys["app.user_groups"]["masterkey1"] = $data["id"];		

	$keylink = "";
	$keylink.= "&key1=".htmlspecialchars(rawurlencode(@$data["id"]));


//	userid - 
	$value = $pageObject->showDBValue("userid", $data, $keylink);
	$showValues["userid"] = $value;
	$showFields[] = "userid";
		$showRawValues["userid"] = substr($data["userid"],0,100);

//	nama - 
	$value = $pageObject->showDBValue("nama", $data, $keylink);
	$showValues["nama"] = $value;
	$showFields[] = "nama";
		$showRawValues["nama"] = substr($data["nama"],0,100);

//	created - Short Date
	$value = $pageObject->showDBValue("created", $data, $keylink);
	$showValues["created"] = $value;
	$showFields[] = "created";
		$showRawValues["created"] = substr($data["created"],0,100);

//	disabled - 
	$value = $pageObject->showDBValue("disabled", $data, $keylink);
	$showValues["disabled"] = $value;
	$showFields[] = "disabled";
		$showRawValues["disabled"] = substr($data["disabled"],0,100);

//	passwd - 
	$value = $pageObject->showDBValue("passwd", $data, $keylink);
	$showValues["passwd"] = $value;
	$showFields[] = "passwd";
		$showRawValues["passwd"] = substr($data["passwd"],0,100);

//	id - 
	$value = $pageObject->showDBValue("id", $data, $keylink);
	$showValues["id"] = $value;
	$showFields[] = "id";
		$showRawValues["id"] = substr($data["id"],0,100);

//	kd_kantor - 
	$value = $pageObject->showDBValue("kd_kantor", $data, $keylink);
	$showValues["kd_kantor"] = $value;
	$showFields[] = "kd_kantor";
		$showRawValues["kd_kantor"] = substr($data["kd_kantor"],0,100);

//	kd_kanwil - 
	$value = $pageObject->showDBValue("kd_kanwil", $data, $keylink);
	$showValues["kd_kanwil"] = $value;
	$showFields[] = "kd_kanwil";
		$showRawValues["kd_kanwil"] = substr($data["kd_kanwil"],0,100);

//	kd_tp - 
	$value = $pageObject->showDBValue("kd_tp", $data, $keylink);
	$showValues["kd_tp"] = $value;
	$showFields[] = "kd_tp";
		$showRawValues["kd_tp"] = substr($data["kd_tp"],0,100);

//	kd_kanwil_bank - 
	$value = $pageObject->showDBValue("kd_kanwil_bank", $data, $keylink);
	$showValues["kd_kanwil_bank"] = $value;
	$showFields[] = "kd_kanwil_bank";
		$showRawValues["kd_kanwil_bank"] = substr($data["kd_kanwil_bank"],0,100);

//	kd_kppbb_bank - 
	$value = $pageObject->showDBValue("kd_kppbb_bank", $data, $keylink);
	$showValues["kd_kppbb_bank"] = $value;
	$showFields[] = "kd_kppbb_bank";
		$showRawValues["kd_kppbb_bank"] = substr($data["kd_kppbb_bank"],0,100);

//	kd_bank_tunggal - 
	$value = $pageObject->showDBValue("kd_bank_tunggal", $data, $keylink);
	$showValues["kd_bank_tunggal"] = $value;
	$showFields[] = "kd_bank_tunggal";
		$showRawValues["kd_bank_tunggal"] = substr($data["kd_bank_tunggal"],0,100);

//	kd_bank_persepsi - 
	$value = $pageObject->showDBValue("kd_bank_persepsi", $data, $keylink);
	$showValues["kd_bank_persepsi"] = $value;
	$showFields[] = "kd_bank_persepsi";
		$showRawValues["kd_bank_persepsi"] = substr($data["kd_bank_persepsi"],0,100);

//	nip - 
	$value = $pageObject->showDBValue("nip", $data, $keylink);
	$showValues["nip"] = $value;
	$showFields[] = "nip";
		$showRawValues["nip"] = substr($data["nip"],0,100);

//	jabatan - 
	$value = $pageObject->showDBValue("jabatan", $data, $keylink);
	$showValues["jabatan"] = $value;
	$showFields[] = "jabatan";
		$showRawValues["jabatan"] = substr($data["jabatan"],0,100);

//	handphone - 
	$value = $pageObject->showDBValue("handphone", $data, $keylink);
	$showValues["handphone"] = $value;
	$showFields[] = "handphone";
		$showRawValues["handphone"] = substr($data["handphone"],0,100);

//	create_uid - 
	$value = $pageObject->showDBValue("create_uid", $data, $keylink);
	$showValues["create_uid"] = $value;
	$showFields[] = "create_uid";
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);

//	update_uid - 
	$value = $pageObject->showDBValue("update_uid", $data, $keylink);
	$showValues["update_uid"] = $value;
	$showFields[] = "update_uid";
		$showRawValues["update_uid"] = substr($data["update_uid"],0,100);

//	updated - Short Date
	$value = $pageObject->showDBValue("updated", $data, $keylink);
	$showValues["updated"] = $value;
	$showFields[] = "updated";
		$showRawValues["updated"] = substr($data["updated"],0,100);

//	last_login - Short Date
	$value = $pageObject->showDBValue("last_login", $data, $keylink);
	$showValues["last_login"] = $value;
	$showFields[] = "last_login";
		$showRawValues["last_login"] = substr($data["last_login"],0,100);

//	is_login - 
	$value = $pageObject->showDBValue("is_login", $data, $keylink);
	$showValues["is_login"] = $value;
	$showFields[] = "is_login";
		$showRawValues["is_login"] = substr($data["is_login"],0,100);

//	is_logout - 
	$value = $pageObject->showDBValue("is_logout", $data, $keylink);
	$showValues["is_logout"] = $value;
	$showFields[] = "is_logout";
		$showRawValues["is_logout"] = substr($data["is_logout"],0,100);

//	last_ip - 
	$value = $pageObject->showDBValue("last_ip", $data, $keylink);
	$showValues["last_ip"] = $value;
	$showFields[] = "last_ip";
		$showRawValues["last_ip"] = substr($data["last_ip"],0,100);
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
		$options['masterTable'] = "app.users";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "app.users";
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
	$strTableName = "app.users";
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
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='app_users_view.php?".$viewlink."'\"");
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
