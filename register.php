<?php
include("header.php");
//include("views/menu.php");
include("views/register.php");
include("footer.php");
//CLASE NUEVA
require_once "basedatos.php";


// Configuración de la conexión
/*
$host = 'localhost';
$port = 27017;
$database = 'sequia';
$collection = 'estado';

$connection = new MongoDBConnection($host, $port, $database);
$client = $connection->connect();

if ($client) {
    echo "Conexión exitosa a MongoDB<br>";

    $database = $connection->selectDatabase();
    echo "Base de datos seleccionada: $database";

// CREACION DE UN INSER 
   /* $document = [
                   'estado_id' => 100,
                   'estadp' => 'PRUEBA',
                   'region' => 'Norte'
    ];

// Crear el objeto de inserción
    $insertOne = new MongoDB\Driver\BulkWrite();
    $insertOne->insert($document);    


    // Especificar la base de datos y la colección
    $namespace = "$database.$collection";

    // Ejecutar la inserción
    $result = $client->executeBulkWrite($namespace, $insertOne);

    // Verificar el resultado
    if ($result->getInsertedCount() > 0) {
        echo "Registro insertado exitosamente";
    }else {
        echo "Error al insertar el registro";
}

} else {
    echo "Error al conectar a MongoDB";
}

*/
?>