<?php
    if (empty($_POST['idGrupo'])){
	$errors[] = "ID está vacío.";
    } elseif (!empty($_POST['idGrupo'])){
    require_once ("../config.php");//Contiene funcion que conecta a la base de datos
// escaping, additionally removing everything that could be (html/javascript-) code
    $idGrupo = mysqli_real_escape_string($con,(strip_tags($_POST["idGrupo"],ENT_QUOTES)));
    $grupo = mysqli_real_escape_string($con,(strip_tags($_POST["grupo"],ENT_QUOTES)));	
    $curso = mysqli_real_escape_string($con,(strip_tags($_POST["curso"],ENT_QUOTES)));       
    $tutor = mysqli_real_escape_string($con,(strip_tags($_POST["tutor"],ENT_QUOTES)));
    $capacidad = mysqli_real_escape_string($con,(strip_tags($_POST["capacidad"],ENT_QUOTES)));
        
    $selectSQL = "SELECT idGrupo FROM grupos WHERE (idGrupo='$idGrupo')";
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
    $sql = "INSERT INTO grupos(idGrupo, grupo, curso, tutor, capacidad) VALUES ('$idGrupo', '$grupo', '$curso', '$tutor', '$capacidad')";   
    $query = mysqli_query($con,$sql);
    if ($query) {
    echo '<script>
        alert("Registro guardado.");
    </script>';
    exit;    
    }    
  }  
