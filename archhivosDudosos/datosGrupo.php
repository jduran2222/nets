<html>
<?php
session_start();
include("config.php");
$idGrupo = $_POST["idGrupo"];
$grupo = $_POST["grupo"];
$idCurso=$_POST["idCurso"];
$tutor = $_POST["tutor"];
$capacidad = $_POST["capacidad"];

   
$selectSQL = "SELECT idGrupo FROM grupos WHERE (idGrupo='$idGrupo')";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL);
$fila = mysqli_fetch_array($datos);
if($fila){
    echo '<script>
      alert("Operación fallida por duplicidad de código.");'.'history.back()
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}
# Si no existe, se ejecuta esta parte
$sentencia=
mysqli_query($con, "insert into grupos(idGrupo, grupo, idCurso, tutor, capacidad) values('$idGrupo', '$grupo', '$idCurso', '$tutor', '$capacidad')");
mysqli_close($con);
echo '<script>
      alert("Registro guardado con éxito.");'.'history.back()
    </script>';
    exit;
?>
</html>