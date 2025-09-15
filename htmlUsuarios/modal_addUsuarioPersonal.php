<div id="addUsuarioPersonalModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_usuarioPersonal" id="add_usuarioPersonal">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Nuevo Usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">						
						<input type="hidden" name="idUsuario"  id="idUsuario" class="form-control" required>				
                                                <div class="form-group">
							<label>Perfil</label>
                                                        <select class ="form-control" id ="perfi" name = "perfil" required="yes">
                                                            <option value="" selected ="selected"> Seleccione Perfil</option>
                                                            <option value = 'Admin'>Administrativo</option>
                                                            <option value = 'Supervisor'>Supervisor</option>
                                                        </select>       						
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
                                                											
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>
