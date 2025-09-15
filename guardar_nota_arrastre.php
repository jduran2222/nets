<?php require('config.php'); 
$idAlumno = $_POST["idAlumno"];
$idAsignatura = $_POST["idAsignatura"];

$nota=$_POST["nota"];

$selectSQL = "SELECT * FROM notas_arrastre WHERE (idAlumno='$idAlumno') and (idAsignatura = '$idAsignatura')";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL);
$fila = mysqli_fetch_array($datos);
if($fila){
    echo '<script>
      alert("Esa nota ya existe.");'.'history.back()
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}

$sentencia=
mysqli_query($con, "insert into notas_arrastre (idAlumno, idAsignatura, nota) values ('$idAlumno', '$idAsignatura', '$nota')");
mysqli_close($con);
echo '<script>
      alert("Registro guardado con éxito.");'.'history.back()
    </script>';
    exit;
?>



