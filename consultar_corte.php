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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>

.form-container {
 
 width: 700px;
 height: auto;
 background-color: whitesmoke;
 text-align: center;
 padding: 20px;
 margin: 0 auto;
} 
        .form-row {
     display: flex;
     justify-content: space-between;
     align-items: center;
     margin-bottom: 10px;
    }
    
    .form-row label {
     flex: 1;
     text-align: right;
     padding-right: 10px;
    }
    
    .form-row input,
    .form-row select {
     flex: 2;
     
    }
     </style>
</head>
<body>
<header>
    <!-- place navbar here -->
    <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #042E5D;"> 
        <a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img" alt="..." style="width: 60px ;" style="border: 0cm;"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
    <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
      <ul class="navbar-nav me-auto mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="inicio_caseta.php" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Corte de caja
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="mostrar_corte.html">Corte de caja actual</a></li> 
            <li><a class="dropdown-item" href="consultar_corte.php">Consulta corte</a></li>
          </ul>
        </li>
    </ul>
    
    
    </div>    
    </nav>
    <br>
  </header>
  <div class="container text-center mt-8">
    <h1>Consultar corte de caja</h1>
    <br>
    <div id="corteCaja" class="mt-10">
        <form method="get">
            <div class="form-group d-flex justify-content-center">
                <label for="num_Corte">Numero de corte:</label>
                <input type="text" class="form-control mx-2" id="corteConsultar" name="num_Corte" style="width: 150px;">
                <button type="submit" id="consultarCorte" class="btn btn-primary">Consultar</button>
            </div>
        </form>
    </div>
</div>

<div class="container text-center mt-8" style="margin-top: 20px;">
    <div id="detalleCorte" style="background-color: #f5f5f5; padding: 20px; border-radius: 10px;">
        <div class="modal-header">
            <h5 class="modal-title">Detalles del Corte de Caja</h5>
        </div>
        <div class="modal-body">
            <?php
            if ($corteData) {
                if ($corteData["corte_Act"] == 0) {
                    echo "<h2>Corte de Caja</h2>";
                    echo "<p>Número de Corte: " . $corteData["num_Corte"] . "</p>";
                    echo "<p>ID: " . $corteData["id_User"] . "</p>";
                    echo "<p>Inicio de Turno: " . $corteData["inicio_Turno"] . "</p>";
                    echo "<p>Fin de Turno: " . $corteData["fin_Turno"] . "</p>";
                    echo "<p>Autos salida: " . $corteData["autos_Salida"] . "</p>";
                    echo "<p>Tickets Cancelados: " . $corteData["tickets_Canc"] . "</p>";
                    echo "<p>Efectivo: $" . $corteData["efectivo"] . "</p>";
                    echo "<p>Depósitos: $" . $corteData["depos"] . "</p>";
                    echo "<p>Total: $" . $corteData["total_Corte"] . "</p>";
                } else {
                    echo "<p>Este corte de caja está activo aún. </p>";
                    echo "<a href=mostrar_corte.html>Consulta corte</a>";
                }
            } else {
                echo "<p>Ingrese un numero de corte existente.</p>";
            }
            ?>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

    <script>
        $(document).ready(function () {
            $("#consultarCorte").click(function () {
                $("#detalleCorte").hide();
            });
        });
    </script>
</body>
</html>
