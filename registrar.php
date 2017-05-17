<?php include 'inc/header.php'; ?>
<div style="background: #C1DDF0;
  border: 3px solid #999;
  margin-top: -15px;
  min-height: 650px;
  padding: 35px;
  margin-left: 12px;
  width: 1000px;">
	
<h3 align="center"> FORMULARIO DE DATOS</h3>
<h5><strong> [ * ] Campo Obligatorio </strong></h5>

	<div class="col-md-9 col-md-offset-2">

		<form action="registrar.php" enctype="multipart/form-data" method="POST" role="form">
			<div class="form-group">	

			<input name=name  type="text" class="form-control" id="" placeholder="Nombres *" required="">
			</div>
							 		 		
			<div class="form-group">
			<input  name=apellido type="text" class="form-control" id="" placeholder="Apellidos *" required="" >
			</div>

			<div class="form-group">
			<input  name=correo type="text" class="form-control" id="" placeholder="Correo *" required="" >
			</div>

			<div class="form-group">
			<input  name=carrera type="text" class="form-control" id="" placeholder="Carrera que deseas postular*" required="" >
			</div>

			<div class="form-group">
			<input  name=user type="text" class="form-control" id="" placeholder="Usuario*" required="" >
			</div>

			<div class="form-group">
			<input  name=contra type="password" class="form-control" id="" placeholder="Contraseña *" required="" >
			</div>
			<div class="form-group">
			<input  name=contra2 type="password" class="form-control" id="" placeholder="Confirmar Contraseña *" required="" >
			</div>

			<button type="submit" class="Boton-3DSuperior"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Cambios</button>
			<button type="button" class="Boton-3DSuperior pull-right" onclick="atras()"><span class="glyphicon glyphicon-menu-left"></span> Clic acá si ya tienes una cuenta </button>

		</form>
	</div>

</div>
<script type="text/javascript">
	function atras(){
		location.href="index.php";
	}
</script>
<?php include 'inc/footer.php'; ?>
