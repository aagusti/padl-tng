<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/public_tmp_bank2_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["public_tmp_bank2_add"] = $layout;



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
	$templatefile = "public_tmp_bank2_inline_add.htm";
else
	$templatefile = "public_tmp_bank2_add.htm";

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
		header('Location: public_tmp_bank2_add.php');
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
//	processing npwpd - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_npwpd = $pageObject->getControl("npwpd", $id);
		$control_npwpd->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing npwpd - end
//	processing bayar - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_bayar = $pageObject->getControl("bayar", $id);
		$control_bayar->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing bayar - end
//	processing periode_1 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_periode_1 = $pageObject->getControl("periode_1", $id);
		$control_periode_1->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing periode_1 - end
//	processing periode_2 - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_periode_2 = $pageObject->getControl("periode_2", $id);
		$control_periode_2->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing periode_2 - end
//	processing keterangan - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_keterangan = $pageObject->getControl("keterangan", $id);
		$control_keterangan->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing keterangan - end
//	processing spt_id_old - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_spt_id_old = $pageObject->getControl("spt_id_old", $id);
		$control_spt_id_old->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing spt_id_old - end
//	processing judul - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_judul = $pageObject->getControl("judul", $id);
		$control_judul->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing judul - end
//	processing lokasi - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_lokasi = $pageObject->getControl("lokasi", $id);
		$control_lokasi->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing lokasi - end
//	processing j - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_j = $pageObject->getControl("j", $id);
		$control_j->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing j - end
//	processing p - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_p = $pageObject->getControl("p", $id);
		$control_p->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing p - end
//	processing l - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_l = $pageObject->getControl("l", $id);
		$control_l->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing l - end
//	processing t - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_t = $pageObject->getControl("t", $id);
		$control_t->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing t - end
//	processing sspd_id - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_sspd_id = $pageObject->getControl("sspd_id", $id);
		$control_sspd_id->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing sspd_id - end
//	processing tanggal - start
	$inlineAddOption = true;
	if($inlineAddOption)
	{
		$control_tanggal = $pageObject->getControl("tanggal", $id);
		$control_tanggal->readWebValue($avalues, $blobfields, "", false, $afilename_values);
	}
//	processing tanggal - end




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
//	processing npwpd - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_npwpd->afterSuccessfulSave();
			}
//	processing npwpd - end
//	processing bayar - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_bayar->afterSuccessfulSave();
			}
//	processing bayar - end
//	processing periode_1 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_periode_1->afterSuccessfulSave();
			}
//	processing periode_1 - end
//	processing periode_2 - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_periode_2->afterSuccessfulSave();
			}
//	processing periode_2 - end
//	processing keterangan - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_keterangan->afterSuccessfulSave();
			}
//	processing keterangan - end
//	processing spt_id_old - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_spt_id_old->afterSuccessfulSave();
			}
//	processing spt_id_old - end
//	processing judul - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_judul->afterSuccessfulSave();
			}
//	processing judul - end
//	processing lokasi - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_lokasi->afterSuccessfulSave();
			}
//	processing lokasi - end
//	processing j - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_j->afterSuccessfulSave();
			}
//	processing j - end
//	processing p - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_p->afterSuccessfulSave();
			}
//	processing p - end
//	processing l - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_l->afterSuccessfulSave();
			}
//	processing l - end
//	processing t - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_t->afterSuccessfulSave();
			}
//	processing t - end
//	processing sspd_id - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_sspd_id->afterSuccessfulSave();
			}
//	processing sspd_id - end
//	processing tanggal - start
			$inlineAddOption = true;
			if($inlineAddOption)
			{
				$control_tanggal->afterSuccessfulSave();
			}
