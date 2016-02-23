<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_usaha = array();
	$tdatapad_pad_usaha[".NumberOfChars"] = 80; 
	$tdatapad_pad_usaha[".ShortName"] = "pad_pad_usaha";
	$tdatapad_pad_usaha[".OwnerID"] = "";
	$tdatapad_pad_usaha[".OriginalTable"] = "pad.pad_usaha";

//	field labels
$fieldLabelspad_pad_usaha = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_usaha["English"] = array();
	$fieldToolTipspad_pad_usaha["English"] = array();
	$fieldLabelspad_pad_usaha["English"]["id"] = "Id";
	$fieldToolTipspad_pad_usaha["English"]["id"] = "";
	$fieldLabelspad_pad_usaha["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_usaha["English"]["nama"] = "";
	$fieldLabelspad_pad_usaha["English"]["so"] = "So";
	$fieldToolTipspad_pad_usaha["English"]["so"] = "";
	$fieldLabelspad_pad_usaha["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_usaha["English"]["tmt"] = "";
	$fieldLabelspad_pad_usaha["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_usaha["English"]["enabled"] = "";
	$fieldLabelspad_pad_usaha["English"]["created"] = "Created";
	$fieldToolTipspad_pad_usaha["English"]["created"] = "";
	$fieldLabelspad_pad_usaha["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_usaha["English"]["create_uid"] = "";
	$fieldLabelspad_pad_usaha["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_usaha["English"]["updated"] = "";
	$fieldLabelspad_pad_usaha["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_usaha["English"]["update_uid"] = "";
	if (count($fieldToolTipspad_pad_usaha["English"]))
		$tdatapad_pad_usaha[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_usaha[".NCSearch"] = true;



$tdatapad_pad_usaha[".shortTableName"] = "pad_pad_usaha";
$tdatapad_pad_usaha[".nSecOptions"] = 0;
$tdatapad_pad_usaha[".recsPerRowList"] = 1;
$tdatapad_pad_usaha[".mainTableOwnerID"] = "";
$tdatapad_pad_usaha[".moveNext"] = 1;
$tdatapad_pad_usaha[".nType"] = 0;

$tdatapad_pad_usaha[".strOriginalTableName"] = "pad.pad_usaha";




$tdatapad_pad_usaha[".showAddInPopup"] = false;

$tdatapad_pad_usaha[".showEditInPopup"] = false;

$tdatapad_pad_usaha[".showViewInPopup"] = false;

$tdatapad_pad_usaha[".fieldsForRegister"] = array();

$tdatapad_pad_usaha[".listAjax"] = false;

	$tdatapad_pad_usaha[".audit"] = false;

	$tdatapad_pad_usaha[".locking"] = false;

$tdatapad_pad_usaha[".listIcons"] = true;
$tdatapad_pad_usaha[".edit"] = true;
$tdatapad_pad_usaha[".inlineEdit"] = true;
$tdatapad_pad_usaha[".inlineAdd"] = true;
$tdatapad_pad_usaha[".view"] = true;

$tdatapad_pad_usaha[".exportTo"] = true;

$tdatapad_pad_usaha[".printFriendly"] = true;

$tdatapad_pad_usaha[".delete"] = true;

$tdatapad_pad_usaha[".showSimpleSearchOptions"] = false;

$tdatapad_pad_usaha[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_usaha[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_usaha[".isUseAjaxSuggest"] = true;

$tdatapad_pad_usaha[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_usaha[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_usaha[".isUseTimeForSearch"] = false;



$tdatapad_pad_usaha[".useDetailsPreview"] = true;

$tdatapad_pad_usaha[".allSearchFields"] = array();

$tdatapad_pad_usaha[".allSearchFields"][] = "id";
$tdatapad_pad_usaha[".allSearchFields"][] = "nama";
$tdatapad_pad_usaha[".allSearchFields"][] = "so";
$tdatapad_pad_usaha[".allSearchFields"][] = "tmt";
$tdatapad_pad_usaha[".allSearchFields"][] = "enabled";
$tdatapad_pad_usaha[".allSearchFields"][] = "created";
$tdatapad_pad_usaha[".allSearchFields"][] = "create_uid";
$tdatapad_pad_usaha[".allSearchFields"][] = "updated";
$tdatapad_pad_usaha[".allSearchFields"][] = "update_uid";

$tdatapad_pad_usaha[".googleLikeFields"][] = "id";
$tdatapad_pad_usaha[".googleLikeFields"][] = "nama";
$tdatapad_pad_usaha[".googleLikeFields"][] = "so";
$tdatapad_pad_usaha[".googleLikeFields"][] = "tmt";
$tdatapad_pad_usaha[".googleLikeFields"][] = "enabled";
$tdatapad_pad_usaha[".googleLikeFields"][] = "created";
$tdatapad_pad_usaha[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_usaha[".googleLikeFields"][] = "updated";
$tdatapad_pad_usaha[".googleLikeFields"][] = "update_uid";


$tdatapad_pad_usaha[".advSearchFields"][] = "id";
$tdatapad_pad_usaha[".advSearchFields"][] = "nama";
$tdatapad_pad_usaha[".advSearchFields"][] = "so";
$tdatapad_pad_usaha[".advSearchFields"][] = "tmt";
$tdatapad_pad_usaha[".advSearchFields"][] = "enabled";
$tdatapad_pad_usaha[".advSearchFields"][] = "created";
$tdatapad_pad_usaha[".advSearchFields"][] = "create_uid";
$tdatapad_pad_usaha[".advSearchFields"][] = "updated";
$tdatapad_pad_usaha[".advSearchFields"][] = "update_uid";

$tdatapad_pad_usaha[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
		


$tdatapad_pad_usaha[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_usaha[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_usaha[".orderindexes"] = array();

$tdatapad_pad_usaha[".sqlHead"] = "SELECT id,   nama,   so,   tmt,   enabled,   created,   create_uid,   updated,   update_uid";
$tdatapad_pad_usaha[".sqlFrom"] = "FROM \"pad\".pad_usaha";
$tdatapad_pad_usaha[".sqlWhereExpr"] = "";
$tdatapad_pad_usaha[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_usaha[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_usaha[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_usaha = array();
$tableKeyspad_pad_usaha[] = "id";
$tdatapad_pad_usaha[".Keys"] = $tableKeyspad_pad_usaha;

$tdatapad_pad_usaha[".listFields"] = array();
$tdatapad_pad_usaha[".listFields"][] = "id";
$tdatapad_pad_usaha[".listFields"][] = "nama";
$tdatapad_pad_usaha[".listFields"][] = "so";
$tdatapad_pad_usaha[".listFields"][] = "tmt";
$tdatapad_pad_usaha[".listFields"][] = "enabled";
$tdatapad_pad_usaha[".listFields"][] = "created";
$tdatapad_pad_usaha[".listFields"][] = "create_uid";
$tdatapad_pad_usaha[".listFields"][] = "updated";
$tdatapad_pad_usaha[".listFields"][] = "update_uid";

$tdatapad_pad_usaha[".viewFields"] = array();
$tdatapad_pad_usaha[".viewFields"][] = "id";
$tdatapad_pad_usaha[".viewFields"][] = "nama";
$tdatapad_pad_usaha[".viewFields"][] = "so";
$tdatapad_pad_usaha[".viewFields"][] = "tmt";
$tdatapad_pad_usaha[".viewFields"][] = "enabled";
$tdatapad_pad_usaha[".viewFields"][] = "created";
$tdatapad_pad_usaha[".viewFields"][] = "create_uid";
$tdatapad_pad_usaha[".viewFields"][] = "updated";
$tdatapad_pad_usaha[".viewFields"][] = "update_uid";

$tdatapad_pad_usaha[".addFields"] = array();
$tdatapad_pad_usaha[".addFields"][] = "nama";
$tdatapad_pad_usaha[".addFields"][] = "so";
$tdatapad_pad_usaha[".addFields"][] = "tmt";
$tdatapad_pad_usaha[".addFields"][] = "enabled";
$tdatapad_pad_usaha[".addFields"][] = "created";
$tdatapad_pad_usaha[".addFields"][] = "create_uid";
$tdatapad_pad_usaha[".addFields"][] = "updated";
$tdatapad_pad_usaha[".addFields"][] = "update_uid";

$tdatapad_pad_usaha[".inlineAddFields"] = array();
$tdatapad_pad_usaha[".inlineAddFields"][] = "nama";
$tdatapad_pad_usaha[".inlineAddFields"][] = "so";
$tdatapad_pad_usaha[".inlineAddFields"][] = "tmt";
$tdatapad_pad_usaha[".inlineAddFields"][] = "enabled";
$tdatapad_pad_usaha[".inlineAddFields"][] = "created";
$tdatapad_pad_usaha[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_usaha[".inlineAddFields"][] = "updated";
$tdatapad_pad_usaha[".inlineAddFields"][] = "update_uid";

$tdatapad_pad_usaha[".editFields"] = array();
$tdatapad_pad_usaha[".editFields"][] = "nama";
$tdatapad_pad_usaha[".editFields"][] = "so";
$tdatapad_pad_usaha[".editFields"][] = "tmt";
$tdatapad_pad_usaha[".editFields"][] = "enabled";
$tdatapad_pad_usaha[".editFields"][] = "created";
$tdatapad_pad_usaha[".editFields"][] = "create_uid";
$tdatapad_pad_usaha[".editFields"][] = "updated";
$tdatapad_pad_usaha[".editFields"][] = "update_uid";

$tdatapad_pad_usaha[".inlineEditFields"] = array();
$tdatapad_pad_usaha[".inlineEditFields"][] = "nama";
$tdatapad_pad_usaha[".inlineEditFields"][] = "so";
$tdatapad_pad_usaha[".inlineEditFields"][] = "tmt";
$tdatapad_pad_usaha[".inlineEditFields"][] = "enabled";
$tdatapad_pad_usaha[".inlineEditFields"][] = "created";
$tdatapad_pad_usaha[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_usaha[".inlineEditFields"][] = "updated";
$tdatapad_pad_usaha[".inlineEditFields"][] = "update_uid";

$tdatapad_pad_usaha[".exportFields"] = array();
$tdatapad_pad_usaha[".exportFields"][] = "id";
$tdatapad_pad_usaha[".exportFields"][] = "nama";
$tdatapad_pad_usaha[".exportFields"][] = "so";
$tdatapad_pad_usaha[".exportFields"][] = "tmt";
$tdatapad_pad_usaha[".exportFields"][] = "enabled";
$tdatapad_pad_usaha[".exportFields"][] = "created";
$tdatapad_pad_usaha[".exportFields"][] = "create_uid";
$tdatapad_pad_usaha[".exportFields"][] = "updated";
$tdatapad_pad_usaha[".exportFields"][] = "update_uid";

$tdatapad_pad_usaha[".printFields"] = array();
$tdatapad_pad_usaha[".printFields"][] = "id";
$tdatapad_pad_usaha[".printFields"][] = "nama";
$tdatapad_pad_usaha[".printFields"][] = "so";
$tdatapad_pad_usaha[".printFields"][] = "tmt";
$tdatapad_pad_usaha[".printFields"][] = "enabled";
$tdatapad_pad_usaha[".printFields"][] = "created";
$tdatapad_pad_usaha[".printFields"][] = "create_uid";
$tdatapad_pad_usaha[".printFields"][] = "updated";
$tdatapad_pad_usaha[".printFields"][] = "update_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_usaha";
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
	
		
		
	$tdatapad_pad_usaha["id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_usaha";
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
	
		
		
	$tdatapad_pad_usaha["nama"] = $fdata;
//	so
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "so";
	$fdata["GoodName"] = "so";
	$fdata["ownerTable"] = "pad.pad_usaha";
	$fdata["Label"] = "So"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "so"; 
		$fdata["FullName"] = "so";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_usaha["so"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_usaha";
	$fdata["Label"] = "Tmt"; 
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
	
		$fdata["strField"] = "tmt"; 
		$fdata["FullName"] = "tmt";
	
		
		
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
	
		
		
	$tdatapad_pad_usaha["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_usaha";
	$fdata["Label"] = "Enabled"; 
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
	
		$fdata["strField"] = "enabled"; 
		$fdata["FullName"] = "enabled";
	
		
		
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
	
		
		
	$tdatapad_pad_usaha["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_usaha";
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
	
		
		
	$tdatapad_pad_usaha["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_usaha";
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
	
		
		
	$tdatapad_pad_usaha["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_usaha";
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
	
		
		
	$tdatapad_pad_usaha["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_usaha";
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
	
		
		
	$tdatapad_pad_usaha["update_uid"] = $fdata;

	
$tables_data["pad.pad_usaha"]=&$tdatapad_pad_usaha;
$field_labels["pad_pad_usaha"] = &$fieldLabelspad_pad_usaha;
$fieldToolTips["pad.pad_usaha"] = &$fieldToolTipspad_pad_usaha;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_usaha"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_customer_usaha";
	$detailsParam["dDataSourceTable"]="pad.pad_customer_usaha";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_customer_usaha";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_usaha"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_usaha"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_usaha"][$dIndex]["detailKeys"][]="usaha_id";

$dIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_jenis_pajak";
	$detailsParam["dDataSourceTable"]="pad.pad_jenis_pajak";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_jenis_pajak";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_usaha"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_usaha"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_usaha"][$dIndex]["detailKeys"][]="usaha_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_usaha"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_usaha()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama,   so,   tmt,   enabled,   created,   create_uid,   updated,   update_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_usaha";
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
	"m_strTable" => "pad.pad_usaha"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_usaha"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "so",
	"m_strTable" => "pad.pad_usaha"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_usaha"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_usaha"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_usaha"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_usaha"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_usaha"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_usaha"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto23=array();
$proto23["m_link"] = "SQLL_MAIN";
			$proto24=array();
$proto24["m_strName"] = "pad.pad_usaha";
$proto24["m_columns"] = array();
$proto24["m_columns"][] = "id";
$proto24["m_columns"][] = "nama";
$proto24["m_columns"][] = "so";
$proto24["m_columns"][] = "tmt";
$proto24["m_columns"][] = "enabled";
$proto24["m_columns"][] = "created";
$proto24["m_columns"][] = "create_uid";
$proto24["m_columns"][] = "updated";
$proto24["m_columns"][] = "update_uid";
$obj = new SQLTable($proto24);

$proto23["m_table"] = $obj;
$proto23["m_alias"] = "";
$proto25=array();
$proto25["m_sql"] = "";
$proto25["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto25["m_column"]=$obj;
$proto25["m_contained"] = array();
$proto25["m_strCase"] = "";
$proto25["m_havingmode"] = "0";
$proto25["m_inBrackets"] = "0";
$proto25["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto25);

$proto23["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto23);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_usaha = createSqlQuery_pad_pad_usaha();
									$tdatapad_pad_usaha[".sqlquery"] = $queryData_pad_pad_usaha;
	
if(isset($tdatapad_pad_usaha["field2"])){
	$tdatapad_pad_usaha["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_usaha["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_usaha["field2"]["LookupType"] = 4;
	$tdatapad_pad_usaha["field2"]["LinkField"] = "email";
	$tdatapad_pad_usaha["field2"]["DisplayField"] = "name";
	$tdatapad_pad_usaha[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_usaha"] = new eventsBase;
$tdatapad_pad_usaha[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_usaha");

?>