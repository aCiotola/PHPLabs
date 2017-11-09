<?php
    $server = 'localhost';
    $user = 'homestead';
    $pwd = 'secret';
    $dbname = 'homestead';
    $dsn = "pgsql:dbname = $dbname; host = $server";

    createCustomerTable($dsn, $user, $pwd);

    function createCustomerTable($dsn, $user, $pwd)
    {        
        try
        {
            $pdo = new PDO($dsn, $user, $pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "DROP TABLE IF EXISTS CUSTOMER;";
            $pdo->exec($query);
            
            $query2 = "CREATE TABLE IF NOT EXISTS CUSTOMER(
                        ID INT PRIMARY KEY,
                        FIRSTNAME VARCHAR(64),
                        LASTNAME VARCHAR(64),
                        EMAIL VARCHAR(64),
                        SALARY FLOAT,
                        CIVICNUMBER INT,
                        STREET VARCHAR(64),
                        CITY VARCHAR(64),
                        STATE VARCHAR(64),
                        POSTCODE VARCHAR(12)
                        )";
            $pdo->exec($query2);
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