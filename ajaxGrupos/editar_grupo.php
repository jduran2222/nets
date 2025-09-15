
<?php
	if(empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif(!empty($_POST['edit_id'])){
	require_once ("../config.php");
        
        $idGrupo = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
        $titulo = mysqli_real_escape_string($con,(strip_tags($_POST["edit_titulo"],ENT_QUOTES)));
	$curso = mysqli_real_escape_string($con,(strip_tags($_POST["edit_curso"],ENT_QUOTES)));	
        $tutor = mysqli_real_escape_string($con,(strip_tags($_POST["edit_tutor"],ENT_QUOTES)));
        $capacidad = mysqli_real_escape_string($con,(strip_tags($_POST["edit_capacidad"],ENT_QUOTES)));
		
        $sql = "UPDATE grupos SET grupo='".$titulo."', curso='".$curso."', tutor='".$tutor."',  capacidad='".$capacidad."' WHERE idGrupo='".$idGrupo."'";
        $query = mysqli_query($con,$sql);
    
    if ($query) {
        echo '<script>
                alert("Registro actualizado.");
            </script>';
            exit;    
        } 
        
    }

