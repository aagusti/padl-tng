<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

include("include/pad_pad_anggaran_variables.php");

if(!isLogged())
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(CheckPermissionsEvent($strTableName, 'P') && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Export"))
{
	echo "<p>"."You don't have permissions to access this table"."<a href=\"login.php\">"."Back to login page"."</a></p>";
	return;
}

$layout = new TLayout("print","RoundedGreen","MobileGreen");
$layout->blocks["center"] = array();
$layout->containers["grid"] = array();

$layout->containers["grid"][] = array("name"=>"printgrid","block"=>"grid_block","substyle"=>1);


$layout->skins["grid"] = "empty";
$layout->blocks["center"][] = "grid";$layout->blocks["top"] = array();
$layout->containers["master"] = array();

$layout->containers["master"][] = array("name"=>"masterinfoprint","block"=>"mastertable_block","substyle"=>1);


$layout->skins["master"] = "empty";
$layout->blocks["top"][] = "master";
$layout->skins["pdf"] = "empty";
$layout->blocks["top"][] = "pdf";$page_layouts["pad_pad_anggaran_print"] = $layout;


include('include/xtempl.php');
include('classes/runnerpage.php');

$cipherer = new RunnerCipherer($strTableName);

$xt = new Xtempl();
$id = postvalue("id") != "" ? postvalue("id") : 1;
$all = postvalue("all");
$pageName = "print.php";

//array of params for classes
$params = array("id" => $id,
				"tName" => $strTableName,
				"pageType" => PAGE_PRINT);
$params["xt"] = &$xt;
			
$pageObject = new RunnerPage($params);

// add button events if exist
$pageObject->addButtonHandlers();

// Modify query: remove blob fields from fieldlist.
// Blob fields on a print page are shown using imager.php (for example).
// They don't need to be selected from DB in print.php itself.
$noBlobReplace = false;
if(!postvalue("pdf") && !$noBlobReplace)
	$gQuery->ReplaceFieldsWithDummies($pageObject->pSet->getBinaryFieldsIndices());

//	Before Process event
if($eventObj->exists("BeforeProcessPrint"))
	$eventObj->BeforeProcessPrint($conn, $pageObject);

$strWhereClause="";
$strHavingClause="";
$strSearchCriteria="and";

$selected_recs=array();
if (@$_REQUEST["a"]!="") 
{
	$sWhere = "1=0";	
	
//	process selection
	if (@$_REQUEST["mdelete"])
	{
		foreach(@$_REQUEST["mdelete"] as $ind)
		{
			$keys=array();
			$keys["id"]=refine($_REQUEST["mdelete1"][mdeleteIndex($ind)]);
			$selected_recs[]=$keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<1)
				continue;
			$keys=array();
			$keys["id"]=urldecode($arr[0]);
			$selected_recs[]=$keys;
		}
	}

	foreach($selected_recs as $keys)
	{
		$sWhere = $sWhere . " or ";
		$sWhere.=KeyWhere($keys);
	}
	$strSQL = $gQuery->gSQLWhere($sWhere);
	$strWhereClause=$sWhere;
}
else
{
	$strWhereClause=@$_SESSION[$strTableName."_where"];
	$strHavingClause=@$_SESSION[$strTableName."_having"];
	$strSearchCriteria=@$_SESSION[$strTableName."_criteria"];
	$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
}
if(postvalue("pdf"))
	$strWhereClause = @$_SESSION[$strTableName."_pdfwhere"];

$_SESSION[$strTableName."_pdfwhere"] = $strWhereClause;


$strOrderBy = $_SESSION[$strTableName."_order"];
if(!$strOrderBy)
	$strOrderBy=$gstrOrderBy;
$strSQL.=" ".trim($strOrderBy);

$strSQLbak = $strSQL;
if($eventObj->exists("BeforeQueryPrint"))
	$eventObj->BeforeQueryPrint($strSQL,$strWhereClause,$strOrderBy, $pageObject);

//	Rebuild SQL if needed

