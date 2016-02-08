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
            'apps_model', 'sptpd_model', 'skpd_model', 'invoice_model' 
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
				$options[$row->id] = $row->nama;
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
			$js                        = 'id="type_id" class="form-group" onChange="void(0);"';
			$select = form_dropdown('type_id', $options, 999, $js);
			$select = preg_replace("/[\r\n]+/", "", $select);;
			$data['select_sptpd_type'] = $select;

			$select_data = $this->load->model('usaha_model')->get_select();
			$options     = array();
			foreach ($select_data as $row) {
                if($row->id == 1 || $row->id == 2 || $row->id == 3 || $row->id == 5 || $row->id == 6)
				$options[$row->id] = $row->nama;
			}
			$js                   = 'id="usaha_id" class="form-group"';
			$options[999] = 'SEMUA PAJAK';
			$select = form_dropdown('usaha_id', $options, 999, $js);
			$select = preg_replace("/[\r\n]+/", "", $select);;
			$data['select_usaha'] = $select;

            $options     = array();
            $options[999] = 'SEMUA';
            $options['0'] = 'BELUM BAYAR';
            $options['1'] = 'SUDAH BAYAR';
            $js                   = 'id="bayar_id" class="form-group"';
            $select = form_dropdown('bayar_id', $options, 999 , $js);
            $select = preg_replace("/[\r\n]+/", "", $select);;
            $data['select_bayar'] = $select;

            $options      = array();
            $options[999] = 'SEMUA';
            $options['1'] = 'BELUM VALIDASI';
            $options['2'] = 'SUDAH VALIDASI';
            $js                   = 'id="validasi_id" class="form-group"';
            $select = form_dropdown('validasi_id', $options, 999 , $js);
            $select = preg_replace("/[\r\n]+/", "", $select);;
            $data['select_validasi'] = $select;


			$this->load->view(active_module().'/wp/vsptpd', $data);
		}
    }

    function grid()
    {
        $type_id = $this->uri->segment(4);
        $usaha_id = $this->uri->segment(5);
        $status_pembayaran = $this->uri->segment(6);
        $status_validasi = $this->uri->segment(7);





        $this->load->library('Datatables',$this->load->database('pad', TRUE));
        //(s.tahun||\'.\'||s.sptno::text)
		if (!wp_login()) {
			if ($this->controller == 'sptpd') {
				$this->datatables->select("s.id, get_bayarno(s.id,'pad_spt') as sptno, get_nospt() as no_sptpd, s.terimatgl, st.typenm,
					get_nopd(cu.id, true) as npwpd, c.nama, s.masadari, s.masasd, s.dasar,
					(((s.dasar*s.tarif)+s.denda+s.bunga+s.kenaikan+s.lain2)-(s.kompensasi+s.setoran)) as pajak,
					cu.usaha_id, s.type_id, cu.id as cuid", false);
				$this->datatables->from('pad_spt s');
				$this->datatables->join('pad_customer_usaha cu', 's.customer_usaha_id=cu.id', 'left');
				$this->datatables->join('pad_customer c', 'cu.customer_id=c.id', 'left');
				$this->datatables->join('pad_usaha u', 'cu.usaha_id=u.id', 'left');
				$this->datatables->join('pad_jenis_pajak p', 's.pajak_id=p.id', 'left');
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
					get_nopd(cu.id, true) as npwpd, c.nama, s.masadari, s.masasd, s.dasar,
					(((s.dasar*s.tarif)+s.denda+s.bunga+s.kenaikan+s.lain2)-(s.kompensasi+s.setoran)) as pajak,
					cu.usaha_id, s.type_id, cu.id as cuid', false);
				$this->datatables->from('pad_spt s');
				$this->datatables->join('pad_customer_usaha cu', 's.customer_usaha_id=cu.id', 'left');
				$this->datatables->join('pad_customer c', 'cu.customer_id=c.id', 'left');
				$this->datatables->join('pad_usaha u', 'cu.usaha_id=u.id', 'left');
				$this->datatables->join('pad_jenis_pajak p', 's.pajak_id=p.id', 'left');
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
            if($status_pembayaran <> 999 && !empty($status_pembayaran))
                $this->datatables->where('s.status_pembayaran', $status_pembayaran);

			$this->datatables->rupiah_column('8,9');
			$this->datatables->date_column('2,6,7');
			
		} else {
			if ($this->controller == 'sptpd') {
				// $this->datatables->select('s.id, (s.tahun||\'.\'||s.sptno::text) as sptno, s.terimatgl,

                $this->datatables->select("s.id, get_bayarno(s.id,'pad_spt') as bayarno, get_nospt() as no_sptpd, s.terimatgl,
                    get_nopd(cu.id, true) as npwpd, p.nama, cu.opnm, 
                    upper(to_char(s.masadari, 'Mon YYYY')) as masa, s.jatuhtempotgl, s.dasar, (s.tarif*100) as tarif, 
                    s.pajak_terhutang as pajak, 
                    (get_datasspd(s.id,'pad_spt')).tglsspd as sspdtgl, (get_datasspd(s.id,'pad_spt')).jbunga as bunga,
                    s.pajak_terhutang + (get_datasspd(s.id,'pad_spt')).jbunga as bayar, 
                    cu.usaha_id, s.type_id, cu.id as cuid", false);
                $this->datatables->from('pad_spt s');
                $this->datatables->join('pad_customer_usaha cu', 's.customer_usaha_id=cu.id');
                $this->datatables->join('pad_customer c', 'cu.customer_id=c.id');
                $this->datatables->join('pad_usaha u', 'cu.usaha_id=u.id');
                $this->datatables->join('pad_jenis_pajak p', 's.pajak_id=p.id');
                $this->datatables->join('pad_spt_type st', 'st.id=s.type_id');            
                //$this->datatables->order_by('s.id desc', 'left');


				if ($this->input->get('iSortCol_0') == 1) {
					$sort = $this->input->get('sSortDir_0');
					$this->datatables->order_by('s.sptno', $sort);
				}
			}
			
			// $this->datatables->where('s.tahun', pad_tahun_anggaran());
			$this->datatables->where('c.id', wp_id());
			
			if($type_id != 999 && !empty($type_id))
				$this->datatables->where('s.type_id', $type_id);
			if($usaha_id != 999 && !empty($usaha_id))
				$this->datatables->where('cu.usaha_id', $usaha_id);
            if($status_pembayaran != 999 && $status_pembayaran != null)
                $this->datatables->where('s.status_pembayaran', $status_pembayaran);
            if($status_validasi != 999 && $status_validasi != null){
                $this->datatables->where('s.proses', $status_validasi);
            }

			// $this->datatables->checkbox_column('9');
			$this->datatables->rupiah_column('9,11,13,14');
			$this->datatables->date_column('3,8');
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
        $data['multiple']        = $this->input->post('multiple');

        $data['so']                = $this->input->post('so');
        $data['type_id']           = $this->input->post('type_id');
        $data['masadari']          = $this->input->post('masadari');
        $data['masapajak_bulan']   = $this->input->post('masapajak_bulan');

        $data['masasd']            = $this->input->post('masasd');
        $data['jatuhtempotgl']     = $this->input->post('jatuhtempotgl');

        $data['minimal_omset']   = $this->input->post('minimal_omset');
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

        $data['created'] = $this->input->post('created');
        $data['create_uid']  = $this->input->post('create_uid');
        $data['updated']  = $this->input->post('updated');
        $data['update_uid']   = $this->input->post('update_uid');

        $data['cara_bayar'] = $this->input->post('cara_bayar');

        //omset 31 Hari
        $data['omset1']      = pad_to_decimal($this->input->post('omset1'));
        $data['omset2']      = pad_to_decimal($this->input->post('omset2'));
        $data['omset3']      = pad_to_decimal($this->input->post('omset3'));
        $data['omset4']      = pad_to_decimal($this->input->post('omset4'));
        $data['omset5']      = pad_to_decimal($this->input->post('omset5'));
        $data['omset6']      = pad_to_decimal($this->input->post('omset6'));
        $data['omset7']      = pad_to_decimal($this->input->post('omset7'));
        $data['omset8']      = pad_to_decimal($this->input->post('omset8'));
        $data['omset9']      = pad_to_decimal($this->input->post('omset9'));
        $data['omset10']      = pad_to_decimal($this->input->post('omset10'));
        $data['omset11']      = pad_to_decimal($this->input->post('omset11'));
        $data['omset12']      = pad_to_decimal($this->input->post('omset12'));
        $data['omset13']      = pad_to_decimal($this->input->post('omset13'));
        $data['omset14']      = pad_to_decimal($this->input->post('omset14'));
        $data['omset15']      = pad_to_decimal($this->input->post('omset15'));
        $data['omset16']      = pad_to_decimal($this->input->post('omset16'));
        $data['omset17']      = pad_to_decimal($this->input->post('omset17'));
        $data['omset18']      = pad_to_decimal($this->input->post('omset18'));
        $data['omset19']      = pad_to_decimal($this->input->post('omset19'));
        $data['omset20']      = pad_to_decimal($this->input->post('omset20'));
        $data['omset21']      = pad_to_decimal($this->input->post('omset21'));
        $data['omset22']      = pad_to_decimal($this->input->post('omset22'));
        $data['omset23']      = pad_to_decimal($this->input->post('omset23'));
        $data['omset24']      = pad_to_decimal($this->input->post('omset24'));
        $data['omset25']      = pad_to_decimal($this->input->post('omset25'));
        $data['omset26']      = pad_to_decimal($this->input->post('omset26'));
        $data['omset27']      = pad_to_decimal($this->input->post('omset27'));
        $data['omset28']      = pad_to_decimal($this->input->post('omset28'));
        $data['omset29']      = pad_to_decimal($this->input->post('omset29'));
        $data['omset30']      = pad_to_decimal($this->input->post('omset30'));
        $data['omset31']      = pad_to_decimal($this->input->post('omset31'));
        $data['omset32']      = pad_to_decimal($this->input->post('omset32')); 


        $data['keterangan1']      = $this->input->post('keterangan1');
        $data['keterangan2']      = $this->input->post('keterangan2');
        $data['keterangan3']      = $this->input->post('keterangan3');
        $data['keterangan4']      = $this->input->post('keterangan4');
        $data['keterangan5']      = $this->input->post('keterangan5');
        $data['keterangan6']      = $this->input->post('keterangan6');
        $data['keterangan7']      = $this->input->post('keterangan7');
        $data['keterangan8']      = $this->input->post('keterangan8');
        $data['keterangan9']      = $this->input->post('keterangan9');
        $data['keterangan10']      = $this->input->post('keterangan10');
        $data['keterangan11']      = $this->input->post('keterangan11');
        $data['keterangan12']      = $this->input->post('keterangan12');
        $data['keterangan13']      = $this->input->post('keterangan13');
        $data['keterangan14']      = $this->input->post('keterangan14');
        $data['keterangan15']      = $this->input->post('keterangan15');
        $data['keterangan16']      = $this->input->post('keterangan16');
        $data['keterangan17']      = $this->input->post('keterangan17');
        $data['keterangan18']      = $this->input->post('keterangan18');
        $data['keterangan19']      = $this->input->post('keterangan19');
        $data['keterangan20']      = $this->input->post('keterangan20');
        $data['keterangan21']      = $this->input->post('keterangan21');
        $data['keterangan22']      = $this->input->post('keterangan22');
        $data['keterangan23']      = $this->input->post('keterangan23');
        $data['keterangan24']      = $this->input->post('keterangan24');
        $data['keterangan25']      = $this->input->post('keterangan25');
        $data['keterangan26']      = $this->input->post('keterangan26');
        $data['keterangan27']      = $this->input->post('keterangan27');
        $data['keterangan28']      = $this->input->post('keterangan28');
        $data['keterangan29']      = $this->input->post('keterangan29');
        $data['keterangan30']      = $this->input->post('keterangan30');
        $data['keterangan31']      = $this->input->post('keterangan31'); 
        $data['keterangan32']      = $this->input->post('keterangan32'); 



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
        $this->session->set_userdata('mode', 'add');
		
		// cek apakah wp memiliki jenis pajak ini ->  $this->uri->segment(4)
        if (wp_login()) {
			$model = $this->load->model('pad_model');
			if (!$model->check_cu(wp_id() , $this->uri->segment(4))) {
				$this->session->set_flashdata('msg_error', 'Anda tidak memiliki hak akses menambah data untuk jenis pajak ini.');
				redirect(active_module_url());
			}
        }

        $p_usaha_id = $this->uri->segment(4);
        $p_type_id  = $this->uri->segment(5);
        $p_id       = $this->uri->segment(6);

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
            // $sptno      = $this->sptpd_model->generate_sptno(pad_tahun_anggaran());
            $sptno      = $this->sptpd_model->generate_sptno(date('Y', strtotime($input_post['terimatgl'])),date('m', strtotime($input_post['terimatgl'])));

            //cek nama wp - kalo beda bikin baru
            $wp_data = $this->load->model('subjek_pajak_model')->get($input_post['customer_id']);
            $wp_nama = $wp_data->nama;
            $cid  = $input_post['customer_id'];
            $cuid = $input_post['customer_usaha_id'];
			
            $update_data = array(
                'sptno' => $sptno,

                'customer_id' => $cid,
                'customer_usaha_id' => $cuid,
                'pajak_id' => $input_post['pajak_id'],
                'tahun' => date('Y', strtotime($input_post['terimatgl'])),
                'terimatgl' => date('Y-m-d', strtotime($input_post['terimatgl'])),
                'bulan' => date('m', strtotime($input_post['terimatgl'])), //$input_post['tahun'],

                'type_id' => $input_post['type_id'],
                'so' => $input_post['so'],
                'jatuhtempotgl' => date('Y-m-d', strtotime($input_post['jatuhtempotgl'])),
                'masadari' => date('Y-m-d', strtotime($input_post['masadari'])),
                'masasd' => date('Y-m-d', strtotime($input_post['masasd'])),

                'minimal_omset' => $input_post['minimal_omset'],
                'dasar' => $input_post['dasar'],
                'tarif' => $input_post['tarif'],
                'denda' => $input_post['denda'],
                'bunga' => $input_post['bunga'],
                'setoran' => $input_post['setoran'],
                'kenaikan' => $input_post['kenaikan'],
                'kompensasi' => $input_post['kompensasi'],
                'lain2' => $input_post['lain2'],
			    
                'cara_bayar' => $input_post['cara_bayar'],	
                'pajak_terhutang' => $input_post['pajak'],

                'r_bayarid' => $input_post['r_bayarid'],
                'r_nsr' => $input_post['r_nsr'],
                'rekening_id' => $input_post['rekening_id'],


                'created' => date('Y-m-d'),
                'create_uid' => sipkd_user_id(),
                'terimanip' => sipkd_user_id(),
                'unit_id' => pad_pemda_unitid(),

                'enabled' => 1,
                'satuan' => NULL,

                 /*Omset 31 Hari*/
                'omset1' => $input_post['omset1'], 'omset6' => $input_post['omset6'],
                'omset2' => $input_post['omset2'], 'omset7' => $input_post['omset7'],
                'omset3' => $input_post['omset3'], 'omset8' => $input_post['omset8'],
                'omset4' => $input_post['omset4'], 'omset9' => $input_post['omset9'],
                'omset5' => $input_post['omset5'], 'omset10' => $input_post['omset10'],
                
                'omset11' => $input_post['omset11'], 'omset16' => $input_post['omset16'],
                'omset12' => $input_post['omset12'], 'omset17' => $input_post['omset17'],
                'omset13' => $input_post['omset13'], 'omset18' => $input_post['omset18'],
                'omset14' => $input_post['omset14'], 'omset19' => $input_post['omset19'],
                'omset15' => $input_post['omset15'], 'omset20' => $input_post['omset20'],

                'omset21' => $input_post['omset21'], 'omset26' => $input_post['omset26'],
                'omset22' => $input_post['omset22'], 'omset27' => $input_post['omset27'],
                'omset23' => $input_post['omset23'], 'omset28' => $input_post['omset28'],
                'omset24' => $input_post['omset24'], 'omset29' => $input_post['omset29'],
                'omset25' => $input_post['omset25'], 'omset30' => $input_post['omset30'],

                'omset31' => $input_post['omset31'], 'omset_lain' => $input_post['omset32'],

                // Keterangan

                'keterangan1' => $input_post['keterangan1'], 'keterangan6' => $input_post['keterangan6'],
                'keterangan2' => $input_post['keterangan2'], 'keterangan7' => $input_post['keterangan7'],
                'keterangan3' => $input_post['keterangan3'], 'keterangan8' => $input_post['keterangan8'],
                'keterangan4' => $input_post['keterangan4'], 'keterangan9' => $input_post['keterangan9'],
                'keterangan5' => $input_post['keterangan5'], 'keterangan10' => $input_post['keterangan10'],
                
                'keterangan11' => $input_post['keterangan11'], 'keterangan16' => $input_post['keterangan16'],
                'keterangan12' => $input_post['keterangan12'], 'keterangan17' => $input_post['keterangan17'],
                'keterangan13' => $input_post['keterangan13'], 'keterangan18' => $input_post['keterangan18'],
                'keterangan14' => $input_post['keterangan14'], 'keterangan19' => $input_post['keterangan19'],
                'keterangan15' => $input_post['keterangan15'], 'keterangan20' => $input_post['keterangan20'],

                'keterangan21' => $input_post['keterangan21'], 'keterangan26' => $input_post['keterangan26'],
                'keterangan22' => $input_post['keterangan22'], 'keterangan27' => $input_post['keterangan27'],
                'keterangan23' => $input_post['keterangan23'], 'keterangan28' => $input_post['keterangan28'],
                'keterangan24' => $input_post['keterangan24'], 'keterangan29' => $input_post['keterangan29'],
                'keterangan25' => $input_post['keterangan25'], 'keterangan30' => $input_post['keterangan30'],

                'keterangan31' => $input_post['keterangan31'], 'keterangan_lain' => $input_post['keterangan32'],

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
			
         // Validasi Duplikasi Masa Pajak   
        if($this->session->userdata("mode")=="add"){
        if( $input_post['multiple']==0){
            $lastinput = date('Y-m-d', strtotime($input_post['masadari']));
            $customer_usaha_id = $input_post['customer_usaha_id'];
            $pajak_id = $input_post['pajak_id'];
            $masapajak_bulan = $input_post['masapajak_bulan'];

            $rekening_id = $input_post['rekening_id'];
            $type_id = $input_post['type_id'];

            $cekduplikat= $this->sptpd_model->is_multiple($customer_usaha_id, $pajak_id, $type_id, $rekening_id, $lastinput );   
            if ($cekduplikat==true) {
                $this->session->set_flashdata('msg_warning', 'Pajak tersebut dengan Masa Pajak: '. $masapajak_bulan.' Sudah Ada, Harap Cek Data-data Sebelumnya');
                redirect(active_module_url($this->controller.'/add'));
            }
            else{
                     $update_data = array_merge($update_data, $reklame_data, $air_tanah_data, $tambahan_data);
                    $spt_id = $this->sptpd_model->save($update_data);
            }
                 }
             else{
                $update_data = array_merge($update_data, $reklame_data, $air_tanah_data, $tambahan_data);
                 $spt_id = $this->sptpd_model->save($update_data);
            }
            }


            //$update_data = array_merge($update_data, $reklame_data, $air_tanah_data, $tambahan_data);
            //$spt_id = $this->sptpd_model->save($update_data);



			
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
        $month_ini = new DateTime("first day of last month");
        $data['dt']['masadari']  = $month_ini->format('d-m-Y'); 
        $data['dt']['masapajak_bulan']  = $month_ini->format('M-Y'); 


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

		$data['dt']['kode']  = '';
		$data['dt']['jatuhtempo']  = '';
        $data['dt']['multiple'] = '';
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
        $this->session->set_userdata('mode','edit');
		
        $p_usaha_id = $this->uri->segment(4);
        $p_type_id  = $this->uri->segment(5);
        $p_id       = $this->uri->segment(6);
        
        $sptpd = $this->sptpd_model->get($p_id);
        $tglinput = date('Y-m-d', strtotime($sptpd->created));

        /*
        if ($tglinput < date('Y-m-d')) {
            $this->session->set_flashdata('msg_warning', 'Aktivitas Edit diperbolehkan hanya dalam waktu 1 hari');
            redirect(active_module_url($this->controller));
        }
        */
        
        //cek tipe dokumen -> cm bisa edit yg self aja
        if($p_type_id!=pad_dok_self_id()) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
        
        //cek usaha
        if (($p_usaha_id == pad_reklame_id() || $p_usaha_id == pad_air_tanah_id())) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }

		//cek kohir
        //if ($this->sptpd_model->is_kohir_ok($p_id)) {
        //    $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
        //    redirect(active_module_url($this->controller));
        //}
		
		// cek pmb
        if ($this->sptpd_model->is_bayar($p_id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
             redirect(active_module_url($this->controller));
        }


        // Validasi
        if ($this->sptpd_model->is_validasi_ok($p_id)) {
            $this->session->set_flashdata('msg_warning', 'Data tidak dapat diubah karena sudah divalidasi');
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
            $data['dt']['masapajak_bulan']    = date('M-Y', strtotime($get->masadari));

            $data['dt']['masasd']             = date('d-m-Y', strtotime($get->masasd));
            $data['dt']['minimal_omset']           = $get->minimal_omset;
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
            $data['dt']['created']        = date('d-m-Y', strtotime($get->created));
            $data['dt']['create_uid']         = $get->create_uid;
            $data['dt']['updated']         = date('d-m-Y', strtotime($get->updated));
            $data['dt']['update_uid']          = $get->update_uid;
            $data['dt']['customer_id']        = $get->customer_id;
            
            $data['dt']['isprint_dc']         = $get->isprint_dc;
            $data['dt']['notes']              = $get->notes;
            $data['dt']['rekening_id']        = $get->rekening_id;
            $data['dt']['cara_bayar']   = $get->cara_bayar;
            
            $data['dt']['omset1'] = $get->omset1; $data['dt']['omset6'] = $get->omset6;
            $data['dt']['omset2'] = $get->omset2; $data['dt']['omset7'] = $get->omset7;
            $data['dt']['omset3'] = $get->omset3; $data['dt']['omset8'] = $get->omset8;
            $data['dt']['omset4'] = $get->omset4; $data['dt']['omset9'] = $get->omset9;
            $data['dt']['omset5'] = $get->omset5; $data['dt']['omset10'] = $get->omset10;
            
            $data['dt']['omset11'] = $get->omset11; $data['dt']['omset16'] = $get->omset16;
            $data['dt']['omset12'] = $get->omset12; $data['dt']['omset17'] = $get->omset17;
            $data['dt']['omset13'] = $get->omset13; $data['dt']['omset18'] = $get->omset18;
            $data['dt']['omset14'] = $get->omset14; $data['dt']['omset19'] = $get->omset19;
            $data['dt']['omset15'] = $get->omset15; $data['dt']['omset20'] = $get->omset20;

            $data['dt']['omset21'] = $get->omset21; $data['dt']['omset26'] = $get->omset26;
            $data['dt']['omset22'] = $get->omset22; $data['dt']['omset27'] = $get->omset27;
            $data['dt']['omset23'] = $get->omset23; $data['dt']['omset28'] = $get->omset28;
            $data['dt']['omset24'] = $get->omset24; $data['dt']['omset29'] = $get->omset29;
            $data['dt']['omset25'] = $get->omset25; $data['dt']['omset30'] = $get->omset30;

            $data['dt']['omset31'] = $get->omset31; $data['dt']['omset32'] = $get->omset_lain;

            $data['dt']['keterangan1'] = $get->keterangan1; $data['dt']['keterangan6'] = $get->keterangan6;
            $data['dt']['keterangan2'] = $get->keterangan2; $data['dt']['keterangan7'] = $get->keterangan7;
            $data['dt']['keterangan3'] = $get->keterangan3; $data['dt']['keterangan8'] = $get->keterangan8;
            $data['dt']['keterangan4'] = $get->keterangan4; $data['dt']['keterangan9'] = $get->keterangan9;
            $data['dt']['keterangan5'] = $get->keterangan5; $data['dt']['keterangan10'] = $get->keterangan10;
            
            $data['dt']['keterangan11'] = $get->keterangan11; $data['dt']['keterangan16'] = $get->keterangan16;
            $data['dt']['keterangan12'] = $get->keterangan12; $data['dt']['keterangan17'] = $get->keterangan17;
            $data['dt']['keterangan13'] = $get->keterangan13; $data['dt']['keterangan18'] = $get->keterangan18;
            $data['dt']['keterangan14'] = $get->keterangan14; $data['dt']['keterangan19'] = $get->keterangan19;
            $data['dt']['keterangan15'] = $get->keterangan15; $data['dt']['keterangan20'] = $get->keterangan20;

            $data['dt']['keterangan21'] = $get->keterangan21; $data['dt']['keterangan26'] = $get->keterangan26;
            $data['dt']['keterangan22'] = $get->keterangan22; $data['dt']['keterangan27'] = $get->keterangan27;
            $data['dt']['keterangan23'] = $get->keterangan23; $data['dt']['keterangan28'] = $get->keterangan28;
            $data['dt']['keterangan24'] = $get->keterangan24; $data['dt']['keterangan29'] = $get->keterangan29;
            $data['dt']['keterangan25'] = $get->keterangan25; $data['dt']['keterangan30'] = $get->keterangan30;
            $data['dt']['keterangan31'] = $get->keterangan31; $data['dt']['keterangan32'] = $get->keterangan_lain;

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
                $options[$rows->id] = $rows->nama;
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
                $data['dt']['kode']  = $row->kode;
                $data['dt']['jatuhtempo']  = $row->jatuhtempo;
                $data['dt']['multiple'] = $row->multiple;

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

    public function delete()
    {

        $p_id = $this->uri->segment(4);
        $this->load_auth();
        if (!$this->module_auth->delete) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_delete);
            redirect(active_module_url($this->controller));
        }
        

        //cek kohir
        //if ($this->sptpd_model->is_kohir_ok($p_id)) {
        //    $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
       //     redirect(active_module_url($this->controller));
       // }
        
        if ($this->sptpd_model->is_bayar($p_id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
             redirect(active_module_url($this->controller));
        }


        // Validasi
        if ($this->sptpd_model->is_validasi_ok($p_id)) {
            $this->session->set_flashdata('msg_warning', 'Data tidak dapat dihapus karena sudah divalidasi');
            redirect(active_module_url($this->controller));
        }

        
        if ($p_id && $this->sptpd_model->get($p_id)) {
            $this->sptpd_model->delete($p_id);
            $this->skpd_model->delete_by_spt($p_id);
            
            $this->session->set_flashdata('msg_success', 'Data telah dihapus');
            redirect(active_module_url($this->controller));
        } else {
            show_404();
        }
    }


    public function get_validasi()
    {
        $this->load_auth();
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
        
        $p_usaha_id = $this->uri->segment(4);
        $p_type_id  = $this->uri->segment(5);
        $p_id       = $this->uri->segment(6);

        $this->session->set_userdata('usaha_id',$p_usaha_id );

        $sptpd = $this->sptpd_model->get($p_id);
        $tglinput = date('Y-m-d', strtotime($sptpd->created));

        /*
        if ($tglinput < date('Y-m-d')) {
            $this->session->set_flashdata('msg_warning', 'Aktivitas Edit diperbolehkan hanya dalam waktu 1 hari');
            redirect(active_module_url($this->controller));
        }
        */
        
        //cek tipe dokumen -> cm bisa edit yg self aja
        /*
        if($p_type_id!=pad_dok_self_id()) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
        */
        
        // cek pmb
        /*
        if ($this->sptpd_model->is_sspd_ok($spt_id) || $this->sptpd_model->is_bayar_ok($spt_id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
             redirect(active_module_url("{$this->controller}/index/{$p_usaha_id}"));
        }
        */
        /*

        if ($this->sptpd_model->is_bayar($p_id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
             redirect(active_module_url($this->controller));
        }
        */



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
            $data['dt']['masapajak_bulan']    = date('M-Y', strtotime($get->masadari));
            $masapajak_bulan                = date('M-Y', strtotime($get->masadari));


            $data['dt']['masasd']             = date('d-m-Y', strtotime($get->masasd));
            $data['dt']['minimal_omset']           = $get->minimal_omset;
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
            $data['dt']['customer_id']        = $get->customer_id;
            
            $data['dt']['isprint_dc']         = $get->isprint_dc;
            $data['dt']['notes']              = $get->notes;
            $data['dt']['rekening_id']        = $get->rekening_id;
            $data['dt']['cara_bayar']         = $get->cara_bayar;
            

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
                $options[$rows->id] = $rows->nama;
                if ($rows->id == $get->pajak_id){
                $nama_pajak = $rows->nama;
                }
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


            $select_data = array((object) array('id'=>2, 'cara_bayar'=>'ATM / TELLER'), 
                                 (object) array('id'=>1, 'cara_bayar'=>'TRANSFER'));
            $cara_bayar = '';
            if($select_data) {
            foreach ($select_data as $row) {
                if ($row->id == $data['dt']['cara_bayar'])
                    $cara_bayar .= "<option value={$row->id} selected >{$row->cara_bayar}</option>";
                else
                    $cara_bayar .= "<option value={$row->id}>{$row->cara_bayar}</option>";
            }};

            $val_data = $this->sptpd_model->get($p_id);
            $val_data->id = $data['dt']['id'];
            $val_data->masapajak_bulan = $masapajak_bulan;
            $val_data->nama_pajak = $nama_pajak;
            $val_data->cara_bayar = $cara_bayar;
            $val_data->pajak = ($data['dt']['dasar'])*($data['dt']['tarif']);
            $val_data->jatuhtempotgl = $data['dt']['jatuhtempotgl'] ;

            echo json_encode($val_data);

            
            if ($p_usaha_id == pad_reklame_id() && $p_type_id == pad_dok_office_id()) {
                //
            } else if ($p_usaha_id == pad_air_tanah_id() && $p_type_id == pad_dok_office_id()) {
                //
            } else {
            }
        } else {
            show_404();
        }
    }

    public function proces_validasi()
    {
        $this->load_auth();
        if (!$this->module_auth->update) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }

        $cara_bayar     = $this->input->post('cara_bayar');
        $spt_id         = $this->input->post('spt_id');
        $jatuhtempotgl  = $this->input->post('jatuhtempotgl');
        $pajak          = $this->input->post('pajak');
        $source_nama = 'pad_spt';
        $p_usaha_id     = $this->session->userdata('usaha_id');

                //cek usaha
        if (($p_usaha_id == pad_reklame_id() || $p_usaha_id == pad_air_tanah_id())) {
            $this->session->set_flashdata('msg_warning', 'Tidak ada hak akses untuk jenis usaha ini');
            redirect(active_module_url($this->controller));
        }

        //cek kohir
        //if ($this->sptpd_model->is_kohir_ok($spt_id)) {
        //    $this->session->set_flashdata('msg_warning', 'No. Kohir Sudah Ada');
        //     redirect(active_module_url($this->controller));
        //}

        if ($this->sptpd_model->is_bayar($spt_id)) {
            $this->session->set_flashdata('msg_warning', 'Pajak sudah dibayar');
             redirect(active_module_url($this->controller));
        }


        $proses = 2 ; //sudah validasi, 1 belum
        $tgl = date('Y-m-d h:i:s');
        $query = $this->db->query("update pad_spt 
                                  set cara_bayar = $cara_bayar , proses = $proses, tanggal_validasi = '$tgl' 
                                  where id= $spt_id");

        $query = $this->db->query("select s.id as source_id, 
                        s.tahun, u.id as usaha_id, get_invno(s.id) as invoice_no, 
                        u.nama as jenis_usaha, jp.nama as jenis_pajak,
                        get_npwpd(c.id,true) as npwpd, c.nama as nama_wp, 
                        c.alamat as alamat_wp, cu.opnm as op_nama, cu.opalamat as op_alamat, 
                        s.tahun||lpad(u.id::text, 2, '0')||lpad(get_invno(s.id)::text, 5, '0') as nomor_tagihan,
                        s.dasar as pokok, s.denda, s.bunga, s.pajak_terhutang as total, 0 as status_bayar,
                        s.jatuhtempotgl as jatuh_tempo,
                        extract(year from s.masadari)||lpad(extract(month from s.masadari)::text, 2, '0') periode,
                        left(get_rekening(r.kode)::text,11) as rekening_pokok, r.nama as nama_pokok,
                        left(get_rekening(d.kode)::text,11) as rekening_denda, d.nama as nama_denda
                        from pad_spt s 
                        inner join pad_customer c on c.id=s.customer_id 
                        inner join pad_customer_usaha cu on cu.id=s.customer_usaha_id 
                        inner join pad_usaha u on u.id=cu.usaha_id 
                        inner join pad_jenis_pajak jp on jp.id=s.pajak_id 
                        inner join pad_rekening r on r.id=s.rekening_id
                        inner join pad_rekening d on d.id=jp.rekdenda_id
                        where s.id=$spt_id");



        foreach ($query->result() as $row)
        {
           $source_id   = $row->source_id;
           $tahun       = $row->tahun;
           $npwpd       = $row->npwpd;
           $nama_wp     = $row->nama_wp;
           $alamat_wp   = $row->alamat_wp;
           $op_nama      = $row->op_nama;
           $op_alamat    = $row->op_alamat;
           $rekening_pokok  = str_replace(".","",$row->rekening_pokok);//rekening pokok
           $nama_pokok  = $row->nama_pokok; //nama pokok
           $invoice_no     = $row->invoice_no; 
           $usaha_id    = $row->usaha_id;
           $spt_id      = $spt_id;
           $jenis_usaha = $row->jenis_usaha;
           $jenis_pajak = $row->jenis_pajak;
           $nomor_tagihan = $row->nomor_tagihan;
           $status_bayar =$row->status_bayar;
           $periode     = $row->periode;
           $rekening_denda = str_replace(".","",$row->rekening_denda);
           $nama_denda  = $row->nama_denda;
           $jatuh_tempo = $row->jatuh_tempo;
           $pokok = $row->pokok;
           $denda = $row->denda;
           $total = $row->total;
           $bunga = $row->bunga;
        }

            $update_data = array(
                            'tahun' => $tahun,
                            'usaha_id' => $usaha_id,
                            'invoice_no' => $invoice_no,
                            'source_id' => $source_id,
                            'source_nama' => $source_nama,  
                            'jatuh_tempo' => $jatuhtempotgl,
                            'nomor_tagihan' => $nomor_tagihan,
                            'jenis_usaha' => $jenis_usaha, //pad_usaha.nama
                            'jenis_pajak' => $jenis_pajak, //pad_jenis_pajak.nama
                            'pokok' => $pokok,
                            'denda' => $denda,
                            'bunga' => $bunga,
                            'total' => $total,
                            'npwpd' => $npwpd,
                            'nama_wp' => $nama_wp,
                            'alamat_wp' => $alamat_wp,
                            'alamat_op' => $op_alamat,
                            'nama_op' => $op_nama,
                            'status_bayar' => 0,
                            'rekening_pokok' => $rekening_pokok,
                            'rekening_denda' => $rekening_denda,
                            'periode' => $periode, //Desember 2015
                            'nama_pokok' => $nama_pokok,
                            'nama_denda' => $nama_denda,
                            'created' => date('Y-m-d h:i:s'),
                            'create_uid' => sipkd_user_id(),
                        );
            $save = $this->invoice_model->save($update_data);

                            
        if ($query && $save) {
            $this->session->set_flashdata('msg_success', 'Data berhasil divalidasi');
            redirect(active_module_url($this->controller));
        }
        else{
             $this->session->set_flashdata('msg_danger', 'Data gagal divalidasi');
            redirect(active_module_url($this->controller));
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

        //cek tipe dokumen -> cm bisa edit yg self aja
        if($p_type_id!=pad_dok_self_id()) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }
        
        //cek usaha
        if (($p_usaha_id == pad_reklame_id() || $p_usaha_id == pad_air_tanah_id())) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
            redirect(active_module_url($this->controller));
        }

		//cek kohir
        //if ($this->sptpd_model->is_kohir_ok($p_id)) {
        //   $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
        //    redirect(active_module_url($this->controller));
        //}
		
        if ($this->sptpd_model->is_bayar($p_id)) {
            $this->session->set_flashdata('msg_warning', $this->module_auth->msg_update);
             redirect(active_module_url($this->controller));
        }


                //Validasi Multiple   

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
                'tahun' => date('Y', strtotime($input_post['terimatgl'])),
                'bulan' => date('m', strtotime($input_post['terimatgl'])), //$input_post['tahun'],

                'terimatgl' => date('Y-m-d', strtotime($input_post['terimatgl'])),
                'type_id' => $input_post['type_id'],
                'so' => $input_post['so'],
                'jatuhtempotgl' => date('Y-m-d', strtotime($input_post['jatuhtempotgl'])),
                'masadari' => date('Y-m-d', strtotime($input_post['masadari'])),
                'masasd' => date('Y-m-d', strtotime($input_post['masasd'])),

                'minimal_omset' => $input_post['minimal_omset'],
                'dasar' => $input_post['dasar'],
                'tarif' => $input_post['tarif'],
                'denda' => $input_post['denda'],
                'bunga' => $input_post['bunga'],
                'setoran' => $input_post['setoran'],
                'kenaikan' => $input_post['kenaikan'],
                'kompensasi' => $input_post['kompensasi'],
                'lain2' => $input_post['lain2'],
				'cara_bayar' => $input_post['cara_bayar'],
				'pajak_terhutang' => $input_post['pajak'],

                'r_bayarid' => $input_post['r_bayarid'],
                'r_nsr' => $input_post['r_nsr'],
                'rekening_id' => $input_post['rekening_id'],

                'updated' => date('Y-m-d'),
                'update_uid' => sipkd_user_id(),

                                 /*Omset 31 Hari*/
                'omset1' => $input_post['omset1'], 'omset6' => $input_post['omset6'],
                'omset2' => $input_post['omset2'], 'omset7' => $input_post['omset7'],
                'omset3' => $input_post['omset3'], 'omset8' => $input_post['omset8'],
                'omset4' => $input_post['omset4'], 'omset9' => $input_post['omset9'],
                'omset5' => $input_post['omset5'], 'omset10' => $input_post['omset10'],
                
                'omset11' => $input_post['omset11'], 'omset16' => $input_post['omset16'],
                'omset12' => $input_post['omset12'], 'omset17' => $input_post['omset17'],
                'omset13' => $input_post['omset13'], 'omset18' => $input_post['omset18'],
                'omset14' => $input_post['omset14'], 'omset19' => $input_post['omset19'],
                'omset15' => $input_post['omset15'], 'omset20' => $input_post['omset20'],

                'omset21' => $input_post['omset21'], 'omset26' => $input_post['omset26'],
                'omset22' => $input_post['omset22'], 'omset27' => $input_post['omset27'],
                'omset23' => $input_post['omset23'], 'omset28' => $input_post['omset28'],
                'omset24' => $input_post['omset24'], 'omset29' => $input_post['omset29'],
                'omset25' => $input_post['omset25'], 'omset30' => $input_post['omset30'],

                'omset31' => $input_post['omset31'], 'omset_lain' => $input_post['omset32'],

                // Keterangan

                'keterangan1' => $input_post['keterangan1'], 'keterangan6' => $input_post['keterangan6'],
                'keterangan2' => $input_post['keterangan2'], 'keterangan7' => $input_post['keterangan7'],
                'keterangan3' => $input_post['keterangan3'], 'keterangan8' => $input_post['keterangan8'],
                'keterangan4' => $input_post['keterangan4'], 'keterangan9' => $input_post['keterangan9'],
                'keterangan5' => $input_post['keterangan5'], 'keterangan10' => $input_post['keterangan10'],
                
                'keterangan11' => $input_post['keterangan11'], 'keterangan16' => $input_post['keterangan16'],
                'keterangan12' => $input_post['keterangan12'], 'keterangan17' => $input_post['keterangan17'],
                'keterangan13' => $input_post['keterangan13'], 'keterangan18' => $input_post['keterangan18'],
                'keterangan14' => $input_post['keterangan14'], 'keterangan19' => $input_post['keterangan19'],
                'keterangan15' => $input_post['keterangan15'], 'keterangan20' => $input_post['keterangan20'],

                'keterangan21' => $input_post['keterangan21'], 'keterangan26' => $input_post['keterangan26'],
                'keterangan22' => $input_post['keterangan22'], 'keterangan27' => $input_post['keterangan27'],
                'keterangan23' => $input_post['keterangan23'], 'keterangan28' => $input_post['keterangan28'],
                'keterangan24' => $input_post['keterangan24'], 'keterangan29' => $input_post['keterangan29'],
                'keterangan25' => $input_post['keterangan25'], 'keterangan30' => $input_post['keterangan30'],

                'keterangan31' => $input_post['keterangan31'], 'keterangan_lain' => $input_post['keterangan32'],
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

                     // Validasi Duplikasi Masa Pajak   
        if($this->session->userdata("mode")=="edit"){
        if( $input_post['multiple']==0){
            $lastinput = date('Y-m-d', strtotime($input_post['masadari']));
            $customer_usaha_id = $input_post['customer_usaha_id'];
            $pajak_id = $input_post['pajak_id'];
            $rekening_id = $input_post['rekening_id'];
            $type_id = $input_post['type_id'];

            $cekduplikat= $this->sptpd_model->is_multiple($customer_usaha_id, $pajak_id, $type_id, $rekening_id, $lastinput );   
            if ($cekduplikat==true) {
                $this->session->set_flashdata('msg_warning', 'Pajak dengan Masa Pajak Tersebut Sudah Ada, Harap Cek Data-data Sebelumnya');
                redirect(active_module_url($this->controller));
            }
            else{
                $update_data = array_merge($update_data, $reklame_data, $air_tanah_data, $tambahan_data);
                $this->sptpd_model->update($p_id, $update_data);
            }
                 }
            else{
                $update_data = array_merge($update_data, $reklame_data, $air_tanah_data, $tambahan_data);
                $this->sptpd_model->update($p_id, $update_data);
            }
            }




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
            $options[$rows->id] = $rows->nama;
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
            $data['dt']['kode']  = $row->kode;
            $data['dt']['jatuhtempo']  = $row->jatuhtempo;
            $data['dt']['multiple'] = $row->multiple;
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
			$rows = $model->sptpd_get_cu($c_id);
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

            //Get Bulan SPT Pajak yg Terakhir
            //$cu_id = 10;
            //$u_id = 49;
            $month_ini = new DateTime("first day of last month");
            $query = $this->db->query("select max(masadari) as max_masa from pad_spt 
                                       where customer_id=$c_id and customer_usaha_id=$cu_id and pajak_id=$u_id");
            foreach ($query->result() as $row){
                     $max_masa = $row->max_masa;
                }    
            $max_masa_f  = date('d-m-Y', strtotime($max_masa));
            $month_ini_f = $month_ini->format('d-m-Y');

            if($max_masa_f==$month_ini_f)
            {
                $cu_data->masadari = $month_ini_f;
                $cu_data->masapajak_bulan = $month_ini->format('M-Y');
            }
            else if($max_masa != '')
            {
                $cu_data->masadari        = date('d-m-Y', strtotime("$max_masa + 1 month"));
                $cu_data->masapajak_bulan = date('M-Y', strtotime($cu_data->masadari));
            }
            else
            {
                $cu_data->masadari = $month_ini_f;
                $cu_data->masapajak_bulan = $month_ini->format('M-Y'); 
            }

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
        $query = $this->db->query("select def_pajak_id from pad_customer_usaha where id=$cu_id");
        foreach ($query->result() as $row){
           $pajak_id = $row->def_pajak_id;
        }

        if ($rows = $model->sptpd_get_pajak($usaha_id)) {
			$pajak = "";
            foreach ($rows as $row) {
                if($pajak_id && $row->id==$pajak_id)
                    $pajak .= "<option value={$row->id} selected>{$row->nama} (Default)</option>";
                //else
                    //$pajak .= "<option value={$row->id}>{$row->nama}</option>";
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
                $jalan .= "<option value={$row->id}>{$row->nama}</option>";
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
        } elseif($rpt=='sptpd_omset') {
            $rpt = 'sptpd_rincian_omset';
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
		"logo" => $_SERVER["DOCUMENT_ROOT"]."/assets/img/logorpt__.jpg",
		"logobjb" => $_SERVER["DOCUMENT_ROOT"]."/assets/img/bank-bjb.jpg",
                //"logo" => base_url('assets/img/logorpt__.jpg'),
                //"logobjb" => base_url('assets/img/bank-bjb.jpg'),
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
                "logo" => $_SERVER["DOCUMENT_ROOT"]."/assets/img/logorpt__.jpg",
                "logobjb" => $_SERVER["DOCUMENT_ROOT"]."/assets/img/bank-bjb.jpg",

                //"logo" => base_url('assets/img/logorpt__.jpg'),
                //"logobjb" => base_url('assets/img/bank-bjb.jpg'),
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
