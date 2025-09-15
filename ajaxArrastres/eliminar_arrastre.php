<?php  require('../config.php'); 
session_start();
$idAsignatura=$_POST['delete_id'];
$idAlumno = $_SESSION['alumno'];

$sql = "DELETE FROM arrastres WHERE ((idAsignatura='$idAsignatura') and (idAlumno = '$idAlumno'))";
$query = mysqli_query($con, $sql);
if($query){
    mysqli_close($con);
    echo '<script>
      alert("Registro eliminado.");
    </script>';
    exit;
} 	
