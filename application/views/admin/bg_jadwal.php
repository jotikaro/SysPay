<link href="<?php echo base_url(); ?>asset/css/jquery.fancybox-1.3.4.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.fancybox-1.3.4.pack.js"></script>

<!DOCTYPE html>
<link href="<?php echo base_url(); ?>index.php/asset/css/chosen.css" rel="stylesheet" type="text/css">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('#mulai').datepicker({dateFormat: 'dd/mm/yy'});
		$('#akhir').datepicker({dateFormat: 'dd/mm/yy'});
	});
</script>
<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=example_group]").fancybox({
				'height'			: '100%',
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
<style>
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
<div id="container">
	<h1>Order Receive - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		
		<div  style="width:48%; padding:5px;">
			<h3>Pencarian Order</h3>
			<?php echo form_open("admin/filterJadwal"); ?>
			<select name='txtTipe' class='input-read'>
				<option value=''>---Pilih Tipe Pencarian---</option>
				<option value='0'>Belum Disetujui</option>
				<option value='1'>Disetujui</option>
				<option value='666'>Dibatalkan</option>
			</select>
				<input type="submit" value="Cari" name='cari' class="btn-kirim" />
				
			<?php echo form_close(); ?>
		</div>
		<br/>

		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'><td colspan="13" align="center" style="text-transform:uppercase;"><strong>Daftar Order</strong></td>
		</tr>
		<tr style='background-color:#fef'>
		<th align="center">No.</th>
		<th align="center" width='8%'>Tgl. Pesanan</th>
		<th align="center">Customer</th>			
		<th align="center" width="35%">Alamat Penjemputan</th>		
		<th align="center" width='20%'>Alamat Pengiriman</th>
		<th align="center" width="5%">Kota Pengiriman</th>
		<th align="center" width='8%'>Produk</th>
		<th align="center" width='5%'>Total Qty</th>		
		<th align="center" colspan="2" width="300">
		<?php
		echo '<a href="'.base_url().'admin/tambah_jadwal" rel="example_group" class="link" style="float:left;">Buat Order</a>';
		?>
		<th align="center" width='5%'>Di Input</th>
	</tr>
		<?php
		$rows=array();
	$index=0;
	$temp='';
	$acuan=0;
	$rowspan=1;
	$nom=1;
	$color='';
	$st = "";
	foreach ($order->result_array() as $value) 
	{
		   if($value['stOrder'] == 1)
		    	$color="#fea";
		    else
		    	$color="#fff";

		    if($value['stOrder'] == "666")
				$color="#fcd";

			echo "<tr bgcolor='$color'><td width='10'>$nom.</td><td>".$value['tgl_order']."</td>";
			echo "<td>".$value['nama']."</td><td>";			
			$query = $this->db->query("select a.id, a.kd_alamat_jemput, a.alamat_jemput, a.kota, a.provinsi, a.qty, b.status from tbl_alamat_penjemputan a inner join tbl_kode_cost_planning b on a.id=b.id_alamat_jemput where kd_alamat_jemput='".$value['kd_alamat_jemput']."'");
			echo "<table border='1' style='border-collapse: collapse;border-color:#eee' cellpadding='2' cellspacing='0' width='100%'>";
			
				if($query->num_rows() > 0)
				{
					echo "<tr bgcolor='#fef'><th width='10'>No.</th><th>Alamat Penjemputan</th><th width='10%'>Quantity</th><th width='20%'>Kota Penjemputan</th></tr>";
					$no=1;
					$kota=""; $col="";
					foreach($query->result() as $row)
					{
						if($row->status =="666"){
							$col="#fcd";
						}
						echo "<tr bgcolor='$col'><td>$no.</td><td>$row->alamat_jemput</td><td>$row->qty</td><td>$row->kota</td></tr>";
						$no++;
						$kota=$row->kota;
					}
				}else{
					$queryt = $this->db->query("select * from tbl_alamat_penjemputan where kd_alamat_jemput='".$value['kd_alamat_jemput']."'");
					echo "<tr bgcolor='#fef'><th width='10'>No.</th><th>Alamat Penjemputan</th><th width='10%'>Quantity</th><th width='20%'>Kota Penjemputan</th></tr>";
					$no=1;
					$kota=""; $col="";
					foreach($queryt->result() as $row)
					{
						echo "<tr ><td>$no.</td><td>$row->alamat_jemput</td><td>$row->qty</td><td>$row->kota</td></tr>";
						$no++;
					}
				}
			echo "</table>";
			echo "</td>";
			echo "<td>".$value['alamat_pengiriman']."</td>";
			echo "<td>".$value['asal']."</td>";
			echo "<td>".$value['produk']."</td>";
			echo "<td>".$value['qty']." ".$value['satuan']."</td>";
			if($value['stOrder'] == 1){
				echo '<td align="center" colspan="2">Sudah Diproses</td>';
				echo "<td>".$value['input_by']."</td></tr>";
			}
			else{
				if($value['stOrder'] != "666"){
					echo '<td align="center">
					<a href="'.base_url().'admin/edit_jadwal/'.$value['kd_alamat_jemput'].'" rel="example_group" class="link" style="float:left;">Edit</a>
					</td>
					<td align="center">
					<a href="'.base_url().'admin/hapus_order/'.$value['kd_order'].'/'.$value['kd_alamat_jemput'].'/"
					onClick=\'return confirm("Anda yakin...??")\' class="link" style="float:left;">Hapus</a>
					</td>';
				}else{
					echo "<td colspan='2'>DIBATALKAN</td>";
				}

				echo "<td>".$value['input_by']."</td></tr>";
			}

			
			$nom++;
	}
?>
		</table>
	</div>
	
