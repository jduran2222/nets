<div class ="panel panel-default">
    <div class ="panel-body">
        <div class ="container">
            <div class='col-sm-4 pull-right'>
            <form name = "f1" id ="f1" method = "POST" action ="datosAsignaturaGrupoProfesor.php">
                <div class="row">
                    <div class="col-sm-2"> 
                    <select class="btn btn-primary" style = "text-align:left" name ="grupos" onchange="this.form.submit()">
                        <option value="o" selected ="selected"> Seleccione Grupo</option>
                        <?php
                            $selectedSQL="SELECT * FROM grupos where (curso = '$idCurso') and idGrupo not in"
                                . "(select idGrupo from asignaturagrupoprofesor where (idAsignatura = '$idAsignatura') and (idProfesor = '$idProfesor'))";
                                $datos = mysqli_query ($con, $selectedSQL);
                                    while ($fila = mysqli_fetch_array($datos)) {
                                        echo '<option value="'.$fila["idGrupo"].'">'.$fila["idGrupo"].'-'.$fila["grupo"].'</option>';
                                }
                            ?>
                    </select>
                    </div>
                </div>
            </form>
            </div>    
        </div>
    </div>    
</div>

<?php
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
                   <a href="eliminar_asignatura_perfil_grupo.php?asignatura=<?php echo $row['idAsignatura'];?>&profesor=<?php echo $row['idProfesor'];?>&grupo=<?php echo $row['idGrupo'];?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>       
                </td>
        <?php } ?>
    </table>
    <button  type = "button" class = "btn btn-primary" onclick="window.history.go(-2)"><<</button>
    <button type = "button" class = "btn btn-success" onclick="window.history.go(-1)"><</button>
          
<?php } ?>
     </div>
    </div>
</div>
</body>
</html>
