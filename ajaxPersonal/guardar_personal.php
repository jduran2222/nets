<?php
	if (empty($_POST['idPersonal'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['idPersonal'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
        $idPersonal = mysqli_real_escape_string($con,(strip_tags($_POST["idPersonal"],ENT_QUOTES)));   
        $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES))); 
        $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
        $puesto = mysqli_real_escape_string($con,(strip_tags($_POST["puesto"],ENT_QUOTES)));       	
	// UPDATE data into database
    $sql = "INSERT INTO personal(idPersonal, nombre, apellidos, telefono, puesto) VALUES ('$idPersonal', '$nombre', '$apellidos', '$telefono', '$puesto')";   
    $query = mysqli_query($con,$sql);
    
    mysqli_close($con);
    // if product has been added successfully
    if ($query) {
        if ($query) {
    echo '<script>
        alert("Registro guardado.");
    </script>';
    exit;    
    }    
  }
  }