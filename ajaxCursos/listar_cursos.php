<?php	
	require_once ("../config.php");
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
        $query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
        
	$tables="cursos";
	$campos="*";
	$sWhere=" cursos.nivel LIKE '%".$query."%'";
        $sWhere.="order by cursos.nivel";
	
	include '../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere");
	
        $row= mysqli_fetch_array($count_query);
        $numrows = $row[0];
        if(!($numrows >0)){
            echo '<script>
                alert("La lista consultada está vacía.");
            </script>';           
            exit; 
        }
        
	$total_pages = ceil($numrows/$per_page);
        $query1 = mysqli_query($con,"SELECT cursos.*, IFNULL(count(alumnos.curso), 0) as alumnos from cursos LEFT JOIN alumnos on (cursos.idCurso = alumnos.curso) where (cursos.idCurso LIKE '%".$query."%') group by cursos.idCurso LIMIT $offset,$per_page");
	$query2 = mysqli_query($con,"SELECT cursos.*, IFNULL(count(asignaturas.curso), 0) as asignaturas from cursos LEFT JOIN asignaturas on (cursos.idCurso = asignaturas.curso) where (cursos.idCurso LIKE '%".$query."%') and (asignaturas.estado = 1) group by cursos.idCurso LIMIT $offset,$per_page");
	        	
?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
				<tr>
                                        <th>id Curso</th>                				
					<th class='text-center'>Curso</th>	
					<th class='text-center'>Nivel</th>					
                                        <th class='text-center'>Asigaturas Activas</th>
                                        <th>Niveles Asignación</th>
                                        <th>Promocionados</th>                                       
					<th>No Promocionados</th> 
				</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query2)){	
							
							$idCurso=$row['idCurso'];
                                                        $asignaturas = $row['asignaturas'];
                                                        $curso=$row['curso'];
							$nivel=$row['nivel'];						                                                       
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
                                                        <td ><?php echo $idCurso;?></td>
                                                        <td class='text-center'><?php echo $curso;?></td>							
							<td class='text-center'><?php echo $nivel;?></td>                                                       
							
                                                        <td class='text-center'><?php echo $asignaturas;?></td>
                                                        <td >
                                                            <a class = "btn btn-warning" href="grafico3.php?idCurso=<?php echo $row['idCurso']; ?>&asignaturas=<?php echo $row['asignaturas']; ?>">Niveles Asignación
                                                        </td>
                                                        <td >
                                                            <a class = "btn btn-success" href="indexPromocionados.php?idCurso=<?php echo $row['idCurso']; ?>&asignaturas=<?php echo $row['asignaturas']; ?>&curso=<?php echo $row['curso']; ?>&nivel=<?php echo $row['nivel']; ?>&orden=<?php echo $row['orden']; ?>&orden_abs=<?php echo $row['orden_abs']; ?>">Promocionados
                                                        </td>
                                                        <td >
                                                            <a class = "btn btn-info" href="indexNoPromocionados.php?idCurso=<?php echo $row['idCurso']; ?>&asignaturas=<?php echo $row['asignaturas']; ?>&curso=<?php echo $row['curso']; ?>&nivel=<?php echo $row['nivel']; ?>&orden=<?php echo $row['orden']; ?>&orden_abs=<?php echo $row['orden_abs']; ?>">No Promocionados
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
        
