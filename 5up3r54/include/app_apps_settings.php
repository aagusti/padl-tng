<?php
require_once(getabspath("classes/cipherer.php"));
$tdataapp_apps = array();
	$tdataapp_apps[".NumberOfChars"] = 80; 
	$tdataapp_apps[".ShortName"] = "app_apps";
	$tdataapp_apps[".OwnerID"] = "";
	$tdataapp_apps[".OriginalTable"] = "app.apps";

//	field labels
$fieldLabelsapp_apps = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsapp_apps["English"] = array();
	$fieldToolTipsapp_apps["English"] = array();
	$fieldLabelsapp_apps["English"]["id"] = "Id";
	$fieldToolTipsapp_apps["English"]["id"] = "";
	$fieldLabelsapp_apps["English"]["nama"] = "Nama";
	$fieldToolTipsapp_apps["English"]["nama"] = "";
	$fieldLabelsapp_apps["English"]["app_path"] = "App Path";
	$fieldToolTipsapp_apps["English"]["app_path"] = "";
	$fieldLabelsapp_apps["English"]["disabled"] = "Disabled";
	$fieldToolTipsapp_apps["English"]["disabled"] = "";
	if (count($fieldToolTipsapp_apps["English"]))
		$tdataapp_apps[".isUseToolTips"] = true;
}
	
	
	$tdataapp_apps[".NCSearch"] = true;



$tdataapp_apps[".shortTableName"] = "app_apps";
$tdataapp_apps[".nSecOptions"] = 0;
$tdataapp_apps[".recsPerRowList"] = 1;
$tdataapp_apps[".mainTableOwnerID"] = "";
$tdataapp_apps[".moveNext"] = 1;
$tdataapp_apps[".nType"] = 0;

$tdataapp_apps[".strOriginalTableName"] = "app.apps";




$tdataapp_apps[".showAddInPopup"] = false;

$tdataapp_apps[".showEditInPopup"] = false;

$tdataapp_apps[".showViewInPopup"] = false;

$tdataapp_apps[".fieldsForRegister"] = array();

$tdataapp_apps[".listAjax"] = false;

	$tdataapp_apps[".audit"] = false;

	$tdataapp_apps[".locking"] = false;

$tdataapp_apps[".listIcons"] = true;
$tdataapp_apps[".edit"] = true;
$tdataapp_apps[".inlineEdit"] = true;
$tdataapp_apps[".inlineAdd"] = true;
$tdataapp_apps[".view"] = true;



$tdataapp_apps[".delete"] = true;

$tdataapp_apps[".showSimpleSearchOptions"] = false;

$tdataapp_apps[".showSearchPanel"] = true;

if (isMobile())
	$tdataapp_apps[".isUseAjaxSuggest"] = false;
else 
	$tdataapp_apps[".isUseAjaxSuggest"] = true;

$tdataapp_apps[".rowHighlite"] = true;

// button handlers file names

$tdataapp_apps[".addPageEvents"] = false;

// use timepicker for search panel
$tdataapp_apps[".isUseTimeForSearch"] = false;



$tdataapp_apps[".useDetailsPreview"] = true;

$tdataapp_apps[".allSearchFields"] = array();

$tdataapp_apps[".allSearchFields"][] = "id";
$tdataapp_apps[".allSearchFields"][] = "nama";
$tdataapp_apps[".allSearchFields"][] = "app_path";
$tdataapp_apps[".allSearchFields"][] = "disabled";

$tdataapp_apps[".googleLikeFields"][] = "id";
$tdataapp_apps[".googleLikeFields"][] = "nama";
$tdataapp_apps[".googleLikeFields"][] = "app_path";
$tdataapp_apps[".googleLikeFields"][] = "disabled";


$tdataapp_apps[".advSearchFields"][] = "id";
$tdataapp_apps[".advSearchFields"][] = "nama";
$tdataapp_apps[".advSearchFields"][] = "app_path";
$tdataapp_apps[".advSearchFields"][] = "disabled";

