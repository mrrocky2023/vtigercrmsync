<div class="contentsDiv  span10 marginLeftZero" id="rightPanel" style="min-height: 1022px;">
	<div class="row-fluid detailViewTitle">
		<h1>{'VTigerCRM Sync!'|vtranslate:$MODULE}</h1>
	</div>
	<div class="detailViewInfo row-fluid">
		<form action="index.php?module=Sync&view=List" method="post">
			<textarea name="strQueryClient" rows="10" cols="40"></textarea>
			<button class="btn btn-info btn-xmini removeMember" type="submit" name="form" value="B">Execute</button>
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
	</div>
</div>
