<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_periksa = array();
	$tdatapad_pad_periksa[".NumberOfChars"] = 80; 
	$tdatapad_pad_periksa[".ShortName"] = "pad_pad_periksa";
	$tdatapad_pad_periksa[".OwnerID"] = "";
	$tdatapad_pad_periksa[".OriginalTable"] = "pad.pad_periksa";

//	field labels
$fieldLabelspad_pad_periksa = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_periksa["English"] = array();
	$fieldToolTipspad_pad_periksa["English"] = array();
	$fieldLabelspad_pad_periksa["English"]["id"] = "Id";
	$fieldToolTipspad_pad_periksa["English"]["id"] = "";
	$fieldLabelspad_pad_periksa["English"]["tahun"] = "Tahun";
	$fieldToolTipspad_pad_periksa["English"]["tahun"] = "";
	$fieldLabelspad_pad_periksa["English"]["periksa_no"] = "Periksa No";
	$fieldToolTipspad_pad_periksa["English"]["periksa_no"] = "";
	$fieldLabelspad_pad_periksa["English"]["periksa_tgl"] = "Periksa Tgl";
	$fieldToolTipspad_pad_periksa["English"]["periksa_tgl"] = "";
	$fieldLabelspad_pad_periksa["English"]["invoice_id"] = "Invoice Id";
	$fieldToolTipspad_pad_periksa["English"]["invoice_id"] = "";
	$fieldLabelspad_pad_periksa["English"]["lhp_no"] = "Lhp No";
	$fieldToolTipspad_pad_periksa["English"]["lhp_no"] = "";
	$fieldLabelspad_pad_periksa["English"]["keterangan"] = "Keterangan";
	$fieldToolTipspad_pad_periksa["English"]["keterangan"] = "";
	$fieldLabelspad_pad_periksa["English"]["pokok"] = "Pokok";
	$fieldToolTipspad_pad_periksa["English"]["pokok"] = "";
	$fieldLabelspad_pad_periksa["English"]["denda"] = "Denda";
	$fieldToolTipspad_pad_periksa["English"]["denda"] = "";
	$fieldLabelspad_pad_periksa["English"]["bunga"] = "Bunga";
	$fieldToolTipspad_pad_periksa["English"]["bunga"] = "";
	$fieldLabelspad_pad_periksa["English"]["total"] = "Total";
	$fieldToolTipspad_pad_periksa["English"]["total"] = "";
	$fieldLabelspad_pad_periksa["English"]["created"] = "Created";
	$fieldToolTipspad_pad_periksa["English"]["created"] = "";
	$fieldLabelspad_pad_periksa["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_periksa["English"]["updated"] = "";
	$fieldLabelspad_pad_periksa["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_periksa["English"]["create_uid"] = "";
	$fieldLabelspad_pad_periksa["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_periksa["English"]["update_uid"] = "";
	if (count($fieldToolTipspad_pad_periksa["English"]))
		$tdatapad_pad_periksa[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_periksa[".NCSearch"] = true;



$tdatapad_pad_periksa[".shortTableName"] = "pad_pad_periksa";
$tdatapad_pad_periksa[".nSecOptions"] = 0;
$tdatapad_pad_periksa[".recsPerRowList"] = 1;
$tdatapad_pad_periksa[".mainTableOwnerID"] = "";
$tdatapad_pad_periksa[".moveNext"] = 1;
$tdatapad_pad_periksa[".nType"] = 0;

$tdatapad_pad_periksa[".strOriginalTableName"] = "pad.pad_periksa";




$tdatapad_pad_periksa[".showAddInPopup"] = false;

$tdatapad_pad_periksa[".showEditInPopup"] = false;

$tdatapad_pad_periksa[".showViewInPopup"] = false;

$tdatapad_pad_periksa[".fieldsForRegister"] = array();

$tdatapad_pad_periksa[".listAjax"] = false;

	$tdatapad_pad_periksa[".audit"] = false;

	$tdatapad_pad_periksa[".locking"] = false;

$tdatapad_pad_periksa[".listIcons"] = true;
$tdatapad_pad_periksa[".edit"] = true;
$tdatapad_pad_periksa[".inlineEdit"] = true;
$tdatapad_pad_periksa[".inlineAdd"] = true;
$tdatapad_pad_periksa[".view"] = true;

$tdatapad_pad_periksa[".exportTo"] = true;

$tdatapad_pad_periksa[".printFriendly"] = true;

$tdatapad_pad_periksa[".delete"] = true;

$tdatapad_pad_periksa[".showSimpleSearchOptions"] = false;

$tdatapad_pad_periksa[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_periksa[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_periksa[".isUseAjaxSuggest"] = true;

$tdatapad_pad_periksa[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_periksa[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_periksa[".isUseTimeForSearch"] = false;




$tdatapad_pad_periksa[".allSearchFields"] = array();

$tdatapad_pad_periksa[".allSearchFields"][] = "id";
$tdatapad_pad_periksa[".allSearchFields"][] = "tahun";
$tdatapad_pad_periksa[".allSearchFields"][] = "periksa_no";
$tdatapad_pad_periksa[".allSearchFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".allSearchFields"][] = "invoice_id";
$tdatapad_pad_periksa[".allSearchFields"][] = "lhp_no";
$tdatapad_pad_periksa[".allSearchFields"][] = "keterangan";
$tdatapad_pad_periksa[".allSearchFields"][] = "pokok";
$tdatapad_pad_periksa[".allSearchFields"][] = "denda";
$tdatapad_pad_periksa[".allSearchFields"][] = "bunga";
$tdatapad_pad_periksa[".allSearchFields"][] = "total";
$tdatapad_pad_periksa[".allSearchFields"][] = "created";
$tdatapad_pad_periksa[".allSearchFields"][] = "updated";
$tdatapad_pad_periksa[".allSearchFields"][] = "create_uid";
$tdatapad_pad_periksa[".allSearchFields"][] = "update_uid";

$tdatapad_pad_periksa[".googleLikeFields"][] = "id";
$tdatapad_pad_periksa[".googleLikeFields"][] = "tahun";
$tdatapad_pad_periksa[".googleLikeFields"][] = "periksa_no";
$tdatapad_pad_periksa[".googleLikeFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".googleLikeFields"][] = "invoice_id";
$tdatapad_pad_periksa[".googleLikeFields"][] = "lhp_no";
$tdatapad_pad_periksa[".googleLikeFields"][] = "keterangan";
$tdatapad_pad_periksa[".googleLikeFields"][] = "pokok";
$tdatapad_pad_periksa[".googleLikeFields"][] = "denda";
$tdatapad_pad_periksa[".googleLikeFields"][] = "bunga";
$tdatapad_pad_periksa[".googleLikeFields"][] = "total";
$tdatapad_pad_periksa[".googleLikeFields"][] = "created";
$tdatapad_pad_periksa[".googleLikeFields"][] = "updated";
$tdatapad_pad_periksa[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_periksa[".googleLikeFields"][] = "update_uid";


$tdatapad_pad_periksa[".advSearchFields"][] = "id";
$tdatapad_pad_periksa[".advSearchFields"][] = "tahun";
$tdatapad_pad_periksa[".advSearchFields"][] = "periksa_no";
$tdatapad_pad_periksa[".advSearchFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".advSearchFields"][] = "invoice_id";
$tdatapad_pad_periksa[".advSearchFields"][] = "lhp_no";
$tdatapad_pad_periksa[".advSearchFields"][] = "keterangan";
$tdatapad_pad_periksa[".advSearchFields"][] = "pokok";
$tdatapad_pad_periksa[".advSearchFields"][] = "denda";
$tdatapad_pad_periksa[".advSearchFields"][] = "bunga";
$tdatapad_pad_periksa[".advSearchFields"][] = "total";
$tdatapad_pad_periksa[".advSearchFields"][] = "created";
$tdatapad_pad_periksa[".advSearchFields"][] = "updated";
$tdatapad_pad_periksa[".advSearchFields"][] = "create_uid";
$tdatapad_pad_periksa[".advSearchFields"][] = "update_uid";

$tdatapad_pad_periksa[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_periksa[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_periksa[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_periksa[".orderindexes"] = array();

$tdatapad_pad_periksa[".sqlHead"] = "SELECT id,   tahun,   periksa_no,   periksa_tgl,   invoice_id,   lhp_no,   keterangan,   pokok,   denda,   bunga,   total,   created,   updated,   create_uid,   update_uid";
$tdatapad_pad_periksa[".sqlFrom"] = "FROM \"pad\".pad_periksa";
$tdatapad_pad_periksa[".sqlWhereExpr"] = "";
$tdatapad_pad_periksa[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_periksa[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_periksa[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_periksa = array();
$tableKeyspad_pad_periksa[] = "id";
$tdatapad_pad_periksa[".Keys"] = $tableKeyspad_pad_periksa;

$tdatapad_pad_periksa[".listFields"] = array();
$tdatapad_pad_periksa[".listFields"][] = "id";
$tdatapad_pad_periksa[".listFields"][] = "tahun";
$tdatapad_pad_periksa[".listFields"][] = "periksa_no";
$tdatapad_pad_periksa[".listFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".listFields"][] = "invoice_id";
$tdatapad_pad_periksa[".listFields"][] = "lhp_no";
$tdatapad_pad_periksa[".listFields"][] = "keterangan";
$tdatapad_pad_periksa[".listFields"][] = "pokok";
$tdatapad_pad_periksa[".listFields"][] = "denda";
$tdatapad_pad_periksa[".listFields"][] = "bunga";
$tdatapad_pad_periksa[".listFields"][] = "total";
$tdatapad_pad_periksa[".listFields"][] = "created";
$tdatapad_pad_periksa[".listFields"][] = "updated";
$tdatapad_pad_periksa[".listFields"][] = "create_uid";
$tdatapad_pad_periksa[".listFields"][] = "update_uid";

$tdatapad_pad_periksa[".viewFields"] = array();
$tdatapad_pad_periksa[".viewFields"][] = "id";
$tdatapad_pad_periksa[".viewFields"][] = "tahun";
$tdatapad_pad_periksa[".viewFields"][] = "periksa_no";
$tdatapad_pad_periksa[".viewFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".viewFields"][] = "invoice_id";
$tdatapad_pad_periksa[".viewFields"][] = "lhp_no";
$tdatapad_pad_periksa[".viewFields"][] = "keterangan";
$tdatapad_pad_periksa[".viewFields"][] = "pokok";
$tdatapad_pad_periksa[".viewFields"][] = "denda";
$tdatapad_pad_periksa[".viewFields"][] = "bunga";
$tdatapad_pad_periksa[".viewFields"][] = "total";
$tdatapad_pad_periksa[".viewFields"][] = "created";
$tdatapad_pad_periksa[".viewFields"][] = "updated";
$tdatapad_pad_periksa[".viewFields"][] = "create_uid";
$tdatapad_pad_periksa[".viewFields"][] = "update_uid";

$tdatapad_pad_periksa[".addFields"] = array();
$tdatapad_pad_periksa[".addFields"][] = "tahun";
$tdatapad_pad_periksa[".addFields"][] = "periksa_no";
$tdatapad_pad_periksa[".addFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".addFields"][] = "invoice_id";
$tdatapad_pad_periksa[".addFields"][] = "lhp_no";
$tdatapad_pad_periksa[".addFields"][] = "keterangan";
$tdatapad_pad_periksa[".addFields"][] = "pokok";
$tdatapad_pad_periksa[".addFields"][] = "denda";
$tdatapad_pad_periksa[".addFields"][] = "bunga";
$tdatapad_pad_periksa[".addFields"][] = "total";
$tdatapad_pad_periksa[".addFields"][] = "created";
$tdatapad_pad_periksa[".addFields"][] = "updated";
$tdatapad_pad_periksa[".addFields"][] = "create_uid";
$tdatapad_pad_periksa[".addFields"][] = "update_uid";

$tdatapad_pad_periksa[".inlineAddFields"] = array();
$tdatapad_pad_periksa[".inlineAddFields"][] = "tahun";
$tdatapad_pad_periksa[".inlineAddFields"][] = "periksa_no";
$tdatapad_pad_periksa[".inlineAddFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".inlineAddFields"][] = "invoice_id";
$tdatapad_pad_periksa[".inlineAddFields"][] = "lhp_no";
$tdatapad_pad_periksa[".inlineAddFields"][] = "keterangan";
$tdatapad_pad_periksa[".inlineAddFields"][] = "pokok";
$tdatapad_pad_periksa[".inlineAddFields"][] = "denda";
$tdatapad_pad_periksa[".inlineAddFields"][] = "bunga";
$tdatapad_pad_periksa[".inlineAddFields"][] = "total";
$tdatapad_pad_periksa[".inlineAddFields"][] = "created";
$tdatapad_pad_periksa[".inlineAddFields"][] = "updated";
$tdatapad_pad_periksa[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_periksa[".inlineAddFields"][] = "update_uid";

$tdatapad_pad_periksa[".editFields"] = array();
$tdatapad_pad_periksa[".editFields"][] = "tahun";
$tdatapad_pad_periksa[".editFields"][] = "periksa_no";
$tdatapad_pad_periksa[".editFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".editFields"][] = "invoice_id";
$tdatapad_pad_periksa[".editFields"][] = "lhp_no";
$tdatapad_pad_periksa[".editFields"][] = "keterangan";
$tdatapad_pad_periksa[".editFields"][] = "pokok";
$tdatapad_pad_periksa[".editFields"][] = "denda";
$tdatapad_pad_periksa[".editFields"][] = "bunga";
$tdatapad_pad_periksa[".editFields"][] = "total";
$tdatapad_pad_periksa[".editFields"][] = "created";
$tdatapad_pad_periksa[".editFields"][] = "updated";
$tdatapad_pad_periksa[".editFields"][] = "create_uid";
$tdatapad_pad_periksa[".editFields"][] = "update_uid";

$tdatapad_pad_periksa[".inlineEditFields"] = array();
$tdatapad_pad_periksa[".inlineEditFields"][] = "tahun";
$tdatapad_pad_periksa[".inlineEditFields"][] = "periksa_no";
$tdatapad_pad_periksa[".inlineEditFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".inlineEditFields"][] = "invoice_id";
$tdatapad_pad_periksa[".inlineEditFields"][] = "lhp_no";
$tdatapad_pad_periksa[".inlineEditFields"][] = "keterangan";
$tdatapad_pad_periksa[".inlineEditFields"][] = "pokok";
$tdatapad_pad_periksa[".inlineEditFields"][] = "denda";
$tdatapad_pad_periksa[".inlineEditFields"][] = "bunga";
$tdatapad_pad_periksa[".inlineEditFields"][] = "total";
$tdatapad_pad_periksa[".inlineEditFields"][] = "created";
$tdatapad_pad_periksa[".inlineEditFields"][] = "updated";
$tdatapad_pad_periksa[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_periksa[".inlineEditFields"][] = "update_uid";

$tdatapad_pad_periksa[".exportFields"] = array();
$tdatapad_pad_periksa[".exportFields"][] = "id";
$tdatapad_pad_periksa[".exportFields"][] = "tahun";
$tdatapad_pad_periksa[".exportFields"][] = "periksa_no";
$tdatapad_pad_periksa[".exportFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".exportFields"][] = "invoice_id";
$tdatapad_pad_periksa[".exportFields"][] = "lhp_no";
$tdatapad_pad_periksa[".exportFields"][] = "keterangan";
$tdatapad_pad_periksa[".exportFields"][] = "pokok";
$tdatapad_pad_periksa[".exportFields"][] = "denda";
$tdatapad_pad_periksa[".exportFields"][] = "bunga";
$tdatapad_pad_periksa[".exportFields"][] = "total";
$tdatapad_pad_periksa[".exportFields"][] = "created";
$tdatapad_pad_periksa[".exportFields"][] = "updated";
$tdatapad_pad_periksa[".exportFields"][] = "create_uid";
$tdatapad_pad_periksa[".exportFields"][] = "update_uid";

$tdatapad_pad_periksa[".printFields"] = array();
$tdatapad_pad_periksa[".printFields"][] = "id";
$tdatapad_pad_periksa[".printFields"][] = "tahun";
$tdatapad_pad_periksa[".printFields"][] = "periksa_no";
$tdatapad_pad_periksa[".printFields"][] = "periksa_tgl";
$tdatapad_pad_periksa[".printFields"][] = "invoice_id";
$tdatapad_pad_periksa[".printFields"][] = "lhp_no";
$tdatapad_pad_periksa[".printFields"][] = "keterangan";
$tdatapad_pad_periksa[".printFields"][] = "pokok";
$tdatapad_pad_periksa[".printFields"][] = "denda";
$tdatapad_pad_periksa[".printFields"][] = "bunga";
$tdatapad_pad_periksa[".printFields"][] = "total";
$tdatapad_pad_periksa[".printFields"][] = "created";
$tdatapad_pad_periksa[".printFields"][] = "updated";
$tdatapad_pad_periksa[".printFields"][] = "create_uid";
$tdatapad_pad_periksa[".printFields"][] = "update_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_periksa";
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
	
		
		
	$tdatapad_pad_periksa["id"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Tahun"; 
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
	
		$fdata["strField"] = "tahun"; 
		$fdata["FullName"] = "tahun";
	
		
		
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
	
		
		
	$tdatapad_pad_periksa["tahun"] = $fdata;
//	periksa_no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "periksa_no";
	$fdata["GoodName"] = "periksa_no";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Periksa No"; 
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
	
		$fdata["strField"] = "periksa_no"; 
		$fdata["FullName"] = "periksa_no";
	
		
		
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
	
		
		
	$tdatapad_pad_periksa["periksa_no"] = $fdata;
//	periksa_tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "periksa_tgl";
	$fdata["GoodName"] = "periksa_tgl";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Periksa Tgl"; 
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
	
		$fdata["strField"] = "periksa_tgl"; 
		$fdata["FullName"] = "periksa_tgl";
	
		
		
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
	
		
		
	$tdatapad_pad_periksa["periksa_tgl"] = $fdata;
//	invoice_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "invoice_id";
	$fdata["GoodName"] = "invoice_id";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Invoice Id"; 
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
	
		$fdata["strField"] = "invoice_id"; 
		$fdata["FullName"] = "invoice_id";
	
		
		
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
								$edata["LookupType"] = 1;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "id";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad_invoice";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
		$edata["SimpleAdd"] = true;
			
	
	
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
	
		
		
	$tdatapad_pad_periksa["invoice_id"] = $fdata;
//	lhp_no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "lhp_no";
	$fdata["GoodName"] = "lhp_no";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Lhp No"; 
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
	
		$fdata["strField"] = "lhp_no"; 
		$fdata["FullName"] = "lhp_no";
	
		
		
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
	
		
		
	$tdatapad_pad_periksa["lhp_no"] = $fdata;
//	keterangan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "keterangan";
	$fdata["GoodName"] = "keterangan";
	$fdata["ownerTable"] = "pad.pad_periksa";
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
			$edata["EditParams"].= " maxlength=1000";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_periksa["keterangan"] = $fdata;
//	pokok
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "pokok";
	$fdata["GoodName"] = "pokok";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Pokok"; 
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
	
		$fdata["strField"] = "pokok"; 
		$fdata["FullName"] = "pokok";
	
		
		
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
	
		
		
	$tdatapad_pad_periksa["pokok"] = $fdata;
//	denda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "denda";
	$fdata["GoodName"] = "denda";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Denda"; 
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
	
		$fdata["strField"] = "denda"; 
		$fdata["FullName"] = "denda";
	
		
		
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
	
		
		
	$tdatapad_pad_periksa["denda"] = $fdata;
//	bunga
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "bunga";
	$fdata["GoodName"] = "bunga";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Bunga"; 
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
	
		$fdata["strField"] = "bunga"; 
		$fdata["FullName"] = "bunga";
	
		
		
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
	
		
		
	$tdatapad_pad_periksa["bunga"] = $fdata;
//	total
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "total";
	$fdata["GoodName"] = "total";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Total"; 
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
	
		$fdata["strField"] = "total"; 
		$fdata["FullName"] = "total";
	
		
		
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
	
		
		
	$tdatapad_pad_periksa["total"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_periksa";
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
	
		
		
	$tdatapad_pad_periksa["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_periksa";
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
	
		
		
	$tdatapad_pad_periksa["updated"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Create Uid"; 
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
	
		
		
	$tdatapad_pad_periksa["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_periksa";
	$fdata["Label"] = "Update Uid"; 
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
	
		
		
	$tdatapad_pad_periksa["update_uid"] = $fdata;

	
$tables_data["pad.pad_periksa"]=&$tdatapad_pad_periksa;
$field_labels["pad_pad_periksa"] = &$fieldLabelspad_pad_periksa;
$fieldToolTips["pad.pad_periksa"] = &$fieldToolTipspad_pad_periksa;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_periksa"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_periksa"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_periksa()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tahun,   periksa_no,   periksa_tgl,   invoice_id,   lhp_no,   keterangan,   pokok,   denda,   bunga,   total,   created,   updated,   create_uid,   update_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_periksa";
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
	"m_strTable" => "pad.pad_periksa"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "pad.pad_periksa"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "periksa_no",
	"m_strTable" => "pad.pad_periksa"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "periksa_tgl",
	"m_strTable" => "pad.pad_periksa"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "invoice_id",
	"m_strTable" => "pad.pad_periksa"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "lhp_no",
	"m_strTable" => "pad.pad_periksa"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan",
	"m_strTable" => "pad.pad_periksa"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "pokok",
	"m_strTable" => "pad.pad_periksa"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "denda",
	"m_strTable" => "pad.pad_periksa"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "bunga",
	"m_strTable" => "pad.pad_periksa"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "total",
	"m_strTable" => "pad.pad_periksa"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_periksa"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_periksa"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_periksa"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_periksa"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto35=array();
$proto35["m_link"] = "SQLL_MAIN";
			$proto36=array();
$proto36["m_strName"] = "pad.pad_periksa";
$proto36["m_columns"] = array();
$proto36["m_columns"][] = "id";
$proto36["m_columns"][] = "tahun";
$proto36["m_columns"][] = "periksa_no";
$proto36["m_columns"][] = "periksa_tgl";
$proto36["m_columns"][] = "invoice_id";
$proto36["m_columns"][] = "lhp_no";
$proto36["m_columns"][] = "keterangan";
$proto36["m_columns"][] = "pokok";
$proto36["m_columns"][] = "denda";
$proto36["m_columns"][] = "bunga";
$proto36["m_columns"][] = "total";
$proto36["m_columns"][] = "created";
$proto36["m_columns"][] = "updated";
$proto36["m_columns"][] = "create_uid";
$proto36["m_columns"][] = "update_uid";
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
$queryData_pad_pad_periksa = createSqlQuery_pad_pad_periksa();
															$tdatapad_pad_periksa[".sqlquery"] = $queryData_pad_pad_periksa;
	
if(isset($tdatapad_pad_periksa["field2"])){
	$tdatapad_pad_periksa["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_periksa["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_periksa["field2"]["LookupType"] = 4;
	$tdatapad_pad_periksa["field2"]["LinkField"] = "email";
	$tdatapad_pad_periksa["field2"]["DisplayField"] = "name";
	$tdatapad_pad_periksa[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_periksa"] = new eventsBase;
$tdatapad_pad_periksa[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_periksa");

?>