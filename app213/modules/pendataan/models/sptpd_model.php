<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sptpd_model extends CI_Model {
	private $db_pad; 
	private $tbl = 'pad_spt';
	
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}
	
	function get_all()
	{
		$this->db_pad->order_by('sptno'); 
		// $query = $this->db_pad->get($this->tbl);
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
	
    function get_last_data($cu_id) {
		$this->db_pad->where('customer_usaha_id',$cu_id);
		$this->db_pad->order_by('terimatgl desc');
		$this->db_pad->limit(1);
        
		$query = $this->db_pad->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
    }
    
    function get_last_kartu_data($spt_id) {
		$this->db_pad->where('spt_id',$spt_id);
        
		$query = $this->db_pad->get('pad_spt_kd_det');
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
    }
    
	function generate_sptno($tahun, $bulan) {	
		$this->db->select_max('sptno', 'nomor');
		$this->db->where('tahun',$tahun);
                $this->db->where('bulan',$bulan);
		$sptno = $this->db->get($this->tbl)->row()->nomor;
		$sptno++;
		
		return $sptno;
	}
	
	function is_kohir_ok($id) {
		$this->db_pad->where('spt_id',$id);
		$query = $this->db_pad->get('pad_kohir');
		if($query->num_rows()!==0)
			return TRUE;
		else
			return FALSE;
	}

	function is_validasi_ok($id) {
		$query = $this->db->query("select sptno from pad_spt where id=$id and proses=2");
		if($query->num_rows()!==0)
			return TRUE;
		else
			return FALSE;
	}

	function is_bayar($id) {
		$status_bayar='';
		$query = $this->db->query("select status_bayar from pad_invoice where source_id=$id and source_nama = 'pad_spt'");
		foreach ($query->result() as $row)
        {
        	$status_bayar=$row->status_bayar ;
        }
		if($status_bayar==1)
			return TRUE;
		else
			return FALSE;
	}

	function is_sspd_ok($id) {
		$this->db_pad->where('spt_id',$id);
		$this->db_pad->where('is_valid',1);
		$query = $this->db_pad->get('pad_sspd');
		if($query->num_rows()!==0)
			return TRUE;
		else
			return FALSE;
	}
	
	function is_bayar_ok($id) {
		$this->db_pad->where('spt_id',$id);
		$query = $this->db_pad->get('pad_terima_line');
		if($query->num_rows()!==0)
			return TRUE;
		else
			return FALSE;
	}

	function is_multiple($customer_usaha_id, $pajak_id, $type_id, $rekening_id,  $lastinput, $mode ) {
		
		$qry	= ("select * from pad_spt where customer_usaha_id=$customer_usaha_id and 
						pajak_id = $pajak_id and 
							type_id = $type_id and 
							pajak_id = $pajak_id and
							masadari = '$lastinput' " );
		$query = $this->db_pad->query($qry);

		if ($mode=="add"){
			if($query->num_rows()>0)
				return TRUE;
			else
				return FALSE;

		}else if ($mode=="edit"){
		if ($this->session->userdata('masadari')==$lastinput){
				if($query->num_rows()>1)
					return TRUE;
				else
					return FALSE;
			}else{
				if($query->num_rows()>0)
					return TRUE;
				else
					return FALSE;
			}
		}
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
