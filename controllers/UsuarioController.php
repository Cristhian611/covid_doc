<?php

namespace Controllers;

use Models\Usuario;

if (!session_id()) {
    session_start();
}

/**
 * Usuario Controller
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */

class UsuarioController
{

    /**
     * valida y hace el login de un usuario en la pagina
     * 
     * @return void
     */
    public static function login()
    {
        if (isset($_POST['login'])) {
            $usuario_formulario = $_POST['usuario'];
            $pass_formulario = $_POST['pass'];

            $usuarios = Usuario::buscarUsuarioPorNombre($usuario_formulario);

            foreach ($usuarios as $usuario) {
                if ($usuario['usuario'] == $usuario_formulario && $usuario['pass'] == $pass_formulario) {
                    $_SESSION['usuario'] = $usuario['usuario'];
                }
            }
        }
    }

    /**
     * registra un usuario en la pagina
     * 
     * @return void
     */

    public static function registro()
    {
        if (isset($_POST['registro'])) {
            try {
                $usuario = $_POST['usuario'];
                $pass = $_POST['pass'];

                $nuevo_usuario = new Usuario($usuario, $pass);
                $nuevo_usuario->registro_bd();
                echo "<br/><center>
                        <mark>Usuario creado correctamente</mark>
                    </center>";
            } catch (\Exception $e) {
                echo "<br/><center>
                        <mark>No se pudo crear usuario!</mark>
                    </center>";
            }
        }
        require_once 'views/registro.view.php';
    }

    /**
     * muestra la pagina de vista general de contacto
     * 
     * @return void
     */

    public static function contacto()
    {
        require_once 'views/contacto.view.php';
    }

    /**
     * muestra la pagina la vista de la pagina de login
     * 
     * @return void
     */

    public static function loginVista()
    {
        require_once 'views/login.view.php';
    }
}