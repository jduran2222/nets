<?php
include('config.php');
session_start();
$usuario = $_SESSION["usuario"];
$password = $_SESSION["password"];
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
<?php
$result = $con->query(
    "SELECT idProfesor, nombre, apellidos from profesores, usuarios "
        . "where (profesores.idProfesor = usuarios.idUsuario) and "
        . "(usuarios.usuario = '$usuario')"
);
?>

<?php if ($result->num_rows > 0) { ?>     
     
     
 <div class="container">
        <div class="table-title" style="margin: auto; height: 9%">    
                <div class="row">
                    <div class="col-sm-8">
			<h2>Perfil Profesor Tutor. Grupos Asignados</h2>
		    </div>			
                </div>
        </div>  
  </div>
 <div class="container">               
            <div class ="table table-responsive">    
                <table class ="table table-bordered" style = "white-space: nowrap">
                
                    <thead>
                        <tr class = "bg-info">
                            <th>id Profesor</th>                                                     
                            <th>Profesor:</th>                           
                        </tr>
                    </thead>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    
                        <tr>
                            <td><?php echo $row['idProfesor']; ?></td>                           
                            <td><?php echo $row['nombre']; ?> <?php echo $row['apellidos']; ?></td> 
                            
                        </tr>
                     <?php } ?> 
                </table>  
                <?php } ?>    
            </div>
 </div>   
 <div class="container"> 
   <div class="content">
     <div class="panel panel-default">
       <div class="panel-body">
         <h3>Lista de Grupos</h3>
         <div id="list_container">
           <?php      
             include('config.php');
             include('totalGruposTutor.php');                       
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
 