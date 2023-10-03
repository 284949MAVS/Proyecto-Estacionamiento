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
        <a class="navbar-brand" href="#"><img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU"
                    class="img-thumbnail" alt="..." style="width: 50px ;" style="border: 0cm;"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
        <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="inicio.php" aria-current="page">Inicio </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nuevo_usuario.html">Nuevo usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="consultar_usuarios.php">Consultar Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nuevo_cliente.html" aria-current="page">Nuevo Cliente </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="consultar_cliente.php">Consultar Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="crear_Contratos.php">Crear Contrato<span
                                class="visually-hidden">(current)</span></a>
                </li>
            </ul>
            <a class="navbar-brand" href="#"><i class="fa-solid fa-circle-user"> Usuario</i></a>
        </div>
        <br>
    </nav>
</header>
<main>
    <!-- div contenedor del primer formulario -->
    <div
            style="border-radius: 45px; border: 5px solid whitesmoke; width: 700px; height: 170px; position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); background-color: whitesmoke;">
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
                <button type="button" class="btn btn-primary" id="consultarButton" name="consultar"
                        onclick="mostrarSegundoFormulario()">Buscar
                </button>
            </div>
        </form>
    </div>

    <!-- div contenedor del segundo formulario (inicialmente oculto) -->
    <div style="border-radius: 45px; border: 5px solid whitesmoke; width: 700px; height: 560px; position: absolute; top: 90%; left: 50%; transform: translate(-50%, -50%); background-color: whitesmoke; display: none;"
            id="segundoFormulario">
        <form
                style="align-items: center; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);"
                action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID de Contrato</label>
                <input type="number" name="id_Cliente" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" style="width: 500px;" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Auto del Cliente</label>
                <input type="text" name="auto_Cliente" class="form-control" id=""
                       style="width: 500px;">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo de Pago 1-Nomina 2-Deposito</label>
                <input type="number" name="auto_Cliente" min="1" max="2" class="form-control" id="tipoPago"
                       style="width: 500px;">
                <div id="mensajeError" style="color: red; display: none;">Debe elegir entre 1 y 2</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha del Contrato</label>
                <input type="date" name="fechacont_Cliente" class="form-control" id=""
                       style="width: 500px;">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo de Cajon 1-Exclusivo 2-Libre</label>
                <input type="number" name="auto_Cliente" min="1" max="2" class="form-control" id="tipoCajon"
                       style="width: 500px;">
                <div id="mensajeError1" style="color: red; display: none;">Debe elegir entre 1 y 2</div>
            </div>
            <!-- Botón "Crear" -->
            <div style="position: absolute; top: 110%; left: 50%; transform: translate(-50%, -50%);">
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
    // JavaScript para controlar el valor del campo de entrada y mostrar el mensaje de error
    const tipoPagoInput = document.getElementById('tipoPago');
    const tipoCajonInput = document.getElementById('tipoCajon');
    const mensajeError = document.getElementById('mensajeError');
    const mensajeError1 = document.getElementById('mensajeError1');
    const segundoFormulario = document.getElementById('segundoFormulario');

    function mostrarSegundoFormulario() {
        const idClienteInput = document.querySelector('input[name="id_Cliente"]');
        const mensajeErrorID = document.getElementById('mensajeErrorID');

        if (idClienteInput.value) {
            segundoFormulario.style.display = 'block';
            mensajeErrorID.style.display = 'none'; // Oculta el mensaje de error si se ingresó un ID válido
        } else {
            segundoFormulario.style.display = 'none';
            mensajeErrorID.style.display = 'block'; // Muestra el mensaje de error si no se ingresó un ID válido
        }
    }

    tipoPagoInput.addEventListener('input', function () {
        if (this.value < 1 || this.value > 2) {
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
</body>
</html>