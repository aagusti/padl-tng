<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/public_pad_invoice_variables.php");
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
$layout->blocks["top"][] = "details";$page_layouts["public_pad_invoice_view"] = $layout;




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
	header("Location: public_pad_invoice_list.php?a=return");
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
$arr['fName'] = "source_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("source_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "source_nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("source_nama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tahun";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tahun");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "usaha_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("usaha_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "invoice_no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("invoice_no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jenis_usaha";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jenis_usaha");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jenis_pajak";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jenis_pajak");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "npwpd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("npwpd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "nama_wp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("nama_wp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "alamat_wp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("alamat_wp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "nama_op";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("nama_op");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "alamat_op";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("alamat_op");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "nomor_tagihan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("nomor_tagihan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pokok";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pokok");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "denda";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("denda");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bunga";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bunga");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "total";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("total");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "status_bayar";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("status_bayar");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jatuh_tempo";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jatuh_tempo");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "periode";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("periode");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "rekening_pokok";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("rekening_pokok");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "rekening_denda";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("rekening_denda");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "nama_pokok";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("nama_pokok");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "nama_denda";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("nama_denda");
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
//source_id - 
	
	$value = $pageObject->showDBValue("source_id", $data, $keylink);
	if($mainTableOwnerID=="source_id")
		$ownerIdValue=$value;
	$xt->assign("source_id_value",$value);
	if(!$pageObject->isAppearOnTabs("source_id"))
		$xt->assign("source_id_fieldblock",true);
	else
		$xt->assign("source_id_tabfieldblock",true);
////////////////////////////////////////////
//source_nama - 
	
	$value = $pageObject->showDBValue("source_nama", $data, $keylink);
	if($mainTableOwnerID=="source_nama")
		$ownerIdValue=$value;
	$xt->assign("source_nama_value",$value);
	if(!$pageObject->isAppearOnTabs("source_nama"))
		$xt->assign("source_nama_fieldblock",true);
	else
		$xt->assign("source_nama_tabfieldblock",true);
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
//usaha_id - 
	
	$value = $pageObject->showDBValue("usaha_id", $data, $keylink);
	if($mainTableOwnerID=="usaha_id")
		$ownerIdValue=$value;
	$xt->assign("usaha_id_value",$value);
	if(!$pageObject->isAppearOnTabs("usaha_id"))
		$xt->assign("usaha_id_fieldblock",true);
	else
		$xt->assign("usaha_id_tabfieldblock",true);
////////////////////////////////////////////
//invoice_no - 
	
	$value = $pageObject->showDBValue("invoice_no", $data, $keylink);
	if($mainTableOwnerID=="invoice_no")
		$ownerIdValue=$value;
	$xt->assign("invoice_no_value",$value);
	if(!$pageObject->isAppearOnTabs("invoice_no"))
		$xt->assign("invoice_no_fieldblock",true);
	else
		$xt->assign("invoice_no_tabfieldblock",true);
////////////////////////////////////////////
//jenis_usaha - 
	
	$value = $pageObject->showDBValue("jenis_usaha", $data, $keylink);
	if($mainTableOwnerID=="jenis_usaha")
		$ownerIdValue=$value;
	$xt->assign("jenis_usaha_value",$value);
	if(!$pageObject->isAppearOnTabs("jenis_usaha"))
		$xt->assign("jenis_usaha_fieldblock",true);
	else
		$xt->assign("jenis_usaha_tabfieldblock",true);
////////////////////////////////////////////
//jenis_pajak - 
	
	$value = $pageObject->showDBValue("jenis_pajak", $data, $keylink);
	if($mainTableOwnerID=="jenis_pajak")
		$ownerIdValue=$value;
	$xt->assign("jenis_pajak_value",$value);
	if(!$pageObject->isAppearOnTabs("jenis_pajak"))
		$xt->assign("jenis_pajak_fieldblock",true);
	else
		$xt->assign("jenis_pajak_tabfieldblock",true);
