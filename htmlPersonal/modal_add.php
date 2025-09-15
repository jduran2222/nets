<div id="addPersonalModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="add_personal" id="add_personal">
				<div class="modal-header bg bg-primary">						
					<h4 class="modal-title">Agregar Personal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Código</label>
						<input type="text" name="idPersonal"  id="idPersonal" class="form-control" required>	
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
						<label>Puesto</label>
                                                <select class="btn btn-primary" id ="puesto" name = "puesto" required="yes">
                                                            <option value="" selected ="selected"> Seleccione Puesto</option>
                                                            <option value = 'Secretario'>Secretario</option>
                                                            <option value = 'Admin'>Administrativo</option>
                                                            <option value = 'Jefe de Estudios'>Jefe de Estudios</option>
                                                            <option value = 'Director'>Director</option>
                                                             <option value = 'Sub Director'>Sub Director</option>                    
                                                        </select>
					</div>
					<div class="form-group">
						<label>Teléfono</label>
						<input type="text" name="telefono" id="telefono" class="form-control" required>
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
