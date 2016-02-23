<?php
include_once(getabspath("include/pad_pad_spt_settings.php"));

function DisplayMasterTableInfo_pad_pad_spt($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="pad.pad_spt";

//$strSQL = "SELECT id,   tahun,   sptno,   customer_id,   customer_usaha_id,   rekening_id,   pajak_id,   type_id,   so,   masadari,   masasd,   jatuhtempotgl,   r_bayarid,   minimal_omset,   dasar,   tarif,   denda,   bunga,   setoran,   kenaikan,   kompensasi,   lain2,   pajak_terhutang,   air_manfaat_id,   air_zona_id,   meteran_awal,   meteran_akhir,   volume,   satuan,   r_panjang,   r_lebar,   r_muka,   r_banyak,   r_luas,   r_tarifid,   r_kontrak,   r_lama,   r_jalan_id,   r_jalanklas_id,   r_lokasi,   r_judul,   r_kelurahan_id,   r_lokasi_id,   r_calculated,   r_nsr,   r_nsrno,   r_nsrtgl,   r_nsl_kecamatan_id,   r_nsl_type_id,   r_nsl_nilai,   notes,   unit_id,   enabled,   created,   create_uid,   updated,   update_uid,   terimanip,   terimatgl,   kirimtgl,   isprint_dc,   r_nsr_id,   r_lokasi_pasang_id,   r_lokasi_pasang_val,   r_jalanklas_val,   r_sudut_pandang_id,   r_sudut_pandang_val,   r_tinggi,   r_njop,   r_status,   r_njop_ketinggian,   status_pembayaran,   rek_no_paneng,   sptno_lengkap,   sptno_lama,   r_nama,   r_alamat,   omset1,   omset2,   omset3,   omset4,   omset5,   omset6,   omset7,   omset8,   omset9,   omset10,   omset11,   omset12,   omset13,   omset14,   omset15,   omset16,   omset17,   omset18,   omset19,   omset20,   omset21,   omset22,   omset23,   omset24,   omset25,   omset26,   omset27,   omset28,   omset29,   omset30,   omset31,   keterangan1,   keterangan2,   keterangan3,   keterangan4,   keterangan5,   keterangan6,   keterangan7,   keterangan8,   keterangan9,   keterangan10,   keterangan11,   keterangan12,   keterangan13,   keterangan14,   keterangan15,   keterangan16,   keterangan17,   keterangan18,   keterangan19,   keterangan20,   keterangan21,   keterangan22,   keterangan23,   keterangan24,   keterangan25,   keterangan26,   keterangan27,   keterangan28,   keterangan29,   keterangan30,   keterangan31,   doc_no,   cara_bayar,   kelompok_usaha_id,   zona_id,   manfaat_id,   golongan,   omset_lain,   keterangan_lain,   ijin_no,   jenis_masa,   skpd_lama,   proses,   tanggal_validasi,   bulan,   no_telp,   usaha_id,   multiple,   bulan_telat  FROM \"pad\".pad_spt ";

	$cipherer = new RunnerCipherer($strTableName);
	$settings = new ProjectSettings($strTableName, PAGE_PRINT);
	
	$masterQuery = $settings->getSQLQuery();
	$viewControls = new ViewControlsContainer($settings, PAGE_PRINT);

$where="";

global $pageObject, $page_styles, $page_layouts, $page_layout_names, $container_styles;
$layout = new TLayout("masterprint","RoundedGreen","MobileGreen");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterprintheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterprintfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_spt_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="pad.pad_air_tanah_hit")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="pad.pad_stpd")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if(!$where)
{
	$strTableName=$oldTableName;
	return;
}
	$str = SecuritySQL("Export");
	if(strlen($str))
		$where.=" and ".$str;
	
	$strWhere = whereAdd($masterQuery->m_where->toSql($masterQuery),$where);
	if(strlen($strWhere))
		$strWhere=" where ".$strWhere." ";
	$strSQL = $masterQuery->HeadToSql().' '.$masterQuery->FromToSql().$strWhere.$masterQuery->TailToSql();

//	$strSQL=AddWhere($strSQL,$where);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$data = $cipherer->DecryptFetchedArray($rs);
	if(!$data)
	{
		$strTableName=$oldTableName;
		return;
	}
	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));
	

//	id - 
			$xt->assign("id_mastervalue", $viewControls->showDBValue("id", $data, $keylink));

