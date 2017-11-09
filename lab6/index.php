<?php
    $server = 'localhost';
    $user = 'homestead';
    $pwd = 'secret';
    $dbname = 'homestead';
    $dsn = "pgsql:dbname = $dbname; host = $server";
    $pdo = new PDO($dsn, $user, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    createItemsTable($pdo);

    function createItemsTable($pdo)
    {        
        try
        {            
            $query = "DROP TABLE IF EXISTS PAYROLL;";
            $pdo->exec($query);
            
            $query2 = "CREATE TABLE IF NOT EXISTS PAYROLL(
                        ID INT PRIMARY KEY,
                        NAME VARCHAR(64));";
            $pdo->exec($query2);
            
            $query3 = "INSERT INTO PAYROLL(ID, NAME)
                VALUES(1, 'Not being paid');";
            $pdo->exec($query3);
            
            $query4 = "DROP TABLE IF EXISTS EMPLOYEE;";
            $pdo->exec($query4);
            
            $query5 = "CREATE TABLE IF NOT EXISTS EMPLOYEE(
                        ID INT PRIMARY KEY,
                        FIRSTNAME VARCHAR(64),
                        LASTNAME VARCHAR(64),
                        EMAIL VARCHAR(64),
                        SALARY FLOAT,
                        PAYROLLID INT DEFAULT 1);";
            $pdo->exec($query5);
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
?>