<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/app_users_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["app_users_view"] = $layout;




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
	header("Location: app_users_list.php?a=return");
	exit();
}

$out = "";
$first = true;
$fieldsArr = array();
$arr = array();
$arr['fName'] = "userid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("userid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("nama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "created";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("created");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "disabled";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("disabled");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "passwd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("passwd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_kantor";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_kantor");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_kanwil";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_kanwil");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_tp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_tp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_kanwil_bank";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_kanwil_bank");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_kppbb_bank";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_kppbb_bank");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_bank_tunggal";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_bank_tunggal");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_bank_persepsi";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_bank_persepsi");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "nip";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("nip");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jabatan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jabatan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "handphone";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("handphone");
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
$arr['fName'] = "updated";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("updated");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "last_login";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("last_login");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "is_login";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("is_login");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "is_logout";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("is_logout");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "last_ip";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("last_ip");
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
//userid - 
	
	$value = $pageObject->showDBValue("userid", $data, $keylink);
	if($mainTableOwnerID=="userid")
		$ownerIdValue=$value;
	$xt->assign("userid_value",$value);
	if(!$pageObject->isAppearOnTabs("userid"))
		$xt->assign("userid_fieldblock",true);
	else
		$xt->assign("userid_tabfieldblock",true);
////////////////////////////////////////////
//nama - 
	
	$value = $pageObject->showDBValue("nama", $data, $keylink);
	if($mainTableOwnerID=="nama")
		$ownerIdValue=$value;
	$xt->assign("nama_value",$value);
	if(!$pageObject->isAppearOnTabs("nama"))
		$xt->assign("nama_fieldblock",true);
	else
		$xt->assign("nama_tabfieldblock",true);
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
//disabled - 
	
	$value = $pageObject->showDBValue("disabled", $data, $keylink);
	if($mainTableOwnerID=="disabled")
		$ownerIdValue=$value;
	$xt->assign("disabled_value",$value);
	if(!$pageObject->isAppearOnTabs("disabled"))
		$xt->assign("disabled_fieldblock",true);
	else
		$xt->assign("disabled_tabfieldblock",true);
////////////////////////////////////////////
//passwd - 
	
	$value = $pageObject->showDBValue("passwd", $data, $keylink);
	if($mainTableOwnerID=="passwd")
		$ownerIdValue=$value;
	$xt->assign("passwd_value",$value);
	if(!$pageObject->isAppearOnTabs("passwd"))
		$xt->assign("passwd_fieldblock",true);
	else
		$xt->assign("passwd_tabfieldblock",true);
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
//kd_kantor - 
	
	$value = $pageObject->showDBValue("kd_kantor", $data, $keylink);
	if($mainTableOwnerID=="kd_kantor")
		$ownerIdValue=$value;
	$xt->assign("kd_kantor_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_kantor"))
		$xt->assign("kd_kantor_fieldblock",true);
	else
		$xt->assign("kd_kantor_tabfieldblock",true);
////////////////////////////////////////////
//kd_kanwil - 
	
	$value = $pageObject->showDBValue("kd_kanwil", $data, $keylink);
	if($mainTableOwnerID=="kd_kanwil")
		$ownerIdValue=$value;
	$xt->assign("kd_kanwil_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_kanwil"))
		$xt->assign("kd_kanwil_fieldblock",true);
	else
		$xt->assign("kd_kanwil_tabfieldblock",true);
////////////////////////////////////////////
//kd_tp - 
	
	$value = $pageObject->showDBValue("kd_tp", $data, $keylink);
	if($mainTableOwnerID=="kd_tp")
		$ownerIdValue=$value;
	$xt->assign("kd_tp_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_tp"))
		$xt->assign("kd_tp_fieldblock",true);
	else
		$xt->assign("kd_tp_tabfieldblock",true);
////////////////////////////////////////////
//kd_kanwil_bank - 
	
	$value = $pageObject->showDBValue("kd_kanwil_bank", $data, $keylink);
	if($mainTableOwnerID=="kd_kanwil_bank")
		$ownerIdValue=$value;
	$xt->assign("kd_kanwil_bank_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_kanwil_bank"))
		$xt->assign("kd_kanwil_bank_fieldblock",true);
	else
		$xt->assign("kd_kanwil_bank_tabfieldblock",true);
////////////////////////////////////////////
//kd_kppbb_bank - 
	
	$value = $pageObject->showDBValue("kd_kppbb_bank", $data, $keylink);
	if($mainTableOwnerID=="kd_kppbb_bank")
		$ownerIdValue=$value;
	$xt->assign("kd_kppbb_bank_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_kppbb_bank"))
		$xt->assign("kd_kppbb_bank_fieldblock",true);
	else
		$xt->assign("kd_kppbb_bank_tabfieldblock",true);
