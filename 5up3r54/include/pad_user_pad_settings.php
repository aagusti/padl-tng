<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_user_pad = array();
	$tdatapad_user_pad[".NumberOfChars"] = 80; 
	$tdatapad_user_pad[".ShortName"] = "pad_user_pad";
	$tdatapad_user_pad[".OwnerID"] = "";
	$tdatapad_user_pad[".OriginalTable"] = "pad.user_pad";

//	field labels
$fieldLabelspad_user_pad = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_user_pad["English"] = array();
	$fieldToolTipspad_user_pad["English"] = array();
	$fieldLabelspad_user_pad["English"]["id"] = "Id";
	$fieldToolTipspad_user_pad["English"]["id"] = "";
	$fieldLabelspad_user_pad["English"]["user_id"] = "User Id";
	$fieldToolTipspad_user_pad["English"]["user_id"] = "";
	$fieldLabelspad_user_pad["English"]["customer_id"] = "Customer Id";
	$fieldToolTipspad_user_pad["English"]["customer_id"] = "";
	$fieldLabelspad_user_pad["English"]["passwd"] = "Passwd";
	$fieldToolTipspad_user_pad["English"]["passwd"] = "";
	$fieldLabelspad_user_pad["English"]["created"] = "Created";
	$fieldToolTipspad_user_pad["English"]["created"] = "";
	$fieldLabelspad_user_pad["English"]["disabled"] = "Disabled";
	$fieldToolTipspad_user_pad["English"]["disabled"] = "";
	if (count($fieldToolTipspad_user_pad["English"]))
		$tdatapad_user_pad[".isUseToolTips"] = true;
}
	
	
	$tdatapad_user_pad[".NCSearch"] = true;



$tdatapad_user_pad[".shortTableName"] = "pad_user_pad";
$tdatapad_user_pad[".nSecOptions"] = 0;
$tdatapad_user_pad[".recsPerRowList"] = 1;
$tdatapad_user_pad[".mainTableOwnerID"] = "";
$tdatapad_user_pad[".moveNext"] = 1;
$tdatapad_user_pad[".nType"] = 0;

$tdatapad_user_pad[".strOriginalTableName"] = "pad.user_pad";




$tdatapad_user_pad[".showAddInPopup"] = false;

$tdatapad_user_pad[".showEditInPopup"] = false;

$tdatapad_user_pad[".showViewInPopup"] = false;

$tdatapad_user_pad[".fieldsForRegister"] = array();

$tdatapad_user_pad[".listAjax"] = false;

	$tdatapad_user_pad[".audit"] = false;

	$tdatapad_user_pad[".locking"] = false;

$tdatapad_user_pad[".listIcons"] = true;
$tdatapad_user_pad[".edit"] = true;
$tdatapad_user_pad[".inlineEdit"] = true;
$tdatapad_user_pad[".inlineAdd"] = true;
$tdatapad_user_pad[".view"] = true;

$tdatapad_user_pad[".exportTo"] = true;

$tdatapad_user_pad[".printFriendly"] = true;

$tdatapad_user_pad[".delete"] = true;

$tdatapad_user_pad[".showSimpleSearchOptions"] = false;

