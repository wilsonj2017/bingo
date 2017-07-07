<?php
/*$cartones = array();
for( $a = 0; $a <= 11999; $a++ ){
	$cartones[$a] = array();
	for( $b = 0; $b <= 15; $b++ ){
		if($b == 0){
			$cartones[$a][$b] = ($a+1);
		} else {
			$cartones[$a][$b] = rand(1,75);
		}
	}
}

echo json_encode($cartones);*/
/*
$cartones = file_get_contents('car12000.txt');
$cartones = explode( "\n", $cartones );
foreach( $cartones as $key => $value ){
	$cartones[$key] = explode(",", $value);
}

foreach($cartones as $k => $v ){
	foreach( $v as $k1 => $v1 ){
		$cartones[$k][$k1] = intval( $v1 );
	}
}

array_pop($cartones);

echo json_encode($cartones);*/

// ========================================================================================

$cartones = json_decode( file_get_contents( 'cartones.json' ) );
$newCarton = array();

foreach( $cartones as $key => $value ){
	$z = 1;
	$y = 0;
	foreach( $value as $k => $v ){
		if( $k > 0){
			$newCarton[$key]['fila_'.$z][$y++] = $v;

			if($y == 5){
				$y = 0;
				$z++;
			}
		} else{
			$newCarton[$key]['no_carton'] = $v;
			$y = 0;
		}
	}
}


foreach( $newCarton as $k1 => $v1 ){
	foreach( $v1 as $k2 => $v2 ){
		if( $k2 != "no_carton" ){
			$newCarton[$k1][$k2] = organizar($newCarton[$k1][$k2]);
		}
	}
}

function organizar( $array ){
	
	$new_array = array();
	$aa = 0;

	foreach( $array as $key => $value ){
		
		if( $value >= 1 && $value <= 9 ){
			$new_array[0] = $value;
		} else if( empty( $new_array[0] ) ) {
			$new_array[0] = "#";
		}

		if($value >= 10 && $value <= 19){
			$new_array[1] = $value;
		} else if( empty( $new_array[1] ) ) {
			$new_array[1] = "#";
		}

		if($value >= 20 && $value <= 29){
			$new_array[2] = $value;
		} else if( empty( $new_array[2] ) ){
			$new_array[2] = "#";
		}

		if($value >= 30 && $value <= 39){
			$new_array[3] = $value;
		} else if( empty( $new_array[3] ) ){
			$new_array[3] = "#";
		}

		if($value >= 40 && $value <= 49){
			$new_array[4] = $value;
		} else if( empty( $new_array[4] ) ){
			$new_array[4] = "#";
		}

		if($value >= 50 && $value <= 59){
			$new_array[5] = $value;
		} else if( empty( $new_array[5] ) ){
			$new_array[5] = "#";
		}

		if($value >= 60 && $value <= 69){
			$new_array[6] = $value;
		} else if( empty( $new_array[6] ) ){
			$new_array[6] = "#";
		}

		if($value >= 70 && $value <= 79){
			$new_array[7] = $value;
		} else if( empty( $new_array[7] ) ){
			$new_array[7] = "#";
		}

		if($value >= 80 && $value <= 90){
			$new_array[8] = $value;
		} else if( empty( $new_array[8] ) ){
			$new_array[8] = "#";
		}


	}

	return $new_array;

}

echo json_encode( $newCarton );