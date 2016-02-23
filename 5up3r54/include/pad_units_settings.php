<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapad_units = array();
	$tdatapad_units[".NumberOfChars"] = 80; 
	$tdatapad_units[".ShortName"] = "pad_units";
	$tdatapad_units[".OwnerID"] = "";
	$tdatapad_units[".OriginalTable"] = "pad.units";

//	field labels
$fieldLabelspad_units = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspad_units["English"] = array();
	$fieldToolTipspad_units["English"] = array();
	$fieldLabelspad_units["English"]["kode"] = "Kode";
	$fieldToolTipspad_units["English"]["kode"] = "";
	$fieldLabelspad_units["English"]["nama"] = "Nama";
	$fieldToolTipspad_units["English"]["nama"] = "";
	$fieldLabelspad_units["English"]["kategori"] = "Kategori";
	$fieldToolTipspad_units["English"]["kategori"] = "";
	$fieldLabelspad_units["English"]["singkat"] = "Singkat";
	$fieldToolTipspad_units["English"]["singkat"] = "";
	$fieldLabelspad_units["English"]["id"] = "Id";
	$fieldToolTipspad_units["English"]["id"] = "";
	$fieldLabelspad_units["English"]["urusan_id"] = "Urusan Id";
	$fieldToolTipspad_units["English"]["urusan_id"] = "";
	if (count($fieldToolTipspad_units["English"]))
		$tdatapad_units[".isUseToolTips"] = true;
}
	
	
	$tdatapad_units[".NCSearch"] = true;



$tdatapad_units[".shortTableName"] = "pad_units";
$tdatapad_units[".nSecOptions"] = 0;
$tdatapad_units[".recsPerRowList"] = 1;
$tdatapad_units[".mainTableOwnerID"] = "";
$tdatapad_units[".moveNext"] = 1;
$tdatapad_units[".nType"] = 0;

$tdatapad_units[".strOriginalTableName"] = "pad.units";




$tdatapad_units[".showAddInPopup"] = false;

$tdatapad_units[".showEditInPopup"] = false;

$tdatapad_units[".showViewInPopup"] = false;

$tdatapad_units[".fieldsForRegister"] = array();

$tdatapad_units[".listAjax"] = false;

	$tdatapad_units[".audit"] = false;

	$tdatapad_units[".locking"] = false;

$tdatapad_units[".listIcons"] = true;
$tdatapad_units[".edit"] = true;
$tdatapad_units[".inlineEdit"] = true;
$tdatapad_units[".inlineAdd"] = true;
$tdatapad_units[".view"] = true;

$tdatapad_units[".exportTo"] = true;

$tdatapad_units[".printFriendly"] = true;

$tdatapad_units[".delete"] = true;

$tdatapad_units[".showSimpleSearchOptions"] = false;

$tdatapad_units[".showSearchPanel"] = true;

if (isMobile())
	$tdatapad_units[".isUseAjaxSuggest"] = false;
else 
	$tdatapad_units[".isUseAjaxSuggest"] = true;

$tdatapad_units[".rowHighlite"] = true;

// button handlers file names

