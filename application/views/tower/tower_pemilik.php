<div class="reg_input" style="margin-bottom: 50px;">
            <center><h2>DAFTAR PEMILIK TOWER</h2>
            <table class="tabel_theme">
                <thead>
                    <tr>
                        <td>No</td>
                        <td  style="width: 300px">PEMILIK</td>
                        <td style="width: 180px">TIPE PEMILIK</td>
                        <td>JUMLAH TOWER</td>
                    </tr>
                </thead>
            <?php $a=1; foreach ($list_pemilik->result() as $t) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td><?php echo $t->PENYEDIA_NAMA; ?></td>
                        <td><?php echo $t->PENYEDIA_TYPE; ?></td>
                        <td><?php echo $t->JUMLAH; ?></td>
                    </tr>
                </tbody>
            <?php $a++; } ?>
            </table>
            </center>
            
        </div>
        
        
        </div>
</div>    
