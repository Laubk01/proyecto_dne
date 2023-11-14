<?php
require_once "conexion.php";
class Crud extends Conexion
{
    public function eliminar($id)
    {
        try {
            $conexion = conexion::conectar();
            $coleccion = $conexion->archivos;
            $respuesta = $coleccion->deleteOne(
                array(
                    "_id" => new MongoDB\BSON\ObjectId($id)
                )
            );
            return $respuesta;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function eliminarRegistro($id)
    {
        try {
            $conexion = conexion::conectar();
            $coleccion = $conexion->reporte;
            $respuesta = $coleccion->deleteOne(
                array(
                    "_id" => new MongoDB\BSON\ObjectId($id)
                )
            );
            return $respuesta;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function actualizar($id, $datos)
    {
        try {
            $conexion = Conexion::conectar();
            $coleccion = $conexion->personas;
            $respuesta = $coleccion->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                [
                    '$set' => $datos
                ]
            );
            return $respuesta;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

}
?>