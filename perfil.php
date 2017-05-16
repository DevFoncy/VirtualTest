<?php include 'inc/header.php'; ?>
<?php include 'recorrer.js'; ?>
<div id="main">
<?php 
session_start();
$dni=$_SESSION['dni'];

	$conex3= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);	
	$conex3->preparar("SELECT dni,nombre,apellido,correo,foto FROM alumno WHERE alumno.dni=$dni");
	$conex3->ejecutar();
	$conex3->prep()->bind_result($dni,$nom,$apel,$correo,$foto);
	while($conex3->resultado()){
	
	}
?>
<div class="container-fluid">
			<div class="row">

				    <div class="col-md-4 ">
							<h5 align="center"><strong>DATOS PERSONALES</strong></h5>
							<h5> <strong> Apellidos</strong> : <?php echo $apel;  ?></label></h5>
							<h5> <strong> Nombres  </strong>  : <?php echo $nom; ?></h5>
							<h5> <strong> Correo   </strong>  : <?php echo $correo; ?></h5>
							<h5> <strong> DNI      </strong>  : <?php echo $dni; ?></h5>
							<br>
							<div class="alert alert-info">
							  <strong>Examenes Disponibles</strong> Tienes (1) examen a tu disposición
							</div><br><br>
							<a class="btn btn-primary" href="actualizar.php" > Actualizar Datos Personales </a>
						
					</div>	
					  <div class="col-md-3" align="center">
							<h5 align="center"><strong>FOTO</strong>	</h5>
							<img style='border: black 2px solid;' src="img/regi.png" width='200' height='200'/>
							
							
					</div>
				
					<div class="col-md-4"> 
							 <td>
						 <form action="test.php" method="POST">
								<select name='sel' id="soflow">
									<option value='31'>Ingenieria Eletronica</option>
								    <option value='1'>Administracion</option>
									<option value='81'>Enfermeria</option>
									<option value='41'>Ingenieria de Alimentos</option>
									<option value='42'>Ingenieria Pesquera</option>
									<option value='51'>ingenieria Industrial</option>
									<option value='52'>Ingenieria de Sistemas</option>
									<option value='61'>Ingenieria Quimica</option>
									<option value='71'>Ingenieria Mecanica</option>
									<option value='72'>Ingenieria en Energia</option>
									<option value='91'>Fisica</option>
									<option value='92'>Matematica</option>
									<option value='95'>Ingenieria Ambiental y de Recursos Naturales</option>
									<option value='11'>Contabilidad</option>
									<option value='21'>Economia</option>
									<option value='82'>Educacion Fisica</option>
									</select>			
							  </td> <br>
						<div align="center">
							<h4>Estas Listo ?</h4>

								<button class='Boton-LinearGradient3'>
								 <span class='glyphicon glyphicon-thumbs-up'></span> Comenzar Examen 
								</button>

							</form>
								</div>
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