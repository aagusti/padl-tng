<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

include("include/public_ar_payment_detail_variables.php");

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
$layout->skins["master"] = "empty";
$layout->blocks["top"][] = "master";
$layout->skins["pdf"] = "empty";
$layout->blocks["top"][] = "pdf";$page_layouts["public_ar_payment_detail_print"] = $layout;


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
//	kode - 
			$record["kode_value"] = $pageObject->showDBValue("kode", $data, $keylink);
			$record["kode_class"] = $pageObject->fieldClass("kode");
//	disabled - 
			$record["disabled_value"] = $pageObject->showDBValue("disabled", $data, $keylink);
			$record["disabled_class"] = $pageObject->fieldClass("disabled");
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
//	nama - 
			$record["nama_value"] = $pageObject->showDBValue("nama", $data, $keylink);
			$record["nama_class"] = $pageObject->fieldClass("nama");
//	tahun - 
			$record["tahun_value"] = $pageObject->showDBValue("tahun", $data, $keylink);
			$record["tahun_class"] = $pageObject->fieldClass("tahun");
//	amount - 
			$record["amount_value"] = $pageObject->showDBValue("amount", $data, $keylink);
			$record["amount_class"] = $pageObject->fieldClass("amount");
//	ref_kode - 
			$record["ref_kode_value"] = $pageObject->showDBValue("ref_kode", $data, $keylink);
			$record["ref_kode_class"] = $pageObject->fieldClass("ref_kode");
//	ref_nama - 
			$record["ref_nama_value"] = $pageObject->showDBValue("ref_nama", $data, $keylink);
			$record["ref_nama_class"] = $pageObject->fieldClass("ref_nama");
//	tanggal - Short Date
			$record["tanggal_value"] = $pageObject->showDBValue("tanggal", $data, $keylink);
			$record["tanggal_class"] = $pageObject->fieldClass("tanggal");
//	kecamatan_kd - 
			$record["kecamatan_kd_value"] = $pageObject->showDBValue("kecamatan_kd", $data, $keylink);
			$record["kecamatan_kd_class"] = $pageObject->fieldClass("kecamatan_kd");
//	kecamatan_nm - 
			$record["kecamatan_nm_value"] = $pageObject->showDBValue("kecamatan_nm", $data, $keylink);
			$record["kecamatan_nm_class"] = $pageObject->fieldClass("kecamatan_nm");
//	kelurahan_kd - 
			$record["kelurahan_kd_value"] = $pageObject->showDBValue("kelurahan_kd", $data, $keylink);
			$record["kelurahan_kd_class"] = $pageObject->fieldClass("kelurahan_kd");
//	kelurahan_nm - 
			$record["kelurahan_nm_value"] = $pageObject->showDBValue("kelurahan_nm", $data, $keylink);
			$record["kelurahan_nm_class"] = $pageObject->fieldClass("kelurahan_nm");
//	is_kota - 
			$record["is_kota_value"] = $pageObject->showDBValue("is_kota", $data, $keylink);
			$record["is_kota_class"] = $pageObject->fieldClass("is_kota");
//	sumber_data - 
			$record["sumber_data_value"] = $pageObject->showDBValue("sumber_data", $data, $keylink);
			$record["sumber_data_class"] = $pageObject->fieldClass("sumber_data");
//	sumber_id - 
			$record["sumber_id_value"] = $pageObject->showDBValue("sumber_id", $data, $keylink);
			$record["sumber_id_class"] = $pageObject->fieldClass("sumber_id");
//	bulan - 
			$record["bulan_value"] = $pageObject->showDBValue("bulan", $data, $keylink);
			$record["bulan_class"] = $pageObject->fieldClass("bulan");
//	minggu - 
			$record["minggu_value"] = $pageObject->showDBValue("minggu", $data, $keylink);
			$record["minggu_class"] = $pageObject->fieldClass("minggu");
