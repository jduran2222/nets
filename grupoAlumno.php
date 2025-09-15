<div class="panel panel-default">
    <div class="panel-body">           
      <div class ="container">
        <div class='col-sm-4 pull-right'>
        <form name = "f1" id ="f1" method = "POST" action ="datosAlumnoGrupo.php">
            <div class="row">
                <div class="col-sm-2"> 
                    <select class="btn btn-primary" style = "text-align:left" name ="asignaturas" id="asignaturas" onchange="this.form.submit()">
                        <option value="o" selected ="selected"> Seleccione Grupo</option>
                            <?php
                                $selectedSQL="SELECT * FROM grupos where curso ='$curso'";
                                $datos = mysqli_query ($con, $selectedSQL);
                                while ($fila = mysqli_fetch_array($datos)) {
                                    echo '<option value="'.$fila["idGrupo"].'">'.$fila["grupo"].'-'.$fila["capacidad"].' '.'plazas'.'</option>';
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
           
     </div>
    </div>
</div>
</body>
</html>


