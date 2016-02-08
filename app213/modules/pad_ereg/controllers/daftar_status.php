<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class daftar_status extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!is_login()) {
            echo "<script>window.location.replace('" . base_url() . "');</script>";
            exit;
        }
        
        $module = 'referensi';
        $this->load->library('module_auth', array(
            'module' => $module
        ));
        
        $this->load->model(array(
            'apps_model', 'daftar_status_model'
        ));
		
		$this->load->helper(active_module());
    }
    
    public function index() 
    {
        if (!$this->module_auth->read) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_read);
            redirect('info');
        }
        
        $data['current'] = 'referensi';
        $data['apps']    = $this->apps_model->get_active_only();
		
        $this->load->view('vdaftar_status', $data);
    }
    
    function grid()
    {		
        $this->load->library('Datatables',$this->load->database('pad', TRUE));
        $this->datatables->select('id, kode, uraian');
        $this->datatables->from('pad_daftar_status');
        echo $this->datatables->generate();
    }
    
    private function fvalidation($jenis_daftar_status = null)
    {
        $this->form_validation->set_error_delimiters('<span>', '</span>');
		$this->form_validation->set_rules('kode','Kode','required|trim|max_length[2]');
		$this->form_validation->set_rules('uraian','Uraian','required|trim|max_length[50]');
    }
    
    private function fpost()
    {
		$data['id'] = $this->input->post('id');
		$data['kode'] = $this->input->post('kode');
		$data['uraian'] = $this->input->post('uraian');
		
        return $data;
    }
    
    public function add()
    {
        if (!$this->module_auth->create) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_create);
            redirect(active_module_url('daftar_status'));
        }
        
        $post_data  = $this->fpost();
        
        $data['current'] = 'referensi';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url('daftar_status/add');
        
        $this->fvalidation();
        if ($this->form_validation->run() == TRUE) {
            $input_post = $post_data;
            $update_data = array(
				'kode' => empty($input_post['kode']) ? NULL : $input_post['kode'],
				'uraian' => empty($input_post['uraian']) ? NULL : $input_post['uraian'],
            );
            $this->daftar_status_model->save($update_data);
            
            $this->session->set_flashdata('msg_success', 'Data telah disimpan');
            redirect(active_module_url('daftar_status'));
        }
        
        $data['dt']      = $post_data;
        $this->load->view('vdaftar_status_form', $data);
    }
    
    public function edit()
    {
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('daftar_status'));
        }
        
        $p_id = $this->uri->segment(4);
        
        $data['current'] = 'referensi';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url("daftar_status/update/{$p_id}");
        
        if ($p_id && $get = $this->daftar_status_model->get($p_id)) {
			$data['dt']['id'] = empty($get->id) ? NULL : $get->id;
			$data['dt']['kode'] = empty($get->kode) ? NULL : $get->kode;
			$data['dt']['uraian'] = empty($get->uraian) ? NULL : $get->uraian;
			
			$this->load->view('vdaftar_status_form', $data);
        } else {
            show_404();
        }
    }
    
    public function update()
    {
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('daftar_status'));
        }
        
        $p_id       = $this->uri->segment(4);
        $post_data = $this->fpost();
        
        $data['current'] = 'referensi';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url("daftar_status/update/{$p_id}");
        
        $this->fvalidation();
        if ($this->form_validation->run() == TRUE) {
            $input_post  = $post_data;
            $update_data = array(
				'kode' => empty($input_post['kode']) ? NULL : $input_post['kode'],
				'uraian' => empty($input_post['uraian']) ? NULL : $input_post['uraian'],
            );
            
            $this->daftar_status_model->update($p_id, $update_data);
            
            $this->session->set_flashdata('msg_success', 'Data telah disimpan');
            redirect(active_module_url('daftar_status'));
        }
        
        $data['dt'] = $post_data;		
		$this->load->view('vdaftar_status_form', $data);
    }
    
    public function delete()
    {
        if (!$this->module_auth->delete) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_delete);
            redirect(active_module_url('daftar_status'));
        }
        
        $id = $this->uri->segment(4);
        if ($id && $this->daftar_status_model->get($id)) {
            $this->daftar_status_model->delete($id);
            $this->session->set_flashdata('msg_success', 'Data telah dihapus');
            redirect(active_module_url('daftar_status'));
        } else {
            show_404();
        }
    }
}