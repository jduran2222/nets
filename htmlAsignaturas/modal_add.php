<div id="addAsignaturaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_asignatura" id="add_asignatura">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Añadir Asignatura</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
                                                    <label>id Asignatura</label>																
                                                    <input type="text" name="idAsignatura"  id="idAsignatura" class="form-control" required>
						</div>
                                                <div class="form-group">
							<label>Curso</label>
							<input type="text" name="curso" id="curso" class="form-control" required>
						</div>
                                            
						<div class="form-group">
							<label>Asignatura</label>
							<input type="text" name="asignatura" id="asignatura" class="form-control" required>
						</div>
                                                <div class="form-group">
							<label>Estado</label>
							<input type="number" name="estado" id="estado" min ="0" max ="1" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>

