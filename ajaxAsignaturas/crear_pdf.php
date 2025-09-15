<?php

require('../fpdf/fpdf.php');
include('../config.php');

$q = isset($_POST['q'])?$_POST['q']:'';
$consulta = "select * from asignaturas where estado = 1 and curso like '%$q%'";
$query = mysqli_query($con, $consulta);

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{	
        $this->Image('../images/sos.png',6,2,33);
	$curso = isset($_POST['q'])?$_POST['q']:'';
        if($curso == ""){
            $curso = 'TODAs';
        }
        $fecha = date("d/m/y");
	// Arial bold 15
	$this->SetFont('Arial','B',12);
	// Movernos a la derecha
	$this->Cell(55);
	// T�tulo
	$this->Cell(45,10,utf8_decode('LISTA DE ASIGNATURAS'),0,0,'L');
        $this->Ln(35);
        $this->Cell(45,6, utf8_decode('Criterio de Selección:'),0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(45,6,strtoupper($curso),0,0,'L');
        $this->Ln();
        $this->SetFont('Arial','B',12);
        $this->Cell(45,6, utf8_decode('Fecha de Selección:'),0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(45,6,$fecha,0,0,'L');
        $this->Ln(15);
        $this->SetFillColor(232,232,0);
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','B',10);
        $this->Cell(15,6, utf8_decode('Nº'),1,0,'L',1);
        $this->Cell(40,6,'id Asignatura',1,0,'L',1);
        $this->Cell(65,6,'Asignatura',1,0,'L',1);
        $this->Cell(45,6,'Curso',1,0,'L',1);
        
        
	// Salto de l�nea
	$this->Ln(10);
        
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
              
}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$num = 1;
while($fila = mysqli_fetch_array($query))
{
    $idAsignatura = $fila['idAsignatura'];
    $asignatura = $fila['asignatura'];
    $curso = $fila['curso'];
    $estado = $fila['estado'];
    $pdf->Cell(15, 6, $num,1,0,'L',0);
    $pdf->Cell(40, 6, utf8_decode($idAsignatura),1,0,'L',0);
    $pdf->Cell(65, 6, utf8_decode($asignatura), 1, 0, 'L', 0);
    $pdf->Cell(45, 6, utf8_decode($curso), 1, 0, 'L', 0); 
    
    $num++;
$pdf->Ln();
}

$pdf->Output();
