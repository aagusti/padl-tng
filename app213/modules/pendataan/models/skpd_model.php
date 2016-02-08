<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class skpd_model extends CI_Model {
	private $db_pad;
	private $tbl = 'pad_kohir';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}
	
	function get_all()
	{
		$this->db_pad->order_by('kohirno'); 
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
	
	function generate_kohirno($tahun, $usaha_id) {
		$this->db_pad->select_max('kohirno', 'nomor');
		$this->db_pad->where('tahun',$tahun);
		$this->db_pad->where('usaha_id',$usaha_id);
		$kohirno = $this->db_pad->get($this->tbl)->row()->nomor;
		$kohirno++;
		
		return $kohirno;
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