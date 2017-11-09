<!DOCTYPE html>
<html>
<head>
    <title>Find a Customer</title>
</head>
    <body>        
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            require('CustomerDAO.php');
            $customerDAO = new CustomerDAO();
            
            if(isset($_POST['stateSearch']))
            {
                $customerDAO->findCustomerState($_POST['state']);   
            }
            elseif(isset($_POST['codeSearch']))
            {
                $customerDAO->findCustomerPCode($_POST['pcode']); 
            }
            else
            {
                $customerDAO->findCustomerSalary($_POST['sstart'], $_POST['send']); 
            }
        }
        else
        {
            echo "<form action='' method='POST'>
            <label>Search by state: 
                <input type = 'text' name = 'state'/>
                <input type = 'submit' name = 'stateSearch' value = 'Search'/>
            </label><br /><br />
            <label>Searh by Post code: 
                <input type = 'text' name = 'pcode'/>
                <input type = 'submit' name = 'codeSearch' value = 'Search'/>
            </label><br /><br />
            <label>Select by range of salary:
                <input type = 'text' name = 'sstart'/>
                <input type = 'text' name = 'send'/>
                <input type = 'submit' name = 'salarySearch' value = 'Search'/>
            </label>
            </form>";
        }
        
        
        
    ?>
    </body>
</html>