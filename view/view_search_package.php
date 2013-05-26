<div style="border-top:1px solid #527DE5; position:absolute; top:300px; border-left:1px solid #527DE5; padding:20px 100px 20px 0px; float:left;">
<table class="result">
	<tr>
		<td class="result"><b>Name</b></td>
		<td class="result"><b>Typ</b></td>
		<td class="result">&nbsp;</td>
	</tr>
<?php 
$i = 0;
foreach($packages as $package) { 
if ($i%2==0){?>
	<tr style=color:#527DE5;">
<?php }
 else {?>
<tr style="background: #527DE5; color:white;">
<?php  }?>
	<td class="result"><?php echo $package[1];?></td>
	<td class="result"><?php echo $package[3];?></td>
	<td class="result">
<?php if ($i%2==0) {?>
		<a href="index.php?ctrl=packages&action=select&id=<?php echo $package[0]?>" style="color:#527DE5;">mehr Info</a>
		<?php  }
else { ?>
<a href="index.php?ctrl=packages&action=select&id=<?php echo $package[0]?>" style="color:white;">mehr Info</a>
<?php  }?>
	</td>
	<td class="result">&nbsp;</td>
</tr>
<?php $i=$i+1;} ?>
</table>
</div>