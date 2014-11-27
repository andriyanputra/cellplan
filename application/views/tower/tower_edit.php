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

<script type="text/javascript" src="<?php echo base_url() ?>static/js_poly_tower_edit.js"></script>
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
        <div class="tap_menu">
            <ul>
                <li id="tap1" onclick="open_page_tap(1)">Edit Data</li>
                <li id="tap2" onclick="open_page_tap(2)">Daftar Penggunaan Tower</li>
                <li id="tap3" onclick="open_page_tap(3)">Masukkan Penggunaan Tower</li>
                <li id="tap4" onclick="open_page_tap(4)">Detail Transaksi</li>
                <li id="tap5" onclick="open_page_tap(5)">Data Survei</li>
            </ul>
        </div>
        
        <div class="reg_input">
            <?php $data_tower = $detail_tower->result(); 
                  $twr = $data_tower[0];
                  $data_reg = $data_transaksi_pendaftaran->result();
                  if($data_reg) $rd = $data_reg[0];
                  
            ?>
            <div id="page_1">
            
            <table>
                    <tr>
                        <td>Penyedia Tower</td>
                        <td>
                            <select id="box_penyedia" name="pnyedia">
                                <option value="0" >PILIH PENYEDIA TOWER</option>
                                <?php foreach ($list_pemilik->result() as $r) { ?>
                                    <?php if($twr->PENYEDIA_ID == $r->PENYEDIA_ID) { ?>
                                        <option selected=""  value="<?php echo $r->PENYEDIA_ID; ?>" ><?php echo $r->PENYEDIA_NAMA; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $r->PENYEDIA_ID; ?>" ><?php echo $r->PENYEDIA_NAMA; ?></option>
                                    <?php } } ?>
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
                                    <?php if($twr->KECAMATAN_ID == $r->KECAMATAN_ID) { ?>
                                        <option selected="" value="<?php echo $r->KECAMATAN_ID; ?>" ><?php echo $r->KECAMATAN_NAMA; ?></option>
                                    <?php } else { ?>
                                       <option value="<?php echo $r->KECAMATAN_ID; ?>" ><?php echo $r->KECAMATAN_NAMA; ?></option>
                                    <?php } } ?>
                                </select>
                             </form>
                         </td>
                     </tr>
                     <tr>
                         <td>Kelurahan/Desa</td>
                         <td>
                             
                             <select id="box_desa" name="desa">
                                    <option value="-1">All Desa</option>
                                    <?php foreach ($list_desa->result() as $r) { ?>
                                    <?php if($twr->DESA_ID == $r->DESA_ID) { ?>
                                        <option selected="" value="<?php echo $r->DESA_ID; ?>" ><?php echo $r->DESA_NAMA; ?></option>
                                    <?php } else { ?>
                                       <option value="<?php echo $r->DESA_ID; ?>" ><?php echo $r->DESA_NAMA; ?></option>
                                    <?php } } ?>
                                </select>
                         </td>
                     </tr>
                    <?php echo form_open_multipart('tower/edit/'.$twr->TOWER_ID);?>
                    <tr>
                         <td>Lat</td>
                         <td><input id="lat" type="text" name="lat" value="<?php echo $twr->TOWER_LAT; ?>"/></td>
                         <td>
                             <input id="id_perusahaan" type="hidden" name="id_perusahaan" value="<?php echo $twr->PENYEDIA_ID; ?>"/>
                             <input id="id_desa" type="hidden" name="id_desa" value="<?php echo $twr->DESA_ID; ?>"/>
                         </td>
                      </tr>
                     <tr>
                         <td>Lng</td>
                         <td><input id="lng" type="text" name="lng" value="<?php echo $twr->TOWER_LNG; ?>"/></td>
                         <td>
                             <span onclick="change_lat_lng()" style="cursor: pointer; height: 30px; padding: 5px; background: #333; color: #fff;" >Cek Koordinat</span>
                         </td>
                         
                     </tr>
                     <tr>
                         <td>Side ID </td>
                         <td><input type="text" name="side_id" value="<?php echo $twr->TOWER_SIDE_ID; ?>"/></td>
                     </tr>
                     <tr>
                         <td>Alamat</td>
                         <td><input type="text" name="site_addr" value="<?php echo $twr->TOWER_SITE_ADDRESS; ?>"/></td>
                     </tr>
                      <tr>
                         <td>Alamat pada peta</td>
                         <td><input id="map_addrs" type="text" name="map_addr" value="<?php echo $twr->TOWER_MAP_ADDRESS; ?>"/></td>
                     </tr>
                     <tr>
                         <td>Jenis Jalan</td>
                         <td><input type="text" name="jalan" value="<?php echo $twr->TOWER_JENIS_JALAN ; ?>"/></td>
                     </tr>
                     <tr>
                         <td>Site Type</td>
                         <td><input type="text" name="site_type" value="<?php echo $twr->TOWER_SITE_TYPE ; ?>"/></td>
                     </tr>
                     <tr>
                         <td>Tipe</td>
                         <td><input type="text" name="type" value="<?php echo $twr->TOWER_TYPE ; ?>"/></td>
                     </tr>
                     <tr>
                         <td>Tinggi</td>
                         <td><input type="text" name="height" value="<?php echo $twr->TOWER_HEIGHT ; ?>"/></td>
                     </tr>
                     <tr>
                         <td>Ukuran Tanah</td>
                         <td><input type="text" name="ukuran" value="<?php echo $twr->TOWER_UKURAN_TANAH ; ?>"/></td>
                     </tr>
                     <tr>
                         <td>Luas Tanah</td>
                         <td><input type="text" name="luas" value="<?php echo $twr->TOWER_LUAS_TANAH ; ?>"/></td>
                     </tr>
                     <tr>
                         <td></td>
                         <td><input id="form_but" class="but" type="submit" value="Edit Data" /></td>
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
            <div id="page_4" style="display: none; padding-bottom: 50px;">
                <h3>Transaksi Pendaftaran</h3> 
                <?php if($data_reg) { ?>
                <table>
                        <tr>
                            <td>Pegawai Pendaftar</td>
                            <td> : </td>
                            <td><?php echo $rd->PEGAWAI_NAMA; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Registrasi</td>
                            <td> : </td>
                            <td><?php echo date('d M Y  H:i:s', strtotime($rd->REGISTRASI_TANGGAL)); ?></td>
                        </tr>
                        <tr>
                            <td>Penyedia Tower</td>
                            <td> : </td>
                            <td><?php echo $rd->PENYEDIA_NAMA; ?></td>
                        </tr>
                        <tr>
                            <td>Tower Side Id</td>
                            <td> : </td>
                            <td><?php echo $rd->TOWER_SIDE_ID; ?></td>
                        </tr>
                </table>
                <?php } else { echo "Tidak Terdata"; } ?>
                <h3>Status</h3>  
                <table>
                        <tr>
                            <td>Status Tower Sekarang</td>
                            <td> : </td>
                            <td><?php echo $twr->STATUS_TOWER; ?></td>
                        </tr>
                </table>
                <h3>Histori Transaksi Perubahan Status</h3> 
                <table class="tabel_theme" style="margin-left: 5px">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td style="width: 150px">Tower Side Id</td>
                            <td style="width: 100px">Status</td>
                            <td style="width: 170px">Tanggal Transaksi</td>
                            <td style="width: 250px">Pegawai</td>
                            
                        </tr>
                    </thead>
                <?php $a=1; foreach ($data_transaksi_status->result() as $dts) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $a; ?></td>
                            <td><?php echo $dts->TOWER_SIDE_ID; ?></td>
                            <td><?php echo $dts->STATUS_TOWER; ?></td>
                            <td><?php echo date('d M Y', strtotime($dts->TRANSAKSI_STATUS_TIME )) ?></td>
                            <td><?php echo $dts->PEGAWAI_NAMA; ?></td>
                        </tr>
                    </tbody>
                <?php $a++; } ?>
                </table>
            </div>
            <div id="page_2" style="display: none; padding-bottom: 50px;">
               <h3>Daftar Penggunaan Tower</h3>
                <table class="tabel_theme">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td style="width: 150px">Provider Pengguna</td>
                            <td style="width: 180px">Provider Layanan</td>
                            <td style="width: 120px">Tanggal</td>
                            <td style="width: 50px">Tinggi</td>
                            
                        </tr>
                    </thead>
                <?php $a=1; foreach ($list_penggunaan->result() as $t) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $a; ?></td>
                            <td><?php echo $t->PENGGUNA_PROVIDER; ?></td>
                            <td><?php echo $t->PENGGUNA_LAYANAN; ?></td>
                            <td><?php echo date('d M Y', strtotime($t->PENGGUNAAN_TOWER_TANGGAL)) ?></td>
                            <td><?php echo $t->KETINGGIAN_ANTENA; ?></td>
                            
                        </tr>
                    </tbody>
                <?php $a++; } ?>
                </table>
                
            </div>
            <div id="page_3" style="display: none; margin-bottom: 30px;">
                <center><h3>Masukkan Penggunaan Tower</h3></center>
                <?php echo form_open_multipart('tower/tambah_pengguna/'.$twr->TOWER_ID);?>
                <table>
                        <tr>
                            <td>Penyedia Tower</td>
                            <td>
                                <select id="pengguna" name="id_pengguna">
                                    <option value="0" >PILIH PENGGUNA TOWER</option>
                                    <?php foreach ($list_pengguna->result() as $r) { ?>
                                        <option value="<?php echo $r->PENGGUNA_ID; ?>" ><?php echo $r->PENGGUNA_PROVIDER." | ".$r->PENGGUNA_LAYANAN; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Penggunan</td>
                            <td>
                                <input id="tanggal" type="text" name="tanggal" value=""/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ketinggian Antena</td>
                            <td>
                                <input type="text" name="tinggi" value=""/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input id="form_but" class="but" type="submit" value="Masukkan" /></td>
                        </tr>
                        <?php form_close() ?>  
                </table>
            </div>
            
            
        </div>
        
        
        </div>
</div>    
