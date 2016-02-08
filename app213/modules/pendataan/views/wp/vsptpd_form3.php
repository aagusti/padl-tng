<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/wp/_navbar'); ?>


<style>
	.form-control {
		height: 24px;
		padding: 0px 12px;
		font-size: 12px;
	}

	.form-group {
		margin-bottom: 5px;
	}

	.form-horizontal 
	.control-label {
		padding-top: 3px;
	}
</style>

<script>
/*
1. get wp
2. get usaha / cu
3. get/set masa
4. get/set jatuh tempo
5. get/set tarif
6.
*/

var global_cu_id ;
function get_pajak(cu_id) {
	$.ajax({
		url: "<?php echo active_module_url()?>sptpd/get_pajak/"+cu_id,
		async: false,
		success: function (data) {
			$('#pajak_id').html(data);
		},
		error: function (xhr, desc, er) {
			alert(er);
		}
	});
	global_cu_id = cu_id;
}



function set_so(type_id) {
	if (type_id == <?=pad_dok_self_id()?>)
		$('#so').val('S');
	else
		$('#so').val('O');
}

function get_pajak_detail() {
	var pajak_id = $('#pajak_id').val();
	var masadari = $('#masadari').val();
	if (masadari == '') {
		var sekarang = new Date();
		/*
		$('#masadari').val(sekarang.getDate()+"-"+sekarang.getMonth()+"-"+sekarang.getFullYear());
		masadari = $('#masadari').val();
		*/
		masadari = sekarang.getDate()+"-"+sekarang.getMonth()+"-"+sekarang.getFullYear();
	}

	$.ajax({
		url: "<?php echo active_module_url()?>sptpd/get_pajak_detail/"+pajak_id+"/"+masadari,
		async: false,
		success: function (j) {
			var data = $.parseJSON(j);

			var tarif = parseFloat(data['tarif']);
			var cu_id = parseInt(data['cu_id']);
			$('#tarif').autoNumeric('set', tarif);
			
			$('#minimal_omset').val(data['minimal_omset']);
			$('#r_bayarid').val(data['masapajak']);
			$('#r_nsr').val(data['reklame']);
			$('#m_njop').val(data['reklame']);
			$('#kode').val(data['kode']);
			$('#rekening_id').val(data['rekening_id']);
			$('#jatuhtempo').val(data['jatuhtempo']);

		},
		error: function (xhr, desc, er) {
			alert(er);
		}
	});

	$.ajax({
		url: "<?php echo active_module_url()?>sptpd/get_pajak/"+global_cu_id+"/"+pajak_id,
		async: false,
		success: function (data) {
			$('#pajak_id').html(data);
		},
		error: function (xhr, desc, er) {
			alert(er);
		}
	});

}

function hitung_pajak() {
	var minimal_omset   = parseFloat($('#dasar').val());
	minimal_omset       = isNaN(minimal_omset) ? 0 : minimal_omset;
	var dasar      = parseFloat($('#dasar').autoNumeric('get'));
	dasar          = isNaN(dasar) ? 0 : dasar;
	var tarif      = parseFloat($('#tarif').autoNumeric('get'));
	tarif          = isNaN(tarif) ? 0 : tarif;
	var denda      = parseFloat($('#denda').autoNumeric('get'));
	denda          = isNaN(denda) ? 0 : denda;
	var bunga      = parseFloat($('#bunga').autoNumeric('get'));
	bunga          = isNaN(bunga) ? 0 : bunga;
	var setoran    = parseFloat($('#setoran').autoNumeric('get'));
	setoran        = isNaN(setoran) ? 0 : setoran;
	var lain2      = parseFloat($('#lain2').autoNumeric('get'));
	lain2          = isNaN(lain2) ? 0 : lain2;
	var kompensasi = parseFloat($('#kompensasi').autoNumeric('get'));
	kompensasi     = isNaN(kompensasi) ? 0 : kompensasi;
	var kenaikan   = parseFloat($('#kenaikan').autoNumeric('get'));
	kenaikan       = isNaN(kenaikan) ? 0 : kenaikan;

	var pajak = (dasar*tarif) + denda + bunga + kenaikan + lain2 - setoran - kompensasi;
	pajak = Math.round(pajak);

	if (dasar < minimal_omset)
		$('#pajak').autoNumeric('set', 0);
	else
		$('#pajak').autoNumeric('set', pajak);
}


