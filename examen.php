<?php include 'inc/header.php'; 
	include 'inc/header2.php';
	include 'validaciones.js';
	session_start();
	$dni=$_SESSION['dni']; 
	date_default_timezone_set('America/Lima');
	
if($_POST){	
		$horaactual = date("Y-m-d H:i:s");
		//echo $horaactual;
		$examen=$_POST['sel'];
		$conex2= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$conex2->preparar("SELECT a.id, e.id FROM alumno a, examen e WHERE a.dni=$dni and e.carrera_id=$examen");
		$conex2->ejecutar();
		$conex2->prep()->bind_result($alumnoID,$examenID);
		while($conex2->resultado()){
		}

		echo $alumnoID;
		if( $conex2->preparar("INSERT INTO alumno_examen values ('',$alumnoID,$examenID,-1,'$horaactual')")){
				$conex2->ejecutar();
				//echo "exito";
				$_SESSION['carrera']=$examen;
				header('Location: test.php');
		}
		else{
				echo "hubo un problema";
		}	
}

?>  
<div id="main">
<div class="col-md-11" align="center"> 
	<div class="alert alert-info">
							  <strong>Examenes Disponibles</strong> Tienes (1) examen a tu disposición
							</div>
							 <td>
							 <h3>Escoge tu Carrera</h3>
						 <form action="examen.php" method="POST" id="formu1">
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
							<h3>Estas Listo ?</h3>
								<button  type="button" class='Boton-LinearGradient3' onclick="validacion()">
								 <span class='glyphicon glyphicon-thumbs-up'></span> Comenzar Examen 
								</button>

							</form>
							<h3>Duración del Examen : 3 horas </h3>
								</div>
								 </div>
</div>

 <?php include 'inc/footer.php'; 