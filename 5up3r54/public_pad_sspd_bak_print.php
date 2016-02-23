<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

include("include/public_pad_sspd_bak_variables.php");

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
$layout->blocks["top"][] = "pdf";$page_layouts["public_pad_sspd_bak_print"] = $layout;


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
			$selected_recs[]=$keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<0)
				continue;
			$keys=array();
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
$arr['fName'] = "tahun";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tahun");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "sspdno";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("sspdno");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "sspdtgl";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("sspdtgl");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "spt_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("spt_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bunga";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bunga");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "bulan_telat";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("bulan_telat");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "hitung_bunga";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("hitung_bunga");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "printed";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("printed");
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
$arr['fName'] = "sspdjam";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("sspdjam");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "tp_id";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("tp_id");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "is_validated";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("is_validated");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "keterangan";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("keterangan");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "denda";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("denda");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "jml_bayar";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("jml_bayar");
$fieldsArr[] = $arr;
$arr = array();
$arr['fName'] = "is_valid";
$arr['viewFormat'] = $pageObject->pSet->getViewFormat("is_valid");
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

//	id - 
			$record["id_value"] = $pageObject->showDBValue("id", $data, $keylink);
			$record["id_class"] = $pageObject->fieldClass("id");
//	tahun - 
			$record["tahun_value"] = $pageObject->showDBValue("tahun", $data, $keylink);
			$record["tahun_class"] = $pageObject->fieldClass("tahun");
//	sspdno - 
			$record["sspdno_value"] = $pageObject->showDBValue("sspdno", $data, $keylink);
			$record["sspdno_class"] = $pageObject->fieldClass("sspdno");
//	sspdtgl - Short Date
			$record["sspdtgl_value"] = $pageObject->showDBValue("sspdtgl", $data, $keylink);
			$record["sspdtgl_class"] = $pageObject->fieldClass("sspdtgl");
//	spt_id - 
			$record["spt_id_value"] = $pageObject->showDBValue("spt_id", $data, $keylink);
			$record["spt_id_class"] = $pageObject->fieldClass("spt_id");
//	bunga - Number
			$record["bunga_value"] = $pageObject->showDBValue("bunga", $data, $keylink);
			$record["bunga_class"] = $pageObject->fieldClass("bunga");
//	bulan_telat - 
			$record["bulan_telat_value"] = $pageObject->showDBValue("bulan_telat", $data, $keylink);
			$record["bulan_telat_class"] = $pageObject->fieldClass("bulan_telat");
//	hitung_bunga - 
			$record["hitung_bunga_value"] = $pageObject->showDBValue("hitung_bunga", $data, $keylink);
			$record["hitung_bunga_class"] = $pageObject->fieldClass("hitung_bunga");
//	printed - 
			$record["printed_value"] = $pageObject->showDBValue("printed", $data, $keylink);
			$record["printed_class"] = $pageObject->fieldClass("printed");
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
//	sspdjam - Time
			$record["sspdjam_value"] = $pageObject->showDBValue("sspdjam", $data, $keylink);
			$record["sspdjam_class"] = $pageObject->fieldClass("sspdjam");
//	tp_id - 
			$record["tp_id_value"] = $pageObject->showDBValue("tp_id", $data, $keylink);
			$record["tp_id_class"] = $pageObject->fieldClass("tp_id");
//	is_validated - 
			$record["is_validated_value"] = $pageObject->showDBValue("is_validated", $data, $keylink);
			$record["is_validated_class"] = $pageObject->fieldClass("is_validated");
//	keterangan - 
			$record["keterangan_value"] = $pageObject->showDBValue("keterangan", $data, $keylink);
			$record["keterangan_class"] = $pageObject->fieldClass("keterangan");
//	denda - 
			$record["denda_value"] = $pageObject->showDBValue("denda", $data, $keylink);
			$record["denda_class"] = $pageObject->fieldClass("denda");
//	jml_bayar - 
			$record["jml_bayar_value"] = $pageObject->showDBValue("jml_bayar", $data, $keylink);
			$record["jml_bayar_class"] = $pageObject->fieldClass("jml_bayar");
//	is_valid - 
			$record["is_valid_value"] = $pageObject->showDBValue("is_valid", $data, $keylink);
			$record["is_valid_class"] = $pageObject->fieldClass("is_valid");
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
$xt->assign("tahun_fieldheadercolumn",true);
$xt->assign("tahun_fieldheader",true);
$xt->assign("tahun_fieldcolumn",true);
$xt->assign("tahun_fieldfootercolumn",true);
$xt->assign("sspdno_fieldheadercolumn",true);
$xt->assign("sspdno_fieldheader",true);
$xt->assign("sspdno_fieldcolumn",true);
$xt->assign("sspdno_fieldfootercolumn",true);
$xt->assign("sspdtgl_fieldheadercolumn",true);
$xt->assign("sspdtgl_fieldheader",true);
$xt->assign("sspdtgl_fieldcolumn",true);
$xt->assign("sspdtgl_fieldfootercolumn",true);
$xt->assign("spt_id_fieldheadercolumn",true);
$xt->assign("spt_id_fieldheader",true);
$xt->assign("spt_id_fieldcolumn",true);
$xt->assign("spt_id_fieldfootercolumn",true);
$xt->assign("bunga_fieldheadercolumn",true);
$xt->assign("bunga_fieldheader",true);
$xt->assign("bunga_fieldcolumn",true);
$xt->assign("bunga_fieldfootercolumn",true);
$xt->assign("bulan_telat_fieldheadercolumn",true);
$xt->assign("bulan_telat_fieldheader",true);
$xt->assign("bulan_telat_fieldcolumn",true);
$xt->assign("bulan_telat_fieldfootercolumn",true);
$xt->assign("hitung_bunga_fieldheadercolumn",true);
$xt->assign("hitung_bunga_fieldheader",true);
$xt->assign("hitung_bunga_fieldcolumn",true);
$xt->assign("hitung_bunga_fieldfootercolumn",true);
$xt->assign("printed_fieldheadercolumn",true);
$xt->assign("printed_fieldheader",true);
$xt->assign("printed_fieldcolumn",true);
$xt->assign("printed_fieldfootercolumn",true);
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
$xt->assign("sspdjam_fieldheadercolumn",true);
$xt->assign("sspdjam_fieldheader",true);
$xt->assign("sspdjam_fieldcolumn",true);
$xt->assign("sspdjam_fieldfootercolumn",true);
$xt->assign("tp_id_fieldheadercolumn",true);
$xt->assign("tp_id_fieldheader",true);
$xt->assign("tp_id_fieldcolumn",true);
$xt->assign("tp_id_fieldfootercolumn",true);
$xt->assign("is_validated_fieldheadercolumn",true);
$xt->assign("is_validated_fieldheader",true);
$xt->assign("is_validated_fieldcolumn",true);
$xt->assign("is_validated_fieldfootercolumn",true);
$xt->assign("keterangan_fieldheadercolumn",true);
$xt->assign("keterangan_fieldheader",true);
$xt->assign("keterangan_fieldcolumn",true);
$xt->assign("keterangan_fieldfootercolumn",true);
$xt->assign("denda_fieldheadercolumn",true);
$xt->assign("denda_fieldheader",true);
$xt->assign("denda_fieldcolumn",true);
$xt->assign("denda_fieldfootercolumn",true);
$xt->assign("jml_bayar_fieldheadercolumn",true);
$xt->assign("jml_bayar_fieldheader",true);
$xt->assign("jml_bayar_fieldcolumn",true);
$xt->assign("jml_bayar_fieldfootercolumn",true);
$xt->assign("is_valid_fieldheadercolumn",true);
$xt->assign("is_valid_fieldheader",true);
$xt->assign("is_valid_fieldcolumn",true);
$xt->assign("is_valid_fieldfootercolumn",true);

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
