<div id="divresult" style="position:absolute; top:300px;">
<table class="result">
<?php if (!empty($updates)) {?>
	<tr>
		<td class="result"><b>Name</b></td>
		<td class="result"><b>KB</b></td>
		<td class="result"><b>Release</b></td>
		<td class="result"><b>Decline</b></td>
		<td class="result"><b>Approve Clt</b></td>
		<td class="result"><b>Approve Srv</b></td>
		<td>&nbsp;</td>
	</tr>
<?php }
else { ?>
	<tr>
		<td class="result">Es wurden kein Updates mit dieser Suchanfrage gefunden</td> 
	</tr>
<?php }
$i = 0;
foreach($updates as $update) { 
if ($i%2==0){?>
	<tr style=color:#527DE5;">
<?php }
 else {?>
<tr style="background: #527DE5; color:white;">
<?php  }?>
	<td class="result"><?php echo $update[1]; ?></td>
	<td class="result"><?php echo $update[2]; ?></td>
	<td class="result"><?php echo $update[3]; ?></td>
	<td class="result"><?php echo $update[4]; ?></td>
	<td class="result"><?php echo $update[5]; ?></td>
	<td class="result"><?php echo $update[6]; ?></td>
	<td class="result">
<?php if ($i%2==0) {?>
		<a href="index.php?ctrl=updates&action=select&id=<?php echo $update[0]?>" style="color:#527DE5; text-decoration:underline;">mehr Info</a>
		<?php  }
else { ?>
<a href="index.php?ctrl=updates&action=select&id=<?php echo $update[0]?>" style="color:white; text-decoration:underline;">mehr Info</a>
<?php  }?>
	</td>
</tr>
<?php $i=$i+1;} ?>
</table>
</div>