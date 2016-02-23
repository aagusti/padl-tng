<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_air_hda = array();
	$tdatapad_pad_air_hda[".NumberOfChars"] = 80; 
	$tdatapad_pad_air_hda[".ShortName"] = "pad_pad_air_hda";
	$tdatapad_pad_air_hda[".OwnerID"] = "";
	$tdatapad_pad_air_hda[".OriginalTable"] = "pad.pad_air_hda";

//	field labels
$fieldLabelspad_pad_air_hda = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_air_hda["English"] = array();
	$fieldToolTipspad_pad_air_hda["English"] = array();
	$fieldLabelspad_pad_air_hda["English"]["id"] = "Id";
	$fieldToolTipspad_pad_air_hda["English"]["id"] = "";
	$fieldLabelspad_pad_air_hda["English"]["zona_id"] = "Zona Id";
	$fieldToolTipspad_pad_air_hda["English"]["zona_id"] = "";
	$fieldLabelspad_pad_air_hda["English"]["manfaat_id"] = "Manfaat Id";
	$fieldToolTipspad_pad_air_hda["English"]["manfaat_id"] = "";
	$fieldLabelspad_pad_air_hda["English"]["volume"] = "Volume";
	$fieldToolTipspad_pad_air_hda["English"]["volume"] = "";
	$fieldLabelspad_pad_air_hda["English"]["hda"] = "Hda";
	$fieldToolTipspad_pad_air_hda["English"]["hda"] = "";
	$fieldLabelspad_pad_air_hda["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_air_hda["English"]["create_uid"] = "";
	$fieldLabelspad_pad_air_hda["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_air_hda["English"]["update_uid"] = "";
	$fieldLabelspad_pad_air_hda["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_air_hda["English"]["updated"] = "";
	$fieldLabelspad_pad_air_hda["English"]["created"] = "Created";
	$fieldToolTipspad_pad_air_hda["English"]["created"] = "";
	$fieldLabelspad_pad_air_hda["English"]["kelompok_usaha_id"] = "Kelompok Usaha Id";
	$fieldToolTipspad_pad_air_hda["English"]["kelompok_usaha_id"] = "";
	$fieldLabelspad_pad_air_hda["English"]["golongan"] = "Golongan";
	$fieldToolTipspad_pad_air_hda["English"]["golongan"] = "";
	$fieldLabelspad_pad_air_hda["English"]["id_old3"] = "Id Old3";
	$fieldToolTipspad_pad_air_hda["English"]["id_old3"] = "";
	if (count($fieldToolTipspad_pad_air_hda["English"]))
		$tdatapad_pad_air_hda[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_air_hda[".NCSearch"] = true;



$tdatapad_pad_air_hda[".shortTableName"] = "pad_pad_air_hda";
$tdatapad_pad_air_hda[".nSecOptions"] = 0;
$tdatapad_pad_air_hda[".recsPerRowList"] = 1;
$tdatapad_pad_air_hda[".mainTableOwnerID"] = "";
$tdatapad_pad_air_hda[".moveNext"] = 1;
$tdatapad_pad_air_hda[".nType"] = 0;

$tdatapad_pad_air_hda[".strOriginalTableName"] = "pad.pad_air_hda";




$tdatapad_pad_air_hda[".showAddInPopup"] = false;

$tdatapad_pad_air_hda[".showEditInPopup"] = false;

$tdatapad_pad_air_hda[".showViewInPopup"] = false;

$tdatapad_pad_air_hda[".fieldsForRegister"] = array();

$tdatapad_pad_air_hda[".listAjax"] = false;

	$tdatapad_pad_air_hda[".audit"] = false;

	$tdatapad_pad_air_hda[".locking"] = false;

$tdatapad_pad_air_hda[".listIcons"] = true;
$tdatapad_pad_air_hda[".edit"] = true;
$tdatapad_pad_air_hda[".inlineEdit"] = true;
$tdatapad_pad_air_hda[".inlineAdd"] = true;
$tdatapad_pad_air_hda[".view"] = true;



$tdatapad_pad_air_hda[".delete"] = true;

$tdatapad_pad_air_hda[".showSimpleSearchOptions"] = false;

$tdatapad_pad_air_hda[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_air_hda[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_air_hda[".isUseAjaxSuggest"] = true;

$tdatapad_pad_air_hda[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_air_hda[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_air_hda[".isUseTimeForSearch"] = false;




$tdatapad_pad_air_hda[".allSearchFields"] = array();

$tdatapad_pad_air_hda[".allSearchFields"][] = "id";
$tdatapad_pad_air_hda[".allSearchFields"][] = "zona_id";
$tdatapad_pad_air_hda[".allSearchFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".allSearchFields"][] = "volume";
$tdatapad_pad_air_hda[".allSearchFields"][] = "hda";
$tdatapad_pad_air_hda[".allSearchFields"][] = "create_uid";
$tdatapad_pad_air_hda[".allSearchFields"][] = "update_uid";
$tdatapad_pad_air_hda[".allSearchFields"][] = "updated";
$tdatapad_pad_air_hda[".allSearchFields"][] = "created";
$tdatapad_pad_air_hda[".allSearchFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".allSearchFields"][] = "golongan";
$tdatapad_pad_air_hda[".allSearchFields"][] = "id_old3";

$tdatapad_pad_air_hda[".googleLikeFields"][] = "id";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "zona_id";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "volume";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "hda";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "updated";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "created";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "golongan";
$tdatapad_pad_air_hda[".googleLikeFields"][] = "id_old3";


$tdatapad_pad_air_hda[".advSearchFields"][] = "id";
$tdatapad_pad_air_hda[".advSearchFields"][] = "zona_id";
$tdatapad_pad_air_hda[".advSearchFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".advSearchFields"][] = "volume";
$tdatapad_pad_air_hda[".advSearchFields"][] = "hda";
$tdatapad_pad_air_hda[".advSearchFields"][] = "create_uid";
$tdatapad_pad_air_hda[".advSearchFields"][] = "update_uid";
$tdatapad_pad_air_hda[".advSearchFields"][] = "updated";
$tdatapad_pad_air_hda[".advSearchFields"][] = "created";
$tdatapad_pad_air_hda[".advSearchFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".advSearchFields"][] = "golongan";
$tdatapad_pad_air_hda[".advSearchFields"][] = "id_old3";

$tdatapad_pad_air_hda[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_air_hda[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_air_hda[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_air_hda[".orderindexes"] = array();

$tdatapad_pad_air_hda[".sqlHead"] = "SELECT id,   zona_id,   manfaat_id,   volume,   hda,   create_uid,   update_uid,   updated,   created,   kelompok_usaha_id,   golongan,   id_old3";
$tdatapad_pad_air_hda[".sqlFrom"] = "FROM \"pad\".pad_air_hda";
$tdatapad_pad_air_hda[".sqlWhereExpr"] = "";
$tdatapad_pad_air_hda[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_air_hda[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_air_hda[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_air_hda = array();
$tableKeyspad_pad_air_hda[] = "id";
$tdatapad_pad_air_hda[".Keys"] = $tableKeyspad_pad_air_hda;

$tdatapad_pad_air_hda[".listFields"] = array();
$tdatapad_pad_air_hda[".listFields"][] = "id";
$tdatapad_pad_air_hda[".listFields"][] = "zona_id";
$tdatapad_pad_air_hda[".listFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".listFields"][] = "volume";
$tdatapad_pad_air_hda[".listFields"][] = "hda";
$tdatapad_pad_air_hda[".listFields"][] = "create_uid";
$tdatapad_pad_air_hda[".listFields"][] = "update_uid";
$tdatapad_pad_air_hda[".listFields"][] = "updated";
$tdatapad_pad_air_hda[".listFields"][] = "created";
$tdatapad_pad_air_hda[".listFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".listFields"][] = "golongan";
$tdatapad_pad_air_hda[".listFields"][] = "id_old3";

$tdatapad_pad_air_hda[".viewFields"] = array();
$tdatapad_pad_air_hda[".viewFields"][] = "id";
$tdatapad_pad_air_hda[".viewFields"][] = "zona_id";
$tdatapad_pad_air_hda[".viewFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".viewFields"][] = "volume";
$tdatapad_pad_air_hda[".viewFields"][] = "hda";
$tdatapad_pad_air_hda[".viewFields"][] = "create_uid";
$tdatapad_pad_air_hda[".viewFields"][] = "update_uid";
$tdatapad_pad_air_hda[".viewFields"][] = "updated";
$tdatapad_pad_air_hda[".viewFields"][] = "created";
$tdatapad_pad_air_hda[".viewFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".viewFields"][] = "golongan";
$tdatapad_pad_air_hda[".viewFields"][] = "id_old3";

$tdatapad_pad_air_hda[".addFields"] = array();
$tdatapad_pad_air_hda[".addFields"][] = "zona_id";
$tdatapad_pad_air_hda[".addFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".addFields"][] = "volume";
$tdatapad_pad_air_hda[".addFields"][] = "hda";
$tdatapad_pad_air_hda[".addFields"][] = "create_uid";
$tdatapad_pad_air_hda[".addFields"][] = "update_uid";
$tdatapad_pad_air_hda[".addFields"][] = "updated";
$tdatapad_pad_air_hda[".addFields"][] = "created";
$tdatapad_pad_air_hda[".addFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".addFields"][] = "golongan";
$tdatapad_pad_air_hda[".addFields"][] = "id_old3";

$tdatapad_pad_air_hda[".inlineAddFields"] = array();
$tdatapad_pad_air_hda[".inlineAddFields"][] = "zona_id";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "volume";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "hda";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "updated";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "created";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "golongan";
$tdatapad_pad_air_hda[".inlineAddFields"][] = "id_old3";

$tdatapad_pad_air_hda[".editFields"] = array();
$tdatapad_pad_air_hda[".editFields"][] = "zona_id";
$tdatapad_pad_air_hda[".editFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".editFields"][] = "volume";
$tdatapad_pad_air_hda[".editFields"][] = "hda";
$tdatapad_pad_air_hda[".editFields"][] = "create_uid";
$tdatapad_pad_air_hda[".editFields"][] = "update_uid";
$tdatapad_pad_air_hda[".editFields"][] = "updated";
$tdatapad_pad_air_hda[".editFields"][] = "created";
$tdatapad_pad_air_hda[".editFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".editFields"][] = "golongan";
$tdatapad_pad_air_hda[".editFields"][] = "id_old3";

$tdatapad_pad_air_hda[".inlineEditFields"] = array();
$tdatapad_pad_air_hda[".inlineEditFields"][] = "zona_id";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "volume";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "hda";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "updated";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "created";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "golongan";
$tdatapad_pad_air_hda[".inlineEditFields"][] = "id_old3";

$tdatapad_pad_air_hda[".exportFields"] = array();
$tdatapad_pad_air_hda[".exportFields"][] = "id";
$tdatapad_pad_air_hda[".exportFields"][] = "zona_id";
$tdatapad_pad_air_hda[".exportFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".exportFields"][] = "volume";
$tdatapad_pad_air_hda[".exportFields"][] = "hda";
$tdatapad_pad_air_hda[".exportFields"][] = "create_uid";
$tdatapad_pad_air_hda[".exportFields"][] = "update_uid";
$tdatapad_pad_air_hda[".exportFields"][] = "updated";
$tdatapad_pad_air_hda[".exportFields"][] = "created";
$tdatapad_pad_air_hda[".exportFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".exportFields"][] = "golongan";
$tdatapad_pad_air_hda[".exportFields"][] = "id_old3";

$tdatapad_pad_air_hda[".printFields"] = array();
$tdatapad_pad_air_hda[".printFields"][] = "id";
$tdatapad_pad_air_hda[".printFields"][] = "zona_id";
$tdatapad_pad_air_hda[".printFields"][] = "manfaat_id";
$tdatapad_pad_air_hda[".printFields"][] = "volume";
$tdatapad_pad_air_hda[".printFields"][] = "hda";
$tdatapad_pad_air_hda[".printFields"][] = "create_uid";
$tdatapad_pad_air_hda[".printFields"][] = "update_uid";
$tdatapad_pad_air_hda[".printFields"][] = "updated";
$tdatapad_pad_air_hda[".printFields"][] = "created";
$tdatapad_pad_air_hda[".printFields"][] = "kelompok_usaha_id";
$tdatapad_pad_air_hda[".printFields"][] = "golongan";
$tdatapad_pad_air_hda[".printFields"][] = "id_old3";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_air_hda";
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
	
		
		
	$tdatapad_pad_air_hda["id"] = $fdata;
//	zona_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "zona_id";
	$fdata["GoodName"] = "zona_id";
	$fdata["ownerTable"] = "pad.pad_air_hda";
	$fdata["Label"] = "Zona Id"; 
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
	
		$fdata["strField"] = "zona_id"; 
		$fdata["FullName"] = "zona_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_air_zona";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_air_hda["zona_id"] = $fdata;
//	manfaat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "manfaat_id";
	$fdata["GoodName"] = "manfaat_id";
	$fdata["ownerTable"] = "pad.pad_air_hda";
	$fdata["Label"] = "Manfaat Id"; 
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
	
		$fdata["strField"] = "manfaat_id"; 
		$fdata["FullName"] = "manfaat_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_air_manfaat";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
				
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_air_hda["manfaat_id"] = $fdata;
//	volume
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "volume";
	$fdata["GoodName"] = "volume";
	$fdata["ownerTable"] = "pad.pad_air_hda";
	$fdata["Label"] = "Volume"; 
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
	
		$fdata["strField"] = "volume"; 
		$fdata["FullName"] = "volume";
	
		
		
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
	
		
		
	$tdatapad_pad_air_hda["volume"] = $fdata;
//	hda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "hda";
	$fdata["GoodName"] = "hda";
	$fdata["ownerTable"] = "pad.pad_air_hda";
	$fdata["Label"] = "Hda"; 
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
	
		$fdata["strField"] = "hda"; 
		$fdata["FullName"] = "hda";
	
		
		
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
	
		
		
	$tdatapad_pad_air_hda["hda"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_air_hda";
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
	
		
		
	$tdatapad_pad_air_hda["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_air_hda";
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
	
		
		
	$tdatapad_pad_air_hda["update_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_air_hda";
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
	
		
		
	$tdatapad_pad_air_hda["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_air_hda";
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
	
		
		
	$tdatapad_pad_air_hda["created"] = $fdata;
//	kelompok_usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "kelompok_usaha_id";
	$fdata["GoodName"] = "kelompok_usaha_id";
	$fdata["ownerTable"] = "pad.pad_air_hda";
	$fdata["Label"] = "Kelompok Usaha Id"; 
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
	
		$fdata["strField"] = "kelompok_usaha_id"; 
		$fdata["FullName"] = "kelompok_usaha_id";
	
		
		
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
	
		
		
	$tdatapad_pad_air_hda["kelompok_usaha_id"] = $fdata;
//	golongan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "golongan";
	$fdata["GoodName"] = "golongan";
	$fdata["ownerTable"] = "pad.pad_air_hda";
	$fdata["Label"] = "Golongan"; 
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
	
		$fdata["strField"] = "golongan"; 
		$fdata["FullName"] = "golongan";
	
		
		
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
	
		
		
	$tdatapad_pad_air_hda["golongan"] = $fdata;
//	id_old3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "id_old3";
	$fdata["GoodName"] = "id_old3";
	$fdata["ownerTable"] = "pad.pad_air_hda";
	$fdata["Label"] = "Id Old3"; 
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
	
		$fdata["strField"] = "id_old3"; 
		$fdata["FullName"] = "id_old3";
	
		
		
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
	
		
		
	$tdatapad_pad_air_hda["id_old3"] = $fdata;

	
$tables_data["pad.pad_air_hda"]=&$tdatapad_pad_air_hda;
$field_labels["pad_pad_air_hda"] = &$fieldLabelspad_pad_air_hda;
$fieldToolTips["pad.pad_air_hda"] = &$fieldToolTipspad_pad_air_hda;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_air_hda"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_air_hda"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_air_manfaat";
	$masterParams["mDataSourceTable"]="pad.pad_air_manfaat";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_air_manfaat";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_air_hda"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_air_hda"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_air_hda"][$mIndex]["detailKeys"][]="manfaat_id";

$mIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_air_zona";
	$masterParams["mDataSourceTable"]="pad.pad_air_zona";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_air_zona";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_air_hda"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_air_hda"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_air_hda"][$mIndex]["detailKeys"][]="zona_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_air_hda()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   zona_id,   manfaat_id,   volume,   hda,   create_uid,   update_uid,   updated,   created,   kelompok_usaha_id,   golongan,   id_old3";
$proto0["m_strFrom"] = "FROM \"pad\".pad_air_hda";
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
	"m_strTable" => "pad.pad_air_hda"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "zona_id",
	"m_strTable" => "pad.pad_air_hda"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "manfaat_id",
	"m_strTable" => "pad.pad_air_hda"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "volume",
	"m_strTable" => "pad.pad_air_hda"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "hda",
	"m_strTable" => "pad.pad_air_hda"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_air_hda"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_air_hda"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_air_hda"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_air_hda"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "kelompok_usaha_id",
	"m_strTable" => "pad.pad_air_hda"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "golongan",
	"m_strTable" => "pad.pad_air_hda"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "id_old3",
	"m_strTable" => "pad.pad_air_hda"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto29=array();
$proto29["m_link"] = "SQLL_MAIN";
			$proto30=array();
$proto30["m_strName"] = "pad.pad_air_hda";
$proto30["m_columns"] = array();
$proto30["m_columns"][] = "id";
$proto30["m_columns"][] = "zona_id";
$proto30["m_columns"][] = "manfaat_id";
$proto30["m_columns"][] = "volume";
$proto30["m_columns"][] = "hda";
$proto30["m_columns"][] = "create_uid";
$proto30["m_columns"][] = "update_uid";
$proto30["m_columns"][] = "updated";
$proto30["m_columns"][] = "created";
$proto30["m_columns"][] = "kelompok_usaha_id";
$proto30["m_columns"][] = "golongan";
$proto30["m_columns"][] = "id_old3";
$obj = new SQLTable($proto30);

$proto29["m_table"] = $obj;
$proto29["m_alias"] = "";
$proto31=array();
$proto31["m_sql"] = "";
$proto31["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto31["m_column"]=$obj;
$proto31["m_contained"] = array();
$proto31["m_strCase"] = "";
$proto31["m_havingmode"] = "0";
$proto31["m_inBrackets"] = "0";
$proto31["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto31);

$proto29["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto29);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_air_hda = createSqlQuery_pad_pad_air_hda();
												$tdatapad_pad_air_hda[".sqlquery"] = $queryData_pad_pad_air_hda;
	
if(isset($tdatapad_pad_air_hda["field2"])){
	$tdatapad_pad_air_hda["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_air_hda["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_air_hda["field2"]["LookupType"] = 4;
	$tdatapad_pad_air_hda["field2"]["LinkField"] = "email";
	$tdatapad_pad_air_hda["field2"]["DisplayField"] = "name";
	$tdatapad_pad_air_hda[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_air_hda"] = new eventsBase;
$tdatapad_pad_air_hda[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_air_hda");

?>