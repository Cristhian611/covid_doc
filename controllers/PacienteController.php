<?php

namespace Controllers;

use Models\Paciente;

/**
 * Paciente Controller
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */

class PacienteController
{

    /**
     * Crea un paciente
     * 
     * @return void
     */
    public static function crear()
    {
        if (isset($_POST)) {
            try {
                $codigo = $_POST['codigo'];
                $nombre = $_POST['nombre'];
                $edad = $_POST['edad'];

                $paciente = new Paciente($codigo, $nombre, $edad);
                $paciente->crear();
                echo "<br/>
                    <center>
                        <mark>Paciente creado correctamente</mark>
                     </center>";
            } catch (\Exception $e) {
                echo "<br/>
                    <center>
                        <mark>No se pudo registrar al paciente!</mark>
                     </center>";
            }
        }
        self::vista();
    }

    /**
     * modifica un paciente
     * 
     * @return void
     */
    public static function modificar()
    {
        if (isset($_POST['modificar'])) {
            $codigo = $_GET['codigo'];
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            Paciente::modificar($codigo, $nombre, $edad);
        }
        self::vista();
    }

    /**
     * Elimina un paciente
     * 
     * @return void
     */
    public static function eliminar()
    {
        $codigo = $_GET['codigo'];

        try {
            Paciente::eliminar($codigo);
        } catch (\Exception $e) {
            echo "<br/>
                    <center>
                        <mark>No se pudo Eliminar!</mark>
                     </center>";
        }
        self::vista();
    }


    /**
     * Mustra la pagina principal los pacientes
     * 
     * @return void
     */
    public static function vista()
    {
        $modificar = false;
        if (isset($_GET['accion']) && $_GET['accion'] == "modificar" && isset($_GET['codigo'])) {
            $codigo = $_GET['codigo'];
            $paciente_a_modificar = Paciente::mostrar_por_codigo($codigo);
            $modificar = true;
        }

        $pacientes = Paciente::mostrar();
        require_once 'views/paciente.view.php';
    }
}