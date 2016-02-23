<?php
require_once(getabspath("classes/cipherer.php"));
$tdataapp_users = array();
	$tdataapp_users[".NumberOfChars"] = 80; 
	$tdataapp_users[".ShortName"] = "app_users";
	$tdataapp_users[".OwnerID"] = "";
	$tdataapp_users[".OriginalTable"] = "app.users";

//	field labels
$fieldLabelsapp_users = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsapp_users["English"] = array();
	$fieldToolTipsapp_users["English"] = array();
	$fieldLabelsapp_users["English"]["userid"] = "Userid";
	$fieldToolTipsapp_users["English"]["userid"] = "";
	$fieldLabelsapp_users["English"]["nama"] = "Nama";
	$fieldToolTipsapp_users["English"]["nama"] = "";
	$fieldLabelsapp_users["English"]["created"] = "Created";
	$fieldToolTipsapp_users["English"]["created"] = "";
	$fieldLabelsapp_users["English"]["disabled"] = "Disabled";
	$fieldToolTipsapp_users["English"]["disabled"] = "";
	$fieldLabelsapp_users["English"]["passwd"] = "Passwd";
	$fieldToolTipsapp_users["English"]["passwd"] = "";
	$fieldLabelsapp_users["English"]["id"] = "Id";
	$fieldToolTipsapp_users["English"]["id"] = "";
	$fieldLabelsapp_users["English"]["kd_kantor"] = "Kd Kantor";
	$fieldToolTipsapp_users["English"]["kd_kantor"] = "";
	$fieldLabelsapp_users["English"]["kd_kanwil"] = "Kd Kanwil";
	$fieldToolTipsapp_users["English"]["kd_kanwil"] = "";
	$fieldLabelsapp_users["English"]["kd_tp"] = "Kd Tp";
	$fieldToolTipsapp_users["English"]["kd_tp"] = "";
	$fieldLabelsapp_users["English"]["kd_kanwil_bank"] = "Kd Kanwil Bank";
	$fieldToolTipsapp_users["English"]["kd_kanwil_bank"] = "";
	$fieldLabelsapp_users["English"]["kd_kppbb_bank"] = "Kd Kppbb Bank";
	$fieldToolTipsapp_users["English"]["kd_kppbb_bank"] = "";
	$fieldLabelsapp_users["English"]["kd_bank_tunggal"] = "Kd Bank Tunggal";
	$fieldToolTipsapp_users["English"]["kd_bank_tunggal"] = "";
	$fieldLabelsapp_users["English"]["kd_bank_persepsi"] = "Kd Bank Persepsi";
	$fieldToolTipsapp_users["English"]["kd_bank_persepsi"] = "";
	$fieldLabelsapp_users["English"]["nip"] = "Nip";
	$fieldToolTipsapp_users["English"]["nip"] = "";
	$fieldLabelsapp_users["English"]["jabatan"] = "Jabatan";
	$fieldToolTipsapp_users["English"]["jabatan"] = "";
	$fieldLabelsapp_users["English"]["handphone"] = "Handphone";
	$fieldToolTipsapp_users["English"]["handphone"] = "";
	$fieldLabelsapp_users["English"]["create_uid"] = "Create Uid";
	$fieldToolTipsapp_users["English"]["create_uid"] = "";
	$fieldLabelsapp_users["English"]["update_uid"] = "Update Uid";
	$fieldToolTipsapp_users["English"]["update_uid"] = "";
	$fieldLabelsapp_users["English"]["updated"] = "Updated";
	$fieldToolTipsapp_users["English"]["updated"] = "";
	$fieldLabelsapp_users["English"]["last_login"] = "Last Login";
	$fieldToolTipsapp_users["English"]["last_login"] = "";
	$fieldLabelsapp_users["English"]["is_login"] = "Is Login";
	$fieldToolTipsapp_users["English"]["is_login"] = "";
	$fieldLabelsapp_users["English"]["is_logout"] = "Is Logout";
	$fieldToolTipsapp_users["English"]["is_logout"] = "";
	$fieldLabelsapp_users["English"]["last_ip"] = "Last Ip";
	$fieldToolTipsapp_users["English"]["last_ip"] = "";
	if (count($fieldToolTipsapp_users["English"]))
		$tdataapp_users[".isUseToolTips"] = true;
}
	
	
	$tdataapp_users[".NCSearch"] = true;



$tdataapp_users[".shortTableName"] = "app_users";
$tdataapp_users[".nSecOptions"] = 0;
$tdataapp_users[".recsPerRowList"] = 1;
$tdataapp_users[".mainTableOwnerID"] = "";
$tdataapp_users[".moveNext"] = 1;
$tdataapp_users[".nType"] = 0;

$tdataapp_users[".strOriginalTableName"] = "app.users";




