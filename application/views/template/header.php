<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo base_url(); ?>static/css/template.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>static/css/accordion.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo base_url() ?>static/js_poly.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>static/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>static/jquery.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=false"></script>
        <!-- Untuk Kalender Jadwal-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/kalender/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/kalender/css/colorbox.css"/>
	<script type="text/javascript" src="<?php echo base_url();?>static/kalender/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>static/kalender/js/jquery.colorbox-min.js"></script>
        <!--Penutup-->

        <title>Cell Plan</title>
    </head>
    <body onload="initialize()">
        <div class="container">
            
                <div class="header">
                    <div class="head960">
                        <a href="<?php echo site_url() ?>"><div class="logo"></div></a>
                        <div class="login-daftar">
                            <ul>
                                <?php if($this->session->userdata('pegawai_nama')){ ?>
                                        <a href="<?php echo site_url() ?>/member"><li><?php echo $this->session->userdata('pegawai_nama'); ?></li></a>
                                        <li>|</li>
                                        <a href="<?php echo site_url() ?>/member/logout"><li>Logout</li></a>
                                <?php } 
                                    else{ ?>
                                        <a href="<?php echo site_url() ?>/member"><li>Login</li></a>
                                        <li>|</li>
                                        <a href="<?php echo site_url() ?>/member"><li>Daftar</li></a>
                                <?php } ?>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="main">
                        