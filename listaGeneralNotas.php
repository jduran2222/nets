     
<?php
	$selectSQL = "select idAlumno, idAsignatura, TR10, TR01, TR20, TR02, TR30, TR03, TR40 from notas";	
	$datos = mysqli_query ($con, $selectSQL);
            if (!($datos->num_rows > 0)) {  
            echo '<script>
                alert("No hay notas para la prueba seleccionada");'.'history.back()
                  </script>';
             exit;
                }  

?>
    <div class="container">
     <table id="tabladatos" class ="table table-bordered table-striped" style = "white-space: nowrap">
			<tr>
                          <th>Alumno</th> 
			  <th>Asignatura</th>
                          <th>1ºTrimestre</th>
                          <th>Recuperación</th>
			  <th>2ºTrimestre</th>
                          <th>Recuperación</th>
			  <th>3ºTrimestre</th>
                          <th>Recuperación</th>
			  <th>Septiembre</th> 	
			</tr>
                           
        <?php
                 
                 while ( $fila = mysqli_fetch_array($datos)){
                 ?>
             <tr>
                 <td><?php echo $fila['idAlumno']; ?></td>
                 <td><?php echo $fila['idAsignatura'];?></td>
                 <td><?php echo $fila['TR10']; ?></td>
                 <td><?php echo $fila['TR01']; ?></td>
                 <td><?php echo $fila['TR20']; ?></td>
                 <td><?php echo $fila['TR02']; ?></td>
                 <td><?php echo $fila['TR30']; ?></td>
                 <td><?php echo $fila['TR03']; ?></td>
                 <td><?php echo $fila['TR40']; ?></td>
             </tr>                 
        <?php } ?>
		</table>
	<?php
		mysqli_close($con);
	
