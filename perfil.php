
<?php include 'inc/header.php'; 
include 'inc/header2.php';
session_start();
$dni=$_SESSION['dni'];?>
<?php include 'recorrer.js'; ?>
<div id="main">
<?php 


	$conex3= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);	
	$conex3->preparar("SELECT dni,nombre,apellido,correo,foto FROM alumno WHERE alumno.dni=$dni");
	$conex3->ejecutar();
	$conex3->prep()->bind_result($dni,$nom,$apel,$correo,$foto);
	while($conex3->resultado()){
	
	}
?>
<div class="container-fluid">
			<div class="row">

				    <div class="col-md-6 ">
							<h3 align="center">DATOS PERSONALES</h3><br>
							<h5> <strong> Apellidos</strong> : <?php echo $apel;  ?></label></h5>
							<h5> <strong> Nombres  </strong>  : <?php echo $nom; ?></h5>
							<h5> <strong> Correo   </strong>  : <?php echo $correo; ?></h5>
							<h5> <strong> DNI      </strong>  : <?php echo $dni; ?></h5>
							<br>
							<div class="alert alert-info">
							  <strong>Examenes Disponibles</strong> Tienes (1) examen a tu disposición
							</div><br>
							<a class="btn btn-primary"  href="actualizar.php" > Actualizar Datos Personales </a>
						
					</div>	
					  <div class="col-md-5 " align="center">
					  <h3 align="center">FOTO</h3><br>
							<img style='border: black 3px solid;' src="<?php echo $foto; ?>" width='200' height='200'/>
							
							
					</div>
				
				 
 			 </div>
 </div>

	
</div>
 <?php include 'inc/footer.php'; 
 // <div class="form-group">
	// 					 		 	<label for=""> Elija su foto aqui</label>
	// 					 		 <input  name ="foto" type="file" class="form-control" id="miArchivo" style="color: transparent" align="center">
	// 					 	</div>
						 	?>