<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_pad_invoice = array();
	$tdatapublic_pad_invoice[".NumberOfChars"] = 80; 
	$tdatapublic_pad_invoice[".ShortName"] = "public_pad_invoice";
	$tdatapublic_pad_invoice[".OwnerID"] = "";
	$tdatapublic_pad_invoice[".OriginalTable"] = "public.pad_invoice";

//	field labels
$fieldLabelspublic_pad_invoice = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_pad_invoice["English"] = array();
	$fieldToolTipspublic_pad_invoice["English"] = array();
	$fieldLabelspublic_pad_invoice["English"]["id"] = "Id";
	$fieldToolTipspublic_pad_invoice["English"]["id"] = "";
	$fieldLabelspublic_pad_invoice["English"]["source_id"] = "Source Id";
	$fieldToolTipspublic_pad_invoice["English"]["source_id"] = "";
	$fieldLabelspublic_pad_invoice["English"]["source_nama"] = "Source Nama";
	$fieldToolTipspublic_pad_invoice["English"]["source_nama"] = "";
	$fieldLabelspublic_pad_invoice["English"]["tahun"] = "Tahun";
	$fieldToolTipspublic_pad_invoice["English"]["tahun"] = "";
	$fieldLabelspublic_pad_invoice["English"]["usaha_id"] = "Usaha Id";
	$fieldToolTipspublic_pad_invoice["English"]["usaha_id"] = "";
	$fieldLabelspublic_pad_invoice["English"]["invoice_no"] = "Invoice No";
	$fieldToolTipspublic_pad_invoice["English"]["invoice_no"] = "";
	$fieldLabelspublic_pad_invoice["English"]["jenis_usaha"] = "Jenis Usaha";
	$fieldToolTipspublic_pad_invoice["English"]["jenis_usaha"] = "";
	$fieldLabelspublic_pad_invoice["English"]["jenis_pajak"] = "Jenis Pajak";
	$fieldToolTipspublic_pad_invoice["English"]["jenis_pajak"] = "";
	$fieldLabelspublic_pad_invoice["English"]["npwpd"] = "Npwpd";
	$fieldToolTipspublic_pad_invoice["English"]["npwpd"] = "";
	$fieldLabelspublic_pad_invoice["English"]["nama_wp"] = "Nama Wp";
	$fieldToolTipspublic_pad_invoice["English"]["nama_wp"] = "";
	$fieldLabelspublic_pad_invoice["English"]["alamat_wp"] = "Alamat Wp";
	$fieldToolTipspublic_pad_invoice["English"]["alamat_wp"] = "";
	$fieldLabelspublic_pad_invoice["English"]["nama_op"] = "Nama Op";
	$fieldToolTipspublic_pad_invoice["English"]["nama_op"] = "";
	$fieldLabelspublic_pad_invoice["English"]["alamat_op"] = "Alamat Op";
	$fieldToolTipspublic_pad_invoice["English"]["alamat_op"] = "";
	$fieldLabelspublic_pad_invoice["English"]["nomor_tagihan"] = "Nomor Tagihan";
	$fieldToolTipspublic_pad_invoice["English"]["nomor_tagihan"] = "";
	$fieldLabelspublic_pad_invoice["English"]["pokok"] = "Pokok";
	$fieldToolTipspublic_pad_invoice["English"]["pokok"] = "";
	$fieldLabelspublic_pad_invoice["English"]["denda"] = "Denda";
	$fieldToolTipspublic_pad_invoice["English"]["denda"] = "";
	$fieldLabelspublic_pad_invoice["English"]["bunga"] = "Bunga";
	$fieldToolTipspublic_pad_invoice["English"]["bunga"] = "";
	$fieldLabelspublic_pad_invoice["English"]["total"] = "Total";
	$fieldToolTipspublic_pad_invoice["English"]["total"] = "";
	$fieldLabelspublic_pad_invoice["English"]["status_bayar"] = "Status Bayar";
	$fieldToolTipspublic_pad_invoice["English"]["status_bayar"] = "";
	$fieldLabelspublic_pad_invoice["English"]["jatuh_tempo"] = "Jatuh Tempo";
	$fieldToolTipspublic_pad_invoice["English"]["jatuh_tempo"] = "";
	$fieldLabelspublic_pad_invoice["English"]["periode"] = "Periode";
	$fieldToolTipspublic_pad_invoice["English"]["periode"] = "";
	$fieldLabelspublic_pad_invoice["English"]["rekening_pokok"] = "Rekening Pokok";
	$fieldToolTipspublic_pad_invoice["English"]["rekening_pokok"] = "";
	$fieldLabelspublic_pad_invoice["English"]["rekening_denda"] = "Rekening Denda";
	$fieldToolTipspublic_pad_invoice["English"]["rekening_denda"] = "";
	$fieldLabelspublic_pad_invoice["English"]["nama_pokok"] = "Nama Pokok";
	$fieldToolTipspublic_pad_invoice["English"]["nama_pokok"] = "";
	$fieldLabelspublic_pad_invoice["English"]["nama_denda"] = "Nama Denda";
	$fieldToolTipspublic_pad_invoice["English"]["nama_denda"] = "";
	$fieldLabelspublic_pad_invoice["English"]["created"] = "Created";
	$fieldToolTipspublic_pad_invoice["English"]["created"] = "";
	$fieldLabelspublic_pad_invoice["English"]["updated"] = "Updated";
	$fieldToolTipspublic_pad_invoice["English"]["updated"] = "";
	$fieldLabelspublic_pad_invoice["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspublic_pad_invoice["English"]["create_uid"] = "";
	$fieldLabelspublic_pad_invoice["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspublic_pad_invoice["English"]["update_uid"] = "";
	if (count($fieldToolTipspublic_pad_invoice["English"]))
		$tdatapublic_pad_invoice[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_pad_invoice[".NCSearch"] = true;



$tdatapublic_pad_invoice[".shortTableName"] = "public_pad_invoice";
$tdatapublic_pad_invoice[".nSecOptions"] = 0;
$tdatapublic_pad_invoice[".recsPerRowList"] = 1;
$tdatapublic_pad_invoice[".mainTableOwnerID"] = "";
$tdatapublic_pad_invoice[".moveNext"] = 1;
$tdatapublic_pad_invoice[".nType"] = 0;

$tdatapublic_pad_invoice[".strOriginalTableName"] = "public.pad_invoice";




$tdatapublic_pad_invoice[".showAddInPopup"] = false;

$tdatapublic_pad_invoice[".showEditInPopup"] = false;

$tdatapublic_pad_invoice[".showViewInPopup"] = false;

$tdatapublic_pad_invoice[".fieldsForRegister"] = array();

$tdatapublic_pad_invoice[".listAjax"] = false;

	$tdatapublic_pad_invoice[".audit"] = false;

	$tdatapublic_pad_invoice[".locking"] = false;

$tdatapublic_pad_invoice[".listIcons"] = true;
$tdatapublic_pad_invoice[".edit"] = true;
$tdatapublic_pad_invoice[".inlineEdit"] = true;
$tdatapublic_pad_invoice[".inlineAdd"] = true;
$tdatapublic_pad_invoice[".view"] = true;



$tdatapublic_pad_invoice[".delete"] = true;

$tdatapublic_pad_invoice[".showSimpleSearchOptions"] = false;

$tdatapublic_pad_invoice[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_pad_invoice[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_pad_invoice[".isUseAjaxSuggest"] = true;

$tdatapublic_pad_invoice[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_pad_invoice[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_pad_invoice[".isUseTimeForSearch"] = false;




$tdatapublic_pad_invoice[".allSearchFields"] = array();

$tdatapublic_pad_invoice[".allSearchFields"][] = "id";
$tdatapublic_pad_invoice[".allSearchFields"][] = "source_id";
$tdatapublic_pad_invoice[".allSearchFields"][] = "source_nama";
$tdatapublic_pad_invoice[".allSearchFields"][] = "tahun";
$tdatapublic_pad_invoice[".allSearchFields"][] = "usaha_id";
$tdatapublic_pad_invoice[".allSearchFields"][] = "invoice_no";
$tdatapublic_pad_invoice[".allSearchFields"][] = "jenis_usaha";
$tdatapublic_pad_invoice[".allSearchFields"][] = "jenis_pajak";
$tdatapublic_pad_invoice[".allSearchFields"][] = "npwpd";
$tdatapublic_pad_invoice[".allSearchFields"][] = "nama_wp";
$tdatapublic_pad_invoice[".allSearchFields"][] = "alamat_wp";
$tdatapublic_pad_invoice[".allSearchFields"][] = "nama_op";
$tdatapublic_pad_invoice[".allSearchFields"][] = "alamat_op";
$tdatapublic_pad_invoice[".allSearchFields"][] = "nomor_tagihan";
$tdatapublic_pad_invoice[".allSearchFields"][] = "pokok";
$tdatapublic_pad_invoice[".allSearchFields"][] = "denda";
$tdatapublic_pad_invoice[".allSearchFields"][] = "bunga";
$tdatapublic_pad_invoice[".allSearchFields"][] = "total";
$tdatapublic_pad_invoice[".allSearchFields"][] = "status_bayar";
$tdatapublic_pad_invoice[".allSearchFields"][] = "jatuh_tempo";
$tdatapublic_pad_invoice[".allSearchFields"][] = "periode";
$tdatapublic_pad_invoice[".allSearchFields"][] = "rekening_pokok";
$tdatapublic_pad_invoice[".allSearchFields"][] = "rekening_denda";
$tdatapublic_pad_invoice[".allSearchFields"][] = "nama_pokok";
$tdatapublic_pad_invoice[".allSearchFields"][] = "nama_denda";
$tdatapublic_pad_invoice[".allSearchFields"][] = "created";
$tdatapublic_pad_invoice[".allSearchFields"][] = "updated";
$tdatapublic_pad_invoice[".allSearchFields"][] = "create_uid";
$tdatapublic_pad_invoice[".allSearchFields"][] = "update_uid";

$tdatapublic_pad_invoice[".googleLikeFields"][] = "id";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "source_id";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "source_nama";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "tahun";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "usaha_id";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "invoice_no";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "jenis_usaha";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "jenis_pajak";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "npwpd";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "nama_wp";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "alamat_wp";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "nama_op";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "alamat_op";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "nomor_tagihan";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "pokok";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "denda";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "bunga";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "total";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "status_bayar";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "jatuh_tempo";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "periode";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "rekening_pokok";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "rekening_denda";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "nama_pokok";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "nama_denda";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "created";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "updated";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "create_uid";
$tdatapublic_pad_invoice[".googleLikeFields"][] = "update_uid";


$tdatapublic_pad_invoice[".advSearchFields"][] = "id";
$tdatapublic_pad_invoice[".advSearchFields"][] = "source_id";
$tdatapublic_pad_invoice[".advSearchFields"][] = "source_nama";
$tdatapublic_pad_invoice[".advSearchFields"][] = "tahun";
$tdatapublic_pad_invoice[".advSearchFields"][] = "usaha_id";
$tdatapublic_pad_invoice[".advSearchFields"][] = "invoice_no";
$tdatapublic_pad_invoice[".advSearchFields"][] = "jenis_usaha";
$tdatapublic_pad_invoice[".advSearchFields"][] = "jenis_pajak";
$tdatapublic_pad_invoice[".advSearchFields"][] = "npwpd";
$tdatapublic_pad_invoice[".advSearchFields"][] = "nama_wp";
$tdatapublic_pad_invoice[".advSearchFields"][] = "alamat_wp";
$tdatapublic_pad_invoice[".advSearchFields"][] = "nama_op";
$tdatapublic_pad_invoice[".advSearchFields"][] = "alamat_op";
$tdatapublic_pad_invoice[".advSearchFields"][] = "nomor_tagihan";
$tdatapublic_pad_invoice[".advSearchFields"][] = "pokok";
$tdatapublic_pad_invoice[".advSearchFields"][] = "denda";
$tdatapublic_pad_invoice[".advSearchFields"][] = "bunga";
$tdatapublic_pad_invoice[".advSearchFields"][] = "total";
$tdatapublic_pad_invoice[".advSearchFields"][] = "status_bayar";
$tdatapublic_pad_invoice[".advSearchFields"][] = "jatuh_tempo";
$tdatapublic_pad_invoice[".advSearchFields"][] = "periode";
$tdatapublic_pad_invoice[".advSearchFields"][] = "rekening_pokok";
$tdatapublic_pad_invoice[".advSearchFields"][] = "rekening_denda";
$tdatapublic_pad_invoice[".advSearchFields"][] = "nama_pokok";
$tdatapublic_pad_invoice[".advSearchFields"][] = "nama_denda";
$tdatapublic_pad_invoice[".advSearchFields"][] = "created";
$tdatapublic_pad_invoice[".advSearchFields"][] = "updated";
$tdatapublic_pad_invoice[".advSearchFields"][] = "create_uid";
$tdatapublic_pad_invoice[".advSearchFields"][] = "update_uid";

$tdatapublic_pad_invoice[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_pad_invoice[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_pad_invoice[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_pad_invoice[".orderindexes"] = array();

$tdatapublic_pad_invoice[".sqlHead"] = "SELECT id,   source_id,   source_nama,   tahun,   usaha_id,   invoice_no,   jenis_usaha,   jenis_pajak,   npwpd,   nama_wp,   alamat_wp,   nama_op,   alamat_op,   nomor_tagihan,   pokok,   denda,   bunga,   total,   status_bayar,   jatuh_tempo,   periode,   rekening_pokok,   rekening_denda,   nama_pokok,   nama_denda,   created,   updated,   create_uid,   update_uid";
$tdatapublic_pad_invoice[".sqlFrom"] = "FROM \"public\".pad_invoice";
$tdatapublic_pad_invoice[".sqlWhereExpr"] = "";
$tdatapublic_pad_invoice[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_pad_invoice[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_pad_invoice[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_pad_invoice = array();
$tableKeyspublic_pad_invoice[] = "id";
$tdatapublic_pad_invoice[".Keys"] = $tableKeyspublic_pad_invoice;

$tdatapublic_pad_invoice[".listFields"] = array();
$tdatapublic_pad_invoice[".listFields"][] = "id";
$tdatapublic_pad_invoice[".listFields"][] = "source_id";
$tdatapublic_pad_invoice[".listFields"][] = "source_nama";
$tdatapublic_pad_invoice[".listFields"][] = "tahun";
$tdatapublic_pad_invoice[".listFields"][] = "usaha_id";
$tdatapublic_pad_invoice[".listFields"][] = "invoice_no";
$tdatapublic_pad_invoice[".listFields"][] = "jenis_usaha";
$tdatapublic_pad_invoice[".listFields"][] = "jenis_pajak";
$tdatapublic_pad_invoice[".listFields"][] = "npwpd";
$tdatapublic_pad_invoice[".listFields"][] = "nama_wp";
$tdatapublic_pad_invoice[".listFields"][] = "alamat_wp";
$tdatapublic_pad_invoice[".listFields"][] = "nama_op";
$tdatapublic_pad_invoice[".listFields"][] = "alamat_op";
$tdatapublic_pad_invoice[".listFields"][] = "nomor_tagihan";
$tdatapublic_pad_invoice[".listFields"][] = "pokok";
$tdatapublic_pad_invoice[".listFields"][] = "denda";
$tdatapublic_pad_invoice[".listFields"][] = "bunga";
$tdatapublic_pad_invoice[".listFields"][] = "total";
$tdatapublic_pad_invoice[".listFields"][] = "status_bayar";
$tdatapublic_pad_invoice[".listFields"][] = "jatuh_tempo";
$tdatapublic_pad_invoice[".listFields"][] = "periode";
$tdatapublic_pad_invoice[".listFields"][] = "rekening_pokok";
$tdatapublic_pad_invoice[".listFields"][] = "rekening_denda";
$tdatapublic_pad_invoice[".listFields"][] = "nama_pokok";
$tdatapublic_pad_invoice[".listFields"][] = "nama_denda";
$tdatapublic_pad_invoice[".listFields"][] = "created";
$tdatapublic_pad_invoice[".listFields"][] = "updated";
$tdatapublic_pad_invoice[".listFields"][] = "create_uid";
$tdatapublic_pad_invoice[".listFields"][] = "update_uid";

$tdatapublic_pad_invoice[".viewFields"] = array();
$tdatapublic_pad_invoice[".viewFields"][] = "id";
$tdatapublic_pad_invoice[".viewFields"][] = "source_id";
$tdatapublic_pad_invoice[".viewFields"][] = "source_nama";
$tdatapublic_pad_invoice[".viewFields"][] = "tahun";
$tdatapublic_pad_invoice[".viewFields"][] = "usaha_id";
$tdatapublic_pad_invoice[".viewFields"][] = "invoice_no";
$tdatapublic_pad_invoice[".viewFields"][] = "jenis_usaha";
$tdatapublic_pad_invoice[".viewFields"][] = "jenis_pajak";
$tdatapublic_pad_invoice[".viewFields"][] = "npwpd";
$tdatapublic_pad_invoice[".viewFields"][] = "nama_wp";
$tdatapublic_pad_invoice[".viewFields"][] = "alamat_wp";
$tdatapublic_pad_invoice[".viewFields"][] = "nama_op";
$tdatapublic_pad_invoice[".viewFields"][] = "alamat_op";
$tdatapublic_pad_invoice[".viewFields"][] = "nomor_tagihan";
$tdatapublic_pad_invoice[".viewFields"][] = "pokok";
$tdatapublic_pad_invoice[".viewFields"][] = "denda";
$tdatapublic_pad_invoice[".viewFields"][] = "bunga";
$tdatapublic_pad_invoice[".viewFields"][] = "total";
$tdatapublic_pad_invoice[".viewFields"][] = "status_bayar";
$tdatapublic_pad_invoice[".viewFields"][] = "jatuh_tempo";
$tdatapublic_pad_invoice[".viewFields"][] = "periode";
$tdatapublic_pad_invoice[".viewFields"][] = "rekening_pokok";
$tdatapublic_pad_invoice[".viewFields"][] = "rekening_denda";
$tdatapublic_pad_invoice[".viewFields"][] = "nama_pokok";
$tdatapublic_pad_invoice[".viewFields"][] = "nama_denda";
$tdatapublic_pad_invoice[".viewFields"][] = "created";
$tdatapublic_pad_invoice[".viewFields"][] = "updated";
$tdatapublic_pad_invoice[".viewFields"][] = "create_uid";
$tdatapublic_pad_invoice[".viewFields"][] = "update_uid";

$tdatapublic_pad_invoice[".addFields"] = array();
$tdatapublic_pad_invoice[".addFields"][] = "source_id";
$tdatapublic_pad_invoice[".addFields"][] = "source_nama";
$tdatapublic_pad_invoice[".addFields"][] = "tahun";
$tdatapublic_pad_invoice[".addFields"][] = "usaha_id";
$tdatapublic_pad_invoice[".addFields"][] = "invoice_no";
$tdatapublic_pad_invoice[".addFields"][] = "jenis_usaha";
$tdatapublic_pad_invoice[".addFields"][] = "jenis_pajak";
$tdatapublic_pad_invoice[".addFields"][] = "npwpd";
$tdatapublic_pad_invoice[".addFields"][] = "nama_wp";
$tdatapublic_pad_invoice[".addFields"][] = "alamat_wp";
$tdatapublic_pad_invoice[".addFields"][] = "nama_op";
$tdatapublic_pad_invoice[".addFields"][] = "alamat_op";
$tdatapublic_pad_invoice[".addFields"][] = "nomor_tagihan";
$tdatapublic_pad_invoice[".addFields"][] = "pokok";
$tdatapublic_pad_invoice[".addFields"][] = "denda";
$tdatapublic_pad_invoice[".addFields"][] = "bunga";
$tdatapublic_pad_invoice[".addFields"][] = "total";
$tdatapublic_pad_invoice[".addFields"][] = "status_bayar";
$tdatapublic_pad_invoice[".addFields"][] = "jatuh_tempo";
$tdatapublic_pad_invoice[".addFields"][] = "periode";
$tdatapublic_pad_invoice[".addFields"][] = "rekening_pokok";
$tdatapublic_pad_invoice[".addFields"][] = "rekening_denda";
$tdatapublic_pad_invoice[".addFields"][] = "nama_pokok";
$tdatapublic_pad_invoice[".addFields"][] = "nama_denda";
$tdatapublic_pad_invoice[".addFields"][] = "created";
$tdatapublic_pad_invoice[".addFields"][] = "updated";
$tdatapublic_pad_invoice[".addFields"][] = "create_uid";
$tdatapublic_pad_invoice[".addFields"][] = "update_uid";

$tdatapublic_pad_invoice[".inlineAddFields"] = array();
$tdatapublic_pad_invoice[".inlineAddFields"][] = "source_id";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "source_nama";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "tahun";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "usaha_id";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "invoice_no";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "jenis_usaha";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "jenis_pajak";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "npwpd";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "nama_wp";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "alamat_wp";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "nama_op";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "alamat_op";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "nomor_tagihan";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "pokok";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "denda";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "bunga";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "total";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "status_bayar";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "jatuh_tempo";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "periode";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "rekening_pokok";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "rekening_denda";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "nama_pokok";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "nama_denda";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "created";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "updated";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "create_uid";
$tdatapublic_pad_invoice[".inlineAddFields"][] = "update_uid";

$tdatapublic_pad_invoice[".editFields"] = array();
$tdatapublic_pad_invoice[".editFields"][] = "source_id";
$tdatapublic_pad_invoice[".editFields"][] = "source_nama";
$tdatapublic_pad_invoice[".editFields"][] = "tahun";
$tdatapublic_pad_invoice[".editFields"][] = "usaha_id";
$tdatapublic_pad_invoice[".editFields"][] = "invoice_no";
$tdatapublic_pad_invoice[".editFields"][] = "jenis_usaha";
$tdatapublic_pad_invoice[".editFields"][] = "jenis_pajak";
$tdatapublic_pad_invoice[".editFields"][] = "npwpd";
$tdatapublic_pad_invoice[".editFields"][] = "nama_wp";
$tdatapublic_pad_invoice[".editFields"][] = "alamat_wp";
$tdatapublic_pad_invoice[".editFields"][] = "nama_op";
$tdatapublic_pad_invoice[".editFields"][] = "alamat_op";
$tdatapublic_pad_invoice[".editFields"][] = "nomor_tagihan";
$tdatapublic_pad_invoice[".editFields"][] = "pokok";
$tdatapublic_pad_invoice[".editFields"][] = "denda";
$tdatapublic_pad_invoice[".editFields"][] = "bunga";
$tdatapublic_pad_invoice[".editFields"][] = "total";
$tdatapublic_pad_invoice[".editFields"][] = "status_bayar";
$tdatapublic_pad_invoice[".editFields"][] = "jatuh_tempo";
$tdatapublic_pad_invoice[".editFields"][] = "periode";
$tdatapublic_pad_invoice[".editFields"][] = "rekening_pokok";
$tdatapublic_pad_invoice[".editFields"][] = "rekening_denda";
$tdatapublic_pad_invoice[".editFields"][] = "nama_pokok";
$tdatapublic_pad_invoice[".editFields"][] = "nama_denda";
$tdatapublic_pad_invoice[".editFields"][] = "created";
$tdatapublic_pad_invoice[".editFields"][] = "updated";
$tdatapublic_pad_invoice[".editFields"][] = "create_uid";
$tdatapublic_pad_invoice[".editFields"][] = "update_uid";

$tdatapublic_pad_invoice[".inlineEditFields"] = array();
$tdatapublic_pad_invoice[".inlineEditFields"][] = "source_id";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "source_nama";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "tahun";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "usaha_id";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "invoice_no";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "jenis_usaha";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "jenis_pajak";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "npwpd";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "nama_wp";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "alamat_wp";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "nama_op";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "alamat_op";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "nomor_tagihan";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "pokok";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "denda";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "bunga";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "total";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "status_bayar";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "jatuh_tempo";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "periode";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "rekening_pokok";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "rekening_denda";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "nama_pokok";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "nama_denda";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "created";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "updated";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "create_uid";
$tdatapublic_pad_invoice[".inlineEditFields"][] = "update_uid";

$tdatapublic_pad_invoice[".exportFields"] = array();

$tdatapublic_pad_invoice[".printFields"] = array();

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Id"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "id"; 
		$fdata["FullName"] = "id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["id"] = $fdata;
//	source_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "source_id";
	$fdata["GoodName"] = "source_id";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Source Id"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "source_id"; 
		$fdata["FullName"] = "source_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["source_id"] = $fdata;
//	source_nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "source_nama";
	$fdata["GoodName"] = "source_nama";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Source Nama"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "source_nama"; 
		$fdata["FullName"] = "source_nama";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["source_nama"] = $fdata;
//	tahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "tahun";
	$fdata["GoodName"] = "tahun";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Tahun"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "tahun"; 
		$fdata["FullName"] = "tahun";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["tahun"] = $fdata;
//	usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "usaha_id";
	$fdata["GoodName"] = "usaha_id";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Usaha Id"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "usaha_id"; 
		$fdata["FullName"] = "usaha_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["usaha_id"] = $fdata;
//	invoice_no
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "invoice_no";
	$fdata["GoodName"] = "invoice_no";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Invoice No"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "invoice_no"; 
		$fdata["FullName"] = "invoice_no";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["invoice_no"] = $fdata;
//	jenis_usaha
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "jenis_usaha";
	$fdata["GoodName"] = "jenis_usaha";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Jenis Usaha"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "jenis_usaha"; 
		$fdata["FullName"] = "jenis_usaha";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["jenis_usaha"] = $fdata;
//	jenis_pajak
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "jenis_pajak";
	$fdata["GoodName"] = "jenis_pajak";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Jenis Pajak"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "jenis_pajak"; 
		$fdata["FullName"] = "jenis_pajak";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["jenis_pajak"] = $fdata;
//	npwpd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "npwpd";
	$fdata["GoodName"] = "npwpd";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Npwpd"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "npwpd"; 
		$fdata["FullName"] = "npwpd";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["npwpd"] = $fdata;
//	nama_wp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "nama_wp";
	$fdata["GoodName"] = "nama_wp";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Nama Wp"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "nama_wp"; 
		$fdata["FullName"] = "nama_wp";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["nama_wp"] = $fdata;
//	alamat_wp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "alamat_wp";
	$fdata["GoodName"] = "alamat_wp";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Alamat Wp"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "alamat_wp"; 
		$fdata["FullName"] = "alamat_wp";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=500";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["alamat_wp"] = $fdata;
//	nama_op
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "nama_op";
	$fdata["GoodName"] = "nama_op";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Nama Op"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "nama_op"; 
		$fdata["FullName"] = "nama_op";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["nama_op"] = $fdata;
//	alamat_op
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "alamat_op";
	$fdata["GoodName"] = "alamat_op";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Alamat Op"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "alamat_op"; 
		$fdata["FullName"] = "alamat_op";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=500";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["alamat_op"] = $fdata;
//	nomor_tagihan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "nomor_tagihan";
	$fdata["GoodName"] = "nomor_tagihan";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Nomor Tagihan"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "nomor_tagihan"; 
		$fdata["FullName"] = "nomor_tagihan";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=15";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["nomor_tagihan"] = $fdata;
//	pokok
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "pokok";
	$fdata["GoodName"] = "pokok";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Pokok"; 
	$fdata["FieldType"] = 5;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "pokok"; 
		$fdata["FullName"] = "pokok";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["pokok"] = $fdata;
//	denda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "denda";
	$fdata["GoodName"] = "denda";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Denda"; 
	$fdata["FieldType"] = 5;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "denda"; 
		$fdata["FullName"] = "denda";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["denda"] = $fdata;
//	bunga
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "bunga";
	$fdata["GoodName"] = "bunga";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Bunga"; 
	$fdata["FieldType"] = 5;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "bunga"; 
		$fdata["FullName"] = "bunga";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["bunga"] = $fdata;
//	total
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "total";
	$fdata["GoodName"] = "total";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Total"; 
	$fdata["FieldType"] = 5;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "total"; 
		$fdata["FullName"] = "total";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["total"] = $fdata;
//	status_bayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "status_bayar";
	$fdata["GoodName"] = "status_bayar";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Status Bayar"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "status_bayar"; 
		$fdata["FullName"] = "status_bayar";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["status_bayar"] = $fdata;
//	jatuh_tempo
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "jatuh_tempo";
	$fdata["GoodName"] = "jatuh_tempo";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Jatuh Tempo"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "jatuh_tempo"; 
		$fdata["FullName"] = "jatuh_tempo";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["jatuh_tempo"] = $fdata;
//	periode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "periode";
	$fdata["GoodName"] = "periode";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Periode"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "periode"; 
		$fdata["FullName"] = "periode";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=15";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["periode"] = $fdata;
//	rekening_pokok
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "rekening_pokok";
	$fdata["GoodName"] = "rekening_pokok";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Rekening Pokok"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "rekening_pokok"; 
		$fdata["FullName"] = "rekening_pokok";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=15";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["rekening_pokok"] = $fdata;
//	rekening_denda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "rekening_denda";
	$fdata["GoodName"] = "rekening_denda";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Rekening Denda"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "rekening_denda"; 
		$fdata["FullName"] = "rekening_denda";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=15";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["rekening_denda"] = $fdata;
//	nama_pokok
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
	$fdata["strName"] = "nama_pokok";
	$fdata["GoodName"] = "nama_pokok";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Nama Pokok"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "nama_pokok"; 
		$fdata["FullName"] = "nama_pokok";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["nama_pokok"] = $fdata;
//	nama_denda
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
	$fdata["strName"] = "nama_denda";
	$fdata["GoodName"] = "nama_denda";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Nama Denda"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "nama_denda"; 
		$fdata["FullName"] = "nama_denda";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=150";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["nama_denda"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 26;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Created"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "created"; 
		$fdata["FullName"] = "created";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["created"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 27;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Updated"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "updated"; 
		$fdata["FullName"] = "updated";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["updated"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 28;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Create Uid"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "create_uid"; 
		$fdata["FullName"] = "create_uid";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 29;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "public.pad_invoice";
	$fdata["Label"] = "Update Uid"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		
		
		$fdata["strField"] = "update_uid"; 
		$fdata["FullName"] = "update_uid";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_invoice["update_uid"] = $fdata;

	
$tables_data["public.pad_invoice"]=&$tdatapublic_pad_invoice;
$field_labels["public_pad_invoice"] = &$fieldLabelspublic_pad_invoice;
$fieldToolTips["public.pad_invoice"] = &$fieldToolTipspublic_pad_invoice;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.pad_invoice"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.pad_invoice"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_pad_invoice()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   source_id,   source_nama,   tahun,   usaha_id,   invoice_no,   jenis_usaha,   jenis_pajak,   npwpd,   nama_wp,   alamat_wp,   nama_op,   alamat_op,   nomor_tagihan,   pokok,   denda,   bunga,   total,   status_bayar,   jatuh_tempo,   periode,   rekening_pokok,   rekening_denda,   nama_pokok,   nama_denda,   created,   updated,   create_uid,   update_uid";
$proto0["m_strFrom"] = "FROM \"public\".pad_invoice";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "public.pad_invoice"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "source_id",
	"m_strTable" => "public.pad_invoice"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "source_nama",
	"m_strTable" => "public.pad_invoice"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "tahun",
	"m_strTable" => "public.pad_invoice"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "usaha_id",
	"m_strTable" => "public.pad_invoice"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "invoice_no",
	"m_strTable" => "public.pad_invoice"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "jenis_usaha",
	"m_strTable" => "public.pad_invoice"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "jenis_pajak",
	"m_strTable" => "public.pad_invoice"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "npwpd",
	"m_strTable" => "public.pad_invoice"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "nama_wp",
	"m_strTable" => "public.pad_invoice"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat_wp",
	"m_strTable" => "public.pad_invoice"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "nama_op",
	"m_strTable" => "public.pad_invoice"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "alamat_op",
	"m_strTable" => "public.pad_invoice"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "nomor_tagihan",
	"m_strTable" => "public.pad_invoice"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "pokok",
	"m_strTable" => "public.pad_invoice"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "denda",
	"m_strTable" => "public.pad_invoice"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "bunga",
	"m_strTable" => "public.pad_invoice"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "total",
	"m_strTable" => "public.pad_invoice"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "status_bayar",
	"m_strTable" => "public.pad_invoice"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "jatuh_tempo",
	"m_strTable" => "public.pad_invoice"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "periode",
	"m_strTable" => "public.pad_invoice"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "rekening_pokok",
	"m_strTable" => "public.pad_invoice"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "rekening_denda",
	"m_strTable" => "public.pad_invoice"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
						$proto51=array();
			$obj = new SQLField(array(
	"m_strName" => "nama_pokok",
	"m_strTable" => "public.pad_invoice"
));

$proto51["m_expr"]=$obj;
$proto51["m_alias"] = "";
$obj = new SQLFieldListItem($proto51);

$proto0["m_fieldlist"][]=$obj;
						$proto53=array();
			$obj = new SQLField(array(
	"m_strName" => "nama_denda",
	"m_strTable" => "public.pad_invoice"
));

$proto53["m_expr"]=$obj;
$proto53["m_alias"] = "";
$obj = new SQLFieldListItem($proto53);

$proto0["m_fieldlist"][]=$obj;
						$proto55=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "public.pad_invoice"
));

$proto55["m_expr"]=$obj;
$proto55["m_alias"] = "";
$obj = new SQLFieldListItem($proto55);

$proto0["m_fieldlist"][]=$obj;
						$proto57=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "public.pad_invoice"
));

$proto57["m_expr"]=$obj;
$proto57["m_alias"] = "";
$obj = new SQLFieldListItem($proto57);

$proto0["m_fieldlist"][]=$obj;
						$proto59=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "public.pad_invoice"
));

$proto59["m_expr"]=$obj;
$proto59["m_alias"] = "";
$obj = new SQLFieldListItem($proto59);

$proto0["m_fieldlist"][]=$obj;
						$proto61=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "public.pad_invoice"
));

$proto61["m_expr"]=$obj;
$proto61["m_alias"] = "";
$obj = new SQLFieldListItem($proto61);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto63=array();
$proto63["m_link"] = "SQLL_MAIN";
			$proto64=array();
$proto64["m_strName"] = "public.pad_invoice";
$proto64["m_columns"] = array();
$proto64["m_columns"][] = "id";
$proto64["m_columns"][] = "source_id";
$proto64["m_columns"][] = "source_nama";
$proto64["m_columns"][] = "tahun";
$proto64["m_columns"][] = "usaha_id";
$proto64["m_columns"][] = "invoice_no";
$proto64["m_columns"][] = "jenis_usaha";
$proto64["m_columns"][] = "jenis_pajak";
$proto64["m_columns"][] = "npwpd";
$proto64["m_columns"][] = "nama_wp";
$proto64["m_columns"][] = "alamat_wp";
$proto64["m_columns"][] = "nama_op";
$proto64["m_columns"][] = "alamat_op";
$proto64["m_columns"][] = "nomor_tagihan";
$proto64["m_columns"][] = "pokok";
$proto64["m_columns"][] = "denda";
$proto64["m_columns"][] = "bunga";
$proto64["m_columns"][] = "total";
$proto64["m_columns"][] = "status_bayar";
$proto64["m_columns"][] = "jatuh_tempo";
$proto64["m_columns"][] = "periode";
$proto64["m_columns"][] = "rekening_pokok";
$proto64["m_columns"][] = "rekening_denda";
$proto64["m_columns"][] = "nama_pokok";
$proto64["m_columns"][] = "nama_denda";
$proto64["m_columns"][] = "created";
$proto64["m_columns"][] = "updated";
$proto64["m_columns"][] = "create_uid";
$proto64["m_columns"][] = "update_uid";
$obj = new SQLTable($proto64);

$proto63["m_table"] = $obj;
$proto63["m_alias"] = "";
$proto65=array();
$proto65["m_sql"] = "";
$proto65["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto65["m_column"]=$obj;
$proto65["m_contained"] = array();
$proto65["m_strCase"] = "";
$proto65["m_havingmode"] = "0";
$proto65["m_inBrackets"] = "0";
$proto65["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto65);

$proto63["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto63);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_public_pad_invoice = createSqlQuery_public_pad_invoice();
																													$tdatapublic_pad_invoice[".sqlquery"] = $queryData_public_pad_invoice;
	
if(isset($tdatapublic_pad_invoice["field2"])){
	$tdatapublic_pad_invoice["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_pad_invoice["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_pad_invoice["field2"]["LookupType"] = 4;
	$tdatapublic_pad_invoice["field2"]["LinkField"] = "email";
	$tdatapublic_pad_invoice["field2"]["DisplayField"] = "name";
	$tdatapublic_pad_invoice[".hasCustomViewField"] = true;
}

$tableEvents["public.pad_invoice"] = new eventsBase;
$tdatapublic_pad_invoice[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.pad_invoice");

?>