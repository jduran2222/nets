
<?php
    if (empty($_POST['delete_id'])){
	$errors[] = "Id vacío.";
    } elseif (!empty($_POST['delete_id'])){
    require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $idUsuario=$_POST['delete_id'];
	
 
	// DELETE FROM  database
    $sql = "DELETE FROM  usuarios WHERE idUsuario='$idUsuario'";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        echo '<script>
        alert("Registro eliminado.");
    </script>';
    exit;    
    }     
}