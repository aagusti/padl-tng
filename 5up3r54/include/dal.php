<?php

$dal_info=array();


function CustomQuery($dalSQL)
{
	global $conn;
	$rs = db_query($dalSQL,$conn);
	  return $rs;
}

function UsersTableName()
{
	return "";
}

function DBLookup($sql)
{
	
	global $conn;
	$rs = db_query($sql,$conn);
	$data = db_fetch_array($rs);
	if ($data)
		return reset($data);
	  
	return null;
}

/**
  * Data Access Layer.
  */
class tDAL
{
	var $app_status;
	var $pad_invoice;
	var $pad_spt;
	var $pad_spt_reklame;
	var $pad_air_tanah_hit;
	var $pad_air_tanah;
	var $users;
	var $pad_kohir;
	var $pad_customer_usaha;
	var $pad_customer;
	var $apps;
	var $group_modules;
	var $groups;
	var $modules;
	var $user_groups;
	var $pad_air_hda;
	var $pad_air_kelompok_usaha;
	var $pad_air_manfaat;
	var $pad_air_zona;
	var $pad_anggaran;
	var $pad_customer_detail;
	var $pad_customer_usaha_air_tanah;
	var $pad_daftar;
	var $pad_daftar_hist;
	var $pad_daftar_kd_det;
	var $pad_daftar_status;
	var $pad_jenis_pajak;
	var $pad_kecamatan;
	var $pad_kelurahan;
	var $pad_pegawai;
	var $pad_pemda;
	var $pad_periksa;
	var $pad_rekening;
	var $pad_reklame;
	var $pad_reklame_jalan;
	var $pad_reklame_kelas_jalan;
	var $pad_reklame_lokasi_pasang;
	var $pad_reklame_mall;
	var $pad_reklame_media;
	var $pad_reklame_nilai_strategis;
	var $pad_reklame_nsr;
	var $pad_reklame_sudut_pandang;
	var $pad_report;
	var $pad_spt_type;
	var $pad_sspd;
	var $pad_stpd;
	var $pad_tarif_pajak;
	var $pad_teguran;
	var $pad_terima;
	var $pad_terima_line;
	var $pad_usaha;
	var $tmp_bayar;
	var $units;
	var $user_pad;
	var $ar_payment_detail;
	var $pad_channel;
	var $pad_payment;
	var $pad_reversal;
	var $pad_sspd_bak;
	var $tblpejabat2;
	var $pad_tp;
	var $tmp_bank;
	var $tmp_bank_2013;
	var $tmp_bank_ok_1;
	var $tmp_bank2;
	var $tmp_bank2_null_sspd;
	var $lstTables;
	var $Table=array();

