<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/public_ar_payment_detail_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["public_ar_payment_detail_view"] = $layout;




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
	header("Location: public_ar_payment_detail_list.php?a=return");
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
$arr['fName'] = "kode";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kode");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "disabled";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("disabled");
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
$arr['fName'] = "nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("nama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tahun";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tahun");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "amount";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("amount");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ref_kode";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ref_kode");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ref_nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ref_nama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tanggal";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tanggal");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kecamatan_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kecamatan_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kecamatan_nm";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kecamatan_nm");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kelurahan_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kelurahan_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kelurahan_nm";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kelurahan_nm");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "is_kota";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("is_kota");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "sumber_data";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("sumber_data");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "sumber_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("sumber_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "minggu";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("minggu");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hari";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hari");
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
//kode - 
	
	$value = $pageObject->showDBValue("kode", $data, $keylink);
	if($mainTableOwnerID=="kode")
		$ownerIdValue=$value;
	$xt->assign("kode_value",$value);
	if(!$pageObject->isAppearOnTabs("kode"))
		$xt->assign("kode_fieldblock",true);
	else
		$xt->assign("kode_tabfieldblock",true);
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
//tahun - 
	
	$value = $pageObject->showDBValue("tahun", $data, $keylink);
	if($mainTableOwnerID=="tahun")
		$ownerIdValue=$value;
	$xt->assign("tahun_value",$value);
	if(!$pageObject->isAppearOnTabs("tahun"))
		$xt->assign("tahun_fieldblock",true);
	else
		$xt->assign("tahun_tabfieldblock",true);
////////////////////////////////////////////
//amount - 
	
	$value = $pageObject->showDBValue("amount", $data, $keylink);
	if($mainTableOwnerID=="amount")
		$ownerIdValue=$value;
	$xt->assign("amount_value",$value);
	if(!$pageObject->isAppearOnTabs("amount"))
		$xt->assign("amount_fieldblock",true);
	else
		$xt->assign("amount_tabfieldblock",true);
////////////////////////////////////////////
//ref_kode - 
	
	$value = $pageObject->showDBValue("ref_kode", $data, $keylink);
	if($mainTableOwnerID=="ref_kode")
		$ownerIdValue=$value;
	$xt->assign("ref_kode_value",$value);
	if(!$pageObject->isAppearOnTabs("ref_kode"))
		$xt->assign("ref_kode_fieldblock",true);
	else
		$xt->assign("ref_kode_tabfieldblock",true);
////////////////////////////////////////////
//ref_nama - 
	
	$value = $pageObject->showDBValue("ref_nama", $data, $keylink);
	if($mainTableOwnerID=="ref_nama")
		$ownerIdValue=$value;
	$xt->assign("ref_nama_value",$value);
	if(!$pageObject->isAppearOnTabs("ref_nama"))
		$xt->assign("ref_nama_fieldblock",true);
	else
		$xt->assign("ref_nama_tabfieldblock",true);
////////////////////////////////////////////
//tanggal - Short Date
	
	$value = $pageObject->showDBValue("tanggal", $data, $keylink);
	if($mainTableOwnerID=="tanggal")
		$ownerIdValue=$value;
	$xt->assign("tanggal_value",$value);
	if(!$pageObject->isAppearOnTabs("tanggal"))
		$xt->assign("tanggal_fieldblock",true);
	else
		$xt->assign("tanggal_tabfieldblock",true);
