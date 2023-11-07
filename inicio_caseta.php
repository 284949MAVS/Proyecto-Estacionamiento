<!doctype html>
<html lang="en">

<head>
  <title>Pagina de inicio</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
</head>
</head>

<body>
  <header>
    
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

    <a class="navbar-brand" href="#" id="open-modal"><?php session_start();
      require "conexion.php";
      echo $_SESSION['nom_User'];
    ?>
    </a>
    
    </div>
   
    <br>
</nav>
<style>
        #logout-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      z-index: 999;
  }

  .modal-content {
      background: #fff;
      width: 300px;
      margin: 100px auto;
      padding: 20px;
      text-align: center;
      border-radius: 5px;
  }

  #confirm-logout, #cancel-logout {
      margin-top: 10px;
      padding: 5px 10px;
      cursor: pointer;
  }

  #fecha {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      text-align: center;
  }


  #hora {
      font-size: 18px;
      color: #666; 
      text-align:center;
  }
  #fecha,
#hora {
    display: inline; 
}

#fecha::after {
    content: "\00a0"; 
}


</style>
<div id="logout-modal" class="modal">
<div class="modal-content">
    <h2>Cerrar Sesión</h2>
    <p>¿Estás seguro de que deseas cerrar sesión?</p>
    <button id="confirm-logout">Cerrar Sesión</button>
    <button id="cancel-logout">Cancelar</button>
</div>
</div>

<!-- place navbar here -->

</header>
  <main>
    <br>
    <h1 style="font-weight: bold; text-align: center;">Sistema de estacionamiento de zona universitaria</h1>
    <div class="row row-cols-1 row-cols-md-4 g-6">




<!-- Modal de iniciar turno-->
<div class="modal fade" id="confirmacionModal" tabindex="-1" role="dialog" aria-labelledby="confirmacionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmacionModalLabel">Confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  ¿Hola <?php echo $_SESSION['nom_User']; ?> Estás seguro de que quieres iniciar turno a las <span id="hora-accion"></span>?
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelar">Cancelar</button>
        <button type="button" class="btn btn-primary" id="confirmarAccion">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal de terminar turno -->
<div class="modal fade" id="confirmacionModal2" tabindex="-1" role="dialog" aria-labelledby="confirmacionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmacionModalLabel">Confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close2">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Hola <?php echo $_SESSION['nom_User'];
    ?> Estás seguro de que quieres terminar el turno a las <span id="hora-accion"></span> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelar2">Cancelar</button>
        <button type="button" class="btn btn-primary" id="confirmarAccion2">Confirmar</button>
      </div>
    </div>
  </div>
</div>


  </main>

    <div class="container text-center mt-3 reloj-container">
        <p class="reloj-digital" id="reloj">
            <span id="fecha"></span><br>
            <span id="hora-actual"></span>
        </p>
    </div>
    <div class="container text-center mt-3">
        <button class="btn btn-primary" id="iniciarTurno">Iniciar Turno</button>
        <button class="btn btn-danger" id="terminarTurno">Terminar Turno</button>
    </div>

    <!-- Tarjeta "Estacionamientos Activos" con ícono de coche -->
    <div class="container text-center mt-5">
        <div class="card" style="background-color: #f5f5f5;">
            <div class="card-body">
                <h5 class="card-title">Estacionamientos Activos</h5>
                <p class="card-text">Número de estacionamientos ocupados: <span id="estacionamientos-activos">0</span></p>
                <i class="fas fa-car fa-2x" style="margin-right: 10px;"></i> <!-- Ícono de coche de Font Awesome más pequeño (2x) -->
                <i class="fas fa-car fa-2x"></i> <!-- Segundo ícono de coche -->
            </div>
        </div>
    </div>

    <!-- Tarjeta "Tarifas" con ícono de tarifa -->
    <div class="container text-center mt-3">
        <div class="card" style="background-color: #f5f5f5;">
            <div class="card-body">
                <h5 class="card-title">Tarifas</h5>
                <p class="card-text">Tarifa por hora: $5.00</p>
                <i class="fas fa-dollar-sign fa-2x" style="margin-right: 10px;"></i> <!-- Ícono de tarifa de Font Awesome más pequeño (2x) -->
                <i class="fas fa-dollar-sign fa-2x"></i> <!-- Segundo ícono de tarifa -->
            </div>
        </div>
    </div>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  
  <script>
  $(document).ready(function () {
    $("#open-modal").click(function () {
        $("#logout-modal").show();
    });

    $("#cancel-logout").click(function () {
        $("#logout-modal").hide();
    });

    $("#confirm-logout").click(function () {
    $.ajax({
        url: "cerrar_sesion.php",
        type: "POST",
        success: function (response) {
            window.location.href = "loginPague.php";
        }
    });
});

});
</script>

