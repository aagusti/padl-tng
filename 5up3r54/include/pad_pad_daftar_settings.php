<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_daftar = array();
	$tdatapad_pad_daftar[".NumberOfChars"] = 80; 
	$tdatapad_pad_daftar[".ShortName"] = "pad_pad_daftar";
	$tdatapad_pad_daftar[".OwnerID"] = "";
	$tdatapad_pad_daftar[".OriginalTable"] = "pad.pad_daftar";

//	field labels
$fieldLabelspad_pad_daftar = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_daftar["English"] = array();
	$fieldToolTipspad_pad_daftar["English"] = array();
	$fieldLabelspad_pad_daftar["English"]["id"] = "Id";
	$fieldToolTipspad_pad_daftar["English"]["id"] = "";
	$fieldLabelspad_pad_daftar["English"]["rp"] = "Rp";
	$fieldToolTipspad_pad_daftar["English"]["rp"] = "";
	$fieldLabelspad_pad_daftar["English"]["pb"] = "Pb";
	$fieldToolTipspad_pad_daftar["English"]["pb"] = "";
	$fieldLabelspad_pad_daftar["English"]["formno"] = "Formno";
	$fieldToolTipspad_pad_daftar["English"]["formno"] = "";
	$fieldLabelspad_pad_daftar["English"]["reg_date"] = "Reg Date";
	$fieldToolTipspad_pad_daftar["English"]["reg_date"] = "";
	$fieldLabelspad_pad_daftar["English"]["customernm"] = "Customernm";
	$fieldToolTipspad_pad_daftar["English"]["customernm"] = "";
	$fieldLabelspad_pad_daftar["English"]["kecamatan_id"] = "Kecamatan Id";
	$fieldToolTipspad_pad_daftar["English"]["kecamatan_id"] = "";
	$fieldLabelspad_pad_daftar["English"]["kelurahan_id"] = "Kelurahan Id";
	$fieldToolTipspad_pad_daftar["English"]["kelurahan_id"] = "";
	$fieldLabelspad_pad_daftar["English"]["kabupaten"] = "Kabupaten";
	$fieldToolTipspad_pad_daftar["English"]["kabupaten"] = "";
	$fieldLabelspad_pad_daftar["English"]["alamat"] = "Alamat";
	$fieldToolTipspad_pad_daftar["English"]["alamat"] = "";
	$fieldLabelspad_pad_daftar["English"]["kodepos"] = "Kodepos";
	$fieldToolTipspad_pad_daftar["English"]["kodepos"] = "";
	$fieldLabelspad_pad_daftar["English"]["telphone"] = "Telphone";
	$fieldToolTipspad_pad_daftar["English"]["telphone"] = "";
	$fieldLabelspad_pad_daftar["English"]["wpnama"] = "Wpnama";
	$fieldToolTipspad_pad_daftar["English"]["wpnama"] = "";
	$fieldLabelspad_pad_daftar["English"]["wpalamat"] = "Wpalamat";
	$fieldToolTipspad_pad_daftar["English"]["wpalamat"] = "";
	$fieldLabelspad_pad_daftar["English"]["wpkelurahan"] = "Wpkelurahan";
	$fieldToolTipspad_pad_daftar["English"]["wpkelurahan"] = "";
	$fieldLabelspad_pad_daftar["English"]["wpkecamatan"] = "Wpkecamatan";
	$fieldToolTipspad_pad_daftar["English"]["wpkecamatan"] = "";
	$fieldLabelspad_pad_daftar["English"]["wpkabupaten"] = "Wpkabupaten";
	$fieldToolTipspad_pad_daftar["English"]["wpkabupaten"] = "";
	$fieldLabelspad_pad_daftar["English"]["wptelp"] = "Wptelp";
	$fieldToolTipspad_pad_daftar["English"]["wptelp"] = "";
	$fieldLabelspad_pad_daftar["English"]["wpkodepos"] = "Wpkodepos";
	$fieldToolTipspad_pad_daftar["English"]["wpkodepos"] = "";
	$fieldLabelspad_pad_daftar["English"]["pnama"] = "Pnama";
	$fieldToolTipspad_pad_daftar["English"]["pnama"] = "";
	$fieldLabelspad_pad_daftar["English"]["palamat"] = "Palamat";
	$fieldToolTipspad_pad_daftar["English"]["palamat"] = "";
	$fieldLabelspad_pad_daftar["English"]["pkelurahan"] = "Pkelurahan";
	$fieldToolTipspad_pad_daftar["English"]["pkelurahan"] = "";
	$fieldLabelspad_pad_daftar["English"]["pkecamatan"] = "Pkecamatan";
	$fieldToolTipspad_pad_daftar["English"]["pkecamatan"] = "";
	$fieldLabelspad_pad_daftar["English"]["pkabupaten"] = "Pkabupaten";
	$fieldToolTipspad_pad_daftar["English"]["pkabupaten"] = "";
	$fieldLabelspad_pad_daftar["English"]["ptelp"] = "Ptelp";
	$fieldToolTipspad_pad_daftar["English"]["ptelp"] = "";
	$fieldLabelspad_pad_daftar["English"]["pkodepos"] = "Pkodepos";
	$fieldToolTipspad_pad_daftar["English"]["pkodepos"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin1"] = "Ijin1";
	$fieldToolTipspad_pad_daftar["English"]["ijin1"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin1no"] = "Ijin1no";
	$fieldToolTipspad_pad_daftar["English"]["ijin1no"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin1tgl"] = "Ijin1tgl";
	$fieldToolTipspad_pad_daftar["English"]["ijin1tgl"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin1tglakhir"] = "Ijin1tglakhir";
	$fieldToolTipspad_pad_daftar["English"]["ijin1tglakhir"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin2"] = "Ijin2";
	$fieldToolTipspad_pad_daftar["English"]["ijin2"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin2no"] = "Ijin2no";
	$fieldToolTipspad_pad_daftar["English"]["ijin2no"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin2tgl"] = "Ijin2tgl";
	$fieldToolTipspad_pad_daftar["English"]["ijin2tgl"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin2tglakhir"] = "Ijin2tglakhir";
	$fieldToolTipspad_pad_daftar["English"]["ijin2tglakhir"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin3"] = "Ijin3";
	$fieldToolTipspad_pad_daftar["English"]["ijin3"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin3no"] = "Ijin3no";
	$fieldToolTipspad_pad_daftar["English"]["ijin3no"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin3tgl"] = "Ijin3tgl";
	$fieldToolTipspad_pad_daftar["English"]["ijin3tgl"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin3tglakhir"] = "Ijin3tglakhir";
	$fieldToolTipspad_pad_daftar["English"]["ijin3tglakhir"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin4"] = "Ijin4";
	$fieldToolTipspad_pad_daftar["English"]["ijin4"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin4no"] = "Ijin4no";
	$fieldToolTipspad_pad_daftar["English"]["ijin4no"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin4tgl"] = "Ijin4tgl";
	$fieldToolTipspad_pad_daftar["English"]["ijin4tgl"] = "";
	$fieldLabelspad_pad_daftar["English"]["ijin4tglakhir"] = "Ijin4tglakhir";
	$fieldToolTipspad_pad_daftar["English"]["ijin4tglakhir"] = "";
	$fieldLabelspad_pad_daftar["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_daftar["English"]["enabled"] = "";
	$fieldLabelspad_pad_daftar["English"]["create_date"] = "Create Date";
	$fieldToolTipspad_pad_daftar["English"]["create_date"] = "";
	$fieldLabelspad_pad_daftar["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_daftar["English"]["create_uid"] = "";
	$fieldLabelspad_pad_daftar["English"]["write_date"] = "Write Date";
	$fieldToolTipspad_pad_daftar["English"]["write_date"] = "";
	$fieldLabelspad_pad_daftar["English"]["write_uid"] = "Write Uid";
	$fieldToolTipspad_pad_daftar["English"]["write_uid"] = "";
	$fieldLabelspad_pad_daftar["English"]["op_nm"] = "Op Nm";
	$fieldToolTipspad_pad_daftar["English"]["op_nm"] = "";
	$fieldLabelspad_pad_daftar["English"]["op_alamat"] = "Op Alamat";
	$fieldToolTipspad_pad_daftar["English"]["op_alamat"] = "";
	$fieldLabelspad_pad_daftar["English"]["op_usaha_id"] = "Op Usaha Id";
	$fieldToolTipspad_pad_daftar["English"]["op_usaha_id"] = "";
	$fieldLabelspad_pad_daftar["English"]["op_so"] = "Op So";
	$fieldToolTipspad_pad_daftar["English"]["op_so"] = "";
	$fieldLabelspad_pad_daftar["English"]["op_kecamatan_id"] = "Op Kecamatan Id";
	$fieldToolTipspad_pad_daftar["English"]["op_kecamatan_id"] = "";
	$fieldLabelspad_pad_daftar["English"]["op_kelurahan_id"] = "Op Kelurahan Id";
	$fieldToolTipspad_pad_daftar["English"]["op_kelurahan_id"] = "";
	$fieldLabelspad_pad_daftar["English"]["op_latitude"] = "Op Latitude";
	$fieldToolTipspad_pad_daftar["English"]["op_latitude"] = "";
	$fieldLabelspad_pad_daftar["English"]["op_longitude"] = "Op Longitude";
	$fieldToolTipspad_pad_daftar["English"]["op_longitude"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_restojmlmeja"] = "Kd Restojmlmeja";
	$fieldToolTipspad_pad_daftar["English"]["kd_restojmlmeja"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_restojmlkursi"] = "Kd Restojmlkursi";
	$fieldToolTipspad_pad_daftar["English"]["kd_restojmlkursi"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_restojmltamu"] = "Kd Restojmltamu";
	$fieldToolTipspad_pad_daftar["English"]["kd_restojmltamu"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_filmkursi"] = "Kd Filmkursi";
	$fieldToolTipspad_pad_daftar["English"]["kd_filmkursi"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_filmpertunjukan"] = "Kd Filmpertunjukan";
	$fieldToolTipspad_pad_daftar["English"]["kd_filmpertunjukan"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_filmtarif"] = "Kd Filmtarif";
	$fieldToolTipspad_pad_daftar["English"]["kd_filmtarif"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_bilyarmeja"] = "Kd Bilyarmeja";
	$fieldToolTipspad_pad_daftar["English"]["kd_bilyarmeja"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_bilyartarif"] = "Kd Bilyartarif";
	$fieldToolTipspad_pad_daftar["English"]["kd_bilyartarif"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_bilyarkegiatan"] = "Kd Bilyarkegiatan";
	$fieldToolTipspad_pad_daftar["English"]["kd_bilyarkegiatan"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_diskopengunjung"] = "Kd Diskopengunjung";
	$fieldToolTipspad_pad_daftar["English"]["kd_diskopengunjung"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_diskotarif"] = "Kd Diskotarif";
	$fieldToolTipspad_pad_daftar["English"]["kd_diskotarif"] = "";
	$fieldLabelspad_pad_daftar["English"]["kd_waletvolume"] = "Kd Waletvolume";
	$fieldToolTipspad_pad_daftar["English"]["kd_waletvolume"] = "";
	$fieldLabelspad_pad_daftar["English"]["email"] = "Email";
	$fieldToolTipspad_pad_daftar["English"]["email"] = "";
	$fieldLabelspad_pad_daftar["English"]["op_pajak_id"] = "Op Pajak Id";
	$fieldToolTipspad_pad_daftar["English"]["op_pajak_id"] = "";
	$fieldLabelspad_pad_daftar["English"]["npwpd"] = "Npwpd";
	$fieldToolTipspad_pad_daftar["English"]["npwpd"] = "";
	$fieldLabelspad_pad_daftar["English"]["passwd"] = "Passwd";
	$fieldToolTipspad_pad_daftar["English"]["passwd"] = "";
	if (count($fieldToolTipspad_pad_daftar["English"]))
		$tdatapad_pad_daftar[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_daftar[".NCSearch"] = true;



$tdatapad_pad_daftar[".shortTableName"] = "pad_pad_daftar";
$tdatapad_pad_daftar[".nSecOptions"] = 0;
$tdatapad_pad_daftar[".recsPerRowList"] = 1;
$tdatapad_pad_daftar[".mainTableOwnerID"] = "";
$tdatapad_pad_daftar[".moveNext"] = 1;
$tdatapad_pad_daftar[".nType"] = 0;

$tdatapad_pad_daftar[".strOriginalTableName"] = "pad.pad_daftar";




$tdatapad_pad_daftar[".showAddInPopup"] = false;

$tdatapad_pad_daftar[".showEditInPopup"] = false;

$tdatapad_pad_daftar[".showViewInPopup"] = false;

$tdatapad_pad_daftar[".fieldsForRegister"] = array();

$tdatapad_pad_daftar[".listAjax"] = false;

	$tdatapad_pad_daftar[".audit"] = false;

	$tdatapad_pad_daftar[".locking"] = false;

$tdatapad_pad_daftar[".listIcons"] = true;
$tdatapad_pad_daftar[".edit"] = true;
$tdatapad_pad_daftar[".inlineEdit"] = true;
$tdatapad_pad_daftar[".inlineAdd"] = true;
$tdatapad_pad_daftar[".view"] = true;

$tdatapad_pad_daftar[".exportTo"] = true;

$tdatapad_pad_daftar[".printFriendly"] = true;

$tdatapad_pad_daftar[".delete"] = true;

$tdatapad_pad_daftar[".showSimpleSearchOptions"] = false;

$tdatapad_pad_daftar[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_daftar[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_daftar[".isUseAjaxSuggest"] = true;

$tdatapad_pad_daftar[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_daftar[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_daftar[".isUseTimeForSearch"] = false;



$tdatapad_pad_daftar[".useDetailsPreview"] = true;

$tdatapad_pad_daftar[".allSearchFields"] = array();

$tdatapad_pad_daftar[".allSearchFields"][] = "id";
$tdatapad_pad_daftar[".allSearchFields"][] = "rp";
$tdatapad_pad_daftar[".allSearchFields"][] = "pb";
$tdatapad_pad_daftar[".allSearchFields"][] = "formno";
$tdatapad_pad_daftar[".allSearchFields"][] = "reg_date";
$tdatapad_pad_daftar[".allSearchFields"][] = "customernm";
$tdatapad_pad_daftar[".allSearchFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".allSearchFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".allSearchFields"][] = "kabupaten";
$tdatapad_pad_daftar[".allSearchFields"][] = "alamat";
$tdatapad_pad_daftar[".allSearchFields"][] = "kodepos";
$tdatapad_pad_daftar[".allSearchFields"][] = "telphone";
$tdatapad_pad_daftar[".allSearchFields"][] = "wpnama";
$tdatapad_pad_daftar[".allSearchFields"][] = "wpalamat";
$tdatapad_pad_daftar[".allSearchFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".allSearchFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".allSearchFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".allSearchFields"][] = "wptelp";
$tdatapad_pad_daftar[".allSearchFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".allSearchFields"][] = "pnama";
$tdatapad_pad_daftar[".allSearchFields"][] = "palamat";
$tdatapad_pad_daftar[".allSearchFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".allSearchFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".allSearchFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".allSearchFields"][] = "ptelp";
$tdatapad_pad_daftar[".allSearchFields"][] = "pkodepos";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin1";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin1no";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin2";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin2no";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin3";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin3no";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin4";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin4no";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".allSearchFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".allSearchFields"][] = "enabled";
$tdatapad_pad_daftar[".allSearchFields"][] = "create_date";
$tdatapad_pad_daftar[".allSearchFields"][] = "create_uid";
$tdatapad_pad_daftar[".allSearchFields"][] = "write_date";
$tdatapad_pad_daftar[".allSearchFields"][] = "write_uid";
$tdatapad_pad_daftar[".allSearchFields"][] = "op_nm";
$tdatapad_pad_daftar[".allSearchFields"][] = "op_alamat";
$tdatapad_pad_daftar[".allSearchFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".allSearchFields"][] = "op_so";
$tdatapad_pad_daftar[".allSearchFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".allSearchFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".allSearchFields"][] = "op_latitude";
$tdatapad_pad_daftar[".allSearchFields"][] = "op_longitude";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".allSearchFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".allSearchFields"][] = "email";
$tdatapad_pad_daftar[".allSearchFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".allSearchFields"][] = "npwpd";
$tdatapad_pad_daftar[".allSearchFields"][] = "passwd";

$tdatapad_pad_daftar[".googleLikeFields"][] = "id";
$tdatapad_pad_daftar[".googleLikeFields"][] = "rp";
$tdatapad_pad_daftar[".googleLikeFields"][] = "pb";
$tdatapad_pad_daftar[".googleLikeFields"][] = "formno";
$tdatapad_pad_daftar[".googleLikeFields"][] = "reg_date";
$tdatapad_pad_daftar[".googleLikeFields"][] = "customernm";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kabupaten";
$tdatapad_pad_daftar[".googleLikeFields"][] = "alamat";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kodepos";
$tdatapad_pad_daftar[".googleLikeFields"][] = "telphone";
$tdatapad_pad_daftar[".googleLikeFields"][] = "wpnama";
$tdatapad_pad_daftar[".googleLikeFields"][] = "wpalamat";
$tdatapad_pad_daftar[".googleLikeFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".googleLikeFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".googleLikeFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".googleLikeFields"][] = "wptelp";
$tdatapad_pad_daftar[".googleLikeFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".googleLikeFields"][] = "pnama";
$tdatapad_pad_daftar[".googleLikeFields"][] = "palamat";
$tdatapad_pad_daftar[".googleLikeFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".googleLikeFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".googleLikeFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ptelp";
$tdatapad_pad_daftar[".googleLikeFields"][] = "pkodepos";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin1";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin1no";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin2";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin2no";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin3";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin3no";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin4";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin4no";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".googleLikeFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".googleLikeFields"][] = "enabled";
$tdatapad_pad_daftar[".googleLikeFields"][] = "create_date";
$tdatapad_pad_daftar[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_daftar[".googleLikeFields"][] = "write_date";
$tdatapad_pad_daftar[".googleLikeFields"][] = "write_uid";
$tdatapad_pad_daftar[".googleLikeFields"][] = "op_nm";
$tdatapad_pad_daftar[".googleLikeFields"][] = "op_alamat";
$tdatapad_pad_daftar[".googleLikeFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".googleLikeFields"][] = "op_so";
$tdatapad_pad_daftar[".googleLikeFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".googleLikeFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".googleLikeFields"][] = "op_latitude";
$tdatapad_pad_daftar[".googleLikeFields"][] = "op_longitude";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".googleLikeFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".googleLikeFields"][] = "email";
$tdatapad_pad_daftar[".googleLikeFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".googleLikeFields"][] = "npwpd";
$tdatapad_pad_daftar[".googleLikeFields"][] = "passwd";


$tdatapad_pad_daftar[".advSearchFields"][] = "id";
$tdatapad_pad_daftar[".advSearchFields"][] = "rp";
$tdatapad_pad_daftar[".advSearchFields"][] = "pb";
$tdatapad_pad_daftar[".advSearchFields"][] = "formno";
$tdatapad_pad_daftar[".advSearchFields"][] = "reg_date";
$tdatapad_pad_daftar[".advSearchFields"][] = "customernm";
$tdatapad_pad_daftar[".advSearchFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".advSearchFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".advSearchFields"][] = "kabupaten";
$tdatapad_pad_daftar[".advSearchFields"][] = "alamat";
$tdatapad_pad_daftar[".advSearchFields"][] = "kodepos";
$tdatapad_pad_daftar[".advSearchFields"][] = "telphone";
$tdatapad_pad_daftar[".advSearchFields"][] = "wpnama";
$tdatapad_pad_daftar[".advSearchFields"][] = "wpalamat";
$tdatapad_pad_daftar[".advSearchFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".advSearchFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".advSearchFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".advSearchFields"][] = "wptelp";
$tdatapad_pad_daftar[".advSearchFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".advSearchFields"][] = "pnama";
$tdatapad_pad_daftar[".advSearchFields"][] = "palamat";
$tdatapad_pad_daftar[".advSearchFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".advSearchFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".advSearchFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".advSearchFields"][] = "ptelp";
$tdatapad_pad_daftar[".advSearchFields"][] = "pkodepos";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin1";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin1no";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin2";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin2no";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin3";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin3no";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin4";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin4no";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".advSearchFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".advSearchFields"][] = "enabled";
$tdatapad_pad_daftar[".advSearchFields"][] = "create_date";
$tdatapad_pad_daftar[".advSearchFields"][] = "create_uid";
$tdatapad_pad_daftar[".advSearchFields"][] = "write_date";
$tdatapad_pad_daftar[".advSearchFields"][] = "write_uid";
$tdatapad_pad_daftar[".advSearchFields"][] = "op_nm";
$tdatapad_pad_daftar[".advSearchFields"][] = "op_alamat";
$tdatapad_pad_daftar[".advSearchFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".advSearchFields"][] = "op_so";
$tdatapad_pad_daftar[".advSearchFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".advSearchFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".advSearchFields"][] = "op_latitude";
$tdatapad_pad_daftar[".advSearchFields"][] = "op_longitude";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".advSearchFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".advSearchFields"][] = "email";
$tdatapad_pad_daftar[".advSearchFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".advSearchFields"][] = "npwpd";
$tdatapad_pad_daftar[".advSearchFields"][] = "passwd";

$tdatapad_pad_daftar[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
		


$tdatapad_pad_daftar[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_daftar[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_daftar[".orderindexes"] = array();

$tdatapad_pad_daftar[".sqlHead"] = "SELECT id,   rp,   pb,   formno,   reg_date,   customernm,   kecamatan_id,   kelurahan_id,   kabupaten,   alamat,   kodepos,   telphone,   wpnama,   wpalamat,   wpkelurahan,   wpkecamatan,   wpkabupaten,   wptelp,   wpkodepos,   pnama,   palamat,   pkelurahan,   pkecamatan,   pkabupaten,   ptelp,   pkodepos,   ijin1,   ijin1no,   ijin1tgl,   ijin1tglakhir,   ijin2,   ijin2no,   ijin2tgl,   ijin2tglakhir,   ijin3,   ijin3no,   ijin3tgl,   ijin3tglakhir,   ijin4,   ijin4no,   ijin4tgl,   ijin4tglakhir,   enabled,   create_date,   create_uid,   write_date,   write_uid,   op_nm,   op_alamat,   op_usaha_id,   op_so,   op_kecamatan_id,   op_kelurahan_id,   op_latitude,   op_longitude,   kd_restojmlmeja,   kd_restojmlkursi,   kd_restojmltamu,   kd_filmkursi,   kd_filmpertunjukan,   kd_filmtarif,   kd_bilyarmeja,   kd_bilyartarif,   kd_bilyarkegiatan,   kd_diskopengunjung,   kd_diskotarif,   kd_waletvolume,   email,   op_pajak_id,   npwpd,   passwd";
$tdatapad_pad_daftar[".sqlFrom"] = "FROM \"pad\".pad_daftar";
$tdatapad_pad_daftar[".sqlWhereExpr"] = "";
$tdatapad_pad_daftar[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_daftar[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_daftar[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_daftar = array();
$tableKeyspad_pad_daftar[] = "id";
$tdatapad_pad_daftar[".Keys"] = $tableKeyspad_pad_daftar;

$tdatapad_pad_daftar[".listFields"] = array();
$tdatapad_pad_daftar[".listFields"][] = "id";
$tdatapad_pad_daftar[".listFields"][] = "rp";
$tdatapad_pad_daftar[".listFields"][] = "pb";
$tdatapad_pad_daftar[".listFields"][] = "formno";
$tdatapad_pad_daftar[".listFields"][] = "reg_date";
$tdatapad_pad_daftar[".listFields"][] = "customernm";
$tdatapad_pad_daftar[".listFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".listFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".listFields"][] = "kabupaten";
$tdatapad_pad_daftar[".listFields"][] = "alamat";
$tdatapad_pad_daftar[".listFields"][] = "kodepos";
$tdatapad_pad_daftar[".listFields"][] = "telphone";
$tdatapad_pad_daftar[".listFields"][] = "wpnama";
$tdatapad_pad_daftar[".listFields"][] = "wpalamat";
$tdatapad_pad_daftar[".listFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".listFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".listFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".listFields"][] = "wptelp";
$tdatapad_pad_daftar[".listFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".listFields"][] = "pnama";
$tdatapad_pad_daftar[".listFields"][] = "palamat";
$tdatapad_pad_daftar[".listFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".listFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".listFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".listFields"][] = "ptelp";
$tdatapad_pad_daftar[".listFields"][] = "pkodepos";
$tdatapad_pad_daftar[".listFields"][] = "ijin1";
$tdatapad_pad_daftar[".listFields"][] = "ijin1no";
$tdatapad_pad_daftar[".listFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".listFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".listFields"][] = "ijin2";
$tdatapad_pad_daftar[".listFields"][] = "ijin2no";
$tdatapad_pad_daftar[".listFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".listFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".listFields"][] = "ijin3";
$tdatapad_pad_daftar[".listFields"][] = "ijin3no";
$tdatapad_pad_daftar[".listFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".listFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".listFields"][] = "ijin4";
$tdatapad_pad_daftar[".listFields"][] = "ijin4no";
$tdatapad_pad_daftar[".listFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".listFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".listFields"][] = "enabled";
$tdatapad_pad_daftar[".listFields"][] = "create_date";
$tdatapad_pad_daftar[".listFields"][] = "create_uid";
$tdatapad_pad_daftar[".listFields"][] = "write_date";
$tdatapad_pad_daftar[".listFields"][] = "write_uid";
$tdatapad_pad_daftar[".listFields"][] = "op_nm";
$tdatapad_pad_daftar[".listFields"][] = "op_alamat";
$tdatapad_pad_daftar[".listFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".listFields"][] = "op_so";
$tdatapad_pad_daftar[".listFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".listFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".listFields"][] = "op_latitude";
$tdatapad_pad_daftar[".listFields"][] = "op_longitude";
$tdatapad_pad_daftar[".listFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".listFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".listFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".listFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".listFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".listFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".listFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".listFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".listFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".listFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".listFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".listFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".listFields"][] = "email";
$tdatapad_pad_daftar[".listFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".listFields"][] = "npwpd";
$tdatapad_pad_daftar[".listFields"][] = "passwd";

$tdatapad_pad_daftar[".viewFields"] = array();
$tdatapad_pad_daftar[".viewFields"][] = "id";
$tdatapad_pad_daftar[".viewFields"][] = "rp";
$tdatapad_pad_daftar[".viewFields"][] = "pb";
$tdatapad_pad_daftar[".viewFields"][] = "formno";
$tdatapad_pad_daftar[".viewFields"][] = "reg_date";
$tdatapad_pad_daftar[".viewFields"][] = "customernm";
$tdatapad_pad_daftar[".viewFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".viewFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".viewFields"][] = "kabupaten";
$tdatapad_pad_daftar[".viewFields"][] = "alamat";
$tdatapad_pad_daftar[".viewFields"][] = "kodepos";
$tdatapad_pad_daftar[".viewFields"][] = "telphone";
$tdatapad_pad_daftar[".viewFields"][] = "wpnama";
$tdatapad_pad_daftar[".viewFields"][] = "wpalamat";
$tdatapad_pad_daftar[".viewFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".viewFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".viewFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".viewFields"][] = "wptelp";
$tdatapad_pad_daftar[".viewFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".viewFields"][] = "pnama";
$tdatapad_pad_daftar[".viewFields"][] = "palamat";
$tdatapad_pad_daftar[".viewFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".viewFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".viewFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".viewFields"][] = "ptelp";
$tdatapad_pad_daftar[".viewFields"][] = "pkodepos";
$tdatapad_pad_daftar[".viewFields"][] = "ijin1";
$tdatapad_pad_daftar[".viewFields"][] = "ijin1no";
$tdatapad_pad_daftar[".viewFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".viewFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".viewFields"][] = "ijin2";
$tdatapad_pad_daftar[".viewFields"][] = "ijin2no";
$tdatapad_pad_daftar[".viewFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".viewFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".viewFields"][] = "ijin3";
$tdatapad_pad_daftar[".viewFields"][] = "ijin3no";
$tdatapad_pad_daftar[".viewFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".viewFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".viewFields"][] = "ijin4";
$tdatapad_pad_daftar[".viewFields"][] = "ijin4no";
$tdatapad_pad_daftar[".viewFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".viewFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".viewFields"][] = "enabled";
$tdatapad_pad_daftar[".viewFields"][] = "create_date";
$tdatapad_pad_daftar[".viewFields"][] = "create_uid";
$tdatapad_pad_daftar[".viewFields"][] = "write_date";
$tdatapad_pad_daftar[".viewFields"][] = "write_uid";
$tdatapad_pad_daftar[".viewFields"][] = "op_nm";
$tdatapad_pad_daftar[".viewFields"][] = "op_alamat";
$tdatapad_pad_daftar[".viewFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".viewFields"][] = "op_so";
$tdatapad_pad_daftar[".viewFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".viewFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".viewFields"][] = "op_latitude";
$tdatapad_pad_daftar[".viewFields"][] = "op_longitude";
$tdatapad_pad_daftar[".viewFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".viewFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".viewFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".viewFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".viewFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".viewFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".viewFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".viewFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".viewFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".viewFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".viewFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".viewFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".viewFields"][] = "email";
$tdatapad_pad_daftar[".viewFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".viewFields"][] = "npwpd";
$tdatapad_pad_daftar[".viewFields"][] = "passwd";

$tdatapad_pad_daftar[".addFields"] = array();
$tdatapad_pad_daftar[".addFields"][] = "rp";
$tdatapad_pad_daftar[".addFields"][] = "pb";
$tdatapad_pad_daftar[".addFields"][] = "formno";
$tdatapad_pad_daftar[".addFields"][] = "reg_date";
$tdatapad_pad_daftar[".addFields"][] = "customernm";
$tdatapad_pad_daftar[".addFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".addFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".addFields"][] = "kabupaten";
$tdatapad_pad_daftar[".addFields"][] = "alamat";
$tdatapad_pad_daftar[".addFields"][] = "kodepos";
$tdatapad_pad_daftar[".addFields"][] = "telphone";
$tdatapad_pad_daftar[".addFields"][] = "wpnama";
$tdatapad_pad_daftar[".addFields"][] = "wpalamat";
$tdatapad_pad_daftar[".addFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".addFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".addFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".addFields"][] = "wptelp";
$tdatapad_pad_daftar[".addFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".addFields"][] = "pnama";
$tdatapad_pad_daftar[".addFields"][] = "palamat";
$tdatapad_pad_daftar[".addFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".addFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".addFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".addFields"][] = "ptelp";
$tdatapad_pad_daftar[".addFields"][] = "pkodepos";
$tdatapad_pad_daftar[".addFields"][] = "ijin1";
$tdatapad_pad_daftar[".addFields"][] = "ijin1no";
$tdatapad_pad_daftar[".addFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".addFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".addFields"][] = "ijin2";
$tdatapad_pad_daftar[".addFields"][] = "ijin2no";
$tdatapad_pad_daftar[".addFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".addFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".addFields"][] = "ijin3";
$tdatapad_pad_daftar[".addFields"][] = "ijin3no";
$tdatapad_pad_daftar[".addFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".addFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".addFields"][] = "ijin4";
$tdatapad_pad_daftar[".addFields"][] = "ijin4no";
$tdatapad_pad_daftar[".addFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".addFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".addFields"][] = "enabled";
$tdatapad_pad_daftar[".addFields"][] = "create_date";
$tdatapad_pad_daftar[".addFields"][] = "create_uid";
$tdatapad_pad_daftar[".addFields"][] = "write_date";
$tdatapad_pad_daftar[".addFields"][] = "write_uid";
$tdatapad_pad_daftar[".addFields"][] = "op_nm";
$tdatapad_pad_daftar[".addFields"][] = "op_alamat";
$tdatapad_pad_daftar[".addFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".addFields"][] = "op_so";
$tdatapad_pad_daftar[".addFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".addFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".addFields"][] = "op_latitude";
$tdatapad_pad_daftar[".addFields"][] = "op_longitude";
$tdatapad_pad_daftar[".addFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".addFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".addFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".addFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".addFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".addFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".addFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".addFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".addFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".addFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".addFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".addFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".addFields"][] = "email";
$tdatapad_pad_daftar[".addFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".addFields"][] = "npwpd";
$tdatapad_pad_daftar[".addFields"][] = "passwd";

$tdatapad_pad_daftar[".inlineAddFields"] = array();
$tdatapad_pad_daftar[".inlineAddFields"][] = "rp";
$tdatapad_pad_daftar[".inlineAddFields"][] = "pb";
$tdatapad_pad_daftar[".inlineAddFields"][] = "formno";
$tdatapad_pad_daftar[".inlineAddFields"][] = "reg_date";
$tdatapad_pad_daftar[".inlineAddFields"][] = "customernm";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kabupaten";
$tdatapad_pad_daftar[".inlineAddFields"][] = "alamat";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kodepos";
$tdatapad_pad_daftar[".inlineAddFields"][] = "telphone";
$tdatapad_pad_daftar[".inlineAddFields"][] = "wpnama";
$tdatapad_pad_daftar[".inlineAddFields"][] = "wpalamat";
$tdatapad_pad_daftar[".inlineAddFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".inlineAddFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".inlineAddFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".inlineAddFields"][] = "wptelp";
$tdatapad_pad_daftar[".inlineAddFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".inlineAddFields"][] = "pnama";
$tdatapad_pad_daftar[".inlineAddFields"][] = "palamat";
$tdatapad_pad_daftar[".inlineAddFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".inlineAddFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".inlineAddFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ptelp";
$tdatapad_pad_daftar[".inlineAddFields"][] = "pkodepos";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin1";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin1no";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin2";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin2no";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin3";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin3no";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin4";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin4no";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".inlineAddFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".inlineAddFields"][] = "enabled";
$tdatapad_pad_daftar[".inlineAddFields"][] = "create_date";
$tdatapad_pad_daftar[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_daftar[".inlineAddFields"][] = "write_date";
$tdatapad_pad_daftar[".inlineAddFields"][] = "write_uid";
$tdatapad_pad_daftar[".inlineAddFields"][] = "op_nm";
$tdatapad_pad_daftar[".inlineAddFields"][] = "op_alamat";
$tdatapad_pad_daftar[".inlineAddFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".inlineAddFields"][] = "op_so";
$tdatapad_pad_daftar[".inlineAddFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".inlineAddFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".inlineAddFields"][] = "op_latitude";
$tdatapad_pad_daftar[".inlineAddFields"][] = "op_longitude";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".inlineAddFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".inlineAddFields"][] = "email";
$tdatapad_pad_daftar[".inlineAddFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".inlineAddFields"][] = "npwpd";
$tdatapad_pad_daftar[".inlineAddFields"][] = "passwd";

$tdatapad_pad_daftar[".editFields"] = array();
$tdatapad_pad_daftar[".editFields"][] = "rp";
$tdatapad_pad_daftar[".editFields"][] = "pb";
$tdatapad_pad_daftar[".editFields"][] = "formno";
$tdatapad_pad_daftar[".editFields"][] = "reg_date";
$tdatapad_pad_daftar[".editFields"][] = "customernm";
$tdatapad_pad_daftar[".editFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".editFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".editFields"][] = "kabupaten";
$tdatapad_pad_daftar[".editFields"][] = "alamat";
$tdatapad_pad_daftar[".editFields"][] = "kodepos";
$tdatapad_pad_daftar[".editFields"][] = "telphone";
$tdatapad_pad_daftar[".editFields"][] = "wpnama";
$tdatapad_pad_daftar[".editFields"][] = "wpalamat";
$tdatapad_pad_daftar[".editFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".editFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".editFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".editFields"][] = "wptelp";
$tdatapad_pad_daftar[".editFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".editFields"][] = "pnama";
$tdatapad_pad_daftar[".editFields"][] = "palamat";
$tdatapad_pad_daftar[".editFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".editFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".editFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".editFields"][] = "ptelp";
$tdatapad_pad_daftar[".editFields"][] = "pkodepos";
$tdatapad_pad_daftar[".editFields"][] = "ijin1";
$tdatapad_pad_daftar[".editFields"][] = "ijin1no";
$tdatapad_pad_daftar[".editFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".editFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".editFields"][] = "ijin2";
$tdatapad_pad_daftar[".editFields"][] = "ijin2no";
$tdatapad_pad_daftar[".editFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".editFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".editFields"][] = "ijin3";
$tdatapad_pad_daftar[".editFields"][] = "ijin3no";
$tdatapad_pad_daftar[".editFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".editFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".editFields"][] = "ijin4";
$tdatapad_pad_daftar[".editFields"][] = "ijin4no";
$tdatapad_pad_daftar[".editFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".editFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".editFields"][] = "enabled";
$tdatapad_pad_daftar[".editFields"][] = "create_date";
$tdatapad_pad_daftar[".editFields"][] = "create_uid";
$tdatapad_pad_daftar[".editFields"][] = "write_date";
$tdatapad_pad_daftar[".editFields"][] = "write_uid";
$tdatapad_pad_daftar[".editFields"][] = "op_nm";
$tdatapad_pad_daftar[".editFields"][] = "op_alamat";
$tdatapad_pad_daftar[".editFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".editFields"][] = "op_so";
$tdatapad_pad_daftar[".editFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".editFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".editFields"][] = "op_latitude";
$tdatapad_pad_daftar[".editFields"][] = "op_longitude";
$tdatapad_pad_daftar[".editFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".editFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".editFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".editFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".editFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".editFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".editFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".editFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".editFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".editFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".editFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".editFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".editFields"][] = "email";
$tdatapad_pad_daftar[".editFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".editFields"][] = "npwpd";
$tdatapad_pad_daftar[".editFields"][] = "passwd";

$tdatapad_pad_daftar[".inlineEditFields"] = array();
$tdatapad_pad_daftar[".inlineEditFields"][] = "rp";
$tdatapad_pad_daftar[".inlineEditFields"][] = "pb";
$tdatapad_pad_daftar[".inlineEditFields"][] = "formno";
$tdatapad_pad_daftar[".inlineEditFields"][] = "reg_date";
$tdatapad_pad_daftar[".inlineEditFields"][] = "customernm";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kabupaten";
$tdatapad_pad_daftar[".inlineEditFields"][] = "alamat";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kodepos";
$tdatapad_pad_daftar[".inlineEditFields"][] = "telphone";
$tdatapad_pad_daftar[".inlineEditFields"][] = "wpnama";
$tdatapad_pad_daftar[".inlineEditFields"][] = "wpalamat";
$tdatapad_pad_daftar[".inlineEditFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".inlineEditFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".inlineEditFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".inlineEditFields"][] = "wptelp";
$tdatapad_pad_daftar[".inlineEditFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".inlineEditFields"][] = "pnama";
$tdatapad_pad_daftar[".inlineEditFields"][] = "palamat";
$tdatapad_pad_daftar[".inlineEditFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".inlineEditFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".inlineEditFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ptelp";
$tdatapad_pad_daftar[".inlineEditFields"][] = "pkodepos";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin1";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin1no";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin2";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin2no";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin3";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin3no";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin4";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin4no";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".inlineEditFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".inlineEditFields"][] = "enabled";
$tdatapad_pad_daftar[".inlineEditFields"][] = "create_date";
$tdatapad_pad_daftar[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_daftar[".inlineEditFields"][] = "write_date";
$tdatapad_pad_daftar[".inlineEditFields"][] = "write_uid";
$tdatapad_pad_daftar[".inlineEditFields"][] = "op_nm";
$tdatapad_pad_daftar[".inlineEditFields"][] = "op_alamat";
$tdatapad_pad_daftar[".inlineEditFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".inlineEditFields"][] = "op_so";
$tdatapad_pad_daftar[".inlineEditFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".inlineEditFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".inlineEditFields"][] = "op_latitude";
$tdatapad_pad_daftar[".inlineEditFields"][] = "op_longitude";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".inlineEditFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".inlineEditFields"][] = "email";
$tdatapad_pad_daftar[".inlineEditFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".inlineEditFields"][] = "npwpd";
$tdatapad_pad_daftar[".inlineEditFields"][] = "passwd";

$tdatapad_pad_daftar[".exportFields"] = array();
$tdatapad_pad_daftar[".exportFields"][] = "id";
$tdatapad_pad_daftar[".exportFields"][] = "rp";
$tdatapad_pad_daftar[".exportFields"][] = "pb";
$tdatapad_pad_daftar[".exportFields"][] = "formno";
$tdatapad_pad_daftar[".exportFields"][] = "reg_date";
$tdatapad_pad_daftar[".exportFields"][] = "customernm";
$tdatapad_pad_daftar[".exportFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".exportFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".exportFields"][] = "kabupaten";
$tdatapad_pad_daftar[".exportFields"][] = "alamat";
$tdatapad_pad_daftar[".exportFields"][] = "kodepos";
$tdatapad_pad_daftar[".exportFields"][] = "telphone";
$tdatapad_pad_daftar[".exportFields"][] = "wpnama";
$tdatapad_pad_daftar[".exportFields"][] = "wpalamat";
$tdatapad_pad_daftar[".exportFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".exportFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".exportFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".exportFields"][] = "wptelp";
$tdatapad_pad_daftar[".exportFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".exportFields"][] = "pnama";
$tdatapad_pad_daftar[".exportFields"][] = "palamat";
$tdatapad_pad_daftar[".exportFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".exportFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".exportFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".exportFields"][] = "ptelp";
$tdatapad_pad_daftar[".exportFields"][] = "pkodepos";
$tdatapad_pad_daftar[".exportFields"][] = "ijin1";
$tdatapad_pad_daftar[".exportFields"][] = "ijin1no";
$tdatapad_pad_daftar[".exportFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".exportFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".exportFields"][] = "ijin2";
$tdatapad_pad_daftar[".exportFields"][] = "ijin2no";
$tdatapad_pad_daftar[".exportFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".exportFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".exportFields"][] = "ijin3";
$tdatapad_pad_daftar[".exportFields"][] = "ijin3no";
$tdatapad_pad_daftar[".exportFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".exportFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".exportFields"][] = "ijin4";
$tdatapad_pad_daftar[".exportFields"][] = "ijin4no";
$tdatapad_pad_daftar[".exportFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".exportFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".exportFields"][] = "enabled";
$tdatapad_pad_daftar[".exportFields"][] = "create_date";
$tdatapad_pad_daftar[".exportFields"][] = "create_uid";
$tdatapad_pad_daftar[".exportFields"][] = "write_date";
$tdatapad_pad_daftar[".exportFields"][] = "write_uid";
$tdatapad_pad_daftar[".exportFields"][] = "op_nm";
$tdatapad_pad_daftar[".exportFields"][] = "op_alamat";
$tdatapad_pad_daftar[".exportFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".exportFields"][] = "op_so";
$tdatapad_pad_daftar[".exportFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".exportFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".exportFields"][] = "op_latitude";
$tdatapad_pad_daftar[".exportFields"][] = "op_longitude";
$tdatapad_pad_daftar[".exportFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".exportFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".exportFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".exportFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".exportFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".exportFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".exportFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".exportFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".exportFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".exportFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".exportFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".exportFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".exportFields"][] = "email";
$tdatapad_pad_daftar[".exportFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".exportFields"][] = "npwpd";
$tdatapad_pad_daftar[".exportFields"][] = "passwd";

$tdatapad_pad_daftar[".printFields"] = array();
$tdatapad_pad_daftar[".printFields"][] = "id";
$tdatapad_pad_daftar[".printFields"][] = "rp";
$tdatapad_pad_daftar[".printFields"][] = "pb";
$tdatapad_pad_daftar[".printFields"][] = "formno";
$tdatapad_pad_daftar[".printFields"][] = "reg_date";
$tdatapad_pad_daftar[".printFields"][] = "customernm";
$tdatapad_pad_daftar[".printFields"][] = "kecamatan_id";
$tdatapad_pad_daftar[".printFields"][] = "kelurahan_id";
$tdatapad_pad_daftar[".printFields"][] = "kabupaten";
$tdatapad_pad_daftar[".printFields"][] = "alamat";
$tdatapad_pad_daftar[".printFields"][] = "kodepos";
$tdatapad_pad_daftar[".printFields"][] = "telphone";
$tdatapad_pad_daftar[".printFields"][] = "wpnama";
$tdatapad_pad_daftar[".printFields"][] = "wpalamat";
$tdatapad_pad_daftar[".printFields"][] = "wpkelurahan";
$tdatapad_pad_daftar[".printFields"][] = "wpkecamatan";
$tdatapad_pad_daftar[".printFields"][] = "wpkabupaten";
$tdatapad_pad_daftar[".printFields"][] = "wptelp";
$tdatapad_pad_daftar[".printFields"][] = "wpkodepos";
$tdatapad_pad_daftar[".printFields"][] = "pnama";
$tdatapad_pad_daftar[".printFields"][] = "palamat";
$tdatapad_pad_daftar[".printFields"][] = "pkelurahan";
$tdatapad_pad_daftar[".printFields"][] = "pkecamatan";
$tdatapad_pad_daftar[".printFields"][] = "pkabupaten";
$tdatapad_pad_daftar[".printFields"][] = "ptelp";
$tdatapad_pad_daftar[".printFields"][] = "pkodepos";
$tdatapad_pad_daftar[".printFields"][] = "ijin1";
$tdatapad_pad_daftar[".printFields"][] = "ijin1no";
$tdatapad_pad_daftar[".printFields"][] = "ijin1tgl";
$tdatapad_pad_daftar[".printFields"][] = "ijin1tglakhir";
$tdatapad_pad_daftar[".printFields"][] = "ijin2";
$tdatapad_pad_daftar[".printFields"][] = "ijin2no";
$tdatapad_pad_daftar[".printFields"][] = "ijin2tgl";
$tdatapad_pad_daftar[".printFields"][] = "ijin2tglakhir";
$tdatapad_pad_daftar[".printFields"][] = "ijin3";
$tdatapad_pad_daftar[".printFields"][] = "ijin3no";
$tdatapad_pad_daftar[".printFields"][] = "ijin3tgl";
$tdatapad_pad_daftar[".printFields"][] = "ijin3tglakhir";
$tdatapad_pad_daftar[".printFields"][] = "ijin4";
$tdatapad_pad_daftar[".printFields"][] = "ijin4no";
$tdatapad_pad_daftar[".printFields"][] = "ijin4tgl";
$tdatapad_pad_daftar[".printFields"][] = "ijin4tglakhir";
$tdatapad_pad_daftar[".printFields"][] = "enabled";
$tdatapad_pad_daftar[".printFields"][] = "create_date";
$tdatapad_pad_daftar[".printFields"][] = "create_uid";
$tdatapad_pad_daftar[".printFields"][] = "write_date";
$tdatapad_pad_daftar[".printFields"][] = "write_uid";
$tdatapad_pad_daftar[".printFields"][] = "op_nm";
$tdatapad_pad_daftar[".printFields"][] = "op_alamat";
$tdatapad_pad_daftar[".printFields"][] = "op_usaha_id";
$tdatapad_pad_daftar[".printFields"][] = "op_so";
$tdatapad_pad_daftar[".printFields"][] = "op_kecamatan_id";
$tdatapad_pad_daftar[".printFields"][] = "op_kelurahan_id";
$tdatapad_pad_daftar[".printFields"][] = "op_latitude";
$tdatapad_pad_daftar[".printFields"][] = "op_longitude";
$tdatapad_pad_daftar[".printFields"][] = "kd_restojmlmeja";
$tdatapad_pad_daftar[".printFields"][] = "kd_restojmlkursi";
$tdatapad_pad_daftar[".printFields"][] = "kd_restojmltamu";
$tdatapad_pad_daftar[".printFields"][] = "kd_filmkursi";
$tdatapad_pad_daftar[".printFields"][] = "kd_filmpertunjukan";
$tdatapad_pad_daftar[".printFields"][] = "kd_filmtarif";
$tdatapad_pad_daftar[".printFields"][] = "kd_bilyarmeja";
$tdatapad_pad_daftar[".printFields"][] = "kd_bilyartarif";
$tdatapad_pad_daftar[".printFields"][] = "kd_bilyarkegiatan";
$tdatapad_pad_daftar[".printFields"][] = "kd_diskopengunjung";
$tdatapad_pad_daftar[".printFields"][] = "kd_diskotarif";
$tdatapad_pad_daftar[".printFields"][] = "kd_waletvolume";
$tdatapad_pad_daftar[".printFields"][] = "email";
$tdatapad_pad_daftar[".printFields"][] = "op_pajak_id";
$tdatapad_pad_daftar[".printFields"][] = "npwpd";
$tdatapad_pad_daftar[".printFields"][] = "passwd";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["id"] = $fdata;
//	rp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "rp";
	$fdata["GoodName"] = "rp";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["rp"] = $fdata;
//	pb
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "pb";
	$fdata["GoodName"] = "pb";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["pb"] = $fdata;
//	formno
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "formno";
	$fdata["GoodName"] = "formno";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["formno"] = $fdata;
//	reg_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "reg_date";
	$fdata["GoodName"] = "reg_date";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["reg_date"] = $fdata;
//	customernm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "customernm";
	$fdata["GoodName"] = "customernm";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Customernm"; 
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
	
		$fdata["strField"] = "customernm"; 
		$fdata["FullName"] = "customernm";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["customernm"] = $fdata;
//	kecamatan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "kecamatan_id";
	$fdata["GoodName"] = "kecamatan_id";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kecamatan_id"] = $fdata;
//	kelurahan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "kelurahan_id";
	$fdata["GoodName"] = "kelurahan_id";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kelurahan_id"] = $fdata;
//	kabupaten
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "kabupaten";
	$fdata["GoodName"] = "kabupaten";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kabupaten"] = $fdata;
//	alamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "alamat";
	$fdata["GoodName"] = "alamat";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["alamat"] = $fdata;
//	kodepos
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "kodepos";
	$fdata["GoodName"] = "kodepos";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kodepos"] = $fdata;
//	telphone
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "telphone";
	$fdata["GoodName"] = "telphone";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Telphone"; 
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
	
		
		
	$tdatapad_pad_daftar["telphone"] = $fdata;
//	wpnama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "wpnama";
	$fdata["GoodName"] = "wpnama";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar["wpnama"] = $fdata;
//	wpalamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "wpalamat";
	$fdata["GoodName"] = "wpalamat";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar["wpalamat"] = $fdata;
//	wpkelurahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "wpkelurahan";
	$fdata["GoodName"] = "wpkelurahan";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["wpkelurahan"] = $fdata;
//	wpkecamatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "wpkecamatan";
	$fdata["GoodName"] = "wpkecamatan";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["wpkecamatan"] = $fdata;
//	wpkabupaten
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "wpkabupaten";
	$fdata["GoodName"] = "wpkabupaten";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["wpkabupaten"] = $fdata;
//	wptelp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "wptelp";
	$fdata["GoodName"] = "wptelp";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
			$edata["EditParams"].= " maxlength=20";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar["wptelp"] = $fdata;
//	wpkodepos
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "wpkodepos";
	$fdata["GoodName"] = "wpkodepos";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["wpkodepos"] = $fdata;
//	pnama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "pnama";
	$fdata["GoodName"] = "pnama";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar["pnama"] = $fdata;
//	palamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "palamat";
	$fdata["GoodName"] = "palamat";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar["palamat"] = $fdata;
//	pkelurahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "pkelurahan";
	$fdata["GoodName"] = "pkelurahan";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["pkelurahan"] = $fdata;
//	pkecamatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "pkecamatan";
	$fdata["GoodName"] = "pkecamatan";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["pkecamatan"] = $fdata;
//	pkabupaten
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
	$fdata["strName"] = "pkabupaten";
	$fdata["GoodName"] = "pkabupaten";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["pkabupaten"] = $fdata;
//	ptelp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
	$fdata["strName"] = "ptelp";
	$fdata["GoodName"] = "ptelp";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
			$edata["EditParams"].= " maxlength=20";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar["ptelp"] = $fdata;
//	pkodepos
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 26;
	$fdata["strName"] = "pkodepos";
	$fdata["GoodName"] = "pkodepos";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["pkodepos"] = $fdata;
//	ijin1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 27;
	$fdata["strName"] = "ijin1";
	$fdata["GoodName"] = "ijin1";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin1"] = $fdata;
//	ijin1no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 28;
	$fdata["strName"] = "ijin1no";
	$fdata["GoodName"] = "ijin1no";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin1no"] = $fdata;
//	ijin1tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 29;
	$fdata["strName"] = "ijin1tgl";
	$fdata["GoodName"] = "ijin1tgl";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin1tgl"] = $fdata;
//	ijin1tglakhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 30;
	$fdata["strName"] = "ijin1tglakhir";
	$fdata["GoodName"] = "ijin1tglakhir";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin1tglakhir"] = $fdata;
//	ijin2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 31;
	$fdata["strName"] = "ijin2";
	$fdata["GoodName"] = "ijin2";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin2"] = $fdata;
//	ijin2no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 32;
	$fdata["strName"] = "ijin2no";
	$fdata["GoodName"] = "ijin2no";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin2no"] = $fdata;
//	ijin2tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 33;
	$fdata["strName"] = "ijin2tgl";
	$fdata["GoodName"] = "ijin2tgl";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin2tgl"] = $fdata;
//	ijin2tglakhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 34;
	$fdata["strName"] = "ijin2tglakhir";
	$fdata["GoodName"] = "ijin2tglakhir";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin2tglakhir"] = $fdata;
//	ijin3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 35;
	$fdata["strName"] = "ijin3";
	$fdata["GoodName"] = "ijin3";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin3"] = $fdata;
//	ijin3no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 36;
	$fdata["strName"] = "ijin3no";
	$fdata["GoodName"] = "ijin3no";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin3no"] = $fdata;
//	ijin3tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 37;
	$fdata["strName"] = "ijin3tgl";
	$fdata["GoodName"] = "ijin3tgl";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin3tgl"] = $fdata;
//	ijin3tglakhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 38;
	$fdata["strName"] = "ijin3tglakhir";
	$fdata["GoodName"] = "ijin3tglakhir";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin3tglakhir"] = $fdata;
//	ijin4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 39;
	$fdata["strName"] = "ijin4";
	$fdata["GoodName"] = "ijin4";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin4"] = $fdata;
//	ijin4no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 40;
	$fdata["strName"] = "ijin4no";
	$fdata["GoodName"] = "ijin4no";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin4no"] = $fdata;
//	ijin4tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 41;
	$fdata["strName"] = "ijin4tgl";
	$fdata["GoodName"] = "ijin4tgl";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin4tgl"] = $fdata;
//	ijin4tglakhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 42;
	$fdata["strName"] = "ijin4tglakhir";
	$fdata["GoodName"] = "ijin4tglakhir";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["ijin4tglakhir"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 43;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["enabled"] = $fdata;
//	create_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 44;
	$fdata["strName"] = "create_date";
	$fdata["GoodName"] = "create_date";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Create Date"; 
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
	
		$fdata["strField"] = "create_date"; 
		$fdata["FullName"] = "create_date";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["create_date"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 45;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["create_uid"] = $fdata;
//	write_date
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 46;
	$fdata["strName"] = "write_date";
	$fdata["GoodName"] = "write_date";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Write Date"; 
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
	
		$fdata["strField"] = "write_date"; 
		$fdata["FullName"] = "write_date";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["write_date"] = $fdata;
//	write_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 47;
	$fdata["strName"] = "write_uid";
	$fdata["GoodName"] = "write_uid";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Write Uid"; 
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
	
		$fdata["strField"] = "write_uid"; 
		$fdata["FullName"] = "write_uid";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["write_uid"] = $fdata;
//	op_nm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 48;
	$fdata["strName"] = "op_nm";
	$fdata["GoodName"] = "op_nm";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Op Nm"; 
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
	
		$fdata["strField"] = "op_nm"; 
		$fdata["FullName"] = "op_nm";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["op_nm"] = $fdata;
//	op_alamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 49;
	$fdata["strName"] = "op_alamat";
	$fdata["GoodName"] = "op_alamat";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Op Alamat"; 
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
	
		$fdata["strField"] = "op_alamat"; 
		$fdata["FullName"] = "op_alamat";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["op_alamat"] = $fdata;
//	op_usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 50;
	$fdata["strName"] = "op_usaha_id";
	$fdata["GoodName"] = "op_usaha_id";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Op Usaha Id"; 
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
	
		$fdata["strField"] = "op_usaha_id"; 
		$fdata["FullName"] = "op_usaha_id";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["op_usaha_id"] = $fdata;
//	op_so
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 51;
	$fdata["strName"] = "op_so";
	$fdata["GoodName"] = "op_so";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Op So"; 
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
	
		$fdata["strField"] = "op_so"; 
		$fdata["FullName"] = "op_so";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["op_so"] = $fdata;
//	op_kecamatan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 52;
	$fdata["strName"] = "op_kecamatan_id";
	$fdata["GoodName"] = "op_kecamatan_id";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Op Kecamatan Id"; 
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
	
		$fdata["strField"] = "op_kecamatan_id"; 
		$fdata["FullName"] = "op_kecamatan_id";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["op_kecamatan_id"] = $fdata;
//	op_kelurahan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 53;
	$fdata["strName"] = "op_kelurahan_id";
	$fdata["GoodName"] = "op_kelurahan_id";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Op Kelurahan Id"; 
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
	
		$fdata["strField"] = "op_kelurahan_id"; 
		$fdata["FullName"] = "op_kelurahan_id";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["op_kelurahan_id"] = $fdata;
//	op_latitude
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 54;
	$fdata["strName"] = "op_latitude";
	$fdata["GoodName"] = "op_latitude";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Op Latitude"; 
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
	
		$fdata["strField"] = "op_latitude"; 
		$fdata["FullName"] = "op_latitude";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["op_latitude"] = $fdata;
//	op_longitude
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 55;
	$fdata["strName"] = "op_longitude";
	$fdata["GoodName"] = "op_longitude";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Op Longitude"; 
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
	
		$fdata["strField"] = "op_longitude"; 
		$fdata["FullName"] = "op_longitude";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["op_longitude"] = $fdata;
//	kd_restojmlmeja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 56;
	$fdata["strName"] = "kd_restojmlmeja";
	$fdata["GoodName"] = "kd_restojmlmeja";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_restojmlmeja"] = $fdata;
//	kd_restojmlkursi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 57;
	$fdata["strName"] = "kd_restojmlkursi";
	$fdata["GoodName"] = "kd_restojmlkursi";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_restojmlkursi"] = $fdata;
//	kd_restojmltamu
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 58;
	$fdata["strName"] = "kd_restojmltamu";
	$fdata["GoodName"] = "kd_restojmltamu";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_restojmltamu"] = $fdata;
//	kd_filmkursi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 59;
	$fdata["strName"] = "kd_filmkursi";
	$fdata["GoodName"] = "kd_filmkursi";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_filmkursi"] = $fdata;
//	kd_filmpertunjukan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 60;
	$fdata["strName"] = "kd_filmpertunjukan";
	$fdata["GoodName"] = "kd_filmpertunjukan";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_filmpertunjukan"] = $fdata;
//	kd_filmtarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 61;
	$fdata["strName"] = "kd_filmtarif";
	$fdata["GoodName"] = "kd_filmtarif";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_filmtarif"] = $fdata;
//	kd_bilyarmeja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 62;
	$fdata["strName"] = "kd_bilyarmeja";
	$fdata["GoodName"] = "kd_bilyarmeja";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_bilyarmeja"] = $fdata;
//	kd_bilyartarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 63;
	$fdata["strName"] = "kd_bilyartarif";
	$fdata["GoodName"] = "kd_bilyartarif";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_bilyartarif"] = $fdata;
//	kd_bilyarkegiatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 64;
	$fdata["strName"] = "kd_bilyarkegiatan";
	$fdata["GoodName"] = "kd_bilyarkegiatan";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_bilyarkegiatan"] = $fdata;
//	kd_diskopengunjung
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 65;
	$fdata["strName"] = "kd_diskopengunjung";
	$fdata["GoodName"] = "kd_diskopengunjung";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_diskopengunjung"] = $fdata;
//	kd_diskotarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 66;
	$fdata["strName"] = "kd_diskotarif";
	$fdata["GoodName"] = "kd_diskotarif";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["kd_diskotarif"] = $fdata;
//	kd_waletvolume
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 67;
	$fdata["strName"] = "kd_waletvolume";
	$fdata["GoodName"] = "kd_waletvolume";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Kd Waletvolume"; 
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
	
		$fdata["strField"] = "kd_waletvolume"; 
		$fdata["FullName"] = "kd_waletvolume";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["kd_waletvolume"] = $fdata;
//	email
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 68;
	$fdata["strName"] = "email";
	$fdata["GoodName"] = "email";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_daftar["email"] = $fdata;
//	op_pajak_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 69;
	$fdata["strName"] = "op_pajak_id";
	$fdata["GoodName"] = "op_pajak_id";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Op Pajak Id"; 
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
	
		$fdata["strField"] = "op_pajak_id"; 
		$fdata["FullName"] = "op_pajak_id";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["op_pajak_id"] = $fdata;
//	npwpd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 70;
	$fdata["strName"] = "npwpd";
	$fdata["GoodName"] = "npwpd";
	$fdata["ownerTable"] = "pad.pad_daftar";
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
	
		
		
	$tdatapad_pad_daftar["npwpd"] = $fdata;
//	passwd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 71;
	$fdata["strName"] = "passwd";
	$fdata["GoodName"] = "passwd";
	$fdata["ownerTable"] = "pad.pad_daftar";
	$fdata["Label"] = "Passwd"; 
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
	
		$fdata["strField"] = "passwd"; 
		$fdata["FullName"] = "passwd";
	
		
		
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
	
		
		
	$tdatapad_pad_daftar["passwd"] = $fdata;

	
$tables_data["pad.pad_daftar"]=&$tdatapad_pad_daftar;
$field_labels["pad_pad_daftar"] = &$fieldLabelspad_pad_daftar;
$fieldToolTips["pad.pad_daftar"] = &$fieldToolTipspad_pad_daftar;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_daftar"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_daftar_hist";
	$detailsParam["dDataSourceTable"]="pad.pad_daftar_hist";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_daftar_hist";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_daftar"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_daftar"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_daftar"][$dIndex]["detailKeys"][]="daftar_id";

$dIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_daftar_kd_det";
	$detailsParam["dDataSourceTable"]="pad.pad_daftar_kd_det";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_daftar_kd_det";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_daftar"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_daftar"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_daftar"][$dIndex]["detailKeys"][]="daftar_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_daftar"] = array();

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
	$masterTablesData["pad.pad_daftar"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_daftar"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_daftar"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_daftar"][$mIndex]["detailKeys"][]="kecamatan_id";
		$masterTablesData["pad.pad_daftar"][$mIndex]["detailKeys"][]="op_kecamatan_id";

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
	$masterTablesData["pad.pad_daftar"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_daftar"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_daftar"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_daftar"][$mIndex]["detailKeys"][]="kelurahan_id";
		$masterTablesData["pad.pad_daftar"][$mIndex]["detailKeys"][]="op_kelurahan_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_daftar()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   rp,   pb,   formno,   reg_date,   customernm,   kecamatan_id,   kelurahan_id,   kabupaten,   alamat,   kodepos,   telphone,   wpnama,   wpalamat,   wpkelurahan,   wpkecamatan,   wpkabupaten,   wptelp,   wpkodepos,   pnama,   palamat,   pkelurahan,   pkecamatan,   pkabupaten,   ptelp,   pkodepos,   ijin1,   ijin1no,   ijin1tgl,   ijin1tglakhir,   ijin2,   ijin2no,   ijin2tgl,   ijin2tglakhir,   ijin3,   ijin3no,   ijin3tgl,   ijin3tglakhir,   ijin4,   ijin4no,   ijin4tgl,   ijin4tglakhir,   enabled,   create_date,   create_uid,   write_date,   write_uid,   op_nm,   op_alamat,   op_usaha_id,   op_so,   op_kecamatan_id,   op_kelurahan_id,   op_latitude,   op_longitude,   kd_restojmlmeja,   kd_restojmlkursi,   kd_restojmltamu,   kd_filmkursi,   kd_filmpertunjukan,   kd_filmtarif,   kd_bilyarmeja,   kd_bilyartarif,   kd_bilyarkegiatan,   kd_diskopengunjung,   kd_diskotarif,   kd_waletvolume,   email,   op_pajak_id,   npwpd,   passwd";
$proto0["m_strFrom"] = "FROM \"pad\".pad_daftar";
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
	"m_strTable" => "pad.pad_daftar"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "rp",
	"m_strTable" => "pad.pad_daftar"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "pb",
	"m_strTable" => "pad.pad_daftar"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "formno",
	"m_strTable" => "pad.pad_daftar"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "reg_date",
	"m_strTable" => "pad.pad_daftar"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "customernm",
	"m_strTable" => "pad.pad_daftar"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "kecamatan_id",
	"m_strTable" => "pad.pad_daftar"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "kelurahan_id",
	"m_strTable" => "pad.pad_daftar"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "kabupaten",
	"m_strTable" => "pad.pad_daftar"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat",
	"m_strTable" => "pad.pad_daftar"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "kodepos",
	"m_strTable" => "pad.pad_daftar"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "telphone",
	"m_strTable" => "pad.pad_daftar"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "wpnama",
	"m_strTable" => "pad.pad_daftar"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "wpalamat",
	"m_strTable" => "pad.pad_daftar"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "wpkelurahan",
	"m_strTable" => "pad.pad_daftar"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "wpkecamatan",
	"m_strTable" => "pad.pad_daftar"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "wpkabupaten",
	"m_strTable" => "pad.pad_daftar"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "wptelp",
	"m_strTable" => "pad.pad_daftar"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "wpkodepos",
	"m_strTable" => "pad.pad_daftar"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "pnama",
	"m_strTable" => "pad.pad_daftar"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "palamat",
	"m_strTable" => "pad.pad_daftar"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "pkelurahan",
	"m_strTable" => "pad.pad_daftar"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "pkecamatan",
	"m_strTable" => "pad.pad_daftar"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$obj = new SQLField(array(
	"m_strName" => "pkabupaten",
	"m_strTable" => "pad.pad_daftar"
));

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto53=array();
			$obj = new SQLField(array(
	"m_strName" => "ptelp",
	"m_strTable" => "pad.pad_daftar"
));

$proto53["m_expr"]=$obj;
$proto53["m_alias"] = "";
$obj = new SQLFieldListItem($proto53);

$proto0["m_fieldlist"][]=$obj;
						$proto55=array();
			$obj = new SQLField(array(
	"m_strName" => "pkodepos",
	"m_strTable" => "pad.pad_daftar"
));

$proto55["m_expr"]=$obj;
$proto55["m_alias"] = "";
$obj = new SQLFieldListItem($proto55);

$proto0["m_fieldlist"][]=$obj;
						$proto57=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin1",
	"m_strTable" => "pad.pad_daftar"
));

$proto57["m_expr"]=$obj;
$proto57["m_alias"] = "";
$obj = new SQLFieldListItem($proto57);

$proto0["m_fieldlist"][]=$obj;
						$proto59=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin1no",
	"m_strTable" => "pad.pad_daftar"
));

$proto59["m_expr"]=$obj;
$proto59["m_alias"] = "";
$obj = new SQLFieldListItem($proto59);

$proto0["m_fieldlist"][]=$obj;
						$proto61=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin1tgl",
	"m_strTable" => "pad.pad_daftar"
));

$proto61["m_expr"]=$obj;
$proto61["m_alias"] = "";
$obj = new SQLFieldListItem($proto61);

$proto0["m_fieldlist"][]=$obj;
						$proto63=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin1tglakhir",
	"m_strTable" => "pad.pad_daftar"
));

$proto63["m_expr"]=$obj;
$proto63["m_alias"] = "";
$obj = new SQLFieldListItem($proto63);

$proto0["m_fieldlist"][]=$obj;
						$proto65=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin2",
	"m_strTable" => "pad.pad_daftar"
));

$proto65["m_expr"]=$obj;
$proto65["m_alias"] = "";
$obj = new SQLFieldListItem($proto65);

$proto0["m_fieldlist"][]=$obj;
						$proto67=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin2no",
	"m_strTable" => "pad.pad_daftar"
));

$proto67["m_expr"]=$obj;
$proto67["m_alias"] = "";
$obj = new SQLFieldListItem($proto67);

$proto0["m_fieldlist"][]=$obj;
						$proto69=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin2tgl",
	"m_strTable" => "pad.pad_daftar"
));

$proto69["m_expr"]=$obj;
$proto69["m_alias"] = "";
$obj = new SQLFieldListItem($proto69);

$proto0["m_fieldlist"][]=$obj;
						$proto71=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin2tglakhir",
	"m_strTable" => "pad.pad_daftar"
));

$proto71["m_expr"]=$obj;
$proto71["m_alias"] = "";
$obj = new SQLFieldListItem($proto71);

$proto0["m_fieldlist"][]=$obj;
						$proto73=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin3",
	"m_strTable" => "pad.pad_daftar"
));

$proto73["m_expr"]=$obj;
$proto73["m_alias"] = "";
$obj = new SQLFieldListItem($proto73);

$proto0["m_fieldlist"][]=$obj;
						$proto75=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin3no",
	"m_strTable" => "pad.pad_daftar"
));

$proto75["m_expr"]=$obj;
$proto75["m_alias"] = "";
$obj = new SQLFieldListItem($proto75);

$proto0["m_fieldlist"][]=$obj;
						$proto77=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin3tgl",
	"m_strTable" => "pad.pad_daftar"
));

$proto77["m_expr"]=$obj;
$proto77["m_alias"] = "";
$obj = new SQLFieldListItem($proto77);

$proto0["m_fieldlist"][]=$obj;
						$proto79=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin3tglakhir",
	"m_strTable" => "pad.pad_daftar"
));

$proto79["m_expr"]=$obj;
$proto79["m_alias"] = "";
$obj = new SQLFieldListItem($proto79);

$proto0["m_fieldlist"][]=$obj;
						$proto81=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin4",
	"m_strTable" => "pad.pad_daftar"
));

$proto81["m_expr"]=$obj;
$proto81["m_alias"] = "";
$obj = new SQLFieldListItem($proto81);

$proto0["m_fieldlist"][]=$obj;
						$proto83=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin4no",
	"m_strTable" => "pad.pad_daftar"
));

$proto83["m_expr"]=$obj;
$proto83["m_alias"] = "";
$obj = new SQLFieldListItem($proto83);

$proto0["m_fieldlist"][]=$obj;
						$proto85=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin4tgl",
	"m_strTable" => "pad.pad_daftar"
));

$proto85["m_expr"]=$obj;
$proto85["m_alias"] = "";
$obj = new SQLFieldListItem($proto85);

$proto0["m_fieldlist"][]=$obj;
						$proto87=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin4tglakhir",
	"m_strTable" => "pad.pad_daftar"
));

$proto87["m_expr"]=$obj;
$proto87["m_alias"] = "";
$obj = new SQLFieldListItem($proto87);

$proto0["m_fieldlist"][]=$obj;
						$proto89=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_daftar"
));

$proto89["m_expr"]=$obj;
$proto89["m_alias"] = "";
$obj = new SQLFieldListItem($proto89);

$proto0["m_fieldlist"][]=$obj;
						$proto91=array();
			$obj = new SQLField(array(
	"m_strName" => "create_date",
	"m_strTable" => "pad.pad_daftar"
));

$proto91["m_expr"]=$obj;
$proto91["m_alias"] = "";
$obj = new SQLFieldListItem($proto91);

$proto0["m_fieldlist"][]=$obj;
						$proto93=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_daftar"
));

$proto93["m_expr"]=$obj;
$proto93["m_alias"] = "";
$obj = new SQLFieldListItem($proto93);

$proto0["m_fieldlist"][]=$obj;
						$proto95=array();
			$obj = new SQLField(array(
	"m_strName" => "write_date",
	"m_strTable" => "pad.pad_daftar"
));

$proto95["m_expr"]=$obj;
$proto95["m_alias"] = "";
$obj = new SQLFieldListItem($proto95);

$proto0["m_fieldlist"][]=$obj;
						$proto97=array();
			$obj = new SQLField(array(
	"m_strName" => "write_uid",
	"m_strTable" => "pad.pad_daftar"
));

$proto97["m_expr"]=$obj;
$proto97["m_alias"] = "";
$obj = new SQLFieldListItem($proto97);

$proto0["m_fieldlist"][]=$obj;
						$proto99=array();
			$obj = new SQLField(array(
	"m_strName" => "op_nm",
	"m_strTable" => "pad.pad_daftar"
));

$proto99["m_expr"]=$obj;
$proto99["m_alias"] = "";
$obj = new SQLFieldListItem($proto99);

$proto0["m_fieldlist"][]=$obj;
						$proto101=array();
			$obj = new SQLField(array(
	"m_strName" => "op_alamat",
	"m_strTable" => "pad.pad_daftar"
));

$proto101["m_expr"]=$obj;
$proto101["m_alias"] = "";
$obj = new SQLFieldListItem($proto101);

$proto0["m_fieldlist"][]=$obj;
						$proto103=array();
			$obj = new SQLField(array(
	"m_strName" => "op_usaha_id",
	"m_strTable" => "pad.pad_daftar"
));

$proto103["m_expr"]=$obj;
$proto103["m_alias"] = "";
$obj = new SQLFieldListItem($proto103);

$proto0["m_fieldlist"][]=$obj;
						$proto105=array();
			$obj = new SQLField(array(
	"m_strName" => "op_so",
	"m_strTable" => "pad.pad_daftar"
));

$proto105["m_expr"]=$obj;
$proto105["m_alias"] = "";
$obj = new SQLFieldListItem($proto105);

$proto0["m_fieldlist"][]=$obj;
						$proto107=array();
			$obj = new SQLField(array(
	"m_strName" => "op_kecamatan_id",
	"m_strTable" => "pad.pad_daftar"
));

$proto107["m_expr"]=$obj;
$proto107["m_alias"] = "";
$obj = new SQLFieldListItem($proto107);

$proto0["m_fieldlist"][]=$obj;
						$proto109=array();
			$obj = new SQLField(array(
	"m_strName" => "op_kelurahan_id",
	"m_strTable" => "pad.pad_daftar"
));

$proto109["m_expr"]=$obj;
$proto109["m_alias"] = "";
$obj = new SQLFieldListItem($proto109);

$proto0["m_fieldlist"][]=$obj;
						$proto111=array();
			$obj = new SQLField(array(
	"m_strName" => "op_latitude",
	"m_strTable" => "pad.pad_daftar"
));

$proto111["m_expr"]=$obj;
$proto111["m_alias"] = "";
$obj = new SQLFieldListItem($proto111);

$proto0["m_fieldlist"][]=$obj;
						$proto113=array();
			$obj = new SQLField(array(
	"m_strName" => "op_longitude",
	"m_strTable" => "pad.pad_daftar"
));

$proto113["m_expr"]=$obj;
$proto113["m_alias"] = "";
$obj = new SQLFieldListItem($proto113);

$proto0["m_fieldlist"][]=$obj;
						$proto115=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_restojmlmeja",
	"m_strTable" => "pad.pad_daftar"
));

$proto115["m_expr"]=$obj;
$proto115["m_alias"] = "";
$obj = new SQLFieldListItem($proto115);

$proto0["m_fieldlist"][]=$obj;
						$proto117=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_restojmlkursi",
	"m_strTable" => "pad.pad_daftar"
));

$proto117["m_expr"]=$obj;
$proto117["m_alias"] = "";
$obj = new SQLFieldListItem($proto117);

$proto0["m_fieldlist"][]=$obj;
						$proto119=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_restojmltamu",
	"m_strTable" => "pad.pad_daftar"
));

$proto119["m_expr"]=$obj;
$proto119["m_alias"] = "";
$obj = new SQLFieldListItem($proto119);

$proto0["m_fieldlist"][]=$obj;
						$proto121=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_filmkursi",
	"m_strTable" => "pad.pad_daftar"
));

$proto121["m_expr"]=$obj;
$proto121["m_alias"] = "";
$obj = new SQLFieldListItem($proto121);

$proto0["m_fieldlist"][]=$obj;
						$proto123=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_filmpertunjukan",
	"m_strTable" => "pad.pad_daftar"
));

$proto123["m_expr"]=$obj;
$proto123["m_alias"] = "";
$obj = new SQLFieldListItem($proto123);

$proto0["m_fieldlist"][]=$obj;
						$proto125=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_filmtarif",
	"m_strTable" => "pad.pad_daftar"
));

$proto125["m_expr"]=$obj;
$proto125["m_alias"] = "";
$obj = new SQLFieldListItem($proto125);

$proto0["m_fieldlist"][]=$obj;
						$proto127=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_bilyarmeja",
	"m_strTable" => "pad.pad_daftar"
));

$proto127["m_expr"]=$obj;
$proto127["m_alias"] = "";
$obj = new SQLFieldListItem($proto127);

$proto0["m_fieldlist"][]=$obj;
						$proto129=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_bilyartarif",
	"m_strTable" => "pad.pad_daftar"
));

$proto129["m_expr"]=$obj;
$proto129["m_alias"] = "";
$obj = new SQLFieldListItem($proto129);

$proto0["m_fieldlist"][]=$obj;
						$proto131=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_bilyarkegiatan",
	"m_strTable" => "pad.pad_daftar"
));

$proto131["m_expr"]=$obj;
$proto131["m_alias"] = "";
$obj = new SQLFieldListItem($proto131);

$proto0["m_fieldlist"][]=$obj;
						$proto133=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_diskopengunjung",
	"m_strTable" => "pad.pad_daftar"
));

$proto133["m_expr"]=$obj;
$proto133["m_alias"] = "";
$obj = new SQLFieldListItem($proto133);

$proto0["m_fieldlist"][]=$obj;
						$proto135=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_diskotarif",
	"m_strTable" => "pad.pad_daftar"
));

$proto135["m_expr"]=$obj;
$proto135["m_alias"] = "";
$obj = new SQLFieldListItem($proto135);

$proto0["m_fieldlist"][]=$obj;
						$proto137=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_waletvolume",
	"m_strTable" => "pad.pad_daftar"
));

$proto137["m_expr"]=$obj;
$proto137["m_alias"] = "";
$obj = new SQLFieldListItem($proto137);

$proto0["m_fieldlist"][]=$obj;
						$proto139=array();
			$obj = new SQLField(array(
	"m_strName" => "email",
	"m_strTable" => "pad.pad_daftar"
));

$proto139["m_expr"]=$obj;
$proto139["m_alias"] = "";
$obj = new SQLFieldListItem($proto139);

$proto0["m_fieldlist"][]=$obj;
						$proto141=array();
			$obj = new SQLField(array(
	"m_strName" => "op_pajak_id",
	"m_strTable" => "pad.pad_daftar"
));

$proto141["m_expr"]=$obj;
$proto141["m_alias"] = "";
$obj = new SQLFieldListItem($proto141);

$proto0["m_fieldlist"][]=$obj;
						$proto143=array();
			$obj = new SQLField(array(
	"m_strName" => "npwpd",
	"m_strTable" => "pad.pad_daftar"
));

$proto143["m_expr"]=$obj;
$proto143["m_alias"] = "";
$obj = new SQLFieldListItem($proto143);

$proto0["m_fieldlist"][]=$obj;
						$proto145=array();
			$obj = new SQLField(array(
	"m_strName" => "passwd",
	"m_strTable" => "pad.pad_daftar"
));

$proto145["m_expr"]=$obj;
$proto145["m_alias"] = "";
$obj = new SQLFieldListItem($proto145);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto147=array();
$proto147["m_link"] = "SQLL_MAIN";
			$proto148=array();
$proto148["m_strName"] = "pad.pad_daftar";
$proto148["m_columns"] = array();
$proto148["m_columns"][] = "id";
$proto148["m_columns"][] = "rp";
$proto148["m_columns"][] = "pb";
$proto148["m_columns"][] = "formno";
$proto148["m_columns"][] = "reg_date";
$proto148["m_columns"][] = "customernm";
$proto148["m_columns"][] = "kecamatan_id";
$proto148["m_columns"][] = "kelurahan_id";
$proto148["m_columns"][] = "kabupaten";
$proto148["m_columns"][] = "alamat";
$proto148["m_columns"][] = "kodepos";
$proto148["m_columns"][] = "telphone";
$proto148["m_columns"][] = "wpnama";
$proto148["m_columns"][] = "wpalamat";
$proto148["m_columns"][] = "wpkelurahan";
$proto148["m_columns"][] = "wpkecamatan";
$proto148["m_columns"][] = "wpkabupaten";
$proto148["m_columns"][] = "wptelp";
$proto148["m_columns"][] = "wpkodepos";
$proto148["m_columns"][] = "pnama";
$proto148["m_columns"][] = "palamat";
$proto148["m_columns"][] = "pkelurahan";
$proto148["m_columns"][] = "pkecamatan";
$proto148["m_columns"][] = "pkabupaten";
$proto148["m_columns"][] = "ptelp";
$proto148["m_columns"][] = "pkodepos";
$proto148["m_columns"][] = "ijin1";
$proto148["m_columns"][] = "ijin1no";
$proto148["m_columns"][] = "ijin1tgl";
$proto148["m_columns"][] = "ijin1tglakhir";
$proto148["m_columns"][] = "ijin2";
$proto148["m_columns"][] = "ijin2no";
$proto148["m_columns"][] = "ijin2tgl";
$proto148["m_columns"][] = "ijin2tglakhir";
$proto148["m_columns"][] = "ijin3";
$proto148["m_columns"][] = "ijin3no";
$proto148["m_columns"][] = "ijin3tgl";
$proto148["m_columns"][] = "ijin3tglakhir";
$proto148["m_columns"][] = "ijin4";
$proto148["m_columns"][] = "ijin4no";
$proto148["m_columns"][] = "ijin4tgl";
$proto148["m_columns"][] = "ijin4tglakhir";
$proto148["m_columns"][] = "enabled";
$proto148["m_columns"][] = "create_date";
$proto148["m_columns"][] = "create_uid";
$proto148["m_columns"][] = "write_date";
$proto148["m_columns"][] = "write_uid";
$proto148["m_columns"][] = "op_nm";
$proto148["m_columns"][] = "op_alamat";
$proto148["m_columns"][] = "op_usaha_id";
$proto148["m_columns"][] = "op_so";
$proto148["m_columns"][] = "op_kecamatan_id";
$proto148["m_columns"][] = "op_kelurahan_id";
$proto148["m_columns"][] = "op_latitude";
$proto148["m_columns"][] = "op_longitude";
$proto148["m_columns"][] = "kd_restojmlmeja";
$proto148["m_columns"][] = "kd_restojmlkursi";
$proto148["m_columns"][] = "kd_restojmltamu";
$proto148["m_columns"][] = "kd_filmkursi";
$proto148["m_columns"][] = "kd_filmpertunjukan";
$proto148["m_columns"][] = "kd_filmtarif";
$proto148["m_columns"][] = "kd_bilyarmeja";
$proto148["m_columns"][] = "kd_bilyartarif";
$proto148["m_columns"][] = "kd_bilyarkegiatan";
$proto148["m_columns"][] = "kd_diskopengunjung";
$proto148["m_columns"][] = "kd_diskotarif";
$proto148["m_columns"][] = "kd_waletvolume";
$proto148["m_columns"][] = "email";
$proto148["m_columns"][] = "op_pajak_id";
$proto148["m_columns"][] = "npwpd";
$proto148["m_columns"][] = "passwd";
$obj = new SQLTable($proto148);

$proto147["m_table"] = $obj;
$proto147["m_alias"] = "";
$proto149=array();
$proto149["m_sql"] = "";
$proto149["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto149["m_column"]=$obj;
$proto149["m_contained"] = array();
$proto149["m_strCase"] = "";
$proto149["m_havingmode"] = "0";
$proto149["m_inBrackets"] = "0";
$proto149["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto149);

$proto147["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto147);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_daftar = createSqlQuery_pad_pad_daftar();
																																																																							$tdatapad_pad_daftar[".sqlquery"] = $queryData_pad_pad_daftar;
	
if(isset($tdatapad_pad_daftar["field2"])){
	$tdatapad_pad_daftar["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_daftar["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_daftar["field2"]["LookupType"] = 4;
	$tdatapad_pad_daftar["field2"]["LinkField"] = "email";
	$tdatapad_pad_daftar["field2"]["DisplayField"] = "name";
	$tdatapad_pad_daftar[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_daftar"] = new eventsBase;
$tdatapad_pad_daftar[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_daftar");

?>