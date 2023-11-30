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
        $_SESSION['formulario_enviado'] = true;
    }
}
unset($_SESSION['formulario_enviado']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Corte de caja</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        <a href=""><img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU"
                    class="img" alt="..." style="width: 60px ;" style="border: 0cm;"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
        <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="inicio_caseta.php" aria-current="page">Inicio <span
                                class="visually-hidden">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div class="form-container">
    <form id="ticketForm" method="POST">
    <button name="registrar_ticket" class="btn btn-primary" onclick="registrarTicket()">Registrar Ticket</button>
</form>
<button  name="cobro" class="btn btn-success" id="cobro" data-toggle="modal" data-target="#cobroModal" >Consultar ticket</button>
    </div>
</main>

<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ticketModalLabel">Información del Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($id_Ticket)) {
                    echo "Ticket número: $id_Ticket<br>";
                    echo "Hora Entrada: $hr_Ent<br>";
                    echo "Lugar asignado: $num_Cajon<br>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cobroModal" tabindex="-1" role="dialog" aria-labelledby="cobroModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cobroModalLabel">Registrar Cobro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cobroForm">
                    <div class="mb-3">
                        <label for="idInput" class="form-label">ID:</label>
                        <input type="text" class="form-control" id="idInput" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="optionsSelect" class="form-label">Seleccionar:</label>
                        <select class="form-select" id="optionsSelect" name="opcion">
                            <option value="1">Alumno</option>
                            <option value="2">Docente</option>
                            <option value="3">Cortesía</option>
                            <option value="4">Libre</option>
                        </select>
                    </div>
                    <div id="claveUsuarioDiv" class="mb-3" style="display: none;">
                        <label for="claveUsuario" class="form-label">Clave de Usuario:</label>
                        <input type="text" class="form-control" id="claveUsuario" name="claveUsuario">
                    </div>
                    <button type="button" class="btn btn-primary" id="btnRegistrar" onclick="obtenerInformacionTicket()">Registrar Cobro</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="informacionContainer"></div>

<script>
        function registrarTicket() {
            $.ajax({
                type: "POST",
                url: "registrar_ticket.php",
                data: $("#ticketForm").serialize(),
                dataType: 'json',
                success: function (response) {
                    mostrarModal(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function mostrarModal(response) {
            Swal.fire({
                title: 'Información del Ticket',
                html: `Ticket número: ${response.id_Ticket}<br>Hora Entrada: ${response.hr_Ent}<br>Lugar asignado: ${response.num_Cajon}`,
                icon: 'success'
            });
        }

        <?php
        if (isset($id_Ticket)) {
        ?>
        mostrarModal(<?php echo json_encode(array('id_Ticket' => $id_Ticket, 'hr_Ent' => $hr_Ent, 'num_Cajon' => $num_Cajon)); ?>);
        <?php
        }
        ?>
    </script>
<script>
    $(document).ready(function () {
        $("#optionsSelect").change(function () {
            var selectedOption = $(this).val();
          
            if (selectedOption === "1" || selectedOption === "2") {
                $("#claveUsuarioDiv").show();
            } else {
                $("#claveUsuarioDiv").hide();
            }
        });

        $("#cobro").click(function () {
            $("#cobroModal").modal("show");
        });

        $("#btnRegistrar").click(function () {
            $("#cobroModal").modal("hide");
        });
    });
</script>
<script>
function obtenerInformacionTicket() {
    var idTicket = $("#idInput").val();
    var claveCliente = $("#claveUsuario").val();
    var tipo_Cliente = $("#optionsSelect").val();
    if(!claveCliente && tipo_Cliente==4){
      claveCliente=999999;
    }else if(!claveCliente && tipo_Cliente==3){
      claveCliente=555555;
    }
    $.ajax({
        type: "POST",
        url: "registrar_pago.php", 
        data: { idTicket: idTicket, claveCliente: claveCliente }, 
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                mostrarInformacionTicket(response.ticket);
            } else {
                console.log(response.message);
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}


function calcularHorasTranscurridas(horaEntrada) {
    var horaActual = new Date();

    var horaEntradaDate = new Date(horaEntrada);

    var diferenciaMilisegundos = horaActual - horaEntradaDate;

    var horasTranscurridas = diferenciaMilisegundos / (1000 * 60 * 60);

    return horasTranscurridas;
}

function mostrarInformacionTicket(ticket) {
    var horasTranscurridas = calcularHorasTranscurridas(ticket.hr_Ent);

    var totalPagar = 0;
    if (ticket.tipo_Cliente < 5) {
        if (horasTranscurridas < 3) {
            totalPagar = 10;
        } else {
            totalPagar = 10 + Math.floor(horasTranscurridas - 3) * 5;
        }
    } else if (ticket.tipo_Cliente == 5) {
        totalPagar = 12 * horasTranscurridas;
    } else if (ticket.tipo_Cliente == 6) {
        totalPagar = 0;
    }

    var informacionHTML = `
        <div>ID Ticket: ${ticket.id_Ticket}</div>
        <div>Hora Entrada: ${ticket.hr_Ent}</div>
        <div>Lugar asignado: ${ticket.num_Cajon}</div>
        <div>Total a Pagar: $${totalPagar}</div>
        <button name="confirmarPago" class="btn btn-danger" onclick="pagarTicket(${ticket.id_Ticket}, ${ticket.id_Cliente}, ${totalPagar})">Pagar</button>
    `;

    $("#informacionContainer").html(informacionHTML);
}
</script>
<script>
function pagarTicket(idTicket, idCliente, totalPagar) {
    $.ajax({
        type: "POST",
        url: "actualizar_ticket.php",
        data: { idTicket: idTicket, idCliente: idCliente, totalPagar: totalPagar },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                console.log('Pago confirmado. Actualización exitosa.');
            } else {
                console.log('Error al confirmar el pago: ' + response.message);
                      }
        },
        error: function (error) {
            console.log('Error en la solicitud AJAX: ' + error);
                 }
    });
}
</script>

</body>

</html>
