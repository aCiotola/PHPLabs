<?php
    $server = 'localhost';
    $user = 'homestead';
    $pwd = 'secret';
    $dbname = 'homestead';
    $dsn = "pgsql:dbname = $dbname; host = $server";

    createTables($dsn, $user, $pwd);

    function createTables($dsn, $user, $pwd)
    {
        try
        {
            $pdo = new PDO($dsn, $user, $pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query3 = "DROP TABLE IF EXISTS DONATIONS;";
            $pdo->exec($query3);
            
            $query = "DROP TABLE IF EXISTS LABUSERS;";
            $pdo->exec($query);
            
            $query2 = "CREATE TABLE IF NOT EXISTS LABUSERS(
                        USERID VARCHAR(20) NOT NULL UNIQUE PRIMARY KEY,
                        PASSWORD VARCHAR(255) NOT NULL)";
            $pdo->exec($query2);                        
            
            $query4 = "CREATE TABLE IF NOT EXISTS DONATIONS(
                        SERIAL INT NOT NULL PRIMARY KEY,
                        DONATIONS INT NOT NULL,
                        USERID VARCHAR(20) NOT NULL)";
            $pdo->exec($query4);
            
            $query5 = "ALTER TABLE DONATIONS 
                        ADD CONSTRAINT USER_FK 
                        FOREIGN KEY (USERID) 
                        REFERENCES LABUSERS 
                        ON DELETE CASCADE;";
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