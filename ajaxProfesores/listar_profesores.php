<?php
	require_once ("../config.php");	
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 
	$tables="profesores";
	$campos="*";
	$sWhere=" profesores.idProfesor LIKE '%".$query."%'";
	$sWhere.=" order by profesores.idProfesor desc";
	
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
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Código</th>						
						<th>nombre</th>
						<th>Apellidos</th>
                                                <th>telefono</th>
                                                <th>Perfil Profesor</th>
                                                <th>Registrar como Usuario</th>
						<th>Editar/Eliminar</th>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query1)){								
							$idProfesor=$row['idProfesor'];
                                                        
							$nombre=$row['nombre'];
							$apellidos=$row['apellidos'];							
                                                        $telefono=$row['telefono'];
							$finales++; 
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $idProfesor;?></td>
                                                        
							<td ><?php echo $nombre;?></td>
							<td ><?php echo $apellidos;?></td>
							<td><?php echo $telefono;?></td>
                                                        <td><a class = "btn btn-default" href="indexPerfilProfesor.php?profesor=<?php echo $row['idProfesor']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>">Perfil</a></td>
                                                        <td>
                                                            <a href="#"  data-target="#addUsuarioProfesorModal" class="btn btn-success" data-toggle="modal" data-id="<?php echo $idProfesor;?>"><i class="material-icons">&#xE147;</i> <span>Registrar</span></a>
                                                        </td>  
                                                        <td>
								<a href="#"  data-target="#editProfesorModal" class="edit" data-toggle="modal" data-id='<?php echo $idProfesor;?>' data-nombre="<?php echo $nombre;?>" data-apellidos="<?php echo $apellidos;?>" data-telefono="<?php echo $telefono; ?>" ><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#" data-target= "#deleteProfesorModal" class="delete" data-toggle="modal" data-id='<?php echo $idProfesor;?>'><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                                                        </td>
						</tr>
						<?php }?>
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
				</tbody>			
			</table>
                        <button type = "button" class = "btn btn-primary" onclick="window.history.go(-1)"><</button>
		</div>	
 
	<?php		
}
         
