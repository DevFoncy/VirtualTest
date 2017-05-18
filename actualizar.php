<?php include 'inc/header.php'; 
	  include 'inc/header2.php';
?>

<div style="background: #fff none repeat scroll 0 0;
  border: 3px solid #999;
  margin-top: 5px;
  min-height: 500px;
  padding: 15px;
  margin-left: 12px;
  width: 1000px;">
<?php include 'validar_datos.php';
session_start();
$dni=$_SESSION['dni'];

$ok=false;
if($_POST){	
		$nombre=$_POST['name'];
		$apellido=$_POST['apellido'];
		$correo=$_POST['correo'];
		
		if(!file_exists("fotos")){
            mkdir("fotos",0777);//0777 es un tipo de permiso
        }
        $nombre2= strtolower($nombre); 
        if($nombre && $apellido &&	$correo ){
                $conex2= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);				
                $exp_regular='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                if( preg_match($exp_regular,$correo )){            
                         $validar_email=$conex2->validar_datos('correo','alumno',$correo);
                         		if($validar_email == 0){
                         				if( validar_datos($nombre2)){       				   			
                  								$conex2->preparar("UPDATE alumno set nombre='$nombre' WHERE dni=$dni");
											 	$conex2->ejecutar();
											 	$conex2->preparar("UPDATE alumno set apellido='$apellido' WHERE dni=$dni");
											 	$conex2->ejecutar();
											 	$conex2->preparar("UPDATE alumno set correo='$correo' WHERE dni=$dni");
											 	$conex2->ejecutar();

											 	$conex2->preparar("UPDATE alumno set foto='$rutaSubida' WHERE dni=$dni");
											 	$conex2->ejecutar();
											 	echo "<div class='col-md-12'>
													<div class='alert alert-success' align='center'>
													  <strong><span class='glyphicon glyphicon-ok'> </span> Correcto!</strong> Datos correctos
													<h5>Seras dirigido a tu perfil en 3 segundos </h5> 
													</div>
													</div> 
													<br><br>";

												//header("Refresh:2; url=perfil.php");
                                         								 				
                                         }
                                         else{
                                         		echo "<div class='alert alert-warning'> <strong>Error!</strong>$error</div>";

                                         	 }
                         		}

                         		else { echo "<div class='alert alert-warning'> <strong>Error!</strong> Ese email ya existe prueba con otro</div>";
                         		}
                }
                else{
                	echo "<div class='alert alert-warning'> <strong>Error!</strong> Email no valido</div>";
            
                }
        }
        else{
             echo "<div class='alert alert-warning'> <strong>Error!</strong> Faltan completar algunos campos 	</div>";       
        }		
}
?>

<h3 align="center"> ACTUALIZACIÓN DE DATOS</h3>
<h5><strong> [*] Campo Obligatorio </strong></h5>
<br>
	<div class="col-md-7 col-md-offset-2">

		<form action="actualizar.php" enctype="multipart/form-data" method="POST" role="form">
			<div class="form-group">	

			<input name=name  type="text" class="form-control" id="" placeholder="Nombres *">
			</div>
							 		 		
			<div class="form-group">
			<input  name=apellido type="text" class="form-control" id="" placeholder="Apellidos *">
			</div>

			<div class="form-group">
			<input  name=correo type="text" class="form-control" id="" placeholder="Correo *">
			</div>

			<div class="form-group">
						<label for=""> Elija su foto aqui</label>
						<input  name ="foto" type="file" class="form-control" id="">
			</div>
		
			<button type="button" class="Boton-3DLateralD" onclick="regresar()"> Regresar al Menu Principal</button>
			<button class="Boton-3DSuperior pull-right"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Cambios</button>
		</form>
	</div>


</div>
<script type="text/javascript">
	function regresar(){
		location.href="perfil.php";
	}
	
</script>
<?php include 'inc/footer.php'; ?>