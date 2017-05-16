<?php include 'inc/header.php'; 

 
?>
<div style="background: #fff none repeat scroll 0 0;
  border: 3px solid #999;
  margin-top: 5px;
  min-height: 400px;
  padding: 15px;
  margin-left: 12px;
  width: 1010px;">
<div class="container-fluid">
			<div class="row">
				    <div class="col-md-4 col-md-offset-1">
						<div style="margin-right:50px;">
							<h5 align="center"><strong><?php echo "Bienvenido Alumno ".$nombre; ?> </strong>	</h5>
							<img src="img/online_exam.png"/>
						</div>
			</div>	
						
					<div class="col-md-4 ">
							  <td>
						 	<form action="test.php" method="POST">
								<select name='sel'>
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
							  </td> <br>Escoja su Carrera
				  </div> 
				  <br> <br>

				<div class="col-md-4  col-md-offset-1">
						<h2>Estas Listo ?</h2>
						<ul>
							<li>
								
								<button class='btn btn-default'>
								 <span class='glyphicon glyphicon-thumbs-up'></span> Comenzar Examen 
								</button>

							</li>
								</form>
						</ul>
				</div>
	
 			 </div>
 </div>
 </div>
  	

<?php include 'inc/footer.php'; ?>