	function FillTablesList()
	{
		if($this->lstTables)
			return;
	  $this->lstTables[]=array("name"=>"app_status","varname"=>"app_status");
	  $this->lstTables[]=array("name"=>"pad_invoice","varname"=>"pad_invoice");
	  $this->lstTables[]=array("name"=>"pad_spt","varname"=>"pad_spt");
	  $this->lstTables[]=array("name"=>"pad_spt_reklame","varname"=>"pad_spt_reklame");
	  $this->lstTables[]=array("name"=>"pad_air_tanah_hit","varname"=>"pad_air_tanah_hit");
	  $this->lstTables[]=array("name"=>"pad_air_tanah","varname"=>"pad_air_tanah");
	  $this->lstTables[]=array("name"=>"users","varname"=>"users");
	  $this->lstTables[]=array("name"=>"pad_kohir","varname"=>"pad_kohir");
	  $this->lstTables[]=array("name"=>"pad_customer_usaha","varname"=>"pad_customer_usaha");
	  $this->lstTables[]=array("name"=>"pad_customer","varname"=>"pad_customer");
	  $this->lstTables[]=array("name"=>"apps","varname"=>"apps");
	  $this->lstTables[]=array("name"=>"group_modules","varname"=>"group_modules");
	  $this->lstTables[]=array("name"=>"groups","varname"=>"groups");
	  $this->lstTables[]=array("name"=>"modules","varname"=>"modules");
	  $this->lstTables[]=array("name"=>"user_groups","varname"=>"user_groups");
	  $this->lstTables[]=array("name"=>"pad_air_hda","varname"=>"pad_air_hda");
	  $this->lstTables[]=array("name"=>"pad_air_kelompok_usaha","varname"=>"pad_air_kelompok_usaha");
	  $this->lstTables[]=array("name"=>"pad_air_manfaat","varname"=>"pad_air_manfaat");
	  $this->lstTables[]=array("name"=>"pad_air_zona","varname"=>"pad_air_zona");
	  $this->lstTables[]=array("name"=>"pad_anggaran","varname"=>"pad_anggaran");
	  $this->lstTables[]=array("name"=>"pad_customer_detail","varname"=>"pad_customer_detail");
	  $this->lstTables[]=array("name"=>"pad_customer_usaha_air_tanah","varname"=>"pad_customer_usaha_air_tanah");
	  $this->lstTables[]=array("name"=>"pad_daftar","varname"=>"pad_daftar");
	  $this->lstTables[]=array("name"=>"pad_daftar_hist","varname"=>"pad_daftar_hist");
	  $this->lstTables[]=array("name"=>"pad_daftar_kd_det","varname"=>"pad_daftar_kd_det");
	  $this->lstTables[]=array("name"=>"pad_daftar_status","varname"=>"pad_daftar_status");
	  $this->lstTables[]=array("name"=>"pad_jenis_pajak","varname"=>"pad_jenis_pajak");
	  $this->lstTables[]=array("name"=>"pad_kecamatan","varname"=>"pad_kecamatan");
	  $this->lstTables[]=array("name"=>"pad_kelurahan","varname"=>"pad_kelurahan");
	  $this->lstTables[]=array("name"=>"pad_pegawai","varname"=>"pad_pegawai");
	  $this->lstTables[]=array("name"=>"pad_pemda","varname"=>"pad_pemda");
	  $this->lstTables[]=array("name"=>"pad_periksa","varname"=>"pad_periksa");
	  $this->lstTables[]=array("name"=>"pad_rekening","varname"=>"pad_rekening");
	  $this->lstTables[]=array("name"=>"pad_reklame","varname"=>"pad_reklame");
	  $this->lstTables[]=array("name"=>"pad_reklame_jalan","varname"=>"pad_reklame_jalan");
	  $this->lstTables[]=array("name"=>"pad_reklame_kelas_jalan","varname"=>"pad_reklame_kelas_jalan");
	  $this->lstTables[]=array("name"=>"pad_reklame_lokasi_pasang","varname"=>"pad_reklame_lokasi_pasang");
	  $this->lstTables[]=array("name"=>"pad_reklame_mall","varname"=>"pad_reklame_mall");
	  $this->lstTables[]=array("name"=>"pad_reklame_media","varname"=>"pad_reklame_media");
	  $this->lstTables[]=array("name"=>"pad_reklame_nilai_strategis","varname"=>"pad_reklame_nilai_strategis");
	  $this->lstTables[]=array("name"=>"pad_reklame_nsr","varname"=>"pad_reklame_nsr");
	  $this->lstTables[]=array("name"=>"pad_reklame_sudut_pandang","varname"=>"pad_reklame_sudut_pandang");
	  $this->lstTables[]=array("name"=>"pad_report","varname"=>"pad_report");
	  $this->lstTables[]=array("name"=>"pad_spt_type","varname"=>"pad_spt_type");
	  $this->lstTables[]=array("name"=>"pad_sspd","varname"=>"pad_sspd");
	  $this->lstTables[]=array("name"=>"pad_stpd","varname"=>"pad_stpd");
	  $this->lstTables[]=array("name"=>"pad_tarif_pajak","varname"=>"pad_tarif_pajak");
	  $this->lstTables[]=array("name"=>"pad_teguran","varname"=>"pad_teguran");
	  $this->lstTables[]=array("name"=>"pad_terima","varname"=>"pad_terima");
	  $this->lstTables[]=array("name"=>"pad_terima_line","varname"=>"pad_terima_line");
	  $this->lstTables[]=array("name"=>"pad_usaha","varname"=>"pad_usaha");
	  $this->lstTables[]=array("name"=>"tmp_bayar","varname"=>"tmp_bayar");
	  $this->lstTables[]=array("name"=>"units","varname"=>"units");
	  $this->lstTables[]=array("name"=>"user_pad","varname"=>"user_pad");
	  $this->lstTables[]=array("name"=>"ar_payment_detail","varname"=>"ar_payment_detail");
	  $this->lstTables[]=array("name"=>"pad_channel","varname"=>"pad_channel");
	  $this->lstTables[]=array("name"=>"pad_payment","varname"=>"pad_payment");
	  $this->lstTables[]=array("name"=>"pad_reversal","varname"=>"pad_reversal");
	  $this->lstTables[]=array("name"=>"pad_sspd_bak","varname"=>"pad_sspd_bak");
	  $this->lstTables[]=array("name"=>"tblpejabat2","varname"=>"tblpejabat2");
	  $this->lstTables[]=array("name"=>"pad_tp","varname"=>"pad_tp");
	  $this->lstTables[]=array("name"=>"tmp_bank","varname"=>"tmp_bank");
	  $this->lstTables[]=array("name"=>"tmp_bank_2013","varname"=>"tmp_bank_2013");
	  $this->lstTables[]=array("name"=>"tmp_bank_ok_1","varname"=>"tmp_bank_ok_1");
	  $this->lstTables[]=array("name"=>"tmp_bank2","varname"=>"tmp_bank2");
	  $this->lstTables[]=array("name"=>"tmp_bank2_null_sspd","varname"=>"tmp_bank2_null_sspd");
	}

