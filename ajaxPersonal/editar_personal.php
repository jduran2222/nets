
<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
        $idPersonal = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
        $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nombre"],ENT_QUOTES)));
	$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["edit_apellidos"],ENT_QUOTES)));
        $puesto = mysqli_real_escape_string($con,(strip_tags($_POST["edit_puesto"],ENT_QUOTES)));
        $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["edit_telefono"],ENT_QUOTES)));
	
        $sql = "UPDATE personal SET nombre='".$nombre."', apellidos='".$apellidos."', puesto='".$puesto."', telefono='".$telefono."'  WHERE idPersonal='".$idPersonal."' ";
        $query = mysqli_query($con,$sql);
    
        if ($query) {
            echo '<script>
                alert("Registro actualizado.");
            </script>';
            exit;    
        } 
        
    }
    