<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/PROYECTO_DATOS_NO_ESTRUCTURADOS/vendor/autoload.php";
    class Conexion {
        public function conectar(){
            try {
                $BD ="sequia";

            $cadenaconex = "mongodb://localhost:27017/". $BD;
            
            $cliente = new MongoDB\client($cadenaconex); // db name
            return $cliente-> selectDatabase($BD);
            }
            catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }
?>