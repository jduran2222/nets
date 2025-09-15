<?php

require('../fpdf/fpdf.php');
include('../config.php');
session_start();

$idAsignatura = $_SESSION["idAsignatura"]; 
$asignatura = $_SESSION["asignatura"];
$curso = $_SESSION["curso"];       
$idGrupo = $_SESSION["idGrupo"];

$consulta = "SELECT alumnos.nombre, alumnos.apellidos, nota,
                CASE 
                    WHEN nota = 10 THEN 'Matricula de Honor'
                    WHEN nota >=9 THEN 'Sobresaliente'
                    WHEN nota >=7 THEN 'Notable'
                    WHEN nota >=5 THEN 'Aprobado'
                    ELSE 'Suspenso'
                END AS calificacion
                from alumnos, notas2, pruebas, alumnos_grupo where (alumnos.idAlumno = notas2.idAlumno) and (alumnos_grupo.idAlumno = alumnos.idAlumno) and
                (notas2.idAsignatura = '$idAsignatura')and (pruebas.idPrueba = notas2.idPrueba)and(pruebas.activada = 1) and (alumnos_grupo.idGrupo = '$idGrupo')";

$query = mysqli_query($con, $consulta);

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{	
        include('../config.php');
        
        $idAsignatura = $_SESSION["idAsignatura"]; 
        $asignatura = $_SESSION["asignatura"];
        $curso = $_SESSION["curso"];       
        $idGrupo = $_SESSION["idGrupo"];

        $selectSQL = "SELECT * from pruebas where activada = 1";		
	$datos = mysqli_query ($con, $selectSQL);
            
        $row = mysqli_fetch_array($datos);
        
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
	
        $this->Cell(55,10, utf8_decode($row["prueba"]),0,0,'L');
        $this->Ln(35);
        $this->Cell(30,6, utf8_decode('Fecha: '),0,0,'L');
        $this->Cell(25,6,$fecha,0,0,'L'); 
        $this->Ln();
        $this->Cell(30,6,utf8_decode('Grupo: '),0,0,'L');
        $this->Cell(45,6,$idGrupo,0,0,'L');
        $this->Ln();
        $this->Cell(30,6, utf8_decode('Asignatura: '),0,0,'L');
        $this->Cell(45,6, utf8_decode($asignatura),0,0,'L');
        $this->Ln(15);
        $this->SetFillColor(232,232,0);
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','B',10);
        $this->Cell(15,6, utf8_decode('Nº'),1,0,'L',1);
        $this->Cell(40,6,'Nombre',1,0,'L',1);
        $this->Cell(40,6,'Apellidos',1,0,'L',1);
        $this->Cell(40,6,'Nota',1,0,'L',1);
        $this->Cell(40,6,utf8_decode('Calificación'),1,0,'L',1);
	$this->Ln(10);
}

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
    $nombre = $fila['nombre'];
    $apellidos = $fila['apellidos'];
    $nota = $fila['nota'];
    $calificacion = $fila['calificacion'];
    $pdf->Cell(15, 6, $num,1,0,'L',0);    
    $pdf->Cell(40, 6, utf8_decode($nombre), 1, 0, 'L', 0);
    $pdf->Cell(40, 6, utf8_decode($apellidos), 1, 0, 'L', 0);
    $pdf->Cell(40, 6, utf8_decode($nota), 1, 0, 'L', 0);
    $pdf->Cell(40, 6, utf8_decode($calificacion),1,0,'L',0);
    $num++;
$pdf->Ln();
}
$pdf->Output();
