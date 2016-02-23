<?php
include_once(getabspath("include/pad_pad_reklame_kelas_jalan_settings.php"));

function DisplayMasterTableInfo_pad_pad_reklame_kelas_jalan($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="pad.pad_reklame_kelas_jalan";

//$strSQL = "SELECT id,   nama,   nilai,   update_uid,   create_uid,   updated,   created,   singkatan,   kriteria,   enabled  FROM \"pad\".pad_reklame_kelas_jalan ";

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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_reklame_kelas_jalan_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="pad.pad_reklame_jalan")
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

//	nama - 
			$xt->assign("nama_mastervalue", $viewControls->showDBValue("nama", $data, $keylink));

//	nilai - Number
			$xt->assign("nilai_mastervalue", $viewControls->showDBValue("nilai", $data, $keylink));

//	update_uid - 
			$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	create_uid - 
			$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	updated - Short Date
			$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	created - Short Date
			$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	singkatan - 
			$xt->assign("singkatan_mastervalue", $viewControls->showDBValue("singkatan", $data, $keylink));

//	kriteria - 
			$xt->assign("kriteria_mastervalue", $viewControls->showDBValue("kriteria", $data, $keylink));

//	enabled - 
			$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));
	$xt->display("pad_pad_reklame_kelas_jalan_masterprint.htm");
	$strTableName=$oldTableName;

}

?>