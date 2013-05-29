<?php
if ($button === "Update") {
$url = "index.php?ctrl=updates&action=$button&id=$updates[0]";
}
else {
$url = "index.php?ctrl=updates&action=$button";
}
?>
<form action="<?php echo $url ?>" method="POST" name="insert">
<div style="float:top;">
<table>
	<tr>
		<td>Name</td>
		<th colspan="2" align="left"><input type="text" value="<?php echo $updates[1]; ?>" name="name" id="name_add" size="100"></th>
	</tr>
	<tr>
		<td>KB</td>
		<td><input type="text" value="<?php echo $updates[2]; ?>" name="kb" id="kb_add"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Release</td>
		<th colspan="2" align="left"><input type="text" value="<?php echo $updates[3]; ?>" name="release" id="release_add"></th>
	</tr>
	<tr>
		<td>Decline</td>
		<th colspan="2" align="left"><input type="text" value="<?php echo $updates[4]; ?>" name="decline" id="decline_add"></th>
	</tr>
	<tr>
		<th colspan="2" align="left"><div id="error_add" style="visibility: hidden;"></div></th>
		<td align="right">
			<input type="button" value="<?php echo $button ?>" id="add" onClick="submitButton();">
			<input type="button" onclick="window.location.href = 'index.php';" value="Zurück">
<?php 		if ($button === "Update") {?> 
				<input type="button" onclick="window.location.href = 'index.php?ctrl=updates&action=delete&id=<?php echo $updates[0]?>';" value="Löschen">
<?php 		}
			else {?>
				<input type="reset" value="Zur&uuml;setzen">
			<?php }?>
		</td>
	</tr>
</table>
</div>
<div style="padding:20px 50px 0px 0px; float:left;">
<table class="input">
	<tr>
		<td><b>Packages Client</b></td>
	</tr>
	<tr>
		<td>Approvement Date</td>
		<td><input type="text" value="<?php echo $updates[5];?>" name="approve_clt" id="approve_clt"></td>
	</tr>
	<tr>
	<?php $i =0;
	foreach ($packages as $package) {
		if ($package['typeId'] === 1) { ?>
	<tr>
		<td><input type="hidden" value="<?php echo $package['id'] ?>" name="appr[<?php echo $i?>]">
		<input type="checkbox"  name="appr[<?php echo $i?>]" CHECKED  class="clt[]"><?php echo $package['name'];?></td>
	</tr> 
	<?php $i = $i + 1;
		} 
	}
	$j = $i;
	foreach ($noPack as $pack){
		if ($pack['typeId'] === 1) { ?>
		<tr>
		<td><input type="checkbox" value="<?php echo $pack['id'] ?>" id="clt[<?php echo ($i + $j);?>]" name="unappr[]" class="clt[]"><?php echo $pack['name'];?></td>
	</tr>
	<?php 
	$j= $j + 1;
			} 
	} ?>
	
	</tr>
</table>
<input type="hidden" id="clt_package" value="<?php echo $j + $i;?>">
</div>
<div style="padding:20px 0px 0px 0px;">
<table class="input">
	<tr>
		<td><b>Packages Server</b></td>
	</tr>
	<tr>
		<td>Approvement Date</td>
		<td><input type="text" value="<?php echo $updates[6]?>" name="approve_srv"></td>
	</tr>
	<?php 
	foreach ($packages as $package) {
		if ($package['typeId'] === 2) { ?>
	<tr>
		<td><input type="hidden" value="<?php echo $package['id'] ?>" name="appr[<?php echo $i?>]">
		<input type="checkbox"  name="appr[<?php echo $i ?>]" CHECKED><?php echo $package['name'];?></td>
	</tr>
	<?php $i = $i+1;
		} 
	}
	foreach ($noPack as $pack){
		if ($pack['typeId'] === 2) { ?>
		<tr>
		<td><input type="checkbox" value="<?php echo $pack['id'] ?>" name="unappr[]"><?php echo $pack['name'];?></td>
	</tr>
	<?php } } ?>
</table>
</div>
<div style="float:right; padding:100px 330px 0px 0px;">
</div>
</form>