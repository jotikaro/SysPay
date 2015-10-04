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
		$('#mulai').datepicker({dateFormat: 'yy/mm/dd'});
		$('#akhir').datepicker({dateFormat: 'yy/mm/dd'});
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
	.halaman
 {
 margin:10px;
 font-size:11px;
 }

.halaman a
 {

padding:2px;
 background:#555;
 border:1px solid #ddd;
 font-size:10px;
 font-weight:bold;
 color:#FFF;
 text-decoration:none;

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
	<h1>Arus Kas- Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
			$x="";
			foreach ($show->result_array() as $value) 
			{
				$x = $value['nama_bank'];				
			}

			if($show->num_rows()==0)
				$x = "Semua Bank (Keseluruhan)";
		?>

		<div class="cleaner_h10"></div>
		<?php echo $this->session->flashdata('save'); ?>
<div  style="width:48%; padding:5px;">
			<h3>Pencarian Tanggal</h3>
			<?php echo form_open("admin/cariArusKas"); ?>
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

		<div  style="float:rigth; padding:5px;">
			<?php echo form_open("admin/cariArusKasBank"); ?>
			<select name='txtBank' class='input-read'>
				<option value=''>--- Arus Kas PerBank ---</option>
				<option value='all'>Semua Bank</option>
				<?php
				foreach ($bank->result_array() as $row) 
				{?>
					<option value="<?php echo $row['id'] ?>"><?php echo $row['nama_bank']; ?></option>
				<?php
				}
				?>
			</select>
				<input type="submit" value="Cari" name='cari' class="btn-kirim" />
				
			<?php echo form_close(); ?>
		</div>


		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'>
		<td colspan="6" align="center"  style="text-transform:uppercase;"><strong>Laporan Arus Kas <?php echo $x; ?></strong></td>
		</tr>
		<tr>
		<th align="center">No.</th>
		<th align="center">Tanggal</th>
		<th align="center">Keterangan</th>
		<th align="center">Debit</th>
		<th align="center">Kredit</th>
		</tr>
			<?php 
			$k=0;
			$d=0;
			$saldoA=0;
			$tgl="";
			

			foreach ($saldoAwal->result_array() as $value) 
			{	
				$k+=$value['kredit'];
				$d+=$value['debit'];
				$tgl = $value['tanggal'];
			}
			/*$m =0;
			if($st == "awal"){
				foreach ($saldoAwal->result_array() as $e) 
				{	
					if($e['kredit'] != "0"){
						$m= $e['kredit']; break;
					}
				}
			}
			if($st == "awal"){
				$saldoA = $m;				
			}
			else*/

			$saldoA =($k-$d);
			if($saldoAwal->num_rows() > 0){
				echo '<tr><td align="center">-</td>';				
				echo '<td align="center">'.$tgl.'</td>';
				echo '<td >Jumlah Saldo Awal</td>';
				echo '<td>-</td>';
				echo '<td >'.number_format ($saldoA, 2, ',', '.').'</td><tr/>';
			}
			
			Tampilkan_Mata_Kuliah($order,$saldoA); ?>
		</table>
	</div>	
<?php




function Tampilkan_Mata_Kuliah($jdwl,$sl)
{
	$rows=array();
	$index=0;
	$temp='';
	$acuan=0;
	$rowspan=1;
	$no=1;
	$tDebet =0;
	$saldo=0;
	$tKredit=0;
	foreach ($jdwl->result_array() as $value) 
	{
				echo '<tr><td align="center">'.$no.'.</td>';				
				echo '<td align="center">'.$value['tanggal'].'</td>';
				echo '<td >'.$value['keterangan'].'</td>';
				echo '<td>'.number_format ($value['debit'], 2, ',', '.').'</td>';
				echo '<td >'.number_format ($value['kredit'], 2, ',', '.').'</td><tr/>';
				$no++;
				$tDebet+=$value['debit'];
				$tKredit+=$value['kredit'];
	}		
//	$tKredit+=$sl;
	$saldo = (($tKredit*1)+$sl)-($tDebet*1);
	echo "<tr><td colspan='3' rowspan='2'>&nbsp;</td><td>Rp. ".number_format ($tDebet, 2, ',', '.')."</td><td>Rp. ".number_format ($tKredit, 2, ',', '.')."</td>";
	echo "</tr>";
	echo "<tr><td><h3>SALDO</h3></td><td>Rp. ".number_format ($saldo, 2, ',', '.')."</td>";
	echo "</tr>";

	foreach($rows as $row)
	{
		echo str_replace('rowspan="1"', '', $row);
	}
}

?>
<div class="halaman"><?php echo $halaman;?></div>
