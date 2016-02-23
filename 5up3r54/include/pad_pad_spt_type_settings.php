<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_spt_type = array();
	$tdatapad_pad_spt_type[".NumberOfChars"] = 80; 
	$tdatapad_pad_spt_type[".ShortName"] = "pad_pad_spt_type";
	$tdatapad_pad_spt_type[".OwnerID"] = "";
	$tdatapad_pad_spt_type[".OriginalTable"] = "pad.pad_spt_type";

//	field labels
$fieldLabelspad_pad_spt_type = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_spt_type["English"] = array();
	$fieldToolTipspad_pad_spt_type["English"] = array();
	$fieldLabelspad_pad_spt_type["English"]["id"] = "Id";
	$fieldToolTipspad_pad_spt_type["English"]["id"] = "";
	$fieldLabelspad_pad_spt_type["English"]["typenm"] = "Typenm";
	$fieldToolTipspad_pad_spt_type["English"]["typenm"] = "";
	$fieldLabelspad_pad_spt_type["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_spt_type["English"]["tmt"] = "";
	$fieldLabelspad_pad_spt_type["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_spt_type["English"]["enabled"] = "";
	$fieldLabelspad_pad_spt_type["English"]["create_date"] = "Create Date";
	$fieldToolTipspad_pad_spt_type["English"]["create_date"] = "";
	$fieldLabelspad_pad_spt_type["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_spt_type["English"]["create_uid"] = "";
	$fieldLabelspad_pad_spt_type["English"]["write_date"] = "Write Date";
	$fieldToolTipspad_pad_spt_type["English"]["write_date"] = "";
	$fieldLabelspad_pad_spt_type["English"]["write_uid"] = "Write Uid";
	$fieldToolTipspad_pad_spt_type["English"]["write_uid"] = "";
	if (count($fieldToolTipspad_pad_spt_type["English"]))
		$tdatapad_pad_spt_type[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_spt_type[".NCSearch"] = true;



$tdatapad_pad_spt_type[".shortTableName"] = "pad_pad_spt_type";
$tdatapad_pad_spt_type[".nSecOptions"] = 0;
$tdatapad_pad_spt_type[".recsPerRowList"] = 1;
$tdatapad_pad_spt_type[".mainTableOwnerID"] = "";
$tdatapad_pad_spt_type[".moveNext"] = 1;
$tdatapad_pad_spt_type[".nType"] = 0;

$tdatapad_pad_spt_type[".strOriginalTableName"] = "pad.pad_spt_type";




$tdatapad_pad_spt_type[".showAddInPopup"] = false;

$tdatapad_pad_spt_type[".showEditInPopup"] = false;

$tdatapad_pad_spt_type[".showViewInPopup"] = false;

$tdatapad_pad_spt_type[".fieldsForRegister"] = array();

$tdatapad_pad_spt_type[".listAjax"] = false;

	$tdatapad_pad_spt_type[".audit"] = false;

	$tdatapad_pad_spt_type[".locking"] = false;

$tdatapad_pad_spt_type[".listIcons"] = true;
$tdatapad_pad_spt_type[".edit"] = true;
$tdatapad_pad_spt_type[".inlineEdit"] = true;
$tdatapad_pad_spt_type[".inlineAdd"] = true;
$tdatapad_pad_spt_type[".view"] = true;

$tdatapad_pad_spt_type[".exportTo"] = true;

$tdatapad_pad_spt_type[".printFriendly"] = true;

$tdatapad_pad_spt_type[".delete"] = true;

$tdatapad_pad_spt_type[".showSimpleSearchOptions"] = false;

$tdatapad_pad_spt_type[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_spt_type[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_spt_type[".isUseAjaxSuggest"] = true;

$tdatapad_pad_spt_type[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_spt_type[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_spt_type[".isUseTimeForSearch"] = false;



$tdatapad_pad_spt_type[".useDetailsPreview"] = true;

$tdatapad_pad_spt_type[".allSearchFields"] = array();

$tdatapad_pad_spt_type[".allSearchFields"][] = "id";
$tdatapad_pad_spt_type[".allSearchFields"][] = "typenm";
$tdatapad_pad_spt_type[".allSearchFields"][] = "tmt";
$tdatapad_pad_spt_type[".allSearchFields"][] = "enabled";
$tdatapad_pad_spt_type[".allSearchFields"][] = "create_date";
$tdatapad_pad_spt_type[".allSearchFields"][] = "create_uid";
$tdatapad_pad_spt_type[".allSearchFields"][] = "write_date";
$tdatapad_pad_spt_type[".allSearchFields"][] = "write_uid";

$tdatapad_pad_spt_type[".googleLikeFields"][] = "id";
$tdatapad_pad_spt_type[".googleLikeFields"][] = "typenm";
$tdatapad_pad_spt_type[".googleLikeFields"][] = "tmt";
$tdatapad_pad_spt_type[".googleLikeFields"][] = "enabled";
$tdatapad_pad_spt_type[".googleLikeFields"][] = "create_date";
$tdatapad_pad_spt_type[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_spt_type[".googleLikeFields"][] = "write_date";
$tdatapad_pad_spt_type[".googleLikeFields"][] = "write_uid";


$tdatapad_pad_spt_type[".advSearchFields"][] = "id";
$tdatapad_pad_spt_type[".advSearchFields"][] = "typenm";
$tdatapad_pad_spt_type[".advSearchFields"][] = "tmt";
$tdatapad_pad_spt_type[".advSearchFields"][] = "enabled";
$tdatapad_pad_spt_type[".advSearchFields"][] = "create_date";
$tdatapad_pad_spt_type[".advSearchFields"][] = "create_uid";
$tdatapad_pad_spt_type[".advSearchFields"][] = "write_date";
$tdatapad_pad_spt_type[".advSearchFields"][] = "write_uid";

$tdatapad_pad_spt_type[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdatapad_pad_spt_type[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_spt_type[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_spt_type[".orderindexes"] = array();

$tdatapad_pad_spt_type[".sqlHead"] = "SELECT id,   typenm,   tmt,   enabled,   create_date,   create_uid,   write_date,   write_uid";
$tdatapad_pad_spt_type[".sqlFrom"] = "FROM \"pad\".pad_spt_type";
$tdatapad_pad_spt_type[".sqlWhereExpr"] = "";
$tdatapad_pad_spt_type[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_spt_type[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_spt_type[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_spt_type = array();
$tableKeyspad_pad_spt_type[] = "id";
$tdatapad_pad_spt_type[".Keys"] = $tableKeyspad_pad_spt_type;

$tdatapad_pad_spt_type[".listFields"] = array();
$tdatapad_pad_spt_type[".listFields"][] = "id";
$tdatapad_pad_spt_type[".listFields"][] = "typenm";
$tdatapad_pad_spt_type[".listFields"][] = "tmt";
$tdatapad_pad_spt_type[".listFields"][] = "enabled";
$tdatapad_pad_spt_type[".listFields"][] = "create_date";
$tdatapad_pad_spt_type[".listFields"][] = "create_uid";
$tdatapad_pad_spt_type[".listFields"][] = "write_date";
$tdatapad_pad_spt_type[".listFields"][] = "write_uid";

$tdatapad_pad_spt_type[".viewFields"] = array();
$tdatapad_pad_spt_type[".viewFields"][] = "id";
$tdatapad_pad_spt_type[".viewFields"][] = "typenm";
$tdatapad_pad_spt_type[".viewFields"][] = "tmt";
$tdatapad_pad_spt_type[".viewFields"][] = "enabled";
$tdatapad_pad_spt_type[".viewFields"][] = "create_date";
$tdatapad_pad_spt_type[".viewFields"][] = "create_uid";
$tdatapad_pad_spt_type[".viewFields"][] = "write_date";
$tdatapad_pad_spt_type[".viewFields"][] = "write_uid";

$tdatapad_pad_spt_type[".addFields"] = array();
$tdatapad_pad_spt_type[".addFields"][] = "id";
$tdatapad_pad_spt_type[".addFields"][] = "typenm";
$tdatapad_pad_spt_type[".addFields"][] = "tmt";
$tdatapad_pad_spt_type[".addFields"][] = "enabled";
$tdatapad_pad_spt_type[".addFields"][] = "create_date";
$tdatapad_pad_spt_type[".addFields"][] = "create_uid";
$tdatapad_pad_spt_type[".addFields"][] = "write_date";
$tdatapad_pad_spt_type[".addFields"][] = "write_uid";

$tdatapad_pad_spt_type[".inlineAddFields"] = array();
$tdatapad_pad_spt_type[".inlineAddFields"][] = "id";
$tdatapad_pad_spt_type[".inlineAddFields"][] = "typenm";
$tdatapad_pad_spt_type[".inlineAddFields"][] = "tmt";
$tdatapad_pad_spt_type[".inlineAddFields"][] = "enabled";
$tdatapad_pad_spt_type[".inlineAddFields"][] = "create_date";
$tdatapad_pad_spt_type[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_spt_type[".inlineAddFields"][] = "write_date";
$tdatapad_pad_spt_type[".inlineAddFields"][] = "write_uid";

$tdatapad_pad_spt_type[".editFields"] = array();
$tdatapad_pad_spt_type[".editFields"][] = "id";
$tdatapad_pad_spt_type[".editFields"][] = "typenm";
$tdatapad_pad_spt_type[".editFields"][] = "tmt";
$tdatapad_pad_spt_type[".editFields"][] = "enabled";
$tdatapad_pad_spt_type[".editFields"][] = "create_date";
$tdatapad_pad_spt_type[".editFields"][] = "create_uid";
$tdatapad_pad_spt_type[".editFields"][] = "write_date";
$tdatapad_pad_spt_type[".editFields"][] = "write_uid";

$tdatapad_pad_spt_type[".inlineEditFields"] = array();
$tdatapad_pad_spt_type[".inlineEditFields"][] = "id";
$tdatapad_pad_spt_type[".inlineEditFields"][] = "typenm";
$tdatapad_pad_spt_type[".inlineEditFields"][] = "tmt";
$tdatapad_pad_spt_type[".inlineEditFields"][] = "enabled";
$tdatapad_pad_spt_type[".inlineEditFields"][] = "create_date";
$tdatapad_pad_spt_type[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_spt_type[".inlineEditFields"][] = "write_date";
$tdatapad_pad_spt_type[".inlineEditFields"][] = "write_uid";

$tdatapad_pad_spt_type[".exportFields"] = array();
$tdatapad_pad_spt_type[".exportFields"][] = "id";
$tdatapad_pad_spt_type[".exportFields"][] = "typenm";
$tdatapad_pad_spt_type[".exportFields"][] = "tmt";
$tdatapad_pad_spt_type[".exportFields"][] = "enabled";
$tdatapad_pad_spt_type[".exportFields"][] = "create_date";
$tdatapad_pad_spt_type[".exportFields"][] = "create_uid";
$tdatapad_pad_spt_type[".exportFields"][] = "write_date";
$tdatapad_pad_spt_type[".exportFields"][] = "write_uid";

$tdatapad_pad_spt_type[".printFields"] = array();
$tdatapad_pad_spt_type[".printFields"][] = "id";
$tdatapad_pad_spt_type[".printFields"][] = "typenm";
$tdatapad_pad_spt_type[".printFields"][] = "tmt";
$tdatapad_pad_spt_type[".printFields"][] = "enabled";
$tdatapad_pad_spt_type[".printFields"][] = "create_date";
$tdatapad_pad_spt_type[".printFields"][] = "create_uid";
$tdatapad_pad_spt_type[".printFields"][] = "write_date";
$tdatapad_pad_spt_type[".printFields"][] = "write_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_spt_type";
	$fdata["Label"] = "Id"; 
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
	
		
		
	$tdatapad_pad_spt_type["id"] = $fdata;
//	typenm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "typenm";
	$fdata["GoodName"] = "typenm";
	$fdata["ownerTable"] = "pad.pad_spt_type";
	$fdata["Label"] = "Typenm"; 
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
	
		$fdata["strField"] = "typenm"; 
		$fdata["FullName"] = "typenm";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_type["typenm"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_spt_type";
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
	
		
		
	$tdatapad_pad_spt_type["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_spt_type";
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
	
		
		
	$tdatapad_pad_spt_type["enabled"] = $fdata;
//	create_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "create_date";
	$fdata["GoodName"] = "create_date";
	$fdata["ownerTable"] = "pad.pad_spt_type";
	$fdata["Label"] = "Create Date"; 
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
	
		$fdata["strField"] = "create_date"; 
		$fdata["FullName"] = "create_date";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_type["create_date"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_spt_type";
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
	
		
		
	$tdatapad_pad_spt_type["create_uid"] = $fdata;
//	write_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "write_date";
	$fdata["GoodName"] = "write_date";
	$fdata["ownerTable"] = "pad.pad_spt_type";
	$fdata["Label"] = "Write Date"; 
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
	
		$fdata["strField"] = "write_date"; 
		$fdata["FullName"] = "write_date";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_type["write_date"] = $fdata;
//	write_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "write_uid";
	$fdata["GoodName"] = "write_uid";
	$fdata["ownerTable"] = "pad.pad_spt_type";
	$fdata["Label"] = "Write Uid"; 
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
	
		$fdata["strField"] = "write_uid"; 
		$fdata["FullName"] = "write_uid";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_type["write_uid"] = $fdata;

	
$tables_data["pad.pad_spt_type"]=&$tdatapad_pad_spt_type;
$field_labels["pad_pad_spt_type"] = &$fieldLabelspad_pad_spt_type;
$fieldToolTips["pad.pad_spt_type"] = &$fieldToolTipspad_pad_spt_type;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_spt_type"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_spt";
	$detailsParam["dDataSourceTable"]="pad.pad_spt";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_spt";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_spt_type"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_spt_type"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_spt_type"][$dIndex]["detailKeys"][]="type_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_spt_type"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_spt_type()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   typenm,   tmt,   enabled,   create_date,   create_uid,   write_date,   write_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_spt_type";
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
	"m_strTable" => "pad.pad_spt_type"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "typenm",
	"m_strTable" => "pad.pad_spt_type"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_spt_type"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_spt_type"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "create_date",
	"m_strTable" => "pad.pad_spt_type"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_spt_type"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "write_date",
	"m_strTable" => "pad.pad_spt_type"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "write_uid",
	"m_strTable" => "pad.pad_spt_type"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto21=array();
$proto21["m_link"] = "SQLL_MAIN";
			$proto22=array();
$proto22["m_strName"] = "pad.pad_spt_type";
$proto22["m_columns"] = array();
$proto22["m_columns"][] = "id";
$proto22["m_columns"][] = "typenm";
$proto22["m_columns"][] = "tmt";
$proto22["m_columns"][] = "enabled";
$proto22["m_columns"][] = "create_date";
$proto22["m_columns"][] = "create_uid";
$proto22["m_columns"][] = "write_date";
$proto22["m_columns"][] = "write_uid";
$obj = new SQLTable($proto22);

$proto21["m_table"] = $obj;
$proto21["m_alias"] = "";
$proto23=array();
$proto23["m_sql"] = "";
$proto23["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto23["m_column"]=$obj;
$proto23["m_contained"] = array();
$proto23["m_strCase"] = "";
$proto23["m_havingmode"] = "0";
$proto23["m_inBrackets"] = "0";
$proto23["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto23);

$proto21["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto21);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_spt_type = createSqlQuery_pad_pad_spt_type();
								$tdatapad_pad_spt_type[".sqlquery"] = $queryData_pad_pad_spt_type;
	
if(isset($tdatapad_pad_spt_type["field2"])){
	$tdatapad_pad_spt_type["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_spt_type["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_spt_type["field2"]["LookupType"] = 4;
	$tdatapad_pad_spt_type["field2"]["LinkField"] = "email";
	$tdatapad_pad_spt_type["field2"]["DisplayField"] = "name";
	$tdatapad_pad_spt_type[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_spt_type"] = new eventsBase;
$tdatapad_pad_spt_type[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_spt_type");

?>