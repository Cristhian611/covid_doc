<?php

namespace Models;


/**
 * Conexion
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */

class Conexion
{
    public $con;

    /**
     * constructor
     */

    public function __construct()
    {

        $this->con = new \mysqli('localhost', 'root', '', 'covid');
    }
}