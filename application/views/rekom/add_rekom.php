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
        
        echo form_open_multipart('rekom/rekom_validation');

        echo validation_errors();
        echo '<h2 align="center" class="form-signin-heading">Buat Rekomendasi</h2>';
      ?>
    <tr>
        <td>Tower ID :</td>
        <td><input id="" type="text" name="id" value=""/></td>
    </tr>    
    <tr>
        <td>Tanggal Registrasi : </td>
        <td><input id="tanggal" type="text" name="tgl" value=""/></td>
    </tr>    
    <tr>
        <td>Status : </td>
        <td><input type="radio" name="status" value="Disetujui">Disetujui</input></td>
        <td><input type="radio" name="status" value="Tidak Disetujui">Tidak Disetujui</input></td>
    </tr>    
    <tr>
        <td>Keterangan : </td>
        <td><textarea name="ket" value=""> </textarea></td>
    </tr>        
    <tr>
        <td></td>
        <td><?php echo form_submit('add_submit', 'Tambahkan'); ?></td>
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
