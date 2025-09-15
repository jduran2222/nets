<?php
	require_once ("../config.php");
 	
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 
	$tables="asignaturagrupoprofesor, grupos";
	$campos="*";
	$sWhere=" (asignaturagrupoprofesor.idGrupo LIKE '%".$query."%') and (asignaturagrupoprofesor.idGrupo = grupos.idGrupo)";
	$sWhere.=" order by asignaturagrupoprofesor.idProfesor desc";
	
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
                                        <th class='text-center'>Código Profesor</th>       
                                        <th class='text-center'>Código Grupo</th>
                                        <th class='text-center'>Grupo</th>
                                        <th>Código Asignatura</th>
				</tr>	
				<tbody>	
					<?php 
					$finales=0;
					while($row = mysqli_fetch_array($query1)){
                                            $idAsignatura=$row['idAsignatura'];
					    $idGrupo=$row['idGrupo'];
                                            $grupo=$row['grupo'];
					    $idProfesor=$row['idProfesor'];							
					    $finales++; 
					?>	
						<tr class="<?php echo $text_class;?>">
                                                    <td class='text-center'><?php echo $idProfesor;?></td>
                                                    <td class='text-center' ><?php echo $idGrupo;?></td>
                                                    <td class='text-center' ><?php echo $grupo;?></td>
                                                    <td ><?php echo $idAsignatura;?></td>						
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
		</div>	
 
	<?php	
}	

