<?php include 'inc/header.php'; 
include 'validar_datos.php';
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
        $nombre= strtolower($nombre); 
        $apellido= strtolower($apellido);
        if($nombre && $apellido &&	$correo){
                $conex2= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);				
                $exp_regular='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                if( preg_match($exp_regular,$email )){            
                         $validar_email=$conex->validar_datos('correo','alumno',$correo);
                         		if($validar_email == 0){
                         				if( validar_datos($nombre)){       				   			
                  								$conex2->preparar("UPDATE alumno set nombre='$nombre' WHERE dni=$dni");
											 	$conex2->ejecutar();
											 	$conex2->preparar("UPDATE alumno set apellido='$apellido' WHERE dni=$dni");
											 	$conex2->ejecutar();
											 	$conex2->preparar("UPDATE alumno set correo='$correo' WHERE dni=$dni");
											 	$conex2->ejecutar();
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
                                         		echo $error;
                                         	 }
                         		}

                         		else { 
                         			  echo "ese email ya existe prueba con otro";
                         		}
                }
                else{
                	echo "email no valido";
                }
        }
        else{
             echo "falta ingresar todos los datos";              
        }		
}
?>
<div id="main">
<h3 align="center">ACTUALIZACION DE DATOS</h3>
<br>
	<div class="col-md-7 col-md-offset-2">
		<form action="actualizar.php" method="POST">
			<div class="form-group">				 		 			
			<input name=name  type="text" class="form-control" id="" placeholder="Nombres">
			</div>
							 		 		
			<div class="form-group">
			<input  name=apellido type="text" class="form-control" id="" placeholder="Apellidos">
			</div>

			<div class="form-group">
			<input  name=correo type="text" class="form-control" id="" placeholder="Correo">
			</div>

			<div class="form-group">
						<label for=""> Elija su foto aqui</label>
						<input  name ="foto" type="file" class="form-control" id="">
			</div>
			<button class="pull-right"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Cambios</button>
		</form>
	</div>


</div>
<?php include 'inc/footer.php'; 