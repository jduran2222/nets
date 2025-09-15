<?php
	if (empty($_POST['idProfesor'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['idProfesor'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
        $idProfesor = mysqli_real_escape_string($con,(strip_tags($_POST["idProfesor"],ENT_QUOTES)));   
        $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));
        
        $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
    
    $selectSQL = "SELECT idProfesor FROM profesores WHERE (idProfesor='$idProfesor')";
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
    $sql = "INSERT INTO profesores(idProfesor, nombre, apellidos, telefono) VALUES ('$idProfesor', '$nombre', '$apellidos', '$telefono')";   
    $query = mysqli_query($con,$sql);
    
    mysqli_close($con);
    // if product has been added successfully
    if ($query) {    
        echo '<script>
            alert("Registro guardado.");
        </script>';
        exit;         
    }
  }