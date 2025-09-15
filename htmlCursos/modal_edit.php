bh<div id="editCursoModal" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="edit_curso" id="edit_curso">
				<div class="modal-header bg bg-primary">						
					<h4 class="modal-title">Editar Curso</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
													
                                                <input type="hidden" name="edit_id" id="edit_id" >
						
                                            <div class="form-group">
						<label>Curso</label>
						<input type="text" name="edit_titulo" id="edit_titulo" class="form-control" required>
                                            </div>         
                                            <div class="form-group">
						<label>Curso</label>
						<input type="text" name="edit_curso" id="edit_curso" class="form-control" required>
                                            </div>		
                                            <div class="form-group">
						<label>Tutor</label>
						<input type="text" name="edit_tutor" id="edit_tutor" class="form-control" required>
                                            </div>
                                            <div class="form-group">
						<label>Capacidad</label>
						<input type="number" name="edit_capacidad" id="edit_capacidad" class="form-control" required>
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
