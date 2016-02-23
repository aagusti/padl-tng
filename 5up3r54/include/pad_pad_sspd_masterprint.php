<?php
include_once(getabspath("include/pad_pad_sspd_settings.php"));

function DisplayMasterTableInfo_pad_pad_sspd($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="pad.pad_sspd";

//$strSQL = "SELECT id,   tahun,   sspdno,   sspdtgl,   sspdjam,   invoice_id,   keterangan,   bulan_telat,   hitung_bunga,   denda,   bunga,   jml_bayar,   sisa,   jenis_bayar,   printed,   tp_id,   is_validated,   is_valid,   enabled,   created,   create_uid,   updated,   update_uid,   petugas_id,   pejabat_id  FROM \"pad\".pad_sspd ";

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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_sspd_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="public.pad_payment")
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

//	sspdno - 
			$xt->assign("sspdno_mastervalue", $viewControls->showDBValue("sspdno", $data, $keylink));

//	sspdtgl - Short Date
			$xt->assign("sspdtgl_mastervalue", $viewControls->showDBValue("sspdtgl", $data, $keylink));

//	sspdjam - Time
			$xt->assign("sspdjam_mastervalue", $viewControls->showDBValue("sspdjam", $data, $keylink));

//	invoice_id - 
			$xt->assign("invoice_id_mastervalue", $viewControls->showDBValue("invoice_id", $data, $keylink));

//	keterangan - 
			$xt->assign("keterangan_mastervalue", $viewControls->showDBValue("keterangan", $data, $keylink));

//	bulan_telat - 
			$xt->assign("bulan_telat_mastervalue", $viewControls->showDBValue("bulan_telat", $data, $keylink));

//	hitung_bunga - 
			$xt->assign("hitung_bunga_mastervalue", $viewControls->showDBValue("hitung_bunga", $data, $keylink));

//	denda - Number
			$xt->assign("denda_mastervalue", $viewControls->showDBValue("denda", $data, $keylink));

//	bunga - Number
			$xt->assign("bunga_mastervalue", $viewControls->showDBValue("bunga", $data, $keylink));

//	jml_bayar - 
			$xt->assign("jml_bayar_mastervalue", $viewControls->showDBValue("jml_bayar", $data, $keylink));

//	sisa - Number
			$xt->assign("sisa_mastervalue", $viewControls->showDBValue("sisa", $data, $keylink));

//	jenis_bayar - 
			$xt->assign("jenis_bayar_mastervalue", $viewControls->showDBValue("jenis_bayar", $data, $keylink));

//	printed - 
			$xt->assign("printed_mastervalue", $viewControls->showDBValue("printed", $data, $keylink));

//	tp_id - 
			$xt->assign("tp_id_mastervalue", $viewControls->showDBValue("tp_id", $data, $keylink));

//	is_validated - 
			$xt->assign("is_validated_mastervalue", $viewControls->showDBValue("is_validated", $data, $keylink));

//	is_valid - 
			$xt->assign("is_valid_mastervalue", $viewControls->showDBValue("is_valid", $data, $keylink));

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

//	petugas_id - 
			$xt->assign("petugas_id_mastervalue", $viewControls->showDBValue("petugas_id", $data, $keylink));

//	pejabat_id - 
			$xt->assign("pejabat_id_mastervalue", $viewControls->showDBValue("pejabat_id", $data, $keylink));
	$xt->display("pad_pad_sspd_masterprint.htm");
	$strTableName=$oldTableName;

}

?>