<div id=search style="padding: 0px 0px 20px 0px; float:left;">
<form action="index.php?ctrl=search&action=specificUpdate" method="post" name="search">
<table class="input">
	<tr>
		<th colspan="2" align="left"><b>Nach Updates suchen</b></th>
	</tr>
	<tr>
		<td>KB</td>
		<td><input type="text" name="kb" id="kb" onblur="kbValidate();"></td>
	</tr>
	<tr>
		<td>Titel</td>
		<td><input type="text" name="titel" id="titel" onblur="titelValidate();"></td>
	</tr>
	<tr>
		<td>Release</td>
		<td><input type="text" name="release" id="release" onblur="releaseValidate();"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="submit" value="Suchen" id="suchen" DISABLED></td>
	</tr>
</table>
</form>

</div>
<div id="search" style="padding: 0px 500px 20px 0px; float:right";>
<form action="index.php?ctrl=search&action=specificPackage" method="post" name="search">
<table class="input">
	<tr>
		<th colspan="2" align="left"><b>Nach Packages suchen</b></th>
	</tr>
	<tr>
		<td>Titel</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td style="padding-bottom:26px;">Typ</td>
		<td style="padding-bottom:26px;">
			<select name ="type" >
				<option></option>
				<?php foreach ($types as $type) { ?>
					<option value="<?php echo $type['id'] ?>"><?php echo $type['type']; ?></option>
				<?php }?>
			</select>
		</td>
	<!-- 	<td style="padding-bottom:26px;"><input type="text" name="type"></td> -->
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="submit" value="Suchen"></td>
	</tr>
</table>
</form>
</div>
<div id="error" style="visibility:hidden; float: left; position:absolute; left: 10px; top:252px; display:inline;">Hallo</div>