//	tahun - 
			$xt->assign("tahun_mastervalue", $viewControls->showDBValue("tahun", $data, $keylink));

//	sptno - 
			$xt->assign("sptno_mastervalue", $viewControls->showDBValue("sptno", $data, $keylink));

//	customer_id - 
			$xt->assign("customer_id_mastervalue", $viewControls->showDBValue("customer_id", $data, $keylink));

//	customer_usaha_id - 
			$xt->assign("customer_usaha_id_mastervalue", $viewControls->showDBValue("customer_usaha_id", $data, $keylink));

//	rekening_id - 
			$xt->assign("rekening_id_mastervalue", $viewControls->showDBValue("rekening_id", $data, $keylink));

//	pajak_id - 
			$xt->assign("pajak_id_mastervalue", $viewControls->showDBValue("pajak_id", $data, $keylink));

//	type_id - 
			$xt->assign("type_id_mastervalue", $viewControls->showDBValue("type_id", $data, $keylink));

//	so - 
			$xt->assign("so_mastervalue", $viewControls->showDBValue("so", $data, $keylink));

//	masadari - Short Date
			$xt->assign("masadari_mastervalue", $viewControls->showDBValue("masadari", $data, $keylink));

//	masasd - Short Date
			$xt->assign("masasd_mastervalue", $viewControls->showDBValue("masasd", $data, $keylink));

//	jatuhtempotgl - Short Date
			$xt->assign("jatuhtempotgl_mastervalue", $viewControls->showDBValue("jatuhtempotgl", $data, $keylink));

//	r_bayarid - 
			$xt->assign("r_bayarid_mastervalue", $viewControls->showDBValue("r_bayarid", $data, $keylink));

//	minimal_omset - Number
			$xt->assign("minimal_omset_mastervalue", $viewControls->showDBValue("minimal_omset", $data, $keylink));

//	dasar - Number
			$xt->assign("dasar_mastervalue", $viewControls->showDBValue("dasar", $data, $keylink));

//	tarif - Number
			$xt->assign("tarif_mastervalue", $viewControls->showDBValue("tarif", $data, $keylink));

//	denda - Number
			$xt->assign("denda_mastervalue", $viewControls->showDBValue("denda", $data, $keylink));

//	bunga - Number
			$xt->assign("bunga_mastervalue", $viewControls->showDBValue("bunga", $data, $keylink));

//	setoran - Number
			$xt->assign("setoran_mastervalue", $viewControls->showDBValue("setoran", $data, $keylink));

//	kenaikan - Number
			$xt->assign("kenaikan_mastervalue", $viewControls->showDBValue("kenaikan", $data, $keylink));

//	kompensasi - Number
			$xt->assign("kompensasi_mastervalue", $viewControls->showDBValue("kompensasi", $data, $keylink));

//	lain2 - Number
			$xt->assign("lain2_mastervalue", $viewControls->showDBValue("lain2", $data, $keylink));

//	pajak_terhutang - 
			$xt->assign("pajak_terhutang_mastervalue", $viewControls->showDBValue("pajak_terhutang", $data, $keylink));

//	air_manfaat_id - 
			$xt->assign("air_manfaat_id_mastervalue", $viewControls->showDBValue("air_manfaat_id", $data, $keylink));

//	air_zona_id - 
			$xt->assign("air_zona_id_mastervalue", $viewControls->showDBValue("air_zona_id", $data, $keylink));

//	meteran_awal - 
			$xt->assign("meteran_awal_mastervalue", $viewControls->showDBValue("meteran_awal", $data, $keylink));

//	meteran_akhir - 
			$xt->assign("meteran_akhir_mastervalue", $viewControls->showDBValue("meteran_akhir", $data, $keylink));

//	volume - Number
			$xt->assign("volume_mastervalue", $viewControls->showDBValue("volume", $data, $keylink));

//	satuan - 
			$xt->assign("satuan_mastervalue", $viewControls->showDBValue("satuan", $data, $keylink));

//	r_panjang - Number
			$xt->assign("r_panjang_mastervalue", $viewControls->showDBValue("r_panjang", $data, $keylink));

//	r_lebar - Number
			$xt->assign("r_lebar_mastervalue", $viewControls->showDBValue("r_lebar", $data, $keylink));

//	r_muka - Number
			$xt->assign("r_muka_mastervalue", $viewControls->showDBValue("r_muka", $data, $keylink));

//	r_banyak - Number
			$xt->assign("r_banyak_mastervalue", $viewControls->showDBValue("r_banyak", $data, $keylink));

