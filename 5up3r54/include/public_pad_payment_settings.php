<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_pad_payment = array();
	$tdatapublic_pad_payment[".NumberOfChars"] = 80; 
	$tdatapublic_pad_payment[".ShortName"] = "public_pad_payment";
	$tdatapublic_pad_payment[".OwnerID"] = "";
	$tdatapublic_pad_payment[".OriginalTable"] = "public.pad_payment";

//	field labels
$fieldLabelspublic_pad_payment = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_pad_payment["English"] = array();
	$fieldToolTipspublic_pad_payment["English"] = array();
	$fieldLabelspublic_pad_payment["English"]["id"] = "Id";
	$fieldToolTipspublic_pad_payment["English"]["id"] = "";
	$fieldLabelspublic_pad_payment["English"]["invoice_id"] = "Invoice Id";
	$fieldToolTipspublic_pad_payment["English"]["invoice_id"] = "";
	$fieldLabelspublic_pad_payment["English"]["tgl"] = "Tgl";
	$fieldToolTipspublic_pad_payment["English"]["tgl"] = "";
	$fieldLabelspublic_pad_payment["English"]["tagihan"] = "Tagihan";
	$fieldToolTipspublic_pad_payment["English"]["tagihan"] = "";
	$fieldLabelspublic_pad_payment["English"]["denda"] = "Denda";
	$fieldToolTipspublic_pad_payment["English"]["denda"] = "";
	$fieldLabelspublic_pad_payment["English"]["total_bayar"] = "Total Bayar";
	$fieldToolTipspublic_pad_payment["English"]["total_bayar"] = "";
	$fieldLabelspublic_pad_payment["English"]["iso_request"] = "Iso Request";
	$fieldToolTipspublic_pad_payment["English"]["iso_request"] = "";
	$fieldLabelspublic_pad_payment["English"]["transmission"] = "Transmission";
	$fieldToolTipspublic_pad_payment["English"]["transmission"] = "";
	$fieldLabelspublic_pad_payment["English"]["settlement"] = "Settlement";
	$fieldToolTipspublic_pad_payment["English"]["settlement"] = "";
	$fieldLabelspublic_pad_payment["English"]["stan"] = "Stan";
	$fieldToolTipspublic_pad_payment["English"]["stan"] = "";
	$fieldLabelspublic_pad_payment["English"]["ntb"] = "Ntb";
	$fieldToolTipspublic_pad_payment["English"]["ntb"] = "";
	$fieldLabelspublic_pad_payment["English"]["ntp"] = "Ntp";
	$fieldToolTipspublic_pad_payment["English"]["ntp"] = "";
	$fieldLabelspublic_pad_payment["English"]["bank_id"] = "Bank Id";
	$fieldToolTipspublic_pad_payment["English"]["bank_id"] = "";
	$fieldLabelspublic_pad_payment["English"]["channel_id"] = "Channel Id";
	$fieldToolTipspublic_pad_payment["English"]["channel_id"] = "";
	$fieldLabelspublic_pad_payment["English"]["bank_ip"] = "Bank Ip";
	$fieldToolTipspublic_pad_payment["English"]["bank_ip"] = "";
	if (count($fieldToolTipspublic_pad_payment["English"]))
		$tdatapublic_pad_payment[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_pad_payment[".NCSearch"] = true;



$tdatapublic_pad_payment[".shortTableName"] = "public_pad_payment";
$tdatapublic_pad_payment[".nSecOptions"] = 0;
$tdatapublic_pad_payment[".recsPerRowList"] = 1;
$tdatapublic_pad_payment[".mainTableOwnerID"] = "";
$tdatapublic_pad_payment[".moveNext"] = 1;
$tdatapublic_pad_payment[".nType"] = 0;

$tdatapublic_pad_payment[".strOriginalTableName"] = "public.pad_payment";




$tdatapublic_pad_payment[".showAddInPopup"] = false;

$tdatapublic_pad_payment[".showEditInPopup"] = false;

$tdatapublic_pad_payment[".showViewInPopup"] = false;

$tdatapublic_pad_payment[".fieldsForRegister"] = array();

$tdatapublic_pad_payment[".listAjax"] = false;

	$tdatapublic_pad_payment[".audit"] = false;

	$tdatapublic_pad_payment[".locking"] = false;

$tdatapublic_pad_payment[".listIcons"] = true;
$tdatapublic_pad_payment[".edit"] = true;
$tdatapublic_pad_payment[".inlineEdit"] = true;
$tdatapublic_pad_payment[".inlineAdd"] = true;
$tdatapublic_pad_payment[".view"] = true;

$tdatapublic_pad_payment[".exportTo"] = true;

$tdatapublic_pad_payment[".printFriendly"] = true;

$tdatapublic_pad_payment[".delete"] = true;

$tdatapublic_pad_payment[".showSimpleSearchOptions"] = false;

$tdatapublic_pad_payment[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_pad_payment[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_pad_payment[".isUseAjaxSuggest"] = true;

$tdatapublic_pad_payment[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_pad_payment[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_pad_payment[".isUseTimeForSearch"] = false;




$tdatapublic_pad_payment[".allSearchFields"] = array();

$tdatapublic_pad_payment[".allSearchFields"][] = "id";
$tdatapublic_pad_payment[".allSearchFields"][] = "invoice_id";
$tdatapublic_pad_payment[".allSearchFields"][] = "tgl";
$tdatapublic_pad_payment[".allSearchFields"][] = "tagihan";
$tdatapublic_pad_payment[".allSearchFields"][] = "denda";
$tdatapublic_pad_payment[".allSearchFields"][] = "total_bayar";
$tdatapublic_pad_payment[".allSearchFields"][] = "iso_request";
$tdatapublic_pad_payment[".allSearchFields"][] = "transmission";
$tdatapublic_pad_payment[".allSearchFields"][] = "settlement";
$tdatapublic_pad_payment[".allSearchFields"][] = "stan";
$tdatapublic_pad_payment[".allSearchFields"][] = "ntb";
$tdatapublic_pad_payment[".allSearchFields"][] = "ntp";
$tdatapublic_pad_payment[".allSearchFields"][] = "bank_id";
$tdatapublic_pad_payment[".allSearchFields"][] = "channel_id";
$tdatapublic_pad_payment[".allSearchFields"][] = "bank_ip";

$tdatapublic_pad_payment[".googleLikeFields"][] = "id";
$tdatapublic_pad_payment[".googleLikeFields"][] = "invoice_id";
$tdatapublic_pad_payment[".googleLikeFields"][] = "tgl";
$tdatapublic_pad_payment[".googleLikeFields"][] = "tagihan";
$tdatapublic_pad_payment[".googleLikeFields"][] = "denda";
$tdatapublic_pad_payment[".googleLikeFields"][] = "total_bayar";
$tdatapublic_pad_payment[".googleLikeFields"][] = "iso_request";
$tdatapublic_pad_payment[".googleLikeFields"][] = "transmission";
$tdatapublic_pad_payment[".googleLikeFields"][] = "settlement";
$tdatapublic_pad_payment[".googleLikeFields"][] = "stan";
$tdatapublic_pad_payment[".googleLikeFields"][] = "ntb";
$tdatapublic_pad_payment[".googleLikeFields"][] = "ntp";
$tdatapublic_pad_payment[".googleLikeFields"][] = "bank_id";
$tdatapublic_pad_payment[".googleLikeFields"][] = "channel_id";
$tdatapublic_pad_payment[".googleLikeFields"][] = "bank_ip";


$tdatapublic_pad_payment[".advSearchFields"][] = "id";
$tdatapublic_pad_payment[".advSearchFields"][] = "invoice_id";
$tdatapublic_pad_payment[".advSearchFields"][] = "tgl";
$tdatapublic_pad_payment[".advSearchFields"][] = "tagihan";
$tdatapublic_pad_payment[".advSearchFields"][] = "denda";
$tdatapublic_pad_payment[".advSearchFields"][] = "total_bayar";
$tdatapublic_pad_payment[".advSearchFields"][] = "iso_request";
$tdatapublic_pad_payment[".advSearchFields"][] = "transmission";
$tdatapublic_pad_payment[".advSearchFields"][] = "settlement";
$tdatapublic_pad_payment[".advSearchFields"][] = "stan";
$tdatapublic_pad_payment[".advSearchFields"][] = "ntb";
$tdatapublic_pad_payment[".advSearchFields"][] = "ntp";
$tdatapublic_pad_payment[".advSearchFields"][] = "bank_id";
$tdatapublic_pad_payment[".advSearchFields"][] = "channel_id";
$tdatapublic_pad_payment[".advSearchFields"][] = "bank_ip";

$tdatapublic_pad_payment[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_pad_payment[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_pad_payment[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_pad_payment[".orderindexes"] = array();

$tdatapublic_pad_payment[".sqlHead"] = "SELECT id,   invoice_id,   tgl,   tagihan,   denda,   total_bayar,   iso_request,   transmission,   settlement,   stan,   ntb,   ntp,   bank_id,   channel_id,   bank_ip";
$tdatapublic_pad_payment[".sqlFrom"] = "FROM \"public\".pad_payment";
$tdatapublic_pad_payment[".sqlWhereExpr"] = "";
$tdatapublic_pad_payment[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_pad_payment[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_pad_payment[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_pad_payment = array();
$tableKeyspublic_pad_payment[] = "id";
$tdatapublic_pad_payment[".Keys"] = $tableKeyspublic_pad_payment;

$tdatapublic_pad_payment[".listFields"] = array();
$tdatapublic_pad_payment[".listFields"][] = "id";
$tdatapublic_pad_payment[".listFields"][] = "invoice_id";
$tdatapublic_pad_payment[".listFields"][] = "tgl";
$tdatapublic_pad_payment[".listFields"][] = "tagihan";
$tdatapublic_pad_payment[".listFields"][] = "denda";
$tdatapublic_pad_payment[".listFields"][] = "total_bayar";
$tdatapublic_pad_payment[".listFields"][] = "iso_request";
$tdatapublic_pad_payment[".listFields"][] = "transmission";
$tdatapublic_pad_payment[".listFields"][] = "settlement";
$tdatapublic_pad_payment[".listFields"][] = "stan";
$tdatapublic_pad_payment[".listFields"][] = "ntb";
$tdatapublic_pad_payment[".listFields"][] = "ntp";
$tdatapublic_pad_payment[".listFields"][] = "bank_id";
$tdatapublic_pad_payment[".listFields"][] = "channel_id";
$tdatapublic_pad_payment[".listFields"][] = "bank_ip";

$tdatapublic_pad_payment[".viewFields"] = array();
$tdatapublic_pad_payment[".viewFields"][] = "id";
$tdatapublic_pad_payment[".viewFields"][] = "invoice_id";
$tdatapublic_pad_payment[".viewFields"][] = "tgl";
$tdatapublic_pad_payment[".viewFields"][] = "tagihan";
$tdatapublic_pad_payment[".viewFields"][] = "denda";
$tdatapublic_pad_payment[".viewFields"][] = "total_bayar";
$tdatapublic_pad_payment[".viewFields"][] = "iso_request";
$tdatapublic_pad_payment[".viewFields"][] = "transmission";
$tdatapublic_pad_payment[".viewFields"][] = "settlement";
$tdatapublic_pad_payment[".viewFields"][] = "stan";
$tdatapublic_pad_payment[".viewFields"][] = "ntb";
$tdatapublic_pad_payment[".viewFields"][] = "ntp";
$tdatapublic_pad_payment[".viewFields"][] = "bank_id";
$tdatapublic_pad_payment[".viewFields"][] = "channel_id";
$tdatapublic_pad_payment[".viewFields"][] = "bank_ip";

$tdatapublic_pad_payment[".addFields"] = array();
$tdatapublic_pad_payment[".addFields"][] = "id";
$tdatapublic_pad_payment[".addFields"][] = "invoice_id";
$tdatapublic_pad_payment[".addFields"][] = "tgl";
$tdatapublic_pad_payment[".addFields"][] = "tagihan";
$tdatapublic_pad_payment[".addFields"][] = "denda";
$tdatapublic_pad_payment[".addFields"][] = "total_bayar";
$tdatapublic_pad_payment[".addFields"][] = "iso_request";
$tdatapublic_pad_payment[".addFields"][] = "transmission";
$tdatapublic_pad_payment[".addFields"][] = "settlement";
$tdatapublic_pad_payment[".addFields"][] = "stan";
$tdatapublic_pad_payment[".addFields"][] = "ntb";
$tdatapublic_pad_payment[".addFields"][] = "ntp";
$tdatapublic_pad_payment[".addFields"][] = "bank_id";
$tdatapublic_pad_payment[".addFields"][] = "channel_id";
$tdatapublic_pad_payment[".addFields"][] = "bank_ip";

$tdatapublic_pad_payment[".inlineAddFields"] = array();
$tdatapublic_pad_payment[".inlineAddFields"][] = "id";
$tdatapublic_pad_payment[".inlineAddFields"][] = "invoice_id";
$tdatapublic_pad_payment[".inlineAddFields"][] = "tgl";
$tdatapublic_pad_payment[".inlineAddFields"][] = "tagihan";
$tdatapublic_pad_payment[".inlineAddFields"][] = "denda";
$tdatapublic_pad_payment[".inlineAddFields"][] = "total_bayar";
$tdatapublic_pad_payment[".inlineAddFields"][] = "iso_request";
$tdatapublic_pad_payment[".inlineAddFields"][] = "transmission";
$tdatapublic_pad_payment[".inlineAddFields"][] = "settlement";
$tdatapublic_pad_payment[".inlineAddFields"][] = "stan";
$tdatapublic_pad_payment[".inlineAddFields"][] = "ntb";
$tdatapublic_pad_payment[".inlineAddFields"][] = "ntp";
$tdatapublic_pad_payment[".inlineAddFields"][] = "bank_id";
$tdatapublic_pad_payment[".inlineAddFields"][] = "channel_id";
$tdatapublic_pad_payment[".inlineAddFields"][] = "bank_ip";

$tdatapublic_pad_payment[".editFields"] = array();
$tdatapublic_pad_payment[".editFields"][] = "id";
$tdatapublic_pad_payment[".editFields"][] = "invoice_id";
$tdatapublic_pad_payment[".editFields"][] = "tgl";
$tdatapublic_pad_payment[".editFields"][] = "tagihan";
$tdatapublic_pad_payment[".editFields"][] = "denda";
$tdatapublic_pad_payment[".editFields"][] = "total_bayar";
$tdatapublic_pad_payment[".editFields"][] = "iso_request";
$tdatapublic_pad_payment[".editFields"][] = "transmission";
$tdatapublic_pad_payment[".editFields"][] = "settlement";
$tdatapublic_pad_payment[".editFields"][] = "stan";
$tdatapublic_pad_payment[".editFields"][] = "ntb";
$tdatapublic_pad_payment[".editFields"][] = "ntp";
$tdatapublic_pad_payment[".editFields"][] = "bank_id";
$tdatapublic_pad_payment[".editFields"][] = "channel_id";
$tdatapublic_pad_payment[".editFields"][] = "bank_ip";

$tdatapublic_pad_payment[".inlineEditFields"] = array();
$tdatapublic_pad_payment[".inlineEditFields"][] = "id";
$tdatapublic_pad_payment[".inlineEditFields"][] = "invoice_id";
$tdatapublic_pad_payment[".inlineEditFields"][] = "tgl";
$tdatapublic_pad_payment[".inlineEditFields"][] = "tagihan";
$tdatapublic_pad_payment[".inlineEditFields"][] = "denda";
$tdatapublic_pad_payment[".inlineEditFields"][] = "total_bayar";
$tdatapublic_pad_payment[".inlineEditFields"][] = "iso_request";
$tdatapublic_pad_payment[".inlineEditFields"][] = "transmission";
$tdatapublic_pad_payment[".inlineEditFields"][] = "settlement";
$tdatapublic_pad_payment[".inlineEditFields"][] = "stan";
$tdatapublic_pad_payment[".inlineEditFields"][] = "ntb";
$tdatapublic_pad_payment[".inlineEditFields"][] = "ntp";
$tdatapublic_pad_payment[".inlineEditFields"][] = "bank_id";
$tdatapublic_pad_payment[".inlineEditFields"][] = "channel_id";
$tdatapublic_pad_payment[".inlineEditFields"][] = "bank_ip";

$tdatapublic_pad_payment[".exportFields"] = array();
$tdatapublic_pad_payment[".exportFields"][] = "id";
$tdatapublic_pad_payment[".exportFields"][] = "invoice_id";
$tdatapublic_pad_payment[".exportFields"][] = "tgl";
$tdatapublic_pad_payment[".exportFields"][] = "tagihan";
$tdatapublic_pad_payment[".exportFields"][] = "denda";
$tdatapublic_pad_payment[".exportFields"][] = "total_bayar";
$tdatapublic_pad_payment[".exportFields"][] = "iso_request";
$tdatapublic_pad_payment[".exportFields"][] = "transmission";
$tdatapublic_pad_payment[".exportFields"][] = "settlement";
$tdatapublic_pad_payment[".exportFields"][] = "stan";
$tdatapublic_pad_payment[".exportFields"][] = "ntb";
$tdatapublic_pad_payment[".exportFields"][] = "ntp";
$tdatapublic_pad_payment[".exportFields"][] = "bank_id";
$tdatapublic_pad_payment[".exportFields"][] = "channel_id";
$tdatapublic_pad_payment[".exportFields"][] = "bank_ip";

$tdatapublic_pad_payment[".printFields"] = array();
$tdatapublic_pad_payment[".printFields"][] = "id";
$tdatapublic_pad_payment[".printFields"][] = "invoice_id";
$tdatapublic_pad_payment[".printFields"][] = "tgl";
$tdatapublic_pad_payment[".printFields"][] = "tagihan";
$tdatapublic_pad_payment[".printFields"][] = "denda";
$tdatapublic_pad_payment[".printFields"][] = "total_bayar";
$tdatapublic_pad_payment[".printFields"][] = "iso_request";
$tdatapublic_pad_payment[".printFields"][] = "transmission";
$tdatapublic_pad_payment[".printFields"][] = "settlement";
$tdatapublic_pad_payment[".printFields"][] = "stan";
$tdatapublic_pad_payment[".printFields"][] = "ntb";
$tdatapublic_pad_payment[".printFields"][] = "ntp";
$tdatapublic_pad_payment[".printFields"][] = "bank_id";
$tdatapublic_pad_payment[".printFields"][] = "channel_id";
$tdatapublic_pad_payment[".printFields"][] = "bank_ip";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Id"; 
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "id";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapublic_pad_payment["id"] = $fdata;
//	invoice_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "invoice_id";
	$fdata["GoodName"] = "invoice_id";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Invoice Id"; 
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

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_payment["invoice_id"] = $fdata;
//	tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "tgl";
	$fdata["GoodName"] = "tgl";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Tgl"; 
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
	
		$fdata["strField"] = "tgl"; 
		$fdata["FullName"] = "tgl";
	
		
		
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
	
		
		
	$tdatapublic_pad_payment["tgl"] = $fdata;
//	tagihan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "tagihan";
	$fdata["GoodName"] = "tagihan";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Tagihan"; 
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
	
		$fdata["strField"] = "tagihan"; 
		$fdata["FullName"] = "tagihan";
	
		
		
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
	
		
		
	$tdatapublic_pad_payment["tagihan"] = $fdata;
//	denda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "denda";
	$fdata["GoodName"] = "denda";
	$fdata["ownerTable"] = "public.pad_payment";
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
	
		
		
	$tdatapublic_pad_payment["denda"] = $fdata;
//	total_bayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "total_bayar";
	$fdata["GoodName"] = "total_bayar";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Total Bayar"; 
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
	
		$fdata["strField"] = "total_bayar"; 
		$fdata["FullName"] = "total_bayar";
	
		
		
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
	
		
		
	$tdatapublic_pad_payment["total_bayar"] = $fdata;
//	iso_request
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "iso_request";
	$fdata["GoodName"] = "iso_request";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Iso Request"; 
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
	
		$fdata["strField"] = "iso_request"; 
		$fdata["FullName"] = "iso_request";
	
		
		
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
			$edata["EditParams"].= " maxlength=1024";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_payment["iso_request"] = $fdata;
//	transmission
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "transmission";
	$fdata["GoodName"] = "transmission";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Transmission"; 
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
	
		$fdata["strField"] = "transmission"; 
		$fdata["FullName"] = "transmission";
	
		
		
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
	
		
		
	$tdatapublic_pad_payment["transmission"] = $fdata;
//	settlement
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "settlement";
	$fdata["GoodName"] = "settlement";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Settlement"; 
	$fdata["FieldType"] = 7;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "settlement"; 
		$fdata["FullName"] = "settlement";
	
		
		
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
	
		
		
	$tdatapublic_pad_payment["settlement"] = $fdata;
//	stan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "stan";
	$fdata["GoodName"] = "stan";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Stan"; 
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
	
		$fdata["strField"] = "stan"; 
		$fdata["FullName"] = "stan";
	
		
		
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
	
		
		
	$tdatapublic_pad_payment["stan"] = $fdata;
//	ntb
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "ntb";
	$fdata["GoodName"] = "ntb";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Ntb"; 
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
	
		$fdata["strField"] = "ntb"; 
		$fdata["FullName"] = "ntb";
	
		
		
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
			$edata["EditParams"].= " maxlength=32";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_payment["ntb"] = $fdata;
//	ntp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "ntp";
	$fdata["GoodName"] = "ntp";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Ntp"; 
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
	
		$fdata["strField"] = "ntp"; 
		$fdata["FullName"] = "ntp";
	
		
		
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
			$edata["EditParams"].= " maxlength=32";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_payment["ntp"] = $fdata;
//	bank_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "bank_id";
	$fdata["GoodName"] = "bank_id";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Bank Id"; 
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
	
		$fdata["strField"] = "bank_id"; 
		$fdata["FullName"] = "bank_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad_tp";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
		$edata["SimpleAdd"] = true;
			
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_payment["bank_id"] = $fdata;
//	channel_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "channel_id";
	$fdata["GoodName"] = "channel_id";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Channel Id"; 
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
	
		$fdata["strField"] = "channel_id"; 
		$fdata["FullName"] = "channel_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad_channel";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
		$edata["SimpleAdd"] = true;
			
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_payment["channel_id"] = $fdata;
//	bank_ip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "bank_ip";
	$fdata["GoodName"] = "bank_ip";
	$fdata["ownerTable"] = "public.pad_payment";
	$fdata["Label"] = "Bank Ip"; 
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
	
		$fdata["strField"] = "bank_ip"; 
		$fdata["FullName"] = "bank_ip";
	
		
		
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
	
		
		
	$tdatapublic_pad_payment["bank_ip"] = $fdata;

	
$tables_data["public.pad_payment"]=&$tdatapublic_pad_payment;
$field_labels["public_pad_payment"] = &$fieldLabelspublic_pad_payment;
$fieldToolTips["public.pad_payment"] = &$fieldToolTipspublic_pad_payment;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.pad_payment"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.pad_payment"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_sspd";
	$masterParams["mDataSourceTable"]="pad.pad_sspd";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_sspd";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["public.pad_payment"][$mIndex] = $masterParams;	
		$masterTablesData["public.pad_payment"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["public.pad_payment"][$mIndex]["detailKeys"][]="id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_pad_payment()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   invoice_id,   tgl,   tagihan,   denda,   total_bayar,   iso_request,   transmission,   settlement,   stan,   ntb,   ntp,   bank_id,   channel_id,   bank_ip";
$proto0["m_strFrom"] = "FROM \"public\".pad_payment";
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
	"m_strTable" => "public.pad_payment"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "invoice_id",
	"m_strTable" => "public.pad_payment"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "tgl",
	"m_strTable" => "public.pad_payment"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "tagihan",
	"m_strTable" => "public.pad_payment"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "denda",
	"m_strTable" => "public.pad_payment"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "total_bayar",
	"m_strTable" => "public.pad_payment"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "iso_request",
	"m_strTable" => "public.pad_payment"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "transmission",
	"m_strTable" => "public.pad_payment"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "settlement",
	"m_strTable" => "public.pad_payment"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "stan",
	"m_strTable" => "public.pad_payment"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "ntb",
	"m_strTable" => "public.pad_payment"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "ntp",
	"m_strTable" => "public.pad_payment"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "bank_id",
	"m_strTable" => "public.pad_payment"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "channel_id",
	"m_strTable" => "public.pad_payment"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "bank_ip",
	"m_strTable" => "public.pad_payment"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto35=array();
$proto35["m_link"] = "SQLL_MAIN";
			$proto36=array();
$proto36["m_strName"] = "public.pad_payment";
$proto36["m_columns"] = array();
$proto36["m_columns"][] = "id";
$proto36["m_columns"][] = "invoice_id";
$proto36["m_columns"][] = "tgl";
$proto36["m_columns"][] = "tagihan";
$proto36["m_columns"][] = "denda";
$proto36["m_columns"][] = "total_bayar";
$proto36["m_columns"][] = "iso_request";
$proto36["m_columns"][] = "transmission";
$proto36["m_columns"][] = "settlement";
$proto36["m_columns"][] = "stan";
$proto36["m_columns"][] = "ntb";
$proto36["m_columns"][] = "ntp";
$proto36["m_columns"][] = "bank_id";
$proto36["m_columns"][] = "channel_id";
$proto36["m_columns"][] = "bank_ip";
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
$queryData_public_pad_payment = createSqlQuery_public_pad_payment();
															$tdatapublic_pad_payment[".sqlquery"] = $queryData_public_pad_payment;
	
if(isset($tdatapublic_pad_payment["field2"])){
	$tdatapublic_pad_payment["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_pad_payment["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_pad_payment["field2"]["LookupType"] = 4;
	$tdatapublic_pad_payment["field2"]["LinkField"] = "email";
	$tdatapublic_pad_payment["field2"]["DisplayField"] = "name";
	$tdatapublic_pad_payment[".hasCustomViewField"] = true;
}

$tableEvents["public.pad_payment"] = new eventsBase;
$tdatapublic_pad_payment[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.pad_payment");

?>