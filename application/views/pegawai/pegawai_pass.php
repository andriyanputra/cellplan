<div class="reg_input" >
    <h3 style="text-align: center">Ganti Password</h3>
<table align="center">
    <?php echo form_open_multipart("$scriptaksi"); ?>
    <tr>
        <td><?php echo "NIP : "; ?></td>
        <td><?php echo form_input($PEGAWAI_ID); ?></td>
    </tr>
    <tr>
        <td><?php echo "New Password : "; ?></td>
        <td><?php echo form_password(""); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_submit("btnSimpan","Update"); ?></td>
    </tr>
</table>
<?php
	echo form_close();
?>
      
</div>


        </div>
</div>    
