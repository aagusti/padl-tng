<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

include("include/pad_pad_daftar_variables.php");

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
$layout->blocks["top"][] = "pdf";$page_layouts["pad_pad_daftar_print"] = $layout;


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
$arr['fName'] = "rp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("rp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pb";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pb");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "formno";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("formno");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "reg_date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("reg_date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "customernm";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("customernm");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kecamatan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kecamatan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kelurahan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kelurahan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kabupaten";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kabupaten");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "alamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("alamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kodepos";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kodepos");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "telphone";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("telphone");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpnama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpnama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpalamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpalamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpkelurahan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpkelurahan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpkecamatan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpkecamatan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpkabupaten";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpkabupaten");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wptelp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wptelp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "wpkodepos";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("wpkodepos");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pnama";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pnama");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "palamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("palamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pkelurahan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pkelurahan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pkecamatan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pkecamatan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pkabupaten";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pkabupaten");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ptelp";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ptelp");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "pkodepos";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("pkodepos");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin1";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin1");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin1no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin1no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin1tgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin1tgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin1tglakhir";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin1tglakhir");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin2";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin2");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin2no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin2no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin2tgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin2tgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin2tglakhir";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin2tglakhir");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin3";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin3");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin3no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin3no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin3tgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin3tgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin3tglakhir";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin3tglakhir");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin4";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin4");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin4no";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin4no");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin4tgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin4tgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "ijin4tglakhir";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("ijin4tglakhir");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "enabled";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("enabled");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "create_date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("create_date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "create_uid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("create_uid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "write_date";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("write_date");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "write_uid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("write_uid");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "op_nm";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("op_nm");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "op_alamat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("op_alamat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "op_usaha_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("op_usaha_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "op_so";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("op_so");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "op_kecamatan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("op_kecamatan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "op_kelurahan_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("op_kelurahan_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "op_latitude";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("op_latitude");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "op_longitude";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("op_longitude");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_restojmlmeja";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_restojmlmeja");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_restojmlkursi";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_restojmlkursi");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_restojmltamu";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_restojmltamu");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_filmkursi";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_filmkursi");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_filmpertunjukan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_filmpertunjukan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_filmtarif";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_filmtarif");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_bilyarmeja";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_bilyarmeja");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_bilyartarif";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_bilyartarif");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_bilyarkegiatan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_bilyarkegiatan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_diskopengunjung";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_diskopengunjung");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_diskotarif";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_diskotarif");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "kd_waletvolume";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("kd_waletvolume");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "email";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("email");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "op_pajak_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("op_pajak_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "npwpd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("npwpd");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "passwd";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("passwd");
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
//	rp - 
			$record["rp_value"] = $pageObject->showDBValue("rp", $data, $keylink);
			$record["rp_class"] = $pageObject->fieldClass("rp");
//	pb - 
			$record["pb_value"] = $pageObject->showDBValue("pb", $data, $keylink);
			$record["pb_class"] = $pageObject->fieldClass("pb");
//	formno - 
			$record["formno_value"] = $pageObject->showDBValue("formno", $data, $keylink);
			$record["formno_class"] = $pageObject->fieldClass("formno");
//	reg_date - Short Date
			$record["reg_date_value"] = $pageObject->showDBValue("reg_date", $data, $keylink);
			$record["reg_date_class"] = $pageObject->fieldClass("reg_date");
//	customernm - 
			$record["customernm_value"] = $pageObject->showDBValue("customernm", $data, $keylink);
			$record["customernm_class"] = $pageObject->fieldClass("customernm");
//	kecamatan_id - 
			$record["kecamatan_id_value"] = $pageObject->showDBValue("kecamatan_id", $data, $keylink);
			$record["kecamatan_id_class"] = $pageObject->fieldClass("kecamatan_id");
//	kelurahan_id - 
			$record["kelurahan_id_value"] = $pageObject->showDBValue("kelurahan_id", $data, $keylink);
			$record["kelurahan_id_class"] = $pageObject->fieldClass("kelurahan_id");
//	kabupaten - 
			$record["kabupaten_value"] = $pageObject->showDBValue("kabupaten", $data, $keylink);
			$record["kabupaten_class"] = $pageObject->fieldClass("kabupaten");
//	alamat - 
			$record["alamat_value"] = $pageObject->showDBValue("alamat", $data, $keylink);
			$record["alamat_class"] = $pageObject->fieldClass("alamat");
//	kodepos - 
			$record["kodepos_value"] = $pageObject->showDBValue("kodepos", $data, $keylink);
			$record["kodepos_class"] = $pageObject->fieldClass("kodepos");
//	telphone - 
			$record["telphone_value"] = $pageObject->showDBValue("telphone", $data, $keylink);
			$record["telphone_class"] = $pageObject->fieldClass("telphone");
//	wpnama - 
			$record["wpnama_value"] = $pageObject->showDBValue("wpnama", $data, $keylink);
			$record["wpnama_class"] = $pageObject->fieldClass("wpnama");
//	wpalamat - 
			$record["wpalamat_value"] = $pageObject->showDBValue("wpalamat", $data, $keylink);
			$record["wpalamat_class"] = $pageObject->fieldClass("wpalamat");
//	wpkelurahan - 
			$record["wpkelurahan_value"] = $pageObject->showDBValue("wpkelurahan", $data, $keylink);
			$record["wpkelurahan_class"] = $pageObject->fieldClass("wpkelurahan");
//	wpkecamatan - 
			$record["wpkecamatan_value"] = $pageObject->showDBValue("wpkecamatan", $data, $keylink);
			$record["wpkecamatan_class"] = $pageObject->fieldClass("wpkecamatan");
//	wpkabupaten - 
			$record["wpkabupaten_value"] = $pageObject->showDBValue("wpkabupaten", $data, $keylink);
			$record["wpkabupaten_class"] = $pageObject->fieldClass("wpkabupaten");
//	wptelp - 
			$record["wptelp_value"] = $pageObject->showDBValue("wptelp", $data, $keylink);
			$record["wptelp_class"] = $pageObject->fieldClass("wptelp");
//	wpkodepos - 
			$record["wpkodepos_value"] = $pageObject->showDBValue("wpkodepos", $data, $keylink);
			$record["wpkodepos_class"] = $pageObject->fieldClass("wpkodepos");
//	pnama - 
			$record["pnama_value"] = $pageObject->showDBValue("pnama", $data, $keylink);
			$record["pnama_class"] = $pageObject->fieldClass("pnama");
//	palamat - 
			$record["palamat_value"] = $pageObject->showDBValue("palamat", $data, $keylink);
			$record["palamat_class"] = $pageObject->fieldClass("palamat");
//	pkelurahan - 
			$record["pkelurahan_value"] = $pageObject->showDBValue("pkelurahan", $data, $keylink);
			$record["pkelurahan_class"] = $pageObject->fieldClass("pkelurahan");
//	pkecamatan - 
			$record["pkecamatan_value"] = $pageObject->showDBValue("pkecamatan", $data, $keylink);
			$record["pkecamatan_class"] = $pageObject->fieldClass("pkecamatan");
//	pkabupaten - 
			$record["pkabupaten_value"] = $pageObject->showDBValue("pkabupaten", $data, $keylink);
			$record["pkabupaten_class"] = $pageObject->fieldClass("pkabupaten");
//	ptelp - 
			$record["ptelp_value"] = $pageObject->showDBValue("ptelp", $data, $keylink);
			$record["ptelp_class"] = $pageObject->fieldClass("ptelp");
//	pkodepos - 
			$record["pkodepos_value"] = $pageObject->showDBValue("pkodepos", $data, $keylink);
			$record["pkodepos_class"] = $pageObject->fieldClass("pkodepos");
//	ijin1 - 
			$record["ijin1_value"] = $pageObject->showDBValue("ijin1", $data, $keylink);
			$record["ijin1_class"] = $pageObject->fieldClass("ijin1");
//	ijin1no - 
			$record["ijin1no_value"] = $pageObject->showDBValue("ijin1no", $data, $keylink);
			$record["ijin1no_class"] = $pageObject->fieldClass("ijin1no");
//	ijin1tgl - Short Date
			$record["ijin1tgl_value"] = $pageObject->showDBValue("ijin1tgl", $data, $keylink);
			$record["ijin1tgl_class"] = $pageObject->fieldClass("ijin1tgl");
//	ijin1tglakhir - Short Date
			$record["ijin1tglakhir_value"] = $pageObject->showDBValue("ijin1tglakhir", $data, $keylink);
			$record["ijin1tglakhir_class"] = $pageObject->fieldClass("ijin1tglakhir");
//	ijin2 - 
			$record["ijin2_value"] = $pageObject->showDBValue("ijin2", $data, $keylink);
			$record["ijin2_class"] = $pageObject->fieldClass("ijin2");
//	ijin2no - 
			$record["ijin2no_value"] = $pageObject->showDBValue("ijin2no", $data, $keylink);
			$record["ijin2no_class"] = $pageObject->fieldClass("ijin2no");
//	ijin2tgl - Short Date
			$record["ijin2tgl_value"] = $pageObject->showDBValue("ijin2tgl", $data, $keylink);
			$record["ijin2tgl_class"] = $pageObject->fieldClass("ijin2tgl");
//	ijin2tglakhir - Short Date
			$record["ijin2tglakhir_value"] = $pageObject->showDBValue("ijin2tglakhir", $data, $keylink);
			$record["ijin2tglakhir_class"] = $pageObject->fieldClass("ijin2tglakhir");
//	ijin3 - 
			$record["ijin3_value"] = $pageObject->showDBValue("ijin3", $data, $keylink);
			$record["ijin3_class"] = $pageObject->fieldClass("ijin3");
//	ijin3no - 
			$record["ijin3no_value"] = $pageObject->showDBValue("ijin3no", $data, $keylink);
			$record["ijin3no_class"] = $pageObject->fieldClass("ijin3no");
//	ijin3tgl - Short Date
			$record["ijin3tgl_value"] = $pageObject->showDBValue("ijin3tgl", $data, $keylink);
			$record["ijin3tgl_class"] = $pageObject->fieldClass("ijin3tgl");
//	ijin3tglakhir - Short Date
			$record["ijin3tglakhir_value"] = $pageObject->showDBValue("ijin3tglakhir", $data, $keylink);
			$record["ijin3tglakhir_class"] = $pageObject->fieldClass("ijin3tglakhir");
//	ijin4 - 
			$record["ijin4_value"] = $pageObject->showDBValue("ijin4", $data, $keylink);
			$record["ijin4_class"] = $pageObject->fieldClass("ijin4");
//	ijin4no - 
			$record["ijin4no_value"] = $pageObject->showDBValue("ijin4no", $data, $keylink);
			$record["ijin4no_class"] = $pageObject->fieldClass("ijin4no");
//	ijin4tgl - Short Date
			$record["ijin4tgl_value"] = $pageObject->showDBValue("ijin4tgl", $data, $keylink);
			$record["ijin4tgl_class"] = $pageObject->fieldClass("ijin4tgl");
//	ijin4tglakhir - Short Date
			$record["ijin4tglakhir_value"] = $pageObject->showDBValue("ijin4tglakhir", $data, $keylink);
			$record["ijin4tglakhir_class"] = $pageObject->fieldClass("ijin4tglakhir");
//	enabled - 
			$record["enabled_value"] = $pageObject->showDBValue("enabled", $data, $keylink);
			$record["enabled_class"] = $pageObject->fieldClass("enabled");
//	create_date - Short Date
			$record["create_date_value"] = $pageObject->showDBValue("create_date", $data, $keylink);
			$record["create_date_class"] = $pageObject->fieldClass("create_date");
//	create_uid - 
			$record["create_uid_value"] = $pageObject->showDBValue("create_uid", $data, $keylink);
			$record["create_uid_class"] = $pageObject->fieldClass("create_uid");
//	write_date - Short Date
			$record["write_date_value"] = $pageObject->showDBValue("write_date", $data, $keylink);
			$record["write_date_class"] = $pageObject->fieldClass("write_date");
//	write_uid - 
			$record["write_uid_value"] = $pageObject->showDBValue("write_uid", $data, $keylink);
			$record["write_uid_class"] = $pageObject->fieldClass("write_uid");
//	op_nm - 
			$record["op_nm_value"] = $pageObject->showDBValue("op_nm", $data, $keylink);
			$record["op_nm_class"] = $pageObject->fieldClass("op_nm");
//	op_alamat - 
			$record["op_alamat_value"] = $pageObject->showDBValue("op_alamat", $data, $keylink);
			$record["op_alamat_class"] = $pageObject->fieldClass("op_alamat");
//	op_usaha_id - 
			$record["op_usaha_id_value"] = $pageObject->showDBValue("op_usaha_id", $data, $keylink);
			$record["op_usaha_id_class"] = $pageObject->fieldClass("op_usaha_id");
//	op_so - 
			$record["op_so_value"] = $pageObject->showDBValue("op_so", $data, $keylink);
			$record["op_so_class"] = $pageObject->fieldClass("op_so");
//	op_kecamatan_id - 
			$record["op_kecamatan_id_value"] = $pageObject->showDBValue("op_kecamatan_id", $data, $keylink);
			$record["op_kecamatan_id_class"] = $pageObject->fieldClass("op_kecamatan_id");
//	op_kelurahan_id - 
			$record["op_kelurahan_id_value"] = $pageObject->showDBValue("op_kelurahan_id", $data, $keylink);
			$record["op_kelurahan_id_class"] = $pageObject->fieldClass("op_kelurahan_id");
//	op_latitude - Number
			$record["op_latitude_value"] = $pageObject->showDBValue("op_latitude", $data, $keylink);
			$record["op_latitude_class"] = $pageObject->fieldClass("op_latitude");
//	op_longitude - Number
			$record["op_longitude_value"] = $pageObject->showDBValue("op_longitude", $data, $keylink);
			$record["op_longitude_class"] = $pageObject->fieldClass("op_longitude");
//	kd_restojmlmeja - 
			$record["kd_restojmlmeja_value"] = $pageObject->showDBValue("kd_restojmlmeja", $data, $keylink);
			$record["kd_restojmlmeja_class"] = $pageObject->fieldClass("kd_restojmlmeja");
//	kd_restojmlkursi - 
			$record["kd_restojmlkursi_value"] = $pageObject->showDBValue("kd_restojmlkursi", $data, $keylink);
			$record["kd_restojmlkursi_class"] = $pageObject->fieldClass("kd_restojmlkursi");
//	kd_restojmltamu - 
			$record["kd_restojmltamu_value"] = $pageObject->showDBValue("kd_restojmltamu", $data, $keylink);
			$record["kd_restojmltamu_class"] = $pageObject->fieldClass("kd_restojmltamu");
//	kd_filmkursi - 
			$record["kd_filmkursi_value"] = $pageObject->showDBValue("kd_filmkursi", $data, $keylink);
			$record["kd_filmkursi_class"] = $pageObject->fieldClass("kd_filmkursi");
//	kd_filmpertunjukan - 
			$record["kd_filmpertunjukan_value"] = $pageObject->showDBValue("kd_filmpertunjukan", $data, $keylink);
			$record["kd_filmpertunjukan_class"] = $pageObject->fieldClass("kd_filmpertunjukan");
//	kd_filmtarif - Number
			$record["kd_filmtarif_value"] = $pageObject->showDBValue("kd_filmtarif", $data, $keylink);
			$record["kd_filmtarif_class"] = $pageObject->fieldClass("kd_filmtarif");
//	kd_bilyarmeja - 
			$record["kd_bilyarmeja_value"] = $pageObject->showDBValue("kd_bilyarmeja", $data, $keylink);
			$record["kd_bilyarmeja_class"] = $pageObject->fieldClass("kd_bilyarmeja");
//	kd_bilyartarif - Number
			$record["kd_bilyartarif_value"] = $pageObject->showDBValue("kd_bilyartarif", $data, $keylink);
			$record["kd_bilyartarif_class"] = $pageObject->fieldClass("kd_bilyartarif");
//	kd_bilyarkegiatan - 
			$record["kd_bilyarkegiatan_value"] = $pageObject->showDBValue("kd_bilyarkegiatan", $data, $keylink);
			$record["kd_bilyarkegiatan_class"] = $pageObject->fieldClass("kd_bilyarkegiatan");
//	kd_diskopengunjung - 
			$record["kd_diskopengunjung_value"] = $pageObject->showDBValue("kd_diskopengunjung", $data, $keylink);
			$record["kd_diskopengunjung_class"] = $pageObject->fieldClass("kd_diskopengunjung");
//	kd_diskotarif - Number
			$record["kd_diskotarif_value"] = $pageObject->showDBValue("kd_diskotarif", $data, $keylink);
			$record["kd_diskotarif_class"] = $pageObject->fieldClass("kd_diskotarif");
//	kd_waletvolume - 
			$record["kd_waletvolume_value"] = $pageObject->showDBValue("kd_waletvolume", $data, $keylink);
			$record["kd_waletvolume_class"] = $pageObject->fieldClass("kd_waletvolume");
//	email - 
			$record["email_value"] = $pageObject->showDBValue("email", $data, $keylink);
			$record["email_class"] = $pageObject->fieldClass("email");
//	op_pajak_id - 
			$record["op_pajak_id_value"] = $pageObject->showDBValue("op_pajak_id", $data, $keylink);
			$record["op_pajak_id_class"] = $pageObject->fieldClass("op_pajak_id");
//	npwpd - 
			$record["npwpd_value"] = $pageObject->showDBValue("npwpd", $data, $keylink);
			$record["npwpd_class"] = $pageObject->fieldClass("npwpd");
//	passwd - 
			$record["passwd_value"] = $pageObject->showDBValue("passwd", $data, $keylink);
			$record["passwd_class"] = $pageObject->fieldClass("passwd");
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

if($mastertable == "pad.pad_kecamatan")
{
//	include proper masterprint.php code
	include("include/pad_pad_kecamatan_masterprint.php");
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey1"];
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey2"];
	$params = array("detailtable"=>"pad.pad_daftar","keys"=>$masterkeys);
	$master = array();
	$master["func"] = "DisplayMasterTableInfo_pad_pad_kecamatan";
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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_kecamatan_masterprint"] = $layout;

	$layout = GetPageLayout("pad_pad_kecamatan", 'masterprint');
	if($layout)
	{
		$rtl = $pageObject->xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$xt->cssFiles[] = array("stylepath" => "styles/".$layout->style.'/style'.$rtl.".css"
			, "pagestylepath" => "pagestyles/".$layout->name.$rtl.".css");
		$xt->IEcssFiles[] = array("stylepathIE" => "styles/".$layout->style.'/styleIE'.".css");
	}	
}

if($mastertable == "pad.pad_kelurahan")
{
//	include proper masterprint.php code
	include("include/pad_pad_kelurahan_masterprint.php");
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey1"];
	$masterkeys[] = @$_SESSION[$strTableName."_masterkey2"];
	$params = array("detailtable"=>"pad.pad_daftar","keys"=>$masterkeys);
	$master = array();
	$master["func"] = "DisplayMasterTableInfo_pad_pad_kelurahan";
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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_kelurahan_masterprint"] = $layout;

	$layout = GetPageLayout("pad_pad_kelurahan", 'masterprint');
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
$xt->assign("rp_fieldheadercolumn",true);
$xt->assign("rp_fieldheader",true);
$xt->assign("rp_fieldcolumn",true);
$xt->assign("rp_fieldfootercolumn",true);
$xt->assign("pb_fieldheadercolumn",true);
$xt->assign("pb_fieldheader",true);
$xt->assign("pb_fieldcolumn",true);
$xt->assign("pb_fieldfootercolumn",true);
$xt->assign("formno_fieldheadercolumn",true);
$xt->assign("formno_fieldheader",true);
$xt->assign("formno_fieldcolumn",true);
$xt->assign("formno_fieldfootercolumn",true);
$xt->assign("reg_date_fieldheadercolumn",true);
$xt->assign("reg_date_fieldheader",true);
$xt->assign("reg_date_fieldcolumn",true);
$xt->assign("reg_date_fieldfootercolumn",true);
$xt->assign("customernm_fieldheadercolumn",true);
$xt->assign("customernm_fieldheader",true);
$xt->assign("customernm_fieldcolumn",true);
$xt->assign("customernm_fieldfootercolumn",true);
$xt->assign("kecamatan_id_fieldheadercolumn",true);
$xt->assign("kecamatan_id_fieldheader",true);
$xt->assign("kecamatan_id_fieldcolumn",true);
$xt->assign("kecamatan_id_fieldfootercolumn",true);
$xt->assign("kelurahan_id_fieldheadercolumn",true);
$xt->assign("kelurahan_id_fieldheader",true);
$xt->assign("kelurahan_id_fieldcolumn",true);
$xt->assign("kelurahan_id_fieldfootercolumn",true);
$xt->assign("kabupaten_fieldheadercolumn",true);
$xt->assign("kabupaten_fieldheader",true);
$xt->assign("kabupaten_fieldcolumn",true);
$xt->assign("kabupaten_fieldfootercolumn",true);
$xt->assign("alamat_fieldheadercolumn",true);
$xt->assign("alamat_fieldheader",true);
$xt->assign("alamat_fieldcolumn",true);
$xt->assign("alamat_fieldfootercolumn",true);
$xt->assign("kodepos_fieldheadercolumn",true);
$xt->assign("kodepos_fieldheader",true);
$xt->assign("kodepos_fieldcolumn",true);
$xt->assign("kodepos_fieldfootercolumn",true);
$xt->assign("telphone_fieldheadercolumn",true);
$xt->assign("telphone_fieldheader",true);
$xt->assign("telphone_fieldcolumn",true);
$xt->assign("telphone_fieldfootercolumn",true);
$xt->assign("wpnama_fieldheadercolumn",true);
$xt->assign("wpnama_fieldheader",true);
$xt->assign("wpnama_fieldcolumn",true);
$xt->assign("wpnama_fieldfootercolumn",true);
$xt->assign("wpalamat_fieldheadercolumn",true);
$xt->assign("wpalamat_fieldheader",true);
$xt->assign("wpalamat_fieldcolumn",true);
$xt->assign("wpalamat_fieldfootercolumn",true);
$xt->assign("wpkelurahan_fieldheadercolumn",true);
$xt->assign("wpkelurahan_fieldheader",true);
$xt->assign("wpkelurahan_fieldcolumn",true);
$xt->assign("wpkelurahan_fieldfootercolumn",true);
$xt->assign("wpkecamatan_fieldheadercolumn",true);
$xt->assign("wpkecamatan_fieldheader",true);
$xt->assign("wpkecamatan_fieldcolumn",true);
$xt->assign("wpkecamatan_fieldfootercolumn",true);
$xt->assign("wpkabupaten_fieldheadercolumn",true);
$xt->assign("wpkabupaten_fieldheader",true);
$xt->assign("wpkabupaten_fieldcolumn",true);
$xt->assign("wpkabupaten_fieldfootercolumn",true);
$xt->assign("wptelp_fieldheadercolumn",true);
$xt->assign("wptelp_fieldheader",true);
$xt->assign("wptelp_fieldcolumn",true);
$xt->assign("wptelp_fieldfootercolumn",true);
$xt->assign("wpkodepos_fieldheadercolumn",true);
$xt->assign("wpkodepos_fieldheader",true);
$xt->assign("wpkodepos_fieldcolumn",true);
$xt->assign("wpkodepos_fieldfootercolumn",true);
$xt->assign("pnama_fieldheadercolumn",true);
$xt->assign("pnama_fieldheader",true);
$xt->assign("pnama_fieldcolumn",true);
$xt->assign("pnama_fieldfootercolumn",true);
$xt->assign("palamat_fieldheadercolumn",true);
$xt->assign("palamat_fieldheader",true);
$xt->assign("palamat_fieldcolumn",true);
$xt->assign("palamat_fieldfootercolumn",true);
$xt->assign("pkelurahan_fieldheadercolumn",true);
$xt->assign("pkelurahan_fieldheader",true);
$xt->assign("pkelurahan_fieldcolumn",true);
$xt->assign("pkelurahan_fieldfootercolumn",true);
$xt->assign("pkecamatan_fieldheadercolumn",true);
$xt->assign("pkecamatan_fieldheader",true);
$xt->assign("pkecamatan_fieldcolumn",true);
$xt->assign("pkecamatan_fieldfootercolumn",true);
$xt->assign("pkabupaten_fieldheadercolumn",true);
$xt->assign("pkabupaten_fieldheader",true);
$xt->assign("pkabupaten_fieldcolumn",true);
$xt->assign("pkabupaten_fieldfootercolumn",true);
$xt->assign("ptelp_fieldheadercolumn",true);
$xt->assign("ptelp_fieldheader",true);
$xt->assign("ptelp_fieldcolumn",true);
$xt->assign("ptelp_fieldfootercolumn",true);
$xt->assign("pkodepos_fieldheadercolumn",true);
$xt->assign("pkodepos_fieldheader",true);
$xt->assign("pkodepos_fieldcolumn",true);
$xt->assign("pkodepos_fieldfootercolumn",true);
$xt->assign("ijin1_fieldheadercolumn",true);
$xt->assign("ijin1_fieldheader",true);
$xt->assign("ijin1_fieldcolumn",true);
$xt->assign("ijin1_fieldfootercolumn",true);
$xt->assign("ijin1no_fieldheadercolumn",true);
$xt->assign("ijin1no_fieldheader",true);
$xt->assign("ijin1no_fieldcolumn",true);
$xt->assign("ijin1no_fieldfootercolumn",true);
$xt->assign("ijin1tgl_fieldheadercolumn",true);
$xt->assign("ijin1tgl_fieldheader",true);
$xt->assign("ijin1tgl_fieldcolumn",true);
$xt->assign("ijin1tgl_fieldfootercolumn",true);
$xt->assign("ijin1tglakhir_fieldheadercolumn",true);
$xt->assign("ijin1tglakhir_fieldheader",true);
$xt->assign("ijin1tglakhir_fieldcolumn",true);
$xt->assign("ijin1tglakhir_fieldfootercolumn",true);
$xt->assign("ijin2_fieldheadercolumn",true);
$xt->assign("ijin2_fieldheader",true);
$xt->assign("ijin2_fieldcolumn",true);
$xt->assign("ijin2_fieldfootercolumn",true);
$xt->assign("ijin2no_fieldheadercolumn",true);
$xt->assign("ijin2no_fieldheader",true);
$xt->assign("ijin2no_fieldcolumn",true);
$xt->assign("ijin2no_fieldfootercolumn",true);
$xt->assign("ijin2tgl_fieldheadercolumn",true);
$xt->assign("ijin2tgl_fieldheader",true);
$xt->assign("ijin2tgl_fieldcolumn",true);
$xt->assign("ijin2tgl_fieldfootercolumn",true);
$xt->assign("ijin2tglakhir_fieldheadercolumn",true);
$xt->assign("ijin2tglakhir_fieldheader",true);
$xt->assign("ijin2tglakhir_fieldcolumn",true);
$xt->assign("ijin2tglakhir_fieldfootercolumn",true);
$xt->assign("ijin3_fieldheadercolumn",true);
$xt->assign("ijin3_fieldheader",true);
$xt->assign("ijin3_fieldcolumn",true);
$xt->assign("ijin3_fieldfootercolumn",true);
$xt->assign("ijin3no_fieldheadercolumn",true);
$xt->assign("ijin3no_fieldheader",true);
$xt->assign("ijin3no_fieldcolumn",true);
$xt->assign("ijin3no_fieldfootercolumn",true);
$xt->assign("ijin3tgl_fieldheadercolumn",true);
$xt->assign("ijin3tgl_fieldheader",true);
$xt->assign("ijin3tgl_fieldcolumn",true);
$xt->assign("ijin3tgl_fieldfootercolumn",true);
$xt->assign("ijin3tglakhir_fieldheadercolumn",true);
$xt->assign("ijin3tglakhir_fieldheader",true);
$xt->assign("ijin3tglakhir_fieldcolumn",true);
$xt->assign("ijin3tglakhir_fieldfootercolumn",true);
$xt->assign("ijin4_fieldheadercolumn",true);
$xt->assign("ijin4_fieldheader",true);
$xt->assign("ijin4_fieldcolumn",true);
$xt->assign("ijin4_fieldfootercolumn",true);
$xt->assign("ijin4no_fieldheadercolumn",true);
$xt->assign("ijin4no_fieldheader",true);
$xt->assign("ijin4no_fieldcolumn",true);
$xt->assign("ijin4no_fieldfootercolumn",true);
$xt->assign("ijin4tgl_fieldheadercolumn",true);
$xt->assign("ijin4tgl_fieldheader",true);
$xt->assign("ijin4tgl_fieldcolumn",true);
$xt->assign("ijin4tgl_fieldfootercolumn",true);
$xt->assign("ijin4tglakhir_fieldheadercolumn",true);
$xt->assign("ijin4tglakhir_fieldheader",true);
$xt->assign("ijin4tglakhir_fieldcolumn",true);
$xt->assign("ijin4tglakhir_fieldfootercolumn",true);
$xt->assign("enabled_fieldheadercolumn",true);
$xt->assign("enabled_fieldheader",true);
$xt->assign("enabled_fieldcolumn",true);
$xt->assign("enabled_fieldfootercolumn",true);
$xt->assign("create_date_fieldheadercolumn",true);
$xt->assign("create_date_fieldheader",true);
$xt->assign("create_date_fieldcolumn",true);
$xt->assign("create_date_fieldfootercolumn",true);
$xt->assign("create_uid_fieldheadercolumn",true);
$xt->assign("create_uid_fieldheader",true);
$xt->assign("create_uid_fieldcolumn",true);
$xt->assign("create_uid_fieldfootercolumn",true);
$xt->assign("write_date_fieldheadercolumn",true);
$xt->assign("write_date_fieldheader",true);
$xt->assign("write_date_fieldcolumn",true);
$xt->assign("write_date_fieldfootercolumn",true);
$xt->assign("write_uid_fieldheadercolumn",true);
$xt->assign("write_uid_fieldheader",true);
$xt->assign("write_uid_fieldcolumn",true);
$xt->assign("write_uid_fieldfootercolumn",true);
$xt->assign("op_nm_fieldheadercolumn",true);
$xt->assign("op_nm_fieldheader",true);
$xt->assign("op_nm_fieldcolumn",true);
$xt->assign("op_nm_fieldfootercolumn",true);
$xt->assign("op_alamat_fieldheadercolumn",true);
$xt->assign("op_alamat_fieldheader",true);
$xt->assign("op_alamat_fieldcolumn",true);
$xt->assign("op_alamat_fieldfootercolumn",true);
$xt->assign("op_usaha_id_fieldheadercolumn",true);
$xt->assign("op_usaha_id_fieldheader",true);
$xt->assign("op_usaha_id_fieldcolumn",true);
$xt->assign("op_usaha_id_fieldfootercolumn",true);
$xt->assign("op_so_fieldheadercolumn",true);
$xt->assign("op_so_fieldheader",true);
$xt->assign("op_so_fieldcolumn",true);
$xt->assign("op_so_fieldfootercolumn",true);
$xt->assign("op_kecamatan_id_fieldheadercolumn",true);
$xt->assign("op_kecamatan_id_fieldheader",true);
$xt->assign("op_kecamatan_id_fieldcolumn",true);
$xt->assign("op_kecamatan_id_fieldfootercolumn",true);
$xt->assign("op_kelurahan_id_fieldheadercolumn",true);
$xt->assign("op_kelurahan_id_fieldheader",true);
$xt->assign("op_kelurahan_id_fieldcolumn",true);
$xt->assign("op_kelurahan_id_fieldfootercolumn",true);
$xt->assign("op_latitude_fieldheadercolumn",true);
$xt->assign("op_latitude_fieldheader",true);
$xt->assign("op_latitude_fieldcolumn",true);
$xt->assign("op_latitude_fieldfootercolumn",true);
$xt->assign("op_longitude_fieldheadercolumn",true);
$xt->assign("op_longitude_fieldheader",true);
$xt->assign("op_longitude_fieldcolumn",true);
$xt->assign("op_longitude_fieldfootercolumn",true);
$xt->assign("kd_restojmlmeja_fieldheadercolumn",true);
$xt->assign("kd_restojmlmeja_fieldheader",true);
$xt->assign("kd_restojmlmeja_fieldcolumn",true);
$xt->assign("kd_restojmlmeja_fieldfootercolumn",true);
$xt->assign("kd_restojmlkursi_fieldheadercolumn",true);
$xt->assign("kd_restojmlkursi_fieldheader",true);
$xt->assign("kd_restojmlkursi_fieldcolumn",true);
$xt->assign("kd_restojmlkursi_fieldfootercolumn",true);
$xt->assign("kd_restojmltamu_fieldheadercolumn",true);
$xt->assign("kd_restojmltamu_fieldheader",true);
$xt->assign("kd_restojmltamu_fieldcolumn",true);
$xt->assign("kd_restojmltamu_fieldfootercolumn",true);
$xt->assign("kd_filmkursi_fieldheadercolumn",true);
$xt->assign("kd_filmkursi_fieldheader",true);
$xt->assign("kd_filmkursi_fieldcolumn",true);
$xt->assign("kd_filmkursi_fieldfootercolumn",true);
$xt->assign("kd_filmpertunjukan_fieldheadercolumn",true);
$xt->assign("kd_filmpertunjukan_fieldheader",true);
$xt->assign("kd_filmpertunjukan_fieldcolumn",true);
$xt->assign("kd_filmpertunjukan_fieldfootercolumn",true);
$xt->assign("kd_filmtarif_fieldheadercolumn",true);
$xt->assign("kd_filmtarif_fieldheader",true);
$xt->assign("kd_filmtarif_fieldcolumn",true);
$xt->assign("kd_filmtarif_fieldfootercolumn",true);
$xt->assign("kd_bilyarmeja_fieldheadercolumn",true);
$xt->assign("kd_bilyarmeja_fieldheader",true);
$xt->assign("kd_bilyarmeja_fieldcolumn",true);
$xt->assign("kd_bilyarmeja_fieldfootercolumn",true);
$xt->assign("kd_bilyartarif_fieldheadercolumn",true);
$xt->assign("kd_bilyartarif_fieldheader",true);
$xt->assign("kd_bilyartarif_fieldcolumn",true);
$xt->assign("kd_bilyartarif_fieldfootercolumn",true);
$xt->assign("kd_bilyarkegiatan_fieldheadercolumn",true);
$xt->assign("kd_bilyarkegiatan_fieldheader",true);
$xt->assign("kd_bilyarkegiatan_fieldcolumn",true);
$xt->assign("kd_bilyarkegiatan_fieldfootercolumn",true);
$xt->assign("kd_diskopengunjung_fieldheadercolumn",true);
$xt->assign("kd_diskopengunjung_fieldheader",true);
$xt->assign("kd_diskopengunjung_fieldcolumn",true);
$xt->assign("kd_diskopengunjung_fieldfootercolumn",true);
$xt->assign("kd_diskotarif_fieldheadercolumn",true);
$xt->assign("kd_diskotarif_fieldheader",true);
$xt->assign("kd_diskotarif_fieldcolumn",true);
$xt->assign("kd_diskotarif_fieldfootercolumn",true);
$xt->assign("kd_waletvolume_fieldheadercolumn",true);
$xt->assign("kd_waletvolume_fieldheader",true);
$xt->assign("kd_waletvolume_fieldcolumn",true);
$xt->assign("kd_waletvolume_fieldfootercolumn",true);
$xt->assign("email_fieldheadercolumn",true);
$xt->assign("email_fieldheader",true);
$xt->assign("email_fieldcolumn",true);
$xt->assign("email_fieldfootercolumn",true);
$xt->assign("op_pajak_id_fieldheadercolumn",true);
$xt->assign("op_pajak_id_fieldheader",true);
$xt->assign("op_pajak_id_fieldcolumn",true);
$xt->assign("op_pajak_id_fieldfootercolumn",true);
$xt->assign("npwpd_fieldheadercolumn",true);
$xt->assign("npwpd_fieldheader",true);
$xt->assign("npwpd_fieldcolumn",true);
$xt->assign("npwpd_fieldfootercolumn",true);
$xt->assign("passwd_fieldheadercolumn",true);
$xt->assign("passwd_fieldheader",true);
$xt->assign("passwd_fieldcolumn",true);
$xt->assign("passwd_fieldfootercolumn",true);

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
