<div class="reg_input">
            <center><h2>DAFTAR TOWER REKOMENDASI</h2>
                <?php
                    $hslquery = $this->db->get("surat_rekomendasi");
                    echo "&nbsp&nbsp&nbspJumlah rekomendasi: ".$hslquery->num_rows();
                ?>
            <table class="tabel_theme">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td style="width: 100px">TOWER ID</td>
                        <td style="width: 180px">TANGGAL REGISTRASI</td>
                        <td style="width: 180px">STATUS</td>
                        <td style="width: 180px">KETERANGAN</td>
                        <td></td>
                    </tr>
                </thead>
            <?php $a=1; foreach ($hslquery->result() as $t) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td><?php echo $t->TOWER_ID; ?></td>
                        <td><?php echo date('d M Y', strtotime($t->SUREK_TANGGAL)) ?></td>
                        <td><?php echo $t->SUREK_STATUS; ?></td>
                        <td><?php echo $t->SUREK_KETERANGAN; ?></td>
                        <td align='center'><a href="<?php echo site_url()  ?>/rekom/cetak_pdf"><img src='<?php echo base_url()  ?>/images/print.ico'/></a></td>
                    </tr>
                </tbody>
            <?php $a++; } ?>
            </table>
        </div>
        
        
        </div>
</div>    