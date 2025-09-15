
<?php
        session_start();
        $idGrupo = $_GET["idGrupo"];
	require_once ("../config.php");	
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 
	$tables="alumnos_grupo, alumnos, grupos";
	$campos="*";
	$sWhere="(grupos.idGrupo = alumnos_grupo.idGrupo) and (alumnos.idAlumno=alumnos_grupo.idAlumno) and (grupos.idGrupo = '$idGrupo')";
	
	
	include '../pagination.php'; 
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); 
	$adjacents  = 4; 
	$offset = ($page - 1) * $per_page;
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	
        $row= mysqli_fetch_array($count_query);
        $numrows = $row[0];
        if(!($numrows >0)){
            echo '<script>
                alert("La lista consultada está vacía.");
            </script>';           
            exit; 
        }
        
	$total_pages = ceil($numrows/$per_page);
	$query1 = mysqli_query($con,"SELECT $campos FROM $tables where $sWhere LIMIT $offset,$per_page");	

        
?>	
        <div class="table-responsive">
                        <table id="tabladatos" class="table">  
        
        <thead>
            <tr>
                <th>Cod. Matricula</th>
                <th>Nombre</th> 
                <th>Apellidos</th>
                <th>Registrar Notas</th>
                <th>Consultar Notas</th>
                <th>Consultar Boletin</th>
                <th>Eliminar</th> 
            </tr>
        </thead>
        
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['idAlumno']; ?></td>    
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td>
                    <a class = "btn btn-default" href="regNotasAlumno.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Ordinarias
                    <a class = "btn btn-default" href="regNotasArrastre.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Arrastre    
                </td>
                <td>
                    <a class = "btn btn-default" href="indexNotasAlumno.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Ordinarias
                    <a class = "btn btn-default" href="indexNotasArrastre.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Arrastre    
                </td>
                <td><a class = "btn btn-default" href="indexBoletin.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Boletin Escolar</td>
                <td>
                   
                   <a href="eliminar_alumno_grupo.php?clave=<?php echo $row['idAlumno'];?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>       
                </td>
        <?php } ?>
         <tr>
		<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
    </table>
    <button  type = "button" class = "btn btn-primary" onclick="window.history.go(-2)"><<</button>
    <button type = "button" class = "btn btn-success" onclick="window.history.go(-1)"><</button>
                        
			
		</div>	
 
	<?php		
}
         