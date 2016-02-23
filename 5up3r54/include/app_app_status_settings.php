<?php
require_once(getabspath("classes/cipherer.php"));
$tdataapp_app_status = array();
	$tdataapp_app_status[".NumberOfChars"] = 80; 
	$tdataapp_app_status[".ShortName"] = "app_app_status";
	$tdataapp_app_status[".OwnerID"] = "";
	$tdataapp_app_status[".OriginalTable"] = "app.app_status";

//	field labels
$fieldLabelsapp_app_status = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsapp_app_status["English"] = array();
	$fieldToolTipsapp_app_status["English"] = array();
	$fieldLabelsapp_app_status["English"]["id"] = "Id";
	$fieldToolTipsapp_app_status["English"]["id"] = "";
	$fieldLabelsapp_app_status["English"]["tahun"] = "Tahun";
	$fieldToolTipsapp_app_status["English"]["tahun"] = "";
	$fieldLabelsapp_app_status["English"]["app_id"] = "App Id";
	$fieldToolTipsapp_app_status["English"]["app_id"] = "";
	$fieldLabelsapp_app_status["English"]["step"] = "Step";
	$fieldToolTipsapp_app_status["English"]["step"] = "";
	$fieldLabelsapp_app_status["English"]["operator"] = "Operator";
	$fieldToolTipsapp_app_status["English"]["operator"] = "";
	$fieldLabelsapp_app_status["English"]["review"] = "Review";
	$fieldToolTipsapp_app_status["English"]["review"] = "";
	$fieldLabelsapp_app_status["English"]["manager"] = "Manager";
	$fieldToolTipsapp_app_status["English"]["manager"] = "";
	if (count($fieldToolTipsapp_app_status["English"]))
		$tdataapp_app_status[".isUseToolTips"] = true;
}
	
	
	$tdataapp_app_status[".NCSearch"] = true;



$tdataapp_app_status[".shortTableName"] = "app_app_status";
$tdataapp_app_status[".nSecOptions"] = 0;
$tdataapp_app_status[".recsPerRowList"] = 1;
$tdataapp_app_status[".mainTableOwnerID"] = "";
$tdataapp_app_status[".moveNext"] = 1;
$tdataapp_app_status[".nType"] = 0;

$tdataapp_app_status[".strOriginalTableName"] = "app.app_status";




$tdataapp_app_status[".showAddInPopup"] = false;

$tdataapp_app_status[".showEditInPopup"] = false;

$tdataapp_app_status[".showViewInPopup"] = false;

$tdataapp_app_status[".fieldsForRegister"] = array();

$tdataapp_app_status[".listAjax"] = false;

	$tdataapp_app_status[".audit"] = false;

	$tdataapp_app_status[".locking"] = false;

$tdataapp_app_status[".listIcons"] = true;
$tdataapp_app_status[".edit"] = true;
$tdataapp_app_status[".inlineEdit"] = true;
$tdataapp_app_status[".inlineAdd"] = true;
$tdataapp_app_status[".view"] = true;



$tdataapp_app_status[".delete"] = true;

$tdataapp_app_status[".showSimpleSearchOptions"] = false;

$tdataapp_app_status[".showSearchPanel"] = true;

if (isMobile())
	$tdataapp_app_status[".isUseAjaxSuggest"] = false;
else 
	$tdataapp_app_status[".isUseAjaxSuggest"] = true;

$tdataapp_app_status[".rowHighlite"] = true;

// button handlers file names

$tdataapp_app_status[".addPageEvents"] = false;

// use timepicker for search panel
$tdataapp_app_status[".isUseTimeForSearch"] = false;




$tdataapp_app_status[".allSearchFields"] = array();

$tdataapp_app_status[".allSearchFields"][] = "id";
$tdataapp_app_status[".allSearchFields"][] = "tahun";
$tdataapp_app_status[".allSearchFields"][] = "app_id";
$tdataapp_app_status[".allSearchFields"][] = "step";
$tdataapp_app_status[".allSearchFields"][] = "operator";
$tdataapp_app_status[".allSearchFields"][] = "review";
$tdataapp_app_status[".allSearchFields"][] = "manager";

$tdataapp_app_status[".googleLikeFields"][] = "id";
$tdataapp_app_status[".googleLikeFields"][] = "tahun";
$tdataapp_app_status[".googleLikeFields"][] = "app_id";
$tdataapp_app_status[".googleLikeFields"][] = "step";
$tdataapp_app_status[".googleLikeFields"][] = "operator";
$tdataapp_app_status[".googleLikeFields"][] = "review";
$tdataapp_app_status[".googleLikeFields"][] = "manager";


