
<?php
$result = $con->query(
    "SELECT * from alumnos, alumnos_grupo, grupos where (alumnos.idAlumno = alumnos_grupo.idAlumno)"
        . "and (alumnos_grupo.idGrupo = grupos.idGrupo) and (alumnos_grupo.idGrupo = '$idGrupo')"
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
                <th>Cod. Matricula</th>
                <th>Nombre</th> 
                <th>Apellidos</th>
                <th>Registrar Notas</th>
                <th>Consultar Notas</th>
                <th>Consultar Boletin</th> 
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['idAlumno']; ?></td>    
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td>
                    <a class = "btn btn-default" href="regNotasAlumno.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Ordinarias
                    <a class = "btn btn-default" href="regNotasArrastre.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Arrastre    
                </td>
                <td>
                    <a class = "btn btn-default" href="indexNotasAlumno.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Ordinarias
                    <a class = "btn btn-default" href="indexNotasArrastre.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Arrastre    
                </td>
                <td><a class = "btn btn-default" href="indexBoletin.php?clave=<?php echo $row['idAlumno']; ?>&curso=<?php echo $row['curso']; ?>&nombre=<?php echo $row['nombre']; ?>&apellidos=<?php echo $row['apellidos']; ?>&grupo=<?php echo $row['grupo']; ?>">Boletin Escolar</td>         
        <?php } ?>
    </table>
<?php } ?>
     </div>
    </div>
</div>
</body>
</html>


