<html>
<?php
session_start();
include("../config.php");
$idProfesor = $_SESSION["profesor"];
$usuario = $_SESSION["usuario"];
$idAsignatura = $_SESSION['asignatura'];
$idCurso = $_SESSION['curso'];
$idGrupo = $_POST["grupo"];

$selectSQL2 = "SELECT * FROM asignaturagrupoprofesor WHERE ((idAsignatura='$idAsignatura')and (idGrupo='$idGrupo') and (idProfesor = '$idProfesor'))";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL2);
$fila = mysqli_fetch_array($datos);
if($fila){
    echo '<script>
      alert("Operación fallida. Ese registro ya existe.");'.'history.back()
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}
$sql= "insert into asignaturagrupoprofesor(idAsignatura, idGrupo, idProfesor)values('$idAsignatura', '$idGrupo', $idProfesor)";
$query = mysqli_query($con, $sql);
if($query){
    mysqli_close($con);
    echo '<script>
      alert("Registro guardado con éxito.");
    </script>';
    exit;
}
?>
</html>
