<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/_navbar'); ?>

<script>
$(document).ready(function() {
	$('#btn_cancel').click(function() {
		window.location = '<?=active_module_url();?>daftar';
	});
    
	var tmt_dtp = $('#reg_datexx').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		tmt_dtp.hide();
	}).data('datepicker');
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
				<a href="#"><strong>UPDATE STATUS</strong></a>
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
				<label class="control-label" for="formno">No. Daftar</label>
				<div class="controls">
					<input class="input-small" type="text" name="formno" id="formno" value="<?=$dt['formno']?>" readonly />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="reg_date">Tgl. Daftar</label>
				<div class="controls">
					<input class="input-small" type="text" name="reg_date" id="reg_date" value="<?=$dt['reg_date']?>" readonly />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="customernm">Wajib Pajak</label>
				<div class="controls">
					<input class="input-large" type="text" name="customernm" id="customernm" value="<?=$dt['customernm']?>" readonly />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="alamat">Alamat</label>
				<div class="controls">
                    <textarea class="input-xlarge" name="alamat" rows="1" cols="50" readonly ><?=$dt['alamat']?></textarea>
                </div>
			</div>
			<div class="control-group">
				<label class="control-label" for="status">Status</label>
				<div class="controls">
					<?=$select_status;?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="keterangan">Keterangan</label>
				<div class="controls">
                    <textarea class="input-xlarge" name="keterangan" rows="1" cols="50" ><?=$dt['keterangan']?></textarea>
                </div>
			</div>
            
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary">Update</button>
					<button type="button" class="btn" id="btn_cancel">Batal</button>
				</div>
			</div>
		<?php echo form_close();?>
    </div>
</div>
<? $this->load->view('_foot'); ?>