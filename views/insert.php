<?php
require_once "../basedatos.php";
//include "submenu.php";
//MOSTRAR LOS DATOS DEL FORMULIO PARA INSERTAR EN LA BD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //VARIABLES DONDE SE DEPOSITAN LOS DATYOS DEL FORMULARIO
    $unombre= ($_POST['nombre']);
    $uemail =  ($_POST['email']);
    $upassword =  ($_POST['password']);
    // CONECTAR CON LA DB Y HACER LA INSERCION
    //DATOS DE LA CONEXION
    $host = 'localhost';
    $port = 27017;
    $database = 'proyecto';
    $collection = 'usuarios';
    $db = (new MongoDB\Client)->$database;

    $connection = new MongoDBConnection($host, $port, $database);
    $client = $connection->connect();

    $document = [
        'nombre' => $unombre,
        'email' => $uemail,
        'password' => $upassword,
    ];

    $insertOne = new MongoDB\Driver\BulkWrite();
    $insertOne->insert($document);

    $namespace = "$database.$collection";

    $result = $client->executeBulkWrite($namespace, $insertOne);

    if ($result->getInsertedCount() > 0) {
        unset($client);
    } else {
    }
}
?>