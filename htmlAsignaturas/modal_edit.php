   <div id="editAsignaturaModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_asignatura" id="edit_asignatura">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Editar Asignatura</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
																						
                                                <input type="hidden" name="edit_id"  id="edit_id" class="form-control" required>
						
                                                <div class="form-group">
							<label>Curso</label>
							<input type="text" name="edit_curso" id="edit_curso" class="form-control" required>
						</div>
                                            
						<div class="form-group">
							<label>Asignatura</label>
							<input type="text" name="edit_titulo" id="edit_titulo" class="form-control" required>
						</div>
                                                <div class="form-group">
							<label>Estado</label>
							<input type="number" name="edit_estado" id="edit_estado" min ="0" max ="1" class="form-control" required>
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
