<html>
<?php
session_start();
include("config.php");
$usuario = $_POST["idUsuario"];
$codigo = $_POST["codigoId"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email=$_POST["correo_electronico"];
$password=$_POST["password"];
$perfil=$_POST["perfil"]; 

$selectSQL = "SELECT idUsuario FROM usuarios WHERE (idUsuario='$usuario')";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL);
$fila = mysqli_fetch_array($datos);
if($fila){
    echo '<script>
      alert("Código de Usuario duplicado. Elija otro código.");'.'history.back()
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}

$sentencia=
mysqli_query($con, "insert into usuarios(idUsuario, nombre, apellidos, email, password, perfil) values('$usuario', '$nombre', '$apellidos', '$email', '$password', '$perfil')");

if($perfil =="profesor"){
mysqli_query($con, "Update profesores set usuario = '$usuario' where idProfesor = '$codigo')");
}else if($perfil =="Alumno"){
mysqli_query($con, "Update alumnos set usuario = '$usuario' where idAlumno = '$codigo')");
}
mysqli_close($con);
echo '<script>
      alert("Registro guardado con éxito.");'.'history.back()
    </script>';
    exit;//
?>
</html>

