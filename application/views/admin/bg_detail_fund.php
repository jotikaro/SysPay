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
<form method="post" action="#">
<?php
	
	foreach($detail->result_array() as $e)
	{
?>
<table>

<tr>
<td width="180">Tanggal Pemesanan</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only"  name='tglPesan' value="<?php echo $e['tgl_order']; ?>" />
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
<td width="180">Alamat Pengiriman</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['alamat_pengiriman']; ?>"/>	
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
	<input type="hidden" name="kdAlamat" value="<?php echo $e['kd_alamat_jemput']; ?>">
	<input type="hidden" name="idAlamat" value="<?php echo $e['id_alamat_jemput']; ?>">
	<input type="hidden" name="ktp" value="<?php echo $e['no_ktp']; ?>">
</td>
</tr>
<?php  } 

$total ="";
foreach($detailLanjut->result_array() as $e)
	{
		//$total+=$e['biaya'];
?>
<!--<tr>
<td width="180">Biaya Pengiriman</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php //echo  "Rp. ".number_format ($e['biaya'], 2, ',', '.'); ?>"/>	
</td>
</tr>-->
<tr>
<td width="180">Jumlah BBM</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php if(substr($e['jlh_bbm_atau_rupiah'],-3) != "Ltr" ) {
			echo number_format ($e['jlh_bbm_atau_rupiah'], 2, ',', '.'); 			
		}
		else
			echo $e['jlh_bbm_atau_rupiah'];  ?>"/>	
</td>
</tr>
<tr>
<td width="180">Bank Sumber Saldo</td>
<td width="50">:</td>
<td>
	<input type='text' disabled name='txtBank' class='input-read-only' id='b' value='<?php echo $e['bank']; ?>'/>
</tr>
<tr>
<td width="180">Biaya Tambahan</td>
<td width="50">:</td>
<td>
	<?php 
	$tot="";		
		$a = explode("/",$e['kd_biaya_rincian']);
		echo "<table border='1' cellpadding='5' cellspacing='0' width='100%'>";
		echo "<tr bgcolor='#fe0'><th>Jenis Biaya</th><th>Jumlah</th></tr>";
		$q = $this->db->query("select * from tbl_detail_biaya where kd_biaya_detail=".$e['kd_biaya_rincian']."");
			
			if($q->num_rows() > 0)
			{					
				foreach($q->result() as $row){ ?>
					<tr><td><?php echo $row->nama_biaya; ?></td>
					<td><?php echo  "Rp. ".number_format ($row->jumlah_biaya, 2, ',', '.'); ?></td></tr>
					<?php
					$total+= ($row->jumlah_biaya*1);
				}
			}			
		echo "<tr><th>Total</th><td>Rp. ".number_format ($total, 2, ',', '.')."</td></tr>";
		echo "</table>";
		//echo substr($e['jlh_bbm_atau_rupiah'],-3) ;
		if(substr($e['jlh_bbm_atau_rupiah'],-3) != "Ltr" ) {
			$total+=$e['jlh_bbm_atau_rupiah']; 
		}
	?>	
</td>
</tr>
<tr>
<td width="180">Biaya Total</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo "Rp. ".number_format ($total, 2, ',', '.'); ?>"/>	
</td>
</tr>
<tr>
<td width="180">Tanggal Kirim</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['tgl_kirim']; ?>"/>	
</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="hidden" name="kdLanjut" value="<?php echo $e['id']; ?>">
<input type="hidden" name="jlhBiaya" value="<?php echo $total; ?>">
<?php if($st == "not"){ ?>

<?php }else{ echo "<span style='color:#f0a;font-style:italic'>Order ini sudah dicatat!</span>"; } ?>
</td>
</tr>

</table>

<?php } ?>

</form>