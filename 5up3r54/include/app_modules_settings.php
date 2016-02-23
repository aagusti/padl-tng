<?php
require_once(getabspath("classes/cipherer.php"));
$tdataapp_modules = array();
	$tdataapp_modules[".NumberOfChars"] = 80; 
	$tdataapp_modules[".ShortName"] = "app_modules";
	$tdataapp_modules[".OwnerID"] = "";
	$tdataapp_modules[".OriginalTable"] = "app.modules";

//	field labels
$fieldLabelsapp_modules = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsapp_modules["English"] = array();
	$fieldToolTipsapp_modules["English"] = array();
	$fieldLabelsapp_modules["English"]["id"] = "Id";
	$fieldToolTipsapp_modules["English"]["id"] = "";
	$fieldLabelsapp_modules["English"]["nama"] = "Nama";
	$fieldToolTipsapp_modules["English"]["nama"] = "";
	$fieldLabelsapp_modules["English"]["app_id"] = "App Id";
	$fieldToolTipsapp_modules["English"]["app_id"] = "";
	$fieldLabelsapp_modules["English"]["kode"] = "Kode";
	$fieldToolTipsapp_modules["English"]["kode"] = "";
	if (count($fieldToolTipsapp_modules["English"]))
		$tdataapp_modules[".isUseToolTips"] = true;
}
	
	
	$tdataapp_modules[".NCSearch"] = true;



$tdataapp_modules[".shortTableName"] = "app_modules";
$tdataapp_modules[".nSecOptions"] = 0;
$tdataapp_modules[".recsPerRowList"] = 1;
$tdataapp_modules[".mainTableOwnerID"] = "";
$tdataapp_modules[".moveNext"] = 1;
$tdataapp_modules[".nType"] = 0;

$tdataapp_modules[".strOriginalTableName"] = "app.modules";




$tdataapp_modules[".showAddInPopup"] = false;

$tdataapp_modules[".showEditInPopup"] = false;

$tdataapp_modules[".showViewInPopup"] = false;

$tdataapp_modules[".fieldsForRegister"] = array();

$tdataapp_modules[".listAjax"] = false;

	$tdataapp_modules[".audit"] = false;

	$tdataapp_modules[".locking"] = false;

$tdataapp_modules[".listIcons"] = true;
$tdataapp_modules[".edit"] = true;
$tdataapp_modules[".inlineEdit"] = true;
$tdataapp_modules[".inlineAdd"] = true;
$tdataapp_modules[".view"] = true;



$tdataapp_modules[".delete"] = true;

$tdataapp_modules[".showSimpleSearchOptions"] = false;

$tdataapp_modules[".showSearchPanel"] = true;

if (isMobile())
	$tdataapp_modules[".isUseAjaxSuggest"] = false;
else 
	$tdataapp_modules[".isUseAjaxSuggest"] = true;

$tdataapp_modules[".rowHighlite"] = true;

// button handlers file names

$tdataapp_modules[".addPageEvents"] = false;

// use timepicker for search panel
$tdataapp_modules[".isUseTimeForSearch"] = false;



$tdataapp_modules[".useDetailsPreview"] = true;

$tdataapp_modules[".allSearchFields"] = array();

$tdataapp_modules[".allSearchFields"][] = "id";
$tdataapp_modules[".allSearchFields"][] = "nama";
$tdataapp_modules[".allSearchFields"][] = "app_id";
$tdataapp_modules[".allSearchFields"][] = "kode";

$tdataapp_modules[".googleLikeFields"][] = "id";
$tdataapp_modules[".googleLikeFields"][] = "nama";
$tdataapp_modules[".googleLikeFields"][] = "app_id";
$tdataapp_modules[".googleLikeFields"][] = "kode";


$tdataapp_modules[".advSearchFields"][] = "id";
$tdataapp_modules[".advSearchFields"][] = "nama";
$tdataapp_modules[".advSearchFields"][] = "app_id";
$tdataapp_modules[".advSearchFields"][] = "kode";

