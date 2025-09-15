<?php	
	require_once ("../config.php");
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
        $query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
        
	$tables="grupos";
	$campos="*";
	$sWhere=" grupos.curso LIKE '%".$query."%'";
        $sWhere.="order by grupos.idGrupo";
	
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
	$query2 = mysqli_query($con,"SELECT grupos.*, IFNULL(count(alumnos_grupo.idGrupo), 0) as asignados from grupos LEFT JOIN alumnos_grupo on (grupos.idGrupo = alumnos_grupo.idGrupo) where (grupos.curso LIKE '%".$query."%') group by grupos.idGrupo LIMIT $offset,$per_page");
	        	
?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
				<tr>
                                        <th>id Grupo</th>
                                        <th>Grupo</th>					
					<th>Curso</th>	
					<th class='text-center'>Tutor</th>
					<th class='text-center'>Capacidad</th>
                                        <th class='text-center'>Asignados</th>
                                        <th>Alumnos</th>
                                        <th>Asignaturas</th>
                                        
					<th>Editar/Eliminar</th>
				</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query2)){	
							
							$idGrupo=$row['idGrupo'];
                                                        $grupo=$row['grupo'];
							$idCurso=$row['curso'];						
							$tutor=$row['tutor'];
							$capacidad=$row['capacidad'];
                                                        $asignados=$row['asignados'];
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
                                                        <td ><?php echo $idGrupo;?></td>
                                                        <td ><?php echo $grupo;?></td>							
							<td ><?php echo $idCurso;?></td>                                                       
							<td class='text-center' ><?php echo $tutor;?></td>
							<td class='text-center'><?php echo $capacidad;?></td> 
                                                        <td class='text-center'><?php echo $asignados;?></td>
                                                        <td >
                                                            <a class = "btn btn-default" href="indexAlumnosGrupo.php?idGrupo=<?php echo $row['idGrupo']; ?>&grupo=<?php echo $row['grupo']; ?>&curso=<?php echo $row['curso']; ?>&tutor=<?php echo $row['tutor']; ?>&capacidad=<?php echo $row['capacidad']; ?>">Alumnos
                                                        </td>
                                                        <td>
                                                                <a class = "btn btn-default" href="indexAsignaturasGrupo.php?idGrupo=<?php echo $row['idGrupo']; ?>&grupo=<?php echo $row['grupo']; ?>&curso=<?php echo $row['curso']; ?>&tutor=<?php echo $row['tutor']; ?>&capacidad=<?php echo $row['capacidad']; ?>">Asignaturas
                                                        </td>
                                                        
                                                        <td>
								<a href="#"  data-target="#editGrupoModal" class="edit" data-toggle="modal" data-id="<?php echo $idGrupo;?>" data-curso="<?php echo $idCurso;?>" data-titulo="<?php echo $grupo;?>" data-tutor="<?php echo $tutor;?>" data-capacidad="<?php echo $capacidad;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteGrupoModal" class="delete" data-toggle="modal" data-id="<?php echo $idGrupo;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                                                        </td>
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
        