//	processing tanggal - end

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
						$message .='&nbsp;<a href=\'public_tmp_bank2_edit.php?'.$keylink.'\'>'."Edit".'</a>&nbsp;';
					if($pageObject->pSet->hasViewPage() && $permis['search'])
						$message .='&nbsp;<a href=\'public_tmp_bank2_view.php?'.$keylink.'\'>'."View".'</a>&nbsp;';
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
	header("Location: public_tmp_bank2_".$pageObject->getPageType().".php");
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
	$defvalues["nama_wp"]=@$avalues["nama_wp"];
	$defvalues["alamat_wp"]=@$avalues["alamat_wp"];
	$defvalues["npwpd"]=@$avalues["npwpd"];
	$defvalues["bayar"]=@$avalues["bayar"];
	$defvalues["periode_1"]=@$avalues["periode_1"];
	$defvalues["periode_2"]=@$avalues["periode_2"];
	$defvalues["keterangan"]=@$avalues["keterangan"];
	$defvalues["spt_id_old"]=@$avalues["spt_id_old"];
	$defvalues["judul"]=@$avalues["judul"];
	$defvalues["lokasi"]=@$avalues["lokasi"];
	$defvalues["j"]=@$avalues["j"];
	$defvalues["p"]=@$avalues["p"];
	$defvalues["l"]=@$avalues["l"];
	$defvalues["t"]=@$avalues["t"];
	$defvalues["sspd_id"]=@$avalues["sspd_id"];
	$defvalues["tanggal"]=@$avalues["tanggal"];
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
	
	if(!$pageObject->isAppearOnTabs("npwpd"))
		$xt->assign("npwpd_fieldblock",true);
	else
		$xt->assign("npwpd_tabfieldblock",true);
	$xt->assign("npwpd_label",true);
	if(isEnableSection508())
		$xt->assign_section("npwpd_label","<label for=\"".GetInputElementId("npwpd", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("bayar"))
		$xt->assign("bayar_fieldblock",true);
	else
		$xt->assign("bayar_tabfieldblock",true);
	$xt->assign("bayar_label",true);
	if(isEnableSection508())
		$xt->assign_section("bayar_label","<label for=\"".GetInputElementId("bayar", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("periode_1"))
		$xt->assign("periode_1_fieldblock",true);
	else
		$xt->assign("periode_1_tabfieldblock",true);
	$xt->assign("periode_1_label",true);
	if(isEnableSection508())
		$xt->assign_section("periode_1_label","<label for=\"".GetInputElementId("periode_1", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("periode_2"))
		$xt->assign("periode_2_fieldblock",true);
	else
		$xt->assign("periode_2_tabfieldblock",true);
	$xt->assign("periode_2_label",true);
	if(isEnableSection508())
		$xt->assign_section("periode_2_label","<label for=\"".GetInputElementId("periode_2", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("keterangan"))
		$xt->assign("keterangan_fieldblock",true);
	else
		$xt->assign("keterangan_tabfieldblock",true);
	$xt->assign("keterangan_label",true);
	if(isEnableSection508())
		$xt->assign_section("keterangan_label","<label for=\"".GetInputElementId("keterangan", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("spt_id_old"))
		$xt->assign("spt_id_old_fieldblock",true);
	else
		$xt->assign("spt_id_old_tabfieldblock",true);
	$xt->assign("spt_id_old_label",true);
	if(isEnableSection508())
		$xt->assign_section("spt_id_old_label","<label for=\"".GetInputElementId("spt_id_old", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("judul"))
		$xt->assign("judul_fieldblock",true);
	else
		$xt->assign("judul_tabfieldblock",true);
	$xt->assign("judul_label",true);
	if(isEnableSection508())
		$xt->assign_section("judul_label","<label for=\"".GetInputElementId("judul", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("lokasi"))
		$xt->assign("lokasi_fieldblock",true);
	else
		$xt->assign("lokasi_tabfieldblock",true);
	$xt->assign("lokasi_label",true);
	if(isEnableSection508())
		$xt->assign_section("lokasi_label","<label for=\"".GetInputElementId("lokasi", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("j"))
		$xt->assign("j_fieldblock",true);
	else
		$xt->assign("j_tabfieldblock",true);
	$xt->assign("j_label",true);
	if(isEnableSection508())
		$xt->assign_section("j_label","<label for=\"".GetInputElementId("j", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("p"))
		$xt->assign("p_fieldblock",true);
	else
		$xt->assign("p_tabfieldblock",true);
	$xt->assign("p_label",true);
	if(isEnableSection508())
		$xt->assign_section("p_label","<label for=\"".GetInputElementId("p", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("l"))
		$xt->assign("l_fieldblock",true);
	else
		$xt->assign("l_tabfieldblock",true);
	$xt->assign("l_label",true);
	if(isEnableSection508())
		$xt->assign_section("l_label","<label for=\"".GetInputElementId("l", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("t"))
		$xt->assign("t_fieldblock",true);
	else
		$xt->assign("t_tabfieldblock",true);
	$xt->assign("t_label",true);
	if(isEnableSection508())
		$xt->assign_section("t_label","<label for=\"".GetInputElementId("t", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("sspd_id"))
		$xt->assign("sspd_id_fieldblock",true);
	else
		$xt->assign("sspd_id_tabfieldblock",true);
	$xt->assign("sspd_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("sspd_id_label","<label for=\"".GetInputElementId("sspd_id", $id, PAGE_ADD)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("tanggal"))
		$xt->assign("tanggal_fieldblock",true);
	else
		$xt->assign("tanggal_tabfieldblock",true);
	$xt->assign("tanggal_label",true);
	if(isEnableSection508())
		$xt->assign_section("tanggal_label","<label for=\"".GetInputElementId("tanggal", $id, PAGE_ADD)."\">","</label>");
	
	
	
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
//	bayar
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("bayar", $data, $keylink);
		$showValues["bayar"] = $value;
		$showFields[] = "bayar";
	}	
//	periode_1
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("periode_1", $data, $keylink);
		$showValues["periode_1"] = $value;
		$showFields[] = "periode_1";
	}	
//	periode_2
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("periode_2", $data, $keylink);
		$showValues["periode_2"] = $value;
		$showFields[] = "periode_2";
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
//	spt_id_old
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("spt_id_old", $data, $keylink);
		$showValues["spt_id_old"] = $value;
		$showFields[] = "spt_id_old";
	}	
//	judul
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("judul", $data, $keylink);
		$showValues["judul"] = $value;
		$showFields[] = "judul";
	}	
//	lokasi
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("lokasi", $data, $keylink);
		$showValues["lokasi"] = $value;
		$showFields[] = "lokasi";
	}	
//	j
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("j", $data, $keylink);
		$showValues["j"] = $value;
		$showFields[] = "j";
	}	
//	p
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("p", $data, $keylink);
		$showValues["p"] = $value;
		$showFields[] = "p";
	}	
//	l
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("l", $data, $keylink);
		$showValues["l"] = $value;
		$showFields[] = "l";
	}	
//	t
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("t", $data, $keylink);
		$showValues["t"] = $value;
		$showFields[] = "t";
	}	
//	sspd_id
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("sspd_id", $data, $keylink);
		$showValues["sspd_id"] = $value;
		$showFields[] = "sspd_id";
	}	
//	tanggal
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value = $pageObject->showDBValue("tanggal", $data, $keylink);
		$showValues["tanggal"] = $value;
		$showFields[] = "tanggal";
	}	
		$showRawValues["id"] = substr($data["id"],0,100);
		$showRawValues["nama_wp"] = substr($data["nama_wp"],0,100);
		$showRawValues["alamat_wp"] = substr($data["alamat_wp"],0,100);
		$showRawValues["npwpd"] = substr($data["npwpd"],0,100);
		$showRawValues["bayar"] = substr($data["bayar"],0,100);
		$showRawValues["periode_1"] = substr($data["periode_1"],0,100);
		$showRawValues["periode_2"] = substr($data["periode_2"],0,100);
		$showRawValues["keterangan"] = substr($data["keterangan"],0,100);
		$showRawValues["spt_id_old"] = substr($data["spt_id_old"],0,100);
		$showRawValues["judul"] = substr($data["judul"],0,100);
		$showRawValues["lokasi"] = substr($data["lokasi"],0,100);
		$showRawValues["j"] = substr($data["j"],0,100);
		$showRawValues["p"] = substr($data["p"],0,100);
		$showRawValues["l"] = substr($data["l"],0,100);
		$showRawValues["t"] = substr($data["t"],0,100);
		$showRawValues["sspd_id"] = substr($data["sspd_id"],0,100);
		$showRawValues["tanggal"] = substr($data["tanggal"],0,100);
	
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
		$options['masterTable'] = "public.tmp_bank2";
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
	$strTableName = "public.tmp_bank2";
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
