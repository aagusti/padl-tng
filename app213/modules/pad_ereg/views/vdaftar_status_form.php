<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/_navbar'); ?>

<script>
$(document).ready(function() {
	$('#btn_cancel').click(function() {
		window.location = '<?=active_module_url();?>daftar_status';
	});
});

$(document).keypress(function(event){
	if (event.which == '13') {
		event.preventDefault();
	}
});
</script>

<div class="content">
    <div class="container-fluid">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#"><strong>STATUS PENDAFTARAN</strong></a>
			</li>
		</ul>
		
		<? 
		echo msg_block();
		if(validation_errors()){
			echo '<blockquote><strong>Harap melengkapi data berikut :</strong>';
			echo validation_errors('<small>','</small>');
			echo '</blockquote>';
		} 
		?>
		
		<?php echo form_open($faction, array('id'=>'myform','class'=>'form-horizontal'));?>
			<input type="hidden" name="id" value="<?=$dt['id']?>"/>
			<div class="control-group">
				<label class="control-label" for="kode">Kode</label>
				<div class="controls">
					<input class="input-mini" type="text" name="kode" id="kode" value="<?=$dt['kode']?>" required />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="uraian">Uraian</label>
				<div class="controls">
					<input class="input" type="text" name="uraian" id="uraian" value="<?=$dt['uraian']?>" required />
				</div>
			</div>
            
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn" id="btn_cancel">Batal</button>
				</div>
			</div>
		<?php echo form_close();?>
    </div>
</div>
<? $this->load->view('_foot'); ?>