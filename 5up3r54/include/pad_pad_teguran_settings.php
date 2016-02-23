<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_teguran = array();
	$tdatapad_pad_teguran[".NumberOfChars"] = 80; 
	$tdatapad_pad_teguran[".ShortName"] = "pad_pad_teguran";
	$tdatapad_pad_teguran[".OwnerID"] = "";
	$tdatapad_pad_teguran[".OriginalTable"] = "pad.pad_teguran";

//	field labels
$fieldLabelspad_pad_teguran = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_teguran["English"] = array();
	$fieldToolTipspad_pad_teguran["English"] = array();
	$fieldLabelspad_pad_teguran["English"]["id"] = "Id";
	$fieldToolTipspad_pad_teguran["English"]["id"] = "";
	$fieldLabelspad_pad_teguran["English"]["tahun"] = "Tahun";
	$fieldToolTipspad_pad_teguran["English"]["tahun"] = "";
	$fieldLabelspad_pad_teguran["English"]["tanggal"] = "Tanggal";
	$fieldToolTipspad_pad_teguran["English"]["tanggal"] = "";
	$fieldLabelspad_pad_teguran["English"]["teguran_no"] = "Teguran No";
	$fieldToolTipspad_pad_teguran["English"]["teguran_no"] = "";
	$fieldLabelspad_pad_teguran["English"]["invoice_id"] = "Invoice Id";
	$fieldToolTipspad_pad_teguran["English"]["invoice_id"] = "";
	$fieldLabelspad_pad_teguran["English"]["keterangan"] = "Keterangan";
	$fieldToolTipspad_pad_teguran["English"]["keterangan"] = "";
	$fieldLabelspad_pad_teguran["English"]["cetak_ke"] = "Cetak Ke";
	$fieldToolTipspad_pad_teguran["English"]["cetak_ke"] = "";
	$fieldLabelspad_pad_teguran["English"]["created"] = "Created";
	$fieldToolTipspad_pad_teguran["English"]["created"] = "";
	$fieldLabelspad_pad_teguran["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_teguran["English"]["updated"] = "";
	$fieldLabelspad_pad_teguran["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_teguran["English"]["create_uid"] = "";
	$fieldLabelspad_pad_teguran["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_teguran["English"]["update_uid"] = "";
	if (count($fieldToolTipspad_pad_teguran["English"]))
		$tdatapad_pad_teguran[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_teguran[".NCSearch"] = true;



$tdatapad_pad_teguran[".shortTableName"] = "pad_pad_teguran";
$tdatapad_pad_teguran[".nSecOptions"] = 0;
$tdatapad_pad_teguran[".recsPerRowList"] = 1;
$tdatapad_pad_teguran[".mainTableOwnerID"] = "";
$tdatapad_pad_teguran[".moveNext"] = 1;
$tdatapad_pad_teguran[".nType"] = 0;

$tdatapad_pad_teguran[".strOriginalTableName"] = "pad.pad_teguran";




$tdatapad_pad_teguran[".showAddInPopup"] = false;

$tdatapad_pad_teguran[".showEditInPopup"] = false;

$tdatapad_pad_teguran[".showViewInPopup"] = false;

$tdatapad_pad_teguran[".fieldsForRegister"] = array();

$tdatapad_pad_teguran[".listAjax"] = false;

	$tdatapad_pad_teguran[".audit"] = false;

	$tdatapad_pad_teguran[".locking"] = false;

$tdatapad_pad_teguran[".listIcons"] = true;
$tdatapad_pad_teguran[".edit"] = true;
$tdatapad_pad_teguran[".inlineEdit"] = true;
$tdatapad_pad_teguran[".inlineAdd"] = true;
$tdatapad_pad_teguran[".view"] = true;

$tdatapad_pad_teguran[".exportTo"] = true;

$tdatapad_pad_teguran[".printFriendly"] = true;

$tdatapad_pad_teguran[".delete"] = true;

$tdatapad_pad_teguran[".showSimpleSearchOptions"] = false;

$tdatapad_pad_teguran[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_teguran[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_teguran[".isUseAjaxSuggest"] = true;

$tdatapad_pad_teguran[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_teguran[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_teguran[".isUseTimeForSearch"] = false;




$tdatapad_pad_teguran[".allSearchFields"] = array();

$tdatapad_pad_teguran[".allSearchFields"][] = "id";
$tdatapad_pad_teguran[".allSearchFields"][] = "tahun";
$tdatapad_pad_teguran[".allSearchFields"][] = "tanggal";
$tdatapad_pad_teguran[".allSearchFields"][] = "teguran_no";
$tdatapad_pad_teguran[".allSearchFields"][] = "invoice_id";
$tdatapad_pad_teguran[".allSearchFields"][] = "keterangan";
$tdatapad_pad_teguran[".allSearchFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".allSearchFields"][] = "created";
$tdatapad_pad_teguran[".allSearchFields"][] = "updated";
$tdatapad_pad_teguran[".allSearchFields"][] = "create_uid";
$tdatapad_pad_teguran[".allSearchFields"][] = "update_uid";

$tdatapad_pad_teguran[".googleLikeFields"][] = "id";
$tdatapad_pad_teguran[".googleLikeFields"][] = "tahun";
$tdatapad_pad_teguran[".googleLikeFields"][] = "tanggal";
$tdatapad_pad_teguran[".googleLikeFields"][] = "teguran_no";
$tdatapad_pad_teguran[".googleLikeFields"][] = "invoice_id";
$tdatapad_pad_teguran[".googleLikeFields"][] = "keterangan";
$tdatapad_pad_teguran[".googleLikeFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".googleLikeFields"][] = "created";
$tdatapad_pad_teguran[".googleLikeFields"][] = "updated";
$tdatapad_pad_teguran[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_teguran[".googleLikeFields"][] = "update_uid";


$tdatapad_pad_teguran[".advSearchFields"][] = "id";
$tdatapad_pad_teguran[".advSearchFields"][] = "tahun";
$tdatapad_pad_teguran[".advSearchFields"][] = "tanggal";
$tdatapad_pad_teguran[".advSearchFields"][] = "teguran_no";
$tdatapad_pad_teguran[".advSearchFields"][] = "invoice_id";
$tdatapad_pad_teguran[".advSearchFields"][] = "keterangan";
$tdatapad_pad_teguran[".advSearchFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".advSearchFields"][] = "created";
$tdatapad_pad_teguran[".advSearchFields"][] = "updated";
$tdatapad_pad_teguran[".advSearchFields"][] = "create_uid";
$tdatapad_pad_teguran[".advSearchFields"][] = "update_uid";

$tdatapad_pad_teguran[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_teguran[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_teguran[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_teguran[".orderindexes"] = array();

$tdatapad_pad_teguran[".sqlHead"] = "SELECT id,   tahun,   tanggal,   teguran_no,   invoice_id,   keterangan,   cetak_ke,   created,   updated,   create_uid,   update_uid";
$tdatapad_pad_teguran[".sqlFrom"] = "FROM \"pad\".pad_teguran";
$tdatapad_pad_teguran[".sqlWhereExpr"] = "";
$tdatapad_pad_teguran[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_teguran[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_teguran[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_teguran = array();
$tableKeyspad_pad_teguran[] = "id";
$tdatapad_pad_teguran[".Keys"] = $tableKeyspad_pad_teguran;

$tdatapad_pad_teguran[".listFields"] = array();
$tdatapad_pad_teguran[".listFields"][] = "id";
$tdatapad_pad_teguran[".listFields"][] = "tahun";
$tdatapad_pad_teguran[".listFields"][] = "tanggal";
$tdatapad_pad_teguran[".listFields"][] = "teguran_no";
$tdatapad_pad_teguran[".listFields"][] = "invoice_id";
$tdatapad_pad_teguran[".listFields"][] = "keterangan";
$tdatapad_pad_teguran[".listFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".listFields"][] = "created";
$tdatapad_pad_teguran[".listFields"][] = "updated";
$tdatapad_pad_teguran[".listFields"][] = "create_uid";
$tdatapad_pad_teguran[".listFields"][] = "update_uid";

$tdatapad_pad_teguran[".viewFields"] = array();
$tdatapad_pad_teguran[".viewFields"][] = "id";
$tdatapad_pad_teguran[".viewFields"][] = "tahun";
$tdatapad_pad_teguran[".viewFields"][] = "tanggal";
$tdatapad_pad_teguran[".viewFields"][] = "teguran_no";
$tdatapad_pad_teguran[".viewFields"][] = "invoice_id";
$tdatapad_pad_teguran[".viewFields"][] = "keterangan";
$tdatapad_pad_teguran[".viewFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".viewFields"][] = "created";
$tdatapad_pad_teguran[".viewFields"][] = "updated";
$tdatapad_pad_teguran[".viewFields"][] = "create_uid";
$tdatapad_pad_teguran[".viewFields"][] = "update_uid";

$tdatapad_pad_teguran[".addFields"] = array();
$tdatapad_pad_teguran[".addFields"][] = "tahun";
$tdatapad_pad_teguran[".addFields"][] = "tanggal";
$tdatapad_pad_teguran[".addFields"][] = "teguran_no";
$tdatapad_pad_teguran[".addFields"][] = "invoice_id";
$tdatapad_pad_teguran[".addFields"][] = "keterangan";
$tdatapad_pad_teguran[".addFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".addFields"][] = "created";
$tdatapad_pad_teguran[".addFields"][] = "updated";
$tdatapad_pad_teguran[".addFields"][] = "create_uid";
$tdatapad_pad_teguran[".addFields"][] = "update_uid";

$tdatapad_pad_teguran[".inlineAddFields"] = array();
$tdatapad_pad_teguran[".inlineAddFields"][] = "tahun";
$tdatapad_pad_teguran[".inlineAddFields"][] = "tanggal";
$tdatapad_pad_teguran[".inlineAddFields"][] = "teguran_no";
$tdatapad_pad_teguran[".inlineAddFields"][] = "invoice_id";
$tdatapad_pad_teguran[".inlineAddFields"][] = "keterangan";
$tdatapad_pad_teguran[".inlineAddFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".inlineAddFields"][] = "created";
$tdatapad_pad_teguran[".inlineAddFields"][] = "updated";
$tdatapad_pad_teguran[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_teguran[".inlineAddFields"][] = "update_uid";

$tdatapad_pad_teguran[".editFields"] = array();
$tdatapad_pad_teguran[".editFields"][] = "tahun";
$tdatapad_pad_teguran[".editFields"][] = "tanggal";
$tdatapad_pad_teguran[".editFields"][] = "teguran_no";
$tdatapad_pad_teguran[".editFields"][] = "invoice_id";
$tdatapad_pad_teguran[".editFields"][] = "keterangan";
$tdatapad_pad_teguran[".editFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".editFields"][] = "created";
$tdatapad_pad_teguran[".editFields"][] = "updated";
$tdatapad_pad_teguran[".editFields"][] = "create_uid";
$tdatapad_pad_teguran[".editFields"][] = "update_uid";

$tdatapad_pad_teguran[".inlineEditFields"] = array();
$tdatapad_pad_teguran[".inlineEditFields"][] = "tahun";
$tdatapad_pad_teguran[".inlineEditFields"][] = "tanggal";
$tdatapad_pad_teguran[".inlineEditFields"][] = "teguran_no";
$tdatapad_pad_teguran[".inlineEditFields"][] = "invoice_id";
$tdatapad_pad_teguran[".inlineEditFields"][] = "keterangan";
$tdatapad_pad_teguran[".inlineEditFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".inlineEditFields"][] = "created";
$tdatapad_pad_teguran[".inlineEditFields"][] = "updated";
$tdatapad_pad_teguran[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_teguran[".inlineEditFields"][] = "update_uid";

$tdatapad_pad_teguran[".exportFields"] = array();
$tdatapad_pad_teguran[".exportFields"][] = "id";
$tdatapad_pad_teguran[".exportFields"][] = "tahun";
$tdatapad_pad_teguran[".exportFields"][] = "tanggal";
$tdatapad_pad_teguran[".exportFields"][] = "teguran_no";
$tdatapad_pad_teguran[".exportFields"][] = "invoice_id";
$tdatapad_pad_teguran[".exportFields"][] = "keterangan";
$tdatapad_pad_teguran[".exportFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".exportFields"][] = "created";
$tdatapad_pad_teguran[".exportFields"][] = "updated";
$tdatapad_pad_teguran[".exportFields"][] = "create_uid";
$tdatapad_pad_teguran[".exportFields"][] = "update_uid";

$tdatapad_pad_teguran[".printFields"] = array();
$tdatapad_pad_teguran[".printFields"][] = "id";
$tdatapad_pad_teguran[".printFields"][] = "tahun";
$tdatapad_pad_teguran[".printFields"][] = "tanggal";
$tdatapad_pad_teguran[".printFields"][] = "teguran_no";
$tdatapad_pad_teguran[".printFields"][] = "invoice_id";
$tdatapad_pad_teguran[".printFields"][] = "keterangan";
$tdatapad_pad_teguran[".printFields"][] = "cetak_ke";
$tdatapad_pad_teguran[".printFields"][] = "created";
$tdatapad_pad_teguran[".printFields"][] = "updated";
$tdatapad_pad_teguran[".printFields"][] = "create_uid";
$tdatapad_pad_teguran[".printFields"][] = "update_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_teguran";
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
	
		
		
	$tdatapad_pad_teguran["id"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "pad.pad_teguran";
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
	
		
		
	$tdatapad_pad_teguran["tahun"] = $fdata;
//	tanggal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "tanggal";
	$fdata["GoodName"] = "tanggal";
	$fdata["ownerTable"] = "pad.pad_teguran";
	$fdata["Label"] = "Tanggal"; 
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
	
		$fdata["strField"] = "tanggal"; 
		$fdata["FullName"] = "tanggal";
	
		
		
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
	
		
		
	$tdatapad_pad_teguran["tanggal"] = $fdata;
//	teguran_no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "teguran_no";
	$fdata["GoodName"] = "teguran_no";
	$fdata["ownerTable"] = "pad.pad_teguran";
	$fdata["Label"] = "Teguran No"; 
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
	
		$fdata["strField"] = "teguran_no"; 
		$fdata["FullName"] = "teguran_no";
	
		
		
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
	
		
		
	$tdatapad_pad_teguran["teguran_no"] = $fdata;
//	invoice_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "invoice_id";
	$fdata["GoodName"] = "invoice_id";
	$fdata["ownerTable"] = "pad.pad_teguran";
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
	
		
		
	$tdatapad_pad_teguran["invoice_id"] = $fdata;
//	keterangan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "keterangan";
	$fdata["GoodName"] = "keterangan";
	$fdata["ownerTable"] = "pad.pad_teguran";
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
	
		
		
	$tdatapad_pad_teguran["keterangan"] = $fdata;
//	cetak_ke
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "cetak_ke";
	$fdata["GoodName"] = "cetak_ke";
	$fdata["ownerTable"] = "pad.pad_teguran";
	$fdata["Label"] = "Cetak Ke"; 
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
	
		$fdata["strField"] = "cetak_ke"; 
		$fdata["FullName"] = "cetak_ke";
	
		
		
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
	
		
		
	$tdatapad_pad_teguran["cetak_ke"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_teguran";
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
	
		
		
	$tdatapad_pad_teguran["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_teguran";
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
	
		
		
	$tdatapad_pad_teguran["updated"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_teguran";
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
	
		
		
	$tdatapad_pad_teguran["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_teguran";
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
	
		
		
	$tdatapad_pad_teguran["update_uid"] = $fdata;

	
$tables_data["pad.pad_teguran"]=&$tdatapad_pad_teguran;
$field_labels["pad_pad_teguran"] = &$fieldLabelspad_pad_teguran;
$fieldToolTips["pad.pad_teguran"] = &$fieldToolTipspad_pad_teguran;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_teguran"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_teguran"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_teguran()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tahun,   tanggal,   teguran_no,   invoice_id,   keterangan,   cetak_ke,   created,   updated,   create_uid,   update_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_teguran";
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
	"m_strTable" => "pad.pad_teguran"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "pad.pad_teguran"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "tanggal",
	"m_strTable" => "pad.pad_teguran"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "teguran_no",
	"m_strTable" => "pad.pad_teguran"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "invoice_id",
	"m_strTable" => "pad.pad_teguran"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan",
	"m_strTable" => "pad.pad_teguran"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "cetak_ke",
	"m_strTable" => "pad.pad_teguran"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_teguran"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_teguran"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_teguran"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_teguran"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "pad.pad_teguran";
$proto28["m_columns"] = array();
$proto28["m_columns"][] = "id";
$proto28["m_columns"][] = "tahun";
$proto28["m_columns"][] = "tanggal";
$proto28["m_columns"][] = "teguran_no";
$proto28["m_columns"][] = "invoice_id";
$proto28["m_columns"][] = "keterangan";
$proto28["m_columns"][] = "cetak_ke";
$proto28["m_columns"][] = "created";
$proto28["m_columns"][] = "updated";
$proto28["m_columns"][] = "create_uid";
$proto28["m_columns"][] = "update_uid";
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
$queryData_pad_pad_teguran = createSqlQuery_pad_pad_teguran();
											$tdatapad_pad_teguran[".sqlquery"] = $queryData_pad_pad_teguran;
	
if(isset($tdatapad_pad_teguran["field2"])){
	$tdatapad_pad_teguran["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_teguran["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_teguran["field2"]["LookupType"] = 4;
	$tdatapad_pad_teguran["field2"]["LinkField"] = "email";
	$tdatapad_pad_teguran["field2"]["DisplayField"] = "name";
	$tdatapad_pad_teguran[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_teguran"] = new eventsBase;
$tdatapad_pad_teguran[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_teguran");

?>