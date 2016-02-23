<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_sspd_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_sspd_edit"] = $layout;




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

$templatefile = ($inlineedit == EDIT_INLINE) ? "pad_pad_sspd_inline_edit.htm" : "pad_pad_sspd_edit.htm";

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
//	processing sspdno - begin
	$condition = 1;

	if($condition)
	{
		$control_sspdno = $pageObject->getControl("sspdno", $id);
		$control_sspdno->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing sspdno - end
//	processing sspdtgl - begin
	$condition = 1;

	if($condition)
	{
		$control_sspdtgl = $pageObject->getControl("sspdtgl", $id);
		$control_sspdtgl->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing sspdtgl - end
//	processing sspdjam - begin
	$condition = 1;

	if($condition)
	{
		$control_sspdjam = $pageObject->getControl("sspdjam", $id);
		$control_sspdjam->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing sspdjam - end
//	processing invoice_id - begin
	$condition = 1;

	if($condition)
	{
		$control_invoice_id = $pageObject->getControl("invoice_id", $id);
		$control_invoice_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing invoice_id - end
//	processing keterangan - begin
	$condition = 1;

	if($condition)
	{
		$control_keterangan = $pageObject->getControl("keterangan", $id);
		$control_keterangan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing keterangan - end
//	processing bulan_telat - begin
	$condition = 1;

	if($condition)
	{
		$control_bulan_telat = $pageObject->getControl("bulan_telat", $id);
		$control_bulan_telat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing bulan_telat - end
//	processing hitung_bunga - begin
	$condition = 1;

	if($condition)
	{
		$control_hitung_bunga = $pageObject->getControl("hitung_bunga", $id);
		$control_hitung_bunga->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing hitung_bunga - end
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
//	processing jml_bayar - begin
	$condition = 1;

	if($condition)
	{
		$control_jml_bayar = $pageObject->getControl("jml_bayar", $id);
		$control_jml_bayar->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jml_bayar - end
//	processing sisa - begin
	$condition = 1;

	if($condition)
	{
		$control_sisa = $pageObject->getControl("sisa", $id);
		$control_sisa->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing sisa - end
//	processing jenis_bayar - begin
	$condition = 1;

	if($condition)
	{
		$control_jenis_bayar = $pageObject->getControl("jenis_bayar", $id);
		$control_jenis_bayar->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jenis_bayar - end
//	processing printed - begin
	$condition = 1;

	if($condition)
	{
		$control_printed = $pageObject->getControl("printed", $id);
		$control_printed->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing printed - end
//	processing tp_id - begin
	$condition = 1;

	if($condition)
	{
		$control_tp_id = $pageObject->getControl("tp_id", $id);
		$control_tp_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tp_id - end
//	processing is_validated - begin
	$condition = 1;

	if($condition)
	{
		$control_is_validated = $pageObject->getControl("is_validated", $id);
		$control_is_validated->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing is_validated - end
//	processing is_valid - begin
	$condition = 1;

	if($condition)
	{
		$control_is_valid = $pageObject->getControl("is_valid", $id);
		$control_is_valid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing is_valid - end
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
//	processing petugas_id - begin
	$condition = 1;

	if($condition)
	{
		$control_petugas_id = $pageObject->getControl("petugas_id", $id);
		$control_petugas_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing petugas_id - end
//	processing pejabat_id - begin
	$condition = 1;

	if($condition)
	{
		$control_pejabat_id = $pageObject->getControl("pejabat_id", $id);
		$control_pejabat_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pejabat_id - end

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
			//	processing sspdno - begin
							$condition = 1;
			
				if($condition)
				{
					$control_sspdno->afterSuccessfulSave();
				}
	//	processing sspdno - end
			//	processing sspdtgl - begin
							$condition = 1;
			
				if($condition)
				{
					$control_sspdtgl->afterSuccessfulSave();
				}
	//	processing sspdtgl - end
			//	processing sspdjam - begin
							$condition = 1;
			
				if($condition)
				{
					$control_sspdjam->afterSuccessfulSave();
				}
	//	processing sspdjam - end
			//	processing invoice_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_invoice_id->afterSuccessfulSave();
				}
	//	processing invoice_id - end
			//	processing keterangan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_keterangan->afterSuccessfulSave();
				}
	//	processing keterangan - end
			//	processing bulan_telat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_bulan_telat->afterSuccessfulSave();
				}
	//	processing bulan_telat - end
			//	processing hitung_bunga - begin
							$condition = 1;
			
				if($condition)
				{
					$control_hitung_bunga->afterSuccessfulSave();
				}
	//	processing hitung_bunga - end
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
			//	processing jml_bayar - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jml_bayar->afterSuccessfulSave();
				}
	//	processing jml_bayar - end
			//	processing sisa - begin
							$condition = 1;
			
				if($condition)
				{
					$control_sisa->afterSuccessfulSave();
				}
	//	processing sisa - end
			//	processing jenis_bayar - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jenis_bayar->afterSuccessfulSave();
				}
	//	processing jenis_bayar - end
			//	processing printed - begin
							$condition = 1;
			
				if($condition)
				{
					$control_printed->afterSuccessfulSave();
				}
	//	processing printed - end
			//	processing tp_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tp_id->afterSuccessfulSave();
				}
	//	processing tp_id - end
			//	processing is_validated - begin
							$condition = 1;
			
				if($condition)
				{
					$control_is_validated->afterSuccessfulSave();
				}
	//	processing is_validated - end
			//	processing is_valid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_is_valid->afterSuccessfulSave();
				}
	//	processing is_valid - end
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
			//	processing petugas_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_petugas_id->afterSuccessfulSave();
				}
	//	processing petugas_id - end
			//	processing pejabat_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pejabat_id->afterSuccessfulSave();
				}
	//	processing pejabat_id - end
				
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
	header("Location: pad_pad_sspd_".$pageObject->getPageType().".php?".$keyGetQ);
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
		header("Location: pad_pad_sspd_list.php?a=return");
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
	$data["sspdno"] = $evalues["sspdno"];
	$data["sspdtgl"] = $evalues["sspdtgl"];
	$data["sspdjam"] = $evalues["sspdjam"];
	$data["invoice_id"] = $evalues["invoice_id"];
	$data["keterangan"] = $evalues["keterangan"];
	$data["bulan_telat"] = $evalues["bulan_telat"];
	$data["hitung_bunga"] = $evalues["hitung_bunga"];
	$data["denda"] = $evalues["denda"];
	$data["bunga"] = $evalues["bunga"];
	$data["jml_bayar"] = $evalues["jml_bayar"];
	$data["sisa"] = $evalues["sisa"];
	$data["jenis_bayar"] = $evalues["jenis_bayar"];
	$data["printed"] = $evalues["printed"];
	$data["tp_id"] = $evalues["tp_id"];
	$data["is_validated"] = $evalues["is_validated"];
	$data["is_valid"] = $evalues["is_valid"];
	$data["enabled"] = $evalues["enabled"];
	$data["created"] = $evalues["created"];
	$data["create_uid"] = $evalues["create_uid"];
	$data["updated"] = $evalues["updated"];
	$data["update_uid"] = $evalues["update_uid"];
	$data["petugas_id"] = $evalues["petugas_id"];
	$data["pejabat_id"] = $evalues["pejabat_id"];
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
		
	if(!$pageObject->isAppearOnTabs("sspdno"))
		$xt->assign("sspdno_fieldblock",true);
	else
		$xt->assign("sspdno_tabfieldblock",true);
	$xt->assign("sspdno_label",true);
	if(isEnableSection508())
		$xt->assign_section("sspdno_label","<label for=\"".GetInputElementId("sspdno", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("sspdtgl"))
		$xt->assign("sspdtgl_fieldblock",true);
	else
		$xt->assign("sspdtgl_tabfieldblock",true);
	$xt->assign("sspdtgl_label",true);
	if(isEnableSection508())
		$xt->assign_section("sspdtgl_label","<label for=\"".GetInputElementId("sspdtgl", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("sspdjam"))
		$xt->assign("sspdjam_fieldblock",true);
	else
		$xt->assign("sspdjam_tabfieldblock",true);
	$xt->assign("sspdjam_label",true);
	if(isEnableSection508())
		$xt->assign_section("sspdjam_label","<label for=\"".GetInputElementId("sspdjam", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("invoice_id"))
		$xt->assign("invoice_id_fieldblock",true);
	else
		$xt->assign("invoice_id_tabfieldblock",true);
	$xt->assign("invoice_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("invoice_id_label","<label for=\"".GetInputElementId("invoice_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("keterangan"))
		$xt->assign("keterangan_fieldblock",true);
	else
		$xt->assign("keterangan_tabfieldblock",true);
	$xt->assign("keterangan_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan_label","<label for=\"".GetInputElementId("keterangan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("bulan_telat"))
		$xt->assign("bulan_telat_fieldblock",true);
	else
		$xt->assign("bulan_telat_tabfieldblock",true);
	$xt->assign("bulan_telat_label",true);
	if(isEnableSection508())
		$xt->assign_section("bulan_telat_label","<label for=\"".GetInputElementId("bulan_telat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("hitung_bunga"))
		$xt->assign("hitung_bunga_fieldblock",true);
	else
		$xt->assign("hitung_bunga_tabfieldblock",true);
	$xt->assign("hitung_bunga_label",true);
	if(isEnableSection508())
		$xt->assign_section("hitung_bunga_label","<label for=\"".GetInputElementId("hitung_bunga", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("jml_bayar"))
		$xt->assign("jml_bayar_fieldblock",true);
	else
		$xt->assign("jml_bayar_tabfieldblock",true);
	$xt->assign("jml_bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("jml_bayar_label","<label for=\"".GetInputElementId("jml_bayar", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("sisa"))
		$xt->assign("sisa_fieldblock",true);
	else
		$xt->assign("sisa_tabfieldblock",true);
	$xt->assign("sisa_label",true);
	if(isEnableSection508())
		$xt->assign_section("sisa_label","<label for=\"".GetInputElementId("sisa", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jenis_bayar"))
		$xt->assign("jenis_bayar_fieldblock",true);
	else
		$xt->assign("jenis_bayar_tabfieldblock",true);
	$xt->assign("jenis_bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("jenis_bayar_label","<label for=\"".GetInputElementId("jenis_bayar", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("printed"))
		$xt->assign("printed_fieldblock",true);
	else
		$xt->assign("printed_tabfieldblock",true);
	$xt->assign("printed_label",true);
	if(isEnableSection508())
		$xt->assign_section("printed_label","<label for=\"".GetInputElementId("printed", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tp_id"))
		$xt->assign("tp_id_fieldblock",true);
	else
		$xt->assign("tp_id_tabfieldblock",true);
	$xt->assign("tp_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_id_label","<label for=\"".GetInputElementId("tp_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("is_validated"))
		$xt->assign("is_validated_fieldblock",true);
	else
		$xt->assign("is_validated_tabfieldblock",true);
	$xt->assign("is_validated_label",true);
	if(isEnableSection508())
		$xt->assign_section("is_validated_label","<label for=\"".GetInputElementId("is_validated", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("is_valid"))
		$xt->assign("is_valid_fieldblock",true);
	else
		$xt->assign("is_valid_tabfieldblock",true);
	$xt->assign("is_valid_label",true);
	if(isEnableSection508())
		$xt->assign_section("is_valid_label","<label for=\"".GetInputElementId("is_valid", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("petugas_id"))
		$xt->assign("petugas_id_fieldblock",true);
	else
		$xt->assign("petugas_id_tabfieldblock",true);
	$xt->assign("petugas_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("petugas_id_label","<label for=\"".GetInputElementId("petugas_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pejabat_id"))
		$xt->assign("pejabat_id_fieldblock",true);
	else
		$xt->assign("pejabat_id_tabfieldblock",true);
	$xt->assign("pejabat_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("pejabat_id_label","<label for=\"".GetInputElementId("pejabat_id", $id, PAGE_EDIT)."\">","</label>");
		

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
	$showDetailKeys["public.pad_payment"]["masterkey1"] = $data["id"];		

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

//	sspdno - 
	$value = $pageObject->showDBValue("sspdno", $data, $keylink);
	$showValues["sspdno"] = $value;
	$showFields[] = "sspdno";
		$showRawValues["sspdno"] = substr($data["sspdno"],0,100);

//	sspdtgl - Short Date
	$value = $pageObject->showDBValue("sspdtgl", $data, $keylink);
	$showValues["sspdtgl"] = $value;
	$showFields[] = "sspdtgl";
		$showRawValues["sspdtgl"] = substr($data["sspdtgl"],0,100);

//	sspdjam - Time
	$value = $pageObject->showDBValue("sspdjam", $data, $keylink);
	$showValues["sspdjam"] = $value;
	$showFields[] = "sspdjam";
		$showRawValues["sspdjam"] = substr($data["sspdjam"],0,100);

//	invoice_id - 
	$value = $pageObject->showDBValue("invoice_id", $data, $keylink);
	$showValues["invoice_id"] = $value;
	$showFields[] = "invoice_id";
		$showRawValues["invoice_id"] = substr($data["invoice_id"],0,100);

//	keterangan - 
	$value = $pageObject->showDBValue("keterangan", $data, $keylink);
	$showValues["keterangan"] = $value;
	$showFields[] = "keterangan";
		$showRawValues["keterangan"] = substr($data["keterangan"],0,100);

//	bulan_telat - 
	$value = $pageObject->showDBValue("bulan_telat", $data, $keylink);
	$showValues["bulan_telat"] = $value;
	$showFields[] = "bulan_telat";
		$showRawValues["bulan_telat"] = substr($data["bulan_telat"],0,100);

//	hitung_bunga - 
	$value = $pageObject->showDBValue("hitung_bunga", $data, $keylink);
	$showValues["hitung_bunga"] = $value;
	$showFields[] = "hitung_bunga";
		$showRawValues["hitung_bunga"] = substr($data["hitung_bunga"],0,100);

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

//	jml_bayar - 
	$value = $pageObject->showDBValue("jml_bayar", $data, $keylink);
	$showValues["jml_bayar"] = $value;
	$showFields[] = "jml_bayar";
		$showRawValues["jml_bayar"] = substr($data["jml_bayar"],0,100);

//	sisa - Number
	$value = $pageObject->showDBValue("sisa", $data, $keylink);
	$showValues["sisa"] = $value;
	$showFields[] = "sisa";
		$showRawValues["sisa"] = substr($data["sisa"],0,100);

//	jenis_bayar - 
	$value = $pageObject->showDBValue("jenis_bayar", $data, $keylink);
	$showValues["jenis_bayar"] = $value;
	$showFields[] = "jenis_bayar";
		$showRawValues["jenis_bayar"] = substr($data["jenis_bayar"],0,100);

//	printed - 
	$value = $pageObject->showDBValue("printed", $data, $keylink);
	$showValues["printed"] = $value;
	$showFields[] = "printed";
		$showRawValues["printed"] = substr($data["printed"],0,100);

//	tp_id - 
	$value = $pageObject->showDBValue("tp_id", $data, $keylink);
	$showValues["tp_id"] = $value;
	$showFields[] = "tp_id";
		$showRawValues["tp_id"] = substr($data["tp_id"],0,100);

//	is_validated - 
	$value = $pageObject->showDBValue("is_validated", $data, $keylink);
	$showValues["is_validated"] = $value;
	$showFields[] = "is_validated";
		$showRawValues["is_validated"] = substr($data["is_validated"],0,100);

//	is_valid - 
	$value = $pageObject->showDBValue("is_valid", $data, $keylink);
	$showValues["is_valid"] = $value;
	$showFields[] = "is_valid";
		$showRawValues["is_valid"] = substr($data["is_valid"],0,100);

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

//	petugas_id - 
	$value = $pageObject->showDBValue("petugas_id", $data, $keylink);
	$showValues["petugas_id"] = $value;
	$showFields[] = "petugas_id";
		$showRawValues["petugas_id"] = substr($data["petugas_id"],0,100);

//	pejabat_id - 
	$value = $pageObject->showDBValue("pejabat_id", $data, $keylink);
	$showValues["pejabat_id"] = $value;
	$showFields[] = "pejabat_id";
		$showRawValues["pejabat_id"] = substr($data["pejabat_id"],0,100);
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
		$options['masterTable'] = "pad.pad_sspd";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "pad.pad_sspd";
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
	$strTableName = "pad.pad_sspd";
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
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='pad_pad_sspd_view.php?".$viewlink."'\"");
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
