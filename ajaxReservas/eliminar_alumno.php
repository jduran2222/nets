<?php
	if (empty($_POST['delete_id'])){
		$errors[] = "Id vacío.";
	} elseif (!empty($_POST['delete_id'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $idAlumno=intval($_POST['delete_id']);
  		
$result = "DELETE FROM  reservas WHERE idAlumno='$idAlumno'";
$query = mysqli_query($con,$result);
  if ($query) {
    echo '<script>
        alert("Registro eliminado.");
    </script>';
    exit;    
    }     
}

