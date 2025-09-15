<div id="addPagoModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="add_pago" id="add_pago">
				<div class="modal-header bg bg-primary">						
					<h4 class="modal-title">Agregar Pago</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Fecha</label>
						<input type="date" name="fecha"  id="fecha" class="form-control" required>	
					</div>
						
					<div class="form-group">
						
                                                <select class="btn btn-primary" id ="concepto" name ="concepto" required ="yes">
                                                    <option value ="" selected="selected">Seleccione Concepto</option>
                                                    <option>Formalización Matricula</option>
                                                    <option>Pago Parcial Matricula</option>
                                                    <option>Pago Uniforme</option>
                                                    <option>Excención de Pago</option>
                                                    <option>Servicios en Línea</option>
                                                    <option>Otros Pagos</option>
                                                </select>
					</div>
                                        <div class="form-group">
                                                <select class="btn btn-primary" id ="cuenta" name ="cuenta" required ="yes">
                                                    <option value ="" selected="selected">Seleccione Cuenta</option>
                                                    <option>Caja</option>
                                                    <option>Banco</option>                  
                                                </select>						
					</div>
                                        <div class="form-group">
						<label>Nº Doc.</label>
						<input type="number" name="documento" id="documento" class="form-control">
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<input type="text" name="descripcion" id="descripcion" class="form-control" required>
					</div>
                                        
					<div class="form-group">
						<label>Monto</label>
						<input type="number" name="monto" id="monto" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" value="Guardar datos">
				</div>
			</form>
		</div>
	</div>
</div>
