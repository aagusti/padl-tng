<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/pad_pad_customer_usaha_variables.php");

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
$layout->blocks["bare"][] = "detailspreviewgrid";$page_layouts["pad_pad_customer_usaha_detailspreview"] = $layout;


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

if($mastertable == "pad.pad_customer")
{
	$where = "";
		$where .= GetFullFieldName("customer_id", $strTableName, false)."=".make_db_value("customer_id",$_SESSION[$strTableName."_masterkey1"]);
}
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
if($mastertable == "pad.pad_usaha")
{
	$where = "";
		$where .= GetFullFieldName("usaha_id", $strTableName, false)."=".make_db_value("usaha_id",$_SESSION[$strTableName."_masterkey1"]);
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
	//	konterid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("konterid", $data, $keylink);
			$row["konterid_value"] = $value;
	//	reg_date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("reg_date", $data, $keylink);
			$row["reg_date_value"] = $value;
	//	customer_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("customer_id", $data, $keylink);
			$row["customer_id_value"] = $value;
	//	usaha_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("usaha_id", $data, $keylink);
			$row["usaha_id_value"] = $value;
	//	so - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("so", $data, $keylink);
			$row["so_value"] = $value;
	//	kecamatan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kecamatan_id", $data, $keylink);
			$row["kecamatan_id_value"] = $value;
	//	kelurahan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kelurahan_id", $data, $keylink);
			$row["kelurahan_id_value"] = $value;
	//	notes - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("notes", $data, $keylink);
			$row["notes_value"] = $value;
	//	enabled - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("enabled", $data, $keylink);
			$row["enabled_value"] = $value;
	//	create_uid - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("create_uid", $data, $keylink);
			$row["create_uid_value"] = $value;
	//	customer_status_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("customer_status_id", $data, $keylink);
			$row["customer_status_id_value"] = $value;
	//	aktifnotes - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("aktifnotes", $data, $keylink);
			$row["aktifnotes_value"] = $value;
	//	tmt - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("tmt", $data, $keylink);
			$row["tmt_value"] = $value;
	//	air_zona_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("air_zona_id", $data, $keylink);
			$row["air_zona_id_value"] = $value;
	//	air_manfaat_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("air_manfaat_id", $data, $keylink);
			$row["air_manfaat_id_value"] = $value;
	//	def_pajak_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("def_pajak_id", $data, $keylink);
			$row["def_pajak_id_value"] = $value;
	//	opnm - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("opnm", $data, $keylink);
			$row["opnm_value"] = $value;
	//	opalamat - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("opalamat", $data, $keylink);
			$row["opalamat_value"] = $value;
	//	latitude - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("latitude", $data, $keylink);
			$row["latitude_value"] = $value;
	//	longitude - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("longitude", $data, $keylink);
			$row["longitude_value"] = $value;
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
	//	mall_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("mall_id", $data, $keylink);
			$row["mall_id_value"] = $value;
	//	cash_register - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("cash_register", $data, $keylink);
			$row["cash_register_value"] = $value;
	//	pelaporan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pelaporan", $data, $keylink);
			$row["pelaporan_value"] = $value;
	//	pembukuan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("pembukuan", $data, $keylink);
			$row["pembukuan_value"] = $value;
	//	bandara - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("bandara", $data, $keylink);
			$row["bandara_value"] = $value;
	//	wajib_pajak - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("wajib_pajak", $data, $keylink);
			$row["wajib_pajak_value"] = $value;
	//	jumlah_karyawan - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("jumlah_karyawan", $data, $keylink);
			$row["jumlah_karyawan_value"] = $value;
	//	tanggal_tutup - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("tanggal_tutup", $data, $keylink);
			$row["tanggal_tutup_value"] = $value;
	//	parkir_luas - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_luas", $data, $keylink);
			$row["parkir_luas_value"] = $value;
	//	parkir_masuk - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_masuk", $data, $keylink);
			$row["parkir_masuk_value"] = $value;
	//	parkir_tarif_mobil - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_tarif_mobil", $data, $keylink);
			$row["parkir_tarif_mobil_value"] = $value;
	//	parkir_tambahan - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_tambahan", $data, $keylink);
			$row["parkir_tambahan_value"] = $value;
	//	parkir_kapasitas_mobil - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_kapasitas_mobil", $data, $keylink);
			$row["parkir_kapasitas_mobil_value"] = $value;
	//	parkir_mobil_hari - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_mobil_hari", $data, $keylink);
			$row["parkir_mobil_hari_value"] = $value;
	//	parkir_keluar - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_keluar", $data, $keylink);
			$row["parkir_keluar_value"] = $value;
	//	parkir_motor_luas - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_motor_luas", $data, $keylink);
			$row["parkir_motor_luas_value"] = $value;
	//	parkir_motor_masuk - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_motor_masuk", $data, $keylink);
			$row["parkir_motor_masuk_value"] = $value;
	//	parkir_motor_keluar - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_motor_keluar", $data, $keylink);
			$row["parkir_motor_keluar_value"] = $value;
	//	parkir_tarif_motor - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_tarif_motor", $data, $keylink);
			$row["parkir_tarif_motor_value"] = $value;
	//	parkir_motor_tambahan - Number
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_motor_tambahan", $data, $keylink);
			$row["parkir_motor_tambahan_value"] = $value;
	//	parkir_kapasitas_motor - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_kapasitas_motor", $data, $keylink);
			$row["parkir_kapasitas_motor_value"] = $value;
	//	parkir_motor_hari - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("parkir_motor_hari", $data, $keylink);
			$row["parkir_motor_hari_value"] = $value;
	//	kelompok_usaha_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("kelompok_usaha_id", $data, $keylink);
			$row["kelompok_usaha_id_value"] = $value;
	//	zona_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("zona_id", $data, $keylink);
			$row["zona_id_value"] = $value;
	//	manfaat_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("manfaat_id", $data, $keylink);
			$row["manfaat_id_value"] = $value;
	//	golongan_id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("golongan_id", $data, $keylink);
			$row["golongan_id_value"] = $value;
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
$xt->load_template("pad_pad_customer_usaha_detailspreview.htm");
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