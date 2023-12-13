<?php
include("header.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/acerca.css">
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:ital@1&display=swap" rel="stylesheet">
    <title>Eco climate</title>
  </head>
  <body>
   <header class="header">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 h-50" src="imagenes/img1.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
              <h5>ECO CLIMATE</h5>
              <p>Mantente al día con el cambio climático y sus consecuencias.</p>
            </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 h-50" src="imagenes/img2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 h-50" src="imagenes/img3.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a> 
    </div>
   </header>
<!--PRIMER PARRAFOO-->
<div class="texto1"><p class="p1"><strong> México, un país de diversidad geográfica y climática,
   se enfrenta a desafíos significativos asociados con el cambio climático. A lo largo de las últimas décadas, se ha observado
    un aumento en las temperaturas promedio, eventos climáticos extremos y alteraciones en los patrones de precipitación. Estos cambios impactan
     no solo el entorno natural, sino también la vida cotidiana de millones de mexicanos.</strong></p></div>



   <div class="row">
    <div class="leftcolumn">
      <div class="card">
        <h2>AGUA</h2>
        <h5>Áreas más afectadas.</h5>
        <p>Una de las áreas más afectadas es la disponibilidad de agua. México experimenta variaciones en la distribución de las lluvias,
          lo que afecta la cantidad de agua disponible para consumo humano, agricultura e industria. Las sequías prolongadas han llevado a crisis hídricas en
           diversas regiones, afectando la seguridad alimentaria 
          y generando tensiones en comunidades que dependen de la agricultura.</p>
        <div class="imagen1"><img class="img1" src="imagenes/text1.jpg" alt="EEUU"></div>
        <p>Agua en México.</p>
      </div>
      <div class="card">
        <h2>SECTOR AGRÍCOLA</h2>
        <h5>Cambios en los patrones de lluvia y temperaturas extremas pueden resultar en pérdidas de cosechas, afectando la seguridad alimentaria y generando
           preocupaciones económicas para los agricultores. La necesidad de prácticas agrícolas sostenibles y resilientes se vuelve cada vez más apremiante.</h5>
        <div class="imagen1"><img class="img1" src="imagenes/text2.jpg" alt="EUROPA"></div>
        <p>Agricultura en México </p>
      </div>
    </div>
    <div class="rightcolumn">
      <div class="card">
        <h2>FENÓMENOS</h2>
        <div class="imagen2"><img class="img2" src="imagenes/text3.jpg" alt="CARRETERA"></div>
      
      </div>
      <div class="card">
        <h2>PÉRDIDAS</h2>
        <div class="imagen2"><img class="img2" src="imagenes/text4.jpg" alt="CARRETERA"></div>
        <p><br> <br>
Además, el aumento en la frecuencia e intensidad de fenómenos meteorológicos extremos, como huracanes e inundaciones,
 ha generado impactos devastadores en zonas costeras y comunidades vulnerables. La pérdida de hogares, la degradación de la infraestructura y la amenaza a ecosistemas frágiles son desafíos que requieren respuestas efectivas para la adaptación y mitigación </p>
    </div>
    
  </div>
  <div class="texto1"><p class="p1"><strong> ¡Bienvenido a nuestra sección de recomendaciones de lectura dedicada al cuidado del medio ambiente!
     En un mundo donde la conciencia ambiental es más crucial que nunca, explorar libros que aborden temas relacionados con la sostenibilidad,
      la conservación y la conexión con nuestro entorno se convierte en una poderosa herramienta para inspirar cambios.</strong></p></div>


  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<?php
require 'vendor/autoload.php';
require_once 'basedatos.php';  // Asegúrate de ajustar la ruta según tu estructura de archivos

// Establecer conexión con MongoDB
$mongoDBConnection = new MongoDBConnection('localhost', 27017, 'proyecto');
$manager = $mongoDBConnection->connect();
$databaseName = $mongoDBConnection->selectDatabase();
$collectionName = 'libros';

// Obtener documentos de MongoDB
$documents = obtener_documentos($manager, $databaseName, $collectionName);

// Mostrar la tabla HTML con las imágenes
mostrar_tabla($documents);

function obtener_documentos($manager, $databaseName, $collectionName)
{
    $query = new MongoDB\Driver\Query([], ['sort' => ['fecha_descarga' => -1]]);
    $cursor = $manager->executeQuery("$databaseName.$collectionName", $query);

    return $cursor->toArray();
}

function mostrar_tabla($documents)
{
    echo '<html>';
    echo '<head>';
    echo '<link rel="stylesheet" type="text/css" href="css/acerca.css">';
    echo '</head>';
    echo '<body>';
    echo '<div id="acerca-de-nosotros">';
    echo '<div class="table-imagenes">';
    echo '<table>';
    echo '<tr>';

    foreach ($documents as $document) {
        $nombreImagen = $document->nombre;
        $urlImagen = 'imagenes/' . $nombreImagen;
        echo '<td>';
        echo '<img src="' . $urlImagen . '" alt="Imagen" style="width:150px;height:100px;">';
        echo '</td>';
    }

    echo '</tr>';
    echo '</table>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}
?>


