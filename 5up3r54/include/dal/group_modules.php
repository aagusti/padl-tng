<?php
$dalTablegroup_modules = array();
$dalTablegroup_modules["group_id"] = array("type"=>3,"varname"=>"group_id");
$dalTablegroup_modules["id"] = array("type"=>3,"varname"=>"id");
$dalTablegroup_modules["module_id"] = array("type"=>3,"varname"=>"module_id");
$dalTablegroup_modules["reads"] = array("type"=>2,"varname"=>"reads");
$dalTablegroup_modules["writes"] = array("type"=>2,"varname"=>"writes");
$dalTablegroup_modules["deletes"] = array("type"=>2,"varname"=>"deletes");
$dalTablegroup_modules["inserts"] = array("type"=>2,"varname"=>"inserts");
	$dalTablegroup_modules["id"]["key"]=true;
$dal_info["group_modules"]=&$dalTablegroup_modules;

?>