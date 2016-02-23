<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/pad_pad_spt_variables.php");
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
$layout->blocks["top"][] = "search";$page_layouts["pad_pad_spt_search"] = $layout;


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
$templatefile = "pad_pad_spt_search.htm";

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
$params['shortTableName'] = 'pad_pad_spt';
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
	
	if($pageObject->pSet->getLookupTable("tahun"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("tahun")] = GetTableURL($pageObject->pSet->getLookupTable("tahun"));
	
	$pageObject->fillFieldToolTips("tahun");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("tahun");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "tahun";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("tahun_label","<label for=\"".GetInputElementId("tahun", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("tahun_label", true);
	
	$xt->assign("tahun_fieldblock", true);
	$xt->assignbyref("tahun_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("tahun_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("tahun_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_tahun", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("tahun");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"tahun", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"tahun", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("sptno"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("sptno")] = GetTableURL($pageObject->pSet->getLookupTable("sptno"));
	
	$pageObject->fillFieldToolTips("sptno");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("sptno");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "sptno";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("sptno_label","<label for=\"".GetInputElementId("sptno", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("sptno_label", true);
	
	$xt->assign("sptno_fieldblock", true);
	$xt->assignbyref("sptno_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("sptno_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("sptno_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_sptno", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("sptno");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sptno", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sptno", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("customer_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("customer_id")] = GetTableURL($pageObject->pSet->getLookupTable("customer_id"));
	
	$pageObject->fillFieldToolTips("customer_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("customer_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "customer_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("customer_id_label","<label for=\"".GetInputElementId("customer_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("customer_id_label", true);
	
	$xt->assign("customer_id_fieldblock", true);
	$xt->assignbyref("customer_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("customer_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("customer_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_customer_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("customer_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"customer_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"customer_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("customer_usaha_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("customer_usaha_id")] = GetTableURL($pageObject->pSet->getLookupTable("customer_usaha_id"));
	
	$pageObject->fillFieldToolTips("customer_usaha_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("customer_usaha_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "customer_usaha_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("customer_usaha_id_label","<label for=\"".GetInputElementId("customer_usaha_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("customer_usaha_id_label", true);
	
	$xt->assign("customer_usaha_id_fieldblock", true);
	$xt->assignbyref("customer_usaha_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("customer_usaha_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("customer_usaha_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_customer_usaha_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("customer_usaha_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"customer_usaha_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"customer_usaha_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("rekening_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("rekening_id")] = GetTableURL($pageObject->pSet->getLookupTable("rekening_id"));
	
	$pageObject->fillFieldToolTips("rekening_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("rekening_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "rekening_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("rekening_id_label","<label for=\"".GetInputElementId("rekening_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("rekening_id_label", true);
	
	$xt->assign("rekening_id_fieldblock", true);
	$xt->assignbyref("rekening_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("rekening_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("rekening_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_rekening_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("rekening_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"rekening_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"rekening_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pajak_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pajak_id")] = GetTableURL($pageObject->pSet->getLookupTable("pajak_id"));
	
	$pageObject->fillFieldToolTips("pajak_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pajak_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pajak_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pajak_id_label","<label for=\"".GetInputElementId("pajak_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pajak_id_label", true);
	
	$xt->assign("pajak_id_fieldblock", true);
	$xt->assignbyref("pajak_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pajak_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pajak_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pajak_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pajak_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pajak_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pajak_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("type_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("type_id")] = GetTableURL($pageObject->pSet->getLookupTable("type_id"));
	
	$pageObject->fillFieldToolTips("type_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("type_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "type_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("type_id_label","<label for=\"".GetInputElementId("type_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("type_id_label", true);
	
	$xt->assign("type_id_fieldblock", true);
	$xt->assignbyref("type_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("type_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("type_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_type_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("type_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"type_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"type_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("so"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("so")] = GetTableURL($pageObject->pSet->getLookupTable("so"));
	
	$pageObject->fillFieldToolTips("so");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("so");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "so";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("so_label","<label for=\"".GetInputElementId("so", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("so_label", true);
	
	$xt->assign("so_fieldblock", true);
	$xt->assignbyref("so_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("so_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("so_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_so", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("so");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"so", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"so", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("masadari"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("masadari")] = GetTableURL($pageObject->pSet->getLookupTable("masadari"));
	
	$pageObject->fillFieldToolTips("masadari");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("masadari");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "masadari";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("masadari_label","<label for=\"".GetInputElementId("masadari", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("masadari_label", true);
	
	$xt->assign("masadari_fieldblock", true);
	$xt->assignbyref("masadari_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("masadari_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("masadari_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_masadari", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("masadari");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"masadari", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"masadari", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("masasd"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("masasd")] = GetTableURL($pageObject->pSet->getLookupTable("masasd"));
	
	$pageObject->fillFieldToolTips("masasd");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("masasd");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "masasd";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("masasd_label","<label for=\"".GetInputElementId("masasd", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("masasd_label", true);
	
	$xt->assign("masasd_fieldblock", true);
	$xt->assignbyref("masasd_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("masasd_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("masasd_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_masasd", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("masasd");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"masasd", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"masasd", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("jatuhtempotgl"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("jatuhtempotgl")] = GetTableURL($pageObject->pSet->getLookupTable("jatuhtempotgl"));
	
	$pageObject->fillFieldToolTips("jatuhtempotgl");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("jatuhtempotgl");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "jatuhtempotgl";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("jatuhtempotgl_label","<label for=\"".GetInputElementId("jatuhtempotgl", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("jatuhtempotgl_label", true);
	
	$xt->assign("jatuhtempotgl_fieldblock", true);
	$xt->assignbyref("jatuhtempotgl_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("jatuhtempotgl_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("jatuhtempotgl_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_jatuhtempotgl", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("jatuhtempotgl");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"jatuhtempotgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"jatuhtempotgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_bayarid"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_bayarid")] = GetTableURL($pageObject->pSet->getLookupTable("r_bayarid"));
	
	$pageObject->fillFieldToolTips("r_bayarid");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_bayarid");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_bayarid";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_bayarid_label","<label for=\"".GetInputElementId("r_bayarid", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_bayarid_label", true);
	
	$xt->assign("r_bayarid_fieldblock", true);
	$xt->assignbyref("r_bayarid_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_bayarid_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_bayarid_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_bayarid", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_bayarid");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_bayarid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_bayarid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("minimal_omset"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("minimal_omset")] = GetTableURL($pageObject->pSet->getLookupTable("minimal_omset"));
	
	$pageObject->fillFieldToolTips("minimal_omset");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("minimal_omset");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "minimal_omset";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("minimal_omset_label","<label for=\"".GetInputElementId("minimal_omset", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("minimal_omset_label", true);
	
	$xt->assign("minimal_omset_fieldblock", true);
	$xt->assignbyref("minimal_omset_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("minimal_omset_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("minimal_omset_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_minimal_omset", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("minimal_omset");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"minimal_omset", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"minimal_omset", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("dasar"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("dasar")] = GetTableURL($pageObject->pSet->getLookupTable("dasar"));
	
	$pageObject->fillFieldToolTips("dasar");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("dasar");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "dasar";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("dasar_label","<label for=\"".GetInputElementId("dasar", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("dasar_label", true);
	
	$xt->assign("dasar_fieldblock", true);
	$xt->assignbyref("dasar_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("dasar_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("dasar_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_dasar", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("dasar");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"dasar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"dasar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("tarif"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("tarif")] = GetTableURL($pageObject->pSet->getLookupTable("tarif"));
	
	$pageObject->fillFieldToolTips("tarif");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("tarif");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "tarif";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("tarif_label","<label for=\"".GetInputElementId("tarif", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("tarif_label", true);
	
	$xt->assign("tarif_fieldblock", true);
	$xt->assignbyref("tarif_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("tarif_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("tarif_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_tarif", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("tarif");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"tarif", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"tarif", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("denda"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("denda")] = GetTableURL($pageObject->pSet->getLookupTable("denda"));
	
	$pageObject->fillFieldToolTips("denda");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("denda");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "denda";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("denda_label","<label for=\"".GetInputElementId("denda", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("denda_label", true);
	
	$xt->assign("denda_fieldblock", true);
	$xt->assignbyref("denda_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("denda_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("denda_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_denda", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("denda");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"denda", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"denda", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("bunga"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("bunga")] = GetTableURL($pageObject->pSet->getLookupTable("bunga"));
	
	$pageObject->fillFieldToolTips("bunga");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("bunga");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "bunga";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("bunga_label","<label for=\"".GetInputElementId("bunga", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("bunga_label", true);
	
	$xt->assign("bunga_fieldblock", true);
	$xt->assignbyref("bunga_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("bunga_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("bunga_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_bunga", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("bunga");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"bunga", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"bunga", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("setoran"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("setoran")] = GetTableURL($pageObject->pSet->getLookupTable("setoran"));
	
	$pageObject->fillFieldToolTips("setoran");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("setoran");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "setoran";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("setoran_label","<label for=\"".GetInputElementId("setoran", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("setoran_label", true);
	
	$xt->assign("setoran_fieldblock", true);
	$xt->assignbyref("setoran_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("setoran_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("setoran_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_setoran", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("setoran");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"setoran", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"setoran", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kenaikan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kenaikan")] = GetTableURL($pageObject->pSet->getLookupTable("kenaikan"));
	
	$pageObject->fillFieldToolTips("kenaikan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kenaikan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kenaikan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kenaikan_label","<label for=\"".GetInputElementId("kenaikan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kenaikan_label", true);
	
	$xt->assign("kenaikan_fieldblock", true);
	$xt->assignbyref("kenaikan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kenaikan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kenaikan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kenaikan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kenaikan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kenaikan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kenaikan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kompensasi"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kompensasi")] = GetTableURL($pageObject->pSet->getLookupTable("kompensasi"));
	
	$pageObject->fillFieldToolTips("kompensasi");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kompensasi");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kompensasi";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kompensasi_label","<label for=\"".GetInputElementId("kompensasi", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kompensasi_label", true);
	
	$xt->assign("kompensasi_fieldblock", true);
	$xt->assignbyref("kompensasi_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kompensasi_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kompensasi_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kompensasi", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kompensasi");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kompensasi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kompensasi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("lain2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("lain2")] = GetTableURL($pageObject->pSet->getLookupTable("lain2"));
	
	$pageObject->fillFieldToolTips("lain2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("lain2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "lain2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("lain2_label","<label for=\"".GetInputElementId("lain2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("lain2_label", true);
	
	$xt->assign("lain2_fieldblock", true);
	$xt->assignbyref("lain2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("lain2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("lain2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_lain2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("lain2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"lain2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"lain2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("pajak_terhutang"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("pajak_terhutang")] = GetTableURL($pageObject->pSet->getLookupTable("pajak_terhutang"));
	
	$pageObject->fillFieldToolTips("pajak_terhutang");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("pajak_terhutang");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pajak_terhutang";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("pajak_terhutang_label","<label for=\"".GetInputElementId("pajak_terhutang", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("pajak_terhutang_label", true);
	
	$xt->assign("pajak_terhutang_fieldblock", true);
	$xt->assignbyref("pajak_terhutang_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("pajak_terhutang_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("pajak_terhutang_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_pajak_terhutang", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("pajak_terhutang");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pajak_terhutang", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"pajak_terhutang", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("air_manfaat_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("air_manfaat_id")] = GetTableURL($pageObject->pSet->getLookupTable("air_manfaat_id"));
	
	$pageObject->fillFieldToolTips("air_manfaat_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("air_manfaat_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "air_manfaat_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("air_manfaat_id_label","<label for=\"".GetInputElementId("air_manfaat_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("air_manfaat_id_label", true);
	
	$xt->assign("air_manfaat_id_fieldblock", true);
	$xt->assignbyref("air_manfaat_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("air_manfaat_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("air_manfaat_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_air_manfaat_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("air_manfaat_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"air_manfaat_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"air_manfaat_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("air_zona_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("air_zona_id")] = GetTableURL($pageObject->pSet->getLookupTable("air_zona_id"));
	
	$pageObject->fillFieldToolTips("air_zona_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("air_zona_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "air_zona_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("air_zona_id_label","<label for=\"".GetInputElementId("air_zona_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("air_zona_id_label", true);
	
	$xt->assign("air_zona_id_fieldblock", true);
	$xt->assignbyref("air_zona_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("air_zona_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("air_zona_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_air_zona_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("air_zona_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"air_zona_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"air_zona_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("meteran_awal"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("meteran_awal")] = GetTableURL($pageObject->pSet->getLookupTable("meteran_awal"));
	
	$pageObject->fillFieldToolTips("meteran_awal");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("meteran_awal");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "meteran_awal";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("meteran_awal_label","<label for=\"".GetInputElementId("meteran_awal", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("meteran_awal_label", true);
	
	$xt->assign("meteran_awal_fieldblock", true);
	$xt->assignbyref("meteran_awal_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("meteran_awal_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("meteran_awal_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_meteran_awal", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("meteran_awal");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"meteran_awal", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"meteran_awal", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("meteran_akhir"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("meteran_akhir")] = GetTableURL($pageObject->pSet->getLookupTable("meteran_akhir"));
	
	$pageObject->fillFieldToolTips("meteran_akhir");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("meteran_akhir");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "meteran_akhir";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("meteran_akhir_label","<label for=\"".GetInputElementId("meteran_akhir", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("meteran_akhir_label", true);
	
	$xt->assign("meteran_akhir_fieldblock", true);
	$xt->assignbyref("meteran_akhir_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("meteran_akhir_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("meteran_akhir_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_meteran_akhir", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("meteran_akhir");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"meteran_akhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"meteran_akhir", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("volume"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("volume")] = GetTableURL($pageObject->pSet->getLookupTable("volume"));
	
	$pageObject->fillFieldToolTips("volume");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("volume");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "volume";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("volume_label","<label for=\"".GetInputElementId("volume", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("volume_label", true);
	
	$xt->assign("volume_fieldblock", true);
	$xt->assignbyref("volume_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("volume_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("volume_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_volume", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("volume");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"volume", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"volume", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("satuan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("satuan")] = GetTableURL($pageObject->pSet->getLookupTable("satuan"));
	
	$pageObject->fillFieldToolTips("satuan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("satuan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "satuan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("satuan_label","<label for=\"".GetInputElementId("satuan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("satuan_label", true);
	
	$xt->assign("satuan_fieldblock", true);
	$xt->assignbyref("satuan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("satuan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("satuan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_satuan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("satuan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"satuan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"satuan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_panjang"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_panjang")] = GetTableURL($pageObject->pSet->getLookupTable("r_panjang"));
	
	$pageObject->fillFieldToolTips("r_panjang");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_panjang");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_panjang";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_panjang_label","<label for=\"".GetInputElementId("r_panjang", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_panjang_label", true);
	
	$xt->assign("r_panjang_fieldblock", true);
	$xt->assignbyref("r_panjang_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_panjang_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_panjang_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_panjang", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_panjang");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_panjang", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_panjang", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_lebar"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_lebar")] = GetTableURL($pageObject->pSet->getLookupTable("r_lebar"));
	
	$pageObject->fillFieldToolTips("r_lebar");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_lebar");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_lebar";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_lebar_label","<label for=\"".GetInputElementId("r_lebar", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_lebar_label", true);
	
	$xt->assign("r_lebar_fieldblock", true);
	$xt->assignbyref("r_lebar_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_lebar_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_lebar_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_lebar", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_lebar");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lebar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lebar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_muka"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_muka")] = GetTableURL($pageObject->pSet->getLookupTable("r_muka"));
	
	$pageObject->fillFieldToolTips("r_muka");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_muka");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_muka";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_muka_label","<label for=\"".GetInputElementId("r_muka", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_muka_label", true);
	
	$xt->assign("r_muka_fieldblock", true);
	$xt->assignbyref("r_muka_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_muka_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_muka_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_muka", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_muka");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_muka", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_muka", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_banyak"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_banyak")] = GetTableURL($pageObject->pSet->getLookupTable("r_banyak"));
	
	$pageObject->fillFieldToolTips("r_banyak");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_banyak");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_banyak";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_banyak_label","<label for=\"".GetInputElementId("r_banyak", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_banyak_label", true);
	
	$xt->assign("r_banyak_fieldblock", true);
	$xt->assignbyref("r_banyak_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_banyak_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_banyak_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_banyak", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_banyak");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_banyak", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_banyak", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_luas"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_luas")] = GetTableURL($pageObject->pSet->getLookupTable("r_luas"));
	
	$pageObject->fillFieldToolTips("r_luas");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_luas");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_luas";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_luas_label","<label for=\"".GetInputElementId("r_luas", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_luas_label", true);
	
	$xt->assign("r_luas_fieldblock", true);
	$xt->assignbyref("r_luas_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_luas_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_luas_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_luas", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_luas");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_luas", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_luas", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_tarifid"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_tarifid")] = GetTableURL($pageObject->pSet->getLookupTable("r_tarifid"));
	
	$pageObject->fillFieldToolTips("r_tarifid");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_tarifid");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_tarifid";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_tarifid_label","<label for=\"".GetInputElementId("r_tarifid", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_tarifid_label", true);
	
	$xt->assign("r_tarifid_fieldblock", true);
	$xt->assignbyref("r_tarifid_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_tarifid_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_tarifid_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_tarifid", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_tarifid");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_tarifid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_tarifid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_kontrak"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_kontrak")] = GetTableURL($pageObject->pSet->getLookupTable("r_kontrak"));
	
	$pageObject->fillFieldToolTips("r_kontrak");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_kontrak");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_kontrak";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_kontrak_label","<label for=\"".GetInputElementId("r_kontrak", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_kontrak_label", true);
	
	$xt->assign("r_kontrak_fieldblock", true);
	$xt->assignbyref("r_kontrak_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_kontrak_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_kontrak_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_kontrak", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_kontrak");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_kontrak", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_kontrak", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_lama"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_lama")] = GetTableURL($pageObject->pSet->getLookupTable("r_lama"));
	
	$pageObject->fillFieldToolTips("r_lama");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_lama");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_lama";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_lama_label","<label for=\"".GetInputElementId("r_lama", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_lama_label", true);
	
	$xt->assign("r_lama_fieldblock", true);
	$xt->assignbyref("r_lama_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_lama_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_lama_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_lama", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_lama");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_jalan_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_jalan_id")] = GetTableURL($pageObject->pSet->getLookupTable("r_jalan_id"));
	
	$pageObject->fillFieldToolTips("r_jalan_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_jalan_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_jalan_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_jalan_id_label","<label for=\"".GetInputElementId("r_jalan_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_jalan_id_label", true);
	
	$xt->assign("r_jalan_id_fieldblock", true);
	$xt->assignbyref("r_jalan_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_jalan_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_jalan_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_jalan_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_jalan_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_jalan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_jalan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_jalanklas_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_jalanklas_id")] = GetTableURL($pageObject->pSet->getLookupTable("r_jalanklas_id"));
	
	$pageObject->fillFieldToolTips("r_jalanklas_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_jalanklas_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_jalanklas_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_jalanklas_id_label","<label for=\"".GetInputElementId("r_jalanklas_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_jalanklas_id_label", true);
	
	$xt->assign("r_jalanklas_id_fieldblock", true);
	$xt->assignbyref("r_jalanklas_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_jalanklas_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_jalanklas_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_jalanklas_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_jalanklas_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_jalanklas_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_jalanklas_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_lokasi"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_lokasi")] = GetTableURL($pageObject->pSet->getLookupTable("r_lokasi"));
	
	$pageObject->fillFieldToolTips("r_lokasi");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_lokasi");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_lokasi";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_label","<label for=\"".GetInputElementId("r_lokasi", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_lokasi_label", true);
	
	$xt->assign("r_lokasi_fieldblock", true);
	$xt->assignbyref("r_lokasi_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_lokasi_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_lokasi_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_lokasi", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_lokasi");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lokasi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lokasi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_judul"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_judul")] = GetTableURL($pageObject->pSet->getLookupTable("r_judul"));
	
	$pageObject->fillFieldToolTips("r_judul");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_judul");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_judul";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_judul_label","<label for=\"".GetInputElementId("r_judul", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_judul_label", true);
	
	$xt->assign("r_judul_fieldblock", true);
	$xt->assignbyref("r_judul_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_judul_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_judul_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_judul", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_judul");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_judul", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_judul", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_kelurahan_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_kelurahan_id")] = GetTableURL($pageObject->pSet->getLookupTable("r_kelurahan_id"));
	
	$pageObject->fillFieldToolTips("r_kelurahan_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_kelurahan_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_kelurahan_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_kelurahan_id_label","<label for=\"".GetInputElementId("r_kelurahan_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_kelurahan_id_label", true);
	
	$xt->assign("r_kelurahan_id_fieldblock", true);
	$xt->assignbyref("r_kelurahan_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_kelurahan_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_kelurahan_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_kelurahan_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_kelurahan_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_kelurahan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_kelurahan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_lokasi_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_lokasi_id")] = GetTableURL($pageObject->pSet->getLookupTable("r_lokasi_id"));
	
	$pageObject->fillFieldToolTips("r_lokasi_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_lokasi_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_lokasi_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_id_label","<label for=\"".GetInputElementId("r_lokasi_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_lokasi_id_label", true);
	
	$xt->assign("r_lokasi_id_fieldblock", true);
	$xt->assignbyref("r_lokasi_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_lokasi_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_lokasi_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_lokasi_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_lokasi_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lokasi_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lokasi_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_calculated"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_calculated")] = GetTableURL($pageObject->pSet->getLookupTable("r_calculated"));
	
	$pageObject->fillFieldToolTips("r_calculated");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_calculated");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_calculated";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_calculated_label","<label for=\"".GetInputElementId("r_calculated", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_calculated_label", true);
	
	$xt->assign("r_calculated_fieldblock", true);
	$xt->assignbyref("r_calculated_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_calculated_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_calculated_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_calculated", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_calculated");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_calculated", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_calculated", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_nsr"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_nsr")] = GetTableURL($pageObject->pSet->getLookupTable("r_nsr"));
	
	$pageObject->fillFieldToolTips("r_nsr");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_nsr");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_nsr";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_nsr_label","<label for=\"".GetInputElementId("r_nsr", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_nsr_label", true);
	
	$xt->assign("r_nsr_fieldblock", true);
	$xt->assignbyref("r_nsr_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_nsr_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_nsr_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_nsr", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_nsr");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsr", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsr", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_nsrno"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_nsrno")] = GetTableURL($pageObject->pSet->getLookupTable("r_nsrno"));
	
	$pageObject->fillFieldToolTips("r_nsrno");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_nsrno");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_nsrno";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_nsrno_label","<label for=\"".GetInputElementId("r_nsrno", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_nsrno_label", true);
	
	$xt->assign("r_nsrno_fieldblock", true);
	$xt->assignbyref("r_nsrno_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_nsrno_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_nsrno_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_nsrno", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_nsrno");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsrno", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsrno", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_nsrtgl"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_nsrtgl")] = GetTableURL($pageObject->pSet->getLookupTable("r_nsrtgl"));
	
	$pageObject->fillFieldToolTips("r_nsrtgl");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_nsrtgl");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_nsrtgl";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_nsrtgl_label","<label for=\"".GetInputElementId("r_nsrtgl", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_nsrtgl_label", true);
	
	$xt->assign("r_nsrtgl_fieldblock", true);
	$xt->assignbyref("r_nsrtgl_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_nsrtgl_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_nsrtgl_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_nsrtgl", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_nsrtgl");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsrtgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsrtgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_nsl_kecamatan_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_nsl_kecamatan_id")] = GetTableURL($pageObject->pSet->getLookupTable("r_nsl_kecamatan_id"));
	
	$pageObject->fillFieldToolTips("r_nsl_kecamatan_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_nsl_kecamatan_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_nsl_kecamatan_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_nsl_kecamatan_id_label","<label for=\"".GetInputElementId("r_nsl_kecamatan_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_nsl_kecamatan_id_label", true);
	
	$xt->assign("r_nsl_kecamatan_id_fieldblock", true);
	$xt->assignbyref("r_nsl_kecamatan_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_nsl_kecamatan_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_nsl_kecamatan_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_nsl_kecamatan_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_nsl_kecamatan_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsl_kecamatan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsl_kecamatan_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_nsl_type_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_nsl_type_id")] = GetTableURL($pageObject->pSet->getLookupTable("r_nsl_type_id"));
	
	$pageObject->fillFieldToolTips("r_nsl_type_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_nsl_type_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_nsl_type_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_nsl_type_id_label","<label for=\"".GetInputElementId("r_nsl_type_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_nsl_type_id_label", true);
	
	$xt->assign("r_nsl_type_id_fieldblock", true);
	$xt->assignbyref("r_nsl_type_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_nsl_type_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_nsl_type_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_nsl_type_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_nsl_type_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsl_type_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsl_type_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_nsl_nilai"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_nsl_nilai")] = GetTableURL($pageObject->pSet->getLookupTable("r_nsl_nilai"));
	
	$pageObject->fillFieldToolTips("r_nsl_nilai");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_nsl_nilai");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_nsl_nilai";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_nsl_nilai_label","<label for=\"".GetInputElementId("r_nsl_nilai", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_nsl_nilai_label", true);
	
	$xt->assign("r_nsl_nilai_fieldblock", true);
	$xt->assignbyref("r_nsl_nilai_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_nsl_nilai_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_nsl_nilai_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_nsl_nilai", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_nsl_nilai");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsl_nilai", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsl_nilai", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("notes"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("notes")] = GetTableURL($pageObject->pSet->getLookupTable("notes"));
	
	$pageObject->fillFieldToolTips("notes");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("notes");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "notes";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("notes_label","<label for=\"".GetInputElementId("notes", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("notes_label", true);
	
	$xt->assign("notes_fieldblock", true);
	$xt->assignbyref("notes_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("notes_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("notes_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_notes", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("notes");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"notes", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"notes", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("unit_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("unit_id")] = GetTableURL($pageObject->pSet->getLookupTable("unit_id"));
	
	$pageObject->fillFieldToolTips("unit_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("unit_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "unit_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("unit_id_label","<label for=\"".GetInputElementId("unit_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("unit_id_label", true);
	
	$xt->assign("unit_id_fieldblock", true);
	$xt->assignbyref("unit_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("unit_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("unit_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_unit_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("unit_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"unit_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"unit_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
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
	
	if($pageObject->pSet->getLookupTable("created"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("created")] = GetTableURL($pageObject->pSet->getLookupTable("created"));
	
	$pageObject->fillFieldToolTips("created");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("created");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "created";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("created_label","<label for=\"".GetInputElementId("created", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("created_label", true);
	
	$xt->assign("created_fieldblock", true);
	$xt->assignbyref("created_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("created_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("created_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_created", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("created");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"created", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"created", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
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
	
	if($pageObject->pSet->getLookupTable("updated"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("updated")] = GetTableURL($pageObject->pSet->getLookupTable("updated"));
	
	$pageObject->fillFieldToolTips("updated");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("updated");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "updated";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("updated_label","<label for=\"".GetInputElementId("updated", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("updated_label", true);
	
	$xt->assign("updated_fieldblock", true);
	$xt->assignbyref("updated_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("updated_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("updated_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_updated", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("updated");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"updated", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"updated", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("update_uid"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("update_uid")] = GetTableURL($pageObject->pSet->getLookupTable("update_uid"));
	
	$pageObject->fillFieldToolTips("update_uid");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("update_uid");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "update_uid";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("update_uid_label","<label for=\"".GetInputElementId("update_uid", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("update_uid_label", true);
	
	$xt->assign("update_uid_fieldblock", true);
	$xt->assignbyref("update_uid_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("update_uid_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("update_uid_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_update_uid", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("update_uid");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"update_uid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"update_uid", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("terimanip"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("terimanip")] = GetTableURL($pageObject->pSet->getLookupTable("terimanip"));
	
	$pageObject->fillFieldToolTips("terimanip");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("terimanip");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "terimanip";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("terimanip_label","<label for=\"".GetInputElementId("terimanip", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("terimanip_label", true);
	
	$xt->assign("terimanip_fieldblock", true);
	$xt->assignbyref("terimanip_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("terimanip_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("terimanip_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_terimanip", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("terimanip");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"terimanip", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"terimanip", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("terimatgl"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("terimatgl")] = GetTableURL($pageObject->pSet->getLookupTable("terimatgl"));
	
	$pageObject->fillFieldToolTips("terimatgl");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("terimatgl");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "terimatgl";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("terimatgl_label","<label for=\"".GetInputElementId("terimatgl", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("terimatgl_label", true);
	
	$xt->assign("terimatgl_fieldblock", true);
	$xt->assignbyref("terimatgl_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("terimatgl_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("terimatgl_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_terimatgl", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("terimatgl");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"terimatgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"terimatgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kirimtgl"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kirimtgl")] = GetTableURL($pageObject->pSet->getLookupTable("kirimtgl"));
	
	$pageObject->fillFieldToolTips("kirimtgl");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kirimtgl");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kirimtgl";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kirimtgl_label","<label for=\"".GetInputElementId("kirimtgl", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kirimtgl_label", true);
	
	$xt->assign("kirimtgl_fieldblock", true);
	$xt->assignbyref("kirimtgl_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kirimtgl_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kirimtgl_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kirimtgl", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kirimtgl");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kirimtgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kirimtgl", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("isprint_dc"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("isprint_dc")] = GetTableURL($pageObject->pSet->getLookupTable("isprint_dc"));
	
	$pageObject->fillFieldToolTips("isprint_dc");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("isprint_dc");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "isprint_dc";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("isprint_dc_label","<label for=\"".GetInputElementId("isprint_dc", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("isprint_dc_label", true);
	
	$xt->assign("isprint_dc_fieldblock", true);
	$xt->assignbyref("isprint_dc_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("isprint_dc_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("isprint_dc_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_isprint_dc", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("isprint_dc");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"isprint_dc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"isprint_dc", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_nsr_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_nsr_id")] = GetTableURL($pageObject->pSet->getLookupTable("r_nsr_id"));
	
	$pageObject->fillFieldToolTips("r_nsr_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_nsr_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_nsr_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_nsr_id_label","<label for=\"".GetInputElementId("r_nsr_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_nsr_id_label", true);
	
	$xt->assign("r_nsr_id_fieldblock", true);
	$xt->assignbyref("r_nsr_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_nsr_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_nsr_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_nsr_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_nsr_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsr_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nsr_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_lokasi_pasang_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_lokasi_pasang_id")] = GetTableURL($pageObject->pSet->getLookupTable("r_lokasi_pasang_id"));
	
	$pageObject->fillFieldToolTips("r_lokasi_pasang_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_lokasi_pasang_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_lokasi_pasang_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_pasang_id_label","<label for=\"".GetInputElementId("r_lokasi_pasang_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_lokasi_pasang_id_label", true);
	
	$xt->assign("r_lokasi_pasang_id_fieldblock", true);
	$xt->assignbyref("r_lokasi_pasang_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_lokasi_pasang_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_lokasi_pasang_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_lokasi_pasang_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_lokasi_pasang_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lokasi_pasang_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lokasi_pasang_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_lokasi_pasang_val"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_lokasi_pasang_val")] = GetTableURL($pageObject->pSet->getLookupTable("r_lokasi_pasang_val"));
	
	$pageObject->fillFieldToolTips("r_lokasi_pasang_val");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_lokasi_pasang_val");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_lokasi_pasang_val";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_lokasi_pasang_val_label","<label for=\"".GetInputElementId("r_lokasi_pasang_val", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_lokasi_pasang_val_label", true);
	
	$xt->assign("r_lokasi_pasang_val_fieldblock", true);
	$xt->assignbyref("r_lokasi_pasang_val_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_lokasi_pasang_val_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_lokasi_pasang_val_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_lokasi_pasang_val", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_lokasi_pasang_val");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lokasi_pasang_val", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_lokasi_pasang_val", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_jalanklas_val"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_jalanklas_val")] = GetTableURL($pageObject->pSet->getLookupTable("r_jalanklas_val"));
	
	$pageObject->fillFieldToolTips("r_jalanklas_val");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_jalanklas_val");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_jalanklas_val";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_jalanklas_val_label","<label for=\"".GetInputElementId("r_jalanklas_val", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_jalanklas_val_label", true);
	
	$xt->assign("r_jalanklas_val_fieldblock", true);
	$xt->assignbyref("r_jalanklas_val_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_jalanklas_val_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_jalanklas_val_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_jalanklas_val", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_jalanklas_val");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_jalanklas_val", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_jalanklas_val", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_sudut_pandang_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_sudut_pandang_id")] = GetTableURL($pageObject->pSet->getLookupTable("r_sudut_pandang_id"));
	
	$pageObject->fillFieldToolTips("r_sudut_pandang_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_sudut_pandang_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_sudut_pandang_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_sudut_pandang_id_label","<label for=\"".GetInputElementId("r_sudut_pandang_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_sudut_pandang_id_label", true);
	
	$xt->assign("r_sudut_pandang_id_fieldblock", true);
	$xt->assignbyref("r_sudut_pandang_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_sudut_pandang_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_sudut_pandang_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_sudut_pandang_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_sudut_pandang_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_sudut_pandang_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_sudut_pandang_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_sudut_pandang_val"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_sudut_pandang_val")] = GetTableURL($pageObject->pSet->getLookupTable("r_sudut_pandang_val"));
	
	$pageObject->fillFieldToolTips("r_sudut_pandang_val");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_sudut_pandang_val");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_sudut_pandang_val";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_sudut_pandang_val_label","<label for=\"".GetInputElementId("r_sudut_pandang_val", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_sudut_pandang_val_label", true);
	
	$xt->assign("r_sudut_pandang_val_fieldblock", true);
	$xt->assignbyref("r_sudut_pandang_val_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_sudut_pandang_val_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_sudut_pandang_val_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_sudut_pandang_val", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_sudut_pandang_val");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_sudut_pandang_val", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_sudut_pandang_val", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_tinggi"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_tinggi")] = GetTableURL($pageObject->pSet->getLookupTable("r_tinggi"));
	
	$pageObject->fillFieldToolTips("r_tinggi");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_tinggi");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_tinggi";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_tinggi_label","<label for=\"".GetInputElementId("r_tinggi", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_tinggi_label", true);
	
	$xt->assign("r_tinggi_fieldblock", true);
	$xt->assignbyref("r_tinggi_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_tinggi_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_tinggi_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_tinggi", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_tinggi");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_tinggi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_tinggi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_njop"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_njop")] = GetTableURL($pageObject->pSet->getLookupTable("r_njop"));
	
	$pageObject->fillFieldToolTips("r_njop");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_njop");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_njop";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_njop_label","<label for=\"".GetInputElementId("r_njop", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_njop_label", true);
	
	$xt->assign("r_njop_fieldblock", true);
	$xt->assignbyref("r_njop_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_njop_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_njop_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_njop", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_njop");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_njop", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_njop", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_status"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_status")] = GetTableURL($pageObject->pSet->getLookupTable("r_status"));
	
	$pageObject->fillFieldToolTips("r_status");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_status");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_status";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_status_label","<label for=\"".GetInputElementId("r_status", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_status_label", true);
	
	$xt->assign("r_status_fieldblock", true);
	$xt->assignbyref("r_status_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_status_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_status_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_status", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_status");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_status", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_status", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_njop_ketinggian"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_njop_ketinggian")] = GetTableURL($pageObject->pSet->getLookupTable("r_njop_ketinggian"));
	
	$pageObject->fillFieldToolTips("r_njop_ketinggian");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_njop_ketinggian");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_njop_ketinggian";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_njop_ketinggian_label","<label for=\"".GetInputElementId("r_njop_ketinggian", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_njop_ketinggian_label", true);
	
	$xt->assign("r_njop_ketinggian_fieldblock", true);
	$xt->assignbyref("r_njop_ketinggian_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_njop_ketinggian_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_njop_ketinggian_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_njop_ketinggian", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_njop_ketinggian");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_njop_ketinggian", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_njop_ketinggian", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("status_pembayaran"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("status_pembayaran")] = GetTableURL($pageObject->pSet->getLookupTable("status_pembayaran"));
	
	$pageObject->fillFieldToolTips("status_pembayaran");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("status_pembayaran");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "status_pembayaran";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("status_pembayaran_label","<label for=\"".GetInputElementId("status_pembayaran", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("status_pembayaran_label", true);
	
	$xt->assign("status_pembayaran_fieldblock", true);
	$xt->assignbyref("status_pembayaran_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("status_pembayaran_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("status_pembayaran_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_status_pembayaran", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("status_pembayaran");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"status_pembayaran", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"status_pembayaran", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("rek_no_paneng"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("rek_no_paneng")] = GetTableURL($pageObject->pSet->getLookupTable("rek_no_paneng"));
	
	$pageObject->fillFieldToolTips("rek_no_paneng");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("rek_no_paneng");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "rek_no_paneng";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("rek_no_paneng_label","<label for=\"".GetInputElementId("rek_no_paneng", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("rek_no_paneng_label", true);
	
	$xt->assign("rek_no_paneng_fieldblock", true);
	$xt->assignbyref("rek_no_paneng_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("rek_no_paneng_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("rek_no_paneng_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_rek_no_paneng", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("rek_no_paneng");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"rek_no_paneng", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"rek_no_paneng", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("sptno_lengkap"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("sptno_lengkap")] = GetTableURL($pageObject->pSet->getLookupTable("sptno_lengkap"));
	
	$pageObject->fillFieldToolTips("sptno_lengkap");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("sptno_lengkap");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "sptno_lengkap";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("sptno_lengkap_label","<label for=\"".GetInputElementId("sptno_lengkap", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("sptno_lengkap_label", true);
	
	$xt->assign("sptno_lengkap_fieldblock", true);
	$xt->assignbyref("sptno_lengkap_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("sptno_lengkap_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("sptno_lengkap_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_sptno_lengkap", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("sptno_lengkap");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sptno_lengkap", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sptno_lengkap", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("sptno_lama"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("sptno_lama")] = GetTableURL($pageObject->pSet->getLookupTable("sptno_lama"));
	
	$pageObject->fillFieldToolTips("sptno_lama");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("sptno_lama");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "sptno_lama";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("sptno_lama_label","<label for=\"".GetInputElementId("sptno_lama", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("sptno_lama_label", true);
	
	$xt->assign("sptno_lama_fieldblock", true);
	$xt->assignbyref("sptno_lama_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("sptno_lama_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("sptno_lama_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_sptno_lama", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("sptno_lama");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sptno_lama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"sptno_lama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_nama"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_nama")] = GetTableURL($pageObject->pSet->getLookupTable("r_nama"));
	
	$pageObject->fillFieldToolTips("r_nama");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_nama");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_nama";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_nama_label","<label for=\"".GetInputElementId("r_nama", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_nama_label", true);
	
	$xt->assign("r_nama_fieldblock", true);
	$xt->assignbyref("r_nama_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_nama_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_nama_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_nama", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_nama");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_nama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("r_alamat"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("r_alamat")] = GetTableURL($pageObject->pSet->getLookupTable("r_alamat"));
	
	$pageObject->fillFieldToolTips("r_alamat");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("r_alamat");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "r_alamat";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("r_alamat_label","<label for=\"".GetInputElementId("r_alamat", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("r_alamat_label", true);
	
	$xt->assign("r_alamat_fieldblock", true);
	$xt->assignbyref("r_alamat_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("r_alamat_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("r_alamat_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_r_alamat", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("r_alamat");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_alamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"r_alamat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset1")] = GetTableURL($pageObject->pSet->getLookupTable("omset1"));
	
	$pageObject->fillFieldToolTips("omset1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset1_label","<label for=\"".GetInputElementId("omset1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset1_label", true);
	
	$xt->assign("omset1_fieldblock", true);
	$xt->assignbyref("omset1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset2")] = GetTableURL($pageObject->pSet->getLookupTable("omset2"));
	
	$pageObject->fillFieldToolTips("omset2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset2_label","<label for=\"".GetInputElementId("omset2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset2_label", true);
	
	$xt->assign("omset2_fieldblock", true);
	$xt->assignbyref("omset2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset3")] = GetTableURL($pageObject->pSet->getLookupTable("omset3"));
	
	$pageObject->fillFieldToolTips("omset3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset3_label","<label for=\"".GetInputElementId("omset3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset3_label", true);
	
	$xt->assign("omset3_fieldblock", true);
	$xt->assignbyref("omset3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset4")] = GetTableURL($pageObject->pSet->getLookupTable("omset4"));
	
	$pageObject->fillFieldToolTips("omset4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset4_label","<label for=\"".GetInputElementId("omset4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset4_label", true);
	
	$xt->assign("omset4_fieldblock", true);
	$xt->assignbyref("omset4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset5")] = GetTableURL($pageObject->pSet->getLookupTable("omset5"));
	
	$pageObject->fillFieldToolTips("omset5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset5_label","<label for=\"".GetInputElementId("omset5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset5_label", true);
	
	$xt->assign("omset5_fieldblock", true);
	$xt->assignbyref("omset5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset6")] = GetTableURL($pageObject->pSet->getLookupTable("omset6"));
	
	$pageObject->fillFieldToolTips("omset6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset6_label","<label for=\"".GetInputElementId("omset6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset6_label", true);
	
	$xt->assign("omset6_fieldblock", true);
	$xt->assignbyref("omset6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset7"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset7")] = GetTableURL($pageObject->pSet->getLookupTable("omset7"));
	
	$pageObject->fillFieldToolTips("omset7");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset7");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset7";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset7_label","<label for=\"".GetInputElementId("omset7", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset7_label", true);
	
	$xt->assign("omset7_fieldblock", true);
	$xt->assignbyref("omset7_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset7_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset7_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset7", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset7");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset8"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset8")] = GetTableURL($pageObject->pSet->getLookupTable("omset8"));
	
	$pageObject->fillFieldToolTips("omset8");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset8");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset8";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset8_label","<label for=\"".GetInputElementId("omset8", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset8_label", true);
	
	$xt->assign("omset8_fieldblock", true);
	$xt->assignbyref("omset8_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset8_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset8_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset8", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset8");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset9"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset9")] = GetTableURL($pageObject->pSet->getLookupTable("omset9"));
	
	$pageObject->fillFieldToolTips("omset9");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset9");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset9";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset9_label","<label for=\"".GetInputElementId("omset9", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset9_label", true);
	
	$xt->assign("omset9_fieldblock", true);
	$xt->assignbyref("omset9_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset9_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset9_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset9", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset9");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset10"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset10")] = GetTableURL($pageObject->pSet->getLookupTable("omset10"));
	
	$pageObject->fillFieldToolTips("omset10");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset10");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset10";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset10_label","<label for=\"".GetInputElementId("omset10", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset10_label", true);
	
	$xt->assign("omset10_fieldblock", true);
	$xt->assignbyref("omset10_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset10_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset10_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset10", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset10");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset11"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset11")] = GetTableURL($pageObject->pSet->getLookupTable("omset11"));
	
	$pageObject->fillFieldToolTips("omset11");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset11");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset11";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset11_label","<label for=\"".GetInputElementId("omset11", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset11_label", true);
	
	$xt->assign("omset11_fieldblock", true);
	$xt->assignbyref("omset11_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset11_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset11_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset11", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset11");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset12"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset12")] = GetTableURL($pageObject->pSet->getLookupTable("omset12"));
	
	$pageObject->fillFieldToolTips("omset12");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset12");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset12";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset12_label","<label for=\"".GetInputElementId("omset12", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset12_label", true);
	
	$xt->assign("omset12_fieldblock", true);
	$xt->assignbyref("omset12_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset12_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset12_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset12", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset12");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset13"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset13")] = GetTableURL($pageObject->pSet->getLookupTable("omset13"));
	
	$pageObject->fillFieldToolTips("omset13");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset13");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset13";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset13_label","<label for=\"".GetInputElementId("omset13", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset13_label", true);
	
	$xt->assign("omset13_fieldblock", true);
	$xt->assignbyref("omset13_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset13_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset13_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset13", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset13");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset13", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset13", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset14"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset14")] = GetTableURL($pageObject->pSet->getLookupTable("omset14"));
	
	$pageObject->fillFieldToolTips("omset14");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset14");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset14";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset14_label","<label for=\"".GetInputElementId("omset14", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset14_label", true);
	
	$xt->assign("omset14_fieldblock", true);
	$xt->assignbyref("omset14_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset14_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset14_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset14", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset14");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset14", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset14", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset15"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset15")] = GetTableURL($pageObject->pSet->getLookupTable("omset15"));
	
	$pageObject->fillFieldToolTips("omset15");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset15");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset15";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset15_label","<label for=\"".GetInputElementId("omset15", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset15_label", true);
	
	$xt->assign("omset15_fieldblock", true);
	$xt->assignbyref("omset15_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset15_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset15_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset15", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset15");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset15", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset15", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset16"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset16")] = GetTableURL($pageObject->pSet->getLookupTable("omset16"));
	
	$pageObject->fillFieldToolTips("omset16");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset16");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset16";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset16_label","<label for=\"".GetInputElementId("omset16", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset16_label", true);
	
	$xt->assign("omset16_fieldblock", true);
	$xt->assignbyref("omset16_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset16_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset16_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset16", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset16");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset16", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset16", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset17"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset17")] = GetTableURL($pageObject->pSet->getLookupTable("omset17"));
	
	$pageObject->fillFieldToolTips("omset17");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset17");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset17";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset17_label","<label for=\"".GetInputElementId("omset17", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset17_label", true);
	
	$xt->assign("omset17_fieldblock", true);
	$xt->assignbyref("omset17_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset17_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset17_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset17", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset17");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset17", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset17", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset18"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset18")] = GetTableURL($pageObject->pSet->getLookupTable("omset18"));
	
	$pageObject->fillFieldToolTips("omset18");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset18");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset18";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset18_label","<label for=\"".GetInputElementId("omset18", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset18_label", true);
	
	$xt->assign("omset18_fieldblock", true);
	$xt->assignbyref("omset18_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset18_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset18_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset18", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset18");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset18", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset18", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset19"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset19")] = GetTableURL($pageObject->pSet->getLookupTable("omset19"));
	
	$pageObject->fillFieldToolTips("omset19");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset19");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset19";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset19_label","<label for=\"".GetInputElementId("omset19", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset19_label", true);
	
	$xt->assign("omset19_fieldblock", true);
	$xt->assignbyref("omset19_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset19_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset19_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset19", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset19");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset19", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset19", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset20"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset20")] = GetTableURL($pageObject->pSet->getLookupTable("omset20"));
	
	$pageObject->fillFieldToolTips("omset20");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset20");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset20";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset20_label","<label for=\"".GetInputElementId("omset20", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset20_label", true);
	
	$xt->assign("omset20_fieldblock", true);
	$xt->assignbyref("omset20_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset20_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset20_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset20", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset20");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset20", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset20", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset21"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset21")] = GetTableURL($pageObject->pSet->getLookupTable("omset21"));
	
	$pageObject->fillFieldToolTips("omset21");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset21");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset21";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset21_label","<label for=\"".GetInputElementId("omset21", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset21_label", true);
	
	$xt->assign("omset21_fieldblock", true);
	$xt->assignbyref("omset21_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset21_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset21_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset21", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset21");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset21", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset21", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset22"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset22")] = GetTableURL($pageObject->pSet->getLookupTable("omset22"));
	
	$pageObject->fillFieldToolTips("omset22");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset22");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset22";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset22_label","<label for=\"".GetInputElementId("omset22", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset22_label", true);
	
	$xt->assign("omset22_fieldblock", true);
	$xt->assignbyref("omset22_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset22_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset22_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset22", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset22");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset22", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset22", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset23"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset23")] = GetTableURL($pageObject->pSet->getLookupTable("omset23"));
	
	$pageObject->fillFieldToolTips("omset23");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset23");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset23";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset23_label","<label for=\"".GetInputElementId("omset23", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset23_label", true);
	
	$xt->assign("omset23_fieldblock", true);
	$xt->assignbyref("omset23_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset23_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset23_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset23", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset23");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset23", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset23", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset24"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset24")] = GetTableURL($pageObject->pSet->getLookupTable("omset24"));
	
	$pageObject->fillFieldToolTips("omset24");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset24");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset24";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset24_label","<label for=\"".GetInputElementId("omset24", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset24_label", true);
	
	$xt->assign("omset24_fieldblock", true);
	$xt->assignbyref("omset24_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset24_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset24_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset24", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset24");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset24", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset24", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset25"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset25")] = GetTableURL($pageObject->pSet->getLookupTable("omset25"));
	
	$pageObject->fillFieldToolTips("omset25");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset25");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset25";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset25_label","<label for=\"".GetInputElementId("omset25", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset25_label", true);
	
	$xt->assign("omset25_fieldblock", true);
	$xt->assignbyref("omset25_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset25_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset25_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset25", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset25");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset25", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset25", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset26"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset26")] = GetTableURL($pageObject->pSet->getLookupTable("omset26"));
	
	$pageObject->fillFieldToolTips("omset26");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset26");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset26";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset26_label","<label for=\"".GetInputElementId("omset26", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset26_label", true);
	
	$xt->assign("omset26_fieldblock", true);
	$xt->assignbyref("omset26_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset26_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset26_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset26", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset26");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset26", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset26", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset27"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset27")] = GetTableURL($pageObject->pSet->getLookupTable("omset27"));
	
	$pageObject->fillFieldToolTips("omset27");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset27");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset27";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset27_label","<label for=\"".GetInputElementId("omset27", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset27_label", true);
	
	$xt->assign("omset27_fieldblock", true);
	$xt->assignbyref("omset27_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset27_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset27_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset27", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset27");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset27", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset27", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset28"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset28")] = GetTableURL($pageObject->pSet->getLookupTable("omset28"));
	
	$pageObject->fillFieldToolTips("omset28");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset28");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset28";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset28_label","<label for=\"".GetInputElementId("omset28", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset28_label", true);
	
	$xt->assign("omset28_fieldblock", true);
	$xt->assignbyref("omset28_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset28_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset28_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset28", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset28");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset28", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset28", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset29"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset29")] = GetTableURL($pageObject->pSet->getLookupTable("omset29"));
	
	$pageObject->fillFieldToolTips("omset29");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset29");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset29";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset29_label","<label for=\"".GetInputElementId("omset29", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset29_label", true);
	
	$xt->assign("omset29_fieldblock", true);
	$xt->assignbyref("omset29_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset29_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset29_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset29", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset29");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset29", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset29", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset30"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset30")] = GetTableURL($pageObject->pSet->getLookupTable("omset30"));
	
	$pageObject->fillFieldToolTips("omset30");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset30");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset30";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset30_label","<label for=\"".GetInputElementId("omset30", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset30_label", true);
	
	$xt->assign("omset30_fieldblock", true);
	$xt->assignbyref("omset30_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset30_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset30_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset30", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset30");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset30", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset30", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset31"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset31")] = GetTableURL($pageObject->pSet->getLookupTable("omset31"));
	
	$pageObject->fillFieldToolTips("omset31");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset31");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset31";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset31_label","<label for=\"".GetInputElementId("omset31", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset31_label", true);
	
	$xt->assign("omset31_fieldblock", true);
	$xt->assignbyref("omset31_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset31_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset31_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset31", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset31");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset31", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset31", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan1"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan1")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan1"));
	
	$pageObject->fillFieldToolTips("keterangan1");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan1");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan1";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan1_label","<label for=\"".GetInputElementId("keterangan1", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan1_label", true);
	
	$xt->assign("keterangan1_fieldblock", true);
	$xt->assignbyref("keterangan1_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan1_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan1_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan1", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan1");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan1", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan2"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan2")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan2"));
	
	$pageObject->fillFieldToolTips("keterangan2");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan2");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan2";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan2_label","<label for=\"".GetInputElementId("keterangan2", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan2_label", true);
	
	$xt->assign("keterangan2_fieldblock", true);
	$xt->assignbyref("keterangan2_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan2_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan2_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan2", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan2");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan2", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan3"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan3")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan3"));
	
	$pageObject->fillFieldToolTips("keterangan3");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan3");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan3";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan3_label","<label for=\"".GetInputElementId("keterangan3", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan3_label", true);
	
	$xt->assign("keterangan3_fieldblock", true);
	$xt->assignbyref("keterangan3_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan3_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan3_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan3", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan3");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan3", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan4"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan4")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan4"));
	
	$pageObject->fillFieldToolTips("keterangan4");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan4");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan4";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan4_label","<label for=\"".GetInputElementId("keterangan4", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan4_label", true);
	
	$xt->assign("keterangan4_fieldblock", true);
	$xt->assignbyref("keterangan4_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan4_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan4_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan4", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan4");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan4", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan5"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan5")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan5"));
	
	$pageObject->fillFieldToolTips("keterangan5");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan5");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan5";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan5_label","<label for=\"".GetInputElementId("keterangan5", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan5_label", true);
	
	$xt->assign("keterangan5_fieldblock", true);
	$xt->assignbyref("keterangan5_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan5_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan5_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan5", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan5");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan5", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan6"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan6")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan6"));
	
	$pageObject->fillFieldToolTips("keterangan6");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan6");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan6";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan6_label","<label for=\"".GetInputElementId("keterangan6", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan6_label", true);
	
	$xt->assign("keterangan6_fieldblock", true);
	$xt->assignbyref("keterangan6_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan6_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan6_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan6", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan6");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan6", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan7"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan7")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan7"));
	
	$pageObject->fillFieldToolTips("keterangan7");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan7");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan7";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan7_label","<label for=\"".GetInputElementId("keterangan7", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan7_label", true);
	
	$xt->assign("keterangan7_fieldblock", true);
	$xt->assignbyref("keterangan7_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan7_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan7_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan7", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan7");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan7", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan8"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan8")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan8"));
	
	$pageObject->fillFieldToolTips("keterangan8");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan8");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan8";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan8_label","<label for=\"".GetInputElementId("keterangan8", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan8_label", true);
	
	$xt->assign("keterangan8_fieldblock", true);
	$xt->assignbyref("keterangan8_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan8_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan8_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan8", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan8");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan8", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan9"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan9")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan9"));
	
	$pageObject->fillFieldToolTips("keterangan9");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan9");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan9";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan9_label","<label for=\"".GetInputElementId("keterangan9", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan9_label", true);
	
	$xt->assign("keterangan9_fieldblock", true);
	$xt->assignbyref("keterangan9_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan9_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan9_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan9", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan9");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan9", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan10"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan10")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan10"));
	
	$pageObject->fillFieldToolTips("keterangan10");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan10");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan10";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan10_label","<label for=\"".GetInputElementId("keterangan10", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan10_label", true);
	
	$xt->assign("keterangan10_fieldblock", true);
	$xt->assignbyref("keterangan10_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan10_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan10_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan10", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan10");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan10", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan11"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan11")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan11"));
	
	$pageObject->fillFieldToolTips("keterangan11");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan11");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan11";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan11_label","<label for=\"".GetInputElementId("keterangan11", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan11_label", true);
	
	$xt->assign("keterangan11_fieldblock", true);
	$xt->assignbyref("keterangan11_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan11_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan11_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan11", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan11");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan11", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan12"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan12")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan12"));
	
	$pageObject->fillFieldToolTips("keterangan12");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan12");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan12";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan12_label","<label for=\"".GetInputElementId("keterangan12", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan12_label", true);
	
	$xt->assign("keterangan12_fieldblock", true);
	$xt->assignbyref("keterangan12_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan12_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan12_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan12", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan12");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan12", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan13"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan13")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan13"));
	
	$pageObject->fillFieldToolTips("keterangan13");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan13");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan13";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan13_label","<label for=\"".GetInputElementId("keterangan13", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan13_label", true);
	
	$xt->assign("keterangan13_fieldblock", true);
	$xt->assignbyref("keterangan13_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan13_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan13_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan13", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan13");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan13", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan13", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan14"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan14")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan14"));
	
	$pageObject->fillFieldToolTips("keterangan14");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan14");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan14";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan14_label","<label for=\"".GetInputElementId("keterangan14", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan14_label", true);
	
	$xt->assign("keterangan14_fieldblock", true);
	$xt->assignbyref("keterangan14_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan14_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan14_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan14", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan14");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan14", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan14", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan15"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan15")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan15"));
	
	$pageObject->fillFieldToolTips("keterangan15");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan15");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan15";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan15_label","<label for=\"".GetInputElementId("keterangan15", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan15_label", true);
	
	$xt->assign("keterangan15_fieldblock", true);
	$xt->assignbyref("keterangan15_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan15_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan15_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan15", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan15");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan15", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan15", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan16"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan16")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan16"));
	
	$pageObject->fillFieldToolTips("keterangan16");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan16");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan16";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan16_label","<label for=\"".GetInputElementId("keterangan16", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan16_label", true);
	
	$xt->assign("keterangan16_fieldblock", true);
	$xt->assignbyref("keterangan16_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan16_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan16_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan16", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan16");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan16", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan16", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan17"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan17")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan17"));
	
	$pageObject->fillFieldToolTips("keterangan17");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan17");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan17";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan17_label","<label for=\"".GetInputElementId("keterangan17", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan17_label", true);
	
	$xt->assign("keterangan17_fieldblock", true);
	$xt->assignbyref("keterangan17_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan17_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan17_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan17", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan17");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan17", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan17", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan18"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan18")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan18"));
	
	$pageObject->fillFieldToolTips("keterangan18");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan18");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan18";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan18_label","<label for=\"".GetInputElementId("keterangan18", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan18_label", true);
	
	$xt->assign("keterangan18_fieldblock", true);
	$xt->assignbyref("keterangan18_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan18_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan18_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan18", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan18");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan18", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan18", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan19"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan19")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan19"));
	
	$pageObject->fillFieldToolTips("keterangan19");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan19");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan19";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan19_label","<label for=\"".GetInputElementId("keterangan19", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan19_label", true);
	
	$xt->assign("keterangan19_fieldblock", true);
	$xt->assignbyref("keterangan19_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan19_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan19_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan19", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan19");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan19", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan19", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan20"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan20")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan20"));
	
	$pageObject->fillFieldToolTips("keterangan20");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan20");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan20";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan20_label","<label for=\"".GetInputElementId("keterangan20", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan20_label", true);
	
	$xt->assign("keterangan20_fieldblock", true);
	$xt->assignbyref("keterangan20_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan20_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan20_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan20", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan20");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan20", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan20", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan21"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan21")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan21"));
	
	$pageObject->fillFieldToolTips("keterangan21");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan21");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan21";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan21_label","<label for=\"".GetInputElementId("keterangan21", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan21_label", true);
	
	$xt->assign("keterangan21_fieldblock", true);
	$xt->assignbyref("keterangan21_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan21_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan21_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan21", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan21");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan21", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan21", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan22"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan22")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan22"));
	
	$pageObject->fillFieldToolTips("keterangan22");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan22");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan22";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan22_label","<label for=\"".GetInputElementId("keterangan22", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan22_label", true);
	
	$xt->assign("keterangan22_fieldblock", true);
	$xt->assignbyref("keterangan22_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan22_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan22_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan22", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan22");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan22", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan22", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan23"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan23")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan23"));
	
	$pageObject->fillFieldToolTips("keterangan23");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan23");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan23";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan23_label","<label for=\"".GetInputElementId("keterangan23", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan23_label", true);
	
	$xt->assign("keterangan23_fieldblock", true);
	$xt->assignbyref("keterangan23_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan23_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan23_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan23", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan23");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan23", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan23", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan24"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan24")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan24"));
	
	$pageObject->fillFieldToolTips("keterangan24");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan24");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan24";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan24_label","<label for=\"".GetInputElementId("keterangan24", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan24_label", true);
	
	$xt->assign("keterangan24_fieldblock", true);
	$xt->assignbyref("keterangan24_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan24_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan24_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan24", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan24");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan24", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan24", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan25"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan25")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan25"));
	
	$pageObject->fillFieldToolTips("keterangan25");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan25");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan25";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan25_label","<label for=\"".GetInputElementId("keterangan25", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan25_label", true);
	
	$xt->assign("keterangan25_fieldblock", true);
	$xt->assignbyref("keterangan25_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan25_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan25_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan25", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan25");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan25", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan25", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan26"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan26")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan26"));
	
	$pageObject->fillFieldToolTips("keterangan26");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan26");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan26";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan26_label","<label for=\"".GetInputElementId("keterangan26", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan26_label", true);
	
	$xt->assign("keterangan26_fieldblock", true);
	$xt->assignbyref("keterangan26_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan26_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan26_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan26", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan26");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan26", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan26", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan27"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan27")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan27"));
	
	$pageObject->fillFieldToolTips("keterangan27");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan27");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan27";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan27_label","<label for=\"".GetInputElementId("keterangan27", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan27_label", true);
	
	$xt->assign("keterangan27_fieldblock", true);
	$xt->assignbyref("keterangan27_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan27_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan27_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan27", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan27");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan27", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan27", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan28"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan28")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan28"));
	
	$pageObject->fillFieldToolTips("keterangan28");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan28");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan28";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan28_label","<label for=\"".GetInputElementId("keterangan28", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan28_label", true);
	
	$xt->assign("keterangan28_fieldblock", true);
	$xt->assignbyref("keterangan28_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan28_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan28_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan28", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan28");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan28", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan28", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan29"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan29")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan29"));
	
	$pageObject->fillFieldToolTips("keterangan29");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan29");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan29";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan29_label","<label for=\"".GetInputElementId("keterangan29", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan29_label", true);
	
	$xt->assign("keterangan29_fieldblock", true);
	$xt->assignbyref("keterangan29_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan29_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan29_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan29", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan29");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan29", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan29", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan30"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan30")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan30"));
	
	$pageObject->fillFieldToolTips("keterangan30");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan30");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan30";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan30_label","<label for=\"".GetInputElementId("keterangan30", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan30_label", true);
	
	$xt->assign("keterangan30_fieldblock", true);
	$xt->assignbyref("keterangan30_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan30_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan30_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan30", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan30");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan30", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan30", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan31"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan31")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan31"));
	
	$pageObject->fillFieldToolTips("keterangan31");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan31");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan31";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan31_label","<label for=\"".GetInputElementId("keterangan31", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan31_label", true);
	
	$xt->assign("keterangan31_fieldblock", true);
	$xt->assignbyref("keterangan31_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan31_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan31_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan31", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan31");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan31", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan31", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("doc_no"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("doc_no")] = GetTableURL($pageObject->pSet->getLookupTable("doc_no"));
	
	$pageObject->fillFieldToolTips("doc_no");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("doc_no");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "doc_no";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("doc_no_label","<label for=\"".GetInputElementId("doc_no", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("doc_no_label", true);
	
	$xt->assign("doc_no_fieldblock", true);
	$xt->assignbyref("doc_no_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("doc_no_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("doc_no_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_doc_no", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("doc_no");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"doc_no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"doc_no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("cara_bayar"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("cara_bayar")] = GetTableURL($pageObject->pSet->getLookupTable("cara_bayar"));
	
	$pageObject->fillFieldToolTips("cara_bayar");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("cara_bayar");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "cara_bayar";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("cara_bayar_label","<label for=\"".GetInputElementId("cara_bayar", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("cara_bayar_label", true);
	
	$xt->assign("cara_bayar_fieldblock", true);
	$xt->assignbyref("cara_bayar_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("cara_bayar_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("cara_bayar_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_cara_bayar", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("cara_bayar");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"cara_bayar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"cara_bayar", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("kelompok_usaha_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("kelompok_usaha_id")] = GetTableURL($pageObject->pSet->getLookupTable("kelompok_usaha_id"));
	
	$pageObject->fillFieldToolTips("kelompok_usaha_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("kelompok_usaha_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "kelompok_usaha_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("kelompok_usaha_id_label","<label for=\"".GetInputElementId("kelompok_usaha_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("kelompok_usaha_id_label", true);
	
	$xt->assign("kelompok_usaha_id_fieldblock", true);
	$xt->assignbyref("kelompok_usaha_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("kelompok_usaha_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("kelompok_usaha_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_kelompok_usaha_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("kelompok_usaha_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kelompok_usaha_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"kelompok_usaha_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("zona_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("zona_id")] = GetTableURL($pageObject->pSet->getLookupTable("zona_id"));
	
	$pageObject->fillFieldToolTips("zona_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("zona_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "zona_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("zona_id_label","<label for=\"".GetInputElementId("zona_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("zona_id_label", true);
	
	$xt->assign("zona_id_fieldblock", true);
	$xt->assignbyref("zona_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("zona_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("zona_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_zona_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("zona_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"zona_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"zona_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("manfaat_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("manfaat_id")] = GetTableURL($pageObject->pSet->getLookupTable("manfaat_id"));
	
	$pageObject->fillFieldToolTips("manfaat_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("manfaat_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "manfaat_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("manfaat_id_label","<label for=\"".GetInputElementId("manfaat_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("manfaat_id_label", true);
	
	$xt->assign("manfaat_id_fieldblock", true);
	$xt->assignbyref("manfaat_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("manfaat_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("manfaat_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_manfaat_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("manfaat_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"manfaat_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"manfaat_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("golongan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("golongan")] = GetTableURL($pageObject->pSet->getLookupTable("golongan"));
	
	$pageObject->fillFieldToolTips("golongan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("golongan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "golongan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("golongan_label","<label for=\"".GetInputElementId("golongan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("golongan_label", true);
	
	$xt->assign("golongan_fieldblock", true);
	$xt->assignbyref("golongan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("golongan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("golongan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_golongan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("golongan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"golongan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"golongan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("omset_lain"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("omset_lain")] = GetTableURL($pageObject->pSet->getLookupTable("omset_lain"));
	
	$pageObject->fillFieldToolTips("omset_lain");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("omset_lain");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "omset_lain";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("omset_lain_label","<label for=\"".GetInputElementId("omset_lain", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("omset_lain_label", true);
	
	$xt->assign("omset_lain_fieldblock", true);
	$xt->assignbyref("omset_lain_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("omset_lain_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("omset_lain_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_omset_lain", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("omset_lain");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset_lain", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"omset_lain", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("keterangan_lain"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("keterangan_lain")] = GetTableURL($pageObject->pSet->getLookupTable("keterangan_lain"));
	
	$pageObject->fillFieldToolTips("keterangan_lain");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("keterangan_lain");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "keterangan_lain";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("keterangan_lain_label","<label for=\"".GetInputElementId("keterangan_lain", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("keterangan_lain_label", true);
	
	$xt->assign("keterangan_lain_fieldblock", true);
	$xt->assignbyref("keterangan_lain_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("keterangan_lain_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("keterangan_lain_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_keterangan_lain", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("keterangan_lain");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan_lain", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"keterangan_lain", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("ijin_no"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("ijin_no")] = GetTableURL($pageObject->pSet->getLookupTable("ijin_no"));
	
	$pageObject->fillFieldToolTips("ijin_no");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("ijin_no");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ijin_no";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("ijin_no_label","<label for=\"".GetInputElementId("ijin_no", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("ijin_no_label", true);
	
	$xt->assign("ijin_no_fieldblock", true);
	$xt->assignbyref("ijin_no_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("ijin_no_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("ijin_no_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_ijin_no", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("ijin_no");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin_no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"ijin_no", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("jenis_masa"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("jenis_masa")] = GetTableURL($pageObject->pSet->getLookupTable("jenis_masa"));
	
	$pageObject->fillFieldToolTips("jenis_masa");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("jenis_masa");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "jenis_masa";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("jenis_masa_label","<label for=\"".GetInputElementId("jenis_masa", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("jenis_masa_label", true);
	
	$xt->assign("jenis_masa_fieldblock", true);
	$xt->assignbyref("jenis_masa_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("jenis_masa_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("jenis_masa_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_jenis_masa", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("jenis_masa");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"jenis_masa", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"jenis_masa", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("skpd_lama"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("skpd_lama")] = GetTableURL($pageObject->pSet->getLookupTable("skpd_lama"));
	
	$pageObject->fillFieldToolTips("skpd_lama");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("skpd_lama");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "skpd_lama";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("skpd_lama_label","<label for=\"".GetInputElementId("skpd_lama", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("skpd_lama_label", true);
	
	$xt->assign("skpd_lama_fieldblock", true);
	$xt->assignbyref("skpd_lama_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("skpd_lama_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("skpd_lama_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_skpd_lama", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("skpd_lama");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"skpd_lama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"skpd_lama", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("proses"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("proses")] = GetTableURL($pageObject->pSet->getLookupTable("proses"));
	
	$pageObject->fillFieldToolTips("proses");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("proses");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "proses";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("proses_label","<label for=\"".GetInputElementId("proses", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("proses_label", true);
	
	$xt->assign("proses_fieldblock", true);
	$xt->assignbyref("proses_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("proses_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("proses_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_proses", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("proses");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"proses", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"proses", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("tanggal_validasi"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("tanggal_validasi")] = GetTableURL($pageObject->pSet->getLookupTable("tanggal_validasi"));
	
	$pageObject->fillFieldToolTips("tanggal_validasi");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("tanggal_validasi");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "tanggal_validasi";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("tanggal_validasi_label","<label for=\"".GetInputElementId("tanggal_validasi", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("tanggal_validasi_label", true);
	
	$xt->assign("tanggal_validasi_fieldblock", true);
	$xt->assignbyref("tanggal_validasi_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("tanggal_validasi_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("tanggal_validasi_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_tanggal_validasi", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("tanggal_validasi");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"tanggal_validasi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"tanggal_validasi", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("bulan"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("bulan")] = GetTableURL($pageObject->pSet->getLookupTable("bulan"));
	
	$pageObject->fillFieldToolTips("bulan");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("bulan");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "bulan";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("bulan_label","<label for=\"".GetInputElementId("bulan", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("bulan_label", true);
	
	$xt->assign("bulan_fieldblock", true);
	$xt->assignbyref("bulan_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("bulan_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("bulan_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_bulan", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("bulan");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"bulan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"bulan", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("no_telp"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("no_telp")] = GetTableURL($pageObject->pSet->getLookupTable("no_telp"));
	
	$pageObject->fillFieldToolTips("no_telp");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("no_telp");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "no_telp";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("no_telp_label","<label for=\"".GetInputElementId("no_telp", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("no_telp_label", true);
	
	$xt->assign("no_telp_fieldblock", true);
	$xt->assignbyref("no_telp_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("no_telp_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("no_telp_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_no_telp", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("no_telp");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"no_telp", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"no_telp", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("usaha_id"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("usaha_id")] = GetTableURL($pageObject->pSet->getLookupTable("usaha_id"));
	
	$pageObject->fillFieldToolTips("usaha_id");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("usaha_id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "usaha_id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("usaha_id_label","<label for=\"".GetInputElementId("usaha_id", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("usaha_id_label", true);
	
	$xt->assign("usaha_id_fieldblock", true);
	$xt->assignbyref("usaha_id_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("usaha_id_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("usaha_id_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_usaha_id", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("usaha_id");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"usaha_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"usaha_id", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("multiple"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("multiple")] = GetTableURL($pageObject->pSet->getLookupTable("multiple"));
	
	$pageObject->fillFieldToolTips("multiple");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("multiple");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "multiple";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("multiple_label","<label for=\"".GetInputElementId("multiple", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("multiple_label", true);
	
	$xt->assign("multiple_fieldblock", true);
	$xt->assignbyref("multiple_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("multiple_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("multiple_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_multiple", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("multiple");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"multiple", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"multiple", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
		$ctrlInd++;
	}
	// search fields data
	
	if($pageObject->pSet->getLookupTable("bulan_telat"))
		$pageObject->settingsMap["globalSettings"]['shortTNames'][$pageObject->pSet->getLookupTable("bulan_telat")] = GetTableURL($pageObject->pSet->getLookupTable("bulan_telat"));
	
	$pageObject->fillFieldToolTips("bulan_telat");	
	
	$srchFields = $pageObject->searchClauseObj->getSearchCtrlParams("bulan_telat");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "bulan_telat";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control	
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	
		
	if(isEnableSection508())
		$xt->assign_section("bulan_telat_label","<label for=\"".GetInputElementId("bulan_telat", $id, PAGE_SEARCH)."\">","</label>");
	else 
		$xt->assign("bulan_telat_label", true);
	
	$xt->assign("bulan_telat_fieldblock", true);
	$xt->assignbyref("bulan_telat_editcontrol", $ctrlBlockArr['searchcontrol']);
	$xt->assign("bulan_telat_notbox", $ctrlBlockArr['notbox']);
	// create second control, if need it
	$xt->assignbyref("bulan_telat_editcontrol1", $ctrlBlockArr['searchcontrol1']);
	// create search type select
	$xt->assign("searchtype_bulan_telat", $ctrlBlockArr['searchtype']);
	$isFieldNeedSecCtrl = $searchControlBuilder->isNeedSecondCtrl("bulan_telat");
	$ctrlInd = 0;
	if ($isFieldNeedSecCtrl)
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"bulan_telat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd, 1=>($ctrlInd+1)));
		$ctrlInd+=2;
	}
	else
	{
		$pageObject->controlsMap["search"]["searchBlocks"][] = array('fName'=>"bulan_telat", 'recId'=>$id, 'ctrlsMap'=>array(0=>$ctrlInd));			
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
