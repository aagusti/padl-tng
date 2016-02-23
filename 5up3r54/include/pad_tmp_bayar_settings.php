<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_tmp_bayar = array();
	$tdatapad_tmp_bayar[".NumberOfChars"] = 80; 
	$tdatapad_tmp_bayar[".ShortName"] = "pad_tmp_bayar";
	$tdatapad_tmp_bayar[".OwnerID"] = "";
	$tdatapad_tmp_bayar[".OriginalTable"] = "pad.tmp_bayar";

//	field labels
$fieldLabelspad_tmp_bayar = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_tmp_bayar["English"] = array();
	$fieldToolTipspad_tmp_bayar["English"] = array();
	$fieldLabelspad_tmp_bayar["English"]["id"] = "Id";
	$fieldToolTipspad_tmp_bayar["English"]["id"] = "";
	$fieldLabelspad_tmp_bayar["English"]["sspd_id"] = "Sspd Id";
	$fieldToolTipspad_tmp_bayar["English"]["sspd_id"] = "";
	$fieldLabelspad_tmp_bayar["English"]["tahun"] = "Tahun";
	$fieldToolTipspad_tmp_bayar["English"]["tahun"] = "";
	$fieldLabelspad_tmp_bayar["English"]["sspdno"] = "Sspdno";
	$fieldToolTipspad_tmp_bayar["English"]["sspdno"] = "";
	$fieldLabelspad_tmp_bayar["English"]["spt_id"] = "Spt Id";
	$fieldToolTipspad_tmp_bayar["English"]["spt_id"] = "";
	$fieldLabelspad_tmp_bayar["English"]["old_spt_id"] = "Old Spt Id";
	$fieldToolTipspad_tmp_bayar["English"]["old_spt_id"] = "";
	$fieldLabelspad_tmp_bayar["English"]["wp"] = "Wp";
	$fieldToolTipspad_tmp_bayar["English"]["wp"] = "";
	$fieldLabelspad_tmp_bayar["English"]["bunga"] = "Bunga";
	$fieldToolTipspad_tmp_bayar["English"]["bunga"] = "";
	$fieldLabelspad_tmp_bayar["English"]["denda"] = "Denda";
	$fieldToolTipspad_tmp_bayar["English"]["denda"] = "";
	$fieldLabelspad_tmp_bayar["English"]["bayar"] = "Bayar";
	$fieldToolTipspad_tmp_bayar["English"]["bayar"] = "";
	$fieldLabelspad_tmp_bayar["English"]["tgl"] = "Tgl";
	$fieldToolTipspad_tmp_bayar["English"]["tgl"] = "";
	if (count($fieldToolTipspad_tmp_bayar["English"]))
		$tdatapad_tmp_bayar[".isUseToolTips"] = true;
}
	
	
	$tdatapad_tmp_bayar[".NCSearch"] = true;



$tdatapad_tmp_bayar[".shortTableName"] = "pad_tmp_bayar";
$tdatapad_tmp_bayar[".nSecOptions"] = 0;
$tdatapad_tmp_bayar[".recsPerRowList"] = 1;
$tdatapad_tmp_bayar[".mainTableOwnerID"] = "";
$tdatapad_tmp_bayar[".moveNext"] = 1;
$tdatapad_tmp_bayar[".nType"] = 0;

$tdatapad_tmp_bayar[".strOriginalTableName"] = "pad.tmp_bayar";




$tdatapad_tmp_bayar[".showAddInPopup"] = false;

$tdatapad_tmp_bayar[".showEditInPopup"] = false;

$tdatapad_tmp_bayar[".showViewInPopup"] = false;

$tdatapad_tmp_bayar[".fieldsForRegister"] = array();

$tdatapad_tmp_bayar[".listAjax"] = false;

	$tdatapad_tmp_bayar[".audit"] = false;

	$tdatapad_tmp_bayar[".locking"] = false;

$tdatapad_tmp_bayar[".listIcons"] = true;
$tdatapad_tmp_bayar[".edit"] = true;
$tdatapad_tmp_bayar[".inlineEdit"] = true;
$tdatapad_tmp_bayar[".inlineAdd"] = true;
$tdatapad_tmp_bayar[".view"] = true;

