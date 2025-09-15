<html>
<?php
session_start();
include("config.php");
$idGrupo = $_SESSION["idGrupo"];
$idAlumno = $_POST["alumno"];
$capacidad = $_SESSION["capacidad"];

$selectSQL1 = "SELECT * FROM grupos where idGrupo = '$idGrupo'";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL1);
$numero = mysqli_num_rows($datos);
if($numero == $capacidad){
    echo '<script>
      alert("Operació fallida. Se ha llenado el grupo");'.'history.back()
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}
# Si no existe, se ejecuta esta parte
$sentencia=
mysqli_query($con, "insert into alumnos_grupo(idAlumno, idGrupo)values('$idAlumno', '$idGrupo')");
mysqli_close($con);
echo '<script>
      alert("Registro guardado con éxito.");'.'history.back()
    </script>';
    exit;
?>
</html>


