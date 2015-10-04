
<script type="text/javascript">
    $(document).ready(function() {
      $("a[rel=example_group]").fancybox({
        'height'      : '95%',
        'width'       : '70%',
        'transitionIn'    : 'fade',
        'transitionOut'   : 'fade',
        'overlayColor'    : '#000',
        'overlayOpacity'  : 0.9,
        'type'              : 'iframe',
        'showNavArrows'   : false,
        'hideOnOverlayClick': false,
        'onClosed'          : function() {
                    parent.location.reload(true);
                    }
      });});
</script>

<link href="<?php echo base_url(); ?>index.php/asset/css/chosen.css" rel="stylesheet" type="text/css">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css" type="text/css" rel="stylesheet"/>

<script src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
  $(function(){
    $('#mulai').datepicker({dateFormat: 'yy-mm-dd'});
    $('#akhir').datepicker({dateFormat: 'yy-mm-dd'});
  });
</script>

<style>
#cssmenu{ height:37px; display:block; padding:0; margin: 0;  border:1px solid; border-radius:5px; } 
#cssmenu > ul {list-style:inside none; padding:0; margin:0;} 
#cssmenu > ul > li {list-style:inside none; padding:0; margin:0; float:left; display:block; position:relative;} 
#cssmenu > ul > li > a{ outline:none; display:block; position:relative; padding:12px 20px; font:bold 13px/100% Arial, Helvetica, sans-serif; text-align:center; text-decoration:none; text-shadow:1px 1px 0 rgba(0,0,0, 0.4); } 
#cssmenu > ul > li:first-child > a{border-radius:5px 0 0 5px;} 
#cssmenu > ul > li > a:after{ content:''; position:absolute; border-right:1px solid; top:-1px; bottom:-1px; right:-2px; z-index:99; } 
#cssmenu ul li.has-sub:hover > a:after{top:0; bottom:0;} 
#cssmenu > ul > li.has-sub > a:before{ content:''; position:absolute; top:18px; right:6px; border:5px solid transparent; border-top:5px solid #fff; } 
#cssmenu > ul > li.has-sub:hover > a:before{top:19px;} 
#cssmenu ul li.has-sub:hover > a{ background:#3f3f3f; border-color:#3f3f3f; padding-bottom:13px; padding-top:13px; top:-1px; z-index:999; } 
#cssmenu ul li.has-sub:hover > ul, #cssmenu ul li.has-sub:hover > div{display:block;} 
#cssmenu ul li.has-sub > a:hover{background:#3f3f3f; border-color:#3f3f3f;} 
#cssmenu ul li > ul, #cssmenu ul li > div{ display:none; width:auto; position:absolute; top:38px; padding:10px 0; background:#3f3f3f; border-radius:0 0 5px 5px; z-index:999; } 
#cssmenu ul li > ul{width:200px;} 
#cssmenu ul li > ul li{display:block; list-style:inside none; padding:0; margin:0; position:relative;} 
#cssmenu ul li > ul li a{ outline:none; display:block; position:relative; margin:0; padding:8px 20px; font:10pt Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; text-shadow:1px 1px 0 rgba(0,0,0, 0.5); } 


