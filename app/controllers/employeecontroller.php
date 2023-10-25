<?php

namespace MVC\Controllers;

use MVC\LIB\InputFilter;
use MVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    use InputFilter;
    public function defaultAction()
    {
        $this->_data["employees"] = EmployeeModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            pre($_POST);
            $name = $this->filterString($_POST["name"]);
            $age = $this->filterInt($_POST["age"]);
            $tax = $this->filterFloat($_POST["tax"]);
            $salary = $this->filterInt($_POST["salary"]);
            $address = $this->filterString($_POST["address"]);
            $emp = new EmployeeModel(
                $name,
                $age,
                $address,
                $tax,
                $salary
            );
            pre($emp->save());
            $this->filterInt($_POST['age'] ?? "");
        }
        $this->_view();
    }
    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        /** @var EmployeeModel */
        $employee = EmployeeModel::getByPk($id);
        $this->_data["employee"] = $employee;
        if ($employee) {
            $this->_view();

        } else
            $this->notFoundAction();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $this->filterString($_POST["name"]);
            $age = $this->filterInt($_POST["age"]);
            $tax = $this->filterFloat($_POST["tax"]);
            $salary = $this->filterInt($_POST["salary"]);
            $address = $this->filterString($_POST["address"]);
            $employee->name = $name;
            $employee->age = $age;
            $employee->address = $address;
            $employee->tax = $tax;
            $employee->salary = $salary;
            $employee->save();
            redirect("/employee");
        }
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $employee = EmployeeModel::getByPk($id);
        if ($employee instanceof EmployeeModel)
            $employee->delete();

        redirect("/employee");
    }
}