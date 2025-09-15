<div id="addGrupoModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_grupo" id="add_grupo">
					<div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Agregar Grupo</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						
                                                <div class="form-group"> 
                                                        <label>Curso</label>
                                                        <select class="btn btn-primary" style = "text-align:left" id ="curso" name = "curso" required="yes">
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
                                                        <label>Letra</label>
                                                        <select class="btn btn-success" id ="letra" name = "letra" required="yes">
                                                            <option value="" selected ="selected"> Seleccione una Letra</option>
                                                            <option value = 'A'>A</option>
                                                            <option value = 'B'>B</option>
                                                            <option value = 'C'>C</option>
                                                            <option value = 'D'>D</option>
                                                            <option value = 'E'>E</option>
                                                            <option value = 'F'>F</option>
                                                            <option value = 'G'>G</option>  
                                                            <option value = 'R'>Grupo de Recuperación</option> 
                                                        </select>
                                                </div>	
                                                
                                                <div class="form-group">
							<label>Código</label>
							<input type="text" name="idGrupo"  id="idGrupo" class="form-control" required>							
						</div>
						<div class="form-group">
							<label>Grupo</label>
							<input type="text" name="grupo" id="grupo" class="form-control" required>
						</div>   
						<div class="form-group">
							<label> Tutor</label>    
							
                                                        <select class="form-control" name="tutor" id="tutor" required="yes">
                                                         <option value="o" selected ="selected"> Seleccione Tutor</option>   
                                                        <?php
                                                            $consulta = mysqli_query($con, "select idProfesor, nombre, apellidos from profesores")
                                                            or die(mysqli_error($con));

                                                            $profesores = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
                                                            
                                                            foreach ($profesores as $pro) {
                                                                echo "<option value='" . $pro['idProfesor'] . "'>" . $pro['nombre'] ." ". $pro['apellidos'] ."</option>";
                                                            }
                                                        ?>
                                                        </select>
						</div>
						<div class="form-group">
							<label>Capacidad</label>
							<input type="number" name="capacidad" id="capacidad" class="form-control" required>
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
