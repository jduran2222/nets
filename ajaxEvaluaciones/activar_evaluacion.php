<html>
<?php

require_once("../config.php");

$idPrueba = $_POST["prueba"];

$sql1 = "select * from pruebas WHERE activada = 1";
$query1 = mysqli_query($con,$sql1);

if($query1){

$sql2 = "UPDATE pruebas SET activada= 0 WHERE activada = 1";
$query2 = mysqli_query($con,$sql2);

$sql3 = "UPDATE pruebas SET activada= 1 WHERE idPrueba = '$idPrueba'";
$query3 = mysqli_query($con,$sql3);
if(($query2)and($query3)) {
    mysqli_close($con);
    echo '<script>   
        alert("Registro guardado con éxito.");        
    </script>';
 }
 }elseif(!$query1) {
     $sql4 = "UPDATE pruebas SET activada= 1 WHERE idPrueba = '$idPrueba'";
    $query4 = mysqli_query($con,$sql4);
    if ($query4) {
        
        echo '<script>   
            alert("Registro guardado con éxito.");
            mysqli_close($con);
        </script>';
 }  
}
