
<div id=search style="padding: 0px 0px 20px 0px; float:left;">
<form action="index.php?ctrl=search&action=specific" method="post" name="search">
<table class="input">
	<tr>
		<th colspan="2" align="left"><b>Nach Updates suchen</b></th>
	</tr>
	<tr>
		<td>KB</td>
		<td><input type="text" name="kb"></td>
	</tr>
	<tr>
		<td>Titel</td>
		<td><input type="text" name="titel"></td>
	</tr>
	<tr>
		<td>Release</td>
		<td><input type="text" name="release"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="submit" value="Suchen"></td>
	</tr>
</table>
</form>

</div>
<div style="padding: 0px 500px 20px 0px; float:right";>
<form action="index.php?ctrl=search&action=specific" method="post" name="search">
<table class="input">
	<tr>
		<th colspan="2" align="left"><b>Nach Packages suchen</b></th>
	</tr>
	<tr>
		<td>Titel</td>
		<td><input type="text" name="titel"></td>
	</tr>
	<tr>
		<td style="padding-bottom:26px;">Typ</td>
		<td style="padding-bottom:26px;"><input type="text" name="typ"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="submit" value="Suchen"></td>
	</tr>
</table>
</form>
</div>
<div style="border-top:1px solid #527DE5; border-left:1px solid #527DE5; padding:20px 100px 20px 0px; float:left;">
<table class="result">
	<tr>
		<td class="result"><b>Name</b></td>
		<td class="result"><b>KB</b></td>
		<td class="result"><b>Release</b></td>
		<td class="result"><b>Decline</b></td>
		<td class="result"><b>Approve Clt</b></td>
		<td class="result"><b>Approve Srv</b></td>
		<td>&nbsp;</td>
	</tr>
<?php 
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
		<a href="index.php?ctrl=updates&action=select&id=<?php echo $update[0]?>" style="color:#527DE5;">mehr Info</a>
		<?php  }
else { ?>
<a href="index.php?ctrl=updates&action=select&id=<?php echo $update[0]?>" style="color:white;">mehr Info</a>
<?php  }?>
	</td>
</tr>
<?php $i=$i+1;} ?>
</table>
</div>