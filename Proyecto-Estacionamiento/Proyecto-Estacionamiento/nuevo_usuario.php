<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_User = $_POST["id_User"];
    $nom_User = $_POST["nom_User"];
    $ap_PatU = $_POST["ap_PatU"];
    $ap_MatU = $_POST["ap_MatU"];
    $tipo_User = $_POST["tipo_User"];
    $correo_User = $_POST["correo_User"];
    $tel_User = $_POST["tel_User"];
    $act_User = $_POST["act_User"];
    $pass_User = $_POST["pass_User"];

    require_once "conexion.php";

    $checkIdQuery = "SELECT id_User FROM usuarios WHERE id_User = '$id_User'";
    $resultId = $mysqli->query($checkIdQuery);

    $checkCorreoQuery = "SELECT correo_User FROM usuarios WHERE correo_User = '$correo_User'";
    $resultCorreo = $mysqli->query($checkCorreoQuery);

    $checkTelQuery = "SELECT tel_User FROM usuarios WHERE tel_User = '$tel_User'";
    $resultTel = $mysqli->query($checkTelQuery);

    $nombreCompleto = $nom_User . " " . $ap_PatU . " " . $ap_MatU;
    $checkNombreCompletoQuery = "SELECT nom_User FROM usuarios WHERE CONCAT(nom_User, ' ', ap_PatU, ' ', ap_MatU) = '$nombreCompleto'";
    $resultNombreCompleto = $mysqli->query($checkNombreCompletoQuery);

    if ($resultId->num_rows > 0) {
        echo "<script>alert('¡Error! El ID de usuario ya está en uso.');
        window.location.href = 'crear_Usuario.php';</script>";
    } else if ($resultCorreo->num_rows > 0) {
        echo "<script>alert('¡Error! El correo ya está en uso.');
        window.location.href = 'crear_Usuario.php';</script>";
    } else if ($resultTel->num_rows > 0) {
        echo "<script>alert('¡Error! El teléfono ya está registrado.');
        window.location.href = 'crear_Usuario.php';</script>";
    } else if ($resultNombreCompleto->num_rows > 0) {
        echo "<script>alert('¡Error! Este nombre completo ya está registrado.');
        window.location.href = 'crear_Usuario.php';</script>";
    } else {

        $query = "INSERT INTO usuarios (id_User, nom_User, ap_PatU, ap_MatU, tipo_User, correo_User, tel_User, act_User, pass_User) 
        VALUES ('$id_User', '$nom_User', '$ap_PatU', '$ap_MatU', '$tipo_User', '$correo_User', '$tel_User', '$act_User', '$pass_User')";

        if ($mysqli->query($query) === TRUE) {
            header("Location: inicio.php");
            exit();
        } else {
            echo "Error al registrar el usuario: " . $mysqli->error;
        }
    }

    $mysqli->close();
}
?>
