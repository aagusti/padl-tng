<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/public_pad_invoice_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["public_pad_invoice_edit"] = $layout;




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

$templatefile = ($inlineedit == EDIT_INLINE) ? "public_pad_invoice_inline_edit.htm" : "public_pad_invoice_edit.htm";

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
	

//	processing source_id - begin
	$condition = 1;

	if($condition)
	{
		$control_source_id = $pageObject->getControl("source_id", $id);
		$control_source_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing source_id - end
//	processing source_nama - begin
	$condition = 1;

	if($condition)
	{
		$control_source_nama = $pageObject->getControl("source_nama", $id);
		$control_source_nama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing source_nama - end
//	processing tahun - begin
	$condition = 1;

	if($condition)
	{
		$control_tahun = $pageObject->getControl("tahun", $id);
		$control_tahun->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tahun - end
//	processing usaha_id - begin
	$condition = 1;

	if($condition)
	{
		$control_usaha_id = $pageObject->getControl("usaha_id", $id);
		$control_usaha_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing usaha_id - end
//	processing invoice_no - begin
	$condition = 1;

	if($condition)
	{
		$control_invoice_no = $pageObject->getControl("invoice_no", $id);
		$control_invoice_no->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing invoice_no - end
//	processing jenis_usaha - begin
	$condition = 1;

	if($condition)
	{
		$control_jenis_usaha = $pageObject->getControl("jenis_usaha", $id);
		$control_jenis_usaha->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jenis_usaha - end
//	processing jenis_pajak - begin
	$condition = 1;

	if($condition)
	{
		$control_jenis_pajak = $pageObject->getControl("jenis_pajak", $id);
		$control_jenis_pajak->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jenis_pajak - end
//	processing npwpd - begin
	$condition = 1;

	if($condition)
	{
		$control_npwpd = $pageObject->getControl("npwpd", $id);
		$control_npwpd->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing npwpd - end
//	processing nama_wp - begin
	$condition = 1;

	if($condition)
	{
		$control_nama_wp = $pageObject->getControl("nama_wp", $id);
		$control_nama_wp->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing nama_wp - end
//	processing alamat_wp - begin
	$condition = 1;

	if($condition)
	{
		$control_alamat_wp = $pageObject->getControl("alamat_wp", $id);
		$control_alamat_wp->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing alamat_wp - end
//	processing nama_op - begin
	$condition = 1;

	if($condition)
	{
		$control_nama_op = $pageObject->getControl("nama_op", $id);
		$control_nama_op->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing nama_op - end
//	processing alamat_op - begin
	$condition = 1;

	if($condition)
	{
		$control_alamat_op = $pageObject->getControl("alamat_op", $id);
		$control_alamat_op->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing alamat_op - end
//	processing nomor_tagihan - begin
	$condition = 1;

	if($condition)
	{
		$control_nomor_tagihan = $pageObject->getControl("nomor_tagihan", $id);
		$control_nomor_tagihan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing nomor_tagihan - end
//	processing pokok - begin
	$condition = 1;

	if($condition)
	{
		$control_pokok = $pageObject->getControl("pokok", $id);
		$control_pokok->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing pokok - end
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
//	processing total - begin
	$condition = 1;

	if($condition)
	{
		$control_total = $pageObject->getControl("total", $id);
		$control_total->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing total - end
//	processing status_bayar - begin
	$condition = 1;

	if($condition)
	{
		$control_status_bayar = $pageObject->getControl("status_bayar", $id);
		$control_status_bayar->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing status_bayar - end
//	processing jatuh_tempo - begin
	$condition = 1;

	if($condition)
	{
		$control_jatuh_tempo = $pageObject->getControl("jatuh_tempo", $id);
		$control_jatuh_tempo->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jatuh_tempo - end
//	processing periode - begin
	$condition = 1;

	if($condition)
	{
		$control_periode = $pageObject->getControl("periode", $id);
		$control_periode->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing periode - end
//	processing rekening_pokok - begin
	$condition = 1;

	if($condition)
	{
		$control_rekening_pokok = $pageObject->getControl("rekening_pokok", $id);
		$control_rekening_pokok->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing rekening_pokok - end
//	processing rekening_denda - begin
	$condition = 1;

	if($condition)
	{
		$control_rekening_denda = $pageObject->getControl("rekening_denda", $id);
		$control_rekening_denda->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing rekening_denda - end
//	processing nama_pokok - begin
	$condition = 1;

	if($condition)
	{
		$control_nama_pokok = $pageObject->getControl("nama_pokok", $id);
		$control_nama_pokok->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing nama_pokok - end
//	processing nama_denda - begin
	$condition = 1;

	if($condition)
	{
		$control_nama_denda = $pageObject->getControl("nama_denda", $id);
		$control_nama_denda->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing nama_denda - end
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
			//	processing source_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_source_id->afterSuccessfulSave();
				}
	//	processing source_id - end
			//	processing source_nama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_source_nama->afterSuccessfulSave();
				}
	//	processing source_nama - end
			//	processing tahun - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tahun->afterSuccessfulSave();
				}
	//	processing tahun - end
			//	processing usaha_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_usaha_id->afterSuccessfulSave();
				}
	//	processing usaha_id - end
			//	processing invoice_no - begin
							$condition = 1;
			
				if($condition)
				{
					$control_invoice_no->afterSuccessfulSave();
				}
	//	processing invoice_no - end
			//	processing jenis_usaha - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jenis_usaha->afterSuccessfulSave();
				}
	//	processing jenis_usaha - end
			//	processing jenis_pajak - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jenis_pajak->afterSuccessfulSave();
				}
	//	processing jenis_pajak - end
			//	processing npwpd - begin
							$condition = 1;
			
				if($condition)
				{
					$control_npwpd->afterSuccessfulSave();
				}
	//	processing npwpd - end
			//	processing nama_wp - begin
							$condition = 1;
			
				if($condition)
				{
					$control_nama_wp->afterSuccessfulSave();
				}
	//	processing nama_wp - end
			//	processing alamat_wp - begin
							$condition = 1;
			
				if($condition)
				{
					$control_alamat_wp->afterSuccessfulSave();
				}
	//	processing alamat_wp - end
			//	processing nama_op - begin
							$condition = 1;
			
				if($condition)
				{
					$control_nama_op->afterSuccessfulSave();
				}
	//	processing nama_op - end
			//	processing alamat_op - begin
							$condition = 1;
			
				if($condition)
				{
					$control_alamat_op->afterSuccessfulSave();
				}
	//	processing alamat_op - end
			//	processing nomor_tagihan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_nomor_tagihan->afterSuccessfulSave();
				}
	//	processing nomor_tagihan - end
			//	processing pokok - begin
							$condition = 1;
			
				if($condition)
				{
					$control_pokok->afterSuccessfulSave();
				}
	//	processing pokok - end
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
			//	processing total - begin
							$condition = 1;
			
				if($condition)
				{
					$control_total->afterSuccessfulSave();
				}
	//	processing total - end
			//	processing status_bayar - begin
							$condition = 1;
			
				if($condition)
				{
					$control_status_bayar->afterSuccessfulSave();
				}
	//	processing status_bayar - end
			//	processing jatuh_tempo - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jatuh_tempo->afterSuccessfulSave();
				}
	//	processing jatuh_tempo - end
			//	processing periode - begin
							$condition = 1;
			
				if($condition)
				{
					$control_periode->afterSuccessfulSave();
				}
	//	processing periode - end
			//	processing rekening_pokok - begin
							$condition = 1;
			
				if($condition)
				{
					$control_rekening_pokok->afterSuccessfulSave();
				}
	//	processing rekening_pokok - end
			//	processing rekening_denda - begin
							$condition = 1;
			
				if($condition)
				{
					$control_rekening_denda->afterSuccessfulSave();
				}
	//	processing rekening_denda - end
			//	processing nama_pokok - begin
							$condition = 1;
			
				if($condition)
				{
					$control_nama_pokok->afterSuccessfulSave();
				}
	//	processing nama_pokok - end
			//	processing nama_denda - begin
							$condition = 1;
			
				if($condition)
				{
					$control_nama_denda->afterSuccessfulSave();
				}
	//	processing nama_denda - end
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
	header("Location: public_pad_invoice_".$pageObject->getPageType().".php?".$keyGetQ);
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
		header("Location: public_pad_invoice_list.php?a=return");
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
	$data["source_id"] = $evalues["source_id"];
	$data["source_nama"] = $evalues["source_nama"];
	$data["tahun"] = $evalues["tahun"];
	$data["usaha_id"] = $evalues["usaha_id"];
	$data["invoice_no"] = $evalues["invoice_no"];
	$data["jenis_usaha"] = $evalues["jenis_usaha"];
	$data["jenis_pajak"] = $evalues["jenis_pajak"];
	$data["npwpd"] = $evalues["npwpd"];
	$data["nama_wp"] = $evalues["nama_wp"];
	$data["alamat_wp"] = $evalues["alamat_wp"];
	$data["nama_op"] = $evalues["nama_op"];
	$data["alamat_op"] = $evalues["alamat_op"];
	$data["nomor_tagihan"] = $evalues["nomor_tagihan"];
	$data["pokok"] = $evalues["pokok"];
	$data["denda"] = $evalues["denda"];
	$data["bunga"] = $evalues["bunga"];
	$data["total"] = $evalues["total"];
	$data["status_bayar"] = $evalues["status_bayar"];
	$data["jatuh_tempo"] = $evalues["jatuh_tempo"];
	$data["periode"] = $evalues["periode"];
	$data["rekening_pokok"] = $evalues["rekening_pokok"];
	$data["rekening_denda"] = $evalues["rekening_denda"];
	$data["nama_pokok"] = $evalues["nama_pokok"];
	$data["nama_denda"] = $evalues["nama_denda"];
	$data["created"] = $evalues["created"];
	$data["updated"] = $evalues["updated"];
	$data["create_uid"] = $evalues["create_uid"];
	$data["update_uid"] = $evalues["update_uid"];
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

	if(!$pageObject->isAppearOnTabs("source_id"))
		$xt->assign("source_id_fieldblock",true);
	else
		$xt->assign("source_id_tabfieldblock",true);
	$xt->assign("source_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("source_id_label","<label for=\"".GetInputElementId("source_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("source_nama"))
		$xt->assign("source_nama_fieldblock",true);
	else
		$xt->assign("source_nama_tabfieldblock",true);
	$xt->assign("source_nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("source_nama_label","<label for=\"".GetInputElementId("source_nama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tahun"))
		$xt->assign("tahun_fieldblock",true);
	else
		$xt->assign("tahun_tabfieldblock",true);
	$xt->assign("tahun_label",true);
	if(isEnableSection508())
		$xt->assign_section("tahun_label","<label for=\"".GetInputElementId("tahun", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("usaha_id"))
		$xt->assign("usaha_id_fieldblock",true);
	else
		$xt->assign("usaha_id_tabfieldblock",true);
	$xt->assign("usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("usaha_id_label","<label for=\"".GetInputElementId("usaha_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("invoice_no"))
		$xt->assign("invoice_no_fieldblock",true);
	else
		$xt->assign("invoice_no_tabfieldblock",true);
	$xt->assign("invoice_no_label",true);
	if(isEnableSection508())
		$xt->assign_section("invoice_no_label","<label for=\"".GetInputElementId("invoice_no", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jenis_usaha"))
		$xt->assign("jenis_usaha_fieldblock",true);
	else
		$xt->assign("jenis_usaha_tabfieldblock",true);
	$xt->assign("jenis_usaha_label",true);
	if(isEnableSection508())
		$xt->assign_section("jenis_usaha_label","<label for=\"".GetInputElementId("jenis_usaha", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jenis_pajak"))
		$xt->assign("jenis_pajak_fieldblock",true);
	else
		$xt->assign("jenis_pajak_tabfieldblock",true);
	$xt->assign("jenis_pajak_label",true);
	if(isEnableSection508())
		$xt->assign_section("jenis_pajak_label","<label for=\"".GetInputElementId("jenis_pajak", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("npwpd"))
		$xt->assign("npwpd_fieldblock",true);
	else
		$xt->assign("npwpd_tabfieldblock",true);
	$xt->assign("npwpd_label",true);
	if(isEnableSection508())
		$xt->assign_section("npwpd_label","<label for=\"".GetInputElementId("npwpd", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("nama_wp"))
		$xt->assign("nama_wp_fieldblock",true);
	else
		$xt->assign("nama_wp_tabfieldblock",true);
	$xt->assign("nama_wp_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_wp_label","<label for=\"".GetInputElementId("nama_wp", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("alamat_wp"))
		$xt->assign("alamat_wp_fieldblock",true);
	else
		$xt->assign("alamat_wp_tabfieldblock",true);
	$xt->assign("alamat_wp_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_wp_label","<label for=\"".GetInputElementId("alamat_wp", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("nama_op"))
		$xt->assign("nama_op_fieldblock",true);
	else
		$xt->assign("nama_op_tabfieldblock",true);
	$xt->assign("nama_op_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_op_label","<label for=\"".GetInputElementId("nama_op", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("alamat_op"))
		$xt->assign("alamat_op_fieldblock",true);
	else
		$xt->assign("alamat_op_tabfieldblock",true);
	$xt->assign("alamat_op_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_op_label","<label for=\"".GetInputElementId("alamat_op", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("nomor_tagihan"))
		$xt->assign("nomor_tagihan_fieldblock",true);
	else
		$xt->assign("nomor_tagihan_tabfieldblock",true);
	$xt->assign("nomor_tagihan_label",true);
	if(isEnableSection508())
		$xt->assign_section("nomor_tagihan_label","<label for=\"".GetInputElementId("nomor_tagihan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pokok"))
		$xt->assign("pokok_fieldblock",true);
	else
		$xt->assign("pokok_tabfieldblock",true);
	$xt->assign("pokok_label",true);
	if(isEnableSection508())
		$xt->assign_section("pokok_label","<label for=\"".GetInputElementId("pokok", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("total"))
		$xt->assign("total_fieldblock",true);
	else
		$xt->assign("total_tabfieldblock",true);
	$xt->assign("total_label",true);
	if(isEnableSection508())
		$xt->assign_section("total_label","<label for=\"".GetInputElementId("total", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("status_bayar"))
		$xt->assign("status_bayar_fieldblock",true);
	else
		$xt->assign("status_bayar_tabfieldblock",true);
	$xt->assign("status_bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("status_bayar_label","<label for=\"".GetInputElementId("status_bayar", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jatuh_tempo"))
		$xt->assign("jatuh_tempo_fieldblock",true);
	else
		$xt->assign("jatuh_tempo_tabfieldblock",true);
	$xt->assign("jatuh_tempo_label",true);
	if(isEnableSection508())
		$xt->assign_section("jatuh_tempo_label","<label for=\"".GetInputElementId("jatuh_tempo", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("periode"))
		$xt->assign("periode_fieldblock",true);
	else
		$xt->assign("periode_tabfieldblock",true);
	$xt->assign("periode_label",true);
	if(isEnableSection508())
		$xt->assign_section("periode_label","<label for=\"".GetInputElementId("periode", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("rekening_pokok"))
		$xt->assign("rekening_pokok_fieldblock",true);
	else
		$xt->assign("rekening_pokok_tabfieldblock",true);
	$xt->assign("rekening_pokok_label",true);
	if(isEnableSection508())
		$xt->assign_section("rekening_pokok_label","<label for=\"".GetInputElementId("rekening_pokok", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("rekening_denda"))
		$xt->assign("rekening_denda_fieldblock",true);
	else
		$xt->assign("rekening_denda_tabfieldblock",true);
	$xt->assign("rekening_denda_label",true);
	if(isEnableSection508())
		$xt->assign_section("rekening_denda_label","<label for=\"".GetInputElementId("rekening_denda", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("nama_pokok"))
		$xt->assign("nama_pokok_fieldblock",true);
	else
		$xt->assign("nama_pokok_tabfieldblock",true);
	$xt->assign("nama_pokok_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_pokok_label","<label for=\"".GetInputElementId("nama_pokok", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("nama_denda"))
		$xt->assign("nama_denda_fieldblock",true);
	else
		$xt->assign("nama_denda_tabfieldblock",true);
	$xt->assign("nama_denda_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_denda_label","<label for=\"".GetInputElementId("nama_denda", $id, PAGE_EDIT)."\">","</label>");
		
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

//	source_id - 
	$value = $pageObject->showDBValue("source_id", $data, $keylink);
	$showValues["source_id"] = $value;
	$showFields[] = "source_id";
		$showRawValues["source_id"] = substr($data["source_id"],0,100);

//	source_nama - 
	$value = $pageObject->showDBValue("source_nama", $data, $keylink);
	$showValues["source_nama"] = $value;
	$showFields[] = "source_nama";
		$showRawValues["source_nama"] = substr($data["source_nama"],0,100);

//	tahun - 
	$value = $pageObject->showDBValue("tahun", $data, $keylink);
	$showValues["tahun"] = $value;
	$showFields[] = "tahun";
		$showRawValues["tahun"] = substr($data["tahun"],0,100);

//	usaha_id - 
	$value = $pageObject->showDBValue("usaha_id", $data, $keylink);
	$showValues["usaha_id"] = $value;
	$showFields[] = "usaha_id";
		$showRawValues["usaha_id"] = substr($data["usaha_id"],0,100);

//	invoice_no - 
	$value = $pageObject->showDBValue("invoice_no", $data, $keylink);
	$showValues["invoice_no"] = $value;
	$showFields[] = "invoice_no";
		$showRawValues["invoice_no"] = substr($data["invoice_no"],0,100);

//	jenis_usaha - 
	$value = $pageObject->showDBValue("jenis_usaha", $data, $keylink);
	$showValues["jenis_usaha"] = $value;
	$showFields[] = "jenis_usaha";
		$showRawValues["jenis_usaha"] = substr($data["jenis_usaha"],0,100);

//	jenis_pajak - 
	$value = $pageObject->showDBValue("jenis_pajak", $data, $keylink);
	$showValues["jenis_pajak"] = $value;
	$showFields[] = "jenis_pajak";
		$showRawValues["jenis_pajak"] = substr($data["jenis_pajak"],0,100);

//	npwpd - 
	$value = $pageObject->showDBValue("npwpd", $data, $keylink);
	$showValues["npwpd"] = $value;
	$showFields[] = "npwpd";
		$showRawValues["npwpd"] = substr($data["npwpd"],0,100);

//	nama_wp - 
	$value = $pageObject->showDBValue("nama_wp", $data, $keylink);
	$showValues["nama_wp"] = $value;
	$showFields[] = "nama_wp";
		$showRawValues["nama_wp"] = substr($data["nama_wp"],0,100);

//	alamat_wp - 
	$value = $pageObject->showDBValue("alamat_wp", $data, $keylink);
	$showValues["alamat_wp"] = $value;
	$showFields[] = "alamat_wp";
		$showRawValues["alamat_wp"] = substr($data["alamat_wp"],0,100);

//	nama_op - 
	$value = $pageObject->showDBValue("nama_op", $data, $keylink);
	$showValues["nama_op"] = $value;
	$showFields[] = "nama_op";
		$showRawValues["nama_op"] = substr($data["nama_op"],0,100);

//	alamat_op - 
	$value = $pageObject->showDBValue("alamat_op", $data, $keylink);
	$showValues["alamat_op"] = $value;
	$showFields[] = "alamat_op";
		$showRawValues["alamat_op"] = substr($data["alamat_op"],0,100);

//	nomor_tagihan - 
	$value = $pageObject->showDBValue("nomor_tagihan", $data, $keylink);
	$showValues["nomor_tagihan"] = $value;
	$showFields[] = "nomor_tagihan";
		$showRawValues["nomor_tagihan"] = substr($data["nomor_tagihan"],0,100);

//	pokok - Number
	$value = $pageObject->showDBValue("pokok", $data, $keylink);
	$showValues["pokok"] = $value;
	$showFields[] = "pokok";
		$showRawValues["pokok"] = substr($data["pokok"],0,100);

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

//	total - Number
	$value = $pageObject->showDBValue("total", $data, $keylink);
	$showValues["total"] = $value;
	$showFields[] = "total";
		$showRawValues["total"] = substr($data["total"],0,100);

//	status_bayar - 
	$value = $pageObject->showDBValue("status_bayar", $data, $keylink);
	$showValues["status_bayar"] = $value;
	$showFields[] = "status_bayar";
		$showRawValues["status_bayar"] = substr($data["status_bayar"],0,100);

//	jatuh_tempo - Short Date
	$value = $pageObject->showDBValue("jatuh_tempo", $data, $keylink);
	$showValues["jatuh_tempo"] = $value;
	$showFields[] = "jatuh_tempo";
		$showRawValues["jatuh_tempo"] = substr($data["jatuh_tempo"],0,100);

//	periode - 
	$value = $pageObject->showDBValue("periode", $data, $keylink);
	$showValues["periode"] = $value;
	$showFields[] = "periode";
		$showRawValues["periode"] = substr($data["periode"],0,100);

//	rekening_pokok - 
	$value = $pageObject->showDBValue("rekening_pokok", $data, $keylink);
	$showValues["rekening_pokok"] = $value;
	$showFields[] = "rekening_pokok";
		$showRawValues["rekening_pokok"] = substr($data["rekening_pokok"],0,100);

//	rekening_denda - 
	$value = $pageObject->showDBValue("rekening_denda", $data, $keylink);
	$showValues["rekening_denda"] = $value;
	$showFields[] = "rekening_denda";
		$showRawValues["rekening_denda"] = substr($data["rekening_denda"],0,100);

//	nama_pokok - 
	$value = $pageObject->showDBValue("nama_pokok", $data, $keylink);
	$showValues["nama_pokok"] = $value;
	$showFields[] = "nama_pokok";
		$showRawValues["nama_pokok"] = substr($data["nama_pokok"],0,100);

//	nama_denda - 
	$value = $pageObject->showDBValue("nama_denda", $data, $keylink);
	$showValues["nama_denda"] = $value;
	$showFields[] = "nama_denda";
		$showRawValues["nama_denda"] = substr($data["nama_denda"],0,100);

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
		$options['masterTable'] = "public.pad_invoice";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "public.pad_invoice";
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
	$strTableName = "public.pad_invoice";
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
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='public_pad_invoice_view.php?".$viewlink."'\"");
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