$tdataapp_users[".showAddInPopup"] = false;

$tdataapp_users[".showEditInPopup"] = false;

$tdataapp_users[".showViewInPopup"] = false;

$tdataapp_users[".fieldsForRegister"] = array();

$tdataapp_users[".listAjax"] = false;

	$tdataapp_users[".audit"] = false;

	$tdataapp_users[".locking"] = false;

$tdataapp_users[".listIcons"] = true;
$tdataapp_users[".edit"] = true;
$tdataapp_users[".inlineEdit"] = true;
$tdataapp_users[".inlineAdd"] = true;
$tdataapp_users[".view"] = true;



$tdataapp_users[".delete"] = true;

$tdataapp_users[".showSimpleSearchOptions"] = false;

$tdataapp_users[".showSearchPanel"] = true;

if (isMobile())
	$tdataapp_users[".isUseAjaxSuggest"] = false;
else 
	$tdataapp_users[".isUseAjaxSuggest"] = true;

$tdataapp_users[".rowHighlite"] = true;

// button handlers file names

$tdataapp_users[".addPageEvents"] = false;

// use timepicker for search panel
$tdataapp_users[".isUseTimeForSearch"] = false;



$tdataapp_users[".useDetailsPreview"] = true;

$tdataapp_users[".allSearchFields"] = array();

$tdataapp_users[".allSearchFields"][] = "userid";
$tdataapp_users[".allSearchFields"][] = "nama";
$tdataapp_users[".allSearchFields"][] = "created";
$tdataapp_users[".allSearchFields"][] = "disabled";
$tdataapp_users[".allSearchFields"][] = "passwd";
$tdataapp_users[".allSearchFields"][] = "id";
$tdataapp_users[".allSearchFields"][] = "kd_kantor";
$tdataapp_users[".allSearchFields"][] = "kd_kanwil";
$tdataapp_users[".allSearchFields"][] = "kd_tp";
$tdataapp_users[".allSearchFields"][] = "kd_kanwil_bank";
$tdataapp_users[".allSearchFields"][] = "kd_kppbb_bank";
$tdataapp_users[".allSearchFields"][] = "kd_bank_tunggal";
$tdataapp_users[".allSearchFields"][] = "kd_bank_persepsi";
$tdataapp_users[".allSearchFields"][] = "nip";
$tdataapp_users[".allSearchFields"][] = "jabatan";
$tdataapp_users[".allSearchFields"][] = "handphone";
$tdataapp_users[".allSearchFields"][] = "create_uid";
$tdataapp_users[".allSearchFields"][] = "update_uid";
$tdataapp_users[".allSearchFields"][] = "updated";
$tdataapp_users[".allSearchFields"][] = "last_login";
$tdataapp_users[".allSearchFields"][] = "is_login";
$tdataapp_users[".allSearchFields"][] = "is_logout";
$tdataapp_users[".allSearchFields"][] = "last_ip";

$tdataapp_users[".googleLikeFields"][] = "userid";
$tdataapp_users[".googleLikeFields"][] = "nama";
$tdataapp_users[".googleLikeFields"][] = "created";
$tdataapp_users[".googleLikeFields"][] = "disabled";
$tdataapp_users[".googleLikeFields"][] = "passwd";
$tdataapp_users[".googleLikeFields"][] = "id";
$tdataapp_users[".googleLikeFields"][] = "kd_kantor";
$tdataapp_users[".googleLikeFields"][] = "kd_kanwil";
$tdataapp_users[".googleLikeFields"][] = "kd_tp";
$tdataapp_users[".googleLikeFields"][] = "kd_kanwil_bank";
$tdataapp_users[".googleLikeFields"][] = "kd_kppbb_bank";
$tdataapp_users[".googleLikeFields"][] = "kd_bank_tunggal";
$tdataapp_users[".googleLikeFields"][] = "kd_bank_persepsi";
$tdataapp_users[".googleLikeFields"][] = "nip";
$tdataapp_users[".googleLikeFields"][] = "jabatan";
$tdataapp_users[".googleLikeFields"][] = "handphone";
$tdataapp_users[".googleLikeFields"][] = "create_uid";
$tdataapp_users[".googleLikeFields"][] = "update_uid";
$tdataapp_users[".googleLikeFields"][] = "updated";
$tdataapp_users[".googleLikeFields"][] = "last_login";
$tdataapp_users[".googleLikeFields"][] = "is_login";
$tdataapp_users[".googleLikeFields"][] = "is_logout";
$tdataapp_users[".googleLikeFields"][] = "last_ip";


