<html>
<?php
session_start();
include("../config.php");
$idAlumno = $_SESSION["alumno"];
$idAsignatura = $_POST["asignatura"];

$sql= "insert into arrastres(idAlumno, idAsignatura)values('$idAlumno', '$idAsignatura')";
$query = mysqli_query($con,$sql);
if($query){
    mysqli_close($con);
    echo '<script>
      alert("Registro guardado con éxito.");
    </script>';
    exit;
}
?>
</html>
