<?php
require_once "C:\wamp64\www\sistema_dne\basedatos.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uemail = ($_POST['email']);
    $upassword = ($_POST['password']);

    // Realizar la autenticación en la base de datos
    $host = 'localhost';
    $port = 27017;
    $database = 'proyecto';
    $collection = 'usuarios';

    $connection = new MongoDBConnection($host, $port, $database);
    $client = $connection->connect();

    $filter = ['email' => $uemail, 'password' => $upassword];
    $options = ['projection' => []];
    $query = new MongoDB\Driver\Query($filter, $options);
    $namespace = "$database.$collection";

    $result = $client->executeQuery($namespace, $query);

    $user = $result->toArray()[0] ?? null; // Obtener el primer elemento del resultado

    if ($user) {
        $userArray = (array)$user;  // Convertir el objeto stdClass a un array
        // Acceder a las propiedades como un array
        $nombre = $userArray['nombre'];
        $email = $userArray['email'];
        // ...
        $_SESSION['email'] = $email; // Usar la variable $email obtenida del array
        header("Location: index.php");
        exit();
    } else {
        // Usuario no autenticado, mostrar mensaje de error
        $error_message = "Error: Correo electrónico o contraseña incorrectos";
    }

    unset($client);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/admin_estilo.css">
</head>
<body>

    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>

    
    <div class="form-container">
    <form method="post" action="login.php">
    <h3>Iniciar Sesión</h3>
        <input type="email" name="email" placeholder="Correo electrónico" required class="box">
        <input type="password" name="password" placeholder="Ingresa contraseña" required class="box">
        
        <div class="button-container">
        <button type="submit"  class="btn">Iniciar Sesión</button>
        </div>
    </form>

</body>
</html>

