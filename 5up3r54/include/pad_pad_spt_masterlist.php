<?php
include_once(getabspath("include/pad_pad_spt_settings.php"));

function DisplayMasterTableInfo_pad_pad_spt($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	$detailPageObj = $params["detailPageObj"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "pad.pad_spt";
	
	$settings = new ProjectSettings($strTableName, PAGE_LIST);
	$cipherer = new RunnerCipherer($strTableName);
	
	$masterQuery = $settings->getSQLQuery();
	
	$viewControls = new ViewControlsContainer($settings, PAGE_LIST);

$where = "";
$mKeys = array();
$showKeys = "";

global $page_styles, $page_layouts, $page_layout_names, $container_styles;

$layout = new TLayout("masterlist","RoundedGreen","MobileGreen");
$layout->blocks["bare"] = array();
$layout->containers["0"] = array();

$layout->containers["0"][] = array("name"=>"masterlistheader","block"=>"","substyle"=>1);


$layout->skins["0"] = "empty";
$layout->blocks["bare"][] = "0";
$layout->containers["mastergrid"] = array();

$layout->containers["mastergrid"][] = array("name"=>"masterlistfields","block"=>"","substyle"=>1);


$layout->skins["mastergrid"] = "grid";
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_spt_masterlist"] = $layout;


if($detailtable == "pad.pad_air_tanah_hit")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable == "pad.pad_stpd")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
	if(!$where)
	{
		$strTableName = $oldTableName;
		return;
	}
	$str = SecuritySQL("Search");
	if(strlen($str))
		$where.= " and ".$str;

	$strWhere = whereAdd($masterQuery->WhereToSql(),$where);
	if(strlen($strWhere))
		$strWhere = " where ".$strWhere." ";
	$strSQL = $masterQuery->HeadToSql().' '.$masterQuery->FromToSql().$strWhere.$masterQuery->TailToSql();

//	$strSQL = AddWhere($strSQL,$where);
	LogInfo($strSQL);
	$rs = db_query($strSQL,$conn);
	$data = $cipherer->DecryptFetchedArray($rs);
	if(!$data)
	{
		$strTableName = $oldTableName;
		return;
	}
	$keylink = "";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));
	

//	id - 
			$value="";

					$xt->assign("id_mastervalue", $viewControls->showDBValue("id", $data, $keylink));

//	tahun - 
			$value="";

					$xt->assign("tahun_mastervalue", $viewControls->showDBValue("tahun", $data, $keylink));

//	sptno - 
			$value="";

					$xt->assign("sptno_mastervalue", $viewControls->showDBValue("sptno", $data, $keylink));

//	customer_id - 
			$value="";

					$xt->assign("customer_id_mastervalue", $viewControls->showDBValue("customer_id", $data, $keylink));

//	customer_usaha_id - 
			$value="";

					$xt->assign("customer_usaha_id_mastervalue", $viewControls->showDBValue("customer_usaha_id", $data, $keylink));

//	rekening_id - 
			$value="";

					$xt->assign("rekening_id_mastervalue", $viewControls->showDBValue("rekening_id", $data, $keylink));

//	pajak_id - 
			$value="";

					$xt->assign("pajak_id_mastervalue", $viewControls->showDBValue("pajak_id", $data, $keylink));

//	type_id - 
			$value="";

					$xt->assign("type_id_mastervalue", $viewControls->showDBValue("type_id", $data, $keylink));

//	so - 
			$value="";

					$xt->assign("so_mastervalue", $viewControls->showDBValue("so", $data, $keylink));

//	masadari - Short Date
			$value="";

					$xt->assign("masadari_mastervalue", $viewControls->showDBValue("masadari", $data, $keylink));

//	masasd - Short Date
			$value="";

					$xt->assign("masasd_mastervalue", $viewControls->showDBValue("masasd", $data, $keylink));

