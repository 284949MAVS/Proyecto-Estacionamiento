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
  <title>Crear nuevo cliente</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
 width: 100%;
}

.btn-primary {
 margin-left: auto;
 display: block;
}
     </style>
  </head>

<body style="font-family: Roboto; ">
  <header  style="font-family: Roboto; ">
    <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #004A98;"> 
      <a class="navbar-brand"  href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img-thumbnail" alt="..." style="width: 50px ;" style="border: 0cm;"></a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
      <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item">
              <a class="nav-link dropdown" href="inicio.php" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
          </li>
  
          <li class="nav-item dropdown">
              <a class="nav-link" href="consultar_usuarios.php"  role="button" >
                Usuario
              </a>
            </li>

            <li class="nav-item active">
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
  
  
  </header>
  <main>

    

    <div class="container">

    <!-- Breadcrumbs -->
<div class="container-fluid mt-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
          <li class="breadcrumb-item"><a href="consultar_cliente.php"> Consultar Clientes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Crear Clientes</li>
        </ol>
      </nav>
</div>

      <div class="form-container">
        <h1 style="font-weight: bold;">Crear nuevo cliente <i class="fa-solid fa-circle-check"></i></h1>
        <form action="nuevo_cliente.php" method="post" class="form">
          <div class="form-row">
            <label for="id_Cliente">ID Cliente:</label>
            <input type="text" name="id_Cliente" pattern="[0-9]{6}" title="Proporcione un identificador único de 6 dígitos" class="form-control" id="id_Cliente" required>
          </div>
          <div class="form-row">
            <label for="nom_Cliente">Nombre(s):</label>
            <input type="text" name="nom_Cliente" class="form-control" pattern="^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]*(?: [A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]*)?$" title="Ingresar solamente letras y/o espacios" id="nom_Cliente" required>
          </div>
          <div class="form-row">
            <label for="ap_Patc">Apellido paterno:</label>
            <input type="text" name="ap_Patc" class="form-control" pattern="^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]*(?: [A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]*)?$" title="Ingresar solamente letras y/o espacios" id="ap_Patc" required>
          </div>
          <div class="form-row">
            <label for="ap_Matc">Apellido materno:</label>
            <input type="text" name="ap_Matc" class="form-control" pattern="^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]*(?: [A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]*)?$" title="Ingresar solamente letras y/o espacios" id="ap_Matc" required>
          </div>
          <div class="form-row">
            <label for="rfc_Cliente">RFC:</label>
            <input type="text" name="rfc_Cliente" class="form-control" pattern="^[A-Z&Ñ]{4}\d{6}([A-Z\d]{3})?$" title="Proporcione un RFC válido" id="rfc_Cliente" required>
          </div>
          <div class="form-row">
            <label for="dir_Cliente">Dirección:</label>
            <input type="text" name="dir_Cliente" class="form-control" id="dir_Cliente" required>
          </div>
          <div class="form-row">
            <label for="tel_Cliente">Teléfono:</label>
            <input type="text" name="tel_Cliente" pattern="\d{10}" title="El número debe contener 10 dígitos" class="form-control" id="tel_Cliente" required>
          </div>
          <div class="form-row">
            <label for="correo_Cliente">Correo:</label>
            <input type="email" name="correo_Cliente" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"  class="form-control" title="Proporcione un formato válido de correo electrónico: xxxx@dom.example" id="correo_Cliente" required>
          </div>
          <div class="form-row">
            <label for="id_Credencial">ID Credencial:</label>
            <input type="text" name="id_Credencial" class="form-control" id="id_Credencial" required>
          </div>
          <div class="form-row">
            <label for="tipo_Cliente">Tipo de cliente:</label>
            <select id="tipo_Cliente" class="form-select" name="tipo_Cliente" required>
              <option value="Administrativo">Administrativo</option>
              <option value="Academico">Academico</option>
              <option value="Alumno">Alumno</option>
            </select>
          </div>
          <div class="form-row">
            <label for="act_Cli">Estado de actividad:</label>
            <select id="act_Cli" class="form-select" name="act_Cli" required>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>
    
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>
    
  </main>
  <footer>
    <!-- place footer here 
    <p class="placeholder-glow">
      <span class="placeholder col-12"></span>
      </p>-->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>