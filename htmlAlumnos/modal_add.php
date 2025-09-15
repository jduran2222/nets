<div id="addAlumnoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_alumno" id="add_alumno">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Nuevo Alumno</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
							<label>Código</label>
							<input type="text" name="idAlumno"  id="idAlumno" class="form-control" required>					
                                                    </div>
                                                </div>
                                            
                                                <div class="row">
                                                    <div class="col-lg-6">                                                    
							<label>Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
                                                    </div>
                                                    <div class="col-lg-6">
							<label>Apellidos</label>
							<input type="text" name="apellidos" id="apellidos" class="form-control" required>
                                                    </div>						
                                                </div>                                          
                                                <div class="form-group"> 
                                                        <label>Curso</label>
                                                        <select class="btn btn-primary text-start" style = "text-align:left" id ="curso" name = "curso" required="yes">
                                                            <option value="" selected ="selected"> Seleccione Curso</option>
                                                            <option value = 'PRM10'>PRM10-Primero</option>
                                                            <option value = 'PRM20'>PRM20-Segundo</option>
                                                            <option value = 'PRM30'>PRM30-Tercero</option>
                                                            <option value = 'PRM40'>PRM40-Cuarto</option>
                                                            <option value = 'PRM50'>PRM50-Quinto</option>
                                                            <option value = 'PRM60'>PRM60-Sexto</option>
                                                            <option value = 'ESB10'>ESB10-Primero</option>
                                                            <option value = 'ESB20'>ESB20-Segundo</option>
                                                            <option value = 'ESB30'>ESB30-Tercero</option>
                                                            <option value = 'ESB40'>ESB40-Cuarto</option>
                                                            <option value = 'BCH11'>BCH11-Ciencias de la Naturaleza y SA</option>
                                                            <option value = 'BCH12'>BCH12-Ciencias Sociales y Humanidades</option>
                                                            <option value = 'BCH13'>BCH13-Tecnología</option>
                                                            <option value = 'BCH21'>BCH21-Ciencias de la Naturaleza y SA</option>
                                                            <option value = 'BCH22'>BCH22-Ciencias Sociales y Humanidades</option>
                                                            <option value = 'BCH23'>BCH23-Tecnología</option>                       
                                                        </select>
                                                </div>					
                                                <div class="form-group">
                                                        <label for="nacimiento">Fecha Nacimiento</label>
                                                        <input type="date" id="nacimiento" name="nacimiento" class="form-control" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">  
                                                        <label for="tutor">Tutor</label>
                                                        <input type="text" id="tutor" name="tutor" class="form-control">
                                                    </div>
                                                    <div class="col-lg-6">  
                                                        <label for="telefono">Teléfono</label>
                                                        <input type="text" id="telefono" name="telefono" class="form-control">
                                                    </div>
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
