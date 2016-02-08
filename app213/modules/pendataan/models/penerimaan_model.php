<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penerimaan_model extends CI_Model {
	private $db_pad;
	private $tbl_terima = 'pad_terima';
	private $tbl_terima_line = 'pad_terima_line';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}

	function max_terimano($tahun) {	
		$this->db_pad->select_max('terimano', 'nomor');
		$this->db_pad->where('tahun',$tahun);
		$sptno = $this->db_pad->get($this->tbl_terima)->row()->nomor;
		$sptno++;
		
		return $sptno;
	}
				
	function get($id)
	{
		$this->db_pad->where('id',$id);
		$query = $this->db_pad->get($this->tbl_terima);
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
	}
	
	function get_terima_id_by_spt($spt_id) {
		$this->db_pad->where('spt_id', $spt_id);
		$this->db_pad->limit(1);
		$query = $this->db_pad->get($this->tbl_terima_line);
		if($query->num_rows()!==0)
		{
			return $query->row()->terima_id;
		}
		else
			return FALSE;
	}
	
	
	//-- terima
	function update_setoran($terima_id) {		
		// hitung total setoran
		$this->db_pad->select_sum('amount', 'setoran');
		$this->db_pad->where('terima_id', $terima_id);
		$new_setoran = $this->db_pad->get($this->tbl_terima_line)->row()->setoran;
		$new_setoran = empty($new_setoran) ? 0 : $new_setoran;
		
		$this->db_pad->where('id', $terima_id);
		$this->db_pad->update($this->tbl_terima, array('jmlterima' => $new_setoran));
		
		return $new_setoran;
	}
	
	function save($data) {
		$this->db_pad->insert($this->tbl_terima,$data);
		return $this->db_pad->insert_id();
	}
	
	function update($id, $data) {
		$this->db_pad->where('id', $id);
		$this->db_pad->update($this->tbl_terima,$data);
	}
	
	function delete($id) {
		$this->db_pad->where('terima_id', $id);
		$this->db_pad->delete($this->tbl_terima_line);
		
		$this->db_pad->where('id', $id);
		$this->db_pad->delete($this->tbl_terima);
	}
	
	function delete_if_no_spt($terima_id) {	
		$this->db_pad->where('terima_id', $terima_id);
		$query = $this->db_pad->get($this->tbl_terima_line);
		if($query->num_rows() < 1)
			$this->delete($terima_id);
	}
	
	// -- terima line
	function save2($data) {
		$this->db_pad->insert($this->tbl_terima_line,$data);
		return $this->db_pad->insert_id();
	}
	
	function update2($id, $data) {
		$this->db_pad->where('id', $id);
		$this->db_pad->update($this->tbl_terima_line,$data);
	}
	
	function delete2($id) {
		$this->db_pad->where('id', $id);
		$this->db_pad->delete($this->tbl_terima_line);
	}
	
	function delete2_by_spt($spt_id) {
		$this->db_pad->where('spt_id', $spt_id);
		$this->db_pad->delete($this->tbl_terima_line);
	}
}

/* End of file _model.php */