$tdatapad_units[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapad_units[".isUseTimeForSearch"] = false;




$tdatapad_units[".allSearchFields"] = array();

$tdatapad_units[".allSearchFields"][] = "kode";
$tdatapad_units[".allSearchFields"][] = "nama";
$tdatapad_units[".allSearchFields"][] = "kategori";
$tdatapad_units[".allSearchFields"][] = "singkat";
$tdatapad_units[".allSearchFields"][] = "id";
$tdatapad_units[".allSearchFields"][] = "urusan_id";

$tdatapad_units[".googleLikeFields"][] = "kode";
$tdatapad_units[".googleLikeFields"][] = "nama";
$tdatapad_units[".googleLikeFields"][] = "kategori";
$tdatapad_units[".googleLikeFields"][] = "singkat";
$tdatapad_units[".googleLikeFields"][] = "id";
$tdatapad_units[".googleLikeFields"][] = "urusan_id";


$tdatapad_units[".advSearchFields"][] = "kode";
$tdatapad_units[".advSearchFields"][] = "nama";
$tdatapad_units[".advSearchFields"][] = "kategori";
$tdatapad_units[".advSearchFields"][] = "singkat";
$tdatapad_units[".advSearchFields"][] = "id";
$tdatapad_units[".advSearchFields"][] = "urusan_id";

$tdatapad_units[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapad_units[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapad_units[".strOrderBy"] = $tstrOrderBy;

$tdatapad_units[".orderindexes"] = array();

$tdatapad_units[".sqlHead"] = "SELECT kode,   nama,   kategori,   singkat,   id,   urusan_id";
$tdatapad_units[".sqlFrom"] = "FROM \"pad\".units";
$tdatapad_units[".sqlWhereExpr"] = "";
$tdatapad_units[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapad_units[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapad_units[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspad_units = array();
$tableKeyspad_units[] = "id";
$tdatapad_units[".Keys"] = $tableKeyspad_units;

$tdatapad_units[".listFields"] = array();
$tdatapad_units[".listFields"][] = "kode";
$tdatapad_units[".listFields"][] = "nama";
$tdatapad_units[".listFields"][] = "kategori";
$tdatapad_units[".listFields"][] = "singkat";
$tdatapad_units[".listFields"][] = "id";
$tdatapad_units[".listFields"][] = "urusan_id";

$tdatapad_units[".viewFields"] = array();
$tdatapad_units[".viewFields"][] = "kode";
$tdatapad_units[".viewFields"][] = "nama";
$tdatapad_units[".viewFields"][] = "kategori";
$tdatapad_units[".viewFields"][] = "singkat";
$tdatapad_units[".viewFields"][] = "id";
$tdatapad_units[".viewFields"][] = "urusan_id";

$tdatapad_units[".addFields"] = array();
$tdatapad_units[".addFields"][] = "kode";
$tdatapad_units[".addFields"][] = "nama";
$tdatapad_units[".addFields"][] = "kategori";
$tdatapad_units[".addFields"][] = "singkat";
$tdatapad_units[".addFields"][] = "urusan_id";

$tdatapad_units[".inlineAddFields"] = array();
$tdatapad_units[".inlineAddFields"][] = "kode";
$tdatapad_units[".inlineAddFields"][] = "nama";
$tdatapad_units[".inlineAddFields"][] = "kategori";
$tdatapad_units[".inlineAddFields"][] = "singkat";
$tdatapad_units[".inlineAddFields"][] = "urusan_id";

$tdatapad_units[".editFields"] = array();
$tdatapad_units[".editFields"][] = "kode";
$tdatapad_units[".editFields"][] = "nama";
$tdatapad_units[".editFields"][] = "kategori";
$tdatapad_units[".editFields"][] = "singkat";
$tdatapad_units[".editFields"][] = "urusan_id";

$tdatapad_units[".inlineEditFields"] = array();
$tdatapad_units[".inlineEditFields"][] = "kode";
$tdatapad_units[".inlineEditFields"][] = "nama";
$tdatapad_units[".inlineEditFields"][] = "kategori";
$tdatapad_units[".inlineEditFields"][] = "singkat";
$tdatapad_units[".inlineEditFields"][] = "urusan_id";

$tdatapad_units[".exportFields"] = array();
$tdatapad_units[".exportFields"][] = "kode";
$tdatapad_units[".exportFields"][] = "nama";
$tdatapad_units[".exportFields"][] = "kategori";
$tdatapad_units[".exportFields"][] = "singkat";
$tdatapad_units[".exportFields"][] = "id";
$tdatapad_units[".exportFields"][] = "urusan_id";

$tdatapad_units[".printFields"] = array();
$tdatapad_units[".printFields"][] = "kode";
$tdatapad_units[".printFields"][] = "nama";
$tdatapad_units[".printFields"][] = "kategori";
$tdatapad_units[".printFields"][] = "singkat";
$tdatapad_units[".printFields"][] = "id";
$tdatapad_units[".printFields"][] = "urusan_id";

//	kode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "kode";
	$fdata["GoodName"] = "kode";
	$fdata["ownerTable"] = "pad.units";
	$fdata["Label"] = "Kode"; 
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
	
		$fdata["strField"] = "kode"; 
		$fdata["FullName"] = "kode";
	
		
		
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
	
		
		
	$tdatapad_units["kode"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "pad.units";
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
			$edata["EditParams"].= " maxlength=220";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapad_units["nama"] = $fdata;
//	kategori
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "kategori";
	$fdata["GoodName"] = "kategori";
	$fdata["ownerTable"] = "pad.units";
	$fdata["Label"] = "Kategori"; 
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
	
		$fdata["strField"] = "kategori"; 
		$fdata["FullName"] = "kategori";
	
		
		
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
	
		
		
	$tdatapad_units["kategori"] = $fdata;
//	singkat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "singkat";
	$fdata["GoodName"] = "singkat";
	$fdata["ownerTable"] = "pad.units";
	$fdata["Label"] = "Singkat"; 
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
	
		$fdata["strField"] = "singkat"; 
		$fdata["FullName"] = "singkat";
	
		
		
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
	
		
		
	$tdatapad_units["singkat"] = $fdata;
//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "pad.units";
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
	
		
		
	$tdatapad_units["id"] = $fdata;
//	urusan_id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "urusan_id";
	$fdata["GoodName"] = "urusan_id";
	$fdata["ownerTable"] = "pad.units";
	$fdata["Label"] = "Urusan Id"; 
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
	
		$fdata["strField"] = "urusan_id"; 
		$fdata["FullName"] = "urusan_id";
	
		
		
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
	
		
		
	$tdatapad_units["urusan_id"] = $fdata;

	
$tables_data["pad.units"]=&$tdatapad_units;
$field_labels["pad_units"] = &$fieldLabelspad_units;
$fieldToolTips["pad.units"] = &$fieldToolTipspad_units;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pad.units"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["pad.units"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pad_units()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "kode,   nama,   kategori,   singkat,   id,   urusan_id";
$proto0["m_strFrom"] = "FROM \"pad\".units";
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
	"m_strName" => "kode",
	"m_strTable" => "pad.units"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "pad.units"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "kategori",
	"m_strTable" => "pad.units"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "singkat",
	"m_strTable" => "pad.units"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "pad.units"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "urusan_id",
	"m_strTable" => "pad.units"
));

$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto17=array();
$proto17["m_link"] = "SQLL_MAIN";
			$proto18=array();
$proto18["m_strName"] = "pad.units";
$proto18["m_columns"] = array();
$proto18["m_columns"][] = "kode";
$proto18["m_columns"][] = "nama";
$proto18["m_columns"][] = "kategori";
$proto18["m_columns"][] = "singkat";
$proto18["m_columns"][] = "id";
$proto18["m_columns"][] = "urusan_id";
$obj = new SQLTable($proto18);

$proto17["m_table"] = $obj;
$proto17["m_alias"] = "";
$proto19=array();
$proto19["m_sql"] = "";
$proto19["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto19["m_column"]=$obj;
$proto19["m_contained"] = array();
$proto19["m_strCase"] = "";
$proto19["m_havingmode"] = "0";
$proto19["m_inBrackets"] = "0";
$proto19["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto19);

$proto17["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto17);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pad_units = createSqlQuery_pad_units();
						$tdatapad_units[".sqlquery"] = $queryData_pad_units;
	
if(isset($tdatapad_units["field2"])){
	$tdatapad_units["field2"]["LookupTable"] = "carscars_view";
	$tdatapad_units["field2"]["LookupOrderBy"] = "name";
	$tdatapad_units["field2"]["LookupType"] = 4;
	$tdatapad_units["field2"]["LinkField"] = "email";
	$tdatapad_units["field2"]["DisplayField"] = "name";
	$tdatapad_units[".hasCustomViewField"] = true;
}

$tableEvents["pad.units"] = new eventsBase;
$tdatapad_units[".hasEvents"] = false;

$cipherer = new RunnerCipherer("pad.units");

?>