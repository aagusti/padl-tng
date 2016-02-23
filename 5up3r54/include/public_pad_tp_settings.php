<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_pad_tp = array();
	$tdatapublic_pad_tp[".NumberOfChars"] = 80; 
	$tdatapublic_pad_tp[".ShortName"] = "public_pad_tp";
	$tdatapublic_pad_tp[".OwnerID"] = "";
	$tdatapublic_pad_tp[".OriginalTable"] = "public.pad_tp";

//	field labels
$fieldLabelspublic_pad_tp = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_pad_tp["English"] = array();
	$fieldToolTipspublic_pad_tp["English"] = array();
	$fieldLabelspublic_pad_tp["English"]["id"] = "Id";
	$fieldToolTipspublic_pad_tp["English"]["id"] = "";
	$fieldLabelspublic_pad_tp["English"]["singkatan"] = "Singkatan";
	$fieldToolTipspublic_pad_tp["English"]["singkatan"] = "";
	$fieldLabelspublic_pad_tp["English"]["nama"] = "Nama";
	$fieldToolTipspublic_pad_tp["English"]["nama"] = "";
	if (count($fieldToolTipspublic_pad_tp["English"]))
		$tdatapublic_pad_tp[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_pad_tp[".NCSearch"] = true;



$tdatapublic_pad_tp[".shortTableName"] = "public_pad_tp";
$tdatapublic_pad_tp[".nSecOptions"] = 0;
$tdatapublic_pad_tp[".recsPerRowList"] = 1;
$tdatapublic_pad_tp[".mainTableOwnerID"] = "";
$tdatapublic_pad_tp[".moveNext"] = 1;
$tdatapublic_pad_tp[".nType"] = 0;

$tdatapublic_pad_tp[".strOriginalTableName"] = "public.pad_tp";




$tdatapublic_pad_tp[".showAddInPopup"] = false;

$tdatapublic_pad_tp[".showEditInPopup"] = false;

$tdatapublic_pad_tp[".showViewInPopup"] = false;

$tdatapublic_pad_tp[".fieldsForRegister"] = array();

$tdatapublic_pad_tp[".listAjax"] = false;

	$tdatapublic_pad_tp[".audit"] = false;

	$tdatapublic_pad_tp[".locking"] = false;

$tdatapublic_pad_tp[".listIcons"] = true;
$tdatapublic_pad_tp[".edit"] = true;
$tdatapublic_pad_tp[".inlineEdit"] = true;
$tdatapublic_pad_tp[".inlineAdd"] = true;
$tdatapublic_pad_tp[".view"] = true;

$tdatapublic_pad_tp[".exportTo"] = true;

$tdatapublic_pad_tp[".printFriendly"] = true;

$tdatapublic_pad_tp[".delete"] = true;

$tdatapublic_pad_tp[".showSimpleSearchOptions"] = false;

$tdatapublic_pad_tp[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_pad_tp[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_pad_tp[".isUseAjaxSuggest"] = true;

$tdatapublic_pad_tp[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_pad_tp[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_pad_tp[".isUseTimeForSearch"] = false;




$tdatapublic_pad_tp[".allSearchFields"] = array();

$tdatapublic_pad_tp[".allSearchFields"][] = "id";
$tdatapublic_pad_tp[".allSearchFields"][] = "singkatan";
$tdatapublic_pad_tp[".allSearchFields"][] = "nama";

$tdatapublic_pad_tp[".googleLikeFields"][] = "id";
$tdatapublic_pad_tp[".googleLikeFields"][] = "singkatan";
$tdatapublic_pad_tp[".googleLikeFields"][] = "nama";


$tdatapublic_pad_tp[".advSearchFields"][] = "id";
$tdatapublic_pad_tp[".advSearchFields"][] = "singkatan";
$tdatapublic_pad_tp[".advSearchFields"][] = "nama";

$tdatapublic_pad_tp[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_pad_tp[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_pad_tp[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_pad_tp[".orderindexes"] = array();

$tdatapublic_pad_tp[".sqlHead"] = "SELECT id,   singkatan,   nama";
$tdatapublic_pad_tp[".sqlFrom"] = "FROM \"public\".pad_tp";
$tdatapublic_pad_tp[".sqlWhereExpr"] = "";
$tdatapublic_pad_tp[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_pad_tp[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_pad_tp[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_pad_tp = array();
$tableKeyspublic_pad_tp[] = "id";
$tdatapublic_pad_tp[".Keys"] = $tableKeyspublic_pad_tp;

$tdatapublic_pad_tp[".listFields"] = array();
$tdatapublic_pad_tp[".listFields"][] = "id";
$tdatapublic_pad_tp[".listFields"][] = "singkatan";
$tdatapublic_pad_tp[".listFields"][] = "nama";

$tdatapublic_pad_tp[".viewFields"] = array();
$tdatapublic_pad_tp[".viewFields"][] = "id";
$tdatapublic_pad_tp[".viewFields"][] = "singkatan";
$tdatapublic_pad_tp[".viewFields"][] = "nama";

$tdatapublic_pad_tp[".addFields"] = array();
$tdatapublic_pad_tp[".addFields"][] = "singkatan";
$tdatapublic_pad_tp[".addFields"][] = "nama";

$tdatapublic_pad_tp[".inlineAddFields"] = array();
$tdatapublic_pad_tp[".inlineAddFields"][] = "singkatan";
$tdatapublic_pad_tp[".inlineAddFields"][] = "nama";

$tdatapublic_pad_tp[".editFields"] = array();
$tdatapublic_pad_tp[".editFields"][] = "singkatan";
$tdatapublic_pad_tp[".editFields"][] = "nama";

$tdatapublic_pad_tp[".inlineEditFields"] = array();
$tdatapublic_pad_tp[".inlineEditFields"][] = "singkatan";
$tdatapublic_pad_tp[".inlineEditFields"][] = "nama";

$tdatapublic_pad_tp[".exportFields"] = array();
$tdatapublic_pad_tp[".exportFields"][] = "id";
$tdatapublic_pad_tp[".exportFields"][] = "singkatan";
$tdatapublic_pad_tp[".exportFields"][] = "nama";

$tdatapublic_pad_tp[".printFields"] = array();
$tdatapublic_pad_tp[".printFields"][] = "id";
$tdatapublic_pad_tp[".printFields"][] = "singkatan";
$tdatapublic_pad_tp[".printFields"][] = "nama";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "public.pad_tp";
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
	
		
		
	$tdatapublic_pad_tp["id"] = $fdata;
//	singkatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "singkatan";
	$fdata["GoodName"] = "singkatan";
	$fdata["ownerTable"] = "public.pad_tp";
	$fdata["Label"] = "Singkatan"; 
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
	
		$fdata["strField"] = "singkatan"; 
		$fdata["FullName"] = "singkatan";
	
		
		
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
			$edata["EditParams"].= " maxlength=16";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_tp["singkatan"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "public.pad_tp";
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
			$edata["EditParams"].= " maxlength=32";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_tp["nama"] = $fdata;

	
$tables_data["public.pad_tp"]=&$tdatapublic_pad_tp;
$field_labels["public_pad_tp"] = &$fieldLabelspublic_pad_tp;
$fieldToolTips["public.pad_tp"] = &$fieldToolTipspublic_pad_tp;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.pad_tp"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.pad_tp"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_pad_tp()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   singkatan,   nama";
$proto0["m_strFrom"] = "FROM \"public\".pad_tp";
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
	"m_strTable" => "public.pad_tp"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "singkatan",
	"m_strTable" => "public.pad_tp"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "public.pad_tp"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto11=array();
$proto11["m_link"] = "SQLL_MAIN";
			$proto12=array();
$proto12["m_strName"] = "public.pad_tp";
$proto12["m_columns"] = array();
$proto12["m_columns"][] = "id";
$proto12["m_columns"][] = "singkatan";
$proto12["m_columns"][] = "nama";
$obj = new SQLTable($proto12);

$proto11["m_table"] = $obj;
$proto11["m_alias"] = "";
$proto13=array();
$proto13["m_sql"] = "";
$proto13["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto13["m_column"]=$obj;
$proto13["m_contained"] = array();
$proto13["m_strCase"] = "";
$proto13["m_havingmode"] = "0";
$proto13["m_inBrackets"] = "0";
$proto13["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto13);

$proto11["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto11);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_public_pad_tp = createSqlQuery_public_pad_tp();
			$tdatapublic_pad_tp[".sqlquery"] = $queryData_public_pad_tp;
	
if(isset($tdatapublic_pad_tp["field2"])){
	$tdatapublic_pad_tp["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_pad_tp["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_pad_tp["field2"]["LookupType"] = 4;
	$tdatapublic_pad_tp["field2"]["LinkField"] = "email";
	$tdatapublic_pad_tp["field2"]["DisplayField"] = "name";
	$tdatapublic_pad_tp[".hasCustomViewField"] = true;
}

$tableEvents["public.pad_tp"] = new eventsBase;
$tdatapublic_pad_tp[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.pad_tp");

?>