<html>
<?php
session_start();
//credenciales de acceso a la base datos

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'SBDCE';

// conexion a la base de datos

$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {

    // si se encuentra error en la conexión

    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

$idAlumno = $_POST["numero"];
$idAsignatura = $_POST["idAsignatura"];
$evaluacion=

$selectSQL = "SELECT idAlumno FROM alumnos WHERE (idAlumno='$idAlumno')";
  // Ejecuta la sentencia
$datos = mysqli_query ($conexion, $selectSQL);
$fila = mysqli_fetch_array($datos);
if($fila){
    echo "Lo siento, ese nº de matricula ya existe";
    exit; # Salir para no ejecutar el siguiente código
}
# Si no existe, se ejecuta esta parte
$sentencia= mysqli_query($conexion, "insert into alumnos values('$idAlumno', '$nombre', '$apellidos','$curso', '$fecha', '$tutor',"
        . "'$telefono', '$repite', '$arrastre')");
mysqli_close($conexion);
    header('Location: inicio.php');
?>
</html>
