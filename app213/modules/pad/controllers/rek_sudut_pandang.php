<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class rek_sudut_pandang extends CI_Controller
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
            'apps_model', 'rek_sudut_pandang_model'
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
		
        $this->load->view('vrek_sudut_pandang', $data);
    }
    
    function grid()
    {		
        $this->load->library('Datatables');
        $this->datatables->select('id, sudutnm, nilai');
        $this->datatables->from('pad_rek_sudut_pandang');
        $this->datatables->numeric_column('2');
        echo $this->datatables->generate();
    }
    
    private function fvalidation($jenis_rek_sudut_pandang = null)
    {
        $this->form_validation->set_error_delimiters('<span>', '</span>');
		$this->form_validation->set_rules('sudutnm','Uraian','required|trim');
		$this->form_validation->set_rules('nilai','Nilai','required');
    }
    
    private function fpost()
    {
		$data['id'] = $this->input->post('id');
		$data['sudutnm'] = $this->input->post('sudutnm');
		$data['nilai'] = pad_to_decimal($this->input->post('nilai'));
		
        return $data;
    }
    
    public function add()
    {
        if (!$this->module_auth->create) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_create);
            redirect(active_module_url('rek_sudut_pandang'));
        }
        
        $post_data  = $this->fpost();
        
        $data['current'] = 'referensi';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url('rek_sudut_pandang/add');
        
        $this->fvalidation();
        if ($this->form_validation->run() == TRUE) {
            $input_post = $post_data;
            $update_data = array(
				'sudutnm' => empty($input_post['sudutnm']) ? NULL : $input_post['sudutnm'],
				'nilai' => empty($input_post['nilai']) ? NULL : $input_post['nilai'],
            );
            $this->rek_sudut_pandang_model->save($update_data);
            
            $this->session->set_flashdata('msg_success', 'Data telah disimpan');
            redirect(active_module_url('rek_sudut_pandang'));
        }
        
        $data['dt']      = $post_data;
        $this->load->view('vrek_sudut_pandang_form', $data);
    }
    
    public function edit()
    {
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('rek_sudut_pandang'));
        }
        
        $p_id = $this->uri->segment(4);
        
        $data['current'] = 'referensi';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url("rek_sudut_pandang/update/{$p_id}");
        
        if ($p_id && $get = $this->rek_sudut_pandang_model->get($p_id)) {
			$data['dt']['id'] = empty($get->id) ? NULL : $get->id;
			$data['dt']['sudutnm'] = empty($get->sudutnm) ? NULL : $get->sudutnm;
			$data['dt']['nilai'] = empty($get->nilai) ? NULL : $get->nilai;
			
			$this->load->view('vrek_sudut_pandang_form', $data);
        } else {
            show_404();
        }
    }
    
    public function update()
    {
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('rek_sudut_pandang'));
        }
        
        $p_id       = $this->uri->segment(4);
        $post_data = $this->fpost();
        
        $data['current'] = 'referensi';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url("rek_sudut_pandang/update/{$p_id}");
        
        $this->fvalidation();
        if ($this->form_validation->run() == TRUE) {
            $input_post  = $post_data;
            $update_data = array(
				'sudutnm' => empty($input_post['sudutnm']) ? NULL : $input_post['sudutnm'],
				'nilai' => empty($input_post['nilai']) ? NULL : $input_post['nilai'],
            );
            
            $this->rek_sudut_pandang_model->update($p_id, $update_data);
            
            $this->session->set_flashdata('msg_success', 'Data telah disimpan');
            redirect(active_module_url('rek_sudut_pandang'));
        }
        
        $data['dt'] = $post_data;		
		$this->load->view('vrek_sudut_pandang_form', $data);
    }
    
    public function delete()
    {
        if (!$this->module_auth->delete) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_delete);
            redirect(active_module_url('rek_sudut_pandang'));
        }
        
        $id = $this->uri->segment(4);
        if ($id && $this->rek_sudut_pandang_model->get($id)) {
            $this->rek_sudut_pandang_model->delete($id);
            $this->session->set_flashdata('msg_success', 'Data telah dihapus');
            redirect(active_module_url('rek_sudut_pandang'));
        } else {
            show_404();
        }
    }
}