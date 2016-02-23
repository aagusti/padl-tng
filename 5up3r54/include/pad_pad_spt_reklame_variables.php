<?php
$strTableName="pad.pad_spt_reklame";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="pad.pad_spt_reklame";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("pad.pad_spt_reklame");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["pad.pad_spt_reklame"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>