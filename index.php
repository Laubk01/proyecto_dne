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

    <h1>Bienvenido a la Página de Inicio</h1>
    <p>Esta es una página de inicio simple.</p>

    
</body>
<?php include 'footer.php'; ?>
</html>

