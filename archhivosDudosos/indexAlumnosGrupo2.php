<?php
include('config.php');
session_start();
$idGrupo = $_GET["idGrupo"];
$_SESSION ["grupo"] =  $idGrupo;
$grupo = $_GET['grupo'];
$_SESSION ["grupo"] =  $grupo;
$curso = $_GET['curso'];
$_SESSION ["curso"] =  $curso;
$tutor = $_GET['tutor'];
$_SESSION ["tutor"] =  $tutor;
$capacidad = $_GET['capacidad'];
$_SESSION ["capacidad"] =  $capacidad;
?>

<!DOCTYPE html>
<html lang="en">
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
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
			<h2>Formación de Grupos y Opciones de Alumno</h2>
                    </div>
                    <div class="col-sm-4">
			<a href="#addAlumnoGrupoModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Añadir Alumno</span></a>
                    </div>
                </div>
            </div>
        <div class="panel panel-default">
        <div class="panel-body">           
            <div class ="container">                
                    <div class='col-sm-6'> 
                        <?php
                        echo "<b>id Grupo:</b> ".$idGrupo;
                        echo "<br>";
                        echo "<b>Grupo:</b> ".$grupo;
                        echo "<br>";
                        echo "<b>Curso:</b> ".$curso;
                        echo "<br>";
                        echo "<b>Tutor:</b> ".$tutor;
                        echo "<br>";
                        echo "<b>Capacidad:</b> ".$capacidad;
                        ?>    
                    </div>                                                                
            </div>	
        </div>
        </div>                     
	<div class='clearfix'></div>
	<hr>
	<div id="loader"></div><!-- Carga de datos ajax aqui -->
	<div id="resultados"></div><!-- Carga de datos ajax aqui -->
	<div class='outer_div'></div><!-- Carga de datos ajax aqui -->		
    </div>
    </div>
	<!-- Edit Modal HTML -->
        <?php include("htmlAlumnosGrupo/modal_delete.php");?>
        <?php include("htmlAlumnosGrupo/modal_add.php");?>
        <script src="jsAlumnosGrupo/script.js"></script>
</body>
</html>

