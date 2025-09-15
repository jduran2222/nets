<html>
<?php
session_start();
include("config.php");
$idGrupo = $_SESSION["idGrupo"];
$idAlumno = $_POST["alumno"];
$capacidad = $_SESSION["capacidad"];

$sql = "select count(idAlumno) as asignados from alumnos_grupo where idGrupo = '$idGrupo'";
$datos = mysqli_query($con,$sql);
$row = mysqli_fetch_array($datos);
$numero = $row['asignados'];
        
if($numero >= $capacidad){
    echo '<script>
      alert("Operación fallida. No hay plaza en ese grupo");'.'history.back()
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


