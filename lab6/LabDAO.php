<?php
 require("ConnectDB.php");
class LabDAO
{
       
    public function addEmployee($e)
    {
         try
            {
             $server = 'localhost';
    $user = 'homestead';
    $pwd = 'secret';
    $dbname = 'homestead';
    $dsn = "pgsql:dbname = $dbname; host = $server";
    $pdo = new PDO($dsn, $user, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             
                $query = "INSERT INTO EMPLOYEE(ID, FIRSTNAME, LASTNAME, EMAIL, SALARY, PAYROLLID)
                    VALUES(?, ?, ?, ?, ?, ?);";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, 7);
                $stmt->bindValue(2, $e->getFirstName());
                $stmt->bindValue(3, "");
                $stmt->bindValue(4, $e->getEmail());
                $stmt->bindValue(5, $e->getSalary());
                $stmt->bindValue(6, 1);
                $stmt->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                unset($pdo);
            }
    }

	public function updateEmployee($e)
    {
        try
        {
        $query = "UPDATE EMPLOYEE SET FIRSTNAME = ?, LASTNAME = ?, EMAIL = ?, SALARY = ? WHERE ID = ?;";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, $e->getFirstName());
                $stmt->bindValue(2, $e->getLastName());
                $stmt->bindValue(3, $e->getEmail());
                $stmt->bindValue(4, $e->getSalary);
                $stmt->bindValue(5, 1);
                if($stmt->execute())
                {
                    return true;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
                return false;
            }
            finally
            {
                unset($pdo);
            }    
    }
    
	public function getEmployee($id)
    {
         try
        {
         $query = "SELECT * FROM EMPLOYEE WHERE ID = ?;";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, $id);
                if($stmt->execute())
                {
                    $results = $stmt->fetchAll();
                     foreach($results as $row)
                     {  
                         $employee = new Employee($id, $row[0], $row[1], $row[2], $row[3], $row[4]);
                     }
                    
                    return $employee;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                unset($pdo);
            }
    }
    
	public function getEmployees($p)
    {
         try
        {
        $query = "SELECT * FROM EMPLOYEE WHERE PAYROLLID = ?;";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, $p->getId());
                if($stmt->execute())
                {
                    $results = $stmt->fetchAll();
                    array($employees);
                    $i = 0;
                    
                     foreach($results as $row)
                     {  
                            $employee = new Employee($id, $row[0], $row[1], $row[2], $row[3], $row[4]);
                            $employees[$i] = $employee;
                            $i = $i + 1;                        
                     }
                    
                    return $employees;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                unset($pdo);
            }
    }
    
	public function countEmployees($p)
    {
         try
        {
        $query = "SELECT COUNT(*) FROM EMPLOYEE WHERE PAYROLLID = ?;";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, $p->getId());
                if($stmt->execute())
                {
                    $results = $stmt->fetchAll();
                     foreach($results as $row)
                     {  
                         $count = $row[0];
                     }
                    
                    return $count;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                unset($pdo);
            }
    }
    
	public function addPayroll($p)
    {
        try
            {
                $query = "INSERT INTO PAYROLL(ID, NAME)
                    VALUES(?, ?);";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, 1);
                $stmt->bindValue(2, $p->getName());
                if($stmt->execute())
                {
                    header("location: /lab6/index.php?task=create");
                    exit;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                unset($pdo);
            }
    }
    
	public function getPayroll($id)
    {
         try
        {
        $query = "SELECT * FROM PAYROLL WHERE ID = ?;";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, $id);
                if($stmt->execute())
                {
                    $results = $stmt->fetchAll();
                     foreach($results as $row)
                     {  
                         $payroll = new Payroll($id, $row[0]);
                     }
                    
                    return $payroll;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                unset($pdo);
            }
    }
    
	public function getPayrolls()
    {
         try
        {
        $query = "SELECT * FROM PAYROLL;";
                $stmt = $pdo->prepare($query);
                if($stmt->execute())
                {
                    $results = $stmt->fetchAll();
                    array($payrolls);
                    $i = 0;
                    
                     foreach($results as $row)
                     {  
                            $payroll = new Payroll($id, $row[0]);
                            $payrolls[$i] = $payroll;
                            $i = $i + 1;                        
                     }
                    
                    return $payrolls;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                unset($pdo);
            }
    }





}
?>