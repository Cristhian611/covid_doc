<?php
function Autoload($clase)
{
    // echo "clase $clase<br>";
    // $url = str_replace("\\", "/", $clase . ".php");
    require_once($clase . ".php");
}
spl_autoload_register('Autoload');
