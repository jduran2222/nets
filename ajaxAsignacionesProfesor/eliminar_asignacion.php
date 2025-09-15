<?php 
require('../config.php'); 
session_start();
$idGrupo = $_POST['delete_id'];
$idProfesor = $_SESSION['profesor'];
$idAsignatura = $_SESSION['asignatura'];

$result1 = $con->query(
    "SELECT * FROM notas where idAsignatura = '$idAsignatura'"
);
$result2 = $con->query(
    "SELECT * FROM notas2 where idAsignatura = '$idAsignatura'"
);

if (($result1->num_rows >0) or ($result2->num_rows >0)) { 
    echo '<script>
      alert("La asignatura ya tiene notas en el registro de notas. Se anula la operación");
    </script>';
    exit;
 }  	


$sql = "DELETE FROM asignaturagrupoprofesor WHERE ((idAsignatura='$idAsignatura') and (idProfesor = '$idProfesor')and (idGrupo = '$idGrupo'))";
$query = mysqli_query($con, $sql);
if($query){
    mysqli_close($con);
    echo '<script>
      alert("Registro eliminado.");
    </script>';
    exit;
} 	

