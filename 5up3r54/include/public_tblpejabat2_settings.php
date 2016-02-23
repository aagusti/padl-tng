<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_tblpejabat2 = array();
	$tdatapublic_tblpejabat2[".NumberOfChars"] = 80; 
	$tdatapublic_tblpejabat2[".ShortName"] = "public_tblpejabat2";
	$tdatapublic_tblpejabat2[".OwnerID"] = "";
	$tdatapublic_tblpejabat2[".OriginalTable"] = "public.tblpejabat2";

//	field labels
$fieldLabelspublic_tblpejabat2 = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_tblpejabat2["English"] = array();
	$fieldToolTipspublic_tblpejabat2["English"] = array();
	$fieldLabelspublic_tblpejabat2["English"]["id2"] = "Id2";
	$fieldToolTipspublic_tblpejabat2["English"]["id2"] = "";
	$fieldLabelspublic_tblpejabat2["English"]["nip2"] = "Nip2";
	$fieldToolTipspublic_tblpejabat2["English"]["nip2"] = "";
	$fieldLabelspublic_tblpejabat2["English"]["pejabatnm2"] = "Pejabatnm2";
	$fieldToolTipspublic_tblpejabat2["English"]["pejabatnm2"] = "";
	$fieldLabelspublic_tblpejabat2["English"]["jabatan2"] = "Jabatan2";
	$fieldToolTipspublic_tblpejabat2["English"]["jabatan2"] = "";
	$fieldLabelspublic_tblpejabat2["English"]["golongan2"] = "Golongan2";
	$fieldToolTipspublic_tblpejabat2["English"]["golongan2"] = "";
	$fieldLabelspublic_tblpejabat2["English"]["pangkat2"] = "Pangkat2";
	$fieldToolTipspublic_tblpejabat2["English"]["pangkat2"] = "";
	$fieldLabelspublic_tblpejabat2["English"]["tmt2"] = "Tmt2";
	$fieldToolTipspublic_tblpejabat2["English"]["tmt2"] = "";
	$fieldLabelspublic_tblpejabat2["English"]["enabled2"] = "Enabled2";
	$fieldToolTipspublic_tblpejabat2["English"]["enabled2"] = "";
	if (count($fieldToolTipspublic_tblpejabat2["English"]))
		$tdatapublic_tblpejabat2[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_tblpejabat2[".NCSearch"] = true;



$tdatapublic_tblpejabat2[".shortTableName"] = "public_tblpejabat2";
$tdatapublic_tblpejabat2[".nSecOptions"] = 0;
$tdatapublic_tblpejabat2[".recsPerRowList"] = 1;
$tdatapublic_tblpejabat2[".mainTableOwnerID"] = "";
$tdatapublic_tblpejabat2[".moveNext"] = 1;
$tdatapublic_tblpejabat2[".nType"] = 0;

$tdatapublic_tblpejabat2[".strOriginalTableName"] = "public.tblpejabat2";




$tdatapublic_tblpejabat2[".showAddInPopup"] = false;

$tdatapublic_tblpejabat2[".showEditInPopup"] = false;

$tdatapublic_tblpejabat2[".showViewInPopup"] = false;

$tdatapublic_tblpejabat2[".fieldsForRegister"] = array();

$tdatapublic_tblpejabat2[".listAjax"] = false;

	$tdatapublic_tblpejabat2[".audit"] = false;

	$tdatapublic_tblpejabat2[".locking"] = false;

$tdatapublic_tblpejabat2[".listIcons"] = true;

$tdatapublic_tblpejabat2[".exportTo"] = true;

$tdatapublic_tblpejabat2[".printFriendly"] = true;


$tdatapublic_tblpejabat2[".showSimpleSearchOptions"] = false;

$tdatapublic_tblpejabat2[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_tblpejabat2[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_tblpejabat2[".isUseAjaxSuggest"] = true;

$tdatapublic_tblpejabat2[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_tblpejabat2[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_tblpejabat2[".isUseTimeForSearch"] = false;




$tdatapublic_tblpejabat2[".allSearchFields"] = array();

$tdatapublic_tblpejabat2[".allSearchFields"][] = "id2";
$tdatapublic_tblpejabat2[".allSearchFields"][] = "nip2";
$tdatapublic_tblpejabat2[".allSearchFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".allSearchFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".allSearchFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".allSearchFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".allSearchFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".allSearchFields"][] = "enabled2";

$tdatapublic_tblpejabat2[".googleLikeFields"][] = "id2";
$tdatapublic_tblpejabat2[".googleLikeFields"][] = "nip2";
$tdatapublic_tblpejabat2[".googleLikeFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".googleLikeFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".googleLikeFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".googleLikeFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".googleLikeFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".googleLikeFields"][] = "enabled2";


$tdatapublic_tblpejabat2[".advSearchFields"][] = "id2";
$tdatapublic_tblpejabat2[".advSearchFields"][] = "nip2";
$tdatapublic_tblpejabat2[".advSearchFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".advSearchFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".advSearchFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".advSearchFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".advSearchFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".advSearchFields"][] = "enabled2";

$tdatapublic_tblpejabat2[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_tblpejabat2[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_tblpejabat2[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_tblpejabat2[".orderindexes"] = array();

$tdatapublic_tblpejabat2[".sqlHead"] = "SELECT id2,   nip2,   pejabatnm2,   jabatan2,   golongan2,   pangkat2,   tmt2,   enabled2";
$tdatapublic_tblpejabat2[".sqlFrom"] = "FROM \"public\".tblpejabat2";
$tdatapublic_tblpejabat2[".sqlWhereExpr"] = "";
$tdatapublic_tblpejabat2[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_tblpejabat2[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_tblpejabat2[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_tblpejabat2 = array();
$tdatapublic_tblpejabat2[".Keys"] = $tableKeyspublic_tblpejabat2;

$tdatapublic_tblpejabat2[".listFields"] = array();
$tdatapublic_tblpejabat2[".listFields"][] = "id2";
$tdatapublic_tblpejabat2[".listFields"][] = "nip2";
$tdatapublic_tblpejabat2[".listFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".listFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".listFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".listFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".listFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".listFields"][] = "enabled2";

$tdatapublic_tblpejabat2[".viewFields"] = array();
$tdatapublic_tblpejabat2[".viewFields"][] = "id2";
$tdatapublic_tblpejabat2[".viewFields"][] = "nip2";
$tdatapublic_tblpejabat2[".viewFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".viewFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".viewFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".viewFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".viewFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".viewFields"][] = "enabled2";

$tdatapublic_tblpejabat2[".addFields"] = array();
$tdatapublic_tblpejabat2[".addFields"][] = "id2";
$tdatapublic_tblpejabat2[".addFields"][] = "nip2";
$tdatapublic_tblpejabat2[".addFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".addFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".addFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".addFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".addFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".addFields"][] = "enabled2";

$tdatapublic_tblpejabat2[".inlineAddFields"] = array();
$tdatapublic_tblpejabat2[".inlineAddFields"][] = "id2";
$tdatapublic_tblpejabat2[".inlineAddFields"][] = "nip2";
$tdatapublic_tblpejabat2[".inlineAddFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".inlineAddFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".inlineAddFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".inlineAddFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".inlineAddFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".inlineAddFields"][] = "enabled2";

$tdatapublic_tblpejabat2[".editFields"] = array();
$tdatapublic_tblpejabat2[".editFields"][] = "id2";
$tdatapublic_tblpejabat2[".editFields"][] = "nip2";
$tdatapublic_tblpejabat2[".editFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".editFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".editFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".editFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".editFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".editFields"][] = "enabled2";

$tdatapublic_tblpejabat2[".inlineEditFields"] = array();
$tdatapublic_tblpejabat2[".inlineEditFields"][] = "id2";
$tdatapublic_tblpejabat2[".inlineEditFields"][] = "nip2";
$tdatapublic_tblpejabat2[".inlineEditFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".inlineEditFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".inlineEditFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".inlineEditFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".inlineEditFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".inlineEditFields"][] = "enabled2";

$tdatapublic_tblpejabat2[".exportFields"] = array();
$tdatapublic_tblpejabat2[".exportFields"][] = "id2";
$tdatapublic_tblpejabat2[".exportFields"][] = "nip2";
$tdatapublic_tblpejabat2[".exportFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".exportFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".exportFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".exportFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".exportFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".exportFields"][] = "enabled2";

$tdatapublic_tblpejabat2[".printFields"] = array();
$tdatapublic_tblpejabat2[".printFields"][] = "id2";
$tdatapublic_tblpejabat2[".printFields"][] = "nip2";
$tdatapublic_tblpejabat2[".printFields"][] = "pejabatnm2";
$tdatapublic_tblpejabat2[".printFields"][] = "jabatan2";
$tdatapublic_tblpejabat2[".printFields"][] = "golongan2";
$tdatapublic_tblpejabat2[".printFields"][] = "pangkat2";
$tdatapublic_tblpejabat2[".printFields"][] = "tmt2";
$tdatapublic_tblpejabat2[".printFields"][] = "enabled2";

//	id2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id2";
	$fdata["GoodName"] = "id2";
	$fdata["ownerTable"] = "public.tblpejabat2";
	$fdata["Label"] = "Id2"; 
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
	
		$fdata["strField"] = "id2"; 
		$fdata["FullName"] = "id2";
	
		
		
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
	
		
		
	$tdatapublic_tblpejabat2["id2"] = $fdata;
//	nip2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nip2";
	$fdata["GoodName"] = "nip2";
	$fdata["ownerTable"] = "public.tblpejabat2";
	$fdata["Label"] = "Nip2"; 
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
	
		$fdata["strField"] = "nip2"; 
		$fdata["FullName"] = "nip2";
	
		
		
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
	
		
		
	$tdatapublic_tblpejabat2["nip2"] = $fdata;
//	pejabatnm2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "pejabatnm2";
	$fdata["GoodName"] = "pejabatnm2";
	$fdata["ownerTable"] = "public.tblpejabat2";
	$fdata["Label"] = "Pejabatnm2"; 
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
	
		$fdata["strField"] = "pejabatnm2"; 
		$fdata["FullName"] = "pejabatnm2";
	
		
		
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
	
		
		
	$tdatapublic_tblpejabat2["pejabatnm2"] = $fdata;
//	jabatan2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "jabatan2";
	$fdata["GoodName"] = "jabatan2";
	$fdata["ownerTable"] = "public.tblpejabat2";
	$fdata["Label"] = "Jabatan2"; 
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
	
		$fdata["strField"] = "jabatan2"; 
		$fdata["FullName"] = "jabatan2";
	
		
		
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
	
		
		
	$tdatapublic_tblpejabat2["jabatan2"] = $fdata;
//	golongan2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "golongan2";
	$fdata["GoodName"] = "golongan2";
	$fdata["ownerTable"] = "public.tblpejabat2";
	$fdata["Label"] = "Golongan2"; 
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
	
		$fdata["strField"] = "golongan2"; 
		$fdata["FullName"] = "golongan2";
	
		
		
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
	
		
		
	$tdatapublic_tblpejabat2["golongan2"] = $fdata;
//	pangkat2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "pangkat2";
	$fdata["GoodName"] = "pangkat2";
	$fdata["ownerTable"] = "public.tblpejabat2";
	$fdata["Label"] = "Pangkat2"; 
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
	
		$fdata["strField"] = "pangkat2"; 
		$fdata["FullName"] = "pangkat2";
	
		
		
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
	
		
		
	$tdatapublic_tblpejabat2["pangkat2"] = $fdata;
//	tmt2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "tmt2";
	$fdata["GoodName"] = "tmt2";
	$fdata["ownerTable"] = "public.tblpejabat2";
	$fdata["Label"] = "Tmt2"; 
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
	
		$fdata["strField"] = "tmt2"; 
		$fdata["FullName"] = "tmt2";
	
		
		
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
	
		
		
	$tdatapublic_tblpejabat2["tmt2"] = $fdata;
//	enabled2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "enabled2";
	$fdata["GoodName"] = "enabled2";
	$fdata["ownerTable"] = "public.tblpejabat2";
	$fdata["Label"] = "Enabled2"; 
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
	
		$fdata["strField"] = "enabled2"; 
		$fdata["FullName"] = "enabled2";
	
		
		
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
	
		
		
	$tdatapublic_tblpejabat2["enabled2"] = $fdata;

	
$tables_data["public.tblpejabat2"]=&$tdatapublic_tblpejabat2;
$field_labels["public_tblpejabat2"] = &$fieldLabelspublic_tblpejabat2;
$fieldToolTips["public.tblpejabat2"] = &$fieldToolTipspublic_tblpejabat2;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.tblpejabat2"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.tblpejabat2"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_tblpejabat2()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id2,   nip2,   pejabatnm2,   jabatan2,   golongan2,   pangkat2,   tmt2,   enabled2";
$proto0["m_strFrom"] = "FROM \"public\".tblpejabat2";
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
	"m_strName" => "id2",
	"m_strTable" => "public.tblpejabat2"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nip2",
	"m_strTable" => "public.tblpejabat2"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "pejabatnm2",
	"m_strTable" => "public.tblpejabat2"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "jabatan2",
	"m_strTable" => "public.tblpejabat2"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "golongan2",
	"m_strTable" => "public.tblpejabat2"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "pangkat2",
	"m_strTable" => "public.tblpejabat2"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt2",
	"m_strTable" => "public.tblpejabat2"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled2",
	"m_strTable" => "public.tblpejabat2"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto21=array();
$proto21["m_link"] = "SQLL_MAIN";
			$proto22=array();
$proto22["m_strName"] = "public.tblpejabat2";
$proto22["m_columns"] = array();
$proto22["m_columns"][] = "id2";
$proto22["m_columns"][] = "nip2";
$proto22["m_columns"][] = "pejabatnm2";
$proto22["m_columns"][] = "jabatan2";
$proto22["m_columns"][] = "golongan2";
$proto22["m_columns"][] = "pangkat2";
$proto22["m_columns"][] = "tmt2";
$proto22["m_columns"][] = "enabled2";
$obj = new SQLTable($proto22);

$proto21["m_table"] = $obj;
$proto21["m_alias"] = "";
$proto23=array();
$proto23["m_sql"] = "";
$proto23["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto23["m_column"]=$obj;
$proto23["m_contained"] = array();
$proto23["m_strCase"] = "";
$proto23["m_havingmode"] = "0";
$proto23["m_inBrackets"] = "0";
$proto23["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto23);

$proto21["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto21);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_public_tblpejabat2 = createSqlQuery_public_tblpejabat2();
								$tdatapublic_tblpejabat2[".sqlquery"] = $queryData_public_tblpejabat2;
	
if(isset($tdatapublic_tblpejabat2["field2"])){
	$tdatapublic_tblpejabat2["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_tblpejabat2["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_tblpejabat2["field2"]["LookupType"] = 4;
	$tdatapublic_tblpejabat2["field2"]["LinkField"] = "email";
	$tdatapublic_tblpejabat2["field2"]["DisplayField"] = "name";
	$tdatapublic_tblpejabat2[".hasCustomViewField"] = true;
}

$tableEvents["public.tblpejabat2"] = new eventsBase;
$tdatapublic_tblpejabat2[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.tblpejabat2");

?>