<?php
include("conexion.php");
session_start();

if (isset($_SESSION['id_User'])) {
    $id_User = $_SESSION['id_User'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar_ticket"])) {
        $result = $mysqli->query("SELECT MAX(num_Cajon) as max_cajon FROM tickets");
        $row = $result->fetch_assoc();
        $ultimo_cajon = $row["max_cajon"];
        $num_Cajon = ($ultimo_cajon === null) ? 400 : $ultimo_cajon + 1;

        $hr_Ent = date("H:i:s");

        $stmt = $mysqli->prepare("INSERT INTO tickets (cve_Est, id_User, hr_Ent, num_Cajon, fecha, status) VALUES (2, ?, NOW(), ?, NOW(), 1)");
        $stmt->bind_param("ii", $id_User,  $num_Cajon);
        $stmt->execute();
        $stmt->close();

        $id_Ticket = $mysqli->insert_id;
    }
}

if (isset($id_Ticket)) {
    echo json_encode(array('id_Ticket' => $id_Ticket, 'hr_Ent' => $hr_Ent, 'num_Cajon' => $num_Cajon));
}
?>
