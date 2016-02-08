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

function get_nopd(cu_id) {
	$.ajax({
		url: "<?php echo active_module_url()?>sptpd/get_nopd/"+cu_id,
		async: false,
		success: function (data) {
			$('#nopd').val(data);
		},
		error: function (xhr, desc, er) {
			alert(er);
		}
	});
}
var global_pajak_id;
var bulantahun; 
function get_pajak(cu_id) {
	$.ajax({
		url: "<?php echo active_module_url()?>sptpd/get_pajak/"+cu_id+"/"+global_pajak_id,
		async: false,
		success: function (data) {
			$('#pajak_id').html(data);
			get_nopd(cu_id);
		},
		error: function (xhr, desc, er) {
			alert(er);
		}
	});

	if ($('#reload_cu').val()==1){
		  get_cu();
	}
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
		masadari = (sekarang.getDate()+1)+"-"+(sekarang.getMonth()+1)+"-"+sekarang.getFullYear();
	}

	$.ajax({
		url: "<?php echo active_module_url()?>sptpd/get_pajak_detail/"+pajak_id+"/"+masadari,
		async: false,

		success: function (j) {
			    if(!j) {
        			alert('Gagal memproses data, Pastikan masa pajak anda benar');
        			//location.reload(true);
       			 return;
    			}
			var data = $.parseJSON(j);
			var tarif = parseFloat(data['tarif']);
			$('#multiple').val(data['multiple']);
			$('#tarif').autoNumeric('set', tarif);
			$('#minimal_omset').val(data['minimal_omset']);
			$('#r_bayarid').val(data['masapajak']);
			$('#r_nsr').val(data['reklame']);
			$('#m_njop').val(data['reklame']);
			$('#kode').val(data['kode']);
			$('#rekening_id').val(data['rekening_id']);
			$('#jatuhtempo').val(data['jatuhtempo']);
			document.getElementById('view_tarif').value = tarif*100;
		},
		error: function (xhr, desc, er) {
			alert(er);
		}
	});
}



function hitung_dasar() {
    var omset=[32];
    var dasar = 0;
    for(var i=1; i<=32; i++){
    omset[i] =parseFloat($('#omset'+i).autoNumeric('get'));
    dasar = dasar + omset[i];
    }
    $('#dasar').autoNumeric('set', dasar);
    $('#dasar_temp').autoNumeric('set', dasar);


    /*
    if (dasar > 0 )
        document.getElementById("dasar").readOnly = true;
    else
        document.getElementById("dasar").readOnly = false;
	*/
}

$(window).load(function(){ 
        hitung_dasar();
 });


function get_last_data(cu_id) {
    return;
}

function hitung_pajak() {
	var minimal_omset   = parseFloat($('#dasar').val());
	minimal_omset       = isNaN(minimal_omset) ? 0 : minimal_omset;
	var dasar      = parseFloat($('#dasar').autoNumeric('get'));
	dasar          = isNaN(dasar) ? 0 : dasar;
	var tarif      = parseFloat($('#tarif').autoNumeric('get'));
	tarif          = isNaN(tarif) ? 0 : tarif;
	var pajak = (dasar*tarif);
	pajak = Math.round(pajak);

	if (dasar < minimal_omset)
		$('#pajak').autoNumeric('set', 0);
	else
		$('#pajak').autoNumeric('set', pajak);
}


