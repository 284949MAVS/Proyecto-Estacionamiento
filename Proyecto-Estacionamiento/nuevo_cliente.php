<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id_Cliente = $_POST["id_Cliente"];
    $nom_Cliente = $_POST["nom_Cliente"];
    $ap_Patc = $_POST["ap_Patc"];
    $ap_Matc = $_POST["ap_Matc"];
    $rfc_Cliente= $_POST["rfc_Cliente"];
    $dir_Cliente = $_POST["dir_Cliente"];
    $tel_Cliente = $_POST["tel_Cliente"];
    $correo_Cliente = $_POST["correo_Cliente"];
    $id_Credencial = $_POST["id_Credencial"];
    if($_POST["tipo_Cliente"]=='Adminstrativo'){
        $tipo_Cliente=1;
    }else if($_POST["tipo_Cliente"]=='Academico'){
        $tipo_Cliente=2;
    }else{
        $tipo_Cliente=3;
    }
    
    require_once "conexion.php";

   
    $query = "INSERT INTO clientes (id_Cliente, nom_Cliente, ap_Patc, ap_Matc, rfc_Cliente, dir_Cliente, tel_Cliente,
    correo_Cliente, id_Credencial, tipo_Cliente) 
    VALUES ('$id_Cliente', '$nom_Cliente', '$ap_Patc', '$ap_Matc', '$rfc_Cliente',
     '$dir_Cliente', '$tel_Cliente', '$correo_Cliente', '$id_Credencial', '$tipo_Cliente')";

    if ($mysqli->query($query) === TRUE) {
        header("Location: inicio.php");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
