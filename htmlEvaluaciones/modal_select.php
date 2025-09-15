<div class="modal fade" id="selectPruebaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form name="select_prueba" id="select_prueba">
            <div class="modal-header bg bg-primary">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                 </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                
                <select class="form-control" id="prueba" name="prueba" required>
                    
                    <option value="" selected ="selected"> Seleccione Evaluación</option>
                    <?php
                        $selectedSQL="SELECT * FROM pruebas";
                            
                        $datos = mysqli_query ($con, $selectedSQL);
                        while ($fila = mysqli_fetch_array($datos)) {
                        echo '<option value="'.$fila["idPrueba"].'">'.$fila["prueba"].'</option>';
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

