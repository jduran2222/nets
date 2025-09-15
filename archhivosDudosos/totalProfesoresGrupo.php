<?php
$result = $con->query(
    "SELECT * from profesores,asignaturas, profesor_grupo_asignatura where (profesores.idProfesor = profesor_grupo_asignatura.idProfesor)"
        . "and (asignaturas.idAsignatura = profesor_grupo_asignatura.idAsignatura) and (profesor_grupo_asignatura.idGrupo = '$clave')"
);
?>

<?php if ($result->num_rows > 0) { ?>
    <P class =" "buscador">  
    <label></labell>
    <input id ="buscador" class = "form-control" type ="input" value ="" placeholder="Buscar">
</p>  
    <table id="tabladatos" class="table">  
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
                <th>Teléfono</th>
                
                <th>Editar/liminar</th> 
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['asignatura']; ?></td>
                <td><?php echo $row['nombre']; ?> <?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td>
                   <a href="#" class="edit" data-toggle="modal" data-idAsignatura="<?php echo $idAsignatura;?>" data-curso="<?php echo $curso;?>" data-asignatura="<?php echo $asignatura;?>" data-numorden="<?php echo $numorden;?>" data-rama="<?php echo $rama;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>                
                   <a href="eliminar_asignacion.php?clave=<?php echo $row['idProfesor'];?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>       
                </td>
        <?php } ?>
    </table>
<?php } ?>
     </div>
    </div>
</div>
</body>
</html>