//	r_luas - Number
			$xt->assign("r_luas_mastervalue", $viewControls->showDBValue("r_luas", $data, $keylink));

//	r_tarifid - 
			$xt->assign("r_tarifid_mastervalue", $viewControls->showDBValue("r_tarifid", $data, $keylink));

//	r_kontrak - Number
			$xt->assign("r_kontrak_mastervalue", $viewControls->showDBValue("r_kontrak", $data, $keylink));

//	r_lama - 
			$xt->assign("r_lama_mastervalue", $viewControls->showDBValue("r_lama", $data, $keylink));

//	r_jalan_id - 
			$xt->assign("r_jalan_id_mastervalue", $viewControls->showDBValue("r_jalan_id", $data, $keylink));

//	r_jalanklas_id - 
			$xt->assign("r_jalanklas_id_mastervalue", $viewControls->showDBValue("r_jalanklas_id", $data, $keylink));

//	r_lokasi - 
			$xt->assign("r_lokasi_mastervalue", $viewControls->showDBValue("r_lokasi", $data, $keylink));

//	r_judul - 
			$xt->assign("r_judul_mastervalue", $viewControls->showDBValue("r_judul", $data, $keylink));

//	r_kelurahan_id - 
			$xt->assign("r_kelurahan_id_mastervalue", $viewControls->showDBValue("r_kelurahan_id", $data, $keylink));

//	r_lokasi_id - 
			$xt->assign("r_lokasi_id_mastervalue", $viewControls->showDBValue("r_lokasi_id", $data, $keylink));

//	r_calculated - Number
			$xt->assign("r_calculated_mastervalue", $viewControls->showDBValue("r_calculated", $data, $keylink));

//	r_nsr - Number
			$xt->assign("r_nsr_mastervalue", $viewControls->showDBValue("r_nsr", $data, $keylink));

//	r_nsrno - 
			$xt->assign("r_nsrno_mastervalue", $viewControls->showDBValue("r_nsrno", $data, $keylink));

//	r_nsrtgl - Short Date
			$xt->assign("r_nsrtgl_mastervalue", $viewControls->showDBValue("r_nsrtgl", $data, $keylink));

//	r_nsl_kecamatan_id - 
			$xt->assign("r_nsl_kecamatan_id_mastervalue", $viewControls->showDBValue("r_nsl_kecamatan_id", $data, $keylink));

//	r_nsl_type_id - 
			$xt->assign("r_nsl_type_id_mastervalue", $viewControls->showDBValue("r_nsl_type_id", $data, $keylink));

//	r_nsl_nilai - Number
			$xt->assign("r_nsl_nilai_mastervalue", $viewControls->showDBValue("r_nsl_nilai", $data, $keylink));

//	notes - 
			$xt->assign("notes_mastervalue", $viewControls->showDBValue("notes", $data, $keylink));

//	unit_id - 
			$xt->assign("unit_id_mastervalue", $viewControls->showDBValue("unit_id", $data, $keylink));

//	enabled - 
			$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));

//	created - Short Date
			$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	create_uid - 
			$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	updated - Short Date
			$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	update_uid - 
			$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	terimanip - 
			$xt->assign("terimanip_mastervalue", $viewControls->showDBValue("terimanip", $data, $keylink));

//	terimatgl - Short Date
			$xt->assign("terimatgl_mastervalue", $viewControls->showDBValue("terimatgl", $data, $keylink));

//	kirimtgl - Short Date
			$xt->assign("kirimtgl_mastervalue", $viewControls->showDBValue("kirimtgl", $data, $keylink));

//	isprint_dc - 
			$xt->assign("isprint_dc_mastervalue", $viewControls->showDBValue("isprint_dc", $data, $keylink));

//	r_nsr_id - 
			$xt->assign("r_nsr_id_mastervalue", $viewControls->showDBValue("r_nsr_id", $data, $keylink));

//	r_lokasi_pasang_id - 
			$xt->assign("r_lokasi_pasang_id_mastervalue", $viewControls->showDBValue("r_lokasi_pasang_id", $data, $keylink));

//	r_lokasi_pasang_val - Number
			$xt->assign("r_lokasi_pasang_val_mastervalue", $viewControls->showDBValue("r_lokasi_pasang_val", $data, $keylink));

//	r_jalanklas_val - Number
			$xt->assign("r_jalanklas_val_mastervalue", $viewControls->showDBValue("r_jalanklas_val", $data, $keylink));

