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
      			 if (namaCustomer[i].toLowerCase().match(cari.toLowerCase())) {
      				  //alert(namaCustomer[i])
      				  document.getElementById("x").innerHTML=namaCustomer[i];
      				}	
			}
      		}			
      }

      function fokus(){
        document.getElementById('tanggal').focus();
      }
      function kosong(){
      	 document.getElementById("cari").value="";
      }

		counter = 0;
	  function action()
	  {
		counterNext = counter + 1;		
	document.getElementById("input"+counter).innerHTML = "<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type='text' class='input-read-only' name='txtJemput"+counter+"' style='width:175px;' placeholder='Alamat Penjemputan '></td>&nbsp;<input type='text' name='kotaJemput"+(counter)+"' style='width:100px'  placeholder='Nama Kota ' class='input-read-only' />&nbsp;<input type='text' name='provJemput"+counter+"' style='width:115px' placeholder='Nama Provinsi ' class='input-read-only' />&nbsp;<input type='text' name='txtQty"+counter+"' placeholder='Qty' onkeyup='hitung()' id='"+(counter+1)+"' class='input-read-only' style='width:30px;' /><div id='input'+counterNext+''></div></tr>";
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
/*width:500px;*/
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

<body onload='fokus()'>
<form method="post" action="<?php echo base_url(); ?>admin/simpan_order" name="tes">
<table>

<tr>
<td width="180">Tanggal Pesanan</td>
<td width="50">:</td>
<td>
	<input type="text"  placeholder='Input Tanggal' name="tanggal" id="tanggal" style='width:100px;' class="input-read-only"/>
</td>
</tr>
<tr>
<td width="180">Nama Customer</td>
<td width="50">:</td>
<td>

	<select name='namaCustomer' class='input-read-only' style='width:300px'>
	<?php
	$all ="";
		foreach($customer->result_array() as $cust)
		{
			if($e['kd_mk']==$mk['kd_mk']) $pilih="selected='selected'";

			$all= $all."/".$cust['nama'];
		?>
			<option id='x' value="<?php echo $cust['kd_customer']; ?>"/><?php echo $cust['nama']; ?></option>
		<?php
		}		
	?>
</select>
<input type='hidden' value='<?php echo $all; ?>' id='all'/>
<input type='text' name='txtCust' style='width:150px;' onblur='kosong()' onkeyup='getAll()' id='cari' placeholder='Cari customer' class='input-read-only' style='width:50px;' />
</td>
</tr>

<tr>
<td width="180">Alamat Penjemputan</td>
<td width="50">:</td>	
	<td><input type="text" name="txtJemputAwal" style='width:175px;' size="50" placeholder='Alamat Penjemputan' class="input-read-only" />			
    <input type="text" name="kotaJemput" style='width:100px'  placeholder='Nama Kota' class="input-read-only" />
  <input type="text" name="provJemput" style='width:115px' placeholder='Nama Provinsi' class="input-read-only" />
  <input type='text' name='txtQtyAwal' placeholder='Qty' id='0' onkeyup='hitung()' class='input-read-only' style='width:30px;' />

	         <div id="input0" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input1" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input2" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input3" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input4" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input5" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input6" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input7" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input8" class="controls" style="margin-top:5px;margin-left:-8px;"></div>  
             
            <p><a href="javascript:action();">Tambah Alamat</a> (<i><small>Max 10!</small></i>)</p> 
         </td> 

</tr>

<tr>
<td width="180">Alamat Pengiriman</td>
<td width="50">:</td>
<td><input type="text" name="alamat_kirim" style='width:190px' placeholder='Alamat Pengiriman' class="input-read-only" />
 <input type="text" name="kotaKirim" style='width:120px'  placeholder='Nama Kota' class="input-read-only" />
  <input type="text" name="provKirim" style='width:135px' placeholder='Nama Provinsi' class="input-read-only" />
  </td>
</tr>

<tr>
<td width="180">Produk</td>
<td width="50">:</td>
<td>
  <input type="text" name="produk"  placeholder='Nama Produk' class="input-read-only" /> 
</td>
</tr>
<tr>
<td width="180">Satuan Produk</td>
<td width="50">:</td>
<td><input type="text" name="satuan" size="50" placeholder='Satuan Produk/Barang' class="input-read-only" /></td>
</tr>
<tr>
<td width="180">Total Quantity</td>
<td width="50">:</td>
<td><input type="text" name="tqty" disabled id='totQ' size="50" class="input-read-only" placeholder='Quantity'/>
<input type="hidden" name="tot_qty" id='totalQuantity'/></td>
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