<?php
require_once(getabspath("classes/cipherer.php"));
$tdataapp_group_modules = array();
	$tdataapp_group_modules[".NumberOfChars"] = 80; 
	$tdataapp_group_modules[".ShortName"] = "app_group_modules";
	$tdataapp_group_modules[".OwnerID"] = "";
	$tdataapp_group_modules[".OriginalTable"] = "app.group_modules";

//	field labels
$fieldLabelsapp_group_modules = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsapp_group_modules["English"] = array();
	$fieldToolTipsapp_group_modules["English"] = array();
	$fieldLabelsapp_group_modules["English"]["group_id"] = "Group Id";
	$fieldToolTipsapp_group_modules["English"]["group_id"] = "";
	$fieldLabelsapp_group_modules["English"]["id"] = "Id";
	$fieldToolTipsapp_group_modules["English"]["id"] = "";
	$fieldLabelsapp_group_modules["English"]["module_id"] = "Module Id";
	$fieldToolTipsapp_group_modules["English"]["module_id"] = "";
	$fieldLabelsapp_group_modules["English"]["reads"] = "Reads";
	$fieldToolTipsapp_group_modules["English"]["reads"] = "";
	$fieldLabelsapp_group_modules["English"]["writes"] = "Writes";
	$fieldToolTipsapp_group_modules["English"]["writes"] = "";
	$fieldLabelsapp_group_modules["English"]["deletes"] = "Deletes";
	$fieldToolTipsapp_group_modules["English"]["deletes"] = "";
	$fieldLabelsapp_group_modules["English"]["inserts"] = "Inserts";
	$fieldToolTipsapp_group_modules["English"]["inserts"] = "";
	if (count($fieldToolTipsapp_group_modules["English"]))
		$tdataapp_group_modules[".isUseToolTips"] = true;
}
	
	
	$tdataapp_group_modules[".NCSearch"] = true;



$tdataapp_group_modules[".shortTableName"] = "app_group_modules";
$tdataapp_group_modules[".nSecOptions"] = 0;
$tdataapp_group_modules[".recsPerRowList"] = 1;
$tdataapp_group_modules[".mainTableOwnerID"] = "";
$tdataapp_group_modules[".moveNext"] = 1;
$tdataapp_group_modules[".nType"] = 0;

$tdataapp_group_modules[".strOriginalTableName"] = "app.group_modules";




$tdataapp_group_modules[".showAddInPopup"] = false;

$tdataapp_group_modules[".showEditInPopup"] = false;

$tdataapp_group_modules[".showViewInPopup"] = false;

$tdataapp_group_modules[".fieldsForRegister"] = array();

$tdataapp_group_modules[".listAjax"] = false;

	$tdataapp_group_modules[".audit"] = false;

	$tdataapp_group_modules[".locking"] = false;

$tdataapp_group_modules[".listIcons"] = true;
$tdataapp_group_modules[".edit"] = true;
$tdataapp_group_modules[".inlineEdit"] = true;
$tdataapp_group_modules[".inlineAdd"] = true;
$tdataapp_group_modules[".view"] = true;



$tdataapp_group_modules[".delete"] = true;

$tdataapp_group_modules[".showSimpleSearchOptions"] = false;

$tdataapp_group_modules[".showSearchPanel"] = true;

if (isMobile())
	$tdataapp_group_modules[".isUseAjaxSuggest"] = false;
else 
	$tdataapp_group_modules[".isUseAjaxSuggest"] = true;

$tdataapp_group_modules[".rowHighlite"] = true;

// button handlers file names

$tdataapp_group_modules[".addPageEvents"] = false;

// use timepicker for search panel
$tdataapp_group_modules[".isUseTimeForSearch"] = false;




$tdataapp_group_modules[".allSearchFields"] = array();

$tdataapp_group_modules[".allSearchFields"][] = "group_id";
$tdataapp_group_modules[".allSearchFields"][] = "id";
$tdataapp_group_modules[".allSearchFields"][] = "module_id";
$tdataapp_group_modules[".allSearchFields"][] = "reads";
$tdataapp_group_modules[".allSearchFields"][] = "writes";
$tdataapp_group_modules[".allSearchFields"][] = "deletes";
$tdataapp_group_modules[".allSearchFields"][] = "inserts";

$tdataapp_group_modules[".googleLikeFields"][] = "group_id";
$tdataapp_group_modules[".googleLikeFields"][] = "id";
$tdataapp_group_modules[".googleLikeFields"][] = "module_id";
$tdataapp_group_modules[".googleLikeFields"][] = "reads";
$tdataapp_group_modules[".googleLikeFields"][] = "writes";
$tdataapp_group_modules[".googleLikeFields"][] = "deletes";
$tdataapp_group_modules[".googleLikeFields"][] = "inserts";


$tdataapp_group_modules[".advSearchFields"][] = "group_id";
$tdataapp_group_modules[".advSearchFields"][] = "id";
$tdataapp_group_modules[".advSearchFields"][] = "module_id";
$tdataapp_group_modules[".advSearchFields"][] = "reads";
$tdataapp_group_modules[".advSearchFields"][] = "writes";
$tdataapp_group_modules[".advSearchFields"][] = "deletes";
$tdataapp_group_modules[".advSearchFields"][] = "inserts";

