
<?php
	if (empty($_POST['delete_id'])){
		$errors[] = "Id vacío.";
	} elseif (!empty($_POST['delete_id'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $idGrupo=$_POST['delete_id'];
	
$result1 = $con->query(
    "SELECT * FROM alumnos_grupo where idGrupo = '$idGrupo'"
);

if ($result1->num_rows > 0) { 
    echo '<script>
      alert("Ese grupo no está vacío.");
    </script>';
    exit;
 }  	
 
$result2 = $con->query(
    "SELECT * FROM asignaturagrupoprofesor where idGrupo = '$idGrupo'"
);

if ($result2->num_rows > 0) { 
    echo '<script>
      alert("Ese grupo ya tiene algún profesor asignado.");
    </script>';
    exit;
 }  	
 
	// DELETE FROM  database
$result3 = "DELETE FROM  grupos WHERE idGrupo='$idGrupo'";
$query = mysqli_query($con,$result3);
  if ($query) {
    echo '<script>
        alert("Registro eliminado.");
    </script>';
    exit;    
    }     
} 
