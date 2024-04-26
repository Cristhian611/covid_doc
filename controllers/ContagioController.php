<?php

namespace Controllers;


use Models\Contagio;
use Models\Paciente;
use Models\Virus;


/**
 * Contagio Controller
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */

class contagioController
{

    /**
     * Crea un contagio
     * 
     * @return void
     */
    public static function crear()
    {
        if (isset($_POST)) {
            try {
                $codigo = $_POST['codigo'];
                $codigo_paciente = $_POST['paciente_seleccionado'];
                $id_virus = $_POST['virus_seleccionado'];
                $fecha_inicio = $_POST['fecha_inicio'];
                $fecha_fin = $_POST['fecha_fin'] == "" ? NULL : $_POST['fecha_fin'];
                $contagio = new Contagio($codigo, $fecha_inicio, $fecha_fin, $codigo_paciente, $id_virus);
                $contagio->crear();

                echo "<br/>
                    <center>
                        <mark>contagio creado correctamente</mark>
                     </center>";
            } catch (\Exception $e) {
                echo "<br/>
                    <center>
                        <mark>No se pudo registrar al contagio!</mark>
                     </center>";
            }
        }
        self::vista();
    }


    /**
     * Modifica un contagio
     * 
     * @return void
     */
    public static function modificar()
    {
        if (isset($_POST['modificar'])) {
            $codigo = $_GET['codigo'];
            $codigo_paciente = $_POST['paciente_seleccionado'];
            $id_virus = $_POST['virus_seleccionado'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'] == "" ? NULL : $_POST['fecha_fin'];
            Contagio::modificar($codigo, $fecha_inicio, $fecha_fin, $codigo_paciente, $id_virus);
        }
        self::vista();
    }

    /**
     * Elimina un contagio
     * 
     * @return void
     */

    public static function eliminar()
    {
        $codigo = $_GET['codigo'];
        Contagio::eliminar($codigo);
        self::vista();
    }



    /**
     * Muestra la vista del contagio
     * 
     * @return void
     */
    public static function vista()
    {
        $modificar = false;
        if (isset($_GET['accion']) && $_GET['accion'] == "modificar" && isset($_GET['codigo'])) {
            $codigo = $_GET['codigo'];
            $contagio_a_modificar = Contagio::mostrar_por_codigo($codigo);
            $modificar = true;
        }

        $pacientes = Paciente::mostrar();
        $virus_array = Virus::mostrar();
        $contagios = Contagio::mostrar();
        require_once 'views/contagio.view.php';
    }
}