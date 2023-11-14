<?php
require_once "../php/basedatos.php";


        $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $databaseName = "sequia";
        $collectionName = "archivos";

        // Construye la consulta para obtener todos los documentos de la colección
        $query = new MongoDB\Driver\Query([]);

        // Ejecuta la consulta
        $data = $manager->executeQuery("$databaseName.$collectionName", $query);

        // Recorre los documentos y muestra los datos
        include_once "../views/sequia/archivos.php";
        ?>

        <?php
        /*

                $host = 'localhost';
                $port = 27017;
                $database = 'sequia';
                $collection = 'archivos';
                $db = (new MongoDB\Client)->$database;
                $connection = new MongoDBConnection($host, $port, $database);
                $client = $connection->connect();
                $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
                $database = $connection->selectDatabase()->sequia;
                $collection = $database->archivos;

                // Consulta todos los documentos de la colección
                $data = $collection->find();
                var_dump($data);
                die();
                return $data;
            }
        }
        $archivos = new Archivos;
        */

?>