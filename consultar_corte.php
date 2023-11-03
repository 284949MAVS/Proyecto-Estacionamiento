<?php
session_start();
require("conexion.php");

$corteData = null;

if (isset($_GET["num_Corte"])) {
    $numCorte = $_GET["num_Corte"];

    $query = "SELECT * FROM cortes_caja WHERE num_Corte = $numCorte";
    $result = $mysqli->query($query);

    if (!$result) {
        die("Error en la consulta: " . $mysqli->error);
    }

    if ($result->num_rows > 0) {
        $corteData = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta Corte</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-8">
        <h1>Consultar corte de caja</h1>
        <div id="corteCaja" class="mt-10">
            <form method="get">
                <div class="form-group">
                    <label for="num_Corte">Numero de corte:</label>
                    <input type="text" class="form-control" id="corteConsultar" name="num_Corte">
                    <button type="submit" id="consultarCorte">Consultar Corte</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div id="detalleCorte">
            <div class="modal-header">
                <h5 class="modal-title">Detalles del Corte de Caja</h5>
            </div>
            <div class="modal-body">
                <?php
                if ($corteData) {
                    if($corteData["corte_Act"]==0){
                        echo "<h2>Corte de Caja</h2>";
                        echo "<p>Número de Corte: " . $corteData["num_Corte"] . "</p>";
                        echo "<p>ID: " . $corteData["id_User"] . "</p>";
                        echo "<p>Inicio de Turno: " . $corteData["inicio_Turno"] . "</p>";
                        
                        echo "<p>Fin de Turno: " . $corteData["fin_Turno"] . "</p>";
                        
                        echo "<p>Autos salida: " . $corteData["autos_Salida"] . "</p>";
                        
                        echo "<p>Tickets Cancelados: " . $corteData["tickets_Canc"] . "</p>";
                        
                        echo "<p>Efectivo: " . $corteData["efectivo"] . "</p>";
                        
                        echo "<p>Depositos: " . $corteData["depos"] . "</p>";
                        
                        echo "<p>Total $: " . $corteData["total_Corte"] . "</p>";
                    }else{
                        echo "<p>Este corte de caja esta activo aun. </p>";
                        echo "<a href=mostrar_corte.html>Consulta corte</a>";
                    }
                    } else {
                        echo "<p>No se encontró un corte con ese número.</p>";
                    }
                    ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#consultarCorte").click(function () {
                $("#detalleCorte").hide();
            });
        });
    </script>
</body>
</html>
