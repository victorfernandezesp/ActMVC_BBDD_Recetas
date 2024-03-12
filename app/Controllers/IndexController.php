<?php

namespace App\Controllers;

use App\Models\Administradores;
use App\Models\Recetas;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $recetasModel = Recetas::getInstancia();
        $recetasobtenidas = $recetasModel->obtenerRecetas();


        if ($recetasobtenidas) {

            $data = [
                'recetasobtenidas' => $recetasobtenidas,
                'mensaje' => "",
                "perfil" => $_SESSION['perfil']

            ];
            $this->renderHTML(__DIR__ . "/../../app/Views/index_view.php", $data);
        }
    }

}
