<? $this->load->view('_head'); ?>
<style>
body {
    padding-top: 40px; 
}
</style>

<div class="content">
	<div class="container-fluid">
        <div id="msg_helper1" class="alert alert-info">
            Pendaftaran sukses  !!!<br>
            Silahakan melakukan login melalui <a href="<?=base_url();?>"><strong>link ini</strong></a> dengan menggunakan email dan password yang telah Anda buat sebelumnya, untuk mengetahui status pendaftaran.<br>
            Terimakasih.
        </div>
	</div>
</div>
<? $this->load->view('_foot'); ?>