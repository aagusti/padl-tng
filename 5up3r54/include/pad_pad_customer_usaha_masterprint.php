<?php
include_once(getabspath("include/pad_pad_customer_usaha_settings.php"));

function DisplayMasterTableInfo_pad_pad_customer_usaha($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="pad.pad_customer_usaha";

//$strSQL = "SELECT id,   konterid,   reg_date,   customer_id,   usaha_id,   so,   kecamatan_id,   kelurahan_id,   notes,   enabled,   create_uid,   customer_status_id,   aktifnotes,   tmt,   air_zona_id,   air_manfaat_id,   def_pajak_id,   opnm,   opalamat,   latitude,   longitude,   created,   updated,   update_uid,   kd_restojmlmeja,   kd_restojmlkursi,   kd_restojmltamu,   kd_filmkursi,   kd_filmpertunjukan,   kd_filmtarif,   kd_bilyarmeja,   kd_bilyartarif,   kd_bilyarkegiatan,   kd_diskopengunjung,   kd_diskotarif,   mall_id,   cash_register,   pelaporan,   pembukuan,   bandara,   wajib_pajak,   jumlah_karyawan,   tanggal_tutup,   parkir_luas,   parkir_masuk,   parkir_tarif_mobil,   parkir_tambahan,   parkir_kapasitas_mobil,   parkir_mobil_hari,   parkir_keluar,   parkir_motor_luas,   parkir_motor_masuk,   parkir_motor_keluar,   parkir_tarif_motor,   parkir_motor_tambahan,   parkir_kapasitas_motor,   parkir_motor_hari,   kelompok_usaha_id,   zona_id,   manfaat_id,   golongan_id,   id_old  FROM \"pad\".pad_customer_usaha ";

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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_customer_usaha_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="pad.pad_spt")
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

//	konterid - 
			$xt->assign("konterid_mastervalue", $viewControls->showDBValue("konterid", $data, $keylink));

//	reg_date - Short Date
			$xt->assign("reg_date_mastervalue", $viewControls->showDBValue("reg_date", $data, $keylink));

//	customer_id - 
			$xt->assign("customer_id_mastervalue", $viewControls->showDBValue("customer_id", $data, $keylink));

//	usaha_id - 
			$xt->assign("usaha_id_mastervalue", $viewControls->showDBValue("usaha_id", $data, $keylink));

//	so - 
			$xt->assign("so_mastervalue", $viewControls->showDBValue("so", $data, $keylink));

//	kecamatan_id - 
			$xt->assign("kecamatan_id_mastervalue", $viewControls->showDBValue("kecamatan_id", $data, $keylink));

//	kelurahan_id - 
			$xt->assign("kelurahan_id_mastervalue", $viewControls->showDBValue("kelurahan_id", $data, $keylink));

//	notes - 
			$xt->assign("notes_mastervalue", $viewControls->showDBValue("notes", $data, $keylink));

//	enabled - 
			$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));

//	create_uid - 
			$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	customer_status_id - 
			$xt->assign("customer_status_id_mastervalue", $viewControls->showDBValue("customer_status_id", $data, $keylink));

//	aktifnotes - 
			$xt->assign("aktifnotes_mastervalue", $viewControls->showDBValue("aktifnotes", $data, $keylink));

//	tmt - Short Date
			$xt->assign("tmt_mastervalue", $viewControls->showDBValue("tmt", $data, $keylink));

//	air_zona_id - 
			$xt->assign("air_zona_id_mastervalue", $viewControls->showDBValue("air_zona_id", $data, $keylink));

//	air_manfaat_id - 
			$xt->assign("air_manfaat_id_mastervalue", $viewControls->showDBValue("air_manfaat_id", $data, $keylink));

//	def_pajak_id - 
			$xt->assign("def_pajak_id_mastervalue", $viewControls->showDBValue("def_pajak_id", $data, $keylink));

//	opnm - 
			$xt->assign("opnm_mastervalue", $viewControls->showDBValue("opnm", $data, $keylink));

//	opalamat - 
			$xt->assign("opalamat_mastervalue", $viewControls->showDBValue("opalamat", $data, $keylink));

//	latitude - Number
			$xt->assign("latitude_mastervalue", $viewControls->showDBValue("latitude", $data, $keylink));

//	longitude - Number
			$xt->assign("longitude_mastervalue", $viewControls->showDBValue("longitude", $data, $keylink));

//	created - Short Date
			$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	updated - Short Date
			$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	update_uid - 
			$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	kd_restojmlmeja - 
			$xt->assign("kd_restojmlmeja_mastervalue", $viewControls->showDBValue("kd_restojmlmeja", $data, $keylink));

//	kd_restojmlkursi - 
			$xt->assign("kd_restojmlkursi_mastervalue", $viewControls->showDBValue("kd_restojmlkursi", $data, $keylink));

//	kd_restojmltamu - 
			$xt->assign("kd_restojmltamu_mastervalue", $viewControls->showDBValue("kd_restojmltamu", $data, $keylink));

//	kd_filmkursi - 
			$xt->assign("kd_filmkursi_mastervalue", $viewControls->showDBValue("kd_filmkursi", $data, $keylink));

//	kd_filmpertunjukan - 
			$xt->assign("kd_filmpertunjukan_mastervalue", $viewControls->showDBValue("kd_filmpertunjukan", $data, $keylink));

//	kd_filmtarif - Number
			$xt->assign("kd_filmtarif_mastervalue", $viewControls->showDBValue("kd_filmtarif", $data, $keylink));

