<?php	
	require_once ("../config.php");	
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 
	$tables="asignaturas";
	$campos="*";
	$sWhere=" asignaturas.idAsignatura LIKE '%".$query."%'";
	$sWhere.=" order by asignaturas.idAsignatura";
		
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
	$query1 = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");		
?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Código</th>
						<th>Curso</th>
						<th>Asignatura</th>
                                                <th>Estado</th>
                                                <th>Graficos</th>
						<th class='text-center'>Editar/Eliminar</th>
					</tr>
				</thead> 
				<tbody>	
						<?php 
                                                    $finales=0;
                                                    while($row = mysqli_fetch_array($query1)){								
                                                    $idAsignatura=$row['idAsignatura'];
                                                    $curso=$row['curso'];
                                                    $asignatura=$row['asignatura'];
                                                    $estado = $row['estado'];								
                                                    $finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
                                                    <td class='text-center'><?php echo $idAsignatura;?></td>
                                                    <td ><?php echo $curso;?></td>
                                                    <td ><?php echo $asignatura;?></td> 
                                                    <td ><?php echo $estado;?></td>
                                                    <td >
                                                        <a class = "btn btn-warning" href="graficos2.php?idCurso=<?php echo $row['curso']; ?>&idAsignatura=<?php echo $row['idAsignatura']; ?>&asignatura=<?php echo $row['asignatura']; ?>">Gráficos
                                                    </td>
                                                    <td>
							<a href="#"  data-target="#editAsignaturaModal" class="edit" data-toggle="modal" data-id="<?php echo $row['idAsignatura'];?>" data-curso="<?php echo $row['curso'];?>" data-titulo="<?php echo $row['asignatura'];?>" data-estado="<?php echo $row['estado'];?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
							<a href="#deleteAsignaturaModal" class="delete" data-toggle="modal" data-id="<?php echo $idAsignatura;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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

         
