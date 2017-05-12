<?php 
include 'inc/header.php';
	session_start();

	$nombre=$_POST['username'];
	$contra=$_POST['password'];

	$conex2= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	$validar_usuario =  $conex2->validar_datos('nombre','alumno',$nombre);
	$validar_contra= $conex2->validar_datos('password','alumno',$contra);


	if($validar_usuario==1 && $validar_contra==1){
		
		$_SESSION['usuario']=$nombre;
		$_SESSION['contra']=$contra;
		header("Location: exam.php");  
	}
	else{
		//crypt($contra); 
		
		header("Location: index.php");
		

	}
	$conex2->cerrar_conex();
 ?>