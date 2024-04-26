<?php

namespace controllers;

session_start();

/**
 * Menu Controller
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */

class MenuController
{
    /**
     * captura el parametro opcion que se pasa por la url
     */
    public function capturar_opcion()
    {
        return $_GET['opcion'] ?? '';
    }

    /**
     * captura el parametro accion que se pasa por la url
     */
    public function capturar_accion()
    {
        return $_GET['accion'] ?? '';
    }

    /**
     * llama los metodos estaticos de los controladores Menu y Home para visualizarlos
     * @return void
     */
    public static function home()
    {
        MenuController::vistaMenu();
        HomeController::vista();
    }

    /**
     * captura el parametro accion que se pasa por la url y la evalua
     * 
     * @param string $accion
     * @return void
     */
    public static function login($accion = "")
    {

        if ($accion == "salir") {
            unset($_SESSION['usuario']);
        }

        if (isset($_POST['login'])) {
            UsuarioController::login();
            MenuController::vistaMenu();
            HomeController::vista();
        } else {
            UsuarioController::login();
            MenuController::vistaMenu();
            UsuarioController::loginVista();
        }
    }



    /**
     * llama los metodos estaticos de los controladores Menu y Usuario para visualizarlos
     * 
     * @return void
     */

    public static function registro()
    {
        MenuController::vistaMenu();
        UsuarioController::registro();
    }

    /**
     * llama los metodos estaticos de los controladores Vista y Contacto para visualizarlos
     * 
     * @return void
     */

    public static function contacto()
    {
        MenuController::vistaMenu();
        UsuarioController::contacto();
    }



    /**
     * captura el parametro accion que se pasa por la url y la evalua
     * 
     * @param string $accion
     * @return void
     */

    public static function virus($accion = "")
    {
        MenuController::vistaMenu();

        switch ($accion) {
            case 'crear':
                VirusController::crear();
                break;
            case 'modificar':
                VirusController::modificar();
                break;
            case 'eliminar':
                VirusController::eliminar();
                break;
            default:
                VirusController::vista();
                break;
        }
    }

    /**
     * captura el parametro accion que se pasa por la url y la evalua
     * 
     * @param string $accion
     * @return void
     */

    public static function contagio($accion = "")
    {
        MenuController::vistaMenu();

        switch ($accion) {
            case 'crear':
                ContagioController::crear();
                break;
            case 'modificar':
                ContagioController::modificar();
                break;
            case 'eliminar':
                ContagioController::eliminar();
                break;
            default:
                ContagioController::vista();
                break;
        }
    }

    /**
     * Muestra la vista del menu
     *
     * @return void
     */

    public static function vistaMenu()
    {
        $logeado = false;
        $usuario = "Invitado";
        if (isset($_SESSION['usuario'])) {
            $usuario = "🟢" . $_SESSION['usuario'];
            $logeado = true;
        }
        require_once 'views/menu.view.php';
    }
}