$tdataapp_users[".advSearchFields"][] = "userid";
$tdataapp_users[".advSearchFields"][] = "nama";
$tdataapp_users[".advSearchFields"][] = "created";
$tdataapp_users[".advSearchFields"][] = "disabled";
$tdataapp_users[".advSearchFields"][] = "passwd";
$tdataapp_users[".advSearchFields"][] = "id";
$tdataapp_users[".advSearchFields"][] = "kd_kantor";
$tdataapp_users[".advSearchFields"][] = "kd_kanwil";
$tdataapp_users[".advSearchFields"][] = "kd_tp";
$tdataapp_users[".advSearchFields"][] = "kd_kanwil_bank";
$tdataapp_users[".advSearchFields"][] = "kd_kppbb_bank";
$tdataapp_users[".advSearchFields"][] = "kd_bank_tunggal";
$tdataapp_users[".advSearchFields"][] = "kd_bank_persepsi";
$tdataapp_users[".advSearchFields"][] = "nip";
$tdataapp_users[".advSearchFields"][] = "jabatan";
$tdataapp_users[".advSearchFields"][] = "handphone";
$tdataapp_users[".advSearchFields"][] = "create_uid";
$tdataapp_users[".advSearchFields"][] = "update_uid";
$tdataapp_users[".advSearchFields"][] = "updated";
$tdataapp_users[".advSearchFields"][] = "last_login";
$tdataapp_users[".advSearchFields"][] = "is_login";
$tdataapp_users[".advSearchFields"][] = "is_logout";
$tdataapp_users[".advSearchFields"][] = "last_ip";

