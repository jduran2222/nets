
<?php
	if (empty($_POST['delete_id'])){
		$errors[] = "Id vacío.";
	} elseif (!empty($_POST['delete_id'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $idPersonal=$_POST['delete_id'];
			
$result = "DELETE FROM  personal WHERE idPersonal='$idPersonal'";
$query = mysqli_query($con,$result);
  if ($query) {
    echo '<script>
        alert("Registro eliminado.");
    </script>';
    exit;    
    } 
    echo '<script>
        alert("No se ha podido eliminar el registro.");
    </script>';
    exit;
}
 