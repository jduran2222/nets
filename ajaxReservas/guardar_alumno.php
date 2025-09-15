
<?php
	if (empty($_POST['idAlumno'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['idAlumno'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
        $idAlumno = mysqli_real_escape_string($con,(strip_tags($_POST["idAlumno"],ENT_QUOTES)));
        $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));
	$curso = mysqli_real_escape_string($con,(strip_tags($_POST["curso"],ENT_QUOTES)));
        $nacimiento = mysqli_real_escape_string($con,(strip_tags($_POST["nacimiento"],ENT_QUOTES)));
        $tutor = mysqli_real_escape_string($con,(strip_tags($_POST["tutor"],ENT_QUOTES)));
        $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
        $concepto = "Formalización Matricula";
        $descripcion = "Matricula de una reserva";
        $importe = mysqli_real_escape_string($con,(strip_tags($_POST["importe"],ENT_QUOTES)));
    
        
    $selectSQL = "SELECT idAlumno FROM alumnos WHERE (idAlumno='$idAlumno')";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL);
$fila = mysqli_fetch_array($datos);

if($fila){
    echo '<script>
      alert("Operación fallida por duplicidad de código.");
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}    
        
	// UPDATE data into database
    $sql = "INSERT INTO alumnos(idAlumno, nombre, apellidos, curso, fecha_nacimiento, tutor, telefono) VALUES ('$idAlumno', '$nombre', '$apellidos', '$curso', '$nacimiento', '$tutor', '$telefono')";   
    $query = mysqli_query($con,$sql);
    $sentencia=
    mysqli_query($con, "insert into registro_pagos(fecha, concepto, descripcion, alumno, monto) values(NOW(), '$concepto', '$descripcion', '$idAlumno', '-$importe')");
    $sentencia2 =
    mysqli_query($con, "DELETE FROM  reservas WHERE idAlumno='$idAlumno'");
    mysqli_close($con);
    // if product has been added successfully
    if ($query) {
        echo '<script>
            alert("Registro guardado.");
        </script>';
        exit;         
    }
       
    }     

