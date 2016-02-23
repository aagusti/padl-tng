<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/pad_pad_daftar_variables.php");

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
$layout->blocks["bare"][] = "detailspreviewgrid";$page_layouts["pad_pad_daftar_detailspreview"] = $layout;


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
		$where.=" and ";
	$where .= GetFullFieldName("op_kecamatan_id", $strTableName, false)."=".make_db_value("op_kecamatan_id",$_SESSION[$strTableName."_masterkey2"]);
}
if($mastertable == "pad.pad_kelurahan")
{
	$where = "";
		$where .= GetFullFieldName("kelurahan_id", $strTableName, false)."=".make_db_value("kelurahan_id",$_SESSION[$strTableName."_masterkey1"]);
		$where.=" and ";
	$where .= GetFullFieldName("op_kelurahan_id", $strTableName, false)."=".make_db_value("op_kelurahan_id",$_SESSION[$strTableName."_masterkey2"]);
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
	//	customernm - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("customernm", $data, $keylink);
			$row["customernm_value"] = $value;
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
	//	enabled - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("enabled", $data, $keylink);
			$row["enabled_value"] = $value;
	//	create_date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("create_date", $data, $keylink);
			$row["create_date_value"] = $value;
	//	create_uid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("create_uid", $data, $keylink);
			$row["create_uid_value"] = $value;
	//	write_date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("write_date", $data, $keylink);
			$row["write_date_value"] = $value;
	//	write_uid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("write_uid", $data, $keylink);
			$row["write_uid_value"] = $value;
	//	op_nm - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("op_nm", $data, $keylink);
			$row["op_nm_value"] = $value;
	//	op_alamat - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("op_alamat", $data, $keylink);
			$row["op_alamat_value"] = $value;
	//	op_usaha_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("op_usaha_id", $data, $keylink);
			$row["op_usaha_id_value"] = $value;
	//	op_so - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("op_so", $data, $keylink);
			$row["op_so_value"] = $value;
	//	op_kecamatan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("op_kecamatan_id", $data, $keylink);
			$row["op_kecamatan_id_value"] = $value;
	//	op_kelurahan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("op_kelurahan_id", $data, $keylink);
			$row["op_kelurahan_id_value"] = $value;
	//	op_latitude - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("op_latitude", $data, $keylink);
			$row["op_latitude_value"] = $value;
	//	op_longitude - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("op_longitude", $data, $keylink);
			$row["op_longitude_value"] = $value;
	//	kd_restojmlmeja - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_restojmlmeja", $data, $keylink);
			$row["kd_restojmlmeja_value"] = $value;
	//	kd_restojmlkursi - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_restojmlkursi", $data, $keylink);
			$row["kd_restojmlkursi_value"] = $value;
	//	kd_restojmltamu - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_restojmltamu", $data, $keylink);
			$row["kd_restojmltamu_value"] = $value;
	//	kd_filmkursi - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_filmkursi", $data, $keylink);
			$row["kd_filmkursi_value"] = $value;
	//	kd_filmpertunjukan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_filmpertunjukan", $data, $keylink);
			$row["kd_filmpertunjukan_value"] = $value;
	//	kd_filmtarif - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_filmtarif", $data, $keylink);
			$row["kd_filmtarif_value"] = $value;
	//	kd_bilyarmeja - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_bilyarmeja", $data, $keylink);
			$row["kd_bilyarmeja_value"] = $value;
	//	kd_bilyartarif - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_bilyartarif", $data, $keylink);
			$row["kd_bilyartarif_value"] = $value;
	//	kd_bilyarkegiatan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_bilyarkegiatan", $data, $keylink);
			$row["kd_bilyarkegiatan_value"] = $value;
	//	kd_diskopengunjung - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_diskopengunjung", $data, $keylink);
			$row["kd_diskopengunjung_value"] = $value;
	//	kd_diskotarif - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_diskotarif", $data, $keylink);
			$row["kd_diskotarif_value"] = $value;
	//	kd_waletvolume - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kd_waletvolume", $data, $keylink);
			$row["kd_waletvolume_value"] = $value;
	//	email - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("email", $data, $keylink);
			$row["email_value"] = $value;
	//	op_pajak_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("op_pajak_id", $data, $keylink);
			$row["op_pajak_id_value"] = $value;
	//	npwpd - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("npwpd", $data, $keylink);
			$row["npwpd_value"] = $value;
	//	passwd - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("passwd", $data, $keylink);
			$row["passwd_value"] = $value;
		$rowinfo[] = $row;
		$data = $cipherer->DecryptFetchedArray($rs);
	}
	$xt->assign_loopsection("details_row",$rowinfo);
}
$returnJSON = array("success" => true);
$xt->load_template("pad_pad_daftar_detailspreview.htm");
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