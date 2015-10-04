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
<style>
as{
text-decoration:none;
color:#fff;
padding:5px;
border:1px solid #333333;
float:left;
background-color:#000;
}


.input-read-only {
border: 1px solid #D0D0D0;
padding: 10px;
width:500px;
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
	<h1>Beranda - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>
		
		<p>
		Selamat Datang di Sistem Informasi Pemesanan dan Pembayaran Online Aman Transport.
Setelah melakukan login pertama kali ke Sistem ini, harap segera melakukan pergantian password pada menu Pengaturan Akun, guna menanggulangi hal-hal yang tidak diinginkan.
		</p>
		
		<div id="list">
			<ul>
				<li><strong>Order Receive</strong><br />Bagian yang bertugas menerima order dari Customer</li>
				<li><strong>Order Planning</strong><br />Bagian yang bertugas mengelola orderan dari Customer, termasuk menentukan armada maupun supir yang bertugas menjemput dan mengantar orderan dari dan ke tujuan pengantaran.</li>
				<li><strong>Cost Planning</strong><br />Bagian yang bertugas merencanakan dan mengusulkan biaya perjalanan untuk setiap armada dan supir yang bertugas melakukan penjemputan dan pengantaran orderan</li>
				<li><strong>Cost Approval</strong><br />Bagian yang bertugas memeriksa, menyetujui, ataupun menolak usulan biaya perjalanan yang diberikan oleh bagian Cost Planning</li>
				<li><strong>Fund Transfer</strong><br/>Bagian yang bertugas melakukan transfer dana sesuai dengan rincian dana yang disetujui oleh Cost Approval. Dana yang ditransfer bisa sesuai, lebih, ataupun kurang dari dana yg disetujui, sesuai dengan kekurangan dana di Cost Approval
				</li>
			</ul>
		</div>
		
	</div>
