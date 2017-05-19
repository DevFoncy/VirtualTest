<?php include 'inc/header.php'; 
 	    include 'inc/header2.php';
 	    session_start();
		$dni=$_SESSION['dni']; 
?>
<div id="main">

	<h3 align="center"> HISTORIAL DE EXAMENES TOMADOS</h3>
	<table width="100%" border="2" align="center" cellpadding="0" cellspacing="1" bordercolor="#77D2FF" class="cuerpo">
	<tr bgcolor="#D5EAFF">
		<td bgcolor="#D5EAFF" align="middle" width="3%"><strong>N°</strong></td>
		<td bgcolor="#D5EAFF" align="middle" width="15%"><strong>CARRERA</strong></td>
		<td bgcolor="#D5EAFF" align="middle" width="10%"><strong>BLOQUE</strong></td>
		<td bgcolor="#D5EAFF" align="middle" width="10%"><strong>PUNTAJE</strong></td>
		<td colspan="2" bgcolor="#D5EAFF" align="middle" width="13%"><strong>FECHA</strong></td>
		<td bgcolor="#D5EAFF" align="middle" width="13%"><strong>REPORTE DETALLADO </strong></td>
		<br>
	<?php  
		$conex2= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);	
		
		$conex2->preparar("SELECT a1.nota_final, a1.fecha, c.nombre,b.nombre, a1.id from alumno_examen a1, alumno a, examen e, carrera c, bloque b where a.dni=$dni and a.id=a1.alumno_id and a1.examen_id=e.id and e.carrera_id=c.codigo and c.bloque_id=b.id ");
		$conex2->ejecutar();
		$conex2->prep()->bind_result($nota,$fecha, $carrera,$bloque,$id_ext);
		$n=1;
	  while($conex2->resultado()){
	  		$fecha2=explode(" ",$fecha);
	  
	  		echo "<tr>
	  				<form action='reporte.php' method='POST' name='formu".$n."'>
					<td align='middle'>$n</td>
					<td align='left'>$carrera </td>
					<td align='left'>$bloque </td>
					<td align='middle'>$nota</td>
					<td align='middle'>$fecha2[0]</td>
					<td align='middle'>$fecha2[1]</td>										
					<input type='text' name='id_ext' value='$id_ext' hidden >
					<input type='text' name='carrera' value='$carrera' hidden >
					<input type='text' name='bloque' value='$bloque' hidden >	
					<td align='middle'><button type='submit'> <span class='glyphicon glyphicon-print'></span> REPORTE PDF</button></td>
					</form>
			<tr>";
			$n++;
	  }
	  
	?>
</table>
</div>
 <?php include 'inc/footer.php'; 