<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_customer = array();
	$tdatapad_pad_customer[".NumberOfChars"] = 80; 
	$tdatapad_pad_customer[".ShortName"] = "pad_pad_customer";
	$tdatapad_pad_customer[".OwnerID"] = "";
	$tdatapad_pad_customer[".OriginalTable"] = "pad.pad_customer";

//	field labels
$fieldLabelspad_pad_customer = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_customer["English"] = array();
	$fieldToolTipspad_pad_customer["English"] = array();
	$fieldLabelspad_pad_customer["English"]["id"] = "Id";
	$fieldToolTipspad_pad_customer["English"]["id"] = "";
	$fieldLabelspad_pad_customer["English"]["parent"] = "Parent";
	$fieldToolTipspad_pad_customer["English"]["parent"] = "";
	$fieldLabelspad_pad_customer["English"]["npwpd"] = "Npwpd";
	$fieldToolTipspad_pad_customer["English"]["npwpd"] = "";
	$fieldLabelspad_pad_customer["English"]["rp"] = "Rp";
	$fieldToolTipspad_pad_customer["English"]["rp"] = "";
	$fieldLabelspad_pad_customer["English"]["pb"] = "Pb";
	$fieldToolTipspad_pad_customer["English"]["pb"] = "";
	$fieldLabelspad_pad_customer["English"]["formno"] = "Formno";
	$fieldToolTipspad_pad_customer["English"]["formno"] = "";
	$fieldLabelspad_pad_customer["English"]["reg_date"] = "Reg Date";
	$fieldToolTipspad_pad_customer["English"]["reg_date"] = "";
	$fieldLabelspad_pad_customer["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_customer["English"]["nama"] = "";
	$fieldLabelspad_pad_customer["English"]["kecamatan_id"] = "Kecamatan Id";
	$fieldToolTipspad_pad_customer["English"]["kecamatan_id"] = "";
	$fieldLabelspad_pad_customer["English"]["kelurahan_id"] = "Kelurahan Id";
	$fieldToolTipspad_pad_customer["English"]["kelurahan_id"] = "";
	$fieldLabelspad_pad_customer["English"]["kabupaten"] = "Kabupaten";
	$fieldToolTipspad_pad_customer["English"]["kabupaten"] = "";
	$fieldLabelspad_pad_customer["English"]["alamat"] = "Alamat";
	$fieldToolTipspad_pad_customer["English"]["alamat"] = "";
	$fieldLabelspad_pad_customer["English"]["kodepos"] = "Kodepos";
	$fieldToolTipspad_pad_customer["English"]["kodepos"] = "";
	$fieldLabelspad_pad_customer["English"]["telphone"] = "Telphone";
	$fieldToolTipspad_pad_customer["English"]["telphone"] = "";
	$fieldLabelspad_pad_customer["English"]["wpnama"] = "Wpnama";
	$fieldToolTipspad_pad_customer["English"]["wpnama"] = "";
	$fieldLabelspad_pad_customer["English"]["wpalamat"] = "Wpalamat";
	$fieldToolTipspad_pad_customer["English"]["wpalamat"] = "";
	$fieldLabelspad_pad_customer["English"]["wpkelurahan"] = "Wpkelurahan";
	$fieldToolTipspad_pad_customer["English"]["wpkelurahan"] = "";
	$fieldLabelspad_pad_customer["English"]["wpkecamatan"] = "Wpkecamatan";
	$fieldToolTipspad_pad_customer["English"]["wpkecamatan"] = "";
	$fieldLabelspad_pad_customer["English"]["wpkabupaten"] = "Wpkabupaten";
	$fieldToolTipspad_pad_customer["English"]["wpkabupaten"] = "";
	$fieldLabelspad_pad_customer["English"]["wptelp"] = "Wptelp";
	$fieldToolTipspad_pad_customer["English"]["wptelp"] = "";
	$fieldLabelspad_pad_customer["English"]["wpkodepos"] = "Wpkodepos";
	$fieldToolTipspad_pad_customer["English"]["wpkodepos"] = "";
	$fieldLabelspad_pad_customer["English"]["pnama"] = "Pnama";
	$fieldToolTipspad_pad_customer["English"]["pnama"] = "";
	$fieldLabelspad_pad_customer["English"]["palamat"] = "Palamat";
	$fieldToolTipspad_pad_customer["English"]["palamat"] = "";
	$fieldLabelspad_pad_customer["English"]["pkelurahan"] = "Pkelurahan";
	$fieldToolTipspad_pad_customer["English"]["pkelurahan"] = "";
	$fieldLabelspad_pad_customer["English"]["pkecamatan"] = "Pkecamatan";
	$fieldToolTipspad_pad_customer["English"]["pkecamatan"] = "";
	$fieldLabelspad_pad_customer["English"]["pkabupaten"] = "Pkabupaten";
	$fieldToolTipspad_pad_customer["English"]["pkabupaten"] = "";
	$fieldLabelspad_pad_customer["English"]["ptelp"] = "Ptelp";
	$fieldToolTipspad_pad_customer["English"]["ptelp"] = "";
	$fieldLabelspad_pad_customer["English"]["pkodepos"] = "Pkodepos";
	$fieldToolTipspad_pad_customer["English"]["pkodepos"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin1"] = "Ijin1";
	$fieldToolTipspad_pad_customer["English"]["ijin1"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin1no"] = "Ijin1no";
	$fieldToolTipspad_pad_customer["English"]["ijin1no"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin1tgl"] = "Ijin1tgl";
	$fieldToolTipspad_pad_customer["English"]["ijin1tgl"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin1tglakhir"] = "Ijin1tglakhir";
	$fieldToolTipspad_pad_customer["English"]["ijin1tglakhir"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin2"] = "Ijin2";
	$fieldToolTipspad_pad_customer["English"]["ijin2"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin2no"] = "Ijin2no";
	$fieldToolTipspad_pad_customer["English"]["ijin2no"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin2tgl"] = "Ijin2tgl";
	$fieldToolTipspad_pad_customer["English"]["ijin2tgl"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin2tglakhir"] = "Ijin2tglakhir";
	$fieldToolTipspad_pad_customer["English"]["ijin2tglakhir"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin3"] = "Ijin3";
	$fieldToolTipspad_pad_customer["English"]["ijin3"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin3no"] = "Ijin3no";
	$fieldToolTipspad_pad_customer["English"]["ijin3no"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin3tgl"] = "Ijin3tgl";
	$fieldToolTipspad_pad_customer["English"]["ijin3tgl"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin3tglakhir"] = "Ijin3tglakhir";
	$fieldToolTipspad_pad_customer["English"]["ijin3tglakhir"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin4"] = "Ijin4";
	$fieldToolTipspad_pad_customer["English"]["ijin4"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin4no"] = "Ijin4no";
	$fieldToolTipspad_pad_customer["English"]["ijin4no"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin4tgl"] = "Ijin4tgl";
	$fieldToolTipspad_pad_customer["English"]["ijin4tgl"] = "";
	$fieldLabelspad_pad_customer["English"]["ijin4tglakhir"] = "Ijin4tglakhir";
	$fieldToolTipspad_pad_customer["English"]["ijin4tglakhir"] = "";
	$fieldLabelspad_pad_customer["English"]["kukuhno"] = "Kukuhno";
	$fieldToolTipspad_pad_customer["English"]["kukuhno"] = "";
	$fieldLabelspad_pad_customer["English"]["kukuhnip"] = "Kukuhnip";
	$fieldToolTipspad_pad_customer["English"]["kukuhnip"] = "";
	$fieldLabelspad_pad_customer["English"]["kukuhtgl"] = "Kukuhtgl";
	$fieldToolTipspad_pad_customer["English"]["kukuhtgl"] = "";
	$fieldLabelspad_pad_customer["English"]["kukuh_jabat_id"] = "Kukuh Jabat Id";
	$fieldToolTipspad_pad_customer["English"]["kukuh_jabat_id"] = "";
	$fieldLabelspad_pad_customer["English"]["kukuhprinted"] = "Kukuhprinted";
	$fieldToolTipspad_pad_customer["English"]["kukuhprinted"] = "";
	$fieldLabelspad_pad_customer["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_customer["English"]["enabled"] = "";
	$fieldLabelspad_pad_customer["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_customer["English"]["create_uid"] = "";
	$fieldLabelspad_pad_customer["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_customer["English"]["tmt"] = "";
	$fieldLabelspad_pad_customer["English"]["customer_status_id"] = "Customer Status Id";
	$fieldToolTipspad_pad_customer["English"]["customer_status_id"] = "";
	$fieldLabelspad_pad_customer["English"]["kembalitgl"] = "Kembalitgl";
	$fieldToolTipspad_pad_customer["English"]["kembalitgl"] = "";
	$fieldLabelspad_pad_customer["English"]["kembalioleh"] = "Kembalioleh";
	$fieldToolTipspad_pad_customer["English"]["kembalioleh"] = "";
	$fieldLabelspad_pad_customer["English"]["kartuprinted"] = "Kartuprinted";
	$fieldToolTipspad_pad_customer["English"]["kartuprinted"] = "";
	$fieldLabelspad_pad_customer["English"]["kembalinip"] = "Kembalinip";
	$fieldToolTipspad_pad_customer["English"]["kembalinip"] = "";
	$fieldLabelspad_pad_customer["English"]["penerimanm"] = "Penerimanm";
	$fieldToolTipspad_pad_customer["English"]["penerimanm"] = "";
	$fieldLabelspad_pad_customer["English"]["penerimaalamat"] = "Penerimaalamat";
	$fieldToolTipspad_pad_customer["English"]["penerimaalamat"] = "";
	$fieldLabelspad_pad_customer["English"]["penerimatgl"] = "Penerimatgl";
	$fieldToolTipspad_pad_customer["English"]["penerimatgl"] = "";
	$fieldLabelspad_pad_customer["English"]["catatnip"] = "Catatnip";
	$fieldToolTipspad_pad_customer["English"]["catatnip"] = "";
	$fieldLabelspad_pad_customer["English"]["kirimtgl"] = "Kirimtgl";
	$fieldToolTipspad_pad_customer["English"]["kirimtgl"] = "";
	$fieldLabelspad_pad_customer["English"]["batastgl"] = "Batastgl";
	$fieldToolTipspad_pad_customer["English"]["batastgl"] = "";
	$fieldLabelspad_pad_customer["English"]["petugas_jabat_id"] = "Petugas Jabat Id";
	$fieldToolTipspad_pad_customer["English"]["petugas_jabat_id"] = "";
	$fieldLabelspad_pad_customer["English"]["pencatat_jabat_id"] = "Pencatat Jabat Id";
	$fieldToolTipspad_pad_customer["English"]["pencatat_jabat_id"] = "";
	$fieldLabelspad_pad_customer["English"]["created"] = "Created";
	$fieldToolTipspad_pad_customer["English"]["created"] = "";
	$fieldLabelspad_pad_customer["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_customer["English"]["updated"] = "";
	$fieldLabelspad_pad_customer["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_customer["English"]["update_uid"] = "";
	$fieldLabelspad_pad_customer["English"]["npwpd_old"] = "Npwpd Old";
	$fieldToolTipspad_pad_customer["English"]["npwpd_old"] = "";
	$fieldLabelspad_pad_customer["English"]["id_old"] = "Id Old";
	$fieldToolTipspad_pad_customer["English"]["id_old"] = "";
	if (count($fieldToolTipspad_pad_customer["English"]))
		$tdatapad_pad_customer[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_customer[".NCSearch"] = true;



$tdatapad_pad_customer[".shortTableName"] = "pad_pad_customer";
$tdatapad_pad_customer[".nSecOptions"] = 0;
$tdatapad_pad_customer[".recsPerRowList"] = 1;
$tdatapad_pad_customer[".mainTableOwnerID"] = "";
$tdatapad_pad_customer[".moveNext"] = 1;
$tdatapad_pad_customer[".nType"] = 0;

$tdatapad_pad_customer[".strOriginalTableName"] = "pad.pad_customer";




$tdatapad_pad_customer[".showAddInPopup"] = false;

$tdatapad_pad_customer[".showEditInPopup"] = false;

$tdatapad_pad_customer[".showViewInPopup"] = false;

$tdatapad_pad_customer[".fieldsForRegister"] = array();

$tdatapad_pad_customer[".listAjax"] = false;

	$tdatapad_pad_customer[".audit"] = false;

	$tdatapad_pad_customer[".locking"] = false;

$tdatapad_pad_customer[".listIcons"] = true;
$tdatapad_pad_customer[".edit"] = true;
$tdatapad_pad_customer[".inlineEdit"] = true;
$tdatapad_pad_customer[".inlineAdd"] = true;
$tdatapad_pad_customer[".view"] = true;

$tdatapad_pad_customer[".exportTo"] = true;

$tdatapad_pad_customer[".printFriendly"] = true;

$tdatapad_pad_customer[".delete"] = true;

$tdatapad_pad_customer[".showSimpleSearchOptions"] = false;

$tdatapad_pad_customer[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_customer[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_customer[".isUseAjaxSuggest"] = true;

$tdatapad_pad_customer[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_customer[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_customer[".isUseTimeForSearch"] = false;



$tdatapad_pad_customer[".useDetailsPreview"] = true;

$tdatapad_pad_customer[".allSearchFields"] = array();

$tdatapad_pad_customer[".allSearchFields"][] = "id";
$tdatapad_pad_customer[".allSearchFields"][] = "parent";
$tdatapad_pad_customer[".allSearchFields"][] = "npwpd";
$tdatapad_pad_customer[".allSearchFields"][] = "rp";
$tdatapad_pad_customer[".allSearchFields"][] = "pb";
$tdatapad_pad_customer[".allSearchFields"][] = "formno";
$tdatapad_pad_customer[".allSearchFields"][] = "reg_date";
$tdatapad_pad_customer[".allSearchFields"][] = "nama";
$tdatapad_pad_customer[".allSearchFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".allSearchFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".allSearchFields"][] = "kabupaten";
$tdatapad_pad_customer[".allSearchFields"][] = "alamat";
$tdatapad_pad_customer[".allSearchFields"][] = "kodepos";
$tdatapad_pad_customer[".allSearchFields"][] = "telphone";
$tdatapad_pad_customer[".allSearchFields"][] = "wpnama";
$tdatapad_pad_customer[".allSearchFields"][] = "wpalamat";
$tdatapad_pad_customer[".allSearchFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".allSearchFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".allSearchFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".allSearchFields"][] = "wptelp";
$tdatapad_pad_customer[".allSearchFields"][] = "wpkodepos";
$tdatapad_pad_customer[".allSearchFields"][] = "pnama";
$tdatapad_pad_customer[".allSearchFields"][] = "palamat";
$tdatapad_pad_customer[".allSearchFields"][] = "pkelurahan";
$tdatapad_pad_customer[".allSearchFields"][] = "pkecamatan";
$tdatapad_pad_customer[".allSearchFields"][] = "pkabupaten";
$tdatapad_pad_customer[".allSearchFields"][] = "ptelp";
$tdatapad_pad_customer[".allSearchFields"][] = "pkodepos";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin1";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin1no";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin2";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin2no";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin3";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin3no";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin4";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin4no";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".allSearchFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".allSearchFields"][] = "kukuhno";
$tdatapad_pad_customer[".allSearchFields"][] = "kukuhnip";
$tdatapad_pad_customer[".allSearchFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".allSearchFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".allSearchFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".allSearchFields"][] = "enabled";
$tdatapad_pad_customer[".allSearchFields"][] = "create_uid";
$tdatapad_pad_customer[".allSearchFields"][] = "tmt";
$tdatapad_pad_customer[".allSearchFields"][] = "customer_status_id";
$tdatapad_pad_customer[".allSearchFields"][] = "kembalitgl";
$tdatapad_pad_customer[".allSearchFields"][] = "kembalioleh";
$tdatapad_pad_customer[".allSearchFields"][] = "kartuprinted";
$tdatapad_pad_customer[".allSearchFields"][] = "kembalinip";
$tdatapad_pad_customer[".allSearchFields"][] = "penerimanm";
$tdatapad_pad_customer[".allSearchFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".allSearchFields"][] = "penerimatgl";
$tdatapad_pad_customer[".allSearchFields"][] = "catatnip";
$tdatapad_pad_customer[".allSearchFields"][] = "kirimtgl";
$tdatapad_pad_customer[".allSearchFields"][] = "batastgl";
$tdatapad_pad_customer[".allSearchFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".allSearchFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".allSearchFields"][] = "created";
$tdatapad_pad_customer[".allSearchFields"][] = "updated";
$tdatapad_pad_customer[".allSearchFields"][] = "update_uid";
$tdatapad_pad_customer[".allSearchFields"][] = "npwpd_old";
$tdatapad_pad_customer[".allSearchFields"][] = "id_old";

$tdatapad_pad_customer[".googleLikeFields"][] = "id";
$tdatapad_pad_customer[".googleLikeFields"][] = "parent";
$tdatapad_pad_customer[".googleLikeFields"][] = "npwpd";
$tdatapad_pad_customer[".googleLikeFields"][] = "rp";
$tdatapad_pad_customer[".googleLikeFields"][] = "pb";
$tdatapad_pad_customer[".googleLikeFields"][] = "formno";
$tdatapad_pad_customer[".googleLikeFields"][] = "reg_date";
$tdatapad_pad_customer[".googleLikeFields"][] = "nama";
$tdatapad_pad_customer[".googleLikeFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".googleLikeFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".googleLikeFields"][] = "kabupaten";
$tdatapad_pad_customer[".googleLikeFields"][] = "alamat";
$tdatapad_pad_customer[".googleLikeFields"][] = "kodepos";
$tdatapad_pad_customer[".googleLikeFields"][] = "telphone";
$tdatapad_pad_customer[".googleLikeFields"][] = "wpnama";
$tdatapad_pad_customer[".googleLikeFields"][] = "wpalamat";
$tdatapad_pad_customer[".googleLikeFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".googleLikeFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".googleLikeFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".googleLikeFields"][] = "wptelp";
$tdatapad_pad_customer[".googleLikeFields"][] = "wpkodepos";
$tdatapad_pad_customer[".googleLikeFields"][] = "pnama";
$tdatapad_pad_customer[".googleLikeFields"][] = "palamat";
$tdatapad_pad_customer[".googleLikeFields"][] = "pkelurahan";
$tdatapad_pad_customer[".googleLikeFields"][] = "pkecamatan";
$tdatapad_pad_customer[".googleLikeFields"][] = "pkabupaten";
$tdatapad_pad_customer[".googleLikeFields"][] = "ptelp";
$tdatapad_pad_customer[".googleLikeFields"][] = "pkodepos";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin1";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin1no";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin2";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin2no";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin3";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin3no";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin4";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin4no";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".googleLikeFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".googleLikeFields"][] = "kukuhno";
$tdatapad_pad_customer[".googleLikeFields"][] = "kukuhnip";
$tdatapad_pad_customer[".googleLikeFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".googleLikeFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".googleLikeFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".googleLikeFields"][] = "enabled";
$tdatapad_pad_customer[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_customer[".googleLikeFields"][] = "tmt";
$tdatapad_pad_customer[".googleLikeFields"][] = "customer_status_id";
$tdatapad_pad_customer[".googleLikeFields"][] = "kembalitgl";
$tdatapad_pad_customer[".googleLikeFields"][] = "kembalioleh";
$tdatapad_pad_customer[".googleLikeFields"][] = "kartuprinted";
$tdatapad_pad_customer[".googleLikeFields"][] = "kembalinip";
$tdatapad_pad_customer[".googleLikeFields"][] = "penerimanm";
$tdatapad_pad_customer[".googleLikeFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".googleLikeFields"][] = "penerimatgl";
$tdatapad_pad_customer[".googleLikeFields"][] = "catatnip";
$tdatapad_pad_customer[".googleLikeFields"][] = "kirimtgl";
$tdatapad_pad_customer[".googleLikeFields"][] = "batastgl";
$tdatapad_pad_customer[".googleLikeFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".googleLikeFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".googleLikeFields"][] = "created";
$tdatapad_pad_customer[".googleLikeFields"][] = "updated";
$tdatapad_pad_customer[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_customer[".googleLikeFields"][] = "npwpd_old";
$tdatapad_pad_customer[".googleLikeFields"][] = "id_old";


$tdatapad_pad_customer[".advSearchFields"][] = "id";
$tdatapad_pad_customer[".advSearchFields"][] = "parent";
$tdatapad_pad_customer[".advSearchFields"][] = "npwpd";
$tdatapad_pad_customer[".advSearchFields"][] = "rp";
$tdatapad_pad_customer[".advSearchFields"][] = "pb";
$tdatapad_pad_customer[".advSearchFields"][] = "formno";
$tdatapad_pad_customer[".advSearchFields"][] = "reg_date";
$tdatapad_pad_customer[".advSearchFields"][] = "nama";
$tdatapad_pad_customer[".advSearchFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".advSearchFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".advSearchFields"][] = "kabupaten";
$tdatapad_pad_customer[".advSearchFields"][] = "alamat";
$tdatapad_pad_customer[".advSearchFields"][] = "kodepos";
$tdatapad_pad_customer[".advSearchFields"][] = "telphone";
$tdatapad_pad_customer[".advSearchFields"][] = "wpnama";
$tdatapad_pad_customer[".advSearchFields"][] = "wpalamat";
$tdatapad_pad_customer[".advSearchFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".advSearchFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".advSearchFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".advSearchFields"][] = "wptelp";
$tdatapad_pad_customer[".advSearchFields"][] = "wpkodepos";
$tdatapad_pad_customer[".advSearchFields"][] = "pnama";
$tdatapad_pad_customer[".advSearchFields"][] = "palamat";
$tdatapad_pad_customer[".advSearchFields"][] = "pkelurahan";
$tdatapad_pad_customer[".advSearchFields"][] = "pkecamatan";
$tdatapad_pad_customer[".advSearchFields"][] = "pkabupaten";
$tdatapad_pad_customer[".advSearchFields"][] = "ptelp";
$tdatapad_pad_customer[".advSearchFields"][] = "pkodepos";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin1";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin1no";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin2";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin2no";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin3";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin3no";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin4";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin4no";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".advSearchFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".advSearchFields"][] = "kukuhno";
$tdatapad_pad_customer[".advSearchFields"][] = "kukuhnip";
$tdatapad_pad_customer[".advSearchFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".advSearchFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".advSearchFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".advSearchFields"][] = "enabled";
$tdatapad_pad_customer[".advSearchFields"][] = "create_uid";
$tdatapad_pad_customer[".advSearchFields"][] = "tmt";
$tdatapad_pad_customer[".advSearchFields"][] = "customer_status_id";
$tdatapad_pad_customer[".advSearchFields"][] = "kembalitgl";
$tdatapad_pad_customer[".advSearchFields"][] = "kembalioleh";
$tdatapad_pad_customer[".advSearchFields"][] = "kartuprinted";
$tdatapad_pad_customer[".advSearchFields"][] = "kembalinip";
$tdatapad_pad_customer[".advSearchFields"][] = "penerimanm";
$tdatapad_pad_customer[".advSearchFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".advSearchFields"][] = "penerimatgl";
$tdatapad_pad_customer[".advSearchFields"][] = "catatnip";
$tdatapad_pad_customer[".advSearchFields"][] = "kirimtgl";
$tdatapad_pad_customer[".advSearchFields"][] = "batastgl";
$tdatapad_pad_customer[".advSearchFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".advSearchFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".advSearchFields"][] = "created";
$tdatapad_pad_customer[".advSearchFields"][] = "updated";
$tdatapad_pad_customer[".advSearchFields"][] = "update_uid";
$tdatapad_pad_customer[".advSearchFields"][] = "npwpd_old";
$tdatapad_pad_customer[".advSearchFields"][] = "id_old";

$tdatapad_pad_customer[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
				


$tdatapad_pad_customer[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_customer[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_customer[".orderindexes"] = array();

$tdatapad_pad_customer[".sqlHead"] = "SELECT id,   parent,   npwpd,   rp,   pb,   formno,   reg_date,   nama,   kecamatan_id,   kelurahan_id,   kabupaten,   alamat,   kodepos,   telphone,   wpnama,   wpalamat,   wpkelurahan,   wpkecamatan,   wpkabupaten,   wptelp,   wpkodepos,   pnama,   palamat,   pkelurahan,   pkecamatan,   pkabupaten,   ptelp,   pkodepos,   ijin1,   ijin1no,   ijin1tgl,   ijin1tglakhir,   ijin2,   ijin2no,   ijin2tgl,   ijin2tglakhir,   ijin3,   ijin3no,   ijin3tgl,   ijin3tglakhir,   ijin4,   ijin4no,   ijin4tgl,   ijin4tglakhir,   kukuhno,   kukuhnip,   kukuhtgl,   kukuh_jabat_id,   kukuhprinted,   enabled,   create_uid,   tmt,   customer_status_id,   kembalitgl,   kembalioleh,   kartuprinted,   kembalinip,   penerimanm,   penerimaalamat,   penerimatgl,   catatnip,   kirimtgl,   batastgl,   petugas_jabat_id,   pencatat_jabat_id,   created,   updated,   update_uid,   npwpd_old,   id_old";
$tdatapad_pad_customer[".sqlFrom"] = "FROM \"pad\".pad_customer";
$tdatapad_pad_customer[".sqlWhereExpr"] = "";
$tdatapad_pad_customer[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_customer[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_customer[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_customer = array();
$tableKeyspad_pad_customer[] = "id";
$tdatapad_pad_customer[".Keys"] = $tableKeyspad_pad_customer;

$tdatapad_pad_customer[".listFields"] = array();
$tdatapad_pad_customer[".listFields"][] = "id";
$tdatapad_pad_customer[".listFields"][] = "parent";
$tdatapad_pad_customer[".listFields"][] = "npwpd";
$tdatapad_pad_customer[".listFields"][] = "rp";
$tdatapad_pad_customer[".listFields"][] = "pb";
$tdatapad_pad_customer[".listFields"][] = "formno";
$tdatapad_pad_customer[".listFields"][] = "reg_date";
$tdatapad_pad_customer[".listFields"][] = "nama";
$tdatapad_pad_customer[".listFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".listFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".listFields"][] = "kabupaten";
$tdatapad_pad_customer[".listFields"][] = "alamat";
$tdatapad_pad_customer[".listFields"][] = "kodepos";
$tdatapad_pad_customer[".listFields"][] = "telphone";
$tdatapad_pad_customer[".listFields"][] = "wpnama";
$tdatapad_pad_customer[".listFields"][] = "wpalamat";
$tdatapad_pad_customer[".listFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".listFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".listFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".listFields"][] = "wptelp";
$tdatapad_pad_customer[".listFields"][] = "wpkodepos";
$tdatapad_pad_customer[".listFields"][] = "pnama";
$tdatapad_pad_customer[".listFields"][] = "palamat";
$tdatapad_pad_customer[".listFields"][] = "pkelurahan";
$tdatapad_pad_customer[".listFields"][] = "pkecamatan";
$tdatapad_pad_customer[".listFields"][] = "pkabupaten";
$tdatapad_pad_customer[".listFields"][] = "ptelp";
$tdatapad_pad_customer[".listFields"][] = "pkodepos";
$tdatapad_pad_customer[".listFields"][] = "ijin1";
$tdatapad_pad_customer[".listFields"][] = "ijin1no";
$tdatapad_pad_customer[".listFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".listFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".listFields"][] = "ijin2";
$tdatapad_pad_customer[".listFields"][] = "ijin2no";
$tdatapad_pad_customer[".listFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".listFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".listFields"][] = "ijin3";
$tdatapad_pad_customer[".listFields"][] = "ijin3no";
$tdatapad_pad_customer[".listFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".listFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".listFields"][] = "ijin4";
$tdatapad_pad_customer[".listFields"][] = "ijin4no";
$tdatapad_pad_customer[".listFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".listFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".listFields"][] = "kukuhno";
$tdatapad_pad_customer[".listFields"][] = "kukuhnip";
$tdatapad_pad_customer[".listFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".listFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".listFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".listFields"][] = "enabled";
$tdatapad_pad_customer[".listFields"][] = "create_uid";
$tdatapad_pad_customer[".listFields"][] = "tmt";
$tdatapad_pad_customer[".listFields"][] = "customer_status_id";
$tdatapad_pad_customer[".listFields"][] = "kembalitgl";
$tdatapad_pad_customer[".listFields"][] = "kembalioleh";
$tdatapad_pad_customer[".listFields"][] = "kartuprinted";
$tdatapad_pad_customer[".listFields"][] = "kembalinip";
$tdatapad_pad_customer[".listFields"][] = "penerimanm";
$tdatapad_pad_customer[".listFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".listFields"][] = "penerimatgl";
$tdatapad_pad_customer[".listFields"][] = "catatnip";
$tdatapad_pad_customer[".listFields"][] = "kirimtgl";
$tdatapad_pad_customer[".listFields"][] = "batastgl";
$tdatapad_pad_customer[".listFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".listFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".listFields"][] = "created";
$tdatapad_pad_customer[".listFields"][] = "updated";
$tdatapad_pad_customer[".listFields"][] = "update_uid";
$tdatapad_pad_customer[".listFields"][] = "npwpd_old";
$tdatapad_pad_customer[".listFields"][] = "id_old";

$tdatapad_pad_customer[".viewFields"] = array();
$tdatapad_pad_customer[".viewFields"][] = "id";
$tdatapad_pad_customer[".viewFields"][] = "parent";
$tdatapad_pad_customer[".viewFields"][] = "npwpd";
$tdatapad_pad_customer[".viewFields"][] = "rp";
$tdatapad_pad_customer[".viewFields"][] = "pb";
$tdatapad_pad_customer[".viewFields"][] = "formno";
$tdatapad_pad_customer[".viewFields"][] = "reg_date";
$tdatapad_pad_customer[".viewFields"][] = "nama";
$tdatapad_pad_customer[".viewFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".viewFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".viewFields"][] = "kabupaten";
$tdatapad_pad_customer[".viewFields"][] = "alamat";
$tdatapad_pad_customer[".viewFields"][] = "kodepos";
$tdatapad_pad_customer[".viewFields"][] = "telphone";
$tdatapad_pad_customer[".viewFields"][] = "wpnama";
$tdatapad_pad_customer[".viewFields"][] = "wpalamat";
$tdatapad_pad_customer[".viewFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".viewFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".viewFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".viewFields"][] = "wptelp";
$tdatapad_pad_customer[".viewFields"][] = "wpkodepos";
$tdatapad_pad_customer[".viewFields"][] = "pnama";
$tdatapad_pad_customer[".viewFields"][] = "palamat";
$tdatapad_pad_customer[".viewFields"][] = "pkelurahan";
$tdatapad_pad_customer[".viewFields"][] = "pkecamatan";
$tdatapad_pad_customer[".viewFields"][] = "pkabupaten";
$tdatapad_pad_customer[".viewFields"][] = "ptelp";
$tdatapad_pad_customer[".viewFields"][] = "pkodepos";
$tdatapad_pad_customer[".viewFields"][] = "ijin1";
$tdatapad_pad_customer[".viewFields"][] = "ijin1no";
$tdatapad_pad_customer[".viewFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".viewFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".viewFields"][] = "ijin2";
$tdatapad_pad_customer[".viewFields"][] = "ijin2no";
$tdatapad_pad_customer[".viewFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".viewFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".viewFields"][] = "ijin3";
$tdatapad_pad_customer[".viewFields"][] = "ijin3no";
$tdatapad_pad_customer[".viewFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".viewFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".viewFields"][] = "ijin4";
$tdatapad_pad_customer[".viewFields"][] = "ijin4no";
$tdatapad_pad_customer[".viewFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".viewFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".viewFields"][] = "kukuhno";
$tdatapad_pad_customer[".viewFields"][] = "kukuhnip";
$tdatapad_pad_customer[".viewFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".viewFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".viewFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".viewFields"][] = "enabled";
$tdatapad_pad_customer[".viewFields"][] = "create_uid";
$tdatapad_pad_customer[".viewFields"][] = "tmt";
$tdatapad_pad_customer[".viewFields"][] = "customer_status_id";
$tdatapad_pad_customer[".viewFields"][] = "kembalitgl";
$tdatapad_pad_customer[".viewFields"][] = "kembalioleh";
$tdatapad_pad_customer[".viewFields"][] = "kartuprinted";
$tdatapad_pad_customer[".viewFields"][] = "kembalinip";
$tdatapad_pad_customer[".viewFields"][] = "penerimanm";
$tdatapad_pad_customer[".viewFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".viewFields"][] = "penerimatgl";
$tdatapad_pad_customer[".viewFields"][] = "catatnip";
$tdatapad_pad_customer[".viewFields"][] = "kirimtgl";
$tdatapad_pad_customer[".viewFields"][] = "batastgl";
$tdatapad_pad_customer[".viewFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".viewFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".viewFields"][] = "created";
$tdatapad_pad_customer[".viewFields"][] = "updated";
$tdatapad_pad_customer[".viewFields"][] = "update_uid";
$tdatapad_pad_customer[".viewFields"][] = "npwpd_old";
$tdatapad_pad_customer[".viewFields"][] = "id_old";

$tdatapad_pad_customer[".addFields"] = array();
$tdatapad_pad_customer[".addFields"][] = "parent";
$tdatapad_pad_customer[".addFields"][] = "npwpd";
$tdatapad_pad_customer[".addFields"][] = "rp";
$tdatapad_pad_customer[".addFields"][] = "pb";
$tdatapad_pad_customer[".addFields"][] = "formno";
$tdatapad_pad_customer[".addFields"][] = "reg_date";
$tdatapad_pad_customer[".addFields"][] = "nama";
$tdatapad_pad_customer[".addFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".addFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".addFields"][] = "kabupaten";
$tdatapad_pad_customer[".addFields"][] = "alamat";
$tdatapad_pad_customer[".addFields"][] = "kodepos";
$tdatapad_pad_customer[".addFields"][] = "telphone";
$tdatapad_pad_customer[".addFields"][] = "wpnama";
$tdatapad_pad_customer[".addFields"][] = "wpalamat";
$tdatapad_pad_customer[".addFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".addFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".addFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".addFields"][] = "wptelp";
$tdatapad_pad_customer[".addFields"][] = "wpkodepos";
$tdatapad_pad_customer[".addFields"][] = "pnama";
$tdatapad_pad_customer[".addFields"][] = "palamat";
$tdatapad_pad_customer[".addFields"][] = "pkelurahan";
$tdatapad_pad_customer[".addFields"][] = "pkecamatan";
$tdatapad_pad_customer[".addFields"][] = "pkabupaten";
$tdatapad_pad_customer[".addFields"][] = "ptelp";
$tdatapad_pad_customer[".addFields"][] = "pkodepos";
$tdatapad_pad_customer[".addFields"][] = "ijin1";
$tdatapad_pad_customer[".addFields"][] = "ijin1no";
$tdatapad_pad_customer[".addFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".addFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".addFields"][] = "ijin2";
$tdatapad_pad_customer[".addFields"][] = "ijin2no";
$tdatapad_pad_customer[".addFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".addFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".addFields"][] = "ijin3";
$tdatapad_pad_customer[".addFields"][] = "ijin3no";
$tdatapad_pad_customer[".addFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".addFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".addFields"][] = "ijin4";
$tdatapad_pad_customer[".addFields"][] = "ijin4no";
$tdatapad_pad_customer[".addFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".addFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".addFields"][] = "kukuhno";
$tdatapad_pad_customer[".addFields"][] = "kukuhnip";
$tdatapad_pad_customer[".addFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".addFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".addFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".addFields"][] = "enabled";
$tdatapad_pad_customer[".addFields"][] = "create_uid";
$tdatapad_pad_customer[".addFields"][] = "tmt";
$tdatapad_pad_customer[".addFields"][] = "customer_status_id";
$tdatapad_pad_customer[".addFields"][] = "kembalitgl";
$tdatapad_pad_customer[".addFields"][] = "kembalioleh";
$tdatapad_pad_customer[".addFields"][] = "kartuprinted";
$tdatapad_pad_customer[".addFields"][] = "kembalinip";
$tdatapad_pad_customer[".addFields"][] = "penerimanm";
$tdatapad_pad_customer[".addFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".addFields"][] = "penerimatgl";
$tdatapad_pad_customer[".addFields"][] = "catatnip";
$tdatapad_pad_customer[".addFields"][] = "kirimtgl";
$tdatapad_pad_customer[".addFields"][] = "batastgl";
$tdatapad_pad_customer[".addFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".addFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".addFields"][] = "created";
$tdatapad_pad_customer[".addFields"][] = "updated";
$tdatapad_pad_customer[".addFields"][] = "update_uid";
$tdatapad_pad_customer[".addFields"][] = "npwpd_old";
$tdatapad_pad_customer[".addFields"][] = "id_old";

$tdatapad_pad_customer[".inlineAddFields"] = array();
$tdatapad_pad_customer[".inlineAddFields"][] = "parent";
$tdatapad_pad_customer[".inlineAddFields"][] = "npwpd";
$tdatapad_pad_customer[".inlineAddFields"][] = "rp";
$tdatapad_pad_customer[".inlineAddFields"][] = "pb";
$tdatapad_pad_customer[".inlineAddFields"][] = "formno";
$tdatapad_pad_customer[".inlineAddFields"][] = "reg_date";
$tdatapad_pad_customer[".inlineAddFields"][] = "nama";
$tdatapad_pad_customer[".inlineAddFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".inlineAddFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".inlineAddFields"][] = "kabupaten";
$tdatapad_pad_customer[".inlineAddFields"][] = "alamat";
$tdatapad_pad_customer[".inlineAddFields"][] = "kodepos";
$tdatapad_pad_customer[".inlineAddFields"][] = "telphone";
$tdatapad_pad_customer[".inlineAddFields"][] = "wpnama";
$tdatapad_pad_customer[".inlineAddFields"][] = "wpalamat";
$tdatapad_pad_customer[".inlineAddFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".inlineAddFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".inlineAddFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".inlineAddFields"][] = "wptelp";
$tdatapad_pad_customer[".inlineAddFields"][] = "wpkodepos";
$tdatapad_pad_customer[".inlineAddFields"][] = "pnama";
$tdatapad_pad_customer[".inlineAddFields"][] = "palamat";
$tdatapad_pad_customer[".inlineAddFields"][] = "pkelurahan";
$tdatapad_pad_customer[".inlineAddFields"][] = "pkecamatan";
$tdatapad_pad_customer[".inlineAddFields"][] = "pkabupaten";
$tdatapad_pad_customer[".inlineAddFields"][] = "ptelp";
$tdatapad_pad_customer[".inlineAddFields"][] = "pkodepos";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin1";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin1no";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin2";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin2no";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin3";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin3no";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin4";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin4no";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".inlineAddFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".inlineAddFields"][] = "kukuhno";
$tdatapad_pad_customer[".inlineAddFields"][] = "kukuhnip";
$tdatapad_pad_customer[".inlineAddFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".inlineAddFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".inlineAddFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".inlineAddFields"][] = "enabled";
$tdatapad_pad_customer[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_customer[".inlineAddFields"][] = "tmt";
$tdatapad_pad_customer[".inlineAddFields"][] = "customer_status_id";
$tdatapad_pad_customer[".inlineAddFields"][] = "kembalitgl";
$tdatapad_pad_customer[".inlineAddFields"][] = "kembalioleh";
$tdatapad_pad_customer[".inlineAddFields"][] = "kartuprinted";
$tdatapad_pad_customer[".inlineAddFields"][] = "kembalinip";
$tdatapad_pad_customer[".inlineAddFields"][] = "penerimanm";
$tdatapad_pad_customer[".inlineAddFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".inlineAddFields"][] = "penerimatgl";
$tdatapad_pad_customer[".inlineAddFields"][] = "catatnip";
$tdatapad_pad_customer[".inlineAddFields"][] = "kirimtgl";
$tdatapad_pad_customer[".inlineAddFields"][] = "batastgl";
$tdatapad_pad_customer[".inlineAddFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".inlineAddFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".inlineAddFields"][] = "created";
$tdatapad_pad_customer[".inlineAddFields"][] = "updated";
$tdatapad_pad_customer[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_customer[".inlineAddFields"][] = "npwpd_old";
$tdatapad_pad_customer[".inlineAddFields"][] = "id_old";

$tdatapad_pad_customer[".editFields"] = array();
$tdatapad_pad_customer[".editFields"][] = "parent";
$tdatapad_pad_customer[".editFields"][] = "npwpd";
$tdatapad_pad_customer[".editFields"][] = "rp";
$tdatapad_pad_customer[".editFields"][] = "pb";
$tdatapad_pad_customer[".editFields"][] = "formno";
$tdatapad_pad_customer[".editFields"][] = "reg_date";
$tdatapad_pad_customer[".editFields"][] = "nama";
$tdatapad_pad_customer[".editFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".editFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".editFields"][] = "kabupaten";
$tdatapad_pad_customer[".editFields"][] = "alamat";
$tdatapad_pad_customer[".editFields"][] = "kodepos";
$tdatapad_pad_customer[".editFields"][] = "telphone";
$tdatapad_pad_customer[".editFields"][] = "wpnama";
$tdatapad_pad_customer[".editFields"][] = "wpalamat";
$tdatapad_pad_customer[".editFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".editFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".editFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".editFields"][] = "wptelp";
$tdatapad_pad_customer[".editFields"][] = "wpkodepos";
$tdatapad_pad_customer[".editFields"][] = "pnama";
$tdatapad_pad_customer[".editFields"][] = "palamat";
$tdatapad_pad_customer[".editFields"][] = "pkelurahan";
$tdatapad_pad_customer[".editFields"][] = "pkecamatan";
$tdatapad_pad_customer[".editFields"][] = "pkabupaten";
$tdatapad_pad_customer[".editFields"][] = "ptelp";
$tdatapad_pad_customer[".editFields"][] = "pkodepos";
$tdatapad_pad_customer[".editFields"][] = "ijin1";
$tdatapad_pad_customer[".editFields"][] = "ijin1no";
$tdatapad_pad_customer[".editFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".editFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".editFields"][] = "ijin2";
$tdatapad_pad_customer[".editFields"][] = "ijin2no";
$tdatapad_pad_customer[".editFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".editFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".editFields"][] = "ijin3";
$tdatapad_pad_customer[".editFields"][] = "ijin3no";
$tdatapad_pad_customer[".editFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".editFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".editFields"][] = "ijin4";
$tdatapad_pad_customer[".editFields"][] = "ijin4no";
$tdatapad_pad_customer[".editFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".editFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".editFields"][] = "kukuhno";
$tdatapad_pad_customer[".editFields"][] = "kukuhnip";
$tdatapad_pad_customer[".editFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".editFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".editFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".editFields"][] = "enabled";
$tdatapad_pad_customer[".editFields"][] = "create_uid";
$tdatapad_pad_customer[".editFields"][] = "tmt";
$tdatapad_pad_customer[".editFields"][] = "customer_status_id";
$tdatapad_pad_customer[".editFields"][] = "kembalitgl";
$tdatapad_pad_customer[".editFields"][] = "kembalioleh";
$tdatapad_pad_customer[".editFields"][] = "kartuprinted";
$tdatapad_pad_customer[".editFields"][] = "kembalinip";
$tdatapad_pad_customer[".editFields"][] = "penerimanm";
$tdatapad_pad_customer[".editFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".editFields"][] = "penerimatgl";
$tdatapad_pad_customer[".editFields"][] = "catatnip";
$tdatapad_pad_customer[".editFields"][] = "kirimtgl";
$tdatapad_pad_customer[".editFields"][] = "batastgl";
$tdatapad_pad_customer[".editFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".editFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".editFields"][] = "created";
$tdatapad_pad_customer[".editFields"][] = "updated";
$tdatapad_pad_customer[".editFields"][] = "update_uid";
$tdatapad_pad_customer[".editFields"][] = "npwpd_old";
$tdatapad_pad_customer[".editFields"][] = "id_old";

$tdatapad_pad_customer[".inlineEditFields"] = array();
$tdatapad_pad_customer[".inlineEditFields"][] = "parent";
$tdatapad_pad_customer[".inlineEditFields"][] = "npwpd";
$tdatapad_pad_customer[".inlineEditFields"][] = "rp";
$tdatapad_pad_customer[".inlineEditFields"][] = "pb";
$tdatapad_pad_customer[".inlineEditFields"][] = "formno";
$tdatapad_pad_customer[".inlineEditFields"][] = "reg_date";
$tdatapad_pad_customer[".inlineEditFields"][] = "nama";
$tdatapad_pad_customer[".inlineEditFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".inlineEditFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".inlineEditFields"][] = "kabupaten";
$tdatapad_pad_customer[".inlineEditFields"][] = "alamat";
$tdatapad_pad_customer[".inlineEditFields"][] = "kodepos";
$tdatapad_pad_customer[".inlineEditFields"][] = "telphone";
$tdatapad_pad_customer[".inlineEditFields"][] = "wpnama";
$tdatapad_pad_customer[".inlineEditFields"][] = "wpalamat";
$tdatapad_pad_customer[".inlineEditFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".inlineEditFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".inlineEditFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".inlineEditFields"][] = "wptelp";
$tdatapad_pad_customer[".inlineEditFields"][] = "wpkodepos";
$tdatapad_pad_customer[".inlineEditFields"][] = "pnama";
$tdatapad_pad_customer[".inlineEditFields"][] = "palamat";
$tdatapad_pad_customer[".inlineEditFields"][] = "pkelurahan";
$tdatapad_pad_customer[".inlineEditFields"][] = "pkecamatan";
$tdatapad_pad_customer[".inlineEditFields"][] = "pkabupaten";
$tdatapad_pad_customer[".inlineEditFields"][] = "ptelp";
$tdatapad_pad_customer[".inlineEditFields"][] = "pkodepos";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin1";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin1no";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin2";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin2no";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin3";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin3no";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin4";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin4no";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".inlineEditFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".inlineEditFields"][] = "kukuhno";
$tdatapad_pad_customer[".inlineEditFields"][] = "kukuhnip";
$tdatapad_pad_customer[".inlineEditFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".inlineEditFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".inlineEditFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".inlineEditFields"][] = "enabled";
$tdatapad_pad_customer[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_customer[".inlineEditFields"][] = "tmt";
$tdatapad_pad_customer[".inlineEditFields"][] = "customer_status_id";
$tdatapad_pad_customer[".inlineEditFields"][] = "kembalitgl";
$tdatapad_pad_customer[".inlineEditFields"][] = "kembalioleh";
$tdatapad_pad_customer[".inlineEditFields"][] = "kartuprinted";
$tdatapad_pad_customer[".inlineEditFields"][] = "kembalinip";
$tdatapad_pad_customer[".inlineEditFields"][] = "penerimanm";
$tdatapad_pad_customer[".inlineEditFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".inlineEditFields"][] = "penerimatgl";
$tdatapad_pad_customer[".inlineEditFields"][] = "catatnip";
$tdatapad_pad_customer[".inlineEditFields"][] = "kirimtgl";
$tdatapad_pad_customer[".inlineEditFields"][] = "batastgl";
$tdatapad_pad_customer[".inlineEditFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".inlineEditFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".inlineEditFields"][] = "created";
$tdatapad_pad_customer[".inlineEditFields"][] = "updated";
$tdatapad_pad_customer[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_customer[".inlineEditFields"][] = "npwpd_old";
$tdatapad_pad_customer[".inlineEditFields"][] = "id_old";

$tdatapad_pad_customer[".exportFields"] = array();
$tdatapad_pad_customer[".exportFields"][] = "id";
$tdatapad_pad_customer[".exportFields"][] = "parent";
$tdatapad_pad_customer[".exportFields"][] = "npwpd";
$tdatapad_pad_customer[".exportFields"][] = "rp";
$tdatapad_pad_customer[".exportFields"][] = "pb";
$tdatapad_pad_customer[".exportFields"][] = "formno";
$tdatapad_pad_customer[".exportFields"][] = "reg_date";
$tdatapad_pad_customer[".exportFields"][] = "nama";
$tdatapad_pad_customer[".exportFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".exportFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".exportFields"][] = "kabupaten";
$tdatapad_pad_customer[".exportFields"][] = "alamat";
$tdatapad_pad_customer[".exportFields"][] = "kodepos";
$tdatapad_pad_customer[".exportFields"][] = "telphone";
$tdatapad_pad_customer[".exportFields"][] = "wpnama";
$tdatapad_pad_customer[".exportFields"][] = "wpalamat";
$tdatapad_pad_customer[".exportFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".exportFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".exportFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".exportFields"][] = "wptelp";
$tdatapad_pad_customer[".exportFields"][] = "wpkodepos";
$tdatapad_pad_customer[".exportFields"][] = "pnama";
$tdatapad_pad_customer[".exportFields"][] = "palamat";
$tdatapad_pad_customer[".exportFields"][] = "pkelurahan";
$tdatapad_pad_customer[".exportFields"][] = "pkecamatan";
$tdatapad_pad_customer[".exportFields"][] = "pkabupaten";
$tdatapad_pad_customer[".exportFields"][] = "ptelp";
$tdatapad_pad_customer[".exportFields"][] = "pkodepos";
$tdatapad_pad_customer[".exportFields"][] = "ijin1";
$tdatapad_pad_customer[".exportFields"][] = "ijin1no";
$tdatapad_pad_customer[".exportFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".exportFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".exportFields"][] = "ijin2";
$tdatapad_pad_customer[".exportFields"][] = "ijin2no";
$tdatapad_pad_customer[".exportFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".exportFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".exportFields"][] = "ijin3";
$tdatapad_pad_customer[".exportFields"][] = "ijin3no";
$tdatapad_pad_customer[".exportFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".exportFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".exportFields"][] = "ijin4";
$tdatapad_pad_customer[".exportFields"][] = "ijin4no";
$tdatapad_pad_customer[".exportFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".exportFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".exportFields"][] = "kukuhno";
$tdatapad_pad_customer[".exportFields"][] = "kukuhnip";
$tdatapad_pad_customer[".exportFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".exportFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".exportFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".exportFields"][] = "enabled";
$tdatapad_pad_customer[".exportFields"][] = "create_uid";
$tdatapad_pad_customer[".exportFields"][] = "tmt";
$tdatapad_pad_customer[".exportFields"][] = "customer_status_id";
$tdatapad_pad_customer[".exportFields"][] = "kembalitgl";
$tdatapad_pad_customer[".exportFields"][] = "kembalioleh";
$tdatapad_pad_customer[".exportFields"][] = "kartuprinted";
$tdatapad_pad_customer[".exportFields"][] = "kembalinip";
$tdatapad_pad_customer[".exportFields"][] = "penerimanm";
$tdatapad_pad_customer[".exportFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".exportFields"][] = "penerimatgl";
$tdatapad_pad_customer[".exportFields"][] = "catatnip";
$tdatapad_pad_customer[".exportFields"][] = "kirimtgl";
$tdatapad_pad_customer[".exportFields"][] = "batastgl";
$tdatapad_pad_customer[".exportFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".exportFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".exportFields"][] = "created";
$tdatapad_pad_customer[".exportFields"][] = "updated";
$tdatapad_pad_customer[".exportFields"][] = "update_uid";
$tdatapad_pad_customer[".exportFields"][] = "npwpd_old";
$tdatapad_pad_customer[".exportFields"][] = "id_old";

$tdatapad_pad_customer[".printFields"] = array();
$tdatapad_pad_customer[".printFields"][] = "id";
$tdatapad_pad_customer[".printFields"][] = "parent";
$tdatapad_pad_customer[".printFields"][] = "npwpd";
$tdatapad_pad_customer[".printFields"][] = "rp";
$tdatapad_pad_customer[".printFields"][] = "pb";
$tdatapad_pad_customer[".printFields"][] = "formno";
$tdatapad_pad_customer[".printFields"][] = "reg_date";
$tdatapad_pad_customer[".printFields"][] = "nama";
$tdatapad_pad_customer[".printFields"][] = "kecamatan_id";
$tdatapad_pad_customer[".printFields"][] = "kelurahan_id";
$tdatapad_pad_customer[".printFields"][] = "kabupaten";
$tdatapad_pad_customer[".printFields"][] = "alamat";
$tdatapad_pad_customer[".printFields"][] = "kodepos";
$tdatapad_pad_customer[".printFields"][] = "telphone";
$tdatapad_pad_customer[".printFields"][] = "wpnama";
$tdatapad_pad_customer[".printFields"][] = "wpalamat";
$tdatapad_pad_customer[".printFields"][] = "wpkelurahan";
$tdatapad_pad_customer[".printFields"][] = "wpkecamatan";
$tdatapad_pad_customer[".printFields"][] = "wpkabupaten";
$tdatapad_pad_customer[".printFields"][] = "wptelp";
$tdatapad_pad_customer[".printFields"][] = "wpkodepos";
$tdatapad_pad_customer[".printFields"][] = "pnama";
$tdatapad_pad_customer[".printFields"][] = "palamat";
$tdatapad_pad_customer[".printFields"][] = "pkelurahan";
$tdatapad_pad_customer[".printFields"][] = "pkecamatan";
$tdatapad_pad_customer[".printFields"][] = "pkabupaten";
$tdatapad_pad_customer[".printFields"][] = "ptelp";
$tdatapad_pad_customer[".printFields"][] = "pkodepos";
$tdatapad_pad_customer[".printFields"][] = "ijin1";
$tdatapad_pad_customer[".printFields"][] = "ijin1no";
$tdatapad_pad_customer[".printFields"][] = "ijin1tgl";
$tdatapad_pad_customer[".printFields"][] = "ijin1tglakhir";
$tdatapad_pad_customer[".printFields"][] = "ijin2";
$tdatapad_pad_customer[".printFields"][] = "ijin2no";
$tdatapad_pad_customer[".printFields"][] = "ijin2tgl";
$tdatapad_pad_customer[".printFields"][] = "ijin2tglakhir";
$tdatapad_pad_customer[".printFields"][] = "ijin3";
$tdatapad_pad_customer[".printFields"][] = "ijin3no";
$tdatapad_pad_customer[".printFields"][] = "ijin3tgl";
$tdatapad_pad_customer[".printFields"][] = "ijin3tglakhir";
$tdatapad_pad_customer[".printFields"][] = "ijin4";
$tdatapad_pad_customer[".printFields"][] = "ijin4no";
$tdatapad_pad_customer[".printFields"][] = "ijin4tgl";
$tdatapad_pad_customer[".printFields"][] = "ijin4tglakhir";
$tdatapad_pad_customer[".printFields"][] = "kukuhno";
$tdatapad_pad_customer[".printFields"][] = "kukuhnip";
$tdatapad_pad_customer[".printFields"][] = "kukuhtgl";
$tdatapad_pad_customer[".printFields"][] = "kukuh_jabat_id";
$tdatapad_pad_customer[".printFields"][] = "kukuhprinted";
$tdatapad_pad_customer[".printFields"][] = "enabled";
$tdatapad_pad_customer[".printFields"][] = "create_uid";
$tdatapad_pad_customer[".printFields"][] = "tmt";
$tdatapad_pad_customer[".printFields"][] = "customer_status_id";
$tdatapad_pad_customer[".printFields"][] = "kembalitgl";
$tdatapad_pad_customer[".printFields"][] = "kembalioleh";
$tdatapad_pad_customer[".printFields"][] = "kartuprinted";
$tdatapad_pad_customer[".printFields"][] = "kembalinip";
$tdatapad_pad_customer[".printFields"][] = "penerimanm";
$tdatapad_pad_customer[".printFields"][] = "penerimaalamat";
$tdatapad_pad_customer[".printFields"][] = "penerimatgl";
$tdatapad_pad_customer[".printFields"][] = "catatnip";
$tdatapad_pad_customer[".printFields"][] = "kirimtgl";
$tdatapad_pad_customer[".printFields"][] = "batastgl";
$tdatapad_pad_customer[".printFields"][] = "petugas_jabat_id";
$tdatapad_pad_customer[".printFields"][] = "pencatat_jabat_id";
$tdatapad_pad_customer[".printFields"][] = "created";
$tdatapad_pad_customer[".printFields"][] = "updated";
$tdatapad_pad_customer[".printFields"][] = "update_uid";
$tdatapad_pad_customer[".printFields"][] = "npwpd_old";
$tdatapad_pad_customer[".printFields"][] = "id_old";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_customer["id"] = $fdata;
//	parent
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "parent";
	$fdata["GoodName"] = "parent";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Parent"; 
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
	
		$fdata["strField"] = "parent"; 
		$fdata["FullName"] = "parent";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["parent"] = $fdata;
//	npwpd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "npwpd";
	$fdata["GoodName"] = "npwpd";
	$fdata["ownerTable"] = "pad.pad_customer";
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["npwpd"] = $fdata;
//	rp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "rp";
	$fdata["GoodName"] = "rp";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Rp"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "rp"; 
		$fdata["FullName"] = "rp";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["rp"] = $fdata;
//	pb
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "pb";
	$fdata["GoodName"] = "pb";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Pb"; 
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
	
		$fdata["strField"] = "pb"; 
		$fdata["FullName"] = "pb";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["pb"] = $fdata;
//	formno
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "formno";
	$fdata["GoodName"] = "formno";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Formno"; 
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
	
		$fdata["strField"] = "formno"; 
		$fdata["FullName"] = "formno";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["formno"] = $fdata;
//	reg_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "reg_date";
	$fdata["GoodName"] = "reg_date";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Reg Date"; 
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
	
		$fdata["strField"] = "reg_date"; 
		$fdata["FullName"] = "reg_date";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["reg_date"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_customer";
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
			$edata["EditParams"].= " maxlength=255";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["nama"] = $fdata;
//	kecamatan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "kecamatan_id";
	$fdata["GoodName"] = "kecamatan_id";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kecamatan Id"; 
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
	
		$fdata["strField"] = "kecamatan_id"; 
		$fdata["FullName"] = "kecamatan_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_kecamatan";
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
	
		
		
	$tdatapad_pad_customer["kecamatan_id"] = $fdata;
//	kelurahan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "kelurahan_id";
	$fdata["GoodName"] = "kelurahan_id";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kelurahan Id"; 
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
	
		$fdata["strField"] = "kelurahan_id"; 
		$fdata["FullName"] = "kelurahan_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_kelurahan";
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
	
		
		
	$tdatapad_pad_customer["kelurahan_id"] = $fdata;
//	kabupaten
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "kabupaten";
	$fdata["GoodName"] = "kabupaten";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kabupaten"; 
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
	
		$fdata["strField"] = "kabupaten"; 
		$fdata["FullName"] = "kabupaten";
	
		
		
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["kabupaten"] = $fdata;
//	alamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "alamat";
	$fdata["GoodName"] = "alamat";
	$fdata["ownerTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_customer["alamat"] = $fdata;
//	kodepos
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "kodepos";
	$fdata["GoodName"] = "kodepos";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kodepos"; 
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
	
		$fdata["strField"] = "kodepos"; 
		$fdata["FullName"] = "kodepos";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["kodepos"] = $fdata;
//	telphone
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "telphone";
	$fdata["GoodName"] = "telphone";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Telphone"; 
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
	
		$fdata["strField"] = "telphone"; 
		$fdata["FullName"] = "telphone";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["telphone"] = $fdata;
//	wpnama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "wpnama";
	$fdata["GoodName"] = "wpnama";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Wpnama"; 
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
	
		$fdata["strField"] = "wpnama"; 
		$fdata["FullName"] = "wpnama";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["wpnama"] = $fdata;
//	wpalamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "wpalamat";
	$fdata["GoodName"] = "wpalamat";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Wpalamat"; 
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
	
		$fdata["strField"] = "wpalamat"; 
		$fdata["FullName"] = "wpalamat";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["wpalamat"] = $fdata;
//	wpkelurahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "wpkelurahan";
	$fdata["GoodName"] = "wpkelurahan";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Wpkelurahan"; 
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
	
		$fdata["strField"] = "wpkelurahan"; 
		$fdata["FullName"] = "wpkelurahan";
	
		
		
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["wpkelurahan"] = $fdata;
//	wpkecamatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "wpkecamatan";
	$fdata["GoodName"] = "wpkecamatan";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Wpkecamatan"; 
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
	
		$fdata["strField"] = "wpkecamatan"; 
		$fdata["FullName"] = "wpkecamatan";
	
		
		
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["wpkecamatan"] = $fdata;
//	wpkabupaten
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "wpkabupaten";
	$fdata["GoodName"] = "wpkabupaten";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Wpkabupaten"; 
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
	
		$fdata["strField"] = "wpkabupaten"; 
		$fdata["FullName"] = "wpkabupaten";
	
		
		
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["wpkabupaten"] = $fdata;
//	wptelp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "wptelp";
	$fdata["GoodName"] = "wptelp";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Wptelp"; 
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
	
		$fdata["strField"] = "wptelp"; 
		$fdata["FullName"] = "wptelp";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["wptelp"] = $fdata;
//	wpkodepos
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "wpkodepos";
	$fdata["GoodName"] = "wpkodepos";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Wpkodepos"; 
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
	
		$fdata["strField"] = "wpkodepos"; 
		$fdata["FullName"] = "wpkodepos";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["wpkodepos"] = $fdata;
//	pnama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "pnama";
	$fdata["GoodName"] = "pnama";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Pnama"; 
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
	
		$fdata["strField"] = "pnama"; 
		$fdata["FullName"] = "pnama";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["pnama"] = $fdata;
//	palamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "palamat";
	$fdata["GoodName"] = "palamat";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Palamat"; 
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
	
		$fdata["strField"] = "palamat"; 
		$fdata["FullName"] = "palamat";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["palamat"] = $fdata;
//	pkelurahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
	$fdata["strName"] = "pkelurahan";
	$fdata["GoodName"] = "pkelurahan";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Pkelurahan"; 
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
	
		$fdata["strField"] = "pkelurahan"; 
		$fdata["FullName"] = "pkelurahan";
	
		
		
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["pkelurahan"] = $fdata;
//	pkecamatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
	$fdata["strName"] = "pkecamatan";
	$fdata["GoodName"] = "pkecamatan";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Pkecamatan"; 
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
	
		$fdata["strField"] = "pkecamatan"; 
		$fdata["FullName"] = "pkecamatan";
	
		
		
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["pkecamatan"] = $fdata;
//	pkabupaten
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 26;
	$fdata["strName"] = "pkabupaten";
	$fdata["GoodName"] = "pkabupaten";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Pkabupaten"; 
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
	
		$fdata["strField"] = "pkabupaten"; 
		$fdata["FullName"] = "pkabupaten";
	
		
		
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["pkabupaten"] = $fdata;
//	ptelp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 27;
	$fdata["strName"] = "ptelp";
	$fdata["GoodName"] = "ptelp";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ptelp"; 
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
	
		$fdata["strField"] = "ptelp"; 
		$fdata["FullName"] = "ptelp";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ptelp"] = $fdata;
//	pkodepos
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 28;
	$fdata["strName"] = "pkodepos";
	$fdata["GoodName"] = "pkodepos";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Pkodepos"; 
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
	
		$fdata["strField"] = "pkodepos"; 
		$fdata["FullName"] = "pkodepos";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["pkodepos"] = $fdata;
//	ijin1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 29;
	$fdata["strName"] = "ijin1";
	$fdata["GoodName"] = "ijin1";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin1"; 
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
	
		$fdata["strField"] = "ijin1"; 
		$fdata["FullName"] = "ijin1";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin1"] = $fdata;
//	ijin1no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 30;
	$fdata["strName"] = "ijin1no";
	$fdata["GoodName"] = "ijin1no";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin1no"; 
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
	
		$fdata["strField"] = "ijin1no"; 
		$fdata["FullName"] = "ijin1no";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin1no"] = $fdata;
//	ijin1tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 31;
	$fdata["strName"] = "ijin1tgl";
	$fdata["GoodName"] = "ijin1tgl";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin1tgl"; 
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
	
		$fdata["strField"] = "ijin1tgl"; 
		$fdata["FullName"] = "ijin1tgl";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin1tgl"] = $fdata;
//	ijin1tglakhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 32;
	$fdata["strName"] = "ijin1tglakhir";
	$fdata["GoodName"] = "ijin1tglakhir";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin1tglakhir"; 
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
	
		$fdata["strField"] = "ijin1tglakhir"; 
		$fdata["FullName"] = "ijin1tglakhir";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin1tglakhir"] = $fdata;
//	ijin2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 33;
	$fdata["strName"] = "ijin2";
	$fdata["GoodName"] = "ijin2";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin2"; 
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
	
		$fdata["strField"] = "ijin2"; 
		$fdata["FullName"] = "ijin2";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin2"] = $fdata;
//	ijin2no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 34;
	$fdata["strName"] = "ijin2no";
	$fdata["GoodName"] = "ijin2no";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin2no"; 
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
	
		$fdata["strField"] = "ijin2no"; 
		$fdata["FullName"] = "ijin2no";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin2no"] = $fdata;
//	ijin2tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 35;
	$fdata["strName"] = "ijin2tgl";
	$fdata["GoodName"] = "ijin2tgl";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin2tgl"; 
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
	
		$fdata["strField"] = "ijin2tgl"; 
		$fdata["FullName"] = "ijin2tgl";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin2tgl"] = $fdata;
//	ijin2tglakhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 36;
	$fdata["strName"] = "ijin2tglakhir";
	$fdata["GoodName"] = "ijin2tglakhir";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin2tglakhir"; 
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
	
		$fdata["strField"] = "ijin2tglakhir"; 
		$fdata["FullName"] = "ijin2tglakhir";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin2tglakhir"] = $fdata;
//	ijin3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 37;
	$fdata["strName"] = "ijin3";
	$fdata["GoodName"] = "ijin3";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin3"; 
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
	
		$fdata["strField"] = "ijin3"; 
		$fdata["FullName"] = "ijin3";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin3"] = $fdata;
//	ijin3no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 38;
	$fdata["strName"] = "ijin3no";
	$fdata["GoodName"] = "ijin3no";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin3no"; 
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
	
		$fdata["strField"] = "ijin3no"; 
		$fdata["FullName"] = "ijin3no";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin3no"] = $fdata;
//	ijin3tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 39;
	$fdata["strName"] = "ijin3tgl";
	$fdata["GoodName"] = "ijin3tgl";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin3tgl"; 
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
	
		$fdata["strField"] = "ijin3tgl"; 
		$fdata["FullName"] = "ijin3tgl";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin3tgl"] = $fdata;
//	ijin3tglakhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 40;
	$fdata["strName"] = "ijin3tglakhir";
	$fdata["GoodName"] = "ijin3tglakhir";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin3tglakhir"; 
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
	
		$fdata["strField"] = "ijin3tglakhir"; 
		$fdata["FullName"] = "ijin3tglakhir";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin3tglakhir"] = $fdata;
//	ijin4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 41;
	$fdata["strName"] = "ijin4";
	$fdata["GoodName"] = "ijin4";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin4"; 
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
	
		$fdata["strField"] = "ijin4"; 
		$fdata["FullName"] = "ijin4";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin4"] = $fdata;
//	ijin4no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 42;
	$fdata["strName"] = "ijin4no";
	$fdata["GoodName"] = "ijin4no";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin4no"; 
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
	
		$fdata["strField"] = "ijin4no"; 
		$fdata["FullName"] = "ijin4no";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin4no"] = $fdata;
//	ijin4tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 43;
	$fdata["strName"] = "ijin4tgl";
	$fdata["GoodName"] = "ijin4tgl";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin4tgl"; 
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
	
		$fdata["strField"] = "ijin4tgl"; 
		$fdata["FullName"] = "ijin4tgl";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin4tgl"] = $fdata;
//	ijin4tglakhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 44;
	$fdata["strName"] = "ijin4tglakhir";
	$fdata["GoodName"] = "ijin4tglakhir";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Ijin4tglakhir"; 
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
	
		$fdata["strField"] = "ijin4tglakhir"; 
		$fdata["FullName"] = "ijin4tglakhir";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["ijin4tglakhir"] = $fdata;
//	kukuhno
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 45;
	$fdata["strName"] = "kukuhno";
	$fdata["GoodName"] = "kukuhno";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kukuhno"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kukuhno"; 
		$fdata["FullName"] = "kukuhno";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["kukuhno"] = $fdata;
//	kukuhnip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 46;
	$fdata["strName"] = "kukuhnip";
	$fdata["GoodName"] = "kukuhnip";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kukuhnip"; 
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
	
		$fdata["strField"] = "kukuhnip"; 
		$fdata["FullName"] = "kukuhnip";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["kukuhnip"] = $fdata;
//	kukuhtgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 47;
	$fdata["strName"] = "kukuhtgl";
	$fdata["GoodName"] = "kukuhtgl";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kukuhtgl"; 
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
	
		$fdata["strField"] = "kukuhtgl"; 
		$fdata["FullName"] = "kukuhtgl";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["kukuhtgl"] = $fdata;
//	kukuh_jabat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 48;
	$fdata["strName"] = "kukuh_jabat_id";
	$fdata["GoodName"] = "kukuh_jabat_id";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kukuh Jabat Id"; 
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
	
		$fdata["strField"] = "kukuh_jabat_id"; 
		$fdata["FullName"] = "kukuh_jabat_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["kukuh_jabat_id"] = $fdata;
//	kukuhprinted
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 49;
	$fdata["strName"] = "kukuhprinted";
	$fdata["GoodName"] = "kukuhprinted";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kukuhprinted"; 
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
	
		$fdata["strField"] = "kukuhprinted"; 
		$fdata["FullName"] = "kukuhprinted";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["kukuhprinted"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 50;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_customer["enabled"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 51;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_customer["create_uid"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 52;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_customer["tmt"] = $fdata;
//	customer_status_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 53;
	$fdata["strName"] = "customer_status_id";
	$fdata["GoodName"] = "customer_status_id";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Customer Status Id"; 
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
	
		$fdata["strField"] = "customer_status_id"; 
		$fdata["FullName"] = "customer_status_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["customer_status_id"] = $fdata;
//	kembalitgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 54;
	$fdata["strName"] = "kembalitgl";
	$fdata["GoodName"] = "kembalitgl";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kembalitgl"; 
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
	
		$fdata["strField"] = "kembalitgl"; 
		$fdata["FullName"] = "kembalitgl";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["kembalitgl"] = $fdata;
//	kembalioleh
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 55;
	$fdata["strName"] = "kembalioleh";
	$fdata["GoodName"] = "kembalioleh";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kembalioleh"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kembalioleh"; 
		$fdata["FullName"] = "kembalioleh";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer["kembalioleh"] = $fdata;
//	kartuprinted
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 56;
	$fdata["strName"] = "kartuprinted";
	$fdata["GoodName"] = "kartuprinted";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kartuprinted"; 
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
	
		$fdata["strField"] = "kartuprinted"; 
		$fdata["FullName"] = "kartuprinted";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["kartuprinted"] = $fdata;
//	kembalinip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 57;
	$fdata["strName"] = "kembalinip";
	$fdata["GoodName"] = "kembalinip";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kembalinip"; 
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
	
		$fdata["strField"] = "kembalinip"; 
		$fdata["FullName"] = "kembalinip";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["kembalinip"] = $fdata;
//	penerimanm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 58;
	$fdata["strName"] = "penerimanm";
	$fdata["GoodName"] = "penerimanm";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Penerimanm"; 
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
	
		$fdata["strField"] = "penerimanm"; 
		$fdata["FullName"] = "penerimanm";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["penerimanm"] = $fdata;
//	penerimaalamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 59;
	$fdata["strName"] = "penerimaalamat";
	$fdata["GoodName"] = "penerimaalamat";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Penerimaalamat"; 
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
	
		$fdata["strField"] = "penerimaalamat"; 
		$fdata["FullName"] = "penerimaalamat";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["penerimaalamat"] = $fdata;
//	penerimatgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 60;
	$fdata["strName"] = "penerimatgl";
	$fdata["GoodName"] = "penerimatgl";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Penerimatgl"; 
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
	
		$fdata["strField"] = "penerimatgl"; 
		$fdata["FullName"] = "penerimatgl";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["penerimatgl"] = $fdata;
//	catatnip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 61;
	$fdata["strName"] = "catatnip";
	$fdata["GoodName"] = "catatnip";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Catatnip"; 
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
	
		$fdata["strField"] = "catatnip"; 
		$fdata["FullName"] = "catatnip";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["catatnip"] = $fdata;
//	kirimtgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 62;
	$fdata["strName"] = "kirimtgl";
	$fdata["GoodName"] = "kirimtgl";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Kirimtgl"; 
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
	
		$fdata["strField"] = "kirimtgl"; 
		$fdata["FullName"] = "kirimtgl";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["kirimtgl"] = $fdata;
//	batastgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 63;
	$fdata["strName"] = "batastgl";
	$fdata["GoodName"] = "batastgl";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Batastgl"; 
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
	
		$fdata["strField"] = "batastgl"; 
		$fdata["FullName"] = "batastgl";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["batastgl"] = $fdata;
//	petugas_jabat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 64;
	$fdata["strName"] = "petugas_jabat_id";
	$fdata["GoodName"] = "petugas_jabat_id";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Petugas Jabat Id"; 
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
	
		$fdata["strField"] = "petugas_jabat_id"; 
		$fdata["FullName"] = "petugas_jabat_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["petugas_jabat_id"] = $fdata;
//	pencatat_jabat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 65;
	$fdata["strName"] = "pencatat_jabat_id";
	$fdata["GoodName"] = "pencatat_jabat_id";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Pencatat Jabat Id"; 
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
	
		$fdata["strField"] = "pencatat_jabat_id"; 
		$fdata["FullName"] = "pencatat_jabat_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["pencatat_jabat_id"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 66;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_customer["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 67;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_customer["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 68;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_customer";
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
	
		
		
	$tdatapad_pad_customer["update_uid"] = $fdata;
//	npwpd_old
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 69;
	$fdata["strName"] = "npwpd_old";
	$fdata["GoodName"] = "npwpd_old";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Npwpd Old"; 
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
	
		$fdata["strField"] = "npwpd_old"; 
		$fdata["FullName"] = "npwpd_old";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["npwpd_old"] = $fdata;
//	id_old
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 70;
	$fdata["strName"] = "id_old";
	$fdata["GoodName"] = "id_old";
	$fdata["ownerTable"] = "pad.pad_customer";
	$fdata["Label"] = "Id Old"; 
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
	
		$fdata["strField"] = "id_old"; 
		$fdata["FullName"] = "id_old";
	
		
		
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
	
		
		
	$tdatapad_pad_customer["id_old"] = $fdata;

	
$tables_data["pad.pad_customer"]=&$tdatapad_pad_customer;
$field_labels["pad_pad_customer"] = &$fieldLabelspad_pad_customer;
$fieldToolTips["pad.pad_customer"] = &$fieldToolTipspad_pad_customer;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_customer"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_spt";
	$detailsParam["dDataSourceTable"]="pad.pad_spt";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_spt";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_customer"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_customer"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_customer"][$dIndex]["detailKeys"][]="customer_id";

$dIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_customer_usaha";
	$detailsParam["dDataSourceTable"]="pad.pad_customer_usaha";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_customer_usaha";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_customer"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_customer"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_customer"][$dIndex]["detailKeys"][]="customer_id";

$dIndex = 3-1;
			$strOriginalDetailsTable="pad.pad_customer_detail";
	$detailsParam["dDataSourceTable"]="pad.pad_customer_detail";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_customer_detail";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_customer"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_customer"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_customer"][$dIndex]["detailKeys"][]="usaha_id";

$dIndex = 4-1;
			$strOriginalDetailsTable="pad.pad_terima";
	$detailsParam["dDataSourceTable"]="pad.pad_terima";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_terima";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_customer"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_customer"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_customer"][$dIndex]["detailKeys"][]="customer_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_customer"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_kecamatan";
	$masterParams["mDataSourceTable"]="pad.pad_kecamatan";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_kecamatan";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_customer"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_customer"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_customer"][$mIndex]["detailKeys"][]="kecamatan_id";

$mIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_kelurahan";
	$masterParams["mDataSourceTable"]="pad.pad_kelurahan";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_kelurahan";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_customer"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_customer"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_customer"][$mIndex]["detailKeys"][]="kelurahan_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_customer()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   parent,   npwpd,   rp,   pb,   formno,   reg_date,   nama,   kecamatan_id,   kelurahan_id,   kabupaten,   alamat,   kodepos,   telphone,   wpnama,   wpalamat,   wpkelurahan,   wpkecamatan,   wpkabupaten,   wptelp,   wpkodepos,   pnama,   palamat,   pkelurahan,   pkecamatan,   pkabupaten,   ptelp,   pkodepos,   ijin1,   ijin1no,   ijin1tgl,   ijin1tglakhir,   ijin2,   ijin2no,   ijin2tgl,   ijin2tglakhir,   ijin3,   ijin3no,   ijin3tgl,   ijin3tglakhir,   ijin4,   ijin4no,   ijin4tgl,   ijin4tglakhir,   kukuhno,   kukuhnip,   kukuhtgl,   kukuh_jabat_id,   kukuhprinted,   enabled,   create_uid,   tmt,   customer_status_id,   kembalitgl,   kembalioleh,   kartuprinted,   kembalinip,   penerimanm,   penerimaalamat,   penerimatgl,   catatnip,   kirimtgl,   batastgl,   petugas_jabat_id,   pencatat_jabat_id,   created,   updated,   update_uid,   npwpd_old,   id_old";
$proto0["m_strFrom"] = "FROM \"pad\".pad_customer";
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
	"m_strTable" => "pad.pad_customer"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "parent",
	"m_strTable" => "pad.pad_customer"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "npwpd",
	"m_strTable" => "pad.pad_customer"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "rp",
	"m_strTable" => "pad.pad_customer"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "pb",
	"m_strTable" => "pad.pad_customer"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "formno",
	"m_strTable" => "pad.pad_customer"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "reg_date",
	"m_strTable" => "pad.pad_customer"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_customer"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "kecamatan_id",
	"m_strTable" => "pad.pad_customer"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "kelurahan_id",
	"m_strTable" => "pad.pad_customer"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "kabupaten",
	"m_strTable" => "pad.pad_customer"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat",
	"m_strTable" => "pad.pad_customer"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "kodepos",
	"m_strTable" => "pad.pad_customer"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "telphone",
	"m_strTable" => "pad.pad_customer"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "wpnama",
	"m_strTable" => "pad.pad_customer"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "wpalamat",
	"m_strTable" => "pad.pad_customer"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "wpkelurahan",
	"m_strTable" => "pad.pad_customer"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "wpkecamatan",
	"m_strTable" => "pad.pad_customer"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "wpkabupaten",
	"m_strTable" => "pad.pad_customer"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "wptelp",
	"m_strTable" => "pad.pad_customer"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "wpkodepos",
	"m_strTable" => "pad.pad_customer"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "pnama",
	"m_strTable" => "pad.pad_customer"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "palamat",
	"m_strTable" => "pad.pad_customer"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$obj = new SQLField(array(
	"m_strName" => "pkelurahan",
	"m_strTable" => "pad.pad_customer"
));

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto53=array();
			$obj = new SQLField(array(
	"m_strName" => "pkecamatan",
	"m_strTable" => "pad.pad_customer"
));

$proto53["m_expr"]=$obj;
$proto53["m_alias"] = "";
$obj = new SQLFieldListItem($proto53);

$proto0["m_fieldlist"][]=$obj;
						$proto55=array();
			$obj = new SQLField(array(
	"m_strName" => "pkabupaten",
	"m_strTable" => "pad.pad_customer"
));

$proto55["m_expr"]=$obj;
$proto55["m_alias"] = "";
$obj = new SQLFieldListItem($proto55);

$proto0["m_fieldlist"][]=$obj;
						$proto57=array();
			$obj = new SQLField(array(
	"m_strName" => "ptelp",
	"m_strTable" => "pad.pad_customer"
));

$proto57["m_expr"]=$obj;
$proto57["m_alias"] = "";
$obj = new SQLFieldListItem($proto57);

$proto0["m_fieldlist"][]=$obj;
						$proto59=array();
			$obj = new SQLField(array(
	"m_strName" => "pkodepos",
	"m_strTable" => "pad.pad_customer"
));

$proto59["m_expr"]=$obj;
$proto59["m_alias"] = "";
$obj = new SQLFieldListItem($proto59);

$proto0["m_fieldlist"][]=$obj;
						$proto61=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin1",
	"m_strTable" => "pad.pad_customer"
));

$proto61["m_expr"]=$obj;
$proto61["m_alias"] = "";
$obj = new SQLFieldListItem($proto61);

$proto0["m_fieldlist"][]=$obj;
						$proto63=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin1no",
	"m_strTable" => "pad.pad_customer"
));

$proto63["m_expr"]=$obj;
$proto63["m_alias"] = "";
$obj = new SQLFieldListItem($proto63);

$proto0["m_fieldlist"][]=$obj;
						$proto65=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin1tgl",
	"m_strTable" => "pad.pad_customer"
));

$proto65["m_expr"]=$obj;
$proto65["m_alias"] = "";
$obj = new SQLFieldListItem($proto65);

$proto0["m_fieldlist"][]=$obj;
						$proto67=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin1tglakhir",
	"m_strTable" => "pad.pad_customer"
));

$proto67["m_expr"]=$obj;
$proto67["m_alias"] = "";
$obj = new SQLFieldListItem($proto67);

$proto0["m_fieldlist"][]=$obj;
						$proto69=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin2",
	"m_strTable" => "pad.pad_customer"
));

$proto69["m_expr"]=$obj;
$proto69["m_alias"] = "";
$obj = new SQLFieldListItem($proto69);

$proto0["m_fieldlist"][]=$obj;
						$proto71=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin2no",
	"m_strTable" => "pad.pad_customer"
));

$proto71["m_expr"]=$obj;
$proto71["m_alias"] = "";
$obj = new SQLFieldListItem($proto71);

$proto0["m_fieldlist"][]=$obj;
						$proto73=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin2tgl",
	"m_strTable" => "pad.pad_customer"
));

$proto73["m_expr"]=$obj;
$proto73["m_alias"] = "";
$obj = new SQLFieldListItem($proto73);

$proto0["m_fieldlist"][]=$obj;
						$proto75=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin2tglakhir",
	"m_strTable" => "pad.pad_customer"
));

$proto75["m_expr"]=$obj;
$proto75["m_alias"] = "";
$obj = new SQLFieldListItem($proto75);

$proto0["m_fieldlist"][]=$obj;
						$proto77=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin3",
	"m_strTable" => "pad.pad_customer"
));

$proto77["m_expr"]=$obj;
$proto77["m_alias"] = "";
$obj = new SQLFieldListItem($proto77);

$proto0["m_fieldlist"][]=$obj;
						$proto79=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin3no",
	"m_strTable" => "pad.pad_customer"
));

$proto79["m_expr"]=$obj;
$proto79["m_alias"] = "";
$obj = new SQLFieldListItem($proto79);

$proto0["m_fieldlist"][]=$obj;
						$proto81=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin3tgl",
	"m_strTable" => "pad.pad_customer"
));

$proto81["m_expr"]=$obj;
$proto81["m_alias"] = "";
$obj = new SQLFieldListItem($proto81);

$proto0["m_fieldlist"][]=$obj;
						$proto83=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin3tglakhir",
	"m_strTable" => "pad.pad_customer"
));

$proto83["m_expr"]=$obj;
$proto83["m_alias"] = "";
$obj = new SQLFieldListItem($proto83);

$proto0["m_fieldlist"][]=$obj;
						$proto85=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin4",
	"m_strTable" => "pad.pad_customer"
));

$proto85["m_expr"]=$obj;
$proto85["m_alias"] = "";
$obj = new SQLFieldListItem($proto85);

$proto0["m_fieldlist"][]=$obj;
						$proto87=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin4no",
	"m_strTable" => "pad.pad_customer"
));

$proto87["m_expr"]=$obj;
$proto87["m_alias"] = "";
$obj = new SQLFieldListItem($proto87);

$proto0["m_fieldlist"][]=$obj;
						$proto89=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin4tgl",
	"m_strTable" => "pad.pad_customer"
));

$proto89["m_expr"]=$obj;
$proto89["m_alias"] = "";
$obj = new SQLFieldListItem($proto89);

$proto0["m_fieldlist"][]=$obj;
						$proto91=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin4tglakhir",
	"m_strTable" => "pad.pad_customer"
));

$proto91["m_expr"]=$obj;
$proto91["m_alias"] = "";
$obj = new SQLFieldListItem($proto91);

$proto0["m_fieldlist"][]=$obj;
						$proto93=array();
			$obj = new SQLField(array(
	"m_strName" => "kukuhno",
	"m_strTable" => "pad.pad_customer"
));

$proto93["m_expr"]=$obj;
$proto93["m_alias"] = "";
$obj = new SQLFieldListItem($proto93);

$proto0["m_fieldlist"][]=$obj;
						$proto95=array();
			$obj = new SQLField(array(
	"m_strName" => "kukuhnip",
	"m_strTable" => "pad.pad_customer"
));

$proto95["m_expr"]=$obj;
$proto95["m_alias"] = "";
$obj = new SQLFieldListItem($proto95);

$proto0["m_fieldlist"][]=$obj;
						$proto97=array();
			$obj = new SQLField(array(
	"m_strName" => "kukuhtgl",
	"m_strTable" => "pad.pad_customer"
));

$proto97["m_expr"]=$obj;
$proto97["m_alias"] = "";
$obj = new SQLFieldListItem($proto97);

$proto0["m_fieldlist"][]=$obj;
						$proto99=array();
			$obj = new SQLField(array(
	"m_strName" => "kukuh_jabat_id",
	"m_strTable" => "pad.pad_customer"
));

$proto99["m_expr"]=$obj;
$proto99["m_alias"] = "";
$obj = new SQLFieldListItem($proto99);

$proto0["m_fieldlist"][]=$obj;
						$proto101=array();
			$obj = new SQLField(array(
	"m_strName" => "kukuhprinted",
	"m_strTable" => "pad.pad_customer"
));

$proto101["m_expr"]=$obj;
$proto101["m_alias"] = "";
$obj = new SQLFieldListItem($proto101);

$proto0["m_fieldlist"][]=$obj;
						$proto103=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_customer"
));

$proto103["m_expr"]=$obj;
$proto103["m_alias"] = "";
$obj = new SQLFieldListItem($proto103);

$proto0["m_fieldlist"][]=$obj;
						$proto105=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_customer"
));

$proto105["m_expr"]=$obj;
$proto105["m_alias"] = "";
$obj = new SQLFieldListItem($proto105);

$proto0["m_fieldlist"][]=$obj;
						$proto107=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_customer"
));

$proto107["m_expr"]=$obj;
$proto107["m_alias"] = "";
$obj = new SQLFieldListItem($proto107);

$proto0["m_fieldlist"][]=$obj;
						$proto109=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_status_id",
	"m_strTable" => "pad.pad_customer"
));

$proto109["m_expr"]=$obj;
$proto109["m_alias"] = "";
$obj = new SQLFieldListItem($proto109);

$proto0["m_fieldlist"][]=$obj;
						$proto111=array();
			$obj = new SQLField(array(
	"m_strName" => "kembalitgl",
	"m_strTable" => "pad.pad_customer"
));

$proto111["m_expr"]=$obj;
$proto111["m_alias"] = "";
$obj = new SQLFieldListItem($proto111);

$proto0["m_fieldlist"][]=$obj;
						$proto113=array();
			$obj = new SQLField(array(
	"m_strName" => "kembalioleh",
	"m_strTable" => "pad.pad_customer"
));

$proto113["m_expr"]=$obj;
$proto113["m_alias"] = "";
$obj = new SQLFieldListItem($proto113);

$proto0["m_fieldlist"][]=$obj;
						$proto115=array();
			$obj = new SQLField(array(
	"m_strName" => "kartuprinted",
	"m_strTable" => "pad.pad_customer"
));

$proto115["m_expr"]=$obj;
$proto115["m_alias"] = "";
$obj = new SQLFieldListItem($proto115);

$proto0["m_fieldlist"][]=$obj;
						$proto117=array();
			$obj = new SQLField(array(
	"m_strName" => "kembalinip",
	"m_strTable" => "pad.pad_customer"
));

$proto117["m_expr"]=$obj;
$proto117["m_alias"] = "";
$obj = new SQLFieldListItem($proto117);

$proto0["m_fieldlist"][]=$obj;
						$proto119=array();
			$obj = new SQLField(array(
	"m_strName" => "penerimanm",
	"m_strTable" => "pad.pad_customer"
));

$proto119["m_expr"]=$obj;
$proto119["m_alias"] = "";
$obj = new SQLFieldListItem($proto119);

$proto0["m_fieldlist"][]=$obj;
						$proto121=array();
			$obj = new SQLField(array(
	"m_strName" => "penerimaalamat",
	"m_strTable" => "pad.pad_customer"
));

$proto121["m_expr"]=$obj;
$proto121["m_alias"] = "";
$obj = new SQLFieldListItem($proto121);

$proto0["m_fieldlist"][]=$obj;
						$proto123=array();
			$obj = new SQLField(array(
	"m_strName" => "penerimatgl",
	"m_strTable" => "pad.pad_customer"
));

$proto123["m_expr"]=$obj;
$proto123["m_alias"] = "";
$obj = new SQLFieldListItem($proto123);

$proto0["m_fieldlist"][]=$obj;
						$proto125=array();
			$obj = new SQLField(array(
	"m_strName" => "catatnip",
	"m_strTable" => "pad.pad_customer"
));

$proto125["m_expr"]=$obj;
$proto125["m_alias"] = "";
$obj = new SQLFieldListItem($proto125);

$proto0["m_fieldlist"][]=$obj;
						$proto127=array();
			$obj = new SQLField(array(
	"m_strName" => "kirimtgl",
	"m_strTable" => "pad.pad_customer"
));

$proto127["m_expr"]=$obj;
$proto127["m_alias"] = "";
$obj = new SQLFieldListItem($proto127);

$proto0["m_fieldlist"][]=$obj;
						$proto129=array();
			$obj = new SQLField(array(
	"m_strName" => "batastgl",
	"m_strTable" => "pad.pad_customer"
));

$proto129["m_expr"]=$obj;
$proto129["m_alias"] = "";
$obj = new SQLFieldListItem($proto129);

$proto0["m_fieldlist"][]=$obj;
						$proto131=array();
			$obj = new SQLField(array(
	"m_strName" => "petugas_jabat_id",
	"m_strTable" => "pad.pad_customer"
));

$proto131["m_expr"]=$obj;
$proto131["m_alias"] = "";
$obj = new SQLFieldListItem($proto131);

$proto0["m_fieldlist"][]=$obj;
						$proto133=array();
			$obj = new SQLField(array(
	"m_strName" => "pencatat_jabat_id",
	"m_strTable" => "pad.pad_customer"
));

$proto133["m_expr"]=$obj;
$proto133["m_alias"] = "";
$obj = new SQLFieldListItem($proto133);

$proto0["m_fieldlist"][]=$obj;
						$proto135=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_customer"
));

$proto135["m_expr"]=$obj;
$proto135["m_alias"] = "";
$obj = new SQLFieldListItem($proto135);

$proto0["m_fieldlist"][]=$obj;
						$proto137=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_customer"
));

$proto137["m_expr"]=$obj;
$proto137["m_alias"] = "";
$obj = new SQLFieldListItem($proto137);

$proto0["m_fieldlist"][]=$obj;
						$proto139=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_customer"
));

$proto139["m_expr"]=$obj;
$proto139["m_alias"] = "";
$obj = new SQLFieldListItem($proto139);

$proto0["m_fieldlist"][]=$obj;
						$proto141=array();
			$obj = new SQLField(array(
	"m_strName" => "npwpd_old",
	"m_strTable" => "pad.pad_customer"
));

$proto141["m_expr"]=$obj;
$proto141["m_alias"] = "";
$obj = new SQLFieldListItem($proto141);

$proto0["m_fieldlist"][]=$obj;
						$proto143=array();
			$obj = new SQLField(array(
	"m_strName" => "id_old",
	"m_strTable" => "pad.pad_customer"
));

$proto143["m_expr"]=$obj;
$proto143["m_alias"] = "";
$obj = new SQLFieldListItem($proto143);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto145=array();
$proto145["m_link"] = "SQLL_MAIN";
			$proto146=array();
$proto146["m_strName"] = "pad.pad_customer";
$proto146["m_columns"] = array();
$proto146["m_columns"][] = "id";
$proto146["m_columns"][] = "parent";
$proto146["m_columns"][] = "npwpd";
$proto146["m_columns"][] = "rp";
$proto146["m_columns"][] = "pb";
$proto146["m_columns"][] = "formno";
$proto146["m_columns"][] = "reg_date";
$proto146["m_columns"][] = "nama";
$proto146["m_columns"][] = "kecamatan_id";
$proto146["m_columns"][] = "kelurahan_id";
$proto146["m_columns"][] = "kabupaten";
$proto146["m_columns"][] = "alamat";
$proto146["m_columns"][] = "kodepos";
$proto146["m_columns"][] = "telphone";
$proto146["m_columns"][] = "wpnama";
$proto146["m_columns"][] = "wpalamat";
$proto146["m_columns"][] = "wpkelurahan";
$proto146["m_columns"][] = "wpkecamatan";
$proto146["m_columns"][] = "wpkabupaten";
$proto146["m_columns"][] = "wptelp";
$proto146["m_columns"][] = "wpkodepos";
$proto146["m_columns"][] = "pnama";
$proto146["m_columns"][] = "palamat";
$proto146["m_columns"][] = "pkelurahan";
$proto146["m_columns"][] = "pkecamatan";
$proto146["m_columns"][] = "pkabupaten";
$proto146["m_columns"][] = "ptelp";
$proto146["m_columns"][] = "pkodepos";
$proto146["m_columns"][] = "ijin1";
$proto146["m_columns"][] = "ijin1no";
$proto146["m_columns"][] = "ijin1tgl";
$proto146["m_columns"][] = "ijin1tglakhir";
$proto146["m_columns"][] = "ijin2";
$proto146["m_columns"][] = "ijin2no";
$proto146["m_columns"][] = "ijin2tgl";
$proto146["m_columns"][] = "ijin2tglakhir";
$proto146["m_columns"][] = "ijin3";
$proto146["m_columns"][] = "ijin3no";
$proto146["m_columns"][] = "ijin3tgl";
$proto146["m_columns"][] = "ijin3tglakhir";
$proto146["m_columns"][] = "ijin4";
$proto146["m_columns"][] = "ijin4no";
$proto146["m_columns"][] = "ijin4tgl";
$proto146["m_columns"][] = "ijin4tglakhir";
$proto146["m_columns"][] = "kukuhno";
$proto146["m_columns"][] = "kukuhnip";
$proto146["m_columns"][] = "kukuhtgl";
$proto146["m_columns"][] = "kukuh_jabat_id";
$proto146["m_columns"][] = "kukuhprinted";
$proto146["m_columns"][] = "enabled";
$proto146["m_columns"][] = "create_uid";
$proto146["m_columns"][] = "tmt";
$proto146["m_columns"][] = "customer_status_id";
$proto146["m_columns"][] = "kembalitgl";
$proto146["m_columns"][] = "kembalioleh";
$proto146["m_columns"][] = "kartuprinted";
$proto146["m_columns"][] = "kembalinip";
$proto146["m_columns"][] = "penerimanm";
$proto146["m_columns"][] = "penerimaalamat";
$proto146["m_columns"][] = "penerimatgl";
$proto146["m_columns"][] = "catatnip";
$proto146["m_columns"][] = "kirimtgl";
$proto146["m_columns"][] = "batastgl";
$proto146["m_columns"][] = "petugas_jabat_id";
$proto146["m_columns"][] = "pencatat_jabat_id";
$proto146["m_columns"][] = "created";
$proto146["m_columns"][] = "updated";
$proto146["m_columns"][] = "update_uid";
$proto146["m_columns"][] = "npwpd_old";
$proto146["m_columns"][] = "id_old";
$obj = new SQLTable($proto146);

$proto145["m_table"] = $obj;
$proto145["m_alias"] = "";
$proto147=array();
$proto147["m_sql"] = "";
$proto147["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto147["m_column"]=$obj;
$proto147["m_contained"] = array();
$proto147["m_strCase"] = "";
$proto147["m_havingmode"] = "0";
$proto147["m_inBrackets"] = "0";
$proto147["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto147);

$proto145["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto145);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_customer = createSqlQuery_pad_pad_customer();
																																																																						$tdatapad_pad_customer[".sqlquery"] = $queryData_pad_pad_customer;
	
if(isset($tdatapad_pad_customer["field2"])){
	$tdatapad_pad_customer["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_customer["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_customer["field2"]["LookupType"] = 4;
	$tdatapad_pad_customer["field2"]["LinkField"] = "email";
	$tdatapad_pad_customer["field2"]["DisplayField"] = "name";
	$tdatapad_pad_customer[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_customer"] = new eventsBase;
$tdatapad_pad_customer[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_customer");

?>