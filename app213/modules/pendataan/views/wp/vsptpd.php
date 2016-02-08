<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/wp/_navbar'); ?>

<style>

.btn-group, .btn-group-vertical {
    bottom: -10px;
}

.dataTable {
    font-size: 11px;
}
</style>

<script>
$.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
{
	if ( typeof sNewSource != 'undefined' && sNewSource != null ) {
		oSettings.sAjaxSource = sNewSource;
	}

	/* Server-side processing should just call fnDraw */
	if ( oSettings.oFeatures.bServerSide ) {
		this.fnDraw();
		return;
	}

	this.oApi._fnProcessingDisplay( oSettings, true );
	var that = this;
	var iStart = oSettings._iDisplayStart;
	var aData = [];

	this.oApi._fnServerParams( oSettings, aData );

	oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
		/* Clear the old information from the table */
		that.oApi._fnClearTable( oSettings );

		/* Got the data - add it to the table */
		var aData =  (oSettings.sAjaxDataProp !== "") ?
			that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;

		for ( var i=0 ; i<aData.length ; i++ )
		{
			that.oApi._fnAddData( oSettings, aData[i] );
		}

		oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();

		if ( typeof bStandingRedraw != 'undefined' && bStandingRedraw === true )
		{
			oSettings._iDisplayStart = iStart;
			that.fnDraw( false );
		}
		else
		{
			that.fnDraw();
		}

		that.oApi._fnProcessingDisplay( oSettings, false );

		/* Callback user function - for event handlers etc */
		if ( typeof fnCallback == 'function' && fnCallback != null )
		{
			fnCallback( oSettings );
		}
	}, oSettings );
};

function show_rpt(rpt){
	var rptparams;
	switch(rpt) {		
		case 'sptpd_tr':
			rptparams = {
				rpt: rpt,
				t: $("#type_id").val(),
				u:  $("#usaha_id").val(),
				w: <?=$this->session->userdata('wp_id');?>,
			}
			break;
		case 'sptpd_sspd':
			rptparams = {
				rpt: rpt,
				no: mID,
				val: nPajak,
			}
			break;
		case 'sptpd_omset':
			rptparams = {
				rpt: rpt,
				no: mID,
				val: nPajak,
			}
			break;
		default:
			rptparams = {
				rpt: rpt,
				nama: "khairul anwar",
			}
	}
	
	/* 
	var data = $.param(rptparams);
	var data = encodeURIComponent(decodeURIComponent($.param(rptparams)));
	*/
	var data = decodeURIComponent($.param(rptparams));
	/*var url  = '<?=active_module_url($this->router->fetch_class());?>show_rpt/?'+data;*/
	var url  = '<?=active_module_url($this->router->fetch_class());?>cetak/pdf/?'+data;
	
	var winparams = 'width='+screen.width+',height='+screen.height+',directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=no,resizable=no';
	window.open(url, 'Laporan', winparams);
}

function reload_grid() {
	var type_id  = $('#type_id').val();
	var usaha_id = $('#usaha_id').val();
	var bayar_id = $('#bayar_id').val();
	var validasi_id = $('#validasi_id').val();


	oTable.fnReloadAjax("<? echo active_module_url($controller); ?>grid/"+type_id+"/"+usaha_id+"/"+bayar_id+"/"+validasi_id);
}

function convertToRupiah(nStr) {
   nStr += '';
   x = nStr.split('.');
   x1 = x[0];
   x2 = x.length > 1 ? '.' + x[1] : '';
   var rgx = /(\d+)(\d{3})/;
   while (rgx.test(x1))
   {
      x1 = x1.replace(rgx, '$1' + '.' + '$2');
   }
   return "Rp. " + x1 + x2;
}



var mID;
var uID;
var tID;
var nPajak;
var oTable;