////////////////////////////////////////////
//npwpd - 
	
	$value = $pageObject->showDBValue("npwpd", $data, $keylink);
	if($mainTableOwnerID=="npwpd")
		$ownerIdValue=$value;
	$xt->assign("npwpd_value",$value);
	if(!$pageObject->isAppearOnTabs("npwpd"))
		$xt->assign("npwpd_fieldblock",true);
	else
		$xt->assign("npwpd_tabfieldblock",true);
////////////////////////////////////////////
//nama_wp - 
	
	$value = $pageObject->showDBValue("nama_wp", $data, $keylink);
	if($mainTableOwnerID=="nama_wp")
		$ownerIdValue=$value;
	$xt->assign("nama_wp_value",$value);
	if(!$pageObject->isAppearOnTabs("nama_wp"))
		$xt->assign("nama_wp_fieldblock",true);
	else
		$xt->assign("nama_wp_tabfieldblock",true);
////////////////////////////////////////////
//alamat_wp - 
	
	$value = $pageObject->showDBValue("alamat_wp", $data, $keylink);
	if($mainTableOwnerID=="alamat_wp")
		$ownerIdValue=$value;
	$xt->assign("alamat_wp_value",$value);
	if(!$pageObject->isAppearOnTabs("alamat_wp"))
		$xt->assign("alamat_wp_fieldblock",true);
	else
		$xt->assign("alamat_wp_tabfieldblock",true);
////////////////////////////////////////////
//nama_op - 
	
	$value = $pageObject->showDBValue("nama_op", $data, $keylink);
	if($mainTableOwnerID=="nama_op")
		$ownerIdValue=$value;
	$xt->assign("nama_op_value",$value);
	if(!$pageObject->isAppearOnTabs("nama_op"))
		$xt->assign("nama_op_fieldblock",true);
	else
		$xt->assign("nama_op_tabfieldblock",true);
////////////////////////////////////////////
//alamat_op - 
	
	$value = $pageObject->showDBValue("alamat_op", $data, $keylink);
	if($mainTableOwnerID=="alamat_op")
		$ownerIdValue=$value;
	$xt->assign("alamat_op_value",$value);
	if(!$pageObject->isAppearOnTabs("alamat_op"))
		$xt->assign("alamat_op_fieldblock",true);
	else
		$xt->assign("alamat_op_tabfieldblock",true);
////////////////////////////////////////////
//nomor_tagihan - 
	
	$value = $pageObject->showDBValue("nomor_tagihan", $data, $keylink);
	if($mainTableOwnerID=="nomor_tagihan")
		$ownerIdValue=$value;
	$xt->assign("nomor_tagihan_value",$value);
	if(!$pageObject->isAppearOnTabs("nomor_tagihan"))
		$xt->assign("nomor_tagihan_fieldblock",true);
	else
		$xt->assign("nomor_tagihan_tabfieldblock",true);
////////////////////////////////////////////
//pokok - Number
	
	$value = $pageObject->showDBValue("pokok", $data, $keylink);
	if($mainTableOwnerID=="pokok")
		$ownerIdValue=$value;
	$xt->assign("pokok_value",$value);
	if(!$pageObject->isAppearOnTabs("pokok"))
		$xt->assign("pokok_fieldblock",true);
	else
		$xt->assign("pokok_tabfieldblock",true);
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
//bunga - Number
	
	$value = $pageObject->showDBValue("bunga", $data, $keylink);
	if($mainTableOwnerID=="bunga")
		$ownerIdValue=$value;
	$xt->assign("bunga_value",$value);
	if(!$pageObject->isAppearOnTabs("bunga"))
		$xt->assign("bunga_fieldblock",true);
	else
		$xt->assign("bunga_tabfieldblock",true);
////////////////////////////////////////////
//total - Number
	
	$value = $pageObject->showDBValue("total", $data, $keylink);
	if($mainTableOwnerID=="total")
		$ownerIdValue=$value;
	$xt->assign("total_value",$value);
	if(!$pageObject->isAppearOnTabs("total"))
		$xt->assign("total_fieldblock",true);
	else
		$xt->assign("total_tabfieldblock",true);
