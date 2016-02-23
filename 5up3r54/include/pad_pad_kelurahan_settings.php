<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_kelurahan = array();
	$tdatapad_pad_kelurahan[".NumberOfChars"] = 80; 
	$tdatapad_pad_kelurahan[".ShortName"] = "pad_pad_kelurahan";
	$tdatapad_pad_kelurahan[".OwnerID"] = "";
	$tdatapad_pad_kelurahan[".OriginalTable"] = "pad.pad_kelurahan";

//	field labels
$fieldLabelspad_pad_kelurahan = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_kelurahan["English"] = array();
	$fieldToolTipspad_pad_kelurahan["English"] = array();
	$fieldLabelspad_pad_kelurahan["English"]["id"] = "Id";
	$fieldToolTipspad_pad_kelurahan["English"]["id"] = "";
	$fieldLabelspad_pad_kelurahan["English"]["kecamatan_id"] = "Kecamatan Id";
	$fieldToolTipspad_pad_kelurahan["English"]["kecamatan_id"] = "";
	$fieldLabelspad_pad_kelurahan["English"]["kode"] = "Kode";
	$fieldToolTipspad_pad_kelurahan["English"]["kode"] = "";
	$fieldLabelspad_pad_kelurahan["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_kelurahan["English"]["nama"] = "";
	$fieldLabelspad_pad_kelurahan["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_kelurahan["English"]["tmt"] = "";
	$fieldLabelspad_pad_kelurahan["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_kelurahan["English"]["enabled"] = "";
	$fieldLabelspad_pad_kelurahan["English"]["created"] = "Created";
	$fieldToolTipspad_pad_kelurahan["English"]["created"] = "";
	$fieldLabelspad_pad_kelurahan["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_kelurahan["English"]["create_uid"] = "";
	$fieldLabelspad_pad_kelurahan["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_kelurahan["English"]["updated"] = "";
	$fieldLabelspad_pad_kelurahan["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_kelurahan["English"]["update_uid"] = "";
	if (count($fieldToolTipspad_pad_kelurahan["English"]))
		$tdatapad_pad_kelurahan[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_kelurahan[".NCSearch"] = true;



$tdatapad_pad_kelurahan[".shortTableName"] = "pad_pad_kelurahan";
$tdatapad_pad_kelurahan[".nSecOptions"] = 0;
$tdatapad_pad_kelurahan[".recsPerRowList"] = 1;
$tdatapad_pad_kelurahan[".mainTableOwnerID"] = "";
$tdatapad_pad_kelurahan[".moveNext"] = 1;
$tdatapad_pad_kelurahan[".nType"] = 0;

$tdatapad_pad_kelurahan[".strOriginalTableName"] = "pad.pad_kelurahan";




$tdatapad_pad_kelurahan[".showAddInPopup"] = false;

$tdatapad_pad_kelurahan[".showEditInPopup"] = false;

$tdatapad_pad_kelurahan[".showViewInPopup"] = false;

$tdatapad_pad_kelurahan[".fieldsForRegister"] = array();

$tdatapad_pad_kelurahan[".listAjax"] = false;

	$tdatapad_pad_kelurahan[".audit"] = false;

	$tdatapad_pad_kelurahan[".locking"] = false;

$tdatapad_pad_kelurahan[".listIcons"] = true;
$tdatapad_pad_kelurahan[".edit"] = true;
$tdatapad_pad_kelurahan[".inlineEdit"] = true;
$tdatapad_pad_kelurahan[".inlineAdd"] = true;
$tdatapad_pad_kelurahan[".view"] = true;

$tdatapad_pad_kelurahan[".exportTo"] = true;

$tdatapad_pad_kelurahan[".printFriendly"] = true;

$tdatapad_pad_kelurahan[".delete"] = true;

$tdatapad_pad_kelurahan[".showSimpleSearchOptions"] = false;

$tdatapad_pad_kelurahan[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_kelurahan[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_kelurahan[".isUseAjaxSuggest"] = true;

$tdatapad_pad_kelurahan[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_kelurahan[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_kelurahan[".isUseTimeForSearch"] = false;



$tdatapad_pad_kelurahan[".useDetailsPreview"] = true;

$tdatapad_pad_kelurahan[".allSearchFields"] = array();

$tdatapad_pad_kelurahan[".allSearchFields"][] = "id";
$tdatapad_pad_kelurahan[".allSearchFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".allSearchFields"][] = "kode";
$tdatapad_pad_kelurahan[".allSearchFields"][] = "nama";
$tdatapad_pad_kelurahan[".allSearchFields"][] = "tmt";
$tdatapad_pad_kelurahan[".allSearchFields"][] = "enabled";
$tdatapad_pad_kelurahan[".allSearchFields"][] = "created";
$tdatapad_pad_kelurahan[".allSearchFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".allSearchFields"][] = "updated";
$tdatapad_pad_kelurahan[".allSearchFields"][] = "update_uid";

$tdatapad_pad_kelurahan[".googleLikeFields"][] = "id";
$tdatapad_pad_kelurahan[".googleLikeFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".googleLikeFields"][] = "kode";
$tdatapad_pad_kelurahan[".googleLikeFields"][] = "nama";
$tdatapad_pad_kelurahan[".googleLikeFields"][] = "tmt";
$tdatapad_pad_kelurahan[".googleLikeFields"][] = "enabled";
$tdatapad_pad_kelurahan[".googleLikeFields"][] = "created";
$tdatapad_pad_kelurahan[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".googleLikeFields"][] = "updated";
$tdatapad_pad_kelurahan[".googleLikeFields"][] = "update_uid";


$tdatapad_pad_kelurahan[".advSearchFields"][] = "id";
$tdatapad_pad_kelurahan[".advSearchFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".advSearchFields"][] = "kode";
$tdatapad_pad_kelurahan[".advSearchFields"][] = "nama";
$tdatapad_pad_kelurahan[".advSearchFields"][] = "tmt";
$tdatapad_pad_kelurahan[".advSearchFields"][] = "enabled";
$tdatapad_pad_kelurahan[".advSearchFields"][] = "created";
$tdatapad_pad_kelurahan[".advSearchFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".advSearchFields"][] = "updated";
$tdatapad_pad_kelurahan[".advSearchFields"][] = "update_uid";

$tdatapad_pad_kelurahan[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
			


$tdatapad_pad_kelurahan[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_kelurahan[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_kelurahan[".orderindexes"] = array();

$tdatapad_pad_kelurahan[".sqlHead"] = "SELECT id,   kecamatan_id,   kode,   nama,   tmt,   enabled,   created,   create_uid,   updated,   update_uid";
$tdatapad_pad_kelurahan[".sqlFrom"] = "FROM \"pad\".pad_kelurahan";
$tdatapad_pad_kelurahan[".sqlWhereExpr"] = "";
$tdatapad_pad_kelurahan[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_kelurahan[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_kelurahan[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_kelurahan = array();
$tableKeyspad_pad_kelurahan[] = "id";
$tdatapad_pad_kelurahan[".Keys"] = $tableKeyspad_pad_kelurahan;

$tdatapad_pad_kelurahan[".listFields"] = array();
$tdatapad_pad_kelurahan[".listFields"][] = "id";
$tdatapad_pad_kelurahan[".listFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".listFields"][] = "kode";
$tdatapad_pad_kelurahan[".listFields"][] = "nama";
$tdatapad_pad_kelurahan[".listFields"][] = "tmt";
$tdatapad_pad_kelurahan[".listFields"][] = "enabled";
$tdatapad_pad_kelurahan[".listFields"][] = "created";
$tdatapad_pad_kelurahan[".listFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".listFields"][] = "updated";
$tdatapad_pad_kelurahan[".listFields"][] = "update_uid";

$tdatapad_pad_kelurahan[".viewFields"] = array();
$tdatapad_pad_kelurahan[".viewFields"][] = "id";
$tdatapad_pad_kelurahan[".viewFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".viewFields"][] = "kode";
$tdatapad_pad_kelurahan[".viewFields"][] = "nama";
$tdatapad_pad_kelurahan[".viewFields"][] = "tmt";
$tdatapad_pad_kelurahan[".viewFields"][] = "enabled";
$tdatapad_pad_kelurahan[".viewFields"][] = "created";
$tdatapad_pad_kelurahan[".viewFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".viewFields"][] = "updated";
$tdatapad_pad_kelurahan[".viewFields"][] = "update_uid";

$tdatapad_pad_kelurahan[".addFields"] = array();
$tdatapad_pad_kelurahan[".addFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".addFields"][] = "kode";
$tdatapad_pad_kelurahan[".addFields"][] = "nama";
$tdatapad_pad_kelurahan[".addFields"][] = "tmt";
$tdatapad_pad_kelurahan[".addFields"][] = "enabled";
$tdatapad_pad_kelurahan[".addFields"][] = "created";
$tdatapad_pad_kelurahan[".addFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".addFields"][] = "updated";
$tdatapad_pad_kelurahan[".addFields"][] = "update_uid";

$tdatapad_pad_kelurahan[".inlineAddFields"] = array();
$tdatapad_pad_kelurahan[".inlineAddFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".inlineAddFields"][] = "kode";
$tdatapad_pad_kelurahan[".inlineAddFields"][] = "nama";
$tdatapad_pad_kelurahan[".inlineAddFields"][] = "tmt";
$tdatapad_pad_kelurahan[".inlineAddFields"][] = "enabled";
$tdatapad_pad_kelurahan[".inlineAddFields"][] = "created";
$tdatapad_pad_kelurahan[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".inlineAddFields"][] = "updated";
$tdatapad_pad_kelurahan[".inlineAddFields"][] = "update_uid";

$tdatapad_pad_kelurahan[".editFields"] = array();
$tdatapad_pad_kelurahan[".editFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".editFields"][] = "kode";
$tdatapad_pad_kelurahan[".editFields"][] = "nama";
$tdatapad_pad_kelurahan[".editFields"][] = "tmt";
$tdatapad_pad_kelurahan[".editFields"][] = "enabled";
$tdatapad_pad_kelurahan[".editFields"][] = "created";
$tdatapad_pad_kelurahan[".editFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".editFields"][] = "updated";
$tdatapad_pad_kelurahan[".editFields"][] = "update_uid";

$tdatapad_pad_kelurahan[".inlineEditFields"] = array();
$tdatapad_pad_kelurahan[".inlineEditFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".inlineEditFields"][] = "kode";
$tdatapad_pad_kelurahan[".inlineEditFields"][] = "nama";
$tdatapad_pad_kelurahan[".inlineEditFields"][] = "tmt";
$tdatapad_pad_kelurahan[".inlineEditFields"][] = "enabled";
$tdatapad_pad_kelurahan[".inlineEditFields"][] = "created";
$tdatapad_pad_kelurahan[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".inlineEditFields"][] = "updated";
$tdatapad_pad_kelurahan[".inlineEditFields"][] = "update_uid";

$tdatapad_pad_kelurahan[".exportFields"] = array();
$tdatapad_pad_kelurahan[".exportFields"][] = "id";
$tdatapad_pad_kelurahan[".exportFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".exportFields"][] = "kode";
$tdatapad_pad_kelurahan[".exportFields"][] = "nama";
$tdatapad_pad_kelurahan[".exportFields"][] = "tmt";
$tdatapad_pad_kelurahan[".exportFields"][] = "enabled";
$tdatapad_pad_kelurahan[".exportFields"][] = "created";
$tdatapad_pad_kelurahan[".exportFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".exportFields"][] = "updated";
$tdatapad_pad_kelurahan[".exportFields"][] = "update_uid";

$tdatapad_pad_kelurahan[".printFields"] = array();
$tdatapad_pad_kelurahan[".printFields"][] = "id";
$tdatapad_pad_kelurahan[".printFields"][] = "kecamatan_id";
$tdatapad_pad_kelurahan[".printFields"][] = "kode";
$tdatapad_pad_kelurahan[".printFields"][] = "nama";
$tdatapad_pad_kelurahan[".printFields"][] = "tmt";
$tdatapad_pad_kelurahan[".printFields"][] = "enabled";
$tdatapad_pad_kelurahan[".printFields"][] = "created";
$tdatapad_pad_kelurahan[".printFields"][] = "create_uid";
$tdatapad_pad_kelurahan[".printFields"][] = "updated";
$tdatapad_pad_kelurahan[".printFields"][] = "update_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
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
	
		
		
	$tdatapad_pad_kelurahan["id"] = $fdata;
//	kecamatan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "kecamatan_id";
	$fdata["GoodName"] = "kecamatan_id";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
	$fdata["Label"] = "Kecamatan Id"; 
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
	
		$fdata["strField"] = "kecamatan_id"; 
		$fdata["FullName"] = "kecamatan_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kelurahan["kecamatan_id"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
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
			$edata["EditParams"].= " maxlength=3";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_kelurahan["kode"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_kelurahan["nama"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
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
	
		
		
	$tdatapad_pad_kelurahan["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
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
	
		
		
	$tdatapad_pad_kelurahan["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
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
	
		
		
	$tdatapad_pad_kelurahan["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
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
	
		
		
	$tdatapad_pad_kelurahan["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
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
	
		
		
	$tdatapad_pad_kelurahan["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_kelurahan";
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
	
		
		
	$tdatapad_pad_kelurahan["update_uid"] = $fdata;

	
$tables_data["pad.pad_kelurahan"]=&$tdatapad_pad_kelurahan;
$field_labels["pad_pad_kelurahan"] = &$fieldLabelspad_pad_kelurahan;
$fieldToolTips["pad.pad_kelurahan"] = &$fieldToolTipspad_pad_kelurahan;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_kelurahan"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_customer_usaha";
	$detailsParam["dDataSourceTable"]="pad.pad_customer_usaha";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_customer_usaha";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_kelurahan"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_kelurahan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_kelurahan"][$dIndex]["detailKeys"][]="kelurahan_id";

$dIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_customer";
	$detailsParam["dDataSourceTable"]="pad.pad_customer";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_customer";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_kelurahan"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_kelurahan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_kelurahan"][$dIndex]["detailKeys"][]="kelurahan_id";

$dIndex = 3-1;
			$strOriginalDetailsTable="pad.pad_daftar";
	$detailsParam["dDataSourceTable"]="pad.pad_daftar";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_daftar";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_kelurahan"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_kelurahan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_kelurahan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_kelurahan"][$dIndex]["detailKeys"][]="kelurahan_id";
		$detailsTablesData["pad.pad_kelurahan"][$dIndex]["detailKeys"][]="op_kelurahan_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_kelurahan"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_kecamatan";
	$masterParams["mDataSourceTable"]="pad.pad_kecamatan";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_kecamatan";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_kelurahan"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_kelurahan"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_kelurahan"][$mIndex]["detailKeys"][]="kecamatan_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_kelurahan()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   kecamatan_id,   kode,   nama,   tmt,   enabled,   created,   create_uid,   updated,   update_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_kelurahan";
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
	"m_strTable" => "pad.pad_kelurahan"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "kecamatan_id",
	"m_strTable" => "pad.pad_kelurahan"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "pad.pad_kelurahan"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_kelurahan"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_kelurahan"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_kelurahan"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_kelurahan"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_kelurahan"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_kelurahan"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_kelurahan"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto25=array();
$proto25["m_link"] = "SQLL_MAIN";
			$proto26=array();
$proto26["m_strName"] = "pad.pad_kelurahan";
$proto26["m_columns"] = array();
$proto26["m_columns"][] = "id";
$proto26["m_columns"][] = "kecamatan_id";
$proto26["m_columns"][] = "kode";
$proto26["m_columns"][] = "nama";
$proto26["m_columns"][] = "tmt";
$proto26["m_columns"][] = "enabled";
$proto26["m_columns"][] = "created";
$proto26["m_columns"][] = "create_uid";
$proto26["m_columns"][] = "updated";
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
$queryData_pad_pad_kelurahan = createSqlQuery_pad_pad_kelurahan();
										$tdatapad_pad_kelurahan[".sqlquery"] = $queryData_pad_pad_kelurahan;
	
if(isset($tdatapad_pad_kelurahan["field2"])){
	$tdatapad_pad_kelurahan["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_kelurahan["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_kelurahan["field2"]["LookupType"] = 4;
	$tdatapad_pad_kelurahan["field2"]["LinkField"] = "email";
	$tdatapad_pad_kelurahan["field2"]["DisplayField"] = "name";
	$tdatapad_pad_kelurahan[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_kelurahan"] = new eventsBase;
$tdatapad_pad_kelurahan[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_kelurahan");

?>