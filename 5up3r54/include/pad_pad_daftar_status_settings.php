<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_daftar_status = array();
	$tdatapad_pad_daftar_status[".NumberOfChars"] = 80; 
	$tdatapad_pad_daftar_status[".ShortName"] = "pad_pad_daftar_status";
	$tdatapad_pad_daftar_status[".OwnerID"] = "";
	$tdatapad_pad_daftar_status[".OriginalTable"] = "pad.pad_daftar_status";

//	field labels
$fieldLabelspad_pad_daftar_status = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_daftar_status["English"] = array();
	$fieldToolTipspad_pad_daftar_status["English"] = array();
	$fieldLabelspad_pad_daftar_status["English"]["id"] = "Id";
	$fieldToolTipspad_pad_daftar_status["English"]["id"] = "";
	$fieldLabelspad_pad_daftar_status["English"]["kode"] = "Kode";
	$fieldToolTipspad_pad_daftar_status["English"]["kode"] = "";
	$fieldLabelspad_pad_daftar_status["English"]["uraian"] = "Uraian";
	$fieldToolTipspad_pad_daftar_status["English"]["uraian"] = "";
	if (count($fieldToolTipspad_pad_daftar_status["English"]))
		$tdatapad_pad_daftar_status[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_daftar_status[".NCSearch"] = true;



$tdatapad_pad_daftar_status[".shortTableName"] = "pad_pad_daftar_status";
$tdatapad_pad_daftar_status[".nSecOptions"] = 0;
$tdatapad_pad_daftar_status[".recsPerRowList"] = 1;
$tdatapad_pad_daftar_status[".mainTableOwnerID"] = "";
$tdatapad_pad_daftar_status[".moveNext"] = 1;
$tdatapad_pad_daftar_status[".nType"] = 0;

$tdatapad_pad_daftar_status[".strOriginalTableName"] = "pad.pad_daftar_status";




$tdatapad_pad_daftar_status[".showAddInPopup"] = false;

$tdatapad_pad_daftar_status[".showEditInPopup"] = false;

$tdatapad_pad_daftar_status[".showViewInPopup"] = false;

$tdatapad_pad_daftar_status[".fieldsForRegister"] = array();

$tdatapad_pad_daftar_status[".listAjax"] = false;

	$tdatapad_pad_daftar_status[".audit"] = false;

	$tdatapad_pad_daftar_status[".locking"] = false;

$tdatapad_pad_daftar_status[".listIcons"] = true;
$tdatapad_pad_daftar_status[".edit"] = true;
$tdatapad_pad_daftar_status[".inlineEdit"] = true;
$tdatapad_pad_daftar_status[".inlineAdd"] = true;
$tdatapad_pad_daftar_status[".view"] = true;

$tdatapad_pad_daftar_status[".exportTo"] = true;

$tdatapad_pad_daftar_status[".printFriendly"] = true;

$tdatapad_pad_daftar_status[".delete"] = true;

$tdatapad_pad_daftar_status[".showSimpleSearchOptions"] = false;

$tdatapad_pad_daftar_status[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_daftar_status[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_daftar_status[".isUseAjaxSuggest"] = true;

$tdatapad_pad_daftar_status[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_daftar_status[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_daftar_status[".isUseTimeForSearch"] = false;



$tdatapad_pad_daftar_status[".useDetailsPreview"] = true;

$tdatapad_pad_daftar_status[".allSearchFields"] = array();

$tdatapad_pad_daftar_status[".allSearchFields"][] = "id";
$tdatapad_pad_daftar_status[".allSearchFields"][] = "kode";
$tdatapad_pad_daftar_status[".allSearchFields"][] = "uraian";

$tdatapad_pad_daftar_status[".googleLikeFields"][] = "id";
$tdatapad_pad_daftar_status[".googleLikeFields"][] = "kode";
$tdatapad_pad_daftar_status[".googleLikeFields"][] = "uraian";


$tdatapad_pad_daftar_status[".advSearchFields"][] = "id";
$tdatapad_pad_daftar_status[".advSearchFields"][] = "kode";
$tdatapad_pad_daftar_status[".advSearchFields"][] = "uraian";

$tdatapad_pad_daftar_status[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdatapad_pad_daftar_status[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_daftar_status[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_daftar_status[".orderindexes"] = array();

$tdatapad_pad_daftar_status[".sqlHead"] = "SELECT id,   kode,   uraian";
$tdatapad_pad_daftar_status[".sqlFrom"] = "FROM \"pad\".pad_daftar_status";
$tdatapad_pad_daftar_status[".sqlWhereExpr"] = "";
$tdatapad_pad_daftar_status[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_daftar_status[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_daftar_status[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_daftar_status = array();
$tableKeyspad_pad_daftar_status[] = "id";
$tdatapad_pad_daftar_status[".Keys"] = $tableKeyspad_pad_daftar_status;

$tdatapad_pad_daftar_status[".listFields"] = array();
$tdatapad_pad_daftar_status[".listFields"][] = "id";
$tdatapad_pad_daftar_status[".listFields"][] = "kode";
$tdatapad_pad_daftar_status[".listFields"][] = "uraian";

$tdatapad_pad_daftar_status[".viewFields"] = array();
$tdatapad_pad_daftar_status[".viewFields"][] = "id";
$tdatapad_pad_daftar_status[".viewFields"][] = "kode";
$tdatapad_pad_daftar_status[".viewFields"][] = "uraian";

$tdatapad_pad_daftar_status[".addFields"] = array();
$tdatapad_pad_daftar_status[".addFields"][] = "kode";
$tdatapad_pad_daftar_status[".addFields"][] = "uraian";

$tdatapad_pad_daftar_status[".inlineAddFields"] = array();
$tdatapad_pad_daftar_status[".inlineAddFields"][] = "kode";
$tdatapad_pad_daftar_status[".inlineAddFields"][] = "uraian";

$tdatapad_pad_daftar_status[".editFields"] = array();
$tdatapad_pad_daftar_status[".editFields"][] = "kode";
$tdatapad_pad_daftar_status[".editFields"][] = "uraian";

$tdatapad_pad_daftar_status[".inlineEditFields"] = array();
$tdatapad_pad_daftar_status[".inlineEditFields"][] = "kode";
$tdatapad_pad_daftar_status[".inlineEditFields"][] = "uraian";

$tdatapad_pad_daftar_status[".exportFields"] = array();
$tdatapad_pad_daftar_status[".exportFields"][] = "id";
$tdatapad_pad_daftar_status[".exportFields"][] = "kode";
$tdatapad_pad_daftar_status[".exportFields"][] = "uraian";

$tdatapad_pad_daftar_status[".printFields"] = array();
$tdatapad_pad_daftar_status[".printFields"][] = "id";
$tdatapad_pad_daftar_status[".printFields"][] = "kode";
$tdatapad_pad_daftar_status[".printFields"][] = "uraian";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_daftar_status";
	$fdata["Label"] = "Id"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "id"; 
		$fdata["FullName"] = "id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar_status["id"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "pad.pad_daftar_status";
	$fdata["Label"] = "Kode"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kode"; 
		$fdata["FullName"] = "kode";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=2";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar_status["kode"] = $fdata;
//	uraian
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "uraian";
	$fdata["GoodName"] = "uraian";
	$fdata["ownerTable"] = "pad.pad_daftar_status";
	$fdata["Label"] = "Uraian"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "uraian"; 
		$fdata["FullName"] = "uraian";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar_status["uraian"] = $fdata;

	
$tables_data["pad.pad_daftar_status"]=&$tdatapad_pad_daftar_status;
$field_labels["pad_pad_daftar_status"] = &$fieldLabelspad_pad_daftar_status;
$fieldToolTips["pad.pad_daftar_status"] = &$fieldToolTipspad_pad_daftar_status;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_daftar_status"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_daftar_hist";
	$detailsParam["dDataSourceTable"]="pad.pad_daftar_hist";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_daftar_hist";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_daftar_status"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_daftar_status"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_daftar_status"][$dIndex]["detailKeys"][]="status_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_daftar_status"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_daftar_status()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   kode,   uraian";
$proto0["m_strFrom"] = "FROM \"pad\".pad_daftar_status";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "pad.pad_daftar_status"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "pad.pad_daftar_status"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "uraian",
	"m_strTable" => "pad.pad_daftar_status"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto11=array();
$proto11["m_link"] = "SQLL_MAIN";
			$proto12=array();
$proto12["m_strName"] = "pad.pad_daftar_status";
$proto12["m_columns"] = array();
$proto12["m_columns"][] = "id";
$proto12["m_columns"][] = "kode";
$proto12["m_columns"][] = "uraian";
$obj = new SQLTable($proto12);

$proto11["m_table"] = $obj;
$proto11["m_alias"] = "";
$proto13=array();
$proto13["m_sql"] = "";
$proto13["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto13["m_column"]=$obj;
$proto13["m_contained"] = array();
$proto13["m_strCase"] = "";
$proto13["m_havingmode"] = "0";
$proto13["m_inBrackets"] = "0";
$proto13["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto13);

$proto11["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto11);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_daftar_status = createSqlQuery_pad_pad_daftar_status();
			$tdatapad_pad_daftar_status[".sqlquery"] = $queryData_pad_pad_daftar_status;
	
if(isset($tdatapad_pad_daftar_status["field2"])){
	$tdatapad_pad_daftar_status["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_daftar_status["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_daftar_status["field2"]["LookupType"] = 4;
	$tdatapad_pad_daftar_status["field2"]["LinkField"] = "email";
	$tdatapad_pad_daftar_status["field2"]["DisplayField"] = "name";
	$tdatapad_pad_daftar_status[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_daftar_status"] = new eventsBase;
$tdatapad_pad_daftar_status[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_daftar_status");

?>