	/**
      * Returns table object by table name.
      * @intellisense
      */
	function & Table($strTable)
	{
		$this->FillTablesList();
		foreach($this->lstTables as $tbl)
		{
			if(strtoupper($strTable)==strtoupper($tbl["name"]))
			{
				$this->CreateClass($tbl);
				return $this->{$tbl["varname"]};
			}
		}
//	check table names without dbo. and other prefixes
		foreach($this->lstTables as $tbl)
		{
			if(strtoupper(cutprefix($strTable))==strtoupper(cutprefix($tbl["name"])))
			{
				$this->CreateClass($tbl);
				return $this->{$tbl["varname"]};
			}
		}
		$dummy=null;
		return $dummy;
	}
	function CreateClass(&$tbl)
	{
		if($this->{$tbl["varname"]})
			return;
//	load table info
		global $dal_info;
		include(getabspath("include/dal/".GoodFieldName($tbl["name"]).".php"));
//	create class and object

		$str = "class class_".GoodFieldName($tbl["name"])." extends tDALTable  {";
		foreach($dal_info[$tbl["name"]] as $fld)
		{
			$str.=' var $'.$fld["varname"].'; ';
		}
		$str.=' function class_'.GoodFieldName($tbl["name"]).'()
			{
				$this->m_TableName = \''.escapesq($tbl["name"]).'\';
			}
		};';
		eval($str);
		$classname="class_".GoodFieldName($tbl["name"]);
		$this->{$tbl["varname"]} = new $classname;
		$this->Table[$tbl["name"]]=&$this->{$tbl["varname"]};
	}
	
	/**
      * Returns list of table names.
      * @intellisense
      */
	function GetTablesList()
	{
		$this->FillTablesList();
		$res=array();
		foreach($this->lstTables as $tbl)
			$res[]=$tbl["name"];
		return $res;
	}
	
	/**
      * Get list of table fields by table name.
      * @intellisense
      */
	function GetFieldsList($table)
	{
		$tbl = $this->Table($table);
		return $tbl->GetFieldsList();
	}
	
	/**
      * Get field type by table name and field name.
      * @intellisense
      */
	function GetFieldType($table,$field)
	{
		$tbl = $this->Table($table);
		return $tbl->GetFieldType($field);
	}

	/**
      * Get table key fields by table name.
      * @intellisense
      */
	function GetDBTableKeys($table)
	{
		$tbl = $this->Table($table);
		return $tbl->GetDBTableKeys();
	}
}

$dal = new tDAL;

/**
  *  Data Access Layer table class.
  */ 
class tDALTable
{
	var $m_TableName;
	var $Param = array();
	var $Value = array();

	/**
      * Get table key fields.
      * @intellisense
      */
	function GetDBTableKeys()
	{
		global $dal_info;
		if(!array_key_exists($this->m_TableName,$dal_info) || !is_array($dal_info[$this->m_TableName]))
		{
			return array();
		}
		$ret=array();
		foreach($dal_info[$this->m_TableName] as $fname=>$f)
		{
			if(@$f["key"])
				$ret[]=$fname;
		}
		return $ret;
	}
	
