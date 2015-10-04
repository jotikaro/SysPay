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
      var awal=0;
	  function action()
	  {
        a = document.getElementById('jum').value;
        if(awal != a){            
            counter = a;            
            awal = a;
        }
        
    document.getElementById("input"+counter).innerHTML = "<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type='text' class='input-read-only' name='namaBiaya"+counter+"' style='width:175px;' placeholder='Nama Biaya'></td>&nbsp;<input type='text' name='jlhBiaya"+(counter)+"' style='width:100px'  placeholder='Jumlah Biaya' class='input-read-only' /><div id='input'+counterNext+''></div></tr>";
        counter++;

	  }

function tutup(){
        window.parent.location.reload(true);
      }

    </script>

<form method="post" action="<?php echo base_url(); ?>admin/simpan_biaya">
<?php
$i=0;
      $jlh = $edit->num_rows();
      echo "<input type='hidden' value='$jlh' id='jum'/>";
      $totQty =0;
	foreach($edit->result_array() as $e)
	{
		if($i == 0){
?>
<table>
<tr>
<td width="180">Nama Modul Biaya</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only" name='namaModul' value="<?php echo $e['modul']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Kota Penjemputan</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only"  name='txtJemput' value="<?php echo $e['alamat_jemput']; ?>" />
</td>
</tr>
<tr>
<td width="180">Kota Pengiriman (Tujuan)</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only" name='txtTujuan' value="<?php echo $e['alamat_tujuan']; ?>"/>	
</td>
</tr>
<tr>
<td width="180">Produk</td>
<td width="50">:</td>
<td>
	<input type='text' class="input-read-only" name='produk' value="<?php echo $e['produk']; ?>"/>	
</td>
</tr>
<?php } ?>
<tr>
<td width="180"><?php if($i==0){ ?> Biaya <?php } ?></td>
<td width="50">:</td>	
<?php if($i== 0){ ?>
	<td><input type="text" name="namaBiaya" style='width:175px;' size="50" placeholder='Nama Biaya' class="input-read-only" value="<?php echo $e['nama_biaya']; ?>"/>			
    <input type="text" name="jlhBiaya" style='width:100px'  placeholder='Jumlah Biaya' class="input-read-only" value="<?php echo $e['jumlah']; ?>" />
     <?php }else{ ?>
      <td><input type="text" name="namaBiaya<?php echo ($i-1); ?>" style='width:175px;' size="50" placeholder='Nama Biaya' class="input-read-only" value="<?php echo $e['nama_biaya']; ?>"/>                 
    <input type="text" name="jlhBiaya<?php echo ($i-1); ?>" style='width:100px'  placeholder='Jumlah Biaya' class="input-read-only" value="<?php echo $e['jumlah']; ?>" />
      <?php } 

            if($jlh < 1)
	         echo '<div id="input0" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh < 2)
              echo '<div id="input1" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh < 3)
              echo '<div id="input2" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <4)
              echo '<div id="input3" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <5)
              echo '<div id="input4" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <6)
              echo '<div id="input5" class="controls" style="margin-top:5px;margin-left:-8px;"></div>'; 
            if($jlh <7)
              echo '<div id="input6" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <8)
              echo '<div id="input7" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <9)
                echo '<div id="input8" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <10)
                echo '<div id="input9" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <11)
                echo '<div id="input10" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <12)
                echo '<div id="input11" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <13)
                echo '<div id="input12" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <14)
                echo '<div id="input13" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <15)
                echo '<div id="input14" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <16)
                echo '<div id="input15" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <17)
                echo '<div id="input16" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <18)
                echo '<div id="input17" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <19)
                echo '<div id="input18" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <20)
                echo '<div id="input19" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <21)
                echo '<div id="input20" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <22)
                echo '<div id="input21" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <23)
                echo '<div id="input22" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <24)
                echo '<div id="input23" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <25)
                echo '<div id="input24" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <26)
                echo '<div id="input25" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <27)
                echo '<div id="input26" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <28)
                echo '<div id="input27" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <29)
                echo '<div id="input28" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <30)
                echo '<div id="input29" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <31)
                echo '<div id="input30" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <32)
                echo '<div id="input31" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <33)
                echo '<div id="input32" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <34)
                echo '<div id="input33" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <35)
                echo '<div id="input34" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <36)
                echo '<div id="input35" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <37)               
                echo '<div id="input36" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <38)
                echo '<div id="input37" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <39)
                echo '<div id="input38" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <40)
                echo '<div id="input39" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <41)
                echo '<div id="input40" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <42)
                echo '<div id="input41" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <43)
                echo '<div id="input42" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <44)
                echo '<div id="input43" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <45)
                echo '<div id="input44" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <46)
                echo '<div id="input45" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <47)
                echo '<div id="input46" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <48)
                echo '<div id="input47" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';
            if($jlh <49)
                echo '<div id="input48" class="controls" style="margin-top:5px;margin-left:-8px;"></div>';

      if($i == ($jlh-1)){
?>       

            <p><a href="javascript:action();">Tambah Biaya</a> (<i><small>Max 50!</small></i>)</p> 
         </td> 
</tr>
<tr>
<td width="180"></td>
<td width="50"></td>
<td>
<input type="submit" value="Simpan" class="btn-kirim">
<input type="reset" onclick='tutup()' value="Batal" class="btn-kirim">
<input type="hidden" name="id" value="<?php echo $e['id']; ?>">
<input type="hidden" name="stts" value="edit"></td>
</tr>

</table>
      
<?php 
      }
      $i++;
} ?>

</form>