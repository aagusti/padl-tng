<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/public_pad_payment_variables.php");

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
$layout->blocks["bare"][] = "detailspreviewgrid";$page_layouts["public_pad_payment_detailspreview"] = $layout;


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

if($mastertable == "pad.pad_sspd")
{
	$where = "";
		$where .= GetFullFieldName("id", $strTableName, false)."=".make_db_value("id",$_SESSION[$strTableName."_masterkey1"]);
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
	//	invoice_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("invoice_id", $data, $keylink);
			$row["invoice_id_value"] = $value;
	//	tgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("tgl", $data, $keylink);
			$row["tgl_value"] = $value;
	//	tagihan - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("tagihan", $data, $keylink);
			$row["tagihan_value"] = $value;
	//	denda - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("denda", $data, $keylink);
			$row["denda_value"] = $value;
	//	total_bayar - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("total_bayar", $data, $keylink);
			$row["total_bayar_value"] = $value;
	//	iso_request - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("iso_request", $data, $keylink);
			$row["iso_request_value"] = $value;
	//	transmission - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("transmission", $data, $keylink);
			$row["transmission_value"] = $value;
	//	settlement - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("settlement", $data, $keylink);
			$row["settlement_value"] = $value;
	//	stan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("stan", $data, $keylink);
			$row["stan_value"] = $value;
	//	ntb - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ntb", $data, $keylink);
			$row["ntb_value"] = $value;
	//	ntp - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ntp", $data, $keylink);
			$row["ntp_value"] = $value;
	//	bank_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bank_id", $data, $keylink);
			$row["bank_id_value"] = $value;
	//	channel_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("channel_id", $data, $keylink);
			$row["channel_id_value"] = $value;
	//	bank_ip - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bank_ip", $data, $keylink);
			$row["bank_ip_value"] = $value;
		$rowinfo[] = $row;
		$data = $cipherer->DecryptFetchedArray($rs);
	}
	$xt->assign_loopsection("details_row",$rowinfo);
}
$returnJSON = array("success" => true);
$xt->load_template("public_pad_payment_detailspreview.htm");
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