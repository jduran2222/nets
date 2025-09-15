<?php 
require('config.php'); 
$clave = $_GET['clave'];

$result1 = $con->query(
    "SELECT * FROM notas where idAlumno = $clave"
);
if ($result1->num_rows > 0) {  
    echo '<script>
      alert("Operación denegada. El alumno ya tiene notas registradas en ese grupo.");'.'history.back()
    </script>';
    exit;
 }  
 
$result2 = $con->query(
    "SELECT * FROM notas2 where idAlumno = $clave"
);
if ($result1->num_rows > 0) {  
    echo '<script>
      alert("Operación denegada. El alumno ya tiene notas registradas en ese grupo.");'.'history.back()
    </script>';
    exit;
 } 
 
$consulta = "DELETE FROM alumnos_grupo WHERE idAlumno=$clave";
if(mysqli_query($con, $consulta)){
    echo '<script>
      alert("Registro eliminado.");'.'history.back()
    </script>';
    exit;
}
    

