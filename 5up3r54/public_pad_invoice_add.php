<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/public_pad_invoice_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["public_pad_invoice_add"] = $layout;



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
	$templatefile = "public_pad_invoice_inline_add.htm";
else
	$templatefile = "public_pad_invoice_add.htm";

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
		header('Location: public_pad_invoice_add.php');
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
//	processing source_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_source_id = $pageObject->getControl("source_id", $id);
		$control_source_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing source_id - end
//	processing source_nama - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_source_nama = $pageObject->getControl("source_nama", $id);
		$control_source_nama->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing source_nama - end
//	processing tahun - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tahun = $pageObject->getControl("tahun", $id);
		$control_tahun->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tahun - end
//	processing usaha_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_usaha_id = $pageObject->getControl("usaha_id", $id);
		$control_usaha_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing usaha_id - end
//	processing invoice_no - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_invoice_no = $pageObject->getControl("invoice_no", $id);
		$control_invoice_no->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing invoice_no - end
//	processing jenis_usaha - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jenis_usaha = $pageObject->getControl("jenis_usaha", $id);
		$control_jenis_usaha->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jenis_usaha - end
//	processing jenis_pajak - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jenis_pajak = $pageObject->getControl("jenis_pajak", $id);
		$control_jenis_pajak->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jenis_pajak - end
//	processing npwpd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_npwpd = $pageObject->getControl("npwpd", $id);
		$control_npwpd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing npwpd - end
//	processing nama_wp - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_nama_wp = $pageObject->getControl("nama_wp", $id);
		$control_nama_wp->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing nama_wp - end
//	processing alamat_wp - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_alamat_wp = $pageObject->getControl("alamat_wp", $id);
		$control_alamat_wp->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing alamat_wp - end
//	processing nama_op - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_nama_op = $pageObject->getControl("nama_op", $id);
		$control_nama_op->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing nama_op - end
//	processing alamat_op - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_alamat_op = $pageObject->getControl("alamat_op", $id);
		$control_alamat_op->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing alamat_op - end
//	processing nomor_tagihan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_nomor_tagihan = $pageObject->getControl("nomor_tagihan", $id);
		$control_nomor_tagihan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing nomor_tagihan - end
//	processing pokok - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_pokok = $pageObject->getControl("pokok", $id);
		$control_pokok->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing pokok - end
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
//	processing total - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_total = $pageObject->getControl("total", $id);
		$control_total->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing total - end
//	processing status_bayar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_status_bayar = $pageObject->getControl("status_bayar", $id);
		$control_status_bayar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing status_bayar - end
//	processing jatuh_tempo - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_jatuh_tempo = $pageObject->getControl("jatuh_tempo", $id);
		$control_jatuh_tempo->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing jatuh_tempo - end
//	processing periode - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_periode = $pageObject->getControl("periode", $id);
		$control_periode->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing periode - end
//	processing rekening_pokok - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_rekening_pokok = $pageObject->getControl("rekening_pokok", $id);
		$control_rekening_pokok->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing rekening_pokok - end
//	processing rekening_denda - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_rekening_denda = $pageObject->getControl("rekening_denda", $id);
		$control_rekening_denda->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing rekening_denda - end
//	processing nama_pokok - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_nama_pokok = $pageObject->getControl("nama_pokok", $id);
		$control_nama_pokok->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing nama_pokok - end
//	processing nama_denda - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_nama_denda = $pageObject->getControl("nama_denda", $id);
		$control_nama_denda->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing nama_denda - end
//	processing created - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_created = $pageObject->getControl("created", $id);
		$control_created->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing created - end
//	processing updated - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_updated = $pageObject->getControl("updated", $id);
		$control_updated->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing updated - end
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
//	processing source_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_source_id->afterSuccessfulSave();
			}
//	processing source_id - end
//	processing source_nama - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_source_nama->afterSuccessfulSave();
			}
//	processing source_nama - end
//	processing tahun - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tahun->afterSuccessfulSave();
			}
//	processing tahun - end
//	processing usaha_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_usaha_id->afterSuccessfulSave();
			}
//	processing usaha_id - end
//	processing invoice_no - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_invoice_no->afterSuccessfulSave();
			}
//	processing invoice_no - end
//	processing jenis_usaha - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jenis_usaha->afterSuccessfulSave();
			}
