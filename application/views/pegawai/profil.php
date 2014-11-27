
    <?php
            $hslquery = $this->db->get("pegawai");
            echo '<h2 align=center>Biodata</h2>';
    
            if($this->session->userdata('pegawai_nama')){ 
                $query = $this->db->get_where('pegawai', array('PEGAWAI_NAMA '=> $this->session->userdata('pegawai_nama')));
            }
    ?>
<div class="reg_input">  
<table>
    <?php foreach ($query->result() as $t) { ?>
        <tr>
            <td>NIP </td>
            <td>:</td>
            <td><?php echo $t->PEGAWAI_ID; ?></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><?php echo $t->PEGAWAI_NAMA; ?></td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td>:</td>
            <td><?php echo $t->PEGAWAI_ALAMAT; ?></td>
        </tr>
        <tr>
            <td>No. Handphone</td>
            <td>:</td>
            <td><?php echo $t->PEGAWAI_NO_HP; ?></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td>:</td>
            <td><?php echo $t->PEGAWAI_NO_TELP; ?></td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td>:</td>
            <td><?php echo date('d M Y', strtotime($t->PEGAWAI_TTL)); ?></td>
        </tr>
        <tr>
            <td>JABATAN</td>
            <td>:</td>
            <td><?php echo $t->PEGAWAI_JABATAN; ?></td>
        </tr>
        <tr>
            <td>AGAMA</td>
            <td>:</td>
            <td><?php echo $t->PEGAWAI_AGAMA; ?></td>
        </tr>
        <tr>
            <td>STATUS</td>
            <td>:</td>
            <td><?php echo $t->PEGAWAI_STATUS; ?></td>
        </tr>

            <?php  } ?>
            </table>
    </div>
        </div>
</div>    
