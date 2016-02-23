<?php
include_once(getabspath("include/pad_pad_customer_settings.php"));

function DisplayMasterTableInfo_pad_pad_customer($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="pad.pad_customer";

//$strSQL = "SELECT id,   parent,   npwpd,   rp,   pb,   formno,   reg_date,   nama,   kecamatan_id,   kelurahan_id,   kabupaten,   alamat,   kodepos,   telphone,   wpnama,   wpalamat,   wpkelurahan,   wpkecamatan,   wpkabupaten,   wptelp,   wpkodepos,   pnama,   palamat,   pkelurahan,   pkecamatan,   pkabupaten,   ptelp,   pkodepos,   ijin1,   ijin1no,   ijin1tgl,   ijin1tglakhir,   ijin2,   ijin2no,   ijin2tgl,   ijin2tglakhir,   ijin3,   ijin3no,   ijin3tgl,   ijin3tglakhir,   ijin4,   ijin4no,   ijin4tgl,   ijin4tglakhir,   kukuhno,   kukuhnip,   kukuhtgl,   kukuh_jabat_id,   kukuhprinted,   enabled,   create_uid,   tmt,   customer_status_id,   kembalitgl,   kembalioleh,   kartuprinted,   kembalinip,   penerimanm,   penerimaalamat,   penerimatgl,   catatnip,   kirimtgl,   batastgl,   petugas_jabat_id,   pencatat_jabat_id,   created,   updated,   update_uid,   npwpd_old,   id_old  FROM \"pad\".pad_customer ";

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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_customer_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="pad.pad_spt")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="pad.pad_customer_usaha")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="pad.pad_customer_detail")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="pad.pad_terima")
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

//	parent - 
			$xt->assign("parent_mastervalue", $viewControls->showDBValue("parent", $data, $keylink));

//	npwpd - 
			$xt->assign("npwpd_mastervalue", $viewControls->showDBValue("npwpd", $data, $keylink));

//	rp - 
			$xt->assign("rp_mastervalue", $viewControls->showDBValue("rp", $data, $keylink));

//	pb - 
			$xt->assign("pb_mastervalue", $viewControls->showDBValue("pb", $data, $keylink));

//	formno - 
			$xt->assign("formno_mastervalue", $viewControls->showDBValue("formno", $data, $keylink));

//	reg_date - Short Date
			$xt->assign("reg_date_mastervalue", $viewControls->showDBValue("reg_date", $data, $keylink));

//	nama - 
			$xt->assign("nama_mastervalue", $viewControls->showDBValue("nama", $data, $keylink));

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

//	kukuhno - 
			$xt->assign("kukuhno_mastervalue", $viewControls->showDBValue("kukuhno", $data, $keylink));

//	kukuhnip - 
			$xt->assign("kukuhnip_mastervalue", $viewControls->showDBValue("kukuhnip", $data, $keylink));

//	kukuhtgl - Short Date
			$xt->assign("kukuhtgl_mastervalue", $viewControls->showDBValue("kukuhtgl", $data, $keylink));

//	kukuh_jabat_id - 
			$xt->assign("kukuh_jabat_id_mastervalue", $viewControls->showDBValue("kukuh_jabat_id", $data, $keylink));

//	kukuhprinted - 
			$xt->assign("kukuhprinted_mastervalue", $viewControls->showDBValue("kukuhprinted", $data, $keylink));

//	enabled - 
			$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));

//	create_uid - 
			$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	tmt - Short Date
			$xt->assign("tmt_mastervalue", $viewControls->showDBValue("tmt", $data, $keylink));

//	customer_status_id - 
			$xt->assign("customer_status_id_mastervalue", $viewControls->showDBValue("customer_status_id", $data, $keylink));

//	kembalitgl - Short Date
			$xt->assign("kembalitgl_mastervalue", $viewControls->showDBValue("kembalitgl", $data, $keylink));

//	kembalioleh - 
			$xt->assign("kembalioleh_mastervalue", $viewControls->showDBValue("kembalioleh", $data, $keylink));

//	kartuprinted - 
			$xt->assign("kartuprinted_mastervalue", $viewControls->showDBValue("kartuprinted", $data, $keylink));

//	kembalinip - 
			$xt->assign("kembalinip_mastervalue", $viewControls->showDBValue("kembalinip", $data, $keylink));

//	penerimanm - 
			$xt->assign("penerimanm_mastervalue", $viewControls->showDBValue("penerimanm", $data, $keylink));

//	penerimaalamat - 
			$xt->assign("penerimaalamat_mastervalue", $viewControls->showDBValue("penerimaalamat", $data, $keylink));

//	penerimatgl - Short Date
			$xt->assign("penerimatgl_mastervalue", $viewControls->showDBValue("penerimatgl", $data, $keylink));

//	catatnip - 
			$xt->assign("catatnip_mastervalue", $viewControls->showDBValue("catatnip", $data, $keylink));

//	kirimtgl - Short Date
			$xt->assign("kirimtgl_mastervalue", $viewControls->showDBValue("kirimtgl", $data, $keylink));

//	batastgl - Short Date
			$xt->assign("batastgl_mastervalue", $viewControls->showDBValue("batastgl", $data, $keylink));

//	petugas_jabat_id - 
			$xt->assign("petugas_jabat_id_mastervalue", $viewControls->showDBValue("petugas_jabat_id", $data, $keylink));

//	pencatat_jabat_id - 
			$xt->assign("pencatat_jabat_id_mastervalue", $viewControls->showDBValue("pencatat_jabat_id", $data, $keylink));

//	created - Short Date
			$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	updated - Short Date
			$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	update_uid - 
			$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	npwpd_old - 
			$xt->assign("npwpd_old_mastervalue", $viewControls->showDBValue("npwpd_old", $data, $keylink));

//	id_old - 
			$xt->assign("id_old_mastervalue", $viewControls->showDBValue("id_old", $data, $keylink));
	$xt->display("pad_pad_customer_masterprint.htm");
	$strTableName=$oldTableName;

}

?>