$tdataapp_app_status[".advSearchFields"][] = "id";
$tdataapp_app_status[".advSearchFields"][] = "tahun";
$tdataapp_app_status[".advSearchFields"][] = "app_id";
$tdataapp_app_status[".advSearchFields"][] = "step";
$tdataapp_app_status[".advSearchFields"][] = "operator";
$tdataapp_app_status[".advSearchFields"][] = "review";
$tdataapp_app_status[".advSearchFields"][] = "manager";

$tdataapp_app_status[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdataapp_app_status[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataapp_app_status[".strOrderBy"] = $tstrOrderBy;

$tdataapp_app_status[".orderindexes"] = array();

$tdataapp_app_status[".sqlHead"] = "SELECT id,  tahun,  app_id,  step,  \"operator\",  review,  manager";
$tdataapp_app_status[".sqlFrom"] = "FROM app.app_status";
$tdataapp_app_status[".sqlWhereExpr"] = "";
$tdataapp_app_status[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataapp_app_status[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataapp_app_status[".arrGroupsPerPage"] = $arrGPP;

$tableKeysapp_app_status = array();
$tableKeysapp_app_status[] = "id";
$tdataapp_app_status[".Keys"] = $tableKeysapp_app_status;

$tdataapp_app_status[".listFields"] = array();
$tdataapp_app_status[".listFields"][] = "id";
$tdataapp_app_status[".listFields"][] = "tahun";
$tdataapp_app_status[".listFields"][] = "app_id";
$tdataapp_app_status[".listFields"][] = "step";
$tdataapp_app_status[".listFields"][] = "operator";
$tdataapp_app_status[".listFields"][] = "review";
$tdataapp_app_status[".listFields"][] = "manager";

$tdataapp_app_status[".viewFields"] = array();
$tdataapp_app_status[".viewFields"][] = "id";
$tdataapp_app_status[".viewFields"][] = "tahun";
$tdataapp_app_status[".viewFields"][] = "app_id";
$tdataapp_app_status[".viewFields"][] = "step";
$tdataapp_app_status[".viewFields"][] = "operator";
$tdataapp_app_status[".viewFields"][] = "review";
$tdataapp_app_status[".viewFields"][] = "manager";

$tdataapp_app_status[".addFields"] = array();
$tdataapp_app_status[".addFields"][] = "tahun";
$tdataapp_app_status[".addFields"][] = "app_id";
$tdataapp_app_status[".addFields"][] = "step";
$tdataapp_app_status[".addFields"][] = "operator";
$tdataapp_app_status[".addFields"][] = "review";
$tdataapp_app_status[".addFields"][] = "manager";

$tdataapp_app_status[".inlineAddFields"] = array();
$tdataapp_app_status[".inlineAddFields"][] = "tahun";
$tdataapp_app_status[".inlineAddFields"][] = "app_id";
$tdataapp_app_status[".inlineAddFields"][] = "step";
$tdataapp_app_status[".inlineAddFields"][] = "operator";
$tdataapp_app_status[".inlineAddFields"][] = "review";
$tdataapp_app_status[".inlineAddFields"][] = "manager";

$tdataapp_app_status[".editFields"] = array();
$tdataapp_app_status[".editFields"][] = "tahun";
$tdataapp_app_status[".editFields"][] = "app_id";
$tdataapp_app_status[".editFields"][] = "step";
$tdataapp_app_status[".editFields"][] = "operator";
$tdataapp_app_status[".editFields"][] = "review";
$tdataapp_app_status[".editFields"][] = "manager";

$tdataapp_app_status[".inlineEditFields"] = array();
$tdataapp_app_status[".inlineEditFields"][] = "tahun";
$tdataapp_app_status[".inlineEditFields"][] = "app_id";
$tdataapp_app_status[".inlineEditFields"][] = "step";
$tdataapp_app_status[".inlineEditFields"][] = "operator";
$tdataapp_app_status[".inlineEditFields"][] = "review";
$tdataapp_app_status[".inlineEditFields"][] = "manager";

$tdataapp_app_status[".exportFields"] = array();
$tdataapp_app_status[".exportFields"][] = "id";
$tdataapp_app_status[".exportFields"][] = "tahun";
$tdataapp_app_status[".exportFields"][] = "app_id";
$tdataapp_app_status[".exportFields"][] = "step";
$tdataapp_app_status[".exportFields"][] = "operator";
$tdataapp_app_status[".exportFields"][] = "review";
$tdataapp_app_status[".exportFields"][] = "manager";

$tdataapp_app_status[".printFields"] = array();
$tdataapp_app_status[".printFields"][] = "id";
$tdataapp_app_status[".printFields"][] = "tahun";
$tdataapp_app_status[".printFields"][] = "app_id";
$tdataapp_app_status[".printFields"][] = "step";
$tdataapp_app_status[".printFields"][] = "operator";
$tdataapp_app_status[".printFields"][] = "review";
$tdataapp_app_status[".printFields"][] = "manager";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "app.app_status";
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
	
		
		
	$tdataapp_app_status["id"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "app.app_status";
	$fdata["Label"] = "Tahun"; 
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
	
		$fdata["strField"] = "tahun"; 
		$fdata["FullName"] = "tahun";
	
		
		
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
	
		
		
	$tdataapp_app_status["tahun"] = $fdata;
//	app_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "app_id";
	$fdata["GoodName"] = "app_id";
	$fdata["ownerTable"] = "app.app_status";
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
	
		
		
	$tdataapp_app_status["app_id"] = $fdata;
//	step
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "step";
	$fdata["GoodName"] = "step";
	$fdata["ownerTable"] = "app.app_status";
	$fdata["Label"] = "Step"; 
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
	
		$fdata["strField"] = "step"; 
		$fdata["FullName"] = "step";
	
		
		
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_app_status["step"] = $fdata;
//	operator
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "operator";
	$fdata["GoodName"] = "operator";
	$fdata["ownerTable"] = "app.app_status";
	$fdata["Label"] = "Operator"; 
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
	
		$fdata["strField"] = "operator"; 
		$fdata["FullName"] = "\"operator\"";
	
		
		
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
	
		
		
	$tdataapp_app_status["operator"] = $fdata;
//	review
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "review";
	$fdata["GoodName"] = "review";
	$fdata["ownerTable"] = "app.app_status";
	$fdata["Label"] = "Review"; 
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
	
		$fdata["strField"] = "review"; 
		$fdata["FullName"] = "review";
	
		
		
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
	
		
		
	$tdataapp_app_status["review"] = $fdata;
//	manager
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "manager";
	$fdata["GoodName"] = "manager";
	$fdata["ownerTable"] = "app.app_status";
	$fdata["Label"] = "Manager"; 
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
	
		$fdata["strField"] = "manager"; 
		$fdata["FullName"] = "manager";
	
		
		
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
	
		
		
	$tdataapp_app_status["manager"] = $fdata;

	
$tables_data["app.app_status"]=&$tdataapp_app_status;
$field_labels["app_app_status"] = &$fieldLabelsapp_app_status;
$fieldToolTips["app.app_status"] = &$fieldToolTipsapp_app_status;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["app.app_status"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["app.app_status"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_app_app_status()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,  tahun,  app_id,  step,  \"operator\",  review,  manager";
$proto0["m_strFrom"] = "FROM app.app_status";
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
	"m_strTable" => "app.app_status"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "app.app_status"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "app_id",
	"m_strTable" => "app.app_status"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "step",
	"m_strTable" => "app.app_status"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "operator",
	"m_strTable" => "app.app_status"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "review",
	"m_strTable" => "app.app_status"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "manager",
	"m_strTable" => "app.app_status"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "app.app_status";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "id";
$proto20["m_columns"][] = "tahun";
$proto20["m_columns"][] = "app_id";
$proto20["m_columns"][] = "step";
$proto20["m_columns"][] = "operator";
$proto20["m_columns"][] = "review";
$proto20["m_columns"][] = "manager";
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
$queryData_app_app_status = createSqlQuery_app_app_status();
							$tdataapp_app_status[".sqlquery"] = $queryData_app_app_status;
	
if(isset($tdataapp_app_status["field2"])){
	$tdataapp_app_status["field2"]["LookupTable"] = "carscars_view";
	$tdataapp_app_status["field2"]["LookupOrderBy"] = "name";
	$tdataapp_app_status["field2"]["LookupType"] = 4;
	$tdataapp_app_status["field2"]["LinkField"] = "email";
	$tdataapp_app_status["field2"]["DisplayField"] = "name";
	$tdataapp_app_status[".hasCustomViewField"] = true;
}

$tableEvents["app.app_status"] = new eventsBase;
$tdataapp_app_status[".hasEvents"] = false;

$cipherer = new RunnerCipherer("app.app_status");

?>