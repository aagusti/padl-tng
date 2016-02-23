<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_tarif_pajak = array();
	$tdatapad_pad_tarif_pajak[".NumberOfChars"] = 80; 
	$tdatapad_pad_tarif_pajak[".ShortName"] = "pad_pad_tarif_pajak";
	$tdatapad_pad_tarif_pajak[".OwnerID"] = "";
	$tdatapad_pad_tarif_pajak[".OriginalTable"] = "pad.pad_tarif_pajak";

//	field labels
$fieldLabelspad_pad_tarif_pajak = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_tarif_pajak["English"] = array();
	$fieldToolTipspad_pad_tarif_pajak["English"] = array();
	$fieldLabelspad_pad_tarif_pajak["English"]["id"] = "Id";
	$fieldToolTipspad_pad_tarif_pajak["English"]["id"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["pajak_id"] = "Pajak Id";
	$fieldToolTipspad_pad_tarif_pajak["English"]["pajak_id"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["tarif"] = "Tarif";
	$fieldToolTipspad_pad_tarif_pajak["English"]["tarif"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["reklame"] = "Reklame";
	$fieldToolTipspad_pad_tarif_pajak["English"]["reklame"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["minimal_omset"] = "Minimal Omset";
	$fieldToolTipspad_pad_tarif_pajak["English"]["minimal_omset"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_tarif_pajak["English"]["tmt"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_tarif_pajak["English"]["enabled"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["created"] = "Created";
	$fieldToolTipspad_pad_tarif_pajak["English"]["created"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_tarif_pajak["English"]["create_uid"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_tarif_pajak["English"]["updated"] = "";
	$fieldLabelspad_pad_tarif_pajak["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_tarif_pajak["English"]["update_uid"] = "";
	if (count($fieldToolTipspad_pad_tarif_pajak["English"]))
		$tdatapad_pad_tarif_pajak[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_tarif_pajak[".NCSearch"] = true;



$tdatapad_pad_tarif_pajak[".shortTableName"] = "pad_pad_tarif_pajak";
$tdatapad_pad_tarif_pajak[".nSecOptions"] = 0;
$tdatapad_pad_tarif_pajak[".recsPerRowList"] = 1;
$tdatapad_pad_tarif_pajak[".mainTableOwnerID"] = "";
$tdatapad_pad_tarif_pajak[".moveNext"] = 1;
$tdatapad_pad_tarif_pajak[".nType"] = 0;

$tdatapad_pad_tarif_pajak[".strOriginalTableName"] = "pad.pad_tarif_pajak";




$tdatapad_pad_tarif_pajak[".showAddInPopup"] = false;

$tdatapad_pad_tarif_pajak[".showEditInPopup"] = false;

$tdatapad_pad_tarif_pajak[".showViewInPopup"] = false;

$tdatapad_pad_tarif_pajak[".fieldsForRegister"] = array();

$tdatapad_pad_tarif_pajak[".listAjax"] = false;

	$tdatapad_pad_tarif_pajak[".audit"] = false;

	$tdatapad_pad_tarif_pajak[".locking"] = false;

$tdatapad_pad_tarif_pajak[".listIcons"] = true;
$tdatapad_pad_tarif_pajak[".edit"] = true;
$tdatapad_pad_tarif_pajak[".inlineEdit"] = true;
$tdatapad_pad_tarif_pajak[".inlineAdd"] = true;
$tdatapad_pad_tarif_pajak[".view"] = true;

$tdatapad_pad_tarif_pajak[".exportTo"] = true;

$tdatapad_pad_tarif_pajak[".printFriendly"] = true;

$tdatapad_pad_tarif_pajak[".delete"] = true;

$tdatapad_pad_tarif_pajak[".showSimpleSearchOptions"] = false;

$tdatapad_pad_tarif_pajak[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_tarif_pajak[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_tarif_pajak[".isUseAjaxSuggest"] = true;

$tdatapad_pad_tarif_pajak[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_tarif_pajak[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_tarif_pajak[".isUseTimeForSearch"] = false;




$tdatapad_pad_tarif_pajak[".allSearchFields"] = array();

$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "id";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "created";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".allSearchFields"][] = "update_uid";

$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "id";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "created";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".googleLikeFields"][] = "update_uid";


$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "id";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "created";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".advSearchFields"][] = "update_uid";

$tdatapad_pad_tarif_pajak[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_tarif_pajak[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_tarif_pajak[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_tarif_pajak[".orderindexes"] = array();

$tdatapad_pad_tarif_pajak[".sqlHead"] = "SELECT id,   pajak_id,   tarif,   reklame,   minimal_omset,   tmt,   enabled,   created,   create_uid,   updated,   update_uid";
$tdatapad_pad_tarif_pajak[".sqlFrom"] = "FROM \"pad\".pad_tarif_pajak";
$tdatapad_pad_tarif_pajak[".sqlWhereExpr"] = "";
$tdatapad_pad_tarif_pajak[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_tarif_pajak[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_tarif_pajak[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_tarif_pajak = array();
$tableKeyspad_pad_tarif_pajak[] = "id";
$tdatapad_pad_tarif_pajak[".Keys"] = $tableKeyspad_pad_tarif_pajak;

$tdatapad_pad_tarif_pajak[".listFields"] = array();
$tdatapad_pad_tarif_pajak[".listFields"][] = "id";
$tdatapad_pad_tarif_pajak[".listFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".listFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".listFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".listFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".listFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".listFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".listFields"][] = "created";
$tdatapad_pad_tarif_pajak[".listFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".listFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".listFields"][] = "update_uid";

$tdatapad_pad_tarif_pajak[".viewFields"] = array();
$tdatapad_pad_tarif_pajak[".viewFields"][] = "id";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "created";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".viewFields"][] = "update_uid";

$tdatapad_pad_tarif_pajak[".addFields"] = array();
$tdatapad_pad_tarif_pajak[".addFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".addFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".addFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".addFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".addFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".addFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".addFields"][] = "created";
$tdatapad_pad_tarif_pajak[".addFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".addFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".addFields"][] = "update_uid";

$tdatapad_pad_tarif_pajak[".inlineAddFields"] = array();
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "created";
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".inlineAddFields"][] = "update_uid";

$tdatapad_pad_tarif_pajak[".editFields"] = array();
$tdatapad_pad_tarif_pajak[".editFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".editFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".editFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".editFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".editFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".editFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".editFields"][] = "created";
$tdatapad_pad_tarif_pajak[".editFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".editFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".editFields"][] = "update_uid";

$tdatapad_pad_tarif_pajak[".inlineEditFields"] = array();
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "created";
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".inlineEditFields"][] = "update_uid";

$tdatapad_pad_tarif_pajak[".exportFields"] = array();
$tdatapad_pad_tarif_pajak[".exportFields"][] = "id";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "created";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".exportFields"][] = "update_uid";

$tdatapad_pad_tarif_pajak[".printFields"] = array();
$tdatapad_pad_tarif_pajak[".printFields"][] = "id";
$tdatapad_pad_tarif_pajak[".printFields"][] = "pajak_id";
$tdatapad_pad_tarif_pajak[".printFields"][] = "tarif";
$tdatapad_pad_tarif_pajak[".printFields"][] = "reklame";
$tdatapad_pad_tarif_pajak[".printFields"][] = "minimal_omset";
$tdatapad_pad_tarif_pajak[".printFields"][] = "tmt";
$tdatapad_pad_tarif_pajak[".printFields"][] = "enabled";
$tdatapad_pad_tarif_pajak[".printFields"][] = "created";
$tdatapad_pad_tarif_pajak[".printFields"][] = "create_uid";
$tdatapad_pad_tarif_pajak[".printFields"][] = "updated";
$tdatapad_pad_tarif_pajak[".printFields"][] = "update_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
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
	
		
		
	$tdatapad_pad_tarif_pajak["id"] = $fdata;
//	pajak_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "pajak_id";
	$fdata["GoodName"] = "pajak_id";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
	$fdata["Label"] = "Pajak Id"; 
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
	
		$fdata["strField"] = "pajak_id"; 
		$fdata["FullName"] = "pajak_id";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "id";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad.pad_jenis_pajak";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_tarif_pajak["pajak_id"] = $fdata;
//	tarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "tarif";
	$fdata["GoodName"] = "tarif";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
	$fdata["Label"] = "Tarif"; 
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
	
		$fdata["strField"] = "tarif"; 
		$fdata["FullName"] = "tarif";
	
		
		
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
	
		
		
	$tdatapad_pad_tarif_pajak["tarif"] = $fdata;
//	reklame
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "reklame";
	$fdata["GoodName"] = "reklame";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
	$fdata["Label"] = "Reklame"; 
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
	
		$fdata["strField"] = "reklame"; 
		$fdata["FullName"] = "reklame";
	
		
		
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
	
		
		
	$tdatapad_pad_tarif_pajak["reklame"] = $fdata;
//	minimal_omset
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "minimal_omset";
	$fdata["GoodName"] = "minimal_omset";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
	$fdata["Label"] = "Minimal Omset"; 
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
	
		$fdata["strField"] = "minimal_omset"; 
		$fdata["FullName"] = "minimal_omset";
	
		
		
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
	
		
		
	$tdatapad_pad_tarif_pajak["minimal_omset"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
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
	
		
		
	$tdatapad_pad_tarif_pajak["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
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
	
		
		
	$tdatapad_pad_tarif_pajak["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
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
	
		
		
	$tdatapad_pad_tarif_pajak["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
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
	
		
		
	$tdatapad_pad_tarif_pajak["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
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
	
		
		
	$tdatapad_pad_tarif_pajak["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_tarif_pajak";
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
	
		
		
	$tdatapad_pad_tarif_pajak["update_uid"] = $fdata;

	
$tables_data["pad.pad_tarif_pajak"]=&$tdatapad_pad_tarif_pajak;
$field_labels["pad_pad_tarif_pajak"] = &$fieldLabelspad_pad_tarif_pajak;
$fieldToolTips["pad.pad_tarif_pajak"] = &$fieldToolTipspad_pad_tarif_pajak;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_tarif_pajak"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_tarif_pajak"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_jenis_pajak";
	$masterParams["mDataSourceTable"]="pad.pad_jenis_pajak";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_jenis_pajak";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_tarif_pajak"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_tarif_pajak"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_tarif_pajak"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_tarif_pajak"][$mIndex]["detailKeys"][]="pajak_id";
		$masterTablesData["pad.pad_tarif_pajak"][$mIndex]["detailKeys"][]="pajak_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_tarif_pajak()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   pajak_id,   tarif,   reklame,   minimal_omset,   tmt,   enabled,   created,   create_uid,   updated,   update_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_tarif_pajak";
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
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "pajak_id",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "tarif",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "reklame",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "minimal_omset",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_tarif_pajak"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "pad.pad_tarif_pajak";
$proto28["m_columns"] = array();
$proto28["m_columns"][] = "id";
$proto28["m_columns"][] = "pajak_id";
$proto28["m_columns"][] = "tarif";
$proto28["m_columns"][] = "reklame";
$proto28["m_columns"][] = "minimal_omset";
$proto28["m_columns"][] = "tmt";
$proto28["m_columns"][] = "enabled";
$proto28["m_columns"][] = "created";
$proto28["m_columns"][] = "create_uid";
$proto28["m_columns"][] = "updated";
$proto28["m_columns"][] = "update_uid";
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
$queryData_pad_pad_tarif_pajak = createSqlQuery_pad_pad_tarif_pajak();
											$tdatapad_pad_tarif_pajak[".sqlquery"] = $queryData_pad_pad_tarif_pajak;
	
if(isset($tdatapad_pad_tarif_pajak["field2"])){
	$tdatapad_pad_tarif_pajak["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_tarif_pajak["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_tarif_pajak["field2"]["LookupType"] = 4;
	$tdatapad_pad_tarif_pajak["field2"]["LinkField"] = "email";
	$tdatapad_pad_tarif_pajak["field2"]["DisplayField"] = "name";
	$tdatapad_pad_tarif_pajak[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_tarif_pajak"] = new eventsBase;
$tdatapad_pad_tarif_pajak[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_tarif_pajak");

?>