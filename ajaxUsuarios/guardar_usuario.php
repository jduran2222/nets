<?php
    if (empty($_POST['idUsuario'])){
		$errors[] = "id Vacío";
    } elseif (!empty($_POST['idUsuario'])){
    require_once ("../config.php");
	
    $idUsuario = mysqli_real_escape_string($con,(strip_tags($_POST["idUsuario"],ENT_QUOTES)));
    $usuario = mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));
    $password = mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)));
    $email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
    $perfil = mysqli_real_escape_string($con,(strip_tags($_POST["perfil"],ENT_QUOTES)));
    
    $sql1 = "SELECT idUsuario FROM usuarios WHERE (idUsuario='$idUsuario')";
    
    $datos1 = mysqli_query ($con, $sql1);
    $fila1 = mysqli_fetch_array($datos1);

    if($fila1){
    echo '<script>
      alert("Ese código de usuario ya existe.");
    </script>';
    exit;
    }    
    
    $sql2 = "SELECT usuario FROM usuarios WHERE (usuario='$usuario')";
    $datos2 = mysqli_query ($con, $sql2);
    $fila2 = mysqli_fetch_array($datos2);

    if($fila2){
    echo '<script>
      alert("Ese usuario ya existe.");
    </script>';
    exit;
    }  
    
    $sql3 = "SELECT password FROM usuarios WHERE (password='$password')";
    
    $datos3 = mysqli_query ($con, $sql3);
    $fila3 = mysqli_fetch_array($datos3);

    if($fila3){
    echo '<script>
      alert("Ese password ya existe.");
    </script>';
    exit;
    }  
    
    $sql = "INSERT INTO usuarios(idUsuario, usuario, password, email, perfil) VALUES ('$idUsuario', '$usuario', '$password', '$email', '$perfil')";
    $query = mysqli_query($con,$sql);
    mysqli_close($con);
    
    if ($query) {
    echo '<script>
        alert("Registro guardado.");
    </script>';
    exit;    
    }    
  }  
    
    