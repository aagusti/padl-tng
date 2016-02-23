<?php
include_once(getabspath("include/pad_pad_sspd_settings.php"));

function DisplayMasterTableInfo_pad_pad_sspd($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	$detailPageObj = $params["detailPageObj"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "pad.pad_sspd";
	
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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_sspd_masterlist"] = $layout;


if($detailtable == "public.pad_payment")
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

//	sspdno - 
			$value="";

					$xt->assign("sspdno_mastervalue", $viewControls->showDBValue("sspdno", $data, $keylink));

//	sspdtgl - Short Date
			$value="";

					$xt->assign("sspdtgl_mastervalue", $viewControls->showDBValue("sspdtgl", $data, $keylink));

//	sspdjam - Time
			$value="";

					$xt->assign("sspdjam_mastervalue", $viewControls->showDBValue("sspdjam", $data, $keylink));

//	invoice_id - 
			$value="";

					$xt->assign("invoice_id_mastervalue", $viewControls->showDBValue("invoice_id", $data, $keylink));

//	keterangan - 
			$value="";

					$xt->assign("keterangan_mastervalue", $viewControls->showDBValue("keterangan", $data, $keylink));

//	bulan_telat - 
			$value="";

					$xt->assign("bulan_telat_mastervalue", $viewControls->showDBValue("bulan_telat", $data, $keylink));

//	hitung_bunga - 
			$value="";

					$xt->assign("hitung_bunga_mastervalue", $viewControls->showDBValue("hitung_bunga", $data, $keylink));

//	denda - Number
			$value="";

					$xt->assign("denda_mastervalue", $viewControls->showDBValue("denda", $data, $keylink));

//	bunga - Number
			$value="";

					$xt->assign("bunga_mastervalue", $viewControls->showDBValue("bunga", $data, $keylink));

//	jml_bayar - 
			$value="";

					$xt->assign("jml_bayar_mastervalue", $viewControls->showDBValue("jml_bayar", $data, $keylink));

//	sisa - Number
			$value="";

					$xt->assign("sisa_mastervalue", $viewControls->showDBValue("sisa", $data, $keylink));

//	jenis_bayar - 
			$value="";

					$xt->assign("jenis_bayar_mastervalue", $viewControls->showDBValue("jenis_bayar", $data, $keylink));

//	printed - 
			$value="";

					$xt->assign("printed_mastervalue", $viewControls->showDBValue("printed", $data, $keylink));

//	tp_id - 
			$value="";

					$xt->assign("tp_id_mastervalue", $viewControls->showDBValue("tp_id", $data, $keylink));

//	is_validated - 
			$value="";

					$xt->assign("is_validated_mastervalue", $viewControls->showDBValue("is_validated", $data, $keylink));

//	is_valid - 
			$value="";

					$xt->assign("is_valid_mastervalue", $viewControls->showDBValue("is_valid", $data, $keylink));

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

//	petugas_id - 
			$value="";

					$xt->assign("petugas_id_mastervalue", $viewControls->showDBValue("petugas_id", $data, $keylink));

//	pejabat_id - 
			$value="";

					$xt->assign("pejabat_id_mastervalue", $viewControls->showDBValue("pejabat_id", $data, $keylink));

	$viewControls->addControlsJSAndCSS();
	$detailPageObj->viewControlsMap['mViewControlsMap'] = $viewControls->viewControlsMap;

	$layout = GetPageLayout("pad_pad_sspd", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("pad_pad_sspd_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>