//	r_sudut_pandang_id - 
			$xt->assign("r_sudut_pandang_id_mastervalue", $viewControls->showDBValue("r_sudut_pandang_id", $data, $keylink));

//	r_sudut_pandang_val - Number
			$xt->assign("r_sudut_pandang_val_mastervalue", $viewControls->showDBValue("r_sudut_pandang_val", $data, $keylink));

//	r_tinggi - Number
			$xt->assign("r_tinggi_mastervalue", $viewControls->showDBValue("r_tinggi", $data, $keylink));

//	r_njop - Number
			$xt->assign("r_njop_mastervalue", $viewControls->showDBValue("r_njop", $data, $keylink));

//	r_status - 
			$xt->assign("r_status_mastervalue", $viewControls->showDBValue("r_status", $data, $keylink));

//	r_njop_ketinggian - Number
			$xt->assign("r_njop_ketinggian_mastervalue", $viewControls->showDBValue("r_njop_ketinggian", $data, $keylink));

//	status_pembayaran - 
			$xt->assign("status_pembayaran_mastervalue", $viewControls->showDBValue("status_pembayaran", $data, $keylink));

//	rek_no_paneng - 
			$xt->assign("rek_no_paneng_mastervalue", $viewControls->showDBValue("rek_no_paneng", $data, $keylink));

//	sptno_lengkap - 
			$xt->assign("sptno_lengkap_mastervalue", $viewControls->showDBValue("sptno_lengkap", $data, $keylink));

//	sptno_lama - 
			$xt->assign("sptno_lama_mastervalue", $viewControls->showDBValue("sptno_lama", $data, $keylink));

//	r_nama - 
			$xt->assign("r_nama_mastervalue", $viewControls->showDBValue("r_nama", $data, $keylink));

//	r_alamat - 
			$xt->assign("r_alamat_mastervalue", $viewControls->showDBValue("r_alamat", $data, $keylink));

//	omset1 - Number
			$xt->assign("omset1_mastervalue", $viewControls->showDBValue("omset1", $data, $keylink));

//	omset2 - Number
			$xt->assign("omset2_mastervalue", $viewControls->showDBValue("omset2", $data, $keylink));

//	omset3 - Number
			$xt->assign("omset3_mastervalue", $viewControls->showDBValue("omset3", $data, $keylink));

//	omset4 - Number
			$xt->assign("omset4_mastervalue", $viewControls->showDBValue("omset4", $data, $keylink));

//	omset5 - Number
			$xt->assign("omset5_mastervalue", $viewControls->showDBValue("omset5", $data, $keylink));

//	omset6 - Number
			$xt->assign("omset6_mastervalue", $viewControls->showDBValue("omset6", $data, $keylink));

//	omset7 - Number
			$xt->assign("omset7_mastervalue", $viewControls->showDBValue("omset7", $data, $keylink));

//	omset8 - Number
			$xt->assign("omset8_mastervalue", $viewControls->showDBValue("omset8", $data, $keylink));

//	omset9 - Number
			$xt->assign("omset9_mastervalue", $viewControls->showDBValue("omset9", $data, $keylink));

//	omset10 - Number
			$xt->assign("omset10_mastervalue", $viewControls->showDBValue("omset10", $data, $keylink));

//	omset11 - Number
			$xt->assign("omset11_mastervalue", $viewControls->showDBValue("omset11", $data, $keylink));

//	omset12 - Number
			$xt->assign("omset12_mastervalue", $viewControls->showDBValue("omset12", $data, $keylink));

//	omset13 - Number
			$xt->assign("omset13_mastervalue", $viewControls->showDBValue("omset13", $data, $keylink));

//	omset14 - Number
			$xt->assign("omset14_mastervalue", $viewControls->showDBValue("omset14", $data, $keylink));

//	omset15 - Number
			$xt->assign("omset15_mastervalue", $viewControls->showDBValue("omset15", $data, $keylink));

//	omset16 - Number
			$xt->assign("omset16_mastervalue", $viewControls->showDBValue("omset16", $data, $keylink));

//	omset17 - Number
			$xt->assign("omset17_mastervalue", $viewControls->showDBValue("omset17", $data, $keylink));

//	omset18 - Number
			$xt->assign("omset18_mastervalue", $viewControls->showDBValue("omset18", $data, $keylink));

//	omset19 - Number
			$xt->assign("omset19_mastervalue", $viewControls->showDBValue("omset19", $data, $keylink));

