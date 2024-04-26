<?php

namespace Controllers;


use Models\Virus;


/**
 * Virus Controller
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */


class virusController
{

    /**
     * Crea un virus y muestra un mensaje fue exitoso o no.
     * 
     * @return void
     */
    public static function crear()
    {
        if (isset($_POST)) {
            try {
                $codigo = $_POST['codigo'];
                $tipo = $_POST['tipo'];
                $incubacion = $_POST['incubacion'];

                $virus = new virus($codigo, $tipo, $incubacion);
                $virus->crear();
                echo "<br/>
                    <center>
                        <mark>virus creado correctamente</mark>
                     </center>";
            } catch (\Exception $e) {
                echo "<br/>
                    <center>
                        <mark>No se pudo registrar al virus!</mark>
                     </center>";
            }
        }
        self::vista();
    }

    /**
     * modifica un virus.
     * 
     * @return void
     */
    public static function modificar()
    {
        if (isset($_POST['modificar'])) {
            $codigo = $_GET['codigo'];
            $tipo = $_POST['tipo'];
            $incubacion = $_POST['incubacion'];
            virus::modificar($codigo, $tipo, $incubacion);
        }
        self::vista();
    }

    /**
     * elimina un virus.
     * 
     * @return void
     */

    public static function eliminar()
    {
        $codigo = $_GET['codigo'];
        try {
            virus::eliminar($codigo);
        } catch (\Exception $e) {
            echo "<br/>
                    <center>
                        <mark>No se pudo Eliminar!</mark>
                     </center>";
        }
        self::vista();
    }



    /**
     * muestra la vista general de la pagina virus.
     * 
     * @return void
     */
    public static function vista()
    {
        $modificar = false;
        if (isset($_GET['accion']) && $_GET['accion'] == "modificar" && isset($_GET['codigo'])) {
            $codigo = $_GET['codigo'];
            $virus_a_modificar = virus::mostrar_por_codigo($codigo);
            $modificar = true;
        }

        $virus_array = virus::mostrar();

        if (isset($_SESSION['usuario'])) {
            require_once 'views/virus.view.php';
        } else {
            require_once 'views/virus_no_login.view.php';
        }
    }
}