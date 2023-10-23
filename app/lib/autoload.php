<?php

namespace MVC\LIB;

class Autoload
{
    public static function autoload($className)
    {
        $className = str_replace("MVC\\", "", $className);
        $className = str_replace("\\", DS, $className);
        $className = APP_PATH . strtolower($className) . ".php";
        pre($className);
        require($className);
    }
}
spl_autoload_register("\\" . __NAMESPACE__ . "\\Autoload::autoload");