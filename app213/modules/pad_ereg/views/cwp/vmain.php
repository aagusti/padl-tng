<? $this->load->view('_head'); ?>
<? $this->load->view(active_module().'/_navbar'); ?>

<script>
var mID;
var oTable;
var xRow;

$(document).ready(function() {	
	oTable = $('#table1').dataTable({
		"iDisplayLength": 13,
		"bJQueryUI": true,
		"bAutoWidth": false,
		"sPaginationType": "full_numbers",
		"sDom": '<"toolbar">frtip',
		"aaSorting": [[ 0, "desc" ]],
		"aoColumnDefs": [			
			{ "aTargets": [0], "bSortable": false, "bSearchable": false, "bVisible": false, "sWidth": "", "sClass": "" },
			{ "aTargets": [1], "bSortable": false, "bSearchable": true,  "bVisible": true,  "sWidth": "60px", "sClass": "" },
			{ "aTargets": [2], "bSortable": false, "bSearchable": true,  "bVisible": true,  "sWidth": "200px", "sClass": "" },
			{ "aTargets": [3], "bSortable": false, "bSearchable": true,  "bVisible": true,  "sWidth": "120px", "sClass": "" },
			{ "aTargets": [4], "bSortable": false, "bSearchable": true,  "bVisible": true,  "sWidth": "120px", "sClass": "" },
			{ "aTargets": [5], "bSortable": false, "bSearchable": true,  "bVisible": true,  "sWidth": null, "sClass": "" },
		],
		"fnRowCallback": function (nRow, aData, iDisplayIndex) {
			$(nRow).on("click", function (event) {
				if ($(this).hasClass('row_selected')) {
					mID = '';
					$(this).removeClass('row_selected');
				} else {
					var data = oTable.fnGetData( this );
					mID = data[0];
                    
					oTable.$('tr.row_selected').removeClass('row_selected');
					$(this).addClass('row_selected');
				}
			})
		},
		"fnDrawCallback": function( oSettings ) {
			mID = '';
		},
		"oLanguage": {
			"sProcessing":   "<img border='0' src='<?=base_url('assets/pad/img/ajax-loader-big-circle-ball.gif')?>' />",
			"sLengthMenu":   "Tampilkan _MENU_",
			"sZeroRecords":  "Tidak ada data",
			"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
			"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
			"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
			"sInfoPostFix":  "",
			"sSearch":       "Cari : ",
			"sUrl":          "",
			"oPaginate": {
				"sFirst":    "Awal",
				"sPrevious": "Balik",
				"sNext":     "Lanjut",
				"sLast":     "Akhir",
			}
		},
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "<?=active_module_url();?>daftar/grid"
	}); 
    
    $('.dataTables_filter input').unbind();
    $('.dataTables_filter input').bind('keyup', function(e) {
        if(e.keyCode == 13) {
            oTable.fnFilter(this.value);   
        }
    });
	
	var tb_array = [
		'<div class="btn-group pull-left">',
		'	<button id="btn_edit" class="btn pull-left" type="button">Edit Data</button>',
		'</div>',
	];
	var tb = tb_array.join(' ');	
	$("div.toolbar").html(tb);

	$('#btn_edit').click(function() {
		window.location = '<?=active_module_url();?>daftar/edit/<?=cwp_id();?>';
	});
});
</script>
 <div class="content">  
	 <div class="container-fluid">  
		
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#"><strong>STATUS PENDAFTARAN</strong></a>
			</li>
		</ul>
		
		<?=msg_block();?>

		<table class="table" id="table1">
			<thead>
				<tr>
					<th>index</th>
					<th>Tanggal</th>
					<th>Wajib Pajak</th>
					<th>Jenis Usaha</th>
					<th>Status</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<? $this->load->view('_foot'); ?>