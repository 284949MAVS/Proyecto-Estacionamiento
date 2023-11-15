<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "conexion.php";

    $query = "SELECT * FROM usuarios WHERE id_User = '$username' AND pass_User = '$password'";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row["nom_User"];
        $_SESSION["nom_User"] = $nombre;

        if ($row["tipo_User"] == 1) {
            header("Location: Inicio.php");
        } else {
            header("Location: inicio_caseta.php");
        }

        exit(); 
    } else {
        header("Location: loginPague.php?error=incorrecto");
        exit(); 
    }

    $mysqli->close();
}
?>