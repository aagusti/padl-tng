<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_reklame_kelas_jalan = array();
	$tdatapad_pad_reklame_kelas_jalan[".NumberOfChars"] = 80; 
	$tdatapad_pad_reklame_kelas_jalan[".ShortName"] = "pad_pad_reklame_kelas_jalan";
	$tdatapad_pad_reklame_kelas_jalan[".OwnerID"] = "";
	$tdatapad_pad_reklame_kelas_jalan[".OriginalTable"] = "pad.pad_reklame_kelas_jalan";

//	field labels
$fieldLabelspad_pad_reklame_kelas_jalan = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_reklame_kelas_jalan["English"] = array();
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"] = array();
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["id"] = "Id";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["id"] = "";
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["nama"] = "";
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["nilai"] = "Nilai";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["nilai"] = "";
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["update_uid"] = "";
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["create_uid"] = "";
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["updated"] = "";
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["created"] = "Created";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["created"] = "";
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["singkatan"] = "Singkatan";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["singkatan"] = "";
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["kriteria"] = "Kriteria";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["kriteria"] = "";
	$fieldLabelspad_pad_reklame_kelas_jalan["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_reklame_kelas_jalan["English"]["enabled"] = "";
	if (count($fieldToolTipspad_pad_reklame_kelas_jalan["English"]))
		$tdatapad_pad_reklame_kelas_jalan[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_reklame_kelas_jalan[".NCSearch"] = true;



$tdatapad_pad_reklame_kelas_jalan[".shortTableName"] = "pad_pad_reklame_kelas_jalan";
$tdatapad_pad_reklame_kelas_jalan[".nSecOptions"] = 0;
$tdatapad_pad_reklame_kelas_jalan[".recsPerRowList"] = 1;
$tdatapad_pad_reklame_kelas_jalan[".mainTableOwnerID"] = "";
$tdatapad_pad_reklame_kelas_jalan[".moveNext"] = 1;
$tdatapad_pad_reklame_kelas_jalan[".nType"] = 0;

$tdatapad_pad_reklame_kelas_jalan[".strOriginalTableName"] = "pad.pad_reklame_kelas_jalan";




$tdatapad_pad_reklame_kelas_jalan[".showAddInPopup"] = false;

$tdatapad_pad_reklame_kelas_jalan[".showEditInPopup"] = false;

$tdatapad_pad_reklame_kelas_jalan[".showViewInPopup"] = false;

$tdatapad_pad_reklame_kelas_jalan[".fieldsForRegister"] = array();

$tdatapad_pad_reklame_kelas_jalan[".listAjax"] = false;

	$tdatapad_pad_reklame_kelas_jalan[".audit"] = false;

	$tdatapad_pad_reklame_kelas_jalan[".locking"] = false;

$tdatapad_pad_reklame_kelas_jalan[".listIcons"] = true;
$tdatapad_pad_reklame_kelas_jalan[".edit"] = true;
$tdatapad_pad_reklame_kelas_jalan[".inlineEdit"] = true;
$tdatapad_pad_reklame_kelas_jalan[".inlineAdd"] = true;
$tdatapad_pad_reklame_kelas_jalan[".view"] = true;

$tdatapad_pad_reklame_kelas_jalan[".exportTo"] = true;

$tdatapad_pad_reklame_kelas_jalan[".printFriendly"] = true;

$tdatapad_pad_reklame_kelas_jalan[".delete"] = true;

$tdatapad_pad_reklame_kelas_jalan[".showSimpleSearchOptions"] = false;

$tdatapad_pad_reklame_kelas_jalan[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_reklame_kelas_jalan[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_reklame_kelas_jalan[".isUseAjaxSuggest"] = true;

$tdatapad_pad_reklame_kelas_jalan[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_reklame_kelas_jalan[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_reklame_kelas_jalan[".isUseTimeForSearch"] = false;



$tdatapad_pad_reklame_kelas_jalan[".useDetailsPreview"] = true;

$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"] = array();

$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "id";
$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".allSearchFields"][] = "enabled";

$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "id";
$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".googleLikeFields"][] = "enabled";


$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "id";
$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".advSearchFields"][] = "enabled";

$tdatapad_pad_reklame_kelas_jalan[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdatapad_pad_reklame_kelas_jalan[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_reklame_kelas_jalan[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_reklame_kelas_jalan[".orderindexes"] = array();

$tdatapad_pad_reklame_kelas_jalan[".sqlHead"] = "SELECT id,   nama,   nilai,   update_uid,   create_uid,   updated,   created,   singkatan,   kriteria,   enabled";
$tdatapad_pad_reklame_kelas_jalan[".sqlFrom"] = "FROM \"pad\".pad_reklame_kelas_jalan";
$tdatapad_pad_reklame_kelas_jalan[".sqlWhereExpr"] = "";
$tdatapad_pad_reklame_kelas_jalan[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_reklame_kelas_jalan[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_reklame_kelas_jalan[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_reklame_kelas_jalan = array();
$tableKeyspad_pad_reklame_kelas_jalan[] = "id";
$tdatapad_pad_reklame_kelas_jalan[".Keys"] = $tableKeyspad_pad_reklame_kelas_jalan;

$tdatapad_pad_reklame_kelas_jalan[".listFields"] = array();
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "id";
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".listFields"][] = "enabled";

$tdatapad_pad_reklame_kelas_jalan[".viewFields"] = array();
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "id";
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".viewFields"][] = "enabled";

$tdatapad_pad_reklame_kelas_jalan[".addFields"] = array();
$tdatapad_pad_reklame_kelas_jalan[".addFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".addFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".addFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".addFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".addFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".addFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".addFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".addFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".addFields"][] = "enabled";

$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"] = array();
$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".inlineAddFields"][] = "enabled";

$tdatapad_pad_reklame_kelas_jalan[".editFields"] = array();
$tdatapad_pad_reklame_kelas_jalan[".editFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".editFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".editFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".editFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".editFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".editFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".editFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".editFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".editFields"][] = "enabled";

$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"] = array();
$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".inlineEditFields"][] = "enabled";

$tdatapad_pad_reklame_kelas_jalan[".exportFields"] = array();
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "id";
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".exportFields"][] = "enabled";

$tdatapad_pad_reklame_kelas_jalan[".printFields"] = array();
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "id";
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "nama";
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "nilai";
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "update_uid";
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "create_uid";
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "updated";
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "created";
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "singkatan";
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "kriteria";
$tdatapad_pad_reklame_kelas_jalan[".printFields"][] = "enabled";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
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
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
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
			$edata["EditParams"].= " maxlength=254";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["nama"] = $fdata;
//	nilai
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nilai";
	$fdata["GoodName"] = "nilai";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
	$fdata["Label"] = "Nilai"; 
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
	
		$fdata["strField"] = "nilai"; 
		$fdata["FullName"] = "nilai";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["nilai"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
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
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
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
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
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
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
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
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["created"] = $fdata;
//	singkatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "singkatan";
	$fdata["GoodName"] = "singkatan";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
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
			$edata["EditParams"].= " maxlength=2";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["singkatan"] = $fdata;
//	kriteria
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "kriteria";
	$fdata["GoodName"] = "kriteria";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
	$fdata["Label"] = "Kriteria"; 
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
	
		$fdata["strField"] = "kriteria"; 
		$fdata["FullName"] = "kriteria";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["kriteria"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_reklame_kelas_jalan";
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
	
		
		
	$tdatapad_pad_reklame_kelas_jalan["enabled"] = $fdata;

	
$tables_data["pad.pad_reklame_kelas_jalan"]=&$tdatapad_pad_reklame_kelas_jalan;
$field_labels["pad_pad_reklame_kelas_jalan"] = &$fieldLabelspad_pad_reklame_kelas_jalan;
$fieldToolTips["pad.pad_reklame_kelas_jalan"] = &$fieldToolTipspad_pad_reklame_kelas_jalan;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_reklame_kelas_jalan"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_reklame_jalan";
	$detailsParam["dDataSourceTable"]="pad.pad_reklame_jalan";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_reklame_jalan";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_reklame_kelas_jalan"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_reklame_kelas_jalan"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_reklame_kelas_jalan"][$dIndex]["detailKeys"][]="jalan_kelas_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_reklame_kelas_jalan"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_reklame_kelas_jalan()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama,   nilai,   update_uid,   create_uid,   updated,   created,   singkatan,   kriteria,   enabled";
$proto0["m_strFrom"] = "FROM \"pad\".pad_reklame_kelas_jalan";
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
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nilai",
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "singkatan",
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "kriteria",
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_reklame_kelas_jalan"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto25=array();
$proto25["m_link"] = "SQLL_MAIN";
			$proto26=array();
$proto26["m_strName"] = "pad.pad_reklame_kelas_jalan";
$proto26["m_columns"] = array();
$proto26["m_columns"][] = "id";
$proto26["m_columns"][] = "nama";
$proto26["m_columns"][] = "nilai";
$proto26["m_columns"][] = "update_uid";
$proto26["m_columns"][] = "create_uid";
$proto26["m_columns"][] = "updated";
$proto26["m_columns"][] = "created";
$proto26["m_columns"][] = "singkatan";
$proto26["m_columns"][] = "kriteria";
$proto26["m_columns"][] = "enabled";
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
$queryData_pad_pad_reklame_kelas_jalan = createSqlQuery_pad_pad_reklame_kelas_jalan();
										$tdatapad_pad_reklame_kelas_jalan[".sqlquery"] = $queryData_pad_pad_reklame_kelas_jalan;
	
if(isset($tdatapad_pad_reklame_kelas_jalan["field2"])){
	$tdatapad_pad_reklame_kelas_jalan["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_reklame_kelas_jalan["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_reklame_kelas_jalan["field2"]["LookupType"] = 4;
	$tdatapad_pad_reklame_kelas_jalan["field2"]["LinkField"] = "email";
	$tdatapad_pad_reklame_kelas_jalan["field2"]["DisplayField"] = "name";
	$tdatapad_pad_reklame_kelas_jalan[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_reklame_kelas_jalan"] = new eventsBase;
$tdatapad_pad_reklame_kelas_jalan[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_reklame_kelas_jalan");

?>