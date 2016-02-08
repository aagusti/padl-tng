<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/_navbar'); ?>
<div class="content">
	<div class="container-fluid">
		<div class="hero-unit">
		  <center>
  			<h2>PEMERINTAH <?=LICENSE_TO?></h2>
  			<h3><?=LICENSE_TO_SUB?></h3>
  			<img src="<?=app_img_logo('assets/img/logo-kota-tangerang.png')?>" alt="logo" style="max-height:250px;">
  			<h2>Module PAD</h2>
  			<P>Module PAD merupakan bagian dari module Aplikasi OpenSIPKD</P>
  			<P>Module ini digunakan untuk mengelola data Pendapatan Asli Daerah</P>
  			<P><i class="icon-star"></i> SELAMAT BEKERJA <i class="icon-star"></i></P>
			</center>
		</div>
	</div>
</div>
<? $this->load->view('_foot'); ?>