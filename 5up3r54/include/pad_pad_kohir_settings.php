<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_kohir = array();
	$tdatapad_pad_kohir[".NumberOfChars"] = 80; 
	$tdatapad_pad_kohir[".ShortName"] = "pad_pad_kohir";
	$tdatapad_pad_kohir[".OwnerID"] = "";
	$tdatapad_pad_kohir[".OriginalTable"] = "pad.pad_kohir";

//	field labels
$fieldLabelspad_pad_kohir = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_kohir["English"] = array();
	$fieldToolTipspad_pad_kohir["English"] = array();
	$fieldLabelspad_pad_kohir["English"]["id"] = "Id";
	$fieldToolTipspad_pad_kohir["English"]["id"] = "";
	$fieldLabelspad_pad_kohir["English"]["tahun"] = "Tahun";
	$fieldToolTipspad_pad_kohir["English"]["tahun"] = "";
	$fieldLabelspad_pad_kohir["English"]["usaha_id"] = "Usaha Id";
	$fieldToolTipspad_pad_kohir["English"]["usaha_id"] = "";
	$fieldLabelspad_pad_kohir["English"]["kohirno"] = "Kohirno";
	$fieldToolTipspad_pad_kohir["English"]["kohirno"] = "";
	$fieldLabelspad_pad_kohir["English"]["kohirtgl"] = "Kohirtgl";
	$fieldToolTipspad_pad_kohir["English"]["kohirtgl"] = "";
	$fieldLabelspad_pad_kohir["English"]["spt_id"] = "Spt Id";
	$fieldToolTipspad_pad_kohir["English"]["spt_id"] = "";
	$fieldLabelspad_pad_kohir["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_kohir["English"]["enabled"] = "";
	$fieldLabelspad_pad_kohir["English"]["created"] = "Created";
	$fieldToolTipspad_pad_kohir["English"]["created"] = "";
	$fieldLabelspad_pad_kohir["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_kohir["English"]["create_uid"] = "";
	$fieldLabelspad_pad_kohir["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_kohir["English"]["updated"] = "";
	$fieldLabelspad_pad_kohir["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_kohir["English"]["update_uid"] = "";
	$fieldLabelspad_pad_kohir["English"]["petugas_id"] = "Petugas Id";
	$fieldToolTipspad_pad_kohir["English"]["petugas_id"] = "";
	$fieldLabelspad_pad_kohir["English"]["pejabat_id"] = "Pejabat Id";
	$fieldToolTipspad_pad_kohir["English"]["pejabat_id"] = "";
	$fieldLabelspad_pad_kohir["English"]["type_id"] = "Type Id";
	$fieldToolTipspad_pad_kohir["English"]["type_id"] = "";
	if (count($fieldToolTipspad_pad_kohir["English"]))
		$tdatapad_pad_kohir[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_kohir[".NCSearch"] = true;



$tdatapad_pad_kohir[".shortTableName"] = "pad_pad_kohir";
$tdatapad_pad_kohir[".nSecOptions"] = 0;
$tdatapad_pad_kohir[".recsPerRowList"] = 1;
$tdatapad_pad_kohir[".mainTableOwnerID"] = "";
$tdatapad_pad_kohir[".moveNext"] = 1;
$tdatapad_pad_kohir[".nType"] = 0;

$tdatapad_pad_kohir[".strOriginalTableName"] = "pad.pad_kohir";




$tdatapad_pad_kohir[".showAddInPopup"] = false;

$tdatapad_pad_kohir[".showEditInPopup"] = false;

$tdatapad_pad_kohir[".showViewInPopup"] = false;

$tdatapad_pad_kohir[".fieldsForRegister"] = array();

$tdatapad_pad_kohir[".listAjax"] = false;

	$tdatapad_pad_kohir[".audit"] = false;

	$tdatapad_pad_kohir[".locking"] = false;

$tdatapad_pad_kohir[".listIcons"] = true;
$tdatapad_pad_kohir[".edit"] = true;
$tdatapad_pad_kohir[".inlineEdit"] = true;
$tdatapad_pad_kohir[".inlineAdd"] = true;
$tdatapad_pad_kohir[".view"] = true;



$tdatapad_pad_kohir[".delete"] = true;

$tdatapad_pad_kohir[".showSimpleSearchOptions"] = false;

$tdatapad_pad_kohir[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_kohir[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_kohir[".isUseAjaxSuggest"] = true;

$tdatapad_pad_kohir[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_kohir[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_kohir[".isUseTimeForSearch"] = false;




$tdatapad_pad_kohir[".allSearchFields"] = array();

$tdatapad_pad_kohir[".allSearchFields"][] = "id";
$tdatapad_pad_kohir[".allSearchFields"][] = "tahun";
$tdatapad_pad_kohir[".allSearchFields"][] = "usaha_id";
$tdatapad_pad_kohir[".allSearchFields"][] = "kohirno";
$tdatapad_pad_kohir[".allSearchFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".allSearchFields"][] = "spt_id";
$tdatapad_pad_kohir[".allSearchFields"][] = "enabled";
$tdatapad_pad_kohir[".allSearchFields"][] = "created";
$tdatapad_pad_kohir[".allSearchFields"][] = "create_uid";
$tdatapad_pad_kohir[".allSearchFields"][] = "updated";
$tdatapad_pad_kohir[".allSearchFields"][] = "update_uid";
$tdatapad_pad_kohir[".allSearchFields"][] = "petugas_id";
$tdatapad_pad_kohir[".allSearchFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".allSearchFields"][] = "type_id";

$tdatapad_pad_kohir[".googleLikeFields"][] = "id";
$tdatapad_pad_kohir[".googleLikeFields"][] = "tahun";
$tdatapad_pad_kohir[".googleLikeFields"][] = "usaha_id";
$tdatapad_pad_kohir[".googleLikeFields"][] = "kohirno";
$tdatapad_pad_kohir[".googleLikeFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".googleLikeFields"][] = "spt_id";
$tdatapad_pad_kohir[".googleLikeFields"][] = "enabled";
$tdatapad_pad_kohir[".googleLikeFields"][] = "created";
$tdatapad_pad_kohir[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_kohir[".googleLikeFields"][] = "updated";
$tdatapad_pad_kohir[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_kohir[".googleLikeFields"][] = "petugas_id";
$tdatapad_pad_kohir[".googleLikeFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".googleLikeFields"][] = "type_id";


$tdatapad_pad_kohir[".advSearchFields"][] = "id";
$tdatapad_pad_kohir[".advSearchFields"][] = "tahun";
$tdatapad_pad_kohir[".advSearchFields"][] = "usaha_id";
$tdatapad_pad_kohir[".advSearchFields"][] = "kohirno";
$tdatapad_pad_kohir[".advSearchFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".advSearchFields"][] = "spt_id";
$tdatapad_pad_kohir[".advSearchFields"][] = "enabled";
$tdatapad_pad_kohir[".advSearchFields"][] = "created";
$tdatapad_pad_kohir[".advSearchFields"][] = "create_uid";
$tdatapad_pad_kohir[".advSearchFields"][] = "updated";
$tdatapad_pad_kohir[".advSearchFields"][] = "update_uid";
$tdatapad_pad_kohir[".advSearchFields"][] = "petugas_id";
$tdatapad_pad_kohir[".advSearchFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".advSearchFields"][] = "type_id";

$tdatapad_pad_kohir[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_kohir[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_kohir[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_kohir[".orderindexes"] = array();

$tdatapad_pad_kohir[".sqlHead"] = "SELECT id,   tahun,   usaha_id,   kohirno,   kohirtgl,   spt_id,   enabled,   created,   create_uid,   updated,   update_uid,   petugas_id,   pejabat_id,   type_id";
$tdatapad_pad_kohir[".sqlFrom"] = "FROM \"pad\".pad_kohir";
$tdatapad_pad_kohir[".sqlWhereExpr"] = "";
$tdatapad_pad_kohir[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_kohir[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_kohir[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_kohir = array();
$tableKeyspad_pad_kohir[] = "id";
$tdatapad_pad_kohir[".Keys"] = $tableKeyspad_pad_kohir;

$tdatapad_pad_kohir[".listFields"] = array();
$tdatapad_pad_kohir[".listFields"][] = "id";
$tdatapad_pad_kohir[".listFields"][] = "tahun";
$tdatapad_pad_kohir[".listFields"][] = "usaha_id";
$tdatapad_pad_kohir[".listFields"][] = "kohirno";
$tdatapad_pad_kohir[".listFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".listFields"][] = "spt_id";
$tdatapad_pad_kohir[".listFields"][] = "enabled";
$tdatapad_pad_kohir[".listFields"][] = "created";
$tdatapad_pad_kohir[".listFields"][] = "create_uid";
$tdatapad_pad_kohir[".listFields"][] = "updated";
$tdatapad_pad_kohir[".listFields"][] = "update_uid";
$tdatapad_pad_kohir[".listFields"][] = "petugas_id";
$tdatapad_pad_kohir[".listFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".listFields"][] = "type_id";

$tdatapad_pad_kohir[".viewFields"] = array();
$tdatapad_pad_kohir[".viewFields"][] = "id";
$tdatapad_pad_kohir[".viewFields"][] = "tahun";
$tdatapad_pad_kohir[".viewFields"][] = "usaha_id";
$tdatapad_pad_kohir[".viewFields"][] = "kohirno";
$tdatapad_pad_kohir[".viewFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".viewFields"][] = "spt_id";
$tdatapad_pad_kohir[".viewFields"][] = "enabled";
$tdatapad_pad_kohir[".viewFields"][] = "created";
$tdatapad_pad_kohir[".viewFields"][] = "create_uid";
$tdatapad_pad_kohir[".viewFields"][] = "updated";
$tdatapad_pad_kohir[".viewFields"][] = "update_uid";
$tdatapad_pad_kohir[".viewFields"][] = "petugas_id";
$tdatapad_pad_kohir[".viewFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".viewFields"][] = "type_id";

$tdatapad_pad_kohir[".addFields"] = array();
$tdatapad_pad_kohir[".addFields"][] = "tahun";
$tdatapad_pad_kohir[".addFields"][] = "usaha_id";
$tdatapad_pad_kohir[".addFields"][] = "kohirno";
$tdatapad_pad_kohir[".addFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".addFields"][] = "spt_id";
$tdatapad_pad_kohir[".addFields"][] = "enabled";
$tdatapad_pad_kohir[".addFields"][] = "created";
$tdatapad_pad_kohir[".addFields"][] = "create_uid";
$tdatapad_pad_kohir[".addFields"][] = "updated";
$tdatapad_pad_kohir[".addFields"][] = "update_uid";
$tdatapad_pad_kohir[".addFields"][] = "petugas_id";
$tdatapad_pad_kohir[".addFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".addFields"][] = "type_id";

$tdatapad_pad_kohir[".inlineAddFields"] = array();
$tdatapad_pad_kohir[".inlineAddFields"][] = "tahun";
$tdatapad_pad_kohir[".inlineAddFields"][] = "usaha_id";
$tdatapad_pad_kohir[".inlineAddFields"][] = "kohirno";
$tdatapad_pad_kohir[".inlineAddFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".inlineAddFields"][] = "spt_id";
$tdatapad_pad_kohir[".inlineAddFields"][] = "enabled";
$tdatapad_pad_kohir[".inlineAddFields"][] = "created";
$tdatapad_pad_kohir[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_kohir[".inlineAddFields"][] = "updated";
$tdatapad_pad_kohir[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_kohir[".inlineAddFields"][] = "petugas_id";
$tdatapad_pad_kohir[".inlineAddFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".inlineAddFields"][] = "type_id";

$tdatapad_pad_kohir[".editFields"] = array();
$tdatapad_pad_kohir[".editFields"][] = "tahun";
$tdatapad_pad_kohir[".editFields"][] = "usaha_id";
$tdatapad_pad_kohir[".editFields"][] = "kohirno";
$tdatapad_pad_kohir[".editFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".editFields"][] = "spt_id";
$tdatapad_pad_kohir[".editFields"][] = "enabled";
$tdatapad_pad_kohir[".editFields"][] = "created";
$tdatapad_pad_kohir[".editFields"][] = "create_uid";
$tdatapad_pad_kohir[".editFields"][] = "updated";
$tdatapad_pad_kohir[".editFields"][] = "update_uid";
$tdatapad_pad_kohir[".editFields"][] = "petugas_id";
$tdatapad_pad_kohir[".editFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".editFields"][] = "type_id";

$tdatapad_pad_kohir[".inlineEditFields"] = array();
$tdatapad_pad_kohir[".inlineEditFields"][] = "tahun";
$tdatapad_pad_kohir[".inlineEditFields"][] = "usaha_id";
$tdatapad_pad_kohir[".inlineEditFields"][] = "kohirno";
$tdatapad_pad_kohir[".inlineEditFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".inlineEditFields"][] = "spt_id";
$tdatapad_pad_kohir[".inlineEditFields"][] = "enabled";
$tdatapad_pad_kohir[".inlineEditFields"][] = "created";
$tdatapad_pad_kohir[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_kohir[".inlineEditFields"][] = "updated";
$tdatapad_pad_kohir[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_kohir[".inlineEditFields"][] = "petugas_id";
$tdatapad_pad_kohir[".inlineEditFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".inlineEditFields"][] = "type_id";

$tdatapad_pad_kohir[".exportFields"] = array();
$tdatapad_pad_kohir[".exportFields"][] = "id";
$tdatapad_pad_kohir[".exportFields"][] = "tahun";
$tdatapad_pad_kohir[".exportFields"][] = "usaha_id";
$tdatapad_pad_kohir[".exportFields"][] = "kohirno";
$tdatapad_pad_kohir[".exportFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".exportFields"][] = "spt_id";
$tdatapad_pad_kohir[".exportFields"][] = "enabled";
$tdatapad_pad_kohir[".exportFields"][] = "created";
$tdatapad_pad_kohir[".exportFields"][] = "create_uid";
$tdatapad_pad_kohir[".exportFields"][] = "updated";
$tdatapad_pad_kohir[".exportFields"][] = "update_uid";
$tdatapad_pad_kohir[".exportFields"][] = "petugas_id";
$tdatapad_pad_kohir[".exportFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".exportFields"][] = "type_id";

$tdatapad_pad_kohir[".printFields"] = array();
$tdatapad_pad_kohir[".printFields"][] = "id";
$tdatapad_pad_kohir[".printFields"][] = "tahun";
$tdatapad_pad_kohir[".printFields"][] = "usaha_id";
$tdatapad_pad_kohir[".printFields"][] = "kohirno";
$tdatapad_pad_kohir[".printFields"][] = "kohirtgl";
$tdatapad_pad_kohir[".printFields"][] = "spt_id";
$tdatapad_pad_kohir[".printFields"][] = "enabled";
$tdatapad_pad_kohir[".printFields"][] = "created";
$tdatapad_pad_kohir[".printFields"][] = "create_uid";
$tdatapad_pad_kohir[".printFields"][] = "updated";
$tdatapad_pad_kohir[".printFields"][] = "update_uid";
$tdatapad_pad_kohir[".printFields"][] = "petugas_id";
$tdatapad_pad_kohir[".printFields"][] = "pejabat_id";
$tdatapad_pad_kohir[".printFields"][] = "type_id";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_kohir";
	$fdata["Label"] = "Id"; 
	$fdata["FieldType"] = 20;
	
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
	
		
		
	$tdatapad_pad_kohir["id"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "pad.pad_kohir";
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
	
		
		
	$tdatapad_pad_kohir["tahun"] = $fdata;
//	usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "usaha_id";
	$fdata["GoodName"] = "usaha_id";
	$fdata["ownerTable"] = "pad.pad_kohir";
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
	
		
		
	$tdatapad_pad_kohir["usaha_id"] = $fdata;
//	kohirno
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "kohirno";
	$fdata["GoodName"] = "kohirno";
	$fdata["ownerTable"] = "pad.pad_kohir";
	$fdata["Label"] = "Kohirno"; 
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
	
		$fdata["strField"] = "kohirno"; 
		$fdata["FullName"] = "kohirno";
	
		
		
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
	
		
		
	$tdatapad_pad_kohir["kohirno"] = $fdata;
//	kohirtgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "kohirtgl";
	$fdata["GoodName"] = "kohirtgl";
	$fdata["ownerTable"] = "pad.pad_kohir";
	$fdata["Label"] = "Kohirtgl"; 
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
	
		$fdata["strField"] = "kohirtgl"; 
		$fdata["FullName"] = "kohirtgl";
	
		
		
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

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_kohir["kohirtgl"] = $fdata;
//	spt_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "spt_id";
	$fdata["GoodName"] = "spt_id";
	$fdata["ownerTable"] = "pad.pad_kohir";
	$fdata["Label"] = "Spt Id"; 
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
	
		
		
	$tdatapad_pad_kohir["spt_id"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_kohir";
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
	
		
		
	$tdatapad_pad_kohir["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_kohir";
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
	
		
		
	$tdatapad_pad_kohir["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_kohir";
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
	
		
		
	$tdatapad_pad_kohir["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_kohir";
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
	
		
		
	$tdatapad_pad_kohir["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_kohir";
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
	
		
		
	$tdatapad_pad_kohir["update_uid"] = $fdata;
//	petugas_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "petugas_id";
	$fdata["GoodName"] = "petugas_id";
	$fdata["ownerTable"] = "pad.pad_kohir";
	$fdata["Label"] = "Petugas Id"; 
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
	
		$fdata["strField"] = "petugas_id"; 
		$fdata["FullName"] = "petugas_id";
	
		
		
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
	
		
		
	$tdatapad_pad_kohir["petugas_id"] = $fdata;
//	pejabat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "pejabat_id";
	$fdata["GoodName"] = "pejabat_id";
	$fdata["ownerTable"] = "pad.pad_kohir";
	$fdata["Label"] = "Pejabat Id"; 
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
	
		$fdata["strField"] = "pejabat_id"; 
		$fdata["FullName"] = "pejabat_id";
	
		
		
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
	
		
		
	$tdatapad_pad_kohir["pejabat_id"] = $fdata;
//	type_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "type_id";
	$fdata["GoodName"] = "type_id";
	$fdata["ownerTable"] = "pad.pad_kohir";
	$fdata["Label"] = "Type Id"; 
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
	
		$fdata["strField"] = "type_id"; 
		$fdata["FullName"] = "type_id";
	
		
		
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
	
		
		
	$tdatapad_pad_kohir["type_id"] = $fdata;

	
$tables_data["pad.pad_kohir"]=&$tdatapad_pad_kohir;
$field_labels["pad_pad_kohir"] = &$fieldLabelspad_pad_kohir;
$fieldToolTips["pad.pad_kohir"] = &$fieldToolTipspad_pad_kohir;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_kohir"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_kohir"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_kohir()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tahun,   usaha_id,   kohirno,   kohirtgl,   spt_id,   enabled,   created,   create_uid,   updated,   update_uid,   petugas_id,   pejabat_id,   type_id";
$proto0["m_strFrom"] = "FROM \"pad\".pad_kohir";
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
	"m_strTable" => "pad.pad_kohir"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "pad.pad_kohir"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "usaha_id",
	"m_strTable" => "pad.pad_kohir"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "kohirno",
	"m_strTable" => "pad.pad_kohir"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "kohirtgl",
	"m_strTable" => "pad.pad_kohir"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_id",
	"m_strTable" => "pad.pad_kohir"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_kohir"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_kohir"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_kohir"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_kohir"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_kohir"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "petugas_id",
	"m_strTable" => "pad.pad_kohir"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "pejabat_id",
	"m_strTable" => "pad.pad_kohir"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "type_id",
	"m_strTable" => "pad.pad_kohir"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto33=array();
$proto33["m_link"] = "SQLL_MAIN";
			$proto34=array();
$proto34["m_strName"] = "pad.pad_kohir";
$proto34["m_columns"] = array();
$proto34["m_columns"][] = "id";
$proto34["m_columns"][] = "tahun";
$proto34["m_columns"][] = "usaha_id";
$proto34["m_columns"][] = "kohirno";
$proto34["m_columns"][] = "kohirtgl";
$proto34["m_columns"][] = "spt_id";
$proto34["m_columns"][] = "enabled";
$proto34["m_columns"][] = "created";
$proto34["m_columns"][] = "create_uid";
$proto34["m_columns"][] = "updated";
$proto34["m_columns"][] = "update_uid";
$proto34["m_columns"][] = "petugas_id";
$proto34["m_columns"][] = "pejabat_id";
$proto34["m_columns"][] = "type_id";
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
$queryData_pad_pad_kohir = createSqlQuery_pad_pad_kohir();
														$tdatapad_pad_kohir[".sqlquery"] = $queryData_pad_pad_kohir;
	
if(isset($tdatapad_pad_kohir["field2"])){
	$tdatapad_pad_kohir["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_kohir["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_kohir["field2"]["LookupType"] = 4;
	$tdatapad_pad_kohir["field2"]["LinkField"] = "email";
	$tdatapad_pad_kohir["field2"]["DisplayField"] = "name";
	$tdatapad_pad_kohir[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_kohir"] = new eventsBase;
$tdatapad_pad_kohir[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_kohir");

?>