#cssmenu, #cssmenu > ul > li > ul > li a:hover{ background:#333333; background:-moz-linear-gradient(top, #333333 0%, #222222 100%); background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#333333), color-stop(100%,#222222)); background:-webkit-linear-gradient(top, #333333 0%,#222222 100%); background:-o-linear-gradient(top, #333333 0%,#222222 100%); background:-ms-linear-gradient(top, #333333 0%,#222222 100%); background:linear-gradient(top, #333333 0%,#222222 100%); filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#333333', endColorstr='#222222',GradientType=0 ); } 
#cssmenu{border-color:#000;} 
#cssmenu > ul > li > a{border-right:1px solid #000; color:#fff;} 
#cssmenu > ul > li > a:after{border-color:#444;} 
#cssmenu > ul > li > a:hover{background:#111;}
</style>
<div id='cssmenu'>
<ul>
   <li class='active '><a href='<?php echo base_url(); ?>admin/'><span>Beranda</span></a></li>
   <?php if($stts == "or" || $stts == "ft" || $stts == "admin" || $stts == "cp" || $stts == "op" || $stts == "ca"){ ?>
   <li class='has-sub '><a href='#'><span>Order Receive</span></a>
      <ul>
         <li><a href='<?php echo base_url(); ?>admin/tampil_cust'><span>Customer</span></a></li>
         <li><a href='<?php echo base_url(); ?>admin/tampil_jadwal'><span>Order</span></a></li>
      </ul>
   </li>  
   <?php 
   }
   if($stts == "ft" || $stts == "admin" || $stts == "cp" || $stts == "op" || $stts == "ca"){ ?>
   <li class='has-sub '><a href='#'><span>Order Planning</span></a>
      <ul>
         <li><a href='<?php echo base_url(); ?>admin/tampil_armada'><span>Armada</span></a></li>
         <li><a href='<?php echo base_url(); ?>admin/tampil_supir'><span>Supir</span></a></li>
         <li><a href='<?php echo base_url(); ?>admin/persetujuan'><span>Surat Jalan</span></a></li>
      </ul>
   </li>
   <?php }
   if($stts == "ft" || $stts == "admin" || $stts == "cp" || $stts == "ca"){ ?>
   <li class='has-sub '><a href='#'><span>Cost Planning</span></a>
      <ul>         
         <li><a href='<?php echo base_url(); ?>admin/tampil_spbu'><span>Email SPBU</span></a></li>
         <li><a href='<?php echo base_url(); ?>admin/tampil_cost'><span>Biaya Jalan</span></a></li>
      </ul>
   </li>
   <?php 
   }
   if($stts == "ca" || $stts == "admin" || $stts == "ft"){ ?>
    <li><a href='<?php echo base_url(); ?>admin/tampil_approval'><span>Cost Approval</span></a></li>
    <?php 
    }
    
    if($stts == "ft" || $stts == "admin"){
       ?>
    <li class='has-sub'><a href='#'><span>Fund Transfer</span></a>
         <ul>
            <li><a href='<?php echo base_url(); ?>admin/tampil_fund'><span>Daftar Biaya Order</span></a></li>         
            <li><a href='<?php echo base_url(); ?>admin/tambah_saldo' rel="example_group"><span>Tambah Saldo</span></a></li>     
            <!--<li><a href='<?php echo base_url(); ?>admin/tampil_setorKas'><span>Daftar Saldo</span></a></li>     -->
            <li><a href='<?php echo base_url(); ?>admin/tampil_arusKas'><span>Arus Kas</span></a></li>                 
         </ul>
    </li>
    <?php 
    }
    if($stts == "ft" || $stts == "admin"){ ?>
    <li class='has-sub '><a href='#'><span>Master Data</span></a>
      <ul>
         <li><a href='<?php echo base_url(); ?>admin/tampil_biaya'><span>Biaya Perjalanan</span></a></li>         
         <li><a href='<?php echo base_url(); ?>admin/tampil_pinjaman'><span>Biaya Pinjaman</span></a></li>  
         <li><a href='<?php echo base_url(); ?>admin/tampil_bank'><span>Daftar Bank</span></a></li>  
         <li><a href='<?php echo base_url(); ?>admin/tampil_saldo'><span>Mutasi Saldo</span></a></li>  
      </ul>
   </li>
   <?php } ?>
   <li><a href='<?php echo base_url(); ?>admin/akun'><span>Setting</span></a></li>
   <li><a href='<?php echo base_url(); ?>web/logout'><span>Logout</span></a></li>
</ul>
</div>

<!--<div id="menu">
	<ul>
		<li><a href="<?php echo base_url(); ?>dosen/">Beranda</a></li>
		<li><a href="<?php echo base_url(); ?>admin/tampil_jadwal">Order Receive</a></li>
	    <li><a href="<?php echo base_url(); ?>admin/persetujuan">Order Planning</a></li>
	    <li><a href="<?php echo base_url(); ?>admin/costPlan">Cost Planning</a></li>
	    <li><a href="<?php echo base_url(); ?>admin/costApprove">Cost Approval</a></li>	    
	    <li><a href="<?php echo base_url(); ?>admin/fundTrans">Fund Transfer</a></li>	    
		<li><a href="<?php echo base_url(); ?>admin/akun">Pengaturan Akun</a></li>
		<li><a href="<?php echo base_url(); ?>web/logout">Keluar</a></li>
	</ul>
	<div class="cleaner_h0"></div>
</div> -->