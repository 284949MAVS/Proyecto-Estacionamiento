<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $id = $_POST["id"];
    $nuevoCorreo = $_POST["nuevo_correo"];
    $nuevoTipo = $_POST["nuevo_tipo"];

    $query = "UPDATE usuarios SET correo_User = '$nuevoCorreo', tipo_User = '$nuevoTipo' WHERE id_User = $id";
    if ($mysqli->query($query)) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el usuario: " . $mysqli->error;
    }
}


if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "SELECT correo_User, tipo_User FROM usuarios WHERE id_User = $id";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $correoUsuario = $row["correo_User"];
        $tipoUsuario = $row["tipo_User"];
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
</head>
<body>
    <h2>Modificar Usuario</h2>
    
    <form action="modificar_usuario.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nuevo_correo">Correo:</label>
        <input type="text" id="nuevo_correo" name="nuevo_correo" value="<?php echo $correoUsuario; ?>"><br>
        
        <label for="nuevo_tipo">Tipo:</label>
        <input type="text" id="nuevo_tipo" name="nuevo_tipo" value="<?php echo $tipoUsuario; ?>"><br>
        
        <input type="submit" value="Guardar Cambios">
    </form>

    <a href="usuarios.php">Volver a la lista de usuarios</a>
</body>
</html>
