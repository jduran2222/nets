<?php
include('config.php');
session_start();
$idAsignatura = $_GET["idAsignatura"];
$_SESSION["idAsignatura"]= $idAsignatura;
$asignatura = $_GET["asignatura"];
$_SESSION["asignatura"]= $asignatura;
$curso = $_SESSION["curso"];
$_SESSION["curso"]= $curso;       
$idGrupo = $_SESSION["idGrupo"];
$_SESSION["idGrupo"]= $idGrupo;
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
         $("#buscador").on("keyup", function(){
           var value = $(this).val().toLowerCase();
              $("#tabladatos tr").filter(function(){
                  $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);
              });
          });
     });
 </script>
</head>   
 <div class="container"> 
     <div class="table-title" style="margin: auto; height: 9%">
                <div class="row">
                    <div class="col-sm-8">
			<h3><b>Gestión de Notas por Grupos</b></h3>
		    </div>
                    <form action = "notasPDF/crear_pdf.php" name="consulta" id="consulta" method = "POST">	
                        <div class='col-sm-4'>
                            
                                <input type="submit" class="btn btn-success" value="Genear PDF">
                            
                        </div>
                    </form>           
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
 

