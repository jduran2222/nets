<?php
include('config.php');
session_start();
$idAsignatura = $_GET["clave"];
$asignatura = $_GET["asignatura"];
$curso = $_GET["curso"];
$idGrupo = $_GET["grupo"];
    
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>

 <script>
     $(document).ready(function(){
         $("#buscador").on("keyup", function(){
           var value = $(this).val().toLowerCase();
              $("#tabladatos tr").filter(function(){
                  $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);
              });
          });
     });
 </script>
   
 <div class="container"> 
     <div class="table-title" style="margin: auto; height: 9%">
                <div class="row">
                    <div class="col-sm-8">
			<h3>Perfil Profesor<b> Notas de Alumno</b></h3>
		    </div>			
                </div>
     </div>  
 </div>
 <div class="panel-body">        
    <div id="list_container">
        <?php 
           include('config.php');
           include('listarNotasGrupo.php'); 
        ?>
    </div>
  </div>
 

