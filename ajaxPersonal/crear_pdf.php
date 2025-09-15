<?php

require('../fpdf/fpdf.php');
include('../config.php');

$q = isset($_POST['q'])?$_POST['q']:'';
$consulta = "select * from personal where puesto like '%$q%'";
$query = mysqli_query($con, $consulta);

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{	
        $this->Image('../images/sos.png',6,2,33);
	$puesto = isset($_POST['q'])?$_POST['q']:'';
        if($puesto == ""){
            $puesto = 'Todos';
        }
        $fecha = date("d/m/y");
	// Arial bold 15
	$this->SetFont('Arial','B',12);
	// Movernos a la derecha
	$this->Cell(55);
	// T�tulo
	$this->Cell(55,10,utf8_decode('LISTA DE PERSONAL'),0,0,'L');
        $this->Ln(35);
        $this->Cell(45,6, utf8_decode('Criterio de Selección:'),0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(45,6,strtoupper($puesto),0,0,'L');
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
        $this->Cell(40,6,'id Personal',1,0,'L',1);
        $this->Cell(40,6,'Nombre',1,0,'L',1);
        $this->Cell(40,6,'Apellidos',1,0,'L',1);
        $this->Cell(40,6,'Puessto',1,0,'L',1);
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
    $idPersonal = $fila['idPersonal'];
    $nombre = $fila['nombre'];
    $apellidos = $fila['apellidos'];
    $puesto = $fila['puesto'];
    $pdf->Cell(15, 6, $num,1,0,'L',0);
    $pdf->Cell(40, 6, utf8_decode($idPersonal),1,0,'L',0);
    $pdf->Cell(40, 6, utf8_decode($nombre), 1, 0, 'L', 0);
    $pdf->Cell(40, 6, utf8_decode($apellidos), 1, 0, 'L', 0);
    $pdf->Cell(40, 6, utf8_decode($puesto), 1, 0, 'L', 0);
    $num++;
$pdf->Ln();
}

$pdf->Output();
