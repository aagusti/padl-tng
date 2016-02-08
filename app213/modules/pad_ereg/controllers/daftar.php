<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class daftar extends CI_Controller {
	private $pad_module;
	private $controller;
	private $module;
	private $db_pad;
    
    function __construct() {
        parent::__construct();
        $this->load->model(array(
            'apps_model', 'users_model', 'daftar_model', 'daftar_status_model', 'daftar_hist_model', 
        ));
		
        $this->pad_module = $this->router->fetch_module();
        $this->controller = $this->router->fetch_class();
        $this->module = 'pendaftaran';
		$this->db_pad = $this->load->database('pad', TRUE);
        
		$this->load->helper($this->pad_module.'/'.$this->pad_module);
    }
    
    function load_auth() {
        if (!is_login()) {
			show_404();
			exit;
        }
        
        $this->load->library('module_auth', array(
            'module' => $this->module,
        ));
    }
    
    public function index() {
        $this->load_auth();
        if (!$this->module_auth->read) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_read);
            redirect('info');
        }
        
        $data['current'] = 'pendaftaran';
        $data['apps']    = $this->apps_model->get_active_only();
        
		if (!cwp_login()) 
            $this->load->view('vdaftar', $data);
        else
            $this->load->view('cwp/vmain', $data);
    }
    
    function grid() {
        $this->load->library('Datatables',$this->load->database('pad', TRUE));

		if (!cwp_login()) {
            $this->datatables->select('d.id, d.reg_date, d.formno, d.customernm, u.usahanm, 
                d.wpnama, d.alamat,
                coalesce(
                    (select s.uraian 
                    from pad_daftar_status s 
                    inner join pad_daftar_hist h on h.status_id=s.id 
                    where h.daftar_id=d.id
                    order by h.id desc limit 1),
                \'Draft\') as status', false);
            $this->datatables->from('pad_daftar d');
            $this->datatables->join('pad_usaha u','u.id=d.op_usaha_id');
			$this->datatables->date_column('1');
            
        } else {
            $this->datatables->select('d.id, coalesce(d.reg_date, dh.create_date) as tgl,
                d.customernm, u.usahanm, 
                coalesce(ds.uraian,\'Draft\') as status, dh.keterangan', false);
            $this->datatables->from('pad_daftar d');
            $this->datatables->join('pad_daftar_hist dh','d.id=dh.daftar_id','left');
            $this->datatables->join('pad_daftar_status ds','ds.id=dh.status_id','left');
            $this->datatables->join('pad_usaha u','u.id=d.op_usaha_id');
			$this->datatables->where('d.id', cwp_id());
            
			$this->datatables->date_column('1');
        }
		
        echo $this->datatables->generate();
    }
	    
    // grid kartu data hotel
    function grid_kd() 
    {        
        $id = $this->uri->segment(4);

        $this->load->library('Datatables',$this->load->database('pad', TRUE));
        $this->datatables->select('notes, tarif, kamar, volume', false);
        $this->datatables->from('pad_daftar_kd_det');			
        $this->datatables->where('daftar_id', $id);

        $this->datatables->add_column('batal', '<a class="delete" href="">Hapus</a>');
        
        echo $this->datatables->generate();
    }
    
    //admin
    private function fvalidation() {
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        
        $this->form_validation->set_rules('pb', 'pb', 'required|numeric');
        $this->form_validation->set_rules('rp','rp','required|trim');
        $this->form_validation->set_rules('customernm', 'Wajib Pajak', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'required|numeric');
        $this->form_validation->set_rules('kelurahan_id', 'Kelurahan', 'required|numeric');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim');
        
        $this->form_validation->set_rules('wpnama', 'Pemilik', 'required|trim');
        $this->form_validation->set_rules('wpalamat', 'Alamat Pemilik', 'required|trim');
        $this->form_validation->set_rules('wpkelurahan', 'Kelurahan Pemilik', 'required|trim');
        $this->form_validation->set_rules('wpkecamatan', 'Kecamatan Pemilik', 'required|trim');
        $this->form_validation->set_rules('wpkabupaten', 'Kabupaten Pemilik', 'required|trim');
        
        $this->form_validation->set_rules('op_nm','Nama Objek Pajak','trim|required');
        $this->form_validation->set_rules('op_alamat','Alamat Objek Pajak','trim|required');
        
    }
    
    private function fpost() {
        $data['rp']                 = $this->input->post('rp');
        $data['pb']                 = $this->input->post('pb');
        $data['formno']             = $this->input->post('formno');
        $data['reg_date']           = $this->input->post('reg_date');
        $data['reg_kelurahan_id']   = $this->input->post('reg_kelurahan_id');
        $data['customernm']         = $this->input->post('customernm');
        $data['alamat']             = $this->input->post('alamat');
        $data['kelurahan_id']       = $this->input->post('kelurahan_id');
        $data['kabupaten']          = $this->input->post('kabupaten');
        $data['telphone']           = $this->input->post('telphone');
        $data['kodepos']            = $this->input->post('kodepos');
        $data['ijin1']              = $this->input->post('ijin1');
        $data['ijin1no']            = $this->input->post('ijin1no');
        $data['ijin1tgl']           = $this->input->post('ijin1tgl');
        $data['ijin2']              = $this->input->post('ijin2');
        $data['ijin2no']            = $this->input->post('ijin2no');
        $data['ijin2tgl']           = $this->input->post('ijin2tgl');
        $data['ijin3']              = $this->input->post('ijin3');
        $data['ijin3no']            = $this->input->post('ijin3no');
        $data['ijin3tgl']           = $this->input->post('ijin3tgl');
        $data['ijin4']              = $this->input->post('ijin4');
        $data['ijin4no']            = $this->input->post('ijin4no');
        $data['ijin4tgl']           = $this->input->post('ijin4tgl');
        $data['customer_status_id'] = $this->input->post('customer_status_id');
        $data['kirimtgl']           = $this->input->post('kirimtgl');
        $data['batastgl']           = $this->input->post('batastgl');
        $data['penerimanm']         = $this->input->post('penerimanm');
        $data['penerimaalamat']     = $this->input->post('penerimaalamat');
        $data['penerimatgl']        = $this->input->post('penerimatgl');
        $data['wpnama']             = $this->input->post('wpnama');
        $data['wpalamat']           = $this->input->post('wpalamat');
        $data['wpkelurahan']        = $this->input->post('wpkelurahan');
        $data['wpkecamatan']        = $this->input->post('wpkecamatan');
        $data['wpkabupaten']        = $this->input->post('wpkabupaten');
        $data['wptelp']             = $this->input->post('wptelp');
        $data['wpkodepos']          = $this->input->post('wpkodepos');
        $data['kembalitgl']         = $this->input->post('kembalitgl');
        $data['kembalioleh']        = $this->input->post('kembalioleh');
        $data['kukuhno']            = $this->input->post('kukuhno');
        $data['kukuhtgl']           = $this->input->post('kukuhtgl');
        $data['kukuhprinted']       = $this->input->post('kukuhprinted');
        $data['kartuprinted']       = $this->input->post('kartuprinted');
        $data['id']                 = $this->input->post('id');
        $data['tmt']                = $this->input->post('tmt');
        $data['enabled']            = $this->input->post('enabled');
        $data['create_date']        = $this->input->post('create_date');
        $data['create_uid']         = $this->input->post('create_uid');
        $data['write_date']         = $this->input->post('write_date');
        $data['write_uid']          = $this->input->post('write_uid');
        $data['kukuhnip']           = $this->input->post('kukuhnip');
        $data['kembalinip']         = $this->input->post('kembalinip');
        $data['catatnip']           = $this->input->post('catatnip');
        $data['kukuh_jabat_id']     = $this->input->post('kukuh_jabat_id');
        $data['petugas_jabat_id']   = $this->input->post('petugas_jabat_id');
        $data['pencatat_jabat_id']  = $this->input->post('pencatat_jabat_id');
        $data['pnama']              = $this->input->post('pnama');
        $data['palamat']            = $this->input->post('palamat');
        $data['pkelurahan']         = $this->input->post('pkelurahan');
        $data['pkecamatan']         = $this->input->post('pkecamatan');
        $data['pkabupaten']         = $this->input->post('pkabupaten');
        $data['ptelp']              = $this->input->post('ptelp');
        $data['pkodepos']           = $this->input->post('pkodepos');
        $data['parent']             = $this->input->post('parent');
        $data['npwpd']              = $this->input->post('npwpd');
        $data['kecamatan_id']       = $this->input->post('kecamatan_id');
        $data['ijin1tglakhir']      = $this->input->post('ijin1tglakhir');
        $data['ijin2tglakhir']      = $this->input->post('ijin2tglakhir');
        $data['ijin3tglakhir']      = $this->input->post('ijin3tglakhir');
        $data['ijin4tglakhir']      = $this->input->post('ijin4tglakhir');
        
		//tambahan
        $data['kd_restojmlmeja'] = pad_to_decimal($this->input->post('kd_restojmlmeja')); 
        $data['kd_restojmlkursi'] = pad_to_decimal($this->input->post('kd_restojmlkursi'));
        $data['kd_restojmltamu'] = pad_to_decimal($this->input->post('kd_restojmltamu'));
        $data['kd_filmkursi'] = pad_to_decimal($this->input->post('kd_filmkursi'));
        $data['kd_filmpertunjukan'] = pad_to_decimal($this->input->post('kd_filmpertunjukan'));
        $data['kd_filmtarif'] = pad_to_decimal($this->input->post('kd_filmtarif'));
        $data['kd_bilyarmeja'] = pad_to_decimal($this->input->post('kd_bilyarmeja'));
        $data['kd_bilyartarif'] = pad_to_decimal($this->input->post('kd_bilyartarif'));
        $data['kd_bilyarkegiatan'] = pad_to_decimal($this->input->post('kd_bilyarkegiatan'));
        $data['kd_diskopengunjung'] = pad_to_decimal($this->input->post('kd_diskopengunjung'));
        $data['kd_diskotarif'] = pad_to_decimal($this->input->post('kd_diskotarif'));
        $data['kd_waletvolume'] = pad_to_decimal($this->input->post('kd_waletvolume'));
        
        //op
        $data['op_nm']            = $this->input->post('op_nm');
        $data['op_alamat']        = $this->input->post('op_alamat');
        $data['op_usaha_id']      = $this->input->post('op_usaha_id');
        $data['op_pajak_id']      = $this->input->post('op_pajak_id');
        $data['op_so']            = $this->input->post('op_so');
        $data['op_kecamatan_id']  = $this->input->post('op_kecamatan_id');
        $data['op_kelurahan_id']  = $this->input->post('op_kelurahan_id');
        $data['op_latitude']      = $this->input->post('op_latitude');
        $data['op_longitude']     = $this->input->post('op_longitude');

        $data['email']   = $this->input->post('email');
        $data['passwd']  = $this->input->post('passwd');
        $data['passwd2'] = $this->input->post('passwd2');
        $data['npwpd']   = $this->input->post('npwpd');
        return $data;
    }
    
    public function add() {
        $curr_path = $this->pad_module.'/'.$this->controller.'/';
        
        $data['current'] = 'pendaftaran';
        $data['apps']    = array();
        $data['faction'] = $curr_path.'add';
        $data['dt']      = $this->fpost();
        
        $this->fvalidation();
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[pad_daftar.email]');
		$this->form_validation->set_rules('passwd', 'Password', 'required|matches[passwd2]');
		$this->form_validation->set_rules('passwd2', 'Password (Confirm)', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $input_post = $this->fpost();
		
            //verify captcha
            $recaptcha_secret = "6Lf5EgITAAAAANxp-2-7TMPZ0Mi_aFmoGBmPZW0v";
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
            $response = json_decode($response, true);
            if($response["success"] === true) {
                // $this->session->set_flashdata('msg_success', 'Google Recaptcha Successful');
                // redirect($curr_path.'add');
            }else{
                $this->session->set_flashdata('msg_error', 'Sorry Google Recaptcha Unsuccessful! '.$response["error-codes"][0]);
                redirect($curr_path.'add');
            }


			$formno = $this->daftar_model->generate_formno();
			
            $usaha_model = $this->load->model('usaha_model');
            $so = $usaha_model->get_so($input_post['op_usaha_id']);
        
            $post_data  = array(
                'formno' => $formno,
                'rp' => $input_post['rp'],
                'pb' => $input_post['pb'],
                'reg_date' => date('Y-m-d'),
                'customernm' => $input_post['customernm'],
                'alamat' => $input_post['alamat'],
                'kecamatan_id' => $input_post['kecamatan_id'],
                'kelurahan_id' => $input_post['kelurahan_id'],
                'kabupaten' => $input_post['kabupaten'],
                'telphone' => $input_post['telphone'],
                'kodepos' => $input_post['kodepos'],
                
                'wpnama' => $input_post['wpnama'],
                'wpalamat' => $input_post['wpalamat'],
                'wpkelurahan' => $input_post['wpkelurahan'],
                'wpkecamatan' => $input_post['wpkecamatan'],
                'wpkabupaten' => $input_post['wpkabupaten'],
                'wptelp' => $input_post['wptelp'],
                'wpkodepos' => $input_post['wpkodepos'],
                
                'pnama' => $input_post['wpnama'],
                'palamat' => $input_post['wpalamat'],
                'pkelurahan' => $input_post['wpkelurahan'],
                'pkecamatan' => $input_post['wpkecamatan'],
                'pkabupaten' => $input_post['wpkabupaten'],
                'ptelp' => $input_post['wptelp'],
                'pkodepos' => $input_post['wpkodepos'],
                
                'enabled' => 1,
                
                'ijin1' => $input_post['ijin1'],
                'ijin1no' => $input_post['ijin1no'],
                'ijin1tgl' => $input_post['ijin1tgl'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin1tgl'])),
                'ijin1tglakhir' => $input_post['ijin1tglakhir'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin1tglakhir'])),
                'ijin2' => $input_post['ijin2'],
                'ijin2no' => $input_post['ijin2no'],
                'ijin2tgl' => $input_post['ijin2tgl'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin2tgl'])),
                'ijin2tglakhir' => $input_post['ijin2tglakhir'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin2tglakhir'])),
                'ijin3' => $input_post['ijin3'],
                'ijin3no' => $input_post['ijin3no'],
                'ijin3tgl' => $input_post['ijin3tgl'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin3tgl'])),
                'ijin3tglakhir' => $input_post['ijin3tglakhir'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin3tglakhir'])),
                'ijin4' => $input_post['ijin4'],
                'ijin4no' => $input_post['ijin4no'],
                'ijin4tgl' => $input_post['ijin4tgl'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin4tgl'])),
                'ijin4tglakhir' => $input_post['ijin4tglakhir'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin4tglakhir'])),
                
                'create_date' => date('Y-m-d'),
                'create_uid' => 90909090,
                
                // data tambahan
                'kd_restojmlmeja' => $input_post['kd_restojmlmeja'],
                'kd_restojmlkursi' => $input_post['kd_restojmlkursi'],
                'kd_restojmltamu' => $input_post['kd_restojmltamu'],
                'kd_filmkursi' => $input_post['kd_filmkursi'],
                'kd_filmpertunjukan' => $input_post['kd_filmpertunjukan'],
                'kd_filmtarif' => $input_post['kd_filmtarif'],
                'kd_bilyarmeja' => $input_post['kd_bilyarmeja'],
                'kd_bilyartarif' => $input_post['kd_bilyartarif'],
                'kd_bilyarkegiatan' => $input_post['kd_bilyarkegiatan'],
                'kd_diskopengunjung' => $input_post['kd_diskopengunjung'],
                'kd_diskotarif' => $input_post['kd_diskotarif'],
                'kd_waletvolume' => $input_post['kd_waletvolume'],
                
                'email'  => $input_post['email'],
                'passwd' => $input_post['passwd'],
                
                //op
                'op_nm' => $this->input->get_post('op_nm'),
                'op_alamat' => $this->input->get_post('op_alamat'),
                'op_usaha_id' => $this->input->get_post('op_usaha_id'),
                'op_pajak_id' => $this->input->get_post('op_pajak_id'),
                'op_so' => $so,
                'op_kecamatan_id' => $this->input->get_post('op_kecamatan_id'),
                'op_kelurahan_id' => $this->input->get_post('op_kelurahan_id'),
                'op_latitude' => pad_to_decimal($this->input->get_post('op_latitude')),
                'op_longitude' => pad_to_decimal($this->input->get_post('op_longitude')),
                
            );
            
			if( $new_id = $this->daftar_model->save($post_data)) {
                // data tambahan / detail
				$dtKD = $this->input->post('dtKD');
				$tambahan_data2 = array();

                if(isset($dtKD)) {
                    $i = 1;
                    $dtKD = json_decode($dtKD, true);
                    
                    if(count($dtKD['dtKD']) > 0){
                        $cid = $new_id;
                        $rd_row = array();
                        foreach($dtKD['dtKD'] as $rows) {
                            $rd_row = array (
                                'daftar_id' => $cid,
                                'nourut' => $i,
                                'notes'  => $rows[0],
                                'tarif'  => pad_to_decimal($rows[1]),
                                'kamar'  => pad_to_decimal($rows[2]),
                                'volume' => pad_to_decimal($rows[3]),
                            );
                            $i++;
                            $tambahan_data2 = array_merge($tambahan_data2, array($rd_row));
                        }
                        
                        //langsung ajah dah - sementara
                        $this->db->delete('pad_daftar_kd_det', array('daftar_id' => $cid)); 
                        $this->db->insert_batch('pad_daftar_kd_det', $tambahan_data2);
                    }
                }
                
                // uplod dokeumen
                // $this->unggah($cid);
                // end data tambahan
                
                //daftar ke users dengan group = pad_ereg
                $data = array(
                    'userid' => $this->input->post('email'),
                    'nama' => $this->input->post('customernm'),
                    'passwd' => $this->input->post('passwd'),
                    'nip' => $formno,
                    'jabatan' => 'cwp', //calon wajib pajak
                    'disabled' => $this->input->post('disabled') ? 1 : 0,
                    'created' => date('Y-m-d'),
                );
                if($user_id = $this->users_model->save($data)) {
                    $group_id = $this->db->query("SELECT id FROM groups WHERE kode='pad_ereg'")->row()->id; // <---------------------------
                    if(!empty($group_id)) {
                        $data = array(
                            'user_id'  => $user_id,
                            'group_id' => $group_id,
                        );
                        $this->db->insert('user_groups',$data);
                    }
                }
                //end daftar                
                
				$this->session->set_flashdata('msg_success', 'Data telah disimpan.');
				redirect($curr_path.'success');
			}
        }
		
        $get = (object) $this->fpost();
            
		$data['dt']['rp'] = 'P';
		$data['dt']['reg_date'] = date('d-m-Y');
		
		$options = array(
			'1' => 'PRIBADI',
			'2' => 'BADAN'
		);
		$js                = 'id="pb" class="input-medium" required ';
		$data['select_pb'] = form_dropdown('pb', $options, $get->pb, $js);
		
		$select_data  = $this->load->model('kecamatan_model')->get_select();
		$options      = array();
		$kec_id = '';
		if($select_data) {
		foreach ($select_data as $row) {
			if($kec_id == '') $kec_id = $row->id;
			$options[$row->id] = $row->kecamatannm;
		}}
		$js                       = 'id="kecamatan_id" class="input-medium" onChange="get_kelurahan(this.value);" required ';
		$data['select_kecamatan'] = form_dropdown('kecamatan_id', $options, $get->kecamatan_id, $js);

		$select_data = $this->load->model('kelurahan_model')->get_select($kec_id);
		$options     = array();
		if($select_data) {
		foreach ($select_data as $row) {
			$options[$row->id] = $row->kelurahannm;
		}}
		$js                       = 'id="kelurahan_id" class="input-large" required ';
		$data['select_kelurahan'] = form_dropdown('kelurahan_id', $options, $get->kelurahan_id, $js);

		//op        
		$select_data  = $this->load->model('kecamatan_model')->get_select();
		$options      = array();
		$kec_id = $get->op_kecamatan_id;
		if($select_data) {
		foreach ($select_data as $row) {
			if($kec_id == '') $kec_id = $row->id;
			$options[$row->id] = $row->kecamatannm;
		}}
		$js                       = 'id="op_kecamatan_id" class="input-medium" onChange="get_op_kelurahan(this.value);" required ';
		$data['select_op_kecamatan'] = form_dropdown('op_kecamatan_id', $options, $get->op_kecamatan_id, $js);

		$select_data = $this->load->model('kelurahan_model')->get_select($kec_id);
		$options     = array();
		if($select_data) {
		foreach ($select_data as $row) {
			$options[$row->id] = $row->kelurahannm;
		}}
		$js                       = 'id="op_kelurahan_id" class="input-large" required ';
		$data['select_op_kelurahan'] = form_dropdown('op_kelurahan_id', $options, $get->op_kelurahan_id, $js);
        
        $select_data = $this->load->model('usaha_model')->get_select();
		$options      = array();
		$usaha_id = $get->op_usaha_id;
		if($select_data) {
		foreach ($select_data as $row) {
			if($usaha_id == '') $usaha_id = $row->id;
			$options[$row->id] = $row->usahanm;
		}}
		$js                       = 'id="op_usaha_id" class="input-medium" onChange="get_op_pajak(this.value);" required ';
		$data['select_op_usaha'] = form_dropdown('op_usaha_id', $options, $get->op_usaha_id, $js);
        
        $select_data = $this->load->model('pajak_model')->get_select2($usaha_id);
		$options     = array();
		if($select_data) {
		foreach ($select_data as $row) {
			$options[$row->id] = $row->pajaknm;
		}}
		$js                       = 'id="op_pajak_id" class="input-large" required ';
		$data['select_op_pajak'] = form_dropdown('op_pajak_id', $options, $get->op_pajak_id, $js);
        
        $this->load->view('vdaftar_form', $data);
    }
    
    public function edit() {
        $this->load_auth();
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('daftar'));
        }
        
		if (cwp_login()) {
            if($this->db_pad->get_where('pad_daftar_hist', array('daftar_id'=>cwp_id()))->result()) {
                $this->session->set_flashdata('msg_warning', 'Data tidak dapat diedit lagi. Status sudah bukan Draft.');
                redirect(active_module_url('daftar'));
            }
        }
        
        $data['current'] = 'pendaftaran';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url('daftar/update');
        
        $id = $this->uri->segment(4);
        if ($id && $get = $this->daftar_model->get($id)) {
            $data['dt']['rp']                 = $get->rp;
            $data['dt']['pb']                 = $get->pb;
            $data['dt']['formno']             = $get->formno;
            $data['dt']['reg_date']           = date('d-m-Y', strtotime($get->reg_date));
            $data['dt']['customernm']         = $get->customernm;
            $data['dt']['alamat']             = $get->alamat;
            $data['dt']['kelurahan_id']       = $get->kelurahan_id;
            $data['dt']['kabupaten']          = $get->kabupaten;
            $data['dt']['telphone']           = $get->telphone;
            $data['dt']['kodepos']            = $get->kodepos;
            $data['dt']['ijin1']              = $get->ijin1;
            $data['dt']['ijin1no']            = $get->ijin1no;
            $data['dt']['ijin1tgl']           = $get->ijin1tgl == null ? '' : date('d-m-Y', strtotime($get->ijin1tgl));
            $data['dt']['ijin2']              = $get->ijin2;
            $data['dt']['ijin2no']            = $get->ijin2no;
            $data['dt']['ijin2tgl']           = $get->ijin2tgl == null ? '' : date('d-m-Y', strtotime($get->ijin2tgl));
            $data['dt']['ijin3']              = $get->ijin3;
            $data['dt']['ijin3no']            = $get->ijin3no;
            $data['dt']['ijin3tgl']           = $get->ijin3tgl == null ? '' : date('d-m-Y', strtotime($get->ijin3tgl));
            $data['dt']['ijin4']              = $get->ijin4;
            $data['dt']['ijin4no']            = $get->ijin4no;
            $data['dt']['ijin4tgl']           = $get->ijin4tgl == null ? '' : date('d-m-Y', strtotime($get->ijin4tgl));
            $data['dt']['wpnama']             = $get->wpnama;
            $data['dt']['wpalamat']           = $get->wpalamat;
            $data['dt']['wpkelurahan']        = $get->wpkelurahan;
            $data['dt']['wpkecamatan']        = $get->wpkecamatan;
            $data['dt']['wpkabupaten']        = $get->wpkabupaten;
            $data['dt']['wptelp']             = $get->wptelp;
            $data['dt']['wpkodepos']          = $get->wpkodepos;
            $data['dt']['id']                 = $get->id;
            $data['dt']['enabled']            = $get->enabled;
            $data['dt']['create_date']        = date('d-m-Y', strtotime($get->create_date));
            $data['dt']['create_uid']         = $get->create_uid;
            $data['dt']['write_date']         = date('d-m-Y', strtotime($get->write_date));
            $data['dt']['write_uid']          = $get->write_uid;
            $data['dt']['pnama']              = $get->pnama;
            $data['dt']['palamat']            = $get->palamat;
            $data['dt']['pkelurahan']         = $get->pkelurahan;
            $data['dt']['pkecamatan']         = $get->pkecamatan;
            $data['dt']['pkabupaten']         = $get->pkabupaten;
            $data['dt']['ptelp']              = $get->ptelp;
            $data['dt']['pkodepos']           = $get->pkodepos;
			            
			$data['dt']['kecamatan_id']       = $get->kecamatan_id;
            $data['dt']['ijin1tglakhir']      = $get->ijin1tglakhir == null ? '' : date('d-m-Y', strtotime($get->ijin1tglakhir));
            $data['dt']['ijin2tglakhir']      = $get->ijin2tglakhir == null ? '' : date('d-m-Y', strtotime($get->ijin2tglakhir));
            $data['dt']['ijin3tglakhir']      = $get->ijin3tglakhir == null ? '' : date('d-m-Y', strtotime($get->ijin3tglakhir));
            $data['dt']['ijin4tglakhir']      = $get->ijin4tglakhir == null ? '' : date('d-m-Y', strtotime($get->ijin4tglakhir));
            		
            // data tambahan
            $data['dt']['kd_restojmlmeja'] = $get->kd_restojmlmeja;
            $data['dt']['kd_restojmlkursi'] = $get->kd_restojmlkursi;
            $data['dt']['kd_restojmltamu'] = $get->kd_restojmltamu;
            $data['dt']['kd_filmkursi'] = $get->kd_filmkursi;
            $data['dt']['kd_filmpertunjukan'] = $get->kd_filmpertunjukan;
            $data['dt']['kd_filmtarif'] = $get->kd_filmtarif;
            $data['dt']['kd_bilyarmeja'] = $get->kd_bilyarmeja;
            $data['dt']['kd_bilyartarif'] = $get->kd_bilyartarif;
            $data['dt']['kd_bilyarkegiatan'] = $get->kd_bilyarkegiatan;
            $data['dt']['kd_diskopengunjung'] = $get->kd_diskopengunjung;
            $data['dt']['kd_diskotarif'] = $get->kd_diskotarif;
            $data['dt']['kd_waletvolume'] = $get->kd_waletvolume;
            
            $data['dt']['npwpd'] = $get->npwpd;
            $data['dt']['email'] = $get->email;
            $data['dt']['passwd'] = $get->passwd;
            
            //op
            $data['dt']['op_nm']            = $get->op_nm;
            $data['dt']['op_alamat']        = $get->op_alamat;
            $data['dt']['op_usaha_id']      = $get->op_usaha_id;
            $data['dt']['op_pajak_id']      = $get->op_pajak_id;
            $data['dt']['op_so']            = $get->op_so;
            $data['dt']['op_kecamatan_id']  = $get->op_kecamatan_id;
            $data['dt']['op_kelurahan_id']  = $get->op_kelurahan_id;
            $data['dt']['op_latitude']      = $get->op_latitude;
            $data['dt']['op_longitude']     = $get->op_longitude;
            
            $options           = array(
                '1' => 'PRIBADI',
                '2' => 'BADAN'
            );
            $js                = 'id="pb" class="input-medium" required ';
            $data['select_pb'] = form_dropdown('pb', $options, $get->pb, $js);
            
            $select_data = $this->load->model('kecamatan_model')->get_select();
            $options     = array();
            if($select_data) {
			foreach ($select_data as $row) {
				$options[$row->id] = $row->kecamatannm;
			}}
            $js                       = 'id="kecamatan_id" class="input-medium" onChange="get_kelurahan(this.value);" required ';
            $data['select_kecamatan'] = form_dropdown('kecamatan_id', $options, $get->kecamatan_id, $js);
            
            $select_data = $this->load->model('kelurahan_model')->get_select($get->kecamatan_id);
            $options     = array();
            if($select_data) {
            foreach ($select_data as $row) {
                $options[$row->id] = $row->kelurahannm;
            }}
            $js                       = 'id="kelurahan_id" class="input-large" required ';
            $data['select_kelurahan'] = form_dropdown('kelurahan_id', $options, $get->kelurahan_id, $js);
				
            //op        
            $select_data  = $this->load->model('kecamatan_model')->get_select();
            $options      = array();
            $kec_id = $get->op_kecamatan_id;
            if($select_data) {
            foreach ($select_data as $row) {
                if($kec_id == '') $kec_id = $row->id;
                $options[$row->id] = $row->kecamatannm;
            }}
            $js                       = 'id="op_kecamatan_id" class="input-medium" onChange="get_op_kelurahan(this.value);" required ';
            $data['select_op_kecamatan'] = form_dropdown('op_kecamatan_id', $options, $get->op_kecamatan_id, $js);

            $select_data = $this->load->model('kelurahan_model')->get_select($kec_id);
            $options     = array();
            if($select_data) {
            foreach ($select_data as $row) {
                $options[$row->id] = $row->kelurahannm;
            }}
            $js                       = 'id="op_kelurahan_id" class="input-large" required ';
            $data['select_op_kelurahan'] = form_dropdown('op_kelurahan_id', $options, $get->op_kelurahan_id, $js);
            
            $select_data = $this->load->model('usaha_model')->get_select();
            $options      = array();
            $usaha_id = $get->op_usaha_id;
            if($select_data) {
            foreach ($select_data as $row) {
                if($usaha_id == '') $usaha_id = $row->id;
                $options[$row->id] = $row->usahanm;
            }}
            $js                       = 'id="op_usaha_id" class="input-medium" onChange="get_op_pajak(this.value);" required ';
            $data['select_op_usaha'] = form_dropdown('op_usaha_id', $options, $get->op_usaha_id, $js);
            
            $select_data = $this->load->model('pajak_model')->get_select2($usaha_id);
            $options     = array();
            if($select_data) {
            foreach ($select_data as $row) {
                $options[$row->id] = $row->pajaknm;
            }}
            $js                       = 'id="op_pajak_id" class="input-large" required ';
            $data['select_op_pajak'] = form_dropdown('op_pajak_id', $options, $get->op_pajak_id, $js);
            
            $this->load->view('vdaftar_form2', $data);
        } else {
            show_404();
        }
    }
    
    public function update() {
        $this->load_auth();
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('daftar'));
        }

		if (cwp_login()) {
            if($this->db_pad->get_where('pad_daftar_hist', array('daftar_id'=>cwp_id()))->result()) {
                $this->session->set_flashdata('msg_warning', 'Data tidak dapat diedit lagi. Status sudah bukan Draft.');
                redirect(active_module_url('daftar'));
            }
        }

        $data['current'] = 'pendaftaran';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url('daftar/update');
        
        $post_data  = $this->fpost();
        $data['dt'] = $post_data;
        
        $this->fvalidation();
        if ($this->form_validation->run() == TRUE) {
            $input_post = $post_data;
            
            $usaha_model = $this->load->model('usaha_model');
            $so = $usaha_model->get_so($input_post['op_usaha_id']);
            
            $post_data  = array(                
                'rp' => $input_post['rp'],
                'pb' => $input_post['pb'],
                'customernm' => $input_post['customernm'],
                'alamat' => $input_post['alamat'],
                'kecamatan_id' => $input_post['kecamatan_id'],
                'kelurahan_id' => $input_post['kelurahan_id'],
                'kabupaten' => $input_post['kabupaten'],
                'telphone' => $input_post['telphone'],
                'kodepos' => $input_post['kodepos'],
                
                'wpnama' => $input_post['wpnama'],
                'wpalamat' => $input_post['wpalamat'],
                'wpkelurahan' => $input_post['wpkelurahan'],
                'wpkecamatan' => $input_post['wpkecamatan'],
                'wpkabupaten' => $input_post['wpkabupaten'],
                'wptelp' => $input_post['wptelp'],
                'wpkodepos' => $input_post['wpkodepos'],
                
                'pnama' => $input_post['wpnama'],
                'palamat' => $input_post['wpalamat'],
                'pkelurahan' => $input_post['wpkelurahan'],
                'pkecamatan' => $input_post['wpkecamatan'],
                'pkabupaten' => $input_post['wpkabupaten'],
                'ptelp' => $input_post['wptelp'],
                'pkodepos' => $input_post['wpkodepos'],
                                
                'ijin1' => $input_post['ijin1'],
                'ijin1no' => $input_post['ijin1no'],
                'ijin1tgl' => $input_post['ijin1tgl'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin1tgl'])),
                'ijin1tglakhir' => $input_post['ijin1tglakhir'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin1tglakhir'])),
                'ijin2' => $input_post['ijin2'],
                'ijin2no' => $input_post['ijin2no'],
                'ijin2tgl' => $input_post['ijin2tgl'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin2tgl'])),
                'ijin2tglakhir' => $input_post['ijin2tglakhir'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin2tglakhir'])),
                'ijin3' => $input_post['ijin3'],
                'ijin3no' => $input_post['ijin3no'],
                'ijin3tgl' => $input_post['ijin3tgl'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin3tgl'])),
                'ijin3tglakhir' => $input_post['ijin3tglakhir'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin3tglakhir'])),
                'ijin4' => $input_post['ijin4'],
                'ijin4no' => $input_post['ijin4no'],
                'ijin4tgl' => $input_post['ijin4tgl'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin4tgl'])),
                'ijin4tglakhir' => $input_post['ijin4tglakhir'] == '' ? NULL : date('Y-m-d', strtotime($input_post['ijin4tglakhir'])),
                
                'write_date' => date('Y-m-d'),
                'write_uid' => 90909090,
                
                // data tambahan
                'kd_restojmlmeja' => $input_post['kd_restojmlmeja'],
                'kd_restojmlkursi' => $input_post['kd_restojmlkursi'],
                'kd_restojmltamu' => $input_post['kd_restojmltamu'],
                'kd_filmkursi' => $input_post['kd_filmkursi'],
                'kd_filmpertunjukan' => $input_post['kd_filmpertunjukan'],
                'kd_filmtarif' => $input_post['kd_filmtarif'],
                'kd_bilyarmeja' => $input_post['kd_bilyarmeja'],
                'kd_bilyartarif' => $input_post['kd_bilyartarif'],
                'kd_bilyarkegiatan' => $input_post['kd_bilyarkegiatan'],
                'kd_diskopengunjung' => $input_post['kd_diskopengunjung'],
                'kd_diskotarif' => $input_post['kd_diskotarif'],
                'kd_waletvolume' => $input_post['kd_waletvolume'],
                
                //op
                'op_nm' => $this->input->get_post('op_nm'),
                'op_alamat' => $this->input->get_post('op_alamat'),
                'op_usaha_id' => $this->input->get_post('op_usaha_id'),
                'op_pajak_id' => $this->input->get_post('op_pajak_id'),
                'op_so' => $so,
                'op_kecamatan_id' => $this->input->get_post('op_kecamatan_id'),
                'op_kelurahan_id' => $this->input->get_post('op_kelurahan_id'),
                'op_latitude' => pad_to_decimal($this->input->get_post('op_latitude')),
                'op_longitude' => pad_to_decimal($this->input->get_post('op_longitude')),
                
            );
            $this->daftar_model->update($this->input->post('id'), $post_data);
            
            // data tambahan / detail
            $dtKD = $this->input->post('dtKD');
            $tambahan_data2 = array();

            if(isset($dtKD)) {
                $i = 1;
                $dtKD = json_decode($dtKD, true);
                
                if(count($dtKD['dtKD']) > 0){
                    $cid = $this->input->post('id');
                    $rd_row = array();
                    foreach($dtKD['dtKD'] as $rows) {
                        $rd_row = array (
                            'daftar_id' => $cid,
                            'nourut' => $i,
                            'notes'  => $rows[0],
                            'tarif'  => pad_to_decimal($rows[1]),
                            'kamar'  => pad_to_decimal($rows[2]),
                            'volume' => pad_to_decimal($rows[3]),
                        );
                        $i++;
                        $tambahan_data2 = array_merge($tambahan_data2, array($rd_row));
                    }
                    
                    //langsung ajah dah - sementara
                    $this->db->delete('pad_daftar_kd_det', array('daftar_id' => $cid)); 
                    $this->db->insert_batch('pad_daftar_kd_det', $tambahan_data2);
                }
            }
            
            // uplod dokeumen
            // $this->unggah($cid);
            // -- END data tambahan / detail
            
            $this->session->set_flashdata('msg_success', 'Data telah disimpan');
            redirect(active_module_url('daftar'));
        }
        
        $get               = (object) $post_data;
        $options           = array(
            '1' => 'PRIBADI',
            '2' => 'BADAN'
        );
        $js                = 'id="pb" class="input-medium" required ';
        $data['select_pb'] = form_dropdown('pb', $options, $get->pb, $js);
        
        $select_data = $this->load->model('kecamatan_model')->get_select();
        $options     = array();
		if($select_data) {
        foreach ($select_data as $row) {
            $options[$row->id] = $row->kecamatannm;
        }}
        $js                       = 'id="kecamatan_id" class="input-medium" onChange="get_kelurahan(this.value);" required ';
        $data['select_kecamatan'] = form_dropdown('kecamatan_id', $options, $get->kecamatan_id, $js);
        
        $select_data = $this->load->model('kelurahan_model')->get_select($get->kecamatan_id);
        $options     = array();
		if($select_data) {
        foreach ($select_data as $row) {
            $options[$row->id] = $row->kelurahannm;
        }}
        $js                       = 'id="kelurahan_id" class="input-large" required ';
        $data['select_kelurahan'] = form_dropdown('kelurahan_id', $options, $get->kelurahan_id, $js);
        
        //op            
        $select_data  = $this->load->model('kecamatan_model')->get_select();
        $options      = array();
        $kec_id = $get->op_kecamatan_id;
        if($select_data) {
        foreach ($select_data as $row) {
            if($kec_id == '') $kec_id = $row->id;
            $options[$row->id] = $row->kecamatannm;
        }}
        $js                       = 'id="op_kecamatan_id" class="input-medium" onChange="get_op_kelurahan(this.value);" required ';
        $data['select_op_kecamatan'] = form_dropdown('op_kecamatan_id', $options, $get->op_kecamatan_id, $js);

        $select_data = $this->load->model('kelurahan_model')->get_select($kec_id);
        $options     = array();
        if($select_data) {
        foreach ($select_data as $row) {
            $options[$row->id] = $row->kelurahannm;
        }}
        $js                       = 'id="op_kelurahan_id" class="input-large" required ';
        $data['select_op_kelurahan'] = form_dropdown('op_kelurahan_id', $options, $get->op_kelurahan_id, $js);
        
        $select_data = $this->load->model('usaha_model')->get_select();
        $options      = array();
        $usaha_id = $get->op_usaha_id;
        if($select_data) {
        foreach ($select_data as $row) {
            if($usaha_id == '') $usaha_id = $row->id;
            $options[$row->id] = $row->usahanm;
        }}
        $js                       = 'id="op_usaha_id" class="input-medium" onChange="get_op_pajak(this.value);" required ';
        $data['select_op_usaha'] = form_dropdown('op_usaha_id', $options, $get->op_usaha_id, $js);
        
        $select_data = $this->load->model('pajak_model')->get_select2($usaha_id);
        $options     = array();
        if($select_data) {
        foreach ($select_data as $row) {
            $options[$row->id] = $row->pajaknm;
        }}
        $js                       = 'id="op_pajak_id" class="input-large" required ';
        $data['select_op_pajak'] = form_dropdown('op_pajak_id', $options, $get->op_pajak_id, $js);
        

        $this->load->view('vdaftar_form2', $data);
    }
    
    public function delete() {
        $this->load_auth();
        if (!$this->module_auth->delete) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_delete);
            redirect(active_module_url('daftar'));
        }
            
        $id = $this->uri->segment(4);
        if ($id && $daftar = $this->daftar_model->get($id)) {
            if($user = $this->db_pad->get_where('users', array('userid' => $daftar->email))->row()) {
                $this->db_pad->delete('user_groups',array('user_id' => $user->id));
                $this->db_pad->delete('users',array('id' => $user->id));
            }
            
            $this->daftar_model->delete($id);
            $this->session->set_flashdata('msg_success', 'Data telah dihapus');
            redirect(active_module_url('daftar'));
        } else {
            show_404();
        }
    }
    		
    function get_kelurahan() {
        $kec_id    = $this->uri->segment(4);
        $kelurahan = $this->load->model('kelurahan_model')->get_select($kec_id);
        echo json_encode($kelurahan);
    }
	
    function get_op_pajak() {
        $usaha_id    = $this->uri->segment(4);
        $select_data = $this->load->model('pajak_model')->get_select2($usaha_id);
        echo json_encode($select_data);
    }
    
    function success() {
        $this->load->view('vdaftar_success');
    }
    
    function update_status() {
        $this->load_auth();
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('daftar'));
        }
        $data['current'] = 'pendaftaran';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url('daftar/do_update_status');
        
        $id = $this->uri->segment(4);
        if ($id && $get = $this->daftar_model->get($id)) {
            $data['dt']['id']         = $get->id;
            $data['dt']['formno']     = $get->formno;
            $data['dt']['reg_date']   = date('d-m-Y', strtotime($get->reg_date));
            $data['dt']['customernm'] = $get->customernm;
            $data['dt']['alamat']     = $get->alamat;
            
            $select_data = $this->daftar_status_model->get_select();
            $options     = array();
            if($select_data) {
            foreach ($select_data as $row) {
                $options[$row->id] = $row->uraian;
            }}
            $js                       = 'id="status_id" class="input-large" required ';
            $data['select_status'] = form_dropdown('status_id', $options, '', $js);
            $data['dt']['keterangan'] = '';
            
            $this->load->view('vdaftar_form_status', $data);
        } else {
            show_404();
        }
    }
    
    public function do_update_status() {
        $this->load_auth();
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url('daftar'));
        }
        $data['current'] = 'pendaftaran';
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url('daftar/do_update_status');
        
		$this->form_validation->set_rules('status_id', 'Status', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'max_length[255]');
        
        if ($this->form_validation->run() == TRUE) {
            $update_data = array(
				'daftar_id' => $this->input->post('id'),
				'status_id' => $this->input->post('status_id'),
				'keterangan' => $this->input->post('keterangan'),
				'create_date' => date('Y-m-d'),
				'create_uid' => sipkd_user_id(),
            );
            $this->daftar_hist_model->save($update_data);
        
            $this->session->set_flashdata('msg_success', 'Data telah diupdate');
            redirect(active_module_url('daftar'));
        }
        
        $data['dt']['id']         = $this->input->post('id');
        $data['dt']['formno']     = $this->input->post('formno');
        $data['dt']['reg_date']   = $this->input->post('reg_date');
        $data['dt']['customernm'] = $this->input->post('customernm');
        $data['dt']['alamat']     = $this->input->post('alamat');
        
        $select_data = $this->daftar_status_model->get_select();
        $options     = array();
        if($select_data) {
        foreach ($select_data as $row) {
            $options[$row->id] = $row->uraian;
        }}
        $js                       = 'id="status_id" class="input-large" required ';
        $data['select_status'] = form_dropdown('status_id', $options, $this->input->post('status_id'), $js);
        $data['dt']['keterangan'] = $this->input->post('keterangan');
            
        $this->load->view('vdaftar_form_status', $data);
    }
}
