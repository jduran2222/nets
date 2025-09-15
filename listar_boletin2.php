<?php  require('config.php'); 
// confirmar sesion
$clave = $_GET['clave'];
$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$curso = $_GET['curso'];
$asignaturas = $_SESSION['asignaturas'];
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

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
<div class="container">
        <div class ="table table-responsive">    
            <table class ="table table-bordered" style = "white-space: nowrap">
                
                <thead>
                    <tr class = "bg-info">
                        <th>id Alumno:</th>
                        <th>Alumno:</th>                   
                        <th>Curso:</th> 
                        <th>Asignaturas:</th> 
                    </tr>
                </thead>
            
                <tbody>
                    <tr>
                        <td><?php echo $clave; ?></td>
                        <td><?php echo $nombre; ?> <?php echo $apellidos; ?></td>                       
                        <td><?php echo $curso; ?></td> 
                        <td><?php echo $asignaturas; ?></td> 
                    </tr>
                </tbody>    
            </table>  
                    
        <table id="tabladatos" class ="table table-bordered table-striped" style = "white-space: nowrap">
			<tr>
			  <th rowspan="2" align="left">Asignatura</th>
                          <th colspan="2" style="text-align: center">1ºTrimestre</th>
			  <th colspan="2" style="text-align: center">2ºTrimestre</th>
			  <th colspan="2" style="text-align: center">3ºTrimestre</th>    
			  <th rowspan="2" style="text-align: center">Septiembre</th> 	
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