$tdatapad_user_pad[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_user_pad[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_user_pad[".isUseAjaxSuggest"] = true;

$tdatapad_user_pad[".rowHighlite"] = true;

// button handlers file names

$tdatapad_user_pad[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_user_pad[".isUseTimeForSearch"] = false;




$tdatapad_user_pad[".allSearchFields"] = array();

$tdatapad_user_pad[".allSearchFields"][] = "id";
$tdatapad_user_pad[".allSearchFields"][] = "user_id";
$tdatapad_user_pad[".allSearchFields"][] = "customer_id";
$tdatapad_user_pad[".allSearchFields"][] = "passwd";
$tdatapad_user_pad[".allSearchFields"][] = "created";
$tdatapad_user_pad[".allSearchFields"][] = "disabled";

$tdatapad_user_pad[".googleLikeFields"][] = "id";
$tdatapad_user_pad[".googleLikeFields"][] = "user_id";
$tdatapad_user_pad[".googleLikeFields"][] = "customer_id";
$tdatapad_user_pad[".googleLikeFields"][] = "passwd";
$tdatapad_user_pad[".googleLikeFields"][] = "created";
$tdatapad_user_pad[".googleLikeFields"][] = "disabled";


$tdatapad_user_pad[".advSearchFields"][] = "id";
$tdatapad_user_pad[".advSearchFields"][] = "user_id";
$tdatapad_user_pad[".advSearchFields"][] = "customer_id";
$tdatapad_user_pad[".advSearchFields"][] = "passwd";
$tdatapad_user_pad[".advSearchFields"][] = "created";
$tdatapad_user_pad[".advSearchFields"][] = "disabled";

$tdatapad_user_pad[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_user_pad[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_user_pad[".strOrderBy"] = $tstrOrderBy;

$tdatapad_user_pad[".orderindexes"] = array();

$tdatapad_user_pad[".sqlHead"] = "SELECT id,   user_id,   customer_id,   passwd,   created,   disabled";
$tdatapad_user_pad[".sqlFrom"] = "FROM \"pad\".user_pad";
$tdatapad_user_pad[".sqlWhereExpr"] = "";
$tdatapad_user_pad[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_user_pad[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_user_pad[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_user_pad = array();
$tableKeyspad_user_pad[] = "id";
$tdatapad_user_pad[".Keys"] = $tableKeyspad_user_pad;

$tdatapad_user_pad[".listFields"] = array();
$tdatapad_user_pad[".listFields"][] = "id";
$tdatapad_user_pad[".listFields"][] = "user_id";
$tdatapad_user_pad[".listFields"][] = "customer_id";
$tdatapad_user_pad[".listFields"][] = "passwd";
$tdatapad_user_pad[".listFields"][] = "created";
$tdatapad_user_pad[".listFields"][] = "disabled";

$tdatapad_user_pad[".viewFields"] = array();
$tdatapad_user_pad[".viewFields"][] = "id";
$tdatapad_user_pad[".viewFields"][] = "user_id";
$tdatapad_user_pad[".viewFields"][] = "customer_id";
$tdatapad_user_pad[".viewFields"][] = "passwd";
$tdatapad_user_pad[".viewFields"][] = "created";
$tdatapad_user_pad[".viewFields"][] = "disabled";

$tdatapad_user_pad[".addFields"] = array();
$tdatapad_user_pad[".addFields"][] = "user_id";
$tdatapad_user_pad[".addFields"][] = "customer_id";
$tdatapad_user_pad[".addFields"][] = "passwd";
$tdatapad_user_pad[".addFields"][] = "created";
$tdatapad_user_pad[".addFields"][] = "disabled";

$tdatapad_user_pad[".inlineAddFields"] = array();
$tdatapad_user_pad[".inlineAddFields"][] = "user_id";
$tdatapad_user_pad[".inlineAddFields"][] = "customer_id";
$tdatapad_user_pad[".inlineAddFields"][] = "passwd";
$tdatapad_user_pad[".inlineAddFields"][] = "created";
$tdatapad_user_pad[".inlineAddFields"][] = "disabled";

$tdatapad_user_pad[".editFields"] = array();
$tdatapad_user_pad[".editFields"][] = "user_id";
$tdatapad_user_pad[".editFields"][] = "customer_id";
$tdatapad_user_pad[".editFields"][] = "passwd";
$tdatapad_user_pad[".editFields"][] = "created";
$tdatapad_user_pad[".editFields"][] = "disabled";

$tdatapad_user_pad[".inlineEditFields"] = array();
$tdatapad_user_pad[".inlineEditFields"][] = "user_id";
$tdatapad_user_pad[".inlineEditFields"][] = "customer_id";
$tdatapad_user_pad[".inlineEditFields"][] = "passwd";
$tdatapad_user_pad[".inlineEditFields"][] = "created";
$tdatapad_user_pad[".inlineEditFields"][] = "disabled";

$tdatapad_user_pad[".exportFields"] = array();
$tdatapad_user_pad[".exportFields"][] = "id";
$tdatapad_user_pad[".exportFields"][] = "user_id";
$tdatapad_user_pad[".exportFields"][] = "customer_id";
$tdatapad_user_pad[".exportFields"][] = "passwd";
$tdatapad_user_pad[".exportFields"][] = "created";
$tdatapad_user_pad[".exportFields"][] = "disabled";

$tdatapad_user_pad[".printFields"] = array();
$tdatapad_user_pad[".printFields"][] = "id";
$tdatapad_user_pad[".printFields"][] = "user_id";
$tdatapad_user_pad[".printFields"][] = "customer_id";
$tdatapad_user_pad[".printFields"][] = "passwd";
$tdatapad_user_pad[".printFields"][] = "created";
$tdatapad_user_pad[".printFields"][] = "disabled";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.user_pad";
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
	
		
		
	$tdatapad_user_pad["id"] = $fdata;
//	user_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "user_id";
	$fdata["GoodName"] = "user_id";
	$fdata["ownerTable"] = "pad.user_pad";
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
	
		
		
	$tdatapad_user_pad["user_id"] = $fdata;
//	customer_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "customer_id";
	$fdata["GoodName"] = "customer_id";
	$fdata["ownerTable"] = "pad.user_pad";
	$fdata["Label"] = "Customer Id"; 
	$fdata["FieldType"] = 20;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "customer_id"; 
		$fdata["FullName"] = "customer_id";
	
		
		
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
	
		
		
	$tdatapad_user_pad["customer_id"] = $fdata;
//	passwd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "passwd";
	$fdata["GoodName"] = "passwd";
	$fdata["ownerTable"] = "pad.user_pad";
	$fdata["Label"] = "Passwd"; 
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
	
		$fdata["strField"] = "passwd"; 
		$fdata["FullName"] = "passwd";
	
		
		
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
	
		
		
	$tdatapad_user_pad["passwd"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.user_pad";
	$fdata["Label"] = "Created"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "created"; 
		$fdata["FullName"] = "created";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_user_pad["created"] = $fdata;
//	disabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "disabled";
	$fdata["GoodName"] = "disabled";
	$fdata["ownerTable"] = "pad.user_pad";
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
	
		
		
	$tdatapad_user_pad["disabled"] = $fdata;

	
$tables_data["pad.user_pad"]=&$tdatapad_user_pad;
$field_labels["pad_user_pad"] = &$fieldLabelspad_user_pad;
$fieldToolTips["pad.user_pad"] = &$fieldToolTipspad_user_pad;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.user_pad"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.user_pad"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_user_pad()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   user_id,   customer_id,   passwd,   created,   disabled";
$proto0["m_strFrom"] = "FROM \"pad\".user_pad";
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
	"m_strTable" => "pad.user_pad"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "user_id",
	"m_strTable" => "pad.user_pad"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_id",
	"m_strTable" => "pad.user_pad"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "passwd",
	"m_strTable" => "pad.user_pad"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.user_pad"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "disabled",
	"m_strTable" => "pad.user_pad"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto17=array();
$proto17["m_link"] = "SQLL_MAIN";
			$proto18=array();
$proto18["m_strName"] = "pad.user_pad";
$proto18["m_columns"] = array();
$proto18["m_columns"][] = "id";
$proto18["m_columns"][] = "user_id";
$proto18["m_columns"][] = "customer_id";
$proto18["m_columns"][] = "passwd";
$proto18["m_columns"][] = "created";
$proto18["m_columns"][] = "disabled";
$obj = new SQLTable($proto18);

$proto17["m_table"] = $obj;
$proto17["m_alias"] = "";
$proto19=array();
$proto19["m_sql"] = "";
$proto19["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto19["m_column"]=$obj;
$proto19["m_contained"] = array();
$proto19["m_strCase"] = "";
$proto19["m_havingmode"] = "0";
$proto19["m_inBrackets"] = "0";
$proto19["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto19);

$proto17["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto17);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_user_pad = createSqlQuery_pad_user_pad();
						$tdatapad_user_pad[".sqlquery"] = $queryData_pad_user_pad;
	
if(isset($tdatapad_user_pad["field2"])){
	$tdatapad_user_pad["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_user_pad["field2"]["LookupOrderBy"] = "name";
	$tdatapad_user_pad["field2"]["LookupType"] = 4;
	$tdatapad_user_pad["field2"]["LinkField"] = "email";
	$tdatapad_user_pad["field2"]["DisplayField"] = "name";
	$tdatapad_user_pad[".hasCustomViewField"] = true;
}

$tableEvents["pad.user_pad"] = new eventsBase;
$tdatapad_user_pad[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.user_pad");

?>