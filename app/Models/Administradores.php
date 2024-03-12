<?php

namespace App\Models;

class Administradores extends DBAbstractModel
{
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = self::class;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function get()
    {
    }
    public function set()
    {
    }

    public function edit()
    {
    }
    public function delete()
    {
    }

    public function obtenerAdministradores()
    {
        $this->query = "SELECT * FROM administradores";
        $this->get_results_from_query();
    
    
        if (empty($this->rows)) {
            echo "No se encontraron colaboradores.";
        }
    
        return $this->rows;
    }
    public function obtenerAdministrador($usuario, $contrasena){
        $this->query = "SELECT * FROM administradores WHERE usuario = '$usuario' AND password = '$contrasena'";
        $this->get_results_from_query();
        return $this->rows[0];

    }
}
