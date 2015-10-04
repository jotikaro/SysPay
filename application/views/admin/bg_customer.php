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
      counter = 0;
	  function action()
	  {
		counterNext = counter + 1;		
	document.getElementById("input"+counter).innerHTML = "<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type='text' class='input-read-only' name='namaBiaya"+counter+"' style='width:175px;' placeholder='Nama Biaya "+(counterNext+1)+"'></td>&nbsp;<input type='text' name='jlhBiaya"+(counter)+"' style='width:100px'  placeholder='Jumlah Biaya "+ (counterNext+1)+"' class='input-read-only' /><div id='input'+counterNext+''></div></tr>";
		counter++;
	  }

function tutup(){
        window.parent.location.reload(true);
      }

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
	<h1>Daftar Customer - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
		<?php echo $this->session->flashdata('save_krs'); ?>
		<table border="1" width="100%" style="border-collapse: collapse;" cellpadding="5">
		<td colspan="13" align="center" bgcolor="#fff" style="text-transform:uppercase;"><strong>Daftar Customer</strong></td>
		</tr>
		<th align="center">No.</th>
		<th align="center">Customer</th>
		<th align="center">Alamat</th>			
		<th align="center">Kota</th>			
		<th align="center">Provinsi</th>			
		<th align="center">No. Telp</th>
		<th align="center">Email</th>
		<th align="center">Website</th>
		<th align="center">Contact Person</th>
		<th align="center" colspan="2" width="200">
		<?php
		echo '<a href="'.base_url().'admin/tambah_cust" rel="example_group" class="link" style="float:left;">Tambah Customer</a>';
		?>
		</th>
		</tr>
			<?php //Tampilkan_Mata_Kuliah($jadwal); ?>

			<?php
			$no=1;
	$s="";
	foreach ($jadwal->result_array() as $value) 
	{
				echo '<tr><td align="center">'.$no.'.</td>';				
				echo '<td align="center">'.$value['nama'].'</td>';
				echo '<td align="center">'.$value['alamat'].'</td>';
				echo '<td align="center">'.$value['kota'].'</td>';
				echo '<td align="center">'.$value['provinsi'].'</td>';
				echo '<td align="center">'.$value['no_telp'].'</td>';
				echo '<td align="center">'.$value['email'].'</td>';
				echo '<td align="center">'.$value['website'].'</td>';
				echo '<td align="center">';
				$s = $this->db->query("select * from tbl_contact where id=".$value['kd_contact']."");
				if($s->num_rows() > 0)
				{	echo "<table>";	
					foreach($s->result() as $row){
						if($row->status!=0 && $status != "admin")
							continue;
						else
							echo "<tr><td>&rarr; $row->nama</td><td>$row->no_telp</td></tr>";
					}
					echo "</table>";
				}

				echo '</td>';
				echo '<td align="center">
				<a href="'.base_url().'admin/edit_cust/'.$value['kd_customer'].'" rel="example_group" class="link" style="float:left;">Edit</a>
				</td>';
				echo '<td align="center">
				<a href="'.base_url().'admin/hapus_cust/'.$value['kd_customer'].'"
				onClick=\'return confirm("Anda yakin...??")\' class="link" style="float:left;">Hapus</a>
				</td></tr>';
				$no++;

	}	
	?>	

		</table>
	</div>
	
<?php
function Tampsilkan_Mata_Kuliah($jdwl)
{
	$rows=array();
	$index=0;
	$temp='';
	$acuan=0;
	$rowspan=1;
	$no=1;
	$s="";
	foreach ($jdwl->result_array() as $value) 
	{
				echo '<tr><td align="center">'.$no.'.</td>';				
				echo '<td align="center">'.$value['nama'].'</td>';
				echo '<td align="center">'.$value['alamat'].'</td>';
				echo '<td align="center">'.$value['kota'].'</td>';
				echo '<td align="center">'.$value['provinsi'].'</td>';
				echo '<td align="center">'.$value['no_telp'].'</td>';
				echo '<td align="center">'.$value['email'].'</td>';
				echo '<td align="center">'.$value['website'].'</td>';
				echo '<td align="center">';
				$s = $this->db->query("select * from tbl_contact where id=".$value['kd_contact']."");
				if($s->num_rows() > 0)
				{	echo "<ul>";	
					foreach($s->result() as $row){
						echo "<li>$row->nama &rarr; $row->no_telp</li>";
					}
					echo "</ul>";
				}

				echo '</td>';
				echo '<td align="center">
				<a href="'.base_url().'admin/edit_cust/'.$value['kd_customer'].'" rel="example_group" class="link" style="float:left;">Edit</a>
				</td>';
				echo '<td align="center">
				<a href="'.base_url().'admin/hapus_cust/'.$value['kd_customer'].'"
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
