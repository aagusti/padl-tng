<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/public_pad_payment_variables.php");
include('include/xtempl.php');
include('classes/viewpage.php');
include("classes/searchclause.php");

add_nocache_headers();

//	check if logged in
if(!isLogged() || CheckPermissionsEvent($strTableName, 'S') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

$layout = new TLayout("view2","RoundedGreen","MobileGreen");
$layout->blocks["top"] = array();
$layout->skins["pdf"] = "empty";
$layout->blocks["top"][] = "pdf";
$layout->containers["view"] = array();

$layout->containers["view"][] = array("name"=>"viewheader","block"=>"","substyle"=>2);


$layout->containers["view"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"viewfields","block"=>"","substyle"=>1);


$layout->containers["fields"][] = array("name"=>"viewbuttons","block"=>"","substyle"=>2);


$layout->skins["fields"] = "fields";

$layout->skins["view"] = "1";
$layout->blocks["top"][] = "view";
$layout->skins["details"] = "empty";
$layout->blocks["top"][] = "details";$page_layouts["public_pad_payment_view"] = $layout;




//$cipherer = new RunnerCipherer($strTableName);
	
$xt = new Xtempl();

$query = $gQuery->Copy();

$filename = "";	
$message = "";
$key = array();
$next = array();
$prev = array();
$all = postvalue("all");
$pdf = postvalue("pdf");
$mypage = 1;

//Show view page as popUp or not
$inlineview = (postvalue("onFly") ? true : false);

//If show view as popUp, get parent Id
if($inlineview)
	$parId = postvalue("parId");
else
	$parId = 0;

//Set page id	
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;

//$isNeedSettings = true;//($inlineview && postvalue("isNeedSettings") == 'true') || (!$inlineview);	
	
// assign an id
$xt->assign("id",$id);

//array of params for classes
$params = array("pageType" => PAGE_VIEW, "id" => $id, "tName" => $strTableName);
$params["xt"] = &$xt;
$params["all"] = $all;

//Get array of tabs for edit page
$params['useTabsOnView'] = $gSettings->useTabsOnView();
if($params['useTabsOnView'])
	$params['arrViewTabs'] = $gSettings->getViewTabs();
$pageObject = new ViewPage($params);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($pageObject->searchClauseObj);

// proccess big google maps

// add button events if exist
$pageObject->addButtonHandlers();

//For show detail tables on master page view
$dpParams = array();
if($pageObject->isShowDetailTables && !isMobile())
{
	$ids = $id;
	$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array();
}

//	Before Process event
if($eventObj->exists("BeforeProcessView"))
	$eventObj->BeforeProcessView($conn, $pageObject);
	
//	read current values from the database
$data = $pageObject->getCurrentRecordInternal();

if (!sizeof($data)) {
	header("Location: public_pad_payment_list.php?a=return");
	exit();
}

$out = "";
$first = true;
$fieldsArr = array();
$arr = array();
$arr['fName'] = "id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "invoice_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("invoice_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tagihan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tagihan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "denda";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("denda");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "total_bayar";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("total_bayar");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "iso_request";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("iso_request");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "transmission";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("transmission");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "settlement";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("settlement");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "stan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("stan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ntb";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ntb");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ntp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ntp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bank_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bank_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "channel_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("channel_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bank_ip";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bank_ip");
$fieldsArr[] = $arr;

$mainTableOwnerID = $pageObject->pSet->getTableOwnerIdField();
$ownerIdValue="";

$pageObject->setGoogleMapsParams($fieldsArr);

while($data)
{
	$xt->assign("show_key1", htmlspecialchars($pageObject->showDBValue("id", $data)));

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

////////////////////////////////////////////
//id - 
	
	$value = $pageObject->showDBValue("id", $data, $keylink);
	if($mainTableOwnerID=="id")
		$ownerIdValue=$value;
	$xt->assign("id_value",$value);
	if(!$pageObject->isAppearOnTabs("id"))
		$xt->assign("id_fieldblock",true);
	else
		$xt->assign("id_tabfieldblock",true);
////////////////////////////////////////////
//invoice_id - 
	
	$value = $pageObject->showDBValue("invoice_id", $data, $keylink);
	if($mainTableOwnerID=="invoice_id")
		$ownerIdValue=$value;
	$xt->assign("invoice_id_value",$value);
	if(!$pageObject->isAppearOnTabs("invoice_id"))
		$xt->assign("invoice_id_fieldblock",true);
	else
		$xt->assign("invoice_id_tabfieldblock",true);
////////////////////////////////////////////
//tgl - Short Date
	
	$value = $pageObject->showDBValue("tgl", $data, $keylink);
	if($mainTableOwnerID=="tgl")
		$ownerIdValue=$value;
	$xt->assign("tgl_value",$value);
	if(!$pageObject->isAppearOnTabs("tgl"))
		$xt->assign("tgl_fieldblock",true);
	else
		$xt->assign("tgl_tabfieldblock",true);
////////////////////////////////////////////
//tagihan - Number
	
	$value = $pageObject->showDBValue("tagihan", $data, $keylink);
	if($mainTableOwnerID=="tagihan")
		$ownerIdValue=$value;
	$xt->assign("tagihan_value",$value);
	if(!$pageObject->isAppearOnTabs("tagihan"))
		$xt->assign("tagihan_fieldblock",true);
	else
		$xt->assign("tagihan_tabfieldblock",true);
////////////////////////////////////////////
//denda - Number
	
	$value = $pageObject->showDBValue("denda", $data, $keylink);
	if($mainTableOwnerID=="denda")
		$ownerIdValue=$value;
	$xt->assign("denda_value",$value);
	if(!$pageObject->isAppearOnTabs("denda"))
		$xt->assign("denda_fieldblock",true);
	else
		$xt->assign("denda_tabfieldblock",true);
////////////////////////////////////////////
//total_bayar - Number
	
	$value = $pageObject->showDBValue("total_bayar", $data, $keylink);
	if($mainTableOwnerID=="total_bayar")
		$ownerIdValue=$value;
	$xt->assign("total_bayar_value",$value);
	if(!$pageObject->isAppearOnTabs("total_bayar"))
		$xt->assign("total_bayar_fieldblock",true);
	else
		$xt->assign("total_bayar_tabfieldblock",true);
////////////////////////////////////////////
//iso_request - 
	
	$value = $pageObject->showDBValue("iso_request", $data, $keylink);
	if($mainTableOwnerID=="iso_request")
		$ownerIdValue=$value;
	$xt->assign("iso_request_value",$value);
	if(!$pageObject->isAppearOnTabs("iso_request"))
		$xt->assign("iso_request_fieldblock",true);
	else
		$xt->assign("iso_request_tabfieldblock",true);
////////////////////////////////////////////
//transmission - Short Date
	
	$value = $pageObject->showDBValue("transmission", $data, $keylink);
	if($mainTableOwnerID=="transmission")
		$ownerIdValue=$value;
	$xt->assign("transmission_value",$value);
	if(!$pageObject->isAppearOnTabs("transmission"))
		$xt->assign("transmission_fieldblock",true);
	else
		$xt->assign("transmission_tabfieldblock",true);
////////////////////////////////////////////
//settlement - Short Date
	
	$value = $pageObject->showDBValue("settlement", $data, $keylink);
	if($mainTableOwnerID=="settlement")
		$ownerIdValue=$value;
	$xt->assign("settlement_value",$value);
	if(!$pageObject->isAppearOnTabs("settlement"))
		$xt->assign("settlement_fieldblock",true);
	else
		$xt->assign("settlement_tabfieldblock",true);
////////////////////////////////////////////
//stan - 
	
	$value = $pageObject->showDBValue("stan", $data, $keylink);
	if($mainTableOwnerID=="stan")
		$ownerIdValue=$value;
	$xt->assign("stan_value",$value);
	if(!$pageObject->isAppearOnTabs("stan"))
		$xt->assign("stan_fieldblock",true);
	else
		$xt->assign("stan_tabfieldblock",true);
////////////////////////////////////////////
//ntb - 
	
	$value = $pageObject->showDBValue("ntb", $data, $keylink);
	if($mainTableOwnerID=="ntb")
		$ownerIdValue=$value;
	$xt->assign("ntb_value",$value);
	if(!$pageObject->isAppearOnTabs("ntb"))
		$xt->assign("ntb_fieldblock",true);
	else
		$xt->assign("ntb_tabfieldblock",true);
////////////////////////////////////////////
//ntp - 
	
	$value = $pageObject->showDBValue("ntp", $data, $keylink);
	if($mainTableOwnerID=="ntp")
		$ownerIdValue=$value;
	$xt->assign("ntp_value",$value);
	if(!$pageObject->isAppearOnTabs("ntp"))
		$xt->assign("ntp_fieldblock",true);
	else
		$xt->assign("ntp_tabfieldblock",true);
////////////////////////////////////////////
//bank_id - 
	
	$value = $pageObject->showDBValue("bank_id", $data, $keylink);
	if($mainTableOwnerID=="bank_id")
		$ownerIdValue=$value;
	$xt->assign("bank_id_value",$value);
	if(!$pageObject->isAppearOnTabs("bank_id"))
		$xt->assign("bank_id_fieldblock",true);
	else
		$xt->assign("bank_id_tabfieldblock",true);
////////////////////////////////////////////
//channel_id - 
	
	$value = $pageObject->showDBValue("channel_id", $data, $keylink);
	if($mainTableOwnerID=="channel_id")
		$ownerIdValue=$value;
	$xt->assign("channel_id_value",$value);
	if(!$pageObject->isAppearOnTabs("channel_id"))
		$xt->assign("channel_id_fieldblock",true);
	else
		$xt->assign("channel_id_tabfieldblock",true);
////////////////////////////////////////////
//bank_ip - 
	
	$value = $pageObject->showDBValue("bank_ip", $data, $keylink);
	if($mainTableOwnerID=="bank_ip")
		$ownerIdValue=$value;
	$xt->assign("bank_ip_value",$value);
	if(!$pageObject->isAppearOnTabs("bank_ip"))
		$xt->assign("bank_ip_fieldblock",true);
	else
		$xt->assign("bank_ip_tabfieldblock",true);

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && !isMobile())
{
	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
	}
	
	$dControlsMap = array();
	$dViewControlsMap = array();
	
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$options = array();
		//array of params for classes
		$options["mode"] = LIST_DETAILS;
		$options["pageType"] = PAGE_LIST;
		$options["masterPageType"] = PAGE_VIEW;
		$options["mainMasterPageType"] = PAGE_VIEW;
		$options['masterTable'] = "public.pad_payment";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "public.pad_payment";
			continue;
		}
		
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
		$options['flyId'] = $pageObject->genId()+1;
		$mkr = 1;
		foreach($mKeys[$strTableName] as $mk)
			$options['masterKeysReq'][$mkr++] = $data[$mk];

		$listPageObject = ListPage::createListPage($strTableName, $options);
		
		// prepare code
		$listPageObject->prepareForBuildPage();
		
		// show page
		if($listPageObject->permis[$strTableName]['search'] && $listPageObject->rowsFound)
		{
			//set page events
			foreach($listPageObject->eventsObject->events as $event => $name)
				$listPageObject->xt->assign_event($event, $listPageObject->eventsObject, $event, array());
			
			//add detail settings to master settings
			$listPageObject->addControlsJSAndCSS();
			$listPageObject->fillSetCntrlMaps();
			$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];
			$dControlsMap[$strTableName] = $listPageObject->controlsMap;
			$dViewControlsMap[$strTableName] = $listPageObject->viewControlsMap;
			foreach($listPageObject->jsSettings['global']['shortTNames'] as $keySet=>$val)
			{
				if(!array_key_exists($keySet,$pageObject->settingsMap["globalSettings"]['shortTNames']))
					$pageObject->settingsMap["globalSettings"]['shortTNames'][$keySet] = $val;
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
	}
	$pageObject->controlsMap['dControlsMap'] = $dControlsMap;
	$pageObject->viewControlsMap['dViewControlsMap'] = $dViewControlsMap; 
	$strTableName = "public.pad_payment";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin prepare for Next Prev button
if(!@$_SESSION[$strTableName."_noNextPrev"] && !$inlineview && !$pdf)
{
	$pageObject->getNextPrevRecordKeys($data,"Search",$next,$prev);
}
//End prepare for Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($pageObject->googleMapCfg['isUseGoogleMap'])
{
	$pageObject->initGmaps();
}

$pageObject->addCommonJs();

//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

if(!$inlineview)
{
	$pageObject->body["begin"].="<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>\r\n";
		$pageObject->body["begin"].= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";		
	
	$pageObject->jsSettings['tableSettings'][$strTableName]["keys"] = $pageObject->jsKeys;
	$pageObject->jsSettings['tableSettings'][$strTableName]['keyFields'] = $pageObject->keyFields;
	$pageObject->jsSettings['tableSettings'][$strTableName]["prevKeys"] = $prev;
	$pageObject->jsSettings['tableSettings'][$strTableName]["nextKeys"] = $next; 
	
	// assign body end
	$pageObject->body['end'] = array();
	$pageObject->body['end']["method"] = "assignBodyEnd";
	$pageObject->body['end']["object"] = &$pageObject;
	
	$xt->assign("body",$pageObject->body);
	$xt->assign("flybody",true);
}
else
{
	$xt->assign("footer",false);
	$xt->assign("header",false);
	$xt->assign("flybody",$pageObject->body);
	$xt->assign("body",true);
	$xt->assign("pdflink_block",false);
	
	$pageObject->fillSetCntrlMaps();
	
	$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
	$returnJSON['viewControlsMap'] = $pageObject->viewControlsHTMLMap;
	$returnJSON['settings'] = $pageObject->jsSettings;
}
$xt->assign("style_block",true);
$xt->assign("stylefiles_block",true);

$editlink="";
$editkeys=array();
	$editkeys["editid1"]=postvalue("editid1");
foreach($editkeys as $key=>$val)
{
	if($editlink)
		$editlink.="&";
	$editlink.=$key."=".$val;
}
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='public_pad_payment_edit.php?".$editlink."'\"");

$strPerm = GetUserPermissions($strTableName);
if(CheckSecurity($ownerIdValue,"Edit") && !$inlineview && strpos($strPerm, "E")!==false)
	$xt->assign("edit_button",true);
else
	$xt->assign("edit_button",false);

if(!$pdf && !$all && !$inlineview)
{
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin show Next Prev button
	$nextlink=$prevlink="";
	if(count($next))
	{
		$xt->assign("next_button",true);
	 		$nextlink .="editid1=".htmlspecialchars(rawurlencode($next[1-1]));
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\"");
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
			$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1-1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\"");
	}
	else 
		$xt->assign("prev_button",false);
//End show Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$xt->assign("back_button",true);
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
}

$oldtemplatefile = $pageObject->templatefile;

if(!$all)
{
	if($eventObj->exists("BeforeShowView"))
	{
		$templatefile = $pageObject->templatefile;
		$eventObj->BeforeShowView($xt,$templatefile,$data, $pageObject);
		$pageObject->templatefile = $templatefile;
	}
	if(!$pdf)
	{
		if(!$inlineview)
			$xt->display($pageObject->templatefile);
		else{
				$xt->load_template($pageObject->templatefile);
				$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('body');
				if(count($pageObject->includes_css))
					$returnJSON['CSSFiles'] = array_unique($pageObject->includes_css);
				if(count($pageObject->includes_cssIE))
					$returnJSON['CSSFilesIE'] = array_unique($pageObject->includes_cssIE);				
				$returnJSON['idStartFrom'] = $id+1;
				$returnJSON["additionalJS"] = $pageObject->grabAllJsFiles();
				echo (my_json_encode($returnJSON)); 
			}
	}
	break;
}
}


?>
