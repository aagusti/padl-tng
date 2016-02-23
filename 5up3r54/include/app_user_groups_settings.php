<?php
require_once(getabspath("classes/cipherer.php"));
$tdataapp_user_groups = array();
	$tdataapp_user_groups[".NumberOfChars"] = 80; 
	$tdataapp_user_groups[".ShortName"] = "app_user_groups";
	$tdataapp_user_groups[".OwnerID"] = "";
	$tdataapp_user_groups[".OriginalTable"] = "app.user_groups";

//	field labels
$fieldLabelsapp_user_groups = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsapp_user_groups["English"] = array();
	$fieldToolTipsapp_user_groups["English"] = array();
	$fieldLabelsapp_user_groups["English"]["id"] = "Id";
	$fieldToolTipsapp_user_groups["English"]["id"] = "";
	$fieldLabelsapp_user_groups["English"]["user_id"] = "User Id";
	$fieldToolTipsapp_user_groups["English"]["user_id"] = "";
	$fieldLabelsapp_user_groups["English"]["group_id"] = "Group Id";
	$fieldToolTipsapp_user_groups["English"]["group_id"] = "";
	if (count($fieldToolTipsapp_user_groups["English"]))
		$tdataapp_user_groups[".isUseToolTips"] = true;
}
	
	
	$tdataapp_user_groups[".NCSearch"] = true;



$tdataapp_user_groups[".shortTableName"] = "app_user_groups";
$tdataapp_user_groups[".nSecOptions"] = 0;
$tdataapp_user_groups[".recsPerRowList"] = 1;
$tdataapp_user_groups[".mainTableOwnerID"] = "";
$tdataapp_user_groups[".moveNext"] = 1;
$tdataapp_user_groups[".nType"] = 0;

$tdataapp_user_groups[".strOriginalTableName"] = "app.user_groups";




$tdataapp_user_groups[".showAddInPopup"] = false;

$tdataapp_user_groups[".showEditInPopup"] = false;

$tdataapp_user_groups[".showViewInPopup"] = false;

$tdataapp_user_groups[".fieldsForRegister"] = array();

$tdataapp_user_groups[".listAjax"] = false;

	$tdataapp_user_groups[".audit"] = false;

	$tdataapp_user_groups[".locking"] = false;

$tdataapp_user_groups[".listIcons"] = true;
$tdataapp_user_groups[".edit"] = true;
$tdataapp_user_groups[".inlineEdit"] = true;
$tdataapp_user_groups[".inlineAdd"] = true;
$tdataapp_user_groups[".view"] = true;



$tdataapp_user_groups[".delete"] = true;

$tdataapp_user_groups[".showSimpleSearchOptions"] = false;

$tdataapp_user_groups[".showSearchPanel"] = true;

if (isMobile())
	$tdataapp_user_groups[".isUseAjaxSuggest"] = false;
else 
	$tdataapp_user_groups[".isUseAjaxSuggest"] = true;

$tdataapp_user_groups[".rowHighlite"] = true;

// button handlers file names

$tdataapp_user_groups[".addPageEvents"] = false;

// use timepicker for search panel
$tdataapp_user_groups[".isUseTimeForSearch"] = false;




$tdataapp_user_groups[".allSearchFields"] = array();

$tdataapp_user_groups[".allSearchFields"][] = "id";
$tdataapp_user_groups[".allSearchFields"][] = "user_id";
$tdataapp_user_groups[".allSearchFields"][] = "group_id";

$tdataapp_user_groups[".googleLikeFields"][] = "id";
$tdataapp_user_groups[".googleLikeFields"][] = "user_id";
$tdataapp_user_groups[".googleLikeFields"][] = "group_id";


$tdataapp_user_groups[".advSearchFields"][] = "id";
$tdataapp_user_groups[".advSearchFields"][] = "user_id";
$tdataapp_user_groups[".advSearchFields"][] = "group_id";

