<form action="index.php?ctrl=updates&action=<?php echo $button ?>&id=<?php echo $update[0]?>" method="POST">
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
<div style="float: right;">
<table>
	<tr>
		<td><input type="submit" value=<?php echo $button ?>></td>
		<td><a href = "index.php">Zurück</a></td>
		<td><a href = "index.php?ctrl=updaets&action=delete&id="<?php echo $update[0]?>">L&ouml;schen</a></td>
	</tr>
</table>
</div>
