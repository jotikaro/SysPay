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
  	function lostLtr(){		
	   var st = document.getElementById("ceks").checked;
	   if(st == true){
		   document.getElementById("inputmu").style.visibility= '';
		   document.getElementById("inputmu").style.marginLeft = "0px";
		   document.getElementById("inputmu").style.visibility = '';
		}else{
			document.getElementById("inputmu").style.visibility= 'hidden';
		   document.getElementById("inputmu").style.marginLeft = "-235px";
		}
	}

	function hitung(){
		var total = document.getElementById('tot').value;
		var input = document.getElementById('inputmu').value;
		total*=1; input*=1;
		if(input > total){
			alert("Jumlah pinjaman melebihi nilai!")
			document.getElementById('inputmu').value="";
		}
	}

    </script>
</script>
<body onload='lostLtr()'>
<form method="post" action="<?php echo base_url(); ?>admin/proses_approve">
<?php
$pinjaman=0;
$potongan=0;
$jlhPotonganSaldo=0;
$namaBank="";
foreach($saldo->result_array() as $es)
{
	$pinjaman = $es['jlh_pinjaman'];
	$potongan = $es['jlh_potongan'];
	$jlhPotonganSaldo=$es['debit'];
	$namaBank = $es['bank'];
}


	$stStatus="";
	$tglKirim="";
	foreach($detail->result_array() as $e)
	{
		
		$stStatus = $e['stOrder'];
?>
<table>

<tr>
<td width="180">Tanggal Pengiriman</td>
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
	<input type='hidden'  name='cust' value="<?php echo $e['customer']; ?>"/>	
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
	<input type='hidden' name='produk' value="<?php echo $e['produk']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Quantity</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['qty']." ".$e['satuan']; ?>"/>	
	<input type='hidden' name='qty' value="<?php echo $e['qty']." ".$e['satuan']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Supir</td>
<td width="50">:</td>
<td>
	<input type='text' style='width:150px' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['nama_supir']; ?>"/>		
	Pinjaman
	<input type='text' style='width:150px' disabled class="input-read-only" name='jlhBiaya' value="<?php echo "Rp. ".number_format ($pinjaman, 2, ',', '.'); ?>"/>	
	<input type='hidden' value='<?php echo $row->no_ktp; ?>' name='txtNoKTP'/>
</td>
</tr>
<tr>
<td width="180">Armada</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['no_polisi']; ?>"/>	
</td>
</tr>
<input type="hidden" name="kdAlamat" value="<?php echo $e['kd_alamat_jemput']; ?>">
<input type="hidden" name="kd" value="<?php echo $e['id_alamat_jemput']; ?>">
<?php  }  ?>

<?php
foreach($detailLanjut->result_array() as $e)
{

?>
<!--<tr>
<td width="180">Biaya Pengiriman</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php //echo $e['kd_biaya']; ?>"/>	
</td>
</tr>-->
<tr>
<td width="180">Jumlah BBM</td>
<td width="50">:</td>
<td>
	<?php 	$total=0; ?>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php 
		if(substr($e['jlh_bbm_atau_rupiah'],-3) != "Ltr" ) {
			echo "Rp.".number_format ($e['jlh_bbm_atau_rupiah']); 	
			//echo "Rp ".$e['jlh_bbm_atau_rupiah']; 		
		}
		else
			echo $e['jlh_bbm_atau_rupiah']; 
		?>"/>	
</td>
</tr>
<tr>
<td width="180">Sumber Saldo</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $namaBank; ?>"/>
</td>
</tr>

<tr>
<td width="180">Biaya Tambahan</td>
<td width="50">:</td>
<td>
	<?php 
		//$a = explode("/",$e['kd_biaya_rincian']);
		//foreach($a as $t)
			//echo $e['kd_biaya_rincian'];

		echo "<table border='1' cellpadding='5' cellspacing='0' width='100%'>";
		echo "<tr bgcolor='#fe0'><th>Jenis Biaya</th><th>Jumlah</th></tr>";
	
		//foreach($a as $m){			
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
			
		//}$total+=$e['jlh_bbm_atau_rupiah']; 
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
	<input type='hidden' name='tot' value="<?php echo $total; ?>"/>	
</td>
</tr>

<tr>
<td width="180">Jumlah potongan Pinjaman</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" id='inputmu' value="<?php echo "Rp. ".number_format ($potongan, 2, ',', '.'); ?>" name='txtJlhPinjam' style='width:200px' placeholder='Input jumlah potongan'/>	
</td>
</tr>
<tr>
<td>Jumlah Potongan Saldo</td>
<td>:</td>
<td>
	<input type='text' disabled value='<?php echo "Rp. ".number_format ($jlhPotonganSaldo, 2, ',', '.'); ?>'class='input-read-only'/>
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
	<?php if($e['st']!=1 && $stStatus !='666'){ ?>	
<input type="submit" value="Approve" class="btn-kirim">
<!--<input type="reset" value="Batal" class="btn-kirim">-->
<?php } ?>
<input type="hidden" name="kdBiaya" value="<?php echo $e['kd_biaya_rincian']; ?>">
<input type="hidden" name="stts" value="edit"></td>
</tr>

</table>

<?php } ?>

</form>
</body>