<?php

require('../fpdf/fpdf.php');
include('../config.php');

$q = isset($_POST['q'])?$_POST['q']:'';
$consulta = "select * from grupos where curso like '%$q%'";
$query = mysqli_query($con, $consulta);

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{	
        $this->Image('../images/sos.png',6,2,33);
        $curso = isset($_POST['q'])?$_POST['q']:'';
        if($curso == ""){
            $curso = 'Todos';
        }
        $fecha = date("d/m/y");
	// Arial bold 15
	$this->SetFont('Arial','B',12);
	// Movernos a la derecha
	$this->Cell(55);
	// T�tulo
	$this->Cell(55,10,utf8_decode('LISTA DE GRUPOS'),0,0,'L');
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
        $this->SetFont('Arial','I',10);
        $this->Cell(15,6, utf8_decode('Nº'),1,0,'L',1);
        $this->Cell(45,6,'id Grupo',1,0,'L',1);
        $this->Cell(45,6,'Grupo',1,0,'L',1);       
        $this->Cell(45,6,'Tutor',1,0,'L',1);
        $this->Cell(20,6,'Capacidad',1,0,'L',1);
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
    $idGrupo = $fila['idGrupo'];
    $grupo = $fila['grupo'];
    $curso = $fila['curso'];
    $tutor = $fila['tutor'];
    $capacidad = $fila['capacidad'];
    $pdf->Cell(15, 6, $num,1,0,'L',0);
    $pdf->Cell(45, 6, utf8_decode($idGrupo),1,0,'L',0);
    $pdf->Cell(45, 6, utf8_decode($grupo), 1, 0, 'L', 0);
    
    $pdf->Cell(45, 6, utf8_decode($tutor), 1, 0, 'L', 0); 
    $pdf->Cell(20, 6, utf8_decode($capacidad), 1, 0, 'R', 0);
    $num++;
$pdf->Ln();
}

$pdf->Output();
