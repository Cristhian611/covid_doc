<?php

namespace Controllers;

/**
 * Home Controller
 * 
 * @author cristhian
 * @version 1.0.0
 * @license MIT (See LICENSE)
 */
class HomeController
{
    /**
     * Muestra la vista del home
     * 
     * @return void
     */
    public static function vista()
    {
        require_once 'views/home.view.php';
    }
}