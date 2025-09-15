<html>
<?php
session_start();
include("config.php");
$idGrupo = $_SESSION['idGrupo'];
$idProfesor = $_POST["idProfesor"];
$idAsignatura = $_POST["idAsignatura"];

  $selectSQL1 = "SELECT * FROM perfilprofesores WHERE (idProfesor='$idProfesor') and (idAsignatura='$idAsignatura')";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL1);
$fila = mysqli_fetch_array($datos);
if(!$fila){
    echo '<script>
      alert("Operació fallida. Esa asignatura no está en el perfil del profesor seleccionado.");'.'history.back()
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}
$selectSQL2 = "SELECT * FROM asignaturas WHERE (idAsignatura='$idAsignatura')";
$datos2 = mysqli_query ($con, $selectSQL2);
$fila2 = mysqli_fetch_array($datos2);
$curso1 = $fila["cuso"];

$selectSQL3 = "SELECT * FROM grupos WHERE (idGrupo='$idGrupo')";
$datos3 = mysqli_query ($con, $selectSQL3);
$fila3 = mysqli_fetch_array($datos3);
$curso2 = $fila["cuso"];
echo $curso2;
$sentencia=
mysqli_query($con, "insert into profesor_grupo_asignatura values('$idProfesor', '$idGrupo', '$idAsignatura')");
mysqli_close($con);
echo '<script>
      alert("Registro guardado con éxito.");'.'history.back()
    </script>';

    exit;
?>
</html>

