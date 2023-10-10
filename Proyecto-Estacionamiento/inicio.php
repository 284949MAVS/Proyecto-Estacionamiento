
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
    
  <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: rgb(37, 96, 245);"> 
    <a class="navbar-brand"  href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img-thumbnail" alt="..." style="width: 50px ;" style="border: 0cm;"></a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
    <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
      <ul class="navbar-nav me-auto mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="#" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
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
  <div>
    <img src="imagenes/logosuaslp.png" alt="" width="600" height="120">
    <span id="fecha">   </span>
    <span id="hora"></span>
</div>
<br>
  <main>
    <br>
    <h1 style="font-weight: bold; text-align: center;">Sistema de estacionamiento de zona universitaria</h1>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://infocomp.ingenieria.uaslp.mx/cominf/public/imagenes/mapa.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://pr0.nicelocal.com.mx/BveK7J8dLmuS0DNbMwcWnQ/587x440,q85/4px-BW84_n0QJGVPszge3NRBsKw-2VcOifrJIjPYFYkOtaCZxxXQ2QWjJ2n10EVOc4ttQZX-b7NB0AxD2Fqrpz2MCJwPkaR04-WOcfFku213Vlu6Wpk5TQ" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://potosinoticias.com/wp-content/uploads/2019/01/Zona_Universitaria_Poniente.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

  </main>
  <footer>
    <!-- place footer here -->
    <p class="placeholder-glow">
        <span class="placeholder col-12"></span>
        </p>
  </footer>
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
            window.location.href = "login.html";
        }
    });
});

});
</script>

<script>
function mostrarFechaHora() {
    var fechaElemento = document.getElementById("fecha");
    var horaElemento = document.getElementById("hora");
    var fechaHoraActual = new Date();

    var diasSemana = ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"];
    var diaSemana = diasSemana[fechaHoraActual.getDay()];

    var meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    var mes = meses[fechaHoraActual.getMonth()];

    var dia = fechaHoraActual.getDate();
    var año = fechaHoraActual.getFullYear();
    var hora = fechaHoraActual.getHours();
    var minuto = fechaHoraActual.getMinutes();
    var segundo = fechaHoraActual.getSeconds();

    var formatoFecha = diaSemana + " " + dia + " de " + mes + " del " + año;
    var formatoHora = hora + ":" + (minuto < 10 ? "0" : "") + minuto + ":" + (segundo < 10 ? "0" : "") + segundo;

    fechaElemento.textContent = formatoFecha;
    horaElemento.textContent = "Hora: " + formatoHora;
}

mostrarFechaHora();

setInterval(mostrarFechaHora, 1000);
</script>

</body>

</html>