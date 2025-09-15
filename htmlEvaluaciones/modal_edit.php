<div id="editEvaluacionModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_evaluacion" id="edit_evaluacion">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Editar Evaluación</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							
							<input type="hidden" name="edit_id" id="edit_id">
						</div>
						<div class="form-group">
							<label>Evaluación</label>
							<input type="text" name="edit_prueba" id="edit_prueba" class="form-control">
						</div>
						<div class="form-group">
							<label>Estado</label>
							<input type="number" name="edit_estado" id="edit_estado" min = '0' max = '1' class="form-control">
						</div>
									
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>
