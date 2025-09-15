<?php
    session_start();
    
    $idAsignatura = $_SESSION["asignatura"];
    $idProfesor = $_SESSION["profesor"];
    require_once ("../config.php");	
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if($action == 'ajax'){
	
    $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM asignaturaGrupoProfesor where (idProfesor = $idProfesor) order by idProfesor desc");
	
    $row= mysqli_fetch_array($count_query);
    $numrows = $row[0];
    if(!($numrows >0)){
    echo '<script>
        alert("La lista consultada está vacía.");
    </script>';           
    exit; 
   }
               
   $result = $con->query(
    "SELECT * from asignaturaGrupoProfesor where (idProfesor = '$idProfesor')"
); 	
?>	
 
<?php if ($result->num_rows > 0) { ?>
    <table id="tabladatos" class="table">  
        <thead>
            <tr>                
                <th>Asignatura</th> 
                <th>Grupo</th>
                <th>Eliminar</th> 
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>               
                <td><?php echo $row['idAsignatura']; ?></td>
                <td><?php echo $row['idGrupo']; ?></td>               
                <td> 
                   <a href="#deleteAsignacionModal" class="delete" data-toggle="modal" data-id="<?php echo $row['idGrupo'];?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>                  
                </td>
            </tr>
            <?php } ?>
    </table>
<button  type = "button" class = "btn btn-primary" onclick="window.history.go(-3)"><<<</button>
<button type = "button" class = "btn btn-success" onclick="window.history.go(-2)"><<</button>
<button type = "button" class = "btn btn-warning" onclick="window.history.go(-1)"><</button>

<?php } 

}
      
     

