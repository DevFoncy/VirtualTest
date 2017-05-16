<?php

	function validar_datos($nombre){
		global $dirsubida;
		global $rutaSubida;
		global $error;

		$dirsubida= "fotos/$nombre/";

                                         //para crear la carpeta foto/nombre
                                         if(!file_exists($dirsubida)){
                                         	mkdir($dirsubida,0777 );
                                         }

						 		 		$foto = $_FILES['foto']; // array con toda la info
						 		 		// var_dump($foto) // para depurar la informacion de foto
						 		 		$nombrefoto= $foto['name'];
						 		 		$nombreTmp = $foto['tmp_name'];
						 		 		$rutaSubida = "{$dirsubida}profile.jpg";
						 		 		//para obtener la extension de la imagen
						 		 		$extArchivo= preg_replace('/image\//','', $foto['type']);
						 		 		if($extArchivo == 'jpeg'|| $extArchivo == 'png' || $extArchivo == 'jpg'){
						 		 			//si la imagen es movido a la ruta de subida
						 		 			if(move_uploaded_file($nombreTmp, $rutaSubida)){
						 		 				return true;
						 		 				
						 		 			} 
						 		 			else{
													$error= "no se pudo mover el archivo";
						 		 			}
						 		 		}
						 		 		else{
						 		 			//trigger_error("no es un archivo de imagen valido",E_USER_WARNING);
						 		 			$error= " no es un archivo de imagen valida";
						 		 		}
		
		return $error;
		}

?>
