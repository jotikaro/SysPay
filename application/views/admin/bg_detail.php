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
	<h1>Detail Order Planning (OP) - Sistem Informasi Aman Transport</h1>

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
		<th align="center" width='75px'>Tgl. Pengiriman</th>
		<th align="center">Customer</th>			
		<th align="center" width="40%">Alamat Penjemputan</th>		
		<th align="center" width='15%'>Alamat Pengiriman</th>
		<th align="center" width="8%">Kota Pengiriman</th>
		<th align="center" width='5%'>Produk</th>
		<th align="center" width='15%'>Armada</th>
		<th align="center" width='20%'>Supir</th>		
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
	
	foreach ($order->result_array() as $value) 
	{

		    if($nom % 2 == 0)
		    	$color="#ffe";
		    else
		    	$color="#fff";

			echo "<tr bgcolor='$color'><td width='10'>$nom.</td><td>".$value['tgl_order']."</td>";
			echo "<td>".$value['nama']."</td><td>";			
			$query = $this->db->query("select * from tbl_alamat_penjemputan where kd_alamat_jemput='".$value['kd_alamat_jemput']."'");
			echo "<table border='1' style='border-collapse: collapse;border-color:#efe;border-line' cellpadding='2' cellspacing='0' width='100%' > ";
				if($query->num_rows() > 0)
				{
					$num = $query->num_rows();
					echo "<tr bgcolor='#fef'><th width='5%'>No.</th><th width='65%'>Alamat Penjemputan</th><th width='10%'>Quantity</th><th>Kota Penjemputan</th></tr>";
					$no=1;
					foreach($query->result() as $row)
					{
						echo "<tr><td>$no.</td><td>$row->alamat_jemput</td><td>$row->qty</td><td>$row->kota</td></tr>";
						$no++;
					}
				}
			echo "</table>";
			echo "</td>";			
			echo "<td>".$value['alamat_pengiriman']."</td><td>".$value['kota']."</td>";
			echo "<td>".$value['produk']."</td>";			
			echo "<td>";
			echo "<table border='1' style='border-collapse: collapse;border-color:#efe;border-line' cellpadding='2' cellspacing='0' width='100%' > ";
				if($query->num_rows() > 0)
				{					
					echo "<tr bgcolor='#fef'><th width='10'>No.</th><th>Armada</th></tr>";
					$nox=1;
					foreach($alamat->result() as $row)
					{
						echo "<tr><td>$nox.</td><td>$row->no_polisi</td></tr>";
						$nox++;
					}
				}
			echo "</table>";
			echo "<td>";
			echo "<table border='1' style='border-collapse: collapse;border-color:#efe;border-line' cellpadding='2' cellspacing='0' width='100%' > ";
				if($query->num_rows() > 0)
				{					
					echo "<tr bgcolor='#fef'><th width='10'>No.</th><th>Nama Supir</th></tr>";
					$not=1;
					foreach($alamat->result() as $row)
					{
						echo "<tr><td>$not.</td><td>$row->nama_supir</td></tr>";
						$not++;
					}
				}
			echo "</table>";
			echo "</td>";
			$nom++;
	}
?>
		</table>
	</div>
	
