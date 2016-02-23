<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

include("include/pad_pad_pemda_variables.php");

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
$layout->blocks["top"][] = "pdf";$page_layouts["pad_pad_pemda_print"] = $layout;


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
$arr['fName'] = "type";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("type");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kepala_nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kepala_nama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "alamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("alamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "telp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("telp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pemda_nama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pemda_nama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ibukota";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ibukota");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tmt";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tmt");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jabatan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jabatan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ppkd_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ppkd_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "reklame_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("reklame_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pendapatan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pendapatan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pemda_nama_singkat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pemda_nama_singkat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "airtanah_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("airtanah_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "self_dok_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("self_dok_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "office_dok_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("office_dok_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tgl_jatuhtempo_self";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tgl_jatuhtempo_self");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "spt_denda";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("spt_denda");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tgl_spt";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tgl_spt");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pad_bunga";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pad_bunga");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "fax";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("fax");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "website";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("website");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "email";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("email");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "daerah";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("daerah");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "alamat_lengkap";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("alamat_lengkap");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ppj_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ppj_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hotel_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hotel_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "walet_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("walet_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "restauran_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("restauran_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hiburan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hiburan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "enabled";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("enabled");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "surat_no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("surat_no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hotel_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hotel_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "restoran_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("restoran_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hiburan_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hiburan_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ppj_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ppj_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "parkir_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("parkir_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "airtanah_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("airtanah_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "reklame_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("reklame_kd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "restauran_kd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("restauran_kd");
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
//	type - 
			$record["type_value"] = $pageObject->showDBValue("type", $data, $keylink);
			$record["type_class"] = $pageObject->fieldClass("type");
//	kepala_nama - 
			$record["kepala_nama_value"] = $pageObject->showDBValue("kepala_nama", $data, $keylink);
			$record["kepala_nama_class"] = $pageObject->fieldClass("kepala_nama");
//	alamat - 
			$record["alamat_value"] = $pageObject->showDBValue("alamat", $data, $keylink);
			$record["alamat_class"] = $pageObject->fieldClass("alamat");
//	telp - 
			$record["telp_value"] = $pageObject->showDBValue("telp", $data, $keylink);
			$record["telp_class"] = $pageObject->fieldClass("telp");
//	pemda_nama - 
			$record["pemda_nama_value"] = $pageObject->showDBValue("pemda_nama", $data, $keylink);
			$record["pemda_nama_class"] = $pageObject->fieldClass("pemda_nama");
//	ibukota - 
			$record["ibukota_value"] = $pageObject->showDBValue("ibukota", $data, $keylink);
			$record["ibukota_class"] = $pageObject->fieldClass("ibukota");
//	tmt - Short Date
			$record["tmt_value"] = $pageObject->showDBValue("tmt", $data, $keylink);
			$record["tmt_class"] = $pageObject->fieldClass("tmt");
//	jabatan - 
			$record["jabatan_value"] = $pageObject->showDBValue("jabatan", $data, $keylink);
			$record["jabatan_class"] = $pageObject->fieldClass("jabatan");
//	ppkd_id - 
			$record["ppkd_id_value"] = $pageObject->showDBValue("ppkd_id", $data, $keylink);
			$record["ppkd_id_class"] = $pageObject->fieldClass("ppkd_id");
//	reklame_id - 
			$record["reklame_id_value"] = $pageObject->showDBValue("reklame_id", $data, $keylink);
			$record["reklame_id_class"] = $pageObject->fieldClass("reklame_id");
//	pendapatan_id - 
			$record["pendapatan_id_value"] = $pageObject->showDBValue("pendapatan_id", $data, $keylink);
			$record["pendapatan_id_class"] = $pageObject->fieldClass("pendapatan_id");
//	pemda_nama_singkat - 
			$record["pemda_nama_singkat_value"] = $pageObject->showDBValue("pemda_nama_singkat", $data, $keylink);
			$record["pemda_nama_singkat_class"] = $pageObject->fieldClass("pemda_nama_singkat");
