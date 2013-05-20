<?php if ($button == "Update") {
$url = "index.php?ctrl=updates&action=$button&id=$update[0]";
}
else {
$url = "index.php?ctrl=updates&action=$button";
}
?>
<form action="<?php echo $url ?>" method="POST">
<div style="float:top;">
<table>
	<tr>
		<td>Name</td>
		<td><input type="text" value="<?php echo $update[1]; ?>" name="Name"></td>
	</tr>
	<tr>
		<td>KB</td>
		<td><input type="text" value="<?php echo $update[2]; ?>" name="kb"></td>
	</tr>
	<tr>
		<td>Relase</td>
		<td><input type="text" value="<?php echo $update[3]; ?>" name="release"></td>
	</tr>
	<tr>
		<td>Decline</td>
		<td><input type="text" value="<?php echo $update[4]; ?>" name="decline"></td>
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
		<td><input type="text" value="<?php echo $update[5];?>" name="approve_clt"></td>
	</tr>
</table>
</div>
<div style="padding:20px 0px 0px 0px;">
<table class="input">
	<tr>
		<td><b>Packages Server</b></td>
	</tr>
	<tr>
		<td>Approvement Date</td>
		<td><input type="text" value="<?php echo $update[6];?>" name="approve_srv"></td>
	</tr>
</table>
</div>
<div style="float: right; padding: 20px 150px 0px 0px;">
<table>
	<tr>
		<td><input type="submit" value=<?php echo $button ?>></td>
		<td><a href = "index.php"><button>Zurück</button></a></td>
<?php if ($button === "Update") {?> 
		<td><a href = "index.php?ctrl=updates&action=delete&id=<?php echo $update[0]?>"><button>L&ouml;schen</button></a></td>
<?php }?>
	</tr>
</table>
</div>
