<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/pad_pad_anggaran_variables.php");

$mode = postvalue("mode");

if(!isLogged())
{ 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{
	return;
}

$cipherer = new RunnerCipherer($strTableName);


include('include/xtempl.php');
$xt = new Xtempl();

$layout = new TLayout("detailspreview","RoundedGreen","MobileGreen");
$layout->blocks["bare"] = array();
$layout->containers["dcount"] = array();

$layout->containers["dcount"][] = array("name"=>"detailspreviewheader","block"=>"","substyle"=>1);


$layout->containers["dcount"][] = array("name"=>"detailspreviewdetailsfount","block"=>"","substyle"=>1);


$layout->containers["dcount"][] = array("name"=>"detailspreviewdispfirst","block"=>"display_first","substyle"=>1);


$layout->skins["dcount"] = "empty";
$layout->blocks["bare"][] = "dcount";
$layout->containers["detailspreviewgrid"] = array();

$layout->containers["detailspreviewgrid"][] = array("name"=>"detailspreviewfields","block"=>"details_data","substyle"=>1);


$layout->skins["detailspreviewgrid"] = "grid";
$layout->blocks["bare"][] = "detailspreviewgrid";$page_layouts["pad_pad_anggaran_detailspreview"] = $layout;


$recordsCounter = 0;

//	process masterkey value
$mastertable = postvalue("mastertable");
$masterKeys = my_json_decode(postvalue("masterKeys"));
if($mastertable != "")
{
	$_SESSION[$strTableName."_mastertable"]=$mastertable;
//	copy keys to session
	$i = 1;
	if(is_array($masterKeys) && count($masterKeys) > 0)
	{
		while(array_key_exists ("masterkey".$i, $masterKeys))
		{
			$_SESSION[$strTableName."_masterkey".$i] = $masterKeys["masterkey".$i];
			$i++;
		}
	}
	if(isset($_SESSION[$strTableName."_masterkey".$i]))
		unset($_SESSION[$strTableName."_masterkey".$i]);
}
else
	$mastertable = $_SESSION[$strTableName."_mastertable"];

//$strSQL = $gstrSQL;

if($mastertable == "pad.pad_rekening")
{
	$where = "";
		$where .= GetFullFieldName("rekening_id", $strTableName, false)."=".make_db_value("rekening_id",$_SESSION[$strTableName."_masterkey1"]);
}

$str = SecuritySQL("Search");
if(strlen($str))
	$where.=" and ".$str;
$strSQL = $gQuery->gSQLWhere($where);

$strSQL.=" ".$gstrOrderBy;

$rowcount = $gQuery->gSQLRowCount($where);

$xt->assign("row_count",$rowcount);
if($rowcount) {
	$xt->assign("details_data",true);
	$rs = db_query($strSQL,$conn);

	$display_count = 10;
	if($mode == "inline")
		$display_count*=2;
	if($rowcount>$display_count+2)
	{
		$xt->assign("display_first",true);
		$xt->assign("display_count",$display_count);
	}
	else
		$display_count = $rowcount;

	$rowinfo = array();
	
	$data = $cipherer->DecryptFetchedArray($rs);
	require_once getabspath('classes/controls/ViewControlsContainer.php');
	$pSet = new ProjectSettings($strTableName, PAGE_LIST);
	$viewContainer = new ViewControlsContainer($pSet, PAGE_LIST);
	while($data && $recordsCounter<$display_count) {
		$recordsCounter++;
		$row = array();
		$keylink = "";
		$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

	
	//	id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("id", $data, $keylink);
			$row["id_value"] = $value;
	//	rekening_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("rekening_id", $data, $keylink);
			$row["rekening_id_value"] = $value;
	//	status_anggaran - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("status_anggaran", $data, $keylink);
			$row["status_anggaran_value"] = $value;
	//	target - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("target", $data, $keylink);
			$row["target_value"] = $value;
	//	bulan1 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan1", $data, $keylink);
			$row["bulan1_value"] = $value;
	//	bulan2 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan2", $data, $keylink);
			$row["bulan2_value"] = $value;
	//	bulan3 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan3", $data, $keylink);
			$row["bulan3_value"] = $value;
	//	bulan4 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan4", $data, $keylink);
			$row["bulan4_value"] = $value;
	//	bulan5 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan5", $data, $keylink);
			$row["bulan5_value"] = $value;
	//	bulan6 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan6", $data, $keylink);
			$row["bulan6_value"] = $value;
	//	bulan7 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan7", $data, $keylink);
			$row["bulan7_value"] = $value;
	//	bulan8 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan8", $data, $keylink);
			$row["bulan8_value"] = $value;
	//	bulan9 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan9", $data, $keylink);
			$row["bulan9_value"] = $value;
	//	bulan10 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan10", $data, $keylink);
			$row["bulan10_value"] = $value;
	//	bulan11 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan11", $data, $keylink);
			$row["bulan11_value"] = $value;
	//	bulan12 - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bulan12", $data, $keylink);
			$row["bulan12_value"] = $value;
	//	jumlah - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("jumlah", $data, $keylink);
			$row["jumlah_value"] = $value;
	//	created - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("created", $data, $keylink);
			$row["created_value"] = $value;
	//	updated - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("updated", $data, $keylink);
			$row["updated_value"] = $value;
	//	create_uid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("create_uid", $data, $keylink);
			$row["create_uid_value"] = $value;
	//	update_uid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("update_uid", $data, $keylink);
			$row["update_uid_value"] = $value;
	//	tahun - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("tahun", $data, $keylink);
			$row["tahun_value"] = $value;
		$rowinfo[] = $row;
		$data = $cipherer->DecryptFetchedArray($rs);
	}
	$xt->assign_loopsection("details_row",$rowinfo);
}
$returnJSON = array("success" => true);
$xt->load_template("pad_pad_anggaran_detailspreview.htm");
$returnJSON["body"] = $xt->fetch_loaded();

if($mode!="inline"){
	$returnJSON["counter"] = postvalue("counter");
	$layout = GetPageLayout(GoodFieldName($strTableName), 'detailspreview');
	if($layout)
	{
		$rtl = $xt->getReadingOrder() == 'RTL' ? 'RTL' : '';
		$returnJSON["style"] = "styles/".$layout->style."/style".$rtl.".css";
		$returnJSON["pageStyle"] = "pagestyles/".$layout->name.$rtl.".css";
		$returnJSON["layout"] = $layout->style." page-".$layout->name.".css";
	}	
}	

echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
?>