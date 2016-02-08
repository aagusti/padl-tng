<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pad_model extends CI_Model {
	private $db_pad;
    
	function __construct() {
		parent::__construct();
		$this->db_pad = $this->load->database('pad', TRUE);
	}

	function get_pemda() {
		$qry = "select id, type, kepalanm, alamat, telp, pemdanm, ibukota, tmt, enabled, 
            create_date, create_uid, write_date, write_uid, jabatan, ppkd_id, 
            sptyearly, sspdyearly, skpdyearly, kasiryearly, reklame_id, pendapatan_id, 
            pemdanmskt, hda, airtanah_id, self_dok_id, office_dok_id, tgl_jatuhtempo_self, 
            spt_denda, tgl_spt, pad_bunga, mineral_id, fax, website, email, 
            daerah, alamat_lengkap
            from tblpemda
            where enabled = 1
            limit 1;";

		$query = $this->db_pad->query($qry);
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
	}

	// new
    function set_cwp_login($uid) {
        $email = $uid;
        $qry = "SELECT id, email, customernm 
            FROM pad_daftar
            WHERE trim(email)=trim('{$email}')
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
		$qry = "select cu.id customer_usaha_id, cu.customer_id, cu.usaha_id, get_npwpd(c.id, true) as npwpd, c.customernm,
			cu.konterid, cu.air_zona_id, cu.air_manfaat_id , u.so, cu.def_pajak_id, cu.usaha_id,
			cast(u.usahanm||' ('||cu.konterid||' | '||coalesce(cu.notes,u.usahanm)||')' as character varying) as usahanm

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
			pt.tarif, pt.minomset, pt.reklame, 
			--pt.id, pt.tmt, 
			--p.carahitung, 
			p.jatuhtempo, p.multiple, p.masapajak, r.id rekening_id, substr(r.rekeningkd,1,8) as rekeningkd 
			from pad_pajak_tarif pt  
			inner join pad_pajak p on p.id=pt.pajak_id 
			inner join tblrekening r on r.id=p.rekening_id 

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
		$qry = "select p.id, p.pajaknm
			--, r.rekeningkd,p.rekeningkdsub, r.rekeningnm, p.jatuhtempo, 
			--p.carahitung, p.usaha_id, p.multiple
			FROM pad_pajak p
			INNER JOIN tblrekening r on p.rekening_id=r.id
			where usaha_id=? and p.enabled=1 and r.enabled=1
			order by r.rekeningkd, p.pajaknm";

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