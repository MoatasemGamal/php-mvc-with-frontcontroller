<?php

namespace MVC\LIB;

class FrontController
{
    const NOT_FOUND_ACTION = "notFoundAction";
    const NOT_FOUND_CONTROLLER = "MVC\\Controllers\\NotFoundController";
    private $_controller = 'index';
    private $_action = 'default';
    private $_params = [];

    public function __construct()
    {
        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = explode('/', trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/'), 3);
        if (isset($url[0]) && !empty($url[0]))
            $this->_controller = $url[0];
        if (isset($url[1]) && !empty($url[1]))
            $this->_action = $url[1];
        if (isset($url[2]) && !empty($url[2]))
            $this->_params = explode('/', $url[2]);
        return $this;
    }

    /**
     * @var \MVC\Controllers\AbstractController $controller
     */
    public function dispatch()
    {
        $controllerClass = "MVC\\Controllers\\" . ucfirst($this->_controller) . "Controller";
        $actionName = $this->_action . 'Action';
        if (!class_exists($controllerClass))
            $controllerClass = self::NOT_FOUND_CONTROLLER;
        if (!method_exists($controllerClass, $actionName))
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        $controller = new $controllerClass();
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->$actionName();
    }
}