//	hari - 
			$record["hari_value"] = $pageObject->showDBValue("hari", $data, $keylink);
			$record["hari_class"] = $pageObject->fieldClass("hari");
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
$xt->assign("kode_fieldheadercolumn",true);
$xt->assign("kode_fieldheader",true);
$xt->assign("kode_fieldcolumn",true);
$xt->assign("kode_fieldfootercolumn",true);
$xt->assign("disabled_fieldheadercolumn",true);
$xt->assign("disabled_fieldheader",true);
$xt->assign("disabled_fieldcolumn",true);
$xt->assign("disabled_fieldfootercolumn",true);
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
$xt->assign("nama_fieldheadercolumn",true);
$xt->assign("nama_fieldheader",true);
$xt->assign("nama_fieldcolumn",true);
$xt->assign("nama_fieldfootercolumn",true);
$xt->assign("tahun_fieldheadercolumn",true);
$xt->assign("tahun_fieldheader",true);
$xt->assign("tahun_fieldcolumn",true);
$xt->assign("tahun_fieldfootercolumn",true);
$xt->assign("amount_fieldheadercolumn",true);
$xt->assign("amount_fieldheader",true);
$xt->assign("amount_fieldcolumn",true);
$xt->assign("amount_fieldfootercolumn",true);
$xt->assign("ref_kode_fieldheadercolumn",true);
$xt->assign("ref_kode_fieldheader",true);
$xt->assign("ref_kode_fieldcolumn",true);
$xt->assign("ref_kode_fieldfootercolumn",true);
$xt->assign("ref_nama_fieldheadercolumn",true);
$xt->assign("ref_nama_fieldheader",true);
$xt->assign("ref_nama_fieldcolumn",true);
$xt->assign("ref_nama_fieldfootercolumn",true);
$xt->assign("tanggal_fieldheadercolumn",true);
$xt->assign("tanggal_fieldheader",true);
$xt->assign("tanggal_fieldcolumn",true);
$xt->assign("tanggal_fieldfootercolumn",true);
$xt->assign("kecamatan_kd_fieldheadercolumn",true);
$xt->assign("kecamatan_kd_fieldheader",true);
$xt->assign("kecamatan_kd_fieldcolumn",true);
$xt->assign("kecamatan_kd_fieldfootercolumn",true);
$xt->assign("kecamatan_nm_fieldheadercolumn",true);
$xt->assign("kecamatan_nm_fieldheader",true);
$xt->assign("kecamatan_nm_fieldcolumn",true);
$xt->assign("kecamatan_nm_fieldfootercolumn",true);
$xt->assign("kelurahan_kd_fieldheadercolumn",true);
$xt->assign("kelurahan_kd_fieldheader",true);
$xt->assign("kelurahan_kd_fieldcolumn",true);
$xt->assign("kelurahan_kd_fieldfootercolumn",true);
$xt->assign("kelurahan_nm_fieldheadercolumn",true);
$xt->assign("kelurahan_nm_fieldheader",true);
$xt->assign("kelurahan_nm_fieldcolumn",true);
$xt->assign("kelurahan_nm_fieldfootercolumn",true);
$xt->assign("is_kota_fieldheadercolumn",true);
$xt->assign("is_kota_fieldheader",true);
$xt->assign("is_kota_fieldcolumn",true);
$xt->assign("is_kota_fieldfootercolumn",true);
$xt->assign("sumber_data_fieldheadercolumn",true);
$xt->assign("sumber_data_fieldheader",true);
$xt->assign("sumber_data_fieldcolumn",true);
$xt->assign("sumber_data_fieldfootercolumn",true);
$xt->assign("sumber_id_fieldheadercolumn",true);
$xt->assign("sumber_id_fieldheader",true);
$xt->assign("sumber_id_fieldcolumn",true);
$xt->assign("sumber_id_fieldfootercolumn",true);
$xt->assign("bulan_fieldheadercolumn",true);
$xt->assign("bulan_fieldheader",true);
$xt->assign("bulan_fieldcolumn",true);
$xt->assign("bulan_fieldfootercolumn",true);
$xt->assign("minggu_fieldheadercolumn",true);
$xt->assign("minggu_fieldheader",true);
$xt->assign("minggu_fieldcolumn",true);
$xt->assign("minggu_fieldfootercolumn",true);
$xt->assign("hari_fieldheadercolumn",true);
$xt->assign("hari_fieldheader",true);
$xt->assign("hari_fieldcolumn",true);
$xt->assign("hari_fieldfootercolumn",true);

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
