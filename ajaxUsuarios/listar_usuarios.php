<?php
	require_once ("../config.php");
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
        if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 
	$tables="usuarios";
	$campos="*";
	$sWhere=" usuarios.perfil LIKE '%".$query."%'";
	$sWhere.=" order by usuarios.idUsuario desc";
	
	include '../pagination.php'; 
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
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
	//main query to fetch the dat
	$query1 = mysqli_query($con,"SELECT * FROM  $tables where $sWhere LIMIT $offset,$per_page");	
			
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Código</th>
						<th>Usuario </th>
						<th>Perfil </th>
						<th>email</th>
						<th>Password</th>
                                                <th>Editar/Eliminar</th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query1)){	
							$idUsuario=$row['idUsuario'];
							$usuario = $row['usuario'];
                                                        $perfil=$row['perfil'];
							$email=$row['email'];
							$password=$row['password'];				
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td><?php echo $idUsuario;?></td>
							<td><?php echo $usuario;?></td>
                                                        <td><?php echo $perfil;?></td>
							<td><?php echo $email;?></td>
							<td><?php echo $password;?></td>
							<td>
								<a href="#"  data-target="#editUsuarioModal" class="edit" data-toggle="modal" data-id="<?php echo $idUsuario;?>" data-usuario="<?php echo $usuario;?>" data-email="<?php echo $email;?>" data-password="<?php echo $password;?>" data-perfil="<?php echo $perfil;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteUsuarioModal" class="delete" data-toggle="modal" data-id="<?php echo $idUsuario;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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
