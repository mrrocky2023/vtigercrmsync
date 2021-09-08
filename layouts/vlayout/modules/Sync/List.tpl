<div class="contentsDiv  span10 marginLeftZero" id="rightPanel" style="min-height: 1022px;">
	<div class="row-fluid detailViewTitle">
		<h1>{'VTigerCRM Sync!'|vtranslate:$MODULE}</h1>
	</div>
	<div class="detailViewInfo row-fluid">
		<form action="index.php?module=Sync&view=List" method="post">
			<button class="btn btn-info btn-xmini removeMember" type="submit" name="form" value="A">Sync Up</button>
			<br>
			<h1>{$VAR}</h1>
			<br>
			<table cellpadding="0" cellspacing="0" width="100%" rules="none">
				<tr>
					<td style="outline: thin solid">Orden de Venta ID</td>
					<td style="outline: thin solid">Cuenta MP</td>
					<td style="outline: thin solid">Contraseña MP</td>
					<td style="outline: thin solid">Contacto ID</td>
					<td style="outline: thin solid">Fecha de Moficiación</td>
				</tr>
				{foreach item=RECORD from=$ENTITIES}
					<tr>
						{foreach item=RECORD2 from=$RECORD}
								<td style="outline: thin solid">{$RECORD2}</td>
						{/foreach}
					</tr>
				{/foreach}
			</table>
		</form>
	</div>
</div>
