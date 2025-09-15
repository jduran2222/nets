<html>
<?php
session_start();
include("config.php");
$idAlumno = $_SESSION["alumno"];
$idAsignatura = $_POST["asignaturas"];

$selectSQL1 = "SELECT * FROM arrastres WHERE (idAlumno='$idAlumno')";
  // Ejecuta la sentencia
$datos1 = mysqli_query ($con, $selectSQL1);
$numero = mysqli_num_rows($datos1);
if($numero >= 2){
    echo '<script>
      alert("Operación fallida. El alumno sólo tiene opción a 2 asignaturas.");'.'history.back()
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}

$selectSQL2 = "SELECT * FROM arrastres WHERE ((idAlumno='$idAlumno')and (idAsignatura='$idAsignatura'))";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL2);
$fila = mysqli_fetch_array($datos);
if($fila){
    echo '<script>
      alert("Operació fallida. Ese registro ya existe.");'.'history.back()
    </script>';
    exit;
}

$sql= "insert into arrastres(idAlumno, idAsignatura)values('$idAlumno', '$idAsignatura')";
$query = mysqli_query($con,$sql);
if($query){
    mysqli_close($con);
    echo '<script>
      alert("Registro guardado.");
      window.history.back();
    </script>';
    exit;
 }
?>
</html>


