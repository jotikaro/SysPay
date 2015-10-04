<!DOCTYPE html>
<script type='text/javascript'>
function tutup(){
        window.parent.location.reload(true);
      }
</script>
<script type="text/javascript"> 
      counter = 0;
	  function action()
	  {
		counterNext = counter + 1;		
	document.getElementById("input"+counter).innerHTML = "<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type='text' class='input-read-only' name='namaContact"+counter+"' style='width:175px;' placeholder='Contact Person "+(counterNext+1)+"'></td>&nbsp;<input type='text' name='noTelpContact"+(counter)+"' style='width:100px'  placeholder='Nomor Telepon "+ (counterNext+1)+"' class='input-read-only' /><input type='checkbox' value='1' name='cek"+(counter)+"'/><div id='input'+counterNext+''></div></tr>";
		counter++;

		document.getElementById("ul").value=counter;
	  }

function tutup(){
        window.parent.location.reload(true);
      }

    </script>
<style>
a{
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
<form method="post" action="<?php echo base_url(); ?>admin/simpan_cust">
<?php
	foreach($edit->result_array() as $e)
	{
		
?>
<table>

<tr>
<td width="180">Nama Customer</td>
<td width="50">:</td>
<td>
	<input type='hidden' name='kd_cust' value="<?php echo $e['kd_customer'] ?>"/>
	<input type='text' name='nama' value="<?php echo $e['nama']; ?>" class="input-read-only"  />
</td>
</tr>

<tr>
<td width="180">Alamat </td>
<td width="50">:</td>
<td>
	<input type='text' name='alamat' value="<?php echo $e['alamat']; ?>" class="input-read-only" />	
</td>
</tr>
<tr>
<td width="180">Kota </td>
<td width="50">:</td>
<td>
	<input type='text' name='kota' value="<?php echo $e['kota']; ?>" class="input-read-only" />	
</td>
</tr>
<tr>
<td width="180">Alamat </td>
<td width="50">:</td>
<td>
	<input type='text' name='provinsi' value="<?php echo $e['provinsi']; ?>" class="input-read-only" />	
</td>
</tr>
<tr>
<td width="180">No. Telp</td>
<td width="50">:</td>
<td>
<input type="text" name="noTelp" size="50" class="input-read-only" value="<?php echo $e['no_telp']; ?>" />
</td>
</tr>
<tr>
<td width="180">Email</td>
<td width="50">:</td>
<td><input type="text" name="email" size="50" class="input-read-only" value="<?php echo $e['email']; ?>" /></td>
</tr>
<tr>
	<td width="180">Website</td>
	<td width="50">:</td>
	<td><input type="text" name='web' size="50" value="<?php echo $e['website']; ?>" class="input-read-only" /></td>
</tr>
<tr>
<td width="180">Contact Person</td>
<td width="50">:</td>	
	<td><input type="text" name="namaContact" style='width:175px;' size="50"  placeholder='Contact Person 1'   class="input-read-only" />			
    <input type="text" name="noTelpContact" style='width:100px'  placeholder='Nomor Telepon 1' class="input-read-only" />
    <input type='checkbox' value='1' name='cek'/> (Tandai untuk admin)

	         <div id="input0" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input1" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input2" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input3" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input4" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input5" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input6" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input7" class="controls" style="margin-top:5px;margin-left:-8px;"></div> 
             <div id="input8" class="controls" style="margin-top:5px;margin-left:-8px;"></div>  
             
            <p><a href="javascript:action();">Tambah Contact Person</a> (<i><small>Max 10!</small></i>)</p> 
         </td> 
<?php //$ul++; //}else{ } ?>
</tr>
<?php } ?>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Update" class="btn-kirim">
<input type="reset" value="Batal" onclick='tutup()' class="btn-kirim">

<input type="hidden" name="stts" value="edit"></td>
</tr>

</table>


</form>