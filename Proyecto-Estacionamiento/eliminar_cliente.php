<?php
require_once "conexion.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

   
    $query = "UPDATE cliente SET act_Cli = 0 WHERE id_Cliente = $id";
    if ($mysqli->query($query)) {
        echo "Usuario eliminado correctamente.";
        Header("Location: consultar_clientes.php");
    } else {
        echo "Error al eliminar el usuario: " . $mysqli->error;
    }
} else {
    echo "ID de usuario no proporcionado.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cliente</title>
</head>
<body>
    <h2>Eliminar Cliente</h2>
    
    <a href="usuarios.php">Volver a la lista de clientes</a>
</body>
</html>
