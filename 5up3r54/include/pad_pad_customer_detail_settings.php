<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_customer_detail = array();
	$tdatapad_pad_customer_detail[".NumberOfChars"] = 80; 
	$tdatapad_pad_customer_detail[".ShortName"] = "pad_pad_customer_detail";
	$tdatapad_pad_customer_detail[".OwnerID"] = "";
	$tdatapad_pad_customer_detail[".OriginalTable"] = "pad.pad_customer_detail";

//	field labels
$fieldLabelspad_pad_customer_detail = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_customer_detail["English"] = array();
	$fieldToolTipspad_pad_customer_detail["English"] = array();
	$fieldLabelspad_pad_customer_detail["English"]["id"] = "Id";
	$fieldToolTipspad_pad_customer_detail["English"]["id"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["usaha_id"] = "Usaha Id";
	$fieldToolTipspad_pad_customer_detail["English"]["usaha_id"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["nourut"] = "Nourut";
	$fieldToolTipspad_pad_customer_detail["English"]["nourut"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["notes"] = "Notes";
	$fieldToolTipspad_pad_customer_detail["English"]["notes"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["tarif"] = "Tarif";
	$fieldToolTipspad_pad_customer_detail["English"]["tarif"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["kamar"] = "Kamar";
	$fieldToolTipspad_pad_customer_detail["English"]["kamar"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["volume"] = "Volume";
	$fieldToolTipspad_pad_customer_detail["English"]["volume"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["created"] = "Created";
	$fieldToolTipspad_pad_customer_detail["English"]["created"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_customer_detail["English"]["updated"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_customer_detail["English"]["create_uid"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_customer_detail["English"]["update_uid"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["customer_id"] = "Customer Id";
	$fieldToolTipspad_pad_customer_detail["English"]["customer_id"] = "";
	$fieldLabelspad_pad_customer_detail["English"]["konterid"] = "Konterid";
	$fieldToolTipspad_pad_customer_detail["English"]["konterid"] = "";
	if (count($fieldToolTipspad_pad_customer_detail["English"]))
		$tdatapad_pad_customer_detail[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_customer_detail[".NCSearch"] = true;



$tdatapad_pad_customer_detail[".shortTableName"] = "pad_pad_customer_detail";
$tdatapad_pad_customer_detail[".nSecOptions"] = 0;
$tdatapad_pad_customer_detail[".recsPerRowList"] = 1;
$tdatapad_pad_customer_detail[".mainTableOwnerID"] = "";
$tdatapad_pad_customer_detail[".moveNext"] = 1;
$tdatapad_pad_customer_detail[".nType"] = 0;

$tdatapad_pad_customer_detail[".strOriginalTableName"] = "pad.pad_customer_detail";




$tdatapad_pad_customer_detail[".showAddInPopup"] = false;

$tdatapad_pad_customer_detail[".showEditInPopup"] = false;

$tdatapad_pad_customer_detail[".showViewInPopup"] = false;

$tdatapad_pad_customer_detail[".fieldsForRegister"] = array();

$tdatapad_pad_customer_detail[".listAjax"] = false;

	$tdatapad_pad_customer_detail[".audit"] = false;

	$tdatapad_pad_customer_detail[".locking"] = false;

$tdatapad_pad_customer_detail[".listIcons"] = true;
$tdatapad_pad_customer_detail[".edit"] = true;
$tdatapad_pad_customer_detail[".inlineEdit"] = true;
$tdatapad_pad_customer_detail[".inlineAdd"] = true;
$tdatapad_pad_customer_detail[".view"] = true;

$tdatapad_pad_customer_detail[".exportTo"] = true;

$tdatapad_pad_customer_detail[".printFriendly"] = true;

$tdatapad_pad_customer_detail[".delete"] = true;

$tdatapad_pad_customer_detail[".showSimpleSearchOptions"] = false;

$tdatapad_pad_customer_detail[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_customer_detail[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_customer_detail[".isUseAjaxSuggest"] = true;

$tdatapad_pad_customer_detail[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_customer_detail[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_customer_detail[".isUseTimeForSearch"] = false;




$tdatapad_pad_customer_detail[".allSearchFields"] = array();

$tdatapad_pad_customer_detail[".allSearchFields"][] = "id";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "nourut";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "notes";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "tarif";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "kamar";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "volume";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "created";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "updated";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".allSearchFields"][] = "konterid";

$tdatapad_pad_customer_detail[".googleLikeFields"][] = "id";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "nourut";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "notes";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "tarif";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "kamar";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "volume";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "created";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "updated";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".googleLikeFields"][] = "konterid";


$tdatapad_pad_customer_detail[".advSearchFields"][] = "id";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "nourut";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "notes";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "tarif";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "kamar";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "volume";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "created";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "updated";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".advSearchFields"][] = "konterid";

$tdatapad_pad_customer_detail[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_customer_detail[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_customer_detail[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_customer_detail[".orderindexes"] = array();

$tdatapad_pad_customer_detail[".sqlHead"] = "SELECT id,   usaha_id,   nourut,   notes,   tarif,   kamar,   volume,   created,   updated,   create_uid,   update_uid,   customer_id,   konterid";
$tdatapad_pad_customer_detail[".sqlFrom"] = "FROM \"pad\".pad_customer_detail";
$tdatapad_pad_customer_detail[".sqlWhereExpr"] = "";
$tdatapad_pad_customer_detail[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_customer_detail[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_customer_detail[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_customer_detail = array();
$tableKeyspad_pad_customer_detail[] = "id";
$tdatapad_pad_customer_detail[".Keys"] = $tableKeyspad_pad_customer_detail;

$tdatapad_pad_customer_detail[".listFields"] = array();
$tdatapad_pad_customer_detail[".listFields"][] = "id";
$tdatapad_pad_customer_detail[".listFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".listFields"][] = "nourut";
$tdatapad_pad_customer_detail[".listFields"][] = "notes";
$tdatapad_pad_customer_detail[".listFields"][] = "tarif";
$tdatapad_pad_customer_detail[".listFields"][] = "kamar";
$tdatapad_pad_customer_detail[".listFields"][] = "volume";
$tdatapad_pad_customer_detail[".listFields"][] = "created";
$tdatapad_pad_customer_detail[".listFields"][] = "updated";
$tdatapad_pad_customer_detail[".listFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".listFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".listFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".listFields"][] = "konterid";

$tdatapad_pad_customer_detail[".viewFields"] = array();
$tdatapad_pad_customer_detail[".viewFields"][] = "id";
$tdatapad_pad_customer_detail[".viewFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".viewFields"][] = "nourut";
$tdatapad_pad_customer_detail[".viewFields"][] = "notes";
$tdatapad_pad_customer_detail[".viewFields"][] = "tarif";
$tdatapad_pad_customer_detail[".viewFields"][] = "kamar";
$tdatapad_pad_customer_detail[".viewFields"][] = "volume";
$tdatapad_pad_customer_detail[".viewFields"][] = "created";
$tdatapad_pad_customer_detail[".viewFields"][] = "updated";
$tdatapad_pad_customer_detail[".viewFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".viewFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".viewFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".viewFields"][] = "konterid";

$tdatapad_pad_customer_detail[".addFields"] = array();
$tdatapad_pad_customer_detail[".addFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".addFields"][] = "nourut";
$tdatapad_pad_customer_detail[".addFields"][] = "notes";
$tdatapad_pad_customer_detail[".addFields"][] = "tarif";
$tdatapad_pad_customer_detail[".addFields"][] = "kamar";
$tdatapad_pad_customer_detail[".addFields"][] = "volume";
$tdatapad_pad_customer_detail[".addFields"][] = "created";
$tdatapad_pad_customer_detail[".addFields"][] = "updated";
$tdatapad_pad_customer_detail[".addFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".addFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".addFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".addFields"][] = "konterid";

$tdatapad_pad_customer_detail[".inlineAddFields"] = array();
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "nourut";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "notes";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "tarif";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "kamar";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "volume";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "created";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "updated";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".inlineAddFields"][] = "konterid";

$tdatapad_pad_customer_detail[".editFields"] = array();
$tdatapad_pad_customer_detail[".editFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".editFields"][] = "nourut";
$tdatapad_pad_customer_detail[".editFields"][] = "notes";
$tdatapad_pad_customer_detail[".editFields"][] = "tarif";
$tdatapad_pad_customer_detail[".editFields"][] = "kamar";
$tdatapad_pad_customer_detail[".editFields"][] = "volume";
$tdatapad_pad_customer_detail[".editFields"][] = "created";
$tdatapad_pad_customer_detail[".editFields"][] = "updated";
$tdatapad_pad_customer_detail[".editFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".editFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".editFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".editFields"][] = "konterid";

$tdatapad_pad_customer_detail[".inlineEditFields"] = array();
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "nourut";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "notes";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "tarif";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "kamar";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "volume";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "created";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "updated";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".inlineEditFields"][] = "konterid";

$tdatapad_pad_customer_detail[".exportFields"] = array();
$tdatapad_pad_customer_detail[".exportFields"][] = "id";
$tdatapad_pad_customer_detail[".exportFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".exportFields"][] = "nourut";
$tdatapad_pad_customer_detail[".exportFields"][] = "notes";
$tdatapad_pad_customer_detail[".exportFields"][] = "tarif";
$tdatapad_pad_customer_detail[".exportFields"][] = "kamar";
$tdatapad_pad_customer_detail[".exportFields"][] = "volume";
$tdatapad_pad_customer_detail[".exportFields"][] = "created";
$tdatapad_pad_customer_detail[".exportFields"][] = "updated";
$tdatapad_pad_customer_detail[".exportFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".exportFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".exportFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".exportFields"][] = "konterid";

$tdatapad_pad_customer_detail[".printFields"] = array();
$tdatapad_pad_customer_detail[".printFields"][] = "id";
$tdatapad_pad_customer_detail[".printFields"][] = "usaha_id";
$tdatapad_pad_customer_detail[".printFields"][] = "nourut";
$tdatapad_pad_customer_detail[".printFields"][] = "notes";
$tdatapad_pad_customer_detail[".printFields"][] = "tarif";
$tdatapad_pad_customer_detail[".printFields"][] = "kamar";
$tdatapad_pad_customer_detail[".printFields"][] = "volume";
$tdatapad_pad_customer_detail[".printFields"][] = "created";
$tdatapad_pad_customer_detail[".printFields"][] = "updated";
$tdatapad_pad_customer_detail[".printFields"][] = "create_uid";
$tdatapad_pad_customer_detail[".printFields"][] = "update_uid";
$tdatapad_pad_customer_detail[".printFields"][] = "customer_id";
$tdatapad_pad_customer_detail[".printFields"][] = "konterid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
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
	
		
		
	$tdatapad_pad_customer_detail["id"] = $fdata;
//	usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "usaha_id";
	$fdata["GoodName"] = "usaha_id";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "id";
	$edata["LinkFieldType"] = 20;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_customer_detail["usaha_id"] = $fdata;
//	nourut
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nourut";
	$fdata["GoodName"] = "nourut";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
	$fdata["Label"] = "Nourut"; 
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
	
		$fdata["strField"] = "nourut"; 
		$fdata["FullName"] = "nourut";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_detail["nourut"] = $fdata;
//	notes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "notes";
	$fdata["GoodName"] = "notes";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
	$fdata["Label"] = "Notes"; 
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
	
		$fdata["strField"] = "notes"; 
		$fdata["FullName"] = "notes";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_detail["notes"] = $fdata;
//	tarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "tarif";
	$fdata["GoodName"] = "tarif";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
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
	
		
		
	$tdatapad_pad_customer_detail["tarif"] = $fdata;
//	kamar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "kamar";
	$fdata["GoodName"] = "kamar";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
	$fdata["Label"] = "Kamar"; 
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
	
		$fdata["strField"] = "kamar"; 
		$fdata["FullName"] = "kamar";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_detail["kamar"] = $fdata;
//	volume
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "volume";
	$fdata["GoodName"] = "volume";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
	$fdata["Label"] = "Volume"; 
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
	
		$fdata["strField"] = "volume"; 
		$fdata["FullName"] = "volume";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_detail["volume"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
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
	
		
		
	$tdatapad_pad_customer_detail["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
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
	
		
		
	$tdatapad_pad_customer_detail["updated"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
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
	
		
		
	$tdatapad_pad_customer_detail["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
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
	
		
		
	$tdatapad_pad_customer_detail["update_uid"] = $fdata;
//	customer_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "customer_id";
	$fdata["GoodName"] = "customer_id";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
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
	
		
		
	$tdatapad_pad_customer_detail["customer_id"] = $fdata;
//	konterid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "konterid";
	$fdata["GoodName"] = "konterid";
	$fdata["ownerTable"] = "pad.pad_customer_detail";
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
	
		
		
	$tdatapad_pad_customer_detail["konterid"] = $fdata;

	
$tables_data["pad.pad_customer_detail"]=&$tdatapad_pad_customer_detail;
$field_labels["pad_pad_customer_detail"] = &$fieldLabelspad_pad_customer_detail;
$fieldToolTips["pad.pad_customer_detail"] = &$fieldToolTipspad_pad_customer_detail;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_customer_detail"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_customer_detail"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_customer";
	$masterParams["mDataSourceTable"]="pad.pad_customer";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_customer";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_customer_detail"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_customer_detail"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_customer_detail"][$mIndex]["detailKeys"][]="usaha_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_customer_detail()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   usaha_id,   nourut,   notes,   tarif,   kamar,   volume,   created,   updated,   create_uid,   update_uid,   customer_id,   konterid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_customer_detail";
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
	"m_strTable" => "pad.pad_customer_detail"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "usaha_id",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nourut",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "notes",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "tarif",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "kamar",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "volume",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_id",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "konterid",
	"m_strTable" => "pad.pad_customer_detail"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto31=array();
$proto31["m_link"] = "SQLL_MAIN";
			$proto32=array();
$proto32["m_strName"] = "pad.pad_customer_detail";
$proto32["m_columns"] = array();
$proto32["m_columns"][] = "id";
$proto32["m_columns"][] = "usaha_id";
$proto32["m_columns"][] = "nourut";
$proto32["m_columns"][] = "notes";
$proto32["m_columns"][] = "tarif";
$proto32["m_columns"][] = "kamar";
$proto32["m_columns"][] = "volume";
$proto32["m_columns"][] = "created";
$proto32["m_columns"][] = "updated";
$proto32["m_columns"][] = "create_uid";
$proto32["m_columns"][] = "update_uid";
$proto32["m_columns"][] = "customer_id";
$proto32["m_columns"][] = "konterid";
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
$queryData_pad_pad_customer_detail = createSqlQuery_pad_pad_customer_detail();
													$tdatapad_pad_customer_detail[".sqlquery"] = $queryData_pad_pad_customer_detail;
	
if(isset($tdatapad_pad_customer_detail["field2"])){
	$tdatapad_pad_customer_detail["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_customer_detail["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_customer_detail["field2"]["LookupType"] = 4;
	$tdatapad_pad_customer_detail["field2"]["LinkField"] = "email";
	$tdatapad_pad_customer_detail["field2"]["DisplayField"] = "name";
	$tdatapad_pad_customer_detail[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_customer_detail"] = new eventsBase;
$tdatapad_pad_customer_detail[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_customer_detail");

?>