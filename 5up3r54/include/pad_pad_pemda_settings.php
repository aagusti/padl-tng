<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_pemda = array();
	$tdatapad_pad_pemda[".NumberOfChars"] = 80; 
	$tdatapad_pad_pemda[".ShortName"] = "pad_pad_pemda";
	$tdatapad_pad_pemda[".OwnerID"] = "";
	$tdatapad_pad_pemda[".OriginalTable"] = "pad.pad_pemda";

//	field labels
$fieldLabelspad_pad_pemda = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_pemda["English"] = array();
	$fieldToolTipspad_pad_pemda["English"] = array();
	$fieldLabelspad_pad_pemda["English"]["id"] = "Id";
	$fieldToolTipspad_pad_pemda["English"]["id"] = "";
	$fieldLabelspad_pad_pemda["English"]["type"] = "Type";
	$fieldToolTipspad_pad_pemda["English"]["type"] = "";
	$fieldLabelspad_pad_pemda["English"]["kepala_nama"] = "Kepala Nama";
	$fieldToolTipspad_pad_pemda["English"]["kepala_nama"] = "";
	$fieldLabelspad_pad_pemda["English"]["alamat"] = "Alamat";
	$fieldToolTipspad_pad_pemda["English"]["alamat"] = "";
	$fieldLabelspad_pad_pemda["English"]["telp"] = "Telp";
	$fieldToolTipspad_pad_pemda["English"]["telp"] = "";
	$fieldLabelspad_pad_pemda["English"]["pemda_nama"] = "Pemda Nama";
	$fieldToolTipspad_pad_pemda["English"]["pemda_nama"] = "";
	$fieldLabelspad_pad_pemda["English"]["ibukota"] = "Ibukota";
	$fieldToolTipspad_pad_pemda["English"]["ibukota"] = "";
	$fieldLabelspad_pad_pemda["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_pemda["English"]["tmt"] = "";
	$fieldLabelspad_pad_pemda["English"]["jabatan"] = "Jabatan";
	$fieldToolTipspad_pad_pemda["English"]["jabatan"] = "";
	$fieldLabelspad_pad_pemda["English"]["ppkd_id"] = "Ppkd Id";
	$fieldToolTipspad_pad_pemda["English"]["ppkd_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["reklame_id"] = "Reklame Id";
	$fieldToolTipspad_pad_pemda["English"]["reklame_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["pendapatan_id"] = "Pendapatan Id";
	$fieldToolTipspad_pad_pemda["English"]["pendapatan_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["pemda_nama_singkat"] = "Pemda Nama Singkat";
	$fieldToolTipspad_pad_pemda["English"]["pemda_nama_singkat"] = "";
	$fieldLabelspad_pad_pemda["English"]["airtanah_id"] = "Airtanah Id";
	$fieldToolTipspad_pad_pemda["English"]["airtanah_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["self_dok_id"] = "Self Dok Id";
	$fieldToolTipspad_pad_pemda["English"]["self_dok_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["office_dok_id"] = "Office Dok Id";
	$fieldToolTipspad_pad_pemda["English"]["office_dok_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["tgl_jatuhtempo_self"] = "Tgl Jatuhtempo Self";
	$fieldToolTipspad_pad_pemda["English"]["tgl_jatuhtempo_self"] = "";
	$fieldLabelspad_pad_pemda["English"]["spt_denda"] = "Spt Denda";
	$fieldToolTipspad_pad_pemda["English"]["spt_denda"] = "";
	$fieldLabelspad_pad_pemda["English"]["tgl_spt"] = "Tgl Spt";
	$fieldToolTipspad_pad_pemda["English"]["tgl_spt"] = "";
	$fieldLabelspad_pad_pemda["English"]["pad_bunga"] = "Pad Bunga";
	$fieldToolTipspad_pad_pemda["English"]["pad_bunga"] = "";
	$fieldLabelspad_pad_pemda["English"]["fax"] = "Fax";
	$fieldToolTipspad_pad_pemda["English"]["fax"] = "";
	$fieldLabelspad_pad_pemda["English"]["website"] = "Website";
	$fieldToolTipspad_pad_pemda["English"]["website"] = "";
	$fieldLabelspad_pad_pemda["English"]["email"] = "Email";
	$fieldToolTipspad_pad_pemda["English"]["email"] = "";
	$fieldLabelspad_pad_pemda["English"]["daerah"] = "Daerah";
	$fieldToolTipspad_pad_pemda["English"]["daerah"] = "";
	$fieldLabelspad_pad_pemda["English"]["alamat_lengkap"] = "Alamat Lengkap";
	$fieldToolTipspad_pad_pemda["English"]["alamat_lengkap"] = "";
	$fieldLabelspad_pad_pemda["English"]["ppj_id"] = "Ppj Id";
	$fieldToolTipspad_pad_pemda["English"]["ppj_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["hotel_id"] = "Hotel Id";
	$fieldToolTipspad_pad_pemda["English"]["hotel_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["walet_id"] = "Walet Id";
	$fieldToolTipspad_pad_pemda["English"]["walet_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["restauran_id"] = "Restauran Id";
	$fieldToolTipspad_pad_pemda["English"]["restauran_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["hiburan_id"] = "Hiburan Id";
	$fieldToolTipspad_pad_pemda["English"]["hiburan_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["parkir_id"] = "Parkir Id";
	$fieldToolTipspad_pad_pemda["English"]["parkir_id"] = "";
	$fieldLabelspad_pad_pemda["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_pemda["English"]["enabled"] = "";
	$fieldLabelspad_pad_pemda["English"]["surat_no"] = "Surat No";
	$fieldToolTipspad_pad_pemda["English"]["surat_no"] = "";
	$fieldLabelspad_pad_pemda["English"]["ijin_kd"] = "Ijin Kd";
	$fieldToolTipspad_pad_pemda["English"]["ijin_kd"] = "";
	$fieldLabelspad_pad_pemda["English"]["hotel_kd"] = "Hotel Kd";
	$fieldToolTipspad_pad_pemda["English"]["hotel_kd"] = "";
	$fieldLabelspad_pad_pemda["English"]["restoran_kd"] = "Restoran Kd";
	$fieldToolTipspad_pad_pemda["English"]["restoran_kd"] = "";
	$fieldLabelspad_pad_pemda["English"]["hiburan_kd"] = "Hiburan Kd";
	$fieldToolTipspad_pad_pemda["English"]["hiburan_kd"] = "";
	$fieldLabelspad_pad_pemda["English"]["ppj_kd"] = "Ppj Kd";
	$fieldToolTipspad_pad_pemda["English"]["ppj_kd"] = "";
	$fieldLabelspad_pad_pemda["English"]["parkir_kd"] = "Parkir Kd";
	$fieldToolTipspad_pad_pemda["English"]["parkir_kd"] = "";
	$fieldLabelspad_pad_pemda["English"]["airtanah_kd"] = "Airtanah Kd";
	$fieldToolTipspad_pad_pemda["English"]["airtanah_kd"] = "";
	$fieldLabelspad_pad_pemda["English"]["reklame_kd"] = "Reklame Kd";
	$fieldToolTipspad_pad_pemda["English"]["reklame_kd"] = "";
	$fieldLabelspad_pad_pemda["English"]["restauran_kd"] = "Restauran Kd";
	$fieldToolTipspad_pad_pemda["English"]["restauran_kd"] = "";
	if (count($fieldToolTipspad_pad_pemda["English"]))
		$tdatapad_pad_pemda[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_pemda[".NCSearch"] = true;



$tdatapad_pad_pemda[".shortTableName"] = "pad_pad_pemda";
$tdatapad_pad_pemda[".nSecOptions"] = 0;
$tdatapad_pad_pemda[".recsPerRowList"] = 1;
$tdatapad_pad_pemda[".mainTableOwnerID"] = "";
$tdatapad_pad_pemda[".moveNext"] = 1;
$tdatapad_pad_pemda[".nType"] = 0;

$tdatapad_pad_pemda[".strOriginalTableName"] = "pad.pad_pemda";




$tdatapad_pad_pemda[".showAddInPopup"] = false;

$tdatapad_pad_pemda[".showEditInPopup"] = false;

$tdatapad_pad_pemda[".showViewInPopup"] = false;

$tdatapad_pad_pemda[".fieldsForRegister"] = array();

$tdatapad_pad_pemda[".listAjax"] = false;

	$tdatapad_pad_pemda[".audit"] = false;

	$tdatapad_pad_pemda[".locking"] = false;

$tdatapad_pad_pemda[".listIcons"] = true;
$tdatapad_pad_pemda[".edit"] = true;
$tdatapad_pad_pemda[".inlineEdit"] = true;
$tdatapad_pad_pemda[".inlineAdd"] = true;
$tdatapad_pad_pemda[".view"] = true;

$tdatapad_pad_pemda[".exportTo"] = true;

$tdatapad_pad_pemda[".printFriendly"] = true;

$tdatapad_pad_pemda[".delete"] = true;

$tdatapad_pad_pemda[".showSimpleSearchOptions"] = false;

$tdatapad_pad_pemda[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_pemda[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_pemda[".isUseAjaxSuggest"] = true;

$tdatapad_pad_pemda[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_pemda[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_pemda[".isUseTimeForSearch"] = false;




$tdatapad_pad_pemda[".allSearchFields"] = array();

$tdatapad_pad_pemda[".allSearchFields"][] = "id";
$tdatapad_pad_pemda[".allSearchFields"][] = "type";
$tdatapad_pad_pemda[".allSearchFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".allSearchFields"][] = "alamat";
$tdatapad_pad_pemda[".allSearchFields"][] = "telp";
$tdatapad_pad_pemda[".allSearchFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".allSearchFields"][] = "ibukota";
$tdatapad_pad_pemda[".allSearchFields"][] = "tmt";
$tdatapad_pad_pemda[".allSearchFields"][] = "jabatan";
$tdatapad_pad_pemda[".allSearchFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "reklame_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".allSearchFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".allSearchFields"][] = "spt_denda";
$tdatapad_pad_pemda[".allSearchFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".allSearchFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".allSearchFields"][] = "fax";
$tdatapad_pad_pemda[".allSearchFields"][] = "website";
$tdatapad_pad_pemda[".allSearchFields"][] = "email";
$tdatapad_pad_pemda[".allSearchFields"][] = "daerah";
$tdatapad_pad_pemda[".allSearchFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".allSearchFields"][] = "ppj_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "hotel_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "walet_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "restauran_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "parkir_id";
$tdatapad_pad_pemda[".allSearchFields"][] = "enabled";
$tdatapad_pad_pemda[".allSearchFields"][] = "surat_no";
$tdatapad_pad_pemda[".allSearchFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".allSearchFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".allSearchFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".allSearchFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".allSearchFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".allSearchFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".allSearchFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".allSearchFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".allSearchFields"][] = "restauran_kd";

$tdatapad_pad_pemda[".googleLikeFields"][] = "id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "type";
$tdatapad_pad_pemda[".googleLikeFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".googleLikeFields"][] = "alamat";
$tdatapad_pad_pemda[".googleLikeFields"][] = "telp";
$tdatapad_pad_pemda[".googleLikeFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".googleLikeFields"][] = "ibukota";
$tdatapad_pad_pemda[".googleLikeFields"][] = "tmt";
$tdatapad_pad_pemda[".googleLikeFields"][] = "jabatan";
$tdatapad_pad_pemda[".googleLikeFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "reklame_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".googleLikeFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".googleLikeFields"][] = "spt_denda";
$tdatapad_pad_pemda[".googleLikeFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".googleLikeFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".googleLikeFields"][] = "fax";
$tdatapad_pad_pemda[".googleLikeFields"][] = "website";
$tdatapad_pad_pemda[".googleLikeFields"][] = "email";
$tdatapad_pad_pemda[".googleLikeFields"][] = "daerah";
$tdatapad_pad_pemda[".googleLikeFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".googleLikeFields"][] = "ppj_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "hotel_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "walet_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "restauran_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "parkir_id";
$tdatapad_pad_pemda[".googleLikeFields"][] = "enabled";
$tdatapad_pad_pemda[".googleLikeFields"][] = "surat_no";
$tdatapad_pad_pemda[".googleLikeFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".googleLikeFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".googleLikeFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".googleLikeFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".googleLikeFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".googleLikeFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".googleLikeFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".googleLikeFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".googleLikeFields"][] = "restauran_kd";


$tdatapad_pad_pemda[".advSearchFields"][] = "id";
$tdatapad_pad_pemda[".advSearchFields"][] = "type";
$tdatapad_pad_pemda[".advSearchFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".advSearchFields"][] = "alamat";
$tdatapad_pad_pemda[".advSearchFields"][] = "telp";
$tdatapad_pad_pemda[".advSearchFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".advSearchFields"][] = "ibukota";
$tdatapad_pad_pemda[".advSearchFields"][] = "tmt";
$tdatapad_pad_pemda[".advSearchFields"][] = "jabatan";
$tdatapad_pad_pemda[".advSearchFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "reklame_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".advSearchFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".advSearchFields"][] = "spt_denda";
$tdatapad_pad_pemda[".advSearchFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".advSearchFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".advSearchFields"][] = "fax";
$tdatapad_pad_pemda[".advSearchFields"][] = "website";
$tdatapad_pad_pemda[".advSearchFields"][] = "email";
$tdatapad_pad_pemda[".advSearchFields"][] = "daerah";
$tdatapad_pad_pemda[".advSearchFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".advSearchFields"][] = "ppj_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "hotel_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "walet_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "restauran_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "parkir_id";
$tdatapad_pad_pemda[".advSearchFields"][] = "enabled";
$tdatapad_pad_pemda[".advSearchFields"][] = "surat_no";
$tdatapad_pad_pemda[".advSearchFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".advSearchFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".advSearchFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".advSearchFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".advSearchFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".advSearchFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".advSearchFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".advSearchFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".advSearchFields"][] = "restauran_kd";

$tdatapad_pad_pemda[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_pad_pemda[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_pemda[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_pemda[".orderindexes"] = array();

$tdatapad_pad_pemda[".sqlHead"] = "SELECT id,   \"type\",   kepala_nama,   alamat,   telp,   pemda_nama,   ibukota,   tmt,   jabatan,   ppkd_id,   reklame_id,   pendapatan_id,   pemda_nama_singkat,   airtanah_id,   self_dok_id,   office_dok_id,   tgl_jatuhtempo_self,   spt_denda,   tgl_spt,   pad_bunga,   fax,   website,   email,   daerah,   alamat_lengkap,   ppj_id,   hotel_id,   walet_id,   restauran_id,   hiburan_id,   parkir_id,   enabled,   surat_no,   ijin_kd,   hotel_kd,   restoran_kd,   hiburan_kd,   ppj_kd,   parkir_kd,   airtanah_kd,   reklame_kd,   restauran_kd";
$tdatapad_pad_pemda[".sqlFrom"] = "FROM \"pad\".pad_pemda";
$tdatapad_pad_pemda[".sqlWhereExpr"] = "";
$tdatapad_pad_pemda[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_pemda[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_pemda[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_pemda = array();
$tableKeyspad_pad_pemda[] = "id";
$tdatapad_pad_pemda[".Keys"] = $tableKeyspad_pad_pemda;

$tdatapad_pad_pemda[".listFields"] = array();
$tdatapad_pad_pemda[".listFields"][] = "id";
$tdatapad_pad_pemda[".listFields"][] = "type";
$tdatapad_pad_pemda[".listFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".listFields"][] = "alamat";
$tdatapad_pad_pemda[".listFields"][] = "telp";
$tdatapad_pad_pemda[".listFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".listFields"][] = "ibukota";
$tdatapad_pad_pemda[".listFields"][] = "tmt";
$tdatapad_pad_pemda[".listFields"][] = "jabatan";
$tdatapad_pad_pemda[".listFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".listFields"][] = "reklame_id";
$tdatapad_pad_pemda[".listFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".listFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".listFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".listFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".listFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".listFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".listFields"][] = "spt_denda";
$tdatapad_pad_pemda[".listFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".listFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".listFields"][] = "fax";
$tdatapad_pad_pemda[".listFields"][] = "website";
$tdatapad_pad_pemda[".listFields"][] = "email";
$tdatapad_pad_pemda[".listFields"][] = "daerah";
$tdatapad_pad_pemda[".listFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".listFields"][] = "ppj_id";
$tdatapad_pad_pemda[".listFields"][] = "hotel_id";
$tdatapad_pad_pemda[".listFields"][] = "walet_id";
$tdatapad_pad_pemda[".listFields"][] = "restauran_id";
$tdatapad_pad_pemda[".listFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".listFields"][] = "parkir_id";
$tdatapad_pad_pemda[".listFields"][] = "enabled";
$tdatapad_pad_pemda[".listFields"][] = "surat_no";
$tdatapad_pad_pemda[".listFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".listFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".listFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".listFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".listFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".listFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".listFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".listFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".listFields"][] = "restauran_kd";

$tdatapad_pad_pemda[".viewFields"] = array();
$tdatapad_pad_pemda[".viewFields"][] = "id";
$tdatapad_pad_pemda[".viewFields"][] = "type";
$tdatapad_pad_pemda[".viewFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".viewFields"][] = "alamat";
$tdatapad_pad_pemda[".viewFields"][] = "telp";
$tdatapad_pad_pemda[".viewFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".viewFields"][] = "ibukota";
$tdatapad_pad_pemda[".viewFields"][] = "tmt";
$tdatapad_pad_pemda[".viewFields"][] = "jabatan";
$tdatapad_pad_pemda[".viewFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".viewFields"][] = "reklame_id";
$tdatapad_pad_pemda[".viewFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".viewFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".viewFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".viewFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".viewFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".viewFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".viewFields"][] = "spt_denda";
$tdatapad_pad_pemda[".viewFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".viewFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".viewFields"][] = "fax";
$tdatapad_pad_pemda[".viewFields"][] = "website";
$tdatapad_pad_pemda[".viewFields"][] = "email";
$tdatapad_pad_pemda[".viewFields"][] = "daerah";
$tdatapad_pad_pemda[".viewFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".viewFields"][] = "ppj_id";
$tdatapad_pad_pemda[".viewFields"][] = "hotel_id";
$tdatapad_pad_pemda[".viewFields"][] = "walet_id";
$tdatapad_pad_pemda[".viewFields"][] = "restauran_id";
$tdatapad_pad_pemda[".viewFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".viewFields"][] = "parkir_id";
$tdatapad_pad_pemda[".viewFields"][] = "enabled";
$tdatapad_pad_pemda[".viewFields"][] = "surat_no";
$tdatapad_pad_pemda[".viewFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".viewFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".viewFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".viewFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".viewFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".viewFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".viewFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".viewFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".viewFields"][] = "restauran_kd";

$tdatapad_pad_pemda[".addFields"] = array();
$tdatapad_pad_pemda[".addFields"][] = "type";
$tdatapad_pad_pemda[".addFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".addFields"][] = "alamat";
$tdatapad_pad_pemda[".addFields"][] = "telp";
$tdatapad_pad_pemda[".addFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".addFields"][] = "ibukota";
$tdatapad_pad_pemda[".addFields"][] = "tmt";
$tdatapad_pad_pemda[".addFields"][] = "jabatan";
$tdatapad_pad_pemda[".addFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".addFields"][] = "reklame_id";
$tdatapad_pad_pemda[".addFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".addFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".addFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".addFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".addFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".addFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".addFields"][] = "spt_denda";
$tdatapad_pad_pemda[".addFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".addFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".addFields"][] = "fax";
$tdatapad_pad_pemda[".addFields"][] = "website";
$tdatapad_pad_pemda[".addFields"][] = "email";
$tdatapad_pad_pemda[".addFields"][] = "daerah";
$tdatapad_pad_pemda[".addFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".addFields"][] = "ppj_id";
$tdatapad_pad_pemda[".addFields"][] = "hotel_id";
$tdatapad_pad_pemda[".addFields"][] = "walet_id";
$tdatapad_pad_pemda[".addFields"][] = "restauran_id";
$tdatapad_pad_pemda[".addFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".addFields"][] = "parkir_id";
$tdatapad_pad_pemda[".addFields"][] = "enabled";
$tdatapad_pad_pemda[".addFields"][] = "surat_no";
$tdatapad_pad_pemda[".addFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".addFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".addFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".addFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".addFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".addFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".addFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".addFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".addFields"][] = "restauran_kd";

$tdatapad_pad_pemda[".inlineAddFields"] = array();
$tdatapad_pad_pemda[".inlineAddFields"][] = "type";
$tdatapad_pad_pemda[".inlineAddFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".inlineAddFields"][] = "alamat";
$tdatapad_pad_pemda[".inlineAddFields"][] = "telp";
$tdatapad_pad_pemda[".inlineAddFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".inlineAddFields"][] = "ibukota";
$tdatapad_pad_pemda[".inlineAddFields"][] = "tmt";
$tdatapad_pad_pemda[".inlineAddFields"][] = "jabatan";
$tdatapad_pad_pemda[".inlineAddFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "reklame_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".inlineAddFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".inlineAddFields"][] = "spt_denda";
$tdatapad_pad_pemda[".inlineAddFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".inlineAddFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".inlineAddFields"][] = "fax";
$tdatapad_pad_pemda[".inlineAddFields"][] = "website";
$tdatapad_pad_pemda[".inlineAddFields"][] = "email";
$tdatapad_pad_pemda[".inlineAddFields"][] = "daerah";
$tdatapad_pad_pemda[".inlineAddFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".inlineAddFields"][] = "ppj_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "hotel_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "walet_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "restauran_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "parkir_id";
$tdatapad_pad_pemda[".inlineAddFields"][] = "enabled";
$tdatapad_pad_pemda[".inlineAddFields"][] = "surat_no";
$tdatapad_pad_pemda[".inlineAddFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".inlineAddFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".inlineAddFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".inlineAddFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".inlineAddFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".inlineAddFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".inlineAddFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".inlineAddFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".inlineAddFields"][] = "restauran_kd";

$tdatapad_pad_pemda[".editFields"] = array();
$tdatapad_pad_pemda[".editFields"][] = "type";
$tdatapad_pad_pemda[".editFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".editFields"][] = "alamat";
$tdatapad_pad_pemda[".editFields"][] = "telp";
$tdatapad_pad_pemda[".editFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".editFields"][] = "ibukota";
$tdatapad_pad_pemda[".editFields"][] = "tmt";
$tdatapad_pad_pemda[".editFields"][] = "jabatan";
$tdatapad_pad_pemda[".editFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".editFields"][] = "reklame_id";
$tdatapad_pad_pemda[".editFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".editFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".editFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".editFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".editFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".editFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".editFields"][] = "spt_denda";
$tdatapad_pad_pemda[".editFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".editFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".editFields"][] = "fax";
$tdatapad_pad_pemda[".editFields"][] = "website";
$tdatapad_pad_pemda[".editFields"][] = "email";
$tdatapad_pad_pemda[".editFields"][] = "daerah";
$tdatapad_pad_pemda[".editFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".editFields"][] = "ppj_id";
$tdatapad_pad_pemda[".editFields"][] = "hotel_id";
$tdatapad_pad_pemda[".editFields"][] = "walet_id";
$tdatapad_pad_pemda[".editFields"][] = "restauran_id";
$tdatapad_pad_pemda[".editFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".editFields"][] = "parkir_id";
$tdatapad_pad_pemda[".editFields"][] = "enabled";
$tdatapad_pad_pemda[".editFields"][] = "surat_no";
$tdatapad_pad_pemda[".editFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".editFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".editFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".editFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".editFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".editFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".editFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".editFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".editFields"][] = "restauran_kd";

$tdatapad_pad_pemda[".inlineEditFields"] = array();
$tdatapad_pad_pemda[".inlineEditFields"][] = "type";
$tdatapad_pad_pemda[".inlineEditFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".inlineEditFields"][] = "alamat";
$tdatapad_pad_pemda[".inlineEditFields"][] = "telp";
$tdatapad_pad_pemda[".inlineEditFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".inlineEditFields"][] = "ibukota";
$tdatapad_pad_pemda[".inlineEditFields"][] = "tmt";
$tdatapad_pad_pemda[".inlineEditFields"][] = "jabatan";
$tdatapad_pad_pemda[".inlineEditFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "reklame_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".inlineEditFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".inlineEditFields"][] = "spt_denda";
$tdatapad_pad_pemda[".inlineEditFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".inlineEditFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".inlineEditFields"][] = "fax";
$tdatapad_pad_pemda[".inlineEditFields"][] = "website";
$tdatapad_pad_pemda[".inlineEditFields"][] = "email";
$tdatapad_pad_pemda[".inlineEditFields"][] = "daerah";
$tdatapad_pad_pemda[".inlineEditFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".inlineEditFields"][] = "ppj_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "hotel_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "walet_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "restauran_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "parkir_id";
$tdatapad_pad_pemda[".inlineEditFields"][] = "enabled";
$tdatapad_pad_pemda[".inlineEditFields"][] = "surat_no";
$tdatapad_pad_pemda[".inlineEditFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".inlineEditFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".inlineEditFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".inlineEditFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".inlineEditFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".inlineEditFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".inlineEditFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".inlineEditFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".inlineEditFields"][] = "restauran_kd";

$tdatapad_pad_pemda[".exportFields"] = array();
$tdatapad_pad_pemda[".exportFields"][] = "id";
$tdatapad_pad_pemda[".exportFields"][] = "type";
$tdatapad_pad_pemda[".exportFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".exportFields"][] = "alamat";
$tdatapad_pad_pemda[".exportFields"][] = "telp";
$tdatapad_pad_pemda[".exportFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".exportFields"][] = "ibukota";
$tdatapad_pad_pemda[".exportFields"][] = "tmt";
$tdatapad_pad_pemda[".exportFields"][] = "jabatan";
$tdatapad_pad_pemda[".exportFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".exportFields"][] = "reklame_id";
$tdatapad_pad_pemda[".exportFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".exportFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".exportFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".exportFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".exportFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".exportFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".exportFields"][] = "spt_denda";
$tdatapad_pad_pemda[".exportFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".exportFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".exportFields"][] = "fax";
$tdatapad_pad_pemda[".exportFields"][] = "website";
$tdatapad_pad_pemda[".exportFields"][] = "email";
$tdatapad_pad_pemda[".exportFields"][] = "daerah";
$tdatapad_pad_pemda[".exportFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".exportFields"][] = "ppj_id";
$tdatapad_pad_pemda[".exportFields"][] = "hotel_id";
$tdatapad_pad_pemda[".exportFields"][] = "walet_id";
$tdatapad_pad_pemda[".exportFields"][] = "restauran_id";
$tdatapad_pad_pemda[".exportFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".exportFields"][] = "parkir_id";
$tdatapad_pad_pemda[".exportFields"][] = "enabled";
$tdatapad_pad_pemda[".exportFields"][] = "surat_no";
$tdatapad_pad_pemda[".exportFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".exportFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".exportFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".exportFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".exportFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".exportFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".exportFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".exportFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".exportFields"][] = "restauran_kd";

$tdatapad_pad_pemda[".printFields"] = array();
$tdatapad_pad_pemda[".printFields"][] = "id";
$tdatapad_pad_pemda[".printFields"][] = "type";
$tdatapad_pad_pemda[".printFields"][] = "kepala_nama";
$tdatapad_pad_pemda[".printFields"][] = "alamat";
$tdatapad_pad_pemda[".printFields"][] = "telp";
$tdatapad_pad_pemda[".printFields"][] = "pemda_nama";
$tdatapad_pad_pemda[".printFields"][] = "ibukota";
$tdatapad_pad_pemda[".printFields"][] = "tmt";
$tdatapad_pad_pemda[".printFields"][] = "jabatan";
$tdatapad_pad_pemda[".printFields"][] = "ppkd_id";
$tdatapad_pad_pemda[".printFields"][] = "reklame_id";
$tdatapad_pad_pemda[".printFields"][] = "pendapatan_id";
$tdatapad_pad_pemda[".printFields"][] = "pemda_nama_singkat";
$tdatapad_pad_pemda[".printFields"][] = "airtanah_id";
$tdatapad_pad_pemda[".printFields"][] = "self_dok_id";
$tdatapad_pad_pemda[".printFields"][] = "office_dok_id";
$tdatapad_pad_pemda[".printFields"][] = "tgl_jatuhtempo_self";
$tdatapad_pad_pemda[".printFields"][] = "spt_denda";
$tdatapad_pad_pemda[".printFields"][] = "tgl_spt";
$tdatapad_pad_pemda[".printFields"][] = "pad_bunga";
$tdatapad_pad_pemda[".printFields"][] = "fax";
$tdatapad_pad_pemda[".printFields"][] = "website";
$tdatapad_pad_pemda[".printFields"][] = "email";
$tdatapad_pad_pemda[".printFields"][] = "daerah";
$tdatapad_pad_pemda[".printFields"][] = "alamat_lengkap";
$tdatapad_pad_pemda[".printFields"][] = "ppj_id";
$tdatapad_pad_pemda[".printFields"][] = "hotel_id";
$tdatapad_pad_pemda[".printFields"][] = "walet_id";
$tdatapad_pad_pemda[".printFields"][] = "restauran_id";
$tdatapad_pad_pemda[".printFields"][] = "hiburan_id";
$tdatapad_pad_pemda[".printFields"][] = "parkir_id";
$tdatapad_pad_pemda[".printFields"][] = "enabled";
$tdatapad_pad_pemda[".printFields"][] = "surat_no";
$tdatapad_pad_pemda[".printFields"][] = "ijin_kd";
$tdatapad_pad_pemda[".printFields"][] = "hotel_kd";
$tdatapad_pad_pemda[".printFields"][] = "restoran_kd";
$tdatapad_pad_pemda[".printFields"][] = "hiburan_kd";
$tdatapad_pad_pemda[".printFields"][] = "ppj_kd";
$tdatapad_pad_pemda[".printFields"][] = "parkir_kd";
$tdatapad_pad_pemda[".printFields"][] = "airtanah_kd";
$tdatapad_pad_pemda[".printFields"][] = "reklame_kd";
$tdatapad_pad_pemda[".printFields"][] = "restauran_kd";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_pemda";
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
	
		
		
	$tdatapad_pad_pemda["id"] = $fdata;
//	type
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "type";
	$fdata["GoodName"] = "type";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Type"; 
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
	
		$fdata["strField"] = "type"; 
		$fdata["FullName"] = "\"type\"";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["type"] = $fdata;
//	kepala_nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "kepala_nama";
	$fdata["GoodName"] = "kepala_nama";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Kepala Nama"; 
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
	
		$fdata["strField"] = "kepala_nama"; 
		$fdata["FullName"] = "kepala_nama";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["kepala_nama"] = $fdata;
//	alamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "alamat";
	$fdata["GoodName"] = "alamat";
	$fdata["ownerTable"] = "pad.pad_pemda";
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
			$edata["EditParams"].= " maxlength=255";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["alamat"] = $fdata;
//	telp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "telp";
	$fdata["GoodName"] = "telp";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Telp"; 
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
	
		$fdata["strField"] = "telp"; 
		$fdata["FullName"] = "telp";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["telp"] = $fdata;
//	pemda_nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "pemda_nama";
	$fdata["GoodName"] = "pemda_nama";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Pemda Nama"; 
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
	
		$fdata["strField"] = "pemda_nama"; 
		$fdata["FullName"] = "pemda_nama";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["pemda_nama"] = $fdata;
//	ibukota
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "ibukota";
	$fdata["GoodName"] = "ibukota";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Ibukota"; 
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
	
		$fdata["strField"] = "ibukota"; 
		$fdata["FullName"] = "ibukota";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["ibukota"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Tmt"; 
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
	
		$fdata["strField"] = "tmt"; 
		$fdata["FullName"] = "tmt";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["tmt"] = $fdata;
//	jabatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "jabatan";
	$fdata["GoodName"] = "jabatan";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Jabatan"; 
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
	
		$fdata["strField"] = "jabatan"; 
		$fdata["FullName"] = "jabatan";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["jabatan"] = $fdata;
//	ppkd_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "ppkd_id";
	$fdata["GoodName"] = "ppkd_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Ppkd Id"; 
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
	
		$fdata["strField"] = "ppkd_id"; 
		$fdata["FullName"] = "ppkd_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["ppkd_id"] = $fdata;
//	reklame_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "reklame_id";
	$fdata["GoodName"] = "reklame_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Reklame Id"; 
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
	
		$fdata["strField"] = "reklame_id"; 
		$fdata["FullName"] = "reklame_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["reklame_id"] = $fdata;
//	pendapatan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "pendapatan_id";
	$fdata["GoodName"] = "pendapatan_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Pendapatan Id"; 
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
	
		$fdata["strField"] = "pendapatan_id"; 
		$fdata["FullName"] = "pendapatan_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["pendapatan_id"] = $fdata;
//	pemda_nama_singkat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "pemda_nama_singkat";
	$fdata["GoodName"] = "pemda_nama_singkat";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Pemda Nama Singkat"; 
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
	
		$fdata["strField"] = "pemda_nama_singkat"; 
		$fdata["FullName"] = "pemda_nama_singkat";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["pemda_nama_singkat"] = $fdata;
//	airtanah_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "airtanah_id";
	$fdata["GoodName"] = "airtanah_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Airtanah Id"; 
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
	
		$fdata["strField"] = "airtanah_id"; 
		$fdata["FullName"] = "airtanah_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["airtanah_id"] = $fdata;
//	self_dok_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "self_dok_id";
	$fdata["GoodName"] = "self_dok_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Self Dok Id"; 
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
	
		$fdata["strField"] = "self_dok_id"; 
		$fdata["FullName"] = "self_dok_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["self_dok_id"] = $fdata;
//	office_dok_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "office_dok_id";
	$fdata["GoodName"] = "office_dok_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Office Dok Id"; 
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
	
		$fdata["strField"] = "office_dok_id"; 
		$fdata["FullName"] = "office_dok_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["office_dok_id"] = $fdata;
//	tgl_jatuhtempo_self
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "tgl_jatuhtempo_self";
	$fdata["GoodName"] = "tgl_jatuhtempo_self";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Tgl Jatuhtempo Self"; 
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
	
		$fdata["strField"] = "tgl_jatuhtempo_self"; 
		$fdata["FullName"] = "tgl_jatuhtempo_self";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["tgl_jatuhtempo_self"] = $fdata;
//	spt_denda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "spt_denda";
	$fdata["GoodName"] = "spt_denda";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Spt Denda"; 
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
	
		$fdata["strField"] = "spt_denda"; 
		$fdata["FullName"] = "spt_denda";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["spt_denda"] = $fdata;
//	tgl_spt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "tgl_spt";
	$fdata["GoodName"] = "tgl_spt";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Tgl Spt"; 
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
	
		$fdata["strField"] = "tgl_spt"; 
		$fdata["FullName"] = "tgl_spt";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["tgl_spt"] = $fdata;
//	pad_bunga
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "pad_bunga";
	$fdata["GoodName"] = "pad_bunga";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Pad Bunga"; 
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
	
		$fdata["strField"] = "pad_bunga"; 
		$fdata["FullName"] = "pad_bunga";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["pad_bunga"] = $fdata;
//	fax
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "fax";
	$fdata["GoodName"] = "fax";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Fax"; 
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
	
		$fdata["strField"] = "fax"; 
		$fdata["FullName"] = "fax";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["fax"] = $fdata;
//	website
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "website";
	$fdata["GoodName"] = "website";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Website"; 
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
	
		$fdata["strField"] = "website"; 
		$fdata["FullName"] = "website";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["website"] = $fdata;
//	email
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "email";
	$fdata["GoodName"] = "email";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Email"; 
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
	
		$fdata["strField"] = "email"; 
		$fdata["FullName"] = "email";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["email"] = $fdata;
//	daerah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
	$fdata["strName"] = "daerah";
	$fdata["GoodName"] = "daerah";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Daerah"; 
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
	
		$fdata["strField"] = "daerah"; 
		$fdata["FullName"] = "daerah";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["daerah"] = $fdata;
//	alamat_lengkap
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
	$fdata["strName"] = "alamat_lengkap";
	$fdata["GoodName"] = "alamat_lengkap";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Alamat Lengkap"; 
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
	
		$fdata["strField"] = "alamat_lengkap"; 
		$fdata["FullName"] = "alamat_lengkap";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["alamat_lengkap"] = $fdata;
//	ppj_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 26;
	$fdata["strName"] = "ppj_id";
	$fdata["GoodName"] = "ppj_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Ppj Id"; 
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
	
		$fdata["strField"] = "ppj_id"; 
		$fdata["FullName"] = "ppj_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["ppj_id"] = $fdata;
//	hotel_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 27;
	$fdata["strName"] = "hotel_id";
	$fdata["GoodName"] = "hotel_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Hotel Id"; 
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
	
		$fdata["strField"] = "hotel_id"; 
		$fdata["FullName"] = "hotel_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["hotel_id"] = $fdata;
//	walet_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 28;
	$fdata["strName"] = "walet_id";
	$fdata["GoodName"] = "walet_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Walet Id"; 
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
	
		$fdata["strField"] = "walet_id"; 
		$fdata["FullName"] = "walet_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["walet_id"] = $fdata;
//	restauran_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 29;
	$fdata["strName"] = "restauran_id";
	$fdata["GoodName"] = "restauran_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Restauran Id"; 
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
	
		$fdata["strField"] = "restauran_id"; 
		$fdata["FullName"] = "restauran_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["restauran_id"] = $fdata;
//	hiburan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 30;
	$fdata["strName"] = "hiburan_id";
	$fdata["GoodName"] = "hiburan_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Hiburan Id"; 
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
	
		$fdata["strField"] = "hiburan_id"; 
		$fdata["FullName"] = "hiburan_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["hiburan_id"] = $fdata;
//	parkir_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 31;
	$fdata["strName"] = "parkir_id";
	$fdata["GoodName"] = "parkir_id";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Parkir Id"; 
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
	
		$fdata["strField"] = "parkir_id"; 
		$fdata["FullName"] = "parkir_id";
	
		
		
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
	
		
		
	$tdatapad_pad_pemda["parkir_id"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 32;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_pemda";
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
	
		
		
	$tdatapad_pad_pemda["enabled"] = $fdata;
//	surat_no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 33;
	$fdata["strName"] = "surat_no";
	$fdata["GoodName"] = "surat_no";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Surat No"; 
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
	
		$fdata["strField"] = "surat_no"; 
		$fdata["FullName"] = "surat_no";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["surat_no"] = $fdata;
//	ijin_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 34;
	$fdata["strName"] = "ijin_kd";
	$fdata["GoodName"] = "ijin_kd";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Ijin Kd"; 
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
	
		$fdata["strField"] = "ijin_kd"; 
		$fdata["FullName"] = "ijin_kd";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["ijin_kd"] = $fdata;
//	hotel_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 35;
	$fdata["strName"] = "hotel_kd";
	$fdata["GoodName"] = "hotel_kd";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Hotel Kd"; 
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
	
		$fdata["strField"] = "hotel_kd"; 
		$fdata["FullName"] = "hotel_kd";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["hotel_kd"] = $fdata;
//	restoran_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 36;
	$fdata["strName"] = "restoran_kd";
	$fdata["GoodName"] = "restoran_kd";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Restoran Kd"; 
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
	
		$fdata["strField"] = "restoran_kd"; 
		$fdata["FullName"] = "restoran_kd";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["restoran_kd"] = $fdata;
//	hiburan_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 37;
	$fdata["strName"] = "hiburan_kd";
	$fdata["GoodName"] = "hiburan_kd";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Hiburan Kd"; 
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
	
		$fdata["strField"] = "hiburan_kd"; 
		$fdata["FullName"] = "hiburan_kd";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["hiburan_kd"] = $fdata;
//	ppj_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 38;
	$fdata["strName"] = "ppj_kd";
	$fdata["GoodName"] = "ppj_kd";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Ppj Kd"; 
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
	
		$fdata["strField"] = "ppj_kd"; 
		$fdata["FullName"] = "ppj_kd";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["ppj_kd"] = $fdata;
//	parkir_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 39;
	$fdata["strName"] = "parkir_kd";
	$fdata["GoodName"] = "parkir_kd";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Parkir Kd"; 
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
	
		$fdata["strField"] = "parkir_kd"; 
		$fdata["FullName"] = "parkir_kd";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["parkir_kd"] = $fdata;
//	airtanah_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 40;
	$fdata["strName"] = "airtanah_kd";
	$fdata["GoodName"] = "airtanah_kd";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Airtanah Kd"; 
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
	
		$fdata["strField"] = "airtanah_kd"; 
		$fdata["FullName"] = "airtanah_kd";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["airtanah_kd"] = $fdata;
//	reklame_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 41;
	$fdata["strName"] = "reklame_kd";
	$fdata["GoodName"] = "reklame_kd";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Reklame Kd"; 
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
	
		$fdata["strField"] = "reklame_kd"; 
		$fdata["FullName"] = "reklame_kd";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["reklame_kd"] = $fdata;
//	restauran_kd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 42;
	$fdata["strName"] = "restauran_kd";
	$fdata["GoodName"] = "restauran_kd";
	$fdata["ownerTable"] = "pad.pad_pemda";
	$fdata["Label"] = "Restauran Kd"; 
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
	
		$fdata["strField"] = "restauran_kd"; 
		$fdata["FullName"] = "restauran_kd";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_pemda["restauran_kd"] = $fdata;

	
$tables_data["pad.pad_pemda"]=&$tdatapad_pad_pemda;
$field_labels["pad_pad_pemda"] = &$fieldLabelspad_pad_pemda;
$fieldToolTips["pad.pad_pemda"] = &$fieldToolTipspad_pad_pemda;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_pemda"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_pemda"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_pemda()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   \"type\",   kepala_nama,   alamat,   telp,   pemda_nama,   ibukota,   tmt,   jabatan,   ppkd_id,   reklame_id,   pendapatan_id,   pemda_nama_singkat,   airtanah_id,   self_dok_id,   office_dok_id,   tgl_jatuhtempo_self,   spt_denda,   tgl_spt,   pad_bunga,   fax,   website,   email,   daerah,   alamat_lengkap,   ppj_id,   hotel_id,   walet_id,   restauran_id,   hiburan_id,   parkir_id,   enabled,   surat_no,   ijin_kd,   hotel_kd,   restoran_kd,   hiburan_kd,   ppj_kd,   parkir_kd,   airtanah_kd,   reklame_kd,   restauran_kd";
$proto0["m_strFrom"] = "FROM \"pad\".pad_pemda";
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
	"m_strTable" => "pad.pad_pemda"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "type",
	"m_strTable" => "pad.pad_pemda"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "kepala_nama",
	"m_strTable" => "pad.pad_pemda"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat",
	"m_strTable" => "pad.pad_pemda"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "telp",
	"m_strTable" => "pad.pad_pemda"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "pemda_nama",
	"m_strTable" => "pad.pad_pemda"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "ibukota",
	"m_strTable" => "pad.pad_pemda"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_pemda"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "jabatan",
	"m_strTable" => "pad.pad_pemda"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "ppkd_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "reklame_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "pendapatan_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "pemda_nama_singkat",
	"m_strTable" => "pad.pad_pemda"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "airtanah_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "self_dok_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "office_dok_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "tgl_jatuhtempo_self",
	"m_strTable" => "pad.pad_pemda"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "spt_denda",
	"m_strTable" => "pad.pad_pemda"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "tgl_spt",
	"m_strTable" => "pad.pad_pemda"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "pad_bunga",
	"m_strTable" => "pad.pad_pemda"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "fax",
	"m_strTable" => "pad.pad_pemda"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "website",
	"m_strTable" => "pad.pad_pemda"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "email",
	"m_strTable" => "pad.pad_pemda"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$obj = new SQLField(array(
	"m_strName" => "daerah",
	"m_strTable" => "pad.pad_pemda"
));

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto53=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat_lengkap",
	"m_strTable" => "pad.pad_pemda"
));

$proto53["m_expr"]=$obj;
$proto53["m_alias"] = "";
$obj = new SQLFieldListItem($proto53);

$proto0["m_fieldlist"][]=$obj;
						$proto55=array();
			$obj = new SQLField(array(
	"m_strName" => "ppj_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto55["m_expr"]=$obj;
$proto55["m_alias"] = "";
$obj = new SQLFieldListItem($proto55);

$proto0["m_fieldlist"][]=$obj;
						$proto57=array();
			$obj = new SQLField(array(
	"m_strName" => "hotel_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto57["m_expr"]=$obj;
$proto57["m_alias"] = "";
$obj = new SQLFieldListItem($proto57);

$proto0["m_fieldlist"][]=$obj;
						$proto59=array();
			$obj = new SQLField(array(
	"m_strName" => "walet_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto59["m_expr"]=$obj;
$proto59["m_alias"] = "";
$obj = new SQLFieldListItem($proto59);

$proto0["m_fieldlist"][]=$obj;
						$proto61=array();
			$obj = new SQLField(array(
	"m_strName" => "restauran_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto61["m_expr"]=$obj;
$proto61["m_alias"] = "";
$obj = new SQLFieldListItem($proto61);

$proto0["m_fieldlist"][]=$obj;
						$proto63=array();
			$obj = new SQLField(array(
	"m_strName" => "hiburan_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto63["m_expr"]=$obj;
$proto63["m_alias"] = "";
$obj = new SQLFieldListItem($proto63);

$proto0["m_fieldlist"][]=$obj;
						$proto65=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_id",
	"m_strTable" => "pad.pad_pemda"
));

$proto65["m_expr"]=$obj;
$proto65["m_alias"] = "";
$obj = new SQLFieldListItem($proto65);

$proto0["m_fieldlist"][]=$obj;
						$proto67=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_pemda"
));

$proto67["m_expr"]=$obj;
$proto67["m_alias"] = "";
$obj = new SQLFieldListItem($proto67);

$proto0["m_fieldlist"][]=$obj;
						$proto69=array();
			$obj = new SQLField(array(
	"m_strName" => "surat_no",
	"m_strTable" => "pad.pad_pemda"
));

$proto69["m_expr"]=$obj;
$proto69["m_alias"] = "";
$obj = new SQLFieldListItem($proto69);

$proto0["m_fieldlist"][]=$obj;
						$proto71=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin_kd",
	"m_strTable" => "pad.pad_pemda"
));

$proto71["m_expr"]=$obj;
$proto71["m_alias"] = "";
$obj = new SQLFieldListItem($proto71);

$proto0["m_fieldlist"][]=$obj;
						$proto73=array();
			$obj = new SQLField(array(
	"m_strName" => "hotel_kd",
	"m_strTable" => "pad.pad_pemda"
));

$proto73["m_expr"]=$obj;
$proto73["m_alias"] = "";
$obj = new SQLFieldListItem($proto73);

$proto0["m_fieldlist"][]=$obj;
						$proto75=array();
			$obj = new SQLField(array(
	"m_strName" => "restoran_kd",
	"m_strTable" => "pad.pad_pemda"
));

$proto75["m_expr"]=$obj;
$proto75["m_alias"] = "";
$obj = new SQLFieldListItem($proto75);

$proto0["m_fieldlist"][]=$obj;
						$proto77=array();
			$obj = new SQLField(array(
	"m_strName" => "hiburan_kd",
	"m_strTable" => "pad.pad_pemda"
));

$proto77["m_expr"]=$obj;
$proto77["m_alias"] = "";
$obj = new SQLFieldListItem($proto77);

$proto0["m_fieldlist"][]=$obj;
						$proto79=array();
			$obj = new SQLField(array(
	"m_strName" => "ppj_kd",
	"m_strTable" => "pad.pad_pemda"
));

$proto79["m_expr"]=$obj;
$proto79["m_alias"] = "";
$obj = new SQLFieldListItem($proto79);

$proto0["m_fieldlist"][]=$obj;
						$proto81=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_kd",
	"m_strTable" => "pad.pad_pemda"
));

$proto81["m_expr"]=$obj;
$proto81["m_alias"] = "";
$obj = new SQLFieldListItem($proto81);

$proto0["m_fieldlist"][]=$obj;
						$proto83=array();
			$obj = new SQLField(array(
	"m_strName" => "airtanah_kd",
	"m_strTable" => "pad.pad_pemda"
));

$proto83["m_expr"]=$obj;
$proto83["m_alias"] = "";
$obj = new SQLFieldListItem($proto83);

$proto0["m_fieldlist"][]=$obj;
						$proto85=array();
			$obj = new SQLField(array(
	"m_strName" => "reklame_kd",
	"m_strTable" => "pad.pad_pemda"
));

$proto85["m_expr"]=$obj;
$proto85["m_alias"] = "";
$obj = new SQLFieldListItem($proto85);

$proto0["m_fieldlist"][]=$obj;
						$proto87=array();
			$obj = new SQLField(array(
	"m_strName" => "restauran_kd",
	"m_strTable" => "pad.pad_pemda"
));

$proto87["m_expr"]=$obj;
$proto87["m_alias"] = "";
$obj = new SQLFieldListItem($proto87);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto89=array();
$proto89["m_link"] = "SQLL_MAIN";
			$proto90=array();
$proto90["m_strName"] = "pad.pad_pemda";
$proto90["m_columns"] = array();
$proto90["m_columns"][] = "id";
$proto90["m_columns"][] = "type";
$proto90["m_columns"][] = "kepala_nama";
$proto90["m_columns"][] = "alamat";
$proto90["m_columns"][] = "telp";
$proto90["m_columns"][] = "pemda_nama";
$proto90["m_columns"][] = "ibukota";
$proto90["m_columns"][] = "tmt";
$proto90["m_columns"][] = "jabatan";
$proto90["m_columns"][] = "ppkd_id";
$proto90["m_columns"][] = "reklame_id";
$proto90["m_columns"][] = "pendapatan_id";
$proto90["m_columns"][] = "pemda_nama_singkat";
$proto90["m_columns"][] = "airtanah_id";
$proto90["m_columns"][] = "self_dok_id";
$proto90["m_columns"][] = "office_dok_id";
$proto90["m_columns"][] = "tgl_jatuhtempo_self";
$proto90["m_columns"][] = "spt_denda";
$proto90["m_columns"][] = "tgl_spt";
$proto90["m_columns"][] = "pad_bunga";
$proto90["m_columns"][] = "fax";
$proto90["m_columns"][] = "website";
$proto90["m_columns"][] = "email";
$proto90["m_columns"][] = "daerah";
$proto90["m_columns"][] = "alamat_lengkap";
$proto90["m_columns"][] = "ppj_id";
$proto90["m_columns"][] = "hotel_id";
$proto90["m_columns"][] = "walet_id";
$proto90["m_columns"][] = "restauran_id";
$proto90["m_columns"][] = "hiburan_id";
$proto90["m_columns"][] = "parkir_id";
$proto90["m_columns"][] = "enabled";
$proto90["m_columns"][] = "surat_no";
$proto90["m_columns"][] = "ijin_kd";
$proto90["m_columns"][] = "hotel_kd";
$proto90["m_columns"][] = "restoran_kd";
$proto90["m_columns"][] = "hiburan_kd";
$proto90["m_columns"][] = "ppj_kd";
$proto90["m_columns"][] = "parkir_kd";
$proto90["m_columns"][] = "airtanah_kd";
$proto90["m_columns"][] = "reklame_kd";
$proto90["m_columns"][] = "restauran_kd";
$obj = new SQLTable($proto90);

$proto89["m_table"] = $obj;
$proto89["m_alias"] = "";
$proto91=array();
$proto91["m_sql"] = "";
$proto91["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto91["m_column"]=$obj;
$proto91["m_contained"] = array();
$proto91["m_strCase"] = "";
$proto91["m_havingmode"] = "0";
$proto91["m_inBrackets"] = "0";
$proto91["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto91);

$proto89["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto89);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_pemda = createSqlQuery_pad_pad_pemda();
																																										$tdatapad_pad_pemda[".sqlquery"] = $queryData_pad_pad_pemda;
	
if(isset($tdatapad_pad_pemda["field2"])){
	$tdatapad_pad_pemda["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_pemda["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_pemda["field2"]["LookupType"] = 4;
	$tdatapad_pad_pemda["field2"]["LinkField"] = "email";
	$tdatapad_pad_pemda["field2"]["DisplayField"] = "name";
	$tdatapad_pad_pemda[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_pemda"] = new eventsBase;
$tdatapad_pad_pemda[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_pemda");

?>