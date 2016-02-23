<?php
include_once(getabspath("include/pad_pad_customer_usaha_settings.php"));

function DisplayMasterTableInfo_pad_pad_customer_usaha($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	$detailPageObj = $params["detailPageObj"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "pad.pad_customer_usaha";
	
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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_customer_usaha_masterlist"] = $layout;


if($detailtable == "pad.pad_spt")
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

//	konterid - 
			$value="";

					$xt->assign("konterid_mastervalue", $viewControls->showDBValue("konterid", $data, $keylink));

//	reg_date - Short Date
			$value="";

					$xt->assign("reg_date_mastervalue", $viewControls->showDBValue("reg_date", $data, $keylink));

//	customer_id - 
			$value="";

					$xt->assign("customer_id_mastervalue", $viewControls->showDBValue("customer_id", $data, $keylink));

//	usaha_id - 
			$value="";

					$xt->assign("usaha_id_mastervalue", $viewControls->showDBValue("usaha_id", $data, $keylink));

//	so - 
			$value="";

					$xt->assign("so_mastervalue", $viewControls->showDBValue("so", $data, $keylink));

//	kecamatan_id - 
			$value="";

					$xt->assign("kecamatan_id_mastervalue", $viewControls->showDBValue("kecamatan_id", $data, $keylink));

//	kelurahan_id - 
			$value="";

					$xt->assign("kelurahan_id_mastervalue", $viewControls->showDBValue("kelurahan_id", $data, $keylink));

//	notes - 
			$value="";

					$xt->assign("notes_mastervalue", $viewControls->showDBValue("notes", $data, $keylink));

//	enabled - 
			$value="";

					$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));

//	create_uid - 
			$value="";

					$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	customer_status_id - 
			$value="";

					$xt->assign("customer_status_id_mastervalue", $viewControls->showDBValue("customer_status_id", $data, $keylink));

//	aktifnotes - 
			$value="";

					$xt->assign("aktifnotes_mastervalue", $viewControls->showDBValue("aktifnotes", $data, $keylink));

//	tmt - Short Date
			$value="";

					$xt->assign("tmt_mastervalue", $viewControls->showDBValue("tmt", $data, $keylink));

//	air_zona_id - 
			$value="";

					$xt->assign("air_zona_id_mastervalue", $viewControls->showDBValue("air_zona_id", $data, $keylink));

//	air_manfaat_id - 
			$value="";

					$xt->assign("air_manfaat_id_mastervalue", $viewControls->showDBValue("air_manfaat_id", $data, $keylink));

//	def_pajak_id - 
			$value="";

					$xt->assign("def_pajak_id_mastervalue", $viewControls->showDBValue("def_pajak_id", $data, $keylink));

//	opnm - 
			$value="";

					$xt->assign("opnm_mastervalue", $viewControls->showDBValue("opnm", $data, $keylink));

//	opalamat - 
			$value="";

					$xt->assign("opalamat_mastervalue", $viewControls->showDBValue("opalamat", $data, $keylink));

//	latitude - Number
			$value="";

					$xt->assign("latitude_mastervalue", $viewControls->showDBValue("latitude", $data, $keylink));

//	longitude - Number
			$value="";

					$xt->assign("longitude_mastervalue", $viewControls->showDBValue("longitude", $data, $keylink));

//	created - Short Date
			$value="";

					$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	updated - Short Date
			$value="";

					$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	update_uid - 
			$value="";

					$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	kd_restojmlmeja - 
			$value="";

					$xt->assign("kd_restojmlmeja_mastervalue", $viewControls->showDBValue("kd_restojmlmeja", $data, $keylink));

//	kd_restojmlkursi - 
			$value="";

					$xt->assign("kd_restojmlkursi_mastervalue", $viewControls->showDBValue("kd_restojmlkursi", $data, $keylink));

//	kd_restojmltamu - 
			$value="";

					$xt->assign("kd_restojmltamu_mastervalue", $viewControls->showDBValue("kd_restojmltamu", $data, $keylink));

//	kd_filmkursi - 
			$value="";

					$xt->assign("kd_filmkursi_mastervalue", $viewControls->showDBValue("kd_filmkursi", $data, $keylink));

//	kd_filmpertunjukan - 
			$value="";

					$xt->assign("kd_filmpertunjukan_mastervalue", $viewControls->showDBValue("kd_filmpertunjukan", $data, $keylink));

//	kd_filmtarif - Number
			$value="";

					$xt->assign("kd_filmtarif_mastervalue", $viewControls->showDBValue("kd_filmtarif", $data, $keylink));

//	kd_bilyarmeja - 
			$value="";

					$xt->assign("kd_bilyarmeja_mastervalue", $viewControls->showDBValue("kd_bilyarmeja", $data, $keylink));

//	kd_bilyartarif - Number
			$value="";

					$xt->assign("kd_bilyartarif_mastervalue", $viewControls->showDBValue("kd_bilyartarif", $data, $keylink));

//	kd_bilyarkegiatan - 
			$value="";

					$xt->assign("kd_bilyarkegiatan_mastervalue", $viewControls->showDBValue("kd_bilyarkegiatan", $data, $keylink));

//	kd_diskopengunjung - 
			$value="";

					$xt->assign("kd_diskopengunjung_mastervalue", $viewControls->showDBValue("kd_diskopengunjung", $data, $keylink));

