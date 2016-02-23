<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/pad_pad_anggaran_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["pad_pad_anggaran_view"] = $layout;




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
	header("Location: pad_pad_anggaran_list.php?a=return");
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
$arr['fName'] = "rekening_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("rekening_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "status_anggaran";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("status_anggaran");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "target";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("target");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan5";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan5");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan6";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan6");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan7";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan7");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan8";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan8");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan9";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan9");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan10";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan10");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan11";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan11");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan12";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan12");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jumlah";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jumlah");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "created";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("created");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "updated";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("updated");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "create_uid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("create_uid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "update_uid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("update_uid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tahun";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tahun");
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
//rekening_id - 
	
	$value = $pageObject->showDBValue("rekening_id", $data, $keylink);
	if($mainTableOwnerID=="rekening_id")
		$ownerIdValue=$value;
	$xt->assign("rekening_id_value",$value);
	if(!$pageObject->isAppearOnTabs("rekening_id"))
		$xt->assign("rekening_id_fieldblock",true);
	else
		$xt->assign("rekening_id_tabfieldblock",true);
////////////////////////////////////////////
//status_anggaran - Number
	
	$value = $pageObject->showDBValue("status_anggaran", $data, $keylink);
	if($mainTableOwnerID=="status_anggaran")
		$ownerIdValue=$value;
	$xt->assign("status_anggaran_value",$value);
	if(!$pageObject->isAppearOnTabs("status_anggaran"))
		$xt->assign("status_anggaran_fieldblock",true);
	else
		$xt->assign("status_anggaran_tabfieldblock",true);
////////////////////////////////////////////
//target - Number
	
	$value = $pageObject->showDBValue("target", $data, $keylink);
	if($mainTableOwnerID=="target")
		$ownerIdValue=$value;
	$xt->assign("target_value",$value);
	if(!$pageObject->isAppearOnTabs("target"))
		$xt->assign("target_fieldblock",true);
	else
		$xt->assign("target_tabfieldblock",true);
////////////////////////////////////////////
//bulan1 - Number
	
	$value = $pageObject->showDBValue("bulan1", $data, $keylink);
	if($mainTableOwnerID=="bulan1")
		$ownerIdValue=$value;
	$xt->assign("bulan1_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan1"))
		$xt->assign("bulan1_fieldblock",true);
	else
		$xt->assign("bulan1_tabfieldblock",true);
////////////////////////////////////////////
//bulan2 - Number
	
	$value = $pageObject->showDBValue("bulan2", $data, $keylink);
	if($mainTableOwnerID=="bulan2")
		$ownerIdValue=$value;
	$xt->assign("bulan2_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan2"))
		$xt->assign("bulan2_fieldblock",true);
	else
		$xt->assign("bulan2_tabfieldblock",true);
////////////////////////////////////////////
//bulan3 - Number
	
	$value = $pageObject->showDBValue("bulan3", $data, $keylink);
	if($mainTableOwnerID=="bulan3")
		$ownerIdValue=$value;
	$xt->assign("bulan3_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan3"))
		$xt->assign("bulan3_fieldblock",true);
	else
		$xt->assign("bulan3_tabfieldblock",true);
////////////////////////////////////////////
//bulan4 - Number
	
	$value = $pageObject->showDBValue("bulan4", $data, $keylink);
	if($mainTableOwnerID=="bulan4")
		$ownerIdValue=$value;
	$xt->assign("bulan4_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan4"))
		$xt->assign("bulan4_fieldblock",true);
	else
		$xt->assign("bulan4_tabfieldblock",true);
////////////////////////////////////////////
//bulan5 - Number
	
	$value = $pageObject->showDBValue("bulan5", $data, $keylink);
	if($mainTableOwnerID=="bulan5")
		$ownerIdValue=$value;
	$xt->assign("bulan5_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan5"))
		$xt->assign("bulan5_fieldblock",true);
	else
		$xt->assign("bulan5_tabfieldblock",true);
////////////////////////////////////////////
//bulan6 - Number
	
	$value = $pageObject->showDBValue("bulan6", $data, $keylink);
	if($mainTableOwnerID=="bulan6")
		$ownerIdValue=$value;
	$xt->assign("bulan6_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan6"))
		$xt->assign("bulan6_fieldblock",true);
	else
		$xt->assign("bulan6_tabfieldblock",true);
////////////////////////////////////////////
//bulan7 - Number
	
	$value = $pageObject->showDBValue("bulan7", $data, $keylink);
	if($mainTableOwnerID=="bulan7")
		$ownerIdValue=$value;
	$xt->assign("bulan7_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan7"))
		$xt->assign("bulan7_fieldblock",true);
	else
		$xt->assign("bulan7_tabfieldblock",true);
