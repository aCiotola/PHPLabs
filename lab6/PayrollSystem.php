<?php
class PayrollSystem
{
    public $lab;
    
    public function __Construct($lab)
    {
        $lab = new LabDAO();
    }
    
    public function size($pId)
    {
        $payroll = $lab->getPayroll($pId);
        $employeeCount = $lab->countEmployees($payroll);
        return $employeeCount;
    }
    
    public function addEmployee($fName, $email, $salary, $pId)
    {
        $employee = new Employee(2, $fName, "", $email, $salary, $pId);
        $lab->addEmployee($employee);    
        return $employee;
    }
    
    public function removeEmployee($e)
    {
        $e->setPayroll(0);
        $isTrue = $lab->updateEmployee($e);
        return $isTrue;
    }
    
    public function addPayroll($name)
    {
        $payroll = new Payroll(2, $name);
        $lab->addPayroll($payroll);
        return $payroll;
    }
    
    public function getEmployees($pId)
    {
        $payroll = $lab->getPayroll($pId);
        $employees = $lab->getEmployees($payroll);
        return $employees;
    } 
}
?>