
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
 <style>
 .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {

    padding-right: 2px;
    padding-left: 2px;
}
 </style>
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
 <div class="container"> 
     <div class="table-title" style="margin: auto; height: 9%">
                <div class="row">
                    <div class="col-sm-8">
			<h3>LISTA GENERAL DE NOTAS DE <b> ALUMNOS</b></h3>
		    </div>			
                </div>
            </div>  
 </div>
       <div class="panel-body">
         
         <div id="list_container">
           <?php 
           
             // inlcuimos la conexion con el servidor
             include('config.php');
             include('listaGeneralNotas.php'); 
           ?>
         </div>
         <!-- lista_contenedor --> 
       </div>
   <!-- panel 2 --> 
 </div>
 <!-- container -->
</body>
</html>