//	kd_bilyarmeja - 
			$xt->assign("kd_bilyarmeja_mastervalue", $viewControls->showDBValue("kd_bilyarmeja", $data, $keylink));

//	kd_bilyartarif - Number
			$xt->assign("kd_bilyartarif_mastervalue", $viewControls->showDBValue("kd_bilyartarif", $data, $keylink));

//	kd_bilyarkegiatan - 
			$xt->assign("kd_bilyarkegiatan_mastervalue", $viewControls->showDBValue("kd_bilyarkegiatan", $data, $keylink));

//	kd_diskopengunjung - 
			$xt->assign("kd_diskopengunjung_mastervalue", $viewControls->showDBValue("kd_diskopengunjung", $data, $keylink));

//	kd_diskotarif - Number
			$xt->assign("kd_diskotarif_mastervalue", $viewControls->showDBValue("kd_diskotarif", $data, $keylink));

//	mall_id - 
			$xt->assign("mall_id_mastervalue", $viewControls->showDBValue("mall_id", $data, $keylink));

//	cash_register - 
			$xt->assign("cash_register_mastervalue", $viewControls->showDBValue("cash_register", $data, $keylink));

//	pelaporan - 
			$xt->assign("pelaporan_mastervalue", $viewControls->showDBValue("pelaporan", $data, $keylink));

//	pembukuan - 
			$xt->assign("pembukuan_mastervalue", $viewControls->showDBValue("pembukuan", $data, $keylink));

//	bandara - 
			$xt->assign("bandara_mastervalue", $viewControls->showDBValue("bandara", $data, $keylink));

//	wajib_pajak - 
			$xt->assign("wajib_pajak_mastervalue", $viewControls->showDBValue("wajib_pajak", $data, $keylink));

//	jumlah_karyawan - 
			$xt->assign("jumlah_karyawan_mastervalue", $viewControls->showDBValue("jumlah_karyawan", $data, $keylink));

//	tanggal_tutup - Short Date
			$xt->assign("tanggal_tutup_mastervalue", $viewControls->showDBValue("tanggal_tutup", $data, $keylink));

//	parkir_luas - 
			$xt->assign("parkir_luas_mastervalue", $viewControls->showDBValue("parkir_luas", $data, $keylink));

//	parkir_masuk - 
			$xt->assign("parkir_masuk_mastervalue", $viewControls->showDBValue("parkir_masuk", $data, $keylink));

//	parkir_tarif_mobil - Number
			$xt->assign("parkir_tarif_mobil_mastervalue", $viewControls->showDBValue("parkir_tarif_mobil", $data, $keylink));

//	parkir_tambahan - Number
			$xt->assign("parkir_tambahan_mastervalue", $viewControls->showDBValue("parkir_tambahan", $data, $keylink));

//	parkir_kapasitas_mobil - 
			$xt->assign("parkir_kapasitas_mobil_mastervalue", $viewControls->showDBValue("parkir_kapasitas_mobil", $data, $keylink));

//	parkir_mobil_hari - 
			$xt->assign("parkir_mobil_hari_mastervalue", $viewControls->showDBValue("parkir_mobil_hari", $data, $keylink));

//	parkir_keluar - 
			$xt->assign("parkir_keluar_mastervalue", $viewControls->showDBValue("parkir_keluar", $data, $keylink));

//	parkir_motor_luas - 
			$xt->assign("parkir_motor_luas_mastervalue", $viewControls->showDBValue("parkir_motor_luas", $data, $keylink));

//	parkir_motor_masuk - 
			$xt->assign("parkir_motor_masuk_mastervalue", $viewControls->showDBValue("parkir_motor_masuk", $data, $keylink));

//	parkir_motor_keluar - 
			$xt->assign("parkir_motor_keluar_mastervalue", $viewControls->showDBValue("parkir_motor_keluar", $data, $keylink));

//	parkir_tarif_motor - Number
			$xt->assign("parkir_tarif_motor_mastervalue", $viewControls->showDBValue("parkir_tarif_motor", $data, $keylink));

//	parkir_motor_tambahan - Number
			$xt->assign("parkir_motor_tambahan_mastervalue", $viewControls->showDBValue("parkir_motor_tambahan", $data, $keylink));

//	parkir_kapasitas_motor - 
			$xt->assign("parkir_kapasitas_motor_mastervalue", $viewControls->showDBValue("parkir_kapasitas_motor", $data, $keylink));

//	parkir_motor_hari - 
			$xt->assign("parkir_motor_hari_mastervalue", $viewControls->showDBValue("parkir_motor_hari", $data, $keylink));

//	kelompok_usaha_id - 
			$xt->assign("kelompok_usaha_id_mastervalue", $viewControls->showDBValue("kelompok_usaha_id", $data, $keylink));

//	zona_id - 
			$xt->assign("zona_id_mastervalue", $viewControls->showDBValue("zona_id", $data, $keylink));

//	manfaat_id - 
			$xt->assign("manfaat_id_mastervalue", $viewControls->showDBValue("manfaat_id", $data, $keylink));

//	golongan_id - 
			$xt->assign("golongan_id_mastervalue", $viewControls->showDBValue("golongan_id", $data, $keylink));

//	id_old - 
			$xt->assign("id_old_mastervalue", $viewControls->showDBValue("id_old", $data, $keylink));
	$xt->display("pad_pad_customer_usaha_masterprint.htm");
	$strTableName=$oldTableName;

}

?>