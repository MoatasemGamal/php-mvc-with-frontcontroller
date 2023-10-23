<?php
use MVC\LIB\FrontController;


require_once(dirname(__DIR__) . "/app/config.php");
require_once(APP_PATH . "lib/helpers.php");
require_once(APP_PATH . "lib/autoload.php");


$frontController = new FrontController();
$frontController->dispatch();