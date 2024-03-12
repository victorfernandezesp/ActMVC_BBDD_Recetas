<?php

namespace App\Controllers;

use App\Models\Recetas;
use App\Models\Administradores;
use App\Models\Colaboradores;
use App\Models\Suscriptores;
class AuthController extends BaseController
{
    public function verificarAction()
    {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $perfil = $_POST['perfil'];
        $captcha = $_POST['captcha'];

        // si el captcha no es correcto redirigimos a la pagina principal
        if ($captcha != 2) {
            header("Location: /");
            exit;
        }

        // switch case con perfil
        switch ($perfil) {
            case 'colaborador':
                // comprobamos si el usuario y contraseña son correctos de la clase colaboradores
                $colaboradoresModel = Colaboradores::getInstancia();
                $user = $colaboradoresModel->obtenerColaborador($usuario, $contrasena);
                
                if (!$user) {
                    $data = [
                        'mensaje' => "Datos incorrectos"
                        
                    ];
                    $this->renderHTML("/../../app/Views/index_view.php", $data);
                }
                else {
                    $_SESSION['perfil'] = "colaborador";
                    $_SESSION['user'] = $user;
                    
                    header("Location: /");
                    exit();
                }

            case 'admin':
                $adminsModel = Administradores::getInstancia();
                $user = $adminsModel->obtenerAdministrador($usuario, $contrasena);
                
                if (!$user) {
                    $data = [
                        'mensaje' => "Datos incorrectos"
                        
                    ];
                    $this->renderHTML("/../../app/Views/index_view.php", $data);
                }
                else {
                    $_SESSION['perfil'] = "admin";
                    $_SESSION['user'] = $user;
                    
                    header("Location: /");
                    exit();
                }
            case 'suscriptor':
                $suscriptorModel = Suscriptores::getInstancia();
                $user = $suscriptorModel->obtenerSuscriptor($usuario, $contrasena);
                
                if (!$user) {
                    $data = [
                        'mensaje' => "Datos incorrectos"
                        
                    ];
                    $this->renderHTML("/../../app/Views/index_view.php", $data);
                }
                else {
                    $_SESSION['perfil'] = "suscriptor";
                    $_SESSION['user'] = $user;
                    
                    header("Location: /");
                    exit();
                }
        }
    }
    public function logoutAction()
    {
        session_destroy();
        header("Location: /");
    }

}
