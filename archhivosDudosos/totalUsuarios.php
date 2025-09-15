<?php

$result = $con->query(
    'SELECT * from usuarios'
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
                <th>id Usuario</th>
                <th>id Profesor</th>
                <th>correo electónico</th>
                <th>Conraseña</th>
                <th>perfil</th>  
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['idUsuario']; ?></td>
                <td><?php echo $row['codigoId']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['perfil']; ?></td>
        <?php } ?>
    </table>
<?php } ?>
     </div>
    </div>
</div>
</body>
</html>

