<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        $descripcion = "Matricula directa";
        $importe = mysqli_real_escape_string($con,(strip_tags($_POST["importe"],ENT_QUOTES)));
    
        $sql1 = "select sum(capacidad) as capacidad_curso from grupos where curso = '$curso'";
        $query1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_array($query1);
        $capacidad_curso = $row1["capacidad_curso"];
        
        $sql2 = "select count(*) as matriculados_curso from alumnos where curso = '$curso'";
        $query2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_array($query2);
        $matriculados_curso = $row2["matriculados_curso"];
        
        $sql3 = "select count(*) as reservados_curso from reservas where curso = '$curso'";
        $query3 = mysqli_query($con,$sql3);
        $row3 = mysqli_fetch_array($query3);
        $reservados_curso = $row3["reservados_curso"];
        
        if($matriculados_curso + $reservados_curso >= $capacidad_curso){
            echo '<script>
            alert("No hay plaza vacante. Anule una reserva, cree un nuevo grupo o amplíe la capacidad de uno existente.");
        </script>';
        exit;
        }
        
    $selectSQL = "SELECT idAlumno FROM alumnos WHERE (idAlumno='$idAlumno')";
  // Ejecuta la sentencia
$datos = mysqli_query ($con, $selectSQL);
$fila = mysqli_fetch_array($datos);

if($fila){
    echo '<script>
      alert("Hay un alumno matriculado con ese código.");
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}    
   
$selectSQL2 = "SELECT idAlumno FROM reservas WHERE (idAlumno='$idAlumno')";
  // Ejecuta la sentencia
$datos2 = mysqli_query ($con, $selectSQL2);
$fila2 = mysqli_fetch_array($datos2);

if($fila2){
    echo '<script>
      alert("Hay un alumno en reserva con ese código. Se anula la operación");
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
}    

	// UPDATE data into database
    $sql = "INSERT INTO alumnos(idAlumno, nombre, apellidos, curso, fecha_nacimiento, tutor, telefono) VALUES ('$idAlumno', '$nombre', '$apellidos', '$curso', '$nacimiento', '$tutor', '$telefono')";   
    $query = mysqli_query($con,$sql);
    $sql4 = "INSERT INTO registro_pagos(fecha, concepto, descripcion, alumno, monto) VALUES (NOW(), '$concepto', '$descripcion', '$idAlumno', '-$importe')";   
    $query4 = mysqli_query($con,$sql4);
    mysqli_close($con);
    // if product has been added successfully
    if ($query) {
        echo '<script>
                alert("Registro guardado con éxito.");
            </script>';
            exit;  
    }    
  }  


