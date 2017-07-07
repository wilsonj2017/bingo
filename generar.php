<?php

	require_once 'php/tcpdf.inc.php';

	$pdf = new TCPDF('','in','A4');

	$pdf -> SetDisplayMode('fullwidth');
	$pdf -> setPrintHeader( false );
	$pdf -> setPrintFooter( false );
	$pdf -> SetAutoPageBreak( false, 0 );
	$pdf -> SetMargins( 0.2222, 0.2000, 0.2222, 0 );
	// $pdf -> SetMargins( 0, 0, 0, 0 );
	$pdf -> SetCellPaddings( 0, 0, 0, 0 );
	$pdf -> SetFooterMargin( 0 );

	$cartones = json_decode( file_get_contents( 'newCartones.json' ) );
	
	$pag = 0;
	$col = 0;
	$c = 0;
	$init = $_POST['init'] - 1;
	$count = $_POST['fin'] - 1;

	$carPag = array();
	$carPag[$pag][$col] = array();

	for( $a = $init; $a <= $count; $a++ ){

		array_push( $carPag[ $pag ][ $col ], $cartones[$a] );
		$c++;
		if( $c == 6 ){
			$col++;
			if($col == 2 ){
				$col = 0;
				$pag++;
			}
			$carPag[$pag][$col] = array();
			$c = 0;
		}
	}

	array_pop($carPag[$pag]);
	array_pop($carPag);


	foreach( $carPag as $key => $values ){

		$pdf -> addPage();
		// $pdf -> image('foto.jpg',0,0,8.5,11);

		foreach( $values[0] as $k1 => $v1 ){
			
			$pdf -> setFont('Helvetica','B',8);

			$pdf -> Cell(0.1, 0.1811, '', 0, 0, 'L', false, '', 0, false, 'T', 'M');
			$pdf -> Cell(2.210, 0.1811, "CARTON NO. ".$v1 -> no_carton, 0, 0, 'L', false, '', 0, false, 'T', 'M');
			$pdf -> Cell(1.5, 0.1811, 'NO. DE SERIE 9,000', 0, 0, 'R', false, '', 0, false, 'T', 'M');
			
			$pdf -> Cell(0.3700, 0.1811, "", 0, 0, 'L', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.1, 0.1811, '', 0, 0, 'L', false, '', 0, false, 'T', 'M');
			$pdf -> Cell(2.210, 0.1811, "CARTON NO. ".$values[1][$k1] -> no_carton, 0, 0, 'L', false, '', 0, false, 'T', 'M');
			$pdf -> Cell(1.5, 0.1811, 'NO. DE SERIE 9,000', 0, 1, 'R', false, '', 0, false, 'T', 'M');


			$pdf -> setFont('Helvetica','B',26);
			

			// columna 1
			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_1[0] == "#")?'':$v1 -> fila_1[0], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.1809, 0.2692, '', 1, 0, 'C', false, '', 0, false, 'T', 'M');
			
			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_1[1] == "#")?'':$v1 -> fila_1[1], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			
			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_1[2] == "#")?'':$v1 -> fila_1[2], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_1[3] == "#")?'':$v1 -> fila_1[3], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_1[4] == "#")?'':$v1 -> fila_1[4], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_1[5] == "#")?'':$v1 -> fila_1[5], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_1[6] == "#")?'':$v1 -> fila_1[6], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_1[7] == "#")?'':$v1 -> fila_1[7], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_1[8] == "#")?'':$v1 -> fila_1[8], 0, 0, 'C', false, '', 0, false, 'T', 'M');

			// columna 2
			$pdf -> Cell(0.3700, 0.4800, "", 0, 0, 'L', false, '', 0, false, 'T', 'M');



			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_1[0] == "#")?'':$values[1][$k1] -> fila_1[0], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.4230, 0.2692, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');
			
			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_1[1] == "#")?'':$values[1][$k1] -> fila_1[1], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_1[2] == "#")?'':$values[1][$k1] -> fila_1[2], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_1[3] == "#")?'':$values[1][$k1] -> fila_1[3], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_1[4] == "#")?'':$values[1][$k1] -> fila_1[4], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_1[5] == "#")?'':$values[1][$k1] -> fila_1[5], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_1[6] == "#")?'':$values[1][$k1] -> fila_1[6], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_1[7] == "#")?'':$values[1][$k1] -> fila_1[7], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_1[8] == "#")?'':$values[1][$k1] -> fila_1[8], 0, 1, 'C', false, '', 0, false, 'T', 'M');

			//Columna 1
			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_2[0] == "#")?'':$v1 -> fila_2[0], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.4230, 0.4800, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');
			
			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_2[1] == "#")?'':$v1 -> fila_2[1], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_2[2] == "#")?'':$v1 -> fila_2[2], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_2[3] == "#")?'':$v1 -> fila_2[3], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_2[4] == "#")?'':$v1 -> fila_2[4], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_2[5] == "#")?'':$v1 -> fila_2[5], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_2[6] == "#")?'':$v1 -> fila_2[6], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_2[7] == "#")?'':$v1 -> fila_2[7], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_2[8] == "#")?'':$v1 -> fila_2[8], 0, 0, 'C', false, '', 0, false, 'T', 'M');

			// columna 2
			$pdf -> Cell(0.3700, 0.4800, "", 0, 0, 'L', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_2[0] =="#")?'':$values[1][$k1] -> fila_2[0], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.4230, 0.4500, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');
			
			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_2[1] =="#")?'':$values[1][$k1] -> fila_2[1], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_2[2] =="#")?'':$values[1][$k1] -> fila_2[2], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_2[3] =="#")?'':$values[1][$k1] -> fila_2[3], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_2[4] =="#")?'':$values[1][$k1] -> fila_2[4], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_2[5] =="#")?'':$values[1][$k1] -> fila_2[5], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_2[6] =="#")?'':$values[1][$k1] -> fila_2[6], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_2[7] =="#")?'':$values[1][$k1] -> fila_2[7], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_2[8] =="#")?'':$values[1][$k1] -> fila_2[8], 0, 1, 'C', false, '', 0, false, 'T', 'M');

			//Columna 1
			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_3[0] == "#")?'':$v1 -> fila_3[0], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.4230, 0.4500, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');
			
			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_3[1] == "#")?'':$v1 -> fila_3[1], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_3[2] == "#")?'':$v1 -> fila_3[2], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_3[3] == "#")?'':$v1 -> fila_3[3], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_3[4] == "#")?'':$v1 -> fila_3[4], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_3[5] == "#")?'':$v1 -> fila_3[5], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_3[6] == "#")?'':$v1 -> fila_3[6], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_3[7] == "#")?'':$v1 -> fila_3[7], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($v1 -> fila_3[8] == "#")?'':$v1 -> fila_3[8], 0, 0, 'C', false, '', 0, false, 'T', 'M');

			// columna 2
			$pdf -> Cell(0.3700, 0.4800, "", 0, 0, 'L', false, '', 0, false, 'T', 'M');
			
			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_3[0] == "#")?'':$values[1][$k1] -> fila_3[0], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.4230, 0.4500, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');
			
			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_3[1] == "#")?'':$values[1][$k1] -> fila_3[1], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_3[2] == "#")?'':$values[1][$k1] -> fila_3[2], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_3[3] == "#")?'':$values[1][$k1] -> fila_3[3], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_3[4] == "#")?'':$values[1][$k1] -> fila_3[4], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_3[5] == "#")?'':$values[1][$k1] -> fila_3[5], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_3[6] == "#")?'':$values[1][$k1] -> fila_3[6], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_3[7] == "#")?'':$values[1][$k1] -> fila_3[7], 0, 0, 'C', false, '', 0, false, 'T', 'M');
			// $pdf -> Cell(0.0702,0.2879, '', 0, 0, 'C', false, '', 0, false, 'T', 'M');

			$pdf -> Cell(0.4230, 0.4800, ($values[1][$k1] -> fila_3[8] == "#")?'':$values[1][$k1] -> fila_3[8], 0, 1, 'C', false, '', 0, false, 'T', 'M');
			
			$pdf -> Ln(0.1700);
		}

	}


	$pdf -> SetAuthor("Bingo");
	$pdf -> SetTitle("Carton");
	$pdf -> Output("Cartones de bingo", "I");



