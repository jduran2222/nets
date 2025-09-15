<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema de Facturación </title>
<script src="jspdf/dist/jspdf.min.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/custom.css">
</head>

<body>

  <?php
  require("conexion.php");
  
  $consulta = mysqli_query($con, "insert into facturas() values ()")
    or die(mysqli_error($con));
  $codigofactura = mysqli_insert_id($con);
  ?>
    
    
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
			<h2>Facturación</h2>
                    </div>
                    <div class="col-sm-6">
			<a href="#ModalProducto" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Producto</span></a>
                    </div>
                </div>
            </div>             
        <div class="panel panel-default">
            <div class="panel-body">           
                <div class ="container">
                    <div class='col-sm-4 pull-right'>
                        <button id = "GenerarPDF" class = "btn btn-default" type = "button" onclick = "crear_pdf4.php">Imprimir factura</button>
                    </div>              
                </div>
            </div>          
        </div>	     
        <div class="container">
        <div class="row mt-4">
            <div class="col-md">

                <div class="form-group row">
                    <label for="CodigoFactura" class="col-lg-3 col-form-label">Número de factura:</label>
                    <div class="col-lg-3">
                        <input type="text" disabled class="form-control" id="CodigoFactura" value="<?php echo $codigofactura; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Fecha" class="col-lg-3 col-form-label">Fecha de emisión:</label>
                    <div class="col-lg-3">
                        <input type="date" class="form-control" id="Fecha">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="CodigoCliente" class="col-lg-3 col-form-label">Cliente:</label>
                    <div class="col-lg-3">
                        <select class="form-control" id="CodigoCliente">
                        <?php
                            $consulta1 = mysqli_query($con, "select codigo_cliente, nombre from clientes")
                            or die(mysqli_error($con));
                            $clientes = mysqli_fetch_all($consulta1, MYSQLI_ASSOC);

                            echo "<option value='0'>Seleccionar Cliente</option>";
                            foreach ($clientes as $cli) {
                                echo "<option value='" . $cli['codigo'] . "'>" . $cli['nombre'] . "</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
      <div class="col-md">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Código Artículo</th>
              <th>Descripción</th>
              <th class="text-right">Cantidad</th>
              <th class="text-right">Precio Unitario</th>
              <th class="text-right">Total</th>
              <th class="text-right"></th>
            </tr>
          </thead>
          <tbody id="DetalleFactura">

          </tbody>
        </table>       
      </div>
       
    </div>
</div>
</div>
    
 <script>
    document.addEventListener('DOMContentLoaded', function() {

      var producto[];
      var cliente;

      document.getElementById('Fecha').valueAsDate = new Date();

      //Boton que muestra el diálogo de agregar producto
      $('#btnAgregarProducto').click(function() {
        LimpiarFormulario();
        $("#Cantidad").val("1");
        $("#ModalProducto").modal();
      });

      //Boton que agrega el producto al detalle
      $('#btnConfirmarAgregarProducto').click(function() {
        RecolectarDatosFormulario();
        $("#ModalProducto").modal('hide');
        if ($("#Cantidad").val() === "") { //Controlamos que no esté vacío la cantidad de productos
          alert('no puede estar vacío la cantidad de productos.');
          return;
        }
        EnviarInformacionProducto("agregar");
      });

      //Boton terminar factura
      $('#btnTerminarFactura').click(function() {
        $("#ModalFinFactura").modal();
      });

      //Boton confirmar factura
      $('#btnConfirmarFactura').click(function() {
        if ($('#CodigoCliente').val()=== 0) {
          alert('Debe seleccionar un cliente');
          return;
        }
        RecolectarDatosCliente();
        EnviarInformacionFactura("confirmarfactura");
      });

      //Boton que descarta la factura generada borrando tanto en la tabla de facturas como detallefactura
      $('#btnConfirmarDescartarFactura').click(function() {
        RecolectarDatosCliente();
        EnviarInformacionFactura("confirmardescartarfactura");
      });

      //Boton confirmar factura y ademas genera pdf
      $('#btnConfirmarImprimirFactura').click(function() {
        if ($('#CodigoCliente').val() === 0) {
          alert('Debe seleccionar un cliente');
          return;
        }
        RecolectarDatosCliente();
        EnviarInformacionFacturaImprimir("confirmarfactura");
      });

      function RecolectarDatosFormulario() {
        producto = 
          codigoproducto: $('#Codigo_Producto').val(),
          cantidad: $('#Cantidad').val()
        };
      }

      function RecolectarDatosCliente() {
        cliente = {
          codigocliente: $('#CodigoCliente').val(),
          fecha: $('#Fecha').val()
        };
      }

      //Funciones AJAX para enviar y recuperar datos del servidor
      //******************************************************* 
      function EnviarInformacionProducto(accion) {
        $.ajax({
          type: 'POST',
          url: 'procesar.php?accion=' + accion + '&codigofactura=' + <?php echo $codigofactura ?>,
          data: producto,
          success: function(msg) {
            RecuperarDetalle();
          },
          error: function() {
            alert("Hay un error ..");
          }
        });
      }

      function EnviarInformacionFactura(accion) {
        $.ajax({
          type: 'POST',
          url: 'procesar.php?accion=' + accion + '&codigofactura=' + <?php echo $codigofactura ?>,
          data: cliente,
          success: function(msg) {
            window.location = 'index.php';
          },
          error: function() {
            alert("Hay un error ..");
          }
        });
      }

      function EnviarInformacionFacturaImprimir(accion) {
        $.ajax({
          type: 'POST',
          url: 'procesar.php?accion=' + accion + '&codigofactura=' + <?php echo $codigofactura ?>,
          data: cliente,
          success: function(msg) {
            window.open('pdffactura.php?' + '&codigofactura=' + <?php echo $codigofactura ?>, '_blank');
            window.location = 'index.php';
          },
          error: function() {
            alert("Hay un error ..");
          }
        });
      }


      function LimpiarFormulario() {
        $('#Cantidad').val('');
      }



    });

    //Se ejecuta cuando se presiona un boton de borrar un item del detalle
    var cod;

    function borrarItem(coddetalle) {
      cod = coddetalle;
      $("#ModalConfirmarBorrar").modal();
    }

    $('#btnConfirmarBorrado').click(function() {
      $("#ModalConfirmarBorrar").modal('hide');
      $.ajax({
        type: 'POST',
        url: 'borrarproductodetalle.php?codigo=' + cod,
        success: function(msg) {
          RecuperarDetalle();
        },
        error: function() {
          alert("Hay un error ..");
        }
      });
    });




    function RecuperarDetalle() {
      $.ajax({
        type: 'GET',
        url: 'recuperardetalle.php?codigofactura=' + <?php echo $codigofactura ?>,
        success: function(datos) {
          document.getElementById('DetalleFactura').innerHTML = datos;
        },
        error: function() {
          alert("Hay un error ..");
        }

      });

    }
  </script>
 <!-- Edit Modal HTML -->
	<?php include("htmlProductos/modal_add.php");?>
</body>
</html>