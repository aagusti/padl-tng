<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_report = array();
	$tdatapad_pad_report[".NumberOfChars"] = 80; 
	$tdatapad_pad_report[".ShortName"] = "pad_pad_report";
	$tdatapad_pad_report[".OwnerID"] = "";
	$tdatapad_pad_report[".OriginalTable"] = "pad.pad_report";

//	field labels
$fieldLabelspad_pad_report = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_report["English"] = array();
	$fieldToolTipspad_pad_report["English"] = array();
	$fieldLabelspad_pad_report["English"]["id"] = "Id";
	$fieldToolTipspad_pad_report["English"]["id"] = "";
	$fieldLabelspad_pad_report["English"]["spt_type_id"] = "Spt Type Id";
	$fieldToolTipspad_pad_report["English"]["spt_type_id"] = "";
	$fieldLabelspad_pad_report["English"]["usaha_id"] = "Usaha Id";
	$fieldToolTipspad_pad_report["English"]["usaha_id"] = "";
	$fieldLabelspad_pad_report["English"]["sptnm"] = "Sptnm";
	$fieldToolTipspad_pad_report["English"]["sptnm"] = "";
	$fieldLabelspad_pad_report["English"]["sknm"] = "Sknm";
	$fieldToolTipspad_pad_report["English"]["sknm"] = "";
	$fieldLabelspad_pad_report["English"]["nhnm"] = "Nhnm";
	$fieldToolTipspad_pad_report["English"]["nhnm"] = "";
	$fieldLabelspad_pad_report["English"]["sspdnm"] = "Sspdnm";
	$fieldToolTipspad_pad_report["English"]["sspdnm"] = "";
	$fieldLabelspad_pad_report["English"]["stpnm"] = "Stpnm";
	$fieldToolTipspad_pad_report["English"]["stpnm"] = "";
	$fieldLabelspad_pad_report["English"]["kartudtnm"] = "Kartudtnm";
	$fieldToolTipspad_pad_report["English"]["kartudtnm"] = "";
	if (count($fieldToolTipspad_pad_report["English"]))
		$tdatapad_pad_report[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_report[".NCSearch"] = true;



$tdatapad_pad_report[".shortTableName"] = "pad_pad_report";
$tdatapad_pad_report[".nSecOptions"] = 0;
$tdatapad_pad_report[".recsPerRowList"] = 1;
$tdatapad_pad_report[".mainTableOwnerID"] = "";
$tdatapad_pad_report[".moveNext"] = 1;
$tdatapad_pad_report[".nType"] = 0;

$tdatapad_pad_report[".strOriginalTableName"] = "pad.pad_report";




$tdatapad_pad_report[".showAddInPopup"] = false;

$tdatapad_pad_report[".showEditInPopup"] = false;

$tdatapad_pad_report[".showViewInPopup"] = false;

$tdatapad_pad_report[".fieldsForRegister"] = array();

$tdatapad_pad_report[".listAjax"] = false;

	$tdatapad_pad_report[".audit"] = false;

	$tdatapad_pad_report[".locking"] = false;

$tdatapad_pad_report[".listIcons"] = true;
$tdatapad_pad_report[".edit"] = true;
$tdatapad_pad_report[".inlineEdit"] = true;
$tdatapad_pad_report[".inlineAdd"] = true;
$tdatapad_pad_report[".view"] = true;

$tdatapad_pad_report[".exportTo"] = true;

$tdatapad_pad_report[".printFriendly"] = true;

$tdatapad_pad_report[".delete"] = true;

$tdatapad_pad_report[".showSimpleSearchOptions"] = false;

$tdatapad_pad_report[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_report[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_report[".isUseAjaxSuggest"] = true;

$tdatapad_pad_report[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_report[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_report[".isUseTimeForSearch"] = false;




$tdatapad_pad_report[".allSearchFields"] = array();

$tdatapad_pad_report[".allSearchFields"][] = "id";
$tdatapad_pad_report[".allSearchFields"][] = "spt_type_id";
$tdatapad_pad_report[".allSearchFields"][] = "usaha_id";
$tdatapad_pad_report[".allSearchFields"][] = "sptnm";
$tdatapad_pad_report[".allSearchFields"][] = "sknm";
$tdatapad_pad_report[".allSearchFields"][] = "nhnm";
$tdatapad_pad_report[".allSearchFields"][] = "sspdnm";
$tdatapad_pad_report[".allSearchFields"][] = "stpnm";
$tdatapad_pad_report[".allSearchFields"][] = "kartudtnm";

$tdatapad_pad_report[".googleLikeFields"][] = "id";
$tdatapad_pad_report[".googleLikeFields"][] = "spt_type_id";
$tdatapad_pad_report[".googleLikeFields"][] = "usaha_id";
$tdatapad_pad_report[".googleLikeFields"][] = "sptnm";
$tdatapad_pad_report[".googleLikeFields"][] = "sknm";
$tdatapad_pad_report[".googleLikeFields"][] = "nhnm";
$tdatapad_pad_report[".googleLikeFields"][] = "sspdnm";
$tdatapad_pad_report[".googleLikeFields"][] = "stpnm";
$tdatapad_pad_report[".googleLikeFields"][] = "kartudtnm";


$tdatapad_pad_report[".advSearchFields"][] = "id";
$tdatapad_pad_report[".advSearchFields"][] = "spt_type_id";
$tdatapad_pad_report[".advSearchFields"][] = "usaha_id";
$tdatapad_pad_report[".advSearchFields"][] = "sptnm";
$tdatapad_pad_report[".advSearchFields"][] = "sknm";
$tdatapad_pad_report[".advSearchFields"][] = "nhnm";
$tdatapad_pad_report[".advSearchFields"][] = "sspdnm";
$tdatapad_pad_report[".advSearchFields"][] = "stpnm";
$tdatapad_pad_report[".advSearchFields"][] = "kartudtnm";

$tdatapad_pad_report[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_report[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_report[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_report[".orderindexes"] = array();

$tdatapad_pad_report[".sqlHead"] = "SELECT id,   spt_type_id,   usaha_id,   sptnm,   sknm,   nhnm,   sspdnm,   stpnm,   kartudtnm";
$tdatapad_pad_report[".sqlFrom"] = "FROM \"pad\".pad_report";
$tdatapad_pad_report[".sqlWhereExpr"] = "";
$tdatapad_pad_report[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_report[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_report[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_report = array();
$tableKeyspad_pad_report[] = "id";
$tdatapad_pad_report[".Keys"] = $tableKeyspad_pad_report;

$tdatapad_pad_report[".listFields"] = array();
$tdatapad_pad_report[".listFields"][] = "id";
$tdatapad_pad_report[".listFields"][] = "spt_type_id";
$tdatapad_pad_report[".listFields"][] = "usaha_id";
$tdatapad_pad_report[".listFields"][] = "sptnm";
$tdatapad_pad_report[".listFields"][] = "sknm";
$tdatapad_pad_report[".listFields"][] = "nhnm";
$tdatapad_pad_report[".listFields"][] = "sspdnm";
$tdatapad_pad_report[".listFields"][] = "stpnm";
$tdatapad_pad_report[".listFields"][] = "kartudtnm";

$tdatapad_pad_report[".viewFields"] = array();
$tdatapad_pad_report[".viewFields"][] = "id";
$tdatapad_pad_report[".viewFields"][] = "spt_type_id";
$tdatapad_pad_report[".viewFields"][] = "usaha_id";
$tdatapad_pad_report[".viewFields"][] = "sptnm";
$tdatapad_pad_report[".viewFields"][] = "sknm";
$tdatapad_pad_report[".viewFields"][] = "nhnm";
$tdatapad_pad_report[".viewFields"][] = "sspdnm";
$tdatapad_pad_report[".viewFields"][] = "stpnm";
$tdatapad_pad_report[".viewFields"][] = "kartudtnm";

$tdatapad_pad_report[".addFields"] = array();
$tdatapad_pad_report[".addFields"][] = "spt_type_id";
$tdatapad_pad_report[".addFields"][] = "usaha_id";
$tdatapad_pad_report[".addFields"][] = "sptnm";
$tdatapad_pad_report[".addFields"][] = "sknm";
$tdatapad_pad_report[".addFields"][] = "nhnm";
$tdatapad_pad_report[".addFields"][] = "sspdnm";
$tdatapad_pad_report[".addFields"][] = "stpnm";
$tdatapad_pad_report[".addFields"][] = "kartudtnm";

$tdatapad_pad_report[".inlineAddFields"] = array();
$tdatapad_pad_report[".inlineAddFields"][] = "spt_type_id";
$tdatapad_pad_report[".inlineAddFields"][] = "usaha_id";
$tdatapad_pad_report[".inlineAddFields"][] = "sptnm";
$tdatapad_pad_report[".inlineAddFields"][] = "sknm";
$tdatapad_pad_report[".inlineAddFields"][] = "nhnm";
$tdatapad_pad_report[".inlineAddFields"][] = "sspdnm";
$tdatapad_pad_report[".inlineAddFields"][] = "stpnm";
$tdatapad_pad_report[".inlineAddFields"][] = "kartudtnm";

$tdatapad_pad_report[".editFields"] = array();
$tdatapad_pad_report[".editFields"][] = "spt_type_id";
$tdatapad_pad_report[".editFields"][] = "usaha_id";
$tdatapad_pad_report[".editFields"][] = "sptnm";
$tdatapad_pad_report[".editFields"][] = "sknm";
$tdatapad_pad_report[".editFields"][] = "nhnm";
$tdatapad_pad_report[".editFields"][] = "sspdnm";
$tdatapad_pad_report[".editFields"][] = "stpnm";
$tdatapad_pad_report[".editFields"][] = "kartudtnm";

$tdatapad_pad_report[".inlineEditFields"] = array();
$tdatapad_pad_report[".inlineEditFields"][] = "spt_type_id";
$tdatapad_pad_report[".inlineEditFields"][] = "usaha_id";
$tdatapad_pad_report[".inlineEditFields"][] = "sptnm";
$tdatapad_pad_report[".inlineEditFields"][] = "sknm";
$tdatapad_pad_report[".inlineEditFields"][] = "nhnm";
$tdatapad_pad_report[".inlineEditFields"][] = "sspdnm";
$tdatapad_pad_report[".inlineEditFields"][] = "stpnm";
$tdatapad_pad_report[".inlineEditFields"][] = "kartudtnm";

$tdatapad_pad_report[".exportFields"] = array();
$tdatapad_pad_report[".exportFields"][] = "id";
$tdatapad_pad_report[".exportFields"][] = "spt_type_id";
$tdatapad_pad_report[".exportFields"][] = "usaha_id";
$tdatapad_pad_report[".exportFields"][] = "sptnm";
$tdatapad_pad_report[".exportFields"][] = "sknm";
$tdatapad_pad_report[".exportFields"][] = "nhnm";
$tdatapad_pad_report[".exportFields"][] = "sspdnm";
$tdatapad_pad_report[".exportFields"][] = "stpnm";
$tdatapad_pad_report[".exportFields"][] = "kartudtnm";

$tdatapad_pad_report[".printFields"] = array();
$tdatapad_pad_report[".printFields"][] = "id";
$tdatapad_pad_report[".printFields"][] = "spt_type_id";
$tdatapad_pad_report[".printFields"][] = "usaha_id";
$tdatapad_pad_report[".printFields"][] = "sptnm";
$tdatapad_pad_report[".printFields"][] = "sknm";
$tdatapad_pad_report[".printFields"][] = "nhnm";
$tdatapad_pad_report[".printFields"][] = "sspdnm";
$tdatapad_pad_report[".printFields"][] = "stpnm";
$tdatapad_pad_report[".printFields"][] = "kartudtnm";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_report";
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
	
		
		
	$tdatapad_pad_report["id"] = $fdata;
//	spt_type_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "spt_type_id";
	$fdata["GoodName"] = "spt_type_id";
	$fdata["ownerTable"] = "pad.pad_report";
	$fdata["Label"] = "Spt Type Id"; 
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
	
		$fdata["strField"] = "spt_type_id"; 
		$fdata["FullName"] = "spt_type_id";
	
		
		
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
	
		
		
	$tdatapad_pad_report["spt_type_id"] = $fdata;
//	usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "usaha_id";
	$fdata["GoodName"] = "usaha_id";
	$fdata["ownerTable"] = "pad.pad_report";
	$fdata["Label"] = "Usaha Id"; 
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
	
		$fdata["strField"] = "usaha_id"; 
		$fdata["FullName"] = "usaha_id";
	
		
		
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
	
		
		
	$tdatapad_pad_report["usaha_id"] = $fdata;
//	sptnm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "sptnm";
	$fdata["GoodName"] = "sptnm";
	$fdata["ownerTable"] = "pad.pad_report";
	$fdata["Label"] = "Sptnm"; 
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
	
		$fdata["strField"] = "sptnm"; 
		$fdata["FullName"] = "sptnm";
	
		
		
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
	
		
		
	$tdatapad_pad_report["sptnm"] = $fdata;
//	sknm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "sknm";
	$fdata["GoodName"] = "sknm";
	$fdata["ownerTable"] = "pad.pad_report";
	$fdata["Label"] = "Sknm"; 
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
	
		$fdata["strField"] = "sknm"; 
		$fdata["FullName"] = "sknm";
	
		
		
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
	
		
		
	$tdatapad_pad_report["sknm"] = $fdata;
//	nhnm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "nhnm";
	$fdata["GoodName"] = "nhnm";
	$fdata["ownerTable"] = "pad.pad_report";
	$fdata["Label"] = "Nhnm"; 
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
	
		$fdata["strField"] = "nhnm"; 
		$fdata["FullName"] = "nhnm";
	
		
		
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
	
		
		
	$tdatapad_pad_report["nhnm"] = $fdata;
//	sspdnm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "sspdnm";
	$fdata["GoodName"] = "sspdnm";
	$fdata["ownerTable"] = "pad.pad_report";
	$fdata["Label"] = "Sspdnm"; 
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
	
		$fdata["strField"] = "sspdnm"; 
		$fdata["FullName"] = "sspdnm";
	
		
		
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
	
		
		
	$tdatapad_pad_report["sspdnm"] = $fdata;
//	stpnm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "stpnm";
	$fdata["GoodName"] = "stpnm";
	$fdata["ownerTable"] = "pad.pad_report";
	$fdata["Label"] = "Stpnm"; 
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
	
		$fdata["strField"] = "stpnm"; 
		$fdata["FullName"] = "stpnm";
	
		
		
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
	
		
		
	$tdatapad_pad_report["stpnm"] = $fdata;
//	kartudtnm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "kartudtnm";
	$fdata["GoodName"] = "kartudtnm";
	$fdata["ownerTable"] = "pad.pad_report";
	$fdata["Label"] = "Kartudtnm"; 
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
	
		$fdata["strField"] = "kartudtnm"; 
		$fdata["FullName"] = "kartudtnm";
	
		
		
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
	
		
		
	$tdatapad_pad_report["kartudtnm"] = $fdata;

	
$tables_data["pad.pad_report"]=&$tdatapad_pad_report;
$field_labels["pad_pad_report"] = &$fieldLabelspad_pad_report;
$fieldToolTips["pad.pad_report"] = &$fieldToolTipspad_pad_report;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_report"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_report"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_report()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   spt_type_id,   usaha_id,   sptnm,   sknm,   nhnm,   sspdnm,   stpnm,   kartudtnm";
$proto0["m_strFrom"] = "FROM \"pad\".pad_report";
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
	"m_strTable" => "pad.pad_report"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_type_id",
	"m_strTable" => "pad.pad_report"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "usaha_id",
	"m_strTable" => "pad.pad_report"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "sptnm",
	"m_strTable" => "pad.pad_report"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "sknm",
	"m_strTable" => "pad.pad_report"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "nhnm",
	"m_strTable" => "pad.pad_report"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "sspdnm",
	"m_strTable" => "pad.pad_report"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "stpnm",
	"m_strTable" => "pad.pad_report"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "kartudtnm",
	"m_strTable" => "pad.pad_report"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto23=array();
$proto23["m_link"] = "SQLL_MAIN";
			$proto24=array();
$proto24["m_strName"] = "pad.pad_report";
$proto24["m_columns"] = array();
$proto24["m_columns"][] = "id";
$proto24["m_columns"][] = "spt_type_id";
$proto24["m_columns"][] = "usaha_id";
$proto24["m_columns"][] = "sptnm";
$proto24["m_columns"][] = "sknm";
$proto24["m_columns"][] = "nhnm";
$proto24["m_columns"][] = "sspdnm";
$proto24["m_columns"][] = "stpnm";
$proto24["m_columns"][] = "kartudtnm";
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
$queryData_pad_pad_report = createSqlQuery_pad_pad_report();
									$tdatapad_pad_report[".sqlquery"] = $queryData_pad_pad_report;
	
if(isset($tdatapad_pad_report["field2"])){
	$tdatapad_pad_report["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_report["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_report["field2"]["LookupType"] = 4;
	$tdatapad_pad_report["field2"]["LinkField"] = "email";
	$tdatapad_pad_report["field2"]["DisplayField"] = "name";
	$tdatapad_pad_report[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_report"] = new eventsBase;
$tdatapad_pad_report[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_report");

?>