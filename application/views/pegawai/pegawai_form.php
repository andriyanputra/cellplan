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
     <?php
        foreach($query->result() as $r)
        {
            $id = $r->PEGAWAI_ID;
            $nip = $r->PEGAWAI_NIP;
            $nama = $r->PEGAWAI_NAMA;
            $alamat = $r->PEGAWAI_ALAMAT;
            $no_hp = $r->PEGAWAI_NO_HP;
            $no_telp = $r->PEGAWAI_NO_TELP;
            $tgl = date('m/d/Y', strtotime($r->PEGAWAI_TTL));
            $jabatan = $r->PEGAWAI_JABATAN;
            $agama = $r->PEGAWAI_AGAMA;
            $status = $r->PEGAWAI_STATUS;
            $email = $r->PEGAWAI_EMAIL;
        }
        echo '<h2 align="center" class="form-signin-heading">Daftar Pegawai</h2>';
        
      ?>
<form method="post" action="<?php echo site_url() ?>/pegawai/update">
<table style="margin-bottom: 10px;">
    <tr>
        <td>NIP : </td>
        <td colspan='3'><input type="text" name="pegawai_nip" value="<?php echo $nip ?>"/></td>
        <td colspan='3'><input type="hidden" name="pegawai_id"  value="<?php echo $id ?>"/></td>
    </tr>
    <tr>
        <td><?php echo "Nama : "; ?></td>
        <td colspan='6'><input id="" type="text" name="pegawai_nama" value="<?php echo $nama ?>"/></td>
    </tr>    
    <tr>
        <td><?php echo "Alamat : "; ?></td>
        <td colspan='6'><input id="" type="text" name="pegawai_alamat" value="<?php echo $alamat ?>"/></td>
    </tr>    
    <tr>
        <td><?php echo "No. HP : "; ?></td>
        <td colspan='6'><input id="" type="text" name="pegawai_no_hp" value="<?php echo $no_hp ?>"/></td>
    </tr>    
    <tr>
        <td><?php echo "No. Telp : "; ?></td>
        <td colspan='6'><input id="" type="text" name="pegawai_no_telp" value="<?php echo $no_telp ?>"/></td>
    </tr>    
    <tr>
        <td><?php echo "TTL : "; ?></td>
        <td colspan='6'><input id="tanggal" type="text" name="pegawai_ttl" value="<?php echo $tgl ?>"/></td>
    </tr>    
    <tr>
        <td><?php echo "Jabatan : "; ?></td>
        <td>
            <select name="pegawai_jabatan">
                <option value="KEPALA DINAS">KEPALA DINAS</option>
                <option value="ADMIN">ADMIN</option>
                <option value="STAFF">STAFF</option>
            </select>
        </td>
    </tr>    
    <tr>
        <td><?php echo "Agama : "; ?></td>
        <td>
            <select name="pegawai_agama">
                <option value="ISLAM">ISLAM</option>
                <option value="KATHOLIK">KATHOLIK</option>
                <option value="PROTESTAN">PROTESTAN</option>
                <option value="HINDU">HINDU</option>
                <option value="BUDHA">BUDHA</option>
                <option value="KONGHUCHU">KONGHUCU</option>
            </select>
        </td>
    </tr>    
    <tr>
        <td><?php echo "Status : "; ?></td>
        <td>
            <select name="pegawai_status">
                <option value="AKTIF">AKTIF</option>
                <option value="NON-AKTIF">NON-AKTIF</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><?php echo "Email : "; ?></td>
        <td colspan='6'><input type="text" name="pegawai_email" value="<?php echo $email ?>"></input></td>
    </tr>        
    <tr>
        <td></td>
        <td><input type="submit" name="button" value="Edit" /></td>
    </tr>    
     
        </table>
    </form>
</div>
        </div>
</div>    
