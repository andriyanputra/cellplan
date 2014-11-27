<script type="text/javascript"> 
function confirmDelete() { 
 return confirm("Are you sure you want to delete?");   
} 
</script> 

    <div class="reg_input">
            <center><h2>DAFTAR PEGAWAI</h2>
                <?php
                    $hslquery = $this->db->get("pegawai");
                    echo "&nbsp&nbsp&nbspJumlah rekomendasi: ".$hslquery->num_rows();
                ?>
            <table class="tabel_theme">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th style="width: auto">NAMA </th>
                        <th style="width: auto">ALAMAT</th>
                        <th style="width: 70px">NO. HP</th>
                        <th style="width: 70px">NO. TELP</th>
                        <th>TTL</th>
                        <th style="width: auto">JABATAN</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            <?php foreach ($hslquery->result() as $t) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $t->PEGAWAI_NIP; ?></td>
                        <td><?php echo $t->PEGAWAI_NAMA; ?></td>
                        <td><?php echo $t->PEGAWAI_ALAMAT; ?></td>
                        <td><?php echo $t->PEGAWAI_NO_HP; ?></td>
                        <td><?php echo $t->PEGAWAI_NO_TELP; ?></td>
                        <td><?php echo date('d M Y', strtotime($t->PEGAWAI_TTL)) ?></td>
                        <td><?php echo $t->PEGAWAI_JABATAN; ?></td>
                        <td align='center'><a href="<?php echo site_url()?>/pegawai/edit/<?php echo $t->PEGAWAI_ID; ?>"><img src='<?php echo base_url()  ?>/images/edit.ico'/></a></td>
                        <td align='center'><a href="<?php echo site_url()  ?>/pegawai/delete/<?php echo $t->PEGAWAI_ID; ?>" onclick="confirmDelete();"><img src='<?php echo base_url()  ?>/images/delete.ico'/></a></td>
                    </tr>
                </tbody>
            <?php  } ?>
            </table>
        </div>
        
        
        </div>
</div>    
