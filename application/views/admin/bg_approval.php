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
<link href="<?php echo base_url(); ?>index.php/asset/css/chosen.css" rel="stylesheet" type="text/css">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css" type="text/css" rel="stylesheet"/>

<script src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('#mulai').datepicker({dateFormat: 'yy-mm-dd'});
		$('#akhir').datepicker({dateFormat: 'yy-mm-dd'});
	});
</script>

<div id="container">
	<h1>Cost Approval (CA) - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
	<table border='0' width='100%'>
		<tr>
			<td width='62%'>
		<div  style="width:58%; padding:5px;">
			<h3>Pencarian Tanggal</h3>
			<?php echo form_open("admin/cariApproval"); ?>
			Dari : 
			<input type="text" class="input-read" name="mulai" id="mulai" style="width:80px;" autocomplete="off" value="<?php echo $this->session->userdata("mulai"); ?>" />
			s/d : 
			<input type="text" class="input-read" name="akhir" id="akhir" style="width:80px;" autocomplete="off" value="<?php echo $this->session->userdata("akhir"); ?>" />
				<input type="hidden" name="tipe_laporan" value="periodik" />
				
				<input type="submit" value="Cari" name='cari' class="btn-kirim" />
				
				<script src="<?php echo base_url(); ?>asset/js/chosen.jquery.js" type="text/javascript"></script>
				<script type="text/javascript"> 
					$(".chzn-select").chosen();
				</script>
			<?php echo form_close(); ?>
		</div>
	</td>
	<td width='50%'>

		<!--	
			<div  style="float:rigth; padding:5px;">
			<h3>Filter Order</h3>
			<?php //echo form_open("admin/filterApproval"); ?>
			<select name='txtTipe' class='input-read'>
				<option value=''>---Pilih Tipe Pencarian---</option>
				<option value='0'>Belum Disetujui</option>
				<option value='1'>Disetujui</option>
				<option value='666'>Dibatalkan</option>
			</select>
				<input type="submit" value="Cari" name='cari' class="btn-kirim" />
				
			<?php// echo form_close(); ?>
		</div>-->
	</td>
