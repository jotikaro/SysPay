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
	<h1>Daftar Pinjaman - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		<?php ?>

		<form method="post" action="<?php echo base_url(); ?>admin/proses_pinjaman">

			<input style='float:right;margin-bottom:5px;' type='submit' value='Pinjaman' class="btn-kirim" name='btnProses'/>
		</div>
		<br/><br/>

		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'><td colspan="13" align="center" style="text-transform:uppercase;"><strong>Daftar Biaya Pinjaman Supir</strong></td>
		</tr>
		<tr style='background-color:#fef'>
		<th align="center">No.</th>
		<th align="center" width='150px'>Customer</th>
		<th align="center">Produk</th>			
		<th align="center">Quantity</th>					
		<th align="center">Supir</th>
		<th align="center">Jumlah Pinjaman</th>
		<th align="center">Keterangan</th>
		<th align="center">Tanggal</th>	
		<th align='center'>Aksi</th>
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
	
	foreach ($pinjaman->result_array() as $value) 
	{
		    if($nom % 2 == 0)
		    	$color="#ffe";
		    else
		    	$color="#fff";
		    
			echo "<tr bgcolor='$color'><td width='10'>$nom.</td>";
			echo "<td>";
					if($value['customer'] == "") echo "----"; else echo $value['customer'];
			echo "</td>";	
			echo "<td>";
				if($value['produk']=="") echo "----"; else echo $value['produk'];
			echo "</td><td>";
				if($value['qty']=="") echo "----"; else echo $value['qty']." ".$value['satuan'];
			echo "</td>";
			echo "<td>".$value['nama']."</td>";			
			echo "<td>Rp. ".number_format ($value['jumlah_pinjaman'], 2, ',', '.')."</td>";			
			echo "<td>".$value['keterangan']."</td>";	
			echo "<td>".$value['date']."</td>";	
			echo '<td align="center">				
					<a href="'.base_url().'admin/history_pinjaman/'.$value['no_ktp'].'"   style="float:left;" >Log</a>
					</td></tr>';
			
			$nom++;
	}
	
?>
		</table>
	</div>
	
