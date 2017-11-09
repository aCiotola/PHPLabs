<!DOCTYPE html>
<html>
    <?php
    require("connectDB.php");
    require("LabDAO.php");
    require("Employee.php");
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            try
            {
                $lab = new LabDAO();
                $e = new Employee($_POST['fName'], "Hello", $_POST['email'], $_POST['salary'], $_POST['payrollid']);
                echo $_POST['fName'];
                $lab->addEmployee($e);
                
                $e->__toString();
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
        else
        {
            echo "<form action = '' method = 'POST'>
                <label>Enter the id of the employee:
                    <input type = 'text' name = 'id'/>
                </label> 
                <label>Enter the first name of the employee:
                    <input type = 'text' name = 'fName'/>
                </label> 
                <br/>
                <label>Enter the email of the employee:
                    <input type = 'text' name = 'email'/>
                </label> 
                <br/>
                <label>Enter the salary of the employee:
                    <input type = 'text' name = 'salary'/>
                </label> 
                <label>Enter the payroll id of the employee:
                    <input type = 'text' name = 'payrollid'/>
                </label> 
                <br/>
                    <input type = 'submit' name = 'submit' value = 'Submit'/>
                </form>";        
        }
    ?>
</html>