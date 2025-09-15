  
<?php

$result = $con->query(
    'SELECT tbalumnos.idAlumno, tbalumnos.curso, tbalumnos.nombre, tbalumnos.apellidos, cursos.nivel, cursos.orden from '
        . 'tbalumnos, cursos where (tbalumnos.curso = cursos.idcurso)LIMIT 6'
);
?>

<?php if ($result->num_rows > 0) { ?>
<P class =buscador"> 
    <label></labell>
    <input id ="buscador" type ="input" class = "form-control" value ="" placeholder="Buscar">
</p>
    <table id="tabladatos" class="table"> 
        <thead>
            <tr>
                <th>Cod. Matricula</th>
                <th>Curso</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Asignaturas Pendientes</th>
                <th>Cuenta Alumno</th>
                <th>Editar/Eliminar</th>  
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['idAlumno']; ?></td>
                <td><?php echo $row['curso']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><a class = "btn btn-success" href="indexArrastreAlumno.php?alumno=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nivel=<?php echo $row['nivel']; ?>&orden=<?php echo $row['orden']; ?>">Asignar Pendientes</td>
                <td><a class = "btn btn-primary" href="indexPagos.php?clave=<?php echo $row['idAlumno']; ?>">Gestión Cuenta</td>
                <td>
                    <a href="#" class="edit" data-toggle="modal" data-idAsignatura="<?php echo $idAsignatura;?>" data-curso="<?php echo $curso;?>" data-asignatura="<?php echo $asignatura;?>" data-numorden="<?php echo $numorden;?>" data-rama="<?php echo $rama;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>                
                    <a href="eliminar_alumno.php?clave=<?php echo $row['idAlumno'];?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                </td>
        <?php } ?>
    </table>
<?php } ?>
     </div>
    </div>
</div>
</body>
</html>
