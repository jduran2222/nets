
<?php
    require('config.php');
// Conexión a la base de datos
$curso = $_GET['idCurso'];
$asignaturas = $_GET['asignaturas'];
// Consulta de datos

$tables="alumnos, alumnos_grupo, notas";
$campos="alumnos.idAlumno, alumnos.nombre, alumnos.apellidos, alumnos.curso, notas.idAsignatura, TR10, TR01, TR20, TR02, TR30, TR03, TR40";
$ordinario ="((notas.TR10>=5 OR notas.TR01>=5) AND (notas.TR20>=5 OR notas.TR02>=5) AND (notas.TR30>=5 OR notas.TR03>=5))";
$extraordinario ="(notas.TR40>=5)";
$sWhere="((alumnos.idAlumno = alumnos_grupo.idAlumno) and (alumnos.idAlumno = notas.idAlumno) and $ordinario) and (alumnos.curso = '$curso')";
$sWhere.="OR((alumnos.idAlumno = alumnos_grupo.idAlumno) and (alumnos.idAlumno = notas.idAlumno) and $extraordinario)and (alumnos.curso = '$curso')";
	
	
$query = "SELECT alumnos_grupo.idGrupo, count(distinct(alumnos_grupo.idAlumno)) as promocionados from alumnos_grupo where alumnos_grupo.idAlumno in (select alumnos_grupo.idAlumno FROM alumnos_grupo, notas where (alumnos_grupo.idAlumno = notas.idAlumno) and ($ordinario or $extraordinario) GROUP BY alumnos_grupo.idAlumno HAVING (COUNT(DISTINCT idAsignatura) = '$asignaturas'))";
$result = $con->query($query);

$grupos = [];
$capacidades = [];

while ($row = $result->fetch_assoc()) {
    $grupos[] = $row['idGrupo'];
    $capacidades[] = 40;
    $promocionados[] = $row['promocionados'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body> 
    <H1 style = "text-align: center"> Promocionados por Grupos </H1>
    <canvas id="graficoBarras" style="width:100%; max-width:800px; margin: 0 auto"></canvas>
    <script>
        const ctx = document.getElementById('graficoBarras').getContext('2d');
        const datosCapacidad = {
            label: 'Capacidad',
            data: <?php echo json_encode($capacidades); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1   
        };
        const datosPromocionados = {
            label: 'Promocionados',
            data: <?php echo json_encode($promocionados); ?>,
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1   
        };
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($grupos); ?>,
                datasets: [
                  datosCapacidad,
                  datosPromocionados
                ]
            }
        });
    </script>
</body>
</html>
