<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_terima = array();
	$tdatapad_pad_terima[".NumberOfChars"] = 80; 
	$tdatapad_pad_terima[".ShortName"] = "pad_pad_terima";
	$tdatapad_pad_terima[".OwnerID"] = "";
	$tdatapad_pad_terima[".OriginalTable"] = "pad.pad_terima";

//	field labels
$fieldLabelspad_pad_terima = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_terima["English"] = array();
	$fieldToolTipspad_pad_terima["English"] = array();
	$fieldLabelspad_pad_terima["English"]["id"] = "Id";
	$fieldToolTipspad_pad_terima["English"]["id"] = "";
	$fieldLabelspad_pad_terima["English"]["tahun"] = "Tahun";
	$fieldToolTipspad_pad_terima["English"]["tahun"] = "";
	$fieldLabelspad_pad_terima["English"]["terimano"] = "Terimano";
	$fieldToolTipspad_pad_terima["English"]["terimano"] = "";
	$fieldLabelspad_pad_terima["English"]["terimatgl"] = "Terimatgl";
	$fieldToolTipspad_pad_terima["English"]["terimatgl"] = "";
	$fieldLabelspad_pad_terima["English"]["jmlterima"] = "Jmlterima";
	$fieldToolTipspad_pad_terima["English"]["jmlterima"] = "";
	$fieldLabelspad_pad_terima["English"]["customer_id"] = "Customer Id";
	$fieldToolTipspad_pad_terima["English"]["customer_id"] = "";
	$fieldLabelspad_pad_terima["English"]["npwpd"] = "Npwpd";
	$fieldToolTipspad_pad_terima["English"]["npwpd"] = "";
	$fieldLabelspad_pad_terima["English"]["nobukti"] = "Nobukti";
	$fieldToolTipspad_pad_terima["English"]["nobukti"] = "";
	$fieldLabelspad_pad_terima["English"]["notes"] = "Notes";
	$fieldToolTipspad_pad_terima["English"]["notes"] = "";
	$fieldLabelspad_pad_terima["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_terima["English"]["enabled"] = "";
	$fieldLabelspad_pad_terima["English"]["create_date"] = "Create Date";
	$fieldToolTipspad_pad_terima["English"]["create_date"] = "";
	$fieldLabelspad_pad_terima["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_terima["English"]["create_uid"] = "";
	$fieldLabelspad_pad_terima["English"]["write_date"] = "Write Date";
	$fieldToolTipspad_pad_terima["English"]["write_date"] = "";
	$fieldLabelspad_pad_terima["English"]["write_uid"] = "Write Uid";
	$fieldToolTipspad_pad_terima["English"]["write_uid"] = "";
	if (count($fieldToolTipspad_pad_terima["English"]))
		$tdatapad_pad_terima[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_terima[".NCSearch"] = true;



$tdatapad_pad_terima[".shortTableName"] = "pad_pad_terima";
$tdatapad_pad_terima[".nSecOptions"] = 0;
$tdatapad_pad_terima[".recsPerRowList"] = 1;
$tdatapad_pad_terima[".mainTableOwnerID"] = "";
$tdatapad_pad_terima[".moveNext"] = 1;
$tdatapad_pad_terima[".nType"] = 0;

$tdatapad_pad_terima[".strOriginalTableName"] = "pad.pad_terima";




$tdatapad_pad_terima[".showAddInPopup"] = false;

$tdatapad_pad_terima[".showEditInPopup"] = false;

$tdatapad_pad_terima[".showViewInPopup"] = false;

$tdatapad_pad_terima[".fieldsForRegister"] = array();

$tdatapad_pad_terima[".listAjax"] = false;

	$tdatapad_pad_terima[".audit"] = false;

	$tdatapad_pad_terima[".locking"] = false;

$tdatapad_pad_terima[".listIcons"] = true;
$tdatapad_pad_terima[".edit"] = true;
$tdatapad_pad_terima[".inlineEdit"] = true;
$tdatapad_pad_terima[".inlineAdd"] = true;
$tdatapad_pad_terima[".view"] = true;

$tdatapad_pad_terima[".exportTo"] = true;

$tdatapad_pad_terima[".printFriendly"] = true;

$tdatapad_pad_terima[".delete"] = true;

$tdatapad_pad_terima[".showSimpleSearchOptions"] = false;

$tdatapad_pad_terima[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_terima[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_terima[".isUseAjaxSuggest"] = true;

$tdatapad_pad_terima[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_terima[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_terima[".isUseTimeForSearch"] = false;




$tdatapad_pad_terima[".allSearchFields"] = array();

$tdatapad_pad_terima[".allSearchFields"][] = "id";
$tdatapad_pad_terima[".allSearchFields"][] = "tahun";
$tdatapad_pad_terima[".allSearchFields"][] = "terimano";
$tdatapad_pad_terima[".allSearchFields"][] = "terimatgl";
$tdatapad_pad_terima[".allSearchFields"][] = "jmlterima";
$tdatapad_pad_terima[".allSearchFields"][] = "customer_id";
$tdatapad_pad_terima[".allSearchFields"][] = "npwpd";
$tdatapad_pad_terima[".allSearchFields"][] = "nobukti";
$tdatapad_pad_terima[".allSearchFields"][] = "notes";
$tdatapad_pad_terima[".allSearchFields"][] = "enabled";
$tdatapad_pad_terima[".allSearchFields"][] = "create_date";
$tdatapad_pad_terima[".allSearchFields"][] = "create_uid";
$tdatapad_pad_terima[".allSearchFields"][] = "write_date";
$tdatapad_pad_terima[".allSearchFields"][] = "write_uid";

$tdatapad_pad_terima[".googleLikeFields"][] = "id";
$tdatapad_pad_terima[".googleLikeFields"][] = "tahun";
$tdatapad_pad_terima[".googleLikeFields"][] = "terimano";
$tdatapad_pad_terima[".googleLikeFields"][] = "terimatgl";
$tdatapad_pad_terima[".googleLikeFields"][] = "jmlterima";
$tdatapad_pad_terima[".googleLikeFields"][] = "customer_id";
$tdatapad_pad_terima[".googleLikeFields"][] = "npwpd";
$tdatapad_pad_terima[".googleLikeFields"][] = "nobukti";
$tdatapad_pad_terima[".googleLikeFields"][] = "notes";
$tdatapad_pad_terima[".googleLikeFields"][] = "enabled";
$tdatapad_pad_terima[".googleLikeFields"][] = "create_date";
$tdatapad_pad_terima[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_terima[".googleLikeFields"][] = "write_date";
$tdatapad_pad_terima[".googleLikeFields"][] = "write_uid";


$tdatapad_pad_terima[".advSearchFields"][] = "id";
$tdatapad_pad_terima[".advSearchFields"][] = "tahun";
$tdatapad_pad_terima[".advSearchFields"][] = "terimano";
$tdatapad_pad_terima[".advSearchFields"][] = "terimatgl";
$tdatapad_pad_terima[".advSearchFields"][] = "jmlterima";
$tdatapad_pad_terima[".advSearchFields"][] = "customer_id";
$tdatapad_pad_terima[".advSearchFields"][] = "npwpd";
$tdatapad_pad_terima[".advSearchFields"][] = "nobukti";
$tdatapad_pad_terima[".advSearchFields"][] = "notes";
$tdatapad_pad_terima[".advSearchFields"][] = "enabled";
$tdatapad_pad_terima[".advSearchFields"][] = "create_date";
$tdatapad_pad_terima[".advSearchFields"][] = "create_uid";
$tdatapad_pad_terima[".advSearchFields"][] = "write_date";
$tdatapad_pad_terima[".advSearchFields"][] = "write_uid";

$tdatapad_pad_terima[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_terima[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_terima[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_terima[".orderindexes"] = array();

$tdatapad_pad_terima[".sqlHead"] = "SELECT id,   tahun,   terimano,   terimatgl,   jmlterima,   customer_id,   npwpd,   nobukti,   notes,   enabled,   create_date,   create_uid,   write_date,   write_uid";
$tdatapad_pad_terima[".sqlFrom"] = "FROM \"pad\".pad_terima";
$tdatapad_pad_terima[".sqlWhereExpr"] = "";
$tdatapad_pad_terima[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_terima[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_terima[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_terima = array();
$tableKeyspad_pad_terima[] = "id";
$tdatapad_pad_terima[".Keys"] = $tableKeyspad_pad_terima;

$tdatapad_pad_terima[".listFields"] = array();
$tdatapad_pad_terima[".listFields"][] = "id";
$tdatapad_pad_terima[".listFields"][] = "tahun";
$tdatapad_pad_terima[".listFields"][] = "terimano";
$tdatapad_pad_terima[".listFields"][] = "terimatgl";
$tdatapad_pad_terima[".listFields"][] = "jmlterima";
$tdatapad_pad_terima[".listFields"][] = "customer_id";
$tdatapad_pad_terima[".listFields"][] = "npwpd";
$tdatapad_pad_terima[".listFields"][] = "nobukti";
$tdatapad_pad_terima[".listFields"][] = "notes";
$tdatapad_pad_terima[".listFields"][] = "enabled";
$tdatapad_pad_terima[".listFields"][] = "create_date";
$tdatapad_pad_terima[".listFields"][] = "create_uid";
$tdatapad_pad_terima[".listFields"][] = "write_date";
$tdatapad_pad_terima[".listFields"][] = "write_uid";

$tdatapad_pad_terima[".viewFields"] = array();
$tdatapad_pad_terima[".viewFields"][] = "id";
$tdatapad_pad_terima[".viewFields"][] = "tahun";
$tdatapad_pad_terima[".viewFields"][] = "terimano";
$tdatapad_pad_terima[".viewFields"][] = "terimatgl";
$tdatapad_pad_terima[".viewFields"][] = "jmlterima";
$tdatapad_pad_terima[".viewFields"][] = "customer_id";
$tdatapad_pad_terima[".viewFields"][] = "npwpd";
$tdatapad_pad_terima[".viewFields"][] = "nobukti";
$tdatapad_pad_terima[".viewFields"][] = "notes";
$tdatapad_pad_terima[".viewFields"][] = "enabled";
$tdatapad_pad_terima[".viewFields"][] = "create_date";
$tdatapad_pad_terima[".viewFields"][] = "create_uid";
$tdatapad_pad_terima[".viewFields"][] = "write_date";
$tdatapad_pad_terima[".viewFields"][] = "write_uid";

$tdatapad_pad_terima[".addFields"] = array();
$tdatapad_pad_terima[".addFields"][] = "tahun";
$tdatapad_pad_terima[".addFields"][] = "terimano";
$tdatapad_pad_terima[".addFields"][] = "terimatgl";
$tdatapad_pad_terima[".addFields"][] = "jmlterima";
$tdatapad_pad_terima[".addFields"][] = "customer_id";
$tdatapad_pad_terima[".addFields"][] = "npwpd";
$tdatapad_pad_terima[".addFields"][] = "nobukti";
$tdatapad_pad_terima[".addFields"][] = "notes";
$tdatapad_pad_terima[".addFields"][] = "enabled";
$tdatapad_pad_terima[".addFields"][] = "create_date";
$tdatapad_pad_terima[".addFields"][] = "create_uid";
$tdatapad_pad_terima[".addFields"][] = "write_date";
$tdatapad_pad_terima[".addFields"][] = "write_uid";

$tdatapad_pad_terima[".inlineAddFields"] = array();
$tdatapad_pad_terima[".inlineAddFields"][] = "tahun";
$tdatapad_pad_terima[".inlineAddFields"][] = "terimano";
$tdatapad_pad_terima[".inlineAddFields"][] = "terimatgl";
$tdatapad_pad_terima[".inlineAddFields"][] = "jmlterima";
$tdatapad_pad_terima[".inlineAddFields"][] = "customer_id";
$tdatapad_pad_terima[".inlineAddFields"][] = "npwpd";
$tdatapad_pad_terima[".inlineAddFields"][] = "nobukti";
$tdatapad_pad_terima[".inlineAddFields"][] = "notes";
$tdatapad_pad_terima[".inlineAddFields"][] = "enabled";
$tdatapad_pad_terima[".inlineAddFields"][] = "create_date";
$tdatapad_pad_terima[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_terima[".inlineAddFields"][] = "write_date";
$tdatapad_pad_terima[".inlineAddFields"][] = "write_uid";

$tdatapad_pad_terima[".editFields"] = array();
$tdatapad_pad_terima[".editFields"][] = "tahun";
$tdatapad_pad_terima[".editFields"][] = "terimano";
$tdatapad_pad_terima[".editFields"][] = "terimatgl";
$tdatapad_pad_terima[".editFields"][] = "jmlterima";
$tdatapad_pad_terima[".editFields"][] = "customer_id";
$tdatapad_pad_terima[".editFields"][] = "npwpd";
$tdatapad_pad_terima[".editFields"][] = "nobukti";
$tdatapad_pad_terima[".editFields"][] = "notes";
$tdatapad_pad_terima[".editFields"][] = "enabled";
$tdatapad_pad_terima[".editFields"][] = "create_date";
$tdatapad_pad_terima[".editFields"][] = "create_uid";
$tdatapad_pad_terima[".editFields"][] = "write_date";
$tdatapad_pad_terima[".editFields"][] = "write_uid";

$tdatapad_pad_terima[".inlineEditFields"] = array();
$tdatapad_pad_terima[".inlineEditFields"][] = "tahun";
$tdatapad_pad_terima[".inlineEditFields"][] = "terimano";
$tdatapad_pad_terima[".inlineEditFields"][] = "terimatgl";
$tdatapad_pad_terima[".inlineEditFields"][] = "jmlterima";
$tdatapad_pad_terima[".inlineEditFields"][] = "customer_id";
$tdatapad_pad_terima[".inlineEditFields"][] = "npwpd";
$tdatapad_pad_terima[".inlineEditFields"][] = "nobukti";
$tdatapad_pad_terima[".inlineEditFields"][] = "notes";
$tdatapad_pad_terima[".inlineEditFields"][] = "enabled";
$tdatapad_pad_terima[".inlineEditFields"][] = "create_date";
$tdatapad_pad_terima[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_terima[".inlineEditFields"][] = "write_date";
$tdatapad_pad_terima[".inlineEditFields"][] = "write_uid";

$tdatapad_pad_terima[".exportFields"] = array();
$tdatapad_pad_terima[".exportFields"][] = "id";
$tdatapad_pad_terima[".exportFields"][] = "tahun";
$tdatapad_pad_terima[".exportFields"][] = "terimano";
$tdatapad_pad_terima[".exportFields"][] = "terimatgl";
$tdatapad_pad_terima[".exportFields"][] = "jmlterima";
$tdatapad_pad_terima[".exportFields"][] = "customer_id";
$tdatapad_pad_terima[".exportFields"][] = "npwpd";
$tdatapad_pad_terima[".exportFields"][] = "nobukti";
$tdatapad_pad_terima[".exportFields"][] = "notes";
$tdatapad_pad_terima[".exportFields"][] = "enabled";
$tdatapad_pad_terima[".exportFields"][] = "create_date";
$tdatapad_pad_terima[".exportFields"][] = "create_uid";
$tdatapad_pad_terima[".exportFields"][] = "write_date";
$tdatapad_pad_terima[".exportFields"][] = "write_uid";

$tdatapad_pad_terima[".printFields"] = array();
$tdatapad_pad_terima[".printFields"][] = "id";
$tdatapad_pad_terima[".printFields"][] = "tahun";
$tdatapad_pad_terima[".printFields"][] = "terimano";
$tdatapad_pad_terima[".printFields"][] = "terimatgl";
$tdatapad_pad_terima[".printFields"][] = "jmlterima";
$tdatapad_pad_terima[".printFields"][] = "customer_id";
$tdatapad_pad_terima[".printFields"][] = "npwpd";
$tdatapad_pad_terima[".printFields"][] = "nobukti";
$tdatapad_pad_terima[".printFields"][] = "notes";
$tdatapad_pad_terima[".printFields"][] = "enabled";
$tdatapad_pad_terima[".printFields"][] = "create_date";
$tdatapad_pad_terima[".printFields"][] = "create_uid";
$tdatapad_pad_terima[".printFields"][] = "write_date";
$tdatapad_pad_terima[".printFields"][] = "write_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_terima";
	$fdata["Label"] = "Id"; 
	$fdata["FieldType"] = 20;
	
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
	
		
		
	$tdatapad_pad_terima["id"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "pad.pad_terima";
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
	
		
		
	$tdatapad_pad_terima["tahun"] = $fdata;
//	terimano
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "terimano";
	$fdata["GoodName"] = "terimano";
	$fdata["ownerTable"] = "pad.pad_terima";
	$fdata["Label"] = "Terimano"; 
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
	
		$fdata["strField"] = "terimano"; 
		$fdata["FullName"] = "terimano";
	
		
		
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
	
		
		
	$tdatapad_pad_terima["terimano"] = $fdata;
//	terimatgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "terimatgl";
	$fdata["GoodName"] = "terimatgl";
	$fdata["ownerTable"] = "pad.pad_terima";
	$fdata["Label"] = "Terimatgl"; 
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
	
		$fdata["strField"] = "terimatgl"; 
		$fdata["FullName"] = "terimatgl";
	
		
		
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
	
		
		
	$tdatapad_pad_terima["terimatgl"] = $fdata;
//	jmlterima
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "jmlterima";
	$fdata["GoodName"] = "jmlterima";
	$fdata["ownerTable"] = "pad.pad_terima";
	$fdata["Label"] = "Jmlterima"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "jmlterima"; 
		$fdata["FullName"] = "jmlterima";
	
		
		
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
	
		
		
	$tdatapad_pad_terima["jmlterima"] = $fdata;
//	customer_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "customer_id";
	$fdata["GoodName"] = "customer_id";
	$fdata["ownerTable"] = "pad.pad_terima";
	$fdata["Label"] = "Customer Id"; 
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
	
		$fdata["strField"] = "customer_id"; 
		$fdata["FullName"] = "customer_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_terima["customer_id"] = $fdata;
//	npwpd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "npwpd";
	$fdata["GoodName"] = "npwpd";
	$fdata["ownerTable"] = "pad.pad_terima";
	$fdata["Label"] = "Npwpd"; 
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
	
		$fdata["strField"] = "npwpd"; 
		$fdata["FullName"] = "npwpd";
	
		
		
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
	
		
		
	$tdatapad_pad_terima["npwpd"] = $fdata;
//	nobukti
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "nobukti";
	$fdata["GoodName"] = "nobukti";
	$fdata["ownerTable"] = "pad.pad_terima";
	$fdata["Label"] = "Nobukti"; 
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
	
		$fdata["strField"] = "nobukti"; 
		$fdata["FullName"] = "nobukti";
	
		
		
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
			$edata["EditParams"].= " maxlength=15";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_terima["nobukti"] = $fdata;
//	notes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "notes";
	$fdata["GoodName"] = "notes";
	$fdata["ownerTable"] = "pad.pad_terima";
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_terima["notes"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_terima";
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
	
		
		
	$tdatapad_pad_terima["enabled"] = $fdata;
//	create_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "create_date";
	$fdata["GoodName"] = "create_date";
	$fdata["ownerTable"] = "pad.pad_terima";
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
	
		
		
	$tdatapad_pad_terima["create_date"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_terima";
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
	
		
		
	$tdatapad_pad_terima["create_uid"] = $fdata;
//	write_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "write_date";
	$fdata["GoodName"] = "write_date";
	$fdata["ownerTable"] = "pad.pad_terima";
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
	
		
		
	$tdatapad_pad_terima["write_date"] = $fdata;
//	write_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "write_uid";
	$fdata["GoodName"] = "write_uid";
	$fdata["ownerTable"] = "pad.pad_terima";
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
	
		
		
	$tdatapad_pad_terima["write_uid"] = $fdata;

	
$tables_data["pad.pad_terima"]=&$tdatapad_pad_terima;
$field_labels["pad_pad_terima"] = &$fieldLabelspad_pad_terima;
$fieldToolTips["pad.pad_terima"] = &$fieldToolTipspad_pad_terima;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_terima"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_terima"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_customer";
	$masterParams["mDataSourceTable"]="pad.pad_customer";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_customer";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_terima"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_terima"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_terima"][$mIndex]["detailKeys"][]="customer_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_terima()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tahun,   terimano,   terimatgl,   jmlterima,   customer_id,   npwpd,   nobukti,   notes,   enabled,   create_date,   create_uid,   write_date,   write_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_terima";
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
	"m_strTable" => "pad.pad_terima"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "pad.pad_terima"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "terimano",
	"m_strTable" => "pad.pad_terima"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "terimatgl",
	"m_strTable" => "pad.pad_terima"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "jmlterima",
	"m_strTable" => "pad.pad_terima"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_id",
	"m_strTable" => "pad.pad_terima"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "npwpd",
	"m_strTable" => "pad.pad_terima"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "nobukti",
	"m_strTable" => "pad.pad_terima"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "notes",
	"m_strTable" => "pad.pad_terima"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_terima"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "create_date",
	"m_strTable" => "pad.pad_terima"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_terima"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "write_date",
	"m_strTable" => "pad.pad_terima"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "write_uid",
	"m_strTable" => "pad.pad_terima"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto33=array();
$proto33["m_link"] = "SQLL_MAIN";
			$proto34=array();
$proto34["m_strName"] = "pad.pad_terima";
$proto34["m_columns"] = array();
$proto34["m_columns"][] = "id";
$proto34["m_columns"][] = "tahun";
$proto34["m_columns"][] = "terimano";
$proto34["m_columns"][] = "terimatgl";
$proto34["m_columns"][] = "jmlterima";
$proto34["m_columns"][] = "customer_id";
$proto34["m_columns"][] = "npwpd";
$proto34["m_columns"][] = "nobukti";
$proto34["m_columns"][] = "notes";
$proto34["m_columns"][] = "enabled";
$proto34["m_columns"][] = "create_date";
$proto34["m_columns"][] = "create_uid";
$proto34["m_columns"][] = "write_date";
$proto34["m_columns"][] = "write_uid";
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
$queryData_pad_pad_terima = createSqlQuery_pad_pad_terima();
														$tdatapad_pad_terima[".sqlquery"] = $queryData_pad_pad_terima;
	
if(isset($tdatapad_pad_terima["field2"])){
	$tdatapad_pad_terima["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_terima["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_terima["field2"]["LookupType"] = 4;
	$tdatapad_pad_terima["field2"]["LinkField"] = "email";
	$tdatapad_pad_terima["field2"]["DisplayField"] = "name";
	$tdatapad_pad_terima[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_terima"] = new eventsBase;
$tdatapad_pad_terima[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_terima");

?>