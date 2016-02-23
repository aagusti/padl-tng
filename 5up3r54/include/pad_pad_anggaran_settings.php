<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_anggaran = array();
	$tdatapad_pad_anggaran[".NumberOfChars"] = 80; 
	$tdatapad_pad_anggaran[".ShortName"] = "pad_pad_anggaran";
	$tdatapad_pad_anggaran[".OwnerID"] = "";
	$tdatapad_pad_anggaran[".OriginalTable"] = "pad.pad_anggaran";

//	field labels
$fieldLabelspad_pad_anggaran = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_anggaran["English"] = array();
	$fieldToolTipspad_pad_anggaran["English"] = array();
	$fieldLabelspad_pad_anggaran["English"]["id"] = "Id";
	$fieldToolTipspad_pad_anggaran["English"]["id"] = "";
	$fieldLabelspad_pad_anggaran["English"]["rekening_id"] = "Rekening Id";
	$fieldToolTipspad_pad_anggaran["English"]["rekening_id"] = "";
	$fieldLabelspad_pad_anggaran["English"]["status_anggaran"] = "Status Anggaran";
	$fieldToolTipspad_pad_anggaran["English"]["status_anggaran"] = "";
	$fieldLabelspad_pad_anggaran["English"]["target"] = "Target";
	$fieldToolTipspad_pad_anggaran["English"]["target"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan1"] = "Bulan1";
	$fieldToolTipspad_pad_anggaran["English"]["bulan1"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan2"] = "Bulan2";
	$fieldToolTipspad_pad_anggaran["English"]["bulan2"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan3"] = "Bulan3";
	$fieldToolTipspad_pad_anggaran["English"]["bulan3"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan4"] = "Bulan4";
	$fieldToolTipspad_pad_anggaran["English"]["bulan4"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan5"] = "Bulan5";
	$fieldToolTipspad_pad_anggaran["English"]["bulan5"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan6"] = "Bulan6";
	$fieldToolTipspad_pad_anggaran["English"]["bulan6"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan7"] = "Bulan7";
	$fieldToolTipspad_pad_anggaran["English"]["bulan7"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan8"] = "Bulan8";
	$fieldToolTipspad_pad_anggaran["English"]["bulan8"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan9"] = "Bulan9";
	$fieldToolTipspad_pad_anggaran["English"]["bulan9"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan10"] = "Bulan10";
	$fieldToolTipspad_pad_anggaran["English"]["bulan10"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan11"] = "Bulan11";
	$fieldToolTipspad_pad_anggaran["English"]["bulan11"] = "";
	$fieldLabelspad_pad_anggaran["English"]["bulan12"] = "Bulan12";
	$fieldToolTipspad_pad_anggaran["English"]["bulan12"] = "";
	$fieldLabelspad_pad_anggaran["English"]["jumlah"] = "Jumlah";
	$fieldToolTipspad_pad_anggaran["English"]["jumlah"] = "";
	$fieldLabelspad_pad_anggaran["English"]["created"] = "Created";
	$fieldToolTipspad_pad_anggaran["English"]["created"] = "";
	$fieldLabelspad_pad_anggaran["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_anggaran["English"]["updated"] = "";
	$fieldLabelspad_pad_anggaran["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_anggaran["English"]["create_uid"] = "";
	$fieldLabelspad_pad_anggaran["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_anggaran["English"]["update_uid"] = "";
	$fieldLabelspad_pad_anggaran["English"]["tahun"] = "Tahun";
	$fieldToolTipspad_pad_anggaran["English"]["tahun"] = "";
	if (count($fieldToolTipspad_pad_anggaran["English"]))
		$tdatapad_pad_anggaran[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_anggaran[".NCSearch"] = true;



$tdatapad_pad_anggaran[".shortTableName"] = "pad_pad_anggaran";
$tdatapad_pad_anggaran[".nSecOptions"] = 0;
$tdatapad_pad_anggaran[".recsPerRowList"] = 1;
$tdatapad_pad_anggaran[".mainTableOwnerID"] = "";
$tdatapad_pad_anggaran[".moveNext"] = 1;
$tdatapad_pad_anggaran[".nType"] = 0;

$tdatapad_pad_anggaran[".strOriginalTableName"] = "pad.pad_anggaran";




$tdatapad_pad_anggaran[".showAddInPopup"] = false;

$tdatapad_pad_anggaran[".showEditInPopup"] = false;

$tdatapad_pad_anggaran[".showViewInPopup"] = false;

$tdatapad_pad_anggaran[".fieldsForRegister"] = array();

$tdatapad_pad_anggaran[".listAjax"] = false;

	$tdatapad_pad_anggaran[".audit"] = false;

	$tdatapad_pad_anggaran[".locking"] = false;

$tdatapad_pad_anggaran[".listIcons"] = true;
$tdatapad_pad_anggaran[".edit"] = true;
$tdatapad_pad_anggaran[".inlineEdit"] = true;
$tdatapad_pad_anggaran[".inlineAdd"] = true;
$tdatapad_pad_anggaran[".view"] = true;

$tdatapad_pad_anggaran[".exportTo"] = true;

$tdatapad_pad_anggaran[".printFriendly"] = true;

$tdatapad_pad_anggaran[".delete"] = true;

$tdatapad_pad_anggaran[".showSimpleSearchOptions"] = false;

$tdatapad_pad_anggaran[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_anggaran[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_anggaran[".isUseAjaxSuggest"] = true;

$tdatapad_pad_anggaran[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_anggaran[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_anggaran[".isUseTimeForSearch"] = false;




$tdatapad_pad_anggaran[".allSearchFields"] = array();

$tdatapad_pad_anggaran[".allSearchFields"][] = "id";
$tdatapad_pad_anggaran[".allSearchFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".allSearchFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".allSearchFields"][] = "target";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan1";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan2";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan3";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan4";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan5";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan6";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan7";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan8";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan9";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan10";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan11";
$tdatapad_pad_anggaran[".allSearchFields"][] = "bulan12";
$tdatapad_pad_anggaran[".allSearchFields"][] = "jumlah";
$tdatapad_pad_anggaran[".allSearchFields"][] = "created";
$tdatapad_pad_anggaran[".allSearchFields"][] = "updated";
$tdatapad_pad_anggaran[".allSearchFields"][] = "create_uid";
$tdatapad_pad_anggaran[".allSearchFields"][] = "update_uid";
$tdatapad_pad_anggaran[".allSearchFields"][] = "tahun";

$tdatapad_pad_anggaran[".googleLikeFields"][] = "id";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "target";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan1";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan2";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan3";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan4";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan5";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan6";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan7";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan8";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan9";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan10";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan11";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "bulan12";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "jumlah";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "created";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "updated";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_anggaran[".googleLikeFields"][] = "tahun";


$tdatapad_pad_anggaran[".advSearchFields"][] = "id";
$tdatapad_pad_anggaran[".advSearchFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".advSearchFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".advSearchFields"][] = "target";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan1";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan2";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan3";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan4";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan5";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan6";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan7";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan8";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan9";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan10";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan11";
$tdatapad_pad_anggaran[".advSearchFields"][] = "bulan12";
$tdatapad_pad_anggaran[".advSearchFields"][] = "jumlah";
$tdatapad_pad_anggaran[".advSearchFields"][] = "created";
$tdatapad_pad_anggaran[".advSearchFields"][] = "updated";
$tdatapad_pad_anggaran[".advSearchFields"][] = "create_uid";
$tdatapad_pad_anggaran[".advSearchFields"][] = "update_uid";
$tdatapad_pad_anggaran[".advSearchFields"][] = "tahun";

$tdatapad_pad_anggaran[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_anggaran[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_anggaran[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_anggaran[".orderindexes"] = array();

$tdatapad_pad_anggaran[".sqlHead"] = "SELECT id,   rekening_id,   status_anggaran,   target,   bulan1,   bulan2,   bulan3,   bulan4,   bulan5,   bulan6,   bulan7,   bulan8,   bulan9,   bulan10,   bulan11,   bulan12,   jumlah,   created,   updated,   create_uid,   update_uid,   tahun";
$tdatapad_pad_anggaran[".sqlFrom"] = "FROM \"pad\".pad_anggaran";
$tdatapad_pad_anggaran[".sqlWhereExpr"] = "";
$tdatapad_pad_anggaran[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_anggaran[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_anggaran[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_anggaran = array();
$tableKeyspad_pad_anggaran[] = "id";
$tdatapad_pad_anggaran[".Keys"] = $tableKeyspad_pad_anggaran;

$tdatapad_pad_anggaran[".listFields"] = array();
$tdatapad_pad_anggaran[".listFields"][] = "id";
$tdatapad_pad_anggaran[".listFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".listFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".listFields"][] = "target";
$tdatapad_pad_anggaran[".listFields"][] = "bulan1";
$tdatapad_pad_anggaran[".listFields"][] = "bulan2";
$tdatapad_pad_anggaran[".listFields"][] = "bulan3";
$tdatapad_pad_anggaran[".listFields"][] = "bulan4";
$tdatapad_pad_anggaran[".listFields"][] = "bulan5";
$tdatapad_pad_anggaran[".listFields"][] = "bulan6";
$tdatapad_pad_anggaran[".listFields"][] = "bulan7";
$tdatapad_pad_anggaran[".listFields"][] = "bulan8";
$tdatapad_pad_anggaran[".listFields"][] = "bulan9";
$tdatapad_pad_anggaran[".listFields"][] = "bulan10";
$tdatapad_pad_anggaran[".listFields"][] = "bulan11";
$tdatapad_pad_anggaran[".listFields"][] = "bulan12";
$tdatapad_pad_anggaran[".listFields"][] = "jumlah";
$tdatapad_pad_anggaran[".listFields"][] = "created";
$tdatapad_pad_anggaran[".listFields"][] = "updated";
$tdatapad_pad_anggaran[".listFields"][] = "create_uid";
$tdatapad_pad_anggaran[".listFields"][] = "update_uid";
$tdatapad_pad_anggaran[".listFields"][] = "tahun";

$tdatapad_pad_anggaran[".viewFields"] = array();
$tdatapad_pad_anggaran[".viewFields"][] = "id";
$tdatapad_pad_anggaran[".viewFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".viewFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".viewFields"][] = "target";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan1";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan2";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan3";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan4";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan5";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan6";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan7";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan8";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan9";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan10";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan11";
$tdatapad_pad_anggaran[".viewFields"][] = "bulan12";
$tdatapad_pad_anggaran[".viewFields"][] = "jumlah";
$tdatapad_pad_anggaran[".viewFields"][] = "created";
$tdatapad_pad_anggaran[".viewFields"][] = "updated";
$tdatapad_pad_anggaran[".viewFields"][] = "create_uid";
$tdatapad_pad_anggaran[".viewFields"][] = "update_uid";
$tdatapad_pad_anggaran[".viewFields"][] = "tahun";

$tdatapad_pad_anggaran[".addFields"] = array();
$tdatapad_pad_anggaran[".addFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".addFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".addFields"][] = "target";
$tdatapad_pad_anggaran[".addFields"][] = "bulan1";
$tdatapad_pad_anggaran[".addFields"][] = "bulan2";
$tdatapad_pad_anggaran[".addFields"][] = "bulan3";
$tdatapad_pad_anggaran[".addFields"][] = "bulan4";
$tdatapad_pad_anggaran[".addFields"][] = "bulan5";
$tdatapad_pad_anggaran[".addFields"][] = "bulan6";
$tdatapad_pad_anggaran[".addFields"][] = "bulan7";
$tdatapad_pad_anggaran[".addFields"][] = "bulan8";
$tdatapad_pad_anggaran[".addFields"][] = "bulan9";
$tdatapad_pad_anggaran[".addFields"][] = "bulan10";
$tdatapad_pad_anggaran[".addFields"][] = "bulan11";
$tdatapad_pad_anggaran[".addFields"][] = "bulan12";
$tdatapad_pad_anggaran[".addFields"][] = "jumlah";
$tdatapad_pad_anggaran[".addFields"][] = "created";
$tdatapad_pad_anggaran[".addFields"][] = "updated";
$tdatapad_pad_anggaran[".addFields"][] = "create_uid";
$tdatapad_pad_anggaran[".addFields"][] = "update_uid";
$tdatapad_pad_anggaran[".addFields"][] = "tahun";

$tdatapad_pad_anggaran[".inlineAddFields"] = array();
$tdatapad_pad_anggaran[".inlineAddFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "target";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan1";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan2";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan3";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan4";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan5";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan6";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan7";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan8";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan9";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan10";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan11";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "bulan12";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "jumlah";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "created";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "updated";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_anggaran[".inlineAddFields"][] = "tahun";

$tdatapad_pad_anggaran[".editFields"] = array();
$tdatapad_pad_anggaran[".editFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".editFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".editFields"][] = "target";
$tdatapad_pad_anggaran[".editFields"][] = "bulan1";
$tdatapad_pad_anggaran[".editFields"][] = "bulan2";
$tdatapad_pad_anggaran[".editFields"][] = "bulan3";
$tdatapad_pad_anggaran[".editFields"][] = "bulan4";
$tdatapad_pad_anggaran[".editFields"][] = "bulan5";
$tdatapad_pad_anggaran[".editFields"][] = "bulan6";
$tdatapad_pad_anggaran[".editFields"][] = "bulan7";
$tdatapad_pad_anggaran[".editFields"][] = "bulan8";
$tdatapad_pad_anggaran[".editFields"][] = "bulan9";
$tdatapad_pad_anggaran[".editFields"][] = "bulan10";
$tdatapad_pad_anggaran[".editFields"][] = "bulan11";
$tdatapad_pad_anggaran[".editFields"][] = "bulan12";
$tdatapad_pad_anggaran[".editFields"][] = "jumlah";
$tdatapad_pad_anggaran[".editFields"][] = "created";
$tdatapad_pad_anggaran[".editFields"][] = "updated";
$tdatapad_pad_anggaran[".editFields"][] = "create_uid";
$tdatapad_pad_anggaran[".editFields"][] = "update_uid";
$tdatapad_pad_anggaran[".editFields"][] = "tahun";

$tdatapad_pad_anggaran[".inlineEditFields"] = array();
$tdatapad_pad_anggaran[".inlineEditFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "target";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan1";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan2";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan3";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan4";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan5";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan6";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan7";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan8";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan9";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan10";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan11";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "bulan12";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "jumlah";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "created";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "updated";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_anggaran[".inlineEditFields"][] = "tahun";

$tdatapad_pad_anggaran[".exportFields"] = array();
$tdatapad_pad_anggaran[".exportFields"][] = "id";
$tdatapad_pad_anggaran[".exportFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".exportFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".exportFields"][] = "target";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan1";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan2";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan3";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan4";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan5";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan6";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan7";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan8";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan9";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan10";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan11";
$tdatapad_pad_anggaran[".exportFields"][] = "bulan12";
$tdatapad_pad_anggaran[".exportFields"][] = "jumlah";
$tdatapad_pad_anggaran[".exportFields"][] = "created";
$tdatapad_pad_anggaran[".exportFields"][] = "updated";
$tdatapad_pad_anggaran[".exportFields"][] = "create_uid";
$tdatapad_pad_anggaran[".exportFields"][] = "update_uid";
$tdatapad_pad_anggaran[".exportFields"][] = "tahun";

$tdatapad_pad_anggaran[".printFields"] = array();
$tdatapad_pad_anggaran[".printFields"][] = "id";
$tdatapad_pad_anggaran[".printFields"][] = "rekening_id";
$tdatapad_pad_anggaran[".printFields"][] = "status_anggaran";
$tdatapad_pad_anggaran[".printFields"][] = "target";
$tdatapad_pad_anggaran[".printFields"][] = "bulan1";
$tdatapad_pad_anggaran[".printFields"][] = "bulan2";
$tdatapad_pad_anggaran[".printFields"][] = "bulan3";
$tdatapad_pad_anggaran[".printFields"][] = "bulan4";
$tdatapad_pad_anggaran[".printFields"][] = "bulan5";
$tdatapad_pad_anggaran[".printFields"][] = "bulan6";
$tdatapad_pad_anggaran[".printFields"][] = "bulan7";
$tdatapad_pad_anggaran[".printFields"][] = "bulan8";
$tdatapad_pad_anggaran[".printFields"][] = "bulan9";
$tdatapad_pad_anggaran[".printFields"][] = "bulan10";
$tdatapad_pad_anggaran[".printFields"][] = "bulan11";
$tdatapad_pad_anggaran[".printFields"][] = "bulan12";
$tdatapad_pad_anggaran[".printFields"][] = "jumlah";
$tdatapad_pad_anggaran[".printFields"][] = "created";
$tdatapad_pad_anggaran[".printFields"][] = "updated";
$tdatapad_pad_anggaran[".printFields"][] = "create_uid";
$tdatapad_pad_anggaran[".printFields"][] = "update_uid";
$tdatapad_pad_anggaran[".printFields"][] = "tahun";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_anggaran";
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
	
		
		
	$tdatapad_pad_anggaran["id"] = $fdata;
//	rekening_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "rekening_id";
	$fdata["GoodName"] = "rekening_id";
	$fdata["ownerTable"] = "pad.pad_anggaran";
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
	
		
		
	$tdatapad_pad_anggaran["rekening_id"] = $fdata;
//	status_anggaran
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "status_anggaran";
	$fdata["GoodName"] = "status_anggaran";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Status Anggaran"; 
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
	
		$fdata["strField"] = "status_anggaran"; 
		$fdata["FullName"] = "status_anggaran";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["status_anggaran"] = $fdata;
//	target
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "target";
	$fdata["GoodName"] = "target";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Target"; 
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
	
		$fdata["strField"] = "target"; 
		$fdata["FullName"] = "target";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["target"] = $fdata;
//	bulan1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "bulan1";
	$fdata["GoodName"] = "bulan1";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan1"; 
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
	
		$fdata["strField"] = "bulan1"; 
		$fdata["FullName"] = "bulan1";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan1"] = $fdata;
//	bulan2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "bulan2";
	$fdata["GoodName"] = "bulan2";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan2"; 
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
	
		$fdata["strField"] = "bulan2"; 
		$fdata["FullName"] = "bulan2";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan2"] = $fdata;
//	bulan3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "bulan3";
	$fdata["GoodName"] = "bulan3";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan3"; 
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
	
		$fdata["strField"] = "bulan3"; 
		$fdata["FullName"] = "bulan3";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan3"] = $fdata;
//	bulan4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "bulan4";
	$fdata["GoodName"] = "bulan4";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan4"; 
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
	
		$fdata["strField"] = "bulan4"; 
		$fdata["FullName"] = "bulan4";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan4"] = $fdata;
//	bulan5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "bulan5";
	$fdata["GoodName"] = "bulan5";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan5"; 
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
	
		$fdata["strField"] = "bulan5"; 
		$fdata["FullName"] = "bulan5";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan5"] = $fdata;
//	bulan6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "bulan6";
	$fdata["GoodName"] = "bulan6";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan6"; 
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
	
		$fdata["strField"] = "bulan6"; 
		$fdata["FullName"] = "bulan6";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan6"] = $fdata;
//	bulan7
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "bulan7";
	$fdata["GoodName"] = "bulan7";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan7"; 
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
	
		$fdata["strField"] = "bulan7"; 
		$fdata["FullName"] = "bulan7";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan7"] = $fdata;
//	bulan8
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "bulan8";
	$fdata["GoodName"] = "bulan8";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan8"; 
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
	
		$fdata["strField"] = "bulan8"; 
		$fdata["FullName"] = "bulan8";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan8"] = $fdata;
//	bulan9
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "bulan9";
	$fdata["GoodName"] = "bulan9";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan9"; 
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
	
		$fdata["strField"] = "bulan9"; 
		$fdata["FullName"] = "bulan9";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan9"] = $fdata;
//	bulan10
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "bulan10";
	$fdata["GoodName"] = "bulan10";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan10"; 
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
	
		$fdata["strField"] = "bulan10"; 
		$fdata["FullName"] = "bulan10";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan10"] = $fdata;
//	bulan11
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "bulan11";
	$fdata["GoodName"] = "bulan11";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan11"; 
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
	
		$fdata["strField"] = "bulan11"; 
		$fdata["FullName"] = "bulan11";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan11"] = $fdata;
//	bulan12
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "bulan12";
	$fdata["GoodName"] = "bulan12";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Bulan12"; 
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
	
		$fdata["strField"] = "bulan12"; 
		$fdata["FullName"] = "bulan12";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["bulan12"] = $fdata;
//	jumlah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "jumlah";
	$fdata["GoodName"] = "jumlah";
	$fdata["ownerTable"] = "pad.pad_anggaran";
	$fdata["Label"] = "Jumlah"; 
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
	
		$fdata["strField"] = "jumlah"; 
		$fdata["FullName"] = "jumlah";
	
		
		
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
	
		
		
	$tdatapad_pad_anggaran["jumlah"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_anggaran";
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
	
		
		
	$tdatapad_pad_anggaran["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_anggaran";
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
	
		
		
	$tdatapad_pad_anggaran["updated"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_anggaran";
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
	
		
		
	$tdatapad_pad_anggaran["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_anggaran";
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
	
		
		
	$tdatapad_pad_anggaran["update_uid"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "pad.pad_anggaran";
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
	
		
		
	$tdatapad_pad_anggaran["tahun"] = $fdata;

	
$tables_data["pad.pad_anggaran"]=&$tdatapad_pad_anggaran;
$field_labels["pad_pad_anggaran"] = &$fieldLabelspad_pad_anggaran;
$fieldToolTips["pad.pad_anggaran"] = &$fieldToolTipspad_pad_anggaran;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_anggaran"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_anggaran"] = array();

$mIndex = 1-1;
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
	$masterTablesData["pad.pad_anggaran"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_anggaran"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_anggaran"][$mIndex]["detailKeys"][]="rekening_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_anggaran()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   rekening_id,   status_anggaran,   target,   bulan1,   bulan2,   bulan3,   bulan4,   bulan5,   bulan6,   bulan7,   bulan8,   bulan9,   bulan10,   bulan11,   bulan12,   jumlah,   created,   updated,   create_uid,   update_uid,   tahun";
$proto0["m_strFrom"] = "FROM \"pad\".pad_anggaran";
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
	"m_strTable" => "pad.pad_anggaran"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "rekening_id",
	"m_strTable" => "pad.pad_anggaran"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "status_anggaran",
	"m_strTable" => "pad.pad_anggaran"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "target",
	"m_strTable" => "pad.pad_anggaran"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan1",
	"m_strTable" => "pad.pad_anggaran"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan2",
	"m_strTable" => "pad.pad_anggaran"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan3",
	"m_strTable" => "pad.pad_anggaran"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan4",
	"m_strTable" => "pad.pad_anggaran"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan5",
	"m_strTable" => "pad.pad_anggaran"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan6",
	"m_strTable" => "pad.pad_anggaran"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan7",
	"m_strTable" => "pad.pad_anggaran"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan8",
	"m_strTable" => "pad.pad_anggaran"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan9",
	"m_strTable" => "pad.pad_anggaran"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan10",
	"m_strTable" => "pad.pad_anggaran"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan11",
	"m_strTable" => "pad.pad_anggaran"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan12",
	"m_strTable" => "pad.pad_anggaran"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "jumlah",
	"m_strTable" => "pad.pad_anggaran"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_anggaran"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_anggaran"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_anggaran"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_anggaran"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "pad.pad_anggaran"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto49=array();
$proto49["m_link"] = "SQLL_MAIN";
			$proto50=array();
$proto50["m_strName"] = "pad.pad_anggaran";
$proto50["m_columns"] = array();
$proto50["m_columns"][] = "id";
$proto50["m_columns"][] = "rekening_id";
$proto50["m_columns"][] = "status_anggaran";
$proto50["m_columns"][] = "target";
$proto50["m_columns"][] = "bulan1";
$proto50["m_columns"][] = "bulan2";
$proto50["m_columns"][] = "bulan3";
$proto50["m_columns"][] = "bulan4";
$proto50["m_columns"][] = "bulan5";
$proto50["m_columns"][] = "bulan6";
$proto50["m_columns"][] = "bulan7";
$proto50["m_columns"][] = "bulan8";
$proto50["m_columns"][] = "bulan9";
$proto50["m_columns"][] = "bulan10";
$proto50["m_columns"][] = "bulan11";
$proto50["m_columns"][] = "bulan12";
$proto50["m_columns"][] = "jumlah";
$proto50["m_columns"][] = "created";
$proto50["m_columns"][] = "updated";
$proto50["m_columns"][] = "create_uid";
$proto50["m_columns"][] = "update_uid";
$proto50["m_columns"][] = "tahun";
$obj = new SQLTable($proto50);

$proto49["m_table"] = $obj;
$proto49["m_alias"] = "";
$proto51=array();
$proto51["m_sql"] = "";
$proto51["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto51["m_column"]=$obj;
$proto51["m_contained"] = array();
$proto51["m_strCase"] = "";
$proto51["m_havingmode"] = "0";
$proto51["m_inBrackets"] = "0";
$proto51["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto51);

$proto49["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto49);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_anggaran = createSqlQuery_pad_pad_anggaran();
																						$tdatapad_pad_anggaran[".sqlquery"] = $queryData_pad_pad_anggaran;
	
if(isset($tdatapad_pad_anggaran["field2"])){
	$tdatapad_pad_anggaran["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_anggaran["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_anggaran["field2"]["LookupType"] = 4;
	$tdatapad_pad_anggaran["field2"]["LinkField"] = "email";
	$tdatapad_pad_anggaran["field2"]["DisplayField"] = "name";
	$tdatapad_pad_anggaran[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_anggaran"] = new eventsBase;
$tdatapad_pad_anggaran[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_anggaran");

?>