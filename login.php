<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "conexion.php";

    $query = "SELECT * FROM usuarios WHERE id_User = '$username' AND pass_User = '$password'";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {
        $_SESSION["username"] = $username;
        header("Location: inicio.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }

    $mysqli->close();
}
?>