////////////////////////////////////////////
//kd_bank_tunggal - 
	
	$value = $pageObject->showDBValue("kd_bank_tunggal", $data, $keylink);
	if($mainTableOwnerID=="kd_bank_tunggal")
		$ownerIdValue=$value;
	$xt->assign("kd_bank_tunggal_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_bank_tunggal"))
		$xt->assign("kd_bank_tunggal_fieldblock",true);
	else
		$xt->assign("kd_bank_tunggal_tabfieldblock",true);
////////////////////////////////////////////
//kd_bank_persepsi - 
	
	$value = $pageObject->showDBValue("kd_bank_persepsi", $data, $keylink);
	if($mainTableOwnerID=="kd_bank_persepsi")
		$ownerIdValue=$value;
	$xt->assign("kd_bank_persepsi_value",$value);
	if(!$pageObject->isAppearOnTabs("kd_bank_persepsi"))
		$xt->assign("kd_bank_persepsi_fieldblock",true);
	else
		$xt->assign("kd_bank_persepsi_tabfieldblock",true);
////////////////////////////////////////////
//nip - 
	
	$value = $pageObject->showDBValue("nip", $data, $keylink);
	if($mainTableOwnerID=="nip")
		$ownerIdValue=$value;
	$xt->assign("nip_value",$value);
	if(!$pageObject->isAppearOnTabs("nip"))
		$xt->assign("nip_fieldblock",true);
	else
		$xt->assign("nip_tabfieldblock",true);
////////////////////////////////////////////
//jabatan - 
	
	$value = $pageObject->showDBValue("jabatan", $data, $keylink);
	if($mainTableOwnerID=="jabatan")
		$ownerIdValue=$value;
	$xt->assign("jabatan_value",$value);
	if(!$pageObject->isAppearOnTabs("jabatan"))
		$xt->assign("jabatan_fieldblock",true);
	else
		$xt->assign("jabatan_tabfieldblock",true);
////////////////////////////////////////////
//handphone - 
	
	$value = $pageObject->showDBValue("handphone", $data, $keylink);
	if($mainTableOwnerID=="handphone")
		$ownerIdValue=$value;
	$xt->assign("handphone_value",$value);
	if(!$pageObject->isAppearOnTabs("handphone"))
		$xt->assign("handphone_fieldblock",true);
	else
		$xt->assign("handphone_tabfieldblock",true);
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
//last_login - Short Date
	
	$value = $pageObject->showDBValue("last_login", $data, $keylink);
	if($mainTableOwnerID=="last_login")
		$ownerIdValue=$value;
	$xt->assign("last_login_value",$value);
	if(!$pageObject->isAppearOnTabs("last_login"))
		$xt->assign("last_login_fieldblock",true);
	else
		$xt->assign("last_login_tabfieldblock",true);
////////////////////////////////////////////
//is_login - 
	
	$value = $pageObject->showDBValue("is_login", $data, $keylink);
	if($mainTableOwnerID=="is_login")
		$ownerIdValue=$value;
	$xt->assign("is_login_value",$value);
	if(!$pageObject->isAppearOnTabs("is_login"))
		$xt->assign("is_login_fieldblock",true);
	else
		$xt->assign("is_login_tabfieldblock",true);
////////////////////////////////////////////
//is_logout - 
	
	$value = $pageObject->showDBValue("is_logout", $data, $keylink);
	if($mainTableOwnerID=="is_logout")
		$ownerIdValue=$value;
	$xt->assign("is_logout_value",$value);
	if(!$pageObject->isAppearOnTabs("is_logout"))
		$xt->assign("is_logout_fieldblock",true);
	else
		$xt->assign("is_logout_tabfieldblock",true);
////////////////////////////////////////////
//last_ip - 
	
	$value = $pageObject->showDBValue("last_ip", $data, $keylink);
	if($mainTableOwnerID=="last_ip")
		$ownerIdValue=$value;
	$xt->assign("last_ip_value",$value);
	if(!$pageObject->isAppearOnTabs("last_ip"))
		$xt->assign("last_ip_fieldblock",true);
	else
		$xt->assign("last_ip_tabfieldblock",true);

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
		$options['masterTable'] = "app.users";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "app.users";
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
	$strTableName = "app.users";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='app_users_edit.php?".$editlink."'\"");

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
