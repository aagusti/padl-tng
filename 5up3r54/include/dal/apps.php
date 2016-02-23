<?php
$dalTableapps = array();
$dalTableapps["id"] = array("type"=>3,"varname"=>"id");
$dalTableapps["nama"] = array("type"=>200,"varname"=>"nama");
$dalTableapps["app_path"] = array("type"=>200,"varname"=>"app_path");
$dalTableapps["disabled"] = array("type"=>2,"varname"=>"disabled");
	$dalTableapps["id"]["key"]=true;
$dal_info["apps"]=&$dalTableapps;

?>