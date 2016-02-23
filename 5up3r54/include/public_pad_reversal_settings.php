<?php
require_once(getabspath("classes/cipherer.php"));
$tdatapublic_pad_reversal = array();
	$tdatapublic_pad_reversal[".NumberOfChars"] = 80; 
	$tdatapublic_pad_reversal[".ShortName"] = "public_pad_reversal";
	$tdatapublic_pad_reversal[".OwnerID"] = "";
	$tdatapublic_pad_reversal[".OriginalTable"] = "public.pad_reversal";

//	field labels
$fieldLabelspublic_pad_reversal = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspublic_pad_reversal["English"] = array();
	$fieldToolTipspublic_pad_reversal["English"] = array();
	$fieldLabelspublic_pad_reversal["English"]["id"] = "Id";
	$fieldToolTipspublic_pad_reversal["English"]["id"] = "";
	$fieldLabelspublic_pad_reversal["English"]["tgl"] = "Tgl";
	$fieldToolTipspublic_pad_reversal["English"]["tgl"] = "";
	$fieldLabelspublic_pad_reversal["English"]["iso_request"] = "Iso Request";
	$fieldToolTipspublic_pad_reversal["English"]["iso_request"] = "";
	if (count($fieldToolTipspublic_pad_reversal["English"]))
		$tdatapublic_pad_reversal[".isUseToolTips"] = true;
}
	
	
	$tdatapublic_pad_reversal[".NCSearch"] = true;



$tdatapublic_pad_reversal[".shortTableName"] = "public_pad_reversal";
$tdatapublic_pad_reversal[".nSecOptions"] = 0;
$tdatapublic_pad_reversal[".recsPerRowList"] = 1;
$tdatapublic_pad_reversal[".mainTableOwnerID"] = "";
$tdatapublic_pad_reversal[".moveNext"] = 1;
$tdatapublic_pad_reversal[".nType"] = 0;

$tdatapublic_pad_reversal[".strOriginalTableName"] = "public.pad_reversal";




$tdatapublic_pad_reversal[".showAddInPopup"] = false;

$tdatapublic_pad_reversal[".showEditInPopup"] = false;

$tdatapublic_pad_reversal[".showViewInPopup"] = false;

$tdatapublic_pad_reversal[".fieldsForRegister"] = array();

$tdatapublic_pad_reversal[".listAjax"] = false;

	$tdatapublic_pad_reversal[".audit"] = false;

	$tdatapublic_pad_reversal[".locking"] = false;

$tdatapublic_pad_reversal[".listIcons"] = true;
$tdatapublic_pad_reversal[".edit"] = true;
$tdatapublic_pad_reversal[".inlineEdit"] = true;
$tdatapublic_pad_reversal[".inlineAdd"] = true;
$tdatapublic_pad_reversal[".view"] = true;

$tdatapublic_pad_reversal[".exportTo"] = true;

$tdatapublic_pad_reversal[".printFriendly"] = true;

$tdatapublic_pad_reversal[".delete"] = true;

$tdatapublic_pad_reversal[".showSimpleSearchOptions"] = false;

$tdatapublic_pad_reversal[".showSearchPanel"] = true;

if (isMobile())
	$tdatapublic_pad_reversal[".isUseAjaxSuggest"] = false;
else 
	$tdatapublic_pad_reversal[".isUseAjaxSuggest"] = true;

$tdatapublic_pad_reversal[".rowHighlite"] = true;

// button handlers file names

