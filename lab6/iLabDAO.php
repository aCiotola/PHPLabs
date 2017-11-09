<?php
interface iLabDAO
{
	public function addEmployee($e); //e’s id will be changed to reflect the id in the database
	public function  updateEmployee($e); //true if successful (i.e., existing Employee)
	public function  getEmployee($id);
	public function getEmployees($p); //concrete class give default value of null: if null, an array with all employees is returned
	public function  countEmployees($p); //concrete class give default value of null: if null, all employees are returned
	public function addPayroll($p); //p’s id will be changed to reflect the id in the database
	public function getPayroll($id);
	public function getPayrolls(); 
}
?>