<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_stpd = array();
	$tdatapad_pad_stpd[".NumberOfChars"] = 80; 
	$tdatapad_pad_stpd[".ShortName"] = "pad_pad_stpd";
	$tdatapad_pad_stpd[".OwnerID"] = "";
	$tdatapad_pad_stpd[".OriginalTable"] = "pad.pad_stpd";

//	field labels
$fieldLabelspad_pad_stpd = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_stpd["English"] = array();
	$fieldToolTipspad_pad_stpd["English"] = array();
	$fieldLabelspad_pad_stpd["English"]["id"] = "Id";
	$fieldToolTipspad_pad_stpd["English"]["id"] = "";
	$fieldLabelspad_pad_stpd["English"]["tahun"] = "Tahun";
	$fieldToolTipspad_pad_stpd["English"]["tahun"] = "";
	$fieldLabelspad_pad_stpd["English"]["stpdno"] = "Stpdno";
	$fieldToolTipspad_pad_stpd["English"]["stpdno"] = "";
	$fieldLabelspad_pad_stpd["English"]["stpdtgl"] = "Stpdtgl";
	$fieldToolTipspad_pad_stpd["English"]["stpdtgl"] = "";
	$fieldLabelspad_pad_stpd["English"]["spt_id"] = "Spt Id";
	$fieldToolTipspad_pad_stpd["English"]["spt_id"] = "";
	$fieldLabelspad_pad_stpd["English"]["jatuhtempotgl"] = "Jatuhtempotgl";
	$fieldToolTipspad_pad_stpd["English"]["jatuhtempotgl"] = "";
	$fieldLabelspad_pad_stpd["English"]["printed"] = "Printed";
	$fieldToolTipspad_pad_stpd["English"]["printed"] = "";
	$fieldLabelspad_pad_stpd["English"]["stpdcount"] = "Stpdcount";
	$fieldToolTipspad_pad_stpd["English"]["stpdcount"] = "";
	$fieldLabelspad_pad_stpd["English"]["bunga"] = "Bunga";
	$fieldToolTipspad_pad_stpd["English"]["bunga"] = "";
	$fieldLabelspad_pad_stpd["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_stpd["English"]["enabled"] = "";
	$fieldLabelspad_pad_stpd["English"]["created"] = "Created";
	$fieldToolTipspad_pad_stpd["English"]["created"] = "";
	$fieldLabelspad_pad_stpd["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_stpd["English"]["create_uid"] = "";
	$fieldLabelspad_pad_stpd["English"]["write_date"] = "Write Date";
	$fieldToolTipspad_pad_stpd["English"]["write_date"] = "";
	$fieldLabelspad_pad_stpd["English"]["write_uid"] = "Write Uid";
	$fieldToolTipspad_pad_stpd["English"]["write_uid"] = "";
	$fieldLabelspad_pad_stpd["English"]["petugas_id"] = "Petugas Id";
	$fieldToolTipspad_pad_stpd["English"]["petugas_id"] = "";
	$fieldLabelspad_pad_stpd["English"]["pejabat_id"] = "Pejabat Id";
	$fieldToolTipspad_pad_stpd["English"]["pejabat_id"] = "";
	if (count($fieldToolTipspad_pad_stpd["English"]))
		$tdatapad_pad_stpd[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_stpd[".NCSearch"] = true;



$tdatapad_pad_stpd[".shortTableName"] = "pad_pad_stpd";
$tdatapad_pad_stpd[".nSecOptions"] = 0;
$tdatapad_pad_stpd[".recsPerRowList"] = 1;
$tdatapad_pad_stpd[".mainTableOwnerID"] = "";
$tdatapad_pad_stpd[".moveNext"] = 1;
$tdatapad_pad_stpd[".nType"] = 0;

$tdatapad_pad_stpd[".strOriginalTableName"] = "pad.pad_stpd";




$tdatapad_pad_stpd[".showAddInPopup"] = false;

$tdatapad_pad_stpd[".showEditInPopup"] = false;

$tdatapad_pad_stpd[".showViewInPopup"] = false;

$tdatapad_pad_stpd[".fieldsForRegister"] = array();

$tdatapad_pad_stpd[".listAjax"] = false;

	$tdatapad_pad_stpd[".audit"] = false;

	$tdatapad_pad_stpd[".locking"] = false;

$tdatapad_pad_stpd[".listIcons"] = true;
$tdatapad_pad_stpd[".edit"] = true;
$tdatapad_pad_stpd[".inlineEdit"] = true;
$tdatapad_pad_stpd[".inlineAdd"] = true;
$tdatapad_pad_stpd[".view"] = true;

$tdatapad_pad_stpd[".exportTo"] = true;

$tdatapad_pad_stpd[".printFriendly"] = true;

$tdatapad_pad_stpd[".delete"] = true;

$tdatapad_pad_stpd[".showSimpleSearchOptions"] = false;

$tdatapad_pad_stpd[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_stpd[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_stpd[".isUseAjaxSuggest"] = true;

$tdatapad_pad_stpd[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_stpd[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_stpd[".isUseTimeForSearch"] = false;




$tdatapad_pad_stpd[".allSearchFields"] = array();

$tdatapad_pad_stpd[".allSearchFields"][] = "id";
$tdatapad_pad_stpd[".allSearchFields"][] = "tahun";
$tdatapad_pad_stpd[".allSearchFields"][] = "stpdno";
$tdatapad_pad_stpd[".allSearchFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".allSearchFields"][] = "spt_id";
$tdatapad_pad_stpd[".allSearchFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".allSearchFields"][] = "printed";
$tdatapad_pad_stpd[".allSearchFields"][] = "stpdcount";
$tdatapad_pad_stpd[".allSearchFields"][] = "bunga";
$tdatapad_pad_stpd[".allSearchFields"][] = "enabled";
$tdatapad_pad_stpd[".allSearchFields"][] = "created";
$tdatapad_pad_stpd[".allSearchFields"][] = "create_uid";
$tdatapad_pad_stpd[".allSearchFields"][] = "write_date";
$tdatapad_pad_stpd[".allSearchFields"][] = "write_uid";
$tdatapad_pad_stpd[".allSearchFields"][] = "petugas_id";
$tdatapad_pad_stpd[".allSearchFields"][] = "pejabat_id";

$tdatapad_pad_stpd[".googleLikeFields"][] = "id";
$tdatapad_pad_stpd[".googleLikeFields"][] = "tahun";
$tdatapad_pad_stpd[".googleLikeFields"][] = "stpdno";
$tdatapad_pad_stpd[".googleLikeFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".googleLikeFields"][] = "spt_id";
$tdatapad_pad_stpd[".googleLikeFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".googleLikeFields"][] = "printed";
$tdatapad_pad_stpd[".googleLikeFields"][] = "stpdcount";
$tdatapad_pad_stpd[".googleLikeFields"][] = "bunga";
$tdatapad_pad_stpd[".googleLikeFields"][] = "enabled";
$tdatapad_pad_stpd[".googleLikeFields"][] = "created";
$tdatapad_pad_stpd[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_stpd[".googleLikeFields"][] = "write_date";
$tdatapad_pad_stpd[".googleLikeFields"][] = "write_uid";
$tdatapad_pad_stpd[".googleLikeFields"][] = "petugas_id";
$tdatapad_pad_stpd[".googleLikeFields"][] = "pejabat_id";


$tdatapad_pad_stpd[".advSearchFields"][] = "id";
$tdatapad_pad_stpd[".advSearchFields"][] = "tahun";
$tdatapad_pad_stpd[".advSearchFields"][] = "stpdno";
$tdatapad_pad_stpd[".advSearchFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".advSearchFields"][] = "spt_id";
$tdatapad_pad_stpd[".advSearchFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".advSearchFields"][] = "printed";
$tdatapad_pad_stpd[".advSearchFields"][] = "stpdcount";
$tdatapad_pad_stpd[".advSearchFields"][] = "bunga";
$tdatapad_pad_stpd[".advSearchFields"][] = "enabled";
$tdatapad_pad_stpd[".advSearchFields"][] = "created";
$tdatapad_pad_stpd[".advSearchFields"][] = "create_uid";
$tdatapad_pad_stpd[".advSearchFields"][] = "write_date";
$tdatapad_pad_stpd[".advSearchFields"][] = "write_uid";
$tdatapad_pad_stpd[".advSearchFields"][] = "petugas_id";
$tdatapad_pad_stpd[".advSearchFields"][] = "pejabat_id";

$tdatapad_pad_stpd[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_stpd[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_stpd[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_stpd[".orderindexes"] = array();

$tdatapad_pad_stpd[".sqlHead"] = "SELECT id,   tahun,   stpdno,   stpdtgl,   spt_id,   jatuhtempotgl,   printed,   stpdcount,   bunga,   enabled,   created,   create_uid,   write_date,   write_uid,   petugas_id,   pejabat_id";
$tdatapad_pad_stpd[".sqlFrom"] = "FROM \"pad\".pad_stpd";
$tdatapad_pad_stpd[".sqlWhereExpr"] = "";
$tdatapad_pad_stpd[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_stpd[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_stpd[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_stpd = array();
$tableKeyspad_pad_stpd[] = "id";
$tdatapad_pad_stpd[".Keys"] = $tableKeyspad_pad_stpd;

$tdatapad_pad_stpd[".listFields"] = array();
$tdatapad_pad_stpd[".listFields"][] = "id";
$tdatapad_pad_stpd[".listFields"][] = "tahun";
$tdatapad_pad_stpd[".listFields"][] = "stpdno";
$tdatapad_pad_stpd[".listFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".listFields"][] = "spt_id";
$tdatapad_pad_stpd[".listFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".listFields"][] = "printed";
$tdatapad_pad_stpd[".listFields"][] = "stpdcount";
$tdatapad_pad_stpd[".listFields"][] = "bunga";
$tdatapad_pad_stpd[".listFields"][] = "enabled";
$tdatapad_pad_stpd[".listFields"][] = "created";
$tdatapad_pad_stpd[".listFields"][] = "create_uid";
$tdatapad_pad_stpd[".listFields"][] = "write_date";
$tdatapad_pad_stpd[".listFields"][] = "write_uid";
$tdatapad_pad_stpd[".listFields"][] = "petugas_id";
$tdatapad_pad_stpd[".listFields"][] = "pejabat_id";

$tdatapad_pad_stpd[".viewFields"] = array();
$tdatapad_pad_stpd[".viewFields"][] = "id";
$tdatapad_pad_stpd[".viewFields"][] = "tahun";
$tdatapad_pad_stpd[".viewFields"][] = "stpdno";
$tdatapad_pad_stpd[".viewFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".viewFields"][] = "spt_id";
$tdatapad_pad_stpd[".viewFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".viewFields"][] = "printed";
$tdatapad_pad_stpd[".viewFields"][] = "stpdcount";
$tdatapad_pad_stpd[".viewFields"][] = "bunga";
$tdatapad_pad_stpd[".viewFields"][] = "enabled";
$tdatapad_pad_stpd[".viewFields"][] = "created";
$tdatapad_pad_stpd[".viewFields"][] = "create_uid";
$tdatapad_pad_stpd[".viewFields"][] = "write_date";
$tdatapad_pad_stpd[".viewFields"][] = "write_uid";
$tdatapad_pad_stpd[".viewFields"][] = "petugas_id";
$tdatapad_pad_stpd[".viewFields"][] = "pejabat_id";

$tdatapad_pad_stpd[".addFields"] = array();
$tdatapad_pad_stpd[".addFields"][] = "tahun";
$tdatapad_pad_stpd[".addFields"][] = "stpdno";
$tdatapad_pad_stpd[".addFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".addFields"][] = "spt_id";
$tdatapad_pad_stpd[".addFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".addFields"][] = "printed";
$tdatapad_pad_stpd[".addFields"][] = "stpdcount";
$tdatapad_pad_stpd[".addFields"][] = "bunga";
$tdatapad_pad_stpd[".addFields"][] = "enabled";
$tdatapad_pad_stpd[".addFields"][] = "created";
$tdatapad_pad_stpd[".addFields"][] = "create_uid";
$tdatapad_pad_stpd[".addFields"][] = "write_date";
$tdatapad_pad_stpd[".addFields"][] = "write_uid";
$tdatapad_pad_stpd[".addFields"][] = "petugas_id";
$tdatapad_pad_stpd[".addFields"][] = "pejabat_id";

$tdatapad_pad_stpd[".inlineAddFields"] = array();
$tdatapad_pad_stpd[".inlineAddFields"][] = "tahun";
$tdatapad_pad_stpd[".inlineAddFields"][] = "stpdno";
$tdatapad_pad_stpd[".inlineAddFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".inlineAddFields"][] = "spt_id";
$tdatapad_pad_stpd[".inlineAddFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".inlineAddFields"][] = "printed";
$tdatapad_pad_stpd[".inlineAddFields"][] = "stpdcount";
$tdatapad_pad_stpd[".inlineAddFields"][] = "bunga";
$tdatapad_pad_stpd[".inlineAddFields"][] = "enabled";
$tdatapad_pad_stpd[".inlineAddFields"][] = "created";
$tdatapad_pad_stpd[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_stpd[".inlineAddFields"][] = "write_date";
$tdatapad_pad_stpd[".inlineAddFields"][] = "write_uid";
$tdatapad_pad_stpd[".inlineAddFields"][] = "petugas_id";
$tdatapad_pad_stpd[".inlineAddFields"][] = "pejabat_id";

$tdatapad_pad_stpd[".editFields"] = array();
$tdatapad_pad_stpd[".editFields"][] = "tahun";
$tdatapad_pad_stpd[".editFields"][] = "stpdno";
$tdatapad_pad_stpd[".editFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".editFields"][] = "spt_id";
$tdatapad_pad_stpd[".editFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".editFields"][] = "printed";
$tdatapad_pad_stpd[".editFields"][] = "stpdcount";
$tdatapad_pad_stpd[".editFields"][] = "bunga";
$tdatapad_pad_stpd[".editFields"][] = "enabled";
$tdatapad_pad_stpd[".editFields"][] = "created";
$tdatapad_pad_stpd[".editFields"][] = "create_uid";
$tdatapad_pad_stpd[".editFields"][] = "write_date";
$tdatapad_pad_stpd[".editFields"][] = "write_uid";
$tdatapad_pad_stpd[".editFields"][] = "petugas_id";
$tdatapad_pad_stpd[".editFields"][] = "pejabat_id";

$tdatapad_pad_stpd[".inlineEditFields"] = array();
$tdatapad_pad_stpd[".inlineEditFields"][] = "tahun";
$tdatapad_pad_stpd[".inlineEditFields"][] = "stpdno";
$tdatapad_pad_stpd[".inlineEditFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".inlineEditFields"][] = "spt_id";
$tdatapad_pad_stpd[".inlineEditFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".inlineEditFields"][] = "printed";
$tdatapad_pad_stpd[".inlineEditFields"][] = "stpdcount";
$tdatapad_pad_stpd[".inlineEditFields"][] = "bunga";
$tdatapad_pad_stpd[".inlineEditFields"][] = "enabled";
$tdatapad_pad_stpd[".inlineEditFields"][] = "created";
$tdatapad_pad_stpd[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_stpd[".inlineEditFields"][] = "write_date";
$tdatapad_pad_stpd[".inlineEditFields"][] = "write_uid";
$tdatapad_pad_stpd[".inlineEditFields"][] = "petugas_id";
$tdatapad_pad_stpd[".inlineEditFields"][] = "pejabat_id";

$tdatapad_pad_stpd[".exportFields"] = array();
$tdatapad_pad_stpd[".exportFields"][] = "id";
$tdatapad_pad_stpd[".exportFields"][] = "tahun";
$tdatapad_pad_stpd[".exportFields"][] = "stpdno";
$tdatapad_pad_stpd[".exportFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".exportFields"][] = "spt_id";
$tdatapad_pad_stpd[".exportFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".exportFields"][] = "printed";
$tdatapad_pad_stpd[".exportFields"][] = "stpdcount";
$tdatapad_pad_stpd[".exportFields"][] = "bunga";
$tdatapad_pad_stpd[".exportFields"][] = "enabled";
$tdatapad_pad_stpd[".exportFields"][] = "created";
$tdatapad_pad_stpd[".exportFields"][] = "create_uid";
$tdatapad_pad_stpd[".exportFields"][] = "write_date";
$tdatapad_pad_stpd[".exportFields"][] = "write_uid";
$tdatapad_pad_stpd[".exportFields"][] = "petugas_id";
$tdatapad_pad_stpd[".exportFields"][] = "pejabat_id";

$tdatapad_pad_stpd[".printFields"] = array();
$tdatapad_pad_stpd[".printFields"][] = "id";
$tdatapad_pad_stpd[".printFields"][] = "tahun";
$tdatapad_pad_stpd[".printFields"][] = "stpdno";
$tdatapad_pad_stpd[".printFields"][] = "stpdtgl";
$tdatapad_pad_stpd[".printFields"][] = "spt_id";
$tdatapad_pad_stpd[".printFields"][] = "jatuhtempotgl";
$tdatapad_pad_stpd[".printFields"][] = "printed";
$tdatapad_pad_stpd[".printFields"][] = "stpdcount";
$tdatapad_pad_stpd[".printFields"][] = "bunga";
$tdatapad_pad_stpd[".printFields"][] = "enabled";
$tdatapad_pad_stpd[".printFields"][] = "created";
$tdatapad_pad_stpd[".printFields"][] = "create_uid";
$tdatapad_pad_stpd[".printFields"][] = "write_date";
$tdatapad_pad_stpd[".printFields"][] = "write_uid";
$tdatapad_pad_stpd[".printFields"][] = "petugas_id";
$tdatapad_pad_stpd[".printFields"][] = "pejabat_id";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_stpd";
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
	
		
		
	$tdatapad_pad_stpd["id"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Tahun"; 
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
	
		
		
	$tdatapad_pad_stpd["tahun"] = $fdata;
//	stpdno
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "stpdno";
	$fdata["GoodName"] = "stpdno";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Stpdno"; 
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
	
		$fdata["strField"] = "stpdno"; 
		$fdata["FullName"] = "stpdno";
	
		
		
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
	
		
		
	$tdatapad_pad_stpd["stpdno"] = $fdata;
//	stpdtgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "stpdtgl";
	$fdata["GoodName"] = "stpdtgl";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Stpdtgl"; 
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
	
		$fdata["strField"] = "stpdtgl"; 
		$fdata["FullName"] = "stpdtgl";
	
		
		
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

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_stpd["stpdtgl"] = $fdata;
//	spt_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "spt_id";
	$fdata["GoodName"] = "spt_id";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Spt Id"; 
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
	
		$fdata["strField"] = "spt_id"; 
		$fdata["FullName"] = "spt_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_stpd["spt_id"] = $fdata;
//	jatuhtempotgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "jatuhtempotgl";
	$fdata["GoodName"] = "jatuhtempotgl";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Jatuhtempotgl"; 
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
	
		$fdata["strField"] = "jatuhtempotgl"; 
		$fdata["FullName"] = "jatuhtempotgl";
	
		
		
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
	
		
		
	$tdatapad_pad_stpd["jatuhtempotgl"] = $fdata;
//	printed
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "printed";
	$fdata["GoodName"] = "printed";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Printed"; 
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
	
		$fdata["strField"] = "printed"; 
		$fdata["FullName"] = "printed";
	
		
		
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
	
		
		
	$tdatapad_pad_stpd["printed"] = $fdata;
//	stpdcount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "stpdcount";
	$fdata["GoodName"] = "stpdcount";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Stpdcount"; 
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
	
		$fdata["strField"] = "stpdcount"; 
		$fdata["FullName"] = "stpdcount";
	
		
		
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
	
		
		
	$tdatapad_pad_stpd["stpdcount"] = $fdata;
//	bunga
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "bunga";
	$fdata["GoodName"] = "bunga";
	$fdata["ownerTable"] = "pad.pad_stpd";
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
	
		
		
	$tdatapad_pad_stpd["bunga"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_stpd";
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
	
		
		
	$tdatapad_pad_stpd["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_stpd";
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
	
		
		
	$tdatapad_pad_stpd["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_stpd";
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
	
		
		
	$tdatapad_pad_stpd["create_uid"] = $fdata;
//	write_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "write_date";
	$fdata["GoodName"] = "write_date";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Write Date"; 
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
	
		$fdata["strField"] = "write_date"; 
		$fdata["FullName"] = "write_date";
	
		
		
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
	
		
		
	$tdatapad_pad_stpd["write_date"] = $fdata;
//	write_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "write_uid";
	$fdata["GoodName"] = "write_uid";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Write Uid"; 
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
	
		$fdata["strField"] = "write_uid"; 
		$fdata["FullName"] = "write_uid";
	
		
		
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
	
		
		
	$tdatapad_pad_stpd["write_uid"] = $fdata;
//	petugas_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "petugas_id";
	$fdata["GoodName"] = "petugas_id";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Petugas Id"; 
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
	
		$fdata["strField"] = "petugas_id"; 
		$fdata["FullName"] = "petugas_id";
	
		
		
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
	
		
		
	$tdatapad_pad_stpd["petugas_id"] = $fdata;
//	pejabat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "pejabat_id";
	$fdata["GoodName"] = "pejabat_id";
	$fdata["ownerTable"] = "pad.pad_stpd";
	$fdata["Label"] = "Pejabat Id"; 
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
	
		$fdata["strField"] = "pejabat_id"; 
		$fdata["FullName"] = "pejabat_id";
	
		
		
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
	
		
		
	$tdatapad_pad_stpd["pejabat_id"] = $fdata;

	
$tables_data["pad.pad_stpd"]=&$tdatapad_pad_stpd;
$field_labels["pad_pad_stpd"] = &$fieldLabelspad_pad_stpd;
$fieldToolTips["pad.pad_stpd"] = &$fieldToolTipspad_pad_stpd;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_stpd"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_stpd"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_spt";
	$masterParams["mDataSourceTable"]="pad.pad_spt";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_spt";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_stpd"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_stpd"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_stpd"][$mIndex]["detailKeys"][]="spt_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_stpd()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tahun,   stpdno,   stpdtgl,   spt_id,   jatuhtempotgl,   printed,   stpdcount,   bunga,   enabled,   created,   create_uid,   write_date,   write_uid,   petugas_id,   pejabat_id";
$proto0["m_strFrom"] = "FROM \"pad\".pad_stpd";
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
	"m_strTable" => "pad.pad_stpd"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "pad.pad_stpd"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "stpdno",
	"m_strTable" => "pad.pad_stpd"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "stpdtgl",
	"m_strTable" => "pad.pad_stpd"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_id",
	"m_strTable" => "pad.pad_stpd"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "jatuhtempotgl",
	"m_strTable" => "pad.pad_stpd"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "printed",
	"m_strTable" => "pad.pad_stpd"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "stpdcount",
	"m_strTable" => "pad.pad_stpd"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "bunga",
	"m_strTable" => "pad.pad_stpd"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_stpd"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_stpd"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_stpd"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "write_date",
	"m_strTable" => "pad.pad_stpd"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "write_uid",
	"m_strTable" => "pad.pad_stpd"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "petugas_id",
	"m_strTable" => "pad.pad_stpd"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "pejabat_id",
	"m_strTable" => "pad.pad_stpd"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto37=array();
$proto37["m_link"] = "SQLL_MAIN";
			$proto38=array();
$proto38["m_strName"] = "pad.pad_stpd";
$proto38["m_columns"] = array();
$proto38["m_columns"][] = "id";
$proto38["m_columns"][] = "tahun";
$proto38["m_columns"][] = "stpdno";
$proto38["m_columns"][] = "stpdtgl";
$proto38["m_columns"][] = "spt_id";
$proto38["m_columns"][] = "jatuhtempotgl";
$proto38["m_columns"][] = "printed";
$proto38["m_columns"][] = "stpdcount";
$proto38["m_columns"][] = "bunga";
$proto38["m_columns"][] = "enabled";
$proto38["m_columns"][] = "created";
$proto38["m_columns"][] = "create_uid";
$proto38["m_columns"][] = "write_date";
$proto38["m_columns"][] = "write_uid";
$proto38["m_columns"][] = "petugas_id";
$proto38["m_columns"][] = "pejabat_id";
$obj = new SQLTable($proto38);

$proto37["m_table"] = $obj;
$proto37["m_alias"] = "";
$proto39=array();
$proto39["m_sql"] = "";
$proto39["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto39["m_column"]=$obj;
$proto39["m_contained"] = array();
$proto39["m_strCase"] = "";
$proto39["m_havingmode"] = "0";
$proto39["m_inBrackets"] = "0";
$proto39["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto39);

$proto37["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto37);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_stpd = createSqlQuery_pad_pad_stpd();
																$tdatapad_pad_stpd[".sqlquery"] = $queryData_pad_pad_stpd;
	
if(isset($tdatapad_pad_stpd["field2"])){
	$tdatapad_pad_stpd["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_stpd["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_stpd["field2"]["LookupType"] = 4;
	$tdatapad_pad_stpd["field2"]["LinkField"] = "email";
	$tdatapad_pad_stpd["field2"]["DisplayField"] = "name";
	$tdatapad_pad_stpd[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_stpd"] = new eventsBase;
$tdatapad_pad_stpd[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_stpd");

?>