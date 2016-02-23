<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_tmp_bank_ok_1 = array();
	$tdatapublic_tmp_bank_ok_1[".NumberOfChars"] = 80; 
	$tdatapublic_tmp_bank_ok_1[".ShortName"] = "public_tmp_bank_ok_1";
	$tdatapublic_tmp_bank_ok_1[".OwnerID"] = "";
	$tdatapublic_tmp_bank_ok_1[".OriginalTable"] = "public.tmp_bank_ok_1";

//	field labels
$fieldLabelspublic_tmp_bank_ok_1 = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_tmp_bank_ok_1["English"] = array();
	$fieldToolTipspublic_tmp_bank_ok_1["English"] = array();
	$fieldLabelspublic_tmp_bank_ok_1["English"]["id"] = "Id";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["id"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["tanggal"] = "Tanggal";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["tanggal"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["nama_wp"] = "Nama Wp";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["nama_wp"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["alamat_wp"] = "Alamat Wp";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["alamat_wp"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["npwpd"] = "Npwpd";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["npwpd"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["bayar"] = "Bayar";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["bayar"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["periode_1"] = "Periode 1";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["periode_1"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["periode_2"] = "Periode 2";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["periode_2"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["keterangan"] = "Keterangan";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["keterangan"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["spt_id_old"] = "Spt Id Old";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["spt_id_old"] = "";
	$fieldLabelspublic_tmp_bank_ok_1["English"]["sspd_id"] = "Sspd Id";
	$fieldToolTipspublic_tmp_bank_ok_1["English"]["sspd_id"] = "";
	if (count($fieldToolTipspublic_tmp_bank_ok_1["English"]))
		$tdatapublic_tmp_bank_ok_1[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_tmp_bank_ok_1[".NCSearch"] = true;



$tdatapublic_tmp_bank_ok_1[".shortTableName"] = "public_tmp_bank_ok_1";
$tdatapublic_tmp_bank_ok_1[".nSecOptions"] = 0;
$tdatapublic_tmp_bank_ok_1[".recsPerRowList"] = 1;
$tdatapublic_tmp_bank_ok_1[".mainTableOwnerID"] = "";
$tdatapublic_tmp_bank_ok_1[".moveNext"] = 1;
$tdatapublic_tmp_bank_ok_1[".nType"] = 0;

$tdatapublic_tmp_bank_ok_1[".strOriginalTableName"] = "public.tmp_bank_ok_1";




$tdatapublic_tmp_bank_ok_1[".showAddInPopup"] = false;

$tdatapublic_tmp_bank_ok_1[".showEditInPopup"] = false;

$tdatapublic_tmp_bank_ok_1[".showViewInPopup"] = false;

$tdatapublic_tmp_bank_ok_1[".fieldsForRegister"] = array();

$tdatapublic_tmp_bank_ok_1[".listAjax"] = false;

	$tdatapublic_tmp_bank_ok_1[".audit"] = false;

	$tdatapublic_tmp_bank_ok_1[".locking"] = false;

$tdatapublic_tmp_bank_ok_1[".listIcons"] = true;

$tdatapublic_tmp_bank_ok_1[".exportTo"] = true;

$tdatapublic_tmp_bank_ok_1[".printFriendly"] = true;


$tdatapublic_tmp_bank_ok_1[".showSimpleSearchOptions"] = false;

$tdatapublic_tmp_bank_ok_1[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_tmp_bank_ok_1[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_tmp_bank_ok_1[".isUseAjaxSuggest"] = true;

$tdatapublic_tmp_bank_ok_1[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_tmp_bank_ok_1[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_tmp_bank_ok_1[".isUseTimeForSearch"] = false;




$tdatapublic_tmp_bank_ok_1[".allSearchFields"] = array();

$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".allSearchFields"][] = "sspd_id";

$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".googleLikeFields"][] = "sspd_id";


$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".advSearchFields"][] = "sspd_id";

$tdatapublic_tmp_bank_ok_1[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_tmp_bank_ok_1[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_tmp_bank_ok_1[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_tmp_bank_ok_1[".orderindexes"] = array();

$tdatapublic_tmp_bank_ok_1[".sqlHead"] = "SELECT id,   tanggal,   nama_wp,   alamat_wp,   npwpd,   bayar,   periode_1,   periode_2,   keterangan,   spt_id_old,   sspd_id";
$tdatapublic_tmp_bank_ok_1[".sqlFrom"] = "FROM \"public\".tmp_bank_ok_1";
$tdatapublic_tmp_bank_ok_1[".sqlWhereExpr"] = "";
$tdatapublic_tmp_bank_ok_1[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_tmp_bank_ok_1[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_tmp_bank_ok_1[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_tmp_bank_ok_1 = array();
$tdatapublic_tmp_bank_ok_1[".Keys"] = $tableKeyspublic_tmp_bank_ok_1;

$tdatapublic_tmp_bank_ok_1[".listFields"] = array();
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".listFields"][] = "sspd_id";

$tdatapublic_tmp_bank_ok_1[".viewFields"] = array();
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".viewFields"][] = "sspd_id";

$tdatapublic_tmp_bank_ok_1[".addFields"] = array();
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".addFields"][] = "sspd_id";

$tdatapublic_tmp_bank_ok_1[".inlineAddFields"] = array();
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".inlineAddFields"][] = "sspd_id";

$tdatapublic_tmp_bank_ok_1[".editFields"] = array();
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".editFields"][] = "sspd_id";

$tdatapublic_tmp_bank_ok_1[".inlineEditFields"] = array();
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".inlineEditFields"][] = "sspd_id";

$tdatapublic_tmp_bank_ok_1[".exportFields"] = array();
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".exportFields"][] = "sspd_id";

$tdatapublic_tmp_bank_ok_1[".printFields"] = array();
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "id";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "tanggal";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "nama_wp";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "alamat_wp";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "npwpd";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "bayar";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "periode_1";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "periode_2";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "keterangan";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "spt_id_old";
$tdatapublic_tmp_bank_ok_1[".printFields"][] = "sspd_id";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
	$fdata["Label"] = "Id"; 
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
	
		
		
	$tdatapublic_tmp_bank_ok_1["id"] = $fdata;
//	tanggal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tanggal";
	$fdata["GoodName"] = "tanggal";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
	$fdata["Label"] = "Tanggal"; 
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
	
		
		
	$tdatapublic_tmp_bank_ok_1["tanggal"] = $fdata;
//	nama_wp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nama_wp";
	$fdata["GoodName"] = "nama_wp";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
	$fdata["Label"] = "Nama Wp"; 
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
	
		$fdata["strField"] = "nama_wp"; 
		$fdata["FullName"] = "nama_wp";
	
		
		
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
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_tmp_bank_ok_1["nama_wp"] = $fdata;
//	alamat_wp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "alamat_wp";
	$fdata["GoodName"] = "alamat_wp";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
	$fdata["Label"] = "Alamat Wp"; 
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
	
		$fdata["strField"] = "alamat_wp"; 
		$fdata["FullName"] = "alamat_wp";
	
		
		
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
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_tmp_bank_ok_1["alamat_wp"] = $fdata;
//	npwpd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "npwpd";
	$fdata["GoodName"] = "npwpd";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
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
			$edata["EditParams"].= " maxlength=20";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_tmp_bank_ok_1["npwpd"] = $fdata;
//	bayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "bayar";
	$fdata["GoodName"] = "bayar";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
	$fdata["Label"] = "Bayar"; 
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
	
		$fdata["strField"] = "bayar"; 
		$fdata["FullName"] = "bayar";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank_ok_1["bayar"] = $fdata;
//	periode_1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "periode_1";
	$fdata["GoodName"] = "periode_1";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
	$fdata["Label"] = "Periode 1"; 
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
	
		$fdata["strField"] = "periode_1"; 
		$fdata["FullName"] = "periode_1";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank_ok_1["periode_1"] = $fdata;
//	periode_2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "periode_2";
	$fdata["GoodName"] = "periode_2";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
	$fdata["Label"] = "Periode 2"; 
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
	
		$fdata["strField"] = "periode_2"; 
		$fdata["FullName"] = "periode_2";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank_ok_1["periode_2"] = $fdata;
//	keterangan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "keterangan";
	$fdata["GoodName"] = "keterangan";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
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
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_tmp_bank_ok_1["keterangan"] = $fdata;
//	spt_id_old
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "spt_id_old";
	$fdata["GoodName"] = "spt_id_old";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
	$fdata["Label"] = "Spt Id Old"; 
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
	
		$fdata["strField"] = "spt_id_old"; 
		$fdata["FullName"] = "spt_id_old";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank_ok_1["spt_id_old"] = $fdata;
//	sspd_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "sspd_id";
	$fdata["GoodName"] = "sspd_id";
	$fdata["ownerTable"] = "public.tmp_bank_ok_1";
	$fdata["Label"] = "Sspd Id"; 
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
	
		$fdata["strField"] = "sspd_id"; 
		$fdata["FullName"] = "sspd_id";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank_ok_1["sspd_id"] = $fdata;

	
$tables_data["public.tmp_bank_ok_1"]=&$tdatapublic_tmp_bank_ok_1;
$field_labels["public_tmp_bank_ok_1"] = &$fieldLabelspublic_tmp_bank_ok_1;
$fieldToolTips["public.tmp_bank_ok_1"] = &$fieldToolTipspublic_tmp_bank_ok_1;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.tmp_bank_ok_1"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.tmp_bank_ok_1"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_tmp_bank_ok_1()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tanggal,   nama_wp,   alamat_wp,   npwpd,   bayar,   periode_1,   periode_2,   keterangan,   spt_id_old,   sspd_id";
$proto0["m_strFrom"] = "FROM \"public\".tmp_bank_ok_1";
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
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tanggal",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nama_wp",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat_wp",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "npwpd",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "bayar",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "periode_1",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "periode_2",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_id_old",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "sspd_id",
	"m_strTable" => "public.tmp_bank_ok_1"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "public.tmp_bank_ok_1";
$proto28["m_columns"] = array();
$proto28["m_columns"][] = "id";
$proto28["m_columns"][] = "tanggal";
$proto28["m_columns"][] = "nama_wp";
$proto28["m_columns"][] = "alamat_wp";
$proto28["m_columns"][] = "npwpd";
$proto28["m_columns"][] = "bayar";
$proto28["m_columns"][] = "periode_1";
$proto28["m_columns"][] = "periode_2";
$proto28["m_columns"][] = "keterangan";
$proto28["m_columns"][] = "spt_id_old";
$proto28["m_columns"][] = "sspd_id";
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
$queryData_public_tmp_bank_ok_1 = createSqlQuery_public_tmp_bank_ok_1();
											$tdatapublic_tmp_bank_ok_1[".sqlquery"] = $queryData_public_tmp_bank_ok_1;
	
if(isset($tdatapublic_tmp_bank_ok_1["field2"])){
	$tdatapublic_tmp_bank_ok_1["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_tmp_bank_ok_1["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_tmp_bank_ok_1["field2"]["LookupType"] = 4;
	$tdatapublic_tmp_bank_ok_1["field2"]["LinkField"] = "email";
	$tdatapublic_tmp_bank_ok_1["field2"]["DisplayField"] = "name";
	$tdatapublic_tmp_bank_ok_1[".hasCustomViewField"] = true;
}

$tableEvents["public.tmp_bank_ok_1"] = new eventsBase;
$tdatapublic_tmp_bank_ok_1[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.tmp_bank_ok_1");

?>