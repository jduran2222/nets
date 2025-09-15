<?php
session_start();
$_SESSION["clave"] = $_GET["clave"];
$idAlumno = $_SESSION["clave"];
$_SESSION["curso"] = $_GET["curso"];
$curso = $_SESSION["curso"];
$_SESSION["grupo"] = $_GET["grupo"];
$grupo = $_SESSION["grupo"];
$_SESSION["nombre"] = $_GET["nombre"];
$nombre = $_SESSION["nombre"];
$_SESSION["apellidos"] = $_GET["apellidos"];
$apellidos = $_SESSION["apellidos"];
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE htmlo88
 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>Netschool. Gestión de Centros Escolares</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css">   
 
<script>
    $(document).ready(function(){
        $("#tabladatos tbody tr td").each(function(){
            if(($(this).val()<5) ){
                $(this).css("background-color":"yellow");
            });
        });
    };
 </script>
 
 </head>
 <body style = "background-image: url('images/amanecer.jpg'); background-repeat: no-repeat;">   
 <div class="container"> 
     <div class="table-title" style="margin: auto; height: 9%">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 style="text-align: center"><b> BOLETIN ESCOLAR </b></h2>
		    </div>			
                </div>
    </div>  
 </div>
 <div class="panel-body">    
         <div id="list_container">
           <?php       
             // inlcuimos la conexion con el servidor
             include('config.php');
             include('listar_boletin.php'); 
           ?>
         </div>
         <!-- lista_contenedor --> 
       </div>
   <!-- panel 2 --> 
 </div>
 <!-- container -->

</body>
</html>


