<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_reklame_jalan = array();
	$tdatapad_pad_reklame_jalan[".NumberOfChars"] = 80; 
	$tdatapad_pad_reklame_jalan[".ShortName"] = "pad_pad_reklame_jalan";
	$tdatapad_pad_reklame_jalan[".OwnerID"] = "";
	$tdatapad_pad_reklame_jalan[".OriginalTable"] = "pad.pad_reklame_jalan";

//	field labels
$fieldLabelspad_pad_reklame_jalan = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_reklame_jalan["English"] = array();
	$fieldToolTipspad_pad_reklame_jalan["English"] = array();
	$fieldLabelspad_pad_reklame_jalan["English"]["id"] = "Id";
	$fieldToolTipspad_pad_reklame_jalan["English"]["id"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["jalan_kelas_id"] = "Jalan Kelas Id";
	$fieldToolTipspad_pad_reklame_jalan["English"]["jalan_kelas_id"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["kode"] = "Kode";
	$fieldToolTipspad_pad_reklame_jalan["English"]["kode"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_reklame_jalan["English"]["nama"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_reklame_jalan["English"]["tmt"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_reklame_jalan["English"]["enabled"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["create_date"] = "Create Date";
	$fieldToolTipspad_pad_reklame_jalan["English"]["create_date"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_reklame_jalan["English"]["create_uid"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_reklame_jalan["English"]["update_uid"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_reklame_jalan["English"]["updated"] = "";
	$fieldLabelspad_pad_reklame_jalan["English"]["created"] = "Created";
	$fieldToolTipspad_pad_reklame_jalan["English"]["created"] = "";
	if (count($fieldToolTipspad_pad_reklame_jalan["English"]))
		$tdatapad_pad_reklame_jalan[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_reklame_jalan[".NCSearch"] = true;



$tdatapad_pad_reklame_jalan[".shortTableName"] = "pad_pad_reklame_jalan";
$tdatapad_pad_reklame_jalan[".nSecOptions"] = 0;
$tdatapad_pad_reklame_jalan[".recsPerRowList"] = 1;
$tdatapad_pad_reklame_jalan[".mainTableOwnerID"] = "";
$tdatapad_pad_reklame_jalan[".moveNext"] = 1;
$tdatapad_pad_reklame_jalan[".nType"] = 0;

$tdatapad_pad_reklame_jalan[".strOriginalTableName"] = "pad.pad_reklame_jalan";




$tdatapad_pad_reklame_jalan[".showAddInPopup"] = false;

$tdatapad_pad_reklame_jalan[".showEditInPopup"] = false;

$tdatapad_pad_reklame_jalan[".showViewInPopup"] = false;

$tdatapad_pad_reklame_jalan[".fieldsForRegister"] = array();

$tdatapad_pad_reklame_jalan[".listAjax"] = false;

	$tdatapad_pad_reklame_jalan[".audit"] = false;

	$tdatapad_pad_reklame_jalan[".locking"] = false;

$tdatapad_pad_reklame_jalan[".listIcons"] = true;
$tdatapad_pad_reklame_jalan[".edit"] = true;
$tdatapad_pad_reklame_jalan[".inlineEdit"] = true;
$tdatapad_pad_reklame_jalan[".inlineAdd"] = true;
$tdatapad_pad_reklame_jalan[".view"] = true;

$tdatapad_pad_reklame_jalan[".exportTo"] = true;

$tdatapad_pad_reklame_jalan[".printFriendly"] = true;

$tdatapad_pad_reklame_jalan[".delete"] = true;

$tdatapad_pad_reklame_jalan[".showSimpleSearchOptions"] = false;

$tdatapad_pad_reklame_jalan[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_reklame_jalan[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_reklame_jalan[".isUseAjaxSuggest"] = true;

$tdatapad_pad_reklame_jalan[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_reklame_jalan[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_reklame_jalan[".isUseTimeForSearch"] = false;




$tdatapad_pad_reklame_jalan[".allSearchFields"] = array();

$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "id";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".allSearchFields"][] = "created";

$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "id";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".googleLikeFields"][] = "created";


$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "id";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".advSearchFields"][] = "created";

$tdatapad_pad_reklame_jalan[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_reklame_jalan[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_reklame_jalan[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_reklame_jalan[".orderindexes"] = array();

$tdatapad_pad_reklame_jalan[".sqlHead"] = "SELECT id,   jalan_kelas_id,   kode,   nama,   tmt,   enabled,   create_date,   create_uid,   update_uid,   updated,   created";
$tdatapad_pad_reklame_jalan[".sqlFrom"] = "FROM \"pad\".pad_reklame_jalan";
$tdatapad_pad_reklame_jalan[".sqlWhereExpr"] = "";
$tdatapad_pad_reklame_jalan[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_reklame_jalan[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_reklame_jalan[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_reklame_jalan = array();
$tableKeyspad_pad_reklame_jalan[] = "id";
$tdatapad_pad_reklame_jalan[".Keys"] = $tableKeyspad_pad_reklame_jalan;

$tdatapad_pad_reklame_jalan[".listFields"] = array();
$tdatapad_pad_reklame_jalan[".listFields"][] = "id";
$tdatapad_pad_reklame_jalan[".listFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".listFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".listFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".listFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".listFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".listFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".listFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".listFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".listFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".listFields"][] = "created";

$tdatapad_pad_reklame_jalan[".viewFields"] = array();
$tdatapad_pad_reklame_jalan[".viewFields"][] = "id";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".viewFields"][] = "created";

$tdatapad_pad_reklame_jalan[".addFields"] = array();
$tdatapad_pad_reklame_jalan[".addFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".addFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".addFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".addFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".addFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".addFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".addFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".addFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".addFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".addFields"][] = "created";

$tdatapad_pad_reklame_jalan[".inlineAddFields"] = array();
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".inlineAddFields"][] = "created";

$tdatapad_pad_reklame_jalan[".editFields"] = array();
$tdatapad_pad_reklame_jalan[".editFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".editFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".editFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".editFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".editFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".editFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".editFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".editFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".editFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".editFields"][] = "created";

$tdatapad_pad_reklame_jalan[".inlineEditFields"] = array();
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".inlineEditFields"][] = "created";

$tdatapad_pad_reklame_jalan[".exportFields"] = array();
$tdatapad_pad_reklame_jalan[".exportFields"][] = "id";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".exportFields"][] = "created";

$tdatapad_pad_reklame_jalan[".printFields"] = array();
$tdatapad_pad_reklame_jalan[".printFields"][] = "id";
$tdatapad_pad_reklame_jalan[".printFields"][] = "jalan_kelas_id";
$tdatapad_pad_reklame_jalan[".printFields"][] = "kode";
$tdatapad_pad_reklame_jalan[".printFields"][] = "nama";
$tdatapad_pad_reklame_jalan[".printFields"][] = "tmt";
$tdatapad_pad_reklame_jalan[".printFields"][] = "enabled";
$tdatapad_pad_reklame_jalan[".printFields"][] = "create_date";
$tdatapad_pad_reklame_jalan[".printFields"][] = "create_uid";
$tdatapad_pad_reklame_jalan[".printFields"][] = "update_uid";
$tdatapad_pad_reklame_jalan[".printFields"][] = "updated";
$tdatapad_pad_reklame_jalan[".printFields"][] = "created";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
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
	
		
		
	$tdatapad_pad_reklame_jalan["id"] = $fdata;
//	jalan_kelas_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "jalan_kelas_id";
	$fdata["GoodName"] = "jalan_kelas_id";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
	$fdata["Label"] = "Jalan Kelas Id"; 
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
	
		$fdata["strField"] = "jalan_kelas_id"; 
		$fdata["FullName"] = "jalan_kelas_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_reklame_kelas_jalan";
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
	
		
		
	$tdatapad_pad_reklame_jalan["jalan_kelas_id"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
	$fdata["Label"] = "Kode"; 
	$fdata["FieldType"] = 13;
	
		
		
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_reklame_jalan["kode"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
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
			$edata["EditParams"].= " maxlength=108";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_reklame_jalan["nama"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
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
	
		
		
	$tdatapad_pad_reklame_jalan["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
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
	
		
		
	$tdatapad_pad_reklame_jalan["enabled"] = $fdata;
//	create_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "create_date";
	$fdata["GoodName"] = "create_date";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
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
	
		
		
	$tdatapad_pad_reklame_jalan["create_date"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
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
	
		
		
	$tdatapad_pad_reklame_jalan["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
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
	
		
		
	$tdatapad_pad_reklame_jalan["update_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
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
	
		
		
	$tdatapad_pad_reklame_jalan["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_reklame_jalan";
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
	
		
		
	$tdatapad_pad_reklame_jalan["created"] = $fdata;

	
$tables_data["pad.pad_reklame_jalan"]=&$tdatapad_pad_reklame_jalan;
$field_labels["pad_pad_reklame_jalan"] = &$fieldLabelspad_pad_reklame_jalan;
$fieldToolTips["pad.pad_reklame_jalan"] = &$fieldToolTipspad_pad_reklame_jalan;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_reklame_jalan"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_reklame_jalan"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_reklame_kelas_jalan";
	$masterParams["mDataSourceTable"]="pad.pad_reklame_kelas_jalan";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_reklame_kelas_jalan";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_reklame_jalan"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_reklame_jalan"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_reklame_jalan"][$mIndex]["detailKeys"][]="jalan_kelas_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_reklame_jalan()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   jalan_kelas_id,   kode,   nama,   tmt,   enabled,   create_date,   create_uid,   update_uid,   updated,   created";
$proto0["m_strFrom"] = "FROM \"pad\".pad_reklame_jalan";
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
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "jalan_kelas_id",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "create_date",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_reklame_jalan"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "pad.pad_reklame_jalan";
$proto28["m_columns"] = array();
$proto28["m_columns"][] = "id";
$proto28["m_columns"][] = "jalan_kelas_id";
$proto28["m_columns"][] = "kode";
$proto28["m_columns"][] = "nama";
$proto28["m_columns"][] = "tmt";
$proto28["m_columns"][] = "enabled";
$proto28["m_columns"][] = "create_date";
$proto28["m_columns"][] = "create_uid";
$proto28["m_columns"][] = "update_uid";
$proto28["m_columns"][] = "updated";
$proto28["m_columns"][] = "created";
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
$queryData_pad_pad_reklame_jalan = createSqlQuery_pad_pad_reklame_jalan();
											$tdatapad_pad_reklame_jalan[".sqlquery"] = $queryData_pad_pad_reklame_jalan;
	
if(isset($tdatapad_pad_reklame_jalan["field2"])){
	$tdatapad_pad_reklame_jalan["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_reklame_jalan["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_reklame_jalan["field2"]["LookupType"] = 4;
	$tdatapad_pad_reklame_jalan["field2"]["LinkField"] = "email";
	$tdatapad_pad_reklame_jalan["field2"]["DisplayField"] = "name";
	$tdatapad_pad_reklame_jalan[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_reklame_jalan"] = new eventsBase;
$tdatapad_pad_reklame_jalan[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_reklame_jalan");

?>