//	jatuhtempotgl - Short Date
			$value="";

					$xt->assign("jatuhtempotgl_mastervalue", $viewControls->showDBValue("jatuhtempotgl", $data, $keylink));

//	r_bayarid - 
			$value="";

					$xt->assign("r_bayarid_mastervalue", $viewControls->showDBValue("r_bayarid", $data, $keylink));

//	minimal_omset - Number
			$value="";

					$xt->assign("minimal_omset_mastervalue", $viewControls->showDBValue("minimal_omset", $data, $keylink));

//	dasar - Number
			$value="";

					$xt->assign("dasar_mastervalue", $viewControls->showDBValue("dasar", $data, $keylink));

//	tarif - Number
			$value="";

					$xt->assign("tarif_mastervalue", $viewControls->showDBValue("tarif", $data, $keylink));

//	denda - Number
			$value="";

					$xt->assign("denda_mastervalue", $viewControls->showDBValue("denda", $data, $keylink));

//	bunga - Number
			$value="";

					$xt->assign("bunga_mastervalue", $viewControls->showDBValue("bunga", $data, $keylink));

//	setoran - Number
			$value="";

					$xt->assign("setoran_mastervalue", $viewControls->showDBValue("setoran", $data, $keylink));

//	kenaikan - Number
			$value="";

					$xt->assign("kenaikan_mastervalue", $viewControls->showDBValue("kenaikan", $data, $keylink));

//	kompensasi - Number
			$value="";

					$xt->assign("kompensasi_mastervalue", $viewControls->showDBValue("kompensasi", $data, $keylink));

//	lain2 - Number
			$value="";

					$xt->assign("lain2_mastervalue", $viewControls->showDBValue("lain2", $data, $keylink));

//	pajak_terhutang - 
			$value="";

					$xt->assign("pajak_terhutang_mastervalue", $viewControls->showDBValue("pajak_terhutang", $data, $keylink));

//	air_manfaat_id - 
			$value="";

					$xt->assign("air_manfaat_id_mastervalue", $viewControls->showDBValue("air_manfaat_id", $data, $keylink));

//	air_zona_id - 
			$value="";

					$xt->assign("air_zona_id_mastervalue", $viewControls->showDBValue("air_zona_id", $data, $keylink));

//	meteran_awal - 
			$value="";

					$xt->assign("meteran_awal_mastervalue", $viewControls->showDBValue("meteran_awal", $data, $keylink));

//	meteran_akhir - 
			$value="";

					$xt->assign("meteran_akhir_mastervalue", $viewControls->showDBValue("meteran_akhir", $data, $keylink));

//	volume - Number
			$value="";

					$xt->assign("volume_mastervalue", $viewControls->showDBValue("volume", $data, $keylink));

//	satuan - 
			$value="";

					$xt->assign("satuan_mastervalue", $viewControls->showDBValue("satuan", $data, $keylink));

//	r_panjang - Number
			$value="";

					$xt->assign("r_panjang_mastervalue", $viewControls->showDBValue("r_panjang", $data, $keylink));

//	r_lebar - Number
			$value="";

					$xt->assign("r_lebar_mastervalue", $viewControls->showDBValue("r_lebar", $data, $keylink));

//	r_muka - Number
			$value="";

					$xt->assign("r_muka_mastervalue", $viewControls->showDBValue("r_muka", $data, $keylink));

//	r_banyak - Number
			$value="";

					$xt->assign("r_banyak_mastervalue", $viewControls->showDBValue("r_banyak", $data, $keylink));

//	r_luas - Number
			$value="";

					$xt->assign("r_luas_mastervalue", $viewControls->showDBValue("r_luas", $data, $keylink));

//	r_tarifid - 
			$value="";

					$xt->assign("r_tarifid_mastervalue", $viewControls->showDBValue("r_tarifid", $data, $keylink));