if($strSQL!=$strSQLbak)
{
//	changed $strSQL - old style	
	$numrows=GetRowCount($strSQL);
}
else
{
	$strSQL = $gQuery->gSQLWhere($strWhereClause, $strHavingClause, $strSearchCriteria);
	$strSQL.=" ".trim($strOrderBy);
	
	$rowcount=false;
	if($eventObj->exists("ListGetRowCount"))
	{
		$masterKeysReq=array();
		for($i = 0; $i < count($pageObject->detailKeysByM); $i ++)
			$masterKeysReq[]=$_SESSION[$strTableName."_masterkey".($i + 1)];
			$rowcount=$eventObj->ListGetRowCount($pageObject->searchClauseObj,$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs, $pageObject);
	}
	if($rowcount!==false)
		$numrows=$rowcount;
	else
	{
		$numrows = $gQuery->gSQLRowCount($strWhereClause, $strHavingClause, $strSearchCriteria);
	}
}

LogInfo($strSQL);

$mypage=(integer)$_SESSION[$strTableName."_pagenumber"];
if(!$mypage)
	$mypage=1;

//	page size
$PageSize=(integer)$_SESSION[$strTableName."_pagesize"];
if(!$PageSize)
	$PageSize = $pageObject->pSet->getInitialPageSize();

if($PageSize<0)
	$all = 1;	
	
$recno = 1;
$records = 0;	
$maxpages = 1;
$pageindex = 1;
$pageno=1;

// build arrays for sort (to support old code in user-defined events)
if($eventObj->exists("ListQuery"))
{
	$arrFieldForSort = array();
	$arrHowFieldSort = array();
	require_once getabspath('classes/orderclause.php');
	$fieldList = unserialize($_SESSION[$strTableName."_orderFieldsList"]);
	for($i = 0; $i < count($fieldList); $i++)
	{
		$arrFieldForSort[] = $fieldList[$i]->fieldIndex; 
		$arrHowFieldSort[] = $fieldList[$i]->orderDirection; 
	}
}

if(!$all)
{	
	if($numrows)
	{
		$maxRecords = $numrows;
		$maxpages = ceil($maxRecords/$PageSize);
					
		if($mypage > $maxpages)
			$mypage = $maxpages;
		
		if($mypage < 1) 
			$mypage = 1;
		
		$maxrecs = $PageSize;
	}
	$listarray = false;
	if($eventObj->exists("ListQuery"))
		$listarray = $eventObj->ListQuery($pageObject->searchClauseObj, $arrFieldForSort, $arrHowFieldSort, 
			$_SESSION[$strTableName."_mastertable"], $masterKeysReq, $selected_recs, $PageSize, $mypage, $pageObject);
	if($listarray!==false)
		$rs = $listarray;
	else
	{
			if($numrows)
		{
			$maxrecs=$PageSize;
			$strSQL.=" limit ".$PageSize." offset ".(($mypage-1)*$PageSize);
		}
		$rs = db_query($strSQL,$conn);
	}
	
	//	hide colunm headers if needed
	$recordsonpage = $numrows-($mypage-1)*$PageSize;
	if($recordsonpage>$PageSize)
		$recordsonpage = $PageSize;
		
	$xt->assign("page_number",true);
	$xt->assign("maxpages",$maxpages);
	$xt->assign("pageno",$mypage);
}
else
{
	$listarray = false;
	if($eventObj->exists("ListQuery"))
		$listarray=$eventObj->ListQuery($pageObject->searchClauseObj, $arrFieldForSort, $arrHowFieldSort,
			$_SESSION[$strTableName."_mastertable"], $masterKeysReq, $selected_recs, $PageSize, $mypage, $pageObject);
	if($listarray!==false)
		$rs = $listarray;
	else
		$rs = db_query($strSQL,$conn);
	$recordsonpage = $numrows;
	$maxpages = ceil($recordsonpage/30);
	$xt->assign("page_number",true);
	$xt->assign("maxpages",$maxpages);
}


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
$pageObject->setGoogleMapsParams($fieldsArr);

$colsonpage=1;
if($colsonpage>$recordsonpage)
	$colsonpage=$recordsonpage;
if($colsonpage<1)
	$colsonpage=1;