////////////////////////////////////////////
//bulan8 - Number
	
	$value = $pageObject->showDBValue("bulan8", $data, $keylink);
	if($mainTableOwnerID=="bulan8")
		$ownerIdValue=$value;
	$xt->assign("bulan8_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan8"))
		$xt->assign("bulan8_fieldblock",true);
	else
		$xt->assign("bulan8_tabfieldblock",true);
////////////////////////////////////////////
//bulan9 - Number
	
	$value = $pageObject->showDBValue("bulan9", $data, $keylink);
	if($mainTableOwnerID=="bulan9")
		$ownerIdValue=$value;
	$xt->assign("bulan9_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan9"))
		$xt->assign("bulan9_fieldblock",true);
	else
		$xt->assign("bulan9_tabfieldblock",true);
////////////////////////////////////////////
//bulan10 - Number
	
	$value = $pageObject->showDBValue("bulan10", $data, $keylink);
	if($mainTableOwnerID=="bulan10")
		$ownerIdValue=$value;
	$xt->assign("bulan10_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan10"))
		$xt->assign("bulan10_fieldblock",true);
	else
		$xt->assign("bulan10_tabfieldblock",true);
////////////////////////////////////////////
//bulan11 - Number
	
	$value = $pageObject->showDBValue("bulan11", $data, $keylink);
	if($mainTableOwnerID=="bulan11")
		$ownerIdValue=$value;
	$xt->assign("bulan11_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan11"))
		$xt->assign("bulan11_fieldblock",true);
	else
		$xt->assign("bulan11_tabfieldblock",true);
////////////////////////////////////////////
//bulan12 - Number
	
	$value = $pageObject->showDBValue("bulan12", $data, $keylink);
	if($mainTableOwnerID=="bulan12")
		$ownerIdValue=$value;
	$xt->assign("bulan12_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan12"))
		$xt->assign("bulan12_fieldblock",true);
	else
		$xt->assign("bulan12_tabfieldblock",true);
////////////////////////////////////////////
//jumlah - Number
	
	$value = $pageObject->showDBValue("jumlah", $data, $keylink);
	if($mainTableOwnerID=="jumlah")
		$ownerIdValue=$value;
	$xt->assign("jumlah_value",$value);
	if(!$pageObject->isAppearOnTabs("jumlah"))
		$xt->assign("jumlah_fieldblock",true);
	else
		$xt->assign("jumlah_tabfieldblock",true);
////////////////////////////////////////////
//created - Short Date
	
	$value = $pageObject->showDBValue("created", $data, $keylink);
	if($mainTableOwnerID=="created")
		$ownerIdValue=$value;
	$xt->assign("created_value",$value);
	if(!$pageObject->isAppearOnTabs("created"))
		$xt->assign("created_fieldblock",true);
	else
		$xt->assign("created_tabfieldblock",true);
////////////////////////////////////////////
//updated - Short Date
	
	$value = $pageObject->showDBValue("updated", $data, $keylink);
	if($mainTableOwnerID=="updated")
		$ownerIdValue=$value;
	$xt->assign("updated_value",$value);
	if(!$pageObject->isAppearOnTabs("updated"))
		$xt->assign("updated_fieldblock",true);
	else
		$xt->assign("updated_tabfieldblock",true);
////////////////////////////////////////////
//create_uid - 
	
	$value = $pageObject->showDBValue("create_uid", $data, $keylink);
	if($mainTableOwnerID=="create_uid")
		$ownerIdValue=$value;
	$xt->assign("create_uid_value",$value);
	if(!$pageObject->isAppearOnTabs("create_uid"))
		$xt->assign("create_uid_fieldblock",true);
	else
		$xt->assign("create_uid_tabfieldblock",true);
////////////////////////////////////////////
//update_uid - 
	
	$value = $pageObject->showDBValue("update_uid", $data, $keylink);
	if($mainTableOwnerID=="update_uid")
		$ownerIdValue=$value;
	$xt->assign("update_uid_value",$value);
	if(!$pageObject->isAppearOnTabs("update_uid"))
		$xt->assign("update_uid_fieldblock",true);
	else
		$xt->assign("update_uid_tabfieldblock",true);
////////////////////////////////////////////
//tahun - 
	
	$value = $pageObject->showDBValue("tahun", $data, $keylink);
	if($mainTableOwnerID=="tahun")
		$ownerIdValue=$value;
	$xt->assign("tahun_value",$value);
	if(!$pageObject->isAppearOnTabs("tahun"))
		$xt->assign("tahun_fieldblock",true);
	else
		$xt->assign("tahun_tabfieldblock",true);

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
		$options['masterTable'] = "pad.pad_anggaran";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "pad.pad_anggaran";
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
	$strTableName = "pad.pad_anggaran";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='pad_pad_anggaran_edit.php?".$editlink."'\"");

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
