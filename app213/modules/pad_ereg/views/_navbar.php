<style>
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

<style type="text/css">@import "<?=base_url()?>assets/pad/css/datepicker.css";</style>
<script src="<?=base_url()?>assets/pad/js/bootstrap-datepicker.js"></script>	

<div class="navbar navbar-inverse wekeke" style="z-index:1029; ">
    <div class="navbar-inner">
        <div class="container-fluid">		
			<?if($this->session->userdata('login')) :?>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <!--li <?echo $current=='beranda' ? 'class="active"' : '';?>><a class="brand" href="<?=active_module_url();?>"><?=strtoupper(active_module());?></a></li-->
                    <li <?echo $current=='beranda' ? 'class="active"' : '';?>><a class="brand" href="<?=active_module_url();?>">e-Registrasi</a></li>
                    
                    <?if($this->session->userdata('groupkd')!='pad_ereg') :?>
                    <li class="dropdown <?echo $current=='pendaftaran' ? 'active' : '';?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendaftaran <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=active_module_url('daftar');?>">Calon Wajib Pajak</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?echo $current=='referensi' ? 'active' : '';?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Referensi <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=active_module_url('daftar_status');?>">Status Pendaftaran</a></li>
                        </ul>
                    </li>
                    <? else: ?>
                    <? endif; ?>
                    
                </ul>
            </div>
			<? endif; ?>
        </div>
    </div>
</div>