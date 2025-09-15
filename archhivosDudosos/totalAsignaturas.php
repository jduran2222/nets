<?php
include('config.php');
$productsPorPagina = 10;
if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"];
}
else{$pagina = 1;}
$limit = $productsPorPagina;
$offset = ($pagina - 1) * $productsPorPagina;
$sentencia = "select * from asignaturas";
$resultado = mysqli_query($con,$sentencia);
$num = $resultado->num_rows;
$sql = "SELECT * from asignaturas LIMIT $limit OFFSET $offset";
$result = mysqli_query($con, $sql);
$paginas = ceil($num/$productsPorPagina);

?>

<?php if ($result->num_rows > 0) { ?>
  <P class =" "buscador">
    <label></labell>  
    <input id ="buscador" type ="input" class = "form-control" value ="" placeholder="Buscar">
</p>   
    <table id="tabladatos" class="table table-sm table-striped table-bordered"> 
        <thead>
            <tr>
                <th>Cod. Asignatura</th>
                 <th>Curso</th>
                <th>Asignatura</th>
                <th>Rama</th>
                
                <th>acciones</th>
                
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                    <td><?php echo $row['idAsignatura']; ?></td>
                    <td><?php echo $row['curso']; ?></td>
                    <td><?php echo $row['asignatura']; ?></td>
                    <td><?php echo $row['rama']; ?></td>
                    <td>
                        <a href="#" class="edit" data-toggle="modal" data-idAsignatura="<?php echo $idAsignatura;?>" data-curso="<?php echo $curso;?>" data-asignatura="<?php echo $asignatura;?>" data-numorden="<?php echo $numorden;?>" data-rama="<?php echo $rama;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>                
                        <a href="eliminar_asignatura.php?clave=<?php echo $row['idAsignatura'];?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    </td>
        <?php } ?>
    </table>
<?php } ?>
<nav>
    <div class ="row">
        <div class = col-xs-12 col -sm-6">
            <p>Mostrando <?php echo $productsPorPagina ?> de <?php echo $num; ?>Asignaturas Disponibles</p>
            
        </div>
    </div>
    
    <UL class ="pagination">
       <?php if($pagina > 1) { ?>
        <li class = "page-item">
            <a class = "page-link" href ="indexAsignaturas.php?pagina = <?php echo $pagina - 1 ?>">
               <span arial-hidden =" true">@laquo; </span>
            </a>
        </li>
       <?php } ?>
       
       <?php for($x = 1; $x<=$paginas; $x++){  ?>
        <li class = "<?php if($x==$pagina) echo "active" ?>">
            <a class = "page-link" href ="indexAsignaturas.php?pagina =<?php echo $x ?>"><?php echo $x ?></a>
        </li>
       <?php } ?>
        
       <?php if($x<$paginas){  ?>
        <li>
           <a href ="indexAsignaturas.php?pagina =<?php echo $pagina + 1 ?>">
               <span arial-hidden ="true">@laquo; </span>
            </a> 
        </li>
        
       <?php } ?> 
    </UL>
</nav>
  </div>
</div>
</div>
</body>
</html>

