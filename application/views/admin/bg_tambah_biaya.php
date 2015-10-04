<!DOCTYPE html>
<link type="text/css" href="<?php echo base_url(); ?>asset/js/kalender/js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.id.js"></script>

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
<form method="post" action="<?php echo base_url(); ?>admin/simpan_biaya">
<table>
<tr>
<td width="180">Nama Modul Biaya</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only" placeholder='Biaya asal-tujuan (Produk)' name='namaModul' />	
</td>
</tr>
<tr>
<td width="180">Kota Penjemputan</td>
<td width="50">:</td>
<td>
	<input type="text"  placeholder='Kota Penjemputan' name="txtJemput" class="input-read-only"/>
</td>
</tr>
<tr>
<td width="180">Kota Pengiriman (Tujuan)</td>
<td width="50">:</td>	
	<td><input type="text" name="txtTujuan" placeholder='Kota Pengiriman' class="input-read-only" /></td>
</tr>
<tr>
<td width="180">Produk</td>
<td width="50">:</td>
<td>
  <input type="text" name="produk"  placeholder='Nama Produk' class="input-read-only" /> 
</td>
</tr>
<tr>
<td width="180">Biaya </td>
<td width="50">:</td>	
	<td><input type="text" name="namaBiaya" style='width:175px;' size="50" placeholder='Nama Biaya 1' class="input-read-only" />			
    <input type="text" name="jlhBiaya" style='width:100px'  placeholder='Jumlah Biaya 1' class="input-read-only" />

	         <div id="input0" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input1" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input2" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input3" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input4" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input5" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input6" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input7" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input8" class="controls" style="margin-top:5px;margin-left:-8px;"></div>  
             <div id="input9" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input10" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input11" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input12" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input13" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input14" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input15" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input16" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input17" class="controls" style="margin-top:5px;margin-left:-8px;"></div>  
             <div id="input18" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input19" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input20" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input21" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input22" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input23" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input24" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input25" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input26" class="controls" style="margin-top:5px;margin-left:-8px;"></div>  
             <div id="input27" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input28" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input29" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input30" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input31" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input32" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input33" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input34" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input35" class="controls" style="margin-top:5px;margin-left:-8px;"></div>               
             <div id="input36" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input37" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input38" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input39" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input40" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input41" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input42" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input43" class="controls" style="margin-top:5px;margin-left:-8px;"></div>  
             <div id="input42" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input43" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input44" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input45" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input46" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input47" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input48" class="controls" style="margin-top:5px;margin-left:-8px;"></div>              

            <p><a href="javascript:action();">Tambah Biaya</a> (<i><small>Max 50!</small></i>)</p> 
         </td> 
<?php //$ul++; //}else{ } ?>
</tr>


<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Simpan" class="btn-kirim">
<input type="reset" value="Batal" onclick='tutup()' class="btn-kirim">
<input type="hidden" name="stts" value="tambah"></td>
</tr>

</table>

</form>
