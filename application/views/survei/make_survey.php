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
    <h3 style="text-align: center">Buat Perencanaan Survei</h3>
<?php echo form_open("survei/survei_validation"); ?>
    <table >
        <!--<tr>
            <td>ID SURVEY </td>
            <td><input type="text" name="id_survey" value=""/></td>
        </tr>-->
                     
        <tr>
            <td>ID TOWER </td>
            <td colspan='2'><input type="text" name="id_tower" value=""/></td>
        </tr>
        <tr>
            <td>JENIS SURVEY</td>
            <td><input type="radio" name="jenis_survey_id" value="Survey Berkala">Survey Berkala</input></td>
            <td><input type="radio" name="jenis_survey_id" value="Survey Lapangan">Survey Lapangan</input></td>
        </tr>
        <tr>
            <td>ALASAN SURVEY</td>
            <td colspan='2'><input type="text" name="survey_alasan" value=""/></td>
        </tr>
        <tr>
            <td>RENCANA TANGGAL SURVEY</td>
            <td colspan='2'><input type="text" id="tanggal" name="survey_tgl_rencana" value=""/></td>
        </tr>
        <tr>
            <td>TANGGAL SURVEY</td>
            <td colspan='2'><input type="text" id="tanggal" name="survey_tgl" value=""/></td>
        </tr>
        <tr>
            <td></td>
            <td><input id="form_but" class="but" type="submit" value="Tambahkan" /></td>
        </tr>
    </table>   
<?php
	echo form_close();
?>
      
    
        </div>
</div>    
