<?php
$dalTableapp_status = array();
$dalTableapp_status["id"] = array("type"=>3,"varname"=>"id");
$dalTableapp_status["tahun"] = array("type"=>3,"varname"=>"tahun");
$dalTableapp_status["app_id"] = array("type"=>2,"varname"=>"app_id");
$dalTableapp_status["step"] = array("type"=>200,"varname"=>"step");
$dalTableapp_status["operator"] = array("type"=>2,"varname"=>"operator");
$dalTableapp_status["review"] = array("type"=>2,"varname"=>"review");
$dalTableapp_status["manager"] = array("type"=>2,"varname"=>"manager");
	$dalTableapp_status["id"]["key"]=true;
$dal_info["app_status"]=&$dalTableapp_status;

?>