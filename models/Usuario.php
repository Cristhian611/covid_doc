<?php

namespace Models;

/**
 * Usuario Model
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */

class Usuario
{
    private $usuario;
    private $pass;

    /**
     * constructor
     */

    public function __construct($usuario, $pass)
    {
        $this->usuario = $usuario;
        $this->pass = $pass;
    }


    /**
     * consulta para crear un usuario en la base de datos
     * 
     * @return void
     */

    function registro_bd()
    {
        $obj_con = new Conexion();
        $query = "INSERT INTO usuarios (id, usuario, pass) VALUES (NULL, '$this->usuario','$this->pass')";
        $obj_con->con->query($query);

        $obj_con->con->close();
    }

    /**
     * consulta para buscar un usuario por nombre
     * 
     * @return array
     */

    public static function buscarUsuarioPorNombre($nombre_usuario)
    {
        $obj_con = new Conexion();
        $result = $obj_con->con->query("SELECT * FROM usuarios WHERE usuario = '$nombre_usuario'");

        $usuarios = [];
        if ($result->num_rows > 0) {
            while ($user = $result->fetch_assoc()) {
                $usuarios[] = $user;
            }
        }

        $obj_con->con->close();
        return $usuarios;
    }
}