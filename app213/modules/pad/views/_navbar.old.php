
	<link href="<?=base_url()?>assets/pad/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/pad/css/datepicker.css" rel="stylesheet">
	
	<link href="<?=base_url()?>assets/pad/css/demo_page.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/pad/css/demo_table_jui.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/pad/css/smoothness/jquery-ui-1.8.4.custom.css" rel="stylesheet">
	
	<link href="<?=base_url()?>assets/pad/css/jquery.dataTables.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/pad/css/jquery-dialog2/jquery.dialog2.css" rel="stylesheet">

	
	<script src="<?=base_url()?>assets/pad/js/jquery.controls.js"></script>
	<script src="<?=base_url()?>assets/pad/js/jquery.form.js"></script>
	<script src="<?=base_url()?>assets/pad/js/jquery.dialog2.js"></script>
	<script src="<?=base_url()?>assets/pad/js/jquery.dialog2.helpers.js"></script>
	
	<script src="<?=base_url()?>assets/pad/js/numberFormatter.js"></script>	
	
<!--
-->

	<script src="<?=base_url()?>assets/pad/js/jquery-1.8.2.min.js"></script>
	<script src="<?=base_url()?>assets/pad/js/jquery-ui-tabs.js"></script>
	<script src="<?=base_url()?>assets/pad/js/jquery.dataTables.js"></script>
	
<script src="<?=base_url()?>assets/pad/js/autoNumeric.js"></script>
<script src="<?=base_url()?>assets/pad/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>assets/pad/js/bootstrap-typeahead.js"></script>

	
<style>
    @import "<?=base_url('assets/pad/css/bootstrap.css')?>";
    @import "<?=base_url('assets/pad/css/font-static.css')?>";
	
    @import "<?=base_url('assets/pad/css/bootstrap-responsive.css')?>";
    @import "<?=base_url('assets/pad/css/datepicker.css')?>";
	
    @import "<?=base_url('assets/pad/css/demo_page.css')?>";
    @import "<?=base_url('assets/pad/css/demo_table_jui.css')?>";
    @import "<?=base_url('assets/pad/css/smoothness/jquery-ui-1.8.4.custom.css')?>";
	
    @import "<?=base_url('assets/pad/css/jquery.dataTables.css')?>";
	
	@media (min-width: 979px) {
		.wekeke{
			 margin-top: -2px !important;
			 width:100%;
			 position:fixed;
		}
		.navbar-inner {
			 border: 0px !important;
			 border-radius: 0px !important;
		}
		footer .container-fluid {
			width:100%;
			background: #000 !important;
		}
		footer .container-fluid p {
			float: right;
			margin-right: 40px;
			margin-top: 2px;
			margin-bottom: 2px;
		}
	}
	.nav-tabs {
		margin-bottom: 6px;
	}
	
	.content {
		padding-top: 45px;
	}
	
	.dropdown-menu {
		border-radius: 2px !important;
	}
	
	a.btn {
		height: 14px !important;
		padding: 4px 8px !important;
		border-radius: 2px !important;
		margin-bottom: 1px !important;
	}
	form select  {
		height: 24px !important;
		padding: 2px !important;
		border-radius: 2px !important;
		margin-bottom: 1px !important;
		margin-right: 4px !important;
	}
</style>

<div class="navbar navbar-inverse wekeke" style="z-index:1029; ">
    <div class="navbar-inner">
        <div class="container">			
			<?if($this->session->userdata('login')) :?>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li <?echo $current=='beranda' ? 'class="active"' : '';?>><a class="brand" href="<?=active_module_url();?>"><?=strtoupper(active_module());?></a></li>
                    <li class="dropdown <?echo $current=='pendaftaran' ? 'active' : '';?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendaftaran <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=active_module_url('subjek_pajak');?>">Subjek Pajak</a></li>
                            <li><a href="<?=active_module_url('objek_pajak');?>">Objek Pajak</a></li>
							<li class="divider"></li>
                            <li><a href="<?=active_module_url();?>">Laporan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?echo $current=='pendataan' ? 'active' : '';?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendataan <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=active_module_url('sptpd');?>">SPTPD</a></li>
							<li class="divider"></li>
                            <li><a href="<?=active_module_url();?>">Laporan</a></li>
                        </ul>
					</li>
                    <li class="dropdown <?echo $current=='penetapan' ? 'active' : '';?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Penetapan <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=active_module_url('skpd');?>">SKPD</a></li>
							<li class="divider"></li>
                            <li><a href="<?=active_module_url();?>">Laporan</a></li>
                        </ul>
					</li>
                    <li class="dropdown <?echo $current=='penerimaan' ? 'active' : '';?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Penerimaan <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=active_module_url('sspd');?>">SSPD</a></li>
                            <li><a href="<?=active_module_url('penerimaan');?>">Penerimaan</a></li>
							<li class="divider"></li>
                            <li><a href="<?=active_module_url();?>">Laporan</a></li>
                        </ul>
					</li>
                    <li class="dropdown <?echo $current=='penagihan' ? 'active' : '';?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Penagihan <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=active_module_url('stpd');?>">STPD</a></li>
							<li class="divider"></li>
                            <li><a href="<?=active_module_url();?>">Laporan</a></li>
                        </ul>
					</li>
			
                    <li class="dropdown <?echo $current=='referensi' ? 'active' : '';?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Referensi <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <!--li><a href="<?=active_module_url();?>">Unit</a></li-->
                            <li><a href="<?=active_module_url('pejabat');?>">Pejabat</a></li>
                            <li><a href="<?=active_module_url('anggaran');?>">Anggaran</a></li>
                            <li><a href="<?=active_module_url('rekening');?>">Rekening</a></li>
                            <li><a href="<?=active_module_url('usaha');?>">Jenis Usaha</a></li>
                            <li><a href="<?=active_module_url('pajak');?>">Jenis Pajak</a></li>
                            <li><a href="<?=active_module_url('kecamatan');?>">Kecamatan</a></li>
                            <li><a href="<?=active_module_url('kelurahan');?>">Kelurahan</a></li>
                            <li><a href="<?=active_module_url('jalan');?>">Nama Jalan</a></li>
                            <li><a href="<?=active_module_url('jalan_kelas');?>">Klas Jalan</a></li>
                            <li class="nav-header">Setting</li>
                            <li><a href="<?=active_module_url('pemda');?>">PAD Module</a></li>
                        </ul>
					</li>
                </ul>
            </div>
			<? endif; ?>
        </div>
    </div>
</div>