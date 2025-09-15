<?php
    $selectSQL = "SELECT alumnos.idAlumno As nombre, asignaturas.idAsignatura, 
    asignaturas.Asignatura as Asignatura, asignaturas.curso as curso, nota,
       CASE 
          WHEN nota = 10 THEN 'Matricula de Honor'
          WHEN nota >=7 THEN 'Sobresaliente'
          WHEN nota >=5 THEN 'Aprobado'
          ELSE 'Suspenso'
       END AS calificacion
    from alumnos, 
    asignaturas, notas_arrastre where (alumnos.idAlumno = notas_arrastre.idAlumno) and 
    (asignaturas.idAsignatura = notas_arrastre.idAsignatura)and 
    (alumnos.idAlumno = '$idAlumno')";	
    $datos = mysqli_query ($con, $selectSQL);
        if (!($datos->num_rows > 0)) {  
           echo '<script>
                  alert("No hay notas de arrastre registradas");'.'history.back()
                </script>';
            exit;
        }                           
?>
<div class="container">
    <div class ="table table-responsive">
        <table class ="table table-bordered" style =" white-space:nowrap">
               <thead>
                   <tr>
                       <th>Alumno</th>
                       <th>Curso</th>
                       <th>Grupo</th>
                   </tr>
               </thead>
               <tbady>
                   <tr>
                       <td><?php echo $nombre; ?> <?php echo $apellidos; ?></td>
                       <td><?php echo $curso; ?></td>
                       <td><?php echo $grupo; ?></td>
                   </tr>
               </tbady>
        </table> 
	<table id="tabladatos" class="table table-bordered table-striped" style ="white-space: nowrap">
            <thead
		<tr class ="bg-info">
		  <th>Asignatura</th>
                  <th style = "text-align: center">Curso</th>
                  <th>Nota</th>
                  <th>Calificación</th>
                </tr>
            </thead>                
            <?php
                 while ($fila = mysqli_fetch_array($datos)){ ?>
                <tr>
                    <td><?php echo $fila['Asignatura']; ?></td>
                    <td style = "text-align: center"><?php echo $fila['curso']; ?></td>
                    <td><?php echo $fila['nota']; ?></td>
                    <td><?php echo $fila['calificacion']; ?></td>
                </tr>
                 <?php } ?>
	</table>
	<?php
		mysqli_close($con);
	?>
       </div>