function hitung_dasar() {
	var omset=[31];
	var dasar = 0;
	for(var i=1; i<=31; i++){
	omset[i] =parseFloat($('#omset'+i).autoNumeric('get'));
	dasar += omset[i] << 0;
	}
	if (dasar > 0 )
		document.getElementById("dasar").readOnly = true;
	else
		document.getElementById("dasar").readOnly = false;
	$('#dasar').autoNumeric('set', dasar);
}


<!-- // -->
var mID;
var cuID;
var oTable;

$(window).load(function(){ 
		hitung_dasar();
 });

$(document).ready(function() {
	function get_cu(customer_id, cu_id) {
		$.ajax({
			url: "<?php echo active_module_url()?>sptpd/get_cu/"+customer_id+"/"+cu_id,
			async: false,
			success: function (j) {
				var data = $.parseJSON(j);
				$("#npwpd").val(data['npwpd']);
				$("#customer_id").val(data['customer_id']);
				$("#nama").val(data['customernm']);
				/* $("#customer_usaha_id").val(data['customer_usaha_id']); */
				$("#so").val(data['so']);
				
				/* $('#usaha_id').html(data['usaha']); //change to */
				$('#customer_usaha_id').html(data['usaha']);
				$("#customer_usaha_id option").not(":selected").attr("disabled", "disabled");
			},
			error: function (xhr, desc, er) {
				alert(er);
			}
		});
	}

	function set_jatuh_tempo() {
		if ($('#masadari').val() == '' || $('#terimatgl').val() == '') return;
		
		var jt = parseInt($('#jatuhtempo').val());
		var masadari = masadari_dtp.date;
		var tetap_tgl = terimatgl_dtp.date;
		switch (jt) {
			/* jatuh tempo akhir bulan masa + 1 */
			case 0:
			jtp = new Date(masadari.getFullYear(), masadari.getMonth()+2, 1)-1;
			jatuhtempotgl_dtp.setValue(jtp);
			jatuhtempotgl_dtp.update();
			break;
			/* 30 hari dari tgl terima/tetap */
			case 1:
			jtp = new Date(tetap_tgl.getFullYear(), tetap_tgl.getMonth(), tetap_tgl.getDate() +30);
			jatuhtempotgl_dtp.setValue(jtp);
			jatuhtempotgl_dtp.update();
			break;
		}

		/* adjusment tgl jatuh tempo */
		var jtp_tgl = new Date(jtp); /* jatuhtempotgl_dtp.date; */
		var jtp_self = <?=pad_spt_due_date();?>;
		var day_in_month = new Date(jtp_tgl.getFullYear(), jtp_tgl.getMonth() + 1, 0);
		if(jtp_self > day_in_month) jtp_self = day_in_month;
		if ($('#kode').val() != '41107') {
			if ($('#so').val() == 'S') {
				jtp = new Date(jtp_tgl.getFullYear(), jtp_tgl.getMonth(), jtp_self);
				jatuhtempotgl_dtp.setValue(jtp);
				jatuhtempotgl_dtp.update();
			}

			jtp_tgl = jatuhtempotgl_dtp.date;
			if (jtp_tgl.getDay() == 6) {
				jtp = new Date(jtp_tgl.getFullYear(), jtp_tgl.getMonth(), jtp_tgl.getDate()+2);
				jatuhtempotgl_dtp.setValue(jtp);
				jatuhtempotgl_dtp.update();
			}
			if (jtp_tgl.getDay() == 0) {
				jtp = new Date(jtp_tgl.getFullYear(), jtp_tgl.getMonth(), jtp_tgl.getDate()+1);
				jatuhtempotgl_dtp.setValue(jtp);
				jatuhtempotgl_dtp.update();
			}
		}
	}

	function set_masa_sd() {
		if ($('#masadari').val() == '') return;
		
		var masa_pajak = parseInt($('#r_bayarid').val());
		var masadari = masadari_dtp.date;

		switch (masa_pajak) {
			/* tahunan */
			case 1:
			masa_sd = new Date(masadari.getFullYear()+1, masadari.getMonth(), masadari.getDate())-1;
			masasd_dtp.setValue(masa_sd);
			masasd_dtp.update();
			break;
			/* semesteran */
			case 2:
			masa_sd = new Date(masadari.getFullYear(), masadari.getMonth()+6, masadari.getDate())-1;
			masasd_dtp.setValue(masa_sd);
			masasd_dtp.update();
			break;
			/* triwulanan */
			case 3:
			masa_sd = new Date(masadari.getFullYear(), masadari.getMonth()+3, masadari.getDate())-1;
			masasd_dtp.setValue(masa_sd);
			masasd_dtp.update();
			break;
			/* bulanan */
			case 4:
			masa_sd = new Date(masadari.getFullYear(), masadari.getMonth()+1, masadari.getDate())-1;
			masasd_dtp.setValue(masa_sd);
			masasd_dtp.update();
			break;
			/* mingguan */
			case 5:
			masa_sd = new Date(masadari.getFullYear(), masadari.getMonth(), masadari.getDate()+7);
			masasd_dtp.setValue(masa_sd);
			masasd_dtp.update();
			break;
			/* harian */
			case 6:
			masa_sd = new Date(masadari.getFullYear(), masadari.getMonth(), masadari.getDate()+1);
			masasd_dtp.setValue(masa_sd);
			masasd_dtp.update();
			break;
		}
	}

	oTable = $('#table_dlg1').dataTable({
		"iDisplayLength": 9,
		"bJQueryUI": true,
		"bAutoWidth": false,
		"sPaginationType": "full_numbers",
		"sDom": '<"toolbar">frtip',
		"aaSorting": [[ 0, "desc" ]],
		"aoColumnDefs": [			
		{ "aTargets": [0], "bSearchable": false, "bVisible": false, "sWidth": "", "sClass": "" },
		{ "aTargets": [6], "bSearchable": false, "bVisible": false, "sWidth": "", "sClass": "" },

		],
		"fnRowCallback": function (nRow, aData, iDisplayIndex) {
			$(nRow).on("click", function (event) {
				if ($(this).hasClass('row_selected')) {
					mID = ''; cuID = '';
					$(this).removeClass('row_selected');
				} else {
					var data = oTable.fnGetData( this );
					mID = data[0];
					cuID = data[6];
					
					oTable.$('tr.row_selected').removeClass('row_selected');
					$(this).addClass('row_selected');
				}
			})
		},
		"fnDrawCallback": function( oSettings ) {
			mID = ''; cuID = '';
		},
		"oLanguage": {
			"sProcessing":   "<i class='fa fa-refresh fa-spin' style='font-size: 70px;'></i>",
			"sLengthMenu":   "Tampilkan _MENU_ entri",
			"sZeroRecords":  "Tidak ada data",
			"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
			"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
			"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
			"sInfoPostFix":  "",
			"sSearch":       "Cari : ",
			"sUrl":          "",
			"oPaginate": {
				"sFirst":    "&laquo;",
				"sPrevious": "&lsaquo;",
				"sNext":     "&rsaquo;",
				"sLast":     "&raquo;",
			}
		},
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "<?=active_module_url('subjek_pajak/grid_for_spt/'.$this->uri->segment(4));?>"
	});
var tb_array = [
'<br>'
];
var tb = tb_array.join(' ');	
$("div.toolbar").html(tb);

$('#btn_cancel').click(function() {
	window.location = '<?=active_module_url($this->uri->segment(2));?>';
});

$('#btn_dialog_ok').click(function() {
	if (mID == '' || mID == null)
		alert('Data belum dipilih.');
	else {
		get_cu(mID, cuID);
		$('#customer_usaha_id').trigger('change');
		/* get_pajak_detail(); */

		$('#cuDialog').modal('hide');
	}
});

$('#dasar, #denda, #bunga, #setoran, #kenaikan, #kompensasi, #lain2, #pajak').autoNumeric('init', {
	aSep: '.', aDec: ',', vMax: '999999999999.99',  mDec: '0'
});
$('#tarif').autoNumeric('init', {aSep: '.', aDec: ',', vMax: '999999999999.99'});

$('#dasar, #denda, #bunga, #setoran, #kenaikan, #kompensasi, #lain2, #pajak, #tarif').keyup(function() {
	hitung_pajak();
});

for(var i=1; i<=31; i++){ 
$('#omset'+i).keyup(function() {
	hitung_dasar();
	hitung_pajak();
});

$('#omset'+i).autoNumeric('init', {
	aSep: '.', aDec: ',', vMax: '999999999999.99',  mDec: '0'
	});

}

$('#customer_usaha_id').change(function() {
	get_pajak(this.value);
	get_pajak_detail();

	set_masa_sd();
	set_jatuh_tempo();
	hitung_pajak();
});

$('#pajak_id').change(function() {
	get_pajak_detail();

	set_masa_sd();
	set_jatuh_tempo();
	hitung_pajak();
});

$('#nopd').typeahead({
	source: function(query, process){
		$.getJSON('<?=active_module_url('objek_pajak/get_typeahead_nopd/'.$this->uri->segment(4));?>'+query, function(response) {
			var data = new Array;
			for(var i in response) {
				data.push(response[i]['id'] +"#"+ response[i]['nopd'] +"#"+ response[i]['customer_id'] +"#"+ response[i]['usaha_id'] +"#"+ response[i]['customernm'] +"#"+ response[i]['usahanm']);
			}
			return process(data);
		});
	},
	matcher: function (item) {
		var parts = item.split('#');
		return parts[1].toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1;
	},
	highlighter: function(item) {
		var parts = item.split('#'),        
		regex = new RegExp('(' + this.query + ')', 'i'),
		nopd = parts[1].replace(regex, "<strong>$1</strong>"),
		html = '<div class="typeahead">';

		html += '<div class="left">';
		html += '<div>'+nopd+'</div>';
		html += '<div>'+parts[4]+' - '+parts[5]+'</div>';
		html += '</div>';
		html += '<div class="clear"></div>';
		html += '</div>';
		return html;
	},
	updater: function(item) {
		var parts = item.split('#');

		get_cu(parts[2], parts[0]);		
		$('#customer_usaha_id').trigger('change');
		get_pajak_detail();

		return parts[1];
	},
});

var terimatgl_dtp = $('#terimatgl').datepicker({
	format: 'dd-mm-yyyy'
}).on('changeDate', function(ev) {
	set_jatuh_tempo();
	terimatgl_dtp.hide();
}).data('datepicker');

var masadari_dtp = $('#masadari').datepicker({
	format: 'dd-mm-yyyy'
}).on('changeDate', function(ev) {
		/* set_masa_sd();
		set_jatuh_tempo(); */
		$('#pajak_id').trigger('change');
		masadari_dtp.hide();
	}).data('datepicker');

var masasd_dtp = $('#masasd').datepicker({
	format: 'dd-mm-yyyy'
}).on('changeDate', function(ev) {
	masasd_dtp.hide();
}).data('datepicker');

var jatuhtempotgl_dtp = $('#jatuhtempotgl').datepicker({
	format: 'dd-mm-yyyy'
}).on('changeDate', function(ev) {
	jatuhtempotgl_dtp.hide();
}).data('datepicker');

    // Don't allow direct editing
    $('#terimatgl, #masadari, #masasd, #jatuhtempotgl').on('keypress', function(e) {
    	e.preventDefault();
    });
    
    /* init page */
    var c_id  = parseInt(<?=$dt['customer_id']?>);
    var cu_id = parseInt(<?=$this->uri->segment(4);?>);
    if (!isNaN(c_id)) {
    	get_cu(c_id, cu_id);
    	hitung_pajak();
    }
});

