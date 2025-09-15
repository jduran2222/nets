	$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxUsuarios/listar_usuarios.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
		               
		$('#editUsuarioModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var id = button.data('id'); 
		  $('#edit_id').val(id);
		  var usuario = button.data('usuario'); 
		  $('#edit_usuario').val(usuario);		  
                  var email = button.data('email'); 
		  $('#edit_email').val(email);
		  var password = button.data('password'); 
		  $('#edit_password').val(password);
                  var perfil = button.data('perfil'); 
		  $('#edit_perfil').val(perfil);
		});
                
		$('#deleteUsuarioModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idUsuario = button.data('id'); 
		  $('#delete_id').val(idUsuario);
		});
		
				
                $("#edit_usr").submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxUsuarios/editar_usuario.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editUsuarioModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
                $( "#add_usuario" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxUsuarios/guardar_usuario.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addUsuarioModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
                
		$( "#delete_usuario" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxUsuarios/eliminar_usuario.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteUsuarioModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});


