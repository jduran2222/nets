	$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query, 'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxAsignaturas/listar_asignaturas.php',
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
		               
		$('#editAsignaturaModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idAsignatura = button.data('id'); 
		  $('#edit_id').val(idAsignatura);
		  var curso = button.data('curso'); 
		  $('#edit_curso').val(curso);
		  var asignatura = button.data('titulo'); 
		  $('#edit_titulo').val(asignatura);
		  var estado = button.data('estado'); 
		  $('#edit_estado').val(estado);		  
		});
                           
		$('#deleteAsignaturaModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idAsignatura = button.data('id'); 
		  $('#delete_id').val(idAsignatura);
		});		
				
                $("#edit_asignatura").submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxAsignaturas/editar_asignatura.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
                                        
					$("#resultados").html(datos);
					load(1);
					$('#editAsignaturaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
                $( "#add_asignatura" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxAsignaturas/guardar_asignatura.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
                                        
					$("#resultados").html(datos);
					load(1);
					$('#addAsignaturaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
                
		$( "#delete_asignatura" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxAsignaturas/eliminar_asignatura.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
                                        
					$("#resultados").html(datos);
					load(1);
					$('#deleteAsignaturaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});