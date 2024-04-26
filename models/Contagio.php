<?php

namespace Models;

/**
 * Contagio Model
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */


class Contagio
{
    public function __construct(public $codigo, public $fecha_inicio, public $fecha_fin, public $paciente, public $virus)
    {
    }

    /**
     * Consulta para crear un contagio en la base de datos
     * 
     * @return void 
     */

    public function crear()
    {
        $obj_con = new Conexion();
        if ($this->fecha_fin === NULL) {
            $query = "INSERT INTO contagio values('$this->codigo','$this->fecha_inicio',NULL,'$this->paciente','$this->virus')";
        } else {
            $query = "INSERT INTO contagio values('$this->codigo','$this->fecha_inicio','$this->fecha_fin','$this->paciente','$this->virus')";
        }
        $obj_con->con->query($query);

        $obj_con->con->close();
    }

    /**
     * Consulta para leer los datos de un contagio en la base de datos
     * 
     * @return array
     */
    public static function mostrar()
    {
        $obj_con = new Conexion();
        $result = $obj_con->con->query(
            "SELECT p.*, c.*, v.*,c.id as contagio_id
            FROM pacientes p
            INNER JOIN contagio c ON p.codigo = c.codigo_paciente 
            INNER JOIN virus v ON c.id_virus = v.id;"
        );

        if (!$result) {
            $obj_con->con->close();
            return [];
        }

        $obj_con->con->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Consulta para actulizar un contagio en la base de datos
     * 
     * @return void 
     */
    public static function modificar($codigo, $fecha_inicio, $fecha_fin, $paciente, $virus)
    {
        $obj_con = new Conexion();
        if ($fecha_fin === NULL) {
            $obj_con->con->query(
                "UPDATE contagio 
                set 
                    fecha_inicio = '$fecha_inicio', 
                    fecha_fin = NULL,
                    codigo_paciente = '$paciente', 
                    id_virus = '$virus'
                WHERE id = $codigo"
            );
        } else {
            $obj_con->con->query(
                "UPDATE contagio 
                set 
                    fecha_inicio = '$fecha_inicio', 
                    fecha_fin = '$fecha_fin',
                    codigo_paciente = '$paciente', 
                    id_virus = '$virus'
                WHERE id = $codigo"
            );
        }
    }

    /**
     * Consulta para eliminar un contagio en la base de datos
     * 
     * @return void 
     */
    public static function eliminar($codigo)
    {
        $obj_con = new Conexion();
        $obj_con->con->query("DELETE FROM contagio WHERE id = $codigo");
        $obj_con->con->close();
    }

    /**
     * Consulta para mostrar un contagio por id
     * 
     * @return array
     */
    public static function mostrar_por_codigo($codigo)
    {
        $obj_con = new Conexion();
        $result = $obj_con->con->query("SELECT * FROM contagio WHERE id = $codigo");

        if (!$result) {
            $obj_con->con->close();
            return [];
        }

        $obj_con->con->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}