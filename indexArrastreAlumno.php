<?php
include('config.php');
session_start();
$clave = $_GET["clave"];
$_SESSION["alumno"] = $clave;
$idAlumno = $_SESSION["alumno"];
$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$curso = $_GET["curso"];
$nivel=$_GET['nivel'];
$orden = $_GET['orden'];
$anterior = $orden-1;
?>

<!DOCTYPE htmlo88
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Netschool. Gestión de Centros Escolares</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css">   
    
</head>
<body style = "background-image: url('images/amanecer.jpg'); background-repeat: no-repeat;">
  <div class="container">
        <div class="table-title" style="margin: auto; height: 9%">    
                <div class="row">
                    <div class="col-sm-8">
			<h2>Gestión del Alumnado. <b>Registrar Asignaturas Pendientes</b></h2>
		    </div>			
                </div>
        </div>  
  </div>
 <div class="container">               
    <div class ="table table-responsive">    
        <table class ="table table-bordered" style = "white-space: nowrap">             
            <thead>
                <tr class = "bg-info">
                    <th>Código Alumno:</th>
                    <th>Alumno:</th>                            
                    <th>Curso:</th>                           
                </tr>
            </thead>           
            <tbody>
                <tr>
                    <td><?php echo $idAlumno; ?></td> 
                    <td><?php echo $nombre; ?> <?php echo $apellidos; ?></td>                           
                    <td><?php echo $curso; ?></td>                            
                </tr>
            </tbody>    
        </table>    
    </div>  
 </div>   
 <div class="container"> 
     <div class="panel panel-default">
       <div class="panel-body">          
         <h3> Lista de asignaturas de arrastre</h3>
         <div id="list_container">
           <?php             
             include('totalArrastreAlumno.php'); 
           ?>
            
         </div>
       </div>   
     </div>
 </div>
</body>
</html>
 
