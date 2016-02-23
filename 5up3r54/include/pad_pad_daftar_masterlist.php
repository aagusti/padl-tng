<?php
include_once(getabspath("include/pad_pad_daftar_settings.php"));

function DisplayMasterTableInfo_pad_pad_daftar($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	$detailPageObj = $params["detailPageObj"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "pad.pad_daftar";
	
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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_daftar_masterlist"] = $layout;


if($detailtable == "pad.pad_daftar_hist")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable == "pad.pad_daftar_kd_det")
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

//	rp - 
			$value="";

					$xt->assign("rp_mastervalue", $viewControls->showDBValue("rp", $data, $keylink));

//	pb - 
			$value="";

					$xt->assign("pb_mastervalue", $viewControls->showDBValue("pb", $data, $keylink));

//	formno - 
			$value="";

					$xt->assign("formno_mastervalue", $viewControls->showDBValue("formno", $data, $keylink));

//	reg_date - Short Date
			$value="";

					$xt->assign("reg_date_mastervalue", $viewControls->showDBValue("reg_date", $data, $keylink));

//	customernm - 
			$value="";

					$xt->assign("customernm_mastervalue", $viewControls->showDBValue("customernm", $data, $keylink));

//	kecamatan_id - 
			$value="";

					$xt->assign("kecamatan_id_mastervalue", $viewControls->showDBValue("kecamatan_id", $data, $keylink));

//	kelurahan_id - 
			$value="";

					$xt->assign("kelurahan_id_mastervalue", $viewControls->showDBValue("kelurahan_id", $data, $keylink));

//	kabupaten - 
			$value="";

					$xt->assign("kabupaten_mastervalue", $viewControls->showDBValue("kabupaten", $data, $keylink));

//	alamat - 
			$value="";

					$xt->assign("alamat_mastervalue", $viewControls->showDBValue("alamat", $data, $keylink));

//	kodepos - 
			$value="";

					$xt->assign("kodepos_mastervalue", $viewControls->showDBValue("kodepos", $data, $keylink));

//	telphone - 
			$value="";

					$xt->assign("telphone_mastervalue", $viewControls->showDBValue("telphone", $data, $keylink));

//	wpnama - 
			$value="";

					$xt->assign("wpnama_mastervalue", $viewControls->showDBValue("wpnama", $data, $keylink));

//	wpalamat - 
			$value="";

					$xt->assign("wpalamat_mastervalue", $viewControls->showDBValue("wpalamat", $data, $keylink));

//	wpkelurahan - 
			$value="";

					$xt->assign("wpkelurahan_mastervalue", $viewControls->showDBValue("wpkelurahan", $data, $keylink));

//	wpkecamatan - 
			$value="";

					$xt->assign("wpkecamatan_mastervalue", $viewControls->showDBValue("wpkecamatan", $data, $keylink));

//	wpkabupaten - 
			$value="";

					$xt->assign("wpkabupaten_mastervalue", $viewControls->showDBValue("wpkabupaten", $data, $keylink));

//	wptelp - 
			$value="";

					$xt->assign("wptelp_mastervalue", $viewControls->showDBValue("wptelp", $data, $keylink));

//	wpkodepos - 
			$value="";

					$xt->assign("wpkodepos_mastervalue", $viewControls->showDBValue("wpkodepos", $data, $keylink));

//	pnama - 
			$value="";

					$xt->assign("pnama_mastervalue", $viewControls->showDBValue("pnama", $data, $keylink));

//	palamat - 
			$value="";

					$xt->assign("palamat_mastervalue", $viewControls->showDBValue("palamat", $data, $keylink));

//	pkelurahan - 
			$value="";

					$xt->assign("pkelurahan_mastervalue", $viewControls->showDBValue("pkelurahan", $data, $keylink));

//	pkecamatan - 
			$value="";

					$xt->assign("pkecamatan_mastervalue", $viewControls->showDBValue("pkecamatan", $data, $keylink));

//	pkabupaten - 
			$value="";

					$xt->assign("pkabupaten_mastervalue", $viewControls->showDBValue("pkabupaten", $data, $keylink));

//	ptelp - 
			$value="";

					$xt->assign("ptelp_mastervalue", $viewControls->showDBValue("ptelp", $data, $keylink));

//	pkodepos - 
			$value="";

					$xt->assign("pkodepos_mastervalue", $viewControls->showDBValue("pkodepos", $data, $keylink));

//	ijin1 - 
			$value="";

					$xt->assign("ijin1_mastervalue", $viewControls->showDBValue("ijin1", $data, $keylink));

//	ijin1no - 
			$value="";

					$xt->assign("ijin1no_mastervalue", $viewControls->showDBValue("ijin1no", $data, $keylink));

//	ijin1tgl - Short Date
			$value="";

					$xt->assign("ijin1tgl_mastervalue", $viewControls->showDBValue("ijin1tgl", $data, $keylink));

//	ijin1tglakhir - Short Date
			$value="";

					$xt->assign("ijin1tglakhir_mastervalue", $viewControls->showDBValue("ijin1tglakhir", $data, $keylink));

//	ijin2 - 
			$value="";

					$xt->assign("ijin2_mastervalue", $viewControls->showDBValue("ijin2", $data, $keylink));

//	ijin2no - 
			$value="";

					$xt->assign("ijin2no_mastervalue", $viewControls->showDBValue("ijin2no", $data, $keylink));

//	ijin2tgl - Short Date
			$value="";

					$xt->assign("ijin2tgl_mastervalue", $viewControls->showDBValue("ijin2tgl", $data, $keylink));

//	ijin2tglakhir - Short Date
			$value="";

					$xt->assign("ijin2tglakhir_mastervalue", $viewControls->showDBValue("ijin2tglakhir", $data, $keylink));

//	ijin3 - 
			$value="";

					$xt->assign("ijin3_mastervalue", $viewControls->showDBValue("ijin3", $data, $keylink));

//	ijin3no - 
			$value="";

					$xt->assign("ijin3no_mastervalue", $viewControls->showDBValue("ijin3no", $data, $keylink));

//	ijin3tgl - Short Date
			$value="";

					$xt->assign("ijin3tgl_mastervalue", $viewControls->showDBValue("ijin3tgl", $data, $keylink));

//	ijin3tglakhir - Short Date
			$value="";

					$xt->assign("ijin3tglakhir_mastervalue", $viewControls->showDBValue("ijin3tglakhir", $data, $keylink));

//	ijin4 - 
			$value="";

					$xt->assign("ijin4_mastervalue", $viewControls->showDBValue("ijin4", $data, $keylink));

//	ijin4no - 
			$value="";

					$xt->assign("ijin4no_mastervalue", $viewControls->showDBValue("ijin4no", $data, $keylink));

//	ijin4tgl - Short Date
			$value="";

					$xt->assign("ijin4tgl_mastervalue", $viewControls->showDBValue("ijin4tgl", $data, $keylink));

//	ijin4tglakhir - Short Date
			$value="";

					$xt->assign("ijin4tglakhir_mastervalue", $viewControls->showDBValue("ijin4tglakhir", $data, $keylink));

//	enabled - 
			$value="";

					$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));

