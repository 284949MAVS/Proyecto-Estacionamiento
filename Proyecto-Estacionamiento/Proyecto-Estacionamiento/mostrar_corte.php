<?php
session_start();
require("conexion.php");

$corteData = null;

if (!isset($_SESSION['nom_User'])) {
    // Redireccionar a la pantalla de error o a otra página
    header("Location: pagueErrorlogin.php");
    exit();
}
?>

<html lang="en">

<head>
  <title>Corte de caja</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
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
          <a class="nav-link dropdown" href="inicio_caseta.php" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Corte de caja
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="mostrar_corte.php">Corte de caja actual</a></li> 
          <li><a class="dropdown-item" href="consultar_corte.php">Consulta corte</a></li>
        </ul>
      </li>
      <a class="nav-link " href="simulacion_entrada.php" id="navbarDropdown" role="button"  aria-expanded="false">
           Simulación entrada
        </a>
        <a class="nav-link " href="ticket.php" id="navbarDropdown" role="button"  aria-expanded="false">
          Ticket
        </a>
  </ul>

 
  <br>
</nav>
    <br>
  </header>
  <main>
    
    
    <div class="container">
        <div class="form-container">
            <h1>Corte de caja actual</h1>
        <form>
            <div class="form-row">
                <label for="num_Corte">Numero de corte:</label>
                <input type="text" class="form-control" id="num_Corte" readonly width="100px">
            </div>
            <div class="form-row">
                <label for="id_User">ID:</label>
                <input type="text" class="form-control" id="id" readonly>
            </div>
            <div class="form-row">
                <label for="inicioTurno">Inicio de Turno:</label>
                <input type="text" class="form-control" id="inicioTurno" readonly>
            </div>
  
            <div class="form-row">
                <label for="ticketsCancelados">Tickets Cancelados:</label>
                <input type="text" class="form-control" id="ticketsCancelados" readonly>
            </div>
            <div class="form-row">
                <label for="efectivo">Efectivo:</label>
                <input type="text" class="form-control" id="efectivo" readonly>
            </div>
    
            <div class="form-row">
                <label for="totalCorte">Total de Corte:</label>
                <input type="text" class="form-control" id="totalCorte" readonly>
            </div>
            <div class="form-row">
                <label for="corteActivo">Corte Activo:</label>
                <input type="text" class="form-control" id="corteActivo" readonly>
            </div>
        </form>
    </div>
</div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

<script>
    function actualizarInterfaz() {
        $.ajax({
            url: "mostrar_corte_caja.php",
            method: "GET",
            dataType: "json",
            success: function(data) {
                var corteActivo = data.find(function (corte) {
                    return corte.corte_Act === "1";
                });

                if (corteActivo) {
                    $("#num_Corte").val(corteActivo.num_Corte);
                    $("#id").val(corteActivo.id_User);
                    $("#inicioTurno").val(corteActivo.inicio_Turno);
                    $("#finTurno").val(corteActivo.fin_Turno);
                    $("#autosSalida").val(corteActivo.autos_Salida);
                    $("#ticketsCancelados").val(corteActivo.tickets_Canc);
                    $("#efectivo").val(corteActivo.efectivo);
                    $("#depositos").val(corteActivo.depos);
                    $("#totalCorte").val(corteActivo.total_Corte);
                    $("#corteActivo").val(corteActivo.corte_Act);
                } else {
                    alert("No hay corte de caja activo en este momento.");
                    window.location.href = "inicio_caseta.php";
                }
            },
            error: function() {
                console.error("Error al obtener los datos de la base de datos.");
            }
        });
    }

    setInterval(actualizarInterfaz, 5000);
    actualizarInterfaz();
</script>
</body>

</html>
