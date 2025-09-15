<?php
    if (empty($_POST['idUsuario'])){
		$errors[] = "id Vacío";
    } elseif (!empty($_POST['idUsuario'])){
    require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $idUsuario = mysqli_real_escape_string($con,(strip_tags($_POST["idUsuario"],ENT_QUOTES)));
    $usuario = mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));
    $password = mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)));
    $email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
    $perfil = mysqli_real_escape_string($con,(strip_tags($_POST["perfil"],ENT_QUOTES)));
    
    $selectSQL1 = "SELECT * FROM usuarios WHERE (idUsuario='$idUsuario')";
    // Ejecuta la sentencia
    $datos1 = mysqli_query ($con, $selectSQL1);
    $fila1 = mysqli_fetch_array($datos1);

    if($fila1){
    echo '<script>
      alert("Ese personal ya se ha registrado como usuario.");
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
    }
    
    $selectSQL2 = "SELECT usuario FROM usuarios WHERE (usuario='$usuario')";
    // Ejecuta la sentencia
    $datos2 = mysqli_query ($con, $selectSQL2);
    $fila2 = mysqli_fetch_array($datos2);

    if($fila2){
    echo '<script>
      alert("Ese usuario ya existe.");
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
    }
    
    $selectSQL3 = "SELECT password FROM usuarios WHERE (password='$password')";
    // Ejecuta la sentencia
    $datos3 = mysqli_query ($con, $selectSQL3);
    $fila3 = mysqli_fetch_array($datos3);

    if($fila3){
    echo '<script>
      alert("Ese password ya existe.");
    </script>';
    exit;
    exit; # Salir para no ejecutar el siguiente código
    }
    
	// REGISTER data into database
    $sql = "INSERT INTO usuarios(idUsuario, usuario, password, email, perfil) VALUES ('$idUsuario', '$usuario', '$password', '$email', '$perfil')";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
            echo '<script>
                alert("Registro guardado con éxito.");
            </script>';
            exit;    
        } 
        
    }  


  
       