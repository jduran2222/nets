<?php

require('../fpdf/fpdf.php');
include('../config.php');

$q = isset($_POST['q'])?$_POST['q']:'';

$consulta = "select * from registro_pagos where cuenta like '%$q%'";
$query = mysqli_query($con, $consulta);



class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{	
        include('../config.php');
                
        $this->Image('../images/sos.png',6,2,33);
        $cuenta = isset($_POST['q'])?$_POST['q']:'';
        if($cuenta == ""){
            $cuenta = 'CAJA + BANCOS';
        }
        $fecha = date("d/m/y");
	// Arial bold 15
	$this->SetFont('Arial','B',10);
	// Movernos a la derecha
	$this->Cell(55);
	// T�tulo
	$this->Cell(55,10,utf8_decode('LISTA DE MOVIMIENTOS'),0,0,'L');
        $this->Ln(35);
        $this->SetFont('Arial','I',10);        
        $this->Cell(45,6, utf8_decode('Criterio de Selección:'),0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(45,6, strtoupper($cuenta),0,0,'L');
        $this->Ln();
        $this->Cell(45,6, utf8_decode('Fecha de Selección:'),0,0,'L');
        $this->Cell(45,6,$fecha,0,0,'L');       
        $this->Ln(15);
        $this->SetFillColor(232,232,0);
        $this->SetTextColor(0,0,0);  
        $this->Cell(15,6, utf8_decode('Nº'),1,0,'L',1);
        $this->Cell(21,6,'Fecha',1,0,'L',1);
        $this->Cell(16,6,'Alumno',1,0,'L',1);
        $this->Cell(46,6, utf8_decode('Concepto'),1,0,'L',1);
        $this->Cell(45,6, utf8_decode('Descripción'),1,0,'L',1);
        $this->Cell(15,6,'Cuenta',1,0,'L',1);
        $this->Cell(15,6,'Doc.',1,0,'L',1);
        $this->Cell(17,6,'Monto',1,0,'L',1);
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
    $fecha = $fila['fecha'];
    $alumno = $fila['alumno'];
    $concepto = $fila['concepto'];
    $descripcion = $fila['descripcion'];
    $cuenta = $fila['cuenta'];
    $documento = $fila['documento'];
    $monto = $fila['monto'];
    
    
    $pdf->Cell(15, 6, $num,1,0,'L',0);
    $pdf->Cell(21, 6, utf8_decode($fecha),1,0,'L',0);
    $pdf->Cell(16, 6, utf8_decode($alumno),1,0,'L',0);
    $pdf->Cell(46, 6, utf8_decode($concepto),1,0,'L',0);
    $pdf->Cell(45, 6, utf8_decode($descripcion),1,0,'L',0);
    $pdf->Cell(15, 6, utf8_decode($cuenta),1,0,'L',0);
    $pdf->Cell(15, 6, utf8_decode($documento),1,0,'L',0);
    $pdf->Cell(17, 6, utf8_decode($monto),1,0,'R',0);
    $num++;
$pdf->Ln();
}

$pdf->Output();
