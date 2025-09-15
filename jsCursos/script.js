	$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxCursos/listar_cursos.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			});
		}
		$('#editGrupoModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget);
		  var id = button.data('id'); 
		  $('#edit_id').val(id);
		  var grupo = button.data('titulo'); 
		  $('#edit_titulo').val(grupo);
		  var idCurso = button.data('curso'); 
		  $('#edit_curso').val(idCurso);
		  var tutor = button.data('tutor'); 
		  $('#edit_tutor').val(tutor);
		  var capacidad = button.data('capacidad'); 
		  $('#edit_capacidad').val(capacidad);
		});
                
		$('#deleteGrupoModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idGrupo = button.data('id'); 
		  $('#delete_id').val(idGrupo);
		});
		
		$("#edit_grupo" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "ajaxGrupos/editar_grupo.php",
				data: parametros,
				beforeSend: function(objeto){
                                    $("#resultados").html("Enviando...");
				},
				success: function(datos){
				$("#resultados").html(datos);
				load(1);
				$('#editGrupoModal').modal('hide');
                            }
			});
		  event.preventDefault();
		});
                
		$( "#add_grupo" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxGrupos/guardar_grupo.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addGrupoModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$("#delete_grupo" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxGrupos/eliminar_grupo.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteGrupoModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});