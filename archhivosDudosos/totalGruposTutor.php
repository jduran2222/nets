<?php
$result = $con->query(
    "SELECT idGrupo, grupo, curso, tutor, capacidad, usuario, nombre, apellidos"
        . " from grupos, usuarios, profesores where (grupos.idGrupo IN"
        . "(SELECT idGrupo from grupos where tutor = usuarios.idUsuario))"
        . "and (profesores.idProfesor = usuarios.idUsuario)"
        . "and (grupos.tutor = profesores.idProfesor)"
        . "and (usuarios.usuario = '$usuario')"
);
?>

<?php if ($result->num_rows > 0) { ?>
     
    <table id="tabladatos" class="table">  
        <thead>
            <tr>
                <th>id Grupo</th>
                <th>Grupo</th>
                <th>Curso</th>
                <th>Opciones/Alumno</th> 
                <th>Opciones/Grupo</th> 
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['idGrupo']; ?></td>
                <td><?php echo $row['grupo']; ?></td>
                <td><?php echo $row['curso']; ?></td>
                
                <td >
                    <a class = "btn btn-default" href="indexAlumnosGrupoTutor.php?idGrupo=<?php echo $row['idGrupo']; ?>&grupo=<?php echo $row['grupo']; ?>&curso=<?php echo $row['curso']; ?>&tutor=<?php echo $row['tutor']; ?>&capacidad=<?php echo $row['capacidad']; ?>">Alumnos        
                </td>
                <td><a class = "btn btn-default" href="indexAsignaturasGrupo.php?idGrupo=<?php echo $row['idGrupo']; ?>&grupo=<?php echo $row['grupo']; ?>&curso=<?php echo $row['curso']; ?>&capacidad=<?php echo $row['capacidad']; ?>">Asignaturas</td>
            </tr>                
        <?php } ?>
    </table>
<?php } 
    



