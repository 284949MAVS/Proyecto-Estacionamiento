<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_Cliente = $_POST["id_Cliente"];
    $nom_Cliente = $_POST["nom_Cliente"];
    $ap_Patc = $_POST["ap_Patc"];
    $ap_Matc = $_POST["ap_Matc"];
    $rfc_Cliente = $_POST["rfc_Cliente"];
    $dir_Cliente = $_POST["dir_Cliente"];
    $tel_Cliente = $_POST["tel_Cliente"];
    $correo_Cliente = $_POST["correo_Cliente"];
    $id_Credencial = $_POST["id_Credencial"];
    if ($_POST["tipo_Cliente"] == 'Administrativo') {
        $tipo_Cliente = 1;
    } else if ($_POST["tipo_Cliente"] == 'Academico') {
        $tipo_Cliente = 2;
    } else {
        $tipo_Cliente = 3;
    }
    $act_Cli = $_POST["act_Cli"];

    require_once "conexion.php";

    $checkIdClienteQuery = "SELECT id_Cliente FROM clientes WHERE id_Cliente = '$id_Cliente'";
    $resultIdCliente = $mysqli->query($checkIdClienteQuery);

    $checkRfcQuery = "SELECT rfc_Cliente FROM clientes WHERE rfc_Cliente = '$rfc_Cliente'";
    $resultRfc = $mysqli->query($checkRfcQuery);

    $checkTelClienteQuery = "SELECT tel_Cliente FROM clientes WHERE tel_Cliente = '$tel_Cliente'";
    $resultTelCliente = $mysqli->query($checkTelClienteQuery);

    $checkCorreoClienteQuery = "SELECT correo_Cliente FROM clientes WHERE correo_Cliente = '$correo_Cliente'";
    $resultCorreoCliente = $mysqli->query($checkCorreoClienteQuery);

    $checkIdCredencialQuery = "SELECT id_Credencial FROM clientes WHERE id_Credencial = '$id_Credencial'";
    $resultIdCredencial = $mysqli->query($checkIdCredencialQuery);

    $nombreCompleto = $nom_Cliente . " " . $ap_Patc . " " . $ap_Matc;
    $checkNombreCompletoQuery = "SELECT nom_Cliente FROM clientes WHERE CONCAT(nom_Cliente, ' ', ap_Patc, ' ', ap_Matc) = '$nombreCompleto'";
    $resultNombreCompleto = $mysqli->query($checkNombreCompletoQuery);

    if ($resultIdCliente->num_rows > 0) {
        echo "<script>
                alert('¡Error! El ID de cliente ya está en uso.');
                window.location.href = 'crear_Cliente.php';
             </script>";
    } else if ($resultRfc->num_rows > 0) {
        echo "<script>
                alert('¡Error! El RFC ya está en uso.');
                window.location.href = 'crear_Cliente.php';
             </script>";
    } else if ($resultTelCliente->num_rows > 0) {
        echo "<script>
                alert('¡Error! El teléfono del cliente ya está registrado.');
                window.location.href = 'crear_Cliente.php';
             </script>";
    } else if ($resultCorreoCliente->num_rows > 0) {
        echo "<script>
                alert('¡Error! El correo del cliente ya está en uso.');
                window.location.href = 'crear_Cliente.php';
             </script>";
    } else if ($resultIdCredencial->num_rows > 0) {
        echo "<script>
                alert('¡Error! El ID de credencial ya está en uso.');
                window.location.href = 'crear_Cliente.php';
             </script>";
    } else if ($resultNombreCompleto->num_rows > 0) {
        echo "<script>
                alert('¡Error! Este nombre completo ya está registrado.');
                window.location.href = 'crear_Cliente.php';
             </script>";
    } else {
        $query = "INSERT INTO clientes (id_Cliente, nom_Cliente, ap_Patc, ap_Matc, rfc_Cliente, dir_Cliente, tel_Cliente,
        correo_Cliente, id_Credencial, tipo_Cliente, act_Cli) 
        VALUES ('$id_Cliente', '$nom_Cliente', '$ap_Patc', '$ap_Matc', '$rfc_Cliente',
        '$dir_Cliente', '$tel_Cliente', '$correo_Cliente', '$id_Credencial', '$tipo_Cliente', '$act_Cli')";

        if ($mysqli->query($query) === TRUE) {
            echo "<script>
                    alert('Cliente registrado exitosamente.');
                    window.location.href = 'inicio.php';
                 </script>";
            exit();
        } else {
            echo "Error al registrar el cliente: " . $mysqli->error;
        }
    }

    $mysqli->close();
}
?>
