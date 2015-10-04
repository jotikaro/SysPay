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
<div id="container">
	<h1>Order Planning (OP) - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'><td colspan="13" align="center" style="text-transform:uppercase;"><strong>Daftar Order</strong></td>
		</tr>
		<tr style='background-color:#fef'>
		<th align="center">No.</th>
		<th align="center" width='7%'>Tgl. Pesanan</th>
		<th align="center">Customer</th>			
		<th align="center" width="40%">Alamat Penjemputan</th>		
		<th align="center" width='20%'>Alamat Pengiriman</th>
		<th align="center" width="5%">Kota Pengiriman</th>
		<th align="center" width='8%'>Produk</th>
		<th align="center">Total Qty</th>
		<th width='10%'>Aksi</th>
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
	$now="";

	foreach ($order->result_array() as $value) 
	{			
		/*echo "NO ".$nom." storder: ".$value['stOrder']." st: ".$value['st']." mstatus: ".$value['mstatus']."<br/>";*/

		if($now != $value['kd_order']){
		  	if($nom % 2 == 0)
		    	$color="#ffe";
		    else
		    	$color="#fff";

		    if($value['stOrder'] == "666")
		    	$color="#fcd";
		    
		    if($value['mstatus'] == "0")
		    	$color="#fea";
		    
		    if($value['mstatus'] == "1")
		    	$color="#fea";

		     if($value['st'] == "666")
		    	$color="#fcd";

			echo "<tr bgcolor='$color'><td width='10'>$nom.</td><td>".$value['tgl_order']."</td>";
			echo "<td>".$value['customer']."</td><td>";			
			$cs=0;
			$query = $this->db->query("select a.id, a.kd_alamat_jemput, a.alamat_jemput, a.kota, a.provinsi, a.qty from tbl_alamat_penjemputan a where a.kd_alamat_jemput='".$value['kds']."'");
			echo "<table border='1' style='border-collapse: collapse;border-color:#efe;border-line' cellpadding='2' cellspacing='0' width='100%' > ";
				if($query->num_rows() > 0)
				{
					$num = $query->num_rows();
					echo "<tr bgcolor='#fef'><th width='5%'>No.</th><th width='65%'>Alamat Penjemputan</th><th width='10%'>Quantity</th><th>Kota Penjemputan</th></tr>";
					$no=1;
					
					foreach($query->result() as $row)
					{
						/*if($row->status =="666"){
							$col="#fcd";
						}*/

						echo "<tr ><td>$no.</td><td>$row->alamat_jemput</td><td>$row->qty</td><td>$row->kota</td></tr>";
						$no++;

						$q = $this->db->query("select * from tbl_order_planning where id_alamat_jemput='".$row->id."'");					
						if($q->num_rows() > 0){
							foreach($q->result() as $r)
							{
								$a= $r->status." ";
								if($a == 1){
									$cs +=1;
								}
							}
						 }
					
					}					
				}else{
					$queryt = $this->db->query("select * from tbl_alamat_penjemputan where kd_alamat_jemput='".$value['kds']."'");
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
			echo "<td>".$value['kuantiti']." ".$value['satuan']."</td>";
			if($num == $cs && ($value['stOrder'] != "666" || $value['st'] != "666"))
			{
				echo '<td align="center" colspan="0">Sudah diproses<a href="'.base_url().'admin/detail/'.$value['kd_order'].'/'.$value['kds'].'/" rel="esxample_group" style="margin-left:35px" class="link" style="float:left;">Detail</a></td>';
				echo "<td>".$value['input_by']."</td></tr>";	
			}else{
				echo '<td align="center" colspan="0"><br/>';
				if($value['stOrder'] == '666' || $value['st'] == "666")
				{
					echo "DIBATALKAN";
				}else{
					echo '<a href="'.base_url().'admin/lanjut_order/'.$value['kd_order'].'/'.$num.'/'.$value['kds'].'/" rel="esxample_group" class="link" style="margin-left:35px;">Lanjut</a>
					<br clear="all"/><br/>';

					$kuery = $this->db->query("SELECT  * from tbl_order_planning where id_alamat_jemput='".$value['id']."'");
					$cx="";
					foreach($kuery->result() as $row){
							$cx =$row->id_alamat_jemput;
					}	
					if($cx != ""){
						echo '<a href="'.base_url().'admin/detail/'.$value['kd_order'].'/'.$value['kds'].'/" rel="esxample_group" style="margin-left:35px" class="link" style="float:left;">Detail</a>';
					}
				}
				echo '</td>';	
				echo "<td>".$value['input_by']."</td>";			
				echo '</tr>';

			}
			$now = $value['kd_order'];
			$nom++;
		}

			    
	}
?>
		</table>
	</div>
	