	/**
      * Get list of table fields.
      * @intellisense
      */
	function GetFieldsList()
	{
		global $dal_info;
		return array_keys($dal_info[$this->m_TableName]);
	}

	/**
      * Get field type.
      * @intellisense
      */
	function GetFieldType($field)
	{
		global $dal_info;
		if(!array_key_exists($field,$dal_info[$this->m_TableName]))
			return 200;
		return $dal_info[$this->m_TableName][$field]["type"];
	}
	
	function PrepareValue($value,$type)
	{
	
		if(IsDateFieldType($type))
			return db_datequotes($value);
		if (NeedQuotes($type))
			return db_prepare_string($value);
		else
			return (0+$value);
	}
	
	/**
      * Get table name.
      * @intellisense
      */
	function TableName()
	{
		return AddTableWrappers($this->m_TableName);
	} 

	function Execute_Query($blobs,$dalSQL,$tableinfo)
	{
	global $conn;
				db_exec($dalSQL,$conn);
	}

	/**
      * Add new record to the table.
      * @intellisense
      */
	function Add() 
	{
		global $conn,$dal_info;
		$insertFields="";
		$insertValues="";
		$tableinfo = &$dal_info[$this->m_TableName];
		$blobs = array();
//	prepare parameters		
		foreach($tableinfo as $fieldname=>$fld)
		{
			if(isset($this->{$fld['varname']}))
			{
				$this->Value[$fieldname] = $this->{$fld['varname']};
			}
			foreach($this->Value as $field=>$value)
			{
				if (strtoupper($field)!=strtoupper($fieldname))
					continue;
				$insertFields.= AddFieldWrappers($fieldname).",";
				$insertValues.= $this->PrepareValue($value,$fld["type"]) . ",";
				break;
			}
		}
//	prepare and exec SQL
		if ($insertFields!="" && $insertValues!="")		
		{
			$insertFields = substr($insertFields,0,-1);
			$insertValues = substr($insertValues,0,-1);
			$dalSQL = "insert into ".AddTableWrappers($this->m_TableName)." (".$insertFields.") values (".$insertValues.")";
			$this->Execute_Query($blobs,$dalSQL,$tableinfo);
		}
//	cleanup		
	    $this->Reset();
	}

	/**
      * Query all records from the table.
      * @intellisense
      */
	function QueryAll()
	{
		global $conn;
		$dalSQL = "select * from ".AddTableWrappers($this->m_TableName);
		$rs = db_query($dalSQL,$conn);
		return $rs;
	}

	/**
      * Do a custom query on the table.
      * @intellisense
      */
	function Query($swhere="",$orderby="")
	{
		global $conn;
		if ($swhere)
			$swhere = " where ".$swhere;
		if ($orderby)
			$orderby = " order by ".$orderby;
		$dalSQL = "select * from ".AddTableWrappers($this->m_TableName).$swhere.$orderby;
		$rs = db_query($dalSQL,$conn);
		return $rs;
	}

	/**
      * Delete a record from the table.
      * @intellisense
      */
	function Delete()
	{
		global $conn,$dal_info;
		$deleteFields="";
		$tableinfo = &$dal_info[$this->m_TableName];
//	prepare parameters		
		foreach($tableinfo as $fieldname=>$fld)
		{
			if(isset($this->{$fld['varname']}))
			{
				$this->Param[$fieldname] = $this->{$fld['varname']};
			}
			
			foreach($this->Param as $field=>$value)
			{
				if (strtoupper($field)!=strtoupper($fieldname))
					continue;
				$deleteFields.= AddFieldWrappers($fieldname)."=". $this->PrepareValue($value,$fld["type"]) . " and ";
				break;
			}
		}
//	do delete
		if ($deleteFields)
		{
			$deleteFields = substr($deleteFields,0,-5);
			$dalSQL = "delete from ".AddTableWrappers($this->m_TableName)." where ".$deleteFields;
			db_exec($dalSQL,$conn);
		}
	
//	cleanup
	    $this->Reset();
	}

