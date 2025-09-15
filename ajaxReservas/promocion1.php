<?php
	session_start();
        
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
        
	$curso = $_SESSION['curso'];
        $orden = $_SESSION['orden'];
        $asignaturas = $_SESSION['asignaturas'];
        $orden_abs = $_SESSION['orden_abs'];
        $orden_abs_sup = $orden_abs + 1;
        
        $sql = "select idCurso from cursos where orden_abs = $orden_abs_sup";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        $curso_promo = $row["idCurso"];
          
        $sql1 = "select sum(capacidad) as capacidad_curso from grupos where curso = '$curso_promo'";
        $query1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_array($query1);
        $capacidad_curso = $row1["capacidad_curso"];
        
        $sql2 = "select count(*) as matriculados_curso from alumnos where curso = '$curso_promo'";
        $query2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_array($query2);
        $matriculados_curso = $row2["matriculados_curso"];
        
        $sql3 = "select count(*) as reservados_curso from reservas where curso = '$curso_promo'";
        $query3 = mysqli_query($con,$sql3);
        $row3 = mysqli_fetch_array($query3);
        $reservados_curso = $row3["reservados_curso"];
        
        if($matriculados_curso + $reservados_curso >= $capacidad_curso and (!$curso ==='SELEC')){
            echo '<script>
            alert("No hay plaza vacante. Cree un nuevo grupo o amplíe la capacidad de uno existente.");
        </script>';
        exit;
        }
        	
$tables="alumnos, notas";
$campos="alumnos.idAlumno, alumnos.nombre, alumnos.apellidos, alumnos.curso, notas.idAsignatura, TR10, TR01, TR20, TR02, TR30, TR03, TR40";
$ordinario ="((notas.TR10>=5 OR notas.TR01>=5) AND (notas.TR20>=5 OR notas.TR02>=5) AND (notas.TR30>=5 OR notas.TR03>=5))";
$extraordinario ="(notas.TR40>=5)";
$sWhere="((alumnos.idAlumno = notas.idAlumno) and $ordinario) and (alumnos.curso = '$curso')";
$sWhere.="OR((alumnos.idAlumno = notas.idAlumno) and $extraordinario)and (alumnos.curso = '$curso')";

// UPDATE data into database
    $sq4 = "REPLACE INTO reservas(idAlumno, nombre, apellidos, curso) SELECT alumnos.idAlumno, alumnos.nombre, alumnos.apellidos, '$curso_promo' FROM  $tables where $sWhere GROUP BY alumnos.idAlumno HAVING COUNT(DISTINCT idAsignatura) = $asignaturas";   
    $query4 = mysqli_query($con,$sq4);
    
    mysqli_close($con);
    
    if ($query4) {
        echo '<script>
        alert("Archivo Transferido.");'.'history.back(); 
    </script>';
    exit;    
        
  }  
