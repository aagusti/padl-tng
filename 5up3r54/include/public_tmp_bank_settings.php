<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_tmp_bank = array();
	$tdatapublic_tmp_bank[".NumberOfChars"] = 80; 
	$tdatapublic_tmp_bank[".ShortName"] = "public_tmp_bank";
	$tdatapublic_tmp_bank[".OwnerID"] = "";
	$tdatapublic_tmp_bank[".OriginalTable"] = "public.tmp_bank";

//	field labels
$fieldLabelspublic_tmp_bank = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_tmp_bank["English"] = array();
	$fieldToolTipspublic_tmp_bank["English"] = array();
	$fieldLabelspublic_tmp_bank["English"]["id"] = "Id";
	$fieldToolTipspublic_tmp_bank["English"]["id"] = "";
	$fieldLabelspublic_tmp_bank["English"]["tanggal"] = "Tanggal";
	$fieldToolTipspublic_tmp_bank["English"]["tanggal"] = "";
	$fieldLabelspublic_tmp_bank["English"]["nama_wp"] = "Nama Wp";
	$fieldToolTipspublic_tmp_bank["English"]["nama_wp"] = "";
	$fieldLabelspublic_tmp_bank["English"]["alamat_wp"] = "Alamat Wp";
	$fieldToolTipspublic_tmp_bank["English"]["alamat_wp"] = "";
	$fieldLabelspublic_tmp_bank["English"]["npwpd"] = "Npwpd";
	$fieldToolTipspublic_tmp_bank["English"]["npwpd"] = "";
	$fieldLabelspublic_tmp_bank["English"]["bayar"] = "Bayar";
	$fieldToolTipspublic_tmp_bank["English"]["bayar"] = "";
	$fieldLabelspublic_tmp_bank["English"]["periode_1"] = "Periode 1";
	$fieldToolTipspublic_tmp_bank["English"]["periode_1"] = "";
	$fieldLabelspublic_tmp_bank["English"]["periode_2"] = "Periode 2";
	$fieldToolTipspublic_tmp_bank["English"]["periode_2"] = "";
	$fieldLabelspublic_tmp_bank["English"]["keterangan"] = "Keterangan";
	$fieldToolTipspublic_tmp_bank["English"]["keterangan"] = "";
	$fieldLabelspublic_tmp_bank["English"]["spt_id_old"] = "Spt Id Old";
	$fieldToolTipspublic_tmp_bank["English"]["spt_id_old"] = "";
	$fieldLabelspublic_tmp_bank["English"]["sspd_id"] = "Sspd Id";
	$fieldToolTipspublic_tmp_bank["English"]["sspd_id"] = "";
	if (count($fieldToolTipspublic_tmp_bank["English"]))
		$tdatapublic_tmp_bank[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_tmp_bank[".NCSearch"] = true;



$tdatapublic_tmp_bank[".shortTableName"] = "public_tmp_bank";
$tdatapublic_tmp_bank[".nSecOptions"] = 0;
$tdatapublic_tmp_bank[".recsPerRowList"] = 1;
$tdatapublic_tmp_bank[".mainTableOwnerID"] = "";
$tdatapublic_tmp_bank[".moveNext"] = 1;
$tdatapublic_tmp_bank[".nType"] = 0;

$tdatapublic_tmp_bank[".strOriginalTableName"] = "public.tmp_bank";




$tdatapublic_tmp_bank[".showAddInPopup"] = false;

$tdatapublic_tmp_bank[".showEditInPopup"] = false;

$tdatapublic_tmp_bank[".showViewInPopup"] = false;

$tdatapublic_tmp_bank[".fieldsForRegister"] = array();

$tdatapublic_tmp_bank[".listAjax"] = false;

	$tdatapublic_tmp_bank[".audit"] = false;

	$tdatapublic_tmp_bank[".locking"] = false;

$tdatapublic_tmp_bank[".listIcons"] = true;
$tdatapublic_tmp_bank[".edit"] = true;
$tdatapublic_tmp_bank[".inlineEdit"] = true;
$tdatapublic_tmp_bank[".inlineAdd"] = true;
$tdatapublic_tmp_bank[".view"] = true;

$tdatapublic_tmp_bank[".exportTo"] = true;

$tdatapublic_tmp_bank[".printFriendly"] = true;

$tdatapublic_tmp_bank[".delete"] = true;

$tdatapublic_tmp_bank[".showSimpleSearchOptions"] = false;

$tdatapublic_tmp_bank[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_tmp_bank[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_tmp_bank[".isUseAjaxSuggest"] = true;

$tdatapublic_tmp_bank[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_tmp_bank[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_tmp_bank[".isUseTimeForSearch"] = false;




$tdatapublic_tmp_bank[".allSearchFields"] = array();

$tdatapublic_tmp_bank[".allSearchFields"][] = "id";
$tdatapublic_tmp_bank[".allSearchFields"][] = "tanggal";
$tdatapublic_tmp_bank[".allSearchFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".allSearchFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".allSearchFields"][] = "npwpd";
$tdatapublic_tmp_bank[".allSearchFields"][] = "bayar";
$tdatapublic_tmp_bank[".allSearchFields"][] = "periode_1";
$tdatapublic_tmp_bank[".allSearchFields"][] = "periode_2";
$tdatapublic_tmp_bank[".allSearchFields"][] = "keterangan";
$tdatapublic_tmp_bank[".allSearchFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".allSearchFields"][] = "sspd_id";

$tdatapublic_tmp_bank[".googleLikeFields"][] = "id";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "tanggal";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "npwpd";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "bayar";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "periode_1";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "periode_2";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "keterangan";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".googleLikeFields"][] = "sspd_id";


$tdatapublic_tmp_bank[".advSearchFields"][] = "id";
$tdatapublic_tmp_bank[".advSearchFields"][] = "tanggal";
$tdatapublic_tmp_bank[".advSearchFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".advSearchFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".advSearchFields"][] = "npwpd";
$tdatapublic_tmp_bank[".advSearchFields"][] = "bayar";
$tdatapublic_tmp_bank[".advSearchFields"][] = "periode_1";
$tdatapublic_tmp_bank[".advSearchFields"][] = "periode_2";
$tdatapublic_tmp_bank[".advSearchFields"][] = "keterangan";
$tdatapublic_tmp_bank[".advSearchFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".advSearchFields"][] = "sspd_id";

$tdatapublic_tmp_bank[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_tmp_bank[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_tmp_bank[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_tmp_bank[".orderindexes"] = array();

$tdatapublic_tmp_bank[".sqlHead"] = "SELECT id,   tanggal,   nama_wp,   alamat_wp,   npwpd,   bayar,   periode_1,   periode_2,   keterangan,   spt_id_old,   sspd_id";
$tdatapublic_tmp_bank[".sqlFrom"] = "FROM \"public\".tmp_bank";
$tdatapublic_tmp_bank[".sqlWhereExpr"] = "";
$tdatapublic_tmp_bank[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_tmp_bank[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_tmp_bank[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_tmp_bank = array();
$tableKeyspublic_tmp_bank[] = "id";
$tdatapublic_tmp_bank[".Keys"] = $tableKeyspublic_tmp_bank;

$tdatapublic_tmp_bank[".listFields"] = array();
$tdatapublic_tmp_bank[".listFields"][] = "id";
$tdatapublic_tmp_bank[".listFields"][] = "tanggal";
$tdatapublic_tmp_bank[".listFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".listFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".listFields"][] = "npwpd";
$tdatapublic_tmp_bank[".listFields"][] = "bayar";
$tdatapublic_tmp_bank[".listFields"][] = "periode_1";
$tdatapublic_tmp_bank[".listFields"][] = "periode_2";
$tdatapublic_tmp_bank[".listFields"][] = "keterangan";
$tdatapublic_tmp_bank[".listFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".listFields"][] = "sspd_id";

$tdatapublic_tmp_bank[".viewFields"] = array();
$tdatapublic_tmp_bank[".viewFields"][] = "id";
$tdatapublic_tmp_bank[".viewFields"][] = "tanggal";
$tdatapublic_tmp_bank[".viewFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".viewFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".viewFields"][] = "npwpd";
$tdatapublic_tmp_bank[".viewFields"][] = "bayar";
$tdatapublic_tmp_bank[".viewFields"][] = "periode_1";
$tdatapublic_tmp_bank[".viewFields"][] = "periode_2";
$tdatapublic_tmp_bank[".viewFields"][] = "keterangan";
$tdatapublic_tmp_bank[".viewFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".viewFields"][] = "sspd_id";

$tdatapublic_tmp_bank[".addFields"] = array();
$tdatapublic_tmp_bank[".addFields"][] = "tanggal";
$tdatapublic_tmp_bank[".addFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".addFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".addFields"][] = "npwpd";
$tdatapublic_tmp_bank[".addFields"][] = "bayar";
$tdatapublic_tmp_bank[".addFields"][] = "periode_1";
$tdatapublic_tmp_bank[".addFields"][] = "periode_2";
$tdatapublic_tmp_bank[".addFields"][] = "keterangan";
$tdatapublic_tmp_bank[".addFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".addFields"][] = "sspd_id";

$tdatapublic_tmp_bank[".inlineAddFields"] = array();
$tdatapublic_tmp_bank[".inlineAddFields"][] = "tanggal";
$tdatapublic_tmp_bank[".inlineAddFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".inlineAddFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".inlineAddFields"][] = "npwpd";
$tdatapublic_tmp_bank[".inlineAddFields"][] = "bayar";
$tdatapublic_tmp_bank[".inlineAddFields"][] = "periode_1";
$tdatapublic_tmp_bank[".inlineAddFields"][] = "periode_2";
$tdatapublic_tmp_bank[".inlineAddFields"][] = "keterangan";
$tdatapublic_tmp_bank[".inlineAddFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".inlineAddFields"][] = "sspd_id";

$tdatapublic_tmp_bank[".editFields"] = array();
$tdatapublic_tmp_bank[".editFields"][] = "tanggal";
$tdatapublic_tmp_bank[".editFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".editFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".editFields"][] = "npwpd";
$tdatapublic_tmp_bank[".editFields"][] = "bayar";
$tdatapublic_tmp_bank[".editFields"][] = "periode_1";
$tdatapublic_tmp_bank[".editFields"][] = "periode_2";
$tdatapublic_tmp_bank[".editFields"][] = "keterangan";
$tdatapublic_tmp_bank[".editFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".editFields"][] = "sspd_id";

$tdatapublic_tmp_bank[".inlineEditFields"] = array();
$tdatapublic_tmp_bank[".inlineEditFields"][] = "tanggal";
$tdatapublic_tmp_bank[".inlineEditFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".inlineEditFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".inlineEditFields"][] = "npwpd";
$tdatapublic_tmp_bank[".inlineEditFields"][] = "bayar";
$tdatapublic_tmp_bank[".inlineEditFields"][] = "periode_1";
$tdatapublic_tmp_bank[".inlineEditFields"][] = "periode_2";
$tdatapublic_tmp_bank[".inlineEditFields"][] = "keterangan";
$tdatapublic_tmp_bank[".inlineEditFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".inlineEditFields"][] = "sspd_id";

$tdatapublic_tmp_bank[".exportFields"] = array();
$tdatapublic_tmp_bank[".exportFields"][] = "id";
$tdatapublic_tmp_bank[".exportFields"][] = "tanggal";
$tdatapublic_tmp_bank[".exportFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".exportFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".exportFields"][] = "npwpd";
$tdatapublic_tmp_bank[".exportFields"][] = "bayar";
$tdatapublic_tmp_bank[".exportFields"][] = "periode_1";
$tdatapublic_tmp_bank[".exportFields"][] = "periode_2";
$tdatapublic_tmp_bank[".exportFields"][] = "keterangan";
$tdatapublic_tmp_bank[".exportFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".exportFields"][] = "sspd_id";

$tdatapublic_tmp_bank[".printFields"] = array();
$tdatapublic_tmp_bank[".printFields"][] = "id";
$tdatapublic_tmp_bank[".printFields"][] = "tanggal";
$tdatapublic_tmp_bank[".printFields"][] = "nama_wp";
$tdatapublic_tmp_bank[".printFields"][] = "alamat_wp";
$tdatapublic_tmp_bank[".printFields"][] = "npwpd";
$tdatapublic_tmp_bank[".printFields"][] = "bayar";
$tdatapublic_tmp_bank[".printFields"][] = "periode_1";
$tdatapublic_tmp_bank[".printFields"][] = "periode_2";
$tdatapublic_tmp_bank[".printFields"][] = "keterangan";
$tdatapublic_tmp_bank[".printFields"][] = "spt_id_old";
$tdatapublic_tmp_bank[".printFields"][] = "sspd_id";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["id"] = $fdata;
//	tanggal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tanggal";
	$fdata["GoodName"] = "tanggal";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["tanggal"] = $fdata;
//	nama_wp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nama_wp";
	$fdata["GoodName"] = "nama_wp";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["nama_wp"] = $fdata;
//	alamat_wp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "alamat_wp";
	$fdata["GoodName"] = "alamat_wp";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["alamat_wp"] = $fdata;
//	npwpd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "npwpd";
	$fdata["GoodName"] = "npwpd";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["npwpd"] = $fdata;
//	bayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "bayar";
	$fdata["GoodName"] = "bayar";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["bayar"] = $fdata;
//	periode_1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "periode_1";
	$fdata["GoodName"] = "periode_1";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["periode_1"] = $fdata;
//	periode_2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "periode_2";
	$fdata["GoodName"] = "periode_2";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["periode_2"] = $fdata;
//	keterangan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "keterangan";
	$fdata["GoodName"] = "keterangan";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["keterangan"] = $fdata;
//	spt_id_old
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "spt_id_old";
	$fdata["GoodName"] = "spt_id_old";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["spt_id_old"] = $fdata;
//	sspd_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "sspd_id";
	$fdata["GoodName"] = "sspd_id";
	$fdata["ownerTable"] = "public.tmp_bank";
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
	
		
		
	$tdatapublic_tmp_bank["sspd_id"] = $fdata;

	
$tables_data["public.tmp_bank"]=&$tdatapublic_tmp_bank;
$field_labels["public_tmp_bank"] = &$fieldLabelspublic_tmp_bank;
$fieldToolTips["public.tmp_bank"] = &$fieldToolTipspublic_tmp_bank;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.tmp_bank"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.tmp_bank"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_tmp_bank()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tanggal,   nama_wp,   alamat_wp,   npwpd,   bayar,   periode_1,   periode_2,   keterangan,   spt_id_old,   sspd_id";
$proto0["m_strFrom"] = "FROM \"public\".tmp_bank";
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
	"m_strTable" => "public.tmp_bank"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tanggal",
	"m_strTable" => "public.tmp_bank"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nama_wp",
	"m_strTable" => "public.tmp_bank"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat_wp",
	"m_strTable" => "public.tmp_bank"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "npwpd",
	"m_strTable" => "public.tmp_bank"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "bayar",
	"m_strTable" => "public.tmp_bank"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "periode_1",
	"m_strTable" => "public.tmp_bank"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "periode_2",
	"m_strTable" => "public.tmp_bank"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan",
	"m_strTable" => "public.tmp_bank"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_id_old",
	"m_strTable" => "public.tmp_bank"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "sspd_id",
	"m_strTable" => "public.tmp_bank"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto27=array();
$proto27["m_link"] = "SQLL_MAIN";
			$proto28=array();
$proto28["m_strName"] = "public.tmp_bank";
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
$queryData_public_tmp_bank = createSqlQuery_public_tmp_bank();
											$tdatapublic_tmp_bank[".sqlquery"] = $queryData_public_tmp_bank;
	
if(isset($tdatapublic_tmp_bank["field2"])){
	$tdatapublic_tmp_bank["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_tmp_bank["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_tmp_bank["field2"]["LookupType"] = 4;
	$tdatapublic_tmp_bank["field2"]["LinkField"] = "email";
	$tdatapublic_tmp_bank["field2"]["DisplayField"] = "name";
	$tdatapublic_tmp_bank[".hasCustomViewField"] = true;
}

$tableEvents["public.tmp_bank"] = new eventsBase;
$tdatapublic_tmp_bank[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.tmp_bank");

?>