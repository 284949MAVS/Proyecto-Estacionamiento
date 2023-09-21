<!DOCTYPE html>
<html lang="en">

<head>
  <title>Consulta Usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="font-family: Roboto; background-color: #004A98;">
  <header style="font-family: Roboto; background-color: #004A98;">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: rgb(37, 96, 245);">
      <a class="navbar-brand" href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img-thumbnail" alt="..." style="width: 50px ;" style="border: 0cm;"></a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
      <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="inicio.html" aria-current="page">Inicio </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nuevo_usuario.html">Nuevo usuario</a>
        </li> 
          <li class="nav-item">
            <a class="nav-link active" href="consultar_usuario.html">Consultar Usuario <span class="visually-hidden">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nuevo_cliente.html" aria-current="page">Nuevo Cliente </a>
          </li>
        </ul>
        <a class="navbar-brand" href="#"><i class="fa-solid fa-circle-user"> Usuario</i></a>
      </div>
      <br>
    </nav>
  </header>
  <main>
  <div style="border-radius: 45px; border: 5px solid whitesmoke; width: 700px; height: 500px; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%); background-color: whitesmoke;">
    <div style="position: absolute; top: 10%; left: 40%; transform: translate(-30%, -50%);">
        <h1 style="font-size: bold;">Consultar Usuarios<i class="fa-solid fa-circle-check"></i></h1>
    </div>
    <form style="align-items: center; position: absolute; top: 53%; left: 50%; transform: translate(-50%, -50%);" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID de usuario</label>
            <input type="text" name="id_User" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 500px;" oninput="verificarCamposCompletos()">
        </div>
        <!-- Otros campos del formulario aquí -->

        <div style="position: absolute; top: 105%; left: 50%; transform: translate(-50%, -50%);">
        <button type="submit" class="btn btn-primary" id="consultarButton" name="consultar" disabled>Consultar</button>

        </div>
    </form>

    <!-- Contenedor de la tabla, inicialmente oculto -->
    <div id="tablaContainer" style="border-radius: 45px; border: 5px solid whitesmoke; width: 1000px; height: 150px; position: absolute; top: 125%; left: 50%; transform: translate(-50%, -50%); background-color: whitesmoke; <?php echo isset($_POST['consultar']) ? 'display:block;' : 'display:none;'; ?>">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cve</th>
                    <th>Nombre</th>
                    <th>Ap. paterno</th>
                    <th>Ap. materno</th>
                    <th>Tipo usu.</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Act.</th>
                    <th>Contraseña</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST["consultar"])) {
               require "conexion.php";

                    $id = $_POST["id_User"];
                    $query = "SELECT * FROM usuarios WHERE id_User = $id";
                    $result = $mysqli->query($query);

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();

                        echo "<tr>";
                        echo "<td>" . $row["id_User"] . "</td>";
                        echo "<td>" . $row["nom_User"] . "</td>";
                        echo "<td>" . $row["ap_PatU"] . "</td>";
                        echo "<td>" . $row["ap_MatU"] . "</td>";
                        echo "<td>" . $row["tipo_User"] . "</td>";
                        echo "<td>" . $row["correo_User"] . "</td>";
                        echo "<td>" . $row["tel_User"] . "</td>";
                        echo "<td>" . $row["act_User"] . "</td>";
                        echo "<td>" . $row["pass_User"] . "</td>";
                     
                        echo "</tr>";
                    } else {
                        echo "No se encontró el usuario en la base de datos.";
                    }

                    $mysqli->close();
                }
                ?>
            </tbody>
        </table>
        <div style="text-align: center;">
            <button class="btn btn-primary">Editar</button>
            <button class="btn btn-danger">Eliminar</button>
        </div>
    </div>
    
    </div>
</div>

      
  </main>
  <footer>
    <!-- Coloca el pie de página aquí -->
    <p class="placeholder-glow">
      <span class="placeholder col-12"></span>
    </p>
  </footer>

  <!-- Bibliotecas de JavaScript de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

<script>
    
    var idUserInput = document.querySelector("input[name='id_User']");
    var consultarButton = document.getElementById("consultarButton");

    idUserInput.addEventListener("input", function () {
        if (idUserInput.value.trim() !== "") {
            consultarButton.disabled = false;
        } else {
            consultarButton.disabled = true;
        }
    });
</script>

</body>

</html>