<div id="main">
<form action="index.php?ctrl=search&action=specificUpdate" method="post" name="search">
<table class="input">
	<tr>
		<th colspan="2" class="colspan"><b>Nach Updates suchen</b></th>
	</tr>
	<tr>
		<td>Titel</td>
		<td><input type="text" size="50" name="titel" id="titel" onblur="titelValidate();"></td>
	</tr>
	<tr>
		<td>KB</td>
		<td><input type="text" name="kb" id="kb" onblur="kbValidate();"></td>
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
<div id="search" style="float:left; left:550px; position:absolute;">
<form action="index.php?ctrl=search&action=specificPackage" method="post" name="search">
<table class="input">
	<tr>
		<th colspan="2" class="colspan"><b>Nach Packages suchen</b></th>
	</tr>
	<tr>
		<td>Titel</td>
		<td><input type="text" name="name" size="50"></td>
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
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="submit" value="Suchen"></td>
	</tr>
</table>
</form>
</div>
<div id="error" style="visibility:hidden; float: left; position:absolute; left: 10px; top:252px; display:inline;"></div>