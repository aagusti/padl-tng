<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pajak_model extends CI_Model {
	private $db_pad;
	private $tbl = 'pad_pajak';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}
	
	function get_all()
	{
		$this->db_pad->order_by('pajaknm'); 
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	function get_select($pajak_id)
	{
		/*
		$this->db_pad->select('id, pajaknm');
		$this->db_pad->where(array('enabled'=>'1', 'usaha_id'=>'')); 
		$this->db_pad->order_by('pajaknm'); 
		$query = $this->db_pad->get($this->tbl);
		*/
		
		$this->db_pad->select('p1.id, p1.pajaknm');
		$this->db_pad->from('pad_pajak p1');
		$this->db_pad->join('pad_pajak p2', 'p1.usaha_id=p2.usaha_id');
		$this->db_pad->where(array('p1.enabled'=>'1', 'p2.id'=>$pajak_id)); 
		$this->db_pad->order_by('p1.pajaknm'); 
		$query = $this->db_pad->get();
		
		//die(last_query());
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
		
	function get_select2($usaha_id)
	{
		$this->db->select('id, pajaknm');
		$this->db->where(array('enabled'=>'1', 'usaha_id'=>$usaha_id)); 
		$this->db->order_by('pajaknm'); 
		$query = $this->db->get($this->tbl);

		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
    
	function get($id)
	{
		$this->db_pad->where('id',$id);
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
	}
	
	
	function get_rek_denda($id)
	{
		$this->db_pad->where('id',$id);
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->row()->rekdenda_id;
		}
		else
			return FALSE;
	}
	
	//-- admin
	function save($data) {
		$this->db_pad->insert($this->tbl,$data);
		return $this->db_pad->insert_id();
	}
	
	function update($id, $data) {
		$this->db_pad->where('id', $id);
		$this->db_pad->update($this->tbl,$data);
	}
	
	function delete($id) {
		$this->db_pad->where('id', $id);
		$this->db_pad->delete($this->tbl);
	}
}

/* End of file _model.php */