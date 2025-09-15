<div id="addUsuarioAlumnoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_usuarioAlumno" id="add_usuarioAlumno">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Nuevo Usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Código</label>
							<input type="text" name="idUsuario"  id="idUsuario" class="form-control" required>	
						</div>
						<div class="form-group">
							<label>Usuario</label>
							<input type="text" name="usuario" id="usuario" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="text" name="password" id="password" class="form-control" required>
						</div>
                                                <div class="form-group">
							<label>email</label>
                                                        <input type="text" name="email" id="email" class="form-control">						
						</div>              
                                                <div class="form-group">
							<label>Perfil</label>
                                                        <input type="text" name="perfil" id="perfil" class="form-control" required>						
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

