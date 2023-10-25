<?php

namespace MVC\Controllers;

use MVC\LIB\FrontController;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;
    protected array $_data = [];
    public function notFoundAction()
    {
        $this->_action = FrontController::NOT_FOUND_ACTION;
        echo "Sorry this page not found";
        $this->_view();
    }

    public function setController($controllerName)
    {
        $this->_controller = $controllerName;
    }
    public function setAction($actionName)
    {
        $this->_action = $actionName;
    }
    public function setParams($params)
    {
        $this->_params = $params;
    }

    public function _view()
    {
        extract($this->_data);
        $view = VIEWS_PATH . $this->_controller . DS . $this->_action . ".view.php";
        if ($this->_action == FrontController::NOT_FOUND_ACTION)
            include VIEWS_PATH . "notfound/notfound.view.php";
        elseif (file_exists($view))
            include $view;
        else
            include VIEWS_PATH . "notfound/noview.view.php";

    }
}