$(document).ready(function() {	
	oTable = $('#table1').dataTable({
		"iDisplayLength": 13,
		"bJQueryUI": true,
		"bAutoWidth": false,
		"sPaginationType": "full_numbers",
		"sDom": '<"toolbar">frtip',
		"aaSorting": [[ 0, "desc" ]],
		"aoColumnDefs": [
			{ "aTargets": [0], "bSearchable": false, "bVisible": false, "sWidth": "", "sClass": "" },
			{ "aTargets": [1], "bSearchable": true,  "bVisible": true,  "sWidth": "80px", "sClass": "center" },
			{ "aTargets": [2], "bSearchable": true,  "bVisible": true,  "sWidth": "70px", "sClass": "center" },
			{ "aTargets": [3], "bSearchable": false,  "bVisible": false,  "sWidth": "60px", "sClass": "" },
			
			{ "aTargets": [5], "bSearchable": true,  "bVisible": true,  "sWidth": "150px", "sClass": "" },
			{ "aTargets": [6], "bSearchable": true,  "bVisible": true,  "sWidth": "150px", "sClass": "" },
			{ "aTargets": [7], "bSearchable": true,  "bVisible": true,  "sWidth": "100px", "sClass": "right" },
			{ "aTargets": [8], "bSearchable": false,  "bVisible": true,  "sWidth": "100px", "sClass": "right" },
			{ "aTargets": [9], "bSearchable": true,  "bVisible": true,  "sWidth": "80px", "sClass": "" },
			{ "aTargets": [10], "bSearchable": false,  "bVisible": true,  "sWidth": "100px", "sClass": "center" },
			{ "aTargets": [11], "bSearchable": false,  "bVisible": true,  "sWidth": "70px", "sClass": "right" },
			{ "aTargets": [13], "bSearchable": false,  "bVisible": true,  "sWidth": "100px", "sClass": "right" },
			{ "aTargets": [14], "bSearchable": false,  "bVisible": true,  "sWidth": "100px", "sClass": "right" },
			{ "aTargets": [15], "bSearchable": false, "bVisible": false, "sWidth": "", "sClass": "" },
			{ "aTargets": [16], "bSearchable": false, "bVisible": false, "sWidth": "", "sClass": "" },
		],
		"fnRowCallback": function (nRow, aData, iDisplayIndex) {
			$(nRow).on("click", function (event) {
				if ($(this).hasClass('row_selected')) {
					mID = '';
					$(this).removeClass('row_selected');
				} else {
					var data = oTable.fnGetData( this );
					mID = data[0];
					no_bayar = data[1];
					nPajak = data[10];
					uID = data[15];
					tID = data[16];
					
					oTable.$('tr.row_selected').removeClass('row_selected');
					$(this).addClass('row_selected');
				}
			})
		},
		"fnDrawCallback": function( oSettings ) {
			mID = ''; nPajak = 0;
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
		"sAjaxSource": "<? echo active_module_url($controller); ?>grid/"
	}); 
	
	/* Get the rows which are currently selected */
	function fnGetSelected( oTableLocal )
	{
		return oTableLocal.$('tr.row_selected');
	}
	
	 /*
	$(window).resize(function() {
		oTable.fnAdjustColumnSizing();
	});
	*/
	
	var tb_array = [
		'<div class="btn-group pull-left">',
		'	<button id="add_self" class="btn btn-primary">Tambah</span></button>',
		'	<button id="btn_edit" class="btn">Edit</button>',
		'	<button id="btn_delete" class="btn">Hapus</button>',
		'</div>',
		<? if ($this->uri->segment(2) != 'sptpd') : ?>
		'<div class="btn-group pull-left">',
		'	<button id="btn_proses" data-loading-text="Proses <img border=\'0\' src=\'<?=base_url('assets/pad/img/ajax-loader-fb-white.gif')?>\' />" class="btn btn-success">Proses</button>',
		'	<button id="btn_recall" data-loading-text="Recall <img border=\'0\' src=\'<?=base_url('assets/pad/img/ajax-loader-fb-white.gif')?>\' />" class="btn btn-warning">Recall</button>',
		'</div>',
		<? endif; ?>
		'<div class="btn-group pull-left">',
		'	<button id="btn_dialog_validasi" class="btn btn-success">Validasi Data</button>',
		'	<button id="btn_rpt_sspd" data-rpt="sptpd_sspd" class="btn btn-info"><i class="fa fa-print"></i> Cetak Nomor Bayar</button>',
		'	<button id="btn_rpt_sptpd" data-rpt="sptpd_tr" class="btn btn-info"><i class="fa fa-print"></i> Cetak Transaksi</button>',
		'	<button id="btn_rpt_omset" data-rpt="sptpd_omset" class="btn btn-info"><i class="fa fa-print"></i> Omset (PDF)</button>',
		'	<button id="btn_rpt_omset_excel" class="btn btn-success"><i class="fa fa-print"></i> Omset (XLS)</button>',
		'	<button id="btn_dokumen" class="btn btn-info"><i class="fa fa-download"></i> Dowload Dok.</button>',


		'</div>',
		'<div class="btn-group pull-left hide">',
		'<?=$select_sptpd_type;?>',
		'</div>',
		'<div class="col-sm-12"><p></p>',
		'</div>',
		'<div class="btn-group pull-left">',
		'<?=$select_usaha;?>',
		'</div>',
		'<div class="btn-group pull-left">',
		'<?=$select_bayar;?>',
		'</div>',
		'<div class="btn-group pull-left">',
		'<?=$select_validasi;?>',
		'</div><br><br>',
	];
	var tb = tb_array.join(' ');	
	$("div.toolbar").html(tb);

	$('#type_id, #usaha_id, #bayar_id, #validasi_id').change(function() {
		reload_grid();
	});

	$('#btn_tambah1').click(function() {
		window.location = '<? echo active_module_url($controller); ?>add/';
	});

	$('#add_self').click(function() {
		window.location = '<? echo active_module_url($controller); ?>add/';
	});

	$('#btn_edit').click(function() {
		if(mID) {
			window.location = '<? echo active_module_url($controller); ?>edit/'+uID+'/'+tID+'/'+mID;
		}else{
			alert('Silahkan pilih data yang akan diedit');
		}
	});

	$('#btn_delete').click(function() {
		if(mID) {
			var hapus = confirm('Hapus data ini?');
			if(hapus==true) {
				window.location = '<? echo active_module_url($controller); ?>delete/'+mID;
			};
		}else{
			alert('Silahkan pilih data yang akan dihapus');
		}
	});
	
	$("#btn_rpt_sspd").click(function(){
		if(mID) {
            show_rpt($(this).data('rpt'));
		}else{
			alert('Silahkan pilih data yang akan dicetak');
		}
	});

	$("#btn_rpt_omset").click(function(){
		if(mID) {
            show_rpt($(this).data('rpt'));
		}else{
			alert('Silahkan pilih data yang akan dicetak');
		}
	});

	$("#btn_rpt_omset_excel").click(function(){
		if(mID) {
             document.location.href = "../excelreport/cetak_omset/download/"+mID;
		}else{
			alert('Silahkan pilih data yang akan dicetak');
		}
	});
	
	$("#btn_rpt_sptpd").click(function(){
		show_rpt($(this).data('rpt'));
	});
	
	no_bayar = 0 ;
	$('#btn_dialog_validasi').click(function() {
		if (no_bayar==0){
			alert('Pilih Data yang akan divalidasi!');
		}
		else if(no_bayar!='DRAFT'){
			alert('Data sudah divalidasi!');
		}else{
		if(mID) {
			    $.ajax({
                url: '<?php echo active_module_url()?>sptpd/get_validasi/'+uID+'/'+tID+'/'+mID,
                async: false,
                success: function (j) {
                	var data = $.parseJSON(j);
                	$('#nama_pajak').html(data['nama_pajak']);
                	$('#cara_bayar').html(data['cara_bayar']);
                	$('#masa_pajak').html(data['masapajak_bulan']);
                	$('#spt_id').val(data['id']);
                	$('#jatuhtempotgl').val(data['jatuhtempotgl']);
                	$('#pajak').val(data['pajak']);
                	$('#jatuhtempotgl_view').html(data['jatuhtempotgl']);
                	var pajakval = convertToRupiah(data['pajak']);
                	$('#pajak_view').html(pajakval);

                },
                error: function (xhr, desc, er) {
                    alert(er);
                }
            });

            $('#dlgValidasi').modal('show');
		}else{
			alert('Silahkan pilih data yang akan divalidasi');
		}
    }});

    $('#btn_dokumen').click(function() {
		if(mID) {
            $.ajax({
                url: "<?php echo active_module_url()?>sptpd/get_dokumen/"+mID,
                async: false,
                success: function (data) {
                    var link = '<ol>';
                    var dok = $.parseJSON(data);
                    dok.forEach(function(entry) {
                        link += "<li>"+entry+"</li>";
                    });
                    link += '</ol>';

                    if(link=='<ol></ol>') link = "Tidak ada dokumen untuk diunduh.";
                    $('#filelist').html(link);
                },
                error: function (xhr, desc, er) {
                    alert(er);
                }
            });
            $('#dlgDokumen').modal('show');
		}else{
			alert('Silahkan pilih salah satu data');
		}
    });


	
	<? if ($this->uri->segment(2) != 'sptpd') : ?>
	$('#btn_proses').click(function() {
		if(mID) {
			var anSelected = fnGetSelected( oTable );
			if ( anSelected.length !== 0 ) {
				/* oTable.fnDeleteRow( anSelected[0] ); */
				
				var data = oTable.fnGetData( anSelected[0] );
				if (data[1] != null) alert('Data ini sudah ditetapkan');
				else {
					var proses = confirm('Proses data ini?');
					if(proses == true) {
						$(this).button('loading');
						$.ajax({
							url: '<? echo active_module_url($controller); ?>proses_skpd/'+uID+'/'+mID,
							async: false,
							success: function (data) {
								if (data != 'ok') 
									alert('Proses penetapan gagal');
								else reload_grid();
							},
							error: function (xhr, desc, er) {
								alert(er);
							}
						});
						$(this).button('reset');
					}
				}
			}		
		}else{
			alert('Silahkan pilih data yang akan diproses');
		}
	});
	
	$('#btn_recall').click(function() {
		if(mID) {
			var anSelected = fnGetSelected( oTable );
			if ( anSelected.length !== 0 ) {
				/* oTable.fnDeleteRow( anSelected[0] ); */
				
				var data = oTable.fnGetData( anSelected[0] );
				if (data[1] != null) {
					var proses = confirm('Recall data ini?');
					if(proses == true) {
						$(this).button('loading');
						$.ajax({
							url: '<? echo active_module_url($controller); ?>recall_skpd/'+uID+'/'+mID,
							async: false,
							success: function (data) {
								if (data != 'ok') 
									alert('Proses recall gagal');
								else reload_grid();
							},
							error: function (xhr, desc, er) {
								alert(er);
							}
						});
						$(this).button('reset');
					}
				}
				else alert('Data ini belum ditetapkan - tidak dapat melakukan recall');
			}
		}else{
			alert('Silahkan pilih data yang akan direcall');
		}
	});
	<? endif; ?>
});
</script>


<!-- Modal -->
<div class="modal fade" id="dlgDokumen" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="dlgKategoriLabel">Unduh Dokumen Pendukung SPTPD</h4>
            </div>
            <div class="modal-body">
                <span id="filelist"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- Modal -->
<div class="modal fade" id="dlgValidasi" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="dlgKategoriLabel">Validasi</h4>
            </div>
             <form id="form_validasi" action="<?php echo active_module_url()?>sptpd/proces_validasi/" method="post">
            <div class="content">
            <div class="content text-muted well well-sm no-shadow">
            	<input type="hidden" id="spt_id" name="spt_id" />
            	<input type="hidden" id="jatuhtempotgl" name="jatuhtempotgl" />
            	<input type="hidden" id="pajak" name="pajak" />


                <label class="control-label col-sm-12">
	            	Anda Yakin ingin memvalidasi data ini ? 
	            </label>

	            <label class="control-label col-sm-3">
	            Jenis Pajak
	            </label>
	            <label class="control-label col-sm-1">
	            :
	            </label>
	            <label class="control-label col-sm-8" id="nama_pajak">
	            </label>

	            <label class="control-label col-sm-3">
	            Masa Pajak
	            </label>
	            <label class="control-label col-sm-1">
	            :
	            </label>
	            <label class="control-label col-sm-8" id="masa_pajak">
	            </label>

	            <label class="control-label col-sm-3">
	            Jatuh Tempo 
	            </label>
	            <label class="control-label col-sm-1">
	            :
	            </label>
	            <label class="control-label col-sm-8" id="jatuhtempotgl_view">
	            </label>

	            <label class="control-label col-sm-3">
	            Pajak Terhutang
	            </label>
	            <label class="control-label col-sm-1">
	            :
	            </label>
	            <label class="control-label col-sm-8" id="pajak_view">
	            </label>

				<label class="control-label col-sm-3" for="cara_bayar">Cara Bayar </label>
				<label class="control-label col-sm-1">
	            :
	            </label>
				<div class="col-sm-2">
					<select class="form-control" style="width:180px" name="cara_bayar" id="cara_bayar">
					</select>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>

				<label class="control-label col-sm-12">
	            	Setelah divalidasi, anda tidak dapat mengubah data tersebut.
	            </label>
	            <label class="control-label col-sm-12">
	            	Hubungi Admin Pemda untuk proses lebih lanjut.
	            </label>
            </div>
            </div>
            	<div class="modal-footer">
            		<button type="submit" class="btn btn-primary">OK!</button>
	                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
	        </div>
	       </form>
        </div>
    </div>
</div>
<!-- End Modal -->


<div class="content">  
	<div class="container-fluid">  
		
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#"><strong><? echo $this->uri->segment(2) == 'sptpd' ? 'PENDATAAN - SPTPD' : 'PENETAPAN - SK'; ?></strong></a>
			</li>
		</ul>
		
		<?=msg_block();?>

		<table class="display" id="table1">
			<thead>
				<tr>
					<th rowspan="2">index</th>
					<th rowspan="2">No. Bayar</th>
					<th rowspan="2">No. SPTPD</th>
					<th rowspan="2">Tanggal</th>
					<th rowspan="2">NOPD</th>
					<th rowspan="2">Objek Pajak</th>
					<th rowspan="2">Nama</th>
					<th rowspan="2">Masa Pajak</th>
					<th rowspan="2">Jatuh Tempo</th>
					<th rowspan="2">Omset</th>
					<th rowspan="2">Tarif (%)</th>
					<th rowspan="2">Pajak</th>
					<th colspan="3" class="ui-state-default">Setoran</th>
				</tr>
				<tr>
					<th>Tanggal</th>
					<th>Denda</th>
					<th>Bayar</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>

	</div>
</div>
<? $this->load->view('_foot'); ?>
