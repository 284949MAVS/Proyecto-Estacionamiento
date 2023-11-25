<?php
session_start();

// Verificar si la sesión no está activa
if (!isset($_SESSION['nom_User'])) {
    // Redireccionar a la pantalla de error o a otra página
    header("Location: pagueErrorlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Consulta Usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <style>
    .table-no-border tr, .table-no-border td {
      border: none;
    }

    .btn-group {
      display: flex;
      gap: 10px;
    }
  </style>
</head>

<body style="font-family: Roboto; ">
  <header style="font-family: Roboto; ">
  <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #004A98;"> 
        <a class="navbar-brand"  href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img-thumbnail" alt="..." style="width: 50px ;" style="border: 0cm;"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
        <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link dropdown" href="inicio.php" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
            </li>
    
            <li class="nav-item active">
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
    
        </ul>
        
        
        </div>
       
        <br>
    </nav>
    
    
    <!-- place navbar here -->

  </header>
<main>
<br>
<script>
    $(document).ready( function () {
    $('#table').DataTable();
} );
</script>

<div class="container">
    <h1 style="font-size: bold; text-align: center;">Consultar Usuarios <i class="fa-solid fa-magnifying-glass"></i></h1>
</div>

<!-- Breadcrumbs -->
<div class="container-fluid mt-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Consultar Usuarios</li>
        </ol>
      </nav>
</div>

  <br>
  <!-- Contenedor de la tabla, centrado y con el título arriba -->
  <div class="container text-center">
  <div class="table-responsive">
    <table class="table table-no-border table-striped" style="margin: 0 auto;" id="table">
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
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require "conexion.php";
        $query = "SELECT * FROM usuarios";
        $result = $mysqli->query($query);

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id_User"] . "</td>";
          echo "<td>" . $row["nom_User"] . "</td>";
          echo "<td>" . $row["ap_PatU"] . "</td>";
          echo "<td>" . $row["ap_MatU"] . "</td>";
          echo "<td>";

          if ($row["tipo_User"] == 1) {
              echo "Administrador";
          } elseif ($row["tipo_User"] == 2) {
              echo "Trabajador";
          } else {
              echo "Otro";
          }
          
          echo "</td>";
          echo "<td>" . $row["correo_User"] . "</td>";
          echo "<td>" . $row["tel_User"] . "</td>";
          echo "<td>";
          
          if ($row["act_User"] == 1) {
            echo "Activo";
          } elseif ($row["act_User"] == 0) {
            echo "Inactivo";
          } else {
            echo "Otro";
          }
          echo "</td>";
          echo "<td>" . $row["pass_User"] . "</td>";
          echo "<td class='btn-group'>
            <button type=\"button\" class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop{$row['id_User']}\"><i class='fas fa-edit'></i></button>
            <form action=\"eliminar_usuario.php\" method=\"GET\" style=\"display: inline-block;\">
              <input type=\"hidden\" name=\"id\" value=\"{$row['id_User']}\">
              <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#confirmDeleteModal{$row['id_User']}\"><i class='fas fa-trash-alt'></i></button>
            </form>
          </td>";
          echo "</tr>";
        }
        $mysqli->close();
        ?>
      </tbody>
    </table>
    </div>
</div>
  <!-- Modales de edición y eliminación -->
  <?php
  require "conexion.php";
  $query = "SELECT * FROM usuarios";
  $result = $mysqli->query($query);

  while ($row = $result->fetch_assoc()) {
    echo "<div class=\"modal fade\" id=\"staticBackdrop{$row['id_User']}\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">";
    echo "  <div class=\"modal-dialog\">";
    echo "    <div class=\"modal-content\">";
    echo "      <div class=\"modal-header\">";
    echo "        <h1 class=\"modal-title fs-5\">Actualizar Usuario</h1>";
    echo "        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
    echo "      </div>";
    echo "      <div class=\"modal-body\">";
    echo "        <form action=\"modificar_usuario.php\" method=\"post\">";
    echo "          <input type=\"hidden\" name=\"id\" value=\"{$row['id_User']}\">";
    echo "          <label for=\"nuevo_correo\">Correo:</label>";
    echo "          <input type=\"text\" id=\"nuevo_correo\" name=\"nuevo_correo\" style=\"border-radius: 45px;\" pattern=\"[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zAZ0-9_]+)*[.][a-zA-Z]{1,5}\" title=\"Proporcione un formato válido de correo electrónico: xxxx@dom.example\"  value=\"{$row['correo_User']}\"><br><br>";
    
    echo "          <label for=\"nuevo_tel\">Teléfono:</label>";
    echo "          <input type=\"text\" id=\"nuevo_tel\" name=\"nuevo_tel\" style=\"border-radius: 45px;\" pattern=\"\d{10}\" title=\"Proporcione un número de teléfono válido de 10 dígito\"  value=\"{$row['tel_User']}\"><br><br>";
    
    echo "         <label for='nuevo_tipo'>Tipo: </label> ";
    echo "         <select id='nuevo_tipo' name='nuevo_tipo' style='border-radius: 45px;'>";
    echo "           <option value='1' " . ($row['tipo_User'] == 1 ? "selected" : "") . ">Administrador</option>";
    echo "           <option value='2' " . ($row['tipo_User'] == 2 ? "selected" : "") . ">Trabajador</option>";
    echo "         </select><br><br>";

    echo "         <label for='nueva_act'>Actividad: </label> ";
    echo "         <select id='nueva_act' name='nueva_act' style='border-radius: 45px;'>";
    echo "           <option value='1' " . ($row['act_User'] == 1 ? "selected" : "") . ">Activo</option>";
    echo "           <option value='0' " . ($row['act_User'] == 0 ? "selected" : "") . ">Inactivo</option>";
    echo "         </select><br><br>";
    
    echo "          <input type=\"submit\" class=\"btn btn-primary\" value=\"Guardar Cambios\">";
    echo "        </form>";
    echo "      </div>";
    echo "      <div class=\"modal-footer\">";
    echo "        <button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\">Cancelar</button>";
    echo "      </div>";
    echo "    </div>";
    echo "  </div>";
    echo "</div>";

    echo "<div class=\"modal fade\" id=\"confirmDeleteModal{$row['id_User']}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"confirmDeleteModalLabel\" aria-hidden=\"true\">";
    echo "  <div class=\"modal-dialog\" role=\"document\">";
    echo "    <div class=\"modal-content\">";
    echo "      <div class=\"modal-header\">";
    echo "        <h5 class=\"modal-title\" id=\"confirmDeleteModalLabel\">Confirmar Eliminación</h5>";
    echo "        <button type=\"button\" class=\"btn-close\" data-dismiss=\"modal\" aria-label=\"Close\">";
    echo "          <span aria-hidden=\"true\">&times;</span>";
    echo "        </button>";
    echo "      </div>";
    echo "      <div class=\"modal-body\">";
    echo "        ¿Estás seguro de que deseas eliminar este usuario?";
    echo "      </div>";
    echo "      <div class=\"modal-footer\">";
    echo "        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>";
    echo "        <a href=\"eliminar_usuario.php?id={$row['id_User']}\" class=\"btn btn-danger\">Eliminar</a>";
    echo "      </div>";
    echo "    </div>";
    echo "  </div>";
    echo "</div>";
  }
  ?>
</main>
  
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

<script>
  $(document).ready(function () {
    var dataTable = $('#table').DataTable();

    // Crea el botón personalizado con clases de Bootstrap y estilos personalizados
    var customButton = $('<a href="crear_Usuario.php" class="btn btn-primary" style="background-color: #fff; color: #007bff;">Crear usuario</a>');

    // Agrega el botón antes del cuadro de búsqueda
    $('.dataTables_filter').prepend(customButton);

    // Agrega eventos de mouse al botón personalizado
    customButton.on({
      mouseenter: function () {
        // Cambia el color al pasar el mouse sobre el botón
        $(this).css('background-color', '#007bff');
        $(this).css('color', '#fff');
      },
      mouseleave: function () {
        // Restaura los colores originales al salir del botón
        $(this).css('background-color', '#fff');
        $(this).css('color', '#007bff');
      }
    });

    // Inicializa DataTable
    dataTable.DataTable();
  });
</script>


</body>

</html>

