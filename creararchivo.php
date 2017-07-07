<?php 
require_once 'php/core.php';
$d=0;
$numero="";
$codigo="";

$ruta="archivo/";
$nombre_archivo = 'cartones.txt';
`echo > archivo/cartones.txt`;
`chmod 777 archivo/cartones.txt`;
openConexion();
$sql1 = "SELECT * FROM cartones";
$datos1 = $conexion->query( $sql1 );
closeConexion();

$cp=($datos1->num_rows)/500;
$reg=$datos1->num_rows;
$f=0;

for($z=1;$z<=$cp;$z++){ 
openConexion();
$sql = "SELECT idcarton,b,i,n,g,o FROM cartones limit $f,500";
$datos = $conexion->query( $sql );
closeConexion();


$ar=preg_split('//', strval($reg), -1, PREG_SPLIT_NO_EMPTY);;

while($da=$datos->fetch_array()){
$f++;
$codigo="";

$numero=strval($da['idcarton']);

$ar1=preg_split('//', $numero, -1, PREG_SPLIT_NO_EMPTY);;

for($d=count($ar1);$d<count($ar);$d++){

$codigo.="0";

}

$codigo.=$numero;

$b=explode("-",$da['b']);
$i=explode("-",$da['i']);
$n=explode("-",$da['n']);
$g=explode("-",$da['g']);
$o=explode("-",$da['o']);

$contenido =$codigo.",".$b[0].",".$i[0].",".$n[0].",".$g[0].",".$o[0].",".$b[1].",".$i[1].",".$n[1].",".$g[1].",".$o[1].",".$b[2].",".$i[2].","."0".",".$g[2].",".$o[2].",".$b[3].",".$i[3].",".$n[2].",".$g[3].",".$o[3].",".$b[4].",".$i[4].",".$n[3].",".$g[4].",".$o[4]."\n";

// Asegurarse primero de que el archivo existe y puede escribirse sobre el.

if (is_writable($ruta.$nombre_archivo)) {

    // En nuestro ejemplo estamos abriendo $nombre_archivo en modo de adicion.
    // El apuntador de archivo se encuentra al final del archivo, asi que
    // alli es donde ira $contenido cuando llamemos fwrite().

    if (!$gestor = fopen($ruta.$nombre_archivo, 'a')) {

         echo "No se puede abrir el archivo ($nombre_archivo)";
         exit;
    }

    // Escribir $contenido a nuestro arcivo abierto.
    if (fwrite($gestor, $contenido) === FALSE) {
        echo "No se puede escribir al archivo ($nombre_archivo)";
        exit;
    }
    
    

    //echo "&Eacute;xito, se escribi&oacute; ($contenido) al archivo ($nombre_archivo)";
    
    
    fclose($gestor);

} else {
    echo "No se puede escribir sobre el archivo $nombre_archivo";
}

}
//termino del while


}
//termino del for
openConexion();

`tar -cvzf archivo/cartones.tar.gz archivo/cartones.txt`;

header("location:index.php");

?>