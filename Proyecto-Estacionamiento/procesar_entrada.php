<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clave = $_POST["clave"];
    $estacionamiento = $_POST["estacionamiento"];

    $consultaCliente = $mysqli->prepare("SELECT id_Cliente, nom_Cliente, tipo_Cliente FROM clientes WHERE id_Cliente = ? LIMIT 1");
    $consultaCliente->bind_param("s", $clave);

    $consultaCliente->execute();

    $resultadoCliente = $consultaCliente->get_result();

    if ($resultadoCliente->num_rows > 0) {
     
        $filaCliente = $resultadoCliente->fetch_assoc();
        $idCliente = $filaCliente["id_Cliente"];
        $nomCliente = $filaCliente["nom_Cliente"];
        $tipoCliente = $filaCliente["tipo_Cliente"];
        $operacion = 1;
        $fechaEntrada = date("Y-m-d H:i:s");

        $consultaHistorial = $mysqli->prepare("INSERT INTO historial_clientes (nombre, tipo_cliente, fecha_entrada, clave_estacionamiento, operacion) VALUES (?, ?, ?, ?, ?)");
        $consultaHistorial->bind_param("sssii", $nomCliente, $tipoCliente, $fechaEntrada, $estacionamiento, $operacion);
        $consultaHistorial->execute();

        // Realizar el UPDATE en la tabla "porcentajes" si se cumple la condición
        if ($tipoCliente == 3) {
            $consultaUpdate = $mysqli->prepare("UPDATE porcentajes SET cant_Admins = cant_Admins - 1 WHERE tipo_Est = ?");
            $consultaUpdate->bind_param("i", $estacionamiento);
            $consultaUpdate->execute();
        } elseif ($tipoCliente == 4) {
            $consultaUpdate = $mysqli->prepare("UPDATE porcentajes SET cant_Docs = cant_Docs - 1 WHERE tipo_Est = ?");
            $consultaUpdate->bind_param("i", $estacionamiento);
            $consultaUpdate->execute();
        }

        $consultaCliente->close();
        $consultaHistorial->close();
        // Cerrar la conexión aquí o después de realizar todas las operaciones necesarias

        header("Location: inicio_caseta.php");
        exit();
    } else {
        header("Location: simulacion_entrada.php");
        exit();
    }
} else {
    header("Location: simulacion_entrada.php");
    exit();
}

$mysqli->close();
?>
