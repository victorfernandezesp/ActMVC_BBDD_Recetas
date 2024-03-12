<?php
namespace App\Models;

class Config extends DBAbstractModel
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
        $this->query = "SELECT * FROM config";
        $this->get_results_from_query();

        return $this->rows[0];
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

    

    
}