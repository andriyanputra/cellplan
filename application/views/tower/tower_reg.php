<script type="text/javascript" src="<?php echo base_url() ?>static/js_poly_tower_register.js"></script>
<script type="text/javascript">
      var script = '<script type="text/javascript" src="<?php echo base_url()?>static/markerclusterer';
      if (document.location.search.indexOf('compiled') !== -1) {
        script += '_compiled';
      }
      script += '.js"><' + '/script>';
      document.write(script);
</script>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" id="site_url" value="<?php echo site_url(); ?>" />      


        <div id="map_canvas" style="width:100%; height:300px;border-radius: 5px 5px 5px 5px;"></div>
        
        <div class="reg_input">
            <table>
                    <tr>
                        <td>Penyedia Tower</td>
                        <td>
                            <select id="box_penyedia" name="pnyedia">
                                <option value="0" >PILIH PENYEDIA TOWER</option>
                                <?php foreach ($list_pemilik->result() as $r) { ?>
                                    <option value="<?php echo $r->PENYEDIA_ID; ?>" ><?php echo $r->PENYEDIA_NAMA; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                         <td>Kecamatan</td>
                         <td>
                             <form id="kecamatan_form" method="post" action="<?php echo site_url('grid/get_desa_kec'); ?>">
                                <select id="box_kecamatan" name="kecamatan">
                                    <option value="-1">All Kecamatan</option>
                                    <?php foreach ($list_kecamatan->result() as $r) { ?>
                                       <option value="<?php echo $r->KECAMATAN_ID; ?>" ><?php echo $r->KECAMATAN_NAMA; ?></option>
                                   <?php } ?>
                                </select>
                             </form>
                         </td>
                     </tr>
                     <tr>
                         <td>Kelurahan/Desa</td>
                         <td>
                             <select id="box_desa" name="desa">
                                 <option value="-1">Pilih Kecamatan</option>
                             </select>
                         </td>
                     </tr>
            <?php echo form_open_multipart('tower/registration');?>
                    <tr>
                         <td>Lat</td>
                         <td><input id="lat" type="text" name="lat" value=""/></td>
                         <td>
                             <input id="id_perusahaan" type="hidden" name="id_perusahaan" value=""/>
                             <input id="id_desa" type="hidden" name="id_desa" value=""/>
                         </td>
                      </tr>
                     <tr>
                         <td>Lng</td>
                         <td><input id="lng" type="text" name="lng" value=""/></td>
                         <td>
                             <span onclick="change_lat_lng()" style="cursor: pointer; height: 30px; padding: 5px; background: #333; color: #fff;" >Cek Koordinat</span>
                         </td>
                         
                     </tr>
                     <tr>
                         <td>Side ID </td>
                         <td><input type="text" name="side_id" value=""/></td>
                     </tr>
                     <tr>
                         <td>Alamat</td>
                         <td><input type="text" name="site_addr" value=""/></td>
                     </tr>
                      <tr>
                         <td>Alamat pada peta</td>
                         <td><input id="map_addrs" type="text" name="map_addr" value=""/></td>
                     </tr>
                     <tr>
                         <td>Jenis Jalan</td>
                         <td><input type="text" name="jalan" value=""/></td>
                     </tr>
                     <tr>
                         <td>Site Type</td>
                         <td><input type="text" name="site_type" value=""/></td>
                     </tr>
                     <tr>
                         <td>Tipe</td>
                         <td><input type="text" name="type" value=""/></td>
                     </tr>
                     <tr>
                         <td>Tinggi</td>
                         <td><input type="text" name="height" value=""/></td>
                     </tr>
                     <tr>
                         <td>Ukuran Tanah</td>
                         <td><input type="text" name="ukuran" value=""/></td>
                     </tr>
                     <tr>
                         <td>Luas Tanah</td>
                         <td><input type="text" name="luas" value=""/></td>
                     </tr>
                     <tr>
                         <td></td>
                         <td><input id="form_but" class="but" type="submit" value="Tambahkan" /></td>
                     </tr>
                     <tr>
                         <td></td>
                         <td><?php echo $ket; ?>                
                              <?php echo validation_errors(); ?>
                         </td>
                     </tr>
                 </table>
             <?php form_close() ?>  
        </div>
        
        
        </div>
</div>    
