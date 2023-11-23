<?php
require 'vendor/autoload.php';
include ('simple_html_dom.php');
use Goutte\Client;

// Incluye la clase MongoDBConnection
require_once 'C:\wamp64\www\sistema_dne\basedatos.php';

$client = new Client();

$data = recupera_links($client, "https://listado.mercadolibre.com.mx/libros-medio-ambiente#D[A:libros%20medio%20ambiente]");
foreach ($data as $valor) {
    $imagen_nombre = nombre($valor);
    descargar_imagen($valor, $imagen_nombre);

    // Inserta la URL de la imagen en la colección 'libros' de la base de datos 'proyecto' en MongoDB
    insertar_en_mongodb('proyecto', 'libros', ['url_imagen' => $valor, 'nombre_imagen' => $imagen_nombre]);
}

function nombre($url)
{
    $cortar = explode("https://http2.mlstatic.com/D_NQ_NP_", $url);
    return $cortar[1];
}

function connexion_pagina(Client $client, $url, $op)
{
    $peticion = $client->request("GET", $url);
    if ($op == 1) {
        return $contenido = $peticion->html();
    } else if ($op == 2) {
        $contenido = $peticion->html();
        return $html = str_get_html($contenido);
    }
}

function recupera_links(Client $client, $url)
{
    $content = connexion_pagina($client, $url, 1);
    $images = array();
    $img = "https://http2.mlstatic.com/D_NQ_NP_";
    while (strpos($content, $img)) {
        $possible_url = substr($content, strpos($content, $img));
        $pos_final = strpos($possible_url, '"');
        $pos2_final = strpos($possible_url, "'");
        if ($pos2_final > 0 && $pos2_final < $pos_final) {
            $pos_final = $pos2_final;
        }
        $possible_url = substr($possible_url, 0, $pos_final);

        $content = substr($content, strpos($content, $img) + 1);
        $images[] = $possible_url;
    }
    return $images;
}

function descargar_imagen($url, $nombre)
{
    // Ruta local donde deseas guardar la imagen descargada
    $ruta_local = 'imagenes/' . $nombre;

    // Crear un contexto de flujo (stream context) con verificación de SSL deshabilitada
    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

    // Descargar la imagen desde la URL con verificación de SSL deshabilitada
    $contenido_imagen = file_get_contents($url, false, $context);

    if ($contenido_imagen !== false) {
        // Guardar el contenido de la imagen en un archivo local
        if (file_put_contents($ruta_local, $contenido_imagen) !== false) {
            echo 'La imagen se ha descargado correctamente.';
        } else {
            echo 'No se pudo guardar la imagen en el archivo local.';
        }
    } else {
        echo 'No se pudo obtener el contenido de la imagen desde la URL.';
    }
}

function insertar_en_mongodb($nombreBD, $nombreColeccion, $datos)
{
    try {
    /*    // Crea una instancia de MongoDBConnection
        $mongoConnection = new MongoDBConnection('localhost', 27017, $nombreBD);
        $client = $mongoConnection->connect();

       // Crea una instancia de MongoDBConnection
//$mongoConnection = new MongoDBConnection('localhost', 27017);

// Selecciona la base de datos 'proyecto'
$db = $mongoConnection->selectDatabase('proyecto');
*/
$host = 'localhost';
$port = 27017;
$database = 'proyecto';
$collection = 'usuarios';

$connection = new MongoDBConnection($host, $port, $database);
$client = $connection->connect();


        // Verifica si la colección existe
        $colecciones = $database->listCollections(['filter' => ['name' => $nombreColeccion]]);
        $existeColeccion = count(iterator_to_array($colecciones)) > 0;

        if (!$existeColeccion) {
            // Si la colección no existe, créala
            $database->createCollection($nombreColeccion);
            echo 'La colección ' . $nombreColeccion . ' ha sido creada en la base de datos ' . $nombreBD . PHP_EOL;
        }

        // Inserta los datos en la colección
        $coleccion = $database->$nombreColeccion;
        $result = $coleccion->insertOne($datos);

        if ($result->getInsertedCount() > 0) {
            echo 'La imagen se ha insertado correctamente en MongoDB.' . PHP_EOL;
        } else {
            echo 'No se pudo insertar la imagen en MongoDB.' . PHP_EOL;
        }
    } catch (MongoConnectionException $e) {
        echo 'Error de conexión a MongoDB: ' . $e->getMessage();
    } catch (MongoException $e) {
        echo 'Error al insertar en MongoDB: ' . $e->getMessage();
    }
}

?>