$tdataapp_user_groups[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataapp_user_groups[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataapp_user_groups[".strOrderBy"] = $tstrOrderBy;

$tdataapp_user_groups[".orderindexes"] = array();

$tdataapp_user_groups[".sqlHead"] = "SELECT id,   user_id,   group_id";
$tdataapp_user_groups[".sqlFrom"] = "FROM app.user_groups";
$tdataapp_user_groups[".sqlWhereExpr"] = "";
$tdataapp_user_groups[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataapp_user_groups[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataapp_user_groups[".arrGroupsPerPage"] = $arrGPP;

$tableKeysapp_user_groups = array();
$tableKeysapp_user_groups[] = "id";
$tdataapp_user_groups[".Keys"] = $tableKeysapp_user_groups;

$tdataapp_user_groups[".listFields"] = array();
$tdataapp_user_groups[".listFields"][] = "id";
$tdataapp_user_groups[".listFields"][] = "user_id";
$tdataapp_user_groups[".listFields"][] = "group_id";

$tdataapp_user_groups[".viewFields"] = array();
$tdataapp_user_groups[".viewFields"][] = "id";
$tdataapp_user_groups[".viewFields"][] = "user_id";
$tdataapp_user_groups[".viewFields"][] = "group_id";

$tdataapp_user_groups[".addFields"] = array();
$tdataapp_user_groups[".addFields"][] = "user_id";
$tdataapp_user_groups[".addFields"][] = "group_id";

$tdataapp_user_groups[".inlineAddFields"] = array();
$tdataapp_user_groups[".inlineAddFields"][] = "user_id";
$tdataapp_user_groups[".inlineAddFields"][] = "group_id";

$tdataapp_user_groups[".editFields"] = array();
$tdataapp_user_groups[".editFields"][] = "user_id";
$tdataapp_user_groups[".editFields"][] = "group_id";

$tdataapp_user_groups[".inlineEditFields"] = array();
$tdataapp_user_groups[".inlineEditFields"][] = "user_id";
$tdataapp_user_groups[".inlineEditFields"][] = "group_id";

$tdataapp_user_groups[".exportFields"] = array();
$tdataapp_user_groups[".exportFields"][] = "id";
$tdataapp_user_groups[".exportFields"][] = "user_id";
$tdataapp_user_groups[".exportFields"][] = "group_id";

$tdataapp_user_groups[".printFields"] = array();
$tdataapp_user_groups[".printFields"][] = "id";
$tdataapp_user_groups[".printFields"][] = "user_id";
$tdataapp_user_groups[".printFields"][] = "group_id";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "app.user_groups";
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
	
		
		
	$tdataapp_user_groups["id"] = $fdata;
//	user_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "user_id";
	$fdata["GoodName"] = "user_id";
	$fdata["ownerTable"] = "app.user_groups";
	$fdata["Label"] = "User Id"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "user_id"; 
		$fdata["FullName"] = "user_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "app.users";
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
	
		
		
	$tdataapp_user_groups["user_id"] = $fdata;
//	group_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "group_id";
	$fdata["GoodName"] = "group_id";
	$fdata["ownerTable"] = "app.user_groups";
	$fdata["Label"] = "Group Id"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "group_id"; 
		$fdata["FullName"] = "group_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "app.groups";
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
	
		
		
	$tdataapp_user_groups["group_id"] = $fdata;

	
$tables_data["app.user_groups"]=&$tdataapp_user_groups;
$field_labels["app_user_groups"] = &$fieldLabelsapp_user_groups;
$fieldToolTips["app.user_groups"] = &$fieldToolTipsapp_user_groups;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["app.user_groups"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["app.user_groups"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="app.groups";
	$masterParams["mDataSourceTable"]="app.groups";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "app_groups";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["app.user_groups"][$mIndex] = $masterParams;	
		$masterTablesData["app.user_groups"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["app.user_groups"][$mIndex]["detailKeys"][]="group_id";

$mIndex = 2-1;
			$strOriginalDetailsTable="app.users";
	$masterParams["mDataSourceTable"]="app.users";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "app_users";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["app.user_groups"][$mIndex] = $masterParams;	
		$masterTablesData["app.user_groups"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["app.user_groups"][$mIndex]["detailKeys"][]="user_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_app_user_groups()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   user_id,   group_id";
$proto0["m_strFrom"] = "FROM app.user_groups";
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
	"m_strTable" => "app.user_groups"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "user_id",
	"m_strTable" => "app.user_groups"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "group_id",
	"m_strTable" => "app.user_groups"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto11=array();
$proto11["m_link"] = "SQLL_MAIN";
			$proto12=array();
$proto12["m_strName"] = "app.user_groups";
$proto12["m_columns"] = array();
$proto12["m_columns"][] = "id";
$proto12["m_columns"][] = "user_id";
$proto12["m_columns"][] = "group_id";
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
$queryData_app_user_groups = createSqlQuery_app_user_groups();
			$tdataapp_user_groups[".sqlquery"] = $queryData_app_user_groups;
	
if(isset($tdataapp_user_groups["field2"])){
	$tdataapp_user_groups["field2"]["LookupTable"] = "carscars_view";
	$tdataapp_user_groups["field2"]["LookupOrderBy"] = "name";
	$tdataapp_user_groups["field2"]["LookupType"] = 4;
	$tdataapp_user_groups["field2"]["LinkField"] = "email";
	$tdataapp_user_groups["field2"]["DisplayField"] = "name";
	$tdataapp_user_groups[".hasCustomViewField"] = true;
}

$tableEvents["app.user_groups"] = new eventsBase;
$tdataapp_user_groups[".hasEvents"] = false;

$cipherer = new RunnerCipherer("app.user_groups");

?>