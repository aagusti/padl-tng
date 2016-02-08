<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class objek_pajak extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if (!is_login()) {
            echo "<script>window.location.replace('" . base_url() . "');</script>";
            exit;
        }
        
        $module = 'pendaftaran';
        $this->load->library('module_auth', array(
            'module' => $module
        ));
        
        $this->load->model(array(
            'apps_model', 'subjek_pajak_model', 'objek_pajak_model'
        ));
		
		$this->load->helper(active_module('pad_helper'));
    }
    
    public function index() {
        if (!$this->module_auth->read) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_read);
            redirect('info');
        }
        
        $data['current'] = 'pendaftaran';
        $data['apps']    = $this->apps_model->get_active_only();
        $this->load->view('vobjek_pajak', $data);
    }
    
    function grid() {
        $this->load->library('Datatables');
        $this->datatables->select("cu.id, get_nopd(cu.id, true) as nopd, u.nama, get_npwpd(c.id, true) as npwpd, c.nama as customernm, cu.notes", false);
        $this->datatables->from('pad_customer_usaha cu');
        $this->datatables->join('pad_customer c', 'c.id=cu.customer_id');
        $this->datatables->join('pad_usaha u', 'u.id=cu.usaha_id');
        $this->datatables->where('c.rp', 'P');
        echo $this->datatables->generate();
    }
	
    function grid_for_nopd() {
        $this->load->library('Datatables');
        $this->datatables->select('c.id, get_npwpd(c.id, true) as npwpd, c.nama as customernm, 
			(case when c.wpnama=\'\' then c.pnama else c.wpnama end) as nama, c.alamat', false);
        $this->datatables->from('pad_customer c');
        //$this->datatables->join('pad_customer_usaha cu', 'c.id=cu.customer_id');
        $this->datatables->where('c.rp', 'P');
        $this->datatables->where('c.id in (select customer_id from pad_customer_usaha)');
        //$this->datatables->where('c.enabled', 1);
		
        echo $this->datatables->generate();
    }
	
    //admin
    private function fvalidation() {
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        
		// $this->form_validation->set_rules('id','id','required|numeric');
		// $this->form_validation->set_rules('konterid','konterid','required|numeric');
		$this->form_validation->set_rules('customer_id','customer_id','required|numeric');
		$this->form_validation->set_rules('usaha_id','usaha_id','required|numeric');
		// $this->form_validation->set_rules('so','so','required|trim');
		$this->form_validation->set_rules('kecamatan_id','kecamatan_id','required|numeric');
		$this->form_validation->set_rules('kelurahan_id','kelurahan_id','required|numeric');
		// $this->form_validation->set_rules('notes','notes','required|trim');
		// $this->form_validation->set_rules('enabled','enabled','required|numeric');
		// $this->form_validation->set_rules('reg_date','reg_date','required');
		// $this->form_validation->set_rules('tmt','tmt','required');
		
		// $this->form_validation->set_rules('create_date','create_date','required');
		// $this->form_validation->set_rules('create_uid','create_uid','required|numeric');
		// $this->form_validation->set_rules('write_date','write_date','required');
		// $this->form_validation->set_rules('write_uid','write_uid','required|numeric');
		
		// $this->form_validation->set_rules('reg_kelurahan_id','reg_kelurahan_id','required|numeric');
		// $this->form_validation->set_rules('customer_status_id','customer_status_id','required|numeric');
		// $this->form_validation->set_rules('aktifnotes','aktifnotes','required|trim');
		// $this->form_validation->set_rules('air_zona_id','air_zona_id','required|numeric');
		// $this->form_validation->set_rules('air_manfaat_id','air_manfaat_id','required|numeric');
		// $this->form_validation->set_rules('newkelid','newkelid','required|numeric');
		// $this->form_validation->set_rules('def_pajak_id','def_pajak_id','required|numeric');
    }
    
    private function fpost() {
		$data['id'] = $this->input->post('id');
		$data['konterid'] = $this->input->post('konterid');
		$data['customer_id'] = $this->input->post('customer_id');
		$data['usaha_id'] = $this->input->post('usaha_id');
		$data['so'] = $this->input->post('so');
		$data['kecamatan_id'] = $this->input->post('kecamatan_id');
		$data['kelurahan_id'] = $this->input->post('kelurahan_id');
		$data['notes'] = $this->input->post('notes');
		$data['tmt'] = $this->input->post('tmt');
		$data['reg_date'] = $this->input->post('reg_date');
		$data['enabled'] = $this->input->post('enabled');
		
		$data['create_date'] = $this->input->post('create_date');
		$data['create_uid'] = $this->input->post('create_uid');
		$data['write_date'] = $this->input->post('write_date');
		$data['write_uid'] = $this->input->post('write_uid');
		
		$data['reg_kelurahan_id'] = $this->input->post('reg_kelurahan_id');
		$data['customer_status_id'] = $this->input->post('customer_status_id');
		$data['aktifnotes'] = $this->input->post('aktifnotes');
		$data['air_zona_id'] = $this->input->post('air_zona_id');
		$data['air_manfaat_id'] = $this->input->post('air_manfaat_id');
		$data['newkelid'] = $this->input->post('newkelid');
		$data['def_pajak_id'] = $this->input->post('def_pajak_id');
        
        return $data;
    }
    
    public function add() {
        if (!$this->module_auth->create) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_create);
            redirect(active_module_url('objek_pajak'));
        }
        $data['current'] = 'pendaftaran';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url('objek_pajak/add');
        $data['dt']      = $this->fpost();
        
        $this->fvalidation();
        if ($this->form_validation->run() == TRUE) {
            $input_post = $this->fpost();
			
			$konter = $this->objek_pajak_model->max_konter($this->input->get_post('customer_id'));
			
			$usaha_model = $this->load->model('usaha_model');
			$so = $usaha_model->get_so($this->input->get_post('op_usaha_id'));
			
            $post_data  = array(
				'konterid' => $konter,
				'customer_id' => empty($input_post['customer_id']) ? NULL : $input_post['customer_id'],
				'usaha_id' => empty($input_post['usaha_id']) ? NULL : $input_post['usaha_id'],
				'so' => $so,
				'kecamatan_id' => empty($input_post['kecamatan_id']) ? NULL : $input_post['kecamatan_id'],
				'kelurahan_id' => empty($input_post['kelurahan_id']) ? NULL : $input_post['kelurahan_id'],
				'notes' => empty($input_post['notes']) ? NULL : $input_post['notes'],
				'tmt' => empty($input_post['tmt']) ? NULL : date('Y-m-d', strtotime($input_post['tmt'])),
				'enabled' => empty($input_post['enabled']) ? NULL : $input_post['enabled'],
				
				'reg_date' => date('Y-m-d'),
                'create_date' => date('Y-m-d'),
                'create_uid' => sipkd_user_id(),
            );
			$this->objek_pajak_model->save($post_data);
			$this->session->set_flashdata('msg_success', 'Data telah disimpan.');
			redirect(active_module_url('objek_pajak'));            
        }
		
		$data['dt']['nopd'] = '';
		$data['dt']['tmt'] = date('d-m-Y');
						
		$select_data  = $this->load->model('usaha_model')->get_select();
		$options      = array();
		foreach ($select_data as $row) {
			$options[$row->id] = $row->nama;
		}
		$js                       = 'id="usaha_id" class="input-medium" required ';
		$data['select_usaha'] = form_dropdown('usaha_id', $options, '', $js);
				
		$select_data  = $this->load->model('kecamatan_model')->get_select();
		$options      = array();
		$kec_id = '';
		foreach ($select_data as $row) {
			if($kec_id == '') $kec_id = $row->id;
			$options[$row->id] = $row->kecamatannm;
		}
		$js                       = 'id="kecamatan_id" class="input-medium" onChange="get_kelurahan(this.value);" required ';
		$data['select_kecamatan'] = form_dropdown('kecamatan_id', $options, '', $js);

		$select_data = $this->load->model('kelurahan_model')->get_select($kec_id);
		$options     = array();
		foreach ($select_data as $row) {
			$options[$row->id] = $row->kelurahannm;
		}
		$js                       = 'id="kelurahan_id" class="input-large" required ';
		$data['select_kelurahan'] = form_dropdown('kelurahan_id', $options, '', $js);

		//read again ? tujuan nanti sih kayanya masuk ke op_status_usaha
		$options = array(
			'1' => 'AKTIF',
			'2' => 'INAKTIF'
		);
		$js = 'id="enabled" class="input-medium" required ';
		$data['select_status'] = form_dropdown('enabled', $options, '', $js);

        $this->load->view('vobjek_pajak_form', $data);
    }
    
    public function edit() {
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('objek_pajak'));
        }
        $data['current'] = 'pendaftaran';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url('objek_pajak/update');
        
        $id = $this->uri->segment(4);
        if ($id && $get = $this->objek_pajak_model->get($id)) {
			$data['dt']['id'] = empty($get->id) ? NULL : $get->id;
			$data['dt']['customer_id'] = empty($get->customer_id) ? NULL : $get->customer_id;
			$data['dt']['usaha_id'] = empty($get->usaha_id) ? NULL : $get->usaha_id;
			$data['dt']['so'] = empty($get->so) ? NULL : $get->so;
			$data['dt']['konterid'] = empty($get->konterid) ? NULL : $get->konterid;
			$data['dt']['kecamatan_id'] = empty($get->kecamatan_id) ? NULL : $get->kecamatan_id;
			$data['dt']['kelurahan_id'] = empty($get->kelurahan_id) ? NULL : $get->kelurahan_id;
			$data['dt']['notes'] = empty($get->notes) ? NULL : $get->notes;
			$data['dt']['tmt'] = empty($get->tmt) ? NULL : date('d-m-Y', strtotime($get->tmt));
			$data['dt']['enabled'] = empty($get->enabled) ? NULL : $get->enabled;
			
			$data['dt']['reg_date'] = empty($get->reg_date) ? NULL : date('d-m-Y', strtotime($get->reg_date));
			$data['dt']['create_date'] = empty($get->create_date) ? NULL : date('d-m-Y', strtotime($get->create_date));
			$data['dt']['create_uid'] = empty($get->create_uid) ? NULL : $get->create_uid;
			$data['dt']['write_date'] = empty($get->write_date) ? NULL : date('d-m-Y', strtotime($get->write_date));
			$data['dt']['write_uid'] = empty($get->write_uid) ? NULL : $get->write_uid;
			
			$data['dt']['aktifnotes'] = empty($get->aktifnotes) ? NULL : $get->aktifnotes;
			$data['dt']['customer_status_id'] = empty($get->customer_status_id) ? NULL : $get->customer_status_id;
			$data['dt']['reg_kelurahan_id'] = empty($get->reg_kelurahan_id) ? NULL : $get->reg_kelurahan_id;
			$data['dt']['air_zona_id'] = empty($get->air_zona_id) ? NULL : $get->air_zona_id;
			$data['dt']['air_manfaat_id'] = empty($get->air_manfaat_id) ? NULL : $get->air_manfaat_id;
			$data['dt']['newkelid'] = empty($get->newkelid) ? NULL : $get->newkelid;
			$data['dt']['def_pajak_id'] = empty($get->def_pajak_id) ? NULL : $get->def_pajak_id;

			$data['dt']['nopd'] = $this->objek_pajak_model->get_nopd($get->id);
		
			$select_data  = $this->load->model('usaha_model')->get_select();
			$options      = array();
			foreach ($select_data as $row) {
				$options[$row->id] = $row->nama;
			}
			$js                       = 'id="usaha_id" class="input-medium" required ';
			$data['select_usaha'] = form_dropdown('usaha_id', $options, $get->usaha_id, $js);
					
			$select_data  = $this->load->model('kecamatan_model')->get_select();
			$options      = array();
			foreach ($select_data as $row) {
				$options[$row->id] = $row->kecamatannm;
			}
			$js                       = 'id="kecamatan_id" class="input-medium" onChange="get_kelurahan(this.value);" required ';
			$data['select_kecamatan'] = form_dropdown('kecamatan_id', $options, $get->kecamatan_id, $js);

			$select_data = $this->load->model('kelurahan_model')->get_select($get->kecamatan_id);
			$options     = array();
			foreach ($select_data as $row) {
				$options[$row->id] = $row->kelurahannm;
			}
			$js                       = 'id="kelurahan_id" class="input-large" required ';
			$data['select_kelurahan'] = form_dropdown('kelurahan_id', $options, $get->kelurahan_id, $js);

			//read again ? tujuan nanti sih kayanya masuk ke op_status_usaha
			$options = array(
				'1' => 'AKTIF',
				'2' => 'INAKTIF'
			);
			$js = 'id="enabled" class="input-medium" required ';
			$data['select_status'] = form_dropdown('enabled', $options, $get->enabled, $js);
			
            $this->load->view('vobjek_pajak_form', $data);
        } else {
            show_404();
        }
    }
    
    public function update() {
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('objek_pajak'));
        }
        $data['current'] = 'pendaftaran';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url('objek_pajak/update');
        
        $post_data  = $this->fpost();
        $data['dt'] = $post_data;
        
        $this->fvalidation();
        if ($this->form_validation->run() == TRUE) {
            $input_post = $post_data;
			
			$usaha_model = $this->load->model('usaha_model');
			$so = $usaha_model->get_so($this->input->get_post('op_usaha_id'));
			
            $post_data  = array(
				'customer_id' => empty($input_post['customer_id']) ? NULL : $input_post['customer_id'],
				'usaha_id' => empty($input_post['usaha_id']) ? NULL : $input_post['usaha_id'],
				'so' => $so,
				'kecamatan_id' => empty($input_post['kecamatan_id']) ? NULL : $input_post['kecamatan_id'],
				'kelurahan_id' => empty($input_post['kelurahan_id']) ? NULL : $input_post['kelurahan_id'],
				'notes' => empty($input_post['notes']) ? NULL : $input_post['notes'],
				'tmt' => empty($input_post['tmt']) ? NULL : date('Y-m-d', strtotime($input_post['tmt'])),
				'enabled' => empty($input_post['enabled']) ? NULL : $input_post['enabled'],
				
				'write_date' => date('Y-m-d'),
				'write_uid' => sipkd_user_id(),
            );
            $this->objek_pajak_model->update($this->input->post('id'), $post_data);
            
            $this->session->set_flashdata('msg_success', 'Data telah disimpan');
            redirect(active_module_url('objek_pajak'));
        }
        
        $get               = (object) $post_data;
		
		$data['dt']['nopd'] = $this->objek_pajak_model->get_nopd($get->id);
        
		$select_data  = $this->load->model('usaha_model')->get_select();
		$options      = array();
		foreach ($select_data as $row) {
			$options[$row->id] = $row->nama;
		}
		$js                       = 'id="usaha_id" class="input-medium" required ';
		$data['select_usaha'] = form_dropdown('usaha_id', $options, $get->usaha_id, $js);
				
		$select_data  = $this->load->model('kecamatan_model')->get_select();
		$options      = array();
		foreach ($select_data as $row) {
			$options[$row->id] = $row->kecamatannm;
		}
		$js                       = 'id="kecamatan_id" class="input-medium" onChange="get_kelurahan(this.value);" required ';
		$data['select_kecamatan'] = form_dropdown('kecamatan_id', $options, $get->kecamatan_id, $js);

		$select_data = $this->load->model('kelurahan_model')->get_select($get->kecamatan_id);
		$options     = array();
		foreach ($select_data as $row) {
			$options[$row->id] = $row->kelurahannm;
		}
		$js                       = 'id="kelurahan_id" class="input-large" required ';
		$data['select_kelurahan'] = form_dropdown('kelurahan_id', $options, $get->kelurahan_id, $js);

		//read again ? tujuan nanti sih kayanya masuk ke op_status_usaha
		$options = array(
			'1' => 'AKTIF',
			'2' => 'INAKTIF'
		);
		$js = 'id="enabled" class="input-medium" required ';
		$data['select_status'] = form_dropdown('enabled', $options, $get->enabled, $js);
		
        $this->load->view('vobjek_pajak_form', $data);
    }
    
    public function delete() {
        if (!$this->module_auth->delete) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_delete);
            redirect(active_module_url('objek_pajak'));
        }
        
        $id = $this->uri->segment(4);
        if ($id && $this->objek_pajak_model->get($id)) {
            $this->objek_pajak_model->delete($id);
            $this->session->set_flashdata('msg_success', 'Data telah dihapus');
            redirect(active_module_url('objek_pajak'));
        } else {
            show_404();
        }
    }
	
    function get_typeahead_nopd() {
        $usaha_id = $this->uri->segment(4) != 0 ? $this->uri->segment(4) : FALSE;
        $xnopd = $this->uri->segment(5);
        $data = $this->load->model('objek_pajak_model')->get_typeahead_nopd($xnopd, $usaha_id);
        echo json_encode($data);
    }
}