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
	<h1>Daftar Supir- Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		<?php //echo $this->session->flashdata('save_krs'); ?>
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<td colspan="15" align="center" bgcolor="#fff" style="text-transform:uppercase;"><strong>Daftar Supir</strong></td>
		</tr>
		<th align="center">No.</th>
		<th align="center">Nomor KTP</th>
		<th align="center">Nama</th>
		<th align="center">Nomor Rekening</th>
		<th align="center">Nama Bank</th>
		<th align="center">Nama Rekening</th>
		<th align="center">Kota</th>
		<th align="center">Provinsi</th>
		<th align="center">Alamat</th>
		<th align="center" width='10%'>No. Telp 1</th>
		<th align="center" width='10%'>No. Telp 2</th>
		<th align="center" width='10%'>No. Telp 3</th>
		<th align="center" colspan="2" width="200">
		<?php
		echo '<a href="'.base_url().'admin/tambah_supir" rel="example_group" class="link" style="float:left;">Input Supir</a>';
		?>
		</th>
		</tr>
			<?php Tampilkan_Mata_Kuliah($jadwal); ?>
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
				echo '<td align="center">'.$value['no_ktp'].'</td>';
				echo '<td align="center">'.$value['nama'].'</td>';
				echo '<td align="center">'.$value['no_rek'].'</td>';
				echo '<td align="center">'.$value['nama_bank'].'</td>';
				echo '<td align="center">'.$value['nama_rek'].'</td>';
				echo '<td align="center">'.$value['kota'].'</td>';
				echo '<td align="center">'.$value['provinsi'].'</td>';
				echo '<td align="center">'.$value['alamat'].'</td>';
				echo '<td align="center">'.$value['no_telp'].'</td>';
				echo '<td align="center">'.$value['no_telp1'].'</td>';
				echo '<td align="center">'.$value['no_telp2'].'</td>';
				echo '<td align="center">
				<a href="'.base_url().'admin/edit_supir/'.$value['no_ktp'].'" rel="example_group" class="link" style="float:left;">Edit</a>
				</td>';
				echo '<td align="center">
				<a href="'.base_url().'admin/hapus_supir/'.$value['no_ktp'].'"
				onClick=\'return confirm("Anda yakin...??")\' class="link" style="float:left;">Hapus</a>
				</td></tr>';
				$no++;

	}		

	foreach($rows as $row)
	{
		echo str_replace('rowspan="1"', '', $row);
	}
}
?>
