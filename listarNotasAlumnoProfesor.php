<?php
	$selectSQL = "SELECT * from pruebas where activada = 1";		
	$datos = mysqli_query ($con, $selectSQL);
            if (!($datos->num_rows > 0)) {  
            echo '<script>
                alert("No hay ninguna prueba activada");'.'history.back()
                  </script>';
             exit;
                }  
        $fila = mysqli_fetch_array($datos);

        $selectSQL1 = "SELECT asignaturas.idAsignatura, 
                asignaturas.Asignatura as Asignatura, nota,
                CASE 
                    WHEN nota = 10 THEN 'Matricula de Honor'
                    WHEN nota >=7 THEN 'Sobresaliente'
                    WHEN nota >=5 THEN 'Aprobado'
                    ELSE 'Suspenso'
                END AS calificacion
                from asignaturas, notas2, asignaturagrupoprofesor, pruebas where (asignaturas.idAsignatura = notas2.idAsignatura)and 
                (notas2.idAlumno = '$idAlumno')and (pruebas.idPrueba = notas2.idPrueba)"
                . " and (pruebas.activada = 1) and (asignaturas.idProfesor = asignaturagrupoprofesor.idProfesor)"
                . "and (asignaturas.idAsignatura = asignaturagrupoprofesor.idAsignatura)"
                . "and (idProfesor = $idProfesor)";	
                $datos1 = mysqli_query ($con, $selectSQL1);
                if (!($datos1->num_rows > 0)) {  
                echo '<script>
                        alert("No hay notas para la prueba seleccionada");'.'history.back()
                      </script>';
                exit;
                }         
            ?>

    
   <div class="container">
        <div class ="table table-responsive">    
            <table class ="table table-bordered" style = "white-space: nowrap">
                
                <thead>
                    <tr class = "bg-info">
                        <th>Alumno:</th>
                        <th>Evaluación:</th> 
                        <th>Curso:</th> 
                        <th>Grupo:</th> 
                    </tr>
                </thead>
            
                <tbody>
                    <tr>
                        <td><?php echo $nombre; ?> <?php echo $apellidos; ?></td>
                        <td><?php echo $fila["prueba"]; ?></td>
                        <td><?php echo $curso; ?></td> 
                        <td><?php echo $grupo; ?></td>
                    </tr>
                </tbody>    
            </table>        
        
            
		<table id="tabladatos" class ="table table-bordered table-striped" style = "white-space: nowrap">
                    <thead>
			<tr>
			  <th>Asignatura</th>
                          <th style="text-align: right">Nota</th>
                          <th>Calificación</th>
			</tr>
                    </thead>        
                <?php
                 while ($fila1 = mysqli_fetch_array($datos1))
                { ?>
                <tr>
                    <td><?php echo $fila1['Asignatura']; ?></td>
                    <td style="text-align: right"><?php echo $fila1['nota']; ?></td>
                    <td><?php echo $fila1['calificacion']; ?></td>
                <?php } ?>
		</table>
	<?php
		mysqli_close($con);
	?>
    </div>
