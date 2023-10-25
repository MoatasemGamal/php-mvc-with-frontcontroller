<?php

namespace MVC\Controllers;

use MVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    public function defaultAction()
    {
        $this->_data["employees"] = EmployeeModel::getAll();
        $this->_view();
    }
}