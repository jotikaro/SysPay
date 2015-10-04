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



			function cekAll(){
				jlh = document.getElementById("br").value;
				
				for(var i=1;i<=jlh;i++){
					document.getElementById("x"+i).checked=true;
				}
			}

			function unCekAll(){
				jlh = document.getElementById("br").value;
				
				for(var i=1;i<=jlh;i++){
					document.getElementById("x"+i).checked=false;
				}	
			}
</script>
<style>
as{
text-decoration:none;
color:#fff;
padding:5px;
border:1px solid #333333;
float:left;
background-color:#000;
}


.input-read-only {
border: 1px solid #D0D0D0;
padding: 10px;
width:500px;
height:38px;
border-radius:10px;
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
<div id="container">
	<h1>Cost Planning (CP) - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		<form method="post" action="<?php echo base_url(); ?>admin/filter_cost">
		<div>
			<?php 
				echo "<select name='txtCustomer' class='input-read-only' style='width:120px;'>";
				echo "<option value=''>--Customer--</option>";					
				$a ="";
				foreach ($order->result_array() as $value) 
				{		
					if($a != $value['customer'])
						echo "<option value='".$value['kd_customer']."'>".$value['customer']."</option>";				
					$a = $value['customer']	;
				}
				echo "</select>";
			?>	

			<?php 
				echo "<select name='txtJemput' class='input-read-only' style='width:170px;'>";
				echo "<option>--Kota Penjemputan--</option>";					
				$b="";
				foreach ($order->result_array() as $value) 
				{	
					if($b != $value['tujuan'])				
						echo "<option value='".$value['tujuan']."'>".$value['tujuan']."</option>";					
					$b = $value['tujuan'];
				}
				echo "</select>";
			?>	

			<?php 
				echo "<select name='txtKirim' class='input-read-only' style='width:170px;'>";
				echo "<option>--Kota Pengiriman--</option>";					
				$c = "";
				foreach ($order->result_array() as $value) 
				{		
				    if($c != $value['asal'])			
						echo "<option value='".$value['asal']."'>".$value['asal']."</option>";					
					$c = $value['asal'];
				}
				echo "</select>";
			?>	

			<?php 
				echo "<select name='txtProduk' class='input-read-only' style='width:150px;'>";
				echo "<option>--Pilih Produk--</option>";					
				$d = "";
				foreach ($order->result_array() as $value) 
				{		
				    if($d != $value['produk'])			
						echo "<option value='".$value['produk']."'>".$value['produk']."</option>";					
					$d = $value['produk'];
				}
				echo "</select>";
			?>					
			<input type='submit' value='FILTER' class="btn-kirim" name='btnProses'/>
		</form>

		<form method="post" action="<?php echo base_url(); ?>admin/proses_cost">

			<input style='float:right;margin-bottom:5px;' type='submit' value='Proses' class="btn-kirim" name='btnProses'/>
			<input style='float:right;margin-bottom:5px;margin-right:5px;' type='button' onclick='cekAll()' class="btn-kirim"  value='Ceklish'/>
			<input style='float:right;margin-bottom:5px;margin-right:5px;' type='button' onclick='unCekAll()' class="btn-kirim"  value='UnCeklish'/>
		</div>
		<br/><br/>
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'><td colspan="16" align="center" style="text-transform:uppercase;"><strong>Daftar Order</strong></td>
		</tr>
		<tr style='background-color:#fef'>
		<th align="center">No.</th>
		<th align="center" width='10%'>Tgl. Pesanan</th>
		<th align="center" width='10%'>Customer</th>			
		<th align="center" width="25%">Alamat Penjemputan</th>
		<th align="center" width="10%">Kota Penjemputan</th>
		<th align="center" width='25%'>Alamat Pengiriman</th>
		<th align="center" width="10%">Kota Pengiriman</th>
		<th align="center" width='10%'>Produk</th>
		<th align="center" width='8%'>Qty</th>
		<th align="center">Supir</th>
		<th align="center">Armada</th>
		<th align="center">Jumlah Biaya</th>
		<th align="center">BBM</th>
		<th align="center">Tandai</th>
		<th align="center">Cetak</th>
		<th align="center" width='5%'>Di Input</th>
	</tr>
		<?php
		$rows=array();
	$index=0;
	$temp='';
	$acuan=0;
	$rowspan=1;
	$nom=1;
	$color='#fff';	
	$num =0;
	$t=0;
	$mtotal=0;
	$br = $orders->num_rows();
	echo "<input type='hidden' value='$br' id='br'/>";
	foreach ($orders->result_array() as $value) 
	{
			
			if($value['no_polisi'] != "")
			{
		    	if($value['mstatus']!=1){		 
					$color='#fff';
				}			
				else{
					$color='#fea';
				}


				if($value['st'] == "666"){
					$color='#fcd';
				}

				echo "<tr bgcolor='$color'><td width='10'>$nom.</td><td>".$value['tgl_order']."</td>";
				echo "<td>".$value['customer']."</td><td>".$value['alamat_jemput'];							
				echo "</td>";
				echo "<td>".$value['tujuan']."</td>";
				echo "<td>".$value['alamat_pengiriman']."</td>";
				echo "<td>".$value['asal']."</td>";
				echo "<td>".$value['produk']."</td>";
				echo "<td>".$value['qty']." ".$value['satuan']."</td>";
				echo "<td align='center'>".$value['nama_supir'];				
				echo "</td>";
				echo "<td align='center'>".$value['no_polisi']."</td>";		
				

				if($value['kd_biaya_rincian'] != ""){
					$tot=0;						
					$subq = $this->db->query("select * from tbl_detail_biaya where kd_biaya_detail=".$value['kd_biaya_rincian']."");
							
						if($subq->num_rows() > 0)
						{
							
								foreach($subq->result() as $rows){ 
									$tot+=($rows->jumlah_biaya*1);
									$mtotal +=($rows->jumlah_biaya*1);									
								}
								?>
								<td><?php echo number_format ($tot, 2, ',', '.'); ?></td>						
								<?php								
							$t += $tot;
						}
						

					$q = $this->db->query("select * from tbl_cost_planning where kd_biaya_rincian=".$value['kd_biaya_rincian']."");
			
						if($q->num_rows() > 0)
						{					
							foreach($q->result() as $row){ ?>
								<td><?php 
								if(substr($row->jlh_bbm_atau_rupiah,-3) != "Ltr" ) {
									echo number_format ($row->jlh_bbm_atau_rupiah, 2, ',', '.'); 
									$t += $row->jlh_bbm_atau_rupiah;
									$mtotal+=($row->jlh_bbm_atau_rupiah*1);
								}
								else
									echo $row->jlh_bbm_atau_rupiah;
									?>

								</td>
								
								<?php
							}
						}	
				}					
				else{
					echo "<td>Belum diisi!</td><td>Belum diisi!</td>";
				}



				echo '<td align="center">';
				if($value['stOrder'] != "666" || $value['st'] != "666")
				{
					if($value['st']!=1 && $value['mstatus']!="666"){
						//echo $value['kds']."<br/>".$value['idx'];
						echo '<input type="checkbox" value="'.$value['idx'].'" rel="example_group" $dis name="kd'.$nom.'" id="x'.$nom.'" class="link" style="margin-left:10px;">';
						echo '<input type="hidden"  value="'.$value['kds'].'" name="kdAlamat'.$nom.'">';
					}else{
						echo '<input type="checkbox" disabled value="'.$value['idx'].'" rel="example_group" $dis name="kd'.$nom.'" class="link" style="margin-left:10px;">';
					}
				}else{
					echo "DIBATALKAN";
				}
				if($value['mstatus']==1){	
			    echo '<td align="center">				
					<a href="'.base_url().'admin/detail_cost/'.$value['kds'].'/'.$value['idx'].'" rel="example_group" class="link" style="float:left;" >Cetak</a>
					</td>';
				}else if($value['mstatus'] == 0){
					 echo '<td align="center">Menunggu..</td>';
				}
				else{
					 echo '<td align="center">DIBATALKAN</td>';	
				}

				echo '<input type="hidden" value="'.$value['kds'].'" name="txtKd">';
				echo '<input type="hidden" value="'.$value['idx'].'" name="txtId">';
				echo '<input type="hidden" value="'.$nom.'" name="jlh">';
				echo '</td>';
				echo "<td>".$value['input_by']."</td></tr>";
				$nom++;
			}
			

	}
?>
<tr><td colspan='13' align='right'>Total</td><td colspan='3'><?php echo number_format ($t, 2, ',', '.'); ?></td></tr>
		</table>
	</form>
	</div>
	
