        <div class="reg_input" style="padding-bottom: 50px;">
            <center><h2>DAFTAR TOWER</h2>
            <table class="tabel_theme">
                <thead>
                    <tr>
                        <td style="width: 80px">SIDE_ID</td>
                        <td  style="width: 160px">PEMILIK</td>
                        <td style="width: 280px">SITE_ADDRESS</td>
                        <td>TINGGI</td>
                        <td>UKURAN</td>
                        <td>LUAS</td>
                        <td>STATUS</td>
                    </tr>
                </thead>
            <?php foreach ($list_tower->result() as $t) { ?>
                <tbody>
                    <tr>
                        <td><a href="<?php echo site_url()?>/tower/edit/<?php echo $t->TOWER_ID; ?>"><?php echo $t->TOWER_SIDE_ID; ?></a></td>
                        <td><?php echo $t->PENYEDIA_NAMA; ?></td>
                        <td><?php echo $t->TOWER_SITE_ADDRESS; ?></td>
                        <td><?php echo $t->TOWER_HEIGHT; ?></td>
                        <td><?php echo $t->TOWER_UKURAN_TANAH; ?></td>
                        <td><?php echo $t->TOWER_LUAS_TANAH; ?></td>
                        <td><?php echo $t->STATUS_TOWER; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
            </table>
            </center>
        </div>
        
        
        </div>
</div>    
