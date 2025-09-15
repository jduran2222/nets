<?php
require('../fpdf/fpdf.php');
include('../config.php');
$q = isset($_POST['q'])?$_POST['q']:'';
$consulta = "select * from alumnos where curso like '%$q%'";
$query = mysqli_query($con, $consulta);

class PDF extends FPDF
{
    function Header()
    {	
        $this->Image('../images/aula.jpg',6,2,33);
	$curso = isset($_POST['q'])?$_POST['q']:'';
        if($curso == ""){
            $curso = 'Todos';
        }
        $fecha = date("d/m/y");
	$this->SetFont('Arial','B',12);
	$this->Cell(55);
	$this->Cell(55,10,utf8_decode('LISTA DE ALUMNOS MATRICULADOS'),0,0,'L');
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
        $this->Cell(30,6,'id Alumno',1,0,'L',1);
        $this->Cell(45,6,'Nombre',1,0,'L',1);
        $this->Cell(55,6,utf8_decode('Apellidos'),1,0,'L',1);
        $this->Cell(40,6,'Curso',1,0,'L',1);
	$this->Ln(10);        
    }

function Footer()
    {
	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');            
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$num = 1;
while($fila = mysqli_fetch_array($query))
{
    $idAlumno = $fila['idAlumno'];
    $nombre = $fila['nombre'];
    $apellidos = $fila['apellidos'];
    $curso = $fila['curso'];
    $pdf->Cell(15, 6, $num,1,0,'L',0);
    $pdf->Cell(30, 6, utf8_decode($idAlumno),1,0,'L',0);
    $pdf->Cell(45, 6, utf8_decode($nombre), 1, 0, 'L', 0);
    $pdf->Cell(55, 6, utf8_decode($apellidos), 1, 0, 'L', 0);   
    $pdf->Cell(40, 6, utf8_decode($curso), 1, 0, 'L', 0);  
    $num++;
    $pdf->Ln();
}

$pdf->Output();
