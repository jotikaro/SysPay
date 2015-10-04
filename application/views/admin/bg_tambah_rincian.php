<!DOCTYPE html>
<link type="text/css" href="<?php echo base_url(); ?>asset/js/kalender/js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.id.js"></script>

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

      function getAll(){
      		var allCust = document.getElementById("all").value;            		
      		var namaCustomer = allCust.split("/");      		
      		var cari = document.getElementById("cari").value;      	
      		if(cari!=""){
      			for(i=0;i<namaCustomer.length;i++){
				if (namaCustomer[i].match(cari)) {
				  //alert(namaCustomer[i])
				  document.getElementById("x").innerHTML=namaCustomer[i];
				}	
			}
      		}			
      }
      function kosong(){
      	 document.getElementById("cari").value="";
      }

		counter = 0;
	  function action()
	  {
		counterNext = counter + 1;		
	document.getElementById("input"+counter).innerHTML = "<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type='text' class='input-read-only' name='txtJemput"+counter+"' style='width:400px;' placeholder='Alamat Penjemputan "+(counterNext+1)+"'></td>&nbsp;<input type='text' name='txtQty"+counter+"' placeholder='Quantity' onkeyup='hitung()' id='"+(counter+1)+"' class='input-read-only' style='width:50px;' /><div id='input'+counterNext+''></div></tr>";
		counter++;
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

<body onload='getAlls()'>
<form method="post" action="<?php echo base_url(); ?>admin/simpan_rincian" name="tes">
<table>

<tr>
<td width="180">Nama Biaya</td>
<td width="50">:</td>
<td>
	<input type="text"  placeholder='Input Nama Biaya' name="namaBiaya"  class="input-read-only"/>
</td>
</tr>
<tr>
<td width="180">Jumlah</td>
<td width="50">:</td>
<td>
<input type='text' name='jlhBiaya' style='width:150px;' placeholder='Input Jumlah Biaya' class='input-read-only' style='width:50px;' />
</td>
</tr>
<tr>
<td width="180">Bagian dari Jenis Biaya</td>
<td width="50">:</td>
<td>
<select name='txtJenisBiaya' class='input-read-only'> 
    <option value=''>- Pilih Jenis Biaya -</option>
  <?php
  foreach ($biaya->result_array() as $val) 
  {
    ?>
    <option value='<?php echo $val['id']?>'><?php echo $val['nama_biaya'] ?></option>
    <?php 
  } 
  ?>
</select>
</td>
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Simpan" class="btn-kirim">
<input type="reset" value="Batal" onclick='tutup()' class="btn-kirim">
<input type="hidden" name="stts" value="tambah"></td>
</tr>

</table>

</form>
</body>