//	airtanah_id - 
			$record["airtanah_id_value"] = $pageObject->showDBValue("airtanah_id", $data, $keylink);
			$record["airtanah_id_class"] = $pageObject->fieldClass("airtanah_id");
//	self_dok_id - 
			$record["self_dok_id_value"] = $pageObject->showDBValue("self_dok_id", $data, $keylink);
			$record["self_dok_id_class"] = $pageObject->fieldClass("self_dok_id");
//	office_dok_id - 
			$record["office_dok_id_value"] = $pageObject->showDBValue("office_dok_id", $data, $keylink);
			$record["office_dok_id_class"] = $pageObject->fieldClass("office_dok_id");
//	tgl_jatuhtempo_self - 
			$record["tgl_jatuhtempo_self_value"] = $pageObject->showDBValue("tgl_jatuhtempo_self", $data, $keylink);
			$record["tgl_jatuhtempo_self_class"] = $pageObject->fieldClass("tgl_jatuhtempo_self");
//	spt_denda - Number
			$record["spt_denda_value"] = $pageObject->showDBValue("spt_denda", $data, $keylink);
			$record["spt_denda_class"] = $pageObject->fieldClass("spt_denda");
//	tgl_spt - 
			$record["tgl_spt_value"] = $pageObject->showDBValue("tgl_spt", $data, $keylink);
			$record["tgl_spt_class"] = $pageObject->fieldClass("tgl_spt");
//	pad_bunga - Number
			$record["pad_bunga_value"] = $pageObject->showDBValue("pad_bunga", $data, $keylink);
			$record["pad_bunga_class"] = $pageObject->fieldClass("pad_bunga");
//	fax - 
			$record["fax_value"] = $pageObject->showDBValue("fax", $data, $keylink);
			$record["fax_class"] = $pageObject->fieldClass("fax");
//	website - 
			$record["website_value"] = $pageObject->showDBValue("website", $data, $keylink);
			$record["website_class"] = $pageObject->fieldClass("website");
//	email - 
			$record["email_value"] = $pageObject->showDBValue("email", $data, $keylink);
			$record["email_class"] = $pageObject->fieldClass("email");
//	daerah - 
			$record["daerah_value"] = $pageObject->showDBValue("daerah", $data, $keylink);
			$record["daerah_class"] = $pageObject->fieldClass("daerah");
//	alamat_lengkap - 
			$record["alamat_lengkap_value"] = $pageObject->showDBValue("alamat_lengkap", $data, $keylink);
			$record["alamat_lengkap_class"] = $pageObject->fieldClass("alamat_lengkap");
//	ppj_id - 
			$record["ppj_id_value"] = $pageObject->showDBValue("ppj_id", $data, $keylink);
			$record["ppj_id_class"] = $pageObject->fieldClass("ppj_id");
//	hotel_id - 
			$record["hotel_id_value"] = $pageObject->showDBValue("hotel_id", $data, $keylink);
			$record["hotel_id_class"] = $pageObject->fieldClass("hotel_id");
//	walet_id - 
			$record["walet_id_value"] = $pageObject->showDBValue("walet_id", $data, $keylink);
			$record["walet_id_class"] = $pageObject->fieldClass("walet_id");
//	restauran_id - 
			$record["restauran_id_value"] = $pageObject->showDBValue("restauran_id", $data, $keylink);
			$record["restauran_id_class"] = $pageObject->fieldClass("restauran_id");
//	hiburan_id - 
			$record["hiburan_id_value"] = $pageObject->showDBValue("hiburan_id", $data, $keylink);
			$record["hiburan_id_class"] = $pageObject->fieldClass("hiburan_id");
//	parkir_id - 
			$record["parkir_id_value"] = $pageObject->showDBValue("parkir_id", $data, $keylink);
			$record["parkir_id_class"] = $pageObject->fieldClass("parkir_id");
//	enabled - 
			$record["enabled_value"] = $pageObject->showDBValue("enabled", $data, $keylink);
			$record["enabled_class"] = $pageObject->fieldClass("enabled");
//	surat_no - 
			$record["surat_no_value"] = $pageObject->showDBValue("surat_no", $data, $keylink);
			$record["surat_no_class"] = $pageObject->fieldClass("surat_no");
