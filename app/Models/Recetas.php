<?php
namespace App\Models;

class Recetas extends DBAbstractModel
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
    public function set($datos)
    {
        $this->query = "INSERT INTO recetas (titulo, ingredientes, elaboracion, etiquetas, valoracion_media, idColaborador) VALUES (:titulo, :ingredientes, :elaboracion, :etiquetas, 0, :idColaborador)";
        $this->params = [
            'idColaborador' => $datos['idColaborador'],
            'titulo' => $datos['titulo'],
            'ingredientes' => $datos['ingredientes'],
            'elaboracion' => $datos['elaboracion'],
            'etiquetas' => $datos['etiquetas']
        ];
        $this->get_results_from_query();
    }

    public function edit($id, $valoracion)
    {
        $this -> query = "UPDATE recetas SET valoracion_media = :valoracion WHERE id = :id";
        $this -> params = [
            'id' => $id,
            'valoracion' => $valoracion
        ];
        $this -> get_results_from_query();

    }
    public function delete()
    {
    }

    public function obtenerRecetas()
    {
        // Ordenadas por valoracion media
        $this->query = "SELECT * FROM recetas ORDER BY valoracion_media DESC";
        $this->get_results_from_query();
    
        if (empty($this->rows)) {
            echo "No se encontraron recetas.";
        }
    
        return $this->rows;
    }
    public function obtenerValoracionMedia($id){
        $this->query = "SELECT valoracion_media FROM recetas WHERE id = :id";
        $this->params['id'] = $id;
        $this->get_results_from_query();
        return $this->rows[0]['valoracion_media'];
    }
    public function obtenerRecetasColaborador(){
        $this->query = "SELECT * FROM recetas WHERE idColaborador = :idColaborador";
        $this->params['idColaborador'] = $_SESSION['user']['id'];
        $this->get_results_from_query();
        return $this->rows;
    }
    

}