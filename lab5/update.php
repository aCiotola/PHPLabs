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

                $query = "UPDATE ITEMS SET NAME = ?, COST = ? WHERE ID = ?;";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, $_POST['foodname']);
                $stmt->bindValue(2, $_POST['foodcost']);
                $stmt->bindValue(3, $_POST['foodid']);
                if($stmt->execute())
                {
                    header("location: /lab5/index.php?task=update");
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
                <label>Enter the id of the item you want to update:
                    <input type = 'text' name = 'foodid'/>
                </label> 
                <br/>
                <br/>
                <label>Enter the new name of the item:
                    <input type = 'text' name = 'foodname'/>
                </label> 
                <br/>
                <label>Enter the new cost of the item:
                    <input type = 'text' name = 'foodcost'/>
                </label> 
                <br/>
                    <input type = 'submit' name = 'submit' value = 'Submit'/>
                </form>";        
        }
    ?>
</html>