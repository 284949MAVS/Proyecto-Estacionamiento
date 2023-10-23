<?php
include('conexion.php');


$id_cliente = '';
$info_contrato = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_cliente"];

    $consulta_contrato = "SELECT * FROM contratos WHERE id_cliente = '$id_cliente'";
    $resultado_contrato = $mysqli->query($consulta_contrato);

    if ($resultado_contrato->num_rows > 0) {
        $info_contrato = $resultado_contrato->fetch_assoc();
    }
}

$mysqli->close();
?>

<?php
    include('conexion.php');
    if(isset($_GET['id_contrato'])){
    $id_contrato = $_GET["id_contrato"];

    $consulta_contrato = "SELECT * FROM contratos WHERE id_Cliente = '$id_contrato'";
    $resultado_contrato = $mysqli->query($consulta_contrato);

    if ($resultado_contrato->num_rows > 0) {
        $info_contrato = $resultado_contrato->fetch_assoc();
    } else {
        echo "No se encontró el contrato con el ID.";
        exit;
    }
}

    $mysqli->close();
?>

<?php
include('conexion.php');
if (isset($_POST['actualizar'])){
    $id_contrato = $_POST["id_contrato"];
    $nuevo_auto = $_POST["nuevo_auto"];
    $nuevo_pago = $_POST["nuevo_pago"];
    $nueva_vigencia = $_POST["nueva_vigencia"]; 

    $actualizar_contrato = "UPDATE contratos SET";

    if (!empty($nuevo_auto)) {
        $actualizar_contrato .= " auto_Cliente = '$nuevo_auto',";
    }

    if (!empty($nuevo_pago)) {
        $actualizar_contrato .= " pago_Cliente = '$nuevo_pago',";
    }

    if (!empty($nueva_vigencia)) {
        $actualizar_contrato .= " fechacont_Cliente = '$nueva_vigencia',";
    }

    $actualizar_contrato = rtrim($actualizar_contrato, ',');

    $actualizar_contrato .= " WHERE id_Cliente = '$id_contrato'";

    if ($mysqli->query($actualizar_contrato) === TRUE) {
        echo "Contrato editado correctamente.";
    } else {
        echo "Error al editar el contrato: " . $mysqli->error;
    }

    header("location:consultar_contrato.php"); 
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultar Contrato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

 

  <!-- Bootstrap CSS v5.2.1 -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"

    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

 

    <style>

        .container {

            margin: 0% auto;

            align-items: center;

            justify-content: center;

           

           display: flex;

        }

        .form{

           

           justify-content: center;

           align-items: center;

          /* padding-right: 20%;*/

          margin-left: 100px;

          margin-right: 100px;

 

 

        }

 

        .p{

            background-color: whithe;

            height: 20px;

            width:200px;

        }

        .container2 {

        width: 50%; /* Puedes ajustar el ancho según tus necesidades */

        margin: 0 auto; /* Esto centrará el contenedor horizontalmente */

        background-color: #ffffff; /* Fondo blanco */

        padding: 20px; /* Añade un relleno para mejorar la apariencia */

        border-radius: 10px; /* Puedes ajustar el radio de borde según tus preferencias */

        }

 

        .button-container {

        display: flex;

        flex-direction: row;

        align-items: center;

        justify-content: center;

       

       

      }

    </style>

 

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

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

<br>
</head>
<body style="font-family: Roboto; ">

<div class="container">

<form method="post" action="">

    <label style="color: black;">ID del Cliente:</label>

    <input type="text" name="id_cliente"pattern="[0-9]{6}" title="Proporcione un identificador unico de 6 digitos" value="<?php echo $id_cliente; ?>" required>

    <input type="submit" value="Buscar">
    

</form>

</div>

<div class="container2" id="container" style="display=none" >
    
    <?php if (!empty($info_contrato)): ?>

    <h2 style="text-align:center">Información del Contrato</h2>

    <p >ID Cliente: <?php echo $id_cliente; ?></p>

    <p>Modelo del vehículo: <?php echo $info_contrato['auto_Cliente']; ?></p>

    <p>Tipo de pago: <?php echo $info_contrato['pago_Cliente']; ?></p>

 

 

     <div class="button-container">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $info_contrato['id_Cliente']; ?>">Modificar Contrato</button>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop<?php echo $info_contrato['id_Cliente']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Contrato</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <form method="post" action="consultar_contrato.php">
                                        <label>ID del Contrato a Editar:</label>
                                        <input type="text" name="id_contrato" value="<?php echo $info_contrato["id_Cliente"]; ?>" readonly><br>
                                        <label>Nuevo Auto del Cliente:</label>
                                        <input type="text" name="nuevo_auto" value="<?php echo $info_contrato['auto_Cliente']; ?>"><br>
                                        <label>Nuevo Pago del Cliente:</label>
                                        <input type="number" name="nuevo_pago" value="<?php echo $info_contrato['pago_Cliente']; ?>"><br>
                                        <label>Nueva Vigencia (meses):</label>
                                        <input type="date" name="nueva_vigencia" value="<?php echo $info_contrato['fechacont_Cliente']; ?>"><br>
                                        <input type="hidden" name="id_actividad" value="<?php echo $actividad['id']; ?>">
                                        <input type="submit" class="btn btn-primary" name="actualizar" value="Actualizar">
                                    </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

          <form action="eliminar_contrato.php" method="GET">
            <input type="hidden" name="id_contrato" value="<?php echo $info_contrato['id_Cliente']; ?>">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Eliminar Contrato</button>
          </form>
          
          <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar este contrato?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a onclick="location.href='eliminar_contrato.php?id_contrato=<?php echo $info_contrato['id_Cliente']; ?>'" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
          </div>
     </div>

  </div>
</div>
 

    <?php endif; ?>



  </main>

  <footer>

    <!-- place footer here -->

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
