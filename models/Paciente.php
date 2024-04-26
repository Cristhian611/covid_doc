<?php

namespace Models;


/**
 * Paciente Model
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */

class Paciente
{
    /**
     * constructor
     */
    public function __construct(public $codigo, public $nombre, public $edad)
    {
    }

    /**
     * Consulta para crear un paciente en la base de datos
     * 
     * @return void 
     */
    public function crear()
    {
        $obj_con = new Conexion();
        $query = "INSERT INTO pacientes values('$this->codigo','$this->nombre','$this->edad')";
        $obj_con->con->query($query);

        $obj_con->con->close();
    }

    /**
     * Consulta para mostrar los datos un paciente en la base de datos
     * 
     * @return array 
     */
    public static function mostrar()
    {
        $obj_con = new Conexion();
        $result = $obj_con->con->query("SELECT * FROM pacientes");

        if (!$result) {
            $obj_con->con->close();
            return [];
        }

        $obj_con->con->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Consulta para modificar un paciente en la base de datos
     * 
     * @return void
     */
    public static function modificar($codigo, $nombre, $edad)
    {
        $obj_con = new Conexion();
        $obj_con->con->query(
            "UPDATE pacientes 
            set 
                nombre = '$nombre', 
                edad = '$edad' 
            WHERE codigo = $codigo"
        );
    }

    /**
     * Consulta para eliminar un paciente en la base de datos
     * 
     * @return void 
     */
    public static function eliminar($codigo)
    {
        $obj_con = new Conexion();
        $obj_con->con->query("DELETE FROM pacientes WHERE codigo = $codigo");
        $obj_con->con->close();
    }

    /**
     * Consulta para mostrar un paciente por id
     * 
     * @return void 
     */
    public static function mostrar_por_codigo($codigo)
    {
        $obj_con = new Conexion();
        $result = $obj_con->con->query("SELECT * FROM pacientes WHERE codigo = $codigo");

        if (!$result) {
            $obj_con->con->close();
            return [];
        }

        $obj_con->con->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}