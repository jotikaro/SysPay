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

<body onload='lostRp();pilih()'>
<div id='container'>
	<h1>Mutasi Saldo Bank - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>		
		

		<div class="cleaner_h10"></div>
<form method="post" action="<?php echo base_url(); ?>admin/simpan_mutasi">
<table>
<tr valign='top'>
<td width="180">Nama Bank Asal</td>
<td width="50">:</td>
<td>
	<!--<input type='hidden' name='kodeBankTujuan'/>
	<input type='text' placeholder='Input Bank Tujuan'   class="input-read-only" name='bankTujuan'/>	-->
	
	<select name='id_kelas' id='id_kelas' class='input-read'>
	<option value=''>--- Pilih Bank Asal ---</option>
	<?php
	foreach($bank->result_array() as $r)
	{	
	?>
	
		<option value="<?php echo $r['kode'] ?>"><?php echo $r['bank']; ?></option> <?php
	}
	echo "</select>";
	?>
	</div>
	<script type="text/javascript"> 	
	  	$("#id_kelas").change(function(){
	    		var id_kelas = {id_kelas:$("#id_kelas").val()};	   
	    		$.ajax({
						type: "POST",
						url : "<?php echo base_url(); ?>index.php/admin/bank/",
						data: id_kelas,
						success: function(msg){
							$('#siswa').html(msg);
						}
				  	});
	    });
	   </script>
	
	   <div id="siswa">
	
    </div>
</td>
</tr>
<tr valign='top'>
<td width="180">Nama Bank Tujuan</td>
<td width="50">:</td>
<td>
	<!--<input type='hidden' name='kodeBankTujuan'/>
	<input type='text' placeholder='Input Bank Tujuan'   class="input-read-only" name='bankTujuan'/>	-->
	<div id="kelas">

	<select name='id_kelasx' id='id_kelasx' class='input-read'>
	<option value=''>--- Pilih Bank Tujuan ---</option>
	<?php
	foreach($bankT->result_array() as $r)
	{	
	?>
	
		<option value="<?php echo $r['id'] ?>"><?php echo $r['nama_bank']; ?></option> <?php
	}
	echo "</select>";
	?>
	</div>
	<script type="text/javascript"> 	
	  	$("#id_kelasx").change(function(){
	    		var id_kelas = {id_kelas:$("#id_kelasx").val()};	   
	    		$.ajax({
						type: "POST",
						url : "<?php echo base_url(); ?>index.php/admin/banks/",
						data: id_kelas,
						success: function(msg){
							$('#siswax').html(msg);
						}
				  	});
	    });
	   </script>
	
	   <div id="siswax">
	
    </div>
</td>
</tr>
<tr>
<td width="180">Jumlah </td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read" id='jMutasi' name='jlhMutasi' placeholder='Input Jumlah '/>	
</td>
</tr>
<tr>
<td width="180">Keterangan</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read" name='txtKet' placeholder='Input Keterangan'/>	
</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Simpan" class="btn-kirim">
<input type="hidden" name="id" value="<?php //echo $e['id']; ?>">
<input type="hidden" name="stts" value="edit"></td>
</tr>

</table>

</form>
</body>
</div>