	/**
      * Reset table object.
      * @intellisense
      */
	function Reset()
	{
		$this->Value=array();
		$this->Param=array();
		global $dal_info;
		$tableinfo = &$dal_info[$this->m_TableName];
//	prepare parameters		
		foreach($tableinfo as $fieldname=>$fld)
		{
			unset($this->{$fld["varname"]});
		}
	}	

	/**
      * Update record in the table.
      * @intellisense
      */
	function Update()
	{
		global $conn,$dal_info;
		$tableinfo = &$dal_info[$this->m_TableName];
		$updateParam = "";
		$updateValue = "";
		$blobs = array();

		foreach($tableinfo as $fieldname=>$fld)
		{
			$command='if(isset($this->'.$fld['varname'].')) { ';
			if($fld["key"])
				$command.='$this->Param[\''.escapesq($fieldname).'\'] = $this->'.$fld['varname'].';';
			else
				$command.='$this->Value[\''.escapesq($fieldname).'\'] = $this->'.$fld['varname'].';';
			$command.=' }';
			eval($command);
			if(!$fld["key"] && !array_key_exists(strtoupper($fieldname),array_change_key_case($this->Param,CASE_UPPER)))
			{
				foreach($this->Value as $field=>$value)
				{
					if (strtoupper($field)!=strtoupper($fieldname))
						continue;
					$updateValue.= AddFieldWrappers($fieldname)."=".$this->PrepareValue($value,$fld["type"]) . ", ";
					break;
				}
			}
			else
			{
				foreach($this->Param as $field=>$value)
				{
					if (strtoupper($field)!=strtoupper($fieldname))
						continue;
					$updateParam.= AddFieldWrappers($fieldname)."=".$this->PrepareValue($value,$fld["type"]) . " and ";
					break;
				}
			}
		}

//	construct SQL and do update	
		if ($updateParam)
			$updateParam = substr($updateParam,0,-5);
		if ($updateValue)
			$updateValue = substr($updateValue,0,-2);
		if ($updateValue && $updateParam)
		{
			$dalSQL = "update ".AddTableWrappers($this->m_TableName)." set ".$updateValue." where ".$updateParam;
			$this->Execute_Query($blobs,$dalSQL,$tableinfo);
		}

//	cleanup
		$this->Reset();
	}

	function FetchByID()
	{
		global $conn,$dal_info;
		$tableinfo = &$dal_info[$this->m_TableName];

		$dal_where="";
		foreach($tableinfo as $fieldname=>$fld)
		{
			$command='if(isset($this->'.$fld['varname'].')) { ';
			$command.='$this->Value[\''.escapesq($fieldname).'\'] = $this->'.$fld['varname'].';';
			$command.=' }';
			eval($command);
			foreach($this->Param as $field=>$value)
			{
				if (strtoupper($field)!=strtoupper($fieldname))
				continue;
				$dal_where.= AddFieldWrappers($fieldname)."=".$this->PrepareValue($value,$fld["type"]) . " and ";
				break;
			}
		}
		// cleanup
		$this->Reset();
		// construct and run SQL
		if ($dal_where)
			$dal_where = " where ".substr($dal_where,0,-5);
		$dalSQL = "select * from ".AddTableWrappers($this->m_TableName).$dal_where;
		$rs = db_query($dalSQL,$conn);
		return $rs;
	}
}


class DalRecordset
{
	
	var $m_rs;
	var $m_fields;
	var $m_eof;
	
	function Fields($field="")
	{
		if(!$field)
			return $this->m_fields;
		return $this->Field($field);
	}
	
	function Field($field)
	{
		if($this->m_eof)
			return false;
		foreach($this->m_fields as $name=>$value)
		{
			if(!strcasecmp($name,$field))
				return $value;
		}
		return false;
	}
	function DalRecordset($rs)
	{
		$this->m_rs=$rs;
		$this->MoveNext();
	}
	function EOF()
	{
		return $this->m_eof;
	}
	
	function MoveNext()
	{
		if(!$this->m_eof)
			$this->m_fields=db_fetch_array($this->m_rs);
		$this->m_eof = !$this->m_fields;
		return !$this->m_eof;
	}
}

function cutprefix($table)
{
	$pos=strpos($table,".");
	if($pos===false)
		return $table;
	return substr($table,$pos+1);
}

function escapesq($str)
{
	return str_replace(array("\\","'"),array("\\\\","\\'"),$str);
}

?>