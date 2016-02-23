<?php
$dalTablepad_invoice = array();
$dalTablepad_invoice["id"] = array("type"=>3,"varname"=>"id");
$dalTablepad_invoice["source_id"] = array("type"=>3,"varname"=>"source_id");
$dalTablepad_invoice["source_nama"] = array("type"=>200,"varname"=>"source_nama");
$dalTablepad_invoice["tahun"] = array("type"=>3,"varname"=>"tahun");
$dalTablepad_invoice["usaha_id"] = array("type"=>3,"varname"=>"usaha_id");
$dalTablepad_invoice["invoice_no"] = array("type"=>3,"varname"=>"invoice_no");
$dalTablepad_invoice["jenis_usaha"] = array("type"=>200,"varname"=>"jenis_usaha");
$dalTablepad_invoice["jenis_pajak"] = array("type"=>200,"varname"=>"jenis_pajak");
$dalTablepad_invoice["npwpd"] = array("type"=>200,"varname"=>"npwpd");
$dalTablepad_invoice["nama_wp"] = array("type"=>200,"varname"=>"nama_wp");
$dalTablepad_invoice["alamat_wp"] = array("type"=>200,"varname"=>"alamat_wp");
$dalTablepad_invoice["nama_op"] = array("type"=>200,"varname"=>"nama_op");
$dalTablepad_invoice["alamat_op"] = array("type"=>200,"varname"=>"alamat_op");
$dalTablepad_invoice["nomor_tagihan"] = array("type"=>200,"varname"=>"nomor_tagihan");
$dalTablepad_invoice["pokok"] = array("type"=>5,"varname"=>"pokok");
$dalTablepad_invoice["denda"] = array("type"=>5,"varname"=>"denda");
$dalTablepad_invoice["bunga"] = array("type"=>5,"varname"=>"bunga");
$dalTablepad_invoice["total"] = array("type"=>5,"varname"=>"total");
$dalTablepad_invoice["status_bayar"] = array("type"=>3,"varname"=>"status_bayar");
$dalTablepad_invoice["jatuh_tempo"] = array("type"=>135,"varname"=>"jatuh_tempo");
$dalTablepad_invoice["periode"] = array("type"=>200,"varname"=>"periode");
$dalTablepad_invoice["rekening_pokok"] = array("type"=>200,"varname"=>"rekening_pokok");
$dalTablepad_invoice["rekening_denda"] = array("type"=>200,"varname"=>"rekening_denda");
$dalTablepad_invoice["nama_pokok"] = array("type"=>200,"varname"=>"nama_pokok");
$dalTablepad_invoice["nama_denda"] = array("type"=>200,"varname"=>"nama_denda");
$dalTablepad_invoice["created"] = array("type"=>135,"varname"=>"created");
$dalTablepad_invoice["updated"] = array("type"=>135,"varname"=>"updated");
$dalTablepad_invoice["create_uid"] = array("type"=>3,"varname"=>"create_uid");
$dalTablepad_invoice["update_uid"] = array("type"=>3,"varname"=>"update_uid");
	$dalTablepad_invoice["id"]["key"]=true;
$dal_info["pad_invoice"]=&$dalTablepad_invoice;

?>