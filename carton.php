<?php

	require_once 'php/tcpdf.inc.php';
	require_once 'php/core.php';

	$pdf = new TCPDF();

	$pdf -> SetDisplayMode('fullwidth');   // ZOOM Y FORMA DE VER LA PAGINA 
	$pdf -> setPrintHeader( false );       // EVITAR QUE SE IMPRIMA EL ENCAVEZADO
	$pdf -> setPrintFooter( false );       // EVITAR QUE SE IMPRIMA EL PIE DE PAGINA
	$pdf -> SetAutoPageBreak( false, 0 );  // DESACTIVANDO LAS CREACION DE PAGINAS AUTOMATICO
	$pdf -> SetMargins( 11, 0, 0, 0 );   // ESTOS SON LOS MARGENES
	$pdf -> SetCellPaddings( 0, 0, 0, 0 );
	$pdf -> SetFooterMargin( 0 );
	$pdf -> getAliasNumPage();


    $ini=$_GET['inicio'];
    $fin=$_GET['fin'];

	// CONSULTANDO LOS DATOS A LA BASE DE DATOS
	openConexion();
	$sql = "SELECT idcarton,b,i,n,g,o FROM cartones WHERE impreso = 0 LIMIT $ini,$fin";
	$datos = $conexion->query( $sql );
	closeConexion();

	$listCartones = array();
	while( $fila = $datos -> fetch_array() ){
		array_push( $listCartones, $fila );
	}


	$listCartones = orderArray( $listCartones, 6 );

	foreach( $listCartones as $key => $value ){
		$pdf -> Addpage();
		for( $xx = 0; $xx <= 2; $xx++ ){
			openConexion();
			$sql2 = "UPDATE cartones SET impreso = 1 WHERE idcarton = ".$value[ 'col_0' ][ $xx ]['idcarton']."; UPDATE cartones SET impreso = 1 WHERE idcarton = ".$value[ 'col_1' ][ $xx ]['idcarton']."";
			$GLOBALS['conexion'] -> query( $sql2 );
			closeConexion();
			createCarton( $value[ 'col_0' ][ $xx ], $value[ 'col_1' ][ $xx ] );
		}
	}

	$pdf -> SetAuthor("BINGO");//NOMBRE DEL AUTOR
	$pdf -> SetTitle("Carton"); //TITULO DEL DOCUMENTO
	$pdf -> Output("Cartones de bingo",'I');//SALIDA DEL PDF

	function createCarton( $c1, $c2 ){
		$GLOBALS['pdf'] -> Ln( 15 );

		$carton1 = array();
		$carton1['b'] = separador($c1['b']);
		$carton1['i'] = separador($c1['i']);
		$carton1['n'] = separador($c1['n']);
		$carton1['g'] = separador($c1['g']);
		$carton1['o'] = separador($c1['o']);

		$carton2 = array();
		$carton2['b'] = separador($c2['b']);
		$carton2['i'] = separador($c2['i']);
		$carton2['n'] = separador($c2['n']);
		$carton2['g'] = separador($c2['g']);
		$carton2['o'] = separador($c2['o']);

		for($a = 0; $a <= 4; $a++){

			if($a < 2){ $libre1 = $carton1['n'][$a]; }else if($a > 2){ $b = $a-1; $libre1 = $carton1['n'][$b];}else{ $libre1 = "Free";}
			$GLOBALS['pdf'] -> SetFont( '', 'B', 30  );
			$GLOBALS['pdf'] -> SetTextColor( 0, 100, 150 );
			$GLOBALS['pdf'] -> Cell(18, 15,intval($carton1['b'][$a]),'',0,'C',false,'',0,false,'T','M');
			$GLOBALS['pdf'] -> Cell(18, 15,$carton1['i'][$a],'',0,'C',false,'',0,false,'T','M');
			if($a == 2){
				$GLOBALS['pdf'] -> SetFont( 'courier', 'B', 9  );
				$GLOBALS['pdf'] -> Cell(18,15,$c1['idcarton'],'',0,'C',false,'',0,false,'T','M'); 
			}else{
				$GLOBALS['pdf'] -> Cell(18, 15,$libre1,'',0,'C',false,'',0,false,'T','M');	
			}
			$GLOBALS['pdf'] -> SetFont( 'helvetica', 'B', 30  );
			$GLOBALS['pdf'] -> Cell(18, 15,$carton1['g'][$a],'',0,'C',false,'',0,false,'T','M');
			$GLOBALS['pdf'] -> Cell(18, 15,$carton1['o'][$a],'',0,'C',false,'',0,false,'T','M');

            

			$GLOBALS['pdf'] -> Cell(15, 10,"",0,0,'C',false,'',0,false,'T','M');

			
			if($a < 2){ $libre2 = $carton2['n'][$a]; }else if($a > 2){ $b = $a-1; $libre2 = $carton2['n'][$b];}else{ $libre2 = "Free";}
			$GLOBALS['pdf'] -> Cell(18, 15,intval($carton2['b'][$a]),'',0,'C',false,'',0,false,'T','M');
			$GLOBALS['pdf'] -> Cell(18, 15,$carton2['i'][$a],'',0,'C',false,'',0,false,'T','M');
			if($a == 2){$GLOBALS['pdf'] -> SetFont( '', 'B', 10  );}			
			if($a == 2){
				$GLOBALS['pdf'] -> SetFont( 'courier', 'B', 9  );

				// $GLOBALS['pdf'] ->Image('img/logo.png',18,15,15,15,'PNG','','T');
				// $GLOBALS['pdf'] ->Image('img/logo.png',18,15,15,15,'PNG','','T');
				$GLOBALS['pdf'] -> Cell(18,15,$c2['idcarton'],'',0,'C',false,'',0,false,'T','M'); 
			}else{
				$GLOBALS['pdf'] ->Image('img/logo.png',18,15,15,15,'PNG','M','','','','L');
				// $GLOBALS['pdf'] -> Cell(18, 15,$libre2,'',0,'C',false,'',0,false,'T','M');	
			}
			$GLOBALS['pdf'] -> SetFont( 'helvetica', 'B', 30  );
			$GLOBALS['pdf'] -> Cell(18, 15,$carton2['g'][$a],'',0,'C',false,'',0,false,'T','M');
			$GLOBALS['pdf'] -> Cell(18, 15,$carton2['o'][$a],'',1,'C',false,'',0,false,'T','M');

		}

	}

function orderArray( $array, $reg ){

$total = count( $array );
$totalPag = $total / $reg;
if( $total % $reg != 0 ){
	$totalPag++;
}

$pag = 0;
$col = 0;
$indice = 0;

$list = array();
$list[ 'pag_' . $pag ] = array();
$list[ 'pag_' . $pag ]['col_' . $col ] = array();

foreach( $array as $value ){
	if( $col == 1 && $indice == 3 ){
		$pag++;
		$list[ 'pag_' . $pag ] = array();
		$col = 0;
		$list[ 'pag_' . $pag ]['col_' . $col ] = array();
		$indice = 0;
	}
	if( $indice == 3 && $col < 2 ){
		$col++;
		$list[ 'pag_' . $pag ]['col_' . $col ] = array();
		$indice = 0;
	}
	array_push( $list[ 'pag_' . $pag ]['col_' . $col ], $value );
	$indice++;
}

return $list;

}