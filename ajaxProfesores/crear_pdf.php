<?php

require('../fpdf/fpdf.php');
include('../config.php');

$q = isset($_POST['q'])?$_POST['q']:'';
$consulta = "select * from profesores where idProfesor like '%$q%'";
$query = mysqli_query($con, $consulta);

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
        $this->Image('../images/sos.png',6,2,33);
        $idProfesor = isset($_POST['q'])?$_POST['q']:'';
        if($idProfesor == ""){
            $idProfesor = 'Todos';
        }
        $fecha = date("d/m/y");
	// Arial bold 15
	$this->SetFont('Arial','B',12);
	// Movernos a la derecha
	$this->Cell(55);
	// T�tulo
	$this->Cell(55,10,utf8_decode('LISTA DE PROFESORES'),0,0,'L');
        $this->Ln(35);
        $this->Cell(45,6, utf8_decode('Criterio de Selección:'),0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(45,6,strtoupper($idProfesor),0,0,'L');
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
        $this->Cell(40,6,'id Profesor',1,0,'L',1);
        $this->Cell(40,6,'Nombre',1,0,'L',1);
        $this->Cell(40,6,'Apellidos',1,0,'L',1);
        $this->Cell(40,6,utf8_decode('Teléfono'),1,0,'L',1);
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
    $idProfesor = $fila['idProfesor'];
    $nombre = $fila['nombre'];
    $apellidos = $fila['apellidos'];
    $telefono = $fila['telefono'];
    $pdf->Cell(15, 6, $num,1,0,'L',0);
    $pdf->Cell(40, 6, utf8_decode($idProfesor),1,0,'L',0);
    $pdf->Cell(40, 6, utf8_decode($nombre), 1, 0, 'L', 0);
    $pdf->Cell(40, 6, utf8_decode($apellidos), 1, 0, 'L', 0);
    $pdf->Cell(40, 6, utf8_decode($telefono), 1, 0, 'L', 0);
    $num++;
$pdf->Ln();
}

$pdf->Output();
