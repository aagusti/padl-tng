<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sspd_model extends CI_Model {
	private $db_pad;
	private $tbl = 'pad_sspd';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}
	
	function get_all()
	{
		$this->db_pad->order_by('sspdno'); 
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
	
	function generate_sspdno($tahun) {
		$this->db_pad->select_max('sspdno', 'nomor');
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
    
	function cancel_by_spt($spt_id) {
        // sebenarnya kurang tepat (akan ngupdate semua sspd dgn spt_id yg sama), tapi gpp lah :D
		$this->db->where('spt_id', $spt_id);
		$this->db->update($this->tbl, array('is_valid'=>0));
	}
}

/* End of file _model.php */