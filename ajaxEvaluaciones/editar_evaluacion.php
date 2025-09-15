<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../config.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
        $idPrueba = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
	$prueba = mysqli_real_escape_string($con,(strip_tags($_POST["edit_prueba"],ENT_QUOTES)));
	$activada = intval($_POST["edit_estado"]);
	
        $sql1 = "select sum(activada) as total from pruebas";
        $query1 = mysqli_query($con,$sql1);
        $row = mysqli_fetch_array($query1);
        $suma = $row["total"];
        if($suma == $activada){
            echo '<script>
            alert("No puede haber dos pruebas activadas a la vez.");
        </script>';
        exit;
        }
	// UPDATE data into database
        $sql = "UPDATE pruebas SET prueba ='$prueba', activada='$activada' WHERE idPrueba='$idPrueba' ";
        $query = mysqli_query($con,$sql);
        // if product has been added successfully
        if ($query) {
            echo '<script>       
                        alert("Registro actualizado con éxito.");'.'history.back();          
                </script>';
            exit;    
    }    
  }  
        
       