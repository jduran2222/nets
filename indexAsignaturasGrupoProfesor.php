<?php
include('config.php');
session_start();
$idProfesor = $_SESSION["profesor"];
$usuario = $_SESSION["usuario"];
$_SESSION["asignatura"] = $_GET["asignatura"];
$idAsignatura = $_SESSION["asignatura"];
$_SESSION["curso"] = $_GET["curso"];
$idCurso = $_SESSION["curso"];
$sql = "select count(*) from asignaturas where (idAsignatura = '$idAsignatura') and (estado = '0')";
$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_row($result);
$num_rows = $rows[0];

if($num_rows > 0) {
    echo '<script>
        alert("Esa asignatura no está activada.");
        window.history.back();
    </script>';           
    exit;    
}
?>

<!DOCTYPE htmlo88

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
			<h2>Perfil Profesor</h2>
		    </div>			
                </div>
        </div>  
</div>
 <div class="container">               
    <div class ="table table-responsive">    
        <table class ="table table-bordered" style = "white-space: nowrap">             
            <thead>
                <tr class = "bg-info">
                    <th>Código Profesor</th>
                    <th>Código Asignatura:</th>                            
                    <th>Curso:</th>                           
                </tr>
            </thead>           
            <tbody>
                <tr>
                    <td><?php echo $idProfesor; ?></td> 
                    <td><?php echo $idAsignatura; ?></td>                           
                    <td><?php echo $idCurso; ?></td>                            
                </tr>
            </tbody>    
        </table>    
    </div>
</div>   
<div class="container"> 
    <div class="panel panel-default">
       <div class="panel-body">
           <h3>Grupos Asignados</b></h3>
           <div id="list_container">
              <?php             
                include('totalAsignaturaGrupoProfesor.php')
              ?>
           </div>
       </div>  
    </div>
</div>
</body>
</html>

