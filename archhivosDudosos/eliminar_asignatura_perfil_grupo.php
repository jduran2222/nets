<?php  require('../config.php'); 
$idProfesor = $_GET['profesor'];
$idAsignatura = $_GET['asignatura'];
$idGrupo = $_GET['grupo'];

$sql = "DELETE FROM asignaturagrupoprofesor WHERE ((idAsignatura='$idAsignatura') and (idProfesor = '$idProfesor')and (idGrupo = '$idGrupo'))";
$query = mysqli_query($con, $sql);
if($query){
    mysqli_close($con);
    echo '<script>
      alert("Registro eliminado.");'.'history.back()
    </script>';
    exit;
} 	
  

