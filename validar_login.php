<?php 
include 'inc/header.php';
	session_start();
	$nombre=$_POST['user'];
	$contra=$_POST['contra'];

	$conex2= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	$validar_usuario =  $conex2->validar_datos('nombre','alumno',$nombre);
	$validar_contra= $conex2->validar_datos('password','alumno',$contra);


	if($validar_usuario==1 && $validar_contra==1){
	
		$_SESSION['usuario']=$nombre;
		$_SESSION['contra']=$contra;
		$_SESSION["autenticado"]= "SI";
		//header("Location: perfil.php");  
	}
	else{
		//crypt($contra); 

		$_SESSION["autenticado"]= "NO";
		echo "<form action='index.php' method='POST'>
			<input type='text' name='codigo_facultad' value='123' hidden >
			</form>"; 

	}
 ?>