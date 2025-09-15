<?php
    if (empty($_POST['delete_id'])){
	$errors[] = "Id vacío.";
    } elseif (!empty($_POST['delete_id'])){
	require_once ("../config.php");
        $idAlumno=intval($_POST['delete_id']);	
        $result1 = $con->query(
            "SELECT * FROM notas where idAlumno = '$idAlumno'"
    );

    if ($result1->num_rows > 0) { 
        echo '<script>
            alert("Operación denegada. Hay notas registradas para ese alumno.");
            </script>';
        exit;
    }  	
 
    $result2 = $con->query(
          "SELECT * FROM arrastres where idAlumno = '$idAlumno'"
    );

    if ($result2->num_rows > 0) { 
        echo '<script>
                alert("Ese alumno aparece en los registros de matriculas de arrastre.");
            </script>';
         exit;
    }  	
 
    $result3 = $con->query(
            "SELECT * FROM notas2 where idAlumno = '$idAlumno'"
    );

    if ($result3->num_rows > 0) { 
        echo '<script>
             alert("Operación denegada. Hay notas registradas para ese alumno.");
            </script>';
        exit;
    } 

    $result4 = $con->query(
            "SELECT * FROM notas_arrastre where idAlumno = '$idAlumno'"
    );

    if ($result4->num_rows > 0) { 
        echo '<script>
            alert("Operación denegada. Hay notas registradas para esa alumno.");
            </script>';
        exit;
    } 

    $result5 = $con->query(
        "SELECT * FROM alumnos_grupo where idAlumno = '$idAlumno'"
    );

    if ($result5->num_rows > 0) { 
        echo '<script>
          alert("Ese alumno ya tiene un grupo asignado.");
        </script>';
        exit;
     } 
 
    $result6 = $con->query(
        "SELECT * FROM registro_pagos where alumno = '$idAlumno'"
    );

    if ($result6->num_rows > 0) { 
        echo '<script>
          alert("Ese alumno tiene una cuenta abierta con el centro.");
        </script>';
        exit;
     }  	
	
    $result7 = "DELETE FROM  alumnos WHERE idAlumno='$idAlumno'";
    $query = mysqli_query($con,$result7);
      if ($query) {
        echo '<script>
            alert("Registro eliminado.");
        </script>';
        exit;    
    }     
}