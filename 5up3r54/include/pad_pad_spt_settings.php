<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_spt = array();
	$tdatapad_pad_spt[".NumberOfChars"] = 80; 
	$tdatapad_pad_spt[".ShortName"] = "pad_pad_spt";
	$tdatapad_pad_spt[".OwnerID"] = "";
	$tdatapad_pad_spt[".OriginalTable"] = "pad.pad_spt";

//	field labels
$fieldLabelspad_pad_spt = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_spt["English"] = array();
	$fieldToolTipspad_pad_spt["English"] = array();
	$fieldLabelspad_pad_spt["English"]["id"] = "Id";
	$fieldToolTipspad_pad_spt["English"]["id"] = "";
	$fieldLabelspad_pad_spt["English"]["tahun"] = "Tahun";
	$fieldToolTipspad_pad_spt["English"]["tahun"] = "";
	$fieldLabelspad_pad_spt["English"]["sptno"] = "Sptno";
	$fieldToolTipspad_pad_spt["English"]["sptno"] = "";
	$fieldLabelspad_pad_spt["English"]["customer_id"] = "Customer Id";
	$fieldToolTipspad_pad_spt["English"]["customer_id"] = "";
	$fieldLabelspad_pad_spt["English"]["customer_usaha_id"] = "Customer Usaha Id";
	$fieldToolTipspad_pad_spt["English"]["customer_usaha_id"] = "";
	$fieldLabelspad_pad_spt["English"]["rekening_id"] = "Rekening Id";
	$fieldToolTipspad_pad_spt["English"]["rekening_id"] = "";
	$fieldLabelspad_pad_spt["English"]["pajak_id"] = "Pajak Id";
	$fieldToolTipspad_pad_spt["English"]["pajak_id"] = "";
	$fieldLabelspad_pad_spt["English"]["type_id"] = "Type Id";
	$fieldToolTipspad_pad_spt["English"]["type_id"] = "";
	$fieldLabelspad_pad_spt["English"]["so"] = "So";
	$fieldToolTipspad_pad_spt["English"]["so"] = "";
	$fieldLabelspad_pad_spt["English"]["masadari"] = "Masadari";
	$fieldToolTipspad_pad_spt["English"]["masadari"] = "";
	$fieldLabelspad_pad_spt["English"]["masasd"] = "Masasd";
	$fieldToolTipspad_pad_spt["English"]["masasd"] = "";
	$fieldLabelspad_pad_spt["English"]["jatuhtempotgl"] = "Jatuhtempotgl";
	$fieldToolTipspad_pad_spt["English"]["jatuhtempotgl"] = "";
	$fieldLabelspad_pad_spt["English"]["r_bayarid"] = "R Bayarid";
	$fieldToolTipspad_pad_spt["English"]["r_bayarid"] = "";
	$fieldLabelspad_pad_spt["English"]["minimal_omset"] = "Minimal Omset";
	$fieldToolTipspad_pad_spt["English"]["minimal_omset"] = "";
	$fieldLabelspad_pad_spt["English"]["dasar"] = "Dasar";
	$fieldToolTipspad_pad_spt["English"]["dasar"] = "";
	$fieldLabelspad_pad_spt["English"]["tarif"] = "Tarif";
	$fieldToolTipspad_pad_spt["English"]["tarif"] = "";
	$fieldLabelspad_pad_spt["English"]["denda"] = "Denda";
	$fieldToolTipspad_pad_spt["English"]["denda"] = "";
	$fieldLabelspad_pad_spt["English"]["bunga"] = "Bunga";
	$fieldToolTipspad_pad_spt["English"]["bunga"] = "";
	$fieldLabelspad_pad_spt["English"]["setoran"] = "Setoran";
	$fieldToolTipspad_pad_spt["English"]["setoran"] = "";
	$fieldLabelspad_pad_spt["English"]["kenaikan"] = "Kenaikan";
	$fieldToolTipspad_pad_spt["English"]["kenaikan"] = "";
	$fieldLabelspad_pad_spt["English"]["kompensasi"] = "Kompensasi";
	$fieldToolTipspad_pad_spt["English"]["kompensasi"] = "";
	$fieldLabelspad_pad_spt["English"]["lain2"] = "Lain2";
	$fieldToolTipspad_pad_spt["English"]["lain2"] = "";
	$fieldLabelspad_pad_spt["English"]["pajak_terhutang"] = "Pajak Terhutang";
	$fieldToolTipspad_pad_spt["English"]["pajak_terhutang"] = "";
	$fieldLabelspad_pad_spt["English"]["air_manfaat_id"] = "Air Manfaat Id";
	$fieldToolTipspad_pad_spt["English"]["air_manfaat_id"] = "";
	$fieldLabelspad_pad_spt["English"]["air_zona_id"] = "Air Zona Id";
	$fieldToolTipspad_pad_spt["English"]["air_zona_id"] = "";
	$fieldLabelspad_pad_spt["English"]["meteran_awal"] = "Meteran Awal";
	$fieldToolTipspad_pad_spt["English"]["meteran_awal"] = "";
	$fieldLabelspad_pad_spt["English"]["meteran_akhir"] = "Meteran Akhir";
	$fieldToolTipspad_pad_spt["English"]["meteran_akhir"] = "";
	$fieldLabelspad_pad_spt["English"]["volume"] = "Volume";
	$fieldToolTipspad_pad_spt["English"]["volume"] = "";
	$fieldLabelspad_pad_spt["English"]["satuan"] = "Satuan";
	$fieldToolTipspad_pad_spt["English"]["satuan"] = "";
	$fieldLabelspad_pad_spt["English"]["r_panjang"] = "R Panjang";
	$fieldToolTipspad_pad_spt["English"]["r_panjang"] = "";
	$fieldLabelspad_pad_spt["English"]["r_lebar"] = "R Lebar";
	$fieldToolTipspad_pad_spt["English"]["r_lebar"] = "";
	$fieldLabelspad_pad_spt["English"]["r_muka"] = "R Muka";
	$fieldToolTipspad_pad_spt["English"]["r_muka"] = "";
	$fieldLabelspad_pad_spt["English"]["r_banyak"] = "R Banyak";
	$fieldToolTipspad_pad_spt["English"]["r_banyak"] = "";
	$fieldLabelspad_pad_spt["English"]["r_luas"] = "R Luas";
	$fieldToolTipspad_pad_spt["English"]["r_luas"] = "";
	$fieldLabelspad_pad_spt["English"]["r_tarifid"] = "R Tarifid";
	$fieldToolTipspad_pad_spt["English"]["r_tarifid"] = "";
	$fieldLabelspad_pad_spt["English"]["r_kontrak"] = "R Kontrak";
	$fieldToolTipspad_pad_spt["English"]["r_kontrak"] = "";
	$fieldLabelspad_pad_spt["English"]["r_lama"] = "R Lama";
	$fieldToolTipspad_pad_spt["English"]["r_lama"] = "";
	$fieldLabelspad_pad_spt["English"]["r_jalan_id"] = "R Jalan Id";
	$fieldToolTipspad_pad_spt["English"]["r_jalan_id"] = "";
	$fieldLabelspad_pad_spt["English"]["r_jalanklas_id"] = "R Jalanklas Id";
	$fieldToolTipspad_pad_spt["English"]["r_jalanklas_id"] = "";
	$fieldLabelspad_pad_spt["English"]["r_lokasi"] = "R Lokasi";
	$fieldToolTipspad_pad_spt["English"]["r_lokasi"] = "";
	$fieldLabelspad_pad_spt["English"]["r_judul"] = "R Judul";
	$fieldToolTipspad_pad_spt["English"]["r_judul"] = "";
	$fieldLabelspad_pad_spt["English"]["r_kelurahan_id"] = "R Kelurahan Id";
	$fieldToolTipspad_pad_spt["English"]["r_kelurahan_id"] = "";
	$fieldLabelspad_pad_spt["English"]["r_lokasi_id"] = "R Lokasi Id";
	$fieldToolTipspad_pad_spt["English"]["r_lokasi_id"] = "";
	$fieldLabelspad_pad_spt["English"]["r_calculated"] = "R Calculated";
	$fieldToolTipspad_pad_spt["English"]["r_calculated"] = "";
	$fieldLabelspad_pad_spt["English"]["r_nsr"] = "R Nsr";
	$fieldToolTipspad_pad_spt["English"]["r_nsr"] = "";
	$fieldLabelspad_pad_spt["English"]["r_nsrno"] = "R Nsrno";
	$fieldToolTipspad_pad_spt["English"]["r_nsrno"] = "";
	$fieldLabelspad_pad_spt["English"]["r_nsrtgl"] = "R Nsrtgl";
	$fieldToolTipspad_pad_spt["English"]["r_nsrtgl"] = "";
	$fieldLabelspad_pad_spt["English"]["r_nsl_kecamatan_id"] = "R Nsl Kecamatan Id";
	$fieldToolTipspad_pad_spt["English"]["r_nsl_kecamatan_id"] = "";
	$fieldLabelspad_pad_spt["English"]["r_nsl_type_id"] = "R Nsl Type Id";
	$fieldToolTipspad_pad_spt["English"]["r_nsl_type_id"] = "";
	$fieldLabelspad_pad_spt["English"]["r_nsl_nilai"] = "R Nsl Nilai";
	$fieldToolTipspad_pad_spt["English"]["r_nsl_nilai"] = "";
	$fieldLabelspad_pad_spt["English"]["notes"] = "Notes";
	$fieldToolTipspad_pad_spt["English"]["notes"] = "";
	$fieldLabelspad_pad_spt["English"]["unit_id"] = "Unit Id";
	$fieldToolTipspad_pad_spt["English"]["unit_id"] = "";
	$fieldLabelspad_pad_spt["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_spt["English"]["enabled"] = "";
	$fieldLabelspad_pad_spt["English"]["created"] = "Created";
	$fieldToolTipspad_pad_spt["English"]["created"] = "";
	$fieldLabelspad_pad_spt["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_spt["English"]["create_uid"] = "";
	$fieldLabelspad_pad_spt["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_spt["English"]["updated"] = "";
	$fieldLabelspad_pad_spt["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_spt["English"]["update_uid"] = "";
	$fieldLabelspad_pad_spt["English"]["terimanip"] = "Terimanip";
	$fieldToolTipspad_pad_spt["English"]["terimanip"] = "";
	$fieldLabelspad_pad_spt["English"]["terimatgl"] = "Terimatgl";
	$fieldToolTipspad_pad_spt["English"]["terimatgl"] = "";
	$fieldLabelspad_pad_spt["English"]["kirimtgl"] = "Kirimtgl";
	$fieldToolTipspad_pad_spt["English"]["kirimtgl"] = "";
	$fieldLabelspad_pad_spt["English"]["isprint_dc"] = "Isprint Dc";
	$fieldToolTipspad_pad_spt["English"]["isprint_dc"] = "";
	$fieldLabelspad_pad_spt["English"]["r_nsr_id"] = "R Nsr Id";
	$fieldToolTipspad_pad_spt["English"]["r_nsr_id"] = "";
	$fieldLabelspad_pad_spt["English"]["r_lokasi_pasang_id"] = "R Lokasi Pasang Id";
	$fieldToolTipspad_pad_spt["English"]["r_lokasi_pasang_id"] = "";
	$fieldLabelspad_pad_spt["English"]["r_lokasi_pasang_val"] = "R Lokasi Pasang Val";
	$fieldToolTipspad_pad_spt["English"]["r_lokasi_pasang_val"] = "";
	$fieldLabelspad_pad_spt["English"]["r_jalanklas_val"] = "R Jalanklas Val";
	$fieldToolTipspad_pad_spt["English"]["r_jalanklas_val"] = "";
	$fieldLabelspad_pad_spt["English"]["r_sudut_pandang_id"] = "R Sudut Pandang Id";
	$fieldToolTipspad_pad_spt["English"]["r_sudut_pandang_id"] = "";
	$fieldLabelspad_pad_spt["English"]["r_sudut_pandang_val"] = "R Sudut Pandang Val";
	$fieldToolTipspad_pad_spt["English"]["r_sudut_pandang_val"] = "";
	$fieldLabelspad_pad_spt["English"]["r_tinggi"] = "R Tinggi";
	$fieldToolTipspad_pad_spt["English"]["r_tinggi"] = "";
	$fieldLabelspad_pad_spt["English"]["r_njop"] = "R Njop";
	$fieldToolTipspad_pad_spt["English"]["r_njop"] = "";
	$fieldLabelspad_pad_spt["English"]["r_status"] = "R Status";
	$fieldToolTipspad_pad_spt["English"]["r_status"] = "";
	$fieldLabelspad_pad_spt["English"]["r_njop_ketinggian"] = "R Njop Ketinggian";
	$fieldToolTipspad_pad_spt["English"]["r_njop_ketinggian"] = "";
	$fieldLabelspad_pad_spt["English"]["status_pembayaran"] = "Status Pembayaran";
	$fieldToolTipspad_pad_spt["English"]["status_pembayaran"] = "";
	$fieldLabelspad_pad_spt["English"]["rek_no_paneng"] = "Rek No Paneng";
	$fieldToolTipspad_pad_spt["English"]["rek_no_paneng"] = "";
	$fieldLabelspad_pad_spt["English"]["sptno_lengkap"] = "Sptno Lengkap";
	$fieldToolTipspad_pad_spt["English"]["sptno_lengkap"] = "";
	$fieldLabelspad_pad_spt["English"]["sptno_lama"] = "Sptno Lama";
	$fieldToolTipspad_pad_spt["English"]["sptno_lama"] = "";
	$fieldLabelspad_pad_spt["English"]["r_nama"] = "R Nama";
	$fieldToolTipspad_pad_spt["English"]["r_nama"] = "";
	$fieldLabelspad_pad_spt["English"]["r_alamat"] = "R Alamat";
	$fieldToolTipspad_pad_spt["English"]["r_alamat"] = "";
	$fieldLabelspad_pad_spt["English"]["omset1"] = "Omset1";
	$fieldToolTipspad_pad_spt["English"]["omset1"] = "";
	$fieldLabelspad_pad_spt["English"]["omset2"] = "Omset2";
	$fieldToolTipspad_pad_spt["English"]["omset2"] = "";
	$fieldLabelspad_pad_spt["English"]["omset3"] = "Omset3";
	$fieldToolTipspad_pad_spt["English"]["omset3"] = "";
	$fieldLabelspad_pad_spt["English"]["omset4"] = "Omset4";
	$fieldToolTipspad_pad_spt["English"]["omset4"] = "";
	$fieldLabelspad_pad_spt["English"]["omset5"] = "Omset5";
	$fieldToolTipspad_pad_spt["English"]["omset5"] = "";
	$fieldLabelspad_pad_spt["English"]["omset6"] = "Omset6";
	$fieldToolTipspad_pad_spt["English"]["omset6"] = "";
	$fieldLabelspad_pad_spt["English"]["omset7"] = "Omset7";
	$fieldToolTipspad_pad_spt["English"]["omset7"] = "";
	$fieldLabelspad_pad_spt["English"]["omset8"] = "Omset8";
	$fieldToolTipspad_pad_spt["English"]["omset8"] = "";
	$fieldLabelspad_pad_spt["English"]["omset9"] = "Omset9";
	$fieldToolTipspad_pad_spt["English"]["omset9"] = "";
	$fieldLabelspad_pad_spt["English"]["omset10"] = "Omset10";
	$fieldToolTipspad_pad_spt["English"]["omset10"] = "";
	$fieldLabelspad_pad_spt["English"]["omset11"] = "Omset11";
	$fieldToolTipspad_pad_spt["English"]["omset11"] = "";
	$fieldLabelspad_pad_spt["English"]["omset12"] = "Omset12";
	$fieldToolTipspad_pad_spt["English"]["omset12"] = "";
	$fieldLabelspad_pad_spt["English"]["omset13"] = "Omset13";
	$fieldToolTipspad_pad_spt["English"]["omset13"] = "";
	$fieldLabelspad_pad_spt["English"]["omset14"] = "Omset14";
	$fieldToolTipspad_pad_spt["English"]["omset14"] = "";
	$fieldLabelspad_pad_spt["English"]["omset15"] = "Omset15";
	$fieldToolTipspad_pad_spt["English"]["omset15"] = "";
	$fieldLabelspad_pad_spt["English"]["omset16"] = "Omset16";
	$fieldToolTipspad_pad_spt["English"]["omset16"] = "";
	$fieldLabelspad_pad_spt["English"]["omset17"] = "Omset17";
	$fieldToolTipspad_pad_spt["English"]["omset17"] = "";
	$fieldLabelspad_pad_spt["English"]["omset18"] = "Omset18";
	$fieldToolTipspad_pad_spt["English"]["omset18"] = "";
	$fieldLabelspad_pad_spt["English"]["omset19"] = "Omset19";
	$fieldToolTipspad_pad_spt["English"]["omset19"] = "";
	$fieldLabelspad_pad_spt["English"]["omset20"] = "Omset20";
	$fieldToolTipspad_pad_spt["English"]["omset20"] = "";
	$fieldLabelspad_pad_spt["English"]["omset21"] = "Omset21";
	$fieldToolTipspad_pad_spt["English"]["omset21"] = "";
	$fieldLabelspad_pad_spt["English"]["omset22"] = "Omset22";
	$fieldToolTipspad_pad_spt["English"]["omset22"] = "";
	$fieldLabelspad_pad_spt["English"]["omset23"] = "Omset23";
	$fieldToolTipspad_pad_spt["English"]["omset23"] = "";
	$fieldLabelspad_pad_spt["English"]["omset24"] = "Omset24";
	$fieldToolTipspad_pad_spt["English"]["omset24"] = "";
	$fieldLabelspad_pad_spt["English"]["omset25"] = "Omset25";
	$fieldToolTipspad_pad_spt["English"]["omset25"] = "";
	$fieldLabelspad_pad_spt["English"]["omset26"] = "Omset26";
	$fieldToolTipspad_pad_spt["English"]["omset26"] = "";
	$fieldLabelspad_pad_spt["English"]["omset27"] = "Omset27";
	$fieldToolTipspad_pad_spt["English"]["omset27"] = "";
	$fieldLabelspad_pad_spt["English"]["omset28"] = "Omset28";
	$fieldToolTipspad_pad_spt["English"]["omset28"] = "";
	$fieldLabelspad_pad_spt["English"]["omset29"] = "Omset29";
	$fieldToolTipspad_pad_spt["English"]["omset29"] = "";
	$fieldLabelspad_pad_spt["English"]["omset30"] = "Omset30";
	$fieldToolTipspad_pad_spt["English"]["omset30"] = "";
	$fieldLabelspad_pad_spt["English"]["omset31"] = "Omset31";
	$fieldToolTipspad_pad_spt["English"]["omset31"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan1"] = "Keterangan1";
	$fieldToolTipspad_pad_spt["English"]["keterangan1"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan2"] = "Keterangan2";
	$fieldToolTipspad_pad_spt["English"]["keterangan2"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan3"] = "Keterangan3";
	$fieldToolTipspad_pad_spt["English"]["keterangan3"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan4"] = "Keterangan4";
	$fieldToolTipspad_pad_spt["English"]["keterangan4"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan5"] = "Keterangan5";
	$fieldToolTipspad_pad_spt["English"]["keterangan5"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan6"] = "Keterangan6";
	$fieldToolTipspad_pad_spt["English"]["keterangan6"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan7"] = "Keterangan7";
	$fieldToolTipspad_pad_spt["English"]["keterangan7"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan8"] = "Keterangan8";
	$fieldToolTipspad_pad_spt["English"]["keterangan8"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan9"] = "Keterangan9";
	$fieldToolTipspad_pad_spt["English"]["keterangan9"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan10"] = "Keterangan10";
	$fieldToolTipspad_pad_spt["English"]["keterangan10"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan11"] = "Keterangan11";
	$fieldToolTipspad_pad_spt["English"]["keterangan11"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan12"] = "Keterangan12";
	$fieldToolTipspad_pad_spt["English"]["keterangan12"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan13"] = "Keterangan13";
	$fieldToolTipspad_pad_spt["English"]["keterangan13"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan14"] = "Keterangan14";
	$fieldToolTipspad_pad_spt["English"]["keterangan14"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan15"] = "Keterangan15";
	$fieldToolTipspad_pad_spt["English"]["keterangan15"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan16"] = "Keterangan16";
	$fieldToolTipspad_pad_spt["English"]["keterangan16"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan17"] = "Keterangan17";
	$fieldToolTipspad_pad_spt["English"]["keterangan17"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan18"] = "Keterangan18";
	$fieldToolTipspad_pad_spt["English"]["keterangan18"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan19"] = "Keterangan19";
	$fieldToolTipspad_pad_spt["English"]["keterangan19"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan20"] = "Keterangan20";
	$fieldToolTipspad_pad_spt["English"]["keterangan20"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan21"] = "Keterangan21";
	$fieldToolTipspad_pad_spt["English"]["keterangan21"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan22"] = "Keterangan22";
	$fieldToolTipspad_pad_spt["English"]["keterangan22"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan23"] = "Keterangan23";
	$fieldToolTipspad_pad_spt["English"]["keterangan23"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan24"] = "Keterangan24";
	$fieldToolTipspad_pad_spt["English"]["keterangan24"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan25"] = "Keterangan25";
	$fieldToolTipspad_pad_spt["English"]["keterangan25"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan26"] = "Keterangan26";
	$fieldToolTipspad_pad_spt["English"]["keterangan26"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan27"] = "Keterangan27";
	$fieldToolTipspad_pad_spt["English"]["keterangan27"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan28"] = "Keterangan28";
	$fieldToolTipspad_pad_spt["English"]["keterangan28"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan29"] = "Keterangan29";
	$fieldToolTipspad_pad_spt["English"]["keterangan29"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan30"] = "Keterangan30";
	$fieldToolTipspad_pad_spt["English"]["keterangan30"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan31"] = "Keterangan31";
	$fieldToolTipspad_pad_spt["English"]["keterangan31"] = "";
	$fieldLabelspad_pad_spt["English"]["doc_no"] = "Doc No";
	$fieldToolTipspad_pad_spt["English"]["doc_no"] = "";
	$fieldLabelspad_pad_spt["English"]["cara_bayar"] = "Cara Bayar";
	$fieldToolTipspad_pad_spt["English"]["cara_bayar"] = "";
	$fieldLabelspad_pad_spt["English"]["kelompok_usaha_id"] = "Kelompok Usaha Id";
	$fieldToolTipspad_pad_spt["English"]["kelompok_usaha_id"] = "";
	$fieldLabelspad_pad_spt["English"]["zona_id"] = "Zona Id";
	$fieldToolTipspad_pad_spt["English"]["zona_id"] = "";
	$fieldLabelspad_pad_spt["English"]["manfaat_id"] = "Manfaat Id";
	$fieldToolTipspad_pad_spt["English"]["manfaat_id"] = "";
	$fieldLabelspad_pad_spt["English"]["golongan"] = "Golongan";
	$fieldToolTipspad_pad_spt["English"]["golongan"] = "";
	$fieldLabelspad_pad_spt["English"]["omset_lain"] = "Omset Lain";
	$fieldToolTipspad_pad_spt["English"]["omset_lain"] = "";
	$fieldLabelspad_pad_spt["English"]["keterangan_lain"] = "Keterangan Lain";
	$fieldToolTipspad_pad_spt["English"]["keterangan_lain"] = "";
	$fieldLabelspad_pad_spt["English"]["ijin_no"] = "Ijin No";
	$fieldToolTipspad_pad_spt["English"]["ijin_no"] = "";
	$fieldLabelspad_pad_spt["English"]["jenis_masa"] = "Jenis Masa";
	$fieldToolTipspad_pad_spt["English"]["jenis_masa"] = "";
	$fieldLabelspad_pad_spt["English"]["skpd_lama"] = "Skpd Lama";
	$fieldToolTipspad_pad_spt["English"]["skpd_lama"] = "";
	$fieldLabelspad_pad_spt["English"]["proses"] = "Proses";
	$fieldToolTipspad_pad_spt["English"]["proses"] = "";
	$fieldLabelspad_pad_spt["English"]["tanggal_validasi"] = "Tanggal Validasi";
	$fieldToolTipspad_pad_spt["English"]["tanggal_validasi"] = "";
	$fieldLabelspad_pad_spt["English"]["bulan"] = "Bulan";
	$fieldToolTipspad_pad_spt["English"]["bulan"] = "";
	$fieldLabelspad_pad_spt["English"]["no_telp"] = "No Telp";
	$fieldToolTipspad_pad_spt["English"]["no_telp"] = "";
	$fieldLabelspad_pad_spt["English"]["usaha_id"] = "Usaha Id";
	$fieldToolTipspad_pad_spt["English"]["usaha_id"] = "";
	$fieldLabelspad_pad_spt["English"]["multiple"] = "Multiple";
	$fieldToolTipspad_pad_spt["English"]["multiple"] = "";
	$fieldLabelspad_pad_spt["English"]["bulan_telat"] = "Bulan Telat";
	$fieldToolTipspad_pad_spt["English"]["bulan_telat"] = "";
	if (count($fieldToolTipspad_pad_spt["English"]))
		$tdatapad_pad_spt[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_spt[".NCSearch"] = true;



$tdatapad_pad_spt[".shortTableName"] = "pad_pad_spt";
$tdatapad_pad_spt[".nSecOptions"] = 0;
$tdatapad_pad_spt[".recsPerRowList"] = 1;
$tdatapad_pad_spt[".mainTableOwnerID"] = "";
$tdatapad_pad_spt[".moveNext"] = 1;
$tdatapad_pad_spt[".nType"] = 0;

$tdatapad_pad_spt[".strOriginalTableName"] = "pad.pad_spt";




$tdatapad_pad_spt[".showAddInPopup"] = false;

$tdatapad_pad_spt[".showEditInPopup"] = false;

$tdatapad_pad_spt[".showViewInPopup"] = false;

$tdatapad_pad_spt[".fieldsForRegister"] = array();

$tdatapad_pad_spt[".listAjax"] = false;

	$tdatapad_pad_spt[".audit"] = false;

	$tdatapad_pad_spt[".locking"] = false;

$tdatapad_pad_spt[".listIcons"] = true;
$tdatapad_pad_spt[".edit"] = true;
$tdatapad_pad_spt[".inlineEdit"] = true;
$tdatapad_pad_spt[".inlineAdd"] = true;
$tdatapad_pad_spt[".view"] = true;



$tdatapad_pad_spt[".delete"] = true;

$tdatapad_pad_spt[".showSimpleSearchOptions"] = false;

$tdatapad_pad_spt[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_spt[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_spt[".isUseAjaxSuggest"] = true;

$tdatapad_pad_spt[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_spt[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_spt[".isUseTimeForSearch"] = false;



$tdatapad_pad_spt[".useDetailsPreview"] = true;

$tdatapad_pad_spt[".allSearchFields"] = array();

$tdatapad_pad_spt[".allSearchFields"][] = "id";
$tdatapad_pad_spt[".allSearchFields"][] = "tahun";
$tdatapad_pad_spt[".allSearchFields"][] = "sptno";
$tdatapad_pad_spt[".allSearchFields"][] = "customer_id";
$tdatapad_pad_spt[".allSearchFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".allSearchFields"][] = "rekening_id";
$tdatapad_pad_spt[".allSearchFields"][] = "pajak_id";
$tdatapad_pad_spt[".allSearchFields"][] = "type_id";
$tdatapad_pad_spt[".allSearchFields"][] = "so";
$tdatapad_pad_spt[".allSearchFields"][] = "masadari";
$tdatapad_pad_spt[".allSearchFields"][] = "masasd";
$tdatapad_pad_spt[".allSearchFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".allSearchFields"][] = "r_bayarid";
$tdatapad_pad_spt[".allSearchFields"][] = "minimal_omset";
$tdatapad_pad_spt[".allSearchFields"][] = "dasar";
$tdatapad_pad_spt[".allSearchFields"][] = "tarif";
$tdatapad_pad_spt[".allSearchFields"][] = "denda";
$tdatapad_pad_spt[".allSearchFields"][] = "bunga";
$tdatapad_pad_spt[".allSearchFields"][] = "setoran";
$tdatapad_pad_spt[".allSearchFields"][] = "kenaikan";
$tdatapad_pad_spt[".allSearchFields"][] = "kompensasi";
$tdatapad_pad_spt[".allSearchFields"][] = "lain2";
$tdatapad_pad_spt[".allSearchFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".allSearchFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".allSearchFields"][] = "air_zona_id";
$tdatapad_pad_spt[".allSearchFields"][] = "meteran_awal";
$tdatapad_pad_spt[".allSearchFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".allSearchFields"][] = "volume";
$tdatapad_pad_spt[".allSearchFields"][] = "satuan";
$tdatapad_pad_spt[".allSearchFields"][] = "r_panjang";
$tdatapad_pad_spt[".allSearchFields"][] = "r_lebar";
$tdatapad_pad_spt[".allSearchFields"][] = "r_muka";
$tdatapad_pad_spt[".allSearchFields"][] = "r_banyak";
$tdatapad_pad_spt[".allSearchFields"][] = "r_luas";
$tdatapad_pad_spt[".allSearchFields"][] = "r_tarifid";
$tdatapad_pad_spt[".allSearchFields"][] = "r_kontrak";
$tdatapad_pad_spt[".allSearchFields"][] = "r_lama";
$tdatapad_pad_spt[".allSearchFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".allSearchFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".allSearchFields"][] = "r_lokasi";
$tdatapad_pad_spt[".allSearchFields"][] = "r_judul";
$tdatapad_pad_spt[".allSearchFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".allSearchFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".allSearchFields"][] = "r_calculated";
$tdatapad_pad_spt[".allSearchFields"][] = "r_nsr";
$tdatapad_pad_spt[".allSearchFields"][] = "r_nsrno";
$tdatapad_pad_spt[".allSearchFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".allSearchFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".allSearchFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".allSearchFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".allSearchFields"][] = "notes";
$tdatapad_pad_spt[".allSearchFields"][] = "unit_id";
$tdatapad_pad_spt[".allSearchFields"][] = "enabled";
$tdatapad_pad_spt[".allSearchFields"][] = "created";
$tdatapad_pad_spt[".allSearchFields"][] = "create_uid";
$tdatapad_pad_spt[".allSearchFields"][] = "updated";
$tdatapad_pad_spt[".allSearchFields"][] = "update_uid";
$tdatapad_pad_spt[".allSearchFields"][] = "terimanip";
$tdatapad_pad_spt[".allSearchFields"][] = "terimatgl";
$tdatapad_pad_spt[".allSearchFields"][] = "kirimtgl";
$tdatapad_pad_spt[".allSearchFields"][] = "isprint_dc";
$tdatapad_pad_spt[".allSearchFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".allSearchFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".allSearchFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".allSearchFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".allSearchFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".allSearchFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".allSearchFields"][] = "r_tinggi";
$tdatapad_pad_spt[".allSearchFields"][] = "r_njop";
$tdatapad_pad_spt[".allSearchFields"][] = "r_status";
$tdatapad_pad_spt[".allSearchFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".allSearchFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".allSearchFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".allSearchFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".allSearchFields"][] = "sptno_lama";
$tdatapad_pad_spt[".allSearchFields"][] = "r_nama";
$tdatapad_pad_spt[".allSearchFields"][] = "r_alamat";
$tdatapad_pad_spt[".allSearchFields"][] = "omset1";
$tdatapad_pad_spt[".allSearchFields"][] = "omset2";
$tdatapad_pad_spt[".allSearchFields"][] = "omset3";
$tdatapad_pad_spt[".allSearchFields"][] = "omset4";
$tdatapad_pad_spt[".allSearchFields"][] = "omset5";
$tdatapad_pad_spt[".allSearchFields"][] = "omset6";
$tdatapad_pad_spt[".allSearchFields"][] = "omset7";
$tdatapad_pad_spt[".allSearchFields"][] = "omset8";
$tdatapad_pad_spt[".allSearchFields"][] = "omset9";
$tdatapad_pad_spt[".allSearchFields"][] = "omset10";
$tdatapad_pad_spt[".allSearchFields"][] = "omset11";
$tdatapad_pad_spt[".allSearchFields"][] = "omset12";
$tdatapad_pad_spt[".allSearchFields"][] = "omset13";
$tdatapad_pad_spt[".allSearchFields"][] = "omset14";
$tdatapad_pad_spt[".allSearchFields"][] = "omset15";
$tdatapad_pad_spt[".allSearchFields"][] = "omset16";
$tdatapad_pad_spt[".allSearchFields"][] = "omset17";
$tdatapad_pad_spt[".allSearchFields"][] = "omset18";
$tdatapad_pad_spt[".allSearchFields"][] = "omset19";
$tdatapad_pad_spt[".allSearchFields"][] = "omset20";
$tdatapad_pad_spt[".allSearchFields"][] = "omset21";
$tdatapad_pad_spt[".allSearchFields"][] = "omset22";
$tdatapad_pad_spt[".allSearchFields"][] = "omset23";
$tdatapad_pad_spt[".allSearchFields"][] = "omset24";
$tdatapad_pad_spt[".allSearchFields"][] = "omset25";
$tdatapad_pad_spt[".allSearchFields"][] = "omset26";
$tdatapad_pad_spt[".allSearchFields"][] = "omset27";
$tdatapad_pad_spt[".allSearchFields"][] = "omset28";
$tdatapad_pad_spt[".allSearchFields"][] = "omset29";
$tdatapad_pad_spt[".allSearchFields"][] = "omset30";
$tdatapad_pad_spt[".allSearchFields"][] = "omset31";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan1";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan2";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan3";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan4";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan5";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan6";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan7";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan8";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan9";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan10";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan11";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan12";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan13";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan14";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan15";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan16";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan17";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan18";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan19";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan20";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan21";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan22";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan23";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan24";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan25";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan26";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan27";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan28";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan29";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan30";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan31";
$tdatapad_pad_spt[".allSearchFields"][] = "doc_no";
$tdatapad_pad_spt[".allSearchFields"][] = "cara_bayar";
$tdatapad_pad_spt[".allSearchFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".allSearchFields"][] = "zona_id";
$tdatapad_pad_spt[".allSearchFields"][] = "manfaat_id";
$tdatapad_pad_spt[".allSearchFields"][] = "golongan";
$tdatapad_pad_spt[".allSearchFields"][] = "omset_lain";
$tdatapad_pad_spt[".allSearchFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".allSearchFields"][] = "ijin_no";
$tdatapad_pad_spt[".allSearchFields"][] = "jenis_masa";
$tdatapad_pad_spt[".allSearchFields"][] = "skpd_lama";
$tdatapad_pad_spt[".allSearchFields"][] = "proses";
$tdatapad_pad_spt[".allSearchFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".allSearchFields"][] = "bulan";
$tdatapad_pad_spt[".allSearchFields"][] = "no_telp";
$tdatapad_pad_spt[".allSearchFields"][] = "usaha_id";
$tdatapad_pad_spt[".allSearchFields"][] = "multiple";
$tdatapad_pad_spt[".allSearchFields"][] = "bulan_telat";

$tdatapad_pad_spt[".googleLikeFields"][] = "id";
$tdatapad_pad_spt[".googleLikeFields"][] = "tahun";
$tdatapad_pad_spt[".googleLikeFields"][] = "sptno";
$tdatapad_pad_spt[".googleLikeFields"][] = "customer_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "rekening_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "pajak_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "type_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "so";
$tdatapad_pad_spt[".googleLikeFields"][] = "masadari";
$tdatapad_pad_spt[".googleLikeFields"][] = "masasd";
$tdatapad_pad_spt[".googleLikeFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_bayarid";
$tdatapad_pad_spt[".googleLikeFields"][] = "minimal_omset";
$tdatapad_pad_spt[".googleLikeFields"][] = "dasar";
$tdatapad_pad_spt[".googleLikeFields"][] = "tarif";
$tdatapad_pad_spt[".googleLikeFields"][] = "denda";
$tdatapad_pad_spt[".googleLikeFields"][] = "bunga";
$tdatapad_pad_spt[".googleLikeFields"][] = "setoran";
$tdatapad_pad_spt[".googleLikeFields"][] = "kenaikan";
$tdatapad_pad_spt[".googleLikeFields"][] = "kompensasi";
$tdatapad_pad_spt[".googleLikeFields"][] = "lain2";
$tdatapad_pad_spt[".googleLikeFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".googleLikeFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "air_zona_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "meteran_awal";
$tdatapad_pad_spt[".googleLikeFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".googleLikeFields"][] = "volume";
$tdatapad_pad_spt[".googleLikeFields"][] = "satuan";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_panjang";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_lebar";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_muka";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_banyak";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_luas";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_tarifid";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_kontrak";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_lama";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_lokasi";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_judul";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_calculated";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_nsr";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_nsrno";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".googleLikeFields"][] = "notes";
$tdatapad_pad_spt[".googleLikeFields"][] = "unit_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "enabled";
$tdatapad_pad_spt[".googleLikeFields"][] = "created";
$tdatapad_pad_spt[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_spt[".googleLikeFields"][] = "updated";
$tdatapad_pad_spt[".googleLikeFields"][] = "update_uid";
$tdatapad_pad_spt[".googleLikeFields"][] = "terimanip";
$tdatapad_pad_spt[".googleLikeFields"][] = "terimatgl";
$tdatapad_pad_spt[".googleLikeFields"][] = "kirimtgl";
$tdatapad_pad_spt[".googleLikeFields"][] = "isprint_dc";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_tinggi";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_njop";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_status";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".googleLikeFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".googleLikeFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".googleLikeFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".googleLikeFields"][] = "sptno_lama";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_nama";
$tdatapad_pad_spt[".googleLikeFields"][] = "r_alamat";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset1";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset2";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset3";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset4";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset5";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset6";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset7";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset8";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset9";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset10";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset11";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset12";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset13";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset14";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset15";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset16";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset17";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset18";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset19";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset20";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset21";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset22";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset23";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset24";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset25";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset26";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset27";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset28";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset29";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset30";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset31";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan1";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan2";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan3";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan4";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan5";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan6";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan7";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan8";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan9";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan10";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan11";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan12";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan13";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan14";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan15";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan16";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan17";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan18";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan19";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan20";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan21";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan22";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan23";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan24";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan25";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan26";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan27";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan28";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan29";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan30";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan31";
$tdatapad_pad_spt[".googleLikeFields"][] = "doc_no";
$tdatapad_pad_spt[".googleLikeFields"][] = "cara_bayar";
$tdatapad_pad_spt[".googleLikeFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "zona_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "manfaat_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "golongan";
$tdatapad_pad_spt[".googleLikeFields"][] = "omset_lain";
$tdatapad_pad_spt[".googleLikeFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".googleLikeFields"][] = "ijin_no";
$tdatapad_pad_spt[".googleLikeFields"][] = "jenis_masa";
$tdatapad_pad_spt[".googleLikeFields"][] = "skpd_lama";
$tdatapad_pad_spt[".googleLikeFields"][] = "proses";
$tdatapad_pad_spt[".googleLikeFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".googleLikeFields"][] = "bulan";
$tdatapad_pad_spt[".googleLikeFields"][] = "no_telp";
$tdatapad_pad_spt[".googleLikeFields"][] = "usaha_id";
$tdatapad_pad_spt[".googleLikeFields"][] = "multiple";
$tdatapad_pad_spt[".googleLikeFields"][] = "bulan_telat";


$tdatapad_pad_spt[".advSearchFields"][] = "id";
$tdatapad_pad_spt[".advSearchFields"][] = "tahun";
$tdatapad_pad_spt[".advSearchFields"][] = "sptno";
$tdatapad_pad_spt[".advSearchFields"][] = "customer_id";
$tdatapad_pad_spt[".advSearchFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".advSearchFields"][] = "rekening_id";
$tdatapad_pad_spt[".advSearchFields"][] = "pajak_id";
$tdatapad_pad_spt[".advSearchFields"][] = "type_id";
$tdatapad_pad_spt[".advSearchFields"][] = "so";
$tdatapad_pad_spt[".advSearchFields"][] = "masadari";
$tdatapad_pad_spt[".advSearchFields"][] = "masasd";
$tdatapad_pad_spt[".advSearchFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".advSearchFields"][] = "r_bayarid";
$tdatapad_pad_spt[".advSearchFields"][] = "minimal_omset";
$tdatapad_pad_spt[".advSearchFields"][] = "dasar";
$tdatapad_pad_spt[".advSearchFields"][] = "tarif";
$tdatapad_pad_spt[".advSearchFields"][] = "denda";
$tdatapad_pad_spt[".advSearchFields"][] = "bunga";
$tdatapad_pad_spt[".advSearchFields"][] = "setoran";
$tdatapad_pad_spt[".advSearchFields"][] = "kenaikan";
$tdatapad_pad_spt[".advSearchFields"][] = "kompensasi";
$tdatapad_pad_spt[".advSearchFields"][] = "lain2";
$tdatapad_pad_spt[".advSearchFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".advSearchFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".advSearchFields"][] = "air_zona_id";
$tdatapad_pad_spt[".advSearchFields"][] = "meteran_awal";
$tdatapad_pad_spt[".advSearchFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".advSearchFields"][] = "volume";
$tdatapad_pad_spt[".advSearchFields"][] = "satuan";
$tdatapad_pad_spt[".advSearchFields"][] = "r_panjang";
$tdatapad_pad_spt[".advSearchFields"][] = "r_lebar";
$tdatapad_pad_spt[".advSearchFields"][] = "r_muka";
$tdatapad_pad_spt[".advSearchFields"][] = "r_banyak";
$tdatapad_pad_spt[".advSearchFields"][] = "r_luas";
$tdatapad_pad_spt[".advSearchFields"][] = "r_tarifid";
$tdatapad_pad_spt[".advSearchFields"][] = "r_kontrak";
$tdatapad_pad_spt[".advSearchFields"][] = "r_lama";
$tdatapad_pad_spt[".advSearchFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".advSearchFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".advSearchFields"][] = "r_lokasi";
$tdatapad_pad_spt[".advSearchFields"][] = "r_judul";
$tdatapad_pad_spt[".advSearchFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".advSearchFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".advSearchFields"][] = "r_calculated";
$tdatapad_pad_spt[".advSearchFields"][] = "r_nsr";
$tdatapad_pad_spt[".advSearchFields"][] = "r_nsrno";
$tdatapad_pad_spt[".advSearchFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".advSearchFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".advSearchFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".advSearchFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".advSearchFields"][] = "notes";
$tdatapad_pad_spt[".advSearchFields"][] = "unit_id";
$tdatapad_pad_spt[".advSearchFields"][] = "enabled";
$tdatapad_pad_spt[".advSearchFields"][] = "created";
$tdatapad_pad_spt[".advSearchFields"][] = "create_uid";
$tdatapad_pad_spt[".advSearchFields"][] = "updated";
$tdatapad_pad_spt[".advSearchFields"][] = "update_uid";
$tdatapad_pad_spt[".advSearchFields"][] = "terimanip";
$tdatapad_pad_spt[".advSearchFields"][] = "terimatgl";
$tdatapad_pad_spt[".advSearchFields"][] = "kirimtgl";
$tdatapad_pad_spt[".advSearchFields"][] = "isprint_dc";
$tdatapad_pad_spt[".advSearchFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".advSearchFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".advSearchFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".advSearchFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".advSearchFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".advSearchFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".advSearchFields"][] = "r_tinggi";
$tdatapad_pad_spt[".advSearchFields"][] = "r_njop";
$tdatapad_pad_spt[".advSearchFields"][] = "r_status";
$tdatapad_pad_spt[".advSearchFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".advSearchFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".advSearchFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".advSearchFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".advSearchFields"][] = "sptno_lama";
$tdatapad_pad_spt[".advSearchFields"][] = "r_nama";
$tdatapad_pad_spt[".advSearchFields"][] = "r_alamat";
$tdatapad_pad_spt[".advSearchFields"][] = "omset1";
$tdatapad_pad_spt[".advSearchFields"][] = "omset2";
$tdatapad_pad_spt[".advSearchFields"][] = "omset3";
$tdatapad_pad_spt[".advSearchFields"][] = "omset4";
$tdatapad_pad_spt[".advSearchFields"][] = "omset5";
$tdatapad_pad_spt[".advSearchFields"][] = "omset6";
$tdatapad_pad_spt[".advSearchFields"][] = "omset7";
$tdatapad_pad_spt[".advSearchFields"][] = "omset8";
$tdatapad_pad_spt[".advSearchFields"][] = "omset9";
$tdatapad_pad_spt[".advSearchFields"][] = "omset10";
$tdatapad_pad_spt[".advSearchFields"][] = "omset11";
$tdatapad_pad_spt[".advSearchFields"][] = "omset12";
$tdatapad_pad_spt[".advSearchFields"][] = "omset13";
$tdatapad_pad_spt[".advSearchFields"][] = "omset14";
$tdatapad_pad_spt[".advSearchFields"][] = "omset15";
$tdatapad_pad_spt[".advSearchFields"][] = "omset16";
$tdatapad_pad_spt[".advSearchFields"][] = "omset17";
$tdatapad_pad_spt[".advSearchFields"][] = "omset18";
$tdatapad_pad_spt[".advSearchFields"][] = "omset19";
$tdatapad_pad_spt[".advSearchFields"][] = "omset20";
$tdatapad_pad_spt[".advSearchFields"][] = "omset21";
$tdatapad_pad_spt[".advSearchFields"][] = "omset22";
$tdatapad_pad_spt[".advSearchFields"][] = "omset23";
$tdatapad_pad_spt[".advSearchFields"][] = "omset24";
$tdatapad_pad_spt[".advSearchFields"][] = "omset25";
$tdatapad_pad_spt[".advSearchFields"][] = "omset26";
$tdatapad_pad_spt[".advSearchFields"][] = "omset27";
$tdatapad_pad_spt[".advSearchFields"][] = "omset28";
$tdatapad_pad_spt[".advSearchFields"][] = "omset29";
$tdatapad_pad_spt[".advSearchFields"][] = "omset30";
$tdatapad_pad_spt[".advSearchFields"][] = "omset31";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan1";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan2";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan3";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan4";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan5";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan6";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan7";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan8";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan9";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan10";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan11";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan12";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan13";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan14";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan15";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan16";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan17";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan18";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan19";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan20";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan21";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan22";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan23";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan24";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan25";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan26";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan27";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan28";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan29";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan30";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan31";
$tdatapad_pad_spt[".advSearchFields"][] = "doc_no";
$tdatapad_pad_spt[".advSearchFields"][] = "cara_bayar";
$tdatapad_pad_spt[".advSearchFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".advSearchFields"][] = "zona_id";
$tdatapad_pad_spt[".advSearchFields"][] = "manfaat_id";
$tdatapad_pad_spt[".advSearchFields"][] = "golongan";
$tdatapad_pad_spt[".advSearchFields"][] = "omset_lain";
$tdatapad_pad_spt[".advSearchFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".advSearchFields"][] = "ijin_no";
$tdatapad_pad_spt[".advSearchFields"][] = "jenis_masa";
$tdatapad_pad_spt[".advSearchFields"][] = "skpd_lama";
$tdatapad_pad_spt[".advSearchFields"][] = "proses";
$tdatapad_pad_spt[".advSearchFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".advSearchFields"][] = "bulan";
$tdatapad_pad_spt[".advSearchFields"][] = "no_telp";
$tdatapad_pad_spt[".advSearchFields"][] = "usaha_id";
$tdatapad_pad_spt[".advSearchFields"][] = "multiple";
$tdatapad_pad_spt[".advSearchFields"][] = "bulan_telat";

$tdatapad_pad_spt[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
		


$tdatapad_pad_spt[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_spt[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_spt[".orderindexes"] = array();

$tdatapad_pad_spt[".sqlHead"] = "SELECT id,   tahun,   sptno,   customer_id,   customer_usaha_id,   rekening_id,   pajak_id,   type_id,   so,   masadari,   masasd,   jatuhtempotgl,   r_bayarid,   minimal_omset,   dasar,   tarif,   denda,   bunga,   setoran,   kenaikan,   kompensasi,   lain2,   pajak_terhutang,   air_manfaat_id,   air_zona_id,   meteran_awal,   meteran_akhir,   volume,   satuan,   r_panjang,   r_lebar,   r_muka,   r_banyak,   r_luas,   r_tarifid,   r_kontrak,   r_lama,   r_jalan_id,   r_jalanklas_id,   r_lokasi,   r_judul,   r_kelurahan_id,   r_lokasi_id,   r_calculated,   r_nsr,   r_nsrno,   r_nsrtgl,   r_nsl_kecamatan_id,   r_nsl_type_id,   r_nsl_nilai,   notes,   unit_id,   enabled,   created,   create_uid,   updated,   update_uid,   terimanip,   terimatgl,   kirimtgl,   isprint_dc,   r_nsr_id,   r_lokasi_pasang_id,   r_lokasi_pasang_val,   r_jalanklas_val,   r_sudut_pandang_id,   r_sudut_pandang_val,   r_tinggi,   r_njop,   r_status,   r_njop_ketinggian,   status_pembayaran,   rek_no_paneng,   sptno_lengkap,   sptno_lama,   r_nama,   r_alamat,   omset1,   omset2,   omset3,   omset4,   omset5,   omset6,   omset7,   omset8,   omset9,   omset10,   omset11,   omset12,   omset13,   omset14,   omset15,   omset16,   omset17,   omset18,   omset19,   omset20,   omset21,   omset22,   omset23,   omset24,   omset25,   omset26,   omset27,   omset28,   omset29,   omset30,   omset31,   keterangan1,   keterangan2,   keterangan3,   keterangan4,   keterangan5,   keterangan6,   keterangan7,   keterangan8,   keterangan9,   keterangan10,   keterangan11,   keterangan12,   keterangan13,   keterangan14,   keterangan15,   keterangan16,   keterangan17,   keterangan18,   keterangan19,   keterangan20,   keterangan21,   keterangan22,   keterangan23,   keterangan24,   keterangan25,   keterangan26,   keterangan27,   keterangan28,   keterangan29,   keterangan30,   keterangan31,   doc_no,   cara_bayar,   kelompok_usaha_id,   zona_id,   manfaat_id,   golongan,   omset_lain,   keterangan_lain,   ijin_no,   jenis_masa,   skpd_lama,   proses,   tanggal_validasi,   bulan,   no_telp,   usaha_id,   multiple,   bulan_telat";
$tdatapad_pad_spt[".sqlFrom"] = "FROM \"pad\".pad_spt";
$tdatapad_pad_spt[".sqlWhereExpr"] = "";
$tdatapad_pad_spt[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_spt[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_spt[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_spt = array();
$tableKeyspad_pad_spt[] = "id";
$tdatapad_pad_spt[".Keys"] = $tableKeyspad_pad_spt;

$tdatapad_pad_spt[".listFields"] = array();
$tdatapad_pad_spt[".listFields"][] = "id";
$tdatapad_pad_spt[".listFields"][] = "tahun";
$tdatapad_pad_spt[".listFields"][] = "sptno";
$tdatapad_pad_spt[".listFields"][] = "customer_id";
$tdatapad_pad_spt[".listFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".listFields"][] = "rekening_id";
$tdatapad_pad_spt[".listFields"][] = "pajak_id";
$tdatapad_pad_spt[".listFields"][] = "type_id";
$tdatapad_pad_spt[".listFields"][] = "so";
$tdatapad_pad_spt[".listFields"][] = "masadari";
$tdatapad_pad_spt[".listFields"][] = "masasd";
$tdatapad_pad_spt[".listFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".listFields"][] = "r_bayarid";
$tdatapad_pad_spt[".listFields"][] = "minimal_omset";
$tdatapad_pad_spt[".listFields"][] = "dasar";
$tdatapad_pad_spt[".listFields"][] = "tarif";
$tdatapad_pad_spt[".listFields"][] = "denda";
$tdatapad_pad_spt[".listFields"][] = "bunga";
$tdatapad_pad_spt[".listFields"][] = "setoran";
$tdatapad_pad_spt[".listFields"][] = "kenaikan";
$tdatapad_pad_spt[".listFields"][] = "kompensasi";
$tdatapad_pad_spt[".listFields"][] = "lain2";
$tdatapad_pad_spt[".listFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".listFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".listFields"][] = "air_zona_id";
$tdatapad_pad_spt[".listFields"][] = "meteran_awal";
$tdatapad_pad_spt[".listFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".listFields"][] = "volume";
$tdatapad_pad_spt[".listFields"][] = "satuan";
$tdatapad_pad_spt[".listFields"][] = "r_panjang";
$tdatapad_pad_spt[".listFields"][] = "r_lebar";
$tdatapad_pad_spt[".listFields"][] = "r_muka";
$tdatapad_pad_spt[".listFields"][] = "r_banyak";
$tdatapad_pad_spt[".listFields"][] = "r_luas";
$tdatapad_pad_spt[".listFields"][] = "r_tarifid";
$tdatapad_pad_spt[".listFields"][] = "r_kontrak";
$tdatapad_pad_spt[".listFields"][] = "r_lama";
$tdatapad_pad_spt[".listFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".listFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".listFields"][] = "r_lokasi";
$tdatapad_pad_spt[".listFields"][] = "r_judul";
$tdatapad_pad_spt[".listFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".listFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".listFields"][] = "r_calculated";
$tdatapad_pad_spt[".listFields"][] = "r_nsr";
$tdatapad_pad_spt[".listFields"][] = "r_nsrno";
$tdatapad_pad_spt[".listFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".listFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".listFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".listFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".listFields"][] = "notes";
$tdatapad_pad_spt[".listFields"][] = "unit_id";
$tdatapad_pad_spt[".listFields"][] = "enabled";
$tdatapad_pad_spt[".listFields"][] = "created";
$tdatapad_pad_spt[".listFields"][] = "create_uid";
$tdatapad_pad_spt[".listFields"][] = "updated";
$tdatapad_pad_spt[".listFields"][] = "update_uid";
$tdatapad_pad_spt[".listFields"][] = "terimanip";
$tdatapad_pad_spt[".listFields"][] = "terimatgl";
$tdatapad_pad_spt[".listFields"][] = "kirimtgl";
$tdatapad_pad_spt[".listFields"][] = "isprint_dc";
$tdatapad_pad_spt[".listFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".listFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".listFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".listFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".listFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".listFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".listFields"][] = "r_tinggi";
$tdatapad_pad_spt[".listFields"][] = "r_njop";
$tdatapad_pad_spt[".listFields"][] = "r_status";
$tdatapad_pad_spt[".listFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".listFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".listFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".listFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".listFields"][] = "sptno_lama";
$tdatapad_pad_spt[".listFields"][] = "r_nama";
$tdatapad_pad_spt[".listFields"][] = "r_alamat";
$tdatapad_pad_spt[".listFields"][] = "omset1";
$tdatapad_pad_spt[".listFields"][] = "omset2";
$tdatapad_pad_spt[".listFields"][] = "omset3";
$tdatapad_pad_spt[".listFields"][] = "omset4";
$tdatapad_pad_spt[".listFields"][] = "omset5";
$tdatapad_pad_spt[".listFields"][] = "omset6";
$tdatapad_pad_spt[".listFields"][] = "omset7";
$tdatapad_pad_spt[".listFields"][] = "omset8";
$tdatapad_pad_spt[".listFields"][] = "omset9";
$tdatapad_pad_spt[".listFields"][] = "omset10";
$tdatapad_pad_spt[".listFields"][] = "omset11";
$tdatapad_pad_spt[".listFields"][] = "omset12";
$tdatapad_pad_spt[".listFields"][] = "omset13";
$tdatapad_pad_spt[".listFields"][] = "omset14";
$tdatapad_pad_spt[".listFields"][] = "omset15";
$tdatapad_pad_spt[".listFields"][] = "omset16";
$tdatapad_pad_spt[".listFields"][] = "omset17";
$tdatapad_pad_spt[".listFields"][] = "omset18";
$tdatapad_pad_spt[".listFields"][] = "omset19";
$tdatapad_pad_spt[".listFields"][] = "omset20";
$tdatapad_pad_spt[".listFields"][] = "omset21";
$tdatapad_pad_spt[".listFields"][] = "omset22";
$tdatapad_pad_spt[".listFields"][] = "omset23";
$tdatapad_pad_spt[".listFields"][] = "omset24";
$tdatapad_pad_spt[".listFields"][] = "omset25";
$tdatapad_pad_spt[".listFields"][] = "omset26";
$tdatapad_pad_spt[".listFields"][] = "omset27";
$tdatapad_pad_spt[".listFields"][] = "omset28";
$tdatapad_pad_spt[".listFields"][] = "omset29";
$tdatapad_pad_spt[".listFields"][] = "omset30";
$tdatapad_pad_spt[".listFields"][] = "omset31";
$tdatapad_pad_spt[".listFields"][] = "keterangan1";
$tdatapad_pad_spt[".listFields"][] = "keterangan2";
$tdatapad_pad_spt[".listFields"][] = "keterangan3";
$tdatapad_pad_spt[".listFields"][] = "keterangan4";
$tdatapad_pad_spt[".listFields"][] = "keterangan5";
$tdatapad_pad_spt[".listFields"][] = "keterangan6";
$tdatapad_pad_spt[".listFields"][] = "keterangan7";
$tdatapad_pad_spt[".listFields"][] = "keterangan8";
$tdatapad_pad_spt[".listFields"][] = "keterangan9";
$tdatapad_pad_spt[".listFields"][] = "keterangan10";
$tdatapad_pad_spt[".listFields"][] = "keterangan11";
$tdatapad_pad_spt[".listFields"][] = "keterangan12";
$tdatapad_pad_spt[".listFields"][] = "keterangan13";
$tdatapad_pad_spt[".listFields"][] = "keterangan14";
$tdatapad_pad_spt[".listFields"][] = "keterangan15";
$tdatapad_pad_spt[".listFields"][] = "keterangan16";
$tdatapad_pad_spt[".listFields"][] = "keterangan17";
$tdatapad_pad_spt[".listFields"][] = "keterangan18";
$tdatapad_pad_spt[".listFields"][] = "keterangan19";
$tdatapad_pad_spt[".listFields"][] = "keterangan20";
$tdatapad_pad_spt[".listFields"][] = "keterangan21";
$tdatapad_pad_spt[".listFields"][] = "keterangan22";
$tdatapad_pad_spt[".listFields"][] = "keterangan23";
$tdatapad_pad_spt[".listFields"][] = "keterangan24";
$tdatapad_pad_spt[".listFields"][] = "keterangan25";
$tdatapad_pad_spt[".listFields"][] = "keterangan26";
$tdatapad_pad_spt[".listFields"][] = "keterangan27";
$tdatapad_pad_spt[".listFields"][] = "keterangan28";
$tdatapad_pad_spt[".listFields"][] = "keterangan29";
$tdatapad_pad_spt[".listFields"][] = "keterangan30";
$tdatapad_pad_spt[".listFields"][] = "keterangan31";
$tdatapad_pad_spt[".listFields"][] = "doc_no";
$tdatapad_pad_spt[".listFields"][] = "cara_bayar";
$tdatapad_pad_spt[".listFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".listFields"][] = "zona_id";
$tdatapad_pad_spt[".listFields"][] = "manfaat_id";
$tdatapad_pad_spt[".listFields"][] = "golongan";
$tdatapad_pad_spt[".listFields"][] = "omset_lain";
$tdatapad_pad_spt[".listFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".listFields"][] = "ijin_no";
$tdatapad_pad_spt[".listFields"][] = "jenis_masa";
$tdatapad_pad_spt[".listFields"][] = "skpd_lama";
$tdatapad_pad_spt[".listFields"][] = "proses";
$tdatapad_pad_spt[".listFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".listFields"][] = "bulan";
$tdatapad_pad_spt[".listFields"][] = "no_telp";
$tdatapad_pad_spt[".listFields"][] = "usaha_id";
$tdatapad_pad_spt[".listFields"][] = "multiple";
$tdatapad_pad_spt[".listFields"][] = "bulan_telat";

$tdatapad_pad_spt[".viewFields"] = array();
$tdatapad_pad_spt[".viewFields"][] = "id";
$tdatapad_pad_spt[".viewFields"][] = "tahun";
$tdatapad_pad_spt[".viewFields"][] = "sptno";
$tdatapad_pad_spt[".viewFields"][] = "customer_id";
$tdatapad_pad_spt[".viewFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".viewFields"][] = "rekening_id";
$tdatapad_pad_spt[".viewFields"][] = "pajak_id";
$tdatapad_pad_spt[".viewFields"][] = "type_id";
$tdatapad_pad_spt[".viewFields"][] = "so";
$tdatapad_pad_spt[".viewFields"][] = "masadari";
$tdatapad_pad_spt[".viewFields"][] = "masasd";
$tdatapad_pad_spt[".viewFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".viewFields"][] = "r_bayarid";
$tdatapad_pad_spt[".viewFields"][] = "minimal_omset";
$tdatapad_pad_spt[".viewFields"][] = "dasar";
$tdatapad_pad_spt[".viewFields"][] = "tarif";
$tdatapad_pad_spt[".viewFields"][] = "denda";
$tdatapad_pad_spt[".viewFields"][] = "bunga";
$tdatapad_pad_spt[".viewFields"][] = "setoran";
$tdatapad_pad_spt[".viewFields"][] = "kenaikan";
$tdatapad_pad_spt[".viewFields"][] = "kompensasi";
$tdatapad_pad_spt[".viewFields"][] = "lain2";
$tdatapad_pad_spt[".viewFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".viewFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".viewFields"][] = "air_zona_id";
$tdatapad_pad_spt[".viewFields"][] = "meteran_awal";
$tdatapad_pad_spt[".viewFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".viewFields"][] = "volume";
$tdatapad_pad_spt[".viewFields"][] = "satuan";
$tdatapad_pad_spt[".viewFields"][] = "r_panjang";
$tdatapad_pad_spt[".viewFields"][] = "r_lebar";
$tdatapad_pad_spt[".viewFields"][] = "r_muka";
$tdatapad_pad_spt[".viewFields"][] = "r_banyak";
$tdatapad_pad_spt[".viewFields"][] = "r_luas";
$tdatapad_pad_spt[".viewFields"][] = "r_tarifid";
$tdatapad_pad_spt[".viewFields"][] = "r_kontrak";
$tdatapad_pad_spt[".viewFields"][] = "r_lama";
$tdatapad_pad_spt[".viewFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".viewFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".viewFields"][] = "r_lokasi";
$tdatapad_pad_spt[".viewFields"][] = "r_judul";
$tdatapad_pad_spt[".viewFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".viewFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".viewFields"][] = "r_calculated";
$tdatapad_pad_spt[".viewFields"][] = "r_nsr";
$tdatapad_pad_spt[".viewFields"][] = "r_nsrno";
$tdatapad_pad_spt[".viewFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".viewFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".viewFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".viewFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".viewFields"][] = "notes";
$tdatapad_pad_spt[".viewFields"][] = "unit_id";
$tdatapad_pad_spt[".viewFields"][] = "enabled";
$tdatapad_pad_spt[".viewFields"][] = "created";
$tdatapad_pad_spt[".viewFields"][] = "create_uid";
$tdatapad_pad_spt[".viewFields"][] = "updated";
$tdatapad_pad_spt[".viewFields"][] = "update_uid";
$tdatapad_pad_spt[".viewFields"][] = "terimanip";
$tdatapad_pad_spt[".viewFields"][] = "terimatgl";
$tdatapad_pad_spt[".viewFields"][] = "kirimtgl";
$tdatapad_pad_spt[".viewFields"][] = "isprint_dc";
$tdatapad_pad_spt[".viewFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".viewFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".viewFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".viewFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".viewFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".viewFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".viewFields"][] = "r_tinggi";
$tdatapad_pad_spt[".viewFields"][] = "r_njop";
$tdatapad_pad_spt[".viewFields"][] = "r_status";
$tdatapad_pad_spt[".viewFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".viewFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".viewFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".viewFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".viewFields"][] = "sptno_lama";
$tdatapad_pad_spt[".viewFields"][] = "r_nama";
$tdatapad_pad_spt[".viewFields"][] = "r_alamat";
$tdatapad_pad_spt[".viewFields"][] = "omset1";
$tdatapad_pad_spt[".viewFields"][] = "omset2";
$tdatapad_pad_spt[".viewFields"][] = "omset3";
$tdatapad_pad_spt[".viewFields"][] = "omset4";
$tdatapad_pad_spt[".viewFields"][] = "omset5";
$tdatapad_pad_spt[".viewFields"][] = "omset6";
$tdatapad_pad_spt[".viewFields"][] = "omset7";
$tdatapad_pad_spt[".viewFields"][] = "omset8";
$tdatapad_pad_spt[".viewFields"][] = "omset9";
$tdatapad_pad_spt[".viewFields"][] = "omset10";
$tdatapad_pad_spt[".viewFields"][] = "omset11";
$tdatapad_pad_spt[".viewFields"][] = "omset12";
$tdatapad_pad_spt[".viewFields"][] = "omset13";
$tdatapad_pad_spt[".viewFields"][] = "omset14";
$tdatapad_pad_spt[".viewFields"][] = "omset15";
$tdatapad_pad_spt[".viewFields"][] = "omset16";
$tdatapad_pad_spt[".viewFields"][] = "omset17";
$tdatapad_pad_spt[".viewFields"][] = "omset18";
$tdatapad_pad_spt[".viewFields"][] = "omset19";
$tdatapad_pad_spt[".viewFields"][] = "omset20";
$tdatapad_pad_spt[".viewFields"][] = "omset21";
$tdatapad_pad_spt[".viewFields"][] = "omset22";
$tdatapad_pad_spt[".viewFields"][] = "omset23";
$tdatapad_pad_spt[".viewFields"][] = "omset24";
$tdatapad_pad_spt[".viewFields"][] = "omset25";
$tdatapad_pad_spt[".viewFields"][] = "omset26";
$tdatapad_pad_spt[".viewFields"][] = "omset27";
$tdatapad_pad_spt[".viewFields"][] = "omset28";
$tdatapad_pad_spt[".viewFields"][] = "omset29";
$tdatapad_pad_spt[".viewFields"][] = "omset30";
$tdatapad_pad_spt[".viewFields"][] = "omset31";
$tdatapad_pad_spt[".viewFields"][] = "keterangan1";
$tdatapad_pad_spt[".viewFields"][] = "keterangan2";
$tdatapad_pad_spt[".viewFields"][] = "keterangan3";
$tdatapad_pad_spt[".viewFields"][] = "keterangan4";
$tdatapad_pad_spt[".viewFields"][] = "keterangan5";
$tdatapad_pad_spt[".viewFields"][] = "keterangan6";
$tdatapad_pad_spt[".viewFields"][] = "keterangan7";
$tdatapad_pad_spt[".viewFields"][] = "keterangan8";
$tdatapad_pad_spt[".viewFields"][] = "keterangan9";
$tdatapad_pad_spt[".viewFields"][] = "keterangan10";
$tdatapad_pad_spt[".viewFields"][] = "keterangan11";
$tdatapad_pad_spt[".viewFields"][] = "keterangan12";
$tdatapad_pad_spt[".viewFields"][] = "keterangan13";
$tdatapad_pad_spt[".viewFields"][] = "keterangan14";
$tdatapad_pad_spt[".viewFields"][] = "keterangan15";
$tdatapad_pad_spt[".viewFields"][] = "keterangan16";
$tdatapad_pad_spt[".viewFields"][] = "keterangan17";
$tdatapad_pad_spt[".viewFields"][] = "keterangan18";
$tdatapad_pad_spt[".viewFields"][] = "keterangan19";
$tdatapad_pad_spt[".viewFields"][] = "keterangan20";
$tdatapad_pad_spt[".viewFields"][] = "keterangan21";
$tdatapad_pad_spt[".viewFields"][] = "keterangan22";
$tdatapad_pad_spt[".viewFields"][] = "keterangan23";
$tdatapad_pad_spt[".viewFields"][] = "keterangan24";
$tdatapad_pad_spt[".viewFields"][] = "keterangan25";
$tdatapad_pad_spt[".viewFields"][] = "keterangan26";
$tdatapad_pad_spt[".viewFields"][] = "keterangan27";
$tdatapad_pad_spt[".viewFields"][] = "keterangan28";
$tdatapad_pad_spt[".viewFields"][] = "keterangan29";
$tdatapad_pad_spt[".viewFields"][] = "keterangan30";
$tdatapad_pad_spt[".viewFields"][] = "keterangan31";
$tdatapad_pad_spt[".viewFields"][] = "doc_no";
$tdatapad_pad_spt[".viewFields"][] = "cara_bayar";
$tdatapad_pad_spt[".viewFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".viewFields"][] = "zona_id";
$tdatapad_pad_spt[".viewFields"][] = "manfaat_id";
$tdatapad_pad_spt[".viewFields"][] = "golongan";
$tdatapad_pad_spt[".viewFields"][] = "omset_lain";
$tdatapad_pad_spt[".viewFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".viewFields"][] = "ijin_no";
$tdatapad_pad_spt[".viewFields"][] = "jenis_masa";
$tdatapad_pad_spt[".viewFields"][] = "skpd_lama";
$tdatapad_pad_spt[".viewFields"][] = "proses";
$tdatapad_pad_spt[".viewFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".viewFields"][] = "bulan";
$tdatapad_pad_spt[".viewFields"][] = "no_telp";
$tdatapad_pad_spt[".viewFields"][] = "usaha_id";
$tdatapad_pad_spt[".viewFields"][] = "multiple";
$tdatapad_pad_spt[".viewFields"][] = "bulan_telat";

$tdatapad_pad_spt[".addFields"] = array();
$tdatapad_pad_spt[".addFields"][] = "tahun";
$tdatapad_pad_spt[".addFields"][] = "sptno";
$tdatapad_pad_spt[".addFields"][] = "customer_id";
$tdatapad_pad_spt[".addFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".addFields"][] = "rekening_id";
$tdatapad_pad_spt[".addFields"][] = "pajak_id";
$tdatapad_pad_spt[".addFields"][] = "type_id";
$tdatapad_pad_spt[".addFields"][] = "so";
$tdatapad_pad_spt[".addFields"][] = "masadari";
$tdatapad_pad_spt[".addFields"][] = "masasd";
$tdatapad_pad_spt[".addFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".addFields"][] = "r_bayarid";
$tdatapad_pad_spt[".addFields"][] = "minimal_omset";
$tdatapad_pad_spt[".addFields"][] = "dasar";
$tdatapad_pad_spt[".addFields"][] = "tarif";
$tdatapad_pad_spt[".addFields"][] = "denda";
$tdatapad_pad_spt[".addFields"][] = "bunga";
$tdatapad_pad_spt[".addFields"][] = "setoran";
$tdatapad_pad_spt[".addFields"][] = "kenaikan";
$tdatapad_pad_spt[".addFields"][] = "kompensasi";
$tdatapad_pad_spt[".addFields"][] = "lain2";
$tdatapad_pad_spt[".addFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".addFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".addFields"][] = "air_zona_id";
$tdatapad_pad_spt[".addFields"][] = "meteran_awal";
$tdatapad_pad_spt[".addFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".addFields"][] = "volume";
$tdatapad_pad_spt[".addFields"][] = "satuan";
$tdatapad_pad_spt[".addFields"][] = "r_panjang";
$tdatapad_pad_spt[".addFields"][] = "r_lebar";
$tdatapad_pad_spt[".addFields"][] = "r_muka";
$tdatapad_pad_spt[".addFields"][] = "r_banyak";
$tdatapad_pad_spt[".addFields"][] = "r_luas";
$tdatapad_pad_spt[".addFields"][] = "r_tarifid";
$tdatapad_pad_spt[".addFields"][] = "r_kontrak";
$tdatapad_pad_spt[".addFields"][] = "r_lama";
$tdatapad_pad_spt[".addFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".addFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".addFields"][] = "r_lokasi";
$tdatapad_pad_spt[".addFields"][] = "r_judul";
$tdatapad_pad_spt[".addFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".addFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".addFields"][] = "r_calculated";
$tdatapad_pad_spt[".addFields"][] = "r_nsr";
$tdatapad_pad_spt[".addFields"][] = "r_nsrno";
$tdatapad_pad_spt[".addFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".addFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".addFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".addFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".addFields"][] = "notes";
$tdatapad_pad_spt[".addFields"][] = "unit_id";
$tdatapad_pad_spt[".addFields"][] = "enabled";
$tdatapad_pad_spt[".addFields"][] = "created";
$tdatapad_pad_spt[".addFields"][] = "create_uid";
$tdatapad_pad_spt[".addFields"][] = "updated";
$tdatapad_pad_spt[".addFields"][] = "update_uid";
$tdatapad_pad_spt[".addFields"][] = "terimanip";
$tdatapad_pad_spt[".addFields"][] = "terimatgl";
$tdatapad_pad_spt[".addFields"][] = "kirimtgl";
$tdatapad_pad_spt[".addFields"][] = "isprint_dc";
$tdatapad_pad_spt[".addFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".addFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".addFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".addFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".addFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".addFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".addFields"][] = "r_tinggi";
$tdatapad_pad_spt[".addFields"][] = "r_njop";
$tdatapad_pad_spt[".addFields"][] = "r_status";
$tdatapad_pad_spt[".addFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".addFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".addFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".addFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".addFields"][] = "sptno_lama";
$tdatapad_pad_spt[".addFields"][] = "r_nama";
$tdatapad_pad_spt[".addFields"][] = "r_alamat";
$tdatapad_pad_spt[".addFields"][] = "omset1";
$tdatapad_pad_spt[".addFields"][] = "omset2";
$tdatapad_pad_spt[".addFields"][] = "omset3";
$tdatapad_pad_spt[".addFields"][] = "omset4";
$tdatapad_pad_spt[".addFields"][] = "omset5";
$tdatapad_pad_spt[".addFields"][] = "omset6";
$tdatapad_pad_spt[".addFields"][] = "omset7";
$tdatapad_pad_spt[".addFields"][] = "omset8";
$tdatapad_pad_spt[".addFields"][] = "omset9";
$tdatapad_pad_spt[".addFields"][] = "omset10";
$tdatapad_pad_spt[".addFields"][] = "omset11";
$tdatapad_pad_spt[".addFields"][] = "omset12";
$tdatapad_pad_spt[".addFields"][] = "omset13";
$tdatapad_pad_spt[".addFields"][] = "omset14";
$tdatapad_pad_spt[".addFields"][] = "omset15";
$tdatapad_pad_spt[".addFields"][] = "omset16";
$tdatapad_pad_spt[".addFields"][] = "omset17";
$tdatapad_pad_spt[".addFields"][] = "omset18";
$tdatapad_pad_spt[".addFields"][] = "omset19";
$tdatapad_pad_spt[".addFields"][] = "omset20";
$tdatapad_pad_spt[".addFields"][] = "omset21";
$tdatapad_pad_spt[".addFields"][] = "omset22";
$tdatapad_pad_spt[".addFields"][] = "omset23";
$tdatapad_pad_spt[".addFields"][] = "omset24";
$tdatapad_pad_spt[".addFields"][] = "omset25";
$tdatapad_pad_spt[".addFields"][] = "omset26";
$tdatapad_pad_spt[".addFields"][] = "omset27";
$tdatapad_pad_spt[".addFields"][] = "omset28";
$tdatapad_pad_spt[".addFields"][] = "omset29";
$tdatapad_pad_spt[".addFields"][] = "omset30";
$tdatapad_pad_spt[".addFields"][] = "omset31";
$tdatapad_pad_spt[".addFields"][] = "keterangan1";
$tdatapad_pad_spt[".addFields"][] = "keterangan2";
$tdatapad_pad_spt[".addFields"][] = "keterangan3";
$tdatapad_pad_spt[".addFields"][] = "keterangan4";
$tdatapad_pad_spt[".addFields"][] = "keterangan5";
$tdatapad_pad_spt[".addFields"][] = "keterangan6";
$tdatapad_pad_spt[".addFields"][] = "keterangan7";
$tdatapad_pad_spt[".addFields"][] = "keterangan8";
$tdatapad_pad_spt[".addFields"][] = "keterangan9";
$tdatapad_pad_spt[".addFields"][] = "keterangan10";
$tdatapad_pad_spt[".addFields"][] = "keterangan11";
$tdatapad_pad_spt[".addFields"][] = "keterangan12";
$tdatapad_pad_spt[".addFields"][] = "keterangan13";
$tdatapad_pad_spt[".addFields"][] = "keterangan14";
$tdatapad_pad_spt[".addFields"][] = "keterangan15";
$tdatapad_pad_spt[".addFields"][] = "keterangan16";
$tdatapad_pad_spt[".addFields"][] = "keterangan17";
$tdatapad_pad_spt[".addFields"][] = "keterangan18";
$tdatapad_pad_spt[".addFields"][] = "keterangan19";
$tdatapad_pad_spt[".addFields"][] = "keterangan20";
$tdatapad_pad_spt[".addFields"][] = "keterangan21";
$tdatapad_pad_spt[".addFields"][] = "keterangan22";
$tdatapad_pad_spt[".addFields"][] = "keterangan23";
$tdatapad_pad_spt[".addFields"][] = "keterangan24";
$tdatapad_pad_spt[".addFields"][] = "keterangan25";
$tdatapad_pad_spt[".addFields"][] = "keterangan26";
$tdatapad_pad_spt[".addFields"][] = "keterangan27";
$tdatapad_pad_spt[".addFields"][] = "keterangan28";
$tdatapad_pad_spt[".addFields"][] = "keterangan29";
$tdatapad_pad_spt[".addFields"][] = "keterangan30";
$tdatapad_pad_spt[".addFields"][] = "keterangan31";
$tdatapad_pad_spt[".addFields"][] = "doc_no";
$tdatapad_pad_spt[".addFields"][] = "cara_bayar";
$tdatapad_pad_spt[".addFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".addFields"][] = "zona_id";
$tdatapad_pad_spt[".addFields"][] = "manfaat_id";
$tdatapad_pad_spt[".addFields"][] = "golongan";
$tdatapad_pad_spt[".addFields"][] = "omset_lain";
$tdatapad_pad_spt[".addFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".addFields"][] = "ijin_no";
$tdatapad_pad_spt[".addFields"][] = "jenis_masa";
$tdatapad_pad_spt[".addFields"][] = "skpd_lama";
$tdatapad_pad_spt[".addFields"][] = "proses";
$tdatapad_pad_spt[".addFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".addFields"][] = "bulan";
$tdatapad_pad_spt[".addFields"][] = "no_telp";
$tdatapad_pad_spt[".addFields"][] = "usaha_id";
$tdatapad_pad_spt[".addFields"][] = "multiple";
$tdatapad_pad_spt[".addFields"][] = "bulan_telat";

$tdatapad_pad_spt[".inlineAddFields"] = array();
$tdatapad_pad_spt[".inlineAddFields"][] = "tahun";
$tdatapad_pad_spt[".inlineAddFields"][] = "sptno";
$tdatapad_pad_spt[".inlineAddFields"][] = "customer_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "rekening_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "pajak_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "type_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "so";
$tdatapad_pad_spt[".inlineAddFields"][] = "masadari";
$tdatapad_pad_spt[".inlineAddFields"][] = "masasd";
$tdatapad_pad_spt[".inlineAddFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_bayarid";
$tdatapad_pad_spt[".inlineAddFields"][] = "minimal_omset";
$tdatapad_pad_spt[".inlineAddFields"][] = "dasar";
$tdatapad_pad_spt[".inlineAddFields"][] = "tarif";
$tdatapad_pad_spt[".inlineAddFields"][] = "denda";
$tdatapad_pad_spt[".inlineAddFields"][] = "bunga";
$tdatapad_pad_spt[".inlineAddFields"][] = "setoran";
$tdatapad_pad_spt[".inlineAddFields"][] = "kenaikan";
$tdatapad_pad_spt[".inlineAddFields"][] = "kompensasi";
$tdatapad_pad_spt[".inlineAddFields"][] = "lain2";
$tdatapad_pad_spt[".inlineAddFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".inlineAddFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "air_zona_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "meteran_awal";
$tdatapad_pad_spt[".inlineAddFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".inlineAddFields"][] = "volume";
$tdatapad_pad_spt[".inlineAddFields"][] = "satuan";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_panjang";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_lebar";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_muka";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_banyak";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_luas";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_tarifid";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_kontrak";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_lama";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_lokasi";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_judul";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_calculated";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_nsr";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_nsrno";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".inlineAddFields"][] = "notes";
$tdatapad_pad_spt[".inlineAddFields"][] = "unit_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "enabled";
$tdatapad_pad_spt[".inlineAddFields"][] = "created";
$tdatapad_pad_spt[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_spt[".inlineAddFields"][] = "updated";
$tdatapad_pad_spt[".inlineAddFields"][] = "update_uid";
$tdatapad_pad_spt[".inlineAddFields"][] = "terimanip";
$tdatapad_pad_spt[".inlineAddFields"][] = "terimatgl";
$tdatapad_pad_spt[".inlineAddFields"][] = "kirimtgl";
$tdatapad_pad_spt[".inlineAddFields"][] = "isprint_dc";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_tinggi";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_njop";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_status";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".inlineAddFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".inlineAddFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".inlineAddFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".inlineAddFields"][] = "sptno_lama";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_nama";
$tdatapad_pad_spt[".inlineAddFields"][] = "r_alamat";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset1";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset2";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset3";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset4";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset5";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset6";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset7";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset8";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset9";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset10";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset11";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset12";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset13";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset14";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset15";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset16";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset17";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset18";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset19";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset20";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset21";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset22";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset23";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset24";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset25";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset26";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset27";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset28";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset29";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset30";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset31";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan1";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan2";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan3";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan4";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan5";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan6";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan7";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan8";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan9";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan10";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan11";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan12";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan13";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan14";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan15";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan16";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan17";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan18";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan19";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan20";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan21";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan22";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan23";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan24";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan25";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan26";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan27";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan28";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan29";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan30";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan31";
$tdatapad_pad_spt[".inlineAddFields"][] = "doc_no";
$tdatapad_pad_spt[".inlineAddFields"][] = "cara_bayar";
$tdatapad_pad_spt[".inlineAddFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "zona_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "manfaat_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "golongan";
$tdatapad_pad_spt[".inlineAddFields"][] = "omset_lain";
$tdatapad_pad_spt[".inlineAddFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".inlineAddFields"][] = "ijin_no";
$tdatapad_pad_spt[".inlineAddFields"][] = "jenis_masa";
$tdatapad_pad_spt[".inlineAddFields"][] = "skpd_lama";
$tdatapad_pad_spt[".inlineAddFields"][] = "proses";
$tdatapad_pad_spt[".inlineAddFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".inlineAddFields"][] = "bulan";
$tdatapad_pad_spt[".inlineAddFields"][] = "no_telp";
$tdatapad_pad_spt[".inlineAddFields"][] = "usaha_id";
$tdatapad_pad_spt[".inlineAddFields"][] = "multiple";
$tdatapad_pad_spt[".inlineAddFields"][] = "bulan_telat";

$tdatapad_pad_spt[".editFields"] = array();
$tdatapad_pad_spt[".editFields"][] = "tahun";
$tdatapad_pad_spt[".editFields"][] = "sptno";
$tdatapad_pad_spt[".editFields"][] = "customer_id";
$tdatapad_pad_spt[".editFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".editFields"][] = "rekening_id";
$tdatapad_pad_spt[".editFields"][] = "pajak_id";
$tdatapad_pad_spt[".editFields"][] = "type_id";
$tdatapad_pad_spt[".editFields"][] = "so";
$tdatapad_pad_spt[".editFields"][] = "masadari";
$tdatapad_pad_spt[".editFields"][] = "masasd";
$tdatapad_pad_spt[".editFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".editFields"][] = "r_bayarid";
$tdatapad_pad_spt[".editFields"][] = "minimal_omset";
$tdatapad_pad_spt[".editFields"][] = "dasar";
$tdatapad_pad_spt[".editFields"][] = "tarif";
$tdatapad_pad_spt[".editFields"][] = "denda";
$tdatapad_pad_spt[".editFields"][] = "bunga";
$tdatapad_pad_spt[".editFields"][] = "setoran";
$tdatapad_pad_spt[".editFields"][] = "kenaikan";
$tdatapad_pad_spt[".editFields"][] = "kompensasi";
$tdatapad_pad_spt[".editFields"][] = "lain2";
$tdatapad_pad_spt[".editFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".editFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".editFields"][] = "air_zona_id";
$tdatapad_pad_spt[".editFields"][] = "meteran_awal";
$tdatapad_pad_spt[".editFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".editFields"][] = "volume";
$tdatapad_pad_spt[".editFields"][] = "satuan";
$tdatapad_pad_spt[".editFields"][] = "r_panjang";
$tdatapad_pad_spt[".editFields"][] = "r_lebar";
$tdatapad_pad_spt[".editFields"][] = "r_muka";
$tdatapad_pad_spt[".editFields"][] = "r_banyak";
$tdatapad_pad_spt[".editFields"][] = "r_luas";
$tdatapad_pad_spt[".editFields"][] = "r_tarifid";
$tdatapad_pad_spt[".editFields"][] = "r_kontrak";
$tdatapad_pad_spt[".editFields"][] = "r_lama";
$tdatapad_pad_spt[".editFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".editFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".editFields"][] = "r_lokasi";
$tdatapad_pad_spt[".editFields"][] = "r_judul";
$tdatapad_pad_spt[".editFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".editFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".editFields"][] = "r_calculated";
$tdatapad_pad_spt[".editFields"][] = "r_nsr";
$tdatapad_pad_spt[".editFields"][] = "r_nsrno";
$tdatapad_pad_spt[".editFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".editFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".editFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".editFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".editFields"][] = "notes";
$tdatapad_pad_spt[".editFields"][] = "unit_id";
$tdatapad_pad_spt[".editFields"][] = "enabled";
$tdatapad_pad_spt[".editFields"][] = "created";
$tdatapad_pad_spt[".editFields"][] = "create_uid";
$tdatapad_pad_spt[".editFields"][] = "updated";
$tdatapad_pad_spt[".editFields"][] = "update_uid";
$tdatapad_pad_spt[".editFields"][] = "terimanip";
$tdatapad_pad_spt[".editFields"][] = "terimatgl";
$tdatapad_pad_spt[".editFields"][] = "kirimtgl";
$tdatapad_pad_spt[".editFields"][] = "isprint_dc";
$tdatapad_pad_spt[".editFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".editFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".editFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".editFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".editFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".editFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".editFields"][] = "r_tinggi";
$tdatapad_pad_spt[".editFields"][] = "r_njop";
$tdatapad_pad_spt[".editFields"][] = "r_status";
$tdatapad_pad_spt[".editFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".editFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".editFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".editFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".editFields"][] = "sptno_lama";
$tdatapad_pad_spt[".editFields"][] = "r_nama";
$tdatapad_pad_spt[".editFields"][] = "r_alamat";
$tdatapad_pad_spt[".editFields"][] = "omset1";
$tdatapad_pad_spt[".editFields"][] = "omset2";
$tdatapad_pad_spt[".editFields"][] = "omset3";
$tdatapad_pad_spt[".editFields"][] = "omset4";
$tdatapad_pad_spt[".editFields"][] = "omset5";
$tdatapad_pad_spt[".editFields"][] = "omset6";
$tdatapad_pad_spt[".editFields"][] = "omset7";
$tdatapad_pad_spt[".editFields"][] = "omset8";
$tdatapad_pad_spt[".editFields"][] = "omset9";
$tdatapad_pad_spt[".editFields"][] = "omset10";
$tdatapad_pad_spt[".editFields"][] = "omset11";
$tdatapad_pad_spt[".editFields"][] = "omset12";
$tdatapad_pad_spt[".editFields"][] = "omset13";
$tdatapad_pad_spt[".editFields"][] = "omset14";
$tdatapad_pad_spt[".editFields"][] = "omset15";
$tdatapad_pad_spt[".editFields"][] = "omset16";
$tdatapad_pad_spt[".editFields"][] = "omset17";
$tdatapad_pad_spt[".editFields"][] = "omset18";
$tdatapad_pad_spt[".editFields"][] = "omset19";
$tdatapad_pad_spt[".editFields"][] = "omset20";
$tdatapad_pad_spt[".editFields"][] = "omset21";
$tdatapad_pad_spt[".editFields"][] = "omset22";
$tdatapad_pad_spt[".editFields"][] = "omset23";
$tdatapad_pad_spt[".editFields"][] = "omset24";
$tdatapad_pad_spt[".editFields"][] = "omset25";
$tdatapad_pad_spt[".editFields"][] = "omset26";
$tdatapad_pad_spt[".editFields"][] = "omset27";
$tdatapad_pad_spt[".editFields"][] = "omset28";
$tdatapad_pad_spt[".editFields"][] = "omset29";
$tdatapad_pad_spt[".editFields"][] = "omset30";
$tdatapad_pad_spt[".editFields"][] = "omset31";
$tdatapad_pad_spt[".editFields"][] = "keterangan1";
$tdatapad_pad_spt[".editFields"][] = "keterangan2";
$tdatapad_pad_spt[".editFields"][] = "keterangan3";
$tdatapad_pad_spt[".editFields"][] = "keterangan4";
$tdatapad_pad_spt[".editFields"][] = "keterangan5";
$tdatapad_pad_spt[".editFields"][] = "keterangan6";
$tdatapad_pad_spt[".editFields"][] = "keterangan7";
$tdatapad_pad_spt[".editFields"][] = "keterangan8";
$tdatapad_pad_spt[".editFields"][] = "keterangan9";
$tdatapad_pad_spt[".editFields"][] = "keterangan10";
$tdatapad_pad_spt[".editFields"][] = "keterangan11";
$tdatapad_pad_spt[".editFields"][] = "keterangan12";
$tdatapad_pad_spt[".editFields"][] = "keterangan13";
$tdatapad_pad_spt[".editFields"][] = "keterangan14";
$tdatapad_pad_spt[".editFields"][] = "keterangan15";
$tdatapad_pad_spt[".editFields"][] = "keterangan16";
$tdatapad_pad_spt[".editFields"][] = "keterangan17";
$tdatapad_pad_spt[".editFields"][] = "keterangan18";
$tdatapad_pad_spt[".editFields"][] = "keterangan19";
$tdatapad_pad_spt[".editFields"][] = "keterangan20";
$tdatapad_pad_spt[".editFields"][] = "keterangan21";
$tdatapad_pad_spt[".editFields"][] = "keterangan22";
$tdatapad_pad_spt[".editFields"][] = "keterangan23";
$tdatapad_pad_spt[".editFields"][] = "keterangan24";
$tdatapad_pad_spt[".editFields"][] = "keterangan25";
$tdatapad_pad_spt[".editFields"][] = "keterangan26";
$tdatapad_pad_spt[".editFields"][] = "keterangan27";
$tdatapad_pad_spt[".editFields"][] = "keterangan28";
$tdatapad_pad_spt[".editFields"][] = "keterangan29";
$tdatapad_pad_spt[".editFields"][] = "keterangan30";
$tdatapad_pad_spt[".editFields"][] = "keterangan31";
$tdatapad_pad_spt[".editFields"][] = "doc_no";
$tdatapad_pad_spt[".editFields"][] = "cara_bayar";
$tdatapad_pad_spt[".editFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".editFields"][] = "zona_id";
$tdatapad_pad_spt[".editFields"][] = "manfaat_id";
$tdatapad_pad_spt[".editFields"][] = "golongan";
$tdatapad_pad_spt[".editFields"][] = "omset_lain";
$tdatapad_pad_spt[".editFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".editFields"][] = "ijin_no";
$tdatapad_pad_spt[".editFields"][] = "jenis_masa";
$tdatapad_pad_spt[".editFields"][] = "skpd_lama";
$tdatapad_pad_spt[".editFields"][] = "proses";
$tdatapad_pad_spt[".editFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".editFields"][] = "bulan";
$tdatapad_pad_spt[".editFields"][] = "no_telp";
$tdatapad_pad_spt[".editFields"][] = "usaha_id";
$tdatapad_pad_spt[".editFields"][] = "multiple";
$tdatapad_pad_spt[".editFields"][] = "bulan_telat";

$tdatapad_pad_spt[".inlineEditFields"] = array();
$tdatapad_pad_spt[".inlineEditFields"][] = "tahun";
$tdatapad_pad_spt[".inlineEditFields"][] = "sptno";
$tdatapad_pad_spt[".inlineEditFields"][] = "customer_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "rekening_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "pajak_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "type_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "so";
$tdatapad_pad_spt[".inlineEditFields"][] = "masadari";
$tdatapad_pad_spt[".inlineEditFields"][] = "masasd";
$tdatapad_pad_spt[".inlineEditFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_bayarid";
$tdatapad_pad_spt[".inlineEditFields"][] = "minimal_omset";
$tdatapad_pad_spt[".inlineEditFields"][] = "dasar";
$tdatapad_pad_spt[".inlineEditFields"][] = "tarif";
$tdatapad_pad_spt[".inlineEditFields"][] = "denda";
$tdatapad_pad_spt[".inlineEditFields"][] = "bunga";
$tdatapad_pad_spt[".inlineEditFields"][] = "setoran";
$tdatapad_pad_spt[".inlineEditFields"][] = "kenaikan";
$tdatapad_pad_spt[".inlineEditFields"][] = "kompensasi";
$tdatapad_pad_spt[".inlineEditFields"][] = "lain2";
$tdatapad_pad_spt[".inlineEditFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".inlineEditFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "air_zona_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "meteran_awal";
$tdatapad_pad_spt[".inlineEditFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".inlineEditFields"][] = "volume";
$tdatapad_pad_spt[".inlineEditFields"][] = "satuan";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_panjang";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_lebar";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_muka";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_banyak";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_luas";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_tarifid";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_kontrak";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_lama";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_lokasi";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_judul";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_calculated";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_nsr";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_nsrno";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".inlineEditFields"][] = "notes";
$tdatapad_pad_spt[".inlineEditFields"][] = "unit_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "enabled";
$tdatapad_pad_spt[".inlineEditFields"][] = "created";
$tdatapad_pad_spt[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_spt[".inlineEditFields"][] = "updated";
$tdatapad_pad_spt[".inlineEditFields"][] = "update_uid";
$tdatapad_pad_spt[".inlineEditFields"][] = "terimanip";
$tdatapad_pad_spt[".inlineEditFields"][] = "terimatgl";
$tdatapad_pad_spt[".inlineEditFields"][] = "kirimtgl";
$tdatapad_pad_spt[".inlineEditFields"][] = "isprint_dc";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_tinggi";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_njop";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_status";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".inlineEditFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".inlineEditFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".inlineEditFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".inlineEditFields"][] = "sptno_lama";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_nama";
$tdatapad_pad_spt[".inlineEditFields"][] = "r_alamat";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset1";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset2";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset3";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset4";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset5";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset6";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset7";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset8";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset9";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset10";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset11";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset12";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset13";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset14";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset15";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset16";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset17";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset18";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset19";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset20";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset21";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset22";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset23";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset24";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset25";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset26";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset27";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset28";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset29";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset30";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset31";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan1";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan2";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan3";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan4";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan5";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan6";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan7";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan8";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan9";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan10";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan11";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan12";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan13";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan14";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan15";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan16";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan17";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan18";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan19";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan20";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan21";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan22";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan23";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan24";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan25";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan26";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan27";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan28";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan29";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan30";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan31";
$tdatapad_pad_spt[".inlineEditFields"][] = "doc_no";
$tdatapad_pad_spt[".inlineEditFields"][] = "cara_bayar";
$tdatapad_pad_spt[".inlineEditFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "zona_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "manfaat_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "golongan";
$tdatapad_pad_spt[".inlineEditFields"][] = "omset_lain";
$tdatapad_pad_spt[".inlineEditFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".inlineEditFields"][] = "ijin_no";
$tdatapad_pad_spt[".inlineEditFields"][] = "jenis_masa";
$tdatapad_pad_spt[".inlineEditFields"][] = "skpd_lama";
$tdatapad_pad_spt[".inlineEditFields"][] = "proses";
$tdatapad_pad_spt[".inlineEditFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".inlineEditFields"][] = "bulan";
$tdatapad_pad_spt[".inlineEditFields"][] = "no_telp";
$tdatapad_pad_spt[".inlineEditFields"][] = "usaha_id";
$tdatapad_pad_spt[".inlineEditFields"][] = "multiple";
$tdatapad_pad_spt[".inlineEditFields"][] = "bulan_telat";

$tdatapad_pad_spt[".exportFields"] = array();
$tdatapad_pad_spt[".exportFields"][] = "id";
$tdatapad_pad_spt[".exportFields"][] = "tahun";
$tdatapad_pad_spt[".exportFields"][] = "sptno";
$tdatapad_pad_spt[".exportFields"][] = "customer_id";
$tdatapad_pad_spt[".exportFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".exportFields"][] = "rekening_id";
$tdatapad_pad_spt[".exportFields"][] = "pajak_id";
$tdatapad_pad_spt[".exportFields"][] = "type_id";
$tdatapad_pad_spt[".exportFields"][] = "so";
$tdatapad_pad_spt[".exportFields"][] = "masadari";
$tdatapad_pad_spt[".exportFields"][] = "masasd";
$tdatapad_pad_spt[".exportFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".exportFields"][] = "r_bayarid";
$tdatapad_pad_spt[".exportFields"][] = "minimal_omset";
$tdatapad_pad_spt[".exportFields"][] = "dasar";
$tdatapad_pad_spt[".exportFields"][] = "tarif";
$tdatapad_pad_spt[".exportFields"][] = "denda";
$tdatapad_pad_spt[".exportFields"][] = "bunga";
$tdatapad_pad_spt[".exportFields"][] = "setoran";
$tdatapad_pad_spt[".exportFields"][] = "kenaikan";
$tdatapad_pad_spt[".exportFields"][] = "kompensasi";
$tdatapad_pad_spt[".exportFields"][] = "lain2";
$tdatapad_pad_spt[".exportFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".exportFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".exportFields"][] = "air_zona_id";
$tdatapad_pad_spt[".exportFields"][] = "meteran_awal";
$tdatapad_pad_spt[".exportFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".exportFields"][] = "volume";
$tdatapad_pad_spt[".exportFields"][] = "satuan";
$tdatapad_pad_spt[".exportFields"][] = "r_panjang";
$tdatapad_pad_spt[".exportFields"][] = "r_lebar";
$tdatapad_pad_spt[".exportFields"][] = "r_muka";
$tdatapad_pad_spt[".exportFields"][] = "r_banyak";
$tdatapad_pad_spt[".exportFields"][] = "r_luas";
$tdatapad_pad_spt[".exportFields"][] = "r_tarifid";
$tdatapad_pad_spt[".exportFields"][] = "r_kontrak";
$tdatapad_pad_spt[".exportFields"][] = "r_lama";
$tdatapad_pad_spt[".exportFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".exportFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".exportFields"][] = "r_lokasi";
$tdatapad_pad_spt[".exportFields"][] = "r_judul";
$tdatapad_pad_spt[".exportFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".exportFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".exportFields"][] = "r_calculated";
$tdatapad_pad_spt[".exportFields"][] = "r_nsr";
$tdatapad_pad_spt[".exportFields"][] = "r_nsrno";
$tdatapad_pad_spt[".exportFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".exportFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".exportFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".exportFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".exportFields"][] = "notes";
$tdatapad_pad_spt[".exportFields"][] = "unit_id";
$tdatapad_pad_spt[".exportFields"][] = "enabled";
$tdatapad_pad_spt[".exportFields"][] = "created";
$tdatapad_pad_spt[".exportFields"][] = "create_uid";
$tdatapad_pad_spt[".exportFields"][] = "updated";
$tdatapad_pad_spt[".exportFields"][] = "update_uid";
$tdatapad_pad_spt[".exportFields"][] = "terimanip";
$tdatapad_pad_spt[".exportFields"][] = "terimatgl";
$tdatapad_pad_spt[".exportFields"][] = "kirimtgl";
$tdatapad_pad_spt[".exportFields"][] = "isprint_dc";
$tdatapad_pad_spt[".exportFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".exportFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".exportFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".exportFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".exportFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".exportFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".exportFields"][] = "r_tinggi";
$tdatapad_pad_spt[".exportFields"][] = "r_njop";
$tdatapad_pad_spt[".exportFields"][] = "r_status";
$tdatapad_pad_spt[".exportFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".exportFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".exportFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".exportFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".exportFields"][] = "sptno_lama";
$tdatapad_pad_spt[".exportFields"][] = "r_nama";
$tdatapad_pad_spt[".exportFields"][] = "r_alamat";
$tdatapad_pad_spt[".exportFields"][] = "omset1";
$tdatapad_pad_spt[".exportFields"][] = "omset2";
$tdatapad_pad_spt[".exportFields"][] = "omset3";
$tdatapad_pad_spt[".exportFields"][] = "omset4";
$tdatapad_pad_spt[".exportFields"][] = "omset5";
$tdatapad_pad_spt[".exportFields"][] = "omset6";
$tdatapad_pad_spt[".exportFields"][] = "omset7";
$tdatapad_pad_spt[".exportFields"][] = "omset8";
$tdatapad_pad_spt[".exportFields"][] = "omset9";
$tdatapad_pad_spt[".exportFields"][] = "omset10";
$tdatapad_pad_spt[".exportFields"][] = "omset11";
$tdatapad_pad_spt[".exportFields"][] = "omset12";
$tdatapad_pad_spt[".exportFields"][] = "omset13";
$tdatapad_pad_spt[".exportFields"][] = "omset14";
$tdatapad_pad_spt[".exportFields"][] = "omset15";
$tdatapad_pad_spt[".exportFields"][] = "omset16";
$tdatapad_pad_spt[".exportFields"][] = "omset17";
$tdatapad_pad_spt[".exportFields"][] = "omset18";
$tdatapad_pad_spt[".exportFields"][] = "omset19";
$tdatapad_pad_spt[".exportFields"][] = "omset20";
$tdatapad_pad_spt[".exportFields"][] = "omset21";
$tdatapad_pad_spt[".exportFields"][] = "omset22";
$tdatapad_pad_spt[".exportFields"][] = "omset23";
$tdatapad_pad_spt[".exportFields"][] = "omset24";
$tdatapad_pad_spt[".exportFields"][] = "omset25";
$tdatapad_pad_spt[".exportFields"][] = "omset26";
$tdatapad_pad_spt[".exportFields"][] = "omset27";
$tdatapad_pad_spt[".exportFields"][] = "omset28";
$tdatapad_pad_spt[".exportFields"][] = "omset29";
$tdatapad_pad_spt[".exportFields"][] = "omset30";
$tdatapad_pad_spt[".exportFields"][] = "omset31";
$tdatapad_pad_spt[".exportFields"][] = "keterangan1";
$tdatapad_pad_spt[".exportFields"][] = "keterangan2";
$tdatapad_pad_spt[".exportFields"][] = "keterangan3";
$tdatapad_pad_spt[".exportFields"][] = "keterangan4";
$tdatapad_pad_spt[".exportFields"][] = "keterangan5";
$tdatapad_pad_spt[".exportFields"][] = "keterangan6";
$tdatapad_pad_spt[".exportFields"][] = "keterangan7";
$tdatapad_pad_spt[".exportFields"][] = "keterangan8";
$tdatapad_pad_spt[".exportFields"][] = "keterangan9";
$tdatapad_pad_spt[".exportFields"][] = "keterangan10";
$tdatapad_pad_spt[".exportFields"][] = "keterangan11";
$tdatapad_pad_spt[".exportFields"][] = "keterangan12";
$tdatapad_pad_spt[".exportFields"][] = "keterangan13";
$tdatapad_pad_spt[".exportFields"][] = "keterangan14";
$tdatapad_pad_spt[".exportFields"][] = "keterangan15";
$tdatapad_pad_spt[".exportFields"][] = "keterangan16";
$tdatapad_pad_spt[".exportFields"][] = "keterangan17";
$tdatapad_pad_spt[".exportFields"][] = "keterangan18";
$tdatapad_pad_spt[".exportFields"][] = "keterangan19";
$tdatapad_pad_spt[".exportFields"][] = "keterangan20";
$tdatapad_pad_spt[".exportFields"][] = "keterangan21";
$tdatapad_pad_spt[".exportFields"][] = "keterangan22";
$tdatapad_pad_spt[".exportFields"][] = "keterangan23";
$tdatapad_pad_spt[".exportFields"][] = "keterangan24";
$tdatapad_pad_spt[".exportFields"][] = "keterangan25";
$tdatapad_pad_spt[".exportFields"][] = "keterangan26";
$tdatapad_pad_spt[".exportFields"][] = "keterangan27";
$tdatapad_pad_spt[".exportFields"][] = "keterangan28";
$tdatapad_pad_spt[".exportFields"][] = "keterangan29";
$tdatapad_pad_spt[".exportFields"][] = "keterangan30";
$tdatapad_pad_spt[".exportFields"][] = "keterangan31";
$tdatapad_pad_spt[".exportFields"][] = "doc_no";
$tdatapad_pad_spt[".exportFields"][] = "cara_bayar";
$tdatapad_pad_spt[".exportFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".exportFields"][] = "zona_id";
$tdatapad_pad_spt[".exportFields"][] = "manfaat_id";
$tdatapad_pad_spt[".exportFields"][] = "golongan";
$tdatapad_pad_spt[".exportFields"][] = "omset_lain";
$tdatapad_pad_spt[".exportFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".exportFields"][] = "ijin_no";
$tdatapad_pad_spt[".exportFields"][] = "jenis_masa";
$tdatapad_pad_spt[".exportFields"][] = "skpd_lama";
$tdatapad_pad_spt[".exportFields"][] = "proses";
$tdatapad_pad_spt[".exportFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".exportFields"][] = "bulan";
$tdatapad_pad_spt[".exportFields"][] = "no_telp";
$tdatapad_pad_spt[".exportFields"][] = "usaha_id";
$tdatapad_pad_spt[".exportFields"][] = "multiple";
$tdatapad_pad_spt[".exportFields"][] = "bulan_telat";

$tdatapad_pad_spt[".printFields"] = array();
$tdatapad_pad_spt[".printFields"][] = "id";
$tdatapad_pad_spt[".printFields"][] = "tahun";
$tdatapad_pad_spt[".printFields"][] = "sptno";
$tdatapad_pad_spt[".printFields"][] = "customer_id";
$tdatapad_pad_spt[".printFields"][] = "customer_usaha_id";
$tdatapad_pad_spt[".printFields"][] = "rekening_id";
$tdatapad_pad_spt[".printFields"][] = "pajak_id";
$tdatapad_pad_spt[".printFields"][] = "type_id";
$tdatapad_pad_spt[".printFields"][] = "so";
$tdatapad_pad_spt[".printFields"][] = "masadari";
$tdatapad_pad_spt[".printFields"][] = "masasd";
$tdatapad_pad_spt[".printFields"][] = "jatuhtempotgl";
$tdatapad_pad_spt[".printFields"][] = "r_bayarid";
$tdatapad_pad_spt[".printFields"][] = "minimal_omset";
$tdatapad_pad_spt[".printFields"][] = "dasar";
$tdatapad_pad_spt[".printFields"][] = "tarif";
$tdatapad_pad_spt[".printFields"][] = "denda";
$tdatapad_pad_spt[".printFields"][] = "bunga";
$tdatapad_pad_spt[".printFields"][] = "setoran";
$tdatapad_pad_spt[".printFields"][] = "kenaikan";
$tdatapad_pad_spt[".printFields"][] = "kompensasi";
$tdatapad_pad_spt[".printFields"][] = "lain2";
$tdatapad_pad_spt[".printFields"][] = "pajak_terhutang";
$tdatapad_pad_spt[".printFields"][] = "air_manfaat_id";
$tdatapad_pad_spt[".printFields"][] = "air_zona_id";
$tdatapad_pad_spt[".printFields"][] = "meteran_awal";
$tdatapad_pad_spt[".printFields"][] = "meteran_akhir";
$tdatapad_pad_spt[".printFields"][] = "volume";
$tdatapad_pad_spt[".printFields"][] = "satuan";
$tdatapad_pad_spt[".printFields"][] = "r_panjang";
$tdatapad_pad_spt[".printFields"][] = "r_lebar";
$tdatapad_pad_spt[".printFields"][] = "r_muka";
$tdatapad_pad_spt[".printFields"][] = "r_banyak";
$tdatapad_pad_spt[".printFields"][] = "r_luas";
$tdatapad_pad_spt[".printFields"][] = "r_tarifid";
$tdatapad_pad_spt[".printFields"][] = "r_kontrak";
$tdatapad_pad_spt[".printFields"][] = "r_lama";
$tdatapad_pad_spt[".printFields"][] = "r_jalan_id";
$tdatapad_pad_spt[".printFields"][] = "r_jalanklas_id";
$tdatapad_pad_spt[".printFields"][] = "r_lokasi";
$tdatapad_pad_spt[".printFields"][] = "r_judul";
$tdatapad_pad_spt[".printFields"][] = "r_kelurahan_id";
$tdatapad_pad_spt[".printFields"][] = "r_lokasi_id";
$tdatapad_pad_spt[".printFields"][] = "r_calculated";
$tdatapad_pad_spt[".printFields"][] = "r_nsr";
$tdatapad_pad_spt[".printFields"][] = "r_nsrno";
$tdatapad_pad_spt[".printFields"][] = "r_nsrtgl";
$tdatapad_pad_spt[".printFields"][] = "r_nsl_kecamatan_id";
$tdatapad_pad_spt[".printFields"][] = "r_nsl_type_id";
$tdatapad_pad_spt[".printFields"][] = "r_nsl_nilai";
$tdatapad_pad_spt[".printFields"][] = "notes";
$tdatapad_pad_spt[".printFields"][] = "unit_id";
$tdatapad_pad_spt[".printFields"][] = "enabled";
$tdatapad_pad_spt[".printFields"][] = "created";
$tdatapad_pad_spt[".printFields"][] = "create_uid";
$tdatapad_pad_spt[".printFields"][] = "updated";
$tdatapad_pad_spt[".printFields"][] = "update_uid";
$tdatapad_pad_spt[".printFields"][] = "terimanip";
$tdatapad_pad_spt[".printFields"][] = "terimatgl";
$tdatapad_pad_spt[".printFields"][] = "kirimtgl";
$tdatapad_pad_spt[".printFields"][] = "isprint_dc";
$tdatapad_pad_spt[".printFields"][] = "r_nsr_id";
$tdatapad_pad_spt[".printFields"][] = "r_lokasi_pasang_id";
$tdatapad_pad_spt[".printFields"][] = "r_lokasi_pasang_val";
$tdatapad_pad_spt[".printFields"][] = "r_jalanklas_val";
$tdatapad_pad_spt[".printFields"][] = "r_sudut_pandang_id";
$tdatapad_pad_spt[".printFields"][] = "r_sudut_pandang_val";
$tdatapad_pad_spt[".printFields"][] = "r_tinggi";
$tdatapad_pad_spt[".printFields"][] = "r_njop";
$tdatapad_pad_spt[".printFields"][] = "r_status";
$tdatapad_pad_spt[".printFields"][] = "r_njop_ketinggian";
$tdatapad_pad_spt[".printFields"][] = "status_pembayaran";
$tdatapad_pad_spt[".printFields"][] = "rek_no_paneng";
$tdatapad_pad_spt[".printFields"][] = "sptno_lengkap";
$tdatapad_pad_spt[".printFields"][] = "sptno_lama";
$tdatapad_pad_spt[".printFields"][] = "r_nama";
$tdatapad_pad_spt[".printFields"][] = "r_alamat";
$tdatapad_pad_spt[".printFields"][] = "omset1";
$tdatapad_pad_spt[".printFields"][] = "omset2";
$tdatapad_pad_spt[".printFields"][] = "omset3";
$tdatapad_pad_spt[".printFields"][] = "omset4";
$tdatapad_pad_spt[".printFields"][] = "omset5";
$tdatapad_pad_spt[".printFields"][] = "omset6";
$tdatapad_pad_spt[".printFields"][] = "omset7";
$tdatapad_pad_spt[".printFields"][] = "omset8";
$tdatapad_pad_spt[".printFields"][] = "omset9";
$tdatapad_pad_spt[".printFields"][] = "omset10";
$tdatapad_pad_spt[".printFields"][] = "omset11";
$tdatapad_pad_spt[".printFields"][] = "omset12";
$tdatapad_pad_spt[".printFields"][] = "omset13";
$tdatapad_pad_spt[".printFields"][] = "omset14";
$tdatapad_pad_spt[".printFields"][] = "omset15";
$tdatapad_pad_spt[".printFields"][] = "omset16";
$tdatapad_pad_spt[".printFields"][] = "omset17";
$tdatapad_pad_spt[".printFields"][] = "omset18";
$tdatapad_pad_spt[".printFields"][] = "omset19";
$tdatapad_pad_spt[".printFields"][] = "omset20";
$tdatapad_pad_spt[".printFields"][] = "omset21";
$tdatapad_pad_spt[".printFields"][] = "omset22";
$tdatapad_pad_spt[".printFields"][] = "omset23";
$tdatapad_pad_spt[".printFields"][] = "omset24";
$tdatapad_pad_spt[".printFields"][] = "omset25";
$tdatapad_pad_spt[".printFields"][] = "omset26";
$tdatapad_pad_spt[".printFields"][] = "omset27";
$tdatapad_pad_spt[".printFields"][] = "omset28";
$tdatapad_pad_spt[".printFields"][] = "omset29";
$tdatapad_pad_spt[".printFields"][] = "omset30";
$tdatapad_pad_spt[".printFields"][] = "omset31";
$tdatapad_pad_spt[".printFields"][] = "keterangan1";
$tdatapad_pad_spt[".printFields"][] = "keterangan2";
$tdatapad_pad_spt[".printFields"][] = "keterangan3";
$tdatapad_pad_spt[".printFields"][] = "keterangan4";
$tdatapad_pad_spt[".printFields"][] = "keterangan5";
$tdatapad_pad_spt[".printFields"][] = "keterangan6";
$tdatapad_pad_spt[".printFields"][] = "keterangan7";
$tdatapad_pad_spt[".printFields"][] = "keterangan8";
$tdatapad_pad_spt[".printFields"][] = "keterangan9";
$tdatapad_pad_spt[".printFields"][] = "keterangan10";
$tdatapad_pad_spt[".printFields"][] = "keterangan11";
$tdatapad_pad_spt[".printFields"][] = "keterangan12";
$tdatapad_pad_spt[".printFields"][] = "keterangan13";
$tdatapad_pad_spt[".printFields"][] = "keterangan14";
$tdatapad_pad_spt[".printFields"][] = "keterangan15";
$tdatapad_pad_spt[".printFields"][] = "keterangan16";
$tdatapad_pad_spt[".printFields"][] = "keterangan17";
$tdatapad_pad_spt[".printFields"][] = "keterangan18";
$tdatapad_pad_spt[".printFields"][] = "keterangan19";
$tdatapad_pad_spt[".printFields"][] = "keterangan20";
$tdatapad_pad_spt[".printFields"][] = "keterangan21";
$tdatapad_pad_spt[".printFields"][] = "keterangan22";
$tdatapad_pad_spt[".printFields"][] = "keterangan23";
$tdatapad_pad_spt[".printFields"][] = "keterangan24";
$tdatapad_pad_spt[".printFields"][] = "keterangan25";
$tdatapad_pad_spt[".printFields"][] = "keterangan26";
$tdatapad_pad_spt[".printFields"][] = "keterangan27";
$tdatapad_pad_spt[".printFields"][] = "keterangan28";
$tdatapad_pad_spt[".printFields"][] = "keterangan29";
$tdatapad_pad_spt[".printFields"][] = "keterangan30";
$tdatapad_pad_spt[".printFields"][] = "keterangan31";
$tdatapad_pad_spt[".printFields"][] = "doc_no";
$tdatapad_pad_spt[".printFields"][] = "cara_bayar";
$tdatapad_pad_spt[".printFields"][] = "kelompok_usaha_id";
$tdatapad_pad_spt[".printFields"][] = "zona_id";
$tdatapad_pad_spt[".printFields"][] = "manfaat_id";
$tdatapad_pad_spt[".printFields"][] = "golongan";
$tdatapad_pad_spt[".printFields"][] = "omset_lain";
$tdatapad_pad_spt[".printFields"][] = "keterangan_lain";
$tdatapad_pad_spt[".printFields"][] = "ijin_no";
$tdatapad_pad_spt[".printFields"][] = "jenis_masa";
$tdatapad_pad_spt[".printFields"][] = "skpd_lama";
$tdatapad_pad_spt[".printFields"][] = "proses";
$tdatapad_pad_spt[".printFields"][] = "tanggal_validasi";
$tdatapad_pad_spt[".printFields"][] = "bulan";
$tdatapad_pad_spt[".printFields"][] = "no_telp";
$tdatapad_pad_spt[".printFields"][] = "usaha_id";
$tdatapad_pad_spt[".printFields"][] = "multiple";
$tdatapad_pad_spt[".printFields"][] = "bulan_telat";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["id"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["tahun"] = $fdata;
//	sptno
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "sptno";
	$fdata["GoodName"] = "sptno";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Sptno"; 
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
	
		$fdata["strField"] = "sptno"; 
		$fdata["FullName"] = "sptno";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["sptno"] = $fdata;
//	customer_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "customer_id";
	$fdata["GoodName"] = "customer_id";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["customer_id"] = $fdata;
//	customer_usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "customer_usaha_id";
	$fdata["GoodName"] = "customer_usaha_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Customer Usaha Id"; 
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
	
		$fdata["strField"] = "customer_usaha_id"; 
		$fdata["FullName"] = "customer_usaha_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
	$edata["LookupTable"] = "pad.pad_customer_usaha";
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
	
		
		
	$tdatapad_pad_spt["customer_usaha_id"] = $fdata;
//	rekening_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "rekening_id";
	$fdata["GoodName"] = "rekening_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Rekening Id"; 
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
	
		
		
	$tdatapad_pad_spt["rekening_id"] = $fdata;
//	pajak_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "pajak_id";
	$fdata["GoodName"] = "pajak_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Pajak Id"; 
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
	
		$fdata["strField"] = "pajak_id"; 
		$fdata["FullName"] = "pajak_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
	$edata["LookupTable"] = "pad.pad_jenis_pajak";
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
	
		
		
	$tdatapad_pad_spt["pajak_id"] = $fdata;
//	type_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "type_id";
	$fdata["GoodName"] = "type_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Type Id"; 
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
	
		$fdata["strField"] = "type_id"; 
		$fdata["FullName"] = "type_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad.pad_spt_type";
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
	
		
		
	$tdatapad_pad_spt["type_id"] = $fdata;
//	so
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "so";
	$fdata["GoodName"] = "so";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "So"; 
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_spt["so"] = $fdata;
//	masadari
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "masadari";
	$fdata["GoodName"] = "masadari";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Masadari"; 
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
	
		$fdata["strField"] = "masadari"; 
		$fdata["FullName"] = "masadari";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["masadari"] = $fdata;
//	masasd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "masasd";
	$fdata["GoodName"] = "masasd";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Masasd"; 
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
	
		$fdata["strField"] = "masasd"; 
		$fdata["FullName"] = "masasd";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["masasd"] = $fdata;
//	jatuhtempotgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "jatuhtempotgl";
	$fdata["GoodName"] = "jatuhtempotgl";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Jatuhtempotgl"; 
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
	
		$fdata["strField"] = "jatuhtempotgl"; 
		$fdata["FullName"] = "jatuhtempotgl";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["jatuhtempotgl"] = $fdata;
//	r_bayarid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "r_bayarid";
	$fdata["GoodName"] = "r_bayarid";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Bayarid"; 
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
	
		$fdata["strField"] = "r_bayarid"; 
		$fdata["FullName"] = "r_bayarid";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_bayarid"] = $fdata;
//	minimal_omset
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "minimal_omset";
	$fdata["GoodName"] = "minimal_omset";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Minimal Omset"; 
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
	
		$fdata["strField"] = "minimal_omset"; 
		$fdata["FullName"] = "minimal_omset";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["minimal_omset"] = $fdata;
//	dasar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "dasar";
	$fdata["GoodName"] = "dasar";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Dasar"; 
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
	
		$fdata["strField"] = "dasar"; 
		$fdata["FullName"] = "dasar";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["dasar"] = $fdata;
//	tarif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "tarif";
	$fdata["GoodName"] = "tarif";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Tarif"; 
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
	
		$fdata["strField"] = "tarif"; 
		$fdata["FullName"] = "tarif";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["tarif"] = $fdata;
//	denda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "denda";
	$fdata["GoodName"] = "denda";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["denda"] = $fdata;
//	bunga
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "bunga";
	$fdata["GoodName"] = "bunga";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["bunga"] = $fdata;
//	setoran
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "setoran";
	$fdata["GoodName"] = "setoran";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Setoran"; 
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
	
		$fdata["strField"] = "setoran"; 
		$fdata["FullName"] = "setoran";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["setoran"] = $fdata;
//	kenaikan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "kenaikan";
	$fdata["GoodName"] = "kenaikan";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Kenaikan"; 
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
	
		$fdata["strField"] = "kenaikan"; 
		$fdata["FullName"] = "kenaikan";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["kenaikan"] = $fdata;
//	kompensasi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "kompensasi";
	$fdata["GoodName"] = "kompensasi";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Kompensasi"; 
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
	
		$fdata["strField"] = "kompensasi"; 
		$fdata["FullName"] = "kompensasi";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["kompensasi"] = $fdata;
//	lain2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "lain2";
	$fdata["GoodName"] = "lain2";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Lain2"; 
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
	
		$fdata["strField"] = "lain2"; 
		$fdata["FullName"] = "lain2";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["lain2"] = $fdata;
//	pajak_terhutang
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "pajak_terhutang";
	$fdata["GoodName"] = "pajak_terhutang";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Pajak Terhutang"; 
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
	
		$fdata["strField"] = "pajak_terhutang"; 
		$fdata["FullName"] = "pajak_terhutang";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["pajak_terhutang"] = $fdata;
//	air_manfaat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
	$fdata["strName"] = "air_manfaat_id";
	$fdata["GoodName"] = "air_manfaat_id";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["air_manfaat_id"] = $fdata;
//	air_zona_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
	$fdata["strName"] = "air_zona_id";
	$fdata["GoodName"] = "air_zona_id";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["air_zona_id"] = $fdata;
//	meteran_awal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 26;
	$fdata["strName"] = "meteran_awal";
	$fdata["GoodName"] = "meteran_awal";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Meteran Awal"; 
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
	
		$fdata["strField"] = "meteran_awal"; 
		$fdata["FullName"] = "meteran_awal";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["meteran_awal"] = $fdata;
//	meteran_akhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 27;
	$fdata["strName"] = "meteran_akhir";
	$fdata["GoodName"] = "meteran_akhir";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Meteran Akhir"; 
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
	
		$fdata["strField"] = "meteran_akhir"; 
		$fdata["FullName"] = "meteran_akhir";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["meteran_akhir"] = $fdata;
//	volume
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 28;
	$fdata["strName"] = "volume";
	$fdata["GoodName"] = "volume";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Volume"; 
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
	
		$fdata["strField"] = "volume"; 
		$fdata["FullName"] = "volume";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["volume"] = $fdata;
//	satuan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 29;
	$fdata["strName"] = "satuan";
	$fdata["GoodName"] = "satuan";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Satuan"; 
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
	
		$fdata["strField"] = "satuan"; 
		$fdata["FullName"] = "satuan";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_spt["satuan"] = $fdata;
//	r_panjang
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 30;
	$fdata["strName"] = "r_panjang";
	$fdata["GoodName"] = "r_panjang";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Panjang"; 
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
	
		$fdata["strField"] = "r_panjang"; 
		$fdata["FullName"] = "r_panjang";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_panjang"] = $fdata;
//	r_lebar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 31;
	$fdata["strName"] = "r_lebar";
	$fdata["GoodName"] = "r_lebar";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Lebar"; 
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
	
		$fdata["strField"] = "r_lebar"; 
		$fdata["FullName"] = "r_lebar";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_lebar"] = $fdata;
//	r_muka
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 32;
	$fdata["strName"] = "r_muka";
	$fdata["GoodName"] = "r_muka";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Muka"; 
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
	
		$fdata["strField"] = "r_muka"; 
		$fdata["FullName"] = "r_muka";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_muka"] = $fdata;
//	r_banyak
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 33;
	$fdata["strName"] = "r_banyak";
	$fdata["GoodName"] = "r_banyak";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Banyak"; 
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
	
		$fdata["strField"] = "r_banyak"; 
		$fdata["FullName"] = "r_banyak";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_banyak"] = $fdata;
//	r_luas
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 34;
	$fdata["strName"] = "r_luas";
	$fdata["GoodName"] = "r_luas";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Luas"; 
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
	
		$fdata["strField"] = "r_luas"; 
		$fdata["FullName"] = "r_luas";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_luas"] = $fdata;
//	r_tarifid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 35;
	$fdata["strName"] = "r_tarifid";
	$fdata["GoodName"] = "r_tarifid";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Tarifid"; 
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
	
		$fdata["strField"] = "r_tarifid"; 
		$fdata["FullName"] = "r_tarifid";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_tarifid"] = $fdata;
//	r_kontrak
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 36;
	$fdata["strName"] = "r_kontrak";
	$fdata["GoodName"] = "r_kontrak";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Kontrak"; 
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
	
		$fdata["strField"] = "r_kontrak"; 
		$fdata["FullName"] = "r_kontrak";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_kontrak"] = $fdata;
//	r_lama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 37;
	$fdata["strName"] = "r_lama";
	$fdata["GoodName"] = "r_lama";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Lama"; 
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
	
		$fdata["strField"] = "r_lama"; 
		$fdata["FullName"] = "r_lama";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_lama"] = $fdata;
//	r_jalan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 38;
	$fdata["strName"] = "r_jalan_id";
	$fdata["GoodName"] = "r_jalan_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Jalan Id"; 
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
	
		$fdata["strField"] = "r_jalan_id"; 
		$fdata["FullName"] = "r_jalan_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_jalan_id"] = $fdata;
//	r_jalanklas_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 39;
	$fdata["strName"] = "r_jalanklas_id";
	$fdata["GoodName"] = "r_jalanklas_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Jalanklas Id"; 
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
	
		$fdata["strField"] = "r_jalanklas_id"; 
		$fdata["FullName"] = "r_jalanklas_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_jalanklas_id"] = $fdata;
//	r_lokasi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 40;
	$fdata["strName"] = "r_lokasi";
	$fdata["GoodName"] = "r_lokasi";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Lokasi"; 
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
	
		$fdata["strField"] = "r_lokasi"; 
		$fdata["FullName"] = "r_lokasi";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_lokasi"] = $fdata;
//	r_judul
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 41;
	$fdata["strName"] = "r_judul";
	$fdata["GoodName"] = "r_judul";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Judul"; 
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
	
		$fdata["strField"] = "r_judul"; 
		$fdata["FullName"] = "r_judul";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
			$edata["EditParams"].= " maxlength=200";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_spt["r_judul"] = $fdata;
//	r_kelurahan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 42;
	$fdata["strName"] = "r_kelurahan_id";
	$fdata["GoodName"] = "r_kelurahan_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Kelurahan Id"; 
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
	
		$fdata["strField"] = "r_kelurahan_id"; 
		$fdata["FullName"] = "r_kelurahan_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_kelurahan_id"] = $fdata;
//	r_lokasi_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 43;
	$fdata["strName"] = "r_lokasi_id";
	$fdata["GoodName"] = "r_lokasi_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Lokasi Id"; 
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
	
		$fdata["strField"] = "r_lokasi_id"; 
		$fdata["FullName"] = "r_lokasi_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_lokasi_id"] = $fdata;
//	r_calculated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 44;
	$fdata["strName"] = "r_calculated";
	$fdata["GoodName"] = "r_calculated";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Calculated"; 
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
	
		$fdata["strField"] = "r_calculated"; 
		$fdata["FullName"] = "r_calculated";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_calculated"] = $fdata;
//	r_nsr
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 45;
	$fdata["strName"] = "r_nsr";
	$fdata["GoodName"] = "r_nsr";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Nsr"; 
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
	
		$fdata["strField"] = "r_nsr"; 
		$fdata["FullName"] = "r_nsr";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_nsr"] = $fdata;
//	r_nsrno
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 46;
	$fdata["strName"] = "r_nsrno";
	$fdata["GoodName"] = "r_nsrno";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Nsrno"; 
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
	
		$fdata["strField"] = "r_nsrno"; 
		$fdata["FullName"] = "r_nsrno";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
			$edata["EditParams"].= " maxlength=30";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_spt["r_nsrno"] = $fdata;
//	r_nsrtgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 47;
	$fdata["strName"] = "r_nsrtgl";
	$fdata["GoodName"] = "r_nsrtgl";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Nsrtgl"; 
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
	
		$fdata["strField"] = "r_nsrtgl"; 
		$fdata["FullName"] = "r_nsrtgl";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_nsrtgl"] = $fdata;
//	r_nsl_kecamatan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 48;
	$fdata["strName"] = "r_nsl_kecamatan_id";
	$fdata["GoodName"] = "r_nsl_kecamatan_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Nsl Kecamatan Id"; 
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
	
		$fdata["strField"] = "r_nsl_kecamatan_id"; 
		$fdata["FullName"] = "r_nsl_kecamatan_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_nsl_kecamatan_id"] = $fdata;
//	r_nsl_type_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 49;
	$fdata["strName"] = "r_nsl_type_id";
	$fdata["GoodName"] = "r_nsl_type_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Nsl Type Id"; 
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
	
		$fdata["strField"] = "r_nsl_type_id"; 
		$fdata["FullName"] = "r_nsl_type_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_nsl_type_id"] = $fdata;
//	r_nsl_nilai
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 50;
	$fdata["strName"] = "r_nsl_nilai";
	$fdata["GoodName"] = "r_nsl_nilai";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Nsl Nilai"; 
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
	
		$fdata["strField"] = "r_nsl_nilai"; 
		$fdata["FullName"] = "r_nsl_nilai";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_nsl_nilai"] = $fdata;
//	notes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 51;
	$fdata["strName"] = "notes";
	$fdata["GoodName"] = "notes";
	$fdata["ownerTable"] = "pad.pad_spt";
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
			$edata["EditParams"].= " maxlength=255";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_spt["notes"] = $fdata;
//	unit_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 52;
	$fdata["strName"] = "unit_id";
	$fdata["GoodName"] = "unit_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Unit Id"; 
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
	
		$fdata["strField"] = "unit_id"; 
		$fdata["FullName"] = "unit_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["unit_id"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 53;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 54;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 55;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 56;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 57;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["update_uid"] = $fdata;
//	terimanip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 58;
	$fdata["strName"] = "terimanip";
	$fdata["GoodName"] = "terimanip";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Terimanip"; 
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
	
		$fdata["strField"] = "terimanip"; 
		$fdata["FullName"] = "terimanip";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["terimanip"] = $fdata;
//	terimatgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 59;
	$fdata["strName"] = "terimatgl";
	$fdata["GoodName"] = "terimatgl";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Terimatgl"; 
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
	
		$fdata["strField"] = "terimatgl"; 
		$fdata["FullName"] = "terimatgl";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["terimatgl"] = $fdata;
//	kirimtgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 60;
	$fdata["strName"] = "kirimtgl";
	$fdata["GoodName"] = "kirimtgl";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["kirimtgl"] = $fdata;
//	isprint_dc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 61;
	$fdata["strName"] = "isprint_dc";
	$fdata["GoodName"] = "isprint_dc";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Isprint Dc"; 
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
	
		$fdata["strField"] = "isprint_dc"; 
		$fdata["FullName"] = "isprint_dc";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["isprint_dc"] = $fdata;
//	r_nsr_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 62;
	$fdata["strName"] = "r_nsr_id";
	$fdata["GoodName"] = "r_nsr_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Nsr Id"; 
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
	
		$fdata["strField"] = "r_nsr_id"; 
		$fdata["FullName"] = "r_nsr_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_nsr_id"] = $fdata;
//	r_lokasi_pasang_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 63;
	$fdata["strName"] = "r_lokasi_pasang_id";
	$fdata["GoodName"] = "r_lokasi_pasang_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Lokasi Pasang Id"; 
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
	
		$fdata["strField"] = "r_lokasi_pasang_id"; 
		$fdata["FullName"] = "r_lokasi_pasang_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_lokasi_pasang_id"] = $fdata;
//	r_lokasi_pasang_val
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 64;
	$fdata["strName"] = "r_lokasi_pasang_val";
	$fdata["GoodName"] = "r_lokasi_pasang_val";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Lokasi Pasang Val"; 
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
	
		$fdata["strField"] = "r_lokasi_pasang_val"; 
		$fdata["FullName"] = "r_lokasi_pasang_val";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_lokasi_pasang_val"] = $fdata;
//	r_jalanklas_val
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 65;
	$fdata["strName"] = "r_jalanklas_val";
	$fdata["GoodName"] = "r_jalanklas_val";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Jalanklas Val"; 
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
	
		$fdata["strField"] = "r_jalanklas_val"; 
		$fdata["FullName"] = "r_jalanklas_val";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_jalanklas_val"] = $fdata;
//	r_sudut_pandang_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 66;
	$fdata["strName"] = "r_sudut_pandang_id";
	$fdata["GoodName"] = "r_sudut_pandang_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Sudut Pandang Id"; 
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
	
		$fdata["strField"] = "r_sudut_pandang_id"; 
		$fdata["FullName"] = "r_sudut_pandang_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_sudut_pandang_id"] = $fdata;
//	r_sudut_pandang_val
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 67;
	$fdata["strName"] = "r_sudut_pandang_val";
	$fdata["GoodName"] = "r_sudut_pandang_val";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Sudut Pandang Val"; 
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
	
		$fdata["strField"] = "r_sudut_pandang_val"; 
		$fdata["FullName"] = "r_sudut_pandang_val";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_sudut_pandang_val"] = $fdata;
//	r_tinggi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 68;
	$fdata["strName"] = "r_tinggi";
	$fdata["GoodName"] = "r_tinggi";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Tinggi"; 
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
	
		$fdata["strField"] = "r_tinggi"; 
		$fdata["FullName"] = "r_tinggi";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_tinggi"] = $fdata;
//	r_njop
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 69;
	$fdata["strName"] = "r_njop";
	$fdata["GoodName"] = "r_njop";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Njop"; 
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
	
		$fdata["strField"] = "r_njop"; 
		$fdata["FullName"] = "r_njop";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_njop"] = $fdata;
//	r_status
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 70;
	$fdata["strName"] = "r_status";
	$fdata["GoodName"] = "r_status";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Status"; 
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
	
		$fdata["strField"] = "r_status"; 
		$fdata["FullName"] = "r_status";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_status"] = $fdata;
//	r_njop_ketinggian
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 71;
	$fdata["strName"] = "r_njop_ketinggian";
	$fdata["GoodName"] = "r_njop_ketinggian";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Njop Ketinggian"; 
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
	
		$fdata["strField"] = "r_njop_ketinggian"; 
		$fdata["FullName"] = "r_njop_ketinggian";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["r_njop_ketinggian"] = $fdata;
//	status_pembayaran
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 72;
	$fdata["strName"] = "status_pembayaran";
	$fdata["GoodName"] = "status_pembayaran";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Status Pembayaran"; 
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
	
		$fdata["strField"] = "status_pembayaran"; 
		$fdata["FullName"] = "status_pembayaran";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["status_pembayaran"] = $fdata;
//	rek_no_paneng
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 73;
	$fdata["strName"] = "rek_no_paneng";
	$fdata["GoodName"] = "rek_no_paneng";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Rek No Paneng"; 
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
	
		$fdata["strField"] = "rek_no_paneng"; 
		$fdata["FullName"] = "rek_no_paneng";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["rek_no_paneng"] = $fdata;
//	sptno_lengkap
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 74;
	$fdata["strName"] = "sptno_lengkap";
	$fdata["GoodName"] = "sptno_lengkap";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Sptno Lengkap"; 
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
	
		$fdata["strField"] = "sptno_lengkap"; 
		$fdata["FullName"] = "sptno_lengkap";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["sptno_lengkap"] = $fdata;
//	sptno_lama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 75;
	$fdata["strName"] = "sptno_lama";
	$fdata["GoodName"] = "sptno_lama";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Sptno Lama"; 
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
	
		$fdata["strField"] = "sptno_lama"; 
		$fdata["FullName"] = "sptno_lama";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["sptno_lama"] = $fdata;
//	r_nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 76;
	$fdata["strName"] = "r_nama";
	$fdata["GoodName"] = "r_nama";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Nama"; 
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
	
		$fdata["strField"] = "r_nama"; 
		$fdata["FullName"] = "r_nama";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_nama"] = $fdata;
//	r_alamat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 77;
	$fdata["strName"] = "r_alamat";
	$fdata["GoodName"] = "r_alamat";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "R Alamat"; 
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
	
		$fdata["strField"] = "r_alamat"; 
		$fdata["FullName"] = "r_alamat";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["r_alamat"] = $fdata;
//	omset1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 78;
	$fdata["strName"] = "omset1";
	$fdata["GoodName"] = "omset1";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset1"; 
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
	
		$fdata["strField"] = "omset1"; 
		$fdata["FullName"] = "omset1";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset1"] = $fdata;
//	omset2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 79;
	$fdata["strName"] = "omset2";
	$fdata["GoodName"] = "omset2";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset2"; 
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
	
		$fdata["strField"] = "omset2"; 
		$fdata["FullName"] = "omset2";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset2"] = $fdata;
//	omset3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 80;
	$fdata["strName"] = "omset3";
	$fdata["GoodName"] = "omset3";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset3"; 
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
	
		$fdata["strField"] = "omset3"; 
		$fdata["FullName"] = "omset3";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset3"] = $fdata;
//	omset4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 81;
	$fdata["strName"] = "omset4";
	$fdata["GoodName"] = "omset4";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset4"; 
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
	
		$fdata["strField"] = "omset4"; 
		$fdata["FullName"] = "omset4";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset4"] = $fdata;
//	omset5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 82;
	$fdata["strName"] = "omset5";
	$fdata["GoodName"] = "omset5";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset5"; 
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
	
		$fdata["strField"] = "omset5"; 
		$fdata["FullName"] = "omset5";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset5"] = $fdata;
//	omset6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 83;
	$fdata["strName"] = "omset6";
	$fdata["GoodName"] = "omset6";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset6"; 
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
	
		$fdata["strField"] = "omset6"; 
		$fdata["FullName"] = "omset6";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset6"] = $fdata;
//	omset7
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 84;
	$fdata["strName"] = "omset7";
	$fdata["GoodName"] = "omset7";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset7"; 
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
	
		$fdata["strField"] = "omset7"; 
		$fdata["FullName"] = "omset7";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset7"] = $fdata;
//	omset8
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 85;
	$fdata["strName"] = "omset8";
	$fdata["GoodName"] = "omset8";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset8"; 
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
	
		$fdata["strField"] = "omset8"; 
		$fdata["FullName"] = "omset8";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset8"] = $fdata;
//	omset9
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 86;
	$fdata["strName"] = "omset9";
	$fdata["GoodName"] = "omset9";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset9"; 
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
	
		$fdata["strField"] = "omset9"; 
		$fdata["FullName"] = "omset9";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset9"] = $fdata;
//	omset10
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 87;
	$fdata["strName"] = "omset10";
	$fdata["GoodName"] = "omset10";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset10"; 
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
	
		$fdata["strField"] = "omset10"; 
		$fdata["FullName"] = "omset10";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset10"] = $fdata;
//	omset11
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 88;
	$fdata["strName"] = "omset11";
	$fdata["GoodName"] = "omset11";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset11"; 
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
	
		$fdata["strField"] = "omset11"; 
		$fdata["FullName"] = "omset11";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset11"] = $fdata;
//	omset12
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 89;
	$fdata["strName"] = "omset12";
	$fdata["GoodName"] = "omset12";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset12"; 
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
	
		$fdata["strField"] = "omset12"; 
		$fdata["FullName"] = "omset12";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset12"] = $fdata;
//	omset13
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 90;
	$fdata["strName"] = "omset13";
	$fdata["GoodName"] = "omset13";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset13"; 
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
	
		$fdata["strField"] = "omset13"; 
		$fdata["FullName"] = "omset13";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset13"] = $fdata;
//	omset14
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 91;
	$fdata["strName"] = "omset14";
	$fdata["GoodName"] = "omset14";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset14"; 
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
	
		$fdata["strField"] = "omset14"; 
		$fdata["FullName"] = "omset14";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset14"] = $fdata;
//	omset15
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 92;
	$fdata["strName"] = "omset15";
	$fdata["GoodName"] = "omset15";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset15"; 
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
	
		$fdata["strField"] = "omset15"; 
		$fdata["FullName"] = "omset15";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset15"] = $fdata;
//	omset16
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 93;
	$fdata["strName"] = "omset16";
	$fdata["GoodName"] = "omset16";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset16"; 
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
	
		$fdata["strField"] = "omset16"; 
		$fdata["FullName"] = "omset16";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset16"] = $fdata;
//	omset17
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 94;
	$fdata["strName"] = "omset17";
	$fdata["GoodName"] = "omset17";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset17"; 
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
	
		$fdata["strField"] = "omset17"; 
		$fdata["FullName"] = "omset17";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset17"] = $fdata;
//	omset18
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 95;
	$fdata["strName"] = "omset18";
	$fdata["GoodName"] = "omset18";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset18"; 
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
	
		$fdata["strField"] = "omset18"; 
		$fdata["FullName"] = "omset18";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset18"] = $fdata;
//	omset19
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 96;
	$fdata["strName"] = "omset19";
	$fdata["GoodName"] = "omset19";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset19"; 
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
	
		$fdata["strField"] = "omset19"; 
		$fdata["FullName"] = "omset19";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset19"] = $fdata;
//	omset20
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 97;
	$fdata["strName"] = "omset20";
	$fdata["GoodName"] = "omset20";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset20"; 
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
	
		$fdata["strField"] = "omset20"; 
		$fdata["FullName"] = "omset20";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset20"] = $fdata;
//	omset21
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 98;
	$fdata["strName"] = "omset21";
	$fdata["GoodName"] = "omset21";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset21"; 
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
	
		$fdata["strField"] = "omset21"; 
		$fdata["FullName"] = "omset21";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset21"] = $fdata;
//	omset22
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 99;
	$fdata["strName"] = "omset22";
	$fdata["GoodName"] = "omset22";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset22"; 
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
	
		$fdata["strField"] = "omset22"; 
		$fdata["FullName"] = "omset22";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset22"] = $fdata;
//	omset23
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 100;
	$fdata["strName"] = "omset23";
	$fdata["GoodName"] = "omset23";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset23"; 
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
	
		$fdata["strField"] = "omset23"; 
		$fdata["FullName"] = "omset23";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset23"] = $fdata;
//	omset24
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 101;
	$fdata["strName"] = "omset24";
	$fdata["GoodName"] = "omset24";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset24"; 
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
	
		$fdata["strField"] = "omset24"; 
		$fdata["FullName"] = "omset24";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset24"] = $fdata;
//	omset25
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 102;
	$fdata["strName"] = "omset25";
	$fdata["GoodName"] = "omset25";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset25"; 
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
	
		$fdata["strField"] = "omset25"; 
		$fdata["FullName"] = "omset25";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset25"] = $fdata;
//	omset26
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 103;
	$fdata["strName"] = "omset26";
	$fdata["GoodName"] = "omset26";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset26"; 
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
	
		$fdata["strField"] = "omset26"; 
		$fdata["FullName"] = "omset26";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset26"] = $fdata;
//	omset27
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 104;
	$fdata["strName"] = "omset27";
	$fdata["GoodName"] = "omset27";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset27"; 
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
	
		$fdata["strField"] = "omset27"; 
		$fdata["FullName"] = "omset27";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset27"] = $fdata;
//	omset28
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 105;
	$fdata["strName"] = "omset28";
	$fdata["GoodName"] = "omset28";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset28"; 
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
	
		$fdata["strField"] = "omset28"; 
		$fdata["FullName"] = "omset28";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset28"] = $fdata;
//	omset29
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 106;
	$fdata["strName"] = "omset29";
	$fdata["GoodName"] = "omset29";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset29"; 
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
	
		$fdata["strField"] = "omset29"; 
		$fdata["FullName"] = "omset29";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset29"] = $fdata;
//	omset30
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 107;
	$fdata["strName"] = "omset30";
	$fdata["GoodName"] = "omset30";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset30"; 
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
	
		$fdata["strField"] = "omset30"; 
		$fdata["FullName"] = "omset30";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset30"] = $fdata;
//	omset31
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 108;
	$fdata["strName"] = "omset31";
	$fdata["GoodName"] = "omset31";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset31"; 
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
	
		$fdata["strField"] = "omset31"; 
		$fdata["FullName"] = "omset31";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset31"] = $fdata;
//	keterangan1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 109;
	$fdata["strName"] = "keterangan1";
	$fdata["GoodName"] = "keterangan1";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan1"; 
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
	
		$fdata["strField"] = "keterangan1"; 
		$fdata["FullName"] = "keterangan1";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan1"] = $fdata;
//	keterangan2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 110;
	$fdata["strName"] = "keterangan2";
	$fdata["GoodName"] = "keterangan2";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan2"; 
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
	
		$fdata["strField"] = "keterangan2"; 
		$fdata["FullName"] = "keterangan2";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan2"] = $fdata;
//	keterangan3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 111;
	$fdata["strName"] = "keterangan3";
	$fdata["GoodName"] = "keterangan3";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan3"; 
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
	
		$fdata["strField"] = "keterangan3"; 
		$fdata["FullName"] = "keterangan3";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan3"] = $fdata;
//	keterangan4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 112;
	$fdata["strName"] = "keterangan4";
	$fdata["GoodName"] = "keterangan4";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan4"; 
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
	
		$fdata["strField"] = "keterangan4"; 
		$fdata["FullName"] = "keterangan4";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan4"] = $fdata;
//	keterangan5
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 113;
	$fdata["strName"] = "keterangan5";
	$fdata["GoodName"] = "keterangan5";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan5"; 
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
	
		$fdata["strField"] = "keterangan5"; 
		$fdata["FullName"] = "keterangan5";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan5"] = $fdata;
//	keterangan6
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 114;
	$fdata["strName"] = "keterangan6";
	$fdata["GoodName"] = "keterangan6";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan6"; 
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
	
		$fdata["strField"] = "keterangan6"; 
		$fdata["FullName"] = "keterangan6";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan6"] = $fdata;
//	keterangan7
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 115;
	$fdata["strName"] = "keterangan7";
	$fdata["GoodName"] = "keterangan7";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan7"; 
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
	
		$fdata["strField"] = "keterangan7"; 
		$fdata["FullName"] = "keterangan7";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan7"] = $fdata;
//	keterangan8
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 116;
	$fdata["strName"] = "keterangan8";
	$fdata["GoodName"] = "keterangan8";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan8"; 
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
	
		$fdata["strField"] = "keterangan8"; 
		$fdata["FullName"] = "keterangan8";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan8"] = $fdata;
//	keterangan9
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 117;
	$fdata["strName"] = "keterangan9";
	$fdata["GoodName"] = "keterangan9";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan9"; 
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
	
		$fdata["strField"] = "keterangan9"; 
		$fdata["FullName"] = "keterangan9";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan9"] = $fdata;
//	keterangan10
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 118;
	$fdata["strName"] = "keterangan10";
	$fdata["GoodName"] = "keterangan10";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan10"; 
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
	
		$fdata["strField"] = "keterangan10"; 
		$fdata["FullName"] = "keterangan10";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan10"] = $fdata;
//	keterangan11
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 119;
	$fdata["strName"] = "keterangan11";
	$fdata["GoodName"] = "keterangan11";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan11"; 
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
	
		$fdata["strField"] = "keterangan11"; 
		$fdata["FullName"] = "keterangan11";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan11"] = $fdata;
//	keterangan12
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 120;
	$fdata["strName"] = "keterangan12";
	$fdata["GoodName"] = "keterangan12";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan12"; 
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
	
		$fdata["strField"] = "keterangan12"; 
		$fdata["FullName"] = "keterangan12";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan12"] = $fdata;
//	keterangan13
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 121;
	$fdata["strName"] = "keterangan13";
	$fdata["GoodName"] = "keterangan13";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan13"; 
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
	
		$fdata["strField"] = "keterangan13"; 
		$fdata["FullName"] = "keterangan13";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan13"] = $fdata;
//	keterangan14
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 122;
	$fdata["strName"] = "keterangan14";
	$fdata["GoodName"] = "keterangan14";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan14"; 
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
	
		$fdata["strField"] = "keterangan14"; 
		$fdata["FullName"] = "keterangan14";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan14"] = $fdata;
//	keterangan15
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 123;
	$fdata["strName"] = "keterangan15";
	$fdata["GoodName"] = "keterangan15";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan15"; 
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
	
		$fdata["strField"] = "keterangan15"; 
		$fdata["FullName"] = "keterangan15";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan15"] = $fdata;
//	keterangan16
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 124;
	$fdata["strName"] = "keterangan16";
	$fdata["GoodName"] = "keterangan16";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan16"; 
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
	
		$fdata["strField"] = "keterangan16"; 
		$fdata["FullName"] = "keterangan16";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan16"] = $fdata;
//	keterangan17
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 125;
	$fdata["strName"] = "keterangan17";
	$fdata["GoodName"] = "keterangan17";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan17"; 
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
	
		$fdata["strField"] = "keterangan17"; 
		$fdata["FullName"] = "keterangan17";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan17"] = $fdata;
//	keterangan18
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 126;
	$fdata["strName"] = "keterangan18";
	$fdata["GoodName"] = "keterangan18";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan18"; 
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
	
		$fdata["strField"] = "keterangan18"; 
		$fdata["FullName"] = "keterangan18";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan18"] = $fdata;
//	keterangan19
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 127;
	$fdata["strName"] = "keterangan19";
	$fdata["GoodName"] = "keterangan19";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan19"; 
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
	
		$fdata["strField"] = "keterangan19"; 
		$fdata["FullName"] = "keterangan19";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan19"] = $fdata;
//	keterangan20
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 128;
	$fdata["strName"] = "keterangan20";
	$fdata["GoodName"] = "keterangan20";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan20"; 
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
	
		$fdata["strField"] = "keterangan20"; 
		$fdata["FullName"] = "keterangan20";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan20"] = $fdata;
//	keterangan21
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 129;
	$fdata["strName"] = "keterangan21";
	$fdata["GoodName"] = "keterangan21";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan21"; 
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
	
		$fdata["strField"] = "keterangan21"; 
		$fdata["FullName"] = "keterangan21";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan21"] = $fdata;
//	keterangan22
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 130;
	$fdata["strName"] = "keterangan22";
	$fdata["GoodName"] = "keterangan22";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan22"; 
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
	
		$fdata["strField"] = "keterangan22"; 
		$fdata["FullName"] = "keterangan22";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan22"] = $fdata;
//	keterangan23
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 131;
	$fdata["strName"] = "keterangan23";
	$fdata["GoodName"] = "keterangan23";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan23"; 
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
	
		$fdata["strField"] = "keterangan23"; 
		$fdata["FullName"] = "keterangan23";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan23"] = $fdata;
//	keterangan24
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 132;
	$fdata["strName"] = "keterangan24";
	$fdata["GoodName"] = "keterangan24";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan24"; 
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
	
		$fdata["strField"] = "keterangan24"; 
		$fdata["FullName"] = "keterangan24";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan24"] = $fdata;
//	keterangan25
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 133;
	$fdata["strName"] = "keterangan25";
	$fdata["GoodName"] = "keterangan25";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan25"; 
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
	
		$fdata["strField"] = "keterangan25"; 
		$fdata["FullName"] = "keterangan25";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan25"] = $fdata;
//	keterangan26
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 134;
	$fdata["strName"] = "keterangan26";
	$fdata["GoodName"] = "keterangan26";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan26"; 
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
	
		$fdata["strField"] = "keterangan26"; 
		$fdata["FullName"] = "keterangan26";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan26"] = $fdata;
//	keterangan27
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 135;
	$fdata["strName"] = "keterangan27";
	$fdata["GoodName"] = "keterangan27";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan27"; 
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
	
		$fdata["strField"] = "keterangan27"; 
		$fdata["FullName"] = "keterangan27";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan27"] = $fdata;
//	keterangan28
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 136;
	$fdata["strName"] = "keterangan28";
	$fdata["GoodName"] = "keterangan28";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan28"; 
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
	
		$fdata["strField"] = "keterangan28"; 
		$fdata["FullName"] = "keterangan28";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan28"] = $fdata;
//	keterangan29
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 137;
	$fdata["strName"] = "keterangan29";
	$fdata["GoodName"] = "keterangan29";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan29"; 
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
	
		$fdata["strField"] = "keterangan29"; 
		$fdata["FullName"] = "keterangan29";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan29"] = $fdata;
//	keterangan30
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 138;
	$fdata["strName"] = "keterangan30";
	$fdata["GoodName"] = "keterangan30";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan30"; 
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
	
		$fdata["strField"] = "keterangan30"; 
		$fdata["FullName"] = "keterangan30";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan30"] = $fdata;
//	keterangan31
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 139;
	$fdata["strName"] = "keterangan31";
	$fdata["GoodName"] = "keterangan31";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan31"; 
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
	
		$fdata["strField"] = "keterangan31"; 
		$fdata["FullName"] = "keterangan31";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan31"] = $fdata;
//	doc_no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 140;
	$fdata["strName"] = "doc_no";
	$fdata["GoodName"] = "doc_no";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Doc No"; 
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
	
		$fdata["strField"] = "doc_no"; 
		$fdata["FullName"] = "doc_no";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["doc_no"] = $fdata;
//	cara_bayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 141;
	$fdata["strName"] = "cara_bayar";
	$fdata["GoodName"] = "cara_bayar";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Cara Bayar"; 
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
	
		$fdata["strField"] = "cara_bayar"; 
		$fdata["FullName"] = "cara_bayar";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["cara_bayar"] = $fdata;
//	kelompok_usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 142;
	$fdata["strName"] = "kelompok_usaha_id";
	$fdata["GoodName"] = "kelompok_usaha_id";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["kelompok_usaha_id"] = $fdata;
//	zona_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 143;
	$fdata["strName"] = "zona_id";
	$fdata["GoodName"] = "zona_id";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["zona_id"] = $fdata;
//	manfaat_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 144;
	$fdata["strName"] = "manfaat_id";
	$fdata["GoodName"] = "manfaat_id";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["manfaat_id"] = $fdata;
//	golongan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 145;
	$fdata["strName"] = "golongan";
	$fdata["GoodName"] = "golongan";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Golongan"; 
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
	
		$fdata["strField"] = "golongan"; 
		$fdata["FullName"] = "golongan";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["golongan"] = $fdata;
//	omset_lain
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 146;
	$fdata["strName"] = "omset_lain";
	$fdata["GoodName"] = "omset_lain";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Omset Lain"; 
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
	
		$fdata["strField"] = "omset_lain"; 
		$fdata["FullName"] = "omset_lain";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["omset_lain"] = $fdata;
//	keterangan_lain
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 147;
	$fdata["strName"] = "keterangan_lain";
	$fdata["GoodName"] = "keterangan_lain";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Keterangan Lain"; 
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
	
		$fdata["strField"] = "keterangan_lain"; 
		$fdata["FullName"] = "keterangan_lain";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["keterangan_lain"] = $fdata;
//	ijin_no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 148;
	$fdata["strName"] = "ijin_no";
	$fdata["GoodName"] = "ijin_no";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Ijin No"; 
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
	
		$fdata["strField"] = "ijin_no"; 
		$fdata["FullName"] = "ijin_no";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
			$edata["EditParams"].= " maxlength=6";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_spt["ijin_no"] = $fdata;
//	jenis_masa
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 149;
	$fdata["strName"] = "jenis_masa";
	$fdata["GoodName"] = "jenis_masa";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Jenis Masa"; 
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
	
		$fdata["strField"] = "jenis_masa"; 
		$fdata["FullName"] = "jenis_masa";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["jenis_masa"] = $fdata;
//	skpd_lama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 150;
	$fdata["strName"] = "skpd_lama";
	$fdata["GoodName"] = "skpd_lama";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Skpd Lama"; 
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
	
		$fdata["strField"] = "skpd_lama"; 
		$fdata["FullName"] = "skpd_lama";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["skpd_lama"] = $fdata;
//	proses
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 151;
	$fdata["strName"] = "proses";
	$fdata["GoodName"] = "proses";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Proses"; 
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
	
		$fdata["strField"] = "proses"; 
		$fdata["FullName"] = "proses";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["proses"] = $fdata;
//	tanggal_validasi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 152;
	$fdata["strName"] = "tanggal_validasi";
	$fdata["GoodName"] = "tanggal_validasi";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Tanggal Validasi"; 
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
	
		$fdata["strField"] = "tanggal_validasi"; 
		$fdata["FullName"] = "tanggal_validasi";
	
		
		
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
	
		
		
	$tdatapad_pad_spt["tanggal_validasi"] = $fdata;
//	bulan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 153;
	$fdata["strName"] = "bulan";
	$fdata["GoodName"] = "bulan";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Bulan"; 
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
	
		
		
	$tdatapad_pad_spt["bulan"] = $fdata;
//	no_telp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 154;
	$fdata["strName"] = "no_telp";
	$fdata["GoodName"] = "no_telp";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "No Telp"; 
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
	
		$fdata["strField"] = "no_telp"; 
		$fdata["FullName"] = "no_telp";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["no_telp"] = $fdata;
//	usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 155;
	$fdata["strName"] = "usaha_id";
	$fdata["GoodName"] = "usaha_id";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Usaha Id"; 
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
	
		
		
	$tdatapad_pad_spt["usaha_id"] = $fdata;
//	multiple
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 156;
	$fdata["strName"] = "multiple";
	$fdata["GoodName"] = "multiple";
	$fdata["ownerTable"] = "pad.pad_spt";
	$fdata["Label"] = "Multiple"; 
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
	
		$fdata["strField"] = "multiple"; 
		$fdata["FullName"] = "multiple";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
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
	
		
		
	$tdatapad_pad_spt["multiple"] = $fdata;
//	bulan_telat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 157;
	$fdata["strName"] = "bulan_telat";
	$fdata["GoodName"] = "bulan_telat";
	$fdata["ownerTable"] = "pad.pad_spt";
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
	
		
		
	$tdatapad_pad_spt["bulan_telat"] = $fdata;

	
$tables_data["pad.pad_spt"]=&$tdatapad_pad_spt;
$field_labels["pad_pad_spt"] = &$fieldLabelspad_pad_spt;
$fieldToolTips["pad.pad_spt"] = &$fieldToolTipspad_pad_spt;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_spt"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_air_tanah_hit";
	$detailsParam["dDataSourceTable"]="pad.pad_air_tanah_hit";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_air_tanah_hit";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_spt"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_spt"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_spt"][$dIndex]["detailKeys"][]="spt_id";

$dIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_stpd";
	$detailsParam["dDataSourceTable"]="pad.pad_stpd";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_stpd";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_spt"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_spt"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_spt"][$dIndex]["detailKeys"][]="spt_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_spt"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_customer_usaha";
	$masterParams["mDataSourceTable"]="pad.pad_customer_usaha";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_customer_usaha";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_spt"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_spt"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_spt"][$mIndex]["detailKeys"][]="customer_usaha_id";

$mIndex = 2-1;
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
	$masterTablesData["pad.pad_spt"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_spt"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_spt"][$mIndex]["detailKeys"][]="customer_id";

$mIndex = 3-1;
			$strOriginalDetailsTable="pad.pad_jenis_pajak";
	$masterParams["mDataSourceTable"]="pad.pad_jenis_pajak";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_jenis_pajak";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_spt"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_spt"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_spt"][$mIndex]["detailKeys"][]="pajak_id";

$mIndex = 4-1;
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
	$masterTablesData["pad.pad_spt"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_spt"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_spt"][$mIndex]["detailKeys"][]="rekening_id";

$mIndex = 5-1;
			$strOriginalDetailsTable="pad.pad_spt_type";
	$masterParams["mDataSourceTable"]="pad.pad_spt_type";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_spt_type";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_spt"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_spt"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_spt"][$mIndex]["detailKeys"][]="type_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_spt()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tahun,   sptno,   customer_id,   customer_usaha_id,   rekening_id,   pajak_id,   type_id,   so,   masadari,   masasd,   jatuhtempotgl,   r_bayarid,   minimal_omset,   dasar,   tarif,   denda,   bunga,   setoran,   kenaikan,   kompensasi,   lain2,   pajak_terhutang,   air_manfaat_id,   air_zona_id,   meteran_awal,   meteran_akhir,   volume,   satuan,   r_panjang,   r_lebar,   r_muka,   r_banyak,   r_luas,   r_tarifid,   r_kontrak,   r_lama,   r_jalan_id,   r_jalanklas_id,   r_lokasi,   r_judul,   r_kelurahan_id,   r_lokasi_id,   r_calculated,   r_nsr,   r_nsrno,   r_nsrtgl,   r_nsl_kecamatan_id,   r_nsl_type_id,   r_nsl_nilai,   notes,   unit_id,   enabled,   created,   create_uid,   updated,   update_uid,   terimanip,   terimatgl,   kirimtgl,   isprint_dc,   r_nsr_id,   r_lokasi_pasang_id,   r_lokasi_pasang_val,   r_jalanklas_val,   r_sudut_pandang_id,   r_sudut_pandang_val,   r_tinggi,   r_njop,   r_status,   r_njop_ketinggian,   status_pembayaran,   rek_no_paneng,   sptno_lengkap,   sptno_lama,   r_nama,   r_alamat,   omset1,   omset2,   omset3,   omset4,   omset5,   omset6,   omset7,   omset8,   omset9,   omset10,   omset11,   omset12,   omset13,   omset14,   omset15,   omset16,   omset17,   omset18,   omset19,   omset20,   omset21,   omset22,   omset23,   omset24,   omset25,   omset26,   omset27,   omset28,   omset29,   omset30,   omset31,   keterangan1,   keterangan2,   keterangan3,   keterangan4,   keterangan5,   keterangan6,   keterangan7,   keterangan8,   keterangan9,   keterangan10,   keterangan11,   keterangan12,   keterangan13,   keterangan14,   keterangan15,   keterangan16,   keterangan17,   keterangan18,   keterangan19,   keterangan20,   keterangan21,   keterangan22,   keterangan23,   keterangan24,   keterangan25,   keterangan26,   keterangan27,   keterangan28,   keterangan29,   keterangan30,   keterangan31,   doc_no,   cara_bayar,   kelompok_usaha_id,   zona_id,   manfaat_id,   golongan,   omset_lain,   keterangan_lain,   ijin_no,   jenis_masa,   skpd_lama,   proses,   tanggal_validasi,   bulan,   no_telp,   usaha_id,   multiple,   bulan_telat";
$proto0["m_strFrom"] = "FROM \"pad\".pad_spt";
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
	"m_strTable" => "pad.pad_spt"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "pad.pad_spt"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "sptno",
	"m_strTable" => "pad.pad_spt"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_id",
	"m_strTable" => "pad.pad_spt"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "customer_usaha_id",
	"m_strTable" => "pad.pad_spt"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "rekening_id",
	"m_strTable" => "pad.pad_spt"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "pajak_id",
	"m_strTable" => "pad.pad_spt"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "type_id",
	"m_strTable" => "pad.pad_spt"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "so",
	"m_strTable" => "pad.pad_spt"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "masadari",
	"m_strTable" => "pad.pad_spt"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "masasd",
	"m_strTable" => "pad.pad_spt"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "jatuhtempotgl",
	"m_strTable" => "pad.pad_spt"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "r_bayarid",
	"m_strTable" => "pad.pad_spt"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "minimal_omset",
	"m_strTable" => "pad.pad_spt"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "dasar",
	"m_strTable" => "pad.pad_spt"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "tarif",
	"m_strTable" => "pad.pad_spt"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "denda",
	"m_strTable" => "pad.pad_spt"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "bunga",
	"m_strTable" => "pad.pad_spt"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "setoran",
	"m_strTable" => "pad.pad_spt"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "kenaikan",
	"m_strTable" => "pad.pad_spt"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "kompensasi",
	"m_strTable" => "pad.pad_spt"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "lain2",
	"m_strTable" => "pad.pad_spt"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "pajak_terhutang",
	"m_strTable" => "pad.pad_spt"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$obj = new SQLField(array(
	"m_strName" => "air_manfaat_id",
	"m_strTable" => "pad.pad_spt"
));

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto53=array();
			$obj = new SQLField(array(
	"m_strName" => "air_zona_id",
	"m_strTable" => "pad.pad_spt"
));

$proto53["m_expr"]=$obj;
$proto53["m_alias"] = "";
$obj = new SQLFieldListItem($proto53);

$proto0["m_fieldlist"][]=$obj;
						$proto55=array();
			$obj = new SQLField(array(
	"m_strName" => "meteran_awal",
	"m_strTable" => "pad.pad_spt"
));

$proto55["m_expr"]=$obj;
$proto55["m_alias"] = "";
$obj = new SQLFieldListItem($proto55);

$proto0["m_fieldlist"][]=$obj;
						$proto57=array();
			$obj = new SQLField(array(
	"m_strName" => "meteran_akhir",
	"m_strTable" => "pad.pad_spt"
));

$proto57["m_expr"]=$obj;
$proto57["m_alias"] = "";
$obj = new SQLFieldListItem($proto57);

$proto0["m_fieldlist"][]=$obj;
						$proto59=array();
			$obj = new SQLField(array(
	"m_strName" => "volume",
	"m_strTable" => "pad.pad_spt"
));

$proto59["m_expr"]=$obj;
$proto59["m_alias"] = "";
$obj = new SQLFieldListItem($proto59);

$proto0["m_fieldlist"][]=$obj;
						$proto61=array();
			$obj = new SQLField(array(
	"m_strName" => "satuan",
	"m_strTable" => "pad.pad_spt"
));

$proto61["m_expr"]=$obj;
$proto61["m_alias"] = "";
$obj = new SQLFieldListItem($proto61);

$proto0["m_fieldlist"][]=$obj;
						$proto63=array();
			$obj = new SQLField(array(
	"m_strName" => "r_panjang",
	"m_strTable" => "pad.pad_spt"
));

$proto63["m_expr"]=$obj;
$proto63["m_alias"] = "";
$obj = new SQLFieldListItem($proto63);

$proto0["m_fieldlist"][]=$obj;
						$proto65=array();
			$obj = new SQLField(array(
	"m_strName" => "r_lebar",
	"m_strTable" => "pad.pad_spt"
));

$proto65["m_expr"]=$obj;
$proto65["m_alias"] = "";
$obj = new SQLFieldListItem($proto65);

$proto0["m_fieldlist"][]=$obj;
						$proto67=array();
			$obj = new SQLField(array(
	"m_strName" => "r_muka",
	"m_strTable" => "pad.pad_spt"
));

$proto67["m_expr"]=$obj;
$proto67["m_alias"] = "";
$obj = new SQLFieldListItem($proto67);

$proto0["m_fieldlist"][]=$obj;
						$proto69=array();
			$obj = new SQLField(array(
	"m_strName" => "r_banyak",
	"m_strTable" => "pad.pad_spt"
));

$proto69["m_expr"]=$obj;
$proto69["m_alias"] = "";
$obj = new SQLFieldListItem($proto69);

$proto0["m_fieldlist"][]=$obj;
						$proto71=array();
			$obj = new SQLField(array(
	"m_strName" => "r_luas",
	"m_strTable" => "pad.pad_spt"
));

$proto71["m_expr"]=$obj;
$proto71["m_alias"] = "";
$obj = new SQLFieldListItem($proto71);

$proto0["m_fieldlist"][]=$obj;
						$proto73=array();
			$obj = new SQLField(array(
	"m_strName" => "r_tarifid",
	"m_strTable" => "pad.pad_spt"
));

$proto73["m_expr"]=$obj;
$proto73["m_alias"] = "";
$obj = new SQLFieldListItem($proto73);

$proto0["m_fieldlist"][]=$obj;
						$proto75=array();
			$obj = new SQLField(array(
	"m_strName" => "r_kontrak",
	"m_strTable" => "pad.pad_spt"
));

$proto75["m_expr"]=$obj;
$proto75["m_alias"] = "";
$obj = new SQLFieldListItem($proto75);

$proto0["m_fieldlist"][]=$obj;
						$proto77=array();
			$obj = new SQLField(array(
	"m_strName" => "r_lama",
	"m_strTable" => "pad.pad_spt"
));

$proto77["m_expr"]=$obj;
$proto77["m_alias"] = "";
$obj = new SQLFieldListItem($proto77);

$proto0["m_fieldlist"][]=$obj;
						$proto79=array();
			$obj = new SQLField(array(
	"m_strName" => "r_jalan_id",
	"m_strTable" => "pad.pad_spt"
));

$proto79["m_expr"]=$obj;
$proto79["m_alias"] = "";
$obj = new SQLFieldListItem($proto79);

$proto0["m_fieldlist"][]=$obj;
						$proto81=array();
			$obj = new SQLField(array(
	"m_strName" => "r_jalanklas_id",
	"m_strTable" => "pad.pad_spt"
));

$proto81["m_expr"]=$obj;
$proto81["m_alias"] = "";
$obj = new SQLFieldListItem($proto81);

$proto0["m_fieldlist"][]=$obj;
						$proto83=array();
			$obj = new SQLField(array(
	"m_strName" => "r_lokasi",
	"m_strTable" => "pad.pad_spt"
));

$proto83["m_expr"]=$obj;
$proto83["m_alias"] = "";
$obj = new SQLFieldListItem($proto83);

$proto0["m_fieldlist"][]=$obj;
						$proto85=array();
			$obj = new SQLField(array(
	"m_strName" => "r_judul",
	"m_strTable" => "pad.pad_spt"
));

$proto85["m_expr"]=$obj;
$proto85["m_alias"] = "";
$obj = new SQLFieldListItem($proto85);

$proto0["m_fieldlist"][]=$obj;
						$proto87=array();
			$obj = new SQLField(array(
	"m_strName" => "r_kelurahan_id",
	"m_strTable" => "pad.pad_spt"
));

$proto87["m_expr"]=$obj;
$proto87["m_alias"] = "";
$obj = new SQLFieldListItem($proto87);

$proto0["m_fieldlist"][]=$obj;
						$proto89=array();
			$obj = new SQLField(array(
	"m_strName" => "r_lokasi_id",
	"m_strTable" => "pad.pad_spt"
));

$proto89["m_expr"]=$obj;
$proto89["m_alias"] = "";
$obj = new SQLFieldListItem($proto89);

$proto0["m_fieldlist"][]=$obj;
						$proto91=array();
			$obj = new SQLField(array(
	"m_strName" => "r_calculated",
	"m_strTable" => "pad.pad_spt"
));

$proto91["m_expr"]=$obj;
$proto91["m_alias"] = "";
$obj = new SQLFieldListItem($proto91);

$proto0["m_fieldlist"][]=$obj;
						$proto93=array();
			$obj = new SQLField(array(
	"m_strName" => "r_nsr",
	"m_strTable" => "pad.pad_spt"
));

$proto93["m_expr"]=$obj;
$proto93["m_alias"] = "";
$obj = new SQLFieldListItem($proto93);

$proto0["m_fieldlist"][]=$obj;
						$proto95=array();
			$obj = new SQLField(array(
	"m_strName" => "r_nsrno",
	"m_strTable" => "pad.pad_spt"
));

$proto95["m_expr"]=$obj;
$proto95["m_alias"] = "";
$obj = new SQLFieldListItem($proto95);

$proto0["m_fieldlist"][]=$obj;
						$proto97=array();
			$obj = new SQLField(array(
	"m_strName" => "r_nsrtgl",
	"m_strTable" => "pad.pad_spt"
));

$proto97["m_expr"]=$obj;
$proto97["m_alias"] = "";
$obj = new SQLFieldListItem($proto97);

$proto0["m_fieldlist"][]=$obj;
						$proto99=array();
			$obj = new SQLField(array(
	"m_strName" => "r_nsl_kecamatan_id",
	"m_strTable" => "pad.pad_spt"
));

$proto99["m_expr"]=$obj;
$proto99["m_alias"] = "";
$obj = new SQLFieldListItem($proto99);

$proto0["m_fieldlist"][]=$obj;
						$proto101=array();
			$obj = new SQLField(array(
	"m_strName" => "r_nsl_type_id",
	"m_strTable" => "pad.pad_spt"
));

$proto101["m_expr"]=$obj;
$proto101["m_alias"] = "";
$obj = new SQLFieldListItem($proto101);

$proto0["m_fieldlist"][]=$obj;
						$proto103=array();
			$obj = new SQLField(array(
	"m_strName" => "r_nsl_nilai",
	"m_strTable" => "pad.pad_spt"
));

$proto103["m_expr"]=$obj;
$proto103["m_alias"] = "";
$obj = new SQLFieldListItem($proto103);

$proto0["m_fieldlist"][]=$obj;
						$proto105=array();
			$obj = new SQLField(array(
	"m_strName" => "notes",
	"m_strTable" => "pad.pad_spt"
));

$proto105["m_expr"]=$obj;
$proto105["m_alias"] = "";
$obj = new SQLFieldListItem($proto105);

$proto0["m_fieldlist"][]=$obj;
						$proto107=array();
			$obj = new SQLField(array(
	"m_strName" => "unit_id",
	"m_strTable" => "pad.pad_spt"
));

$proto107["m_expr"]=$obj;
$proto107["m_alias"] = "";
$obj = new SQLFieldListItem($proto107);

$proto0["m_fieldlist"][]=$obj;
						$proto109=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_spt"
));

$proto109["m_expr"]=$obj;
$proto109["m_alias"] = "";
$obj = new SQLFieldListItem($proto109);

$proto0["m_fieldlist"][]=$obj;
						$proto111=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_spt"
));

$proto111["m_expr"]=$obj;
$proto111["m_alias"] = "";
$obj = new SQLFieldListItem($proto111);

$proto0["m_fieldlist"][]=$obj;
						$proto113=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_spt"
));

$proto113["m_expr"]=$obj;
$proto113["m_alias"] = "";
$obj = new SQLFieldListItem($proto113);

$proto0["m_fieldlist"][]=$obj;
						$proto115=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_spt"
));

$proto115["m_expr"]=$obj;
$proto115["m_alias"] = "";
$obj = new SQLFieldListItem($proto115);

$proto0["m_fieldlist"][]=$obj;
						$proto117=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_spt"
));

$proto117["m_expr"]=$obj;
$proto117["m_alias"] = "";
$obj = new SQLFieldListItem($proto117);

$proto0["m_fieldlist"][]=$obj;
						$proto119=array();
			$obj = new SQLField(array(
	"m_strName" => "terimanip",
	"m_strTable" => "pad.pad_spt"
));

$proto119["m_expr"]=$obj;
$proto119["m_alias"] = "";
$obj = new SQLFieldListItem($proto119);

$proto0["m_fieldlist"][]=$obj;
						$proto121=array();
			$obj = new SQLField(array(
	"m_strName" => "terimatgl",
	"m_strTable" => "pad.pad_spt"
));

$proto121["m_expr"]=$obj;
$proto121["m_alias"] = "";
$obj = new SQLFieldListItem($proto121);

$proto0["m_fieldlist"][]=$obj;
						$proto123=array();
			$obj = new SQLField(array(
	"m_strName" => "kirimtgl",
	"m_strTable" => "pad.pad_spt"
));

$proto123["m_expr"]=$obj;
$proto123["m_alias"] = "";
$obj = new SQLFieldListItem($proto123);

$proto0["m_fieldlist"][]=$obj;
						$proto125=array();
			$obj = new SQLField(array(
	"m_strName" => "isprint_dc",
	"m_strTable" => "pad.pad_spt"
));

$proto125["m_expr"]=$obj;
$proto125["m_alias"] = "";
$obj = new SQLFieldListItem($proto125);

$proto0["m_fieldlist"][]=$obj;
						$proto127=array();
			$obj = new SQLField(array(
	"m_strName" => "r_nsr_id",
	"m_strTable" => "pad.pad_spt"
));

$proto127["m_expr"]=$obj;
$proto127["m_alias"] = "";
$obj = new SQLFieldListItem($proto127);

$proto0["m_fieldlist"][]=$obj;
						$proto129=array();
			$obj = new SQLField(array(
	"m_strName" => "r_lokasi_pasang_id",
	"m_strTable" => "pad.pad_spt"
));

$proto129["m_expr"]=$obj;
$proto129["m_alias"] = "";
$obj = new SQLFieldListItem($proto129);

$proto0["m_fieldlist"][]=$obj;
						$proto131=array();
			$obj = new SQLField(array(
	"m_strName" => "r_lokasi_pasang_val",
	"m_strTable" => "pad.pad_spt"
));

$proto131["m_expr"]=$obj;
$proto131["m_alias"] = "";
$obj = new SQLFieldListItem($proto131);

$proto0["m_fieldlist"][]=$obj;
						$proto133=array();
			$obj = new SQLField(array(
	"m_strName" => "r_jalanklas_val",
	"m_strTable" => "pad.pad_spt"
));

$proto133["m_expr"]=$obj;
$proto133["m_alias"] = "";
$obj = new SQLFieldListItem($proto133);

$proto0["m_fieldlist"][]=$obj;
						$proto135=array();
			$obj = new SQLField(array(
	"m_strName" => "r_sudut_pandang_id",
	"m_strTable" => "pad.pad_spt"
));

$proto135["m_expr"]=$obj;
$proto135["m_alias"] = "";
$obj = new SQLFieldListItem($proto135);

$proto0["m_fieldlist"][]=$obj;
						$proto137=array();
			$obj = new SQLField(array(
	"m_strName" => "r_sudut_pandang_val",
	"m_strTable" => "pad.pad_spt"
));

$proto137["m_expr"]=$obj;
$proto137["m_alias"] = "";
$obj = new SQLFieldListItem($proto137);

$proto0["m_fieldlist"][]=$obj;
						$proto139=array();
			$obj = new SQLField(array(
	"m_strName" => "r_tinggi",
	"m_strTable" => "pad.pad_spt"
));

$proto139["m_expr"]=$obj;
$proto139["m_alias"] = "";
$obj = new SQLFieldListItem($proto139);

$proto0["m_fieldlist"][]=$obj;
						$proto141=array();
			$obj = new SQLField(array(
	"m_strName" => "r_njop",
	"m_strTable" => "pad.pad_spt"
));

$proto141["m_expr"]=$obj;
$proto141["m_alias"] = "";
$obj = new SQLFieldListItem($proto141);

$proto0["m_fieldlist"][]=$obj;
						$proto143=array();
			$obj = new SQLField(array(
	"m_strName" => "r_status",
	"m_strTable" => "pad.pad_spt"
));

$proto143["m_expr"]=$obj;
$proto143["m_alias"] = "";
$obj = new SQLFieldListItem($proto143);

$proto0["m_fieldlist"][]=$obj;
						$proto145=array();
			$obj = new SQLField(array(
	"m_strName" => "r_njop_ketinggian",
	"m_strTable" => "pad.pad_spt"
));

$proto145["m_expr"]=$obj;
$proto145["m_alias"] = "";
$obj = new SQLFieldListItem($proto145);

$proto0["m_fieldlist"][]=$obj;
						$proto147=array();
			$obj = new SQLField(array(
	"m_strName" => "status_pembayaran",
	"m_strTable" => "pad.pad_spt"
));

$proto147["m_expr"]=$obj;
$proto147["m_alias"] = "";
$obj = new SQLFieldListItem($proto147);

$proto0["m_fieldlist"][]=$obj;
						$proto149=array();
			$obj = new SQLField(array(
	"m_strName" => "rek_no_paneng",
	"m_strTable" => "pad.pad_spt"
));

$proto149["m_expr"]=$obj;
$proto149["m_alias"] = "";
$obj = new SQLFieldListItem($proto149);

$proto0["m_fieldlist"][]=$obj;
						$proto151=array();
			$obj = new SQLField(array(
	"m_strName" => "sptno_lengkap",
	"m_strTable" => "pad.pad_spt"
));

$proto151["m_expr"]=$obj;
$proto151["m_alias"] = "";
$obj = new SQLFieldListItem($proto151);

$proto0["m_fieldlist"][]=$obj;
						$proto153=array();
			$obj = new SQLField(array(
	"m_strName" => "sptno_lama",
	"m_strTable" => "pad.pad_spt"
));

$proto153["m_expr"]=$obj;
$proto153["m_alias"] = "";
$obj = new SQLFieldListItem($proto153);

$proto0["m_fieldlist"][]=$obj;
						$proto155=array();
			$obj = new SQLField(array(
	"m_strName" => "r_nama",
	"m_strTable" => "pad.pad_spt"
));

$proto155["m_expr"]=$obj;
$proto155["m_alias"] = "";
$obj = new SQLFieldListItem($proto155);

$proto0["m_fieldlist"][]=$obj;
						$proto157=array();
			$obj = new SQLField(array(
	"m_strName" => "r_alamat",
	"m_strTable" => "pad.pad_spt"
));

$proto157["m_expr"]=$obj;
$proto157["m_alias"] = "";
$obj = new SQLFieldListItem($proto157);

$proto0["m_fieldlist"][]=$obj;
						$proto159=array();
			$obj = new SQLField(array(
	"m_strName" => "omset1",
	"m_strTable" => "pad.pad_spt"
));

$proto159["m_expr"]=$obj;
$proto159["m_alias"] = "";
$obj = new SQLFieldListItem($proto159);

$proto0["m_fieldlist"][]=$obj;
						$proto161=array();
			$obj = new SQLField(array(
	"m_strName" => "omset2",
	"m_strTable" => "pad.pad_spt"
));

$proto161["m_expr"]=$obj;
$proto161["m_alias"] = "";
$obj = new SQLFieldListItem($proto161);

$proto0["m_fieldlist"][]=$obj;
						$proto163=array();
			$obj = new SQLField(array(
	"m_strName" => "omset3",
	"m_strTable" => "pad.pad_spt"
));

$proto163["m_expr"]=$obj;
$proto163["m_alias"] = "";
$obj = new SQLFieldListItem($proto163);

$proto0["m_fieldlist"][]=$obj;
						$proto165=array();
			$obj = new SQLField(array(
	"m_strName" => "omset4",
	"m_strTable" => "pad.pad_spt"
));

$proto165["m_expr"]=$obj;
$proto165["m_alias"] = "";
$obj = new SQLFieldListItem($proto165);

$proto0["m_fieldlist"][]=$obj;
						$proto167=array();
			$obj = new SQLField(array(
	"m_strName" => "omset5",
	"m_strTable" => "pad.pad_spt"
));

$proto167["m_expr"]=$obj;
$proto167["m_alias"] = "";
$obj = new SQLFieldListItem($proto167);

$proto0["m_fieldlist"][]=$obj;
						$proto169=array();
			$obj = new SQLField(array(
	"m_strName" => "omset6",
	"m_strTable" => "pad.pad_spt"
));

$proto169["m_expr"]=$obj;
$proto169["m_alias"] = "";
$obj = new SQLFieldListItem($proto169);

$proto0["m_fieldlist"][]=$obj;
						$proto171=array();
			$obj = new SQLField(array(
	"m_strName" => "omset7",
	"m_strTable" => "pad.pad_spt"
));

$proto171["m_expr"]=$obj;
$proto171["m_alias"] = "";
$obj = new SQLFieldListItem($proto171);

$proto0["m_fieldlist"][]=$obj;
						$proto173=array();
			$obj = new SQLField(array(
	"m_strName" => "omset8",
	"m_strTable" => "pad.pad_spt"
));

$proto173["m_expr"]=$obj;
$proto173["m_alias"] = "";
$obj = new SQLFieldListItem($proto173);

$proto0["m_fieldlist"][]=$obj;
						$proto175=array();
			$obj = new SQLField(array(
	"m_strName" => "omset9",
	"m_strTable" => "pad.pad_spt"
));

$proto175["m_expr"]=$obj;
$proto175["m_alias"] = "";
$obj = new SQLFieldListItem($proto175);

$proto0["m_fieldlist"][]=$obj;
						$proto177=array();
			$obj = new SQLField(array(
	"m_strName" => "omset10",
	"m_strTable" => "pad.pad_spt"
));

$proto177["m_expr"]=$obj;
$proto177["m_alias"] = "";
$obj = new SQLFieldListItem($proto177);

$proto0["m_fieldlist"][]=$obj;
						$proto179=array();
			$obj = new SQLField(array(
	"m_strName" => "omset11",
	"m_strTable" => "pad.pad_spt"
));

$proto179["m_expr"]=$obj;
$proto179["m_alias"] = "";
$obj = new SQLFieldListItem($proto179);

$proto0["m_fieldlist"][]=$obj;
						$proto181=array();
			$obj = new SQLField(array(
	"m_strName" => "omset12",
	"m_strTable" => "pad.pad_spt"
));

$proto181["m_expr"]=$obj;
$proto181["m_alias"] = "";
$obj = new SQLFieldListItem($proto181);

$proto0["m_fieldlist"][]=$obj;
						$proto183=array();
			$obj = new SQLField(array(
	"m_strName" => "omset13",
	"m_strTable" => "pad.pad_spt"
));

$proto183["m_expr"]=$obj;
$proto183["m_alias"] = "";
$obj = new SQLFieldListItem($proto183);

$proto0["m_fieldlist"][]=$obj;
						$proto185=array();
			$obj = new SQLField(array(
	"m_strName" => "omset14",
	"m_strTable" => "pad.pad_spt"
));

$proto185["m_expr"]=$obj;
$proto185["m_alias"] = "";
$obj = new SQLFieldListItem($proto185);

$proto0["m_fieldlist"][]=$obj;
						$proto187=array();
			$obj = new SQLField(array(
	"m_strName" => "omset15",
	"m_strTable" => "pad.pad_spt"
));

$proto187["m_expr"]=$obj;
$proto187["m_alias"] = "";
$obj = new SQLFieldListItem($proto187);

$proto0["m_fieldlist"][]=$obj;
						$proto189=array();
			$obj = new SQLField(array(
	"m_strName" => "omset16",
	"m_strTable" => "pad.pad_spt"
));

$proto189["m_expr"]=$obj;
$proto189["m_alias"] = "";
$obj = new SQLFieldListItem($proto189);

$proto0["m_fieldlist"][]=$obj;
						$proto191=array();
			$obj = new SQLField(array(
	"m_strName" => "omset17",
	"m_strTable" => "pad.pad_spt"
));

$proto191["m_expr"]=$obj;
$proto191["m_alias"] = "";
$obj = new SQLFieldListItem($proto191);

$proto0["m_fieldlist"][]=$obj;
						$proto193=array();
			$obj = new SQLField(array(
	"m_strName" => "omset18",
	"m_strTable" => "pad.pad_spt"
));

$proto193["m_expr"]=$obj;
$proto193["m_alias"] = "";
$obj = new SQLFieldListItem($proto193);

$proto0["m_fieldlist"][]=$obj;
						$proto195=array();
			$obj = new SQLField(array(
	"m_strName" => "omset19",
	"m_strTable" => "pad.pad_spt"
));

$proto195["m_expr"]=$obj;
$proto195["m_alias"] = "";
$obj = new SQLFieldListItem($proto195);

$proto0["m_fieldlist"][]=$obj;
						$proto197=array();
			$obj = new SQLField(array(
	"m_strName" => "omset20",
	"m_strTable" => "pad.pad_spt"
));

$proto197["m_expr"]=$obj;
$proto197["m_alias"] = "";
$obj = new SQLFieldListItem($proto197);

$proto0["m_fieldlist"][]=$obj;
						$proto199=array();
			$obj = new SQLField(array(
	"m_strName" => "omset21",
	"m_strTable" => "pad.pad_spt"
));

$proto199["m_expr"]=$obj;
$proto199["m_alias"] = "";
$obj = new SQLFieldListItem($proto199);

$proto0["m_fieldlist"][]=$obj;
						$proto201=array();
			$obj = new SQLField(array(
	"m_strName" => "omset22",
	"m_strTable" => "pad.pad_spt"
));

$proto201["m_expr"]=$obj;
$proto201["m_alias"] = "";
$obj = new SQLFieldListItem($proto201);

$proto0["m_fieldlist"][]=$obj;
						$proto203=array();
			$obj = new SQLField(array(
	"m_strName" => "omset23",
	"m_strTable" => "pad.pad_spt"
));

$proto203["m_expr"]=$obj;
$proto203["m_alias"] = "";
$obj = new SQLFieldListItem($proto203);

$proto0["m_fieldlist"][]=$obj;
						$proto205=array();
			$obj = new SQLField(array(
	"m_strName" => "omset24",
	"m_strTable" => "pad.pad_spt"
));

$proto205["m_expr"]=$obj;
$proto205["m_alias"] = "";
$obj = new SQLFieldListItem($proto205);

$proto0["m_fieldlist"][]=$obj;
						$proto207=array();
			$obj = new SQLField(array(
	"m_strName" => "omset25",
	"m_strTable" => "pad.pad_spt"
));

$proto207["m_expr"]=$obj;
$proto207["m_alias"] = "";
$obj = new SQLFieldListItem($proto207);

$proto0["m_fieldlist"][]=$obj;
						$proto209=array();
			$obj = new SQLField(array(
	"m_strName" => "omset26",
	"m_strTable" => "pad.pad_spt"
));

$proto209["m_expr"]=$obj;
$proto209["m_alias"] = "";
$obj = new SQLFieldListItem($proto209);

$proto0["m_fieldlist"][]=$obj;
						$proto211=array();
			$obj = new SQLField(array(
	"m_strName" => "omset27",
	"m_strTable" => "pad.pad_spt"
));

$proto211["m_expr"]=$obj;
$proto211["m_alias"] = "";
$obj = new SQLFieldListItem($proto211);

$proto0["m_fieldlist"][]=$obj;
						$proto213=array();
			$obj = new SQLField(array(
	"m_strName" => "omset28",
	"m_strTable" => "pad.pad_spt"
));

$proto213["m_expr"]=$obj;
$proto213["m_alias"] = "";
$obj = new SQLFieldListItem($proto213);

$proto0["m_fieldlist"][]=$obj;
						$proto215=array();
			$obj = new SQLField(array(
	"m_strName" => "omset29",
	"m_strTable" => "pad.pad_spt"
));

$proto215["m_expr"]=$obj;
$proto215["m_alias"] = "";
$obj = new SQLFieldListItem($proto215);

$proto0["m_fieldlist"][]=$obj;
						$proto217=array();
			$obj = new SQLField(array(
	"m_strName" => "omset30",
	"m_strTable" => "pad.pad_spt"
));

$proto217["m_expr"]=$obj;
$proto217["m_alias"] = "";
$obj = new SQLFieldListItem($proto217);

$proto0["m_fieldlist"][]=$obj;
						$proto219=array();
			$obj = new SQLField(array(
	"m_strName" => "omset31",
	"m_strTable" => "pad.pad_spt"
));

$proto219["m_expr"]=$obj;
$proto219["m_alias"] = "";
$obj = new SQLFieldListItem($proto219);

$proto0["m_fieldlist"][]=$obj;
						$proto221=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan1",
	"m_strTable" => "pad.pad_spt"
));

$proto221["m_expr"]=$obj;
$proto221["m_alias"] = "";
$obj = new SQLFieldListItem($proto221);

$proto0["m_fieldlist"][]=$obj;
						$proto223=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan2",
	"m_strTable" => "pad.pad_spt"
));

$proto223["m_expr"]=$obj;
$proto223["m_alias"] = "";
$obj = new SQLFieldListItem($proto223);

$proto0["m_fieldlist"][]=$obj;
						$proto225=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan3",
	"m_strTable" => "pad.pad_spt"
));

$proto225["m_expr"]=$obj;
$proto225["m_alias"] = "";
$obj = new SQLFieldListItem($proto225);

$proto0["m_fieldlist"][]=$obj;
						$proto227=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan4",
	"m_strTable" => "pad.pad_spt"
));

$proto227["m_expr"]=$obj;
$proto227["m_alias"] = "";
$obj = new SQLFieldListItem($proto227);

$proto0["m_fieldlist"][]=$obj;
						$proto229=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan5",
	"m_strTable" => "pad.pad_spt"
));

$proto229["m_expr"]=$obj;
$proto229["m_alias"] = "";
$obj = new SQLFieldListItem($proto229);

$proto0["m_fieldlist"][]=$obj;
						$proto231=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan6",
	"m_strTable" => "pad.pad_spt"
));

$proto231["m_expr"]=$obj;
$proto231["m_alias"] = "";
$obj = new SQLFieldListItem($proto231);

$proto0["m_fieldlist"][]=$obj;
						$proto233=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan7",
	"m_strTable" => "pad.pad_spt"
));

$proto233["m_expr"]=$obj;
$proto233["m_alias"] = "";
$obj = new SQLFieldListItem($proto233);

$proto0["m_fieldlist"][]=$obj;
						$proto235=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan8",
	"m_strTable" => "pad.pad_spt"
));

$proto235["m_expr"]=$obj;
$proto235["m_alias"] = "";
$obj = new SQLFieldListItem($proto235);

$proto0["m_fieldlist"][]=$obj;
						$proto237=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan9",
	"m_strTable" => "pad.pad_spt"
));

$proto237["m_expr"]=$obj;
$proto237["m_alias"] = "";
$obj = new SQLFieldListItem($proto237);

$proto0["m_fieldlist"][]=$obj;
						$proto239=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan10",
	"m_strTable" => "pad.pad_spt"
));

$proto239["m_expr"]=$obj;
$proto239["m_alias"] = "";
$obj = new SQLFieldListItem($proto239);

$proto0["m_fieldlist"][]=$obj;
						$proto241=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan11",
	"m_strTable" => "pad.pad_spt"
));

$proto241["m_expr"]=$obj;
$proto241["m_alias"] = "";
$obj = new SQLFieldListItem($proto241);

$proto0["m_fieldlist"][]=$obj;
						$proto243=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan12",
	"m_strTable" => "pad.pad_spt"
));

$proto243["m_expr"]=$obj;
$proto243["m_alias"] = "";
$obj = new SQLFieldListItem($proto243);

$proto0["m_fieldlist"][]=$obj;
						$proto245=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan13",
	"m_strTable" => "pad.pad_spt"
));

$proto245["m_expr"]=$obj;
$proto245["m_alias"] = "";
$obj = new SQLFieldListItem($proto245);

$proto0["m_fieldlist"][]=$obj;
						$proto247=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan14",
	"m_strTable" => "pad.pad_spt"
));

$proto247["m_expr"]=$obj;
$proto247["m_alias"] = "";
$obj = new SQLFieldListItem($proto247);

$proto0["m_fieldlist"][]=$obj;
						$proto249=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan15",
	"m_strTable" => "pad.pad_spt"
));

$proto249["m_expr"]=$obj;
$proto249["m_alias"] = "";
$obj = new SQLFieldListItem($proto249);

$proto0["m_fieldlist"][]=$obj;
						$proto251=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan16",
	"m_strTable" => "pad.pad_spt"
));

$proto251["m_expr"]=$obj;
$proto251["m_alias"] = "";
$obj = new SQLFieldListItem($proto251);

$proto0["m_fieldlist"][]=$obj;
						$proto253=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan17",
	"m_strTable" => "pad.pad_spt"
));

$proto253["m_expr"]=$obj;
$proto253["m_alias"] = "";
$obj = new SQLFieldListItem($proto253);

$proto0["m_fieldlist"][]=$obj;
						$proto255=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan18",
	"m_strTable" => "pad.pad_spt"
));

$proto255["m_expr"]=$obj;
$proto255["m_alias"] = "";
$obj = new SQLFieldListItem($proto255);

$proto0["m_fieldlist"][]=$obj;
						$proto257=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan19",
	"m_strTable" => "pad.pad_spt"
));

$proto257["m_expr"]=$obj;
$proto257["m_alias"] = "";
$obj = new SQLFieldListItem($proto257);

$proto0["m_fieldlist"][]=$obj;
						$proto259=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan20",
	"m_strTable" => "pad.pad_spt"
));

$proto259["m_expr"]=$obj;
$proto259["m_alias"] = "";
$obj = new SQLFieldListItem($proto259);

$proto0["m_fieldlist"][]=$obj;
						$proto261=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan21",
	"m_strTable" => "pad.pad_spt"
));

$proto261["m_expr"]=$obj;
$proto261["m_alias"] = "";
$obj = new SQLFieldListItem($proto261);

$proto0["m_fieldlist"][]=$obj;
						$proto263=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan22",
	"m_strTable" => "pad.pad_spt"
));

$proto263["m_expr"]=$obj;
$proto263["m_alias"] = "";
$obj = new SQLFieldListItem($proto263);

$proto0["m_fieldlist"][]=$obj;
						$proto265=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan23",
	"m_strTable" => "pad.pad_spt"
));

$proto265["m_expr"]=$obj;
$proto265["m_alias"] = "";
$obj = new SQLFieldListItem($proto265);

$proto0["m_fieldlist"][]=$obj;
						$proto267=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan24",
	"m_strTable" => "pad.pad_spt"
));

$proto267["m_expr"]=$obj;
$proto267["m_alias"] = "";
$obj = new SQLFieldListItem($proto267);

$proto0["m_fieldlist"][]=$obj;
						$proto269=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan25",
	"m_strTable" => "pad.pad_spt"
));

$proto269["m_expr"]=$obj;
$proto269["m_alias"] = "";
$obj = new SQLFieldListItem($proto269);

$proto0["m_fieldlist"][]=$obj;
						$proto271=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan26",
	"m_strTable" => "pad.pad_spt"
));

$proto271["m_expr"]=$obj;
$proto271["m_alias"] = "";
$obj = new SQLFieldListItem($proto271);

$proto0["m_fieldlist"][]=$obj;
						$proto273=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan27",
	"m_strTable" => "pad.pad_spt"
));

$proto273["m_expr"]=$obj;
$proto273["m_alias"] = "";
$obj = new SQLFieldListItem($proto273);

$proto0["m_fieldlist"][]=$obj;
						$proto275=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan28",
	"m_strTable" => "pad.pad_spt"
));

$proto275["m_expr"]=$obj;
$proto275["m_alias"] = "";
$obj = new SQLFieldListItem($proto275);

$proto0["m_fieldlist"][]=$obj;
						$proto277=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan29",
	"m_strTable" => "pad.pad_spt"
));

$proto277["m_expr"]=$obj;
$proto277["m_alias"] = "";
$obj = new SQLFieldListItem($proto277);

$proto0["m_fieldlist"][]=$obj;
						$proto279=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan30",
	"m_strTable" => "pad.pad_spt"
));

$proto279["m_expr"]=$obj;
$proto279["m_alias"] = "";
$obj = new SQLFieldListItem($proto279);

$proto0["m_fieldlist"][]=$obj;
						$proto281=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan31",
	"m_strTable" => "pad.pad_spt"
));

$proto281["m_expr"]=$obj;
$proto281["m_alias"] = "";
$obj = new SQLFieldListItem($proto281);

$proto0["m_fieldlist"][]=$obj;
						$proto283=array();
			$obj = new SQLField(array(
	"m_strName" => "doc_no",
	"m_strTable" => "pad.pad_spt"
));

$proto283["m_expr"]=$obj;
$proto283["m_alias"] = "";
$obj = new SQLFieldListItem($proto283);

$proto0["m_fieldlist"][]=$obj;
						$proto285=array();
			$obj = new SQLField(array(
	"m_strName" => "cara_bayar",
	"m_strTable" => "pad.pad_spt"
));

$proto285["m_expr"]=$obj;
$proto285["m_alias"] = "";
$obj = new SQLFieldListItem($proto285);

$proto0["m_fieldlist"][]=$obj;
						$proto287=array();
			$obj = new SQLField(array(
	"m_strName" => "kelompok_usaha_id",
	"m_strTable" => "pad.pad_spt"
));

$proto287["m_expr"]=$obj;
$proto287["m_alias"] = "";
$obj = new SQLFieldListItem($proto287);

$proto0["m_fieldlist"][]=$obj;
						$proto289=array();
			$obj = new SQLField(array(
	"m_strName" => "zona_id",
	"m_strTable" => "pad.pad_spt"
));

$proto289["m_expr"]=$obj;
$proto289["m_alias"] = "";
$obj = new SQLFieldListItem($proto289);

$proto0["m_fieldlist"][]=$obj;
						$proto291=array();
			$obj = new SQLField(array(
	"m_strName" => "manfaat_id",
	"m_strTable" => "pad.pad_spt"
));

$proto291["m_expr"]=$obj;
$proto291["m_alias"] = "";
$obj = new SQLFieldListItem($proto291);

$proto0["m_fieldlist"][]=$obj;
						$proto293=array();
			$obj = new SQLField(array(
	"m_strName" => "golongan",
	"m_strTable" => "pad.pad_spt"
));

$proto293["m_expr"]=$obj;
$proto293["m_alias"] = "";
$obj = new SQLFieldListItem($proto293);

$proto0["m_fieldlist"][]=$obj;
						$proto295=array();
			$obj = new SQLField(array(
	"m_strName" => "omset_lain",
	"m_strTable" => "pad.pad_spt"
));

$proto295["m_expr"]=$obj;
$proto295["m_alias"] = "";
$obj = new SQLFieldListItem($proto295);

$proto0["m_fieldlist"][]=$obj;
						$proto297=array();
			$obj = new SQLField(array(
	"m_strName" => "keterangan_lain",
	"m_strTable" => "pad.pad_spt"
));

$proto297["m_expr"]=$obj;
$proto297["m_alias"] = "";
$obj = new SQLFieldListItem($proto297);

$proto0["m_fieldlist"][]=$obj;
						$proto299=array();
			$obj = new SQLField(array(
	"m_strName" => "ijin_no",
	"m_strTable" => "pad.pad_spt"
));

$proto299["m_expr"]=$obj;
$proto299["m_alias"] = "";
$obj = new SQLFieldListItem($proto299);

$proto0["m_fieldlist"][]=$obj;
						$proto301=array();
			$obj = new SQLField(array(
	"m_strName" => "jenis_masa",
	"m_strTable" => "pad.pad_spt"
));

$proto301["m_expr"]=$obj;
$proto301["m_alias"] = "";
$obj = new SQLFieldListItem($proto301);

$proto0["m_fieldlist"][]=$obj;
						$proto303=array();
			$obj = new SQLField(array(
	"m_strName" => "skpd_lama",
	"m_strTable" => "pad.pad_spt"
));

$proto303["m_expr"]=$obj;
$proto303["m_alias"] = "";
$obj = new SQLFieldListItem($proto303);

$proto0["m_fieldlist"][]=$obj;
						$proto305=array();
			$obj = new SQLField(array(
	"m_strName" => "proses",
	"m_strTable" => "pad.pad_spt"
));

$proto305["m_expr"]=$obj;
$proto305["m_alias"] = "";
$obj = new SQLFieldListItem($proto305);

$proto0["m_fieldlist"][]=$obj;
						$proto307=array();
			$obj = new SQLField(array(
	"m_strName" => "tanggal_validasi",
	"m_strTable" => "pad.pad_spt"
));

$proto307["m_expr"]=$obj;
$proto307["m_alias"] = "";
$obj = new SQLFieldListItem($proto307);

$proto0["m_fieldlist"][]=$obj;
						$proto309=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan",
	"m_strTable" => "pad.pad_spt"
));

$proto309["m_expr"]=$obj;
$proto309["m_alias"] = "";
$obj = new SQLFieldListItem($proto309);

$proto0["m_fieldlist"][]=$obj;
						$proto311=array();
			$obj = new SQLField(array(
	"m_strName" => "no_telp",
	"m_strTable" => "pad.pad_spt"
));

$proto311["m_expr"]=$obj;
$proto311["m_alias"] = "";
$obj = new SQLFieldListItem($proto311);

$proto0["m_fieldlist"][]=$obj;
						$proto313=array();
			$obj = new SQLField(array(
	"m_strName" => "usaha_id",
	"m_strTable" => "pad.pad_spt"
));

$proto313["m_expr"]=$obj;
$proto313["m_alias"] = "";
$obj = new SQLFieldListItem($proto313);

$proto0["m_fieldlist"][]=$obj;
						$proto315=array();
			$obj = new SQLField(array(
	"m_strName" => "multiple",
	"m_strTable" => "pad.pad_spt"
));

$proto315["m_expr"]=$obj;
$proto315["m_alias"] = "";
$obj = new SQLFieldListItem($proto315);

$proto0["m_fieldlist"][]=$obj;
						$proto317=array();
			$obj = new SQLField(array(
	"m_strName" => "bulan_telat",
	"m_strTable" => "pad.pad_spt"
));

$proto317["m_expr"]=$obj;
$proto317["m_alias"] = "";
$obj = new SQLFieldListItem($proto317);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto319=array();
$proto319["m_link"] = "SQLL_MAIN";
			$proto320=array();
$proto320["m_strName"] = "pad.pad_spt";
$proto320["m_columns"] = array();
$proto320["m_columns"][] = "id";
$proto320["m_columns"][] = "tahun";
$proto320["m_columns"][] = "sptno";
$proto320["m_columns"][] = "customer_id";
$proto320["m_columns"][] = "customer_usaha_id";
$proto320["m_columns"][] = "rekening_id";
$proto320["m_columns"][] = "pajak_id";
$proto320["m_columns"][] = "type_id";
$proto320["m_columns"][] = "so";
$proto320["m_columns"][] = "masadari";
$proto320["m_columns"][] = "masasd";
$proto320["m_columns"][] = "jatuhtempotgl";
$proto320["m_columns"][] = "r_bayarid";
$proto320["m_columns"][] = "minimal_omset";
$proto320["m_columns"][] = "dasar";
$proto320["m_columns"][] = "tarif";
$proto320["m_columns"][] = "denda";
$proto320["m_columns"][] = "bunga";
$proto320["m_columns"][] = "setoran";
$proto320["m_columns"][] = "kenaikan";
$proto320["m_columns"][] = "kompensasi";
$proto320["m_columns"][] = "lain2";
$proto320["m_columns"][] = "pajak_terhutang";
$proto320["m_columns"][] = "air_manfaat_id";
$proto320["m_columns"][] = "air_zona_id";
$proto320["m_columns"][] = "meteran_awal";
$proto320["m_columns"][] = "meteran_akhir";
$proto320["m_columns"][] = "volume";
$proto320["m_columns"][] = "satuan";
$proto320["m_columns"][] = "r_panjang";
$proto320["m_columns"][] = "r_lebar";
$proto320["m_columns"][] = "r_muka";
$proto320["m_columns"][] = "r_banyak";
$proto320["m_columns"][] = "r_luas";
$proto320["m_columns"][] = "r_tarifid";
$proto320["m_columns"][] = "r_kontrak";
$proto320["m_columns"][] = "r_lama";
$proto320["m_columns"][] = "r_jalan_id";
$proto320["m_columns"][] = "r_jalanklas_id";
$proto320["m_columns"][] = "r_lokasi";
$proto320["m_columns"][] = "r_judul";
$proto320["m_columns"][] = "r_kelurahan_id";
$proto320["m_columns"][] = "r_lokasi_id";
$proto320["m_columns"][] = "r_calculated";
$proto320["m_columns"][] = "r_nsr";
$proto320["m_columns"][] = "r_nsrno";
$proto320["m_columns"][] = "r_nsrtgl";
$proto320["m_columns"][] = "r_nsl_kecamatan_id";
$proto320["m_columns"][] = "r_nsl_type_id";
$proto320["m_columns"][] = "r_nsl_nilai";
$proto320["m_columns"][] = "notes";
$proto320["m_columns"][] = "unit_id";
$proto320["m_columns"][] = "enabled";
$proto320["m_columns"][] = "created";
$proto320["m_columns"][] = "create_uid";
$proto320["m_columns"][] = "updated";
$proto320["m_columns"][] = "update_uid";
$proto320["m_columns"][] = "terimanip";
$proto320["m_columns"][] = "terimatgl";
$proto320["m_columns"][] = "kirimtgl";
$proto320["m_columns"][] = "isprint_dc";
$proto320["m_columns"][] = "r_nsr_id";
$proto320["m_columns"][] = "r_lokasi_pasang_id";
$proto320["m_columns"][] = "r_lokasi_pasang_val";
$proto320["m_columns"][] = "r_jalanklas_val";
$proto320["m_columns"][] = "r_sudut_pandang_id";
$proto320["m_columns"][] = "r_sudut_pandang_val";
$proto320["m_columns"][] = "r_tinggi";
$proto320["m_columns"][] = "r_njop";
$proto320["m_columns"][] = "r_status";
$proto320["m_columns"][] = "r_njop_ketinggian";
$proto320["m_columns"][] = "status_pembayaran";
$proto320["m_columns"][] = "rek_no_paneng";
$proto320["m_columns"][] = "sptno_lengkap";
$proto320["m_columns"][] = "sptno_lama";
$proto320["m_columns"][] = "r_nama";
$proto320["m_columns"][] = "r_alamat";
$proto320["m_columns"][] = "omset1";
$proto320["m_columns"][] = "omset2";
$proto320["m_columns"][] = "omset3";
$proto320["m_columns"][] = "omset4";
$proto320["m_columns"][] = "omset5";
$proto320["m_columns"][] = "omset6";
$proto320["m_columns"][] = "omset7";
$proto320["m_columns"][] = "omset8";
$proto320["m_columns"][] = "omset9";
$proto320["m_columns"][] = "omset10";
$proto320["m_columns"][] = "omset11";
$proto320["m_columns"][] = "omset12";
$proto320["m_columns"][] = "omset13";
$proto320["m_columns"][] = "omset14";
$proto320["m_columns"][] = "omset15";
$proto320["m_columns"][] = "omset16";
$proto320["m_columns"][] = "omset17";
$proto320["m_columns"][] = "omset18";
$proto320["m_columns"][] = "omset19";
$proto320["m_columns"][] = "omset20";
$proto320["m_columns"][] = "omset21";
$proto320["m_columns"][] = "omset22";
$proto320["m_columns"][] = "omset23";
$proto320["m_columns"][] = "omset24";
$proto320["m_columns"][] = "omset25";
$proto320["m_columns"][] = "omset26";
$proto320["m_columns"][] = "omset27";
$proto320["m_columns"][] = "omset28";
$proto320["m_columns"][] = "omset29";
$proto320["m_columns"][] = "omset30";
$proto320["m_columns"][] = "omset31";
$proto320["m_columns"][] = "keterangan1";
$proto320["m_columns"][] = "keterangan2";
$proto320["m_columns"][] = "keterangan3";
$proto320["m_columns"][] = "keterangan4";
$proto320["m_columns"][] = "keterangan5";
$proto320["m_columns"][] = "keterangan6";
$proto320["m_columns"][] = "keterangan7";
$proto320["m_columns"][] = "keterangan8";
$proto320["m_columns"][] = "keterangan9";
$proto320["m_columns"][] = "keterangan10";
$proto320["m_columns"][] = "keterangan11";
$proto320["m_columns"][] = "keterangan12";
$proto320["m_columns"][] = "keterangan13";
$proto320["m_columns"][] = "keterangan14";
$proto320["m_columns"][] = "keterangan15";
$proto320["m_columns"][] = "keterangan16";
$proto320["m_columns"][] = "keterangan17";
$proto320["m_columns"][] = "keterangan18";
$proto320["m_columns"][] = "keterangan19";
$proto320["m_columns"][] = "keterangan20";
$proto320["m_columns"][] = "keterangan21";
$proto320["m_columns"][] = "keterangan22";
$proto320["m_columns"][] = "keterangan23";
$proto320["m_columns"][] = "keterangan24";
$proto320["m_columns"][] = "keterangan25";
$proto320["m_columns"][] = "keterangan26";
$proto320["m_columns"][] = "keterangan27";
$proto320["m_columns"][] = "keterangan28";
$proto320["m_columns"][] = "keterangan29";
$proto320["m_columns"][] = "keterangan30";
$proto320["m_columns"][] = "keterangan31";
$proto320["m_columns"][] = "doc_no";
$proto320["m_columns"][] = "cara_bayar";
$proto320["m_columns"][] = "kelompok_usaha_id";
$proto320["m_columns"][] = "zona_id";
$proto320["m_columns"][] = "manfaat_id";
$proto320["m_columns"][] = "golongan";
$proto320["m_columns"][] = "omset_lain";
$proto320["m_columns"][] = "keterangan_lain";
$proto320["m_columns"][] = "ijin_no";
$proto320["m_columns"][] = "jenis_masa";
$proto320["m_columns"][] = "skpd_lama";
$proto320["m_columns"][] = "proses";
$proto320["m_columns"][] = "tanggal_validasi";
$proto320["m_columns"][] = "bulan";
$proto320["m_columns"][] = "no_telp";
$proto320["m_columns"][] = "usaha_id";
$proto320["m_columns"][] = "multiple";
$proto320["m_columns"][] = "bulan_telat";
$obj = new SQLTable($proto320);

$proto319["m_table"] = $obj;
$proto319["m_alias"] = "";
$proto321=array();
$proto321["m_sql"] = "";
$proto321["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto321["m_column"]=$obj;
$proto321["m_contained"] = array();
$proto321["m_strCase"] = "";
$proto321["m_havingmode"] = "0";
$proto321["m_inBrackets"] = "0";
$proto321["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto321);

$proto319["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto319);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_spt = createSqlQuery_pad_pad_spt();
																																																																																																																																																													$tdatapad_pad_spt[".sqlquery"] = $queryData_pad_pad_spt;
	
if(isset($tdatapad_pad_spt["field2"])){
	$tdatapad_pad_spt["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_spt["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_spt["field2"]["LookupType"] = 4;
	$tdatapad_pad_spt["field2"]["LinkField"] = "email";
	$tdatapad_pad_spt["field2"]["DisplayField"] = "name";
	$tdatapad_pad_spt[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_spt"] = new eventsBase;
$tdatapad_pad_spt[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_spt");

?>