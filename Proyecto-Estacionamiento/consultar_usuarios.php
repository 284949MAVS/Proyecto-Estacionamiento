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
  <style>
    .container {
            display: flex;
            justify-content: center;
            align-items: center;
           
        }
       
    .form{
           
            justify-content: center;
            align-items: center;
           /* padding-right: 20%;*/
           margin-left: 100px;
           margin-right: 100px;


    }
    .form-control{
      margin-left: 100px;
           margin-right: 100px;
    }
    .btn{
      margin-left: 100px;
           margin-right: 100px;
    }
  </style>
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
            <a class="nav-link" href="inicio.php" aria-current="page">Inicio </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nuevo_usuario.html">Nuevo usuario</a>
        </li> 
          <li class="nav-item">
            <a class="nav-link active" href="consultar_usuarios.php">Consultar Usuario <span class="visually-hidden">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nuevo_cliente.html" aria-current="page">Nuevo Cliente </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar_cliente.php">Consultar Cliente</a>
          </li> 
        </ul>
        <a class="navbar-brand" href="#"><i class="fa-solid fa-circle-user"> Usuario</i></a>
      </div>
      <br>
    </nav>

  </header>
<main>
  <br>
  <div class="container">
  <div style="border-radius: 45px; border: 5px solid whitesmoke; width: 700px; height: 500px; background-color: whitesmoke;" class="form">
    <div style="">
        <h1 style="font-size: bold; text-align:center">Consultar Usuarios <i class="fa-solid fa-magnifying-glass"></i></i></h1>
    </div>
    <br>
    <form style="align-items: center;" style="justify-content: center;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="mb-3" style="text-align: center;">
            <label for="exampleInputEmail1" class="form-label" style="text-align: center;">ID de usuario</label>
            <input type="text" name="id_User" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 500px;" oninput="verificarCamposCompletos()">
        </div>
         
        <br>
        
        <button type="submit" class="btn btn-primary" id="consultarButton"   name="consultar" disabled>Consultar</button>
        

        </div>
    </form>
    </div>
   
    <br>
    <!-- Contenedor de la tabla, inicialmente oculto -->
    <div class="container">
    <div id="tablaContainer"  style="border-radius: 45px; border: 5px solid whitesmoke; width: 1000px; height: 190px;  background-color: whitesmoke; <?php echo isset($_POST['consultar']) ? 'display:block;' : 'display:none;'; ?>">
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
                        
                        
                    } else {
                        echo "No se encontró el usuario en la base de datos.";
                    }

                    $mysqli->close();
                }
                ?>
            </tbody>
            
        </table>
        <div style="text-align: center;">
          <form action="modificar_usuario.php" method="GET">
            <input type="hidden" name="id" value="<?php echo $row['id_User']; ?>">
            <button type="submit" class="btn btn-primary">Editar</button>
          </form>

          <form action="eliminar_usuario.php" method="GET">
            <input type="hidden" name="id" value="<?php echo $row['id_User']; ?>">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Eliminar</button>
          </form>
          
          <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ¿Estás seguro de que deseas eliminar este usuario?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <a href="eliminar_usuario.php?id=<?php echo $row['id_User']; ?>" class="btn btn-danger">Eliminar</a>
                </div>
              </div>
            </div>
          </div>
        
        <div style="text-align: center;">
          
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