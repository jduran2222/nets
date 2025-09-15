<?php
	require_once ("../config.php");	
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 
	$tables="personal";
	$campos="*";
	$sWhere=" personal.puesto LIKE '%".$query."%'";
	$sWhere.=" order by personal.idPersonal desc";
	
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
                                                <th>Telefono</th>
                                                <th>Puesto</th>
                                                
                                                <th>Registrar como Usuario</th>
						<th>Editar/Eliminar</th>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query1)){								
							$idPersonal=$row['idPersonal'];
                                                        
							$nombre=$row['nombre'];
							$apellidos=$row['apellidos'];							
                                                        $telefono=$row['telefono'];
                                                        $puesto=$row['puesto'];
							$finales++; 
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $idPersonal;?></td>
                                                        
							<td ><?php echo $nombre;?></td>
							<td ><?php echo $apellidos;?></td>
							<td><?php echo $telefono;?></td>
                                                        <td><?php echo $puesto;?></td>
                                                        
                                                        <td>
                                                            <a href="#"  data-target="#addUsuarioPersonalModal" class="btn btn-success" data-toggle="modal" data-id="<?php echo $idPersonal;?>"><i class="material-icons">&#xE147;</i> <span>Registrar</span></a>
                                                        </td>  
                                                        <td>
								<a href="#"  data-target="#editPersonalModal" class="edit" data-toggle="modal" data-id='<?php echo $idPersonal;?>' data-nombre="<?php echo $nombre;?>" data-apellidos="<?php echo $apellidos;?>" data-telefono="<?php echo $telefono; ?>" data-puesto="<?php echo $puesto; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#" data-target= "#deletePersonalModal" class="delete" data-toggle="modal" data-id='<?php echo $idPersonal;?>'><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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

         
