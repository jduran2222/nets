<?php

require('../fpdf/fpdf.php');
include('../config.php');
session_start();
$idCurso = $_SESSION['curso'];
$asignaturas = $_SESSION['asignaturas'];
        
$q = isset($_POST['q'])?$_POST['q']:'';

$tables="alumnos, notas";
	$campos="alumnos.idAlumno, alumnos.nombre, alumnos.apellidos, alumnos.curso, notas.idAsignatura, TR10, TR01, TR20, TR02, TR30, TR03, TR40";
        $ordinario ="((notas.TR10>=5 OR notas.TR01>=5) AND (notas.TR20>=5 OR notas.TR02>=5) AND (notas.TR30>=5 OR notas.TR03>=5))";
        $extraordinario ="(notas.TR40>=5)";
        $sWhere="((alumnos.idAlumno = notas.idAlumno) and (alumnos.curso LIKE '%".$q."%')and $ordinario) and (alumnos.curso = '$idCurso')";
        $sWhere.="OR((alumnos.idAlumno = notas.idAlumno) and (alumnos.curso LIKE '%".$q."%')and $extraordinario) and (alumnos.curso = '$idCurso')";
	
	$query = mysqli_query($con,"SELECT alumnos.idAlumno, alumnos.nombre, alumnos.apellidos, alumnos.curso FROM  $tables where $sWhere GROUP BY alumnos.idAlumno HAVING COUNT(DISTINCT idAsignatura) = '$asignaturas'");

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{	
        $this->Image('../images/sos.png',6,2,33);
        $idCurso = isset($_POST['q'])?$_POST['q']:'';
        if($idCurso == ""){
            $idCurso = 'Todos';
        }
        $fecha = date("d/m/y");
	// Arial bold 15
	$this->SetFont('Arial','B',12);
	// Movernos a la derecha
	$this->Cell(55);
	// T�tulo
	$this->Cell(55,10,utf8_decode('ALUMNOS PROMOCIONADOS'),0,0,'L');
        $this->Ln(35);
        $this->Cell(45,6, utf8_decode('Criterio de Selección:'),0,0,'L');
        $this->SetFont('Arial','I',12);
        $this->Cell(45,6,strtoupper($idCurso),0,0,'L');
        $this->Ln();
        $this->SetFont('Arial','B',12);
        $this->Cell(45,6, utf8_decode('Fecha de Selección:'),0,0,'L');
        $this->SetFont('Arial','I',12);
        $this->Cell(45,6,$fecha,0,0,'L');
        $this->Ln(15);
        $this->SetFillColor(232,232,0);
        $this->SetTextColor(0,0,0);
        
        $this->Cell(15,6, utf8_decode('Nº'),1,0,'L',1);
        $this->Cell(35,6,'id Alumno',1,0,'L',1);
        $this->Cell(40,6,'Nombre',1,0,'L',1);
        $this->Cell(50,6,'Apellidos',1,0,'L',1);
        $this->Cell(40,6,'Curso Actual',1,0,'L',1);
        
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
    $alumno = $fila['idAlumno'];
    $nombre = $fila['nombre'];
    $apellidos = $fila['apellidos'];
    $curso = $fila['curso'];
    
    
    $pdf->Cell(15, 6, $num,1,0,'L',0);
    $pdf->Cell(35, 6, utf8_decode($alumno),1,0,'L',0);
    $pdf->Cell(40, 6, utf8_decode($nombre),1,0,'L',0);
    $pdf->Cell(50, 6, utf8_decode($apellidos),1,0,'L',0);
    $pdf->Cell(40, 6, utf8_decode($curso),1,0,'L',0);
    
    $num++;
$pdf->Ln();
}

$pdf->Output();
