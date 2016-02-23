<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_customer_usaha_air_tanah = array();
	$tdatapad_pad_customer_usaha_air_tanah[".NumberOfChars"] = 80; 
	$tdatapad_pad_customer_usaha_air_tanah[".ShortName"] = "pad_pad_customer_usaha_air_tanah";
	$tdatapad_pad_customer_usaha_air_tanah[".OwnerID"] = "";
	$tdatapad_pad_customer_usaha_air_tanah[".OriginalTable"] = "pad.pad_customer_usaha_air_tanah";

//	field labels
$fieldLabelspad_pad_customer_usaha_air_tanah = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"] = array();
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"] = array();
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["id"] = "Id";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["id"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["customer_usaha_id"] = "Customer Usaha Id";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["customer_usaha_id"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["sumur_ke"] = "Sumur Ke";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["sumur_ke"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["sipa_no"] = "Sipa No";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["sipa_no"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["max_volume"] = "Max Volume";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["max_volume"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["disabled"] = "Disabled";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["disabled"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["update_uid"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["create_uid"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["updated"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["created"] = "Created";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["created"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["customer_id"] = "Customer Id";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["customer_id"] = "";
	$fieldLabelspad_pad_customer_usaha_air_tanah["English"]["konterid"] = "Konterid";
	$fieldToolTipspad_pad_customer_usaha_air_tanah["English"]["konterid"] = "";
	if (count($fieldToolTipspad_pad_customer_usaha_air_tanah["English"]))
		$tdatapad_pad_customer_usaha_air_tanah[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_customer_usaha_air_tanah[".NCSearch"] = true;



$tdatapad_pad_customer_usaha_air_tanah[".shortTableName"] = "pad_pad_customer_usaha_air_tanah";
$tdatapad_pad_customer_usaha_air_tanah[".nSecOptions"] = 0;
$tdatapad_pad_customer_usaha_air_tanah[".recsPerRowList"] = 1;
$tdatapad_pad_customer_usaha_air_tanah[".mainTableOwnerID"] = "";
$tdatapad_pad_customer_usaha_air_tanah[".moveNext"] = 1;
$tdatapad_pad_customer_usaha_air_tanah[".nType"] = 0;

$tdatapad_pad_customer_usaha_air_tanah[".strOriginalTableName"] = "pad.pad_customer_usaha_air_tanah";




$tdatapad_pad_customer_usaha_air_tanah[".showAddInPopup"] = false;

$tdatapad_pad_customer_usaha_air_tanah[".showEditInPopup"] = false;

$tdatapad_pad_customer_usaha_air_tanah[".showViewInPopup"] = false;

$tdatapad_pad_customer_usaha_air_tanah[".fieldsForRegister"] = array();

$tdatapad_pad_customer_usaha_air_tanah[".listAjax"] = false;

	$tdatapad_pad_customer_usaha_air_tanah[".audit"] = false;

	$tdatapad_pad_customer_usaha_air_tanah[".locking"] = false;

$tdatapad_pad_customer_usaha_air_tanah[".listIcons"] = true;
$tdatapad_pad_customer_usaha_air_tanah[".edit"] = true;
$tdatapad_pad_customer_usaha_air_tanah[".inlineEdit"] = true;
$tdatapad_pad_customer_usaha_air_tanah[".inlineAdd"] = true;
$tdatapad_pad_customer_usaha_air_tanah[".view"] = true;

$tdatapad_pad_customer_usaha_air_tanah[".exportTo"] = true;

$tdatapad_pad_customer_usaha_air_tanah[".printFriendly"] = true;

$tdatapad_pad_customer_usaha_air_tanah[".delete"] = true;

$tdatapad_pad_customer_usaha_air_tanah[".showSimpleSearchOptions"] = false;

$tdatapad_pad_customer_usaha_air_tanah[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_customer_usaha_air_tanah[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_customer_usaha_air_tanah[".isUseAjaxSuggest"] = true;

$tdatapad_pad_customer_usaha_air_tanah[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_customer_usaha_air_tanah[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_customer_usaha_air_tanah[".isUseTimeForSearch"] = false;




$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"] = array();

$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "id";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".allSearchFields"][] = "konterid";

$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "id";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".googleLikeFields"][] = "konterid";


$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "id";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".advSearchFields"][] = "konterid";

$tdatapad_pad_customer_usaha_air_tanah[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_customer_usaha_air_tanah[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_customer_usaha_air_tanah[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_customer_usaha_air_tanah[".orderindexes"] = array();

$tdatapad_pad_customer_usaha_air_tanah[".sqlHead"] = "SELECT id,   customer_usaha_id,   sumur_ke,   sipa_no,   max_volume,   disabled,   update_uid,   create_uid,   updated,   created,   customer_id,   konterid";
$tdatapad_pad_customer_usaha_air_tanah[".sqlFrom"] = "FROM \"pad\".pad_customer_usaha_air_tanah";
$tdatapad_pad_customer_usaha_air_tanah[".sqlWhereExpr"] = "";
$tdatapad_pad_customer_usaha_air_tanah[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_customer_usaha_air_tanah[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_customer_usaha_air_tanah[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_customer_usaha_air_tanah = array();
$tableKeyspad_pad_customer_usaha_air_tanah[] = "id";
$tdatapad_pad_customer_usaha_air_tanah[".Keys"] = $tableKeyspad_pad_customer_usaha_air_tanah;

$tdatapad_pad_customer_usaha_air_tanah[".listFields"] = array();
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "id";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".listFields"][] = "konterid";

$tdatapad_pad_customer_usaha_air_tanah[".viewFields"] = array();
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "id";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".viewFields"][] = "konterid";

$tdatapad_pad_customer_usaha_air_tanah[".addFields"] = array();
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".addFields"][] = "konterid";

$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"] = array();
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".inlineAddFields"][] = "konterid";

$tdatapad_pad_customer_usaha_air_tanah[".editFields"] = array();
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".editFields"][] = "konterid";

$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"] = array();
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".inlineEditFields"][] = "konterid";

$tdatapad_pad_customer_usaha_air_tanah[".exportFields"] = array();
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "id";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".exportFields"][] = "konterid";

$tdatapad_pad_customer_usaha_air_tanah[".printFields"] = array();
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "id";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "customer_usaha_id";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "sumur_ke";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "sipa_no";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "max_volume";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "disabled";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "update_uid";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "create_uid";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "updated";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "created";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "customer_id";
$tdatapad_pad_customer_usaha_air_tanah[".printFields"][] = "konterid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["id"] = $fdata;
//	customer_usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "customer_usaha_id";
	$fdata["GoodName"] = "customer_usaha_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
	$fdata["Label"] = "Customer Usaha Id"; 
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
	
		$fdata["strField"] = "customer_usaha_id"; 
		$fdata["FullName"] = "customer_usaha_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["customer_usaha_id"] = $fdata;
//	sumur_ke
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "sumur_ke";
	$fdata["GoodName"] = "sumur_ke";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
	$fdata["Label"] = "Sumur Ke"; 
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
	
		$fdata["strField"] = "sumur_ke"; 
		$fdata["FullName"] = "sumur_ke";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["sumur_ke"] = $fdata;
//	sipa_no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "sipa_no";
	$fdata["GoodName"] = "sipa_no";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
	$fdata["Label"] = "Sipa No"; 
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
	
		$fdata["strField"] = "sipa_no"; 
		$fdata["FullName"] = "sipa_no";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["sipa_no"] = $fdata;
//	max_volume
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "max_volume";
	$fdata["GoodName"] = "max_volume";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
	$fdata["Label"] = "Max Volume"; 
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
	
		$fdata["strField"] = "max_volume"; 
		$fdata["FullName"] = "max_volume";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["max_volume"] = $fdata;
//	disabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "disabled";
	$fdata["GoodName"] = "disabled";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
	$fdata["Label"] = "Disabled"; 
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
	
		$fdata["strField"] = "disabled"; 
		$fdata["FullName"] = "disabled";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["disabled"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["created"] = $fdata;
//	customer_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "customer_id";
	$fdata["GoodName"] = "customer_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
	$fdata["Label"] = "Customer Id"; 
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
	
		$fdata["strField"] = "customer_id"; 
		$fdata["FullName"] = "customer_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["customer_id"] = $fdata;
//	konterid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "konterid";
	$fdata["GoodName"] = "konterid";
	$fdata["ownerTable"] = "pad.pad_customer_usaha_air_tanah";
	$fdata["Label"] = "Konterid"; 
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
	
		$fdata["strField"] = "konterid"; 
		$fdata["FullName"] = "konterid";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha_air_tanah["konterid"] = $fdata;

	
$tables_data["pad.pad_customer_usaha_air_tanah"]=&$tdatapad_pad_customer_usaha_air_tanah;
$field_labels["pad_pad_customer_usaha_air_tanah"] = &$fieldLabelspad_pad_customer_usaha_air_tanah;
$fieldToolTips["pad.pad_customer_usaha_air_tanah"] = &$fieldToolTipspad_pad_customer_usaha_air_tanah;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_customer_usaha_air_tanah"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_customer_usaha_air_tanah"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_customer_usaha_air_tanah()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   customer_usaha_id,   sumur_ke,   sipa_no,   max_volume,   disabled,   update_uid,   create_uid,   updated,   created,   customer_id,   konterid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_customer_usaha_air_tanah";
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
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_usaha_id",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "sumur_ke",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "sipa_no",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "max_volume",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "disabled",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_id",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "konterid",
	"m_strTable" => "pad.pad_customer_usaha_air_tanah"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto29=array();
$proto29["m_link"] = "SQLL_MAIN";
			$proto30=array();
$proto30["m_strName"] = "pad.pad_customer_usaha_air_tanah";
$proto30["m_columns"] = array();
$proto30["m_columns"][] = "id";
$proto30["m_columns"][] = "customer_usaha_id";
$proto30["m_columns"][] = "sumur_ke";
$proto30["m_columns"][] = "sipa_no";
$proto30["m_columns"][] = "max_volume";
$proto30["m_columns"][] = "disabled";
$proto30["m_columns"][] = "update_uid";
$proto30["m_columns"][] = "create_uid";
$proto30["m_columns"][] = "updated";
$proto30["m_columns"][] = "created";
$proto30["m_columns"][] = "customer_id";
$proto30["m_columns"][] = "konterid";
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
$queryData_pad_pad_customer_usaha_air_tanah = createSqlQuery_pad_pad_customer_usaha_air_tanah();
												$tdatapad_pad_customer_usaha_air_tanah[".sqlquery"] = $queryData_pad_pad_customer_usaha_air_tanah;
	
if(isset($tdatapad_pad_customer_usaha_air_tanah["field2"])){
	$tdatapad_pad_customer_usaha_air_tanah["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_customer_usaha_air_tanah["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_customer_usaha_air_tanah["field2"]["LookupType"] = 4;
	$tdatapad_pad_customer_usaha_air_tanah["field2"]["LinkField"] = "email";
	$tdatapad_pad_customer_usaha_air_tanah["field2"]["DisplayField"] = "name";
	$tdatapad_pad_customer_usaha_air_tanah[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_customer_usaha_air_tanah"] = new eventsBase;
$tdatapad_pad_customer_usaha_air_tanah[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_customer_usaha_air_tanah");

?>