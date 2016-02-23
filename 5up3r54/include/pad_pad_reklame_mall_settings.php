<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_reklame_mall = array();
	$tdatapad_pad_reklame_mall[".NumberOfChars"] = 80; 
	$tdatapad_pad_reklame_mall[".ShortName"] = "pad_pad_reklame_mall";
	$tdatapad_pad_reklame_mall[".OwnerID"] = "";
	$tdatapad_pad_reklame_mall[".OriginalTable"] = "pad.pad_reklame_mall";

//	field labels
$fieldLabelspad_pad_reklame_mall = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_reklame_mall["English"] = array();
	$fieldToolTipspad_pad_reklame_mall["English"] = array();
	$fieldLabelspad_pad_reklame_mall["English"]["id"] = "Id";
	$fieldToolTipspad_pad_reklame_mall["English"]["id"] = "";
	$fieldLabelspad_pad_reklame_mall["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_reklame_mall["English"]["nama"] = "";
	$fieldLabelspad_pad_reklame_mall["English"]["alamat"] = "Alamat";
	$fieldToolTipspad_pad_reklame_mall["English"]["alamat"] = "";
	$fieldLabelspad_pad_reklame_mall["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_reklame_mall["English"]["update_uid"] = "";
	$fieldLabelspad_pad_reklame_mall["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_reklame_mall["English"]["create_uid"] = "";
	$fieldLabelspad_pad_reklame_mall["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_reklame_mall["English"]["updated"] = "";
	$fieldLabelspad_pad_reklame_mall["English"]["created"] = "Created";
	$fieldToolTipspad_pad_reklame_mall["English"]["created"] = "";
	if (count($fieldToolTipspad_pad_reklame_mall["English"]))
		$tdatapad_pad_reklame_mall[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_reklame_mall[".NCSearch"] = true;



$tdatapad_pad_reklame_mall[".shortTableName"] = "pad_pad_reklame_mall";
$tdatapad_pad_reklame_mall[".nSecOptions"] = 0;
$tdatapad_pad_reklame_mall[".recsPerRowList"] = 1;
$tdatapad_pad_reklame_mall[".mainTableOwnerID"] = "";
$tdatapad_pad_reklame_mall[".moveNext"] = 1;
$tdatapad_pad_reklame_mall[".nType"] = 0;

$tdatapad_pad_reklame_mall[".strOriginalTableName"] = "pad.pad_reklame_mall";




$tdatapad_pad_reklame_mall[".showAddInPopup"] = false;

$tdatapad_pad_reklame_mall[".showEditInPopup"] = false;

$tdatapad_pad_reklame_mall[".showViewInPopup"] = false;

$tdatapad_pad_reklame_mall[".fieldsForRegister"] = array();

$tdatapad_pad_reklame_mall[".listAjax"] = false;

	$tdatapad_pad_reklame_mall[".audit"] = false;

	$tdatapad_pad_reklame_mall[".locking"] = false;

$tdatapad_pad_reklame_mall[".listIcons"] = true;
$tdatapad_pad_reklame_mall[".edit"] = true;
$tdatapad_pad_reklame_mall[".inlineEdit"] = true;
$tdatapad_pad_reklame_mall[".inlineAdd"] = true;
$tdatapad_pad_reklame_mall[".view"] = true;

$tdatapad_pad_reklame_mall[".exportTo"] = true;

$tdatapad_pad_reklame_mall[".printFriendly"] = true;

$tdatapad_pad_reklame_mall[".delete"] = true;

$tdatapad_pad_reklame_mall[".showSimpleSearchOptions"] = false;

$tdatapad_pad_reklame_mall[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_reklame_mall[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_reklame_mall[".isUseAjaxSuggest"] = true;

$tdatapad_pad_reklame_mall[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_reklame_mall[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_reklame_mall[".isUseTimeForSearch"] = false;




$tdatapad_pad_reklame_mall[".allSearchFields"] = array();

$tdatapad_pad_reklame_mall[".allSearchFields"][] = "id";
$tdatapad_pad_reklame_mall[".allSearchFields"][] = "nama";
$tdatapad_pad_reklame_mall[".allSearchFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".allSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".allSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".allSearchFields"][] = "updated";
$tdatapad_pad_reklame_mall[".allSearchFields"][] = "created";

$tdatapad_pad_reklame_mall[".googleLikeFields"][] = "id";
$tdatapad_pad_reklame_mall[".googleLikeFields"][] = "nama";
$tdatapad_pad_reklame_mall[".googleLikeFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".googleLikeFields"][] = "updated";
$tdatapad_pad_reklame_mall[".googleLikeFields"][] = "created";


$tdatapad_pad_reklame_mall[".advSearchFields"][] = "id";
$tdatapad_pad_reklame_mall[".advSearchFields"][] = "nama";
$tdatapad_pad_reklame_mall[".advSearchFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".advSearchFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".advSearchFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".advSearchFields"][] = "updated";
$tdatapad_pad_reklame_mall[".advSearchFields"][] = "created";

$tdatapad_pad_reklame_mall[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_reklame_mall[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_reklame_mall[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_reklame_mall[".orderindexes"] = array();

$tdatapad_pad_reklame_mall[".sqlHead"] = "SELECT id,   nama,   alamat,   update_uid,   create_uid,   updated,   created";
$tdatapad_pad_reklame_mall[".sqlFrom"] = "FROM \"pad\".pad_reklame_mall";
$tdatapad_pad_reklame_mall[".sqlWhereExpr"] = "";
$tdatapad_pad_reklame_mall[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_reklame_mall[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_reklame_mall[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_reklame_mall = array();
$tableKeyspad_pad_reklame_mall[] = "id";
$tdatapad_pad_reklame_mall[".Keys"] = $tableKeyspad_pad_reklame_mall;

$tdatapad_pad_reklame_mall[".listFields"] = array();
$tdatapad_pad_reklame_mall[".listFields"][] = "id";
$tdatapad_pad_reklame_mall[".listFields"][] = "nama";
$tdatapad_pad_reklame_mall[".listFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".listFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".listFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".listFields"][] = "updated";
$tdatapad_pad_reklame_mall[".listFields"][] = "created";

$tdatapad_pad_reklame_mall[".viewFields"] = array();
$tdatapad_pad_reklame_mall[".viewFields"][] = "id";
$tdatapad_pad_reklame_mall[".viewFields"][] = "nama";
$tdatapad_pad_reklame_mall[".viewFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".viewFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".viewFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".viewFields"][] = "updated";
$tdatapad_pad_reklame_mall[".viewFields"][] = "created";

$tdatapad_pad_reklame_mall[".addFields"] = array();
$tdatapad_pad_reklame_mall[".addFields"][] = "nama";
$tdatapad_pad_reklame_mall[".addFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".addFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".addFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".addFields"][] = "updated";
$tdatapad_pad_reklame_mall[".addFields"][] = "created";

$tdatapad_pad_reklame_mall[".inlineAddFields"] = array();
$tdatapad_pad_reklame_mall[".inlineAddFields"][] = "nama";
$tdatapad_pad_reklame_mall[".inlineAddFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".inlineAddFields"][] = "updated";
$tdatapad_pad_reklame_mall[".inlineAddFields"][] = "created";

$tdatapad_pad_reklame_mall[".editFields"] = array();
$tdatapad_pad_reklame_mall[".editFields"][] = "nama";
$tdatapad_pad_reklame_mall[".editFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".editFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".editFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".editFields"][] = "updated";
$tdatapad_pad_reklame_mall[".editFields"][] = "created";

$tdatapad_pad_reklame_mall[".inlineEditFields"] = array();
$tdatapad_pad_reklame_mall[".inlineEditFields"][] = "nama";
$tdatapad_pad_reklame_mall[".inlineEditFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".inlineEditFields"][] = "updated";
$tdatapad_pad_reklame_mall[".inlineEditFields"][] = "created";

$tdatapad_pad_reklame_mall[".exportFields"] = array();
$tdatapad_pad_reklame_mall[".exportFields"][] = "id";
$tdatapad_pad_reklame_mall[".exportFields"][] = "nama";
$tdatapad_pad_reklame_mall[".exportFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".exportFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".exportFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".exportFields"][] = "updated";
$tdatapad_pad_reklame_mall[".exportFields"][] = "created";

$tdatapad_pad_reklame_mall[".printFields"] = array();
$tdatapad_pad_reklame_mall[".printFields"][] = "id";
$tdatapad_pad_reklame_mall[".printFields"][] = "nama";
$tdatapad_pad_reklame_mall[".printFields"][] = "alamat";
$tdatapad_pad_reklame_mall[".printFields"][] = "update_uid";
$tdatapad_pad_reklame_mall[".printFields"][] = "create_uid";
$tdatapad_pad_reklame_mall[".printFields"][] = "updated";
$tdatapad_pad_reklame_mall[".printFields"][] = "created";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_reklame_mall";
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
	
		
		
	$tdatapad_pad_reklame_mall["id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_reklame_mall";
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_reklame_mall["nama"] = $fdata;
//	alamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "alamat";
	$fdata["GoodName"] = "alamat";
	$fdata["ownerTable"] = "pad.pad_reklame_mall";
	$fdata["Label"] = "Alamat"; 
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
	
		$fdata["strField"] = "alamat"; 
		$fdata["FullName"] = "alamat";
	
		
		
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
	
		
		
	$tdatapad_pad_reklame_mall["alamat"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_mall";
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
	
		
		
	$tdatapad_pad_reklame_mall["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_reklame_mall";
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
	
		
		
	$tdatapad_pad_reklame_mall["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_reklame_mall";
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
	
		
		
	$tdatapad_pad_reklame_mall["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_reklame_mall";
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
	
		
		
	$tdatapad_pad_reklame_mall["created"] = $fdata;

	
$tables_data["pad.pad_reklame_mall"]=&$tdatapad_pad_reklame_mall;
$field_labels["pad_pad_reklame_mall"] = &$fieldLabelspad_pad_reklame_mall;
$fieldToolTips["pad.pad_reklame_mall"] = &$fieldToolTipspad_pad_reklame_mall;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_reklame_mall"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_reklame_mall"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_reklame_mall()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama,   alamat,   update_uid,   create_uid,   updated,   created";
$proto0["m_strFrom"] = "FROM \"pad\".pad_reklame_mall";
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
	"m_strTable" => "pad.pad_reklame_mall"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_reklame_mall"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat",
	"m_strTable" => "pad.pad_reklame_mall"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_reklame_mall"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_reklame_mall"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_reklame_mall"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_reklame_mall"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "pad.pad_reklame_mall";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "id";
$proto20["m_columns"][] = "nama";
$proto20["m_columns"][] = "alamat";
$proto20["m_columns"][] = "update_uid";
$proto20["m_columns"][] = "create_uid";
$proto20["m_columns"][] = "updated";
$proto20["m_columns"][] = "created";
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
$queryData_pad_pad_reklame_mall = createSqlQuery_pad_pad_reklame_mall();
							$tdatapad_pad_reklame_mall[".sqlquery"] = $queryData_pad_pad_reklame_mall;
	
if(isset($tdatapad_pad_reklame_mall["field2"])){
	$tdatapad_pad_reklame_mall["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_reklame_mall["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_reklame_mall["field2"]["LookupType"] = 4;
	$tdatapad_pad_reklame_mall["field2"]["LinkField"] = "email";
	$tdatapad_pad_reklame_mall["field2"]["DisplayField"] = "name";
	$tdatapad_pad_reklame_mall[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_reklame_mall"] = new eventsBase;
$tdatapad_pad_reklame_mall[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_reklame_mall");

?>