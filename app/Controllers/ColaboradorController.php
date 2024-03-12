<?php

namespace App\Controllers;

use App\Models\Administradores;
use App\Models\Recetas;
use App\Models\Colaboradores;

class ColaboradorController extends BaseController
{
    public function colaboradorAction()
    {
        $recetasModel = Recetas::getInstancia();
        $recetasobtenidasColaborador = $recetasModel->obtenerRecetasColaborador();


        if ($recetasobtenidasColaborador) {

            $data = [
                'recetasobtenidas' => $recetasobtenidasColaborador,
                // "perfil" => $_SESSION['perfil']

            ];

            $this->renderHTML("../app/Views/colaborador_view.php", $data);
        }
        
    }

    public function crearRecetaAction()
    {
        if (!isset($_POST) || empty($_POST)){
            $this->renderHTML("../app/Views/formularioreceta_view.php");
        }
        else {
            $recetasModel = Recetas::getInstancia();
            $datos = [
                "idColaborador" => $_SESSION['user']['id'],
                "titulo" => $_POST['titulo'],
                "ingredientes" => $_POST['ingredientes'],
                "elaboracion" => $_POST['elaboracion'],
                "etiquetas" => $_POST['etiquetas'],
            ];
            $recetasModel->set($datos);

            $colaboradorModel = Colaboradores::getInstancia();
            $colaboradorModel->edit();
            header("Location: /colaborador");
        }
    }
}