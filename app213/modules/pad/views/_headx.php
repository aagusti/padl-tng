<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=APP_TITLE?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="sistem informasi keuangan daerah">
	<meta name="author" content="irul">

	<!-- Fav and touch icons -->
	<link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.ico">

	<!-- Le styles -->
	<link href="<?=base_url()?>assets/pad/css/bootstrap.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/pad/css/font-static.css" rel="stylesheet">
	<style>
	  body {
		padding-top: 70px; /* 60px to make the container go all the way to the bottom of the topbar */
		padding-bottom: 40px;
	  }
	  html {
		overflow: -moz-scrollbars-vertical; /* Always show scrollbar */
	  }
	</style>
	<link href="<?=base_url()?>assets/pad/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/pad/css/datepicker.css" rel="stylesheet">
	
	<link href="<?=base_url()?>assets/pad/css/jquery.dataTables.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/pad/css/jquery-dialog2/jquery.dialog2.css" rel="stylesheet">
	
	<link href="<?=base_url()?>assets/pad/css/demo_page.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/pad/css/demo_table_jui.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/pad/css/smoothness/jquery-ui-1.8.4.custom.css" rel="stylesheet">

	
	<!-- js -->
	<script src="<?=base_url()?>assets/pad/js/jquery-1.8.2.min.js"></script>
	<script src="<?=base_url()?>assets/pad/js/jquery.dataTables.js"></script>
	
	<script src="<?=base_url()?>assets/pad/js/jquery.controls.js"></script>
	<script src="<?=base_url()?>assets/pad/js/jquery.form.js"></script>
	<script src="<?=base_url()?>assets/pad/js/jquery.dialog2.js"></script>
	<script src="<?=base_url()?>assets/pad/js/jquery.dialog2.helpers.js"></script>

	<!-- bootstrap -->
	<script src="<?=base_url()?>assets/pad/js/bootstrap-transition.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-alert.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-modal.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-dropdown.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-scrollspy.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-tab.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-tooltip.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-popover.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-button.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-collapse.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-carousel.js"></script>
	<script src="<?=base_url()?>assets/pad/js/bootstrap-typeahead.js"></script>	
	
	<!-- tambahan -->
	<script src="<?=base_url()?>assets/pad/js/bootstrap-datepicker.js"></script>

	<!-- /autonumeric www.decorplanit.com/plugin/ -->
	<script src="<?=base_url()?>assets/pad/js/autoNumeric.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="<?=base_url()?>assets/pad/js/html5shiv.js"></script>
	<![endif]-->

	<script>
		var timer;
		var wait=10;
		document.onkeypress=resetTimer;
		document.onmousemove=resetTimer;
		
		function resetTimer() {
			clearTimeout(timer);
			timer=setTimeout("logout()", 60000*wait);
		}

		function logout() {
			//window.location.href='<?=base_url()?>logout';
		}
		
		$(document).ready(function() {		
			$('#app_id').change( function() {
				window.location = '<?=base_url();?>change_module/'+$('#app_id').val();
			});
			
			$('#msg_helper').delay(5000).fadeOut('slow');
			
			$('#modalform').on('hidden', function() {
                $(this).removeData('modal');
            });
		});
	</script>
</head>

<body>  
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
	<div class="container-fluid">
		<button class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse" type="button"></button>
		<a class="brand" href="<?=active_module_url()?>"><img src="<?=base_url()?>assets/img/logo.png" width="200"></a>
		
		<?if(is_login()) :?>
		<div class="btn-group pull-right">
			<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><? echo $this->session->userdata('username');?></a>
			<ul class="dropdown-menu pull-right">
				<li><a href="#">Ubah Password</a></li>
				<li><a href="<?=base_url().'logout';?>">Logout</a></li>
			</ul>
		</div>
		<?endif;?>
		
		<?if(is_super_admin()) :?>
		<form class="btn-group pull-right" >
			<select name="app_id" id="app_id" <?//if(!$app_enabled) echo 'disabled';?>>
			<?php if( isset($apps) && $apps): ?>
				<option value="admin">ADMIN</option>
				<?php foreach($apps as $data): ?>
				<option value="<?php echo $data->app_path;?>" <?php if(active_module()==$data->app_path) echo 'selected';?>><?php echo $data->nama;?></option>
				<?php endforeach;?>
			<?php else:?>
				<option value="">Not configured!</option>
			<?php endif; ?>
			</select>
		</form>
		<?endif?>
	</div>
	</div>
</div>