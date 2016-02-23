<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_air_tanah_hit = array();
	$tdatapad_pad_air_tanah_hit[".NumberOfChars"] = 80; 
	$tdatapad_pad_air_tanah_hit[".ShortName"] = "pad_pad_air_tanah_hit";
	$tdatapad_pad_air_tanah_hit[".OwnerID"] = "";
	$tdatapad_pad_air_tanah_hit[".OriginalTable"] = "pad.pad_air_tanah_hit";

//	field labels
$fieldLabelspad_pad_air_tanah_hit = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_air_tanah_hit["English"] = array();
	$fieldToolTipspad_pad_air_tanah_hit["English"] = array();
	$fieldLabelspad_pad_air_tanah_hit["English"]["id"] = "Id";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["id"] = "";
	$fieldLabelspad_pad_air_tanah_hit["English"]["spt_id"] = "Spt Id";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["spt_id"] = "";
	$fieldLabelspad_pad_air_tanah_hit["English"]["vol"] = "Vol";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["vol"] = "";
	$fieldLabelspad_pad_air_tanah_hit["English"]["hda"] = "Hda";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["hda"] = "";
	$fieldLabelspad_pad_air_tanah_hit["English"]["jumlah"] = "Jumlah";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["jumlah"] = "";
	$fieldLabelspad_pad_air_tanah_hit["English"]["tarif"] = "Tarif";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["tarif"] = "";
	$fieldLabelspad_pad_air_tanah_hit["English"]["created"] = "Created";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["created"] = "";
	$fieldLabelspad_pad_air_tanah_hit["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["updated"] = "";
	$fieldLabelspad_pad_air_tanah_hit["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["create_uid"] = "";
	$fieldLabelspad_pad_air_tanah_hit["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_air_tanah_hit["English"]["update_uid"] = "";
	if (count($fieldToolTipspad_pad_air_tanah_hit["English"]))
		$tdatapad_pad_air_tanah_hit[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_air_tanah_hit[".NCSearch"] = true;



$tdatapad_pad_air_tanah_hit[".shortTableName"] = "pad_pad_air_tanah_hit";
$tdatapad_pad_air_tanah_hit[".nSecOptions"] = 0;
$tdatapad_pad_air_tanah_hit[".recsPerRowList"] = 1;
$tdatapad_pad_air_tanah_hit[".mainTableOwnerID"] = "";
$tdatapad_pad_air_tanah_hit[".moveNext"] = 1;
$tdatapad_pad_air_tanah_hit[".nType"] = 0;

$tdatapad_pad_air_tanah_hit[".strOriginalTableName"] = "pad.pad_air_tanah_hit";




$tdatapad_pad_air_tanah_hit[".showAddInPopup"] = false;

$tdatapad_pad_air_tanah_hit[".showEditInPopup"] = false;

$tdatapad_pad_air_tanah_hit[".showViewInPopup"] = false;

$tdatapad_pad_air_tanah_hit[".fieldsForRegister"] = array();

$tdatapad_pad_air_tanah_hit[".listAjax"] = false;

	$tdatapad_pad_air_tanah_hit[".audit"] = false;

	$tdatapad_pad_air_tanah_hit[".locking"] = false;

$tdatapad_pad_air_tanah_hit[".listIcons"] = true;
$tdatapad_pad_air_tanah_hit[".edit"] = true;
$tdatapad_pad_air_tanah_hit[".inlineEdit"] = true;
$tdatapad_pad_air_tanah_hit[".inlineAdd"] = true;
$tdatapad_pad_air_tanah_hit[".view"] = true;



$tdatapad_pad_air_tanah_hit[".delete"] = true;

$tdatapad_pad_air_tanah_hit[".showSimpleSearchOptions"] = false;

$tdatapad_pad_air_tanah_hit[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_air_tanah_hit[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_air_tanah_hit[".isUseAjaxSuggest"] = true;

$tdatapad_pad_air_tanah_hit[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_air_tanah_hit[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_air_tanah_hit[".isUseTimeForSearch"] = false;




$tdatapad_pad_air_tanah_hit[".allSearchFields"] = array();

$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "id";
$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".allSearchFields"][] = "update_uid";

$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "id";
$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".googleLikeFields"][] = "update_uid";


$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "id";
$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".advSearchFields"][] = "update_uid";

$tdatapad_pad_air_tanah_hit[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_air_tanah_hit[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_air_tanah_hit[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_air_tanah_hit[".orderindexes"] = array();

$tdatapad_pad_air_tanah_hit[".sqlHead"] = "SELECT id,   spt_id,   vol,   hda,   jumlah,   tarif,   created,   updated,   create_uid,   update_uid";
$tdatapad_pad_air_tanah_hit[".sqlFrom"] = "FROM \"pad\".pad_air_tanah_hit";
$tdatapad_pad_air_tanah_hit[".sqlWhereExpr"] = "";
$tdatapad_pad_air_tanah_hit[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_air_tanah_hit[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_air_tanah_hit[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_air_tanah_hit = array();
$tableKeyspad_pad_air_tanah_hit[] = "id";
$tdatapad_pad_air_tanah_hit[".Keys"] = $tableKeyspad_pad_air_tanah_hit;

$tdatapad_pad_air_tanah_hit[".listFields"] = array();
$tdatapad_pad_air_tanah_hit[".listFields"][] = "id";
$tdatapad_pad_air_tanah_hit[".listFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".listFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".listFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".listFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".listFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".listFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".listFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".listFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".listFields"][] = "update_uid";

$tdatapad_pad_air_tanah_hit[".viewFields"] = array();
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "id";
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".viewFields"][] = "update_uid";

$tdatapad_pad_air_tanah_hit[".addFields"] = array();
$tdatapad_pad_air_tanah_hit[".addFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".addFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".addFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".addFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".addFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".addFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".addFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".addFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".addFields"][] = "update_uid";

$tdatapad_pad_air_tanah_hit[".inlineAddFields"] = array();
$tdatapad_pad_air_tanah_hit[".inlineAddFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".inlineAddFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".inlineAddFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".inlineAddFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".inlineAddFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".inlineAddFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".inlineAddFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".inlineAddFields"][] = "update_uid";

$tdatapad_pad_air_tanah_hit[".editFields"] = array();
$tdatapad_pad_air_tanah_hit[".editFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".editFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".editFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".editFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".editFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".editFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".editFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".editFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".editFields"][] = "update_uid";

$tdatapad_pad_air_tanah_hit[".inlineEditFields"] = array();
$tdatapad_pad_air_tanah_hit[".inlineEditFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".inlineEditFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".inlineEditFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".inlineEditFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".inlineEditFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".inlineEditFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".inlineEditFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".inlineEditFields"][] = "update_uid";

$tdatapad_pad_air_tanah_hit[".exportFields"] = array();
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "id";
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".exportFields"][] = "update_uid";

$tdatapad_pad_air_tanah_hit[".printFields"] = array();
$tdatapad_pad_air_tanah_hit[".printFields"][] = "id";
$tdatapad_pad_air_tanah_hit[".printFields"][] = "spt_id";
$tdatapad_pad_air_tanah_hit[".printFields"][] = "vol";
$tdatapad_pad_air_tanah_hit[".printFields"][] = "hda";
$tdatapad_pad_air_tanah_hit[".printFields"][] = "jumlah";
$tdatapad_pad_air_tanah_hit[".printFields"][] = "tarif";
$tdatapad_pad_air_tanah_hit[".printFields"][] = "created";
$tdatapad_pad_air_tanah_hit[".printFields"][] = "updated";
$tdatapad_pad_air_tanah_hit[".printFields"][] = "create_uid";
$tdatapad_pad_air_tanah_hit[".printFields"][] = "update_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
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
	
		
		
	$tdatapad_pad_air_tanah_hit["id"] = $fdata;
//	spt_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "spt_id";
	$fdata["GoodName"] = "spt_id";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "id";
	$edata["LinkFieldType"] = 20;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_air_tanah_hit["spt_id"] = $fdata;
//	vol
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "vol";
	$fdata["GoodName"] = "vol";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
	$fdata["Label"] = "Vol"; 
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
	
		$fdata["strField"] = "vol"; 
		$fdata["FullName"] = "vol";
	
		
		
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
	
		
		
	$tdatapad_pad_air_tanah_hit["vol"] = $fdata;
//	hda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "hda";
	$fdata["GoodName"] = "hda";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
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
	
		
		
	$tdatapad_pad_air_tanah_hit["hda"] = $fdata;
//	jumlah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "jumlah";
	$fdata["GoodName"] = "jumlah";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
	$fdata["Label"] = "Jumlah"; 
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
	
		$fdata["strField"] = "jumlah"; 
		$fdata["FullName"] = "jumlah";
	
		
		
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
	
		
		
	$tdatapad_pad_air_tanah_hit["jumlah"] = $fdata;
//	tarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "tarif";
	$fdata["GoodName"] = "tarif";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
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
	
		
		
	$tdatapad_pad_air_tanah_hit["tarif"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
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
	
		
		
	$tdatapad_pad_air_tanah_hit["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
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
	
		
		
	$tdatapad_pad_air_tanah_hit["updated"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
	$fdata["Label"] = "Create Uid"; 
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
	
		
		
	$tdatapad_pad_air_tanah_hit["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_air_tanah_hit";
	$fdata["Label"] = "Update Uid"; 
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
	
		
		
	$tdatapad_pad_air_tanah_hit["update_uid"] = $fdata;

	
$tables_data["pad.pad_air_tanah_hit"]=&$tdatapad_pad_air_tanah_hit;
$field_labels["pad_pad_air_tanah_hit"] = &$fieldLabelspad_pad_air_tanah_hit;
$fieldToolTips["pad.pad_air_tanah_hit"] = &$fieldToolTipspad_pad_air_tanah_hit;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_air_tanah_hit"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_air_tanah_hit"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_spt";
	$masterParams["mDataSourceTable"]="pad.pad_spt";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_spt";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_air_tanah_hit"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_air_tanah_hit"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_air_tanah_hit"][$mIndex]["detailKeys"][]="spt_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_air_tanah_hit()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   spt_id,   vol,   hda,   jumlah,   tarif,   created,   updated,   create_uid,   update_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_air_tanah_hit";
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
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_id",
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "vol",
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "hda",
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "jumlah",
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "tarif",
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_air_tanah_hit"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto25=array();
$proto25["m_link"] = "SQLL_MAIN";
			$proto26=array();
$proto26["m_strName"] = "pad.pad_air_tanah_hit";
$proto26["m_columns"] = array();
$proto26["m_columns"][] = "id";
$proto26["m_columns"][] = "spt_id";
$proto26["m_columns"][] = "vol";
$proto26["m_columns"][] = "hda";
$proto26["m_columns"][] = "jumlah";
$proto26["m_columns"][] = "tarif";
$proto26["m_columns"][] = "created";
$proto26["m_columns"][] = "updated";
$proto26["m_columns"][] = "create_uid";
$proto26["m_columns"][] = "update_uid";
$obj = new SQLTable($proto26);

$proto25["m_table"] = $obj;
$proto25["m_alias"] = "";
$proto27=array();
$proto27["m_sql"] = "";
$proto27["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto27["m_column"]=$obj;
$proto27["m_contained"] = array();
$proto27["m_strCase"] = "";
$proto27["m_havingmode"] = "0";
$proto27["m_inBrackets"] = "0";
$proto27["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto27);

$proto25["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto25);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_air_tanah_hit = createSqlQuery_pad_pad_air_tanah_hit();
										$tdatapad_pad_air_tanah_hit[".sqlquery"] = $queryData_pad_pad_air_tanah_hit;
	
if(isset($tdatapad_pad_air_tanah_hit["field2"])){
	$tdatapad_pad_air_tanah_hit["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_air_tanah_hit["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_air_tanah_hit["field2"]["LookupType"] = 4;
	$tdatapad_pad_air_tanah_hit["field2"]["LinkField"] = "email";
	$tdatapad_pad_air_tanah_hit["field2"]["DisplayField"] = "name";
	$tdatapad_pad_air_tanah_hit[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_air_tanah_hit"] = new eventsBase;
$tdatapad_pad_air_tanah_hit[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_air_tanah_hit");

?>