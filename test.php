<?php include 'inc/header.php'; 
	   include 'recorrer.js' ;?>


<div style="background: #E2DBC6 none repeat scroll 0 0;
  border: 3px solid #999;
  margin-top: 5px;
  min-height: 1050px;
  padding: 15px;
  margin-left: 12px;
  width: 1000px;">
 <div align="center"></div>
<?php 
  
	echo "<div id='mi-reloj'></div>";
	$i=1;
	$id_alumno=1;
	$carrera=$_POST['sel'];
	$a=0;
	$b=1;
	$c=2;
	$d=3;
	$e=4;
	$f=5;
	$conex2= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);	
	//estatico
	$conex2->preparar("SELECT c.nombre, b.nombre, b.id, e.id FROM carrera c, bloque b, examen e WHERE c.codigo=$carrera and b.id=c.bloque_id and e.carrera_id=$carrera");
	$conex2->ejecutar();
	$conex2->prep()->bind_result($nombre_carrera, $nombre_bloque, $bloque_id, $id_examen);
	  while($conex2->resultado()){
	  			echo "<strong> BLOQUE:</strong>".$nombre_bloque;
	  			echo "<br> <strong>CARRERA: </strong>".$nombre_carrera; 
	  		}
	  //echo $bloque_id;
	 //dinamico
	$conex2->preparar("SELECT  s.nombre,c.nombre,c1.nombre, p.id, p.peso_id, p.nombre,p.foto, a1.alt1,a1.alt2, a1.alt3, a1.alt4, a1.alt5, a1.alternativa_sol FROM pregunta p, seccion s, alternativa a1, curso_dividido c1,curso c WHERE p.bloque_id='$bloque_id' and a1.id_pregunta=p.nombre  and a1.bloque='$bloque_id' and p.curso_dividido=c1.id and c1.bloque_id='$bloque_id'and c.id=c1.curso_id and c.bloque_id='$bloque_id' and s.id=c.seccion ");
	$conex2->ejecutar();
	$conex2->prep()->bind_result($seccion_name, $curso_name, $curso_dividido ,$id_p,$peso,$name_pregunta, $foto,$a1,$a2,$a3,$a4,$a5,$sol);
		echo "<br>";
	
		while($conex2->resultado()){
				echo "<div id='check".$i."'>";
				echo "<strong><h4>Sección : ".$seccion_name."</h5>";
				echo "<h4>Curso   : ".$curso_name."</h5>";
				echo "<h4>Tipo   : ".$curso_dividido."</h5></strong>";	
				
				echo "<br>";


				if($i==1){
					echo "<div class='col-md-6 col-md-offset-5'>";
					echo "<a id='adelante".$i."' type='button' class='btn btn-success' onclick='adelante($i)'>
						<span class='glyphicon glyphicon-chevron-right'></span>Siguiente Pregunta 
			   			</a>";
			   			echo "</div>";
			 
				}
			
				if($i==10){
					echo "<div class='col-md-6 col-md-offset-5'>";		
			   		echo "<a id='atras".$i."'  type='button' class='btn btn-danger' onclick='atras($i)'>
						<span class='glyphicon glyphicon-chevron-left'></span>Anterior Pregunta
						</a>";
						echo "</div>";
					}

			    if($i>1 && $i<10){
			    		echo "<div class='col-md-6 col-md-offset-4'>";
						echo "<a id='atras".$i."'  type='button' class='btn btn-danger' onclick='atras($i)'>
						<span class='glyphicon glyphicon-chevron-left'></span>Anterior Pregunta
						</a>";

						echo "<a id='adelante".$i."' type='button' class='btn btn-success' onclick='adelante($i)'>
						<span class='glyphicon glyphicon-chevron-right'></span>Siguiente Pregunta 
			   			</a>";
			   			echo "</div>";
					}
					
					$a=$a+6;
					$b=$b+6;
					$c=$c+6;
					$d=$d+6;
					$e=$e+6;
					$f=$f+6;

						echo "<br>";
						echo "<form name='examen' action='prueba.php' method='POST'>";
						echo "<br> <strong>PREGUNTA   ".$i.": </strong>".$name_pregunta;
						//echo "<br> PESO:".$peso;
						//echo "<br> SOLUCION".$sol;
						echo "<br><div align='center'><img style=' border: black 2px solid;' width='400' height='300' src='$foto'></div>";
						
						echo "  <div class='container'>
								<ul>
							  <li>
							    <input type='radio' id='opcion".$a."' name='opcion[$i]' value='1'>
							    <label for='opcion".$a."'>".$a1."</label>							   
							    <div class='check'></div>
							  </li>							  
							  <li>
							    <input type='radio' id='opcion".$b."' name='opcion[$i]' value='2'>
							    <label for='opcion".$b."'>".$a2."</label>
							    
							    <div class='check'><div class='inside'></div></div>
							  </li>
							  
							  <li>
							    <input type='radio' id='opcion".$c."' name='opcion[$i]' value='3'>
							    <label for='opcion".$c."'>".$a3."</label>
							    
							    <div class='check'><div class='inside'></div></div>
							  </li>
							  <li>
							    <input type='radio' id='opcion".$d."' name='opcion[$i]' value='4'>
							    <label for='opcion".$d."' >".$a4."</label>
							    
							    <div class='check'><div class='inside'></div></div>
							  </li>
							  <li>
							    <input type='radio' id='opcion".$e."' name='opcion[$i]' value='5'>
							    <label for='opcion".$e."'>".$a5."</label>
							    
							    <div class='check'><div class='inside'></div></div>
							  </li>
							 	<div class='col-md-6 col-md-offset-4'>
								    <li>
								    <input type='radio' id='opcion".$f."' name='opcion[$i]' value='-1'>
								    <label for='opcion".$f."'>Omitir pregunta </label>
								    
								    <div class='check'><div class='inside'></div></div>
							  		</li>
							  	</div>

							</ul>
							</div>
						";
					
						echo "<input type='number' name='cod_examen' value='$id_examen' hidden>";					
						echo "<input type='number' name='cod_alumno' value='$id_alumno' hidden>";

						echo "<input type='text' name='bloque' value='$nombre_bloque' hidden>";					
						echo "<input type='text' name='carrera' value='$nombre_carrera' hidden>";
						//se van para la tabla calificacion
						echo "<input type='number' name='pregunta[]' value='$id_p' hidden>";
						echo "<input type='number' name='peso[]' value='$peso' hidden>";
						echo "<input type='number' name='solucion[]' value='$sol' hidden>";
						
			
				if($i==10){
						echo "  <div class='container'>
								<div class='col-md-6 col-md-offset-3'>
								<br><br>
								<button id=prueba class='btn btn-info pull-right'>
								   <span class='glyphicon glyphicon-floppy-disk'></span> Enviar Respuestas
								    </button> </div></div>
								    ";	
					   		echo "</form>";

				}

				
				echo "</div>";
						
			   	$i++;
		      }

		 
		      
 ?>			 
	




 </div>


<?php include 'inc/footer.php'; ?>