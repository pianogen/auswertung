<?php if ($button === "Update") {
$url = "index.php?ctrl=packages&action=$button&id=$packages[id]";
}
else {
$url = "index.php?ctrl=packages&action=$button";
} ?>
<form action="<?php echo $url ?>" method="POST">
<div id="main">
<table>
	<tr>
		<td>Name</td>
		<td><input type="text" value="<?php echo $packages['name']; ?>" name="name" id="package_search" onblur="packageValidate();"></td>
	</tr>
	<tr>
		<td>Typ</td>
		<td><select name ="type" >
		<?php foreach ($types as $type) {
			if ($type['id'] === $packages['typeId'] ) { ?>		
				<option value=<?php echo $type['id'] ?> selected><?php echo $type['type']; ?></option>
	<?php  }
			else { ?>
				<option value=<?php echo $type['id'] ?>><?php echo $type['type']; ?></option>
<?php 		}
		} ?>
		</select>
		</td>
	</tr>
	<tr>
		<th colspan="2" align="right">
			<input type="submit" value="<?php echo $button?>" id="search_pkg" <?php if ($button !== "Update") { echo "DISABLED"; }?>>
			<?php if ($button === "Update"){ ?>
				<input type="button" onclick="window.location.href = 'index.php?ctrl=packages&action=delete&id=<?php echo $packages['id']?>';" value="Löschen"></td>
	<?php 	}
			else { ?>
				<input type="reset" value="Zur&uuml;setzen">
	<?php 	}?>
			<input type="button" onclick="window.location.href = 'index.php';" value="Zurück">
		</th>
	</tr>
</table>
<?php if (!empty($updates)) {?>
<div id="divresult">
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
<?php $i=0; 
foreach ($updates as $update) {
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
		<a href="index.php?ctrl=updates&action=select&id=<?php echo $update[0]?>" style="color:#527DE5; text-decoration:underline">mehr Info</a>
		<?php  }
else { ?>
<a href="index.php?ctrl=updates&action=select&id=<?php echo $update[0]?>" style="color:white; text-decoration:underline">mehr Info</a>
<?php  } ?>
</td>
</tr>
<?php $i=$i+1;} ?>
</table>
</div>

<?php }?>
</form>