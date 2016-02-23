<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_terima_line = array();
	$tdatapad_pad_terima_line[".NumberOfChars"] = 80; 
	$tdatapad_pad_terima_line[".ShortName"] = "pad_pad_terima_line";
	$tdatapad_pad_terima_line[".OwnerID"] = "";
	$tdatapad_pad_terima_line[".OriginalTable"] = "pad.pad_terima_line";

//	field labels
$fieldLabelspad_pad_terima_line = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_terima_line["English"] = array();
	$fieldToolTipspad_pad_terima_line["English"] = array();
	$fieldLabelspad_pad_terima_line["English"]["id"] = "Id";
	$fieldToolTipspad_pad_terima_line["English"]["id"] = "";
	$fieldLabelspad_pad_terima_line["English"]["terima_id"] = "Terima Id";
	$fieldToolTipspad_pad_terima_line["English"]["terima_id"] = "";
	$fieldLabelspad_pad_terima_line["English"]["spt_id"] = "Spt Id";
	$fieldToolTipspad_pad_terima_line["English"]["spt_id"] = "";
	$fieldLabelspad_pad_terima_line["English"]["rekening_id"] = "Rekening Id";
	$fieldToolTipspad_pad_terima_line["English"]["rekening_id"] = "";
	$fieldLabelspad_pad_terima_line["English"]["pajak_id"] = "Pajak Id";
	$fieldToolTipspad_pad_terima_line["English"]["pajak_id"] = "";
	$fieldLabelspad_pad_terima_line["English"]["amount"] = "Amount";
	$fieldToolTipspad_pad_terima_line["English"]["amount"] = "";
	$fieldLabelspad_pad_terima_line["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_terima_line["English"]["enabled"] = "";
	$fieldLabelspad_pad_terima_line["English"]["create_date"] = "Create Date";
	$fieldToolTipspad_pad_terima_line["English"]["create_date"] = "";
	$fieldLabelspad_pad_terima_line["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_terima_line["English"]["create_uid"] = "";
	$fieldLabelspad_pad_terima_line["English"]["write_date"] = "Write Date";
	$fieldToolTipspad_pad_terima_line["English"]["write_date"] = "";
	$fieldLabelspad_pad_terima_line["English"]["write_uid"] = "Write Uid";
	$fieldToolTipspad_pad_terima_line["English"]["write_uid"] = "";
	if (count($fieldToolTipspad_pad_terima_line["English"]))
		$tdatapad_pad_terima_line[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_terima_line[".NCSearch"] = true;



$tdatapad_pad_terima_line[".shortTableName"] = "pad_pad_terima_line";
$tdatapad_pad_terima_line[".nSecOptions"] = 0;
$tdatapad_pad_terima_line[".recsPerRowList"] = 1;
$tdatapad_pad_terima_line[".mainTableOwnerID"] = "";
$tdatapad_pad_terima_line[".moveNext"] = 1;
$tdatapad_pad_terima_line[".nType"] = 0;

$tdatapad_pad_terima_line[".strOriginalTableName"] = "pad.pad_terima_line";




$tdatapad_pad_terima_line[".showAddInPopup"] = false;

$tdatapad_pad_terima_line[".showEditInPopup"] = false;

$tdatapad_pad_terima_line[".showViewInPopup"] = false;

$tdatapad_pad_terima_line[".fieldsForRegister"] = array();

$tdatapad_pad_terima_line[".listAjax"] = false;

	$tdatapad_pad_terima_line[".audit"] = false;

	$tdatapad_pad_terima_line[".locking"] = false;

$tdatapad_pad_terima_line[".listIcons"] = true;
$tdatapad_pad_terima_line[".edit"] = true;
$tdatapad_pad_terima_line[".inlineEdit"] = true;
$tdatapad_pad_terima_line[".inlineAdd"] = true;
$tdatapad_pad_terima_line[".view"] = true;

$tdatapad_pad_terima_line[".exportTo"] = true;

$tdatapad_pad_terima_line[".printFriendly"] = true;

$tdatapad_pad_terima_line[".delete"] = true;

$tdatapad_pad_terima_line[".showSimpleSearchOptions"] = false;

$tdatapad_pad_terima_line[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_terima_line[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_terima_line[".isUseAjaxSuggest"] = true;

$tdatapad_pad_terima_line[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_terima_line[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_terima_line[".isUseTimeForSearch"] = false;




$tdatapad_pad_terima_line[".allSearchFields"] = array();

$tdatapad_pad_terima_line[".allSearchFields"][] = "id";
$tdatapad_pad_terima_line[".allSearchFields"][] = "terima_id";
$tdatapad_pad_terima_line[".allSearchFields"][] = "spt_id";
$tdatapad_pad_terima_line[".allSearchFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".allSearchFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".allSearchFields"][] = "amount";
$tdatapad_pad_terima_line[".allSearchFields"][] = "enabled";
$tdatapad_pad_terima_line[".allSearchFields"][] = "create_date";
$tdatapad_pad_terima_line[".allSearchFields"][] = "create_uid";
$tdatapad_pad_terima_line[".allSearchFields"][] = "write_date";
$tdatapad_pad_terima_line[".allSearchFields"][] = "write_uid";

$tdatapad_pad_terima_line[".googleLikeFields"][] = "id";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "terima_id";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "spt_id";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "amount";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "enabled";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "create_date";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "write_date";
$tdatapad_pad_terima_line[".googleLikeFields"][] = "write_uid";


$tdatapad_pad_terima_line[".advSearchFields"][] = "id";
$tdatapad_pad_terima_line[".advSearchFields"][] = "terima_id";
$tdatapad_pad_terima_line[".advSearchFields"][] = "spt_id";
$tdatapad_pad_terima_line[".advSearchFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".advSearchFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".advSearchFields"][] = "amount";
$tdatapad_pad_terima_line[".advSearchFields"][] = "enabled";
$tdatapad_pad_terima_line[".advSearchFields"][] = "create_date";
$tdatapad_pad_terima_line[".advSearchFields"][] = "create_uid";
$tdatapad_pad_terima_line[".advSearchFields"][] = "write_date";
$tdatapad_pad_terima_line[".advSearchFields"][] = "write_uid";

$tdatapad_pad_terima_line[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_terima_line[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_terima_line[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_terima_line[".orderindexes"] = array();

$tdatapad_pad_terima_line[".sqlHead"] = "SELECT id,   terima_id,   spt_id,   rekening_id,   pajak_id,   amount,   enabled,   create_date,   create_uid,   write_date,   write_uid";
$tdatapad_pad_terima_line[".sqlFrom"] = "FROM \"pad\".pad_terima_line";
$tdatapad_pad_terima_line[".sqlWhereExpr"] = "";
$tdatapad_pad_terima_line[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_terima_line[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_terima_line[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_terima_line = array();
$tableKeyspad_pad_terima_line[] = "id";
$tdatapad_pad_terima_line[".Keys"] = $tableKeyspad_pad_terima_line;

$tdatapad_pad_terima_line[".listFields"] = array();
$tdatapad_pad_terima_line[".listFields"][] = "id";
$tdatapad_pad_terima_line[".listFields"][] = "terima_id";
$tdatapad_pad_terima_line[".listFields"][] = "spt_id";
$tdatapad_pad_terima_line[".listFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".listFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".listFields"][] = "amount";
$tdatapad_pad_terima_line[".listFields"][] = "enabled";
$tdatapad_pad_terima_line[".listFields"][] = "create_date";
$tdatapad_pad_terima_line[".listFields"][] = "create_uid";
$tdatapad_pad_terima_line[".listFields"][] = "write_date";
$tdatapad_pad_terima_line[".listFields"][] = "write_uid";

$tdatapad_pad_terima_line[".viewFields"] = array();
$tdatapad_pad_terima_line[".viewFields"][] = "id";
$tdatapad_pad_terima_line[".viewFields"][] = "terima_id";
$tdatapad_pad_terima_line[".viewFields"][] = "spt_id";
$tdatapad_pad_terima_line[".viewFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".viewFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".viewFields"][] = "amount";
$tdatapad_pad_terima_line[".viewFields"][] = "enabled";
$tdatapad_pad_terima_line[".viewFields"][] = "create_date";
$tdatapad_pad_terima_line[".viewFields"][] = "create_uid";
$tdatapad_pad_terima_line[".viewFields"][] = "write_date";
$tdatapad_pad_terima_line[".viewFields"][] = "write_uid";

$tdatapad_pad_terima_line[".addFields"] = array();
$tdatapad_pad_terima_line[".addFields"][] = "terima_id";
$tdatapad_pad_terima_line[".addFields"][] = "spt_id";
$tdatapad_pad_terima_line[".addFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".addFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".addFields"][] = "amount";
$tdatapad_pad_terima_line[".addFields"][] = "enabled";
$tdatapad_pad_terima_line[".addFields"][] = "create_date";
$tdatapad_pad_terima_line[".addFields"][] = "create_uid";
$tdatapad_pad_terima_line[".addFields"][] = "write_date";
$tdatapad_pad_terima_line[".addFields"][] = "write_uid";

$tdatapad_pad_terima_line[".inlineAddFields"] = array();
$tdatapad_pad_terima_line[".inlineAddFields"][] = "terima_id";
$tdatapad_pad_terima_line[".inlineAddFields"][] = "spt_id";
$tdatapad_pad_terima_line[".inlineAddFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".inlineAddFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".inlineAddFields"][] = "amount";
$tdatapad_pad_terima_line[".inlineAddFields"][] = "enabled";
$tdatapad_pad_terima_line[".inlineAddFields"][] = "create_date";
$tdatapad_pad_terima_line[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_terima_line[".inlineAddFields"][] = "write_date";
$tdatapad_pad_terima_line[".inlineAddFields"][] = "write_uid";

$tdatapad_pad_terima_line[".editFields"] = array();
$tdatapad_pad_terima_line[".editFields"][] = "terima_id";
$tdatapad_pad_terima_line[".editFields"][] = "spt_id";
$tdatapad_pad_terima_line[".editFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".editFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".editFields"][] = "amount";
$tdatapad_pad_terima_line[".editFields"][] = "enabled";
$tdatapad_pad_terima_line[".editFields"][] = "create_date";
$tdatapad_pad_terima_line[".editFields"][] = "create_uid";
$tdatapad_pad_terima_line[".editFields"][] = "write_date";
$tdatapad_pad_terima_line[".editFields"][] = "write_uid";

$tdatapad_pad_terima_line[".inlineEditFields"] = array();
$tdatapad_pad_terima_line[".inlineEditFields"][] = "terima_id";
$tdatapad_pad_terima_line[".inlineEditFields"][] = "spt_id";
$tdatapad_pad_terima_line[".inlineEditFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".inlineEditFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".inlineEditFields"][] = "amount";
$tdatapad_pad_terima_line[".inlineEditFields"][] = "enabled";
$tdatapad_pad_terima_line[".inlineEditFields"][] = "create_date";
$tdatapad_pad_terima_line[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_terima_line[".inlineEditFields"][] = "write_date";
$tdatapad_pad_terima_line[".inlineEditFields"][] = "write_uid";

$tdatapad_pad_terima_line[".exportFields"] = array();
$tdatapad_pad_terima_line[".exportFields"][] = "id";
$tdatapad_pad_terima_line[".exportFields"][] = "terima_id";
$tdatapad_pad_terima_line[".exportFields"][] = "spt_id";
$tdatapad_pad_terima_line[".exportFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".exportFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".exportFields"][] = "amount";
$tdatapad_pad_terima_line[".exportFields"][] = "enabled";
$tdatapad_pad_terima_line[".exportFields"][] = "create_date";
$tdatapad_pad_terima_line[".exportFields"][] = "create_uid";
$tdatapad_pad_terima_line[".exportFields"][] = "write_date";
$tdatapad_pad_terima_line[".exportFields"][] = "write_uid";

$tdatapad_pad_terima_line[".printFields"] = array();
$tdatapad_pad_terima_line[".printFields"][] = "id";
$tdatapad_pad_terima_line[".printFields"][] = "terima_id";
$tdatapad_pad_terima_line[".printFields"][] = "spt_id";
$tdatapad_pad_terima_line[".printFields"][] = "rekening_id";
$tdatapad_pad_terima_line[".printFields"][] = "pajak_id";
$tdatapad_pad_terima_line[".printFields"][] = "amount";
$tdatapad_pad_terima_line[".printFields"][] = "enabled";
$tdatapad_pad_terima_line[".printFields"][] = "create_date";
$tdatapad_pad_terima_line[".printFields"][] = "create_uid";
$tdatapad_pad_terima_line[".printFields"][] = "write_date";
$tdatapad_pad_terima_line[".printFields"][] = "write_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_terima_line";
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
	
		
		
	$tdatapad_pad_terima_line["id"] = $fdata;
//	terima_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "terima_id";
	$fdata["GoodName"] = "terima_id";
	$fdata["ownerTable"] = "pad.pad_terima_line";
	$fdata["Label"] = "Terima Id"; 
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
	
		$fdata["strField"] = "terima_id"; 
		$fdata["FullName"] = "terima_id";
	
		
		
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
	
		
		
	$tdatapad_pad_terima_line["terima_id"] = $fdata;
//	spt_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "spt_id";
	$fdata["GoodName"] = "spt_id";
	$fdata["ownerTable"] = "pad.pad_terima_line";
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
	
		
		
	$tdatapad_pad_terima_line["spt_id"] = $fdata;
//	rekening_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "rekening_id";
	$fdata["GoodName"] = "rekening_id";
	$fdata["ownerTable"] = "pad.pad_terima_line";
	$fdata["Label"] = "Rekening Id"; 
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
	
		$fdata["strField"] = "rekening_id"; 
		$fdata["FullName"] = "rekening_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_rekening";
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
	
		
		
	$tdatapad_pad_terima_line["rekening_id"] = $fdata;
//	pajak_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "pajak_id";
	$fdata["GoodName"] = "pajak_id";
	$fdata["ownerTable"] = "pad.pad_terima_line";
	$fdata["Label"] = "Pajak Id"; 
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
	
		$fdata["strField"] = "pajak_id"; 
		$fdata["FullName"] = "pajak_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_jenis_pajak";
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
	
		
		
	$tdatapad_pad_terima_line["pajak_id"] = $fdata;
//	amount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "amount";
	$fdata["GoodName"] = "amount";
	$fdata["ownerTable"] = "pad.pad_terima_line";
	$fdata["Label"] = "Amount"; 
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
	
		$fdata["strField"] = "amount"; 
		$fdata["FullName"] = "amount";
	
		
		
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
	
		
		
	$tdatapad_pad_terima_line["amount"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_terima_line";
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
	
		
		
	$tdatapad_pad_terima_line["enabled"] = $fdata;
//	create_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "create_date";
	$fdata["GoodName"] = "create_date";
	$fdata["ownerTable"] = "pad.pad_terima_line";
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
	
		
		
	$tdatapad_pad_terima_line["create_date"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_terima_line";
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
	
		
		
	$tdatapad_pad_terima_line["create_uid"] = $fdata;
//	write_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "write_date";
	$fdata["GoodName"] = "write_date";
	$fdata["ownerTable"] = "pad.pad_terima_line";
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
	
		
		
	$tdatapad_pad_terima_line["write_date"] = $fdata;
//	write_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "write_uid";
	$fdata["GoodName"] = "write_uid";
	$fdata["ownerTable"] = "pad.pad_terima_line";
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
	
		
		
	$tdatapad_pad_terima_line["write_uid"] = $fdata;

	
$tables_data["pad.pad_terima_line"]=&$tdatapad_pad_terima_line;
$field_labels["pad_pad_terima_line"] = &$fieldLabelspad_pad_terima_line;
$fieldToolTips["pad.pad_terima_line"] = &$fieldToolTipspad_pad_terima_line;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_terima_line"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_terima_line"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_jenis_pajak";
	$masterParams["mDataSourceTable"]="pad.pad_jenis_pajak";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_jenis_pajak";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_terima_line"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_terima_line"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_terima_line"][$mIndex]["detailKeys"][]="pajak_id";

$mIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_rekening";
	$masterParams["mDataSourceTable"]="pad.pad_rekening";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_rekening";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_terima_line"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_terima_line"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_terima_line"][$mIndex]["detailKeys"][]="rekening_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_terima_line()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   terima_id,   spt_id,   rekening_id,   pajak_id,   amount,   enabled,   create_date,   create_uid,   write_date,   write_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_terima_line";
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
	"m_strTable" => "pad.pad_terima_line"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "terima_id",
	"m_strTable" => "pad.pad_terima_line"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_id",
	"m_strTable" => "pad.pad_terima_line"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "rekening_id",
	"m_strTable" => "pad.pad_terima_line"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "pajak_id",
	"m_strTable" => "pad.pad_terima_line"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "amount",
	"m_strTable" => "pad.pad_terima_line"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_terima_line"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "create_date",
	"m_strTable" => "pad.pad_terima_line"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_terima_line"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "write_date",
	"m_strTable" => "pad.pad_terima_line"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "write_uid",
	"m_strTable" => "pad.pad_terima_line"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "pad.pad_terima_line";
$proto28["m_columns"] = array();
$proto28["m_columns"][] = "id";
$proto28["m_columns"][] = "terima_id";
$proto28["m_columns"][] = "spt_id";
$proto28["m_columns"][] = "rekening_id";
$proto28["m_columns"][] = "pajak_id";
$proto28["m_columns"][] = "amount";
$proto28["m_columns"][] = "enabled";
$proto28["m_columns"][] = "create_date";
$proto28["m_columns"][] = "create_uid";
$proto28["m_columns"][] = "write_date";
$proto28["m_columns"][] = "write_uid";
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
$queryData_pad_pad_terima_line = createSqlQuery_pad_pad_terima_line();
											$tdatapad_pad_terima_line[".sqlquery"] = $queryData_pad_pad_terima_line;
	
if(isset($tdatapad_pad_terima_line["field2"])){
	$tdatapad_pad_terima_line["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_terima_line["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_terima_line["field2"]["LookupType"] = 4;
	$tdatapad_pad_terima_line["field2"]["LinkField"] = "email";
	$tdatapad_pad_terima_line["field2"]["DisplayField"] = "name";
	$tdatapad_pad_terima_line[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_terima_line"] = new eventsBase;
$tdatapad_pad_terima_line[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_terima_line");

?>