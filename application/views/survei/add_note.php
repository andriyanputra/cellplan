<div style="width:500px; height:130px; overflow:auto; color:#000000; margin-bottom:20px;" align="center">
	<h4>Tambah catatan untuk tanggal <?php echo "$day $month $year"?></h4>
	<?php echo form_open("mynotes/do_add/$year/$mon/$day");?>
	<table>
		<tr><td>Note</td><td>:</td><td><input type="text" name="note" maxlength="30" size="40" /></td></tr>
		<tr><td colspan="2"></td><td><input type="button" name="Batal" value="Batal" class="cancel">&nbsp;&nbsp;
									 <input type="submit" name="OK" value="OK"></td></tr>
	</table>
	</form>
	<script>	
	$('.cancel').click(function(){
		var data = false;
		$.fn.colorbox.close(data);
	});
	</script>
</div>