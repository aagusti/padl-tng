<?php
include_once(getabspath("include/pad_pad_daftar_settings.php"));

function DisplayMasterTableInfo_pad_pad_daftar($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="pad.pad_daftar";

//$strSQL = "SELECT id,   rp,   pb,   formno,   reg_date,   customernm,   kecamatan_id,   kelurahan_id,   kabupaten,   alamat,   kodepos,   telphone,   wpnama,   wpalamat,   wpkelurahan,   wpkecamatan,   wpkabupaten,   wptelp,   wpkodepos,   pnama,   palamat,   pkelurahan,   pkecamatan,   pkabupaten,   ptelp,   pkodepos,   ijin1,   ijin1no,   ijin1tgl,   ijin1tglakhir,   ijin2,   ijin2no,   ijin2tgl,   ijin2tglakhir,   ijin3,   ijin3no,   ijin3tgl,   ijin3tglakhir,   ijin4,   ijin4no,   ijin4tgl,   ijin4tglakhir,   enabled,   create_date,   create_uid,   write_date,   write_uid,   op_nm,   op_alamat,   op_usaha_id,   op_so,   op_kecamatan_id,   op_kelurahan_id,   op_latitude,   op_longitude,   kd_restojmlmeja,   kd_restojmlkursi,   kd_restojmltamu,   kd_filmkursi,   kd_filmpertunjukan,   kd_filmtarif,   kd_bilyarmeja,   kd_bilyartarif,   kd_bilyarkegiatan,   kd_diskopengunjung,   kd_diskotarif,   kd_waletvolume,   email,   op_pajak_id,   npwpd,   passwd  FROM \"pad\".pad_daftar ";

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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_daftar_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="pad.pad_daftar_hist")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="pad.pad_daftar_kd_det")
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

//	rp - 
			$xt->assign("rp_mastervalue", $viewControls->showDBValue("rp", $data, $keylink));

//	pb - 
			$xt->assign("pb_mastervalue", $viewControls->showDBValue("pb", $data, $keylink));

//	formno - 
			$xt->assign("formno_mastervalue", $viewControls->showDBValue("formno", $data, $keylink));

//	reg_date - Short Date
			$xt->assign("reg_date_mastervalue", $viewControls->showDBValue("reg_date", $data, $keylink));

//	customernm - 
			$xt->assign("customernm_mastervalue", $viewControls->showDBValue("customernm", $data, $keylink));

//	kecamatan_id - 
			$xt->assign("kecamatan_id_mastervalue", $viewControls->showDBValue("kecamatan_id", $data, $keylink));

//	kelurahan_id - 
			$xt->assign("kelurahan_id_mastervalue", $viewControls->showDBValue("kelurahan_id", $data, $keylink));

//	kabupaten - 
			$xt->assign("kabupaten_mastervalue", $viewControls->showDBValue("kabupaten", $data, $keylink));

//	alamat - 
			$xt->assign("alamat_mastervalue", $viewControls->showDBValue("alamat", $data, $keylink));

//	kodepos - 
			$xt->assign("kodepos_mastervalue", $viewControls->showDBValue("kodepos", $data, $keylink));

//	telphone - 
			$xt->assign("telphone_mastervalue", $viewControls->showDBValue("telphone", $data, $keylink));

//	wpnama - 
			$xt->assign("wpnama_mastervalue", $viewControls->showDBValue("wpnama", $data, $keylink));

//	wpalamat - 
			$xt->assign("wpalamat_mastervalue", $viewControls->showDBValue("wpalamat", $data, $keylink));

//	wpkelurahan - 
			$xt->assign("wpkelurahan_mastervalue", $viewControls->showDBValue("wpkelurahan", $data, $keylink));

//	wpkecamatan - 
			$xt->assign("wpkecamatan_mastervalue", $viewControls->showDBValue("wpkecamatan", $data, $keylink));

//	wpkabupaten - 
			$xt->assign("wpkabupaten_mastervalue", $viewControls->showDBValue("wpkabupaten", $data, $keylink));

//	wptelp - 
			$xt->assign("wptelp_mastervalue", $viewControls->showDBValue("wptelp", $data, $keylink));

//	wpkodepos - 
			$xt->assign("wpkodepos_mastervalue", $viewControls->showDBValue("wpkodepos", $data, $keylink));

//	pnama - 
			$xt->assign("pnama_mastervalue", $viewControls->showDBValue("pnama", $data, $keylink));

//	palamat - 
			$xt->assign("palamat_mastervalue", $viewControls->showDBValue("palamat", $data, $keylink));

//	pkelurahan - 
			$xt->assign("pkelurahan_mastervalue", $viewControls->showDBValue("pkelurahan", $data, $keylink));

//	pkecamatan - 
			$xt->assign("pkecamatan_mastervalue", $viewControls->showDBValue("pkecamatan", $data, $keylink));

//	pkabupaten - 
			$xt->assign("pkabupaten_mastervalue", $viewControls->showDBValue("pkabupaten", $data, $keylink));

//	ptelp - 
			$xt->assign("ptelp_mastervalue", $viewControls->showDBValue("ptelp", $data, $keylink));

