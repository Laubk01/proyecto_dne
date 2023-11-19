<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Si el usuario no está autenticado, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

$emailLogeado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css"> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.heat@0.2.0/dist/leaflet-heat.js"></script>

    <title>Página de Inicio</title>
</head>
<body>
<?php include 'header.php'; ?>
    <div>
        <p>Bienvenido <?php echo $emailLogeado; ?> | <a href="cerrar_sesion.php">Cerrar Sesión</a></p>
    </div>

    <h1>Bienvenido a la Página de Inicio</h1>
    <p>inicio de pagina</p>

    <div id="map">
    <script src="mapa.js"></script>
</div>

<div>
    <br>
    <input type="text" id="cityInput" placeholder="ciudad a buscar..." />
    <button onclick="buscarClima()"  id="buscar"><i class="fas fa-search"></i></button>
    
</div>

<div id="clima-info">
    <div id="overlay"></div> 
    <div id="contenido" class="contenido">
 
    </div>

<script src="buscador.js"></script>
</body>
<?php include 'footer.php'; ?>
</html>

