<?php
    session_start();
    $idAlumno = $_SESSION["alumno"];
    require_once ("../config.php");	
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if($action == 'ajax'){
	
    $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM arrastres where (idAlumno = $idAlumno) order by idAlumno desc");
	
    $row= mysqli_fetch_array($count_query);
    $numrows = $row[0];
    if(!($numrows >0)){
    echo '<script>
        alert("La lista consultada está vacía.");
    </script>';           
    exit; 
   }
               
    $result = $con->query(
    "SELECT asignaturas.idAsignatura, asignaturas.asignatura, asignaturas.curso, arrastres.idAlumno from arrastres, asignaturas where (asignaturas.idAsignatura = arrastres.idAsignatura)"
        . "and (arrastres.idAlumno = '$idAlumno')");
    	
?>	
   
<?php if ($result->num_rows > 0) { ?>
 
<table id="tabladatos" class="table">  
        <thead>
            <tr>
                <th>Cod. Asignatura</th>
                <th>Asignatura</th> 
                <th>Curso</th>
                <th>Eliminar</th> 
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['idAsignatura']; ?></td>
                <td><?php echo $row['asignatura']; ?></td>
                <td><?php echo $row['curso']; ?></td>
                <td>  
                   <a href="#" data-target= "#deleteArrastreModal" class="delete" data-toggle="modal" data-id='<?php echo $row['idAsignatura'];?>'><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>                  
                </td>
        <?php } ?>
    </table>
    <button  type = "button" class = "btn btn-primary" onclick="window.history.go(-2)"><<</button>
    <button type = "button" class = "btn btn-success" onclick="window.history.go(-1)"><</button>                       
<?php } 

}
     

