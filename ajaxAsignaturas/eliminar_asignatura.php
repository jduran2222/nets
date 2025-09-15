<?php
if (empty($_POST['delete_id'])){
	$errors[] = "Id vacío.";
} elseif (!empty($_POST['delete_id'])){
require_once ("../config.php");//Contiene funcion que conecta a la base de datos
   $idAsignatura=$_POST['delete_id'];
    
$result1 = $con->query(
    "SELECT * FROM notas where idAsignatura = '$idAsignatura'"
);

if ($result1->num_rows > 0) { 
    echo '<script>
      alert("Operación denegada. Hay notas registradas para esa asignatura.");
    </script>';
    exit;
 }  	
 
$result2 = $con->query(
    "SELECT * FROM arrastres where idAsignatura = '$idAsignatura'"
);

if ($result2->num_rows > 0) { 
    echo '<script>
      alert("Esa asignatura aparece en los registros de matriculas de arrastre.");
    </script>';
    exit;
 }  	
 
 $result3 = $con->query(
    "SELECT * FROM notas2 where idAsignatura = '$idAsignatura'"
);

if ($result3->num_rows > 0) { 
    echo '<script>
      alert("Operación denegada. Hay notas registradas para esa asignatura.");
    </script>';
    exit;
 } 

$result4 = $con->query(
    "SELECT * FROM notas_arrastre where idAsignatura = '$idAsignatura'"
);

if ($result4->num_rows > 0) { 
    echo '<script>
      alert("Operación denegada. Hay notas registradas para esa asignatura.");
    </script>';
    exit;
 } 

$result5 = $con->query(
    "SELECT * FROM perfilprofesores where idAsignatura = '$idAsignatura'"
);

if ($result5->num_rows > 0) { 
    echo '<script>
      alert("Esa asignatura aparece en el perfil de algun profesor.");
    </script>';
    exit;
 } 
 
$result6 = $con->query(
    "SELECT * FROM asignaturagrupoprofesor where idAsignatura = '$idAsignatura'"
);

if ($result6->num_rows > 0) { 
    echo '<script>
      alert("Esa asignatura está asignada a algún profesor.");
    </script>';
    exit;
 }  	
	// DELETE FROM  database
$result7 = "DELETE FROM  asignaturas WHERE idAsignatura='$idAsignatura'";
$query = mysqli_query($con,$result7);
  if ($query) {
    echo '<script>
        alert("Registro eliminado.");
    </script>';
    exit;    
    }     
}
    