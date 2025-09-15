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
<body style = "background-image: url('images/amanecer.jpg'); background-repeat: no-repeat;">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
			<h2>Gestión del Profesorado. <b>Lista General de Profesores</b></h2>
                    </div>
                    <div class="col-sm-4">
			<a href="#addProfesorModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Añadir Profesor</span></a>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">           
                    <div class ="container">
                        <form action = "ajaxProfesores/crear_pdf.php" name="consulta" id="consulta" method = "POST">
                            <div class='col-sm-2'>              
                                <input type="text" name="q" id="q" class="form-control" placeholder="Buscar por Código" onkeyup="load(1);">
                            </div>	
                            <div class='col-sm-2'>
                            <input type="submit" class="btn btn-success" value="Generar PDF">
                            </div>
                        </form>
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
	<?php include("htmlProfesores/modal_add.php");?>
	<!-- Edit Modal HTML -->
	<?php include("htmlProfesores/modal_edit.php");?>
	<!-- Delete Modal HTML -->
	<?php include("htmlProfesores/modal_delete.php");?> 
        <?php include("htmlUsuarios/modal_addUsuarioProfesor.php");?>
	<script src="jsProfesores/script.js"></script>
</body>
</html>