<script>
var horaActual = '';

function mostrarFechaHora() {
    var fechaHoraActual = new Date();

    var hora = fechaHoraActual.getHours();
    var minuto = fechaHoraActual.getMinutes();
    var segundo = fechaHoraActual.getSeconds();


    horaActual = hora + ":" + (minuto < 10 ? "0" : "") + minuto + ":" + (segundo < 10 ? "0" : "") + segundo;


    document.getElementById("hora-accion").textContent = horaActual;
}

mostrarFechaHora();

setInterval(mostrarFechaHora, 1000);
</script>

<script>
  document.getElementById("iniciarTurno").addEventListener("click", function() {
    $("#confirmacionModal").modal("show");

    document.getElementById("close").addEventListener("click", function() {

$("#confirmacionModal").modal("hide");
});
    document.getElementById("confirmarAccion").addEventListener("click", function() {

      $("#confirmacionModal").modal("hide");
    });
    document.getElementById("cancelar").addEventListener("click", function() {

$("#confirmacionModal").modal("hide");
});
  });

  document.getElementById("terminarTurno").addEventListener("click", function() {
    $("#confirmacionModal2").modal("show");   
    
    document.getElementById("close2").addEventListener("click", function() {

$("#confirmacionModal2").modal("hide");

});

    document.getElementById("confirmarAccion2").addEventListener("click", function() {

      $("#confirmacionModal2").modal("hide");

    });
  document.getElementById("cancelar2").addEventListener("click", function() {

$("#confirmacionModal2").modal("hide");

});
  });
</script>

<script>
$(document).ready(function() {
  $("#confirmarAccion").on("click", function() {
    var fechaHora = new Date().toISOString().slice(0, 19).replace('T', ' ');

    $.ajax({
      type: "POST",
      url: "corte_caja.php",
      data: { hora: fechaHora },
      success: function(response) {
        alert("Hora guardada en la base de datos");
        $("#confirmacionModal").modal("hide");
      },
      error: function() {
        alert("Error al guardar la hora en la base de datos");
      }
    });
  });
});
</script>


<script>
document.getElementById("confirmarAccion").addEventListener("click", function() {
    var fechaHora = new Date().toISOString().slice(0, 19).replace('T', ' ');

    fetch('corte_caja.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ hora: fechaHora }),
    })
    .then(response => response.json())
    .then(data => {
    })
    .catch(error => {
        console.error('Error:', error);
    });

    $("#confirmacionModal2").modal("hide");
});

</script>



    <!-- Agregar enlaces a los archivos JavaScript de Bootstrap y jQuery -->
    
    <style>
        .reloj-digital {
            font-size: 36px; /* Tamaño de fuente más pequeño para el reloj */
            color: #333; /* Color de texto */
            text-shadow: 4px 4px 4px rgba(255, 255, 255, 0.6); /* Sombra de texto */
        }

        .reloj-container {
            background-color: #f5f5f5; /* Color de fondo del contenedor del reloj */
            padding: 10px; /* Espaciado interior más pequeño del contenedor del reloj */
            border-radius: 10px; /* Bordes redondeados del contenedor del reloj */
        }
    </style>

    <script>
        // Función para mostrar la fecha y la hora actual
        function mostrarHora() {
            const fecha = new Date();
            const dia = fecha.getDate();
            const mes = fecha.toLocaleDateString('es-ES', { month: 'long' }); // Obtener el mes en formato completo
            const año = fecha.getFullYear();
            const hora = fecha.getHours().toString().padStart(2, '0');
            const minutos = fecha.getMinutes().toString().padStart(2, '0');
            const segundos = fecha.getSeconds().toString().padStart(2, '0');
            const fechaActual = `${dia} de ${mes} de ${año}`;
            const horaActual = `${hora}:${minutos}:${segundos}`;
            document.getElementById("fecha").innerText = fechaActual;
            document.getElementById("hora-actual").innerText = horaActual;
        }

        // Actualizar la hora cada segundo
        setInterval(mostrarHora, 1000);
    </script>

</body>

</html>