<?php
include_once(getabspath("include/pad_pad_customer_settings.php"));

function DisplayMasterTableInfo_pad_pad_customer($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	$detailPageObj = $params["detailPageObj"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "pad.pad_customer";
	
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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_customer_masterlist"] = $layout;


if($detailtable == "pad.pad_spt")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable == "pad.pad_customer_usaha")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable == "pad.pad_customer_detail")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
}
if($detailtable == "pad.pad_terima")
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

//	parent - 
			$value="";

					$xt->assign("parent_mastervalue", $viewControls->showDBValue("parent", $data, $keylink));

//	npwpd - 
			$value="";

					$xt->assign("npwpd_mastervalue", $viewControls->showDBValue("npwpd", $data, $keylink));

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

//	nama - 
			$value="";

					$xt->assign("nama_mastervalue", $viewControls->showDBValue("nama", $data, $keylink));

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

//	kukuhno - 
			$value="";

					$xt->assign("kukuhno_mastervalue", $viewControls->showDBValue("kukuhno", $data, $keylink));

//	kukuhnip - 
			$value="";

					$xt->assign("kukuhnip_mastervalue", $viewControls->showDBValue("kukuhnip", $data, $keylink));

//	kukuhtgl - Short Date
			$value="";

					$xt->assign("kukuhtgl_mastervalue", $viewControls->showDBValue("kukuhtgl", $data, $keylink));

//	kukuh_jabat_id - 
			$value="";

					$xt->assign("kukuh_jabat_id_mastervalue", $viewControls->showDBValue("kukuh_jabat_id", $data, $keylink));

//	kukuhprinted - 
			$value="";

					$xt->assign("kukuhprinted_mastervalue", $viewControls->showDBValue("kukuhprinted", $data, $keylink));

//	enabled - 
			$value="";

					$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));

//	create_uid - 
			$value="";

					$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	tmt - Short Date
			$value="";

					$xt->assign("tmt_mastervalue", $viewControls->showDBValue("tmt", $data, $keylink));

//	customer_status_id - 
			$value="";

					$xt->assign("customer_status_id_mastervalue", $viewControls->showDBValue("customer_status_id", $data, $keylink));

//	kembalitgl - Short Date
			$value="";

					$xt->assign("kembalitgl_mastervalue", $viewControls->showDBValue("kembalitgl", $data, $keylink));

//	kembalioleh - 
			$value="";

					$xt->assign("kembalioleh_mastervalue", $viewControls->showDBValue("kembalioleh", $data, $keylink));

//	kartuprinted - 
			$value="";

					$xt->assign("kartuprinted_mastervalue", $viewControls->showDBValue("kartuprinted", $data, $keylink));

//	kembalinip - 
			$value="";

					$xt->assign("kembalinip_mastervalue", $viewControls->showDBValue("kembalinip", $data, $keylink));

//	penerimanm - 
			$value="";

					$xt->assign("penerimanm_mastervalue", $viewControls->showDBValue("penerimanm", $data, $keylink));

//	penerimaalamat - 
			$value="";

					$xt->assign("penerimaalamat_mastervalue", $viewControls->showDBValue("penerimaalamat", $data, $keylink));

//	penerimatgl - Short Date
			$value="";

					$xt->assign("penerimatgl_mastervalue", $viewControls->showDBValue("penerimatgl", $data, $keylink));

//	catatnip - 
			$value="";

					$xt->assign("catatnip_mastervalue", $viewControls->showDBValue("catatnip", $data, $keylink));

//	kirimtgl - Short Date
			$value="";

					$xt->assign("kirimtgl_mastervalue", $viewControls->showDBValue("kirimtgl", $data, $keylink));

//	batastgl - Short Date
			$value="";

					$xt->assign("batastgl_mastervalue", $viewControls->showDBValue("batastgl", $data, $keylink));

//	petugas_jabat_id - 
			$value="";

					$xt->assign("petugas_jabat_id_mastervalue", $viewControls->showDBValue("petugas_jabat_id", $data, $keylink));

//	pencatat_jabat_id - 
			$value="";

					$xt->assign("pencatat_jabat_id_mastervalue", $viewControls->showDBValue("pencatat_jabat_id", $data, $keylink));

//	created - Short Date
			$value="";

					$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	updated - Short Date
			$value="";

					$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	update_uid - 
			$value="";

					$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	npwpd_old - 
			$value="";

					$xt->assign("npwpd_old_mastervalue", $viewControls->showDBValue("npwpd_old", $data, $keylink));

//	id_old - 
			$value="";

					$xt->assign("id_old_mastervalue", $viewControls->showDBValue("id_old", $data, $keylink));

	$viewControls->addControlsJSAndCSS();
	$detailPageObj->viewControlsMap['mViewControlsMap'] = $viewControls->viewControlsMap;

	$layout = GetPageLayout("pad_pad_customer", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("pad_pad_customer_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>