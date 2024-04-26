<?php
// require_once 'controllers/MenuController.php';
require_once 'Autoload.php';

use controllers\{MenuController};


$obj_menu = new MenuController();
$opcion = $obj_menu->capturar_opcion();
$accion = $obj_menu->capturar_accion();

switch ($opcion) {
    case 'home':
        MenuController::home();
        break;
    case 'login':
        MenuController::login($accion);
        break;
    case 'registro':
        MenuController::registro();
        break;
    case 'contacto':
        MenuController::contacto();
        break;
    case 'paciente':
        MenuController::paciente($accion);
        break;
    case 'virus':
        MenuController::virus($accion);
        break;
    case 'contagio':
        MenuController::contagio($accion);
        break;
    default:
        MenuController::home();
        break;
}