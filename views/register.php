
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>REGISTRO</title>
   <link rel="stylesheet" href="css/admin_estilo.css">

</head>
<body>

    <div class="form-container">
            <form action="views/insert.php" method="POST">
            <h3>REGISTRATE AHORA</h3>
    <form method="post">
        <input type="text" placeholder="Ingesa tu nombre" name="nombre" required class="box"><br><br>
        <input type="email" placeholder="Ingresa tu correo" name="email"required class="box"><br><br>
        <input type="password" placeholder="Ingresa contraseña" name="password" required class="box"><br><br>
        
                <div class="button-container">
                    <button type="submit" class="btn">Registrarse</button>
                </div>
            </form>
        </div>
</body>
</html>