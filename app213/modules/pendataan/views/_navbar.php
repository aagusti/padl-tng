<?if($this->session->userdata('login')) :?>
<?if($this->session->userdata('groupkd')!='esptpd_wp') :?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>

       <li class="treeview hide">
        <a href="#">
          <i class="fa fa-folder-open"></i> <span>PENDATAAN</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="<?=active_module_url('sptpd/index');?><?echo $this->session->userdata('pad_reklame_id');?>">
            <i class="fa fa-photo"></i>Reklame</a></li>
        <li><a href="<?=active_module_url('sptpd/index');?><?echo $this->session->userdata('pad_air_tanah_id');?>">
            <i class="fa fa-support"></i>Air Tanah</a></li>
        <li><a href="<?=active_module_url('sptpd/index');?><?echo $this->session->userdata('pad_hotel_id');?>">
            <i class="fa fa-hospital-o"></i>Hotel</a></li>
        <li><a href="<?=active_module_url('sptpd/index');?><?echo $this->session->userdata('pad_restauran_id');?>">
            <i class="fa fa-cutlery"></i>Restauran</a></li>
        <li><a href="<?=active_module_url('sptpd/index');?><?echo $this->session->userdata('pad_hiburan_id');?>">
            <i class="fa fa-film"></i>Hiburan</a></li>
        <li><a href="<?=active_module_url('sptpd/index');?><?echo $this->session->userdata('pad_parkir_id');?>">
            <i class="fa fa-car"></i>Parkir</a></li>
        <li><a href="<?=active_module_url('sptpd/index');?><?echo $this->session->userdata('pad_ppj_id');?>">
            <i class="fa fa-flash"></i>PPJ</a></li>
        <li><a href="<?=active_module_url('teguran');?>">
            <i class="fa fa-circle-o"></i>Teguran</a></li>
         <li><a href="<?=active_module_url('lap_pendataan');?>">
            <i class="fa  fa-file-text-o"></i>Laporan<?echo $this->session->userdata('pad_hiburan_id');?></a></li>
       </ul>
       

    <li class="treeview active">
      <a href="#">
        <i class="fa fa-pencil"></i> <span>PENDAFTARAN</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
       <li <?echo $current=='beranda' ? 'class="active"' : '';?>><a class="brand" href="<?=active_module_url();?>">SPTPD Online</a></li>
                    <li class="dropdown <?echo $current=='pendataan' ? 'active' : '';?>">
                        <a href="<?=active_module_url('sptpd');?>">SPTPD WP</a></li>
                    <li class="<?echo $current=='registrasi' ? 'active' : '';?>">
                        <a href="<?=active_module_url('user_reg');?>" >Registrasi WP</a>
          </li>
             </ul>
      </li>
      
      <li class="treeview hide">
        <a href="#">
          <i class="fa fa-folder-open"></i> <span>DATA</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li <?echo $current=='beranda' ? 'class="active"' : '';?>><a class="brand" href="<?=active_module_url();?>">e-SPTPD</a></li>
                    <li <?echo $current=='pendataan' ? 'class="active"' : '';?>>
            <a href="<?=active_module_url('sptpd');?>">DATA SPTPD - <?=$this->session->userdata('wp_nm');?></a>
          </li>
                    <li <?echo $current=='logout' ? 'class="active"' : '';?>>
            <a href="<?=base_url().'logout';?>">Logout</a>
          </li>
       </ul>
     </li>
           
          
    </ul>
  </section>

</aside>
<div class="content-wrapper">
<link href="<?=base_url()?>assets/adminlte/plugins/datepicker/datepicker3.min.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>assets/pad/js/bootstrap-datepicker.js"></script>  


<? endif; ?>
<? endif; ?>
</body>