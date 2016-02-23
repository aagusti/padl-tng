<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_spt_reklame_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_spt_reklame_edit"] = $layout;




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

$templatefile = ($inlineedit == EDIT_INLINE) ? "pad_pad_spt_reklame_inline_edit.htm" : "pad_pad_spt_reklame_edit.htm";

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
	

//	processing spt_id - begin
	$condition = 1;

	if($condition)
	{
		$control_spt_id = $pageObject->getControl("spt_id", $id);
		$control_spt_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing spt_id - end
//	processing media_id - begin
	$condition = 1;

	if($condition)
	{
		$control_media_id = $pageObject->getControl("media_id", $id);
		$control_media_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing media_id - end
//	processing kelas_jalan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_kelas_jalan_id = $pageObject->getControl("kelas_jalan_id", $id);
		$control_kelas_jalan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing kelas_jalan_id - end
//	processing panjang - begin
	$condition = 1;

	if($condition)
	{
		$control_panjang = $pageObject->getControl("panjang", $id);
		$control_panjang->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing panjang - end
//	processing lebar - begin
	$condition = 1;

	if($condition)
	{
		$control_lebar = $pageObject->getControl("lebar", $id);
		$control_lebar->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing lebar - end
//	processing tinggi - begin
	$condition = 1;

	if($condition)
	{
		$control_tinggi = $pageObject->getControl("tinggi", $id);
		$control_tinggi->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tinggi - end
//	processing muka - begin
	$condition = 1;

	if($condition)
	{
		$control_muka = $pageObject->getControl("muka", $id);
		$control_muka->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing muka - end
//	processing sisi - begin
	$condition = 1;

	if($condition)
	{
		$control_sisi = $pageObject->getControl("sisi", $id);
		$control_sisi->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing sisi - end
//	processing banyak - begin
	$condition = 1;

	if($condition)
	{
		$control_banyak = $pageObject->getControl("banyak", $id);
		$control_banyak->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing banyak - end
//	processing lama - begin
	$condition = 1;

	if($condition)
	{
		$control_lama = $pageObject->getControl("lama", $id);
		$control_lama->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing lama - end
//	processing nsr - begin
	$condition = 1;

	if($condition)
	{
		$control_nsr = $pageObject->getControl("nsr", $id);
		$control_nsr->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing nsr - end
//	processing alamat - begin
	$condition = 1;

	if($condition)
	{
		$control_alamat = $pageObject->getControl("alamat", $id);
		$control_alamat->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing alamat - end
//	processing update_uid - begin
	$condition = 1;

	if($condition)
	{
		$control_update_uid = $pageObject->getControl("update_uid", $id);
		$control_update_uid->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing update_uid - end
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
//	processing created - begin
	$condition = 1;

	if($condition)
	{
		$control_created = $pageObject->getControl("created", $id);
		$control_created->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing created - end
//	processing status_baliho - begin
	$condition = 1;

	if($condition)
	{
		$control_status_baliho = $pageObject->getControl("status_baliho", $id);
		$control_status_baliho->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing status_baliho - end
//	processing tambahan - begin
	$condition = 1;

	if($condition)
	{
		$control_tambahan = $pageObject->getControl("tambahan", $id);
		$control_tambahan->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing tambahan - end
//	processing jalan_id - begin
	$condition = 1;

	if($condition)
	{
		$control_jalan_id = $pageObject->getControl("jalan_id", $id);
		$control_jalan_id->readWebValue($evalues, $blobfields, $strWhereClause, $oldValuesRead, $efilename_values);

		}
//	processing jalan_id - end

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
			//	processing spt_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_spt_id->afterSuccessfulSave();
				}
	//	processing spt_id - end
			//	processing media_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_media_id->afterSuccessfulSave();
				}
	//	processing media_id - end
			//	processing kelas_jalan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_kelas_jalan_id->afterSuccessfulSave();
				}
	//	processing kelas_jalan_id - end
			//	processing panjang - begin
							$condition = 1;
			
				if($condition)
				{
					$control_panjang->afterSuccessfulSave();
				}
	//	processing panjang - end
			//	processing lebar - begin
							$condition = 1;
			
				if($condition)
				{
					$control_lebar->afterSuccessfulSave();
				}
	//	processing lebar - end
			//	processing tinggi - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tinggi->afterSuccessfulSave();
				}
	//	processing tinggi - end
			//	processing muka - begin
							$condition = 1;
			
				if($condition)
				{
					$control_muka->afterSuccessfulSave();
				}
	//	processing muka - end
			//	processing sisi - begin
							$condition = 1;
			
				if($condition)
				{
					$control_sisi->afterSuccessfulSave();
				}
	//	processing sisi - end
			//	processing banyak - begin
							$condition = 1;
			
				if($condition)
				{
					$control_banyak->afterSuccessfulSave();
				}
	//	processing banyak - end
			//	processing lama - begin
							$condition = 1;
			
				if($condition)
				{
					$control_lama->afterSuccessfulSave();
				}
	//	processing lama - end
			//	processing nsr - begin
							$condition = 1;
			
				if($condition)
				{
					$control_nsr->afterSuccessfulSave();
				}
	//	processing nsr - end
			//	processing alamat - begin
							$condition = 1;
			
				if($condition)
				{
					$control_alamat->afterSuccessfulSave();
				}
	//	processing alamat - end
			//	processing update_uid - begin
							$condition = 1;
			
				if($condition)
				{
					$control_update_uid->afterSuccessfulSave();
				}
	//	processing update_uid - end
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
			//	processing created - begin
							$condition = 1;
			
				if($condition)
				{
					$control_created->afterSuccessfulSave();
				}
	//	processing created - end
			//	processing status_baliho - begin
							$condition = 1;
			
				if($condition)
				{
					$control_status_baliho->afterSuccessfulSave();
				}
	//	processing status_baliho - end
			//	processing tambahan - begin
							$condition = 1;
			
				if($condition)
				{
					$control_tambahan->afterSuccessfulSave();
				}
	//	processing tambahan - end
			//	processing jalan_id - begin
							$condition = 1;
			
				if($condition)
				{
					$control_jalan_id->afterSuccessfulSave();
				}
	//	processing jalan_id - end
				
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
	header("Location: pad_pad_spt_reklame_".$pageObject->getPageType().".php?".$keyGetQ);
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
		header("Location: pad_pad_spt_reklame_list.php?a=return");
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
	$data["spt_id"] = $evalues["spt_id"];
	$data["media_id"] = $evalues["media_id"];
	$data["kelas_jalan_id"] = $evalues["kelas_jalan_id"];
	$data["panjang"] = $evalues["panjang"];
	$data["lebar"] = $evalues["lebar"];
	$data["tinggi"] = $evalues["tinggi"];
	$data["muka"] = $evalues["muka"];
	$data["sisi"] = $evalues["sisi"];
	$data["banyak"] = $evalues["banyak"];
	$data["lama"] = $evalues["lama"];
	$data["nsr"] = $evalues["nsr"];
	$data["alamat"] = $evalues["alamat"];
	$data["update_uid"] = $evalues["update_uid"];
	$data["create_uid"] = $evalues["create_uid"];
	$data["updated"] = $evalues["updated"];
	$data["created"] = $evalues["created"];
	$data["status_baliho"] = $evalues["status_baliho"];
	$data["tambahan"] = $evalues["tambahan"];
	$data["jalan_id"] = $evalues["jalan_id"];
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

	if(!$pageObject->isAppearOnTabs("spt_id"))
		$xt->assign("spt_id_fieldblock",true);
	else
		$xt->assign("spt_id_tabfieldblock",true);
	$xt->assign("spt_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("spt_id_label","<label for=\"".GetInputElementId("spt_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("media_id"))
		$xt->assign("media_id_fieldblock",true);
	else
		$xt->assign("media_id_tabfieldblock",true);
	$xt->assign("media_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("media_id_label","<label for=\"".GetInputElementId("media_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("kelas_jalan_id"))
		$xt->assign("kelas_jalan_id_fieldblock",true);
	else
		$xt->assign("kelas_jalan_id_tabfieldblock",true);
	$xt->assign("kelas_jalan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("kelas_jalan_id_label","<label for=\"".GetInputElementId("kelas_jalan_id", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("panjang"))
		$xt->assign("panjang_fieldblock",true);
	else
		$xt->assign("panjang_tabfieldblock",true);
	$xt->assign("panjang_label",true);
	if(isEnableSection508())
		$xt->assign_section("panjang_label","<label for=\"".GetInputElementId("panjang", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("lebar"))
		$xt->assign("lebar_fieldblock",true);
	else
		$xt->assign("lebar_tabfieldblock",true);
	$xt->assign("lebar_label",true);
	if(isEnableSection508())
		$xt->assign_section("lebar_label","<label for=\"".GetInputElementId("lebar", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tinggi"))
		$xt->assign("tinggi_fieldblock",true);
	else
		$xt->assign("tinggi_tabfieldblock",true);
	$xt->assign("tinggi_label",true);
	if(isEnableSection508())
		$xt->assign_section("tinggi_label","<label for=\"".GetInputElementId("tinggi", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("muka"))
		$xt->assign("muka_fieldblock",true);
	else
		$xt->assign("muka_tabfieldblock",true);
	$xt->assign("muka_label",true);
	if(isEnableSection508())
		$xt->assign_section("muka_label","<label for=\"".GetInputElementId("muka", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("sisi"))
		$xt->assign("sisi_fieldblock",true);
	else
		$xt->assign("sisi_tabfieldblock",true);
	$xt->assign("sisi_label",true);
	if(isEnableSection508())
		$xt->assign_section("sisi_label","<label for=\"".GetInputElementId("sisi", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("banyak"))
		$xt->assign("banyak_fieldblock",true);
	else
		$xt->assign("banyak_tabfieldblock",true);
	$xt->assign("banyak_label",true);
	if(isEnableSection508())
		$xt->assign_section("banyak_label","<label for=\"".GetInputElementId("banyak", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("lama"))
		$xt->assign("lama_fieldblock",true);
	else
		$xt->assign("lama_tabfieldblock",true);
	$xt->assign("lama_label",true);
	if(isEnableSection508())
		$xt->assign_section("lama_label","<label for=\"".GetInputElementId("lama", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("nsr"))
		$xt->assign("nsr_fieldblock",true);
	else
		$xt->assign("nsr_tabfieldblock",true);
	$xt->assign("nsr_label",true);
	if(isEnableSection508())
		$xt->assign_section("nsr_label","<label for=\"".GetInputElementId("nsr", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("alamat"))
		$xt->assign("alamat_fieldblock",true);
	else
		$xt->assign("alamat_tabfieldblock",true);
	$xt->assign("alamat_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_label","<label for=\"".GetInputElementId("alamat", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("update_uid"))
		$xt->assign("update_uid_fieldblock",true);
	else
		$xt->assign("update_uid_tabfieldblock",true);
	$xt->assign("update_uid_label",true);
	if(isEnableSection508())
		$xt->assign_section("update_uid_label","<label for=\"".GetInputElementId("update_uid", $id, PAGE_EDIT)."\">","</label>");
		
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
		
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
	$xt->assign("created_label",true);
	if(isEnableSection508())
		$xt->assign_section("created_label","<label for=\"".GetInputElementId("created", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("status_baliho"))
		$xt->assign("status_baliho_fieldblock",true);
	else
		$xt->assign("status_baliho_tabfieldblock",true);
	$xt->assign("status_baliho_label",true);
	if(isEnableSection508())
		$xt->assign_section("status_baliho_label","<label for=\"".GetInputElementId("status_baliho", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("tambahan"))
		$xt->assign("tambahan_fieldblock",true);
	else
		$xt->assign("tambahan_tabfieldblock",true);
	$xt->assign("tambahan_label",true);
	if(isEnableSection508())
		$xt->assign_section("tambahan_label","<label for=\"".GetInputElementId("tambahan", $id, PAGE_EDIT)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("jalan_id"))
		$xt->assign("jalan_id_fieldblock",true);
	else
		$xt->assign("jalan_id_tabfieldblock",true);
	$xt->assign("jalan_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("jalan_id_label","<label for=\"".GetInputElementId("jalan_id", $id, PAGE_EDIT)."\">","</label>");
		

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

//	spt_id - 
	$value = $pageObject->showDBValue("spt_id", $data, $keylink);
	$showValues["spt_id"] = $value;
	$showFields[] = "spt_id";
		$showRawValues["spt_id"] = substr($data["spt_id"],0,100);

//	media_id - 
	$value = $pageObject->showDBValue("media_id", $data, $keylink);
	$showValues["media_id"] = $value;
	$showFields[] = "media_id";
		$showRawValues["media_id"] = substr($data["media_id"],0,100);

//	kelas_jalan_id - 
	$value = $pageObject->showDBValue("kelas_jalan_id", $data, $keylink);
	$showValues["kelas_jalan_id"] = $value;
	$showFields[] = "kelas_jalan_id";
		$showRawValues["kelas_jalan_id"] = substr($data["kelas_jalan_id"],0,100);

//	panjang - Number
	$value = $pageObject->showDBValue("panjang", $data, $keylink);
	$showValues["panjang"] = $value;
	$showFields[] = "panjang";
		$showRawValues["panjang"] = substr($data["panjang"],0,100);

//	lebar - Number
	$value = $pageObject->showDBValue("lebar", $data, $keylink);
	$showValues["lebar"] = $value;
	$showFields[] = "lebar";
		$showRawValues["lebar"] = substr($data["lebar"],0,100);

//	tinggi - Number
	$value = $pageObject->showDBValue("tinggi", $data, $keylink);
	$showValues["tinggi"] = $value;
	$showFields[] = "tinggi";
		$showRawValues["tinggi"] = substr($data["tinggi"],0,100);

//	muka - 
	$value = $pageObject->showDBValue("muka", $data, $keylink);
	$showValues["muka"] = $value;
	$showFields[] = "muka";
		$showRawValues["muka"] = substr($data["muka"],0,100);

//	sisi - 
	$value = $pageObject->showDBValue("sisi", $data, $keylink);
	$showValues["sisi"] = $value;
	$showFields[] = "sisi";
		$showRawValues["sisi"] = substr($data["sisi"],0,100);

//	banyak - 
	$value = $pageObject->showDBValue("banyak", $data, $keylink);
	$showValues["banyak"] = $value;
	$showFields[] = "banyak";
		$showRawValues["banyak"] = substr($data["banyak"],0,100);

//	lama - 
	$value = $pageObject->showDBValue("lama", $data, $keylink);
	$showValues["lama"] = $value;
	$showFields[] = "lama";
		$showRawValues["lama"] = substr($data["lama"],0,100);

//	nsr - Number
	$value = $pageObject->showDBValue("nsr", $data, $keylink);
	$showValues["nsr"] = $value;
	$showFields[] = "nsr";
		$showRawValues["nsr"] = substr($data["nsr"],0,100);

//	alamat - 
	$value = $pageObject->showDBValue("alamat", $data, $keylink);
	$showValues["alamat"] = $value;
	$showFields[] = "alamat";
		$showRawValues["alamat"] = substr($data["alamat"],0,100);

//	update_uid - 
	$value = $pageObject->showDBValue("update_uid", $data, $keylink);
	$showValues["update_uid"] = $value;
	$showFields[] = "update_uid";
		$showRawValues["update_uid"] = substr($data["update_uid"],0,100);

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

//	created - Short Date
	$value = $pageObject->showDBValue("created", $data, $keylink);
	$showValues["created"] = $value;
	$showFields[] = "created";
		$showRawValues["created"] = substr($data["created"],0,100);

//	status_baliho - 
	$value = $pageObject->showDBValue("status_baliho", $data, $keylink);
	$showValues["status_baliho"] = $value;
	$showFields[] = "status_baliho";
		$showRawValues["status_baliho"] = substr($data["status_baliho"],0,100);

//	tambahan - Number
	$value = $pageObject->showDBValue("tambahan", $data, $keylink);
	$showValues["tambahan"] = $value;
	$showFields[] = "tambahan";
		$showRawValues["tambahan"] = substr($data["tambahan"],0,100);

//	jalan_id - 
	$value = $pageObject->showDBValue("jalan_id", $data, $keylink);
	$showValues["jalan_id"] = $value;
	$showFields[] = "jalan_id";
		$showRawValues["jalan_id"] = substr($data["jalan_id"],0,100);
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
		$options['masterTable'] = "pad.pad_spt_reklame";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search")){
			$strTableName = "pad.pad_spt_reklame";
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
	$strTableName = "pad.pad_spt_reklame";
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
$xt->assign("viewlink_attrs","id=\"viewButton".$id."\" name=\"viewButton".$id."\" onclick=\"window.location.href='pad_pad_spt_reklame_view.php?".$viewlink."'\"");
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
