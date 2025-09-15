<div class="modal fade" id="addGrupoPerfilModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form name="add_grupo" id="add_grupo">
            <div class="modal-header bg bg-primary">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                 </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                
                <select class="btn btn-primary" style = "text-align:left" name ="grupo" id="grupo">
                        <option value="o" selected ="selected"> Seleccione Grupo</option>
                        <?php
                            $selectedSQL="SELECT * FROM grupos where (curso = '$idCurso') and idGrupo not in"
                                . "(select idGrupo from asignaturagrupoprofesor where (idAsignatura = '$idAsignatura'))";
                                $datos = mysqli_query ($con, $selectedSQL);
                                    while ($fila = mysqli_fetch_array($datos)) {
                                        echo '<option value="'.$fila["idGrupo"].'">'.$fila["idGrupo"].'-'.$fila["grupo"].'</option>';
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

