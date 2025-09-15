
<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../config.php");
	
    $idUsuario = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
    $usuario = mysqli_real_escape_string($con,(strip_tags($_POST["edit_usuario"],ENT_QUOTES)));
    $password = mysqli_real_escape_string($con,(strip_tags($_POST["edit_password"],ENT_QUOTES)));
    $email = mysqli_real_escape_string($con,(strip_tags($_POST["edit_email"],ENT_QUOTES)));
    $perfil = mysqli_real_escape_string($con,(strip_tags($_POST["edit_perfil"],ENT_QUOTES)));	
    
    $sql = "UPDATE usuarios SET usuario='".$usuario."', password='".$password."', email='".$email."',  perfil='".$perfil."' WHERE idUsuario='".$idUsuario."' ";
    $query = mysqli_query($con,$sql);
  
    if ($query) {
        echo '<script>
                alert("Registro actualizado.");
            </script>';
            exit;    
        } 
        
    }
    