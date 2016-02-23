<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_air_kelompok_usaha = array();
	$tdatapad_pad_air_kelompok_usaha[".NumberOfChars"] = 80; 
	$tdatapad_pad_air_kelompok_usaha[".ShortName"] = "pad_pad_air_kelompok_usaha";
	$tdatapad_pad_air_kelompok_usaha[".OwnerID"] = "";
	$tdatapad_pad_air_kelompok_usaha[".OriginalTable"] = "pad.pad_air_kelompok_usaha";

//	field labels
$fieldLabelspad_pad_air_kelompok_usaha = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_air_kelompok_usaha["English"] = array();
	$fieldToolTipspad_pad_air_kelompok_usaha["English"] = array();
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["id"] = "Id";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["id"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["kode"] = "Kode";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["kode"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["nama"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["level"] = "Level";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["level"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["induk_id"] = "Induk Id";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["induk_id"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["update_uid"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["create_uid"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["updated"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["created"] = "Created";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["created"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["id_old1"] = "Id Old1";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["id_old1"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["id_old2"] = "Id Old2";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["id_old2"] = "";
	$fieldLabelspad_pad_air_kelompok_usaha["English"]["id_old3"] = "Id Old3";
	$fieldToolTipspad_pad_air_kelompok_usaha["English"]["id_old3"] = "";
	if (count($fieldToolTipspad_pad_air_kelompok_usaha["English"]))
		$tdatapad_pad_air_kelompok_usaha[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_air_kelompok_usaha[".NCSearch"] = true;



$tdatapad_pad_air_kelompok_usaha[".shortTableName"] = "pad_pad_air_kelompok_usaha";
$tdatapad_pad_air_kelompok_usaha[".nSecOptions"] = 0;
$tdatapad_pad_air_kelompok_usaha[".recsPerRowList"] = 1;
$tdatapad_pad_air_kelompok_usaha[".mainTableOwnerID"] = "";
$tdatapad_pad_air_kelompok_usaha[".moveNext"] = 1;
$tdatapad_pad_air_kelompok_usaha[".nType"] = 0;

$tdatapad_pad_air_kelompok_usaha[".strOriginalTableName"] = "pad.pad_air_kelompok_usaha";




$tdatapad_pad_air_kelompok_usaha[".showAddInPopup"] = false;

$tdatapad_pad_air_kelompok_usaha[".showEditInPopup"] = false;

$tdatapad_pad_air_kelompok_usaha[".showViewInPopup"] = false;

$tdatapad_pad_air_kelompok_usaha[".fieldsForRegister"] = array();

$tdatapad_pad_air_kelompok_usaha[".listAjax"] = false;

	$tdatapad_pad_air_kelompok_usaha[".audit"] = false;

	$tdatapad_pad_air_kelompok_usaha[".locking"] = false;

$tdatapad_pad_air_kelompok_usaha[".listIcons"] = true;
$tdatapad_pad_air_kelompok_usaha[".edit"] = true;
$tdatapad_pad_air_kelompok_usaha[".inlineEdit"] = true;
$tdatapad_pad_air_kelompok_usaha[".inlineAdd"] = true;
$tdatapad_pad_air_kelompok_usaha[".view"] = true;



$tdatapad_pad_air_kelompok_usaha[".delete"] = true;

$tdatapad_pad_air_kelompok_usaha[".showSimpleSearchOptions"] = false;

$tdatapad_pad_air_kelompok_usaha[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_air_kelompok_usaha[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_air_kelompok_usaha[".isUseAjaxSuggest"] = true;

$tdatapad_pad_air_kelompok_usaha[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_air_kelompok_usaha[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_air_kelompok_usaha[".isUseTimeForSearch"] = false;




$tdatapad_pad_air_kelompok_usaha[".allSearchFields"] = array();

$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "id";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".allSearchFields"][] = "id_old3";

$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "id";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".googleLikeFields"][] = "id_old3";


$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "id";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".advSearchFields"][] = "id_old3";

$tdatapad_pad_air_kelompok_usaha[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_air_kelompok_usaha[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_air_kelompok_usaha[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_air_kelompok_usaha[".orderindexes"] = array();

$tdatapad_pad_air_kelompok_usaha[".sqlHead"] = "SELECT id,   kode,   nama,   \"level\",   induk_id,   update_uid,   create_uid,   updated,   created,   id_old1,   id_old2,   id_old3";
$tdatapad_pad_air_kelompok_usaha[".sqlFrom"] = "FROM \"pad\".pad_air_kelompok_usaha";
$tdatapad_pad_air_kelompok_usaha[".sqlWhereExpr"] = "";
$tdatapad_pad_air_kelompok_usaha[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_air_kelompok_usaha[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_air_kelompok_usaha[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_air_kelompok_usaha = array();
$tableKeyspad_pad_air_kelompok_usaha[] = "id";
$tdatapad_pad_air_kelompok_usaha[".Keys"] = $tableKeyspad_pad_air_kelompok_usaha;

$tdatapad_pad_air_kelompok_usaha[".listFields"] = array();
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "id";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".listFields"][] = "id_old3";

$tdatapad_pad_air_kelompok_usaha[".viewFields"] = array();
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "id";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".viewFields"][] = "id_old3";

$tdatapad_pad_air_kelompok_usaha[".addFields"] = array();
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".addFields"][] = "id_old3";

$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"] = array();
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".inlineAddFields"][] = "id_old3";

$tdatapad_pad_air_kelompok_usaha[".editFields"] = array();
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".editFields"][] = "id_old3";

$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"] = array();
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".inlineEditFields"][] = "id_old3";

$tdatapad_pad_air_kelompok_usaha[".exportFields"] = array();
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "id";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".exportFields"][] = "id_old3";

$tdatapad_pad_air_kelompok_usaha[".printFields"] = array();
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "id";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "kode";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "nama";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "level";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "induk_id";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "update_uid";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "create_uid";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "updated";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "created";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "id_old1";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "id_old2";
$tdatapad_pad_air_kelompok_usaha[".printFields"][] = "id_old3";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["id"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
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
			$edata["EditParams"].= " maxlength=8";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_air_kelompok_usaha["kode"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
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
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_air_kelompok_usaha["nama"] = $fdata;
//	level
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "level";
	$fdata["GoodName"] = "level";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
	$fdata["Label"] = "Level"; 
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
	
		$fdata["strField"] = "level"; 
		$fdata["FullName"] = "\"level\"";
	
		
		
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["level"] = $fdata;
//	induk_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "induk_id";
	$fdata["GoodName"] = "induk_id";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
	$fdata["Label"] = "Induk Id"; 
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
	
		$fdata["strField"] = "induk_id"; 
		$fdata["FullName"] = "induk_id";
	
		
		
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["induk_id"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["created"] = $fdata;
//	id_old1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "id_old1";
	$fdata["GoodName"] = "id_old1";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
	$fdata["Label"] = "Id Old1"; 
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
	
		$fdata["strField"] = "id_old1"; 
		$fdata["FullName"] = "id_old1";
	
		
		
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["id_old1"] = $fdata;
//	id_old2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "id_old2";
	$fdata["GoodName"] = "id_old2";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
	$fdata["Label"] = "Id Old2"; 
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
	
		$fdata["strField"] = "id_old2"; 
		$fdata["FullName"] = "id_old2";
	
		
		
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["id_old2"] = $fdata;
//	id_old3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "id_old3";
	$fdata["GoodName"] = "id_old3";
	$fdata["ownerTable"] = "pad.pad_air_kelompok_usaha";
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
	
		
		
	$tdatapad_pad_air_kelompok_usaha["id_old3"] = $fdata;

	
$tables_data["pad.pad_air_kelompok_usaha"]=&$tdatapad_pad_air_kelompok_usaha;
$field_labels["pad_pad_air_kelompok_usaha"] = &$fieldLabelspad_pad_air_kelompok_usaha;
$fieldToolTips["pad.pad_air_kelompok_usaha"] = &$fieldToolTipspad_pad_air_kelompok_usaha;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_air_kelompok_usaha"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_air_kelompok_usaha"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_air_kelompok_usaha()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   kode,   nama,   \"level\",   induk_id,   update_uid,   create_uid,   updated,   created,   id_old1,   id_old2,   id_old3";
$proto0["m_strFrom"] = "FROM \"pad\".pad_air_kelompok_usaha";
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
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "level",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "induk_id",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "id_old1",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "id_old2",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "id_old3",
	"m_strTable" => "pad.pad_air_kelompok_usaha"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto29=array();
$proto29["m_link"] = "SQLL_MAIN";
			$proto30=array();
$proto30["m_strName"] = "pad.pad_air_kelompok_usaha";
$proto30["m_columns"] = array();
$proto30["m_columns"][] = "id";
$proto30["m_columns"][] = "kode";
$proto30["m_columns"][] = "nama";
$proto30["m_columns"][] = "level";
$proto30["m_columns"][] = "induk_id";
$proto30["m_columns"][] = "update_uid";
$proto30["m_columns"][] = "create_uid";
$proto30["m_columns"][] = "updated";
$proto30["m_columns"][] = "created";
$proto30["m_columns"][] = "id_old1";
$proto30["m_columns"][] = "id_old2";
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
$queryData_pad_pad_air_kelompok_usaha = createSqlQuery_pad_pad_air_kelompok_usaha();
												$tdatapad_pad_air_kelompok_usaha[".sqlquery"] = $queryData_pad_pad_air_kelompok_usaha;
	
if(isset($tdatapad_pad_air_kelompok_usaha["field2"])){
	$tdatapad_pad_air_kelompok_usaha["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_air_kelompok_usaha["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_air_kelompok_usaha["field2"]["LookupType"] = 4;
	$tdatapad_pad_air_kelompok_usaha["field2"]["LinkField"] = "email";
	$tdatapad_pad_air_kelompok_usaha["field2"]["DisplayField"] = "name";
	$tdatapad_pad_air_kelompok_usaha[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_air_kelompok_usaha"] = new eventsBase;
$tdatapad_pad_air_kelompok_usaha[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_air_kelompok_usaha");

?>