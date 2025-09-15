<div id="editAlumnoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_reserva" id="edit_reserva">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Editar Alumno</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
                                                        <input type="hidden" name="edit_id" id="edit_id" class="form-control">
						</div>
						
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="edit_nombre" id="edit_nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Apellidos</label>
							<input type="text" name="edit_apellidos" id="edit_apellidos" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Curso</label>
							<input type="text" name="edit_curso" id="edit_curso" class="form-control" required>
						</div>	
                                                <div class="form-group">
                                                        <label>Fecha Nacimiento</label>
                                                        <input type="date" name="edit_nacimiento" id="edit_nacimiento"  class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                        <label>Tutor</label>
                                                        <input type="text" id="edit_tutor" name="edit_tutor" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                        <label>Telefono de Contacto</label>
                                                        <input type="text" id="edit_telefono" name="edit_telefono" class="form-control">
                                                </div>                             
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Actualizar datos">
					</div>
				</form>
			</div>
		</div>
	</div>


