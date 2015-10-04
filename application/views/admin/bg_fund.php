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


<div id="container">
	<h1>Fund Transfer (FT) - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		
		<h3>Pencarian Tanggal</h3>
			<?php echo form_open("admin/cariFund"); ?>
			Dari : 
			<input type="text" class="input-read" name="mulai" id="mulai" style="width:80px;" autocomplete="off" value="<?php echo $this->session->userdata("mulai"); ?>" />
			s/d
			<input type="text" class="input-read" name="akhir" id="akhir" style="width:80px;" autocomplete="off" value="<?php echo $this->session->userdata("akhir"); ?>" />
				<input type="hidden" name="tipe_laporan" value="periodik" />
				
				<input type="submit" value="Cari" name='cari' class="btn-kirim" />
				
				<script src="<?php echo base_url(); ?>asset/js/chosen.jquery.js" type="text/javascript"></script>
				<script type="text/javascript"> 
					$(".chzn-select").chosen();
				</script>
			<?php echo form_close(); ?>
		</div>


		<br/>
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'><td colspan="13" align="center" style="text-transform:uppercase;"><strong>Daftar Order</strong></td>
		</tr>
		<tr style='background-color:#fef'>
		<th align="center">No.</th>
		<th align="center" width='10%'>Tgl. Pesanan</th>
		<th align="center" width='10%'>Customer</th>			
		<th align="center" width="25%">Alamat Penjemputan</th>
		<th align="center" width='25%'>Alamat Pengiriman</th>
		<th align="center" width='10%'>Produk</th>
		<th align="center" width='8%'>Qty</th>
		<th align="center">Supir</th>
		<th align="center">Armada</th>
		<th align="center">Jumlah Biaya</th>
		<th align="center">BBM</th>
		<th align="center">Aksi</th>
		<th align="center" width='5%'>Di Input</th>
	</tr>
		<?php
		$rows=array();
	$index=0;
	$temp='';
	$acuan=0;
	$rowspan=1;
	$nom=1;	
	$num =0;
	$statusOrder="";
	$t=0;
	$mtotal=0;
	foreach ($order->result_array() as $value ) 
	{
			$statusOrder="not";
			$kt = $value['id'];

			$color='';	
			$qs = $this->db->query("select * from tbl_saldo where id_alamat='".$kt."' order by id ASC");
			
			if($qs->num_rows() > 0){
				foreach ($qs->result_array() as $v) {
					if($v['status']==1){						
						$color="#fea";
						$statusOrder="done";
					}
				}				
			}
		    else{
		    	$color="#fff";
		    	$statusOrder="not";
		    }

		    if($value['stOrder'] == "666")
		    	$color="#fcd";

		    echo "<tr bgcolor='$color'>";
			if($value['st'] != 0)
			{
		    	if($value['mstatus']==1){		 
					echo "<td width='10'>$nom.</td><td>".$value['tgl_order']."</td>";
					echo "<td>".$value['customer']."</td><td>".$value['alamat_jemput'];							
					echo "</td>";
					echo "<td>".$value['alamat_pengiriman']."</td><td>".$value['produk']."</td>";
					echo "<td>".$value['qty']." ".$value['satuan']."</td>";
					echo "<td align='center'>".$value['nama_supir'];				
					echo "</td>";
					echo "<td align='center'>".$value['no_polisi']."</td>";			
$tot=0;						
								$subq = $this->db->query("select * from tbl_detail_biaya where kd_biaya_detail=".$value['kd_biaya_rincian']."");
								foreach($subq->result() as $rows){ 
									$tot+=($rows->jumlah_biaya*1);
									$mtotal +=($rows->jumlah_biaya*1);									
								}
								?>
								<td><?php echo number_format ($tot, 2, ',', '.'); ?></td>						
								<?php								
							$t += $tot;
						

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
					echo '<td align="center">
					<a href="'.base_url().'admin/detail_fund/'.$value['kds'].'/'.$value['id'].'/'.$statusOrder.'/'.$value['kd_biaya_rincian'].'" rel="example_group" class="link" style="float:left;">Details</a>';

					if($value['stOrder'] == "666") echo "<b>DIBATALKAN</b>";
					echo '</td>';
					echo '<input type="hidden" value="'.$value['kds'].'" name="txtKd">';
					echo '<input type="hidden" value="'.$value['id'].'" name="txtId">';
					echo '<input type="hidden" value="'.$nom.'" name="jlh">';
					echo '</td>';
					echo "<td>".$value['input_by']."</td>";			
					$nom++;
				}
			}
			

	}
?>
<tr><td colspan='10' align='right'>Total</td><td colspan='3'><?php echo number_format ($t, 2, ',', '.'); ?></td></tr>
		</table>
	
	</div>
	
