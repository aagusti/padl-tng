<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_daftar_hist = array();
	$tdatapad_pad_daftar_hist[".NumberOfChars"] = 80; 
	$tdatapad_pad_daftar_hist[".ShortName"] = "pad_pad_daftar_hist";
	$tdatapad_pad_daftar_hist[".OwnerID"] = "";
	$tdatapad_pad_daftar_hist[".OriginalTable"] = "pad.pad_daftar_hist";

//	field labels
$fieldLabelspad_pad_daftar_hist = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_daftar_hist["English"] = array();
	$fieldToolTipspad_pad_daftar_hist["English"] = array();
	$fieldLabelspad_pad_daftar_hist["English"]["id"] = "Id";
	$fieldToolTipspad_pad_daftar_hist["English"]["id"] = "";
	$fieldLabelspad_pad_daftar_hist["English"]["daftar_id"] = "Daftar Id";
	$fieldToolTipspad_pad_daftar_hist["English"]["daftar_id"] = "";
	$fieldLabelspad_pad_daftar_hist["English"]["status_id"] = "Status Id";
	$fieldToolTipspad_pad_daftar_hist["English"]["status_id"] = "";
	$fieldLabelspad_pad_daftar_hist["English"]["create_date"] = "Create Date";
	$fieldToolTipspad_pad_daftar_hist["English"]["create_date"] = "";
	$fieldLabelspad_pad_daftar_hist["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_daftar_hist["English"]["create_uid"] = "";
	$fieldLabelspad_pad_daftar_hist["English"]["keterangan"] = "Keterangan";
	$fieldToolTipspad_pad_daftar_hist["English"]["keterangan"] = "";
	if (count($fieldToolTipspad_pad_daftar_hist["English"]))
		$tdatapad_pad_daftar_hist[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_daftar_hist[".NCSearch"] = true;



$tdatapad_pad_daftar_hist[".shortTableName"] = "pad_pad_daftar_hist";
$tdatapad_pad_daftar_hist[".nSecOptions"] = 0;
$tdatapad_pad_daftar_hist[".recsPerRowList"] = 1;
$tdatapad_pad_daftar_hist[".mainTableOwnerID"] = "";
$tdatapad_pad_daftar_hist[".moveNext"] = 1;
$tdatapad_pad_daftar_hist[".nType"] = 0;

$tdatapad_pad_daftar_hist[".strOriginalTableName"] = "pad.pad_daftar_hist";




$tdatapad_pad_daftar_hist[".showAddInPopup"] = false;

$tdatapad_pad_daftar_hist[".showEditInPopup"] = false;

$tdatapad_pad_daftar_hist[".showViewInPopup"] = false;

$tdatapad_pad_daftar_hist[".fieldsForRegister"] = array();

$tdatapad_pad_daftar_hist[".listAjax"] = false;

	$tdatapad_pad_daftar_hist[".audit"] = false;

	$tdatapad_pad_daftar_hist[".locking"] = false;

$tdatapad_pad_daftar_hist[".listIcons"] = true;
$tdatapad_pad_daftar_hist[".edit"] = true;
$tdatapad_pad_daftar_hist[".inlineEdit"] = true;
$tdatapad_pad_daftar_hist[".inlineAdd"] = true;
$tdatapad_pad_daftar_hist[".view"] = true;

$tdatapad_pad_daftar_hist[".exportTo"] = true;

$tdatapad_pad_daftar_hist[".printFriendly"] = true;

$tdatapad_pad_daftar_hist[".delete"] = true;

$tdatapad_pad_daftar_hist[".showSimpleSearchOptions"] = false;

$tdatapad_pad_daftar_hist[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_daftar_hist[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_daftar_hist[".isUseAjaxSuggest"] = true;

$tdatapad_pad_daftar_hist[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_daftar_hist[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_daftar_hist[".isUseTimeForSearch"] = false;




$tdatapad_pad_daftar_hist[".allSearchFields"] = array();

$tdatapad_pad_daftar_hist[".allSearchFields"][] = "id";
$tdatapad_pad_daftar_hist[".allSearchFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".allSearchFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".allSearchFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".allSearchFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".allSearchFields"][] = "keterangan";

$tdatapad_pad_daftar_hist[".googleLikeFields"][] = "id";
$tdatapad_pad_daftar_hist[".googleLikeFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".googleLikeFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".googleLikeFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".googleLikeFields"][] = "keterangan";


$tdatapad_pad_daftar_hist[".advSearchFields"][] = "id";
$tdatapad_pad_daftar_hist[".advSearchFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".advSearchFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".advSearchFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".advSearchFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".advSearchFields"][] = "keterangan";

$tdatapad_pad_daftar_hist[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_daftar_hist[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_daftar_hist[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_daftar_hist[".orderindexes"] = array();

$tdatapad_pad_daftar_hist[".sqlHead"] = "SELECT id,   daftar_id,   status_id,   create_date,   create_uid,   keterangan";
$tdatapad_pad_daftar_hist[".sqlFrom"] = "FROM \"pad\".pad_daftar_hist";
$tdatapad_pad_daftar_hist[".sqlWhereExpr"] = "";
$tdatapad_pad_daftar_hist[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_daftar_hist[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_daftar_hist[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_daftar_hist = array();
$tableKeyspad_pad_daftar_hist[] = "id";
$tdatapad_pad_daftar_hist[".Keys"] = $tableKeyspad_pad_daftar_hist;

$tdatapad_pad_daftar_hist[".listFields"] = array();
$tdatapad_pad_daftar_hist[".listFields"][] = "id";
$tdatapad_pad_daftar_hist[".listFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".listFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".listFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".listFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".listFields"][] = "keterangan";

$tdatapad_pad_daftar_hist[".viewFields"] = array();
$tdatapad_pad_daftar_hist[".viewFields"][] = "id";
$tdatapad_pad_daftar_hist[".viewFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".viewFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".viewFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".viewFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".viewFields"][] = "keterangan";

$tdatapad_pad_daftar_hist[".addFields"] = array();
$tdatapad_pad_daftar_hist[".addFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".addFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".addFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".addFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".addFields"][] = "keterangan";

$tdatapad_pad_daftar_hist[".inlineAddFields"] = array();
$tdatapad_pad_daftar_hist[".inlineAddFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".inlineAddFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".inlineAddFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".inlineAddFields"][] = "keterangan";

$tdatapad_pad_daftar_hist[".editFields"] = array();
$tdatapad_pad_daftar_hist[".editFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".editFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".editFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".editFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".editFields"][] = "keterangan";

$tdatapad_pad_daftar_hist[".inlineEditFields"] = array();
$tdatapad_pad_daftar_hist[".inlineEditFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".inlineEditFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".inlineEditFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".inlineEditFields"][] = "keterangan";

$tdatapad_pad_daftar_hist[".exportFields"] = array();
$tdatapad_pad_daftar_hist[".exportFields"][] = "id";
$tdatapad_pad_daftar_hist[".exportFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".exportFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".exportFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".exportFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".exportFields"][] = "keterangan";

$tdatapad_pad_daftar_hist[".printFields"] = array();
$tdatapad_pad_daftar_hist[".printFields"][] = "id";
$tdatapad_pad_daftar_hist[".printFields"][] = "daftar_id";
$tdatapad_pad_daftar_hist[".printFields"][] = "status_id";
$tdatapad_pad_daftar_hist[".printFields"][] = "create_date";
$tdatapad_pad_daftar_hist[".printFields"][] = "create_uid";
$tdatapad_pad_daftar_hist[".printFields"][] = "keterangan";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_daftar_hist";
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
	
		
		
	$tdatapad_pad_daftar_hist["id"] = $fdata;
//	daftar_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "daftar_id";
	$fdata["GoodName"] = "daftar_id";
	$fdata["ownerTable"] = "pad.pad_daftar_hist";
	$fdata["Label"] = "Daftar Id"; 
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
	
		$fdata["strField"] = "daftar_id"; 
		$fdata["FullName"] = "daftar_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar_hist["daftar_id"] = $fdata;
//	status_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "status_id";
	$fdata["GoodName"] = "status_id";
	$fdata["ownerTable"] = "pad.pad_daftar_hist";
	$fdata["Label"] = "Status Id"; 
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
	
		$fdata["strField"] = "status_id"; 
		$fdata["FullName"] = "status_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_daftar_status";
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
	
		
		
	$tdatapad_pad_daftar_hist["status_id"] = $fdata;
//	create_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "create_date";
	$fdata["GoodName"] = "create_date";
	$fdata["ownerTable"] = "pad.pad_daftar_hist";
	$fdata["Label"] = "Create Date"; 
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
	
		$fdata["strField"] = "create_date"; 
		$fdata["FullName"] = "create_date";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar_hist["create_date"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_daftar_hist";
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
	
		
		
	$tdatapad_pad_daftar_hist["create_uid"] = $fdata;
//	keterangan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "keterangan";
	$fdata["GoodName"] = "keterangan";
	$fdata["ownerTable"] = "pad.pad_daftar_hist";
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
			$edata["EditParams"].= " maxlength=255";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar_hist["keterangan"] = $fdata;

	
$tables_data["pad.pad_daftar_hist"]=&$tdatapad_pad_daftar_hist;
$field_labels["pad_pad_daftar_hist"] = &$fieldLabelspad_pad_daftar_hist;
$fieldToolTips["pad.pad_daftar_hist"] = &$fieldToolTipspad_pad_daftar_hist;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_daftar_hist"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_daftar_hist"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_daftar";
	$masterParams["mDataSourceTable"]="pad.pad_daftar";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_daftar";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_daftar_hist"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_daftar_hist"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_daftar_hist"][$mIndex]["detailKeys"][]="daftar_id";

$mIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_daftar_status";
	$masterParams["mDataSourceTable"]="pad.pad_daftar_status";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_daftar_status";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_daftar_hist"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_daftar_hist"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_daftar_hist"][$mIndex]["detailKeys"][]="status_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_daftar_hist()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   daftar_id,   status_id,   create_date,   create_uid,   keterangan";
$proto0["m_strFrom"] = "FROM \"pad\".pad_daftar_hist";
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
	"m_strTable" => "pad.pad_daftar_hist"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "daftar_id",
	"m_strTable" => "pad.pad_daftar_hist"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "status_id",
	"m_strTable" => "pad.pad_daftar_hist"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "create_date",
	"m_strTable" => "pad.pad_daftar_hist"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_daftar_hist"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan",
	"m_strTable" => "pad.pad_daftar_hist"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto17=array();
$proto17["m_link"] = "SQLL_MAIN";
			$proto18=array();
$proto18["m_strName"] = "pad.pad_daftar_hist";
$proto18["m_columns"] = array();
$proto18["m_columns"][] = "id";
$proto18["m_columns"][] = "daftar_id";
$proto18["m_columns"][] = "status_id";
$proto18["m_columns"][] = "create_date";
$proto18["m_columns"][] = "create_uid";
$proto18["m_columns"][] = "keterangan";
$obj = new SQLTable($proto18);

$proto17["m_table"] = $obj;
$proto17["m_alias"] = "";
$proto19=array();
$proto19["m_sql"] = "";
$proto19["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto19["m_column"]=$obj;
$proto19["m_contained"] = array();
$proto19["m_strCase"] = "";
$proto19["m_havingmode"] = "0";
$proto19["m_inBrackets"] = "0";
$proto19["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto19);

$proto17["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto17);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_daftar_hist = createSqlQuery_pad_pad_daftar_hist();
						$tdatapad_pad_daftar_hist[".sqlquery"] = $queryData_pad_pad_daftar_hist;
	
if(isset($tdatapad_pad_daftar_hist["field2"])){
	$tdatapad_pad_daftar_hist["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_daftar_hist["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_daftar_hist["field2"]["LookupType"] = 4;
	$tdatapad_pad_daftar_hist["field2"]["LinkField"] = "email";
	$tdatapad_pad_daftar_hist["field2"]["DisplayField"] = "name";
	$tdatapad_pad_daftar_hist[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_daftar_hist"] = new eventsBase;
$tdatapad_pad_daftar_hist[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_daftar_hist");

?>