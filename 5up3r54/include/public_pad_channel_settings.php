<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_pad_channel = array();
	$tdatapublic_pad_channel[".NumberOfChars"] = 80; 
	$tdatapublic_pad_channel[".ShortName"] = "public_pad_channel";
	$tdatapublic_pad_channel[".OwnerID"] = "";
	$tdatapublic_pad_channel[".OriginalTable"] = "public.pad_channel";

//	field labels
$fieldLabelspublic_pad_channel = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_pad_channel["English"] = array();
	$fieldToolTipspublic_pad_channel["English"] = array();
	$fieldLabelspublic_pad_channel["English"]["id"] = "Id";
	$fieldToolTipspublic_pad_channel["English"]["id"] = "";
	$fieldLabelspublic_pad_channel["English"]["nama"] = "Nama";
	$fieldToolTipspublic_pad_channel["English"]["nama"] = "";
	if (count($fieldToolTipspublic_pad_channel["English"]))
		$tdatapublic_pad_channel[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_pad_channel[".NCSearch"] = true;



$tdatapublic_pad_channel[".shortTableName"] = "public_pad_channel";
$tdatapublic_pad_channel[".nSecOptions"] = 0;
$tdatapublic_pad_channel[".recsPerRowList"] = 1;
$tdatapublic_pad_channel[".mainTableOwnerID"] = "";
$tdatapublic_pad_channel[".moveNext"] = 1;
$tdatapublic_pad_channel[".nType"] = 0;

$tdatapublic_pad_channel[".strOriginalTableName"] = "public.pad_channel";




$tdatapublic_pad_channel[".showAddInPopup"] = false;

$tdatapublic_pad_channel[".showEditInPopup"] = false;

$tdatapublic_pad_channel[".showViewInPopup"] = false;

$tdatapublic_pad_channel[".fieldsForRegister"] = array();

$tdatapublic_pad_channel[".listAjax"] = false;

	$tdatapublic_pad_channel[".audit"] = false;

	$tdatapublic_pad_channel[".locking"] = false;

$tdatapublic_pad_channel[".listIcons"] = true;
$tdatapublic_pad_channel[".edit"] = true;
$tdatapublic_pad_channel[".inlineEdit"] = true;
$tdatapublic_pad_channel[".inlineAdd"] = true;
$tdatapublic_pad_channel[".view"] = true;

$tdatapublic_pad_channel[".exportTo"] = true;

$tdatapublic_pad_channel[".printFriendly"] = true;

$tdatapublic_pad_channel[".delete"] = true;

$tdatapublic_pad_channel[".showSimpleSearchOptions"] = false;

$tdatapublic_pad_channel[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_pad_channel[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_pad_channel[".isUseAjaxSuggest"] = true;

$tdatapublic_pad_channel[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_pad_channel[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_pad_channel[".isUseTimeForSearch"] = false;




$tdatapublic_pad_channel[".allSearchFields"] = array();

$tdatapublic_pad_channel[".allSearchFields"][] = "id";
$tdatapublic_pad_channel[".allSearchFields"][] = "nama";

$tdatapublic_pad_channel[".googleLikeFields"][] = "id";
$tdatapublic_pad_channel[".googleLikeFields"][] = "nama";


$tdatapublic_pad_channel[".advSearchFields"][] = "id";
$tdatapublic_pad_channel[".advSearchFields"][] = "nama";

$tdatapublic_pad_channel[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_pad_channel[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_pad_channel[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_pad_channel[".orderindexes"] = array();

$tdatapublic_pad_channel[".sqlHead"] = "SELECT id,   nama";
$tdatapublic_pad_channel[".sqlFrom"] = "FROM \"public\".pad_channel";
$tdatapublic_pad_channel[".sqlWhereExpr"] = "";
$tdatapublic_pad_channel[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_pad_channel[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_pad_channel[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_pad_channel = array();
$tableKeyspublic_pad_channel[] = "id";
$tdatapublic_pad_channel[".Keys"] = $tableKeyspublic_pad_channel;

$tdatapublic_pad_channel[".listFields"] = array();
$tdatapublic_pad_channel[".listFields"][] = "id";
$tdatapublic_pad_channel[".listFields"][] = "nama";

$tdatapublic_pad_channel[".viewFields"] = array();
$tdatapublic_pad_channel[".viewFields"][] = "id";
$tdatapublic_pad_channel[".viewFields"][] = "nama";

$tdatapublic_pad_channel[".addFields"] = array();
$tdatapublic_pad_channel[".addFields"][] = "nama";

$tdatapublic_pad_channel[".inlineAddFields"] = array();
$tdatapublic_pad_channel[".inlineAddFields"][] = "nama";

$tdatapublic_pad_channel[".editFields"] = array();
$tdatapublic_pad_channel[".editFields"][] = "nama";

$tdatapublic_pad_channel[".inlineEditFields"] = array();
$tdatapublic_pad_channel[".inlineEditFields"][] = "nama";

$tdatapublic_pad_channel[".exportFields"] = array();
$tdatapublic_pad_channel[".exportFields"][] = "id";
$tdatapublic_pad_channel[".exportFields"][] = "nama";

$tdatapublic_pad_channel[".printFields"] = array();
$tdatapublic_pad_channel[".printFields"][] = "id";
$tdatapublic_pad_channel[".printFields"][] = "nama";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "public.pad_channel";
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
	
		
		
	$tdatapublic_pad_channel["id"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "public.pad_channel";
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
			$edata["EditParams"].= " maxlength=20";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_channel["nama"] = $fdata;

	
$tables_data["public.pad_channel"]=&$tdatapublic_pad_channel;
$field_labels["public_pad_channel"] = &$fieldLabelspublic_pad_channel;
$fieldToolTips["public.pad_channel"] = &$fieldToolTipspublic_pad_channel;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.pad_channel"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.pad_channel"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_pad_channel()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   nama";
$proto0["m_strFrom"] = "FROM \"public\".pad_channel";
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
	"m_strTable" => "public.pad_channel"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "public.pad_channel"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto9=array();
$proto9["m_link"] = "SQLL_MAIN";
			$proto10=array();
$proto10["m_strName"] = "public.pad_channel";
$proto10["m_columns"] = array();
$proto10["m_columns"][] = "id";
$proto10["m_columns"][] = "nama";
$obj = new SQLTable($proto10);

$proto9["m_table"] = $obj;
$proto9["m_alias"] = "";
$proto11=array();
$proto11["m_sql"] = "";
$proto11["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto11["m_column"]=$obj;
$proto11["m_contained"] = array();
$proto11["m_strCase"] = "";
$proto11["m_havingmode"] = "0";
$proto11["m_inBrackets"] = "0";
$proto11["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto11);

$proto9["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto9);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_public_pad_channel = createSqlQuery_public_pad_channel();
		$tdatapublic_pad_channel[".sqlquery"] = $queryData_public_pad_channel;
	
if(isset($tdatapublic_pad_channel["field2"])){
	$tdatapublic_pad_channel["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_pad_channel["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_pad_channel["field2"]["LookupType"] = 4;
	$tdatapublic_pad_channel["field2"]["LinkField"] = "email";
	$tdatapublic_pad_channel["field2"]["DisplayField"] = "name";
	$tdatapublic_pad_channel[".hasCustomViewField"] = true;
}

$tableEvents["public.pad_channel"] = new eventsBase;
$tdatapublic_pad_channel[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.pad_channel");

?>