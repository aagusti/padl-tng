<?php
include_once(getabspath("include/app_users_settings.php"));

function DisplayMasterTableInfo_app_users($params)
{
	$detailtable=$params["detailtable"];
	$keys=$params["keys"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	
	$oldTableName=$strTableName;
	$strTableName="app.users";

//$strSQL = "SELECT userid,   nama,   created,   disabled,   passwd,   id,   kd_kantor,   kd_kanwil,   kd_tp,   kd_kanwil_bank,   kd_kppbb_bank,   kd_bank_tunggal,   kd_bank_persepsi,   nip,   jabatan,   handphone,   create_uid,   update_uid,   updated,   last_login,   is_login,   is_logout,   last_ip  FROM app.users ";

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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["app_users_masterprint"] = $layout;


$showKeys = "";
if($detailtable=="app.user_groups")
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
	

//	userid - 
			$xt->assign("userid_mastervalue", $viewControls->showDBValue("userid", $data, $keylink));

//	nama - 
			$xt->assign("nama_mastervalue", $viewControls->showDBValue("nama", $data, $keylink));

//	created - Short Date
			$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	disabled - 
			$xt->assign("disabled_mastervalue", $viewControls->showDBValue("disabled", $data, $keylink));

//	passwd - 
			$xt->assign("passwd_mastervalue", $viewControls->showDBValue("passwd", $data, $keylink));

//	id - 
			$xt->assign("id_mastervalue", $viewControls->showDBValue("id", $data, $keylink));

//	kd_kantor - 
			$xt->assign("kd_kantor_mastervalue", $viewControls->showDBValue("kd_kantor", $data, $keylink));

//	kd_kanwil - 
			$xt->assign("kd_kanwil_mastervalue", $viewControls->showDBValue("kd_kanwil", $data, $keylink));

//	kd_tp - 
			$xt->assign("kd_tp_mastervalue", $viewControls->showDBValue("kd_tp", $data, $keylink));

//	kd_kanwil_bank - 
			$xt->assign("kd_kanwil_bank_mastervalue", $viewControls->showDBValue("kd_kanwil_bank", $data, $keylink));

//	kd_kppbb_bank - 
			$xt->assign("kd_kppbb_bank_mastervalue", $viewControls->showDBValue("kd_kppbb_bank", $data, $keylink));

//	kd_bank_tunggal - 
			$xt->assign("kd_bank_tunggal_mastervalue", $viewControls->showDBValue("kd_bank_tunggal", $data, $keylink));

//	kd_bank_persepsi - 
			$xt->assign("kd_bank_persepsi_mastervalue", $viewControls->showDBValue("kd_bank_persepsi", $data, $keylink));

//	nip - 
			$xt->assign("nip_mastervalue", $viewControls->showDBValue("nip", $data, $keylink));

//	jabatan - 
			$xt->assign("jabatan_mastervalue", $viewControls->showDBValue("jabatan", $data, $keylink));

//	handphone - 
			$xt->assign("handphone_mastervalue", $viewControls->showDBValue("handphone", $data, $keylink));

//	create_uid - 
			$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	update_uid - 
			$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	updated - Short Date
			$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	last_login - Short Date
			$xt->assign("last_login_mastervalue", $viewControls->showDBValue("last_login", $data, $keylink));

//	is_login - 
			$xt->assign("is_login_mastervalue", $viewControls->showDBValue("is_login", $data, $keylink));

//	is_logout - 
			$xt->assign("is_logout_mastervalue", $viewControls->showDBValue("is_logout", $data, $keylink));

//	last_ip - 
			$xt->assign("last_ip_mastervalue", $viewControls->showDBValue("last_ip", $data, $keylink));
	$xt->display("app_users_masterprint.htm");
	$strTableName=$oldTableName;

}

?>