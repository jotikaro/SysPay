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
	<h1>Fund Transfer (FT) - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr><td colspan="13" align="center" bgcolor="#fff" style="text-transform:uppercase;"><strong>Daftar Order Planning(OP)</strong></td></tr>
		<tr>
			<th align="center">Kode DO</th>
		<th align="center">Tanggal Pesanan</th>
		<th align="center">Customer</th>			
		<th align="center" colspan="2">Alamat Penjemputan</th>
		<th align="center">Alamat Pengiriman</th>
		<th align="center">Produk</th>
		<th align="center">Qty</th>
		<th align="center">Armada</th>
		<th align="center">Supir</th>
		<th align="center">Request BBM</th>
		<th align="center">Tanggal Surat Pengantar</th>
		<th>Aksi</th>
		</th>
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
	foreach ($jdwl->result_array() as $value) 
	{
		if(($temp=='') || ($value['kd_mk']!=$temp)) {			
			$rows[$index] = '<tr>
				<td align="center" rowspan="1">'.$value['kd_mk'].'</td>
				<td rowspan="1" id="'.'nama_'.$value['kd_mk'].'">'.$value['nama_mk'].'</td>
				
				<td align="center" rowspan="1" id="id'.$value['kd_mk'].'">SSKA</td>';
				
				$rowspan=1;				
				$acuan=$index;
			}else if($value['kd_mk']==$temp) {
				$rows[$index] = '<tr>';
				$rowspan++;
			}

			$rows[$acuan]=str_replace('rowspan="'.($rowspan-1).'"', 'rowspan="'.$rowspan.'"', $rows[$acuan]);
			$peserta = isset($value['Peserta']) ? $value['Peserta']:'0';
			$calonpeserta = isset($value['CalonPeserta']) ? $value['CalonPeserta']:'0';
		
			$disabled ='';
			if($peserta >= $value['kapasitas'])
				$disabled ='disabled="disabled"';
			
			$linkpeserta = $peserta;
			if($peserta >0)
			$linkpeserta = '<a href="'.base_url().'admin/peserta/'.$value['kd_jadwal'].'_1
			/" title="Daftar Peserta Mata Kuliah '.$value['nama_mk'].'  -  Dosen '.$value['nama_dosen'].'" rel="example_group" class="link2">'
				.$peserta.'</a>';
				
			$linkcalonpeserta = $calonpeserta;
			if($calonpeserta >0)
			$linkcalonpeserta = '<a href="'.base_url().'admin/peserta/'.$value['kd_jadwal'].'_0
			/" title="Daftar Calon Peserta Mata Kuliah '.$value['nama_mk'].'  -  Dosen '.$value['nama_dosen'].'" rel="example_group" class="link2">	
			'.$calonpeserta.'</a>';
						
			$rows[$index] .='<td id="'.'cell_'.$value['kd_mk'].'_'.$value['kelas'].'">'.$value['kd_dosen'].'</td><td>'.$value['nama_dosen'].'</td>
				<td align="center">'.$value['kelas'].'</td>
			
			
				<td align="center">'.$linkpeserta.'</td>
				<td align="center">'.$linkcalonpeserta.'</td>
				<td align="center">BK 2038 ST</td>
				<td align="center">Yongki Putra</td>
				<td align="center">20 Ltr</td>
				<td align="center">24-06-2015</td>
				<td align="center">
				<a href="'.base_url().'admin/edit_jadwalss/'.$value['kd_jadwal'].'" rel="example_group" class="link" style="float:left;">Details</a>
				</td></tr>';
			$index++;
			$temp=$value['kd_mk'];
	}		
	foreach($rows as $row)
	{
		echo str_replace('rowspan="1"', '', $row);
	}
}
?>