//	kd_diskotarif - Number
			$value="";

					$xt->assign("kd_diskotarif_mastervalue", $viewControls->showDBValue("kd_diskotarif", $data, $keylink));

//	mall_id - 
			$value="";

					$xt->assign("mall_id_mastervalue", $viewControls->showDBValue("mall_id", $data, $keylink));

//	cash_register - 
			$value="";

					$xt->assign("cash_register_mastervalue", $viewControls->showDBValue("cash_register", $data, $keylink));

//	pelaporan - 
			$value="";

					$xt->assign("pelaporan_mastervalue", $viewControls->showDBValue("pelaporan", $data, $keylink));

//	pembukuan - 
			$value="";

					$xt->assign("pembukuan_mastervalue", $viewControls->showDBValue("pembukuan", $data, $keylink));

//	bandara - 
			$value="";

					$xt->assign("bandara_mastervalue", $viewControls->showDBValue("bandara", $data, $keylink));

//	wajib_pajak - 
			$value="";

					$xt->assign("wajib_pajak_mastervalue", $viewControls->showDBValue("wajib_pajak", $data, $keylink));

//	jumlah_karyawan - 
			$value="";

					$xt->assign("jumlah_karyawan_mastervalue", $viewControls->showDBValue("jumlah_karyawan", $data, $keylink));

//	tanggal_tutup - Short Date
			$value="";

					$xt->assign("tanggal_tutup_mastervalue", $viewControls->showDBValue("tanggal_tutup", $data, $keylink));

//	parkir_luas - 
			$value="";

					$xt->assign("parkir_luas_mastervalue", $viewControls->showDBValue("parkir_luas", $data, $keylink));

//	parkir_masuk - 
			$value="";

					$xt->assign("parkir_masuk_mastervalue", $viewControls->showDBValue("parkir_masuk", $data, $keylink));

//	parkir_tarif_mobil - Number
			$value="";

					$xt->assign("parkir_tarif_mobil_mastervalue", $viewControls->showDBValue("parkir_tarif_mobil", $data, $keylink));

//	parkir_tambahan - Number
			$value="";

					$xt->assign("parkir_tambahan_mastervalue", $viewControls->showDBValue("parkir_tambahan", $data, $keylink));

//	parkir_kapasitas_mobil - 
			$value="";

					$xt->assign("parkir_kapasitas_mobil_mastervalue", $viewControls->showDBValue("parkir_kapasitas_mobil", $data, $keylink));

//	parkir_mobil_hari - 
			$value="";

					$xt->assign("parkir_mobil_hari_mastervalue", $viewControls->showDBValue("parkir_mobil_hari", $data, $keylink));

//	parkir_keluar - 
			$value="";

					$xt->assign("parkir_keluar_mastervalue", $viewControls->showDBValue("parkir_keluar", $data, $keylink));

//	parkir_motor_luas - 
			$value="";

					$xt->assign("parkir_motor_luas_mastervalue", $viewControls->showDBValue("parkir_motor_luas", $data, $keylink));

//	parkir_motor_masuk - 
			$value="";

					$xt->assign("parkir_motor_masuk_mastervalue", $viewControls->showDBValue("parkir_motor_masuk", $data, $keylink));

//	parkir_motor_keluar - 
			$value="";

					$xt->assign("parkir_motor_keluar_mastervalue", $viewControls->showDBValue("parkir_motor_keluar", $data, $keylink));

//	parkir_tarif_motor - Number
			$value="";

					$xt->assign("parkir_tarif_motor_mastervalue", $viewControls->showDBValue("parkir_tarif_motor", $data, $keylink));

//	parkir_motor_tambahan - Number
			$value="";

					$xt->assign("parkir_motor_tambahan_mastervalue", $viewControls->showDBValue("parkir_motor_tambahan", $data, $keylink));

//	parkir_kapasitas_motor - 
			$value="";

					$xt->assign("parkir_kapasitas_motor_mastervalue", $viewControls->showDBValue("parkir_kapasitas_motor", $data, $keylink));

//	parkir_motor_hari - 
			$value="";

					$xt->assign("parkir_motor_hari_mastervalue", $viewControls->showDBValue("parkir_motor_hari", $data, $keylink));

//	kelompok_usaha_id - 
			$value="";

					$xt->assign("kelompok_usaha_id_mastervalue", $viewControls->showDBValue("kelompok_usaha_id", $data, $keylink));

//	zona_id - 
			$value="";

					$xt->assign("zona_id_mastervalue", $viewControls->showDBValue("zona_id", $data, $keylink));

//	manfaat_id - 
			$value="";

					$xt->assign("manfaat_id_mastervalue", $viewControls->showDBValue("manfaat_id", $data, $keylink));

//	golongan_id - 
			$value="";

					$xt->assign("golongan_id_mastervalue", $viewControls->showDBValue("golongan_id", $data, $keylink));

//	id_old - 
			$value="";

					$xt->assign("id_old_mastervalue", $viewControls->showDBValue("id_old", $data, $keylink));

	$viewControls->addControlsJSAndCSS();
	$detailPageObj->viewControlsMap['mViewControlsMap'] = $viewControls->viewControlsMap;

	$layout = GetPageLayout("pad_pad_customer_usaha", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("pad_pad_customer_usaha_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>