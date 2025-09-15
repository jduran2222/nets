<?php
	if (empty($_POST['idAsignatura'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
        elseif (!empty($_POST['idAsignatura'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
        $idAsignatura = mysqli_real_escape_string($con,(strip_tags($_POST["idAsignatura"],ENT_QUOTES)));
	$curso = mysqli_real_escape_string($con,(strip_tags($_POST["curso"],ENT_QUOTES)));
	$asignatura = mysqli_real_escape_string($con,(strip_tags($_POST["asignatura"],ENT_QUOTES)));
	$estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
	
	
 $selectSQL = "SELECT idAsignatura FROM asignaturas WHERE (idAsignatura='$idAsignatura')";
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
    $sql = "INSERT INTO asignaturas(idAsignatura, curso, asignatura, estado) VALUES ('$idAsignatura','$curso','$asignatura', '$estado')";
        $query = mysqli_query($con,$sql);
        // if product has been added successfully
        if ($query) {
            echo '<script>
                alert("Registro guardado con éxito.");
            </script>';
            exit;    
        } 
        
    }
		
