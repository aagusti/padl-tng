<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stpd_model extends CI_Model {
	private $db_pad;
	private $tbl = 'pad_stpd';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}
	
	function get_all()
	{
		$this->db_pad->order_by('stpdno'); 
		$query = $this->db_pad->get($this->tbl);
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
	/* 
	function get_by_spt($spt_id)
	{
		$this->db_pad->where('spt_id',$spt_id);
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
	}
	 */
	function generate_stpdno($tahun) {
		$this->db_pad->select_max('stpdno', 'nomor');
		$this->db_pad->where('tahun',$tahun);
		$sspdno = $this->db_pad->get($this->tbl)->row()->nomor;
		$sspdno++;
		
		return $sspdno;
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
	
	function delete_by_spt($spt_id) {
		$this->db_pad->where('spt_id', $spt_id);
		$this->db_pad->delete($this->tbl);
	}
}

/* End of file _model.php */