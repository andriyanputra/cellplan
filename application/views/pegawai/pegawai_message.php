            	
<table style="margin:auto;width:50%;">
     <?php
                if(isset($adata)){
            ?>        
    
            <tr>
                <td colspan="4" align="center"><?php echo heading($judulapp,2); ?></td>
            </tr>
            <tr>
                <td><?php echo "NIP : " ?></td>
                <td><?php echo "".$adata["PEGAWAI_ID"]; ?></td>
            
                <td><?php echo "Nama : "; ?></td>
                <td><?php echo "".$adata["PEGAWAI_NAMA"]; ?></td>
            </tr>
            <tr>
                <td><?php echo "Alamat : "; ?></td>
                <td><?php echo "".$adata["PEGAWAI_NO_TELP"]; ?></td>
           
                <td><?php echo "No. HP : "; ?></td>
                <td><?php echo "".$adata["PEGAWAI_NO_HP"]; ?></td>
            </tr>
            <tr>
                <td><?php echo "No. Telp : "; ?></td>
                <td><?php echo "".$adata["PEGAWAI_NO_TELP"]; ?></td>
            
                <td><?php echo "TTL : "; ?></td>
                <td><?php echo "".$adata["PEGAWAI_TTL"]; ?></td>
            </tr>
            <tr>
                <td><?php echo "Jabatan : "; ?></td>
                <td><?php echo "".$adata["PEGAWAI_JABATAN"]; ?></td>
           
                <td><?php echo "Agama : "; ?></td>
                <td><?php echo "".$adata["PEGAWAI_AGAMA"]; ?></td>
            </tr>
            <tr>
                <td><?php echo "Status : "; ?></td>
                <td><?php echo "".$adata["PEGAWAI_STATUS"]; ?></td>
            </tr>
            <?php  } ?>
	</table>

        <hr />

            <h3 class="text-info text-center"><?php echo $message; ?></h3>
            <?php
	
	
	echo br();
	echo br();
	$this->load->view("pegawai/menu");
?>

            
        </div>
</div>    
