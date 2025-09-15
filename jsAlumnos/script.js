	$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query, 'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxAlumnos/listar_alumnos.php',
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
                
                $('#addUsuarioAlumnoModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idUsuario = button.data('id'); 
		  $('#idUsuario').val(idUsuario);
		  $('#perfil').val('Alumno');
		});  
                
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
                           
		$('#deleteAlumnoModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idAlumno = button.data('id'); 
		  $('#delete_id').val(idAlumno);
		});
		
                $("#edit_alumno").submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxAlumnos/editar_alumno.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
                                        
					$("#resultados").html(datos);
					load(1);
					$('#editAlumnoModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
                $( "#add_alumno" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxAlumnos/guardar_alumno.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
                                        
					$("#resultados").html(datos);
					load(1);
					$('#addAlumnoModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
                $( "#add_usuarioAlumno" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "ajaxAlumnos/guardar_usuarioAlumno.php",
				data: parametros,
				 beforeSend: function(objeto){
					$("#resultados").html("Enviando...");
				  },
				success: function(datos){
				$("#resultados").html(datos);                                        
				load(1);
				$('#addUsuarioAlumnoModal').modal('hide');
                                }
			});
		  event.preventDefault();
		});
                
		$( "#delete_alumno" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxAlumnos/eliminar_alumno.php",
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