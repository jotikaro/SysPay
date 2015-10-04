
<?php
	echo "<div>";	
	echo "<h3>Rincian Biaya</h3>";
	echo "<div>";
	$no=0; $i=0;
	if(count($rincian->result_array())>0)
	{
		foreach($rincian->result_array() as $k)
		{
			echo "<input class='input-read' name='nama$i' type='text' style='width:175px;' value='".$k['nama_biaya']."'/>";
			echo "&nbsp;";
			echo "<input class='input-read' name='jumlah$i' type='text' style='width:100px;' value='".$k['jumlah']."'/>";
			echo "<input type='hidden' name='kdRt$no' value='".$k['id_rincian']."'/>";
			echo "<br/>";
			$i++;
		}
		$no++;
	}
	else{
		echo "<option>Rincian Biaya Tambahan Tidak Ada</option>";
	}
	echo "</div>";
    ?>