$tdataapp_users[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main
	


$tdataapp_users[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataapp_users[".strOrderBy"] = $tstrOrderBy;

$tdataapp_users[".orderindexes"] = array();

$tdataapp_users[".sqlHead"] = "SELECT userid,   nama,   created,   disabled,   passwd,   id,   kd_kantor,   kd_kanwil,   kd_tp,   kd_kanwil_bank,   kd_kppbb_bank,   kd_bank_tunggal,   kd_bank_persepsi,   nip,   jabatan,   handphone,   create_uid,   update_uid,   updated,   last_login,   is_login,   is_logout,   last_ip";
$tdataapp_users[".sqlFrom"] = "FROM app.users";
$tdataapp_users[".sqlWhereExpr"] = "";
$tdataapp_users[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataapp_users[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataapp_users[".arrGroupsPerPage"] = $arrGPP;

$tableKeysapp_users = array();
$tableKeysapp_users[] = "id";
$tdataapp_users[".Keys"] = $tableKeysapp_users;

$tdataapp_users[".listFields"] = array();
$tdataapp_users[".listFields"][] = "userid";
$tdataapp_users[".listFields"][] = "nama";
$tdataapp_users[".listFields"][] = "created";
$tdataapp_users[".listFields"][] = "disabled";
$tdataapp_users[".listFields"][] = "passwd";
$tdataapp_users[".listFields"][] = "id";
$tdataapp_users[".listFields"][] = "kd_kantor";
$tdataapp_users[".listFields"][] = "kd_kanwil";
$tdataapp_users[".listFields"][] = "kd_tp";
$tdataapp_users[".listFields"][] = "kd_kanwil_bank";
$tdataapp_users[".listFields"][] = "kd_kppbb_bank";
$tdataapp_users[".listFields"][] = "kd_bank_tunggal";
$tdataapp_users[".listFields"][] = "kd_bank_persepsi";
$tdataapp_users[".listFields"][] = "nip";
$tdataapp_users[".listFields"][] = "jabatan";
$tdataapp_users[".listFields"][] = "handphone";
$tdataapp_users[".listFields"][] = "create_uid";
$tdataapp_users[".listFields"][] = "update_uid";
$tdataapp_users[".listFields"][] = "updated";
$tdataapp_users[".listFields"][] = "last_login";
$tdataapp_users[".listFields"][] = "is_login";
$tdataapp_users[".listFields"][] = "is_logout";
$tdataapp_users[".listFields"][] = "last_ip";

$tdataapp_users[".viewFields"] = array();
$tdataapp_users[".viewFields"][] = "userid";
$tdataapp_users[".viewFields"][] = "nama";
$tdataapp_users[".viewFields"][] = "created";
$tdataapp_users[".viewFields"][] = "disabled";
$tdataapp_users[".viewFields"][] = "passwd";
$tdataapp_users[".viewFields"][] = "id";
$tdataapp_users[".viewFields"][] = "kd_kantor";
$tdataapp_users[".viewFields"][] = "kd_kanwil";
$tdataapp_users[".viewFields"][] = "kd_tp";
$tdataapp_users[".viewFields"][] = "kd_kanwil_bank";
$tdataapp_users[".viewFields"][] = "kd_kppbb_bank";
$tdataapp_users[".viewFields"][] = "kd_bank_tunggal";
$tdataapp_users[".viewFields"][] = "kd_bank_persepsi";
$tdataapp_users[".viewFields"][] = "nip";
$tdataapp_users[".viewFields"][] = "jabatan";
$tdataapp_users[".viewFields"][] = "handphone";
$tdataapp_users[".viewFields"][] = "create_uid";
$tdataapp_users[".viewFields"][] = "update_uid";
$tdataapp_users[".viewFields"][] = "updated";
$tdataapp_users[".viewFields"][] = "last_login";
$tdataapp_users[".viewFields"][] = "is_login";
$tdataapp_users[".viewFields"][] = "is_logout";
$tdataapp_users[".viewFields"][] = "last_ip";

$tdataapp_users[".addFields"] = array();
$tdataapp_users[".addFields"][] = "userid";
$tdataapp_users[".addFields"][] = "nama";
$tdataapp_users[".addFields"][] = "created";
$tdataapp_users[".addFields"][] = "disabled";
$tdataapp_users[".addFields"][] = "passwd";
$tdataapp_users[".addFields"][] = "kd_kantor";
$tdataapp_users[".addFields"][] = "kd_kanwil";
$tdataapp_users[".addFields"][] = "kd_tp";
$tdataapp_users[".addFields"][] = "kd_kanwil_bank";
$tdataapp_users[".addFields"][] = "kd_kppbb_bank";
$tdataapp_users[".addFields"][] = "kd_bank_tunggal";
$tdataapp_users[".addFields"][] = "kd_bank_persepsi";
$tdataapp_users[".addFields"][] = "nip";
$tdataapp_users[".addFields"][] = "jabatan";
$tdataapp_users[".addFields"][] = "handphone";
$tdataapp_users[".addFields"][] = "create_uid";
$tdataapp_users[".addFields"][] = "update_uid";
$tdataapp_users[".addFields"][] = "updated";
$tdataapp_users[".addFields"][] = "last_login";
$tdataapp_users[".addFields"][] = "is_login";
$tdataapp_users[".addFields"][] = "is_logout";
$tdataapp_users[".addFields"][] = "last_ip";

$tdataapp_users[".inlineAddFields"] = array();
$tdataapp_users[".inlineAddFields"][] = "userid";
$tdataapp_users[".inlineAddFields"][] = "nama";
$tdataapp_users[".inlineAddFields"][] = "created";
$tdataapp_users[".inlineAddFields"][] = "disabled";
$tdataapp_users[".inlineAddFields"][] = "passwd";
$tdataapp_users[".inlineAddFields"][] = "kd_kantor";
$tdataapp_users[".inlineAddFields"][] = "kd_kanwil";
$tdataapp_users[".inlineAddFields"][] = "kd_tp";
$tdataapp_users[".inlineAddFields"][] = "kd_kanwil_bank";
$tdataapp_users[".inlineAddFields"][] = "kd_kppbb_bank";
$tdataapp_users[".inlineAddFields"][] = "kd_bank_tunggal";
$tdataapp_users[".inlineAddFields"][] = "kd_bank_persepsi";
$tdataapp_users[".inlineAddFields"][] = "nip";
$tdataapp_users[".inlineAddFields"][] = "jabatan";
$tdataapp_users[".inlineAddFields"][] = "handphone";
$tdataapp_users[".inlineAddFields"][] = "create_uid";
$tdataapp_users[".inlineAddFields"][] = "update_uid";
$tdataapp_users[".inlineAddFields"][] = "updated";
$tdataapp_users[".inlineAddFields"][] = "last_login";
$tdataapp_users[".inlineAddFields"][] = "is_login";
$tdataapp_users[".inlineAddFields"][] = "is_logout";
$tdataapp_users[".inlineAddFields"][] = "last_ip";

$tdataapp_users[".editFields"] = array();
$tdataapp_users[".editFields"][] = "userid";
$tdataapp_users[".editFields"][] = "nama";
$tdataapp_users[".editFields"][] = "created";
$tdataapp_users[".editFields"][] = "disabled";
$tdataapp_users[".editFields"][] = "passwd";
$tdataapp_users[".editFields"][] = "kd_kantor";
$tdataapp_users[".editFields"][] = "kd_kanwil";
$tdataapp_users[".editFields"][] = "kd_tp";
$tdataapp_users[".editFields"][] = "kd_kanwil_bank";
$tdataapp_users[".editFields"][] = "kd_kppbb_bank";
$tdataapp_users[".editFields"][] = "kd_bank_tunggal";
$tdataapp_users[".editFields"][] = "kd_bank_persepsi";
$tdataapp_users[".editFields"][] = "nip";
$tdataapp_users[".editFields"][] = "jabatan";
$tdataapp_users[".editFields"][] = "handphone";
$tdataapp_users[".editFields"][] = "create_uid";
$tdataapp_users[".editFields"][] = "update_uid";
$tdataapp_users[".editFields"][] = "updated";
$tdataapp_users[".editFields"][] = "last_login";
$tdataapp_users[".editFields"][] = "is_login";
$tdataapp_users[".editFields"][] = "is_logout";
$tdataapp_users[".editFields"][] = "last_ip";

$tdataapp_users[".inlineEditFields"] = array();
$tdataapp_users[".inlineEditFields"][] = "userid";
$tdataapp_users[".inlineEditFields"][] = "nama";
$tdataapp_users[".inlineEditFields"][] = "created";
$tdataapp_users[".inlineEditFields"][] = "disabled";
$tdataapp_users[".inlineEditFields"][] = "passwd";
$tdataapp_users[".inlineEditFields"][] = "kd_kantor";
$tdataapp_users[".inlineEditFields"][] = "kd_kanwil";
$tdataapp_users[".inlineEditFields"][] = "kd_tp";
$tdataapp_users[".inlineEditFields"][] = "kd_kanwil_bank";
$tdataapp_users[".inlineEditFields"][] = "kd_kppbb_bank";
$tdataapp_users[".inlineEditFields"][] = "kd_bank_tunggal";
$tdataapp_users[".inlineEditFields"][] = "kd_bank_persepsi";
$tdataapp_users[".inlineEditFields"][] = "nip";
$tdataapp_users[".inlineEditFields"][] = "jabatan";
$tdataapp_users[".inlineEditFields"][] = "handphone";
$tdataapp_users[".inlineEditFields"][] = "create_uid";
$tdataapp_users[".inlineEditFields"][] = "update_uid";
$tdataapp_users[".inlineEditFields"][] = "updated";
$tdataapp_users[".inlineEditFields"][] = "last_login";
$tdataapp_users[".inlineEditFields"][] = "is_login";
$tdataapp_users[".inlineEditFields"][] = "is_logout";
$tdataapp_users[".inlineEditFields"][] = "last_ip";

$tdataapp_users[".exportFields"] = array();
$tdataapp_users[".exportFields"][] = "userid";
$tdataapp_users[".exportFields"][] = "nama";
$tdataapp_users[".exportFields"][] = "created";
$tdataapp_users[".exportFields"][] = "disabled";
$tdataapp_users[".exportFields"][] = "passwd";
$tdataapp_users[".exportFields"][] = "id";
$tdataapp_users[".exportFields"][] = "kd_kantor";
$tdataapp_users[".exportFields"][] = "kd_kanwil";
$tdataapp_users[".exportFields"][] = "kd_tp";
$tdataapp_users[".exportFields"][] = "kd_kanwil_bank";
$tdataapp_users[".exportFields"][] = "kd_kppbb_bank";
$tdataapp_users[".exportFields"][] = "kd_bank_tunggal";
$tdataapp_users[".exportFields"][] = "kd_bank_persepsi";
$tdataapp_users[".exportFields"][] = "nip";
$tdataapp_users[".exportFields"][] = "jabatan";
$tdataapp_users[".exportFields"][] = "handphone";
$tdataapp_users[".exportFields"][] = "create_uid";
$tdataapp_users[".exportFields"][] = "update_uid";
$tdataapp_users[".exportFields"][] = "updated";
$tdataapp_users[".exportFields"][] = "last_login";
$tdataapp_users[".exportFields"][] = "is_login";
$tdataapp_users[".exportFields"][] = "is_logout";
$tdataapp_users[".exportFields"][] = "last_ip";

$tdataapp_users[".printFields"] = array();
$tdataapp_users[".printFields"][] = "userid";
$tdataapp_users[".printFields"][] = "nama";
$tdataapp_users[".printFields"][] = "created";
$tdataapp_users[".printFields"][] = "disabled";
$tdataapp_users[".printFields"][] = "passwd";
$tdataapp_users[".printFields"][] = "id";
$tdataapp_users[".printFields"][] = "kd_kantor";
$tdataapp_users[".printFields"][] = "kd_kanwil";
$tdataapp_users[".printFields"][] = "kd_tp";
$tdataapp_users[".printFields"][] = "kd_kanwil_bank";
$tdataapp_users[".printFields"][] = "kd_kppbb_bank";
$tdataapp_users[".printFields"][] = "kd_bank_tunggal";
$tdataapp_users[".printFields"][] = "kd_bank_persepsi";
$tdataapp_users[".printFields"][] = "nip";
$tdataapp_users[".printFields"][] = "jabatan";
$tdataapp_users[".printFields"][] = "handphone";
$tdataapp_users[".printFields"][] = "create_uid";
$tdataapp_users[".printFields"][] = "update_uid";
$tdataapp_users[".printFields"][] = "updated";
$tdataapp_users[".printFields"][] = "last_login";
$tdataapp_users[".printFields"][] = "is_login";
$tdataapp_users[".printFields"][] = "is_logout";
$tdataapp_users[".printFields"][] = "last_ip";

//	userid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "userid";
	$fdata["GoodName"] = "userid";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Userid"; 
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
	
		$fdata["strField"] = "userid"; 
		$fdata["FullName"] = "userid";
	
		
		
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
			$edata["EditParams"].= " maxlength=25";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["userid"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "app.users";
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
			$edata["EditParams"].= " maxlength=250";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["nama"] = $fdata;
//	created
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "created";
	$fdata["GoodName"] = "created";
	$fdata["ownerTable"] = "app.users";
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
	
		
		
	$tdataapp_users["created"] = $fdata;
//	disabled
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "disabled";
	$fdata["GoodName"] = "disabled";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Disabled"; 
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
	
		$fdata["strField"] = "disabled"; 
		$fdata["FullName"] = "disabled";
	
		
		
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
	
		
		
	$tdataapp_users["disabled"] = $fdata;
//	passwd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "passwd";
	$fdata["GoodName"] = "passwd";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Passwd"; 
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
	
		$fdata["strField"] = "passwd"; 
		$fdata["FullName"] = "passwd";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["passwd"] = $fdata;
//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "app.users";
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
	
		
		
	$tdataapp_users["id"] = $fdata;
//	kd_kantor
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "kd_kantor";
	$fdata["GoodName"] = "kd_kantor";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Kd Kantor"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kd_kantor"; 
		$fdata["FullName"] = "kd_kantor";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["kd_kantor"] = $fdata;
//	kd_kanwil
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "kd_kanwil";
	$fdata["GoodName"] = "kd_kanwil";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Kd Kanwil"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kd_kanwil"; 
		$fdata["FullName"] = "kd_kanwil";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["kd_kanwil"] = $fdata;
//	kd_tp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "kd_tp";
	$fdata["GoodName"] = "kd_tp";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Kd Tp"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kd_tp"; 
		$fdata["FullName"] = "kd_tp";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["kd_tp"] = $fdata;
//	kd_kanwil_bank
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "kd_kanwil_bank";
	$fdata["GoodName"] = "kd_kanwil_bank";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Kd Kanwil Bank"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kd_kanwil_bank"; 
		$fdata["FullName"] = "kd_kanwil_bank";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["kd_kanwil_bank"] = $fdata;
//	kd_kppbb_bank
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "kd_kppbb_bank";
	$fdata["GoodName"] = "kd_kppbb_bank";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Kd Kppbb Bank"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kd_kppbb_bank"; 
		$fdata["FullName"] = "kd_kppbb_bank";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["kd_kppbb_bank"] = $fdata;
//	kd_bank_tunggal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "kd_bank_tunggal";
	$fdata["GoodName"] = "kd_bank_tunggal";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Kd Bank Tunggal"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kd_bank_tunggal"; 
		$fdata["FullName"] = "kd_bank_tunggal";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["kd_bank_tunggal"] = $fdata;
//	kd_bank_persepsi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "kd_bank_persepsi";
	$fdata["GoodName"] = "kd_bank_persepsi";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Kd Bank Persepsi"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "kd_bank_persepsi"; 
		$fdata["FullName"] = "kd_bank_persepsi";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["kd_bank_persepsi"] = $fdata;
//	nip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "nip";
	$fdata["GoodName"] = "nip";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Nip"; 
	$fdata["FieldType"] = 13;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "nip"; 
		$fdata["FullName"] = "nip";
	
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["nip"] = $fdata;
//	jabatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "jabatan";
	$fdata["GoodName"] = "jabatan";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Jabatan"; 
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
	
		$fdata["strField"] = "jabatan"; 
		$fdata["FullName"] = "jabatan";
	
		
		
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
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["jabatan"] = $fdata;
//	handphone
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "handphone";
	$fdata["GoodName"] = "handphone";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Handphone"; 
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
	
		$fdata["strField"] = "handphone"; 
		$fdata["FullName"] = "handphone";
	
		
		
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
			$edata["EditParams"].= " maxlength=20";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["handphone"] = $fdata;
//	create_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "create_uid";
	$fdata["GoodName"] = "create_uid";
	$fdata["ownerTable"] = "app.users";
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
	
		
		
	$tdataapp_users["create_uid"] = $fdata;
//	update_uid
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "update_uid";
	$fdata["GoodName"] = "update_uid";
	$fdata["ownerTable"] = "app.users";
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
	
		
		
	$tdataapp_users["update_uid"] = $fdata;
//	updated
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "updated";
	$fdata["GoodName"] = "updated";
	$fdata["ownerTable"] = "app.users";
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
	
		
		
	$tdataapp_users["updated"] = $fdata;
//	last_login
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "last_login";
	$fdata["GoodName"] = "last_login";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Last Login"; 
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
	
		$fdata["strField"] = "last_login"; 
		$fdata["FullName"] = "last_login";
	
		
		
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
	
		
		
	$tdataapp_users["last_login"] = $fdata;
//	is_login
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "is_login";
	$fdata["GoodName"] = "is_login";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Is Login"; 
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
	
		$fdata["strField"] = "is_login"; 
		$fdata["FullName"] = "is_login";
	
		
		
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
	
		
		
	$tdataapp_users["is_login"] = $fdata;
//	is_logout
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "is_logout";
	$fdata["GoodName"] = "is_logout";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Is Logout"; 
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
	
		$fdata["strField"] = "is_logout"; 
		$fdata["FullName"] = "is_logout";
	
		
		
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
	
		
		
	$tdataapp_users["is_logout"] = $fdata;
//	last_ip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "last_ip";
	$fdata["GoodName"] = "last_ip";
	$fdata["ownerTable"] = "app.users";
	$fdata["Label"] = "Last Ip"; 
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
	
		$fdata["strField"] = "last_ip"; 
		$fdata["FullName"] = "last_ip";
	
		
		
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
			$edata["EditParams"].= " maxlength=20";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataapp_users["last_ip"] = $fdata;

	
$tables_data["app.users"]=&$tdataapp_users;
$field_labels["app_users"] = &$fieldLabelsapp_users;
$fieldToolTips["app.users"] = &$fieldToolTipsapp_users;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["app.users"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="app.user_groups";
	$detailsParam["dDataSourceTable"]="app.user_groups";
	$detailsParam["dOriginalTable"]=$strOriginalDetailsTable;
	$detailsParam["dShortTable"]="app_user_groups";
	$detailsParam["masterKeys"]=array();
	$detailsParam["detailKeys"]=array();
	$detailsParam["dispChildCount"]= "1";
	$detailsParam["hideChild"]="0";
	$detailsParam["previewOnList"]= 1;
	$detailsParam["previewOnAdd"]= 0;
	$detailsParam["previewOnEdit"]= 0;
	$detailsParam["previewOnView"]= 0;
		
	$detailsTablesData["app.users"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["app.users"][$dIndex]["masterKeys"][]="id";
		$detailsTablesData["app.users"][$dIndex]["detailKeys"][]="user_id";

	
// tables which are master tables for current table (detail)
$masterTablesData["app.users"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_app_users()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "userid,   nama,   created,   disabled,   passwd,   id,   kd_kantor,   kd_kanwil,   kd_tp,   kd_kanwil_bank,   kd_kppbb_bank,   kd_bank_tunggal,   kd_bank_persepsi,   nip,   jabatan,   handphone,   create_uid,   update_uid,   updated,   last_login,   is_login,   is_logout,   last_ip";
$proto0["m_strFrom"] = "FROM app.users";
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
	"m_strName" => "userid",
	"m_strTable" => "app.users"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "app.users"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "created",
	"m_strTable" => "app.users"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "disabled",
	"m_strTable" => "app.users"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "passwd",
	"m_strTable" => "app.users"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "app.users"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_kantor",
	"m_strTable" => "app.users"
));

$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_kanwil",
	"m_strTable" => "app.users"
));

$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_tp",
	"m_strTable" => "app.users"
));

$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_kanwil_bank",
	"m_strTable" => "app.users"
));

