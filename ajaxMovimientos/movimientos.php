<?php
	require_once ("../config.php");
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 
	$tables="registro_pagos";
	$campos="*";
        $sWhere="cuenta LIKE '%".$query."%'";
	$sWhere.="group by fecha";
		
	include '../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	$numrows = mysqli_num_rows($count_query);
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query1 = mysqli_query($con,"SELECT $campos FROM $tables where $sWhere LIMIT $offset,$per_page");	
	
        if (!($numrows>0)){
            echo '<script>
                alert("La lista consultada está vacía.");
            </script>';            
            exit;   
        }		
?>
	
        <div class="table-responsive">
			<table class="table table-sm  table-striped table-hover">
				<thead>
					<tr>
						<th>Alumno</th>
                                                <th>Fecha</th> 
                                                <th>Cuenta</th> 
                                                <th>Concepto</th>
                                                <th>Descripción</th>
                                                <th>Documento</th>
                                                <th style="text-align: right">Monto</th>
						
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query1)){								
							$idAlumno=$row['alumno'];
                                                        $fecha=$row['fecha'];
                                                        $cuenta=$row['cuenta'];
                                                        $concepto=$row['concepto'];                                         
                                                        $descripcion=$row['documento'];
                                                        $documento=$row['descripcion'];
                                                        $monto=$row['monto'];                   
							
							$finales++; 
						?>	
						<tr class="<?php echo $text_class;?>">
							
							<td style="text-align: left"><?php echo $row['alumno']; ?></td>
                                                        <td><?php echo $row['fecha']; ?></td>
                                                        <td><?php echo $row['cuenta']; ?></td>
                                                        <td><?php echo $row['concepto']; ?></td>
                                                        <td><?php echo $row['descripcion']; ?></td>
                                                        <td style="text-align: center"><?php echo $row['documento']; ?></td>
                                                        <th style="text-align: right"><?php echo $row['monto']; ?></th>
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

