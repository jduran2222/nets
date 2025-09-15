<div id="editNotasModal" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form name="edit_notas" id="edit_notas">
                                    <div class="modal-header bg bg-primary">						
						<h4 class="modal-title">Editar Notas Alumno</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">									
                                                <input type="hidden" name="edit_id1" id="edit_id1" >                            
						<input type="hidden" name="edit_id2" id="edit_id2" >  
                                                     
                                                <div class="row">
                                                    <div class="col-lg-6">
							<label>1ª Evaluación</label>
                                                        <input type="number" step = 0.1 min = "0" max = "10" name="edit_TR10" id="edit_TR10" class="form-control">
                                                    </div>	
                                                    <div class="col-lg-6">
							<label>Recuperación</label>
							<input type="number" step = 0.1 min = "0" max = "10" name="edit_TR01" id="edit_TR01" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
							<label>2ª Evaluación</label>
							<input type="number" step = 0.1 min = "0" max = "10" name="edit_TR20" id="edit_TR20" class="form-control">
                                                    </div>	
                                                    <div class="col-lg-6">
							<label>Recuperación</label>
							<input type="number" step = 0.1 min = "0" max = "10" name="edit_TR02" id="edit_TR02" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
							<label>3ª Evaluación</label>
							<input type="number" step = 0.1 min = "0" max = "10" name="edit_TR30" id="edit_TR30" class="form-control">
                                                    </div>	
                                                    <div class="col-lg-6">
							<label>Recuperación</label>
							<input type="number" step = 0.1 min = "0" max = "10" name="edit_TR03" id="edit_TR03" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
							<label>Prueba Extraordinaria de Septiembre</label>
							<input type="number" step = 0.1 min = "0" max = "10" name="edit_TR40" id="edit_TR40" class="form-control">
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
