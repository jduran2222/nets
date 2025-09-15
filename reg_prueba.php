<html>
<?php  require('config.php'); 
// confirmar sesion
session_start();
$clave = $_GET['clave'];
$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
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
<script type="text/javascript">   
   $(document).ready( function () {
    $('#tabladatos').DataTable();
} );
</script>
</head>
<body Style="background-color: #f4f1ed"> 
<section id="seccion">
<?php
$selectSQL = "SELECT * from notas2 where idAlumno = $clave";
$datos = mysqli_query ($con, $selectSQL);
       if (!($datos->num_rows > 0)) {  
            echo '<script>
                    alert("No hay notas registradas para ese alumno");'.'history.back()
                  </script>';
             exit;
        }                    
    
        $fila = mysqli_fetch_array($datos)
 ?>       
                    <form name="f1" action="notas2.php" method="post">
                       <input type="hidden" value="<?php echo $fila["idAlumno"] ?>" name="idAlumno">
	               <input type="hidden" value="<?php echo $fila["idAsignatura"] ?>" name="idAsignatura">        
                      <select  name="prueba" id = "prueba" required>
                        <option value="" selected>  Evaluación</option>
                        <option value="TR10">Primera Evaluación</option>
                        <option value="TR01">Recuperación Primera Evaluación</option>
                        <option value="TR20">Segunda Evaluación</option>
                        <option value="TR02">Recuperación Segunda Evaluación</option>
                        <option value="TR30">Tercera Evaluación</option>
                        <option value="TR03">Recuperación Tercera Evaluación</option>
                        <option value="TR40">Extraordinaria Septiembree</option>
                      </select>    
                    <input type="submit" value="Enviar">
                </form> 
               <?php
		mysqli_close($con);
	?>
    
</section>
</div> 
</body>
</html>
