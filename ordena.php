<?php 
ini_set('display_errors',1);

$GLOBALS['conexion'] = "";
function openConexion(){
	$GLOBALS['conexion'] = new mysqli("localhost","ztnwpnop_wilson","Admin@123","ztnwpnop_bingo");
	if($GLOBALS['conexion'] -> connect_errno){
		die("ERROR! No hemos podido establecer la conexion con la base de datos");
	}
}

function closeConexion(){
	$GLOBALS['conexion']->close();
}

function separador( $campo ){
	return explode("-",$campo);
}

function RandomCartones($rango , $tamano){       
	$a=explode(",",$rango);  
	shuffle($a);  
	$nuevo = implode($a,"-");  
	return substr($nuevo, 0, $tamano); 
}        

function comprobar( $xa , $cb ){
   
    $a=explode("-",$xa);
    $x=true;


    foreach( $cb as $k => $v) {
    	if(!in_array($v, $a)){
    		$x=false;
    	    break;	
       	}
    }

return $x;
}


function generarCarton(){

	$pp = intval($_GET['cartones']) / 6;
	
	for($zz = 1; $zz <= $pp; $zz++){

		echo 'Paso'. $zz.'<br />';

		$x = 0;

	    $cb=array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15");
		$ci=array("16","17","18","19","20","21","22","23","24","25","26","27","28","29","30");
		$cn=array("31","32","33","34","35","36","37","38","39","40","41","42","43","44","45");
		$cg=array("46","47","48","49","50","51","52","53","54","55","56","57","58","59","60");
		$co=array("61","62","63","64","65","66","67","68","69","70","71","72","73","74","75");


		$b = "01,02,03,04,05,06,07,08,09,10,11,12,13,14,15";
		$i = "16,17,18,19,20,21,22,23,24,25,26,27,28,29,30";
		$n = "31,32,33,34,35,36,37,38,39,40,41,42,43,44,45";
		$g = "46,47,48,49,50,51,52,53,54,55,56,57,58,59,60";
		$o = "61,62,63,64,65,66,67,68,69,70,71,72,73,74,75";


		//Elegir los B
	    while( true ){

		  $acc1=array();
	     
	      for($x=1;$x<=6;$x++){
		
			 if($x>=2){

				 $c1=RandomCartones( $b, 14 );
				 $ac1 .="-".$c1;
				 array_push($acc1, $c1);

			 }else{

				 $c1=RandomCartones( $b, 14 );
				 $ac1=$c1;
				 array_push($acc1, $c1);
			 }	

		     }
			         
			 if( comprobar( $ac1 , $cb ) ){
			 	 break;
			}

		}

	     //Elegir los I
	     while( true ){

		  $acc2=array();
	     
	      for($x=1;$x<=6;$x++){
		
			 if($x>=2){

				 $c1=RandomCartones( $i, 14 );
				 $ac2 .="-".$c1;
				 array_push($acc2, $c1);

			 }else{

				 $c1=RandomCartones( $i, 14 );
				 $ac2=$c1;
				 array_push($acc2, $c1);
			 }	

		     }
			         
			 if( comprobar( $ac2 , $ci ) ){
			 	 break;
			}	 
		 }
	 
		 //N
		 while( true ){

		  $acc3=array();
		 
		  for($x=1;$x<=6;$x++){

			 if($x>=2){

				 $c1=RandomCartones( $n, 11 );
				 $ac3 .="-".$c1;
				 array_push($acc3, $c1);

			 }else{

				 $c1=RandomCartones( $n, 11 );
				 $ac3=$c1;
				 array_push($acc3, $c1);
			 }	

		     }
			         
			 if( comprobar( $ac3 , $cn ) ){
			 	 break;
			}	 
		 }


	     while( true ){

		  $acc4=array();
	     
	      for($x=1;$x<=6;$x++){
		
			 if($x>=2){

				 $c1=RandomCartones( $g, 14 );
				 $ac4 .="-".$c1;
				 array_push($acc4, $c1);

			 }else{

				 $c1=RandomCartones( $g, 14 );
				 $ac4=$c1;
				 array_push($acc4, $c1);
			 }	

		     }
			         
			 if( comprobar( $ac4 , $cg ) ){
			 	 break;
			}	 
		 }


	      while( true ){

		  $acc5=array();
	     
	      for($x=1;$x<=6;$x++){
		
			 if($x>=2){

				 $c1=RandomCartones( $o, 14 );
				 $ac5 .="-".$c1;
				 array_push($acc5, $c1);

			 }else{

				 $c1=RandomCartones( $o, 14 );
				 $ac5=$c1;
				 array_push($acc5, $c1);
			 }	

		     }
			         
			 if( comprobar( $ac5 , $co ) ){
			 	 break;
			}	 
		 }

	   $cart = array();
	   $cart[0] = array();
	   $cart[1] = array();
	   $cart[2] = array();
	   $cart[3] = array();
	   $cart[4] = array();
	   $cart[5] = array();

	   $cart[0]['b'] = $acc1[0];
	   $cart[1]['b'] = $acc1[1];
	   $cart[2]['b'] = $acc1[2];
	   $cart[3]['b'] = $acc1[3];
	   $cart[4]['b'] = $acc1[4];
	   $cart[5]['b'] = $acc1[5];

	   $cart[0]['i'] = $acc2[0];
	   $cart[1]['i'] = $acc2[1];
	   $cart[2]['i'] = $acc2[2];
	   $cart[3]['i'] = $acc2[3];
	   $cart[4]['i'] = $acc2[4];
	   $cart[5]['i'] = $acc2[5];

	   $cart[0]['n'] = $acc3[0];
	   $cart[1]['n'] = $acc3[1];
	   $cart[2]['n'] = $acc3[2];
	   $cart[3]['n'] = $acc3[3];
	   $cart[4]['n'] = $acc3[4];
	   $cart[5]['n'] = $acc3[5];

	   $cart[0]['g'] = $acc4[0];
	   $cart[1]['g'] = $acc4[1];
	   $cart[2]['g'] = $acc4[2];
	   $cart[3]['g'] = $acc4[3];
	   $cart[4]['g'] = $acc4[4];
	   $cart[5]['g'] = $acc4[5];

	   $cart[0]['o'] = $acc5[0];
	   $cart[1]['o'] = $acc5[1];
	   $cart[2]['o'] = $acc5[2];
	   $cart[3]['o'] = $acc5[3];
	   $cart[4]['o'] = $acc5[4];
	   $cart[5]['o'] = $acc5[5];

	   $sql  = "INSERT INTO cartones (b,i,n,g,o) VALUES";
	   foreach( $cart as $key => $value ){
	   		$sql .= "('".$value['b']."', '".$value['i']."', '".$value['n']."', '".$value['g']."', '".$value['o']."')";
	   		$sql .= ($key < count($cart) -1 )?",":"";
	   }
		openConexion();
		if($GLOBALS['conexion'] -> query($sql)){
			echo 'Se generaron con exito <br />';
		} else {
			echo "Lo sentimos, no se pudieron generar los cartones, intentelo mas tarde <br />";
			exit;
		}
		closeConexion();

	}


}



generarCarton();