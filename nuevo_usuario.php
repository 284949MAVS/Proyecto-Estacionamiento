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

   
    $query = "INSERT INTO usuarios (id_User, nom_User, ap_PatU, ap_MatU, tipo_User, correo_User, tel_User, act_User, pass_User) 
    VALUES ('$id_User', '$nom_User', '$ap_PatU', '$ap_MatU', '$tipo_User', '$correo_User', '$tel_User', '$act_User', '$pass_User')";

    if ($mysqli->query($query) === TRUE) {
        header("Location: inicio.php");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