//	r_kontrak - Number
			$value="";

					$xt->assign("r_kontrak_mastervalue", $viewControls->showDBValue("r_kontrak", $data, $keylink));

//	r_lama - 
			$value="";

					$xt->assign("r_lama_mastervalue", $viewControls->showDBValue("r_lama", $data, $keylink));

//	r_jalan_id - 
			$value="";

					$xt->assign("r_jalan_id_mastervalue", $viewControls->showDBValue("r_jalan_id", $data, $keylink));

//	r_jalanklas_id - 
			$value="";

					$xt->assign("r_jalanklas_id_mastervalue", $viewControls->showDBValue("r_jalanklas_id", $data, $keylink));

//	r_lokasi - 
			$value="";

					$xt->assign("r_lokasi_mastervalue", $viewControls->showDBValue("r_lokasi", $data, $keylink));

//	r_judul - 
			$value="";

					$xt->assign("r_judul_mastervalue", $viewControls->showDBValue("r_judul", $data, $keylink));

//	r_kelurahan_id - 
			$value="";

					$xt->assign("r_kelurahan_id_mastervalue", $viewControls->showDBValue("r_kelurahan_id", $data, $keylink));

//	r_lokasi_id - 
			$value="";

					$xt->assign("r_lokasi_id_mastervalue", $viewControls->showDBValue("r_lokasi_id", $data, $keylink));

//	r_calculated - Number
			$value="";

					$xt->assign("r_calculated_mastervalue", $viewControls->showDBValue("r_calculated", $data, $keylink));

//	r_nsr - Number
			$value="";

					$xt->assign("r_nsr_mastervalue", $viewControls->showDBValue("r_nsr", $data, $keylink));

//	r_nsrno - 
			$value="";

					$xt->assign("r_nsrno_mastervalue", $viewControls->showDBValue("r_nsrno", $data, $keylink));

//	r_nsrtgl - Short Date
			$value="";

					$xt->assign("r_nsrtgl_mastervalue", $viewControls->showDBValue("r_nsrtgl", $data, $keylink));

//	r_nsl_kecamatan_id - 
			$value="";

					$xt->assign("r_nsl_kecamatan_id_mastervalue", $viewControls->showDBValue("r_nsl_kecamatan_id", $data, $keylink));

//	r_nsl_type_id - 
			$value="";

					$xt->assign("r_nsl_type_id_mastervalue", $viewControls->showDBValue("r_nsl_type_id", $data, $keylink));

//	r_nsl_nilai - Number
			$value="";

					$xt->assign("r_nsl_nilai_mastervalue", $viewControls->showDBValue("r_nsl_nilai", $data, $keylink));

//	notes - 
			$value="";

					$xt->assign("notes_mastervalue", $viewControls->showDBValue("notes", $data, $keylink));

//	unit_id - 
			$value="";

					$xt->assign("unit_id_mastervalue", $viewControls->showDBValue("unit_id", $data, $keylink));

//	enabled - 
			$value="";

					$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));

//	created - Short Date
			$value="";

					$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	create_uid - 
			$value="";

					$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	updated - Short Date
			$value="";

					$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	update_uid - 
			$value="";

					$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	terimanip - 
			$value="";

					$xt->assign("terimanip_mastervalue", $viewControls->showDBValue("terimanip", $data, $keylink));

//	terimatgl - Short Date
			$value="";

					$xt->assign("terimatgl_mastervalue", $viewControls->showDBValue("terimatgl", $data, $keylink));

//	kirimtgl - Short Date
			$value="";

					$xt->assign("kirimtgl_mastervalue", $viewControls->showDBValue("kirimtgl", $data, $keylink));

//	isprint_dc - 
			$value="";

					$xt->assign("isprint_dc_mastervalue", $viewControls->showDBValue("isprint_dc", $data, $keylink));

//	r_nsr_id - 
			$value="";

					$xt->assign("r_nsr_id_mastervalue", $viewControls->showDBValue("r_nsr_id", $data, $keylink));

