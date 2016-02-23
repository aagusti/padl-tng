<?php
require_once(getabspath("classes/cipherer.php"));
$tdataapp_groups = array();
	$tdataapp_groups[".NumberOfChars"] = 80; 
	$tdataapp_groups[".ShortName"] = "app_groups";
	$tdataapp_groups[".OwnerID"] = "";
	$tdataapp_groups[".OriginalTable"] = "app.groups";

//	field labels
$fieldLabelsapp_groups = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsapp_groups["English"] = array();
	$fieldToolTipsapp_groups["English"] = array();
	$fieldLabelsapp_groups["English"]["id"] = "Id";
	$fieldToolTipsapp_groups["English"]["id"] = "";
	$fieldLabelsapp_groups["English"]["nama"] = "Nama";
	$fieldToolTipsapp_groups["English"]["nama"] = "";
	$fieldLabelsapp_groups["English"]["locked"] = "Locked";
	$fieldToolTipsapp_groups["English"]["locked"] = "";
	$fieldLabelsapp_groups["English"]["kode"] = "Kode";
	$fieldToolTipsapp_groups["English"]["kode"] = "";
	if (count($fieldToolTipsapp_groups["English"]))
		$tdataapp_groups[".isUseToolTips"] = true;
}
	
	
	$tdataapp_groups[".NCSearch"] = true;



$tdataapp_groups[".shortTableName"] = "app_groups";
$tdataapp_groups[".nSecOptions"] = 0;
$tdataapp_groups[".recsPerRowList"] = 1;
$tdataapp_groups[".mainTableOwnerID"] = "";
$tdataapp_groups[".moveNext"] = 1;
$tdataapp_groups[".nType"] = 0;

$tdataapp_groups[".strOriginalTableName"] = "app.groups";




$tdataapp_groups[".showAddInPopup"] = false;

$tdataapp_groups[".showEditInPopup"] = false;

$tdataapp_groups[".showViewInPopup"] = false;

$tdataapp_groups[".fieldsForRegister"] = array();

$tdataapp_groups[".listAjax"] = false;

	$tdataapp_groups[".audit"] = false;

	$tdataapp_groups[".locking"] = false;

$tdataapp_groups[".listIcons"] = true;
$tdataapp_groups[".edit"] = true;
$tdataapp_groups[".inlineEdit"] = true;
$tdataapp_groups[".inlineAdd"] = true;
$tdataapp_groups[".view"] = true;



$tdataapp_groups[".delete"] = true;

$tdataapp_groups[".showSimpleSearchOptions"] = false;

$tdataapp_groups[".showSearchPanel"] = true;

if (isMobile())
	$tdataapp_groups[".isUseAjaxSuggest"] = false;
else 
	$tdataapp_groups[".isUseAjaxSuggest"] = true;

$tdataapp_groups[".rowHighlite"] = true;

// button handlers file names

$tdataapp_groups[".addPageEvents"] = false;

// use timepicker for search panel
$tdataapp_groups[".isUseTimeForSearch"] = false;



$tdataapp_groups[".useDetailsPreview"] = true;

$tdataapp_groups[".allSearchFields"] = array();

$tdataapp_groups[".allSearchFields"][] = "id";
$tdataapp_groups[".allSearchFields"][] = "nama";
$tdataapp_groups[".allSearchFields"][] = "locked";
$tdataapp_groups[".allSearchFields"][] = "kode";

$tdataapp_groups[".googleLikeFields"][] = "id";
$tdataapp_groups[".googleLikeFields"][] = "nama";
$tdataapp_groups[".googleLikeFields"][] = "locked";
$tdataapp_groups[".googleLikeFields"][] = "kode";


$tdataapp_groups[".advSearchFields"][] = "id";
$tdataapp_groups[".advSearchFields"][] = "nama";
$tdataapp_groups[".advSearchFields"][] = "locked";
$tdataapp_groups[".advSearchFields"][] = "kode";

