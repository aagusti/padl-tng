<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cetak_omset extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        if (!is_login()) {
        echo "<script>window.location.replace('" . base_url() . "');</script>";
        exit;
        }
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->helper('download');
    }

    function download($spt_id)
    {

        $wp_id = $this->session->userdata('wp_id');
        $customer_id = 0; //init
        $objPHPExcel = new PHPExcel();
 
                // Set properties
        $objPHPExcel->getProperties()
                  ->setCreator("E-SPTPD KOTA TANGERANG") //creator
                    ->setTitle("LAPORAN OMSET");  //file title
 
        $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
        $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
        $objget->setTitle('Sample Sheet'); //sheet title
        $objset->setCellValue('A1',"LAPORAN OMSET BULANAN"); //insert cell value
        $objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
                ->setSize(15);    //set font size
        
        //query
        $query = $this->db->query("select c.id as customer_id, c.wpnama as pemiliknm, c.nama as customernm, c.alamat as customeralamat, get_sptpdno(s.id), get_nopd(cu.id,true) nopd, cu.opnm,
        get_npwpd(c.id,true) npwpd, u.nama as usahanm, p.nama as pajaknm, get_rekening(r.kode) as rekeningkd, r.nama as rekeningnm,
        get_bayarno(s.id,'pad_spt') as bayarno, s.tahun, s.id, s.customer_id, s.customer_usaha_id, s.pajak_id, ROW_NUMBER() OVER (ORDER BY urut) as nomor, urut, omset, keterangan,
        case
        when urut = 32 then 'Lainnya'
        when urut <> 32 then urut::text end no_urut,

        case
        when extract(month from s.masadari)=1 then 'JANUARI'
        when extract(month from s.masadari)=2 then 'PEBRUARI'
        when extract(month from s.masadari)=3 then 'MARET'
        when extract(month from s.masadari)=4 then 'APRIL'
        when extract(month from s.masadari)=5 then 'MEI'
        when extract(month from s.masadari)=6 then 'JUNI'
        when extract(month from s.masadari)=7 then 'JULI'
        when extract(month from s.masadari)=8 then 'AGUSTUS'
        when extract(month from s.masadari)=9 then 'SEPTEMBER'
        when extract(month from s.masadari)=10 then 'OKTOBER'
        when extract(month from s.masadari)=11 then 'NOPEMBER'
        when extract(month from s.masadari)=12 then 'DESEMBER'
        end masabulan,

        extract(year from s.masadari) masatahun,

        extract(day from current_timestamp) terimatgl,
        case
        when extract(dow from current_timestamp)=0 then 'Minggu'
        when extract(dow from current_timestamp)=1 then 'Senin'
        when extract(dow from current_timestamp)=2 then 'Selasa'
        when extract(dow from current_timestamp)=3 then 'Rabu'
        when extract(dow from current_timestamp)=4 then 'Kamis'
        when extract(dow from current_timestamp)=5 then 'Jumat'
        when extract(dow from current_timestamp)=6 then 'Sabtu'
        else 'Hari ###'
        end terimahari,

        case
        when extract(month from current_timestamp)=1 then 'Januari'
        when extract(month from current_timestamp)=2 then 'Pebruari'
        when extract(month from current_timestamp)=3 then 'Maret'
        when extract(month from current_timestamp)=4 then 'April'
        when extract(month from current_timestamp)=5 then 'Mei'
        when extract(month from current_timestamp)=6 then 'Juni'
        when extract(month from current_timestamp)=7 then 'Juli'
        when extract(month from current_timestamp)=8 then 'Agustus'
        when extract(month from current_timestamp)=9 then 'September'
        when extract(month from current_timestamp)=10 then 'Oktober'
        when extract(month from current_timestamp)=11 then 'Nopember'
        when extract(month from current_timestamp)=12 then 'Desember'
        end terimabulan,
        extract(year from current_timestamp) terimatahun


        from
        (
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 1 as urut, omset1 as omset, keterangan1 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari,  tahun, 2 as urut, omset2 as omset, keterangan2 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 3 as urut, omset3 as omset, keterangan3 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 4 as urut, omset4 as omset, keterangan4 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 5 as urut, omset5 as omset, keterangan5 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 6 as urut, omset6 as omset, keterangan6 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 7 as urut, omset7 as omset, keterangan7 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 8 as urut, omset8 as omset, keterangan8 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 9 as urut, omset9 as omset, keterangan9 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 10 as urut, omset10 as omset, keterangan10 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 11 as urut, omset11 as omset, keterangan11 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 12 as urut, omset12 as omset, keterangan12 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 13 as urut, omset13 as omset, keterangan13 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 14 as urut, omset14 as omset, keterangan14 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 15 as urut, omset15 as omset, keterangan15 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 16 as urut, omset16 as omset, keterangan16 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 17 as urut, omset17 as omset, keterangan17 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 18 as urut, omset18 as omset, keterangan18 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 19 as urut, omset19 as omset, keterangan19 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 20 as urut, omset20 as omset, keterangan20 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 21 as urut, omset21 as omset, keterangan21 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 22 as urut, omset22 as omset, keterangan22 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 23 as urut, omset23 as omset, keterangan23 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 24 as urut, omset24 as omset, keterangan24 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 25 as urut, omset25 as omset, keterangan25 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 26 as urut, omset26 as omset, keterangan26 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 27 as urut, omset27 as omset, keterangan27 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 28 as urut, omset28 as omset, keterangan28 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 29 as urut, omset29 as omset, keterangan29 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 30 as urut, omset30 as omset, keterangan30 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 31 as urut, omset31 as omset, keterangan31 as keterangan from pad_spt
        union
        select id, customer_id, customer_usaha_id, pajak_id, masadari, tahun, 32 as urut, omset_lain as omset, keterangan_lain as keterangan from pad_spt
        ) s
        inner join pad_customer_usaha cu on cu.id=s.customer_usaha_id
        inner join pad_customer c on c.id=cu.customer_id
        inner join pad_kecamatan kec on kec.id=c.kecamatan_id
        inner join pad_kelurahan kel on kel.id=c.kelurahan_id and kel.kecamatan_id=c.kecamatan_id
        inner join pad_usaha u on u.id=cu.usaha_id
        inner join pad_jenis_pajak p on p.id=s.pajak_id
        inner join pad_rekening r on p.rekening_id=r.id
        where s.id=$spt_id 
        order by s.id, s.urut");

        $objset->setCellValue('B3', 'Bulan');
        $objset->setCellValue('B4', 'NOPD');
        $objset->setCellValue('B5', 'Usaha');
        $objset->setCellValue('B6', 'Perusahaan');
        $objset->setCellValue('B7', 'Alamat');

        $objset->setCellValue('C42', 'JUMLAH');
        $objset->setCellValue('D42', '=SUM(D10:D41)');
        $objget->getStyle('C42')->getFont()->setBold(true) ;
        $objget->getStyle('D42')->getFont()->setBold(true) ;



        foreach ($query->result() as $row)
        {
        $objset->setCellValue('D3', $row->masabulan.'  '.$row->masatahun);
        $objset->setCellValue('D4', $row->nopd);
        $objset->setCellValue('D5', $row->usahanm);
        $objset->setCellValue('D6', $row->customernm);
        $objset->setCellValue('D7', $row->customeralamat);
        break;
        }




        //table header
        $cols = array("B","C","D","E");
                $val = array("No","Tanggal","Jumlah Omset(Rp.)","Keterangan");
        for ($a=0;$a<4;$a++) 
                {
                    $objset->setCellValue($cols[$a].'9', $val[$a]);
                        //set borders
            $objget->getStyle($cols[$a].'9')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objget->getStyle($cols[$a].'9')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objget->getStyle($cols[$a].'9')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objget->getStyle($cols[$a].'9')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
 
            //set alignment
            $objget->getStyle($cols[$a].'9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //set font weight
            $objget->getStyle($cols[$a].'9')->getFont()->setBold(true) ;
            $objget->getColumnDimension('D')->setWidth(20);
            $objget->getColumnDimension('E')->setWidth(30);

        }
                
               //taruh baris data disini
        $colsb = array("B","C","D","E");
        $i = 10 ; // baris ke
        foreach ($query->result() as $row)
        {
            if($row->urut==32) $urut='Lainnya';
            else $urut=$row->urut;
            $valb = array($row->nomor,
                          $urut,
                          $row->omset,
                          $row->keterangan);
            for ($b=0;$b<4;$b++) 
            {
                $objset->setCellValue($colsb[$b].$i, $valb[$b]);
                $objget->getStyle($colsb[$b].$i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objget->getStyle($colsb[$b].$i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objget->getStyle($colsb[$b].$i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objget->getStyle($colsb[$b].$i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            }

            $i=$i+1;
            $customer_id = $row->customer_id;
        }
                
                
        if($customer_id==$wp_id){ //cegah id lain download
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('assets/file/omsetxls/OmsetBulananID'.$wp_id.'.xls'); //simpan dalam file sample.xls
            sleep(3); //Save dulu
            $data = file_get_contents('assets/file/omsetxls/OmsetBulananID'.$wp_id.'.xls'); // Read the file's contents
            $name = 'Laporan Omset Bulanan.xls';
            force_download($name, $data);
        }else{
            echo "<h1>ACCESS FORBIDDEN</h1>";
        }

    }
}