//	r_lokasi_pasang_id - 
			$value="";

					$xt->assign("r_lokasi_pasang_id_mastervalue", $viewControls->showDBValue("r_lokasi_pasang_id", $data, $keylink));

//	r_lokasi_pasang_val - Number
			$value="";

					$xt->assign("r_lokasi_pasang_val_mastervalue", $viewControls->showDBValue("r_lokasi_pasang_val", $data, $keylink));

//	r_jalanklas_val - Number
			$value="";

					$xt->assign("r_jalanklas_val_mastervalue", $viewControls->showDBValue("r_jalanklas_val", $data, $keylink));

//	r_sudut_pandang_id - 
			$value="";

					$xt->assign("r_sudut_pandang_id_mastervalue", $viewControls->showDBValue("r_sudut_pandang_id", $data, $keylink));

//	r_sudut_pandang_val - Number
			$value="";

					$xt->assign("r_sudut_pandang_val_mastervalue", $viewControls->showDBValue("r_sudut_pandang_val", $data, $keylink));

//	r_tinggi - Number
			$value="";

					$xt->assign("r_tinggi_mastervalue", $viewControls->showDBValue("r_tinggi", $data, $keylink));

//	r_njop - Number
			$value="";

					$xt->assign("r_njop_mastervalue", $viewControls->showDBValue("r_njop", $data, $keylink));

//	r_status - 
			$value="";

					$xt->assign("r_status_mastervalue", $viewControls->showDBValue("r_status", $data, $keylink));

//	r_njop_ketinggian - Number
			$value="";

					$xt->assign("r_njop_ketinggian_mastervalue", $viewControls->showDBValue("r_njop_ketinggian", $data, $keylink));

//	status_pembayaran - 
			$value="";

					$xt->assign("status_pembayaran_mastervalue", $viewControls->showDBValue("status_pembayaran", $data, $keylink));

//	rek_no_paneng - 
			$value="";

					$xt->assign("rek_no_paneng_mastervalue", $viewControls->showDBValue("rek_no_paneng", $data, $keylink));

//	sptno_lengkap - 
			$value="";

					$xt->assign("sptno_lengkap_mastervalue", $viewControls->showDBValue("sptno_lengkap", $data, $keylink));

//	sptno_lama - 
			$value="";

					$xt->assign("sptno_lama_mastervalue", $viewControls->showDBValue("sptno_lama", $data, $keylink));

//	r_nama - 
			$value="";

					$xt->assign("r_nama_mastervalue", $viewControls->showDBValue("r_nama", $data, $keylink));

//	r_alamat - 
			$value="";

					$xt->assign("r_alamat_mastervalue", $viewControls->showDBValue("r_alamat", $data, $keylink));

//	omset1 - Number
			$value="";

					$xt->assign("omset1_mastervalue", $viewControls->showDBValue("omset1", $data, $keylink));

//	omset2 - Number
			$value="";

					$xt->assign("omset2_mastervalue", $viewControls->showDBValue("omset2", $data, $keylink));

//	omset3 - Number
			$value="";

					$xt->assign("omset3_mastervalue", $viewControls->showDBValue("omset3", $data, $keylink));

//	omset4 - Number
			$value="";

					$xt->assign("omset4_mastervalue", $viewControls->showDBValue("omset4", $data, $keylink));

//	omset5 - Number
			$value="";

					$xt->assign("omset5_mastervalue", $viewControls->showDBValue("omset5", $data, $keylink));

//	omset6 - Number
			$value="";

					$xt->assign("omset6_mastervalue", $viewControls->showDBValue("omset6", $data, $keylink));

//	omset7 - Number
			$value="";

					$xt->assign("omset7_mastervalue", $viewControls->showDBValue("omset7", $data, $keylink));

//	omset8 - Number
			$value="";

					$xt->assign("omset8_mastervalue", $viewControls->showDBValue("omset8", $data, $keylink));

