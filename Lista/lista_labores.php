<!DOCTYPE html>
<html>
	<head>
		<title>Lista de labores activas</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo labor</label></td>
					<td><label>Nombre</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM labores WHERE eliminar = 0 ORDER BY codigo_labor";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_labor']."</td>";
							echo "<td>".$extraido['nombre']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='../Insertar/insertar_labor.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='../Eliminar/eliminar_labor.php'">

			<input type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_labores.php'">

			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>
