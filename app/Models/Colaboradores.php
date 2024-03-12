<?php
namespace App\Models;

class Colaboradores extends DBAbstractModel
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
        $this->query = "UPDATE colaboradores SET saldo = saldo + 10 WHERE id = :id";
        $this->params = [
            'id' => $_SESSION['user']['id']
        ];
        $this->get_results_from_query();
    }
    public function delete()
    {
    }

    public function actualizarSaldoColaborador($idColaborador, $valoracion)
    {
        $this->query = "UPDATE colaboradores SET saldo = saldo + (:valoracion * 10) WHERE id = :idColaborador";
        $this->params = [
            'idColaborador' => $idColaborador,
            'valoracion' => $valoracion
        ];
        $this->get_results_from_query();

    }

    // obtenemos los colaboradores
    public function obtenerColaboradores()
    {
        $this->query = "SELECT * FROM colaboradores";
        $this->get_results_from_query();
    
    
        if (empty($this->rows)) {
            echo "No se encontraron colaboradores.";
        }
    
        return $this->rows;
    }
    public function obtenerColaborador($usuario, $contrasena){
        $this->query = "SELECT * FROM colaboradores WHERE usuario = '$usuario' AND password = '$contrasena'";
        $this->get_results_from_query();
        return $this->rows[0];

    }
    

    
}