$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxAsignacionesProfesor/listar_asignaciones.php',
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
		                
				
		$("#add_grupo" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "ajaxAsignacionesProfesor/guardar_asignacion.php",
				data: parametros,
				beforeSend: function(objeto){
					$("#resultados").html("Enviando...");
				  },
				success: function(datos){
				$("#resultados").html(datos);
			load(1);
                        $('#addGrupoPerfilModal').modal('hide');
			}
                    });
		  event.preventDefault();
		});

                $('#deleteAsignacionModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idGrupo = button.data('id'); 
		  $('#delete_id').val(idGrupo);
		});
                
                $( "#delete_asignacion" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxAsignacionesProfesor/eliminar_asignacion.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteAsignacionModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});



