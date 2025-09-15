<div id="addMatriculaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_matricula" id="add_matricula">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Nuevo Alumno</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Código</label>
							<input type="text" name="idAlumno"  id="idAlumno" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Apellidos</label>
							<input type="text" name="apellidos" id="apellidos" class="form-control" required>
						</div>                                                     
                                                <div class="form-group">
							<label>Curso</label>
                                                        <input type="text" name="curso" id="curso" class="form-control" required>						
						</div>						
                                                <div class="form-group">
                                                        <label for="nacimiento">Fecha Nacimiento</label>
                                                        <input type="date" id="nacimiento" name="nacimiento" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                        <label for="tutor">Tutor</label>
                                                        <input type="text" id="tutor" name="tutor" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                        <label for="telefono">Teléfono</label>
                                                        <input type="text" id="telefono" name="telefono" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                        <label for="importe">Importe de la Matricula</label>
                                                        <input type="number" id="importe" name="importe" class="form-control" required>
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