function get_cu() {
		customer_id = parseInt(<?=$dt['customer_id']?>);
		cu_id 		= $('#customer_usaha_id').val();
		def_pajak_id= $('#pajak_id').val();
		if(cu_id == null || def_pajak_id ==null){
			cu_id = 0 ;
			def_pajak_id = 0 ;
			$("#reload_cu").val(1);
		}
		$.ajax({			
			url: "<?php echo active_module_url()?>sptpd/get_cu/"+customer_id+"/"+cu_id+"/"+def_pajak_id,
			async: false,
			success: function (j) {
				var data = $.parseJSON(j);
				$("#npwpd").val(data['npwpd']);
				$("#customer_id").val(data['customer_id']);
				$("#nama").val(data['nama']);
				/* $("#customer_usaha_id").val(data['customer_usaha_id']); */
				$("#so").val(data['so']);
				
				/* $('#usaha_id').html(data['usaha']); //change to */
				$('#customer_usaha_id').html(data['usaha']);
				/* $("#customer_usaha_id option").not(":selected").attr("disabled", "disabled"); */
	            
	            $('#usaha_id').val(data['usaha_id']);

	            				//SET JTP
				<?if ($this->uri->segment(3)!=='edit') { ?>
				document.getElementById('masapajak_bulan').value = data['masapajak_bulan'];
				var lang = 'en' ;
				str = "01"+"-"+document.getElementById('masapajak_bulan').value ;
				masadari = GetDate(str,lang) ;
				document.getElementById('masadari').value = masadari;
				global_bulantahun = masadari.substr(3, 9);
				<? } ?>
			},
			error: function (xhr, desc, er) {
				alert(er);
			}
		});
	}

function GetDate(str,lang) {
	var arr = str.split('-');
	var month = "";
	if (lang=='id')
	var months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];
	if (lang=='en')
	var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
	var i = 0;
	for (i; i < months.length; i++) {
	    if (months[i] == arr[1]) {
	        break;
	    }
}
i++;
if (i >= 10) month = i;
else month = "0" + i;
var formatddate = arr[0] + '-' + month + '-' + arr[2];
return formatddate;
}	

<!-- // -->
var mID;
var cuID;
var pID;
var oTable;
var oTableKD;