$tdataapp_modules[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdataapp_modules[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataapp_modules[".strOrderBy"] = $tstrOrderBy;

$tdataapp_modules[".orderindexes"] = array();

$tdataapp_modules[".sqlHead"] = "SELECT id,   nama,   app_id,   kode";
$tdataapp_modules[".sqlFrom"] = "FROM app.modules";
$tdataapp_modules[".sqlWhereExpr"] = "";
$tdataapp_modules[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataapp_modules[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataapp_modules[".arrGroupsPerPage"] = $arrGPP;

$tableKeysapp_modules = array();
$tableKeysapp_modules[] = "id";
$tdataapp_modules[".Keys"] = $tableKeysapp_modules;

$tdataapp_modules[".listFields"] = array();
$tdataapp_modules[".listFields"][] = "id";
$tdataapp_modules[".listFields"][] = "nama";
$tdataapp_modules[".listFields"][] = "app_id";
$tdataapp_modules[".listFields"][] = "kode";

$tdataapp_modules[".viewFields"] = array();
$tdataapp_modules[".viewFields"][] = "id";
$tdataapp_modules[".viewFields"][] = "nama";
$tdataapp_modules[".viewFields"][] = "app_id";
$tdataapp_modules[".viewFields"][] = "kode";

$tdataapp_modules[".addFields"] = array();
$tdataapp_modules[".addFields"][] = "nama";
$tdataapp_modules[".addFields"][] = "app_id";
$tdataapp_modules[".addFields"][] = "kode";

$tdataapp_modules[".inlineAddFields"] = array();
$tdataapp_modules[".inlineAddFields"][] = "nama";
$tdataapp_modules[".inlineAddFields"][] = "app_id";
$tdataapp_modules[".inlineAddFields"][] = "kode";

$tdataapp_modules[".editFields"] = array();
$tdataapp_modules[".editFields"][] = "nama";
$tdataapp_modules[".editFields"][] = "app_id";
$tdataapp_modules[".editFields"][] = "kode";

$tdataapp_modules[".inlineEditFields"] = array();
$tdataapp_modules[".inlineEditFields"][] = "nama";
$tdataapp_modules[".inlineEditFields"][] = "app_id";
$tdataapp_modules[".inlineEditFields"][] = "kode";

$tdataapp_modules[".exportFields"] = array();
$tdataapp_modules[".exportFields"][] = "id";
$tdataapp_modules[".exportFields"][] = "nama";
$tdataapp_modules[".exportFields"][] = "app_id";
$tdataapp_modules[".exportFields"][] = "kode";

$tdataapp_modules[".printFields"] = array();
$tdataapp_modules[".printFields"][] = "id";
$tdataapp_modules[".printFields"][] = "nama";
$tdataapp_modules[".printFields"][] = "app_id";
$tdataapp_modules[".printFields"][] = "kode";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "app.modules";
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
	
		
		
	$tdataapp_modules["id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "app.modules";
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
	
		
		
	$tdataapp_modules["nama"] = $fdata;
//	app_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "app_id";
	$fdata["GoodName"] = "app_id";
	$fdata["ownerTable"] = "app.modules";
	$fdata["Label"] = "App Id"; 
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
	
		$fdata["strField"] = "app_id"; 
		$fdata["FullName"] = "app_id";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "id";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "app.apps";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_modules["app_id"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "app.modules";
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
			$edata["EditParams"].= " maxlength=20";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_modules["kode"] = $fdata;

	
$tables_data["app.modules"]=&$tdataapp_modules;
$field_labels["app_modules"] = &$fieldLabelsapp_modules;
$fieldToolTips["app.modules"] = &$fieldToolTipsapp_modules;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["app.modules"] = array();
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
		
	$detailsTablesData["app.modules"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["app.modules"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["app.modules"][$dIndex]["detailKeys"][]="module_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["app.modules"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="app.apps";
	$masterParams["mDataSourceTable"]="app.apps";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "app_apps";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["app.modules"][$mIndex] = $masterParams;	
		$masterTablesData["app.modules"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["app.modules"][$mIndex]["detailKeys"][]="app_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_app_modules()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama,   app_id,   kode";
$proto0["m_strFrom"] = "FROM app.modules";
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
	"m_strTable" => "app.modules"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "app.modules"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "app_id",
	"m_strTable" => "app.modules"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "app.modules"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "app.modules";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "id";
$proto14["m_columns"][] = "nama";
$proto14["m_columns"][] = "app_id";
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
$queryData_app_modules = createSqlQuery_app_modules();
				$tdataapp_modules[".sqlquery"] = $queryData_app_modules;
	
if(isset($tdataapp_modules["field2"])){
	$tdataapp_modules["field2"]["LookupTable"] = "carscars_view";
	$tdataapp_modules["field2"]["LookupOrderBy"] = "name";
	$tdataapp_modules["field2"]["LookupType"] = 4;
	$tdataapp_modules["field2"]["LinkField"] = "email";
	$tdataapp_modules["field2"]["DisplayField"] = "name";
	$tdataapp_modules[".hasCustomViewField"] = true;
}

$tableEvents["app.modules"] = new eventsBase;
$tdataapp_modules[".hasEvents"] = false;

$cipherer = new RunnerCipherer("app.modules");

?>