////////////////////////////////////////////
//kecamatan_kd - 
	
	$value = $pageObject->showDBValue("kecamatan_kd", $data, $keylink);
	if($mainTableOwnerID=="kecamatan_kd")
		$ownerIdValue=$value;
	$xt->assign("kecamatan_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("kecamatan_kd"))
		$xt->assign("kecamatan_kd_fieldblock",true);
	else
		$xt->assign("kecamatan_kd_tabfieldblock",true);
////////////////////////////////////////////
//kecamatan_nm - 
	
	$value = $pageObject->showDBValue("kecamatan_nm", $data, $keylink);
	if($mainTableOwnerID=="kecamatan_nm")
		$ownerIdValue=$value;
	$xt->assign("kecamatan_nm_value",$value);
	if(!$pageObject->isAppearOnTabs("kecamatan_nm"))
		$xt->assign("kecamatan_nm_fieldblock",true);
	else
		$xt->assign("kecamatan_nm_tabfieldblock",true);
////////////////////////////////////////////
//kelurahan_kd - 
	
	$value = $pageObject->showDBValue("kelurahan_kd", $data, $keylink);
	if($mainTableOwnerID=="kelurahan_kd")
		$ownerIdValue=$value;
	$xt->assign("kelurahan_kd_value",$value);
	if(!$pageObject->isAppearOnTabs("kelurahan_kd"))
		$xt->assign("kelurahan_kd_fieldblock",true);
	else
		$xt->assign("kelurahan_kd_tabfieldblock",true);
////////////////////////////////////////////
//kelurahan_nm - 
	
	$value = $pageObject->showDBValue("kelurahan_nm", $data, $keylink);
	if($mainTableOwnerID=="kelurahan_nm")
		$ownerIdValue=$value;
	$xt->assign("kelurahan_nm_value",$value);
	if(!$pageObject->isAppearOnTabs("kelurahan_nm"))
		$xt->assign("kelurahan_nm_fieldblock",true);
	else
		$xt->assign("kelurahan_nm_tabfieldblock",true);
////////////////////////////////////////////
//is_kota - 
	
	$value = $pageObject->showDBValue("is_kota", $data, $keylink);
	if($mainTableOwnerID=="is_kota")
		$ownerIdValue=$value;
	$xt->assign("is_kota_value",$value);
	if(!$pageObject->isAppearOnTabs("is_kota"))
		$xt->assign("is_kota_fieldblock",true);
	else
		$xt->assign("is_kota_tabfieldblock",true);
////////////////////////////////////////////
//sumber_data - 
	
	$value = $pageObject->showDBValue("sumber_data", $data, $keylink);
	if($mainTableOwnerID=="sumber_data")
		$ownerIdValue=$value;
	$xt->assign("sumber_data_value",$value);
	if(!$pageObject->isAppearOnTabs("sumber_data"))
		$xt->assign("sumber_data_fieldblock",true);
	else
		$xt->assign("sumber_data_tabfieldblock",true);
////////////////////////////////////////////
//sumber_id - 
	
	$value = $pageObject->showDBValue("sumber_id", $data, $keylink);
	if($mainTableOwnerID=="sumber_id")
		$ownerIdValue=$value;
	$xt->assign("sumber_id_value",$value);
	if(!$pageObject->isAppearOnTabs("sumber_id"))
		$xt->assign("sumber_id_fieldblock",true);
	else
		$xt->assign("sumber_id_tabfieldblock",true);
////////////////////////////////////////////
//bulan - 
	
	$value = $pageObject->showDBValue("bulan", $data, $keylink);
	if($mainTableOwnerID=="bulan")
		$ownerIdValue=$value;
	$xt->assign("bulan_value",$value);
	if(!$pageObject->isAppearOnTabs("bulan"))
		$xt->assign("bulan_fieldblock",true);
	else
		$xt->assign("bulan_tabfieldblock",true);
////////////////////////////////////////////
//minggu - 
	
	$value = $pageObject->showDBValue("minggu", $data, $keylink);
	if($mainTableOwnerID=="minggu")
		$ownerIdValue=$value;
	$xt->assign("minggu_value",$value);
	if(!$pageObject->isAppearOnTabs("minggu"))
		$xt->assign("minggu_fieldblock",true);
	else
		$xt->assign("minggu_tabfieldblock",true);
////////////////////////////////////////////
//hari - 
	
	$value = $pageObject->showDBValue("hari", $data, $keylink);
	if($mainTableOwnerID=="hari")
		$ownerIdValue=$value;
	$xt->assign("hari_value",$value);
	if(!$pageObject->isAppearOnTabs("hari"))
		$xt->assign("hari_fieldblock",true);
	else
		$xt->assign("hari_tabfieldblock",true);

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
		$options['masterTable'] = "public.ar_payment_detail";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "public.ar_payment_detail";
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
	$strTableName = "public.ar_payment_detail";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='public_ar_payment_detail_edit.php?".$editlink."'\"");

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
