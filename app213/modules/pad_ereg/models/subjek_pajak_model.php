<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class subjek_pajak_model extends CI_Model {
	private $db_pad;
	private $tbl = 'pad_customer';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}
	
	function get_all()
	{
		$this->db_pad->order_by('kode'); 
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
	
	function get_npwpd($id, $formatted = true)
	{
		if ($formatted)
			$this->db_pad->select('get_npwpd(id, true) as npwpd', false);
		else
			$this->db_pad->select('get_npwpd(id, false) as npwpd', false);
			
		$this->db_pad->where('id',$id);
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->row()->npwpd;
		}
		else
			return FALSE;
	}
	
	function get_typeahead_npwpd($xnpwpd = NULL)
	{
		$this->db_pad->select('id, get_npwpd(id, true) as npwpd, customernm', false);
		$this->db_pad->like(array('lower(get_npwpd(id, true))' => strtolower($xnpwpd)), false); 
		$this->db_pad->order_by('npwpd'); 
		
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	function get_typeahead_csname($xname = NULL)
	{
		$this->db_pad->select('id, get_npwpd(id, true) as npwpd, customernm', false);
		$this->db_pad->like(array('lower(customernm)' => strtolower($xname)), false); 
		$this->db_pad->order_by('customernm'); 
		
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	function generate_npwpd($rp, $pb, $kec_id, $kel_id) {
		$this->db_pad->select_max('formno', 'nomor');
		$this->db_pad->where('rp',$rp);
		$this->db_pad->where('pb',$pb);
		$formno = $this->db_pad->get($this->tbl)->row()->nomor;
		$formno++;
		
		$this->db_pad->select('kecamatankd');
		$this->db_pad->where('id',$kec_id);
		$kec_kd = $this->db_pad->get('tblkecamatan')->row()->kecamatankd;
		
		$this->db_pad->select('kelurahankd');
		$this->db_pad->where('id',$kel_id);
		$this->db_pad->where('kecamatan_id',$kec_id);
		$kel_kd = $this->db_pad->get('tblkelurahan')->row()->kelurahankd;
		
		$npwpd = $rp.$pb.str_pad($formno, 7, '0', STR_PAD_LEFT).$kec_kd.$kel_kd;
		
		$ret = array();
		$ret['formno'] = $formno;
		$ret['npwpd']  = $npwpd;
		return $ret;
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