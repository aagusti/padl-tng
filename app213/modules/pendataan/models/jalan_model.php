<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jalan_model extends CI_Model {
	private $db_pad;
	private $tbl = 'pad_jalan';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}
	
	function get_all()
	{
		$this->db_pad->order_by('jalannm'); 
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	function get_select($jalan_klas_id = NULL)
	{
		$this->db_pad->select('id, jalannm');
		if (!empty($jalan_klas_id)) $this->db_pad->where(array('jalan_klas_id' => $jalan_klas_id));
		$this->db_pad->order_by('jalannm'); 
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