$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_kppbb_bank",
	"m_strTable" => "app.users"
));

$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_bank_tunggal",
	"m_strTable" => "app.users"
));

$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
						$proto29=array();
			$obj = new SQLField(array(
	"m_strName" => "kd_bank_persepsi",
	"m_strTable" => "app.users"
));

$proto29["m_expr"]=$obj;
$proto29["m_alias"] = "";
$obj = new SQLFieldListItem($proto29);

$proto0["m_fieldlist"][]=$obj;
						$proto31=array();
			$obj = new SQLField(array(
	"m_strName" => "nip",
	"m_strTable" => "app.users"
));

$proto31["m_expr"]=$obj;
$proto31["m_alias"] = "";
$obj = new SQLFieldListItem($proto31);

$proto0["m_fieldlist"][]=$obj;
						$proto33=array();
			$obj = new SQLField(array(
	"m_strName" => "jabatan",
	"m_strTable" => "app.users"
));

$proto33["m_expr"]=$obj;
$proto33["m_alias"] = "";
$obj = new SQLFieldListItem($proto33);

$proto0["m_fieldlist"][]=$obj;
						$proto35=array();
			$obj = new SQLField(array(
	"m_strName" => "handphone",
	"m_strTable" => "app.users"
));

$proto35["m_expr"]=$obj;
$proto35["m_alias"] = "";
$obj = new SQLFieldListItem($proto35);

