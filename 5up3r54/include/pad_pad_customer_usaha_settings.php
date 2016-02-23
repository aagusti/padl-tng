<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_customer_usaha = array();
	$tdatapad_pad_customer_usaha[".NumberOfChars"] = 80; 
	$tdatapad_pad_customer_usaha[".ShortName"] = "pad_pad_customer_usaha";
	$tdatapad_pad_customer_usaha[".OwnerID"] = "";
	$tdatapad_pad_customer_usaha[".OriginalTable"] = "pad.pad_customer_usaha";

//	field labels
$fieldLabelspad_pad_customer_usaha = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_customer_usaha["English"] = array();
	$fieldToolTipspad_pad_customer_usaha["English"] = array();
	$fieldLabelspad_pad_customer_usaha["English"]["id"] = "Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["konterid"] = "Konterid";
	$fieldToolTipspad_pad_customer_usaha["English"]["konterid"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["reg_date"] = "Reg Date";
	$fieldToolTipspad_pad_customer_usaha["English"]["reg_date"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["customer_id"] = "Customer Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["customer_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["usaha_id"] = "Usaha Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["usaha_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["so"] = "So";
	$fieldToolTipspad_pad_customer_usaha["English"]["so"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kecamatan_id"] = "Kecamatan Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["kecamatan_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kelurahan_id"] = "Kelurahan Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["kelurahan_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["notes"] = "Notes";
	$fieldToolTipspad_pad_customer_usaha["English"]["notes"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_customer_usaha["English"]["enabled"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_customer_usaha["English"]["create_uid"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["customer_status_id"] = "Customer Status Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["customer_status_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["aktifnotes"] = "Aktifnotes";
	$fieldToolTipspad_pad_customer_usaha["English"]["aktifnotes"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_customer_usaha["English"]["tmt"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["air_zona_id"] = "Air Zona Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["air_zona_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["air_manfaat_id"] = "Air Manfaat Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["air_manfaat_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["def_pajak_id"] = "Def Pajak Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["def_pajak_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["opnm"] = "Opnm";
	$fieldToolTipspad_pad_customer_usaha["English"]["opnm"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["opalamat"] = "Opalamat";
	$fieldToolTipspad_pad_customer_usaha["English"]["opalamat"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["latitude"] = "Latitude";
	$fieldToolTipspad_pad_customer_usaha["English"]["latitude"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["longitude"] = "Longitude";
	$fieldToolTipspad_pad_customer_usaha["English"]["longitude"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["created"] = "Created";
	$fieldToolTipspad_pad_customer_usaha["English"]["created"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_customer_usaha["English"]["updated"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_customer_usaha["English"]["update_uid"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_restojmlmeja"] = "Kd Restojmlmeja";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_restojmlmeja"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_restojmlkursi"] = "Kd Restojmlkursi";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_restojmlkursi"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_restojmltamu"] = "Kd Restojmltamu";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_restojmltamu"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_filmkursi"] = "Kd Filmkursi";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_filmkursi"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_filmpertunjukan"] = "Kd Filmpertunjukan";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_filmpertunjukan"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_filmtarif"] = "Kd Filmtarif";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_filmtarif"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_bilyarmeja"] = "Kd Bilyarmeja";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_bilyarmeja"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_bilyartarif"] = "Kd Bilyartarif";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_bilyartarif"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_bilyarkegiatan"] = "Kd Bilyarkegiatan";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_bilyarkegiatan"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_diskopengunjung"] = "Kd Diskopengunjung";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_diskopengunjung"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kd_diskotarif"] = "Kd Diskotarif";
	$fieldToolTipspad_pad_customer_usaha["English"]["kd_diskotarif"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["mall_id"] = "Mall Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["mall_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["cash_register"] = "Cash Register";
	$fieldToolTipspad_pad_customer_usaha["English"]["cash_register"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["pelaporan"] = "Pelaporan";
	$fieldToolTipspad_pad_customer_usaha["English"]["pelaporan"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["pembukuan"] = "Pembukuan";
	$fieldToolTipspad_pad_customer_usaha["English"]["pembukuan"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["bandara"] = "Bandara";
	$fieldToolTipspad_pad_customer_usaha["English"]["bandara"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["wajib_pajak"] = "Wajib Pajak";
	$fieldToolTipspad_pad_customer_usaha["English"]["wajib_pajak"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["jumlah_karyawan"] = "Jumlah Karyawan";
	$fieldToolTipspad_pad_customer_usaha["English"]["jumlah_karyawan"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["tanggal_tutup"] = "Tanggal Tutup";
	$fieldToolTipspad_pad_customer_usaha["English"]["tanggal_tutup"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_luas"] = "Parkir Luas";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_luas"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_masuk"] = "Parkir Masuk";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_masuk"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_tarif_mobil"] = "Parkir Tarif Mobil";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_tarif_mobil"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_tambahan"] = "Parkir Tambahan";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_tambahan"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_kapasitas_mobil"] = "Parkir Kapasitas Mobil";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_kapasitas_mobil"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_mobil_hari"] = "Parkir Mobil Hari";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_mobil_hari"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_keluar"] = "Parkir Keluar";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_keluar"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_motor_luas"] = "Parkir Motor Luas";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_motor_luas"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_motor_masuk"] = "Parkir Motor Masuk";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_motor_masuk"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_motor_keluar"] = "Parkir Motor Keluar";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_motor_keluar"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_tarif_motor"] = "Parkir Tarif Motor";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_tarif_motor"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_motor_tambahan"] = "Parkir Motor Tambahan";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_motor_tambahan"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_kapasitas_motor"] = "Parkir Kapasitas Motor";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_kapasitas_motor"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["parkir_motor_hari"] = "Parkir Motor Hari";
	$fieldToolTipspad_pad_customer_usaha["English"]["parkir_motor_hari"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["kelompok_usaha_id"] = "Kelompok Usaha Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["kelompok_usaha_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["zona_id"] = "Zona Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["zona_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["manfaat_id"] = "Manfaat Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["manfaat_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["golongan_id"] = "Golongan Id";
	$fieldToolTipspad_pad_customer_usaha["English"]["golongan_id"] = "";
	$fieldLabelspad_pad_customer_usaha["English"]["id_old"] = "Id Old";
	$fieldToolTipspad_pad_customer_usaha["English"]["id_old"] = "";
	if (count($fieldToolTipspad_pad_customer_usaha["English"]))
		$tdatapad_pad_customer_usaha[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_customer_usaha[".NCSearch"] = true;



$tdatapad_pad_customer_usaha[".shortTableName"] = "pad_pad_customer_usaha";
$tdatapad_pad_customer_usaha[".nSecOptions"] = 0;
$tdatapad_pad_customer_usaha[".recsPerRowList"] = 1;
$tdatapad_pad_customer_usaha[".mainTableOwnerID"] = "";
$tdatapad_pad_customer_usaha[".moveNext"] = 1;
$tdatapad_pad_customer_usaha[".nType"] = 0;

$tdatapad_pad_customer_usaha[".strOriginalTableName"] = "pad.pad_customer_usaha";




$tdatapad_pad_customer_usaha[".showAddInPopup"] = false;

$tdatapad_pad_customer_usaha[".showEditInPopup"] = false;

$tdatapad_pad_customer_usaha[".showViewInPopup"] = false;

$tdatapad_pad_customer_usaha[".fieldsForRegister"] = array();

$tdatapad_pad_customer_usaha[".listAjax"] = false;

	$tdatapad_pad_customer_usaha[".audit"] = false;

	$tdatapad_pad_customer_usaha[".locking"] = false;

$tdatapad_pad_customer_usaha[".listIcons"] = true;
$tdatapad_pad_customer_usaha[".edit"] = true;
$tdatapad_pad_customer_usaha[".inlineEdit"] = true;
$tdatapad_pad_customer_usaha[".inlineAdd"] = true;
$tdatapad_pad_customer_usaha[".view"] = true;

$tdatapad_pad_customer_usaha[".exportTo"] = true;

$tdatapad_pad_customer_usaha[".printFriendly"] = true;

$tdatapad_pad_customer_usaha[".delete"] = true;

$tdatapad_pad_customer_usaha[".showSimpleSearchOptions"] = false;

$tdatapad_pad_customer_usaha[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_customer_usaha[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_customer_usaha[".isUseAjaxSuggest"] = true;

$tdatapad_pad_customer_usaha[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_customer_usaha[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_customer_usaha[".isUseTimeForSearch"] = false;



$tdatapad_pad_customer_usaha[".useDetailsPreview"] = true;

$tdatapad_pad_customer_usaha[".allSearchFields"] = array();

$tdatapad_pad_customer_usaha[".allSearchFields"][] = "id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "so";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "notes";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "created";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "updated";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".allSearchFields"][] = "id_old";

$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "so";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "notes";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "created";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "updated";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".googleLikeFields"][] = "id_old";


$tdatapad_pad_customer_usaha[".advSearchFields"][] = "id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "so";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "notes";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "created";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "updated";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".advSearchFields"][] = "id_old";

$tdatapad_pad_customer_usaha[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdatapad_pad_customer_usaha[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_customer_usaha[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_customer_usaha[".orderindexes"] = array();

$tdatapad_pad_customer_usaha[".sqlHead"] = "SELECT id,   konterid,   reg_date,   customer_id,   usaha_id,   so,   kecamatan_id,   kelurahan_id,   notes,   enabled,   create_uid,   customer_status_id,   aktifnotes,   tmt,   air_zona_id,   air_manfaat_id,   def_pajak_id,   opnm,   opalamat,   latitude,   longitude,   created,   updated,   update_uid,   kd_restojmlmeja,   kd_restojmlkursi,   kd_restojmltamu,   kd_filmkursi,   kd_filmpertunjukan,   kd_filmtarif,   kd_bilyarmeja,   kd_bilyartarif,   kd_bilyarkegiatan,   kd_diskopengunjung,   kd_diskotarif,   mall_id,   cash_register,   pelaporan,   pembukuan,   bandara,   wajib_pajak,   jumlah_karyawan,   tanggal_tutup,   parkir_luas,   parkir_masuk,   parkir_tarif_mobil,   parkir_tambahan,   parkir_kapasitas_mobil,   parkir_mobil_hari,   parkir_keluar,   parkir_motor_luas,   parkir_motor_masuk,   parkir_motor_keluar,   parkir_tarif_motor,   parkir_motor_tambahan,   parkir_kapasitas_motor,   parkir_motor_hari,   kelompok_usaha_id,   zona_id,   manfaat_id,   golongan_id,   id_old";
$tdatapad_pad_customer_usaha[".sqlFrom"] = "FROM \"pad\".pad_customer_usaha";
$tdatapad_pad_customer_usaha[".sqlWhereExpr"] = "";
$tdatapad_pad_customer_usaha[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_customer_usaha[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_customer_usaha[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_customer_usaha = array();
$tableKeyspad_pad_customer_usaha[] = "id";
$tdatapad_pad_customer_usaha[".Keys"] = $tableKeyspad_pad_customer_usaha;

$tdatapad_pad_customer_usaha[".listFields"] = array();
$tdatapad_pad_customer_usaha[".listFields"][] = "id";
$tdatapad_pad_customer_usaha[".listFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".listFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".listFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "so";
$tdatapad_pad_customer_usaha[".listFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "notes";
$tdatapad_pad_customer_usaha[".listFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".listFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".listFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".listFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".listFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".listFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".listFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".listFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".listFields"][] = "created";
$tdatapad_pad_customer_usaha[".listFields"][] = "updated";
$tdatapad_pad_customer_usaha[".listFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".listFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".listFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".listFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".listFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".listFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".listFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".listFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".listFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".listFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".listFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".listFields"][] = "id_old";

$tdatapad_pad_customer_usaha[".viewFields"] = array();
$tdatapad_pad_customer_usaha[".viewFields"][] = "id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".viewFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".viewFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "so";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "notes";
$tdatapad_pad_customer_usaha[".viewFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".viewFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".viewFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".viewFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".viewFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".viewFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".viewFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".viewFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".viewFields"][] = "created";
$tdatapad_pad_customer_usaha[".viewFields"][] = "updated";
$tdatapad_pad_customer_usaha[".viewFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".viewFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".viewFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".viewFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".viewFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".viewFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".viewFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".viewFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".viewFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".viewFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".viewFields"][] = "id_old";

$tdatapad_pad_customer_usaha[".addFields"] = array();
$tdatapad_pad_customer_usaha[".addFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".addFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".addFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "so";
$tdatapad_pad_customer_usaha[".addFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "notes";
$tdatapad_pad_customer_usaha[".addFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".addFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".addFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".addFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".addFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".addFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".addFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".addFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".addFields"][] = "created";
$tdatapad_pad_customer_usaha[".addFields"][] = "updated";
$tdatapad_pad_customer_usaha[".addFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".addFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".addFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".addFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".addFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".addFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".addFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".addFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".addFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".addFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".addFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".addFields"][] = "id_old";

$tdatapad_pad_customer_usaha[".inlineAddFields"] = array();
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "so";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "notes";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "created";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "updated";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".inlineAddFields"][] = "id_old";

$tdatapad_pad_customer_usaha[".editFields"] = array();
$tdatapad_pad_customer_usaha[".editFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".editFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".editFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "so";
$tdatapad_pad_customer_usaha[".editFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "notes";
$tdatapad_pad_customer_usaha[".editFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".editFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".editFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".editFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".editFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".editFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".editFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".editFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".editFields"][] = "created";
$tdatapad_pad_customer_usaha[".editFields"][] = "updated";
$tdatapad_pad_customer_usaha[".editFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".editFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".editFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".editFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".editFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".editFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".editFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".editFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".editFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".editFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".editFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".editFields"][] = "id_old";

$tdatapad_pad_customer_usaha[".inlineEditFields"] = array();
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "so";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "notes";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "created";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "updated";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".inlineEditFields"][] = "id_old";

$tdatapad_pad_customer_usaha[".exportFields"] = array();
$tdatapad_pad_customer_usaha[".exportFields"][] = "id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".exportFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".exportFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "so";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "notes";
$tdatapad_pad_customer_usaha[".exportFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".exportFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".exportFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".exportFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".exportFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".exportFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".exportFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".exportFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".exportFields"][] = "created";
$tdatapad_pad_customer_usaha[".exportFields"][] = "updated";
$tdatapad_pad_customer_usaha[".exportFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".exportFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".exportFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".exportFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".exportFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".exportFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".exportFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".exportFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".exportFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".exportFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".exportFields"][] = "id_old";

$tdatapad_pad_customer_usaha[".printFields"] = array();
$tdatapad_pad_customer_usaha[".printFields"][] = "id";
$tdatapad_pad_customer_usaha[".printFields"][] = "konterid";
$tdatapad_pad_customer_usaha[".printFields"][] = "reg_date";
$tdatapad_pad_customer_usaha[".printFields"][] = "customer_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "usaha_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "so";
$tdatapad_pad_customer_usaha[".printFields"][] = "kecamatan_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "kelurahan_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "notes";
$tdatapad_pad_customer_usaha[".printFields"][] = "enabled";
$tdatapad_pad_customer_usaha[".printFields"][] = "create_uid";
$tdatapad_pad_customer_usaha[".printFields"][] = "customer_status_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "aktifnotes";
$tdatapad_pad_customer_usaha[".printFields"][] = "tmt";
$tdatapad_pad_customer_usaha[".printFields"][] = "air_zona_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "air_manfaat_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "def_pajak_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "opnm";
$tdatapad_pad_customer_usaha[".printFields"][] = "opalamat";
$tdatapad_pad_customer_usaha[".printFields"][] = "latitude";
$tdatapad_pad_customer_usaha[".printFields"][] = "longitude";
$tdatapad_pad_customer_usaha[".printFields"][] = "created";
$tdatapad_pad_customer_usaha[".printFields"][] = "updated";
$tdatapad_pad_customer_usaha[".printFields"][] = "update_uid";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_restojmlmeja";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_restojmlkursi";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_restojmltamu";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_filmkursi";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_filmtarif";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_bilyarmeja";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_bilyartarif";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_diskopengunjung";
$tdatapad_pad_customer_usaha[".printFields"][] = "kd_diskotarif";
$tdatapad_pad_customer_usaha[".printFields"][] = "mall_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "cash_register";
$tdatapad_pad_customer_usaha[".printFields"][] = "pelaporan";
$tdatapad_pad_customer_usaha[".printFields"][] = "pembukuan";
$tdatapad_pad_customer_usaha[".printFields"][] = "bandara";
$tdatapad_pad_customer_usaha[".printFields"][] = "wajib_pajak";
$tdatapad_pad_customer_usaha[".printFields"][] = "jumlah_karyawan";
$tdatapad_pad_customer_usaha[".printFields"][] = "tanggal_tutup";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_luas";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_masuk";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_tarif_mobil";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_tambahan";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_kapasitas_mobil";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_mobil_hari";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_keluar";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_motor_luas";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_motor_masuk";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_motor_keluar";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_tarif_motor";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_motor_tambahan";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_kapasitas_motor";
$tdatapad_pad_customer_usaha[".printFields"][] = "parkir_motor_hari";
$tdatapad_pad_customer_usaha[".printFields"][] = "kelompok_usaha_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "zona_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "manfaat_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "golongan_id";
$tdatapad_pad_customer_usaha[".printFields"][] = "id_old";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["id"] = $fdata;
//	konterid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "konterid";
	$fdata["GoodName"] = "konterid";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Konterid"; 
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
	
		$fdata["strField"] = "konterid"; 
		$fdata["FullName"] = "konterid";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["konterid"] = $fdata;
//	reg_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "reg_date";
	$fdata["GoodName"] = "reg_date";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["reg_date"] = $fdata;
//	customer_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "customer_id";
	$fdata["GoodName"] = "customer_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Customer Id"; 
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
	
		$fdata["strField"] = "customer_id"; 
		$fdata["FullName"] = "customer_id";
	
		
		
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
	$edata["LinkFieldType"] = 20;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad.pad_customer";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer_usaha["customer_id"] = $fdata;
//	usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "usaha_id";
	$fdata["GoodName"] = "usaha_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Usaha Id"; 
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
	
		$fdata["strField"] = "usaha_id"; 
		$fdata["FullName"] = "usaha_id";
	
		
		
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
	
		
	$edata["LookupTable"] = "pad.pad_usaha";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer_usaha["usaha_id"] = $fdata;
//	so
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "so";
	$fdata["GoodName"] = "so";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "So"; 
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
	
		$fdata["strField"] = "so"; 
		$fdata["FullName"] = "so";
	
		
		
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
			$edata["EditParams"].= " maxlength=1";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer_usaha["so"] = $fdata;
//	kecamatan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "kecamatan_id";
	$fdata["GoodName"] = "kecamatan_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["kecamatan_id"] = $fdata;
//	kelurahan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "kelurahan_id";
	$fdata["GoodName"] = "kelurahan_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["kelurahan_id"] = $fdata;
//	notes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "notes";
	$fdata["GoodName"] = "notes";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Notes"; 
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
	
		$fdata["strField"] = "notes"; 
		$fdata["FullName"] = "notes";
	
		
		
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
			$edata["EditParams"].= " maxlength=250";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer_usaha["notes"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["enabled"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["create_uid"] = $fdata;
//	customer_status_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "customer_status_id";
	$fdata["GoodName"] = "customer_status_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["customer_status_id"] = $fdata;
//	aktifnotes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "aktifnotes";
	$fdata["GoodName"] = "aktifnotes";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Aktifnotes"; 
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
	
		$fdata["strField"] = "aktifnotes"; 
		$fdata["FullName"] = "aktifnotes";
	
		
		
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
			$edata["EditParams"].= " maxlength=500";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_customer_usaha["aktifnotes"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["tmt"] = $fdata;
//	air_zona_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "air_zona_id";
	$fdata["GoodName"] = "air_zona_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Air Zona Id"; 
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
	
		$fdata["strField"] = "air_zona_id"; 
		$fdata["FullName"] = "air_zona_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["air_zona_id"] = $fdata;
//	air_manfaat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "air_manfaat_id";
	$fdata["GoodName"] = "air_manfaat_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Air Manfaat Id"; 
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
	
		$fdata["strField"] = "air_manfaat_id"; 
		$fdata["FullName"] = "air_manfaat_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["air_manfaat_id"] = $fdata;
//	def_pajak_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "def_pajak_id";
	$fdata["GoodName"] = "def_pajak_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Def Pajak Id"; 
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
	
		$fdata["strField"] = "def_pajak_id"; 
		$fdata["FullName"] = "def_pajak_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["def_pajak_id"] = $fdata;
//	opnm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "opnm";
	$fdata["GoodName"] = "opnm";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Opnm"; 
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
	
		$fdata["strField"] = "opnm"; 
		$fdata["FullName"] = "opnm";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["opnm"] = $fdata;
//	opalamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "opalamat";
	$fdata["GoodName"] = "opalamat";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Opalamat"; 
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
	
		$fdata["strField"] = "opalamat"; 
		$fdata["FullName"] = "opalamat";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["opalamat"] = $fdata;
//	latitude
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "latitude";
	$fdata["GoodName"] = "latitude";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Latitude"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "latitude"; 
		$fdata["FullName"] = "latitude";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["latitude"] = $fdata;
//	longitude
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "longitude";
	$fdata["GoodName"] = "longitude";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Longitude"; 
	$fdata["FieldType"] = 14;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "longitude"; 
		$fdata["FullName"] = "longitude";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["longitude"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["update_uid"] = $fdata;
//	kd_restojmlmeja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
	$fdata["strName"] = "kd_restojmlmeja";
	$fdata["GoodName"] = "kd_restojmlmeja";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Restojmlmeja"; 
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
	
		$fdata["strField"] = "kd_restojmlmeja"; 
		$fdata["FullName"] = "kd_restojmlmeja";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_restojmlmeja"] = $fdata;
//	kd_restojmlkursi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 26;
	$fdata["strName"] = "kd_restojmlkursi";
	$fdata["GoodName"] = "kd_restojmlkursi";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Restojmlkursi"; 
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
	
		$fdata["strField"] = "kd_restojmlkursi"; 
		$fdata["FullName"] = "kd_restojmlkursi";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_restojmlkursi"] = $fdata;
//	kd_restojmltamu
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 27;
	$fdata["strName"] = "kd_restojmltamu";
	$fdata["GoodName"] = "kd_restojmltamu";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Restojmltamu"; 
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
	
		$fdata["strField"] = "kd_restojmltamu"; 
		$fdata["FullName"] = "kd_restojmltamu";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_restojmltamu"] = $fdata;
//	kd_filmkursi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 28;
	$fdata["strName"] = "kd_filmkursi";
	$fdata["GoodName"] = "kd_filmkursi";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Filmkursi"; 
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
	
		$fdata["strField"] = "kd_filmkursi"; 
		$fdata["FullName"] = "kd_filmkursi";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_filmkursi"] = $fdata;
//	kd_filmpertunjukan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 29;
	$fdata["strName"] = "kd_filmpertunjukan";
	$fdata["GoodName"] = "kd_filmpertunjukan";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Filmpertunjukan"; 
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
	
		$fdata["strField"] = "kd_filmpertunjukan"; 
		$fdata["FullName"] = "kd_filmpertunjukan";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_filmpertunjukan"] = $fdata;
//	kd_filmtarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 30;
	$fdata["strName"] = "kd_filmtarif";
	$fdata["GoodName"] = "kd_filmtarif";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Filmtarif"; 
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
	
		$fdata["strField"] = "kd_filmtarif"; 
		$fdata["FullName"] = "kd_filmtarif";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_filmtarif"] = $fdata;
//	kd_bilyarmeja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 31;
	$fdata["strName"] = "kd_bilyarmeja";
	$fdata["GoodName"] = "kd_bilyarmeja";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Bilyarmeja"; 
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
	
		$fdata["strField"] = "kd_bilyarmeja"; 
		$fdata["FullName"] = "kd_bilyarmeja";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_bilyarmeja"] = $fdata;
//	kd_bilyartarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 32;
	$fdata["strName"] = "kd_bilyartarif";
	$fdata["GoodName"] = "kd_bilyartarif";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Bilyartarif"; 
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
	
		$fdata["strField"] = "kd_bilyartarif"; 
		$fdata["FullName"] = "kd_bilyartarif";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_bilyartarif"] = $fdata;
//	kd_bilyarkegiatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 33;
	$fdata["strName"] = "kd_bilyarkegiatan";
	$fdata["GoodName"] = "kd_bilyarkegiatan";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Bilyarkegiatan"; 
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
	
		$fdata["strField"] = "kd_bilyarkegiatan"; 
		$fdata["FullName"] = "kd_bilyarkegiatan";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_bilyarkegiatan"] = $fdata;
//	kd_diskopengunjung
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 34;
	$fdata["strName"] = "kd_diskopengunjung";
	$fdata["GoodName"] = "kd_diskopengunjung";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Diskopengunjung"; 
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
	
		$fdata["strField"] = "kd_diskopengunjung"; 
		$fdata["FullName"] = "kd_diskopengunjung";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_diskopengunjung"] = $fdata;
//	kd_diskotarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 35;
	$fdata["strName"] = "kd_diskotarif";
	$fdata["GoodName"] = "kd_diskotarif";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kd Diskotarif"; 
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
	
		$fdata["strField"] = "kd_diskotarif"; 
		$fdata["FullName"] = "kd_diskotarif";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kd_diskotarif"] = $fdata;
//	mall_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 36;
	$fdata["strName"] = "mall_id";
	$fdata["GoodName"] = "mall_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Mall Id"; 
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
	
		$fdata["strField"] = "mall_id"; 
		$fdata["FullName"] = "mall_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["mall_id"] = $fdata;
//	cash_register
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 37;
	$fdata["strName"] = "cash_register";
	$fdata["GoodName"] = "cash_register";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Cash Register"; 
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
	
		$fdata["strField"] = "cash_register"; 
		$fdata["FullName"] = "cash_register";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["cash_register"] = $fdata;
//	pelaporan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 38;
	$fdata["strName"] = "pelaporan";
	$fdata["GoodName"] = "pelaporan";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Pelaporan"; 
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
	
		$fdata["strField"] = "pelaporan"; 
		$fdata["FullName"] = "pelaporan";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["pelaporan"] = $fdata;
//	pembukuan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 39;
	$fdata["strName"] = "pembukuan";
	$fdata["GoodName"] = "pembukuan";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Pembukuan"; 
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
	
		$fdata["strField"] = "pembukuan"; 
		$fdata["FullName"] = "pembukuan";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["pembukuan"] = $fdata;
//	bandara
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 40;
	$fdata["strName"] = "bandara";
	$fdata["GoodName"] = "bandara";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Bandara"; 
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
	
		$fdata["strField"] = "bandara"; 
		$fdata["FullName"] = "bandara";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["bandara"] = $fdata;
//	wajib_pajak
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 41;
	$fdata["strName"] = "wajib_pajak";
	$fdata["GoodName"] = "wajib_pajak";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Wajib Pajak"; 
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
	
		$fdata["strField"] = "wajib_pajak"; 
		$fdata["FullName"] = "wajib_pajak";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["wajib_pajak"] = $fdata;
//	jumlah_karyawan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 42;
	$fdata["strName"] = "jumlah_karyawan";
	$fdata["GoodName"] = "jumlah_karyawan";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Jumlah Karyawan"; 
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
	
		$fdata["strField"] = "jumlah_karyawan"; 
		$fdata["FullName"] = "jumlah_karyawan";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["jumlah_karyawan"] = $fdata;
//	tanggal_tutup
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 43;
	$fdata["strName"] = "tanggal_tutup";
	$fdata["GoodName"] = "tanggal_tutup";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Tanggal Tutup"; 
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
	
		$fdata["strField"] = "tanggal_tutup"; 
		$fdata["FullName"] = "tanggal_tutup";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["tanggal_tutup"] = $fdata;
//	parkir_luas
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 44;
	$fdata["strName"] = "parkir_luas";
	$fdata["GoodName"] = "parkir_luas";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Luas"; 
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
	
		$fdata["strField"] = "parkir_luas"; 
		$fdata["FullName"] = "parkir_luas";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_luas"] = $fdata;
//	parkir_masuk
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 45;
	$fdata["strName"] = "parkir_masuk";
	$fdata["GoodName"] = "parkir_masuk";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Masuk"; 
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
	
		$fdata["strField"] = "parkir_masuk"; 
		$fdata["FullName"] = "parkir_masuk";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_masuk"] = $fdata;
//	parkir_tarif_mobil
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 46;
	$fdata["strName"] = "parkir_tarif_mobil";
	$fdata["GoodName"] = "parkir_tarif_mobil";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Tarif Mobil"; 
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
	
		$fdata["strField"] = "parkir_tarif_mobil"; 
		$fdata["FullName"] = "parkir_tarif_mobil";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_tarif_mobil"] = $fdata;
//	parkir_tambahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 47;
	$fdata["strName"] = "parkir_tambahan";
	$fdata["GoodName"] = "parkir_tambahan";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Tambahan"; 
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
	
		$fdata["strField"] = "parkir_tambahan"; 
		$fdata["FullName"] = "parkir_tambahan";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_tambahan"] = $fdata;
//	parkir_kapasitas_mobil
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 48;
	$fdata["strName"] = "parkir_kapasitas_mobil";
	$fdata["GoodName"] = "parkir_kapasitas_mobil";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Kapasitas Mobil"; 
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
	
		$fdata["strField"] = "parkir_kapasitas_mobil"; 
		$fdata["FullName"] = "parkir_kapasitas_mobil";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_kapasitas_mobil"] = $fdata;
//	parkir_mobil_hari
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 49;
	$fdata["strName"] = "parkir_mobil_hari";
	$fdata["GoodName"] = "parkir_mobil_hari";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Mobil Hari"; 
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
	
		$fdata["strField"] = "parkir_mobil_hari"; 
		$fdata["FullName"] = "parkir_mobil_hari";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_mobil_hari"] = $fdata;
//	parkir_keluar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 50;
	$fdata["strName"] = "parkir_keluar";
	$fdata["GoodName"] = "parkir_keluar";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Keluar"; 
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
	
		$fdata["strField"] = "parkir_keluar"; 
		$fdata["FullName"] = "parkir_keluar";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_keluar"] = $fdata;
//	parkir_motor_luas
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 51;
	$fdata["strName"] = "parkir_motor_luas";
	$fdata["GoodName"] = "parkir_motor_luas";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Motor Luas"; 
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
	
		$fdata["strField"] = "parkir_motor_luas"; 
		$fdata["FullName"] = "parkir_motor_luas";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_motor_luas"] = $fdata;
//	parkir_motor_masuk
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 52;
	$fdata["strName"] = "parkir_motor_masuk";
	$fdata["GoodName"] = "parkir_motor_masuk";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Motor Masuk"; 
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
	
		$fdata["strField"] = "parkir_motor_masuk"; 
		$fdata["FullName"] = "parkir_motor_masuk";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_motor_masuk"] = $fdata;
//	parkir_motor_keluar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 53;
	$fdata["strName"] = "parkir_motor_keluar";
	$fdata["GoodName"] = "parkir_motor_keluar";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Motor Keluar"; 
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
	
		$fdata["strField"] = "parkir_motor_keluar"; 
		$fdata["FullName"] = "parkir_motor_keluar";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_motor_keluar"] = $fdata;
//	parkir_tarif_motor
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 54;
	$fdata["strName"] = "parkir_tarif_motor";
	$fdata["GoodName"] = "parkir_tarif_motor";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Tarif Motor"; 
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
	
		$fdata["strField"] = "parkir_tarif_motor"; 
		$fdata["FullName"] = "parkir_tarif_motor";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_tarif_motor"] = $fdata;
//	parkir_motor_tambahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 55;
	$fdata["strName"] = "parkir_motor_tambahan";
	$fdata["GoodName"] = "parkir_motor_tambahan";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Motor Tambahan"; 
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
	
		$fdata["strField"] = "parkir_motor_tambahan"; 
		$fdata["FullName"] = "parkir_motor_tambahan";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_motor_tambahan"] = $fdata;
//	parkir_kapasitas_motor
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 56;
	$fdata["strName"] = "parkir_kapasitas_motor";
	$fdata["GoodName"] = "parkir_kapasitas_motor";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Kapasitas Motor"; 
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
	
		$fdata["strField"] = "parkir_kapasitas_motor"; 
		$fdata["FullName"] = "parkir_kapasitas_motor";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_kapasitas_motor"] = $fdata;
//	parkir_motor_hari
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 57;
	$fdata["strName"] = "parkir_motor_hari";
	$fdata["GoodName"] = "parkir_motor_hari";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Parkir Motor Hari"; 
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
	
		$fdata["strField"] = "parkir_motor_hari"; 
		$fdata["FullName"] = "parkir_motor_hari";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["parkir_motor_hari"] = $fdata;
//	kelompok_usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 58;
	$fdata["strName"] = "kelompok_usaha_id";
	$fdata["GoodName"] = "kelompok_usaha_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Kelompok Usaha Id"; 
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
	
		$fdata["strField"] = "kelompok_usaha_id"; 
		$fdata["FullName"] = "kelompok_usaha_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["kelompok_usaha_id"] = $fdata;
//	zona_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 59;
	$fdata["strName"] = "zona_id";
	$fdata["GoodName"] = "zona_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Zona Id"; 
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
	
		$fdata["strField"] = "zona_id"; 
		$fdata["FullName"] = "zona_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["zona_id"] = $fdata;
//	manfaat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 60;
	$fdata["strName"] = "manfaat_id";
	$fdata["GoodName"] = "manfaat_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Manfaat Id"; 
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
	
		$fdata["strField"] = "manfaat_id"; 
		$fdata["FullName"] = "manfaat_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["manfaat_id"] = $fdata;
//	golongan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 61;
	$fdata["strName"] = "golongan_id";
	$fdata["GoodName"] = "golongan_id";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
	$fdata["Label"] = "Golongan Id"; 
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
	
		$fdata["strField"] = "golongan_id"; 
		$fdata["FullName"] = "golongan_id";
	
		
		
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
	
		
		
	$tdatapad_pad_customer_usaha["golongan_id"] = $fdata;
//	id_old
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 62;
	$fdata["strName"] = "id_old";
	$fdata["GoodName"] = "id_old";
	$fdata["ownerTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_customer_usaha["id_old"] = $fdata;

	
$tables_data["pad.pad_customer_usaha"]=&$tdatapad_pad_customer_usaha;
$field_labels["pad_pad_customer_usaha"] = &$fieldLabelspad_pad_customer_usaha;
$fieldToolTips["pad.pad_customer_usaha"] = &$fieldToolTipspad_pad_customer_usaha;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_customer_usaha"] = array();
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
		
	$detailsTablesData["pad.pad_customer_usaha"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_customer_usaha"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_customer_usaha"][$dIndex]["detailKeys"][]="customer_usaha_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_customer_usaha"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_customer";
	$masterParams["mDataSourceTable"]="pad.pad_customer";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_customer";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_customer_usaha"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_customer_usaha"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_customer_usaha"][$mIndex]["detailKeys"][]="customer_id";

$mIndex = 2-1;
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
	$masterTablesData["pad.pad_customer_usaha"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_customer_usaha"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_customer_usaha"][$mIndex]["detailKeys"][]="kecamatan_id";

$mIndex = 3-1;
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
	$masterTablesData["pad.pad_customer_usaha"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_customer_usaha"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_customer_usaha"][$mIndex]["detailKeys"][]="kelurahan_id";

$mIndex = 4-1;
			$strOriginalDetailsTable="pad.pad_usaha";
	$masterParams["mDataSourceTable"]="pad.pad_usaha";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_usaha";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_customer_usaha"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_customer_usaha"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_customer_usaha"][$mIndex]["detailKeys"][]="usaha_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_customer_usaha()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   konterid,   reg_date,   customer_id,   usaha_id,   so,   kecamatan_id,   kelurahan_id,   notes,   enabled,   create_uid,   customer_status_id,   aktifnotes,   tmt,   air_zona_id,   air_manfaat_id,   def_pajak_id,   opnm,   opalamat,   latitude,   longitude,   created,   updated,   update_uid,   kd_restojmlmeja,   kd_restojmlkursi,   kd_restojmltamu,   kd_filmkursi,   kd_filmpertunjukan,   kd_filmtarif,   kd_bilyarmeja,   kd_bilyartarif,   kd_bilyarkegiatan,   kd_diskopengunjung,   kd_diskotarif,   mall_id,   cash_register,   pelaporan,   pembukuan,   bandara,   wajib_pajak,   jumlah_karyawan,   tanggal_tutup,   parkir_luas,   parkir_masuk,   parkir_tarif_mobil,   parkir_tambahan,   parkir_kapasitas_mobil,   parkir_mobil_hari,   parkir_keluar,   parkir_motor_luas,   parkir_motor_masuk,   parkir_motor_keluar,   parkir_tarif_motor,   parkir_motor_tambahan,   parkir_kapasitas_motor,   parkir_motor_hari,   kelompok_usaha_id,   zona_id,   manfaat_id,   golongan_id,   id_old";
$proto0["m_strFrom"] = "FROM \"pad\".pad_customer_usaha";
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
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "konterid",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "reg_date",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "usaha_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "so",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "kecamatan_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "kelurahan_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "notes",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_status_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "aktifnotes",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "air_zona_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "air_manfaat_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "def_pajak_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "opnm",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "opalamat",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "latitude",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "longitude",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto53=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_restojmlmeja",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto53["m_expr"]=$obj;
$proto53["m_alias"] = "";
$obj = new SQLFieldListItem($proto53);

$proto0["m_fieldlist"][]=$obj;
						$proto55=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_restojmlkursi",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto55["m_expr"]=$obj;
$proto55["m_alias"] = "";
$obj = new SQLFieldListItem($proto55);

$proto0["m_fieldlist"][]=$obj;
						$proto57=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_restojmltamu",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto57["m_expr"]=$obj;
$proto57["m_alias"] = "";
$obj = new SQLFieldListItem($proto57);

$proto0["m_fieldlist"][]=$obj;
						$proto59=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_filmkursi",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto59["m_expr"]=$obj;
$proto59["m_alias"] = "";
$obj = new SQLFieldListItem($proto59);

$proto0["m_fieldlist"][]=$obj;
						$proto61=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_filmpertunjukan",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto61["m_expr"]=$obj;
$proto61["m_alias"] = "";
$obj = new SQLFieldListItem($proto61);

$proto0["m_fieldlist"][]=$obj;
						$proto63=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_filmtarif",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto63["m_expr"]=$obj;
$proto63["m_alias"] = "";
$obj = new SQLFieldListItem($proto63);

$proto0["m_fieldlist"][]=$obj;
						$proto65=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_bilyarmeja",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto65["m_expr"]=$obj;
$proto65["m_alias"] = "";
$obj = new SQLFieldListItem($proto65);

$proto0["m_fieldlist"][]=$obj;
						$proto67=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_bilyartarif",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto67["m_expr"]=$obj;
$proto67["m_alias"] = "";
$obj = new SQLFieldListItem($proto67);

$proto0["m_fieldlist"][]=$obj;
						$proto69=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_bilyarkegiatan",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto69["m_expr"]=$obj;
$proto69["m_alias"] = "";
$obj = new SQLFieldListItem($proto69);

$proto0["m_fieldlist"][]=$obj;
						$proto71=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_diskopengunjung",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto71["m_expr"]=$obj;
$proto71["m_alias"] = "";
$obj = new SQLFieldListItem($proto71);

$proto0["m_fieldlist"][]=$obj;
						$proto73=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_diskotarif",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto73["m_expr"]=$obj;
$proto73["m_alias"] = "";
$obj = new SQLFieldListItem($proto73);

$proto0["m_fieldlist"][]=$obj;
						$proto75=array();
			$obj = new SQLField(array(
	"m_strName" => "mall_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto75["m_expr"]=$obj;
$proto75["m_alias"] = "";
$obj = new SQLFieldListItem($proto75);

$proto0["m_fieldlist"][]=$obj;
						$proto77=array();
			$obj = new SQLField(array(
	"m_strName" => "cash_register",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto77["m_expr"]=$obj;
$proto77["m_alias"] = "";
$obj = new SQLFieldListItem($proto77);

$proto0["m_fieldlist"][]=$obj;
						$proto79=array();
			$obj = new SQLField(array(
	"m_strName" => "pelaporan",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto79["m_expr"]=$obj;
$proto79["m_alias"] = "";
$obj = new SQLFieldListItem($proto79);

$proto0["m_fieldlist"][]=$obj;
						$proto81=array();
			$obj = new SQLField(array(
	"m_strName" => "pembukuan",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto81["m_expr"]=$obj;
$proto81["m_alias"] = "";
$obj = new SQLFieldListItem($proto81);

$proto0["m_fieldlist"][]=$obj;
						$proto83=array();
			$obj = new SQLField(array(
	"m_strName" => "bandara",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto83["m_expr"]=$obj;
$proto83["m_alias"] = "";
$obj = new SQLFieldListItem($proto83);

$proto0["m_fieldlist"][]=$obj;
						$proto85=array();
			$obj = new SQLField(array(
	"m_strName" => "wajib_pajak",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto85["m_expr"]=$obj;
$proto85["m_alias"] = "";
$obj = new SQLFieldListItem($proto85);

$proto0["m_fieldlist"][]=$obj;
						$proto87=array();
			$obj = new SQLField(array(
	"m_strName" => "jumlah_karyawan",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto87["m_expr"]=$obj;
$proto87["m_alias"] = "";
$obj = new SQLFieldListItem($proto87);

$proto0["m_fieldlist"][]=$obj;
						$proto89=array();
			$obj = new SQLField(array(
	"m_strName" => "tanggal_tutup",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto89["m_expr"]=$obj;
$proto89["m_alias"] = "";
$obj = new SQLFieldListItem($proto89);

$proto0["m_fieldlist"][]=$obj;
						$proto91=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_luas",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto91["m_expr"]=$obj;
$proto91["m_alias"] = "";
$obj = new SQLFieldListItem($proto91);

$proto0["m_fieldlist"][]=$obj;
						$proto93=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_masuk",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto93["m_expr"]=$obj;
$proto93["m_alias"] = "";
$obj = new SQLFieldListItem($proto93);

$proto0["m_fieldlist"][]=$obj;
						$proto95=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_tarif_mobil",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto95["m_expr"]=$obj;
$proto95["m_alias"] = "";
$obj = new SQLFieldListItem($proto95);

$proto0["m_fieldlist"][]=$obj;
						$proto97=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_tambahan",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto97["m_expr"]=$obj;
$proto97["m_alias"] = "";
$obj = new SQLFieldListItem($proto97);

$proto0["m_fieldlist"][]=$obj;
						$proto99=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_kapasitas_mobil",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto99["m_expr"]=$obj;
$proto99["m_alias"] = "";
$obj = new SQLFieldListItem($proto99);

$proto0["m_fieldlist"][]=$obj;
						$proto101=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_mobil_hari",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto101["m_expr"]=$obj;
$proto101["m_alias"] = "";
$obj = new SQLFieldListItem($proto101);

$proto0["m_fieldlist"][]=$obj;
						$proto103=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_keluar",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto103["m_expr"]=$obj;
$proto103["m_alias"] = "";
$obj = new SQLFieldListItem($proto103);

$proto0["m_fieldlist"][]=$obj;
						$proto105=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_motor_luas",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto105["m_expr"]=$obj;
$proto105["m_alias"] = "";
$obj = new SQLFieldListItem($proto105);

$proto0["m_fieldlist"][]=$obj;
						$proto107=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_motor_masuk",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto107["m_expr"]=$obj;
$proto107["m_alias"] = "";
$obj = new SQLFieldListItem($proto107);

$proto0["m_fieldlist"][]=$obj;
						$proto109=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_motor_keluar",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto109["m_expr"]=$obj;
$proto109["m_alias"] = "";
$obj = new SQLFieldListItem($proto109);

$proto0["m_fieldlist"][]=$obj;
						$proto111=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_tarif_motor",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto111["m_expr"]=$obj;
$proto111["m_alias"] = "";
$obj = new SQLFieldListItem($proto111);

$proto0["m_fieldlist"][]=$obj;
						$proto113=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_motor_tambahan",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto113["m_expr"]=$obj;
$proto113["m_alias"] = "";
$obj = new SQLFieldListItem($proto113);

$proto0["m_fieldlist"][]=$obj;
						$proto115=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_kapasitas_motor",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto115["m_expr"]=$obj;
$proto115["m_alias"] = "";
$obj = new SQLFieldListItem($proto115);

$proto0["m_fieldlist"][]=$obj;
						$proto117=array();
			$obj = new SQLField(array(
	"m_strName" => "parkir_motor_hari",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto117["m_expr"]=$obj;
$proto117["m_alias"] = "";
$obj = new SQLFieldListItem($proto117);

$proto0["m_fieldlist"][]=$obj;
						$proto119=array();
			$obj = new SQLField(array(
	"m_strName" => "kelompok_usaha_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto119["m_expr"]=$obj;
$proto119["m_alias"] = "";
$obj = new SQLFieldListItem($proto119);

$proto0["m_fieldlist"][]=$obj;
						$proto121=array();
			$obj = new SQLField(array(
	"m_strName" => "zona_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto121["m_expr"]=$obj;
$proto121["m_alias"] = "";
$obj = new SQLFieldListItem($proto121);

$proto0["m_fieldlist"][]=$obj;
						$proto123=array();
			$obj = new SQLField(array(
	"m_strName" => "manfaat_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto123["m_expr"]=$obj;
$proto123["m_alias"] = "";
$obj = new SQLFieldListItem($proto123);

$proto0["m_fieldlist"][]=$obj;
						$proto125=array();
			$obj = new SQLField(array(
	"m_strName" => "golongan_id",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto125["m_expr"]=$obj;
$proto125["m_alias"] = "";
$obj = new SQLFieldListItem($proto125);

$proto0["m_fieldlist"][]=$obj;
						$proto127=array();
			$obj = new SQLField(array(
	"m_strName" => "id_old",
	"m_strTable" => "pad.pad_customer_usaha"
));

$proto127["m_expr"]=$obj;
$proto127["m_alias"] = "";
$obj = new SQLFieldListItem($proto127);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto129=array();
$proto129["m_link"] = "SQLL_MAIN";
			$proto130=array();
$proto130["m_strName"] = "pad.pad_customer_usaha";
$proto130["m_columns"] = array();
$proto130["m_columns"][] = "id";
$proto130["m_columns"][] = "konterid";
$proto130["m_columns"][] = "reg_date";
$proto130["m_columns"][] = "customer_id";
$proto130["m_columns"][] = "usaha_id";
$proto130["m_columns"][] = "so";
$proto130["m_columns"][] = "kecamatan_id";
$proto130["m_columns"][] = "kelurahan_id";
$proto130["m_columns"][] = "notes";
$proto130["m_columns"][] = "enabled";
$proto130["m_columns"][] = "create_uid";
$proto130["m_columns"][] = "customer_status_id";
$proto130["m_columns"][] = "aktifnotes";
$proto130["m_columns"][] = "tmt";
$proto130["m_columns"][] = "air_zona_id";
$proto130["m_columns"][] = "air_manfaat_id";
$proto130["m_columns"][] = "def_pajak_id";
$proto130["m_columns"][] = "opnm";
$proto130["m_columns"][] = "opalamat";
$proto130["m_columns"][] = "latitude";
$proto130["m_columns"][] = "longitude";
$proto130["m_columns"][] = "created";
$proto130["m_columns"][] = "updated";
$proto130["m_columns"][] = "update_uid";
$proto130["m_columns"][] = "kd_restojmlmeja";
$proto130["m_columns"][] = "kd_restojmlkursi";
$proto130["m_columns"][] = "kd_restojmltamu";
$proto130["m_columns"][] = "kd_filmkursi";
$proto130["m_columns"][] = "kd_filmpertunjukan";
$proto130["m_columns"][] = "kd_filmtarif";
$proto130["m_columns"][] = "kd_bilyarmeja";
$proto130["m_columns"][] = "kd_bilyartarif";
$proto130["m_columns"][] = "kd_bilyarkegiatan";
$proto130["m_columns"][] = "kd_diskopengunjung";
$proto130["m_columns"][] = "kd_diskotarif";
$proto130["m_columns"][] = "mall_id";
$proto130["m_columns"][] = "cash_register";
$proto130["m_columns"][] = "pelaporan";
$proto130["m_columns"][] = "pembukuan";
$proto130["m_columns"][] = "bandara";
$proto130["m_columns"][] = "wajib_pajak";
$proto130["m_columns"][] = "jumlah_karyawan";
$proto130["m_columns"][] = "tanggal_tutup";
$proto130["m_columns"][] = "parkir_luas";
$proto130["m_columns"][] = "parkir_masuk";
$proto130["m_columns"][] = "parkir_tarif_mobil";
$proto130["m_columns"][] = "parkir_tambahan";
$proto130["m_columns"][] = "parkir_kapasitas_mobil";
$proto130["m_columns"][] = "parkir_mobil_hari";
$proto130["m_columns"][] = "parkir_keluar";
$proto130["m_columns"][] = "parkir_motor_luas";
$proto130["m_columns"][] = "parkir_motor_masuk";
$proto130["m_columns"][] = "parkir_motor_keluar";
$proto130["m_columns"][] = "parkir_tarif_motor";
$proto130["m_columns"][] = "parkir_motor_tambahan";
$proto130["m_columns"][] = "parkir_kapasitas_motor";
$proto130["m_columns"][] = "parkir_motor_hari";
$proto130["m_columns"][] = "kelompok_usaha_id";
$proto130["m_columns"][] = "zona_id";
$proto130["m_columns"][] = "manfaat_id";
$proto130["m_columns"][] = "golongan_id";
$proto130["m_columns"][] = "id_old";
$obj = new SQLTable($proto130);

$proto129["m_table"] = $obj;
$proto129["m_alias"] = "";
$proto131=array();
$proto131["m_sql"] = "";
$proto131["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto131["m_column"]=$obj;
$proto131["m_contained"] = array();
$proto131["m_strCase"] = "";
$proto131["m_havingmode"] = "0";
$proto131["m_inBrackets"] = "0";
$proto131["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto131);

$proto129["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto129);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_customer_usaha = createSqlQuery_pad_pad_customer_usaha();
																																																														$tdatapad_pad_customer_usaha[".sqlquery"] = $queryData_pad_pad_customer_usaha;
	
if(isset($tdatapad_pad_customer_usaha["field2"])){
	$tdatapad_pad_customer_usaha["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_customer_usaha["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_customer_usaha["field2"]["LookupType"] = 4;
	$tdatapad_pad_customer_usaha["field2"]["LinkField"] = "email";
	$tdatapad_pad_customer_usaha["field2"]["DisplayField"] = "name";
	$tdatapad_pad_customer_usaha[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_customer_usaha"] = new eventsBase;
$tdatapad_pad_customer_usaha[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_customer_usaha");

?>