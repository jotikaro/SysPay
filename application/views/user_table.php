<h2>Informasi</h2>
<div>
	<table>
		<?php
			foreach($user_info as $key=>$value){
				?>
				<tr><td><?php echo ucwords($key)?></td><td>:<?php echo $value?></td></tr>
				<?php
			}
		?>
	</table>
</div>
<div>
	<?php echo $link_download ?>
<div>