<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_sspd = array();
	$tdatapad_pad_sspd[".NumberOfChars"] = 80; 
	$tdatapad_pad_sspd[".ShortName"] = "pad_pad_sspd";
	$tdatapad_pad_sspd[".OwnerID"] = "";
	$tdatapad_pad_sspd[".OriginalTable"] = "pad.pad_sspd";

//	field labels
$fieldLabelspad_pad_sspd = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_sspd["English"] = array();
	$fieldToolTipspad_pad_sspd["English"] = array();
	$fieldLabelspad_pad_sspd["English"]["id"] = "Id";
	$fieldToolTipspad_pad_sspd["English"]["id"] = "";
	$fieldLabelspad_pad_sspd["English"]["tahun"] = "Tahun";
	$fieldToolTipspad_pad_sspd["English"]["tahun"] = "";
	$fieldLabelspad_pad_sspd["English"]["sspdno"] = "Sspdno";
	$fieldToolTipspad_pad_sspd["English"]["sspdno"] = "";
	$fieldLabelspad_pad_sspd["English"]["sspdtgl"] = "Sspdtgl";
	$fieldToolTipspad_pad_sspd["English"]["sspdtgl"] = "";
	$fieldLabelspad_pad_sspd["English"]["sspdjam"] = "Sspdjam";
	$fieldToolTipspad_pad_sspd["English"]["sspdjam"] = "";
	$fieldLabelspad_pad_sspd["English"]["invoice_id"] = "Invoice Id";
	$fieldToolTipspad_pad_sspd["English"]["invoice_id"] = "";
	$fieldLabelspad_pad_sspd["English"]["keterangan"] = "Keterangan";
	$fieldToolTipspad_pad_sspd["English"]["keterangan"] = "";
	$fieldLabelspad_pad_sspd["English"]["bulan_telat"] = "Bulan Telat";
	$fieldToolTipspad_pad_sspd["English"]["bulan_telat"] = "";
	$fieldLabelspad_pad_sspd["English"]["hitung_bunga"] = "Hitung Bunga";
	$fieldToolTipspad_pad_sspd["English"]["hitung_bunga"] = "";
	$fieldLabelspad_pad_sspd["English"]["denda"] = "Denda";
	$fieldToolTipspad_pad_sspd["English"]["denda"] = "";
	$fieldLabelspad_pad_sspd["English"]["bunga"] = "Bunga";
	$fieldToolTipspad_pad_sspd["English"]["bunga"] = "";
	$fieldLabelspad_pad_sspd["English"]["jml_bayar"] = "Jml Bayar";
	$fieldToolTipspad_pad_sspd["English"]["jml_bayar"] = "";
	$fieldLabelspad_pad_sspd["English"]["sisa"] = "Sisa";
	$fieldToolTipspad_pad_sspd["English"]["sisa"] = "";
	$fieldLabelspad_pad_sspd["English"]["jenis_bayar"] = "Jenis Bayar";
	$fieldToolTipspad_pad_sspd["English"]["jenis_bayar"] = "";
	$fieldLabelspad_pad_sspd["English"]["printed"] = "Printed";
	$fieldToolTipspad_pad_sspd["English"]["printed"] = "";
	$fieldLabelspad_pad_sspd["English"]["tp_id"] = "Tp Id";
	$fieldToolTipspad_pad_sspd["English"]["tp_id"] = "";
	$fieldLabelspad_pad_sspd["English"]["is_validated"] = "Is Validated";
	$fieldToolTipspad_pad_sspd["English"]["is_validated"] = "";
	$fieldLabelspad_pad_sspd["English"]["is_valid"] = "Is Valid";
	$fieldToolTipspad_pad_sspd["English"]["is_valid"] = "";
	$fieldLabelspad_pad_sspd["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_sspd["English"]["enabled"] = "";
	$fieldLabelspad_pad_sspd["English"]["created"] = "Created";
	$fieldToolTipspad_pad_sspd["English"]["created"] = "";
	$fieldLabelspad_pad_sspd["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_sspd["English"]["create_uid"] = "";
	$fieldLabelspad_pad_sspd["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_sspd["English"]["updated"] = "";
	$fieldLabelspad_pad_sspd["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_sspd["English"]["update_uid"] = "";
	$fieldLabelspad_pad_sspd["English"]["petugas_id"] = "Petugas Id";
	$fieldToolTipspad_pad_sspd["English"]["petugas_id"] = "";
	$fieldLabelspad_pad_sspd["English"]["pejabat_id"] = "Pejabat Id";
	$fieldToolTipspad_pad_sspd["English"]["pejabat_id"] = "";
	if (count($fieldToolTipspad_pad_sspd["English"]))
		$tdatapad_pad_sspd[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_sspd[".NCSearch"] = true;



$tdatapad_pad_sspd[".shortTableName"] = "pad_pad_sspd";
$tdatapad_pad_sspd[".nSecOptions"] = 0;
$tdatapad_pad_sspd[".recsPerRowList"] = 1;
$tdatapad_pad_sspd[".mainTableOwnerID"] = "";
$tdatapad_pad_sspd[".moveNext"] = 1;
$tdatapad_pad_sspd[".nType"] = 0;

$tdatapad_pad_sspd[".strOriginalTableName"] = "pad.pad_sspd";




$tdatapad_pad_sspd[".showAddInPopup"] = false;

$tdatapad_pad_sspd[".showEditInPopup"] = false;

$tdatapad_pad_sspd[".showViewInPopup"] = false;

$tdatapad_pad_sspd[".fieldsForRegister"] = array();

$tdatapad_pad_sspd[".listAjax"] = false;

	$tdatapad_pad_sspd[".audit"] = false;

	$tdatapad_pad_sspd[".locking"] = false;

$tdatapad_pad_sspd[".listIcons"] = true;
$tdatapad_pad_sspd[".edit"] = true;
$tdatapad_pad_sspd[".inlineEdit"] = true;
$tdatapad_pad_sspd[".inlineAdd"] = true;
$tdatapad_pad_sspd[".view"] = true;

$tdatapad_pad_sspd[".exportTo"] = true;

$tdatapad_pad_sspd[".printFriendly"] = true;

$tdatapad_pad_sspd[".delete"] = true;

$tdatapad_pad_sspd[".showSimpleSearchOptions"] = false;

$tdatapad_pad_sspd[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_sspd[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_sspd[".isUseAjaxSuggest"] = true;

$tdatapad_pad_sspd[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_sspd[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_sspd[".isUseTimeForSearch"] = false;



$tdatapad_pad_sspd[".useDetailsPreview"] = true;

$tdatapad_pad_sspd[".allSearchFields"] = array();

$tdatapad_pad_sspd[".allSearchFields"][] = "id";
$tdatapad_pad_sspd[".allSearchFields"][] = "tahun";
$tdatapad_pad_sspd[".allSearchFields"][] = "sspdno";
$tdatapad_pad_sspd[".allSearchFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".allSearchFields"][] = "sspdjam";
$tdatapad_pad_sspd[".allSearchFields"][] = "invoice_id";
$tdatapad_pad_sspd[".allSearchFields"][] = "keterangan";
$tdatapad_pad_sspd[".allSearchFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".allSearchFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".allSearchFields"][] = "denda";
$tdatapad_pad_sspd[".allSearchFields"][] = "bunga";
$tdatapad_pad_sspd[".allSearchFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".allSearchFields"][] = "sisa";
$tdatapad_pad_sspd[".allSearchFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".allSearchFields"][] = "printed";
$tdatapad_pad_sspd[".allSearchFields"][] = "tp_id";
$tdatapad_pad_sspd[".allSearchFields"][] = "is_validated";
$tdatapad_pad_sspd[".allSearchFields"][] = "is_valid";
$tdatapad_pad_sspd[".allSearchFields"][] = "enabled";
$tdatapad_pad_sspd[".allSearchFields"][] = "created";
$tdatapad_pad_sspd[".allSearchFields"][] = "create_uid";
$tdatapad_pad_sspd[".allSearchFields"][] = "updated";
$tdatapad_pad_sspd[".allSearchFields"][] = "update_uid";
$tdatapad_pad_sspd[".allSearchFields"][] = "petugas_id";
$tdatapad_pad_sspd[".allSearchFields"][] = "pejabat_id";

$tdatapad_pad_sspd[".googleLikeFields"][] = "id";
$tdatapad_pad_sspd[".googleLikeFields"][] = "tahun";
$tdatapad_pad_sspd[".googleLikeFields"][] = "sspdno";
$tdatapad_pad_sspd[".googleLikeFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".googleLikeFields"][] = "sspdjam";
$tdatapad_pad_sspd[".googleLikeFields"][] = "invoice_id";
$tdatapad_pad_sspd[".googleLikeFields"][] = "keterangan";
$tdatapad_pad_sspd[".googleLikeFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".googleLikeFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".googleLikeFields"][] = "denda";
$tdatapad_pad_sspd[".googleLikeFields"][] = "bunga";
$tdatapad_pad_sspd[".googleLikeFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".googleLikeFields"][] = "sisa";
$tdatapad_pad_sspd[".googleLikeFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".googleLikeFields"][] = "printed";
$tdatapad_pad_sspd[".googleLikeFields"][] = "tp_id";
$tdatapad_pad_sspd[".googleLikeFields"][] = "is_validated";
$tdatapad_pad_sspd[".googleLikeFields"][] = "is_valid";
$tdatapad_pad_sspd[".googleLikeFields"][] = "enabled";
$tdatapad_pad_sspd[".googleLikeFields"][] = "created";
$tdatapad_pad_sspd[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_sspd[".googleLikeFields"][] = "updated";
$tdatapad_pad_sspd[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_sspd[".googleLikeFields"][] = "petugas_id";
$tdatapad_pad_sspd[".googleLikeFields"][] = "pejabat_id";


$tdatapad_pad_sspd[".advSearchFields"][] = "id";
$tdatapad_pad_sspd[".advSearchFields"][] = "tahun";
$tdatapad_pad_sspd[".advSearchFields"][] = "sspdno";
$tdatapad_pad_sspd[".advSearchFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".advSearchFields"][] = "sspdjam";
$tdatapad_pad_sspd[".advSearchFields"][] = "invoice_id";
$tdatapad_pad_sspd[".advSearchFields"][] = "keterangan";
$tdatapad_pad_sspd[".advSearchFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".advSearchFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".advSearchFields"][] = "denda";
$tdatapad_pad_sspd[".advSearchFields"][] = "bunga";
$tdatapad_pad_sspd[".advSearchFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".advSearchFields"][] = "sisa";
$tdatapad_pad_sspd[".advSearchFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".advSearchFields"][] = "printed";
$tdatapad_pad_sspd[".advSearchFields"][] = "tp_id";
$tdatapad_pad_sspd[".advSearchFields"][] = "is_validated";
$tdatapad_pad_sspd[".advSearchFields"][] = "is_valid";
$tdatapad_pad_sspd[".advSearchFields"][] = "enabled";
$tdatapad_pad_sspd[".advSearchFields"][] = "created";
$tdatapad_pad_sspd[".advSearchFields"][] = "create_uid";
$tdatapad_pad_sspd[".advSearchFields"][] = "updated";
$tdatapad_pad_sspd[".advSearchFields"][] = "update_uid";
$tdatapad_pad_sspd[".advSearchFields"][] = "petugas_id";
$tdatapad_pad_sspd[".advSearchFields"][] = "pejabat_id";

$tdatapad_pad_sspd[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdatapad_pad_sspd[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_sspd[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_sspd[".orderindexes"] = array();

$tdatapad_pad_sspd[".sqlHead"] = "SELECT id,   tahun,   sspdno,   sspdtgl,   sspdjam,   invoice_id,   keterangan,   bulan_telat,   hitung_bunga,   denda,   bunga,   jml_bayar,   sisa,   jenis_bayar,   printed,   tp_id,   is_validated,   is_valid,   enabled,   created,   create_uid,   updated,   update_uid,   petugas_id,   pejabat_id";
$tdatapad_pad_sspd[".sqlFrom"] = "FROM \"pad\".pad_sspd";
$tdatapad_pad_sspd[".sqlWhereExpr"] = "";
$tdatapad_pad_sspd[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_sspd[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_sspd[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_sspd = array();
$tableKeyspad_pad_sspd[] = "id";
$tdatapad_pad_sspd[".Keys"] = $tableKeyspad_pad_sspd;

$tdatapad_pad_sspd[".listFields"] = array();
$tdatapad_pad_sspd[".listFields"][] = "id";
$tdatapad_pad_sspd[".listFields"][] = "tahun";
$tdatapad_pad_sspd[".listFields"][] = "sspdno";
$tdatapad_pad_sspd[".listFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".listFields"][] = "sspdjam";
$tdatapad_pad_sspd[".listFields"][] = "invoice_id";
$tdatapad_pad_sspd[".listFields"][] = "keterangan";
$tdatapad_pad_sspd[".listFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".listFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".listFields"][] = "denda";
$tdatapad_pad_sspd[".listFields"][] = "bunga";
$tdatapad_pad_sspd[".listFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".listFields"][] = "sisa";
$tdatapad_pad_sspd[".listFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".listFields"][] = "printed";
$tdatapad_pad_sspd[".listFields"][] = "tp_id";
$tdatapad_pad_sspd[".listFields"][] = "is_validated";
$tdatapad_pad_sspd[".listFields"][] = "is_valid";
$tdatapad_pad_sspd[".listFields"][] = "enabled";
$tdatapad_pad_sspd[".listFields"][] = "created";
$tdatapad_pad_sspd[".listFields"][] = "create_uid";
$tdatapad_pad_sspd[".listFields"][] = "updated";
$tdatapad_pad_sspd[".listFields"][] = "update_uid";
$tdatapad_pad_sspd[".listFields"][] = "petugas_id";
$tdatapad_pad_sspd[".listFields"][] = "pejabat_id";

$tdatapad_pad_sspd[".viewFields"] = array();
$tdatapad_pad_sspd[".viewFields"][] = "id";
$tdatapad_pad_sspd[".viewFields"][] = "tahun";
$tdatapad_pad_sspd[".viewFields"][] = "sspdno";
$tdatapad_pad_sspd[".viewFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".viewFields"][] = "sspdjam";
$tdatapad_pad_sspd[".viewFields"][] = "invoice_id";
$tdatapad_pad_sspd[".viewFields"][] = "keterangan";
$tdatapad_pad_sspd[".viewFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".viewFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".viewFields"][] = "denda";
$tdatapad_pad_sspd[".viewFields"][] = "bunga";
$tdatapad_pad_sspd[".viewFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".viewFields"][] = "sisa";
$tdatapad_pad_sspd[".viewFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".viewFields"][] = "printed";
$tdatapad_pad_sspd[".viewFields"][] = "tp_id";
$tdatapad_pad_sspd[".viewFields"][] = "is_validated";
$tdatapad_pad_sspd[".viewFields"][] = "is_valid";
$tdatapad_pad_sspd[".viewFields"][] = "enabled";
$tdatapad_pad_sspd[".viewFields"][] = "created";
$tdatapad_pad_sspd[".viewFields"][] = "create_uid";
$tdatapad_pad_sspd[".viewFields"][] = "updated";
$tdatapad_pad_sspd[".viewFields"][] = "update_uid";
$tdatapad_pad_sspd[".viewFields"][] = "petugas_id";
$tdatapad_pad_sspd[".viewFields"][] = "pejabat_id";

$tdatapad_pad_sspd[".addFields"] = array();
$tdatapad_pad_sspd[".addFields"][] = "tahun";
$tdatapad_pad_sspd[".addFields"][] = "sspdno";
$tdatapad_pad_sspd[".addFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".addFields"][] = "sspdjam";
$tdatapad_pad_sspd[".addFields"][] = "invoice_id";
$tdatapad_pad_sspd[".addFields"][] = "keterangan";
$tdatapad_pad_sspd[".addFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".addFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".addFields"][] = "denda";
$tdatapad_pad_sspd[".addFields"][] = "bunga";
$tdatapad_pad_sspd[".addFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".addFields"][] = "sisa";
$tdatapad_pad_sspd[".addFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".addFields"][] = "printed";
$tdatapad_pad_sspd[".addFields"][] = "tp_id";
$tdatapad_pad_sspd[".addFields"][] = "is_validated";
$tdatapad_pad_sspd[".addFields"][] = "is_valid";
$tdatapad_pad_sspd[".addFields"][] = "enabled";
$tdatapad_pad_sspd[".addFields"][] = "created";
$tdatapad_pad_sspd[".addFields"][] = "create_uid";
$tdatapad_pad_sspd[".addFields"][] = "updated";
$tdatapad_pad_sspd[".addFields"][] = "update_uid";
$tdatapad_pad_sspd[".addFields"][] = "petugas_id";
$tdatapad_pad_sspd[".addFields"][] = "pejabat_id";

$tdatapad_pad_sspd[".inlineAddFields"] = array();
$tdatapad_pad_sspd[".inlineAddFields"][] = "tahun";
$tdatapad_pad_sspd[".inlineAddFields"][] = "sspdno";
$tdatapad_pad_sspd[".inlineAddFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".inlineAddFields"][] = "sspdjam";
$tdatapad_pad_sspd[".inlineAddFields"][] = "invoice_id";
$tdatapad_pad_sspd[".inlineAddFields"][] = "keterangan";
$tdatapad_pad_sspd[".inlineAddFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".inlineAddFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".inlineAddFields"][] = "denda";
$tdatapad_pad_sspd[".inlineAddFields"][] = "bunga";
$tdatapad_pad_sspd[".inlineAddFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".inlineAddFields"][] = "sisa";
$tdatapad_pad_sspd[".inlineAddFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".inlineAddFields"][] = "printed";
$tdatapad_pad_sspd[".inlineAddFields"][] = "tp_id";
$tdatapad_pad_sspd[".inlineAddFields"][] = "is_validated";
$tdatapad_pad_sspd[".inlineAddFields"][] = "is_valid";
$tdatapad_pad_sspd[".inlineAddFields"][] = "enabled";
$tdatapad_pad_sspd[".inlineAddFields"][] = "created";
$tdatapad_pad_sspd[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_sspd[".inlineAddFields"][] = "updated";
$tdatapad_pad_sspd[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_sspd[".inlineAddFields"][] = "petugas_id";
$tdatapad_pad_sspd[".inlineAddFields"][] = "pejabat_id";

$tdatapad_pad_sspd[".editFields"] = array();
$tdatapad_pad_sspd[".editFields"][] = "tahun";
$tdatapad_pad_sspd[".editFields"][] = "sspdno";
$tdatapad_pad_sspd[".editFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".editFields"][] = "sspdjam";
$tdatapad_pad_sspd[".editFields"][] = "invoice_id";
$tdatapad_pad_sspd[".editFields"][] = "keterangan";
$tdatapad_pad_sspd[".editFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".editFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".editFields"][] = "denda";
$tdatapad_pad_sspd[".editFields"][] = "bunga";
$tdatapad_pad_sspd[".editFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".editFields"][] = "sisa";
$tdatapad_pad_sspd[".editFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".editFields"][] = "printed";
$tdatapad_pad_sspd[".editFields"][] = "tp_id";
$tdatapad_pad_sspd[".editFields"][] = "is_validated";
$tdatapad_pad_sspd[".editFields"][] = "is_valid";
$tdatapad_pad_sspd[".editFields"][] = "enabled";
$tdatapad_pad_sspd[".editFields"][] = "created";
$tdatapad_pad_sspd[".editFields"][] = "create_uid";
$tdatapad_pad_sspd[".editFields"][] = "updated";
$tdatapad_pad_sspd[".editFields"][] = "update_uid";
$tdatapad_pad_sspd[".editFields"][] = "petugas_id";
$tdatapad_pad_sspd[".editFields"][] = "pejabat_id";

$tdatapad_pad_sspd[".inlineEditFields"] = array();
$tdatapad_pad_sspd[".inlineEditFields"][] = "tahun";
$tdatapad_pad_sspd[".inlineEditFields"][] = "sspdno";
$tdatapad_pad_sspd[".inlineEditFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".inlineEditFields"][] = "sspdjam";
$tdatapad_pad_sspd[".inlineEditFields"][] = "invoice_id";
$tdatapad_pad_sspd[".inlineEditFields"][] = "keterangan";
$tdatapad_pad_sspd[".inlineEditFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".inlineEditFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".inlineEditFields"][] = "denda";
$tdatapad_pad_sspd[".inlineEditFields"][] = "bunga";
$tdatapad_pad_sspd[".inlineEditFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".inlineEditFields"][] = "sisa";
$tdatapad_pad_sspd[".inlineEditFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".inlineEditFields"][] = "printed";
$tdatapad_pad_sspd[".inlineEditFields"][] = "tp_id";
$tdatapad_pad_sspd[".inlineEditFields"][] = "is_validated";
$tdatapad_pad_sspd[".inlineEditFields"][] = "is_valid";
$tdatapad_pad_sspd[".inlineEditFields"][] = "enabled";
$tdatapad_pad_sspd[".inlineEditFields"][] = "created";
$tdatapad_pad_sspd[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_sspd[".inlineEditFields"][] = "updated";
$tdatapad_pad_sspd[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_sspd[".inlineEditFields"][] = "petugas_id";
$tdatapad_pad_sspd[".inlineEditFields"][] = "pejabat_id";

$tdatapad_pad_sspd[".exportFields"] = array();
$tdatapad_pad_sspd[".exportFields"][] = "id";
$tdatapad_pad_sspd[".exportFields"][] = "tahun";
$tdatapad_pad_sspd[".exportFields"][] = "sspdno";
$tdatapad_pad_sspd[".exportFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".exportFields"][] = "sspdjam";
$tdatapad_pad_sspd[".exportFields"][] = "invoice_id";
$tdatapad_pad_sspd[".exportFields"][] = "keterangan";
$tdatapad_pad_sspd[".exportFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".exportFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".exportFields"][] = "denda";
$tdatapad_pad_sspd[".exportFields"][] = "bunga";
$tdatapad_pad_sspd[".exportFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".exportFields"][] = "sisa";
$tdatapad_pad_sspd[".exportFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".exportFields"][] = "printed";
$tdatapad_pad_sspd[".exportFields"][] = "tp_id";
$tdatapad_pad_sspd[".exportFields"][] = "is_validated";
$tdatapad_pad_sspd[".exportFields"][] = "is_valid";
$tdatapad_pad_sspd[".exportFields"][] = "enabled";
$tdatapad_pad_sspd[".exportFields"][] = "created";
$tdatapad_pad_sspd[".exportFields"][] = "create_uid";
$tdatapad_pad_sspd[".exportFields"][] = "updated";
$tdatapad_pad_sspd[".exportFields"][] = "update_uid";
$tdatapad_pad_sspd[".exportFields"][] = "petugas_id";
$tdatapad_pad_sspd[".exportFields"][] = "pejabat_id";

$tdatapad_pad_sspd[".printFields"] = array();
$tdatapad_pad_sspd[".printFields"][] = "id";
$tdatapad_pad_sspd[".printFields"][] = "tahun";
$tdatapad_pad_sspd[".printFields"][] = "sspdno";
$tdatapad_pad_sspd[".printFields"][] = "sspdtgl";
$tdatapad_pad_sspd[".printFields"][] = "sspdjam";
$tdatapad_pad_sspd[".printFields"][] = "invoice_id";
$tdatapad_pad_sspd[".printFields"][] = "keterangan";
$tdatapad_pad_sspd[".printFields"][] = "bulan_telat";
$tdatapad_pad_sspd[".printFields"][] = "hitung_bunga";
$tdatapad_pad_sspd[".printFields"][] = "denda";
$tdatapad_pad_sspd[".printFields"][] = "bunga";
$tdatapad_pad_sspd[".printFields"][] = "jml_bayar";
$tdatapad_pad_sspd[".printFields"][] = "sisa";
$tdatapad_pad_sspd[".printFields"][] = "jenis_bayar";
$tdatapad_pad_sspd[".printFields"][] = "printed";
$tdatapad_pad_sspd[".printFields"][] = "tp_id";
$tdatapad_pad_sspd[".printFields"][] = "is_validated";
$tdatapad_pad_sspd[".printFields"][] = "is_valid";
$tdatapad_pad_sspd[".printFields"][] = "enabled";
$tdatapad_pad_sspd[".printFields"][] = "created";
$tdatapad_pad_sspd[".printFields"][] = "create_uid";
$tdatapad_pad_sspd[".printFields"][] = "updated";
$tdatapad_pad_sspd[".printFields"][] = "update_uid";
$tdatapad_pad_sspd[".printFields"][] = "petugas_id";
$tdatapad_pad_sspd[".printFields"][] = "pejabat_id";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["id"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["tahun"] = $fdata;
//	sspdno
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "sspdno";
	$fdata["GoodName"] = "sspdno";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Sspdno"; 
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
	
		$fdata["strField"] = "sspdno"; 
		$fdata["FullName"] = "sspdno";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["sspdno"] = $fdata;
//	sspdtgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "sspdtgl";
	$fdata["GoodName"] = "sspdtgl";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Sspdtgl"; 
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
	
		$fdata["strField"] = "sspdtgl"; 
		$fdata["FullName"] = "sspdtgl";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["sspdtgl"] = $fdata;
//	sspdjam
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "sspdjam";
	$fdata["GoodName"] = "sspdjam";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Sspdjam"; 
	$fdata["FieldType"] = 134;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "sspdjam"; 
		$fdata["FullName"] = "sspdjam";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Time");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Time");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
				$hours = 24;
	$edata["FormatTimeAttrs"] = array("useTimePicker" => 0,
									  "hours" => $hours,
									  "minutes" => 1,
									  "showSeconds" => 0);
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_sspd["sspdjam"] = $fdata;
//	invoice_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "invoice_id";
	$fdata["GoodName"] = "invoice_id";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Invoice Id"; 
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
	
		
		
	$tdatapad_pad_sspd["invoice_id"] = $fdata;
//	keterangan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "keterangan";
	$fdata["GoodName"] = "keterangan";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
			$edata["EditParams"].= " maxlength=255";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_sspd["keterangan"] = $fdata;
//	bulan_telat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "bulan_telat";
	$fdata["GoodName"] = "bulan_telat";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Bulan Telat"; 
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
	
		$fdata["strField"] = "bulan_telat"; 
		$fdata["FullName"] = "bulan_telat";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["bulan_telat"] = $fdata;
//	hitung_bunga
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "hitung_bunga";
	$fdata["GoodName"] = "hitung_bunga";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Hitung Bunga"; 
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
	
		$fdata["strField"] = "hitung_bunga"; 
		$fdata["FullName"] = "hitung_bunga";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["hitung_bunga"] = $fdata;
//	denda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "denda";
	$fdata["GoodName"] = "denda";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["denda"] = $fdata;
//	bunga
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "bunga";
	$fdata["GoodName"] = "bunga";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["bunga"] = $fdata;
//	jml_bayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "jml_bayar";
	$fdata["GoodName"] = "jml_bayar";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Jml Bayar"; 
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
	
		$fdata["strField"] = "jml_bayar"; 
		$fdata["FullName"] = "jml_bayar";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["jml_bayar"] = $fdata;
//	sisa
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "sisa";
	$fdata["GoodName"] = "sisa";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Sisa"; 
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
	
		$fdata["strField"] = "sisa"; 
		$fdata["FullName"] = "sisa";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["sisa"] = $fdata;
//	jenis_bayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "jenis_bayar";
	$fdata["GoodName"] = "jenis_bayar";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Jenis Bayar"; 
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
	
		$fdata["strField"] = "jenis_bayar"; 
		$fdata["FullName"] = "jenis_bayar";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["jenis_bayar"] = $fdata;
//	printed
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "printed";
	$fdata["GoodName"] = "printed";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["printed"] = $fdata;
//	tp_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "tp_id";
	$fdata["GoodName"] = "tp_id";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Tp Id"; 
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
	
		$fdata["strField"] = "tp_id"; 
		$fdata["FullName"] = "tp_id";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["tp_id"] = $fdata;
//	is_validated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "is_validated";
	$fdata["GoodName"] = "is_validated";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Is Validated"; 
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
	
		$fdata["strField"] = "is_validated"; 
		$fdata["FullName"] = "is_validated";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["is_validated"] = $fdata;
//	is_valid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "is_valid";
	$fdata["GoodName"] = "is_valid";
	$fdata["ownerTable"] = "pad.pad_sspd";
	$fdata["Label"] = "Is Valid"; 
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
	
		$fdata["strField"] = "is_valid"; 
		$fdata["FullName"] = "is_valid";
	
		
		
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
	
		
		
	$tdatapad_pad_sspd["is_valid"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["update_uid"] = $fdata;
//	petugas_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
	$fdata["strName"] = "petugas_id";
	$fdata["GoodName"] = "petugas_id";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["petugas_id"] = $fdata;
//	pejabat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
	$fdata["strName"] = "pejabat_id";
	$fdata["GoodName"] = "pejabat_id";
	$fdata["ownerTable"] = "pad.pad_sspd";
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
	
		
		
	$tdatapad_pad_sspd["pejabat_id"] = $fdata;

	
$tables_data["pad.pad_sspd"]=&$tdatapad_pad_sspd;
$field_labels["pad_pad_sspd"] = &$fieldLabelspad_pad_sspd;
$fieldToolTips["pad.pad_sspd"] = &$fieldToolTipspad_pad_sspd;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_sspd"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="public.pad_payment";
	$detailsParam["dDataSourceTable"]="public.pad_payment";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="public_pad_payment";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_sspd"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_sspd"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_sspd"][$dIndex]["detailKeys"][]="id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_sspd"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_sspd()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tahun,   sspdno,   sspdtgl,   sspdjam,   invoice_id,   keterangan,   bulan_telat,   hitung_bunga,   denda,   bunga,   jml_bayar,   sisa,   jenis_bayar,   printed,   tp_id,   is_validated,   is_valid,   enabled,   created,   create_uid,   updated,   update_uid,   petugas_id,   pejabat_id";
$proto0["m_strFrom"] = "FROM \"pad\".pad_sspd";
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
	"m_strTable" => "pad.pad_sspd"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "pad.pad_sspd"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "sspdno",
	"m_strTable" => "pad.pad_sspd"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "sspdtgl",
	"m_strTable" => "pad.pad_sspd"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "sspdjam",
	"m_strTable" => "pad.pad_sspd"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "invoice_id",
	"m_strTable" => "pad.pad_sspd"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan",
	"m_strTable" => "pad.pad_sspd"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan_telat",
	"m_strTable" => "pad.pad_sspd"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "hitung_bunga",
	"m_strTable" => "pad.pad_sspd"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "denda",
	"m_strTable" => "pad.pad_sspd"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "bunga",
	"m_strTable" => "pad.pad_sspd"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "jml_bayar",
	"m_strTable" => "pad.pad_sspd"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "sisa",
	"m_strTable" => "pad.pad_sspd"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "jenis_bayar",
	"m_strTable" => "pad.pad_sspd"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "printed",
	"m_strTable" => "pad.pad_sspd"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "tp_id",
	"m_strTable" => "pad.pad_sspd"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "is_validated",
	"m_strTable" => "pad.pad_sspd"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "is_valid",
	"m_strTable" => "pad.pad_sspd"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_sspd"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_sspd"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_sspd"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_sspd"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_sspd"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$obj = new SQLField(array(
	"m_strName" => "petugas_id",
	"m_strTable" => "pad.pad_sspd"
));

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto53=array();
			$obj = new SQLField(array(
	"m_strName" => "pejabat_id",
	"m_strTable" => "pad.pad_sspd"
));

$proto53["m_expr"]=$obj;
$proto53["m_alias"] = "";
$obj = new SQLFieldListItem($proto53);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto55=array();
$proto55["m_link"] = "SQLL_MAIN";
			$proto56=array();
$proto56["m_strName"] = "pad.pad_sspd";
$proto56["m_columns"] = array();
$proto56["m_columns"][] = "id";
$proto56["m_columns"][] = "tahun";
$proto56["m_columns"][] = "sspdno";
$proto56["m_columns"][] = "sspdtgl";
$proto56["m_columns"][] = "sspdjam";
$proto56["m_columns"][] = "invoice_id";
$proto56["m_columns"][] = "keterangan";
$proto56["m_columns"][] = "bulan_telat";
$proto56["m_columns"][] = "hitung_bunga";
$proto56["m_columns"][] = "denda";
$proto56["m_columns"][] = "bunga";
$proto56["m_columns"][] = "jml_bayar";
$proto56["m_columns"][] = "sisa";
$proto56["m_columns"][] = "jenis_bayar";
$proto56["m_columns"][] = "printed";
$proto56["m_columns"][] = "tp_id";
$proto56["m_columns"][] = "is_validated";
$proto56["m_columns"][] = "is_valid";
$proto56["m_columns"][] = "enabled";
$proto56["m_columns"][] = "created";
$proto56["m_columns"][] = "create_uid";
$proto56["m_columns"][] = "updated";
$proto56["m_columns"][] = "update_uid";
$proto56["m_columns"][] = "petugas_id";
$proto56["m_columns"][] = "pejabat_id";
$obj = new SQLTable($proto56);

$proto55["m_table"] = $obj;
$proto55["m_alias"] = "";
$proto57=array();
$proto57["m_sql"] = "";
$proto57["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto57["m_column"]=$obj;
$proto57["m_contained"] = array();
$proto57["m_strCase"] = "";
$proto57["m_havingmode"] = "0";
$proto57["m_inBrackets"] = "0";
$proto57["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto57);

$proto55["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto55);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_sspd = createSqlQuery_pad_pad_sspd();
																									$tdatapad_pad_sspd[".sqlquery"] = $queryData_pad_pad_sspd;
	
if(isset($tdatapad_pad_sspd["field2"])){
	$tdatapad_pad_sspd["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_sspd["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_sspd["field2"]["LookupType"] = 4;
	$tdatapad_pad_sspd["field2"]["LinkField"] = "email";
	$tdatapad_pad_sspd["field2"]["DisplayField"] = "name";
	$tdatapad_pad_sspd[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_sspd"] = new eventsBase;
$tdatapad_pad_sspd[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_sspd");

?>