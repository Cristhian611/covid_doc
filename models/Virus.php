<?php

namespace Models;

/**
 * Virus Model
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */

class Virus
{
    /**
     * constructor
     */
    public function __construct(public $codigo, public $tipo, public $incubacion)
    {
    }

    /**
     * consulta para crear un virus en la base de datos
     * 
     * @return void
     */
    public function crear()
    {
        $obj_con = new Conexion();
        $query = "INSERT INTO virus values('$this->codigo','$this->tipo','$this->incubacion')";
        $obj_con->con->query($query);

        $obj_con->con->close();
    }

    /**
     * consulta para mostrar los datos un usuario en la base de datos
     * 
     * @return array
     */
    public static function mostrar()
    {
        $obj_con = new Conexion();
        $result = $obj_con->con->query("SELECT * FROM virus");

        if (!$result) {
            $obj_con->con->close();
            return [];
        }

        $obj_con->con->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * consulta para actulizar un usuario en la base de datos
     * 
     * @return void
     */
    public static function modificar($codigo, $tipo, $incubacion)
    {
        $obj_con = new Conexion();
        $obj_con->con->query(
            "UPDATE virus 
            set 
                tipo = '$tipo', 
                incubacion = '$incubacion' 
            WHERE id = $codigo"
        );
    }

    /**
     * consulta para eliminar un usuario en la base de datos
     * 
     * @return void
     */
    public static function eliminar($codigo)
    {
        $obj_con = new Conexion();
        $obj_con->con->query("DELETE FROM virus WHERE id = $codigo");
        $obj_con->con->close();
    }

    /**
     * consulta para mostar los datos de un usuario buscado por id
     * 
     * @return array
     */
    public static function mostrar_por_codigo($codigo)
    {
        $obj_con = new Conexion();
        $result = $obj_con->con->query("SELECT * FROM virus WHERE id = $codigo");

        if (!$result) {
            $obj_con->con->close();
            return [];
        }

        $obj_con->con->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}