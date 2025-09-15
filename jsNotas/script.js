	$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajaxNotas/listar_notas.php',
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
		$('#editNotasModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget);
		  var idAlumno = button.data('id1'); 
		  $('#edit_id1').val(idAlumno);
		  var nombre = button.data('nombre'); 
		  $('#edit_nombre').val(nombre);
		  var apellidos = button.data('apellidos'); 
		  $('#edit_apellidos').val(apellidos);
		  var idAsignatura = button.data('id2'); 
		  $('#edit_id2').val(idAsignatura);
		  var tr10 = button.data('tr10'); 
		  $('#edit_TR10').val(tr10);
                  var tr01 = button.data('tr01'); 
		  $('#edit_TR01').val(tr01);
                  var tr20 = button.data('tr20'); 
		  $('#edit_TR20').val(tr20);
                  var tr02 = button.data('tr02'); 
		  $('#edit_TR02').val(tr02);
                  var tr30 = button.data('tr30'); 
		  $('#edit_TR30').val(tr30);
                  var tr03 = button.data('tr03'); 
		  $('#edit_TR03').val(tr03);
                  var tr40 = button.data('tr40'); 
		  $('#edit_TR40').val(tr40);                  
		});
                
		$('#deleteNotasModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var id = button.data('id'); 
		  $('#delete_id').val(id);
		});
		
		$("#edit_notas" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxNotas/editar_notas.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editNotasModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
                
		$( "#add_notas" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxGrupo/guardar_notas.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addNotasModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$("#delete_notas" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajaxGrupos/eliminar_notas.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteNotasModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});