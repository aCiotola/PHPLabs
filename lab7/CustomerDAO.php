<?php
class CustomerDAO
{    
    function addCustomer($customer)
    {
        try
        {
            $user = 'homestead';
            $pwd = 'secret';
            $dsn = 'pgsql:dbname=homestead;host=localhost';  
            $pdo = new PDO($dsn, $user, $pwd);   
            
            $stmt = $pdo->prepare('INSERT INTO CUSTOMER VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
   
            $stmt->bindValue(1, $customer->getId());
            $stmt->bindValue(2, $customer->getFirstname());
            $stmt->bindValue(3, $customer->getLastname()); 
            $stmt->bindValue(4, $customer->getEmail());
            $stmt->bindValue(5, $customer->getSalary());
            $stmt->bindValue(6, $customer->getCivicNumber());
            $stmt->bindValue(7, $customer->getStreet());
            $stmt->bindValue(8, $customer->getCity());
            $stmt->bindValue(9, $customer->getState());
            $stmt->bindValue(10, $customer->getPostCode());
                    
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
    
    function findCustomerState($state)
    {
        try
        {
            $user = 'homestead';
            $pwd = 'secret';
            $dsn = 'pgsql:dbname=homestead;host=localhost';  
            $pdo = new PDO($dsn, $user, $pwd);   
            
            $display = 20;
            $pages = 0;
            $num_rows = 0;
            
            if (isset($_GET['t']) && is_numeric($_GET['t'])) 
            { 
                $pages = $_GET['t'];
            } else 
            { 
                $stmt = $pdo->prepare('SELECT COUNT(*) FROM CUSTOMER WHERE STATE LIKE ?');

                $stmt->bindValue(1, "%".$state."%");           

                if($stmt->execute())
                {
                    $results = $stmt->fetchAll();
                    $num_rows = $results[0][0];
                }
                // Calculate the number of pages...
                if ($num_rows > $display) 
                { // More than 1 page.
                    $pages = ceil ($num_rows/$display);
                } else
                {
                    $pages = 1;
                }
            }
            // Determine where in the database to start returning results...
            if (isset($_GET['p']) && is_numeric($_GET['p'])) 
            {
                $current = $_GET['p'];
                $offset = ($current-1)*$display;
            } else 
            {
                 $current =1;
                 $offset = 0;
            }
            
            $stmt = $pdo->prepare('SELECT * FROM CUSTOMER WHERE STATE LIKE ? ORDER BY FIRSTNAME ASC OFFSET ? LIMIT ?');

            $stmt->bindValue(1, "%".$state."%");    
            $stmt->bindValue(2, $offset);  
            $stmt->bindValue(3, $display);  
            
            if($stmt->execute())
            {
                $results = $stmt->fetchAll();
                 foreach($results as $row)
                 {  
                     echo $row[0]."\r";
                     echo $row[1]."\r";
                     echo $row[2]."\r";
                     echo $row[3]."\r";
                     echo $row[4]."\r";
                     echo $row[5]."\r";
                     echo $row[6]."\r";
                     echo $row[7]."\r";
                     echo $row[8]."\r";
                     echo $row[9]."<br />";
                 }                
            }
            
            if ($pages > 1) 
            {
                // If it's not the first page, make a Previous button:	
                if ($current != 1)
                {	
                    echo '<a href=“index.php?p=' . ($current-1) . '&t=' . $pages .'"> Previous</a> ';
                }
                // Make all the numbered pages:
                for ($i = 1; $i <= $pages; $i++) 
                {
                    if ($i != $current)
                    {
                         echo "<a href=index.php?p=.$i.&t=.$pages>.$i.</a>";
                    } else 
                    {
                        echo $i . ' '; //no link for current page
                    }
                } // End of FOR loop.
                // If it's not the last page, make a Next button:
                if ($current != $pages)
                {
                    echo '<a href="index.php?p=' . ($current+1) . '&t=' . $pages . '">Next</a>';
                }
            } // End of links section.
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
    
    function findCustomerPCode($pcode)
    {
        echo "HELLO";
        try
        {
            $user = 'homestead';
            $pwd = 'secret';
            $dsn = 'pgsql:dbname=homestead;host=localhost';  
            $pdo = new PDO($dsn, $user, $pwd);   
            
            $stmt = $pdo->prepare('SELECT * FROM CUSTOMER ORDER BY FIRSTNAME WHERE POSTCODE LIKE ?');

            $stmt->bindValue(1, "%".$pcode."%");
                    
            if($stmt->execute())
            {
                $results = $stmt->fetchAll();
                 foreach($results as $row)
                 {  
                     echo $row[0]."\r";
                     echo $row[1]."\r";
                     echo $row[2]."\r";
                     echo $row[3]."\r";
                     echo $row[4]."\r";
                     echo $row[5]."\r";
                     echo $row[6]."\r";
                     echo $row[7]."\r";
                     echo $row[8]."\r";
                     echo $row[9]."<br />";
                 }                
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
    
    function findCustomerSalary($min, $max)
    {
        try
        {
            $user = 'homestead';
            $pwd = 'secret';
            $dsn = 'pgsql:dbname=homestead;host=localhost';  
            $pdo = new PDO($dsn, $user, $pwd);   
            
            $stmt = $pdo->prepare('SELECT * FROM CUSTOMER WHERE ORDER BY FIRSTNAME SALARY > ? AND SALARY < ?');

            $stmt->bindValue(1, $min);
            $stmt->bindValue(2, $max);
                    
            if($stmt->execute())
            {
                $results = $stmt->fetchAll();
                 foreach($results as $row)
                 {  
                     echo $row[0]."\r";
                     echo $row[1]."\r";
                     echo $row[2]."\r";
                     echo $row[3]."\r";
                     echo $row[4]."\r";
                     echo $row[5]."\r";
                     echo $row[6]."\r";
                     echo $row[7]."\r";
                     echo $row[8]."\r";
                     echo $row[9]."<br />";
                 }                
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
