<html>
<?php  require('config.php'); 
// confirmar sesion
session_start();
$clave = $_GET['clave'];

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Datatable jQuery plugin ejemplo de Jose Aguilar</title>
<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
</head>
<body>
    <div id="dialogo" title="Mensaje"  style="display:none;">
        <p>>/p>
    </div>
<?php
$result3 = $con->query(
    "SELECT * FROM alumnos_grupo where idAlumno = $clave"
);
if ($result3->num_rows > 0) {    
    echo '<script>
      alert("Operación denegada. El alumno ya tiene un grupo asignado.");'.'history.back()
    </script>';
    exit;
 }
$result1 = $con->query(
    "SELECT * FROM notas2 where idAlumno = $clave"
);
if ($result1->num_rows > 0) {  
    echo '<script>
      alert("Operación denegada. El alumno tiene notas registradas.");'.'history.back()
    </script>';
    exit;
 }  
$result2 = $con->query(
    "SELECT * FROM notas_arrastre where idAlumno = $clave"
);
if ($result2->num_rows > 0) { 
    echo '<script>
      alert("Operación denegada. El alumno tiene notas registradas.");'.'history.back()
    </script>';
    exit;
 }  
$result4 = $con->query(
    "SELECT * FROM arrastres where idAlumno = $clave"
);
if ($result4->num_rows > 0) { 
    echo '<script>
      alert("Operación denegada. El alumno arrastra asignaturas de cursos anteriores.");'.'history.back()
    </script>';
    exit;
 } 
 
$result5 = $con->query(
    "SELECT * FROM registro_pagos where idAlumno = $clave"
);
if ($result5->num_rows > 0) { 
    echo '<script>
      alert("Operación denegada. El alumno tiene una cuenta abierta con el Centro.");'.'history.back()
    </script>';
    exit;
 }  
 
$consulta = "DELETE FROM alumnos WHERE idAlumno=$clave";

if(mysqli_query($con, $consulta)){
    echo '<script>
      alert("Registro eliminado.");'.'history.back()
    </script>';
    exit;
 ?>
    <br>
    <a href = "alumnos.php">Volver a la lista de alumnos</a>;
<?php
} else{
    echo "ERROR: No se pudo eliminar registro $consulta. " . mysqli_error($link);
}	
 mysqli_close($con); 
 ?>
</body>
</html>
 