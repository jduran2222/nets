<div id="deletePerfilProfesorModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-header bg bg-primary">
				<form name="delete_perfil_profesor" id="delete_perfil_profesor">
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Asignatura</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Seguro que quieres eliminar esa asignatura?</p>
						<p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
						<input type="hidden" name="delete_id" id="delete_id">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
					</div>
				</form>
			</div>
		</div>
	</div>
