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
    <title>Página de Inicio</title>
</head>
<body>
<?php include 'header.php'; ?>
    <div>
        <p>Bienvenido <?php echo $emailLogeado; ?> | <a href="cerrar_sesion.php">Cerrar Sesión</a></p>
    </div>

    <h1>Bienvenido a CLIMATE</h1>
    <p>Aquí podrás ver el clima de diferentes ciudades</p>

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
</body>
<?php include 'footer.php'; ?>
</html>

