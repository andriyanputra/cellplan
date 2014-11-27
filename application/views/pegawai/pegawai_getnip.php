
<div class="reg_input" >
<table align="center">
<?php
if($this->pegawai_id)
{   
    echo form_open("$scriptaksi");
    $input = array("name"=>"PEGAWAI_ID","value"=>"");
?>
    <tr>
        <td colspan="2" align="center"><?php echo heading($judulapp,2); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label("Masukkan NIP : "); ?></td>
        <td><?php echo form_input($input); ?></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" align="left"><?php echo form_submit("btn$aksi","Temukan"); ?></td>
    </tr>
<?php
	echo form_close();
}else{
    redirect('member');
}
?>
</table>
</div>

        </div>
</div>    
