<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_air_zona = array();
	$tdatapad_pad_air_zona[".NumberOfChars"] = 80; 
	$tdatapad_pad_air_zona[".ShortName"] = "pad_pad_air_zona";
	$tdatapad_pad_air_zona[".OwnerID"] = "";
	$tdatapad_pad_air_zona[".OriginalTable"] = "pad.pad_air_zona";

//	field labels
$fieldLabelspad_pad_air_zona = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_air_zona["English"] = array();
	$fieldToolTipspad_pad_air_zona["English"] = array();
	$fieldLabelspad_pad_air_zona["English"]["id"] = "Id";
	$fieldToolTipspad_pad_air_zona["English"]["id"] = "";
	$fieldLabelspad_pad_air_zona["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_air_zona["English"]["nama"] = "";
	$fieldLabelspad_pad_air_zona["English"]["indeks"] = "Indeks";
	$fieldToolTipspad_pad_air_zona["English"]["indeks"] = "";
	$fieldLabelspad_pad_air_zona["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_air_zona["English"]["update_uid"] = "";
	$fieldLabelspad_pad_air_zona["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_air_zona["English"]["create_uid"] = "";
	$fieldLabelspad_pad_air_zona["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_air_zona["English"]["updated"] = "";
	$fieldLabelspad_pad_air_zona["English"]["created"] = "Created";
	$fieldToolTipspad_pad_air_zona["English"]["created"] = "";
	if (count($fieldToolTipspad_pad_air_zona["English"]))
		$tdatapad_pad_air_zona[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_air_zona[".NCSearch"] = true;



$tdatapad_pad_air_zona[".shortTableName"] = "pad_pad_air_zona";
$tdatapad_pad_air_zona[".nSecOptions"] = 0;
$tdatapad_pad_air_zona[".recsPerRowList"] = 1;
$tdatapad_pad_air_zona[".mainTableOwnerID"] = "";
$tdatapad_pad_air_zona[".moveNext"] = 1;
$tdatapad_pad_air_zona[".nType"] = 0;

$tdatapad_pad_air_zona[".strOriginalTableName"] = "pad.pad_air_zona";




$tdatapad_pad_air_zona[".showAddInPopup"] = false;

$tdatapad_pad_air_zona[".showEditInPopup"] = false;

$tdatapad_pad_air_zona[".showViewInPopup"] = false;

$tdatapad_pad_air_zona[".fieldsForRegister"] = array();

$tdatapad_pad_air_zona[".listAjax"] = false;

	$tdatapad_pad_air_zona[".audit"] = false;

	$tdatapad_pad_air_zona[".locking"] = false;

$tdatapad_pad_air_zona[".listIcons"] = true;
$tdatapad_pad_air_zona[".edit"] = true;
$tdatapad_pad_air_zona[".inlineEdit"] = true;
$tdatapad_pad_air_zona[".inlineAdd"] = true;
$tdatapad_pad_air_zona[".view"] = true;



$tdatapad_pad_air_zona[".delete"] = true;

$tdatapad_pad_air_zona[".showSimpleSearchOptions"] = false;

$tdatapad_pad_air_zona[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_air_zona[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_air_zona[".isUseAjaxSuggest"] = true;

$tdatapad_pad_air_zona[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_air_zona[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_air_zona[".isUseTimeForSearch"] = false;



$tdatapad_pad_air_zona[".useDetailsPreview"] = true;

$tdatapad_pad_air_zona[".allSearchFields"] = array();

$tdatapad_pad_air_zona[".allSearchFields"][] = "id";
$tdatapad_pad_air_zona[".allSearchFields"][] = "nama";
$tdatapad_pad_air_zona[".allSearchFields"][] = "indeks";
$tdatapad_pad_air_zona[".allSearchFields"][] = "update_uid";
$tdatapad_pad_air_zona[".allSearchFields"][] = "create_uid";
$tdatapad_pad_air_zona[".allSearchFields"][] = "updated";
$tdatapad_pad_air_zona[".allSearchFields"][] = "created";

$tdatapad_pad_air_zona[".googleLikeFields"][] = "id";
$tdatapad_pad_air_zona[".googleLikeFields"][] = "nama";
$tdatapad_pad_air_zona[".googleLikeFields"][] = "indeks";
$tdatapad_pad_air_zona[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_air_zona[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_air_zona[".googleLikeFields"][] = "updated";
$tdatapad_pad_air_zona[".googleLikeFields"][] = "created";


$tdatapad_pad_air_zona[".advSearchFields"][] = "id";
$tdatapad_pad_air_zona[".advSearchFields"][] = "nama";
$tdatapad_pad_air_zona[".advSearchFields"][] = "indeks";
$tdatapad_pad_air_zona[".advSearchFields"][] = "update_uid";
$tdatapad_pad_air_zona[".advSearchFields"][] = "create_uid";
$tdatapad_pad_air_zona[".advSearchFields"][] = "updated";
$tdatapad_pad_air_zona[".advSearchFields"][] = "created";

$tdatapad_pad_air_zona[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdatapad_pad_air_zona[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_air_zona[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_air_zona[".orderindexes"] = array();

$tdatapad_pad_air_zona[".sqlHead"] = "SELECT id,   nama,   indeks,   update_uid,   create_uid,   updated,   created";
$tdatapad_pad_air_zona[".sqlFrom"] = "FROM \"pad\".pad_air_zona";
$tdatapad_pad_air_zona[".sqlWhereExpr"] = "";
$tdatapad_pad_air_zona[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_air_zona[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_air_zona[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_air_zona = array();
$tableKeyspad_pad_air_zona[] = "id";
$tdatapad_pad_air_zona[".Keys"] = $tableKeyspad_pad_air_zona;

$tdatapad_pad_air_zona[".listFields"] = array();
$tdatapad_pad_air_zona[".listFields"][] = "id";
$tdatapad_pad_air_zona[".listFields"][] = "nama";
$tdatapad_pad_air_zona[".listFields"][] = "indeks";
$tdatapad_pad_air_zona[".listFields"][] = "update_uid";
$tdatapad_pad_air_zona[".listFields"][] = "create_uid";
$tdatapad_pad_air_zona[".listFields"][] = "updated";
$tdatapad_pad_air_zona[".listFields"][] = "created";

$tdatapad_pad_air_zona[".viewFields"] = array();
$tdatapad_pad_air_zona[".viewFields"][] = "id";
$tdatapad_pad_air_zona[".viewFields"][] = "nama";
$tdatapad_pad_air_zona[".viewFields"][] = "indeks";
$tdatapad_pad_air_zona[".viewFields"][] = "update_uid";
$tdatapad_pad_air_zona[".viewFields"][] = "create_uid";
$tdatapad_pad_air_zona[".viewFields"][] = "updated";
$tdatapad_pad_air_zona[".viewFields"][] = "created";

$tdatapad_pad_air_zona[".addFields"] = array();
$tdatapad_pad_air_zona[".addFields"][] = "nama";
$tdatapad_pad_air_zona[".addFields"][] = "indeks";
$tdatapad_pad_air_zona[".addFields"][] = "update_uid";
$tdatapad_pad_air_zona[".addFields"][] = "create_uid";
$tdatapad_pad_air_zona[".addFields"][] = "updated";
$tdatapad_pad_air_zona[".addFields"][] = "created";

$tdatapad_pad_air_zona[".inlineAddFields"] = array();
$tdatapad_pad_air_zona[".inlineAddFields"][] = "nama";
$tdatapad_pad_air_zona[".inlineAddFields"][] = "indeks";
$tdatapad_pad_air_zona[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_air_zona[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_air_zona[".inlineAddFields"][] = "updated";
$tdatapad_pad_air_zona[".inlineAddFields"][] = "created";

$tdatapad_pad_air_zona[".editFields"] = array();
$tdatapad_pad_air_zona[".editFields"][] = "nama";
$tdatapad_pad_air_zona[".editFields"][] = "indeks";
$tdatapad_pad_air_zona[".editFields"][] = "update_uid";
$tdatapad_pad_air_zona[".editFields"][] = "create_uid";
$tdatapad_pad_air_zona[".editFields"][] = "updated";
$tdatapad_pad_air_zona[".editFields"][] = "created";

$tdatapad_pad_air_zona[".inlineEditFields"] = array();
$tdatapad_pad_air_zona[".inlineEditFields"][] = "nama";
$tdatapad_pad_air_zona[".inlineEditFields"][] = "indeks";
$tdatapad_pad_air_zona[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_air_zona[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_air_zona[".inlineEditFields"][] = "updated";
$tdatapad_pad_air_zona[".inlineEditFields"][] = "created";

$tdatapad_pad_air_zona[".exportFields"] = array();
$tdatapad_pad_air_zona[".exportFields"][] = "id";
$tdatapad_pad_air_zona[".exportFields"][] = "nama";
$tdatapad_pad_air_zona[".exportFields"][] = "indeks";
$tdatapad_pad_air_zona[".exportFields"][] = "update_uid";
$tdatapad_pad_air_zona[".exportFields"][] = "create_uid";
$tdatapad_pad_air_zona[".exportFields"][] = "updated";
$tdatapad_pad_air_zona[".exportFields"][] = "created";

$tdatapad_pad_air_zona[".printFields"] = array();
$tdatapad_pad_air_zona[".printFields"][] = "id";
$tdatapad_pad_air_zona[".printFields"][] = "nama";
$tdatapad_pad_air_zona[".printFields"][] = "indeks";
$tdatapad_pad_air_zona[".printFields"][] = "update_uid";
$tdatapad_pad_air_zona[".printFields"][] = "create_uid";
$tdatapad_pad_air_zona[".printFields"][] = "updated";
$tdatapad_pad_air_zona[".printFields"][] = "created";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_air_zona";
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
	
		
		
	$tdatapad_pad_air_zona["id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_air_zona";
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
	
		
		
	$tdatapad_pad_air_zona["nama"] = $fdata;
//	indeks
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "indeks";
	$fdata["GoodName"] = "indeks";
	$fdata["ownerTable"] = "pad.pad_air_zona";
	$fdata["Label"] = "Indeks"; 
	$fdata["FieldType"] = 5;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "indeks"; 
		$fdata["FullName"] = "indeks";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
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
	
		
		
	$tdatapad_pad_air_zona["indeks"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_air_zona";
	$fdata["Label"] = "Update Uid"; 
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
	
		$fdata["strField"] = "update_uid"; 
		$fdata["FullName"] = "update_uid";
	
		
		
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
	
		
		
	$tdatapad_pad_air_zona["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_air_zona";
	$fdata["Label"] = "Create Uid"; 
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
	
		$fdata["strField"] = "create_uid"; 
		$fdata["FullName"] = "create_uid";
	
		
		
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
	
		
		
	$tdatapad_pad_air_zona["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_air_zona";
	$fdata["Label"] = "Updated"; 
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
	
		$fdata["strField"] = "updated"; 
		$fdata["FullName"] = "updated";
	
		
		
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
	
		
		
	$tdatapad_pad_air_zona["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_air_zona";
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
	
		
		
	$tdatapad_pad_air_zona["created"] = $fdata;

	
$tables_data["pad.pad_air_zona"]=&$tdatapad_pad_air_zona;
$field_labels["pad_pad_air_zona"] = &$fieldLabelspad_pad_air_zona;
$fieldToolTips["pad.pad_air_zona"] = &$fieldToolTipspad_pad_air_zona;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_air_zona"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_air_hda";
	$detailsParam["dDataSourceTable"]="pad.pad_air_hda";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_air_hda";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_air_zona"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_air_zona"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_air_zona"][$dIndex]["detailKeys"][]="zona_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_air_zona"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_air_zona()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama,   indeks,   update_uid,   create_uid,   updated,   created";
$proto0["m_strFrom"] = "FROM \"pad\".pad_air_zona";
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
	"m_strTable" => "pad.pad_air_zona"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_air_zona"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "indeks",
	"m_strTable" => "pad.pad_air_zona"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_air_zona"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_air_zona"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_air_zona"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_air_zona"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "pad.pad_air_zona";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "id";
$proto20["m_columns"][] = "nama";
$proto20["m_columns"][] = "indeks";
$proto20["m_columns"][] = "update_uid";
$proto20["m_columns"][] = "create_uid";
$proto20["m_columns"][] = "updated";
$proto20["m_columns"][] = "created";
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
$queryData_pad_pad_air_zona = createSqlQuery_pad_pad_air_zona();
							$tdatapad_pad_air_zona[".sqlquery"] = $queryData_pad_pad_air_zona;
	
if(isset($tdatapad_pad_air_zona["field2"])){
	$tdatapad_pad_air_zona["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_air_zona["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_air_zona["field2"]["LookupType"] = 4;
	$tdatapad_pad_air_zona["field2"]["LinkField"] = "email";
	$tdatapad_pad_air_zona["field2"]["DisplayField"] = "name";
	$tdatapad_pad_air_zona[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_air_zona"] = new eventsBase;
$tdatapad_pad_air_zona[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_air_zona");

?>