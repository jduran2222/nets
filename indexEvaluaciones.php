<?php
include('config.php');
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
<script src="js/sweetalert2.all.min.js"></script>   
</head>
<body style = "background-image: url('images/amanecer.jpg'); background-repeat: no-repeat;"> 
  <div class="container">
        <div class="table-title" style="margin: auto; height: 9%">    
                <div class="row">
                    <div class="col-sm-8">
			<h2>Gestión de<b> Evaluaciones</b></h2>
		    </div>			
                </div>
        </div>  
  </div>
<div class="container"> 
     <div class="panel panel-default">
       <div class="panel-body">          
         <h3> Lista de Evaluaciones</h3>
         <div id="list_container">
           <?php             
             include('totalEvaluaciones.php'); 
           ?>    
         </div>
       </div>   
     </div>
 </div>
</body>
</html>