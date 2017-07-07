<?php 

	require_once 'php/core.php';


	if(isset($_GET['id']) && $_GET['id'] == 1){
		openConexion();
		$sql="TRUNCATE cartones";
		$conexion->query($sql);	
		closeConexion();
		header("location:index.php");
	}else if(isset($_GET['id']) && $_GET['id'] == 2){
		openConexion();
		$sql="UPDATE cartones SET impreso = 0";
		$conexion->query($sql);	
		closeConexion();
		header("location:index.php");
	}