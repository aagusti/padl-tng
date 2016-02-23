<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/pad_pad_spt_variables.php");

$mode = postvalue("mode");

if(!isLogged())
{ 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{
	return;
}

$cipherer = new RunnerCipherer($strTableName);


include('include/xtempl.php');
$xt = new Xtempl();

$layout = new TLayout("detailspreview","RoundedGreen","MobileGreen");
$layout->blocks["bare"] = array();
$layout->containers["dcount"] = array();

$layout->containers["dcount"][] = array("name"=>"detailspreviewheader","block"=>"","substyle"=>1);


$layout->containers["dcount"][] = array("name"=>"detailspreviewdetailsfount","block"=>"","substyle"=>1);


$layout->containers["dcount"][] = array("name"=>"detailspreviewdispfirst","block"=>"display_first","substyle"=>1);


$layout->skins["dcount"] = "empty";
$layout->blocks["bare"][] = "dcount";
$layout->containers["detailspreviewgrid"] = array();

$layout->containers["detailspreviewgrid"][] = array("name"=>"detailspreviewfields","block"=>"details_data","substyle"=>1);


$layout->skins["detailspreviewgrid"] = "grid";
$layout->blocks["bare"][] = "detailspreviewgrid";$page_layouts["pad_pad_spt_detailspreview"] = $layout;


$recordsCounter = 0;

//	process masterkey value
$mastertable = postvalue("mastertable");
$masterKeys = my_json_decode(postvalue("masterKeys"));
if($mastertable != "")
{
	$_SESSION[$strTableName."_mastertable"]=$mastertable;
//	copy keys to session
	$i = 1;
	if(is_array($masterKeys) && count($masterKeys) > 0)
	{
		while(array_key_exists ("masterkey".$i, $masterKeys))
		{
			$_SESSION[$strTableName."_masterkey".$i] = $masterKeys["masterkey".$i];
			$i++;
		}
	}
	if(isset($_SESSION[$strTableName."_masterkey".$i]))
		unset($_SESSION[$strTableName."_masterkey".$i]);
}
else
	$mastertable = $_SESSION[$strTableName."_mastertable"];

//$strSQL = $gstrSQL;

if($mastertable == "pad.pad_customer_usaha")
{
	$where = "";
		$where .= GetFullFieldName("customer_usaha_id", $strTableName, false)."=".make_db_value("customer_usaha_id",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "pad.pad_customer")
{
	$where = "";
		$where .= GetFullFieldName("customer_id", $strTableName, false)."=".make_db_value("customer_id",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "pad.pad_jenis_pajak")
{
	$where = "";
		$where .= GetFullFieldName("pajak_id", $strTableName, false)."=".make_db_value("pajak_id",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "pad.pad_rekening")
{
	$where = "";
		$where .= GetFullFieldName("rekening_id", $strTableName, false)."=".make_db_value("rekening_id",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "pad.pad_spt_type")
{
	$where = "";
		$where .= GetFullFieldName("type_id", $strTableName, false)."=".make_db_value("type_id",$_SESSION[$strTableName."_masterkey1"]);
}

$str = SecuritySQL("Search");
if(strlen($str))
	$where.=" and ".$str;
$strSQL = $gQuery->gSQLWhere($where);

$strSQL.=" ".$gstrOrderBy;

$rowcount = $gQuery->gSQLRowCount($where);

$xt->assign("row_count",$rowcount);
if($rowcount) {
	$xt->assign("details_data",true);
	$rs = db_query($strSQL,$conn);

	$display_count = 10;
	if($mode == "inline")
		$display_count*=2;
	if($rowcount>$display_count+2)
	{
		$xt->assign("display_first",true);
		$xt->assign("display_count",$display_count);
	}
	else
		$display_count = $rowcount;

	$rowinfo = array();
	
	$data = $cipherer->DecryptFetchedArray($rs);
	require_once getabspath('classes/controls/ViewControlsContainer.php');
	$pSet = new ProjectSettings($strTableName, PAGE_LIST);
	$viewContainer = new ViewControlsContainer($pSet, PAGE_LIST);
	while($data && $recordsCounter<$display_count) {
		$recordsCounter++;
		$row = array();
		$keylink = "";
		$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

	
	//	id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("id", $data, $keylink);
			$row["id_value"] = $value;
	//	tahun - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("tahun", $data, $keylink);
			$row["tahun_value"] = $value;
	//	sptno - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("sptno", $data, $keylink);
			$row["sptno_value"] = $value;
	//	customer_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("customer_id", $data, $keylink);
			$row["customer_id_value"] = $value;
	//	customer_usaha_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("customer_usaha_id", $data, $keylink);
			$row["customer_usaha_id_value"] = $value;
	//	rekening_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("rekening_id", $data, $keylink);
			$row["rekening_id_value"] = $value;
	//	pajak_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pajak_id", $data, $keylink);
			$row["pajak_id_value"] = $value;
	//	type_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("type_id", $data, $keylink);
			$row["type_id_value"] = $value;
	//	so - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("so", $data, $keylink);
			$row["so_value"] = $value;
	//	masadari - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("masadari", $data, $keylink);
			$row["masadari_value"] = $value;
	//	masasd - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("masasd", $data, $keylink);
			$row["masasd_value"] = $value;
	//	jatuhtempotgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("jatuhtempotgl", $data, $keylink);
			$row["jatuhtempotgl_value"] = $value;
	//	r_bayarid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_bayarid", $data, $keylink);
			$row["r_bayarid_value"] = $value;
	//	minimal_omset - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("minimal_omset", $data, $keylink);
			$row["minimal_omset_value"] = $value;
	//	dasar - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("dasar", $data, $keylink);
			$row["dasar_value"] = $value;
	//	tarif - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("tarif", $data, $keylink);
			$row["tarif_value"] = $value;
	//	denda - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("denda", $data, $keylink);
			$row["denda_value"] = $value;
	//	bunga - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bunga", $data, $keylink);
			$row["bunga_value"] = $value;
	//	setoran - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("setoran", $data, $keylink);
			$row["setoran_value"] = $value;
	//	kenaikan - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kenaikan", $data, $keylink);
			$row["kenaikan_value"] = $value;
	//	kompensasi - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kompensasi", $data, $keylink);
			$row["kompensasi_value"] = $value;
	//	lain2 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("lain2", $data, $keylink);
			$row["lain2_value"] = $value;
	//	pajak_terhutang - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pajak_terhutang", $data, $keylink);
			$row["pajak_terhutang_value"] = $value;
	//	air_manfaat_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("air_manfaat_id", $data, $keylink);
			$row["air_manfaat_id_value"] = $value;
	//	air_zona_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("air_zona_id", $data, $keylink);
			$row["air_zona_id_value"] = $value;
	//	meteran_awal - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("meteran_awal", $data, $keylink);
			$row["meteran_awal_value"] = $value;
	//	meteran_akhir - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("meteran_akhir", $data, $keylink);
			$row["meteran_akhir_value"] = $value;
	//	volume - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("volume", $data, $keylink);
			$row["volume_value"] = $value;
	//	satuan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("satuan", $data, $keylink);
			$row["satuan_value"] = $value;
	//	r_panjang - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_panjang", $data, $keylink);
			$row["r_panjang_value"] = $value;
	//	r_lebar - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_lebar", $data, $keylink);
			$row["r_lebar_value"] = $value;
	//	r_muka - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_muka", $data, $keylink);
			$row["r_muka_value"] = $value;
	//	r_banyak - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_banyak", $data, $keylink);
			$row["r_banyak_value"] = $value;
	//	r_luas - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_luas", $data, $keylink);
			$row["r_luas_value"] = $value;
	//	r_tarifid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_tarifid", $data, $keylink);
			$row["r_tarifid_value"] = $value;
	//	r_kontrak - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_kontrak", $data, $keylink);
			$row["r_kontrak_value"] = $value;
	//	r_lama - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_lama", $data, $keylink);
			$row["r_lama_value"] = $value;
	//	r_jalan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_jalan_id", $data, $keylink);
			$row["r_jalan_id_value"] = $value;
	//	r_jalanklas_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_jalanklas_id", $data, $keylink);
			$row["r_jalanklas_id_value"] = $value;
	//	r_lokasi - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_lokasi", $data, $keylink);
			$row["r_lokasi_value"] = $value;
	//	r_judul - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_judul", $data, $keylink);
			$row["r_judul_value"] = $value;
	//	r_kelurahan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_kelurahan_id", $data, $keylink);
			$row["r_kelurahan_id_value"] = $value;
	//	r_lokasi_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_lokasi_id", $data, $keylink);
			$row["r_lokasi_id_value"] = $value;
	//	r_calculated - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_calculated", $data, $keylink);
			$row["r_calculated_value"] = $value;
	//	r_nsr - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_nsr", $data, $keylink);
			$row["r_nsr_value"] = $value;
	//	r_nsrno - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_nsrno", $data, $keylink);
			$row["r_nsrno_value"] = $value;
	//	r_nsrtgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_nsrtgl", $data, $keylink);
			$row["r_nsrtgl_value"] = $value;
	//	r_nsl_kecamatan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_nsl_kecamatan_id", $data, $keylink);
			$row["r_nsl_kecamatan_id_value"] = $value;
	//	r_nsl_type_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_nsl_type_id", $data, $keylink);
			$row["r_nsl_type_id_value"] = $value;
	//	r_nsl_nilai - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_nsl_nilai", $data, $keylink);
			$row["r_nsl_nilai_value"] = $value;
	//	notes - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("notes", $data, $keylink);
			$row["notes_value"] = $value;
	//	unit_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("unit_id", $data, $keylink);
			$row["unit_id_value"] = $value;
	//	enabled - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("enabled", $data, $keylink);
			$row["enabled_value"] = $value;
	//	created - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("created", $data, $keylink);
			$row["created_value"] = $value;
	//	create_uid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("create_uid", $data, $keylink);
			$row["create_uid_value"] = $value;
	//	updated - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("updated", $data, $keylink);
			$row["updated_value"] = $value;
	//	update_uid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("update_uid", $data, $keylink);
			$row["update_uid_value"] = $value;
	//	terimanip - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("terimanip", $data, $keylink);
			$row["terimanip_value"] = $value;
	//	terimatgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("terimatgl", $data, $keylink);
			$row["terimatgl_value"] = $value;
	//	kirimtgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kirimtgl", $data, $keylink);
			$row["kirimtgl_value"] = $value;
	//	isprint_dc - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("isprint_dc", $data, $keylink);
			$row["isprint_dc_value"] = $value;
	//	r_nsr_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_nsr_id", $data, $keylink);
			$row["r_nsr_id_value"] = $value;
	//	r_lokasi_pasang_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_lokasi_pasang_id", $data, $keylink);
			$row["r_lokasi_pasang_id_value"] = $value;
	//	r_lokasi_pasang_val - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_lokasi_pasang_val", $data, $keylink);
			$row["r_lokasi_pasang_val_value"] = $value;
	//	r_jalanklas_val - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_jalanklas_val", $data, $keylink);
			$row["r_jalanklas_val_value"] = $value;
	//	r_sudut_pandang_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_sudut_pandang_id", $data, $keylink);
			$row["r_sudut_pandang_id_value"] = $value;
	//	r_sudut_pandang_val - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_sudut_pandang_val", $data, $keylink);
			$row["r_sudut_pandang_val_value"] = $value;
	//	r_tinggi - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_tinggi", $data, $keylink);
			$row["r_tinggi_value"] = $value;
	//	r_njop - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_njop", $data, $keylink);
			$row["r_njop_value"] = $value;
	//	r_status - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_status", $data, $keylink);
			$row["r_status_value"] = $value;
	//	r_njop_ketinggian - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_njop_ketinggian", $data, $keylink);
			$row["r_njop_ketinggian_value"] = $value;
	//	status_pembayaran - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("status_pembayaran", $data, $keylink);
			$row["status_pembayaran_value"] = $value;
	//	rek_no_paneng - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("rek_no_paneng", $data, $keylink);
			$row["rek_no_paneng_value"] = $value;
	//	sptno_lengkap - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("sptno_lengkap", $data, $keylink);
			$row["sptno_lengkap_value"] = $value;
	//	sptno_lama - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("sptno_lama", $data, $keylink);
			$row["sptno_lama_value"] = $value;
	//	r_nama - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_nama", $data, $keylink);
			$row["r_nama_value"] = $value;
	//	r_alamat - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("r_alamat", $data, $keylink);
			$row["r_alamat_value"] = $value;
	//	omset1 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset1", $data, $keylink);
			$row["omset1_value"] = $value;
	//	omset2 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset2", $data, $keylink);
			$row["omset2_value"] = $value;
	//	omset3 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset3", $data, $keylink);
			$row["omset3_value"] = $value;
	//	omset4 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset4", $data, $keylink);
			$row["omset4_value"] = $value;
	//	omset5 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset5", $data, $keylink);
			$row["omset5_value"] = $value;
	//	omset6 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset6", $data, $keylink);
			$row["omset6_value"] = $value;
	//	omset7 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset7", $data, $keylink);
			$row["omset7_value"] = $value;
	//	omset8 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset8", $data, $keylink);
			$row["omset8_value"] = $value;
	//	omset9 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset9", $data, $keylink);
			$row["omset9_value"] = $value;
	//	omset10 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset10", $data, $keylink);
			$row["omset10_value"] = $value;
	//	omset11 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset11", $data, $keylink);
			$row["omset11_value"] = $value;
	//	omset12 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset12", $data, $keylink);
			$row["omset12_value"] = $value;
	//	omset13 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset13", $data, $keylink);
			$row["omset13_value"] = $value;
	//	omset14 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset14", $data, $keylink);
			$row["omset14_value"] = $value;
	//	omset15 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset15", $data, $keylink);
			$row["omset15_value"] = $value;
	//	omset16 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset16", $data, $keylink);
			$row["omset16_value"] = $value;
	//	omset17 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset17", $data, $keylink);
			$row["omset17_value"] = $value;
	//	omset18 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset18", $data, $keylink);
			$row["omset18_value"] = $value;
	//	omset19 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset19", $data, $keylink);
			$row["omset19_value"] = $value;
	//	omset20 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset20", $data, $keylink);
			$row["omset20_value"] = $value;
	//	omset21 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset21", $data, $keylink);
			$row["omset21_value"] = $value;
	//	omset22 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset22", $data, $keylink);
			$row["omset22_value"] = $value;
	//	omset23 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset23", $data, $keylink);
			$row["omset23_value"] = $value;
	//	omset24 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset24", $data, $keylink);
			$row["omset24_value"] = $value;
	//	omset25 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset25", $data, $keylink);
			$row["omset25_value"] = $value;
	//	omset26 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset26", $data, $keylink);
			$row["omset26_value"] = $value;
	//	omset27 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset27", $data, $keylink);
			$row["omset27_value"] = $value;
	//	omset28 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset28", $data, $keylink);
			$row["omset28_value"] = $value;
	//	omset29 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset29", $data, $keylink);
			$row["omset29_value"] = $value;
	//	omset30 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset30", $data, $keylink);
			$row["omset30_value"] = $value;
	//	omset31 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset31", $data, $keylink);
			$row["omset31_value"] = $value;
	//	keterangan1 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan1", $data, $keylink);
			$row["keterangan1_value"] = $value;
	//	keterangan2 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan2", $data, $keylink);
			$row["keterangan2_value"] = $value;
	//	keterangan3 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan3", $data, $keylink);
			$row["keterangan3_value"] = $value;
	//	keterangan4 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan4", $data, $keylink);
			$row["keterangan4_value"] = $value;
	//	keterangan5 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan5", $data, $keylink);
			$row["keterangan5_value"] = $value;
	//	keterangan6 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan6", $data, $keylink);
			$row["keterangan6_value"] = $value;
	//	keterangan7 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan7", $data, $keylink);
			$row["keterangan7_value"] = $value;
	//	keterangan8 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan8", $data, $keylink);
			$row["keterangan8_value"] = $value;
	//	keterangan9 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan9", $data, $keylink);
			$row["keterangan9_value"] = $value;
	//	keterangan10 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan10", $data, $keylink);
			$row["keterangan10_value"] = $value;
	//	keterangan11 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan11", $data, $keylink);
			$row["keterangan11_value"] = $value;
	//	keterangan12 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan12", $data, $keylink);
			$row["keterangan12_value"] = $value;
	//	keterangan13 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan13", $data, $keylink);
			$row["keterangan13_value"] = $value;
	//	keterangan14 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan14", $data, $keylink);
			$row["keterangan14_value"] = $value;
	//	keterangan15 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan15", $data, $keylink);
			$row["keterangan15_value"] = $value;
	//	keterangan16 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan16", $data, $keylink);
			$row["keterangan16_value"] = $value;
	//	keterangan17 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan17", $data, $keylink);
			$row["keterangan17_value"] = $value;
	//	keterangan18 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan18", $data, $keylink);
			$row["keterangan18_value"] = $value;
	//	keterangan19 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan19", $data, $keylink);
			$row["keterangan19_value"] = $value;
	//	keterangan20 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan20", $data, $keylink);
			$row["keterangan20_value"] = $value;
	//	keterangan21 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan21", $data, $keylink);
			$row["keterangan21_value"] = $value;
	//	keterangan22 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan22", $data, $keylink);
			$row["keterangan22_value"] = $value;
	//	keterangan23 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan23", $data, $keylink);
			$row["keterangan23_value"] = $value;
	//	keterangan24 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan24", $data, $keylink);
			$row["keterangan24_value"] = $value;
	//	keterangan25 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan25", $data, $keylink);
			$row["keterangan25_value"] = $value;
	//	keterangan26 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan26", $data, $keylink);
			$row["keterangan26_value"] = $value;
	//	keterangan27 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan27", $data, $keylink);
			$row["keterangan27_value"] = $value;
	//	keterangan28 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan28", $data, $keylink);
			$row["keterangan28_value"] = $value;
	//	keterangan29 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan29", $data, $keylink);
			$row["keterangan29_value"] = $value;
	//	keterangan30 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan30", $data, $keylink);
			$row["keterangan30_value"] = $value;
	//	keterangan31 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan31", $data, $keylink);
			$row["keterangan31_value"] = $value;
	//	doc_no - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("doc_no", $data, $keylink);
			$row["doc_no_value"] = $value;
	//	cara_bayar - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("cara_bayar", $data, $keylink);
			$row["cara_bayar_value"] = $value;
	//	kelompok_usaha_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kelompok_usaha_id", $data, $keylink);
			$row["kelompok_usaha_id_value"] = $value;
	//	zona_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("zona_id", $data, $keylink);
			$row["zona_id_value"] = $value;
	//	manfaat_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("manfaat_id", $data, $keylink);
			$row["manfaat_id_value"] = $value;
	//	golongan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("golongan", $data, $keylink);
			$row["golongan_value"] = $value;
	//	omset_lain - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("omset_lain", $data, $keylink);
			$row["omset_lain_value"] = $value;
	//	keterangan_lain - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("keterangan_lain", $data, $keylink);
			$row["keterangan_lain_value"] = $value;
	//	ijin_no - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin_no", $data, $keylink);
			$row["ijin_no_value"] = $value;
	//	jenis_masa - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("jenis_masa", $data, $keylink);
			$row["jenis_masa_value"] = $value;
	//	skpd_lama - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("skpd_lama", $data, $keylink);
			$row["skpd_lama_value"] = $value;
	//	proses - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("proses", $data, $keylink);
			$row["proses_value"] = $value;
	//	tanggal_validasi - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("tanggal_validasi", $data, $keylink);
			$row["tanggal_validasi_value"] = $value;
	//	bulan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan", $data, $keylink);
			$row["bulan_value"] = $value;
	//	no_telp - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("no_telp", $data, $keylink);
			$row["no_telp_value"] = $value;
	//	usaha_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("usaha_id", $data, $keylink);
			$row["usaha_id_value"] = $value;
	//	multiple - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("multiple", $data, $keylink);
			$row["multiple_value"] = $value;
	//	bulan_telat - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan_telat", $data, $keylink);
			$row["bulan_telat_value"] = $value;
		$rowinfo[] = $row;
		$data = $cipherer->DecryptFetchedArray($rs);
	}
	$xt->assign_loopsection("details_row",$rowinfo);
}
$returnJSON = array("success" => true);
$xt->load_template("pad_pad_spt_detailspreview.htm");
$returnJSON["body"] = $xt->fetch_loaded();

if($mode!="inline"){
	$returnJSON["counter"] = postvalue("counter");
	$layout = GetPageLayout(GoodFieldName($strTableName), 'detailspreview');
	if($layout)
	{
		$rtl = $xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$returnJSON["style"] = "styles/".$layout->style."/style".$rtl.".css";
		$returnJSON["pageStyle"] = "pagestyles/".$layout->name.$rtl.".css";
		$returnJSON["layout"] = $layout->style." page-".$layout->name.".css";
	}	
}	

echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
?>