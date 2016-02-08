<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pad_model extends CI_Model {
	private $db_pad;
    
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}

	function get_pemda() {
		$qry = "select * from pad_pemda limit 1;"; 
		$query = $this->db_pad->query($qry);
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
	}

	// new
    function set_wp_login($uid) {
        $npwpd = $uid;
        $qry = "SELECT id, npwpd, nama 
            FROM pad_customer
            WHERE trim(npwpd)=trim('{$npwpd}')
            LIMIT 1";
        
		$query = $this->db_pad->query($qry);
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
    }
    
	// ----
	// cek apakah wp memiliki usaha yg disebutkan
	function check_cu($customer_id, $usaha_id)
	{
		$qry = "select cu.id 
			from pad_customer_usaha cu
			inner join pad_customer c on cu.customer_id=c.id
			where cu.customer_id = ? ";
			
		if (!empty($usaha_id))
			$qry .= "and cu.usaha_id in ({$usaha_id}) ";
		else
			$qry .= "and cu.usaha_id not in (".pad_reklame_id().", ".pad_air_tanah_id().") ";
			
		$query = $this->db_pad->query($qry, array($customer_id));
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	
	function sptpd_get_cu($customer_id, $usaha_id = '')
	{
		// terlanjur sayang
		$qry = "select cu.id customer_usaha_id, cu.customer_id, cu.usaha_id, get_npwpd(c.id, true) as npwpd, get_npwpd(c.id, false) as npwpd2, c.nama as customernm,
			cu.konterid, cu.air_zona_id, cu.air_manfaat_id , u.so, cu.def_pajak_id,
			cast(u.nama||' ('||cu.konterid||' | '||coalesce(cu.opnm,u.nama)||')' as character varying) as usahanm,
            
            c.wpnama, c.wpalamat

			from pad_customer_usaha cu
			inner join pad_customer c on cu.customer_id=c.id
			inner join pad_usaha u on cu.usaha_id=u.id
			where cu.customer_id = ?";
			
		if (wp_login() && empty($usaha_id))
			$qry .= "and u.id not in (".pad_reklame_id().", ".pad_air_tanah_id().") ";
		if (wp_login() && !empty($usaha_id))
			$qry .= "and u.id in ({$usaha_id}) ";
				
		$qry .= "order by c.rp,c.pb,c.formno, cu.usaha_id, cu.konterid";
		$query = $this->db_pad->query($qry, array($customer_id));
		
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}

	function sptpd_get_usaha_id($cu_id) 
	{
		$qry = "select cu.usaha_id
			from pad_customer_usaha cu
			where cu.id = ?";

		$query = $this->db_pad->query($qry, array($cu_id));
		if($query->num_rows()!==0)
		{
			return $query->row()->usaha_id;
		}
		else
			return FALSE;
	}
	
	function sptpd_get_pajak_detail($pajak_id, $pajak_tmt)
	{
		$qry = "select 
			--pt.pajak_id, 
			pt.tarif, pt.minimal_omset, pt.reklame, 
			--pt.id, pt.tmt, 
			--p.carahitung, 
			p.jatuhtempo, p.multiple, p.masapajak, r.id rekening_id, substr(r.kode,1,8) as kode 
			from pad_tarif_pajak pt  
			inner join pad_jenis_pajak p on p.id=pt.pajak_id 
			inner join pad_rekening r on r.id=p.rekening_id 

			where pt.pajak_id = ?
			and pt.tmt <= ? 
			order by pt.tmt desc 
			limit 1";

		$query = $this->db_pad->query($qry, array($pajak_id, $pajak_tmt));		
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
	}
	
	function sptpd_get_pajak($usaha_id)
	{
		$qry = "select p.id, p.nama
			--, r.kode,p.kodesub, r.nama, p.jatuhtempo, 
			--p.carahitung, p.usaha_id, p.multiple
			FROM pad_jenis_pajak p
			INNER JOIN pad_rekening r on p.rekening_id=r.id
			where usaha_id=? and p.enabled=1 and r.enabled=1
			order by r.kode, p.nama";

		$query = $this->db_pad->query($qry, array($usaha_id));
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
}

/* End of file _model.php */