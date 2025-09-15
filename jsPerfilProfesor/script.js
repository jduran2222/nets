$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxPerfilProfesor/listar_perfil.php',
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
		                
				
		$("#add_asignatura" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "ajaxPerfilProfesor/guardar_perfil.php",
				data: parametros,
				beforeSend: function(objeto){
					$("#resultados").html("Enviando...");
				  },
				success: function(datos){
				$("#resultados").html(datos);
			load(1);
                        $('#addPerfilProfesorModal').modal('hide');
			}
                    });
		  event.preventDefault();
		});

                $('#deletePerfilProfesorModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idAsignatura = button.data('id'); 
		  $('#delete_id').val(idAsignatura);
		});
                
                $( "#delete_perfil_profesor" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxPerfilProfesor/eliminar_asignatura.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deletePerfilProfesorModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
