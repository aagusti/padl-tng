<?php
$strTableName="pad.pad_reklame_kelas_jalan";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="pad.pad_reklame_kelas_jalan";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("pad.pad_reklame_kelas_jalan");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["pad.pad_reklame_kelas_jalan"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>