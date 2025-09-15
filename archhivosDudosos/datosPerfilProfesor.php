<html>
<?php
session_start();
include("config.php");
$idProfesor = $_SESSION["profesor"];
$idAsignatura = $_POST["asignaturas"];

$sql= "insert into perfilprofesores(idProfesor, idAsignatura)values('$idProfesor', '$idAsignatura')";
$query = mysqli_query($con,$sql);
if($query){
    mysqli_close($con);
    echo '<script>
      alert("Registro guardado con éxito.");'.'history.back();
    </script>';
    exit;
}
?>
</html>

