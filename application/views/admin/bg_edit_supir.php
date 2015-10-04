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
<form method="post" action="<?php echo base_url(); ?>admin/simpan_supir">
<?php
	foreach($edit->result_array() as $e)
	{
		
?>
<table>
<tr>
	<td width="180">Nomor KTP</td>
	<td width="50">:</td>
	<td>
		<input type='hidden' name='noKTP' value="<?php echo $e['no_ktp'] ?>"/>
		<input type="text"  name="noKTPs" disabled value="<?php echo $e['no_ktp']; ?>" maxlength='16' placeholder='Nomor Kartu Tanda Penduduk' class="input-read-only"/>
	</td>
</tr>

<tr>
	<td width="180">Nama Supir</td>
	<td width="50">:</td>	
	<td><input type="text" name="nama" value="<?php echo $e['nama']; ?>" placeholder='Nama Supir' size="50"  class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">No. Rek</td>
	<td width="50">:</td>	
	<td><input type="text" name="noRek" value="<?php echo $e['no_rek']; ?>" placeholder='Nomor Rekening' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Nama Bank</td>
	<td width="50">:</td>	
	<td><input type="text" name="namaBank" value="<?php echo $e['nama_bank']; ?>" placeholder='Nama Bank' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Nama Rek</td>
	<td width="50">:</td>	
	<td><input type="text" name="namaRek" value="<?php echo $e['nama_rek']; ?>" placeholder='Nama Di Rekening' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Kota</td>
	<td width="50">:</td>	
	<td><input type="text" name="kota" value="<?php echo $e['kota']; ?>" placeholder='Kota' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Provinsi</td>
	<td width="50">:</td>	
	<td><input type="text" name="provinsi" value="<?php echo $e['provinsi']; ?>" placeholder='Provinsi' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Alamat</td>
	<td width="50">:</td>	
	<td><input type="text" name="alamat" value="<?php echo $e['alamat']; ?>" placeholder='Alamat Supir' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">No. Telp 1</td>
	<td width="50">:</td>	
	<td><input type="text" name="noTelp" value="<?php echo $e['no_telp']; ?>" placeholder='No. HP Supir' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">No. Telp 2</td>
	<td width="50">:</td>	
	<td><input type="text" name="noTelp1" value="<?php echo $e['no_telp1']; ?>" placeholder='No. HP Supir' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">No. Telp 3</td>
	<td width="50">:</td>	
	<td><input type="text" name="noTelp2" value="<?php echo $e['no_telp2']; ?>" placeholder='No. HP Supir' size="50" class="input-read-only" />	</td>
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