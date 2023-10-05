<!DOCTYPE html>
<html>
<head>
    <title>Editar Contrato</title>
</head>
<body>
    <h1>Editar Contrato</h1>

    <?php
    include('conexion.php');

    $id_contrato = $_GET["id_contrato"];

    $consulta_contrato = "SELECT * FROM contratos WHERE id_Cliente = '$id_contrato'";
    $resultado_contrato = $mysqli->query($consulta_contrato);

    if ($resultado_contrato->num_rows > 0) {
        $info_contrato = $resultado_contrato->fetch_assoc();
    } else {
        echo "No se encontró el contrato con el ID.";
        exit;
    }

    $mysqli->close();
    ?>

    <form method="post" action="procesar_edicion.php">
        <label>ID del Contrato a Editar:</label>
        <input type="text" name="id_contrato" value="<?php echo $id_contrato; ?>" readonly><br>
        
        <label>Nuevo Auto del Cliente:</label>
        <input type="text" name="nuevo_auto" value="<?php echo $info_contrato['auto_Cliente']; ?>"><br>
        
        <label>Nuevo Pago del Cliente:</label>
        <input type="number" name="nuevo_pago" value="<?php echo $info_contrato['pago_Cliente']; ?>"><br>
        
        <label>Nueva Vigencia (meses):</label>
        <input type="date" name="nueva_vigencia" value="<?php echo $info_contrato['fechacont_Cliente']; ?>"><br>
        
        <input type="submit" value="Editar Contrato">
    </form>
</body>
</html>