$tdatapublic_pad_reversal[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapublic_pad_reversal[".isUseTimeForSearch"] = false;




$tdatapublic_pad_reversal[".allSearchFields"] = array();

$tdatapublic_pad_reversal[".allSearchFields"][] = "id";
$tdatapublic_pad_reversal[".allSearchFields"][] = "tgl";
$tdatapublic_pad_reversal[".allSearchFields"][] = "iso_request";

$tdatapublic_pad_reversal[".googleLikeFields"][] = "id";
$tdatapublic_pad_reversal[".googleLikeFields"][] = "tgl";
$tdatapublic_pad_reversal[".googleLikeFields"][] = "iso_request";


$tdatapublic_pad_reversal[".advSearchFields"][] = "id";
$tdatapublic_pad_reversal[".advSearchFields"][] = "tgl";
$tdatapublic_pad_reversal[".advSearchFields"][] = "iso_request";

$tdatapublic_pad_reversal[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatapublic_pad_reversal[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapublic_pad_reversal[".strOrderBy"] = $tstrOrderBy;

$tdatapublic_pad_reversal[".orderindexes"] = array();

$tdatapublic_pad_reversal[".sqlHead"] = "SELECT id,   tgl,   iso_request";
$tdatapublic_pad_reversal[".sqlFrom"] = "FROM \"public\".pad_reversal";
$tdatapublic_pad_reversal[".sqlWhereExpr"] = "";
$tdatapublic_pad_reversal[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapublic_pad_reversal[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapublic_pad_reversal[".arrGroupsPerPage"] = $arrGPP;

$tableKeyspublic_pad_reversal = array();
$tableKeyspublic_pad_reversal[] = "id";
$tdatapublic_pad_reversal[".Keys"] = $tableKeyspublic_pad_reversal;

$tdatapublic_pad_reversal[".listFields"] = array();
$tdatapublic_pad_reversal[".listFields"][] = "id";
$tdatapublic_pad_reversal[".listFields"][] = "tgl";
$tdatapublic_pad_reversal[".listFields"][] = "iso_request";

$tdatapublic_pad_reversal[".viewFields"] = array();
$tdatapublic_pad_reversal[".viewFields"][] = "id";
$tdatapublic_pad_reversal[".viewFields"][] = "tgl";
$tdatapublic_pad_reversal[".viewFields"][] = "iso_request";

$tdatapublic_pad_reversal[".addFields"] = array();
$tdatapublic_pad_reversal[".addFields"][] = "id";
$tdatapublic_pad_reversal[".addFields"][] = "tgl";
$tdatapublic_pad_reversal[".addFields"][] = "iso_request";

$tdatapublic_pad_reversal[".inlineAddFields"] = array();
$tdatapublic_pad_reversal[".inlineAddFields"][] = "id";
$tdatapublic_pad_reversal[".inlineAddFields"][] = "tgl";
$tdatapublic_pad_reversal[".inlineAddFields"][] = "iso_request";

$tdatapublic_pad_reversal[".editFields"] = array();
$tdatapublic_pad_reversal[".editFields"][] = "id";
$tdatapublic_pad_reversal[".editFields"][] = "tgl";
$tdatapublic_pad_reversal[".editFields"][] = "iso_request";

$tdatapublic_pad_reversal[".inlineEditFields"] = array();
$tdatapublic_pad_reversal[".inlineEditFields"][] = "id";
$tdatapublic_pad_reversal[".inlineEditFields"][] = "tgl";
$tdatapublic_pad_reversal[".inlineEditFields"][] = "iso_request";

$tdatapublic_pad_reversal[".exportFields"] = array();
$tdatapublic_pad_reversal[".exportFields"][] = "id";
$tdatapublic_pad_reversal[".exportFields"][] = "tgl";
$tdatapublic_pad_reversal[".exportFields"][] = "iso_request";

$tdatapublic_pad_reversal[".printFields"] = array();
$tdatapublic_pad_reversal[".printFields"][] = "id";
$tdatapublic_pad_reversal[".printFields"][] = "tgl";
$tdatapublic_pad_reversal[".printFields"][] = "iso_request";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "public.pad_reversal";
	$fdata["Label"] = "Id"; 
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
		
		
	
//	Begin Lookup settings
								$edata["LookupType"] = 1;
	$edata["freeInput"] = 0;
	$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
				
		
			
	$edata["LinkField"] = "id";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "id";
	
		
	$edata["LookupTable"] = "pad_payment";
	$edata["LookupOrderBy"] = "";
	
		
		
		
		
		
		$edata["SimpleAdd"] = true;
			
	
	
	//	End Lookup Settings

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_reversal["id"] = $fdata;
//	tgl
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tgl";
	$fdata["GoodName"] = "tgl";
	$fdata["ownerTable"] = "public.pad_reversal";
	$fdata["Label"] = "Tgl"; 
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
	
		$fdata["strField"] = "tgl"; 
		$fdata["FullName"] = "tgl";
	
		
		
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

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_reversal["tgl"] = $fdata;
//	iso_request
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "iso_request";
	$fdata["GoodName"] = "iso_request";
	$fdata["ownerTable"] = "public.pad_reversal";
	$fdata["Label"] = "Iso Request"; 
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
	
		$fdata["strField"] = "iso_request"; 
		$fdata["FullName"] = "iso_request";
	
		
		
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
			$edata["EditParams"].= " maxlength=1024";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatapublic_pad_reversal["iso_request"] = $fdata;

	
$tables_data["public.pad_reversal"]=&$tdatapublic_pad_reversal;
$field_labels["public_pad_reversal"] = &$fieldLabelspublic_pad_reversal;
$fieldToolTips["public.pad_reversal"] = &$fieldToolTipspublic_pad_reversal;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["public.pad_reversal"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["public.pad_reversal"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_public_pad_reversal()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id,   tgl,   iso_request";
$proto0["m_strFrom"] = "FROM \"public\".pad_reversal";
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
	"m_strTable" => "public.pad_reversal"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "tgl",
	"m_strTable" => "public.pad_reversal"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "iso_request",
	"m_strTable" => "public.pad_reversal"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto11=array();
$proto11["m_link"] = "SQLL_MAIN";
			$proto12=array();
$proto12["m_strName"] = "public.pad_reversal";
$proto12["m_columns"] = array();
$proto12["m_columns"][] = "id";
$proto12["m_columns"][] = "tgl";
$proto12["m_columns"][] = "iso_request";
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
$queryData_public_pad_reversal = createSqlQuery_public_pad_reversal();
			$tdatapublic_pad_reversal[".sqlquery"] = $queryData_public_pad_reversal;
	
if(isset($tdatapublic_pad_reversal["field2"])){
	$tdatapublic_pad_reversal["field2"]["LookupTable"] = "carscars_view";
	$tdatapublic_pad_reversal["field2"]["LookupOrderBy"] = "name";
	$tdatapublic_pad_reversal["field2"]["LookupType"] = 4;
	$tdatapublic_pad_reversal["field2"]["LinkField"] = "email";
	$tdatapublic_pad_reversal["field2"]["DisplayField"] = "name";
	$tdatapublic_pad_reversal[".hasCustomViewField"] = true;
}

$tableEvents["public.pad_reversal"] = new eventsBase;
$tdatapublic_pad_reversal[".hasEvents"] = false;

$cipherer = new RunnerCipherer("public.pad_reversal");

?>