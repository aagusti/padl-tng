<?php
$dalTablegroups = array();
$dalTablegroups["id"] = array("type"=>3,"varname"=>"id");
$dalTablegroups["nama"] = array("type"=>200,"varname"=>"nama");
$dalTablegroups["locked"] = array("type"=>2,"varname"=>"locked");
$dalTablegroups["kode"] = array("type"=>200,"varname"=>"kode");
	$dalTablegroups["id"]["key"]=true;
$dal_info["groups"]=&$dalTablegroups;

?>