$(document).ready(function() {

	function get_cu(customer_id, cu_id) {
		cu_id = $('#customer_usaha_id').val();
		def_pajak_id = $('#pajak_id').val();
		if(cu_id == null || def_pajak_id ==null){
			cu_id = 0 ;
			def_pajak_id = 0 ;
			$("#reload_cu").val(1);
		}
		$.ajax({			
			url: "<?php echo active_module_url()?>sptpd/get_cu/"+customer_id+"/"+cu_id+"/"+def_pajak_id,
			async: false,
			success: function (j) {
				var data = $.parseJSON(j);
				$("#npwpd").val(data['npwpd']);
				$("#customer_id").val(data['customer_id']);
				$("#nama").val(data['nama']);
				/* $("#customer_usaha_id").val(data['customer_usaha_id']); */
				$("#so").val(data['so']);
				
				/* $('#usaha_id').html(data['usaha']); //change to */
				$('#customer_usaha_id').html(data['usaha']);
				/* $("#customer_usaha_id option").not(":selected").attr("disabled", "disabled"); */
	            
	            $('#usaha_id').val(data['usaha_id']);

	            				//SET JTP
				<?if ($this->uri->segment(3)!=='edit') { ?>
				document.getElementById('masapajak_bulan').value = data['masapajak_bulan'];
				var lang = 'en' ;
				str = "01"+"-"+document.getElementById('masapajak_bulan').value ;
				masadari = GetDate(str,lang) ;
				document.getElementById('masadari').value = masadari;
				global_bulantahun = masadari.substr(3, 9);
				<? } ?>
			},
			error: function (xhr, desc, er) {
				alert(er);
			}
		});
	}

	function set_jatuh_tempo(bulantahun) {
		//if ($('#masadari').val() == '' || $('#terimatgl').val() == '') return;
		//if ($('#terimatgl').val() == '') return;
		var jt = parseInt($('#jatuhtempo').val());
		//var masadari = masadari_dtp.date;
		//var tetap_tgl = terimatgl_dtp.date;
	switch (jt) {
			/* jatuh tempo akhir bulan masa + 1 */
			case 0:
				//jtp = new Date(masadari.getFullYear(), masadari.getMonth()+2, 1)-1;
				var year = parseInt(bulantahun.substr(3,6));
				var month = parseInt(bulantahun.substr(0, 2));

				if (year%4==0){var feb=29;}else{var feb=28;}
				
				var nextmonth = month + 1 ;
				if (nextmonth == 13) {nextmonth=1; year=year+1;}
				//jtp = new Date(year, month + 1, 0);
				//jtp = new Date( (new Date(year, month,1))-1 );;
				if (month==1){
				var msd = 30+"-"+month+"-"+year ;
				jtp = feb+"-"+nextmonth+"-"+year ; 
				}
				if (month==0 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12){
				msd = 31+"-"+month+"-"+year ;
				jtp = 30+"-"+nextmonth+"-"+year ;
					if (month == 7 || month == 12){
					jtp = 31+"-"+nextmonth+"-"+year ;}
				}
				if (month==2 || month==4 || month==6 || month==9 || month==11 ){
				var msd = 30+"-"+month+"-"+year ;
					if (month == 2){
					msd = feb+"-"+month+"-"+year ; }
				jtp = 31+"-"+nextmonth+"-"+year ;
				}
				document.getElementById('jatuhtempotgl').value = jtp ;
				document.getElementById('masasd').value = msd ;
				break;
			/* 30 hari dari tgl terima/tetap 		
			case 1:
				jtp = new Date(tetap_tgl.getFullYear(), tetap_tgl.getMonth(), tetap_tgl.getDate() +30);
				jatuhtempotgl_dtp.setValue(jtp);
				jatuhtempotgl_dtp.update();
				break;
					*/	
			case 1:
				//jtp = new Date(masadari.getFullYear(), masadari.getMonth()+2, 1)-1;
				var year = parseInt(bulantahun.substr(3,6));
				var month = parseInt(bulantahun.substr(0, 2));

				if (year%4==0){var feb=29;}else{var feb=28;}
				
				var nextmonth = month + 1 ;
				if (nextmonth == 13) {nextmonth=1; year=year+1;}
				//jtp = new Date(year, month + 1, 0);
				//jtp = new Date( (new Date(year, month,1))-1 );;
				if (month==1){
				var msd = 30+"-"+month+"-"+year ;
				jtp = feb+"-"+nextmonth+"-"+year ; 
				}
				if (month==0 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12){
				msd = 31+"-"+month+"-"+year ;
				jtp = 30+"-"+nextmonth+"-"+year ;
					if (month == 7 || month == 12){
					jtp = 31+"-"+nextmonth+"-"+year ;}
				}
				if (month==2 || month==4 || month==6 || month==9 || month==11 ){
				var msd = 30+"-"+month+"-"+year ;
					if (month == 2){
					msd = feb+"-"+month+"-"+year ; }
				jtp = 31+"-"+nextmonth+"-"+year ;
				}
				document.getElementById('jatuhtempotgl').value = jtp ;
				document.getElementById('masasd').value = msd ;
				break;

		}
			}

	function set_masa_sd() {
		if ($('#masadari').val() == '') return;
		
		var masa_pajak = parseInt($('#r_bayarid').val());
		var masa_dr = masadari_dtp.date;

		switch (masa_pajak) {
			/* tahunan */
			case 1:
				masa_sd = new Date(masa_dr.getFullYear()+1, masa_dr.getMonth(), masa_dr.getDate())-1;
				masasd_dtp.setValue(masa_sd);
				masasd_dtp.update();
				break;
			/* semesteran */
			case 2:
				masa_sd = new Date(masa_dr.getFullYear(), masa_dr.getMonth()+6, masa_dr.getDate())-1;
				masasd_dtp.setValue(masa_sd);
				masasd_dtp.update();
				break;
			/* triwulanan */
			case 3:
				masa_sd = new Date(masa_dr.getFullYear(), masa_dr.getMonth()+3, masa_dr.getDate())-1;
				masasd_dtp.setValue(masa_sd);
				masasd_dtp.update();
				break;
			/* bulanan */
			case 4:
				masa_sd = new Date(masa_dr.getFullYear(), masa_dr.getMonth()+1, masa_dr.getDate())-1;
				masasd_dtp.setValue(masa_sd);
				masasd_dtp.update();
				break;
			/* mingguan */
			case 5:
				masa_sd = new Date(masa_dr.getFullYear(), masa_dr.getMonth(), masa_dr.getDate()+7);
				masasd_dtp.setValue(masa_sd);
				masasd_dtp.update();
				break;
			/* harian */
			case 6:
				masa_sd = new Date(masa_dr.getFullYear(), masa_dr.getMonth(), masa_dr.getDate()+1);
				masasd_dtp.setValue(masa_sd);
				masasd_dtp.update();
				break;
		}
	}
    
	$('#btn_cancel').click(function() {
		window.location = '<?=active_module_url($this->uri->segment(2));?>';
	});


	$('#dasar, #denda, #dasar_temp, #total_bayar, #bunga, #setoran, #kenaikan, #kompensasi, #lain2, #pajak').autoNumeric('init', {
		aSep: '.', aDec: ',', vMax: '9999999999999.99',  mDec: '0'
	});
	$('#tarif').autoNumeric('init', {aSep: '.', aDec: ',', vMax: '9999999999999.99'});

	$('#dasar, #dasar_temp, #denda, #bunga, #setoran, #kenaikan, #kompensasi, #lain2, #pajak, #tarif').keyup(function() {
		hitung_pajak();
	});

	for(var i=1; i<=32; i++){ 
	$('#omset'+i).keyup(function() {
    hitung_dasar();
    hitung_pajak();

    hitung_denda(document.getElementById('masapajak_bulan').value);
	var pajak      = parseFloat($('#pajak').autoNumeric('get'));
	var denda      = parseFloat($('#denda').autoNumeric('get'));
	total_bayar	= denda + pajak  ;
	$('#total_bayar').autoNumeric('set', total_bayar);

	});


	$('#omset'+i).autoNumeric('init', {
	    aSep: '.', aDec: ',', vMax: '9999999999999.99',  mDec: '0'
	    });

	};

	$('#customer_usaha_id').change(function() {
		get_pajak(this.value);
		get_pajak_detail();
		
		set_masa_sd();
		hitung_pajak();
		//set_jatuh_tempo();
        
        /* ambil data kartu/pendukung terakhir */
        get_last_data(this.value);
	});
		
	$('#pajak_id').change(function() {
		get_pajak_detail();
		
		set_masa_sd();
		hitung_pajak();
		//set_jatuh_tempo();
	});
    
    var now = new Date();
	var terimatgl_dtp = $('#terimatgl').datepicker({
		format: 'dd-mm-yyyy',
		onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		},
	}).on('changeDate', function(ev) {
		set_jatuh_tempo();
		terimatgl_dtp.hide();
	}).data('datepicker');

    var bulanlalu = new Date();
    bulanlalu.setDate(0);
    bulanlalu.setMonth(bulanlalu.getMonth()-1);
    bulanlalu.setDate(bulanlalu.getDate()+1);
	var masadari_dtp = $('#masadarix').datepicker({
		format: 'dd-mm-yyyy',
		onRender: function(date) {
			return date.valueOf() > bulanlalu.valueOf() ? 'disabled' : '';
		},
	}).on('changeDate', function(ev) {
		/* set_masa_sd();
		set_jatuh_tempo(); */
		$('#pajak_id').trigger('change');
		masadari_dtp.hide();
	}).data('datepicker');
    
    var bulanlalu2 = new Date();
    bulanlalu2.setDate(0);
    // bulanlalu.setMonth(bulanlalu2.getMonth()-1);
    // bulanlalu.setDate(bulanlalu2.getDate()+1);
	var masasd_dtp = $('#masasdx').datepicker({
		format: 'dd-mm-yyyy',
		onRender: function(date) {
			return date.valueOf() > bulanlalu2.valueOf() ? 'disabled' : '';
		},
	}).on('changeDate', function(ev) {
		masasd_dtp.hide();
	}).data('datepicker');

	var jatuhtempotgl_dtp = $('#jatuhtempotglx').datepicker({
		format: 'dd-mm-yyyy',
	}).on('changeDate', function(ev) {
		jatuhtempotgl_dtp.hide();
	}).data('datepicker');


    // Don't allow direct editing
    /*
    $('#terimatgl, #masadari, #masasd, #jatuhtempotgl').on('keypress', function(e) {
        e.preventDefault();
    });
*/
    
	$("#myform").submit(function(eventObj){
		if ($('#msg_confirm').hasClass('hide')==true) {
			$('#msg_confirm').removeClass('hide');
			location.hash = '#msg_confirm';
		} else {
			if ($('#submit_ok').is(":checked")) {
				$('#jatuhtempotgl').removeAttr('disabled');
				$('#masasd').removeAttr('disabled');
				var data = JSON.stringify({
					"dtKD": oTableKD.fnGetData()
				});
				
				//alert(data);
	
				/* $(this).append('<input type="hidden" name="dtKD" value="'+data+'" /> '); */
				$('<input type="hidden" name="dtKD"/>').val(data).appendTo('#myform');
				return true;
			} else
				alert('Silahkan setujui dokumen ini terlebih dahulu untuk melanjutkan.');
		}
		
		return false;
	});
	

	$("#masapajak_bulan").monthpicker();
$('#masapajak_bulan').change(function() {
		var lang = 'id' ;
		str = "01"+"-"+document.getElementById('masapajak_bulan').value ;
		masadari = GetDate(str,lang) ;

		var sekarang = new Date();
		month_now = parseInt((sekarang.getMonth())+1);
		year_now  = parseInt(sekarang.getFullYear());
		month_picked = parseInt(masadari.substr(3, 4));
		year_picked = parseInt(masadari.substr(6, 9));
		//

		var kd = $("#multiple").val();
if (kd==0){ //Jika bukan Multiple
			if (month_picked>=month_now){
				 if(year_picked>=year_now){
				alert("Invalid Input");
				document.getElementById('masapajak_bulan').value = '';
				document.getElementById('masadari').value = "1"+"-"+parseInt(month_now-1)+"-"+year_now ;
			}}
			else if (month_picked>=month_now){
				 if(year_picked<year_now){
					document.getElementById('masadari').value = masadari;
					global_bulantahun = masadari.substr(3, 9);
					//get_pajak_detail2(masadari);
					set_jatuh_tempo(global_bulantahun);
					//langsung hitung denda
					//hitung_denda(bulantahun); //lihat sbg presentase
					//view_denda	= 2*selisih_masa;
					//document.getElementById('view_denda').value = view_denda;
					var masapajak_bulan = document.getElementById('masapajak_bulan').value;
					document.getElementById('omset_masa_pajak').innerHTML = masapajak_bulan ;
					}}
			 if(year_picked>year_now){
				alert("Invalid Input");
				document.getElementById('masapajak_bulan').value = '';
				document.getElementById('masadari').value = "1"+"-"+parseInt(month_now-1)+"-"+year_now ;
			}		
			else{
			document.getElementById('masadari').value = masadari;
			global_bulantahun = masadari.substr(3, 9);
			//get_pajak_detail2(masadari);
			set_jatuh_tempo(global_bulantahun);
			//langsung hitung denda
			//hitung_denda(bulantahun); //lihat sbg presentase
			//view_denda	= 2*selisih_masa;
			//document.getElementById('view_denda').value = view_denda;
			var masapajak_bulan = document.getElementById('masapajak_bulan').value;
			document.getElementById('omset_masa_pajak').innerHTML = masapajak_bulan ;

			//alert(month_picked + " - " + month_now + " - " +  year_picked + " - " + year_now);

			}
		}else{
			document.getElementById('masadari').value = masadari;
			global_bulantahun = masadari.substr(3, 9);
			set_jatuh_tempo(global_bulantahun);
			var masapajak_bulan = document.getElementById('masapajak_bulan').value;
			document.getElementById('omset_masa_pajak').innerHTML = masapajak_bulan ;
		}

	});
	function GetDate(str,lang) {
		var arr = str.split('-');
		var month = "";
		if (lang=='id')
		var months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];
		if (lang=='en')
		var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		var i = 0;
		for (i; i < months.length; i++) {
		    if (months[i] == arr[1]) {
		        break;
		    }
	}
	i++;
	if (i >= 10) month = i;
	else month = "0" + i;
	var formatddate = arr[0] + '-' + month + '-' + arr[2];
	return formatddate;
	}

	$('#masapajak_bulan').click(function() {
		var lang = 'id' ;
		str = "01"+"-"+document.getElementById('masapajak_bulan').value ;
		masadari = GetDate(str,lang) ;
		document.getElementById('masadari').value = masadari;
		var bulantahun = masadari.substr(3, 9);
		//get_pajak_detail2(masadari);
		set_jatuh_tempo(bulantahun);
		//langsung hitung denda
		hitung_denda(bulantahun); //lihat sbg presentase
		//view_denda	= 2*selisih_masa;
		//document.getElementById('view_denda').value = view_denda;

	});

	$('#dasar','#dasar_temp','view_tarif').keyup(function() {
		//hitung_denda(bulantahun);
		hitung_pajak();
	});

	function hitung_denda(bulantahun){
		var d = new Date();
		var bulan_sekarang = d.getMonth();
		var tahun_sekarang = d.getFullYear();
		var year = parseInt(bulantahun.substr(3,6));
		var month = parseInt(bulantahun.substr(0, 2));

		selisih_tahun = tahun_sekarang-year;
		if(selisih_tahun == 0){
		selisih_masa = bulan_sekarang - month;
	    }
	    else if(selisih_tahun == 1){
		selisih_masa = bulan_sekarang + (12-month);
	    }
	    else if(selisih_tahun == 2){
		selisih_masa = bulan_sekarang + (12-month) + 12;
	    }
	    else {
		selisih_masa = bulan_sekarang + (12-month) + 24;
	    }

		var pajak      = parseFloat($('#pajak').autoNumeric('get'));

		if(selisih_masa>=24){selisih_masa=24;};
		denda=pajak*0.02*selisih_masa;
		//document.getElementById('denda').value = denda
		$('#denda').autoNumeric('set', denda);
		hitung_pajak() ;
		var denda      = parseFloat($('#denda').autoNumeric('get'));
		total_bayar	= denda + pajak  ;
		$('#total_bayar').autoNumeric('set', total_bayar);

		//alert(month);
	}	;

	$(window).load(function(){
		var lang = 'en' ;
		str = "01"+"-"+document.getElementById('masapajak_bulan').value ;
		masadari = GetDate(str,lang) ;
		document.getElementById('masadari').value = masadari;
		var bulantahun = masadari.substr(3, 9);
		//get_pajak_detail2(masadari);
		set_jatuh_tempo(bulantahun);

		var masapajak_bulan = document.getElementById('masapajak_bulan').value;
		document.getElementById('omset_masa_pajak').innerHTML = masapajak_bulan ;

		var isTry = "<? echo $this->session->userdata('isTry') ?>";
		if (isTry != 1){
			reset_omset();
		}
	});

	/* init page */
	$('input[type=file]').bootstrapFileInput();
	
	var c_id  = parseInt(<?=$dt['customer_id']?>);
	var cu_id = parseInt(<?=$this->uri->segment(4);?>);
	if (!isNaN(c_id)) {
		get_cu(c_id, cu_id);
		hitung_pajak();
        
		/* penyesuaian karena wp isi sendiri */
        if (isNaN(cu_id))
            $('#customer_usaha_id').trigger('change');
		$("#type_id option").not(":selected").attr("disabled", "disabled");
		$("#terimatgl, #jatuhtempotgl, type_id, #tarif, #setoran, #lain2, #kenaikan, #kompensasi").attr("readonly", "readonly");
	}	
});

