<?php
    $server = 'localhost';
    $user = 'homestead';
    $pwd = 'secret';
    $dbname = 'homestead';
    $dsn = "pgsql:dbname = $dbname; host = $server";

    createItemsTable($dsn, $user, $pwd);
    loadItems($dsn, $user, $pwd);

    function createItemsTable($dsn, $user, $pwd)
    {        
        try
        {
            $pdo = new PDO($dsn, $user, $pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "DROP TABLE IF EXISTS ITEMS;";
            $pdo->exec($query);
            
            $query2 = "CREATE TABLE IF NOT EXISTS ITEMS(
                        ID INT PRIMARY KEY,
                        NAME VARCHAR(15),
                        COST DECIMAL(5,2))";
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

    function loadItems($dsn, $user, $pwd)
    {
        $fileName = 'items.csv';
        $file = fopen($fileName, "r");
        while(!feof($file))
        {
            $items[] = fgetcsv($file);
        }
        
        
        try
        {
            $pdo = new PDO($dsn, $user, $pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO ITEMS VALUES(?, ?, ?);");
            
            foreach($items as $values)
            {                        
                $stmt->execute([$values[0], $values[1], $values[2]]);
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
?>




















