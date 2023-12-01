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

    $checkClienteQuery = "SELECT id_Cliente FROM contratos WHERE id_Cliente = '$idCliente'";
    $resultCliente = $mysqli->query($checkClienteQuery);

    if ($resultCliente->num_rows === 0) {
        
        $query = "INSERT INTO contratos (id_Cliente, auto_Cliente, pago_Cliente, fechacont_Cliente, vigCon_cliente, cont_Act, tipo_Cajon) 
                  VALUES ('$idCliente', '$autoCliente', '$tipoPago', '$fechaInicioContrato', '$fechaFinContrato', '$estadoActividad', '$tipoCajon')";
        
        if ($mysqli->query($query) === TRUE) {
            
            Header("Location: crear-Contratos.php");
        } else {
            echo "Error al dar de alta el contrato: " . $mysqli->error;
        }
    } else 
    {
        echo "<script>
                alert('¡Error! Ya existe un contrato para el cliente con ese ID.');
                window.location.href = 'crear-Contratos.php';
             </script>";
    }
}

$mysqli->close();

?>
