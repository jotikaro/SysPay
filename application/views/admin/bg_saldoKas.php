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
<div id="container">
	<h1>Daftar Setoran Saldo Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		<?php //echo $this->session->flashdata('save_krs'); ?>
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<td colspan="13" align="center" bgcolor="#fff" style="text-transform:uppercase;"><strong>Saldo Bank</strong></td>
		</tr>
		<th align="center">No.</th>
		<!--<th align="center" width='80px;'>Sumber Saldo</th>-->
		<th align="center">Nama Bank</th>		
		<th align="center">Nama Pemilik Rekening</th>
		<th align="center">Nomor Rekening</th>				
		<th align="center">Jumlah Saldo</th>
		<!--<th align="center">Keterangan</th>-->
		<th align="center">Tanggal</th>
		</tr>
		</tr>
			<?php Tampilkan_Mata_Kuliah($saldo); ?>
		</table>
	</div>
	
<?php
function Tampilkan_Mata_Kuliah($jdwl)
{
	$rows=array();
	$index=0;
	$temp='';
	$acuan=0;
	$rowspan=1;
	$no=1;
	foreach ($jdwl->result_array() as $value) 
	{
				echo '<tr><td align="center">'.$no.'.</td>';				
				//echo '<td align="center">'.$value['bank_asal'].'</td>';
				echo '<td align="center">'.$value['bank'].'</td>';
				echo '<td align="center">'.$value['nama_rek'].'</td>';
				echo '<td align="center">'.$value['no_rek'].'</td>';
				echo '<td align="center">Rp. '.number_format ($value['jumlah_transfer'], 2, ',', '.').'</td>';				
				//echo '<td align="center">'.$value['keterangan'].'</td>';
				echo '<td align="center">'.$value['tanggal_transfer'].'</td></tr>';
				
				$no++;

	}		

	foreach($rows as $row)
	{
		echo str_replace('rowspan="1"', '', $row);
	}
}
?>
