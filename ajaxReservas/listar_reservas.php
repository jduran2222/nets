<?php
	require_once ("../config.php");
 
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 
	$tables="reservas";
	$campos="*";
	$sWhere=" reservas.curso LIKE '%".$query."%'";
	$sWhere.=" order by reservas.idAlumno desc";
	
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
	$query1 = mysqli_query($con,"SELECT * FROM  reservas, cursos where (reservas.curso = cursos.idCurso) and (reservas.curso like '%".$query."%') order by reservas.idAlumno desc LIMIT $offset,$per_page");	
	
?>
	
        <div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>Código</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th class='text-center'>Curso</th>                                                
						<th>Confirmar</th>
                                                
						<th>Editar/Eliminar</th>
                                                
                                </thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query1)){	
							
							$idAlumno=$row['idAlumno'];
							$nombre=$row['nombre'];
							$apellidos=$row['apellidos'];
							$curso=$row['idCurso'];
                                                        $nacimiento=$row['fecha_nacimiento'];
                                                        $tutor=$row['tutor'];
                                                        $telefono=$row['telefono'];
							$finales++; 
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $idAlumno;?></td>
							<td ><?php echo $nombre;?></td>
							<td ><?php echo $apellidos;?></td>
							<td class='text-center' ><?php echo $curso;?></td>
                                                        <td><a href="#" data-target = "#addMatriculaModal" class="btn btn-success" data-toggle="modal" data-id="<?php echo $idAlumno;?>" data-nombre="<?php echo $nombre;?>" data-apellidos="<?php echo $apellidos;?>" data-curso="<?php echo $curso;?>" data-nacimiento="<?php echo $nacimiento;?>" data-tutor="<?php echo $tutor; ?>" data-telefono="<?php echo $telefono; ?>" ><i class="material-icons">&#xE147;</i> <span>Confirmar Matricula</span></a>
                                                        
                                                        <td>
								<a href="#"  data-target="#editAlumnoModal" class="edit" data-toggle="modal" data-id="<?php echo $idAlumno;?>" data-nombre="<?php echo $nombre;?>" data-apellidos="<?php echo $apellidos;?>" data-curso="<?php echo $curso;?>" data-nacimiento="<?php echo $nacimiento;?>" data-tutor="<?php echo $tutor; ?>" data-telefono="<?php echo $telefono; ?>" ><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#" data-target= "#deleteAlumnoModal" class="delete" data-toggle="modal" data-id="<?php echo $idAlumno;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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
                        <button  type = "button" class = "btn btn-primary" onclick="window.history.go(-1)"><</button>
		</div>	
 
	<?php	
}	



