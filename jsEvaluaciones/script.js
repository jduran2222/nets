	$(function() {
			load(1);
		});
		function load(page){
			
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxEvaluaciones/listar_evaluaciones.php',
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			});
		}
		               
		$('#editEvaluacionModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var id = button.data('id'); 
		  $('#edit_id').val(id);
		  var evaluacion = button.data('prueba'); 
		  $('#edit_prueba').val(evaluacion);
		  var estado = button.data('estado'); 
		  $('#edit_estado').val(estado);		    
		});
                           
		$('#deleteEvaluacionModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var id = button.data('id'); 
		  $('#delete_id').val(id);
		});
		
				
                $("#edit_evaluacion").submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxEvaluaciones/editar_evaluacion.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editEvaluacionModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
                $( "#select_prueba" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxEvaluaciones/activar_evaluacion.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#selectPruebaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
                
		$( "#delete_evaluacion" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxEvaluaciones/eliminar_evaluacion.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteEvaluacionModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});