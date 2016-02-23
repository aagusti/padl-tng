<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_pad_jenis_pajak = array();
	$tdatapad_pad_jenis_pajak[".NumberOfChars"] = 80; 
	$tdatapad_pad_jenis_pajak[".ShortName"] = "pad_pad_jenis_pajak";
	$tdatapad_pad_jenis_pajak[".OwnerID"] = "";
	$tdatapad_pad_jenis_pajak[".OriginalTable"] = "pad.pad_jenis_pajak";

//	field labels
$fieldLabelspad_pad_jenis_pajak = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_pad_jenis_pajak["English"] = array();
	$fieldToolTipspad_pad_jenis_pajak["English"] = array();
	$fieldLabelspad_pad_jenis_pajak["English"]["id"] = "Id";
	$fieldToolTipspad_pad_jenis_pajak["English"]["id"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["usaha_id"] = "Usaha Id";
	$fieldToolTipspad_pad_jenis_pajak["English"]["usaha_id"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["nama"] = "Nama";
	$fieldToolTipspad_pad_jenis_pajak["English"]["nama"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["rekening_id"] = "Rekening Id";
	$fieldToolTipspad_pad_jenis_pajak["English"]["rekening_id"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["rekening_kd_sub"] = "Rekening Kd Sub";
	$fieldToolTipspad_pad_jenis_pajak["English"]["rekening_kd_sub"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["rekdenda_id"] = "Rekdenda Id";
	$fieldToolTipspad_pad_jenis_pajak["English"]["rekdenda_id"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["masapajak"] = "Masapajak";
	$fieldToolTipspad_pad_jenis_pajak["English"]["masapajak"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["jatuhtempo"] = "Jatuhtempo";
	$fieldToolTipspad_pad_jenis_pajak["English"]["jatuhtempo"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["multiple"] = "Multiple";
	$fieldToolTipspad_pad_jenis_pajak["English"]["multiple"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["jalan_kelas_id"] = "Jalan Kelas Id";
	$fieldToolTipspad_pad_jenis_pajak["English"]["jalan_kelas_id"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["tmt"] = "Tmt";
	$fieldToolTipspad_pad_jenis_pajak["English"]["tmt"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["enabled"] = "Enabled";
	$fieldToolTipspad_pad_jenis_pajak["English"]["enabled"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["created"] = "Created";
	$fieldToolTipspad_pad_jenis_pajak["English"]["created"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["create_uid"] = "Create Uid";
	$fieldToolTipspad_pad_jenis_pajak["English"]["create_uid"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["updated"] = "Updated";
	$fieldToolTipspad_pad_jenis_pajak["English"]["updated"] = "";
	$fieldLabelspad_pad_jenis_pajak["English"]["update_uid"] = "Update Uid";
	$fieldToolTipspad_pad_jenis_pajak["English"]["update_uid"] = "";
	if (count($fieldToolTipspad_pad_jenis_pajak["English"]))
		$tdatapad_pad_jenis_pajak[".isUseToolTips"] = true;
}
	
	
	$tdatapad_pad_jenis_pajak[".NCSearch"] = true;



$tdatapad_pad_jenis_pajak[".shortTableName"] = "pad_pad_jenis_pajak";
$tdatapad_pad_jenis_pajak[".nSecOptions"] = 0;
$tdatapad_pad_jenis_pajak[".recsPerRowList"] = 1;
$tdatapad_pad_jenis_pajak[".mainTableOwnerID"] = "";
$tdatapad_pad_jenis_pajak[".moveNext"] = 1;
$tdatapad_pad_jenis_pajak[".nType"] = 0;

$tdatapad_pad_jenis_pajak[".strOriginalTableName"] = "pad.pad_jenis_pajak";




$tdatapad_pad_jenis_pajak[".showAddInPopup"] = false;

$tdatapad_pad_jenis_pajak[".showEditInPopup"] = false;

$tdatapad_pad_jenis_pajak[".showViewInPopup"] = false;

$tdatapad_pad_jenis_pajak[".fieldsForRegister"] = array();

$tdatapad_pad_jenis_pajak[".listAjax"] = false;

	$tdatapad_pad_jenis_pajak[".audit"] = false;

	$tdatapad_pad_jenis_pajak[".locking"] = false;

$tdatapad_pad_jenis_pajak[".listIcons"] = true;
$tdatapad_pad_jenis_pajak[".edit"] = true;
$tdatapad_pad_jenis_pajak[".inlineEdit"] = true;
$tdatapad_pad_jenis_pajak[".inlineAdd"] = true;
$tdatapad_pad_jenis_pajak[".view"] = true;

$tdatapad_pad_jenis_pajak[".exportTo"] = true;

$tdatapad_pad_jenis_pajak[".printFriendly"] = true;

$tdatapad_pad_jenis_pajak[".delete"] = true;

$tdatapad_pad_jenis_pajak[".showSimpleSearchOptions"] = false;

$tdatapad_pad_jenis_pajak[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_pad_jenis_pajak[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_pad_jenis_pajak[".isUseAjaxSuggest"] = true;

$tdatapad_pad_jenis_pajak[".rowHighlite"] = true;

// button handlers file names

$tdatapad_pad_jenis_pajak[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_pad_jenis_pajak[".isUseTimeForSearch"] = false;



$tdatapad_pad_jenis_pajak[".useDetailsPreview"] = true;

$tdatapad_pad_jenis_pajak[".allSearchFields"] = array();

$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "id";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "created";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".allSearchFields"][] = "update_uid";

$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "id";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "created";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".googleLikeFields"][] = "update_uid";


$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "id";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "created";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".advSearchFields"][] = "update_uid";

$tdatapad_pad_jenis_pajak[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
			


$tdatapad_pad_jenis_pajak[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_pad_jenis_pajak[".strOrderBy"] = $tstrOrderBy;

$tdatapad_pad_jenis_pajak[".orderindexes"] = array();

$tdatapad_pad_jenis_pajak[".sqlHead"] = "SELECT id,   usaha_id,   nama,   rekening_id,   rekening_kd_sub,   rekdenda_id,   masapajak,   jatuhtempo,   multiple,   jalan_kelas_id,   tmt,   enabled,   created,   create_uid,   updated,   update_uid";
$tdatapad_pad_jenis_pajak[".sqlFrom"] = "FROM \"pad\".pad_jenis_pajak";
$tdatapad_pad_jenis_pajak[".sqlWhereExpr"] = "";
$tdatapad_pad_jenis_pajak[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_pad_jenis_pajak[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_pad_jenis_pajak[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_pad_jenis_pajak = array();
$tableKeyspad_pad_jenis_pajak[] = "id";
$tdatapad_pad_jenis_pajak[".Keys"] = $tableKeyspad_pad_jenis_pajak;

$tdatapad_pad_jenis_pajak[".listFields"] = array();
$tdatapad_pad_jenis_pajak[".listFields"][] = "id";
$tdatapad_pad_jenis_pajak[".listFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".listFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".listFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".listFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".listFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".listFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".listFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".listFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".listFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".listFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".listFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".listFields"][] = "created";
$tdatapad_pad_jenis_pajak[".listFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".listFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".listFields"][] = "update_uid";

$tdatapad_pad_jenis_pajak[".viewFields"] = array();
$tdatapad_pad_jenis_pajak[".viewFields"][] = "id";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "created";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".viewFields"][] = "update_uid";

$tdatapad_pad_jenis_pajak[".addFields"] = array();
$tdatapad_pad_jenis_pajak[".addFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".addFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".addFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".addFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".addFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".addFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".addFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".addFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".addFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".addFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".addFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".addFields"][] = "created";
$tdatapad_pad_jenis_pajak[".addFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".addFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".addFields"][] = "update_uid";

$tdatapad_pad_jenis_pajak[".inlineAddFields"] = array();
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "created";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".inlineAddFields"][] = "update_uid";

$tdatapad_pad_jenis_pajak[".editFields"] = array();
$tdatapad_pad_jenis_pajak[".editFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".editFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".editFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".editFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".editFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".editFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".editFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".editFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".editFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".editFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".editFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".editFields"][] = "created";
$tdatapad_pad_jenis_pajak[".editFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".editFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".editFields"][] = "update_uid";

$tdatapad_pad_jenis_pajak[".inlineEditFields"] = array();
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "created";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".inlineEditFields"][] = "update_uid";

$tdatapad_pad_jenis_pajak[".exportFields"] = array();
$tdatapad_pad_jenis_pajak[".exportFields"][] = "id";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "created";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".exportFields"][] = "update_uid";

$tdatapad_pad_jenis_pajak[".printFields"] = array();
$tdatapad_pad_jenis_pajak[".printFields"][] = "id";
$tdatapad_pad_jenis_pajak[".printFields"][] = "usaha_id";
$tdatapad_pad_jenis_pajak[".printFields"][] = "nama";
$tdatapad_pad_jenis_pajak[".printFields"][] = "rekening_id";
$tdatapad_pad_jenis_pajak[".printFields"][] = "rekening_kd_sub";
$tdatapad_pad_jenis_pajak[".printFields"][] = "rekdenda_id";
$tdatapad_pad_jenis_pajak[".printFields"][] = "masapajak";
$tdatapad_pad_jenis_pajak[".printFields"][] = "jatuhtempo";
$tdatapad_pad_jenis_pajak[".printFields"][] = "multiple";
$tdatapad_pad_jenis_pajak[".printFields"][] = "jalan_kelas_id";
$tdatapad_pad_jenis_pajak[".printFields"][] = "tmt";
$tdatapad_pad_jenis_pajak[".printFields"][] = "enabled";
$tdatapad_pad_jenis_pajak[".printFields"][] = "created";
$tdatapad_pad_jenis_pajak[".printFields"][] = "create_uid";
$tdatapad_pad_jenis_pajak[".printFields"][] = "updated";
$tdatapad_pad_jenis_pajak[".printFields"][] = "update_uid";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Id"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "id"; 
		$fdata["FullName"] = "id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["id"] = $fdata;
//	usaha_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "usaha_id";
	$fdata["GoodName"] = "usaha_id";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Usaha Id"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "usaha_id"; 
		$fdata["FullName"] = "usaha_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "id";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad.pad_usaha";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["usaha_id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Nama"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "nama"; 
		$fdata["FullName"] = "nama";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["nama"] = $fdata;
//	rekening_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "rekening_id";
	$fdata["GoodName"] = "rekening_id";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Rekening Id"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "rekening_id"; 
		$fdata["FullName"] = "rekening_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 2;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "id";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad.pad_rekening";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
				
	
	
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["rekening_id"] = $fdata;
//	rekening_kd_sub
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "rekening_kd_sub";
	$fdata["GoodName"] = "rekening_kd_sub";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Rekening Kd Sub"; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "rekening_kd_sub"; 
		$fdata["FullName"] = "rekening_kd_sub";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=5";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["rekening_kd_sub"] = $fdata;
//	rekdenda_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "rekdenda_id";
	$fdata["GoodName"] = "rekdenda_id";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Rekdenda Id"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "rekdenda_id"; 
		$fdata["FullName"] = "rekdenda_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["rekdenda_id"] = $fdata;
//	masapajak
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "masapajak";
	$fdata["GoodName"] = "masapajak";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Masapajak"; 
	$fdata["FieldType"] = 2;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "masapajak"; 
		$fdata["FullName"] = "masapajak";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["masapajak"] = $fdata;
//	jatuhtempo
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "jatuhtempo";
	$fdata["GoodName"] = "jatuhtempo";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Jatuhtempo"; 
	$fdata["FieldType"] = 2;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "jatuhtempo"; 
		$fdata["FullName"] = "jatuhtempo";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["jatuhtempo"] = $fdata;
//	multiple
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "multiple";
	$fdata["GoodName"] = "multiple";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Multiple"; 
	$fdata["FieldType"] = 2;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "multiple"; 
		$fdata["FullName"] = "multiple";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["multiple"] = $fdata;
//	jalan_kelas_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "jalan_kelas_id";
	$fdata["GoodName"] = "jalan_kelas_id";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Jalan Kelas Id"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "jalan_kelas_id"; 
		$fdata["FullName"] = "jalan_kelas_id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["jalan_kelas_id"] = $fdata;
//	tmt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "tmt";
	$fdata["GoodName"] = "tmt";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Tmt"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "tmt"; 
		$fdata["FullName"] = "tmt";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["tmt"] = $fdata;
//	enabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "enabled";
	$fdata["GoodName"] = "enabled";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Enabled"; 
	$fdata["FieldType"] = 2;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "enabled"; 
		$fdata["FullName"] = "enabled";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["enabled"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Created"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "created"; 
		$fdata["FullName"] = "created";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["created"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Create Uid"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "create_uid"; 
		$fdata["FullName"] = "create_uid";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["create_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Updated"; 
	$fdata["FieldType"] = 135;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "updated"; 
		$fdata["FullName"] = "updated";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["updated"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "pad.pad_jenis_pajak";
	$fdata["Label"] = "Update Uid"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "update_uid"; 
		$fdata["FullName"] = "update_uid";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_pad_jenis_pajak["update_uid"] = $fdata;

	
$tables_data["pad.pad_jenis_pajak"]=&$tdatapad_pad_jenis_pajak;
$field_labels["pad_pad_jenis_pajak"] = &$fieldLabelspad_pad_jenis_pajak;
$fieldToolTips["pad.pad_jenis_pajak"] = &$fieldToolTipspad_pad_jenis_pajak;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.pad_jenis_pajak"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_spt";
	$detailsParam["dDataSourceTable"]="pad.pad_spt";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_spt";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_jenis_pajak"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_jenis_pajak"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_jenis_pajak"][$dIndex]["detailKeys"][]="pajak_id";

$dIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_tarif_pajak";
	$detailsParam["dDataSourceTable"]="pad.pad_tarif_pajak";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_tarif_pajak";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_jenis_pajak"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_jenis_pajak"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_jenis_pajak"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_jenis_pajak"][$dIndex]["detailKeys"][]="pajak_id";
		$detailsTablesData["pad.pad_jenis_pajak"][$dIndex]["detailKeys"][]="pajak_id";

$dIndex = 3-1;
			$strOriginalDetailsTable="pad.pad_terima_line";
	$detailsParam["dDataSourceTable"]="pad.pad_terima_line";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="pad_pad_terima_line";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["pad.pad_jenis_pajak"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["pad.pad_jenis_pajak"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["pad.pad_jenis_pajak"][$dIndex]["detailKeys"][]="pajak_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["pad.pad_jenis_pajak"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="pad.pad_rekening";
	$masterParams["mDataSourceTable"]="pad.pad_rekening";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_rekening";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_jenis_pajak"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_jenis_pajak"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_jenis_pajak"][$mIndex]["detailKeys"][]="rekening_id";

$mIndex = 2-1;
			$strOriginalDetailsTable="pad.pad_usaha";
	$masterParams["mDataSourceTable"]="pad.pad_usaha";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "pad_pad_usaha";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterTablesData["pad.pad_jenis_pajak"][$mIndex] = $masterParams;	
		$masterTablesData["pad.pad_jenis_pajak"][$mIndex]["masterKeys"][]="id";
		$masterTablesData["pad.pad_jenis_pajak"][$mIndex]["detailKeys"][]="usaha_id";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_pad_jenis_pajak()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   usaha_id,   nama,   rekening_id,   rekening_kd_sub,   rekdenda_id,   masapajak,   jatuhtempo,   multiple,   jalan_kelas_id,   tmt,   enabled,   created,   create_uid,   updated,   update_uid";
$proto0["m_strFrom"] = "FROM \"pad\".pad_jenis_pajak";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "usaha_id",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "rekening_id",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "rekening_kd_sub",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "rekdenda_id",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "masapajak",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "jatuhtempo",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "multiple",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "jalan_kelas_id",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "tmt",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "enabled",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "pad.pad_jenis_pajak"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto37=array();
$proto37["m_link"] = "SQLL_MAIN";
			$proto38=array();
$proto38["m_strName"] = "pad.pad_jenis_pajak";
$proto38["m_columns"] = array();
$proto38["m_columns"][] = "id";
$proto38["m_columns"][] = "usaha_id";
$proto38["m_columns"][] = "nama";
$proto38["m_columns"][] = "rekening_id";
$proto38["m_columns"][] = "rekening_kd_sub";
$proto38["m_columns"][] = "rekdenda_id";
$proto38["m_columns"][] = "masapajak";
$proto38["m_columns"][] = "jatuhtempo";
$proto38["m_columns"][] = "multiple";
$proto38["m_columns"][] = "jalan_kelas_id";
$proto38["m_columns"][] = "tmt";
$proto38["m_columns"][] = "enabled";
$proto38["m_columns"][] = "created";
$proto38["m_columns"][] = "create_uid";
$proto38["m_columns"][] = "updated";
$proto38["m_columns"][] = "update_uid";
$obj = new SQLTable($proto38);

$proto37["m_table"] = $obj;
$proto37["m_alias"] = "";
$proto39=array();
$proto39["m_sql"] = "";
$proto39["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto39["m_column"]=$obj;
$proto39["m_contained"] = array();
$proto39["m_strCase"] = "";
$proto39["m_havingmode"] = "0";
$proto39["m_inBrackets"] = "0";
$proto39["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto39);

$proto37["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto37);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_pad_jenis_pajak = createSqlQuery_pad_pad_jenis_pajak();
																$tdatapad_pad_jenis_pajak[".sqlquery"] = $queryData_pad_pad_jenis_pajak;
	
if(isset($tdatapad_pad_jenis_pajak["field2"])){
	$tdatapad_pad_jenis_pajak["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_pad_jenis_pajak["field2"]["LookupOrderBy"] = "name";
	$tdatapad_pad_jenis_pajak["field2"]["LookupType"] = 4;
	$tdatapad_pad_jenis_pajak["field2"]["LinkField"] = "email";
	$tdatapad_pad_jenis_pajak["field2"]["DisplayField"] = "name";
	$tdatapad_pad_jenis_pajak[".hasCustomViewField"] = true;
}

$tableEvents["pad.pad_jenis_pajak"] = new eventsBase;
$tdatapad_pad_jenis_pajak[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.pad_jenis_pajak");

?>