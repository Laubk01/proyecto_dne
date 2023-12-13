<?php
require_once "basedatos.php";


        $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $databaseName = "proyecto";
        $collectionName = "libros";

        // Construye la consulta para obtener todos los documentos de la colección
        $query = new MongoDB\Driver\Query([]);

        // Ejecuta la consulta
        $data = $manager->executeQuery("$databaseName.$collectionName", $query);

    