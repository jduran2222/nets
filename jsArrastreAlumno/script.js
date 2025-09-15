$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxArrastreAlumno/listar_arrastres.php',
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
				url: "ajaxArrastreAlumno/guardar_arrastre.php",
				data: parametros,
				beforeSend: function(objeto){
					$("#resultados").html("Enviando...");
				  },
				success: function(datos){
				$("#resultados").html(datos);
			load(1);
                        $('#addArrastreAlumnoModal').modal('hide');
			}
                    });
		  event.preventDefault();
		});

                $('#deleteArrastreAlumnoModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idAsignatura = button.data('id'); 
		  $('#delete_id').val(idAsignatura);
		});
                
                $( "#delete_arrastre_alumno" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxArrastreAlumno/eliminar_asignatura.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteArrastreAlumnoModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
