<?php

namespace App\Controllers;

use App\Models\Administradores;
use App\Models\Recetas;
use App\Models\Colaboradores;
use App\Models\Config;

class AdministradorController extends BaseController
{
    public function administradorAction()
    {
        $data = [
            "colaboradores" => Colaboradores::getInstancia()->obtenerColaboradores(),
            "perfil" => $_SESSION['perfil'],
            "beneficios" => (Config::getInstancia()->get())['beneficios']
        ];
        $this->renderHTML("../app/Views/admin_view.php", $data);
    }
}