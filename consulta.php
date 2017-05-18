<?php include 'inc/header.php'; 
	  include 'inc/header2.php';
?>
   
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