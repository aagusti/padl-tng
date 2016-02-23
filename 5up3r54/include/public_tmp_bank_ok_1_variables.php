<?php
$strTableName="public.tmp_bank_ok_1";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="public.tmp_bank_ok_1";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("public.tmp_bank_ok_1");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["public.tmp_bank_ok_1"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>