////////////////////////////////////////////
//status_bayar - 
	
	$value = $pageObject->showDBValue("status_bayar", $data, $keylink);
	if($mainTableOwnerID=="status_bayar")
		$ownerIdValue=$value;
	$xt->assign("status_bayar_value",$value);
	if(!$pageObject->isAppearOnTabs("status_bayar"))
		$xt->assign("status_bayar_fieldblock",true);
	else
		$xt->assign("status_bayar_tabfieldblock",true);
////////////////////////////////////////////
//jatuh_tempo - Short Date
	
	$value = $pageObject->showDBValue("jatuh_tempo", $data, $keylink);
	if($mainTableOwnerID=="jatuh_tempo")
		$ownerIdValue=$value;
	$xt->assign("jatuh_tempo_value",$value);
	if(!$pageObject->isAppearOnTabs("jatuh_tempo"))
		$xt->assign("jatuh_tempo_fieldblock",true);
	else
		$xt->assign("jatuh_tempo_tabfieldblock",true);
////////////////////////////////////////////
//periode - 
	
	$value = $pageObject->showDBValue("periode", $data, $keylink);
	if($mainTableOwnerID=="periode")
		$ownerIdValue=$value;
	$xt->assign("periode_value",$value);
	if(!$pageObject->isAppearOnTabs("periode"))
		$xt->assign("periode_fieldblock",true);
	else
		$xt->assign("periode_tabfieldblock",true);
////////////////////////////////////////////
//rekening_pokok - 
	
	$value = $pageObject->showDBValue("rekening_pokok", $data, $keylink);
	if($mainTableOwnerID=="rekening_pokok")
		$ownerIdValue=$value;
	$xt->assign("rekening_pokok_value",$value);
	if(!$pageObject->isAppearOnTabs("rekening_pokok"))
		$xt->assign("rekening_pokok_fieldblock",true);
	else
		$xt->assign("rekening_pokok_tabfieldblock",true);
////////////////////////////////////////////
//rekening_denda - 
	
	$value = $pageObject->showDBValue("rekening_denda", $data, $keylink);
	if($mainTableOwnerID=="rekening_denda")
		$ownerIdValue=$value;
	$xt->assign("rekening_denda_value",$value);
	if(!$pageObject->isAppearOnTabs("rekening_denda"))
		$xt->assign("rekening_denda_fieldblock",true);
	else
		$xt->assign("rekening_denda_tabfieldblock",true);
////////////////////////////////////////////
//nama_pokok - 
	
	$value = $pageObject->showDBValue("nama_pokok", $data, $keylink);
	if($mainTableOwnerID=="nama_pokok")
		$ownerIdValue=$value;
	$xt->assign("nama_pokok_value",$value);
	if(!$pageObject->isAppearOnTabs("nama_pokok"))
		$xt->assign("nama_pokok_fieldblock",true);
	else
		$xt->assign("nama_pokok_tabfieldblock",true);
////////////////////////////////////////////
//nama_denda - 
	
	$value = $pageObject->showDBValue("nama_denda", $data, $keylink);
	if($mainTableOwnerID=="nama_denda")
		$ownerIdValue=$value;
	$xt->assign("nama_denda_value",$value);
	if(!$pageObject->isAppearOnTabs("nama_denda"))
		$xt->assign("nama_denda_fieldblock",true);
	else
		$xt->assign("nama_denda_tabfieldblock",true);
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
		$options['masterTable'] = "public.pad_invoice";
		$options['firstTime'] = 1;
		
		$strTableName = $dpParams['strTableNames'][$d];
		include_once("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "public.pad_invoice";
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
	$strTableName = "public.pad_invoice";
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
$xt->assign("editlink_attrs","id=\"editLink".$id."\" name=\"editLink".$id."\" onclick=\"window.location.href='public_pad_invoice_edit.php?".$editlink."'\"");

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
