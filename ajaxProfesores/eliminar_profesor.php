
<?php
	if (empty($_POST['delete_id'])){
		$errors[] = "Id vacío.";
	} elseif (!empty($_POST['delete_id'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $idProfesor=$_POST['delete_id'];
	
$result1 = $con->query(
    "SELECT * FROM perfilprofesores where idProfesor = '$idProfesor'"
);

if ($result1->num_rows > 0) { 
    echo '<script>
      alert("Ese profesor ya tiene un perfil de asignaturas registrado.");
    </script>';
    exit;
 }  	
 
$result2 = $con->query(
    "SELECT * FROM asignaturagrupoprofesor where idProfesor = '$idProfesor'"
);

if ($result2->num_rows > 0) { 
    echo '<script>
      alert("Ese profesor ya tiene asignaciones en algún grupo.");
    </script>';
    exit;
 }  	
 
	// DELETE FROM  database
$result3 = "DELETE FROM  profesores WHERE idProfesor='$idProfesor'";
$query = mysqli_query($con,$result3);
  if ($query) {
    echo '<script>
        alert("Registro eliminado.");
    </script>';
    exit;    
    }     
}
 