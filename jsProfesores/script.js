$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxProfesores/listar_profesores.php',
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
                
                $('#addUsuarioProfesorModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idUsuario = button.data('id'); 
		  $('#idUsuario').val(idUsuario);
		  $('#perfil').val('Profesor');
		});  
                
		 $('#editProfesorModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idProfesor = button.data('id'); 
		  $('#edit_id').val(idProfesor);
                  var usuario = button.data('usuario'); 
		  $('#edit_usuario').val(usuario);
		  var nombre = button.data('nombre'); 
		  $('#edit_nombre').val(nombre);
		  var apellidos = button.data('apellidos'); 
		  $('#edit_apellidos').val(apellidos);		  
                  var telefono = button.data('telefono'); 
		  $('#edit_telefono').val(telefono);
		});  
                           
		$('#deleteProfesorModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idProfesor = button.data('id'); 
		  $('#delete_id').val(idProfesor);
		});
		
                $("#edit_profesor").submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxProfesores/editar_profesor.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editProfesorModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
                $( "#add_profesor" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxProfesores/guardar_profesor.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addProfesorModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
                $( "#add_usuarioProfesor" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxProfesores/guardar_usuarioProfesor.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){                      
					$("#resultados").html(datos);
					load(1);
					$('#addUsuarioProfesorModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
		$( "#delete_profesor" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxProfesores/eliminar_profesor.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteProfesorModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
