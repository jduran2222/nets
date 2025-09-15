
<link rel="stylesheet" href="css/custom2.css">
<?php require('config.php'); 
$idAlumno = $_POST["idAlumno"];
$idAsignatura = $_POST["idAsignatura"];
$idPrueba = $_POST["idPrueba"];
$nota=$_POST["nota"];

$selectSQL = "SELECT * FROM notas2 WHERE (idAlumno='$idAlumno') and (idAsignatura = '$idAsignatura') and (idPrueba = '$idPrueba')";
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

if(!$fila){
$sentencia=
mysqli_query($con, "insert into notas2 (idAlumno, idAsignatura, idPrueba,  nota) values ('$idAlumno', '$idAsignatura', '$idPrueba', '$nota')");

$selectSQL1 = "SELECT * FROM notas WHERE (idAlumno='$idAlumno') and (idAsignatura = '$idAsignatura')";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL1);
$fila = mysqli_fetch_array($datos);
if(!$fila){
    if($idPrueba == 'TR10'){
    mysqli_query($con, "insert into notas (idAlumno, idAsignatura, TR10) values ('$idAlumno', '$idAsignatura', '$nota')");
    }elseif($idPrueba == 'TR01'){
    mysqli_query($con, "insert into notas (idAlumno, idAsignatura, TR01) values ('$idAlumno', '$idAsignatura', '$nota')");   
    }elseif($idPrueba == 'TR20'){
    mysqli_query($con, "insert into notas (idAlumno, idAsignatura, TR20) values ('$idAlumno', '$idAsignatura', '$nota')"); 
    }elseif($idPrueba == 'TR02'){
    mysqli_query($con, "insert into notas (idAlumno, idAsignatura, TR02) values ('$idAlumno', '$idAsignatura', '$nota')"); 
    }elseif($idPrueba == 'TR30'){
    mysqli_query($con, "insert into notas (idAlumno, idAsignatura, TR30) values ('$idAlumno', '$idAsignatura', '$nota')"); 
    }elseif($idPrueba == 'TR03'){
    mysqli_query($con, "insert into notas (idAlumno, idAsignatura, TR03) values ('$idAlumno', '$idAsignatura', '$nota')"); 
    }elseif($idPrueba == 'TR40'){
    mysqli_query($con, "insert into notas (idAlumno, idAsignatura, TR40) values ('$idAlumno', '$idAsignatura', '$nota')");  
    
    } 
  mysqli_close($con);
echo '<script>
      alert("Registro guardado con éxito.");'.'history.back()
    </script>';
    exit;      
}elseif($fila){
   if($idPrueba == 'TR10'){
    mysqli_query($con, "update notas SET TR10 = '$nota' where (idAsignatura = '$idAsignatura') and (idAlumno='$idAlumno')");
    }elseif($idPrueba == 'TR01'){
    mysqli_query($con, "update notas SET TR01 = '$nota' where (idAsignatura = '$idAsignatura') and (idAlumno='$idAlumno')");
    }elseif($idPrueba == 'TR20'){
    mysqli_query($con, "update notas SET TR20 = '$nota' where (idAsignatura = '$idAsignatura') and (idAlumno='$idAlumno')");    
    }elseif($idPrueba == 'TR02'){
    mysqli_query($con, "update notas SET TR02 = '$nota' where (idAsignatura = '$idAsignatura') and (idAlumno='$idAlumno')");   
    }elseif($idPrueba == 'TR30'){
    mysqli_query($con, "update notas SET TR30 = '$nota' where (idAsignatura = '$idAsignatura') and (idAlumno='$idAlumno')");    
    }elseif($idPrueba == 'TR03'){
    mysqli_query($con, "update notas SET TR03 = '$nota' where (idAsignatura = '$idAsignatura') and (idAlumno='$idAlumno')");    
    }elseif($idPrueba == 'TR40'){
    mysqli_query($con, "update notas SET TR40 = '$nota' where (idAsignatura = '$idAsignatura') and (idAlumno='$idAlumno')");    
    } 
mysqli_close($con);
echo '<script>
      alert("Registro guardado con éxito.");'.'history.back()
    </script>';
    exit;    
}   
}
