<?php
require_once "../vendor/autoload.php";
require_once "../bootstrap.php";

use App\Controllers\AuthController;
use App\Controllers\SuscriptorController;
use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\ColaboradorController;
use App\Controllers\AdministradorController;
use App\Models\Suscriptores;

session_start();

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = "invitado";
}

$router = new Router();
$router->add(
    array(
        "name" => "home", // Nombre de la ruta
        "path" => "/^\/$/", // Expresión regular con la que extraemos la ruta de la URL
        "action" => [IndexController::class, "indexAction"], // Clase y metedo que se ejecuta cuando se busque esa ruta
        "auth" => ["invitado", "usuario", "colaborador", "suscriptor", "admin"]
    ) // Perfiles de autenticación que pueden acceder
);
$router->add(array(
    "name" => "verificar",
    "path" => "/^\/verificar$/",
    "action" => [AuthController::class, "verificarAction"],
    "auth" => ["invitado"]
));

$router->add(array(
    "name" => "logout",
    "path" => "/^\/logout$/",
    "action" => [AuthController::class, "logoutAction"],
    "auth" => ["usuario", "colaborador", "suscriptor", "admin"]
));
$router->add(array(
    "name" => "colaborador",
    "path" => "/^\/colaborador$/",
    "action" => [ColaboradorController::class, "colaboradorAction"],
    "auth" => ["colaborador"]
));


$router->add(array(
    "name" => "crearreceta",
    "path" => "/^\/crearreceta$/",
    "action" => [ColaboradorController::class, "crearRecetaAction"],
    "auth" => ["colaborador"]
));

$router->add(array(
    "name" => "administrador",
    "path" => "/^\/administrador$/",
    "action" => [AdministradorController::class, "administradorAction"],
    "auth" => ["admin"]
));
$router->add(array(
    "name" => "valorar",
    "path" => "/^\/valorar$/",
    "action" => [SuscriptorController::class, "valorarAction"],
    "auth" => ["suscriptor"]
));


$request = $_SERVER['REQUEST_URI']; // Recoje URL
$route = $router->match($request); // Busca en todas las rutas hasta encontrar cual coincide con la URL

if ($route) {
    if (in_array($_SESSION['perfil'], $route['auth'])) {
        $className = $route['action'][0];
        $classMethod = $route['action'][1];
        $object = new $className;
        $object->$classMethod($request);
    } else {
        exit(http_response_code(401));
    }
} else {
    exit(http_response_code(404));
}
