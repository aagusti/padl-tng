<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/pad_pad_customer_variables.php");

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
$layout->blocks["bare"][] = "detailspreviewgrid";$page_layouts["pad_pad_customer_detailspreview"] = $layout;


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

if($mastertable == "pad.pad_kecamatan")
{
	$where = "";
		$where .= GetFullFieldName("kecamatan_id", $strTableName, false)."=".make_db_value("kecamatan_id",$_SESSION[$strTableName."_masterkey1"]);
}
if($mastertable == "pad.pad_kelurahan")
{
	$where = "";
		$where .= GetFullFieldName("kelurahan_id", $strTableName, false)."=".make_db_value("kelurahan_id",$_SESSION[$strTableName."_masterkey1"]);
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
	//	parent - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parent", $data, $keylink);
			$row["parent_value"] = $value;
	//	npwpd - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("npwpd", $data, $keylink);
			$row["npwpd_value"] = $value;
	//	rp - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("rp", $data, $keylink);
			$row["rp_value"] = $value;
	//	pb - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pb", $data, $keylink);
			$row["pb_value"] = $value;
	//	formno - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("formno", $data, $keylink);
			$row["formno_value"] = $value;
	//	reg_date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("reg_date", $data, $keylink);
			$row["reg_date_value"] = $value;
	//	nama - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("nama", $data, $keylink);
			$row["nama_value"] = $value;
	//	kecamatan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kecamatan_id", $data, $keylink);
			$row["kecamatan_id_value"] = $value;
	//	kelurahan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kelurahan_id", $data, $keylink);
			$row["kelurahan_id_value"] = $value;
	//	kabupaten - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kabupaten", $data, $keylink);
			$row["kabupaten_value"] = $value;
	//	alamat - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("alamat", $data, $keylink);
			$row["alamat_value"] = $value;
	//	kodepos - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kodepos", $data, $keylink);
			$row["kodepos_value"] = $value;
	//	telphone - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("telphone", $data, $keylink);
			$row["telphone_value"] = $value;
	//	wpnama - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("wpnama", $data, $keylink);
			$row["wpnama_value"] = $value;
	//	wpalamat - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("wpalamat", $data, $keylink);
			$row["wpalamat_value"] = $value;
	//	wpkelurahan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("wpkelurahan", $data, $keylink);
			$row["wpkelurahan_value"] = $value;
	//	wpkecamatan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("wpkecamatan", $data, $keylink);
			$row["wpkecamatan_value"] = $value;
	//	wpkabupaten - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("wpkabupaten", $data, $keylink);
			$row["wpkabupaten_value"] = $value;
	//	wptelp - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("wptelp", $data, $keylink);
			$row["wptelp_value"] = $value;
	//	wpkodepos - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("wpkodepos", $data, $keylink);
			$row["wpkodepos_value"] = $value;
	//	pnama - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pnama", $data, $keylink);
			$row["pnama_value"] = $value;
	//	palamat - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("palamat", $data, $keylink);
			$row["palamat_value"] = $value;
	//	pkelurahan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pkelurahan", $data, $keylink);
			$row["pkelurahan_value"] = $value;
	//	pkecamatan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pkecamatan", $data, $keylink);
			$row["pkecamatan_value"] = $value;
	//	pkabupaten - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pkabupaten", $data, $keylink);
			$row["pkabupaten_value"] = $value;
	//	ptelp - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ptelp", $data, $keylink);
			$row["ptelp_value"] = $value;
	//	pkodepos - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pkodepos", $data, $keylink);
			$row["pkodepos_value"] = $value;
	//	ijin1 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin1", $data, $keylink);
			$row["ijin1_value"] = $value;
	//	ijin1no - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin1no", $data, $keylink);
			$row["ijin1no_value"] = $value;
	//	ijin1tgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin1tgl", $data, $keylink);
			$row["ijin1tgl_value"] = $value;
	//	ijin1tglakhir - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin1tglakhir", $data, $keylink);
			$row["ijin1tglakhir_value"] = $value;
	//	ijin2 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin2", $data, $keylink);
			$row["ijin2_value"] = $value;
	//	ijin2no - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin2no", $data, $keylink);
			$row["ijin2no_value"] = $value;
	//	ijin2tgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin2tgl", $data, $keylink);
			$row["ijin2tgl_value"] = $value;
	//	ijin2tglakhir - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin2tglakhir", $data, $keylink);
			$row["ijin2tglakhir_value"] = $value;
	//	ijin3 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin3", $data, $keylink);
			$row["ijin3_value"] = $value;
	//	ijin3no - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin3no", $data, $keylink);
			$row["ijin3no_value"] = $value;
	//	ijin3tgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin3tgl", $data, $keylink);
			$row["ijin3tgl_value"] = $value;
	//	ijin3tglakhir - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin3tglakhir", $data, $keylink);
			$row["ijin3tglakhir_value"] = $value;
	//	ijin4 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin4", $data, $keylink);
			$row["ijin4_value"] = $value;
	//	ijin4no - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin4no", $data, $keylink);
			$row["ijin4no_value"] = $value;
	//	ijin4tgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin4tgl", $data, $keylink);
			$row["ijin4tgl_value"] = $value;
	//	ijin4tglakhir - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ijin4tglakhir", $data, $keylink);
			$row["ijin4tglakhir_value"] = $value;
	//	kukuhno - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kukuhno", $data, $keylink);
			$row["kukuhno_value"] = $value;
	//	kukuhnip - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kukuhnip", $data, $keylink);
			$row["kukuhnip_value"] = $value;
	//	kukuhtgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kukuhtgl", $data, $keylink);
			$row["kukuhtgl_value"] = $value;
	//	kukuh_jabat_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kukuh_jabat_id", $data, $keylink);
			$row["kukuh_jabat_id_value"] = $value;
	//	kukuhprinted - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kukuhprinted", $data, $keylink);
			$row["kukuhprinted_value"] = $value;
	//	enabled - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("enabled", $data, $keylink);
			$row["enabled_value"] = $value;
	//	create_uid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("create_uid", $data, $keylink);
			$row["create_uid_value"] = $value;
	//	tmt - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("tmt", $data, $keylink);
			$row["tmt_value"] = $value;
	//	customer_status_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("customer_status_id", $data, $keylink);
			$row["customer_status_id_value"] = $value;
	//	kembalitgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kembalitgl", $data, $keylink);
			$row["kembalitgl_value"] = $value;
	//	kembalioleh - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kembalioleh", $data, $keylink);
			$row["kembalioleh_value"] = $value;
	//	kartuprinted - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kartuprinted", $data, $keylink);
			$row["kartuprinted_value"] = $value;
	//	kembalinip - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kembalinip", $data, $keylink);
			$row["kembalinip_value"] = $value;
	//	penerimanm - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("penerimanm", $data, $keylink);
			$row["penerimanm_value"] = $value;
	//	penerimaalamat - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("penerimaalamat", $data, $keylink);
			$row["penerimaalamat_value"] = $value;
	//	penerimatgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("penerimatgl", $data, $keylink);
			$row["penerimatgl_value"] = $value;
	//	catatnip - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("catatnip", $data, $keylink);
			$row["catatnip_value"] = $value;
	//	kirimtgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kirimtgl", $data, $keylink);
			$row["kirimtgl_value"] = $value;
	//	batastgl - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("batastgl", $data, $keylink);
			$row["batastgl_value"] = $value;
	//	petugas_jabat_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("petugas_jabat_id", $data, $keylink);
			$row["petugas_jabat_id_value"] = $value;
	//	pencatat_jabat_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pencatat_jabat_id", $data, $keylink);
			$row["pencatat_jabat_id_value"] = $value;
	//	created - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("created", $data, $keylink);
			$row["created_value"] = $value;
	//	updated - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("updated", $data, $keylink);
			$row["updated_value"] = $value;
	//	update_uid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("update_uid", $data, $keylink);
			$row["update_uid_value"] = $value;
	//	npwpd_old - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("npwpd_old", $data, $keylink);
			$row["npwpd_old_value"] = $value;
	//	id_old - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("id_old", $data, $keylink);
			$row["id_old_value"] = $value;
		$rowinfo[] = $row;
		$data = $cipherer->DecryptFetchedArray($rs);
	}
	$xt->assign_loopsection("details_row",$rowinfo);
}
$returnJSON = array("success" => true);
$xt->load_template("pad_pad_customer_detailspreview.htm");
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