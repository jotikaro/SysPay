<!DOCTYPE html>
<script srcs="<?php echo base_url(); ?>asset/js/jquery-1.4.3.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>asset/css/jquery.fancybox-1.3.4.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=example_group]").fancybox({
				'height'			: '95%',
				'width'				: '70%',
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9,
				'type'              : 'iframe',
				'showNavArrows'   : false,
				'hideOnOverlayClick': false,
				'onClosed'          : function() {
									  parent.location.reload(true);
									  }
			});});
</script>

<link type="text/css" href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo base_url(); ?>asset/js/kalender/js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.id.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/my.js"></script>

<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true,
		  numberOfMonths: 2
        });
      });
</script>
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
		document.getElementById("b").style.border="2px solid #f00";
	}

	function NilaiRupiah(jumlah)  
	{  
	    var titik = ".";
	    var nilai = new String(jumlah);  
	    var pecah = [];  
	    while(nilai.length > 3)  
	    {  
	        var asd = nilai.substr(nilai.length-3);  
	        pecah.unshift(asd);  
	        nilai = nilai.substr(0, nilai.length-3);  
	    }  

	    if(nilai.length > 0) { pecah.unshift(nilai); }  
	    nilai = pecah.join(titik);
	    return nilai;  
	}




	function hitung(){
		var total = document.getElementById('tot').value;
		var JlhTot = document.getElementById('totals').value;
		var input = document.getElementById('inputmu').value;
		total*=1; input*=1;
		var hasil = (JlhTot*1) - (input *1);
		document.getElementById("pot").innerHTML= NilaiRupiah(hasil);
		document.getElementById("totPotKas").value= hasil;

		if(input > total){
			alert("Jumlah pinjaman melebihi nilai!")
			document.getElementById('inputmu').value="";
			document.getElementById("pot").innerHTML= "";
		}
		
	}
	 </script>
</script>
<body onload='lostLtr()'>
<form method="post" action="<?php echo base_url(); ?>admin/proses_approve">
<?php
$stApproval ="0";
foreach($detailLanjut->result_array() as $e)
{
	$stApproval = $e['st'];
}

	$stStatus="";
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
	<?php
	$pos = 0;
	if($e['mstatus']==1 && $stStatus !='666'){ 
		
		$qr = $this->db->query("select * from tbl_peminjaman where no_ktp=".$e['no_ktp']."");
		if ($qr->num_rows() > 0)
		{
			$pos=1;
			echo "Jumlah Pinjaman : ";
			foreach($qr->result() as $row){  ?>
			<input type='text' style='width:150px' disabled class="input-read-only" name='jlhBiaya' value="<?php echo "Rp. ".number_format ($row->jumlah_pinjaman, 2, ',', '.');; ?>"/>	

			<input type='hidden' id='tot' name='txtSimpan' value="<?php echo $row->jumlah_pinjaman; ?>"/>	
			<?php 
			}	
		}
	}
		?>
	<input type='hidden' id='totPotKas' name='txtPotonganKas'/>
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
<td width="180">Bank Sumber Saldo</td>
<td width="50">:</td>
<td>
	<input type='text' name='txtBanks' class='input-read-only' id='b' value='<?php echo $e['bank']; ?>'/>
	<input type='hidden' name='txtBank'  value='<?php echo $e['id_bank']; ?>'/>
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
	<input type='hidden' id='totals' name='tot' value="<?php echo $total; ?>"/>	
</td>
</tr>
<?php if($pos == 1){ ?>
<tr>
<td width="180">Jumlah potongan Pinjaman</td>
<td width="50">:</td>
<td>
	<input style='margin-left:5px' id='ceks' type='checkbox' name='cek' value='ceklish' onclick='lostLtr()'/>
	<input type='text' class="input-read-only" id='inputmu' onkeyup='hitung()' name='txtJlhPinjam' placeholder='Input jumlah potongan' style='width:150px;margin-right:52px;'/>	
</td>
</tr>
<tr>
<td>Jumlah Potongan Saldo</td>
<td>:</td>
<td><span id='pot' style='border:dotted 1px #ddd;padding:6px;margin-left:5px;'></span></td>
</tr>
<?php } ?>

<tr>
<td width="180">Tanggal Kirim</td>
<td width="50">:</td>
<td>
	<input type="text"  placeholder='Input Tanggal' name="tanggalKirim" id="tanggal" style='width:100px;' class="input-read" value='<?php echo date("Y-m-d"); ?>'/>
</td>
</tr>

<!--<tr>
<td width="180">Tanggal Surat</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php //echo $e['tanggal_surat']; ?>"/>	
</td>
</tr>-->
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