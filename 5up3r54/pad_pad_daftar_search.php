<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/pad_pad_daftar_variables.php");
include("classes/searchcontrol.php");
include("classes/advancedsearchcontrol.php");
include("classes/panelsearchcontrol.php");
include("classes/searchclause.php");

$sessionPrefix = $strTableName;

//Basic includes js files
$includes="";
// predefined fields num
$predefFieldNum = 0;

$chrt_array=array();
$rpt_array=array();

//	check if logged in
if( (!isLogged() || CheckPermissionsEvent($strTableName, 'S') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search") && !@$chrt_array['status'] && !@$rpt_array['status'])
|| (@$rpt_array['status'] == "private" && @$rpt_array['owner'] != @$_SESSION["UserID"])
|| (@$chrt_array['status'] == "private" && @$chrt_array['owner'] != @$_SESSION["UserID"]) )
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

$layout = new TLayout("search2","RoundedGreen","MobileGreen");
$layout->blocks["top"] = array();
$layout->containers["search"] = array();

$layout->containers["search"][] = array("name"=>"srchheader","block"=>"","substyle"=>2);


$layout->containers["search"][] = array("name"=>"srchconditions","block"=>"conditions_block","substyle"=>1);


$layout->containers["search"][] = array("name"=>"wrapper","block"=>"","substyle"=>1, "container"=>"fields");


$layout->containers["fields"] = array();

$layout->containers["fields"][] = array("name"=>"srchfields","block"=>"","substyle"=>1);


$layout->skins["fields"] = "fields";

$layout->containers["search"][] = array("name"=>"srchbuttons","block"=>"","substyle"=>2);


$layout->skins["search"] = "1";
$layout->blocks["top"][] = "search";$page_layouts["pad_pad_daftar_search"] = $layout;


include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();

// id that used to add to controls names
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;
	
// for usual page show proccess
$mode = SEARCH_SIMPLE;
$templatefile = "pad_pad_daftar_search.htm";

// for ajax query, used when page buffers new control
if(postvalue("mode")=="inlineLoadCtrl"){
	$mode = SEARCH_LOAD_CONTROL;
}	

$timepicker = false;

$params = array();
$params["id"] = $id;
$params["mode"] = $mode;
$params["timepicker"] = $timepicker;
$params['xt'] = &$xt;
$params['templatefile'] = $templatefile;
$params['shortTableName'] = 'pad_pad_daftar';
$params['origTName'] = $strOriginalTableName;
$params['sessionPrefix'] = $sessionPrefix;
$params['tName'] = $strTableName;
$params['includes_js'] = $includes_js;
$params['includes_jsreq'] = $includes_jsreq;
$params['includes_css'] = $includes_css;
$params['locale_info'] = $locale_info;
$params['pageType'] = PAGE_SEARCH;

$pageObject = new RunnerPage($params);

// create reusable searchControl builder instance
$searchControllerId = (postvalue('searchControllerId') ? postvalue('searchControllerId') : $pageObject->id);

//	Before Process event
if($eventObj->exists("BeforeProcessSearch"))
	$eventObj->BeforeProcessSearch($conn, $pageObject);

// add constants and files for simple view
if ($mode==SEARCH_SIMPLE)
{
	$searchControlBuilder = new AdvancedSearchControl($searchControllerId, $strTableName, $pageObject->searchClauseObj, $pageObject);

	// add button events if exist
	$pageObject->addButtonHandlers();

	$includes .="<script language=\"JavaScript\" src=\"include/loadfirst.js\"></script>\r\n";
	//$includes.="<script language=\"JavaScript\" src=\"include/customlabels.js\"></script>\r\n";
		$includes.="<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";	

	// if not simple, this div already exist on page
	if (!isMobile())
		$includes.="<div id=\"search_suggest\" class=\"search_suggest\"></div>";

	// search panel radio button assign
	$searchRadio = $searchControlBuilder->getSearchRadio();
	$xt->assign_section("all_checkbox_label", $searchRadio['all_checkbox_label'][0], $searchRadio['all_checkbox_label'][1]);
	$xt->assign_section("any_checkbox_label", $searchRadio['any_checkbox_label'][0], $searchRadio['any_checkbox_label'][1]);
	$xt->assignbyref("all_checkbox",$searchRadio['all_checkbox']);
	$xt->assignbyref("any_checkbox",$searchRadio['any_checkbox']);
	
	// search fields data
	
	if($pageObject->pSet->getLookupTable("id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("id")] = GetTableURL($pageObject->pSet->getLookupTable("id"));
	
	$pageObject->fillFieldToolTips("id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("id_label","<label for=\"".GetInputElementId("id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("id_label", true);
	
	$xt->assign("id_fieldblock", true);
	$xt->assignbyref("id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("rp"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("rp")] = GetTableURL($pageObject->pSet->getLookupTable("rp"));
	
	$pageObject->fillFieldToolTips("rp");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("rp");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "rp";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("rp_label","<label for=\"".GetInputElementId("rp", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("rp_label", true);
	
	$xt->assign("rp_fieldblock", true);
	$xt->assignbyref("rp_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("rp_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("rp_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_rp", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("rp");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"rp", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"rp", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pb"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pb")] = GetTableURL($pageObject->pSet->getLookupTable("pb"));
	
	$pageObject->fillFieldToolTips("pb");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pb");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pb";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pb_label","<label for=\"".GetInputElementId("pb", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pb_label", true);
	
	$xt->assign("pb_fieldblock", true);
	$xt->assignbyref("pb_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pb_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pb_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pb", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pb");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pb", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pb", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("formno"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("formno")] = GetTableURL($pageObject->pSet->getLookupTable("formno"));
	
	$pageObject->fillFieldToolTips("formno");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("formno");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "formno";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("formno_label","<label for=\"".GetInputElementId("formno", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("formno_label", true);
	
	$xt->assign("formno_fieldblock", true);
	$xt->assignbyref("formno_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("formno_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("formno_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_formno", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("formno");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"formno", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"formno", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("reg_date"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("reg_date")] = GetTableURL($pageObject->pSet->getLookupTable("reg_date"));
	
	$pageObject->fillFieldToolTips("reg_date");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("reg_date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "reg_date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("reg_date_label","<label for=\"".GetInputElementId("reg_date", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("reg_date_label", true);
	
	$xt->assign("reg_date_fieldblock", true);
	$xt->assignbyref("reg_date_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("reg_date_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("reg_date_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_reg_date", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("reg_date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"reg_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"reg_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("customernm"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("customernm")] = GetTableURL($pageObject->pSet->getLookupTable("customernm"));
	
	$pageObject->fillFieldToolTips("customernm");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("customernm");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "customernm";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("customernm_label","<label for=\"".GetInputElementId("customernm", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("customernm_label", true);
	
	$xt->assign("customernm_fieldblock", true);
	$xt->assignbyref("customernm_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("customernm_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("customernm_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_customernm", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("customernm");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"customernm", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"customernm", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kecamatan_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kecamatan_id")] = GetTableURL($pageObject->pSet->getLookupTable("kecamatan_id"));
	
	$pageObject->fillFieldToolTips("kecamatan_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kecamatan_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kecamatan_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kecamatan_id_label","<label for=\"".GetInputElementId("kecamatan_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kecamatan_id_label", true);
	
	$xt->assign("kecamatan_id_fieldblock", true);
	$xt->assignbyref("kecamatan_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kecamatan_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kecamatan_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kecamatan_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kecamatan_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kecamatan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kecamatan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kelurahan_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kelurahan_id")] = GetTableURL($pageObject->pSet->getLookupTable("kelurahan_id"));
	
	$pageObject->fillFieldToolTips("kelurahan_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kelurahan_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kelurahan_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kelurahan_id_label","<label for=\"".GetInputElementId("kelurahan_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kelurahan_id_label", true);
	
	$xt->assign("kelurahan_id_fieldblock", true);
	$xt->assignbyref("kelurahan_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kelurahan_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kelurahan_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kelurahan_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kelurahan_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kelurahan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kelurahan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kabupaten"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kabupaten")] = GetTableURL($pageObject->pSet->getLookupTable("kabupaten"));
	
	$pageObject->fillFieldToolTips("kabupaten");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kabupaten");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kabupaten";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kabupaten_label","<label for=\"".GetInputElementId("kabupaten", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kabupaten_label", true);
	
	$xt->assign("kabupaten_fieldblock", true);
	$xt->assignbyref("kabupaten_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kabupaten_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kabupaten_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kabupaten", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kabupaten");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kabupaten", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kabupaten", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("alamat"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("alamat")] = GetTableURL($pageObject->pSet->getLookupTable("alamat"));
	
	$pageObject->fillFieldToolTips("alamat");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("alamat");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "alamat";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("alamat_label","<label for=\"".GetInputElementId("alamat", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("alamat_label", true);
	
	$xt->assign("alamat_fieldblock", true);
	$xt->assignbyref("alamat_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("alamat_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("alamat_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_alamat", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("alamat");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"alamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"alamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kodepos"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kodepos")] = GetTableURL($pageObject->pSet->getLookupTable("kodepos"));
	
	$pageObject->fillFieldToolTips("kodepos");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kodepos");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kodepos";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kodepos_label","<label for=\"".GetInputElementId("kodepos", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kodepos_label", true);
	
	$xt->assign("kodepos_fieldblock", true);
	$xt->assignbyref("kodepos_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kodepos_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kodepos_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kodepos", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kodepos");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kodepos", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kodepos", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("telphone"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("telphone")] = GetTableURL($pageObject->pSet->getLookupTable("telphone"));
	
	$pageObject->fillFieldToolTips("telphone");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("telphone");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "telphone";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("telphone_label","<label for=\"".GetInputElementId("telphone", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("telphone_label", true);
	
	$xt->assign("telphone_fieldblock", true);
	$xt->assignbyref("telphone_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("telphone_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("telphone_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_telphone", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("telphone");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"telphone", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"telphone", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("wpnama"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("wpnama")] = GetTableURL($pageObject->pSet->getLookupTable("wpnama"));
	
	$pageObject->fillFieldToolTips("wpnama");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("wpnama");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "wpnama";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("wpnama_label","<label for=\"".GetInputElementId("wpnama", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("wpnama_label", true);
	
	$xt->assign("wpnama_fieldblock", true);
	$xt->assignbyref("wpnama_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("wpnama_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("wpnama_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_wpnama", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("wpnama");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpnama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpnama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("wpalamat"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("wpalamat")] = GetTableURL($pageObject->pSet->getLookupTable("wpalamat"));
	
	$pageObject->fillFieldToolTips("wpalamat");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("wpalamat");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "wpalamat";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("wpalamat_label","<label for=\"".GetInputElementId("wpalamat", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("wpalamat_label", true);
	
	$xt->assign("wpalamat_fieldblock", true);
	$xt->assignbyref("wpalamat_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("wpalamat_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("wpalamat_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_wpalamat", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("wpalamat");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpalamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpalamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("wpkelurahan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("wpkelurahan")] = GetTableURL($pageObject->pSet->getLookupTable("wpkelurahan"));
	
	$pageObject->fillFieldToolTips("wpkelurahan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("wpkelurahan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "wpkelurahan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("wpkelurahan_label","<label for=\"".GetInputElementId("wpkelurahan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("wpkelurahan_label", true);
	
	$xt->assign("wpkelurahan_fieldblock", true);
	$xt->assignbyref("wpkelurahan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("wpkelurahan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("wpkelurahan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_wpkelurahan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("wpkelurahan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpkelurahan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpkelurahan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("wpkecamatan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("wpkecamatan")] = GetTableURL($pageObject->pSet->getLookupTable("wpkecamatan"));
	
	$pageObject->fillFieldToolTips("wpkecamatan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("wpkecamatan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "wpkecamatan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("wpkecamatan_label","<label for=\"".GetInputElementId("wpkecamatan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("wpkecamatan_label", true);
	
	$xt->assign("wpkecamatan_fieldblock", true);
	$xt->assignbyref("wpkecamatan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("wpkecamatan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("wpkecamatan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_wpkecamatan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("wpkecamatan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpkecamatan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpkecamatan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("wpkabupaten"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("wpkabupaten")] = GetTableURL($pageObject->pSet->getLookupTable("wpkabupaten"));
	
	$pageObject->fillFieldToolTips("wpkabupaten");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("wpkabupaten");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "wpkabupaten";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("wpkabupaten_label","<label for=\"".GetInputElementId("wpkabupaten", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("wpkabupaten_label", true);
	
	$xt->assign("wpkabupaten_fieldblock", true);
	$xt->assignbyref("wpkabupaten_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("wpkabupaten_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("wpkabupaten_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_wpkabupaten", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("wpkabupaten");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpkabupaten", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpkabupaten", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("wptelp"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("wptelp")] = GetTableURL($pageObject->pSet->getLookupTable("wptelp"));
	
	$pageObject->fillFieldToolTips("wptelp");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("wptelp");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "wptelp";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("wptelp_label","<label for=\"".GetInputElementId("wptelp", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("wptelp_label", true);
	
	$xt->assign("wptelp_fieldblock", true);
	$xt->assignbyref("wptelp_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("wptelp_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("wptelp_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_wptelp", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("wptelp");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wptelp", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wptelp", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("wpkodepos"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("wpkodepos")] = GetTableURL($pageObject->pSet->getLookupTable("wpkodepos"));
	
	$pageObject->fillFieldToolTips("wpkodepos");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("wpkodepos");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "wpkodepos";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("wpkodepos_label","<label for=\"".GetInputElementId("wpkodepos", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("wpkodepos_label", true);
	
	$xt->assign("wpkodepos_fieldblock", true);
	$xt->assignbyref("wpkodepos_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("wpkodepos_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("wpkodepos_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_wpkodepos", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("wpkodepos");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpkodepos", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"wpkodepos", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pnama"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pnama")] = GetTableURL($pageObject->pSet->getLookupTable("pnama"));
	
	$pageObject->fillFieldToolTips("pnama");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pnama");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pnama";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pnama_label","<label for=\"".GetInputElementId("pnama", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pnama_label", true);
	
	$xt->assign("pnama_fieldblock", true);
	$xt->assignbyref("pnama_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pnama_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pnama_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pnama", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pnama");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pnama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pnama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("palamat"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("palamat")] = GetTableURL($pageObject->pSet->getLookupTable("palamat"));
	
	$pageObject->fillFieldToolTips("palamat");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("palamat");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "palamat";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("palamat_label","<label for=\"".GetInputElementId("palamat", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("palamat_label", true);
	
	$xt->assign("palamat_fieldblock", true);
	$xt->assignbyref("palamat_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("palamat_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("palamat_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_palamat", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("palamat");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"palamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"palamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pkelurahan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pkelurahan")] = GetTableURL($pageObject->pSet->getLookupTable("pkelurahan"));
	
	$pageObject->fillFieldToolTips("pkelurahan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pkelurahan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pkelurahan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pkelurahan_label","<label for=\"".GetInputElementId("pkelurahan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pkelurahan_label", true);
	
	$xt->assign("pkelurahan_fieldblock", true);
	$xt->assignbyref("pkelurahan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pkelurahan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pkelurahan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pkelurahan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pkelurahan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pkelurahan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pkelurahan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pkecamatan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pkecamatan")] = GetTableURL($pageObject->pSet->getLookupTable("pkecamatan"));
	
	$pageObject->fillFieldToolTips("pkecamatan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pkecamatan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pkecamatan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pkecamatan_label","<label for=\"".GetInputElementId("pkecamatan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pkecamatan_label", true);
	
	$xt->assign("pkecamatan_fieldblock", true);
	$xt->assignbyref("pkecamatan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pkecamatan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pkecamatan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pkecamatan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pkecamatan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pkecamatan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pkecamatan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pkabupaten"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pkabupaten")] = GetTableURL($pageObject->pSet->getLookupTable("pkabupaten"));
	
	$pageObject->fillFieldToolTips("pkabupaten");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pkabupaten");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pkabupaten";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pkabupaten_label","<label for=\"".GetInputElementId("pkabupaten", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pkabupaten_label", true);
	
	$xt->assign("pkabupaten_fieldblock", true);
	$xt->assignbyref("pkabupaten_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pkabupaten_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pkabupaten_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pkabupaten", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pkabupaten");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pkabupaten", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pkabupaten", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ptelp"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ptelp")] = GetTableURL($pageObject->pSet->getLookupTable("ptelp"));
	
	$pageObject->fillFieldToolTips("ptelp");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ptelp");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ptelp";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ptelp_label","<label for=\"".GetInputElementId("ptelp", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ptelp_label", true);
	
	$xt->assign("ptelp_fieldblock", true);
	$xt->assignbyref("ptelp_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ptelp_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ptelp_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ptelp", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ptelp");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ptelp", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ptelp", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pkodepos"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pkodepos")] = GetTableURL($pageObject->pSet->getLookupTable("pkodepos"));
	
	$pageObject->fillFieldToolTips("pkodepos");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pkodepos");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pkodepos";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pkodepos_label","<label for=\"".GetInputElementId("pkodepos", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pkodepos_label", true);
	
	$xt->assign("pkodepos_fieldblock", true);
	$xt->assignbyref("pkodepos_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pkodepos_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pkodepos_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pkodepos", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pkodepos");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pkodepos", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pkodepos", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin1")] = GetTableURL($pageObject->pSet->getLookupTable("ijin1"));
	
	$pageObject->fillFieldToolTips("ijin1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin1_label","<label for=\"".GetInputElementId("ijin1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin1_label", true);
	
	$xt->assign("ijin1_fieldblock", true);
	$xt->assignbyref("ijin1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin1no"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin1no")] = GetTableURL($pageObject->pSet->getLookupTable("ijin1no"));
	
	$pageObject->fillFieldToolTips("ijin1no");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin1no");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin1no";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin1no_label","<label for=\"".GetInputElementId("ijin1no", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin1no_label", true);
	
	$xt->assign("ijin1no_fieldblock", true);
	$xt->assignbyref("ijin1no_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin1no_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin1no_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin1no", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin1no");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin1no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin1no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin1tgl"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin1tgl")] = GetTableURL($pageObject->pSet->getLookupTable("ijin1tgl"));
	
	$pageObject->fillFieldToolTips("ijin1tgl");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin1tgl");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin1tgl";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin1tgl_label","<label for=\"".GetInputElementId("ijin1tgl", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin1tgl_label", true);
	
	$xt->assign("ijin1tgl_fieldblock", true);
	$xt->assignbyref("ijin1tgl_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin1tgl_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin1tgl_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin1tgl", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin1tgl");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin1tgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin1tgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin1tglakhir"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin1tglakhir")] = GetTableURL($pageObject->pSet->getLookupTable("ijin1tglakhir"));
	
	$pageObject->fillFieldToolTips("ijin1tglakhir");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin1tglakhir");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin1tglakhir";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin1tglakhir_label","<label for=\"".GetInputElementId("ijin1tglakhir", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin1tglakhir_label", true);
	
	$xt->assign("ijin1tglakhir_fieldblock", true);
	$xt->assignbyref("ijin1tglakhir_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin1tglakhir_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin1tglakhir_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin1tglakhir", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin1tglakhir");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin1tglakhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin1tglakhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin2")] = GetTableURL($pageObject->pSet->getLookupTable("ijin2"));
	
	$pageObject->fillFieldToolTips("ijin2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin2_label","<label for=\"".GetInputElementId("ijin2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin2_label", true);
	
	$xt->assign("ijin2_fieldblock", true);
	$xt->assignbyref("ijin2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin2no"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin2no")] = GetTableURL($pageObject->pSet->getLookupTable("ijin2no"));
	
	$pageObject->fillFieldToolTips("ijin2no");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin2no");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin2no";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin2no_label","<label for=\"".GetInputElementId("ijin2no", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin2no_label", true);
	
	$xt->assign("ijin2no_fieldblock", true);
	$xt->assignbyref("ijin2no_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin2no_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin2no_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin2no", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin2no");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin2no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin2no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin2tgl"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin2tgl")] = GetTableURL($pageObject->pSet->getLookupTable("ijin2tgl"));
	
	$pageObject->fillFieldToolTips("ijin2tgl");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin2tgl");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin2tgl";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin2tgl_label","<label for=\"".GetInputElementId("ijin2tgl", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin2tgl_label", true);
	
	$xt->assign("ijin2tgl_fieldblock", true);
	$xt->assignbyref("ijin2tgl_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin2tgl_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin2tgl_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin2tgl", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin2tgl");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin2tgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin2tgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin2tglakhir"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin2tglakhir")] = GetTableURL($pageObject->pSet->getLookupTable("ijin2tglakhir"));
	
	$pageObject->fillFieldToolTips("ijin2tglakhir");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin2tglakhir");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin2tglakhir";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin2tglakhir_label","<label for=\"".GetInputElementId("ijin2tglakhir", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin2tglakhir_label", true);
	
	$xt->assign("ijin2tglakhir_fieldblock", true);
	$xt->assignbyref("ijin2tglakhir_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin2tglakhir_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin2tglakhir_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin2tglakhir", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin2tglakhir");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin2tglakhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin2tglakhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin3")] = GetTableURL($pageObject->pSet->getLookupTable("ijin3"));
	
	$pageObject->fillFieldToolTips("ijin3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin3_label","<label for=\"".GetInputElementId("ijin3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin3_label", true);
	
	$xt->assign("ijin3_fieldblock", true);
	$xt->assignbyref("ijin3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin3no"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin3no")] = GetTableURL($pageObject->pSet->getLookupTable("ijin3no"));
	
	$pageObject->fillFieldToolTips("ijin3no");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin3no");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin3no";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin3no_label","<label for=\"".GetInputElementId("ijin3no", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin3no_label", true);
	
	$xt->assign("ijin3no_fieldblock", true);
	$xt->assignbyref("ijin3no_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin3no_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin3no_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin3no", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin3no");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin3no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin3no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin3tgl"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin3tgl")] = GetTableURL($pageObject->pSet->getLookupTable("ijin3tgl"));
	
	$pageObject->fillFieldToolTips("ijin3tgl");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin3tgl");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin3tgl";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin3tgl_label","<label for=\"".GetInputElementId("ijin3tgl", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin3tgl_label", true);
	
	$xt->assign("ijin3tgl_fieldblock", true);
	$xt->assignbyref("ijin3tgl_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin3tgl_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin3tgl_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin3tgl", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin3tgl");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin3tgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin3tgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin3tglakhir"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin3tglakhir")] = GetTableURL($pageObject->pSet->getLookupTable("ijin3tglakhir"));
	
	$pageObject->fillFieldToolTips("ijin3tglakhir");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin3tglakhir");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin3tglakhir";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin3tglakhir_label","<label for=\"".GetInputElementId("ijin3tglakhir", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin3tglakhir_label", true);
	
	$xt->assign("ijin3tglakhir_fieldblock", true);
	$xt->assignbyref("ijin3tglakhir_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin3tglakhir_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin3tglakhir_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin3tglakhir", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin3tglakhir");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin3tglakhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin3tglakhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin4")] = GetTableURL($pageObject->pSet->getLookupTable("ijin4"));
	
	$pageObject->fillFieldToolTips("ijin4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin4_label","<label for=\"".GetInputElementId("ijin4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin4_label", true);
	
	$xt->assign("ijin4_fieldblock", true);
	$xt->assignbyref("ijin4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin4no"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin4no")] = GetTableURL($pageObject->pSet->getLookupTable("ijin4no"));
	
	$pageObject->fillFieldToolTips("ijin4no");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin4no");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin4no";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin4no_label","<label for=\"".GetInputElementId("ijin4no", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin4no_label", true);
	
	$xt->assign("ijin4no_fieldblock", true);
	$xt->assignbyref("ijin4no_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin4no_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin4no_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin4no", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin4no");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin4no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin4no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin4tgl"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin4tgl")] = GetTableURL($pageObject->pSet->getLookupTable("ijin4tgl"));
	
	$pageObject->fillFieldToolTips("ijin4tgl");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin4tgl");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin4tgl";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin4tgl_label","<label for=\"".GetInputElementId("ijin4tgl", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin4tgl_label", true);
	
	$xt->assign("ijin4tgl_fieldblock", true);
	$xt->assignbyref("ijin4tgl_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin4tgl_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin4tgl_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin4tgl", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin4tgl");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin4tgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin4tgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin4tglakhir"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin4tglakhir")] = GetTableURL($pageObject->pSet->getLookupTable("ijin4tglakhir"));
	
	$pageObject->fillFieldToolTips("ijin4tglakhir");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin4tglakhir");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin4tglakhir";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin4tglakhir_label","<label for=\"".GetInputElementId("ijin4tglakhir", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin4tglakhir_label", true);
	
	$xt->assign("ijin4tglakhir_fieldblock", true);
	$xt->assignbyref("ijin4tglakhir_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin4tglakhir_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin4tglakhir_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin4tglakhir", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin4tglakhir");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin4tglakhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin4tglakhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("enabled"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("enabled")] = GetTableURL($pageObject->pSet->getLookupTable("enabled"));
	
	$pageObject->fillFieldToolTips("enabled");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("enabled");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "enabled";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("enabled_label","<label for=\"".GetInputElementId("enabled", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("enabled_label", true);
	
	$xt->assign("enabled_fieldblock", true);
	$xt->assignbyref("enabled_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("enabled_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("enabled_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_enabled", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("enabled");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"enabled", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"enabled", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("create_date"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("create_date")] = GetTableURL($pageObject->pSet->getLookupTable("create_date"));
	
	$pageObject->fillFieldToolTips("create_date");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("create_date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "create_date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("create_date_label","<label for=\"".GetInputElementId("create_date", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("create_date_label", true);
	
	$xt->assign("create_date_fieldblock", true);
	$xt->assignbyref("create_date_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("create_date_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("create_date_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_create_date", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("create_date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"create_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"create_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("create_uid"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("create_uid")] = GetTableURL($pageObject->pSet->getLookupTable("create_uid"));
	
	$pageObject->fillFieldToolTips("create_uid");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("create_uid");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "create_uid";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("create_uid_label","<label for=\"".GetInputElementId("create_uid", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("create_uid_label", true);
	
	$xt->assign("create_uid_fieldblock", true);
	$xt->assignbyref("create_uid_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("create_uid_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("create_uid_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_create_uid", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("create_uid");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"create_uid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"create_uid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("write_date"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("write_date")] = GetTableURL($pageObject->pSet->getLookupTable("write_date"));
	
	$pageObject->fillFieldToolTips("write_date");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("write_date");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "write_date";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("write_date_label","<label for=\"".GetInputElementId("write_date", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("write_date_label", true);
	
	$xt->assign("write_date_fieldblock", true);
	$xt->assignbyref("write_date_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("write_date_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("write_date_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_write_date", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("write_date");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"write_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"write_date", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("write_uid"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("write_uid")] = GetTableURL($pageObject->pSet->getLookupTable("write_uid"));
	
	$pageObject->fillFieldToolTips("write_uid");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("write_uid");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "write_uid";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("write_uid_label","<label for=\"".GetInputElementId("write_uid", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("write_uid_label", true);
	
	$xt->assign("write_uid_fieldblock", true);
	$xt->assignbyref("write_uid_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("write_uid_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("write_uid_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_write_uid", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("write_uid");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"write_uid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"write_uid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("op_nm"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("op_nm")] = GetTableURL($pageObject->pSet->getLookupTable("op_nm"));
	
	$pageObject->fillFieldToolTips("op_nm");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("op_nm");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "op_nm";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("op_nm_label","<label for=\"".GetInputElementId("op_nm", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("op_nm_label", true);
	
	$xt->assign("op_nm_fieldblock", true);
	$xt->assignbyref("op_nm_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("op_nm_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("op_nm_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_op_nm", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("op_nm");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_nm", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_nm", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("op_alamat"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("op_alamat")] = GetTableURL($pageObject->pSet->getLookupTable("op_alamat"));
	
	$pageObject->fillFieldToolTips("op_alamat");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("op_alamat");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "op_alamat";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("op_alamat_label","<label for=\"".GetInputElementId("op_alamat", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("op_alamat_label", true);
	
	$xt->assign("op_alamat_fieldblock", true);
	$xt->assignbyref("op_alamat_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("op_alamat_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("op_alamat_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_op_alamat", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("op_alamat");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_alamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_alamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("op_usaha_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("op_usaha_id")] = GetTableURL($pageObject->pSet->getLookupTable("op_usaha_id"));
	
	$pageObject->fillFieldToolTips("op_usaha_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("op_usaha_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "op_usaha_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("op_usaha_id_label","<label for=\"".GetInputElementId("op_usaha_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("op_usaha_id_label", true);
	
	$xt->assign("op_usaha_id_fieldblock", true);
	$xt->assignbyref("op_usaha_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("op_usaha_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("op_usaha_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_op_usaha_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("op_usaha_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_usaha_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_usaha_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("op_so"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("op_so")] = GetTableURL($pageObject->pSet->getLookupTable("op_so"));
	
	$pageObject->fillFieldToolTips("op_so");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("op_so");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "op_so";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("op_so_label","<label for=\"".GetInputElementId("op_so", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("op_so_label", true);
	
	$xt->assign("op_so_fieldblock", true);
	$xt->assignbyref("op_so_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("op_so_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("op_so_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_op_so", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("op_so");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_so", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_so", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("op_kecamatan_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("op_kecamatan_id")] = GetTableURL($pageObject->pSet->getLookupTable("op_kecamatan_id"));
	
	$pageObject->fillFieldToolTips("op_kecamatan_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("op_kecamatan_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "op_kecamatan_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("op_kecamatan_id_label","<label for=\"".GetInputElementId("op_kecamatan_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("op_kecamatan_id_label", true);
	
	$xt->assign("op_kecamatan_id_fieldblock", true);
	$xt->assignbyref("op_kecamatan_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("op_kecamatan_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("op_kecamatan_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_op_kecamatan_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("op_kecamatan_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_kecamatan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_kecamatan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("op_kelurahan_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("op_kelurahan_id")] = GetTableURL($pageObject->pSet->getLookupTable("op_kelurahan_id"));
	
	$pageObject->fillFieldToolTips("op_kelurahan_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("op_kelurahan_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "op_kelurahan_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("op_kelurahan_id_label","<label for=\"".GetInputElementId("op_kelurahan_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("op_kelurahan_id_label", true);
	
	$xt->assign("op_kelurahan_id_fieldblock", true);
	$xt->assignbyref("op_kelurahan_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("op_kelurahan_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("op_kelurahan_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_op_kelurahan_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("op_kelurahan_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_kelurahan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_kelurahan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("op_latitude"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("op_latitude")] = GetTableURL($pageObject->pSet->getLookupTable("op_latitude"));
	
	$pageObject->fillFieldToolTips("op_latitude");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("op_latitude");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "op_latitude";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("op_latitude_label","<label for=\"".GetInputElementId("op_latitude", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("op_latitude_label", true);
	
	$xt->assign("op_latitude_fieldblock", true);
	$xt->assignbyref("op_latitude_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("op_latitude_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("op_latitude_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_op_latitude", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("op_latitude");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_latitude", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_latitude", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("op_longitude"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("op_longitude")] = GetTableURL($pageObject->pSet->getLookupTable("op_longitude"));
	
	$pageObject->fillFieldToolTips("op_longitude");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("op_longitude");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "op_longitude";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("op_longitude_label","<label for=\"".GetInputElementId("op_longitude", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("op_longitude_label", true);
	
	$xt->assign("op_longitude_fieldblock", true);
	$xt->assignbyref("op_longitude_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("op_longitude_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("op_longitude_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_op_longitude", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("op_longitude");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_longitude", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_longitude", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_restojmlmeja"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_restojmlmeja")] = GetTableURL($pageObject->pSet->getLookupTable("kd_restojmlmeja"));
	
	$pageObject->fillFieldToolTips("kd_restojmlmeja");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_restojmlmeja");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_restojmlmeja";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_restojmlmeja_label","<label for=\"".GetInputElementId("kd_restojmlmeja", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_restojmlmeja_label", true);
	
	$xt->assign("kd_restojmlmeja_fieldblock", true);
	$xt->assignbyref("kd_restojmlmeja_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_restojmlmeja_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_restojmlmeja_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_restojmlmeja", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_restojmlmeja");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_restojmlmeja", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_restojmlmeja", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_restojmlkursi"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_restojmlkursi")] = GetTableURL($pageObject->pSet->getLookupTable("kd_restojmlkursi"));
	
	$pageObject->fillFieldToolTips("kd_restojmlkursi");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_restojmlkursi");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_restojmlkursi";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_restojmlkursi_label","<label for=\"".GetInputElementId("kd_restojmlkursi", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_restojmlkursi_label", true);
	
	$xt->assign("kd_restojmlkursi_fieldblock", true);
	$xt->assignbyref("kd_restojmlkursi_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_restojmlkursi_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_restojmlkursi_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_restojmlkursi", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_restojmlkursi");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_restojmlkursi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_restojmlkursi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_restojmltamu"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_restojmltamu")] = GetTableURL($pageObject->pSet->getLookupTable("kd_restojmltamu"));
	
	$pageObject->fillFieldToolTips("kd_restojmltamu");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_restojmltamu");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_restojmltamu";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_restojmltamu_label","<label for=\"".GetInputElementId("kd_restojmltamu", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_restojmltamu_label", true);
	
	$xt->assign("kd_restojmltamu_fieldblock", true);
	$xt->assignbyref("kd_restojmltamu_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_restojmltamu_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_restojmltamu_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_restojmltamu", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_restojmltamu");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_restojmltamu", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_restojmltamu", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_filmkursi"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_filmkursi")] = GetTableURL($pageObject->pSet->getLookupTable("kd_filmkursi"));
	
	$pageObject->fillFieldToolTips("kd_filmkursi");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_filmkursi");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_filmkursi";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_filmkursi_label","<label for=\"".GetInputElementId("kd_filmkursi", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_filmkursi_label", true);
	
	$xt->assign("kd_filmkursi_fieldblock", true);
	$xt->assignbyref("kd_filmkursi_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_filmkursi_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_filmkursi_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_filmkursi", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_filmkursi");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_filmkursi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_filmkursi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_filmpertunjukan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_filmpertunjukan")] = GetTableURL($pageObject->pSet->getLookupTable("kd_filmpertunjukan"));
	
	$pageObject->fillFieldToolTips("kd_filmpertunjukan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_filmpertunjukan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_filmpertunjukan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_filmpertunjukan_label","<label for=\"".GetInputElementId("kd_filmpertunjukan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_filmpertunjukan_label", true);
	
	$xt->assign("kd_filmpertunjukan_fieldblock", true);
	$xt->assignbyref("kd_filmpertunjukan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_filmpertunjukan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_filmpertunjukan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_filmpertunjukan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_filmpertunjukan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_filmpertunjukan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_filmpertunjukan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_filmtarif"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_filmtarif")] = GetTableURL($pageObject->pSet->getLookupTable("kd_filmtarif"));
	
	$pageObject->fillFieldToolTips("kd_filmtarif");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_filmtarif");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_filmtarif";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_filmtarif_label","<label for=\"".GetInputElementId("kd_filmtarif", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_filmtarif_label", true);
	
	$xt->assign("kd_filmtarif_fieldblock", true);
	$xt->assignbyref("kd_filmtarif_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_filmtarif_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_filmtarif_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_filmtarif", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_filmtarif");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_filmtarif", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_filmtarif", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_bilyarmeja"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_bilyarmeja")] = GetTableURL($pageObject->pSet->getLookupTable("kd_bilyarmeja"));
	
	$pageObject->fillFieldToolTips("kd_bilyarmeja");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_bilyarmeja");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_bilyarmeja";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_bilyarmeja_label","<label for=\"".GetInputElementId("kd_bilyarmeja", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_bilyarmeja_label", true);
	
	$xt->assign("kd_bilyarmeja_fieldblock", true);
	$xt->assignbyref("kd_bilyarmeja_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_bilyarmeja_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_bilyarmeja_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_bilyarmeja", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_bilyarmeja");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_bilyarmeja", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_bilyarmeja", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_bilyartarif"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_bilyartarif")] = GetTableURL($pageObject->pSet->getLookupTable("kd_bilyartarif"));
	
	$pageObject->fillFieldToolTips("kd_bilyartarif");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_bilyartarif");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_bilyartarif";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_bilyartarif_label","<label for=\"".GetInputElementId("kd_bilyartarif", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_bilyartarif_label", true);
	
	$xt->assign("kd_bilyartarif_fieldblock", true);
	$xt->assignbyref("kd_bilyartarif_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_bilyartarif_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_bilyartarif_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_bilyartarif", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_bilyartarif");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_bilyartarif", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_bilyartarif", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_bilyarkegiatan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_bilyarkegiatan")] = GetTableURL($pageObject->pSet->getLookupTable("kd_bilyarkegiatan"));
	
	$pageObject->fillFieldToolTips("kd_bilyarkegiatan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_bilyarkegiatan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_bilyarkegiatan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_bilyarkegiatan_label","<label for=\"".GetInputElementId("kd_bilyarkegiatan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_bilyarkegiatan_label", true);
	
	$xt->assign("kd_bilyarkegiatan_fieldblock", true);
	$xt->assignbyref("kd_bilyarkegiatan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_bilyarkegiatan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_bilyarkegiatan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_bilyarkegiatan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_bilyarkegiatan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_bilyarkegiatan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_bilyarkegiatan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_diskopengunjung"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_diskopengunjung")] = GetTableURL($pageObject->pSet->getLookupTable("kd_diskopengunjung"));
	
	$pageObject->fillFieldToolTips("kd_diskopengunjung");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_diskopengunjung");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_diskopengunjung";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_diskopengunjung_label","<label for=\"".GetInputElementId("kd_diskopengunjung", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_diskopengunjung_label", true);
	
	$xt->assign("kd_diskopengunjung_fieldblock", true);
	$xt->assignbyref("kd_diskopengunjung_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_diskopengunjung_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_diskopengunjung_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_diskopengunjung", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_diskopengunjung");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_diskopengunjung", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_diskopengunjung", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_diskotarif"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_diskotarif")] = GetTableURL($pageObject->pSet->getLookupTable("kd_diskotarif"));
	
	$pageObject->fillFieldToolTips("kd_diskotarif");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_diskotarif");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_diskotarif";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_diskotarif_label","<label for=\"".GetInputElementId("kd_diskotarif", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_diskotarif_label", true);
	
	$xt->assign("kd_diskotarif_fieldblock", true);
	$xt->assignbyref("kd_diskotarif_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_diskotarif_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_diskotarif_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_diskotarif", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_diskotarif");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_diskotarif", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_diskotarif", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kd_waletvolume"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kd_waletvolume")] = GetTableURL($pageObject->pSet->getLookupTable("kd_waletvolume"));
	
	$pageObject->fillFieldToolTips("kd_waletvolume");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kd_waletvolume");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kd_waletvolume";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kd_waletvolume_label","<label for=\"".GetInputElementId("kd_waletvolume", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kd_waletvolume_label", true);
	
	$xt->assign("kd_waletvolume_fieldblock", true);
	$xt->assignbyref("kd_waletvolume_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kd_waletvolume_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kd_waletvolume_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kd_waletvolume", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kd_waletvolume");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_waletvolume", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kd_waletvolume", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("email"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("email")] = GetTableURL($pageObject->pSet->getLookupTable("email"));
	
	$pageObject->fillFieldToolTips("email");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("email");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "email";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("email_label","<label for=\"".GetInputElementId("email", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("email_label", true);
	
	$xt->assign("email_fieldblock", true);
	$xt->assignbyref("email_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("email_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("email_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_email", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("email");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"email", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"email", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("op_pajak_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("op_pajak_id")] = GetTableURL($pageObject->pSet->getLookupTable("op_pajak_id"));
	
	$pageObject->fillFieldToolTips("op_pajak_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("op_pajak_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "op_pajak_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("op_pajak_id_label","<label for=\"".GetInputElementId("op_pajak_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("op_pajak_id_label", true);
	
	$xt->assign("op_pajak_id_fieldblock", true);
	$xt->assignbyref("op_pajak_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("op_pajak_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("op_pajak_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_op_pajak_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("op_pajak_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_pajak_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"op_pajak_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("npwpd"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("npwpd")] = GetTableURL($pageObject->pSet->getLookupTable("npwpd"));
	
	$pageObject->fillFieldToolTips("npwpd");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("npwpd");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "npwpd";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("npwpd_label","<label for=\"".GetInputElementId("npwpd", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("npwpd_label", true);
	
	$xt->assign("npwpd_fieldblock", true);
	$xt->assignbyref("npwpd_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("npwpd_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("npwpd_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_npwpd", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("npwpd");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"npwpd", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"npwpd", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("passwd"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("passwd")] = GetTableURL($pageObject->pSet->getLookupTable("passwd"));
	
	$pageObject->fillFieldToolTips("passwd");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("passwd");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "passwd";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("passwd_label","<label for=\"".GetInputElementId("passwd", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("passwd_label", true);
	
	$xt->assign("passwd_fieldblock", true);
	$xt->assignbyref("passwd_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("passwd_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("passwd_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_passwd", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("passwd");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"passwd", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"passwd", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	
	//--------------------------------------------------------
	
	$pageObject->body["begin"] .= $includes;
	
	$pageObject->addCommonJs();
	
	$xt->assignbyref("body",$pageObject->body);
	
	$xt->assign("contents_block", true);
	
	$xt->assign("conditions_block",true);
	$xt->assign("search_button",true);
	$xt->assign("reset_button",true);
	$xt->assign("back_button",true);
	
	
	$xt->assign("searchbutton_attrs","id=\"searchButton".$id."\"");
	$xt->assign("resetbutton_attrs","id=\"resetButton".$id."\"");
	$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
	

	// for crosse report 
	
	if (postvalue('axis_x')!=''){
		$xtCrosseElem = "<input type=\"hidden\" id=\"select_group_x\" value=\"".postvalue('axis_x')."\">
						<input type=\"hidden\" id=\"select_group_y\" value=\"".postvalue('axis_y')."\">
						<input type=\"hidden\" id=\"select_data\" value=\"".postvalue('field')."\">
						<input type=\"hidden\" id=\"group_func_hidden\" value=\"".postvalue('group_func')."\">
						";
		$xt->assign("CrossElem",$xtCrosseElem);
	}
	// for crosse report
	if($eventObj->exists("BeforeShowSearch"))
		$eventObj->BeforeShowSearch($xt,$templatefile, $pageObject);
	// load controls for first page loading	
	
	
	$pageObject->fillSetCntrlMaps();
	
	$pageObject->body['end'] .= '<script>';
	$pageObject->body['end'] .= "window.controlsMap = ".my_json_encode($pageObject->controlsHTMLMap).";";
	$pageObject->body['end'] .= "window.viewControlsMap = ".my_json_encode($pageObject->viewControlsHTMLMap).";";
	$pageObject->body['end'] .= "window.settings = ".my_json_encode($pageObject->jsSettings).";";
	$pageObject->body['end'] .= '</script>';
		$pageObject->body['end'] .= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerAll.js\"></script>\r\n";
	$pageObject->body["end"] .= "<script>".$pageObject->PrepareJs()."</script>";
	
	$xt->assignbyref("body",$pageObject->body);
	$xt->display($templatefile);
	exit();	
}
else if($mode==SEARCH_LOAD_CONTROL)
{

	$searchControlBuilder = new PanelSearchControl($searchControllerId, $strTableName, $pageObject->searchClauseObj, $pageObject);
	$ctrlField = postvalue('ctrlField');
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $ctrlField, 0, '', false, true, '', '');	
	
	// build array for encode
	$resArr = array();
	$resArr['control1'] = trim($xt->call_func($ctrlBlockArr['searchcontrol']));
	$resArr['control2'] = trim($xt->call_func($ctrlBlockArr['searchcontrol1']));
	$resArr['comboHtml'] = trim($ctrlBlockArr['searchtype']);
	$resArr['delButt'] = trim($ctrlBlockArr['delCtrlButt']);
	$resArr['delButtId'] =  trim($searchControlBuilder->getDelButtonId($ctrlField, $id));
	$resArr['divInd'] = trim($id);	
	$resArr['fLabel'] = GetFieldLabel(GoodFieldName($strTableName),GoodFieldName($ctrlField));
	$resArr['ctrlMap'] = $pageObject->controlsMap['controls'];
	
	if (postvalue('isNeedSettings') == 'true')
	{
		$pageObject->fillSettings();
		$resArr['settings'] = $pageObject->jsSettings;
	}
	
	// return JSON
	echo my_json_encode($resArr);
	exit();
}

?>
