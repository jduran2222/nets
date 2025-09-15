<?php  

    $tutor = $_SESSION["tutor"];
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.html');
      exit;
    }
    $selectSQL2 = "SELECT * from asignaturagrupoprofesor, profesores where (profesores.idProfesor) = (asignaturagrupoprofesor.idProfesor) and (idAsignatura = '$idAsignatura') and (idGrupo = '$idGrupo')";		
    $datos2 = mysqli_query($con, $selectSQL2);          
    $fila2 = mysqli_fetch_array($datos2);
    $profesor = $fila2["nombre"];
    $apellidos = $fila2["apellidos"];
    	    
        if (!($datos2->num_rows > 0)) {  
            echo '<script>
              alert("No hay profesor en ese grupo para esa asignatura");'.'history.back()
                  </script>';
            exit;
        }     
    $selectSQL1 = "SELECT * from pruebas where activada = 1";		
    $datos1 = mysqli_query ($con, $selectSQL1);         
    $fila = mysqli_fetch_array($datos1)
?>

<!DOCTYPE htmlo88

 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestión de Notas de Alumnos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/custom2.css">
    
   <div class="container">
        <div class ="table table-responsive">    
            <table class ="table table-bordered" style = "white-space: nowrap">
                
                <thead>
                    <tr class = "bg-info">
                        <th>Asignatura:</th>
                        <th>Evaluación:</th> 
                        <th>Profesor Examinador:</th> 
                        <th>Curso:</th> 
                        <th>Grupo:</th> 
                    </tr>
                </thead>
            
                <tbody>
                    <tr>
                        <td><?php echo $idAsignatura; ?></td>
                        <td><?php echo $fila["prueba"]; ?></td>
                        <td><?php echo $profesor." "; ?><?php echo $apellidos; ?></td> 
                        <td><?php echo $curso; ?></td> 
                        <td><?php echo $idGrupo; ?></td>
                    </tr>
                </tbody>    
            </table>        
        
            <?php
                $selectSQL = "SELECT alumnos.nombre, alumnos.apellidos, nota,
                CASE 
                    WHEN nota = 10 THEN 'Matricula de Honor'
                    WHEN nota >=7 THEN 'Sobresaliente'
                    WHEN nota >=5 THEN 'Aprobado'
                    ELSE 'Suspenso'
                END AS calificacion
                from alumnos, notas2, pruebas, alumnos_grupo where (alumnos.idAlumno = notas2.idAlumno) and (alumnos_grupo.idAlumno = alumnos.idAlumno) and
                (notas2.idAsignatura = '$idAsignatura')and (pruebas.idPrueba = notas2.idPrueba)and(pruebas.activada = 1) and (alumnos_grupo.idGrupo = '$idGrupo')";	
                $datos = mysqli_query ($con, $selectSQL);
                if (!($datos->num_rows > 0)) {  
                echo '<script>
                        alert("No hay notas para la prueba seleccionada");'.'history.back()
                      </script>';
                exit;
                }         
            ?>
		<table id="tabladatos" class ="table table-bordered table-striped" style = "white-space: nowrap">
                    <thead>
			<tr>
			  <th>Nombre</th>
                          <th>Apellidos</th>
                          <th style="text-align: center">Nota</th>
                          <th>Calificación</th>
			</tr>
                    </thead>        
                <?php
                 while ($fila = mysqli_fetch_array($datos))
                { ?>
                <tr>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['apellidos']; ?></td>
                    <td style="text-align: center"><?php echo $fila['nota']; ?></td>
                    <td><?php echo $fila['calificacion']; ?></td>
                <?php } ?>
		</table>
	<?php
		mysqli_close($con);
	?>
    </div>
       
 

