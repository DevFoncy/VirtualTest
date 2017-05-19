<?php 
require 'bd/conexion.php';
require 'bd/Database.php';
require 'fpdf/fpdf.php';
	$id_ext=$_POST['id_ext'];
	$carrera=$_POST['carrera'];
	$bloque=$_POST['bloque'];
	$conex3= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);	
	//obtener datos personales de la tabla alumno 
	$conex3->preparar("SELECT a.dni,a.nombre,a.apellido FROM alumno a, alumno_examen a1 WHERE a1.id=$id_ext and a1.alumno_id=a.id");
	$conex3->ejecutar();
	$conex3->prep()->bind_result($dni,$nom,$apel);
	while($conex3->resultado()){
	}

	//obtener datos de la nota 
	$conex3->preparar("SELECT a1.nota_final, a1.correctas, a1.incorrectas, a1.blanco,a1.fecha FROM alumno_examen a1 WHERE a1.id=$id_ext");
	$conex3->ejecutar();
	$conex3->prep()->bind_result($nota,$buena,$mala,$blanco,$fecha);
	while($conex3->resultado()){

	}
	$fecha2=explode(" ",$fecha);


	$conex3->preparar("SELECT c.id_preg, c.calificacion,c2.nombre, c1.nombre from calificacion c, pregunta p, curso_dividido c1, curso c2 where c.id_examen_post=30 and c.id_preg=p.id and p.curso_dividido= c1.id and c1.bloque_id=1 and c1.curso_id=c2.id and c2.bloque_id=1");
	$conex3->ejecutar();
	$conex3->prep()->bind_result($id,$cal,$nomc,$nomc2);

	//Escribimos en el archivo 
	$file = fopen("cursos.txt", "w");
	while($conex3->resultado()){
		fwrite($file, $id. PHP_EOL);
		fwrite($file, $cal. PHP_EOL);
		fwrite($file, $nomc . PHP_EOL);
		fwrite($file, $nomc2 . PHP_EOL);	
	}
	fclose($file);

	class PDF extends FPDF{
				function Header()
				{

					$this->SetFont('Courier','B',15);
					    // Movernos a la derecha
					    // $this->Cell(80);
					    // Título
					    $this->Cell(0,10,'Centro Preuniversitario de la Universidad Nacional Del Callao',0,2,'C');
					    $this->SetFont('Courier','B',20);
					    $this->Cell(0,22,'REPORTE DEL SIMULACRO VIRTUAL',0,2,'C');
					    $this->Cell(0,-7,'______________________________________________________________',0,2,'C');
						$this->SetFont('Arial','B',15);
						$this->Image('img/unac.png',180,20,-350);
						// Salto de línea
					    $this->Ln(10);
				}

				function Footer()
				{
				    // Posición a 1,5 cm del final
				    $this->SetY(-15);
				    // Arial itálica 8
				    $this->SetFont('Arial','B',15);
				    // Color del texto en gris
				    $this->SetTextColor(128);
				    // Número de página
				    $this->Cell(0,10,utf8_decode('Página').$this->PageNo(),0,0,'C');
				     $this->Cell(0,10,date('d/m/Y'),0,0,'R');
				}

				function ChapterTitle($tipo, $tittle)
				{
				    // Arial 12
				    $this->SetFont('Arial','',12);
				    // Color de fondo
				    $this->SetFillColor(200,220,255);
				    // Título
				    $this->Cell(0,5,"$tipo : $tittle",0,1,'L',false);
				    // Salto de línea
				    $this->Ln(4);
				}


				function PrintChapter($tipo, $title)
				{	
				    $this->ChapterTitle($tipo,$title);
				}

				function BasicTable($header, $data)
{
    // Cabecera
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

// Una tabla más completa
function ImprovedTable($header, $data)
{
    // Anchuras de las columnas
    $w = array(40, 35, 45, 40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

// Tabla coloreada
function FancyTable($header, $data)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(40, 35, 45, 40);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

	}
	$pdf = new PDF();
	$pdf->AddPage();
	$pdf->Ln(4);
	$pdf->SetFont('Arial','B',13);
	$pdf->Cell(0,5,"DATOS DEL ALUMNO",0,2,'L');
	$pdf->Ln(2);
	$pdf->PrintChapter("NOMBRES",$nom,'20k_c1.txt');
	$pdf->PrintChapter("APELLIDOS",$apel,'20k_c1.txt');
	$pdf->PrintChapter("BLOQUE",$bloque,'20k_c1.txt');
	$pdf->PrintChapter("CARRERA",utf8_decode($carrera),'20k_c1.txt');


	$pdf->SetFont('Arial','B',13);
	$pdf->Cell(0,5,"DATOS DEL EXAMEN",0,2,'L');
	$pdf->Ln(4);
	
	$pdf->PrintChapter("NOTA FINAL DEL EXAMEN",$nota,'20k_c1.txt');
	$pdf->PrintChapter("PREGUNTAS CORRECTAS",$buena,'20k_c1.txt');
	$pdf->PrintChapter("PREGUNTAS INCORRECTAS",$mala,'20k_c1.txt');
	$pdf->PrintChapter("PREGUNTAS EN BLANCO",$blanco,'20k_c1.txt');
	$pdf->PrintChapter("FECHA ",$fecha2[0],'20k_c1.txt');
	$pdf->PrintChapter("HORA ",$fecha2[1],'20k_c1.txt');







	$pdf->Output();
?>