$tdatapad_tmp_bayar[".exportTo"] = true;

$tdatapad_tmp_bayar[".printFriendly"] = true;

$tdatapad_tmp_bayar[".delete"] = true;

$tdatapad_tmp_bayar[".showSimpleSearchOptions"] = false;

$tdatapad_tmp_bayar[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_tmp_bayar[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_tmp_bayar[".isUseAjaxSuggest"] = true;

$tdatapad_tmp_bayar[".rowHighlite"] = true;

// button handlers file names

$tdatapad_tmp_bayar[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_tmp_bayar[".isUseTimeForSearch"] = false;




$tdatapad_tmp_bayar[".allSearchFields"] = array();

$tdatapad_tmp_bayar[".allSearchFields"][] = "id";
$tdatapad_tmp_bayar[".allSearchFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".allSearchFields"][] = "tahun";
$tdatapad_tmp_bayar[".allSearchFields"][] = "sspdno";
$tdatapad_tmp_bayar[".allSearchFields"][] = "spt_id";
$tdatapad_tmp_bayar[".allSearchFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".allSearchFields"][] = "wp";
$tdatapad_tmp_bayar[".allSearchFields"][] = "bunga";
$tdatapad_tmp_bayar[".allSearchFields"][] = "denda";
$tdatapad_tmp_bayar[".allSearchFields"][] = "bayar";
$tdatapad_tmp_bayar[".allSearchFields"][] = "tgl";

$tdatapad_tmp_bayar[".googleLikeFields"][] = "id";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "tahun";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "sspdno";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "spt_id";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "wp";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "bunga";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "denda";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "bayar";
$tdatapad_tmp_bayar[".googleLikeFields"][] = "tgl";


$tdatapad_tmp_bayar[".advSearchFields"][] = "id";
$tdatapad_tmp_bayar[".advSearchFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".advSearchFields"][] = "tahun";
$tdatapad_tmp_bayar[".advSearchFields"][] = "sspdno";
$tdatapad_tmp_bayar[".advSearchFields"][] = "spt_id";
$tdatapad_tmp_bayar[".advSearchFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".advSearchFields"][] = "wp";
$tdatapad_tmp_bayar[".advSearchFields"][] = "bunga";
$tdatapad_tmp_bayar[".advSearchFields"][] = "denda";
$tdatapad_tmp_bayar[".advSearchFields"][] = "bayar";
$tdatapad_tmp_bayar[".advSearchFields"][] = "tgl";

$tdatapad_tmp_bayar[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_tmp_bayar[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_tmp_bayar[".strOrderBy"] = $tstrOrderBy;

$tdatapad_tmp_bayar[".orderindexes"] = array();

$tdatapad_tmp_bayar[".sqlHead"] = "SELECT id,   sspd_id,   tahun,   sspdno,   spt_id,   old_spt_id,   wp,   bunga,   denda,   bayar,   tgl";
$tdatapad_tmp_bayar[".sqlFrom"] = "FROM \"pad\".tmp_bayar";
$tdatapad_tmp_bayar[".sqlWhereExpr"] = "";
$tdatapad_tmp_bayar[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_tmp_bayar[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_tmp_bayar[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_tmp_bayar = array();
$tableKeyspad_tmp_bayar[] = "id";
$tdatapad_tmp_bayar[".Keys"] = $tableKeyspad_tmp_bayar;

$tdatapad_tmp_bayar[".listFields"] = array();
$tdatapad_tmp_bayar[".listFields"][] = "id";
$tdatapad_tmp_bayar[".listFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".listFields"][] = "tahun";
$tdatapad_tmp_bayar[".listFields"][] = "sspdno";
$tdatapad_tmp_bayar[".listFields"][] = "spt_id";
$tdatapad_tmp_bayar[".listFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".listFields"][] = "wp";
$tdatapad_tmp_bayar[".listFields"][] = "bunga";
$tdatapad_tmp_bayar[".listFields"][] = "denda";
$tdatapad_tmp_bayar[".listFields"][] = "bayar";
$tdatapad_tmp_bayar[".listFields"][] = "tgl";

$tdatapad_tmp_bayar[".viewFields"] = array();
$tdatapad_tmp_bayar[".viewFields"][] = "id";
$tdatapad_tmp_bayar[".viewFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".viewFields"][] = "tahun";
$tdatapad_tmp_bayar[".viewFields"][] = "sspdno";
$tdatapad_tmp_bayar[".viewFields"][] = "spt_id";
$tdatapad_tmp_bayar[".viewFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".viewFields"][] = "wp";
$tdatapad_tmp_bayar[".viewFields"][] = "bunga";
$tdatapad_tmp_bayar[".viewFields"][] = "denda";
$tdatapad_tmp_bayar[".viewFields"][] = "bayar";
$tdatapad_tmp_bayar[".viewFields"][] = "tgl";

$tdatapad_tmp_bayar[".addFields"] = array();
$tdatapad_tmp_bayar[".addFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".addFields"][] = "tahun";
$tdatapad_tmp_bayar[".addFields"][] = "sspdno";
$tdatapad_tmp_bayar[".addFields"][] = "spt_id";
$tdatapad_tmp_bayar[".addFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".addFields"][] = "wp";
$tdatapad_tmp_bayar[".addFields"][] = "bunga";
$tdatapad_tmp_bayar[".addFields"][] = "denda";
$tdatapad_tmp_bayar[".addFields"][] = "bayar";
$tdatapad_tmp_bayar[".addFields"][] = "tgl";

$tdatapad_tmp_bayar[".inlineAddFields"] = array();
$tdatapad_tmp_bayar[".inlineAddFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".inlineAddFields"][] = "tahun";
$tdatapad_tmp_bayar[".inlineAddFields"][] = "sspdno";
$tdatapad_tmp_bayar[".inlineAddFields"][] = "spt_id";
$tdatapad_tmp_bayar[".inlineAddFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".inlineAddFields"][] = "wp";
$tdatapad_tmp_bayar[".inlineAddFields"][] = "bunga";
$tdatapad_tmp_bayar[".inlineAddFields"][] = "denda";
$tdatapad_tmp_bayar[".inlineAddFields"][] = "bayar";
$tdatapad_tmp_bayar[".inlineAddFields"][] = "tgl";

$tdatapad_tmp_bayar[".editFields"] = array();
$tdatapad_tmp_bayar[".editFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".editFields"][] = "tahun";
$tdatapad_tmp_bayar[".editFields"][] = "sspdno";
$tdatapad_tmp_bayar[".editFields"][] = "spt_id";
$tdatapad_tmp_bayar[".editFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".editFields"][] = "wp";
$tdatapad_tmp_bayar[".editFields"][] = "bunga";
$tdatapad_tmp_bayar[".editFields"][] = "denda";
$tdatapad_tmp_bayar[".editFields"][] = "bayar";
$tdatapad_tmp_bayar[".editFields"][] = "tgl";

$tdatapad_tmp_bayar[".inlineEditFields"] = array();
$tdatapad_tmp_bayar[".inlineEditFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".inlineEditFields"][] = "tahun";
$tdatapad_tmp_bayar[".inlineEditFields"][] = "sspdno";
$tdatapad_tmp_bayar[".inlineEditFields"][] = "spt_id";
$tdatapad_tmp_bayar[".inlineEditFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".inlineEditFields"][] = "wp";
$tdatapad_tmp_bayar[".inlineEditFields"][] = "bunga";
$tdatapad_tmp_bayar[".inlineEditFields"][] = "denda";
$tdatapad_tmp_bayar[".inlineEditFields"][] = "bayar";
$tdatapad_tmp_bayar[".inlineEditFields"][] = "tgl";

$tdatapad_tmp_bayar[".exportFields"] = array();
$tdatapad_tmp_bayar[".exportFields"][] = "id";
$tdatapad_tmp_bayar[".exportFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".exportFields"][] = "tahun";
$tdatapad_tmp_bayar[".exportFields"][] = "sspdno";
$tdatapad_tmp_bayar[".exportFields"][] = "spt_id";
$tdatapad_tmp_bayar[".exportFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".exportFields"][] = "wp";
$tdatapad_tmp_bayar[".exportFields"][] = "bunga";
$tdatapad_tmp_bayar[".exportFields"][] = "denda";
$tdatapad_tmp_bayar[".exportFields"][] = "bayar";
$tdatapad_tmp_bayar[".exportFields"][] = "tgl";

$tdatapad_tmp_bayar[".printFields"] = array();
$tdatapad_tmp_bayar[".printFields"][] = "id";
$tdatapad_tmp_bayar[".printFields"][] = "sspd_id";
$tdatapad_tmp_bayar[".printFields"][] = "tahun";
$tdatapad_tmp_bayar[".printFields"][] = "sspdno";
$tdatapad_tmp_bayar[".printFields"][] = "spt_id";
$tdatapad_tmp_bayar[".printFields"][] = "old_spt_id";
$tdatapad_tmp_bayar[".printFields"][] = "wp";
$tdatapad_tmp_bayar[".printFields"][] = "bunga";
$tdatapad_tmp_bayar[".printFields"][] = "denda";
$tdatapad_tmp_bayar[".printFields"][] = "bayar";
$tdatapad_tmp_bayar[".printFields"][] = "tgl";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.tmp_bayar";
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
	
		
		
	$tdatapad_tmp_bayar["id"] = $fdata;
//	sspd_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "sspd_id";
	$fdata["GoodName"] = "sspd_id";
	$fdata["ownerTable"] = "pad.tmp_bayar";
	$fdata["Label"] = "Sspd Id"; 
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
	
		$fdata["strField"] = "sspd_id"; 
		$fdata["FullName"] = "sspd_id";
	
		
		
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
	
		
		
	$tdatapad_tmp_bayar["sspd_id"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "pad.tmp_bayar";
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
	
		
		
	$tdatapad_tmp_bayar["tahun"] = $fdata;
//	sspdno
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "sspdno";
	$fdata["GoodName"] = "sspdno";
	$fdata["ownerTable"] = "pad.tmp_bayar";
	$fdata["Label"] = "Sspdno"; 
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
	
		$fdata["strField"] = "sspdno"; 
		$fdata["FullName"] = "sspdno";
	
		
		
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
	
		
		
	$tdatapad_tmp_bayar["sspdno"] = $fdata;
//	spt_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "spt_id";
	$fdata["GoodName"] = "spt_id";
	$fdata["ownerTable"] = "pad.tmp_bayar";
	$fdata["Label"] = "Spt Id"; 
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
	
		$fdata["strField"] = "spt_id"; 
		$fdata["FullName"] = "spt_id";
	
		
		
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
	
		
		
	$tdatapad_tmp_bayar["spt_id"] = $fdata;
//	old_spt_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "old_spt_id";
	$fdata["GoodName"] = "old_spt_id";
	$fdata["ownerTable"] = "pad.tmp_bayar";
	$fdata["Label"] = "Old Spt Id"; 
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
	
		$fdata["strField"] = "old_spt_id"; 
		$fdata["FullName"] = "old_spt_id";
	
		
		
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
	
		
		
	$tdatapad_tmp_bayar["old_spt_id"] = $fdata;
//	wp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "wp";
	$fdata["GoodName"] = "wp";
	$fdata["ownerTable"] = "pad.tmp_bayar";
	$fdata["Label"] = "Wp"; 
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
	
		$fdata["strField"] = "wp"; 
		$fdata["FullName"] = "wp";
	
		
		
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
	
		
		
	$tdatapad_tmp_bayar["wp"] = $fdata;
//	bunga
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "bunga";
	$fdata["GoodName"] = "bunga";
	$fdata["ownerTable"] = "pad.tmp_bayar";
	$fdata["Label"] = "Bunga"; 
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
	
		$fdata["strField"] = "bunga"; 
		$fdata["FullName"] = "bunga";
	
		
		
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
	
		
		
	$tdatapad_tmp_bayar["bunga"] = $fdata;
//	denda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "denda";
	$fdata["GoodName"] = "denda";
	$fdata["ownerTable"] = "pad.tmp_bayar";
	$fdata["Label"] = "Denda"; 
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
	
		$fdata["strField"] = "denda"; 
		$fdata["FullName"] = "denda";
	
		
		
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
	
		
		
	$tdatapad_tmp_bayar["denda"] = $fdata;
//	bayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "bayar";
	$fdata["GoodName"] = "bayar";
	$fdata["ownerTable"] = "pad.tmp_bayar";
	$fdata["Label"] = "Bayar"; 
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
	
		$fdata["strField"] = "bayar"; 
		$fdata["FullName"] = "bayar";
	
		
		
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
	
		
		
	$tdatapad_tmp_bayar["bayar"] = $fdata;
//	tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "tgl";
	$fdata["GoodName"] = "tgl";
	$fdata["ownerTable"] = "pad.tmp_bayar";
	$fdata["Label"] = "Tgl"; 
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
	
		$fdata["strField"] = "tgl"; 
		$fdata["FullName"] = "tgl";
	
		
		
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
	
		
		
	$tdatapad_tmp_bayar["tgl"] = $fdata;

	
$tables_data["pad.tmp_bayar"]=&$tdatapad_tmp_bayar;
$field_labels["pad_tmp_bayar"] = &$fieldLabelspad_tmp_bayar;
$fieldToolTips["pad.tmp_bayar"] = &$fieldToolTipspad_tmp_bayar;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.tmp_bayar"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.tmp_bayar"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_tmp_bayar()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   sspd_id,   tahun,   sspdno,   spt_id,   old_spt_id,   wp,   bunga,   denda,   bayar,   tgl";
$proto0["m_strFrom"] = "FROM \"pad\".tmp_bayar";
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
	"m_strTable" => "pad.tmp_bayar"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "sspd_id",
	"m_strTable" => "pad.tmp_bayar"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "pad.tmp_bayar"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "sspdno",
	"m_strTable" => "pad.tmp_bayar"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_id",
	"m_strTable" => "pad.tmp_bayar"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "old_spt_id",
	"m_strTable" => "pad.tmp_bayar"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "wp",
	"m_strTable" => "pad.tmp_bayar"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "bunga",
	"m_strTable" => "pad.tmp_bayar"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "denda",
	"m_strTable" => "pad.tmp_bayar"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "bayar",
	"m_strTable" => "pad.tmp_bayar"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "tgl",
	"m_strTable" => "pad.tmp_bayar"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "pad.tmp_bayar";
$proto28["m_columns"] = array();
$proto28["m_columns"][] = "id";
$proto28["m_columns"][] = "sspd_id";
$proto28["m_columns"][] = "tahun";
$proto28["m_columns"][] = "sspdno";
$proto28["m_columns"][] = "spt_id";
$proto28["m_columns"][] = "old_spt_id";
$proto28["m_columns"][] = "wp";
$proto28["m_columns"][] = "bunga";
$proto28["m_columns"][] = "denda";
$proto28["m_columns"][] = "bayar";
$proto28["m_columns"][] = "tgl";
$obj = new SQLTable($proto28);

$proto27["m_table"] = $obj;
$proto27["m_alias"] = "";
$proto29=array();
$proto29["m_sql"] = "";
$proto29["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto29["m_column"]=$obj;
$proto29["m_contained"] = array();
$proto29["m_strCase"] = "";
$proto29["m_havingmode"] = "0";
$proto29["m_inBrackets"] = "0";
$proto29["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto29);

$proto27["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto27);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_tmp_bayar = createSqlQuery_pad_tmp_bayar();
											$tdatapad_tmp_bayar[".sqlquery"] = $queryData_pad_tmp_bayar;
	
if(isset($tdatapad_tmp_bayar["field2"])){
	$tdatapad_tmp_bayar["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_tmp_bayar["field2"]["LookupOrderBy"] = "name";
	$tdatapad_tmp_bayar["field2"]["LookupType"] = 4;
	$tdatapad_tmp_bayar["field2"]["LinkField"] = "email";
	$tdatapad_tmp_bayar["field2"]["DisplayField"] = "name";
	$tdatapad_tmp_bayar[".hasCustomViewField"] = true;
}

$tableEvents["pad.tmp_bayar"] = new eventsBase;
$tdatapad_tmp_bayar[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.tmp_bayar");

?>