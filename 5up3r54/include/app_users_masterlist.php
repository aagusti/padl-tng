<?php
include_once(getabspath("include/app_users_settings.php"));

function DisplayMasterTableInfo_app_users($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	$detailPageObj = $params["detailPageObj"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "app.users";
	
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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["app_users_masterlist"] = $layout;


if($detailtable == "app.user_groups")
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
	

//	userid - 
			$value="";

					$xt->assign("userid_mastervalue", $viewControls->showDBValue("userid", $data, $keylink));

//	nama - 
			$value="";

					$xt->assign("nama_mastervalue", $viewControls->showDBValue("nama", $data, $keylink));

//	created - Short Date
			$value="";

					$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	disabled - 
			$value="";

					$xt->assign("disabled_mastervalue", $viewControls->showDBValue("disabled", $data, $keylink));

//	passwd - 
			$value="";

					$xt->assign("passwd_mastervalue", $viewControls->showDBValue("passwd", $data, $keylink));

//	id - 
			$value="";

					$xt->assign("id_mastervalue", $viewControls->showDBValue("id", $data, $keylink));

//	kd_kantor - 
			$value="";

					$xt->assign("kd_kantor_mastervalue", $viewControls->showDBValue("kd_kantor", $data, $keylink));

//	kd_kanwil - 
			$value="";

					$xt->assign("kd_kanwil_mastervalue", $viewControls->showDBValue("kd_kanwil", $data, $keylink));

//	kd_tp - 
			$value="";

					$xt->assign("kd_tp_mastervalue", $viewControls->showDBValue("kd_tp", $data, $keylink));

//	kd_kanwil_bank - 
			$value="";

					$xt->assign("kd_kanwil_bank_mastervalue", $viewControls->showDBValue("kd_kanwil_bank", $data, $keylink));

//	kd_kppbb_bank - 
			$value="";

					$xt->assign("kd_kppbb_bank_mastervalue", $viewControls->showDBValue("kd_kppbb_bank", $data, $keylink));

//	kd_bank_tunggal - 
			$value="";

					$xt->assign("kd_bank_tunggal_mastervalue", $viewControls->showDBValue("kd_bank_tunggal", $data, $keylink));

//	kd_bank_persepsi - 
			$value="";

					$xt->assign("kd_bank_persepsi_mastervalue", $viewControls->showDBValue("kd_bank_persepsi", $data, $keylink));

//	nip - 
			$value="";

					$xt->assign("nip_mastervalue", $viewControls->showDBValue("nip", $data, $keylink));

//	jabatan - 
			$value="";

					$xt->assign("jabatan_mastervalue", $viewControls->showDBValue("jabatan", $data, $keylink));

//	handphone - 
			$value="";

					$xt->assign("handphone_mastervalue", $viewControls->showDBValue("handphone", $data, $keylink));

//	create_uid - 
			$value="";

					$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	update_uid - 
			$value="";

					$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	updated - Short Date
			$value="";

					$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	last_login - Short Date
			$value="";

					$xt->assign("last_login_mastervalue", $viewControls->showDBValue("last_login", $data, $keylink));

//	is_login - 
			$value="";

					$xt->assign("is_login_mastervalue", $viewControls->showDBValue("is_login", $data, $keylink));

//	is_logout - 
			$value="";

					$xt->assign("is_logout_mastervalue", $viewControls->showDBValue("is_logout", $data, $keylink));

//	last_ip - 
			$value="";

					$xt->assign("last_ip_mastervalue", $viewControls->showDBValue("last_ip", $data, $keylink));

	$viewControls->addControlsJSAndCSS();
	$detailPageObj->viewControlsMap['mViewControlsMap'] = $viewControls->viewControlsMap;

	$layout = GetPageLayout("app_users", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("app_users_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>