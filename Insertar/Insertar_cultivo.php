<!DOCTYPE html>
<html>
<head>
	<title>Insertar cultivo</title>
</head>
<body>
	<?php 
	$codCul=$_POST["codigo_cultivo"];
	$codEmp=$_POST["codigo_empleado"];
	$codPlanta=$_POST["codigo_planta"];
	$cantCultivo=$_POST["cantidad_cultivo"];
	$humCultivo=$_POST["humedad_cultivo"];
        $edadCultivo = $_POST["edad_cultivo"];
        $diasAbono = $_POST["dias_abono"];
        $crecimiento = $_POST["crecimiento"];
	$error=false;
/*Validaciones*/
	if (empty($codCul) || !is_numeric($codCul)) {
		echo "<p>Codigo cultivo vacio ó no valido.</p>";
		$error=true;
	}
	if (empty($codEmp) || !is_numeric($codEmp)) {
		echo "<p>Codigo empleado vacio ó no valido</p>";
		$error=true;
	}
	if (empty($codPlanta) || !is_numeric($codPlanta)) {
		echo "<p>Codigo planta vacio ó no valido</p>";
		$error=true;
	}
	if (empty($cantCultivo) || !is_numeric($cantCultivo)) {
		echo "<p>Cantidad de cultivo vacio ó no valido</p>";
		$error=true;
	}
	if (empty($humCultivo) || !is_numeric($humCultivo)) {
		echo "<p>Humedad cultivo vacio ó no valido</p>";
		$error=true;
	}
        if (empty($edadCultivo) || !is_numeric($edadCultivo)) {
		echo "<p>Edad cultivo vacio ó no valido</p>";
		$error=true;
	}
        if (empty($humCultivo) || !is_numeric($humCultivo)) {
		echo "<p>Humedad cultivo vacio ó no valido</p>";
		$error=true;
	}
        if (empty($edadCultivo) || !is_numeric($edadCultivo)) {
		echo "<p>Edad de cultivo vacio ó no valido</p>";
		$error=true;
	}
        if (empty($diasAbono) || !is_numeric($diasAbono)) {
		echo "<p>Dias de abono vacio ó no valido</p>";
		$error=true;
	}
        if (empty($crecimiento) || !is_numeric($crecimiento)) {
		echo "<p>crecimiento cultivo"
            ."vacio ó no valido</p>";
		$error=true;
	}
	if ($error)
	{
		echo"<button onclick=location.href='insertar_empleado.html'>Pagina anterior</button>";
	}else
	{
		require('../conexion.php');
                $sql = "SELECT `codigo_cultivo` FROM `cultivo` WHERE `codigo_cultivo`=$codCul";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                if(is_null($row)){
                    $sql="INSERT INTO cultivo (codigo_cultivo,codigo_empleado,"
                            . "codigo_planta,cantidad_cultivo,humedad_cultivo,edad_cultivo,dias_abono,"
                            . "crecimiento,muerte)"
                            . "VALUES ($codCul,$codEmp,$codPlanta,$cantCultivo,$humCultivo,$edadCultivo,"
                            . "$diasAbono,$crecimiento,0)";
                }else{
                    $sql="UPDATE `cultivo` SET `muerte` = 0"
                            . " WHERE `codigo_cultivo` = $codCul";
                }
		if ($link->query($sql) === TRUE) {
		    echo "<p>Nuevo registro creado satisfactoriamente</p>";
		    echo"<p><button onclick=location.href='../Lista/lista_cultivo.php'>Cultivos</button></p>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
	}

	 ?>
</body>
</html>