//	omset20 - Number
			$xt->assign("omset20_mastervalue", $viewControls->showDBValue("omset20", $data, $keylink));

//	omset21 - Number
			$xt->assign("omset21_mastervalue", $viewControls->showDBValue("omset21", $data, $keylink));

//	omset22 - Number
			$xt->assign("omset22_mastervalue", $viewControls->showDBValue("omset22", $data, $keylink));

//	omset23 - Number
			$xt->assign("omset23_mastervalue", $viewControls->showDBValue("omset23", $data, $keylink));

//	omset24 - Number
			$xt->assign("omset24_mastervalue", $viewControls->showDBValue("omset24", $data, $keylink));

//	omset25 - Number
			$xt->assign("omset25_mastervalue", $viewControls->showDBValue("omset25", $data, $keylink));

//	omset26 - Number
			$xt->assign("omset26_mastervalue", $viewControls->showDBValue("omset26", $data, $keylink));

//	omset27 - Number
			$xt->assign("omset27_mastervalue", $viewControls->showDBValue("omset27", $data, $keylink));

//	omset28 - Number
			$xt->assign("omset28_mastervalue", $viewControls->showDBValue("omset28", $data, $keylink));

//	omset29 - Number
			$xt->assign("omset29_mastervalue", $viewControls->showDBValue("omset29", $data, $keylink));

//	omset30 - Number
			$xt->assign("omset30_mastervalue", $viewControls->showDBValue("omset30", $data, $keylink));

//	omset31 - Number
			$xt->assign("omset31_mastervalue", $viewControls->showDBValue("omset31", $data, $keylink));

//	keterangan1 - 
			$xt->assign("keterangan1_mastervalue", $viewControls->showDBValue("keterangan1", $data, $keylink));

//	keterangan2 - 
			$xt->assign("keterangan2_mastervalue", $viewControls->showDBValue("keterangan2", $data, $keylink));

//	keterangan3 - 
			$xt->assign("keterangan3_mastervalue", $viewControls->showDBValue("keterangan3", $data, $keylink));

//	keterangan4 - 
			$xt->assign("keterangan4_mastervalue", $viewControls->showDBValue("keterangan4", $data, $keylink));

//	keterangan5 - 
			$xt->assign("keterangan5_mastervalue", $viewControls->showDBValue("keterangan5", $data, $keylink));

//	keterangan6 - 
			$xt->assign("keterangan6_mastervalue", $viewControls->showDBValue("keterangan6", $data, $keylink));

//	keterangan7 - 
			$xt->assign("keterangan7_mastervalue", $viewControls->showDBValue("keterangan7", $data, $keylink));

//	keterangan8 - 
			$xt->assign("keterangan8_mastervalue", $viewControls->showDBValue("keterangan8", $data, $keylink));

//	keterangan9 - 
			$xt->assign("keterangan9_mastervalue", $viewControls->showDBValue("keterangan9", $data, $keylink));

//	keterangan10 - 
			$xt->assign("keterangan10_mastervalue", $viewControls->showDBValue("keterangan10", $data, $keylink));

//	keterangan11 - 
			$xt->assign("keterangan11_mastervalue", $viewControls->showDBValue("keterangan11", $data, $keylink));

//	keterangan12 - 
			$xt->assign("keterangan12_mastervalue", $viewControls->showDBValue("keterangan12", $data, $keylink));

//	keterangan13 - 
			$xt->assign("keterangan13_mastervalue", $viewControls->showDBValue("keterangan13", $data, $keylink));

//	keterangan14 - 
			$xt->assign("keterangan14_mastervalue", $viewControls->showDBValue("keterangan14", $data, $keylink));

//	keterangan15 - 
			$xt->assign("keterangan15_mastervalue", $viewControls->showDBValue("keterangan15", $data, $keylink));

//	keterangan16 - 
			$xt->assign("keterangan16_mastervalue", $viewControls->showDBValue("keterangan16", $data, $keylink));

//	keterangan17 - 
			$xt->assign("keterangan17_mastervalue", $viewControls->showDBValue("keterangan17", $data, $keylink));

//	keterangan18 - 
			$xt->assign("keterangan18_mastervalue", $viewControls->showDBValue("keterangan18", $data, $keylink));

//	keterangan19 - 
			$xt->assign("keterangan19_mastervalue", $viewControls->showDBValue("keterangan19", $data, $keylink));

