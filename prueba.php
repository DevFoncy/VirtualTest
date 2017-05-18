
<?php include 'inc/header.php';?>
 <div id="main">

<?php 
 $lista_opciones=$_POST['opcion'];
 $cod_alumno=$_POST['cod_alumno'];
 $cod_examen=$_POST['cod_examen'];
 $carrera=$_POST['carrera'];
 $bloque=$_POST['bloque'];

 $preguntas_id=$_POST['pregunta'];
 $peso=$_POST['peso'];
 $solucion=$_POST['solucion'];

 $size = count ($lista_opciones);
 
 $correctas=0;
 $incorrectas=0;
 $blanco=0;

 /*var_dump($lista_opciones);
 foreach($lista_opciones as $opcion2){
 	echo $opcion2."<br>";
 }*/

	$conex2= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	$conex3= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	$conex4= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	//codigo del alumno y del examen
	$conex2->preparar("SELECT a1.id FROM alumno_examen a1, alumno a, examen e WHERE a.dni=$cod_alumno and e.id=$cod_examen");
	$conex2->ejecutar();
	$conex2->prep()->bind_result($nombre);
	 while($conex2->resultado()){
	  	 
	 }
	 echo $nombre;
	 //Primero se debe actualizar la tabla calificacion con elementos estaticos : id_preguntas, pesos, clave_solucion , id_examen+id_alumno
	 for($j=0;$j<$size;$j++){
	 	$preg=$preguntas_id[$j];
	 	$pes=$peso[$j];
	 	$sol=$solucion[$j];
	 	if($conex2->preparar("INSERT INTO calificacion values ($nombre,$preg,$pes,'','$sol','')")){
	 		$conex2->ejecutar();
	 		//echo "exito";
	 	}
	 	else{
	 		echo "no se pudo preparar la consulta";
	 	}
	 	
	 }
	 
	 //para llenar las notas escogidas
	for($i=1; $i<=$size ; $i++){
		//echo "<br>".$lista_opciones[$i];

		$var=$conex2->preparar("UPDATE calificacion SET opcion_elegida= '$lista_opciones[$i]' WHERE id_examen_post=$nombre and id_preg=$i ");

		if($var==false){
			echo "no se actualizo correctamente";
		}
		else{
			$conex2->ejecutar();
			//para calificar 
			$conex2->preparar("SELECT c.opcion_elegida, c.respuesta, c.peso FROM calificacion c WHERE id_examen_post=$nombre and id_preg=$i");
			$conex2->ejecutar();
			$conex2->prep()->bind_result($opc,$res,$peso);	
				while($conex2->resultado()){
					if($opc==$res){
						//echo "son iguales";
						$conex3->preparar("UPDATE calificacion SET calificacion='$peso' WHERE id_examen_post=$nombre and id_preg=$i");
						$conex3->ejecutar();
						$correctas++;
					}
					else{
						if($opc!=$res && $opc!=-1){
						//echo "no son iguales";
						$incorrectas++;
						$punto_contra=-0.25*$peso;
											
						$conex3->preparar("UPDATE calificacion SET calificacion='$punto_contra' WHERE id_examen_post=$nombre and id_preg=$i");
						$conex3->ejecutar();
						}
						else{
							if($opc==-1){
								$blanco++;
								$conex3->preparar("UPDATE calificacion SET calificacion='0' WHERE id_examen_post=$nombre and id_preg=$i");
								$conex3->ejecutar();

							}
						}
					}
			}
		}
	}

	//para calcular la nota final 
	$j=1;
	$puntaje=0;
	$conex4->preparar("SELECT c.calificacion FROM calificacion c where id_examen_post=$nombre");
	$conex4->ejecutar();
	$conex4->prep()->bind_result($cal);

	 while($conex4->resultado()){
	 		$puntaje=$puntaje+$cal;
			//echo "<br> Calificacion  de pregunta Nro:".$j."=".$cal;
			//$j++;  	  
	 }
	 echo "<br><strong> BLOQUE : </strong>".$bloque;
	 echo "<br><strong> CARRERA : </strong>".$carrera ;
	 echo "<br><strong> PREGUNTAS CORRECTAS : </strong> ".$correctas;
	 echo "<br><strong> PREGUNTAS INCORRECTAS : </strong> ".$incorrectas;
	 echo "<br><strong> PREGUNTAS EN BLANCO : </strong> ".$blanco;
	 echo "<br> <strong> NOTA FINAL : </strong>".$puntaje;
	 $conex4->preparar("UPDATE alumno_examen SET nota_final=$puntaje WHERE id=$nombre");
	 $conex4->ejecutar();

	 
 ?>


</div>
<?php include 'inc/footer.php'; ?>