$tdataapp_apps[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdataapp_apps[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataapp_apps[".strOrderBy"] = $tstrOrderBy;

$tdataapp_apps[".orderindexes"] = array();

$tdataapp_apps[".sqlHead"] = "SELECT id,   nama,   app_path,   disabled";
$tdataapp_apps[".sqlFrom"] = "FROM app.apps";
$tdataapp_apps[".sqlWhereExpr"] = "";
$tdataapp_apps[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataapp_apps[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataapp_apps[".arrGroupsPerPage"] = $arrGPP;

$tableKeysapp_apps = array();
$tableKeysapp_apps[] = "id";
$tdataapp_apps[".Keys"] = $tableKeysapp_apps;

$tdataapp_apps[".listFields"] = array();
$tdataapp_apps[".listFields"][] = "id";
$tdataapp_apps[".listFields"][] = "nama";
$tdataapp_apps[".listFields"][] = "app_path";
$tdataapp_apps[".listFields"][] = "disabled";

$tdataapp_apps[".viewFields"] = array();
$tdataapp_apps[".viewFields"][] = "id";
$tdataapp_apps[".viewFields"][] = "nama";
$tdataapp_apps[".viewFields"][] = "app_path";
$tdataapp_apps[".viewFields"][] = "disabled";

$tdataapp_apps[".addFields"] = array();
$tdataapp_apps[".addFields"][] = "nama";
$tdataapp_apps[".addFields"][] = "app_path";
$tdataapp_apps[".addFields"][] = "disabled";

$tdataapp_apps[".inlineAddFields"] = array();
$tdataapp_apps[".inlineAddFields"][] = "nama";
$tdataapp_apps[".inlineAddFields"][] = "app_path";
$tdataapp_apps[".inlineAddFields"][] = "disabled";

$tdataapp_apps[".editFields"] = array();
$tdataapp_apps[".editFields"][] = "nama";
$tdataapp_apps[".editFields"][] = "app_path";
$tdataapp_apps[".editFields"][] = "disabled";

$tdataapp_apps[".inlineEditFields"] = array();
$tdataapp_apps[".inlineEditFields"][] = "nama";
$tdataapp_apps[".inlineEditFields"][] = "app_path";
$tdataapp_apps[".inlineEditFields"][] = "disabled";

$tdataapp_apps[".exportFields"] = array();
$tdataapp_apps[".exportFields"][] = "id";
$tdataapp_apps[".exportFields"][] = "nama";
$tdataapp_apps[".exportFields"][] = "app_path";
$tdataapp_apps[".exportFields"][] = "disabled";

$tdataapp_apps[".printFields"] = array();
$tdataapp_apps[".printFields"][] = "id";
$tdataapp_apps[".printFields"][] = "nama";
$tdataapp_apps[".printFields"][] = "app_path";
$tdataapp_apps[".printFields"][] = "disabled";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "app.apps";
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
	
		
		
	$tdataapp_apps["id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "app.apps";
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
	
		
		
	$tdataapp_apps["nama"] = $fdata;
//	app_path
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "app_path";
	$fdata["GoodName"] = "app_path";
	$fdata["ownerTable"] = "app.apps";
	$fdata["Label"] = "App Path"; 
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
	
		$fdata["strField"] = "app_path"; 
		$fdata["FullName"] = "app_path";
	
		
		
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
	
		
		
	$tdataapp_apps["app_path"] = $fdata;
//	disabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "disabled";
	$fdata["GoodName"] = "disabled";
	$fdata["ownerTable"] = "app.apps";
	$fdata["Label"] = "Disabled"; 
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
	
		$fdata["strField"] = "disabled"; 
		$fdata["FullName"] = "disabled";
	
		
		
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
	
		
		
	$tdataapp_apps["disabled"] = $fdata;

	
$tables_data["app.apps"]=&$tdataapp_apps;
$field_labels["app_apps"] = &$fieldLabelsapp_apps;
$fieldToolTips["app.apps"] = &$fieldToolTipsapp_apps;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["app.apps"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="app.modules";
	$detailsParam["dDataSourceTable"]="app.modules";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="app_modules";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["app.apps"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["app.apps"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["app.apps"][$dIndex]["detailKeys"][]="app_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["app.apps"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_app_apps()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama,   app_path,   disabled";
$proto0["m_strFrom"] = "FROM app.apps";
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
	"m_strTable" => "app.apps"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "app.apps"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "app_path",
	"m_strTable" => "app.apps"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "disabled",
	"m_strTable" => "app.apps"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "app.apps";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "id";
$proto14["m_columns"][] = "nama";
$proto14["m_columns"][] = "app_path";
$proto14["m_columns"][] = "disabled";
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
$queryData_app_apps = createSqlQuery_app_apps();
				$tdataapp_apps[".sqlquery"] = $queryData_app_apps;
	
if(isset($tdataapp_apps["field2"])){
	$tdataapp_apps["field2"]["LookupTable"] = "carscars_view";
	$tdataapp_apps["field2"]["LookupOrderBy"] = "name";
	$tdataapp_apps["field2"]["LookupType"] = 4;
	$tdataapp_apps["field2"]["LinkField"] = "email";
	$tdataapp_apps["field2"]["DisplayField"] = "name";
	$tdataapp_apps[".hasCustomViewField"] = true;
}

$tableEvents["app.apps"] = new eventsBase;
$tdataapp_apps[".hasEvents"] = false;

$cipherer = new RunnerCipherer("app.apps");

?>