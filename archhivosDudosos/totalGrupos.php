<?php
$result = $con->query(
 'SELECT idGrupo, idCurso, grupo, nombre, apellidos,'
        . ' capacidad from Grupos, profesores where Grupos.tutor=profesores.idProfesor'
);
?>

<?php if ($result->num_rows > 0) { ?>
    <P class =" "buscador">  
     <label></labell>
    <input id ="buscador" type ="input" class = "form-control" value ="" placeholder="Buscar">
</p>  
    <table id="tabladatos" class="table table-striped"> 
        <thead>
            <tr>
                <th>Cod. Grupo</th>
                <th>Curso</th>
                <th>Grupo</th>
                <th>Profesor Tutor</th>
                <th>Capacidad</th>
                <th>Opciones Alumnos</th>
                <th>Opciones Asignaturas</th>
                <th>Editar/Eliminar</th>
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                    <td><?php echo $row['idGrupo']; ?></td>
                    <td><?php echo $row['idCurso']; ?></td>
                    <td><?php echo $row['grupo']; ?></td>
                    <td><?php echo $row['nombre']; ?> <?php echo $row['apellidos']; ?></td>
                    <td><?php echo $row['capacidad']; ?></td>
                    <td >
                        <a class = "btn btn-default" href="indexAlumnosGrupo.php?grupo=<?php echo $row['idGrupo']; ?>&curso=<?php echo $row['idCurso']; ?>&capacidad=<?php echo $row['capacidad']; ?>">Alumnos
                        
                    </td>
                    <td><a class = "btn btn-default" href="indexAsignaturasCurso.php?idGrupo=<?php echo $row['idGrupo']; ?>&grupo=<?php echo $row['grupo']; ?>&curso=<?php echo $row['idCurso']; ?>&capacidad=<?php echo $row['capacidad']; ?>">Asignaturas</td>
                    <td>
                        <a href="#" class="edit" data-toggle="modal" data-id="<?php echo $idGrupo;?>" data-curso="<?php echo $curso;?>" data-grupo="<?php echo $grupo;?>" data-tutor="<?php echo $tutor;?>" data-capacidad="<?php echo $capacidad;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>                
                        <a href="eliminar_alumno.php?clave=<?php echo $row['idGrupo'];?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>       
                    </td>
		    
        <?php } ?>
    </table>
<?php } 
   



