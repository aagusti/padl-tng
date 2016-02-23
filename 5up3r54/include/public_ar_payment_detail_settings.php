<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_ar_payment_detail = array();
	$tdatapublic_ar_payment_detail[".NumberOfChars"] = 80; 
	$tdatapublic_ar_payment_detail[".ShortName"] = "public_ar_payment_detail";
	$tdatapublic_ar_payment_detail[".OwnerID"] = "";
	$tdatapublic_ar_payment_detail[".OriginalTable"] = "public.ar_payment_detail";

//	field labels
$fieldLabelspublic_ar_payment_detail = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_ar_payment_detail["English"] = array();
	$fieldToolTipspublic_ar_payment_detail["English"] = array();
	$fieldLabelspublic_ar_payment_detail["English"]["id"] = "Id";
	$fieldToolTipspublic_ar_payment_detail["English"]["id"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["kode"] = "Kode";
	$fieldToolTipspublic_ar_payment_detail["English"]["kode"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["disabled"] = "Disabled";
	$fieldToolTipspublic_ar_payment_detail["English"]["disabled"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["created"] = "Created";
	$fieldToolTipspublic_ar_payment_detail["English"]["created"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["updated"] = "Updated";
	$fieldToolTipspublic_ar_payment_detail["English"]["updated"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspublic_ar_payment_detail["English"]["create_uid"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspublic_ar_payment_detail["English"]["update_uid"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["nama"] = "Nama";
	$fieldToolTipspublic_ar_payment_detail["English"]["nama"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["tahun"] = "Tahun";
	$fieldToolTipspublic_ar_payment_detail["English"]["tahun"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["amount"] = "Amount";
	$fieldToolTipspublic_ar_payment_detail["English"]["amount"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["ref_kode"] = "Ref Kode";
	$fieldToolTipspublic_ar_payment_detail["English"]["ref_kode"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["ref_nama"] = "Ref Nama";
	$fieldToolTipspublic_ar_payment_detail["English"]["ref_nama"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["tanggal"] = "Tanggal";
	$fieldToolTipspublic_ar_payment_detail["English"]["tanggal"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["kecamatan_kd"] = "Kecamatan Kd";
	$fieldToolTipspublic_ar_payment_detail["English"]["kecamatan_kd"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["kecamatan_nm"] = "Kecamatan Nm";
	$fieldToolTipspublic_ar_payment_detail["English"]["kecamatan_nm"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["kelurahan_kd"] = "Kelurahan Kd";
	$fieldToolTipspublic_ar_payment_detail["English"]["kelurahan_kd"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["kelurahan_nm"] = "Kelurahan Nm";
	$fieldToolTipspublic_ar_payment_detail["English"]["kelurahan_nm"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["is_kota"] = "Is Kota";
	$fieldToolTipspublic_ar_payment_detail["English"]["is_kota"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["sumber_data"] = "Sumber Data";
	$fieldToolTipspublic_ar_payment_detail["English"]["sumber_data"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["sumber_id"] = "Sumber Id";
	$fieldToolTipspublic_ar_payment_detail["English"]["sumber_id"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["bulan"] = "Bulan";
	$fieldToolTipspublic_ar_payment_detail["English"]["bulan"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["minggu"] = "Minggu";
	$fieldToolTipspublic_ar_payment_detail["English"]["minggu"] = "";
	$fieldLabelspublic_ar_payment_detail["English"]["hari"] = "Hari";
	$fieldToolTipspublic_ar_payment_detail["English"]["hari"] = "";
	if (count($fieldToolTipspublic_ar_payment_detail["English"]))
		$tdatapublic_ar_payment_detail[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_ar_payment_detail[".NCSearch"] = true;



$tdatapublic_ar_payment_detail[".shortTableName"] = "public_ar_payment_detail";
$tdatapublic_ar_payment_detail[".nSecOptions"] = 0;
$tdatapublic_ar_payment_detail[".recsPerRowList"] = 1;
$tdatapublic_ar_payment_detail[".mainTableOwnerID"] = "";
$tdatapublic_ar_payment_detail[".moveNext"] = 1;
$tdatapublic_ar_payment_detail[".nType"] = 0;

$tdatapublic_ar_payment_detail[".strOriginalTableName"] = "public.ar_payment_detail";




$tdatapublic_ar_payment_detail[".showAddInPopup"] = false;

$tdatapublic_ar_payment_detail[".showEditInPopup"] = false;

$tdatapublic_ar_payment_detail[".showViewInPopup"] = false;

$tdatapublic_ar_payment_detail[".fieldsForRegister"] = array();

$tdatapublic_ar_payment_detail[".listAjax"] = false;

	$tdatapublic_ar_payment_detail[".audit"] = false;

	$tdatapublic_ar_payment_detail[".locking"] = false;

$tdatapublic_ar_payment_detail[".listIcons"] = true;
$tdatapublic_ar_payment_detail[".edit"] = true;
$tdatapublic_ar_payment_detail[".inlineEdit"] = true;
$tdatapublic_ar_payment_detail[".inlineAdd"] = true;
$tdatapublic_ar_payment_detail[".view"] = true;

$tdatapublic_ar_payment_detail[".exportTo"] = true;

$tdatapublic_ar_payment_detail[".printFriendly"] = true;

$tdatapublic_ar_payment_detail[".delete"] = true;

$tdatapublic_ar_payment_detail[".showSimpleSearchOptions"] = false;

$tdatapublic_ar_payment_detail[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_ar_payment_detail[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_ar_payment_detail[".isUseAjaxSuggest"] = true;

$tdatapublic_ar_payment_detail[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_ar_payment_detail[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_ar_payment_detail[".isUseTimeForSearch"] = false;




$tdatapublic_ar_payment_detail[".allSearchFields"] = array();

$tdatapublic_ar_payment_detail[".allSearchFields"][] = "id";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "kode";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "created";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "updated";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "nama";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "amount";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".allSearchFields"][] = "hari";

$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "id";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "kode";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "created";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "updated";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "nama";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "amount";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".googleLikeFields"][] = "hari";


$tdatapublic_ar_payment_detail[".advSearchFields"][] = "id";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "kode";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "created";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "updated";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "nama";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "amount";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".advSearchFields"][] = "hari";

$tdatapublic_ar_payment_detail[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_ar_payment_detail[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_ar_payment_detail[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_ar_payment_detail[".orderindexes"] = array();

$tdatapublic_ar_payment_detail[".sqlHead"] = "SELECT id,   kode,   disabled,   created,   updated,   create_uid,   update_uid,   nama,   tahun,   amount,   ref_kode,   ref_nama,   tanggal,   kecamatan_kd,   kecamatan_nm,   kelurahan_kd,   kelurahan_nm,   is_kota,   sumber_data,   sumber_id,   bulan,   minggu,   hari";
$tdatapublic_ar_payment_detail[".sqlFrom"] = "FROM \"public\".ar_payment_detail";
$tdatapublic_ar_payment_detail[".sqlWhereExpr"] = "";
$tdatapublic_ar_payment_detail[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_ar_payment_detail[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_ar_payment_detail[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_ar_payment_detail = array();
$tableKeyspublic_ar_payment_detail[] = "id";
$tdatapublic_ar_payment_detail[".Keys"] = $tableKeyspublic_ar_payment_detail;

$tdatapublic_ar_payment_detail[".listFields"] = array();
$tdatapublic_ar_payment_detail[".listFields"][] = "id";
$tdatapublic_ar_payment_detail[".listFields"][] = "kode";
$tdatapublic_ar_payment_detail[".listFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".listFields"][] = "created";
$tdatapublic_ar_payment_detail[".listFields"][] = "updated";
$tdatapublic_ar_payment_detail[".listFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".listFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".listFields"][] = "nama";
$tdatapublic_ar_payment_detail[".listFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".listFields"][] = "amount";
$tdatapublic_ar_payment_detail[".listFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".listFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".listFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".listFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".listFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".listFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".listFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".listFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".listFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".listFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".listFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".listFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".listFields"][] = "hari";

$tdatapublic_ar_payment_detail[".viewFields"] = array();
$tdatapublic_ar_payment_detail[".viewFields"][] = "id";
$tdatapublic_ar_payment_detail[".viewFields"][] = "kode";
$tdatapublic_ar_payment_detail[".viewFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".viewFields"][] = "created";
$tdatapublic_ar_payment_detail[".viewFields"][] = "updated";
$tdatapublic_ar_payment_detail[".viewFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".viewFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".viewFields"][] = "nama";
$tdatapublic_ar_payment_detail[".viewFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".viewFields"][] = "amount";
$tdatapublic_ar_payment_detail[".viewFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".viewFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".viewFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".viewFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".viewFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".viewFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".viewFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".viewFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".viewFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".viewFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".viewFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".viewFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".viewFields"][] = "hari";

$tdatapublic_ar_payment_detail[".addFields"] = array();
$tdatapublic_ar_payment_detail[".addFields"][] = "kode";
$tdatapublic_ar_payment_detail[".addFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".addFields"][] = "created";
$tdatapublic_ar_payment_detail[".addFields"][] = "updated";
$tdatapublic_ar_payment_detail[".addFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".addFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".addFields"][] = "nama";
$tdatapublic_ar_payment_detail[".addFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".addFields"][] = "amount";
$tdatapublic_ar_payment_detail[".addFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".addFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".addFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".addFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".addFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".addFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".addFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".addFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".addFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".addFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".addFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".addFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".addFields"][] = "hari";

$tdatapublic_ar_payment_detail[".inlineAddFields"] = array();
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "kode";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "created";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "updated";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "nama";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "amount";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".inlineAddFields"][] = "hari";

$tdatapublic_ar_payment_detail[".editFields"] = array();
$tdatapublic_ar_payment_detail[".editFields"][] = "kode";
$tdatapublic_ar_payment_detail[".editFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".editFields"][] = "created";
$tdatapublic_ar_payment_detail[".editFields"][] = "updated";
$tdatapublic_ar_payment_detail[".editFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".editFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".editFields"][] = "nama";
$tdatapublic_ar_payment_detail[".editFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".editFields"][] = "amount";
$tdatapublic_ar_payment_detail[".editFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".editFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".editFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".editFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".editFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".editFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".editFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".editFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".editFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".editFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".editFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".editFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".editFields"][] = "hari";

$tdatapublic_ar_payment_detail[".inlineEditFields"] = array();
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "kode";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "created";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "updated";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "nama";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "amount";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".inlineEditFields"][] = "hari";

$tdatapublic_ar_payment_detail[".exportFields"] = array();
$tdatapublic_ar_payment_detail[".exportFields"][] = "id";
$tdatapublic_ar_payment_detail[".exportFields"][] = "kode";
$tdatapublic_ar_payment_detail[".exportFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".exportFields"][] = "created";
$tdatapublic_ar_payment_detail[".exportFields"][] = "updated";
$tdatapublic_ar_payment_detail[".exportFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".exportFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".exportFields"][] = "nama";
$tdatapublic_ar_payment_detail[".exportFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".exportFields"][] = "amount";
$tdatapublic_ar_payment_detail[".exportFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".exportFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".exportFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".exportFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".exportFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".exportFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".exportFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".exportFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".exportFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".exportFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".exportFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".exportFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".exportFields"][] = "hari";

$tdatapublic_ar_payment_detail[".printFields"] = array();
$tdatapublic_ar_payment_detail[".printFields"][] = "id";
$tdatapublic_ar_payment_detail[".printFields"][] = "kode";
$tdatapublic_ar_payment_detail[".printFields"][] = "disabled";
$tdatapublic_ar_payment_detail[".printFields"][] = "created";
$tdatapublic_ar_payment_detail[".printFields"][] = "updated";
$tdatapublic_ar_payment_detail[".printFields"][] = "create_uid";
$tdatapublic_ar_payment_detail[".printFields"][] = "update_uid";
$tdatapublic_ar_payment_detail[".printFields"][] = "nama";
$tdatapublic_ar_payment_detail[".printFields"][] = "tahun";
$tdatapublic_ar_payment_detail[".printFields"][] = "amount";
$tdatapublic_ar_payment_detail[".printFields"][] = "ref_kode";
$tdatapublic_ar_payment_detail[".printFields"][] = "ref_nama";
$tdatapublic_ar_payment_detail[".printFields"][] = "tanggal";
$tdatapublic_ar_payment_detail[".printFields"][] = "kecamatan_kd";
$tdatapublic_ar_payment_detail[".printFields"][] = "kecamatan_nm";
$tdatapublic_ar_payment_detail[".printFields"][] = "kelurahan_kd";
$tdatapublic_ar_payment_detail[".printFields"][] = "kelurahan_nm";
$tdatapublic_ar_payment_detail[".printFields"][] = "is_kota";
$tdatapublic_ar_payment_detail[".printFields"][] = "sumber_data";
$tdatapublic_ar_payment_detail[".printFields"][] = "sumber_id";
$tdatapublic_ar_payment_detail[".printFields"][] = "bulan";
$tdatapublic_ar_payment_detail[".printFields"][] = "minggu";
$tdatapublic_ar_payment_detail[".printFields"][] = "hari";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "public.ar_payment_detail";
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
	
		
		
	$tdatapublic_ar_payment_detail["id"] = $fdata;
//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Kode"; 
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
	
		$fdata["strField"] = "kode"; 
		$fdata["FullName"] = "kode";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["kode"] = $fdata;
//	disabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "disabled";
	$fdata["GoodName"] = "disabled";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Disabled"; 
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
	
		$fdata["strField"] = "disabled"; 
		$fdata["FullName"] = "disabled";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["disabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "public.ar_payment_detail";
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
	
		
		
	$tdatapublic_ar_payment_detail["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "public.ar_payment_detail";
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
	
		
		
	$tdatapublic_ar_payment_detail["updated"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "public.ar_payment_detail";
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
	
		
		
	$tdatapublic_ar_payment_detail["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "public.ar_payment_detail";
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
	
		
		
	$tdatapublic_ar_payment_detail["update_uid"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "public.ar_payment_detail";
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
			$edata["EditParams"].= " maxlength=128";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_ar_payment_detail["nama"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "public.ar_payment_detail";
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
	
		
		
	$tdatapublic_ar_payment_detail["tahun"] = $fdata;
//	amount
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "amount";
	$fdata["GoodName"] = "amount";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Amount"; 
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
	
		$fdata["strField"] = "amount"; 
		$fdata["FullName"] = "amount";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["amount"] = $fdata;
//	ref_kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "ref_kode";
	$fdata["GoodName"] = "ref_kode";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Ref Kode"; 
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
	
		$fdata["strField"] = "ref_kode"; 
		$fdata["FullName"] = "ref_kode";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["ref_kode"] = $fdata;
//	ref_nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "ref_nama";
	$fdata["GoodName"] = "ref_nama";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Ref Nama"; 
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
	
		$fdata["strField"] = "ref_nama"; 
		$fdata["FullName"] = "ref_nama";
	
		
		
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
			$edata["EditParams"].= " maxlength=64";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_ar_payment_detail["ref_nama"] = $fdata;
//	tanggal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "tanggal";
	$fdata["GoodName"] = "tanggal";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Tanggal"; 
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
	
		
		
	$tdatapublic_ar_payment_detail["tanggal"] = $fdata;
//	kecamatan_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "kecamatan_kd";
	$fdata["GoodName"] = "kecamatan_kd";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Kecamatan Kd"; 
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
	
		$fdata["strField"] = "kecamatan_kd"; 
		$fdata["FullName"] = "kecamatan_kd";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["kecamatan_kd"] = $fdata;
//	kecamatan_nm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "kecamatan_nm";
	$fdata["GoodName"] = "kecamatan_nm";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Kecamatan Nm"; 
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
	
		$fdata["strField"] = "kecamatan_nm"; 
		$fdata["FullName"] = "kecamatan_nm";
	
		
		
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
			$edata["EditParams"].= " maxlength=64";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_ar_payment_detail["kecamatan_nm"] = $fdata;
//	kelurahan_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "kelurahan_kd";
	$fdata["GoodName"] = "kelurahan_kd";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Kelurahan Kd"; 
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
	
		$fdata["strField"] = "kelurahan_kd"; 
		$fdata["FullName"] = "kelurahan_kd";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["kelurahan_kd"] = $fdata;
//	kelurahan_nm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "kelurahan_nm";
	$fdata["GoodName"] = "kelurahan_nm";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Kelurahan Nm"; 
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
	
		$fdata["strField"] = "kelurahan_nm"; 
		$fdata["FullName"] = "kelurahan_nm";
	
		
		
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
			$edata["EditParams"].= " maxlength=64";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_ar_payment_detail["kelurahan_nm"] = $fdata;
//	is_kota
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "is_kota";
	$fdata["GoodName"] = "is_kota";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Is Kota"; 
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
	
		$fdata["strField"] = "is_kota"; 
		$fdata["FullName"] = "is_kota";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["is_kota"] = $fdata;
//	sumber_data
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "sumber_data";
	$fdata["GoodName"] = "sumber_data";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Sumber Data"; 
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
	
		$fdata["strField"] = "sumber_data"; 
		$fdata["FullName"] = "sumber_data";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["sumber_data"] = $fdata;
//	sumber_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "sumber_id";
	$fdata["GoodName"] = "sumber_id";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Sumber Id"; 
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
	
		$fdata["strField"] = "sumber_id"; 
		$fdata["FullName"] = "sumber_id";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["sumber_id"] = $fdata;
//	bulan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "bulan";
	$fdata["GoodName"] = "bulan";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Bulan"; 
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
	
		$fdata["strField"] = "bulan"; 
		$fdata["FullName"] = "bulan";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["bulan"] = $fdata;
//	minggu
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "minggu";
	$fdata["GoodName"] = "minggu";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Minggu"; 
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
	
		$fdata["strField"] = "minggu"; 
		$fdata["FullName"] = "minggu";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["minggu"] = $fdata;
//	hari
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "hari";
	$fdata["GoodName"] = "hari";
	$fdata["ownerTable"] = "public.ar_payment_detail";
	$fdata["Label"] = "Hari"; 
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
	
		$fdata["strField"] = "hari"; 
		$fdata["FullName"] = "hari";
	
		
		
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
	
		
		
	$tdatapublic_ar_payment_detail["hari"] = $fdata;

	
$tables_data["public.ar_payment_detail"]=&$tdatapublic_ar_payment_detail;
$field_labels["public_ar_payment_detail"] = &$fieldLabelspublic_ar_payment_detail;
$fieldToolTips["public.ar_payment_detail"] = &$fieldToolTipspublic_ar_payment_detail;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.ar_payment_detail"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.ar_payment_detail"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_ar_payment_detail()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   kode,   disabled,   created,   updated,   create_uid,   update_uid,   nama,   tahun,   amount,   ref_kode,   ref_nama,   tanggal,   kecamatan_kd,   kecamatan_nm,   kelurahan_kd,   kelurahan_nm,   is_kota,   sumber_data,   sumber_id,   bulan,   minggu,   hari";
$proto0["m_strFrom"] = "FROM \"public\".ar_payment_detail";
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
	"m_strTable" => "public.ar_payment_detail"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "kode",
	"m_strTable" => "public.ar_payment_detail"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "disabled",
	"m_strTable" => "public.ar_payment_detail"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "public.ar_payment_detail"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "public.ar_payment_detail"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "public.ar_payment_detail"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "public.ar_payment_detail"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "public.ar_payment_detail"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "public.ar_payment_detail"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "amount",
	"m_strTable" => "public.ar_payment_detail"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "ref_kode",
	"m_strTable" => "public.ar_payment_detail"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "ref_nama",
	"m_strTable" => "public.ar_payment_detail"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "tanggal",
	"m_strTable" => "public.ar_payment_detail"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "kecamatan_kd",
	"m_strTable" => "public.ar_payment_detail"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "kecamatan_nm",
	"m_strTable" => "public.ar_payment_detail"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "kelurahan_kd",
	"m_strTable" => "public.ar_payment_detail"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "kelurahan_nm",
	"m_strTable" => "public.ar_payment_detail"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "is_kota",
	"m_strTable" => "public.ar_payment_detail"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "sumber_data",
	"m_strTable" => "public.ar_payment_detail"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "sumber_id",
	"m_strTable" => "public.ar_payment_detail"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan",
	"m_strTable" => "public.ar_payment_detail"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "minggu",
	"m_strTable" => "public.ar_payment_detail"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "hari",
	"m_strTable" => "public.ar_payment_detail"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto51=array();
$proto51["m_link"] = "SQLL_MAIN";
			$proto52=array();
$proto52["m_strName"] = "public.ar_payment_detail";
$proto52["m_columns"] = array();
$proto52["m_columns"][] = "id";
$proto52["m_columns"][] = "kode";
$proto52["m_columns"][] = "disabled";
$proto52["m_columns"][] = "created";
$proto52["m_columns"][] = "updated";
$proto52["m_columns"][] = "create_uid";
$proto52["m_columns"][] = "update_uid";
$proto52["m_columns"][] = "nama";
$proto52["m_columns"][] = "tahun";
$proto52["m_columns"][] = "amount";
$proto52["m_columns"][] = "ref_kode";
$proto52["m_columns"][] = "ref_nama";
$proto52["m_columns"][] = "tanggal";
$proto52["m_columns"][] = "kecamatan_kd";
$proto52["m_columns"][] = "kecamatan_nm";
$proto52["m_columns"][] = "kelurahan_kd";
$proto52["m_columns"][] = "kelurahan_nm";
$proto52["m_columns"][] = "is_kota";
$proto52["m_columns"][] = "sumber_data";
$proto52["m_columns"][] = "sumber_id";
$proto52["m_columns"][] = "bulan";
$proto52["m_columns"][] = "minggu";
$proto52["m_columns"][] = "hari";
$obj = new SQLTable($proto52);

$proto51["m_table"] = $obj;
$proto51["m_alias"] = "";
$proto53=array();
$proto53["m_sql"] = "";
$proto53["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto53["m_column"]=$obj;
$proto53["m_contained"] = array();
$proto53["m_strCase"] = "";
$proto53["m_havingmode"] = "0";
$proto53["m_inBrackets"] = "0";
$proto53["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto53);

$proto51["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto51);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_public_ar_payment_detail = createSqlQuery_public_ar_payment_detail();
																							$tdatapublic_ar_payment_detail[".sqlquery"] = $queryData_public_ar_payment_detail;
	
if(isset($tdatapublic_ar_payment_detail["field2"])){
	$tdatapublic_ar_payment_detail["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_ar_payment_detail["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_ar_payment_detail["field2"]["LookupType"] = 4;
	$tdatapublic_ar_payment_detail["field2"]["LinkField"] = "email";
	$tdatapublic_ar_payment_detail["field2"]["DisplayField"] = "name";
	$tdatapublic_ar_payment_detail[".hasCustomViewField"] = true;
}

$tableEvents["public.ar_payment_detail"] = new eventsBase;
$tdatapublic_ar_payment_detail[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.ar_payment_detail");

?>