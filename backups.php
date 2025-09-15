<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "SBDCE";

// Crear conexión
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

// Verificar conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$tablasARespaldar = [];

$selectSQL = "SHOW TABLES";
  // Ejecuta la sentencia
$tablas = mysqli_query ($conexion, $selectSQL);

while ($fila = $tablas->fetch_row()) {
    $tablasARespaldar[] = $fila[0];
    
}

foreach ($tablasARespaldar as $nombreDeLaTabla) {
    
$archivo_respaldo = "/Backups/".$nombreDeLaTabla.date('Ymd').".sql";

if(file_exists($archivo_respaldo)){
    echo "La copia de seguridad de $nombreDeLaTabla ya existe. Reescribiendo...<br>";
    
}
if(copy($nombreDeLaTabla, $archivo_respaldo)){
    echo "Archivo copiado con éxito. \n";
}else {
   echo "Error al copiar el archivo. \n";
}
// Consulta SQL para crear el respaldo
if(!file_exists($archivo_respaldo)){
    $sql = "SELECT * INTO OUTFILE '$archivo_respaldo' FROM $nombreDeLaTabla";
if (mysqli_query($conexion, $sql)) {
    echo "Guardando ".$archivo_respaldo."<br>";
} 
}

}
echo"<br>";
echo "Copia de Seguridad creada con éxito";     
// Cerrar la conexión
mysqli_close($conexion);
?>
