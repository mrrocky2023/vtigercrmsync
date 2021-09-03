<h1>{'Hello World'|vtranslate:$MODULE}</h1>
<form action="index.php?module=HelloWorld&view=List" method="post">
	<textarea name="contentSave" rows="100" cols="40">{$CONTENTS}</textarea>
	<button type="submit" name="form" value="A">Save</button>
</form>
<form action="index.php?module=HelloWorld&view=List" method="post">
	<textarea name="strQueryClient" rows="10" cols="40">{$OUTPUT}</textarea>
	<button type="submit" name="form" value="B">Execute</button>
</form>
<h1>{$COMPLETE}</h1>
	<table cellpadding="0" cellspacing="0" width="100%" rules="none">
		{foreach item=RECORD from=$RECORDS}
			<tr>
				<td style="outline: thin solid">{$RECORD[0]}</td>
				<td style="outline: thin solid">{$RECORD[1]}</td>
				<td style="outline: thin solid">{$RECORD[2]}</td>
				<td style="outline: thin solid">{$RECORD[3]}</td>
				<td style="outline: thin solid">{$RECORD[4]}</td>
				<td style="outline: thin solid">{$RECORD[5]}</td>
				<td style="outline: thin solid">{$RECORD[6]}</td>
			</tr>
	 	{/foreach}
	</table>
