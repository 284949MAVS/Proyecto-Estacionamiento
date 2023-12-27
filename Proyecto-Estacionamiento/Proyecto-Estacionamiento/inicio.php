<?php
session_start();

// Verificar si la sesión no está activa
if (!isset($_SESSION['nom_User'])) {
    // Redireccionar a la pantalla de error o a otra página
    header("Location: pagueErrorlogin.php");
    exit();
}
?>
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

</head>

<body>
  <header>
    
  <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #004A98;"> 
    <a class="navbar-brand"  href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img-thumbnail" alt="..." style="width: 50px ;" style="border: 0cm;"></a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
    <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
      <ul class="navbar-nav me-auto mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="#" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
        </li>

        <li class="nav-item dropdown">
              <a class="nav-link" href="consultar_usuarios.php"  role="button" >
                Usuario
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" href="consultar_cliente.php"  role="button" >
                Cliente
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" href="consultar_contrato.php"  role="button" >
                Contrato
              </a>
        </li>
        <button class="btn btn-primary" id="open-percentages-modal">Asignar Porcentajes</button>
    </ul>
    <a class="navbar-brand" href="#" id="open-modal"><?php  echo isset($_SESSION['nom_User']) ? $_SESSION['nom_User'] : header("Location: pagueErrorlogin.php"); ?></a>
    
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
    <a href="loginPague.php" id="confirm-logout" class="btn btn-primary">Cerrar Sesión</a>
    <button id="cancel-logout">Cancelar</button>
</div>
</div>

<!-- place navbar here -->
  <!-- Percentages Modal -->
  <div class="modal fade" id="percentages-modal" tabindex="-1" aria-labelledby="percentages-modal-label"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="percentages-modal-label">Asignar Porcentajes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Section 1 -->
            <div class="mb-3">
              <h6>DUI</h6>
              <div class="row">
                <div class="col-md-6">
                  <label for="admin-percent-1">Porcentaje Administrativo:</label>
                  <input type="text" class="form-control" id="admin-percent-1">
                </div>
                <div class="col-md-6">
                  <label for="academic-percent-1">Porcentaje Académico:</label>
                  <input type="text" class="form-control" id="academic-percent-1">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <h6>Ingeniería</h6>
              <div class="row">
                <div class="col-md-6">
                  <label for="admin-percent-2">Porcentaje Administrativo:</label>
                  <input type="text" class="form-control" id="admin-percent-2">
                </div>
                <div class="col-md-6">
                  <label for="academic-percent-2">Porcentaje Académico:</label>
                  <input type="text" class="form-control" id="academic-percent-2">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <h6>Hábitat</h6>
              <div class="row">
                <div class="col-md-6">
                  <label for="admin-percent-3">Porcentaje Administrativo:</label>
                  <input type="text" class="form-control" id="admin-percent-3">
                </div>
                <div class="col-md-6">
                  <label for="academic-percent-1">Porcentaje Académico:</label>
                  <input type="text" class="form-control" id="academic-percent-3">
                </div>
              </div>
            </div>
            
            <!-- Section 2 (similar structure as Section 1) -->
            <div class="mb-3">
              <!-- ... (repeat for other sections) ... -->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="guardar-porcentajes">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Percentages Modal -->
  </header>
  <main>

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
     <br><br>
  <div class="container">
        <div class="form-container">
            <h1>Corte de caja actual</h1>
        <form>
            <div class="form-row">
                <label for="num_Corte">Número de corte:</label>
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
            window.location.href = "login.php";
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
                    $("#open-percentages-modal").prop("disabled", false);
                } else {
                  $("#open-percentages-modal").prop("disabled", true);
                    alert("No hay corte de caja activo en este momento.");
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
<script>
    $(document).ready(function () {
      $("#open-percentages-modal").click(function () {
        $("#percentages-modal").modal("show");
      });
    });
  </script>
  <script>
    $(document).ready(function () {
  // ... (otro código existente) ...

  $("#guardar-porcentajes").click(function () {
    // Obtener valores de los campos del modal
    var adminPercent1 = $("#admin-percent-1").val();
    var academicPercent1 = $("#academic-percent-1").val();
    var adminPercent2 = $("#admin-percent-2").val();
    var academicPercent2 = $("#academic-percent-2").val();
    var adminPercent3 = $("#admin-percent-3").val();
    var academicPercent3 = $("#academic-percent-3").val();

    // Enviar datos al servidor mediante Ajax
    $.ajax({
      url: "guardar_porcentajes.php",
      type: "POST",
      data: {
        adminPercent1: adminPercent1,
        academicPercent1: academicPercent1,
        adminPercent2: adminPercent2,
        academicPercent2: academicPercent2,
        adminPercent3: adminPercent3,
        academicPercent3: academicPercent3,
      },
      success: function (response) {
        alert("Datos guardados exitosamente");
        $("#percentages-modal").modal("hide");
      },
      error: function () {
        console.error("Error al enviar los datos al servidor");
      },
    });
  });

});

    </script>
</body>


</html>