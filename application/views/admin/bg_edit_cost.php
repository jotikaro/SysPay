<!DOCTYPE html>
<script srcs="<?php echo base_url(); ?>asset/js/jquery-1.4.3.js" type="text/javascript"></script>
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

<link type="text/css" href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet" /> 
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
	   var st = document.getElementById("ceks").checked;
	   if(st == true){
		   document.getElementById("inputmu").style.visibility= 'visible';
		   document.getElementById("inputmu").style.marginLeft = "-235px";
		   document.getElementById("inputku").style.visibility = 'hidden';
		}else{
			document.getElementById("inputmu").style.visibility= 'hidden';
		   document.getElementById("inputmu").style.marginLeft = "-235px";
		   document.getElementById("inputku").style.visibility = 'visible';
		}
	}

    </script>

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
	document.getElementById("input"+counter).innerHTML = "<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type='text' class='input-read' name='namaBiaya"+counter+"' style='width:175px;' placeholder='Biaya Tambahan"+(counterNext)+"'></td>&nbsp;<input type='text' name='jlhBiaya"+(counter)+"' style='width:100px'  placeholder='Jumlah Biaya "+ (counterNext)+"' class='input-read' /><div id='input'+counterNext+''></div></tr>";
		counter++;
	  }

	  function pilih(){
	  	/* document.getElementById("x").selected=true;	  	 
	  	 document.getElementById("t").selected= true;*/
	  }
    </script>

<style type='text/css'>
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

<body onload='lostRp();pilih();'>
<div id='container'>
	<h1>Cost Planning (CP) - Sistem Informasi Aman Transport</h1>

	<div id="body">
		<?php
			echo $bio;
			echo $menu;
		?>		
		

		<div class="cleaner_h10"></div>
<form method="post" action="<?php echo base_url(); ?>admin/simpan_cost">
	<input type='hidden' value='<?php echo $all_kode; ?>' name='allKode'/>
<?php
	//echo $all_kode;
	
	foreach($edit->result_array() as $e)
	{
		
?>
<table>
	<tr>
<td width="180">Customer</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['customer']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Kota Penjemputan</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['tujuan']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Kota Pengiriman</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['kotaAsal']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Produk</td>
<td width="50">:</td>
<td>
	<input type='text' disabled class="input-read-only" name='jlhBiaya' value="<?php echo $e['produk']; ?>"/>	
</td>
</tr>
<tr valign='top'>
<td width="180">Pilih Jenis Pembayaran</td>
<td width="50">:</td>
<td>
	<div id="kelas">
	<?php
	echo "<select name='id_kelas' id='id_kelas' disabled class='input-read'>";
	echo "<option>- Pilih Jenis Biaya -</option>";
	foreach($biaya->result_array() as $r)
	{		
		/*echo $e['tujuan']."==".$r['alamat_jemput']."<br/>";
		echo $e['kotaAsal']."==".$r['alamat_tujuan']."<br/>";
		echo $e['produk']."==".$r['produk']."<br/>";
		
		echo "<br/><br/>";*/
		
		if( strtolower($e['tujuan']) == strtolower($r['alamat_jemput']) && strtolower($e['kotaAsal']) == strtolower($r['alamat_tujuan']) && strtolower($e['produk']) == strtolower($r['produk'])){
	?>
	
		<option class='logo' selected  value="<?php echo $r['kd_biaya'] ?>"><?php echo $r['nama_biaya']; ?>
		</option>
		<input type='hidden' name='kodeBayar' value="<?php echo $r['kd_biaya'] ?>" />
	<?php 
		}else{ ?>
			<option value="<?php echo $r['kd_biaya'] ?>"><?php echo $r['nama_biaya']; ?></option><?php
		}

	}
	echo "</select>";
	?>
	</div>
	<script type="text/javascript"> 	
	  	$("#id_kelas").each(function(){
	    		var id_kelas = {id_kelas:$("#id_kelas").val()};	    		
	    		$.ajax({
						type: "POST",
						url : "<?php echo base_url(); ?>index.php/admin/siswa/",
						data: id_kelas,
						success: function(msg){
							$('#siswa').html(msg);
						}
				  	});
	    });
	   </script>
	   <br/>
	   <div id="siswa">
	
    </div>
</td>
</tr>

<tr>
<td width="180">Biaya Tambahan</td>
<td width="50">:</td>	
	<td>

	         <div id="input0" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input1" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input2" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input3" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input4" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input5" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input6" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input7" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input8" class="controls" style="margin-top:5px;margin-left:-8px;"></div>  
             
            <p><a href="javascript:action();">Buat Biaya Tambahan</a> (<i><small>Max 10!</small></i>)</p> 
         </td> 
<?php //$ul++; //}else{ } ?>
</tr>

<tr>
<td width="180">Jumlah BBM (Rupiah/Liter)</td>
<td width="50">:</td>
<td>
	<input type="text" name="jlhRupiah" id="inputku" onkeydowns="return numbersonly(this, event);" onkeyups="javascript:tandaPemisahTitik(this);" style='width:150px;' class="input-read"  placeholder='Input Jumlah Rupiah'   value="" />
	<input style='margin-left:5px' id='ceks' type='checkbox' name='cek' value='ceklish' onclick='lostLtr()'/>Request<input type="text" name="jlhLiter" id="inputmu" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" style='width:150px;' class="input-read"  placeholder='Input Jumlah Liter'    />
</td>
</tr>
<!--<tr>
<td width="180">Rincian Biaya</td>
<td width="50">:</td>
<td>
	<?php
	/*$no=0;
	foreach($rincian->result_array() as $r)
	{
	?>
		<input type='hidden' name='kdRt<?php echo $no;?>' value='<?php echo $r['id_rincian'] ?>'/>		
		<input type="text" name='kdR<?php echo $no;?>' style='width:150px;' class="input-read-only"  placeholder='Input Jumlah Rupiah' value="<?php echo $r['nama_biaya'] ?>" />

		<input type="text" name="xz" id="inputmu" style='width:150px;' class="input-read-only"  placeholder='Input Jumlah Liter' value="<?php echo $r['jumlah'] ?>"   />
		<br/>
	<?php 
	$no++;
	}*/
	?>
	<input type='hidden' name='jlhUlang' value='<?php echo $no ?>'/>
</td>
</tr> 
<tr>
<td width="180">Tanggal Kirim</td>
<td width="50">:</td>
<td>
	<input type="text"  placeholder='Input Tanggal' name="tanggalSurat" id="tanggal" style='width:100px;' class="input-read" value='<?php //echo date("Y-m-d"); ?>'/>
</td>
</tr>-->

<?php } ?>
<tr>
<td width="180">Pilih Bank Sumber Saldo</td>
<td width="50">:</td>
<td>
	<select name='txtBank' class='input-read-only' id='b'>
		<option value=''>--- Pilih Bank ---</option>
	<?php
	foreach($bank->result() as $row){ ?>
		<option value='<?php echo $row->id; ?>'><?php echo $row->nama_bank." (".$row->no_rek.")"; ?></option>
	<?php }?>
	</select>
</td>
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