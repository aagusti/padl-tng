<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pad_ereg extends CI_Controller {
	private $pad_module;

	function __construct()
	{
		parent::__construct();
        $this->pad_module = strtolower($this->router->fetch_module());
        
		if(active_module()!=$this->pad_module) {
			show_404();
			exit;
		}
        
        $this->load->model('login_model');
        if ($grp = $this->login_model->check_user_app()) {            
            $this->session->set_userdata('groupid'  , $grp->group_id);
            $this->session->set_userdata('groupkd'  , $grp->group_kode);
            $this->session->set_userdata('groupname', htmlspecialchars($grp->group_nama));
        }
        
		$this->load->model(array('apps_model', 'pad_model'));
		$this->load->helper(active_module());
        
        // Cek login Calon Wajib Pajak (CWP)
        if($this->session->userdata('groupkd')=='pad_ereg') {
            $login_cwp = $this->pad_model->set_cwp_login($this->session->userdata('uid'));
            if($login_cwp) {
                $this->session->set_userdata('cwp_login', TRUE);
                $this->session->set_userdata('cwp_id', $login_cwp->id);
                $this->session->set_userdata('cwp_nm', htmlspecialchars($login_cwp->customernm));
            } else {
                $this->session->set_flashdata('msg_error', 'User ID/Password salah atau tidak terdaftar!');
                redirect('login');
            }
        } else
            $this->session->set_userdata('cwp_login', FALSE);
        
		$this->load->model(array('apps_model', 'login_model'));
		$this->load->helper(active_module());
	}
	
	public function index()
	{
		$model = $this->load->model('pad_model');		
		if($row = $model->get_pemda()) {
			$ta = date('Y');
            $sess_data = array(
                'pad_tahun_anggaran' => $ta,
                
                'pad_pemda_daerah' => $row->daerah,
                'pad_pemda_alamat' => $row->alamat,
                'pad_pemda_alamat_lengkap' => $row->alamat_lengkap,
                'pad_pemda_telp' => $row->telp,
                'pad_pemda_fax' => $row->fax,
                'pad_pemda_website' => $row->website,
                'pad_pemda_email' => $row->email,
                'pad_pemda_nama' => $row->pemdanm,
                'pad_pemda_singkatan' => $row->pemdanmskt,
                'pad_pemda_type' => $row->type,
                'pad_pemda_kepala' => $row->kepalanm,
                'pad_pemda_jabatan' => $row->jabatan,
                'pad_pemda_ibukota' => $row->ibukota,
                'pad_pemda_unitid' => $row->ppkd_id, // ini hrusnya id pemda ato ppkd yah? // ini link ke spt (unit_id), *seharusnya jg sama buat lookup persen bunga di penerimaan..
                
                'pad_reklame_id' => $row->reklame_id,
                'pad_air_tanah_id' => $row->airtanah_id,
                'pad_dok_self_id' => $row->self_dok_id,
                'pad_dok_office_id' => $row->office_dok_id,
                
                'pad_spt_date' => $row->tgl_spt,
                'pad_spt_due_date' => $row->tgl_jatuhtempo_self,
                
                'pad_spt_denda' => $row->spt_denda,
                'pad_bunga' => $row->pad_bunga,
            );
            $this->session->set_userdata($sess_data);
		}

		$data['current'] = 'beranda';
		$data['apps']    = $this->apps_model->get_active_only();
		
		if(!cwp_login()) 
			$this->load->view('vmain', $data);
		else
			$this->load->view('cwp/vmain', $data);
	}
}
