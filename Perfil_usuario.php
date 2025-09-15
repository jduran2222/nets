</html>
<?php
// confirmar sesion
session_start();
$Clave=$_SESSION['id'];
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div>
    <nav>
        <ul>
            <li><a href="Inicio.php">Volver a la pagina principal</a></li>
            <li><a href="cerrar-sesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
        <section id="seccion">
        <?php
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $usuario=$_SESSION['name'];
            $perfil=$_SESSION['perfil'];
            echo 'Usuario: '."$usuario"."<br>";
            echo 'Perfil: '."$perfil"."<br>";
            echo 'Clave: '."$Clave";
	?>
</section>
</div>
</body>
</html>
