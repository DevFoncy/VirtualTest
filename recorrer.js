<script>
	
 
	function stopTab( e,indice ) {
    var acumulador=document.getElementById("acumulador").value; //7
    var indicador=indice+1;       
	  if(indicador==acumulador){
	    	var evt = e || window.event
	    	if ( evt.keyCode === 13 ) {
	     		return false
	    	}

	    }
	}
	function blanquear(indice){
		//para ir adelante
		$siguiente=indice+1;
		document.getElementById("check"+indice).style.display='none';
		document.getElementById("check"+$siguiente).style.display='block';


		//alert ( indice);
		//document.getElementsByName('opcion')[indice].value="-1";


	}
	function adelante(indice){
		$flag=false;
		$siguiente=indice+1;
		for($i=indice*6;$i<=indice*6+5;$i++){
			//si no ha chequeado nada sera valor=false
			
			$valor = document.getElementById("opcion"+$i).checked;
			if($valor!=false){
				$flag=true;
				document.getElementById("check"+indice).style.display='none';
				document.getElementById("check"+$siguiente).style.display='block';

			}

		}
		if($flag==false){
				sweetAlert("Error", "Debes seleccionar una opción", "error");
		}

	}
	function verdadera_confirmacion(indice){
		
	}


	function atras(indice){
		if(indice!=1){
		$atras=indice-1;
		document.getElementById("check"+indice).style.display='none';
		document.getElementById("check"+$atras).style.display='block';	
		}
		
		//alert (indice+1);	
	}

	
	function validar(numero,e){
		 var valor=document.getElementById("nota_examen"+numero).value;
		 if(valor<0 || valor>20){
		 	document.getElementById("nota_examen"+numero).value="";
		 	document.getElementById("imagen"+numero).setAttribute("class","glyphicon glyphicon-remove");
		 	return false;
		 	 	
		 }
		 else{
		 	document.getElementById("imagen"+numero).setAttribute("class","glyphicon glyphicon-ok");
		 }
		 
	}
	function verificar(numero){
			elemento=document.getElementById("check"+numero);
			//var numero_post=document.getElementById("nota_examen"+numero);
			if(elemento.checked){
				document.getElementById("nota_examen"+numero).value="-1";
				document.getElementById("nota_examen"+numero).style.display='none';
				document.getElementById("imagen"+numero).setAttribute("class","none");
				 
				 //numero_post.textContent=" ";	 
			}	 
			if(!elemento.checked){
				 document.getElementById("nota_examen"+numero).disabled=false;
				document.getElementById("nota_examen"+numero).style.display='block';
				 document.getElementById("nota_examen"+numero).value="";
			}
	}


</script>