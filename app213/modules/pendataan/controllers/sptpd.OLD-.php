<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sptpd extends CI_Controller
{
	private $module = 'pendataan';
	private $controller = 'sptpd';
	private $db_pad;

    function __construct()
    {
        parent::__construct();
        if (!is_login()) {
            echo "<script>window.location.replace('" . base_url() . "');</script>";
            exit;
        }

		if ($this->uri->segment(2) == 'skpd') {
			$this->module = 'penetapan';
			$this->controller = 'skpd';
		}

        $this->load->model(array(
            'apps_model', 'sptpd_model', 'skpd_model'
        ));

		$this->load->helper(active_module()); // cm kasih prefix namanya doang :D, ga pake _helper (pad_helper)
		$this->db_pad = $this->load->database('pad', TRUE);
    }

	function load_auth() {
        $this->load->library('module_auth', array('module' => $this->module));
    }

    public function index()
    {
		$this->load_auth();
        if (!$this->module_auth->read) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_read);
            redirect('info');
        }

        $data['current']    = $this->module;
        $data['controller'] = $this->controller;
        $data['apps']       = $this->apps_model->get_active_only();

		if (!wp_login()) {
			$select_data = $this->load->model('sptpd_type_model')->get_select();
			$options     = array();
			foreach ($select_data as $row) {
				$options[$row->id] = $row->typenm;
			}
			$options[999] = 'SEMUA DOKUMEN';
			$js                        = 'id="type_id" class="input-small" onChange="void(0);"';
			$select = form_dropdown('type_id', $options, 999, $js);
			$select = preg_replace("/[\r\n]+/", "", $select);;
			$data['select_sptpd_type'] = $select;

			$select_data = $this->load->model('usaha_model')->get_select();
			$options     = array();
			foreach ($select_data as $row) {
				$options[$row->id] = $row->usahanm;
			}
			$js                   = 'id="usaha_id" class="input-medium"';
			$options[999] = 'SEMUA PAJAK';
			$select = form_dropdown('usaha_id', $options, 999, $js);
			$select = preg_replace("/[\r\n]+/", "", $select);;
			$data['select_usaha'] = $select;

			$this->load->view(active_module().'/vsptpd', $data);
		} else {
			$select_data = $this->load->model('sptpd_type_model')->get_select();
			$options     = array();
			foreach ($select_data as $row) {
				$options[$row->id] = $row->typenm;
			}
			$options[999] = 'SEMUA DOKUMEN';
			$js                        = 'id="type_id" class="input-small" onChange="void(0);"';
			$select = form_dropdown('type_id', $options, 999, $js);
			$select = preg_replace("/[\r\n]+/", "", $select);;
			$data['select_sptpd_type'] = $select;

			$select_data = $this->load->model('usaha_model')->get_select();
			$options     = array();
			foreach ($select_data as $row) {
				$options[$row->id] = $row->usahanm;
			}
			$js                   = 'id="usaha_id" class="input-medium"';
			$options[999] = 'SEMUA PAJAK';
			$select = form_dropdown('usaha_id', $options, 999, $js);
			$select = preg_replace("/[\r\n]+/", "", $select);;
			$data['select_usaha'] = $select;

			$this->load->view(active_module().'/wp/vsptpd', $data);
		}
    }

    function grid()
    {
        $type_id = $this->uri->segment(4);
        $usaha_id = $this->uri->segment(5);

        $this->load->library('Datatables',$this->load->database('pad', TRUE));

		if (!wp_login()) {
			if ($this->controller == 'sptpd') {
				$this->datatables->select('s.id, (s.tahun||\'.\'||s.sptno::text) as sptno, s.terimatgl, st.typenm,
					get_nopd(cu.id, true) as npwpd, c.customernm, s.masadari, s.masasd, s.dasar,
					(((s.dasar*s.tarif)+s.denda+s.bunga+s.kenaikan+s.lain2)-(s.kompensasi+s.setoran)) as pajak,
					cu.usaha_id, s.type_id', false);
				$this->datatables->from('pad_spt s');
				$this->datatables->join('pad_customer_usaha cu', 's.customer_usaha_id=cu.id', 'left');
				$this->datatables->join('pad_customer c', 'cu.customer_id=c.id', 'left');
				$this->datatables->join('pad_usaha u', 'cu.usaha_id=u.id', 'left');
				$this->datatables->join('pad_pajak p', 's.pajak_id=p.id', 'left');
				$this->datatables->join('pad_spt_type st', 'st.id=s.type_id', 'left');
                
				$this->datatables->join('user_groups ug', 'ug.user_id=s.create_uid');
				$this->datatables->join('groups g', 'g.id=ug.group_id');

                $this->datatables->where('g.kode', 'esptpd_wp');
                $pad_reklame_id  = pad_reklame_id();
                $pad_airtanah_id = pad_air_tanah_id();
                $this->datatables->where("cu.usaha_id not in ({$pad_reklame_id},{$pad_airtanah_id})");
            
				if ($this->input->get('iSortCol_0') == 1) {
					$sort = $this->input->get('sSortDir_0');
					$this->datatables->order_by('s.sptno', $sort);
				}
			}

			if ($this->controller == 'skpd') {
				$this->datatables->select('s.id, (k.tahun||\'.\'||k.kohirno::text) as kohirno, s.terimatgl, st.typenm,
					get_nopd(cu.id, true) as npwpd, c.customernm, s.masadari, s.masasd, s.dasar,
					(((s.dasar*s.tarif)+s.denda+s.bunga+s.kenaikan+s.lain2)-(s.kompensasi+s.setoran)) as pajak,
					cu.usaha_id, s.type_id', false);
				$this->datatables->from('pad_spt s');
				$this->datatables->join('pad_customer_usaha cu', 's.customer_usaha_id=cu.id', 'left');
				$this->datatables->join('pad_customer c', 'cu.customer_id=c.id', 'left');
				$this->datatables->join('pad_usaha u', 'cu.usaha_id=u.id', 'left');
				$this->datatables->join('pad_pajak p', 's.pajak_id=p.id', 'left');
				$this->datatables->join('pad_spt_type st', 'st.id=s.type_id', 'left');
				$this->datatables->join('pad_kohir k', 'k.spt_id=s.id', 'left');

				$this->datatables->where('upper(st.typenm) like', 'SK%');

				if ($this->input->get('iSortCol_0') == 1) {
					$sort = $this->input->get('sSortDir_0');
					$this->datatables->order_by('k.kohirno', $sort);
				}
			}

			$this->datatables->where('s.tahun', pad_tahun_anggaran());
			if($type_id <> 999 && !empty($type_id))
				$this->datatables->where('s.type_id', $type_id);
			if($usaha_id <> 999 && !empty($usaha_id))
				$this->datatables->where('cu.usaha_id', $usaha_id);

			$this->datatables->rupiah_column('8,9');
			$this->datatables->date_column('2,6,7');
			
		} else {
			if ($this->controller == 'sptpd') {
				// $this->datatables->select('s.id, (s.tahun||\'.\'||s.sptno::text) as sptno, s.terimatgl,
				$this->datatables->select('s.id, get_bayarno(s.id) as bayarno, s.terimatgl,
					get_nopd(cu.id, true) as npwpd, p.pajaknm, 
                    upper(to_char(s.masadari, \'Mon YYYY\')) as masa, s.jatuhtempotgl, s.dasar,
					s.pajak_terhutang as pajak, 
					ss.sspdtgl, ss.bunga,
					s.pajak_terhutang + ss.bunga as bayar, 
					cu.usaha_id, s.type_id', false);
				$this->datatables->from('pad_spt s');
				$this->datatables->join('pad_customer_usaha cu', 's.customer_usaha_id=cu.id');
				$this->datatables->join('pad_customer c', 'cu.customer_id=c.id');
				$this->datatables->join('pad_usaha u', 'cu.usaha_id=u.id');
				$this->datatables->join('pad_pajak p', 's.pajak_id=p.id');
				$this->datatables->join('pad_spt_type st', 'st.id=s.type_id');
				$this->datatables->join('pad_sspd ss', 's.id=ss.spt_id and ss.is_valid=1', 'left');
				// $this->datatables->join('pad_terima_line tl', 's.id=tl.spt_id and s.rekening_id=tl.rekening_id', 'left');

				if ($this->input->get('iSortCol_0') == 1) {
					$sort = $this->input->get('sSortDir_0');
					$this->datatables->order_by('s.sptno', $sort);
				}
			}
			
			$this->datatables->where('s.tahun', pad_tahun_anggaran());
			$this->datatables->where('c.id', wp_id());
			
			if($type_id <> 999 && !empty($type_id))
				$this->datatables->where('s.type_id', $type_id);
			if($usaha_id <> 999 && !empty($usaha_id))
				$this->datatables->where('cu.usaha_id', $usaha_id);

			// $this->datatables->checkbox_column('9');
			$this->datatables->rupiah_column('7,8,10,11');
			$this->datatables->date_column('2,6,9');
		}
		

        echo $this->datatables->generate();
    }
	
    function grid_kd() // grid kartu data hotel
    {
        //
    }

    //admin
    private function fvalidation($jenis_usaha = null)
    {
        //spt global
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        $this->form_validation->set_rules('tahun', 'tahun', 'required|numeric');
        $this->form_validation->set_rules('terimatgl', 'terimatgl', 'required');
        $this->form_validation->set_rules('customer_id', 'customer_id', 'required|numeric');
        $this->form_validation->set_rules('customer_usaha_id', 'customer_usaha_id', 'required|numeric');
        $this->form_validation->set_rules('pajak_id', 'pajak_id', 'required|numeric');
        $this->form_validation->set_rules('rekening_id', 'rekening_id', 'required|numeric');
        $this->form_validation->set_rules('so', 'so', 'required|trim');
        $this->form_validation->set_rules('type_id', 'type_id', 'required|numeric');
        $this->form_validation->set_rules('masadari', 'masadari', 'required');
        $this->form_validation->set_rules('masasd', 'masasd', 'required');
        $this->form_validation->set_rules('jatuhtempotgl', 'jatuhtempotgl', 'required');
        $this->form_validation->set_rules('r_bayarid', 'r_bayarid', 'required|numeric');

        //air
        if ($jenis_usaha == pad_air_tanah_id()) {
            $this->form_validation->set_rules('air_manfaat_id', 'air_manfaat_id', 'required|numeric');
            $this->form_validation->set_rules('air_zona_id', 'air_zona_id', 'required|numeric');
            $this->form_validation->set_rules('meteran_awal', 'meteran_awal', 'required|numeric');
            $this->form_validation->set_rules('meteran_akhir', 'meteran_akhir', 'required|numeric');
            $this->form_validation->set_rules('volume', 'volume', 'required|numeric');
            $this->form_validation->set_rules('satuan', 'satuan', 'required|trim');
        }

        //reklame
        if ($jenis_usaha == pad_reklame_id()) {
            $this->form_validation->set_rules('r_nsl_kecamatan_id', 'r_nsl_kecamatan_id', 'required|numeric');
            $this->form_validation->set_rules('r_nsl_type_id', 'r_nsl_type_id', 'required|numeric');
            $this->form_validation->set_rules('r_nsl_nilai', 'r_nsl_nilai', 'required|numeric');
            $this->form_validation->set_rules('r_kelurahan_id', 'r_kelurahan_id', 'required|numeric');
            $this->form_validation->set_rules('r_nsr', 'r_nsr', 'required|numeric');
            $this->form_validation->set_rules('r_nsrno', 'r_nsrno', 'required|trim');
            $this->form_validation->set_rules('r_nsrtgl', 'r_nsrtgl', 'required');
            $this->form_validation->set_rules('r_tarifid', 'r_tarifid', 'required|numeric');
            $this->form_validation->set_rules('r_kontrak', 'r_kontrak', 'required|numeric');
            $this->form_validation->set_rules('r_lama', 'r_lama', 'required|numeric');
            $this->form_validation->set_rules('r_jalanklas_id', 'r_jalanklas_id', 'required|numeric');
            $this->form_validation->set_rules('r_jalan_id', 'r_jalan_id', 'required|numeric');
            $this->form_validation->set_rules('r_lokasi', 'r_lokasi', 'required|trim');
            $this->form_validation->set_rules('r_judul', 'r_judul', 'required|trim');
            $this->form_validation->set_rules('r_panjang', 'r_panjang', 'required|numeric');
            $this->form_validation->set_rules('r_lebar', 'r_lebar', 'required|numeric');
            $this->form_validation->set_rules('r_muka', 'r_muka', 'required|numeric');
            $this->form_validation->set_rules('r_banyak', 'r_banyak', 'required|numeric');
            $this->form_validation->set_rules('r_luas', 'r_luas', 'required|numeric');
            $this->form_validation->set_rules('r_lokasi_id', 'r_lokasi_id', 'required|numeric');
            $this->form_validation->set_rules('r_calculated', 'r_calculated', 'required|numeric');
        }
    }

    private function fpost($jenis_usaha = NULL)
    {
        //spt global
        $data['nopd']              = $this->input->post('nopd');

        $data['id']                = $this->input->post('id');
        $data['sptno']             = $this->input->post('sptno');
        $data['tahun']             = $this->input->post('tahun');
        $data['terimatgl']         = $this->input->post('terimatgl');
        $data['customer_id']       = $this->input->post('customer_id');
        $data['customer_usaha_id'] = $this->input->post('customer_usaha_id');
        $data['pajak_id']          = $this->input->post('pajak_id');
        $data['rekening_id']       = $this->input->post('rekening_id');
        $data['so']                = $this->input->post('so');
        $data['type_id']           = $this->input->post('type_id');
        $data['masadari']          = $this->input->post('masadari');
        $data['masasd']            = $this->input->post('masasd');
        $data['jatuhtempotgl']     = $this->input->post('jatuhtempotgl');

        $data['minomset']   = $this->input->post('minomset');
        $data['dasar']      = pad_to_decimal($this->input->post('dasar'));
        $data['tarif']      = pad_to_decimal($this->input->post('tarif'));
        $data['denda']      = pad_to_decimal($this->input->post('denda'));
        $data['bunga']      = pad_to_decimal($this->input->post('bunga'));
        $data['setoran']    = pad_to_decimal($this->input->post('setoran'));
        $data['kenaikan']   = pad_to_decimal($this->input->post('kenaikan'));
        $data['kompensasi'] = pad_to_decimal($this->input->post('kompensasi'));
        $data['lain2']      = pad_to_decimal($this->input->post('lain2'));
		
        $data['r_nsr']     = pad_to_decimal($this->input->post('r_nsr'));
        $data['r_bayarid'] = $this->input->post('r_bayarid');

        $data['kirimtgl']     = $this->input->post('kirimtgl');
        $data['notes']        = $this->input->post('notes');
        $data['no_skpd_lama'] = $this->input->post('no_skpd_lama');
        $data['unit_id']      = $this->input->post('unit_id');
        $data['enabled']      = $this->input->post('enabled');
        $data['terimanip']    = $this->input->post('terimanip');
        $data['isprint_dc']   = $this->input->post('isprint_dc');

        $data['create_date'] = $this->input->post('create_date');
        $data['create_uid']  = $this->input->post('create_uid');
        $data['write_date']  = $this->input->post('write_date');
        $data['write_uid']   = $this->input->post('write_uid');

        //air
        if ($jenis_usaha == pad_air_tanah_id()) {
            //
        }

        //reklame
        if ($jenis_usaha == pad_reklame_id()) {
            //
        }
		
        $data['pajak'] = pad_to_decimal($this->input->post('pajak'));
		
		//tambahan
		if(wp_login()) {
            //
		}
		
        return $data;
    }

    public function add()
    {
		$this->load_auth();
        if (!$this->module_auth->create) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_create);
            redirect(active_module_url($this->controller));
        }
		
		// cek apakah wp memiliki jenis pajak ini ->  $this->uri->segment(4)
        if (wp_login()) {
			$model = $this->load->model('pad_model');
			if (!$model->check_cu(wp_id() , $this->uri->segment(4))) {
				$this->session->set_flashdata('msg_error', 'Anda tidak memiliki hak akses menambah data untuk jenis pajak ini.');
				redirect(active_module_url());
			}
        }

        $p_usaha_id = $this->uri->segment(4);
        $post_data  = $this->fpost($p_usaha_id);

        $data['current'] = $this->module;
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url("{$this->controller}/add/{$p_usaha_id}");
        $data['dt']      = $post_data;


        $this->fvalidation();
        if ($this->form_validation->run() == TRUE) {
            $input_post = $post_data;
            $p_usaha_id = empty($p_usaha_id) ? $this->input->post('usaha_id') : $p_usaha_id; //kalo kosong doang (selain rek-air)
            $sptno      = $this->sptpd_model->generate_sptno(pad_tahun_anggaran());

            //cek nama wp - kalo beda bikin baru
            $wp_data = $this->load->model('subjek_pajak_model')->get($input_post['customer_id']);
            $wp_nama = $wp_data->customernm;
            $cid  = $input_post['customer_id'];
            $cuid = $input_post['customer_usaha_id'];
			
            $update_data = array(
                'sptno' => $sptno,

                'customer_id' => $cid,
                'customer_usaha_id' => $cuid,
                'pajak_id' => $input_post['pajak_id'],
                'tahun' => $input_post['tahun'],
                'terimatgl' => date('Y-m-d', strtotime($input_post['terimatgl'])),
                'type_id' => $input_post['type_id'],
                'so' => $input_post['so'],
                'jatuhtempotgl' => date('Y-m-d', strtotime($input_post['jatuhtempotgl'])),
                'masadari' => date('Y-m-d', strtotime($input_post['masadari'])),
                'masasd' => date('Y-m-d', strtotime($input_post['masasd'])),

                'minomset' => $input_post['minomset'],
                'dasar' => $input_post['dasar'],
                'tarif' => $input_post['tarif'],
                'denda' => $input_post['denda'],
                'bunga' => $input_post['bunga'],
                'setoran' => $input_post['setoran'],
                'kenaikan' => $input_post['kenaikan'],
                'kompensasi' => $input_post['kompensasi'],
                'lain2' => $input_post['lain2'],
				
                'pajak_terhutang' => $input_post['pajak'],

                'r_bayarid' => $input_post['r_bayarid'],
                'r_nsr' => $input_post['r_nsr'],
                'rekening_id' => $input_post['rekening_id'],

                'create_date' => date('Y-m-d'),
                'create_uid' => sipkd_user_id(),
                'terimanip' => sipkd_user_id(),
                'unit_id' => pad_pemda_unitid(),

                'enabled' => 1,
                'satuan' => NULL,
            );

            $reklame_data = array();
            if ($p_usaha_id == pad_reklame_id()) {
                //
            }

            $air_tanah_data = array();
            if ($p_usaha_id == pad_air_tanah_id()) {
                //
            }

			// data tambahan
			$tambahan_data = array();
			if (wp_login()) {
                //
			}
			
            $update_data = array_merge($update_data, $reklame_data, $air_tanah_data, $tambahan_data);
            $spt_id = $this->sptpd_model->save($update_data);
			
			// data tambahan / detail
			if (wp_login()) {
				// uplod dokeumen
				$this->unggah($spt_id);
			}
			
            $this->session->set_flashdata('msg_success', 'Data telah disimpan');
			redirect(active_module_url($this->controller));
        }

        $data['dt'] = $post_data;
        $get        = (object) $post_data;

        $data['dt']['tahun']      = pad_tahun_anggaran();
        $data['dt']['terimatgl']  = date('d-m-Y');
        $data['dt']['dasar']      = 0;
        $data['dt']['tarif']      = 0;
        $data['dt']['denda']      = 0;
        $data['dt']['bunga']      = 0;
        $data['dt']['setoran']    = 0;
        $data['dt']['lain2']      = 0;
        $data['dt']['kenaikan']   = 0;
        $data['dt']['kompensasi'] = 0;

		// data tambahan
		
        $options              = array();
        $js                   = 'id="customer_usaha_id" class="input-xlarge" ';
        $data['select_usaha'] = form_dropdown('customer_usaha_id', $options, null, $js);

        $js                   = 'id="pajak_id" class="input-xxlarge"';
        $data['select_pajak'] = form_dropdown('pajak_id', $options, null, $js);

        $select_data = $this->load->model('sptpd_type_model')->get_select();
        $options     = array();
        if($select_data)
            foreach ($select_data as $rows) {
                $options[$rows->id] = $rows->typenm;
            }
        $js                        = 'id="type_id" class="input-small" onChange="void(0);"';
		$type_id = ($p_usaha_id == pad_reklame_id() || ($p_usaha_id == pad_air_tanah_id())) ? 1 : $get->type_id;
        $data['select_sptpd_type'] = form_dropdown('type_id', $options, $type_id, $js);

		$data['dt']['rekeningkd']  = '';
		$data['dt']['jatuhtempo']  = '';
		$data['dt']['files'] = array();

        if ($p_usaha_id == pad_reklame_id()) {
            //
				
        } else if ($p_usaha_id == pad_air_tanah_id()) {
            //
			
        } else {
			if (!wp_login())
				$this->load->view('vsptpd_form', $data);
			else {
				$data['dt']['customer_id'] = wp_id();
				$this->load->view('wp/vsptpd_form', $data);
			}
		}
    }

    public function edit()
    {
		$this->load_auth();
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
		
        $p_usaha_id = $this->uri->segment(4);
        $p_type_id  = $this->uri->segment(5);
        $p_id       = $this->uri->segment(6);
        
        $sptpd = $this->sptpd_model->get($p_id);
        $tglinput = date('Y-m-d', strtotime($sptpd->create_date));
        
        if ($tglinput < date('Y-m-d')) {
            $this->session->set_flashdata('msg_warning', 'Data sudah tidak dapat di edit');
            redirect(active_module_url($this->controller));
        }
        
        //cek usaha -> cm bisa edit yg self aja
        if (($p_usaha_id == pad_reklame_id() || $p_usaha_id == pad_air_tanah_id())) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }

		//cek kohir
        if ($this->sptpd_model->is_kohir_ok($p_id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
		
		// cek pmb
        if ($this->sptpd_model->is_sspd_ok($p_id) || $this->sptpd_model->is_bayar_ok($p_id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
		
        $data['current'] = $this->module;
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url("{$this->controller}/update/{$p_usaha_id}/{$p_type_id}/{$p_id}");

        if ($p_id && $get = $this->sptpd_model->get($p_id)) {
            $data['dt']['id']                 = $get->id;
            $data['dt']['customer_usaha_id']  = $get->customer_usaha_id;
            $data['dt']['pajak_id']           = $get->pajak_id;
            $data['dt']['tahun']              = $get->tahun;
            $data['dt']['sptno']              = $get->sptno;
            $data['dt']['terimanip']          = $get->terimanip;
            $data['dt']['terimatgl']          = date('d-m-Y', strtotime($get->terimatgl));
            $data['dt']['kirimtgl']           = date('d-m-Y', strtotime($get->kirimtgl));
            $data['dt']['jatuhtempotgl']      = date('d-m-Y', strtotime($get->jatuhtempotgl));
            $data['dt']['type_id']            = $get->type_id;
            $data['dt']['so']                 = $get->so;
            $data['dt']['masadari']           = date('d-m-Y', strtotime($get->masadari));
            $data['dt']['masasd']             = date('d-m-Y', strtotime($get->masasd));
            $data['dt']['minomset']           = $get->minomset;
            $data['dt']['dasar']              = $get->dasar;
            $data['dt']['tarif']              = $get->tarif;
            $data['dt']['denda']              = $get->denda;
            $data['dt']['bunga']              = $get->bunga;
            $data['dt']['setoran']            = $get->setoran;
            $data['dt']['kenaikan']           = $get->kenaikan;
            $data['dt']['kompensasi']         = $get->kompensasi;
            $data['dt']['lain2']              = $get->lain2;
            $data['dt']['air_manfaat_id']     = $get->air_manfaat_id;
            $data['dt']['air_zona_id']        = $get->air_zona_id;
            $data['dt']['meteran_awal']       = $get->meteran_awal;
            $data['dt']['meteran_akhir']      = $get->meteran_akhir;
            
            $data['dt']['r_bayarid']          = $get->r_bayarid;
            $data['dt']['r_tarifid']          = $get->r_tarifid;
            
            $data['dt']['enabled']            = $get->enabled;
            $data['dt']['unit_id']            = $get->unit_id;
            $data['dt']['create_date']        = date('d-m-Y', strtotime($get->create_date));
            $data['dt']['create_uid']         = $get->create_uid;
            $data['dt']['write_date']         = date('d-m-Y', strtotime($get->write_date));
            $data['dt']['write_uid']          = $get->write_uid;
            $data['dt']['customer_id']        = $get->customer_id;
            
            $data['dt']['isprint_dc']         = $get->isprint_dc;
            $data['dt']['notes']              = $get->notes;
            $data['dt']['rekening_id']        = $get->rekening_id;

			if (wp_login()) {			
				// data tambahan
                //
			}
			
			$data['dt']['nopd'] = $this->load->model('objek_pajak_model')->get_nopd($get->customer_usaha_id);

            $options              = array();
            $js                   = 'id="customer_usaha_id" class="input-xlarge" ';
            $data['select_usaha'] = form_dropdown('customer_usaha_id', $options, null, $js);

            $select_data = $this->load->model('pajak_model')->get_select($get->pajak_id);
            $options     = array();
            foreach ($select_data as $rows) {
                $options[$rows->id] = $rows->pajaknm;
            }
            $js                   = 'id="pajak_id" class="input-xxlarge"';
            $data['select_pajak'] = form_dropdown('pajak_id', $options, $get->pajak_id, $js);

            $select_data = $this->load->model('sptpd_type_model')->get_select();
            $options     = array();
            foreach ($select_data as $rows) {
                $options[$rows->id] = $rows->typenm;
            }
            $js                        = 'id="type_id" class="input-small" onChange="void(0);"';
            $data['select_sptpd_type'] = form_dropdown('type_id', $options, $get->type_id, $js);

            $pajak_detail = $this->load->model('pad_model');
            if ($row = $pajak_detail->sptpd_get_pajak_detail($get->pajak_id, $get->terimatgl)) {
                $data['dt']['rekening_id'] = $row->rekening_id;
                $data['dt']['rekeningkd']  = $row->rekeningkd;
                $data['dt']['jatuhtempo']  = $row->jatuhtempo;
            }

			if(wp_login()) {
				$this->load->helper('directory');
				$dir = directory_map(dirname(__FILE__).'//..//dokumen//');
				
				$files = array();
				foreach ($dir as $file) {
					$f = explode('@', $file);
					if($f[0] == $p_id)
						$files[] = anchor(active_module_url("sptpd/unduh/{$file}"), $f[1], array("title"=>"Unduh file $f[1]", "target"=>"_blank"));
				}
				$data['dt']['files'] = $files;
			}
			
            if ($p_usaha_id == pad_reklame_id() && $p_type_id == pad_dok_office_id()) {
                //
            } else if ($p_usaha_id == pad_air_tanah_id() && $p_type_id == pad_dok_office_id()) {
                //
            } else {
				if (!wp_login())
					$this->load->view('vsptpd_form', $data);
				else {
					$data['dt']['customer_id'] = wp_id();
					$this->load->view('wp/vsptpd_form', $data);
				}
			}
        } else {
            show_404();
        }
    }

    public function update()
    {
		$this->load_auth();
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
		
        $p_usaha_id = $this->uri->segment(4);
        $p_type_id  = $this->uri->segment(5);
        $p_id       = $this->uri->segment(6);

        //cek usaha -> cm bisa edit yg self aja
        if (($p_usaha_id == pad_reklame_id() || $p_usaha_id == pad_air_tanah_id())) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }

		//cek kohir
        if ($this->sptpd_model->is_kohir_ok($p_id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
		
		// cek pmb
        if ($this->sptpd_model->is_sspd_ok($p_id) || $this->sptpd_model->is_bayar_ok($p_id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
		
        $data['current'] = $this->module;
        $data['apps']    = $this->apps_model->get_active_only();
        $data['faction'] = active_module_url("{$this->controller}/update/{$p_usaha_id}/{$p_type_id}/{$p_id}");

        $post_data = $this->fpost($p_usaha_id);

        $this->fvalidation();
        if ($this->form_validation->run() == TRUE) {
            $input_post  = $post_data;
            $update_data = array(
                'customer_id' => $input_post['customer_id'],
                'customer_usaha_id' => $input_post['customer_usaha_id'],
                'pajak_id' => $input_post['pajak_id'],
                'tahun' => $input_post['tahun'],
                'terimatgl' => date('Y-m-d', strtotime($input_post['terimatgl'])),
                'type_id' => $input_post['type_id'],
                'so' => $input_post['so'],
                'jatuhtempotgl' => date('Y-m-d', strtotime($input_post['jatuhtempotgl'])),
                'masadari' => date('Y-m-d', strtotime($input_post['masadari'])),
                'masasd' => date('Y-m-d', strtotime($input_post['masasd'])),

                'minomset' => $input_post['minomset'],
                'dasar' => $input_post['dasar'],
                'tarif' => $input_post['tarif'],
                'denda' => $input_post['denda'],
                'bunga' => $input_post['bunga'],
                'setoran' => $input_post['setoran'],
                'kenaikan' => $input_post['kenaikan'],
                'kompensasi' => $input_post['kompensasi'],
                'lain2' => $input_post['lain2'],
				
				'pajak_terhutang' => $input_post['pajak'],

                'r_bayarid' => $input_post['r_bayarid'],
                'r_nsr' => $input_post['r_nsr'],
                'rekening_id' => $input_post['rekening_id'],

                'write_date' => date('Y-m-d'),
                'write_uid' => sipkd_user_id(),
            );

            $reklame_data = array();
            if ($p_usaha_id == pad_reklame_id()) {
                //
            }

            $air_tanah_data = array();
            if ($p_usaha_id == pad_air_tanah_id()) {
                //
            }

			// data tambahan
			$tambahan_data = array();
			if (wp_login()) {
                //
			}
			
            $update_data = array_merge($update_data, $reklame_data, $air_tanah_data, $tambahan_data);
            $this->sptpd_model->update($p_id, $update_data);

			// data tambahan / detail
			if (wp_login()) {
                //
				// uplod dokeumen
				$this->unggah($p_id);
			}
			
            $this->session->set_flashdata('msg_success', 'Data telah disimpan');
            redirect(active_module_url($this->controller));
        }

        $data['dt'] = $post_data;
        $get        = (object) $post_data;

        $options              = array();
        $js                   = 'id="customer_usaha_id" class="input-xlarge"';
        $data['select_usaha'] = form_dropdown('customer_usaha_id', $options, null, $js);

        $select_data = $this->load->model('pajak_model')->get_select($get->pajak_id);
        $options     = array();
        foreach ($select_data as $rows) {
            $options[$rows->id] = $rows->pajaknm;
        }
        $js                   = 'id="pajak_id" class="input-xxlarge"';
        $data['select_pajak'] = form_dropdown('pajak_id', $options, $get->pajak_id, $js);

        $select_data = $this->load->model('sptpd_type_model')->get_select();
        $options     = array();
        foreach ($select_data as $rows) {
            $options[$rows->id] = $rows->typenm;
        }
        $js                        = 'id="type_id" class="input-small" onChange="void(0);"';
        $data['select_sptpd_type'] = form_dropdown('type_id', $options, $get->type_id, $js);

        $pajak_detail = $this->load->model('pad_model');
        if ($row = $pajak_detail->sptpd_get_pajak_detail($get->pajak_id, $get->terimatgl)) {
            $data['dt']['rekening_id'] = $row->rekening_id;
            $data['dt']['rekeningkd']  = $row->rekeningkd;
            $data['dt']['jatuhtempo']  = $row->jatuhtempo;
        }

		if(wp_login()) {
			$this->load->helper('directory');
			$dir = directory_map(dirname(__FILE__).'//..//dokumen//');
			
				$files = array();
				foreach ($dir as $file) {
					$f = explode('@', $file);
					if($f[0] == $p_id)
						$files[] = anchor(active_module_url("sptpd/unduh/{$file}"), $f[1], array("title"=>"Unduh file $f[1]", "target"=>"_blank"));
				}
				$data['dt']['files'] = $files;
		}
		
        if ($p_usaha_id == pad_reklame_id()) {
            //
        } else if ($p_usaha_id == pad_air_tanah_id()) {
            //
        } else {
			if (!wp_login())
				$this->load->view('vsptpd_form', $data);
			else {
				$data['dt']['customer_id'] = wp_id();
				$this->load->view('wp/vsptpd_form', $data);
			}
		}
    }

    public function delete()
    {
		$this->load_auth();
        if (!$this->module_auth->delete) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_delete);
            redirect(active_module_url($this->controller));
        }

        $id = $this->uri->segment(4);
		
		//cek kohir
        if ($this->sptpd_model->is_kohir_ok($id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_delete);
            redirect(active_module_url($this->controller));
        }
		
		// cek pmb
        if ($this->sptpd_model->is_sspd_ok($id) || $this->sptpd_model->is_bayar_ok($id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_delete);
            redirect(active_module_url($this->controller));
        }
		
        if ($id && $this->sptpd_model->get($id)) {
            $this->sptpd_model->delete($id);
            $this->skpd_model->delete_by_spt($id);
			
            $this->session->set_flashdata('msg_success', 'Data telah dihapus');
            redirect(active_module_url($this->controller));
        } else {
            show_404();
        }
    }

    // -- //

    function get_cu()
    {
        $c_id  = $this->uri->segment(4);
        $cu_id = $this->uri->segment(5);
        $u_id  = $this->uri->segment(6); // param untuk wp_login (opsional di menu default)
		
        $model = $this->load->model('pad_model');
		if (!wp_login())
			$rows = $model->sptpd_get_cu($c_id);
		else {
			$rows = $model->sptpd_get_cu($c_id, $u_id);
		}
		
        $usaha   = '';
        $cu_data = new stdClass();
        if ($rows) {
            $cu_data->customer_id       = $rows[0]->customer_id;
            $cu_data->customernm        = $rows[0]->customernm;
            $cu_data->npwpd             = $rows[0]->npwpd;
            $cu_data->so                = $rows[0]->so;
            $cu_data->konterid          = $rows[0]->konterid;
            $cu_data->air_zona_id       = $rows[0]->air_zona_id;
            $cu_data->air_manfaat_id    = $rows[0]->air_manfaat_id;
            $cu_data->usaha_id          = $rows[0]->usaha_id;

			$selected = "selected";
            foreach ($rows as $row) {
				if ($cu_id == $row->customer_usaha_id) {
                    $cu_data->usaha_id = $row->usaha_id;
					$usaha .= "<option value={$row->customer_usaha_id} selected>{$row->usahanm}</option>";
				} else {
					$usaha .= "<option value={$row->customer_usaha_id}>{$row->usahanm}</option>";
				}
            }
            $cu_data->usaha = $usaha;

            echo json_encode($cu_data);
        }
    }

    function get_pajak()
    {
        $cu_id    = $this->uri->segment(4);
        $model    = $this->load->model('pad_model');
		$usaha_id = $model->sptpd_get_usaha_id($cu_id);
        $last_dt  = $this->sptpd_model->get_last_data($cu_id);
        $pajak_id = ($last_dt) ? $last_dt->pajak_id : FALSE;

        if ($rows = $model->sptpd_get_pajak($usaha_id)) {
			$pajak = "";
            foreach ($rows as $row) {
                if($pajak_id && $row->id==$pajak_id)
                    $pajak .= "<option value={$row->id} selected>{$row->pajaknm}</option>";
                else
                    $pajak .= "<option value={$row->id}>{$row->pajaknm}</option>";
            }
            echo $pajak;
        }
    }

    function get_jalan()
    {
        $jalan_klas_id = $this->uri->segment(4);
        $model         = $this->load->model('jalan_model');

        if ($rows = $model->get_select($jalan_klas_id)) {
            foreach ($rows as $row) {
                $jalan .= "<option value={$row->id}>{$row->jalannm}</option>";
            }
            echo $jalan;
        }
    }

    function get_pajak_detail()
    {
        $pajak_id  = $this->uri->segment(4);
        $pajak_tmt = date('Y-m-d', strtotime($this->uri->segment(5)));
        $model     = $this->load->model('pad_model');

        if ($row = $model->sptpd_get_pajak_detail($pajak_id, $pajak_tmt)) {
            echo json_encode($row);
        }
    }

    function get_hda()
    {
        $zona    = $this->uri->segment(4);
        $manfaat = $this->uri->segment(5);
        $volume  = $this->uri->segment(6);

        $model = $this->load->model('air_hda_model');
        if ($rows = $model->get_hda($zona, $manfaat, $volume)) {
            $dasar = 0;
            $v     = $volume;
            foreach ($rows as $row) {
                $dasar = $dasar + ($v - intval($row->volume_id) + 1) * $row->hda;
                $v     = $row->volume_id - 1;
            }
            echo $dasar;
        } else
            echo 0;
    }
	
	function get_nopd() { // on wp_login only
        $cu_id  = $this->uri->segment(4);
        $model = $this->load->model('objek_pajak_model');
		if ($nopd =  $model->get_nopd($cu_id))
			echo $nopd;
		else
			echo "";
	}
	
    function get_last_data() {
        $cu_id  = $this->uri->segment(4);
        $last_data  = $this->sptpd_model->get_last_data($cu_id);
        
        if($last_data) {
            $kartu_data = new stdClass;
            $kartu_data->kd_restojmlmeja = $last_data->kd_restojmlmeja;
            $kartu_data->kd_restojmlkursi = $last_data->kd_restojmlkursi;
            $kartu_data->kd_restojmltamu = $last_data->kd_restojmltamu;
            $kartu_data->kd_filmkursi = $last_data->kd_filmkursi;
            $kartu_data->kd_filmpertunjukan = $last_data->kd_filmpertunjukan;
            $kartu_data->kd_filmtarif = $last_data->kd_filmtarif;
            $kartu_data->kd_bilyarmeja = $last_data->kd_bilyarmeja;
            $kartu_data->kd_bilyartarif = $last_data->kd_bilyartarif;
            $kartu_data->kd_bilyarkegiatan = $last_data->kd_bilyarkegiatan;
            $kartu_data->kd_diskopengunjung = $last_data->kd_diskopengunjung;
            $kartu_data->kd_diskotarif = $last_data->kd_diskotarif;
            $kartu_data->kd_waletvolume = $last_data->kd_waletvolume;
            
            $last_data2 = $this->sptpd_model->get_last_kartu_data($last_data->id);
            if($last_data2)
                $kartu_data->golongan_kelas = $last_data2;
            else
                $kartu_data->golongan_kelas = '';
                
            echo json_encode($kartu_data);
        } else echo "";
    }
    
	function unggah($id) { //upload
		$this->load->library('upload');
		
		if (!empty($_FILES['userfile']['name'])) {
			$this->load->library('upload');
			
			if(!is_array($_FILES['userfile']['name'])){
				$config['file_name'] = md5($_FILES['userfile']['name']);
			} else {
				$fn = array();
				foreach($_FILES['userfile']['name'] as $key => $value)
				{
					// $_FILES['userfile']['name'][$key] = $id.'@'.$value;
					$fn[] = $id.'@'.$value;
				}
				$config['file_name'] = $fn;
			}
			
			// $config['upload_path'] = './assets/dokumen/';
			$config['upload_path'] = dirname(__FILE__) . ('//..//dokumen//');
            $config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$config['max_size']  = 1024 * 5;
			$config['allowed_types'] = '*';
            $this->upload->initialize($config);
			
			// if ($this->upload->do_upload('userfile')) {
				// $uploadinfo = $this->upload->data();
			if ($this->upload->do_multi_upload("userfile")) { // use same as you did in the input field
				$uploadinfo = $this->upload->get_multi_upload_data(); 
				
				// foreach ($uploadinfo as $file) { // loop over the upload data 
					// $this->email->attach($file['full_path']); // attach the full path as an email attachments :D
				// }
				
				// $data = array('image' => $uploadinfo['file_name']);
				// $this->blog_model->update($id, $data);
			} else {
				$this->session->set_flashdata('error', 'Unggah file gagal.');
			}
		}
	}

    function get_dokumen() {
        $spt_id = $this->uri->segment(4);
        
        $this->load->helper('directory');
        $dir = directory_map(dirname(__FILE__).'//..//dokumen//');

        $files = array();
        foreach ($dir as $file) {
            $f = explode('@', $file);
            if($f[0] == $spt_id)
                $files[] = anchor(active_module_url("sptpd/unduh/{$file}"), $f[1], array("title"=>"Unduh file $f[1]", "target"=>"_blank"));
        };
        
        $ret = new stdClass();
        $ret->data = $files;
        // print_r($files);
        // print_r($ret);
        echo json_encode($files);
    }

	function unduh() { //donlot
        if($filename = $this->uri->segment(4)) {
			$dir = dirname(__FILE__) . ('//..//dokumen//');
			if(file_exists($dir.$filename)) {
				$data = file_get_contents($dir.$filename);
				$this->load->helper('download');
				force_download($filename, $data);
			} else {
				// $this->session->set_flashdata('error', 'Dokumen tidak ditemukan');
				// redirect('');
				echo 'Dokumen tidak ditemukan.';
				exit;
			}
		} else {
			show_404();
		}
	}
	
	/* report */
	function show_rpt() {		
		$cls_mtd_html = $this->router->fetch_class()."/cetak/html";
		$cls_mtd_pdf  = $this->router->fetch_class()."/cetak/pdf";
		$data['rpt_html'] = active_module_url($cls_mtd_html). '?' . $_SERVER['QUERY_STRING'] ;
		$data['rpt_pdf']  = active_module_url($cls_mtd_pdf) . '?' . $_SERVER['QUERY_STRING'] ;
        $this->load->view('vjasper_viewer', $data);
	}

	function cetak() {		
		$type = $this->uri->segment(4);
					
		$rpt     = $this->input->get('rpt');
		$kondisi = "";
        
        if($rpt=='sptpd_tr') {
            $wp_id = $this->input->get('w');
            if(!empty($wp_id))
                $kondisi .= " AND c.id={$wp_id} ";
            $type_id = $this->input->get('t');
            if($type_id!=999)
                $kondisi .= " AND st.id={$type_id} ";
            $usaha_id= $this->input->get('u');
            if($usaha_id!=999)
                $kondisi .= " AND u.id={$usaha_id} ";
            
            $kondisi .= " AND s.tahun=".pad_tahun_anggaran();
                            
            $params = array(
                "daerah" => pad_pemda_daerah(),
                "dinas" => pad_pemda_nama(),         
                'kondisi' => (string)$kondisi,
            );
        } else {
            $rpt = 'sptpd_slip';
            $sptpd_id = $this->input->get('no');
            $terbilang = terbilang(pad_to_decimal($this->input->get('val')), 3) . " Rupiah";
            $params = array(
                'sptpd_id' => (int)$sptpd_id,
                "terbilang" => $terbilang,
                
                "alamat" => pad_pemda_alamat(),
                "telp" => pad_pemda_telp(),
                "fax" => pad_pemda_fax(),
                "website" => pad_pemda_website(),
                "email" => pad_pemda_email(),
                "alamat_lengkap" => pad_pemda_alamat_lengkap(),
                
                "daerah" => pad_pemda_daerah(),
                "dinas" => pad_pemda_nama(),            
                "logo" => base_url('assets/img/logorpt__.jpg'),
                "logobjb" => base_url('assets/img/bank-bjb.jpg'),
            );
        }
        
		$ignore_html_pg = TRUE;
		$rpt = 'wp/'.$rpt;
		
		$db_pad = $this->load->database('pad', TRUE);
		$jasper = $this->load->library('Jasper');
        $jasper->db   = $db_pad->database;
        $jasper->usr  = $db_pad->username;
        $jasper->pwd  = $db_pad->password;
        $jasper->port = $db_pad->port;
        
		echo $jasper->cetak($rpt, $params, $type, $ignore_html_pg);
	}
}
