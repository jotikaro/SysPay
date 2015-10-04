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
$(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true,
		  numberOfMonths: 2
        });
      });

	$(function(){
		$('#mulai').datepicker({dateFormat: 'yy-mm-dd'});
		$('#akhir').datepicker({dateFormat: 'yy-mm-dd'});
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
</style>
<div id="container">
	<h1>Detail Peminjaman- Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div  style="width:48%; padding:5px;">
			<h3>Pencarian Tanggal</h3>
			<?php echo form_open("admin/cariDetailHistory"); ?>
			<input type='hidden' value='<?php echo $id; ?>' name='txtID'/>
			Dari : 
			<input type="text" class="input-read" name="mulai" id="mulai" style="width:80px;" autocomplete="off" value="<?php echo $this->session->userdata("mulai"); ?>" />
			s/d
			<input type="text" class="input-read" name="akhir" id="akhir" style="width:80px;" autocomplete="off" value="<?php echo $this->session->userdata("akhir"); ?>" />				
				
				<input type="submit" value="Cari" name='cari' class="btn-kirim" />
				
			<?php echo form_close(); ?>
		</div>

		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'>
		<td colspan="9" align="center"  style="text-transform:uppercase;"><strong>Laporan Detail Peminjaman</strong></td>
		</tr>
		<tr>
		<th align="center">No.</th>
		<th align="center" width='150px'>Customer</th>
		<th align="center">Produk</th>			
		<th align="center">Quantity</th>					
		<th align="center">Supir</th>
		<th align="center">Tanggal</th>
		<th align="center">Debit</th>
		<th align="center">Kredit</th>		
		<th align='center'>Aksi</th>
	</tr><?php
		$k=0;
			$d=0;
			$saldoA=0;
			$tgl="";
			foreach ($saldoAwal->result_array() as $value) 
			{	
				$k+=$value['kredit'];
				$d+=$value['debit'];
				
			}
			$saldoA =($k-$d);
			echo '<tr><td align="center">---</td>';				
			echo '<td align="center">---</td>';
			echo '<td align="center">---</td>';
			echo '<td align="center">---</td>';
			echo '<td align="center">---</td>';
			echo '<td align="center">---</td>';
			echo '<td>---</td>';
			echo '<td >'.number_format ($saldoA, 2, ',', '.').'</td>';
			echo '<td >Jumlah Saldo Awal</td><tr/>';
			?>
		</tr>
			<?php Tampilkan_Mata_Kuliah($detail,$saldoA); ?>
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
	$saldo=0;	
	$tD = array();
	$a=0; $b=0;
	$tKredit=0;	
	$tDebet=0;
	foreach ($jdwl->result_array() as $value) 
	{
			if($no % 2 == 0)
		    	$color="#ffe";
		    else
		    	$color="#fff";		

		    $tKredit +=$value['kredit'];
		    $tDebet += $value['debit'];
		    
			echo "<tr bgcolor='$color'><td width='10'>$no.</td>";
			echo "<td>"; if($value['customer']=="") echo "----"; else echo $value['customer'];
			echo "</td>";	
			echo "<td>"; if($value['produk'] == "") echo "----"; else echo $value['produk'];
			echo "</td><td>";
				if($value['qty']=="") echo '----'; else echo $value['qty']." ".$value['satuan'];
			echo "</td>";
			echo "<td>".$value['nama']."</td>";			
			echo "<td>".$value['date']."</td>";	
			echo "<td>Rp. ".number_format ($value['debit'], 2, ',', '.')."</td>";			
			echo "<td>Rp. ".number_format ($value['kredit'], 2, ',', '.')."</td>";						
			echo '<td>';
			if($value['customer']!=""){
			echo '<a href="'.base_url().'admin/detail_order/'.$value['kd_alamat_jemput'].'/'.$value['id_alamat_jemput'].'" rel="example_group"  style="float:left;">Details</a>';
			}
			echo '</td>';
			$no++;
	}		
	$saldo = (($tKredit*1)+$sl)-($tDebet*1);
	echo "<tr><td colspan='6' rowspan='2'>&nbsp;</td><td>Rp. ".number_format ($tDebet, 2, ',', '.')."</td><td>Rp. ".number_format ($tKredit, 2, ',', '.')."</td>";
	echo "</tr>";
	echo "<tr><td><h3>SALDO</h3></td><td>Rp. ".number_format ($saldo, 2, ',', '.')."</td>";
	echo "</tr>";

	foreach($rows as $row)
	{
		echo str_replace('rowspan="1"', '', $row);
	}
}

?>

