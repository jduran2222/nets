<div class="panel panel-default">
    <div class="panel-body">           
        <div class ="container">
            <div class='col-sm-4 pull-right'>
                
            </div>
        </div>    
        <div style="clear:both"></div>
    </div>
</div>

<?php
$result = $con->query(
    "SELECT miembros.idMiembro, miembros.nombre, miembros.apellidos, usuarios.idUsuario, usuarios.usuario from miembros, usuarios where (miembros.idMiembro = usuarios.idUsuario) and (usuarios.usuario = '$usuario') and (usuarios.password = '$password')"
);
?>

<?php if ($result->num_rows > 0) { ?>
    
    <table id="tabladatos" class="table">  
        
        <thead>
            <tr>  
                <th>Movimientos</th>             
                <th>Informes Finales</th>
                <th>Seguimiento de Pagos</th>     
            </tr>
        </thead>
            <tr>
               <td><a class = "btn btn-default" href="indexMovimientos.php"> Lista Movimientos</td>
                      
               <td>
                    <a class = "btn btn-default" href="indexCursos.php">Informes por Cursos               
               </td>  
               <td>
                    <a class = "btn btn-default" href="indexSeguimientoPagos.php">Seguimiento de Pagos                 
               </td>
                
            </tr>   
       
    </table>
<?php } ?>
     </div>
    </div>
</div>
</body>
</html>

