<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/_navbar'); ?>
<div class="content">
	<div class="container-fluid">
		<div class="hero-unit">
		  <center>
  			<h2>PEMERINTAH <?=LICENSE_TO?></h2>
  			<h3><?=LICENSE_TO_SUB?></h3>
  			<img src="<?=app_img_logo('assets/img/img_logo.png')?>" alt="logo" style="max-height:250px;">
  			<h2>Module e-Registrasi</h2>
  			<P>Merupakan bagian dari module Aplikasi OpenSIPKD</P>
  			<P>Module ini digunakan untuk mengatur Pendaftaran Wajib Pajak Online</P>
  			<P><i class="icon-star"></i> SELAMAT BEKERJA <i class="icon-star"></i></P>
			</center>
		</div>
	</div>
</div>
<? $this->load->view('_foot'); ?>