<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/_navbar'); ?>

<style>
.nopd_processing {    
	--background-color: #00c;
	position: absolute;
    text-align: center;
    top: 30%;
    left: 0;
	right:0;
	margin: auto;
}
</style>

<script>
function get_kelurahan(kec_id) {
	$.ajax({
		url: "<?php echo active_module_url()?>subjek_pajak/get_kelurahan/"+kec_id,
		success: function (j) {
			var data = $.parseJSON(j);
			var select = $('#kelurahan_id');

			select.html("");
			$.each(data, function(i, val){
				select.append($('<option />', { value: val['id'], text: val['kelurahannm'] }));
			});
		},
		error: function (xhr, desc, er) {
			alert(er);
		}
	});
}

function get_op_kelurahan(kec_id) {
	$.ajax({
		url: "<?php echo active_module_url()?>subjek_pajak/get_kelurahan/"+kec_id,
		success: function (j) {
			var data = $.parseJSON(j);
			var select = $('#op_kelurahan_id');

			select.html("");
			$.each(data, function(i, val){
				select.append($('<option />', { value: val['id'], text: val['kelurahannm'] }));
			});
		},
		error: function (xhr, desc, er) {
			alert(er);
		}
	});
}

function get_op_pajak(usaha_id) {
	$.ajax({
		url: "<?php echo active_module_url()?>subjek_pajak/get_op_pajak/"+usaha_id,
		success: function (j) {
			var data = $.parseJSON(j);
			var select = $('#op_pajak_id');

			select.html("");
			$.each(data, function(i, val){
				select.append($('<option />', { value: val['id'], text: val['pajaknm'] }));
			});
		},
		error: function (xhr, desc, er) {
			alert(er);
		}
	});
}

var oTableKD;
var opRow;

