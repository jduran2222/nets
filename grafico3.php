
<?php
    require('config.php');
// Conexión a la base de datos
$curso = $_GET['idCurso'];
// Consulta de datos
$query = "SELECT grupos.*, IFNULL(count(alumnos_grupo.idGrupo), 0) as asignados from grupos LEFT JOIN alumnos_grupo on (grupos.idGrupo = alumnos_grupo.idGrupo) where (grupos.curso like'%$curso%') group by grupos.idGrupo";
$result = $con->query($query);

$grupos = [];
$capacidades = [];

while ($row = $result->fetch_assoc()) {
    $grupos[] = $row['idGrupo'];
    $capacidades[] = $row['capacidad'];
    $asignados[] = $row['asignados'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    
</head>
<body> 
    <H1 style = "text-align: center"> Asignaciones por Grupos </H1>
    <h4 style = "text-align: center"> Curso: <?php echo $curso; ?> </h4>
    <canvas id="graficoBarras" style="width:100%; max-width:800px; margin: 0 auto"></canvas>
    <script>
        const ctx = document.getElementById('graficoBarras').getContext('2d');
        const datosCapacidad = {
            label: 'Capacidad',
            data: <?php echo json_encode($capacidades); ?>,
            backgroundColor: 'rgba(75, 192, 192, 1)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1   
        };
        const datosAsignados = {
            label: 'Asignados',
            data: <?php echo json_encode($asignados); ?>,
            backgroundColor: 'rgba(0, 255, 0, 1)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1   
        };
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($grupos); ?>,
                datasets: [
                  datosCapacidad,
                  datosAsignados
                ]
            },
           options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            labels: {
                                render: 'label',
                                position: 'outside'
                            }
                        }
                    }
                });         
        
    </script>
</body>
</html>
