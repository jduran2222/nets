<?php	
        session_start();
        $idCurso = $_SESSION['curso'];
        $asignaturas = $_SESSION['asignaturas'];
        
	require_once ("../config.php");
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 
	$tables="alumnos, alumnos_grupo, notas";
	$campos="alumnos.idAlumno, alumnos.nombre, alumnos.apellidos, alumnos.curso, notas.idAsignatura, TR10, TR01, TR20, TR02, TR30, TR03, TR40";
        $ordinario ="(((notas.TR10<5 OR notas.TR10 IS NULL) AND (notas.TR01<5 OR notas.TR01 IS NULL)) OR ((notas.TR20<5 OR notas.TR20 IS NULL) AND (notas.TR02<5 OR notas.TR02 IS NULL)) OR ((notas.TR30<5 OR notas.TR30 IS NULL) AND (notas.TR03<5 OR notas.TR03 IS NULL)))";
        $extraordinario ="(notas.TR40<5 OR notas.TR40 IS NULL)";
        
        $sWhere="((alumnos.idAlumno = alumnos_grupo.idAlumno) and (alumnos.idAlumno = notas.idAlumno) and (alumnos.idAlumno LIKE '%".$query."%')and $ordinario) and (alumnos.curso = '$idCurso')";
        $sWhere.="AND((alumnos.idAlumno = alumnos_grupo.idAlumno) and (alumnos.idAlumno = notas.idAlumno) and (alumnos.idAlumno LIKE '%".$query."%')and $extraordinario)and (alumnos.curso = '$idCurso')";
	
	
	include '../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT distinct count((alumnos.idAlumno)) as numrows from alumnos where alumnos.idAlumno in (select alumnos.idAlumno FROM $tables where $sWhere GROUP BY alumnos.idAlumno HAVING (COUNT(DISTINCT idAsignatura) <= '$asignaturas'))");
	
        $row= mysqli_fetch_array($count_query);
        $numrows = $row[0];
        
        if(!($numrows >0)){
            echo '<script>
                alert("La lista consultada está vacía.");
                window.history.back();
            </script>';           
            exit; 
        }
        
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data        
	$query1 = mysqli_query($con, "SELECT alumnos.idAlumno, alumnos.nombre, alumnos.apellidos, alumnos.curso, alumnos_grupo.idGrupo FROM  $tables where $sWhere GROUP BY alumnos.idAlumno HAVING COUNT(DISTINCT idAsignatura)>0");	
		
?>
	
        <div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>id Alumno</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Curso Actual</th>
						<th>Grupo</th>
                                                <th>Detalle de Notas</th>
										<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query1)){								
							$idAlumno=$row['idAlumno'];
                                                        $nombre=$row['nombre'];
                                                        $apellidos=$row['apellidos'];
                                                        $curso = $row['curso'];
                                                        $grupo = $row['idGrupo'];
							
							$finales++; 
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $idAlumno;?></td>
                                                        <td ><?php echo $nombre;?></td>
                                                        <td ><?php echo $apellidos;?></td>
                                                        <td ><?php echo $curso;?></td>
                                                        <td ><?php echo $grupo;?></td>
                                                        <td><a class = "btn btn-default" href="detallesNotas.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>">Consultar Boletin</a></td>
                                                        
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
                        
                        <button  type = "button" class = "btn btn-primary" onclick="window.history.go(-2)"><<</button>
                        <button type = "button" class = "btn btn-success" onclick="window.history.go(-1)"><</button>
                        
		</div>	
 
	<?php	
}	


