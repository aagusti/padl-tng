<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class air_hda_model extends CI_Model {
	private $db_pad;
	private $tbl = 'pad_air_hda';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}
	
	function get_all()
	{
		// jangan dirubah urutannya... tapi gpp udah pake fungsi lain
		$this->db_pad->order_by('zona_id'); 
		$this->db_pad->order_by('manfaat_id'); 
		$this->db_pad->order_by('volume_id', 'desc'); 
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
	
	function get_hda($zona, $manfaat, $volume) {
		$this->db_pad->select('volume_id, hda');
		$this->db_pad->where('zona_id',$zona);
		$this->db_pad->where('manfaat_id',$manfaat);
		$this->db_pad->where('volume_id < ',$volume);
		$this->db_pad->order_by('volume_id', 'desc'); 
		
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->result();
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