//	keterangan20 - 
			$xt->assign("keterangan20_mastervalue", $viewControls->showDBValue("keterangan20", $data, $keylink));

//	keterangan21 - 
			$xt->assign("keterangan21_mastervalue", $viewControls->showDBValue("keterangan21", $data, $keylink));

//	keterangan22 - 
			$xt->assign("keterangan22_mastervalue", $viewControls->showDBValue("keterangan22", $data, $keylink));

//	keterangan23 - 
			$xt->assign("keterangan23_mastervalue", $viewControls->showDBValue("keterangan23", $data, $keylink));

//	keterangan24 - 
			$xt->assign("keterangan24_mastervalue", $viewControls->showDBValue("keterangan24", $data, $keylink));

//	keterangan25 - 
			$xt->assign("keterangan25_mastervalue", $viewControls->showDBValue("keterangan25", $data, $keylink));

//	keterangan26 - 
			$xt->assign("keterangan26_mastervalue", $viewControls->showDBValue("keterangan26", $data, $keylink));

//	keterangan27 - 
			$xt->assign("keterangan27_mastervalue", $viewControls->showDBValue("keterangan27", $data, $keylink));

//	keterangan28 - 
			$xt->assign("keterangan28_mastervalue", $viewControls->showDBValue("keterangan28", $data, $keylink));

//	keterangan29 - 
			$xt->assign("keterangan29_mastervalue", $viewControls->showDBValue("keterangan29", $data, $keylink));

//	keterangan30 - 
			$xt->assign("keterangan30_mastervalue", $viewControls->showDBValue("keterangan30", $data, $keylink));

//	keterangan31 - 
			$xt->assign("keterangan31_mastervalue", $viewControls->showDBValue("keterangan31", $data, $keylink));

//	doc_no - 
			$xt->assign("doc_no_mastervalue", $viewControls->showDBValue("doc_no", $data, $keylink));

//	cara_bayar - 
			$xt->assign("cara_bayar_mastervalue", $viewControls->showDBValue("cara_bayar", $data, $keylink));

//	kelompok_usaha_id - 
			$xt->assign("kelompok_usaha_id_mastervalue", $viewControls->showDBValue("kelompok_usaha_id", $data, $keylink));

//	zona_id - 
			$xt->assign("zona_id_mastervalue", $viewControls->showDBValue("zona_id", $data, $keylink));

//	manfaat_id - 
			$xt->assign("manfaat_id_mastervalue", $viewControls->showDBValue("manfaat_id", $data, $keylink));

//	golongan - 
			$xt->assign("golongan_mastervalue", $viewControls->showDBValue("golongan", $data, $keylink));

//	omset_lain - Number
			$xt->assign("omset_lain_mastervalue", $viewControls->showDBValue("omset_lain", $data, $keylink));

//	keterangan_lain - 
			$xt->assign("keterangan_lain_mastervalue", $viewControls->showDBValue("keterangan_lain", $data, $keylink));

//	ijin_no - 
			$xt->assign("ijin_no_mastervalue", $viewControls->showDBValue("ijin_no", $data, $keylink));

//	jenis_masa - 
			$xt->assign("jenis_masa_mastervalue", $viewControls->showDBValue("jenis_masa", $data, $keylink));

//	skpd_lama - 
			$xt->assign("skpd_lama_mastervalue", $viewControls->showDBValue("skpd_lama", $data, $keylink));

//	proses - 
			$xt->assign("proses_mastervalue", $viewControls->showDBValue("proses", $data, $keylink));

//	tanggal_validasi - Short Date
			$xt->assign("tanggal_validasi_mastervalue", $viewControls->showDBValue("tanggal_validasi", $data, $keylink));

//	bulan - 
			$xt->assign("bulan_mastervalue", $viewControls->showDBValue("bulan", $data, $keylink));

//	no_telp - 
			$xt->assign("no_telp_mastervalue", $viewControls->showDBValue("no_telp", $data, $keylink));

//	usaha_id - 
			$xt->assign("usaha_id_mastervalue", $viewControls->showDBValue("usaha_id", $data, $keylink));

//	multiple - 
			$xt->assign("multiple_mastervalue", $viewControls->showDBValue("multiple", $data, $keylink));

//	bulan_telat - 
			$xt->assign("bulan_telat_mastervalue", $viewControls->showDBValue("bulan_telat", $data, $keylink));
	$xt->display("pad_pad_spt_masterprint.htm");
	$strTableName=$oldTableName;

}

?>