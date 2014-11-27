
<script type="text/javascript">
$(document).ready(function(){
	
//Set default open/close settings
$('.acc_container').hide(); //Hide/close all containers
//
//On Click
$('.acc_trigger').click(function(){
        if( $(this).next().is(':hidden') ) { //If immediate next container is closed...
		//$('.acc_trigger').removeClass('active').next().slideUp(); //Remove all .acc_trigger classes and slide up the immediate next container
		$(this).toggleClass('active').next().slideDown(); //Add .acc_trigger class to clicked trigger and slide down the immediate next container
	}else{
            $(this).toggleClass('active').next().slideUp();
        }
	return false; //Prevent the browser jump to the link anchor
});

});
</script>
<div class="backbanner"></div>
<div class="page" >
    <div class="sidebar">
        <h2 class="acc_trigger" id="sasas"><a  href="#">Data Pribadi</a></h2>
        <div class="acc_container">
            <div class="block">
                   <ul>
                       <li><a href="<?php echo site_url() ?>/pegawai/profil">Biodata</a></li>
                       <li><a href="<?php echo site_url() ?>/pegawai/findpass/updatepass">Ganti Password</a></li>
                       <!--<li><a href="<?php //echo site_url() ?>/member/">Aktivitas Terakhir</a></li>-->
                       <li><a href="<?php echo site_url() ?>/pegawai/daftar">Daftar Pegawai</a></li>
                       <li><a href="<?php echo site_url() ?>/pegawai/add_pegawai">Tambah Pegawai Baru</a></li>
                   </ul> 
            </div>
        </div>
        <h2 class="acc_trigger"><a href="#">Data Menara</a></h2>
        <div class="acc_container">
                <div class="block">
                        <ul>
                            <li><a href="<?php echo site_url()  ?>/tower/registration">Registrasi Menara Baru</a></li>
                            <li><a href="<?php echo site_url()  ?>/tower/list_tower">Daftar Menara</a></li>
                            <li><a href="<?php echo site_url()  ?>/tower">Peta Menara</a></li>
                            <li><a href="<?php echo site_url()  ?>/tower/list_pemilik">Daftar Penyedia Menara</a></li>
                            <li><a href="<?php echo site_url()  ?>/tower/list_pengguna">Daftar Pengguna</a></li>
                            
                        </ul> 
                </div>
        </div>   
        <h2 class="acc_trigger"><a href="#">Data GRID</a></h2>
        <div class="acc_container">
                <div class="block">
                        <ul>
                            <li><a href="<?php echo site_url()  ?>/grid">Peta Grid</a></li>
                        </ul> 
                </div>
        </div>   
        <h2 class="acc_trigger"><a href="#">Data Survei</a></h2>
        <div class="acc_container">
                <div class="block">
                        <ul>
                            <li><a href="<?php echo site_url()  ?>/survei/make_survey">Buat Perencanaan Survei</a></li>
                            <li><a href="<?php echo site_url()  ?>/mynotes">Jadwal Survei</a></li>
                            <li><a href="<?php echo site_url()  ?>/survei/daf_survey">Daftar Survei</a></li>
                            <li><a href="<?php echo site_url()  ?>/survei/survei_foto">Foto Survei</a></li>
                        </ul> 
                </div>
        </div>   
        <h2 class="acc_trigger"><a href="#">Administrasi</a></h2>
        <div class="acc_container">
                <div class="block">
                        <ul>
                            <li><a href="<?php echo site_url()  ?>/rekom/add_rekom">Buat Rekomendasi</a></li>
                            <li><a href="<?php echo site_url()  ?>/rekom/daftar">Daftar Rekomendasi</a></li>
                        </ul> 
                </div>
        </div>   
    </div>
    <div class="main_r">
