<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCliente = $_POST['id_Cliente'];
    $autoCliente = $_POST['auto_Cliente'];
    $tipoPago = $_POST['tipoPago'];
    $fechaInicioContrato = $_POST['fechacont_Cliente'];
    $fechaFinContrato = $_POST['vigCon_Cliente'];
    $estadoActividad = $_POST['cont_Act'];
    $tipoCajon = $_POST['tipoCajon'];

    $query = "INSERT INTO contratos (id_Cliente, auto_Cliente, pago_Cliente, fechacont_Cliente, vigCon_cliente, cont_Act, tipo_Cajon) 
              VALUES ('$idCliente', '$autoCliente', '$tipoPago', '$fechaInicioContrato', '$fechaFinContrato', '$estadoActividad', '$tipoCajon')";
        
    if ($mysqli->query($query) === TRUE) {
        echo "Contrato dado de alta correctamente.";
        Header("Location: crear-Contratos.php");
    } else {
        echo "Error al dar de alta el contrato: " . $mysqli->error;
    }
}

$mysqli->close();

?>