//	omset9 - Number
			$value="";

					$xt->assign("omset9_mastervalue", $viewControls->showDBValue("omset9", $data, $keylink));

//	omset10 - Number
			$value="";

					$xt->assign("omset10_mastervalue", $viewControls->showDBValue("omset10", $data, $keylink));

//	omset11 - Number
			$value="";

					$xt->assign("omset11_mastervalue", $viewControls->showDBValue("omset11", $data, $keylink));

//	omset12 - Number
			$value="";

					$xt->assign("omset12_mastervalue", $viewControls->showDBValue("omset12", $data, $keylink));

//	omset13 - Number
			$value="";

					$xt->assign("omset13_mastervalue", $viewControls->showDBValue("omset13", $data, $keylink));

//	omset14 - Number
			$value="";

					$xt->assign("omset14_mastervalue", $viewControls->showDBValue("omset14", $data, $keylink));

//	omset15 - Number
			$value="";

					$xt->assign("omset15_mastervalue", $viewControls->showDBValue("omset15", $data, $keylink));

//	omset16 - Number
			$value="";

					$xt->assign("omset16_mastervalue", $viewControls->showDBValue("omset16", $data, $keylink));

//	omset17 - Number
			$value="";

					$xt->assign("omset17_mastervalue", $viewControls->showDBValue("omset17", $data, $keylink));

//	omset18 - Number
			$value="";

					$xt->assign("omset18_mastervalue", $viewControls->showDBValue("omset18", $data, $keylink));

//	omset19 - Number
			$value="";

					$xt->assign("omset19_mastervalue", $viewControls->showDBValue("omset19", $data, $keylink));

//	omset20 - Number
			$value="";

					$xt->assign("omset20_mastervalue", $viewControls->showDBValue("omset20", $data, $keylink));

//	omset21 - Number
			$value="";

					$xt->assign("omset21_mastervalue", $viewControls->showDBValue("omset21", $data, $keylink));

//	omset22 - Number
			$value="";

					$xt->assign("omset22_mastervalue", $viewControls->showDBValue("omset22", $data, $keylink));

//	omset23 - Number
			$value="";

					$xt->assign("omset23_mastervalue", $viewControls->showDBValue("omset23", $data, $keylink));

//	omset24 - Number
			$value="";

					$xt->assign("omset24_mastervalue", $viewControls->showDBValue("omset24", $data, $keylink));

//	omset25 - Number
			$value="";

					$xt->assign("omset25_mastervalue", $viewControls->showDBValue("omset25", $data, $keylink));

//	omset26 - Number
			$value="";

					$xt->assign("omset26_mastervalue", $viewControls->showDBValue("omset26", $data, $keylink));

//	omset27 - Number
			$value="";

					$xt->assign("omset27_mastervalue", $viewControls->showDBValue("omset27", $data, $keylink));

//	omset28 - Number
			$value="";

					$xt->assign("omset28_mastervalue", $viewControls->showDBValue("omset28", $data, $keylink));

//	omset29 - Number
			$value="";

					$xt->assign("omset29_mastervalue", $viewControls->showDBValue("omset29", $data, $keylink));

//	omset30 - Number
			$value="";

					$xt->assign("omset30_mastervalue", $viewControls->showDBValue("omset30", $data, $keylink));

//	omset31 - Number
			$value="";

					$xt->assign("omset31_mastervalue", $viewControls->showDBValue("omset31", $data, $keylink));

//	keterangan1 - 
			$value="";

					$xt->assign("keterangan1_mastervalue", $viewControls->showDBValue("keterangan1", $data, $keylink));

//	keterangan2 - 
			$value="";

					$xt->assign("keterangan2_mastervalue", $viewControls->showDBValue("keterangan2", $data, $keylink));