//	ijin_kd - 
			$record["ijin_kd_value"] = $pageObject->showDBValue("ijin_kd", $data, $keylink);
			$record["ijin_kd_class"] = $pageObject->fieldClass("ijin_kd");
//	hotel_kd - 
			$record["hotel_kd_value"] = $pageObject->showDBValue("hotel_kd", $data, $keylink);
			$record["hotel_kd_class"] = $pageObject->fieldClass("hotel_kd");
//	restoran_kd - 
			$record["restoran_kd_value"] = $pageObject->showDBValue("restoran_kd", $data, $keylink);
			$record["restoran_kd_class"] = $pageObject->fieldClass("restoran_kd");
//	hiburan_kd - 
			$record["hiburan_kd_value"] = $pageObject->showDBValue("hiburan_kd", $data, $keylink);
			$record["hiburan_kd_class"] = $pageObject->fieldClass("hiburan_kd");
//	ppj_kd - 
			$record["ppj_kd_value"] = $pageObject->showDBValue("ppj_kd", $data, $keylink);
			$record["ppj_kd_class"] = $pageObject->fieldClass("ppj_kd");
//	parkir_kd - 
			$record["parkir_kd_value"] = $pageObject->showDBValue("parkir_kd", $data, $keylink);
			$record["parkir_kd_class"] = $pageObject->fieldClass("parkir_kd");
//	airtanah_kd - 
			$record["airtanah_kd_value"] = $pageObject->showDBValue("airtanah_kd", $data, $keylink);
			$record["airtanah_kd_class"] = $pageObject->fieldClass("airtanah_kd");
//	reklame_kd - 
			$record["reklame_kd_value"] = $pageObject->showDBValue("reklame_kd", $data, $keylink);
			$record["reklame_kd_class"] = $pageObject->fieldClass("reklame_kd");