$proto0["m_fieldlist"][]=$obj;
						$proto37=array();
			$obj = new SQLField(array(
	"m_strName" => "create_uid",
	"m_strTable" => "app.users"
));

$proto37["m_expr"]=$obj;
$proto37["m_alias"] = "";
$obj = new SQLFieldListItem($proto37);

$proto0["m_fieldlist"][]=$obj;
						$proto39=array();
			$obj = new SQLField(array(
	"m_strName" => "update_uid",
	"m_strTable" => "app.users"
));

$proto39["m_expr"]=$obj;
$proto39["m_alias"] = "";
$obj = new SQLFieldListItem($proto39);

$proto0["m_fieldlist"][]=$obj;
						$proto41=array();
			$obj = new SQLField(array(
	"m_strName" => "updated",
	"m_strTable" => "app.users"
));

$proto41["m_expr"]=$obj;
$proto41["m_alias"] = "";
$obj = new SQLFieldListItem($proto41);

$proto0["m_fieldlist"][]=$obj;
						$proto43=array();
			$obj = new SQLField(array(
	"m_strName" => "last_login",
	"m_strTable" => "app.users"
));

$proto43["m_expr"]=$obj;
$proto43["m_alias"] = "";
$obj = new SQLFieldListItem($proto43);

$proto0["m_fieldlist"][]=$obj;
						$proto45=array();
			$obj = new SQLField(array(
	"m_strName" => "is_login",
	"m_strTable" => "app.users"
));