$(document).ready(function() {
	oTableKD = $('#tableKD').dataTable({
		"iDisplayLength": 99,	
		"bJQueryUI": true,
		"bFilter": false,
		"bInfo": false,
		"sDom": '<"toolbar">frtip',
		"sAjaxSource": "<? echo active_module_url('subjek_pajak/grid_kd').$dt['id'].'?iDisplayLength=99'; ?>",
	});

	$('#btn_cancel').click(function() {
		window.location = '<?=active_module_url();?>subjek_pajak';
	});

	$('#op_latitude, #op_longitude').autoNumeric('init', {
		aSep: '.', aDec: ',', vMax: '9999.999999'
	});
    
	var reg_date_dtp = $('#reg_date').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		reg_date_dtp.hide();
	}).data('datepicker');

	var ijin1tgl_dtp = $('#ijin1tgl').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		ijin1tgl_dtp.hide();
	}).data('datepicker');

	var ijin2tgl_dtp = $('#ijin2tgl').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		ijin2tgl_dtp.hide();
	}).data('datepicker');

	var ijin3tgl_dtp = $('#ijin3tgl').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		ijin3tgl_dtp.hide();
	}).data('datepicker');

	var ijin4tgl_dtp = $('#ijin4tgl').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		ijin4tgl_dtp.hide();
	}).data('datepicker');

	var ijin1tglakhir_dtp = $('#ijin1tglakhir').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		ijin1tglakhir_dtp.hide();
	}).data('datepicker');

	var ijin2tglakhir_dtp = $('#ijin2tglakhir').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		ijin2tglakhir_dtp.hide();
	}).data('datepicker');

	var ijin3tglakhir_dtp = $('#ijin3tglakhir').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		ijin3tglakhir_dtp.hide();
	}).data('datepicker');

	var ijin4tglakhir_dtp = $('#ijin4tglakhir').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		ijin4tglakhir_dtp.hide();
	}).data('datepicker');

	var op_tmt_dtp = $('#op_tmt').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		op_tmt_dtp.hide();
	}).data('datepicker');

	var kukuhtgl_dtp = $('#kukuhtgl').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		kukuhtgl_dtp.hide();
	}).data('datepicker');


	/* OP */
	$('#op_usaha_id').change(function() {
		if ($.trim($('#op_konterid').val()) == '') 
			$('#op_keterangan').val($("#op_usaha_id option:selected").text());
	});
    /* end OP */
    
	/* control kartu data hotel */
	var i =0;
	$('#btn_dth_new').click( function (e) {
		e.preventDefault();
		
		if ($('#kdh_gol').val()=='' || $('#kdh_kamar').val()=='' || $('#kdh_tarif').val()=='' || $('#kdh_tamu').val()=='') {
			alert ('Harap isi data dengan benar!')
			return;
		};
		
		var gol   = $('#kdh_gol').val();
		var tarif = parseFloat($('#kdh_tarif').autoNumeric('get'));
		var kamar = parseFloat($('#kdh_kamar').autoNumeric('get'));
		var tamu  = parseFloat($('#kdh_tamu').autoNumeric('get'));
		
		var aiNew = oTableKD.fnAddData( [ gol, tarif, kamar, tamu,'<a class="delete" href="">Hapus</a>' ] );
		var nRow = oTableKD.fnGetNodes( aiNew[0] );
		
		$('#kdh_gol').val('');
		$('#kdh_tarif').val(0);
		$('#kdh_kamar').val(0);
		$('#kdh_tamu').val(0);
	});
	
	$('#tableKD a.delete').live('click', function (e) {
		e.preventDefault();

		var nRow = $(this).parents('tr')[0];
		oTableKD.fnDeleteRow( nRow );
	});
	/* end control kartu data hotel */
	
	$("#myform").submit(function(eventObj){
		// if ($('#msg_confirm').hasClass('hide')==true) {
			// $('#msg_confirm').removeClass('hide');
			// location.hash = '#msg_confirm';
		// } else {
			// if ($('#submit_ok').is(":checked")) {
				var data = JSON.stringify({
					"dtKD": oTableKD.fnGetData()
				});
                
				$('<input type="hidden" name="dtKD"/>').val(data).appendTo('#myform');
				// return true;
			// } else
				// alert('Silahkan setujui dokumen ini terlebih dahulu untuk melanjutkan.');
		// }
		
		return true;
	});
    
	$('#kd_restojmlmeja, #kd_restojmlkursi, #kd_restojmltamu, #kd_filmkursi, #kd_filmpertunjukan, #kd_filmtarif, #kd_bilyarmeja, #kd_bilyartarif, #kd_bilyarkegiatan, #kd_diskopengunjung, #kd_diskotarif, #kd_waletvolume, #kdh_tarif, #kdh_tamu, #kdh_kamar').autoNumeric('init', {
		aSep: '.', aDec: ',', vMax: '999999999999.99',  mDec: '0'
	});
	
	$("[id=btnshow_rpt]").click(function(){
        var rpt = $(this).data('rpt');
		show_rpt(rpt);
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
				<a href="#"><strong>PENDAFTARAN ONLINE</strong></a>
			</li>
		</ul>

		<?php
		echo msg_block();
		if(validation_errors()){
			echo '<blockquote><strong>Harap melengkapi data berikut :</strong>';
			echo validation_errors('<small>','</small>');
			echo '</blockquote>';
		}
		?>

		<?php echo form_open($faction, array('id'=>'myform','class'=>'form-horizontal'));?>
			<input type="hidden" name="id" class="input" value="<?=$dt['id']?>"/>
			<input type="hidden" class="input-mini" name="rp" id="rp" value="<?=$dt['rp']?>" />

			<div class="row">
				<div style="width:420px" class="span6">
					<div class="control-group">
						<label class="control-label" for="reg_date">Tanggal Daftar</label>
						<div class="controls">
							<input class="input-small" type="text" name="reg_date" id="reg_date" value="<?=$dt['reg_date']?>" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pb">Pribadi/Badan</label>
						<div class="controls">
							<?echo $select_pb;?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="customernm">Subjek Pajak</label>
						<div class="controls">
							<input class="input-large" type="text" name="customernm" id="customernm" value="<?=$dt['customernm']?>" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="alamat">Alamat</label>
						<div class="controls">
							<textarea class="input-xlarge" name="alamat" rows="1" cols="50" required><?=$dt['alamat']?></textarea>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="control-group">
						<label class="control-label" for="kecamatan_id">Kecamatan</label>
						<div class="controls">
							<?echo $select_kecamatan;?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="kelurahan_id">Kelurahan</label>
						<div class="controls">
							<?echo $select_kelurahan;?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="kabupaten">Kabupaten/Kota</label>
						<div class="controls">
							<input class="input-large" type="text" name="kabupaten" id="kabupaten" value="<?=$dt['kabupaten']?>" required />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="kodepos">Kode Pos</label>
						<div class="controls">
							<input class="input-mini" type="text" name="kodepos" id="kodepos" value="<?=$dt['kodepos']?>" />
                            &nbsp;&nbsp;&nbsp;&nbsp; Telp. <input class="input-small" type="text" name="telphone" id="telphone" value="<?=$dt['telphone']?>" />
						</div>
					</div>
                    <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                            <input class="input-large" type="text" name="email" id="email" value="<?=$dt['email']?>"/>
                        </div>
                    </div>
				</div>
			</div>
                        
			<div class="row">
				<div style="width:420px" class="span6">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#"><strong>Pemilik</strong></a>
                        </li>
                    </ul>
                    <div class="control-group">
                        <label class="control-label" for="wpnama">Nama</label>
                        <div class="controls">
                            <input class="input-large" type="text" name="wpnama" id="wpnama" value="<?=$dt['wpnama']?>" required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="wpalamat">Alamat</label>
                        <div class="controls">
                            <textarea class="input-xlarge" name="wpalamat" rows="1" cols="50" required><?=$dt['wpalamat']?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="wpkecamatan">Kecamatan</label>
                        <div class="controls">
                            <input class="input-large" type="text" name="wpkecamatan" id="wpkecamatan" value="<?=$dt['wpkecamatan']?>" required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="wpkelurahan">Kelurahan</label>
                        <div class="controls">
                            <input class="input-large" type="text" name="wpkelurahan" id="wpkelurahan" value="<?=$dt['wpkelurahan']?>" required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="wpkabupaten">Kabupaten/Kota</label>
                        <div class="controls">
                            <input class="input-large" type="text" name="wpkabupaten" id="wpkabupaten" value="<?=$dt['wpkabupaten']?>" required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="wpkodepos">Kode Pos</label>
                        <div class="controls">
                            <input class="input-mini" type="text" name="wpkodepos" id="wpkodepos" value="<?=$dt['wpkodepos']?>" /> &nbsp;&nbsp;&nbsp; Telp. <input class="input-small" type="text" name="wptelp" id="wptelp" value="<?=$dt['wptelp']?>" />
                        </div>
                    </div>
                </div>
				<div class="span4">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#"><strong>Pengelola</strong></a>
                        </li>
                    </ul>
                    <div class="control-group">
                        <label class="control-label" for="pnama">Nama</label>
                        <div class="controls">
                            <input class="input-large" type="text" name="pnama" id="pnama" value="<?=$dt['pnama']?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="palamat">Alamat</label>
                        <div class="controls">
                            <textarea class="input-xlarge" name="palamat" rows="1" cols="50"><?=$dt['palamat']?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="pkecamatan">Kecamatan</label>
                        <div class="controls">
                            <input class="input-large" type="text" name="pkecamatan" id="pkecamatan" value="<?=$dt['pkecamatan']?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="pkelurahan">Kelurahan</label>
                        <div class="controls">
                            <input class="input-large" type="text" name="pkelurahan" id="pkelurahan" value="<?=$dt['pkelurahan']?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="pkabupaten">Kabupaten/Kota</label>
                        <div class="controls">
                            <input class="input-large" type="text" name="pkabupaten" id="pkabupaten" value="<?=$dt['pkabupaten']?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="pkodepos">Kode Pos</label>
                        <div class="controls">
                            <input class="input-mini" type="text" name="pkodepos" id="pkodepos" value="<?=$dt['pkodepos']?>" /> &nbsp;&nbsp;&nbsp; Telp. <input class="input-small" type="text" name="ptelp" id="ptelp" value="<?=$dt['ptelp']?>" />
                        </div>
                    </div>
                </div>
            </div>
            
			<div class="row">
				<div class="span10">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#"><strong>Perizinan</strong></a>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="span12">
                            <div class="row">
                                <div class="span4" style="width:260px;">
                                    <strong>Perizinan</strong>
                                    <input class="input-large" type="text" name="ijin1" value="<?=$dt['ijin1']?>" />
                                </div>
                                <div class="span3" style="width:200px;">
                                    <strong>No. Perizinan</strong>
                                    <input class="input-medium" type="text" name="ijin1no" value="<?=$dt['ijin1no']?>" />
                                </div>
                                <div class="span2" style="width:100px;">
                                    <strong>Tanggal Berlaku</strong>
                                    <input class="input-small" type="text" name="ijin1tgl" id="ijin1tgl" value="<?=$dt['ijin1tgl']?>" />
                                </div>
                                <div class="span2" style="width:100px;">
                                    <strong>Tanggal Berakhir</strong>
                                    <input class="input-small" type="text" name="ijin1tglakhir" id="ijin1tglakhir" value="<?=$dt['ijin1tglakhir']?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="span4" style="width:260px;">
                                    <input class="input-large" type="text" name="ijin2" value="<?=$dt['ijin2']?>" />
                                </div>
                                <div class="span3" style="width:200px;">
                                    <input class="input-medium" type="text" name="ijin2no" value="<?=$dt['ijin2no']?>" />
                                </div>
                                <div class="span2" style="width:100px;">
                                    <input class="input-small" type="text" name="ijin2tgl" id="ijin2tgl" value="<?=$dt['ijin2tgl']?>" />
                                </div>
                                <div class="span2" style="width:100px;">
                                    <input class="input-small" type="text" name="ijin2tglakhir" id="ijin2tglakhir" value="<?=$dt['ijin2tglakhir']?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="span4" style="width:260px;">
                                    <input class="input-large" type="text" name="ijin3" value="<?=$dt['ijin3']?>" />
                                </div>
                                <div class="span3" style="width:200px;">
                                    <input class="input-medium" type="text" name="ijin3no" value="<?=$dt['ijin3no']?>" />
                                </div>
                                <div class="span2" style="width:100px;">
                                    <input class="input-small" type="text" name="ijin3tgl" id="ijin3tgl" value="<?=$dt['ijin3tgl']?>" />
                                </div>
                                <div class="span2" style="width:100px;">
                                    <input class="input-small" type="text" name="ijin3tglakhir" id="ijin3tglakhir" value="<?=$dt['ijin3tglakhir']?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="span4" style="width:260px;">
                                    <input class="input-large" type="text" name="ijin4" value="<?=$dt['ijin4']?>" />
                                </div>
                                <div class="span3" style="width:200px;">
                                    <input class="input-medium" type="text" name="ijin4no" value="<?=$dt['ijin4no']?>" />
                                </div>
                                <div class="span2" style="width:100px;">
                                    <input class="input-small" type="text" name="ijin4tgl" id="ijin4tgl" value="<?=$dt['ijin4tgl']?>" />
                                </div>
                                <div class="span2" style="width:100px;">
                                    <input class="input-small" type="text" name="ijin4tglakhir" id="ijin4tglakhir" value="<?=$dt['ijin4tglakhir']?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			<div class="row">
				<div style="width:420px" class="span6">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#"><strong>Objek Pajak</strong></a>
                        </li>
                    </ul>
                    
                    <div class="control-group">
                        <label class="control-label" for="op_nama">Nama Objek Pajak</label>
                        <div class="controls">
                            <input class="input" type="text" name="op_nama" id="op_nama" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="op_usaha_id">Jenis Usaha</label>
                        <div class="controls">
                            <?echo $select_op_usaha;?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="op_pajak_id">Jenis Pajak</label>
                        <div class="controls">
                            <?echo $select_op_pajak;?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="op_alamat">Alamat</label>
                        <div class="controls">
                            <textarea class="input-large" name="op_alamat" id="op_alamat" rows="1" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="op_kecamatan_id">Kecamatan</label>
                        <div class="controls">
                            <?echo $select_op_kecamatan;?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="op_kelurahan_id">Kelurahan</label>
                        <div class="controls">
                            <?echo $select_op_kelurahan;?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="op_latitude">Kordinat Peta</label>
                        <div class="controls">
                            <input class="input-small" type="text" name="op_latitude" id="op_latitude" />, 
                            <input class="input-small" type="text" name="op_longitude" id="op_longitude" />
                        </div>
                    </div>
                </div>
            </div>

			<div class="row">
				<div class="span10">
                    <div class="tabbable">
                        <ul id="myTab2" class="nav nav-tabs">
                            <li class="active"><a href="#kdrestoran" data-toggle="tab"><strong>Data Restoran</strong></a></li>
                            <!--li><a href="#kdwalet" data-toggle="tab"><strong>Data Walet</strong></a></li-->
                            <li><a href="#kdhiburan" data-toggle="tab"><strong>Data Hiburan</strong></a></li>
                            <li><a href="#kdhotel" data-toggle="tab"><strong>Data Hotel, Panti Pijat, Mandi Uap, Karaoke</strong></a></li>
                            <!--li><a href="#dok" data-toggle="tab"><strong>Dokumen Pendukung</strong></a></li-->
                        </ul>
                        
                        <div class="tab-content">
                            <!-- restoran -->
                            <div class="tab-pane fade in active" id="kdrestoran">
                                <div class="control-group">
                                    <label class="control-label">Jumlah Meja</label>
                                    <div class="controls">
                                        <input class="input-small" type="text" style="text-align:right;" name="kd_restojmlmeja" id="kd_restojmlmeja" value="<?=$dt['kd_restojmlmeja']?>" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Jumlah Kursi</label>
                                    <div class="controls">
                                        <input class="input-small" type="text" style="text-align:right;" name="kd_restojmlkursi" id="kd_restojmlkursi" value="<?=$dt['kd_restojmlkursi']?>" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Jumlah Tamu</label>
                                    <div class="controls">
                                        <input class="input-small" type="text" style="text-align:right;" name="kd_restojmltamu" id="kd_restojmltamu" value="<?=$dt['kd_restojmltamu']?>" />
                                    </div>
                                </div>
                            </div>
                            
                            <!-- walet -->
                            <!--div class="tab-pane fade in " id="kdwalet">
                                <div class="control-group">
                                    <label class="control-label">Volume</label>
                                    <div class="controls">
                                        <input class="input-small" type="text" style="text-align:right;" name="kd_waletvolume" id="kd_waletvolume" value="<?=$dt['kd_waletvolume']?>" />
                                    </div>
                                </div>
                            </div-->
                            
                            <!-- hiburan -->
                            <div class="tab-pane fade in " id="kdhiburan">
                                <div class="row">	
                                    <div class="span3" style="width:240px;">
                                        <div class="control-group">
                                            <label class="control-label"><b>Pertunjukan :</b></label>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Jumlah Kursi</label>
                                            <div class="controls">
                                                <input class="input-small" type="text" style="text-align:right;" name="kd_filmkursi" id="kd_filmkursi" value="<?=$dt['kd_filmkursi']?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Jumlah Pertunjukan</label>
                                            <div class="controls">
                                                <input class="input-small" type="text" style="text-align:right;" name="kd_filmpertunjukan" id="kd_filmpertunjukan" value="<?=$dt['kd_filmpertunjukan']?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Tarif Masuk</label>
                                            <div class="controls">
                                                <input class="input-small" type="text" style="text-align:right;" name="kd_filmtarif" id="kd_filmtarif" value="<?=$dt['kd_filmtarif']?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span3" style="width:240px;">
                                        <div class="control-group">
                                            <label class="control-label"><b>Bilyard :</b></label>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Jumlah Meja</label>
                                            <div class="controls">
                                                <input class="input-small" type="text" style="text-align:right;" name="kd_bilyarmeja" id="kd_bilyarmeja" value="<?=$dt['kd_bilyarmeja']?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Tarif</label>
                                            <div class="controls">
                                                <input class="input-small" type="text" style="text-align:right;" name="kd_bilyartarif" id="kd_bilyartarif" value="<?=$dt['kd_bilyartarif']?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Rata-rata Kegiatan</label>
                                            <div class="controls">
                                                <input class="input-small" type="text" style="text-align:right;" name="kd_bilyarkegiatan" id="kd_bilyarkegiatan" value="<?=$dt['kd_bilyarkegiatan']?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span3" style="width:240px;">
                                        <div class="control-group">
                                            <label class="control-label"><b>Diskotik, Club, dan Pertandingan :</b></label>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Pengunjung</label>
                                            <div class="controls">
                                                <input class="input-small" type="text" style="text-align:right;" name="kd_diskopengunjung" id="kd_diskopengunjung" value="<?=$dt['kd_diskopengunjung']?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Tarif</label>
                                            <div class="controls">
                                                <input class="input-small" type="text" style="text-align:right;" name="kd_diskotarif" id="kd_diskotarif" value="<?=$dt['kd_diskotarif']?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- hotel -->
                            <div class="tab-pane fade in " id="kdhotel">
                                <div class="row">
                                    <div class="span4" style="width: 370px; position: relative; ">
                                        <div id="nopd_processing" class="nopd_processing" style="display: none;">
                                            <img border="0" src="<?=base_url('assets/pad/img/ajax-loader-bert.gif')?>"></img>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Golongan/Kelas</label>
                                            <div class="controls">
                                                <input class="input" type="text" name="kdh_gol" id="kdh_gol" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Tarif</label>
                                            <div class="controls">
                                                <input class="input-small" type="text" style="text-align:right;" name="kdh_tarif" id="kdh_tarif" value=0 />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Jumlah Kamar</label>
                                            <div class="controls">
                                                <input class="input-mini" type="text" style="text-align:right;" name="kdh_kamar" id="kdh_kamar" value=0 />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Tamu per Hari</label>
                                            <div class="controls">
                                                <input class="input-mini" type="text" style="text-align:right;" name="kdh_tamu" id="kdh_tamu" value=0 />
                                            </div>
                                        </div>
                                        <p>&nbsp;</p>
                                        <button type="button" class="btn btn-success" id="btn_dth_new">Tambahkan ke Daftar</button>
                                    </div>
                                    <div class="span6">
                                        <table class="table" id="tableKD">
                                            <thead>
                                                <tr>
                                                    <th>Golongan/Kelas</th>
                                                    <th>Tarif</th>
                                                    <th>Kamar</th>
                                                    <th>Tamu</th>
                                                    <th>Batal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- dokumen pendukung -->
                            <!--div class="tab-pane fade in " id="dok">
                                <div class="control-group">
                                    <label class="control-label">Unggah Dokumen</label>
                                    <div class="controls">
                                        <input class="input" type="file" name="userfile[]" multiple />
                                    </div>
                                </div>
                                <p></p>
                                <div class="control-group">
                                    <label class="control-label">Unduh Dokumen</label>
                                    <div class="controls">
                                        <?
                                        if(count($dt['files']) > 0) {
                                            echo "<ol>";
                                            foreach($dt['files'] as $file)
                                                echo "<li>{$file}</li>";
                                            echo "</ol>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div-->
                        </div>
                    </div>
                </div>
            </div>
            

			<hr />
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button type="button" class="btn" id="btn_cancel">Batal / Kembali</button>
		<?php echo form_close();?>
	</div>
</div>
<? $this->load->view('_foot'); ?>
