<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_reklame_media = array();
	$tdatapad_pad_reklame_media[".NumberOfChars"] = 80; 
	$tdatapad_pad_reklame_media[".ShortName"] = "pad_pad_reklame_media";
	$tdatapad_pad_reklame_media[".OwnerID"] = "";
	$tdatapad_pad_reklame_media[".OriginalTable"] = "pad.pad_reklame_media";

//	field labels
$fieldLabelspad_pad_reklame_media = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_reklame_media["English"] = array();
	$fieldToolTipspad_pad_reklame_media["English"] = array();
	$fieldLabelspad_pad_reklame_media["English"]["id"] = "Id";
	$fieldToolTipspad_pad_reklame_media["English"]["id"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["jenis_pajak_id"] = "Jenis Pajak Id";
	$fieldToolTipspad_pad_reklame_media["English"]["jenis_pajak_id"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["media"] = "Media";
	$fieldToolTipspad_pad_reklame_media["English"]["media"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["singkatan"] = "Singkatan";
	$fieldToolTipspad_pad_reklame_media["English"]["singkatan"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["masa"] = "Masa";
	$fieldToolTipspad_pad_reklame_media["English"]["masa"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["keterangan"] = "Keterangan";
	$fieldToolTipspad_pad_reklame_media["English"]["keterangan"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_reklame_media["English"]["enabled"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_reklame_media["English"]["update_uid"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_reklame_media["English"]["create_uid"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_reklame_media["English"]["updated"] = "";
	$fieldLabelspad_pad_reklame_media["English"]["created"] = "Created";
	$fieldToolTipspad_pad_reklame_media["English"]["created"] = "";
	if (count($fieldToolTipspad_pad_reklame_media["English"]))
		$tdatapad_pad_reklame_media[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_reklame_media[".NCSearch"] = true;



$tdatapad_pad_reklame_media[".shortTableName"] = "pad_pad_reklame_media";
$tdatapad_pad_reklame_media[".nSecOptions"] = 0;
$tdatapad_pad_reklame_media[".recsPerRowList"] = 1;
$tdatapad_pad_reklame_media[".mainTableOwnerID"] = "";
$tdatapad_pad_reklame_media[".moveNext"] = 1;
$tdatapad_pad_reklame_media[".nType"] = 0;

$tdatapad_pad_reklame_media[".strOriginalTableName"] = "pad.pad_reklame_media";




$tdatapad_pad_reklame_media[".showAddInPopup"] = false;

$tdatapad_pad_reklame_media[".showEditInPopup"] = false;

$tdatapad_pad_reklame_media[".showViewInPopup"] = false;

$tdatapad_pad_reklame_media[".fieldsForRegister"] = array();

$tdatapad_pad_reklame_media[".listAjax"] = false;

	$tdatapad_pad_reklame_media[".audit"] = false;

	$tdatapad_pad_reklame_media[".locking"] = false;

$tdatapad_pad_reklame_media[".listIcons"] = true;
$tdatapad_pad_reklame_media[".edit"] = true;
$tdatapad_pad_reklame_media[".inlineEdit"] = true;
$tdatapad_pad_reklame_media[".inlineAdd"] = true;
$tdatapad_pad_reklame_media[".view"] = true;

$tdatapad_pad_reklame_media[".exportTo"] = true;

$tdatapad_pad_reklame_media[".printFriendly"] = true;

$tdatapad_pad_reklame_media[".delete"] = true;

$tdatapad_pad_reklame_media[".showSimpleSearchOptions"] = false;

$tdatapad_pad_reklame_media[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_reklame_media[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_reklame_media[".isUseAjaxSuggest"] = true;

$tdatapad_pad_reklame_media[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_reklame_media[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_reklame_media[".isUseTimeForSearch"] = false;




$tdatapad_pad_reklame_media[".allSearchFields"] = array();

$tdatapad_pad_reklame_media[".allSearchFields"][] = "id";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "media";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "masa";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "enabled";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "updated";
$tdatapad_pad_reklame_media[".allSearchFields"][] = "created";

$tdatapad_pad_reklame_media[".googleLikeFields"][] = "id";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "media";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "masa";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "enabled";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "updated";
$tdatapad_pad_reklame_media[".googleLikeFields"][] = "created";


$tdatapad_pad_reklame_media[".advSearchFields"][] = "id";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "media";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "masa";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "enabled";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "updated";
$tdatapad_pad_reklame_media[".advSearchFields"][] = "created";

$tdatapad_pad_reklame_media[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_reklame_media[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_reklame_media[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_reklame_media[".orderindexes"] = array();

$tdatapad_pad_reklame_media[".sqlHead"] = "SELECT id,   jenis_pajak_id,   media,   singkatan,   masa,   keterangan,   enabled,   update_uid,   create_uid,   updated,   created";
$tdatapad_pad_reklame_media[".sqlFrom"] = "FROM \"pad\".pad_reklame_media";
$tdatapad_pad_reklame_media[".sqlWhereExpr"] = "";
$tdatapad_pad_reklame_media[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_reklame_media[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_reklame_media[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_reklame_media = array();
$tableKeyspad_pad_reklame_media[] = "id";
$tdatapad_pad_reklame_media[".Keys"] = $tableKeyspad_pad_reklame_media;

$tdatapad_pad_reklame_media[".listFields"] = array();
$tdatapad_pad_reklame_media[".listFields"][] = "id";
$tdatapad_pad_reklame_media[".listFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".listFields"][] = "media";
$tdatapad_pad_reklame_media[".listFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".listFields"][] = "masa";
$tdatapad_pad_reklame_media[".listFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".listFields"][] = "enabled";
$tdatapad_pad_reklame_media[".listFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".listFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".listFields"][] = "updated";
$tdatapad_pad_reklame_media[".listFields"][] = "created";

$tdatapad_pad_reklame_media[".viewFields"] = array();
$tdatapad_pad_reklame_media[".viewFields"][] = "id";
$tdatapad_pad_reklame_media[".viewFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".viewFields"][] = "media";
$tdatapad_pad_reklame_media[".viewFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".viewFields"][] = "masa";
$tdatapad_pad_reklame_media[".viewFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".viewFields"][] = "enabled";
$tdatapad_pad_reklame_media[".viewFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".viewFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".viewFields"][] = "updated";
$tdatapad_pad_reklame_media[".viewFields"][] = "created";

$tdatapad_pad_reklame_media[".addFields"] = array();
$tdatapad_pad_reklame_media[".addFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".addFields"][] = "media";
$tdatapad_pad_reklame_media[".addFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".addFields"][] = "masa";
$tdatapad_pad_reklame_media[".addFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".addFields"][] = "enabled";
$tdatapad_pad_reklame_media[".addFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".addFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".addFields"][] = "updated";
$tdatapad_pad_reklame_media[".addFields"][] = "created";

$tdatapad_pad_reklame_media[".inlineAddFields"] = array();
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "media";
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "masa";
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "enabled";
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "updated";
$tdatapad_pad_reklame_media[".inlineAddFields"][] = "created";

$tdatapad_pad_reklame_media[".editFields"] = array();
$tdatapad_pad_reklame_media[".editFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".editFields"][] = "media";
$tdatapad_pad_reklame_media[".editFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".editFields"][] = "masa";
$tdatapad_pad_reklame_media[".editFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".editFields"][] = "enabled";
$tdatapad_pad_reklame_media[".editFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".editFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".editFields"][] = "updated";
$tdatapad_pad_reklame_media[".editFields"][] = "created";

$tdatapad_pad_reklame_media[".inlineEditFields"] = array();
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "media";
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "masa";
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "enabled";
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "updated";
$tdatapad_pad_reklame_media[".inlineEditFields"][] = "created";

$tdatapad_pad_reklame_media[".exportFields"] = array();
$tdatapad_pad_reklame_media[".exportFields"][] = "id";
$tdatapad_pad_reklame_media[".exportFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".exportFields"][] = "media";
$tdatapad_pad_reklame_media[".exportFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".exportFields"][] = "masa";
$tdatapad_pad_reklame_media[".exportFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".exportFields"][] = "enabled";
$tdatapad_pad_reklame_media[".exportFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".exportFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".exportFields"][] = "updated";
$tdatapad_pad_reklame_media[".exportFields"][] = "created";

$tdatapad_pad_reklame_media[".printFields"] = array();
$tdatapad_pad_reklame_media[".printFields"][] = "id";
$tdatapad_pad_reklame_media[".printFields"][] = "jenis_pajak_id";
$tdatapad_pad_reklame_media[".printFields"][] = "media";
$tdatapad_pad_reklame_media[".printFields"][] = "singkatan";
$tdatapad_pad_reklame_media[".printFields"][] = "masa";
$tdatapad_pad_reklame_media[".printFields"][] = "keterangan";
$tdatapad_pad_reklame_media[".printFields"][] = "enabled";
$tdatapad_pad_reklame_media[".printFields"][] = "update_uid";
$tdatapad_pad_reklame_media[".printFields"][] = "create_uid";
$tdatapad_pad_reklame_media[".printFields"][] = "updated";
$tdatapad_pad_reklame_media[".printFields"][] = "created";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
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
	
		
		
	$tdatapad_pad_reklame_media["id"] = $fdata;
//	jenis_pajak_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "jenis_pajak_id";
	$fdata["GoodName"] = "jenis_pajak_id";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
	$fdata["Label"] = "Jenis Pajak Id"; 
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
	
		$fdata["strField"] = "jenis_pajak_id"; 
		$fdata["FullName"] = "jenis_pajak_id";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_media["jenis_pajak_id"] = $fdata;
//	media
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "media";
	$fdata["GoodName"] = "media";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
	$fdata["Label"] = "Media"; 
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
	
		$fdata["strField"] = "media"; 
		$fdata["FullName"] = "media";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_media["media"] = $fdata;
//	singkatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "singkatan";
	$fdata["GoodName"] = "singkatan";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
	$fdata["Label"] = "Singkatan"; 
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
	
		$fdata["strField"] = "singkatan"; 
		$fdata["FullName"] = "singkatan";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_media["singkatan"] = $fdata;
//	masa
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "masa";
	$fdata["GoodName"] = "masa";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
	$fdata["Label"] = "Masa"; 
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
	
		$fdata["strField"] = "masa"; 
		$fdata["FullName"] = "masa";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_media["masa"] = $fdata;
//	keterangan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "keterangan";
	$fdata["GoodName"] = "keterangan";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
	$fdata["Label"] = "Keterangan"; 
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
	
		$fdata["strField"] = "keterangan"; 
		$fdata["FullName"] = "keterangan";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_media["keterangan"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
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
	
		
		
	$tdatapad_pad_reklame_media["enabled"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
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
	
		
		
	$tdatapad_pad_reklame_media["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
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
	
		
		
	$tdatapad_pad_reklame_media["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
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
	
		
		
	$tdatapad_pad_reklame_media["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_reklame_media";
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
	
		
		
	$tdatapad_pad_reklame_media["created"] = $fdata;

	
$tables_data["pad.pad_reklame_media"]=&$tdatapad_pad_reklame_media;
$field_labels["pad_pad_reklame_media"] = &$fieldLabelspad_pad_reklame_media;
$fieldToolTips["pad.pad_reklame_media"] = &$fieldToolTipspad_pad_reklame_media;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_reklame_media"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_reklame_media"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_reklame_media()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   jenis_pajak_id,   media,   singkatan,   masa,   keterangan,   enabled,   update_uid,   create_uid,   updated,   created";
$proto0["m_strFrom"] = "FROM \"pad\".pad_reklame_media";
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
	"m_strTable" => "pad.pad_reklame_media"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "jenis_pajak_id",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "media",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "singkatan",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "masa",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_reklame_media"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "pad.pad_reklame_media";
$proto28["m_columns"] = array();
$proto28["m_columns"][] = "id";
$proto28["m_columns"][] = "jenis_pajak_id";
$proto28["m_columns"][] = "media";
$proto28["m_columns"][] = "singkatan";
$proto28["m_columns"][] = "masa";
$proto28["m_columns"][] = "keterangan";
$proto28["m_columns"][] = "enabled";
$proto28["m_columns"][] = "update_uid";
$proto28["m_columns"][] = "create_uid";
$proto28["m_columns"][] = "updated";
$proto28["m_columns"][] = "created";
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
$queryData_pad_pad_reklame_media = createSqlQuery_pad_pad_reklame_media();
											$tdatapad_pad_reklame_media[".sqlquery"] = $queryData_pad_pad_reklame_media;
	
if(isset($tdatapad_pad_reklame_media["field2"])){
	$tdatapad_pad_reklame_media["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_reklame_media["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_reklame_media["field2"]["LookupType"] = 4;
	$tdatapad_pad_reklame_media["field2"]["LinkField"] = "email";
	$tdatapad_pad_reklame_media["field2"]["DisplayField"] = "name";
	$tdatapad_pad_reklame_media[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_reklame_media"] = new eventsBase;
$tdatapad_pad_reklame_media[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_reklame_media");

?>