<?php
session_start();
$usuario = $_SESSION["nombre"];
?>

<!DOCTYPE html>
<html>
 <head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Netschool. Gestión de Centros Escolares</title>
<script src="jspdf/dist/jspdf.min.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css">   
    
 <style>
 .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {

    padding-right: 2px;
    padding-left: 2px;
}
 </style>
 <script>
     $(document).ready(function(){
         $("#buscador").on("keyup", function(){
           var value = $(this).val().toLowerCase();
              $("#tabladatos tr").filter(function(){
                  $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
              });
          });
     });
 </script>
 </head>
 <body>
       
 <div class="container">
  <h2>Gestión del<b> Alumnado</b></h2>
   <div class="content">
     <div class="panel panel-default">
       <div class="panel-body">
         <h3> Agregar Alumnos</h3>
         <form name = "f1" method = "POST" action ="datos_alumno.php">
           <div class="row">
              <div class="col-sm-2">
               <input type="text" id="idAlumno" name="idAlumno" class="form-control" placeholder="codigo Alumno" required>
             </div>
             <div class="col-sm-2">
               <input type="text" id="usuario" name="usuario" class="form-control" placeholder="codigo usuario" >
             </div>  
             <div class="col-sm-2">
               <input type="text" id="curso" name="curso" class="form-control" placeholder="curso" required>
             </div> 
             <div class="col-sm-2">
               <input type="text" id="nombre" name="nombre" class="form-control" placeholder="nombre" required>
             </div>
             <div class="col-sm-2">
               <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="apellidos" required>
             </div>             
           </div> 
            
           <div class="row">
              <div class="col-sm-2">
               <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" placeholder="fecha de nacimiento" required>
             </div> 
              <div class="col-sm-2">    
               <input type="text" id="tutor" name="tutor"  class="form-control" placeholder="tutor">
              </div> 
             <div class="col-sm-2">
               <input type="text" id="telefono" name="telefono"  class="form-control" placeholder="Telefono">
             </div>
              <div class="col-sm-2">
               <input type="number" id="deuda" name="deuda"  class="form-control" placeholder="Deuda Contraida" required>
             </div>
            <div class="col-sm-1">
               <input type="submit" class="btn btn-primary" value="Agregar">
             </div>   
             
           </div>
         </form>
         <div style="clear:both"></div>
       </div>
     </div>
     <hr>
     <div class="panel panel-default">
       <div class="panel-body">
         <h3> Lista de alumnos</h3>
         <div id="list_container">
           <?php   
                include('config.php');                       
           ?>
         </div>
         <!-- lista_contenedor --> 
       </div>
     </div>
   </div>
   <!-- panel 2 --> 
 </div>
 <!-- container -->
</body>
</html>
 
