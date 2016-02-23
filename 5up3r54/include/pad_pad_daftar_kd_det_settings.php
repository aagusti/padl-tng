<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_daftar_kd_det = array();
	$tdatapad_pad_daftar_kd_det[".NumberOfChars"] = 80; 
	$tdatapad_pad_daftar_kd_det[".ShortName"] = "pad_pad_daftar_kd_det";
	$tdatapad_pad_daftar_kd_det[".OwnerID"] = "";
	$tdatapad_pad_daftar_kd_det[".OriginalTable"] = "pad.pad_daftar_kd_det";

//	field labels
$fieldLabelspad_pad_daftar_kd_det = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_daftar_kd_det["English"] = array();
	$fieldToolTipspad_pad_daftar_kd_det["English"] = array();
	$fieldLabelspad_pad_daftar_kd_det["English"]["id"] = "Id";
	$fieldToolTipspad_pad_daftar_kd_det["English"]["id"] = "";
	$fieldLabelspad_pad_daftar_kd_det["English"]["daftar_id"] = "Daftar Id";
	$fieldToolTipspad_pad_daftar_kd_det["English"]["daftar_id"] = "";
	$fieldLabelspad_pad_daftar_kd_det["English"]["nourut"] = "Nourut";
	$fieldToolTipspad_pad_daftar_kd_det["English"]["nourut"] = "";
	$fieldLabelspad_pad_daftar_kd_det["English"]["notes"] = "Notes";
	$fieldToolTipspad_pad_daftar_kd_det["English"]["notes"] = "";
	$fieldLabelspad_pad_daftar_kd_det["English"]["tarif"] = "Tarif";
	$fieldToolTipspad_pad_daftar_kd_det["English"]["tarif"] = "";
	$fieldLabelspad_pad_daftar_kd_det["English"]["kamar"] = "Kamar";
	$fieldToolTipspad_pad_daftar_kd_det["English"]["kamar"] = "";
	$fieldLabelspad_pad_daftar_kd_det["English"]["volume"] = "Volume";
	$fieldToolTipspad_pad_daftar_kd_det["English"]["volume"] = "";
	if (count($fieldToolTipspad_pad_daftar_kd_det["English"]))
		$tdatapad_pad_daftar_kd_det[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_daftar_kd_det[".NCSearch"] = true;



$tdatapad_pad_daftar_kd_det[".shortTableName"] = "pad_pad_daftar_kd_det";
$tdatapad_pad_daftar_kd_det[".nSecOptions"] = 0;
$tdatapad_pad_daftar_kd_det[".recsPerRowList"] = 1;
$tdatapad_pad_daftar_kd_det[".mainTableOwnerID"] = "";
$tdatapad_pad_daftar_kd_det[".moveNext"] = 1;
$tdatapad_pad_daftar_kd_det[".nType"] = 0;

$tdatapad_pad_daftar_kd_det[".strOriginalTableName"] = "pad.pad_daftar_kd_det";




$tdatapad_pad_daftar_kd_det[".showAddInPopup"] = false;

$tdatapad_pad_daftar_kd_det[".showEditInPopup"] = false;

$tdatapad_pad_daftar_kd_det[".showViewInPopup"] = false;

$tdatapad_pad_daftar_kd_det[".fieldsForRegister"] = array();

$tdatapad_pad_daftar_kd_det[".listAjax"] = false;

	$tdatapad_pad_daftar_kd_det[".audit"] = false;

	$tdatapad_pad_daftar_kd_det[".locking"] = false;

$tdatapad_pad_daftar_kd_det[".listIcons"] = true;
$tdatapad_pad_daftar_kd_det[".edit"] = true;
$tdatapad_pad_daftar_kd_det[".inlineEdit"] = true;
$tdatapad_pad_daftar_kd_det[".inlineAdd"] = true;
$tdatapad_pad_daftar_kd_det[".view"] = true;

$tdatapad_pad_daftar_kd_det[".exportTo"] = true;

$tdatapad_pad_daftar_kd_det[".printFriendly"] = true;

$tdatapad_pad_daftar_kd_det[".delete"] = true;

$tdatapad_pad_daftar_kd_det[".showSimpleSearchOptions"] = false;

$tdatapad_pad_daftar_kd_det[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_daftar_kd_det[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_daftar_kd_det[".isUseAjaxSuggest"] = true;

$tdatapad_pad_daftar_kd_det[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_daftar_kd_det[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_daftar_kd_det[".isUseTimeForSearch"] = false;




$tdatapad_pad_daftar_kd_det[".allSearchFields"] = array();

$tdatapad_pad_daftar_kd_det[".allSearchFields"][] = "id";
$tdatapad_pad_daftar_kd_det[".allSearchFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".allSearchFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".allSearchFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".allSearchFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".allSearchFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".allSearchFields"][] = "volume";

$tdatapad_pad_daftar_kd_det[".googleLikeFields"][] = "id";
$tdatapad_pad_daftar_kd_det[".googleLikeFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".googleLikeFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".googleLikeFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".googleLikeFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".googleLikeFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".googleLikeFields"][] = "volume";


$tdatapad_pad_daftar_kd_det[".advSearchFields"][] = "id";
$tdatapad_pad_daftar_kd_det[".advSearchFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".advSearchFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".advSearchFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".advSearchFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".advSearchFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".advSearchFields"][] = "volume";

$tdatapad_pad_daftar_kd_det[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_daftar_kd_det[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_daftar_kd_det[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_daftar_kd_det[".orderindexes"] = array();

$tdatapad_pad_daftar_kd_det[".sqlHead"] = "SELECT id,   daftar_id,   nourut,   notes,   tarif,   kamar,   volume";
$tdatapad_pad_daftar_kd_det[".sqlFrom"] = "FROM \"pad\".pad_daftar_kd_det";
$tdatapad_pad_daftar_kd_det[".sqlWhereExpr"] = "";
$tdatapad_pad_daftar_kd_det[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_daftar_kd_det[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_daftar_kd_det[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_daftar_kd_det = array();
$tableKeyspad_pad_daftar_kd_det[] = "id";
$tdatapad_pad_daftar_kd_det[".Keys"] = $tableKeyspad_pad_daftar_kd_det;

$tdatapad_pad_daftar_kd_det[".listFields"] = array();
$tdatapad_pad_daftar_kd_det[".listFields"][] = "id";
$tdatapad_pad_daftar_kd_det[".listFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".listFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".listFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".listFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".listFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".listFields"][] = "volume";

$tdatapad_pad_daftar_kd_det[".viewFields"] = array();
$tdatapad_pad_daftar_kd_det[".viewFields"][] = "id";
$tdatapad_pad_daftar_kd_det[".viewFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".viewFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".viewFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".viewFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".viewFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".viewFields"][] = "volume";

$tdatapad_pad_daftar_kd_det[".addFields"] = array();
$tdatapad_pad_daftar_kd_det[".addFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".addFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".addFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".addFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".addFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".addFields"][] = "volume";

$tdatapad_pad_daftar_kd_det[".inlineAddFields"] = array();
$tdatapad_pad_daftar_kd_det[".inlineAddFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".inlineAddFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".inlineAddFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".inlineAddFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".inlineAddFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".inlineAddFields"][] = "volume";

$tdatapad_pad_daftar_kd_det[".editFields"] = array();
$tdatapad_pad_daftar_kd_det[".editFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".editFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".editFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".editFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".editFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".editFields"][] = "volume";

$tdatapad_pad_daftar_kd_det[".inlineEditFields"] = array();
$tdatapad_pad_daftar_kd_det[".inlineEditFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".inlineEditFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".inlineEditFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".inlineEditFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".inlineEditFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".inlineEditFields"][] = "volume";

$tdatapad_pad_daftar_kd_det[".exportFields"] = array();
$tdatapad_pad_daftar_kd_det[".exportFields"][] = "id";
$tdatapad_pad_daftar_kd_det[".exportFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".exportFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".exportFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".exportFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".exportFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".exportFields"][] = "volume";

$tdatapad_pad_daftar_kd_det[".printFields"] = array();
$tdatapad_pad_daftar_kd_det[".printFields"][] = "id";
$tdatapad_pad_daftar_kd_det[".printFields"][] = "daftar_id";
$tdatapad_pad_daftar_kd_det[".printFields"][] = "nourut";
$tdatapad_pad_daftar_kd_det[".printFields"][] = "notes";
$tdatapad_pad_daftar_kd_det[".printFields"][] = "tarif";
$tdatapad_pad_daftar_kd_det[".printFields"][] = "kamar";
$tdatapad_pad_daftar_kd_det[".printFields"][] = "volume";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_daftar_kd_det";
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
	
		
		
	$tdatapad_pad_daftar_kd_det["id"] = $fdata;
//	daftar_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "daftar_id";
	$fdata["GoodName"] = "daftar_id";
	$fdata["ownerTable"] = "pad.pad_daftar_kd_det";
	$fdata["Label"] = "Daftar Id"; 
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
	
		
		
	$tdatapad_pad_daftar_kd_det["daftar_id"] = $fdata;
//	nourut
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nourut";
	$fdata["GoodName"] = "nourut";
	$fdata["ownerTable"] = "pad.pad_daftar_kd_det";
	$fdata["Label"] = "Nourut"; 
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
	
		$fdata["strField"] = "nourut"; 
		$fdata["FullName"] = "nourut";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar_kd_det["nourut"] = $fdata;
//	notes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "notes";
	$fdata["GoodName"] = "notes";
	$fdata["ownerTable"] = "pad.pad_daftar_kd_det";
	$fdata["Label"] = "Notes"; 
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
	
		$fdata["strField"] = "notes"; 
		$fdata["FullName"] = "notes";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar_kd_det["notes"] = $fdata;
//	tarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "tarif";
	$fdata["GoodName"] = "tarif";
	$fdata["ownerTable"] = "pad.pad_daftar_kd_det";
	$fdata["Label"] = "Tarif"; 
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
	
		$fdata["strField"] = "tarif"; 
		$fdata["FullName"] = "tarif";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar_kd_det["tarif"] = $fdata;
//	kamar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "kamar";
	$fdata["GoodName"] = "kamar";
	$fdata["ownerTable"] = "pad.pad_daftar_kd_det";
	$fdata["Label"] = "Kamar"; 
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
	
		$fdata["strField"] = "kamar"; 
		$fdata["FullName"] = "kamar";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar_kd_det["kamar"] = $fdata;
//	volume
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "volume";
	$fdata["GoodName"] = "volume";
	$fdata["ownerTable"] = "pad.pad_daftar_kd_det";
	$fdata["Label"] = "Volume"; 
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
	
		$fdata["strField"] = "volume"; 
		$fdata["FullName"] = "volume";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar_kd_det["volume"] = $fdata;

	
$tables_data["pad.pad_daftar_kd_det"]=&$tdatapad_pad_daftar_kd_det;
$field_labels["pad_pad_daftar_kd_det"] = &$fieldLabelspad_pad_daftar_kd_det;
$fieldToolTips["pad.pad_daftar_kd_det"] = &$fieldToolTipspad_pad_daftar_kd_det;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_daftar_kd_det"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_daftar_kd_det"] = array();

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
	$masterTablesData["pad.pad_daftar_kd_det"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_daftar_kd_det"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_daftar_kd_det"][$mIndex]["detailKeys"][]="daftar_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_daftar_kd_det()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   daftar_id,   nourut,   notes,   tarif,   kamar,   volume";
$proto0["m_strFrom"] = "FROM \"pad\".pad_daftar_kd_det";
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
	"m_strTable" => "pad.pad_daftar_kd_det"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "daftar_id",
	"m_strTable" => "pad.pad_daftar_kd_det"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nourut",
	"m_strTable" => "pad.pad_daftar_kd_det"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "notes",
	"m_strTable" => "pad.pad_daftar_kd_det"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "tarif",
	"m_strTable" => "pad.pad_daftar_kd_det"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "kamar",
	"m_strTable" => "pad.pad_daftar_kd_det"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "volume",
	"m_strTable" => "pad.pad_daftar_kd_det"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "pad.pad_daftar_kd_det";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "id";
$proto20["m_columns"][] = "daftar_id";
$proto20["m_columns"][] = "nourut";
$proto20["m_columns"][] = "notes";
$proto20["m_columns"][] = "tarif";
$proto20["m_columns"][] = "kamar";
$proto20["m_columns"][] = "volume";
$obj = new SQLTable($proto20);

$proto19["m_table"] = $obj;
$proto19["m_alias"] = "";
$proto21=array();
$proto21["m_sql"] = "";
$proto21["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto21["m_column"]=$obj;
$proto21["m_contained"] = array();
$proto21["m_strCase"] = "";
$proto21["m_havingmode"] = "0";
$proto21["m_inBrackets"] = "0";
$proto21["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto21);

$proto19["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto19);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_daftar_kd_det = createSqlQuery_pad_pad_daftar_kd_det();
							$tdatapad_pad_daftar_kd_det[".sqlquery"] = $queryData_pad_pad_daftar_kd_det;
	
if(isset($tdatapad_pad_daftar_kd_det["field2"])){
	$tdatapad_pad_daftar_kd_det["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_daftar_kd_det["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_daftar_kd_det["field2"]["LookupType"] = 4;
	$tdatapad_pad_daftar_kd_det["field2"]["LinkField"] = "email";
	$tdatapad_pad_daftar_kd_det["field2"]["DisplayField"] = "name";
	$tdatapad_pad_daftar_kd_det[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_daftar_kd_det"] = new eventsBase;
$tdatapad_pad_daftar_kd_det[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_daftar_kd_det");

?>