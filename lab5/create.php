<!DOCTYPE html>
<html>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
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

                $query = "INSERT INTO ITEMS(ID, NAME, COST) VALUES(?, ?, ?);";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, $_POST['foodid']);
                $stmt->bindValue(2, $_POST['foodname']);
                $stmt->bindValue(3, $_POST['foodcost']);
                if($stmt->execute())
                {
                    header("location: /lab5/index.php?task=create");
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
        else
        {
            echo "<form action = '' method = 'POST'>
                <label>Enter the id of the item:
                    <input type = 'text' name = 'foodid'/>
                </label> 
                <br/>
                <label>Enter the name of the item:
                    <input type = 'text' name = 'foodname'/>
                </label> 
                <br/>
                <label>Enter the cost of the item:
                    <input type = 'text' name = 'foodcost'/>
                </label> 
                <br/>
                    <input type = 'submit' name = 'submit' value = 'Submit'/>
                </form>";        
        }
    ?>
</html>