<?php

$result = $con->query(
    'SELECT * from profesores'
);
?>

<?php if ($result->num_rows > 0) { ?>
<P class =" "buscador">  
 <label></labell>
    <input class ="form-control" id ="buscador" type ="input" value ="" placeholder="Buscar">
</p>
    <table id="tabladatos" class="table"> 
        <thead>
            <tr>
                <th>Cod. Profesor</th>
                <th>Código Usuario</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Perfil Profesor</th>
                <th>Editar/Eliminar</th>  
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['idProfesor']; ?></td>
                <td><?php echo $row['usuario']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><a class = "btn btn-success" href="indexPerfilProfesor.php?profesor=<?php echo $row['idProfesor']; ?>&usuario = <?php echo $row['usuario']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>">Perfil</a></td>
                <td>
                    <a href="#" class="edit" data-toggle="modal" data-idAsignatura="<?php echo $idProfesor;?>"  data-telefono="<?php echo $telefono;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>                
                    <a href="eliminar_profesor.php?clave=<?php echo $row['idProfesor'];?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                </td>
        <?php } ?>
    </table>
<?php } ?>
     </div>
    </div>
</div>
</body>
</html>


