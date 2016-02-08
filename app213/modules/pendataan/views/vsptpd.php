<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/_navbar'); ?>

<style>
.dataTables_filter {
    height: 40px;
}
.btn-group, .btn-group-vertical {
    bottom: -10px;
}
.dataTables_wrapper {
    top: 5px;
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

function reload_grid() {
	var type_id  = $('#type_id').val();
	var usaha_id = $('#usaha_id').val();
	oTable.fnReloadAjax("<? echo active_module_url($controller); ?>grid_dokumen/"+type_id+"/"+usaha_id);
}


var mID;
var uID;
var tID;
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
			{ "aTargets": [1], "bSearchable": true,  "bVisible": true,  "sWidth": "100px", "sClass": "" },
			{ "aTargets": [2], "bSearchable": true,  "bVisible": true,  "sWidth": "100px", "sClass": "" },
			{ "aTargets": [3], "bSearchable": false,  "bVisible": false,  "sWidth": "100px", "sClass": "" },
			{ "aTargets": [4], "bSearchable": true,  "bVisible": true,  "sWidth": "160px", "sClass": "" },
			
			{ "aTargets": [6], "bSearchable": true,  "bVisible": true,  "sWidth": "100px", "sClass": "" },
			{ "aTargets": [7], "bSearchable": true,  "bVisible": true,  "sWidth": "100px", "sClass": "" },
			{ "aTargets": [8], "bSearchable": true,  "bVisible": true,  "sWidth": "100px", "sClass": "right" },
			{ "aTargets": [9], "bSearchable": true,  "bVisible": true,  "sWidth": "100px", "sClass": "right" },
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
		"sAjaxSource": "<? echo active_module_url($controller); ?>grid_dokumen/"
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
		'	<button id="btn_dokumen" class="btn btn-success">Unduh Dokumen</button>',
		'</div>',
		'<div class="btn-group pull-left">',
		'<?=$select_sptpd_type;?>',
		'</div>',
		'<div class="btn-group pull-left">',
		'<?=$select_usaha;?>',
		'</div><br>',
	];
	var tb = tb_array.join(' ');	
	$("div.toolbar").html(tb);

	$('#type_id, #usaha_id').change(function() {
		reload_grid();
	});

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




<div class="content">  
	<div class="container-fluid">  
		
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#"><strong><? echo $this->uri->segment(2) == 'sptpd' ? 'PENDATAAN - SPTPD' : 'PENETAPAN - SK'; ?></strong></a>
			</li>
		</ul>
		
		<?=msg_block();?>

		<table class="table" id="table1">
			<thead>
				<tr>
					<th>index</th>
					<th><? echo $this->uri->segment(2) == 'sptpd' ? 'SPTPD' : 'SKPD'; ?></th>
					<th>Tanggal</th>
					<th>Dok.</th>
					<th>NOPD</th>
					<th>Subjek Pajak</th>
					<th>Masa Dari</th>
					<th>Masa s/d</th>
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