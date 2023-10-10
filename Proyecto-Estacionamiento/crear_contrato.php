<?php
include('conexion.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_cliente"];
    $fecha = $_POST["fecha"];
    $auto = $_POST["auto"];
    $pago = $_POST["pago"];
    $tipo = $_POST["tipo"];
    
    $query = "INSERT INTO contratos (id_cliente, auto_cliente, pago_cliente, fechacont_Cliente, tipo_Cajon) VALUES ('$id_cliente', '$auto', '$pago', '$fecha', '$tipo')";
    
    if ($mysqli->query($query) === TRUE) {
        echo "Contrato dado de alta correctamente.";
    } else {
        echo "Error al dar de alta el contrato: " . $mysqli->error;
    }
}

$mysqli ->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alta de Contrato</title>
</head>
<body>
    <h1>Alta de Contrato</h1>
    <form method="post" action="">
        <label>ID del Cliente:</label>
        <input type="text" name="id_cliente" required><br>
        
        <label>Auto del cliente:</label>
        <input type="text" name="auto" required><br>
        
        <label>Fecha del contrato:</label>
        <input type="date" name="fecha" required><br>
        
        <label>Pago del cliente:</label>
        <input type="number" name="pago" required><br>
        
        <label>Tipo de cajon:</label>
        <input type="number" name="tipo" required><br>
        
        <input type="submit" value="Guardar Contrato">
    </form>
</body>
</html>

<?php
include('conexion.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_cliente"];
    $fecha = $_POST["fecha"];
    $auto = $_POST["auto"];
    $pago = $_POST["pago"];
    $tipo = $_POST["tipo"];
    
    $query = "INSERT INTO contratos (id_cliente, auto_cliente, pago_cliente, fechacont_Cliente, tipo_Cajon) VALUES ('$id_cliente', '$auto', '$pago', '$fecha', '$tipo')";
    
    if ($mysqli->query($query) === TRUE) {
        echo "Contrato dado de alta correctamente.";
    } else {
        echo "Error al dar de alta el contrato: " . $conn->error;
    }
}

$mysqli ->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alta de Contrato</title>
</head>
<body>
    <h1>Alta de Contrato</h1>
    <form method="post" action="">
        <label>ID del Cliente:</label>
        <input type="text" name="id_cliente" required><br>
        
        <label>Auto del cliente:</label>
        <input type="text" name="auto" required><br>
        
        <label>Fecha del contrato:</label>
        <input type="date" name="fecha" required><br>
        
        <label>Pago del cliente:</label>
        <input type="number" name="pago" required><br>
        
        <label>Tipo de cajon:</label>
        <input type="number" name="tipo" required><br>
        
        <input type="submit" value="Guardar Contrato">
    </form>
</body>
</html>