//	fill $rowinfo array
	$pages = array();
	$rowinfo = array();
	$rowinfo["data"] = array();
	if($eventObj->exists("ListFetchArray"))
		$data = $eventObj->ListFetchArray($rs, $pageObject);
	else
		$data = $cipherer->DecryptFetchedArray($rs);

	while($data)
	{
		if($eventObj->exists("BeforeProcessRowPrint"))
		{
			if(!$eventObj->BeforeProcessRowPrint($data, $pageObject))
			{
				if($eventObj->exists("ListFetchArray"))
					$data = $eventObj->ListFetchArray($rs, $pageObject);
				else
					$data = $cipherer->DecryptFetchedArray($rs);
				continue;
			}
		}
		break;
	}
	
	while($data && ($all || $recno<=$PageSize))
	{
		$row = array();
		$row["grid_record"] = array();
		$row["grid_record"]["data"] = array();
		for($col=1;$data && ($all || $recno<=$PageSize) && $col<=1;$col++)
		{
			$record = array();
			$recno++;
			$records++;
			$keylink="";
			$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

//	id - 
			$record["id_value"] = $pageObject->showDBValue("id", $data, $keylink);
			$record["id_class"] = $pageObject->fieldClass("id");
//	rekening_id - 
			$record["rekening_id_value"] = $pageObject->showDBValue("rekening_id", $data, $keylink);
			$record["rekening_id_class"] = $pageObject->fieldClass("rekening_id");
//	status_anggaran - Number
			$record["status_anggaran_value"] = $pageObject->showDBValue("status_anggaran", $data, $keylink);
			$record["status_anggaran_class"] = $pageObject->fieldClass("status_anggaran");
//	target - Number
			$record["target_value"] = $pageObject->showDBValue("target", $data, $keylink);
			$record["target_class"] = $pageObject->fieldClass("target");
//	bulan1 - Number
			$record["bulan1_value"] = $pageObject->showDBValue("bulan1", $data, $keylink);
			$record["bulan1_class"] = $pageObject->fieldClass("bulan1");
//	bulan2 - Number
			$record["bulan2_value"] = $pageObject->showDBValue("bulan2", $data, $keylink);
			$record["bulan2_class"] = $pageObject->fieldClass("bulan2");
//	bulan3 - Number
			$record["bulan3_value"] = $pageObject->showDBValue("bulan3", $data, $keylink);
			$record["bulan3_class"] = $pageObject->fieldClass("bulan3");
//	bulan4 - Number
			$record["bulan4_value"] = $pageObject->showDBValue("bulan4", $data, $keylink);
			$record["bulan4_class"] = $pageObject->fieldClass("bulan4");
//	bulan5 - Number
			$record["bulan5_value"] = $pageObject->showDBValue("bulan5", $data, $keylink);
			$record["bulan5_class"] = $pageObject->fieldClass("bulan5");
//	bulan6 - Number
			$record["bulan6_value"] = $pageObject->showDBValue("bulan6", $data, $keylink);
			$record["bulan6_class"] = $pageObject->fieldClass("bulan6");
//	bulan7 - Number
			$record["bulan7_value"] = $pageObject->showDBValue("bulan7", $data, $keylink);
			$record["bulan7_class"] = $pageObject->fieldClass("bulan7");
//	bulan8 - Number
			$record["bulan8_value"] = $pageObject->showDBValue("bulan8", $data, $keylink);
			$record["bulan8_class"] = $pageObject->fieldClass("bulan8");
//	bulan9 - Number
			$record["bulan9_value"] = $pageObject->showDBValue("bulan9", $data, $keylink);
			$record["bulan9_class"] = $pageObject->fieldClass("bulan9");
//	bulan10 - Number
			$record["bulan10_value"] = $pageObject->showDBValue("bulan10", $data, $keylink);
			$record["bulan10_class"] = $pageObject->fieldClass("bulan10");
//	bulan11 - Number
			$record["bulan11_value"] = $pageObject->showDBValue("bulan11", $data, $keylink);
			$record["bulan11_class"] = $pageObject->fieldClass("bulan11");
//	bulan12 - Number
			$record["bulan12_value"] = $pageObject->showDBValue("bulan12", $data, $keylink);
			$record["bulan12_class"] = $pageObject->fieldClass("bulan12");
//	jumlah - Number
			$record["jumlah_value"] = $pageObject->showDBValue("jumlah", $data, $keylink);
			$record["jumlah_class"] = $pageObject->fieldClass("jumlah");
//	created - Short Date
			$record["created_value"] = $pageObject->showDBValue("created", $data, $keylink);
			$record["created_class"] = $pageObject->fieldClass("created");
//	updated - Short Date
			$record["updated_value"] = $pageObject->showDBValue("updated", $data, $keylink);
			$record["updated_class"] = $pageObject->fieldClass("updated");
//	create_uid - 
			$record["create_uid_value"] = $pageObject->showDBValue("create_uid", $data, $keylink);
			$record["create_uid_class"] = $pageObject->fieldClass("create_uid");
//	update_uid - 
			$record["update_uid_value"] = $pageObject->showDBValue("update_uid", $data, $keylink);
			$record["update_uid_class"] = $pageObject->fieldClass("update_uid");
//	tahun - 
			$record["tahun_value"] = $pageObject->showDBValue("tahun", $data, $keylink);
			$record["tahun_class"] = $pageObject->fieldClass("tahun");
			if($col<$colsonpage)
				$record["endrecord_block"] = true;
			$record["grid_recordheader"] = true;
			$record["grid_vrecord"] = true;
			
			if($eventObj->exists("BeforeMoveNextPrint"))
				$eventObj->BeforeMoveNextPrint($data,$row,$record, $pageObject);
				
			$row["grid_record"]["data"][] = $record;
			
			if($eventObj->exists("ListFetchArray"))
				$data = $eventObj->ListFetchArray($rs, $pageObject);
			else
				$data = $cipherer->DecryptFetchedArray($rs);
				
			while($data)
			{
				if($eventObj->exists("BeforeProcessRowPrint"))
				{
					if(!$eventObj->BeforeProcessRowPrint($data, $pageObject))
					{
						if($eventObj->exists("ListFetchArray"))
							$data = $eventObj->ListFetchArray($rs, $pageObject);
						else
							$data = $cipherer->DecryptFetchedArray($rs);
						continue;
					}
				}
				break;
			}
		}
		if($col <= $colsonpage)
		{
			$row["grid_record"]["data"][count($row["grid_record"]["data"])-1]["endrecord_block"] = false;
		}
		$row["grid_rowspace"]=true;
		$row["grid_recordspace"] = array("data"=>array());
		for($i=0;$i<$colsonpage*2-1;$i++)
			$row["grid_recordspace"]["data"][]=true;
		
		$rowinfo["data"][]=$row;
		
		if($all && $records>=30)
		{
			$page=array("grid_row" =>$rowinfo);
			$page["pageno"]=$pageindex;
			$pageindex++;
			$pages[] = $page;
			$records=0;
			$rowinfo=array();
		}
		
	}
	if(count($rowinfo))
	{
		$page=array("grid_row" =>$rowinfo);
		if($all)
			$page["pageno"]=$pageindex;
		$pages[] = $page;
	}
	
	for($i=0;$i<count($pages);$i++)
	{
	 	if($i<count($pages)-1)
			$pages[$i]["begin"]="<div name=page class=printpage>";
		else
		    $pages[$i]["begin"]="<div name=page>";
			
		$pages[$i]["end"]="</div>";
	}

	$page = array();
	$page["data"] = &$pages;
	$xt->assignbyref("page",$page);

	
