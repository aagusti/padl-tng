<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/_navbar'); ?>

<script>
var mID;
var uID;
var tID;
var oTable;

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
	var rptparams = {
        rpt: rpt,
        id: mID,
    }
	
	var data = decodeURIComponent($.param(rptparams));
	var url  = '<? echo active_module_url($controller); ?>cetak/pdf/?'+data;
	
	var winparams = 'width='+screen.width+',height='+screen.height+',directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=no,resizable=no';
	window.open(url, 'Laporan', winparams);
}

function switch_btn() {
    var proses_id  = $('#proses_id').val();
    if (proses_id == 2) {
        $('#btn_proses').hide();
        $('#btn_recall').show();
    } else {
        $('#btn_proses').show();
        $('#btn_recall').hide();
    }
}

function reload_grid() {
	var usaha_id  = $('#usaha_id').val();
	var type_id   = $('#type_id').val();
	var proses_id = $('#proses_id').val();
    var terimatgl = $('#terimatgl').val();
    
    <? if ($this->uri->segment(2) != 'sptpd_all') : ?>
	oTable.fnReloadAjax("<? echo active_module_url($controller); ?>grid/"+proses_id+"/"+usaha_id+"/"+terimatgl);
    <? else : ?>
	oTable.fnReloadAjax("<? echo active_module_url($controller); ?>grid/"+type_id+"/"+usaha_id+"/"+terimatgl);
    <? endif; ?>
}

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
			{ "aTargets": [1], "bSearchable": true,  "bVisible": true,  "sWidth": "80px", "sClass": "" },
			{ "aTargets": [2], "bSearchable": true,  "bVisible": true,  "sWidth": "85px", "sClass": "" },
			{ "aTargets": [3], "bSearchable": true,  "bVisible": true,  "sWidth": "80px", "sClass": "" },
			{ "aTargets": [4], "bSearchable": true,  "bVisible": true,  "sWidth": "80px", "sClass": "" },
			{ "aTargets": [5], "bSearchable": true,  "bVisible": true,  "sWidth": "200px", "sClass": "" },
            
			{ "aTargets": [7], "bSearchable": true,  "bVisible": true,  "sWidth": "70px", "sClass": "center" },
			{ "aTargets": [8], "bSearchable": true,  "bVisible": true,  "sWidth": "97px", "sClass": "right" },
			{ "aTargets": [9], "bSearchable": true,  "bVisible": true,  "sWidth": "97px", "sClass": "right" },
			{ "aTargets": [10], "bSearchable": false, "bVisible": false, "sWidth": "", "sClass": "" },
			{ "aTargets": [11], "bSearchable": false, "bVisible": false, "sWidth": "", "sClass": "" },
		],
		"fnRowCallback": function (nRow, aData, iDisplayIndex) {
			$(nRow).on("click", function (event) {
				if ($(this).hasClass('row_selected')) {
					mID = '';
					$(this).removeClass('row_selected');
				} else {
					var data = oTable.fnGetData( this );
					mID = data[0];
					uID = data[10];
					tID = data[11];
					
					oTable.$('tr.row_selected').removeClass('row_selected');
					$(this).addClass('row_selected');
				}
			})
		},
		"fnDrawCallback": function( oSettings ) {
			mID = '';
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
    
    $('.dataTables_filter input').unbind();
    $('.dataTables_filter input').bind('keyup', function(e) {
        if(e.keyCode == 13) {
            oTable.fnFilter(this.value);   
        }
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
		<? if ($this->uri->segment(2) != 'sptpd_all') : ?>
		'<div class="btn-group pull-left">',
		'	<button id="btn_proses" data-loading-text="Proses <img border=\'0\' src=\'<?=base_url('assets/pad/img/ajax-loader-fb-white.gif')?>\' />" class="btn btn-success">Proses</button>',
		'	<button id="btn_recall" data-loading-text="Recall <img border=\'0\' src=\'<?=base_url('assets/pad/img/ajax-loader-fb-white.gif')?>\' />" class="btn btn-warning hide">Recall</button>',
		'</div>',
		'<div class="btn-group pull-left">',
		'	<div class="input-prepend"><span class="add-on"><i class="icon-calendar"></i></span><input style="width:100px;" class="form-control" type="text" name="prosestgl" id="prosestgl" value="<?=date('d-m-Y');?>"/></div>',
		'</div>',
		'<div class="btn-group pull-left">',
		'	<button id="btnshow_rpt" class="btn btn-primary" data-rpt="skpd">Cetak SKPD</button>',
		'	<button id="btnshow_rpt" class="btn btn-primary" data-rpt="nota">Cetak Nota</button>',
		'	<button id="btnshow_rpt" class="btn btn-primary" data-rpt="reklame_ipr">Cetak IPR</button>',
		'</div>',
		'<div class="btn-group pull-left">',
		'<?=$select_proses_id;?>',
		'</div>',
        <? else : ?>
		'<div class="btn-group pull-left">',
		'	<button id="btn_tambah" class="btn pull-left dropdown-toggle" data-toggle="dropdown">Tambah <span class="caret"></span></button>',
		'	<ul class="dropdown-menu">',
		'		<li><a id="add_self" href="#">Umum</a></li>',
		'       <li class="divider"></li>',
		'		<li><a id="add_reklame" href="#">Reklame</a></li>',
		'		<li><a id="add_at" href="#">Air Tanah</a></li>',
		'	</ul>',
		'</div>',
		'<div class="btn-group pull-left">',
		'	<button id="btn_edit" class="btn">Edit</button>',
		'	<button id="btn_delete" class="btn">Hapus</button>',
		'</div>',
		'<div class="btn-group pull-left">',
		'	<button id="btnshow_rpt" class="btn btn-primary" data-rpt="sptpd">Cetak SPTPD</button>',
		'</div>',
		'<div class="btn-group pull-left hide">',
		'<?=$select_sptpd_type;?>',
		'</div>',
		<? endif; ?>
		'<div class="btn-group pull-left">',
		'<?=$select_usaha;?>',
		'</div>',
		'<div class="btn-group pull-left">',
		'	<div class="input-prepend"><span class="add-on"><i class="icon-calendar"></i></span><input style="width:100px;" class="form-control" type="text" name="terimatgl" id="terimatgl" value="<?=date('d-m-Y');?>"/></div>',
		'</div></br>',
	];
	var tb = tb_array.join(' ');	
	$("div.toolbar").html(tb);

	$('#proses_id, #type_id, #usaha_id').change(function() {
        switch_btn();
		reload_grid();
	});

	$('#btn_tambah1').click(function() {
		window.location = '<? echo active_module_url($controller); ?>add/';
	});

	$('#add_self').click(function() {
		window.location = '<? echo active_module_url($controller); ?>add/';
	});

	$('#add_reklame').click(function() {
		window.location = '<? echo active_module_url($controller); ?>add/<?=pad_reklame_id();?>';
	});

	$('#add_at').click(function() {
		window.location = '<? echo active_module_url($controller); ?>add/<?=pad_air_tanah_id();?>';
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
	
	<? if ($this->uri->segment(2) != 'sptpd_all') : ?>
	$('#btn_proses').click(function() {
		if(mID) {
			var anSelected = fnGetSelected( oTable );
            var prosestgl  = $('#prosestgl').val();
			if ( anSelected.length !== 0 ) {
				/* oTable.fnDeleteRow( anSelected[0] ); */
				
				var data = oTable.fnGetData( anSelected[0] );
				if (data[1] != null) alert('Data ini sudah ditetapkan');
				else {
					var proses = confirm('Proses data ini?');
					if(proses == true) {
						$(this).button('loading');
                        setTimeout(function() {
                            $.ajax({
                                url: '<? echo active_module_url($controller); ?>proses_skpd/'+uID+'/'+mID+'/'+prosestgl,
                                async: false,
                                success: function (data) {
                                    if (data != 'ok') 
                                        alert('Proses penetapan gagal');
                                    else reload_grid();
                                },
                                error: function (xhr, desc, er) {
                                    alert(er);
                                }
                            })
                        }, 0);
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
                        setTimeout(function() {
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
                            })
                        }, 0);
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
    
	$("[id=btnshow_rpt]").click(function(){
		if(mID) {
			var anSelected = fnGetSelected( oTable );
			if ( anSelected.length !== 0 ) {
				/* oTable.fnDeleteRow( anSelected[0] ); */
				
				var data = oTable.fnGetData( anSelected[0] );
				if (data[1] != null) {
                    var rpt = $(this).data('rpt');
                    show_rpt(rpt);
                } else alert('Data ini belum ditetapkan');
            }
		}else{
			alert('Silahkan pilih data yang akan dicetak');
		}
	});
    	
	var terimatgl_dtp = $('#terimatgl').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		reload_grid();
		terimatgl_dtp.hide();
	}).data('datepicker');
    
	var prosestgl_dtp = $('#prosestgl').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		prosestgl_dtp.hide();
	}).data('datepicker');
});
</script>

<div class="content">  
	<div class="container-fluid">  
		
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#"><strong><? echo $this->uri->segment(2) == 'sptpd_all' ? 'PENDATAAN - SPTPD' : 'PENETAPAN - SK'; ?></strong></a>
			</li>
		</ul>
		
		<?=msg_block();?>

		<table class="table" id="table1">
			<thead>
				<tr>
					<th>index</th>
					<th><? echo $this->uri->segment(2) == 'sptpd_all' ? 'SPTPD' : 'SKPD'; ?></th>
					<th>Tanggal</th>
					<th><? echo $this->uri->segment(2) == 'sptpd_all' ? 'Dok.' : 'SPTPD'; ?></th>
					<th>NOPD</th>
					<th>Subjek Pajak</th>
					<th>Jenis Pajak</th>
					<th>Masa</th>
					<th>Dasar</th>
					<th>Pajak</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<? $this->load->view('_foot'); ?>