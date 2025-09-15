  <div class="modal fade" id="addArrastreAlumnoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form name="add_asignatura" id="add_asignatura">
            <div class="modal-header bg bg-primary">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                 </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <select class="btn btn-primary" style = "text-align:left" name ="asignaturas" id="asignaturas" onchange="this.form.submit()">
                        <option value="o" selected ="selected"> Seleccione Asignatura</option>
                            <?php
                                $selectedSQL="SELECT * FROM asignaturas where curso in(select idCurso from cursos where (nivel='$nivel') and (orden = '$anterior')and asignaturas.idAsignatura not in"
                                            . "(select idAsignatura from arrastres where idAlumno = '$idAlumno'))";
                                $datos = mysqli_query ($con, $selectedSQL);
                                while ($fila = mysqli_fetch_array($datos)) {
                                    echo '<option value="'.$fila["idAsignatura"].'">'.$fila["curso"].'-'.$fila["asignatura"].'</option>';
                                }
                            ?>
                    </select>
                
                </div>    
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-success" value="Validar">
            </div>
        </form>    
      </div>
    </div>
  </div>
