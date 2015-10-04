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
<form method="post" action="<?php echo base_url(); ?>admin/simpan_rincian">
<?php
	foreach($edit->result_array() as $e)
	{
?>
<table>

<tr>
<td width="180">Nama Biaya</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only"  name='namaBiaya' value="<?php echo $e['nama_biaya']; ?>" />
</td>
</tr>
<tr>
<td width="180">Jumlah Biaya</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only" name='jlhBiaya' value="<?php echo $e['jumlah']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Bagian dari Jenis Biaya</td>
<td width="50">:</td>
<td>
<select name='txtJenisBiaya' class='input-read-only'> 
    <option value=''>- Pilih Jenis Biaya -</option>
  <?php
  foreach ($biaya->result_array() as $val) 
  {
    ?>
    <option value='<?php echo $val['id']?>'><?php echo $val['nama_biaya'] ?></option>
    <?php 
  } 
  ?>
</select>
</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Simpan" class="btn-kirim">
<input type="reset" value="Batal" onclick='tutup()' class="btn-kirim">
<input type="hidden" name="kd" value="<?php echo $e['id_rincian']; ?>">
<input type="hidden" name="stts" value="edit"></td>
</tr>

</table>

<?php } ?>

</form>