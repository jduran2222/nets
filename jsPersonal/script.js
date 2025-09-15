$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxPersonal/listar_personal.php',
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
                
                $('#addUsuarioPersonalModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idUsuario = button.data('id'); 
		  $('#idUsuario').val(idUsuario);
		});  
                
		 $('#editPersonalModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idPersonal = button.data('id'); 
		  $('#edit_id').val(idPersonal);                  
		  var nombre = button.data('nombre'); 
		  $('#edit_nombre').val(nombre);
		  var apellidos = button.data('apellidos'); 
		  $('#edit_apellidos').val(apellidos);		  
                  var telefono = button.data('telefono'); 
		  $('#edit_telefono').val(telefono);
                  var puesto = button.data('puesto'); 
		  $('#edit_puesto').val(puesto);
		});  
                           
		$('#deletePersonalModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var idPersonal = button.data('id'); 
		  $('#delete_id').val(idPersonal);
		});
		
                $("#edit_personal").submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxPersonal/editar_personal.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editPersonalModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
                $( "#add_personal" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxPersonal/guardar_personal.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addPersonalModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
                $( "#add_usuarioPersonal" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxPersonal/guardar_usuarioPersonal.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){                      
					$("#resultados").html(datos);
					load(1);
					$('#addUsuarioPersonalModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
		$( "#delete_personal" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxPersonal/eliminar_personal.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deletePersonalModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