$tdataapp_group_modules[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataapp_group_modules[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataapp_group_modules[".strOrderBy"] = $tstrOrderBy;

$tdataapp_group_modules[".orderindexes"] = array();

$tdataapp_group_modules[".sqlHead"] = "SELECT group_id,   id,   module_id,   \"reads\",   writes,   deletes,   inserts";
$tdataapp_group_modules[".sqlFrom"] = "FROM app.group_modules";
$tdataapp_group_modules[".sqlWhereExpr"] = "";
$tdataapp_group_modules[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataapp_group_modules[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataapp_group_modules[".arrGroupsPerPage"] = $arrGPP;

$tableKeysapp_group_modules = array();
$tableKeysapp_group_modules[] = "id";
$tdataapp_group_modules[".Keys"] = $tableKeysapp_group_modules;

$tdataapp_group_modules[".listFields"] = array();
$tdataapp_group_modules[".listFields"][] = "group_id";
$tdataapp_group_modules[".listFields"][] = "id";
$tdataapp_group_modules[".listFields"][] = "module_id";
$tdataapp_group_modules[".listFields"][] = "reads";
$tdataapp_group_modules[".listFields"][] = "writes";
$tdataapp_group_modules[".listFields"][] = "deletes";
$tdataapp_group_modules[".listFields"][] = "inserts";

$tdataapp_group_modules[".viewFields"] = array();
$tdataapp_group_modules[".viewFields"][] = "group_id";
$tdataapp_group_modules[".viewFields"][] = "id";
$tdataapp_group_modules[".viewFields"][] = "module_id";
$tdataapp_group_modules[".viewFields"][] = "reads";
$tdataapp_group_modules[".viewFields"][] = "writes";
$tdataapp_group_modules[".viewFields"][] = "deletes";
$tdataapp_group_modules[".viewFields"][] = "inserts";

$tdataapp_group_modules[".addFields"] = array();
$tdataapp_group_modules[".addFields"][] = "group_id";
$tdataapp_group_modules[".addFields"][] = "module_id";
$tdataapp_group_modules[".addFields"][] = "reads";
$tdataapp_group_modules[".addFields"][] = "writes";
$tdataapp_group_modules[".addFields"][] = "deletes";
$tdataapp_group_modules[".addFields"][] = "inserts";

$tdataapp_group_modules[".inlineAddFields"] = array();
$tdataapp_group_modules[".inlineAddFields"][] = "group_id";
$tdataapp_group_modules[".inlineAddFields"][] = "module_id";
$tdataapp_group_modules[".inlineAddFields"][] = "reads";
$tdataapp_group_modules[".inlineAddFields"][] = "writes";
$tdataapp_group_modules[".inlineAddFields"][] = "deletes";
$tdataapp_group_modules[".inlineAddFields"][] = "inserts";

$tdataapp_group_modules[".editFields"] = array();
$tdataapp_group_modules[".editFields"][] = "group_id";
$tdataapp_group_modules[".editFields"][] = "module_id";
$tdataapp_group_modules[".editFields"][] = "reads";
$tdataapp_group_modules[".editFields"][] = "writes";
$tdataapp_group_modules[".editFields"][] = "deletes";
$tdataapp_group_modules[".editFields"][] = "inserts";

$tdataapp_group_modules[".inlineEditFields"] = array();
$tdataapp_group_modules[".inlineEditFields"][] = "group_id";
$tdataapp_group_modules[".inlineEditFields"][] = "module_id";
$tdataapp_group_modules[".inlineEditFields"][] = "reads";
$tdataapp_group_modules[".inlineEditFields"][] = "writes";
$tdataapp_group_modules[".inlineEditFields"][] = "deletes";
$tdataapp_group_modules[".inlineEditFields"][] = "inserts";

$tdataapp_group_modules[".exportFields"] = array();
$tdataapp_group_modules[".exportFields"][] = "group_id";
$tdataapp_group_modules[".exportFields"][] = "id";
$tdataapp_group_modules[".exportFields"][] = "module_id";
$tdataapp_group_modules[".exportFields"][] = "reads";
$tdataapp_group_modules[".exportFields"][] = "writes";
$tdataapp_group_modules[".exportFields"][] = "deletes";
$tdataapp_group_modules[".exportFields"][] = "inserts";

$tdataapp_group_modules[".printFields"] = array();
$tdataapp_group_modules[".printFields"][] = "group_id";
$tdataapp_group_modules[".printFields"][] = "id";
$tdataapp_group_modules[".printFields"][] = "module_id";
$tdataapp_group_modules[".printFields"][] = "reads";
$tdataapp_group_modules[".printFields"][] = "writes";
$tdataapp_group_modules[".printFields"][] = "deletes";
$tdataapp_group_modules[".printFields"][] = "inserts";

//	group_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "group_id";
	$fdata["GoodName"] = "group_id";
	$fdata["ownerTable"] = "app.group_modules";
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
	
		
		
	$tdataapp_group_modules["group_id"] = $fdata;
//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "app.group_modules";
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
	
		
		
	$tdataapp_group_modules["id"] = $fdata;
//	module_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "module_id";
	$fdata["GoodName"] = "module_id";
	$fdata["ownerTable"] = "app.group_modules";
	$fdata["Label"] = "Module Id"; 
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
	
		$fdata["strField"] = "module_id"; 
		$fdata["FullName"] = "module_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "app.modules";
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
	
		
		
	$tdataapp_group_modules["module_id"] = $fdata;
//	reads
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "reads";
	$fdata["GoodName"] = "reads";
	$fdata["ownerTable"] = "app.group_modules";
	$fdata["Label"] = "Reads"; 
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
	
		$fdata["strField"] = "reads"; 
		$fdata["FullName"] = "\"reads\"";
	
		
		
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_group_modules["reads"] = $fdata;
//	writes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "writes";
	$fdata["GoodName"] = "writes";
	$fdata["ownerTable"] = "app.group_modules";
	$fdata["Label"] = "Writes"; 
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
	
		$fdata["strField"] = "writes"; 
		$fdata["FullName"] = "writes";
	
		
		
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_group_modules["writes"] = $fdata;
//	deletes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "deletes";
	$fdata["GoodName"] = "deletes";
	$fdata["ownerTable"] = "app.group_modules";
	$fdata["Label"] = "Deletes"; 
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
	
		$fdata["strField"] = "deletes"; 
		$fdata["FullName"] = "deletes";
	
		
		
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_group_modules["deletes"] = $fdata;
//	inserts
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "inserts";
	$fdata["GoodName"] = "inserts";
	$fdata["ownerTable"] = "app.group_modules";
	$fdata["Label"] = "Inserts"; 
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
	
		$fdata["strField"] = "inserts"; 
		$fdata["FullName"] = "inserts";
	
		
		
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_group_modules["inserts"] = $fdata;

	
$tables_data["app.group_modules"]=&$tdataapp_group_modules;
$field_labels["app_group_modules"] = &$fieldLabelsapp_group_modules;
$fieldToolTips["app.group_modules"] = &$fieldToolTipsapp_group_modules;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["app.group_modules"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["app.group_modules"] = array();

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
	$masterTablesData["app.group_modules"][$mIndex] = $masterParams;	
		$masterTablesData["app.group_modules"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["app.group_modules"][$mIndex]["detailKeys"][]="group_id";

$mIndex = 2-1;
			$strOriginalDetailsTable="app.modules";
	$masterParams["mDataSourceTable"]="app.modules";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "app_modules";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["app.group_modules"][$mIndex] = $masterParams;	
		$masterTablesData["app.group_modules"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["app.group_modules"][$mIndex]["detailKeys"][]="module_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_app_group_modules()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "group_id,   id,   module_id,   \"reads\",   writes,   deletes,   inserts";
$proto0["m_strFrom"] = "FROM app.group_modules";
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
	"m_strName" => "group_id",
	"m_strTable" => "app.group_modules"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "app.group_modules"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "module_id",
	"m_strTable" => "app.group_modules"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "reads",
	"m_strTable" => "app.group_modules"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "writes",
	"m_strTable" => "app.group_modules"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "deletes",
	"m_strTable" => "app.group_modules"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "inserts",
	"m_strTable" => "app.group_modules"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "app.group_modules";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "group_id";
$proto20["m_columns"][] = "id";
$proto20["m_columns"][] = "module_id";
$proto20["m_columns"][] = "reads";
$proto20["m_columns"][] = "writes";
$proto20["m_columns"][] = "deletes";
$proto20["m_columns"][] = "inserts";
$obj = new SQLTable($proto20);

$proto19["m_table"] = $obj;
$proto19["m_alias"] = "";
$proto21=array();
$proto21["m_sql"] = "";
$proto21["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto21["m_column"]=$obj;
$proto21["m_contained"] = array();
$proto21["m_strCase"] = "";
$proto21["m_havingmode"] = "0";
$proto21["m_inBrackets"] = "0";
$proto21["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto21);

$proto19["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto19);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_app_group_modules = createSqlQuery_app_group_modules();
							$tdataapp_group_modules[".sqlquery"] = $queryData_app_group_modules;
	
if(isset($tdataapp_group_modules["field2"])){
	$tdataapp_group_modules["field2"]["LookupTable"] = "carscars_view";
	$tdataapp_group_modules["field2"]["LookupOrderBy"] = "name";
	$tdataapp_group_modules["field2"]["LookupType"] = 4;
	$tdataapp_group_modules["field2"]["LinkField"] = "email";
	$tdataapp_group_modules["field2"]["DisplayField"] = "name";
	$tdataapp_group_modules[".hasCustomViewField"] = true;
}

$tableEvents["app.group_modules"] = new eventsBase;
$tdataapp_group_modules[".hasEvents"] = false;

$cipherer = new RunnerCipherer("app.group_modules");

?>