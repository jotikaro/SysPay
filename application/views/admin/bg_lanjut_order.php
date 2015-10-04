
<!DOCTYPE html>
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
		<form method="post" action="<?php echo base_url(); ?>admin/simpan_order_planning">
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<tr style='background-color:#333;color:#fff'><td colspan="13" align="center" style="text-transform:uppercase;"><strong>Daftar Order</strong></td>
		</tr>
		<tr style='background-color:#fef'>
		<th align="center">Kode DO</th>
		<th align="center" width='75px'>Tgl. Penjemputan</th>
		<th align="center">Customer</th>			
		<th align="center" width="40%">Alamat Penjemputan</th>
		
		<th align="center" width='25%'>Alamat Pengiriman</th>
		<th align="center" width="10%">Kota Pengiriman</th>
		<th align="center" width="10%">Produk</th>
		<th align="center" width="10%">Total Qty</th>
		<th align="center">Armada</th>
		<th align="center">Supir</th>		
		<th>Aksi</th>
	</tr>
	<?php echo "<div style='color:#f00;font-style:italic'>".validation_errors()."</div>"; ?>

		<?php	
			$sitatus = "";
			$i =0;
	//	if($i == 0){		
			/*function supirArmadas($jlh,$supir,$kol){								
				for($i=0;$i<$jlh;$i++){
						if($kol == 1){
							echo "<div><select name='nama$i' style='height:25px' class='input-read-onlys'>";
							echo "<option value=''>&nbsp;&nbsp;&rarr; Pilih Supir</option>";
						}
						else{
							echo "<div><select name='np$i' style='height:25px' class='input-read-onlys'>";
							echo "<option value=''>&nbsp;&nbsp;&rarr; Pilih Armada</option>";	
						}
						foreach($supir->result() as $row)
						{
							if($kol == 1)						
								echo "<option value='$row->no_ktp'>$row->nama</option>";
							else
								echo "<option value='$row->id'>$row->no_polisi</option>";
						}
						echo "</select></div>";
				}			
			}
*/

			function supirArmada($jlh,$supir,$kol,$x,$sts, $stsn){								
				$st = "";				
				$sk= "";
				for($i=0;$i<$jlh;$i++){														
						if($kol == 1){
							if($sts[$i] != "" && $stsn[$i] == 1){
								echo "<div><select style='color:#aaa' name='nama$i' style='height:25px' class='input-read-onlys'>";	
								$st = "1";
							}
							else{
								echo "<div><select name='nama$i' style='height:25px' class='input-read-onlys'>";
							}
							if($st!= "1")
								echo "<option value=''>&nbsp;&nbsp;&rarr; Pilih Supir</option>";
						}
						else{
							if($sts[$i] != "" && $stsn[$i] == 1){
							echo "<div><select style='color:#aaa' name='np$i' style='height:25px' class='input-read-onlys'>"; 
								$sk="1";
							}else{
								echo "<div><select name='np$i' style='height:25px' class='input-read-onlys'>";	
							}					
							if($sk!="1")		
							echo "<option value=''>&nbsp;&nbsp;&rarr; Pilih Armada</option>";	
						}
						foreach($supir->result() as $row)
						{
							
							if($kol == 1){											
								if($x[$i] == $row->no_ktp){
									echo "<option selected value='$row->no_ktp'>$row->nama</option>"; 
									if($st=="1"){ break; $st='';}
								}
								else{
									if($st=="1")	continue;
									else echo "<option value='$row->no_ktp'>$row->nama</option>";
								}
							}
							else{
								if($x[$i] == $row->id){
									echo "<option value='$row->id' selected>$row->no_polisi</option>"; 
									if($sk=="1"){ break; $sk='';}
								}
								else		
									if($sk=="1")  continue;
									else								
										echo "<option value='$row->id'>$row->no_polisi</option>";
							}							
						}
						echo "</select></div>";
						$st=''; $sk='';
				}			
			}

		$rows=array();
	$index=0;
	$temp='';
	$acuan=0;
	$rowspan=1;
	$nom=1;
	$color='';

	$a=array();
	$b=array();
	$sts = array();
	$stsn = array();
	$i=0;
	$kotaAsal ="";
	$kotaTujuan = "";
	foreach ($driver->result_array() as $val) 
	{
		$a[$i] = $val['id_armada'];
		$b[$i] = $val['no_ktp'];
		$sts[$i] = $val['id_alamat_jemput'];
		$stsn[$i] = $val['status'];
		$kotaAsal = $val['asal'];
		$kotaTujuan = $val['tujuan'];
		$i++;
	}


	foreach ($order->result_array() as $value) 
	{
		    if($nom % 2 == 0)
		    	$color="#ffe";
		    else
		    	$color="#fff";
		    echo "<input type='hidden' value='".$value['kd_order']."' name='kd_order'/>";
			echo "<tr bgcolor='$color'><td width='10'>$nom.</td><td>".$value['tgl_order']."</td>";
			echo "<td>".$value['nama']."</td><td>";			
			$query = $this->db->query("select * from tbl_alamat_penjemputan where kd_alamat_jemput='".$value['kd_alamat_jemput']."'");
			echo "<table border='1' style='border-collapse: collapse;border-color:#eee;border-line' cellpadding='2' cellspacing='0' width='100%' height='100%'> ";
				if($query->num_rows() > 0)
				{					
					$no=0;
					$nmr=1;
					echo "<tr bgcolor='#fef' ><th width='10'>No.</th><th>Alamat Penjemputan</th><th width='10%'>Quantity</th><th>Kota Penjemputan</th></tr>";
					foreach($query->result() as $row)
					{
						echo "<tr class='input-read-onlys'><td>$nmr.</td><td>$row->alamat_jemput</td><td>$row->qty</td><td>$row->kota</td></tr>";
						echo "<input type='hidden' value='$row->id' name='kode".$no."'/>";
						$no++; $nmr++;
					}
				}
			echo "</table>";
			echo "</td>";	
			echo "<td>".$value['alamat_pengiriman']."</td>";					
			echo "<td>".$value['kota']."</td>";	
			echo "<td>".$value['produk']."</td>";	
			echo "<td>".$value['qty']." ".$value['satuan']."</td>";	
			echo "<td>";
					$qx = $this->db->query("select * from tbl_armada order by id ASC");
					/*echo "SSS".$sitatus;
					if($sitatus=="error")
						supirArmadas($jumlah, $qx, 2,$a);
					else*/
						supirArmada($jumlah, $qx, 2,$a,$sts, $stsn);
			echo "</td>";
			echo "<td>";
					$q = $this->db->query("select * from tbl_supir order by no_ktp ASC");
					/*if($sitatus=="error")
						supirArmadas($jumlah, $q, 1);
					else*/
						supirArmada($jumlah, $q, 1,$b,$sts,$stsn);
			echo "</td><input type='hidden' value='$jumlah' name='jum'/><input type='hidden' value='$kode' name='kod'/>";							
			echo '<td align="center"><input type="submit" value="Simpan" class="btn-kirim-login" name="btnSimpan"/>';
				/*<a href="'.base_url().'admin/lanjut_order/'.$value['kd_order'].'" rel="example_group" class="link" style="float:left;">Simpan</a>*/
			echo '</td></tr>';
			$nom++;
	}
?>
		</table>
	</div>
	
