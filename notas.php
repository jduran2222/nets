<html>
<?php  require('config.php'); 
// confirmar sesion
session_start();
$clave = $_GET['clave'];
$nombre = $_GET['nombre']; 
$curso = $_GET['curso']; 
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de Gestión de Centros Escolares</title>
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
<script type="text/javascript">   
   $(document).ready( function () {
    $('#tabladatos').DataTable();
} );
</script>
</head>
<body Style="background-color: #f4f1ed">
   <div class="container">
    <div class="row">
        <div id="header" class="col-lg-12">
            <h1>BOLETIN ESCOLAR</h1>
        </div>
    </div>
    <div class="row">
        <div id="content" class="col-lg-12">

    <div>
    <nav>
        <ul>
           <li>Nombre: <?php echo $nombre ?></li>
           <li>Curso : <?php echo $curso ?></li>
        </ul>
    </nav>
        <section id="seccion">
<?php
	$selectSQL = "SELECT alumnos.idAlumno As nombre, asignaturas.idAsignatura, 
	asignaturas.asignatura as Asignatura, TR01, TR10, TR02, TR20, TR03, TR30, TR40 from alumnos, asignaturas, notas 
        where (alumnos.idAlumno = notas.idAlumno) and (asignaturas.idAsignatura = notas.idAsignatura)
        and (alumnos.idAlumno = $clave) and (alumnos.curso=asignaturas.curso)";
  		
	$datos = mysqli_query ($con, $selectSQL);
       if (!($datos->num_rows > 0)) {  
            echo '<script>
                    alert("No hay notas registradas para ese alumno");'.'history.back()
                  </script>';
             exit;
                }             
?>
      
		<table id="tabladatos" class="table">
			<tr>
			  <th rowspan="2" align="left">Asignatura</th>
			  <th colspan="2">1ºTrimestre</th>
			  <th colspan="2">2ºTrimestre</th>
			  <th colspan="2">3ºTrimestre</th>
                         
			  <th rowspan="2">Septiembre</th> 	
			</tr>
                        
                        <tr>
                            <th>Ordinaria</th>
                            <th>Recup.</th>
                            <th>Ordinaria</th>
                            <th>Recup.</th>
                            <th>Ordinaria</th>
                            <th>Recup.</th>
                        </tr>
    
        <?php

        while ($fila = mysqli_fetch_array($datos))
 {
	echo '<tr align="center">';
        echo '<td align="left">'.$fila['Asignatura'].'</td>';
        echo '<td align="left">'.$fila['TR10'].'</td>';
        echo '<td align="left">'.$fila['TR01'].'</td>';
        echo '<td align="left">'.$fila['TR20'].'</td>';
        echo '<td align="left">'.$fila['TR02'].'</td>';
        echo '<td align="left">'.$fila['TR30'].'</td>';
        echo '<td align="left">'.$fila['TR03'].'</td>';
        echo '<td align="left">'.$fila['TR40'].'</td>';
            
            }    
           
	echo '</tr>';

?>
	</table>
	<?php
		mysqli_close($con);
	?>
    
</section>
</div>
</body>
</html>

