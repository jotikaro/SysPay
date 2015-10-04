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
function tutup(){
        window.parent.location.reload(true);
      }
</script>
<form method="post" action="<?php echo base_url(); ?>admin/simpan_spbu">
<?php
	foreach($edit->result_array() as $e)
	{
		
?>
<table>
<tr>
	<td width="180">Nama Supir</td>
	<td width="50">:</td>	
	<td><input type="text" name="nama" value="<?php echo $e['nama_spbu']; ?>" placeholder='Nama SPBU' size="50"  class="input-read-only" />	</td>
	<input type="hidden" name="kd" value="<?php echo $e['id']; ?>"/>	
</tr>
<tr>
	<td width="180">Alamat</td>
	<td width="50">:</td>	
	<td><input type="text" name="alamat" value="<?php echo $e['alamat_spbu']; ?>" placeholder='Alamat SPBU' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Email</td>
	<td width="50">:</td>	
	<td><input type="text" name="email" value="<?php echo $e['email_spbu']; ?>" placeholder='Email SPBU' size="50" class="input-read-only" />	</td>
</tr>
<?php } ?>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Update" class="btn-kirim">
<input type="reset" value="Batal" onclick='tutup()' class="btn-kirim">

<input type="hidden" name="stts" value="edit"></td>
</tr>

</table>


</form>