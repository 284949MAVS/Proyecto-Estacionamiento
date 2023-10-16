<?php
include('conexion.php');

$id_cliente = '';
$info_contrato = [];
$existeContrato = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_Cliente"];

    $consulta_contrato = "SELECT * FROM contratos WHERE id_Cliente = '$id_cliente'";
    $resultado_contrato = $mysqli->query($consulta_contrato);

    if ($resultado_contrato->num_rows > 0) {
        $info_contrato = $resultado_contrato->fetch_assoc();
        $existeContrato = true;
    }
}
    
    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crear Contrato</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body style="font-family: Roboto; background-color: #004A98;">
<header style="font-family: Roboto; background-color: #004A98;">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: rgb(37, 96, 245);">
        <a class="navbar-brand"  href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img-thumbnail" alt="..." style="width: 50px ;"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="inicio.php" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuario
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="nuevo_usuario.html">Nuevo usuario</a></li>
                        <li><a class="dropdown-item" href="consultar_usuarios.php">Consultar Usuario</a></li>
                    </ul>
                </li>

   
                <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cliente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="nuevo_cliente.html">Nuevo Cliente</a></li> 
            <li><a class="dropdown-item" href="consultar_cliente.php">Consultar Cliente</a></li>
          </ul>
        </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Contrato
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="crear-Contratos.php">Crear contrato</a></li>
                        <li><a class="dropdown-item" href="consultar_contrato.php">Consultar Contrato</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <br>
    </nav>
</header>
<main>
    <!-- div contenedor del primer formulario -->
    <div
        style="border-radius: 45px; border: 5px solid whitesmoke; width: 700px; height: 250px; position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); background-color: whitesmoke;">
        <div style="text-align: center; "><h1 style="font-size: bold;">Crear Contrato <i class="fa-solid fa-circle-check"></i></h1></div>
        <br>
        <form
            style="align-items: center; position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%);"
            action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID de cliente</label>
                <input type="number" name="id_Cliente" pattern="[0-9]{6}" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" style="width: 500px;" oninput="verificarCamposCompletos()">
            </div>
            <!-- Mensaje de error para ID de cliente -->
            <div id="mensajeErrorID" style="color: red; display: none;">Debe ingresar un ID válido</div>
            <!-- Botón "Buscar" -->
            <div style="position: absolute; top: 120%; left: 50%; transform: translate(-50%, -50%);">
                <button type="sumbit" class="btn btn-primary" id="consultarButton" name="consultar" onclick="mostrarSegundoFormulario()">Buscar</button>
            </div>
        </form>
    </div>

    <!-- div contenedor del segundo formulario (inicialmente oculto) -->
    <div
        style="border-radius: 45px; border: 5px solid whitesmoke; width: 700px; height: 700px; position: absolute; top: 100%; left: 50%; transform: translate(-50%, -50%); background-color: whitesmoke; <?php if (!$existeContrato) { echo 'display: none;'; } ?>"
        id="segundoFormulario">
        <form
            style="align-items: center; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);"
            action="crear_contrato.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID de Cliente</label>
                <input type="number" name="id_Cliente" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" style="width: 500px;">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Auto del Cliente</label>
                <input type="text" name="auto_Cliente" class="form-control" style="width: 500px;">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo de Pago 1-Nomina 2-Deposito</label>
                <input type="number" name="tipoPago" min="1" max="2" class="form-control" id="tipoPago" style="width: 500px;">
                <div id="mensajeError" style="color: red; display: none;">Debe elegir entre 1 y 2</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de inicio del contrato</label>
                <input type="date" name="fechacont_Cliente" class="form-control" style="width: 500px;">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de fin de contrato</label>
                <input type="date" name="vigCon_Cliente" class="form-control" style="width: 500px;">
            </div>
            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Estado de actividad</label>
                <select id="cont_Act" class="form-select" name="cont_Act" style="width: 500px;">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo de Cajon 1-Exclusivo 2-Libre</label>
                <input type="number" name="tipoCajon" min="1" max="2" class="form-control" id="tipoCajon"
                    style="width: 500px;">
                <div id="mensajeError1" style="color: red; display: none;">Debe elegir entre 1 y 2</div>
            </div>
            <!-- Botón "Crear" -->
            <div style="position: absolute; top: 105%; left: 50%; transform: translate(-50%, -50%);">
                <button type="submit" class="btn btn-primary" id="crearButton" name="crear">Crear</button>
            </div>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
        crossorigin="anonymous">
</script>
<script>
    const tipoPagoInput = document.getElementById('tipoPago');
    const tipoCajonInput = document.getElementById('tipoCajon');
    const mensajeError = document.getElementById('mensajeError');
    const mensajeError1 = document.getElementById('mensajeError1');
    const segundoFormulario = document.getElementById('segundoFormulario');
</script>
<script>
    tipoPagoInput.addEventListener('input', function () {
        if (this.value < 1 || this value > 2) {
            mensajeError.style.display = 'block';
            this.value = '';
        } else {
            mensajeError.style.display = 'none';
        }
    });

    tipoCajonInput.addEventListener('input', function () {
        if (this.value < 1 || this.value > 2) {
            mensajeError1.style.display = 'block';
            this.value = '';
        } else {
            mensajeError1.style.display = 'none';
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    function mostrarSegundoFormulario() {
        var idCliente = document.getElementById("exampleInputEmail1").value;

        if (idCliente && idCliente.length === 6) {
            console.log("Haciendo la solicitud AJAX...");
            $.ajax({
                type: "POST",
                url: "crear-Contratos.php",
                data: { idCliente: idCliente },
                dataType: "json",
                success: function (data) {
                    if (data.existeContrato) {
                        document.getElementById("segundoFormulario").style.display = "block";
                    } else {
                        alert("No se encontró un contrato para el ID de cliente.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        } else {
            document.getElementById("mensajeErrorID").style.display = "block";
        }
    }
</script>


</body>
</html>
