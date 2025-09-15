
  <div class="modal fade" id="addPerfilProfesorModal" tabindex="-1" role="dialog">
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
                
                <select class="btn btn-primary" style = "text-align:left" id="asignatura" name="asignatura" required>
                    <option value="" selected ="selected"> Seleccione Asignatura</option>
                    <?php
                        $consulta = mysqli_query($con, "select idAsignatura, asignatura, curso from asignaturas")
                        or die(mysqli_error($con));
                        $asignaturas = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
                        foreach ($asignaturas as $asig) {
                             echo "<option value='" . $asig['idAsignatura'] . "'>". $asig['curso'].'-'. $asig['asignatura']."</option>";
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
