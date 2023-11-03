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
<?php
include('conexion.php');

$consulta_contrato = "SELECT * FROM contratos";
$resultado_contrato = $mysqli->query($consulta_contrato);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultar Contrato</title>
    <title>Consultar Contrato</title>
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
<nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #042E5D;"> 
    <a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img" alt="..." style="width: 60px ;" style="border: 0cm;"></a>
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

<body style="font-family: Roboto;">
  
<script>
    $(document).ready( function () {
    $('#table').DataTable();
} );
</script>

    <div class="container2">
        <h2 style="text-align:center">Información de Contratos</h2>
        <table class="table table-striped" id="table">
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Características del vehículo</th>
                    <th>Tipo de pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($info_contrato = $resultado_contrato->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $info_contrato['id_Cliente']; ?></td>
                        <td><?php echo $info_contrato['auto_Cliente']; ?></td>
                        <td><?php echo $info_contrato['pago_Cliente']; ?></td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarModal<?php echo $info_contrato['id_Cliente']; ?>"><i class='fas fa-edit'></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo $info_contrato['id_Cliente']; ?>"><i class='fas fa-trash-alt'></i></button>
                        </td>
                    </tr>

                    <!-- Modal para editar contrato -->
                    <div class="modal fade" id="editarModal<?php echo $info_contrato['id_Cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editarModalLabel">Editar Contrato</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="">
                                        <label>ID del Contrato a Editar:</label>
                                        <input type="text" name="id_contrato" value="<?php echo $info_contrato['id_Cliente']; ?>" readonly><br>
                                        <label>Nuevo Auto del Cliente:</label>
                                        <input type="text" name="nuevo_auto" value="<?php echo $info_contrato['auto_Cliente']; ?>"><br>
                                        <label>Tipo de Pago del Cliente:</label>
                                        <input type="text" pattern="[12]" title="El tipo de pago solamente puede ser: 1 Nómina  2 Depósito" name="nuevo_pago" value="<?php echo $info_contrato['pago_Cliente']; ?> "><br>
                                        <label>Nueva Vigencia (meses):</label>
                                        <input type="date" name="nueva_vigencia" value="<?php echo $info_contrato['fechacont_Cliente']; ?>"><br>
                                        <input type="hidden" name="id_contrato" value="<?php echo $info_contrato['id_Cliente']; ?>">
                                        <input type="submit" class="btn btn-primary" name="actualizar" value="Actualizar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para eliminar contrato -->
                    <div class="modal fade" id="eliminarModal<?php echo $info_contrato['id_Cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eliminarModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar este contrato?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="eliminar_contrato.php?id_contrato=<?php echo $info_contrato['id_Cliente']; ?>" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    
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
