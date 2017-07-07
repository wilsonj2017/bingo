<html>
<head>
	<meta charset="UTF-8" />
	<title>Crear Cartones - Bingo Español</title>
	<style type="text/css">

	</style>
</head>
<body>
	<form action="generar.php" method="POST">
	<table>
		<thead>
			<tr>
				<th colspan="2">Generar Cartones - Bingo Español</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><label>Inicio:</label></td><td><input type="text" name="init" /></td>
			</tr>
			<tr>
				<td><label>Final:</label></td><td><input type="text" name="fin" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="generar" value="GENERAR" /></td>
			</tr>

		</tbody>
	</table>
	</form>
</body>
</html>