$tdataapp_groups[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
		


$tdataapp_groups[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataapp_groups[".strOrderBy"] = $tstrOrderBy;

$tdataapp_groups[".orderindexes"] = array();

$tdataapp_groups[".sqlHead"] = "SELECT id,   nama,   locked,   kode";
$tdataapp_groups[".sqlFrom"] = "FROM app.groups";
$tdataapp_groups[".sqlWhereExpr"] = "";
$tdataapp_groups[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataapp_groups[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataapp_groups[".arrGroupsPerPage"] = $arrGPP;

$tableKeysapp_groups = array();
$tableKeysapp_groups[] = "id";
$tdataapp_groups[".Keys"] = $tableKeysapp_groups;

$tdataapp_groups[".listFields"] = array();
$tdataapp_groups[".listFields"][] = "id";
$tdataapp_groups[".listFields"][] = "nama";
$tdataapp_groups[".listFields"][] = "locked";
$tdataapp_groups[".listFields"][] = "kode";

$tdataapp_groups[".viewFields"] = array();
$tdataapp_groups[".viewFields"][] = "id";
$tdataapp_groups[".viewFields"][] = "nama";
$tdataapp_groups[".viewFields"][] = "locked";
$tdataapp_groups[".viewFields"][] = "kode";

$tdataapp_groups[".addFields"] = array();
$tdataapp_groups[".addFields"][] = "nama";
$tdataapp_groups[".addFields"][] = "locked";
$tdataapp_groups[".addFields"][] = "kode";

$tdataapp_groups[".inlineAddFields"] = array();
$tdataapp_groups[".inlineAddFields"][] = "nama";
$tdataapp_groups[".inlineAddFields"][] = "locked";
$tdataapp_groups[".inlineAddFields"][] = "kode";

$tdataapp_groups[".editFields"] = array();
$tdataapp_groups[".editFields"][] = "nama";
$tdataapp_groups[".editFields"][] = "locked";
$tdataapp_groups[".editFields"][] = "kode";

$tdataapp_groups[".inlineEditFields"] = array();
$tdataapp_groups[".inlineEditFields"][] = "nama";
$tdataapp_groups[".inlineEditFields"][] = "locked";
$tdataapp_groups[".inlineEditFields"][] = "kode";

$tdataapp_groups[".exportFields"] = array();
$tdataapp_groups[".exportFields"][] = "id";
$tdataapp_groups[".exportFields"][] = "nama";
$tdataapp_groups[".exportFields"][] = "locked";
$tdataapp_groups[".exportFields"][] = "kode";

$tdataapp_groups[".printFields"] = array();
$tdataapp_groups[".printFields"][] = "id";
$tdataapp_groups[".printFields"][] = "nama";
$tdataapp_groups[".printFields"][] = "locked";
$tdataapp_groups[".printFields"][] = "kode";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "app.groups";
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
	
		
		
	$tdataapp_groups["id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "app.groups";
	$fdata["Label"] = "Nama"; 
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
	
		$fdata["strField"] = "nama"; 
		$fdata["FullName"] = "nama";
	
		
		
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
	
		
		
	$tdataapp_groups["nama"] = $fdata;
//	locked
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "locked";
	$fdata["GoodName"] = "locked";
	$fdata["ownerTable"] = "app.groups";
	$fdata["Label"] = "Locked"; 
	$fdata["FieldType"] = 2;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "locked"; 
		$fdata["FullName"] = "locked";
	
		
		
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
	
		
		
	$tdataapp_groups["locked"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "app.groups";
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_groups["kode"] = $fdata;

	
$tables_data["app.groups"]=&$tdataapp_groups;
$field_labels["app_groups"] = &$fieldLabelsapp_groups;
$fieldToolTips["app.groups"] = &$fieldToolTipsapp_groups;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["app.groups"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="app.group_modules";
	$detailsParam["dDataSourceTable"]="app.group_modules";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="app_group_modules";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["app.groups"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["app.groups"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["app.groups"][$dIndex]["detailKeys"][]="group_id";

$dIndex = 2-1;
			$strOriginalDetailsTable="app.user_groups";
	$detailsParam["dDataSourceTable"]="app.user_groups";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="app_user_groups";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["app.groups"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["app.groups"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["app.groups"][$dIndex]["detailKeys"][]="group_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["app.groups"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_app_groups()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama,   locked,   kode";
$proto0["m_strFrom"] = "FROM app.groups";
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
	"m_strTable" => "app.groups"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "app.groups"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "locked",
	"m_strTable" => "app.groups"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "app.groups"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "app.groups";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "id";
$proto14["m_columns"][] = "nama";
$proto14["m_columns"][] = "locked";
$proto14["m_columns"][] = "kode";
$obj = new SQLTable($proto14);

$proto13["m_table"] = $obj;
$proto13["m_alias"] = "";
$proto15=array();
$proto15["m_sql"] = "";
$proto15["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto15["m_column"]=$obj;
$proto15["m_contained"] = array();
$proto15["m_strCase"] = "";
$proto15["m_havingmode"] = "0";
$proto15["m_inBrackets"] = "0";
$proto15["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto15);

$proto13["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto13);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_app_groups = createSqlQuery_app_groups();
				$tdataapp_groups[".sqlquery"] = $queryData_app_groups;
	
if(isset($tdataapp_groups["field2"])){
	$tdataapp_groups["field2"]["LookupTable"] = "carscars_view";
	$tdataapp_groups["field2"]["LookupOrderBy"] = "name";
	$tdataapp_groups["field2"]["LookupType"] = 4;
	$tdataapp_groups["field2"]["LinkField"] = "email";
	$tdataapp_groups["field2"]["DisplayField"] = "name";
	$tdataapp_groups[".hasCustomViewField"] = true;
}

$tableEvents["app.groups"] = new eventsBase;
$tdataapp_groups[".hasEvents"] = false;

$cipherer = new RunnerCipherer("app.groups");

?>