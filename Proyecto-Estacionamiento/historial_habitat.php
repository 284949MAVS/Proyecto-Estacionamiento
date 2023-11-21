<?php
include "conexion.php";

$consulta = "SELECT fecha_entrada, nombre, tipo_cliente, operacion FROM historial_clientes WHERE clave_estacionamiento=4 ORDER BY fecha_entrada DESC LIMIT 1";
$resultado = $mysqli->query($consulta);

if ($resultado) {
    $historial = array();
    while ($fila = $resultado->fetch_assoc()) {
        $historial[] = $fila;
    }
    echo json_encode($historial);
} else {
    echo json_encode(array('error' => 'Error al obtener el historial'));
}

$mysqli->close();
?>
