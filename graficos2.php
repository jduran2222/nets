<?php
    require('config.php');
// Conexión a la base de datos
$curso = $_GET['idCurso'];
$idAsignatura = $_GET['idAsignatura'];
$asignatura = $_GET['asignatura'];
// Consulta de datos


$query = "select alumnos_grupo.idGrupo, count(distinct(alumnos_grupo.idAlumno)) as asignados, count(CASE WHEN TR10>=5 THEN 1 END ) as aprobados from alumnos_grupo LEFT JOIN notas on (alumnos_grupo.idAlumno = notas.idAlumno) where
alumnos_grupo.idGrupo in (select idGrupo from grupos where curso = '$curso') and notas.idAsignatura = '$idAsignatura' GROUP by alumnos_grupo.idGrupo";
$result = $con->query($query);

$grupos = [];
$asignados = [];
$aprobados = [];

while ($row = $result->fetch_assoc()) {
    $grupos[] = $row['idGrupo'];
    $asignados[] = $row['asignados'];
    $aprobados[] = $row['aprobados'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</head>
<body> 
    <H1 style = "text-align: center"> Aprobados por Grupo </H1>
    <h4 style = "text-align: center"> Asignatura: <?php echo $asignatura; ?> </h4>
    <h4 style = "text-align: center"> Curso: <?php echo $curso; ?> </h4>
    <canvas id="graficoBarras" style="width:100%; max-width:800px; margin: 0 auto"></canvas>
    <script>
        const ctx = document.getElementById('graficoBarras').getContext('2d');
        const datosAsignados = {
            label: 'Asignados',
            data: <?php echo json_encode($asignados); ?>,
            backgroundColor: 'rgba(75, 192, 192, 1)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1   
        };
        const datosAprobados = {
            label: 'Aprobados',
            data: <?php echo json_encode($aprobados); ?>,
            backgroundColor: 'rgba(0, 255, 0, 1)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1   
        };
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($grupos); ?>,
                datasets: [
                  datosAsignados,
                  datosAprobados
                ]
            }
        });
    </script>
</body>
</html>
