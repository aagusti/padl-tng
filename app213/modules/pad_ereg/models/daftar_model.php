<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class daftar_model extends CI_Model {
	private $tbl = 'pad_daftar';
	
	function __construct() {
		parent::__construct();
	}
	
	function get_all()
	{
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
		$this->db->where('id',$id);
		$query = $this->db->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
	}
	    
	function generate_formno() {
        $this->db->select_max('formno', 'nomor');
        // $this->db->where('rp',$rp);
        // $this->db->where('pb',$pb);
        $formno = $this->db->get($this->tbl)->row()->nomor;
        $formno++;

        return $formno;
	} 
	
	//-- admin
	function save($data) {
		$this->db->insert($this->tbl,$data);
		return $this->db->insert_id();
	}
	
	function update($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->tbl,$data);
	}
	
	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->tbl);
	}
}

/* End of file _model.php */