$(document).keypress(function(event){
	if (event.which == '13') {
		event.preventDefault();
	}
});

</script>

	<div class="container-fluid">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#"><strong><? echo $this->uri->segment(2) == 'sptpd' ? 'PENDATAAN - SPTPD' : 'PENETAPAN - SK'; ?></strong></a>
			</li>
		</ul>

		<?php
		if(validation_errors()){
			echo '<blockquote><strong>Harap melengkapi data berikut :</strong>';
			echo validation_errors('<small>','</small>');
			echo '</blockquote>';
		}
		?>

		<?php echo form_open($faction, array('id'=>'myform','class'=>'form-horizontal', 'enctype'=>'multipart/form-data'));?>
			
	<!-- Modal -->
		<div id="cuDialog" class="modal in" style="padding-right:40%;">
		<div class="modal-dialog" style="width:60%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"> OMSET BULAN : </h4>
				</div>
				<div class="modal-body col-sm-12">
					<div class="col-sm-6">
						<p>&nbsp;</p>
						<div style="text-align:center;"  class="col-sm-2" >
							<strong> Tanggal </strong>
						</div>
						<div style="text-align:center;" class="col-sm-5" >
							<strong>Omset</strong>
						</div>
						<div style="text-align:center;"  class="col-sm-5" >
							<strong>Keterangan</strong>
						</div>
						<!-- Omset 31 Hari -->
						<? for ($i=1; $i<=16; $i++) { ?>
						<div style="text-align:center;"class="col-sm-2" >
							<?echo $i; ?>
						</div>

						<div class="row col-sm-4" >
							<div class="form-group">
								<div class="col-sm-12">
								<input class="form-control" type="text" style="text-align:right;" name="omset<?echo $i?>" id="omset<?echo$i?>" value="<?=$dt['omset'.$i]?>"  />
								</div>
							</div>
						</div>		
						<div class="row col-sm-6" >
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" type="text" style="text-align:right;" name="keterangan<?echo $i?>" id="keterangan<?echo $i?>" value="<?=$dt['keterangan'.$i]?>" />
								</div>
							</div>
						</div>	
						<? } ?>	
					</div>

					<div class="col-sm-6">
						<p>&nbsp;</p>
						<div style="text-align:center;"  class="col-sm-2" >
							<strong> Tanggal </strong>
						</div>
						<div style="text-align:center;" class="col-sm-5" >
							<strong>Omset</strong>
						</div>
						<div style="text-align:center;"  class="col-sm-5" >
							<strong>Keterangan</strong>
						</div>
						<!-- Omset 31 Hari -->
						<? for ($i=17; $i<=31; $i++) { ?>
						<div style="text-align:center;"class="col-sm-2" >
							<?echo $i; ?>
						</div>

						<div class="row col-sm-4" >
							<div class="form-group">
								<div class="col-sm-12">
								<input class="form-control" type="text" style="text-align:right;" name="omset<?echo $i?>" id="omset<?echo$i?>" value="<?=$dt['omset'.$i]?>"  />
								</div>
							</div>
						</div>		
						<div class="row col-sm-6" >
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" type="text" style="text-align:right;" name="keterangan<?echo $i?>" id="keterangan<?echo $i?>" value="<?=$dt['keterangan'.$i]?>" />
								</div>
							</div>
						</div>	
						<? } ?>	
					</div>
					<div class="col-sm-6">
						&nbsp;
					</div>
					<div class="col-sm-6">
							<div class="col-sm-6">
							<b>TOTAL OMSET (DASAR) : </b>
							</div>
					
							<div class="col-sm-5">
							<div class="col-sm-12">
							<input class="form-control" type="text" style="text-align:right;" name="dasar_temp" id="dasar_temp" value="<?=$dt['dasar']?>" readonly />
							</div>
							</div>
					</div>		
				</div>
				<p>&nbsp;</p>		
				<div class="col-sm-6">	
				&nbsp;
				</div>		
				<div class="modal-footer col-sm-6">
					<button class="btn btn-primary" data-dismiss="modal" >OK!</button>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
				</div>
				</div>
			</div>
		</div>
		<p>&nbsp;</p>
		<div class="box box-primary box-solid">
		<div class="box-header with-border">
				
		<h3 class="box-title">Rincian Pendataan : <text id="display_nama"></text> </h3>

			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">

			<input class="form-control" type="hidden" name="id" value="<?=$dt['id']?>" placeholder="spt_id"/>
			<input class="form-control" type="hidden" name="so" id="so" value="<?=$dt['so']?>" placeholder="so"/>
			<input class="form-control" type="hidden" name="customer_id" id="customer_id" value="<?=$dt['customer_id']?>" placeholder="c_id"/>
			<!--input class="form-control" type="hidden" name="customer_usaha_id" id="customer_usaha_id" value="<?=$dt['customer_usaha_id']?>" placeholder="cu_id"/-->
			<input class="form-control" type="hidden" name="r_bayarid" id="r_bayarid" value="<?=$dt['r_bayarid']?>" placeholder="r_bayarid" />
			<input class="form-control" type="hidden" name="minimal_omset" id="minimal_omset" value="<?=$dt['minimal_omset']?>" placeholder="minimal_omset" />
			<!--input class="form-control" type="hidden" name="r_nsr" id="r_nsr" value="<?=$dt['r_nsr']?>" placeholder="r_nsr" /-->
			<input class="form-control" type="hidden" name="rekening_id" id="rekening_id" value="<?=$dt['rekening_id']?>" placeholder="rekening_id" />
			<input class="form-control" type="hidden" name="kode" id="kode" value="<?=$dt['kode']?>" placeholder="kode" />
			<input class="form-control" type="hidden" name="jatuhtempo" id="jatuhtempo" value="<?=$dt['jatuhtempo']?>" placeholder="jatuhtempo" />
            <input class="form-control" type="hidden" name="multiple" id="multiple" value="<?=$dt['multiple']?>" readonly />
			<input class="form-control" type="hidden" name="usaha_id" id="usaha_id" />

			<div class="row"> 
			<p> &nbsp; </p>
			<div class="form-group">
				<label class="control-label col-sm-2" for="sptno">No. SPTPD</label>
				<div class="col-sm-1">
					<input class="form-control" type="text" name="tahun" id="tahun" value="<?=$dt['tahun']?>" readonly />
				</div>	
				<div class="col-sm-2">	
					<input class="form-control" type="text" name="sptno" id="sptno" value="<?=$dt['sptno']?>" readonly />
					<input class="form-control" type="hidden" name="sptno_lengkap" id="sptno_lengkap" value="<?=$dt['sptno']?>" readonly />
						
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="terimatgl">Tanggal Terima</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="terimatgl" id="terimatgl" value="<?=$dt['terimatgl']?>" autocomplete="off" />
					<span class="hide">&nbsp;&nbsp;&nbsp;Jenis Dokumen&nbsp;<?=$select_sptpd_type;?></span>
				</div>
			</div>
			<!--div class="form-group">
				<label class="control-label col-sm-2" for="nopd">NOPD</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="nopd" id="nopd" value="<?=$dt['nopd']?>" placeholder="NOPD" autocomplete="off" />
				</div>
			</div-->
			<div class="form-group hide">
				<label class="control-label col-sm-2" for="npwpd">NPWPD/Subjek Pajak</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="npwpd" id="npwpd" value="" placeholder="NPWPD" autocomplete="off"  readonly />
					<input class="form-control" type="text" name="nama" id="nama" value="" placeholder="Nama Subjek Pajak" autocomplete="off"  readonly />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="customer_usaha_id">NOPD/Objek Pajak</label>
				<div class="col-sm-3">
					<!-- nopd khusus wp -->
					<input class="form-control" type="text" name="nopd" id="nopd" value="<?=$dt['nopd']?>" placeholder="NOPD" autocomplete="off" readonly />
					<?=$select_usaha;?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="pajak_id">Jenis Pajak</label>
				<div class="col-sm-3">
					<?=$select_pajak;?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="cara_bayar">Cara Bayar</label>
				<div class="col-sm-2">
					<select class="form-control" name="cara_bayar" id="cara_bayar">
						<option value=2> Teller </option>
						<option value=1 > Transfer </option>
						<option value=3> ATM </option>
 
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2"  for="masapajak_bulan">Masa Pajak</label>
		        <div class="col-sm-2">
		           <input class="form-control" type="text" name="masapajak_bulan" id="masapajak_bulan" value="<?=$dt['masapajak_bulan']?>" placeholder="mm-yyyy" required/>
		        </div>
				<label class="control-label col-sm-2 hide" for="masadari">Masa Pajak</label>
				<div class="col-sm-2 ">
					<input class="form-control" type="text" name="masadari" id="masadari" value="<?=$dt['masadari']?>" placeholder="dd-mm-yyyy" readonly required/> 
				</div>
				<label class="control-label col-sm-1 hide" for="masasd">s/d</label>
				<div class="col-sm-2 ">
					<input class="form-control" type="text" name="masasd" id="masasd" value="<?=$dt['masasd']?>" placeholder="dd-mm-yyyy" readonly required/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="jatuhtempotgl">Jatuh Tempo</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="jatuhtempotgl" id="jatuhtempotgl" value="<?=$dt['jatuhtempotgl']?>" placeholder="dd-mm-yyyy" readonly required/>
				</div>
			</div>
			<br>
			<div class="form-group">
				<label class="control-label col-sm-2" for="masadari">&nbsp;</label>
				<div class="col-sm-6">
                    <label style="color:red">* Pastikan mengisi masa pajak dengan benar!</label>
				</div>
			</div>
			</div>
		</div>
		</div>

			<div class="tabbable col-sm-12">
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#perhitungan" data-toggle="tab"><strong>Perhitungan</strong></a></li>
					<li><a href="#dok" data-toggle="tab"><strong>Dokumen Pendukung</strong></a></li>
				</ul>

			<br>
			<div class="box box-primary box-solid">
			<div class="box-body">
			<div class="row">
				
				<div class="tab-content">
					<div class="tab-pane fade in active" id="perhitungan">
						<div class="row col-sm-12">	
						<p>&nbsp;</p>
							<div class="row col-sm-6">
								<div class="form-group">
									<label class="control-label col-sm-4" for="dasar">Dasar</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" style="text-align:right;" name="dasar" id="dasar" value="<?=$dt['dasar']?>" readonly />
										<input class="form-control" type="hidden" style="text-align:right;" name="dasar_view" id="dasar_view" readonly />
											
									</div>
									<div class="col-sm-2">
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#cuDialog">Input Omset</button>
									</div>
								</div>	
								<div class="form-group">
									<label class="control-label col-sm-4" for="tarif">Tarif</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" style="text-align:right;" name="tarif" id="tarif" value="<?=$dt['tarif']?>" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="tarif">Tarif</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" style="text-align:right;" name="view_tarif" id="view_tarif" value="<?=$dt['tarif']*100?>" readonly />
									</div>
									<div class="col-sm-1">
										 % 
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="denda">Denda</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" style="text-align:right;" name="view_denda" id="view_denda" value="<?=$dt['denda']?>" readonly />
									</div>
									<div class="col-sm-1">
										 % 
									</div>		
									<div class="col-sm-3">
										<input class="form-control" type="text" style="text-align:right;" name="denda" id="denda" value="<?=$dt['denda']?>" readonly />
									</div>
								</div>

								<div class="form-group">		
									<label class="control-label col-sm-4" for="pajak"><strong>Pajak Terhutang</strong></label>
									<div class="col-sm-6">
										<input class="form-control"  type="text" style="text-align:right;" name="pajak" id="pajak" readonly />
									</div>
								</div>	


								<div class="form-group">		
									<label class="control-label col-sm-4" for="total_bayar"><strong>Total Bayar</strong></label>
									<div class="col-sm-6">
										<input class="form-control"  type="text" style="text-align:right;" name="total_bayar" id="total_bayar" readonly />
									</div>
								</div>	

							</div>	
						</div>	
					</div>
						
				<div class="tab-pane fade in " id="omset">
				</div>

							<div class="hide">
								<div class="row col-sm-4" >
									<div class="form-group">
										<label class="control-label col-sm-2" for="bunga">Denda</label>
										<div class="col-sm-2">
											<input class="form-control" type="text" style="text-align:right;" name="bunga" id="bunga" value="<?=$dt['bunga']?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="setoran">Setoran</label>
										<div class="col-sm-2">
											<input class="form-control" type="text" style="text-align:right;" name="setoran" id="setoran" value="<?=$dt['setoran']?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="lain2">Lain-lain</label>
										<div class="col-sm-2">
											<input class="form-control" type="text" style="text-align:right;" name="lain2" id="lain2" value="<?=$dt['lain2']?>" />
										</div>
									</div>
								</div>
								<div class="row col-sm-4" >
									<div class="form-group">
										<label class="control-label col-sm-2" for="kenaikan">Kenaikan</label>
										<div class="col-sm-2">
											<input class="form-control" type="text" style="text-align:right;" name="kenaikan" id="kenaikan" value="<?=$dt['kenaikan']?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="kompensasi">Kompensasi</label>
										<div class="col-sm-2">
											<input class="form-control" type="text" style="text-align:right;" name="kompensasi" id="kompensasi" value="<?=$dt['kompensasi']?>" />
										</div>
									</div>
								</div>
							</div>
					
					<!-- dokumen pendukung -->
					<div class="tab-pane fade in " id="dok">
						<div class="form-group">
							<label class="control-label col-sm-2">Unggah Dokumen</label>
							<div class="col-sm-2">
								<input class="input" type="file" name="userfile[]" multiple />
							</div>
						</div>
						<p></p>
						<div class="form-group">
							<label class="control-label col-sm-2">Unduh Dokumen</label>
							<div class="col-sm-2">
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
					</div>

				</div>
			<div class="col-sm-12" >	
			<div class="col-sm-12" >
			<div class="row col-sm-6" >


			<div id="msg_confirm" class="hide">
			<p>&nbsp;</p>
				<div class="alert alert-error">
					Bersama ini Anda telah menyatakan bahwa data yang sampaikan adalah data yang sebenarnya dan valid. <br />
					Beri tanda centang pada kolom di sebelah ini jika Anda menyetujuinya. <input id="submit_ok" type="checkbox">
				</div>
				<hr />
			</div>
			</div>	
			<div class="col-sm-12" >		
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button type="button" class="btn" id="btn_cancel">Batal / Kembali</button>
			</div>
			</div>
			</div>
</div>
</div>

		<?php echo form_close();?>
</div>
</div>
<? $this->load->view('_foot'); ?>
