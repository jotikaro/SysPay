<style>
as{
text-decoration:none;
color:#fff;
padding:5px;
border:1px solid #333333;
float:left;
background-color:#000;
}
a:hover{
text-decoration:none;
color:#fff;
padding:5px;
border:1px solid #333333;
float:left;
background-color:#666666;
}
bodys{
font-size:12px;
font-family:Tahoma,Arial;
margin:30px;
}
.input-read-onlys {
border: 1px solid #D0D0D0;
padding: 10px;
width:500px;
}

.input-reads{
border: 1px solid #D0D0D0;
padding: 10px;
background-color: #fff;
width:200px;

}

.inputR {
border: 1px solid #D0D0D0;
padding: 10px;
width:180px;
-moz-border-radius: 6px; 
background-color: #abcdef;
color:#333;
}
.btn-kirim {
font-size: 12px;
background-color: #f9f9f9;
border: 1px solid #D0D0D0;
padding: 9px 10px 9px 10px;
color:#000;
cursor:pointer; 
-moz-border-radius: 6px; 
border-radius: 6px;
}
</style>

<?php	
	$no=0; $i=0;
	if(count($bank->result_array())>0)
	{
		foreach($bank->result_array() as $k)
		{
			echo "Nama di Rekening  <br/><input disabled class='inputR' name='pemilik' type='text' value='".$k['nama_rek']."'/><input name='txtNamaBank' type='hidden' value='".$k['nama_bank']."'/><input name='txtNamaBX' type='hidden' value='".$k['nama_rek']."'/>";
			echo "&nbsp;<br/>";
			echo "Nomor Rek  <br/><input disabled class='inputR' name='noRek' type='text' value='".$k['no_rek']."'/><input name='txtNoRX' type='hidden' value='".$k['no_rek']."'/>";
			echo "<input type='hidden' name='id' value='".$k['id']."'/>";
			echo "<br/>";
			$i++;
		}
		$no++;
	}

	echo "</div>";
    ?>