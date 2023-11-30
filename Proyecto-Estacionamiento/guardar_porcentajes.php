<?php

function calculaCajones($tipoEst, $porcentaje){
    require "conexion.php";
    $consultaEstacionamiento = "SELECT lugares_Tot FROM estacionamientos WHERE cve_Est = ?";

    $stmt = $mysqli->prepare($consultaEstacionamiento);

    $stmt->bind_param("i", $tipoEst);

    $stmt->execute();

    $stmt->bind_result($lugaresTotales);

    $stmt->fetch();


    $cajones = $lugaresTotales * $porcentaje / 100;

    $stmt->close();
    return $cajones;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "conexion.php";

    $adminPercent1 = $_POST["adminPercent1"];
    $academicPercent1 = $_POST["academicPercent1"];
    $adminPercent2 = $_POST["adminPercent2"];
    $academicPercent2 = $_POST["academicPercent2"];
    $adminPercent3 = $_POST["adminPercent3"];
    $academicPercent3 = $_POST["academicPercent3"];

    $query = "INSERT INTO porcentajes (num_Porc, tipo_Est, cant_Docs, cant_Admins) VALUES (?, ?, ?, ?)";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("iiii", $num_porc, $tipoEst, $cantDocs, $cantAdmins);

    $num_porc = 1;
    $tipoEst = 1;
    $cantDocs = calculaCajones($tipoEst, $academicPercent1);  
    $cantAdmins = calculaCajones($tipoEst, $adminPercent1);  
    $stmt->execute();

    $num_porc = 1;
    $tipoEst = 3;
    $cantDocs = calculaCajones($tipoEst, $academicPercent2);  
    $cantAdmins = calculaCajones($tipoEst, $adminPercent2);  
    $stmt->execute();

    $num_porc = 1;
    $tipoEst = 4;
    $cantDocs = calculaCajones($tipoEst, $academicPercent3);  
    $cantAdmins = calculaCajones($tipoEst, $adminPercent3);  
    $stmt->execute();

    $stmt->close();
    $mysqli->close();

    echo "Datos guardados exitosamente";
} else {
    echo "Error: Método no permitido";
}
?>
