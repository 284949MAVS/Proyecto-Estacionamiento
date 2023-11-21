<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clave = $_POST["clave"];
    $estacionamiento = $_POST["estacionamiento"];

    // Verificar si el cliente está en la base de datos
    $consultaCliente = $mysqli->prepare("SELECT id_Cliente FROM clientes WHERE id_Cliente = ? LIMIT 1");
    $consultaCliente->bind_param("s", $clave);
    $consultaCliente->execute();
    $resultadoCliente = $consultaCliente->get_result();

    if ($resultadoCliente->num_rows > 0) {
        $filaCliente = $resultadoCliente->fetch_assoc();

        $fechaSalida = date("Y-m-d H:i:s");
        $operacion = 2;

        $consultaSalida = $mysqli->prepare("UPDATE historial_clientes SET fecha_salida = ?, operacion = ? WHERE clave_estacionamiento = ? AND operacion = 1 ORDER BY fecha_entrada DESC LIMIT 1");
        $consultaSalida->bind_param("sii", $fechaSalida, $operacion, $estacionamiento);
        $consultaSalida->execute();
        $consultaCliente->close();
        $consultaSalida->close();

        header("Location: inicio_caseta.php");
        exit();
    } else {
        header("Location: error.php");
        exit();
    }
} else {
    header("Location: simulacion_entrada.php");
    exit();
}

$mysqli->close();
?>
