<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_air_manfaat = array();
	$tdatapad_pad_air_manfaat[".NumberOfChars"] = 80; 
	$tdatapad_pad_air_manfaat[".ShortName"] = "pad_pad_air_manfaat";
	$tdatapad_pad_air_manfaat[".OwnerID"] = "";
	$tdatapad_pad_air_manfaat[".OriginalTable"] = "pad.pad_air_manfaat";

//	field labels
$fieldLabelspad_pad_air_manfaat = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_air_manfaat["English"] = array();
	$fieldToolTipspad_pad_air_manfaat["English"] = array();
	$fieldLabelspad_pad_air_manfaat["English"]["id"] = "Id";
	$fieldToolTipspad_pad_air_manfaat["English"]["id"] = "";
	$fieldLabelspad_pad_air_manfaat["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_air_manfaat["English"]["nama"] = "";
	$fieldLabelspad_pad_air_manfaat["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_air_manfaat["English"]["update_uid"] = "";
	$fieldLabelspad_pad_air_manfaat["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_air_manfaat["English"]["create_uid"] = "";
	$fieldLabelspad_pad_air_manfaat["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_air_manfaat["English"]["updated"] = "";
	$fieldLabelspad_pad_air_manfaat["English"]["created"] = "Created";
	$fieldToolTipspad_pad_air_manfaat["English"]["created"] = "";
	if (count($fieldToolTipspad_pad_air_manfaat["English"]))
		$tdatapad_pad_air_manfaat[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_air_manfaat[".NCSearch"] = true;



$tdatapad_pad_air_manfaat[".shortTableName"] = "pad_pad_air_manfaat";
$tdatapad_pad_air_manfaat[".nSecOptions"] = 0;
$tdatapad_pad_air_manfaat[".recsPerRowList"] = 1;
$tdatapad_pad_air_manfaat[".mainTableOwnerID"] = "";
$tdatapad_pad_air_manfaat[".moveNext"] = 1;
$tdatapad_pad_air_manfaat[".nType"] = 0;

$tdatapad_pad_air_manfaat[".strOriginalTableName"] = "pad.pad_air_manfaat";




$tdatapad_pad_air_manfaat[".showAddInPopup"] = false;

$tdatapad_pad_air_manfaat[".showEditInPopup"] = false;

$tdatapad_pad_air_manfaat[".showViewInPopup"] = false;

$tdatapad_pad_air_manfaat[".fieldsForRegister"] = array();

$tdatapad_pad_air_manfaat[".listAjax"] = false;

	$tdatapad_pad_air_manfaat[".audit"] = false;

	$tdatapad_pad_air_manfaat[".locking"] = false;

$tdatapad_pad_air_manfaat[".listIcons"] = true;
$tdatapad_pad_air_manfaat[".edit"] = true;
$tdatapad_pad_air_manfaat[".inlineEdit"] = true;
$tdatapad_pad_air_manfaat[".inlineAdd"] = true;
$tdatapad_pad_air_manfaat[".view"] = true;



$tdatapad_pad_air_manfaat[".delete"] = true;

$tdatapad_pad_air_manfaat[".showSimpleSearchOptions"] = false;

$tdatapad_pad_air_manfaat[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_air_manfaat[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_air_manfaat[".isUseAjaxSuggest"] = true;

$tdatapad_pad_air_manfaat[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_air_manfaat[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_air_manfaat[".isUseTimeForSearch"] = false;



$tdatapad_pad_air_manfaat[".useDetailsPreview"] = true;

$tdatapad_pad_air_manfaat[".allSearchFields"] = array();

$tdatapad_pad_air_manfaat[".allSearchFields"][] = "id";
$tdatapad_pad_air_manfaat[".allSearchFields"][] = "nama";
$tdatapad_pad_air_manfaat[".allSearchFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".allSearchFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".allSearchFields"][] = "updated";
$tdatapad_pad_air_manfaat[".allSearchFields"][] = "created";

$tdatapad_pad_air_manfaat[".googleLikeFields"][] = "id";
$tdatapad_pad_air_manfaat[".googleLikeFields"][] = "nama";
$tdatapad_pad_air_manfaat[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".googleLikeFields"][] = "updated";
$tdatapad_pad_air_manfaat[".googleLikeFields"][] = "created";


$tdatapad_pad_air_manfaat[".advSearchFields"][] = "id";
$tdatapad_pad_air_manfaat[".advSearchFields"][] = "nama";
$tdatapad_pad_air_manfaat[".advSearchFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".advSearchFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".advSearchFields"][] = "updated";
$tdatapad_pad_air_manfaat[".advSearchFields"][] = "created";

$tdatapad_pad_air_manfaat[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdatapad_pad_air_manfaat[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_air_manfaat[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_air_manfaat[".orderindexes"] = array();

$tdatapad_pad_air_manfaat[".sqlHead"] = "SELECT id,   nama,   update_uid,   create_uid,   updated,   created";
$tdatapad_pad_air_manfaat[".sqlFrom"] = "FROM \"pad\".pad_air_manfaat";
$tdatapad_pad_air_manfaat[".sqlWhereExpr"] = "";
$tdatapad_pad_air_manfaat[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_air_manfaat[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_air_manfaat[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_air_manfaat = array();
$tableKeyspad_pad_air_manfaat[] = "id";
$tdatapad_pad_air_manfaat[".Keys"] = $tableKeyspad_pad_air_manfaat;

$tdatapad_pad_air_manfaat[".listFields"] = array();
$tdatapad_pad_air_manfaat[".listFields"][] = "id";
$tdatapad_pad_air_manfaat[".listFields"][] = "nama";
$tdatapad_pad_air_manfaat[".listFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".listFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".listFields"][] = "updated";
$tdatapad_pad_air_manfaat[".listFields"][] = "created";

$tdatapad_pad_air_manfaat[".viewFields"] = array();
$tdatapad_pad_air_manfaat[".viewFields"][] = "id";
$tdatapad_pad_air_manfaat[".viewFields"][] = "nama";
$tdatapad_pad_air_manfaat[".viewFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".viewFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".viewFields"][] = "updated";
$tdatapad_pad_air_manfaat[".viewFields"][] = "created";

$tdatapad_pad_air_manfaat[".addFields"] = array();
$tdatapad_pad_air_manfaat[".addFields"][] = "nama";
$tdatapad_pad_air_manfaat[".addFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".addFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".addFields"][] = "updated";
$tdatapad_pad_air_manfaat[".addFields"][] = "created";

$tdatapad_pad_air_manfaat[".inlineAddFields"] = array();
$tdatapad_pad_air_manfaat[".inlineAddFields"][] = "nama";
$tdatapad_pad_air_manfaat[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".inlineAddFields"][] = "updated";
$tdatapad_pad_air_manfaat[".inlineAddFields"][] = "created";

$tdatapad_pad_air_manfaat[".editFields"] = array();
$tdatapad_pad_air_manfaat[".editFields"][] = "nama";
$tdatapad_pad_air_manfaat[".editFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".editFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".editFields"][] = "updated";
$tdatapad_pad_air_manfaat[".editFields"][] = "created";

$tdatapad_pad_air_manfaat[".inlineEditFields"] = array();
$tdatapad_pad_air_manfaat[".inlineEditFields"][] = "nama";
$tdatapad_pad_air_manfaat[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".inlineEditFields"][] = "updated";
$tdatapad_pad_air_manfaat[".inlineEditFields"][] = "created";

$tdatapad_pad_air_manfaat[".exportFields"] = array();
$tdatapad_pad_air_manfaat[".exportFields"][] = "id";
$tdatapad_pad_air_manfaat[".exportFields"][] = "nama";
$tdatapad_pad_air_manfaat[".exportFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".exportFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".exportFields"][] = "updated";
$tdatapad_pad_air_manfaat[".exportFields"][] = "created";

$tdatapad_pad_air_manfaat[".printFields"] = array();
$tdatapad_pad_air_manfaat[".printFields"][] = "id";
$tdatapad_pad_air_manfaat[".printFields"][] = "nama";
$tdatapad_pad_air_manfaat[".printFields"][] = "update_uid";
$tdatapad_pad_air_manfaat[".printFields"][] = "create_uid";
$tdatapad_pad_air_manfaat[".printFields"][] = "updated";
$tdatapad_pad_air_manfaat[".printFields"][] = "created";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_air_manfaat";
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
	
		
		
	$tdatapad_pad_air_manfaat["id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_air_manfaat";
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
			$edata["EditParams"].= " maxlength=108";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_air_manfaat["nama"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_air_manfaat";
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
	
		
		
	$tdatapad_pad_air_manfaat["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_air_manfaat";
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
	
		
		
	$tdatapad_pad_air_manfaat["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_air_manfaat";
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
	
		
		
	$tdatapad_pad_air_manfaat["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_air_manfaat";
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
	
		
		
	$tdatapad_pad_air_manfaat["created"] = $fdata;

	
$tables_data["pad.pad_air_manfaat"]=&$tdatapad_pad_air_manfaat;
$field_labels["pad_pad_air_manfaat"] = &$fieldLabelspad_pad_air_manfaat;
$fieldToolTips["pad.pad_air_manfaat"] = &$fieldToolTipspad_pad_air_manfaat;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_air_manfaat"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_air_hda";
	$detailsParam["dDataSourceTable"]="pad.pad_air_hda";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_air_hda";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_air_manfaat"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_air_manfaat"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_air_manfaat"][$dIndex]["detailKeys"][]="manfaat_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_air_manfaat"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_air_manfaat()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama,   update_uid,   create_uid,   updated,   created";
$proto0["m_strFrom"] = "FROM \"pad\".pad_air_manfaat";
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
	"m_strTable" => "pad.pad_air_manfaat"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_air_manfaat"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_air_manfaat"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_air_manfaat"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_air_manfaat"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_air_manfaat"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto17=array();
$proto17["m_link"] = "SQLL_MAIN";
			$proto18=array();
$proto18["m_strName"] = "pad.pad_air_manfaat";
$proto18["m_columns"] = array();
$proto18["m_columns"][] = "id";
$proto18["m_columns"][] = "nama";
$proto18["m_columns"][] = "update_uid";
$proto18["m_columns"][] = "create_uid";
$proto18["m_columns"][] = "updated";
$proto18["m_columns"][] = "created";
$obj = new SQLTable($proto18);

$proto17["m_table"] = $obj;
$proto17["m_alias"] = "";
$proto19=array();
$proto19["m_sql"] = "";
$proto19["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto19["m_column"]=$obj;
$proto19["m_contained"] = array();
$proto19["m_strCase"] = "";
$proto19["m_havingmode"] = "0";
$proto19["m_inBrackets"] = "0";
$proto19["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto19);

$proto17["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto17);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_air_manfaat = createSqlQuery_pad_pad_air_manfaat();
						$tdatapad_pad_air_manfaat[".sqlquery"] = $queryData_pad_pad_air_manfaat;
	
if(isset($tdatapad_pad_air_manfaat["field2"])){
	$tdatapad_pad_air_manfaat["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_air_manfaat["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_air_manfaat["field2"]["LookupType"] = 4;
	$tdatapad_pad_air_manfaat["field2"]["LinkField"] = "email";
	$tdatapad_pad_air_manfaat["field2"]["DisplayField"] = "name";
	$tdatapad_pad_air_manfaat[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_air_manfaat"] = new eventsBase;
$tdatapad_pad_air_manfaat[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_air_manfaat");

?>