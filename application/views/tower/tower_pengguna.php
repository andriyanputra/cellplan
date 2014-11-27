        <div class="reg_input">
            <center><h2>DAFTAR PENGGUNA TOWER</h2>
            <table class="tabel_theme">
                <thead>
                    <tr>
                        <td>No</td>
                        <td  style="width: 300px">PROVIDER PENGGUNA</td>
                        <td style="width: 180px">LAYANAN PENGGUNA</td>
                    </tr>
                </thead>
            <?php $a=1; foreach ($list_pengguna->result() as $t) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td><?php echo $t->PENGGUNA_PROVIDER; ?></td>
                        <td><?php echo $t->PENGGUNA_LAYANAN; ?></td>
                    </tr>
                </tbody>
            <?php $a++; } ?>
            </table>
                </center>
            <a href="<?php echo site_url(); ?>/tower/add_pengguna"></a>
        </div>
        
        
        </div>
</div>    
