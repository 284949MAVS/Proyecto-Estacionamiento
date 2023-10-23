<!DOCTYPE html>
<html lang="en">

<head>
  <title>Consulta Usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    .table-container {
  margin: 0 auto;
  text-align: center;
}
  </style>

</head>

<body style="font-family: Roboto;">
  <header style="font-family: Roboto;">
  <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #004A98;"> 
        <a class="navbar-brand"  href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img-thumbnail" alt="..." style="width: 50px ;" style="border: 0cm;"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
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
<h1 style="font-size: bold; text-align: center;">Consultar Clientes <i class="fa-solid fa-magnifying-glass"></i></h1>
</div> 

<div class="container text-center">
    <div class="row justify-content-center">  
          <br>
          <div class="table"> <!-- Agrega un contenedor responsive para la tabla -->
            <table class="table table-no-border table-striped" id="table">
              <thead>
                <tr>
                  <th>Cve</th>
                  <th>Nombre</th>
                  <th>Ap. paterno</th>
                  <th>Ap. materno</th>
                  <th>RFC</th>
                  <th>Dirección</th>
                  <th>Tel</th>
                  <th>Correo</th>
                  <th>Credencial</th>
                  <th>Tipo</th>
                  <th>Act</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require "conexion.php";
                $query = "SELECT * FROM clientes";
                $result = $mysqli->query($query);

                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["id_Cliente"] . "</td>";
                  echo "<td>" . $row["nom_Cliente"] . "</td>";
                  echo "<td>" . $row["ap_Patc"] . "</td>";
                  echo "<td>" . $row["ap_Matc"] . "</td>";
                  echo "<td>" . $row["rfc_Cliente"] . "</td>";
                  echo "<td><div class='text-truncate' style='max-width: 100px;'>" . $row["dir_Cliente"] . "</div></td>";
                  echo "<td>" . $row["tel_Cliente"] . "</td>";
                  echo "<td><div class='text-truncate' style='max-width: 100px;'>" . $row["correo_Cliente"] . "</div></td>";
                  echo "<td>" . $row["id_Credencial"] . "</td>";
                  echo "<td>" . $row["tipo_Cliente"] . "</td>";
                  echo "<td>" . $row["act_Cli"] . "</td>";
                  echo "<td>
                        <div class='btn-group' role='group' aria-label='Acciones'>
                          <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#staticBackdrop{$row['id_Cliente']}'><i class='fas fa-edit'></i></button>
                          <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#confirmDeleteModal{$row['id_Cliente']}'><i class='fas fa-trash-alt'></i></button>
                        </div>
                        </td>";
                }
                ?>
              </tbody>
            </table>
          </div>
    </div>
  </div>
  
  <?php
  $result->data_seek(0); // Reiniciar el puntero de resultados
  while ($row = $result->fetch_assoc()) {
    echo "<div class='modal fade' id='staticBackdrop{$row['id_Cliente']}' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h1 class='modal-title fs-5' id='staticBackdropLabel'>Actualizar Cliente</h1>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                  <form action='editar_cliente.php' method='post'>
                    <input type='hidden' name='id_Cliente_Editar' value='{$row['id_Cliente']}'>
                    <label for='nuevo_dir_Cliente'>Dirección:</label>
                    <input type='text' id='nuevo_dir_Cliente' name='nuevo_dir_Cliente' style='border-radius: 45px;' value='{$row["dir_Cliente"]}'><br>
                    <br>
                    <label for='nuevo_correo_Cliente'>Correo:</label>
                    <input type='text' id='nuevo_correo_Cliente' name='nuevo_correo_Cliente' style='border-radius: 45px;' value='{$row["correo_Cliente"]}'><br>
                    <br>
                    <label for='nuevo_tipoCliente'>Tipo:</label>
                    <input type='text' id='nuevo_tipoCliente' name='nuevo_tipoCliente' style='border-radius: 45px;' value='{$row["tipo_Cliente"]}'><br>
                    <br>
                    <input type='submit' class='btn btn-primary' value='Guardar Cambios'>
                  </form>
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancelar</button>
                </div>
              </div>
            </div>
          </div>";
  
    echo "<div class='modal fade' id='confirmDeleteModal{$row['id_Cliente']}' tabindex='-1' role='dialog' aria-labelledby='confirmDeleteModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title' id='confirmDeleteModalLabel'>Confirmar Eliminación</h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>
                <div class='modal-body'>
                  ¿Estás seguro de que deseas eliminar este cliente?
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                  <a href='eliminar_cliente.php?id={$row['id_Cliente']}' class='btn btn-danger'>Eliminar</a>
                </div>
              </div>
            </div>
          </div>";
  }
  ?>
       
      
  <?php
  $result->data_seek(0); // Reiniciar el puntero de resultados
  while ($row = $result->fetch_assoc()) {
    echo "<div class='modal fade' id='staticBackdrop{$row['id_Cliente']}' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h1 class='modal-title fs-5' id='staticBackdropLabel'>Actualizar Cliente</h1>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                  <form action='editar_cliente.php' method='post'>
                    <input type='hidden' name='id_Cliente_Editar' value='{$row['id_Cliente']}'>
                    <label for='nuevo_dir_Cliente'>Dirección:</label>
                    <input type='text' id='nuevo_dir_Cliente' name='nuevo_dir_Cliente' style='border-radius: 45px;' value='{$row["dir_Cliente"]}'><br>
                    <br>
                    <label for='nuevo_correo_Cliente'>Correo:</label>
                    <input type='text' id='nuevo_correo_Cliente' name='nuevo_correo_Cliente' style='border-radius: 45px;' value='{$row["correo_Cliente"]}'><br>
                    <br>
                    <label for='nuevo_tipoCliente'>Tipo:</label>
                    <input type='text' id='nuevo_tipoCliente' name='nuevo_tipoCliente' style='border-radius: 45px;' value='{$row["tipo_Cliente"]}'><br>
                    <br>
                    <input type='submit' class='btn btn-primary' value='Guardar Cambios'>
                  </form>
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancelar</button>
                </div>
              </div>
            </div>
          </div>";
  
    echo "<div class='modal fade' id='confirmDeleteModal{$row['id_Cliente']}' tabindex='-1' role='dialog' aria-labelledby='confirmDeleteModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title' id='confirmDeleteModalLabel'>Confirmar Eliminación</h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>
                <div class='modal-body'>
                  ¿Estás seguro de que deseas eliminar este cliente?
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                  <a href='eliminar_cliente.php?id={$row['id_Cliente']}' class='btn btn-danger'>Eliminar</a>
                </div>
              </div>
            </div>
          </div>";
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
    
    var idUserInput = document.querySelector("input[name='id_Cliente']");
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