//	keterangan3 - 
			$value="";

					$xt->assign("keterangan3_mastervalue", $viewControls->showDBValue("keterangan3", $data, $keylink));

//	keterangan4 - 
			$value="";

					$xt->assign("keterangan4_mastervalue", $viewControls->showDBValue("keterangan4", $data, $keylink));

//	keterangan5 - 
			$value="";

					$xt->assign("keterangan5_mastervalue", $viewControls->showDBValue("keterangan5", $data, $keylink));

//	keterangan6 - 
			$value="";

					$xt->assign("keterangan6_mastervalue", $viewControls->showDBValue("keterangan6", $data, $keylink));

//	keterangan7 - 
			$value="";

					$xt->assign("keterangan7_mastervalue", $viewControls->showDBValue("keterangan7", $data, $keylink));

//	keterangan8 - 
			$value="";

					$xt->assign("keterangan8_mastervalue", $viewControls->showDBValue("keterangan8", $data, $keylink));

//	keterangan9 - 
			$value="";

					$xt->assign("keterangan9_mastervalue", $viewControls->showDBValue("keterangan9", $data, $keylink));

//	keterangan10 - 
			$value="";

					$xt->assign("keterangan10_mastervalue", $viewControls->showDBValue("keterangan10", $data, $keylink));

//	keterangan11 - 
			$value="";

					$xt->assign("keterangan11_mastervalue", $viewControls->showDBValue("keterangan11", $data, $keylink));

//	keterangan12 - 
			$value="";

					$xt->assign("keterangan12_mastervalue", $viewControls->showDBValue("keterangan12", $data, $keylink));

//	keterangan13 - 
			$value="";

					$xt->assign("keterangan13_mastervalue", $viewControls->showDBValue("keterangan13", $data, $keylink));

//	keterangan14 - 
			$value="";

					$xt->assign("keterangan14_mastervalue", $viewControls->showDBValue("keterangan14", $data, $keylink));

//	keterangan15 - 
			$value="";

					$xt->assign("keterangan15_mastervalue", $viewControls->showDBValue("keterangan15", $data, $keylink));

//	keterangan16 - 
			$value="";

					$xt->assign("keterangan16_mastervalue", $viewControls->showDBValue("keterangan16", $data, $keylink));

//	keterangan17 - 
			$value="";

					$xt->assign("keterangan17_mastervalue", $viewControls->showDBValue("keterangan17", $data, $keylink));

//	keterangan18 - 
			$value="";

					$xt->assign("keterangan18_mastervalue", $viewControls->showDBValue("keterangan18", $data, $keylink));

//	keterangan19 - 
			$value="";

					$xt->assign("keterangan19_mastervalue", $viewControls->showDBValue("keterangan19", $data, $keylink));

//	keterangan20 - 
			$value="";

					$xt->assign("keterangan20_mastervalue", $viewControls->showDBValue("keterangan20", $data, $keylink));

//	keterangan21 - 
			$value="";

					$xt->assign("keterangan21_mastervalue", $viewControls->showDBValue("keterangan21", $data, $keylink));

//	keterangan22 - 
			$value="";

					$xt->assign("keterangan22_mastervalue", $viewControls->showDBValue("keterangan22", $data, $keylink));

//	keterangan23 - 
			$value="";

					$xt->assign("keterangan23_mastervalue", $viewControls->showDBValue("keterangan23", $data, $keylink));

//	keterangan24 - 
			$value="";

					$xt->assign("keterangan24_mastervalue", $viewControls->showDBValue("keterangan24", $data, $keylink));

//	keterangan25 - 
			$value="";

					$xt->assign("keterangan25_mastervalue", $viewControls->showDBValue("keterangan25", $data, $keylink));

//	keterangan26 - 
			$value="";

					$xt->assign("keterangan26_mastervalue", $viewControls->showDBValue("keterangan26", $data, $keylink));