//	display master table info
$mastertable = $_SESSION[$strTableName."_mastertable"];
$masterkeys = array();

if($mastertable == "pad.pad_rekening")
{
//	include proper masterprint.php code
	include("include/pad_pad_rekening_masterprint.php");
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey1"];
	$params = array("detailtable"=>"pad.pad_anggaran","keys"=>$masterkeys);
	$master = array();
	$master["func"] = "DisplayMasterTableInfo_pad_pad_rekening";
	$master["params"] = $params;
	$xt->assignbyref("showmasterfile",$master);
	$xt->assign("mastertable_block",true);
	$layout = new TLayout("masterprint","RoundedGreen","MobileGreen");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterprintheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterprintfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_rekening_masterprint"] = $layout;

	$layout = GetPageLayout("pad_pad_rekening", 'masterprint');
	if($layout)
	{
		$rtl = $pageObject->xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl.".css"
			, "pagestylepath" => "pagestyles/".$layout->name.$rtl.".css");
		$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE'.".css");
	}	
}

$strSQL = $_SESSION[$strTableName."_sql"];

$isPdfView = false;
$hasEvents = false;
if ($pageObject->pSet->isUsebuttonHandlers() || $isPdfView || $hasEvents)
{
	$pageObject->body["begin"] .="<script type=\"text/javascript\" src=\"include/loadfirst.js\"></script>\r\n";
		$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/lang/".getLangFileName(mlang_getcurrentlang()).".js\"></script>";
	
	$pageObject->fillSetCntrlMaps();
	$pageObject->body['end'] .= '<script>';
	$pageObject->body['end'] .= "window.controlsMap = ".my_json_encode($pageObject->controlsHTMLMap).";";
	$pageObject->body['end'] .= "window.viewControlsMap = ".my_json_encode($pageObject->viewControlsHTMLMap).";";
	$pageObject->body['end'] .= "window.settings = ".my_json_encode($pageObject->jsSettings).";";
	$pageObject->body['end'] .= '</script>';
		$pageObject->body["end"] .= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerAll.js\"></script>\r\n";
	$pageObject->addCommonJs();
}


