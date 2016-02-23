<?php
include_once(getabspath("include/pad_pad_reklame_kelas_jalan_settings.php"));

function DisplayMasterTableInfo_pad_pad_reklame_kelas_jalan($params)
{
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	$detailPageObj = $params["detailPageObj"];
	global $conn,$strTableName;
	$xt = new Xtempl();
	$oldTableName = $strTableName;
	$strTableName = "pad.pad_reklame_kelas_jalan";
	
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
$layout->blocks["bare"][] = "mastergrid";$page_layouts["pad_pad_reklame_kelas_jalan_masterlist"] = $layout;


if($detailtable == "pad.pad_reklame_jalan")
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

//	nama - 
			$value="";

					$xt->assign("nama_mastervalue", $viewControls->showDBValue("nama", $data, $keylink));

//	nilai - Number
			$value="";

					$xt->assign("nilai_mastervalue", $viewControls->showDBValue("nilai", $data, $keylink));

//	update_uid - 
			$value="";

					$xt->assign("update_uid_mastervalue", $viewControls->showDBValue("update_uid", $data, $keylink));

//	create_uid - 
			$value="";

					$xt->assign("create_uid_mastervalue", $viewControls->showDBValue("create_uid", $data, $keylink));

//	updated - Short Date
			$value="";

					$xt->assign("updated_mastervalue", $viewControls->showDBValue("updated", $data, $keylink));

//	created - Short Date
			$value="";

					$xt->assign("created_mastervalue", $viewControls->showDBValue("created", $data, $keylink));

//	singkatan - 
			$value="";

					$xt->assign("singkatan_mastervalue", $viewControls->showDBValue("singkatan", $data, $keylink));

//	kriteria - 
			$value="";

					$xt->assign("kriteria_mastervalue", $viewControls->showDBValue("kriteria", $data, $keylink));

//	enabled - 
			$value="";

					$xt->assign("enabled_mastervalue", $viewControls->showDBValue("enabled", $data, $keylink));

	$viewControls->addControlsJSAndCSS();
	$detailPageObj->viewControlsMap['mViewControlsMap'] = $viewControls->viewControlsMap;

	$layout = GetPageLayout("pad_pad_reklame_kelas_jalan", 'masterlist');
	if($layout)
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->display("pad_pad_reklame_kelas_jalan_masterlist.htm");
	
	$strTableName=$oldTableName;
}

?>