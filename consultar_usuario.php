<?php
// Crear conexión
require_once "conexion.php";


// Obtener los parámetros del formulario HTML
$idUsuario = $_POST["id_User"];
$nombreUsuario = $_POST["nom_User"];
$apellidoPaterno = $_POST["ap_PatU"];
$apellidoMaterno = $_POST["ap_MatU"];

// Consulta SQL para obtener los usuarios que cumplan con los criterios
$sql = "SELECT * FROM usuarios WHERE id_usuario = '$idUsuario' AND nombre = '$nombreUsuario' AND apellido_paterno = '$apellidoPaterno' AND apellido_materno = '$apellidoMaterno'";

$result = $conn->query($sql);

// Mostrar los resultados en una tabla HTML
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Tipo usuario</th><th>Correo</th><th>Teléfono</th><th>Activo</th><th>Contraseña</th> </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_usuario"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["apellido_paterno"] . "</td><td>" . $row["apellido_materno"] . "</td><td>" . $row["tipo_User"] . "</td><td>" . $row["correo_User"] . "</td><td>" . $row["tel_User"] . "</td><td>" . $row["act_User"] . "</td><td>" . $row["pass_User"] . "</td> </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar conexión a la base de datos
$conn->close();
?>