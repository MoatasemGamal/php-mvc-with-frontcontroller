<?php

namespace MVC\Controllers;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
        //echo "Index Controller => default Action";
        $this->_view();
    }
}