$proto45["m_expr"]=$obj;
$proto45["m_alias"] = "";
$obj = new SQLFieldListItem($proto45);

$proto0["m_fieldlist"][]=$obj;
						$proto47=array();
			$obj = new SQLField(array(
	"m_strName" => "is_logout",
	"m_strTable" => "app.users"
));

$proto47["m_expr"]=$obj;
$proto47["m_alias"] = "";
$obj = new SQLFieldListItem($proto47);

$proto0["m_fieldlist"][]=$obj;
						$proto49=array();
			$obj = new SQLField(array(
	"m_strName" => "last_ip",
	"m_strTable" => "app.users"
));

$proto49["m_expr"]=$obj;
$proto49["m_alias"] = "";
$obj = new SQLFieldListItem($proto49);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto51=array();
$proto51["m_link"] = "SQLL_MAIN";
			$proto52=array();
$proto52["m_strName"] = "app.users";
$proto52["m_columns"] = array();
$proto52["m_columns"][] = "userid";
$proto52["m_columns"][] = "nama";
$proto52["m_columns"][] = "created";
$proto52["m_columns"][] = "disabled";
$proto52["m_columns"][] = "passwd";
$proto52["m_columns"][] = "id";
$proto52["m_columns"][] = "kd_kantor";
$proto52["m_columns"][] = "kd_kanwil";
$proto52["m_columns"][] = "kd_tp";
$proto52["m_columns"][] = "kd_kanwil_bank";
$proto52["m_columns"][] = "kd_kppbb_bank";
$proto52["m_columns"][] = "kd_bank_tunggal";
$proto52["m_columns"][] = "kd_bank_persepsi";
$proto52["m_columns"][] = "nip";
$proto52["m_columns"][] = "jabatan";
$proto52["m_columns"][] = "handphone";
$proto52["m_columns"][] = "create_uid";
$proto52["m_columns"][] = "update_uid";
$proto52["m_columns"][] = "updated";
$proto52["m_columns"][] = "last_login";
$proto52["m_columns"][] = "is_login";
$proto52["m_columns"][] = "is_logout";
$proto52["m_columns"][] = "last_ip";
$obj = new SQLTable($proto52);

$proto51["m_table"] = $obj;
$proto51["m_alias"] = "";
$proto53=array();
$proto53["m_sql"] = "";
$proto53["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto53["m_column"]=$obj;
$proto53["m_contained"] = array();
$proto53["m_strCase"] = "";
$proto53["m_havingmode"] = "0";
$proto53["m_inBrackets"] = "0";
$proto53["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto53);

$proto51["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto51);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_app_users = createSqlQuery_app_users();
																							$tdataapp_users[".sqlquery"] = $queryData_app_users;
	
if(isset($tdataapp_users["field2"])){
	$tdataapp_users["field2"]["LookupTable"] = "carscars_view";
	$tdataapp_users["field2"]["LookupOrderBy"] = "name";
	$tdataapp_users["field2"]["LookupType"] = 4;
	$tdataapp_users["field2"]["LinkField"] = "email";
	$tdataapp_users["field2"]["DisplayField"] = "name";
	$tdataapp_users[".hasCustomViewField"] = true;
}

$tableEvents["app.users"] = new eventsBase;
$tdataapp_users[".hasEvents"] = false;

$cipherer = new RunnerCipherer("app.users");

?>