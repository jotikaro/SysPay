<!DOCTYPE html>

<style>
a{
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
body{
font-size:12px;
font-family:Tahoma,Arial;
margin:30px;
}
.input-read-only {
border: 1px solid #D0D0D0;
padding: 10px;
width:500px;
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
<script type='text/javascript'>
	function off(){
		document.getElementById("jlhBBM").hidden=true;		
	}
	function show(){
		document.getElementById("jlhBBM").hidden=false;					
	}

	function tutup(){
        window.parent.location.reload(true);
      }
</script>
<body onload='off()'>
<form method="post" action="<?php echo base_url(); ?>admin/simpan_armada">
<?php
	foreach($edit->result_array() as $e)
	{
?>
<table>
<tr>
	<td width="180">Nomor Polisi</td>
	<td width="50">:</td>
	<td>
		<input type="text"  name="nopol" id="nama" value='<?php echo $e['no_polisi']; ?>' placeholder='Nomor Polisi' class="input-read-only"/>
	</td>
</tr>

<tr>
	<td width="180">Kapasitas</td>
	<td width="50">:</td>	
	<td><input type="text" name="kapasitas" value='<?php echo $e['kapasitas']; ?>' placeholder='Kapasitas dalam satuan Kg' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Merk</td>
	<td width="50">:</td>	
	<td><input type="text" name="merk" value='<?php echo $e['merk']; ?>' placeholder='Kapasitas dalam satuan Kg' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Tipe</td>
	<td width="50">:</td>	
	<td><input type="text" name="tipe" value='<?php echo $e['tipe']; ?>' placeholder='Kapasitas dalam satuan Kg' size="50" class="input-read-only" />	</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Simpan" class="btn-kirim">
<input type="reset" onclick='tutup()' value="Batal" class="btn-kirim">
<input type="hidden" name="kd_armada" value="<?php echo $e['id']; ?>">
<input type="hidden" name="stts" value="edit"></td>
</tr>

</table>

<?php } ?>

</form>
</body>