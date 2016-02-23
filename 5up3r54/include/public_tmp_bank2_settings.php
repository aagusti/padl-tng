<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_tmp_bank2 = array();
	$tdatapublic_tmp_bank2[".NumberOfChars"] = 80; 
	$tdatapublic_tmp_bank2[".ShortName"] = "public_tmp_bank2";
	$tdatapublic_tmp_bank2[".OwnerID"] = "";
	$tdatapublic_tmp_bank2[".OriginalTable"] = "public.tmp_bank2";

//	field labels
$fieldLabelspublic_tmp_bank2 = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_tmp_bank2["English"] = array();
	$fieldToolTipspublic_tmp_bank2["English"] = array();
	$fieldLabelspublic_tmp_bank2["English"]["id"] = "Id";
	$fieldToolTipspublic_tmp_bank2["English"]["id"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["nama_wp"] = "Nama Wp";
	$fieldToolTipspublic_tmp_bank2["English"]["nama_wp"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["alamat_wp"] = "Alamat Wp";
	$fieldToolTipspublic_tmp_bank2["English"]["alamat_wp"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["npwpd"] = "Npwpd";
	$fieldToolTipspublic_tmp_bank2["English"]["npwpd"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["bayar"] = "Bayar";
	$fieldToolTipspublic_tmp_bank2["English"]["bayar"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["periode_1"] = "Periode 1";
	$fieldToolTipspublic_tmp_bank2["English"]["periode_1"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["periode_2"] = "Periode 2";
	$fieldToolTipspublic_tmp_bank2["English"]["periode_2"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["keterangan"] = "Keterangan";
	$fieldToolTipspublic_tmp_bank2["English"]["keterangan"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["spt_id_old"] = "Spt Id Old";
	$fieldToolTipspublic_tmp_bank2["English"]["spt_id_old"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["judul"] = "Judul";
	$fieldToolTipspublic_tmp_bank2["English"]["judul"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["lokasi"] = "Lokasi";
	$fieldToolTipspublic_tmp_bank2["English"]["lokasi"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["j"] = "J";
	$fieldToolTipspublic_tmp_bank2["English"]["j"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["p"] = "P";
	$fieldToolTipspublic_tmp_bank2["English"]["p"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["l"] = "L";
	$fieldToolTipspublic_tmp_bank2["English"]["l"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["t"] = "T";
	$fieldToolTipspublic_tmp_bank2["English"]["t"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["sspd_id"] = "Sspd Id";
	$fieldToolTipspublic_tmp_bank2["English"]["sspd_id"] = "";
	$fieldLabelspublic_tmp_bank2["English"]["tanggal"] = "Tanggal";
	$fieldToolTipspublic_tmp_bank2["English"]["tanggal"] = "";
	if (count($fieldToolTipspublic_tmp_bank2["English"]))
		$tdatapublic_tmp_bank2[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_tmp_bank2[".NCSearch"] = true;



$tdatapublic_tmp_bank2[".shortTableName"] = "public_tmp_bank2";
$tdatapublic_tmp_bank2[".nSecOptions"] = 0;
$tdatapublic_tmp_bank2[".recsPerRowList"] = 1;
$tdatapublic_tmp_bank2[".mainTableOwnerID"] = "";
$tdatapublic_tmp_bank2[".moveNext"] = 1;
$tdatapublic_tmp_bank2[".nType"] = 0;

$tdatapublic_tmp_bank2[".strOriginalTableName"] = "public.tmp_bank2";




$tdatapublic_tmp_bank2[".showAddInPopup"] = false;

$tdatapublic_tmp_bank2[".showEditInPopup"] = false;

$tdatapublic_tmp_bank2[".showViewInPopup"] = false;

$tdatapublic_tmp_bank2[".fieldsForRegister"] = array();

$tdatapublic_tmp_bank2[".listAjax"] = false;

	$tdatapublic_tmp_bank2[".audit"] = false;

	$tdatapublic_tmp_bank2[".locking"] = false;

$tdatapublic_tmp_bank2[".listIcons"] = true;
$tdatapublic_tmp_bank2[".edit"] = true;
$tdatapublic_tmp_bank2[".inlineEdit"] = true;
$tdatapublic_tmp_bank2[".inlineAdd"] = true;
$tdatapublic_tmp_bank2[".view"] = true;

$tdatapublic_tmp_bank2[".exportTo"] = true;

$tdatapublic_tmp_bank2[".printFriendly"] = true;

$tdatapublic_tmp_bank2[".delete"] = true;

$tdatapublic_tmp_bank2[".showSimpleSearchOptions"] = false;

$tdatapublic_tmp_bank2[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_tmp_bank2[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_tmp_bank2[".isUseAjaxSuggest"] = true;

$tdatapublic_tmp_bank2[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_tmp_bank2[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_tmp_bank2[".isUseTimeForSearch"] = false;




$tdatapublic_tmp_bank2[".allSearchFields"] = array();

$tdatapublic_tmp_bank2[".allSearchFields"][] = "id";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "bayar";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "judul";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "j";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "p";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "l";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "t";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".allSearchFields"][] = "tanggal";

$tdatapublic_tmp_bank2[".googleLikeFields"][] = "id";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "bayar";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "judul";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "j";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "p";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "l";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "t";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".googleLikeFields"][] = "tanggal";


$tdatapublic_tmp_bank2[".advSearchFields"][] = "id";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "bayar";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "judul";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "j";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "p";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "l";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "t";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".advSearchFields"][] = "tanggal";

$tdatapublic_tmp_bank2[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_tmp_bank2[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_tmp_bank2[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_tmp_bank2[".orderindexes"] = array();

$tdatapublic_tmp_bank2[".sqlHead"] = "SELECT id,   nama_wp,   alamat_wp,   npwpd,   bayar,   periode_1,   periode_2,   keterangan,   spt_id_old,   judul,   lokasi,   j,   p,   l,   t,   sspd_id,   tanggal";
$tdatapublic_tmp_bank2[".sqlFrom"] = "FROM \"public\".tmp_bank2";
$tdatapublic_tmp_bank2[".sqlWhereExpr"] = "";
$tdatapublic_tmp_bank2[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_tmp_bank2[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_tmp_bank2[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_tmp_bank2 = array();
$tableKeyspublic_tmp_bank2[] = "id";
$tdatapublic_tmp_bank2[".Keys"] = $tableKeyspublic_tmp_bank2;

$tdatapublic_tmp_bank2[".listFields"] = array();
$tdatapublic_tmp_bank2[".listFields"][] = "id";
$tdatapublic_tmp_bank2[".listFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".listFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".listFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".listFields"][] = "bayar";
$tdatapublic_tmp_bank2[".listFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".listFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".listFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".listFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".listFields"][] = "judul";
$tdatapublic_tmp_bank2[".listFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".listFields"][] = "j";
$tdatapublic_tmp_bank2[".listFields"][] = "p";
$tdatapublic_tmp_bank2[".listFields"][] = "l";
$tdatapublic_tmp_bank2[".listFields"][] = "t";
$tdatapublic_tmp_bank2[".listFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".listFields"][] = "tanggal";

$tdatapublic_tmp_bank2[".viewFields"] = array();
$tdatapublic_tmp_bank2[".viewFields"][] = "id";
$tdatapublic_tmp_bank2[".viewFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".viewFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".viewFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".viewFields"][] = "bayar";
$tdatapublic_tmp_bank2[".viewFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".viewFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".viewFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".viewFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".viewFields"][] = "judul";
$tdatapublic_tmp_bank2[".viewFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".viewFields"][] = "j";
$tdatapublic_tmp_bank2[".viewFields"][] = "p";
$tdatapublic_tmp_bank2[".viewFields"][] = "l";
$tdatapublic_tmp_bank2[".viewFields"][] = "t";
$tdatapublic_tmp_bank2[".viewFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".viewFields"][] = "tanggal";

$tdatapublic_tmp_bank2[".addFields"] = array();
$tdatapublic_tmp_bank2[".addFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".addFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".addFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".addFields"][] = "bayar";
$tdatapublic_tmp_bank2[".addFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".addFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".addFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".addFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".addFields"][] = "judul";
$tdatapublic_tmp_bank2[".addFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".addFields"][] = "j";
$tdatapublic_tmp_bank2[".addFields"][] = "p";
$tdatapublic_tmp_bank2[".addFields"][] = "l";
$tdatapublic_tmp_bank2[".addFields"][] = "t";
$tdatapublic_tmp_bank2[".addFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".addFields"][] = "tanggal";

$tdatapublic_tmp_bank2[".inlineAddFields"] = array();
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "bayar";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "judul";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "j";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "p";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "l";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "t";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".inlineAddFields"][] = "tanggal";

$tdatapublic_tmp_bank2[".editFields"] = array();
$tdatapublic_tmp_bank2[".editFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".editFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".editFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".editFields"][] = "bayar";
$tdatapublic_tmp_bank2[".editFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".editFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".editFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".editFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".editFields"][] = "judul";
$tdatapublic_tmp_bank2[".editFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".editFields"][] = "j";
$tdatapublic_tmp_bank2[".editFields"][] = "p";
$tdatapublic_tmp_bank2[".editFields"][] = "l";
$tdatapublic_tmp_bank2[".editFields"][] = "t";
$tdatapublic_tmp_bank2[".editFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".editFields"][] = "tanggal";

$tdatapublic_tmp_bank2[".inlineEditFields"] = array();
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "bayar";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "judul";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "j";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "p";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "l";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "t";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".inlineEditFields"][] = "tanggal";

$tdatapublic_tmp_bank2[".exportFields"] = array();
$tdatapublic_tmp_bank2[".exportFields"][] = "id";
$tdatapublic_tmp_bank2[".exportFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".exportFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".exportFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".exportFields"][] = "bayar";
$tdatapublic_tmp_bank2[".exportFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".exportFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".exportFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".exportFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".exportFields"][] = "judul";
$tdatapublic_tmp_bank2[".exportFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".exportFields"][] = "j";
$tdatapublic_tmp_bank2[".exportFields"][] = "p";
$tdatapublic_tmp_bank2[".exportFields"][] = "l";
$tdatapublic_tmp_bank2[".exportFields"][] = "t";
$tdatapublic_tmp_bank2[".exportFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".exportFields"][] = "tanggal";

$tdatapublic_tmp_bank2[".printFields"] = array();
$tdatapublic_tmp_bank2[".printFields"][] = "id";
$tdatapublic_tmp_bank2[".printFields"][] = "nama_wp";
$tdatapublic_tmp_bank2[".printFields"][] = "alamat_wp";
$tdatapublic_tmp_bank2[".printFields"][] = "npwpd";
$tdatapublic_tmp_bank2[".printFields"][] = "bayar";
$tdatapublic_tmp_bank2[".printFields"][] = "periode_1";
$tdatapublic_tmp_bank2[".printFields"][] = "periode_2";
$tdatapublic_tmp_bank2[".printFields"][] = "keterangan";
$tdatapublic_tmp_bank2[".printFields"][] = "spt_id_old";
$tdatapublic_tmp_bank2[".printFields"][] = "judul";
$tdatapublic_tmp_bank2[".printFields"][] = "lokasi";
$tdatapublic_tmp_bank2[".printFields"][] = "j";
$tdatapublic_tmp_bank2[".printFields"][] = "p";
$tdatapublic_tmp_bank2[".printFields"][] = "l";
$tdatapublic_tmp_bank2[".printFields"][] = "t";
$tdatapublic_tmp_bank2[".printFields"][] = "sspd_id";
$tdatapublic_tmp_bank2[".printFields"][] = "tanggal";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["id"] = $fdata;
//	nama_wp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama_wp";
	$fdata["GoodName"] = "nama_wp";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["nama_wp"] = $fdata;
//	alamat_wp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "alamat_wp";
	$fdata["GoodName"] = "alamat_wp";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["alamat_wp"] = $fdata;
//	npwpd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "npwpd";
	$fdata["GoodName"] = "npwpd";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["npwpd"] = $fdata;
//	bayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "bayar";
	$fdata["GoodName"] = "bayar";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["bayar"] = $fdata;
//	periode_1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "periode_1";
	$fdata["GoodName"] = "periode_1";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["periode_1"] = $fdata;
//	periode_2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "periode_2";
	$fdata["GoodName"] = "periode_2";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["periode_2"] = $fdata;
//	keterangan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "keterangan";
	$fdata["GoodName"] = "keterangan";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["keterangan"] = $fdata;
//	spt_id_old
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "spt_id_old";
	$fdata["GoodName"] = "spt_id_old";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["spt_id_old"] = $fdata;
//	judul
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "judul";
	$fdata["GoodName"] = "judul";
	$fdata["ownerTable"] = "public.tmp_bank2";
	$fdata["Label"] = "Judul"; 
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
	
		$fdata["strField"] = "judul"; 
		$fdata["FullName"] = "judul";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank2["judul"] = $fdata;
//	lokasi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "lokasi";
	$fdata["GoodName"] = "lokasi";
	$fdata["ownerTable"] = "public.tmp_bank2";
	$fdata["Label"] = "Lokasi"; 
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
	
		$fdata["strField"] = "lokasi"; 
		$fdata["FullName"] = "lokasi";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank2["lokasi"] = $fdata;
//	j
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "j";
	$fdata["GoodName"] = "j";
	$fdata["ownerTable"] = "public.tmp_bank2";
	$fdata["Label"] = "J"; 
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
	
		$fdata["strField"] = "j"; 
		$fdata["FullName"] = "j";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank2["j"] = $fdata;
//	p
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "p";
	$fdata["GoodName"] = "p";
	$fdata["ownerTable"] = "public.tmp_bank2";
	$fdata["Label"] = "P"; 
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
	
		$fdata["strField"] = "p"; 
		$fdata["FullName"] = "p";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank2["p"] = $fdata;
//	l
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "l";
	$fdata["GoodName"] = "l";
	$fdata["ownerTable"] = "public.tmp_bank2";
	$fdata["Label"] = "L"; 
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
	
		$fdata["strField"] = "l"; 
		$fdata["FullName"] = "l";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank2["l"] = $fdata;
//	t
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "t";
	$fdata["GoodName"] = "t";
	$fdata["ownerTable"] = "public.tmp_bank2";
	$fdata["Label"] = "T"; 
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
	
		$fdata["strField"] = "t"; 
		$fdata["FullName"] = "t";
	
		
		
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
	
		
		
	$tdatapublic_tmp_bank2["t"] = $fdata;
//	sspd_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "sspd_id";
	$fdata["GoodName"] = "sspd_id";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["sspd_id"] = $fdata;
//	tanggal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "tanggal";
	$fdata["GoodName"] = "tanggal";
	$fdata["ownerTable"] = "public.tmp_bank2";
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
	
		
		
	$tdatapublic_tmp_bank2["tanggal"] = $fdata;

	
$tables_data["public.tmp_bank2"]=&$tdatapublic_tmp_bank2;
$field_labels["public_tmp_bank2"] = &$fieldLabelspublic_tmp_bank2;
$fieldToolTips["public.tmp_bank2"] = &$fieldToolTipspublic_tmp_bank2;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.tmp_bank2"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.tmp_bank2"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_tmp_bank2()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama_wp,   alamat_wp,   npwpd,   bayar,   periode_1,   periode_2,   keterangan,   spt_id_old,   judul,   lokasi,   j,   p,   l,   t,   sspd_id,   tanggal";
$proto0["m_strFrom"] = "FROM \"public\".tmp_bank2";
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
	"m_strTable" => "public.tmp_bank2"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama_wp",
	"m_strTable" => "public.tmp_bank2"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat_wp",
	"m_strTable" => "public.tmp_bank2"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "npwpd",
	"m_strTable" => "public.tmp_bank2"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "bayar",
	"m_strTable" => "public.tmp_bank2"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "periode_1",
	"m_strTable" => "public.tmp_bank2"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "periode_2",
	"m_strTable" => "public.tmp_bank2"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan",
	"m_strTable" => "public.tmp_bank2"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_id_old",
	"m_strTable" => "public.tmp_bank2"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "judul",
	"m_strTable" => "public.tmp_bank2"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "lokasi",
	"m_strTable" => "public.tmp_bank2"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "j",
	"m_strTable" => "public.tmp_bank2"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "p",
	"m_strTable" => "public.tmp_bank2"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "l",
	"m_strTable" => "public.tmp_bank2"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "t",
	"m_strTable" => "public.tmp_bank2"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "sspd_id",
	"m_strTable" => "public.tmp_bank2"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "tanggal",
	"m_strTable" => "public.tmp_bank2"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto39=array();
$proto39["m_link"] = "SQLL_MAIN";
			$proto40=array();
$proto40["m_strName"] = "public.tmp_bank2";
$proto40["m_columns"] = array();
$proto40["m_columns"][] = "id";
$proto40["m_columns"][] = "nama_wp";
$proto40["m_columns"][] = "alamat_wp";
$proto40["m_columns"][] = "npwpd";
$proto40["m_columns"][] = "bayar";
$proto40["m_columns"][] = "periode_1";
$proto40["m_columns"][] = "periode_2";
$proto40["m_columns"][] = "keterangan";
$proto40["m_columns"][] = "spt_id_old";
$proto40["m_columns"][] = "judul";
$proto40["m_columns"][] = "lokasi";
$proto40["m_columns"][] = "j";
$proto40["m_columns"][] = "p";
$proto40["m_columns"][] = "l";
$proto40["m_columns"][] = "t";
$proto40["m_columns"][] = "sspd_id";
$proto40["m_columns"][] = "tanggal";
$obj = new SQLTable($proto40);

$proto39["m_table"] = $obj;
$proto39["m_alias"] = "";
$proto41=array();
$proto41["m_sql"] = "";
$proto41["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto41["m_column"]=$obj;
$proto41["m_contained"] = array();
$proto41["m_strCase"] = "";
$proto41["m_havingmode"] = "0";
$proto41["m_inBrackets"] = "0";
$proto41["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto41);

$proto39["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto39);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_public_tmp_bank2 = createSqlQuery_public_tmp_bank2();
																	$tdatapublic_tmp_bank2[".sqlquery"] = $queryData_public_tmp_bank2;
	
if(isset($tdatapublic_tmp_bank2["field2"])){
	$tdatapublic_tmp_bank2["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_tmp_bank2["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_tmp_bank2["field2"]["LookupType"] = 4;
	$tdatapublic_tmp_bank2["field2"]["LinkField"] = "email";
	$tdatapublic_tmp_bank2["field2"]["DisplayField"] = "name";
	$tdatapublic_tmp_bank2[".hasCustomViewField"] = true;
}

$tableEvents["public.tmp_bank2"] = new eventsBase;
$tdatapublic_tmp_bank2[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.tmp_bank2");

?>