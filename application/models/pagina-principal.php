<?php namespace App\Models;

use App\Model;

class DatosModel extends Model
{
    protected $table = 'mi_tabla';  // tabla que usas en base de datos

    public function obtenerDatos()
    {
        return $this->findAll(); // ejemplo para obtener todos los registros
    }
}