//	processing jenis_usaha - end
//	processing jenis_pajak - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jenis_pajak->afterSuccessfulSave();
			}
//	processing jenis_pajak - end
//	processing npwpd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_npwpd->afterSuccessfulSave();
			}
//	processing npwpd - end
//	processing nama_wp - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_nama_wp->afterSuccessfulSave();
			}
//	processing nama_wp - end
//	processing alamat_wp - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_alamat_wp->afterSuccessfulSave();
			}
//	processing alamat_wp - end
//	processing nama_op - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_nama_op->afterSuccessfulSave();
			}
//	processing nama_op - end
//	processing alamat_op - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_alamat_op->afterSuccessfulSave();
			}
//	processing alamat_op - end
//	processing nomor_tagihan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_nomor_tagihan->afterSuccessfulSave();
			}
//	processing nomor_tagihan - end
//	processing pokok - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_pokok->afterSuccessfulSave();
			}
//	processing pokok - end
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
//	processing total - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_total->afterSuccessfulSave();
			}
//	processing total - end
//	processing status_bayar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_status_bayar->afterSuccessfulSave();
			}
//	processing status_bayar - end
//	processing jatuh_tempo - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_jatuh_tempo->afterSuccessfulSave();
			}
//	processing jatuh_tempo - end
//	processing periode - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_periode->afterSuccessfulSave();
			}
//	processing periode - end
//	processing rekening_pokok - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_rekening_pokok->afterSuccessfulSave();
			}
//	processing rekening_pokok - end
//	processing rekening_denda - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_rekening_denda->afterSuccessfulSave();
			}
//	processing rekening_denda - end
//	processing nama_pokok - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_nama_pokok->afterSuccessfulSave();
			}
//	processing nama_pokok - end
//	processing nama_denda - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_nama_denda->afterSuccessfulSave();
			}
//	processing nama_denda - end
//	processing created - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_created->afterSuccessfulSave();
			}
//	processing created - end
//	processing updated - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_updated->afterSuccessfulSave();
			}
