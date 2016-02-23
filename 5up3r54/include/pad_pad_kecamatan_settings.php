<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_kecamatan = array();
	$tdatapad_pad_kecamatan[".NumberOfChars"] = 80; 
	$tdatapad_pad_kecamatan[".ShortName"] = "pad_pad_kecamatan";
	$tdatapad_pad_kecamatan[".OwnerID"] = "";
	$tdatapad_pad_kecamatan[".OriginalTable"] = "pad.pad_kecamatan";

//	field labels
$fieldLabelspad_pad_kecamatan = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_kecamatan["English"] = array();
	$fieldToolTipspad_pad_kecamatan["English"] = array();
	$fieldLabelspad_pad_kecamatan["English"]["id"] = "Id";
	$fieldToolTipspad_pad_kecamatan["English"]["id"] = "";
	$fieldLabelspad_pad_kecamatan["English"]["kode"] = "Kode";
	$fieldToolTipspad_pad_kecamatan["English"]["kode"] = "";
	$fieldLabelspad_pad_kecamatan["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_kecamatan["English"]["nama"] = "";
	$fieldLabelspad_pad_kecamatan["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_kecamatan["English"]["tmt"] = "";
	$fieldLabelspad_pad_kecamatan["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_kecamatan["English"]["enabled"] = "";
	$fieldLabelspad_pad_kecamatan["English"]["created"] = "Created";
	$fieldToolTipspad_pad_kecamatan["English"]["created"] = "";
	$fieldLabelspad_pad_kecamatan["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_kecamatan["English"]["create_uid"] = "";
	$fieldLabelspad_pad_kecamatan["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_kecamatan["English"]["updated"] = "";
	$fieldLabelspad_pad_kecamatan["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_kecamatan["English"]["update_uid"] = "";
	$fieldLabelspad_pad_kecamatan["English"]["zona_id"] = "Zona Id";
	$fieldToolTipspad_pad_kecamatan["English"]["zona_id"] = "";
	if (count($fieldToolTipspad_pad_kecamatan["English"]))
		$tdatapad_pad_kecamatan[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_kecamatan[".NCSearch"] = true;



$tdatapad_pad_kecamatan[".shortTableName"] = "pad_pad_kecamatan";
$tdatapad_pad_kecamatan[".nSecOptions"] = 0;
$tdatapad_pad_kecamatan[".recsPerRowList"] = 1;
$tdatapad_pad_kecamatan[".mainTableOwnerID"] = "";
$tdatapad_pad_kecamatan[".moveNext"] = 1;
$tdatapad_pad_kecamatan[".nType"] = 0;

$tdatapad_pad_kecamatan[".strOriginalTableName"] = "pad.pad_kecamatan";




$tdatapad_pad_kecamatan[".showAddInPopup"] = false;

$tdatapad_pad_kecamatan[".showEditInPopup"] = false;

$tdatapad_pad_kecamatan[".showViewInPopup"] = false;

$tdatapad_pad_kecamatan[".fieldsForRegister"] = array();

$tdatapad_pad_kecamatan[".listAjax"] = false;

	$tdatapad_pad_kecamatan[".audit"] = false;

	$tdatapad_pad_kecamatan[".locking"] = false;

$tdatapad_pad_kecamatan[".listIcons"] = true;
$tdatapad_pad_kecamatan[".edit"] = true;
$tdatapad_pad_kecamatan[".inlineEdit"] = true;
$tdatapad_pad_kecamatan[".inlineAdd"] = true;
$tdatapad_pad_kecamatan[".view"] = true;

$tdatapad_pad_kecamatan[".exportTo"] = true;

$tdatapad_pad_kecamatan[".printFriendly"] = true;

$tdatapad_pad_kecamatan[".delete"] = true;

$tdatapad_pad_kecamatan[".showSimpleSearchOptions"] = false;

$tdatapad_pad_kecamatan[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_kecamatan[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_kecamatan[".isUseAjaxSuggest"] = true;

$tdatapad_pad_kecamatan[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_kecamatan[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_kecamatan[".isUseTimeForSearch"] = false;



$tdatapad_pad_kecamatan[".useDetailsPreview"] = true;

$tdatapad_pad_kecamatan[".allSearchFields"] = array();

$tdatapad_pad_kecamatan[".allSearchFields"][] = "id";
$tdatapad_pad_kecamatan[".allSearchFields"][] = "kode";
$tdatapad_pad_kecamatan[".allSearchFields"][] = "nama";
$tdatapad_pad_kecamatan[".allSearchFields"][] = "tmt";
$tdatapad_pad_kecamatan[".allSearchFields"][] = "enabled";
$tdatapad_pad_kecamatan[".allSearchFields"][] = "created";
$tdatapad_pad_kecamatan[".allSearchFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".allSearchFields"][] = "updated";
$tdatapad_pad_kecamatan[".allSearchFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".allSearchFields"][] = "zona_id";

$tdatapad_pad_kecamatan[".googleLikeFields"][] = "id";
$tdatapad_pad_kecamatan[".googleLikeFields"][] = "kode";
$tdatapad_pad_kecamatan[".googleLikeFields"][] = "nama";
$tdatapad_pad_kecamatan[".googleLikeFields"][] = "tmt";
$tdatapad_pad_kecamatan[".googleLikeFields"][] = "enabled";
$tdatapad_pad_kecamatan[".googleLikeFields"][] = "created";
$tdatapad_pad_kecamatan[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".googleLikeFields"][] = "updated";
$tdatapad_pad_kecamatan[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".googleLikeFields"][] = "zona_id";


$tdatapad_pad_kecamatan[".advSearchFields"][] = "id";
$tdatapad_pad_kecamatan[".advSearchFields"][] = "kode";
$tdatapad_pad_kecamatan[".advSearchFields"][] = "nama";
$tdatapad_pad_kecamatan[".advSearchFields"][] = "tmt";
$tdatapad_pad_kecamatan[".advSearchFields"][] = "enabled";
$tdatapad_pad_kecamatan[".advSearchFields"][] = "created";
$tdatapad_pad_kecamatan[".advSearchFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".advSearchFields"][] = "updated";
$tdatapad_pad_kecamatan[".advSearchFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".advSearchFields"][] = "zona_id";

$tdatapad_pad_kecamatan[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
				


$tdatapad_pad_kecamatan[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_kecamatan[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_kecamatan[".orderindexes"] = array();

$tdatapad_pad_kecamatan[".sqlHead"] = "SELECT id,   kode,   nama,   tmt,   enabled,   created,   create_uid,   updated,   update_uid,   zona_id";
$tdatapad_pad_kecamatan[".sqlFrom"] = "FROM \"pad\".pad_kecamatan";
$tdatapad_pad_kecamatan[".sqlWhereExpr"] = "";
$tdatapad_pad_kecamatan[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_kecamatan[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_kecamatan[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_kecamatan = array();
$tableKeyspad_pad_kecamatan[] = "id";
$tdatapad_pad_kecamatan[".Keys"] = $tableKeyspad_pad_kecamatan;

$tdatapad_pad_kecamatan[".listFields"] = array();
$tdatapad_pad_kecamatan[".listFields"][] = "id";
$tdatapad_pad_kecamatan[".listFields"][] = "kode";
$tdatapad_pad_kecamatan[".listFields"][] = "nama";
$tdatapad_pad_kecamatan[".listFields"][] = "tmt";
$tdatapad_pad_kecamatan[".listFields"][] = "enabled";
$tdatapad_pad_kecamatan[".listFields"][] = "created";
$tdatapad_pad_kecamatan[".listFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".listFields"][] = "updated";
$tdatapad_pad_kecamatan[".listFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".listFields"][] = "zona_id";

$tdatapad_pad_kecamatan[".viewFields"] = array();
$tdatapad_pad_kecamatan[".viewFields"][] = "id";
$tdatapad_pad_kecamatan[".viewFields"][] = "kode";
$tdatapad_pad_kecamatan[".viewFields"][] = "nama";
$tdatapad_pad_kecamatan[".viewFields"][] = "tmt";
$tdatapad_pad_kecamatan[".viewFields"][] = "enabled";
$tdatapad_pad_kecamatan[".viewFields"][] = "created";
$tdatapad_pad_kecamatan[".viewFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".viewFields"][] = "updated";
$tdatapad_pad_kecamatan[".viewFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".viewFields"][] = "zona_id";

$tdatapad_pad_kecamatan[".addFields"] = array();
$tdatapad_pad_kecamatan[".addFields"][] = "kode";
$tdatapad_pad_kecamatan[".addFields"][] = "nama";
$tdatapad_pad_kecamatan[".addFields"][] = "tmt";
$tdatapad_pad_kecamatan[".addFields"][] = "enabled";
$tdatapad_pad_kecamatan[".addFields"][] = "created";
$tdatapad_pad_kecamatan[".addFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".addFields"][] = "updated";
$tdatapad_pad_kecamatan[".addFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".addFields"][] = "zona_id";

$tdatapad_pad_kecamatan[".inlineAddFields"] = array();
$tdatapad_pad_kecamatan[".inlineAddFields"][] = "kode";
$tdatapad_pad_kecamatan[".inlineAddFields"][] = "nama";
$tdatapad_pad_kecamatan[".inlineAddFields"][] = "tmt";
$tdatapad_pad_kecamatan[".inlineAddFields"][] = "enabled";
$tdatapad_pad_kecamatan[".inlineAddFields"][] = "created";
$tdatapad_pad_kecamatan[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".inlineAddFields"][] = "updated";
$tdatapad_pad_kecamatan[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".inlineAddFields"][] = "zona_id";

$tdatapad_pad_kecamatan[".editFields"] = array();
$tdatapad_pad_kecamatan[".editFields"][] = "kode";
$tdatapad_pad_kecamatan[".editFields"][] = "nama";
$tdatapad_pad_kecamatan[".editFields"][] = "tmt";
$tdatapad_pad_kecamatan[".editFields"][] = "enabled";
$tdatapad_pad_kecamatan[".editFields"][] = "created";
$tdatapad_pad_kecamatan[".editFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".editFields"][] = "updated";
$tdatapad_pad_kecamatan[".editFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".editFields"][] = "zona_id";

$tdatapad_pad_kecamatan[".inlineEditFields"] = array();
$tdatapad_pad_kecamatan[".inlineEditFields"][] = "kode";
$tdatapad_pad_kecamatan[".inlineEditFields"][] = "nama";
$tdatapad_pad_kecamatan[".inlineEditFields"][] = "tmt";
$tdatapad_pad_kecamatan[".inlineEditFields"][] = "enabled";
$tdatapad_pad_kecamatan[".inlineEditFields"][] = "created";
$tdatapad_pad_kecamatan[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".inlineEditFields"][] = "updated";
$tdatapad_pad_kecamatan[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".inlineEditFields"][] = "zona_id";

$tdatapad_pad_kecamatan[".exportFields"] = array();
$tdatapad_pad_kecamatan[".exportFields"][] = "id";
$tdatapad_pad_kecamatan[".exportFields"][] = "kode";
$tdatapad_pad_kecamatan[".exportFields"][] = "nama";
$tdatapad_pad_kecamatan[".exportFields"][] = "tmt";
$tdatapad_pad_kecamatan[".exportFields"][] = "enabled";
$tdatapad_pad_kecamatan[".exportFields"][] = "created";
$tdatapad_pad_kecamatan[".exportFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".exportFields"][] = "updated";
$tdatapad_pad_kecamatan[".exportFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".exportFields"][] = "zona_id";

$tdatapad_pad_kecamatan[".printFields"] = array();
$tdatapad_pad_kecamatan[".printFields"][] = "id";
$tdatapad_pad_kecamatan[".printFields"][] = "kode";
$tdatapad_pad_kecamatan[".printFields"][] = "nama";
$tdatapad_pad_kecamatan[".printFields"][] = "tmt";
$tdatapad_pad_kecamatan[".printFields"][] = "enabled";
$tdatapad_pad_kecamatan[".printFields"][] = "created";
$tdatapad_pad_kecamatan[".printFields"][] = "create_uid";
$tdatapad_pad_kecamatan[".printFields"][] = "updated";
$tdatapad_pad_kecamatan[".printFields"][] = "update_uid";
$tdatapad_pad_kecamatan[".printFields"][] = "zona_id";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kecamatan["id"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kecamatan["kode"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_kecamatan["nama"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kecamatan["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kecamatan["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kecamatan["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kecamatan["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kecamatan["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kecamatan["update_uid"] = $fdata;
//	zona_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "zona_id";
	$fdata["GoodName"] = "zona_id";
	$fdata["ownerTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_kecamatan["zona_id"] = $fdata;

	
$tables_data["pad.pad_kecamatan"]=&$tdatapad_pad_kecamatan;
$field_labels["pad_pad_kecamatan"] = &$fieldLabelspad_pad_kecamatan;
$fieldToolTips["pad.pad_kecamatan"] = &$fieldToolTipspad_pad_kecamatan;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_kecamatan"] = array();
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
		
	$detailsTablesData["pad.pad_kecamatan"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["detailKeys"][]="kecamatan_id";

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
		
	$detailsTablesData["pad.pad_kecamatan"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["detailKeys"][]="kecamatan_id";

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
		
	$detailsTablesData["pad.pad_kecamatan"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["detailKeys"][]="kecamatan_id";
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["detailKeys"][]="op_kecamatan_id";

$dIndex = 4-1;
			$strOriginalDetailsTable="pad.pad_kelurahan";
	$detailsParam["dDataSourceTable"]="pad.pad_kelurahan";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_kelurahan";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_kecamatan"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_kecamatan"][$dIndex]["detailKeys"][]="kecamatan_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_kecamatan"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_kecamatan()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   kode,   nama,   tmt,   enabled,   created,   create_uid,   updated,   update_uid,   zona_id";
$proto0["m_strFrom"] = "FROM \"pad\".pad_kecamatan";
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
	"m_strTable" => "pad.pad_kecamatan"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "pad.pad_kecamatan"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_kecamatan"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_kecamatan"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_kecamatan"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_kecamatan"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_kecamatan"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_kecamatan"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_kecamatan"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "zona_id",
	"m_strTable" => "pad.pad_kecamatan"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto25=array();
$proto25["m_link"] = "SQLL_MAIN";
			$proto26=array();
$proto26["m_strName"] = "pad.pad_kecamatan";
$proto26["m_columns"] = array();
$proto26["m_columns"][] = "id";
$proto26["m_columns"][] = "kode";
$proto26["m_columns"][] = "nama";
$proto26["m_columns"][] = "tmt";
$proto26["m_columns"][] = "enabled";
$proto26["m_columns"][] = "created";
$proto26["m_columns"][] = "create_uid";
$proto26["m_columns"][] = "updated";
$proto26["m_columns"][] = "update_uid";
$proto26["m_columns"][] = "zona_id";
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
$queryData_pad_pad_kecamatan = createSqlQuery_pad_pad_kecamatan();
										$tdatapad_pad_kecamatan[".sqlquery"] = $queryData_pad_pad_kecamatan;
	
if(isset($tdatapad_pad_kecamatan["field2"])){
	$tdatapad_pad_kecamatan["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_kecamatan["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_kecamatan["field2"]["LookupType"] = 4;
	$tdatapad_pad_kecamatan["field2"]["LinkField"] = "email";
	$tdatapad_pad_kecamatan["field2"]["DisplayField"] = "name";
	$tdatapad_pad_kecamatan[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_kecamatan"] = new eventsBase;
$tdatapad_pad_kecamatan[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_kecamatan");

?>