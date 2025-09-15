<?php
session_start();
$clave = $_GET["clave"];
$_SESSION["alumno"] = $clave;
$alumno = $_SESSION["alumno"];
$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$curso = $_GET['curso'];
$fecha = date("d/m/a");
?>

<!DOCTYPE html>
<html>
 <head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Netschool. Gestión de Centros Escolares </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css">

</head>
 <body>
  <div class="container">
        <div class="table-title" style="margin: auto; height: 9%">    
                <div class="row">
                    <div class="col-sm-8">
			<h2>Gestión de Pagos. <b>Registrar Pago</b></h2>
		    </div>			
                </div>
        </div>  
  </div>
 <div class="container">               
            <div class ="table table-responsive">    
                <table class ="table table-bordered" style = "white-space: nowrap">               
                    <thead>
                        <tr class = "bg-info">
                            <th>Código Alumno</th>
                            <th>Alumno:</th>                          
                            <th>Curso:</th>                            
                        </tr>
                    </thead>        
                    <tbody>
                        <tr>
                            <td><?php echo $alumno; ?></td> 
                            <td><?php echo $nombre; ?> <?php echo $apellidos; ?></td>                            
                            <td><?php echo $curso; ?></td>                             
                        </tr>
                    </tbody>    
                </table>    
            </div>
 </div>
 <div class="container">
   <div class="content">
     <div class="panel panel-default"> 
       <div class="panel-body">
         <form class = "form-inline" name = "f1" method = "POST" action ="datosPago.php">
           <div class="row">
               <div class="form-group">
                   <input type="date" id="fecha" name="fecha" class="form-control" required="yes">
               </div>   
               <div class="form-group">	
                   <select class ="form-control" id ="concepto" name = "concepto" required="yes">
                        <option value="" selected ="selected"> Seleccione Concepto</option>
                        <option>Formalización Matricula</option>
                  	<option>Pago Parcial Matricula</option>
                        <option>Pago Uniforme</option>
                        <option>Excención de Pago</option>
                        <option>Servicios en Linea</option>
                        <option>Otros Pagos</option>
                   </select>
		</div>
               <div class="form-group">
                   <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción Pago" required="yes">
               </div> 
               <div class="form-group">
                   <input type="number" id="monto" name="monto" class="form-control" placeholder="Monto Pago" required="yes">
               </div> 
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar">
                </div>    
           </div>
         </form>
         <div style="clear:both"></div>
       </div>
     </div>
     <div class="panel panel-default">
       <div class="panel-body">
         <h3>Pagos Realizados</h3>
         <div id="list_container">
           <?php 
                // inlcuimos la conexion con el servidor
                include('config.php');               
                // Incluir para ver la totalidad de alumnos
               include('totalPagos.php'); 
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