if ($pageObject->pSet->isUsebuttonHandlers() || $isPdfView || $hasEvents)
	$pageObject->body["end"] .= "<script>".$pageObject->PrepareJS()."</script>";

$xt->assignbyref("body",$pageObject->body);
$xt->assign("grid_block",true);

$xt->assign("id_fieldheadercolumn",true);
$xt->assign("id_fieldheader",true);
$xt->assign("id_fieldcolumn",true);
$xt->assign("id_fieldfootercolumn",true);
$xt->assign("rekening_id_fieldheadercolumn",true);
$xt->assign("rekening_id_fieldheader",true);
$xt->assign("rekening_id_fieldcolumn",true);
$xt->assign("rekening_id_fieldfootercolumn",true);
$xt->assign("status_anggaran_fieldheadercolumn",true);
$xt->assign("status_anggaran_fieldheader",true);
$xt->assign("status_anggaran_fieldcolumn",true);
$xt->assign("status_anggaran_fieldfootercolumn",true);
$xt->assign("target_fieldheadercolumn",true);
$xt->assign("target_fieldheader",true);
$xt->assign("target_fieldcolumn",true);
$xt->assign("target_fieldfootercolumn",true);
$xt->assign("bulan1_fieldheadercolumn",true);
$xt->assign("bulan1_fieldheader",true);
$xt->assign("bulan1_fieldcolumn",true);
$xt->assign("bulan1_fieldfootercolumn",true);
$xt->assign("bulan2_fieldheadercolumn",true);
$xt->assign("bulan2_fieldheader",true);
$xt->assign("bulan2_fieldcolumn",true);
$xt->assign("bulan2_fieldfootercolumn",true);
$xt->assign("bulan3_fieldheadercolumn",true);
$xt->assign("bulan3_fieldheader",true);
$xt->assign("bulan3_fieldcolumn",true);
$xt->assign("bulan3_fieldfootercolumn",true);
$xt->assign("bulan4_fieldheadercolumn",true);
$xt->assign("bulan4_fieldheader",true);
$xt->assign("bulan4_fieldcolumn",true);
$xt->assign("bulan4_fieldfootercolumn",true);
$xt->assign("bulan5_fieldheadercolumn",true);
$xt->assign("bulan5_fieldheader",true);
$xt->assign("bulan5_fieldcolumn",true);
$xt->assign("bulan5_fieldfootercolumn",true);
$xt->assign("bulan6_fieldheadercolumn",true);
$xt->assign("bulan6_fieldheader",true);
$xt->assign("bulan6_fieldcolumn",true);
$xt->assign("bulan6_fieldfootercolumn",true);
$xt->assign("bulan7_fieldheadercolumn",true);
$xt->assign("bulan7_fieldheader",true);
$xt->assign("bulan7_fieldcolumn",true);
$xt->assign("bulan7_fieldfootercolumn",true);
$xt->assign("bulan8_fieldheadercolumn",true);
$xt->assign("bulan8_fieldheader",true);
$xt->assign("bulan8_fieldcolumn",true);
$xt->assign("bulan8_fieldfootercolumn",true);
$xt->assign("bulan9_fieldheadercolumn",true);
$xt->assign("bulan9_fieldheader",true);
$xt->assign("bulan9_fieldcolumn",true);
$xt->assign("bulan9_fieldfootercolumn",true);
$xt->assign("bulan10_fieldheadercolumn",true);
$xt->assign("bulan10_fieldheader",true);
$xt->assign("bulan10_fieldcolumn",true);
$xt->assign("bulan10_fieldfootercolumn",true);
$xt->assign("bulan11_fieldheadercolumn",true);
$xt->assign("bulan11_fieldheader",true);
$xt->assign("bulan11_fieldcolumn",true);
$xt->assign("bulan11_fieldfootercolumn",true);
$xt->assign("bulan12_fieldheadercolumn",true);
$xt->assign("bulan12_fieldheader",true);
$xt->assign("bulan12_fieldcolumn",true);
$xt->assign("bulan12_fieldfootercolumn",true);
$xt->assign("jumlah_fieldheadercolumn",true);
$xt->assign("jumlah_fieldheader",true);
$xt->assign("jumlah_fieldcolumn",true);
$xt->assign("jumlah_fieldfootercolumn",true);
$xt->assign("created_fieldheadercolumn",true);
$xt->assign("created_fieldheader",true);
$xt->assign("created_fieldcolumn",true);
$xt->assign("created_fieldfootercolumn",true);
$xt->assign("updated_fieldheadercolumn",true);
$xt->assign("updated_fieldheader",true);
$xt->assign("updated_fieldcolumn",true);
$xt->assign("updated_fieldfootercolumn",true);
$xt->assign("create_uid_fieldheadercolumn",true);
$xt->assign("create_uid_fieldheader",true);
$xt->assign("create_uid_fieldcolumn",true);
$xt->assign("create_uid_fieldfootercolumn",true);
$xt->assign("update_uid_fieldheadercolumn",true);
$xt->assign("update_uid_fieldheader",true);
$xt->assign("update_uid_fieldcolumn",true);
$xt->assign("update_uid_fieldfootercolumn",true);
$xt->assign("tahun_fieldheadercolumn",true);
$xt->assign("tahun_fieldheader",true);
$xt->assign("tahun_fieldcolumn",true);
$xt->assign("tahun_fieldfootercolumn",true);

	$record_header=array("data"=>array());
	$record_footer=array("data"=>array());
	for($i=0;$i<$colsonpage;$i++)
	{
		$rheader=array();
		$rfooter=array();
		if($i<$colsonpage-1)
		{
			$rheader["endrecordheader_block"]=true;
			$rfooter["endrecordheader_block"]=true;
		}
		$record_header["data"][]=$rheader;
		$record_footer["data"][]=$rfooter;
	}
	$xt->assignbyref("record_header",$record_header);
	$xt->assignbyref("record_footer",$record_footer);
	$xt->assign("grid_header",true);
	$xt->assign("grid_footer",true);

if($eventObj->exists("BeforeShowPrint"))
	$eventObj->BeforeShowPrint($xt,$pageObject->templatefile, $pageObject);

if(!postvalue("pdf"))
	$xt->display($pageObject->templatefile);
else
{
	$xt->load_template($pageObject->templatefile);
	$page = $xt->fetch_loaded();
	$pagewidth=postvalue("width")*1.05;
	$pageheight=postvalue("height")*1.05;
	$landscape=false;
		if($pagewidth>$pageheight)
		{
			$landscape=true;
			if($pagewidth/$pageheight<297/210)
				$pagewidth = 297/210*$pageheight;
		}
		else
		{
			if($pagewidth/$pageheight<210/297)
				$pagewidth = 210/297*$pageheight;
		}
}
?>