//	processing updated - end
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
						$message .='&nbsp;<a href=\'public_pad_invoice_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'public_pad_invoice_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: public_pad_invoice_".$pageObject->getPageType().".php");
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
	$defvalues["source_id"]=@$avalues["source_id"];
	$defvalues["source_nama"]=@$avalues["source_nama"];
	$defvalues["tahun"]=@$avalues["tahun"];
	$defvalues["usaha_id"]=@$avalues["usaha_id"];
	$defvalues["invoice_no"]=@$avalues["invoice_no"];
	$defvalues["jenis_usaha"]=@$avalues["jenis_usaha"];
	$defvalues["jenis_pajak"]=@$avalues["jenis_pajak"];
	$defvalues["npwpd"]=@$avalues["npwpd"];
	$defvalues["nama_wp"]=@$avalues["nama_wp"];
	$defvalues["alamat_wp"]=@$avalues["alamat_wp"];
	$defvalues["nama_op"]=@$avalues["nama_op"];
	$defvalues["alamat_op"]=@$avalues["alamat_op"];
	$defvalues["nomor_tagihan"]=@$avalues["nomor_tagihan"];
	$defvalues["pokok"]=@$avalues["pokok"];
	$defvalues["denda"]=@$avalues["denda"];
	$defvalues["bunga"]=@$avalues["bunga"];
	$defvalues["total"]=@$avalues["total"];
	$defvalues["status_bayar"]=@$avalues["status_bayar"];
	$defvalues["jatuh_tempo"]=@$avalues["jatuh_tempo"];
	$defvalues["periode"]=@$avalues["periode"];
	$defvalues["rekening_pokok"]=@$avalues["rekening_pokok"];
	$defvalues["rekening_denda"]=@$avalues["rekening_denda"];
	$defvalues["nama_pokok"]=@$avalues["nama_pokok"];
	$defvalues["nama_denda"]=@$avalues["nama_denda"];
	$defvalues["created"]=@$avalues["created"];
	$defvalues["updated"]=@$avalues["updated"];
	$defvalues["create_uid"]=@$avalues["create_uid"];
	$defvalues["update_uid"]=@$avalues["update_uid"];
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
	
	if(!$pageObject->isAppearOnTabs("source_id"))
		$xt->assign("source_id_fieldblock",true);
	else
		$xt->assign("source_id_tabfieldblock",true);
	$xt->assign("source_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("source_id_label","<label for=\"".GetInputElementId("source_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("source_nama"))
		$xt->assign("source_nama_fieldblock",true);
	else
		$xt->assign("source_nama_tabfieldblock",true);
	$xt->assign("source_nama_label",true);
	if(isEnableSection508())
		$xt->assign_section("source_nama_label","<label for=\"".GetInputElementId("source_nama", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tahun"))
		$xt->assign("tahun_fieldblock",true);
	else
		$xt->assign("tahun_tabfieldblock",true);
	$xt->assign("tahun_label",true);
	if(isEnableSection508())
		$xt->assign_section("tahun_label","<label for=\"".GetInputElementId("tahun", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("usaha_id"))
		$xt->assign("usaha_id_fieldblock",true);
	else
		$xt->assign("usaha_id_tabfieldblock",true);
	$xt->assign("usaha_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("usaha_id_label","<label for=\"".GetInputElementId("usaha_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("invoice_no"))
		$xt->assign("invoice_no_fieldblock",true);
	else
		$xt->assign("invoice_no_tabfieldblock",true);
	$xt->assign("invoice_no_label",true);
	if(isEnableSection508())
		$xt->assign_section("invoice_no_label","<label for=\"".GetInputElementId("invoice_no", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("jenis_usaha"))
		$xt->assign("jenis_usaha_fieldblock",true);
	else
		$xt->assign("jenis_usaha_tabfieldblock",true);
	$xt->assign("jenis_usaha_label",true);
	if(isEnableSection508())
		$xt->assign_section("jenis_usaha_label","<label for=\"".GetInputElementId("jenis_usaha", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("jenis_pajak"))
		$xt->assign("jenis_pajak_fieldblock",true);
	else
		$xt->assign("jenis_pajak_tabfieldblock",true);
	$xt->assign("jenis_pajak_label",true);
	if(isEnableSection508())
		$xt->assign_section("jenis_pajak_label","<label for=\"".GetInputElementId("jenis_pajak", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("npwpd"))
		$xt->assign("npwpd_fieldblock",true);
	else
		$xt->assign("npwpd_tabfieldblock",true);
	$xt->assign("npwpd_label",true);
	if(isEnableSection508())
		$xt->assign_section("npwpd_label","<label for=\"".GetInputElementId("npwpd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("nama_wp"))
		$xt->assign("nama_wp_fieldblock",true);
	else
		$xt->assign("nama_wp_tabfieldblock",true);
	$xt->assign("nama_wp_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_wp_label","<label for=\"".GetInputElementId("nama_wp", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("alamat_wp"))
		$xt->assign("alamat_wp_fieldblock",true);
	else
		$xt->assign("alamat_wp_tabfieldblock",true);
	$xt->assign("alamat_wp_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_wp_label","<label for=\"".GetInputElementId("alamat_wp", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("nama_op"))
		$xt->assign("nama_op_fieldblock",true);
	else
		$xt->assign("nama_op_tabfieldblock",true);
	$xt->assign("nama_op_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_op_label","<label for=\"".GetInputElementId("nama_op", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("alamat_op"))
		$xt->assign("alamat_op_fieldblock",true);
	else
		$xt->assign("alamat_op_tabfieldblock",true);
	$xt->assign("alamat_op_label",true);
	if(isEnableSection508())
		$xt->assign_section("alamat_op_label","<label for=\"".GetInputElementId("alamat_op", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("nomor_tagihan"))
		$xt->assign("nomor_tagihan_fieldblock",true);
	else
		$xt->assign("nomor_tagihan_tabfieldblock",true);
	$xt->assign("nomor_tagihan_label",true);
	if(isEnableSection508())
		$xt->assign_section("nomor_tagihan_label","<label for=\"".GetInputElementId("nomor_tagihan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pokok"))
		$xt->assign("pokok_fieldblock",true);
	else
		$xt->assign("pokok_tabfieldblock",true);
	$xt->assign("pokok_label",true);
	if(isEnableSection508())
		$xt->assign_section("pokok_label","<label for=\"".GetInputElementId("pokok", $id, PAGE_ADD)."\">","</label>");
	
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
	
	if(!$pageObject->isAppearOnTabs("total"))
		$xt->assign("total_fieldblock",true);
	else
		$xt->assign("total_tabfieldblock",true);
	$xt->assign("total_label",true);
	if(isEnableSection508())
		$xt->assign_section("total_label","<label for=\"".GetInputElementId("total", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("status_bayar"))
		$xt->assign("status_bayar_fieldblock",true);
	else
		$xt->assign("status_bayar_tabfieldblock",true);
	$xt->assign("status_bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("status_bayar_label","<label for=\"".GetInputElementId("status_bayar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("jatuh_tempo"))
		$xt->assign("jatuh_tempo_fieldblock",true);
	else
		$xt->assign("jatuh_tempo_tabfieldblock",true);
	$xt->assign("jatuh_tempo_label",true);
	if(isEnableSection508())
		$xt->assign_section("jatuh_tempo_label","<label for=\"".GetInputElementId("jatuh_tempo", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("periode"))
		$xt->assign("periode_fieldblock",true);
	else
		$xt->assign("periode_tabfieldblock",true);
	$xt->assign("periode_label",true);
	if(isEnableSection508())
		$xt->assign_section("periode_label","<label for=\"".GetInputElementId("periode", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("rekening_pokok"))
		$xt->assign("rekening_pokok_fieldblock",true);
	else
		$xt->assign("rekening_pokok_tabfieldblock",true);
	$xt->assign("rekening_pokok_label",true);
	if(isEnableSection508())
		$xt->assign_section("rekening_pokok_label","<label for=\"".GetInputElementId("rekening_pokok", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("rekening_denda"))
		$xt->assign("rekening_denda_fieldblock",true);
	else
		$xt->assign("rekening_denda_tabfieldblock",true);
	$xt->assign("rekening_denda_label",true);
	if(isEnableSection508())
		$xt->assign_section("rekening_denda_label","<label for=\"".GetInputElementId("rekening_denda", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("nama_pokok"))
		$xt->assign("nama_pokok_fieldblock",true);
	else
		$xt->assign("nama_pokok_tabfieldblock",true);
	$xt->assign("nama_pokok_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_pokok_label","<label for=\"".GetInputElementId("nama_pokok", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("nama_denda"))
		$xt->assign("nama_denda_fieldblock",true);
	else
		$xt->assign("nama_denda_tabfieldblock",true);
	$xt->assign("nama_denda_label",true);
	if(isEnableSection508())
		$xt->assign_section("nama_denda_label","<label for=\"".GetInputElementId("nama_denda", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
	$xt->assign("created_label",true);
	if(isEnableSection508())
		$xt->assign_section("created_label","<label for=\"".GetInputElementId("created", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("updated"))
		$xt->assign("updated_fieldblock",true);
	else
		$xt->assign("updated_tabfieldblock",true);
	$xt->assign("updated_label",true);
	if(isEnableSection508())
		$xt->assign_section("updated_label","<label for=\"".GetInputElementId("updated", $id, PAGE_ADD)."\">","</label>");
	
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
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("id", $data, $keylink);
		$showValues["id"] = $value;
		$showFields[] = "id";
	}	
//	source_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("source_id", $data, $keylink);
		$showValues["source_id"] = $value;
		$showFields[] = "source_id";
	}	
//	source_nama
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("source_nama", $data, $keylink);
		$showValues["source_nama"] = $value;
		$showFields[] = "source_nama";
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
//	usaha_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("usaha_id", $data, $keylink);
		$showValues["usaha_id"] = $value;
		$showFields[] = "usaha_id";
	}	
//	invoice_no
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("invoice_no", $data, $keylink);
		$showValues["invoice_no"] = $value;
		$showFields[] = "invoice_no";
	}	
//	jenis_usaha
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("jenis_usaha", $data, $keylink);
		$showValues["jenis_usaha"] = $value;
		$showFields[] = "jenis_usaha";
	}	
//	jenis_pajak
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("jenis_pajak", $data, $keylink);
		$showValues["jenis_pajak"] = $value;
		$showFields[] = "jenis_pajak";
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
//	nama_wp
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("nama_wp", $data, $keylink);
		$showValues["nama_wp"] = $value;
		$showFields[] = "nama_wp";
	}	
//	alamat_wp
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("alamat_wp", $data, $keylink);
		$showValues["alamat_wp"] = $value;
		$showFields[] = "alamat_wp";
	}	
//	nama_op
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("nama_op", $data, $keylink);
		$showValues["nama_op"] = $value;
		$showFields[] = "nama_op";
	}	
//	alamat_op
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("alamat_op", $data, $keylink);
		$showValues["alamat_op"] = $value;
		$showFields[] = "alamat_op";
	}	
//	nomor_tagihan
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("nomor_tagihan", $data, $keylink);
		$showValues["nomor_tagihan"] = $value;
		$showFields[] = "nomor_tagihan";
	}	
//	pokok
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("pokok", $data, $keylink);
		$showValues["pokok"] = $value;
		$showFields[] = "pokok";
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
//	total
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("total", $data, $keylink);
		$showValues["total"] = $value;
		$showFields[] = "total";
	}	
//	status_bayar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("status_bayar", $data, $keylink);
		$showValues["status_bayar"] = $value;
		$showFields[] = "status_bayar";
	}	
//	jatuh_tempo
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("jatuh_tempo", $data, $keylink);
		$showValues["jatuh_tempo"] = $value;
		$showFields[] = "jatuh_tempo";
	}	
//	periode
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("periode", $data, $keylink);
		$showValues["periode"] = $value;
		$showFields[] = "periode";
	}	
//	rekening_pokok
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("rekening_pokok", $data, $keylink);
		$showValues["rekening_pokok"] = $value;
		$showFields[] = "rekening_pokok";
	}	
//	rekening_denda
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("rekening_denda", $data, $keylink);
		$showValues["rekening_denda"] = $value;
		$showFields[] = "rekening_denda";
	}	
//	nama_pokok
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("nama_pokok", $data, $keylink);
		$showValues["nama_pokok"] = $value;
		$showFields[] = "nama_pokok";
	}	
//	nama_denda
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("nama_denda", $data, $keylink);
		$showValues["nama_denda"] = $value;
		$showFields[] = "nama_denda";
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
		$showRawValues["id"] = substr($data["id"],0,100);
		$showRawValues["source_id"] = substr($data["source_id"],0,100);
		$showRawValues["source_nama"] = substr($data["source_nama"],0,100);
		$showRawValues["tahun"] = substr($data["tahun"],0,100);
		$showRawValues["usaha_id"] = substr($data["usaha_id"],0,100);
		$showRawValues["invoice_no"] = substr($data["invoice_no"],0,100);
		$showRawValues["jenis_usaha"] = substr($data["jenis_usaha"],0,100);
		$showRawValues["jenis_pajak"] = substr($data["jenis_pajak"],0,100);
		$showRawValues["npwpd"] = substr($data["npwpd"],0,100);
		$showRawValues["nama_wp"] = substr($data["nama_wp"],0,100);
		$showRawValues["alamat_wp"] = substr($data["alamat_wp"],0,100);
		$showRawValues["nama_op"] = substr($data["nama_op"],0,100);
		$showRawValues["alamat_op"] = substr($data["alamat_op"],0,100);
		$showRawValues["nomor_tagihan"] = substr($data["nomor_tagihan"],0,100);
		$showRawValues["pokok"] = substr($data["pokok"],0,100);
		$showRawValues["denda"] = substr($data["denda"],0,100);
		$showRawValues["bunga"] = substr($data["bunga"],0,100);
		$showRawValues["total"] = substr($data["total"],0,100);
		$showRawValues["status_bayar"] = substr($data["status_bayar"],0,100);
		$showRawValues["jatuh_tempo"] = substr($data["jatuh_tempo"],0,100);
		$showRawValues["periode"] = substr($data["periode"],0,100);
		$showRawValues["rekening_pokok"] = substr($data["rekening_pokok"],0,100);
		$showRawValues["rekening_denda"] = substr($data["rekening_denda"],0,100);
		$showRawValues["nama_pokok"] = substr($data["nama_pokok"],0,100);
		$showRawValues["nama_denda"] = substr($data["nama_denda"],0,100);
		$showRawValues["created"] = substr($data["created"],0,100);
		$showRawValues["updated"] = substr($data["updated"],0,100);
		$showRawValues["create_uid"] = substr($data["create_uid"],0,100);
		$showRawValues["update_uid"] = substr($data["update_uid"],0,100);
	
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
		$options['masterTable'] = "public.pad_invoice";
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
	$strTableName = "public.pad_invoice";
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
