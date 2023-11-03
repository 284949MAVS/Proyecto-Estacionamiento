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
        if($row["tipo_User"]==1){
        $nombre = $row["nom_User"];
        $_SESSION["nom_User"] = $nombre;
        header("Location: Inicio.php");
        exit();
        }else{
        $nombre = $row["nom_User"];
        $_SESSION["nom_User"] = $nombre;
        header("Location: inicio_caseta.php"); 
        }
    } else {
        header("Location: loginPague.php?error=incorrecto");
    }

    $mysqli->close();
}
?>