//	restauran_kd - 
			$record["restauran_kd_value"] = $pageObject->showDBValue("restauran_kd", $data, $keylink);
			$record["restauran_kd_class"] = $pageObject->fieldClass("restauran_kd");
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
$xt->assign("type_fieldheadercolumn",true);
$xt->assign("type_fieldheader",true);
$xt->assign("type_fieldcolumn",true);
$xt->assign("type_fieldfootercolumn",true);
$xt->assign("kepala_nama_fieldheadercolumn",true);
$xt->assign("kepala_nama_fieldheader",true);
$xt->assign("kepala_nama_fieldcolumn",true);
$xt->assign("kepala_nama_fieldfootercolumn",true);
$xt->assign("alamat_fieldheadercolumn",true);
$xt->assign("alamat_fieldheader",true);
$xt->assign("alamat_fieldcolumn",true);
$xt->assign("alamat_fieldfootercolumn",true);
$xt->assign("telp_fieldheadercolumn",true);
$xt->assign("telp_fieldheader",true);
$xt->assign("telp_fieldcolumn",true);
$xt->assign("telp_fieldfootercolumn",true);
$xt->assign("pemda_nama_fieldheadercolumn",true);
$xt->assign("pemda_nama_fieldheader",true);
$xt->assign("pemda_nama_fieldcolumn",true);
$xt->assign("pemda_nama_fieldfootercolumn",true);
$xt->assign("ibukota_fieldheadercolumn",true);
$xt->assign("ibukota_fieldheader",true);
$xt->assign("ibukota_fieldcolumn",true);
$xt->assign("ibukota_fieldfootercolumn",true);
$xt->assign("tmt_fieldheadercolumn",true);
$xt->assign("tmt_fieldheader",true);
$xt->assign("tmt_fieldcolumn",true);
$xt->assign("tmt_fieldfootercolumn",true);
$xt->assign("jabatan_fieldheadercolumn",true);
$xt->assign("jabatan_fieldheader",true);
$xt->assign("jabatan_fieldcolumn",true);
$xt->assign("jabatan_fieldfootercolumn",true);
$xt->assign("ppkd_id_fieldheadercolumn",true);
$xt->assign("ppkd_id_fieldheader",true);
$xt->assign("ppkd_id_fieldcolumn",true);
$xt->assign("ppkd_id_fieldfootercolumn",true);
$xt->assign("reklame_id_fieldheadercolumn",true);
$xt->assign("reklame_id_fieldheader",true);
$xt->assign("reklame_id_fieldcolumn",true);
$xt->assign("reklame_id_fieldfootercolumn",true);
$xt->assign("pendapatan_id_fieldheadercolumn",true);
$xt->assign("pendapatan_id_fieldheader",true);
$xt->assign("pendapatan_id_fieldcolumn",true);
$xt->assign("pendapatan_id_fieldfootercolumn",true);
$xt->assign("pemda_nama_singkat_fieldheadercolumn",true);
$xt->assign("pemda_nama_singkat_fieldheader",true);
$xt->assign("pemda_nama_singkat_fieldcolumn",true);
$xt->assign("pemda_nama_singkat_fieldfootercolumn",true);
$xt->assign("airtanah_id_fieldheadercolumn",true);
$xt->assign("airtanah_id_fieldheader",true);
$xt->assign("airtanah_id_fieldcolumn",true);
$xt->assign("airtanah_id_fieldfootercolumn",true);
$xt->assign("self_dok_id_fieldheadercolumn",true);
$xt->assign("self_dok_id_fieldheader",true);
$xt->assign("self_dok_id_fieldcolumn",true);
$xt->assign("self_dok_id_fieldfootercolumn",true);
$xt->assign("office_dok_id_fieldheadercolumn",true);
$xt->assign("office_dok_id_fieldheader",true);
$xt->assign("office_dok_id_fieldcolumn",true);
$xt->assign("office_dok_id_fieldfootercolumn",true);
$xt->assign("tgl_jatuhtempo_self_fieldheadercolumn",true);
$xt->assign("tgl_jatuhtempo_self_fieldheader",true);
$xt->assign("tgl_jatuhtempo_self_fieldcolumn",true);
$xt->assign("tgl_jatuhtempo_self_fieldfootercolumn",true);
$xt->assign("spt_denda_fieldheadercolumn",true);
$xt->assign("spt_denda_fieldheader",true);
$xt->assign("spt_denda_fieldcolumn",true);
$xt->assign("spt_denda_fieldfootercolumn",true);
$xt->assign("tgl_spt_fieldheadercolumn",true);
$xt->assign("tgl_spt_fieldheader",true);
$xt->assign("tgl_spt_fieldcolumn",true);
$xt->assign("tgl_spt_fieldfootercolumn",true);
$xt->assign("pad_bunga_fieldheadercolumn",true);
$xt->assign("pad_bunga_fieldheader",true);
$xt->assign("pad_bunga_fieldcolumn",true);
$xt->assign("pad_bunga_fieldfootercolumn",true);
$xt->assign("fax_fieldheadercolumn",true);
$xt->assign("fax_fieldheader",true);
$xt->assign("fax_fieldcolumn",true);
$xt->assign("fax_fieldfootercolumn",true);
$xt->assign("website_fieldheadercolumn",true);
$xt->assign("website_fieldheader",true);
$xt->assign("website_fieldcolumn",true);
$xt->assign("website_fieldfootercolumn",true);
$xt->assign("email_fieldheadercolumn",true);
$xt->assign("email_fieldheader",true);
$xt->assign("email_fieldcolumn",true);
$xt->assign("email_fieldfootercolumn",true);
$xt->assign("daerah_fieldheadercolumn",true);
$xt->assign("daerah_fieldheader",true);
$xt->assign("daerah_fieldcolumn",true);
$xt->assign("daerah_fieldfootercolumn",true);
$xt->assign("alamat_lengkap_fieldheadercolumn",true);
$xt->assign("alamat_lengkap_fieldheader",true);
$xt->assign("alamat_lengkap_fieldcolumn",true);
$xt->assign("alamat_lengkap_fieldfootercolumn",true);
$xt->assign("ppj_id_fieldheadercolumn",true);
$xt->assign("ppj_id_fieldheader",true);
$xt->assign("ppj_id_fieldcolumn",true);
$xt->assign("ppj_id_fieldfootercolumn",true);
$xt->assign("hotel_id_fieldheadercolumn",true);
$xt->assign("hotel_id_fieldheader",true);
$xt->assign("hotel_id_fieldcolumn",true);
$xt->assign("hotel_id_fieldfootercolumn",true);
$xt->assign("walet_id_fieldheadercolumn",true);
$xt->assign("walet_id_fieldheader",true);
$xt->assign("walet_id_fieldcolumn",true);
$xt->assign("walet_id_fieldfootercolumn",true);
$xt->assign("restauran_id_fieldheadercolumn",true);
$xt->assign("restauran_id_fieldheader",true);
$xt->assign("restauran_id_fieldcolumn",true);
$xt->assign("restauran_id_fieldfootercolumn",true);
$xt->assign("hiburan_id_fieldheadercolumn",true);
$xt->assign("hiburan_id_fieldheader",true);
$xt->assign("hiburan_id_fieldcolumn",true);
$xt->assign("hiburan_id_fieldfootercolumn",true);
$xt->assign("parkir_id_fieldheadercolumn",true);
$xt->assign("parkir_id_fieldheader",true);
$xt->assign("parkir_id_fieldcolumn",true);
$xt->assign("parkir_id_fieldfootercolumn",true);
$xt->assign("enabled_fieldheadercolumn",true);
$xt->assign("enabled_fieldheader",true);
$xt->assign("enabled_fieldcolumn",true);
$xt->assign("enabled_fieldfootercolumn",true);
$xt->assign("surat_no_fieldheadercolumn",true);
$xt->assign("surat_no_fieldheader",true);
$xt->assign("surat_no_fieldcolumn",true);
$xt->assign("surat_no_fieldfootercolumn",true);
$xt->assign("ijin_kd_fieldheadercolumn",true);
$xt->assign("ijin_kd_fieldheader",true);
$xt->assign("ijin_kd_fieldcolumn",true);
$xt->assign("ijin_kd_fieldfootercolumn",true);
$xt->assign("hotel_kd_fieldheadercolumn",true);
$xt->assign("hotel_kd_fieldheader",true);
$xt->assign("hotel_kd_fieldcolumn",true);
$xt->assign("hotel_kd_fieldfootercolumn",true);
$xt->assign("restoran_kd_fieldheadercolumn",true);
$xt->assign("restoran_kd_fieldheader",true);
$xt->assign("restoran_kd_fieldcolumn",true);
$xt->assign("restoran_kd_fieldfootercolumn",true);
$xt->assign("hiburan_kd_fieldheadercolumn",true);
$xt->assign("hiburan_kd_fieldheader",true);
$xt->assign("hiburan_kd_fieldcolumn",true);
$xt->assign("hiburan_kd_fieldfootercolumn",true);
$xt->assign("ppj_kd_fieldheadercolumn",true);
$xt->assign("ppj_kd_fieldheader",true);
$xt->assign("ppj_kd_fieldcolumn",true);
$xt->assign("ppj_kd_fieldfootercolumn",true);
$xt->assign("parkir_kd_fieldheadercolumn",true);
$xt->assign("parkir_kd_fieldheader",true);
$xt->assign("parkir_kd_fieldcolumn",true);
$xt->assign("parkir_kd_fieldfootercolumn",true);
$xt->assign("airtanah_kd_fieldheadercolumn",true);
$xt->assign("airtanah_kd_fieldheader",true);
$xt->assign("airtanah_kd_fieldcolumn",true);
$xt->assign("airtanah_kd_fieldfootercolumn",true);
$xt->assign("reklame_kd_fieldheadercolumn",true);
$xt->assign("reklame_kd_fieldheader",true);
$xt->assign("reklame_kd_fieldcolumn",true);
$xt->assign("reklame_kd_fieldfootercolumn",true);
$xt->assign("restauran_kd_fieldheadercolumn",true);
$xt->assign("restauran_kd_fieldheader",true);
$xt->assign("restauran_kd_fieldcolumn",true);
$xt->assign("restauran_kd_fieldfootercolumn",true);

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
