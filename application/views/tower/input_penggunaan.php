        <div class="reg_input">
            <center><h2>PENGGUNAAN TOWER</h2>
            </center>
            <table>
                    <tr>
                        <td>Penyedia Tower</td>
                        <td>
                            <select id="pengguna" name="pengguna">
                                <option value="0" >PILIH PENGGUNA TOWER</option>
                                <?php foreach ($list_pengguna->result() as $r) { ?>
                                    <option value="<?php echo $r->PENGGUNA_ID; ?>" ><?php echo $r->PENGGUNA_NAMA; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
            </table>
            
        </div>
        
        
        </div>
</div>    
