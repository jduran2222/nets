<?php  require('config.php'); 
$idAlumno = $_GET['alumno'];
$idAsignatura = $_GET['asignatura'];

$sql = "DELETE FROM arrastres WHERE ((idAsignatura='$idAsignatura') and (idAlumno = '$idAlumno'))";
$query = mysqli_query($con, $sql);
if($query){
    mysqli_close($con);
    echo '<script>
      alert("Registro eliminado.");'.'history.back()
    </script>';
    exit;
      
} 	
  