//	pkodepos - 
			$xt->assign("pkodepos_mastervalue", $viewControls->showDBValue("pkodepos", $data, $keylink));

//	ijin1 - 
			$xt->assign("ijin1_mastervalue", $viewControls->showDBValue("ijin1", $data, $keylink));

//	ijin1no - 
			$xt->assign("ijin1no_mastervalue", $viewControls->showDBValue("ijin1no", $data, $keylink));

//	ijin1tgl - Short Date
			$xt->assign("ijin1tgl_mastervalue", $viewControls->showDBValue("ijin1tgl", $data, $keylink));

//	ijin1tglakhir - Short Date
			$xt->assign("ijin1tglakhir_mastervalue", $viewControls->showDBValue("ijin1tglakhir", $data, $keylink));

//	ijin2 - 
			$xt->assign("ijin2_mastervalue", $viewControls->showDBValue("ijin2", $data, $keylink));

//	ijin2no - 
			$xt->assign("ijin2no_mastervalue", $viewControls->showDBValue("ijin2no", $data, $keylink));

//	ijin2tgl - Short Date
			$xt->assign("ijin2tgl_mastervalue", $viewControls->showDBValue("ijin2tgl", $data, $keylink));

//	ijin2tglakhir - Short Date
			$xt->assign("ijin2tglakhir_mastervalue", $viewControls->showDBValue("ijin2tglakhir", $data, $keylink));

//	ijin3 - 
			$xt->assign("ijin3_mastervalue", $viewControls->showDBValue("ijin3", $data, $keylink));

//	ijin3no - 
			$xt->assign("ijin3no_mastervalue", $viewControls->showDBValue("ijin3no", $data, $keylink));

//	ijin3tgl - Short Date
			$xt->assign("ijin3tgl_mastervalue", $viewControls->showDBValue("ijin3tgl", $data, $keylink));

//	ijin3tglakhir - Short Date
			$xt->assign("ijin3tglakhir_mastervalue", $viewControls->showDBValue("ijin3tglakhir", $data, $keylink));

//	ijin4 - 
			$xt->assign("ijin4_mastervalue", $viewControls->showDBValue("ijin4", $data, $keylink));

//	ijin4no - 
			$xt->assign("ijin4no_mastervalue", $viewControls->showDBValue("ijin4no", $data, $keylink));

//	ijin4tgl - Short Date
			$xt->assign("ijin4tgl_mastervalue", $viewControls->showDBValue("ijin4tgl", $data, $keylink));

//	ijin4tglakhir - Short Date
			$xt->assign("ijin4tglakhir_mastervalue", $viewControls->showDBValue("ijin4tglakhir", $data, $keylink));

//	enabled - 
			$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));

//	create_date - Short Date
			$xt->assign("create_date_mastervalue", $viewControls->showDBValue("create_date", $data, $keylink));

//	create_uid - 
			$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	write_date - Short Date
			$xt->assign("write_date_mastervalue", $viewControls->showDBValue("write_date", $data, $keylink));

//	write_uid - 
			$xt->assign("write_uid_mastervalue", $viewControls->showDBValue("write_uid", $data, $keylink));

//	op_nm - 
			$xt->assign("op_nm_mastervalue", $viewControls->showDBValue("op_nm", $data, $keylink));

//	op_alamat - 
			$xt->assign("op_alamat_mastervalue", $viewControls->showDBValue("op_alamat", $data, $keylink));

//	op_usaha_id - 
			$xt->assign("op_usaha_id_mastervalue", $viewControls->showDBValue("op_usaha_id", $data, $keylink));

//	op_so - 
			$xt->assign("op_so_mastervalue", $viewControls->showDBValue("op_so", $data, $keylink));

//	op_kecamatan_id - 
			$xt->assign("op_kecamatan_id_mastervalue", $viewControls->showDBValue("op_kecamatan_id", $data, $keylink));

//	op_kelurahan_id - 
			$xt->assign("op_kelurahan_id_mastervalue", $viewControls->showDBValue("op_kelurahan_id", $data, $keylink));

//	op_latitude - Number
			$xt->assign("op_latitude_mastervalue", $viewControls->showDBValue("op_latitude", $data, $keylink));

//	op_longitude - Number
			$xt->assign("op_longitude_mastervalue", $viewControls->showDBValue("op_longitude", $data, $keylink));

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

//	kd_waletvolume - 
			$xt->assign("kd_waletvolume_mastervalue", $viewControls->showDBValue("kd_waletvolume", $data, $keylink));

//	email - 
			$xt->assign("email_mastervalue", $viewControls->showDBValue("email", $data, $keylink));

//	op_pajak_id - 
			$xt->assign("op_pajak_id_mastervalue", $viewControls->showDBValue("op_pajak_id", $data, $keylink));

//	npwpd - 
			$xt->assign("npwpd_mastervalue", $viewControls->showDBValue("npwpd", $data, $keylink));

//	passwd - 
			$xt->assign("passwd_mastervalue", $viewControls->showDBValue("passwd", $data, $keylink));
	$xt->display("pad_pad_daftar_masterprint.htm");
	$strTableName=$oldTableName;

}

?>