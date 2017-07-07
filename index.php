<?php
require_once 'php/core.php';

	if(isset($_POST['cartones'])){
		openConexion();
		echo generarCarton();
		closeConexion();

		//header("Location: carton.php");
	}
    
    if(isset($_POST['inicio'])){

     $ini=$_POST['inicio'];
     $fin=$_POST['fin'];     
     header("location:carton.php?inicio=$ini&fin=$fin");
    }


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link type="text/css" rel="stylesheet" href="css/estilo.css" />
</head>
<body>
	 
	<form action="index.php" method="post">
	<table border="0" cellpadding="10" align="center">
		<tr><td colspan="2"><h2>GENRAR CARTONES</h2></td></tr>
		<tr><td><label for="c1">Cartones</label></td><td><input type="text" name="cartones" value="" id="c1" /></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" value="Enviar" class="boton" /></td></tr>
 	</table>
 	</form>

	<form action="index.php" method="post" accept-charset="utf-8">
 	<table align="center">
 		<tr align="center">
 			<td>
			    <label>Inicio:<br /><input type="text" name="inicio" value=""></label> 
 			</td>
 		</tr>
 		<tr align="center">
 			<td>
		        <label>Fin:<br /><input type="text" name="fin" value=""></label> <br />
 			</td>
 		</tr>
 		<tr align="center">
 			<td>
			    <input type="submit" value="Ver Cartones" />
 			</td>
 		</tr>
 	</table>
	</form>

	<table align="center">
		<tr><td colspan="2" align="center">
			<a href="borrar.php?id=1" class="boton">Limpiar Tabla</a>
			<a href="borrar.php?id=2" class="boton">Reiniciar Cartones</a>
			<a href="creararchivo.php" class="boton">Crear Archivo</a>
            
            <?php
            $nombre_archivo="archivo/cartones.txt";

            if(file_exists($nombre_archivo)) {
			 
             echo '<a class="boton" href="archivo/cartones.txt">Cartones.txt</a>';
             echo '<a class="boton" href="archivo/cartones.tar.gz">Cartones.tar.gz</a>';			

			} 


            ?>

		</td></tr>
	</table>
	
 	<?php

 	openConexion();
 	$sql = "SELECT COUNT(idcarton) as total FROM cartones";
 	$datos = $conexion->query($sql);
 	$fila = $datos->fetch_array();
 	echo '
 	<table align="center">
		<tr><td>Se Generaron '.$fila['total'].' Correctamente</td></tr>	
 	</table>
 	';
 	closeConexion();

 	?>


</body>
</html>
