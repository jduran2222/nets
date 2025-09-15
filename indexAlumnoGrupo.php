<?php
include('config.php');
session_start();
$usuario = $_SESSION["usuario"];
$password = $_SESSION["password"];
$perfil = $_SESSION["perfil"];
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
    
 
 </style>
 </head>
 <body>

<?php
$result1 =  "SELECT idGrupo from alumnos_grupo, usuarios where (idAlumno = idUsuario) and (usuario = '$usuario')";
$datos = mysqli_query($con, $result1);
$fila = mysqli_fetch_array($datos);
if(!$fila){
    echo '<script>
      alert("Ese alumno todavía no tiene ningún grupo asignado.");'.'history.back()
    </script>';
    exit; # Salir para no ejecutar el siguiente código
}
?>

<?php
$result = $con->query(
    "SELECT alumnos.idAlumno, alumnos.nombre, alumnos.apellidos, alumnos.curso, usuarios.idUsuario, usuarios.usuario, alumnos_grupo.idGrupo from alumnos, usuarios, alumnos_grupo where (alumnos.idAlumno = usuarios.idUsuario) and (alumnos_grupo.idAlumno = alumnos.idAlumno) and(usuarios.usuario = '$usuario') and(usuarios.password = '$password')"
);
?>

<?php if ($result->num_rows > 0) { ?>    
     
 <div class="container">
        <div class="table-title" style="margin: auto; height: 9%">    
                <div class="row">
                    <div class="col-sm-8">
			<h2><b> Perfil Alumno</b></h2>
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
                            <th>Curso:</th>
                            
                        </tr>
                    </thead>
                    
                    <?php while ($row = $result->fetch_assoc()) { ?>
            
                        <tr>
                            <td><?php echo $row['idGrupo']; ?></td>                           
                            <td><?php echo $row['curso']; ?></td> 
                            
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
         <h3> Información para el alumno</h3>
         <div id="list_container">
           <?php      
             include('config.php');
             include('alumnoGrupo.php');           
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
 

