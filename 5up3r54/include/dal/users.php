<?php
$dalTableusers = array();
$dalTableusers["userid"] = array("type"=>200,"varname"=>"userid");
$dalTableusers["nama"] = array("type"=>200,"varname"=>"nama");
$dalTableusers["created"] = array("type"=>135,"varname"=>"created");
$dalTableusers["disabled"] = array("type"=>2,"varname"=>"disabled");
$dalTableusers["passwd"] = array("type"=>200,"varname"=>"passwd");
$dalTableusers["id"] = array("type"=>3,"varname"=>"id");
$dalTableusers["kd_kantor"] = array("type"=>13,"varname"=>"kd_kantor");
$dalTableusers["kd_kanwil"] = array("type"=>13,"varname"=>"kd_kanwil");
$dalTableusers["kd_tp"] = array("type"=>13,"varname"=>"kd_tp");
$dalTableusers["kd_kanwil_bank"] = array("type"=>13,"varname"=>"kd_kanwil_bank");
$dalTableusers["kd_kppbb_bank"] = array("type"=>13,"varname"=>"kd_kppbb_bank");
$dalTableusers["kd_bank_tunggal"] = array("type"=>13,"varname"=>"kd_bank_tunggal");
$dalTableusers["kd_bank_persepsi"] = array("type"=>13,"varname"=>"kd_bank_persepsi");
$dalTableusers["nip"] = array("type"=>13,"varname"=>"nip");
$dalTableusers["jabatan"] = array("type"=>200,"varname"=>"jabatan");
$dalTableusers["handphone"] = array("type"=>200,"varname"=>"handphone");
$dalTableusers["create_uid"] = array("type"=>3,"varname"=>"create_uid");
$dalTableusers["update_uid"] = array("type"=>3,"varname"=>"update_uid");
$dalTableusers["updated"] = array("type"=>135,"varname"=>"updated");
$dalTableusers["last_login"] = array("type"=>135,"varname"=>"last_login");
$dalTableusers["is_login"] = array("type"=>2,"varname"=>"is_login");
$dalTableusers["is_logout"] = array("type"=>2,"varname"=>"is_logout");
$dalTableusers["last_ip"] = array("type"=>200,"varname"=>"last_ip");
	$dalTableusers["id"]["key"]=true;
$dal_info["users"]=&$dalTableusers;

?>