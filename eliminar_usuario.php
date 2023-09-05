<?php
require_once "conexion.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

   
    $query = "UPDATE usuarios SET act_User = 0 WHERE id_User = $id";
    if ($mysqli->query($query)) {
        echo "Usuario eliminado correctamente.";
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
    <title>Eliminar Usuario</title>
</head>
<body>
    <h2>Eliminar Usuario</h2>
    
    <a href="usuarios.php">Volver a la lista de usuarios</a>
</body>
</html>
