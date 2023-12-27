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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Simulación de Entrada</title>
</head>
<body>
    
<nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #042E5D;"> 
        <a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img" alt="..." style="width: 60px ;" style="border: 0cm;"></a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
        <div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
      <ul class="navbar-nav me-auto mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="inicio_caseta.php" aria-current="page">Inicio </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Corte de caja
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="mostrar_corte.php">Corte de caja actual</a></li> 
            <li><a class="dropdown-item" href="consultar_corte.php">Consulta corte</a></li>
          </ul>
        </li>
        <a class="nav-link " href="simulacion_entrada.php" id="navbarDropdown" role="button"  aria-expanded="false">
            Simulación entrada
          </a>
          <a class="nav-link " href="ticket.php" id="navbarDropdown" role="button"  aria-expanded="false">
            Ticket
          </a>
    </ul>


    </div>
   
    <br>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalEstacionamiento1">DUI</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalEstacionamiento2">Pozo 3</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalEstacionamiento3">Ingeniería</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalEstacionamiento4">Hábitat</button>
        </div>
    </div>
</div>
<?php for ($i = 1; $i <= 4; $i++): ?>
    <div class="modal fade" id="modalEstacionamiento<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="modalEstacionamiento<?= $i ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEstacionamiento<?= $i ?>Label">Clave de acceso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="procesar_entrada.php" method="post">
                        <div class="form-group">
                            <label for="clave">Clave:</label>
                            <input type="numeric" class="form-control" id="clave" name="clave" required>
                        </div>
                        <input type="hidden" name="estacionamiento" value="<?= $i ?>">
                        <button type="submit" class="btn btn-primary">Entrada</button>
                    </form>

  
                    <form action="procesar_salida.php" method="post">
                        <div class="form-group mt-3">
                        <label for="clave">Clave:</label>
                            <input type="numeric" class="form-control" id="clave" name="clave" required>
                      
                        </div>
                            <input type="hidden" name="estacionamiento" value="<?= $i ?>">
                            <button type="submit" class="btn btn-danger">Salida</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endfor; ?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
