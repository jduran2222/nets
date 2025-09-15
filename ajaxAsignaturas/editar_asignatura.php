<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif(!empty($_POST['edit_id'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
        $idAsignatura = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
	$curso = mysqli_real_escape_string($con,(strip_tags($_POST["edit_curso"],ENT_QUOTES)));
	$asignatura = mysqli_real_escape_string($con,(strip_tags($_POST["edit_titulo"],ENT_QUOTES)));
	$estado = mysqli_real_escape_string($con,(strip_tags($_POST["edit_estado"],ENT_QUOTES)));
	
    $result1 = $con->query(
    "SELECT * FROM notas where idAsignatura = '$idAsignatura'"
    );

    if ($result1->num_rows > 0) { 
        echo '<script>
        alert("Operación denegada. Hay notas registradas para esa asignatura.");
        </script>';
        exit;
    }  	
 
    $result2 = $con->query(
        "SELECT * FROM arrastres where idAsignatura = '$idAsignatura'"
    );

    if ($result2->num_rows > 0) { 
        echo '<script>
        alert("Esa asignatura aparece en los registros de matriculas de arrastre.");
        </script>';
        exit;
    }  	
 
    $result3 = $con->query(
        "SELECT * FROM notas2 where idAsignatura = '$idAsignatura'"
    );

    if ($result3->num_rows > 0) { 
        echo '<script>
         alert("Operación denegada. Hay notas registradas para esa asignatura.");
        </script>';
        exit;
    } 

    $result4 = $con->query(
        "SELECT * FROM notas_arrastre where idAsignatura = '$idAsignatura'"
    );

    if ($result4->num_rows > 0) { 
        echo '<script>
        alert("Operación denegada. Hay notas registradas para esa asignatura.");
        </script>';
        exit;
    } 

    $result5 = $con->query(
         "SELECT * FROM perfilprofesores where idAsignatura = '$idAsignatura'"
    );

    if ($result5->num_rows > 0) { 
        echo '<script>
        alert("Esa asignatura aparece en el perfil de algun profesor.");
        </script>';
        exit;
    } 
 
    $result6 = $con->query(
         "SELECT * FROM asignaturagrupoprofesor where idAsignatura = '$idAsignatura'"
    );

    if ($result6->num_rows > 0) { 
        echo '<script>
        alert("Esa asignatura está asignada a algún profesor.");
        </script>';
        exit;
    }  	
	// UPDATE data into database
    $sql = "UPDATE asignaturas SET curso='".$curso."', asignatura='".$asignatura."', estado = '".$estado."' WHERE idAsignatura='".$idAsignatura."' ";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        echo '<script>
                alert("Registro actualizado.");
            </script>';
            exit;    
        } 
        
    }