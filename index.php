<?php 
session_start();
if(isset($_GET['idma'])){
$_SESSION['la'] = $_GET['idma'];
header('Location:'.$_SERVER['PHP_SELF']);
exit();
}
if(isset($_SESSION['idma']))
{
switch($_SESSION['idma']){
case "frn":
require('idioma/frn.php'); 
break;
case "esp":
require('idioma/esp.php'); 
break; 
default: 
require('idioma/esp.php'); 
}

}else{
require('idioma/esp.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-ref
    <meta http-equiv="X-UA-Compatible"/>
    <link rel="stylesheet" href="css/custom3.css">
</head>
<nav>
    <h1> Netschool</h1>
</nav>
<body>
    
   <php
     $archivoContador ="contador.txt";
     if(is_readable($archivoContador)) {
        $contador = file_get_contents($archivoContador);
        $contador++
        $fp = fopen($archivoContador, ªwª);
        fwrite($fp,$contador);
        fclose($fp); 
        echo ªNumero de visitas: ª.$contador:
    } else {
    echo ªEl archivo de contador no existe o no se puede leer.ª;
    }
    ?>
    
    <div id=cuerpo_inicio>
    <div class="login";>
        <h1>Inicio de sesión</h1>
        <form action="autenticacion.php" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username"
            placeholder="Usuario" id="username" required>
            
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password"
            placeholder="Contraseña" id="password" required>
             <input type="submit" value="Acceder">
        </form>
    </div>
</div>
</body>
</html>