//	keterangan27 - 
			$value="";

					$xt->assign("keterangan27_mastervalue", $viewControls->showDBValue("keterangan27", $data, $keylink));

//	keterangan28 - 
			$value="";

					$xt->assign("keterangan28_mastervalue", $viewControls->showDBValue("keterangan28", $data, $keylink));

//	keterangan29 - 
			$value="";

					$xt->assign("keterangan29_mastervalue", $viewControls->showDBValue("keterangan29", $data, $keylink));

//	keterangan30 - 
			$value="";

					$xt->assign("keterangan30_mastervalue", $viewControls->showDBValue("keterangan30", $data, $keylink));

//	keterangan31 - 
			$value="";

					$xt->assign("keterangan31_mastervalue", $viewControls->showDBValue("keterangan31", $data, $keylink));

//	doc_no - 
			$value="";

					$xt->assign("doc_no_mastervalue", $viewControls->showDBValue("doc_no", $data, $keylink));

//	cara_bayar - 
			$value="";

					$xt->assign("cara_bayar_mastervalue", $viewControls->showDBValue("cara_bayar", $data, $keylink));

//	kelompok_usaha_id - 
			$value="";

					$xt->assign("kelompok_usaha_id_mastervalue", $viewControls->showDBValue("kelompok_usaha_id", $data, $keylink));

//	zona_id - 
			$value="";

					$xt->assign("zona_id_mastervalue", $viewControls->showDBValue("zona_id", $data, $keylink));

//	manfaat_id - 
			$value="";

					$xt->assign("manfaat_id_mastervalue", $viewControls->showDBValue("manfaat_id", $data, $keylink));

//	golongan - 
			$value="";

					$xt->assign("golongan_mastervalue", $viewControls->showDBValue("golongan", $data, $keylink));

//	omset_lain - Number
			$value="";

					$xt->assign("omset_lain_mastervalue", $viewControls->showDBValue("omset_lain", $data, $keylink));

//	keterangan_lain - 
			$value="";

					$xt->assign("keterangan_lain_mastervalue", $viewControls->showDBValue("keterangan_lain", $data, $keylink));

//	ijin_no - 
			$value="";

					$xt->assign("ijin_no_mastervalue", $viewControls->showDBValue("ijin_no", $data, $keylink));

//	jenis_masa - 
			$value="";

					$xt->assign("jenis_masa_mastervalue", $viewControls->showDBValue("jenis_masa", $data, $keylink));

//	skpd_lama - 
			$value="";

					$xt->assign("skpd_lama_mastervalue", $viewControls->showDBValue("skpd_lama", $data, $keylink));

//	proses - 
			$value="";

					$xt->assign("proses_mastervalue", $viewControls->showDBValue("proses", $data, $keylink));

//	tanggal_validasi - Short Date
			$value="";

					$xt->assign("tanggal_validasi_mastervalue", $viewControls->showDBValue("tanggal_validasi", $data, $keylink));

//	bulan - 
			$value="";

					$xt->assign("bulan_mastervalue", $viewControls->showDBValue("bulan", $data, $keylink));

//	no_telp - 
			$value="";

					$xt->assign("no_telp_mastervalue", $viewControls->showDBValue("no_telp", $data, $keylink));

//	usaha_id - 
			$value="";

					$xt->assign("usaha_id_mastervalue", $viewControls->showDBValue("usaha_id", $data, $keylink));

//	multiple - 
			$value="";

					$xt->assign("multiple_mastervalue", $viewControls->showDBValue("multiple", $data, $keylink));

//	bulan_telat - 
			$value="";

					$xt->assign("bulan_telat_mastervalue", $viewControls->showDBValue("bulan_telat", $data, $keylink));

	$viewControls->addControlsJSAndCSS();
	$detailPageObj->viewControlsMap['mViewControlsMap'] = $viewControls->viewControlsMap;

	$layout = GetPageLayout("pad_pad_spt", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("pad_pad_spt_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>