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
	<input type='text' id="tanggal" value='<?php echo date("Y-m-d"); ?>' class="input-read-only" placeholder='Input Tanggal Transfer'  name='tglTransfer' />
</td>
</tr>
<tr>
<td width="180">Bank Asal</td>
<td width="50">:</td>
<td>
	<input type='text' placeholder='Input Bank Asal' class="input-read-only" name='bankAsal' />	
</td>
</tr>
<tr>
<td width="180">Bank Tujuan</td>
<td width="50">:</td>
<td>
	<!--<input type='hidden' name='kodeBankTujuan'/>
	<input type='text' placeholder='Input Bank Tujuan'   class="input-read-only" name='bankTujuan'/>	-->
	<div id="kelas">

	<select name='id_kelas' id='id_kelas' class='input-read-only'>
	<option>- Pilih Bank Tujuan -</option>
	<?php
	foreach($bank->result_array() as $r)
	{	
	?>
	
		<option value="<?php echo $r['id'] ?>"><?php echo $r['nama_bank']; ?></option> <?php
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
<tr>
<td width="180">Jumlah Saldo Transfer</td>
<td width="50">:</td>
<td>
	<input type='text' placeholder='Input Jumlah Transfer' class="input-read-only" name='jlhBiaya'/>	
</td>
</tr>
<tr>
<td width="180">Keterangan</td>
<td width="50">:</td>
<td>
	<input type='text' placeholder='Input Keterangan' class="input-read-only" name='txtKet'/>	
</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>

<input type="hidden" name="stts" value="tambah">
<input type="submit" value="Simpan" class="btn-kirim">
</td>
</tr>

</table>


</form>