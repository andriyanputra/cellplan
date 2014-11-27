<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url().'static/datepicker/jquery-ui-1.9.1.custom.css'?>" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url().'static/datepicker/jquery-ui-timepicker-addon.css'?>" />

<script type="text/javascript" src="<?php echo base_url().'static/datepicker/jquery-1.8.2.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'static/datepicker/jquery-ui.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'static/datepicker/jquery-ui-timepicker-addon.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'static/datepicker/jquery-ui-sliderAccess.js'?>"></script>
<script type="text/javascript">
    $(function(){
        $('#tanggal').datepicker();
    });
</script>

<div class="reg_input" >
    <table style="margin-bottom: 10px;">
     <?php
        
        echo form_open_multipart('pegawai/pegawai_validation');

        echo validation_errors();
        echo '<h2 align="center" class="form-signin-heading">Daftar Pegawai</h2>';
      ?>
    <tr>
        <td>NIP : </td>
        <td colspan='6'><?php echo form_input('pegawai_nip', $this->input->post('pegawai_nip')); ?></td>
    </tr>
    <tr>
        <td><?php echo "Nama : "; ?></td>
        <td colspan='6'><input id="" type="text" name="pegawai_nama" value=""/></td>
    </tr>    
    <tr>
        <td><?php echo "Alamat : "; ?></td>
        <td colspan='6'><input id="" type="text" name="pegawai_alamat" value=""/></td>
    </tr>    
    <tr>
        <td><?php echo "No. HP : "; ?></td>
        <td colspan='6'><input id="" type="text" name="pegawai_no_hp" value=""/></td>
    </tr>    
    <tr>
        <td><?php echo "No. Telp : "; ?></td>
        <td colspan='6'><input id="" type="text" name="pegawai_no_telp" value=""/></td>
    </tr>    
    <tr>
        <td><?php echo "TTL : "; ?></td>
        <td colspan='6'><input id="tanggal" type="text" name="pegawai_ttl" value=""/></td>
    </tr>    
    <tr>
        <td><?php echo "Jabatan : "; ?></td>
        <td colspan='2'><input type="radio" name="pegawai_jabatan" value="KEPALA DINAS">KEPALA DINAS</input></td>
        <td colspan='2'><input type="radio" name="pegawai_jabatan" value="ADMIN">ADMIN</input></td>
        <td colspan='2'><input type="radio" name="pegawai_jabatan" value="STAFF">STAFF</input></td>
    </tr>    
    <tr>
        <td><?php echo "Agama : "; ?></td>
        <td><input type="radio" name="pegawai_agama" value="ISLAM">ISLAM</input></td>
        <td><input type="radio" name="pegawai_agama" value="KATHOLIK">KATHOLIK</input></td>
        <td><input type="radio" name="pegawai_agama" value="PROTESTAN">PROTESTAN</input></td>
        <td><input type="radio" name="pegawai_agama" value="HINDU">HINDU</input></td>
        <td><input type="radio" name="pegawai_agama" value="BUDHA">BUDHA</input></td>
        <td><input type="radio" name="pegawai_agama" value="KONGHUCHU">KONGHUCHU</input></td>
    </tr>    
    <tr>
        <td><?php echo "Status : "; ?></td>
        <td colspan='3'><input type="radio" name="pegawai_status" value="AKTIF">AKTIF</input></td>
        <td colspan='3'><input type="radio" name="pegawai_status" value="NON-AKTIF">NON-AKTIF</input></td>
    </tr>
    <tr>
        <td><?php echo "Email : "; ?></td>
        <td colspan='6'><?php echo form_input('pegawai_email'); ?></td>
    </tr>    
    <tr>
        <td><?php echo "Password : "; ?></td>
        <td colspan='6'><?php echo form_password('pegawai_password'); ?></td>
    </tr>    
    <tr>
        <td><?php echo "Confirm Password : "; ?></td>
        <td colspan='6'><?php echo form_password('pegawai_cpassword'); ?></td>
    </tr>    
    <tr>
        <td></td>
        <td><?php echo form_submit('add_submit', 'Daftarkan'); ?></td>
    </tr>    
     <?php
        echo form_close();


        /*
         * To change this template, choose Tools | Templates
         * and open the template in the editor.
         */
        ?>
        </table>
</div>
        </div>
</div>    
