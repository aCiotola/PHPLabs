<?php
class Employee
{
    private $firstName;
    private $lastName;
    private $email;
    private $payroll;
    private $salary; 
    
    public function __construct($firstName = "", $lastName = "", $email = "", $salary = 0, $payroll = null)
    {
        if($this->validateString($firstName) && $this->validateString($lastName) && $this->validateString($email) && 
           $this->validateFloat($salary)) 
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->payroll = round($payroll, 2, PHP_ROUND_HALF_EVEN);
            $this->salary = $salary;
        }
        else
            throw new InvalidArgumentException("Invalid Argument!");
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function setFirstName($firstName)
    {
        if($this->validateString($firstName))
            $this->firstName = $firstName;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        if($this->validateString($email))
            $this->email = $email;
    }
    
    public function getPayroll()
    {
        return $this->payroll;
    }
    
    public function setPayroll($payroll)
    {
        $this->payroll = $payroll;
    }
    
    public function getSalary()
    {
        return $this->salary;
    }
    
    public function setSalary($salary)
    {
        if($this->validateFloat($salary))
            $this->salary = $salary;
    }
    
    public function __toString()
    {
        return 2;
    }
    
    private function validateString($str)
    {
        if($str === null)
            return false;
        else 
            return true;
    }
    
    private function validateFloat($num)
    {
        if($num === null || $num < 0)
            return false;
        else 
            return true;        
    }
}
?>





















