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
	<h1>Daftar Biaya - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		<?php echo $this->session->flashdata('save_krs'); ?>
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'><td colspan="13" align="center" style="text-transform:uppercase;"><strong>Daftar Biaya Perjalanan</strong></td>
		</tr>
		<tr style='background-color:#fef'>
		<th align="center">No.</th>
		<th align="center" width='150px'>Kota Penjemputan</th>
		<th align="center">Kota Tujuan</th>			
		<th align="center">Produk</th>
		<th align="center">Nama Modul Biaya</th>
		<th align="center" width='300px'>Detail Biaya</th>
		<th align="center" colspan="2" width="200">
		<?php
		echo '<a href="'.base_url().'admin/tambah_biaya" rel="example_group" class="link" style="float:left;">Buat Biaya Perjalanan</a>';
		?>


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
		    if($nom % 2 == 0)
		    	$color="#ffe";
		    else
		    	$color="#fff";

			echo "<tr bgcolor='$color'><td width='10'>$nom.</td>";
			echo "<td>".$value['alamat_jemput']."</td>";	
			echo "<td>".$value['alamat_tujuan']."</td><td>".$value['produk']."</td>";
				
			echo "<td>".$value['nama_biaya']."</td>";			
			echo "<td>";
				$qr= $this->db->get_where('tbl_rincian', array('id_biaya' => $value['kd_biaya']));
				if(count($qr->result())>0)
				{		
					echo "<table width='100%'>";
					foreach($qr->result() as $ro)
					{
						echo "<tr><td width='50%'>".$ro->nama_biaya."</td><td>&rarr;</td><td> Rp.".number_format ($ro->jumlah, 2, ',', '.')."</td></tr>";
					}
					echo "</table>";
				}
			echo "</td>";			
				echo '<td align="center">
				<a href="'.base_url().'admin/edit_biaya/'.$value['kd_biaya'].'" rel="example_group" class="link" style="float:left;">Edit</a>
				</td>
				<td align="center">
				<a href="'.base_url().'admin/hapus_biaya/'.$value['id'].'"
				onClick=\'return confirm("Anda yakin...??")\' class="link" style="float:left;">Hapus</a>
				</td></tr>';	

			
			$nom++;
	}
?>
		</table>
	</div>
	
