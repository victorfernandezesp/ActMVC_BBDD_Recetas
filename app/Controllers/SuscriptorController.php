<?php

namespace App\Controllers;

use App\Models\Administradores;
use App\Models\Recetas;
use App\Models\Colaboradores;
use App\Models\Suscriptores;
use App\Models\Config;

class SuscriptorController extends BaseController
{
    public function valorarAction()
    {
        $id_receta = $_POST['id_receta'];
        $idColaborador = $_POST['idColaborador'];
        $valoracion = $_POST['valoracion'];

        $recetasModel = Recetas::getInstancia();
        $valoracionMedia = $recetasModel->obtenerValoracionMedia($id_receta);
        // Esto esta mal, no se puede hacer una media sin conocer el numero total de valoraciones, esto se deberia de hacer en la tabla
        // de la base de datos, tener un campo que sea numero de valoraciones y que se vaya sumando 1 por cada valoracion que se haga
        // porque la media no se hace sobre 2, se hace sobre el numero total de valoraciones.
        // Yo voy a hacer esto así porque no quiero tocar la base de datos, pero deberia de hacerse como he dicho arriba.
        $calculaNuevaValoracion = ($valoracionMedia + $valoracion) / 2;
        $recetasModel->edit($id_receta, $calculaNuevaValoracion);

        $colaboradorModel = Colaboradores::getInstancia();
        $colaboradorModel->actualizarSaldoColaborador($idColaborador, $valoracion);


        header("Location: /");
    }
}
