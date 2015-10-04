<!DOCTYPE html>
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

<form method="post" action="<?php echo base_url(); ?>admin/simpan_cust" name="tes">
<table>
<tr>
	<td width="180">Nama Customer</td>
	<td width="50">:</td>
	<td>
		<input type="text"  name="nama" placeholder='Nama Customer' id="nama" class="input-read-only"/>
		<input type="hidden"  name="txtUl" id="ul"/>
	</td>
</tr>

<tr>
	<td width="180">Alamat</td>
	<td width="50">:</td>	
	<td><textarea name="alamat" placeholder='Alamat Customer' size="50" class="input-read-only" /></textarea>	</td>
</tr>
<tr>
	<td width="180">Kota</td>
	<td width="50">:</td>	
	<td><input type="text" name="kota" placeholder='Kota' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">Provinsi</td>
	<td width="50">:</td>	
	<td><input type="text" name="provinsi" placeholder='Provinsi' size="50" class="input-read-only" />	</td>
</tr>
<tr>
	<td width="180">No. Telp</td>
	<td width="50">:</td>
	<td><input type="text" name="noTelp" size="50" placeholder='Nomor HP Customer' class="input-read-only" /></td>
</tr>
<tr>
	<td width="180">Email</td>
	<td width="50">:</td>
	<td><input type="text" name="email" size="50" placeholder='Email Customer' class="input-read-only" /></td>
</tr>
<tr>
	<td width="180">Website</td>
	<td width="50">:</td>
	<td><input type="text" name='web' size="50" placeholder='Website Customer' class="input-read-only" /></td>
</tr>
<tr>
<td width="180">Contact Person</td>
<td width="50">:</td>	
	<td><input type="text" name="namaContact" style='width:175px;' size="50" placeholder='Contact Person 1' class="input-read-only" />			
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
