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
width:450px;
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
<form method="post" action="<?php echo base_url(); ?>admin/proses_approve">
<?php

	foreach($detail->result_array() as $e)
	{
?>
<table>

<tr>
<td width="280">Tanggal Pengiriman</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only"  name='namaBiaya' value="<?php echo $e['tgl_order']; ?>" />
</td>
</tr>
<tr>
<td width="180">Customer</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['customer']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Alamat Penjemputan</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['alamat_jemput']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Kota Penjemputan</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['tujuan']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Alamat Pengiriman</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['alamat_pengiriman']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Kota Pengiriman</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['kotaAsal']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Produk</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['produk']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Quantity</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['qty']." ".$e['satuan']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Supir</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['nama_supir']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Armada</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['no_polisi']; ?>"/>	
</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
</tr>

</table>
<a href="javascript:print(document)" target="_blank" style="background-color:#fff;border-color:#fff;color:#bbb;margin-top:100px;">
            		<div style='height:8px;' >Print</div>
            </a>
<?php } ?>

</form>