$(document).keypress(function(event){
	if (event.which == '13') {
		event.preventDefault();
	}
});

function reset_omset(){
	for(var i=1; i<=32; i++){ 
		$('#omset'+i).val(0);
		$('#keterangan'+i).val('');
	}
	hitung_dasar();
    hitung_pajak();
}

function ok_omset(){
	<? $this->session->set_userdata('isTry', 1); ?> //jika user bukan sesi pertama x menginput omest
	hitung_dasar();
    hitung_pajak();
}

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

		<?php echo form_open($faction, array('id'=>'myform','class'=>'form-horizontal', 'data-persist'=>'garlic', 'method'=>'POST' , 'enctype'=>'multipart/form-data'));?>
			
	<!-- Modal -->
		<div id="cuDialog" class="modal fade" style="padding-right:40%;">
		<div class="modal-dialog" style="width:60%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"> OMSET BULAN : <text id="omset_masa_pajak"><text></h4>
				</div>
				<div class="modal-body col-sm-12">

				<? 
				$mode = $this->uri->segment(3);
				if ($mode =='edit') { ?>
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
						<? for ($i=17; $i<=32; $i++) { ?>
						<div style="text-align:center;"class="col-sm-2" >
							<? if ($i==32)
								echo "Lainnya";
							   else	
							    echo $i; ?>
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

				<?} else if ($mode=='add') {?>
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
								<input class="form-control memorize" type="text" style="text-align:right;" name="omset<?echo $i?>" id="omset<?echo$i?>" />
								</div>
							</div>
						</div>		
						<div class="row col-sm-6" >
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control memorize" type="text" style="text-align:right;" name="keterangan<?echo $i?>" id="keterangan<?echo $i?>"  />
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
						<? for ($i=17; $i<=32; $i++) { ?>
						<div style="text-align:center;"class="col-sm-2" >
							<? if ($i==32)
								echo "Lainnya";
							   else	
							    echo $i; ?>
						</div>

						<div class="row col-sm-4" >
							<div class="form-group">
								<div class="col-sm-12">
								<input class="form-control memorize" type="text" style="text-align:right;" name="omset<?echo $i?>" id="omset<?echo$i?>" />
								</div>
							</div>
						</div>		
						<div class="row col-sm-6" >
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control memorize" type="text" style="text-align:right;" name="keterangan<?echo $i?>" id="keterangan<?echo $i?>" />
								</div>
							</div>
						</div>	
						<? } ?>	
					</div>
				<?} ?>

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
					<button class="btn btn-warning pull-left" onclick="reset_omset()" data-toggle="modal" >Reset</button>
					<button id="ok_omset" name="ok_omset" class="btn btn-primary" onclick="ok_omset()" data-dismiss="modal" >OK!</button>
					<button class="btn btn-danger" onclick="ok_omset()"  data-dismiss="modal" aria-hidden="true">Batal</button>
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
		<?=msg_block();?>
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
					<input type="hidden" name="reload_cu" id="reload_cu"/>
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
						<option value=2> Teller / ATM</option>
						<option value=1 > Transfer </option>
 
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
					<input class="form-control hide" type="text" name="masadari" id="masadari" value="<?=$dt['masadari']?>" placeholder="dd-mm-yyyy" readonly required/> 
				</div>
				<label class="control-label col-sm-1 hide" for="masasd">s/d</label>
				<div class="col-sm-2 ">
					<input class="form-control hide" type="text" name="masasd" id="masasd" value="<?=$dt['masasd']?>" placeholder="dd-mm-yyyy" readonly required/>
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
							<div class="row col-sm-6">
								<div class="form-group">
									<label class="control-label col-sm-4" for="dasar">Dasar</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" style="text-align:right;" name="dasar" id="dasar" value="<?=$dt['dasar']?>" readonly />
										<input class="form-control" type="hidden" style="text-align:right;" name="dasar_view" id="dasar_view" readonly />
											
									</div>
									<div class="col-sm-2">
										<button onclick="hitung_dasar()" type="button" class="btn btn-success" data-toggle="modal" data-target="#cuDialog">Input Omset</button>
									</div>
								</div>	
								<div class="form-group hide">
									<label class="control-label col-sm-4" for="tarif">Tarif</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" style="text-align:right;" name="tarif" id="tarif" value="<?=$dt['tarif']?>" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="tarif">Tarif (%)</label>
									<div class="col-sm-4">
									&nbsp;
									</div>
									<div class="col-sm-2">
										<input class="form-control" type="text" style="text-align:right;" name="view_tarif" id="view_tarif" value="<?=$dt['tarif']*100?>" readonly />
									</div>
								</div>
								<div class="form-group hide">
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


								<div class="form-group hide">		
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
</div>

			<br>
			<div class="col-sm-12" >
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button type="button" class="btn" id="btn_cancel">Batal / Kembali</button>
			<p>&nbsp;</p>
			</div>

		<?php echo form_close();?>
</div>
</div>
</div>
<? $this->load->view('_foot'); ?>