//	create_date - Short Date
			$value="";

					$xt->assign("create_date_mastervalue", $viewControls->showDBValue("create_date", $data, $keylink));

//	create_uid - 
			$value="";

					$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	write_date - Short Date
			$value="";

					$xt->assign("write_date_mastervalue", $viewControls->showDBValue("write_date", $data, $keylink));

//	write_uid - 
			$value="";

					$xt->assign("write_uid_mastervalue", $viewControls->showDBValue("write_uid", $data, $keylink));

//	op_nm - 
			$value="";

					$xt->assign("op_nm_mastervalue", $viewControls->showDBValue("op_nm", $data, $keylink));

//	op_alamat - 
			$value="";

					$xt->assign("op_alamat_mastervalue", $viewControls->showDBValue("op_alamat", $data, $keylink));

//	op_usaha_id - 
			$value="";

					$xt->assign("op_usaha_id_mastervalue", $viewControls->showDBValue("op_usaha_id", $data, $keylink));

//	op_so - 
			$value="";

					$xt->assign("op_so_mastervalue", $viewControls->showDBValue("op_so", $data, $keylink));

//	op_kecamatan_id - 
			$value="";

					$xt->assign("op_kecamatan_id_mastervalue", $viewControls->showDBValue("op_kecamatan_id", $data, $keylink));

//	op_kelurahan_id - 
			$value="";

					$xt->assign("op_kelurahan_id_mastervalue", $viewControls->showDBValue("op_kelurahan_id", $data, $keylink));

//	op_latitude - Number
			$value="";

					$xt->assign("op_latitude_mastervalue", $viewControls->showDBValue("op_latitude", $data, $keylink));

//	op_longitude - Number
			$value="";

					$xt->assign("op_longitude_mastervalue", $viewControls->showDBValue("op_longitude", $data, $keylink));

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

//	kd_waletvolume - 
			$value="";

					$xt->assign("kd_waletvolume_mastervalue", $viewControls->showDBValue("kd_waletvolume", $data, $keylink));

//	email - 
			$value="";

					$xt->assign("email_mastervalue", $viewControls->showDBValue("email", $data, $keylink));

//	op_pajak_id - 
			$value="";

					$xt->assign("op_pajak_id_mastervalue", $viewControls->showDBValue("op_pajak_id", $data, $keylink));

//	npwpd - 
			$value="";

					$xt->assign("npwpd_mastervalue", $viewControls->showDBValue("npwpd", $data, $keylink));

//	passwd - 
			$value="";

					$xt->assign("passwd_mastervalue", $viewControls->showDBValue("passwd", $data, $keylink));

	$viewControls->addControlsJSAndCSS();
	$detailPageObj->viewControlsMap['mViewControlsMap'] = $viewControls->viewControlsMap;

	$layout = GetPageLayout("pad_pad_daftar", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("pad_pad_daftar_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>