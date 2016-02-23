<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_spt_reklame = array();
	$tdatapad_pad_spt_reklame[".NumberOfChars"] = 80; 
	$tdatapad_pad_spt_reklame[".ShortName"] = "pad_pad_spt_reklame";
	$tdatapad_pad_spt_reklame[".OwnerID"] = "";
	$tdatapad_pad_spt_reklame[".OriginalTable"] = "pad.pad_spt_reklame";

//	field labels
$fieldLabelspad_pad_spt_reklame = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_spt_reklame["English"] = array();
	$fieldToolTipspad_pad_spt_reklame["English"] = array();
	$fieldLabelspad_pad_spt_reklame["English"]["id"] = "Id";
	$fieldToolTipspad_pad_spt_reklame["English"]["id"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["spt_id"] = "Spt Id";
	$fieldToolTipspad_pad_spt_reklame["English"]["spt_id"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["media_id"] = "Media Id";
	$fieldToolTipspad_pad_spt_reklame["English"]["media_id"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["kelas_jalan_id"] = "Kelas Jalan Id";
	$fieldToolTipspad_pad_spt_reklame["English"]["kelas_jalan_id"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["panjang"] = "Panjang";
	$fieldToolTipspad_pad_spt_reklame["English"]["panjang"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["lebar"] = "Lebar";
	$fieldToolTipspad_pad_spt_reklame["English"]["lebar"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["tinggi"] = "Tinggi";
	$fieldToolTipspad_pad_spt_reklame["English"]["tinggi"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["muka"] = "Muka";
	$fieldToolTipspad_pad_spt_reklame["English"]["muka"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["sisi"] = "Sisi";
	$fieldToolTipspad_pad_spt_reklame["English"]["sisi"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["banyak"] = "Banyak";
	$fieldToolTipspad_pad_spt_reklame["English"]["banyak"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["lama"] = "Lama";
	$fieldToolTipspad_pad_spt_reklame["English"]["lama"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["nsr"] = "Nsr";
	$fieldToolTipspad_pad_spt_reklame["English"]["nsr"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["alamat"] = "Alamat";
	$fieldToolTipspad_pad_spt_reklame["English"]["alamat"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_spt_reklame["English"]["update_uid"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_spt_reklame["English"]["create_uid"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_spt_reklame["English"]["updated"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["created"] = "Created";
	$fieldToolTipspad_pad_spt_reklame["English"]["created"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["status_baliho"] = "Status Baliho";
	$fieldToolTipspad_pad_spt_reklame["English"]["status_baliho"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["tambahan"] = "Tambahan";
	$fieldToolTipspad_pad_spt_reklame["English"]["tambahan"] = "";
	$fieldLabelspad_pad_spt_reklame["English"]["jalan_id"] = "Jalan Id";
	$fieldToolTipspad_pad_spt_reklame["English"]["jalan_id"] = "";
	if (count($fieldToolTipspad_pad_spt_reklame["English"]))
		$tdatapad_pad_spt_reklame[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_spt_reklame[".NCSearch"] = true;



$tdatapad_pad_spt_reklame[".shortTableName"] = "pad_pad_spt_reklame";
$tdatapad_pad_spt_reklame[".nSecOptions"] = 0;
$tdatapad_pad_spt_reklame[".recsPerRowList"] = 1;
$tdatapad_pad_spt_reklame[".mainTableOwnerID"] = "";
$tdatapad_pad_spt_reklame[".moveNext"] = 1;
$tdatapad_pad_spt_reklame[".nType"] = 0;

$tdatapad_pad_spt_reklame[".strOriginalTableName"] = "pad.pad_spt_reklame";




$tdatapad_pad_spt_reklame[".showAddInPopup"] = false;

$tdatapad_pad_spt_reklame[".showEditInPopup"] = false;

$tdatapad_pad_spt_reklame[".showViewInPopup"] = false;

$tdatapad_pad_spt_reklame[".fieldsForRegister"] = array();

$tdatapad_pad_spt_reklame[".listAjax"] = false;

	$tdatapad_pad_spt_reklame[".audit"] = false;

	$tdatapad_pad_spt_reklame[".locking"] = false;

$tdatapad_pad_spt_reklame[".listIcons"] = true;
$tdatapad_pad_spt_reklame[".edit"] = true;
$tdatapad_pad_spt_reklame[".inlineEdit"] = true;
$tdatapad_pad_spt_reklame[".inlineAdd"] = true;
$tdatapad_pad_spt_reklame[".view"] = true;

$tdatapad_pad_spt_reklame[".exportTo"] = true;

$tdatapad_pad_spt_reklame[".printFriendly"] = true;

$tdatapad_pad_spt_reklame[".delete"] = true;

$tdatapad_pad_spt_reklame[".showSimpleSearchOptions"] = false;

$tdatapad_pad_spt_reklame[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_spt_reklame[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_spt_reklame[".isUseAjaxSuggest"] = true;

$tdatapad_pad_spt_reklame[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_spt_reklame[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_spt_reklame[".isUseTimeForSearch"] = false;




$tdatapad_pad_spt_reklame[".allSearchFields"] = array();

$tdatapad_pad_spt_reklame[".allSearchFields"][] = "id";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "muka";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "lama";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "updated";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "created";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".allSearchFields"][] = "jalan_id";

$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "id";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "muka";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "lama";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "updated";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "created";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".googleLikeFields"][] = "jalan_id";


$tdatapad_pad_spt_reklame[".advSearchFields"][] = "id";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "muka";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "lama";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "updated";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "created";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".advSearchFields"][] = "jalan_id";

$tdatapad_pad_spt_reklame[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_spt_reklame[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_spt_reklame[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_spt_reklame[".orderindexes"] = array();

$tdatapad_pad_spt_reklame[".sqlHead"] = "SELECT id,   spt_id,   media_id,   kelas_jalan_id,   panjang,   lebar,   tinggi,   muka,   sisi,   banyak,   lama,   nsr,   alamat,   update_uid,   create_uid,   updated,   created,   status_baliho,   tambahan,   jalan_id";
$tdatapad_pad_spt_reklame[".sqlFrom"] = "FROM \"pad\".pad_spt_reklame";
$tdatapad_pad_spt_reklame[".sqlWhereExpr"] = "";
$tdatapad_pad_spt_reklame[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_spt_reklame[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_spt_reklame[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_spt_reklame = array();
$tableKeyspad_pad_spt_reklame[] = "id";
$tdatapad_pad_spt_reklame[".Keys"] = $tableKeyspad_pad_spt_reklame;

$tdatapad_pad_spt_reklame[".listFields"] = array();
$tdatapad_pad_spt_reklame[".listFields"][] = "id";
$tdatapad_pad_spt_reklame[".listFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".listFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".listFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".listFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".listFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".listFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".listFields"][] = "muka";
$tdatapad_pad_spt_reklame[".listFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".listFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".listFields"][] = "lama";
$tdatapad_pad_spt_reklame[".listFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".listFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".listFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".listFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".listFields"][] = "updated";
$tdatapad_pad_spt_reklame[".listFields"][] = "created";
$tdatapad_pad_spt_reklame[".listFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".listFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".listFields"][] = "jalan_id";

$tdatapad_pad_spt_reklame[".viewFields"] = array();
$tdatapad_pad_spt_reklame[".viewFields"][] = "id";
$tdatapad_pad_spt_reklame[".viewFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".viewFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".viewFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".viewFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".viewFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".viewFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".viewFields"][] = "muka";
$tdatapad_pad_spt_reklame[".viewFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".viewFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".viewFields"][] = "lama";
$tdatapad_pad_spt_reklame[".viewFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".viewFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".viewFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".viewFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".viewFields"][] = "updated";
$tdatapad_pad_spt_reklame[".viewFields"][] = "created";
$tdatapad_pad_spt_reklame[".viewFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".viewFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".viewFields"][] = "jalan_id";

$tdatapad_pad_spt_reklame[".addFields"] = array();
$tdatapad_pad_spt_reklame[".addFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".addFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".addFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".addFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".addFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".addFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".addFields"][] = "muka";
$tdatapad_pad_spt_reklame[".addFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".addFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".addFields"][] = "lama";
$tdatapad_pad_spt_reklame[".addFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".addFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".addFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".addFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".addFields"][] = "updated";
$tdatapad_pad_spt_reklame[".addFields"][] = "created";
$tdatapad_pad_spt_reklame[".addFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".addFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".addFields"][] = "jalan_id";

$tdatapad_pad_spt_reklame[".inlineAddFields"] = array();
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "muka";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "lama";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "updated";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "created";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".inlineAddFields"][] = "jalan_id";

$tdatapad_pad_spt_reklame[".editFields"] = array();
$tdatapad_pad_spt_reklame[".editFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".editFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".editFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".editFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".editFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".editFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".editFields"][] = "muka";
$tdatapad_pad_spt_reklame[".editFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".editFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".editFields"][] = "lama";
$tdatapad_pad_spt_reklame[".editFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".editFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".editFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".editFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".editFields"][] = "updated";
$tdatapad_pad_spt_reklame[".editFields"][] = "created";
$tdatapad_pad_spt_reklame[".editFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".editFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".editFields"][] = "jalan_id";

$tdatapad_pad_spt_reklame[".inlineEditFields"] = array();
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "muka";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "lama";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "updated";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "created";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".inlineEditFields"][] = "jalan_id";

$tdatapad_pad_spt_reklame[".exportFields"] = array();
$tdatapad_pad_spt_reklame[".exportFields"][] = "id";
$tdatapad_pad_spt_reklame[".exportFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".exportFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".exportFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".exportFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".exportFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".exportFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".exportFields"][] = "muka";
$tdatapad_pad_spt_reklame[".exportFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".exportFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".exportFields"][] = "lama";
$tdatapad_pad_spt_reklame[".exportFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".exportFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".exportFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".exportFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".exportFields"][] = "updated";
$tdatapad_pad_spt_reklame[".exportFields"][] = "created";
$tdatapad_pad_spt_reklame[".exportFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".exportFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".exportFields"][] = "jalan_id";

$tdatapad_pad_spt_reklame[".printFields"] = array();
$tdatapad_pad_spt_reklame[".printFields"][] = "id";
$tdatapad_pad_spt_reklame[".printFields"][] = "spt_id";
$tdatapad_pad_spt_reklame[".printFields"][] = "media_id";
$tdatapad_pad_spt_reklame[".printFields"][] = "kelas_jalan_id";
$tdatapad_pad_spt_reklame[".printFields"][] = "panjang";
$tdatapad_pad_spt_reklame[".printFields"][] = "lebar";
$tdatapad_pad_spt_reklame[".printFields"][] = "tinggi";
$tdatapad_pad_spt_reklame[".printFields"][] = "muka";
$tdatapad_pad_spt_reklame[".printFields"][] = "sisi";
$tdatapad_pad_spt_reklame[".printFields"][] = "banyak";
$tdatapad_pad_spt_reklame[".printFields"][] = "lama";
$tdatapad_pad_spt_reklame[".printFields"][] = "nsr";
$tdatapad_pad_spt_reklame[".printFields"][] = "alamat";
$tdatapad_pad_spt_reklame[".printFields"][] = "update_uid";
$tdatapad_pad_spt_reklame[".printFields"][] = "create_uid";
$tdatapad_pad_spt_reklame[".printFields"][] = "updated";
$tdatapad_pad_spt_reklame[".printFields"][] = "created";
$tdatapad_pad_spt_reklame[".printFields"][] = "status_baliho";
$tdatapad_pad_spt_reklame[".printFields"][] = "tambahan";
$tdatapad_pad_spt_reklame[".printFields"][] = "jalan_id";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
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
	
		
		
	$tdatapad_pad_spt_reklame["id"] = $fdata;
//	spt_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "spt_id";
	$fdata["GoodName"] = "spt_id";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
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
	
		
		
	$tdatapad_pad_spt_reklame["spt_id"] = $fdata;
//	media_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "media_id";
	$fdata["GoodName"] = "media_id";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Media Id"; 
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
	
		$fdata["strField"] = "media_id"; 
		$fdata["FullName"] = "media_id";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["media_id"] = $fdata;
//	kelas_jalan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "kelas_jalan_id";
	$fdata["GoodName"] = "kelas_jalan_id";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Kelas Jalan Id"; 
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
	
		$fdata["strField"] = "kelas_jalan_id"; 
		$fdata["FullName"] = "kelas_jalan_id";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["kelas_jalan_id"] = $fdata;
//	panjang
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "panjang";
	$fdata["GoodName"] = "panjang";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Panjang"; 
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
	
		$fdata["strField"] = "panjang"; 
		$fdata["FullName"] = "panjang";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["panjang"] = $fdata;
//	lebar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "lebar";
	$fdata["GoodName"] = "lebar";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Lebar"; 
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
	
		$fdata["strField"] = "lebar"; 
		$fdata["FullName"] = "lebar";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["lebar"] = $fdata;
//	tinggi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "tinggi";
	$fdata["GoodName"] = "tinggi";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Tinggi"; 
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
	
		$fdata["strField"] = "tinggi"; 
		$fdata["FullName"] = "tinggi";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["tinggi"] = $fdata;
//	muka
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "muka";
	$fdata["GoodName"] = "muka";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Muka"; 
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
	
		$fdata["strField"] = "muka"; 
		$fdata["FullName"] = "muka";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["muka"] = $fdata;
//	sisi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "sisi";
	$fdata["GoodName"] = "sisi";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Sisi"; 
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
	
		$fdata["strField"] = "sisi"; 
		$fdata["FullName"] = "sisi";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["sisi"] = $fdata;
//	banyak
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "banyak";
	$fdata["GoodName"] = "banyak";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Banyak"; 
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
	
		$fdata["strField"] = "banyak"; 
		$fdata["FullName"] = "banyak";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["banyak"] = $fdata;
//	lama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "lama";
	$fdata["GoodName"] = "lama";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Lama"; 
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
	
		$fdata["strField"] = "lama"; 
		$fdata["FullName"] = "lama";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["lama"] = $fdata;
//	nsr
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "nsr";
	$fdata["GoodName"] = "nsr";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Nsr"; 
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
	
		$fdata["strField"] = "nsr"; 
		$fdata["FullName"] = "nsr";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["nsr"] = $fdata;
//	alamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "alamat";
	$fdata["GoodName"] = "alamat";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
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
			$edata["EditParams"].= " maxlength=1000";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_spt_reklame["alamat"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
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
	
		
		
	$tdatapad_pad_spt_reklame["update_uid"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
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
	
		
		
	$tdatapad_pad_spt_reklame["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
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
	
		
		
	$tdatapad_pad_spt_reklame["updated"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
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
	
		
		
	$tdatapad_pad_spt_reklame["created"] = $fdata;
//	status_baliho
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "status_baliho";
	$fdata["GoodName"] = "status_baliho";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Status Baliho"; 
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
	
		$fdata["strField"] = "status_baliho"; 
		$fdata["FullName"] = "status_baliho";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["status_baliho"] = $fdata;
//	tambahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "tambahan";
	$fdata["GoodName"] = "tambahan";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Tambahan"; 
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
	
		$fdata["strField"] = "tambahan"; 
		$fdata["FullName"] = "tambahan";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["tambahan"] = $fdata;
//	jalan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "jalan_id";
	$fdata["GoodName"] = "jalan_id";
	$fdata["ownerTable"] = "pad.pad_spt_reklame";
	$fdata["Label"] = "Jalan Id"; 
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
	
		$fdata["strField"] = "jalan_id"; 
		$fdata["FullName"] = "jalan_id";
	
		
		
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
	
		
		
	$tdatapad_pad_spt_reklame["jalan_id"] = $fdata;

	
$tables_data["pad.pad_spt_reklame"]=&$tdatapad_pad_spt_reklame;
$field_labels["pad_pad_spt_reklame"] = &$fieldLabelspad_pad_spt_reklame;
$fieldToolTips["pad.pad_spt_reklame"] = &$fieldToolTipspad_pad_spt_reklame;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_spt_reklame"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_spt_reklame"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_spt_reklame()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   spt_id,   media_id,   kelas_jalan_id,   panjang,   lebar,   tinggi,   muka,   sisi,   banyak,   lama,   nsr,   alamat,   update_uid,   create_uid,   updated,   created,   status_baliho,   tambahan,   jalan_id";
$proto0["m_strFrom"] = "FROM \"pad\".pad_spt_reklame";
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
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_id",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "media_id",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "kelas_jalan_id",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "panjang",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "lebar",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "tinggi",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "muka",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "sisi",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "banyak",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "lama",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "nsr",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "status_baliho",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "tambahan",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "jalan_id",
	"m_strTable" => "pad.pad_spt_reklame"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto45=array();
$proto45["m_link"] = "SQLL_MAIN";
			$proto46=array();
$proto46["m_strName"] = "pad.pad_spt_reklame";
$proto46["m_columns"] = array();
$proto46["m_columns"][] = "id";
$proto46["m_columns"][] = "spt_id";
$proto46["m_columns"][] = "media_id";
$proto46["m_columns"][] = "kelas_jalan_id";
$proto46["m_columns"][] = "panjang";
$proto46["m_columns"][] = "lebar";
$proto46["m_columns"][] = "tinggi";
$proto46["m_columns"][] = "muka";
$proto46["m_columns"][] = "sisi";
$proto46["m_columns"][] = "banyak";
$proto46["m_columns"][] = "lama";
$proto46["m_columns"][] = "nsr";
$proto46["m_columns"][] = "alamat";
$proto46["m_columns"][] = "update_uid";
$proto46["m_columns"][] = "create_uid";
$proto46["m_columns"][] = "updated";
$proto46["m_columns"][] = "created";
$proto46["m_columns"][] = "status_baliho";
$proto46["m_columns"][] = "tambahan";
$proto46["m_columns"][] = "jalan_id";
$obj = new SQLTable($proto46);

$proto45["m_table"] = $obj;
$proto45["m_alias"] = "";
$proto47=array();
$proto47["m_sql"] = "";
$proto47["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto47["m_column"]=$obj;
$proto47["m_contained"] = array();
$proto47["m_strCase"] = "";
$proto47["m_havingmode"] = "0";
$proto47["m_inBrackets"] = "0";
$proto47["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto47);

$proto45["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto45);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_spt_reklame = createSqlQuery_pad_pad_spt_reklame();
																				$tdatapad_pad_spt_reklame[".sqlquery"] = $queryData_pad_pad_spt_reklame;
	
if(isset($tdatapad_pad_spt_reklame["field2"])){
	$tdatapad_pad_spt_reklame["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_spt_reklame["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_spt_reklame["field2"]["LookupType"] = 4;
	$tdatapad_pad_spt_reklame["field2"]["LinkField"] = "email";
	$tdatapad_pad_spt_reklame["field2"]["DisplayField"] = "name";
	$tdatapad_pad_spt_reklame[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_spt_reklame"] = new eventsBase;
$tdatapad_pad_spt_reklame[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_spt_reklame");

?>