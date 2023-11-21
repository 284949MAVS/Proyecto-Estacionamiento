<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Simulación de Entrada</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalEstacionamiento1">Estacionamiento 1</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalEstacionamiento2">Estacionamiento 2</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalEstacionamiento3">Estacionamiento 3</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalEstacionamiento4">Estacionamiento 4</button>
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
