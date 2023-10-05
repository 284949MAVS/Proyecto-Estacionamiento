<?php
include('conexion.php');

$id_cliente = '';
$info_contrato = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_cliente"];

    $consulta_contrato = "SELECT * FROM contratos WHERE id_cliente = '$id_cliente'";
    $resultado_contrato = $mysqli->query($consulta_contrato);

    if ($resultado_contrato->num_rows > 0) {
        $info_contrato = $resultado_contrato->fetch_assoc();
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultar Contrato</title>
</head>
<body>
    <h1>Consultar Contrato</h1>
    <form method="post" action="">
        <label>ID del Cliente:</label>
        <input type="text" name="id_cliente" value="<?php echo $id_cliente; ?>" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if (!empty($info_contrato)): ?>
    <h2>Información del Contrato</h2>
    <p>ID Cliente: <?php echo $id_cliente; ?></p>
    <p>Auto del Cliente: <?php echo $info_contrato['auto_Cliente']; ?></p>
    <p>Pago del Cliente: <?php echo $info_contrato['pago_Cliente']; ?></p>

    <p>Opciones:</p>
    <ul>
    <li><a href="modificar_contrato.php?id_contrato=<?php echo $info_contrato['id_Cliente']; ?>">Modificar Contrato</a></li>
    <li><a href="eliminar_contrato.php?id_contrato=<?php echo $info_contrato['id_Cliente']; ?>">Eliminar Contrato</a></li>
</ul>

    <?php endif; ?>
</body>
</html>
