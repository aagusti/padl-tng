<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class objek_pajak_model extends CI_Model {
	private $db_pad;
	private $tbl = 'pad_customer_usaha';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}
	
	function get_all()
	{
		$this->db_pad->order_by('konterid'); 
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
	
	function get_nopd($id, $formatted = true)
	{
		if ($formatted)
			$this->db_pad->select('get_nopd(id, true) as nopd', false);
		else
			$this->db_pad->select('get_nopd(id, false) as nopd', false);
			
		$this->db_pad->where('id',$id);
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->row()->nopd;
		}
		else
			return FALSE;
	}
		
	function get_typeahead_nopd($xnopd = NULL, $usaha_id = FALSE)
	{
		$this->db_pad->select('cu.id, get_nopd(cu.id, true) as nopd, cu.customer_id, cu.usaha_id, customernm, usahanm||\' - \'||cu.notes as usahanm ', false);
		$this->db_pad->from('pad_customer_usaha cu');
		$this->db_pad->join('pad_customer c', 'c.id=cu.customer_id');
		$this->db_pad->join('pad_usaha u', 'u.id=cu.usaha_id');
		$this->db_pad->like(array('lower(get_nopd(cu.id, true))' => strtolower($xnopd)), false); 
		
		if ($usaha_id)
			$this->db_pad->where(array('u.id' => $usaha_id)); 
		else
			$this->db_pad->where_not_in('u.id', array(pad_reklame_id(), pad_air_tanah_id())); 
		
		$this->db_pad->order_by('nopd'); 
		
		$query = $this->db_pad->get();
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	function max_konter($cid) {
		$this->db_pad->select_max('konterid', 'nomor');
		$this->db_pad->where('customer_id',$cid);
		$konterid = $this->db_pad->get($this->tbl)->row()->nomor;
		$konterid++;
		
		return $konterid;
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