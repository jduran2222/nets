
<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../config.php");
        $idAlumno = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
        $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nombre"],ENT_QUOTES)));
	$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["edit_apellidos"],ENT_QUOTES)));	
        $nacimiento = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nacimiento"],ENT_QUOTES)));
        $tutor = mysqli_real_escape_string($con,(strip_tags($_POST["edit_tutor"],ENT_QUOTES)));
        $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["edit_telefono"],ENT_QUOTES)));
		
        $sql = "UPDATE alumnos SET nombre='$nombre', apellidos='$apellidos', fecha_nacimiento='$nacimiento',  tutor='$tutor', telefono='$telefono'  WHERE idAlumno='$idAlumno' ";
        $query = mysqli_query($con,$sql);
    
        if ($query) {
            echo '<script>
                alert("Registro actualizado.");
            </script>';
            exit;    
        } 
        
    }
    