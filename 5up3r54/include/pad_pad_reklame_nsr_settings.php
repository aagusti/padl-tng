<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_reklame_nsr = array();
	$tdatapad_pad_reklame_nsr[".NumberOfChars"] = 80; 
	$tdatapad_pad_reklame_nsr[".ShortName"] = "pad_pad_reklame_nsr";
	$tdatapad_pad_reklame_nsr[".OwnerID"] = "";
	$tdatapad_pad_reklame_nsr[".OriginalTable"] = "pad.pad_reklame_nsr";

//	field labels
$fieldLabelspad_pad_reklame_nsr = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_reklame_nsr["English"] = array();
	$fieldToolTipspad_pad_reklame_nsr["English"] = array();
	$fieldLabelspad_pad_reklame_nsr["English"]["id"] = "Id";
	$fieldToolTipspad_pad_reklame_nsr["English"]["id"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["kelas_jalan_id"] = "Kelas Jalan Id";
	$fieldToolTipspad_pad_reklame_nsr["English"]["kelas_jalan_id"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["media_id"] = "Media Id";
	$fieldToolTipspad_pad_reklame_nsr["English"]["media_id"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["satuan"] = "Satuan";
	$fieldToolTipspad_pad_reklame_nsr["English"]["satuan"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["njopr"] = "Njopr";
	$fieldToolTipspad_pad_reklame_nsr["English"]["njopr"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["nspr"] = "Nspr";
	$fieldToolTipspad_pad_reklame_nsr["English"]["nspr"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["nsr"] = "Nsr";
	$fieldToolTipspad_pad_reklame_nsr["English"]["nsr"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_reklame_nsr["English"]["tmt"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_reklame_nsr["English"]["enabled"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_reklame_nsr["English"]["update_uid"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_reklame_nsr["English"]["create_uid"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_reklame_nsr["English"]["updated"] = "";
	$fieldLabelspad_pad_reklame_nsr["English"]["created"] = "Created";
	$fieldToolTipspad_pad_reklame_nsr["English"]["created"] = "";
	if (count($fieldToolTipspad_pad_reklame_nsr["English"]))
		$tdatapad_pad_reklame_nsr[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_reklame_nsr[".NCSearch"] = true;



$tdatapad_pad_reklame_nsr[".shortTableName"] = "pad_pad_reklame_nsr";
$tdatapad_pad_reklame_nsr[".nSecOptions"] = 0;
$tdatapad_pad_reklame_nsr[".recsPerRowList"] = 1;
$tdatapad_pad_reklame_nsr[".mainTableOwnerID"] = "";
$tdatapad_pad_reklame_nsr[".moveNext"] = 1;
$tdatapad_pad_reklame_nsr[".nType"] = 0;

$tdatapad_pad_reklame_nsr[".strOriginalTableName"] = "pad.pad_reklame_nsr";




$tdatapad_pad_reklame_nsr[".showAddInPopup"] = false;

$tdatapad_pad_reklame_nsr[".showEditInPopup"] = false;

$tdatapad_pad_reklame_nsr[".showViewInPopup"] = false;

$tdatapad_pad_reklame_nsr[".fieldsForRegister"] = array();

$tdatapad_pad_reklame_nsr[".listAjax"] = false;

	$tdatapad_pad_reklame_nsr[".audit"] = false;

	$tdatapad_pad_reklame_nsr[".locking"] = false;

$tdatapad_pad_reklame_nsr[".listIcons"] = true;
$tdatapad_pad_reklame_nsr[".edit"] = true;
$tdatapad_pad_reklame_nsr[".inlineEdit"] = true;
$tdatapad_pad_reklame_nsr[".inlineAdd"] = true;
$tdatapad_pad_reklame_nsr[".view"] = true;

$tdatapad_pad_reklame_nsr[".exportTo"] = true;

$tdatapad_pad_reklame_nsr[".printFriendly"] = true;

$tdatapad_pad_reklame_nsr[".delete"] = true;

$tdatapad_pad_reklame_nsr[".showSimpleSearchOptions"] = false;

$tdatapad_pad_reklame_nsr[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_reklame_nsr[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_reklame_nsr[".isUseAjaxSuggest"] = true;

$tdatapad_pad_reklame_nsr[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_reklame_nsr[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_reklame_nsr[".isUseTimeForSearch"] = false;




$tdatapad_pad_reklame_nsr[".allSearchFields"] = array();

$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "id";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".allSearchFields"][] = "created";

$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "id";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".googleLikeFields"][] = "created";


$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "id";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".advSearchFields"][] = "created";

$tdatapad_pad_reklame_nsr[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_reklame_nsr[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_reklame_nsr[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_reklame_nsr[".orderindexes"] = array();

$tdatapad_pad_reklame_nsr[".sqlHead"] = "SELECT id,   kelas_jalan_id,   media_id,   satuan,   njopr,   nspr,   nsr,   tmt,   enabled,   update_uid,   create_uid,   updated,   created";
$tdatapad_pad_reklame_nsr[".sqlFrom"] = "FROM \"pad\".pad_reklame_nsr";
$tdatapad_pad_reklame_nsr[".sqlWhereExpr"] = "";
$tdatapad_pad_reklame_nsr[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_reklame_nsr[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_reklame_nsr[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_reklame_nsr = array();
$tableKeyspad_pad_reklame_nsr[] = "id";
$tdatapad_pad_reklame_nsr[".Keys"] = $tableKeyspad_pad_reklame_nsr;

$tdatapad_pad_reklame_nsr[".listFields"] = array();
$tdatapad_pad_reklame_nsr[".listFields"][] = "id";
$tdatapad_pad_reklame_nsr[".listFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".listFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".listFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".listFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".listFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".listFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".listFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".listFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".listFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".listFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".listFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".listFields"][] = "created";

$tdatapad_pad_reklame_nsr[".viewFields"] = array();
$tdatapad_pad_reklame_nsr[".viewFields"][] = "id";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".viewFields"][] = "created";

$tdatapad_pad_reklame_nsr[".addFields"] = array();
$tdatapad_pad_reklame_nsr[".addFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".addFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".addFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".addFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".addFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".addFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".addFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".addFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".addFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".addFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".addFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".addFields"][] = "created";

$tdatapad_pad_reklame_nsr[".inlineAddFields"] = array();
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".inlineAddFields"][] = "created";

$tdatapad_pad_reklame_nsr[".editFields"] = array();
$tdatapad_pad_reklame_nsr[".editFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".editFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".editFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".editFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".editFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".editFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".editFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".editFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".editFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".editFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".editFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".editFields"][] = "created";

$tdatapad_pad_reklame_nsr[".inlineEditFields"] = array();
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".inlineEditFields"][] = "created";

$tdatapad_pad_reklame_nsr[".exportFields"] = array();
$tdatapad_pad_reklame_nsr[".exportFields"][] = "id";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".exportFields"][] = "created";

$tdatapad_pad_reklame_nsr[".printFields"] = array();
$tdatapad_pad_reklame_nsr[".printFields"][] = "id";
$tdatapad_pad_reklame_nsr[".printFields"][] = "kelas_jalan_id";
$tdatapad_pad_reklame_nsr[".printFields"][] = "media_id";
$tdatapad_pad_reklame_nsr[".printFields"][] = "satuan";
$tdatapad_pad_reklame_nsr[".printFields"][] = "njopr";
$tdatapad_pad_reklame_nsr[".printFields"][] = "nspr";
$tdatapad_pad_reklame_nsr[".printFields"][] = "nsr";
$tdatapad_pad_reklame_nsr[".printFields"][] = "tmt";
$tdatapad_pad_reklame_nsr[".printFields"][] = "enabled";
$tdatapad_pad_reklame_nsr[".printFields"][] = "update_uid";
$tdatapad_pad_reklame_nsr[".printFields"][] = "create_uid";
$tdatapad_pad_reklame_nsr[".printFields"][] = "updated";
$tdatapad_pad_reklame_nsr[".printFields"][] = "created";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
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
	
		
		
	$tdatapad_pad_reklame_nsr["id"] = $fdata;
//	kelas_jalan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "kelas_jalan_id";
	$fdata["GoodName"] = "kelas_jalan_id";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
	$fdata["Label"] = "Kelas Jalan Id"; 
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
	
		$fdata["strField"] = "kelas_jalan_id"; 
		$fdata["FullName"] = "kelas_jalan_id";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_nsr["kelas_jalan_id"] = $fdata;
//	media_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "media_id";
	$fdata["GoodName"] = "media_id";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
	$fdata["Label"] = "Media Id"; 
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
	
		$fdata["strField"] = "media_id"; 
		$fdata["FullName"] = "media_id";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_nsr["media_id"] = $fdata;
//	satuan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "satuan";
	$fdata["GoodName"] = "satuan";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
	$fdata["Label"] = "Satuan"; 
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
	
		$fdata["strField"] = "satuan"; 
		$fdata["FullName"] = "satuan";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_nsr["satuan"] = $fdata;
//	njopr
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "njopr";
	$fdata["GoodName"] = "njopr";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
	$fdata["Label"] = "Njopr"; 
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
	
		$fdata["strField"] = "njopr"; 
		$fdata["FullName"] = "njopr";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_nsr["njopr"] = $fdata;
//	nspr
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "nspr";
	$fdata["GoodName"] = "nspr";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
	$fdata["Label"] = "Nspr"; 
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
	
		$fdata["strField"] = "nspr"; 
		$fdata["FullName"] = "nspr";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_nsr["nspr"] = $fdata;
//	nsr
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "nsr";
	$fdata["GoodName"] = "nsr";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
	$fdata["Label"] = "Nsr"; 
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
	
		$fdata["strField"] = "nsr"; 
		$fdata["FullName"] = "nsr";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_nsr["nsr"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
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
	
		
		
	$tdatapad_pad_reklame_nsr["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
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
	
		
		
	$tdatapad_pad_reklame_nsr["enabled"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
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
	
		
		
	$tdatapad_pad_reklame_nsr["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
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
	
		
		
	$tdatapad_pad_reklame_nsr["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
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
	
		
		
	$tdatapad_pad_reklame_nsr["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_reklame_nsr";
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
	
		
		
	$tdatapad_pad_reklame_nsr["created"] = $fdata;

	
$tables_data["pad.pad_reklame_nsr"]=&$tdatapad_pad_reklame_nsr;
$field_labels["pad_pad_reklame_nsr"] = &$fieldLabelspad_pad_reklame_nsr;
$fieldToolTips["pad.pad_reklame_nsr"] = &$fieldToolTipspad_pad_reklame_nsr;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_reklame_nsr"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_reklame_nsr"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_reklame_nsr()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   kelas_jalan_id,   media_id,   satuan,   njopr,   nspr,   nsr,   tmt,   enabled,   update_uid,   create_uid,   updated,   created";
$proto0["m_strFrom"] = "FROM \"pad\".pad_reklame_nsr";
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
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "kelas_jalan_id",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "media_id",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "satuan",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "njopr",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "nspr",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "nsr",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_reklame_nsr"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto31=array();
$proto31["m_link"] = "SQLL_MAIN";
			$proto32=array();
$proto32["m_strName"] = "pad.pad_reklame_nsr";
$proto32["m_columns"] = array();
$proto32["m_columns"][] = "id";
$proto32["m_columns"][] = "kelas_jalan_id";
$proto32["m_columns"][] = "media_id";
$proto32["m_columns"][] = "satuan";
$proto32["m_columns"][] = "njopr";
$proto32["m_columns"][] = "nspr";
$proto32["m_columns"][] = "nsr";
$proto32["m_columns"][] = "tmt";
$proto32["m_columns"][] = "enabled";
$proto32["m_columns"][] = "update_uid";
$proto32["m_columns"][] = "create_uid";
$proto32["m_columns"][] = "updated";
$proto32["m_columns"][] = "created";
$obj = new SQLTable($proto32);

$proto31["m_table"] = $obj;
$proto31["m_alias"] = "";
$proto33=array();
$proto33["m_sql"] = "";
$proto33["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto33["m_column"]=$obj;
$proto33["m_contained"] = array();
$proto33["m_strCase"] = "";
$proto33["m_havingmode"] = "0";
$proto33["m_inBrackets"] = "0";
$proto33["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto33);

$proto31["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto31);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_reklame_nsr = createSqlQuery_pad_pad_reklame_nsr();
													$tdatapad_pad_reklame_nsr[".sqlquery"] = $queryData_pad_pad_reklame_nsr;
	
if(isset($tdatapad_pad_reklame_nsr["field2"])){
	$tdatapad_pad_reklame_nsr["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_reklame_nsr["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_reklame_nsr["field2"]["LookupType"] = 4;
	$tdatapad_pad_reklame_nsr["field2"]["LinkField"] = "email";
	$tdatapad_pad_reklame_nsr["field2"]["DisplayField"] = "name";
	$tdatapad_pad_reklame_nsr[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_reklame_nsr"] = new eventsBase;
$tdatapad_pad_reklame_nsr[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_reklame_nsr");

?>