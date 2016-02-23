<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_reklame = array();
	$tdatapad_pad_reklame[".NumberOfChars"] = 80; 
	$tdatapad_pad_reklame[".ShortName"] = "pad_pad_reklame";
	$tdatapad_pad_reklame[".OwnerID"] = "";
	$tdatapad_pad_reklame[".OriginalTable"] = "pad.pad_reklame";

//	field labels
$fieldLabelspad_pad_reklame = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_reklame["English"] = array();
	$fieldToolTipspad_pad_reklame["English"] = array();
	$fieldLabelspad_pad_reklame["English"]["id"] = "Id";
	$fieldToolTipspad_pad_reklame["English"]["id"] = "";
	$fieldLabelspad_pad_reklame["English"]["kode"] = "Kode";
	$fieldToolTipspad_pad_reklame["English"]["kode"] = "";
	$fieldLabelspad_pad_reklame["English"]["kecamatan_id"] = "Kecamatan Id";
	$fieldToolTipspad_pad_reklame["English"]["kecamatan_id"] = "";
	$fieldLabelspad_pad_reklame["English"]["kelurahan_id"] = "Kelurahan Id";
	$fieldToolTipspad_pad_reklame["English"]["kelurahan_id"] = "";
	$fieldLabelspad_pad_reklame["English"]["latitude"] = "Latitude";
	$fieldToolTipspad_pad_reklame["English"]["latitude"] = "";
	$fieldLabelspad_pad_reklame["English"]["longitude"] = "Longitude";
	$fieldToolTipspad_pad_reklame["English"]["longitude"] = "";
	$fieldLabelspad_pad_reklame["English"]["pemilik_nama"] = "Pemilik Nama";
	$fieldToolTipspad_pad_reklame["English"]["pemilik_nama"] = "";
	$fieldLabelspad_pad_reklame["English"]["pemilik_alamat"] = "Pemilik Alamat";
	$fieldToolTipspad_pad_reklame["English"]["pemilik_alamat"] = "";
	$fieldLabelspad_pad_reklame["English"]["pemilik_kecamatan"] = "Pemilik Kecamatan";
	$fieldToolTipspad_pad_reklame["English"]["pemilik_kecamatan"] = "";
	$fieldLabelspad_pad_reklame["English"]["pemilik_kelurahan"] = "Pemilik Kelurahan";
	$fieldToolTipspad_pad_reklame["English"]["pemilik_kelurahan"] = "";
	$fieldLabelspad_pad_reklame["English"]["pemilik_kota"] = "Pemilik Kota";
	$fieldToolTipspad_pad_reklame["English"]["pemilik_kota"] = "";
	$fieldLabelspad_pad_reklame["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_reklame["English"]["updated"] = "";
	$fieldLabelspad_pad_reklame["English"]["created"] = "Created";
	$fieldToolTipspad_pad_reklame["English"]["created"] = "";
	$fieldLabelspad_pad_reklame["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_reklame["English"]["update_uid"] = "";
	$fieldLabelspad_pad_reklame["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_reklame["English"]["create_uid"] = "";
	if (count($fieldToolTipspad_pad_reklame["English"]))
		$tdatapad_pad_reklame[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_reklame[".NCSearch"] = true;



$tdatapad_pad_reklame[".shortTableName"] = "pad_pad_reklame";
$tdatapad_pad_reklame[".nSecOptions"] = 0;
$tdatapad_pad_reklame[".recsPerRowList"] = 1;
$tdatapad_pad_reklame[".mainTableOwnerID"] = "";
$tdatapad_pad_reklame[".moveNext"] = 1;
$tdatapad_pad_reklame[".nType"] = 0;

$tdatapad_pad_reklame[".strOriginalTableName"] = "pad.pad_reklame";




$tdatapad_pad_reklame[".showAddInPopup"] = false;

$tdatapad_pad_reklame[".showEditInPopup"] = false;

$tdatapad_pad_reklame[".showViewInPopup"] = false;

$tdatapad_pad_reklame[".fieldsForRegister"] = array();

$tdatapad_pad_reklame[".listAjax"] = false;

	$tdatapad_pad_reklame[".audit"] = false;

	$tdatapad_pad_reklame[".locking"] = false;

$tdatapad_pad_reklame[".listIcons"] = true;
$tdatapad_pad_reklame[".edit"] = true;
$tdatapad_pad_reklame[".inlineEdit"] = true;
$tdatapad_pad_reklame[".inlineAdd"] = true;
$tdatapad_pad_reklame[".view"] = true;

$tdatapad_pad_reklame[".exportTo"] = true;

$tdatapad_pad_reklame[".printFriendly"] = true;

$tdatapad_pad_reklame[".delete"] = true;

$tdatapad_pad_reklame[".showSimpleSearchOptions"] = false;

$tdatapad_pad_reklame[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_reklame[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_reklame[".isUseAjaxSuggest"] = true;

$tdatapad_pad_reklame[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_reklame[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_reklame[".isUseTimeForSearch"] = false;




$tdatapad_pad_reklame[".allSearchFields"] = array();

$tdatapad_pad_reklame[".allSearchFields"][] = "id";
$tdatapad_pad_reklame[".allSearchFields"][] = "kode";
$tdatapad_pad_reklame[".allSearchFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".allSearchFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".allSearchFields"][] = "latitude";
$tdatapad_pad_reklame[".allSearchFields"][] = "longitude";
$tdatapad_pad_reklame[".allSearchFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".allSearchFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".allSearchFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".allSearchFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".allSearchFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".allSearchFields"][] = "updated";
$tdatapad_pad_reklame[".allSearchFields"][] = "created";
$tdatapad_pad_reklame[".allSearchFields"][] = "update_uid";
$tdatapad_pad_reklame[".allSearchFields"][] = "create_uid";

$tdatapad_pad_reklame[".googleLikeFields"][] = "id";
$tdatapad_pad_reklame[".googleLikeFields"][] = "kode";
$tdatapad_pad_reklame[".googleLikeFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".googleLikeFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".googleLikeFields"][] = "latitude";
$tdatapad_pad_reklame[".googleLikeFields"][] = "longitude";
$tdatapad_pad_reklame[".googleLikeFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".googleLikeFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".googleLikeFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".googleLikeFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".googleLikeFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".googleLikeFields"][] = "updated";
$tdatapad_pad_reklame[".googleLikeFields"][] = "created";
$tdatapad_pad_reklame[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_reklame[".googleLikeFields"][] = "create_uid";


$tdatapad_pad_reklame[".advSearchFields"][] = "id";
$tdatapad_pad_reklame[".advSearchFields"][] = "kode";
$tdatapad_pad_reklame[".advSearchFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".advSearchFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".advSearchFields"][] = "latitude";
$tdatapad_pad_reklame[".advSearchFields"][] = "longitude";
$tdatapad_pad_reklame[".advSearchFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".advSearchFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".advSearchFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".advSearchFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".advSearchFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".advSearchFields"][] = "updated";
$tdatapad_pad_reklame[".advSearchFields"][] = "created";
$tdatapad_pad_reklame[".advSearchFields"][] = "update_uid";
$tdatapad_pad_reklame[".advSearchFields"][] = "create_uid";

$tdatapad_pad_reklame[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_reklame[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_reklame[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_reklame[".orderindexes"] = array();

$tdatapad_pad_reklame[".sqlHead"] = "SELECT id,   kode,   kecamatan_id,   kelurahan_id,   latitude,   longitude,   pemilik_nama,   pemilik_alamat,   pemilik_kecamatan,   pemilik_kelurahan,   pemilik_kota,   updated,   created,   update_uid,   create_uid";
$tdatapad_pad_reklame[".sqlFrom"] = "FROM \"pad\".pad_reklame";
$tdatapad_pad_reklame[".sqlWhereExpr"] = "";
$tdatapad_pad_reklame[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_reklame[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_reklame[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_reklame = array();
$tableKeyspad_pad_reklame[] = "id";
$tdatapad_pad_reklame[".Keys"] = $tableKeyspad_pad_reklame;

$tdatapad_pad_reklame[".listFields"] = array();
$tdatapad_pad_reklame[".listFields"][] = "id";
$tdatapad_pad_reklame[".listFields"][] = "kode";
$tdatapad_pad_reklame[".listFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".listFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".listFields"][] = "latitude";
$tdatapad_pad_reklame[".listFields"][] = "longitude";
$tdatapad_pad_reklame[".listFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".listFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".listFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".listFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".listFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".listFields"][] = "updated";
$tdatapad_pad_reklame[".listFields"][] = "created";
$tdatapad_pad_reklame[".listFields"][] = "update_uid";
$tdatapad_pad_reklame[".listFields"][] = "create_uid";

$tdatapad_pad_reklame[".viewFields"] = array();
$tdatapad_pad_reklame[".viewFields"][] = "id";
$tdatapad_pad_reklame[".viewFields"][] = "kode";
$tdatapad_pad_reklame[".viewFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".viewFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".viewFields"][] = "latitude";
$tdatapad_pad_reklame[".viewFields"][] = "longitude";
$tdatapad_pad_reklame[".viewFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".viewFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".viewFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".viewFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".viewFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".viewFields"][] = "updated";
$tdatapad_pad_reklame[".viewFields"][] = "created";
$tdatapad_pad_reklame[".viewFields"][] = "update_uid";
$tdatapad_pad_reklame[".viewFields"][] = "create_uid";

$tdatapad_pad_reklame[".addFields"] = array();
$tdatapad_pad_reklame[".addFields"][] = "kode";
$tdatapad_pad_reklame[".addFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".addFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".addFields"][] = "latitude";
$tdatapad_pad_reklame[".addFields"][] = "longitude";
$tdatapad_pad_reklame[".addFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".addFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".addFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".addFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".addFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".addFields"][] = "updated";
$tdatapad_pad_reklame[".addFields"][] = "created";
$tdatapad_pad_reklame[".addFields"][] = "update_uid";
$tdatapad_pad_reklame[".addFields"][] = "create_uid";

$tdatapad_pad_reklame[".inlineAddFields"] = array();
$tdatapad_pad_reklame[".inlineAddFields"][] = "kode";
$tdatapad_pad_reklame[".inlineAddFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".inlineAddFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".inlineAddFields"][] = "latitude";
$tdatapad_pad_reklame[".inlineAddFields"][] = "longitude";
$tdatapad_pad_reklame[".inlineAddFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".inlineAddFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".inlineAddFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".inlineAddFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".inlineAddFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".inlineAddFields"][] = "updated";
$tdatapad_pad_reklame[".inlineAddFields"][] = "created";
$tdatapad_pad_reklame[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_reklame[".inlineAddFields"][] = "create_uid";

$tdatapad_pad_reklame[".editFields"] = array();
$tdatapad_pad_reklame[".editFields"][] = "kode";
$tdatapad_pad_reklame[".editFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".editFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".editFields"][] = "latitude";
$tdatapad_pad_reklame[".editFields"][] = "longitude";
$tdatapad_pad_reklame[".editFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".editFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".editFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".editFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".editFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".editFields"][] = "updated";
$tdatapad_pad_reklame[".editFields"][] = "created";
$tdatapad_pad_reklame[".editFields"][] = "update_uid";
$tdatapad_pad_reklame[".editFields"][] = "create_uid";

$tdatapad_pad_reklame[".inlineEditFields"] = array();
$tdatapad_pad_reklame[".inlineEditFields"][] = "kode";
$tdatapad_pad_reklame[".inlineEditFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".inlineEditFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".inlineEditFields"][] = "latitude";
$tdatapad_pad_reklame[".inlineEditFields"][] = "longitude";
$tdatapad_pad_reklame[".inlineEditFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".inlineEditFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".inlineEditFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".inlineEditFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".inlineEditFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".inlineEditFields"][] = "updated";
$tdatapad_pad_reklame[".inlineEditFields"][] = "created";
$tdatapad_pad_reklame[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_reklame[".inlineEditFields"][] = "create_uid";

$tdatapad_pad_reklame[".exportFields"] = array();
$tdatapad_pad_reklame[".exportFields"][] = "id";
$tdatapad_pad_reklame[".exportFields"][] = "kode";
$tdatapad_pad_reklame[".exportFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".exportFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".exportFields"][] = "latitude";
$tdatapad_pad_reklame[".exportFields"][] = "longitude";
$tdatapad_pad_reklame[".exportFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".exportFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".exportFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".exportFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".exportFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".exportFields"][] = "updated";
$tdatapad_pad_reklame[".exportFields"][] = "created";
$tdatapad_pad_reklame[".exportFields"][] = "update_uid";
$tdatapad_pad_reklame[".exportFields"][] = "create_uid";

$tdatapad_pad_reklame[".printFields"] = array();
$tdatapad_pad_reklame[".printFields"][] = "id";
$tdatapad_pad_reklame[".printFields"][] = "kode";
$tdatapad_pad_reklame[".printFields"][] = "kecamatan_id";
$tdatapad_pad_reklame[".printFields"][] = "kelurahan_id";
$tdatapad_pad_reklame[".printFields"][] = "latitude";
$tdatapad_pad_reklame[".printFields"][] = "longitude";
$tdatapad_pad_reklame[".printFields"][] = "pemilik_nama";
$tdatapad_pad_reklame[".printFields"][] = "pemilik_alamat";
$tdatapad_pad_reklame[".printFields"][] = "pemilik_kecamatan";
$tdatapad_pad_reklame[".printFields"][] = "pemilik_kelurahan";
$tdatapad_pad_reklame[".printFields"][] = "pemilik_kota";
$tdatapad_pad_reklame[".printFields"][] = "updated";
$tdatapad_pad_reklame[".printFields"][] = "created";
$tdatapad_pad_reklame[".printFields"][] = "update_uid";
$tdatapad_pad_reklame[".printFields"][] = "create_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_reklame";
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
	
		
		
	$tdatapad_pad_reklame["id"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "pad.pad_reklame";
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
			$edata["EditParams"].= " maxlength=6";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_reklame["kode"] = $fdata;
//	kecamatan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "kecamatan_id";
	$fdata["GoodName"] = "kecamatan_id";
	$fdata["ownerTable"] = "pad.pad_reklame";
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
	
		
		
	$tdatapad_pad_reklame["kecamatan_id"] = $fdata;
//	kelurahan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "kelurahan_id";
	$fdata["GoodName"] = "kelurahan_id";
	$fdata["ownerTable"] = "pad.pad_reklame";
	$fdata["Label"] = "Kelurahan Id"; 
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
	
		$fdata["strField"] = "kelurahan_id"; 
		$fdata["FullName"] = "kelurahan_id";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame["kelurahan_id"] = $fdata;
//	latitude
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "latitude";
	$fdata["GoodName"] = "latitude";
	$fdata["ownerTable"] = "pad.pad_reklame";
	$fdata["Label"] = "Latitude"; 
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
	
		$fdata["strField"] = "latitude"; 
		$fdata["FullName"] = "latitude";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame["latitude"] = $fdata;
//	longitude
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "longitude";
	$fdata["GoodName"] = "longitude";
	$fdata["ownerTable"] = "pad.pad_reklame";
	$fdata["Label"] = "Longitude"; 
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
	
		$fdata["strField"] = "longitude"; 
		$fdata["FullName"] = "longitude";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame["longitude"] = $fdata;
//	pemilik_nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "pemilik_nama";
	$fdata["GoodName"] = "pemilik_nama";
	$fdata["ownerTable"] = "pad.pad_reklame";
	$fdata["Label"] = "Pemilik Nama"; 
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
	
		$fdata["strField"] = "pemilik_nama"; 
		$fdata["FullName"] = "pemilik_nama";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame["pemilik_nama"] = $fdata;
//	pemilik_alamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "pemilik_alamat";
	$fdata["GoodName"] = "pemilik_alamat";
	$fdata["ownerTable"] = "pad.pad_reklame";
	$fdata["Label"] = "Pemilik Alamat"; 
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
	
		$fdata["strField"] = "pemilik_alamat"; 
		$fdata["FullName"] = "pemilik_alamat";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame["pemilik_alamat"] = $fdata;
//	pemilik_kecamatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "pemilik_kecamatan";
	$fdata["GoodName"] = "pemilik_kecamatan";
	$fdata["ownerTable"] = "pad.pad_reklame";
	$fdata["Label"] = "Pemilik Kecamatan"; 
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
	
		$fdata["strField"] = "pemilik_kecamatan"; 
		$fdata["FullName"] = "pemilik_kecamatan";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame["pemilik_kecamatan"] = $fdata;
//	pemilik_kelurahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "pemilik_kelurahan";
	$fdata["GoodName"] = "pemilik_kelurahan";
	$fdata["ownerTable"] = "pad.pad_reklame";
	$fdata["Label"] = "Pemilik Kelurahan"; 
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
	
		$fdata["strField"] = "pemilik_kelurahan"; 
		$fdata["FullName"] = "pemilik_kelurahan";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame["pemilik_kelurahan"] = $fdata;
//	pemilik_kota
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "pemilik_kota";
	$fdata["GoodName"] = "pemilik_kota";
	$fdata["ownerTable"] = "pad.pad_reklame";
	$fdata["Label"] = "Pemilik Kota"; 
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
	
		$fdata["strField"] = "pemilik_kota"; 
		$fdata["FullName"] = "pemilik_kota";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame["pemilik_kota"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_reklame";
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
	
		
		
	$tdatapad_pad_reklame["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_reklame";
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
	
		
		
	$tdatapad_pad_reklame["created"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_reklame";
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
	
		
		
	$tdatapad_pad_reklame["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_reklame";
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
	
		
		
	$tdatapad_pad_reklame["create_uid"] = $fdata;

	
$tables_data["pad.pad_reklame"]=&$tdatapad_pad_reklame;
$field_labels["pad_pad_reklame"] = &$fieldLabelspad_pad_reklame;
$fieldToolTips["pad.pad_reklame"] = &$fieldToolTipspad_pad_reklame;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_reklame"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_reklame"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_reklame()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   kode,   kecamatan_id,   kelurahan_id,   latitude,   longitude,   pemilik_nama,   pemilik_alamat,   pemilik_kecamatan,   pemilik_kelurahan,   pemilik_kota,   updated,   created,   update_uid,   create_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_reklame";
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
	"m_strTable" => "pad.pad_reklame"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "pad.pad_reklame"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "kecamatan_id",
	"m_strTable" => "pad.pad_reklame"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "kelurahan_id",
	"m_strTable" => "pad.pad_reklame"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "latitude",
	"m_strTable" => "pad.pad_reklame"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "longitude",
	"m_strTable" => "pad.pad_reklame"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "pemilik_nama",
	"m_strTable" => "pad.pad_reklame"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "pemilik_alamat",
	"m_strTable" => "pad.pad_reklame"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "pemilik_kecamatan",
	"m_strTable" => "pad.pad_reklame"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "pemilik_kelurahan",
	"m_strTable" => "pad.pad_reklame"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "pemilik_kota",
	"m_strTable" => "pad.pad_reklame"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_reklame"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_reklame"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_reklame"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_reklame"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto35=array();
$proto35["m_link"] = "SQLL_MAIN";
			$proto36=array();
$proto36["m_strName"] = "pad.pad_reklame";
$proto36["m_columns"] = array();
$proto36["m_columns"][] = "id";
$proto36["m_columns"][] = "kode";
$proto36["m_columns"][] = "kecamatan_id";
$proto36["m_columns"][] = "kelurahan_id";
$proto36["m_columns"][] = "latitude";
$proto36["m_columns"][] = "longitude";
$proto36["m_columns"][] = "pemilik_nama";
$proto36["m_columns"][] = "pemilik_alamat";
$proto36["m_columns"][] = "pemilik_kecamatan";
$proto36["m_columns"][] = "pemilik_kelurahan";
$proto36["m_columns"][] = "pemilik_kota";
$proto36["m_columns"][] = "updated";
$proto36["m_columns"][] = "created";
$proto36["m_columns"][] = "update_uid";
$proto36["m_columns"][] = "create_uid";
$obj = new SQLTable($proto36);

$proto35["m_table"] = $obj;
$proto35["m_alias"] = "";
$proto37=array();
$proto37["m_sql"] = "";
$proto37["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto37["m_column"]=$obj;
$proto37["m_contained"] = array();
$proto37["m_strCase"] = "";
$proto37["m_havingmode"] = "0";
$proto37["m_inBrackets"] = "0";
$proto37["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto37);

$proto35["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto35);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_reklame = createSqlQuery_pad_pad_reklame();
															$tdatapad_pad_reklame[".sqlquery"] = $queryData_pad_pad_reklame;
	
if(isset($tdatapad_pad_reklame["field2"])){
	$tdatapad_pad_reklame["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_reklame["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_reklame["field2"]["LookupType"] = 4;
	$tdatapad_pad_reklame["field2"]["LinkField"] = "email";
	$tdatapad_pad_reklame["field2"]["DisplayField"] = "name";
	$tdatapad_pad_reklame[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_reklame"] = new eventsBase;
$tdatapad_pad_reklame[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_reklame");

?>