$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxReservas/listar_reservas.php',
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
		 $('#editAlumnoModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idAlumno = button.data('id'); 
		  $('#edit_id').val(idAlumno);
		  var nombre = button.data('nombre'); 
		  $('#edit_nombre').val(nombre);
		  var apellidos = button.data('apellidos'); 
		  $('#edit_apellidos').val(apellidos);
		  var curso = button.data('curso'); 
		  $('#edit_curso').val(curso);
		  var nacimiento = button.data('nacimiento'); 
		  $('#edit_nacimiento').val(nacimiento);
                  var tutor = button.data('tutor'); 
		  $('#edit_tutor').val(tutor);
                  var telefono = button.data('telefono'); 
		  $('#edit_telefono').val(telefono);
		});  
                
                $('#addMatriculaModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idAlumno = button.data('id'); 
		  $('#idAlumno').val(idAlumno);
		  var nombre = button.data('nombre'); 
		  $('#nombre').val(nombre);
		  var apellidos = button.data('apellidos'); 
		  $('#apellidos').val(apellidos);
		  var curso = button.data('curso'); 
		  $('#curso').val(curso);
		  var nacimiento = button.data('nacimiento'); 
		  $('#nacimiento').val(nacimiento);
                  var tutor = button.data('tutor'); 
		  $('#tutor').val(tutor);
                  var telefono = button.data('telefono'); 
		  $('#telefono').val(telefono);
		});  
                
		$('#deleteAlumnoModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idAlumno = button.data('id'); 
		  $('#delete_id').val(idAlumno);
		});
		
                $("#edit_reserva").submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxReservas/editar_alumno.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
                                        
					$("#resultados").html(datos);
					load(1);
					$('#editReservaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
                $( "#add_matricula" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxReservas/guardar_alumno.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
                                        
					$("#resultados").html(datos);
					load(1);
					$('#addMatriculaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
                $( "#add_reserva" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxReservas/guardar_alumno_reserva.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
                                        
					$("#resultados").html(datos);
					load(1);
					$('#addReservaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
		$( "#delete_alumno" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxReservas/eliminar_alumno.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
                                        
					$("#resultados").html(datos);
					load(1);
					$('#deleteAlumnoModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});


