<?php
$dalTablepad_payment = array();
$dalTablepad_payment["id"] = array("type"=>3,"varname"=>"id");
$dalTablepad_payment["invoice_id"] = array("type"=>3,"varname"=>"invoice_id");
$dalTablepad_payment["tgl"] = array("type"=>135,"varname"=>"tgl");
$dalTablepad_payment["tagihan"] = array("type"=>5,"varname"=>"tagihan");
$dalTablepad_payment["denda"] = array("type"=>5,"varname"=>"denda");
$dalTablepad_payment["total_bayar"] = array("type"=>5,"varname"=>"total_bayar");
$dalTablepad_payment["iso_request"] = array("type"=>200,"varname"=>"iso_request");
$dalTablepad_payment["transmission"] = array("type"=>135,"varname"=>"transmission");
$dalTablepad_payment["settlement"] = array("type"=>7,"varname"=>"settlement");
$dalTablepad_payment["stan"] = array("type"=>3,"varname"=>"stan");
$dalTablepad_payment["ntb"] = array("type"=>200,"varname"=>"ntb");
$dalTablepad_payment["ntp"] = array("type"=>200,"varname"=>"ntp");
$dalTablepad_payment["bank_id"] = array("type"=>3,"varname"=>"bank_id");
$dalTablepad_payment["channel_id"] = array("type"=>3,"varname"=>"channel_id");
$dalTablepad_payment["bank_ip"] = array("type"=>200,"varname"=>"bank_ip");
	$dalTablepad_payment["id"]["key"]=true;
$dal_info["pad_payment"]=&$dalTablepad_payment;

?>