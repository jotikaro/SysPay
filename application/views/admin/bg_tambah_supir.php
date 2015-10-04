<!DOCTYPE html>
<link type="text/css" href="<?php echo base_url(); ?>asset/js/kalender/js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kalender/js/ui.datepicker.id.js"></script>

<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "dd-mm-yy", 
          changeMonth : true,
          changeYear  : true,
		  numberOfMonths: 2
        });
      });
	  
	  function tutup(){
        window.parent.location.reload(true);
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

<form method="post" action="<?php echo base_url(); ?>admin/simpan_supir" name="tes">
<table>
<tr>
	<td width="180">Nomor KTP</td>
	<td width="50">:</td>
	<td>
		<input type="text"  name="noKTP" placeholder='Nomor Kartu Tanda Penduduk'  maxlength='16' class="input-read-only"/>
	</td>
</tr>

<tr>
	<td width="180">Nama Supir</td>
	<td width="50">:</td>	
	<td><input type="text" name="nama" placeholder='Nama Supir' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">No. Rek</td>
	<td width="50">:</td>	
	<td><input type="text" name="noRek" placeholder='Nomor Rekening' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Nama Bank</td>
	<td width="50">:</td>	
	<td><input type="text" name="namaBank"  placeholder='Nama Bank' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Nama Rek</td>
	<td width="50">:</td>	
	<td><input type="text" name="namaRek" placeholder='Nama Di Rekening' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Kota</td>
	<td width="50">:</td>	
	<td><input type="text" name="kota"  placeholder='Kota' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Provinsi</td>
	<td width="50">:</td>	
	<td><input type="text" name="provinsi"  placeholder='Provinsi' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Alamat</td>
	<td width="50">:</td>	
	<td><input type="text" name="alamat" placeholder='Alamat Supir' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">No. Telp 1</td>
	<td width="50">:</td>	
	<td><input type="text" name="noTelp" placeholder='No. HP Supir 1' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">No. Telp 2</td>
	<td width="50">:</td>	
	<td><input type="text" name="noTelp1" placeholder='No. HP Supir 2' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">No. Telp 3</td>
	<td width="50">:</td>	
	<td><input type="text" name="noTelp2" placeholder='No. HP Supir 3' size="50" class="input-read-only" />	</td>
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
