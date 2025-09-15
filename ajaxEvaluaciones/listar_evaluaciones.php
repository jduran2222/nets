<?php
	
	require_once ("../config.php");
	$query = mysqli_query($con,"SELECT * FROM  pruebas");
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>Código</th>
						<th>Prueba</th>
						<th>Estado</th>						
						<th>Editar/Eliminar</th>                                                
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							
							$idPrueba=$row['idPrueba'];
							$prueba=$row['prueba'];
							$activada=$row['activada'];
																
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $idPrueba;?></td>
							<td ><?php echo $prueba;?></td>
							<td ><?php echo $activada;?></td>						
							<td>
								<a href="#"  data-target="#editEvaluacionModal" class="edit" data-toggle="modal" data-id="<?php echo $idPrueba;?>" data-prueba="<?php echo $prueba; ?>" data-estado="<?php echo $activada;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteEvaluacionModal" class="delete" data-toggle="modal" data-id="<?php echo $idPrueba;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                                                        </td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	
 
	
	
	<?php	
	
        
