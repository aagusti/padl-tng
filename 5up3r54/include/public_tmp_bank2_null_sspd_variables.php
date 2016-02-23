<?php
$strTableName="public.tmp_bank2_null_sspd";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="public.tmp_bank2_null_sspd";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("public.tmp_bank2_null_sspd");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["public.tmp_bank2_null_sspd"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>