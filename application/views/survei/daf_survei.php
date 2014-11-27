
<div class="reg_input" style="padding-bottom: 50px;">
	<?php
            $query = $this->db->get("survei");
            echo '<h2 align=center>Daftar Survey</h2>';
            echo "&nbsp&nbsp&nbspJumlah Survey: ".$query->num_rows();
        ?>
	<table class="tabel_theme" align="center">
            <thead>
                <tr>
                    <th style="width: auto">ID Tower</th>
                    <th style="width: 70px">Jenis Survey</th>
                    <th style="width: 200px">Survey Keterangan</th>
                    <th>Tanggal Rencana Survey</th>
                    <th style="width: 80">Tanggal Survey</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($query->result_array() as $row){
                        echo "<tr>";
                        //echo "<td>{$row["SURVEY_ID"]}</td>";
                        echo "<td>{$row["TOWER_ID"]}</td>";
                        echo "<td>{$row["JENIS_SURVEY_ID"]}</td>";
                        echo "<td>{$row["SURVEY_ALASAN"]}</td>";
                        echo "<td>{$row["SURVEY_TANGGAL_RENCANA"]}</td>";
                        echo "<td>{$row["SURVEY_TANGGAL"]}</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
	</table>
        <?php
		//$this->load->view("pegawai/menu");
	?>
</div>

        </div>
</div>    

