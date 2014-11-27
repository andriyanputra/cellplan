
    <div class="main_r">
        <div style="width:100%; height:500px;border-radius: 5px 5px 5px 5px;">
	<?php
	$valfilter = array(
					"name"=>"valfilter"
					,"id"=>"valfilter"
					,"value"=>"$valfilter"
					,"maxlength"=>"50"
					,"maxsize"=>"20"
				);
	$options = array(
					"PEGAWAI_ID"=>"NIP"
					,"PEGAWAI_NAMA"=>"Nama Pegawai"
				);
	echo heading($judulapp,2);
	echo form_open();
	echo form_label("Filter/Cari :");
	echo form_dropdown("namafield",$options,$namafield);
	echo form_input($valfilter);
	echo form_submit("btnFilter","Filter");
	echo form_close();
	if(!empty($hslquery)){
?>
	<table style="margin:auto;width:80%;border:solid 1px;">
            <tr>
		<th style="border-bottom:solid 1px;">No</th>
		<th style="border-bottom:solid 1px;">Nama </th>
		<th style="border-bottom:solid 1px;">Alamat</th>
		<th style="border-bottom:solid 1px;">No. Hp</th>
                <th style="border-bottom:solid 1px;">No. Telp</th>
                <th style="border-bottom:solid 1px;">TTL</th>
                <th style="border-bottom:solid 1px;">Jabatan</th>
                <th style="border-bottom:solid 1px;">Agama</th>
                <th style="border-bottom:solid 1px;">Status</th>
            </tr>
        <?php
	foreach($hslquery->result_array() as $row){
		echo "<tr>";
		echo "<td align=center>{$row["PEGAWAI_ID"]}</td>";
		echo "<td align=center>{$row["PEGAWAI_NAMA"]}</td>";
		echo "<td align=center>{$row["PEGAWAI_ALAMAT"]}</td>";
		echo "<td align=center>{$row["PEGAWAI_NO_HP"]}</td>";
                echo "<td align=center>{$row["PEGAWAI_NO_TELP"]}</td>";
                echo "<td align=center>{$row["PEGAWAI_TTL"]}</td>";
                echo "<td align=center>{$row["PEGAWAI_JABATAN"]}</td>";
                echo "<td align=center>{$row["PEGAWAI_AGAMA"]}</td>";
                echo "<td align=center>{$row["PEGAWAI_STATUS"]}</td>";
		echo "</tr>";
	}
        ?>
	</table>
        <?php
        }
		$this->load->view("menu");
	?>
        </div>
 
        
        </div>
</div>    

