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
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.img{
max-width: 100%; /* Hace que la imagen no exceda el ancho del contenedor */
width: auto; /* Mantiene la proporción de la imagen */
margin-right: 10px; /* Añade un margen opcional entre las imágenes */
}
</style>
</head>

<body>
<header>

<nav class="navbar navbar-expand-sm navbar-dark " style="background-color: rgb(37, 96, 245);">

<a class="navbar-brand" href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIV7jNuxG7PQhpl_uAbWUzB5UrDGk66CbSUIGoUh4JEQBCNhqi2CWj5eIQNQEXIIctIuk&usqp=CAU" class="img-thumbnail" alt="..." style="width: 50px ;" style="border: 0cm;"></a>
<button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;"></button>
<div class="collapse navbar-collapse d-flex justify-content-evenly" id="collapsibleNavId">
<ul class="navbar-nav me-auto mt-2 mt-lg-0">
<li class="nav-item">
<a class="nav-link active" href="#" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="nuevo_usuario.html">Nuevo usuario</a>
</li>
<li class="nav-item">
<a class="nav-link" href="consultar_usuarios.php">Consultar Usuario</a>
</li>
<li class="nav-item">
<a class="nav-link" href="nuevo_cliente.html">Nuevo Cliente</a>
</li>
</ul>


</div>

<br>
</nav>

<!-- place navbar here -->
</header>
<div><img src="imagenes/logosuaslp.png " alt="" ><img src="imagenes/inge.jpeg" clas="img"width="1037px" height="133px" alt="" style=""></div>
<br>
<main>
<br>
<h1 style="font-weight: bold; text-align: center;">Sistema de estacionamiento de zona universitaria</h1>


<div class="container d-flex flex-wrap justify-content-center bg-white overflow-auto">
<div class="bannerDiv mt-4 mb-4 bg-light p-3 w-75 d-flex justify-content-center">
<div id="carouselExample" class="carousel slide">
<div class="carousel-inner" data-bs-ride="carousel">
<div class="carousel-item active">
<img src="https://infocomp.ingenieria.uaslp.mx/cominf/public/imagenes/mapa.jpg" class="d-block" alt="1">
</div>
<div class="carousel-item">
<img src="https://pr0.nicelocal.com.mx/BveK7J8dLmuS0DNbMwcWnQ/587x440,q85/4px-BW84_n0QJGVPszge3NRBsKw-2VcOifrJIjPYFYkOtaCZxxXQ2QWjJ2n10EVOc4ttQZX-b7NB0AxD2Fqrpz2MCJwPkaR04-WOcfFku213Vlu6Wpk5TQ" class="d-block" alt="1">
</div>
<div class="carousel-item">
<img src="https://potosinoticias.com/wp-content/uploads/2019/01/Zona_Universitaria_Poniente.jpg" class="d-block" alt="1">
</div>


</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
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

<script>
$(document).ready(function(){
$('#carouselExample img').css('max-height', '500px');
$('#carouselExample img').css('max-width', '100%');


});
</script>
</script>
</body>

</html>

