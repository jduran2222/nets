<?php
include('config.php');
session_start();
$idGrupo = $_GET["idGrupo"];
$_SESSION["idGrupo"] = $idGrupo;
$grupo = $_GET["grupo"];
$_SESSION["grupo"] = $grupo;
$curso = $_GET["curso"];
$_SESSION["curso"] = $curso;
$tutor = $_GET["tutor"];
$_SESSION["tutor"] = $tutor;
$capacidad = $_GET["capacidad"];
$_SESSION["capacidad"] = $capacidad;
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
			<h2>Gestión de Grupos.<b>Lista de Asignaturas</b></h2>
		    </div>			
                </div>
        </div>  
  </div>
 <div class="container">               
            <div class ="table table-responsive">    
                <table class ="table table-bordered" style = "white-space: nowrap">
                
                    <thead>
                        <tr class = "bg-info">
                            <th>Código Grupo</th>
                            <th>Grupo</th>
                            <th>Curso:</th>
                            <th>Profesor Tutor:</th>
                            <th>Capacidad:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $idGrupo; ?></td> 
                            <td><?php echo $grupo; ?></td>
                            <td><?php echo $curso; ?></td>
                            <td><?php echo $tutor; ?></td>
                            <td><?php echo $capacidad; ?></td>
                        </tr>
                    </tbody>    
                </table>    
            </div>
 </div>   

 <div class="container"> 
 
 <div class="panel panel-default">
    <div class="panel-body">
    
    <div id="list_container">
        <?php           
           // inlcuimos la conexion con el servidor
           include('config.php');
           include('totalAsignaturasGrupo.php'); 
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
 
