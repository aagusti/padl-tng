<?php
include_once(getabspath("include/pad_pad_jenis_pajak_settings.php"));

function DisplayMasterTableInfo_pad_pad_jenis_pajak($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="pad.pad_jenis_pajak";

//$strSQL = "SELECT id,   usaha_id,   nama,   rekening_id,   rekening_kd_sub,   rekdenda_id,   masapajak,   jatuhtempo,   multiple,   jalan_kelas_id,   tmt,   enabled,   created,   create_uid,   updated,   update_uid  FROM \"pad\".pad_jenis_pajak ";

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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_jenis_pajak_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="pad.pad_spt")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="pad.pad_tarif_pajak")
{
		$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[1-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[1-1];
		$where.=" and ";
	$showKeys .=" , ";
	$where.= GetFullFieldName("id", "", false)."=".$cipherer->MakeDBValue("id",$keys[2-1], "", "", true);
	$showKeys .= " "."Id".": ".$keys[2-1];
	$xt->assign('showKeys',$showKeys);
	
}
if($detailtable=="pad.pad_terima_line")
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

//	usaha_id - 
			$xt->assign("usaha_id_mastervalue", $viewControls->showDBValue("usaha_id", $data, $keylink));

//	nama - 
			$xt->assign("nama_mastervalue", $viewControls->showDBValue("nama", $data, $keylink));

//	rekening_id - 
			$xt->assign("rekening_id_mastervalue", $viewControls->showDBValue("rekening_id", $data, $keylink));

//	rekening_kd_sub - 
			$xt->assign("rekening_kd_sub_mastervalue", $viewControls->showDBValue("rekening_kd_sub", $data, $keylink));

//	rekdenda_id - 
			$xt->assign("rekdenda_id_mastervalue", $viewControls->showDBValue("rekdenda_id", $data, $keylink));

//	masapajak - 
			$xt->assign("masapajak_mastervalue", $viewControls->showDBValue("masapajak", $data, $keylink));

//	jatuhtempo - 
			$xt->assign("jatuhtempo_mastervalue", $viewControls->showDBValue("jatuhtempo", $data, $keylink));

//	multiple - 
			$xt->assign("multiple_mastervalue", $viewControls->showDBValue("multiple", $data, $keylink));

//	jalan_kelas_id - 
			$xt->assign("jalan_kelas_id_mastervalue", $viewControls->showDBValue("jalan_kelas_id", $data, $keylink));

//	tmt - Short Date
			$xt->assign("tmt_mastervalue", $viewControls->showDBValue("tmt", $data, $keylink));

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
	$xt->display("pad_pad_jenis_pajak_masterprint.htm");
	$strTableName=$oldTableName;

}

?>