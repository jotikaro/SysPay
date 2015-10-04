<!DOCTYPE html>
<script src="<?php echo base_url(); ?>asset/js/jquery-1.4.3.js" type="text/javascript"></script>
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

<link type="text/css" href="<?php echo base_url(); ?>asset/js/kalender/js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.id.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/my.js"></script>

<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true,
		  numberOfMonths: 2
        });
      });
      
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

<link href="<?php //echo base_url(); ?>index.php/asset/css/chosen.css" rel="stylesheet" type="text/css">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css" type="text/css" rel="stylesheet"/>
<script src="<?php //echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('#mulai').datepicker({dateFormat: 'dd/mm/yy'});
		$('#akhir').datepicker({dateFormat: 'dd/mm/yy'});
	});
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
a:hover{
text-decoration:none;
color:#fff;
padding:5px;
border:1px solid #333333;
float:left;
background-color:#666666;
}
body{
font-size:12px;
font-family:Tahoma,Arial;
margin:30px;
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
<form method="post" action="<?php echo base_url(); ?>admin/simpan_fund">
<table>

<tr>
<td width="180">Tanggal Transfer</td>
<td width="50">:</td>
<td>
	<input type='text' id="tanggal" class="input-read-only" placeholder='Input Tanggal Transfer'  name='tglTransfer' />
</td>
</tr>
<tr>
<td width="180">Bank Asal</td>
<td width="50">:</td>
<td>
	<input type='text' placeholder='Input Bank Asal' class="input-read-only" name='bankAsal' />	
</td>
</tr>
<?php 
foreach($supir->result_array() as $e)
	{		
		?>
<tr>
<td width="180">Bank Tujuan</td>
<td width="50">:</td>
<td>
	<input type='hidden' name='kodeBankTujuan' value='<?php echo $e['no_ktp'] ?>'/>
	<input type='text' placeholder='Input Bank Tujuan' value='<?php echo $e['nama_bank'] ?>'  class="input-read-only" name='bankTujuan'/>	
</td>
</tr>
<tr>
<td width="180">Nama di Rekening / Nama Supir</td>
<td width="50">:</td>
<td>
	<input type='text' placeholder='Pemilik' value='<?php echo $e['nama_rek']." / ".$e['nama'] ?>'  class="input-read-only" name='pemilik'/>	
</td>
</tr>
<td width="180">No. Rekening</td>
<td width="50">:</td>
<td>
	<input type='text' placeholder='Input No Rek' value='<?php echo $e['no_rek'] ?>'  class="input-read-only" name='noRek'/>	
</td>
</tr>
<?php } ?>
<tr>
<td width="180">Jumlah Transfer</td>
<td width="50">:</td>
<td>
	<input type='text' placeholder='Input Jumlah Transfer' class="input-read-only" name='jlhBiaya' value="<?php echo number_format ($jlh, 2, ',', '.'); ?>"/>	
</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="hidden" name="kdLanjut" value="<?php echo $kdLanjut; ?>">
<input type="hidden" name="kdAlamat" value="<?php echo $kdAlamat; ?>">
<input type="hidden" name="idAlamat" value="<?php echo $idAlamat; ?>">
<input type="hidden" name="stts" value="tambah">
<input type="submit" value="Catat" class="btn-kirim">
</td>
</tr>

</table>


</form>