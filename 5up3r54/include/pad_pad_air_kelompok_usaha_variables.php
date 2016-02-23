<?php
$strTableName="pad.pad_air_kelompok_usaha";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="pad.pad_air_kelompok_usaha";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("pad.pad_air_kelompok_usaha");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["pad.pad_air_kelompok_usaha"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>