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
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true,
		  numberOfMonths: 2
        });
      });
      
      function tutup(){
        window.parent.location.reload(true);
      }
      
      function hitung(){
      		var totQty = 0;
      		for(i=0;i<=10;i++){
      			a = document.getElementById(i).value;
      			totQty += (a*1);
      			document.getElementById("totQ").value = totQty;
      			document.getElementById("totalQuantity").value = totQty;
      		}      		
      }

		counter = 0;
	  function action()
	  {
		counterNext = counter + 1;		
	document.getElementById("input"+counter).innerHTML = "<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type='text' class='input-read-only' name='txtJemput"+counter+"' style='width:400px;' placeholder='Alamat Penjemputan "+(counterNext+1)+"'></td>&nbsp;<input type='text' name='txtQty"+counter+"' placeholder='Quantity' onkeyup='hitung()' id='"+(counter+1)+"' class='input-read-only' style='width:50px;' /><div id='input'+counterNext+''></div></tr>";
		counter++;
	  }


	function fnHitung() {
	var angka = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('inputku').value)))); //input ke dalam angka tanpa titik
	if (document.getElementById('inputku').value == "") {
		alert("Jangan Dikosongi");
		document.getElementById('inputku').focus();
		return false;
	}
	else
		if (angka >= 1) {
		alert("angka aslinya : "+angka);
		document.getElementById('inputku').focus();
		document.getElementById('inputku').value = tandaPemisahTitik(angka) ;
		return false; 
		}
	}

	function lostRp(){
		document.getElementById("inputmu").style.visibility = 'hidden';				
	}
	function lostLtr(){		
	   document.getElementById("inputmu").style.visibility= 'visible';
	   document.getElementById("inputmu").style.marginLeft = "-235px";
	   document.getElementById("inputku").style.visibility = 'hidden';
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
	<h1>Pinjaman - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>		
		

		<div class="cleaner_h10"></div>
<form method="post" action="<?php echo base_url(); ?>admin/simpan_biaya_pinjaman">
<table>
<tr>
<td width="180">Tanggal Pinjaman</td>
<td width="50">:</td>
<td>
	<input type="text"  placeholder='Input Tanggal' name="tanggal" id="tanggal" style='width:100px;' class="input-read"/>	
</td>
</tr>
<tr>
<td width="180">Nama Supir</td>
<td width="50">:</td>
<td>
	<select name='txtSupir' class='input-read'>
		<option value=''>---   Pilih Supir   ---</option>
		<?php
		foreach ($supir->result_array() as $value) 
		{
			echo "<option value='".$value['no_ktp']."'>".$value['nama']."</option>";
		}
		?>
	</select>
</td>
</tr>
<tr>
<td width="180">Jumlah</td>
<td width="50">:</td>	
	<td><input type="text" name="txtJumlah" placeholder='Jumlah' class="input-read" /></td>
</tr>
<tr>
<td width="180">Keterangan</td>
<td width="50">:</td>
<td>
  <input type="text" name="txtKet"  placeholder='Keterangan' class="input-read" /> 
</td>
</tr>
<tr>
<td width="180">Aksi</td>
<td width="50">:</td>
<td>
  <input type="radio" name="txtAksi"  value='Debit' />Debit
  <input type="radio" name="txtAksi"  value='Kredit'/>Kredit
</td>
</tr>
<tr>
	<td colspan='3'>&nbsp;</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Simpan" class="btn-kirim">

<input type="hidden" name="stts" value="tambah"></td>
</tr>

</table>

</form>
</body>
</div>