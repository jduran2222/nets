<?php
	require_once ("../config.php");
 
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
        
	$tables="alumnos, cursos";
	$campos="*";
	$sWhere="(alumnos.curso = cursos.idCurso) and (alumnos.curso LIKE '%".$query."%')";
	$sWhere.=" order by alumnos.idAlumno desc";
	
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

	$query2 = mysqli_query($con,"SELECT * FROM  alumnos, cursos where (alumnos.curso = cursos.idCurso) and (alumnos.curso like '%".$query."%') order by alumnos.idAlumno desc LIMIT $offset,$per_page");	
		
	?>
	
        <div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th class='text-center'>Código</th>
					<th>Nombre</th>
					<th>Apellidos</th>
                                        
					<th class='text-center'>Curso</th>                                                
					<th>Materias Ptes.</th>
                                        <th>Cuenta Alumno</th>
                                        
                                        <th>Registrar como Usuario</th>
					<th>Editar/Eliminar</th>
                                </tr>        
                        </thead>
			<tbody>	
				<?php 
                        		$finales=0;
					while($row = mysqli_fetch_array($query2)){	
							
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
                                                <td><a class = "btn btn-default" href="indexArrastreAlumno.php?clave=<?php echo $row['idAlumno']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&curso=<?php echo $row['idCurso']; ?>&nivel=<?php echo $row['nivel']; ?>&orden=<?php echo $row['orden']; ?>">Asignar</a></td>
                                                <td><a class = "btn btn-default" href="indexPagos.php?clave=<?php echo $row['idAlumno']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&curso=<?php echo $row['idCurso']; ?>">Gestión Cuenta</a></td>
                                                <td>
                                                    <a href="#"  role = "button" data-target="#addUsuarioAlumnoModal" id = "boton1" class="btn btn-success" data-toggle="modal" data-id="<?php echo $idAlumno;?>"><i class="material-icons">&#xE147;</i> <span>Registrar</span></a>
                                                </td>    
                                                
                                                <td>
                                			<a href="#" role = "button" data-target="#editAlumnoModal" class="edit" data-toggle="modal" data-id="<?php echo $idAlumno;?>" data-nombre="<?php echo $nombre;?>" data-apellidos="<?php echo $apellidos;?>"  data-curso="<?php echo $curso;?>" data-nacimiento="<?php echo $nacimiento;?>" data-tutor="<?php echo $tutor; ?>" data-telefono="<?php echo $telefono; ?>" ><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
							<a href="#" role = "button" data-target= "#deleteAlumnoModal" class="delete" data-toggle="modal" data-id="<?php echo $idAlumno;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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

         
