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
<form method="post" action="<?php echo base_url(); ?>admin/simpan_bank">
<table>
<tr>
<td width="180">Nama Bank</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only" placeholder='Nama Bank' name='namaBank' />	
</td>
</tr>
<tr>
<td width="180">Nama di Rekening</td>
<td width="50">:</td>
<td>
	<input type="text"  placeholder='Nama di Rekening' name="namaRek" class="input-read-only"/>
</td>
</tr>
<tr>
<td width="180">Nomor Rekening</td>
<td width="50">:</td>	
	<td><input type="text" name="noRek" placeholder='Nomor Rekening' class="input-read-only" /></td>
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
