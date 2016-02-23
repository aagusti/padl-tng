<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_pegawai = array();
	$tdatapad_pad_pegawai[".NumberOfChars"] = 80; 
	$tdatapad_pad_pegawai[".ShortName"] = "pad_pad_pegawai";
	$tdatapad_pad_pegawai[".OwnerID"] = "";
	$tdatapad_pad_pegawai[".OriginalTable"] = "pad.pad_pegawai";

//	field labels
$fieldLabelspad_pad_pegawai = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_pegawai["English"] = array();
	$fieldToolTipspad_pad_pegawai["English"] = array();
	$fieldLabelspad_pad_pegawai["English"]["id"] = "Id";
	$fieldToolTipspad_pad_pegawai["English"]["id"] = "";
	$fieldLabelspad_pad_pegawai["English"]["nip"] = "Nip";
	$fieldToolTipspad_pad_pegawai["English"]["nip"] = "";
	$fieldLabelspad_pad_pegawai["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_pegawai["English"]["nama"] = "";
	$fieldLabelspad_pad_pegawai["English"]["jabatan"] = "Jabatan";
	$fieldToolTipspad_pad_pegawai["English"]["jabatan"] = "";
	$fieldLabelspad_pad_pegawai["English"]["golongan"] = "Golongan";
	$fieldToolTipspad_pad_pegawai["English"]["golongan"] = "";
	$fieldLabelspad_pad_pegawai["English"]["pangkat"] = "Pangkat";
	$fieldToolTipspad_pad_pegawai["English"]["pangkat"] = "";
	$fieldLabelspad_pad_pegawai["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_pegawai["English"]["tmt"] = "";
	$fieldLabelspad_pad_pegawai["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_pegawai["English"]["enabled"] = "";
	$fieldLabelspad_pad_pegawai["English"]["nomor_telp"] = "Nomor Telp";
	$fieldToolTipspad_pad_pegawai["English"]["nomor_telp"] = "";
	$fieldLabelspad_pad_pegawai["English"]["bagian"] = "Bagian";
	$fieldToolTipspad_pad_pegawai["English"]["bagian"] = "";
	$fieldLabelspad_pad_pegawai["English"]["created"] = "Created";
	$fieldToolTipspad_pad_pegawai["English"]["created"] = "";
	$fieldLabelspad_pad_pegawai["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_pegawai["English"]["updated"] = "";
	$fieldLabelspad_pad_pegawai["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_pegawai["English"]["create_uid"] = "";
	$fieldLabelspad_pad_pegawai["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_pegawai["English"]["update_uid"] = "";
	if (count($fieldToolTipspad_pad_pegawai["English"]))
		$tdatapad_pad_pegawai[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_pegawai[".NCSearch"] = true;



$tdatapad_pad_pegawai[".shortTableName"] = "pad_pad_pegawai";
$tdatapad_pad_pegawai[".nSecOptions"] = 0;
$tdatapad_pad_pegawai[".recsPerRowList"] = 1;
$tdatapad_pad_pegawai[".mainTableOwnerID"] = "";
$tdatapad_pad_pegawai[".moveNext"] = 1;
$tdatapad_pad_pegawai[".nType"] = 0;

$tdatapad_pad_pegawai[".strOriginalTableName"] = "pad.pad_pegawai";




$tdatapad_pad_pegawai[".showAddInPopup"] = false;

$tdatapad_pad_pegawai[".showEditInPopup"] = false;

$tdatapad_pad_pegawai[".showViewInPopup"] = false;

$tdatapad_pad_pegawai[".fieldsForRegister"] = array();

$tdatapad_pad_pegawai[".listAjax"] = false;

	$tdatapad_pad_pegawai[".audit"] = false;

	$tdatapad_pad_pegawai[".locking"] = false;

$tdatapad_pad_pegawai[".listIcons"] = true;
$tdatapad_pad_pegawai[".edit"] = true;
$tdatapad_pad_pegawai[".inlineEdit"] = true;
$tdatapad_pad_pegawai[".inlineAdd"] = true;
$tdatapad_pad_pegawai[".view"] = true;

$tdatapad_pad_pegawai[".exportTo"] = true;

$tdatapad_pad_pegawai[".printFriendly"] = true;

$tdatapad_pad_pegawai[".delete"] = true;

$tdatapad_pad_pegawai[".showSimpleSearchOptions"] = false;

$tdatapad_pad_pegawai[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_pegawai[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_pegawai[".isUseAjaxSuggest"] = true;

$tdatapad_pad_pegawai[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_pegawai[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_pegawai[".isUseTimeForSearch"] = false;




$tdatapad_pad_pegawai[".allSearchFields"] = array();

$tdatapad_pad_pegawai[".allSearchFields"][] = "id";
$tdatapad_pad_pegawai[".allSearchFields"][] = "nip";
$tdatapad_pad_pegawai[".allSearchFields"][] = "nama";
$tdatapad_pad_pegawai[".allSearchFields"][] = "jabatan";
$tdatapad_pad_pegawai[".allSearchFields"][] = "golongan";
$tdatapad_pad_pegawai[".allSearchFields"][] = "pangkat";
$tdatapad_pad_pegawai[".allSearchFields"][] = "tmt";
$tdatapad_pad_pegawai[".allSearchFields"][] = "enabled";
$tdatapad_pad_pegawai[".allSearchFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".allSearchFields"][] = "bagian";
$tdatapad_pad_pegawai[".allSearchFields"][] = "created";
$tdatapad_pad_pegawai[".allSearchFields"][] = "updated";
$tdatapad_pad_pegawai[".allSearchFields"][] = "create_uid";
$tdatapad_pad_pegawai[".allSearchFields"][] = "update_uid";

$tdatapad_pad_pegawai[".googleLikeFields"][] = "id";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "nip";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "nama";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "jabatan";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "golongan";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "pangkat";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "tmt";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "enabled";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "bagian";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "created";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "updated";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_pegawai[".googleLikeFields"][] = "update_uid";


$tdatapad_pad_pegawai[".advSearchFields"][] = "id";
$tdatapad_pad_pegawai[".advSearchFields"][] = "nip";
$tdatapad_pad_pegawai[".advSearchFields"][] = "nama";
$tdatapad_pad_pegawai[".advSearchFields"][] = "jabatan";
$tdatapad_pad_pegawai[".advSearchFields"][] = "golongan";
$tdatapad_pad_pegawai[".advSearchFields"][] = "pangkat";
$tdatapad_pad_pegawai[".advSearchFields"][] = "tmt";
$tdatapad_pad_pegawai[".advSearchFields"][] = "enabled";
$tdatapad_pad_pegawai[".advSearchFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".advSearchFields"][] = "bagian";
$tdatapad_pad_pegawai[".advSearchFields"][] = "created";
$tdatapad_pad_pegawai[".advSearchFields"][] = "updated";
$tdatapad_pad_pegawai[".advSearchFields"][] = "create_uid";
$tdatapad_pad_pegawai[".advSearchFields"][] = "update_uid";

$tdatapad_pad_pegawai[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_pegawai[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_pegawai[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_pegawai[".orderindexes"] = array();

$tdatapad_pad_pegawai[".sqlHead"] = "SELECT id,   nip,   nama,   jabatan,   golongan,   pangkat,   tmt,   enabled,   nomor_telp,   bagian,   created,   updated,   create_uid,   update_uid";
$tdatapad_pad_pegawai[".sqlFrom"] = "FROM \"pad\".pad_pegawai";
$tdatapad_pad_pegawai[".sqlWhereExpr"] = "";
$tdatapad_pad_pegawai[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_pegawai[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_pegawai[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_pegawai = array();
$tableKeyspad_pad_pegawai[] = "id";
$tdatapad_pad_pegawai[".Keys"] = $tableKeyspad_pad_pegawai;

$tdatapad_pad_pegawai[".listFields"] = array();
$tdatapad_pad_pegawai[".listFields"][] = "id";
$tdatapad_pad_pegawai[".listFields"][] = "nip";
$tdatapad_pad_pegawai[".listFields"][] = "nama";
$tdatapad_pad_pegawai[".listFields"][] = "jabatan";
$tdatapad_pad_pegawai[".listFields"][] = "golongan";
$tdatapad_pad_pegawai[".listFields"][] = "pangkat";
$tdatapad_pad_pegawai[".listFields"][] = "tmt";
$tdatapad_pad_pegawai[".listFields"][] = "enabled";
$tdatapad_pad_pegawai[".listFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".listFields"][] = "bagian";
$tdatapad_pad_pegawai[".listFields"][] = "created";
$tdatapad_pad_pegawai[".listFields"][] = "updated";
$tdatapad_pad_pegawai[".listFields"][] = "create_uid";
$tdatapad_pad_pegawai[".listFields"][] = "update_uid";

$tdatapad_pad_pegawai[".viewFields"] = array();
$tdatapad_pad_pegawai[".viewFields"][] = "id";
$tdatapad_pad_pegawai[".viewFields"][] = "nip";
$tdatapad_pad_pegawai[".viewFields"][] = "nama";
$tdatapad_pad_pegawai[".viewFields"][] = "jabatan";
$tdatapad_pad_pegawai[".viewFields"][] = "golongan";
$tdatapad_pad_pegawai[".viewFields"][] = "pangkat";
$tdatapad_pad_pegawai[".viewFields"][] = "tmt";
$tdatapad_pad_pegawai[".viewFields"][] = "enabled";
$tdatapad_pad_pegawai[".viewFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".viewFields"][] = "bagian";
$tdatapad_pad_pegawai[".viewFields"][] = "created";
$tdatapad_pad_pegawai[".viewFields"][] = "updated";
$tdatapad_pad_pegawai[".viewFields"][] = "create_uid";
$tdatapad_pad_pegawai[".viewFields"][] = "update_uid";

$tdatapad_pad_pegawai[".addFields"] = array();
$tdatapad_pad_pegawai[".addFields"][] = "nip";
$tdatapad_pad_pegawai[".addFields"][] = "nama";
$tdatapad_pad_pegawai[".addFields"][] = "jabatan";
$tdatapad_pad_pegawai[".addFields"][] = "golongan";
$tdatapad_pad_pegawai[".addFields"][] = "pangkat";
$tdatapad_pad_pegawai[".addFields"][] = "tmt";
$tdatapad_pad_pegawai[".addFields"][] = "enabled";
$tdatapad_pad_pegawai[".addFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".addFields"][] = "bagian";
$tdatapad_pad_pegawai[".addFields"][] = "created";
$tdatapad_pad_pegawai[".addFields"][] = "updated";
$tdatapad_pad_pegawai[".addFields"][] = "create_uid";
$tdatapad_pad_pegawai[".addFields"][] = "update_uid";

$tdatapad_pad_pegawai[".inlineAddFields"] = array();
$tdatapad_pad_pegawai[".inlineAddFields"][] = "nip";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "nama";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "jabatan";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "golongan";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "pangkat";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "tmt";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "enabled";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "bagian";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "created";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "updated";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_pegawai[".inlineAddFields"][] = "update_uid";

$tdatapad_pad_pegawai[".editFields"] = array();
$tdatapad_pad_pegawai[".editFields"][] = "nip";
$tdatapad_pad_pegawai[".editFields"][] = "nama";
$tdatapad_pad_pegawai[".editFields"][] = "jabatan";
$tdatapad_pad_pegawai[".editFields"][] = "golongan";
$tdatapad_pad_pegawai[".editFields"][] = "pangkat";
$tdatapad_pad_pegawai[".editFields"][] = "tmt";
$tdatapad_pad_pegawai[".editFields"][] = "enabled";
$tdatapad_pad_pegawai[".editFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".editFields"][] = "bagian";
$tdatapad_pad_pegawai[".editFields"][] = "created";
$tdatapad_pad_pegawai[".editFields"][] = "updated";
$tdatapad_pad_pegawai[".editFields"][] = "create_uid";
$tdatapad_pad_pegawai[".editFields"][] = "update_uid";

$tdatapad_pad_pegawai[".inlineEditFields"] = array();
$tdatapad_pad_pegawai[".inlineEditFields"][] = "nip";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "nama";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "jabatan";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "golongan";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "pangkat";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "tmt";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "enabled";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "bagian";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "created";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "updated";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_pegawai[".inlineEditFields"][] = "update_uid";

$tdatapad_pad_pegawai[".exportFields"] = array();
$tdatapad_pad_pegawai[".exportFields"][] = "id";
$tdatapad_pad_pegawai[".exportFields"][] = "nip";
$tdatapad_pad_pegawai[".exportFields"][] = "nama";
$tdatapad_pad_pegawai[".exportFields"][] = "jabatan";
$tdatapad_pad_pegawai[".exportFields"][] = "golongan";
$tdatapad_pad_pegawai[".exportFields"][] = "pangkat";
$tdatapad_pad_pegawai[".exportFields"][] = "tmt";
$tdatapad_pad_pegawai[".exportFields"][] = "enabled";
$tdatapad_pad_pegawai[".exportFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".exportFields"][] = "bagian";
$tdatapad_pad_pegawai[".exportFields"][] = "created";
$tdatapad_pad_pegawai[".exportFields"][] = "updated";
$tdatapad_pad_pegawai[".exportFields"][] = "create_uid";
$tdatapad_pad_pegawai[".exportFields"][] = "update_uid";

$tdatapad_pad_pegawai[".printFields"] = array();
$tdatapad_pad_pegawai[".printFields"][] = "id";
$tdatapad_pad_pegawai[".printFields"][] = "nip";
$tdatapad_pad_pegawai[".printFields"][] = "nama";
$tdatapad_pad_pegawai[".printFields"][] = "jabatan";
$tdatapad_pad_pegawai[".printFields"][] = "golongan";
$tdatapad_pad_pegawai[".printFields"][] = "pangkat";
$tdatapad_pad_pegawai[".printFields"][] = "tmt";
$tdatapad_pad_pegawai[".printFields"][] = "enabled";
$tdatapad_pad_pegawai[".printFields"][] = "nomor_telp";
$tdatapad_pad_pegawai[".printFields"][] = "bagian";
$tdatapad_pad_pegawai[".printFields"][] = "created";
$tdatapad_pad_pegawai[".printFields"][] = "updated";
$tdatapad_pad_pegawai[".printFields"][] = "create_uid";
$tdatapad_pad_pegawai[".printFields"][] = "update_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_pegawai";
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
	
		
		
	$tdatapad_pad_pegawai["id"] = $fdata;
//	nip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nip";
	$fdata["GoodName"] = "nip";
	$fdata["ownerTable"] = "pad.pad_pegawai";
	$fdata["Label"] = "Nip"; 
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
	
		$fdata["strField"] = "nip"; 
		$fdata["FullName"] = "nip";
	
		
		
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
			$edata["EditParams"].= " maxlength=30";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pegawai["nip"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_pegawai";
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
			$edata["EditParams"].= " maxlength=255";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pegawai["nama"] = $fdata;
//	jabatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "jabatan";
	$fdata["GoodName"] = "jabatan";
	$fdata["ownerTable"] = "pad.pad_pegawai";
	$fdata["Label"] = "Jabatan"; 
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
	
		$fdata["strField"] = "jabatan"; 
		$fdata["FullName"] = "jabatan";
	
		
		
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
	
		
		
	$tdatapad_pad_pegawai["jabatan"] = $fdata;
//	golongan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "golongan";
	$fdata["GoodName"] = "golongan";
	$fdata["ownerTable"] = "pad.pad_pegawai";
	$fdata["Label"] = "Golongan"; 
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
	
		$fdata["strField"] = "golongan"; 
		$fdata["FullName"] = "golongan";
	
		
		
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
			$edata["EditParams"].= " maxlength=5";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pegawai["golongan"] = $fdata;
//	pangkat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "pangkat";
	$fdata["GoodName"] = "pangkat";
	$fdata["ownerTable"] = "pad.pad_pegawai";
	$fdata["Label"] = "Pangkat"; 
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
	
		$fdata["strField"] = "pangkat"; 
		$fdata["FullName"] = "pangkat";
	
		
		
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
			$edata["EditParams"].= " maxlength=30";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pegawai["pangkat"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_pegawai";
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
	
		
		
	$tdatapad_pad_pegawai["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_pegawai";
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
	
		
		
	$tdatapad_pad_pegawai["enabled"] = $fdata;
//	nomor_telp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "nomor_telp";
	$fdata["GoodName"] = "nomor_telp";
	$fdata["ownerTable"] = "pad.pad_pegawai";
	$fdata["Label"] = "Nomor Telp"; 
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
	
		$fdata["strField"] = "nomor_telp"; 
		$fdata["FullName"] = "nomor_telp";
	
		
		
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
			$edata["EditParams"].= " maxlength=20";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pegawai["nomor_telp"] = $fdata;
//	bagian
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "bagian";
	$fdata["GoodName"] = "bagian";
	$fdata["ownerTable"] = "pad.pad_pegawai";
	$fdata["Label"] = "Bagian"; 
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
	
		$fdata["strField"] = "bagian"; 
		$fdata["FullName"] = "bagian";
	
		
		
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
	
		
		
	$tdatapad_pad_pegawai["bagian"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_pegawai";
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
	
		
		
	$tdatapad_pad_pegawai["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_pegawai";
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
	
		
		
	$tdatapad_pad_pegawai["updated"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_pegawai";
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
	
		
		
	$tdatapad_pad_pegawai["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_pegawai";
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
	
		
		
	$tdatapad_pad_pegawai["update_uid"] = $fdata;

	
$tables_data["pad.pad_pegawai"]=&$tdatapad_pad_pegawai;
$field_labels["pad_pad_pegawai"] = &$fieldLabelspad_pad_pegawai;
$fieldToolTips["pad.pad_pegawai"] = &$fieldToolTipspad_pad_pegawai;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_pegawai"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_pegawai"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_pegawai()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nip,   nama,   jabatan,   golongan,   pangkat,   tmt,   enabled,   nomor_telp,   bagian,   created,   updated,   create_uid,   update_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_pegawai";
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
	"m_strTable" => "pad.pad_pegawai"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nip",
	"m_strTable" => "pad.pad_pegawai"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_pegawai"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "jabatan",
	"m_strTable" => "pad.pad_pegawai"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "golongan",
	"m_strTable" => "pad.pad_pegawai"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "pangkat",
	"m_strTable" => "pad.pad_pegawai"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_pegawai"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_pegawai"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "nomor_telp",
	"m_strTable" => "pad.pad_pegawai"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "bagian",
	"m_strTable" => "pad.pad_pegawai"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_pegawai"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_pegawai"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_pegawai"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_pegawai"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto33=array();
$proto33["m_link"] = "SQLL_MAIN";
			$proto34=array();
$proto34["m_strName"] = "pad.pad_pegawai";
$proto34["m_columns"] = array();
$proto34["m_columns"][] = "id";
$proto34["m_columns"][] = "nip";
$proto34["m_columns"][] = "nama";
$proto34["m_columns"][] = "jabatan";
$proto34["m_columns"][] = "golongan";
$proto34["m_columns"][] = "pangkat";
$proto34["m_columns"][] = "tmt";
$proto34["m_columns"][] = "enabled";
$proto34["m_columns"][] = "nomor_telp";
$proto34["m_columns"][] = "bagian";
$proto34["m_columns"][] = "created";
$proto34["m_columns"][] = "updated";
$proto34["m_columns"][] = "create_uid";
$proto34["m_columns"][] = "update_uid";
$obj = new SQLTable($proto34);

$proto33["m_table"] = $obj;
$proto33["m_alias"] = "";
$proto35=array();
$proto35["m_sql"] = "";
$proto35["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto35["m_column"]=$obj;
$proto35["m_contained"] = array();
$proto35["m_strCase"] = "";
$proto35["m_havingmode"] = "0";
$proto35["m_inBrackets"] = "0";
$proto35["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto35);

$proto33["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto33);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_pegawai = createSqlQuery_pad_pad_pegawai();
														$tdatapad_pad_pegawai[".sqlquery"] = $queryData_pad_pad_pegawai;
	
if(isset($tdatapad_pad_pegawai["field2"])){
	$tdatapad_pad_pegawai["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_pegawai["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_pegawai["field2"]["LookupType"] = 4;
	$tdatapad_pad_pegawai["field2"]["LinkField"] = "email";
	$tdatapad_pad_pegawai["field2"]["DisplayField"] = "name";
	$tdatapad_pad_pegawai[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_pegawai"] = new eventsBase;
$tdatapad_pad_pegawai[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_pegawai");

?>