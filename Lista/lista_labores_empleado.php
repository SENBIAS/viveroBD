<!DOCTYPE html>
<html>
	<head>
		<title>Lista de Cultivos Activos</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo labor-empleado</label></td>
					<td><label>Codigo empleado</label></td>
					<td><label>Codigo labor</label></td></tr>

					<?php
						require('../conexion.php');
						//$query="SELECT * FROM labores_empleados WHERE eliminar = 0 ORDER BY codigo_labor_empleado";
						$query="SELECT * FROM labores_empleados WHERE codigo_empleado IN (SELECT codigo_empleado FROM empleado WHERE eliminar = 0)";
						$resultado=mysqli_query($link,$query);
						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['codigo_labor_empleado']."</td>";
							echo "<td>".$extraido['codigo_empleado']."</td>";
							echo "<td>".$extraido['codigo_labor']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_alumnos.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_alumnos.php'">

			<input type="button" name="update" value="Actualizar" onclick="window.location.href='../Actualizar/actualizar_labores_empleado.php'">

			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>