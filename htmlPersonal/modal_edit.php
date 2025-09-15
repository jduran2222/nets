<div id="editPersonalModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="edit_personal" id="edit_personal">
				<div class="modal-header bg bg-primary">						
					<h4 class="modal-title">Editar Datos de Personal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">                                                
                                        <input type="hidden" name="edit_id" id="edit_id">                                               
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="edit_nombre" id="edit_nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Apellidos</label>
						<input type="text" name="edit_apellidos" id="edit_apellidos" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Teléfono</label>
						<input type="text" name="edit_telefono" id="edit_telefono" class="form-control" required>
					</div>	
                                        <div class="form-group">
						<label>Puesto</label>
						<input type="text" name="edit_puesto" id="edit_puesto" class="form-control" required>
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
