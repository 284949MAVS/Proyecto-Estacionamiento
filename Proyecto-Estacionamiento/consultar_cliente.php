<?php
require "conexion.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_Cliente"];
    $query = "SELECT * FROM clientes WHERE id_Cliente = $id";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID Cliente: " . $row["id_Cliente"] . "<br>";
            echo "Nombre: " . $row["nom_Cliente"] . "<br>";
            echo "Apellido paterno: " . $row["ap_Patc"] . "<br>";
            echo "Apellido materno: " . $row["ap_Matc"] . "<br>";
            echo "RFC cliente: " . $row["rfc_Cliente"] . "<br>";
            echo "Direccion: " . $row["dir_Cliente"] . "<br>";
            echo "Telefono: " . $row["tel_Cliente"] . "<br>";
            echo "Correo: " . $row["correo_Cliente"] . "<br>";
            echo "Credencial: " . $row["id_Credencial"] . "<br>";
            echo "Tipo Usuario: " . $row["tipo_Cliente"] . "<br>";
        }
    } else {
        echo "ID no válido";
    }
}

$mysqli->close();
?>
