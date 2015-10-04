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
	<h1>Daftar Mutasi Saldo Bank - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;

			$x="";
			foreach ($saldoAwal->result_array() as $value) 
			{
				$x = $value['bank'];
				$show = $x;
			}
		?>

		<div class="cleaner_h10"></div>
		<?php echo $this->session->flashdata('save_krs'); ?>
		<form method="post" action="<?php echo base_url(); ?>admin/mutasi_bank">

			<input style='float:right;margin-bottom:5px;' type='submit' value='Mutasi Saldo' class="btn-kirim" name='btnProses'/>		
		</form>


		<div  style="float:rigth; padding:5px;">
			<?php echo form_open("admin/filterMutasiBank"); ?>
			<select name='txtBank' class='input-read'>
				<option value=''>--- Arus Kas PerBank ---</option>
				<option value='all'>Semua Bank</option>
				<?php
				$a =0;
				foreach ($bank->result_array() as $row) 
				{
					if($a != $row['kode']){
					?>
					<option value="<?php echo $row['kode'] ?>"><?php echo $row['bank']; ?></option>
				<?php
					   $a = $row['kode'];
					}
				}
				?>
			</select>
				<input type="submit" value="Cari" name='cari' class="btn-kirim" />
				
			<?php echo form_close(); ?>
		</div>


		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'><td colspan="13" align="center" style="text-transform:uppercase;"><strong>Mutasi Saldo <?php echo $show; ?></strong></td>
		</tr>
		<tr style='background-color:#fef'>
		<th align="center">No.</th>
		<th align="center">Tanggal</th>
		<th align="center" width='100px'>Bank Asal</th>
		<th align="center" width='100px'>Bank Tujuan</th>
		<!--<th align="center">Nama Rekening Tujuan</th>			
		<th align="center">Nomor Rekening Tujuan</th>
		<th align="center" width='150px;'>Debit Mutasi</th>
		<th align="center" width='150px;'>Kredit Mutasi</th>-->
		<th align="center" width='150px;'>Jumlah</th>
		<th  width="200" colspan='2'>Keterangan</th>


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
	$tDebet =0;
	$saldo=0;
	$tKredit=0;
	foreach ($order->result_array() as $value) 
	{
		    if($nom % 2 == 0)
		    	$color="#ffe";
		    else
		    	$color="#fff";

			echo "<tr bgcolor='$color'><td width='10'>$nom.</td>";
			echo "<td>".$value['tanggal']."</td>";	
			echo "<td>";
				 	if(strlen($value['bank_asal']) > 2){
						echo $value['bank_asal'];
					}
					else{
						$m = $this->db->query("select nama_bank from tbl_bank where id=".$value['bank_asal']."");
						if($m->num_rows() > 0)
						{					
							foreach($m->result() as $ro){ 
								echo $ro->nama_bank;
							}
						}
					}
			echo "</td>";	
			echo "<td>".$value['bank']."</td>";	
			/*echo "<td>".$value['nama_rek']."</td><td>".$value['no_rek']."</td>";						
			echo "<td> Rp. ".number_format ($value['debit'], 2, ',', '.')."</td>";	
			echo "<td> Rp. ".number_format ($value['kredit'], 2, ',', '.')."</td>";*/
			echo "<td>Rp. ".number_format ($value['kredit'], 2, ',', '.')."</td>";	
			echo "<td>".$value['keterangan']."</td>";		
			
			/*	echo '<td align="center">
				<a href="'.base_url().'admin/mutasi_bank/'.$value['kd_bank_tujuan'].'" rel="example_group" class="link">Mutasi Saldo</a></td>';
			echo '<td align="center">				
					<a href="'.base_url().'admin/history_saldo/'.$value['kd_bank_tujuan'].'"   style="float:left;" >Log</a>
					</td>";*/
	
			$tDebet+=$value['debit'];
			$tKredit+=$value['kredit'];
			
			$nom++;
	}
		$saldo = (($tKredit*1))-($tDebet*1);
		echo "<tr><td colspan='4' rowspan='2' align='right'>&nbsp;TOTAL</td><td>Rp. ".number_format ($tKredit, 2, ',', '.')."</td>";
		echo "</tr>";
		//echo "<tr><td><h3>TOTAL</h3></td><td>Rp. ".number_format ($saldo, 2, ',', '.')."</td>";
		//echo "</tr>";
?>

		</table>
	</div>
	
