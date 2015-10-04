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
<div id="container">
	<h1>Akun - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		<div class="cleaner_h10"></div>
	<?php echo $this->session->flashdata('save_akun'); ?>
		
	<form method="post" action="<?php echo base_url(); ?>admin/simpan_akun">
	<table border="0" width="100%" style="border-collapse: collapse; font-size:12px;" cellpadding="5">

	<tr>
		<td>Password Lama</td>
		<td>:</td>
		<td><input type="text" id='a' name="pass_lama" class='input-read' placeholder='Input Password Lama' /></td>
	</tr>
	<tr>
		<td>Password Baru</td>
		<td>:</td>
		<td><input type="text" id='b' name="pass_baru" placeholder='Input Password Baru' class='input-read'/></td>
	</tr>
	<tr>
		<td>Ulangi Password Baru</td>
		<td>:</td>
		<td><input type="text" id='c' name="ulangi_pass" placeholder='Ulangi Input Password Baru' class='input-read'/></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" onclick='cek()' value="Simpan Data" class="btn-kirim"/></td>
	</tr>
		
	
	</table>
	</form>


	</div>
