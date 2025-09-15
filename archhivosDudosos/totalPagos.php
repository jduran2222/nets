<?php
$result = $con->query(
 "SELECT id, fecha, concepto, descripcion, monto, SUM(monto) OVER(ORDER BY id) AS total_pagado from registro_pagos where alumno=$clave");

if (!($result->num_rows > 0)) {
    echo '<script>
      alert("No hay ningún pago registrado.");
    </script>';
    exit;
}
elseif ($result->num_rows > 0) { ?>
    
    <table id="tabladatos" class="table"> 
        <thead style="text-align: right">
            <tr>
                <th>id</th>
                <th>Fecha</th> 
                <th>Concepto</th>
                <th>Descripción</th>
                <th style="text-align: right">Pago Realizado</th>
                <th></th>
                <th style="text-align: right">Deuda Pendiente</th>              
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                    <td style="text-align: left"><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['concepto']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td style="text-align: right"><?php echo $row['monto']; ?></td>
                    <th></th>
                    <td style="text-align: right"><?php echo $row['total_pagado']; ?></td>
            </tr>                                                 
        <?php } ?>
    </table>
<?php } ?>
     </div>
    </div>
</div>
</body>
</html>