</tr>
</table>


		<br/>
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'><td colspan="16" align="center" style="text-transform:uppercase;"><strong>Daftar Order</strong></td>
		</tr>
		<tr style='background-color:#fef'>
		<th align="center">No.</th>
		<th align="center" width='55px'>Tgl. Pesanan</th>
		<th align="center" width='100px'>Customer</th>			
		<th align="center" width="180px">Alamat Penjemputan</th>
		<th align="center" width="80px">Kota Penjemputan</th>
		<th align="center" width='180px'>Alamat Pengiriman</th>
		<th align="center" width='80px'>Kota Pengiriman</th>
		<th align="center" width='90px'>Produk</th>
		<th align="center" width='60px'>Qty</th>
		<th align="center">Supir</th>
		<th align="center">Armada</th>
		<th align="center">Jumlah Biaya</th>
		<th align="center">BBM</th>
		<th align="center" >Aksi</th>
		<?php if($this->session->userdata('stts') == "admin") {?>
			<th align="center" width='135px'>Pilihan</th>			
		<?php } ?>
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
	$num =0;
	$t=0;
	$mtotal=0;
	foreach ($order->result_array() as $value) 
	{
			
		    if($nom % 2 == 0)
		    	$color="#ffe";
		    else
		    	$color="#fff";
			if($value['no_polisi'] != ""){
				
				
		    	if($value['mstatus']==1 ){		
		    		$mtotal=0;
		    		if($value['st']!=1){
						echo "<tr bgcolor='$color'>";
					}
					else{
						$acuan=1;
						echo "<tr bgcolor='#fea'>";
					}

					if($value['st'] == "666")
						echo "<tr bgcolor='#fcd'>";

					echo "<td width='10'>$nom.</td><td>".$value['tgl_order']."</td>";
					echo "<td>".$value['customer']."</td><td>".$value['alamat_jemput'];							
					echo "</td><td>".$value['tujuan']."</td>";
					echo "<td>".$value['alamat_pengiriman']."</td>";
					echo "<td>".$value['asal']."</td><td>".$value['produk']."</td>";
					echo "<td>".$value['qty']." ".$value['satuan']."</td>";
					echo "<td align='center'>".$value['nama_supir'];				
					echo "</td>";
					echo "<td align='center'>".$value['no_polisi']."</td>";	
					$tot=0;						
							if($value['kd_biaya_rincian']!= "NULL"){
								$subq = $this->db->query("select * from tbl_detail_biaya where kd_biaya_detail=".$value['kd_biaya_rincian']."");						
								if($subq->num_rows() > 0)
								{
									foreach($subq->result() as $rows){ 
										$tot+=($rows->jumlah_biaya*1);
										$mtotal +=($rows->jumlah_biaya*1);									
									}
								}
									?>
									<td><?php echo number_format ($tot, 2, ',', '.'); ?></td>						
									<?php								
								$t += $tot;	
							}
							else{
								echo "<td>----</td>";
							}
							
						
				if($value['kd_biaya_rincian']!= "NULL"){
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
					$con="";
					echo '<td align="center">';
					if($value['st']==1){
					echo '<a href="'.base_url().'admin/detail_order/'.$value['kds'].'/'.$value['id'].'/'.$value['kd_biaya_rincian'].'" rel="example_group" class="link" style="float:left;">Details</a>';
						$con = "done";
					}else{
						echo '<a href="'.base_url().'admin/detail_approval/'.$value['kds'].'/'.$value['id'].'/'.$value['kd_biaya_rincian'].'" rel="example_group" class="link" style="float:left;">Details</a>';
							$con = "not";
					}
					echo '</td>';

						if($value['st'] != "666")
						{
							if($this->session->userdata('stts')=="admin"){
								echo '<td align="cesnter">				
								<a href="'.base_url().'admin/hapus_semua_bagian_order/'.$value['kds'].'/'.$value['id'].'/'.$value['kd_biaya_rincian'].'" onClick=\'return confirm("Anda yakin...??")\' style="float:left;">Hapus</a>&nbsp;&laquo;&raquo;';
								/*<a href="'.base_url().'admin/batal_order/'.$value['kds'].'/'.$value['id'].'/'.$value['kd_biaya_rincian'].'/'.$mtotal.'/'.$value['no_ktp'].'" rel="example_group" class="links" style="float:left;">Batal</a>';*/


		?>
								<a href='#' onClick="if(confirm('Apakah Biaya Perjalanan dijadikan pinjaman Supir?'))
			window.location='<?php echo base_url()?>admin/batal_order/<?php echo $value['kds'].'/'.$value['id'].'/'.$value['kd_biaya_rincian'].'/'.$mtotal.'/'.$value['no_ktp'].'/pinjam/'.$acuan.'/'.$con.'/'.$value['kuantiti']; ?>';
		else window.location='<?php echo base_url()?>admin/batal_order/<?php echo $value['kds'].'/'.$value['id'].'/'.$value['kd_biaya_rincian'].'/'.$mtotal.'/'.$value['no_ktp'].'/Nopinjam/'.$acuan.'/'.$con.'/'.$value['kuantiti']; ?>';">Batal</a>

		<?php
								echo '</td>'; 
							}
						}else{
							if($stts == "admin")
							echo "<td>DIBATALKAN</td>";
						} 
						$nom++;
					

					echo '<input type="hidden" value="'.$value['kds'].'" name="txtKd">';
					echo '<input type="hidden" value="'.$value['id'].'" name="txtId">';
					echo '<input type="hidden" value="'.$nom.'" name="jlh">';
					echo '</td>';
					echo "<td>".$value['input_by']."</td>";			
				}
				
			}
			

	}
	$j=13;
	if($stts != "admin")
		$j=12;
?>
		<tr><td colspan='<?php echo $j; ?>' align='right'>Total</td><td colspan='3'><?php echo number_format ($t, 2, ',', '.'); ?></td></tr>
		</table>
	
	</div>
	<div class="halaman" style='margin-left:15px;margin-top:5px;'><?php echo $halaman;?></div>

