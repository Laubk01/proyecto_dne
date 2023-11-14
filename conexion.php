<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/sistema_dne/vendor/autoload.php";
    class Conexion {
        public function conectar(){
            try {
                $BD ="proyecto";

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