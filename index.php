
<?php include 'inc/header.php'; 
$ok=false;
if($_POST){	
		$nombre=$_POST['user'];
		$contra=$_POST['contra'];
		session_start();
		$conex2= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		$validar_usuario = $conex2->validar_datos('dni','alumno',$nombre);
		$validar_contra= $conex2->validar_datos('password','alumno',$contra);

		if($validar_usuario==1 && $validar_contra==1){
		
			$_SESSION['dni']=$nombre;
			$_SESSION['contra']=$contra;
			echo "<div class='col-md-12'>
			<div class='alert alert-success' align='center'>
			  <strong><span class='glyphicon glyphicon-ok'> </span> Correcto!</strong> Datos correctos
			<h5>Seras dirigido a tu perfil en 3 segundos </h5> 
			</div>
			</div> 
			<br><br>";

			header("Refresh:2; url=perfil.php");
		}
		else{
			//crypt($contra); 
			$ok=true;
			//$_SESSION["autenticado"]= "NO";
		}
}
?>
<?php 
	if($ok==true){
	echo "<div class='col-md-12'>
			<div class='alert alert-danger' align='center'>
			  <strong><span class='glyphicon glyphicon-remove'> </span> Error!</strong> Datos ingresados incorrectos
			</div> </div> <br>";
	}
 ?>
<div id="main">

	<div class="container">
	<section id="content">
		<form action="index.php" method="POST">
		
			<div>
				<input type="text" placeholder="DNI" required="" id="username" name=user />
			</div>
			<div>
				<input type="password" placeholder="Contraseña" required="" id="password" name=contra />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="#">Lost your password?</a>
				
			</div>
			
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</div>
<?php include 'inc/footer.php'; ?>
