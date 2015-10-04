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
<script type="text/javascript"> 
      counter = 0;
	  function action(var id)
	  {
		counterNext = counter + 1;		
	document.getElementById("input"+counter).innerHTML = "<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type='text' class='input-read-only' name='namaBiaya"+counter+"' style='width:175px;' placeholder='Nama Biaya "+(counterNext+1)+"'></td>&nbsp;<input type='text' name='jlhBiaya"+(counter)+"' style='width:100px'  placeholder='Jumlah Biaya "+ (counterNext+1)+"' class='input-read-only' /><div id='input'+counterNext+''></div></tr>";
		counter++;
	  }

	  function tutup(){
        window.parent.location.reload(true);
      }

    </script>

<form method="post" action="<?php echo base_url(); ?>admin/simpan_bank">
<?php
$i=0;
	foreach($edit->result_array() as $e)
	{
		
		$i++;
?>
<table>
<tr>
<td width="180">Nama Bank</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only" name='namaBank' value="<?php echo $e['nama_bank']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Nama di Rekening</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only"  name='namaRek' value="<?php echo $e['nama_rek']; ?>" />
</td>
</tr>
<tr>
<td width="180">Nomor Rekening</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only" name='noRek' value="<?php echo $e['no_rek']; ?>"/>	
</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Simpan" class="btn-kirim">
<input type="reset" onclick='tutup()' value="Batal" class="btn-kirim">
<input type="hidden" name="id" value="<?php echo $e['id']; ?>">
<input type="hidden" name="stts" value="edit"></td>
</tr>

</table>

<?php } ?>

</form>