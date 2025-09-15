<div id="editUsuarioModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_usr" id="edit_usr">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Editar Usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                                                
						<input type="hidden" name="edit_id"  id="edit_id" class="form-control">
                                                
						<div class="form-group">
							<label>Usuario</label>
							<input type="text" name="edit_usuario" id="edit_usuario" class="form-control" required>
						</div>	
                                                <div class="form-group">
							<label>e mail</label>
							<input type="text" name="edit_email" id="edit_email" class="form-control">
						</div>
						<div class="form-group">
							<label>Clave de Acceso</label>
							<input type="text" name="edit_password" id="edit_password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Perfil</label>
							<input type="text" name="edit_perfil" id="edit_perfil" class="form-control" required>
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
