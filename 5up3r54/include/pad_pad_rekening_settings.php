<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_rekening = array();
	$tdatapad_pad_rekening[".NumberOfChars"] = 80; 
	$tdatapad_pad_rekening[".ShortName"] = "pad_pad_rekening";
	$tdatapad_pad_rekening[".OwnerID"] = "";
	$tdatapad_pad_rekening[".OriginalTable"] = "pad.pad_rekening";

//	field labels
$fieldLabelspad_pad_rekening = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_rekening["English"] = array();
	$fieldToolTipspad_pad_rekening["English"] = array();
	$fieldLabelspad_pad_rekening["English"]["id"] = "Id";
	$fieldToolTipspad_pad_rekening["English"]["id"] = "";
	$fieldLabelspad_pad_rekening["English"]["kode"] = "Kode";
	$fieldToolTipspad_pad_rekening["English"]["kode"] = "";
	$fieldLabelspad_pad_rekening["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_rekening["English"]["nama"] = "";
	$fieldLabelspad_pad_rekening["English"]["levelid"] = "Levelid";
	$fieldToolTipspad_pad_rekening["English"]["levelid"] = "";
	$fieldLabelspad_pad_rekening["English"]["issummary"] = "Issummary";
	$fieldToolTipspad_pad_rekening["English"]["issummary"] = "";
	$fieldLabelspad_pad_rekening["English"]["defsign"] = "Defsign";
	$fieldToolTipspad_pad_rekening["English"]["defsign"] = "";
	$fieldLabelspad_pad_rekening["English"]["isppkd"] = "Isppkd";
	$fieldToolTipspad_pad_rekening["English"]["isppkd"] = "";
	$fieldLabelspad_pad_rekening["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_rekening["English"]["tmt"] = "";
	$fieldLabelspad_pad_rekening["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_rekening["English"]["enabled"] = "";
	$fieldLabelspad_pad_rekening["English"]["created"] = "Created";
	$fieldToolTipspad_pad_rekening["English"]["created"] = "";
	$fieldLabelspad_pad_rekening["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_rekening["English"]["create_uid"] = "";
	$fieldLabelspad_pad_rekening["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_rekening["English"]["updated"] = "";
	$fieldLabelspad_pad_rekening["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_rekening["English"]["update_uid"] = "";
	$fieldLabelspad_pad_rekening["English"]["insidentil"] = "Insidentil";
	$fieldToolTipspad_pad_rekening["English"]["insidentil"] = "";
	if (count($fieldToolTipspad_pad_rekening["English"]))
		$tdatapad_pad_rekening[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_rekening[".NCSearch"] = true;



$tdatapad_pad_rekening[".shortTableName"] = "pad_pad_rekening";
$tdatapad_pad_rekening[".nSecOptions"] = 0;
$tdatapad_pad_rekening[".recsPerRowList"] = 1;
$tdatapad_pad_rekening[".mainTableOwnerID"] = "";
$tdatapad_pad_rekening[".moveNext"] = 1;
$tdatapad_pad_rekening[".nType"] = 0;

$tdatapad_pad_rekening[".strOriginalTableName"] = "pad.pad_rekening";




$tdatapad_pad_rekening[".showAddInPopup"] = false;

$tdatapad_pad_rekening[".showEditInPopup"] = false;

$tdatapad_pad_rekening[".showViewInPopup"] = false;

$tdatapad_pad_rekening[".fieldsForRegister"] = array();

$tdatapad_pad_rekening[".listAjax"] = false;

	$tdatapad_pad_rekening[".audit"] = false;

	$tdatapad_pad_rekening[".locking"] = false;

$tdatapad_pad_rekening[".listIcons"] = true;
$tdatapad_pad_rekening[".edit"] = true;
$tdatapad_pad_rekening[".inlineEdit"] = true;
$tdatapad_pad_rekening[".inlineAdd"] = true;
$tdatapad_pad_rekening[".view"] = true;

$tdatapad_pad_rekening[".exportTo"] = true;

$tdatapad_pad_rekening[".printFriendly"] = true;

$tdatapad_pad_rekening[".delete"] = true;

$tdatapad_pad_rekening[".showSimpleSearchOptions"] = false;

$tdatapad_pad_rekening[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_rekening[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_rekening[".isUseAjaxSuggest"] = true;

$tdatapad_pad_rekening[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_rekening[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_rekening[".isUseTimeForSearch"] = false;



$tdatapad_pad_rekening[".useDetailsPreview"] = true;

$tdatapad_pad_rekening[".allSearchFields"] = array();

$tdatapad_pad_rekening[".allSearchFields"][] = "id";
$tdatapad_pad_rekening[".allSearchFields"][] = "kode";
$tdatapad_pad_rekening[".allSearchFields"][] = "nama";
$tdatapad_pad_rekening[".allSearchFields"][] = "levelid";
$tdatapad_pad_rekening[".allSearchFields"][] = "issummary";
$tdatapad_pad_rekening[".allSearchFields"][] = "defsign";
$tdatapad_pad_rekening[".allSearchFields"][] = "isppkd";
$tdatapad_pad_rekening[".allSearchFields"][] = "tmt";
$tdatapad_pad_rekening[".allSearchFields"][] = "enabled";
$tdatapad_pad_rekening[".allSearchFields"][] = "created";
$tdatapad_pad_rekening[".allSearchFields"][] = "create_uid";
$tdatapad_pad_rekening[".allSearchFields"][] = "updated";
$tdatapad_pad_rekening[".allSearchFields"][] = "update_uid";
$tdatapad_pad_rekening[".allSearchFields"][] = "insidentil";

$tdatapad_pad_rekening[".googleLikeFields"][] = "id";
$tdatapad_pad_rekening[".googleLikeFields"][] = "kode";
$tdatapad_pad_rekening[".googleLikeFields"][] = "nama";
$tdatapad_pad_rekening[".googleLikeFields"][] = "levelid";
$tdatapad_pad_rekening[".googleLikeFields"][] = "issummary";
$tdatapad_pad_rekening[".googleLikeFields"][] = "defsign";
$tdatapad_pad_rekening[".googleLikeFields"][] = "isppkd";
$tdatapad_pad_rekening[".googleLikeFields"][] = "tmt";
$tdatapad_pad_rekening[".googleLikeFields"][] = "enabled";
$tdatapad_pad_rekening[".googleLikeFields"][] = "created";
$tdatapad_pad_rekening[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_rekening[".googleLikeFields"][] = "updated";
$tdatapad_pad_rekening[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_rekening[".googleLikeFields"][] = "insidentil";


$tdatapad_pad_rekening[".advSearchFields"][] = "id";
$tdatapad_pad_rekening[".advSearchFields"][] = "kode";
$tdatapad_pad_rekening[".advSearchFields"][] = "nama";
$tdatapad_pad_rekening[".advSearchFields"][] = "levelid";
$tdatapad_pad_rekening[".advSearchFields"][] = "issummary";
$tdatapad_pad_rekening[".advSearchFields"][] = "defsign";
$tdatapad_pad_rekening[".advSearchFields"][] = "isppkd";
$tdatapad_pad_rekening[".advSearchFields"][] = "tmt";
$tdatapad_pad_rekening[".advSearchFields"][] = "enabled";
$tdatapad_pad_rekening[".advSearchFields"][] = "created";
$tdatapad_pad_rekening[".advSearchFields"][] = "create_uid";
$tdatapad_pad_rekening[".advSearchFields"][] = "updated";
$tdatapad_pad_rekening[".advSearchFields"][] = "update_uid";
$tdatapad_pad_rekening[".advSearchFields"][] = "insidentil";

$tdatapad_pad_rekening[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
				


$tdatapad_pad_rekening[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_rekening[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_rekening[".orderindexes"] = array();

$tdatapad_pad_rekening[".sqlHead"] = "SELECT id,   kode,   nama,   levelid,   issummary,   defsign,   isppkd,   tmt,   enabled,   created,   create_uid,   updated,   update_uid,   insidentil";
$tdatapad_pad_rekening[".sqlFrom"] = "FROM \"pad\".pad_rekening";
$tdatapad_pad_rekening[".sqlWhereExpr"] = "";
$tdatapad_pad_rekening[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_rekening[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_rekening[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_rekening = array();
$tableKeyspad_pad_rekening[] = "id";
$tdatapad_pad_rekening[".Keys"] = $tableKeyspad_pad_rekening;

$tdatapad_pad_rekening[".listFields"] = array();
$tdatapad_pad_rekening[".listFields"][] = "id";
$tdatapad_pad_rekening[".listFields"][] = "kode";
$tdatapad_pad_rekening[".listFields"][] = "nama";
$tdatapad_pad_rekening[".listFields"][] = "levelid";
$tdatapad_pad_rekening[".listFields"][] = "issummary";
$tdatapad_pad_rekening[".listFields"][] = "defsign";
$tdatapad_pad_rekening[".listFields"][] = "isppkd";
$tdatapad_pad_rekening[".listFields"][] = "tmt";
$tdatapad_pad_rekening[".listFields"][] = "enabled";
$tdatapad_pad_rekening[".listFields"][] = "created";
$tdatapad_pad_rekening[".listFields"][] = "create_uid";
$tdatapad_pad_rekening[".listFields"][] = "updated";
$tdatapad_pad_rekening[".listFields"][] = "update_uid";
$tdatapad_pad_rekening[".listFields"][] = "insidentil";

$tdatapad_pad_rekening[".viewFields"] = array();
$tdatapad_pad_rekening[".viewFields"][] = "id";
$tdatapad_pad_rekening[".viewFields"][] = "kode";
$tdatapad_pad_rekening[".viewFields"][] = "nama";
$tdatapad_pad_rekening[".viewFields"][] = "levelid";
$tdatapad_pad_rekening[".viewFields"][] = "issummary";
$tdatapad_pad_rekening[".viewFields"][] = "defsign";
$tdatapad_pad_rekening[".viewFields"][] = "isppkd";
$tdatapad_pad_rekening[".viewFields"][] = "tmt";
$tdatapad_pad_rekening[".viewFields"][] = "enabled";
$tdatapad_pad_rekening[".viewFields"][] = "created";
$tdatapad_pad_rekening[".viewFields"][] = "create_uid";
$tdatapad_pad_rekening[".viewFields"][] = "updated";
$tdatapad_pad_rekening[".viewFields"][] = "update_uid";
$tdatapad_pad_rekening[".viewFields"][] = "insidentil";

$tdatapad_pad_rekening[".addFields"] = array();
$tdatapad_pad_rekening[".addFields"][] = "kode";
$tdatapad_pad_rekening[".addFields"][] = "nama";
$tdatapad_pad_rekening[".addFields"][] = "levelid";
$tdatapad_pad_rekening[".addFields"][] = "issummary";
$tdatapad_pad_rekening[".addFields"][] = "defsign";
$tdatapad_pad_rekening[".addFields"][] = "isppkd";
$tdatapad_pad_rekening[".addFields"][] = "tmt";
$tdatapad_pad_rekening[".addFields"][] = "enabled";
$tdatapad_pad_rekening[".addFields"][] = "created";
$tdatapad_pad_rekening[".addFields"][] = "create_uid";
$tdatapad_pad_rekening[".addFields"][] = "updated";
$tdatapad_pad_rekening[".addFields"][] = "update_uid";
$tdatapad_pad_rekening[".addFields"][] = "insidentil";

$tdatapad_pad_rekening[".inlineAddFields"] = array();
$tdatapad_pad_rekening[".inlineAddFields"][] = "kode";
$tdatapad_pad_rekening[".inlineAddFields"][] = "nama";
$tdatapad_pad_rekening[".inlineAddFields"][] = "levelid";
$tdatapad_pad_rekening[".inlineAddFields"][] = "issummary";
$tdatapad_pad_rekening[".inlineAddFields"][] = "defsign";
$tdatapad_pad_rekening[".inlineAddFields"][] = "isppkd";
$tdatapad_pad_rekening[".inlineAddFields"][] = "tmt";
$tdatapad_pad_rekening[".inlineAddFields"][] = "enabled";
$tdatapad_pad_rekening[".inlineAddFields"][] = "created";
$tdatapad_pad_rekening[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_rekening[".inlineAddFields"][] = "updated";
$tdatapad_pad_rekening[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_rekening[".inlineAddFields"][] = "insidentil";

$tdatapad_pad_rekening[".editFields"] = array();
$tdatapad_pad_rekening[".editFields"][] = "kode";
$tdatapad_pad_rekening[".editFields"][] = "nama";
$tdatapad_pad_rekening[".editFields"][] = "levelid";
$tdatapad_pad_rekening[".editFields"][] = "issummary";
$tdatapad_pad_rekening[".editFields"][] = "defsign";
$tdatapad_pad_rekening[".editFields"][] = "isppkd";
$tdatapad_pad_rekening[".editFields"][] = "tmt";
$tdatapad_pad_rekening[".editFields"][] = "enabled";
$tdatapad_pad_rekening[".editFields"][] = "created";
$tdatapad_pad_rekening[".editFields"][] = "create_uid";
$tdatapad_pad_rekening[".editFields"][] = "updated";
$tdatapad_pad_rekening[".editFields"][] = "update_uid";
$tdatapad_pad_rekening[".editFields"][] = "insidentil";

$tdatapad_pad_rekening[".inlineEditFields"] = array();
$tdatapad_pad_rekening[".inlineEditFields"][] = "kode";
$tdatapad_pad_rekening[".inlineEditFields"][] = "nama";
$tdatapad_pad_rekening[".inlineEditFields"][] = "levelid";
$tdatapad_pad_rekening[".inlineEditFields"][] = "issummary";
$tdatapad_pad_rekening[".inlineEditFields"][] = "defsign";
$tdatapad_pad_rekening[".inlineEditFields"][] = "isppkd";
$tdatapad_pad_rekening[".inlineEditFields"][] = "tmt";
$tdatapad_pad_rekening[".inlineEditFields"][] = "enabled";
$tdatapad_pad_rekening[".inlineEditFields"][] = "created";
$tdatapad_pad_rekening[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_rekening[".inlineEditFields"][] = "updated";
$tdatapad_pad_rekening[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_rekening[".inlineEditFields"][] = "insidentil";

$tdatapad_pad_rekening[".exportFields"] = array();
$tdatapad_pad_rekening[".exportFields"][] = "id";
$tdatapad_pad_rekening[".exportFields"][] = "kode";
$tdatapad_pad_rekening[".exportFields"][] = "nama";
$tdatapad_pad_rekening[".exportFields"][] = "levelid";
$tdatapad_pad_rekening[".exportFields"][] = "issummary";
$tdatapad_pad_rekening[".exportFields"][] = "defsign";
$tdatapad_pad_rekening[".exportFields"][] = "isppkd";
$tdatapad_pad_rekening[".exportFields"][] = "tmt";
$tdatapad_pad_rekening[".exportFields"][] = "enabled";
$tdatapad_pad_rekening[".exportFields"][] = "created";
$tdatapad_pad_rekening[".exportFields"][] = "create_uid";
$tdatapad_pad_rekening[".exportFields"][] = "updated";
$tdatapad_pad_rekening[".exportFields"][] = "update_uid";
$tdatapad_pad_rekening[".exportFields"][] = "insidentil";

$tdatapad_pad_rekening[".printFields"] = array();
$tdatapad_pad_rekening[".printFields"][] = "id";
$tdatapad_pad_rekening[".printFields"][] = "kode";
$tdatapad_pad_rekening[".printFields"][] = "nama";
$tdatapad_pad_rekening[".printFields"][] = "levelid";
$tdatapad_pad_rekening[".printFields"][] = "issummary";
$tdatapad_pad_rekening[".printFields"][] = "defsign";
$tdatapad_pad_rekening[".printFields"][] = "isppkd";
$tdatapad_pad_rekening[".printFields"][] = "tmt";
$tdatapad_pad_rekening[".printFields"][] = "enabled";
$tdatapad_pad_rekening[".printFields"][] = "created";
$tdatapad_pad_rekening[".printFields"][] = "create_uid";
$tdatapad_pad_rekening[".printFields"][] = "updated";
$tdatapad_pad_rekening[".printFields"][] = "update_uid";
$tdatapad_pad_rekening[".printFields"][] = "insidentil";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_rekening";
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
	
		
		
	$tdatapad_pad_rekening["id"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "pad.pad_rekening";
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
			$edata["EditParams"].= " maxlength=15";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_rekening["kode"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_rekening";
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
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_rekening["nama"] = $fdata;
//	levelid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "levelid";
	$fdata["GoodName"] = "levelid";
	$fdata["ownerTable"] = "pad.pad_rekening";
	$fdata["Label"] = "Levelid"; 
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
	
		$fdata["strField"] = "levelid"; 
		$fdata["FullName"] = "levelid";
	
		
		
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
	
		
		
	$tdatapad_pad_rekening["levelid"] = $fdata;
//	issummary
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "issummary";
	$fdata["GoodName"] = "issummary";
	$fdata["ownerTable"] = "pad.pad_rekening";
	$fdata["Label"] = "Issummary"; 
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
	
		$fdata["strField"] = "issummary"; 
		$fdata["FullName"] = "issummary";
	
		
		
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
	
		
		
	$tdatapad_pad_rekening["issummary"] = $fdata;
//	defsign
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "defsign";
	$fdata["GoodName"] = "defsign";
	$fdata["ownerTable"] = "pad.pad_rekening";
	$fdata["Label"] = "Defsign"; 
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
	
		$fdata["strField"] = "defsign"; 
		$fdata["FullName"] = "defsign";
	
		
		
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
	
		
		
	$tdatapad_pad_rekening["defsign"] = $fdata;
//	isppkd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "isppkd";
	$fdata["GoodName"] = "isppkd";
	$fdata["ownerTable"] = "pad.pad_rekening";
	$fdata["Label"] = "Isppkd"; 
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
	
		$fdata["strField"] = "isppkd"; 
		$fdata["FullName"] = "isppkd";
	
		
		
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
	
		
		
	$tdatapad_pad_rekening["isppkd"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_rekening";
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
	
		
		
	$tdatapad_pad_rekening["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_rekening";
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
	
		
		
	$tdatapad_pad_rekening["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_rekening";
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
	
		
		
	$tdatapad_pad_rekening["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_rekening";
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
	
		
		
	$tdatapad_pad_rekening["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_rekening";
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
	
		
		
	$tdatapad_pad_rekening["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_rekening";
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
	
		
		
	$tdatapad_pad_rekening["update_uid"] = $fdata;
//	insidentil
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "insidentil";
	$fdata["GoodName"] = "insidentil";
	$fdata["ownerTable"] = "pad.pad_rekening";
	$fdata["Label"] = "Insidentil"; 
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
	
		$fdata["strField"] = "insidentil"; 
		$fdata["FullName"] = "insidentil";
	
		
		
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
	
		
		
	$tdatapad_pad_rekening["insidentil"] = $fdata;

	
$tables_data["pad.pad_rekening"]=&$tdatapad_pad_rekening;
$field_labels["pad_pad_rekening"] = &$fieldLabelspad_pad_rekening;
$fieldToolTips["pad.pad_rekening"] = &$fieldToolTipspad_pad_rekening;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_rekening"] = array();
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
		
	$detailsTablesData["pad.pad_rekening"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_rekening"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_rekening"][$dIndex]["detailKeys"][]="rekening_id";

$dIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_anggaran";
	$detailsParam["dDataSourceTable"]="pad.pad_anggaran";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_anggaran";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_rekening"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_rekening"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_rekening"][$dIndex]["detailKeys"][]="rekening_id";

$dIndex = 3-1;
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
		
	$detailsTablesData["pad.pad_rekening"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_rekening"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_rekening"][$dIndex]["detailKeys"][]="rekening_id";

$dIndex = 4-1;
			$strOriginalDetailsTable="pad.pad_terima_line";
	$detailsParam["dDataSourceTable"]="pad.pad_terima_line";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_terima_line";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_rekening"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_rekening"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_rekening"][$dIndex]["detailKeys"][]="rekening_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_rekening"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_rekening()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   kode,   nama,   levelid,   issummary,   defsign,   isppkd,   tmt,   enabled,   created,   create_uid,   updated,   update_uid,   insidentil";
$proto0["m_strFrom"] = "FROM \"pad\".pad_rekening";
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
	"m_strTable" => "pad.pad_rekening"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "pad.pad_rekening"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_rekening"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "levelid",
	"m_strTable" => "pad.pad_rekening"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "issummary",
	"m_strTable" => "pad.pad_rekening"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "defsign",
	"m_strTable" => "pad.pad_rekening"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "isppkd",
	"m_strTable" => "pad.pad_rekening"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_rekening"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_rekening"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_rekening"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_rekening"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_rekening"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_rekening"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "insidentil",
	"m_strTable" => "pad.pad_rekening"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto33=array();
$proto33["m_link"] = "SQLL_MAIN";
			$proto34=array();
$proto34["m_strName"] = "pad.pad_rekening";
$proto34["m_columns"] = array();
$proto34["m_columns"][] = "id";
$proto34["m_columns"][] = "kode";
$proto34["m_columns"][] = "nama";
$proto34["m_columns"][] = "levelid";
$proto34["m_columns"][] = "issummary";
$proto34["m_columns"][] = "defsign";
$proto34["m_columns"][] = "isppkd";
$proto34["m_columns"][] = "tmt";
$proto34["m_columns"][] = "enabled";
$proto34["m_columns"][] = "created";
$proto34["m_columns"][] = "create_uid";
$proto34["m_columns"][] = "updated";
$proto34["m_columns"][] = "update_uid";
$proto34["m_columns"][] = "insidentil";
$obj = new SQLTable($proto34);

$proto33["m_table"] = $obj;
$proto33["m_alias"] = "";
$proto35=array();
$proto35["m_sql"] = "";
$proto35["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto35["m_column"]=$obj;
$proto35["m_contained"] = array();
$proto35["m_strCase"] = "";
$proto35["m_havingmode"] = "0";
$proto35["m_inBrackets"] = "0";
$proto35["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto35);

$proto33["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto33);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_rekening = createSqlQuery_pad_pad_rekening();
														$tdatapad_pad_rekening[".sqlquery"] = $queryData_pad_pad_rekening;
	
if(isset($tdatapad_pad_rekening["field2"])){
	$tdatapad_pad_rekening["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_rekening["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_rekening["field2"]["LookupType"] = 4;
	$tdatapad_pad_rekening["field2"]["LinkField"] = "email";
	$tdatapad_pad_rekening["field2"]["DisplayField"] = "name";
	$tdatapad_pad_rekening[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_rekening"] = new eventsBase;
$tdatapad_pad_rekening[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_rekening");

?>