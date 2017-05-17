<?php include 'inc/header.php'; ?>
   <div class="container-fluid">
      	<div class="col-md-12">
			<div class="row">
				<a type="button" href="perfil.php" class="btn btn-primary">Perfil</a>
				<a type="button" href="calificaciones.php" class="btn btn-success">Calificaciones Pasadas</a>
				<a type="button" href="examen.php" class="btn btn-info">Rendir Examen</a>	
				<a type="button" href="consulta.php" class="btn btn-warning">Contáctanos</a>	
				<a type="button" href="consulta.php" class="btn btn-default pull-right"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a>		
	   		</div>
	  </div>
	 </div>
<div id="main">
	<div class="col-md-10 col-md-offset-1">
		<form action="#">
			<h4> Ingresa tu consulta acá y te contactaremos cuanto antes </h4>
			<textarea rows="8" cols="100" name=consulta> </textarea>
		
			<h5>Escoge el medio por el cual deseas que te contactemos 
			<select name='opcion' id="soflow">
				<option value='1'>Correo Eletronico</option>
				<option value='2'>Celular</option>
			</select>	
			</h5>
			<button type="submit" class="btn btn-primary pull-right">Enviar consulta</button>

			

		</form>
    </div>
</div>
 <?php include 'inc/footer.php'; 